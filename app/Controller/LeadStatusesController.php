<?php
class LeadStatusesController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function index(){
		$this->layout = "default_new";
		
		$lead_statuses = $this->LeadStatus->find('all',array('conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_headers = array();
		foreach($lead_statuses as $lead_status){
			$lead_headers[ $lead_status['LeadStatus']['header'] ] = $lead_status['LeadStatus']['header'];
		}
		$this->set('lead_statuses',$lead_statuses);
		$this->set('lead_headers',$lead_headers);
		
		if ($this->request->is('post')) {
			$postfix=array('Appointment (Open)'=>'-Appt','Inbound Call (Open)'=>'-Call In','Outbound Call (Open)'=>'-Call Out','Sold FollowUp Out (Closed)'=>'-Call Out','Sold FollowUp In (Closed)'=>'-Call In','Dead Lead (Closed)'=>'-Closed','Showroom (Open)'=>'-Floor','Sold Pick-Up (Closed)'=>'-Floor');
			if(array_key_exists($this->request->data['LeadStatus']['header'],$postfix))
			{
				$this->request->data['LeadStatus']['name']=$this->request->data['LeadStatus']['name'].$postfix[$this->request->data['LeadStatus']['header']];
			}
			$this->request->data['LeadStatus']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->LeadStatus->create();
			if ($this->LeadStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save status'), 'alert', array('class' => 'alert-error'));
			}
		}
	}
}