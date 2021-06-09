<?php
class EblastsController extends AppController {

	public $uses = array('Contact', 'History', 'ContactStatus', 'User', 'Event', 'EventType', 'Template', 'TemplatesCategory', 'Eblast','UserEmail', 'EblastsSent','EblastUnsubscribe','EblastBounce','EblastSpam' );
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
			'limit'=>25
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




		// /* Eblasts Sent */
		// $conditions = array('Eblast.user_id'=>$dealer_id,'template_type'=>'M');
		// $eblast_sent_count = $this->Eblast->find('count',array('conditions'=>$conditions));
		// $this->set('eblast_sent_count',$eblast_sent_count);


		// /* Newsletter Sent */
		// $conditions = array('Eblast.user_id'=>$dealer_id,'template_type'=>'N');
		// $newsletter_sent_count = $this->Eblast->find('count',array('conditions'=>$conditions));
		// $this->set('newsletter_sent_count',$newsletter_sent_count);

		//Open % months

		$this->loadModel('SendgridStatistic');
		$dealer_id = $this->Auth->user('dealer_id');
		$start_date = date('Y-m-d 00:00:00', strtotime("-30 day"));
		$end_date = date('Y-m-d 23:59:59');


		$total_deli_auto = $this->Eblast->query("SELECT count(*) AS delivered FROM sendgrid_auto_statistics WHERE event_type = 'delivered' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_delivered = 	$total_deli_auto[0][0]['delivered'];

		$total_opens_auto = $this->Eblast->query("SELECT count(*) AS open FROM sendgrid_auto_statistics WHERE event_type = 'open' AND dealer_id = '{$dealer_id}' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		$total_opened = 	$total_opens_auto[0][0]['open'];


		$open_percent = 0;
		if($total_opened == '0'){
			$open_percent = 0;
		}else{
			$open_percent = floor(($total_opened/$total_delivered) * 100 );
		}
		$this->set('open_percent', $open_percent);
		$this->set('total_opened', $total_opened);

		$Opt_Out_Month_auto = $this->Eblast->query("SELECT count(*) AS unsubscribed FROM sendgrid_auto_statistics WHERE event_type = 'unsubscribe' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$total_Opt_Out_Month = $Opt_Out_Month_auto['0']['0']['unsubscribed'];
		$this->set('total_Opt_Out_Month', $total_Opt_Out_Month);

		$Spam_Month_auto = $this->Eblast->query("SELECT count(*) AS spam FROM sendgrid_auto_statistics WHERE event_type = 'spamreport' AND  dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$total_Spam_Month =  $Spam_Month_auto['0']['0']['spam'];
		$this->set('total_Spam_Month', $total_Spam_Month);

		$Bounce_Month_auto = $this->Eblast->query("SELECT count(*) AS bounced FROM sendgrid_auto_statistics WHERE event_type = 'bounce' AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		$total_Bounce_Month = $Bounce_Month_auto['0']['0']['bounced'];


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
		$categoriesSrc = $this->TemplatesCategory->find('all', array('conditions'=>array('TemplatesCategory.user_id' => $this->Auth->user('dealer_id'))));
		foreach($categoriesSrc as $key => $row) {
			$categories[$row['TemplatesCategory']['template_cat_id']] = $row['TemplatesCategory']['category_name'];
		}
		$this->set('categories', $categories);
	}

	function templates_list() {
		$this->layout='default_new';
		$this->paginate = array(
				'conditions'=>array('Template.template_type' => array('A','T'),  'Template.user_id' => $this->Auth->user('dealer_id'),'Template.is_deleted' => 0),
				'limit' => 20,
				'order' => array(
					'user.id' => 'asc',
				),
		);
        $this->set('Templates', $this->Paginate('Template'));
		$this->set('class', 'alert-success margin20'); // This is the classname for the alert (elements/alert.ctp)
	}

	function templates_create($id='') {
		$this->layout='default_template';
		if ($this->request->is('post') || $this->request->is('put')) {

			$this->request->data['Template']['user_id'] = $this->Auth->user('dealer_id');
			$this->request->data['Template']['template_user_id'] = $this->Auth->user('id');
			$this->request->data['Template']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['Template']['last_run'] = date('Y-m-d H:i:s');
			$Search = array("'[unsubscribe]'","'[weblink]'");
			$Replace = array('"[unsubscribe]"','"[weblink]"');
			$this->request->data['Template']['template_html'] = str_replace($Search,$Replace,$this->request->data['Template']['template_html']);
			//check for changed
			if( $this->request->data['Template']['base_template_id'] != '' ){
				$templatesSrc = $this->Template->find('first',
					array('conditions' => array(
						'template_id' => $this->request->data['Template']['base_template_id']
					))
				);
				$this->request->data['Template']['template_html'] = str_replace($Search,$Replace,$this->request->data['Template']['template_html']);

				if(trim($templatesSrc['Template']['template_html'])!=trim($this->request->data['Template']['template_html'])){
					// Get current date in user's timezone
					$zone = $this->Auth->User('zone');
					date_default_timezone_set($zone);
					// Set current date and time for  contents_changed_on in user's timezone
					$this->request->data['Template']['contents_changed_on'] = date("Y-m-d H:i:s");
				}



			}else{
				/* If its a new template then put contents_changed_on as current date & time*/
				// Get current date in user's timezone
				$zone = $this->Auth->User('zone');
				date_default_timezone_set($zone);
				// Set current date and time for  contents_changed_on in user's timezone
				$this->request->data['Template']['contents_changed_on'] = date("Y-m-d H:i:s");
			}

			$this->Template->create();
			if ($this->Template->save($this->request->data)) {

				//Save Template Thumbnails
				$fileData = $this->request->data['Template']['thumbfile'];
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
						$current_template_image = $this->Template->find('first',  array('recursive'=>-1, 'fields'=>array("Template.template_image"), 'conditions' => array('Template.template_id' => $this->Template->id)));
						if($current_template_image['Template']['template_image'] != ''){
							@unlink($path.DS.$current_template_image['Template']['template_image']);
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
							$this->Template->saveField('template_image', $newFileName);
						}
					}
				}

				$this->Session->setFlash(__('Template information saved!'), 'alert');
				$this->redirect(array('action' => 'templates_list'));
			}

		}else{
			if( isset($this->request->params['pass']['0']) &&  $this->request->params['pass']['0'] != '' ) {
				$templatesSrc = $this->Template->find('first',  array('conditions' => array('Template.template_id' => $this->request->params['pass']['0'], 'user_id' => $this->Auth->user('dealer_id'))));
				if(!isset($templatesSrc['Template'])) {
					$this->redirect('templates_list');
				}
				$this->request->data = $templatesSrc;
				$this->request->data['Template']['base_template_id'] = $templatesSrc['Template']['template_id'];
			}else{

				//debug($this->Auth->User());
				$this->request->data['Template']['template_email_from_id'] = $this->Auth->User('d_email');
				$this->request->data['Template']['template_email_from_name'] = $this->Auth->User('dealer');

			}

		}
		$categories = $this->TemplatesCategory->find('list', array('fields'=>array('TemplatesCategory.template_cat_id','TemplatesCategory.category_name'),'conditions' => array('TemplatesCategory.user_id' => $this->Auth->user('dealer_id'))));
		$this->set('categories', $categories);
		$this->set("template_id",$id);
	}

	public function add_template_category() {
		$this->autoRender = false;

		$data = array();

		if ($this->request->is('post') && $this->Auth->user('id')) {

			if($this->TemplatesCategory->find('count', array('conditions'=>array(
				'TemplatesCategory.user_id'=>$this->Auth->user('dealer_id'),
				'TemplatesCategory.category_name'=>$this->request->data['category_name']
			))) == 0 ){
				$data['TemplatesCategory']['user_id'] = $this->Auth->user('dealer_id');
				$data['TemplatesCategory']['category_name'] = $this->request->data['category_name'];
				$data['TemplatesCategory']['created_date'] = date('Y-m-d H:i:s');
				$this->TemplatesCategory->create();
				if ($this->TemplatesCategory->save($data)) {
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
			"(SELECT COUNT(*) FROM eblasts_sents WHERE response = '{\"message\":\"success\"}' AND eblast_id = Eblast.eblasts_id ) as sent_num",
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

		$this->layout='default_new';
		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');
		date_default_timezone_set($zone);
		$currrent_date_time = date('Y-m-d 00:00:00', strtotime("now"));

		$search_all2 = "";
		$conditions = array('Eblast.template_type'=>trim($template_type));
		$conditions['Eblast.user_id'] = $dealer_id;
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['Eblast.campaign_name LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		$conditions['Eblast.user_id'] = $dealer_id;
		$conditions['Eblast.template_type'] = $template_type;

		//debug($conditions);

		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'order' => array(
				'Eblast.id' => 'asc',
			),
		);


		$eblasts = $this->Paginate('Eblast');
		//debug($eblasts);
        $this->set('eblasts', $eblasts);
		$this->set('class', 'alert-success'); // Thsi is the classname for the alert (elements/alert.ctp)

		$this->set('selected_type', $template_type);
		$this->set('search_all2', $search_all2);
		$this->set('selected_opt_sent', $opt_sent);
		$this->set('currrent_date_time',date('Y-m-d H:i:s'));
		//$this->Eblast->AssignListToCompaign($dealer_id );

    }

	//Search result in the lead page /contacts/lead
	public function search_result(){
		$this->GetEblastRecipients();

	}

	/* Code for the first step */
   	public function setup_eblast($template_type = null) {
		//echo date("Y-m-d H:i",strtotime("2015-01-22 11:00 PM"));die;
		$this->layout = 'eblasts_form_wizard';
		date_default_timezone_set($this->Auth->User('zone'));

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$user_id = $this->Auth->user('id');

		/* Templates */
		$templates = $this->Template->find('all', array('conditions'=>array(
			'Template.template_type' => $template_type,
			'Template.template_status' => '1',
			'Template.user_id' => $this->Auth->user('dealer_id')
		)));
        $this->set('templates', $templates);
		/* END */
		$this->set('template_type', $template_type);

		if ($this->request->is('post')) {
		//prx($this->request->data);
			$data['Eblast']['user_id'] = $this->Auth->user('dealer_id');
			$data['Eblast']['created_by'] = $this->Auth->user('id');

			$data['Eblast']['campaign_name'] = $this->request->data['Eblast']['campaign_name'];
			// $data['Eblasts']['campaign_name'] = $this->request->data['Eblasts']['campaign_name'];

			list($template_id, $template_type) = explode('_', $this->request->data['template_id']);
			$data['Eblast']['template_id'] = $template_id;
			$data['Eblast']['template_type'] = $this->request->data['Eblast']['template_type'];

			$data['Eblast']['form_filters'] = json_encode($this->request->data['Eblast']);
			$data['Eblast']['created_date'] = date('Y-m-d H:i:s');
			if($template_type=='N'){ //newletter, send periodically

				$data['Eblast']['schedule_at'] = $this->request->data['Eblast']['period'];
				$data['Eblast']['day_no'] = $this->request->data['Eblast']['day'];
				$data['Eblast']['date_start'] = '';
				$data['Eblast']['date_end'] = '';
				$Time =  "00:05:00";
				$data['Eblast']['schedule_time'] = $Time;
				$data['Eblast']['month'] = $this->request->data['Eblast']['month'];


			}else{ // send one time only
				$data['Eblast']['schedule_at'] = 'once';
				$tmpExplode1 = explode(" ",$this->request->data['Eblast']['schedule_single_date']);
				$tmpExplode = explode("-",$tmpExplode1[0]);
				$tmpExplode1[1]  = date("H:i", strtotime($tmpExplode1[1]));
				$DateTime = $tmpExplode[2]."-".$tmpExplode[0]."-".$tmpExplode[1];
				$DateTime = date("Y-m-d H:i",strtotime($DateTime." ".$this->request->data['Eblast']['schedule_time']));
				$data['Eblast']['date_start'] = $DateTime;
				$data['Eblast']['date_end'] = $DateTime;
				$data['Eblast']['schedule_time'] = date("H:i",strtotime($DateTime));
				$data['Eblast']['week_day'] = '';
				$data['Eblast']['day_no'] = '';
				$data['Eblast']['month'] = '';
			}

			$this->Eblast->create();
			if ($this->Eblast->save($data)) {
				$eblast_id = $this->Eblast->getLastInsertId();
				//prx($this->request->data);
				if($template_type=='N'){

					$zone = $this->Eblast->GetDealerZone($dealer_id);
					if($data['Eblast']['schedule_at']=='yearly'){
						$schedule_unix_time = strtotime( "02-".$data['Eblast']['month']."-".date("Y"). $data['Eblast']['schedule_time']  );
						if($schedule_unix_time <= strtotime("now")){
							$new_year = date("Y")+1;
							$schedule_unix_time = strtotime( "02-".$data['Eblast']['month']."-".$new_year.$data['Eblast']['schedule_time']  );
						}
						$ScheduleDateTime = date("Y-m-d H:i:s",  $schedule_unix_time );
					}

					//die("$ScheduleDateTime");
					if($ScheduleDateTime!=''){
						$data['Eblast']['date_start'] = $ScheduleDateTime;
					}
				}
				if($data['Eblast']['date_start'] != ''){
					$receipient_conditions = $this->GetEblastRecipients('return_conditions');
					$Params = array('receipient_conditions'=>$receipient_conditions,
									'log_uid'=>$user_id);
					$this->Eblast->ScheduleEblast($data,$Params,$eblast_id,$dealer_id);
				}

				$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
				$this->Session->setFlash(__('New '.$eblast_types[$this->request->data['Eblast']['template_type']].' information saved!'), 'alert');
				$this->redirect(array('action' => 'eblasts_list', $this->request->data['Eblast']['template_type']));
			}
		}

		$this->loadModel("LeadSource");
		$this->loadModel("LeadStatus");
		$this->loadModel("ContactStatus");
		$this->loadModel("SalesStep");

		$LeadSource = $this->LeadSource->find('list', array('fields'=>array('LeadSource.name','LeadSource.name'),'order'=>array('LeadSource.name ASC'),'conditions' => array('LeadSource.dealer_id' => array($dealer_id,0))));


		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']][$leadStatus['LeadStatus']['name']] = $leadStatus['LeadStatus']['name'];
		}

		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name'),'order'=>array('ContactStatus.name ASC')));


		$sold_step = '10';
		$sales_step_options = $this->requestAction('dashboards/get_dealer_steps');


		$this->set('LeadSource',$LeadSource);
		$this->set('LeadStatus',$lead_status_options);
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





    }

	public function send_test_email(){
		//debug($this->request->data['emails']);
		//debug($this->request->data['template']);
		if($this->request->data['emails'] != ''){
			$addresses = explode(",",$this->request->data['emails']);
			App::uses('CakeEmail', 'Network/Email');
			foreach($addresses as $addresses){

				$email = new CakeEmail();
				$email->config('smtp_amazon');
				$email->viewVars(array(
					'unsubscribe_url'=>"#",
					'email'=>"#",
					'email_from'=>"#",
					'template_content'=>$this->request->data['template']
				));

				$email->template('eblast')
					->emailFormat('html')
					->subject( $this->request->data['subject'] )
					->to($addresses)
					->from('info@crmmain.com')
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
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
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


			$stats_open = $this->SendgridAutoStatistic->query("select count(DISTINCT contact_id) as open_count from sendgrid_auto_statistics where event_type = 'open' AND autoresponder_id = :autoresponder_id group by contact_id  ;", array('autoresponder_id' => $autor['AutoresponderRule']['id']   ) );
			$stats_deferred = $this->SendgridAutoStatistic->query("select count(DISTINCT contact_id) as open_count from sendgrid_auto_statistics where event_type = 'deferred' AND autoresponder_id = :autoresponder_id group by contact_id  ;", array('autoresponder_id' => $autor['AutoresponderRule']['id']   ) );

			// debug($autor['AutoresponderRule']['id']);
			// debug($stats_open);

			$stats[0][0]['open'] = (!empty($stats_open))? count($stats_open) : null;
			$stats[0][0]['deferred'] = (!empty($stats_deferred))? count($stats_deferred) : null;

			$eblast_statistics[ $autor['AutoresponderRule']['id'] ] = $stats[0][0];

		}

		$this->set('eblast_s', $eblast_statistics);








	}

	public function eblast_stats($type = ''){

		$this->loadModel('SendgridStatistic');

		$dealer_id = $this->Auth->user('dealer_id');
		$conditions = array(
			'Eblast.user_id'=>$dealer_id,
			'Eblast.scheduled' => '1',
			'Eblast.template_type' => $type
		);
		$this->paginate = array(
			'conditions' => $conditions,
			'order' =>'Eblast.eblasts_id DESC',
			'limit' => 30,
		);
		$eblasts = $this->Paginate("Eblast");
		$this->set('eblasts', $eblasts);

		//Get Statistics
		$eblast_statistics = array();
		foreach($eblasts as $ebs){
			$stats = $this->SendgridStatistic->query("select
			sum(event_type = 'processed') as processed,
			sum(event_type = 'bounced') as bounced,
			sum(event_type = 'delivered') delivered,
			sum(event_type = 'deferred') deferred,
			sum(event_type = 'open') `open`,
			sum(event_type = 'dropped') `dropped`,
			sum(event_type = 'click') `click`,
			sum(event_type = 'spamreport') `spamreport`,
			sum(event_type = 'unsubscribe') `unsubscribe`,
			sum(event_type = 'bounce') `bounce`
			from sendgrid_statistics where eblasts_id = :eblasts_id  ;", array('eblasts_id' => $ebs['Eblast']['eblasts_id']) );

			$open_stats = $this->SendgridStatistic->query("select count(distinct contact_id) as openstat from sendgrid_statistics where eblasts_id = :eblasts_id and event_type = 'open';", array('eblasts_id' => $ebs['Eblast']['eblasts_id']) );
			$click_stats = $this->SendgridStatistic->query("select count(distinct contact_id) as openstat from sendgrid_statistics where eblasts_id = :eblasts_id and event_type = 'click';", array('eblasts_id' => $ebs['Eblast']['eblasts_id']) );

			$stats[0][0]['open'] = $open_stats[0][0]['openstat'];
			$stats[0][0]['click'] = $click_stats[0][0]['openstat'];

			//debug($stats[0][0]);
			$eblast_statistics[ $ebs['Eblast']['eblasts_id'] ] = $stats[0][0];
		}

		$this->set('eblast_s', $eblast_statistics);


	}

	public function statistics($stats_month=null){
		 $this->layout='default_new';


	//	 debug(  strtotime("2015-04-10 14:30:00")  );


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

		//debug($type);

		$this->loadModel('SendgridStatistic');
		$this->SendgridStatistic->bindModel(array(
			'belongsTo'=>array('Contact'),
		));

		if($type == 'open' || $type == 'click'){
			$statistics = $this->SendgridStatistic->find("all", array("group" => 'SendgridStatistic.contact_id', "conditions"=>array(
				'SendgridStatistic.eblasts_id'=>$eblasts_id,
				'SendgridStatistic.event_type'=>$type
			)));
		}else{
			$statistics = $this->SendgridStatistic->find("all", array("conditions"=>array(
				'SendgridStatistic.eblasts_id'=>$eblasts_id,
				'SendgridStatistic.event_type'=>$type
			)));
		}
		//debug($statistics);
		$this->set('statistics', $statistics);

		$this->layout = 'ajax';
	}


	function statistics_details_auto($type = null , $eblasts_id = null){

		//debug($type);

		$this->loadModel('SendgridAutoStatistic');
		$this->SendgridAutoStatistic->bindModel(array(
			'belongsTo'=>array('Contact'),
		));
		$statistics = $this->SendgridAutoStatistic->find("all", array(
			'group' => array('SendgridAutoStatistic.contact_id'),
			'order' => array('SendgridAutoStatistic.created desc'),
			"conditions"=>array(
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
		foreach($this->request->query['data']['Eblast'] as $key=>$value){
			$value = trim(strtolower($value));
			if(in_array($value,$UnsetIndex)){
				unset($this->request->query['data']['Eblast'][$key]);
			}elseif(is_numeric($value) && $value==0){
				unset($this->request->query['data']['Eblast'][$key]);
			}

		}

		if(!empty($this->request->query)){
			if($this->request->query['data']['Eblast']) {
				$this->passedArgs = $this->request->query['data']['Contacts'] = $this->request->query['data']['Eblast'];
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





			//prx($conditions);
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

		$conditions['Contact.company_id'] = $dealer_id;


		//debug( $conditions );


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
		$this->layout='default_new_settings';
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
			if(!empty($this->request->data['search_contact_status_id'])){
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
					$AutoresponderRulesData['AutoresponderRule']['duration_days'] =  $this->request->data['top_duration'][$key];
					$AutoresponderRulesData['AutoresponderRule']['dormant_days'] =  $this->request->data['dormant_days'][$key];
	
	
	
					if(empty($AutoresponderRulesData['AutoresponderRule']['id']) ){
						$this->AutoresponderRule->create();
					}
					$this->AutoresponderRule->save($AutoresponderRulesData);
					//debug($AutoresponderRulesData);
					//$errors = $this->AutoresponderRule->validationErrors;  debug($errors);
				}
			}

			/* Other Rules */
			if(!empty($this->request->data['rule_type'])){
				foreach($this->request->data['rule_type'] as $key=>$rule_type){
	
					if($rule_type == '') continue;
	
					$AutoresponderRulesData = array();
					if(!empty($this->request->data['id_other'][$key])){
							$AutoresponderRulesData['AutoresponderRule']['id'] =  $this->request->data['id_other'][$key];
					}else
					{
						$this->AutoresponderRule->create();
					}
					$AutoresponderRulesData['AutoresponderRule']['rule_type'] = $rule_type;
					$AutoresponderRulesData['AutoresponderRule']['dealer_id'] = $dealer_id;
					$AutoresponderRulesData['AutoresponderRule']['template_id'] = $this->request->data['template_other'][$key];
					$AutoresponderRulesData['AutoresponderRule']['duration_category'] = $this->request->data['duration_category'][$key];
					$AutoresponderRulesData['AutoresponderRule']['duration_days'] = $this->request->data['duration_days'][$key];
					$AutoresponderRulesData['AutoresponderRule']['duration_afterbefore'] = $this->request->data['duration_afterbefore'][$key];
					$AutoresponderRulesData['AutoresponderRule']['email_mode'] =  $this->request->data['email_mode'][$key+$count_rule];
					$AutoresponderRulesData['AutoresponderRule']['search_unit_category'] =  $this->request->data['search_unit_category'][$key];
					$AutoresponderRulesData['AutoresponderRule']['search_unit_make'] =  trim($this->request->data['search_unit_make'][$key]);
					$AutoresponderRulesData['AutoresponderRule']['search_unit_model'] =  trim($this->request->data['search_unit_model'][$key]);
					$AutoresponderRulesData['AutoresponderRule']['search_unit_year'] =  $this->request->data['search_unit_year'][$key];
					$AutoresponderRulesData['AutoresponderRule']['search_unit_model_id'] =  $this->request->data['search_unit_model_id'][$key];
					$AutoresponderRulesData['AutoresponderRule']['search_unit_type'] =  $this->request->data['search_unit_type'][$key];
					$AutoresponderRulesData['AutoresponderRule']['search_unit_class'] =  $this->request->data['search_unit_class'][$key];
	
					$this->AutoresponderRule->save($AutoresponderRulesData);
				}
			}
			$this->Session->setFlash(__('Successfully Saved.'), 'sucess');

		
		}

		$autoweblead_rule = array();
		$this->loadModel("AutoresponderRule");
		$autoresponder_results = $this->AutoresponderRule->find('all',array('conditions'=>array('dealer_id'=>$dealer_id)));

		$other_autoresponders = $autoresponders = $autoweblead_rule =  array();
		$rule_index = 0;
		$this->loadModel('AutowebleadSchedule');
		foreach($autoresponder_results as $details){

			if($details['AutoresponderRule']['rule_type'] == 'auto_web_lead'){
				$AutowebleadSchedules = $this->AutowebleadSchedule->find('all', array('conditions'=>array('AutowebleadSchedule.autoresponderrule_id'=>$details['AutoresponderRule']['id'])));
				$details['AutoresponderRule']['Schedule'] = $AutowebleadSchedules 	;
				$autoweblead_rule[] = $details;
			}else{

				if($details['AutoresponderRule']['rule_type'] != 'auto_rule'){
				/* Other Rules */
					if(!empty($details['AutoresponderRule']['search_unit_category'])){
						$mk_options = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
							'?'=>array(
								'show_hidden' => true,
								'vehicle_selection_type' => 'Showroom' ,
								'type'=> $details['AutoresponderRule']['search_unit_category']
						)));
						$details['AutoresponderRule']['unit_make_options'] = $mk_options;
						$model_opt_withspace_addon1 = $model_opt_addon1= array();
						if(!empty($details['AutoresponderRule']['search_unit_make']) && $details['AutoresponderRule']['search_unit_year']){
							$model_opt_withspace_addon1 = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
								'?'=>array(
										'show_hidden' => true,
										'vehicle_selection_type'=> 'Showroom',
										'year' => $details['AutoresponderRule']['search_unit_year'],
										'make' => $details['AutoresponderRule']['search_unit_make'],
										'type' => $details['AutoresponderRule']['search_unit_category']
									)
							));
						}
						foreach($model_opt_withspace_addon1 as $key=>$value){
							$model_opt_addon1[ trim($key) ] = $value;
						}
						$details['AutoresponderRule']['unit_model_options'] = $model_opt_addon1;

						$category_options = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type' => 'Showroom',
					'type'=>$details['AutoresponderRule']['search_unit_category']  )));
					$details['AutoresponderRule']['unit_type_options'] = $category_options;


						//CLASS SELECTION

						$body_sub_type_options = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
							'vehicle_selection_type'=>'Showroom',
							'type'=>$details['AutoresponderRule']['search_unit_category'],
							'category'=>$details['AutoresponderRule']['search_unit_type'],
						)));
						$body_sub_type_options_addon1 = array();
						foreach($body_sub_type_options as $key=>$value){
							$body_sub_type_options_addon1[trim($value)] = $value;
						}
						$details['AutoresponderRule']['unit_class_options'] = $body_sub_type_options_addon1;


					}

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


		}
		$this->set('autoresponders',$autoresponders);
		$this->set('other_autoresponders',$other_autoresponders);
		$this->set('autoweblead_rule',$autoweblead_rule);

		$this->loadModel("LeadSource");
		$this->loadModel("LeadStatus");
		$this->loadModel("ContactStatus");
		$this->loadModel("SalesStep");

		//Get Lead Sources

		$this->loadModel('LeadSourcesHide');
		$lead_sources_hide = $this->LeadSourcesHide->find('list',array('conditions'=>array(
			'LeadSourcesHide.dealer_id'=> $this->Auth->user('dealer_id'),
		)));
		/* See section below.  Moving away from using lead sources table.  Grabbing the lead sources from the Contacts table to make it dynamic
		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		*/
		//Switching over the generated lead sources drop down to be dynamic from the contacts table.
		$lead_sources_options = $this->Contact->find(
			'list',
			array(
				'fields'=>array(
					'Contact.source','Contact.source'
				),
				'order'=>array(
					'Contact.source ASC'
				),
				'conditions'=> array('Contact.source !=' => $lead_sources_hide,'Contact.company_id' => $dealer_id)  //'Contact.created >=' => ' DATE_SUB(CURDATE(), INTERVAL 9 MONTH)'
			)
		);

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
		//$this->set('d_type_options', $d_type_options);


		$user_d_type = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$user_d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$type_options = array();
		foreach($d_types as $d_type){
			$type_options[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
		}
		$this->set('type_options', $type_options);
		$this->set('user_d_type', $user_d_type);

		// Unit Info Filters values

		$d_type_options = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('vehicle_selection_type'=>'Showroom')));
		$this->set('d_type_options', $d_type_options);
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

	function delete_autoresponder_rules($autoresponder_id){
		$this->loadModel("AutoresponderRule");
		$this->AutoresponderRule->id = $autoresponder_id;
		$this->AutoresponderRule->delete();
		$this->redirect(array('action' => 'setup_autoresponder'));
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
		$this->loadModel('Eblast');
		$this->Eblast->query("UPDATE eblasts SET `active`=$status WHERE eblasts_id = $id");
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

	function delete_autoresponder_rules_autoweblead($autoresponder_id){
		$this->loadModel("AutoresponderRule");
		$this->AutoresponderRule->id = $autoresponder_id;
		$this->AutoresponderRule->delete();

		$this->loadModel("AutowebleadSchedule");
		$this->AutowebleadSchedule->deleteAll(array('AutowebleadSchedule.autoresponderrule_id'=>$autoresponder_id));

		$this->redirect(array('action' => 'setup_autoresponder'));
	}

	public function delete_auto_weblead_scuedule(){
		if ($this->request->is('post')) {

			$this->loadModel("AutowebleadSchedule");
			$this->AutowebleadSchedule->id = $this->request->data['autoweblead_schedule_id'];
			$this->AutowebleadSchedule->delete();

			$AutowebleadSchedules = $this->AutowebleadSchedule->find('all', array('conditions'=>array('AutowebleadSchedule.autoresponderrule_id'=>$this->request->data['autoweblead_autoresponderrule_id'])));
			$this->set('AutowebleadSchedules', $AutowebleadSchedules);
		}
		$this->render('save_auto_weblead_scuedule');
	}

	public function save_auto_weblead_scuedule($autores_id = null){

		$this->loadModel("AutowebleadSchedule");
		if ($this->request->is('post')) {

			$dealer_id = $this->Auth->user('dealer_id');
			$start_time = "";
			$end_time = "";
			if($this->request->data['start_time'] != ''){
				$start_time = date("H:i:s", strtotime( date("Y-m-d")." ".$this->request->data['start_time']));
			}
			if($this->request->data['end_time'] != ''){
				$end_time = date("H:i:s", strtotime( date("Y-m-d")." ".$this->request->data['end_time']));
			}

			$AutowebleadScheduleData['AutowebleadSchedule']['autoresponderrule_id'] =  $autores_id;
			$AutowebleadScheduleData['AutowebleadSchedule']['dealer_id'] = $dealer_id;
			$AutowebleadScheduleData['AutowebleadSchedule']['weekday'] = $this->request->data['week_day'];
			$AutowebleadScheduleData['AutowebleadSchedule']['start_time'] = $start_time;
			$AutowebleadScheduleData['AutowebleadSchedule']['end_time'] = $end_time;

			$this->AutowebleadSchedule->create();
			$this->AutowebleadSchedule->save($AutowebleadScheduleData);
		}

		$AutowebleadSchedules = $this->AutowebleadSchedule->find('all', array('conditions'=>array('AutowebleadSchedule.autoresponderrule_id'=>$autores_id)));
		$this->set('AutowebleadSchedules', $AutowebleadSchedules);
	}


	function activate_auto_weblead(){

		if ($this->request->is('post')) {

			$dealer_id = $this->Auth->user('dealer_id');
			//debug($this->request->data);

			$this->loadModel("AutoresponderRule");
			foreach($this->request->data['WebAutoresponder'] as $rule){
				$AutoresponderRulesData = array();
				$AutoresponderRulesData['AutoresponderRule']['rule_type'] =  "auto_web_lead";
				$AutoresponderRulesData['AutoresponderRule']['dealer_id'] = $dealer_id;
				$AutoresponderRulesData['AutoresponderRule']['template_id'] = $rule['auto_weblead_template'];
				$AutoresponderRulesData['AutoresponderRule']['search_source'] = $rule['search_source'];
				$AutoresponderRulesData['AutoresponderRule']['email_mode'] = $rule['auto_weblead_email_mode'];
				if(empty( $rule['auto_weblead_id'] ) ){
					$this->AutoresponderRule->create();
				}else{
					$AutoresponderRulesData['AutoresponderRule']['id'] = $rule['auto_weblead_id'];
				}
				$this->AutoresponderRule->save($AutoresponderRulesData);
			}

		}

		$this->autoRender = false;
	}

	public function delete_template($template_id = null) {

		$this->autoRender = false;

		$this->loadModel("AutoresponderRule");
		$autocount = $this->AutoresponderRule->find('count', array('conditions'=>array('AutoresponderRule.template_id'=>$template_id)));
		$eblastcount = $this->Eblast->find('count', array('conditions'=>array('Eblast.template_id'=>$template_id)));

		$total_template = $autocount + $eblastcount;

		if($total_template > 0){
			$this->Session->setFlash(__('Template in use'), 'alert', array('class' => 'alert-error'));
			$this->redirect(array('action' => 'templates_list'));
		}else{

			$this->Template->id = $template_id;
			$template_data['Template'] = array('id' => $template_id,'is_deleted' => 1);
			$this->Template->save($template_data);

			$this->Session->setFlash(__('Template deleted'), 'alert');
			$this->redirect(array('action' => 'templates_list'));
		}

	}

	public function update_sent_log(){

		$this->loadModel("SendgridStatistic");
		$this->loadModel("EblastsSentLog");
		$this->loadModel("Eblast");

		$sent_log = $this->SendgridStatistic->find('all', array("conditions" => array("SendgridStatistic.event_type"=>'delivered')));
		//debug($sent_log);
		foreach($sent_log as $s_log){

			$template = $this->Eblast->find('first', array('fields'=>array("Eblast.eblasts_id", 'Eblast.template_id'), "conditions" => array(
				"Eblast.eblasts_id" => $s_log['SendgridStatistic']['eblasts_id']
			)));
			//debug($s_log);
			if(!empty($template)){
				$template_id = $template['Eblast']['template_id'];
				//debug($template_id);

				$sent_log = $this->EblastsSentLog->find('first', array("conditions" => array(
					"EblastsSentLog.dealer_id"=>$s_log['SendgridStatistic']['dealer_id'],
					"EblastsSentLog.template_id"=>$template_id,
					"EblastsSentLog.email"=>$s_log['SendgridStatistic']['email'],
				)));
				if(empty($sent_log)){

					print_r($sent_log);
					$this->EblastsSentLog->create();
					$this->EblastsSentLog->save(array("EblastsSentLog" => array(
						'email' => $s_log['SendgridStatistic']['email'],
						'dealer_id' => $s_log['SendgridStatistic']['dealer_id'],
						'template_id' => $template_id,
						'sent_date' => $s_log['SendgridStatistic']['created'],
					)));

				}else{
					$this->EblastsSentLog->id = $sent_log['EblastsSentLog']['id'];
					$this->EblastsSentLog->saveField("sent_date", $s_log['SendgridStatistic']['created']);
				}
			}
		}

		$this->autoRender = false;

	}



	public function update_sent_log_auto_responder(){

		$this->loadModel("SendgridAutoStatistic");
		$this->loadModel("EblastsSentLog");
		$this->loadModel("AutoresponderRule");

		$sent_log = $this->SendgridAutoStatistic->find('all', array("conditions" => array("SendgridAutoStatistic.event_type"=>'delivered')));
		//debug($sent_log);
		foreach($sent_log as $s_log){

			$template = $this->AutoresponderRule->find('first', array('fields'=>array("AutoresponderRule.id", 'AutoresponderRule.template_id'), "conditions" => array(
				"AutoresponderRule.id" => $s_log['SendgridAutoStatistic']['autoresponder_id']
			)));
			//debug($s_log);
			//debug($template);

			if(!empty($template)){
				$template_id = $template['AutoresponderRule']['template_id'];

				$sent_log = $this->EblastsSentLog->find('first', array("conditions" => array(
					"EblastsSentLog.dealer_id"=>$s_log['SendgridAutoStatistic']['dealer_id'],
					"EblastsSentLog.template_id"=>$template_id,
					"EblastsSentLog.email"=>$s_log['SendgridAutoStatistic']['email'],
				)));
				if(empty($sent_log)){

					print_r($template_id);
					echo "<br>";

					//debug($sent_log);
					$this->EblastsSentLog->create();
					$this->EblastsSentLog->save(array("EblastsSentLog" => array(
						'email' => $s_log['SendgridAutoStatistic']['email'],
						'dealer_id' => $s_log['SendgridAutoStatistic']['dealer_id'],
						'template_id' => $template_id,
						'sent_date' => $s_log['SendgridAutoStatistic']['created'],
					)));

				}else{
					$this->EblastsSentLog->id = $sent_log['EblastsSentLog']['id'];
					$this->EblastsSentLog->saveField("sent_date", $s_log['SendgridAutoStatistic']['created']);
				}
			}

		}

		$this->autoRender = false;

	}







}
