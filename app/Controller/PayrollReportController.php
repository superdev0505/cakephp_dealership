<?php
class PayrollReportController extends AppController {

 	public $uses = array('Contact','User','Events','EventTypes','Events_users');
    public $components = array('RequestHandler');
    public $ReportUserGroups = array(1,2,3,4,5,6,10,11);
    public $ReportUserGroupQuery = "`User`.`group_id` in (1,2,3,4,5,6,10,11) AND ";


	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {

		$this->layout = "ajax";

		$userinfo = $this->Auth->user();
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

        $month = (!is_null($this->request->query['month'])) ? $this->request->query['month'] : date('m');

        $this->set('month', $month);

        $dateString = date('Y')."-".$month;
        
		$report_month = date('Y-m', strtotime($dateString));
		$this->set('month_stat_label', strtoupper(date('M-Y', strtotime($dateString))) );


		$today = date('Y-m-d', strtotime("2015-01-15"));
		$this->set('today',$today);
		$this->set('userinfo',$userinfo);

		$dealers = $this->get_dealer_ids();
		$this->set('dealers',$dealers);

		$internet_stuffs = $this->get_internet_stuffs();
		$this->set('internet_stuffs',$internet_stuffs);

        $web_phone_stat = $this->web_phone_lead_count($dealers, $report_month);
		$this->set('web_phone_stat',$web_phone_stat);

		$event_agent_closer = $this->event_agent_closer($dealers, $report_month);
		$this->set('event_agent_closer',$event_agent_closer);

		$bdc_app_shows = $this->bdc_app_shows($dealers, $report_month);
		$this->set('bdc_app_shows',$bdc_app_shows);
		//debug($bdc_app_shows);


		$app_today_showed = $this->app_today_showed($dealers, $today);
		$this->set('app_today_showed',$app_today_showed);
		//debug($app_today_showed);

		$unit_solds_month = $this->unit_solds_month($dealers, $report_month);
		$this->set('unit_solds_month',$unit_solds_month);
		//debug($unit_solds_month);
	}

	 public function get_dealer_ids(){

    	$user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => array('User.username' => $this->Auth->User('username'))));
    	return $user_active;
    }

    public function get_internet_stuffs(){
    	$internet_stuffs = array();

		$dids_stuff = $this->get_dealer_ids();
		$dealer_id_stuff = array();
		foreach ($dids_stuff as $key => $value) {
			$dealer_id_stuff[] = $key;
		}


		$stuffs = $this->User->find('all', array('order'=>"User.first_name", 'fields'=>array('User.username','User.first_name','User.last_name','User.dealer_id'),
		 'conditions'=>array("User.active"=>'1', "User.dealer_id"=>$dealer_id_stuff,'User.group_id'=>array('10','11','12'))));
		foreach ($stuffs as $stuff) {
			$internet_stuffs[ $stuff['User']['username'] ] = $stuff['User']['first_name']." ".$stuff['User']['last_name'];
		}
		return $internet_stuffs;
    }




