<?php
/*
 * Class is used for utilities.
 */

Class UtilityComponent extends Component {
	function AddSubUser($DealerId,$Username,$Password){
		App::import('Model', 'User');
		$User = new User();
		$DealerDetails = $User->find('first',array('conditions'=>array('User.dealer_id'=>$DealerId)));
		$SendgridCred = Configure::read('Sendgrid');
		$tmpExplode = explode(" ",$DealerDetails['User']['dealer']);
		$first_name = $tmpExplode[0];
		unset($tmpExplode[0]);
		$last_name = implode(" ",$tmpExplode);
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'username'        => $Username,
			'password'   => $Password,
			'confirm_password'      => $Password,
			'email'      => $DealerDetails['User']['d_email'],
			'first_name'      => $first_name,
			'last_name'      => $last_name,
			'address'=>	$DealerDetails['User']['d_address'],
			'city'      => $DealerDetails['User']['d_city'],
			'state'	=> $DealerDetails['User']['d_state'],
			'zip'	=> $DealerDetails['User']['d_zip'],
			'country'	=> 'US',
			'phone'	=> $DealerDetails['User']['d_phone'],
			'website'	=> $DealerDetails['User']['d_website'],
			'company'	=> $DealerDetails['User']['d_website']
		  );

		$request =  'https://api.sendgrid.com/apiv2/customer.add.json';
		
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
		$response_decoded = json_decode($response);
		$response_decoded = (array) $response_decoded;
		if($response_decoded['message']=="success"){
			/* Insert in table sendgrid_subusers */
			App::import('Model', 'SendgridSubuser');
			$SendgridSubuser = new SendgridSubuser();
			
			
			/* Assign IP to this user */
			$IPs = $this->GetFreeIPs();
			$IP = $IPs[0]['ip'];
			if($IP!=''){
				$AssignResponse = $this->AssignIPToSubuser($Username,$IP);
			}
			
			$Data = array('dealer_id'=>$DealerId,
						'username'=>$Username,
						'password'=>$Password,
						'response'=>$response,
						'assign_reponse'=>$AssignResponse);
			$SendgridSubuser->saveAll($Data);
			$SubUserId = $SendgridSubuser->getLastInsertID();
			/* Set Notification URL */
			$this->ActivateNotificationApp($Username,$SubUserId);
			$UserDetails['user'] = $Username;
			$UserDetails['pass'] = $Password;
			$UserDetails['id'] = $SubUserId;
			$this->SettingsNotification($UserDetails);
			
		}
		return $response;
		
	
	}
	
	function GetSendgridDetails($DealerId){
		App::import('Model', 'SendgridSubuser');
		$SendgridSubuser = new SendgridSubuser();
		$details = $SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$DealerId)));
		if(trim($details['SendgridSubuser']['username'])!=''){
			return array('user'=>$details['SendgridSubuser']['username'],'pass'=>$details['SendgridSubuser']['password']);
		}else{
			return  Configure::read('Sendgrid');
		}
	}
	
	function GetFreeIPs(){
		$freeiprequest = 'https://api.sendgrid.com/apiv2/customer.ip.json';
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'list'		=> 'all' //free
		);
		$session = curl_init($freeiprequest);
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
		$response_decoded = json_decode($response);
		$response_decoded = $this->toArray($response_decoded);
		return $response_decoded;
	}
	
	function AssignIPToSubuser($user,$ip){
		$request = 'https://api.sendgrid.com/apiv2/customer.sendip.json';
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'task'		=> 'append',
			'set'		=> 'specify',
			'user'		=> $user,
			'ip[]'		=> $ip
		);
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
	
	function toArray($obj)
	{
		if (is_object($obj)) $obj = (array)$obj;
		if (is_array($obj)) {
			$new = array();
			foreach ($obj as $key => $val) {
				$new[$key] = $this->toArray($val);
			}
		} else {
			$new = $obj;
		}

		return $new;
	}
	
	function TowerDataValidation($params,$phone=''){
		$params['license']='KvP4z8IwuY';
		$queryStr = '';
		foreach($params as $key=>$value){
			if($queryStr==''){
				$queryStr =$key."=".rawurlencode($value);
			}else{
				$queryStr .="&".$key."=".rawurlencode($value);
			}
		}
		
		$request = 'http://api10.towerdata.com/person?'.$queryStr;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $request); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($ch);   
		// convert response
		$output = json_decode($output);
		$output = $this->toArray($output);
		if($output['status_code']==10){ // success
			$response['success'] = true;
			if(isset($output['email'])){
				if($params['email']!=''  && $output['email']['ok']!=1){
					$response['success'] = false;
					$response['errors']['Email'] = serialize($output['email']);
				}
			}
			
			if(isset($output['phone'])){
				if($params['phone']!=''  && $output['phone']['ok']!=1){
					$response['success'] = false;
					$response['errors'][$phone] = serialize($output['phone']);
				}
			}
		}else{
			$response['success'] = false;
			$response['message'] = $output['status_desc'];
		}
		
		
		return $response;
		
	
	}
	
	

	function NPAGuideURL($data){
		$request = 'https://services.npauctions.com/session/login';
		$SendgridCred = Configure::read('Sendgrid');
                App::import('Model', 'NpaapiSetting');
		$NpaapiSetting = new NpaapiSetting();
		//$details = $SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$DealerId)));
                
                 $npa = $NpaapiSetting->find('first', array('conditions' => array('NpaapiSetting.dealer_id'=> $data['dealer_id'])));
		/*$params = array(
			'username'  => 'DP360ServiceLogin',
			'password'   => '@12NPADP360'
		);*/
                 
                 $params = array(
			'username'  => $npa['NpaapiSetting']['username'],
			'password'   => $npa['NpaapiSetting']['password']
		);
		
		
		$data_string = json_encode($params);
		$ch = curl_init($request);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
		);                 
		$result = curl_exec($ch);
		$response_decoded = json_decode($result);
		$response_decoded = $this->toArray($response_decoded);
		curl_close($ch);
		//$response_decoded['token'] = '030312AEC1894EAD8A14C189A167996B';
		if(isset($response_decoded['token']) && $response_decoded['token']!='' && $data['VIN']!=''){
			$url = 'https://www.npauctions.com/External/ValueGuide.aspx?VIN='.$data['VIN'].'&y='.$response_decoded['token'];
			$response = array('success'=>true,'url'=>$url);
		}else{
			$response = array('success'=>false,'message'=>'Sorry! there was some issue in generating token.');
		}
		
		return $response;
	}
	
	
	function NPASession(){
		$request = 'https://services.npauctions.com/session/login';
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'username'  => 'DP360ServiceLogin',
			'password'   => '@12NPADP360'
		);
		
		
		$data_string = json_encode($params);
		$ch = curl_init($request);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
		);                 
		$result = curl_exec($ch);
		$response_decoded = json_decode($result);
		$response_decoded = $this->toArray($response_decoded);
		curl_close($ch);
		return $response_decoded['token'];
	}
	
	function NPAVehicles($data){
		$request = 'https://services.npauctions.com/vehicle/GetVehicleInfo/';
		$SendgridCred = Configure::read('Sendgrid');
		$session = $this->NPASession();
		
		if($session!=''){
			$params = array(
				'vin'  => $data['vin'],
				'token'   => $session
			);
			
			
			$data_string = json_encode($params);
			$ch = curl_init($request);                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);                 
			$result = curl_exec($ch);
			$response_decoded = json_decode($result);
			$response_decoded = $this->toArray($response_decoded);
			curl_close($ch);
			return $response_decoded;
		}else{
			return false;
		}
	}
	
	function validatePhone($phone) {
		$numbersOnly = preg_replace("/[^0-9,.]/", "", $phone);
		if($numbersOnly==0 || $numbersOnly=='1111111111' || $numbersOnly=='9999999999' || $numbersOnly=='5555555555'){
			return false;
		}
		$numberOfDigits = strlen($numbersOnly);
		if ($numberOfDigits == 7 or $numberOfDigits == 10) {
			return true;
		} else {
			return false;
		}
	}
	
	function ValidateEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}else{
			return false;
		}
	}
	
	function FormatPhoneNumber($data){
		$data = preg_replace("/[^0-9,.]/", "", $data);
		return "(".substr($data, 0, 3).") ".substr($data, 3, 3).substr($data,6);
	}
	
	
	function SendEmailSendgridAPI($dealer_id,$from,$xsmtpapi,$to,$subject,$html){
		$SendgridCred = $this->GetSendgridDetails($dealer_id);
		$url = 'https://api.sendgrid.com/';
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'x-smtpapi' => json_encode($xsmtpapi),
			'to'        => $to,
			'subject'   => $subject,
			'html'      => $html,
			'from'      => $from,
		  );
		$request =  $url.'api/mail.send.json';

		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		// Tell PHP not to use SSLv3 (instead opting for TLS)
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		curl_close($session);

		// print everything out
		$response = json_decode($response);
	}
	
	function ActivateNotificationApp($SubUser,$SubUserId){
		$SendgridCred = Configure::read('Sendgrid');
		$params = array(
			'api_user'  => $SendgridCred['user'],
			'api_key'   => $SendgridCred['pass'],
			'user'        => $SubUser,
			'task'=>'activate',
			'name'=>'eventnotify'
		  );
		$request =  'https://api.sendgrid.com/apiv2/customer.apps.json';
		
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
		$Data = array('id'=>$SubUserId,
						'activate_app_response'=>$response
					);
		App::import('Model', 'SendgridSubuser');
		$SendgridSubuser = new SendgridSubuser();
		$SendgridSubuser->saveAll($Data);
	}
	
	
	function SettingsNotification($UserDetails){
		$params = array(
			'api_user'  => $UserDetails['user'],
			'api_key'   => $UserDetails['pass'],
			'name'=>'eventnotify',
			'processed'=>1,
			'dropped'=>1,
			'deferred'=>1,
			'delivered'=>1,
			'bounce'=>1,
			'click'=>1,
			'open'=>1,
			'unsubscribe'=>1,
			'group_unsubscribe'=>1,
			'group_resubscribe'=>1,
			'spamreport'=>1,
			'group_unsubscribe'=>1,
			'group_resubscribe'=>1,
			'url'=>'https://handler.dealershipperformancecrm.com/sendgrid_handlers/index',
		  );
		$request =  'https://api.sendgrid.com/api/filter.setup.json';
		
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
		$Data = array('id'=>$UserDetails['id'],
						'app_settings_response'=>$response
					);
		App::import('Model', 'SendgridSubuser');
		$SendgridSubuser = new SendgridSubuser();
		$SendgridSubuser->saveAll($Data);
	}
	
	function ReplaceTemplateCustomTags($replace_data,$current_user,$email_contents){
		$search_for =  array('{sperson}',
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
					
		$replace_with = array($replace_data['sperson'],
						$replace_data['first_name'],
						$replace_data['last_name'],
						$replace_data['email'],
						$replace_data['type'],
						$replace_data['condition'],
						$replace_data['year'],
						$replace_data['make'],
						$replace_data['model'],
						$replace_data['mobile'],
						$replace_data['address'],
						$replace_data['city'],
						$replace_data['state'],
						date('m/d/Y g:i A'),
						$replace_data['zip'],
						$current_user['dealer'],
						$current_user['d_email'],
						$current_user['d_phone'],
						$current_user['d_fax'],
						$current_user['d_address'],
						$current_user['d_city'],
						$current_user['d_state'],
						$current_user['d_zip'],
						$current_user['d_website']
					);
						
						
		
				
		return str_replace($search_for,$replace_with,$email_contents);
		
	
	}
	

}
?>