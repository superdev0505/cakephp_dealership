<?php
class Reports5Controller extends AppController {

 	public $uses = array('Contact','User','Events','EventTypes','Events_users');
    public $components = array('RequestHandler');
	public function index() {

	}
	
	public function lead_unit_value($stat = null) {
        $this->layout = 'ajax';
      	if($this->Auth->User('group_id') == 2)
			$user_id = $this->Auth->user('dealer_id');
		else
			$user_id = $this->Auth->User('id');
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		$month_year = date('F, Y', strtotime(date("Y")."-".$stats_month."-01")); 
		$this->set('month_year',$month_year);
		
		$array_statuses = array('Lead-Sold','lead_status-Open','lead_status-closed','contact_status_id-web-lead','contact_status_id-showroom-value','contact_status_id-phone_lead');
		$status = $array_statuses[$stat];
		$field_condition = "";
		if($status == 'Lead-Sold'){
			$field_condition = "`Contact`.`status` = 'Lead Sold'";
		}else if($status == 'lead_status-Open'){
			$field_condition = "`Contact`.`lead_status` = 'Open'";
		}else if($status == 'lead_status-closed'){
			$field_condition = "`Contact`.`lead_status` = 'Closed'";
		}else if($status == 'contact_status_id-web-lead'){
			$field_condition = "`Contact`.`contact_status_id` = 5";
		}else if($status == 'contact_status_id-showroom-value'){
			$field_condition = "`Contact`.`contact_status_id` = 7";
		}else if($status == 'contact_status_id-phone_lead'){
			$field_condition = "`Contact`.`contact_status_id` = 6";
		}
		
		
		$report_results = $this->Contact->query("
		SELECT
		SUM(`Contact`.`unit_value`) AS sold_vehicle
		FROM `contacts` AS `Contact`
		WHERE {$field_condition} AND `Contact`.`user_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month 
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);

		$this->set('report_results',$report_results);		
		
    }

}