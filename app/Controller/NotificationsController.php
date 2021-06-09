<?php
class NotificationsController extends AppController {
	public $uses = array('Contact','Event');
	public function beforeFilter() {
       	parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public $stat_key_list = array();

    public function save_key_db($dealer_id, $key_name = null){

    	//Dealer Key Save in database
	
		/*    	
    	$count = $this->Contact->query("select count(*) as key_count from cache_keys where key_name = :key_name", array(
    		'key_name' => $key_name
    	));
    	if($count[0][0]['key_count'] == 0){
    		$this->Contact->query("insert into cache_keys( `dealer_id`,`key_name`) values (:dealer_id, :key_name)", array(
	    		'dealer_id' => $dealer_id,
	    		'key_name' => $key_name
	    	));
    	}
    	*/
    	
    	/*

    	$Memcache_config = $this->set_config($dealer_id);
    	debug($Memcache_config);

    	//Dealer Key Save in memcache
    	$dealer_key_list = array();
    	$dealer_key = $dealer_id."_key_list";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		if($dealer_key_list = Cache::read($dealer_key, $Memcache_config) === false){
			$dealer_key_list[] = $key_name;
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($dealer_key, $vehicle_match_alerts, $Memcache_config);

		}
		*/
		$this->stat_key_list[] = $key_name;
    }
    public function update_key_list($dealer_id){

    	$Memcache_config = $this->set_config($dealer_id);
    	// debug($Memcache_config);
    	
    	$dealer_key_name = $dealer_id."_key_list";
    	$dealer_key_list = array();

    	if(!empty($this->stat_key_list)){

    		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($dealer_key_list = Cache::read($dealer_key_name, $Memcache_config)) === false) {
				
				// debug("first_write");
				// debug( $this->stat_key_list);
				// debug( $dealer_key_name);

				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($dealer_key_name, $this->stat_key_list, $Memcache_config);

			}else{
				
				$new_list = array_unique(array_merge($dealer_key_list, $this->stat_key_list), SORT_REGULAR);

				// debug("update value");
				// debug( $new_list);
				// debug( $dealer_key_name);

				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($dealer_key_name, $new_list, $Memcache_config);
			}
    	}
    }

	private function _email_appointment_stats($contact_status_id, $dealer_id, $zone, $stat_type){

		$this->Contact->bindModel(array('belongsTo'=>array('User')));

		$email_sent = $this->Contact->email_sent($contact_status_id,$zone,$dealer_id, $stat_type);
		$appointment = $this->Contact->appointment($contact_status_id,$zone,$dealer_id, $stat_type);

		$closed_today = $this->Contact->find('count', array('conditions'=>$this->Contact->closed_today($contact_status_id,$zone,$dealer_id, $stat_type)));
		$this->loadModel('LeadSold');
		$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
		$sold_today = $this->LeadSold->find('count', array('conditions' => $this->Contact->sold_today($contact_status_id, $zone, $dealer_id, $stat_type )  ));

		$note_update = $this->Contact->note_update($contact_status_id,$zone,$dealer_id,$stat_type);
		$sms_text =    $this->Contact->sms_text($contact_status_id,$zone,$dealer_id,$stat_type);

		return array('sms_text' => count($sms_text),  'closed_today'=>$closed_today, 'sold_today'=>$sold_today, 'note_update'=>count($note_update),'email_sent'=>count($email_sent),'appointment'=>count($appointment));
	}


	public function more_stat_web( $user_id = null, $dealer_id = null, $group_id = null){

		$Memcache_config = $this->set_config($dealer_id);

		$stat_option_key = $this->request->query['stat_options'];
		$team_members_floor_ids =  $this->request->query['team_members_floor_ids'];
		if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
			$tar = explode(",", $team_members_floor_ids);
			$stat_option_key = implode("_", $tar);
			$stat_option_key = "_team_".$stat_option_key;
		}
		$cache_key = $dealer_id."_more_stat_web_".$user_id."_".$group_id."_".$this->request->query['stats_month']."_".$this->request->query['stats_year']."_".$stat_option_key;
		$more_email_appointment = [];
		if(isset($this->request->query['zone']) && isset($this->request->query['stats_month']) ){

			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($more_email_appointment = Cache::read($cache_key, $Memcache_config)) === false) {

				$stat_options = 'Dealer';
				if(isset($this->request->query['stat_options']) && $this->request->query['stat_options']  != 'Dealer'){
					$stat_options = $this->request->query['stat_options'];
				}

				$stats_month = $this->request->query['stats_month'];
				$stats_year = $this->request->query['stats_year'];

				if($stat_options == 'Dealer'){
					$more_email_appointment = $this->_email_appointment_stats(5, $dealer_id, $zone, 'Dealer');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 5, $dealer_id, 'Dealer');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );

