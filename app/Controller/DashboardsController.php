<?php

App::uses('CakeTime', 'Utility');

class DashboardsController extends AppController {

    public $components = array('Paginator');

    public $uses = array('Contact', 'Deal', 'Event', 'UserEmail');
	public $helpers=array('Number');
	public $ReportUserGroups = array(1,2,3,4,5,6,10,11);

    public $CUSTOM_STEP_MAP = array();
    public $public_multi_deal_higher_step = 1;

	 public function beforeFilter() {
        parent::beforeFilter();
 	 }


	public function get_dealer_steps(){

		$this->loadModel('ContactStatus');
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		return  $sales_step_options_popup;
	}


	private function _dashboard_stat($contact_status_id, $stat_id, $stat_type, $stats_month){
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$dealer_id = $this->Auth->User('dealer_id');

		$this->Contact->bindModel(array('belongsTo'=>array('User')));

		//Web Leads pending/not pending count
		$cnd1 = $this->Contact->just_arrived_condition($contact_status_id,$zone,$stat_id,$stat_type);
		$this->Contact->bindModel(array('belongsTo'=>array('User')));
		$just_arrived = $this->Contact->find('count', array('conditions'=>$cnd1));
		//debug($cnd1);

		$worked_today = $this->Contact->find('count', array('conditions'=>$this->Contact->worked_today_condition($contact_status_id,$zone,$stat_id,$stat_type)));
		$still_pending = $this->Contact->find('count', array('conditions'=>$this->Contact->still_pending_condition($contact_status_id,$zone,$stat_id,$stat_type)));

		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))));

		$dormant_48hrs = $this->Contact->find('count', array('conditions'=>$this->Contact->dormant_48hrs_condition($contact_status_id,$zone,$stat_id,$stat_type,$stats_month)));
		return array('just_arrived'=>$just_arrived,'worked_today'=>$worked_today, 'still_pending' => $still_pending, 'dormant_48hrs' => $dormant_48hrs );
	}

	private function _email_appointment_stats($contact_status_id,$stat_id,$stat_type){
		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');

		$email_sent = $this->Contact->email_sent($contact_status_id,$zone,$stat_id,$stat_type);

		$appointment = $this->Contact->appointment($contact_status_id,$zone,$stat_id,$stat_type);

		$closed_today = $this->Contact->find('count', array('conditions'=>$this->Contact->closed_today($contact_status_id,$zone,$stat_id,$stat_type)));

		#$sold_today = $this->Contact->find('count', array('conditions'=>$this->Contact->sold_today($contact_status_id,$zone,$stat_id,$stat_type)));
		$this->loadModel('LeadSold');
		$this->LeadSold->bindModel(array('belongsTo'=>array('User')));

		$sold_today = $this->LeadSold->find('count', array('conditions' => $this->Contact->sold_today($contact_status_id, $zone, $stat_id, $stat_type )  ));
		$this->set('$sold_today', $sold_today);


		$note_update = $this->Contact->note_update($contact_status_id,$zone,$stat_id,$stat_type);

		$sms_text = $this->Contact->sms_text($contact_status_id,$zone,$stat_id,$stat_type);
		//debug(count($email_sent));
		return array('sms_text' => count($sms_text), 'closed_today'=>$closed_today, 'sold_today'=>$sold_today, 'note_update' => count($note_update), 'email_sent'=>count($email_sent),'appointment'=>count($appointment));
	}

	public function inactive_user_list($emps, $first_day_this_month,  $last_day_this_month){
		$this->loadModel("User");

		$active_list = array();
		$in_active_list = array();
		foreach($emps as $emp){
			if($emp['User']['active'] == 1){
				$active_list[ $emp['User']['id'] ] = $emp['User']['first_name']. " " . $emp['User']['last_name'];
			}else{
				$in_active_list[ $emp['User']['id'] ] = $emp['User']['first_name']. " " . $emp['User']['last_name'];
			}

		}

		// if(!empty( $in_active_list )){
		// 	$inactive_ids = array_keys($in_active_list);
		// 	$this->loadModel("Contact");
		// 	$inactive_usr_list = $this->Contact->find("list", array(
		// 		'fields' => array('Contact.user_id', 'Contact.sperson'),
		// 		'recursive'=>-1,
		// 		'group'=>array("Contact.user_id"),
		// 		'conditions'=>array(
		// 			'Contact.user_id' => $inactive_ids,
		// 			'Contact.modified >=' => $first_day_this_month,
		// 			'Contact.modified <=' => $last_day_this_month
		// 		)
		// 	));
		// 	$active_list = Set::merge($active_list, $inactive_usr_list);
		// }
		// asort($active_list);
		return $active_list;
	}



	public function main($stats_month = null, $stats_year = null) {

		//debug( $this->Auth->user('pwd') );

		$hide_deaelrnames = $this->Contact->query("select * from hide_dealernames limit 1");
		if(!empty($hide_deaelrnames)){
			$hide_deaelrname = $hide_deaelrnames['0']['hide_dealernames']['dealer_id'];
			$this->set('hide_deaelrname', $hide_deaelrname);
		}else{
			$this->set('hide_deaelrname', "");
		}


		/*pwd change notification*/
		$through_pwd_change_notification = false;
		if($this->Auth->user('pwd') == 'access123!'){
			$through_pwd_change_notification = true;
			if($this->Session->check('cng_pwd_not') && $this->Session->read('cng_pwd_not') == "no"){
				$through_pwd_change_notification = false;
			}else{
				$through_pwd_change_notification = true;
				$this->Session->write('cng_pwd_not', "no");
			}
		}
		$this->set('through_pwd_change_notification', $through_pwd_change_notification);


		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$this->helpers[] = "Time";
		$this->helpers[] = 'Text';

		$dealer_id = $this->Auth->User('dealer_id');

		$this->layout='default_new';
		$current_user_id = $this->Auth->User('id');
		$this->set('current_user_id',$current_user_id);
        $group_id = $this->Auth->user('group_id');
		//debug( $group_id );



		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}

		if($stats_year == null){
			$stats_year = date('Y');
			if( $this->Session->check("stats_year") ){
				$stats_year = $this->Session->read("stats_year");
			}
		}else{
			$this->Session->write("stats_year", $stats_year);
		}



		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->set('stats_year', $stats_year);

		//Stat type selection (Dealer/user)
		$stat_type = "Dealer";
		$stat_id = $dealer_id;


		$this->loadModel('DealerSetting');
		$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $dealer_id);


		$mgr_groups = array('2','4','6','9','7','12','13');
		$userinfo = $this->Auth->User();
		$team_members_floor = array();
		$team_members_floor_text = "";
		$dealer_teams = array();
		$user_id_team = "";
		if($team_breakdown_settings == 'On' && in_array($userinfo['group_id'], $mgr_groups)  ){
			$this->loadModel("ManageTeam");
			$ManageTeams = $this->ManageTeam->find('all',array(
				'conditions'=>array(
					'ManageTeam.dealer_id'=> $userinfo['dealer_id']
				)
			));
			foreach($ManageTeams as $manageteam){
				$dealer_teams[ "team_".$manageteam['ManageTeam']['id']  ] = $manageteam['ManageTeam']['team_name']." (Team)";
				$user_id_team[ $manageteam['ManageTeam']['floor_manager_id'] ] = $manageteam;
 			}
			asort($dealer_teams);
		}

		$dealer_user = "Dealer";
		$stats_day_month = 'day';
		$selected_stats =  "";
		if(isset($this->request->query['stat_user'])){

			if (strpos($this->request->query['stat_user'], 'team_') !== false) {
				//Team Selection
    			$team_str = explode("_", $this->request->query['stat_user']);
    			$team_id = $team_str[1];

    			$selected_team = $this->ManageTeam->find('first',array(
					'conditions'=>array(
						'ManageTeam.id'=> $team_id,
						'ManageTeam.dealer_id'=> $userinfo['dealer_id']
					)
				));
				if($selected_team['ManageTeam']['team_members'] != ''){
					$selected_team['ManageTeam']['team_members'] .= ",".$userinfo['id'];
					$team_members_floor = explode(",", $selected_team['ManageTeam']['team_members']);
					$team_members_floor_text = implode(",", $team_members_floor);
				}
				$selected_stats = $this->request->query['stat_user'];
			}else if($this->request->query['stat_user'] != 'Dealer_day'  && $this->request->query['stat_user'] != 'Dealer_month'  ){
				//Dealership Day/Month
				$new_lead_user = 5;
				$stat_type = "User";
				$stat_id = $this->request->query['stat_user'];
				$dealer_user = $stat_id;
				$selected_stats = $stat_id;
			}else{
				// User Stat
				$selected_stats = $this->request->query['stat_user'];
				if($selected_stats == 'Dealer_month'){
					$stats_day_month = 'month';
				}else if($selected_stats == 'Dealer_day'){
                    //debug("fired");
					$stats_day_month = 'day';
				}
			}
            //debug($this->request->query['stat_user']);
			$this->Session->write("stat_user", $this->request->query['stat_user']);

		}else{

			if($this->Session->check('stat_user')){
				$su = $this->Session->read('stat_user');
				$selected_stats = $su;
				// debug($selected_stats);

				if (strpos($su, 'team_') !== false) {

					$team_str = explode("_", $su);
    				$team_id = $team_str[1];
					$selected_team = $this->ManageTeam->find('first',array(
					'conditions'=>array(
						'ManageTeam.id'=> $team_id,
						'ManageTeam.dealer_id'=> $userinfo['dealer_id']
					)
					));
					if($selected_team['ManageTeam']['team_members'] != ''){
						$selected_team['ManageTeam']['team_members'] .= ",".$selected_team['ManageTeam']['floor_manager_id'];
						$team_members_floor = explode(",", $selected_team['ManageTeam']['team_members']);
						$team_members_floor_text = implode(",", $team_members_floor);
					}


				}else if($su != 'Dealer_day' && $su != 'Dealer_month'){
					$new_lead_user = 5;
					$stat_type = "User";
					$stat_id = $su;
					$dealer_user = $stat_id;
				}
			}else{

				if($group_id == 3){
						$stat_type = "User";
						$new_lead_user = 5;
						$stat_id = $current_user_id;
						$dealer_user = $stat_id;
						$selected_stats = $stat_id;
						$this->Session->write("stat_user", $current_user_id);
				}

				//Select My Team by default
				if(!empty( $user_id_team )){
					if(isset( $user_id_team[ $userinfo['id'] ] )){
						$myteam = $user_id_team[ $userinfo['id'] ];
						$selected_stats = "team_".$myteam['ManageTeam']['id'];

						if($myteam['ManageTeam']['team_members'] != ''){
							$myteam['ManageTeam']['team_members'] .= ",".$myteam['ManageTeam']['floor_manager_id'];
							$team_members_floor = explode(",", $myteam['ManageTeam']['team_members']);
							$team_members_floor_text = implode(",", $team_members_floor);
						}

						$this->Session->write("stat_user", $selected_stats);
					}
				}

			}


		}

