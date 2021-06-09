<?php
ini_set('max_execution_time', 0);
class CronsController extends AppController {
	var $name       	= "Crons";
    var $uses       	= array();
	public $user = '';
	public $pass = '';
	public $purchase_cron_duration  = 3600;
	public $welcome_cron_duration = 3600;
	public function beforeFilter() {
		$SendgridCred = Configure::read('Sendgrid');
		$this->user = $SendgridCred['user'];
		$this->pass = $SendgridCred['pass'];
		parent::beforeFilter();
		//Configure::write('debug', 2);
		$this->Auth->allow('SendDailyRecapReport','all','create_attachment','InsertBounces','InsertUnsubscribes','GetEmailStatistics','InsertSpamReports','AssignListToCompaign','AutorespondersAnniversary','AutorespondersWelcome','AutorespondersPurchase','TempLoadModels');
	    $this->layout=null;
	}

	public function SendDailyRecapReport($dealer_id='') {
		$this->autoRender = false;
		// Check the action is being invoked by the cron dispatcher 
		//if (!defined('CRON_DISPATCHER')) { $this->redirect('/'); exit(); } 
		$this->autoRender = false;
		//no view
		$this->loadModel('User');
		if($dealer_id!=''){
			$dealers = $this->User->query("SELECT DISTINCT dealer_id,dealer FROM users D where D.dealer_id=$dealer_id AND D.`active`=1");	
		}else{
			$dealers = $this->User->query('SELECT DISTINCT dealer_id,dealer FROM users D where D.`active`=1');
		}
		$this->loadModel('RecapCronEmail');
		$bcc = array(1=>"amarjeetkr.developer@gmail.com");
		$AlreadySentIds = array();
		foreach($dealers as $details){
			if(!in_array($details['D']['dealer_id'],$AlreadySentIds) && $details['D']['dealer_id']>0){ // avoid duplicate 
				$recipients=$this->RecapCronEmail->find('list',array('fields'=>'id,email','conditions'=>array('RecapCronEmail.dealer_id'=>$details['D']['dealer_id'])));
				//$recipients = array(1=>"amarjeetkr.developer@gmail.com");
				if(is_array($recipients) && count($recipients)>0){
					$subject = "Daily Recap:  ".date("F j, Y",(time()-86400))." - ".date("F j, Y",(time()-86400))."  ".$details['D']['dealer']." - ".$details['D']['dealer_id'];
					// Call a method from
					$basePath = $_SERVER['DOCUMENT_ROOT']."/app/webroot/files/export/";
					$fileName = $basePath.'DailyRecapReport_'.$details['D']['dealer_id'].'.xls';
					$html = $this->all('','','','','return',$details['D']['dealer_id']); //create attachment
					
					/*
					echo "-------------<br>";
					echo "<pre>";
					print_r($recipients);
					
					echo $html;
					echo "<br>-------------"; 
					echo $subject."<br>";
					*/
					
					
					if($html){
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->reset();
						$email->config('sender');
						$email->viewVars(array('html'=>$html));
						
							$email->template('daily_recap')
								->emailFormat('html')
								->subject($subject)
								->from('sender@dp360crm.com')
								->to($recipients)
								->bcc($bcc);
								try
								{
									ini_set('max_execution_time', 0);
									$email->send();
									$AlreadySentIds[] = $details['D']['dealer_id'];
								}
								catch (Exception $e)
								{
									  //echo "Failed: ".$details['D']['dealer_id']." => ".$e->getMessage();
									  sleep(240);
									  //send again
									  $email->send();
									  //send again
									  //file_get_contents("https://app.dealershipperformancecrm.com/crons/SendDailyRecapReport/".$details['D']['dealer_id']);
								}
	  
							
					}
						
					//echo $basePath.'files/export/DailyRecapReport.xls';
					/*$email->attachments(array('DailyRecapReport.xls' => array(
						'data' => file_get_contents($fileName),
						'mimetype' => 'application/x-msexcel'
					)));
					*/
				
				}
			}
			//files/export/DailyRecapReport.xls
		}

		die;
	}
	
	
	public function all($s_date = null, $e_date = null,$export='',$create_attachment='',$return_html='',$dealerid='') {
		ini_set('max_execution_time', 0);
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}
		//echo "<pre>";
		//echo "$s_date, $e_date,$export,$create_attachment,$dealerid";die;
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);
		
		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		App::import('Controller', 'DailyRecaps'); // mention at top
		$DailyRecaps = new DailyRecapsController;
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open_results,$sold_results,$closed_results,$note_update_results) = $DailyRecaps->GetRecapsData('Staff',$f_date,$t_date,'all',$dealerid);
		$this->set('step_log_results',$step_log_results);
		$this->set('web_lead_results',$web_lead_results);
		$this->set('new_inbound_phone_results',$new_inbound_phone_results);
		$this->set('exiting_outbound_phone_results',$exiting_outbound_phone_results);
		$this->set('email_open_results',$email_open_results);
		$this->set('sold_results',$sold_results);
		$this->set('closed_results',$closed_results);
		$this->set('note_update_results',$note_update_results);
		if(empty($step_log_results) && empty($web_lead_results) && empty($new_inbound_phone_results) && empty($exiting_outbound_phone_results) && empty($email_open_results) && empty($sold_results) && empty($closed_results) && empty($note_update_results) ){
			return false;
		}
		
		
		if($create_attachment){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			//$this->create_attachment($html,$create_attachment);// create_attachment has file name
			if($return_html){
				return $html;
			}
		}elseif($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
		}
		
		if($return_html){
			$this->set('export',true);
			$html = $this->render();
			return $html;
		}
		
	}
	
	public function create_attachment($html,$create_attachment){
		App::import('Component', 'ExcelWriter');
		if(file_exists('files/export/DailyRecapReport.xls')){
			unlink('files/export/DailyRecapReport.xls');
		}
		$excel = new ExcelWriterComponent($create_attachment);
		if($excel==false){
			echo $objExcel->error;die;	
		}else{
			$excel->WriteHTML($html,'/'.time().'');
		}		
	}
	
	
	public function InsertBounces(){
		$this->loadModel('EblastBounce');
		$LastAddedOn = $this->EblastBounce->find('all',array('order'=>'bounced_on DESC','limit'=>1));
		$LastAddedOn = $LastAddedOn[0]['EblastBounce']['bounced_on'];
		$TmpExplode = explode(" ",$LastAddedOn);
		$TmpExplode1 = explode("-",$TmpExplode[0]);
		if($LastAddedOn=='' || ( checkdate($TmpExplode1[1],$TmpExplode1[2],$TmpExplode1[0]))){
			$url = 'https://api.sendgrid.com/api';
			if($LastAddedOn!=''){
				$StartDate = $TmpExplode1[0]."-".$TmpExplode1[1]."-".$TmpExplode1[2];
			}else{
				$StartDate = '';
			}
			$request =  $url."/bounces.get.json?api_user=".$this->user."&api_key=".$this->pass."&date=1&start_date=".$StartDate;
			$response = file_get_contents($request);
			$response = json_decode($response);
			if(is_array($response)){
				foreach($response as $details){
					$details = (array)$details;
					$LeadDetails = $this->Contact->find('first',array('conditions'=>array('Contact.email'=>$details['email']),'fields'=>array('Contact.id')));
					$OptOutData = array('contact_id'=>$LeadDetails['Contact']['id'],
										'bounced_on'=>$details['created'],
										'status_code'=>$details['status'],
										'reason'=>$details['reason'],
										'email'=>$details['email']);
					if($this->EblastBounce->isUnique($OptOutData)){
						$this->EblastBounce->saveAll($OptOutData);
					}
				}
			}	
		}
		die;
	}
	 
	public function InsertUnsubscribes(){
		$this->loadModel('EblastUnsubscribe');
		$LastAddedOn = $this->EblastUnsubscribe->find('all',array('order'=>'unsubscribed_on DESC','limit'=>1));
		$LastAddedOn = $LastAddedOn[0]['EblastUnsubscribe']['unsubscribed_on'];
		$TmpExplode = explode(" ",$LastAddedOn);
		$TmpExplode1 = explode("-",$TmpExplode[0]);
		if($LastAddedOn=='' || ( checkdate($TmpExplode1[1],$TmpExplode1[2],$TmpExplode1[0]))){
			$url = 'https://api.sendgrid.com/api';
			if($LastAddedOn!=''){
				$StartDate = $TmpExplode1[0]."-".$TmpExplode1[1]."-".$TmpExplode1[2];
			}else{
				$StartDate = '';
			}
			$request =  $url."/unsubscribes.get.json?api_user=".$this->user."&api_key=".$this->pass."&date=1&start_date=".$StartDate;
			$response = file_get_contents($request);
			$response = json_decode($response);
			if(is_array($response)){
				foreach($response as $details){
					$details = (array)$details;
					$LeadDetails = $this->Contact->find('first',array('conditions'=>array('Contact.email'=>$details['email']),'fields'=>array('Contact.id')));
					$OptOutData = array('contact_id'=>$LeadDetails['Contact']['id'],
										'unsubscribed_on'=>$details['created'],
										'email'=>$details['email']);
					if($this->EblastUnsubscribe->isUnique($OptOutData)){
						$this->EblastUnsubscribe->saveAll($OptOutData);
					}
				}
			}	
		}
		die;
	}
	
	public function GetEmailStatistics(){
		$url = 'https://api.sendgrid.com/api/stats.get.json?api_user='.$this->user.'&api_key='.$this->pass;
		$response = file_get_contents($url);
		$response = json_decode($response);
		echo "<pre>";
		// print everything out
		print_r($response);
		die;

	}
	
	public function InsertSpamReports(){
		$this->loadModel('EblastSpam');
		$LastAddedOn = $this->EblastSpam->find('all',array('order'=>'spamed_on DESC','limit'=>1));
		$LastAddedOn = $LastAddedOn[0]['EblastSpam']['spamed_on'];
		$TmpExplode = explode(" ",$LastAddedOn);
		$TmpExplode1 = explode("-",$TmpExplode[0]);
		if($LastAddedOn=='' || ( checkdate($TmpExplode1[1],$TmpExplode1[2],$TmpExplode1[0]))){
			$url = 'https://api.sendgrid.com/api';
			if($LastAddedOn!=''){
				$StartDate = $TmpExplode1[0]."-".$TmpExplode1[1]."-".$TmpExplode1[2];
			}else{
				$StartDate = '';
			}
			$request =  $url."/spamreports.get.json?api_user=".$this->user."&api_key=".$this->pass."&date=1&start_date=".$StartDate;
			//echo $request;
			$response = file_get_contents($request);
			$response = json_decode($response);
			//prx($response);
			if(is_array($response)){
				foreach($response as $details){
					$details = (array)$details;
					$LeadDetails = $this->Contact->find('first',array('conditions'=>array('Contact.email'=>$details['email']),'fields'=>array('Contact.id')));
					$OptOutData = array('contact_id'=>$LeadDetails['Contact']['id'],
										'spamed_on'=>$details['created'],
										'email'=>$details['email'],
										'ip'=>$details['ip']);
					if($this->EblastSpam->isUnique($OptOutData)){
						$this->EblastSpam->saveAll($OptOutData);
					}
				}
			}	
		}
		die;
	}
	
	function AssignListToCompaign(){
		$this->loadModel('Eblast');
		$this->Eblast->AssignListToCompaign();
		die;
	}
	
	
	function AutorespondersPurchase(){
		$this->loadModel("Autoresponder");
		$this->loadModel("LeadSold");
		$this->Autoresponder->bindModel(array(
            'belongsTo' => array(
                'AutoresponderRule' => array('foreignKey' => false,
                                    'type'=>'INNER',
                                    'conditions' => array('AutoresponderRule.autoresponder_id = Autoresponder.id','AutoresponderRule.rule_type="Purchase"')
                                )
                            )
                ),
            false
        );
		$autoresponders = $this->Autoresponder->find('all');
		// Group all rules, autorespoder wise
		$final_results = array();
		foreach($autoresponders as $details){
			$final_results[$details['Autoresponder']['id']]['Autoresponder'] = $details['Autoresponder'];
			$final_results[$details['Autoresponder']['id']]['AutoresponderRule'][$details['AutoresponderRule']['id']] = $details['AutoresponderRule'];
		}
		$autoresponders = $final_results;
		foreach($autoresponders as $tmpDetails){
			$template_id = $tmpDetails['Autoresponder']['template_id'];
			if($template_id>0){
				$conditions = array();
				$conditions['company_id'] = $tmpDetails['Autoresponder']['dealer_id'];
				$from = time()-$this->purchase_cron_duration;
				$to = time();
				$conditions['LeadSold.created > '] = date("Y-m-d H:i:s",$from);
				$conditions['LeadSold.created <= '] = date("Y-m-d H:i:s",$to);
				foreach($tmpDetails['AutoresponderRule'] as $details){
					if($details['search_lead_status']!=''){
						$conditions['LeadSold.lead_status'] = $details['search_lead_status'];
					}
					if($details['search_sales_step']!=''){
						$conditions['LeadSold.sales_step'] = $details['search_sales_step'];
					}
					
					if($details['search_source']!=''){
						$conditions['LeadSold.source'] = $details['search_source'];
					}
					
					if($details['search_contact_status_id']!=''){
						$conditions['LeadSold.contact_status_id'] = $details['search_contact_status_id'];
					}
				}
				$data['template_id'] = $template_id;
				$data['Autoresponder']['campaign_name'] = $tmpDetails['Autoresponder']['name'];
				$leads_data = $sold_leads = $this->LeadSold->find('all',array('conditions'=>$conditions));
				$recipients_data = array();
				foreach($leads_data as $key=>$details){
					$details['LeadSold']['id'] = $details['LeadSold']['contact_id'];
					$recipients_data[$key]['Contact'] = $details['LeadSold'];
				}
				$autoresponder_id =  $tmpDetails['Autoresponder']['id'];
				$dealer_id = $tmpDetails['Autoresponder']['dealer_id'];
				if(count($recipients_data)>0  && is_array($recipients_data)){
					$this->Autoresponder->ScheduleAutoresponder($data,$recipients_data,$autoresponder_id,$dealer_id,'Purchase');
				}
			}

		}
		die;
	}
	
	
	
	function AutorespondersWelcome(){
		$this->loadModel("Autoresponder");
		$this->loadModel("LeadSold");
		$this->Autoresponder->bindModel(array(
            'belongsTo' => array(
                'AutoresponderRule' => array('foreignKey' => false,
                                    'type'=>'INNER',
                                    'conditions' => array('AutoresponderRule.autoresponder_id = Autoresponder.id','AutoresponderRule.rule_type="Welcome"')
                                )
                            )
                ),
            false
        );
		$autoresponders = $this->Autoresponder->find('all');
		// Group all rules, autorespoder wise
		$final_results = array();
		foreach($autoresponders as $details){
			$final_results[$details['Autoresponder']['id']]['Autoresponder'] = $details['Autoresponder'];
			$final_results[$details['Autoresponder']['id']]['AutoresponderRule'][$details['AutoresponderRule']['id']] = $details['AutoresponderRule'];
		}
		$autoresponders = $final_results;
		foreach($autoresponders as $tmpDetails){
			$template_id = $tmpDetails['Autoresponder']['template_id'];
			if($template_id>0){
				$conditions = array();
				$conditions['company_id'] = $tmpDetails['Autoresponder']['dealer_id'];
				$from = time()-$this->welcome_cron_duration;
				$to = time();
				$conditions['Contact.created > '] = date("Y-m-d H:i:s",$from);
				$conditions['Contact.created <= '] = date("Y-m-d H:i:s",$to);
				foreach($tmpDetails['AutoresponderRule'] as $details){
					if($details['search_lead_status']!=''){
						$conditions['Contact.lead_status'] = $details['search_lead_status'];
					}
					if($details['search_sales_step']!=''){
						$conditions['Contact.sales_step'] = $details['search_sales_step'];
					}
					
					if($details['search_source']!=''){
						$conditions['Contact.source'] = $details['search_source'];
					}
					
					if($details['search_contact_status_id']!=''){
						$conditions['Contact.contact_status_id'] = $details['search_contact_status_id'];
					}
					
				}
				$data['template_id'] = $template_id;
				$data['Autoresponder']['campaign_name'] = $tmpDetails['Autoresponder']['name'];
				$recipients_data = $this->Contact->find('all',array('conditions'=>$conditions));
				$autoresponder_id =  $tmpDetails['Autoresponder']['id'];
				$dealer_id = $tmpDetails['Autoresponder']['dealer_id'];
				if(count($recipients_data)>0  && is_array($recipients_data)){
					$this->Autoresponder->ScheduleAutoresponder($data,$recipients_data,$autoresponder_id,$dealer_id,'Welcome');
				}
			}

		}
		die;
	}
	
	function AutorespondersAnniversary(){
		$this->loadModel("Autoresponder");
		$this->loadModel("LeadSold");
		$this->Autoresponder->bindModel(array(
            'belongsTo' => array(
                'AutoresponderRule' => array('foreignKey' => false,
                                    'type'=>'INNER',
                                    'conditions' => array('AutoresponderRule.autoresponder_id = Autoresponder.id','AutoresponderRule.rule_type="Anniversary"')
                                )
                            )
                ),
            false
        );
		$autoresponders = $this->Autoresponder->find('all');
		// Group all rules, autorespoder wise
		$final_results = array();
		foreach($autoresponders as $details){
			$final_results[$details['Autoresponder']['id']]['Autoresponder'] = $details['Autoresponder'];
			$final_results[$details['Autoresponder']['id']]['AutoresponderRule'][$details['AutoresponderRule']['id']] = $details['AutoresponderRule'];
		}
		$autoresponders = $final_results;
		foreach($autoresponders as $tmpDetails){
			$template_id = $tmpDetails['Autoresponder']['template_id'];
			if($template_id>0){
				$conditions = array();
				$conditions['company_id'] = $tmpDetails['Autoresponder']['dealer_id'];
				$conditions['DATEDIFF(NOW(), created) > '] = 360;
				$conditions['month(created)'] = date("m");
				$conditions['dayofmonth(created)'] = date("d");
				foreach($tmpDetails['AutoresponderRule'] as $details){
					if($details['search_lead_status']!=''){
						$conditions['LeadSold.lead_status'] = $details['search_lead_status'];
					}
					if($details['search_sales_step']!=''){
						$conditions['LeadSold.sales_step'] = $details['search_sales_step'];
					}
					
					if($details['search_source']!=''){
						$conditions['LeadSold.source'] = $details['search_source'];
					}
					
					if($details['search_contact_status_id']!=''){
						$conditions['LeadSold.contact_status_id'] = $details['search_contact_status_id'];
					}
				}
				$data['template_id'] = $template_id;
				$data['Autoresponder']['campaign_name'] = $tmpDetails['Autoresponder']['name'];
				$leads_data = $this->LeadSold->find('all',array('conditions'=>$conditions));
				$recipients_data = array();
				foreach($leads_data as $key=>$details){
					$details['LeadSold']['id'] = $details['LeadSold']['contact_id'];
					$recipients_data[$key]['Contact'] = $details['LeadSold'];
				}
				$autoresponder_id =  $tmpDetails['Autoresponder']['id'];
				$dealer_id = $tmpDetails['Autoresponder']['dealer_id'];
				if(count($recipients_data)>0 && is_array($recipients_data)){
					$this->Autoresponder->ScheduleAutoresponder($data,$recipients_data,$autoresponder_id,$dealer_id,'Anniversary');
				}
			}

		}
		die;
	}
	
	
	function SendContactDetailsForLastMonth($dealer_id=0,$type='SALES'){
		$this->autoRender = false;
		$this->loadModel('User');
		$this->loadModel('Contact');
		$this->loadModel('LeadSold');
		$this->loadModel('ServiceLeadsDms');
		$this->loadModel('PartLeadsDms');
		$this->loadModel('SendMonthlyLeadContact');
		if($dealer_id>0){
			$dealers = $this->User->query("SELECT DISTINCT dealer_id,dealer FROM users D where D.dealer_id=$dealer_id AND D.`active`=1");	
		}else{
			$dealers = $this->User->query('SELECT DISTINCT dealer_id,dealer FROM users D where D.`active`=1');
		}
		$startTime =  date('Y-m-d', strtotime('first day of last month'));
		$endTime = date('Y-m-d', strtotime('last day of last month'))." 23:59";

		$this->set('s_date',$startTime);
		$this->set('e_date',$endTime);
		App::import('Component', 'Utility'); // mention at top
		$Utility = new UtilityComponent;
		foreach($dealers as $details){
			$recipients=$this->SendMonthlyLeadContact->find('list',array('fields'=>'id,email','conditions'=>array('SendMonthlyLeadContact.dealer_id'=>$details['D']['dealer_id'],'type'=>$type)));
			//$recipients = array(1=>"amarjeetkr.developer@gmail.com");
			if(is_array($recipients) && count($recipients)>0){
				$subject = "Email Leads List - Last Month (".$type.") [ ".date("F j, Y",strtotime($startTime))." - ".date("F j, Y",strtotime($endTime))." ]  for Dealer: ".$details['D']['dealer']." - ".$details['D']['dealer_id'];
				// Call a method from
				$basePath = $_SERVER['DOCUMENT_ROOT']."/app/webroot/files/export/";
				$fileName = $basePath.'SendContactDetails_'.$details['D']['dealer_id'].'.xls';
				$Index = '';
				if($type=='SALES'){
					$Index = 'Contact';
					$this->Contact->recursive = -1;
					$send_contact_details = $this->Contact->find('all',array('conditions'=>array('company_id'=>$details['D']['dealer_id'],'created >= '=>$startTime,'created <= '=>$endTime,'email <> '=>'','NOT'=>array('dnc_status'=>array('no_call_email','not_email'))),'fields'=>array('first_name','last_name','email','created','dnc_status','id','referrer_url','oem_bmw_location')));
				}elseif($type=='SOLD'){
					$Index = 'LeadSold';
					$this->LeadSold->recursive = -1;
					$send_contact_details = $this->LeadSold->find('all',array('conditions'=>array('company_id'=>$details['D']['dealer_id'],'created >= '=>$startTime,'created <= '=>$endTime,'email <> '=>''),'fields'=>array('first_name','last_name','email','created','id')));
				}elseif($type=='SERVICE'){
					$Index = 'ServiceLeadsDms';
					$this->ServiceLeadsDms->recursive = -1;
					$send_contact_details = $this->ServiceLeadsDms->find('all',array('conditions'=>array('dealer_id'=>$details['D']['dealer_id'],'created >= '=>$startTime,'created <= '=>$endTime,'email <> '=>'','NOT'=>array('dnc_status'=>array('no_call_email','not_email'))),'fields'=>array('name','email','created','id')));
				}elseif($type=='PARTS'){
					$Index = 'PartLeadsDms';
					$this->PartLeadsDms->recursive = -1;
					$send_contact_details = $this->PartLeadsDms->find('all',array('conditions'=>array('dealer_id'=>$details['D']['dealer_id'],'created >= '=>$startTime,'created <= '=>$endTime,'email <> '=>'','NOT'=>array('dnc_status'=>array('no_call_email','not_email'))),'fields'=>array('name','email','created','id')));
				}
				$new_send_contact_details = array();
				foreach($send_contact_details as $tmpdetails){
					if($Utility->ValidateEmail($tmpdetails[$Index]['email'])){
						$new_send_contact_details[] = $tmpdetails;
					}
				}
				$this->set("Index",$Index);
				$this->set("type",$type);
				$send_contact_details = $new_send_contact_details;
				if(count($send_contact_details)>0){
					$view = new View($this, false);
					$view->set('bmw',false);
					$view->set('send_contact_details',$send_contact_details);
					$this->set('bmw',false);
					$this->set('send_contact_details',$send_contact_details);
					$html = $this->render();
					$attach_html = $view->element('send_contact_details_for_last_month');
				}else{
					$html = '';
				}
				
				if($html){
					$tmpDate = date("mdY");
					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->reset();
					$email->config('sender');
					$email->viewVars(array('html'=>$html));
					
						$email->template('daily_recap')
							->emailFormat('html')
							->subject($subject)
							->from('sender@dp360crm.com')
							->to($recipients);
							//->bcc($bcc);
							
							$email->attachments(array('LeadContacts'.$tmpDate.'.xls' => array(
								'data' => $attach_html,
								'mimetype' => 'application/x-msexcel'
							)));
						
							try
							{
								ini_set('max_execution_time', 0);
								$email->send();
								$AlreadySentIds[] = $details['D']['dealer_id'];
							}
							catch (Exception $e)
							{
								  //echo "Failed: ".$details['D']['dealer_id']." => ".$e->getMessage();
								  sleep(240);
								  //send again
								  $email->send();
								  //send again
								  //file_get_contents("https://app.dealershipperformancecrm.com/crons/SendDailyRecapReport/".$details['D']['dealer_id']);
							}
							
							
							
							/* BMW */
							$bmw_dealers = array(759,1627,1640);
							if(in_array($details['D']['dealer_id'],$bmw_dealers)){
								$subject = "BMW: Email Leads List - Last Month (".$type.") [ ".date("F j, Y",strtotime($startTime))." - ".date("F j, Y",strtotime($endTime))." ]  for Dealer: ".$details['D']['dealer']." - ".$details['D']['dealer_id'];
								$view = new View($this, false);
								$view->set('bmw',true);
								$view->set('send_contact_details',$send_contact_details);
								$this->set('bmw',true);
								$this->set('send_contact_details',$send_contact_details);
								$html = $this->render();
								$attach_html_bmw = $view->element('send_contact_details_for_last_month');
								$email = new CakeEmail();
								$email->reset();
								$email->config('sender');
								$email->viewVars(array('html'=>$html));
					
								$email->template('daily_recap')
									->emailFormat('html')
									->subject($subject)
									->from('sender@dp360crm.com')
									->to($recipients);
									//->bcc($bcc);
									
									$email->attachments(array('LeadContacts_BMW'.$tmpDate.'.xls' => array(
										'data' => $attach_html_bmw,
										'mimetype' => 'application/x-msexcel'
									)));
										
								
									try
									{
										ini_set('max_execution_time', 0);
										$email->send();
										$AlreadySentIds[] = $details['D']['dealer_id'];
									}
									catch (Exception $e)
									{
										  //echo "Failed: ".$details['D']['dealer_id']." => ".$e->getMessage();
										  sleep(240);
										  //send again
										  $email->send();
										  //send again
										  //file_get_contents("https://app.dealershipperformancecrm.com/crons/SendDailyRecapReport/".$details['D']['dealer_id']);
									}
							
							}
  
						
				}
					
				//echo $basePath.'files/export/DailyRecapReport.xls';
				/*$email->attachments(array('DailyRecapReport.xls' => array(
					'data' => file_get_contents($fileName),
					'mimetype' => 'application/x-msexcel'
				)));
				*/
			
			}
			//files/export/DailyRecapReport.xls
		}
die;
	
	}
	
	
	function TempLoadModels(){
		Configure::write('debug', 2);
		$this->loadModel('Template');
		$this->loadModel('SendgridSendNowEmail');
		$this->loadModel('SendgridStatistic');
		$this->loadModel('SentNewsletter');
		$this->loadModel('Autoresponder');
		$this->loadModel('ScheduledEblast');
		$this->loadModel('SendgridSubuser');
		$this->loadModel('AutoresponderGlobalSetting');
		$this->loadModel('AutoresponderResponse');
		$this->loadModel('AutoresponderRule');
		$this->loadModel('Eblast');
		$this->loadModel('EblastUnsubscribe');
		$this->loadModel('AutoresponderRecipient');
		$this->loadModel('EblastBounce');
		$this->loadModel('EblastSpam');
		$this->loadModel('EblastsSent');
		
		$res = $this->Template->find('all');
		$res = $this->SendgridSendNowEmail->find('all');
		$res = $this->SendgridStatistic->find('all');
		$res = $this->SentNewsletter->find('all');
		$res = $this->Autoresponder->find('all');
		$res = $this->ScheduledEblast->find('all');
		$res = $this->SendgridSubuser->find('all');
		$res = $this->AutoresponderGlobalSetting->find('all');
		$res = $this->AutoresponderResponse->find('all');
		$res = $this->AutoresponderRule->find('all');
		$res = $this->Eblast->find('all');
		echo "<pre>";
		print_r($res);
		$res = $this->EblastUnsubscribe->find('all');
		$res = $this->AutoresponderRecipient->find('all');
		$res = $this->EblastBounce->find('all');
		$res = $this->EblastSpam->find('all');
		$res = $this->EblastsSent->find('all');
		print_r($res);
		die;
	
	}
	
	
}
?>