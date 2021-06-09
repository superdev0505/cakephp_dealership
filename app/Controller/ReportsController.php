<?php

class ReportsController extends AppController {

    public $uses = array('Contact','ContactStatus','tmpRealDialMadeShown');
    public $components = array('RequestHandler','Cookie');
    public $helpers = array('Form', 'Html', 'Js', 'Time');


    public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {

    }
    public function fullReport(){
    }

    public function get_dealer_steps(){
		$sales_step_options_popup = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		return  $sales_step_options_popup;
	}

	//Report lead_source
	public function lead_source($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		//debug($result_ar);
		//debug($total_count);
		list($result_ar,$lead_sources,$total_count)=$this->_leadsource($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);

	}

	public function crmreport_lead_source($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='lead_source';
		//debug($result_ar);
		//debug($total_count);
		list($result_ar,$lead_sources,$total_count)=$this->_leadsource($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);

	}

	public function add_quote_dealer_ids($dealer_ids){

		$ar_ids = [];
		foreach(explode(',', $dealer_ids)  as $d_id){
			if( strpos($d_id, "'") === false ){
				$ar_ids[] = "'".$d_id."'";
			}else{
				$ar_ids[] = $d_id;
			}
		}
		return implode(",", $ar_ids);
	}

	private function _leadsource($show_group=null, $report_year)
	{
			$user_id[] = $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			//$dealer_id=array(262, 762, 758, 760,759, 761);

		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}



		/* Lead Source Report */
		$lead_sources = array(
			'Walk in' => 'Walk in',
			'Sign' => 'Sign',
			'Website' => 'Website',
			'Mobile Lead' => 'Mobile Lead',
			'Refferal' => 'Refferal',
			'Did Not Ask' => 'Did Not Ask',
			'Buliding' => 'Buliding',
			'Previous Customer' => 'Previous Customer',
			'Event' => 'Event',
			'Bike Night' => 'Bike Night',
			'Craigslist' => 'Craigslist',
			'Ebay' => 'Ebay',
			'Moto lease Flyer' => 'Moto lease Flyer',
			'Parts Customer' => 'Parts Customer',
			'Service Customer' => 'Service Customer',
			'Emailer' => 'Emailer'
		);

		$user_ids = $this->add_quote_dealer_ids($user_ids);

		$report_results = $this->Contact->query("
			SELECT `Contact`.`ref_num`,
			`Contact`.`id`,
			`Contact`.`source`,
			count(`Contact`.`source`) as source_count,
			SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
			SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle
			FROM `contacts` AS `Contact`
			LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			WHERE ".$this->Contact->ReportUserGroupQuery."  `Contact`.`status` <> 'Duplicate-Closed' AND  `Contact`.`company_id` IN($user_ids) AND `Contact`.`created` >= :first_day_this_month AND `Contact`.`created` <= :last_day_this_month GROUP BY `Contact`.`source`
		",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));

		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}
		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['source'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}

