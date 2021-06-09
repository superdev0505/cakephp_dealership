<?php

class MasterReportsController extends AppController {

    public $uses = array('Contact','ContactStatus');
    public $components = array('RequestHandler');

    public $ReportUserGroups = array(1,2,3,4,5,6,10,11);

    public $CUSTOM_STEP_MAP = array();
    public $public_multi_deal_higher_step = 1;

	public function beforeFilter() {

		parent::beforeFilter();
	}

    public function realtime_container(){
    	$this->layout = "default_new";

    	$dealer_id = $this->Auth->user('dealer_id');
    	$group_id = $this->Auth->user('group_id');

    	$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//$s_date = '2014-07-09';
		//$e_date = '2014-07-09';
		if($s_date == null && $e_date == null){
			$s_date = date("Y-m-d");
			$e_date = date("Y-m-d");
		}
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);


		$report_limit = "On";
		$this->loadModel("DealerSetting");
		$report_range_limit = $this->DealerSetting->get_settings('report_range_limit', $dealer_id);
		if($report_range_limit == 'Off'){
			if($group_id == '2' || $group_id == '6'){
				$report_limit = "Off";
			}
		}
		$this->set('report_limit', $report_limit);




    }

    public function date_array_from_range($s_date = null, $e_date = null){
    	$date_array[] = $s_date;
    	$current_date = strtotime($s_date);
    	$last_date = strtotime($e_date);
    	do {
    		$current_date  = strtotime("+1 day", $current_date);
    		$date_array[] = date("Y-m-d",$current_date);
    	} while ( $current_date < $last_date);
    	return $date_array;
    }

    public function get_step_stats_all($s_date = null, $e_date = null){

    	$all_days = $this->date_array_from_range($s_date, $e_date);

    	$all_step_stats = array();

    	$dealer_id = $this->Auth->user('dealer_id');
    	foreach ($all_days as $dates) {

	    	App::import('Core', 'ConnectionManager');
	        $dataSource = ConnectionManager::getDataSource('default');
	        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

			App::uses('Sanitize', 'Utility');
			$query = sprintf("CALL realtime_stats_all(%s, '%s', '%s')",
			 	Sanitize::escape($dealer_id),
				Sanitize::escape($dates),
				Sanitize::escape($dates)
			);

			$all_results = array();
			$result_count = 0;
			if ($mysqli->multi_query($query)) {
				do {
					/* store first result set */
			        if ($result = $mysqli->store_result()) {
			            while ($row = $result->fetch_assoc()) {
			                $all_results[$result_count][] = $row;
			            }
			            $result->free();
			            $result_count++;
			        }
				}while ($mysqli->next_result());
			}
			//debug( $all_results[0]);
			//$this->set('results', $all_results[0]);
			$all_step_stats[$dates]['results'] = $all_results[0];

			$steps_count = array();

			$allcnt = array();
			if(!empty($all_results[0])){
				foreach($all_results[0] as $k=>$v){
					foreach($v as $key=>$value){
						if($key == 'user_id' || $key == 'sperson') continue;
						$stepnum =  substr($key, 2);
						$steps_count[$stepnum] = $value;

						for($i=$stepnum-1; $i>=2; $i--){
							 $steps_count[$i] +=  $value;
						}
					}
					$allcnt [$k] =  $steps_count;
				}
			}

			//debug($allcnt);
			//$this->set('allcnt', $allcnt);
			$all_step_stats[$dates]['allcnt'] = $allcnt;
    	}

    	return $all_step_stats;

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


    public function get_lower_steps($custom_step_map, $current_step, $multi_deal_higher_step){

    	if($current_step == 1){
    		return array();
    	}

    	$lower = array();
    	$cnt = 1;
    	//$multi_deal_higher_step = 1;
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

	    		if($cnt > $multi_deal_higher_step ){
	    			if($key == $current_step){
		    			break;
		    			return $lower;
		    		}
		    		$lower[] = $key;
	    		}
	    	}
    		$cnt++;
    	}

    	if($current_step == '30'){
    		if(($key = array_search('10', $lower)) !== false) {
				unset($lower[$key]);
			}
    	}

    	return $lower;
    }

    public function calculate_percentage($p_total, $p_value){
    	if($p_total == 0){
    		return 0;
    	}
    	return round( ($p_value / $p_total) * 100 );
    }

    public function crmreport_realtime_report_all($s_date = null, $e_date = null){
    	$this->realtime_report_all($s_date, $e_date);
    	$this->render("realtime_report_all");
    }

	public function realtime_report_all($s_date = null, $e_date = null){

		$crnreport_dealer = false;

		if(isset($this->request->query['dealer_id'])){
			$dealer_id = $this->request->query['dealer_id'];
			$crnreport_dealer = true;
		}else{
			$dealer_id = $this->Auth->user('dealer_id');
		}

		$this->set('dealer_id',$dealer_id);



		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);

		$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $dealer_id);


		$team_members_floor = array();
		if($crnreport_dealer == false){ // if not call from crmreprot page

			$userinfo = $this->Auth->User();
			if($team_breakdown_settings == 'On' && $userinfo['group_id'] == '4'  ){
				//debug($userinfo['group_id']);
				$this->loadModel("ManageTeam");
				$ManageTeams = $this->ManageTeam->find('first',array(
					'fields'=>array(
						'ManageTeam.id','ManageTeam.team_members'
					),
					'conditions'=>array(
						'ManageTeam.dealer_id'=> $userinfo['dealer_id'],'ManageTeam.floor_manager_id'=> $userinfo['id']
					)
				));
				if($ManageTeams['ManageTeam']['team_members'] != ''){
					$ManageTeams['ManageTeam']['team_members'] .= ",".$userinfo['id'];
					$team_members_floor = explode(",", $ManageTeams['ManageTeam']['team_members']);
				} else {
				      array_push($team_members_floor, $this->Auth->User('id'));
        }
			}

		}

		//debug($team_members_floor);


		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $this->Auth->User('step_procces'));
		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map', $custom_step_map);
		//debug($custom_step_map);





    	if ($this->request->is('ajax')) {
 	   		$this->layout = "ajax";
		}else{
			$this->layout = "ajax";
		}


    	$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//$s_date = '2014-07-09';
		//$e_date = '2014-07-09';
		if($s_date == null && $e_date == null){
			$s_date = date("Y-m-d");
			$e_date = date("Y-m-d");
		}
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		// debug($s_date);
		// debug($e_date);

		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_stats_all(%s, '%s', '%s')",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape($s_date." 00:00:00"),
			Sanitize::escape($e_date." 23:59:59")
		);

		$all_results = array();
		$result_count = 0;
		if ($mysqli->multi_query($query)) {
			do {
				/* store first result set */
		        if ($result = $mysqli->store_result()) {
		            while ($row = $result->fetch_assoc()) {
		            	if(empty($team_members_floor)){
		            		$all_results[$result_count][] = $row;
		            	}else if (in_array($row['user_id'], $team_members_floor)) {
		            		$all_results[$result_count][] = $row;
		            	}

		            }
		            $result->free();
		            $result_count++;
		        }
			}while ($mysqli->next_result());
		}
		//debug( $all_results[0]);
		$this->set('custom_step_map', $custom_step_map);
		$this->set('results', $all_results[0]);



		$allcnt = array();
		if(!empty($all_results[0])){
			foreach($all_results[0] as $k=>$v){

				$steps_count = array();

				foreach($v as $key=>$value){
					if($key == 'user_id' || $key == 'sperson') continue;
					$stepnum =  substr($key, 2);

					if(isset($steps_count[$stepnum])){
						$steps_count[$stepnum] += $value;
					}else{
						$steps_count[$stepnum] = $value;
					}
					//debug($stepnum);
					$lower_steps = $this->get_lower_steps($custom_step_map, $stepnum, $multi_deal_higher_step);
					//debug($lower_steps);
					foreach ($lower_steps as $ls) {
						$steps_count[$ls] +=  $value;
					}
				}
				$allcnt [$k] =  $steps_count;
			}
		}
		//debug($allcnt);
		$temp_allcnt = $allcnt;
		$allcnt = array();
		foreach($temp_allcnt as $key=>$value){
			$value['10'] = $value['10'] + $value['30'];
			$allcnt[$key] =  $value;
		}
		$this->set('allcnt', $allcnt);


		$first_step = array_keys($custom_step_map);
		$first_step = $first_step['1'];
		$this->set('first_step', $first_step);
		//debug($first_step);


		//Calculate percentage
		$step_percentage = array();
		foreach($allcnt as $key=>$value){
			$p_total = $value[ $first_step ];
			//debug($p_total);debug("ptotal");
			foreach($value as $k=>$v){
				if($k > 1){
					$percentage = $this->calculate_percentage($p_total , $v);
					//debug($percentage);
					$step_percentage[$key][$k] = $percentage;
				}
			}
		}
		//debug($step_percentage);
		$this->set('step_percentage', $step_percentage);









		//Inbound Out Bound Report
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_in_out_calls(%s, '%s', '%s', '%s')",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape(  $s_date." 00:00:00"),
			Sanitize::escape(  $e_date." 23:59:59"),
			Sanitize::escape( date("Y-m-d H:i:s")  )
		);

		$all_results_inout = array();
		$result_count = 0;
		if ($mysqli->multi_query($query)) {
			do {
				/* store first result set */
		        if ($result = $mysqli->store_result()) {
		            while ($row = $result->fetch_assoc()) {
		            	//debug($row['user_id']);

		                if(empty($team_members_floor)){
		                	$all_results_inout[$result_count][] = $row;
		                }else if (in_array($row['user_id'], $team_members_floor)) {
		                	$all_results_inout[$result_count][] = $row;
		                }


		            }
		            $result->free();
		            $result_count++;
		        }
			}while ($mysqli->next_result());
		}

		$usernames = array();

		//debug($all_results_inout);

		//new in
		$new_in_ar = array();

		if(!empty($all_results_inout[0])){
			foreach ($all_results_inout[0] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($new_in_ar[ $newin['user_id'] ])){
					$new_in_ar[ $newin['user_id']  ] = $new_in_ar[ $newin['user_id']  ] + 1;
				}else{
					$new_in_ar[ $newin['user_id']  ] =  1;
				}
			}
		}



		//debug($new_in_ar);
		$this->set('new_in_ar', $new_in_ar);


		//new out
		$new_out_ar = array();
		if(!empty($all_results_inout[1])){
			foreach ($all_results_inout[1] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($new_out_ar[ $newin['user_id'] ])){
					$new_out_ar[ $newin['user_id']  ] = $new_out_ar[ $newin['user_id']  ] + 1;
				}else{
					$new_out_ar[ $newin['user_id']  ] =  1;
				}
			}
		}
		//debug($new_out_ar);
		$this->set('new_out_ar', $new_out_ar);


		//existing in
		$existing_in_ar = array();
		if(!empty($all_results_inout[2])){
			foreach ($all_results_inout[2] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($existing_in_ar[ $newin['user_id'] ])){
					$existing_in_ar[ $newin['user_id']  ] = $existing_in_ar[ $newin['user_id']  ] + 1;
				}else{
					$existing_in_ar[ $newin['user_id']  ] =  1;
				}
			}
		}

		//debug($existing_in_ar);
		$this->set('existing_in_ar', $existing_in_ar);


		//existing out
		$existing_out_ar = array();
		if(!empty($all_results_inout[3])){
			foreach ($all_results_inout[3] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($existing_out_ar[ $newin['user_id'] ])){
					$existing_out_ar[ $newin['user_id']  ] = $existing_out_ar[ $newin['user_id']  ] + 1;
				}else{
					$existing_out_ar[ $newin['user_id']  ] =  1;
				}
			}

		}

		//debug($existing_out_ar);
		$this->set('existing_out_ar', $existing_out_ar);

		//Calls MGR
		$mgr_calls_ar = array();
		if(!empty($all_results_inout[4])){
			foreach ($all_results_inout[4] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($mgr_calls_ar[ $newin['user_id'] ])){
					$mgr_calls_ar[ $newin['user_id']  ] = $mgr_calls_ar[ $newin['user_id']  ] + 1;
				}else{
					$mgr_calls_ar[ $newin['user_id']  ] =  1;
				}
			}
		}

		//debug($mgr_calls_ar);
		$this->set('mgr_calls_ar', $mgr_calls_ar);

		//Closed call out
		//debug($all_results_inout[5]);
		$closed_call_out = array();
		if(!empty($all_results_inout[5])){
			foreach ($all_results_inout[5] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($closed_call_out[ $newin['user_id'] ])){
					$closed_call_out[ $newin['user_id']  ] = $closed_call_out[ $newin['user_id']  ] + 1;
				}else{
					$closed_call_out[ $newin['user_id']  ] =  1;
				}
			}

		}
		$this->set('closed_call_out', $closed_call_out);
		//debug($closed_call_out);



		//Mgr 24hr Call
		$mgr_24hr_calls = array();
		if(!empty($all_results_inout[6])){
			foreach ($all_results_inout[6] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($mgr_24hr_calls[ $newin['user_id'] ])){
					$mgr_24hr_calls[ $newin['user_id']  ] = $mgr_24hr_calls[ $newin['user_id']  ] + 1;
				}else{
					$mgr_24hr_calls[ $newin['user_id']  ] =  1;
				}
			}

		}
		$this->set('mgr_24hr_calls', $mgr_24hr_calls);


		//SMS Text In
		$text_user_names = array();

		$sms_text_in = array();
		if(!empty($all_results_inout[7])){
			foreach ($all_results_inout[7] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				$text_user_names[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($sms_text_in[ $newin['user_id'] ])){
					$sms_text_in[ $newin['user_id']  ] = $sms_text_in[ $newin['user_id']  ] + 1;
				}else{
					$sms_text_in[ $newin['user_id']  ] =  1;
				}
			}

		}
		$this->set('sms_text_in', $sms_text_in);

		//SMS Text Out
		$sms_text_out = array();
		if(!empty($all_results_inout[8])){
			foreach ($all_results_inout[8] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				$text_user_names[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($sms_text_out[ $newin['user_id'] ])){
					$sms_text_out[ $newin['user_id']  ] = $sms_text_out[ $newin['user_id']  ] + 1;
				}else{
					$sms_text_out[ $newin['user_id']  ] =  1;
				}
			}

		}
		$this->set('sms_text_out', $sms_text_out);
		$this->set('text_user_names', $text_user_names);

		// debug($sms_text_out);
		// debug($sms_text_in);
		// debug($text_user_names);


		//debug($usernames);
		$this->set('usernames', $usernames);


		$e_usernames = array();
		$type_ids = array(5,12,6,7);
		$type_count = array();
		foreach( $type_ids as $type_id ){

			$email_sent = $this->email_sent($dealer_id, $s_date, $e_date, $type_id);
			foreach($email_sent as $es){
				$e_usernames[ $es['Contact']['user_id'] ] = $es['Contact']['sperson'];

				if(isset($type_count[$es['Contact']['user_id'] ] [$type_id])){
					$type_count[$es['Contact']['user_id'] ] [$type_id] += 1;
				}else{
					$type_count[$es['Contact']['user_id'] ] [$type_id] = 1;
				}

			}
		}

		//MGR email sent
		$email_mgr = $this->email_sent_mgr($dealer_id, $s_date, $e_date);
		foreach($email_mgr as $es){
			$e_usernames[ $es['Contact']['user_id'] ] = $es['Contact']['sperson'];

			if(isset($type_count[$es['Contact']['user_id'] ] ['mgr'])){
				$type_count[$es['Contact']['user_id'] ] ['mgr'] += 1;
			}else{
				$type_count[$es['Contact']['user_id'] ] ['mgr'] = 1;
			}
		}
		//debug( $type_count );


		$this->set('e_usernames', $e_usernames);
		$this->set('type_count', $type_count);

		//debug( $type_count  );

		//Email Sent MGR





		/*
 		$web_email_sent = $this->email_sent($dealer_id, $s_date, $e_date, 5);
 		debug($web_email_sent);
 		$mobile_email_sent = $this->email_sent($dealer_id, $s_date, $e_date, 12);
 		debug($mobile_email_sent);
 		$phone_email_sent = $this->email_sent($dealer_id, $s_date, $e_date, 6);
 		debug($phone_email_sent);
 		$showroom_email_sent = $this->email_sent($dealer_id, $s_date, $e_date, 7);
 		debug($showroom_email_sent);
 		*/


 		//Events
 		//debug($dealer_id);
 		if(empty($team_members_floor)){
 			$todays_event_con = $this->Contact->today_event_count($zone, $dealer_id, 'Dealer' );
 		}else{
 			$todays_event_con = $this->Contact->today_event_count($zone, $team_members_floor, 'User' );
 		}

 		//debug($todays_event_con);

 		$this->Event->bindModel(array('belongsTo'=>array(
 			'User' => array(
 				'foreignKey' => false,
 				'conditions' => array("Contact.user_id = User.id")
 			)
 		)));
 		$today_events = $this->Event->find('all', array('fields'=>array('Contact.id', 'Contact.user_id', 'Event.user_id', 'User.first_name','User.last_name','User.id', 'User.group_id'),'conditions' => $todays_event_con   ));

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



 		if(empty($team_members_floor)){
 			$over_due_con = $this->Contact->overdue_event_count($zone, $dealer_id, 'Dealer' );
 		}else{
 			$over_due_con = $this->Contact->overdue_event_count($zone, $team_members_floor, 'User',  $this->Auth->User('dealer_id') );
 		}

 		//debug( $over_due_con );



 		$this->Event->bindModel(array('belongsTo'=>array(
 			'User' => array(
 				'foreignKey' => false,
 				'conditions' => array("Contact.user_id = User.id")
 			)
 		)));
		$overdue_events = $this->Event->find('all', array('fields'=>array('Contact.id','Contact.user_id', 'Event.user_id', 'User.first_name','User.last_name','User.id', 'User.group_id'),'conditions' => $over_due_con   ));
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
		//	debug($overdue_events_by_user);


		asort($today_user_id_user_name);
		asort($today_user_id_user_name_internet_sales);
		//debug($today_user_id_user_name_internet_sales);

		$this->set(compact('today_user_id_user_name_internet_sales', 'today_user_id_user_name', 'overdue_events_by_user',   'today_events_by_user'));


		$this->loadModel('Event');
		$events_query = "Select User.id,User.first_name,User.last_name, SUM(If(Event.status = 'Scheduled',1,0)) as scheduled_count,SUM(If((Event.status = 'Completed' && Event.customer_showed != 1 ),1,0)) as noshow_completed_count,SUM(If((Event.status = 'Completed' && Event.customer_showed = 1 ),1,0)) as showed_completed_count,SUM(If(Event.status = 'Canceled',1,0)) as canceled_count from events AS Event LEFT JOIN users as User on Event.user_id = User.id where Event.start >= :s_date AND Event.end <= :e_date AND Event.dealer_id = :dealer_id AND Event.event_type_id IN (20,21) GROUP by Event.user_id;";

		$user_all_events = $this->Event->query($events_query , 	array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date." 00:00:00",
				'e_date' => $e_date." 23:59:59",
		 	));

		$this->set('user_all_events',$user_all_events);


    }

    private function _get_user_list_dealer($dealer_id){
		App::import('model','User');
		$user = new User;
		$users = $user->find('list', array('conditions'=>array('User.group_id'=>$this->ReportUserGroups, 'User.active'=>1,'User.dealer_id'=>$dealer_id)));
		$user_ids = array_keys($users);
		return $user_ids;
	}

	public function email_sent_mgr($dealer_id, $s_date, $e_date){

		$sent_status = $this->Contact->query('
        SELECT `Contact`.`id` contact_id, `Contact`.`company_id` ,  `Contact`.`user_id`, `Contact`.`sperson`
        FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
        LEFT JOIN manager_messages as ManagerMessage ON (`Contact`.`id` = `ManagerMessage`.`contact_id`)

        WHERE `User`.`group_id` IN (1,2,3,4,5,6) AND  User.active = 1
        AND User.active = 1
        AND date_format(`ManagerMessage`.`created`,\'%Y-%m-%d\') between :s_date and :e_date
        AND `Contact`.`company_id` = :company_id
        AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
        ',array('company_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));

		return $sent_status;
	}


	public function email_sent($dealer_id, $s_date, $e_date, $contact_status_id){

		$users = $this->_get_user_list_dealer($dealer_id);
		$userin = array();
		foreach($users as $user){
			$userin[] = $user;
		}
		$user_cond = implode(",", $userin);

/*
$test = '
SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`user_id`, `Contact`.`sperson`
FROM  contacts as Contact  FORCE INDEX(`company_id`)
LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
WHERE
`UserEmailLog`.`user_id` in ('.$user_cond.') AND
 `Contact`.`company_id` = \''.$dealer_id.'\'  AND   date_format(`UserEmailLog`.`send_date`,\'%Y-%m-%d\') between \''.$s_date.'\' and \''.$e_date.'\'
AND `Contact`.`contact_status_id`  = '.$contact_status_id;
debug($test);
*/
		$emailsent = $this->Contact->query('
		SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`user_id`, `Contact`.`sperson`
		FROM  contacts as Contact  FORCE INDEX(`company_id`)
		LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
		WHERE
		`UserEmailLog`.`user_id` in ('.$user_cond.') AND
		 `Contact`.`company_id` = \''.$dealer_id.'\'  AND   date_format(`UserEmailLog`.`send_date`,\'%Y-%m-%d\') between :s_date and :e_date
		AND `Contact`.`contact_status_id`  = '.$contact_status_id
		,array('s_date'=> $s_date, 'e_date'=> $e_date   ));

        $elog = array();
        foreach($emailsent as $el){
            $elog[] = "'".$el['Contact']['contact_id']."'";
        }
        $elog_con = implode(",", $elog);
        $elog_con_str = '';
        if(!empty($elog)){
            $elog_con_str = 'AND `Contact`.`id` NOT IN  ('. $elog_con .')   ';
        }
/*
$test2 = '
SELECT `Contact`.`id` contact_id, `Contact`.`company_id` ,  `Contact`.`user_id`, `Contact`.`sperson`
FROM contacts as Contact  FORCE INDEX(`company_id`)
LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
WHERE '.$this->ReportUserGroupQuery.'  `Contact`.`user_id` in ('.$user_cond.')
AND User.active = 1
'. $elog_con_str .'
AND date_format(`Contact`.`modified`,\'%Y-%m-%d\') between \''.$s_date.'\' and \''.$e_date.'\'
AND `Contact`.`company_id` = \''.$dealer_id.'\'
AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )';
debug($test2);
return false;
*/
        $sent_status = $this->Contact->query('
        SELECT * FROM (
        SELECT `Contact`.`id` contact_id, `Contact`.`company_id` ,  `Contact`.`user_id`, `Contact`.`sperson`,`Contact`.`status`
        FROM contacts as Contact
        LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
        WHERE '.$this->ReportUserGroupQuery.'  `Contact`.`user_id` in ('.$user_cond.')
        AND User.active = 1
        '. $elog_con_str .'
        AND date_format(`Contact`.`modified`,\'%Y-%m-%d\') between :s_date and :e_date
        AND `Contact`.`company_id` = \''.$dealer_id.'\'
        AND `Contact`.`contact_status_id`  = '.$contact_status_id.') AS `x`
        WHERE `x`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
        ',array('s_date'=> $s_date, 'e_date'=> $e_date   ));

        //debug( $emailsent );
       // debug( $sent_status );
        $ar = array_merge($emailsent, $sent_status);
        //debug( $ar );

        return $ar;

	}



    public function realtime_report($s_date = null, $e_date = null){

    	//$this->layout = "default_new";
    	$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
    	//debug( $custom_step_map );

    	$dealer_id = $this->Auth->user('dealer_id');
    	$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//$s_date = '2014-07-09';
		//$e_date = '2014-07-09';
		if($s_date == null && $e_date == null){
			$s_date = date("Y-m-d");
			$e_date = date("Y-m-d");
		}
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

    	App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_stats(%s, '%s', '%s')",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape($s_date),
			Sanitize::escape($e_date)
		);

		$all_results = array();
		$result_count = 0;
		if ($mysqli->multi_query($query)) {
			do {
				/* store first result set */
		        if ($result = $mysqli->store_result()) {
		            while ($row = $result->fetch_assoc()) {
		                $all_results[$result_count][] = $row;
		            }
		            $result->free();
		            $result_count++;
		        }
			}while ($mysqli->next_result());
		}

		//debug($all_results[0]);
		$this->set('results', $all_results[0]);
		$this->set('custom_step_map', $custom_step_map);



        ///////////////Calls and emails




		//Inbound Out Bound Report
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_in_out_calls(%s, '%s', '%s', '%s')",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape(  $s_date),
			Sanitize::escape(  $e_date),
			Sanitize::escape( date("Y-m-d H:i:s")  )
		);

		$all_results_inout = array();
		$result_count = 0;
		if ($mysqli->multi_query($query)) {
			do {
				/* store first result set */
		        if ($result = $mysqli->store_result()) {
		            while ($row = $result->fetch_assoc()) {
		                $all_results_inout[$result_count][] = $row;
		            }
		            $result->free();
		            $result_count++;
		        }
			}while ($mysqli->next_result());
		}

		$usernames = array();

		//new in
		$new_in_ar = array();
		foreach ($all_results_inout[0] as $newin) {
			$usernames[ $newin['user_id'] ] = $newin['sperson'];
			if(isset($new_in_ar[ $newin['user_id'] ])){
				$new_in_ar[ $newin['user_id']  ] = $new_in_ar[ $newin['user_id']  ] + 1;
			}else{
				$new_in_ar[ $newin['user_id']  ] =  1;
			}
		}
		//debug($new_in_ar);
		$this->set('new_in_ar', $new_in_ar);


		//new out
		$new_out_ar = array();
		foreach ($all_results_inout[1] as $newin) {
			$usernames[ $newin['user_id'] ] = $newin['sperson'];
			if(isset($new_out_ar[ $newin['user_id'] ])){
				$new_out_ar[ $newin['user_id']  ] = $new_out_ar[ $newin['user_id']  ] + 1;
			}else{
				$new_out_ar[ $newin['user_id']  ] =  1;
			}
		}
		//debug($new_out_ar);
		$this->set('new_out_ar', $new_out_ar);


		//existing in
		$existing_in_ar = array();
		if(!empty($all_results_inout[2])){
			foreach ($all_results_inout[2] as $newin) {
				$usernames[ $newin['user_id'] ] = $newin['sperson'];
				if(isset($existing_in_ar[ $newin['user_id'] ])){
					$existing_in_ar[ $newin['user_id']  ] = $existing_in_ar[ $newin['user_id']  ] + 1;
				}else{
					$existing_in_ar[ $newin['user_id']  ] =  1;
				}
			}
		}
		//debug($existing_in_ar);
		$this->set('existing_in_ar', $existing_in_ar);


		//existing out
		$existing_out_ar = array();
		foreach ($all_results_inout[3] as $newin) {
			$usernames[ $newin['user_id'] ] = $newin['sperson'];
			if(isset($existing_out_ar[ $newin['user_id'] ])){
				$existing_out_ar[ $newin['user_id']  ] = $existing_out_ar[ $newin['user_id']  ] + 1;
			}else{
				$existing_out_ar[ $newin['user_id']  ] =  1;
			}
		}
		//debug($existing_out_ar);
		$this->set('existing_out_ar', $existing_out_ar);



		//debug($usernames);
		$this->set('usernames', $usernames);


		$e_usernames = array();
		$type_ids = array(5,12,6,7);
		$type_count = array();
		foreach( $type_ids as $type_id ){

			$email_sent = $this->email_sent($dealer_id, $s_date, $e_date, $type_id);
			foreach($email_sent as $es){
				$e_usernames[ $es['Contact']['user_id'] ] = $es['Contact']['sperson'];

				if(isset($type_count[$es['Contact']['user_id'] ] [$type_id])){
					$type_count[$es['Contact']['user_id'] ] [$type_id] += 1;
				}else{
					$type_count[$es['Contact']['user_id'] ] [$type_id] = 1;
				}

			}
		}
		$this->set('e_usernames', $e_usernames);
		$this->set('type_count', $type_count);






    }





	public function details(){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);


		$dealer_id = $this->Auth->user('dealer_id');
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		$month_name = date('F', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('month_name',$month_name);

		//debug( $this->request->query );
		$type = $this->request->query['type'];
		$step = $this->request->query['step'];
		$contact_status_id = $this->request->query['contact_status_id'];
		$user_id = $this->request->query['user_id'];

		$conditions = array();
		if($type == 'breakdown'){
			$conditions['Contact.status <>'] = 'Duplicate-Closed';
			if($contact_status_id != 0){
				$conditions['Contact.contact_status_id'] = $contact_status_id;
			}
			$conditions['Contact.user_id'] = $user_id;
			$conditions['Contact.sales_step'] = $step;
			$conditions['Contact.company_id'] = $dealer_id;
			$conditions["date_format(Contact.modified,'%Y-%m')"] = $month;
		}else if($type == 'month_totals'){

			$conditions['Contact.status <>'] = 'Duplicate-Closed';
			if($contact_status_id != 0){
				$conditions['Contact.contact_status_id'] = $contact_status_id;
			}
			$conditions['Contact.sales_step'] = $step;
			$conditions['Contact.company_id'] = $dealer_id;
			$conditions["date_format(Contact.modified,'%Y-%m')"] = $month;

		}

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
			'Contact.mobile',
			'Contact.phone',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.lead_status',
			'Contact.status',
			'Contact.chk_duplicate',
			'Contact.source',
			'Contact.notes',

		);

		$this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		$contacts = $this->Contact->find('all', array('fields'=>$fields,'conditions' => $conditions, 'order' => array('Contact.id' => 'DESC')));
		$this->set('contacts', $contacts);
		//debug($contacts);



	}

	private function _salesperson_stage_breakdown($dealer_id, $month, $contact_status_id, $report_type, $active_inactive = "active",$show_group=null){

		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			$dealer_id=implode(',',$dealer_id);


		}
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		$procedure_name = "salesperson_stage_breakdown";
		if($active_inactive == "inactive"){
			$procedure_name = "salesperson_stage_breakdown_inactive";
		}


		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL ".$procedure_name."('$dealer_id', '%s', $contact_status_id, '$report_type')",
		 	//Sanitize::escape($dealer_id),
			Sanitize::escape($month)
		);
        $results = array();

		$steps_map = array();
		$steps_map['Greet'] = 1;
		$steps_map['Identify'] = 2;
		$steps_map['Present'] = 3;
		$steps_map['Sit_Down'] = 4;
		$steps_map['Write_Up'] = 5;
		$steps_map['Close'] = 6;
		$steps_map['Finance'] = 7;
		$steps_map['Sold'] = 8;

		$steps_count = array();
		$steps_map[1] = 0;
		$steps_map[2] = 0;
		$steps_map[3] = 0;
		$steps_map[4] = 0;
		$steps_map[5] = 0;
		$steps_map[6] = 0;
		$steps_map[7] = 0;
		$steps_map[8] = 0;



        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
				//debug($row);
				foreach($row as $key=>$value){
					if($key == 'user_id' || $key == 'sperson' || $key == 'Pending' ) continue;
					$stepnum = $steps_map[$key];
					$steps_count[$stepnum] = $value;

					for($i=$stepnum-1; $i>=1; $i--){
						 $steps_count[$i] +=  $value;
					}



				}
				$output_ar['user_id'] = $row ['user_id'];
				$output_ar['Pending'] = $row ['Pending'];
				$output_ar['sperson'] =  $row ['first_name']." ".$row ['last_name'];

				$output_ar['avg_Greet'] = $row ['avg_Greet'];
				$output_ar['avg_Identify'] = $row ['avg_Identify'];
				$output_ar['avg_Present'] = $row ['avg_Present'];
				$output_ar['avg_Sit_Down'] = $row ['avg_Sit_Down'];
				$output_ar['avg_Write_Up'] = $row ['avg_Write_Up'];
				$output_ar['avg_Close'] = $row ['avg_Close'];
				$output_ar['avg_Finance'] = $row ['avg_Finance'];
				$output_ar['avg_Sold'] = $row ['avg_Sold'];


				foreach($steps_count as $key=>$value){
					$output_ar[ array_search($key,$steps_map)  ] = $value;
				}
				$results[] = $output_ar;
            }
        }

		return $results;

	}

	private function _inbound_outcound($dealer_id, $month, $inout){
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL inout_breakdown(%s, '%s', '$inout')",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape($month),
			Sanitize::escape($inout)
		);
        $results = array();

		$steps_map = array();
		$steps_map['Meet'] = 1;
		$steps_map['Greet'] = 2;
		$steps_map['Probe'] = 3;
		$steps_map['Identify'] = 4;
		$steps_map['Present'] = 5;
		$steps_map['Write_Up'] = 6;
		$steps_map['Close_the_deal'] = 7;
		$steps_map['Finance'] = 8;
		$steps_map['Deliver'] = 9;

		$steps_count = array();
		$steps_map[1] = 0;
		$steps_map[2] = 0;
		$steps_map[3] = 0;
		$steps_map[4] = 0;
		$steps_map[5] = 0;
		$steps_map[6] = 0;
		$steps_map[7] = 0;
		$steps_map[8] = 0;
		$steps_map[9] = 0;

        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
               foreach($row as $key=>$value){
					if($key == 'user_id' || $key == 'sperson') continue;
					$stepnum = $steps_map[$key];
					$steps_count[$stepnum] = $value;
					for($i=$stepnum-1; $i>=1; $i--){
						 $steps_count[$i] +=  $value;
					}
				}
				$output_ar['user_id'] = $row ['user_id'];
				$output_ar['sperson'] = $row ['sperson'];
				foreach($steps_count as $key=>$value){
					$output_ar[ array_search($key,$steps_map)  ] = $value;
				}
				$results[] = $output_ar;
            }
        }
		return $results;
	}

	//Deal register total
	public function index() {

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$dealer_id = $this->Auth->user('dealer_id');
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		$month_name = date('F', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('month_name',$month_name);


		//Deal Register total
		$deal_registers = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'all_user');
		$this->set('deal_registers',$deal_registers[0]);
		//debug($deal_registers);

		//salesperson Stage breakdown (Total)
		$salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'user_group');
		$this->set('salesperson_breakdown',$salesperson_breakdown);
		//debug($salesperson_breakdown);

		/*********Inactive***********/
		//Deal Register total (Inactive)
		$deal_registers_inactive = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'all_user', "inactive");
		$this->set('deal_registers_inactive',$deal_registers_inactive[0]);

		//salesperson Stage breakdown (Total) (Inactive)
		$salesperson_breakdown_inactive = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'user_group', "inactive");
		$this->set('salesperson_breakdown_inactive',$salesperson_breakdown_inactive);
		/***************Inactive***************/


		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown($dealer_id, $month, 7, 'all_user');
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		//salesperson Stage breakdown (Total)
		$showroom_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 7, 'user_group');
		$this->set('showroom_salesperson_breakdown',$showroom_salesperson_breakdown);


		//Web Site
		$deal_registers_web =$this->_salesperson_stage_breakdown($dealer_id, $month, 5, 'all_user');
		$this->set('deal_registers_web',$deal_registers_web[0]);
		//salesperson Stage breakdown (Total)
		$web_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 5, 'user_group');
		$this->set('web_salesperson_breakdown',$web_salesperson_breakdown);

		//mobile
		$deal_registers_mobile =$this->_salesperson_stage_breakdown($dealer_id, $month, 12, 'all_user');
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		//salesperson Stage breakdown (Total)
		$mobile_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 12, 'user_group');
		$this->set('mobile_salesperson_breakdown',$mobile_salesperson_breakdown);

		//phone
		$deal_registers_phone =$this->_salesperson_stage_breakdown($dealer_id, $month, 6, 'all_user');
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		//salesperson Stage breakdown (Total)
		$phone_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 6, 'user_group');
		$this->set('phone_salesperson_breakdown',$phone_salesperson_breakdown);

		/*
		//Outbound Calls
		$outbound_salesperson_breakdown = $this->_inbound_outcound($dealer_id, $month, 'out');
		$this->set('outbound_salesperson_breakdown',$outbound_salesperson_breakdown);

		//inbound Calls
		$inbound_salesperson_breakdown = $this->_inbound_outcound($dealer_id, $month, 'in');
		$this->set('inbound_salesperson_breakdown',$inbound_salesperson_breakdown);
		*/



	}

	public function crmreport_index($show_group=null) {

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$this->view='index';
		$dealer_id = $this->Auth->user('dealer_id');
		if(is_numeric($show_group)&& !is_null($show_group))
		{
			$dealer_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		$month_name = date('F', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('month_name',$month_name);


		//Deal Register total
		$deal_registers = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'all_user',"active",$show_group);
		$this->set('deal_registers',$deal_registers[0]);
		//debug($deal_registers);

		//salesperson Stage breakdown (Total)
		$salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'user_group',"active",$show_group);
		$this->set('salesperson_breakdown',$salesperson_breakdown);
		//debug($salesperson_breakdown);

		/*********Inactive***********/
		//Deal Register total (Inactive)
		$deal_registers_inactive = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'all_user', "inactive",$show_group);
		$this->set('deal_registers_inactive',$deal_registers_inactive[0]);

		//salesperson Stage breakdown (Total) (Inactive)
		$salesperson_breakdown_inactive = $this->_salesperson_stage_breakdown($dealer_id, $month, 0, 'user_group', "inactive",$show_group);
		$this->set('salesperson_breakdown_inactive',$salesperson_breakdown_inactive);
		/***************Inactive***************/


		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown($dealer_id, $month, 7, 'all_user',"active",$show_group);
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		//salesperson Stage breakdown (Total)
		$showroom_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 7, 'user_group',"active",$show_group);
		$this->set('showroom_salesperson_breakdown',$showroom_salesperson_breakdown);


		//Web Site
		$deal_registers_web =$this->_salesperson_stage_breakdown($dealer_id, $month, 5, 'all_user',"active",$show_group);
		$this->set('deal_registers_web',$deal_registers_web[0]);
		//salesperson Stage breakdown (Total)
		$web_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 5, 'user_group',"active",$show_group);
		$this->set('web_salesperson_breakdown',$web_salesperson_breakdown);

		//mobile
		$deal_registers_mobile =$this->_salesperson_stage_breakdown($dealer_id, $month, 12, 'all_user',"active",$show_group);
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		//salesperson Stage breakdown (Total)
		$mobile_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 12, 'user_group',"active",$show_group);
		$this->set('mobile_salesperson_breakdown',$mobile_salesperson_breakdown);

		//phone
		$deal_registers_phone =$this->_salesperson_stage_breakdown($dealer_id, $month, 6, 'all_user',"active",$show_group);
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		//salesperson Stage breakdown (Total)
		$phone_salesperson_breakdown = $this->_salesperson_stage_breakdown($dealer_id, $month, 6, 'user_group',"active",$show_group);
		$this->set('phone_salesperson_breakdown',$phone_salesperson_breakdown);

		/*
		//Outbound Calls
		$outbound_salesperson_breakdown = $this->_inbound_outcound($dealer_id, $month, 'out');
		$this->set('outbound_salesperson_breakdown',$outbound_salesperson_breakdown);

		//inbound Calls
		$inbound_salesperson_breakdown = $this->_inbound_outcound($dealer_id, $month, 'in');
		$this->set('inbound_salesperson_breakdown',$inbound_salesperson_breakdown);
		*/



	}


	//Deal register total
	public function master_report_allsteps() {

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//debug( $this->request->query );

		if(!empty($this->request->named['view_type']) && $this->request->named['view_type'] == 'print'){
			$this->layout = 'print_layout';
		}


		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->user('zone');

		$stat_year = $this->request->query['stat_year'];

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);
		$this->public_multi_deal_higher_step = $multi_deal_higher_step;


		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map',$custom_step_map);

		//debug($custom_step_map);

		$this->CUSTOM_STEP_MAP = $custom_step_map;
		//debug($custom_step_map);

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){

			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

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


		//debug($month);
		//Deal Register total
		$deal_registers = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 0, 'all_user');
		$this->set('deal_registers',$deal_registers[0]);
		//debug($deal_registers);

		//salesperson Stage breakdown (Total)
		$salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 0, 'user_group');
		$this->set('salesperson_breakdown',$salesperson_breakdown);
		//debug($salesperson_breakdown);

		// /*********Inactive***********/
		// //Deal Register total (Inactive)
		// $deal_registers_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 0, 'all_user', "inactive");
		// $this->set('deal_registers_inactive',$deal_registers_inactive[0]);
		// //debug($deal_registers_inactive);

		// //salesperson Stage breakdown (Total) (Inactive)
		// $salesperson_breakdown_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 0, 'user_group', "inactive");
		// $this->set('salesperson_breakdown_inactive',$salesperson_breakdown_inactive);
		// //debug($salesperson_breakdown_inactive);
		// /***************Inactive***************/


		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 7, 'all_user');
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		//salesperson Stage breakdown (Total)
		$showroom_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 7, 'user_group');
		$this->set('showroom_salesperson_breakdown',$showroom_salesperson_breakdown);


		//Web Site
		$deal_registers_web =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 5, 'all_user');
		$this->set('deal_registers_web',$deal_registers_web[0]);
		//salesperson Stage breakdown (Total)
		$web_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 5, 'user_group');
		$this->set('web_salesperson_breakdown',$web_salesperson_breakdown);

		//mobile
		$deal_registers_mobile =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 12, 'all_user');
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		//salesperson Stage breakdown (Total)
		$mobile_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 12, 'user_group');
		$this->set('mobile_salesperson_breakdown',$mobile_salesperson_breakdown);

		//phone
		$deal_registers_phone =$this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 6, 'all_user');
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		//salesperson Stage breakdown (Total)
		$phone_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 6, 'user_group');
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

	}

	public function crmreport_master_report_allsteps($show_group=null){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$this->view='master_report_allsteps';
		$dealer_id = $this->Auth->user('dealer_id');
		if(is_numeric($show_group)&& !is_null($show_group))
		{
			$dealer_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		if(!empty($this->request->named['view_type']) && $this->request->named['view_type'] == 'print'){
			$this->layout = 'print_layout';
		}

		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		$month_name = date('F', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('month_name',$month_name);

		$this->set('dealer_id',$dealer_id);
		$stat_year = $this->request->query['stat_year'];

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);
		$this->public_multi_deal_higher_step = $multi_deal_higher_step;


		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map',$custom_step_map);

		//debug($custom_step_map);

		$this->CUSTOM_STEP_MAP = $custom_step_map;


		//Deal Register total
		$deal_registers = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 0, 'all_user',"active",$show_group);
		$this->set('deal_registers',$deal_registers[0]);
		//debug($deal_registers);

		//salesperson Stage breakdown (Total)
		$salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 0, 'user_group',"active",$show_group);
		$this->set('salesperson_breakdown',$salesperson_breakdown);
		//debug($salesperson_breakdown);

		/*********Inactive***********/
		//Deal Register total (Inactive)
		$deal_registers_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 0, 'all_user', "inactive",$show_group);
		$this->set('deal_registers_inactive',$deal_registers_inactive[0]);

		//salesperson Stage breakdown (Total) (Inactive)
		$salesperson_breakdown_inactive = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 0, 'user_group', "inactive",$show_group);
		$this->set('salesperson_breakdown_inactive',$salesperson_breakdown_inactive);
		/***************Inactive***************/


		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 7, 'all_user',"active",$show_group);
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);
		//salesperson Stage breakdown (Total)
		$showroom_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 7, 'user_group',"active",$show_group);
		$this->set('showroom_salesperson_breakdown',$showroom_salesperson_breakdown);


		//Web Site
		$deal_registers_web =$this->_salesperson_stage_breakdown_all($dealer_id, $month, 5, 'all_user',"active",$show_group);
		$this->set('deal_registers_web',$deal_registers_web[0]);
		//salesperson Stage breakdown (Total)
		$web_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 5, 'user_group',"active",$show_group);
		$this->set('web_salesperson_breakdown',$web_salesperson_breakdown);

		//mobile
		$deal_registers_mobile =$this->_salesperson_stage_breakdown_all($dealer_id, $month, 12, 'all_user',"active",$show_group);
		$this->set('deal_registers_mobile',$deal_registers_mobile[0]);
		//salesperson Stage breakdown (Total)
		$mobile_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 12, 'user_group',"active",$show_group);
		$this->set('mobile_salesperson_breakdown',$mobile_salesperson_breakdown);

		//phone
		$deal_registers_phone =$this->_salesperson_stage_breakdown_all($dealer_id, $month, 6, 'all_user',"active",$show_group);
		$this->set('deal_registers_phone',$deal_registers_phone[0]);
		//salesperson Stage breakdown (Total)
		$phone_salesperson_breakdown = $this->_salesperson_stage_breakdown_all($dealer_id, $month, 6, 'user_group',"active",$show_group);
		$this->set('phone_salesperson_breakdown',$phone_salesperson_breakdown);


	}

	public function master_report_pending($lead_status, $stat_type = null, $user_id = '0'){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);


		 $dealer_id = $this->Auth->user('dealer_id');
		// $stats_month = date('m');
		// if( $this->Session->check("stats_month") ){
		// 	$stats_month = $this->Session->read("stats_month");
		// }
		// $month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));

		$s_date = $this->request->query['s_date'];
		$e_date = $this->request->query['e_date'];

		// debug($s_date);
		// debug($e_date);

		if($stat_type == 'deal_registers'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date , 0, 'all_user');

			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_showroom'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 7, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_web'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 5, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_mobile'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 12, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_phone'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 6, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_inactive'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 0, 'all_user', "inactive");
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}


		if($stat_type == 'salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 0, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'salesperson_breakdown_inactive'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 0, 'user_group',"inactive");
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}


		if($stat_type == 'showroom_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 7, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'web_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 5, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'mobile_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 12, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'phone_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $s_date, $e_date, 6, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}

		//debug($pending_value);

		//Next Activity
		$contact_ids = array();
		foreach($pending_value as $ndata){
			$contact_ids[] = $ndata['id'];
		}
		//debug($contact_ids);
		$this->loadModel('Event');
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);







	}




	public function crmreport_master_report_pending($lead_status, $stat_type = null, $user_id = '0'){

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$dealer_id = $this->Auth->user('dealer_id');
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$month = date('Y-m', strtotime(date("Y")."-".$stats_month."-01"));
		debug($month);

		if($stat_type == 'deal_registers'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 0, 'all_user');

			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_showroom'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 7, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_web'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 5, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_mobile'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 12, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_phone'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 6, 'all_user');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'deal_registers_inactive'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 0, 'all_user', "inactive");
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}


		if($stat_type == 'salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 0, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'salesperson_breakdown_inactive'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 0, 'user_group',"inactive");
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}


		if($stat_type == 'showroom_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 7, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'web_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 5, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'mobile_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 12, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}
		if($stat_type == 'phone_salesperson_breakdown'){
			$deal_registers = $this->_salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $month, 6, 'user_group');
			$pending_value = $deal_registers;
			$this->set('pending_value',$pending_value);
		}

		//debug($pending_value);

		//Next Activity
		$contact_ids = array();
		foreach($pending_value as $ndata){
			$contact_ids[] = $ndata['id'];
		}
		//debug($contact_ids);
		$this->loadModel('Event');
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);



		$this->render('master_report_pending');





	}
















	private function _salesperson_stage_breakdown_all_popup($lead_status, $user_id, $dealer_id, $first_day_this_month, $last_day_this_month , $contact_status_id, $report_type, $active_inactive = "active",$show_group=null){

		// debug($first_day_this_month);
		// debug($last_day_this_month);

		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			$dealer_id=implode(',',$dealer_id);


		}
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		$procedure_name = "salesperson_stage_breakdown_all_popup";
		// if($active_inactive == "inactive"){
		// 	$procedure_name = "salesperson_stage_breakdown_inactive_all_popup";
		// }

		// $first_day_this_month = date('Y-m-01 00:00:00', strtotime($month."-01"));
  		// $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($month."-01"));

		$first_day_this_month = $first_day_this_month.' 00:00:00';
        $last_day_this_month  = $last_day_this_month.' 23:59:59';


		App::uses('Sanitize', 'Utility');
		///debug(  "CALL ".$procedure_name."('$dealer_id', '$month', $contact_status_id, '$report_type', '$user_id', '$lead_status')"  );

		$query = sprintf("CALL ".$procedure_name."('$dealer_id', '%s','%s', $contact_status_id, '$report_type', '$user_id','$lead_status')",
		 	//Sanitize::escape($dealer_id),
			Sanitize::escape($first_day_this_month),
			Sanitize::escape($last_day_this_month)
		);

		//echo $query;

        $results = array();
		$steps_count = array();

        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {

				//debug($row);

				$output_ar = $row;
				$results[] = $output_ar;
            }
        }
       // debug( $results );

		return $results;

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

					//Remove Pending step for Showroom
					if($contact_status_id == '7'){
						$pending_step = array_search('2' ,$lower_steps);
						if($pending_step !== false){
							unset($lower_steps[ $pending_step ]);
						}
					}


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

	/*
	Freedom Group Garage Report
	*/
	public function master_garage_report()
	{


		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//debug( $this->request->query );

		if(!empty($this->request->named['view_type']) && $this->request->named['view_type'] == 'print'){
			$this->layout = 'print_layout';
		}


		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->user('zone');

		$stat_year = $this->request->query['stat_year'];

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);
		$this->public_multi_deal_higher_step = $multi_deal_higher_step;


		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		//$custom_step_map['30'] = 'Sold (Multi-Vehicle)';
		$this->set('custom_step_map',$custom_step_map);

		//debug($custom_step_map);

		$this->CUSTOM_STEP_MAP = $custom_step_map;
		//debug($custom_step_map);

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){

			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

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

		$this->loadModel('LeadSold');

		//showroom
		$deal_registers_showroom = $this->_salesperson_stage_breakdown_all($dealer_id, $s_date, $e_date, 7, 'all_user');
		$this->set('deal_registers_showroom',$deal_registers_showroom[0]);


		//Web Site sold lead count
		$sold_conditions = array('LeadSold.company_id' => $dealer_id,'LeadSold.modified >=' => $s_date,'LeadSold.modified <=' =>$e_date);
		$sold_conditions['LeadSold.contact_status_id'] = 5;
		$web_sold_count = $this->LeadSold->find('count',array('conditions' => $sold_conditions));



		//mobile sold lead count
		$sold_conditions['LeadSold.contact_status_id'] = 12;
		$mobile_sold_count = $this->LeadSold->find('count',array('conditions' => $sold_conditions));

		//phone sold lead count
		$sold_conditions['LeadSold.contact_status_id'] = 6;
		$phone_sold_count = $this->LeadSold->find('count',array('conditions' => $sold_conditions));

		$this->set(compact('web_sold_count','mobile_sold_count','phone_sold_count'));

	}

    public function all_lead_details() {
        $filters = array(
            //'if(Contact.status<>"Duplicate-Closed",if(Contact.created = Contact.modified,1,0),0)',
            //array('Contact.created'=>'Contact.modified'),
            'Contact.user_id IS NULL',
            'if(Contact.status<>"Duplicate-Closed",if(Contact.created = Contact.modified,1,0),0) = 1',
            'if(TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 5, 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 5 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 10), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 10 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 15), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 15 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 20), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 20 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 30), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 30 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 45), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 45 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 60), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 60 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 90), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 90 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 120), 1, 0) = 1',
            'if((TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 120 && TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) <= 180), 1, 0) = 1',
            'if(TIMESTAMPDIFF(MINUTE,Contact.created,Contact.first_modified) > 180, 1, 0) = 1',
        );

        $filter = (!empty($this->request->query['filter'])) ? $this->request->query['filter'] : 0;
        $ord = (!empty($this->request->query['ord'])) ? $this->request->query['ord'] : 'Contact.id';
        $s_date = (!empty($this->request->query['start_date'])) ? $this->request->query['start_date'] : 'NOW() - INTERVAL 30 DAYS';
        $e_date = (!empty($this->request->query['end_date'])) ? $this->request->query['end_date'] : 'NOW()';
        $user_id = $this->request->query['user_id'];
        $dealer_id = $this->Auth->user('dealer_id');
        $cond = array(
            $filters[$filter],
            'Contact.company_id' => $dealer_id,
            'Contact.created >=' => $s_date,
            'Contact.created <=' => $e_date,
            'Contact.contact_status_id' => '5',
            'Contact.user_id' => $user_id,
        );

        $fields = array(
            'Contact.id','Contact.first_name, Contact.m_name, Contact.last_name','Contact.mobile', 'Contact.condition', 'Contact.year','Contact.make','Contact.model','Contact.sperson','Contact.created','Contact.modified','Contact.first_modified','Contact.sales_step','Contact.status','Contact.lead_status','Contact.contact_status_id','Contact.notes',
        );
        $this->paginate = array(
            'conditions' => $cond,
            'fields' => $fields,
            //'order' => $ord,
            'limit' => 30,
        );
        $this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
        $lead_list = $this->Paginate('Contact');

        $this->set('lead_list',$lead_list);

/*
		$this->set('report_type', $report_type);

		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('list', array('fields'=>array('SalesStep.id','SalesStep.step') ));
		$this->set('sales_steps', $sales_steps);

		$this->loadModel('ContactStatus');
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name') ));
		$this->set('ContactStatus', $ContactStatus);
*/

		$this->render("all_lead_details");
    }

	public function weblead_response_time_report()
	{

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		//debug( $this->request->query );

		if(!empty($this->request->named['view_type']) && $this->request->named['view_type'] == 'print'){
			$this->layout = 'print_layout';
		}


		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->user('zone');

		$stat_year = $this->request->query['stat_year'];

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){

			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$s_date = $s_date.' 00:00:00';
			$e_date = $e_date.' 23:59:59';

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
			if($month == '2016-08'){
				$s_date = date('Y-m-19 00:00:00', strtotime($month."-01"));
			}else{
				$s_date = date('Y-m-01 00:00:00', strtotime($month."-01"));
			}
			$e_date = date('Y-m-t 23:59:59', strtotime($month."-01"));

        	$this->set('s_date',$s_date);
			$this->set('e_date',$e_date);
		}
		$this->loadModel('Contact');

		$webtime_result_data = $this->Contact->query("
                            SELECT `Contact`.`sperson`,`Contact`.`user_id`,
                            `Contact2`.ww_notworked,
							SUM(if(TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 5, 1, 0)) AS ww_5min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 5 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 10), 1, 0)) AS ww_10min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 10 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 15), 1, 0)) AS ww_15min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 15 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 20), 1, 0)) AS ww_20min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 20 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 30), 1, 0)) AS ww_30min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 30 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 45), 1, 0)) AS ww_45min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 45 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 60), 1, 0)) AS ww_60min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 60 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 90), 1, 0)) AS ww_90min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 90 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 120), 1, 0)) AS ww_120min,
							SUM(if((TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 120 && TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) <= 180), 1, 0)) AS ww_180min,
							SUM(if(TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`) > 180, 1, 0)) AS ww_200min,
							AVG(TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`)) AS ww_avg_min
							from contacts `Contact`
                            join (
								select user_id, SUM(if(`status`<>'Duplicate-Closed',if(`created` = `modified`,1,0),0)) AS ww_notworked
								from contacts
								where
									`company_id` = :dealer_id AND `created` >= :s_date  AND `created` <= :e_date AND `contact_status_id` = 5
								group by `user_id`
							) as `Contact2` on`Contact`.`user_id` = `Contact2`.`user_id`
                            where `Contact`.`company_id` = :dealer_id AND
							`Contact`.`created` >= :s_date  AND `Contact`.`created` <= :e_date AND
							`Contact`.`contact_status_id` = 5
							AND `Contact`.`first_modified` IS NOT NULL
                            group by `Contact`.`user_id`	;
		",array('dealer_id' => $dealer_id,'s_date' => $s_date,'e_date' => $e_date));

	$dealer_avg_time = $this->Contact->query("select `Contact`.`company_id`,

							AVG(TIMESTAMPDIFF(MINUTE,`Contact`.`created`,`Contact`.`first_modified`)) AS ww_avg_min
							from contacts `Contact`  where `Contact`.`company_id` = :dealer_id AND
							`Contact`.`created` >= :s_date  AND `Contact`.`created` <= :e_date AND
							`Contact`.`contact_status_id` = 5 AND
							`Contact`.`first_modified` IS NOT NULL group by `Contact`.`company_id`	;
		",array('dealer_id' => $dealer_id,'s_date' => $s_date,'e_date' => $e_date));

    $unassigned_lead_cnt = $this->Contact->query("
    SELECT
        COUNT(*) as `count` from contacts as `Contact`
    WHERE
        `Contact`.`company_id` = :dealer_id AND
        `Contact`.`created` >= :s_date  AND `Contact`.`created` <= :e_date AND
        `Contact`.`contact_status_id` = 5 AND
        `Contact`.`user_id` IS NULL;
    ",array('dealer_id' => $dealer_id,'s_date' => $s_date,'e_date' => $e_date));


	$this->set(compact('webtime_result_data','dealer_avg_time','unassigned_lead_cnt'));


	}

}

?>
