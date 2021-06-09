<?php
class EblastsController extends AppController {

	public $uses = array('Contact', 'History', 'ContactStatus', 'User', 'Event', 'EventType', 'Templates', 'TemplatesCategory', 'Eblasts','UserEmail' );
    public $components = array('RequestHandler' );

	var $fileModel = 'Upload';
	var $uploadDir = 'files';
	var $fileVar = 'file';
	var $allowedTypes = array(
		'image/jpeg',
		'image/gif',
		'image/png',
		'image/pjpeg',
		'image/x-png'
	);
	var $fields = array('name'=>'name','type'=>'type','size'=>'size');
	var $uploadDetected = false;
	var $uploadedFile = false;
	var $data = array();
	var $params = array();
	var $finalFile = null;
	var $success = false;
	var $errors = array();


	function beforeFilter() {
		parent::beforeFilter();
	}


	function index() {
		$this->layout='default_new';
		
		$current_user_id = $this->Auth->User('id');
		//user emails
		$emails = $this->UserEmail->find('all',array(
			'conditions'=>array('OR'=>array(
				'UserEmail.receiver_id'=>$current_user_id, 
				'UserEmail.sender_id'=>$current_user_id, 
			)),
			'order'=>array('UserEmail.received_date'=>'DESC'),
			//'limit'=>5
		));		
		$this->set('emails',$emails);
		//debug($emails);
		
	}

	function eblast() {
		$this->layout='default_new';
	}

	function newsletter() {
		$this->layout='default_new';
	}

	function autoresponders() {
		$this->layout='default_new';
	}

	function templates() {
		$this->layout='default_new';
        if ($pagenumber) {
			$this->paginate = array(
								'Templates' => array(
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'templates'
								)
			);
            $this->request->params['named']['page'] = null;
        } else {
			$this->paginate = array(
								'Templates' => array(
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'templates'
								)
			);
        }
        $this->set('templates', $this->Paginate('Templates'));
		$this->set('class', 'alert-success'); // This is the classname for the alert (elements/alert.ctp)
	}

	function load_categories() {
		$this->layout = '';
		$categoriesSrc = $this->TemplatesCategory->find('all', array('user_id' => $this->Auth->user('id')));
		foreach($categoriesSrc as $key => $row) {
			$categories[$row['TemplatesCategory']['template_cat_id']] = $row['TemplatesCategory']['category_name'];
		}
		$this->set('categories', $categories);
	}

	function templates_list() {
		$this->layout='default_new';

        if ($pagenumber) {
			$this->paginate = array(
								'Templates' => array(
									'user_id' => $this->Auth->user('id'),
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'templates'
								)
			);
            $this->request->params['named']['page'] = null;
        } else {
			$this->paginate = array(
								'Templates' => array(
									'user_id' => $this->Auth->user('id'),
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'templates'
								)
			);
        }
        $this->set('Templates', $this->Paginate('Templates'));
		$this->set('class', 'alert-success margin20'); // This is the classname for the alert (elements/alert.ctp)
	}

