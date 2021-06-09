<?php

class ManageWebLeadController extends AppController {

	public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
	public $components = array('RequestHandler');
	public $ReportUserGroups = array(1,2,3,4,5,6,10,11);
    public $ReportUserGroupQuery = "`User`.`group_id` in (1,2,3,4,5,6,10,11) AND ";


	public function beforeFilter() {

		parent::beforeFilter();
	}

    public function main_report() {
    	$this->layout='default_pipeline_reports'; 


    	$userinfo = $this->Auth->User();
    	if($userinfo['username'] == 'master'){
    		$dealer_ids = array( $userinfo['dealer_id'] => $userinfo['dealer'] );
    	}else{
    		$dealer_ids = $this->get_dealer_ids();	
    	}

		//$dealer_ids = array('1632' => 'American Eagle Harley-Davidson','5000' => 'Del Amo Motorsports Long Beach');
		// debug($dealer_ids);

		$report_data = array();
		foreach ($dealer_ids as $key => $value) {
			
			$report_data[$key]['dealer'] = $value;
			$report_data[$key]['dealer_id'] = $key;
			$report_data[$key]['zone'] = $userinfo['zone'];


			$cache_key = "main_report_".$key;
			Cache::set(array('duration' => '+12 hours'), $this->Memcache_config);

			$this->loadModel('MainreportRefreshTime');
			$settings = $this->MainreportRefreshTime->find('first', array('conditions'=>array('MainreportRefreshTime.dealer_id'=>$key)));
			if(!empty($settings)){
				//debug($settings['MainreportRefreshTime']['last_refresh']);
				$last_refresh = date('m/d/Y g:i:s A', strtotime( $settings['MainreportRefreshTime']['last_refresh'] ));
			}

			if (($mainreport_stats = Cache::read($cache_key, $this->Memcache_config)) === false) {

				//debug("cache refresh");
				$mainreport_stats = $this->mian_report_data($key);
				Cache::set(array('duration' => '+12 hours'), $this->Memcache_config);
				Cache::write($cache_key, $mainreport_stats, $this->Memcache_config);
				
				if(empty($settings)){
					$this->MainreportRefreshTime->create();
					$this->MainreportRefreshTime->save(array('MainreportRefreshTime'=>array(
						'last_refresh'=> date('Y-m-d H:i:s'),
						'dealer_id'=>$key
					)));
					$last_refresh = date('m/d/Y g:i:s A');
				}else{
					$this->MainreportRefreshTime->id = $settings['MainreportRefreshTime']['id'];
					$this->MainreportRefreshTime->saveField('last_refresh', date('Y-m-d H:i:s'));
					$last_refresh = date('m/d/Y g:i:s A');
				}

			}
			$report_data[$key]['stat'] = $mainreport_stats;
			$report_data[$key]['last_refresh'] =  $last_refresh;
		}


		//debug($report_data);
		$this->set('report_data', $report_data );

		$today_label = "Today's Stats: ".date('m/d/Y');
		$month_label = "Month Stats: ".date('F Y');
		$this->set('today_label', $today_label );
		$this->set('month_label', $month_label );

    }