/**
 * event set for agent and closer
 * dealership and users
 */
	public function app_today_showed($dealers, $today){

		//$today = '2015-03-07'		;

		$location_stat = array();
    	$closer_agent_stat = array();

    	//Appointments Set for Today
    	foreach ($dealers as $dealer_id => $dealer_name) {
    		$events = $this->Contact->query(" SELECT   count(`User`.id) as app_cnt, `User`.group_id, `User`.username FROM `crmdeva1_crm2`.`events` AS `Event`
			LEFT JOIN `crmdeva1_crm2`.`contacts` AS `Contact` ON (`Event`.`contact_id` = `Contact`.`id`)
			LEFT JOIN `crmdeva1_crm2`.`users` AS `User` ON (`Event`.`user_id` = `User`.`id`)
			WHERE `User`.`active` = '1' AND `User`.`group_id` IN (10, 11) AND  `Contact`.`contact_status_id` in ('5','6') AND `Event`.`status` not in ('Completed','Canceled')
			AND date_format(`Event`.`start`,'%Y-%m-%d') = '".$today."' AND Contact.company_id = :company_id group by User.id", array('company_id'=>$dealer_id) );
    		//debug($events);
    		foreach ($events as $event) {
				if (isset($location_stat[ $dealer_id ][ $event['User']['group_id'] ])){
					$location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  += $event['0']['app_cnt'] ;
				}else{
					$location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  = $event['0']['app_cnt'] ;
				}
				//User Stat
				$closer_agent_stat[ $dealer_id ][ $event['User']['username'] ][ $event['User']['group_id'] ] = $event['0']['app_cnt'];
    		}
    	}

    	//Appointments Showed Up
    	$showed_location_stat = array();
    	$showed_closer_agent_stat = array();

    	foreach ($dealers as $dealer_id => $dealer_name) {
    		$events = $this->Contact->query(" SELECT   count(`User`.id) as app_cnt, `User`.group_id, `User`.username FROM `crmdeva1_crm2`.`events` AS `Event`
			LEFT JOIN `crmdeva1_crm2`.`contacts` AS `Contact` ON (`Event`.`contact_id` = `Contact`.`id`)
			LEFT JOIN `crmdeva1_crm2`.`users` AS `User` ON (`Event`.`user_id` = `User`.`id`)
			WHERE `User`.`active` = '1' AND `User`.`group_id` IN (10, 11) AND  `Contact`.`contact_status_id` in ('5','6') AND `Event`.`status` = 'In Progress'
			 AND Contact.company_id = :company_id group by User.id", array('company_id'=>$dealer_id) );
    		//debug($events);
    		foreach ($events as $event) {
				if (isset($showed_location_stat[ $dealer_id ][ $event['User']['group_id'] ])){
					$showed_location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  += $event['0']['app_cnt'] ;
				}else{
					$showed_location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  = $event['0']['app_cnt'] ;
				}
				//User Stat
				$showed_closer_agent_stat[ $dealer_id ][ $event['User']['username'] ][ $event['User']['group_id'] ] = $event['0']['app_cnt'];
    		}
    	}


    	$result = array(
    		'showed_dealer' => $showed_location_stat,
			'showed_user' => $showed_closer_agent_stat,
			'today_dealer' => $location_stat,
			'today_user' => $closer_agent_stat
		);
		return $result;
	}

	 public function bdc_app_shows($dealers, $report_month){

	 	$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_month."-01"));

        foreach ($dealers as $dealer_id => $dealer_name) {
    		$events = $this->Contact->query("
    			SELECT   count(`BdcAppShow`.user_id) as app_cnt, `User`.group_id, `User`.username FROM `bdc_app_shows` AS `BdcAppShow`
			LEFT JOIN `users` AS `User` ON (`BdcAppShow`.`user_id` = `User`.`id`)
			WHERE `User`.`active` = '1'  AND  `BdcAppShow`.`created` >=  '".$first_day_this_month."' AND  `BdcAppShow`.`created` <=  '".$last_day_this_month."' AND BdcAppShow.dealer_id = :company_id group by BdcAppShow.user_id", array('company_id'=>$dealer_id) );
    		//debug($events);
    		foreach ($events as $event) {
				if (isset($location_stat[ $dealer_id ])){
					$location_stat[ $dealer_id ] [ $event['User']['group_id'] ]   += $event['0']['app_cnt'] ;
				}else{
					$location_stat[ $dealer_id ]  [ $event['User']['group_id'] ]  = $event['0']['app_cnt'] ;
				}
				//User Stat
				$closer_agent_stat[ $dealer_id ][ $event['User']['username'] ] [ $event['User']['group_id'] ]  = $event['0']['app_cnt'];
    		}
    	}
    	$result = array(
			'event_agent_closer_dealer' => $location_stat,
			'event_agent_closer_user' => $closer_agent_stat
		);
		return $result;
	 }

/**
 * event set for agent and closer
 * dealership and users
 */
    public function event_agent_closer($dealers, $report_month){

    	$location_stat = array();
    	$closer_agent_stat = array();

    	foreach ($dealers as $dealer_id => $dealer_name) {
    		$events = $this->Contact->query(" SELECT   count(`User`.id) as app_cnt, `User`.group_id, `User`.username FROM `crmdeva1_crm2`.`events` AS `Event`
			LEFT JOIN `crmdeva1_crm2`.`contacts` AS `Contact` ON (`Event`.`contact_id` = `Contact`.`id`)
			LEFT JOIN `crmdeva1_crm2`.`users` AS `User` ON (`Event`.`user_id` = `User`.`id`)
			WHERE `User`.`active` = '1' AND `User`.`group_id` IN (10, 11) AND  `Contact`.`contact_status_id` in ('5','6') AND `Event`.`status` not in ('Completed','Canceled')
			AND  date_format(`Contact`.`created`,'%Y-%m') = '".$report_month."'
			AND date_format(`Event`.`start`,'%Y-%m') = '".$report_month."' AND Contact.company_id = :company_id group by User.id", array('company_id'=>$dealer_id) );
    		//debug($events);
    		foreach ($events as $event) {
				if (isset($location_stat[ $dealer_id ][ $event['User']['group_id'] ])){
					$location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  += $event['0']['app_cnt'] ;
				}else{
					$location_stat[ $dealer_id ] [ $event['User']['group_id'] ]  = $event['0']['app_cnt'] ;
				}
				//User Stat
				$closer_agent_stat[ $dealer_id ][ $event['User']['username'] ][ $event['User']['group_id'] ] = $event['0']['app_cnt'];
    		}
    	}
    	//debug($location_stat);
    	//debug($closer_agent_stat);
    	$result = array(
			'event_agent_closer_dealer' => $location_stat,
			'event_agent_closer_user' => $closer_agent_stat
		);
		return $result;
    }


/**
 * Unit Solds
 * dealership and users
 */
	public function unit_solds_month($dealers, $report_month){
		$sold_location_stat = array();
    	$sold_user_user = array();

		foreach ($dealers as $dealer_id => $dealer_name) {

			$leads = $this->Contact->query("select LeadSold.company_id,  LeadSold.user_id, count(LeadSold.user_id),
			`User`.group_id, `User`.username from lead_solds as LeadSold
			LEFT JOIN contacts as Contact on(`Contact`.id = LeadSold.contact_id)
			LEFT JOIN users as `User` on(`User`.id = LeadSold.user_id)
			where User.group_id in ('10','11','12') AND  LeadSold.company_id = :company_id
			and date_format(LeadSold.modified,'%Y-%m') = '".$report_month."' AND ".$ReportUserGroupQuery." User.active = 1
			group by  LeadSold.user_id ", array('company_id'=>$dealer_id));

			//debug($leads);
			foreach($leads  as $lead_s){
				if (isset($sold_location_stat[ $dealer_id ])){
				 	$sold_location_stat[ $dealer_id ] += $lead_s['0']['count(LeadSold.user_id)'];
				 }else{
				 	$sold_location_stat[ $dealer_id ] = $lead_s['0']['count(LeadSold.user_id)'];
				 }
				//User Stat
				$sold_user_user[ $dealer_id ][ $lead_s['User']['username'] ] = $lead_s['0']['count(LeadSold.user_id)'];
			}

		}

		$result = array(
			'sold_location_stat' => $sold_location_stat,
			'sold_user_user' => $sold_user_user
		);
		return $result;



	}


/**
 * Web lead and phone lead count
 * dealership and users
 */
    public function web_phone_lead_count($dealers, $report_month){

    	$location_stat = array();
    	$web_phone_user = array();
    	foreach ($dealers as $dealer_id => $dealer_name) {

	    	$leads = $this->Contact->query("select Contact.company_id, Contact.sperson, Contact.user_id, Contact.contact_status_id, count(Contact.contact_status_id), `User`.group_id, `User`.username from contacts as Contact
			LEFT JOIN users as `User` on(`User`.id = Contact.user_id)
			where Contact.contact_status_id in ('5','6') and Contact.company_id = :company_id
			and date_format(Contact.created,'%Y-%m') = '".$report_month."' AND ".$this->ReportUserGroupQuery."  User.active = 1
			group by  Contact.user_id", array('company_id'=>$dealer_id));
	    	//debug($this->ReportUserGroupQuery);
			foreach($leads  as $lead_s){
				 //Location Stat
				 if (isset($location_stat[ $dealer_id ][ $lead_s['Contact']['contact_status_id'] ])){
				 	$location_stat[ $dealer_id ][ $lead_s['Contact']['contact_status_id'] ] += $lead_s['0']['count(Contact.contact_status_id)'];
				 }else{
				 	$location_stat[ $dealer_id ][ $lead_s['Contact']['contact_status_id'] ] = $lead_s['0']['count(Contact.contact_status_id)'];
				 }
				//User Stat
				$web_phone_user[ $dealer_id ][ $lead_s['User']['username'] ][ $lead_s['Contact']['contact_status_id'] ] = $lead_s['0']['count(Contact.contact_status_id)'];
			}
			//debug($leads);
		}

		$result = array(
			'web_phone_cnt_dealer' => $location_stat,
			'web_phone_cnt_user' => $web_phone_user
		);
		return $result;


    }




}
