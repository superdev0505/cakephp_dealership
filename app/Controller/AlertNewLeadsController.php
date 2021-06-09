<?php
class AlertNewLeadsController extends AppController {

	public $uses = array('AlertNewLead', 'Contact');
    public $components = array('RequestHandler');

	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function report(){

		$this->layout = "default_new";

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

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
			'Contact.phone',
			'Contact.work_number',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.sperson',
			'Contact.owner',
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'AlertNewLead.id',
			'AlertNewLead.created',
			'User.first_name',
			'User.last_name',
			'User.id',
			'User.group_id',

		);

		$this->AlertNewLead->bindModel(array('belongsTo'=>array('User','Contact')), false);
		$this->paginate = array(
			'conditions' => array('AlertNewLead.dealer_id'=>$dealer_id),
			'order'=>'AlertNewLead.created DESC',
			'limit' => 50,
			'fields' => $fields
		);
		$alertNewLeads = $this->Paginate('AlertNewLead');
		$this->set('alertNewLeads', $alertNewLeads);

		//debug($alertNewLeads);
		$this->set('alertNewLeads', $alertNewLeads);

	}
	
	public function update_score_sources()
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->loadModel('ScoreSource');
		$this->loadModel('LeadSource');
		$all_lead_sources = $this->LeadSource->find('all');
		foreach($all_lead_sources as $l_source)
		{
			$check_record = $this->ScoreSource->find('first',array('conditions' => array('name' => $l_source['LeadSource']['name'],'dealer_id' => array(0,$l_source['LeadSource']['dealer_id']))));
			if(empty($check_record))
			{
				unset($l_source['LeadSource']['id']);
				$save_source = $l_source['LeadSource'];
				$this->ScoreSource->Create();
				$this->ScoreSource->save($save_source);
				
			}
		}
	}


}