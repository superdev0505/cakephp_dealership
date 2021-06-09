<?php
 
class Event extends AppModel {
	var $name = 'Event';
	var $displayField = 'title';
	var $validate = array(
		
		'contact_id' => array(
			'notBlankd' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select contact_id'
			),
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter title'
			),
		),
		'details' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter event details'
			),
		),
		'event_type_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select event type'
			),
		),
		'status' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select event status'
			),
		),
		'start' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter start date'
			),
		),
		'end' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter end date'
			),
		)
		
	);
	
	public $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
			'search_title' => array('type'=>'like','field'=>'Event.title'),
			'search_date_from' => array('type'=>'expression','method'=>'searchDate','field'=>'Event.start BETWEEN ? AND ?'),
			
			'search_all' => array('type'=>'query','method'=>'searchDefault')
			
	);
	
	public function searchDefault($data = array()) {
		$filter = $data['search_all'];
		$cond = array(
				'OR' => array(
						$this->alias . '.title LIKE' => '%' . $filter . '%',
						$this->alias . '.details LIKE' => '%' . $filter . '%'
				));
		return $cond;
	}
	
	public function searchDate($data = array()) {
		$date_from = $data['search_date_from'];
		if(!empty($data['search_date_to'])){
			$date_to = $data['search_date_to'];
		} else {
			$date_to = date('Y-m-d H:i:s');
		}
		$cond = array($date_from,$date_to);
		return $cond;
	}
	
	var $belongsTo = array(
		'EventType' => array(
			'className' => 'EventType',
			'foreignKey' => 'event_type_id'
		),
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'contact_id'
		)
	);
	
	/*
	
	public $hasAndBelongsToMany = array(
			'User' =>
			array(
					'className'              => 'User',
					// 'joinTable'              => 'events_users',
					'foreignKey'             => 'event_id',
					'associationForeignKey'  => 'user_id',
					'unique'                 => true,
					'conditions'             => '',
					'fields'                 => '',
					'order'                  => '',
					'limit'                  => '',
					'offset'                 => '',
					'finderQuery'            => '',
					'deleteQuery'            => '',
					'insertQuery'            => ''
			),
			'Contact' =>
			array(
					'className'              => 'Contact',
					//'joinTable'              => 'contacts_events',
					'foreignKey'             => 'event_id',
					'associationForeignKey'  => 'contact_id',
					'unique'                 => true,
					'conditions'             => '',
					'fields'                 => '',
					'order'                  => '',
					'limit'                  => '',
					'offset'                 => '',
					'finderQuery'            => '',
					'deleteQuery'            => '',
					'insertQuery'            => ''
			)
	);
	*/

 	public $ReportUserGroups = array(1,2,3,4,5,6,10,11);

 	private function _get_user_list_dealer($dealer_id){
        App::import('model','User');
        $user = new User;
        $users = $user->find('list', array('conditions'=>array('User.group_id'=>$this->ReportUserGroups, 'User.active'=>1,'User.dealer_id'=>$dealer_id)));
        $user_ids = array_keys($users);

        if(empty($user_ids)){
            $user_ids = array(AuthComponent::user('id'));
        }

        return $user_ids;
    }
     private function _get_closed_statuses(){
        //$inbounds = $this->query("SELECT * FROM lead_statuses WHERE header='Dead Lead (Closed)' OR  header='Sold Deal (Closed)' ");
        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ( 'Dead Lead (Closed)', 'Sold FollowUp In (Closed)','Sold FollowUp Out (Closed)','Sold Pick-Up (Closed)' )    ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        return $statuses;
    }

    public function contact_status_search($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id, $contact_status_id){
    	 if($stat_type == 'Dealer'){

	 		return $conditions = array(
				'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
				'Contact.contact_status_id' => $contact_status_id
        	);

    	 }else{

	 		return $conditions = array(
				'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
				'Contact.contact_status_id' => $contact_status_id,
				'Contact.user_id' => $stat_type
        	);


    	 }
    }

    public function overdue_event_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){
       date_default_timezone_set( AuthComponent::user('zone') );
        if($stat_type == 'Dealer'){
            return array(
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Event.start <=' =>  date('Y-m-d H:i:s'),
                'Event.status <>' => array('Completed','Canceled'),
                array('Event.start >=' =>  $first_day_this_month),
                array('Event.start <=' =>  $last_day_this_month),
            );
        }else{
            return array(
                'Contact.user_id' => $stat_type,
                'Event.start <=' =>  date('Y-m-d H:i:s'),
                'Event.status <>' => array('Completed','Canceled'),
                array('Event.start >=' =>  $first_day_this_month),
                array('Event.start <=' =>  $last_day_this_month),
            );
        }
    }


    public function today_event_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){
        date_default_timezone_set( AuthComponent::user('zone') );

        if($stat_type == 'Dealer'){
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>'=>array('Completed','Canceled'),
            );
        }else{
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.user_id' => $stat_type,
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>'=>array('Completed','Canceled'),
            );
        }
    }




	public function dormant_lead_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){
        date_default_timezone_set($zone);
        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));

        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';
            
        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),  
                array('Contact.modified >=' => $first_day_this_month),
                array('Contact.modified <=' => $last_day_this_month),  
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' => $c_statuses,
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),

            );
        }else{
            return array(
                'User.group_id' => $this->ReportUserGroups,
                'User.active' => 1, 
                array('Contact.modified >=' => $first_day_this_month),
                array('Contact.modified <=' => $last_day_this_month), 
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' =>  $c_statuses,
                'Contact.user_id' => $stat_type,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
        }
    }




	public function pending_lead_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){
        
        //debug($statuses);
        if($stat_type == 'Dealer'){
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.sales_step' => "1",
                'Contact.lead_status' => "Open",
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }else{
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.sales_step' => "1",
                'Contact.lead_status' => "Open",
                'Contact.user_id' => $stat_type,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }
    }



    public function sold_lead_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){

        if($stat_type == 'Dealer'){
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'LeadSold.company_id' => AuthComponent::user('dealer_id'),
                'LeadSold.user_id' => $this->_get_user_list_dealer($dealer_id),
                'LeadSold.modified >=' => $first_day_this_month,
                'LeadSold.modified <=' => $last_day_this_month
            );
        }else{
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'LeadSold.user_id' => $stat_type,
                'LeadSold.company_id' => AuthComponent::user('dealer_id'),
                'LeadSold.modified >=' => $first_day_this_month,
                'LeadSold.modified <=' => $last_day_this_month
            );
        }
    }




    public function closed_lead_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        if($stat_type == 'Dealer'){
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                 'Contact.status' => $statuses,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }else{
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.status' => $statuses,
                'Contact.user_id' => $stat_type,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }
    }



	public function open_lead_count($stat_type, $first_day_this_month, $last_day_this_month, $dealer_id){

        if($stat_type == 'Dealer'){
            return array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.lead_status' => 'Open',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
                'User.active' => 1,
            );
        }else{
            return array(
                'User.active' => 1,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.lead_status' => 'Open',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.user_id' => $stat_type,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
                'User.active' => 1,
            );
        }
    }

































}
?>