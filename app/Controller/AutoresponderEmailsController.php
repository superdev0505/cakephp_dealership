<?php

class AutoresponderEmailsController extends AppController {

	public $uses = array('Contact');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {

	}

	private function _template_fields($EmailTemplate){
		preg_match_all('/\{([A-Za-z0-9  _]+?)\}/', $EmailTemplate, $aMatches);
		//debug($aMatches[1]);
		return $aMatches[1];
	}

	private function _GetEmailTemplate($templateId){
		$this->loadModel("Template");
		$templatesSrc = $this->Template->find('first',  array('conditions' => array('Template.template_id' => $templateId)));
		return $templatesSrc;
	}

	public function test_credentails(){
		$dealer_id = $this->Auth->user('dealer_id');
		debug($dealer_id);
		$SendgridCred = $this->_GetSendgridDetails($dealer_id);
		debug($SendgridCred);
	}

	private function _GetSendgridDetails($DealerId){
		$this->loadModel('SendgridSubuser');
		$details = $this->SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$DealerId)));
		if(trim($details['SendgridSubuser']['username'])!=''){
			return array('user'=>$details['SendgridSubuser']['username'],'pass'=>$details['SendgridSubuser']['password']);
		}else{
			return  Configure::read('Sendgrid_default');
		}
	}
	
	private function _ReplaceTagsInTemplate($Contents){
		$search_for = array('{sperson}',
							'{first_name}',
							'{last_name}',
							'{email}',
							'{type}',
							'{condition}',
							'{year}',
							'{make}',
							'{model}',
							'{mobile}',
							'{address}',
							'{city}',
							'{state}',
							'{today}',
							'{zip}',
							'{stock_num}',
							'{dealer_name}',
							'{dealer_email}',
							'{dealer_phone}',
							'{dealer_fax}',
							'{dealer_address}',
							'{dealer_city}',
							'{dealer_state}',
							'{dealer_zip}',
							'{dealer_website}',
							'{spouse_first_name}',
							'{spouse_last_name}'
						);
					
		$replace_with = array(
						':sperson',
						':first_name',
						':last_name',
						':email',
						':type',
						':condition',
						':year',
						':make',
						':model',
						':mobile',
						':address',
						':city',
						':state',
						':today',
						':zip',
						':stock_num',
						':dealer_name',
						':dealer_email',
						':dealer_phone',
						':dealer_fax',
						':dealer_address',
						':dealer_city',
						':dealer_state',
						':dealer_zip',
						':dealer_website',
						':spouse_first_name',
						':spouse_last_name'
					);
		
		return str_replace($search_for,$replace_with,$Contents);
	}


	private function _SendEmailSendgridAPI($dealer_id,$from,$xsmtpapi,$to,$subject,$html,$contact_id = null,$autoresponder_id = null){
		
		$SendgridCred = $this->_GetSendgridDetails($dealer_id);
		$url = 'https://api.sendgrid.com/';

		$json_string = array(
		  'category' => $dealer_id,
		  'unique_args' => array("m_type"=>'autores',"contact_id"=>$contact_id, 'autoresponder_id' => $autoresponder_id)
		);

		$postdata = http_build_query(
		   array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'to'        => $to,
			'x-smtpapi' => json_encode($json_string),
			'subject'   => $subject,
			'html'      => $html,
			'from'      => $from,
		  )
		);
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
		$context  = stream_context_create($opts);
		$result = file_get_contents( $url.'api/mail.send.json', false, $context);
		$response = json_decode($result, true);
		//debug($response);
		return $response;
	}

	private function get_recipient_data($contact_id){

		$this->Contact->recursive = -1;
		$conditions = array();
		$conditions['Contact.id'] = $contact_id;
		$recipients_data = $this->Contact->find('first',array('conditions'=>$conditions));

		return $recipients_data;
	}

	private function _GetEmailData($contact, $DEALER_INFORMATION,  $template_fields){

		$dealer_fields  = array('dealer_name','dealer_email','dealer_phone','dealer_fax','dealer_address','dealer_city','dealer_state','dealer_zip','dealer_website');

		$dealer_field_map  = array(
		   'dealer_name'	=> 'dealer',
		   'dealer_email'	=> 'd_email',
		   'dealer_phone'	=> 'd_phone',
		   'dealer_fax'	=> 'd_fax',
		   'dealer_address'	=> 'd_address',
		   'dealer_city'	=> 'd_city',
		   'dealer_state'	=> 'd_state',
		   'dealer_zip'	=> 'd_zip',
		   'dealer_website'	=> 'd_website'
		);


		foreach ($template_fields as $fields) {

			if(in_array($fields, $dealer_fields)){
				//Dealer Ship Fields
				if(isset($DEALER_INFORMATION[ $dealer_field_map[$fields] ])){
					$return[$fields] = $DEALER_INFORMATION[ $dealer_field_map[$fields] ];
				}
			}else{
				//Contact Fields
				if(isset($contact['Contact'][$fields])){
					$return[$fields] = $contact['Contact'][$fields];
				}
			}
		}
		return $return;
	}

	private function _template_parse($template_data, $recipients_data, $user_id){
			
		$tempalte_fields = $this->_template_fields($template_data);

		$this->loadModel('User');
		$dealer_details =  $this->User->find('first',array('conditions' => array('User.id'=>$user_id)));
		$DEALER_INFORMATION = $dealer_details['User'];

		$template_data_array = $this->_GetEmailData($recipients_data, $DEALER_INFORMATION, $tempalte_fields);

		$template_data = $this->_ReplaceTagsInTemplate($template_data);

		App::uses('CakeText', 'Utility');
		$full_template = CakeText::insert($template_data, $template_data_array);

		return $full_template;
	}

	public function get_setting($type=null, $current_user_id){
		$this->loadModel('EmailSetting');
		$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
		
		//$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
		
		if($type == 'imap'){
			$imap_settings = array();
			if( $current_settings['EmailSetting']['imap_server'] != '' && $current_settings['EmailSetting']['smtp_username'] != '' &&  $current_settings['EmailSetting']['smtp_pwd']  ){
				
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
			}
			return $imap_settings;
		}

		if($type == 'smtp'){
			$smtp_settings = array();
			if($current_settings['EmailSetting']['ext1'] != 'Off' && $current_settings['EmailSetting']['smtp_host'] != '' && $current_settings['EmailSetting']['smtp_username'] != ''  && $current_settings['EmailSetting']['emailaddress'] != ''){

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
			return $smtp_settings;
		}
	}


	public function update_eblast_sent_log_test(){
		$this->update_eblast_sent_log('123', '5001', 'awrussel2002@yahoo.com');
	}	

	public function update_eblast_sent_log($template_id, $dealer_id, $email){
		$this->loadModel('EblastsSentLog');
		$eblasts_log = $this->EblastsSentLog->find('first', array('conditions'=>array(
			'EblastsSentLog.dealer_id'=>$dealer_id, 
			'EblastsSentLog.template_id'=>$template_id, 
			'EblastsSentLog.email'=>$email
		)));

		if(empty($eblasts_log)){
			$this->EblastsSentLog->create();
			$this->EblastsSentLog->save(array('EblastsSentLog'=>array(
				'dealer_id' => $dealer_id, 
				'template_id' =>$template_id, 
				'email' => $email,
				'sent_date' => date('Y-m-d H:i:s'),
			)));
		}else{
			$this->EblastsSentLog->query("UPDATE eblasts_sent_logs SET sent_date = :sent_date WHERE id = :id", array('sent_date' => date('Y-m-d H:i:s'),'id'=> $eblasts_log['EblastsSentLog']['id'] ));
		}

	}

	private function _check_duplicate_email($template_id, $dealer_id, $email){
		//$this->autoRender = false;
		$one_months = date("Y-m-d H:i:s", strtotime("-30 day"));

		$this->loadModel('EblastsSentLog');
		$eblasts_log = $this->EblastsSentLog->find('first', array('conditions'=>array(
			'EblastsSentLog.dealer_id'=>$dealer_id, 
			'EblastsSentLog.template_id'=>$template_id, 
			'EblastsSentLog.email'=>$email,
			'EblastsSentLog.sent_date >='=>$one_months
		)));
		//debug($eblasts_log);

		if(!empty($eblasts_log)){
			return false;
		}else{
			return true;
		}
	}


	public function immediate_sold($contact_id){

		$recipients_data = $this->get_recipient_data( $contact_id );
		//debug( $recipients_data );

		$current_user = $recipients_data['Contact']['user_id'];
		$dealer_id = $recipients_data['Contact']['company_id'];
		$dealer_name = $recipients_data['Contact']['company'];

		$this->loadModel("AutoresponderRule");
		$this->loadModel("Contact");
		$this->loadModel("Autoresponder");

		$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>array('AutoresponderRule.rule_type'=>"Purchase",  'AutoresponderRule.duration_category'=>"Immediately",  'AutoresponderRule.active'=>1,'AutoresponderRule.dealer_id'=>$dealer_id)));
		$template_id = $autoresponders['AutoresponderRule']['template_id'];
		//debug($template_id);

		//Check active welcome rule
		if(!empty($autoresponders) && $autoresponders['AutoresponderRule']['template_id'] != ''){

			$unsubscribe_link = $this->get_unsub_link($contact_id,$dealer_id);

			//$open_track_image = '<img src="https://app.dealershipperformancecrm.com/imgs/autoresponders/'.$autoresponders['AutoresponderRule']['id'].'/'.$contact_id.'/mail.png" width="1" height="1" title="" alt=""> ';
			$open_track_image = '';

			$EmailTemplate = $this->_GetEmailTemplate($autoresponders['AutoresponderRule']['template_id']);
			$email_content = $this->_template_parse($EmailTemplate['Template']['template_html'], $recipients_data, $current_user);

			//30 Days Checking
			if($this->_check_duplicate_email($autoresponders['AutoresponderRule']['template_id'], $dealer_id, $recipients_data['Contact']['email'] ) == false ){
				return true;
			}

			//SMTP TYPE SendgridAPI/Email start
			if($autoresponders['AutoresponderRule']['email_mode'] == 'Email'){

				$smtp_settings  = $this->get_setting("smtp",$current_user);
				if(!empty($smtp_settings)){
					try{
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->config($smtp_settings['smtp']);

						$email->viewVars(array('email_content'=>$email_content.$unsubscribe_link));
						$email->template('internal_message')
							->emailFormat('html')
							->subject($EmailTemplate['Template']['template_email_subject'])
							->from(array($smtp_settings['emailaddress'] => $recipients_data['Contact']['sperson'] ))
							->to(array($recipients_data['Contact']['email']))
							->replyTo(array($smtp_settings['emailaddress'] => $recipients_data['Contact']['sperson'] ))
							->send();	
							
					}catch(Exception $e){
					}			
				}else{

					$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
					if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
						$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
						if(!empty($sperson_email)){
							$from_email_address = $sperson_email;
						}
					}

					$xsmtpapi = $recipients_data['Contact']['email'];
					try{
						$this->_SendEmailSendgridAPI(
							$dealer_id,
							$from_email_address,
							$xsmtpapi,
							$recipients_data['Contact']['email'],
							$EmailTemplate['Template']['template_email_subject'],
							$email_content.$unsubscribe_link,
							$contact_id,
							$autoresponders['AutoresponderRule']['id']
						);
					}catch(Exception $e){
						
					}

				}
				
			}else if($autoresponders['AutoresponderRule']['email_mode'] == 'SendgridAPI'){

				$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
				if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
					$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
					if(!empty($sperson_email)){
						$from_email_address = $sperson_email;
					}
				}

				$xsmtpapi = $recipients_data['Contact']['email'];
				try{
					$this->_SendEmailSendgridAPI(
						$dealer_id,
						$from_email_address,
						$xsmtpapi,
						$recipients_data['Contact']['email'],
						$EmailTemplate['Template']['template_email_subject'],
						$email_content.$unsubscribe_link,
						$contact_id,
						$autoresponders['AutoresponderRule']['id']	
					);
				}catch(Exception $e){
					
				}
			}

			//SMTP TYPE SendgridAPI/Email ends

			//UPdate Log
			$this->update_eblast_sent_log($template_id, $dealer_id, $recipients_data['Contact']['email']);


		}

		return true;


	}


	function SendWelcomeEmail($contact_id){

		$recipients_data = $this->get_recipient_data( $contact_id );
		//debug( $recipients_data );

		$current_user = $recipients_data['Contact']['user_id'];
		$dealer_id = $recipients_data['Contact']['company_id'];
		$dealer_name = $recipients_data['Contact']['company'];

		$this->loadModel("AutoresponderRule");
		$this->loadModel("Contact");
		$this->loadModel("Autoresponder");

		$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>array('AutoresponderRule.rule_type'=>"Welcome",'active'=>1,'dealer_id'=>$dealer_id)));
		$template_id = $autoresponders['AutoresponderRule']['template_id'];
		//debug($template_id);

		//Check active welcome rule
		if(!empty($autoresponders) && $autoresponders['AutoresponderRule']['template_id'] != ''){

			$unsubscribe_link = $this->get_unsub_link($contact_id,$dealer_id);
			
			//$open_track_image = '<img src="https://app.dealershipperformancecrm.com/imgs/autoresponders/'.$autoresponders['AutoresponderRule']['id'].'/'.$contact_id.'/mail.png" width="1" height="1" title="" alt=""> ';
			$open_track_image = '';

			$EmailTemplate = $this->_GetEmailTemplate($autoresponders['AutoresponderRule']['template_id']);
			$email_content = $this->_template_parse($EmailTemplate['Template']['template_html'], $recipients_data, $current_user);

			//30 Days Checking
			if($this->_check_duplicate_email($autoresponders['AutoresponderRule']['template_id'], $dealer_id, $recipients_data['Contact']['email'] ) == false ){
				return true;
			}

			//SMTP TYPE SendgridAPI/Email start
			if($autoresponders['AutoresponderRule']['email_mode'] == 'Email'){

				$smtp_settings  = $this->get_setting("smtp",$current_user);
				if(!empty($smtp_settings)){
					try{
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->config($smtp_settings['smtp']);

						$email->viewVars(array('email_content'=>$email_content.$unsubscribe_link));
						$email->template('internal_message')
							->emailFormat('html')
							->subject($EmailTemplate['Template']['template_email_subject'])
							->from(array($smtp_settings['emailaddress'] => $recipients_data['Contact']['sperson'] ))
							->to(array($recipients_data['Contact']['email']))
							->replyTo(array($smtp_settings['emailaddress'] => $recipients_data['Contact']['sperson'] ))
							->send();	
							
					}catch(Exception $e){
					}			
				}else{

					$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
					if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
						$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
						if(!empty($sperson_email)){
							$from_email_address = $sperson_email;
						}
					}

					$xsmtpapi = $recipients_data['Contact']['email'];
					try{
						$this->_SendEmailSendgridAPI(
							$dealer_id,
							$from_email_address,
							$xsmtpapi,
							$recipients_data['Contact']['email'],
							$EmailTemplate['Template']['template_email_subject'],
							$email_content.$unsubscribe_link,
							$contact_id,
							$autoresponders['AutoresponderRule']['id']
						);
					}catch(Exception $e){
						
					}

				}
				
			}else if($autoresponders['AutoresponderRule']['email_mode'] == 'SendgridAPI'){
				
				$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
				if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
					$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
					if(!empty($sperson_email)){
						$from_email_address = $sperson_email;
					}
				}

				$xsmtpapi = $recipients_data['Contact']['email'];
				try{
					$this->_SendEmailSendgridAPI(
						$dealer_id,
						$from_email_address,
						$xsmtpapi,
						$recipients_data['Contact']['email'],
						$EmailTemplate['Template']['template_email_subject'],
						$email_content.$unsubscribe_link,
						$contact_id,
						$autoresponders['AutoresponderRule']['id']
					);
				}catch(Exception $e){
					
				}
			}

			//SMTP TYPE SendgridAPI/Email ends

			//UPdate Log
			$this->update_eblast_sent_log($template_id, $dealer_id, $recipients_data['Contact']['email']);


		}

		return true;
	}

	public function send_auto_responder_update_email(){



		$NewDetails = $trigger_update_contacts = $this->request->data['form_data']['Contact'];
		$OldDetails = $this->request->data['old_contact_data']['Contact'];
		$contact_id = $this->request->data['contact_id'];

		if((trim($OldDetails['contact_status_id'])!=trim($NewDetails['contact_status_id']) && isset($NewDetails['contact_status_id'])) ||
		(trim($OldDetails['lead_status'])!=trim($NewDetails['lead_status']) && isset($NewDetails['lead_status'])) ||
		(trim($OldDetails['sales_step'])!=trim($NewDetails['sales_step']) && isset($NewDetails['sales_step'])) ||
		(trim($OldDetails['status'])!=trim($NewDetails['status']) && isset($NewDetails['status'])) ||
		(trim($OldDetails['source'])!=trim($NewDetails['source']) && isset($NewDetails['source'])))
		{
			$this->autoresponder_update_rule($contact_id);
		}

	}



	public function get_unsub_link($contact_id, $dealer_id){
		$this->loadModel('DealerSetting');
		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $dealer_id);
		$unsublink = "";
		if($casl_feature == 'On'){
			App::uses('CakeEmail', 'Network/Email');
			$key = 'ioOJ987hKhyiu687iHkKHKhkHkHKjhIU';
			$contact_id_enc = base64_encode(Security::rijndael($contact_id, $key, 'encrypt'));
			$unsublink = "<br><br><p>If you'd like to unsubscribe and stop receiving these emails <a href='https://app.dealershipperformancecrm.com/unsubscribes/cnt/?ld=".urlencode($contact_id_enc)."'>click here</a> .</p>";
		}
		return $unsublink;
	}

	public function test_autoresponder(){

		// $this->autoresponder_update_rule('9712674');
		// $this->immediate_sold('9712674');
		// $this->SendWelcomeEmail('9712674');
		
	}
	public function sperson_email_address($user_id){
		$this->loadModel("User");
		$user_data = $this->User->find('first',array('recursive' => -1, 'fields'=>['id','email'],'conditions'=>['id'=>$user_id]));
		if(!empty(trim($user_data['User']['email'])) && filter_var(trim($user_data['User']['email']), FILTER_VALIDATE_EMAIL) !== false ){
			return trim($user_data['User']['email']);
		}else{
			return false;
		}
	}
	public function autoresponder_update_rule($contact_id){

		$this->loadModel("AutoresponderRule");

		$recipient_data = $this->get_recipient_data($contact_id);
		$trigger_update_contacts = $recipient_data['Contact'];
		//debug($trigger_update_contacts);

		$dealer_id = $trigger_update_contacts['company_id'];
		$current_user = $trigger_update_contacts['user_id'];
		$dealer_name = $trigger_update_contacts['company'];


		$AutoresponderRulesData = array();

		if($trigger_update_contacts['contact_status_id'] != ''){
			$AutoresponderRulesData['AutoresponderRule.search_contact_status_id'] =  $trigger_update_contacts['contact_status_id'];
		}
		if($trigger_update_contacts['lead_status'] != ''){
			$AutoresponderRulesData['AutoresponderRule.search_lead_status'] =  $trigger_update_contacts['lead_status'];
		}
		if($trigger_update_contacts['sales_step'] != ''){
			$AutoresponderRulesData['AutoresponderRule.search_sales_step'] =  $trigger_update_contacts['sales_step'];
		}
		if($trigger_update_contacts['source'] != ''){
			$AutoresponderRulesData['AutoresponderRule.search_source'] =  $trigger_update_contacts['source'];
		}
		if($trigger_update_contacts['status'] != ''){
			$AutoresponderRulesData['AutoresponderRule.search_status'] =  $trigger_update_contacts['status'];
		}
		$AutoresponderRulesData['AND'] =array(
		        							 array('OR' => array('AutoresponderRule.duration_days' => null,"AutoresponderRule.duration_days = '' ")),
		       								 array('OR' => array("AutoresponderRule.dormant_days = '' ",'AutoresponderRule.duration_days' => null)),
		    );
		$AutoresponderRulesData['AutoresponderRule.dealer_id'] = $dealer_id;

		$autoresponders = $this->AutoresponderRule->find('first',array('conditions'=>$AutoresponderRulesData));

		if(!empty($autoresponders) && $autoresponders['AutoresponderRule']['template_id'] != ''){

			//30 Days Checking
			if($this->_check_duplicate_email($autoresponders['AutoresponderRule']['template_id'], $dealer_id, $recipient_data['Contact']['email'] ) == false ){
				return true;
			}

			$unsubscribe_link = $this->get_unsub_link($contact_id,$dealer_id);

			//$open_track_image = '<img src="https://app.dealershipperformancecrm.com/imgs/autoresponders/'.$autoresponders['AutoresponderRule']['id'].'/'.$contact_id.'/mail.png" width="1" height="1" title="" alt=""> ';
			$open_track_image = '';

			$EmailTemplate = $this->_GetEmailTemplate($autoresponders['AutoresponderRule']['template_id']);
			$email_content = $this->_template_parse($EmailTemplate['Template']['template_html'], $recipient_data, $current_user);
			//debug($current_user);
			//debug($email_content);

			//SMTP TYPE SendgridAPI/Email start
			if($autoresponders['AutoresponderRule']['email_mode'] == 'Email'){

				$smtp_settings  = $this->get_setting("smtp",$current_user);
				if(!empty($smtp_settings)){
					try{
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->config($smtp_settings['smtp']);

						$email->viewVars(array('email_content'=>$email_content.$unsubscribe_link));
						$email->template('internal_message')
							->emailFormat('html')
							->subject($EmailTemplate['Template']['template_email_subject'])
							->from(array($smtp_settings['emailaddress'] => $recipient_data['Contact']['sperson'] ))
							->to(array($recipient_data['Contact']['email']))
							->replyTo(array($smtp_settings['emailaddress'] => $recipient_data['Contact']['sperson'] ))
							->send();	
							
					}catch(Exception $e){
					}			
				}else{
					$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
					if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
						$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
						if(!empty($sperson_email)){
							$from_email_address = $sperson_email;
						}
					}
					$xsmtpapi = $recipient_data['Contact']['email'];
					try{
						$this->_SendEmailSendgridAPI(
							$dealer_id,
							$from_email_address,
							$xsmtpapi,
							$recipient_data['Contact']['email'],
							$EmailTemplate['Template']['template_email_subject'],
							$email_content.$unsubscribe_link,
							$contact_id,
							$autoresponders['AutoresponderRule']['id']

						);
					}catch(Exception $e){
						
					}

				}
				
			}else if($autoresponders['AutoresponderRule']['email_mode'] == 'SendgridAPI'){
				$from_email_address = $EmailTemplate['Template']['template_email_from_id'];
				if( $EmailTemplate['Template']['template_from_sperson'] == '1' ){
					$sperson_email = $this->sperson_email_address($recipient_data['Contact']['user_id']);
					if(!empty($sperson_email)){
						$from_email_address = $sperson_email;
					}
				}

				$xsmtpapi = $recipient_data['Contact']['email'];
				try{
					$this->_SendEmailSendgridAPI(
						$dealer_id,
						$from_email_address,
						$xsmtpapi,
						$recipient_data['Contact']['email'],
						$EmailTemplate['Template']['template_email_subject'],
						$email_content.$unsubscribe_link,
						$contact_id,
						$autoresponders['AutoresponderRule']['id']
					);
				}catch(Exception $e){
					
				}
			}

			//SMTP TYPE SendgridAPI/Email ends

			//UPdate Log
			$this->update_eblast_sent_log($autoresponders['AutoresponderRule']['template_id'], $dealer_id, $recipient_data['Contact']['email']);

		}






	}

























}