	function templates_create() {
		$this->layout='default_new';
		$data = array();
		if ($this->request->is('post')) {

			$filename = 'default.jpg';
			$files = $this->request->data['Eblasts']['thumbfile'];

			if(!empty($files)) {
				$uploaddir = './app/webroot/files/template-thumbs/';
				$filename = time() . basename($files['name']);
				//if($this->FileUpload->success)
				if( move_uploaded_file($files['tmp_name'], $uploaddir . $filename ) ) {
				}
			}

			$data['Templates']['user_id'] = $this->Auth->user('id');
			$data['Templates']['base_template_id'] = $this->request->data['Eblasts']['base_template_id'];
			$data['Templates']['template_title'] = $this->request->data['Eblasts']['template_title'];
			$data['Templates']['template_category'] = $this->request->data['Eblasts']['template_category'];
			$data['Templates']['template_html'] = $this->request->data['Eblasts']['template_html'];
			$data['Templates']['template_type'] = $this->request->data['Eblasts']['template_type'];
			$data['Templates']['base_template_id'] = $this->request->data['Eblasts']['template_id'];
			$data['Templates']['template_image'] = ''.$filename;
			$data['Templates']['created_date'] = date('Y-m-d H:i:s');

			$templatesSrc = $this->Templates->find('first',  array('conditions' => 
																				array('template_id' => $this->request->data['Eblasts']['base_template_id'],
																					  'user_id' => $this->Auth->user('id'),
																					//  'template_title' => $this->request->data['Eblasts']['template_title'],
																					  'template_category' => $this->request->data['Eblasts']['template_category'],
																					  'template_html' => $this->request->data['Eblasts']['template_html'],
																					  'template_type' => $this->request->data['Eblasts']['template_type']
																					 )
																			)
																	);

			if(isset($templatesSrc['Templates'])) {
				$this->Session->setFlash(__('Changes not found in the exisitng template!'), 'alert');
				$this->redirect(array('action' => 'templates_list'));
			}

			$this->Templates->create();

			if ($this->Templates->save($data)) {
				$this->Session->setFlash(__('Template information saved!'), 'alert');
				$this->redirect(array('action' => 'templates_list'));
			}
		}

		if( $this->request->params['pass']['0'] != '' ) {
			$templatesSrc = $this->Templates->find('first',  array('conditions' => array('template_id' => $this->request->params['pass']['0'], 'user_id' => $this->Auth->user('id'))));
			if(!isset($templatesSrc['Templates'])) {
				$this->redirect('templates_list');
			}
			$this->set('template', $templatesSrc['Templates']);
		}


		$categoriesSrc = $this->TemplatesCategory->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'))));
		foreach($categoriesSrc as $key => $row) {
			$categories[$row['TemplatesCategory']['template_cat_id']] = $row['TemplatesCategory']['category_name'];
		}

		$this->set('categories', $categories);
	}

	public function add_template_category() {
		$this->autoRender = false;

		$data = array();

		if ($this->request->is('post') && $this->Auth->user('id')) {

			$data['TemplatesCategory']['user_id'] = $this->Auth->user('id');
			$data['TemplatesCategory']['category_name'] = $this->request->data['category_name'];
			$data['TemplatesCategory']['created_date'] = date('Y-m-d H:i:s');

			$this->TemplatesCategory->create();

			if ($this->TemplatesCategory->save($data)) {
				$data = array('success' => 'Form was submitted');
			}
        }
		echo json_encode($data);
	}

	function search_leads_send() {
		$this->layout='default_new';
	}

	public function delete( $id ) {
		$condition = array( 'eblasts_id' => $id, 'user_id' => $this->Auth->user('id'));
		if($this->Eblasts->deleteAll( $condition, false )) {
			$this->Session->setFlash(__('Details deleted!'), 'alert');
		}
		$this->redirect( array('controller' => 'Eblasts', 'action' => 'eblasts_list') );
	}

	public function eblasts_list( $pagenumber = '' ) {

		$this->layout='default_new';

		if ($this->request->is('post')) {
            $data['Eblasts']['user_id'] = $this->Auth->user('id');

			$data['Eblasts']['campaign_name'] = $this->request->data['Eblasts']['campaign_name'];
			$data['Eblasts']['campaign_name'] = $this->request->data['Eblasts']['campaign_name'];
			$data['Eblasts']['template_id'] = $this->request->data['template_id'];
			$data['Eblasts']['form_filters'] = json_encode($this->request->data['Eblasts']);
			$data['Eblasts']['created_date'] = date('Y-m-d H:i:s');

			if($this->request->data['Eblasts']['send_every'] <= 0 && $this->request->data['Eblasts']['schedule_single_date'] != '') {
				list( $m, $d, $y ) = explode('-', $this->request->data['Eblasts']['schedule_start_date']);
				$data['Eblasts']['date_start'] = date("Y-m-d H:i:s", strtotime($y.'-'.$m.'-'.$d." ".$this->request->data['Eblasts']['schedule_single_time']));
			}
			else
			{
				if($this->request->data['Eblasts']['send_every'] > 0 && $this->request->data['Eblasts']['schedule_start_date'] != '') {
					list( $m, $d, $y ) = explode('-', $this->request->data['Eblasts']['schedule_start_date']);
					$data['Eblasts']['date_start'] = date("Y-m-d H:i:s", strtotime($y.'-'.$m.'-'.$d." ".$this->request->data['Eblasts']['schedule_start_time']));
				}
				if($this->request->data['Eblasts']['send_every'] > 0 && $this->request->data['Eblasts']['schedule_end_date'] != '') {
					list( $m, $d, $y ) = explode('-', $this->request->data['Eblasts']['schedule_end_date']);
					$data['Eblasts']['date_end'] = date("Y-m-d H:i:s", strtotime($y.'-'.$m.'-'.$d." ".$this->request->data['Eblasts']['schedule_end_time']));
				}
			}

            $this->Eblasts->create();

            if ($this->Eblasts->save($data)) {
				// $uid = $this->Eblasts->getLastInsertId();
				$this->Session->setFlash(__('New E-blasts information saved!'), 'alert'); //print_r($this->request->data); exit;
				$this->redirect(array('action' => 'eblasts_list'));
            }
        }

        if ($pagenumber) {
			$this->paginate = array(
								'Eblasts' => array(
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'eblasts'
								)
			);
            $this->request->params['named']['page'] = null;
        } else {
			$this->paginate = array(
								'Eblasts' => array(
									'limit' => 3,
									'order' => array(
										'user.id' => 'asc',
									),
									'table' => 'eblasts'
								)
			);
        }
        $this->set('eblasts', $this->Paginate('Eblasts'));
		$this->set('class', 'alert-success'); // Thsi is the classname for the alert (elements/alert.ctp)
    }


