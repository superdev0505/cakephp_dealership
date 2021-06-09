<?php
class MarketingRecipientController extends AppController { 

	public $uses = array('User', 'TemplateApp', 'TemplatesCategoryApp', 'EblastApp','UserEmail', 'EblastsSent','EblastUnsubscribe','EblastBounce','EblastSpam' );
    public $components = array('RequestHandler' );
	
	function beforeFilter() {	
		parent::beforeFilter();
		$this->Auth->allow('unsubscribe');   

		$dealer_ids = $this->get_dealer_ids(); 
    	$this->set('dealer_ids',$dealer_ids);
	}
	public $SENDGRID_INFORMATION = array();

	public function _GetSendgridDetails($DealerId){
		$this->loadModel('SendgridSubuser');
		//$this->SendgridSubuser->useDbConfig =  'default_main';
		$details = $this->SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$DealerId)));
		if(trim($details['SendgridSubuser']['username'])!=''){
			$this->SENDGRID_INFORMATION =  array('user'=>$details['SendgridSubuser']['username'],'pass'=>$details['SendgridSubuser']['password']);
		}else{
			$this->SENDGRID_INFORMATION = Configure::read('Sendgrid_default');
		}
	}
	private function _GetEmailTemplate($templateId){
		$this->loadModel("TemplateApp");
		$templatesSrc = $this->TemplateApp->find('first',  array('conditions' => array('TemplateApp.template_id' => $templateId)));
		return $templatesSrc;
	}
	private function _template_fields($templateId){
		$EmailTemplate = $this->_GetEmailTemplate($templateId);	
		preg_match_all('/\{([A-Za-z0-9  _]+?)\}/', $EmailTemplate['TemplateApp']['template_html'], $aMatches);
		//debug($aMatches[1]);
		return $aMatches[1];
	}
	private function _ReplaceTagsInTemplate($Contents){
		$search_for = array('{full_name}',
							'{sperson}',
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
							'{dealer_name}',
							'{dealer_email}',
							'{dealer_phone}',
							'{dealer_fax}',
							'{dealer_address}',
							'{dealer_city}',
							'{dealer_state}',
							'{dealer_zip}',
							'{dealer_website}'
						);
					
		$replace_with = array(
						':full_name',
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
						':dealer_name',
						':dealer_email',
						':dealer_phone',
						':dealer_fax',
						':dealer_address',
						':dealer_city',
						':dealer_state',
						':dealer_zip',
						':dealer_website'
					);
		
		return str_replace($search_for,$replace_with,$Contents);
	}

	public function GetEblastRecipients($contact_id){
		$this->loadModel("Contact");
		$this->Contact->recursive = -2;
		$contacts = array();

		$fields = array(
			'id',
			'first_name',
			'last_name',
			'sperson',
			'source',
			'address',
			'city',
			'state',
			'zip',
			'phone',
			'mobile',
			'work_number',
			'email',
			'gender',
			'condition',
			'year',
			'make',
			'model',
			'web_selection',
			'type',
			'class',
			'category',
			'company_id',
			'dnc_status'
		);
		
		$current_time = date('Y-m-d H:i:s');
		$one_month_back = date('Y-m-d H:i:s', strtotime("-30 day"));
		$conditions = array("Contact.id" => $contact_id);
		$contacts =  $this->Contact->find('all',array('fields'=>$fields,'conditions' => $conditions , 'order' => array('Contact.id' => 'DESC')));
		return $contacts;
	}

	private function _GetEmailDataContact($contact, $template_fields){


		$return['name'] = $contact['Contact']['first_name']." ".$contact['Contact']['last_name'];
		$return['email'] = $contact['Contact']['email'];
		$return['today'] = date("m/d/Y");

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
			if($fields == 'name' || $fields == 'email' || $fields == 'today' ){
				continue;
			}
			if(in_array($fields, $dealer_fields)){
				//Dealer Ship Fields
				if(isset($this->DEALER_INFORMATION[ $dealer_field_map[$fields] ])){
					$return[$fields] = $this->DEALER_INFORMATION[ $dealer_field_map[$fields] ];
				}
			}else{
				//Contact Fields
				if(isset($contact['Contact'][$fields])){
					$return[$fields] = $contact['Contact'][$fields];
				}else{
					$return[$fields] = "";
				}
			}
		}
		
		// debug( $return );

		return $return;
	}


	public function get_dealer_ids(){

    	$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');
    	$other_locations_ar = explode(",", $other_locations);

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => $dconditions ));

    	ksort($user_active);
    	//debug( $user_active );
    	return $user_active;
    }

    private function _SendEmailSendgridAPI($from,$to,$subject,$html){
		
		$SendgridCred = $this->SENDGRID_INFORMATION;
		$url = 'https://api.sendgrid.com/';
		
		$postdata = http_build_query(
		   array(
			'api_user'  => 'dp360eblast',
			'api_key'   => '4756ty3663#@!!',
			'to'        => $to,
			'subject'   => $subject,
			'html'      => $html,
			'from'      => $from
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

		return $result;
	}

    //CREATE NEW EBLAST SEND
	private function _ScheduleEblastNow($details, $contact_id, $recipient_email_address){

		$dealer_id = $details['EblastApp']['user_id'];
		$eblast_id = $details['EblastApp']['id'];
		$list_id = $details['EblastApp']['list_id'];

		App::uses('CakeText', 'Utility');

		$this->_GetSendgridDetails($dealer_id);
		$this->loadModel('User');
		
		$dealer_details =  $this->User->find('first',array('conditions' => array(
			'dealer <> '=>'','d_email <> '=>'','d_address <> '=>'','d_city <> '=>'',
			'd_state <> '=>'','d_zip <> '=>'','dealer_id'=>$dealer_id
		)));
		$this->DEALER_INFORMATION = $dealer_details['User'];

		date_default_timezone_set($dealer_details['zone']);
		$sent_date = date("Y-m-d H:i:s");


		$category_name = $dealer_id;

		$templateId = $details['EblastApp']['template_id'];
		$EmailTemplate = $this->_GetEmailTemplate($templateId);

		$template_fields = $this->_template_fields($details['EblastApp']['template_id']);
		$template_data = $this->_ReplaceTagsInTemplate($EmailTemplate['TemplateApp']['template_html']);
		
		// debug($template_fields);
		// debug($template_data);

		if($list_id != ''){

			//Eblast From List
			$this->loadModel('Recipient');
			$recipients_data =  $this->Recipient->find('all', array("group" => 'Recipient.email_address', "conditions"=>array("Recipient.id"=>$contact_id )));

			foreach($recipients_data as $rec_data){

				if($rec_data['Recipient']['email_address'] != ''){
					
					// debug($rec_data);

					$EmailDataJSON['email'] = $rec_data['Recipient']['email_address'];
					$first_name_pos = strpos($template_data, ":first_name");
					$last_name_pos = strpos($template_data, ":last_name");

					if($first_name_pos !== false && $last_name_pos !== false){
						$EmailDataJSON['first_name'] = $rec_data['Recipient']['name'];
						$EmailDataJSON['last_name'] = "";
					}
					if($first_name_pos !== false && $last_name_pos === false){
						$EmailDataJSON['first_name'] = $rec_data['Recipient']['name'];
					}
					if($first_name_pos === false && $last_name_pos !== false){
						$EmailDataJSON['last_name'] = $rec_data['Recipient']['name'];
					}

					foreach($template_fields as  $template_field){
						// debug($template_field);
						if($template_field == 'first_name' || $template_field == 'last_name' || $template_field == 'email'){
							continue;
						}
						$EmailDataJSON[ $template_field ] = "";	
					}
					$html = CakeText::insert($template_data, $EmailDataJSON);
					
					// debug( $html );

					$response = $this->_SendEmailSendgridAPI(  
						$EmailTemplate['TemplateApp']['template_email_from_id'],
						$recipient_email_address,
						$EmailTemplate['TemplateApp']['template_email_subject'],
						$html
					);

				}
			}

		}else{

			//Eblast from contacts
			// debug($details);

			$contacts = $this->GetEblastRecipients($contact_id);
			// debug( $contacts );


			foreach ($contacts as $contact) {
				$EmailDataJSON = $this->_GetEmailDataContact($contact, $template_fields);
				$html = CakeText::insert($template_data, $EmailDataJSON);

				// debug( $EmailDataJSON );
				// debug( $html );
				
				$response = $this->_SendEmailSendgridAPI(
					$EmailTemplate['TemplateApp']['template_email_from_id'],
					$recipient_email_address,
					$EmailTemplate['TemplateApp']['template_email_subject'],
					$html
				); 

				
			}

		}

	}



	public function test_send() {

		$rec_data = $this->request->query;

		$contact_id = $rec_data['contact_id'];
		$eblastapp_id = $rec_data['eblast_appid'];
		$recipient_email_address = $rec_data['recipient'];
		$rectype = $rec_data['rectype'];
		$eblast_recpient_id = $rec_data['eblast_recpient_id'];
		
		$eblastApp = $this->EblastApp->find('first',array('conditions'=>array('EblastApp.id'=> $eblastapp_id)));

		$emails = array();
		$keywords = preg_split("/[\s,;]+/", $recipient_email_address);
		foreach($keywords as  $keyword){
			if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
				$emails[] = $keyword;
			}
		}

		foreach($emails as $email){
			if($rectype == 'list'){
				$this->_ScheduleEblastNow($eblastApp, $eblast_recpient_id, $email);
			}else{
				$this->_ScheduleEblastNow($eblastApp, $contact_id, $email);
			}
		}
		$this->autoRender = false;
	}





	
	
}