	public function mian_report_data($dealer_id) {
		
		$report_day = date('Y-m-d');
		$date_start = date('Y-m-d 00:00:00');
		$date_end = date('Y-m-d 23:59:59');
		$report_month = date('Y-m');

		$first_day_this_month = date('Y-m-01 00:00:00'); 
        $last_day_this_month  = date('Y-m-t 23:59:59');

		//debug($date_start);


		
		//debug( $this->_get_user_list_dealer($dealer_id)  ) ;


		$leads_condition = array(
			'User.active' => '1',
			'date_format(Contact.modified,\'%Y-%m\')' => $report_month,
			'Contact.status <> '=>'Duplicate-Closed',
			'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
		);

		$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);
		$contacts = $this->Contact->find('all', array('fields'=>array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.status',
			'Contact.sales_step',
			'Contact.lead_status',
			'Contact.contact_status_id',
			'Contact.step_modified',
			'Contact.created',
			'Contact.modified',
		),'conditions'=>$leads_condition));

		$closed_lead_statuses = $this->_get_closed_statuses2();

		$report_data = array();

		$report_data['open_lead_count'] = 0;
		$report_data['closed_lead_count'] = 0;
		$report_data['pending_lead_count'] = 0;
		$report_data['today_lead_count'] = 0;

		$report_data['dealer_spike_count'] = 0;
		$report_data['engage_to_sell_count'] = 0;
		$report_data['trader_media_count'] = 0;
		$report_data['contact_at_once_count'] = 0;

		$pie_data ['DSpike_total'] = 0;
		$pie_data ['EnToSell_total'] = 0;
		$pie_data ['TraderMedia_total'] = 0;
		$pie_data ['ContactAtOnce_total'] = 0;


		$pie_data ['web_total'] = 0;
		$pie_data ['phone_total'] = 0;
		$pie_data ['showroom_total'] = 0;
		$pie_data ['mobile_total'] = 0;

		$pie_data ['sales_step_total'] = array();

		$report_data['month_open_lead_count'] = 0;
		$report_data['month_closed_lead_count'] = 0;
		$report_data['month_pending_lead_count'] = 0;

	
		foreach($contacts as $contact){
			if( substr($contact['Contact']['modified'], 0, 10 ) == $report_day && $contact['Contact']['lead_status'] == 'Open'){
				$report_data['open_lead_count']++;
			}
			if( $contact['Contact']['lead_status'] == 'Open'){
				$report_data['month_open_lead_count']++;
			}

			if( substr($contact['Contact']['modified'], 0, 10 ) == $report_day &&  in_array($contact['Contact']['status'], $closed_lead_statuses)){
				$report_data['closed_lead_count']++;
			}
			if( in_array($contact['Contact']['status'], $closed_lead_statuses)){
				$report_data['month_closed_lead_count']++;
			}

			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day &&  $contact['Contact']['sales_step'] == '1' && $contact['Contact']['lead_status'] == 'Open' ){
				$report_data['pending_lead_count']++;
			}
			if( $contact['Contact']['sales_step'] == '1' && $contact['Contact']['lead_status'] == 'Open' ){
				$report_data['month_pending_lead_count']++;
			}

			


			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day && $contact['Contact']['sales_step'] <> '1' ){
				$report_data['today_lead_count'] ++;
			}

			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day && $contact['Contact']['ref_num'] == 'DSpike'){
				$report_data['dealer_spike_count']++;
			}
			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day && $contact['Contact']['ref_num'] == 'EnToSell'){
				$report_data['engage_to_sell_count']++;
			}
			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day && $contact['Contact']['ref_num'] == 'TraderMedia'){
				$report_data['trader_media_count']++;
			}
			if(substr($contact['Contact']['created'], 0, 10 ) == $report_day && $contact['Contact']['ref_num'] == 'ContactAtOnce'){
				$report_data['contact_at_once_count']++;
			}

			if($contact['Contact']['ref_num'] == 'DSpike'){
				$pie_data ['DSpike_total']++;
			}
			if($contact['Contact']['ref_num'] == 'EnToSell'){
				$pie_data ['EnToSell_total']++;
			}
			if($contact['Contact']['ref_num'] == 'TraderMedia'){
				$pie_data ['TraderMedia_total']++;
			}
			if($contact['Contact']['ref_num'] == 'ContactAtOnce'){
				$pie_data ['ContactAtOnce_total']++;
			}

			if($contact['Contact']['contact_status_id'] == '5'){
				$pie_data ['web_total']++;
			}
			if($contact['Contact']['contact_status_id'] == '6'){
				$pie_data ['phone_total']++;
			}
			if($contact['Contact']['contact_status_id'] == '7'){
				$pie_data ['showroom_total']++;
			}
			if($contact['Contact']['contact_status_id'] == '12'){
				$pie_data ['mobile_total']++;
			}

			if($contact['Contact']['step_modified'] != '' && $contact['Contact']['sales_step'] != '10'){
				if(isset($pie_data['sales_step_total'][$contact['Contact']['sales_step']])){
					$pie_data['sales_step_total'][$contact['Contact']['sales_step']] += 1; 
				}else{
					$pie_data['sales_step_total'][$contact['Contact']['sales_step']] = 1; 
				}
			}

		}
		
		//Sold Today
		 $this->loadModel("LeadSold");
		$sold_today_lead_condition =  array(
            'LeadSold.company_id' => $dealer_id,
            'LeadSold.user_id' => $this->_get_user_list_dealer($dealer_id),
            'date_format(LeadSold.modified,\'%Y-%m-%d\')' => $report_day,
        );
        $report_data['today_sold_lead_count'] = $this->LeadSold->find('count', array('conditions'=>$sold_today_lead_condition));
        



		
		//Sold Month Lead Count
		//debug($pie_data['sales_step_total']);
		$report_data['sold_lead_count'] = 0;
		$sold_lead_condition =  array(
            'LeadSold.company_id' => $dealer_id,
            'LeadSold.user_id' => $this->_get_user_list_dealer($dealer_id),
            'date_format(LeadSold.modified,\'%Y-%m\')' => $report_month,
        );
       	$report_data['sold_lead_count'] = $this->LeadSold->find('count', array('conditions'=>$sold_lead_condition));
		$pie_data['sales_step_total'][10] = $report_data['sold_lead_count'];

		


		//Dormant lead count
		$report_data['dormant_lead_count'] = 0;
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
		$c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';
	 	$dormant_lead_condition = array(
            'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),  
            'date_format(Contact.modified,\'%Y-%m\')' => date('Y-m'),   
            'Contact.modified <=' => $datetime_48hours_back,
            'Contact.lead_status' => "Open",
            'Contact.status <>' => $c_statuses,
            'Contact.company_id' => $dealer_id,
            'Contact.sales_step <>' => '10',
            'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
        );
        $this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);
		$report_data['dormant_lead_count'] = $this->Contact->find('count', array('conditions'=>$dormant_lead_condition));

		//Today event count
		$report_data['today_event_count'] = 0;
		$today_event_condition =  array(
            'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
            'date_format(Event.start,\'%Y-%m-%d\')' =>  date('Y-m-d'),
            'Event.status <>'=>array('Completed','Canceled'),
            'Contact.company_id' => $dealer_id,
        );
        $this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);
		$report_data['today_event_count'] = $this->Contact->find('count', array('conditions'=>$today_event_condition));


		//Over due event count
		$report_data['over_due_events']  = 0;
		$over_due_event_condition =  array(
            'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
            'Event.start <=' =>  date('Y-m-d H:i:s'),
            'Event.status <>'=>array('Completed','Canceled'),
            'Contact.company_id' => $dealer_id,
        );
        $this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);
		$report_data['over_due_events'] = $this->Contact->find('count', array('conditions'=>$over_due_event_condition));

		//Inbound Out Bound Report
		App::import('Core', 'ConnectionManager');
        $dataSource = ConnectionManager::getDataSource('default');
        $mysqli = new mysqli($dataSource->config['host'], $dataSource->config['login'], $dataSource->config['password'], $dataSource->config['database']);
		

        //in out today
		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_in_out_calls(%s, '%s', '%s', '%s')", 
		 	Sanitize::escape($dealer_id), 
			Sanitize::escape(  $date_start),
			Sanitize::escape(  $date_end),
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
		$report_data['new_inbound_day']  = count($all_results_inout[0]);
		$report_data['new_outbound_day']  = count($all_results_inout[1]); 
		$report_data['existing_inbound_day']  = count($all_results_inout[2]);
		$report_data['existing_outbound_day']  = count($all_results_inout[3]); 
		$report_data['msgr_day']  = count($all_results_inout[4]); 


		//in out month 
		App::uses('Sanitize', 'Utility');
		$query = sprintf("CALL realtime_in_out_calls(%s, '%s', '%s', '%s')", 
		 	Sanitize::escape($dealer_id), 
			Sanitize::escape(  $first_day_this_month),
			Sanitize::escape(  $last_day_this_month),
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
		//debug($all_results_inout);
		$report_data['new_inbound_month']  = count($all_results_inout[0]);
		$report_data['new_outbound_month']  = count($all_results_inout[1]); 
		$report_data['existing_inbound_month']  = count($all_results_inout[2]);
		$report_data['existing_outbound_month']  = count($all_results_inout[3]); 
		$report_data['msgr_month']  = count($all_results_inout[4]); 






		$all_reports['report_data'] = $report_data;
		//calculate chart data
		//$this->set('report_data', $report_data);

		//Pie chart vendor
		//debug($pie_data);
		$total_vendor = $pie_data ['DSpike_total'] + $pie_data ['EnToSell_total'] + $pie_data ['TraderMedia_total'] + $pie_data ['ContactAtOnce_total'];
		$total_percentage_vendor = array(); 
		$total_percentage_vendor ['Dealer Spike ('.$pie_data ['DSpike_total'].') ']  = $pie_data ['DSpike_total'] != 0 ?   round( ($pie_data ['DSpike_total']  / $total_vendor) * 100 ) : 0 ;
		$total_percentage_vendor ['Engage To Sell ('.$pie_data ['EnToSell_total'].') ']  = $pie_data ['EnToSell_total'] != 0 ?   round( ($pie_data ['EnToSell_total']  / $total_vendor) * 100 ) : 0 ;
		$total_percentage_vendor ['Trader Media ('.$pie_data ['TraderMedia_total'].') ']  = $pie_data ['TraderMedia_total'] != 0 ?   round( ($pie_data ['TraderMedia_total']  / $total_vendor) * 100 ) : 0 ;
		$total_percentage_vendor ['Contact At Once ('.$pie_data ['ContactAtOnce_total'].') ']  = $pie_data ['ContactAtOnce_total'] != 0 ?   round( ($pie_data ['ContactAtOnce_total']  / $total_vendor) * 100 ) : 0 ;
		//debug($total_percentage_vendor);
		//$this->set('total_percentage_vendor', $total_percentage_vendor);
		$all_reports['total_percentage_vendor'] = $total_percentage_vendor;

		//Pie chart for lead type (web, showroom, phone, mobile)
		$total_lead_type = $pie_data ['web_total'] + $pie_data ['phone_total'] + $pie_data ['showroom_total'] + $pie_data ['mobile_total'];
		$total_percentage_lead_type = array(); 
		$total_percentage_lead_type ['Web Lead ('.$pie_data ['web_total'].') ']  = $pie_data ['web_total'] != 0 ?   round( ($pie_data ['web_total']  / $total_lead_type) * 100 ) : 0 ;
		$total_percentage_lead_type ['Phone Lead ('.$pie_data ['phone_total'].') ']  = $pie_data ['phone_total'] != 0 ?   round( ($pie_data ['phone_total']  / $total_lead_type) * 100 ) : 0 ;
		$total_percentage_lead_type ['Showroom Lead ('.$pie_data ['showroom_total'].') ']  = $pie_data ['showroom_total'] != 0 ?   round( ($pie_data ['showroom_total']  / $total_lead_type) * 100 ) : 0 ;
		$total_percentage_lead_type ['Mobile Lead ('.$pie_data ['mobile_total'].')']  = $pie_data ['mobile_total'] != 0 ?   round( ($pie_data ['mobile_total']  / $total_lead_type) * 100 ) : 0 ;
		//debug($total_percentage_lead_type);
		//$this->set('total_percentage_lead_type', $total_percentage_lead_type);
		$all_reports['total_percentage_lead_type'] = $total_percentage_lead_type;

		//pie chart for steps
		//asort(array)
		ksort($pie_data['sales_step_total']);

		$dealer_steps = $this->get_dealer_steps($dealer_id);
		$pic_data_steps = array();
		$pic_data_steps_total = 0;
		foreach($dealer_steps  as $key=>$value){
			if(isset( $pie_data['sales_step_total'][$key])){
				$pic_data_steps[ $value ] =	$pie_data['sales_step_total'][$key];
				$pic_data_steps_total += $pie_data['sales_step_total'][$key];
			}
		}

		$total_percentage_steps = array(); 
		$sold_percentage = 0;
		foreach ($pic_data_steps as $key => $value) {
			$total_percentage_steps[ $key." ($value) " ] = $value != 0 ?   round( ($value  / $pic_data_steps_total) * 100 ) : 0 ;
			if($key == 'Sold'){
				$sold_percentage = $value != 0 ?   round( ($value  / $pic_data_steps_total) * 100 ) : 0 ;
			}
		}
		//$this->set('total_percentage_steps', $total_percentage_steps);
		$all_reports['total_percentage_steps'] = $total_percentage_steps;
		$all_reports['sold_percentage'] = $sold_percentage;

		//debug($total_percentage_steps);

		return $all_reports;


	} 

	public function get_dealer_ids(){
    	$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');
    	$other_locations_ar = explode(",", $other_locations);

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => $dconditions ));

    	//debug($user_active);
    	return $user_active;
    }


	 private function _get_closed_statuses2(){
      	$closed_lead_result = $this->Contact->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
        $closed_lead_statuses = array();
        foreach($closed_lead_result as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $closed_lead_statuses[] = $inbound['lead_statuses']['name'];
        }
        //debug($closed_lead_statuses);
        return $closed_lead_statuses;
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



	function stat_details(){

		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);

		$this->Contact->bindModel(array(
			'belongsTo'=>array('Group'=>array('foreignKey'=>false,'conditions'=>array('User.group_id = Group.id'))),
		),false);

		$user_id =  explode(',', $this->request->query['user_id']) ;
		//debug($user_id);
		$type = $this->request->query['type'];


		if( $type == 'lead_notworked_direct'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.xml_weblead' => 1,
					'Contact.user_id = Contact.owner_id',
					'Contact.created = Contact.modified',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);


		}else if( $type == 'lead_arrived_direct'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.xml_weblead' => 1,
					'Contact.user_id = Contact.owner_id',
					'Contact.created = Contact.modified',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);


		}else if( $type == 'lead_worked_direct'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.xml_weblead' => 1,
					'Contact.user_id = Contact.owner_id',
					'Contact.created <> Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);


		}else if( $type == 'lead_arrived'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					//'Contact.sales_step' => 'Pending',
					'Contact.user_id = Contact.owner_id',
					'Contact.xml_weblead' => 1,
					'Contact.created = Contact.modified',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);

		}
		else if( $type == 'lead_pushedto'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.xml_weblead' => 1,
					'Contact.staff_transfer' => 1,
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}
		else if( $type == 'lead_pushed_to_staff'){
			
			$this->Contact->bindModel(array(
				'belongsTo'=>array('User'=>array('foreignKey'=>false,'conditions'=>array('Contact.owner_id = User.id'))),
			));

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					//'User.active' => 1,
					'Contact.xml_weblead' => 1,
					'Contact.staff_transfer' => 1,
					'Contact.owner_id <> Contact.user_id',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.contact_status_id' => 5,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					'Contact.owner_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}
		else if( $type == 'lead_worked'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.xml_weblead' => 1,
					//'Contact.staff_transfer' => 1,
					'Contact.created <> Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'Contact.contact_status_id' => 5,
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}else if( $type == 'lead_notworked'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'User.active' => 1,
					'Contact.xml_weblead' => 1,
					'Contact.created = Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					'Contact.contact_status_id' => 5,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}

	}


	function stat_details_showroom_phone(){

		//debug( $this->request->query );

		$zone = $this->Auth->User("zone");
		date_default_timezone_set($zone);
		$first_day_this_month = date('Y-m-01 00:00:00'); 
        $last_day_this_month  = date('Y-m-t 23:59:59');


		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);

		$this->Contact->bindModel(array(
			'belongsTo'=>array('Group'=>array('foreignKey'=>false,'conditions'=>array('User.group_id = Group.id'))),
		),false);

		$user_id =  explode(',', $this->request->query['user_id']) ;
		$type = $this->request->query['type'];
		$contact_status_id = $this->request->query['contact_status'];
		$dealer_id = $this->Auth->User('dealer_id');


		if( $type == 'lead_not_worked'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'User.active' => 1,
					'Contact.user_id = Contact.owner_id',
					'Contact.created = Contact.modified',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.company_id' => $dealer_id,
					'Contact.contact_status_id' => $contact_status_id,
					'Contact.user_id'=> $user_id,
					'Contact.created >=' => $first_day_this_month,
	                'Contact.created <=' => $last_day_this_month
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			
		}else if( $type == 'lead_pushed_to_not_worked'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.staff_transfer' => '1',
					'Contact.location_modified = Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'Contact.company_id' => $dealer_id,
					'Contact.contact_status_id' => $contact_status_id,
					'Contact.created >=' => $first_day_this_month,
	                'Contact.created <=' => $last_day_this_month,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);

			
		}else if( $type == 'lead_pushed_to_worked'){

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'Contact.staff_transfer' => '1',
					'Contact.location_modified <> Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'Contact.company_id' => $dealer_id,
					'Contact.contact_status_id' => $contact_status_id,
					'Contact.created >=' => $first_day_this_month,
	                'Contact.created <=' => $last_day_this_month,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);

		
		}

		$this->render("stat_details");	


		

	}








	//Direct web lead work
	public function weblead_direct($dealer_id, $first_day_this_month, $last_day_this_month){


		$this->Contact->bindModel(array(
			'belongsTo'=>array('Group'=>array('foreignKey'=>false,'conditions'=>array('User.group_id = Group.id'))),
		),false);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		),false);


		// Staff... Webleads Arrived .... 
		$webleads_arrived = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				//'Contact.sales_step' => 'Pending',
				'Contact.xml_weblead' => 1,
				'Contact.user_id = Contact.owner_id',
				'Contact.created = Contact.modified',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

			),
			//'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($webleads_arrived);

		//Webleads Worked
		 $weblead_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				//'Contact.staff_transfer' => 1,
				'Contact.user_id = Contact.owner_id',
				'Contact.created <> Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_worked);


		//Webleads not Worked
		 $weblead_notworked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				'Contact.created = Contact.modified',
				'Contact.user_id = Contact.owner_id',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_notworked);


		


		$direct_web_lead_stats = array();

		//web lead arrived
		foreach($webleads_arrived  as $w_arr){
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_arrived'] = $w_arr['0']['leadcnt'];
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}
		//Webleads not Worked
		foreach($weblead_notworked  as $w_arr){
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_notworked'] = $w_arr['0']['leadcnt'];
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}

		//Webleads Worked
		foreach($weblead_worked  as $w_arr){
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_worked'] = $w_arr['0']['leadcnt'];
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$direct_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}
		return $direct_web_lead_stats;


	}


	public function phone_showroom_stats($dealer_id, $contact_status_id, $first_day_this_month, $last_day_this_month){

		//lead arrived not worked
		$lead_not_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.user_id = Contact.owner_id',
				'Contact.created = Contact.modified',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => $contact_status_id,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month
			),
			//'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($lead_arrived);


		//pushed Not Worked
		 $lead_pushed_notworked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.staff_transfer' => '1',
				'Contact.location_modified = Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => $contact_status_id,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($lead_pushed_notworked);

		//pushed Worked
		$lead_pushed_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.staff_transfer' => '1',
				'Contact.location_modified <> Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => $contact_status_id,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_worked);

		return array(
			'lead_not_worked' => $lead_not_worked ,
			'lead_pushed_notworked' => $lead_pushed_notworked,
			'lead_pushed_worked' => $lead_pushed_worked
		);

	}




	public function not_worked_leads() {

		$zone = $this->Auth->User("zone");
		date_default_timezone_set($zone);
		$first_day_this_month = date('Y-m-01 00:00:00'); 
        $last_day_this_month  = date('Y-m-t 23:59:59');


		$group_id = $this->Auth->user('group_id');
		if (!in_array($group_id, array('2','6','12','13','9'))  ) {
			$this->redirect(array('controller'=>'dashboards', 'action' => 'main'));
		}
		
		$this->layout='default_new';
		$dealer_id = $this->Auth->user('dealer_id');

		$direct_web_lead_stats = $this->weblead_direct($dealer_id, $first_day_this_month, $last_day_this_month);
		$this->set('direct_web_lead_stats', $direct_web_lead_stats);
		//debug($direct_web_lead_stats);

		$this->Contact->bindModel(array(
			'belongsTo'=>array('Group'=>array('foreignKey'=>false,'conditions'=>array('User.group_id = Group.id'))),
		),false);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		),false);


		// Staff... Webleads Arrived .... 
		$webleads_arrived = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				//'Contact.sales_step' => 'Pending',
				'Contact.xml_weblead' => 1,
				'Contact.user_id = Contact.owner_id',
				'Contact.created = Contact.modified',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

			),
			//'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($webleads_arrived);



		// Lead Pushed to
		$weblead_pushedto = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				'Contact.staff_transfer' => 1,
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

			),
			//'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_pushedto);


		// Lead Pushed to Staff
		$this->Contact->bindModel(array(
			'belongsTo'=>array('User'=>array('foreignKey'=>false,'conditions'=>array('Contact.owner_id = User.id'))),
		));
		$weblead_pushedto_staff = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				'Contact.staff_transfer' => 1,
				'Contact.owner_id <> Contact.user_id',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

			),
			//'recursive' => 0,
			'group'=>'Contact.owner_id',
			'fields'=>array('Contact.id','Contact.owner_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.owner_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_pushedto_staff);


		//Webleads Worked
		 $weblead_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				//'OR' => array('Contact.staff_transfer' => 1, 'Contact.user_id = Contact.owner_id' ),
				'Contact.staff_transfer' => 1,
				'Contact.created <> Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_worked);


		//Webleads not Worked
		 $weblead_notworked = $this->Contact->find('all', array('conditions' => 
			array(
				'User.active' => 1,
				'Contact.xml_weblead' => 1,
				'Contact.created = Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.contact_status_id' => 5,
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($weblead_notworked);


		


		$combine_web_lead_stats = array();

		//web lead arrived
		foreach($webleads_arrived  as $w_arr){
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_arrived'] = $w_arr['0']['leadcnt'];
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}


		foreach($weblead_pushedto  as $w_arr){
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_pushedto'] = $w_arr['0']['leadcnt'];
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}


		foreach($weblead_pushedto_staff  as $w_arr){
			$combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['lead_pushed_to_staff'] = $w_arr['0']['leadcnt'];
			$combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['group'] =  $w_arr['Group']['name'];
		}

		//Webleads not Worked
		foreach($weblead_notworked  as $w_arr){
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_notworked'] = $w_arr['0']['leadcnt'];
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}

		//Webleads Worked
		foreach($weblead_worked  as $w_arr){
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_worked'] = $w_arr['0']['leadcnt'];
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] =  $w_arr['Group']['name'];
		}
		$this->set('combine_web_lead_stats', $combine_web_lead_stats);
		




		//BDC

		// bdc lead pushed to 
		$bdc_webleads_pushed = $this->Contact->find('all', array('conditions' => 
			array(
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				//'Contact.sales_step' => 'Pending',
				'Contact.created = Contact.modified',
				'Contact.owner_id <> Contact.user_id',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.bdc_weblead' => 1,
				'Contact.staff_transfer' => 1,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($bdc_webleads_pushed);


		// bdc lead pushed to staff
		$this->Contact->bindModel(array(
			'belongsTo'=>array('User'=>array('foreignKey'=>false,'conditions'=>array('Contact.owner_id = User.id'))),
		));
		$bdc_webleads_pushed_to_staff = $this->Contact->find('all', array('conditions' => 
			array(
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				'Contact.owner_id <> Contact.user_id',
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.bdc_weblead' => 1,
				'Contact.staff_transfer' => 1,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.owner_id',
			'fields'=>array('Contact.id','Contact.owner_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.owner_id) as leadcnt','Group.name' ) 
		));
		//debug($bdc_webleads_pushed_to_staff);


		//Webleads Worked
		 $bdc_weblead_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				'Contact.created <> Contact.modified',
				'Contact.status <> '=>'Duplicate-Closed',
				'Contact.company_id' => $dealer_id,
				'Contact.bdc_weblead' => 1,
				//'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($bdc_weblead_worked);


		
		$bdc_webleads_not_worked = $this->Contact->find('all', array('conditions' => 
			array(
				'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,
				//'Contact.sales_step' => 'Pending',
				'Contact.created = Contact.modified',
				'date_format(Contact.created,\'%Y-%m\')' => date('Y-m') ,
				'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
				'Contact.company_id' => $dealer_id,
				'Contact.bdc_weblead' => 1,
				array('Contact.user_id <>'=> null),
				array('Contact.user_id <>'=> ''),
			),
			'recursive' => 0,
			'group'=>'Contact.user_id',
			'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson',  'User.first_name', 'User.last_name' , 'count(Contact.user_id) as leadcnt','Group.name' ) 
		));
		//debug($bdc_webleads_not_worked);

		$bdc_combine_web_lead_stats = array();

		foreach($bdc_webleads_pushed  as $w_arr){
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_pushed'] = $w_arr['0']['leadcnt'];
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}

		foreach($bdc_webleads_pushed_to_staff  as $w_arr){
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['lead_pushed_to_stuff'] = $w_arr['0']['leadcnt'];
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['owner_id'] ]['group'] = $w_arr['Group']['name'];
		}

		foreach($bdc_weblead_worked  as $w_arr){
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_worked'] = $w_arr['0']['leadcnt'];
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}

		foreach($bdc_webleads_not_worked  as $w_arr){
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['lead_not_worked'] = $w_arr['0']['leadcnt'];
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$bdc_combine_web_lead_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		$this->set('bdc_combine_web_lead_stats', $bdc_combine_web_lead_stats);

		//debug($gsm_combine_web_lead_stats);









		$showroom_data = $this->phone_showroom_stats($dealer_id, '7', $first_day_this_month, $last_day_this_month);
		$phone_data = $this->phone_showroom_stats($dealer_id, '6', $first_day_this_month, $last_day_this_month);
		//debug($phone_data);

		$showroom_combine_stats = array();
		foreach($showroom_data['lead_not_worked'] as $w_arr){
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_not_worked'] = $w_arr['0']['leadcnt'];
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		foreach($showroom_data['lead_pushed_notworked'] as $w_arr){
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_pushed_to_not_worked'] = $w_arr['0']['leadcnt'];
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		foreach($showroom_data['lead_pushed_worked'] as $w_arr){
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_pushed_to_worked'] = $w_arr['0']['leadcnt'];
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$showroom_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		//$report_result['showroom_combine_stats'] =  $showroom_combine_stats;
		$this->set('showroom_combine_stats', $showroom_combine_stats);


		$phone_combine_stats = array();
		foreach($phone_data['lead_not_worked'] as $w_arr){
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_not_worked'] = $w_arr['0']['leadcnt'];
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		foreach($phone_data['lead_pushed_notworked'] as $w_arr){
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_pushed_to_not_worked'] = $w_arr['0']['leadcnt'];
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		foreach($phone_data['lead_pushed_worked'] as $w_arr){
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['lead_pushed_to_worked'] = $w_arr['0']['leadcnt'];
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['sperson'] = ucwords(strtolower( $w_arr['User']['first_name']." ".$w_arr['User']['last_name'] ));
			$phone_combine_stats[ $w_arr['Contact']['user_id'] ]['group'] = $w_arr['Group']['name'];
		}
		//$report_result['phone_combine_stats'] =  $phone_combine_stats;
		$this->set('phone_combine_stats', $phone_combine_stats);






	
	}

	function gsm_stat_details(){

		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);
		
		$user_id =  explode(',', $this->request->query['user_id']) ;

		$type = $this->request->query['type'];


		$this->Contact->bindModel(array(
			'belongsTo'=>array('Group'=>array('foreignKey'=>false,'conditions'=>array('User.group_id = Group.id'))),
		),false);

		if( $type == 'lead_pushed'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					//'Contact.sales_step' => 'Pending',
					'Contact.created = Contact.modified',
					'Contact.owner_id <> Contact.user_id',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.bdc_weblead' => 1,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}

		else if( $type == 'lead_pushed_to_stuff'){

			$this->Contact->bindModel(array(
				'belongsTo'=>array('User'=>array('foreignKey'=>false,'conditions'=>array('Contact.owner_id = User.id'))),
			));

			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					'Contact.owner_id <> Contact.user_id',
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.bdc_weblead' => 1,
					'Contact.staff_transfer' => 1,
					'Contact.owner_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}
		else if( $type == 'lead_worked'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					'Contact.created <> Contact.modified',
					'Contact.status <> '=>'Duplicate-Closed',
					'Contact.bdc_weblead' => 1,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}else if( $type == 'lead_not_worked'){
			$contacts = $this->Contact->find('all', array('conditions' => 
				array(
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
					//'Contact.sales_step' => 'Pending',
					'Contact.created = Contact.modified',
					'date_format(Contact.created,\'%Y-%m\')' => date('Y-m') ,
					'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
					'Contact.bdc_weblead' => 1,
					'Contact.user_id'=> $user_id,
				),
				'recursive' => 0,
				'fields'=>array('Contact.id','Contact.user_id', 'Contact.sperson' , 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.notes', 'Contact.owner', 'Contact.modified',  'Contact.created','Group.name' ) 
			));
			$this->set('contacts', $contacts);
			//debug($contacts);
		}

		$this->render('stat_details');


	}


	public function remove_bad($contact_id) {

		App::uses('Sanitize', 'Utility');

		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$this->layout = 'ajax';
    	$params = array(
    		'recursive' => -1,
            'conditions' => array('Contact.id' => $contact_id),
        );
        $contact = $this->Contact->find('first', $params);
        $this->set('contact',$contact);
        //debug($contact);
        if ( $this->request->is('post')) {

        	$user_info = $this->Auth->User();

			$new_note = "sperson: ".$user_info['full_name']." <br> "." User ID: ".$user_info['id']."<br>";
        	$new_note .= $this->request->data['Contact']['notes']."<br> -- " .  $contact['Contact']['notes'];

        	//debug($new_note);

			$this->Contact->updateAll(
				array(
					'Contact.company_id' => "'". "invalid-".$contact['Contact']['company_id'] ."'",
					'Contact.notes' => "'".Sanitize::escape($new_note)."'",
					'Contact.modified' => "'".$datetimetext."'",
				),
				array('Contact.id' => $contact['Contact']['id'])
			);

			$this->Session->setFlash("Web lead removed", 'alert');

			// CLEAR CACHE ON EDIT LEAD
			$this->requestAction('manage_cache/refresh/'.$contact['Contact']['company_id']);



        }


	}





	public function get_dealer_steps($dealer_id){
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($dealer_id);
		return  $sales_step_options_popup; 


	}











}

