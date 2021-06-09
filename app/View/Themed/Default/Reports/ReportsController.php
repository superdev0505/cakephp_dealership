<?php

class ReportsController extends AppController {

    public $uses = array('Contact');
    public $components = array('RequestHandler');

    public function index() {
        
    }
    public function fullReport(){
    }
	//Report lead_source
	public function lead_source(){
		
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
		$report_results = $this->Contact->query("
			SELECT `Contact`.`ref_num`,
			`Contact`.`id`,
			`Contact`.`source`,
			count(`Contact`.`source`) as source_count,
			SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
			SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle
			FROM `crmdeva1_crm2`.`contacts` AS `Contact` WHERE 1 = 1 GROUP BY `Contact`.`source`
		");
		
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
		//debug($result_ar);
		//debug($total_count);
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);
		
	}
	//Report sales_person
	public function sales_person(){
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
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle
	
		FROM `contacts` AS `Contact`
		INNER JOIN users `User` ON Contact.user_id = `User`.id
		WHERE 1 = 1
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC
		");
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
		$this->set('result_ar',$result_ar);
		$this->set('total_count',$total_count);
	
	}
	
	//Report Lead Type
	public function lead_type(){
		//Lead Type
		$report_results = $this->Contact->query("
		SELECT
		`ContactStatus`.`name`,
		count(`Contact`.`contact_status_id`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		INNER JOIN contact_statuses `ContactStatus` ON Contact.contact_status_id = `ContactStatus`.id
		WHERE 1 = 1
		GROUP BY  `Contact`.`contact_status_id`
		ORDER BY `ContactStatus`.name ASC
		");
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
	
		//Lead Visits:
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		WHERE `Contact`.`status` in ('Mobile Lead','Web to Showroom','Lead 1st Visit','Lead Return','Parts to Sales','Service to Sales','Rental to Sales')
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		");
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
	public function lead_calls(){
	
		//Lead Calls:
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		WHERE `Contact`.`status` in (
      		'Lead Call-In','Call-Out Lead','Lead Invited','No Awnser','Reminder Call','Thanks Call','Events Call','F/I Call','Parts Call','Service Call','Rental Call'
    	)
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		");
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

	//Lead Update Satus:
	public function lead_update_satus(){
	
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		WHERE `Contact`.`status` in (
      		'Brochure Only','Lead FollowUp','Delayed Contact','Test Drive','Price Quote','Objection','Write Up','T/O Manager','Lead Sold','Deal F/I','Went Home','Shopping','Delivered','Multi-Vehicle'
    	)
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		");
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
	public function lead_closed_deals(){
	
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		WHERE `Contact`.`status` in (
      		'No Activity','Duplicate','Invalid Lead','Dead Lead','Not Intrested','Price To High','Bought Online','Dealer not trade','Bad Credit','Needs Cosign','Down Payment','Bought Elsewhere','Credit Turndown'
    	)
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		");
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
	
	//Lead Appointments:
	public function lead_appointments(){
	
		$report_results = $this->Contact->query("
		SELECT
		`Contact`.`status`,
		count(`Contact`.`status`) as source_count,
		SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
		SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
		SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
		SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle

		FROM `contacts` AS `Contact`
		WHERE `Contact`.`status` in (
      		'Work to Appt','Appt Set','Confirm Appt','Showed Appt','No Show Appt','Meeting Lead','Delivery Appt'
    	)
		GROUP BY  `Contact`.`status`
		ORDER BY `Contact`.`status` ASC
		");
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
	
	//Lead Steps
	public function lead_steps(){
		
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
		SUM(if(`Contact`.`sales_step` = 'Sold', 1, 0)) AS sold
		
		FROM `contacts` AS `Contact`
		INNER JOIN users `User` ON Contact.user_id = `User`.id
		WHERE 1 = 1
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC");
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
	
	public function lead_appointments_event(){
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
		$report_results = $this->Contact->query("
			SELECT
			`Contact`.`sales_step`,
			count(`Contact`.`sales_step`) as source_count,
			SUM(if(`Contact`.`lead_status` = 'Closed', 1, 0)) AS closed_lead,
			SUM(if(`Contact`.`lead_status` = 'Open', 1, 0)) AS open_lead,
			SUM(if(`Contact`.`status` = 'Invalid Lead', 1, 0)) AS invalid_lead,
			SUM(if(`Contact`.`status` = 'Lead Sold', 1, 0)) AS sold_vehicle
	
			FROM `contacts` AS `Contact`
			WHERE 1= 1
			GROUP BY  `Contact`.`sales_step`
			ORDER BY `Contact`.`sales_step` ASC
		");
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
		$this->set('result_ar',$result_ar);
		$this->set('lead_sources',$lead_sources);
		$this->set('total_count',$total_count);		
	}
	
	public function main_reports() {
		$this->layout='default_new';
		
		
	}
	public function eblast_reports() {
		$this->layout='default_new';
	}	
	public function sales_pipeline_reports() {
		$this->layout='default_new';
	}
	public function drop_reports() {
		$this->layout='default_new'; 
	}

	public function unit_reports() {
         $this->layout='default_new'; 
	}

    public function getMainLeads() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
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

    public function getStatusPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.status) as count, Contact.status',
            'group' => 'Contact.status DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getSourcePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.source) as count, Contact.source',
            'group' => 'Contact.source DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getBuyingTimePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.buying_time) as count, Contact.buying_time',
            'group' => 'Contact.buying_time DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getGenderPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.gender) as count, Contact.gender',
            'group' => 'Contact.gender DESC LIMIT 2'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getBestTimePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.best_time) as count, Contact.best_time',
            'group' => 'Contact.best_time DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getStepsPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.sales_step) as count, Contact.sales_step',
            'group' => 'Contact.sales_step DESC LIMIT 9'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['sales_step'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getLeadStatusPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.lead_status) as count, Contact.lead_status',
            'group' => 'Contact.lead_status DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getLeadsPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.id) as count, ContactStatus.*',
            'group' => 'Contact.contact_status_id DESC'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

}

?>