		return array($result_ar,$lead_sources,$total_count);
	}

	//Report sales_person
	public function sales_person($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		list($result_ar,$total_count)=$this->_salesperson($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	public function crmreport_sales_person($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='sales_person';
		list($result_ar,$total_count)=$this->_salesperson($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	private function _salesperson($show_group=null, $report_year){
		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			//$dealer_id=array(262, 762, 758, 760,759, 761);

		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}

		//sales_person
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`user_id`,
		`Contact`.`source`,
		`User`.`first_name`,
		`User`.`last_name`,
		count(`Contact`.`user_id`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
        SUM(if(`LeadSold`.`modified`  >= :first_day_this_month AND `LeadSold`.`modified` <= :last_day_this_month, 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		INNER JOIN users `User` ON Contact.user_id = `User`.id
        INNER JOIN lead_solds as `LeadSold` on Contact.id = `LeadSold`.contact_id
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` IN ($user_ids) AND `Contact`.`step_modified` >= :first_day_this_month AND `Contact`.`step_modified` <= :last_day_this_month
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['User']['first_name']." ".$report_result['User']['last_name']  ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);

		return array($result_ar,$total_count);

	}
	//Report Lead Type
	public function lead_type(){

		$user_id = $this->Auth->user('dealer_id');

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		//Lead Type
		$report_results = $this->Contact->query("
		SELECT
		`ContactStatus`.`name`,
		count(`Contact`.`contact_status_id`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		INNER JOIN contact_statuses `ContactStatus` ON Contact.contact_status_id = `ContactStatus`.id
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`contact_status_id`
		ORDER BY `ContactStatus`.name ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['ContactStatus']['name'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}
	//Lead Visits
	public function lead_visits(){

		$user_id = $this->Auth->user('dealer_id');

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		//Lead Visits:
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`status` in ('Mobile Lead','Web to Showroom','Lead 1st Visit','Lead Return','Parts to Sales','Service to Sales','Rental to Sales')
		AND `Contact`.`company_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['status'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	//Lead Calls:
	public function lead_calls($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		list($result_ar,$total_count)=$this->leadcalls($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	public function crmreport_lead_calls($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='lead_calls';
		list($result_ar,$total_count)=$this->leadcalls($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	private function leadcalls($show_group=null, $report_year){


		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}


		$inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header in ('Outbound Call (Open)','Inbound Call (Open)') ");
		$statuses = array();
		App::uses('Sanitize', 'Utility');
		foreach($inbounds as $inbound){
			$statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
		}
		$status_cond = implode(",", $statuses);



		//Lead Calls:
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`status` in (".$status_cond.") AND `Contact`.`company_id` IN ($user_ids)  AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		"
		,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['status'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		return array($result_ar,$total_count);

	}

	//Lead Update Satus:
	public function lead_update_satus(){

		$user_id = $this->Auth->user('dealer_id');

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`status` in (
      		'Brochure Only','Lead FollowUp','Delayed Contact','Test Drive','Price Quote','Objection','Write Up','T/O Manager','Lead Sold','Deal F/I','Went Home','Shopping','Delivered','Multi-Vehicle'
    	) AND `Contact`.`company_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['status'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	//Lead Closed Deals:
	public function lead_closed_deals($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		list($result_ar,$total_count)=$this->_leadclosed($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	public function crmreport_lead_closed_deals($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='lead_closed_deals';
		list($result_ar,$total_count)=$this->_leadclosed($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	private function _leadclosed($show_group=null, $report_year)
	{


		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}


		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`status` <> 'Duplicate-Closed' AND `Contact`.`company_id` IN ($user_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['status'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		return array($result_ar,$total_count);

	}

	//Lead Appointments:
	public function lead_appointments($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");


		list($result_ar,$total_count)=$this->_leadappointments($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}

	public function crmreport_lead_appointments($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='lead_appointments';
		list($result_ar,$total_count)=$this->_leadappointments($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);

	}


	private function _leadappointments($show_group=null, $report_year)
	{


		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));


		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}


		$inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header='Appointment (Open)' ");
		$statuses = array();
		App::uses('Sanitize', 'Utility');
		foreach($inbounds as $inbound){
			$statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
		}
		$status_cond = implode(",", $statuses);

		$user_ids = $this->add_quote_dealer_ids($user_ids);

		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`status` in (".$status_cond.") AND
		`Contact`.`company_id` IN($user_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month

		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);
		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['status'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		return array($result_ar,$total_count);



	}

	//Lead Steps
	public function lead_steps(){

		$user_id = $this->Auth->user('dealer_id');

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`user_id`,
		`User`.`first_name`,
		`User`.`last_name`,
		SUM(if(`Contact`.`sales_step` = 'Pending', 1, 0)) AS pending,
		SUM(if(`Contact`.`sales_step` = 'Meet', 1, 0)) AS meet,
		SUM(if(`Contact`.`sales_step` = 'Greet', 1, 0)) AS greet,
		SUM(if(`Contact`.`sales_step` = 'Probe', 1, 0)) AS probe,
		SUM(if(`Contact`.`sales_step` = 'Sit On', 1, 0)) AS sit_on,
		SUM(if(`Contact`.`sales_step` = 'Sit Down', 1, 0)) AS sit_down,
		SUM(if(`Contact`.`sales_step` = 'Write Up', 1, 0)) AS write_up,
		SUM(if(`Contact`.`sales_step` = 'Close', 1, 0)) AS close_c,
		SUM(if(`Contact`.`sales_step` = 'F/I', 1, 0)) AS f_i,
		SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold

		FROM `contacts` AS `Contact`
		INNER JOIN users `User` ON Contact.user_id = `User`.id
		WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` = :user_id AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		//debug($report_results);
		$result_ar = array();
		$total_count = array(
			'pending' => 0,
			'meet' => 0,
			'greet' => 0,
			'probe' => 0,
			'sit_on' => 0,
			'sit_down' => 0,
			'write_up' => 0,
			'close_c' => 0,
			'f_i' => 0,
			'sold' => 0,
		);

		foreach($report_results as $report_result){
			$result_ar[ $report_result['User']['first_name']." ".$report_result['User']['last_name']  ] = array(
				'pending'=>$report_result['0']['pending'],
				'meet'=>$report_result['0']['meet'],
				'greet'=>$report_result['0']['greet'],
				'probe'=>$report_result['0']['probe'],
				'sit_on'=>$report_result['0']['sit_on'],
				'sit_down'=>$report_result['0']['sit_down'],
				'write_up'=>$report_result['0']['write_up'],
				'close_c'=>$report_result['0']['close_c'],
				'f_i'=>$report_result['0']['f_i'],
				'sold'=>$report_result['0']['sold'],
			);
			$total_count['pending'] += $report_result['0']['pending'];
			$total_count['meet'] += $report_result['0']['meet'];
			$total_count['greet'] += $report_result['0']['greet'];
			$total_count['probe'] += $report_result['0']['probe'];
			$total_count['sit_on'] += $report_result['0']['sit_on'];
			$total_count['sit_down'] += $report_result['0']['sit_down'];
			$total_count['write_up'] += $report_result['0']['write_up'];
			$total_count['close_c'] += $report_result['0']['close_c'];
			$total_count['f_i'] += $report_result['0']['f_i'];
			$total_count['sold'] += $report_result['0']['sold'];
		}
		//debug($result_ar);
		//debug($total_count);
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);
	}

	public function lead_appointments_event($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$sales_steps = $this->get_dealer_steps();
	//	debug($sales_steps);

		list($result_ar,$lead_sources,$total_count)=$this->_leadapptevent($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$sales_steps);
		$this->set('total_count',$total_count);
	}

	public function crmreport_lead_appointments_event($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$sales_steps = $this->get_dealer_steps();
		$this->view='lead_appointments_event';
		list($result_ar,$lead_sources,$total_count)=$this->_leadapptevent($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$sales_steps);
		$this->set('total_count',$total_count);
	}


	private function _leadapptevent($show_group=null, $report_year)
	{

		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);

		//debug($this->Contact->ReportUserGroupQuery);

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime($report_year."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime($report_year."-".$stats_month."-01"));

		//debug($first_day_this_month);
		//debug($last_day_this_month);

		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}


		// debug($first_day_this_month);
		// debug($last_day_this_month);



		$lead_sources = array(
			'Pending' => 'Pending',
			'Meet' => 'Meet',
			'Greet' => 'Greet',
			'Probe' => 'Probe',
			'Sit On' => 'Sit On',
			'Sit Down' => 'Sit Down',
			'Write Up' => 'Write Up',
			'Close' => 'Close',
			'F/I' => 'F/I',
			'Sold' => 'Sold'
		);
		$user_ids = $this->add_quote_dealer_ids($user_ids);
		$report_results = $this->Contact->query("
			SELECT
			`Contact`.`sales_step`,
			count(`Contact`.`sales_step`) as source_count,
			SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
			SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle

			FROM `contacts` AS `Contact`
			LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` IN($user_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
			AND `Contact`.`status` <> 'Duplicate-Closed'
			AND `Contact`.`sales_step` <> '10'
			GROUP BY  `Contact`.`sales_step`
			ORDER BY `Contact`.`sales_step` ASC
			",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));


		$report_results_sold = $this->Contact->query("
			SELECT
			`Contact`.`sales_step`,
			count(`Contact`.`sales_step`) as source_count,
			SUM(if(`Ct`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Ct`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Ct`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
			SUM(if(`Ct`.`sales_step` = '10', 1, 0)) AS sold_vehicle

			FROM `lead_solds` AS `Contact`
			LEFT JOIN contacts as Ct ON (`Ct`.`id` = `Contact`.`contact_id`)
			LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` IN($user_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month
			AND `Contact`.`status` <> 'Duplicate-Closed'
			",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));


		//debug( $report_results );
		//debug( $report_results_sold );
		$report_results = array_merge($report_results, $report_results_sold);
		//debug( $report_results );


		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}
		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);

		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['Contact']['sales_step'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		return array($result_ar,$lead_sources,$total_count);


	}

	//leads_detail
	public function leads_detail($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		list($result_ar,$lead_sources,$total_count)=$this->_leaddetail($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);

	}

	public function crmreport_leads_detail($show_group=null){

		$report_year =  isset($this->request->query['report_year'])? $this->request->query['report_year'] : date("Y");

		$this->view='leads_detail';
		list($result_ar,$lead_sources,$total_count)=$this->_leaddetail($show_group, $report_year);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);

	}

	private function _leaddetail($show_group=null, $report_year)
	{



		$user_id[]= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);


		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));


		if(isset($this->request->query['start_date']) && isset($this->request->query['end_date']) ){
			$s_date = $this->request->query['start_date'];
			$e_date = $this->request->query['end_date'];

			$first_day_this_month = $s_date.' 00:00:00';
			$last_day_this_month = $e_date.' 23:59:59';
		}

		// debug($first_day_this_month);
		// debug($last_day_this_month);

		$lead_sources = array(
			'Meet and Greet' => 'Meet and Greet',
			'Demo Product' => 'Demo Product',
			'PDI / Delivery' => 'PDI / Delivery',
			'F / I Products' => 'F / I Products',
			'Sign Papers' => 'Sign Papers',
			'Customer Meeting' => 'Customer Meeting',
			'Send Email' => 'Send Email',
			'Phone Call In' => 'Phone Call In',
			'Phone Call Out' => 'Phone Call Out'
		);

		$user_ids = $this->add_quote_dealer_ids($user_ids);

		$report_results = $this->Contact->query("SELECT
			`EventType`.name,
			`Event`.event_type_id,
			`Contact`.`id`,
			`Contact`.`sales_step`,
			`Contact`.`lead_status` ,
			count(`Contact`.`sales_step`) as source_count,
			SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Contact`.`status` = 'Invalid-Closed', 1, 0)) AS invalid_lead,
			SUM(if(`Contact`.`sales_step` = '10', 1, 0)) AS sold_vehicle
			FROM `events` AS `Event`
			INNER JOIN `contacts` `Contact`  ON `Event`.`contact_id` = `Contact`.id
			INNER JOIN `event_types` `EventType`  ON `Event`.`event_type_id` = `EventType`.id
			LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

			WHERE ".$this->Contact->ReportUserGroupQuery." `Contact`.`company_id` IN($user_ids) AND `Contact`.`modified` >= :first_day_this_month AND `Contact`.`modified` <= :last_day_this_month

			GROUP BY `Event`.`event_type_id`
			ORDER BY `Contact`.`sales_step` ASC
		",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//debug($report_results);
		$total_leads = 0;
		foreach($report_results as $report_result){
			$total_leads +=  $report_result['0']['source_count'];
		}

		$result_ar = array();
		$total_count = array(
			'total_lead' => 0,
			'open_lead' => 0,
			'closed_lead' => 0,
			'invalid_lead' => 0,
			'bcde_percent' => 0,
			'sold_vehicle' => 0,
			'sold_percent' => 0,
		);

		foreach($report_results as $report_result){
			$sold_percent = 0;
			if($report_result['0']['sold_vehicle'] != 0){
				$sold_percent =  round( ($report_result['0']['sold_vehicle'] / $report_result['0']['source_count']) * 100, 2);
				$sold_percent = $sold_percent."%";
			}
			$bcde_percent = 0;
			if($report_result['0']['source_count'] != 0){
				$bcde_percent =  round( ($report_result['0']['source_count'] / $total_leads ) * 100, 2);
				$bcde_percent = $bcde_percent."%";
			}
			$result_ar[ $report_result['EventType']['name'] ] = array(
				'total'=>$report_result['0']['source_count'],
				'open_lead'=>$report_result['0']['open_lead'],
				'closed_lead'=>$report_result['0']['closed_lead'],
				'invalid_lead'=>$report_result['0']['invalid_lead'],
				'bcde_percent'=>$bcde_percent,
				'sold_vehicle'=>$report_result['0']['sold_vehicle'],
				'sold_percent'=>$sold_percent,
			);
			$total_count['total_lead'] += $report_result['0']['source_count'];
			$total_count['open_lead'] += $report_result['0']['open_lead'];
			$total_count['closed_lead'] += $report_result['0']['closed_lead'];
			$total_count['invalid_lead'] += $report_result['0']['invalid_lead'];
			$total_count['bcde_percent'] += $bcde_percent;
			$total_count['sold_vehicle'] += $report_result['0']['sold_vehicle'];
			$total_count['sold_percent'] += $sold_percent;
		}
		//debug($result_ar);
		//debug($total_count);
		return array($result_ar,$lead_sources,$total_count);


	}

	public function main_reports($stats_month = null, $stats_year = null) {
		$this->layout='default_new';

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		
		if($stats_month == null){
			$stats_month = date('m');
		}
		$this->set('stats_month', $stats_month);

		if($stats_year == null){
			$stats_year = date('Y');
		}
		$this->set('stats_year', $stats_year);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		$s_date = date('Y-m-01', strtotime(date("Y")."-".$stats_month."-01"));
		$e_date = date('Y-m-t', strtotime(date("Y")."-".$stats_month."-01"));

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);
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

    public function coaching_report(){
		$this->layout='default_new';
		$crnreport_dealer = false;

		if(isset($this->request->query['dealer_id'])){
			$dealer_id = $this->request->query['dealer_id'];
			$crnreport_dealer = true;
		}else{
			$dealer_id = $this->Auth->user('dealer_id');
		}

		if($dealer_id!='1370'){
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		$this->set('dealer_id',$dealer_id);

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);
		$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $dealer_id);
		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $this->Auth->User('step_procces'));

		$this->set('custom_step_map', $custom_step_map);

		$s_date = date('Y-m-01');// date('Y-m-t', strtotime('-30 days'));
		$e_date = date('Y-m-t');
		
		// Calculating KPI,GOAL,OPPORTUNITY using Door Swing Count
 		$monthly_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('monthly_door_count',$monthly_door_count);
 		$s_date=date('Y-m-t', strtotime('-90 days'));
 		$ninty_days_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('ninty_days_door_count',$ninty_days_door_count);
 		$s_date=date('Y-m-t', strtotime('-365 days'));
 		$yearly_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('yearly_door_count',$yearly_door_count);
-		//-------Calculation finished----------
		
		$all_results = array();
		$all_results = $this->fetchCoachingReportRec($dealer_id,$s_date);

		$this->set('custom_step_map', $custom_step_map);
		$this->set('results', $all_results[0]);
		$allcnt = array();

		$allcnt = $this->fetchCoachingReportAllCnt($all_results,$custom_step_map,$multi_deal_higher_step);
		$this->set('allcnt', $allcnt);
		$this->loadModel('CoachingReportGroup');
		$groupdat=$this->CoachingReportGroup->query('SELECT * FROM groups WHERE id NOT IN(1,9,14,15,16,17,18,19)');
		$this->set('groupdat',$groupdat);

		// Calculating Dial Made Shown for Monthly/90 Day/Yearly Report
		$this->fetchDialsMadeShown($all_results,$s_date,$dealer_id,1);
		$s_date=date('Y-m-t', strtotime('-90 days'));
		$all_results = $this->fetchCoachingReportRec($dealer_id,$s_date);
		$this->fetchDialsMadeShown($all_results,$s_date,$dealer_id,2);
		$s_date=date('Y-m-t', strtotime('-365 days'));
		$all_results = $this->fetchCoachingReportRec($dealer_id,$s_date);
		$this->fetchDialsMadeShown($all_results,$s_date,$dealer_id,3);

		// Calculate for 90 DAY AVERAGE
		$s_date=date('Y-m-t', strtotime('-90 days'));
		$resultNintydays = $this->fetchCoachingReportRec($dealer_id,$s_date);
		$resAllCnt = $this->fetchCoachingReportAllCnt($resultNintydays,$custom_step_map,$multi_deal_higher_step);
		$this->set('resultNintydays', $resultNintydays[0]);
		$this->set('resAllCnt', $resAllCnt);

		// Calculate for 365 DAY AVERAGE
		$s_date=date('Y-m-t', strtotime('-365 days'));
		$resultPastOneYear = $this->fetchCoachingReportRec($dealer_id,$s_date);
		$resAllYearCnt = $this->fetchCoachingReportAllCnt($resultPastOneYear,$custom_step_map,$multi_deal_higher_step);
		$this->set('resultPastOneYear', $resultPastOneYear[0]);
		$this->set('resAllYearCnt', $resAllYearCnt);
	}
	
	public function calcKPIGoalOpportunity($dealer_id,$s_date,$e_date){
 		$this->loadModel('DealerDoorcount');		
 		$daily_door_counts = $this->DealerDoorcount->find('all', 
 			array('conditions' => 
 				array('AND' => 
 					array('DealerDoorcount.log_date >= ? AND DealerDoorcount.log_date <= ?' => 
 						array($s_date, $e_date),'DealerDoorcount.dealer_id' => $dealer_id))));
 		
 		return $daily_door_counts;
 	}

	public function fetchDialsMadeShown($all_results,$s_date,$dealer_id,$optVal){
		$e_date = Date('Y-m-t');
		if(!empty($all_results)){
			foreach ($all_results[0] as $user_id){
				$user_id =$user_id['user_id'];
				App::import('Core', 'ConnectionManager');
				$dataSource = ConnectionManager::getDataSource('default');
				$mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

				App::uses('Sanitize', 'Utility');
				$query = sprintf("CALL dial_made_shown(%s, '%s','%s', '%s', '%s')",
					Sanitize::escape($dealer_id),
					Sanitize::escape($user_id),
					Sanitize::escape($s_date." 00:00:00"),
					Sanitize::escape($e_date." 23:59:59"),
					Sanitize::escape(date("Y-m-d H:i:s"))
				);

				$all_results_dial = array();
				$result_count = 0;
				if ($mysqli->multi_query($query)) {
					do {
						/* store first result set */
						if ($result = $mysqli->store_result()) {
							while ($row = $result->fetch_assoc()) {
								if(empty($team_members_floor)){
									$all_results_dial[$result_count][$user_id] = $row;
								}else if (in_array($row['user_id'], $team_members_floor)) {
									$all_results_dial[$result_count][$user_id] = $row;
								}

							}
							$result->free();
							$result_count++;
						}
					}while ($mysqli->next_result());
				}

				$this->set('custom_step_map', $custom_step_map);
				if($optVal==1){
					$this->set('results_dial', $all_results_dial[0]);
				}elseif($optVal==2){
					$this->set('results_dial_ninty', $all_results_dial[0]);
				}else{
					$this->set('results_dial_yearly', $all_results_dial[0]);
				}
			}
		}

		$this->loadModel('tmpRealDialMadeShown');
		$resdat=$this->tmpRealDialMadeShown->query('DELETE FROM tmp_real_dial_made_shown');

		/*shown,made count*/
		$this->loadModel('Event');
		$events_query = "INSERT INTO tmp_real_dial_made_shown(`user_id`,`made`,`shown`) Select User.id, SUM(If(Event.status = 'Scheduled',1,0)) as scheduled_count,SUM(If((Event.status = 'Completed' && Event.customer_showed = 1 ),1,0)) as showed_completed_count from events AS Event LEFT JOIN users as User on Event.user_id = User.id where Event.start >= $s_date AND Event.end <= $e_date AND Event.dealer_id = $dealer_id AND Event.event_type_id IN (20,21) GROUP by Event.user_id;";

		$user_all_events = $this->Event->query($events_query , 	array(
			'dealer_id' => $dealer_id,
			's_date' => $s_date." 00:00:00",
			'e_date' => $e_date." 23:59:59",
	 	));

		$selectedmadeshown=$this->tmpRealDialMadeShown->query('SELECT * FROM `tmp_real_dial_made_shown`');
		$this->set('selectmadeshown',$selectmadeshown);
		$selectedresult[$selectedmadeshown[0][tmp_real_dial_made_shown][user_id]]=$selectedmadeshown[0][tmp_real_dial_made_shown];
		if($optVal==1){
			$this->set('selectedresult',$selectedresult);
		}elseif($optVal==2){
			$this->set('selectedresultNinty',$selectedresult);
		}else{
			$this->set('selectedresultYearly',$selectedresult);
		}

		$resdat=$this->tmpRealDialMadeShown->query('DELETE FROM tmp_real_dial_made_shown');
		$e_usernames = array();
		$type_ids = array(5,12,6,7);
		$type_count = array();
		foreach( $type_ids as $type_id ){
			$email_sent = $this->email_sent($dealer_id, $s_date, $e_date, $type_id,$user_id);
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
		if($optVal==1){
			$this->set('type_count', $type_count);
		}elseif($optVal==2){
			$this->set('type_count_ninty', $type_count);
		}else{
			$this->set('type_count_yearly', $type_count);
		}
	}

	public function fetchCoachingReportRec($dealer_id,$s_date){
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$e_date  = date('Y-m-t');
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL coachingreport_stat(%s, '%s', '%s')",
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
		return $all_results;
	}

	public function fetchCoachingReportAllCnt($all_results,$custom_step_map,$multi_deal_higher_step){
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

		$temp_allcnt = array();
		$temp_allcnt = $allcnt;
		$allCnt = array();
		foreach($temp_allcnt as $key=>$value){
			$value['10'] = $value['10'] + $value['30'];
			$allCnt[$key] =  $value;
		}
		return $allCnt;
	}

	public function email_sent($dealer_id, $s_date, $e_date, $contact_status_id,$userid){
		$emailsent = $this->Contact->query('
		SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`user_id`, `Contact`.`sperson`
		FROM  contacts as Contact
		LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
		WHERE
		`UserEmailLog`.`user_id` in ('.$userid.') AND
		 `Contact`.`company_id` = :company_id  AND   date_format(`UserEmailLog`.`send_date`,\'%Y-%m-%d\') between :s_date and :e_date
		AND `Contact`.`contact_status_id`  = '.$contact_status_id
		,array('company_id'=>$dealer_id,'s_date'=> $s_date, 'e_date'=> $e_date   ));

        $elog = array();
        foreach($emailsent as $el){
            $elog[] = "'".$el['Contact']['contact_id']."'";
        }
        $elog_con = implode(",", $elog);
        $elog_con_str = '';
        if(!empty($elog)){
            $elog_con_str = 'AND `Contact`.`id` NOT IN  ('. $elog_con .')   ';
        }

        $sent_status = $this->Contact->query('
        SELECT `Contact`.`id` contact_id, `Contact`.`company_id` ,  `Contact`.`user_id`, `Contact`.`sperson`
        FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

        WHERE '.$this->ReportUserGroupQuery.'  `Contact`.`user_id` in ('.$userid.')
        AND User.active = 1
        '. $elog_con_str .'
        AND date_format(`Contact`.`modified`,\'%Y-%m-%d\') between :s_date and :e_date
        AND `Contact`.`company_id` = :company_id
        AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
        AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
        ',array('company_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));

        //debug( $emailsent );
       // debug( $sent_status );
        $ar = array_merge($emailsent, $sent_status);
        //debug( $ar );

        return $ar;

	}

	public function ajaxcoaching_report(){
		$this->loadModel('CoachingReports');
		if(isset($this->request->query['dealer_id'])){
			$dealer_id = $this->request->query['dealer_id'];
			$crnreport_dealer = true;
		}else{
			$dealer_id = $this->Auth->user('dealer_id');
		}

		if($this->request->is('ajax')){
			$value = $this->request->data('value_to_send'); // selected item's id
			if(isset($value)){
				foreach($value as $val){
					$qryCondition = $qryCondition.$val.","; //$qryCondition = $qryCondition."'".$val."',";
				}
				$qryCondition =substr($qryCondition,0,-1);
				$qryCondition1= $qryCondition;  //$qryCondition1= 'users.group_id IN('.$qryCondition.')';
			}else{
				$qryCondition1 = "2,3,4,5,6,10,11"; //$qryCondition1 = "1";
			}
		}

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);

		$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $dealer_id);
		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $this->Auth->User('step_procces'));

		$this->set('custom_step_map', $custom_step_map);
		$s_date = date('Y-m-01');
		$e_date = date('Y-m-t');
 
 		// Calculating KPI,GOAL,OPPORTUNITY using Door Swing Count
 		$monthly_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('monthly_door_count',$monthly_door_count);
 		$s_date=date('Y-m-t', strtotime('-90 days'));
 		$ninty_days_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('ninty_days_door_count',$ninty_days_door_count);
 		$s_date=date('Y-m-t', strtotime('-365 days'));
 		$yearly_door_count = $this->calcKPIGoalOpportunity($dealer_id,$s_date,$e_date);
 		$this->set('yearly_door_count',$yearly_door_count);
 		//-------Calculation finished----------
		
		$all_results = array();
		$s_date = date('Y-m-01');
		$all_results = $this->fetchAjaxCoachingResult($dealer_id,$qryCondition1,$s_date);
		$this->set('custom_step_map', $custom_step_map);
		$this->set('results', $all_results[0]);

		$allcnt = $this->fetchAjaxAllCntCoachingReport($all_results,$custom_step_map,$multi_deal_higher_step);
		$this->set('allcnt', $allcnt);

		// Calculating Dial Made Shown for Monthly/90 Day/Yearly Report
		$this->fetchDialMadeShownAjax($s_date,$all_results,$dealer_id,1);
		$s_date=date('Y-m-t', strtotime('-90 days'));
		$all_results = $this->fetchAjaxCoachingResult($dealer_id,$qryCondition1,$s_date);
		$this->fetchDialMadeShownAjax($s_date,$all_results,$dealer_id,2);
		$s_date=date('Y-m-t', strtotime('-365 days'));
		$all_results = $this->fetchAjaxCoachingResult($dealer_id,$qryCondition1,$s_date);
		$this->fetchDialMadeShownAjax($s_date,$all_results,$dealer_id,3);

		// Calculate for 90 DAY AVERAGE
		$s_date=date('Y-m-t', strtotime('-90 days'));
		$resultNintydays = $this->fetchAjaxCoachingResult($dealer_id,$qryCondition1,$s_date);
		$resAllCnt = $this->fetchAjaxAllCntCoachingReport($resultNintydays,$custom_step_map,$multi_deal_higher_step);
		$this->set('resultNintydays', $resultNintydays[0]);
		$this->set('resAllCnt', $resAllCnt);

		// Calculate for 365 DAY AVERAGE
		$s_date=date('Y-m-t', strtotime('-365 days'));
		$resultPastOneYear = $this->fetchAjaxCoachingResult($dealer_id,$qryCondition1,$s_date);
		$resAllYearCnt = $this->fetchAjaxAllCntCoachingReport($resultNintydays,$custom_step_map,$multi_deal_higher_step);
		$this->set('resultPastOneYear', $resultPastOneYear[0]);
		$this->set('resAllYearCnt', $resAllYearCnt);
    }

    public function fetchDialMadeShownAjax($s_date,$all_results,$dealer_id,$optVal){
    	$e_date  = date('Y-m-t');
    	$all_results_dial = array();
    	if(!empty($all_results[0])){
			foreach ($all_results[0] as $user_id){
				$user_id =$user_id['user_id'];
				App::import('Core', 'ConnectionManager');
		        $dataSource = ConnectionManager::getDataSource('default');
		        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

				App::uses('Sanitize', 'Utility');
				$query = sprintf("CALL dial_made_shown(%s, '%s','%s', '%s', '%s')",
					Sanitize::escape($dealer_id),
					Sanitize::escape($user_id),
					Sanitize::escape(  $s_date." 00:00:00"),
					Sanitize::escape(  $e_date." 23:59:59"),
					Sanitize::escape( date("Y-m-d H:i:s"))
				);

				//$all_results_dial = array();
				$result_count = 0;
				if ($mysqli->multi_query($query)) {
					do {
				        if ($result = $mysqli->store_result()) {
				            while ($row = $result->fetch_assoc()) {
				            	if(empty($team_members_floor)){
				            		$all_results_dial[$result_count][$user_id] = $row;
				            	}elseif(in_array($row['user_id'], $team_members_floor)) {
				            		$all_results_dial[$result_count][$user_id] = $row;
				            	}
				            }
				            $result->free();
				            $result_count++;
				        }
					}while ($mysqli->next_result());
				}

				//$this->set('custom_step_map', $custom_step_map);
				//$this->set('results_dial', $all_results_dial[0]);
			}
		}
		$this->set('custom_step_map', $custom_step_map);
		if($optVal==1){
			$this->set('results_dial', $all_results_dial[0]);
		}elseif($optVal==2){
			$this->set('results_dial_ninty', $all_results_dial[0]);
		}else{
			$this->set('results_dial_yearly', $all_results_dial[0]);
		}

		$this->loadModel('tmpRealDialMadeShown');
		$resdat=$this->tmpRealDialMadeShown->query('DELETE FROM tmp_real_dial_made_shown');

		$this->loadModel('Event');
		$events_query = "INSERT INTO tmp_real_dial_made_shown(`user_id`,`made`,`shown`) Select User.id, SUM(If(Event.status = 'Scheduled',1,0)) as scheduled_count,SUM(If((Event.status = 'Completed' && Event.customer_showed = 1 ),1,0)) as showed_completed_count from events AS Event LEFT JOIN users as User on Event.user_id = User.id where Event.start >= $s_date AND Event.end <= $e_date AND Event.dealer_id = $dealer_id AND Event.event_type_id IN (20,21) GROUP by Event.user_id;";

		$user_all_events = $this->Event->query($events_query , 	array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date." 00:00:00",
				'e_date' => $e_date." 23:59:59",
		 	));

		$selectedmadeshown=$this->tmpRealDialMadeShown->query('SELECT * FROM `tmp_real_dial_made_shown`');
		$this->set('selectmadeshown',$selectmadeshown);
		$selectedresult[$selectedmadeshown[0][tmp_real_dial_made_shown][user_id]]=$selectedmadeshown[0][tmp_real_dial_made_shown];

		if($optVal==1){
			$this->set('selectedresult',$selectedresult);
		}elseif($optVal==2){
			$this->set('selectedresultNinty',$selectedresult);
		}else{
			$this->set('selectedresultYearly',$selectedresult);
		}

		$resdat = $this->tmpRealDialMadeShown->query('DELETE FROM tmp_real_dial_made_shown');

		$e_usernames = array();
		$type_ids = array(5,12,6,7);
		$type_count = array();
		//echo $type_ids+" "+$user_id;die;
		foreach( $type_ids as $type_id ){
			$email_sent = $this->email_sent($dealer_id, $s_date, $e_date, $type_id,$user_id);
			if(!empty($email_sent)){
				foreach($email_sent as $es){
					$e_usernames[ $es['Contact']['user_id'] ] = $es['Contact']['sperson'];
					if(isset($type_count[$es['Contact']['user_id'] ] [$type_id])){
						$type_count[$es['Contact']['user_id'] ] [$type_id] += 1;
					}else{
						$type_count[$es['Contact']['user_id'] ] [$type_id] = 1;
					}
				}
			}
		}

		$this->set('e_usernames', $e_usernames);
		if( $optVal == 1){
			$this->set('type_count', $type_count);
		}elseif($optVal == 2){
			$this->set('type_count_ninty', $type_count);
		}else{
			$this->set('type_count_yearly', $type_count);
		}
    }

    public function fetchAjaxAllCntCoachingReport($all_results,$custom_step_map,$multi_deal_higher_step){
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

					$lower_steps = $this->get_lower_steps($custom_step_map, $stepnum, $multi_deal_higher_step);

					foreach ($lower_steps as $ls) {
						$steps_count[$ls] +=  $value;
					}
				}
				$allcnt [$k] =  $steps_count;
			}
		}

		$temp_allcnt = $allcnt;
		$allcnt = array();
		foreach($temp_allcnt as $key=>$value){
			$value['10'] = $value['10'] + $value['30'];
			$allcnt[$key] =  $value;
		}
		return $allcnt;
    }

    public function fetchAjaxCoachingResult($dealer_id,$grp_fltr,$s_date){
		$e_date = date('Y-m-t');
		App::import('Core', 'ConnectionManager');
		$dataSource = ConnectionManager::getDataSource('default');
		$mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);

		App::uses('Sanitize', 'Utility');
		/**$query = sprintf("SELECT `Contact`.`user_id`,`Contact`.`sperson`,
			SUM(IF(`Contact`.`sales_step` = '1', 1, 0)) AS s_1,
			SUM(IF(`Contact`.`sales_step` = '1', 2, 0)) AS s_2,
			SUM(IF(`Contact`.`sales_step` = '3', 1, 0)) AS s_3,
			SUM(IF(`Contact`.`sales_step` = '4', 1, 0)) AS s_4,
			SUM(IF(`Contact`.`sales_step` = '5', 1, 0)) AS s_5,
			SUM(IF(`Contact`.`sales_step` = '6', 1, 0)) AS s_6,
			SUM(IF(`Contact`.`sales_step` = '7', 1, 0)) AS s_7,
			SUM(IF(`Contact`.`sales_step` = '8', 1, 0)) AS s_8,
			SUM(IF(`Contact`.`sales_step` = '9', 1, 0)) AS s_9,
			SUM(IF(`Contact`.`sales_step` = '17', 1, 0)) AS s_17,
			SUM(IF(`Contact`.`sales_step` = '18', 1, 0)) AS s_18,
			SUM( IF(`Contact`.`sales_step` = 'LeadSold_single', 1, 0)) AS s_10,
			SUM( IF(`Contact`.`sales_step` = 'LeadSold_multi', 1, 0)) AS s_30
			FROM coaching_stat AS Contact INNER JOIN users on Contact.user_id=users.id WHERE ".$qryCondition1."	GROUP BY Contact.user_id;)",
		 	Sanitize::escape($dealer_id),
			Sanitize::escape($s_date." 00:00:00"),
			Sanitize::escape($e_date." 23:59:59")
		);**/
		
		$query = sprintf("CALL coachingreport_stat_group(%s, '%s', '%s', '%s')",
 		 	Sanitize::escape($dealer_id),
 			Sanitize::escape($s_date." 00:00:00"),			
			Sanitize::escape($e_date." 23:59:59"),
			Sanitize::escape($grp_fltr)
 		);
		$all_results = array();
		$result_count = 0;
		if ($mysqli->multi_query($query)) {
			do {
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
		return $all_results;
    }

	public function crmreport_main_reports($stats_month = null) {
		$this->layout='default_new';
		$this->view='main_reports';
		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

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
		$this->set('stats_year', $stats_year);
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);


	}

	public function eblast_reports() {
		$this->layout='default_new';
	}
	public function pipeline_reports_data($stats_month = null,$show_group=null){


		//debug($array_report_values);
		$array_report_values=$this->_pipelineReports($stats_month,$show_group);
		$this->autoRender = false;
		echo json_encode($array_report_values);

	}

	public function crmreport_pipeline_reports_data($stats_month = null,$show_group=null){


		//debug($array_report_values);
		$array_report_values=$this->_pipelineReports($stats_month,$show_group);
		$this->autoRender = false;
		//pr($array_report_values);
		//die;
		echo json_encode($array_report_values);

	}

	private function _pipelineReports($stats_month = null,$show_group=null)
	{
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
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		//$dealer_id = $this->Auth->user('dealer_id');


		$status = array('Lead-Sold','lead_status-Open','lead_status-closed','contact_status_id-web-lead','contact_status_id-showroom-value','contact_status_id-phone_lead');
		$array_report_values = array();

		foreach($status as $key=>$sts){

			$field_condition = "";
			if($sts == 'Lead-Sold'){
				$field_condition = "`Contact`.`status` = 'Lead Sold'";
			}else if($sts == 'lead_status-Open'){
				$field_condition = "`Contact`.`lead_status` = 'Open'";
			}else if($sts == 'lead_status-closed'){
				$field_condition = "`Contact`.`lead_status` = 'Closed'";
			}else if($sts == 'contact_status_id-web-lead'){
				$field_condition = "`Contact`.`contact_status_id` = 5";
			}else if($sts == 'contact_status_id-showroom-value'){
				$field_condition = "`Contact`.`contact_status_id` = 7";
			}else if($sts == 'contact_status_id-phone_lead'){
				$field_condition = "`Contact`.`contact_status_id` = 6";
			}

			$dealer_ids = $this->add_quote_dealer_ids($dealer_ids);

			$report_results = $this->Contact->query("
				SELECT DAY(`Contact`.`modified`) as r_day, MONTH(`Contact`.`modified`) as r_month,  SUM(`Contact`.`unit_value`) AS sold_vehicle
			  	FROM `contacts` AS `Contact`
			  	LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			  	WHERE ".$this->Contact->ReportUserGroupQuery."

			  		  {$field_condition} AND
			  		 `Contact`.`company_id` IN($dealer_ids) AND
			  		`Contact`.`modified` >= :first_day_this_month AND
			  		`Contact`.`modified` <= :last_day_this_month
			  	GROUP BY DAY(`Contact`.`modified`)
			  	ORDER BY `Contact`.`modified` ASC"
			,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
			);
			//debug($report_results);
			foreach($report_results as $report_result){
				$array_report_values[$key][] = array( $report_result[0]['r_day'], $report_result[0]['sold_vehicle']);
			}

		}
		return $array_report_values;
	}
	public function sales_pipeline_reports($stats_month = null,$show_group=null) {
		$this->layout = 'default_pipeline_reports_medical';
		//$this->layout = 'default_new';
		$dealer_id=$this->Auth->user('dealer_id');

		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		/*$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->set('group',$show_group);*/

	}

	public function crmreport_sales_pipeline_reports($stats_month = null,$show_group=null) {
		$this->layout = 'default_pipeline_reports_medical';
		$this->view='sales_pipeline_reports';
		$dealer_id=$this->Auth->user('dealer_id');

		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->set('group',$show_group);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);


	}
	public function drop_reports($stats_month = null) {
		$this->layout='default_pipeline_reports';

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		/*$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);*/

	}


	public function crmreport_drop_reports($stats_month = null) {
		$this->layout='default_pipeline_reports';
		$this->view='drop_reports';
		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);

	}


	public function unit_reports($stats_month = null) {
         $this->layout='default_unit_reports';
		 $dealer_id=$this->Auth->user('dealer_id');
		 if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		/*$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);*/

	}

	public function crmreport_unit_reports($stats_month = null) {
         $this->layout='default_unit_reports';
		 $this->view='unit_reports';
		  $dealer_id=$this->Auth->user('dealer_id');
		 if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);

	}


    public function getMainLeads() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');

            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
            	'User.group_id' => $this->Contact->ReportUserGroups

            );

        $params = array(
            'conditions' => $conditions,
            'fields' => 'Contact.created_date_short, COUNT(Contact.created_date_short) as count',
            'group' => 'Contact.created_date_short'
        );
        $leads = $this->Contact->find('all', $params);
        $months = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        );
        $final_data = array();
        foreach ($leads as $lead) {
            $month = $months[substr($lead['Contact']['created_date_short'], 0, 2)];
            $day = substr($lead['Contact']['created_date_short'], 2, 2);
            $year = substr($lead['Contact']['created_date_short'], 6, 4);

            $final_data[] = array(
                $day . '-' . $month . '-' . $year,
                (int) $lead[0]['count'],
            );
        }

        $leads = array($final_data);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getStatusPieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_statusPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getStatusPieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_statusPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }


	private function _statusPieData($show_group=null)
	{

		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}
		elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

            $conditions = array(
                'Contact.company_id' => $user_id,
            	'User.group_id' => $this->Contact->ReportUserGroups,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.status) as count, Contact.status',
            'group' => 'Contact.status'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['status'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);

		return $leads;

	}

    public function getSourcePieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_sourcePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getSourcePieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_sourcePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _sourcePieData($show_group=null){

		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

            $conditions = array(
                'Contact.company_id' => $user_id,
            	'User.group_id' => $this->Contact->ReportUserGroups,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.source) as count, Contact.source',
            'group' => 'Contact.source'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['source'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}

    public function getBuyingTimePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_buyingTimePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getBuyingTimePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_buyingTimePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _buyingTimePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

            $conditions = array(
                'Contact.company_id' => $user_id,
            	'User.group_id' => $this->Contact->ReportUserGroups,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.buying_time <>' => "",

            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.buying_time) as count, Contact.buying_time',
            'group' => 'Contact.buying_time'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['buying_time'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;

	}

    public function getGenderPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_genderPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getGenderPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_genderPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _genderPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));


        $group_id = $this->Auth->user('group_id');

            $conditions = array(
            	'User.group_id' => $this->Contact->ReportUserGroups,
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'fields' => 'COUNT(Contact.gender) as count, Contact.gender',
            'group' => 'Contact.gender'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['gender'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}

    public function getBestTimePieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_bestTimePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getBestTimePieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_bestTimePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _bestTimePieData($show_group=null){

		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

            $conditions = array(
            	'User.group_id' => $this->Contact->ReportUserGroups,
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.best_time <>' => ''
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'fields' => 'COUNT(Contact.best_time) as count, Contact.best_time',
            'group' => 'Contact.best_time'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['best_time'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}

    public function getStepsPieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_stepsPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getStepsPieData($show_group=null)
	{
		 $this->layout = null;

		$leads=$this->_stepsPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
	}

	private function _stepsPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

            $conditions = array(
            	'User.group_id' => $this->Contact->ReportUserGroups,
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.sales_step) as count, Contact.sales_step',
            'group' => 'Contact.sales_step'
        );
        $leads = $this->Contact->find('all', $params);

        $custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));

        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $custom_step_map[ $lead['Contact']['sales_step'] ],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);

      //  debug( $leads );

		return $leads;
	}

    public function getLeadStatusPieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_leadStatusPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	public function crmreport_getLeadStatusPieData($show_group=null) {
        $this->layout = null;

		$leads=$this->_leadStatusPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _leadStatusPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));


        $group_id = $this->Auth->user('group_id');

            $conditions = array(
            	'User.group_id' => $this->Contact->ReportUserGroups,
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'fields' => 'COUNT(Contact.lead_status) as count, Contact.lead_status',
            'group' => 'Contact.lead_status'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['lead_status'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}

    public function getLeadsPieData($show_group=null) {
		$this->layout = null;
        $leads=$this->_leadsPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	 public function crmreport_getLeadsPieData($show_group=null) {

		 $this->layout = null;
        $leads=$this->_leadsPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

	private function _leadsPieData($show_group=null)
	{

		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));


		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

        $group_id = $this->Auth->user('group_id');

		$conditions = array(
			'User.group_id' => $this->Contact->ReportUserGroups,
			'Contact.company_id' => $user_id,
			'Contact.modified >=' => $first_day_this_month,
			'Contact.modified <=' => $last_day_this_month
		);

        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'fields' => 'COUNT(Contact.id) as count, ContactStatus.*',
            'group' => 'Contact.contact_status_id'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['ContactStatus']['name'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
	public function bdc_survey_report()
	{
		$this->layout = null;
		$user_id = $this->Auth->user('dealer_id');

		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->loadModel('BdcSurvey');
		$fields=array('BdcSurvey.*','BdcLead.id','BdcLead.sales_step','BdcLead.modified');

		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'Contact.sales_step !=' => 'Pending',
			/*'User.group_id' => $this->Contact->ReportUserGroups,*/
			'Contact.status NOT IN' => array('Sold/Rolled','Sold/Rolled-Multi Vehicle'),
			'Contact.modified >=' => $first_day_this_month,
			'Contact.modified <=' => $last_day_this_month,
			'Contact.company_id'=>$user_id
            );
		$all_leads = $this->Contact->find('list', array('fields'=>'Contact.id,Contact.id','conditions'=>$conditions));
		$leads=count($all_leads);
		$all_calls=$this->BdcSurvey->find('all',array('fields'=>$fields,'conditions'=>array('dealer_id'=>$user_id,'latest'=>'yes','BdcSurvey.created >='=>$first_day_this_month,'BdcSurvey.created <='=>$last_day_this_month,'BdcSurvey.survey_id'=>2)));
		$total_counts=array(
							'total_ndf'=>'0',
							'contacts'=>'0',
							'contact_per'=>'0',
							'bad_number'=>'0',
							'bad_per'=>'0',
							'in'=>'0',
							'contact_in'=>'0',
							'sold'=>'0',
							'contact_sold'=>'0',
							'no_number'=>'0',
							'no_number_per'=>'0',
							'contact_bad'=>0,
							'contact_ids'=>array(0),
							'bad_ids'=>array(0),
							'no_ids'=>array(0),
							'in_ids'=>array(0),
							'sold_ids'=>array(0),
							);
		$total_counts['total_ndf']=$leads;
		foreach($all_calls as $call)
		{
			if($call['BdcSurvey']['status']=='contact')
			{
				$total_counts['contacts']++;
				$total_counts['contact_ids'][]=$call['BdcLead']['id'];
			}
			elseif($call['BdcSurvey']['status']=='bad number')
			{
				$total_counts['bad_number']++;
				$total_counts['bad_ids'][]=$call['BdcLead']['id'];
			}
			elseif($call['BdcSurvey']['status']=='no number')
			{
				$total_counts['no_number']++;
				$total_counts['no_ids'][]=$call['BdcLead']['id'];
			}
			if($call['BdcLead']['sales_step']!=$call['BdcSurvey']['lead_sales_step']&&$call['BdcLead']['modified']>$call['BdcSurvey']['created']&&$call['BdcSurvey']['status']=='contact')
			{
				$total_counts['in']++;
				$total_counts['in_ids'][]=$call['BdcLead']['id'];
			}
			if(/*$call['BdcLead']['sales_step']=='Sold'&&*/($call['BdcLead']['status']=='Sold/Rolled'||$call['BdcLead']['status']=='Sold/Rolled-Multi Vehicle')&&$call['BdcLead']['modified']>$call['BdcSurvey']['created']&&$call['BdcSurvey']['status']=='contact')
			{
				$total_counts['sold']++;
				$total_counts['sold_ids'][]=$call['BdcLead']['id'];
			}
		}
		$total_counts['contact_bad']=$total_counts['total_ndf']-($total_counts['bad_number']+$total_counts['no_number']);
		$total_counts['contact_per']=round(($total_counts['contacts']/$total_counts['contact_bad'])*100);
		$total_counts['bad_per']=round(($total_counts['bad_number']/$total_counts['total_ndf'])*100);
		$total_counts['no_number_per']=round(($total_counts['no_number']/$total_counts['total_ndf'])*100);
		$total_counts['contact_in']=round(($total_counts['in']/$total_counts['contacts'])*100);
		$total_counts['contact_sold']=round(($total_counts['sold']/$total_counts['contacts'])*100);
		/*pr($total_counts);
		echo $leads;
		die;*/
		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
	}

	public function dailyrecap_reports($stats_month = null,$s_date = null, $e_date = null,$layout="yes") {
		if($layout=="yes"){
			$diffSec = 86400;
			$this->layout='default_new';
		}else{ /* this is popup: show today's report by default*/
			$diffSec = 0;
			$this->layout= false;
		}
		$dealer_id = $this->Auth->user('dealer_id');
		$userinfo = $this->Auth->user();

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if($stats_month == null || $stats_month=="null"){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}

		if(($s_date == null || $s_date == "null") && ($e_date == null || $e_date == "null")){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-$diffSec));
			$e_date = date("Y-m-d",(time()-$diffSec));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->set('layout',$layout);

		/* List of users */
		$group_id = $this->Auth->user('group_id');
		$stat_options = array();
		if( $group_id != 3){
			$this->loadModel('User');
			$stat_options['Staff'] = 'All Staff';
			$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
			$stat_options = Set::merge($stat_options, $emps);
		}else{
			$stat_options[ $this->Auth->user('id')  ] = $this->Auth->user('full_name');
		}
		$this->set('stat_options', $stat_options);

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

	public function crmreport_dailyrecap_reports($stats_month = null,$s_date = null, $e_date = null,$layout="yes") {
		$this->view='dailyrecap_reports';
		if($layout=="yes"){
			$diffSec = 86400;
			$this->layout='default_new';
		}else{ /* this is popup: show today's report by default*/
			$diffSec = 0;
			$this->layout= false;
		}
		$dealer_id = $this->Auth->user('dealer_id');
		$userinfo = $this->Auth->user();

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if($stats_month == null || $stats_month=="null"){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}

		if(($s_date == null || $s_date == "null") && ($e_date == null || $e_date == "null")){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-$diffSec));
			$e_date = date("Y-m-d",(time()-$diffSec));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->set('layout',$layout);

		/* List of users */
		$group_id = $this->Auth->user('group_id');
		$stat_options = array();
		if( $group_id != 3){
			$this->loadModel('User');
			$stat_options['Staff'] = 'All Staff';
			$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
			$stat_options = Set::merge($stat_options, $emps);
		}else{
			$stat_options[ $this->Auth->user('id')  ] = $this->Auth->user('full_name');
		}
		$this->set('stat_options', $stat_options);
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);
		$show_group=$this->Auth->user('dealer_id');
		if( $this->Session->check("show_group") ){
				$show_group = $this->Session->read("show_group");
			}
			$this->set(compact('show_group'));
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

	public function lead_logs()
	{
		$this->layout='default_worksheet2';
		if($this->request->is('post')||$this->request->is('ajax'))
		{
			$leads=explode(',',$this->request->data['leads']);
			$this->loadModel('BdcLead');
			//pr($leads);
			$h_fields=array('History.h_type','History.sperson','History.sales_step','History.status','History.comment','History.modified','History.id');
			$this->Contact->unbindModelAll();
			$this->Contact->bindModel(array('hasMany'=>array('History'=>array('Class'=>'History','fields'=>$h_fields,'order'=>array('History.id'=>'DESC')))));
			$fields=array('Contact.id','Contact.first_name','Contact.last_name','Contact.mobile','Contact.condition','Contact.year','Contact.make','Contact.model');
			 $this->paginate = array(
       			 'conditions' => array('Contact.id'=>$leads),
				 'fields'=>$fields,
        		'limit' => 10
   				 );
			$all_logs=$this->Paginate('Contact');
			/*pr($all_logs);
			die;*/
			$this->set(compact('all_logs'));
		}
	}

	public function dms_sales_feed()
	{
		$this->layout='default_new';
		$this->loadModel('SalesLeadsDms');
		$this->loadModel('LeadSold');
		$zone=$this->Auth->user('zone');
		$dealer_id = $this->Auth->user('dealer_id');
		date_default_timezone_set($zone);
		$feed_end_date = $feed_start_date = date('Y-m-d',strtotime('-1 day'));
		$feed_first_date = date('Y-m-d 00:00:00',strtotime('-1 day'));
		$feed_last_date = date('Y-m-d 23:59:00',strtotime('-1 day'));
		if(!empty($this->request->params['named']['from_feed_stat_date']) && !empty($this->request->params['named']['to_feed_stat_date']))
		{
			$feed_first_date =  date('Y-m-d 00:00:00',strtotime($this->request->params['named']['from_feed_stat_date']));
			$feed_last_date = date('Y-m-d 23:59:00',strtotime($this->request->params['named']['to_feed_stat_date']));
			$feed_start_date =$this->request->params['named']['from_feed_stat_date'];
			$feed_end_date =$this->request->params['named']['to_feed_stat_date'];
		}
		$dms_fields = array(
						'SalesLeadsDms.id',
						'SalesLeadsDms.name',
						'SalesLeadsDms.dealer_id',
						'SalesLeadsDms.date_final',
						'SalesLeadsDms.email',
						'SalesLeadsDms.phone',
						'SalesLeadsDms.mobile',
						'SalesLeadsDms.work_phone',
						'SalesLeadsDms.sperson',
						'SalesLeadsDms.vin_no',
						'SalesLeadsDms.unit_condition',
						'SalesLeadsDms.unit_year',
						'SalesLeadsDms.unit_make',
						'SalesLeadsDms.unit_model',
						'SalesLeadsDms.created',
		);
		$sold_fields = array(
						'LeadSold.id',
						'LeadSold.first_name',
						'LeadSold.last_name',
						'LeadSold.company_id',
						'LeadSold.email',
						'LeadSold.phone',
						'LeadSold.mobile',
						'LeadSold.sperson',
						'LeadSold.source',
						'LeadSold.condition',
						'LeadSold.year',
						'LeadSold.make',
						'LeadSold.model',
						'LeadSold.vin',
						'LeadSold.contact_status_id',
						'LeadSold.created',
						'LeadSold.modified',
					);
		$sold_conditions = array(
							'LeadSold.company_id' => $dealer_id,
							'LeadSold.created >=' => $feed_first_date,
							'LeadSold.created <=' => $feed_last_date
							);
		$dms_conditions = array(
							'SalesLeadsDms.dealer_id' => $dealer_id,
							'SalesLeadsDms.date_final >=' => $feed_start_date,
							'SalesLeadsDms.date_final <=' => $feed_end_date
							);
		$sold_leads = $this->LeadSold->find('all',array('fields' => $sold_fields , 'conditions' => $sold_conditions));
		$dms_sales_leads = $this->SalesLeadsDms->find('all',array('fields' => $dms_fields , 'conditions' => $dms_conditions));
		$this->loadModel('ContactStatus');
		$contact_lead_type = $this->ContactStatus->find('list');
		$this->set(compact('sold_leads','dms_sales_leads','feed_start_date','contact_lead_type','feed_end_date'));


	}

	public function export_contact()
	{
		$this->layout='default_new_settings';

		$dealer_id = $this->Auth->user('dealer_id');

		if(!$this->Cookie->check('dealer_report_pass_'.$dealer_id)){
			//$this->redirect(array('controller' => 'reports', 'action' => 'reprot_check_password'));
		}
		$contact_columns= array(
	'first_name' => 'First Name','last_name' =>'Last Name','email' =>'Email','phone' => 'Phone','mobile' => 'Mobile',
	'work_number' => 'Work Number','address' => 'Address','city' => 'City','state' => 'State','zip' =>'Zip','sperson' =>'Sales Person','condition' => 'Condition',
	'year' => 'Year','make' => 'Make','model' =>'Model','owner'=>'Originator','source'=>'Source','lead_status'=>'Lead Status','created'=>'Created','modified'=>'Modified');
	$model = 'Contact';
	if($this->request->is('post'))
	{
		$this->layout=false;
		$this->loadModel($model);
		$this->$model->recursive = -1;

		$field_array  = $this->request->data['ExportData']['columns'];
		$conditions = array('company_id' => $dealer_id,'NOT'=>array('status' => array('Duplicate-Closed'),'dnc_status'=>array('no_call_email','not_email')));

		if($this->request->data['ExportData']['record_search'] == 'date_range'){
			$conditions['created >='] = date('Y-m-d 00:00:00',strtotime($this->request->data['ExportData']['start_date']));
			$conditions['created <='] = date('Y-m-d 23:59:00',strtotime($this->request->data['ExportData']['end_date']));
		}
		if(!empty($this->request->data['ExportData']['search_filters'])){
  		foreach($this->request->data['ExportData']['search_filters'] as $filter)
  		{
  			if($filter == 'valid_email')
  			{
  				$conditions['email <> '] = '';
  				$conditions['email REGEXP '] = "^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[A-Z]{2,4}$";

  			}
  		}
		}

    $group_by = array();
    if(!empty($this->request->data['ExportData']['group_by'])){
      foreach($this->request->data['ExportData']['group_by'] as $g_by){
          array_push($group_by,$g_by);
      }
    }
		$all_records = $this->$model->find('all',array('limit' => '10000','fields' => $field_array,'conditions' => $conditions,'group' => $group_by));

		$this->set(compact('all_records','field_array','model','contact_columns'));
		$html=$this->render('/Elements/export_contact_info');

		$this->loadModel('ReportAlertEmail');
		$recipients = $this->ReportAlertEmail->find('list',array('fields' => 'id,email','conditions' => array('dealer_id' => $dealer_id)));
		if(!empty($recipients)){
		$user_data =$this->Auth->user();
		$tmpDate = date("mdY");
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->reset();
		$email->config('sender');
		$email->viewVars(array('user_data'=>$user_data));
		$email->template('contact_export_report')
			->emailFormat('html')
			->subject('Export Tool')
			->from('sender@dp360crm.com')
			->to($recipients);
			//->bcc($bcc);
			$email->send();

		}
		$this->export($html);
		die;
	}

	$this->set(compact('contact_columns'));
	}

	public function export($html){
		App::import('Component', 'ExcelWriter');
		$excel = new ExcelWriterComponent();
		if($excel==false){
			echo $objExcel->error;die;
		}else{
			$excel->stream($html,'/'.time().'_dealer_contacts.xls');
		}
	}

	public function reprot_check_password()
	{
		$this->layout = 'default_new';
		$dealer_id = $this->Auth->user('dealer_id');
		if($this->request->is('post')){
			$this->loadModel('DealerName');
			$password = trim($this->request->data['Dealer']['password']);
			$find_dealer = $this->DealerName->find('first',array('conditions' => array('DealerName.dealer_id' => $dealer_id,'DealerName.dealer_password' => $password)));
			if(!empty($password) && !empty($find_dealer) )
			{
				$this->Cookie->write('dealer_report_pass_'.$dealer_id,'yes',true,'30 minutes');
				$this->redirect(array('controller' => 'reports','action' => 'export_contact'));
			}else{
				 $this->Session->setFlash(__('Invalid Password'), 'alert', array('class' => 'alert-danger'));
			}
		}
	}


	public function new_logs_report($stats_month = null,$s_date = null, $e_date = null,$layout="yes")
	{
		if($layout=="yes"){
			$diffSec = 86400;
			$this->layout='default_new';
		}else{ /* this is popup: show today's report by default*/
			$diffSec = 0;
			$this->layout= false;
		}
		$dealer_id = $this->Auth->user('dealer_id');
		$userinfo = $this->Auth->user();

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if($stats_month == null || $stats_month=="null"){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}

		if(($s_date == null || $s_date == "null") && ($e_date == null || $e_date == "null")){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-$diffSec));
			$e_date = date("Y-m-d",(time()-$diffSec));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->set('layout',$layout);

		/* List of users */
		$group_id = $this->Auth->user('group_id');
		$stat_options = array();
		if( $group_id != 3){
			$this->loadModel('User');
			$stat_options['Staff'] = 'All Staff';
			$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
			$stat_options = Set::merge($stat_options, $emps);
		}else{
			$stat_options[ $this->Auth->user('id')  ] = $this->Auth->user('full_name');
		}
		$this->set('stat_options', $stat_options);




	}

	public function source_stat_report_export(){


		$zone = $this->Auth->user('zone');
		$dealer_id = $this->Auth->user('dealer_id');
		$rec_limit = 30;
		$feed_first_date = date('Y-m-01 00:00:00');
		$feed_last_date = date('Y-m-d 23:59:00');

		$feed_start_date =date('Y-m-01');
		$feed_end_date = date('Y-m-d');

		if(!empty($this->request->params['named']['from_feed_stat_date']) && !empty($this->request->params['named']['to_feed_stat_date']))
		{
			$feed_first_date =  date('Y-m-d 00:00:00',strtotime($this->request->params['named']['from_feed_stat_date']));
			$feed_last_date = date('Y-m-d 23:59:00',strtotime($this->request->params['named']['to_feed_stat_date']));
			$feed_start_date =$this->request->params['named']['from_feed_stat_date'];
			$feed_end_date =$this->request->params['named']['to_feed_stat_date'];
		}
		if(!empty($this->request->params['named']['limit']))
		$rec_limit =$this->request->params['named']['limit'];

		$this->loadModel('Contact');
		$query = "Select COUNT(*) as st_lead_count,`Contact`.`make`,`Contact`.`model`,`Contact`.`source` from `contacts` `Contact` where `Contact`.`created` >= :feed_first_date AND `Contact`.`created` <= :feed_last_date AND `Contact`.`status` <> 'Duplicate-Closed' AND `Contact`.`company_id` = :dealer_id Group By `Contact`.`source` , `Contact`.`make`,`Contact`.`model` ORDER BY COUNT(*) DESC LIMIT $rec_limit;";

		$source_stats = $this->Contact->query($query,array('feed_first_date' =>$feed_first_date,'feed_last_date' => $feed_last_date,'dealer_id' => "'".$dealer_id."'"));

		$group_id = $this->Auth->user('group_id');
		// debug($source_stats);

		$headers = array("Source","Make","Model","Lead Count");

		$filename = "source_stat_report_{$dealer_id}.csv";

		header( 'Content-Type: text/csv' );
		header( 'Content-Disposition: attachment;filename='.$filename);

		$output = fopen("php://output", "w");
		fputcsv($output, $headers);
		foreach($source_stats as $source_st){
			$row = array();
			$row[] = $source_st['Contact']['source'];
			$row[] = $source_st['Contact']['make'];
			$row[] = $source_st['Contact']['model'];
			$row[] = $source_st['0']['st_lead_count'];

			fputcsv($output, $row);
		}
		fclose($output);

		$this->autoRender = false;
	}

	//Report for display stats lead count for source/model/make
	public function source_stat_report()
	{
		$this->layout='default_new';
		$this->_sourceStatReport();
	}

	public function bdcapp_source_stat_report()
	{
		$this->layout='bdcapp_layout';
		$this->view = 'bdc_appt_report';
		$this->_sourceStatReport();
	}


	private function _sourceStatReport()
	{
		$zone = $this->Auth->user('zone');
		$dealer_id = $this->Auth->user('dealer_id');
		$rec_limit = 30;
		$feed_first_date = date('Y-m-01 00:00:00');
		$feed_last_date = date('Y-m-d 23:59:00');

		$feed_start_date =date('Y-m-01');
		$feed_end_date = date('Y-m-d');

		if(!empty($this->request->params['named']['from_feed_stat_date']) && !empty($this->request->params['named']['to_feed_stat_date']))
		{
			$feed_first_date =  date('Y-m-d 00:00:00',strtotime($this->request->params['named']['from_feed_stat_date']));
			$feed_last_date = date('Y-m-d 23:59:00',strtotime($this->request->params['named']['to_feed_stat_date']));
			$feed_start_date =$this->request->params['named']['from_feed_stat_date'];
			$feed_end_date =$this->request->params['named']['to_feed_stat_date'];
		}
		if(!empty($this->request->params['named']['limit']))
		$rec_limit =$this->request->params['named']['limit'];

		$this->loadModel('Contact');
		$query = "Select COUNT(*) as st_lead_count,`Contact`.`make`,`Contact`.`model`,`Contact`.`source` from `contacts` `Contact` where `Contact`.`created` >= '{$feed_first_date}' AND `Contact`.`created` <= '{$feed_last_date}' AND `Contact`.`status` <> 'Duplicate-Closed' AND `Contact`.`company_id` = '{$dealer_id}' Group By `Contact`.`source` , `Contact`.`make`,`Contact`.`model` ORDER BY COUNT(*) DESC LIMIT $rec_limit;";

		$source_stats = $this->Contact->query($query);
		$group_id = $this->Auth->user('group_id');
		$this->set(compact('source_stats','feed_first_date','feed_last_date','rec_limit'));

	}

}

?>