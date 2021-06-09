<?php
class PrintReportController extends AppController {

 	public $uses = array('Contact','User','Events','EventTypes','Events_users');
    public $components = array('RequestHandler');

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
        $inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header in ( 'Dead Lead (Closed)', 'Sold FollowUp In (Closed)','Sold FollowUp Out (Closed)','Sold Pick-Up (Closed)' )    ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        return $statuses;
    }
    


	public function index() {

		$this->layout = "ajax";

		$report_type = $this->request->query['report_type'];
		$user_id = $this->request->query['employee'];
		$dealer_id = $this->Auth->user('dealer_id');
		$userinfo = $this->Auth->user();
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$today = date('m/d/Y g:i A');
		$this->set('today',$today);
		$this->set('userinfo',$userinfo);

		$stats_month = date('m');
		$stats_year = date('Y');


		$start_date = "";
		$end_date = "";
		$range = $this->request->query['range'];
		if($range == 'last_month'){
			$start_date = date('Y-m-01 00:00:00', strtotime('previous month'));
			$end_date = date('Y-m-t 23:59:59', strtotime('previous month'));
		}else if($range == 'this_month'){
			$start_date = date('Y-m-01 00:00:00', strtotime('now'));
			$end_date = date('Y-m-t 23:59:59', strtotime('now'));
		}else if($range == 'this_week'){
			$start_date = date('Y-m-d 00:00:00', strtotime('-2 days', strtotime('monday this week')) );
			$end_date = date('Y-m-d 23:59:59', strtotime('friday this week'));
		}else if($range == 'today'){
			$start_date = date('Y-m-d 00:00:00', strtotime('now'));
			$end_date = date('Y-m-d 23:59:59', strtotime('now'));
		}

		//debug($start_date);
		//debug($end_date);


		if($report_type == 'pending_month_box'){
			
			$user_ids =  $this->_get_user_list_dealer($dealer_id);
			if($user_id != ''){
				$user_ids = $user_id;
			}
			
			$first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01")); 
        	$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

			$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
			$conditions = array(
                'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups, 
                'Contact.company_id' => $dealer_id,
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.sales_step' => "1",
                'Contact.lead_status' => "Open",
                'Contact.user_id' => $user_ids,
            );

            if($start_date != '' && $end_date !='' ){
				$conditions[] = array('Contact.modified >=' =>  $start_date);
				$conditions[] = array('Contact.modified <=' =>  $end_date);
			}else{
				$conditions[] = array('Contact.modified >=' =>  $first_day_this_month);
				$conditions[] = array('Contact.modified <=' =>  $last_day_this_month);
			}








			//debug($conditions);
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
				'Event.title'
			);

			$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))), false);


			$contacts = $this->Contact->find('all', array('fields'=>$fields, 'conditions' => $conditions   ));

			//debug($contacts);

			$this->set('contacts',$contacts);
			$this->set('report_type',"Pending (Month)"); 


		}else if($report_type == 'dormant_48_box'){

			$user_ids =  $this->_get_user_list_dealer($dealer_id);
			if($user_id != ''){
				$user_ids = $user_id;
			}
			
			$c_statuses = $this->_get_closed_statuses();
        	$c_statuses[] = 'Duplicate-Closed';

			$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
			$conditions = array(
                'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $user_ids,  
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' => $c_statuses,
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),

            );

			if($start_date != '' && $end_date !='' ){
				$conditions[] = array('Contact.modified >=' =>  $start_date);
				$conditions[] = array('Contact.modified <=' =>  $end_date);
			}






			//debug($conditions);
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
				'Event.title'
			);

			$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))), false);


			$contacts = $this->Contact->find('all', array('fields'=>$fields, 'conditions' => $conditions   ));

			// debug(count($contacts));
			// debug($conditions);

			$this->set('contacts',$contacts);
			$this->set('report_type',"Dormant (48 Hrs)");



		}else if($report_type == 'overdue_event_box'){
			$user_ids =  $this->_get_user_list_dealer($dealer_id);
			if($user_id != ''){
				$user_ids = $user_id;
			}
			$conditions = array(
                'Contact.user_id' => $user_ids,
                'Contact.company_id' => $dealer_id,
                'Event.start <=' =>  date('Y-m-d H:i:s'),
                'Event.status <>' => array('Completed','Canceled')
            );
			if($start_date != '' && $end_date !='' ){
				$conditions[] = array('Event.start >=' =>  $start_date);
				$conditions[] = array('Event.start <=' =>  $end_date);
			}

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
				'Event.title'
			);
			$events = $this->Event->find('all', array('fields'=>$fields, 'conditions' => $conditions   ));
			$this->set('events',$events);
			$this->set('report_type',"Overdue (Events)");

			//debug( $events );
			
		}else if($report_type == 'today_event_box'){
			$user_ids =  $this->_get_user_list_dealer($dealer_id);
			if($user_id != ''){
				$user_ids = $user_id;
			}

			$conditions = array(
                'Contact.user_id' => $user_ids,
                'Contact.company_id' => $dealer_id,
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>' => array('Completed','Canceled')
            );

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
				'Event.title'
			);
			$events = $this->Event->find('all', array('fields'=>$fields, 'conditions' => $conditions   ));
			$this->set('events',$events);
			$this->set('report_type',"Today (Events)");

			//debug( count($events) );
			
		}






		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('list', array('fields'=>array('SalesStep.id','SalesStep.step') ));
		$this->set('sales_steps', $sales_steps);


		$this->loadModel('ContactStatus');
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name') ));
		$this->set('ContactStatus', $ContactStatus);


	}
	

}