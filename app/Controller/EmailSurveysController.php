<?php
class EmailSurveysController extends AppController {
	
	public $theme = NULL;
	public $uses = array('BdcLead', 'History','EmailSurvey');   	
	public $helpers =array('Text');
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('surveys','notification','save_survey');
	}
	
	public function surveys($link = '')
	{
		
		$this->loadModel('BdcLead');
		$this->loadModel('EmailSurveyLink');
		$this->loadModel('DealerSurveyQuestion');
		$check_link = $this->EmailSurveyLink->find('first',array('conditions' => array('EmailSurveyLink.access_token' => $link,'status' => 0)));
		if(!empty($check_link)){
			$fields = $this->BdcLead->getFieldsArray();
			$bdc_lead_id = $check_link['EmailSurveyLink']['contact_id'];
			$survey_id = $check_link['EmailSurveyLink']['survey_id'];
			$contact_info=$this->BdcLead->find('first',array('fields' => $fields,'recursive' => -1,'conditions' => array('BdcLead.id' => $bdc_lead_id)));
			$dealer_id = $contact_info['BdcLead']['company_id'];
			$this->DealerSurveyQuestion->bindModel(array('belongsTo' => array('Question')));
			$survey_questions = $this->DealerSurveyQuestion->find('all',array('conditions' => array('DealerSurveyQuestion.dealer_id' => $dealer_id,'DealerSurveyQuestion.survey_id' => $survey_id),'order' =>'DealerSurveyQuestion.q_order'));
			
			$bdc_statuses = $this->_get_bdc_status();
			$this->set(compact('contact_info','bdc_statuses','survey_questions','survey_id'));
		}else{
		 throw new NotFoundException('Invalid Url');
		}
		$this->layout = 'survey_layout';
		$this->view='pre_survey';
		$this->set(compact('link'));
			
	}
	
	private function _get_bdc_status()
{
		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{
			
			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{                                                                                                                
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}
		return $bdc_statuses;
}


	public function send_survey_email($contact_id = null ,$survey_id=null)
	{
		$this->layout = null;
		$this->autoRender = false;
		$response = $this->_sendSurveyMail($contact_id,$survey_id);
		echo $response;
		die;
	}
	
	private function _sendSurveyMail($contact_id = null ,$survey_id=null)
	{
		$response_array = array('status' => 0 ,'msg'=>'Email Not sent');
		$this->loadModel('EmailSurveyLink');
		$this->loadModel('BdcLead');
		$this->loadModel('Survey');
		$zone = $this->Auth->user('zone');
		$user_id = $this->Auth->user('id');
		$check_lead = $this->EmailSurveyLink->find('first',array('conditions'=>array('contact_id' =>$contact_id,'status' => 0)));
		if(empty($check_lead)){
		$survey_info = $this->Survey->findById($survey_id);
		$survey_name = $survey_info['Survey']['name'];
		$fields = array(
				'BdcLead.id',
				'BdcLead.first_name',
				'BdcLead.last_name',
				'BdcLead.company_id',
				'BdcLead.company',
				'BdcLead.email',
				'BdcLead.email_survey',
				'BdcLead.email_survey_attempts'
		);
		$lead_data = $this->BdcLead->find('first',array('fields' => $fields,'recursive' => 0,'conditions' => array('BdcLead.id' => $contact_id)));
		if(!empty($lead_data['BdcLead']['email'])){
		$dealer_id = $lead_data['BdcLead']['company_id'];
		$key_info = array('contact_id' => $contact_id,'dealer_id'=> $dealer_id);
		$dealer = $lead_data['BdcLead']['company'];
		$access_token = $this->_generateToken($key_info);
		$link_data['EmailSurveyLink'] = array('survey_id'=>$survey_id,'contact_id' => $contact_id,'access_token' => $access_token,'user_id' => $user_id ,'dealer_id' => $dealer_id,'email' => $lead_data['BdcLead']['email']);
		$link_url = Router::url(array('controller' =>'email_surveys','action' => 'surveys',$access_token),true);
		$this->loadModel("History");
		$this->loadModel("QueueEmail");
		
		$this->QueueEmail->create_email_queue(
					"send_email_survey",
					$dealer.' - Feedback Survey',
					"sender",
					serialize( array('lead_data'=>$lead_data,'survey_name'=>$survey_name,'link_url' => $link_url)),
					'sender@dp360crm.com',
					'send_email_survey',
					"sender@dp360crm.com",
					serialize(array($lead_data['BdcLead']['email'])),
					serialize(array('andrew@dp360crm.com','reports_main@dp360crm.com'))
				);
		$this->EmailSurveyLink->save($link_data);
		$response_array = array('status' => 1 ,'msg'=>'Email sent to customer with survey form link');
		$history_data = array();
		$history_data['contact_id'] = 		$contact_id;
		$history_data['cond'] = 			'Email sent to customer for '.$survey_name. ' survey by '.$this->Auth->user('full_name');
		$history_data['user_id']=  			$this->Auth->user('id');
		$history_data['status'] = 			"Sent Survey Email";
		$history_data['comment'] = 			$survey_name;
		$history_data['h_type'] = 			"BDC Survey";
		$history_data['sales_step'] = 		"BDC Survey Email";
		$history_data['sperson'] = 			$this->Auth->user('full_name');
		$history_data['modified']=    date('D - M d,Y h:i A');
		//$history_data['event_id'] = 		$bdc_survey_id;
		$history = array(
			'History' => $history_data
		);
		$this->History->create();
		$this->History->save($history);
		$lead_data['BdcLead']['email_survey'] = 1;
		$lead_data['BdcLead']['email_survey_attempts'] += 1;
		$this->BdcLead->save($lead_data);
		$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);			
		}else{
		$response_array = array('status' => 0 ,'msg'=>'Email Not available for the lead so not able to send email');
		}
		}else{
			$response_array = array('status' => 0 ,'msg'=>'Survey Email already sent to this customer');
		}
		return json_encode($response_array);
		
	}

	function _generateToken($key_info)
	{
		$this->loadModel('EmailSurveyLink');
		while(true):
			$key = 	$key_info['dealer_id'].$key_info['contact_id'].time();
			$d=Security::hash($key.rand(100000,999999), 'sha1', true);
			$data=$this->EmailSurveyLink->findByAccessToken($d);
			if(empty($data)):
				return $d;
			else:
				continue;
			endif;
		endwhile;
	}
	
	
	public function save_survey($link=''){
		$this->loadModel('BdcLead');
		$this->loadModel('EmailSurveyLink');
		$this->loadModel('EmailSurveyAnswer');
		$this->loadModel('Survey');
		$check_link = $this->EmailSurveyLink->find('first',array('conditions' => array('EmailSurveyLink.access_token' => $link,'status' => 0)));
		if(!empty($check_link)){
			$contact_id  = $check_link['EmailSurveyLink']['contact_id'];	
		 if($this->request->is('post')){
		// Update email survey link
		$this->EmailSurvey->updateAll(
    array('EmailSurvey.latest' => "'no'"),
    array('EmailSurvey.bdc_lead_id ' => $this->request->data['EmailSurvey']['bdc_lead_id'],'EmailSurvey.survey_id' =>array(2,3,4))
);	 
			 
		 // Update survey email link status
		 $check_link['EmailSurveyLink']['status'] = 1;
		 $this->EmailSurveyLink->save($check_link);
		 $survey_data = $this->Survey->findById($this->request->data['EmailSurvey']['survey_id']);
		 $survey_name = $survey_data['Survey']['name'];
		 //Save  customer response
		 $email_survey['EmailSurvey'] = $this->request->data['EmailSurvey'];
		 $this->EmailSurvey->create();
		 $this->EmailSurvey->save($email_survey);
		 $email_survey_id = $this->EmailSurvey->id;
		
		foreach($this->request->data['EmailSurveyAnswer'] as $key=>&$answer)
		{
			$answer['email_survey_id']= $email_survey_id;
			if(isset($this->request->data[$key]))
			{
				$this->request->data['EmailSurveyAnswer'][$key]['answer']=$this->request->data['EmailSurveyAnswer'][$key]['answer'].','.$this->request->data[$key][1];
			}
		}		
		$this->EmailSurveyAnswer->saveMany($this->request->data['EmailSurveyAnswer']);
		 // Add History and status update logic and send email
		$lead_data = $this->BdcLead->findById($contact_id);
		$dealer_id = $lead_data['BdcLead']['company_id'];
		$this->BdcLead->id = $contact_id;
		$this->BdcLead->saveField('email_survey',2);
		$this->loadModel('BdcStatus');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$dealer_id))));
		$history_data = array();
		$history_data['contact_id'] = 		$contact_id;
		$history_data['cond'] = 			$bdc_status[$this->request->data['EmailSurvey']['c_status']]."- Email Survey";;
		$history_data['user_id']=  			$this->Auth->user('id');
		$history_data['status'] = 			$this->request->data['EmailSurvey']['status'];
		$history_data['comment'] = 			$survey_name;
		$history_data['h_type'] = 			"BDC Survey";
		$history_data['sales_step'] = 		"BDC Survey Email";
		$history_data['sperson'] = 			$lead_data['BdcLead']['sperson'];
		$history_data['modified']=    		date('D - M d,Y h:i A');
		$history_data['event_id'] = 		$email_survey_id;
		$history = array(
			'History' => $history_data
		);
		$this->History->create();
		$this->History->save($history);
		
		$customer_status=$bdc_status[$this->request->data['EmailSurvey']['c_status']];
		$this->EmailSurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$survey_response=$this->EmailSurveyAnswer->find('all',array('conditions'=>array('EmailSurveyAnswer.email_survey_id'=>$email_survey_id)));
		$this->loadModel('SurveyGroup');
		$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$dealer_id,'survey_id'=>$this->request->data['EmailSurvey']['survey_id'])));
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
					"email_survey_response",
					$survey_name.' - Email Survey ('.$customer_status.')',
					"sender",
					serialize( array('lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status' => $customer_status) ),
					'sender@dp360crm.com',
					'email_survey_response',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_main@dp360crm.com'))
				);
		 $this->Session->write('noti_success','success_msg');
		 $this->redirect(array('controller' =>'email_surveys','action'=>'notification'));
		 
		 }		
		}else{
			 throw new NotFoundException('Invalid Url');
			
		}
	
	}
	
	public function notification(){
		$this->layout = null;
		if($this->Session->check('noti_success')){
			$this->Session->delete('noti_success');
		}else{
			 throw new NotFoundException('Invalid Url');			
		}
		
	}
	
	// Survey Reponse logic goes here
	public function survey_response($email_survey_id = null)
	{
		$this->theme = 'Default'; 
		$this->layout = 'ajax';
		$this->loadModel('EmailSurveyAnswer');
		$email_survey = $this->EmailSurvey->findById($email_survey_id);
		$this->EmailSurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$survey_response=$this->EmailSurveyAnswer->find('all',array('conditions'=>array('EmailSurveyAnswer.email_survey_id'=>$email_survey_id)));
		$this->loadModel('BdcStatus');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$customer_status=$bdc_status[$email_survey['EmailSurvey']['c_status']];
		$surveys=array('1'=>'In Bound Survey','2'=>'Next Day Follow-up Survey','3'=>'14 Day Survey','4'=>'CSI 17 Survey','5'=>'Service Survey','6'=>'Safety Survey','11' => 'Parts Survey');
		$survey_name=$surveys[$email_survey['EmailSurvey']['survey_id']];
		$lead_data=$this->BdcLead->findById($email_survey['EmailSurvey']['bdc_lead_id']);
		$this->set(compact('lead_data','survey_name','survey_response','customer_status','email_survey_id'));
		
	}
	
	// Email Survey Response
	public function email_response($email_survey_id = null,$email=null){
		
		$this->loadModel('EmailSurveyAnswer');
		$email_survey = $this->EmailSurvey->findById($email_survey_id);
		$this->EmailSurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$survey_response=$this->EmailSurveyAnswer->find('all',array('conditions'=>array('EmailSurveyAnswer.email_survey_id'=>$email_survey_id)));
		$this->loadModel('BdcStatus');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$customer_status=$bdc_status[$email_survey['EmailSurvey']['c_status']];
		$surveys=array('1'=>'In Bound Survey','2'=>'Next Day Follow-up Survey','3'=>'14 Day Survey','4'=>'CSI 17 Survey','5'=>'Service Survey','6'=>'Safety Survey','11' => 'Parts Survey');
		$survey_name=$surveys[$email_survey['EmailSurvey']['survey_id']];
		$lead_data=$this->BdcLead->findById($email_survey['EmailSurvey']['bdc_lead_id']);
		if(is_null($email))
		{
			$this->loadModel('SurveyGroup');
			$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'),'survey_id'=>$email_survey['EmailSurvey']['survey_id'])));
		}
		else
		{
			$recipients=array($email);
		}
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
					"email_survey_response",
					$survey_name.' - Email Survey ('.$customer_status.')',
					"sender",
					serialize( array('lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status' => $customer_status) ),
					'sender@dp360crm.com',
					'email_survey_response',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_main@dp360crm.com'))
				);
		
		die;
	}

}