//debug($this->Session->read('stat_user'));
		$this->set('team_members_floor', $team_members_floor);
		$this->set('team_members_floor_text', $team_members_floor_text);

		$stat_label_ar = array('day'=>'Today','month'=>'Month');
		$this->set('stat_label', $stat_label_ar[$stats_day_month]);


		$this->set('selected_stats', $selected_stats);
		$this->set('new_lead_user', "");
		$this->set('dealer_user', $dealer_user); //used in the search page link

		//user emails
		$emails = $this->UserEmail->find('all',array(
			'conditions'=>array(
				'UserEmail.receiver_id'=>$current_user_id,
				'UserEmail.email_type' => 'contact'
			),
			'order'=>array('UserEmail.received_date'=>'DESC'),
			'limit'=>50
		));
		$this->set('emails',$emails);
		//debug($emails);

		//Status options
		$this->loadModel("LeadStatus");
		$leadStatuses = $this->LeadStatus->find('all',array('conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options = array();
		$lead_status_options_popup = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']]["contact_status_search_". str_replace("/", "----", $leadStatus['LeadStatus']['name'])  ] = $leadStatus['LeadStatus']['name'];
			$lead_status_options_popup[$leadStatus['LeadStatus']['header']][ $leadStatus['LeadStatus']['name'] ] = $leadStatus['LeadStatus']['name'];
		}

		$this->set('lead_status_options', $lead_status_options);
		$this->set('lead_status_options_popup', $lead_status_options_popup);

		$this->loadModel('Category');
		$d_type = $this->Auth->User('d_type');
		$this->set('d_type', $d_type);


		$d_type_cnd = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );

		$user_dtype = $this->Auth->user('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$user_dtype),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		//debug( $d_types );

		$d_type_options = array();
		foreach($d_types as $d_type){
			$d_type_options["vehicle_type_search_".  str_replace("/", "----", $d_type['Category']['body_type']) ] = $d_type['Category']['body_type'];
		}
		$this->set('d_type_options', $d_type_options);



		//last 10 leads
		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.condition',
			'Contact.year',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
			'Contact.mobile',
			'Contact.phone',
			'Contact.work_number',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.lead_status',
			'Contact.sales_step',
			'Contact.status',
			'Contact.chk_duplicate',
			'Contact.sperson',
			'Contact.notes'
		);

		if($stat_type == 'Dealer'){
			// debug($team_members_floor);
			if(empty($team_members_floor)){
				$conditions = array(
					'Contact.company_id' => $dealer_id,
					'Contact.status <>' => 'Duplicate-Closed',
					'Contact.modified >=' => $first_day_this_month,
					'Contact.modified <=' => $last_day_this_month
				);
			}else{
				$conditions = array(
					'Contact.company_id' => $dealer_id,
					'Contact.user_id' => $team_members_floor,
					'Contact.status <>' => 'Duplicate-Closed',
					'Contact.modified >=' => $first_day_this_month,
					'Contact.modified <=' => $last_day_this_month
				);
			}

		}else{
			$conditions = array(
        		'Contact.company_id' => $dealer_id,
				'Contact.user_id' => $stat_id,
				'Contact.status <>' => 'Duplicate-Closed',
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
			);
		}
		$this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		$contacts = $this->Contact->find('all', array('fields'=>$fields,'conditions' => $conditions, 'limit' => 10, 'order' => array('Contact.modified' => 'DESC')));
		$this->set('contacts', $contacts);

		//Stat options
		$stat_month_name = date("M",strtotime( date("Y")."-$stats_month-01" ));

		$stat_options = array();
		if( $group_id == 3){

			$show_all_leads = $this->requestAction("dealer_settings/get_settings/show-all-leads");
			// debug($show_all_leads);
			if($show_all_leads == 'On'){
				//$stat_options['Dealer_day'] = 'Dealership (Day)';
				$stat_options['Dealer_month'] = 'Dealership (Month)';
			}
			$stat_options[$current_user_id] = "MyStats ($stat_month_name)";
			unset($stat_options['Dealer_day']);

		}else{

			$this->loadModel('User');
			//$stat_options['Dealer_day'] = 'Dealership (Day)';

			//Add Teams to Stat options
			if(!empty($dealer_teams)){
				$stat_options = Set::merge($stat_options, $dealer_teams);
			}

			//Add Team Members or employees to Stat options
			if(!empty($team_members_floor)){
				$emps = $this->User->find('all', array('fields'=>array('id', 'first_name', 'last_name', 'active'), 'recursive'=>-1,'order'=>array("User.first_name"),'conditions'=>array('User.id'=>  $team_members_floor ,  'User.dealer_id'=>$dealer_id)));
				$emps = $this->inactive_user_list($emps, $first_day_this_month, $last_day_this_month);

			}else{
				$emps = $this->User->find('all', array('fields'=>array('id', 'first_name', 'last_name', 'active'), 'recursive'=>-1,'order'=>array("User.first_name"),'conditions'=>array( 'User.dealer_id'=>$dealer_id, 'User.group_id' => array(2,3,4,5,7,10,11,12))));
				$emps = $this->inactive_user_list($emps, $first_day_this_month, $last_day_this_month);
			}

			$stat_options = Set::merge($stat_options, $emps);

		}
		$this->set('stat_options', $stat_options);



		$sales_steps = $this->get_dealer_steps();
		$sales_step_options = array();
		$sales_step_options_popup = array();
		foreach($sales_steps as $key=>$value){
			$sales_step_options[ "salesstep_search_". $key  ] =  htmlspecialchars_decode($value);
			$sales_step_options_popup [ $key ] =  $value;
		}
		$this->set('sales_step_options', $sales_step_options);
		$this->set('sales_step_options_popup', $sales_step_options_popup);



		//< vehicle inputs start >
		$this->loadModel('ContactStatus');
		$this->set('PriceRangeOptions', $this->ContactStatus->PriceRangeOptions());
		$this->set('PriceRangeNonRvOptions', $this->ContactStatus->PriceRangeNonRvOptions());
		$this->set('FloorPlansOptions', $this->ContactStatus->FloorPlansOptions);
		$this->set('LengthOptions', $this->ContactStatus->LengthOptions);
		$this->set('WeightOptions', $this->ContactStatus->WeightOptions);
		$this->set('SleepsOptions', $this->ContactStatus->SleepsOptions);
		$this->set('FuelTypeOptions', $this->ContactStatus->FuelTypeOptions);
		//</ vehicle inputs end >

		$d_type_options_popup = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
		if($this->Auth->User('dealer_id') == '20020'){
			$d_type_options_popup['Branch Inventory'] = 'Branch Inventory';
		}
		asort( $d_type_options_popup );
		$this->set('d_type_options_popup', $d_type_options_popup);


   		$smtp_settings = $this->UserEmail->get_setting("smtp",$current_user_id);
   		$this->set("smtp_settings", $smtp_settings);

   		$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
		$this->set('email_settings', $email_settings);

		$location_transfer = $this->requestAction("dealer_settings/get_settings/location_transfer");
		$this->set('location_transfer', $location_transfer);

		$start_search = $this->requestAction("dealer_settings/get_settings/start_search");
		$this->set('start_search', $start_search);

		$this->loadModel("User");
		$employees = $this->User->find('list', array('order'=>"User.first_name", 'recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
		$this->set('employees', $employees);


		$shopper_notification_group = $this->DealerSetting->get_settings('shopper_notification_group', $dealer_id);
		$allow_shopper = 'yes';
		if(!empty($shopper_notification_group)){
			if( in_array($group_id, $shopper_notification_group) ){
				$allow_shopper = 'yes';
			}else{
				$allow_shopper = 'no';
			}
		}else{
			$allow_shopper = 'yes';
		}
		$this->set('allow_shopper', $allow_shopper);
		//debug($allow_shopper);

		$d_type_options_search = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('vehicle_selection_type'=>"Showroom" )));
		$this->set('d_type_options_search', $d_type_options_search);

		// debug($team_members_floor );

	}

    public function index() {

        $current_user_id = $this->Auth->User('id');
        $group_id = $this->Auth->user('group_id');
        /*
         * Please Note:
         * Session $company_id = $this->Auth->user('dealer_id')
         */
        /*============ FETCH CONTACTS ======================*/
        if ($group_id == 2) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
                'Contact.modified = Contact.created',
                'Contact.contact_status_id IN(5,6)'
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified = Contact.created',
                'Contact.contact_status_id IN(5,6)'
            );
        } elseif ($group_id == 3) {
            $conditions = array(
                'Contact.user_id' => $current_user_id,
                'Contact.modified = Contact.created',
                'Contact.contact_status_id IN(5,6)'
            );
        }
        //fetch it through pagination
        $contacts_paginator = clone $this->Paginator;
        $event_pagination = $this->Paginator;

        $contacts_paginator->settings = array(
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array(
                'Contact.sperson' => 'DESC',
            )
        );
        $contacts = $contacts_paginator->paginate("Contact");

        /*============ FETCH DEALS ======================*/
        $conditions2 = array();
        if ($group_id == 2) {
            $conditions2 = array(
                'Deal.user_id' => $current_user_id
            );
        } elseif ($group_id == 1) {
            $conditions2 = array(
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions2 = array(
                'Deal.user_id' => $current_user_id
            );
        }
        $deals = $this->Deal->find('all', array(
            'limit' => 20,
            'conditions' => $conditions2));

        /*============ FETCH EVENTS ======================*/
        $conditions3 = array();
        if ($group_id == 2) {
            $conditions3 = array(
                'Event.status <>' => "Completed",
                'User.dealer_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions3 = array(
                'Event.status <>' => "Completed"
            );
        } elseif ($group_id == 3) {
            $conditions3 = array(
                'Event.user_id' => $current_user_id,
                'Event.status <>' => "Completed",
            );
        }

        /* start of event*/
        $event_pagination->settings = array(
            'joins' => array(
                array(
                    'table' => 'event_types',
                    'alias' => 'EventTypes',
                    'type' => 'INNER',
                    'conditions' => array(
                        'EventTypes.id = Event.event_type_id'
                    )
                ),
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'INNER',
                    'conditions' => array(
                        'User.id = Event.user_id'
                    )
                )
            ),
            'order' => 'start DESC', 'limit' => 10,
            'fields' => 'Event.*, EventTypes.name',
            'conditions' => $conditions3);

        $events = $event_pagination->paginate("Event");

        $this->set('contacts', $contacts);
        $this->set('deals', $deals);
        $this->set('events', $events);

        /*============== format the result set **********/
        $i = 6;
        $j = 1;
        $end_date = strtotime('+7 day');

        for ($i = 14; $i >= 0; $i--) {

            $day = date('Y-m-d', strtotime('-' . $i . ' day', $end_date));

            $temp = $this->Deal->find('all', array(
                'fields' => array('SUM(Deal.amount) as total'),
                'conditions' => array(
                    'DealStatus.name' => 'process',
                    CakeTime::dayAsSql($day, 'date')
                )
            ));

            if ($temp[0][0]['total']) {
                $deals_data[0][] = (int) $temp[0][0]['total'];
            } else {
                $deals_data[0][] = 0;
            }

            $temp = $this->Deal->find('all', array(
                'fields' => array('SUM(Deal.amount) as total'),
                'conditions' => array(
                    'DealStatus.name' => 'accepted',
                    CakeTime::dayAsSql($day, 'date')
                )
            ));

            if ($temp[0][0]['total']) {
                $deals_data[1][] = (int) $temp[0][0]['total'];
            } else {
                $deals_data[1][] = 0;
            }

            $temp = $this->Deal->find('all', array(
                'fields' => array('SUM(Deal.amount) as total'),
                'conditions' => array(
                    'DealStatus.name' => 'rejected',
                    CakeTime::dayAsSql($day, 'date')
                )
            ));

            if ($temp[0][0]['total']) {
                $deals_data[2][] = (int) $temp[0][0]['total'];
            } else {
                $deals_data[2][] = 0;
            }

            $tick_day = date('M d', strtotime($day));
            $ticks[] = array($j++, $tick_day);
        }
        $this->set('deal_graph_data', $deals_data);
        $this->set('ticks', $ticks);
    }


	public function crmreport_reports($stats_month = null,$show_group=null)
	{

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);


		$this->layout='crmreport_bdcsurvey_dashboard';

		/*$this->layout = 'default_pipeline_reports_medical';*/
		//$this->view='sales_pipeline_reports';
		$stats_year = date('Y');
		$dealer_id=$this->Auth->user('dealer_id');
		if(is_numeric($show_group)&& !is_null($show_group))
		{
			$dealer_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime($stat_year."-".$stats_month."-01"));
		$month_name = date('F', strtotime($stat_year."-".$stats_month."-01"));

		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->set('group',$show_group);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);
		$this->loadModel('ContactStatus');
		//$dealer_id = $this->Auth->user('dealer_id');

		if(!empty($this->request->query['start_date']) && !empty($this->request->query['end_date']) ){

			$s_date = $this->request->query['start_date'].' 00:00:00';
			$e_date = $this->request->query['end_date'].' 23:59:59';



		}else{
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
			$month = date('Y-m', strtotime($stat_year."-".$stats_month."-01"));
			$month_name = date('F', strtotime($stat_year."-".$stats_month."-01"));
			$this->set('month_name',$month_name);

			$s_date = date('Y-m-01 00:00:00', strtotime($month."-01"));
        	$e_date  = date('Y-m-t 23:59:59', strtotime($month."-01"));

        	$this->set('s_date',$s_date);
			$this->set('e_date',$e_date);
		}



		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->CUSTOM_STEP_MAP = $custom_step_map;

		$deal_registers = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 0, 'all_user',"active",$show_group);

		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map',$custom_step_map);

		$this->set('deal_registers',$deal_registers[0]);
		$deal_registers_showroom = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 7, 'all_user',"active",$show_group);
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		$deal_registers_web =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 5, 'all_user',"active",$show_group);
		$this->set('deal_registers_web',$deal_registers_web[0]);
		$deal_registers_mobile =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 12, 'all_user',"active",$show_group);
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		$deal_registers_phone =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 6, 'all_user',"active",$show_group);
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		$this->loadModel('LeadSold');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			//$this->loadModel('DealerName');
			//$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			//$dealer_id=implode(',',$dealer_id);


		}

		$date_array = array('s_date' => $s_date,'e_date' => $e_date);

		$total_earnings=$this->LeadSold->find('all',array('fields'=>'SUM(LeadSold.unit_value) as Totat_earning','conditions'=>array('LeadSold.company_id'=>$dealer_id,"LeadSold.created >="=>$s_date,"LeadSold.created <=" => $e_date)));
		$this->set('total_earnings',$total_earnings[0][0]['Totat_earning']);
		$per_day_solds=$this->LeadSold->find('all',array('fields'=>'DAY(LeadSold.created) as s_day,Count(LeadSold.id) as solds','conditions'=>array('LeadSold.company_id'=>$dealer_id,"LeadSold.created >="=>$s_date,"LeadSold.created <=" => $e_date),'group'=>'DAY(LeadSold.created)'));
		$day_solds=array();
		foreach ($per_day_solds as $d_solds){
			$day_solds[$d_solds[0]['s_day']]=$d_solds[0]['solds'];
		}
		//pr($day_solds);
		$day_leads=array();
		$this->loadModel('Contact');
		$per_day_leads=$this->Contact->find('all',array('fields'=>'DAY(Contact.created) as s_day,Count(Contact.id) as solds','conditions'=>array('Contact.company_id'=>$dealer_id,"Contact.created >="=>$s_date,"Contact.created <=" => $e_date),'group'=>'DAY(Contact.created)'));
		foreach ($per_day_leads as $d_solds){
			$day_leads[$d_solds[0]['s_day']]=$d_solds[0]['solds'];
		}
		$this->set(compact('day_solds','day_leads'));
		$zone=$this->Auth->User('zone');
		$stat_type='Dealer';


		$condition1 = array(
            'User.active' => 1,
            'User.group_id' => $this->Contact->ReportUserGroups,
            'Contact.lead_status' => 'Open',
            'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
            'User.active' => 1,
        );
		$condition1['Contact.company_id']=$dealer_id;
		$condition1['Contact.modified >='] = $s_date;
		$condition1['Contact.modified <='] = $e_date;
		$open_lead_count = $this->Contact->find('count', array('conditions' => $condition1   ));
		$this->set('open_lead_count', $open_lead_count);


		$inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
		$condition2 = array(
            'User.active' => 1,
            'User.group_id' => $this->Contact->ReportUserGroups,
             'Contact.status' => $statuses,
        );
		$condition2['Contact.company_id']=$dealer_id;
		$condition2['Contact.modified >='] = $s_date;
		$condition2['Contact.modified <='] = $e_date;
		$closed_lead_count = $this->Contact->find('count', array('conditions' => $condition2  ));
		$this->set('closed_lead_count', $closed_lead_count);

        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
        $c_statuses = $this->Contact->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';
		$condition4 = array(
            'User.group_id' => $this->Contact->ReportUserGroups,
            // 'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
            'Contact.modified >=' => $s_date,
            'Contact.modified <=' => $datetime_48hours_back,
            'Contact.lead_status' => "Open",
            'Contact.status <>' => $c_statuses,
            'Contact.sales_step <>' => '10',
            'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
        );
		$condition4['Contact.company_id']=$dealer_id;
		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))));


		$dormant_lead_count = $this->Contact->find('count', array('conditions' =>  $condition4   ));
		$this->set('dormant_lead_count', $dormant_lead_count);
		$this->Contact->recursive=-1;
		$lead_type_value=$this->Contact->find('all',array('fields'=>'SUM(Contact.unit_value) as total_value,Contact.contact_status_id','conditions'=>array('Contact.company_id'=>$dealer_id,"Contact.modified >="=>$s_date,"Contact.modified <=" => $e_date),'group'=>'Contact.contact_status_id'));
		$lead_combine_value=array();
		foreach($lead_type_value as $type_value){
			$lead_combine_value[$type_value['Contact']['contact_status_id']]['all']=$type_value[0]['total_value'];
		}

		$leadsold_type_value=$this->LeadSold->find('all',array('fields'=>'SUM(LeadSold.unit_value) as total_value,LeadSold.contact_status_id','conditions'=>array('LeadSold.company_id'=>$dealer_id,"LeadSold.created >="=>$s_date,"LeadSold.created <=" => $e_date),'group'=>'LeadSold.contact_status_id'));
		foreach($leadsold_type_value as $type_value){
			$lead_combine_value[$type_value['LeadSold']['contact_status_id']]['sold']=$type_value[0]['total_value'];
		}
		//$this->Contact->recursive=-1;
		unset($condition1['User.active']);
		unset($condition1['User.group_id']);
		$lead_open_value=$this->Contact->find('all',array('fields'=>'SUM(Contact.unit_value) as total_value,Contact.contact_status_id','conditions'=>$condition1,'group'=>'Contact.contact_status_id'));
		foreach($lead_open_value as $type_value){
			$lead_combine_value[$type_value['Contact']['contact_status_id']]['open']=$type_value[0]['total_value'];
		}
		//$this->Contact->recursive=-1;
		unset($condition2['User.active']);
		unset($condition2['User.group_id']);
		$lead_closed_value=$this->Contact->find('all',array('fields'=>'SUM(Contact.unit_value) as total_value,Contact.contact_status_id','conditions'=>$condition2,'group'=>'Contact.contact_status_id'));
		foreach($lead_closed_value as $type_value){
			$lead_combine_value[$type_value['Contact']['contact_status_id']]['closed']=$type_value[0]['total_value'];
		}
		unset($condition4['User.active']);
		unset($condition4['User.group_id']);
		unset($condition4['OR']);
		$lead_dormant_value=$this->Contact->find('all',array('fields'=>'SUM(Contact.unit_value) as total_value,Contact.contact_status_id','conditions'=>$condition4,'group'=>'Contact.contact_status_id'));
		foreach($lead_dormant_value as $type_value){
			$lead_combine_value[$type_value['Contact']['contact_status_id']]['dormant']=$type_value[0]['total_value'];
		}

		$contact_statuses=array(5,6,7,12);
		$condition3 = array(
			'User.active' => 1,
			'User.group_id' => $this->Contact->ReportUserGroups,
            'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
            'Contact.sales_step' => "1",
            'Contact.lead_status' => "Open",
        );

		$condition3['Contact.company_id']=$dealer_id;
		$condition3['Contact.modified >='] = $s_date;
		$condition3['Contact.modified <='] = $e_date;
		$this->Contact->recursive = 0;
		$this->Contact->bindModel(array('belongsTo'=>array('User')));
		$pending_lead_count = $this->Contact->find('count', array( 'conditions' =>  $condition3   ));


		$this->set('pending_lead_count', $pending_lead_count);
		$lead_pending_value=$this->Contact->find('all',array('fields'=>'SUM(Contact.unit_value) as total_value,Contact.contact_status_id','conditions'=>$condition3,'group'=>'Contact.contact_status_id'));
		foreach($lead_pending_value as $type_value){
			$lead_combine_value[$type_value['Contact']['contact_status_id']]['pending']=$type_value[0]['total_value'];
		}
		$this->set('lead_combine_value', $lead_combine_value);
		$last_4month_earning=$this->LeadSold->find('all',array('fields'=>'SUM(LeadSold.unit_value) as earning,DATE_FORMAT(`LeadSold`.`created`,"%Y-%m") as stat_month','conditions'=>array('LeadSold.company_id'=>$dealer_id,"DATE_FORMAT(`LeadSold`.`created`,'%Y-%m') <="=> date($month,strtotime('-1 month',strtotime($month)))),'group'=>'DATE_FORMAT(`LeadSold`.`created`,"%Y-%m")','order'=>'DATE_FORMAT(`LeadSold`.`created`,"%Y-%m") desc','limit'=>4));
		$last4_month_stat=array();
		foreach($last_4month_earning as $m_stat)
		{
			$last4_month_stat[]=empty($m_stat[0]['earning'])?0:$m_stat[0]['earning'];
		}
		$this->set('last4_month_stat', array_reverse($last4_month_stat));

		$this->set('s_date',date('Y-m-d',strtotime($s_date)));
		$this->set('e_date',date('Y-m-d',strtotime($e_date)));

		/*$this->loadModel('ContactStatus');
		$contact_statuses=$this->ContactStatus->find('list');
		$this->set('contact_statuses', $contact_statuses);*/
		//pr($per_day_leads);
		//die;

		}

	private function _salesperson_stage_breakdown_all($dealer_id, $first_day_this_month, $last_day_this_month, $contact_status_id, $report_type, $active_inactive = "active",$show_group=null){

		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			$dealer_id=implode(',',$dealer_id);

		}
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		$procedure_name = "salesperson_stage_breakdown_all";
		// if($active_inactive == "inactive"){
		// 	$procedure_name = "salesperson_stage_breakdown_inactive_all";
		// }

		//debug("CALL ".$procedure_name."('$dealer_id', '%s', $contact_status_id, '$report_type')");


		// $first_day_this_month = date('Y-m-01 00:00:00', strtotime($month."-01"));
  		// $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($month."-01"));
		$first_day_this_month = $first_day_this_month.' 00:00:00';
        $last_day_this_month  = $last_day_this_month.' 23:59:59';


		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL ".$procedure_name."('$dealer_id', '%s', '%s', $contact_status_id, '$report_type')",
		 	//Sanitize::escape($dealer_id),
			Sanitize::escape($first_day_this_month),
			Sanitize::escape($last_day_this_month)
		);

        $results = array();
		//$steps_count = array();

        if ($result = $mysqli->query($query)) {

            $cnt = 0;
            while ($row = $result->fetch_assoc()) {
				//debug($row);
				$steps_count = array();
				foreach($row as $key=>$value){
					if(substr($key, 0, 2 ) != 's_' ) continue;
					$stepnum = substr($key, 2);
					//$steps_count[$stepnum] = $value;

					if(isset($steps_count[$stepnum])){
						$steps_count[$stepnum] += $value;
					}else{
						$steps_count[$stepnum] = $value;
					}

					$lower_steps = $this->get_lower_steps_master($this->CUSTOM_STEP_MAP, $stepnum);
					//debug($lower_steps);
					foreach ($lower_steps as $ls) {
						$steps_count[$ls] +=  $value;
					}

					// for($i=$stepnum-1; $i>=2; $i--){
					// 	 $steps_count[$i] +=  $value;
					// }
				}

				$output_ar['user_id'] = $row ['user_id'];
				$output_ar['Pending'] = $row ['Pending'];
				$output_ar['sperson'] = $row ['first_name']." ".$row ['last_name'];

				$output_ar['avg_3'] = $row ['avg_3'];
				$output_ar['avg_4'] = $row ['avg_4'];
				$output_ar['avg_5'] = $row ['avg_5'];
				$output_ar['avg_6'] = $row ['avg_6'];
				$output_ar['avg_7'] = $row ['avg_7'];
				$output_ar['avg_8'] = $row ['avg_8'];
				$output_ar['avg_9'] = $row ['avg_9'];
				$output_ar['avg_10'] = $row ['avg_10'];
				$output_ar['avg_17'] = $row ['avg_17'];
				$output_ar['avg_18'] = $row ['avg_18'];

				foreach($steps_count as $key=>$value){
					$output_ar[ $key  ] = $value;
				}
				$results[$cnt] = $output_ar;
				$results[$cnt]['10'] = $results[$cnt]['10'] + $results[$cnt]['30'];
				$cnt++;
            }
        }
        //debug($results);
		return $results;

	}

	private function get_dealer_id_dealer_details($dealer_id){
    	$this->loadModel("User");
    	$this->User->recursive = -1;
    	$user = $this->User->find("first", array("conditions"=>array("User.dealer_id"=>$dealer_id, "User.active"=>1),"fields"=>array("User.id","User.dealer_id","User.step_procces","User.zone")));
    	return $user;
    }

	public function crmreport_master($dealer_id = null){

		$dealer_details = $this->get_dealer_id_dealer_details($dealer_id);

		$zone = $dealer_details['User']['zone'];
		date_default_timezone_set($zone);

		$this->layout=null;
		//$this->view='master_report_allsteps';
		if(!empty($this->request->named['view_type']) && $this->request->named['view_type'] == 'print'){
			$this->layout = 'print_layout';
		}
		if(is_null($dealer_id))
		$dealer_id = $this->Auth->user('dealer_id');
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		$month_name = date('F', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('month_name',$month_name);

		if(!empty($this->request->query['start_date']) && !empty($this->request->query['end_date']) ){

			$s_date = $this->request->query['start_date'].' 00:00:00';
			$e_date = $this->request->query['end_date'].' 23:59:59';

			$this->set('s_date',$s_date);
			$this->set('e_date',$e_date);

		}else{
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
			$month = date('Y-m', strtotime($stat_year."-".$stats_month."-01"));
			$month_name = date('F', strtotime($stat_year."-".$stats_month."-01"));
			$this->set('month_name',$month_name);

			$s_date = date('Y-m-01 00:00:00', strtotime($month."-01"));
        	$e_date  = date('Y-m-t 23:59:59', strtotime($month."-01"));

        	$this->set('s_date',$s_date);
			$this->set('e_date',$e_date);
		}

		$this->loadModel('DealerSetting');
		$this->loadModel('ContactStatus');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);
		$this->public_multi_deal_higher_step = $multi_deal_higher_step;


		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $dealer_details['User']['step_procces']);
		//debug($custom_step_map);
		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map',$custom_step_map);

		//debug($custom_step_map);

		$this->CUSTOM_STEP_MAP = $custom_step_map;

		//debug($month);
		//Deal Register total
		$deal_registers = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 0, 'all_user');
		$this->set('deal_registers',$deal_registers[0]);
		//debug($deal_registers);

		//salesperson Stage breakdown (Total)
		$salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 0, 'user_group');
		$this->set('salesperson_breakdown',$salesperson_breakdown);
		//debug($salesperson_breakdown);

		// /*********Inactive***********/
		// //Deal Register total (Inactive)
		// $deal_registers_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 0, 'all_user', "inactive");
		// $this->set('deal_registers_inactive',$deal_registers_inactive[0]);
		// //debug($deal_registers_inactive);

		// //salesperson Stage breakdown (Total) (Inactive)
		// $salesperson_breakdown_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 0, 'user_group', "inactive");
		// $this->set('salesperson_breakdown_inactive',$salesperson_breakdown_inactive);
		// //debug($salesperson_breakdown_inactive);
		// /***************Inactive***************/


		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 7, 'all_user');
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		//salesperson Stage breakdown (Total)
		$showroom_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 7, 'user_group');
		$this->set('showroom_salesperson_breakdown',$showroom_salesperson_breakdown);


		//Web Site
		$deal_registers_web =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 5, 'all_user');
		$this->set('deal_registers_web',$deal_registers_web[0]);
		//salesperson Stage breakdown (Total)
		$web_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 5, 'user_group');
		$this->set('web_salesperson_breakdown',$web_salesperson_breakdown);

		//mobile
		$deal_registers_mobile =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 12, 'all_user');
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		//salesperson Stage breakdown (Total)
		$mobile_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 12, 'user_group');
		$this->set('mobile_salesperson_breakdown',$mobile_salesperson_breakdown);

		//phone
		$deal_registers_phone =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 6, 'all_user');
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		//salesperson Stage breakdown (Total)
		$phone_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date,$e_date, 6, 'user_group');
		$this->set('phone_salesperson_breakdown',$phone_salesperson_breakdown);





		//Events
 		//debug($dealer_id);
 		$todays_event_con = $this->Contact->today_event_count($zone, $dealer_id, 'Dealer' );
 		$this->Event->bindModel(array('belongsTo'=>array('User'=>array('foreignKey'=>false, 'conditions'=>array("Contact.user_id = User.id")))));
 		$today_events = $this->Event->find('all', array('fields'=>array('Contact.id', 'Contact.user_id', 'User.first_name','User.last_name','User.id', 'User.group_id'),'conditions' => $todays_event_con   ));
 		//debug($today_events);
 		$today_events_by_user = array();
 		$today_user_id_user_name = array();
 		$today_user_id_user_name_internet_sales = array();
 		foreach($today_events as $today_event){

 			if(in_array($today_event['User']['group_id'], array('10','11')) ){
 				$today_user_id_user_name_internet_sales[ $today_event['Contact']['user_id'] ] = $today_event['User']['first_name']." ".$today_event['User']['last_name'];
 			}else{
 				$today_user_id_user_name[ $today_event['Contact']['user_id'] ] = $today_event['User']['first_name']." ".$today_event['User']['last_name'];
 			}


 			if(isset($today_events_by_user[ $today_event['Contact']['user_id'] ])){
 				$today_events_by_user[ $today_event['Contact']['user_id'] ] = $today_events_by_user[ $today_event['Contact']['user_id'] ] +1;
 			}else{
 				$today_events_by_user[ $today_event['Contact']['user_id'] ] = 1;
 			}
 		}
 		//	debug($today_events_by_user);
 		$over_due_con = $this->Contact->overdue_event_count($zone, $dealer_id, 'Dealer' );
 		$this->Event->bindModel(array('belongsTo'=>array('User'=>array('foreignKey'=>false, 'conditions'=>array("Contact.user_id = User.id")))));
		$overdue_events = $this->Event->find('all', array('fields'=>array('Contact.id', 'Contact.user_id', 'User.first_name','User.last_name','User.id', 'User.group_id'),'conditions' => $over_due_con   ));
		$overdue_events_by_user = array();
		foreach($overdue_events as $overdue_event){

			if(in_array($overdue_event['User']['group_id'], array('10','11')) ){
				$today_user_id_user_name_internet_sales[ $overdue_event['Contact']['user_id'] ] = $overdue_event['User']['first_name']." ".$overdue_event['User']['last_name'];
			}else{
				$today_user_id_user_name[ $overdue_event['Contact']['user_id'] ] = $overdue_event['User']['first_name']." ".$overdue_event['User']['last_name'];
			}

 			if(isset($overdue_events_by_user[ $overdue_event['Contact']['user_id'] ])){
 				$overdue_events_by_user[ $overdue_event['Contact']['user_id'] ] = $overdue_events_by_user[ $overdue_event['Contact']['user_id'] ] +1;
 			}else{
 				$overdue_events_by_user[ $overdue_event['Contact']['user_id'] ] = 1;
 			}
		}
		asort($today_user_id_user_name);
		//	debug($today_user_id_user_name);
		$this->set(compact('today_user_id_user_name_internet_sales','today_user_id_user_name', 'overdue_events_by_user',   'today_events_by_user'));

		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);

		$this->set('dealer_id',$dealer_id);


	}

	public function get_lower_steps_master($custom_step_map, $current_step){

    	if($current_step < 2){
    		return array();
    	}

    	$lower = array(2);
    	$cnt = 1;
    	foreach($custom_step_map as $key=>$value){

    		if($current_step != '30'){
	    		if($cnt > 1){
	    			if($key == $current_step){
		    			break;
		    			return $lower;
		    		}
		    		$lower[] = $key;
	    		}
	    	}else{

	    		if($this->public_multi_deal_higher_step > 1){

		    		if($cnt > $this->public_multi_deal_higher_step ){
		    			if($key == $current_step){
			    			break;
			    			return $lower;
			    		}
			    		$lower[] = $key;
		    		}

	    		}else{

		    		if($cnt > 1){
		    			if($key == $current_step){
			    			break;
			    			return $lower;
			    		}
			    		$lower[] = $key;
		    		}

	    		}
	    	}

    		$cnt++;

    	}
    	if($current_step == '30'){
    		if(($key = array_search('10', $lower)) !== false) {
				unset($lower[$key]);
			}
			if($this->public_multi_deal_higher_step > 2){
	    		if(($key = array_search('2', $lower)) !== false) {
					unset($lower[$key]);
				}
	    	}
    	}

    	// if($current_step == '10'){
    	// 	debug($lower);
    	// }
    	//debug($lower);
    	return $lower;
    }


}