	//Search result in the lead page /contacts/lead
	public function search_result(){		
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$searched = false;
        $selected_type = "";

		if(!empty($this->request->query)){
			if($this->request->query['data']['Eblasts']) {
				$this->passedArgs = $this->request->query['data']['Contacts'] = $this->request->query['data']['Eblasts'];
			}
		}

		if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

		$current_user_id = $this->Auth->User('id');
		$this->Prg->commonProcess();
		$this->passedArgs['user_id'] = $current_user_id;

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
		
		if(isset($this->passedArgs['search_all']) && $this->passedArgs['search_all'] == 'Dorment'){
			$conditions = array(
			'Contact.modified <=' => $datetime_48hours_back,
			'Contact.lead_status' => "Open",
			'Contact.user_id' => $current_user_id,
			'Contact.sales_step <>' => 'Sold',
            );

		}else if ($group_id == 2) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.company_id' => $dealer_id,
                //'Contact.sales_step = Contact.sales_step',
            );
        } elseif ($group_id == 1) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                //'Contact.sales_step = Contact.sales_step',
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.user_id' => $current_user_id,
                //'Contact.sales_step = Contact.sales_step',
                '1 = 1'
            );
        }
		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.condition',
			'Contact.year',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.mobile',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.lead_status',
		);
		$contacts_count = $this->Contact->find('count', array('conditions' => $conditions));
		$this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		$contacts = $this->Contact->find('all', array('fields'=>$fields,'conditions' => $conditions, 'order' => array('Contact.id' => 'DESC')));
		$this->set('contacts_count', $contacts_count);
		$this->set('contacts', $contacts);
	}

	/* Code for the first step */
   	public function setup_eblast($csvFile = null) {

		$this->layout = 'eblasts_form_wizard';

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        $selected_type = "";


/* Templates */
		$templates = $this->Templates->find('all', array('template_status' => '1', 'user_id' => $this->Auth->user('id') ) );
        $this->set('templates', $templates);
/* END */


        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

        $current_user_id = $this->Auth->User('id');
        $this->Prg->commonProcess();
        //$this->Contact->recursive = 0;
        $this->passedArgs['user_id'] = $current_user_id;
        if ($group_id == 2) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.company_id' => $dealer_id,
                //'Contact.sales_step = Contact.sales_step',
            );
        } elseif ($group_id == 1) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                //'Contact.sales_step = Contact.sales_step',
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.user_id' => $current_user_id,
                //'Contact.sales_step = Contact.sales_step',
                '1 = 1'
            );
        }
        if ($csvFile) {
            $this->paginate = array(
                'conditions' => $conditions,
                'order' => array(
                    'Contact.sperson' => 'DESC',
                )
            );
            $this->request->params['named']['page'] = null;
        } else {
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => 3,
                'order' => array(
                    'Contact.id' => 'DESC'
                )
            );
        }
		//  $this->set('contacts', $this->Paginate());
		if( $this->Session->check("load_lead") ){
			$this->set('load_lead', $this->Session->read("load_lead"));
			$this->Session->delete("load_lead");
		}
    }


	function runCron() {
		$this->autoRender = false;

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        $selected_type = "";

		$conditions = array( 'user_id' => $this->Auth->user('id'), 'date_end >=' => date('Y-m-d m:i:s') );
		$eblasts = $this->Eblasts->find('all', array('fields'=>$fields,'conditions' => $conditions));

		$this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$this->Prg->commonProcess();

		$i = 0;
		foreach($eblasts as $eblast) {

		 	$form_filters = json_decode( $eblast['Eblasts']['form_filters'] );

			$this->passedArgs =  get_object_vars( $form_filters );

			if ($this->passedArgs) {
				$args = $this->passedArgs;
				if (isset($args['search_name'])) {
					$searched = true;
				}
				$selected_type = $args['search_all'];
			}

			$current_user_id = $this->Auth->User('id');
			// 
			$this->passedArgs['user_id'] = $current_user_id;

			$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));

			$conditions = array();

			if(isset($this->passedArgs['search_all']) && $this->passedArgs['search_all'] == 'Dorment'){
				$conditions = array(
					'Contact.modified <=' => $datetime_48hours_back,
					'Contact.lead_status' => "Open",
					'Contact.user_id' => $current_user_id,
					'Contact.sales_step <>' => 'Sold',
				);
			}else if ($group_id == 2) {
				$conditions = array($this->Contact->parseCriteria($this->passedArgs),
					'Contact.company_id' => $dealer_id,
					//'Contact.sales_step = Contact.sales_step',
				);
			}elseif ($group_id == 1) {
				$conditions = array($this->Contact->parseCriteria($this->passedArgs),
					//'Contact.sales_step = Contact.sales_step',
					'1=1'
				);
			}elseif ($group_id == 3) {
				$conditions = array($this->Contact->parseCriteria($this->passedArgs),
					'Contact.user_id' => $current_user_id,
					//'Contact.sales_step = Contact.sales_step',
					'1 = 1'
				);
			}
			$fields = array(
				'Contact.id',
				'Contact.first_name',
				'Contact.last_name',
				'Contact.type',
				'Contact.condition',
				'Contact.year',
				'Contact.make',
				'Contact.model',
				'Contact.modified_full_date',
				'Contact.modified',
				'Contact.mobile',
				'Contact.address',
				'Contact.city',
				'Contact.state',
				'Contact.zip',
				'Contact.email',
				'Contact.lead_status',
			);

			$contacts = $this->Contact->find('all', array('fields'=>$fields, 'conditions' => $conditions, 'order' => array('Contact.id' => 'DESC')));
			$totalSent = 0;


			if(count($contacts)) {

				$email = new CakeEmail('default');

				$templatesConditions = array('template_id' => $eblast['Eblasts']['template_id'], 'template_status' => '1', 'user_id' => $eblast['Eblasts']['user_id']);
				$templates = $this->Templates->find('first', array('conditions' => $templatesConditions ));

				$templateHtml = $templates['Templates']['template_html'];

				foreach( $contacts as $eachContact ) {

					if($eachContact['Contact']['email']=='') { continue; }

					$templateValuedHtml = $templateHtml;
					foreach($eachContact['Contact'] as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}

					if(isset($eachContact['Deals'])) {
						foreach($eachContact['Deals'] as $key => $value) {
							$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
						}
					}


					$this->Email->reset();
					$this->Email->to = $eachContact['Contact']['email'];
					// $this->Email->bcc = array('info@domain.co',$clientdetails['0']['distributors']['email_id']);
					$this->Email->subject = $templates['Templates']['template_title'];
					$this->Email->from = 'info@crmmain.com';
					$this->Email->sendAs = 'html'; // Because we like to send pretty mail
					$this->Email->send( $templateValuedHtml );
					$totalSent++;
				}
			}
		}
		echo " Total Sent E-Mails: " . $totalSent;
	}
}