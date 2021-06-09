<?php

ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');
require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';
use Aws\S3\S3Client;

class UserEmailsController extends AppController {

	public $uses = array('UserEmail','History','User','Setting','Contact','UserTemplate','Template');
	public function index() {

	}

	public function email_preview_contact(){


		$mesage = $this->request->data['message'];
		$current_user = $this->Auth->User();

		if(isset($this->request->data['contact_id'])){
			$contact_id = $this->request->data['contact_id'];
			$userTemplateData = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		}else{
			$contact_data = $this->request->data['contact_data'];
			$searcharray = array();
			parse_str($contact_data , $searcharray);
			//debug($searcharray);
			$userTemplateData = $searcharray['data'];
		}

		//Insert template variables
		$templateValuedHtml = $mesage;
		foreach($userTemplateData['Contact'] as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}

		//Insert dealer variable
		$dealer_inputs = array(
			'dealer_name' => $current_user['dealer'],
			'dealer_email' => $current_user['d_email'],
			'dealer_phone' => $current_user['d_phone'],
			'dealer_fax' => $current_user['d_fax'],
			'dealer_address' => $current_user['d_address'],
			'dealer_city' => $current_user['d_city'],
			'dealer_state' => $current_user['d_state'],
			'dealer_zip' => $current_user['d_zip'],
			'dealer_website' => $current_user['d_website'],
		);
		foreach($dealer_inputs as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}
		$templateValuedHtml =  str_replace('{today}', date('m/d/Y g:i A'), $templateValuedHtml);
		echo $templateValuedHtml;

		$this->autoRender = false;

	}

	public function test_imap_manual() {
		$this->layout = 'ajax';
		$this->autoRender = false;

		$imap_settings = $this->get_setting('imap');
		$imap_gssapi = (isset($imap_settings) && $imap_settings['imap_gssapi'] == '1') ? array('DISABLE_AUTHENTICATOR'=>'GSSAPI') : array();
		//print_r($imap_settings );

		try{
			$imap = imap_open($imap_settings['mailbox'], $imap_settings['username'], $imap_settings['password'],null,1,$imap_gssapi);
			$numMessages = imap_num_msg($imap);

			print_r( $numMessages );
			print_r( imap_errors() );


			if($imap){
				echo 'Connection success!!';
			}else{
				echo "Couldn't connect to inbox";
			}


		} catch (Exception $e) {
			echo "Couldn't connect to inbox";

		}

	}

	public function test_imap() {
		$this->layout = 'ajax';
		$this->autoRender = false;

		$imap_settings = $this->get_setting('imap');

		if(isset($imap_settings['server_type']) &&  $imap_settings['server_type'] == 'Exchange Server'){

			$this->Ews = $this->Components->load('Ews');
			$result = $this->Ews->test_connection($imap_settings);
			if($result == true){
				echo 'Connection success!!';
			}else{
				echo "Couldn't connect to inbox";
			}

		}else{

			try{
				imap_timeout(1, 5);
				$imap = @imap_open($imap_settings['mailbox'], $imap_settings['username'], $imap_settings['password']);
				if($imap !== false){

					$numMessages = imap_num_msg($imap);
					if($imap){
						echo 'Connection success!!';
					}else{
						echo "Couldn't connect to inbox";
					}
					imap_close($imap);

				}else{
					echo "Couldn't connect to inbox";
				}


			} catch (Exception $e) {
				echo "Couldn't connect to inbox";

			}

		}




	}



	public function test_smtp_withoutauth() {
		$addr = $this->request->query['email'];
		$this->layout = 'ajax';
		$this->autoRender = false;

		$userinfo = $this->Auth->user();

		//Smtp setting for sending emails
		$smtp_settings = $this->get_setting('smtp');
		unset($smtp_settings['smtp']['username'] );
		unset($smtp_settings['smtp']['password'] );

		print_r($smtp_settings);
		echo "<br>";

		if(!empty($smtp_settings)){

			try{

				//Sent email to inbox
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->config($smtp_settings['smtp']);

				$email->viewVars(array('email_content'=>"This is a SMTP Test Email from DP360crm"));
				$email->template('internal_message')
					->emailFormat('html')
					->subject('Test Email from DP360crm')
					->from(array($smtp_settings['emailaddress'] => $userinfo['first_name']." ".$userinfo['last_name']))
					->to(array($addr))
					->replyTo(array($smtp_settings['emailaddress'] => $userinfo['first_name']." ".$userinfo['last_name']))
					->send();

				echo "Message Sent";

			} catch (Exception $e) {
				echo "Message couldn't be sent ".$e->getMessage();

			}
		}else {
			echo "Smtp Settings not completed";
		}

		$this->autoRender = false;



	}

	public function test_smtp() {
		$addr = $this->request->query['email'];
		$this->layout = 'ajax';
		$this->autoRender = false;

		$userinfo = $this->Auth->user();

		//Smtp setting for sending emails
		$smtp_settings = $this->get_setting('smtp');
		//debug($userinfo );

		if(!empty($smtp_settings)){

			try{

				//Sent email to inbox
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->config($smtp_settings['smtp']);

				$email->viewVars(array('email_content'=>"This is a SMTP Test Email from DP360crm"));
				$email->template('internal_message')
					->emailFormat('html')
					->subject('Test Email from DP360crm')
					->from(array($smtp_settings['emailaddress'] => $userinfo['first_name']." ".$userinfo['last_name']))
					->to(array($addr))
					->replyTo(array($smtp_settings['emailaddress'] => $userinfo['first_name']." ".$userinfo['last_name']))
					->send();

				echo "Message Sent";

			} catch (Exception $e) {
				echo "Message couldn't be sent ".$e->getMessage();

			}
		}else {
			echo "Smtp Settings not completed";
		}




	}

	public function start_sync(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$user_id = $this->Auth->user('id');
		$user_id = base64_encode($user_id);

		$timezone = $this->Auth->user('zone');
		date_default_timezone_set("UTC");

		$dealer_id = $this->Auth->user('dealer_id');
		$dealer_id = base64_encode($dealer_id);
		//debug( date('Y:m:d H:i:s',strtotime('now'))   );

		$runsync = true;

		$last_run = $this->get_last_run();
		$last_run_zone = $this->datetime_conversion($last_run);


		if($last_run != null){
			$last_run_time = strtotime($last_run);
			$now = strtotime('now');
			$diff = $now - $last_run_time;
			if($diff < 300 ){
				echo "The manual email sync can only be ran every 5 min. Please try again later. <br> <center> <i class='fa fa-fw fa-exclamation-triangle' style='color: #cc3a3a;'></i>    Last Sync:". date('D - M d, Y g:i A',strtotime($last_run_zone)) . "</center>" ;
				$runsync = false;
			}

		}
		if($runsync == true){
			$homepage = file_get_contents('http://eblast.dealershipperformancecrm.com/user_emails/sync_emails/?id='.urlencode($user_id).'&dealer_id='.urlencode($dealer_id) );
			echo $homepage;
		}



		//echo "sync";

	}

	public function sync_modal(){
		$this->layout='ajax';
		$user_id = $this->Auth->user('id');
		$user_id = base64_encode($user_id);
		$this->set('user_id',$user_id);

		$last_run = $this->get_last_run();
		$last_run = $this->datetime_conversion($last_run);
		$this->set('last_run', $last_run);
	}

	public function datetime_conversion($last_run_utc){

		$timezone = $this->Auth->user('zone');
		$current_time_utc = strtotime($last_run_utc);

		$dt = new DateTime(null, new DateTimeZone($timezone));
		$realtime = $current_time_utc + $dt->getOffset();
		return date("Y-m-d H:i:s", $realtime);

	}