					$web_visit_ar =  $this->Contact->web_visit($zone, $dealer_id, 'Dealer');
					$more_email_appointment['web_visit'] =  count($web_visit_ar);

					
				}else{
					$more_email_appointment = $this->_email_appointment_stats(5, $stat_options, $zone, 'User');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 5, $stat_options, 'User');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );

					$web_visit_ar = $this->Contact->web_visit($zone, $stat_options, 'User');
					$more_email_appointment['web_visit'] =  count($web_visit_ar);
				}

				$this->save_key_db($dealer_id, $cache_key);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key, $more_email_appointment, $Memcache_config);
			}

		}
		echo json_encode(['more_email_appointment'=>$more_email_appointment]);
		$this->autoRender =  false;
	}
	public function more_stat_phone( $user_id = null, $dealer_id = null, $group_id = null){

		$Memcache_config = $this->set_config($dealer_id);

		$stat_option_key = $this->request->query['stat_options'];
		$team_members_floor_ids =  $this->request->query['team_members_floor_ids'];
		if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
			$tar = explode(",", $team_members_floor_ids);
			$stat_option_key = implode("_", $tar);
			$stat_option_key = "_team_".$stat_option_key;
		}
		$cache_key = $dealer_id."_more_stat_phone_".$user_id."_".$group_id."_".$this->request->query['stats_month']."_".$this->request->query['stats_year']."_".$stat_option_key;

		$more_email_appointment = [];

		if(isset($this->request->query['zone']) && isset($this->request->query['stats_month']) ){

			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($more_email_appointment = Cache::read($cache_key, $Memcache_config)) === false) {

				$stat_options = 'Dealer';
				if(isset($this->request->query['stat_options']) && $this->request->query['stat_options']  != 'Dealer'){
					$stat_options = $this->request->query['stat_options'];
				}

				$stats_month = $this->request->query['stats_month'];
				$stats_year = $this->request->query['stats_year'];

				if($stat_options == 'Dealer'){
					$more_email_appointment = $this->_email_appointment_stats(6, $dealer_id, $zone, 'Dealer');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 6, $dealer_id, 'Dealer');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );

					$existing_in_ar =  $this->Contact->existing_in($zone, $dealer_id, 'Dealer');
					$existing_out_ar = $this->Contact->existing_out($zone, $dealer_id, 'Dealer');

					$more_email_appointment['existing_in'] =  count($existing_in_ar);
					$more_email_appointment['existing_out'] = count($existing_out_ar);

				}else{
					$more_email_appointment = $this->_email_appointment_stats(6, $stat_options, $zone, 'User');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 6, $stat_options, 'User');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );

					$existing_in_ar =  $this->Contact->existing_in($zone, $stat_options, 'User');
					$existing_out_ar = $this->Contact->existing_out($zone, $stat_options, 'User');

					$more_email_appointment['existing_in'] =  count($existing_in_ar);
					$more_email_appointment['existing_out'] = count($existing_out_ar);
				}

				$this->save_key_db($dealer_id, $cache_key);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key, $more_email_appointment, $Memcache_config);
			}
		}
		echo json_encode(['more_email_appointment'=>$more_email_appointment]);
		$this->autoRender =  false;
	}

	public function more_stat_showroom( $user_id = null, $dealer_id = null, $group_id = null){


		$Memcache_config = $this->set_config($dealer_id);

		$stat_option_key = $this->request->query['stat_options'];
		$team_members_floor_ids =  $this->request->query['team_members_floor_ids'];
		if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
			$tar = explode(",", $team_members_floor_ids);
			$stat_option_key = implode("_", $tar);
			$stat_option_key = "_team_".$stat_option_key;
		}
		$cache_key = $dealer_id."_more_stat_showroom_".$user_id."_".$group_id."_".$this->request->query['stats_month']."_".$this->request->query['stats_year']."_".$stat_option_key;

		$more_email_appointment = [];
		if(isset($this->request->query['zone']) && isset($this->request->query['stats_month']) ){

			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($more_email_appointment = Cache::read($cache_key, $Memcache_config)) === false) {

				$stat_options = 'Dealer';
				if(isset($this->request->query['stat_options']) && $this->request->query['stat_options']  != 'Dealer'){
					$stat_options = $this->request->query['stat_options'];
				}

				$stats_month = $this->request->query['stats_month'];
				$stats_year = $this->request->query['stats_year'];

				if($stat_options == 'Dealer'){
					$more_email_appointment = $this->_email_appointment_stats(7, $dealer_id, $zone, 'Dealer');
					$more_missed_event_ar = $this->Contact->showroom_missed_appt($zone, 7, $dealer_id, 'Dealer');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );

					$showroom_new_visit_ar =  $this->Contact->showroom_new_visit($zone, $dealer_id, 'Dealer');
					// $more_email_appointment['showroom_new_visit']  = count($showroom_new_visit_ar);
					$more_email_appointment['showroom_new_visit']  = count($showroom_new_visit_ar);

				}else{
					$more_email_appointment = $this->_email_appointment_stats(7, $stat_options, $zone, 'User');
					$more_missed_event_ar = $this->Contact->showroom_missed_appt($zone, 7, $stat_options, 'User');
					$more_email_appointment['showroom_new_visit'] = count( $more_missed_event_ar );

					$showroom_new_visit_ar= $this->Contact->showroom_new_visit($zone, $stat_options, 'User');
					$showroom_new_visit  = count($showroom_new_visit_ar);

				}

				$this->save_key_db($dealer_id, $cache_key);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key, $more_email_appointment, $Memcache_config);
			}
		}
		echo json_encode(['more_email_appointment'=>$more_email_appointment]);
		$this->autoRender =  false;
	}


	public function more_stat_mobile( $user_id = null, $dealer_id = null, $group_id = null){

		$Memcache_config = $this->set_config($dealer_id);

		$stat_option_key = $this->request->query['stat_options'];
		$team_members_floor_ids =  $this->request->query['team_members_floor_ids'];
		if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
			$tar = explode(",", $team_members_floor_ids);
			$stat_option_key = implode("_", $tar);
			$stat_option_key = "_team_".$stat_option_key;
		}
		$cache_key = $dealer_id."_more_stat_mobile_".$user_id."_".$group_id."_".$this->request->query['stats_month']."_".$this->request->query['stats_year']."_".$stat_option_key;

		$more_email_appointment = [];
		if(isset($this->request->query['zone']) && isset($this->request->query['stats_month']) ){

			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($more_email_appointment = Cache::read($cache_key, $Memcache_config)) === false) {

				$stat_options = 'Dealer';
				if(isset($this->request->query['stat_options']) && $this->request->query['stat_options']  != 'Dealer'){
					$stat_options = $this->request->query['stat_options'];
				}
				
				$stats_month = $this->request->query['stats_month'];
				$stats_year = $this->request->query['stats_year'];

				if($stat_options == 'Dealer'){
					$more_email_appointment = $this->_email_appointment_stats(12, $dealer_id, $zone, 'Dealer');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 12, $dealer_id, 'Dealer');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );
				}else{
					$more_email_appointment = $this->_email_appointment_stats(12, $stat_options, $zone, 'User');
					$more_missed_event_ar = $this->Contact->missed_event($zone, 12, $stat_options, 'User');
					$more_email_appointment['more_missed_event_ar'] = count( $more_missed_event_ar );
				}

				$this->save_key_db($dealer_id, $cache_key);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key, $more_email_appointment, $Memcache_config);
			}
		}
		echo json_encode(['more_email_appointment'=>$more_email_appointment]);
		$this->autoRender =  false;
	}




	private function _dashboard_stat($contact_status_id, $dealer_id,  $zone, $stat_type, $stats_month, $stats_year){
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$this->Contact->bindModel(array('belongsTo'=>array('User')));

		//Web Leads pending/not pending count
		$cnd1 = $this->Contact->just_arrived_condition($contact_status_id,$zone,$dealer_id, $stat_type);
		$just_arrived = $this->Contact->find('count', array('conditions'=>$cnd1));

		$worked_today = $this->Contact->find('count', array('conditions'=>$this->Contact->worked_today_condition($contact_status_id,$zone,$dealer_id, $stat_type)));
		$still_pending = $this->Contact->find('count', array('conditions'=>$this->Contact->still_pending_condition($contact_status_id,$zone,$dealer_id, $stat_type, $stats_month,  $stats_year)));

		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))));
		$dormant_48hrs = $this->Contact->find('count', array('conditions'=>$this->Contact->dormant_48hrs_condition($contact_status_id,$zone,$dealer_id, $stat_type, $stats_month, $stats_year)));

		return array('just_arrived'=>$just_arrived,'worked_today'=>$worked_today, 'still_pending' => $still_pending, 'dormant_48hrs' => $dormant_48hrs );
	}

	public function set_config($cash_dealer_id = null){

		$cache_dealers_1 = array("1225","1280","1226","762","262","759","758","760","761","1370","491","1573","492","1627","1626","1640","560","1632","829","830","1224","881","1235","7005","1406","1715","112","1332","5000","2501","20010","1562","1788","1792","20020","5001","20040","20060","889","896","30000","20080","20090","1963","234","1409","33080","1485","1830","1833","1055","263","739","1289","40013","2070","2071","2079","2080","2081","576");
		// $cache_dealers_1 = array('5000');

		if(in_array($cash_dealer_id, $cache_dealers_1)){
			return $Memcache_config = "default_2";
		}else{
			return $Memcache_config = "default";
		}

	}

	public function index($user_id = null, $dealer_id = null, $group_id = null){

		$Memcache_config = $this->set_config($dealer_id);
		// debug( $Memcache_config );
		/**
		* Clear Memcache Start
		*/
		/*
		 if( isset($this->request->query['notification_type']) && $this->request->query['notification_type'] == 'Refresh' ){

		 	CakeLog::write('Refresh_cache', $dealer_id.'-'.$user_id  );


		 	// $this->set_config($dealer_id);

		 	$cache_config = Cache::config( $Memcache_config );
		 	$settings = $cache_config['settings'];
		 	$srv_settings_arr =  explode(":", $settings['servers']['0']);
		 	// debug($settings);

		 	$memcache = new Memcache;
		 	$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);
		 	$result = "";

		 	foreach ($memcache->getExtendedStats('slabs') as $slabs) {

		 		foreach (array_keys($slabs) as $slabId) {
		 			if (!is_numeric($slabId)) {
		 				continue;
		 			}
		 			foreach ($memcache->getExtendedStats('cachedump', $slabId, 50000) as $stats) {
		 				if (!is_array($stats)) {
		 					continue;
		 				}
		 				foreach (array_keys($stats) as $key) {
		 					if (strpos($key, $settings['prefix'].$dealer_id."_") === 0) {
		 						//debug($key);
		 						$result .= $key."<br>";
		 						$memcache->delete($key);
		 					}
		 				}
		 			}
		 		}
		 	}

		 }
		/**
		* Clear Memcache End
		*/

		$this->Contact->bindModel(array('belongsTo'=>array('User')));


		if(isset($this->request->query['zone'])){
			date_default_timezone_set($this->request->query['zone']);
		}
		$current_date_time = date("m/d/Y g:ia",strtotime('now'));


		$first_day_this_month = date('Y-m-01 00:00:00');
        $last_day_this_month  = date('Y-m-t 23:59:59');

		$cache_key_top_manager_message = $dealer_id."_".$user_id."_"."manager_message";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		if (($managerMessages = Cache::read($cache_key_top_manager_message, $Memcache_config)) === false) {
			
			$managerMessages = $this->Contact->query("SELECT `ManagerMessage`.`id`, `ManagerMessage`.`contact_id`, `ManagerMessage`.`from_id`, `ManagerMessage`.`to_id`, `ManagerMessage`.`sender_name`, `ManagerMessage`.`receiver_name`, `ManagerMessage`.`message`, `ManagerMessage`.`created`, `Contact`.`first_name`, `Contact`.`last_name` FROM `manager_messages` AS `ManagerMessage` LEFT JOIN `contacts` AS `Contact` ON (`ManagerMessage`.`contact_id` = `Contact`.`id`) WHERE `ManagerMessage`.`to_id` = :user_id AND `ManagerMessage`.`hide`='no' ORDER BY `ManagerMessage`.`created` DESC", array('user_id'=>$user_id));

			$this->save_key_db($dealer_id, $cache_key_top_manager_message);
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($cache_key_top_manager_message, $managerMessages, $Memcache_config);
		}


		//vehicle match alert
		$cache_key_top_vehicle_match_alert = $dealer_id."_"."vehicle_match_alert";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		if (($vehicle_match_alerts = Cache::read($cache_key_top_vehicle_match_alert, $Memcache_config)) === false) {
			$vehicle_match_alerts = $this->Contact->query("SELECT * FROM `vehicle_match_alerts`   WHERE dealer_id = :dealer_id AND `hidden` = '0' ORDER BY id DESC", array('dealer_id'=>$dealer_id));
			//debug($vehicle_match_alerts);
			
			$this->save_key_db($dealer_id, $cache_key_top_vehicle_match_alert);
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($cache_key_top_vehicle_match_alert, $vehicle_match_alerts, $Memcache_config);
		}
		//debug($vehicle_match_alerts);


		//debug($managerMessages);
		
		$histories = $this->Contact->query("SELECT `History`.`id`, `History`.`field_changed`, `History`.`contact_id`, `History`.`created`,  `User`.`first_name`,
			`User`.`id`, `User`.`last_name`, `Contact`.`first_name`, `Contact`.`id`, `Contact`.`last_name` FROM `histories` AS `History` LEFT JOIN `users` AS `User` ON (`History`.`changed_by` = `User`.`id`) LEFT JOIN `contacts` AS `Contact` ON (`History`.`contact_id` = `Contact`.`id`)
			 WHERE `History`.`created` >= '".$first_day_this_month."'  AND `History`.`created` <= '".$last_day_this_month."'  AND `Contact`.`id` is not null AND `History`.`hide` = '0' AND `History`.`h_type` = 'Lead' AND  `History`.`user_id` = :user_id  AND   `History`.`changed_by` <> :user_id ORDER BY `History`.`created` DESC" , array('user_id'=>$user_id, 'thismonth'=>date("Y-m")));

		//debug($histories);
		$histories_clearn = array();
		foreach($histories as $hist){
			$hist['History']['field_changed'] = strip_tags($hist['History']['field_changed']);
			$histories_clearn[] = $hist;
		}
		$histories = $histories_clearn;

		//debug($histories);

		$bdc_lead_appointments=$this->Event->find('all',array('recursive' => -1,'conditions'=>array('Event.status <>'=>array('Completed','Canceled'), 'Event.user_id'=>$user_id,'Event.event_type_id'=>21,'Event.hide'=>0)));
		//debug($bdc_lead_appointments);

		//Sales manager alert for BDC REP web lead start
		$bdc_r_c = array();
		if( $group_id == "2" ||  $group_id == "9"){

			$cache_key_bdcrep_web_lead = $dealer_id."_"."bdcrep_web_lead";
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);

			if (($bdc_r_c = Cache::read($cache_key_bdcrep_web_lead, $Memcache_config)) === false) {

				$bdc_rep_webleads = $this->Contact->query("
				SELECT Contact.id, Contact.first_name, Contact.last_name, Contact.user_id, Contact.sperson, Contact.modified, Contact.created, Contact.status, Contact.source
				FROM `contacts` AS `Contact`
				LEFT JOIN users as User ON (Contact.user_id = User.id)
				WHERE
				`User`.`group_id` in  ('8','13')
				AND `Contact`.`status` in  ('BDC Lead Input', 'Sold/Rolled')
				AND `Contact`.`contact_status_id` in ('5','6','7')
				AND `Contact`.`company_id` = :company_id
				ORDER BY Contact.created DESC;
				", array('company_id'=> $dealer_id ));

				$bdc_r_c = $bdc_rep_webleads;

				$this->save_key_db($dealer_id, $cache_key_bdcrep_web_lead);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key_bdcrep_web_lead, $bdc_r_c, $Memcache_config);
				
			}
		}
		// Sales manager alert for BDC REP web lead end




		$cache_key_top_weblead = $dealer_id."_".$user_id."_"."webleads";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		if (($webleads = Cache::read($cache_key_top_weblead, $Memcache_config)) === false) {
			//Web Lead arrived
			$webleads = $this->Contact->query("
				SELECT `Contact`.`id`, `Contact`.`first_name`, `Contact`.`last_name`, `Contact`.`sales_step`,
				`Contact`.`lead_status`, `Contact`.`modified`, `Contact`.`status`, `Contact`.`source` FROM `contacts` AS `Contact`
				WHERE

			 	`Contact`.`sales_step` = '1' AND `Contact`.`xml_weblead` = '1' AND `Contact`.`created` = `Contact`.`modified`
			 	AND ((`Contact`.`status` <> 'Duplicate-Closed') OR (`Contact`.`status` IS NULL))
			 	AND ((`Contact`.`user_id` = '{$user_id}') OR (`Contact`.`user_id` is null)) AND `Contact`.`company_id` = '{$dealer_id}'
			 	AND `Contact`.`contact_status_id` = 5 ORDER BY `Contact`.`modified` DESC
			 	
			 	"
			);
			//print_r($webleads);

			$this->save_key_db($dealer_id, $cache_key_top_weblead);
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($cache_key_top_weblead, $webleads, $Memcache_config);

		}

		// $cache_key_top_weblead_count = $dealer_id."_".$user_id."_"."webleads_count";
		// Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		// if (($webleads_count = Cache::read($cache_key_top_weblead_count, $Memcache_config)) === false) {
		// 	//Web Lead arrived
		// 	$webleads_count_qr = $this->Contact->query("
		// 		SELECT count(*) FROM `contacts` AS `Contact`
		// 		WHERE
		// 	 	`Contact`.`sales_step` = '1' AND `Contact`.`xml_weblead` = '1' AND `Contact`.`created` = `Contact`.`modified`
		// 	 	AND ((`Contact`.`status` <> 'Duplicate-Closed') OR (`Contact`.`status` IS NULL))
		// 	 	AND ((`Contact`.`user_id` = '{$user_id}') OR (`Contact`.`user_id` is null)) AND `Contact`.`company_id` = '{$dealer_id}'
		// 	 	AND `Contact`.`contact_status_id` = 5 ORDER BY `Contact`.`modified` DESC
		// 	 	"
		// 	);
		// 	$webleads_count = $webleads_count_qr[0][0]['count(*)'];
		// 	$this->save_key_db($dealer_id, $cache_key_top_weblead_count);
		// 	Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		// 	Cache::write($cache_key_top_weblead_count, $webleads_count, $Memcache_config);
		// }

		//< Internet manager / sales events Start >
		$cache_key_internet_event_alert = $dealer_id."_".$user_id."_"."internet_event_alert";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		if (($int_sales_manager_appointments = Cache::read($cache_key_internet_event_alert, $Memcache_config)) === false) {

			$int_sales_manager_ids = $this->Auth->User("id");
			$this_month = date('Y-m');
			$int_sales_manager_appointments = $this->Event->find('all',array(
			'fields' => array("Event.id",'Event.contact_id','Event.first_name','Event.last_name','Event.created','Event.start','Event.dealer_id','Event.end','Event.title','Event.details'),
			'order' => 'Event.start DESC','conditions'=>array(
			'Contact.internet_group_transfer' => 1,

			'Event.start >=' =>  $first_day_this_month,
			'Event.start <=' =>  $last_day_this_month,

			'Contact.user_id'=>$int_sales_manager_ids,
			'Event.status <>'=>array('Completed','Canceled'),
			'Event.hide'=>0
			)));
			$this->save_key_db($dealer_id, $cache_key_internet_event_alert);
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($cache_key_internet_event_alert, $int_sales_manager_appointments, $Memcache_config);
		}
		//</ Internet manager / sales events End >




		//Lead Push Alert start start
		$cache_key_lead_push = $dealer_id."_".$user_id."_"."lead_push_alert";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);

		if (($lead_push_cnt = Cache::read($cache_key_lead_push, $Memcache_config)) === false) {

			$lead_push_cnt  = $this->Contact->query("SELECT Contact.id,  Contact.first_name, Contact.last_name, Contact.sales_step, Contact.user_id, Contact.sperson, Contact.source, Contact.status, Contact.modified
			FROM `contacts` AS `Contact`
			WHERE
			`Contact`.`user_id` = :user_id
			AND `Contact`.`company_id` = :company_id
			AND `Contact`.`staff_transfer` = 1
			AND `Contact`.`status` <>  'Duplicate-Closed'
			AND `Contact`.`location_modified` = `Contact`.`modified`
			ORDER BY Contact.created DESC;",array('company_id'=> $dealer_id,  'user_id'=>$user_id ));
			
			//$lead_push_cnt = count($lead_push_alert);
			$this->save_key_db($dealer_id, $cache_key_lead_push);
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::write($cache_key_lead_push, $lead_push_cnt, $Memcache_config);
		}
		//Lead Push Alert ends

		// //Lead Push Count Alert start start
		// $cache_key_lead_push_count = $dealer_id."_".$user_id."_"."lead_push_alert_count";
		// Cache::set(array('duration' => '+6 hours'), $Memcache_config);

		// if (($lead_push_cnt_count = Cache::read($cache_key_lead_push_count, $Memcache_config)) === false) {

		// 	$lead_push_cnt_count_query  = $this->Contact->query("SELECT count(*)
		// 	FROM `contacts` AS `Contact`
		// 	WHERE
		// 	`Contact`.`user_id` = :user_id
		// 	AND `Contact`.`company_id` = :company_id
		// 	AND `Contact`.`staff_transfer` = 1
		// 	AND `Contact`.`status` <>  'Duplicate-Closed'
		// 	AND `Contact`.`location_modified` = `Contact`.`modified`
		// 	ORDER BY Contact.created DESC;",array('company_id'=> $dealer_id,  'user_id'=>$user_id ));

		// 	$lead_push_cnt_count = $lead_push_cnt_count_query['0']['0']['count(*)'];
			
		// 	$this->save_key_db($dealer_id, $cache_key_lead_push_count);
		// 	Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		// 	Cache::write($cache_key_lead_push_count, $lead_push_cnt_count, $Memcache_config);
		// }
		// //Lead Push Count Alert ends


		$stat_option_key = $this->request->query['stat_options'];
		//debug($stat_option_key);

		$team_members_floor_ids =  $this->request->query['team_members_floor_ids'];
		if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
			$tar = explode(",", $team_members_floor_ids);
			$stat_option_key = implode("_", $tar);
			$stat_option_key = "_team_".$stat_option_key;
		}



		//Top are notification
		$cache_key = $dealer_id."_".$user_id."_".$group_id."_".$this->request->query['stats_month']."_".$this->request->query['stats_year']."_".$stat_option_key;
		// debug($cache_key);


		$dashboard_stats = array();
		if(isset($this->request->query['zone']) && isset($this->request->query['stats_month']) ){

			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			if (($dashboard_stats = Cache::read($cache_key, $Memcache_config)) === false) {

				//debug('cache');
				
				$this->loadModel('DealerSetting');
				$log_in_goal = $this->DealerSetting->get_settings('log_in_goal', $dealer_id);
				//debug($log_in_goal);


				//<Dashboard cache block Start>

				$stats_month = $this->request->query['stats_month'];
				$stats_year = $this->request->query['stats_year'];
				//debug($stats_year);

				$zone = $this->request->query['zone'];

				$stat_options = 'Dealer';
				if(isset($this->request->query['stat_options']) && $this->request->query['stat_options']  != 'Dealer'){
					$stat_options = $this->request->query['stat_options'];
				}

				//For Team Member
				if($team_members_floor_ids != '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
					$stat_options = explode(",", $team_members_floor_ids);
				}

				if($team_members_floor_ids == '' &&  strpos( $this->request->query['stat_options'] , 'team_') !== false ){
					$stat_options = 'Dealer';
				}
				$this->Event->bindModel(array('belongsTo'=>array('User')));
				// debug($stat_options);
				if($stat_options == 'Dealer'){

					if($log_in_goal	== 'Off'){
						$this->Contact->bindModel(array('belongsTo'=>array('User')));
						$this->Contact->unbindModel(array('hasMany'=>array('Deal')));
						$user_num = $this->Contact->find('all',array('fields'=>array('DISTINCT Contact.user_id'),'conditions'=>array('Contact.sales_step <>' => '1', 'Contact.company_id'=>$dealer_id, 'Contact.step_modified >=' => date('Y-m-d 00:00:00'), 'Contact.step_modified <=' => date('Y-m-d 23:59:59')      )));
						$new_lead_user = count($user_num) * 5;
					}else{
						$this->loadModel("User");
						$user_num = $this->User->find('count',array('conditions'=>array('User.group_id' =>  array(1,2,3,4,5,6,10,11),  'User.active' => 1,  'User.dealer_id'=>$dealer_id, 'User.last_login >=' => date('Y-m-d 00:00:00'), 'User.last_login <=' => date('Y-m-d 23:59:59')      )));
						//debug($user_num);
						CakeLog::write('AndiError',print_r($user_num,true));
						$new_lead_user = $user_num * 5;
					}

					CakeLog::write('noti_dashboard_query',"User_id::".$user_id."--Dealer_id:".$dealer_id.'--DateTime::'.date('Y-m-d h:i:s'));	
					$today_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->today_lead_count($zone, $dealer_id, 'Dealer')  ));
					$today_lead_count = $today_lead_count." / ".$new_lead_user;

					$open_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->open_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' )  ));

					$closed_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->closed_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' )  ));

					$pending_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->pending_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' )  ));


					//$sold_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->sold_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' )  ));


					$this->loadModel('LeadSold');
					$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
					$sold_lead_count = $this->LeadSold->find('count', array('conditions' => $this->Contact->sold_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer')  ));


					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$dormant_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->dormant_lead_count($zone, $dealer_id, 'Dealer', $stats_month, $stats_year )   ));

					$today_event_count = $this->Event->find('count', array('conditions' => $this->Contact->today_event_count($zone, $dealer_id , 'Dealer' )   ));
					$overdue_event_count = $this->Event->find('count', array('conditions' => $this->Contact->overdue_event_count($zone, $dealer_id , 'Dealer' )    ));


					/*Dashboard stat dealer start */

					$weblead_stats = $this->_dashboard_stat(5, $dealer_id, $zone, 'Dealer', $stats_month, $stats_year);
					$mobile_stats = $this->_dashboard_stat(12, $dealer_id, $zone, 'Dealer', $stats_month, $stats_year);


					$mobile_stats['just_arrived'] = $this->Contact->find('count', array('conditions' =>  $this->Contact->just_arrived_condition_mobile($zone, $dealer_id, 'Dealer', $stats_month, $stats_year )   ));


					// $web_email_appointment = $this->_email_appointment_stats(5, $dealer_id, $zone, 'Dealer');
					// $mobile_email_appointment = $this->_email_appointment_stats(12, $dealer_id, $zone, 'Dealer');
					// $phone_email_appointment = $this->_email_appointment_stats(6, $dealer_id, $zone, 'Dealer');
					// $showroom_email_appointment = $this->_email_appointment_stats(7, $dealer_id, $zone, 'Dealer');

					//worksheet
					$showroom_worksheet_ar = $this->Contact->showroom_worksheet($zone, $dealer_id, 'Dealer');



					//Showroom leads
					/*
					Disabled - Russel 20 Oct
					$showroom_new_visit_ar =  $this->Contact->showroom_new_visit($zone, $dealer_id, 'Dealer');
					$showroom_new_visit = count($showroom_new_visit_ar);
					*/
					$showroom_new_visit = 0;


					/*
					Disabled - Russel 20 Oct
					$web_visit_ar =  $this->Contact->web_visit($zone, $dealer_id, 'Dealer');
					$web_visit = count($web_visit_ar);
					*/
					$web_visit = 0;


					$showroom_existing_visit = $this->Contact->find('count', array('conditions' => $this->Contact->showroom_existing_visit($zone, $dealer_id, 'Dealer')   ));


					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$showroom_dormant_48hrs = $this->Contact->find('count', array('conditions' => $this->Contact->showroom_dormant_48hrs($zone, $dealer_id, 'Dealer', $stats_month, $stats_year)   ));

					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$phone_dormant_48hrs =  $this->Contact->find('count', array('conditions' => $this->Contact->phone_dormant_48hrs($zone, $dealer_id, 'Dealer', $stats_month, $stats_year)   ));

					//Phone Leads
					$new_inbound =  $this->Contact->new_inbound($zone, $dealer_id, 'Dealer');
					$new_outbound = $this->Contact->new_outbound($zone, $dealer_id, 'Dealer');
					
					/*$existing_in_ar =  $this->Contact->existing_in($zone, $dealer_id, 'Dealer');
					$existing_out_ar = $this->Contact->existing_out($zone, $dealer_id, 'Dealer');*/
					$existing_in_ar =  [];
					$existing_out_ar = [];

					/*Dashboard stat dealer end */


				}else{

					$total_default_count = 5;
					//For Team Member
					if( is_array($stat_options) ){

						if($log_in_goal	== 'Off'){
							$this->Contact->bindModel(array('belongsTo'=>array('User')));
							$this->Contact->unbindModel(array('hasMany'=>array('Deal')));
							$user_num = $this->Contact->find('all',array('fields'=>array('DISTINCT Contact.user_id'),'conditions'=>array('Contact.user_id' =>   $stat_options  ,    'Contact.sales_step <>' => '1', 'Contact.company_id'=>$dealer_id, 'Contact.step_modified >=' => date('Y-m-d 00:00:00'), 'Contact.step_modified <=' => date('Y-m-d 23:59:59')      )));
							$total_default_count = count($user_num) * 5;
						}else{
							//debug($stat_options);
							$this->loadModel("User");
							$user_num = $this->User->find('count',array('conditions'=>array('User.id' =>   $stat_options  ,    'User.dealer_id'=>$dealer_id, 'User.last_login >=' => date('Y-m-d 00:00:00'), 'User.last_login <=' => date('Y-m-d 23:59:59')      )));
							$total_default_count = $user_num * 5;
							//debug($user_num);

						}


					}
					
					CakeLog::write('noti_dashboard_query',"User_id::".$user_id."--Dealer_id:".$dealer_id.'--DateTime::'.date('Y-m-d h:i:s'));	
						
					$today_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->today_lead_count($zone, $stat_options,'User')  ));
					$today_lead_count = $today_lead_count." / ".$total_default_count;

					$open_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->open_lead_count($zone, $stat_options, $stats_month, $stats_year,'User' )  ));
					$closed_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->closed_lead_count($zone, $stat_options, $stats_month, $stats_year,'User' )  ));

					$pending_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->pending_lead_count($zone, $stat_options, $stats_month, $stats_year,'User' )  ));

					//$sold_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->sold_lead_count($zone, $stat_options, $stats_month, $stats_year,'User' )  ));
					$this->loadModel('LeadSold');
					$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
					$sold_lead_count = $this->LeadSold->find('count', array('conditions' => $this->Contact->sold_lead_count($zone, $stat_options, $stats_month, $stats_year, 'User')  ));



					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$dormant_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->dormant_lead_count($zone, $stat_options,'User', $stats_month, $stats_year )   ));

					$today_event_count = $this->Event->find('count', array('conditions' => $this->Contact->today_event_count($zone, $stat_options ,'User'  )   ));
					$overdue_event_count = $this->Event->find('count', array('conditions' => $this->Contact->overdue_event_count($zone, $stat_options,'User', $dealer_id )    ));



					/*Dashboard stat dealer start */

					$weblead_stats = $this->_dashboard_stat(5, $stat_options, $zone, 'User', $stats_month, $stats_year);
					$mobile_stats = $this->_dashboard_stat(12, $stat_options, $zone, 'User', $stats_month, $stats_year);

					$mobile_stats['just_arrived'] = $this->Contact->find('count', array('conditions' =>  $this->Contact->just_arrived_condition_mobile($zone, $stat_options, 'User',  $stats_month, $stats_year )   ));

					// $web_email_appointment = $this->_email_appointment_stats(5, $stat_options, $zone, 'User');
					// $mobile_email_appointment = $this->_email_appointment_stats(12, $stat_options, $zone, 'User');
					// $phone_email_appointment = $this->_email_appointment_stats(6, $stat_options, $zone, 'User');
					// $showroom_email_appointment = $this->_email_appointment_stats(7, $stat_options, $zone, 'User');

					//worksheet
					$showroom_worksheet_ar = $this->Contact->showroom_worksheet($zone, $stat_options, 'User');


					//Missed Event;
					

					//Showroom leads
					/*
					Disabled Russel 20 Oct
					$showroom_new_visit_ar= $this->Contact->showroom_new_visit($zone, $stat_options, 'User');
					$showroom_new_visit  = count($showroom_new_visit_ar);
					*/
					$showroom_new_visit = 0;

					/*
					Disabled Russel - 20 Oct
					$web_visit_ar = $this->Contact->web_visit($zone, $stat_options, 'User');
					$web_visit  = count($web_visit_ar );
					*/
					$web_visit = 0;



					$showroom_existing_visit = $this->Contact->find('count', array('conditions' => $this->Contact->showroom_existing_visit($zone, $stat_options, 'User', $stats_month, $stats_year)   ));

					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$showroom_dormant_48hrs = $this->Contact->find('count', array('conditions' => $this->Contact->showroom_dormant_48hrs($zone, $stat_options, 'User', $stats_month, $stats_year)   ));

					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$phone_dormant_48hrs =  $this->Contact->find('count', array('conditions' => $this->Contact->phone_dormant_48hrs($zone, $stat_options, 'User', $stats_month, $stats_year)   ));

					//Phone Leads
					$new_inbound = $this->Contact->new_inbound($zone, $stat_options, 'User');
					$new_outbound = $this->Contact->new_outbound($zone, $stat_options, 'User');
					
					/*$existing_in_ar =  $this->Contact->existing_in($zone, $stat_options, 'User');
					$existing_out_ar = $this->Contact->existing_out($zone, $stat_options, 'User');*/
					$existing_in_ar =  [];
					$existing_out_ar = [];

					/*Dashboard stat dealer end */

				}

				// $("#web_email_sent").html(response.dashboard_stats.web_email_sent);
				// $("#web_appointment").html(response.dashboard_stats.web_appointment);
				// $("#web_closed_today").html(response.dashboard_stats.web_closed_today);
				// $("#web_sold_today").html(response.dashboard_stats.web_sold_today);
				// $("#web_missed_event").html(response.dashboard_stats.web_missed_event);
				// $("#web_noteupdate_today").html(response.dashboard_stats.web_noteupdate_today);					
				// $("#web_sms_text").html(response.dashboard_stats.web_sms_text);

				// $("#mobile_email_sent").html(response.dashboard_stats.mobile_email_sent);
				// $("#mobile_appointment").html(response.dashboard_stats.mobile_appointment);
				// $("#mobile_closed_today").html(response.dashboard_stats.mobile_closed_today);
				// $("#mobile_sold_today").html(response.dashboard_stats.mobile_sold_today);
				// $("#mobile_missed_event").html(response.dashboard_stats.mobile_missed_event);
				// $("#mobile_noteupdate_today").html(response.dashboard_stats.mobile_noteupdate_today);
				// $("#mobile_sms_text").html(response.dashboard_stats.mobile_sms_text);

				// $("#phone_email_sent").html(response.dashboard_stats.phone_email_sent);
				// $("#phone_appointment").html(response.dashboard_stats.phone_appointment);
				// $("#phone_closed_today").html(response.dashboard_stats.phone_closed_today);
				// $("#phone_missed_event").html(response.dashboard_stats.phone_missed_event);
				// $("#phone_noteupdate_today").html(response.dashboard_stats.phone_noteupdate_today);
				// $("#phone_sms_text").html(response.dashboard_stats.phone_sms_text);
				
				// $("#showroom_email_sent").html(response.dashboard_stats.showroom_email_sent);
				// $("#showroom_appointment").html(response.dashboard_stats.showroom_appointment);
				// $("#showroom_closed_today").html(response.dashboard_stats.showroom_closed_today);
				// $("#showroom_sold_today").html(response.dashboard_stats.showroom_sold_today);
				// $("#showroom_missed_appt").html(response.dashboard_stats.showroom_missed_appt);
				// $("#showroom_noteupdate_today").html(response.dashboard_stats.showroom_noteupdate_today);
				// $("#showroom_sms_text").html(response.dashboard_stats.showroom_sms_text);


				$dashboard_stats = array(
					
					// 'web_email_sent' => $web_email_appointment['email_sent'],
					// 'web_appointment' => $web_email_appointment['appointment'],
					// 'web_closed_today' => $web_email_appointment['closed_today'],
					// 'web_sold_today' => $web_email_appointment['sold_today'],
					'web_missed_event' => count($web_missed_event_ar),
					// 'web_noteupdate_today' => $web_email_appointment['note_update'],
					// 'web_sms_text' => $web_email_appointment['sms_text'],

					// 'mobile_email_sent' => $mobile_email_appointment['email_sent'],
					// 'mobile_appointment' => $mobile_email_appointment['appointment'],
					// 'mobile_closed_today' => $mobile_email_appointment['closed_today'],
					// 'mobile_sold_today' => $mobile_email_appointment['sold_today'],
					'mobile_missed_event' => count($mobile_missed_event_ar),
					// 'mobile_noteupdate_today' => $mobile_email_appointment['note_update'],
					// 'mobile_sms_text' => $mobile_email_appointment['sms_text'],

					// 'phone_email_sent' => $phone_email_appointment['email_sent'],
					// 'phone_appointment' => $phone_email_appointment['appointment'],
					// 'phone_closed_today' => $phone_email_appointment['closed_today'],
					// 'phone_sold_today' => $phone_email_appointment['sold_today'],
					'phone_missed_event' => count($phone_missed_event_ar),
					// 'phone_noteupdate_today' => $phone_email_appointment['note_update'],
					// 'phone_sms_text' => $phone_email_appointment['sms_text'],
					
					// 'showroom_email_sent' => $showroom_email_appointment['email_sent'],
					// 'showroom_appointment' => $showroom_email_appointment['appointment'],
					// 'showroom_closed_today' => $showroom_email_appointment['closed_today'],
					// 'showroom_sold_today' => $showroom_email_appointment['sold_today'],
					'showroom_missed_appt' => count($showroom_missed_appt_ar),
					// 'showroom_noteupdate_today' => $showroom_email_appointment['note_update'],
					// 'showroom_sms_text' => $showroom_email_appointment['sms_text'],

					
					'phone_dormant_48hrs' => $phone_dormant_48hrs,
					'today_lead_count' => $today_lead_count,
					'open_lead_count' => $open_lead_count,
					'closed_lead_count' => $closed_lead_count,
					'pending_lead_count' => $pending_lead_count,
					'sold_lead_count' => $sold_lead_count,
					'dormant_lead_count' => $dormant_lead_count,
					'today_event_count' => $today_event_count,
					'overdue_event_count' => $overdue_event_count,

					'web_just_arrived' => $weblead_stats['just_arrived'],
					'web_worked_today' => $weblead_stats['worked_today'],
					'web_still_pending' => $weblead_stats['still_pending'],
					'web_dormant_48hrs' => $weblead_stats['dormant_48hrs'],

					'mobile_just_arrived' => $mobile_stats['just_arrived'],
					'mobile_worked_today' => $mobile_stats['worked_today'],
					'mobile_still_pending' => $mobile_stats['still_pending'],
					'mobile_dormant_48hrs' => $mobile_stats['dormant_48hrs'],

					'showroom_new_visit' => $showroom_new_visit,
					'web_visit' => $web_visit,
					'showroom_existing_visit' => $showroom_existing_visit,
					'showroom_dormant_48hrs' => $showroom_dormant_48hrs,

					'showroom_worksheet' => count($showroom_worksheet_ar),
					
					
					

					'new_inbound' => count($new_inbound),
					'new_outbound' => count($new_outbound),
					'existing_in' => count($existing_in_ar),
					'existing_out' => count($existing_out_ar),

				);

				//<Dashboard cache block Ends>
				$this->save_key_db($dealer_id, $cache_key);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::write($cache_key, $dashboard_stats, $Memcache_config);

			}

		}
		
		$this->update_key_list($dealer_id);
		echo json_encode(array('cache_key'=>$cache_key, 'lead_push_cnt' => $lead_push_cnt, 'current_date_time'=>$current_date_time, 'vehicle_match_alerts' => $vehicle_match_alerts, 'webleads'=>$webleads, 'managerMessages'=>$managerMessages,'histories'=>$histories,'dashboard_stats'=>$dashboard_stats, 'int_sales_manager_appointments' => $int_sales_manager_appointments, 'bdc_r_c' => $bdc_r_c,  'bdc_lead_appointments'=>$bdc_lead_appointments));
		$this->autoRender =  false;

	}

	public function hide_message($msg_id=null)
	{
		$this->layout=null;
		$this->view=null;
		$this->autoRender=false;
		$msg_count=0;
		if($msg_id!=null)
		{
			$this->loadModel('ManagerMessage');
			$this->ManagerMessage->id=$msg_id;
			$this->ManagerMessage->saveField('hide','yes');
			$msg_count=$this->ManagerMessage->find('count',array('conditions'=>array('ManagerMessage.to_id'=>$this->Auth->user('id'),'ManagerMessage.hide'=>'no')));
		}
		echo $msg_count;

		//Clear Cache
		$dealer_id = $this->Auth->user('dealer_id');
		$user_id = $this->Auth->user('id');
		$cache_key_top_manager_message = $dealer_id."_".$user_id."_"."manager_message";
		$this->requestAction('manage_cache/clear_manager_message_cache/'.$cache_key_top_manager_message."/".$dealer_id);
	}

	public function hide_lead_appt($event_id=null)
	{
		$this->layout=null;
		$this->view=null;
		$this->autoRender=false;
		$event_count=0;
		if($event_id!=null)
		{
			$this->loadModel('Event');
			$this->Event->id=$event_id;
			$this->Event->saveField('hide',1);
			$event_count=$this->Event->find('count',array('conditions'=>array('Event.user_id'=>$this->Auth->user('id'),'Event.event_type_id'=>21,'Event.hide'=>0)));
		}
		echo $event_count;
	}

	public function hide_int_lead_appt($event_id=null, $dealer_id)
	{
		$this->layout=null;
		$this->view=null;
		$this->autoRender=false;
		$event_count=0;
		if($event_id!=null)
		{
			$this->loadModel('Event');
			$this->Event->id=$event_id;
			$this->Event->saveField('hide',1);

			$user_id = $this->Auth->User("id");
			$cache_key_internet_event_alert = $dealer_id."_".$user_id."_"."internet_event_alert";

			$this->requestAction('manage_cache/clear_manager_message_cache/'. $cache_key_internet_event_alert);


			$int_sales_manager_ids = $this->Auth->User("id");

			$this_month = date('Y-m');
			$first_day_this_month = date('Y-m-01 00:00:00');
        	$last_day_this_month  = date('Y-m-t 23:59:59');


			$event_count = $this->Event->find('count',array('order' => 'Event.start','conditions'=>array(  'Contact.internet_group_transfer' => 1,
				'Event.start >=' =>  $first_day_this_month,
				'Event.start <=' =>  $last_day_this_month,
				'Contact.user_id'=>$int_sales_manager_ids, 'Event.status <>'=>array('Completed','Canceled'), 'Event.hide'=>0)));

		}
		echo $event_count;
	}
















	public function hide_v_match($event_id=null)
	{
		$this->layout=null;
		$this->view=null;
		$this->autoRender=false;
		$event_count=0;
		if($event_id!=null)
		{
			$this->loadModel('VehicleMatchAlert');
			$this->VehicleMatchAlert->id=$event_id;
			$this->VehicleMatchAlert->saveField('hidden',1);
			$event_count=$this->VehicleMatchAlert->find('count',array('conditions'=>array('VehicleMatchAlert.dealer_id'=>$this->Auth->user('dealer_id'),'VehicleMatchAlert.hidden'=>0)));
		}

		$this->requestAction('manage_cache/clear_vehicle_match_cache/'.$this->Auth->user('dealer_id'));


		echo $event_count;
	}

	public function hide_change_log($msg_id=null){
		$this->autoRender = false;
		$change_log_count = 0;
		if($msg_id!=null){
			$this->loadModel('History');
			$this->History->updateAll(
				array('History.hide' => "'1'"),
				array('History.id' => $msg_id)
			);
			$conditions = array('History.hide' => '0', 'History.h_type' => 'Lead', 'History.user_id'=>$this->Auth->user('id'), 'History.changed_by <>'=> $this->Auth->user('id') );
			$change_log_count = $this->History->find('count',array('conditions'=>$conditions));
		}
		echo $change_log_count;
	}

}
