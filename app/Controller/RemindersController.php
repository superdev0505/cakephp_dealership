<?php
class RemindersController extends AppController {

	public $uses = array('Contact','Event','DealerName','User');
    public $components = array('RequestHandler');

	public function beforeFilter() {

		parent::beforeFilter();
	}

 	public function daily_reminder() {

 		$userinfo = $this->Auth->User();
    	if($userinfo['username'] != 'master'){
    		$this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
    	}



 		$this->layout = 'default_new';

    	$fields = array(
			'Contact.id',
			'Contact.ref_num',
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
			'Contact.contact_status_id',
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
			'Contact.created',
			'Contact.modified',
			'Contact.user_id',
			'Event.id',
			'Event.start',
			'Event.status',
			'Event.title',

		);
		//$dealer_ids = array('1225'=>'Big Sky Harley-Davidson');
		$dealer_ids = $this->DealerName->find('list', array('fields'=>array('DealerName.dealer_id', 'DealerName.name')));
		//debug( $dids );

		$event_by_users = array();
		foreach($dealer_ids as $dealer_id=>$dealer_name){
			$todays_event_condition =  array(
                'User.active' => 1,
                'Contact.company_id' => $dealer_id,
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>'=>array('Completed','Canceled'),
        	);
        	$this->Event->bindModel(array('belongsTo'=>array('User')));
			$today_events = $this->Event->find('all', array('fields'=>$fields,'conditions' => $todays_event_condition   ));
			foreach($today_events as $today_event){
				$event_by_users[$dealer_id][$today_event['Contact']['user_id']][] = 	$today_event;
			}
		}

		//user information
		$all_user_ids = array();
		foreach($event_by_users as $user_s){
			foreach($user_s as $key=>$value){
				$all_user_ids[] = $key;
			}
		}
		$all_user_details = $this->User->find('all', array('fields'=>array('User.id','User.first_name','User.last_name','User.email','User.dealer_id'), 'conditions'=>array('User.id'=>$all_user_ids)));
		$all_user_details_list = array();
		foreach($all_user_details as $all_user_d){
			$all_user_details_list[ $all_user_d['User']['dealer_id'] ][ $all_user_d['User']['id'] ] = $all_user_d;
		}
		//debug($all_user_details_list);

		$this->set('all_user_details_list', $all_user_details_list);
		$this->set('event_by_users', $event_by_users);
		$this->set('dealer_ids', $dealer_ids);

		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('list', array('fields'=>array('SalesStep.id','SalesStep.step') ));
		$this->set('sales_steps', $sales_steps);

		$this->loadModel('ContactStatus');
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name') ));
		$this->set('ContactStatus', $ContactStatus);

		
		
    }



   


	
}