<?php
class MarketingAppsController extends AppController {

	public $uses = array('User', 'TemplateApp', 'TemplatesCategoryApp', 'EblastApp','UserEmail', 'EblastsSent','EblastUnsubscribe','EblastBounce','EblastSpam' );
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
		$this->Auth->allow('unsubscribe');

		$dealer_ids = $this->get_dealer_ids();
    	$this->set('dealer_ids',$dealer_ids);


	}

	public function get_dealer_ids(){

    	$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');


    	$other_locations_ar = array();
    	if($other_locations){
    		$other_locations_ar = explode(",", $other_locations);
    	}

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('order' => "User.dealer_id", 'fields' => array('User.dealer_id', 'User.dealer'),
                'conditions' => $dconditions ));
    	ksort($user_active);
    	return $user_active;
    }

	function index($stats_month = null) {
		$this->layout='default_new';

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

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
		$this->set('current_user_id',$current_user_id);

		//debug($emails);

		//opt-out count
		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);

		$dealer_id = $this->Auth->user('dealer_id');
		//$StatisticsCount = $this->GetStatisticsCount($dealer_id,$first_day_this_month,$last_day_this_month,true);




		/* Eblasts Sent */
		$conditions = array('EblastApp.user_id'=>$dealer_id,'template_type'=>'M');
		$eblast_sent_count = $this->EblastApp->find('count',array('conditions'=>$conditions));
		$this->set('eblast_sent_count',$eblast_sent_count);


		/* Newsletter Sent */
		$conditions = array('EblastApp.user_id'=>$dealer_id,'template_type'=>'N');
		$newsletter_sent_count = $this->EblastApp->find('count',array('conditions'=>$conditions));
		$this->set('newsletter_sent_count',$newsletter_sent_count);

		//Open % months

		$this->loadModel('SendgridStatistic');
		$dealer_id = $this->Auth->user('dealer_id');
		$start_date = date('Y-m-d 00:00:00', strtotime("-30 day"));
		$end_date = date('Y-m-d 23:59:59');

		$total_deli = $this->EblastApp->query("SELECT count(*) AS delivered FROM sendgrid_statistics WHERE event_type = 'delivered' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_delivered = 	$total_deli[0][0]['delivered'];

		$total_deli_auto = $this->EblastApp->query("SELECT count(*) AS delivered FROM sendgrid_auto_statistics WHERE event_type = 'delivered' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_delivered += 	$total_deli_auto[0][0]['delivered'];



		$total_opens = $this->EblastApp->query("SELECT count(DISTINCT contact_id)  AS open FROM sendgrid_statistics WHERE event_type = 'open' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_opened = 	$total_opens[0][0]['open'];
		$total_opens_auto = $this->EblastApp->query("SELECT count(*) AS open FROM sendgrid_auto_statistics WHERE event_type = 'open' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_opened += 	$total_opens_auto[0][0]['open'];


		$open_percent = 0;
		if($total_opened == '0'){
			$open_percent = 0;
		}else{
			$open_percent = floor(($total_opened/$total_delivered) * 100 );
		}
		$this->set('open_percent', $open_percent);
		$this->set('total_opened', $total_opened);


		$Opt_Out_Month = $this->EblastApp->query("SELECT count(*) AS unsubscribed FROM sendgrid_statistics WHERE event_type = 'unsubscribe' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$Opt_Out_Month_auto = $this->EblastApp->query("SELECT count(*) AS unsubscribed FROM sendgrid_auto_statistics WHERE event_type = 'unsubscribe' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$total_Opt_Out_Month = $Opt_Out_Month['0']['0']['unsubscribed'] + $Opt_Out_Month_auto['0']['0']['unsubscribed'];
		$this->set('total_Opt_Out_Month', $total_Opt_Out_Month);

		$Spam_Month = $this->EblastApp->query("SELECT count(*) AS spam FROM sendgrid_statistics WHERE event_type = 'spamreport' AND  dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$Spam_Month_auto = $this->EblastApp->query("SELECT count(*) AS spam FROM sendgrid_auto_statistics WHERE event_type = 'spamreport' AND  dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$total_Spam_Month = $Spam_Month['0']['0']['spam'] + $Spam_Month_auto['0']['0']['spam'];
		$this->set('total_Spam_Month', $total_Spam_Month);

		$Bounce_Month = $this->EblastApp->query("SELECT count(*) AS bounced FROM sendgrid_statistics WHERE event_type = 'bounce' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$Bounce_Month_auto = $this->EblastApp->query("SELECT count(*) AS bounced FROM sendgrid_auto_statistics WHERE event_type = 'bounce' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");


		$total_Bounce_Month = $Bounce_Month['0']['0']['bounced'] + $Bounce_Month_auto['0']['0']['bounced'];


		$this->set('total_Bounce_Month', $total_Bounce_Month);


		//	debug($Bounce_Month);

		// $conditions = array('SendgridStatistic.dealer_id'=>$dealer_id);
		// $this->paginate = array(
		// 	'conditions' => $conditions,
		// 	'order' =>'SendgridStatistic.created DESC',
		// 	'limit' => 30,
		// );
		// $sendgridStatistics = $this->Paginate('SendgridStatistic');
		// $this->set('sendgridStatistics', $sendgridStatistics);






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
		$this->paginate = array(
			'conditions'=>array('user_id' => $this->Auth->user('id')),
			'limit' => 3,
			'order' => array(
				'user.id' => 'asc',
			)
		);
        $this->set('templates', $this->Paginate('Template'));
		$this->set('class', 'alert-success'); // This is the classname for the alert (elements/alert.ctp)
	}

	function load_categories() {
		$this->layout = '';
		$categoriesSrc = $this->TemplatesCategoryApp->find('all', array('conditions'=>array('TemplatesCategoryApp.user_id' => $this->Auth->user('dealer_id'))));
		foreach($categoriesSrc as $key => $row) {
			$categories[$row['TemplatesCategoryApp']['template_cat_id']] = $row['TemplatesCategoryApp']['category_name'];
		}
		$this->set('categories', $categories);
	}

	function templates_list() {

		//Restrict Sales Person
		$this->loadModel('DealerSetting');
		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		// debug( $restrict_eblast_salesperson );



		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$conditions = array('TemplateApp.group_ids' => implode(",", $eblat_app_multiple) ) ;
		}else{
			$conditions = array('TemplateApp.user_id' => $this->Auth->user('dealer_id'));
			$conditions['OR']  = array('TemplateApp.group_ids is null', 'TemplateApp.group_ids' =>   '');
		}

		if($restrict_eblast_salesperson == 'On' && !in_array($this->Auth->user('group_id'), array('2','4','6','7','9','12','13'))  ){
			$conditions['TemplateApp.owner_id'] = $this->Auth->user('id');
		}
		//debug( $conditions );

		$this->TemplateApp->bindModel(array(
			'belongsTo'=>array('TemplatesCategoryApp'=>array(
				'foreignKey' => false,
				'conditions'=>"TemplatesCategoryApp.template_cat_id = TemplateApp.template_category_app_id"

			))
		));


		$this->layout='marketing_default';
		$this->paginate = array(
				'conditions'=> $conditions,
				'limit' => 20,
				'order' => array(
					'user.id' => 'asc',
				),
		);
		$Templates = $this->Paginate('TemplateApp');
		// debug($Templates);


        $this->set('Templates', $Templates);
		$this->set('class', 'alert-success margin20'); // This is the classname for the alert (elements/alert.ctp)
	}
	public function templates_delete() {
		$this->layout = 'ajax';
    	$contact_template_id = $this->request->query['contact_template_id'];
    	$this->TemplateApp->delete($contact_template_id);
		$this->Session->setFlash(__('TemplateApp information success!'), 'alert');
		$this->redirect(array('action' => 'templates_list'));
	}

	public function templates_duplicate($id = '') {

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$dealer_id = $this->Auth->user('dealer_id');
		$base_template = $this->TemplateApp->find('first',
			array('conditions' => array(
				'template_id' => $id,
				'user_id' => $dealer_id
			))
		);
		$new_name_value = $base_template;
		unset($new_name_value['TemplateApp']['template_id']);
		unset($new_name_value['TemplateApp']['created_date']);
		$new_name_value['TemplateApp']['template_title'] = $new_name_value['TemplateApp']['template_title']." Copy";
		$new_name_value['TemplateApp']['created_date'] = date('Y-m-d H:i:s');

		$this->TemplateApp->create();
		$this->TemplateApp->save($new_name_value);
		$this->Session->setFlash('Template Created');
		$this->redirect(array('action' => 'templates_list'));

	}

	function templates_create($id='') {
		$this->layout='marketing_default_template';
		if ($this->request->is('post') || $this->request->is('put')) {

			//debug($this->request->data);
			$this->request->data['TemplateApp']['user_id'] = $this->Auth->user('dealer_id');

			$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
			if(is_array($eblat_app_multiple)){
				asort($eblat_app_multiple);
				$this->request->data['TemplateApp']['group_ids'] = implode(",", $eblat_app_multiple);
			}

			$this->request->data['TemplateApp']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['TemplateApp']['last_run'] = date('Y-m-d H:i:s');
			$Search = array("'[unsubscribe]'","'[weblink]'");
			$Replace = array('"[unsubscribe]"','"[weblink]"');
			$this->request->data['TemplateApp']['template_html'] = str_replace($Search,$Replace,$this->request->data['TemplateApp']['template_html']);
			//check for changed
			if( $this->request->data['TemplateApp']['base_template_id'] != '' ){
				$templatesSrc = $this->TemplateApp->find('first',
					array('conditions' => array(
						'template_id' => $this->request->data['TemplateApp']['base_template_id']
					))
				);
				$this->request->data['TemplateApp']['template_html'] = str_replace($Search,$Replace,$this->request->data['TemplateApp']['template_html']);

				if(trim($templatesSrc['TemplateApp']['template_html'])!=trim($this->request->data['TemplateApp']['template_html'])){
					// Get current date in user's timezone
					$zone = $this->Auth->User('zone');
					date_default_timezone_set($zone);
					// Set current date and time for  contents_changed_on in user's timezone
					$this->request->data['TemplateApp']['contents_changed_on'] = date("Y-m-d H:i:s");
				}



			}else{
				/* If its a new template then put contents_changed_on as current date & time*/
				// Get current date in user's timezone
				$zone = $this->Auth->User('zone');
				date_default_timezone_set($zone);
				// Set current date and time for  contents_changed_on in user's timezone
				$this->request->data['TemplateApp']['contents_changed_on'] = date("Y-m-d H:i:s");
			}

			if(empty($this->request->data['TemplateApp']['template_id'])){
				$this->TemplateApp->create();
				$this->request->data['TemplateApp']['owner_id'] = $this->Auth->user('id');
			}

			if ($this->TemplateApp->save($this->request->data)) {

				//Save Template Thumbnails
				$fileData = $this->request->data['TemplateApp']['thumbfile'];
				$path = APP."View".DS."Themed".DS."Default".DS."webroot".DS."img".DS."template-thumbs";

				if($fileData['size'] != 0){

					$valid_image = true;
					if ($fileData['error'] !== UPLOAD_ERR_OK) {
						$valid_image = false;
					   //die("Upload failed with error code " . $_FILES['file']['error']);
					}
					$info = getimagesize($fileData['tmp_name']);
					if ($info === FALSE) {
						$valid_image = false;
					   //die("Unable to determine image type of uploaded file");
					}
					if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
						$valid_image = false;
					   	//die("Not a gif/jpeg/png");
					}

					if($valid_image == true) {

						//Delete Existing image
						$current_template_image = $this->TemplateApp->find('first',  array('recursive'=>-1, 'fields'=>array("TemplateApp.template_image"), 'conditions' => array('TemplateApp.template_id' => $this->TemplateApp->id)));
						if($current_template_image['TemplateApp']['template_image'] != ''){
							@unlink($path.DS.$current_template_image['TemplateApp']['template_image']);
						}

						//Save new uploaded image
						$no = 1;
						$newFileName = $fileData['name'];
						$fileName = $fileData['name'];
						while (file_exists($path.DS.$newFileName)) {
							$no++;
							$newFileName = substr_replace($fileName, "_$no.", strrpos($fileName, "."), 1);
						}
						if( move_uploaded_file($fileData['tmp_name'], $path.DS.$newFileName) ){
							$this->TemplateApp->saveField('template_image', $newFileName);
						}
					}
				}

				$this->Session->setFlash(__('TemplateApp information saved!'), 'alert');
				$this->redirect(array('action' => 'templates_list'));
			}

		}else{
			if( isset($this->request->params['pass']['0']) &&  $this->request->params['pass']['0'] != '' ) {
				$templatesSrc = $this->TemplateApp->find('first',  array('conditions' => array('TemplateApp.template_id' => $this->request->params['pass']['0'], 'user_id' => $this->Auth->user('dealer_id'))));
				if(!isset($templatesSrc['TemplateApp'])) {
					$this->redirect('templates_list');
				}
				$this->request->data = $templatesSrc;
				$this->request->data['TemplateApp']['base_template_id'] = $templatesSrc['TemplateApp']['template_id'];
			}else{

				//debug($this->Auth->User());
				//$this->request->data['TemplateApp']['template_email_from_id'] = $this->Auth->User('d_email');
				//$this->request->data['TemplateApp']['template_email_from_name'] = $this->Auth->User('dealer');

			}

		}
		$categories = $this->TemplatesCategoryApp->find('list', array('fields'=>array('TemplatesCategoryApp.template_cat_id','TemplatesCategoryApp.category_name'),'conditions' => array('TemplatesCategoryApp.user_id' => $this->Auth->user('dealer_id'))));
		$this->set('categories', $categories);
		$this->set("template_id",$id);
	}

	public function add_template_category() {
		$this->autoRender = false;

		$data = array();

		if ($this->request->is('post') && $this->Auth->user('id')) {

			if($this->TemplatesCategoryApp->find('count', array('conditions'=>array(
				'TemplatesCategoryApp.user_id'=>$this->Auth->user('dealer_id'),
				'TemplatesCategoryApp.category_name'=>$this->request->data['category_name']
			))) == 0 ){
				$data['TemplatesCategoryApp']['user_id'] = $this->Auth->user('dealer_id');
				$data['TemplatesCategoryApp']['category_name'] = $this->request->data['category_name'];
				$data['TemplatesCategoryApp']['created_date'] = date('Y-m-d H:i:s');
				$this->TemplatesCategoryApp->create();
				if ($this->TemplatesCategoryApp->save($data)) {
					$data = array('success' => 'Form was submitted');
				}
			}else{
				$data = array('error' => 'Category already exists');
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

	public function details($eblasts_id) {

		$fields = array(
			'Eblast.eblasts_id',
			'User.first_name',
			'User.last_name',
			'Template.template_id',
			'Template.template_title',
			'Eblast.user_id',
			'Eblast.created_by',
			'Eblast.campaign_name',
			'Eblast.form_filters',
			'Eblast.template_type',
			'Eblast.date_start',
			'Eblast.date_end',
			'Eblast.created_date',
			'Eblast.last_run',
			'(SELECT COUNT(*) FROM eblasts_sents WHERE success = 1 AND eblast_id = Eblast.eblasts_id ) as sent_num',
		);
		$this->Eblast->bindModel(array('belongsTo'=>array(
			'User'=>array('foreignKey'=>false,'conditions'=>"Eblast.created_by = User.id"),
			'Template'

		)));
		$eblast = $this->Eblast->find('first',array('fields'=>$fields,'conditions'=>array('Eblast.eblasts_id'=>$eblasts_id)));
		$this->set('eblast',$eblast);
		//debug($eblast);

	}

	public function eblasts_list($template_type = "M", $opt_sent = 'not_sent') {

		//Restrict Sales Person
		$this->loadModel('DealerSetting');
		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		// debug( $restrict_eblast_salesperson );

		$this->layout='marketing_default';
		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');
		date_default_timezone_set($zone);
		$currrent_date_time = date('Y-m-d 00:00:00', strtotime("now"));

		$search_all2 = "";
		$conditions = array('EblastApp.template_type'=>trim($template_type));
		// $conditions['EblastApp.user_id'] = $dealer_id;
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['EblastApp.campaign_name LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		$conditions['EblastApp.template_type'] = $template_type;

		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$conditions['EblastApp.group_ids'] = implode(",", $eblat_app_multiple);
		}else{
			$conditions['EblastApp.user_id'] = $dealer_id;
			$conditions['OR']  = array('EblastApp.group_ids is null', 'EblastApp.group_ids' =>   '');
		}

		if($restrict_eblast_salesperson == 'On' && !in_array($this->Auth->user('group_id'), array('2','4','6','7','9','12','13'))  ){
			$conditions['EblastApp.created_by'] = $this->Auth->user('id');
		}
		// debug($conditions);


		$this->EblastApp->bindModel(array(
			'belongsTo'=>array('List'),
		), false);
		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'order' => array(
				'EblastApp.id' => 'asc',
			),
		);


		$eblasts = $this->Paginate('EblastApp');
		//debug($eblasts);
        $this->set('eblasts', $eblasts);
		$this->set('class', 'alert-success'); // Thsi is the classname for the alert (elements/alert.ctp)

		$this->set('selected_type', $template_type);
		$this->set('search_all2', $search_all2);
		$this->set('selected_opt_sent', $opt_sent);
		$this->set('currrent_date_time',date('Y-m-d H:i:s'));
		//$this->Eblast->AssignListToCompaign($dealer_id );

    }
    public function eblasts_delete() {
    	$this->layout = 'ajax';
    	$contact_eblast_id = $this->request->query['contact_eblast_id'];
    	$this->EblastApp->delete($contact_eblast_id);
		$this->Session->setFlash(__('TemplateApp information success!'), 'alert');
		$this->redirect(array('action' => 'eblasts_list'));
 	}
	//Search result in the lead page /contacts/lead
	public function search_result(){
		$this->GetEblastRecipients();

	}


	/* Code for the first step */
   	public function setup_eblast($template_type = null) {

   		//Restrict Sales Person
		$this->loadModel('DealerSetting');
		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		$this->set('restrict_eblast_salesperson', $restrict_eblast_salesperson);

		//echo date("Y-m-d H:i",strtotime("2015-01-22 11:00 PM"));die;
		$this->layout = 'eblasts_form_wizard_app';
		date_default_timezone_set($this->Auth->User('zone'));

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$user_id = $this->Auth->user('id');

		/* Templates */

		$template_conditions = array(
			'TemplateApp.template_type' => $template_type,
			'TemplateApp.template_status' => '1',
			'TemplateApp.user_id' => $this->Auth->user('dealer_id')
		);

		if($restrict_eblast_salesperson == 'On' && !in_array($this->Auth->user('group_id'), array('2','4','6','7','9','12','13'))  ){
			$template_conditions['TemplateApp.owner_id'] = $this->Auth->user('id');
		}

		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$template_conditions = array(
				'TemplateApp.template_type' => $template_type,
				'TemplateApp.template_status' => '1',
				'TemplateApp.group_ids' => implode(",", $eblat_app_multiple)
			);
		}


		$templates = $this->TemplateApp->find('all', array('conditions'=> $template_conditions ));
        $this->set('templates', $templates);
		/* END */
		$this->set('template_type', $template_type);

		if ($this->request->is('post')) {

			// debug($this->request->data);


			$data['EblastApp']['user_id'] = $this->Auth->user('dealer_id');
			$data['EblastApp']['created_by'] = $this->Auth->user('id');

			$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
			if(is_array($eblat_app_multiple)){
				asort($eblat_app_multiple);
				$data['EblastApp']['group_ids'] = implode(",", $eblat_app_multiple);
			}


			$data['EblastApp']['campaign_name'] = $this->request->data['EblastApp']['campaign_name'];
			// $data['Eblasts']['campaign_name'] = $this->request->data['Eblasts']['campaign_name'];

			list($template_id, $template_type) = explode('_', $this->request->data['template_id']);
			$data['EblastApp']['template_id'] = $template_id;
			$data['EblastApp']['template_type'] = $this->request->data['EblastApp']['template_type'];

      //Set From Full Name for This Eblast Based on the Email Template
      if(!empty($template_id)){
        $template_from_name = $this->TemplateApp->find('first', array(
          'conditions' => array('TemplateApp.template_id'=>$template_id)
        ));
        $data['EblastApp']['sender_address_name'] = $template_from_name['TemplateApp']['template_email_from_name'];
      }



			//$data['EblastApp']['form_filters'] = json_encode($this->request->data['EblastApp']);

			$this->request->data['EblastApp']['s_d_range']	= $this->request->data['s_d_range'];
			$this->request->data['EblastApp']['e_d_range']	= $this->request->data['e_d_range'];




	    	if($this->request->data['multiple_added_search'] != ''){
		    	$ar_list = json_decode( $this->request->data['multiple_added_search'] , true ) ;
		    	if(!empty($ar_list)){
		    		$src_cond_ar = array();
		    		foreach($ar_list as $multi_src){
		    			$src_cond_ar[] = $this->create_recipient_condition($multi_src);
		    		}
		    		$data['EblastApp']['form_filters'] = json_encode($src_cond_ar);

		    	}else{
		    		$rec_conditions = $this->create_recipient_condition($this->request->data['EblastApp']);
					$data['EblastApp']['form_filters'] = json_encode($rec_conditions);
		    	}

	    	}else{
	    		$rec_conditions = $this->create_recipient_condition($this->request->data['EblastApp']);
				$data['EblastApp']['form_filters'] = json_encode($rec_conditions);
	    	}




			$data['EblastApp']['created_date'] = date('Y-m-d H:i:s');
			$data['EblastApp']['list_id'] = $this->request->data['EblastApp']['list_id'];

			if($template_type=='N'){ //newletter, send periodically

				$data['EblastApp']['schedule_at'] = $this->request->data['EblastApp']['period'];
				$data['EblastApp']['day_no'] = $this->request->data['EblastApp']['day'];
				$data['EblastApp']['date_start'] = '';
				$data['EblastApp']['date_end'] = '';
				$Time =  "00:05:00";
				$data['EblastApp']['schedule_time'] = $Time;
				$data['EblastApp']['month'] = $this->request->data['EblastApp']['month'];


			}else{ // send one time only
				$data['EblastApp']['schedule_at'] = 'once';
				$tmpExplode1 = explode(" ",$this->request->data['EblastApp']['schedule_single_date']);
				$tmpExplode = explode("-",$tmpExplode1[0]);
				$tmpExplode1[1]  = date("H:i", strtotime($tmpExplode1[1]));
				$DateTime = $tmpExplode[2]."-".$tmpExplode[0]."-".$tmpExplode[1];
				$DateTime = date("Y-m-d H:i",strtotime($DateTime." ".$this->request->data['EblastApp']['schedule_time']));
				$data['EblastApp']['date_start'] = $DateTime;
				$data['EblastApp']['date_end'] = $DateTime;
				$data['EblastApp']['schedule_time'] = date("H:i",strtotime($DateTime));
				$data['EblastApp']['week_day'] = '';
				$data['EblastApp']['day_no'] = '';
				$data['EblastApp']['month'] = '';
			}

			$this->EblastApp->create();



			if ($this->EblastApp->save($data)) {
				$eblast_id = $this->EblastApp->getLastInsertId();
				//prx($this->request->data);
				if($template_type=='N'){
					$zone = $this->EblastApp->GetDealerZone($dealer_id);
					if($data['EblastApp']['schedule_at']=='yearly'){
						$schedule_unix_time = strtotime( "02-".$data['EblastApp']['month']."-".date("Y"). $data['EblastApp']['schedule_time']  );
						if($schedule_unix_time <= strtotime("now")){
							$new_year = date("Y")+1;
							$schedule_unix_time = strtotime( "02-".$data['EblastApp']['month']."-".$new_year.$data['EblastApp']['schedule_time']  );
						}
						$ScheduleDateTime = date("Y-m-d H:i:s",  $schedule_unix_time );
					}

					//die("$ScheduleDateTime");
					if($ScheduleDateTime!=''){
						$data['EblastApp']['date_start'] = $ScheduleDateTime;
					}
				}
				if($data['EblastApp']['date_start'] != ''){
					$receipient_conditions = $this->GetEblastRecipients('return_conditions');
					$Params = array('receipient_conditions'=>$receipient_conditions,
									'log_uid'=>$user_id);
					$this->EblastApp->ScheduleEblast($data,$Params,$eblast_id,$dealer_id);
				}

				$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
				$this->Session->setFlash(__('New '.$eblast_types[$this->request->data['EblastApp']['template_type']].' information saved!'), 'alert');
				$this->redirect(array('action' => 'eblasts_list', $this->request->data['EblastApp']['template_type']));
			}



		}

		//List Options
		$this->loadModel("List");
		if(is_array($eblat_app_multiple)){
			$list_condition = array('List.total_recipient <>' => '0', 'List.group_ids' => implode(",", $eblat_app_multiple) ) ;
		}else{
			$list_condition = array('List.total_recipient <>' => '0', 'List.dealer_id' => $dealer_id);
		}

		$lists = $this->List->find('all', array('fields'=>array('List.id','List.list_name', 'List.total_recipient'),'order'=>array('List.created DESC'),
			'conditions' => $list_condition  ));

		$list_option = array();
		foreach ($lists as $lst) {
			$list_option[ $lst['List']['id'] ] = $lst['List']['list_name']." ({$lst['List']['total_recipient']})";
		}
		$this->set('list_option', $list_option);
		//debug($list_option);



		//** Eblast Search **//
		$this->LoadModel("EblastAppSearch");
		$user_id = $this->Auth->user("id");

		if(is_array($eblat_app_multiple)){
			$conditions_search = array(
				'EblastAppSearch.dealer_id'=>implode(",", $eblat_app_multiple),
			);
		}else{
			$conditions_search = array(
				'EblastAppSearch.dealer_id'=>$dealer_id
			);
		}

//andi
		$this->LoadModel('EquitySearch');
		$this->EquitySearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User'))));
	 	$equitySearches = $this->EquitySearch->find('all', array('conditions' => array('EquitySearch.dealer_id'=>$dealer_id),'order'=>array('EquitySearch.id ASC') ));

		$this->EblastAppSearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User','foreignKey'=>'search_user_id'))));
	 	$marketingEquitySearches = $this->EblastAppSearch->find('all', array('conditions' => $conditions_search, 'order'=>array('EblastAppSearch.id ASC') ));

		$this->set('equitySearches', $equitySearches);
		$this->set('marketingEquitySearches', $marketingEquitySearches);

		//Get Status Headers
		$this->loadModel('LeadStatus');
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.header ASC','conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_headers = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_headers[$leadStatus['LeadStatus']['header']] = $leadStatus['LeadStatus']['header'];
		}
		$this->set('lead_status_headers', $lead_status_headers);
		//debug( $lead_status_headers );

		//Steps
		$this->loadModel("ContactStatus");
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);

		//Sources
		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('lead_sources_options', $lead_sources_options);

		$this->loadModel('DealerSetting');
		$show_user = $this->DealerSetting->get_settings('equity_sperson', $this->Auth->user('dealer_id') );
		$this->set('show_user', $show_user);


		$spersons = array();
		if(is_array($eblat_app_multiple)){
			foreach($eblat_app_multiple as $did){
				$spersons[ $did ] = $this->User->find('list', array('recursive'=>-1, 'order' =>'User.first_name', 'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=> $did )));
			}
		}else{
			$spersons = $this->User->find('list', array('recursive'=>-1, 'order' =>'User.first_name', 'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=> $this->Auth->user('dealer_id') )));
		}
		// // $spersons = array();
		// // if($show_user == 'On' || in_array($this->Auth->user('group_id'),array(2,6))){
		// 	$spersons = $this->User->find('list', array('recursive'=>-1, 'order' =>'User.first_name', 'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=> $this->Auth->user('dealer_id') )));
		// // }
		$this->set('spersons', $spersons);







	    //Preparing data for Select list of Makes

	        $this->loadModel ('XmlInventory');

	        $makeOptionsPre = $this->XmlInventory->find ('all',
	          array(
	            'fields'  => array('DISTINCT make'),
	            'conditions' => array (
	              'dealerid'  => $dealer_id
	            )));
	        $makeOptions = array();
	        foreach ($makeOptionsPre as $option) {
	          $makeOptions[$option['XmlInventory']['make']] = $option['XmlInventory']['make'];
	        }
	        $this->set('makeOptions', $makeOptions);

		// Get Category List
		$this->loadModel('Category');
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}
		$this->set('body_type', $body_type);
    }


    public function remove_search($equity_search_id,$search_source=null){
//andi
			switch($search_source){
				case 'eblast':
					$this->loadModel("EblastAppSearch");
	    		$this->EblastAppSearch->id = $equity_search_id;
					$this->EblastAppSearch->delete();
					break;
				case 'equity':
					$this->loadModel("EquitySearch");
					$this->EquitySearch->id = $equity_search_id;
					$this->EquitySearch->delete();
					break;
			}

			$dealer_id = $this->Auth->user("dealer_id");
			$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
			$equity_search_condition = array();
			if(is_array($eblat_app_multiple)){
				asort($eblat_app_multiple);
				$equity_search_condition['EblastAppSearch.dealer_id'] =  implode(",", $eblat_app_multiple);
			}else{
				$equity_search_condition['EblastAppSearch.dealer_id'] = $dealer_id;
			}

			$this->LoadModel('EquitySearch');
			$this->EquitySearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User'))));
			$equitySearches = $this->EquitySearch->find('all', array('conditions' => array('EquitySearch.dealer_id'=>$dealer_id),'order'=>array('EquitySearch.id ASC') ));
			$this->loadModel("EblastAppSearch");
			$this->EblastAppSearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User','foreignKey'=>'search_user_id'))));
			$marketingEquitySearches = $this->EblastAppSearch->find('all', array('conditions' => $equity_search_condition, 'order'=>array('EblastAppSearch.id ASC') ));

			$this->set('equitySearches', $equitySearches);
			$this->set('marketingEquitySearches', $marketingEquitySearches);
    }

    public function search_list_label($condition, $sales_step_options){

    	$label = array();
    	if(isset($condition['Contact.modified >='])){
    		$label[] = "Start: ".date('m-d-Y', strtotime($condition['Contact.modified >=']));
    	}
    	if(isset($condition['Contact.modified <='])){
    		$label[] = "End: ".date('m-d-Y', strtotime($condition['Contact.modified <=']));
    	}
    	if(isset($condition['Contact.status'])){
    		$label[] = "Status: ".$condition['Contact.status'];
    	}
    	if(isset($condition['Contact.lead_status'])){
    		$label[] = "Lead Status: ".$condition['Contact.lead_status'];
    	}
    	if(isset($condition['Contact.sales_step'])){
    		$label[] = "Step: ".$sales_step_options[$condition['Contact.sales_step']];
    	}
    	if(isset($condition['Contact.source'])){
    		$label[] = "Source: ".$condition['Contact.source'];
    	}
    	if(isset($condition['Contact.model LIKE'])){
    		$model = str_replace("%", "", $condition['Contact.model LIKE']);
    		$label[] = "Model: ".$model;
    	}
    	if(isset($condition['Contact.zip'])){
    		$label[] = "Zip: ".$condition['Contact.zip'];
    	}
    	if(isset($condition['Contact.est_payment_search'])){
    		$label[] = "Est Payment: ".$condition['Contact.est_payment_search'];
    	}

    	return implode(", ", $label)." ";
    }
    public function eblast_recipient(){

    	//Steps
		$this->loadModel("ContactStatus");
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));

    	if(isset($this->request->query['key'])){
    		$eblast_appid = base64_decode( $this->request->query['key']);
	    	$this->set('eblast_appid', $eblast_appid);

	    	$dealer_id = $this->Auth->user("dealer_id");
	    	$eblastApp = $this->EblastApp->find('first', array('conditions' => array('EblastApp.id'=>$eblast_appid)));

	    	$conditions_recipient = json_decode($eblastApp['EblastApp']['form_filters'], true);

	    	$multiple_list_ar = array();
	    	if(isset($conditions_recipient[0]) && count($conditions_recipient) > 1 ){
	    		foreach($conditions_recipient as $key => $value){
	    			$multiple_list_ar[$key] = "List# ".($key+1)." - ".$this->search_list_label($value, $sales_step_options);
	    		}
	    	}
	    	$this->set('multiple_list_ar', $multiple_list_ar);

	    	$cond_recipient = array();
	    	if(!isset($conditions_recipient[0])){
	    		$cond_recipient = $conditions_recipient;
	    	}else if(isset($conditions_recipient[0]) && isset($this->request->query['list_index'])){
	    		$cond_recipient = $conditions_recipient[ $this->request->query['list_index'] ];
	    	}else if(isset($conditions_recipient[0]) && !isset($this->request->query['list_index'])){
	    		$cond_recipient = $conditions_recipient[0];
	    	}
	    	$contacts = array();
	    	if(!empty($cond_recipient)){

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
					'Contact.created',
					'Contact.modified',
					'Contact.mobile',
					'Contact.phone',
					'Contact.work_number',
					'Contact.address',
					'Contact.city',
					'Contact.state',
					'Contact.zip',
					'Contact.email',
					'Contact.sperson',
					'Contact.owner',
					'Contact.notes',
					'Contact.lead_status',
					'Contact.status',
					'Contact.sales_step',
					'Contact.source',
					'Contact.user_id',
					'Contact.dnc_status',
					'Contact.chk_duplicate',
					'Contact.company',
					'Contact.company_id',

				);

		    	$this->paginate = array(
					'conditions' => $cond_recipient,
					'fields'=>$fields,
					'order'=>"Contact.id ASC",
					'limit' => 50,
				);

				$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);
				$contacts = $this->Paginate('Contact');
				// debug( $contacts );
	    	}
	    	$this->set('contacts', $contacts);



    	}

    	if(isset($this->request->query['list_key'])){
    		$list_id = base64_decode( $this->request->query['list_key']);
    		$this->set('list_id', $list_id);
    		$eblast_appid = base64_decode( $this->request->query['eblast_appid']);
    		$this->set('eblast_appid', $eblast_appid);


    		$this->loadModel("Recipient");

    		$conditions['Recipient.list_id'] = $list_id;
			$this->paginate = array(
				'conditions' => $conditions,
				'order' => array('Recipient.id'=>'DESC'),
				'limit' => 30,
			);
			$recipients = $this->Paginate("Recipient");
			$this->set('recipients', $recipients);

    	}


    	$this->layout = "ajax";

    }

    public function eblast_generate_multiple(){
		$ar_list = json_decode( '[{"s_d_range":"2015-03-01","e_d_range":"2015-04-01","search_status":"Bought Craigslist-Closed","search_lead_type":"All","search_model":"","search_zip":"","search_est_payment_search":"","search_source":"","search_sales_step":"","search_type":"","search_name":"","search_status_header":"Dead Lead (Closed)"},{"s_d_range":"2015-09-01","e_d_range":"2015-10-01","search_status":"Shopping-Floor","search_lead_type":"All","search_model":"","search_zip":"","search_est_payment_search":"","search_source":"","search_sales_step":"4","search_type":"","search_name":"","search_status_header":"Showroom (Open)"}]', true ) ;
    	debug( $ar_list );

    	if(!empty($ar_list)){
    		foreach($ar_list as $multi_src){
    			$src_cond = $this->create_recipient_condition($multi_src);
    			debug($src_cond);
    		}

    	}


    }

    public function create_recipient_condition($src_params){

    	//Restrict Sales Person
		$this->loadModel('DealerSetting');
		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		// debug( $restrict_eblast_salesperson );

    	$conditions = array();

		$conditions["Contact.modified >="] = $src_params['s_d_range']." 00:00:00";
    	$conditions["Contact.modified <="] = $src_params['e_d_range']." 23:59:59";
    	if( $src_params['search_status'] != '' ){
    		$conditions["Contact.status"] = $src_params['search_status'];
    	}
    	if( $src_params['search_lead_type'] == 'Open' ){
    		$conditions["Contact.lead_status"] = "Open";
    	}
    	if( $src_params['search_lead_type'] == 'Closed' ){
    		$conditions["Contact.lead_status"] = "Closed";
    	}
    	if( $src_params['search_lead_type'] == 'Sold' ){
    		$conditions["Contact.sales_step"] = "10";
    	}
    	if( trim($src_params['search_model']) != '' ){
    		$conditions["Contact.model LIKE"] = "%".trim($src_params['search_model'])."%";
    	}

        if(trim($src_params['search_full_name']) != ''){
            $conditions['OR'] = array('Contact.first_name LIKE'=>"%".trim($src_params['search_full_name'])."%", 'Contact.last_name LIKE'=>"%".trim($src_params['search_full_name'])."%");
        }

    	if( trim($src_params['search_zip']) != '' ){
    		$conditions["Contact.zip"] = trim($src_params['search_zip']);
    	}

	    if( trim($src_params['search_make']) != '' ){
	        		$conditions["Contact.make"] = trim($src_params['search_make']);
	        	}
        if($src_params['search_comment'] != ''){
            $conditions['Contact.notes LIKE'] = "%".$src_params['search_comment']."%";
        }

		if( $src_params['search_est_payment_search'] != '' ){
    		$conditions["Contact.est_payment_search"] = $src_params['search_est_payment_search'];
    	}
    	if( $src_params['search_source'] != '' ){
    		$conditions["Contact.source"] = $src_params['search_source'];
    	}
    	if( $src_params['search_sales_step'] != '' ){
    		$conditions["Contact.sales_step"] = $src_params['search_sales_step'];
    	}

		if( !empty($src_params['search_type'])){
    		$conditions["Contact.type"] = $src_params['search_type'];
    	}

    	$dealer_id = $this->Auth->user("dealer_id");
		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$conditions['Contact.company_id'] =  $eblat_app_multiple;
		}else{
			$conditions['Contact.company_id'] = $dealer_id;
		}

		if( !empty($src_params['search_user_id'])){
    		$conditions["Contact.user_id"] = $src_params['search_user_id'];
    	}

		if(empty($conditions["Contact.user_id"]) && $restrict_eblast_salesperson == 'On' && !in_array($this->Auth->user('group_id'), array('2','4','6','7','9','12','13'))  ){
			$conditions['Contact.user_id'] = $this->Auth->user('id');
		}



    	//$conditions['User.active'] = 1;  //Removing to allow users to look for leads that haven't been assigned to a salesperson yet.
    	$conditions['Contact.email <>'] = '';
    	$conditions['Contact.dnc_status <>'] = array("not_email",'no_call_email');


    	if(!isset($conditions['Contact.status'])){
    		$conditions['Contact.status <>'] = 'Duplicate-Closed';
    	}

    	return $conditions;

    }
    public function do_equity_search($equity_search_id = null, $search_source = null){

    	$dealer_id = $this->Auth->user("dealer_id");
		$this->loadModel("DealerSetting");

		$workload_order = $this->DealerSetting->get_settings('workload_order', $dealer_id);
		if($workload_order == 'On'){
			$lead_order = "Contact.modified asc ";
		}else{
			$lead_order = "Contact.modified desc ";
		}
		$show_user = $this->DealerSetting->get_settings('equity_sperson', $this->Auth->user('dealer_id') );
		//debug($show_user);


		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		$this->set('restrict_eblast_salesperson', $restrict_eblast_salesperson);


		$conditions = array();

    	if($equity_search_id != null){

//andi
						switch($search_source){
							case 'eblast':
								$this->loadModel("EblastAppSearch");
								$equitySearches = $this->EblastAppSearch->find('first', array('conditions' => array('EblastAppSearch.id'=>$equity_search_id)));

								break;
							case 'equity':
								$this->loadModel("EquitySearch");
								$eqSearches = $this->EquitySearch->find('first', array('conditions' => array('EquitySearch.id'=>$equity_search_id)));
								// debug($eqSearches);


								$equitySearches['EblastAppSearch'] = $eqSearches['EquitySearch'];

								break;
						}

	    	$this->set('equitySearches', $equitySearches);

	    	$src_params = 	$equitySearches['EblastAppSearch'];
	    	$src_params['s_d_range'] = $equitySearches['EblastAppSearch']['date_start'];
	    	$src_params['e_d_range'] = $equitySearches['EblastAppSearch']['date_end'];
	    	$conditions = $this->create_recipient_condition($src_params);

	    }else{
			$src_params = $this->request->query;
			$conditions = $this->create_recipient_condition($src_params);
	    }

	    if(!empty($conditions)){
	    	// debug($conditions);
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
				'Contact.created',
				'Contact.modified',
				'Contact.mobile',
				'Contact.phone',
				'Contact.work_number',
				'Contact.address',
				'Contact.city',
				'Contact.state',
				'Contact.zip',
				'Contact.email',
				'Contact.sperson',
				'Contact.owner',
				'Contact.notes',
				'Contact.lead_status',
				'Contact.status',
				'Contact.sales_step',
				'Contact.source',
				'Contact.user_id',
				'Contact.dnc_status',
				'Contact.chk_duplicate',

			);

	    	$this->paginate = array(
				'conditions' => $conditions,
				'fields'=>$fields,
				'order'=>$lead_order,
				'limit' => 20,
			);


			//$this->set('contacts', $contacts);


			if($equity_search_id != null){
				$my_unique_cache_id =  $dealer_id."_equity_".$equity_search_id;
				$my_unique_cache_id_paging =  $dealer_id."_equity_paging_".$equity_search_id;

				$page = !isset($this->request->named['page']) ? '1' : $this->request->named['page'];
				Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				$contacts = Cache::read($my_unique_cache_id . $page, $this->Memcache_config);
				Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				$paging = Cache::read($my_unique_cache_id_paging . $page, $this->Memcache_config);

				if ($contacts && $paging) {
				    $this->set('contacts', $contacts);
				    $this->request->params['paging'] = $paging;
				}else{

					$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);
					$contacts = $this->Paginate('Contact');

				    Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				    Cache::write($my_unique_cache_id_paging . $page, $this->request->params['paging'], $this->Memcache_config);
				    Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				    Cache::write($my_unique_cache_id . $page, $contacts, $this->Memcache_config);
				    $this->set('contacts', $contacts);

				}

			}else{
				$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);
				$contacts = $this->Paginate('Contact');
				$this->set('contacts', $contacts);

			}

			//debug($contacts);
		}else{
			$this->set('contacts', array());
		}

		$this->loadModel("ContactStatus");
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);



    }


    public function save_search(){

    	$this->loadModel("EblastAppSearch");

    	$dealer_id = $this->Auth->user("dealer_id");
    	$eblat_app_multiple = $this->Session->read('eblat_app_multiple');

    	//debug($this->request->data);
    	if(!empty($this->request->data)){

    		$src_data = array('EblastAppSearch'=>array(
    			'date_start' => $this->request->data['s_d_range'],
    			'date_end' => $this->request->data['e_d_range'],
    			'search_lead_type' => $this->request->data['search_lead_type'],
				'search_header' => $this->request->data['search_status_header'],
    			'search_status' => $this->request->data['search_status'],
    			'search_model' => $this->request->data['search_model'],
    			'search_zip' => $this->request->data['search_zip'],
    			'search_name' => $this->request->data['search_name'],

    			'search_sales_step' => $this->request->data['search_sales_step'],
    			'search_est_payment_search' => $this->request->data['search_est_payment_search'],
    			'search_source' => $this->request->data['search_source'],
				'search_type' => $this->request->data['search_type'],
				'search_user_id' => $this->Auth->User('id')
    		));



			if(is_array($eblat_app_multiple)){
				asort($eblat_app_multiple);
				$src_data['EblastAppSearch']['dealer_id'] =  implode(",", $eblat_app_multiple);
			}else{
				$src_data['EblastAppSearch']['dealer_id'] = $dealer_id;
			}


    		// debug($src_data);
			$this->EblastAppSearch->create();
			$this->EblastAppSearch->save($src_data);
    	}


    	$equity_search_condition = array();
		if(is_array($eblat_app_multiple)){
			$equity_search_condition['EblastAppSearch.dealer_id'] =  implode(",", $eblat_app_multiple);
		}else{
			$equity_search_condition['EblastAppSearch.dealer_id'] = $dealer_id;
		}

//andi


		$this->LoadModel('EquitySearch');
		$this->EquitySearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User'))));
		$equitySearches = $this->EquitySearch->find('all', array('conditions' => array('EquitySearch.dealer_id'=>$dealer_id),'order'=>array('EquitySearch.id ASC') ));
		$this->EblastAppSearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User','foreignKey'=>'search_user_id'))));
		$marketingEquitySearches = $this->EblastAppSearch->find('all', array('conditions' => $equity_search_condition, 'order'=>array('EblastAppSearch.id ASC') ));

		$this->set('equitySearches', $equitySearches);
		$this->set('marketingEquitySearches', $marketingEquitySearches);

    }











	public function send_test_email(){

		if($this->request->data['emails'] != ''){

			$email_from_id = 'info@dp360crm.com';
			if( !empty($this->request->data['template_email_from']) && filter_var(trim($this->request->data['template_email_from']), FILTER_VALIDATE_EMAIL) ){
				$email_from_id = trim($this->request->data['template_email_from']);
			}

			$addresses = array();
			$keywords = preg_split("/[\s,;]+/", $this->request->data['emails']);
			foreach($keywords as  $keyword){
				if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
					$addresses[] = $keyword;
				}
			}

			foreach($addresses as $address){

				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				//$email->config('smtp_amazon');
        $email->config('notifications_gmail');
				$email->viewVars(array(
					'unsubscribe_url'=>"#",
					'email'=>"#",
					'email_from'=>"#",
					'template_content'=>$this->request->data['template']
				));
				$email->template('eblast')
					->emailFormat('html')
					->subject( $this->request->data['subject'] )
					->to($address)
					->from($email_from_id)
					->send();
			}
		}
		$this->autoRender = false;
	}

	public function unsubscribe($contact_id) {
		$this->layout = 'default_login';
		$contact = $this->Contact->find('first',array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id),'fields'=>array('Contact.email')));
		//debug($contact);
		if(!empty($contact)){
			$count = $this->EblastUnsubscribe->find('count', array('conditions'=>array('EblastUnsubscribe.contact_id'=>$contact_id)));
			if($count == 0){
				 $this->EblastUnsubscribe->create();
				  $this->EblastUnsubscribe->save(array('EblastUnsubscribe'=>array('contact_id'=>$contact_id,'email'=>$contact['Contact']['email'])));
			}
		}
	}
	private function __sendemail($eblast, $current_date_time){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$this->Eblast->updateAll( array('last_run' => "'".$current_date_time."'"), array('Eblast.eblasts_id' => $eblast['Eblast']['eblasts_id'] ));
		//debug("email sent");

		//Search contacts
		$form_filters = json_decode( $eblast['Eblast']['form_filters'] );
		$this->passedArgs =  get_object_vars( $form_filters );
		if ($this->passedArgs) {
			$args = $this->passedArgs;
			if (isset($args['search_name'])) {
				$searched = true;
			}
		}
		$current_user_id = $this->Auth->User('id');
		$group_id = $this->Auth->user('group_id');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->passedArgs['user_id'] = $current_user_id;
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
		$conditions = array();

		$conditions = array($this->Contact->parseCriteria($this->passedArgs));
		$subQuery = ' `Contact`.`id` NOT IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
		$conditions[] = $subQuery;

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
			'Contact.model_id',
			'Contact.zip',
			'Contact.email',
			'Contact.lead_status',
		);
		$contacts = $this->Contact->find('all', array('fields'=>$fields, 'conditions' => $conditions, 'order' => array('Contact.id' => 'DESC')));
		$totalSent = 0;
		$contactIds = array();

		App::uses('CakeEmail', 'Network/Email');

		if(count($contacts)) {
			$blastFields = array( 'to_user_id' );
			$blastConditions = array('success'=>1,'user_id' => $eblast['Eblast']['user_id'], 'template_id' => $eblast['Eblast']['template_id'],
									  "sent_date NOT BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()" );
			$sentEmails = $this->EblastsSent->find( 'all', array('fields'=> $blastFields, 'conditions' => $blastConditions) );
			$sentIds = array();
			foreach( $sentEmails as $sentEmail ) {
				$sentIds[] = $sentEmail['EblastsSent']['to_user_id'];
			}

			$templatesConditions = array('template_id' => $eblast['Eblast']['template_id'], 'template_status' => '1');
			$templates = $this->Template->find('first', array('conditions' => $templatesConditions ));
			$templateHtml = $templates['Template']['template_html'];

			foreach( $contacts as $eachContact ) {

				if($eachContact['Contact']['email']=='' || in_array($eblast['Eblast']['user_id'], $sentIds)   ) {
					continue;
				}

				//Specs variable
				$specification = array();
				if( $eachContact['Contact']['model_id'] != '' ){
					$this->loadModel('Specification');
					$this->loadModel('Trim');
					$trim = $this->Trim->find("first", array('conditions'=>array('Trim.model_id'=>$eachContact['Contact']['model_id'])));
					if(!empty($trim)){
						$specs = $this->Specification->find("first", array('conditions'=>array('Specification.trim_id'=> $trim['Trim']['id']  )));
						$specification = !empty($specs)? json_decode($specs['Specification']['attributes']) : "" ;
					}
				}

				$specs = "";
				if(!empty($specification)){
					$specs  = '<br /><h2>Specifications</h2><table class="table table-striped table-responsive swipe-horizontal "><tbody>';
					foreach($specification as $sp){
						$specs .='<tr class="gradeA"><td>'.$sp->Name.'</td><td>'.$sp->Value.'</td></tr>';
					}
					$specs  .= '</tbody></table><br />';
				}
				$eachContact['Contact']['specs'] = $specs;

				$templateValuedHtml = $templateHtml;
				foreach($eachContact['Contact'] as $key => $value) {
					$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
				}
				if(isset($eachContact['Deals'])) {
					foreach($eachContact['Deals'] as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}
				}
				//debug($templates);
				//debug($eachContact);
				//debug($templateValuedHtml); info@crmmain.com"

				$email = new CakeEmail();
				$email->config('smtp_amazon');
				$email->viewVars(array(
					'unsubscribe_url'=>'http://crmmain.com/eblasts/unsubscribe/'.$eachContact['Contact']['id'],
					'email'=>$eachContact['Contact']['email'],
					'email_from'=>$templates['Template']['template_email_from_id'],
					'template_content'=>$templateValuedHtml
				));

				$email->template('eblast')
					->emailFormat('html')
					->subject( $templates['Template']['template_email_subject'] )
					->to($eachContact['Contact']['email'])
					//->to('russel@dp360crm.com')
					->from($templates['Template']['template_email_from_id']);
				$success = 0;
				try {
					$email_sent = $email->send();
					$success = 1;
					$totalSent++;
				} catch (Exception $e) {
				}
				$contactIds[] = array('eblast_id'=>$eblast['Eblast']['eblasts_id'],'success'=>$success,'template_type'=>$eblast['Eblast']['template_type'],'dealer_id'=>$dealer_id,'user_id'=>$eblast['Eblast']['user_id'],'to_user_id'=>$eachContact['Contact']['id'],'template_id'=>$eblast['Eblast']['template_id'],'sent_date'=>$current_date_time);
			}
			$this->EblastsSent->saveMany($contactIds);
		}
		return $totalSent;
	}

	public function run_cron($current_date_time=null) {

		//$this->autoRender = false;
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

		//$current_date_time = date('2014-05-23 21:11:17');
		$current_date_time = date('Y-m-d H:i:s', strtotime('now'));

		$current_date = date('Y-m-d 00:00:00', strtotime($current_date_time));
		$current_time = strtotime($current_date_time);

		$conditions = array( 'Eblast.user_id' => $this->Auth->user('dealer_id'), 'Eblast.date_start <=' => $current_date, 'Eblast.date_end >=' => $current_date);
		$eblasts = $this->Eblast->find('all', array('conditions' => $conditions));
		//debug($eblasts);
		$totalSent = 0;
		foreach($eblasts as $eblast) {
			$form_filters = json_decode( $eblast['Eblast']['form_filters'] );
			if($form_filters->send_every == 0) {
				// One time Cron condition
				if($eblast['Eblast']['last_run'] == ''){
					$totalSent += $this->__sendemail($eblast, $current_date_time);
				}
			}
			if($form_filters->send_every > 0) {
				//run first time
				if($eblast['Eblast']['last_run'] == ''){
					$totalSent += $this->__sendemail($eblast, $current_date_time);
				}else if($eblast['Eblast']['last_run'] != ''){
					$last_time = strtotime($eblast['Eblast']['last_run']);
					$difference = ($current_time - $last_time) / 3600;
					if($difference >= $form_filters->send_every){
						$totalSent += $this->__sendemail($eblast, $current_date_time);
					}
				}
			}
		}

		echo " Total Sent E-Mails: " . $totalSent;

	}




	private function testsendemail($eblast, $current_date_time){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		//$this->Eblast->updateAll( array('last_run' => "'".$current_date_time."'"), array('Eblast.eblasts_id' => $eblast['Eblast']['eblasts_id'] ));
		//debug("email sent");

		//Search contacts
		$form_filters = json_decode( $eblast['Eblast']['form_filters'] );
		$this->passedArgs =  get_object_vars( $form_filters );
		if ($this->passedArgs) {
			$args = $this->passedArgs;
			if (isset($args['search_name'])) {
				$searched = true;
			}
		}
		$current_user_id = $this->Auth->User('id');
		$group_id = $this->Auth->user('group_id');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->passedArgs['user_id'] = $current_user_id;
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
		$conditions = array();

		$conditions = array($this->Contact->parseCriteria($this->passedArgs));
		$subQuery = ' `Contact`.`id` NOT IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
		$conditions[] = $subQuery;

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

		$contacts_data = array();

		App::uses('CakeEmail', 'Network/Email');

		if(count($contacts)) {
			$blastFields = array( 'to_user_id' );
			$blastConditions = array('success'=>1,'user_id' => $eblast['Eblast']['user_id'], 'template_id' => $eblast['Eblast']['template_id'],
									  "sent_date NOT BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()" );

			$sentEmails = $this->EblastsSent->find( 'all', array('fields'=> $blastFields, 'conditions' => $blastConditions) );
			$sentIds = array();
			foreach( $sentEmails as $sentEmail ) {
				$sentIds[] = $sentEmail['EblastsSent']['to_user_id'];
			}

			$templatesConditions = array('template_id' => $eblast['Eblast']['template_id'], 'template_status' => '1');
			$templates = $this->Template->find('first', array('conditions' => $templatesConditions ));
			$templateHtml = $templates['Template']['template_html'];

			foreach( $contacts as $eachContact ) {

				if($eachContact['Contact']['email']=='' || in_array($eblast['Eblast']['user_id'], $sentIds)   ) {
					continue;
				}
				$templateValuedHtml = $templateHtml;
				foreach($eachContact['Contact'] as $key => $value) {
					$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
				}
				if(isset($eachContact['Deals'])) {
					foreach($eachContact['Deals'] as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}
				}
				// Send email
				$contacts_data[] = $eachContact;
			}

		}
		return $contacts_data;
	}

	public function test_cron($current_date_time_url = null) {

		$this->layout = 'default_new';

		$group_id = $this->Auth->user('group_id');
		if ($group_id != 1) {
			$this->redirect('dashboards', 'main');
		}

		//$this->autoRender = false;
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

		//$current_date_time = date('2014-04-12 21:11:17');
		if($current_date_time_url == ''){
			$current_date_time = date('Y-m-d H:i:s', strtotime('now'));
		}else{
			$current_date_time = $current_date_time_url." 00:00:00";
		}

		$current_date = date('Y-m-d 00:00:00', strtotime($current_date_time));
		$current_time = strtotime($current_date_time);

		$conditions = array( 'Eblast.user_id' => $this->Auth->user('dealer_id'), 'Eblast.date_start <=' => $current_date, 'Eblast.date_end >=' => $current_date);

		$this->Eblast->bindModel(array('belongsTo'=>array(
			'User'=>array('foreignKey'=>false,'conditions'=>"Eblast.created_by = User.id"),
			'Template'

		)));

		$fields = array(
			'Eblast.eblasts_id',
			'Eblast.user_id',
			'Eblast.campaign_name',
			'Eblast.form_filters',
			'Eblast.template_id',
			'Eblast.template_type',
			'Eblast.date_start',
			'Eblast.date_end',
			'Eblast.created_date',
			'Eblast.last_run',
			'(SELECT COUNT(*) FROM eblasts_sents WHERE success = 1 AND eblast_id = Eblast.eblasts_id ) as sent_num',
		);
		$eblasts = $this->Eblast->find('all', array('fields'=>$fields,'conditions' => $conditions));
		//debug($eblasts);

		$eblast_list = array();
		foreach($eblasts as $eblast) {

			$form_filters = json_decode( $eblast['Eblast']['form_filters'] );

			if($form_filters->send_every == 0) {
				// One time Cron condition
				//if($eblast['Eblast']['last_run'] == ''){
					$eblast_list[$eblast['Eblast']['eblasts_id']] = $eblast;
					$eblast_list[$eblast['Eblast']['eblasts_id']]['Contacts'] = $this->testsendemail($eblast, $current_date_time);
				//}
			}
			if($form_filters->send_every > 0) {
				//run first time
				$eblast_list[$eblast['Eblast']['eblasts_id']] = $eblast;
				$eblast_list[$eblast['Eblast']['eblasts_id']]['Contacts'] = $this->testsendemail($eblast, $current_date_time);
				/*
				if($eblast['Eblast']['last_run'] == ''){
					$eblast_list[$eblast['Eblast']['eblasts_id']] = $eblast;
					$eblast_list[$eblast['Eblast']['eblasts_id']]['Contacts'] = $this->testsendemail($eblast, $current_date_time);
				}else if($eblast['Eblast']['last_run'] != ''){
					$last_time = strtotime($eblast['Eblast']['last_run']);
					$difference = ($current_time - $last_time) / 3600;
					if($difference >= $form_filters->send_every){
						$eblast_list[$eblast['Eblast']['eblasts_id']] = $eblast;
						$eblast_list[$eblast['Eblast']['eblasts_id']]['Contacts'] = $this->testsendemail($eblast, $current_date_time);
					}
				}
				*/
			}


		}
		$this->set('eblast_list', $eblast_list);
	}

	/*
	public function statistics($stats_month=null){
		$SendgridCred = Configure::read('Sendgrid');
		$this->user = $SendgridCred['user'];
		$this->pass = $SendgridCred['pass'];
		$this->layout='default_new';
		if($stats_month==null){
			$stats_month = date('m');
		}
		$first_day_this_month = date('Y-m-01', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-d', strtotime(date("Y")."-".$stats_month."-".date("d")));
		$url = 'https://api.sendgrid.com/api/stats.get.json?api_user='.$this->user.'&api_key='.$this->pass.'&start_date='.$first_day_this_month.'&end_date='.$last_day_this_month;
		$response = file_get_contents($url);
		$response = json_decode($response);
		$response = (array)$response;
		$this->set('statistics',$response);
	}
	*/


	public function get_dealer_steps(){
		$dealer_id = $this->Auth->User('dealer_id');
		$step_procces = $this->Auth->User('step_procces');

		$this->loadModel('StepDefinition');
		$current_definition = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.dealer_id'=> $dealer_id ) ));
		$step_map = array();
		foreach($current_definition as $cd){
			$step_map[ $cd['StepDefinition']['step_id'] ] = $cd['StepDefinition'];
		}
		//debug($step_map);

		$this->loadModel('SalesStep');
		$step_cond = array();
		if($step_procces == 'lemco_steps'){
			$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		}else{
			$step_cond = array('SalesStep.step_process'=>'hd_steps');
		}
		$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		//debug( $sales_steps );

		$sales_step_options_popup = array();
		foreach($sales_steps as $sales_step){

			$step_label =  $sales_step['SalesStep']['step'];

			if(isset( $step_map[  $sales_step['SalesStep']['id']  ]    )){
				$step_label = $step_map[  $sales_step['SalesStep']['id']  ]['custom_name'];
				if( !$step_map[  $sales_step['SalesStep']['id']  ]['visible']  ){
					continue;
				}
			}
			$sales_step_options_popup [ $sales_step['SalesStep']['id'] ] =  $step_label;
		}

		return  $sales_step_options_popup;


	}


	public function autoresponders_stats(){
		$dealer_id = $this->Auth->user('dealer_id');
		//debug($dealer_id);

		$this->loadModel("AutoresponderRule");

		$this->AutoresponderRule->bindModel(array(
			'belongsTo'=>array(
				'ContactStatus'=>array(
					'foreignKey' => false,
					'conditions' => array("AutoresponderRule.search_contact_status_id = ContactStatus.id")
				),
				'Template'
			),
		));

		$autoresponder_results = $this->AutoresponderRule->find('all',array('conditions'=>array('dealer_id'=>$dealer_id)));
		$this->set('autoresponder_results',$autoresponder_results);
		//debug( $autoresponder_results );
		$this->set('sales_step_options',  $this->get_dealer_steps() );

		$this->loadModel('SendgridAutoStatistic');

		//Get Statistics
		$eblast_statistics = array();
		foreach($autoresponder_results as $autor){

			$stats = $this->SendgridAutoStatistic->query("select
			sum(event_type = 'processed') as processed,
			sum(event_type = 'bounced') as bounced,
			sum(event_type = 'delivered') delivered,
			sum(event_type = 'deferred') deferred,
			sum(event_type = 'open') `open`,
			sum(event_type = 'dropped') `dropped`,
			sum(event_type = 'click') `click`,
			sum(event_type = 'spamreport') `spamreport`,
			sum(event_type = 'unsubscribe') `unsubscribe`
			from sendgrid_auto_statistics where autoresponder_id = :autoresponder_id  ;", array('autoresponder_id' => $autor['AutoresponderRule']['id']   ) );
			$eblast_statistics[ $autor['AutoresponderRule']['id'] ] = $stats[0][0];
		}

		$this->set('eblast_s', $eblast_statistics);








	}

	public function eblast_stats($type = '', $eblastapp_id = null){

		$this->loadModel('DealerSetting');
		$restrict_eblast_salesperson = $this->DealerSetting->get_settings('restrict_eblast_salesperson', $this->Auth->user('dealer_id') );
		// debug( $restrict_eblast_salesperson );

		$this->loadModel('SendgridappStatistic');
		$dealer_id = $this->Auth->user('dealer_id');

		$this->loadModel('EblastStatistic');
		$this->EblastStatistic->useDbConfig  =  'eblast_rds';

		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$conditions = array(
				'EblastApp.group_ids'=>implode(",", $eblat_app_multiple),
				'EblastApp.scheduled' => '1',
				'EblastApp.template_type' => $type
			);
		}else{
			$conditions = array(
				'EblastApp.user_id'=>$dealer_id,
				'EblastApp.scheduled' => '1',
				'EblastApp.template_type' => $type
			);
			$conditions['OR']  = array('EblastApp.group_ids is null', 'EblastApp.group_ids' =>   '');
		}
		if($eblastapp_id != ''){
			$conditions['EblastApp.id'] = $eblastapp_id;
		}

		if($restrict_eblast_salesperson == 'On' && !in_array($this->Auth->user('group_id'), array('2','4','6','7','9','12','13'))  ){
			$conditions['EblastApp.created_by'] = $this->Auth->user('id');
		}
		// debug($conditions);

		$this->paginate = array(
			'conditions' => $conditions,
			'order' =>'EblastApp.id DESC',
			'limit' => 30,
		);
		$eblasts = $this->Paginate("EblastApp");
		$this->set('eblasts', $eblasts);

		//debug($eblasts);

		//Get Statistics
		$eblast_statistics = array();
		foreach($eblasts as $ebs){

			// debug($ebs);
			$stats = $this->EblastStatistic->query("select
			sum(event_type = 'send') as processed,
			sum(event_type in ('soft_bounce', 'hard_bounce')) as bounced,
			sum(event_type = 'deferral') deferred,
			sum(event_type = 'open') `open`,
			sum(event_type = 'click') `click`,
			sum(event_type = 'spam') `spamreport`,
			sum(event_type = 'unsub') `unsubscribe`
			from eblast_statistics where eblasts_id = :eblasts_id  ;", array('eblasts_id' => $ebs['EblastApp']['id']) );

			$open_stats = $this->EblastStatistic->query("select count(distinct recipient_id) as openstat from eblast_statistics where eblasts_id = :eblasts_id and event_type = 'open';", array('eblasts_id' => $ebs['EblastApp']['id']) );
			$open_stats_c = $this->EblastStatistic->query("select count(distinct contact_id) as openstat from eblast_statistics where eblasts_id = :eblasts_id and event_type = 'open';", array('eblasts_id' => $ebs['EblastApp']['id']) );

			$click_stats = $this->EblastStatistic->query("select count(distinct recipient_id) as openstat from eblast_statistics where eblasts_id = :eblasts_id and event_type = 'click';", array('eblasts_id' => $ebs['EblastApp']['id']) );
			$click_stats_c = $this->EblastStatistic->query("select count(distinct contact_id) as openstat from eblast_statistics where eblasts_id = :eblasts_id and event_type = 'click';", array('eblasts_id' => $ebs['EblastApp']['id']) );

			$stats[0][0]['open'] = $open_stats[0][0]['openstat'] + $open_stats_c[0][0]['openstat'];
			$stats[0][0]['click'] = $click_stats[0][0]['openstat'] + $click_stats_c[0][0]['openstat'];

			$eblast_statistics[ $ebs['EblastApp']['id'] ] = $stats[0][0];

		}

		// debug($eblast_statistics);

		$this->set('eblast_s', $eblast_statistics);


	}

	public function statistics($eblastapp_id=null){
		 $this->layout='marketing_default';

		 $eblastapp = $this->EblastApp->find("first", array("conditions"=>array("EblastApp.id" => $eblastapp_id)));
		 //debug($eblastapp);
		 $this->set('eblastapp', $eblastapp);

	}

	public function add_statistics(){
		// $this->loadModel('SendgridStatistic');
		// $contacts = $this->Contact->query('select Sent, Opened, Clicked, `Email Address`, created from Sunridge_STAGE12');

		// //debug($contacts);
		// foreach($contacts as $cnt){
		// 	$dcnt = $cnt['Sunridge_STAGE12'];
		// 	$stat_data = array('SendgridStatistic'=>array(
		// 		  'processed' => $dcnt['Sent']  ,
		// 		  'opened'  => $dcnt['Opened'],
		// 		  'clicked' => $dcnt['Clicked'] ,
		// 		  'email' =>$dcnt['Email Address'],
		// 		  'dealer_id' =>'33080',
		// 		  'eblasts_id' =>'1',
		// 		  'tstmp' => strtotime($dcnt['created']) ,
		// 		  'created' => $dcnt['created'] ,
		// 	));
		// 	$this->SendgridStatistic->create();
		// 	$this->SendgridStatistic->save($stat_data);

		// }



	}


	public function GetStatisticsCount($dealer_id,$start,$end,$countAll=false){
		$this->loadModel('SendgridStatistic');
		$dealer_id = $this->Auth->user('dealer_id');
		//
		$conditions = array('SendgridStatistic.tstmp >= ' => $start,'SendgridStatistic.tstmp <= ' => $end,'SendgridStatistic.eblasts_id > '=>0,'SendgridStatistic.dealer_id'=>$dealer_id);
		$statistics = $this->SendgridStatistic->find('all',array('conditions'=>$conditions));
		//$statistics = $this->SendgridStatistic->find('all');
		$StatisticsCount = array();
		/* Count date wise */
		foreach($statistics as $details){
			if($countAll===true){
				$date = 0; // count all
			}else{
				$date = date("Y-m-d",$details['SendgridStatistic']['tstmp']); // count day wise
			}
			if($details['SendgridStatistic']['processed']==1){
				$StatisticsCount[$date]['processed'] +=1;
			}

			if($details['SendgridStatistic']['dropped']==1){
				$StatisticsCount[$date]['dropped'] +=1;
			}

			if($details['SendgridStatistic']['deffered']==1){
				$StatisticsCount[$date]['deffered'] +=1;
			}


			if($details['SendgridStatistic']['delivered']==1){
				$StatisticsCount[$date]['delivered'] +=1;
			}


			if($details['SendgridStatistic']['bounced']==1){
				$StatisticsCount[$date]['bounced'] +=1;
			}

			if($details['SendgridStatistic']['opened']==1){
				$StatisticsCount[$date]['opened'] +=1;
			}


			if($details['SendgridStatistic']['clicked']==1){
				$StatisticsCount[$date]['clicked'] +=1;
			}

			if($details['SendgridStatistic']['unsubscribed']==1){
				$StatisticsCount[$date]['unsubscribed'] +=1;
			}

			if($details['SendgridStatistic']['spam']==1){
				$StatisticsCount[$date]['spam'] +=1;
			}

		}

		return $StatisticsCount;

	}

	function StatisticsDetails($type = null , $eblasts_id = null){


		$this->loadModel('EblastStatistic');
		$this->EblastStatistic->useDbConfig  =  'eblast_rds';

		$conditions = array('EblastApp.id'=>$eblasts_id);
		$eblast_sent_count = $this->EblastApp->find('first',array('fields'=>array("EblastApp.list_id", "EblastApp.id"), 'conditions'=>$conditions));

		//debug($eblast_sent_count);

		if($eblast_sent_count['EblastApp']['list_id'] == ''){

			if($type == 'bounced'){
				$type = array('soft_bounce', 'hard_bounce');
			}
			$conditions = array(
				'EblastStatistic.eblasts_id'=>$eblasts_id,
				'EblastStatistic.event_type'=>$type
			);

			if($type == 'open' || $type == 'click' ){
				$this->paginate = array(
					'conditions' => $conditions,
					"group" => 'EblastStatistic.contact_id',
					'order' => 'EblastStatistic.created DESC',
					'limit' => 50,
				);
			}else{
				$this->paginate = array(
					'conditions' => $conditions,
					'order' => 'EblastStatistic.created DESC',
					'limit' => 50,
				);
			}
			$statistics = $this->Paginate('EblastStatistic');
			// debug($statistics);
			$contact_ids =  Set::extract("/EblastStatistic/contact_id",$statistics);

			$this->loadModel('Contact');
			$fields = array(
				'Contact.id',
				'Contact.first_name',
				'Contact.m_name',
				'Contact.last_name',
				'Contact.mobile',
				'Contact.condition',
				'Contact.year',
				'Contact.make',
				'Contact.model',
				'Contact.status',
				'Contact.email'
			);
			$contacts = $this->Contact->find("all", array('fields' => $fields, 'recursive' => -1, "conditions" => array("Contact.id" => $contact_ids)));
			$contacts_all = array();
			foreach($contacts as $cts){
				$contacts_all[ $cts['Contact']['id'] ] = $cts['Contact'];
			}
			$statistics_all = array();
			foreach($statistics as $sts){
				$sts['Contact'] = isset($contacts_all[ $sts['EblastStatistic']['contact_id'] ])? $contacts_all[ $sts['EblastStatistic']['contact_id'] ] : array();
				$statistics_all[] = $sts;
			}
			$this->set('statistics', $statistics_all);

			$this->layout = 'ajax';
			$this->render("statistics_details_contact");

		}else{

			if($type == 'bounced'){
				$type = array('soft_bounce', 'hard_bounce');
			}
			$conditions = array(
				'EblastStatistic.eblasts_id'=>$eblasts_id,
				'EblastStatistic.event_type'=>$type
			);

			if($type == 'open' || $type == 'click' ){
				$this->paginate = array(
					'conditions' => $conditions,
					"group" => 'EblastStatistic.recipient_id',
					'order' => 'EblastStatistic.created DESC',
					'limit' => 50,
				);
			}else{
				$this->paginate = array(
					'conditions' => $conditions,
					'order' => 'EblastStatistic.created DESC',
					'limit' => 50,
				);
			}
			$statistics = $this->Paginate('EblastStatistic');

			$this->set('statistics', $statistics);

		}



		$this->layout = 'ajax';
	}


	function statistics_details_auto($type = null , $eblasts_id = null){

		//debug($type);

		$this->loadModel('SendgridAutoStatistic');
		$this->SendgridAutoStatistic->bindModel(array(
			'belongsTo'=>array('Contact'),
		));
		$statistics = $this->SendgridAutoStatistic->find("all", array("conditions"=>array(
			'SendgridAutoStatistic.autoresponder_id'=>$eblasts_id,
			'SendgridAutoStatistic.event_type'=>$type
		)));
		//debug($statistics);
		$this->set('statistics', $statistics);

		$this->layout = 'ajax';
	}

	public function GetStatistics($dealer_id,$start,$end,$type='all'){
		$this->loadModel('SendgridStatistic');
		$dealer_id = $this->Auth->user('dealer_id');
		if($type=='all'){
			$conditions = array('SendgridStatistic.tstmp >= ' => $start,'SendgridStatistic.tstmp <= ' => $end,'SendgridStatistic.dealer_id'=>$dealer_id,'SendgridStatistic.eblasts_id > '=>0);
		}else{
			//,'SendgridStatistic.eblasts_id > '=>0
			$conditions = array('SendgridStatistic.tstmp >= ' => $start,'SendgridStatistic.tstmp <= ' => $end,'SendgridStatistic.dealer_id'=>$dealer_id,$type=>1,'SendgridStatistic.eblasts_id > '=>0);
		}

		//prx($conditions);
		$this->SendgridStatistic->bindModel(array('hasOne' => array('Contact' => array(
					'foreignKey' => false,
					'conditions' => array('Contact.id = SendgridStatistic.contact_id')
				),
				'Eblast'=>array(
					'foreignKey' => false,
					'conditions' => array('Eblast.eblasts_id = SendgridStatistic.eblasts_id')
				),
				'AutoresponderRule'=>array(
					'foreignKey' => false,
					'conditions' => array('AutoresponderRule.id = SendgridStatistic.eblasts_id')
				)
				)));

		//$fields = array('SendgridStatistic.*','');
		$statistics = $this->SendgridStatistic->find('all',array('conditions'=>$conditions));
		return $statistics;

	}

	public function GetEblastRecipients($return=false){

		//debug($this->request->query['data']);

		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$searched = false;
        $selected_type = "";
		if(!isset($this->request->query['data'])){
			$this->request->query['data'] = $this->request['data'];
		}
		/* Unset if any is selected */
		$UnsetIndex = array('any category','any make','any year','any model','any class','');
		foreach($this->request->query['data']['EblastApp'] as $key=>$value){
			$value = trim(strtolower($value));
			if(in_array($value,$UnsetIndex)){
				unset($this->request->query['data']['EblastApp'][$key]);
			}elseif(is_numeric($value) && $value==0){
				unset($this->request->query['data']['EblastApp'][$key]);
			}

		}

		if(!empty($this->request->query)){
			if($this->request->query['data']['EblastApp']) {
				$this->passedArgs = $this->request->query['data']['Contacts'] = $this->request->query['data']['EblastApp'];
			}
		}

		if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            //$selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        //$this->set('selected_type', $selected_type);

		$current_user_id = $this->Auth->User('id');
		//$this->Prg->commonProcess();
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

		}else{
			$tmp_pass = $this->passedArgs;
			if($this->passedArgs['search_vehicle_trade'] == 'trade'){
				unset($tmp_pass['search_category']);
				unset($tmp_pass['search_type']);
				unset($tmp_pass['search_class']);
				unset($tmp_pass['search_year']);
				unset($tmp_pass['search_make']);
				unset($tmp_pass['search_model_id']);
				unset($tmp_pass['search_model']);
				unset($tmp_pass['search_condition']);
				unset($tmp_pass['search_unit_color']);

				$tmp_pass['search_category_trade'] = $this->passedArgs['search_category'];
				$tmp_pass['search_type_trade'] = $this->passedArgs['search_type'];
				$tmp_pass['search_class_trade'] = $this->passedArgs['search_class'];
				$tmp_pass['search_year_trade'] = $this->passedArgs['search_year'];
				$tmp_pass['search_make_trade'] = $this->passedArgs['search_make'];
				$tmp_pass['search_model_id_trade'] = $this->passedArgs['search_model_id'];
				$tmp_pass['search_model_trade'] = $this->passedArgs['search_model'];
				$tmp_pass['search_condition_trade'] = $this->passedArgs['search_condition'];
				$tmp_pass['search_usedunit_color'] = $this->passedArgs['search_unit_color'];
			}

			/* Remove search_ prefix from indices */
			$new_tmp_pass = array();
			foreach($tmp_pass as $key=>$details){
				$key = str_replace("search_","",$key);
				$new_tmp_pass[$key] = $details;
			}
			//$tmp_pass = $new_tmp_pass;

            $conditions = array($this->Contact->parseCriteria($tmp_pass),'Contact.company_id' => $dealer_id);
	        if(isset($this->passedArgs['search_created'])&&!empty($this->passedArgs['search_modified'])&&!empty($this->passedArgs['search_created'])){
				$conditions=array(array('Date(Contact.created) >='=>date('Y-m-d',strtotime($this->passedArgs['search_created'])),'Date(Contact.modified) <='=>date('Y-m-d',strtotime($this->passedArgs['search_modified']))));
			}elseif(isset($this->passedArgs['search_created'])&&!empty($this->passedArgs['search_created'])){
				$conditions=array(array('Date(Contact.created)'=>date('Y-m-d',strtotime($this->passedArgs['search_created']))));
			}elseif(isset($this->passedArgs['search_modified'])&&!empty($this->passedArgs['search_modified'])){
				$conditions=array(array('Date(Contact.modified)'=>date('Y-m-d',strtotime($this->passedArgs['search_modified']))));
			}

			//debug($conditions);
        }

        $conditions[] = array('Contact.status <> ' => 'Duplicate-Closed');


		/*
		if(count($conditions[0]) == 0){
			$conditions['Contact.id'] = null;
		}else{
			$subQuery = ' `Contact`.`id` NOT IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
			$opt_conditions = $conditions;
			$opt_conditions[] = ' `Contact`.`id` IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
			$opt_out_count = $this->Contact->find('count',array('conditions' => $opt_conditions));
			$this->set('opt_out_count', $opt_out_count);
			$conditions[] = $subQuery;
		}*/
		$subQuery = ' `Contact`.`id` NOT IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
		$opt_conditions = $conditions;
		$opt_conditions[] = ' `Contact`.`id` IN ( SELECT e.contact_id FROM eblast_unsubscribes e ) ';
		$opt_out_count = $this->Contact->find('count',array('conditions' => $opt_conditions));
		$this->set('opt_out_count', $opt_out_count);
		//$conditions[] = $subQuery;


		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			asort($eblat_app_multiple);
			$conditions['Contact.company_id'] = $eblat_app_multiple;
		}else{
			$conditions['Contact.company_id'] = $dealer_id;
		}

		//debug( $conditions );


		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.company',
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
			'Contact.sales_step'
		);
		$conditions['Contact.email <> '] = '';
		if($return==false){
			$this->paginate = array('limit'=>20,'fields'=>$fields,'conditions' => $conditions , 'order' => array('Contact.id' => 'DESC'));
			$contacts = $this->Paginate('Contact');
			//prx($contacts);
			$this->set('contacts', $contacts);
		}elseif($return=='return_conditions'){
			return $conditions;
		}else{
			return $this->Contact->find('all',array('fields'=>$fields,'conditions' => $conditions , 'order' => array('Contact.id' => 'DESC')));
		}

		//debug($conditions);
	}
	public function TestSendGridAPI(){
		$this->loadModel("Eblast");

		/*
		$data = array('SenderAddressName'=>'Sender_Address1',
						'SenderName'=>'DP',
						'SenderEmail'=>'sender@dp360crm.com'
					);
		$response = $this->Eblast->add_sender_address($data);
		*/
		/*$data = array('ListName'=>'List Name1',
						'Name'=>'name'
					);
		$response = $this->Eblast->create_list($data);
		*/
		/*
		$data = array(
			'SenderAddressName'        => 'Sender_Address1',
			'EblastName'   => 'Test Eblast Name',
			'EblastSubject'      => 'Test Subject',
			'EblastEmailBody'      => '<b> Hello Bro,</b> <br> You Rock!!!'
		  );
		$response = $this->Eblast->add_eblast_email($data);
		*/

		/*
		$EmailData = array('email'=>'amarjeetkr.developer@gmail.com','name'=>'Amarjit Kumar');
		$data = array(
			'ListName'        => 'List Name1',
			'Data'   => json_encode($EmailData)
			);

		$response = $this->Eblast->add_recipients_email_to_list($data);
		*/

		/*
		$data = array(
			'ListName'        => 'List Name1',
			'EblastName'   => 'Test Eblast Name'
		  );
		$response = $this->Eblast->add_recipients_email_list($data);
		*/
		/*
		$data = array('EblastName'   => 'Test Eblast Name');

		$response = $this->Eblast->schedule_eblast_email($data);

		print_r($response);die;
		*/

		/*
		$NewCategoryData = array('CategoryName'=>'Category^^8');
		$ResponseCreateCategory = $this->Eblast->create_category($NewCategoryData);
		echo "<pre>";
		print_r($ResponseCreateCategory);die;
		*/

		/*

		$AssignCategory = array('CategoryName'=>'Category^^8',
								'EblastName'=>'Eblast^^8');

		$ResponseAssignCategory = $this->Eblast->assign_category($AssignCategory);

		echo "<pre>";
		print_r($ResponseAssignCategory);die;
		*/

		$this->Eblast->GetEmailTemplate();

	}


	function AssignListToCompaign(){
		$this->Eblast->AssignListToCompaign();
		die;
	}

	function ConvertToSendGridZone($givenDate='2014-08-24 01:00:00'){
		$zone = $this->Auth->User('zone');
		$SendGridDiffHrs = 7;
		$SendGridDiffMins = 0;
		$date = new DateTime($givenDate, new DateTimeZone($zone));
		$UTCDiff =  $date->format('P');
		$tmpExplode = explode(":",$UTCDiff);
		$DiffHrs = $tmpExplode[0];
		$DiffMins = $tmpExplode[1];

		$TotalHrsDiff = (-$SendGridDiffHrs-($DiffHrs));
		$TotalMinsDiff = (-$SendGridDiffMins-($DiffMins));
		//echo "+$TotalHrsDiff hours $DiffMins minutes ";die;
		//echo "UTC $UTCDiff <br>Total: $TotalHrsDiff : $DiffMins";
		$NewTstmp = strtotime($givenDate)+($TotalHrsDiff*3600)+($TotalMinsDiff*60);
		$NewDate = date("Y-m-d H:i:s",$NewTstmp);
		$NewTstmp = strtotime($NewDate)+($SendGridDiffHrs*3600)+($SendGridDiffMins*60);
		$SetDateOnSendgrid = date("Y-m-d H:i:s",$NewTstmp);
		//echo "<br>Prev Date: $givenDate <br> New Date: $NewDate<br>Sendgrid Date:$SetDateOnSendgrid";
		return $SetDateOnSendgrid;
	}


	function status_by_header_option($header = ''){
		$lead_status_options = array();
		if($header != ''){
			$this->loadModel("LeadStatus");
			$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
				 'LeadStatus.header' => $header, 'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
			)));

			foreach($leadStatuses as $leadStatus){
				$lead_status_options[$leadStatus['LeadStatus']['name']] = $leadStatus['LeadStatus']['name'];
			}
		}
		return $lead_status_options;
	}

	/* Code for the first step */
   	public function setup_autoresponder($id = null) {
		$this->layout='marketing_default';
		//$this->layout = 'eblasts_form_wizard';

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

		/* Templates */
		$templates = $this->Template->find('list', array('conditions'=>array(
			'Template.template_type' => 'A',
			'Template.template_status' => '1',
			'Template.user_id' => $this->Auth->user('dealer_id')
		),'fields'=>array('Template.template_id','Template.template_title')));
        $this->set('templates', $templates);
		/* END */
		$this->set('template_type', $template_type);
		if ($this->request->is('post')) {
			$this->loadModel("AutoresponderRule");

			//debug( $this->request->data );
			$count_rule = 0;
			foreach($this->request->data['search_contact_status_id'] as $key=>$search_contact_status_id){
				$count_rule ++ ;
				if($search_contact_status_id == '') continue;

				$AutoresponderRulesData = array();
				if($this->request->data['id'][$key]>0){
						$AutoresponderRulesData['AutoresponderRule']['id'] =  $this->request->data['id'][$key];
				}

				$AutoresponderRulesData['AutoresponderRule']['rule_type'] =  "auto_rule";
				$AutoresponderRulesData['AutoresponderRule']['search_lead_status'] =  $this->request->data['search_lead_status'][$key];
				$AutoresponderRulesData['AutoresponderRule']['search_contact_status_id'] =  $this->request->data['search_contact_status_id'][$key];
				$AutoresponderRulesData['AutoresponderRule']['search_sales_step'] =  $this->request->data['search_sales_step'][$key];
				$AutoresponderRulesData['AutoresponderRule']['search_status_header'] =  $this->request->data['search_status_header'][$key];
				$AutoresponderRulesData['AutoresponderRule']['search_status'] =  $this->request->data['search_status'][$key];
				$AutoresponderRulesData['AutoresponderRule']['search_source'] =  $this->request->data['search_source'][$key];
				$AutoresponderRulesData['AutoresponderRule']['dealer_id'] = $dealer_id;
				$AutoresponderRulesData['AutoresponderRule']['template_id'] = $this->request->data['template'][$key];
				$AutoresponderRulesData['AutoresponderRule']['email_mode'] =  $this->request->data['email_mode'][$key];

				if(empty($AutoresponderRulesData['AutoresponderRule']['id']) ){
					$this->AutoresponderRule->create();
				}
				$this->AutoresponderRule->save($AutoresponderRulesData);
				//debug($AutoresponderRulesData);
				//$errors = $this->AutoresponderRule->validationErrors;  debug($errors);
			}

			/* Other Rules */
			foreach($this->request->data['rule_type'] as $key=>$rule_type){

				if($rule_type == '') continue;

				$AutoresponderRulesData = array();
				if($this->request->data['id_other'][$key]>0){
						$AutoresponderRulesData['AutoresponderRule']['id'] =  $this->request->data['id_other'][$key];
				}
				$AutoresponderRulesData['AutoresponderRule']['rule_type'] = $rule_type;
				$AutoresponderRulesData['AutoresponderRule']['dealer_id'] = $dealer_id;
				$AutoresponderRulesData['AutoresponderRule']['template_id'] = $this->request->data['template_other'][$key];
				$AutoresponderRulesData['AutoresponderRule']['duration_category'] = $this->request->data['duration_category'][$key];
				$AutoresponderRulesData['AutoresponderRule']['duration_days'] = $this->request->data['duration_days'][$key];
				$AutoresponderRulesData['AutoresponderRule']['duration_afterbefore'] = $this->request->data['duration_afterbefore'][$key];
				$AutoresponderRulesData['AutoresponderRule']['email_mode'] =  $this->request->data['email_mode'][$key+$count_rule];
				$this->AutoresponderRule->saveAll($AutoresponderRulesData);
			}

			$this->Session->setFlash(__('Successfully Saved.'), 'sucess');

		}

		$this->loadModel("AutoresponderRule");
		$autoresponder_results = $this->AutoresponderRule->find('all',array('conditions'=>array('dealer_id'=>$dealer_id)));

		$other_autoresponders = $autoresponders = array();
		foreach($autoresponder_results as $details){
			if($details['AutoresponderRule']['rule_type']!='auto_rule'){
			/* Other Rules */
				$other_autoresponders[] = $details;
			}else{

				if( $details['AutoresponderRule']['search_status_header'] != ''){
					$details['AutoresponderRule']['search_status_options'] = $this->status_by_header_option( $details['AutoresponderRule']['search_status_header'] );
				}else{
					$details['AutoresponderRule']['search_status_options'] = array();
				}
				//debug($details);
				$autoresponders[] = $details;
			}
		}
		$this->set('autoresponders',$autoresponders);
		$this->set('other_autoresponders',$other_autoresponders);

		//debug($autoresponders);

		$this->loadModel("LeadSource");
		$this->loadModel("LeadStatus");
		$this->loadModel("ContactStatus");
		$this->loadModel("SalesStep");

		//Get Lead Sources
		$this->loadModel('LeadSourcesHide');
		$lead_sources_hide = $this->LeadSourcesHide->find('list',array('conditions'=>array(
			'LeadSourcesHide.dealer_id'=> $this->Auth->user('dealer_id'),
		)));
		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('LeadSource', $lead_sources_options);

		//Get Status Headers
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.header ASC','conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_headers = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_headers[$leadStatus['LeadStatus']['header']] = $leadStatus['LeadStatus']['header'];
		}
		$this->set('lead_status_headers',$lead_status_headers);

		//Get sales steps
		$sales_step_options = $this->requestAction("dashboards/get_dealer_steps");
		//unset($sales_step_options['10']);


		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name'),'order'=>array('ContactStatus.name ASC')));


		$this->set('ContactStatus',$ContactStatus);
		$this->set('SalesStep',$sales_step_options);

		//Inventory Center
		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		$this->set('d_type_options', $d_type_options);


		$user_d_type = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$user_d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$type_options = array();
		foreach($d_types as $d_type){
			$type_options[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
		}
		$this->set('type_options', $type_options);
		$this->set('user_d_type', $user_d_type);

		//debug("auto responders");
    }



	public function autoresponders_list() {

		$this->layout='default_new';
		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');
		date_default_timezone_set($zone);
		$currrent_date_time = date('Y-m-d 00:00:00', strtotime("now"));

		$search_all2 = "";
		$conditions['Autoresponder.dealer_id'] = $dealer_id;
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['Autoresponder.name LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		$this->loadModel("Autoresponder");
		$this->Autoresponder->bindModel(array('hasMany'=>array(
			'AutoresponderRule'
			)));

		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'fields' => $fields,
			'order' => array(
				'user.id' => 'asc',
			),
		);
		$autoresponders = $this->Paginate('Autoresponder');
		//debug($eblasts);
        $this->set('autoresponders', $autoresponders);
		$this->set('class', 'alert-success'); // Thsi is the classname for the alert (elements/alert.ctp)

		$this->set('selected_type', $template_type);
		$this->set('search_all2', $search_all2);

    }


	function autoresponder_rules($autoresponder_id){
		$dealer_id = $this->Auth->User('dealer_id');
		$this->loadModel("Autoresponder");
		$this->Autoresponder->bindModel(array('hasMany'=>array(
			'AutoresponderRule'
			)));
		$this->loadModel("ContactStatus");
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name')));
		$this->set('ContactStatus',$ContactStatus);

		$autoresponders = $this->Autoresponder->find('first',array('conditions'=>array('dealer_id'=>$dealer_id,'id'=>$autoresponder_id)));
		$this->set('autoresponders',$autoresponders);
	}

	function status_by_header(){
		$header =  $this->request->query['header'];
		$lead_status_options = array();
		if($header != ''){
			$this->loadModel("LeadStatus");
			$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
				 'LeadStatus.header' => $header, 'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
			)));

			foreach($leadStatuses as $leadStatus){
				$lead_status_options[$leadStatus['LeadStatus']['name']] = $leadStatus['LeadStatus']['name'];
			}
		}
		echo json_encode($lead_status_options);
		$this->autoRender = false;
	}

	function status_by_leadtype($contact_status_id='',$lead_status=''){
		ini_set('memory_limit', '-1');
		$Status = $this->get_status_by_leadtype($contact_status_id,$lead_status);
		echo json_encode($Status);
		//die;
	}

	function get_status_by_leadtype($contact_status_id,$lead_status){
		// $conditions = array();
		// if($contact_status_id>0){
		// 	$conditions['contact_status_id'] = trim($contact_status_id);
		// }
		// if($lead_status!=''){
		// 	$conditions['lead_status'] = trim($lead_status);
		// }
		// $this->Contact->recursive = -2;
		// $Status = $this->Contact->find('list',array('conditions'=>$conditions,'fields'=>array('Contact.status','Contact.status')));
		// debug($conditions);
		return array();
	}

	function view_template($id){
		$details = $this->Template->find('first', array('conditions'=>array(
			'Template.template_id' => $id)));

		$this->set('template_details', $details);
	}

	function activate_autoresponder_rule(){
		$active = $this->request->query['active'];
		$id = $this->request->query['id'];
		if($active=="true"){
			$status = 1;
		}else{
			$status = 0;
		}
		$this->loadModel('AutoresponderRule');
		$this->AutoresponderRule->query("UPDATE autoresponder_rules SET `active`=$status WHERE id = $id");
		//echo "UPDATE autoresponder_rules SET `active`=$status WHERE id = $id";
		die;

	}

	function activate_eblasts(){
		$active = $this->request->query['active'];
		$id = $this->request->query['id'];
		if($active=="true"){
			$status = 1;
		}else{
			$status = 0;
		}
		$this->loadModel('EblastApp');
		$this->EblastApp->query("UPDATE eblast_apps SET `active`=$status WHERE id = $id");
		die;

	}

	function delete_autoresponder_rule($id){
		$this->loadModel('AutoresponderRule');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->AutoresponderRule->deleteAll(array('dealer_id'=>$dealer_id,'id'=>$id));
		die;
	}

	function validate_eblast_time(){
		date_default_timezone_set($this->Auth->User('zone'));

		$curr_time = strtotime("now");

		$response = array('error'=>'no');
		if(isset($this->request->data['dateTime']) && $this->request->data['dateTime']!=''){

			$tmpExplode = explode(" ",$this->request->data['dateTime']);
			$date_ar = explode("-",$tmpExplode[0]);

			$time_24 =  date("H:i:s", strtotime($tmpExplode[1]." ".$tmpExplode[2]   ));
			$datetime = $date_ar[2]."-".$date_ar[0]."-".$date_ar[1]." ".$time_24;
			$schedule_time = strtotime($datetime);

			if($schedule_time > $curr_time){
				$response = array('error'=>'no');
			}else{
				$response = array('error'=>'yes','message'=>'Please enter a time in future.');
			}
		}
		echo json_encode($response);
		die;
	}

}
