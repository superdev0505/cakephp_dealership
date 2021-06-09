<?php
class Reports5Controller extends AppController {

 	public $uses = array('Contact','User','Events','EventTypes','Events_users');
    public $components = array('RequestHandler');
	
	
	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {

	}
	
	public function lead_unit_value($stat = null,$show_group=null) {
        $this->layout = 'ajax';
      	$report_results=$this->_unitValue($stat,$show_group);
		$this->set('report_results',$report_results);		
		
    }
	public function crmreport_lead_unit_value($stat = null,$show_group=null) {
        $this->layout = 'ajax';
		$this->view='lead_unit_value';
      	$report_results=$this->_unitValue($stat,$show_group);
		$this->set('report_results',$report_results);		
		
    }
	
	private function _unitValue($stat = null,$show_group=null)
	{
		/*if($this->Auth->User('group_id') == 2)
			$user_id = $this->Auth->user('dealer_id');
			
		else
			$user_id = $this->Auth->User('id');*/
		$dealer_id[] = $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$dealer_id[]=$show_group;
		}
		
		$dealer_ids=implode(',',$dealer_id);	
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
		
		
		/*$report_results = $this->Contact->query("
		SELECT
		SUM(`Contact`.`unit_value`) AS sold_vehicle
		FROM `contacts` AS `Contact`
		WHERE {$field_condition} AND `Contact`.`user_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month 
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);*/
		$report_results = $this->Contact->query("
		SELECT
		SUM(`Contact`.`unit_value`) AS sold_vehicle
		FROM `contacts` AS `Contact`
		WHERE {$field_condition} AND `Contact`.`company_id` IN($dealer_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month 
		"
		,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		return $report_results;

	}

}