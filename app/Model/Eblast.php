<?php
class Eblast extends AppModel {
	 public $primaryKey = 'eblasts_id';
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
			'name'		=> $data['EblastName']
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
			'name'   => $data['EblastName'],
			'subject'      => $data['EblastSubject'],
			'text'      => '',
			'html'      => $data['EblastEmailBody']
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
			'name'   => $data['EblastName'] // name passed in add_eblast_email
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
					'name'   => $data['EblastName'],
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
					'name'   => $data['EblastName']
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
	
	function GetScheduleDates($startTime,$endTime,$db=false,$dealer_id){
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
	
	function ConvertToSendGridZone($givenDate,$zone){
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
	
	function ScheduleEblast($data,$Params,$eblast_id,$dealer_id){
		$request_data = array('receipient_conditions'=>$Params['receipient_conditions'],
							'other_data'=>$data
							);
							
		$user_id = $Params['log_uid'];
		$UpdateEblast = array('eblasts_id'=>$eblast_id,
							'log_uid'=>$Params['log_uid'],
							'request_data'=>serialize($request_data),
							'last_scheduled_at'=>$data['Eblast']['date_start'],
							'scheduled'=>0
							);
		$this->saveAll($UpdateEblast);
	}
	
	
	function AssignListToCompaign($dealer_id='all'){
		App::import('Component', 'Utility');
		$Utility = new UtilityComponent(new ComponentCollection());
		$this->useDbConfig = 'default_devbox';
		if($dealer_id!='all'){
			$results = $this->find('all',array('conditions'=>array('user_id'=>$dealer_id,'response_add_recipients_email_list <> '=>'{"message": "success"}')));
		}else{
			$results = $this->find('all',array('conditions'=>array('response_add_recipients_email_list <> '=>'{"message": "success"}')));
		}
		foreach($results as $details){
			$EmailName 			= $details['Eblast']['email_name'];
			$ListName			= $details['Eblast']['list_name'];
			$ListData = array();
			$ListData['ListName'] = $ListName;
			$ListData['EblastName'] = $EmailName;
			$ResponseAddRecipientsEmailList = $this->add_recipients_email_list($ListData,$SendgridCred);
			
			$ScheduleData = array();
			$ScheduleData['EblastName'] = $EmailName;
			$user_id = $details['Eblast']['user_id'];
			$ScheduleData['ScheduleAt'] = $this->GetScheduleDates($details['Eblast']['last_scheduled_at'],$details['Eblast']['last_scheduled_at'],true,$user_id);
			$ResponseScheduleEblastEmail = $this->schedule_eblast_email($ScheduleData,$SendgridCred);
			
			$tmpDecodedRes = json_decode($ResponseScheduleEblastEmail);
			$UpdateEblast = array('eblasts_id'=>$details['Eblast']['eblasts_id'],
				'response_add_recipients_email_list'=>$ResponseAddRecipientsEmailList,
				'response_schedule_eblast_email'=>$ResponseScheduleEblastEmail,
				'last_scheduled_at'=>$ScheduleData['ScheduleAt'][0]
			);
			$this->saveAll($UpdateEblast);
			
			
			if(trim($tmpDecodedRes->error)==''){ /* Insert in scheduled_eblasts table */
				App::import("Model","ScheduledEblast");
				$this->ScheduledEblast = new ScheduledEblast();
				$DataScheduledEblast = array('eblasts_id'=>$details['Eblast']['eblasts_id'],
											'scheduled_at'=>$ScheduleData['ScheduleAt'][0],
											'sendgrid_response'=>$ResponseScheduleEblastEmail);
				$this->ScheduledEblast->saveAll($DataScheduledEblast);
			}
				
		}
	}

}
?> 