<?php
class EventsController extends AppController {
	

	public $uses = array('Event','History');
	 public $components = array('RequestHandler');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function event_list() {
		$this->layout = 'ajax';
		$current_user_id = $this->Auth->User('id');
		$conditions = array(
			'Event.user_id'=>$current_user_id
		);
		if(isset($this->request->query['type']) && $this->request->query['type']  == 'today'){
			$conditions['Event.start >='] =  date('Y-m-d 00:00:00');
			$conditions['Event.start <='] = date('Y-m-d 23:59:59');
		}
		if(isset($this->request->query['type']) && $this->request->query['type']  == 'overdue'){
			$conditions['Event.start <='] =  date('Y-m-d H:i:s');
			$conditions['Event.status <>'] = array('Completed','Canceled');
		}

		$events = $this->Event->find('all', array('conditions' => $conditions,'order'=>'Event.start ASC'));
		$this->set('events', $events);
	}
	
	public function edit($data_id){
	
		$this->layout = "ajax";
		
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');
		
		$modified = date('Y-m-d H:i:s');
		
		if ($this->request->is('post')) {
			
			$this->request->data['Event']['user_id'] = $current_user_id;
			$this->request->data['Event']['start'] = '';
			if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
				$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
			}
			$this->request->data['Event']['end'] = '';
			if($this->request->data['Event']['end_date'] != '' && $this->request->data['Event']['end_time'] != ''){
				$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['end_date']." ".$this->request->data['Event']['end_time']));
			}
			$this->request->data['Event']['modified'] = $modified;
			
			$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $data_id)));
			
			//Save history
			$history_data = array();
			$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
			$history_data['event_id'] = 			$old_data['Event']['id'];
			$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
			$history_data['make'] = 			$old_data['EventType']['name'];
			$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
			$history_data['status'] = 				$old_data['Event']['status'];
			$history_data['comment'] = 				$old_data['Event']['details'];
			$history_data['notes'] = 				$old_data['Event']['title'];
			$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
			$history_data['start_date'] = 			$this->request->data['Event']['start'];
			$history_data['end_date'] = 			$this->request->data['Event']['end'];
			$history_data['h_type'] = 				"Event";
			$history_data['sales_step'] = 				"Event";
			$history_data['sperson'] 	=	$this->request->data['Event']['sperson'];
		
			$history = array(
				'History' => $history_data
			);
			$this->History->save($history);
			
			if($this->Event->save($this->request->data)){
				$this->redirect(array('controller' => 'events', 'action' => 'index'));
			}

		
		}else{
			$eventinfo = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $data_id)));
			$this->request->data = $eventinfo;
			$this->request->data['Event']['first_name'] = $eventinfo['Contact']['first_name'];
			$this->request->data['Event']['last_name'] = $eventinfo['Contact']['last_name'];
			$this->request->data['Event']['email'] = $eventinfo['Contact']['email'];
			$this->request->data['Event']['phone'] = $eventinfo['Contact']['phone'];
			$this->request->data['Event']['mobile'] = $eventinfo['Contact']['mobile'];
			$this->request->data['Event']['contact_id'] = $eventinfo['Contact']['id'];
			
			$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
			$this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
			$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
			$this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
			
			$this->request->data['Event']['details'] = "";
		}
		
		$histories = $this->History->find('all', array('order' => array('History.id DESC'), 'conditions'=>array('History.event_id'=>$data_id)));
		$this->set('histories', $histories);
		
		$this->set('eventTypes', $this->Event->EventType->find('list', array('order'=>"EventType.id ASC")));
		
		
	}
	
	public function index($action_type = null, $data_id = null) {
		
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$this->layout = 'calendar_new';
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');
		$modified = date('Y-m-d H:i:s');

		if($action_type == 'add'){
			$contactinfo = $this->Event->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id' => $data_id)));
			//Set predefined data
			$this->request->data['Event']['first_name'] = $contactinfo['Contact']['first_name'];
			$this->request->data['Event']['last_name'] = $contactinfo['Contact']['last_name'];
			$this->request->data['Event']['email'] = $contactinfo['Contact']['email'];
			$this->request->data['Event']['phone'] = $contactinfo['Contact']['phone'];
			$this->request->data['Event']['mobile'] = $contactinfo['Contact']['mobile'];
			$this->request->data['Event']['contact_id'] = $data_id;
			$this->request->data['Event']['status'] = 'Scheduled';
			
		}else if($action_type == 'edit'){
			$this->request->data['Event']['id'] = $data_id;
		}
		
		if ($this->request->is('post')) {
		
			$this->request->data['Event']['user_id'] = $current_user_id;
			$this->request->data['Event']['start'] = '';
			if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
				$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
			}
			$this->request->data['Event']['end'] = '';
			if($this->request->data['Event']['end_date'] != '' && $this->request->data['Event']['end_time'] != ''){
				$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['end_date']." ".$this->request->data['Event']['end_time']));
			}
			//	debug($this->request->data);
			if($action_type == 'add'){
				$this->Event->create();
				$this->request->data['Event']['created'] = $modified;
				$this->request->data['Event']['modified'] = $modified;
			}else{
				$this->request->data['Event']['modified'] = $modified;
				
				$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $data_id)));
				
				//Save history
				$history_data = array();
				$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
				$history_data['event_id'] = 			$old_data['Event']['id'];
				$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
				$history_data['make'] = 			$old_data['EventType']['name'];
				$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
				$history_data['status'] = 				$old_data['Event']['status'];
				$history_data['comment'] = 				$old_data['Event']['details'];
				$history_data['notes'] = 				$old_data['Event']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
				$history_data['start_date'] = 			$this->request->data['Event']['start'];
				$history_data['end_date'] = 			$this->request->data['Event']['end'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 				"Event";
				$history_data['sperson'] 	=	$this->request->data['Event']['sperson'];
			
				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);
				
				
			}
			if($this->Event->save($this->request->data)){
			
				//Save history for new event
				if($action_type == 'add'){
					$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
					$history_data = array();
					$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
					$history_data['event_id'] = 			$old_data['Event']['id'];
					$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
					$history_data['make'] = 			$old_data['EventType']['name'];
					$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
					$history_data['status'] = 				$old_data['Event']['status'];
					$history_data['comment'] = 				$old_data['Event']['details'];
					$history_data['notes'] = 				$old_data['Event']['title'];
					$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
					$history_data['start_date'] = 			$this->request->data['Event']['start'];
					$history_data['end_date'] = 			$this->request->data['Event']['end'];
					$history_data['h_type'] = 				"Event";
					$history_data['sales_step'] = 				"Event";
					$history_data['sperson'] 	=	$this->request->data['Event']['sperson'];
				
					$history = array(
						'History' => $history_data
					);
					$this->History->save($history);
				}
			
				$this->Session->setFlash(__('Event saved'), 'alert');
				$this->redirect(array('controller' => 'events', 'action' => 'index'));
			}else{
				$this->Session->setFlash(__('Event not saved'), 'alert');
			}
		}else{
			if($action_type == 'edit'){
				
				$eventinfo = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $data_id)));
				$this->request->data = $eventinfo;
				$this->request->data['Event']['first_name'] = $eventinfo['Contact']['first_name'];
				$this->request->data['Event']['last_name'] = $eventinfo['Contact']['last_name'];
				$this->request->data['Event']['email'] = $eventinfo['Contact']['email'];
				$this->request->data['Event']['phone'] = $eventinfo['Contact']['phone'];
				$this->request->data['Event']['mobile'] = $eventinfo['Contact']['mobile'];
				$this->request->data['Event']['contact_id'] = $eventinfo['Contact']['id'];
				
				$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
				$this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
				
				$this->request->data['Event']['details'] = "";
				
				$histories = $this->History->find('all', array('order' => array('History.id DESC'), 'conditions'=>array('History.event_id'=>$data_id)));
				$this->set('histories', $histories);
				
			}
		}
		$this->set('eventTypes', $this->Event->EventType->find('list', array('order'=>"EventType.id ASC")));
		
		$this->set('events', array());
		if(!isset($this->request->params['pass'][0])){ 
		
			$conditions = array(
				'Event.user_id'=>$current_user_id
			);
			if(isset($this->request->query['type']) && $this->request->query['type']  == 'today'){
			
				if(isset($this->request->query['stat_type']) && $this->request->query['stat_type']  != 'Dealer'){
					$conditions['Event.user_id'] = $this->request->query['stat_type'];
					$conditions['Event.start >='] =  date('Y-m-d 00:00:00');
					$conditions['Event.start <='] = date('Y-m-d 23:59:59');
					//$conditions['Event.status <>'] = array('Completed','Canceled');
				}else{
					$this->loadModel('User');
					$users = $this->User->find('list', array('conditions'=>array('User.dealer_id'=>$dealer_id)));
					$user_ids = array_keys($users);
					$conditions['Event.user_id'] = $user_ids;
					$conditions['Event.start >='] =  date('Y-m-d 00:00:00');
					$conditions['Event.start <='] = date('Y-m-d 23:59:59');
					//$conditions['Event.status <>'] = array('Completed','Canceled');
				}
			}
			if(isset($this->request->query['type']) && $this->request->query['type']  == 'overdue'){
				if(isset($this->request->query['stat_type']) && $this->request->query['stat_type']  != 'Dealer'){
					$conditions['Event.user_id'] = $this->request->query['stat_type'];
					$conditions['Event.start <='] =  date('Y-m-d H:i:s');
					$conditions['Event.status <>'] = array('Completed','Canceled');
				}else{
					$this->loadModel('User');
					$users = $this->User->find('list', array('conditions'=>array( 'User.dealer_id'=>$dealer_id)));
					$user_ids = array_keys($users);
					$conditions['Event.user_id'] = $user_ids;
					$conditions['Event.start <='] =  date('Y-m-d H:i:s');
					$conditions['Event.status <>'] = array('Completed','Canceled');
				}
			}
			$conditions['Contact.company_id'] = $this->Auth->user('dealer_id');
			
			/*
			$events = $this->Event->find('all', array('conditions' => $conditions,'order'=>'Event.modified DESC'));
			$this->set('events', $events);
			
			$Not_Completed_count = 0;
			$completed_count = 0;
			$canceled_count = 0;
			foreach($events as $event1){ 
				if($event1['Event']['status'] != "Completed" && $event1['Event']['status'] != "Canceled"){
					$Not_Completed_count ++;
				}
				if($event1['Event']['status'] == "Completed"){
					$completed_count ++;
				}
				if($event1['Event']['status'] == "Canceled"){
					$canceled_count ++;
				}
			}
			$this->set('Not_Completed_count', $Not_Completed_count);
			$this->set('completed_count', $completed_count);
			$this->set('canceled_count', $canceled_count);
			*/
			
			
			
		}

		$this->loadModel("User");
		$employees = $this->User->find('list', array('order'=>"User.first_name", 'recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
		$this->set('employees', $employees);
		
	}
	function update() {
        $this->autoRender = FALSE;
        $vars = $this->params['url'];
        $this->Event->id = $vars['id'];
        $this->Event->saveField('start', $vars['start']);
        $this->Event->saveField('end', $vars['end']);
        if (isset($vars['allDay'])) {
            $this->Event->saveField('all_day', $vars['allday']);
        }
    }

	private function _get_user_list_dealer(){
		$dealer_id = $this->Auth->User('dealer_id');
		$this->loadModel('User');
		$users = $this->User->find('list', array('conditions'=>array('User.active'=>1,'User.dealer_id'=>$dealer_id)));
		$user_ids = array_keys($users);
		return $user_ids;
	}
	
	 function feed($feed_type = null, $stat_type = null) 
	 {
        $vars = $this->params['url'];
        //debug( $vars );
        $current_user_id = $this->Auth->User('id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$dealer_id = $this->Auth->User('dealer_id');
		$group_id = $this->Auth->User('group_id');
		

		$user_ids = $this->_get_user_list_dealer();
		$user_selection = "all";
		$sperson_id = $this->params['url']['sperson'];
		if(!empty($sperson_id)){
			$user_ids = $this->params['url']['sperson'];
			$user_selection = $this->params['url']['sperson'];
			
		}

		$this->loadModel('DealerSetting');
		$restrict_events_employee = $this->DealerSetting->get_settings('restrict_events_employee', $dealer_id );

		//ovre due events
        $conditions = array(
        	'recursive' => 0,
        	'group' => array("date_format(`Event`.`start`, '%Y-%m-%d')"),
        	'fields' => array('count(*) num_event', "date_format(Event.start, '%Y-%m-%d') start_date", "Event.id", "Event.start", "Event.end"),
        	'conditions' => array(
				'Event.start < ' => date("Y-m-d H:i:s"),
				'Contact.user_id'=>$user_ids,
				'Event.status <>'=>array('Completed','Canceled'),
				'UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end'],
        	//	'Contact.lead_status <>'=>'Closed',
        		'Contact.status <>'=>'Duplicate-Closed',
        		'Contact.company_id'=>$dealer_id
        	)
        );

        if( $group_id == '3' && $restrict_events_employee == 'On' ){
			$conditions['conditions']['Contact.user_id'] = $current_user_id;
			$user_selection = $current_user_id;
		}

		$events = $this->Event->find('all', $conditions);
		//debug( $events );
        $data = array();
        foreach ($events as $event) {
			$allday = true;
            $event['Event']['start'] = date("Y-m-d\TH:i:s",strtotime($event['Event']['start']));
            $event['Event']['end'] = date("Y-m-d\TH:i:s",strtotime($event['Event']['end']));
			$data[] = array(
                'id' => $event['Event']['id'],
                'title' => "Overdue (".$event['0']['num_event'].")",
                'user_id'=>$user_selection,
                'start' => $event['Event']['start'],
                'end' => $event['Event']['end'],
                'allDay' => $allday,
				'type' => 'overdue',
				'lead_url' => '/contacts/leads_main?quick_lead_search=overdue_events&users='.$user_selection.'&stat_type=Dealer&start='.$event['0']['start_date'],
				'color' => 'red',
                'details' => $event['Event']['details'],
                'toolTip' =>  'Double click to see entire list' 
			   );
        }
        
	 	//normal due events
        $conditions = array(
        	'recursive' => 0,
        	'group' => array("date_format(`Event`.`start`, '%Y-%m-%d')"),
        	'fields' => array(
        		'count(*) num_event',
        		 "date_format(Event.start, '%Y-%m-%d') start_date", "Event.id", "Event.start", "Event.end","Contact.id" ,'Contact.status','Contact.lead_status' ),
        	'conditions' => array(
				'Event.start >= ' => date("Y-m-d H:i:s"),
				'Contact.user_id'=>$user_ids,
				'Event.status <>'=>array('Completed','Canceled'),
				'UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end'],
        	//	'Contact.lead_status <>'=>'Closed',
        		'Contact.status <>'=>'Duplicate-Closed',
        		'Contact.company_id'=>$dealer_id
        
        	)
        );
        if( $group_id == '3' && $restrict_events_employee == 'On' ){
			$conditions['conditions']['Contact.user_id'] = $current_user_id;
			$user_selection = $current_user_id;
		}
		//debug($conditions);

		$events = $this->Event->find('all', $conditions);
		//debug( $events );
        foreach ($events as $event) {
			$allday = true;
            $event['Event']['start'] = date("Y-m-d\TH:i:s",strtotime($event['Event']['start']));
            $event['Event']['end'] = date("Y-m-d\TH:i:s",strtotime($event['Event']['end']));
			$data[] = array(
                'id' => $event['Event']['id'],
                'title' => "Today (".$event['0']['num_event'].")",
                'user_id'=>$user_selection,
                'start' => $event['Event']['start'],
                'end' => $event['Event']['end'],
				'lead_url' => '/contacts/leads_main?quick_lead_search=events&users='.$user_selection.'&stat_type=Dealer&start='.$event['0']['start_date'],
				'type' => 'normal',
                'allDay' => $allday,
				'color' => "#3695D5",
                'details' => $event['Event']['details'],
                'toolTip' =>  'Double click to see entire list'  
			   );
        }
        
		//debug($data); 
		
      	$this->set("json", json_encode($data));
       	$this->layout = "ajax";
    }
	
	public function lead_appointment($contact_id=null)
	{
		$this->_bdcLeadAppt($contact_id);
	}
	public function bdcapp_lead_appointment($contact_id=null)
	{
		$this->view = 'lead_appointment';
		$this->_bdcLeadAppt($contact_id);
	}
	
	private function _bdcLeadAppt($contact_id=null)
	{
		
		$zone = $this->Auth->user('zone');
		$ridenow_group = array(5000,263);
		date_default_timezone_set($zone);
		$fields = array(
					'Contact.id',
					'Contact.first_name',
					'Contact.full_name',
					'Contact.contact_status_id',
					'Contact.last_name',
					'Contact.type',
					'Contact.condition',
					'Contact.company_id',
					'Contact.company',
					'Contact.user_id',
					'Contact.year',
					'Contact.make',
					'Contact.model',
					'Contact.mobile',
					'Contact.phone',
					'Contact.email',
					'Contact.lead_status',
					'Contact.status',
					'Contact.sperson',
					'Contact.notes',
					'Contact.dnc_status',
					'Contact.sales_step',
					'Contact.work_number',
					'Contact.modified',
					'Contact.created'				
			
		);
		$this->loadModel('Contact');
		$contactinfo = $this->Contact->find('first', array('fields' => $fields,'recursive'=>-1,'conditions'=>array('Contact.id' => $contact_id)));
		$dealer_id = $contactinfo['Contact']['company_id']; 
		if($this->request->is('post')){
			$this->Event->unbindModel(array('belongsTo'=>array('Contact')));
			$open_event = $this->Event->find('first',array('conditions' => array('Event.contact_id' => $contact_id,'NOT' => array('Event.Status' => array('Completed','Canceled')))));
			if(!empty($open_event)){
				
				$this->Event->recursive = 0;
				$this->Event->updateAll(array('Event.status' => '"Canceled"'),array('Event.contact_id' => $contact_id,'NOT' => array('Event.Status' => array('Completed','Canceled'))));
				$open_event['Event']['status'] = 'Canceled';
				//$this->Event->Save($open_event);
				$history_data['contact_id'] = 			$open_event['Event']['contact_id'];
				$history_data['event_id'] = 			$open_event['Event']['id'];
				$history_data['customer_name'] = 		$open_event['Event']['first_name']." ".$open_event['Event']['last_name'];
				$history_data['make'] = 			$open_event['EventType']['name'];
				$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($open_event['Event']['start']));
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 				$open_event['Event']['status'];
				$history_data['comment'] = 				'Event canceled by BDC CSR '.$this->Auth->user('full_name');
				$history_data['notes'] = 				$open_event['Event']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($open_event['Event']['modified']));
				$history_data['start_date'] = 			$open_event['Event']['start'];
				$history_data['end_date'] = 			$open_event['Event']['end'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 				"Event";
				$history_data['sperson'] 	=	$this->request->data['Event']['sperson'];
			
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);
			}
			
			$this->request->data['Event']['dealer_id'] = $dealer_id;
			$this->request->data['Event']['first_name'] = $contactinfo['Contact']['first_name'];
			$this->request->data['Event']['last_name'] = $contactinfo['Contact']['last_name'];
			$this->request->data['Event']['email'] = $contactinfo['Contact']['email'];
			$this->request->data['Event']['phone'] = $contactinfo['Contact']['phone'];
			$this->request->data['Event']['mobile'] = $contactinfo['Contact']['mobile'];
			$this->request->data['Event']['contact_id'] = $contact_id;
			$this->request->data['Event']['status'] = 'Scheduled';
			$this->request->data['Event']['event_type_id'] = 21;
			$this->request->data['Event']['user_id'] = $contactinfo['Contact']['user_id'];
			$this->request->data['Event']['sperson']=$contactinfo['Contact']['sperson'];
			$this->request->data['Event']['logged_user_id'] = $this->Auth->user('id');
			$this->request->data['Event']['start'] = '';
			if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
				$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime('+15 minutes',strtotime($this->request->data['Event']['start'])));
			}
			$this->Event->create();
			if($this->Event->save($this->request->data)){
				
				$this->Event->unbindModel(array('belongsTo'=>array('Contact')));	
				//Save history for new event
				$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
				
				$history_data = array();
				$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
				$history_data['event_id'] = 			$old_data['Event']['id'];
				$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
				$history_data['make'] = 			'BDC Lead SET TO: Appointment ';
				$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 				$old_data['Event']['status'];
				$history_data['comment'] = 				'BDC Appoinment Set by '.$this->Auth->user('full_name');
				$history_data['notes'] = 				$old_data['Event']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
				$history_data['start_date'] = 			$this->request->data['Event']['start'];
				$history_data['end_date'] = 			$this->request->data['Event']['end'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 				"Event";
				$history_data['sperson'] 	=	$this->request->data['Event']['sperson'];
			
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);
				if(in_array($dealer_id,$ridenow_group)){
					$this->loadModel('SurveyGroup');				
					$recipients = $this->SurveyGroup->find('list',array('fields' =>'id,email','conditions'=>array('dealer_id' => $dealer_id,'survey_id' => 0)));
					$this->loadModel('User');
					$sales_person = $this->User->find('first',array('fields' => array('User.id','User.email'),'conditions' => array('User.id' => $contactinfo['Contact']['user_id'])));
					if(!empty($sales_person['User']['email']))
					{
						$recipients[] = $sales_person['User']['email'];
					}
					$subject_line = 'BDC Appointment -#'.$contactinfo['Contact']['id'].' '.$contactinfo['Contact']['full_name'];
					
						/**  
					* Add email queue
					* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
					* template = "", $from = "", $to = "", $bcc = "")
					**/
					$this->loadModel("QueueEmail");
					$this->QueueEmail->create_email_queue(
						"bdc_appointment_alert",
						$subject_line,
						"sender",
						serialize( array('csr'=>$this->Auth->User('full_name'),'lead_data'=>$contactinfo,'event_data' => $this->request->data) ),
						'sender@dp360crm.com',
						'bdc_appointment_alert',
						"sender@dp360crm.com", 
						serialize($recipients),
						serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com'))
					);
				
				}
				$this->requestAction('manage_cache/clear_contact_cache/'.$old_data['Event']['contact_id']);	
				echo $old_data['Event']['id'];
				die();
			}else
			{
				die('failure');
			}
			
		
		}
	
	}
	
	public function customer_showed($event_id = null)
	{
		$this->layout =null;
		$this->autoRender = false;
		$this->loadModel('History');
		$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $event_id)));
		if(!empty($old_data)){
			
			$this->Event->id = $event_id;
			$this->Event->saveField('customer_showed',1);
			$history_data = array();
				$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
				$history_data['event_id'] = 			$old_data['Event']['id'];
				$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['make'] = 			'Customer showed for '.$old_data['EventType']['name'];
				$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
				$history_data['status'] = 				$old_data['Event']['status'];
				$history_data['comment'] = 				'Customer  showed for appoinment '.$old_data['Event']['details'];
				$history_data['notes'] = 				'Customer  showed for appoinment '.$old_data['Event']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A');
				$history_data['start_date'] = 			$old_data['Event']['start'];
				$history_data['end_date'] = 			$old_data['Event']['end'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 				"Event";
				$history_data['sperson'] 	=	$old_data['Event']['sperson'];
			
				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);
				$this->requestAction('manage_cache/clear_contact_cache/'.$old_data['Event']['contact_id']);	
		}
				die;
		
	}
	
	
}