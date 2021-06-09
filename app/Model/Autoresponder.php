<?php
class Autoresponder extends AppModel {
	function add_sender_address($data,$SendgridCred){
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'identity'        => $data['SenderAddressName'],
			'name'   => $data['SenderName'],
			'email'      => $data['SenderEmail'],
			'address'      => '929_Pearl_Stree',
			'city'      => 'Boulder',
			'state'      => 'Colorado',
			'zip'=>	'80302',
			'country'      => 'US',
		  );


		$request =  'https://api.sendgrid.com/api/newsletter/identity/add.json';
		/*
		$queryStr = '';
		foreach($params as $key=>$value){
			if($queryStr==''){
				$queryStr =$key."=".$value;
			}else{
				$queryStr .="&".$key."=".$value;
			}
		}
		
		$request =  $request.'?'.$queryStr;
		echo $request;
		//$response = file_get_contents($request);
		//$response = json_decode($response);
		*/

		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;

		
	}
	
	function create_category($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'category'	=> $data['CategoryName']
		  );

		$request =  'https://api.sendgrid.com/api/newsletter/category/create.json';
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;
	}
	
	function assign_category($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'category'	=> $data['CategoryName'],
			'name'		=> $data['AutoresponderName']
		  );

		$request =  'https://api.sendgrid.com/api/newsletter/category/add.json';
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;
	}
	
	
	function create_list($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'list'        => $data['ListName'],
			'name'	=> $data['Name']
		  );

		$request =  'https://api.sendgrid.com/api/newsletter/lists/add.json';
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;
	}
	
	function add_eblast_email($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'identity'        => $data['SenderAddressName'],
			'name'   => $data['AutoresponderName'],
			'subject'      => $data['AutoresponderSubject'],
			'text'      => '',
			'html'      => $data['AutoresponderEmailBody']
		  );


		$request =  'https://api.sendgrid.com/api/newsletter/add.json';
		/*
		$queryStr = '';
		foreach($params as $key=>$value){
			if($queryStr==''){
				$queryStr =$key."=".$value;
			}else{
				$queryStr .="&".$key."=".$value;
			}
		}
		
		$request =  $request.'?'.$queryStr;
		echo $request;
		//$response = file_get_contents($request);
		//$response = json_decode($response);
		*/

		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;

		
	}
	
	function add_recipients_email_list($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'list'        => $data['ListName'],
			'name'   => $data['AutoresponderName'] // name passed in add_eblast_email
		  );

		$request =  'https://api.sendgrid.com/api/newsletter/recipients/add.json';
		/*
		$queryStr = '';
		foreach($params as $key=>$value){
			if($queryStr==''){
				$queryStr =$key."=".$value;
			}else{
				$queryStr .="&".$key."=".$value;
			}
		}
		
		$request =  $request.'?'.$queryStr;
		echo $request;
		//$response = file_get_contents($request);
		//$response = json_decode($response);
		*/

		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;

		
	}
	
	function add_recipients_email_to_list($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'list'        => $data['ListName'], // list passed in add_recipients_email_list
			'data'   => $data['Data']
		  );


		$request =  'https://api.sendgrid.com/api/newsletter/lists/email/add.json';
		/*
		$queryStr = '';
		foreach($params as $key=>$value){
			if($queryStr==''){
				$queryStr =$key."=".$value;
			}else{
				$queryStr .="&".$key."=".$value;
			}
		}
		
		$request =  $request.'?'.$queryStr;
		echo $request;
		//$response = file_get_contents($request);
		//$response = json_decode($response);
		*/

		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		return $response;

		
	}
	
	function schedule_eblast_email($data,$SendgridCred){
		$SendgridCred = Configure::read('Sendgrid');
		if(isset($data['ScheduleAt']) && is_array($data['ScheduleAt']) && count($data['ScheduleAt'])>0){ // send same email multiple days
			foreach($data['ScheduleAt'] as $ScheduleAt){
				$params = array(
					'api_user'  => $SendgridCred['user'],
					'api_key'   => $SendgridCred['pass'],
					'name'   => $data['AutoresponderName'],
					'at'   => str_replace(" ","T",$ScheduleAt)
				  );


				$request =  'https://api.sendgrid.com/api/newsletter/schedule/add.json';
				/*
				$queryStr = '';
				foreach($params as $key=>$value){
					if($queryStr==''){
						$queryStr =$key."=".$value;
					}else{
						$queryStr .="&".$key."=".$value;
					}
				}
				
				$request =  $request.'?'.$queryStr;
				echo $request;
				//$response = file_get_contents($request);
				//$response = json_decode($response);
				*/

				
				// Generate curl request
				$session = curl_init($request);
				// Tell curl to use HTTP POST
				curl_setopt ($session, CURLOPT_POST, true);
				// Tell curl that this is the body of the POST
				curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
				// Tell curl not to return headers, but do return the response
				curl_setopt($session, CURLOPT_HEADER, false);
				curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

				// obtain response
				$response = curl_exec($session);
				curl_close($session);
			}
		}else{
			$params = array(
					'api_user'  => $SendgridCred['user'],
					'api_key'   => $SendgridCred['pass'],
					'name'   => $data['AutoresponderName']
				  );


				$request =  'https://api.sendgrid.com/api/newsletter/schedule/add.json';
				/*
				$queryStr = '';
				foreach($params as $key=>$value){
					if($queryStr==''){
						$queryStr =$key."=".$value;
					}else{
						$queryStr .="&".$key."=".$value;
					}
				}
				
				$request =  $request.'?'.$queryStr;
				echo $request;
				//$response = file_get_contents($request);
				//$response = json_decode($response);
				*/

				
				// Generate curl request
				$session = curl_init($request);
				// Tell curl to use HTTP POST
				curl_setopt ($session, CURLOPT_POST, true);
				// Tell curl that this is the body of the POST
				curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
				// Tell curl not to return headers, but do return the response
				curl_setopt($session, CURLOPT_HEADER, false);
				curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

				// obtain response
				$response = curl_exec($session);
				curl_close($session);
		
		}
		return $response;

		
	}
	
	
	function GetColumnsToBReplaced($templateId){
		// Get custom tags from email template
	}
	
	
	
	
	function ReplaceTagsInTemplate($Contents){
		$search_for = array('{user_name}',
						'{first_name}',
						'{last_name}',
						'{full_name}',
						'{email}',
						'{type}',
						'{condition}',
						'{year}',
						'{make}',
						'{model}',
						'{modified_full_date}',
						'{modified}',
						'{mobile}',
						'{address}',
						'{city}',
						'{state}'
					);
					
		$replace_with = array('[user_name]',
						'[first_name]',
						'[last_name]',
						'[full_name]',
						'[email]',
						'[type]',
						'[condition]',
						'[year]',
						'[make]',
						'[model]',
						'[modified_full_date]',
						'[modified]',
						'[mobile]',
						'[address]',
						'[city]',
						'[state]'
					);
		
		return str_replace($search_for,$replace_with,$Contents);
	}
	
	function GetTempRecipients(){
		$contact['Contact']['first_name'] = 'Amarjit';
		$contact['Contact']['last_name'] = 'Kumar';
		$contact['Contact']['email'] = 'amarjeetkr.developer@gmail.com';
		$contact['Contact']['type'] = ''; 
		$contact['Contact']['condition'] = '';
		$contact['Contact']['year'] = '';;
		$contact['Contact']['make'] = '';;
		$contact['Contact']['model'] = '';;
		$contact['Contact']['modified'] = '';;
		$contact['Contact']['modified'] = '';;
		$contact['Contact']['mobile'] = '';;
		$contact['Contact']['address'] = '';;
		$contact['Contact']['city'] = '';;	
		$contact['Contact']['state'] = '';
		return array(0=>$contact);
	
	}
	function GetEmailData($contact){
		$return['name'] = $contact['Contact']['first_name']." ".$contact['Contact']['last_name'];
		$return['email'] = $contact['Contact']['email'];
		$return['user_name'] = $contact['Contact']['email'];
		$return['first_name'] = $contact['Contact']['first_name'];
		$return['last_name'] = $contact['Contact']['last_name'];
		$return['full_name'] = $contact['Contact']['first_name']." ".$contact['Contact']['last_name'];
		$return['email'] = $contact['Contact']['email'];
		$return['type'] = $contact['Contact']['type'];
		$return['condition'] = $contact['Contact']['condition'];
		$return['year'] = $contact['Contact']['year'];
		$return['make'] = $contact['Contact']['make'];
		$return['model'] = $contact['Contact']['model'];
		$return['modified_full_date'] = $contact['Contact']['modified'];
		$return['modified'] = $contact['Contact']['modified'];
		$return['mobile'] = $contact['Contact']['mobile'];
		$return['address'] = $contact['Contact']['address'];
		$return['city'] = $contact['Contact']['city'];	
		$return['state'] = $contact['Contact']['state'];	
		return $return;
		
	}
	public function GetEmailTemplate($templateId){
		App::import("Model","Template");
		$this->Template = new Template();
		$templatesSrc = $this->Template->find('first',  array('conditions' => array('Template.template_id' => $templateId)));
		return $templatesSrc;
	}
	
	function GetScheduleDates($startTime,$endTime,$db=false){
		$zone = $this->GetDealerZone($dealer_id);
		$DateArr = array();
		if($db==true){
			$StartDateTime = $startTime;
			$EndDateTime = $endTime;
		}else{
			//Current date time format is mm-dd-yyyy H:i
			$tmpExplode1 = explode(" ",$startTime);
			$tmpExplode = explode("-",$tmpExplode1[0]);
			$StartDateTime = $tmpExplode[2]."-".$tmpExplode[0]."-".$tmpExplode[1]." ".$tmpExplode1[1];
			
			$tmpExplode1 = explode(" ",$endTime);
			$tmpExplode = explode("-",$tmpExplode1[0]);
			$EndDateTime = $tmpExplode[2]."-".$tmpExplode[0]."-".$tmpExplode[1]." ".$tmpExplode1[1];
		}
		
		
		
		for($i=strtotime($StartDateTime);$i<=strtotime($EndDateTime);$i=($i+86400)){
			$date = date("Y-m-d H:i:s",$i);
			$DateArr[] = $this->ConvertToSendGridZone($date,$zone);
		}
		return $DateArr;
	}
	
	function ConvertToSendGridZone($givenDate='2014-08-24 01:00:00',$zone){
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
	
	function GetDealerZone($dealer_id){
		App::import("Model","User");
		$this->User = new User();
		$result = $this->User->find('first',array('dealer_id'=>$dealer_id));
		return $result['User']['zone'];
	}
	
	function ScheduleAutoresponder($data,$recipients_data,$autoresponder_id,$dealer_id,$rule){
		App::import('Component', 'Utility');
		$Utility = new UtilityComponent(new ComponentCollection());
		$SendgridCred = $Utility->GetSendgridDetails($dealer_id);
		$ContactIds = array();
		foreach($recipients_data as $details){
			if($details['Contact']['id']>0 && $details['Contact']['email']!=''){
				$ContactIds[] = $details['Contact']['id'];
			}
		}
		// Add Sender Address 
		$SenderAddressName 	= "SenderAddressAPI";
		$EmailName 			= "Autoresponder^^".$autoresponder_id."^^".$rule;
		$CategoryName 		= "Autoresponder^^".$autoresponder_id."^^".implode(",",$ContactIds)."^^".$rule;
		$ListName			= "List^^".$autoresponder_id."^^".$rule;
		
		//echo "$EmailName,$CategoryName,$ListName";die;
		$SenderAddressData = array();
		$SenderAddressData['SenderAddressName'] = $SenderAddressName;
		$SenderAddressData['SenderName'] = 'Dealership Performance';
		$SenderAddressData['SenderEmail'] = 'sender@dp360crm.com';
		$ResponseAddSenderAddress = $this->add_sender_address($SenderAddressData,$SendgridCred);  
		// Create a List
		$NewListData = array('ListName'=>$ListName,
						'Name'=>'name'
					);
		$ResponseCreateList = $this->create_list($NewListData,$SendgridCred);
		
		$NewCategoryData = array('CategoryName'=>$CategoryName);
		$ResponseCreateCategory = $this->create_category($NewCategoryData,$SendgridCred);
		//echo "<pre>";
		//print_r($ResponseCreateCategory);
		// Add Email
		$templateId = explode("_",$data['template_id']);
		$EmailData = array();
		$EmailTemplate = $this->GetEmailTemplate($templateId[0]);
		$EmailData['SenderAddressName'] = $SenderAddressName;
		$EmailData['AutoresponderName'] = $EmailName;
		$EmailData['AutoresponderSubject'] = $EmailTemplate['Template']['template_title'];
		$EmailData['AutoresponderEmailBody'] = $this->ReplaceTagsInTemplate($EmailTemplate['Template']['template_html']); 
		$ResponseAddAutoresponderEmail = $this->add_eblast_email($EmailData,$SendgridCred);
		//echo "<pre>";
		//print_r($ResponseAddAutoresponderEmail);
		//Add email addresse of recipient  
		//$recipients_data = $this->GetTempRecipients();
		App::import("Model","AutoresponderRecipient");
		$this->AutoresponderRecipient = new AutoresponderRecipient();
		$ContactIds = array();
		foreach($recipients_data as $details){
			/* TEMP CODE: MUST REMOVE */
			$details['Contact']['email'] = 'amarjeetkr.developer@gmail.com';
			if($details['Contact']['email']!=''){
				$ContactIds[] = $details['Contact']['id'];
				$RecipientDetails['ListName'] = $ListName;
				$EmailDataJSON = $this->GetEmailData($details);
				$RecipientDetails['Data'] = json_encode($EmailDataJSON);
				$ResponseAddRecipientsEmailToList = $this->add_recipients_email_to_list($RecipientDetails,$SendgridCred);
				//echo "<pre>";
				//print_r($ResponseAddRecipientsEmailToList);
				$SaveAutoresponderRecipient = array('autoresponder_id'=>$autoresponder_id,
													'contact_id'=>$details['Contact']['id'],
													'response'=>$ResponseAddRecipientsEmailToList);
				
				$this->AutoresponderRecipient->saveAll($SaveAutoresponderRecipient);
			}
		}
		
		//sleep(30); // stop execution for 30 seconds because creating a list and just assigning to an email may cause an issue
		
		
		//  Assign recipient list to Email  
		$ListData = array();
		$sendgrid_send_now_emails = array();
		$ListData['ListName'] = $ListName;
		$ListData['AutoresponderName'] = $EmailName;
		$ResponseAddRecipientsEmailList = $this->add_recipients_email_list($ListData,$SendgridCred);
		$tmpDecodedRes = json_decode($ResponseAddRecipientsEmailList);
		if(trim($tmpDecodedRes->error)!=''){
			$ResponseAddRecipientsEmailList = '';
			$sendgrid_send_now_emails['list_name'] = $ListName;
			$sendgrid_send_now_emails['email_name'] = $EmailName;
			$sendgrid_send_now_emails['dealer_id'] = $dealer_id;
			App::import("Model","SendgridSendNowEmail");
			$this->SendgridSendNowEmail = new SendgridSendNowEmail();
			//echo "<pre>";
			//print_r($sendgrid_send_now_emails);
			$this->SendgridSendNowEmail->saveAll($sendgrid_send_now_emails);
			
		}
		//echo "<pre>";
		//print_r($ResponseAddRecipientsEmailList);
		
		//print_r($tmpDecodedRes->error);
		//Schedule email
		$ScheduleData = array();
		$ScheduleData['AutoresponderName'] = $EmailName;
		$ScheduleData['ScheduleAt'] = ''; // send email now
		
		/* Assign Category To Campaign */
		$AssignCategory = array('CategoryName'=>$CategoryName,
								'AutoresponderName'=>$EmailName);
		
		$ResponseAssignCategory = $this->assign_category($AssignCategory,$SendgridCred);
		//echo "<pre>";
		//print_r($ResponseAssignCategory);
		if(trim($tmpDecodedRes->error)==''){
			$ResponseScheduleAutoresponderEmail = $this->schedule_eblast_email($ScheduleData,$SendgridCred);
		}
		//echo "<pre>";
		//print_r($ResponseScheduleAutoresponderEmail);
		if(trim(implode(",",$ContactIds))!=''){
			$UpdateAutoresponderResponse = array('autoresponder_id'=>$autoresponder_id,
								'sender_address_name'=>$SenderAddressName,
								'email_name'=>$EmailName,
								'list_name'=>$ListName,
								'category_name'=>$CategoryName,
								'response_add_sender_address'=>$ResponseAddSenderAddress,
								'response_create_list'=>$ResponseCreateList,
								'response_add_eblast_email'=>$ResponseAddAutoresponderEmail,
								'response_add_recipients_email_list'=>$ResponseAddRecipientsEmailList,
								'response_schedule_eblast_email'=>$ResponseScheduleAutoresponderEmail,
								'response_create_category'=>$ResponseCreateCategory,
								'response_assign_category'=>$ResponseAssignCategory,
								'contact_ids'=>implode(",",$ContactIds),
								'dealer_id'=>$dealer_id
								);
		
			App::import("Model","AutoresponderResponse");
			$this->AutoresponderResponse = new AutoresponderResponse();
			$this->AutoresponderResponse->saveAll($UpdateAutoresponderResponse);
		}
		
	}
	
	
	function AssignListToAutoresponder($dealer_id='all'){
		App::import("Model","AutoresponderResponse");
		$this->AutoresponderResponse = new AutoresponderResponse();
		App::import('Component', 'Utility');
		$Utility = new UtilityComponent(new ComponentCollection());
		
		
		if($dealer_id!='all'){
			$results = $this->AutoresponderResponse->find('all',array('conditions'=>array('user_id'=>$dealer_id,'response_add_recipients_email_list <> '=>'{"message": "success"}')));
		}else{
			$results = $this->AutoresponderResponse->find('all',array('conditions'=>array('response_add_recipients_email_list <> '=>'{"message": "success"}')));
		}
		foreach($results as $details){
			if($details['AutoresponderResponse']['dealer_id']!=''){
				$SendgridCred = $Utility->GetSendgridDetails($details['AutoresponderResponse']['dealer_id']);
				$EmailName 			= $details['AutoresponderResponse']['email_name'];
				$ListName			= $details['AutoresponderResponse']['list_name'];
				$ListData = array();
				$ListData['ListName'] = $ListName;
				$ListData['EblastName'] = $EmailName;
				$ResponseAddRecipientsEmailList = $this->add_recipients_email_list($ListData,$SendgridCred);
				
				$ScheduleData = array();
				$ScheduleData['EblastName'] = $EmailName;
				$user_id = $details['AutoresponderResponse']['user_id'];
				$ScheduleData['ScheduleAt'] = array(); //send now
				$ResponseScheduleEblastEmail = $this->schedule_eblast_email($ScheduleData,$SendgridCred);
				
				$UpdateEblast = array('eblasts_id'=>$details['AutoresponderResponse']['autoresponder_id'],
					'response_add_recipients_email_list'=>$ResponseAddRecipientsEmailList,
					'response_schedule_eblast_email'=>$ResponseScheduleEblastEmail,
				);
				$this->saveAll($UpdateEblast);
			}
				
		}
	}
	
	function RetrySendEmailNow(){
		App::import('Component', 'Utility');
		$Utility = new UtilityComponent(new ComponentCollection());
		App::import("Model","SendgridSendNowEmail");
		$this->SendgridSendNowEmail = new SendgridSendNowEmail();
		$results = $this->SendgridSendNowEmail->find('all');
		foreach($results as $details){
			$SendgridCred = $Utility->GetSendgridDetails($details['SendgridSendNowEmail']['dealer_id']);
			$ListData['ListName'] = $details['SendgridSendNowEmail']['list_name'];
			$ListData['AutoresponderName'] = $details['SendgridSendNowEmail']['email_name'];
			$ResponseAddRecipientsEmailList = $this->add_recipients_email_list($ListData,$SendgridCred);
			$tmpDecodedRes = json_decode($ResponseAddRecipientsEmailList);
			if(trim($tmpDecodedRes->error)==''){
				$ScheduleData['AutoresponderName'] = $details['SendgridSendNowEmail']['email_name'];
				$ScheduleData['ScheduleAt'] = array(); //send now
				$ResponseScheduleAutoresponderEmail = $this->schedule_eblast_email($ScheduleData,$SendgridCred);
				$tmpDecodedRes = json_decode($ResponseScheduleAutoresponderEmail);
				if(trim($tmpDecodedRes->error)==''){
					$this->SendgridSendNowEmail->delete($details['SendgridSendNowEmail']['id']);
				}
			}
		}
	
	}
	

}
?> 