	public function sync_email(){
		$this->layout='default_new';
		$user_id = $this->Auth->user('id');
		$user_id = base64_encode($user_id);
		$this->set('user_id',$user_id);

		$last_run = $this->get_last_run();
		$this->set('last_run', $last_run);

		$smtp_settings = $this->requestAction("/user_emails/get_setting/smtp");
		$this->set('smtp_settings', $smtp_settings);
		//debug($smtp_settings);

	}
	public function unread_count(){
		$current_user_id = $this->Auth->User('id');

		//Count Inbox
		$conditions['UserEmail.email_type'] = 'contact';
		$conditions['UserEmail.receiver_id'] = $current_user_id;
		$conditions['UserEmail.read'] = '0';

		$inbox_cnt = $this->UserEmail->find('count',array(
			'conditions'=>$conditions
		));
		//debug($inbox_cnt);

		//Count Staff in
		$conditions = array();
		$conditions['UserEmail.email_type'] = 'user';
		$conditions['UserEmail.receiver_id'] = $current_user_id;
		$conditions['UserEmail.read'] = '0';
		$staff_cnt = $this->UserEmail->find('count',array(
			'conditions'=>$conditions
		));
		//debug($staff_cnt);

		return array($inbox_cnt, $staff_cnt);

	}
	public function delete_draft($draft_id){
		$this->loadModel("Draft");
		$this->Draft->id = $draft_id;
		$this->Draft->delete();
		$this->redirect(array('controller' => 'user_emails', 'action' => 'inbox', 'draft'));

	}
	public function inbox($type = null) {

		$last_run = $this->get_last_run();
		//debug($last_run);
		$last_run = $this->datetime_conversion($last_run);
		$this->set('last_run', $last_run);

		$this->set('type', $type);

		// try {
		// 	//Email Sync
		// 	$user_encode = base64_encode( $this->Auth->user('id') );
		// 	$imap_settings = $this->get_setting('imap');
		// 	if(!empty($imap_settings )){
		// 		$ctx = stream_context_create(
		// 		array('http'=>
		// 		    array(
		// 		        'timeout' => 2,
		// 		    )
		// 		));
		// 		@file_get_contents('https://handler.dealershipperformancecrm.com/user_emails/sync_emails/?id='.$user_encode, false, $ctx);
		// 	}
		// }catch (Exception $e) {

		// }



		//debug($this->request->params['pass']['0']);

		$this->helper[] = 'Text';
		$this->layout='default_new';
		$current_user_id = $this->Auth->User('id');

		//$conditions = array('UserEmail.receiver_id'=>$current_user_id);

		if($type != null && $type == 'draft'){

			//debug("test");
			$this->loadModel('Draft');
			$drafts = $this->Draft->find('all', array('conditions' => array('Draft.user_id'=> $this->Auth->user('id')   ) ));
			//debug($drafts);
			$this->set('drafts',$drafts);

		}else{

			if($type == null){
				$conditions['UserEmail.email_type'] = 'contact';
				$conditions['UserEmail.receiver_id'] = $current_user_id;
			}

			if($type != null && $type == 'replies'){
				$conditions['UserEmail.email_type'] = 'contact';
				$conditions['UserEmail.sender_id'] = $current_user_id;
			}

			if($type != null && $type == 'internal'){
				$conditions['UserEmail.email_type'] = 'user';
			}

			if($type != null && $type == 'staff_in'){
				$conditions['UserEmail.email_type'] = 'user';
				$conditions['UserEmail.receiver_id'] = $current_user_id;
			}
			if($type != null && $type == 'staff_sent'){
				$conditions['UserEmail.email_type'] = 'user';
				$conditions['UserEmail.sender_id'] = $current_user_id;
			}

			if($type != null && $type == 'failed'){
				$conditions['UserEmail.email_type'] = 'failed';
				$conditions['UserEmail.receiver_id'] = $current_user_id;
			}

			//debug($this->request->query);

			if(!empty($this->request->query['src'])){
				 $conditions['OR']['UserEmail.subject LIKE'] = "%".trim($this->request->query['src'])."%";

				$conditions['OR']['UserEmail.receiver_name LIKE '] = "%".trim($this->request->query['src'])."%";
				$conditions['OR']['UserEmail.receiver_email LIKE '] = "%".trim($this->request->query['src'])."%";

				$conditions['OR']['UserEmail.sender_name LIKE '] = "%".trim($this->request->query['src'])."%";
				$conditions['OR']['UserEmail.receiver_email LIKE '] = "%".trim($this->request->query['src'])."%";

				$conditions['OR']['UserEmail.message_text LIKE '] = "%".trim($this->request->query['src'])."%";

			}

			if(empty($conditions['UserEmail.receiver_id']) &&  empty($conditions['UserEmail.sender_id'])){
				$conditions['UserEmail.email_type'] = 'contact';
				$conditions['UserEmail.receiver_id'] = $current_user_id;
			}

			//debug($conditions);

			$this->paginate = array(
				'conditions' => $conditions,
				'order'=>array('UserEmail.received_date'=>'DESC'),
				'limit' => 50,
			);
			$data_email = $this->Paginate('UserEmail');
			$this->set('data', $data_email);

		}




		$this->set('current_user_id', $current_user_id);

		$unread = $this->unread_count();
		$this->set('unread',$unread);
		//debug($unread);
	}
	public function email_details($id){
		$this->layout='ajax';
		$current_user_id = $this->Auth->User('id');
		$userEmails = $this->UserEmail->find('all',array(
			'conditions'=>array('UserEmail.id'=>$id),
			'order'=>'UserEmail.received_date DESC'
		));
		$this->set('userEmails',$userEmails);
		$this->set('current_user_id', $current_user_id);

		//Set read
		$this->UserEmail->id = $id;
		$this->UserEmail->saveField('read','1');

		$unread = $this->unread_count();
		$this->set('unread',$unread);

	}

	function deleteemail($id){
		$this->UserEmail->delete($id);
		$this->redirect(array('controller' => 'user_emails', 'action' => 'inbox'));
	}


	public function get_open_lead($email = 'russel@dp360crm.com', $dealer_id = 5000){
		$statuses = $this->UserEmail->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
		$dead_status = array();
		foreach($statuses as $status){
			$dead_status[] = $status['lead_statuses']['name'];
		}
		//debug( $dead_status );

		$get_open_lead =  $this->Contact->find('first', array(
			'fields' => array('Contact.id'),
			'recursive' => -1,
			'conditions'=>array(
				'Contact.company_id' => $dealer_id,
				'Contact.status <>' => $dead_status,
				'Contact.email' => $email,
			),
			'order'=> 'Contact.modified DESC'
		));
		//debug( $get_open_lead );
		if(!empty($get_open_lead)){
			return $get_open_lead['Contact']['id'];
		}else{
			return false;
		}
	}
	public function check_duplicate_message($messageid = '123456', $contact_id = '000' ){
		//user_emails - messageid
		$msg_count = $this->UserEmail->find('count', array(
			'conditions'=>array(
				'UserEmail.messageid' => $messageid,
				'UserEmail.sender_id' => $contact_id,
			),
		));
		return $msg_count;
	}


	public function insert_email_body(
		$contact_id = '1414090',
		$messageid = 'russel@dp360crm.com-a',
		$subject = 'sub',
		$body= 'fsfsdfsdf df',
		$received_date='2014-09-21 11:20:20')
	{


		$current_user = $this->Auth->User();
		$timezone = $current_user['zone'];
		date_default_timezone_set($timezone);

		//check duplicae message

		$receiver_id = $current_user['id'];
		$dealer_id = $current_user['dealer_id'];

		//contact info
		$this->Contact->recursive = -1;
		$sender_info = $this->Contact->findById($contact_id);
		$this->User->recursive = -1;
		$reciever_info = $this->User->findById($receiver_id);

		//Update contact modified date

        $this->Contact->id = $sender_info['Contact']['id'];
        $this->Contact->saveField('modified',  date('Y-m-d H:i:s') );

		//debug($sender_info);
		//debug($reciever_info);

		$emailData['UserEmail']['sender_id'] = 		$sender_info['Contact']['id'];
		$emailData['UserEmail']['sender_name'] = 	$sender_info['Contact']['full_name'];
		$emailData['UserEmail']['email_from'] = 	$sender_info['Contact']['email'];
		$emailData['UserEmail']['email_type'] = 	strtolower('Contact');
		$emailData['UserEmail']['receiver_id'] = 	$reciever_info['User']['id'];
		$emailData['UserEmail']['receiver_name'] = 	$reciever_info['User']['full_name'];
		$emailData['UserEmail']['email_replyto'] = 	$reciever_info['User']['email'];
		$emailData['UserEmail']['subject'] = 		$subject;
		$emailData['UserEmail']['message'] = 		$body;
		$emailData['UserEmail']['received_date'] = 	$received_date;
		$emailData['UserEmail']['messageid'] = 	$messageid;

		$this->UserEmail->create();
		if( $this->UserEmail->save($emailData) ){

			//Save History
			$history_data = array();
			$history_data['contact_id'] = 		$sender_info['Contact']['id'];
			$history_data['cond'] = 			strtolower('Contact');
			$history_data['year'] = 			$sender_info['Contact']['full_name'];
			$history_data['make'] = 			$reciever_info['User']['full_name'];
			$history_data['model'] = 			$sender_info['Contact']['email'];
			$history_data['deal_id'] = 			$sender_info['Contact']['id'];
			$history_data['status'] = 			"to Employee";
			$history_data['comment'] = 			$body;
			$history_data['start_date'] = 		$received_date;
			$history_data['h_type'] = 			"Email";
			$history_data['sales_step'] = 		"Email";
			$history_data['sperson'] = 			$sender_info['Contact']['full_name'];
			$history_data['modified'] = 		date('D - M d, Y g:i A',  strtotime($received_date));
			$history_data['created'] =  		$received_date;

			$history = array(
				'History' => $history_data
			);
			$this->History->save($history);
		}


	}

	public function get_last_run(){
		$current_user_id = $this->Auth->User('id');

		$this->loadModel('EmailSetting');
		$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
		if(!empty($current_settings)){
			return $current_settings['EmailSetting']['last_check'];
		}else{
			return null;
		}

	}

	public function sync_emails(){

		$current_user = $this->Auth->User();
		$timezone = $current_user['zone'];
		date_default_timezone_set($timezone);

		$this->layout='default_user_email_compose';

		//Smtp setting for sending emails
		$imap_settings = $this->get_setting('imap');
		//debug($imap_settings);

		$imap_gssapi = (isset($imap_settings) && $imap_settings['imap_gssapi'] == '1') ? array('DISABLE_AUTHENTICATOR'=>'GSSAPI') : array();

		$imap = imap_open($imap_settings['mailbox'], $imap_settings['username'], $imap_settings['password'],null,1,$imap_gssapi);
		$numMessages = imap_num_msg($imap);

		$last_sync_time = strtotime("now");

		$sync_result = array();

		for ($i = $numMessages; $i > $numMessages-5 ; $i--) {

			$header = imap_header($imap, $i);
			$fromInfo = $header->from[0];
			$replyInfo = $header->reply_to[0];

			$details = array(
							"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
								? $fromInfo->mailbox . "@" . $fromInfo->host : "",
							"fromName" => (isset($fromInfo->personal))
								? $fromInfo->personal : "",
							"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
								? $replyInfo->mailbox . "@" . $replyInfo->host : "",
							"replyName" => (isset($replyTo->personal))
								? $replyto->personal : "",
							"subject" => (isset($header->subject))
								? $header->subject : "",
							"udate" => (isset($header->udate))
								? $header->udate : ""
						);

			$uid = imap_uid($imap, $i);
			$messageid = $uid."-".$imap_settings['username'];
			$message_date =  date('Y-m-d H:i:s',$details['udate']);

			//if($current_user['dealer_id'] == 2344){
				$email_sync_user = array("id" => $current_user['id'], "username" => $current_user['username']);
				$email_sync_current_time = date('m/d/Y h:i:s a', time());
				$email_sync_log = compact($email_sync_user,$timezone,$message_date,$email_sync_current_time);
				CakeLog::write('EmailSync_time',$email_sync_log);
			//}
			//debug($details);
			//$body = $this->getBody( $uid , $imap );
			/*
			array('fromAddr' => 'leads@dp360crm.com','fromName' => 'Bill Testerson','replyAddr' => 'leads@dp360crm.com','replyName' => '','subject' => 'Test email using dynamic smtp',	'udate' => (int) 1411311455)
			*/
			$contact_id = $this->get_open_lead($details['fromAddr'], $current_user['zone']);
			if($contact_id !== false){
				$isduplicate = $this->check_duplicate_message($messageid, $contact_id);
				if($isduplicate == '0'){
					$body = $this->getBody( $uid , $imap );

					$this->insert_email_body(
						$contact_id,
						$messageid,
						$details['subject'],
						$body,
						$message_date
					);
					$sync_result[] = array('contact_id'=>$contact_id,  $details['subject'], $message_date);
				}
			}

		}
		$this->set('sync_result',$sync_result);
	}





	public function send_contact_email_test(){

		$this->requestAction('user_emails/send_contact_email', array(
			'contact_id' => '3738626',
			// "cc"=>"awrussel2002@gmail.com",
			// "bcc"=>"awrussel2002@yahoo.com",
			'subject'=>'Test Message Ews',
			'mailbody'=>'<p style="font-size: 18px; font-weight: bold;">Test email message from php ews library.</p>' )
		);

		// $emails = $this->process_cc_bcc('dfd@dfdf.com abc@def.com;def@ddd.com 1 1 2223');
		// debug($emails);
	}
	public function process_cc_bcc($email_text = ""){
		if($email_text != ''){
			$emails = array();
			$keywords = preg_split("/[\s,;]+/", $email_text);
			foreach($keywords as  $keyword){
				if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
					$emails[] = $keyword;
				}
			}
			return $emails;
		}else{
			return array();
		}
	}

	public function send_contact_email($update_note = null){

		$current_user = $this->Auth->User();
		$dealer_id = $this->Auth->User('dealer_id');
		$timezone = $current_user['zone'];
		date_default_timezone_set($timezone);
		$received_date = date('Y-m-d H:i:s');

		//Smtp setting for sending emails
		$smtp_settings = $this->get_setting('smtp');

		if(empty($smtp_settings)){
			return 'Smtp Settins Not found';
		}


		$contact_id = $this->request->params['contact_id'];
		$subject = $this->request->params['subject'];

		$cc = $this->process_cc_bcc($this->request->params['cc']);
		$bcc = $this->process_cc_bcc($this->request->params['bcc']);


		//$cc = $this->request->params['cc'];
		//$bcc = $this->request->params['bcc'];
		$mailbody = $this->request->params['mailbody'];


		//$reply = 'C.'.$contact_id;
		$this->Contact->bindModel(array(
			'belongsTo'=>array('User'),
		));
		$userTemplateData = $this->Contact->find('first', array('recursive'=>1, 'conditions'=>array('Contact.id'=>$contact_id)));



		//Insert template variables
		$templateValuedHtml = $mailbody;
		foreach($userTemplateData['Contact'] as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}

		//Insert dealer variable
		$dealer_inputs = array(
			'sperson_first' => $userTemplateData['User']['first_name'],
			'dealer_name' => $current_user['dealer'],
			'dealer_email' => $current_user['d_email'],
			'dealer_phone' => $current_user['d_phone'],
			'dealer_fax' => $current_user['d_fax'],
			'dealer_address' => $current_user['d_address'],
			'dealer_city' => $current_user['d_city'],
			'dealer_state' => $current_user['d_state'],
			'dealer_zip' => $current_user['d_zip'],
			'dealer_website' => $current_user['d_website'],
		);
		foreach($dealer_inputs as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}
		$templateValuedHtml =  str_replace('{today}', date('m/d/Y g:i A'), $templateValuedHtml);




		$data_user_email['message'] = $templateValuedHtml;

		$data_user_email['email_type'] = 'contact';
		$data_user_email['receiver_id'] = $contact_id;
		$data_user_email['receiver_name'] = $userTemplateData['Contact']['full_name'];

		if( $setting['Setting']['email_from'] != ''){
			$data_user_email['email_from'] = $setting['Setting']['email_from'];
		}else{
			$data_user_email['email_from'] = $current_user['email'];
		}

		$data_user_email['subject'] = $subject;

		//$replyTo=$reply.'_'.$this->Auth->user('id').'_'.$this->Auth->user('dealer_id').'@yourlocaldealership.com';

		$data_user_email['sender_name'] = $current_user['full_name'];
		$data_user_email['sender_id'] = $current_user['id'];
		$data_user_email['email_replyto'] = $smtp_settings['emailaddress'];
		$data_user_email['received_date'] = $received_date;

		$customer_note = "";
		$data_user_email['message'] .= $customer_note;

		$receiver_email = 	$userTemplateData['Contact']['email'];

		$data_user_email['receiver_email'] = $userTemplateData['Contact']['email'];

		//debug($receiver_email);

		$unsubscribe_link = "";
		$this->loadModel('DealerSetting');
		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $dealer_id);

		if($casl_feature == 'On'){
			App::uses('CakeText', 'Utility');
			$log_ref_number = CakeText::uuid();

			App::uses('CakeEmail', 'Network/Email');
			$key = 'ioOJ987hKhyiu687iHkKHKhkHkHKjhIU';
			$contact_id_enc = base64_encode(Security::rijndael($contact_id, $key, 'encrypt'));
			$unsubscribe_link = "<br><br><p>If you'd like to unsubscribe and stop receiving these emails <a href='https://app.dealershipperformancecrm.com/unsubscribes/cnt/?ld=".urlencode($contact_id_enc)."'>click here</a> .</p>";
		}

		App::uses('CakeText', 'Utility');
		$log_ref_number = CakeText::uuid();

		$data_user_email['message'] = $data_user_email['message'].$unsubscribe_link.'<img src="https://app.dealershipperformancecrm.com/imgs/index/'.$log_ref_number.'/mail.png" width="1" height="1" title="" alt=""> ';

		try{

			//Process attachments
			$attachment_ar = array();
			$attachment_file_names = array();
			//debug($this->request->params['attachment_files']);
			if(isset($this->request->params['attachment_files']) && !empty($this->request->params['attachment_files'])){
				foreach( $this->request->params['attachment_files'] as $at_f ){
					$attachment_file_names[] = $at_f;
					$data_attachment = $this->get_attachment_data($at_f);
					$filename = $this->get_filename($at_f);
					$attachment_ar[$filename] = array('data' => $data_attachment );
				}
			}
			//debug($attachment_ar);

			$data_user_email['attachments'] = json_encode($attachment_file_names);
			$email = new CakeEmail();
			$email->config($smtp_settings['smtp']);
			$email->viewVars(array('email_content'=>$data_user_email['message']));
			if(!empty($attachment_ar)){
				$email->attachments($attachment_ar);
			}

			$email->template('internal_message')
				->emailFormat('html')
				->subject($data_user_email['subject'])
				->from(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
				->to($receiver_email);

			if(!empty($cc)){
				$email->cc($cc);
			}
			if(!empty($bcc)){
				$email->bcc($bcc);
			}
			$email->replyTo(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))->send();

			if($update_note != null){
				$this->Contact->id = $contact_id;
				$this->Contact->saveField('notes', $data_user_email['message']);
			}

			//Save user email
			$this->UserEmail->create();
			if( $this->UserEmail->save( array('UserEmail'=>$data_user_email ) ) ){

				//Save History
				$h_data = array();
				$h_data['contact_id'] = 		$data_user_email['receiver_id'];
				$h_data['cond'] = 			$data_user_email['email_type'];
				$h_data['year'] = 			$data_user_email['sender_name'];
				$h_data['make'] = 			$data_user_email['receiver_name'];
				$h_data['model'] = 			$data_user_email['email_from'];
				$h_data['deal_id'] = 			$data_user_email['sender_id'];
				$h_data['status'] = 			"to Customer";
				$h_data['comment'] = 			$data_user_email['message'];
				$h_data['start_date'] = 		$data_user_email['received_date'];
				$h_data['h_type'] = 			"Email";
				$h_data['sales_step'] = 		"Email";
				$h_data['sperson'] = 			$data_user_email['sender_name'];
				$h_data['modified'] = 		date('D - M d, Y g:i A');
				$h_data['created'] =  		date('Y-m-d H:i:s');

				$htr = array(
					'History' => $h_data
				);
				$this->History->create();
				$this->History->save($htr);

				//Save Email Log
				$this->LoadModel('UserEmailLog');
				$this->UserEmailLog->create();
				$this->UserEmailLog->save(array('UserEmailLog'=>array(
					'contact_id' => $contact_id,
					'user_id' => $current_user['id'],
					'send_date' => $received_date,
					'history_id' => $this->History->id,
					'timezone' => $timezone,
					'ref_number' => $log_ref_number,

				)));







				return "Email sent";

			}


		}catch (Exception $e) {



			$emailData_failed['UserEmail']['sender_id'] =      $data_user_email['sender_id'];
	        $emailData_failed['UserEmail']['sender_name'] =    "Support";

	        $emailData_failed['UserEmail']['email_from'] =     "support@dp360crm.com";
	        $emailData_failed['UserEmail']['email_type'] =     "failed";

	        $emailData_failed['UserEmail']['receiver_id'] =    $data_user_email['sender_id'];
	        $emailData_failed['UserEmail']['receiver_name'] =  $data_user_email['sender_name'];

	        $emailData_failed['UserEmail']['email_replyto'] =  $data_user_email['email_replyto'];
	        $emailData_failed['UserEmail']['subject'] =        "Email Delivery failed - ".$subject;
	        $emailData_failed['UserEmail']['message'] =        "Receiver Name: {$data_user_email['receiver_name']}  #{$data_user_email['receiver_id']} <br>".$data_user_email['message'];
	        $emailData_failed['UserEmail']['received_date'] =  $data_user_email['received_date'];
	        $emailData_failed['UserEmail']['messageid'] =  $messageid;


	        $emailData_failed['UserEmail']['receiver_email'] = $data_user_email['receiver_email'];
	        $emailData_failed['UserEmail']['message_text'] = strip_tags( $data_user_email['message'] );
	        $this->UserEmail->create();
	        $this->UserEmail->save($emailData_failed);


			CakeLog::write('email_send_log_'.$current_user['id'], $e->getMessage());


			return "Email could not be sent, Please check your settings!";
		}

		return "Email sent";


	}





	public function compose($type = 'user', $email_user_id = null) {
			$this->layout='default_user_email_compose';

			$current_user = $this->Auth->User();
			$current_user_id = $this->Auth->User('id');
			$this->set('current_user_id',$current_user_id);
			$dealer_id = $this->Auth->User('dealer_id');
			$current_settings = $this->Setting->find('first', array('conditions'=>array('Setting.user_id'=>$current_user_id)));
			foreach($current_settings as $setting){
			$signature = $setting['signature'];
			}
			$this->set('sig', $signature);

			$this->loadModel('SetCcBccDefaultEmail');
			$SetCcBccDefaultEmail = $this->SetCcBccDefaultEmail->find('first', array('conditions' => array('dealer_id' => $this->Auth->user('dealer_id'),'email_type' => 'Lead Emails')));
			$this->set('SetCcBccDefaultEmail',$SetCcBccDefaultEmail);


			//debug($current_user);
			$timezone = $current_user['zone'];
			date_default_timezone_set($timezone);
			$received_date = date('Y-m-d H:i:s');

			$setting = $this->Setting->find('first', array('conditions'=>array('Setting.user_id'=>$current_user['id'])));
			$this->set('setting',$setting);
			$this->set('type', $type);

			//Smtp setting for sending emails
			$smtp_settings = $this->get_setting('smtp');

			if(empty($smtp_settings)){
				$this->Session->setFlash(__('Please complete smtp settings'), 'alert');
				$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
			}



			//attachment feature
			$client = S3Client::factory(array(
	    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
	    		'secret' => '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',
			));
			$bucket = "dp360-attachments";

			App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
	    	$bucket = 'dp360-attachments';
	    	$success_action_redirect = "https://app.dealershipperformancecrm.com/contact_s3/test/";
	    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
			$s3policy->addCondition('', 'acl', 'private')
		         ->addCondition('', 'bucket', $bucket)
		         ->addCondition('starts-with', '$key', '')
		         ->addCondition('starts-with', '$Content-Type', '')
		         ->addCondition('content-length-range', 1, 5242880)
		         ->addCondition('', 'success_action_redirect', $success_action_redirect);

			$policy = $s3policy->getPolicy(true);
			$signature = $s3policy->getSignedPolicy();

			$this->set('policy',$policy);
			$this->set('signature',$signature);
			$this->set('bucket',$bucket);

			$message_key = uniqid();

			$filename =  uniqid($message_key."_")."_";
			$this->set('filename',$filename);
			$this->set('message_key',$message_key);






			if($type == 'user'){
				//user to user
				$userlists = $this->User->find('list', array('conditions'=>array('User.active' => 1, 'User.dealer_id' => $dealer_id, 'User.group_id <>'=>1,'User.id <>'=>$current_user['id'])));
				$this->set('userlists',$userlists);
				if($email_user_id != null)
					$this->request->data['UserEmail']['receiver_id'] = $email_user_id;
				$this->request->data['UserEmail']['receiver_name'] = $userlists[ $this->request->data['UserEmail']['receiver_id'] ];

				//Template List
				$this->Template->virtualFields['model_id']='CONCAT("Template_",Template.template_id)';
				$Templates = $this->Template->find('list', array('conditions'=>array('Template.user_id'=>$dealer_id),'fields'=>array('Template.model_id','Template.template_title')));

				$this->UserTemplate->virtualFields['model_id']='CONCAT("UserTemplate_",UserTemplate.id)';
				$userTemplates = $this->UserTemplate->find('list', array('conditions'=>array('UserTemplate.dealer_id'=>$dealer_id/*,'UserTemplate.template_type'=>'user'*/),'fields'=>array('UserTemplate.model_id','UserTemplate.template_title')));
				$userTemplates=array_merge($userTemplates,$Templates);
				$this->set('userTemplates',$userTemplates);
			}else if($type == 'contact'){
				//user to contact
				$contact_info = $this->Contact->find('first', array('fields'=>array('Contact.id','Contact.full_name','Contact.email','xml_inv_url'),'recursive'=>-1,'conditions'=>array('Contact.id'=>$email_user_id)));
				$this->request->data['UserEmail']['receiver_name'] = $contact_info['Contact']['full_name'];
				$this->request->data['UserEmail']['receiver_id'] = $contact_info['Contact']['id'];
				$receiver_email = 	$contact_info['Contact']['email'];

				$this->set("contact_info", $contact_info);
				//debug( $contact_info );

				//Template List

				$this->UserTemplate->virtualFields['model_id']='CONCAT("UserTemplate_",UserTemplate.id)';
				$userTemplates = $this->UserTemplate->find('list', array('conditions'=>array('UserTemplate.dealer_id'=>$dealer_id,'UserTemplate.template_type'=>'customer'),'fields'=>array('UserTemplate.model_id','UserTemplate.template_title')));

				$this->set('userTemplates',$userTemplates);
			}

			if ($this->request->is('post')) {

				if($type == 'user'){
					$reply='U.'.$this->request->data['UserEmail']['receiver_id'];
					$this->User->id = $this->request->data['UserEmail']['receiver_id'];
					$receiver_email = 	$this->User->field('email');

					//get template data
					$userTemplateData = $this->User->find('first', array('recursive'=>-1,'conditions'=>array('User.id'=>$this->request->data['UserEmail']['receiver_id'])));


					//Insert template variables
					$templateValuedHtml = $this->request->data['UserEmail']['message'];
					foreach($userTemplateData['User'] as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}
					$this->request->data['UserEmail']['message'] = $templateValuedHtml;
				}else{
					//get template data
					$reply='C.'.$this->request->data['UserEmail']['receiver_id'];

					$this->Contact->bindModel(array(
						'belongsTo'=>array('User'),
					));
					$userTemplateData = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$this->request->data['UserEmail']['receiver_id'])));

					//Insert template variables
					$templateValuedHtml = $this->request->data['UserEmail']['message'];
					foreach($userTemplateData['Contact'] as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}

					//Insert dealer variable
					$dealer_inputs = array(
						'sperson_first' => $userTemplateData['User']['first_name'],
						'dealer_name' => $current_user['dealer'],
						'dealer_email' => $current_user['d_email'],
						'dealer_phone' => $current_user['d_phone'],
						'dealer_fax' => $current_user['d_fax'],
						'dealer_address' => $current_user['d_address'],
						'dealer_city' => $current_user['d_city'],
						'dealer_state' => $current_user['d_state'],
						'dealer_zip' => $current_user['d_zip'],
						'dealer_website' => $current_user['d_website'],
					);
					foreach($dealer_inputs as $key => $value) {
						$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
					}
					$templateValuedHtml =  str_replace('{today}', date('m/d/Y g:i A'), $templateValuedHtml);
					$this->request->data['UserEmail']['message'] = $templateValuedHtml;
				}




				$this->request->data['UserEmail']['email_type'] = $type;
				//$data['UserEmail']['receiver_id']
				if($type == 'user'){
					$data['UserEmail']['receiver_name'] = $userlists[$this->request->data['UserEmail']['receiver_id']];
				}


				$replyTo=$reply.'_'.$this->Auth->user('id').'_'.$this->Auth->user('dealer_id').'@yourlocaldealership.com';

				$mail_refrenence = $reply.'_'.$this->Auth->user('id').'_'.$this->Auth->user('dealer_id');

				$this->request->data['UserEmail']['sender_name'] = $current_user['full_name'];
				$this->request->data['UserEmail']['sender_id'] = $current_user['id'];
				$this->request->data['UserEmail']['email_replyto'] = $this->request->data['UserEmail']['email_from'];
				$this->request->data['UserEmail']['received_date'] = $received_date;

				/*
				if($type != 'user'){
					$customer_note = "<br /><br />REF: {$mail_refrenence} ".$this->request->data['UserEmail']['email_from']."<br>";
					$this->request->data['UserEmail']['message'] .= $customer_note;
				}
				*/
				$this->request->data['UserEmail']['receiver_email'] = $receiver_email;
				$this->request->data['UserEmail']['message_text'] = strip_tags( $this->request->data['UserEmail']['message'] );




				try{


					App::uses('CakeText', 'Utility');
					$log_ref_number = CakeText::uuid();

					$this->request->data['UserEmail']['message'] = $this->request->data['UserEmail']['message'].'<img src="https://app.dealershipperformancecrm.com/imgs/index/'.$log_ref_number.'/mail.png" width="1" height="1" title="" alt=""> ';


					//Sent email to inbox
					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->config($smtp_settings['smtp']);

					//Process attachments
					$attachment_ar = array();
					$attachment_file_names = array();
					//debug($this->request->params['attachment_files']);
					if(isset($this->request->data['attachment_files']) && !empty($this->request->data['attachment_files'])){
						foreach( $this->request->data['attachment_files'] as $at_f ){
							$attachment_file_names[] = $at_f;
							$data_attachment = $this->get_attachment_data($at_f);
							$filename = $this->get_filename($at_f);
							$attachment_ar[$filename] = array('data' => $data_attachment );
						}
					}
					//debug($attachment_ar);
					$this->request->data['UserEmail']['attachments'] = json_encode($attachment_file_names);



					$email->viewVars(array('email_content'=>$this->request->data['UserEmail']['message']));
					if(!empty($attachment_ar)){
						$email->attachments($attachment_ar);
					}

					$cc = $this->process_cc_bcc($this->request->data['UserEmail']['cc']);
					$bcc = $this->process_cc_bcc($this->request->data['UserEmail']['bcc']);


					$email->template('internal_message')
						->emailFormat('html')
						->subject($this->request->data['UserEmail']['subject'])
						->from(array($smtp_settings['emailaddress']=>$this->request->data['UserEmail']['sender_name']))
						->to(array($receiver_email))
						->replyTo(array($smtp_settings['emailaddress'] => $this->request->data['UserEmail']['sender_name']));

					if(!empty($cc)){
						$email->cc($cc);
					}
					if(!empty($bcc)){
						$email->bcc($bcc);
					}


					$email->send();



						$this->UserEmail->create();
						if($this->UserEmail->save($this->request->data)){
							$this->Session->setFlash(__('Email sent'), 'alert');

							//Save History
							$history_data = array();
							$history_data['contact_id'] = 			$this->request->data['UserEmail']['receiver_id'];
							$history_data['cond'] = 			$this->request->data['UserEmail']['email_type'];
							$history_data['year'] = 			$this->request->data['UserEmail']['sender_name'];
							$history_data['make'] = 			$this->request->data['UserEmail']['receiver_name'];
							$history_data['model'] = 			$this->request->data['UserEmail']['email_from'];
							//$history_data['type'] = 			$this->request->data['UserEmail']['email_replyto'];
							$history_data['deal_id'] = 			$this->request->data['UserEmail']['sender_id'];
							$history_data['status'] = 				"to Customer";
							$history_data['comment'] = 			$this->request->data['UserEmail']['message'];
							$history_data['start_date'] = 			$this->request->data['UserEmail']['received_date'];
							$history_data['h_type'] = 				"Email";
							$history_data['sales_step'] = 				"Email";
							$history_data['sperson'] = 				$this->request->data['UserEmail']['sender_name'];
							$history_data['modified'] = 			date('D - M d, Y g:i A');
							$history_data['created'] =  date('Y-m-d H:i:s');


							$history = array(
								'History' => $history_data
							);
							$this->History->save($history);

							//Save Email Log
							if($type == 'contact'){
								$this->LoadModel('UserEmailLog');
								$this->UserEmailLog->create();
								$this->UserEmailLog->save(array('UserEmailLog'=>array(
									'contact_id' => $contact_info['Contact']['id'],
									'user_id' => $current_user['id'],
									'send_date' => $received_date,
									'history_id' => $this->History->id,
									'timezone' => $timezone,
									'ref_number' => $log_ref_number,
								)));
							}

							$this->loadModel("Draft");
							$this->Draft->clear_druft_email( $this->Auth->user('id'), $contact_info['Contact']['id']);


							// CLEAR CACHE ON EDIT LEAD
							$this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));
							$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['UserEmail']['receiver_id']);

							$this->redirect(array('controller' => 'user_emails', 'action' => 'inbox'));
						}

				} catch (Exception $e) {
					$this->Session->setFlash(__("Message Couldn't sent please check your SMTP settings"), 'alert');
					$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
				}







            }else{


            	$this->LoadModel("Draft");
   				$draft_exists = $this->Draft->find('first', array('conditions' => array(
   					'Draft.user_id'=> $this->Auth->user('id') , 'Draft.contact_id' => $contact_info['Contact']['id']
   				) ));
   				//debug($draft_exists);
   				if(empty($draft_exists)){

				 	$this->request->data['UserEmail']['message'] = "<br><br>".nl2br($setting['Setting']['signature']);
					if(!empty($setting['Setting']['image']))
					{
						$imgpath=WWW_ROOT.'files'.DS.'setting'.DS.'image'.DS.$setting['Setting']['id'].DS.''.$setting['Setting']['image'];

						if(file_exists($imgpath)){
							/*$imageData = base64_encode(file_get_contents($imgpath));
							$src = 'data: '.$this->_getFileMimeType($imgpath).';base64,'.$imageData;*/
							$src=FULL_BASE_URL.'/app/webroot/files/'.'setting'.'/image/'.$setting['Setting']['id'].'/'.$setting['Setting']['image'];
							$this->request->data['UserEmail']['message'].='<br/><img src="'.$src.'" style="width:100px;height:120px;" />';
						}
					}
				}else{

					$this->request->data['UserEmail']['message'] = $draft_exists['Draft']['message_body'];
					$this->request->data['UserEmail']['subject'] = $draft_exists['Draft']['subject'];

				}



				$this->request->data['UserEmail']['email_from'] = $smtp_settings['emailaddress'];


				if(isset($this->request->query['reply'])){
					$this->request->data['UserEmail']['parent_mail_id'] = $this->request->query['reply'];
					$parent_email_subject = $this->UserEmail->find('first',array('conditions'=>array('UserEmail.id'=> $this->request->query['reply'] )));
					$this->request->data['UserEmail']['subject'] = "RE: ".$parent_email_subject['UserEmail']['subject'];

				}

			}



	}

	public function reply($id = null) {
			$this->layout='default_new';
			$userlists = $this->User->find('list');
			$this->set('userlists',$userlists);


			$setting = $this->Setting->find('first');
			$this->set('setting',$setting);

			$this->set('id',$id);
			$data = array();
			if(!empty($this->data))
			{

					$user_id = $this->data['UserEmail']['user_id'];
					$userinfo = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));


					$data['UserEmail']['user_id'] = $this->data['UserEmail']['user_id'];

					$data['UserEmail']['email_replyto'] = $userinfo['User']['email'];

					$data['UserEmail']['sender_name'] = 'Rajinder Singh';

					$data['UserEmail']['receiver_name'] = $userinfo['User']['first_name'].' '.$userinfo['User']['last_name'];

                    $data['UserEmail']['cc'] = $this->data['UserEmail']['cc'];
                    $data['UserEmail']['bcc'] = $this->data['UserEmail']['bcc'];

                    $data['UserEmail']['subject'] = $this->data['UserEmail']['subject'];
                    $data['UserEmail']['email_from'] = $this->data['UserEmail']['email_from'];

					$data['UserEmail']['id'] = $id;

					$data['UserEmail']['email_label_id'] = 1;

                    $data['UserEmail']['message'] = $this->data['UserEmail']['message'];

					//$this->UserEmail->create();


					//pr($data);
					//die;
                    $this->UserEmail->save($data);

					$this->redirect(array('controller' => 'user_emails', 'action' => 'inbox'));
             }
			 else{

				$data =  $this->UserEmail->findById($id);

			 }

			//pr($data);
			$this->set('data',$data);
	}
	public function get_setting($type=null){
		$current_user_id = $this->Auth->User('id');
		$this->loadModel('EmailSetting');
		$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));

		//$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);

		if($type == 'imap'){
			$imap_settings = array();
			if( $current_settings['EmailSetting']['imap_server'] != '' && $current_settings['EmailSetting']['smtp_username'] != '' &&  $current_settings['EmailSetting']['smtp_pwd']  ){

				if($current_settings['EmailSetting']['server_type'] == 'Exchange Server'){

					$imap_settings['host'] = $current_settings['EmailSetting']['imap_server'];
					$imap_settings['transport'] = 'Ews';
					$imap_settings['username'] = $current_settings['EmailSetting']['smtp_username'];
					$imap_settings['password'] = $current_settings['EmailSetting']['smtp_pwd'];

					if($current_settings['EmailSetting']['ews_version']){
						$imap_settings['version'] = $current_settings['EmailSetting']['ews_version'];
					}

					$imap_settings['server_type'] = $current_settings['EmailSetting']['server_type'];

				}else{

					$mailbox = $current_settings['EmailSetting']['imap_server'];
					//{imap.mail.yahoo.com:993/imap/ssl}INBOX

					if($current_settings['EmailSetting']['imap_port'] != ''){
						$mailbox  .= ":".$current_settings['EmailSetting']['imap_port'];
					}
					$mailbox .= "/imap";
					if($current_settings['EmailSetting']['imap_ssl_tls'] != ''){
						$mailbox .= "/".$current_settings['EmailSetting']['imap_ssl_tls'];
					}
					$mailbox = "{".$mailbox."}INBOX";
					$imap_settings['mailbox'] = $mailbox;
					$imap_settings['username'] = $current_settings['EmailSetting']['smtp_username'];
					$imap_settings['password'] = $current_settings['EmailSetting']['smtp_pwd'];
					if($current_settings['EmailSetting']['imap_gssapi'] !=''){
						$imap_settings['imap_gssapi'] = $current_settings['EmailSetting']['imap_gssapi'];
					}

					$imap_settings['server_type'] = $current_settings['EmailSetting']['server_type'];

				}





			}
			return $imap_settings;
		}

		if($type == 'smtp'){
			$smtp_settings = array();
			if($current_settings['EmailSetting']['ext1'] != 'Off' && $current_settings['EmailSetting']['smtp_host'] != '' && $current_settings['EmailSetting']['smtp_username'] != ''  && $current_settings['EmailSetting']['emailaddress'] != ''){

				if($current_settings['EmailSetting']['server_type'] == 'Exchange Server'){

					$smtp_settings['smtp']['host'] = $current_settings['EmailSetting']['imap_server'];
					$smtp_settings['smtp']['transport'] = 'Ews';
					$smtp_settings['smtp']['username'] = $current_settings['EmailSetting']['smtp_username'];
					$smtp_settings['smtp']['password'] = $current_settings['EmailSetting']['smtp_pwd'];

					if($current_settings['EmailSetting']['ews_version']){
						$smtp_settings['smtp']['version'] = $current_settings['EmailSetting']['ews_version'];
					}
					$smtp_settings['emailaddress'] = $current_settings['EmailSetting']['emailaddress'];

				}else{
					//Imap Server
					if($current_settings['EmailSetting']['smtp_ssl_tls'] != ''){
						$smtp_settings['smtp']['host'] = $current_settings['EmailSetting']['smtp_ssl_tls']."://".$current_settings['EmailSetting']['smtp_host'];
					}else{
						$smtp_settings['smtp']['host'] = $current_settings['EmailSetting']['smtp_host'];
					}

					if($current_settings['EmailSetting']['smtp_port'] != ''){
						$smtp_settings['smtp']['port'] = $current_settings['EmailSetting']['smtp_port'];
					}else{
						$smtp_settings['smtp']['port'] = 25;
					}

					$smtp_settings['smtp']['username'] = $current_settings['EmailSetting']['smtp_username'];
					$smtp_settings['smtp']['password'] = $current_settings['EmailSetting']['smtp_pwd'];
					$smtp_settings['smtp']['timeout'] = '30';
					if($current_settings['EmailSetting']['smtp_tls'] == '1'){
						$smtp_settings['smtp']['tls'] = true;
					}
					$smtp_settings['smtp']['transport'] = 'Smtp';
					$smtp_settings['emailaddress'] = $current_settings['EmailSetting']['emailaddress'];
				}

			}
			return $smtp_settings;
		}


	}

	public function settings_status($on_off){

		$this->loadModel('EmailSetting');
		$current_user_id = $this->Auth->User('id');
		$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
		if(empty($current_settings)){
			$this->EmailSetting->create();
		}else{
			$this->request->data['EmailSetting']['id'] = $current_settings['EmailSetting']['id'];
		}
		$this->request->data['EmailSetting']['user_id'] = $current_user_id;
		$this->request->data['EmailSetting']['ext1'] = $on_off;

		debug($this->request->data);

		if($this->EmailSetting->save($this->request->data)){
			$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
		}


	}


	public function smtp_settings() {
		$current_user_id = $this->Auth->User('id');

		if ($this->request->is('post')) {

			$this->loadModel('EmailSetting');
			$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
			if(!empty($current_settings)){

				$this->request->data['EmailSetting']['id'] = $current_settings['EmailSetting']['id'];
				$this->request->data['EmailSetting']['user_id'] = $current_user_id;
				//debug($this->request->data);
				$this->EmailSetting->save($this->request->data);

			}else{
				$this->request->data['EmailSetting']['user_id'] = $current_user_id;
				$this->EmailSetting->create();
				$this->EmailSetting->save($this->request->data);
			}

		}

		 $cache_key_current_settings = $current_user_id."_"."email_setting";
		 Cache::delete($cache_key_current_settings, $this->Memcache_config);



		$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
	}

	// public function imap_settings() {
	// 	$current_user_id = $this->Auth->User('id');

	// 	$this->loadModel('EmailSetting');
	// 	$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
	// 	if(!empty($current_settings)){

	// 		$this->request->data['EmailSetting']['id'] = $current_settings['EmailSetting']['id'];
	// 		$this->request->data['EmailSetting']['user_id'] = $current_user_id;
	// 		debug($this->request->data);
	// 		$this->EmailSetting->save($this->request->data);

	// 	}else{
	// 		$this->request->data['EmailSetting']['user_id'] = $current_user_id;
	// 		$this->EmailSetting->create();
	// 		$this->EmailSetting->save($this->request->data);
	// 	}
	// 	$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
	// }

	public function setting() {

		//$smtp_settings = $this->get_setting('smtp');
		//debug($smtp_settings );

		//$imap_settings = $this->get_setting('imap');
		//debug($imap_settings );



		$this->layout='default_new';
		$current_user_id = $this->Auth->User('id');
		$this->set('current_user_id',$current_user_id);

		$current_settings = $this->Setting->find('first', array('conditions'=>array('Setting.user_id'=>$current_user_id)));
		//debug( $current_settings );
		if(!empty($this->data))	{
			if(empty($current_settings)){
				$this->Setting->create();
			}else{
				$this->request->data['Setting']['id'] = $current_settings['Setting']['id'];
			}
			$this->request->data['Setting']['user_id'] = $current_user_id;
			if(isset($this->request->data['Setting']['delete_img'])&& $this->request->data['Setting']['delete_img']=='on')
			{
				@unlink(APP.DS.'webroot'.DS.'files'.DS.'setting'.DS.'image'.DS.$this->request->data['Setting']['id'].DS.$current_settings['Setting']['image']);
				#@unlink(APP.DS.'webroot'.DS.'files'.DS.'setting'.DS.'image'.DS.$this->request->data['Setting']['id'].DS.'view_'.$current_settings['Setting']['image']);
				#@unlink(APP.DS.'webroot'.DS.'files'.DS.'setting'.DS.'image'.DS.$this->request->data['Setting']['id'].DS.'thumb_'.$current_settings['Setting']['image']);
				$this->request->data['Setting']['image']='';
			}
			if($this->Setting->save($this->request->data)){

				$this->requestAction("manage_cache/clear_bdc_cache/".$current_user_id."_email_setting");
				$this->Session->setFlash(__('Setting saved'), 'alert');
				$this->redirect(array('controller' => 'user_emails', 'action' => 'setting'));
			}
		 }
		 else{
			$this->request->data = $current_settings;
		 }

		$this->loadModel('EmailSetting');
		$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
		$this->request->data['EmailSetting'] = $current_settings['EmailSetting'];

		$this->loadModel('ImapServer');
		$this->loadModel('SmtpServer');

		$imaps = $this->ImapServer->find('list', array('fields'=>array('ImapServer.url','ImapServer.name')));
		$smtps = $this->SmtpServer->find('list', array('fields'=>array('SmtpServer.url','SmtpServer.name')));
		$this->set(compact('imaps','smtps'));





	}

	public function _getFileMimeType($filePath) {
		if (class_exists('finfo')) {
			$finfo = new finfo(defined('FILEINFO_MIME_TYPE') ? FILEINFO_MIME_TYPE : FILEINFO_MIME);
			return $finfo->file($filePath);
		}

		if (function_exists('exif_imagetype') && function_exists('image_type_to_mime_type')) {
			$mimetype = image_type_to_mime_type(exif_imagetype($filePath));
			if ($mimetype !== false) {
				return $mimetype;
			}
		}

		if (function_exists('mime_content_type')) {
			return mime_content_type($filePath);
		}

		return 'application/octet-stream';
	}

	public function parse_emails(){
		//require_once('MimeMailParser.class.php');

		App::import('Vendor', 'MimeMailParserClass', array('file' => 'MimeMailParser.class.php'));
		$path = '/home/emails/Maildir/new';
		$files = scandir($path);


		foreach($files as $file){
			if($file == '.' || $file == '..')
				continue;
			//$file=end($files);
			//debug($file);

			$file_path=$path.'/'.$file;
			$perms=fileperms ($file_path);


			$Parser = new MimeMailParser();
			$Parser->setPath($file_path);
			//$header=$Parser->getHeadersRaw();
			$header=$Parser->getHeaders();
			$to = $Parser->getHeader('to');
			$from = $Parser->getHeader('from');
			$subject = $Parser->getHeader('subject');
			$text = $Parser->getMessageBody('text');
			$html = $Parser->getMessageBody('html');


			if(strpos($to, "yourlocaldealership.com") !== false){

				//debug( $from );

				$to_part=explode('@',$to);
				$id_part=explode('_',$to_part[0]);
				$sender_part=explode('.',$id_part[0]);

				//debug($sender_part);
				//debug($id_part);

				$receiver_id=$id_part[1];
				$dealer_id=$id_part[2];
				$model=($sender_part[0]=='C')?'Contact':'User';

				//contact info
				$sender_info = $this->Contact->findById($sender_part[1]);
				//debug($sender_info);
				//user info
				$reciever_info=$this->User->findById($receiver_id);
				//debug($reciever_info);


				$emailData['UserEmail']['sender_id']=$sender_info['Contact']['id'];
				$emailData['UserEmail']['sender_name']=$sender_info['Contact']['full_name'];
				$emailData['UserEmail']['email_from']=$sender_info['Contact']['email'];
				$emailData['UserEmail']['email_type']=strtolower('Contact');
				$emailData['UserEmail']['receiver_id']=$reciever_info['User']['id'];
				$emailData['UserEmail']['receiver_name']=$reciever_info['User']['full_name'];
				$emailData['UserEmail']['email_replyto']=$reciever_info['User']['email'];
				$emailData['UserEmail']['subject']=$subject;
				$emailData['UserEmail']['message']=$text . "<br /><br />".$reciever_info['User']['email'];

				$timezone = $reciever_info['User']['zone'];
				date_default_timezone_set($timezone);
				$received_date = date('Y-m-d H:i:s');
				$emailData['UserEmail']['received_date']=$received_date;


				//copy of the email to sales person

				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->config('sendgrid');
				$email->viewVars(array('email_content'=>$emailData['UserEmail']['message']));
				$email->template('internal_message')
					->emailFormat('html')
					->subject($subject)
					->from($sender_info['Contact']['email'])
					->to($reciever_info['User']['email'])
					->replyTo(array($sender_info['Contact']['email']=> $sender_info['Contact']['full_name']))
					->send();

				$this->UserEmail->create();
				if( $this->UserEmail->save($emailData) ){
					//Move file
					rename($file_path, "/home/emails/Maildir/cur/".$file);
				}

			}


		}

	}



	function getBody($uid, $imap) {
	    $body = $this->get_part($imap, $uid, "TEXT/HTML");
    	// if HTML body is empty, try getting text body
    	if ($body == "") {
        	$body = $this->get_part($imap, $uid, "TEXT/PLAIN");
   		}
    	return $body;
	}


	function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
		if (!$structure) {
			   $structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if ($structure) {
			if ($mimetype == $this->get_mime_type($structure)) {
				if (!$partNumber) {
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3: return imap_base64($text);
					case 4: return imap_qprint($text);
					default: return $text;
			   }
		   }

			// multipart
			if ($structure->type == 1) {
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = "";
					if ($partNumber) {
						$prefix = $partNumber . ".";
					}
					$data = $this->get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
					if ($data) {
						return $data;
					}
				}
			}
		}
		return false;
	}


	function get_mime_type($structure) {
		$primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

		if ($structure->subtype) {
			  return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
		}
		return "TEXT/PLAIN";
	}

	function SendWelcomeEmail($contact_id){
		$current_user = $this->Auth->User();
		//Smtp setting for sending emails
		$smtp_settings = $this->get_setting('smtp');

		if(empty($smtp_settings)){
			return 'Smtp Settins Not found';
		}

		$data_user_email['sender_name'] = $current_user['full_name'];
		$data_user_email['sender_id'] = $current_user['id'];
		$data_user_email['email_replyto'] = $smtp_settings['emailaddress'];
		$data_user_email['received_date'] = $received_date;

		$dealer_id = $this->Auth->user('dealer_id');
		$dealer_name = $this->Auth->user('dealer');
		$this->loadModel("AutoresponderRule");
		$this->loadModel("Contact");
		$this->loadModel("Autoresponder");
		//Configure::write('Model.globalSource', 'default_main');
		//$this->AutoresponderRule->useDbConfig = $this->Autoresponder->useDbConfig = $this->Contact->useDbConfig = 'default_main';
		$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>array('AutoresponderRule.rule_type'=>"Welcome",'active'=>1,'dealer_id'=>$dealer_id)));
		$template_id = $autoresponders['AutoresponderRule']['template_id'];
		App::import("Model","Template");
		$this->Template = new Template();
		if($template_id>0){
			$this->Contact->recursive = -1;
			$conditions = array();
			$conditions['company_id'] = $dealer_id;
			$conditions['id'] = $contact_id;
			$recipients_data = $this->Contact->find('first',array('conditions'=>$conditions));
			$autoresponder_id =  $autoresponders['AutoresponderRule']['id'];
			$dealer_id = $autoresponders['AutoresponderRule']['dealer_id'];
			if(count($recipients_data)>0  && is_array($recipients_data)){
				$replace_with = array($recipients_data['Contact']['user_name'],
					$recipients_data['Contact']['first_name'],
					$recipients_data['Contact']['last_name'],
					$recipients_data['Contact']['full_name'],
					$recipients_data['Contact']['email'],
					$recipients_data['Contact']['type'],
					$recipients_data['Contact']['condition'],
					$recipients_data['Contact']['year'],
					$recipients_data['Contact']['make'],
					$recipients_data['Contact']['model'],
					$recipients_data['Contact']['modified_full_date'],
					$recipients_data['Contact']['modified'],
					$recipients_data['Contact']['mobile'],
					$recipients_data['Contact']['address'],
					$recipients_data['Contact']['city'],
					$recipients_data['Contact']['state'],
					$recipients_data['Contact']['zip'],
					$dealer_name
				);
				App::import('Component', 'Utility');
				$Utility = new UtilityComponent(new ComponentCollection());
				$templatesSrc = $this->Template->find('first',  array('conditions' => array('Template.template_id' => $template_id)));
				//echo $templatesSrc['Template']['template_html'];
				$current_user = $this->Auth->User();
				$EmailContents = $Utility->ReplaceTemplateCustomTags($recipients_data['Contact'],$current_user,$templatesSrc['Template']['template_html']);
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->reset();
				$email->config('sender');
				$email->viewVars(array('EmailContents'=>$EmailContents));
				if(trim($autoresponders['AutoresponderRule']['email_mode'])=='Email'){
					$email->template('send_welcome_email')
					->emailFormat('html')
					->subject($templatesSrc['Template']['template_title'])
					->from(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
					->to($recipients_data['Contact']['email'])
					->replyTo(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
					->send();
				}elseif(trim($autoresponders['AutoresponderRule']['email_mode'])=='SendgridAPI'){
					$SendgridCred = $Utility->GetSendgridDetails($dealer_id);
					$CategoryName 		= "Autoresponder^^".$autoresponders['AutoresponderRule']['id']."^^".$recipients_data['Contact']['id']."^^NewLead";
					$NewCategoryData = array('CategoryName'=>$CategoryName);
					$ResponseCreateCategory = $this->Autoresponder->create_category($NewCategoryData,$SendgridCred);
					$xsmtpapi = array(
							'to' => array(
								$recipients_data['Contact']['email'], $recipients_data['Contact']['email']
							  ),
							  'category' => $CategoryName
							);
					$Utility->SendEmailSendgridAPI($dealer_id,$smtp_settings['emailaddress'],$xsmtpapi,$recipients_data['Contact']['email'],$templatesSrc['Template']['template_title'],$EmailContents);
				}
			}
		}


		return true;
	}

	function SendUpdateEmail(){
		$current_user = $this->Auth->User();
        //Smtp setting for sending emails
        $smtp_settings = $this->get_setting('smtp');

        if(empty($smtp_settings)){
            return 'Smtp Settins Not found';
        }

        $data_user_email['sender_name'] = $current_user['full_name'];
        $data_user_email['sender_id'] = $current_user['id'];
        $data_user_email['email_replyto'] = $smtp_settings['emailaddress'];
        $data_user_email['received_date'] = $received_date;

        $dealer_id = $this->Auth->user('dealer_id');
        $dealer_name = $this->Auth->user('dealer');
		$this->loadModel("AutoresponderRule");
        $this->loadModel("Contact");
        $this->loadModel("Autoresponder");
		$this->Contact->recursive = -1;
		$contact_id = $this->request->data['contact_id'];
		$OldDetails = $this->request->data['old_contact_data']['Contact'];
		//echo "<pre>";
		//print_r($OldDetails);
		$NewDetails = $trigger_update_contacts = $this->request->data['form_data']['Contact'];
		//print_r($NewDetails);
		if((trim($OldDetails['contact_status_id'])!=trim($NewDetails['contact_status_id']) && isset($NewDetails['contact_status_id'])) ||
		(trim($OldDetails['lead_status'])!=trim($NewDetails['lead_status']) && isset($NewDetails['lead_status'])) ||
		(trim($OldDetails['sales_step'])!=trim($NewDetails['sales_step']) && isset($NewDetails['sales_step'])) ||
		(trim($OldDetails['status'])!=trim($NewDetails['status']) && isset($NewDetails['status'])) ||
		(trim($OldDetails['source'])!=trim($NewDetails['source']) && isset($NewDetails['source'])))
		{

			if($trigger_update_contacts['contact_status_id']>0){
				$AutoresponderRulesData['search_contact_status_id'] =  $trigger_update_contacts['contact_status_id'];
			}

			if($trigger_update_contacts['lead_status']!=''){
				$AutoresponderRulesData['search_lead_status'] =  $trigger_update_contacts['lead_status'];
			}

			if($trigger_update_contacts['sales_step']!=''){
				$AutoresponderRulesData['search_sales_step'] =  $trigger_update_contacts['sales_step'];
			}

			if($trigger_update_contacts['source']!=''){
				$AutoresponderRulesData['search_source'] =  $trigger_update_contacts['source'];
			}

			if($trigger_update_contacts['status']!=''){
				$AutoresponderRulesData['search_status'] =  $trigger_update_contacts['status'];
			}

			$AutoresponderRulesData['dealer_id'] = $dealer_id;
			$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>$AutoresponderRulesData));
			/* If status is SOLD and Rule Set other is defined then trigger email */
			if(trim($trigger_update_contacts['sales_step'])==10 || trim($trigger_update_contacts['sales_step'])=='Sold' || trim($trigger_update_contacts['sales_step'])=='Sold/Rolled'){
				$AutoresponderRulesData = array();
				$AutoresponderRulesData['dealer_id'] = $dealer_id;
				$AutoresponderRulesData['rule_type'] = 'Purchase';
				$AutoresponderRulesData['duration_category'] = 'Immediately';
				$AutoresponderRulesData['active'] = 1;
				$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>$AutoresponderRulesData));
			}

			// print_r($autoresponders);



			$template_id = $autoresponders['AutoresponderRule']['template_id'];
			App::import("Model","Template");
			$this->Template = new Template();
			if($template_id>0){
				$conditions = array();
				$conditions['company_id'] = $dealer_id;
				$conditions['id'] = $contact_id;
				$recipients_data = $this->Contact->find('first',array('conditions'=>$conditions));
				//print_r($recipients_data);
				$autoresponder_id =  $autoresponders['AutoresponderRule']['id'];
				$dealer_id = $autoresponders['AutoresponderRule']['dealer_id'];
				if(count($recipients_data)>0  && is_array($recipients_data) && $recipients_data['Contact']['email']!=''){
					App::import('Component', 'Utility');
					$Utility = new UtilityComponent(new ComponentCollection());
					$templatesSrc = $this->Template->find('first',  array('conditions' => array('Template.template_id' => $template_id)));
					//echo $templatesSrc['Template']['template_html'];
					$current_user = $this->Auth->User();
					$EmailContents = $Utility->ReplaceTemplateCustomTags($recipients_data['Contact'],$current_user,$templatesSrc['Template']['template_html']);
					//$EmailContents = str_replace($search_for,$replace_with,$templatesSrc['Template']['template_html']);

					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->reset();
					$email->config('sender');
					$email->viewVars(array('EmailContents'=>$EmailContents));

					if(trim($autoresponders['AutoresponderRule']['email_mode'])=='Email'){

						$email->template('send_welcome_email')
							->emailFormat('html')
							->subject($templatesSrc['Template']['template_title'])
							->from(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
							->to($recipients_data['Contact']['email'])
							->replyTo(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
							->send();
					}elseif(trim($autoresponders['AutoresponderRule']['email_mode'])=='SendgridAPI'){
						$SendgridCred = $Utility->GetSendgridDetails($dealer_id);
						$CategoryName 		= "Autoresponder^^".$autoresponders['AutoresponderRule']['id']."^^".$recipients_data['Contact']['id']."^^UpdateLead"."^^".time();
						$NewCategoryData = array('CategoryName'=>$CategoryName);
						$ResponseCreateCategory = $this->Autoresponder->create_category($NewCategoryData,$SendgridCred);
						$xsmtpapi = array(
								'to' => array(
									$recipients_data['Contact']['email'], $recipients_data['Contact']['email']
								  ),
								  'category' => $CategoryName
								);
						$Utility->SendEmailSendgridAPI($dealer_id,$smtp_settings['emailaddress'],$xsmtpapi,$recipients_data['Contact']['email'],$templatesSrc['Template']['template_title'],$EmailContents);
					}
				}
			}
			return true;
		}else{
			return false;
		}
    }


    function get_filename($fname){
		$name1 = substr($fname, strpos($fname, "_")+1   );
		$filename = substr($name1, strpos($name1, "_")+1   );
		return $filename;
	}

    private function get_attachment_data($filename){

		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dp360-attachments";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		));
		return $result['Body'];
    }

    public function send_test_attachment(){
    	$filename_key  = "55c378ab75a7c_55c378ab75a8a_Screen Shot 2015-07-29 at 10.32.07 PM.png";
		$data_attachment = $this->get_attachment_data($filename_key);

		$filename = $this->get_filename($filename_key);

    	$smtp_settings = $this->get_setting('smtp');

		$email = new CakeEmail();
		$email->config($smtp_settings['smtp']);
		$email->viewVars(array('email_content'=>"Test message with attachment"));
		$email->template('internal_message')
			->emailFormat('html')
			->subject("Test message with s3 attachment")
			->from("russel@dp360crm.com")
			->to("russel@dp360crm.com")
			->attachments(array($filename => array('data' => $data_attachment )))
			->send();

    }


    public function update_existing_signature(){

		$all = $this->Setting->find('all');
		foreach($all as $sett){

			echo "<div>";
			echo $sett['Setting']['signature'];
			echo " <br><br>";
			echo nl2br($sett['Setting']['signature']);
			echo " <br><br><br> </div>";


			// $this->Setting->save(array('Setting'=>array(
			// 	'id' => $sett['Setting']['id'],
			// 	'signature' => nl2br($sett['Setting']['signature'])
			// )));

		}

		$this->autoRender = false;

    }


    public function send_ics_email($update_note = null){
		$current_user = $this->Auth->User();
		$dealer_id = $this->Auth->User('dealer_id');
		$timezone = $current_user['zone'];
		date_default_timezone_set($timezone);
		$received_date = date('Y-m-d H:i:s');

		//Smtp setting for sending emails
		$smtp_settings = $this->get_setting('smtp');

		if(empty($smtp_settings)){
			return 'Smtp Settins Not found';
		}

		$contact_id = $this->request->params['contact_id'];
		$subject = $this->request->params['subject'];
		$mailbody = $this->request->params['mailbody'];


		//$reply = 'C.'.$contact_id;
		$this->Contact->bindModel(array(
			'belongsTo'=>array('User'),
		));
		$userTemplateData = $this->Contact->find('first', array('recursive'=>1, 'conditions'=>array('Contact.id'=>$contact_id)));

		//Insert template variables
		$templateValuedHtml = $mailbody;
		foreach($userTemplateData['Contact'] as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}

		//Insert dealer variable
		$dealer_inputs = array(
			'sperson_first' => $userTemplateData['User']['first_name'],
			'dealer_name' => $current_user['dealer'],
			'dealer_email' => $current_user['d_email'],
			'dealer_phone' => $current_user['d_phone'],
			'dealer_fax' => $current_user['d_fax'],
			'dealer_address' => $current_user['d_address'],
			'dealer_city' => $current_user['d_city'],
			'dealer_state' => $current_user['d_state'],
			'dealer_zip' => $current_user['d_zip'],
			'dealer_website' => $current_user['d_website'],
		);
		foreach($dealer_inputs as $key => $value) {
			$templateValuedHtml =  str_replace('{'.$key.'}', $value, $templateValuedHtml);
		}
		$templateValuedHtml =  str_replace('{today}', date('m/d/Y g:i A'), $templateValuedHtml);

		$data_user_email['message'] = $templateValuedHtml;

		$data_user_email['email_type'] = 'contact';
		$data_user_email['receiver_id'] = $contact_id;
		$data_user_email['receiver_name'] = $userTemplateData['Contact']['full_name'];

		if( $setting['Setting']['email_from'] != ''){
			$data_user_email['email_from'] = $setting['Setting']['email_from'];
		}else{
			$data_user_email['email_from'] = $current_user['email'];
		}

		$data_user_email['subject'] = $subject;

		//$replyTo=$reply.'_'.$this->Auth->user('id').'_'.$this->Auth->user('dealer_id').'@yourlocaldealership.com';

		$data_user_email['sender_name'] = $current_user['full_name'];
		$data_user_email['sender_id'] = $current_user['id'];
		$data_user_email['email_replyto'] = $smtp_settings['emailaddress'];
		$data_user_email['received_date'] = $received_date;

		$customer_note = "";
		$data_user_email['message'] .= $customer_note;

		$receiver_email = 	$userTemplateData['Contact']['email'];

		$data_user_email['receiver_email'] = $userTemplateData['Contact']['email'];

		//debug($receiver_email);

		$unsubscribe_link = "";
		$this->loadModel('DealerSetting');
		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $dealer_id);

		if($casl_feature == 'On'){
			App::uses('CakeText', 'Utility');
			$log_ref_number = CakeText::uuid();

			App::uses('CakeEmail', 'Network/Email');
			$key = 'ioOJ987hKhyiu687iHkKHKhkHkHKjhIU';
			$contact_id_enc = base64_encode(Security::rijndael($contact_id, $key, 'encrypt'));
			$unsubscribe_link = "<br><br><p>If you'd like to unsubscribe and stop receiving these emails <a href='https://app.dealershipperformancecrm.com/unsubscribes/cnt/?ld=".urlencode($contact_id_enc)."'>click here</a> .</p>";
		}

		App::uses('CakeText', 'Utility');
		$log_ref_number = CakeText::uuid();

		$data_user_email['message'] = $data_user_email['message'].$unsubscribe_link.'<img src="https://app.dealershipperformancecrm.com/imgs/index/'.$log_ref_number.'/mail.png" width="1" height="1" title="" alt=""> ';

		/* To send a copy of same email to dealer*/

		$receiver_emails = array($receiver_email,$current_user['email']);

		try{

			//Process attachments

			$email = new CakeEmail();
			$email->config($smtp_settings['smtp']);
			$email->viewVars(array('email_content'=>$data_user_email['message']));

			// Attach ics file
			if(isset($this->request->params['ics_attachment_files'])){
				$email->attachments($this->request->params['ics_attachment_files']);
			}

			$email->template('internal_message')
				->emailFormat('html')
				->subject($data_user_email['subject'])
				->from(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
				->to($receiver_emails)
				->replyTo(array($smtp_settings['emailaddress'] => $data_user_email['sender_name']))
				->send();

			//Save user email
			$this->UserEmail->create();
			if( $this->UserEmail->save( array('UserEmail'=>$data_user_email ) ) ){

				//Save History
				$h_data = array();
				$h_data['contact_id'] 	= 		$data_user_email['receiver_id'];
				$h_data['cond'] 		= 		$data_user_email['email_type'];
				$h_data['deal_id'] 		= 		$data_user_email['sender_id'];
				$h_data['status'] 		= 		"Sent";
				$h_data['comment'] 		= 		$data_user_email['message'];
				$h_data['start_date'] 	= 		$data_user_email['received_date'];
				$h_data['h_type'] 		= 		"Email";
				$h_data['sales_step'] 	= 		"Email";
				$h_data['sperson'] 		= 		$data_user_email['sender_name'];
				$h_data['modified'] 	= 		date('D - M d, Y g:i A');
				$h_data['created'] 		=  		date('Y-m-d H:i:s');

				$htr = array(
					'History' => $h_data
				);
				$this->History->create();
				$this->History->save($htr);

				//Save Calendar Invitation History
				$h_data = array();
				$h_data['contact_id'] 	= 		$data_user_email['receiver_id'];
				$h_data['cond'] 		= 		'Calendar Invitation Sent';
				$h_data['deal_id'] 		= 		$data_user_email['sender_id'];
				$h_data['status'] 		= 		"Sent";
				$h_data['start_date'] 	= 		$data_user_email['received_date'];
				$h_data['h_type'] 		= 		"Calendar";
				$h_data['sperson'] 		= 		$data_user_email['sender_name'];
				$h_data['modified'] 	= 		date('D - M d, Y g:i A');
				$h_data['created'] 		=  		date('Y-m-d H:i:s');

				$htr = array(
					'History' => $h_data
				);
				$this->History->create();
				$this->History->save($htr);

				//Save Email Log
				$this->LoadModel('UserEmailLog');
				$this->UserEmailLog->create();
				$this->UserEmailLog->save(array('UserEmailLog'=>array(
					'contact_id' => $contact_id,
					'user_id' => $current_user['id'],
					'send_date' => $received_date,
					'history_id' => $this->History->id,
					'timezone' => $timezone,
					'ref_number' => $log_ref_number,

				)));

				return "Email sent";
			}

		}catch (Exception $e) {

			$emailData_failed['UserEmail']['sender_id'] =      $data_user_email['sender_id'];
	        $emailData_failed['UserEmail']['sender_name'] =    "Support";

	        $emailData_failed['UserEmail']['email_from'] =     "support@dp360crm.com";
	        $emailData_failed['UserEmail']['email_type'] =     "failed";

	        $emailData_failed['UserEmail']['receiver_id'] =    $data_user_email['sender_id'];
	        $emailData_failed['UserEmail']['receiver_name'] =  $data_user_email['sender_name'];

	        $emailData_failed['UserEmail']['email_replyto'] =  $data_user_email['email_replyto'];
	        $emailData_failed['UserEmail']['subject'] =        "Email Delivery failed - ".$subject;
	        $emailData_failed['UserEmail']['message'] =        "Receiver Name: {$data_user_email['receiver_name']}  #{$data_user_email['receiver_id']} <br>".$data_user_email['message'];
	        $emailData_failed['UserEmail']['received_date'] =  $data_user_email['received_date'];
	        $emailData_failed['UserEmail']['messageid'] =  $messageid;

	        $emailData_failed['UserEmail']['receiver_email'] = $data_user_email['receiver_email'];
	        $emailData_failed['UserEmail']['message_text'] = strip_tags( $data_user_email['message'] );
	        $this->UserEmail->create();
	        $this->UserEmail->save($emailData_failed);

			CakeLog::write('email_send_log_'.$current_user['id'], $e->getMessage());

			return "Email could not be sent, Please check your settings!";
		}

		return "Email sent";

	}

}
