<?php
class BdcLeadsController extends AppController {

    public $uses = array('BdcLead', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem','LeadSold');
    public $components = array('RequestHandler');
	public $helpers =array('Text');

	public function beforeFilter() {

		parent::beforeFilter();
	}

	public function customer() {
  		$this->layout='default_new';
	}
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

	public function bdcapp_main()
	{
		$this->layout='bdcapp_layout';
	}

	// search result for the parts leads

	public function part_search_result(){

		//Configure::write('debug', 2);
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=11;
		$this->loadModel('BdcSurvey');
		$stats_month = date('m');
		if(isset($this->request->params['named']['search_all']) && ($this->request->params['named']['search_all'] == 'last_month') ){
			if($stats_month=='01')
			{
				$stats_month=12;
			}else
			{
				$stats_month=$stats_month-1;
			}
		}
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		$today_start = date('Y-m-d 00:00:00');
		$today_end  = date('Y-m-d 23:59:59');
		if(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='today'){
			$conditions['DATE(PartLeadsDms.created)']=date('Y-m-d');
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='last_week'){
			$previous_week = strtotime("-1 week +1 day");
			$start_week = strtotime("last sunday midnight",$previous_week);
			$end_week = strtotime("next saturday",$start_week);
			$start_week = date("Y-m-d 00:00:00",$start_week);
			$end_week = date("Y-m-d 23:59:59",$end_week);
			$conditions=array('PartLeadsDms.created >='=>$start_week,'PartLeadsDms.created <='=>$end_week);


		}elseif(isset($this->request->params['named']['search_all'])&&($this->request->params['named']['search_all']=='month'||$this->request->params['named']['search_all']=='last_month')){
			$conditions=array('PartLeadsDms.created >='=>$first_day_this_month,'PartLeadsDms.created <='=>$last_day_this_month,);
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='today_callback'){

			$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,part_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date)'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['PartLeadsDms.id']=$call_back_leads;
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='overdue_callback'){

			$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,part_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date) <'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['PartLeadsDms.id']=$call_back_leads;
		}

		/*
		elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='7days'){

			$conditions=array('DATEDIFF(NOW(),ServiceLeadsDms.date_cash) >=' => 7);
		}
		elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='2days'){

			$conditions=array('DATEDIFF(NOW(),ServiceLeadsDms.date_cash) >=' => 2);
		}*/
		else
		{
			/*$offset=2;
			if(!empty($dealer_info['DealerName']['service_day_offset']))
			{
				$offset=$dealer_info['DealerName']['service_day_offset'];
			}
			$conditions=array('DATEDIFF(NOW(),PartLeadsDms.date_cash) >=' => $offset);*/
		}

		if(isset($this->request->params['named']['search_all_value'])&&!empty($this->request->params['named']['search_all_value']))
		{
			$search_term=$this->request->params['named']['search_all_value'];
			$conditions['OR']=array('PartLeadsDms.name LIKE '=>'%'.$search_term.'%',
			'PartLeadsDms.invoice_no LIKE '=>'%'.$search_term.'%',
			'PartLeadsDms.address LIKE '=>'%'.$search_term.'%',
			'PartLeadsDms.work_phone LIKE '=>'%'.$search_term.'%',
			'PartLeadsDms.home_phone LIKE '=>'%'.$search_term.'%'
			);
		}
		if(isset($this->request->params['named']['search_all2'])&&!empty($this->request->params['named']['search_all2'])){
			$completed_date=$this->request->params['named']['search_all2'];
			$conditions=array('PartLeadsDms.invoice_date'=>date('Y-m-d',strtotime($completed_date)));
		}
		$this->loadModel('BdcSurvey');
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,part_lead_id','conditions'=>array('c_status'=>array(6,43),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>11)));
		if(!empty($not_show_leads)){
		$conditions['NOT']['PartLeadsDms.id']=$not_show_leads;
		}
		if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id']))
		{
			$conditions =array();
			$conditions['PartLeadsDms.id'] =$this->request->params['named']['view_lead_id'];
		}
		$conditions['PartLeadsDms.dealer_id']=$dealer_id;
		$conditions['NOT']['PartLeadsDms.dnc_status']=array('not_call','no_call_email');
		$conditions['AND']['OR']['PartLeadsDms.before_tax_total >=']='250';
		$conditions['AND']['OR']['PartLeadsDms.counter_taxable_sales >=']='250';
		$conditions['AND']['OR']['PartLeadsDms.special_before_tax_total >=']='250';
		$conditions['PartLeadsDms.bdc_inavlid']=0;
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'')));
		$dnc_number_list = array('0000000000','1111111111');
		$conditions['NOT']['PartLeadsDms.work_phone'] = $dnc_number_list;
		$conditions['NOT']['PartLeadsDms.home_phone'] = $dnc_number_list;

		//file_put_contents(APP.DS.'webroot'.DS.'parts_conditions_'.$dealer_id.'.txt',serialize($conditions));
		$this->loadModel('PartLeadsDms');
		$lead_count=$this->PartLeadsDms->find('count',array('conditions'=>$conditions));
		$all_leads=$this->PartLeadsDms->find('all',array('order'=>'modified desc','conditions'=>$conditions));
		$this->loadModel('BdcSurvey');
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));

		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		foreach($all_leads as $contact)
		{
			if(in_array($contact['PartLeadsDms']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact;
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}

		$this->set('contacts',$seprate_contacts);
		$this->set('lead_count',$lead_count);

	}

	//search result for the service leads

	public function service_search_result(){
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=5;
		$stats_month = date('m');
		$this->loadModel('BdcSurvey');
		if(isset($this->request->params['named']['search_all']) && ($this->request->params['named']['search_all'] == 'last_month') ){
			if($stats_month=='01')
			{
				$stats_month=12;
			}else
			{
				$stats_month=$stats_month-1;
			}
		}
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		$today_start = date('Y-m-d 00:00:00');
		$today_end  = date('Y-m-d 23:59:59');
		if(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='today'){
			$conditions['DATE(ServiceLeadsDms.created)']=date('Y-m-d');
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='last_week'){
			$previous_week = strtotime("-1 week +1 day");
			$start_week = strtotime("last sunday midnight",$previous_week);
			$end_week = strtotime("next saturday",$start_week);
			$start_week = date("Y-m-d 00:00:00",$start_week);
			$end_week = date("Y-m-d 23:59:59",$end_week);
			$conditions=array('ServiceLeadsDms.created >='=>$start_week,'ServiceLeadsDms.created <='=>$end_week);


		}elseif(isset($this->request->params['named']['search_all'])&&($this->request->params['named']['search_all']=='month'||$this->request->params['named']['search_all']=='last_month')){
			$conditions=array('ServiceLeadsDms.created >='=>$first_day_this_month,'ServiceLeadsDms.created <='=>$last_day_this_month,);
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='today_callback'){

			$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,service_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date)'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['ServiceLeadsDms.id']=$call_back_leads;
		}elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='overdue_callback'){

			$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,service_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date) <'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['ServiceLeadsDms.id']=$call_back_leads;
		}

		/*elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='14days'){

			$conditions=array('DATEDIFF(NOW(),ServiceLeadsDms.date_cash) >=' => 14);
		}
		elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='7days'){

			$conditions=array('DATEDIFF(NOW(),ServiceLeadsDms.date_cash) >=' => 7);
		}
		elseif(isset($this->request->params['named']['search_all'])&&$this->request->params['named']['search_all']=='2days'){

			$conditions=array('DATEDIFF(NOW(),ServiceLeadsDms.date_cash) >=' => 2);
		}*/
		else
		{
			$offset=2;
			if(!empty($dealer_info['DealerName']['service_day_offset']))
			{
				$offset=$dealer_info['DealerName']['service_day_offset'];
			}
			$conditions=array('DATEDIFF(DATE(NOW()),ServiceLeadsDms.date_cash) >=' => $offset);
		}

		if(isset($this->request->params['named']['search_all_value'])&&!empty($this->request->params['named']['search_all_value']))
		{
			$search_term=$this->request->params['named']['search_all_value'];
			$conditions['OR']=array('ServiceLeadsDms.name LIKE '=>'%'.$search_term.'%',
			'ServiceLeadsDms.cust_code LIKE '=>'%'.$search_term.'%',
			'ServiceLeadsDms.order_no LIKE '=>'%'.$search_term.'%',
			'ServiceLeadsDms.address LIKE '=>'%'.$search_term.'%',
			'ServiceLeadsDms.work_phone LIKE '=>'%'.$search_term.'%',
			'ServiceLeadsDms.home_phone LIKE '=>'%'.$search_term.'%'
			);
		}
		if(isset($this->request->params['named']['search_all2'])&&!empty($this->request->params['named']['search_all2'])){
			$completed_date=$this->request->params['named']['search_all2'];
			$conditions=array('ServiceLeadsDms.date_cash'=>date('Y-m-d',strtotime($completed_date)));
		}
		$this->loadModel('BdcSurvey');
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,service_lead_id','conditions'=>array('c_status'=>array(6,43),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>5)));
		if(isset($this->request->params['named']['search_all'])&&($this->request->params['named']['search_all']=='view_3rd_voicemail')){

			$conditions['ServiceLeadsDms.id']=$not_show_leads;
		}else
		{
			if(!empty($not_show_leads)){
			$conditions['NOT']['ServiceLeadsDms.id']=$not_show_leads;
			}
		}
		if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id']))
		{
			$conditions =array();
			$conditions['ServiceLeadsDms.id'] =$this->request->params['named']['view_lead_id'];
		}
		$conditions['ServiceLeadsDms.dealer_id']=$dealer_id;
		$conditions['NOT']['ServiceLeadsDms.dnc_status']=array('not_call','no_call_email');
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'')));
		$dnc_number_list = array('0000000000','1111111111');
		$conditions['NOT']['ServiceLeadsDms.work_phone'] = $dnc_number_list;
		$conditions['NOT']['ServiceLeadsDms.home_phone'] = $dnc_number_list;
		$conditions['ServiceLeadsDms.bdc_inavlid']=0;
		$this->loadModel('ServiceLeadsDms');
		//pr($conditions);
		$lead_count=$this->ServiceLeadsDms->find('count',array('conditions'=>$conditions));
		$all_leads=$this->ServiceLeadsDms->find('all',array('order'=>'modified desc','conditions'=>$conditions));
		$this->loadModel('BdcSurvey');
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));

		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		foreach($all_leads as $contact)
		{
			if(in_array($contact['ServiceLeadsDms']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact;
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}

		$this->set('contacts',$seprate_contacts);
		$this->set('lead_count',$lead_count);



	}

	// Search for Equity based leads

	public function equity_search_result() //Andi
	{
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$pandora_dealer_group  = array(2344);
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=array(15);
		if(in_array($dealer_id,$pandora_dealer_group))
		$survey_id = array(4);
		$src_params = array(); //search params


		$this->loadModel("DealerSetting");
		$workload_order = $this->DealerSetting->get_settings('workload_order', $dealer_id);

		if($workload_order == 'On'){
			$lead_order = "BdcLead.modified asc ";
		}else{
			$lead_order = "BdcLead.modified desc ";
		}
		$equity_search_id = $this->request->params['named']['equity_search_id'];
		$this->loadModel('EquitySearch');

        if($equity_search_id != null) {
            $equitySearches = $this->EquitySearch->find('first', array('conditions' => array('EquitySearch.id'=>$equity_search_id)));
        	$src_params = $equitySearches['EquitySearch'];

          //If the Date Selections are set add to conditions - Andi
            if(!empty($this->request->params['named']['search_all2'])){
                $date = $this->request->params['named']['search_all2'];
                $start_date = date('Y-m-d 00:00:00',strtotime($date));
                $conditions['BdcLead.modified >='] = $start_date;
                if(!empty($this->request->params['named']['search_last_date'])){
                    $date = $this->request->params['named']['search_last_date'];
                    $end_date = date('Y-m-d 23:59:59',strtotime($date));
                    $conditions['BdcLead.modified <='] = $end_date;
                } else $conditions["BdcLead.modified <="] = $equitySearches['EquitySearch']['date_end']." 23:59:59";
            } else {
                $conditions["BdcLead.modified >="] = $equitySearches['EquitySearch']['date_start']." 00:00:00";
    	    	$conditions["BdcLead.modified <="] = $equitySearches['EquitySearch']['date_end']." 23:59:59";
            }
        }

        //Set conditions for search
        if($src_params['search_status'] != '') {
            $conditions["BdcLead.status"] = $src_params['search_status'];
        }

        if($src_params['search_lead_type'] == 'Open') {
            $conditions["BdcLead.lead_status"] = "Open";
        }

        if($src_params['search_lead_type'] == 'Closed') {
            $conditions["BdcLead.lead_status"] = "Closed";
        }

        if($src_params['search_lead_type'] == 'Sold') {
            $conditions["BdcLead.sales_step"] = "10";
        }

        if(trim($src_params['search_make']) != '') {
            $conditions["BdcLead.make LIKE"] = "%".trim($src_params['search_make'])."%";
        }

        if(trim($src_params['search_model']) != '') {
            $conditions["BdcLead.model LIKE"] = "%".trim($src_params['search_model'])."%";
        }

        if(trim($src_params['search_zip']) != '') {
            $conditions["BdcLead.zip"] = trim($src_params['search_zip']);
        }

        if(trim($src_params['search_state']) != '') {
            $conditions["BdcLead.state"] = trim($src_params['search_state']);
        }

        if($src_params['search_est_payment_search'] != '') {
            $conditions["BdcLead.est_payment_search"] = $src_params['search_est_payment_search'];
        }

        if($src_params['search_source'] != '') {
            $conditions["BdcLead.source"] = $src_params['search_source'];
        }

        if($src_params['search_sales_step'] != '') {
            $conditions["BdcLead.sales_step"] = $src_params['search_sales_step'];
        }

        if($src_params['search_company_work'] != '') {
            $conditions["BdcLead.company_work LIKE"] = "%".trim($src_params['search_company_work'])."%";
        }

        if(!empty($src_params['search_type'])) {
            $conditions["BdcLead.type"] = $src_params['search_type'];
        }
			//print_r($conditions); die;
        if($src_params['search_condition'] != '') {
        	if($src_params['search_condition'] == 'All') {
        		$conditions["BdcLead.condition"] = array('New', 'Used', 'Rental', 'Demo', 'Any');
        	} else {
        		$conditions["BdcLead.condition"] = $src_params['search_condition'];
        	}
        }

        if($src_params['search_company_account_id'] != '') {
        	$acc_id = $this->find_contact_account_id( $src_params['search_company_account_id'] );
			if($acc_id){
				$conditions['BdcLead.contact_account_id'] = $acc_id;
			}
        }

		// For class Search
		if(!empty($src_params['search_class'])){
			$class_array  = explode('@@',$src_params['search_class']);
			 $conditions["BdcLead.class"] = $class_array;
		}

        if($src_params['search_user_id'] != '') {

            $conditions["BdcLead.user_id"] = $src_params['search_user_id'];

        }
        if(isset($src_params['search_pushed']) && $src_params['search_pushed'] == '1') {
            $conditions["BdcLead.staff_transfer"] = 1;
            //Removing this so that we can turn off lead notifications for pushed on dashboard and still use equity lead search
            //$conditions[] = array("Contact.location_modified = Contact.modified");
        }

		if(!empty($this->request->params['named']['search_keyword']))
		{
			$search_key = $this->request->params['named']['search_keyword'];
			$conditions['OR'] = array('BdcLead.id' => $search_key,'BdcLead.first_name LIKE ' => '%'.$search_key.'%','BdcLead.last_name LIKE ' => '%'.$search_key.'%','BdcLead.company LIKE ' => '%'.$search_key.'%','BdcLead.phone LIKE ' => '%'.$search_key.'%','BdcLead.mobile LIKE ' => '%'.$search_key.'%','BdcLead.zip LIKE ' => '%'.$search_key.'%','BdcLead.address LIKE ' => '%'.$search_key.'%' );
		}

		if(!empty($this->request->params['named']['view_lead_id']))
		{
			$conditions = array();
			$conditions['BdcLead.id'] = $this->request->params['named']['view_lead_id'];
		}

        if(!empty($src_params['search_full_name'])){ //Full Name virtual field search.
            $conditions['full_name'] = $src_params['search_full_name'];
        }

		$callbck_fields = $fields = array(
			'BdcLead.id',
			'BdcLead.first_name',
			'BdcLead.last_name',
			'BdcLead.type',
			'BdcLead.condition',
			'BdcLead.year',
			'BdcLead.make',
			'BdcLead.model',
			'BdcLead.modified_full_date',
			'BdcLead.modified',
			'BdcLead.mobile',
			'BdcLead.phone',
			'BdcLead.address',
			'BdcLead.city',
			'BdcLead.state',
			'BdcLead.zip',
			'BdcLead.email',
			'BdcLead.lead_status',
			'BdcLead.status',
			'BdcLead.sperson',
			'BdcLead.notes',
			'BdcLead.chk_duplicate',
			'BdcLead.created',
			'BdcLead.step_modified',
			'DATEDIFF(NOW(),BdcLead.created) AS days',

		);
	 	$fields[] ='ContactStatus.name';

	    if(!empty($conditions)){

	    	$conditions['BdcLead.company_id'] = $dealer_id;
	    	$conditions['BdcLead.status <>'] = 'Duplicate-Closed';
	    	//$conditions['User.group_id'] = array(1,2,3,4,5,6,10,11);
			//print_r($conditions); die;
            $options = array(
				'conditions' => $conditions,
				'fields'     => $fields,
				'order'      => $lead_order,
				'limit'      => 20,
                'group'      => 'BdcLead.id',
			);


            if(trim($src_params['search_comment']) != '' )
            {
                $options['joins'] = array(
                    array(
                        'table' => 'histories',
                        'type' => 'RIGHT',
                        'conditions' => array('histories.contact_id = BdcLead.id', 'histories.comment LIKE "%'.$src_params['search_comment'].'%"')
                    )
                );
	    	}


			$this->paginate = $options;
			$contacts = $this->Paginate('BdcLead');

			// filtering leads that are contacted or have a bad number
		$this->loadModel('BdcSurvey');
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));

		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		$bdc_status_leads = array();
		foreach($contacts as $contact)
		{
			$bdc_status_leads[] = $contact['BdcLead']['id'];
			if(in_array($contact['BdcLead']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;

			}
			elseif(in_array($contact['BdcLead']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact['BdcLead']['id'];
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}
		if($l_sort=='ASC')
		{
			$l_sort='DESC';
		}else{
			$l_sort='ASC';
		}
		if(!empty($seprate_contacts['call_back']))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead'=>array('fields' => $callbck_fields))));
			$seprate_contacts['call_back']=$this->BdcSurvey->find('all',array('order'=>'BdcSurvey.call_back_date ASC','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$seprate_contacts['call_back'])));
		}
		if(!empty($bdc_status_leads))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('foreignKey' => 'c_status'))));
			$this->BdcSurvey->virtualFields['Status_Date'] = 'CONCAT(BdcStatus.name,"###",BdcSurvey.modified)';
			$bdc_status_leads=$this->BdcSurvey->find('list',array('recursive'=> 0,'fields' => 'BdcSurvey.bdc_lead_id,BdcSurvey.Status_Date','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$bdc_status_leads)));
		}



		$event_lead_type = 'equity_search';

		$this->set('contacts_count', $contacts_count);
		$this->set('contacts', $seprate_contacts);
		$this->set('event_lead_type',$event_lead_type);
		$this->set('l_sort', $l_sort);

		}


	}

	//Find the account id of lead
	public function find_contact_account_id($contact_acc_name){

		$this->loadModel("ContactAccount");
		$carNames = $this->ContactAccount->find('first', array('fields'=>array('id'),
			'conditions' => array(
				'ContactAccount.name LIKE' => "%".trim($contact_acc_name) . '%'
			)
		));
		if(!empty($carNames)){
			return $carNames['ContactAccount']['id'];
		}else{
			return false;
		}
	}



	// Search Result for the leads for the sold events
	public function event_sold_result()
	{
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=array(13,14);

		$stats_month = date('m');
		$survey_record_start = date('Y-m-d 00:00:00');


		if($dealer_id == 20090)
		{
			$survey_record_start = date('Y-m-d 00:00:00',strtotime('-10 days',strtotime($survey_record_start)));
		}else{
			$survey_record_start = date('Y-m-d 00:00:00',strtotime('-15 days',strtotime($survey_record_start)));
		}
		//echo $survey_record_start;
		$this->loadModel('BdcSurvey');
		if(isset($this->request->params['named']['search_all']) && ($this->request->params['named']['search_all'] == 'last_month') ){
			if($stats_month=='01')
			{
				$stats_month=12;
			}else
			{
				$stats_month=$stats_month-1;
			}
		}
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$year_cond = date('Y');
		$l_conditions['LeadSold.company_id'] = $dealer_id;
		if(isset($this->request->params['named']['search_all'])&&!empty($this->request->params['named']['search_all'])){
			$year_cond = $this->request->params['named']['search_all'];
		}
		if($this->request->params['named']['lead_action'] == 'event_leads')
		{
			$this->loadModel('LeadStatus');
			$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
			array_push($lead_statuses,'Duplicate-Closed');
			array_push($lead_statuses,'Customer Update Edit ONLY');
			$conditions['NOT']['BdcLead.status']= $lead_statuses;
			$conditions['YEAR(BdcLead.modified)']=$year_cond;
			$conditions['BdcLead.sales_step'] = array(4,5,6,7,8,9);
		}else{
			$l_conditions['YEAR(LeadSold.created)']=$year_cond;
			$l_conditions['LeadSold.company_id'] = $dealer_id;
			$sold_lead_ids = $this->LeadSold->find('list',array('fields' => 'id,contact_id','conditions' => $l_conditions));
			$conditions['BdcLead.id'] =$sold_lead_ids;
		}

		if($dealer_id == 40013)
		{
			$conditions = array('BdcLead.source' => 'Follow up Department');
			$conditions['YEAR(BdcLead.modified)']= $year_cond;
			$survey_record_start = date('Y-m-d 00:00:00',strtotime('-1 year',strtotime($survey_record_start)));
		}

		if(!empty($this->request->params['named']['view_lead_id']))
		{
			unset($conditions['YEAR(BdcLead.modified)']);
			unset($conditions['BdcLead.id']);
			$search_key = $this->request->params['named']['view_lead_id'];
			$conditions['OR'] = array('BdcLead.id' => $search_key,'BdcLead.first_name LIKE ' => '%'.$search_key.'%','BdcLead.last_name LIKE ' => '%'.$search_key.'%','BdcLead.company LIKE ' => '%'.$search_key.'%','BdcLead.phone LIKE ' => '%'.$search_key.'%','BdcLead.mobile LIKE ' => '%'.$search_key.'%','BdcLead.zip LIKE ' => '%'.$search_key.'%','BdcLead.address LIKE ' => '%'.$search_key.'%' );
		}


		$conditions['NOT']['BdcLead.dnc_status'] = array('not_call','no_call_email');
		$conditions['BdcLead.company_id'] = $dealer_id;
		$dnc_number_list = array('0000000000','1111111111','9999999999','1234567890');
		$conditions['NOT']['IFNULL(BdcLead.mobile,1)'] = $dnc_number_list;
		$conditions['NOT']['IFNULL(BdcLead.phone,1)'] = $dnc_number_list;
		if(!isset($this->request->params['named']['page']))
		{
			$user_id = $this->Auth->user('id');
			$last_worked_id=$this->BdcSurvey->find('first',array('fields'=>'BdcSurvey.id,BdcSurvey.bdc_lead_id','conditions'=>array('BdcSurvey.survey_id' => $survey_id,'BdcSurvey.dealer_id' => $dealer_id,'BdcSurvey.user_id' => $user_id,'BdcSurvey.created >=' =>$survey_record_start),'order' => 'BdcSurvey.created desc'));

			if(!empty($last_worked_id)){
				$page_conditions = $conditions;
				$page_conditions['BdcLead.id <='] = $last_worked_id['BdcSurvey']['bdc_lead_id'];
				$page_lead_counts = $this->BdcLead->find('count',array('conditions' => $page_conditions));
				$show_page = ceil($page_lead_counts/120);
				$this->request->params['named']['page'] = $show_page;
			}
		}

		$callbck_fields = $fields = array(
			'BdcLead.id',
			'BdcLead.first_name',
			'BdcLead.last_name',
			'BdcLead.type',
			'BdcLead.condition',
			'BdcLead.year',
			'BdcLead.make',
			'BdcLead.model',
			'BdcLead.modified_full_date',
			'BdcLead.modified',
			'BdcLead.mobile',
			'BdcLead.phone',
			'BdcLead.address',
			'BdcLead.city',
			'BdcLead.state',
			'BdcLead.zip',
			'BdcLead.email',
			'BdcLead.lead_status',
			'BdcLead.status',
			'BdcLead.sperson',
			'BdcLead.notes',
			'BdcLead.chk_duplicate',
			'BdcLead.created',
			'BdcLead.step_modified',
			'DATEDIFF(NOW(),BdcLead.created) AS days',

		);
	 	$fields[] ='ContactStatus.name';

		// filtering leads that are contacted or have a bad number
		$this->loadModel('BdcSurvey');
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'created >=' =>$survey_record_start)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'created >=' =>$survey_record_start)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'created >=' =>$survey_record_start)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'created >=' =>$survey_record_start)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'created >=' =>$survey_record_start)));
		//pr($conditions);




		//$contacts_count = $this->BdcLead->find('count', array('conditions' => $conditions));
		$this->BdcLead->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		$this->paginate = array(
			'conditions' => $conditions,
			'fields'=>$fields,
			//'order'=>array('days' => $l_sort),
			'order'=>'BdcLead.id',
			'limit' => 120,

		);

		$contacts = $this->Paginate('BdcLead');
		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		$bdc_status_leads = array();
		foreach($contacts as $contact)
		{
			$bdc_status_leads[] = $contact['BdcLead']['id'];
			if(in_array($contact['BdcLead']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;

			}
			elseif(in_array($contact['BdcLead']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact['BdcLead']['id'];
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}
		if($l_sort=='ASC')
		{
			$l_sort='DESC';
		}else{
			$l_sort='ASC';
		}
		if(!empty($seprate_contacts['call_back']))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead'=>array('fields' => $callbck_fields))));
			$seprate_contacts['call_back']=$this->BdcSurvey->find('all',array('order'=>'BdcSurvey.call_back_date ASC','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$seprate_contacts['call_back'])));
		}
		if(!empty($bdc_status_leads))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('foreignKey' => 'c_status'))));
			$this->BdcSurvey->virtualFields['Status_Date'] = 'CONCAT(BdcStatus.name,"###",BdcSurvey.modified)';
			$bdc_status_leads=$this->BdcSurvey->find('list',array('recursive'=> 0,'fields' => 'BdcSurvey.bdc_lead_id,BdcSurvey.Status_Date','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$bdc_status_leads)));
		}

		$event_lead_type = 'event_solds';
		if(isset($this->request->params['named']['lead_action']))
		{
			$event_lead_type = $this->request->params['named']['lead_action'];
		}
		$this->set('contacts_count', $contacts_count);
		$this->set('contacts', $seprate_contacts);
		$this->set('l_sort', $l_sort);
		$this->set('is_sold_leads',$is_sold_leads);
		$this->set('bdc_status_leads',$bdc_status_leads);
		$this->set('event_lead_type',$event_lead_type);


	}
	//BdcApp Search result

	public function bdcapp_search_result()
	{

		$this->view = 'search_result';
		$this->_main_bdc_search();
	}

	//Search result in the lead page /contacts/lead
	public function search_result(){
		$this->_main_bdc_search();
	}


	private function _main_bdc_search()
	{

		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		$bdc_service_group = array(20090,20080,1225,1226);
		$ridenow_group = array(263,2344);
		$pandora_group = array(2344);
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$sold_lead_offset = 7;
		$modified_date_field = 'modified';

    if(in_array($dealer_id, array('762','262','759','758','760','761','491','492','1627','1626','1640','1406','40013','1912'))){
        $modified_date_field = 'created';
    }

		if(in_array($dealer_id,array(20070,20080,20090)))
		{
			$sold_lead_offset = 1;
		}

		if(in_array($dealer_id,array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
		if(in_array($dealer_id,$bdc_service_group)){
			$sold_lead_offset = 1;
		}

		$past_date_check = date('Y-m-d',strtotime('-1 month'));
		$past_date_check = $past_date_check.' 00:00:00';
		if($this->Session->check('SelectedDealer')&&$this->params['bdcapp'])
		{
			$d_id=$this->Session->read('SelectedDealer');
			if($d_id=='all_builds')
			{
				$this->loadModel('DealerName');
				$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
				$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			}else{
				$dealer_id=$d_id;
			}
		}
		$survey_id=array(2,3);
		$solds__option_array=array('Sold' ,'sold_last_week','sold_this_month','sold_last_month','view_3rd_voice_sold','no_contact_sold_month','sold_today_callback','sold_overdue_callback');
		if(isset($this->request->params['named']['search_all']) && in_array($this->request->params['named']['search_all'],$solds__option_array)){
			$survey_id=array(3,4);
		}else
		{
			if(isset($this->request->params['named']['search_all_value'])&& !empty($this->request->params['named']['search_all_value']))
			$l_conditions = $this->BdcLead->searchDefault2(array('search_all2'=>$this->request->params['named']['search_all_value']),'LeadSold');
			//$l_conditions['LeadSold.modified >=']=$past_date_check;
			//$l_conditions['LeadSold.company_id']=$dealer_id;
			$this->loadModel('LeadSold');
			//$lead_ids=$this->LeadSold->find('list',array('fields'=>'id,contact_id','conditions'=>$l_conditions));
			//$further_lead_ids=$lead_ids;
		}
		$l_sort='ASC';
		if(isset($this->request->params['named']['l_sort'])&&!empty($this->request->params['named']['l_sort']))
		{
			$l_sort=$this->request->params['named']['l_sort'];
		}


		$order_array = array('days' => $l_sort);
		if(!empty($this->request->params['named']['selected_lead_type']) && $this->request->params['named']['selected_lead_type'] =='Sold')
		{
			$order_array = array('BdcLead.step_modified' => $l_sort);
		}
		$searched = false;
        $selected_type = "";
		$is_sold_leads=false;
		if(in_array($dealer_id,$pandora_group))
		{
			$sales_step_cond = range(2,10);
		}else{
			$sales_step_cond = array(1,10);
		}
		$this->set('searched', $searched);
        $this->set('selected_type', $selected_type);
		$current_user_id = $this->Auth->User('id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
		$conditions=array();

		$this->loadModel('LeadSold');
		$this->loadModel('BdcSurvey');
		$this->loadModel('LeadStatus');
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');

		$stats_month = date('m');
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-t 23:59:59');
		if(isset($this->request->params['named']['search_all']) && ($this->request->params['named']['search_all'] == 'sold_last_month'||$this->request->params['named']['search_all'] == 'pre_last_month') ){
			$first_day_this_month = date('Y-m-01 00:00:00', strtotime('first day of last month'));
			$last_day_this_month  = date('Y-m-t 23:59:59', strtotime('last day of last month'));
		}

		$today_start = date('Y-m-d 00:00:00');
		$today_end  = date('Y-m-d 23:59:59');


		if(isset($this->request->params['named']['contact_id'])){
			$conditions = array(
				'BdcLead.id' => $this->request->params['named']['contact_id']
            );

		}else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Pre-Purchase'){

			$conditions = array(
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond/*,'BdcLead.lead_status' => 'Closed'*/),
            );

		}else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Pre-Purchase_yesterday'){

			$first_day_this_month = date('Y-m-d 00:00:00', strtotime('-1 day'));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime('-1 day'));
			$conditions = array(
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.'.$modified_date_field.' >=' => $first_day_this_month,
			'BdcLead.'.$modified_date_field.' <=' => $last_day_this_month
            );

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'pre-purchase_month'){
			if(!in_array($this->Auth->user('dealer_id'),$ridenow_group))
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime('-1 day'));
			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond/*,'BdcLead.lead_status' => 'Closed'*/),
			'BdcLead.'.$modified_date_field.' >=' => $first_day_this_month,
			'BdcLead.'.$modified_date_field.' <=' => $last_day_this_month
            );

		}else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'pre_last_week'){

			$previous_week = strtotime("-1 week +1 day");
			$start_week = strtotime("last sunday midnight",$previous_week);
			$end_week = strtotime("next saturday",$start_week);
			$start_week = date("Y-m-d 00:00:00",$start_week);
			$end_week = date("Y-m-d 23:59:59",$end_week);

			//echo $start_week.' '.$end_week ;

			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.'.$modified_date_field.' >=' => $start_week,
			'BdcLead.'.$modified_date_field.' <=' => $end_week
            );

		}


		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'pre_last_month'){

			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.'.$modified_date_field.' >=' => $first_day_this_month,
			'BdcLead.'.$modified_date_field.' <=' => $last_day_this_month
            );

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Sold'){
			$is_sold_leads=true;
			$start_date = strtotime("-2 months");
			$start_date = date("Y-m-d 00:00:00",$start_date);
			$end_date = date("Y-m-d 23:59:59");
			$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset,'LeadSold.company_id'=>$dealer_id,'LeadSold.created >='=>$start_date,'LeadSold.created <='=>$end_date,)));
			$survey_id=array(3,4);
			$conditions = array(
				'BdcLead.id' => $lead_ids,

            );
			//$conditions['YEAR(BdcLead.modified)']=date('Y');
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'sold_this_month'){
			$survey_id=array(3,4);
			$is_sold_leads=true;
			$first_day_this_month = date('Y-m-d H:i:s',strtotime('-'.$sold_lead_offset.' day',strtotime($first_day_this_month)));
			$last_day_this_month = date('Y-m-d H:i:s',strtotime('-'.$sold_lead_offset.' day',strtotime($last_day_this_month)));

			$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('LeadSold.created >='=>$first_day_this_month,'LeadSold.created <='=>$last_day_this_month,'DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset)));


			$conditions = array(
				'BdcLead.id' => $lead_ids,
				//'BdcLead.sales_step' => 'Sold',
			//	'BdcLead.user_id' => $current_user_id,
				/*'BdcLead.status' => array('Sold/Rolled',' Sold/Rolled-Multi Vehicle'),
				'DATEDIFF(NOW(),BdcLead.modified) >=' => 14,
				'BdcLead.modified >=' => $first_day_this_month,
				'BdcLead.modified <=' => $last_day_this_month*/
            );
		}else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'sold_last_week'){

			$survey_id=array(3,4);
			$is_sold_leads=true;
			/*$previous_week = strtotime("-1 week +1 day");

			$start_week = strtotime("last sunday midnight",$previous_week);
			$end_week = strtotime("next saturday",$start_week);
			$start_week = date("Y-m-d 00:00:00",$start_week);
			$end_week = date("Y-m-d 23:59:59",$end_week);*/
			$start_week = strtotime("-2 weeks");
			$start_week = date("Y-m-d 00:00:00",$start_week);
			$end_week = date("Y-m-d 23:59:59");

			$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('LeadSold.created >='=>$start_week,'LeadSold.created <='=>$end_week,'LeadSold.company_id'=>$dealer_id,'DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset)));

			$conditions = array(
				'BdcLead.id' => $lead_ids,
			//	'BdcLead.user_id' => $current_user_id,
				/*'BdcLead.status' => array('Sold/Rolled',' Sold/Rolled-Multi Vehicle'),
				'DATEDIFF(NOW(),BdcLead.modified) >=' => 14,
				'BdcLead.modified >=' => $start_week,
				'BdcLead.modified <=' => $end_week*/
            );
		}


		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'sold_last_month'){
			$survey_id=array(3,4);
			$is_sold_leads=true;
			$first_day_this_month = date('Y-m-d H:i:s',strtotime('-'.$sold_lead_offset.' day',strtotime($first_day_this_month)));
			$last_day_this_month = date('Y-m-d H:i:s',strtotime('-'.$sold_lead_offset.' day',strtotime($last_day_this_month)));


			$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('LeadSold.created >='=>$first_day_this_month,'LeadSold.created <='=>$last_day_this_month,'LeadSold.company_id'=>$dealer_id,'DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset)));
			$conditions = array(
				'BdcLead.id' => $lead_ids,
			//	'BdcLead.user_id' => $current_user_id,
				/*'BdcLead.status' => array('Sold/Rolled',' Sold/Rolled-Multi Vehicle'),
				'DATEDIFF(NOW(),BdcLead.modified) >=' => 14,
				'BdcLead.modified >=' => $first_day_this_month,
				'BdcLead.modified <=' => $last_day_this_month*/
            );
		}

		else if(isset($this->request->params['named']['search_all_value']) && !empty($this->request->params['named']['search_all_value'])){

			/*$day_start = date('Y-m-01  00:00:00', strtotime('previous month'));
			$day_end = date('Y-m-t 23:59:59', strtotime('previous month'));*/
			// if(isset($this->request->params['named']['selected_lead_type']) && $this->request->params['named']['selected_lead_type']=='sold')
			 //{
				/*$survey_id=array(3,4);
				$l_conditions = $this->BdcLead->searchDefault2(array('search_all2'=>$this->request->params['named']['search_all_value']),'LeadSold');
				$l_conditions['LeadSold.modified >=']=$past_date_check;
				$l_conditions['LeadSold.company_id']=$dealer_id;
				$this->loadModel('LeadSold');
				$lead_ids=$this->LeadSold->find('list',array('fields'=>'id,contact_id','conditions'=>$l_conditions));
				if(!empty($lead_ids))
				$conditions['BdcLead.id']=$lead_ids;*/
				//$conditions = $this->BdcLead->searchDefault2(array('search_all2'=>$this->request->params['named']['search_all_value']));
				//$conditions['BdcLead.sales_step'] = 10;
			// }else
			// {
			$conditions = $this->BdcLead->searchDefault2(array('search_all2'=>$this->request->params['named']['search_all_value']));
			$conditions['BdcLead.modified <=']=date('Y-m-d H:i:s');
			$conditions['BdcLead.modified >=']=date('Y-m-d H:i:s',strtotime('-3 months'));
			if($this->request->params['named']['selected_lead_type'] == 'contact')
			$conditions['NOT']['BdcLead.sales_step'] =$sales_step_cond;
			else
			$conditions['BdcLead.sales_step'] = 10;
			//$conditions['NOT']['BdcLead.status']= $lead_statuses;
			//$conditions['NOT']['BdcLead.lead_status']= 'Closed';
			//$l_conditions = $this->BdcLead->searchDefault2(array('search_all2'=>$this->request->params['named']['search_all_value']),'LeadSold');
			//$l_conditions['LeadSold.modified >=']=$past_date_check;
			//$l_conditions['LeadSold.company_id']=$dealer_id;
			//$this->loadModel('LeadSold');
			//$lead_ids=$this->LeadSold->find('list',array('fields'=>'id,contact_id','conditions'=>$l_conditions));
			//$further_lead_ids=$lead_ids;
			//$old_month_leads = date('Y-m-d',strtotime('-3 months'));
			//$bdc_old_leads = $this->BdcSurvey->find('list',array('fields' => 'id,bdc_lead_id','conditions'=>array('DATE(BdcSurvey.created) >=' => $old_month_leads,'BdcSurvey.latest' => 'yes','BdcSurvey.dealer_id' => $dealer_id,'BdcSurvey.survey_id' => $survey_id),'group' => 'bdc_lead_id' ));
			//$conditions['BdcLead.id']=$bdc_old_leads;
			// }

			//$conditions['NOT']['BdcLead.status'] = $lead_statuses;
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'this_month'){
			$conditions = array(
				'BdcLead.'.$modified_date_field.' >=' => $first_day_this_month,
				'BdcLead.'.$modified_date_field.' <=' => $last_day_this_month
            );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Today'){
			$conditions = array(
				'BdcLead.modified >=' => $today_start,
				'BdcLead.modified <=' => $today_end
            );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'yesterday'){

			$day_start = date('Y-m-d 00:00:00',strtotime("-1 day"));
			$day_end  = date('Y-m-d 23:59:59',strtotime("-1 day"));
			$conditions = array(
				'BdcLead.modified >=' => $day_start,
				'BdcLead.modified <=' => $day_end
            );
		}


		$set_status = 0;
		foreach($conditions as $con){
			if( is_array($con)){
				if(key($con) == 'BdcLead.status'){
					$set_status = 1;
				}
			}
		}
		if(!isset($conditions['BdcLead.'.$modified_date_field.' >='])&& empty($this->request->params['named']['search_all_value'])&& !$is_sold_leads){
			//$conditions['OR']['DATE(BdcLead.'.$modified_date_field.')'] = date('Y-m-d',strtotime('-1 day'));
			if(!in_array($this->Auth->user('dealer_id'),$ridenow_group)){
			$conditions['OR']['DATE(BdcLead.'.$modified_date_field.')'] = date('Y-m-d',strtotime('-1 day'));
			}else
			{
				$conditions['OR']['DATE(BdcLead.'.$modified_date_field.')'] = date('Y-m-d');
			}
		}
		if(isset($this->request->params['named']['search_all2'])) //Andi
		{

			if(!empty($this->request->params['named']['search_all2']))
			{
				$conditions = array();
				$date=$this->request->params['named']['search_all2'];
				$start_date = date('Y-m-d 00:00:00',strtotime($date));
				$end_date = date('Y-m-d 23:59:00',strtotime($date));
				if(!empty($this->request->params['named']['search_last_date'])){
					$e_date = $this->request->params['named']['search_last_date'];
					$end_date = date('Y-m-d 23:59:00',strtotime($e_date));
				}

				if(isset($this->request->params['named']['selected_lead_type']) && $this->request->params['named']['selected_lead_type']=='contact'){
				$today_list=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('BdcSurvey.survey_id'=>$survey_id,'DATE(BdcSurvey.created)'=>date('Y-m-d',strtotime($date)))));
				if(!empty($today_list))
				$conditions['OR']['BdcLead.id']=$today_list;
				$conditions['BdcLead.'.$modified_date_field.' >= '] = $start_date;
				$conditions ['BdcLead.'.$modified_date_field.' <= '] = $end_date;
				$conditions['NOT']['BdcLead.sales_step'] = array(1,10);
				$conditions['NOT']['BdcLead.status'] = $lead_statuses;
				}else
				{
				$today_list=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('BdcSurvey.survey_id'=>array(3,4),'DATE(BdcSurvey.created)'=>date('Y-m-d',strtotime($date)))));
				$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('LeadSold.created >='=>$start_date,'LeadSold.created <='=>$end_date,'LeadSold.company_id'=>$dealer_id,'DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset)));
				//$conditions['OR']['BdcLead.id']=$today_list;
				//if(!empty($lead_ids))
				$conditions['BdcLead.id'] = $lead_ids;
				}
			}

   		}
		$not_show_status = array(43);
		if(in_array($dealer_id,array(20080,20090)))
		{
			$not_show_status = array(43,86);
		}

		$this->loadModel('BdcSurvey');
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>$not_show_status,'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id/*,'modified >=' => $past_date_check*/)));
		$refused_survey_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>array(6),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>array(2,3,4)/*,'modified >=' => $past_date_check*/)));

		if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'no_contact_pre_month'){

			$no_contact_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'created >='=>$first_day_this_month,'created <=' =>$last_day_this_month)));
			$conditions = array(
			'BdcLead.sales_step !=' => '1',
			'NOT'=>array('BdcLead.status' => $lead_statuses),
			'BdcLead.id' => $no_contact_leads,
			);

		}elseif(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'no_contact_sold_month'){
			$is_sold_leads=true;
			$survey_id=array(3,4);
			$no_contact_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
			$conditions=array();
			$conditions['BdcLead.id']=$no_contact_leads;
			//$conditions['BdcLead.status'] = array('Sold/Rolled',' Sold/Rolled-Multi Vehicle');

		}

		if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'view_3rd_voice_sold'){
				$is_sold_leads=true;
				$survey_id=array(3,4);
				$conditions=array();
				$conditions['BdcLead.id']=$not_show_leads;
				//$conditions['BdcLead.status'] = array('Sold/Rolled',' Sold/Rolled-Multi Vehicle');

		}elseif(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'view_3rd_voice_pre'){

			$vm_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>array(43),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'modified >=' => $past_date_check)));
			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.id' => $vm_leads,
			);

		}elseif(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'view_1st_voice_pre'){
			$vm_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>array(41),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'modified >=' => $past_date_check)));
			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.id' => $vm_leads,
			);

		}elseif(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'view_2nd_voice_pre'){
			$vm_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>array(42),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id,'modified >=' => $past_date_check)));
			$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' => $sales_step_cond),
			'BdcLead.id' => $vm_leads,
			);

		}else{
			if(!empty($not_show_leads))
			{

				$conditions['NOT']['BdcLead.id']=$not_show_leads;
			}
		}
		if(isset($this->request->params['named']['search_all']) && in_array($this->request->params['named']['search_all'],array('today_callback','sold_today_callback'))){
				$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date)'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['BdcLead.id']=$call_back_leads;
		}
		if(isset($this->request->params['named']['search_all']) && in_array($this->request->params['named']['search_all'],array('overdue_callback','sold_overdue_callback'))){
				$call_back_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','survey_id'=>$survey_id,'dealer_id'=>$dealer_id,'DATE(call_back_date) <'=>date('Y-m-d'))));
				$conditions=array();
				$conditions['BdcLead.id']=$call_back_leads;
		}
		if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id']))
		{
			$conditions =array();
			$conditions['BdcLead.id'] =$this->request->params['named']['view_lead_id'];
		}

		$conditions['BdcLead.company_id'] = $dealer_id;
		$conditions['NOT']['BdcLead.dnc_status'] = array('not_call','no_call_email');
		$conditions['NOT']['BdcLead.source'] = array('Dealer Spike - Employment');
		if(isset($conditions['NOT']['BdcLead.id']))
		{
			$conditions['NOT']['BdcLead.id']=array_merge($conditions['NOT']['BdcLead.id'],$refused_survey_leads);
		}else
		{
			$conditions['NOT']['BdcLead.id']=$refused_survey_leads;
		}
		if(isset($further_lead_ids)&& !empty($further_lead_ids))
		{
			$conditions['NOT']['BdcLead.id']=array_merge($conditions['NOT']['BdcLead.id'],$further_lead_ids);
		}
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'','created >=' => $past_date_check)));
		if(empty($this->request->params['named']['search_all_value'])){
			$dnc_number_list = array('0000000000','1111111111');
			$conditions['OR']['NOT']['IFNULL(BdcLead.mobile,1)'] = $dnc_number_list;
			$conditions['OR']['NOT']['IFNULL(BdcLead.phone,1)'] = $dnc_number_list;
		}
		//$conditions['NOT']['BdcLead.work_number'] = $dnc_number_list;
		//$conditions['OR']['BdcLead.work_number IS NULL'];
		//$conditions['OR']['BdcLead.mobile IS NULL'];
		//$conditions['OR']['BdcLead.phone IS NULL'];
		$conditions['BdcLead.bdc_inavlid'] = 0;
		unset($dnc_number_list);
		//pr($conditions);
		//die;
		//$fnamed='search56'.$this->Auth->user('dealer_id').'.txt';
		//file_put_contents(APP.DS.'webroot'.DS.$fnamed,serialize($conditions));
		try{
		$callbck_fields = $fields = array(
			'BdcLead.id',
			'BdcLead.first_name',
			'BdcLead.last_name',
			'BdcLead.type',
			'BdcLead.condition',
			'BdcLead.year',
			'BdcLead.make',
			'BdcLead.model',
			'BdcLead.modified_full_date',
			'BdcLead.modified',
			'BdcLead.mobile',
			'BdcLead.phone',
			'BdcLead.address',
			'BdcLead.city',
			'BdcLead.state',
			'BdcLead.zip',
			'BdcLead.email',
			'BdcLead.lead_status',
			'BdcLead.status',
			'BdcLead.sperson',
			'BdcLead.notes',
			'BdcLead.chk_duplicate',
			'BdcLead.created',
			'BdcLead.step_modified',
			'DATEDIFF(NOW(),BdcLead.created) AS days',

		);
	 	$fields[] ='ContactStatus.name';

		// filtering leads that are contacted or have a bad number
		$this->loadModel('BdcSurvey');
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
        debug($dealer_id);
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));


		$contacts_count = $this->BdcLead->find('count', array('conditions' => $conditions));

		$this->BdcLead->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));
		//$fnamed='search'.$this->Auth->user('dealer_id').'.txt';
		//file_put_contents(APP.DS.'webroot'.DS.$fnamed,serialize($conditions));
        debug(in_array('9995636',$contact_list));
		$contacts = $this->BdcLead->find('all', array('fields'=>$fields,'conditions' => $conditions, 'order' => $order_array));
		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		$bdc_status_leads = array();
		$rds = array();
		$yds = array();
		foreach($contacts as $contact)
		{
			// Commenting this to reduce the script timeout issue
			/*$is_dupllicate = $this->_find_duplicates(array('Contact' => $contact['BdcLead']));
				foreach($is_dupllicate['rd'] as $rd){
					$rds[$rd] = 1;
				}
				foreach($is_dupllicate['yd'] as $rd){
					$yds[$rd] = 1;
				}*/

			$bdc_status_leads[] = $contact['BdcLead']['id'];
			if(in_array($contact['BdcLead']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;

			}
			elseif(in_array($contact['BdcLead']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact['BdcLead']['id'];
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}
		if($l_sort=='ASC')
		{
			$l_sort='DESC';
		}else{
			$l_sort='ASC';
		}
		if(!empty($seprate_contacts['call_back']))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead'=>array('fields' => $callbck_fields))));
			$seprate_contacts['call_back']=$this->BdcSurvey->find('all',array('order'=>'BdcSurvey.call_back_date ASC','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$seprate_contacts['call_back'])));
		}
		if(!empty($bdc_status_leads))
		{
			$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('foreignKey' => 'c_status'))));
			$this->BdcSurvey->virtualFields['Status_Date'] = 'CONCAT(BdcStatus.name,"###",BdcSurvey.modified)';
			$bdc_status_leads=$this->BdcSurvey->find('list',array('recursive'=> 0,'fields' => 'BdcSurvey.bdc_lead_id,BdcSurvey.Status_Date','conditions'=>array('BdcSurvey.latest'=>'yes','BdcSurvey.bdc_lead_id'=>$bdc_status_leads)));
		}


		$this->set('contacts_count', $contacts_count);
		$this->set('contacts', $seprate_contacts);
		$this->set('l_sort', $l_sort);
		$this->set('is_sold_leads',$is_sold_leads);
		$this->set('bdc_status_leads',$bdc_status_leads);
		$this->set('event_lead_type','no');
		$this->set('rds', $rds);
		$this->set('yds', $yds);
		}catch(Exception $e)
		{
			$fnamed='error'.$this->Auth->user('dealer_id').'.txt';
			file_put_contents(APP.DS.'webroot'.DS.$fnamed,$e->getMessage());
		}
		//pr($seprate_contacts);
		//$rds = array();
		//$yds = array();


	}

	private function _find_duplicates($c_d = array()){
		//debug($c_d['Contact']['id']);
		$dealer_id = $this->Auth->user('dealer_id');
		$step_sequence = array();

		$one_month = date('Y-m-d H:i:s', strtotime("-60 days")   ) ;
		//debug($one_month);
		$cond = array(
			'Contact.company_id'=>$dealer_id,
			'Contact.id <>'=>$c_d['Contact']['id'],
			'Contact.chk_duplicate'=>0,
			'Contact.status <>'=>'Duplicate-Closed',

			'Contact.lead_status'=>'Open',
			'Contact.sales_step <>'=>'10',

			'Contact.modified >='=>$one_month,
			//'date_format(Contact.modified,\'%Y-%m\')' => date('Y-m')
		);
		$checkduplicate = false;

		if($c_d['Contact']['first_name'] != '' && $c_d['Contact']['last_name'] != ''){
			$cond['OR'][] = array('Contact.first_name'=>$c_d['Contact']['first_name'], 'Contact.last_name'=>$c_d['Contact']['last_name']  );
			$checkduplicate = true;
		}

		$phone_array = array();

		if($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] != null && $c_d['Contact']['mobile'] != '0000000000' && $c_d['Contact']['mobile'] != '1111111111' && $c_d['Contact']['mobile'] != '9999999999'  ){
			$phone_array[] = $c_d['Contact']['mobile'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] != null && $c_d['Contact']['phone'] != '0000000000'  && $c_d['Contact']['phone'] != '1111111111' && $c_d['Contact']['phone'] != '9999999999'   ){
			$phone_array[] = $c_d['Contact']['phone'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] != null && $c_d['Contact']['work_number'] != '0000000000'  && $c_d['Contact']['work_number'] != '1111111111' && $c_d['Contact']['work_number'] != '9999999999' ){
			$phone_array[] = $c_d['Contact']['work_number'];
			$checkduplicate = true;
		}
		if(!empty($phone_array)){
			$cond['OR']['Contact.mobile'] =  $phone_array;
			$cond['OR']['Contact.phone'] =  $phone_array;
			$cond['OR']['Contact.work_number'] =  $phone_array;
		}


		if($checkduplicate == false){
			$results['rd'] = array();
			$results['yd'] = array();
			return $results;
		}



		//debug($cond);

		$d_cs =  $this->Contact->find('all',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status','Contact.created'),
			'conditions' => $cond
		));
		//debug($d_cs);

		$results['rd'] = array();
		$results['yd'] = array();
		// check duplidates for whether its all match or only name
		foreach($d_cs as $d_c){


			if( strtolower($c_d['Contact']['first_name']) == strtolower($d_c['Contact']['first_name'])
				&& strtolower($c_d['Contact']['last_name']) == strtolower($d_c['Contact']['last_name'])
				&& (
					($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] == $d_c['Contact']['mobile'])   ||
					($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] == $d_c['Contact']['phone']) ||
					($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] == $d_c['Contact']['work_number'])
				)
			){
				$results['rd'][] = $c_d['Contact']['id'];
				//$results['rd'][] = $d_c['Contact']['id'];
			}else{
				$results['yd'][] = $c_d['Contact']['id'];
				//$results['yd'][] = $d_c['Contact']['id'];
			}
		}
		return $results;
	}

	public function bdcapp_leads_main()
	{
		$this->layout='bdcapp_layout';
		$this->view='leads_main';
		if(isset($this->request->params['named']['selectedDealer']))
		{
			$this->Session->write('SelectedDealer',$this->request->params['named']['selectedDealer']);
		}
		$this->_bdc_lead_main();

	}

   	public function leads_main($csvFile = null) {

		$this->layout='default_new';
      	$this->_bdc_lead_main();
    }


	private function _bdc_lead_main()
	{



        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        $selected_type = "";
		if($this->Session->check('SelectedDealer')&&$this->params['bdcapp'])
		{
			$d_id=$this->Session->read('SelectedDealer');
			if($d_id=='all_builds')
			{
				$this->loadModel('DealerName');
				$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
				$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			}else{
				$dealer_id=$d_id;
			}
		}
        $current_user_id = $this->Auth->User('id');
      	// Get Callback lead count
		$join_table = array(
						array('table'=>'contacts',
								'alias' => 'Contact',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('Contact.dnc_status' =>  array('not_call','no_call_email'),'Contact.sales_step' => array(1,10)),
									'Contact.bdc_inavlid' => 0,
									'BdcSurvey.bdc_lead_id' => 'Contact.id',

								)
						)

		);
		$sold_join_table = array(
						array('table'=>'contacts',
								'alias' => 'Contact',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('Contact.dnc_status' =>  array('not_call','no_call_email')),
									'Contact.bdc_inavlid' => 0,
									'BdcSurvey.bdc_lead_id' => 'Contact.id',
								)
						)

		);

		$part_join_table = array(
						array('table'=>'part_leads_dms',
								'alias' => 'PartLeadsDms',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('PartLeadsDms.dnc_status' =>  array('not_call','no_call_email')),
									'PartLeadsDms.bdc_inavlid' => 0,
									'BdcSurvey.part_lead_id' => 'PartLeadsDms.id',
									'OR' => array(
											'PartLeadsDms.before_tax_total >=' => '250',
											'PartLeadsDms.counter_taxable_sales >=' =>'250',
											'PartLeadsDms.special_before_tax_total >=' => '250'

									),

								)
						)

		);
		$this->loadModel('BdcSurvey');
		$call_back_count['pre_purchase_cbk_count']=$this->BdcSurvey->find('count',array(
		//'joins'=>$join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>2,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date)'=>date('Y-m-d'))));
		$call_back_count['sold_cbk_count']=$this->BdcSurvey->find('count',array(
		//'joins' => $sold_join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>array(3,4),'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date)'=>date('Y-m-d'))));
		$call_back_count['service_cbk_count']=$this->BdcSurvey->find('count',array('conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>5,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date)'=>date('Y-m-d'))));
		$call_back_count['parts_cbk_count']=$this->BdcSurvey->find('count',array(
		//'joins' => $part_join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>11,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date)'=>date('Y-m-d'))));

		//overdue callback
		$old_month=date('Y-m-d',strtotime('-60 days'));

		$call_back_count['pre_purchase_over_cbk_count']=$this->BdcSurvey->find('count',array(
		'joins'=>$join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>2,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date) <'=>date('Y-m-d'),'DATE(BdcSurvey.created) >=' => $old_month)));
		$call_back_count['sold_over_cbk_count']=$this->BdcSurvey->find('count',array(
		'joins' => $sold_join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>array(3,4),'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date) <'=>date('Y-m-d'),'DATE(BdcSurvey.created) >=' => $old_month)));
		$call_back_count['service_over_cbk_count']=$this->BdcSurvey->find('count',array('conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>5,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date) <'=>date('Y-m-d'),'DATE(created) >=' => $old_month)));
		$call_back_count['parts_over_cbk_count']=$this->BdcSurvey->find('count',array(
		'joins' => $part_join_table,
		'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>11,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','DATE(BdcSurvey.call_back_date) <'=>date('Y-m-d'),'DATE(BdcSurvey.created) >=' => $old_month)));
		//$call_back_count['total_count']=array_sum($call_back_count);
		$this->loadModel('EquitySearch');
		$equity_searches = $this->EquitySearch->find('list',array('fields' => 'id,search_name','conditions' => array('bdc_search' => 1,'dealer_id' => $dealer_id),'order' => 'modified DESC'));

		$this->set(compact('call_back_count','equity_searches'));

	}
	//parts lead details

	public function part_lead_details($id = null)
	{
		//Configure::write('debug', 2);
		$this->loadModel('PartLeadsDms');
		$this->loadModel('PartHistoryLead');
		$contact = $this->PartLeadsDms->read(null, $id);
		$this->set('contact', $contact);
		$timezone = $this->Auth->user('zone');
		 $params = array(
            'conditions' => array('PartHistoryLead.part_lead_id' => $id),
            'fields' => array('PartHistoryLead.*'),
			'order' => array('PartHistoryLead.id DESC'),
        );
        $history = $this->PartHistoryLead->find('all', $params);
        $this->set('history', $history);
		//$appointment = $this->_appointment_date($id, $timezone);
		//$this->set('appointment', $appointment);
		$this->loadModel('SurveyGroup');
		$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,survey_id','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'))));
		$this->set('recipients', $recipients);


	}


	public function service_lead_details($id = null){
		$this->loadModel('ServiceLeadsDms');
		$this->loadModel('ServiceHistoryLead');
		$contact = $this->ServiceLeadsDms->read(null, $id);
		$this->set('contact', $contact);
		$timezone = $this->Auth->user('zone');
		 $params = array(
            'conditions' => array('ServiceHistoryLead.service_lead_id' => $id),
            'fields' => array('ServiceHistoryLead.*'),
			'order' => array('ServiceHistoryLead.id DESC'),
        );
        $history = $this->ServiceHistoryLead->find('all', $params);
        $this->set('history', $history);
		//$appointment = $this->_appointment_date($id, $timezone);
		//$this->set('appointment', $appointment);
		$this->loadModel('SurveyGroup');
		$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,survey_id','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'))));
		$this->set('recipients', $recipients);

	}

	public function bdcapp_lead_details($id = null){
		$this->view = 'lead_details';
		$this->_bdc_lead_details($id);
	}

	public function lead_details($id = null){

		$this->_bdc_lead_details($id);
	}

	private function _bdc_lead_details($id = null)
	{

		$contact = $this->BdcLead->read(null, $id);
		$this->set('contact', $contact);
		$timezone = $this->Auth->user('zone');
		 $params = array(
            'conditions' => array('History.contact_id' => $id),
            'fields' => array('History.*'),
			'order' => array('History.id DESC'),
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);
		//$appointment = $this->_appointment_date($id, $timezone);
		//$this->set('appointment', $appointment);
		 $history_types = array(
        	'Lead'=>'user',
        	'Event'=>'alarm',
        	'Lead Arrived'=>'cloud',
        	'New CRM Move'=>'list',
        	'BDC REP Web Lead'=>'cogwheel',
        	'BDC Survey(Pre)'=>'list',
			'BDC Survey(Sold)'=>'list',
        	'BDC Survey Call Back'=>'list',
        	'Deal'=>'list',
        	'DNC Status '=>'list',
        	'Email'=>'envelope',
        	'Lead Score'=>'list',
        	'Lead_duplicate'=>'list',
        	'Location Transfer'=>'list',
        	'MMS'=>'list',
        	'Note Update'=>'list',
        	'Source Changed'=>'list',
        	'Staff Transfer'=>'list',
        	'Merge'=>'list',
        	'Merge - Web'=>'list',
        	'Appt Show'=>'alarm',
        	'Marketing'=>'envelope',
        	'DNC'=>'list',
        	'MGR Check'=>'check',
        );


        $history_ar = array();
       // debug($history);
        foreach ($history as $his) {

        	$duplicate_key = $this->check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
        	if( $duplicate_key === false  ){
				$his_t= trim($his['History']['h_type']);
				if($his_t == 'BDC Survey')
				{
					if($his['History']['comment']=='Next Day follow up')
					{
						$history_ar['BDC Survey(Pre)'][] = $his;
					}else{
						$history_ar['BDC Survey(Sold)'][] = $his;
					}
				}else
				{
        			$history_ar[ trim($his['History']['h_type']) ][] = $his;
				}
			}
        }
		//debug($history_ar);

		$this->set('history_ar', $history_ar);
		$this->set('history_types', $history_types);
		$this->loadModel('SurveyGroup');
		$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,survey_id','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'))));
		$this->set('recipients', $recipients);

		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));

		$this->set('custom_step_map', $custom_step_map);
		$this->loadModel('LeadSold');
		$is_sold_leads=false;
		$sold_lead=$this->LeadSold->findByContactId($id);
		$survey_ids = array(2,3,4);
		if(!empty($sold_lead))
		{
			$survey_ids = array(3,4);
			$is_sold_leads=true;
		}
		$this->loadModel('BdcSurvey');
		$check_survey = $this->BdcSurvey->find('first',array('conditions' => array('BdcSurvey.bdc_lead_id' => $id,'survey_id' => $survey_ids)));
		$show_survey_button = true;
		$show_vm_email = false;
		if($check_survey['BdcSurvey']['status'] == 'contact'){
			$show_survey_button  = false;
		}elseif($check_survey['BdcSurvey']['status'] == 'voicemail')
		{
			$show_vm_email = true;
		}

		$this->set(compact('is_sold_leads','show_survey_button','show_vm_email'));
		$this->set('sales_step_options',  $this->get_dealer_steps() );


	}

	private function _appointment_date($contact_id, $timezone){
		date_default_timezone_set($timezone);
		$event = $this->Event->find('first', array('recursive'=>-1,'order'=>array('Event.start ASC'),'fields'=>array('Event.id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_id,
		//'Event.user_id'=>$current_user_id,
		'Event.start >' => date('Y-m-d: H:i:s',strtotime('now')) ,'Event.status <>' => 'Completed')));
		return $event;
	}

	public function bdc_input_safety_course($bdc_lead_id=null) {


		$this->loadModel('BdcLead');
		$contact_info=$this->BdcLead->findById($bdc_lead_id);

		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}
		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }
    // New Event Call survey form

	public function dealer_event_survey($bdc_lead_id=null,$survey_id = '13')
	{
		$dealer_id = $this->Auth->user('dealer_id');
		$dealer_survey_view[13] = array(
			'20090' => 'winona_dealer_event_survey',
			'20080' =>'lacrosse_event_sold_survey',
			'5000' =>'winona_dealer_event_survey',
			'20070' =>'waukon_dealer_event_survey',
			'40013' => 'freedom_ebay_survey'
		);
		$dealer_survey_view[14] = array(
			'20090' => 'winona_event_prospect_survey',
			'20080' =>'lacrosse_event_prospect_survey',
			'5000' =>'winona_dealer_event_survey',
			'20070' =>'waukon_event_prospect_survey'
		);

		$winona_dealer = array('20090',5000);
		if($survey_id == '14')
		{
			$this->view = 'event_prospect_survey';
		}elseif($survey_id == 15)
		{
			$this->view = 'equity_call_survey';
		}

		if(isset($dealer_survey_view[$survey_id][$dealer_id]))
		{
			$this->view = $dealer_survey_view[$survey_id][$dealer_id];
		}

		$dealer_id = $this->Auth->user('dealer_id');
		$survey_info= array('survey_id' => $survey_id , 'question_id' => 98);
		$this->_bdc_survey_form_data($bdc_lead_id,$survey_info,true);

		if($this->Auth->user('dealer_id') == 40013)
		{
			$freedom_group = array(762,761,760,759,758,491,492,262,1406,1626);
			$this->loadModel('DealerName');
			$dealer_locations = $this->DealerName->find('list',array('fields' => 'dealer_id,name','conditions' => array('dealer_id' => $freedom_group)));
			$dealer_locations['denton'] = 'Freedom Powersports Denton';
			$this->set(compact('dealer_locations'));
		}



	}

    public function bdc_input_ndf($bdc_lead_id=null) {
		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,1912,2309,40013);
		$ride_now_group = array(263,5000);
		$pandora_group = array(2344,2501);
	    $tmarine_group = array(60000);
		$survey_info= array('survey_id' => 2 , 'question_id' => 34);
		$dealer_id = $this->Auth->user('dealer_id');
		$this->_bdc_survey_form_data($bdc_lead_id,$survey_info);
		if(in_array($dealer_id,$freedom_group)){
		$this->view = 'freedom_bdc_input_ndf';
		}elseif(in_array($dealer_id,$ride_now_group)){
			$this->view = 'ridenow_bdc_input_ndf';
		}elseif(in_array($dealer_id,$pandora_group)){
			$this->view = 'pandora_bdc_ndf';
		}elseif(in_array($dealer_id,$tmarine_group)){
			$this->view = 'tmarine_bdc_input_ndf';
		}

	}

	 public function bdcapp_bdc_input_ndf($bdc_lead_id=null) {
		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,1912,2309);
		$ride_now_group = array(263,5000);
		$survey_info= array('survey_id' => 2 , 'question_id' => 34);
		$dealer_id = $this->Auth->user('dealer_id');
		$this->_bdc_survey_form_data($bdc_lead_id,$survey_info);
		if(in_array($dealer_id,$freedom_group)){
		$this->view = 'freedom_bdc_input_ndf';
		}elseif(in_array($dealer_id,$ride_now_group)){
			$this->view = 'ridenow_bdc_input_ndf';
		}else{
			$this->view = 'bdc_input_ndf';
		}
	}

	private function _bdc_survey_form_data($bdc_lead_id=null,$survey_info = array(),$loose_search = false)
	{
		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		$ride_now_group = array(263,5000);
		$dealer_id = $this->Auth->user('dealer_id');
		$survey_id = $survey_info['survey_id'];
		$question_id = $survey_info['question_id'];
		$cache_key = "bdc_statuses_".$dealer_id;

		$fields = array(
					'BdcLead.id',
					'BdcLead.company_id',
					'BdcLead.full_name',
					'BdcLead.contact_status_id',
					'BdcLead.first_name',
					'BdcLead.last_name',
					'BdcLead.type',
					'BdcLead.condition',
					'BdcLead.company_id',
					'BdcLead.year',
					'BdcLead.make',
					'BdcLead.model',
					'BdcLead.mobile',
					'BdcLead.phone',
					'BdcLead.email',
					'BdcLead.lead_status',
					'BdcLead.status',
					'BdcLead.sperson',
					'BdcLead.notes',
					'BdcLead.dnc_status',
					'BdcLead.sales_step',
					'BdcLead.work_number',
					'BdcLead.created'

		);

		$this->loadModel('BdcLead');

		//cache BDC  Statuses result
		$BDC_STATUSES = array();

		if (($BDC_STATUSES = Cache::read($cache_key, $this->Memcache_config)) === false){

		$bdc_statuses=$this->_get_bdc_status();
		$BDC_STATUSES = $bdc_statuses;
		Cache::set(array('duration' => '+8 hours'), $this->Memcache_config);
		Cache::write($cache_key, $BDC_STATUSES, $this->Memcache_config);
		}
		$bdc_statuses = $BDC_STATUSES;

		$contact_info=$this->BdcLead->find('first',array('fields' => $fields,'recursive' => -1,'conditions' => array('BdcLead.id' => $bdc_lead_id)));
		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->loadModel('BdcSurvey');
		$total_attempt=$this->BdcSurvey->find('count',array('conditions'=>array('bdc_lead_id'=>$bdc_lead_id,'survey_id'=>$survey_id)));

		$last_call=$this->BdcSurvey->find('first',array('conditions'=>array('bdc_lead_id'=>$bdc_lead_id,'survey_id'=>$survey_id,'latest'=>'yes')));
		if(in_array($last_call['BdcSurvey']['status'],array('contact','no contact')))
		{
			$this->loadModel('SurveyAnswer');
			$last_survey_answer=$this->SurveyAnswer->find('first',array('conditions'=>array('bdc_survey_id'=>$last_call['BdcSurvey']['id'],'question_id'=>$question_id)));
			$this->set(compact('last_survey_answer'));

		}
		if(!$loose_search){
			//if(!empty($contact_info['BdcLead']['first_name']))
			$other_conditions['BdcLead.first_name'] =  $contact_info['BdcLead']['first_name'];
			//if(!empty($contact_info['BdcLead']['last_name']))
			$other_conditions['BdcLead.last_name'] =  $contact_info['BdcLead']['last_name'];
			//if(!empty($contact_info['BdcLead']['email']))
			$other_conditions['BdcLead.email'] =  $contact_info['BdcLead']['email'];
			//if(!empty($contact_info['BdcLead']['mobile']) && !in_array($contact_info['BdcLead']['mobile'],array('0000000000','1111111111')))
			$other_conditions['BdcLead.mobile'] =  $contact_info['BdcLead']['mobile'];

		}else{

			if(!empty($contact_info['BdcLead']['mobile']) && !in_array($contact_info['BdcLead']['mobile'],array('0000000000','1111111111'))){
				$other_conditions['OR']['BdcLead.mobile'] =  $contact_info['BdcLead']['mobile'];
				$other_conditions['OR']['BdcLead.phone'] =  $contact_info['BdcLead']['mobile'];
			}
			if(!empty($contact_info['BdcLead']['phone']) && !in_array($contact_info['BdcLead']['phone'],array('0000000000','1111111111'))){
				$other_conditions['OR']['BdcLead.mobile'] =  $contact_info['BdcLead']['phone'];
				$other_conditions['OR']['BdcLead.phone'] =  $contact_info['BdcLead']['phone'];
			}

		}


		$condition_array['part_conditions'] = array(
							'PartLeadsDms.name' => $contact_info['BdcLead']['first_name']. ' '. $contact_info['BdcLead']['last_name'] ,
							'PartLeadsDms.email' => $contact_info['BdcLead']['email'],
							'PartLeadsDms.home_phone' => $contact_info['BdcLead']['mobile'],
							'PartLeadsDms.work_phone' => $contact_info['BdcLead']['phone']
		);
		$condition_array['service_conditions'] = array(
							'ServiceLeadsDms.name' => $contact_info['BdcLead']['first_name']. ' '. $contact_info['BdcLead']['last_name'] ,
							'ServiceLeadsDms.email' => $contact_info['BdcLead']['email'],
							'ServiceLeadsDms.home_phone' => $contact_info['BdcLead']['mobile'],
							'ServiceLeadsDms.work_phone' => $contact_info['BdcLead']['phone']
		);
		$condition_array['search_service'] = true;
		$condition_array['search_part'] = true;
		if(!empty($other_conditions)){
			$other_conditions['BdcLead.id !='] =  $contact_info['BdcLead']['id'];
			list($other_leads,$other_dealer_names)=$this->_find_location_lead($other_conditions);
		}else
		{
			$other_leads =$other_dealer_names =  array();
		}
		$this->set(compact('other_leads','other_dealer_names'));
		if(!in_array($survey_id,array(13,14))){
		list($part_other_leads,$service_other_leads)=$this->_find_part_service_lead($condition_array);
			$this->set(compact('part_other_leads','service_other_leads'));
		}else{
			$part_other_leads = $service_other_leads = array();
			$this->set(compact('part_other_leads','service_other_leads'));
		}

		$this->set(compact('total_attempt','last_call','bdc_status'/*,'other_leads','other_dealer_names'*/));
		if($survey_id == 3 && in_array($dealer_id,$ride_now_group) )
		{
			$this->loadModel('LeadSold');
			$sold_date = $this->LeadSold->find('first',array('fields' => array('LeadSold.contact_id','LeadSold.created','LeadSold.modified'),'conditions' => array('LeadSold.contact_id' => $bdc_lead_id))) ;
			$this->set('sold_date',$sold_date);

		}
		if(in_array($dealer_id,$ride_now_group))
		{
			 $params = array(
            'conditions' => array('History.contact_id' => $bdc_lead_id),
            'fields' => array('History.*'),
			'order' => array('History.id DESC'),
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);

		//$appointment = $this->_appointment_date($id, $timezone);
		//$this->set('appointment', $appointment);
		 $history_types = array(
        	'Lead'=>'user',
        	'Event'=>'alarm',
        	'Lead Arrived'=>'cloud',
        	'New CRM Move'=>'list',
        	'BDC REP Web Lead'=>'cogwheel',
        	'BDC Survey(Pre)'=>'list',
			'BDC Survey(Sold)'=>'list',
        	'BDC Survey Call Back'=>'list',
        	'Deal'=>'list',
        	'DNC Status '=>'list',
        	'Email'=>'envelope',
        	'Lead Score'=>'list',
        	'Lead_duplicate'=>'list',
        	'Location Transfer'=>'list',
        	'MMS'=>'list',
        	'Note Update'=>'list',
        	'Source Changed'=>'list',
        	'Staff Transfer'=>'list',
        	'Merge'=>'list',
        	'Merge - Web'=>'list',
        	'Appt Show'=>'alarm',
        	'Marketing'=>'envelope',
        	'DNC'=>'list',
        	'MGR Check'=>'check',
        );


        $history_ar = array();
       // debug($history);
        foreach ($history as $his) {

        	$duplicate_key = $this->check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
        	if( $duplicate_key === false  ){
				$his_t= trim($his['History']['h_type']);
				if($his_t == 'BDC Survey')
				{
					if($his['History']['comment']=='Next Day follow up')
					{
						$history_ar['BDC Survey(Pre)'][] = $his;
					}else{
						$history_ar['BDC Survey(Sold)'][] = $his;
					}
				}else
				{
        			$history_ar[ trim($his['History']['h_type']) ][] = $his;
				}
			}
        }
		//debug($history_ar);

		$this->set('history_ar', $history_ar);
		$this->set('history_types', $history_types);
		}


	}




	private function _find_location_lead($conditions = array())
	{
		$other_leads =array();
		$other_dealer_names = array();
		$dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$this->loadModel('BdcSurvey');
		$dealer_info = $this->DealerName->find('first',array('conditions' => array('dealer_id' => $dealer_id)));
		$dealer_group = !empty($dealer_info['DealerName']['crm_group'])?explode(',',$dealer_info['DealerName']['crm_group']):array();
		if(in_array($dealer_id,array(20080,20090,20070,20075)))
		$dealer_group[]= $dealer_id;

		if(!empty($conditions) && !empty($dealer_group))
		{
			$conditions['BdcLead.company_id'] = $dealer_group;
			$all_dealers=array_merge($dealer_group,array($dealer_id));
			$other_dealer_names = $this->DealerName->find('list',array('fields' => 'dealer_id,name','conditions' => array('dealer_id' => $all_dealers)));

			$this->BdcLead->bindModel(array('hasMany' => array(
												'BdcSurvey' => array(
													'foreignKey' => 'bdc_lead_id',
													'conditions' => array('latest' => 'yes')
												)

			)));
			$other_leads = $this->BdcLead->find('all',array('fields' =>'BdcLead.id,BdcLead.company_id','conditions' => $conditions));

		}

		return array($other_leads,$other_dealer_names);

	}

	private function _find_part_service_lead($condition_array =array())
	{
		$part_other_leads =array();
		$service_other_leads =array();
		$other_dealer_names = array();
		$dealer_id = $this->Auth->user('dealer_id');
		$part_conditions = $condition_array['part_conditions'];
		$service_conditions = $condition_array['service_conditions'];
		$this->loadModel('DealerName');
		$this->loadModel('BdcSurvey');
		$this->loadModel('PartLeadsDms');
		$this->loadModel('ServiceLeadsDms');
		$dealer_info = $this->DealerName->find('first',array('conditions' => array('dealer_id' => $dealer_id)));
		$dealer_group = !empty($dealer_info['DealerName']['crm_group'])?explode(',',$dealer_info['DealerName']['crm_group']):array();
		array_push($dealer_group,$dealer_id);
		if($condition_array['search_part']){
		$part_conditions['PartLeadsDms.dealer_id'] = $dealer_group;
		$this->PartLeadsDms->bindModel(array('hasMany' => array(
												'BdcSurvey' => array(
													'foreignKey' => 'part_lead_id',
													'conditions' => array('latest' => 'yes')
												)

			)));
		$part_other_leads = $this->PartLeadsDms->find('all',array('fields' =>'PartLeadsDms.id,PartLeadsDms.dealer_id','conditions' => $part_conditions));
		}
		if($condition_array['search_service']){
		$service_conditions['ServiceLeadsDms.dealer_id'] = $dealer_group;
		$this->ServiceLeadsDms->bindModel(array('hasMany' => array(
												'BdcSurvey' => array(
													'foreignKey' => 'service_lead_id',
													'conditions' => array('latest' => 'yes')
												)

			)));
		$service_other_leads = $this->ServiceLeadsDms->find('all',array('fields' =>'ServiceLeadsDms.id,ServiceLeadsDms.dealer_id','conditions' => $service_conditions));
		}

		return array($part_other_leads,$service_other_leads);

	}

     	public function bdc_input_14day($bdc_lead_id=null) {

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,1912,2309);
		$ride_now_group = array(263,5000);
		$pandora_group = array(2344,2501);
		$survey_info= array('survey_id' => 3 , 'question_id' => 46);
		$dealer_id = $this->Auth->user('dealer_id');
		$this->_bdc_survey_form_data($bdc_lead_id,$survey_info);
		if(in_array($dealer_id,$freedom_group)){
		$this->view = 'freedom_bdc_input_14day';
		}elseif(in_array($dealer_id,$ride_now_group)){
			$this->view = 'ridenow_bdc_input_14day';
		}elseif(in_array($dealer_id,$pandora_group)){
			$this->view = 'pandora_bdc_14day';
		}

    }

	public function bdcapp_bdc_input_14day($bdc_lead_id=null) {

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,1912,2309);
		$ride_now_group = array(263,5000);
		$survey_info= array('survey_id' => 3 , 'question_id' => 46);
		$dealer_id = $this->Auth->user('dealer_id');
		$this->_bdc_survey_form_data($bdc_lead_id,$survey_info);
		if(in_array($dealer_id,$freedom_group)){
		$this->view = 'freedom_bdc_input_14day';
		}elseif(in_array($dealer_id,$ride_now_group)){
			$this->view = 'ridenow_bdc_input_14day';
		}else{
			$this->view = 'bdc_input_14day';
		}

    }

    public function bdc_input_17_month($bdc_lead_id=null) {

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		$ride_now_group = array(263);
		$pandora_group = array(2344,2501);
		$dealer_id = $this->Auth->user('dealer_id');
		if(in_array($dealer_id,$freedom_group))
		{
			$this->view = 'freedom_bdc_input_17_month';
		}elseif(in_array($dealer_id,$pandora_group)){
			$this->view = 'pandora_bdc_17_month';
		}
		$fields = array(
					'BdcLead.id',
					'BdcLead.first_name',
					'BdcLead.full_name',
					'BdcLead.contact_status_id',
					'BdcLead.last_name',
					'BdcLead.type',
					'BdcLead.condition',
					'BdcLead.company_id',
					'BdcLead.year',
					'BdcLead.make',
					'BdcLead.model',
					'BdcLead.mobile',
					'BdcLead.phone',
					'BdcLead.email',
					'BdcLead.lead_status',
					'BdcLead.status',
					'BdcLead.sperson',
					'BdcLead.notes',
					'BdcLead.dnc_status',
					'BdcLead.sales_step',
					'BdcLead.work_number'

		);
		$this->loadModel('BdcLead');
		$contact_info=$this->BdcLead->find('first',array('fields' => $fields,'recursive' => -1,'conditions' => array('BdcLead.id' => $bdc_lead_id)));

		//cache BDC  Statuses result
		$BDC_STATUSES = array();
		$cache_key = "bdc_statuses_".$dealer_id;
		if (($BDC_STATUSES = Cache::read($cache_key, $this->Memcache_config)) === false){
		$bdc_statuses=$this->_get_bdc_status();
		$BDC_STATUSES = $bdc_statuses;
		Cache::set(array('duration' => '+8 hours'), $this->Memcache_config);
		Cache::write($cache_key, $BDC_STATUSES, $this->Memcache_config);
		}
		$bdc_statuses = $BDC_STATUSES;

		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->loadModel('BdcSurvey');
		$total_attempt=$this->BdcSurvey->find('count',array('conditions'=>array('bdc_lead_id'=>$bdc_lead_id,'survey_id'=>4)));

		$last_call=$this->BdcSurvey->find('first',array('conditions'=>array('bdc_lead_id'=>$bdc_lead_id,'survey_id'=>4,'latest'=>'yes')));
		if(in_array($last_call['BdcSurvey']['status'],array('contact','no contact')))
		{
			$this->loadModel('SurveyAnswer');
			$last_survey_answer=$this->SurveyAnswer->find('first',array('conditions'=>array('bdc_survey_id'=>$last_call['BdcSurvey']['id'],'question_id'=>56)));
			$this->set(compact('last_survey_answer'));

		}

		$this->set(compact('total_attempt','last_call','bdc_status'));


		}
     public function bdc_input_in_bound($bdc_lead_id=null) {

		$this->loadModel('BdcLead');
		$contact_info=$this->BdcLead->findById($bdc_lead_id);


		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}
		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }
    public function bdc_input_service_complete($bdc_lead_id=null) {

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,1912,2309);
		$dealer_id = $this->Auth->user('dealer_id');
		if(in_array($dealer_id,$freedom_group))
		{
			$this->view = 'freedom_bdc_input_service_complete';
		}
		$this->loadModel('ServiceLeadsDms');
		$contact_info=$this->ServiceLeadsDms->findById($bdc_lead_id);

		//cache BDC  Statuses result
		$BDC_STATUSES = array();
		$cache_key = "bdc_statuses_".$dealer_id;
		if (($BDC_STATUSES = Cache::read($cache_key, $this->Memcache_config)) === false){
		$bdc_statuses=$this->_get_bdc_status();
		$BDC_STATUSES = $bdc_statuses;
		Cache::set(array('duration' => '+8 hours'), $this->Memcache_config);
		Cache::write($cache_key, $BDC_STATUSES, $this->Memcache_config);
		}
		$bdc_statuses = $BDC_STATUSES;

		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->loadModel('BdcSurvey');
		$total_attempt=$this->BdcSurvey->find('count',array('conditions'=>array('service_lead_id'=>$bdc_lead_id,'survey_id'=>5)));

		$last_call=$this->BdcSurvey->find('first',array('conditions'=>array('service_lead_id'=>$bdc_lead_id,'survey_id'=>5,'latest'=>'yes')));
		$this->set(compact('total_attempt','last_call','bdc_status'));
		$cust_name = explode(' ' ,  $contact_info['ServiceLeadsDms']['name']);
		$other_conditions = array(
							'BdcLead.first_name' => $cust_name[0],
							'BdcLead.last_name' => $cust_name[1],
							'BdcLead.email' => $contact_info['ServiceLeadsDms']['email'],
							'BdcLead.mobile' => $contact_info['ServiceLeadsDms']['home_phone'],
							'BdcLead.phone' => $contact_info['ServiceLeadsDms']['work_phone']
		);
		$condition_array['part_conditions'] = array(
							'PartLeadsDms.name' => $contact_info['ServiceLeadsDms']['name'] ,
							'PartLeadsDms.email' => $contact_info['ServiceLeadsDms']['email'],
							'PartLeadsDms.home_phone' => $contact_info['ServiceLeadsDms']['home_phone'],
							'PartLeadsDms.work_phone' => $contact_info['ServiceLeadsDms']['work_phone']
		);
		$condition_array['service_conditions'] = array();
		$condition_array['search_service'] = false;
		$condition_array['search_part'] = true;
		list($other_leads,$other_dealer_names)=$this->_find_location_lead($other_conditions);
		$this->set(compact('other_leads','other_dealer_names'));
		list($part_other_leads,$service_other_leads)=$this->_find_part_service_lead($condition_array);
		$this->set(compact('part_other_leads','service_other_leads'));

		}
		// New survey added

		public function bdc_pa_nod_7($bdc_lead_id=null) {

		$this->loadModel('BdcLead');
		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}

		$contact_info=$this->BdcLead->findById($bdc_lead_id);
		$this->set(compact('contact_info','bdc_statuses'));
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }
	public function bdc_f_tune_8($bdc_lead_id=null) {

		$this->loadModel('BdcLead');
		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}

		$contact_info=$this->BdcLead->findById($bdc_lead_id);
		$this->set(compact('contact_info','bdc_statuses'));

		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }
	public function bdc_tune_service_9($bdc_lead_id=null) {

		$this->loadModel('BdcLead');
		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}

		$contact_info=$this->BdcLead->findById($bdc_lead_id);
		$this->set(compact('contact_info','bdc_statuses'));

		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }

	public function bdc_deal_care_10($bdc_lead_id=null) {

		$this->loadModel('BdcLead');
		$this->loadModel('BdcStatus');
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}

		$contact_info=$this->BdcLead->findById($bdc_lead_id);
		$this->set(compact('contact_info','bdc_statuses'));

		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);

    }

	// BDC Parts survey

	public function bdc_parts_survey($bdc_lead_id=null) {

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		$dealer_id = $this->Auth->user('dealer_id');



		if(in_array($dealer_id,$freedom_group))
		{
			$this->view = 'freedom_bdc_parts_survey';
		}

		$this->loadModel('PartLeadsDms');
		$contact_info=$this->PartLeadsDms->findById($bdc_lead_id);

		//cache BDC  Statuses result
		$BDC_STATUSES = array();
		$cache_key = "bdc_statuses_".$dealer_id;
		if (($BDC_STATUSES = Cache::read($cache_key, $this->Memcache_config)) === false){
		$bdc_statuses=$this->_get_bdc_status();
		$BDC_STATUSES = $bdc_statuses;
		Cache::set(array('duration' => '+8 hours'), $this->Memcache_config);
		Cache::write($cache_key, $BDC_STATUSES, $this->Memcache_config);
		}
		$bdc_statuses = $BDC_STATUSES;

		$this->set(compact('contact_info','bdc_statuses'));

		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->loadModel('BdcSurvey');
		$total_attempt=$this->BdcSurvey->find('count',array('conditions'=>array('part_lead_id'=>$bdc_lead_id,'survey_id'=>11)));

		$last_call=$this->BdcSurvey->find('first',array('conditions'=>array('part_lead_id'=>$bdc_lead_id,'survey_id'=>11,'latest'=>'yes')));
		$this->set(compact('total_attempt','last_call','bdc_status'));
		$cust_name = explode(' ' ,  $contact_info['PartLeadsDms']['name']);
		$other_conditions = array(
							'BdcLead.first_name' => $cust_name[0],
							'BdcLead.last_name' => $cust_name[1],
							'BdcLead.email' => $contact_info['PartLeadsDms']['email'],
							'BdcLead.mobile' => $contact_info['PartLeadsDms']['home_phone'],
							'BdcLead.phone' => $contact_info['PartLeadsDms']['work_phone']
		);
		$condition_array['service_conditions'] = array(
							'ServiceLeadsDms.name' => $contact_info['PartLeadsDms']['name'] ,
							'ServiceLeadsDms.email' => $contact_info['PartLeadsDms']['email'],
							'ServiceLeadsDms.home_phone' => $contact_info['PartLeadsDms']['home_phone'],
							'ServiceLeadsDms.work_phone' => $contact_info['PartLeadsDms']['work_phone']
		);
		$condition_array['part_conditions'] = array();
		$condition_array['search_service'] = true;
		$condition_array['search_part'] = false;
		list($other_leads,$other_dealer_names)=$this->_find_location_lead($other_conditions);
		$this->set(compact('other_leads','other_dealer_names'));
		list($part_other_leads,$service_other_leads)=$this->_find_part_service_lead($condition_array);
		$this->set(compact('part_other_leads','service_other_leads'));



		}

		/// New survey ended
	public function bdcapp_add_survey()
	{

		$this->_bdc_survey_add();
		die;
	}

	public function add_survey()
	{

		$this->_bdc_survey_add();
		die;
	}

	private function _bdc_survey_add()
	{

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		$ridenow_dealers = array(263);
		date_default_timezone_set($zone);
		if($this->request->is('post'))
		{
			//if(in_array($dealer_id,$ridenow_dealers))
			//{
				$this->request->data['BdcSurvey']['call_back_date'] = date("Y-m-d H:i:s", strtotime($this->request->data['BdcSurvey']['call_back_date']." ".$this->request->data['BdcSurvey']['call_back_time']));
		//	}
			$dealer_id =  $this->request->data['BdcSurvey']['dealer_id'];
			$this->loadModel('BdcSurvey');
			$this->BdcSurvey->updateAll(
    array('BdcSurvey.latest' => "'no'"),
    array('BdcSurvey.bdc_lead_id ' => $this->request->data['BdcSurvey']['bdc_lead_id'],'BdcSurvey.survey_id' =>array(2,3,4))
);
			if($this->request->data['BdcLead']['dnc_status']!=$this->request->data['BdcLead']['dnc_status_old'])
			{
				$this->BdcLead->id=$this->request->data['BdcSurvey']['bdc_lead_id'];
				$this->BdcLead->saveField('dnc_status',$this->request->data['BdcLead']['dnc_status']);
				//$this->BdcLead->saveField('modified',$this->request->data['BdcLead']['modified']);
				$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');
				$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['BdcSurvey']['bdc_lead_id'];
				$history_data['cond'] = 			"BDC DNC Status";
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			$dnc_statuses[$this->request->data['BdcLead']['dnc_status']];
				$history_data['comment'] = 			'Dnc Status changed from BDC';
				$history_data['deal_id'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"DNC Status ";
				$history_data['sales_step'] = 		"DNC Status";
				$history_data['sperson'] = 			$this->Auth->user('full_name');
				$history_data['modified']=    date('D - M d,Y h:i A');
				//$history_data['event_id'] = 		$bdc_survey_id;
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);


			}

			if($this->request->data['BdcSurvey']['survey_id'] == 2)
			{
				$email_update = false;
				$old_email = trim($this->request->data['BdcLead']['oldemail']);
				if(in_array($dealer_id,$ridenow_dealers))
				{
					if(!empty($this->request->data['BdcLead']['nemail'])&&($this->request->data['BdcLead']['nemail'] != $this->request->data['BdcLead']['oldemail']))
					{
						$email_update = true;

						$new_email = $this->request->data['BdcLead']['nemail'];
					}
				}else{
					if(!empty($this->request->data['32']['1'])&&($this->request->data['32']['1'] != $this->request->data['BdcLead']['oldemail']))
					{
						$email_update = true;
						$new_email = $this->request->data['32']['1'];
					}
				}

				if($email_update){
					$this->request->data['BdcSurvey']['email_update'] = 1;
					$this->BdcLead->id=$this->request->data['BdcSurvey']['bdc_lead_id'];
					$this->BdcLead->saveField('email',$new_email);
					$comment_text = 'Customer Email address updated to '.$new_email;
					if(!empty($old_email))
					{
						$comment_text = "Customer Email address $old_email updated to $new_email";
					}
					$history_data = array();
					$history_data['contact_id'] = 		$this->request->data['BdcSurvey']['bdc_lead_id'];
					$history_data['cond'] = 			"BDC Email Update";
					$history_data['user_id']=  			$this->Auth->user('id');
					$history_data['status'] = 			'Email Updated From BDC ';
					$history_data['comment'] = 			$comment_text;
					$history_data['h_type'] = 			"Lead";
					$history_data['sales_step'] = 		"BDC Email Update";
					$history_data['sperson'] = 			$this->Auth->user('full_name');
					$history_data['modified']=    date('D - M d,Y h:i A');
					//$history_data['event_id'] = 		$bdc_survey_id;
					$history = array(
						'History' => $history_data
					);
					$this->History->create();
					$this->History->save($history);

				}

			}

			$this->BdcSurvey->save($this->request->data);
			$bdc_survey_id=$this->BdcSurvey->id;
			foreach($this->request->data['SurveyAnswer'] as $key=>&$answer)
			{
				$answer['bdc_survey_id']=$bdc_survey_id;
				if(isset($this->request->data[$key]))
				{
					$this->request->data['SurveyAnswer'][$key]['answer']=$this->request->data['SurveyAnswer'][$key]['answer'].','.$this->request->data[$key][1];
				}
			}
			$this->loadModel('Survey');
			$this->loadModel('BdcStatus');
			$surveys = $this->Survey->find('list');
			$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$dealer_id))));
			$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['BdcSurvey']['bdc_lead_id'];

				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			$this->request->data['BdcSurvey']['status'];

				$history_data['deal_id'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"BDC Survey";
				if($this->request->data['BdcSurvey']['status']=='call back')
				{
					if(empty($this->request->data['BdcSurvey']['call_back_date']))
					{
						$this->request->data['BdcSurvey']['call_back_date']=date('Y-m-d');
					}
				$history_data['comment'] = 			$this->request->data['BdcSurvey']['call_back_msg'];
				$history_data['h_type'] = 			"BDC Survey Call Back";
				$history_data['cond'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Call Back Date-". date('D - M d,Y ',strtotime($this->request->data['BdcSurvey']['call_back_date']));
				$history_data['sales_step'] = 		"BDC Survey Callback";
				$history_data['modified']=    date('D - M d,Y h:i A',strtotime($this->request->data['BdcSurvey']['call_back_date']));
				}else{
				$history_data['comment'] = 			$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['cond'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Survey";
				$history_data['sales_step'] = 		"BDC Survey";
				$history_data['modified']=    date('D - M d,Y h:i A');
				}
				$history_data['sperson'] = 			$this->Auth->user('full_name');
				$history_data['condition']=			$this->request->data['BdcSurvey']['c_status'];
				$history_data['event_id'] = 		$bdc_survey_id;
				$history = array(
					'History' => $history_data
				);
				if($this->request->data['BdcSurvey']['switch_survey_id'] > 0){
				$shistory_data = 	$history_data;
				$shistory_data['status']= 'BDC Survey Switch';
				$shistory_data['sales_step']= 'BDC Survey Switch';
				$shistory_data['comment'] = $surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['condition'] ='Survey swicthed from '.$surveys[$this->request->data['BdcSurvey']['switch_survey_id']];
				$shistory_data['cond']='BDC Survey swicthed from '.$surveys[$this->request->data['BdcSurvey']['switch_survey_id']].' to '.$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$this->History->create();
				$this->History->save(array('History' =>$shistory_data));
				}
				$this->History->create();
				$this->History->save($history);



			$this->loadModel('SurveyAnswer');
			//pr($this->request->data['SurveyAnswer']);
			if(in_array($this->request->data['BdcSurvey']['status'],array('contact','bad number')))
			$this->SurveyAnswer->saveMany($this->request->data['SurveyAnswer']);

			$check_alert=1;
			if(!isset($this->request->data['send_email'])){
				$check_alert=0;
			}
			if(in_array($this->request->data['BdcSurvey']['status'],array('contact','bad number')) && $check_alert)

			{
				//$this->BdcLead->recursive=-1;

				$lead_data=$this->BdcLead->findById($this->request->data['BdcLead']['id']);

				//$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');

				$customer_status=$bdc_status[$this->request->data['BdcSurvey']['c_status']];
				$survey_response=array();
				if($this->request->data['BdcSurvey']['status']=='contact')
				{
					$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
					$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));
					if($this->request->data['BdcSurvey']['survey_id'] == 3){
						$info_array['bdc_survey_id'] = $bdc_survey_id;
						$cust_email = $this->request->data[100][1];
						if(!empty($cust_email) && !empty($this->request->data['google_review_link'])){
							$info_array['email'] = $cust_email;
							$info_array['contact_id'] = $this->request->data['BdcLead']['id'];
							$this->_send_google_review($info_array);
						}
					}

				}

				$survey_name=$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$this->loadModel('SurveyGroup');
				$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$dealer_id,'survey_id'=>$this->request->data['BdcSurvey']['survey_id'])));
				//$this->view='survey_response';
				$this->set(compact('survey_name','survey_response','lead_data'));
				$event_data =array();
				if(!empty($this->request->data['BdcSurvey']['event_id']))
				{
					$this->loadModel('Event');
					$this->Event->unbindModel(array('belongsTo'=>array('Contact')));
					$event_data = $this->Event->find('first',array('recursive'=>0,'conditions' => array('Event.id' =>$this->request->data['BdcSurvey']['event_id'])));
				}

				/**

				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$bcc_list = array('andrew@dp360crm.com','reports_all@dp360crm.com');
				$recipients = array_unique($recipients);
				$recipients = array_diff($recipients,$bcc_list);
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"survey_response",
					$survey_name.' - Status('.ucfirst($this->request->data['BdcSurvey']['status']).')'.'('.$customer_status.')',
					"sender",
					serialize( array('csr'=>$this->Auth->User('full_name'),'lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status'=>$customer_status,'event_data' => $event_data) ),
					'sender@dp360crm.com',
					'survey_response',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize($bcc_list)
				);


				//Send Email Alert end






			}


			$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['BdcSurvey']['bdc_lead_id']);



			die;
		}

	}

	private function _send_google_review($info_array = array())
	{
		/**
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		//Configure::write('debug',2);
		$google_review_array = array(
					'761' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom+powersports+dallas&lrd=0x864ea08e935d6981:0xbd5675c3c5f7e034,1',
					'262' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom%20decatur&lrd=0x864d92c70ed86519:0x88c2784171ca24db,1',
					'492' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom%20cleburne&lrd=0x864e47020d0edb35:0x467b2be0f9a1ecb7,1',
					'491' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom+fort+worth&lrd=0x864e0cf896a4d55d:0xaef8a9dcca6380ec,1',
					'759' =>'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom%20hurst&lrd=0x864e78d39378d99d:0x1210165ba20241a,1',
					'1406' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=farmers+branch+freedom+&lrd=0x864c27ca92952211:0xa14806e3b40dbac4,1',
					'758' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=mckinney+freedom+&lrd=0x864c13dd2d6297a5:0x1ba2bac24a8559e5,1',
					'760' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom%20lewisville&lrd=0x864c32147a39eaff:0x6438d63b0dacb5d7,1',
					'762' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=weatherford%20freedom%20powersports&lrd=0x864e018fd2978eb1:0x7ca202d195274b6b,1',
					'1912' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=atlanta+highway+indian+motorcycle&lrd=0x88f59dbd86e4b7a3:0xe9df8232b4a6dc12,1',
					'1626' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom+powersports+canton&lrd=0x88f565aa1a3a1bbf:0xee7712fdd7fb07e2,1',
					'1627' => ': https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedom%20powersports%20mcdonouhg&lrd=0x88f45bd00a2e21b9:0x1e90e5752e808038,1',
					'1640' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=freedompowersports%20huntsville&lrd=0x88620d3cf19f803b:0xd0074b8b9505981b,1'

					);

		$dealer_id = $this->Auth->user('dealer_id');
		$dealer = $this->Auth->user('dealer');
		$this->loadModel('GoogleReviewSentId');
		$save_array['GoogleReviewSentId'] = $info_array;
		$save_array['GoogleReviewSentId']['dealer_id'] = $dealer_id;
		$info_array['google_review'] = $google_review_array[$dealer_id];
		$this->GoogleReviewSentId->save($save_array);
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"google_review",
			$dealer.' - Google Reveiw link',
			"sender",
			serialize($info_array),
			'sender@dp360crm.com',
			'google_review',
			"sender@dp360crm.com",
			serialize(array($info_array['email'])),
			serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com'))
		);
	}


	public function event_survey_add()
	{

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		if($this->request->is('post'))
		{

			$update_survey_ids = array(13,14);
			if(!in_array($this->request->data['BdcSurvey']['survey_id'],$update_survey_ids))
			{
				$update_survey_ids = $this->request->data['BdcSurvey']['survey_id'];
			}
			$this->loadModel('BdcSurvey');
			$this->BdcSurvey->updateAll(
   				 	array('BdcSurvey.latest' => "'no'"),
    				array('BdcSurvey.bdc_lead_id ' => $this->request->data['BdcSurvey']['bdc_lead_id'],'BdcSurvey.survey_id' => $update_survey_ids)
			);
			if($this->request->data['BdcLead']['dnc_status']!=$this->request->data['BdcLead']['dnc_status_old'])
			{
				$this->BdcLead->id=$this->request->data['BdcSurvey']['bdc_lead_id'];
				$this->BdcLead->saveField('dnc_status',$this->request->data['BdcLead']['dnc_status']);
				//$this->BdcLead->saveField('modified',$this->request->data['BdcLead']['modified']);
				$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');
				$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['BdcSurvey']['bdc_lead_id'];
				$history_data['cond'] = 			"BDC DNC Status";
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			$dnc_statuses[$this->request->data['BdcLead']['dnc_status']];
				$history_data['comment'] = 			'Dnc Status changed from BDC';
				$history_data['deal_id'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"DNC Status ";
				$history_data['sales_step'] = 		"DNC Status";
				$history_data['sperson'] = 			$this->Auth->user('full_name');
				$history_data['modified']=    date('D - M d,Y h:i A');
				//$history_data['event_id'] = 		$bdc_survey_id;
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);


			}

			$this->BdcSurvey->save($this->request->data);
			$bdc_survey_id=$this->BdcSurvey->id;
			foreach($this->request->data['SurveyAnswer'] as $key=>&$answer)
			{
				$answer['bdc_survey_id']=$bdc_survey_id;
				if(isset($this->request->data[$key]))
				{
					$this->request->data['SurveyAnswer'][$key]['answer']=$this->request->data['SurveyAnswer'][$key]['answer'].','.$this->request->data[$key][1];
				}
			}
			$this->loadModel('Survey');
			$this->loadModel('BdcStatus');
			$surveys = $this->Survey->find('list');
			$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
			$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['BdcSurvey']['bdc_lead_id'];

				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			$this->request->data['BdcSurvey']['status'];

				$history_data['deal_id'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"BDC ".$surveys[$this->request->data['BdcSurvey']['survey_id']];
				if($this->request->data['BdcSurvey']['status']=='call back')
				{
					if(empty($this->request->data['BdcSurvey']['call_back_date']))
					{
						$this->request->data['BdcSurvey']['call_back_date']=date('Y-m-d');
					}
				$history_data['comment'] = 			$this->request->data['BdcSurvey']['call_back_msg'];
				$history_data['h_type'] = 			"BDC ".$surveys[$this->request->data['BdcSurvey']['survey_id']]." Call Back";
				$history_data['cond'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Call Back Date-". date('D - M d,Y ',strtotime($this->request->data['BdcSurvey']['call_back_date']));
				$history_data['sales_step'] = 		"BDC ".$surveys[$this->request->data['BdcSurvey']['survey_id']]." Callback";
				$history_data['modified']=    date('D - M d,Y ',strtotime($this->request->data['BdcSurvey']['call_back_date']));
				}else{
				$history_data['comment'] = 			$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['cond'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Survey";
				$history_data['sales_step'] = 		"BDC ".$surveys[$this->request->data['BdcSurvey']['survey_id']]." Survey";
				$history_data['modified']=    date('D - M d,Y h:i A');
				}
				$history_data['sperson'] = 			$this->Auth->user('full_name');
				$history_data['condition']=			$this->request->data['BdcSurvey']['c_status'];
				$history_data['event_id'] = 		$bdc_survey_id;
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);
			$this->loadModel('SurveyAnswer');
			//pr($this->request->data['SurveyAnswer']);
			$this->SurveyAnswer->saveMany($this->request->data['SurveyAnswer']);
			$check_alert=1;
			/*if(!isset($this->request->data['send_email'])){
				$check_alert=0;
			}*/
			if(in_array($this->request->data['BdcSurvey']['status'],array('contact'))&& $check_alert)

			{
				//$this->BdcLead->recursive=-1;

				$lead_data=$this->BdcLead->findById($this->request->data['BdcLead']['id']);

				//$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');

				$customer_status=$bdc_status[$this->request->data['BdcSurvey']['c_status']];
				$survey_response=array();
				if($this->request->data['BdcSurvey']['status']=='contact')
				{
					$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
					$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));

				}

				$survey_name=$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$this->loadModel('SurveyGroup');
				$recipients = array('andrew@dp360crm.com');
				$additional_text = '';
				if(isset($this->request->data['send_email'])&& $this->request->data['send_email']=='yes'){
					$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'),'survey_id'=>2)));
					$additional_text= " - Dealer Please Call Hot lead";
				}
				if($dealer_id == 40013)
				{
					if(is_array($update_survey_ids))
					$survey_name = 'Ebay Survey';
					$select_opt = 0;
					$additional_text= " - Dealer Please Call Hot lead";
					$my_text = array();
					if(isset($this->request->data['parts_send_email'])&& $this->request->data['parts_send_email']=='yes')			{
						$select_opt++;
						$recipients = $this->_freedom_ebay_reciepients('parts_manager',$this->request->data['part_dealer_id']);
						$my_text[]= "Parts Need";

					}

					if(isset($this->request->data['service_send_email'])&& $this->request->data['service_send_email']=='yes')
						{
						$select_opt++;
						$recipients = $this->_freedom_ebay_reciepients('service_manager',$this->request->data['location_dealer_id']);
						$my_text[]= "Service Need";
					}
					if(isset($this->request->data['sales_send_email'])&& $this->request->data['sales_send_email']=='yes')			{
						$recipients = $this->_freedom_ebay_reciepients('sales_manager',$this->request->data['location_dealer_id']);

						$select_opt++;
						$my_text[]= "Unit Trade";
					}
					if($select_opt > 1)
					{
						$recipients = $this->_freedom_ebay_reciepients('general_manager',$this->request->data['location_dealer_id']);
					}

					if(!empty($my_text))
					$additional_text .= ' ('.implode(',',$my_text).')';
				}

				$this->set(compact('survey_name','survey_response','lead_data'));

				/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$bcc_list = array('andrew@dp360crm.com','reports_all@dp360crm.com');
				$recipients = array_unique($recipients);
				$recipients = array_diff($recipients,$bcc_list);

				if(!empty($recipients)){


					$this->loadModel("QueueEmail");
					$this->QueueEmail->create_email_queue(
						"survey_response",
						$survey_name.' - Status('.ucfirst($this->request->data['BdcSurvey']['status']).')'.'('.$customer_status.')'.$additional_text,
						"sender",
						serialize(array('csr' => $this->Auth->User('full_name')  ,'lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status'=>$customer_status)),
						'sender@dp360crm.com',
						'survey_response',
						"sender@dp360crm.com",
						serialize($recipients),
						serialize($bcc_list)
					);
				}

				//Send Email Alert end




			}


			$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['BdcSurvey']['bdc_lead_id']);



			die;
		}

	}


	// Part lead add survey

	public function part_leadsurvey()
	{

		$this->autoRender=false;
		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		if($this->request->is('post'))
		{

			$this->loadModel('BdcSurvey');
			$this->BdcSurvey->updateAll(
    array('BdcSurvey.latest' => "'no'"),
    array('BdcSurvey.part_lead_id ' => $this->request->data['BdcSurvey']['part_lead_id'])
);


			$this->BdcSurvey->save($this->request->data);
			$bdc_survey_id=$this->BdcSurvey->id;
			foreach($this->request->data['SurveyAnswer'] as $key=>&$answer)
			{
				$answer['bdc_survey_id']=$bdc_survey_id;
				if(isset($this->request->data[$key]))
				{
					$this->request->data['SurveyAnswer'][$key]['answer']=$this->request->data['SurveyAnswer'][$key]['answer'].','.$this->request->data[$key][1];
				}
			}
			$this->loadModel('Survey');
			$this->loadModel('BdcStatus');
			$surveys = $this->Survey->find('list');
			$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
			$history_data = array();
				$history_data['part_lead_id'] = 		$this->request->data['BdcSurvey']['part_lead_id'];
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['cashier'] = 			$this->request->data['BdcSurvey']['status'];
				$history_data['invoice_no'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"BDC Survey";
				$history_data['stock_id'] = 			$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['comment'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Survey";
				if($this->request->data['BdcSurvey']['status']=='call back')
				{
					$history_data['comment']=$this->request->data['BdcSurvey']['call_back_msg'];
				}


				$history_data['sperson'] = 			$this->Auth->user('full_name');

				$history = array(
					'PartHistoryLead' => $history_data
				);
				$this->loadModel('PartHistoryLead');
				$this->PartHistoryLead->create();
				$this->PartHistoryLead->save($history);
			$this->loadModel('SurveyAnswer');
			//pr($this->request->data['SurveyAnswer']);
			$this->SurveyAnswer->saveMany($this->request->data['SurveyAnswer']);
			$check_alert=1;

				if(!isset($this->request->data['send_email'])){
					$check_alert=0;
				}

			if(in_array($this->request->data['BdcSurvey']['status'],array('contact','bad number'))&& $check_alert)
			{
				//$this->BdcLead->recursive=-1;
				$this->loadModel('PartLeadsDms');
				$lead_data=$this->PartLeadsDms->findById($this->request->data['PartLead']['id']);

				//$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');

				$customer_status=$bdc_status[$this->request->data['BdcSurvey']['c_status']];
				$survey_response=array();
				if($this->request->data['BdcSurvey']['status']=='contact')
				{
					$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
					$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));

				}

				if($check_alert)
				$survey_ids[]=$this->request->data['BdcSurvey']['survey_id'];
				if(isset($this->request->data['alert_sales_group'])&& $this->request->data['alert_sales_group']=='yes'){
				$survey_ids[]=2;
				}
				$survey_name=$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$this->loadModel('SurveyGroup');
				$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'),'survey_id'=>$survey_ids)));
				//$this->view='survey_response';
				$this->set(compact('survey_name','survey_response','lead_data'));


				/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"part_survey_response",
					$survey_name.' - Status('.ucfirst($this->request->data['BdcSurvey']['status']).')'.'('.$customer_status.')',
					"sender",
					serialize( array('lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status'=>$customer_status) ),
					'sender@dp360crm.com',
					'part_survey_response',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com'))
				);

				//Send Email Alert end




			}

			die;
		}


}



	//service lead add survey

	public function service_leadsurvey()
	{
		$this->autoRender=false;
		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		if($this->request->is('post'))
		{
			$this->loadModel('BdcSurvey');
			$this->loadModel('ServiceLeadsDms');
			$this->loadModel('Survey');
			$this->loadModel('BdcStatus');
			$surveys = $this->Survey->find('list');
			$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
			$this->BdcSurvey->updateAll(
    array('BdcSurvey.latest' => "'no'"),
    array('BdcSurvey.service_lead_id ' => $this->request->data['BdcSurvey']['service_lead_id'])
);
			if($this->request->data['ServiceLeadsDms']['dnc_status']!=$this->request->data['ServiceLeadsDms']['dnc_status_old'])
			{
				$this->ServiceLeadsDms->id=$this->request->data['BdcSurvey']['service_lead_id'];
				$this->ServiceLeadsDms->saveField('dnc_status',$this->request->data['ServiceLeadsDms']['dnc_status']);
				//$this->BdcLead->saveField('modified',$this->request->data['BdcLead']['modified']);
				$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');
				$history_data = array();
				$history_data['service_lead_id'] = 		$this->request->data['BdcSurvey']['service_lead_id'];

				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['job_description'] = 			$this->request->data['BdcSurvey']['status'];

				$history_data['cust_code'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"DNC status changed by BDC ";

				$history_data['job_title'] = 			$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['unit_make'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Survey";
				$history_data['comment'] =$dnc_statuses[$this->request->data['ServiceLeadsDms']['dnc_status']];

				$history_data['service_writer'] = 			$this->Auth->user('full_name');

				$history = array(
					'ServiceHistoryLead' => $history_data
				);
				$this->loadModel('ServiceHistoryLead');
				$this->ServiceHistoryLead->create();
				$this->ServiceHistoryLead->save($history);


			}

			$this->BdcSurvey->save($this->request->data);
			$bdc_survey_id=$this->BdcSurvey->id;
			foreach($this->request->data['SurveyAnswer'] as $key=>&$answer)
			{
				$answer['bdc_survey_id']=$bdc_survey_id;
				if(isset($this->request->data[$key]))
				{
					$this->request->data['SurveyAnswer'][$key]['answer']=$this->request->data['SurveyAnswer'][$key]['answer'].','.$this->request->data[$key][1];
				}
			}


			$history_data = array();
				$history_data['service_lead_id'] = 		$this->request->data['BdcSurvey']['service_lead_id'];

				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['job_description'] = 			$this->request->data['BdcSurvey']['status'];

				$history_data['cust_code'] = 			$bdc_survey_id;
				$history_data['h_type'] = 			"BDC Survey";

				$history_data['job_title'] = 			$surveys[$this->request->data['BdcSurvey']['survey_id']];
				$history_data['unit_make'] = 			$bdc_status[$this->request->data['BdcSurvey']['c_status']]."-BDC Survey";
				if($this->request->data['BdcSurvey']['status']=='call back')
				{
					$history_data['comment']=$this->request->data['BdcSurvey']['call_back_msg'];
				}

				$history_data['service_writer'] = 			$this->Auth->user('full_name');

				$history = array(
					'ServiceHistoryLead' => $history_data
				);
				$this->loadModel('ServiceHistoryLead');
				$this->ServiceHistoryLead->create();
				$this->ServiceHistoryLead->save($history);
				$this->loadModel('SurveyAnswer');
				//pr($this->request->data['SurveyAnswer']);
				$this->SurveyAnswer->saveMany($this->request->data['SurveyAnswer']);

			if(!isset($this->request->data['send_email'])){
					$check_alert=0;
				}

			if(in_array($this->request->data['BdcSurvey']['status'],array('contact','bad number'))&& $check_alert)
			{				//$this->BdcLead->recursive=-1;
				$this->loadModel('ServiceLeadsDms');
				$lead_data=$this->ServiceLeadsDms->findById($this->request->data['ServiceLead']['id']);

				//$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');

				$customer_status=$bdc_status[$this->request->data['BdcSurvey']['c_status']];
				$survey_response=array();
				if($this->request->data['BdcSurvey']['status']=='contact')
				{
					$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
					$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));

				}

				if($check_alert)
				$survey_ids[]=$this->request->data['BdcSurvey']['survey_id'];
				if(isset($this->request->data['alert_sales_group'])&& $this->request->data['alert_sales_group']=='yes'){
				$survey_ids[]=2;
				}
				$survey_name=$surveys[$this->request->data['BdcSurvey']['survey_id']];

				$this->loadModel('SurveyGroup');
				$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'),'survey_id'=>$survey_ids)));
				//$this->view='survey_response';
				$this->set(compact('survey_name','survey_response','lead_data'));


			/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"service_survey_response",
					$survey_name.' - Status('.ucfirst($this->request->data['BdcSurvey']['status']).')'.'('.$customer_status.')',
					"sender",
					serialize( array('csr' => $this->Auth->User('full_name') , 'lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status'=>$customer_status) ),
					'sender@dp360crm.com',
					'service_survey_response',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com'))
				);

				//Send Email Alert end







			}

			die;
		}

	}

	public function bdcapp_survey_response($bdc_survey_id=null)
	{
		$this->layout='default_worksheet2';
		$this->view = 'survey_response';
		$this->_bdc_survey_response($bdc_survey_id);
	}

	public function survey_response($bdc_survey_id=null)
	{
		$this->layout='default_worksheet2';
		$this->_bdc_survey_response($bdc_survey_id);
	}

	private function _bdc_survey_response($bdc_survey_id=null)
	{


		$this->loadModel('SurveyAnswer');
		$this->loadModel('BdcSurvey');
		$this->loadModel('User');
		$bdc_survey=$this->BdcSurvey->findById($bdc_survey_id);
		$csr_info = $this->User->find('first',array('fields'=>array('User.full_name','User.id'),'conditions' => array('User.id' => $bdc_survey['BdcSurvey']['user_id'])));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));
		$this->loadModel('BdcStatus');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$customer_status=$bdc_status[$bdc_survey['BdcSurvey']['c_status']];
		$surveys=array('1'=>'In Bound Survey','2'=>'Next Day Follow-up Survey','3'=>'14 Day Survey','4'=>'CSI 17 Survey','5'=>'Service Survey','6'=>'Safety Survey','11' => 'Parts Survey');
		$survey_name=$surveys[$bdc_survey['BdcSurvey']['survey_id']];
		if(in_array($bdc_survey['BdcSurvey']['survey_id'],array(2,3,4))){
		$lead_data=$this->BdcLead->findById($bdc_survey['BdcSurvey']['bdc_lead_id']);
		$event_data = array();
		if(!empty($bdc_survey['BdcSurvey']['event_id']))
		{
			$this->loadModel('Event');
			$this->Event->unbindModel(array('belongsTo'=>array('Contact')));
			$event_data = $this->Event->find('first',array('recursive'=>0,'conditions' => array('Event.id' =>$bdc_survey['BdcSurvey']['event_id'])));
		}
		$this->set(compact('event_data',$event_data));
		}elseif($bdc_survey['BdcSurvey']['survey_id'] == 11){
			$this->view = 'part_survey_response';
			$this->loadModel('PartLeadsDms');
			$lead_data=$this->PartLeadsDms->findById($bdc_survey['BdcSurvey']['part_lead_id']);
		}elseif($bdc_survey['BdcSurvey']['survey_id'] == 5){
			$this->view = 'service_survey_response';
			$this->loadModel('ServiceLeadsDms');
			$lead_data=$this->ServiceLeadsDms->findById($bdc_survey['BdcSurvey']['service_lead_id']);
		}
		$this->set(compact('lead_data','survey_name','survey_response','customer_status','bdc_survey_id','csr_info'));

	}

	public function bdcapp_email_response($bdc_survey_id=null,$email=null)
	{
		$this->_bdc_email_response($bdc_survey_id,$email);
	}

	public function email_response($bdc_survey_id=null,$email=null)
	{
		$this->_bdc_email_response($bdc_survey_id,$email);
	}

	public function _bdc_email_response($bdc_survey_id=null,$email=null)
	{

		//$this->layout='default_worksheet2';
		$this->loadModel('SurveyAnswer');
		$this->loadModel('BdcSurvey');
		$bdc_survey=$this->BdcSurvey->findById($bdc_survey_id);
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$survey_response=$this->SurveyAnswer->find('all',array('conditions'=>array('SurveyAnswer.bdc_survey_id'=>$bdc_survey_id)));
		$this->loadModel('BdcStatus');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'id,name','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')))));
		$customer_status=$bdc_status[$bdc_survey['BdcSurvey']['c_status']];
		$surveys=array('1'=>'In Bound Survey','2'=>'Next Day Follow-up Survey','3'=>'14 Day Survey','4'=>'CSI 17 Survey','5'=>'Service Survey','6'=>'Safety Survey','11' => 'Parts Survey');
		$survey_name=$surveys[$bdc_survey['BdcSurvey']['survey_id']];
		if(in_array($bdc_survey['BdcSurvey']['survey_id'],array(2,3,4))){
			$survey_template = 'survey_response';
		$lead_data=$this->BdcLead->findById($bdc_survey['BdcSurvey']['bdc_lead_id']);
		}elseif($bdc_survey['BdcSurvey']['survey_id'] == 11){
			$survey_template  = 'part_survey_response';
			$this->loadModel('PartLeadsDms');
			$lead_data=$this->PartLeadsDms->findById($bdc_survey['BdcSurvey']['part_lead_id']);
		}elseif($bdc_survey['BdcSurvey']['survey_id'] == 5){
			$survey_template  = 'service_survey_response';
			$this->loadModel('ServiceLeadsDms');
			$lead_data=$this->ServiceLeadsDms->findById($bdc_survey['BdcSurvey']['service_lead_id']);
		}
		if(is_null($email))
		{
			$this->loadModel('SurveyGroup');
			$recipients=$this->SurveyGroup->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'),'survey_id'=>$bdc_survey['BdcSurvey']['survey_id'])));
		}
		else
		{
			$recipients=array($email);
		}

			/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					$survey_template,
					$survey_name.' - Status('.ucfirst($bdc_survey['BdcSurvey']['status']).')'.'('.$customer_status.')',
					"sender",
					serialize( array('csr' => $this->Auth->User('full_name') , 'lead_data'=>$lead_data,'survey_name'=>$survey_name,'survey_response'=>$survey_response,'customer_status'=>$customer_status) ),
					'sender@dp360crm.com',
					$survey_template,
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com'))
				);

				//Send Email Alert end







		die;


	}



	public function bdc_report($stats_month = null) {
		$this->layout='default_bdcsurvey_reports';

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$s_date = date('Y-m-01');
		$e_date =date('Y-m-d');
		if(!empty($this->request->params['named']['start_date']))
		{
			$s_date = $this->request->params['named']['start_date'];
			$e_date = $this->request->params['named']['end_date'];
		}

		$this->Session->write("bdc_date_range.start_date", $s_date);
		$this->Session->write("bdc_date_range.end_date", $e_date);

		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);
		$this->set(compact('s_date','e_date'));


	}

	public function crmreport_bdc_report($stats_month = null) {
		$this->layout='crmreport_bdcsurvey_reports';

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
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->set('stats_month', $stats_month);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);


	}

		public function bdcapp_bdc_report($stats_month = null) {
		$this->layout='bdcapp_layout';
		$this->view = 'crmreport_bdc_report';
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
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$this->set('dealer_info',$dealer_info);
		$this->set('stats_month', $stats_month);
		$dealer_names=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('DealerName.dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
		$this->set('dealer_names',$dealer_names);


	}

  public function lead_score_report($show_group=null,$record_limit=20) {
		$this->layout = null;

		list($lead_scores,$sources,$top_sources,$l_crms,$l_json_crm,$lead_grades_crm,$grades,$crm_sources_correct,$crm_sources_json,$lead_sources,$lead_sources_json,$record_limit,$lead_scores_count)=$this->_leadscore_report($show_group,$record_limit);
		$this->set(compact('lead_scores','sources','top_sources','l_crms','l_json_crm','lead_grades_crm','grades','crm_sources_correct','crm_sources_json','lead_sources','lead_sources_json','record_limit','lead_scores_count'));



  }

  public function crmreport_lead_score_report($show_group=null,$record_limit=20) {
		$this->layout = null;
		$this->view='lead_score_report';

		list($lead_scores,$sources,$top_sources,$l_crms,$l_json_crm,$lead_grades_crm,$grades,$crm_sources_correct,$crm_sources_json,$lead_sources,$lead_sources_json,$record_limit,$lead_scores_count)=$this->_leadscore_report($show_group,$record_limit);
		$this->set(compact('lead_scores','sources','top_sources','l_crms','l_json_crm','lead_grades_crm','grades','crm_sources_correct','crm_sources_json','lead_sources','lead_sources_json','record_limit','lead_scores_count'));



  }

    public function bdcapp_lead_score_report($show_group=null,$record_limit=20) {
		$this->layout = null;
		$this->view='lead_score_report';

		list($lead_scores,$sources,$top_sources,$l_crms,$l_json_crm,$lead_grades_crm,$grades,$crm_sources_correct,$crm_sources_json,$lead_sources,$lead_sources_json,$record_limit,$lead_scores_count)=$this->_leadscore_report($show_group,$record_limit);
		$this->set(compact('lead_scores','sources','top_sources','l_crms','l_json_crm','lead_grades_crm','grades','crm_sources_correct','crm_sources_json','lead_sources','lead_sources_json','record_limit','lead_scores_count'));



  }

  private function _leadscore_report($show_group=null,$record_limit=20)
  {
	  $dealer_id = $this->Auth->user('dealer_id');
	  $modified_date_field = 'modified';
		if(in_array($this->Auth->user('dealer_id'),array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			//$dealer_id=array(262, 762, 758, 760,759, 761);

		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$dealer_id=$show_group;
		}
		$r_limit=$record_limit;
		$stats_month = date('m');
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}
		$this->loadModel('LeadScore');
		$lead_scores_count=$this->LeadScore->find('count',array('conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month)));
		if($record_limit=='all')
		{
			$r_limit=$lead_scores_count;
		}
		$this->LeadScore->bindModel(array('belongsTo'=>array('ScoreSource'=>array('foreignKey'=>'source'))));
		$lead_scores=$this->LeadScore->find('all',array('conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month),'limit'=>$r_limit));

		$this->LeadScore->bindModel(array('belongsTo'=>array('ScoreSource'=>array('foreignKey'=>'source'))));

		$source_count=$this->LeadScore->find('all',array('fields'=>'LeadScore.source,count(LeadScore.source) as source_count,ScoreSource.*','conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month,'LeadScore.source !='=>''),'group'=>'LeadScore.source','order'=>'source_count DESC'));
		$sources=array();
		$top_sources=array();
		$i=1;
		foreach($source_count as $s_count){
			$sr['source_id']=$s_count['LeadScore']['source'];
			$sr['source_count']=$s_count[0]['source_count'];
			$sr['source']=$s_count['ScoreSource']['name'];
			$sources[]=$sr;
			if($i<=5){
				$top_sources[]=array($s_count['ScoreSource']['name'],(int)$s_count[0]['source_count']);
			}
			$i++;
		}
		 $top_sources = array($top_sources);
		 $l_crms=array();
		 $l_json_crm=array();
		$logged_count=$this->LeadScore->find('all',array('fields'=>'LeadScore.logged_crm,count(LeadScore.logged_crm) as source_count','conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month,'LeadScore.logged_crm !='=>''),'group'=>'LeadScore.logged_crm','order'=>'source_count DESC'));

		foreach($logged_count as $l_count){
			$sr['status']=$l_count['LeadScore']['logged_crm'];
			$sr['source_count']=$l_count[0]['source_count'];
			$l_crms[]=$sr;
			$l_json_crm[]=array(strtoupper($l_count['LeadScore']['logged_crm']),(int)$l_count[0]['source_count']);


		}
		$l_json_crm=array($l_json_crm);

		 $grades=array();
		 $lead_grades_crm=array();
		$lead_grades=$this->LeadScore->find('all',array('fields'=>'LeadScore.score,count(LeadScore.score) as source_count','conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month,'LeadScore.score !='=>''),'group'=>'LeadScore.score','order'=>'score ASC'));

		foreach($lead_grades as $grd){
			$sr['score']=$grd['LeadScore']['score'];
			$sr['source_count']=$grd[0]['source_count'];
			$grades[]=$sr;
			$lead_grades_crm[]=array(strtoupper($grd['LeadScore']['score']),(int)$grd[0]['source_count']);


		}
		$lead_grades_crm=array($lead_grades_crm);

		 $crm_sources_correct=array();
		 $crm_sources_json=array();
		$crm_sources=$this->LeadScore->find('all',array('fields'=>'LeadScore.crm_source_correct,count(LeadScore.crm_source_correct) as source_count','conditions'=>array('LeadScore.dealer_id'=>$dealer_id,'LeadScore.created >='=>$first_day_this_month ,'LeadScore.created <='=>$last_day_this_month,'LeadScore.crm_source_correct !='=>''),'group'=>'LeadScore.crm_source_correct','order'=>'source_count DESC'));

		foreach($crm_sources as $grd){
			$sr['crm_source_correct']=$grd['LeadScore']['crm_source_correct'];
			$sr['source_count']=$grd[0]['source_count'];
			$crm_sources_correct[]=$sr;
			$crm_sources_json[]=array(strtoupper($grd['LeadScore']['crm_source_correct']),(int)$grd[0]['source_count']);


		}
		$crm_sources_json=array($crm_sources_json);

		 $lead_sources=array();
		 $lead_sources_json=array();
		 $this->loadModel('Contact');
		$l_sources=$this->Contact->find('all',array('fields'=>'Contact.source,count(Contact.source) as source_count','conditions'=>array('Contact.company_id'=>$dealer_id,'Contact.created >='=>$first_day_this_month ,'Contact.created <='=>$last_day_this_month,'Contact.source !='=>''),'group'=>'Contact.source','order'=>'source_count DESC'));
		$i=1;
		foreach($l_sources as $grd){
			$sr['lead_source']=$grd['Contact']['source'];
			$sr['source_count']=$grd[0]['source_count'];
			$lead_sources[]=$sr;

			if($i<=5){
			$lead_sources_json[]=array(strtoupper($grd['Contact']['source']),(int)$grd[0]['source_count']);
			}
			$i++;

		}
		$lead_sources_json=array($lead_sources_json);

		return array($lead_scores,$sources,$top_sources,$l_crms,$l_json_crm,$lead_grades_crm,$grades,$crm_sources_correct,$crm_sources_json,$lead_sources,$lead_sources_json,$record_limit,$lead_scores_count);
  }

  public function bdc_survey_report($show_group=null)
	{
		$this->layout = null;
		list($total_counts,$all_leads,$bdc_sold_leads)=$this->_survey_report($show_group);
		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set('bdc_sold_leads',$bdc_sold_leads);
	}

	public function crmreport_bdc_survey_report($show_group=null)
	{
		$this->layout = null;
		$this->view='bdc_survey_report';
		list($total_counts,$all_leads,$bdc_sold_leads)=$this->_survey_report($show_group);
		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set('bdc_sold_leads',$bdc_sold_leads);

	}
	public function bdcapp_bdc_survey_report($show_group=null)
	{
		$this->layout = null;
		$this->view='bdc_survey_report';
		list($total_counts,$all_leads,$bdc_sold_leads)=$this->_survey_report($show_group);
		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set('bdc_sold_leads',$bdc_sold_leads);

	}
	private function _survey_report($show_group=null)
	{
		$user_id[] = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		if(in_array($this->Auth->user('dealer_id'),array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
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
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}

		$this->loadModel('LeadStatus');
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');

		$this->loadModel('BdcSurvey');
		$fields=array('BdcSurvey.*','BdcLead.id','BdcLead.sales_step','BdcLead.modified','BdcLead.step_modified');

		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'Contact.sales_step !=' => '1',
			/*'User.group_id' => $this->Contact->ReportUserGroups,*/
			'NOT'=>array('Contact.status' => $lead_statuses),
			'Contact.'.$modified_date_field.' >=' => $first_day_this_month,
			'Contact.'.$modified_date_field.' <=' => $last_day_this_month,
			'Contact.company_id'=>$user_id
            );
		//pr($conditions);
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

		$this->loadModel('LeadSold');

		$bdc_sold_leads=$this->BdcSurvey->query("select LeadSold.id,LeadSold.contact_id from bdc_surveys AS BdcSurvey RIGHT JOIN lead_solds LeadSold ON BdcSurvey.`bdc_lead_id`=`LeadSold`.`contact_id` AND `BdcSurvey`.`modified` <= `LeadSold`.`modified` where `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`status`='contact'",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));



		$bdc_sold_leads=array_map(function($element){return $element['LeadSold']['contact_id'];}, $bdc_sold_leads);
		return array($total_counts,$all_leads,$bdc_sold_leads);
	}

	public function lead_logs()
	{

		$custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);


		$this->layout='default_worksheet2';
		if($this->request->is('post')||$this->request->is('ajax'))
		{
			$leads=explode(',',$this->request->data['leads']);
			$this->loadModel('BdcLead');
			//pr($leads);
			$h_fields=array('History.h_type','History.sperson','History.sales_step','History.status','History.comment','History.modified','History.id');
			$this->Contact->unbindModelAll();
			$this->Contact->bindModel(array('hasMany'=>array('History'=>array('Class'=>'History','fields'=>$h_fields,'order'=>array('History.id'=>'DESC')))));
			$fields=array('Contact.id','Contact.first_name','Contact.last_name','Contact.mobile','Contact.condition','Contact.year','Contact.make','Contact.model','Contact.sperson','Contact.sales_step','Contact.modified','Contact.modified_full_date','Contact.status','Contact.notes');
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

	public function bdc_rep_report($show_group=null)
	{
		$this->layout = null;
		list($report_results,$status_result,$top_status_json,$question_dealer_count,$user_question_per,$survy_ids,$user_wise_survey,$total_days)=$this->_bdcrep_report($show_group);

		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','survy_ids','user_wise_survey','total_days'));
	}

	public function crmreport_bdc_rep_report($show_group=null)
	{
		$this->layout = null;
		$this->view='bdc_rep_report';
		list($report_results,$status_result,$top_status_json,$question_dealer_count,$user_question_per,$survy_ids,$user_wise_survey,$total_days)=$this->_bdcrep_report($show_group);

		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','survy_ids','user_wise_survey','total_days'));
	}

	public function bdcapp_bdc_rep_report($show_group=null)
	{
		$this->layout = null;
		$dealer_id = $this->Auth->user('dealer_id');
		$ridenow_dealers = array(263);
		if(in_array($dealer_id,$ridenow_dealers)){
			$this->view= 'ridenow_csr_report';
		}else{
			$this->view='bdc_rep_report';
		}

		list($report_results,$status_result,$top_status_json,$question_dealer_count,$user_question_per,$survy_ids,$user_wise_survey,$total_days)=$this->_bdcrep_report($show_group);

		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','survy_ids','user_wise_survey','total_days'));
	}

	private function _bdcrep_report($show_group=null){

		$user_id[] = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		if(in_array($this->Auth->user('dealer_id'),array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
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
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}
		$this->loadModel('BdcSurvey');
		$report_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,

		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		count(distinct(`BdcSurvey`.`bdc_lead_id`)) as unique_leads,
		SUM(if( `BdcSurvey`.`status`= 'contact',CAST(`BdcSurvey`.`duration` AS DECIMAL),0)) AS avg_time,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.$modified_date_field), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.$modified_date_field, 1, 0)) AS sold_leads

		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN contacts `Contact` ON BdcSurvey.bdc_lead_id = `Contact`.id
		WHERE  `BdcSurvey`.`dealer_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND  `BdcSurvey`.`survey_id`=2
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);

		$total_days=date('d',$last_day_this_month);
		$this->loadModel('BdcStatus');

		//$status_list=$this->BdcSurvey->find('list',array('fields'=>'BdcSurvey.c_status,COUNT(BdcSurvey.c_status) '));
		//pr($status_list);
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` IN($user_ids,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC LIMIT 5",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//pr($status_result);
		//die;
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")'
		);

        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 5'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
        foreach ($top_status as $status) {
            $final_data[] = array(
                $status['BdcStatus']['name'],
                (int) $status[0]['count']
            );
        }
        $top_status_json = array($final_data);

		$this->loadModel('SurveyAnswer');
		$conditions_survey=$conditions;
		$conditions_survey['BdcSurvey.status']='contact';
		//Find list of all contacted survey
		$survy_ids=$this->BdcSurvey->find('list',array('fields'=>'id,user_id','conditions'=>$conditions_survey));
		// make all survey ids user wise
		$user_wise_survey=array();
		foreach ($survy_ids as $key=>$val)
		{
			$user_wise_survey[$val][]=$key;
		}

		// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(trim(`SurveyAnswer`.`answer`)  REGEXP 'Yes$', 1, 0)) AS yes_count",
				"SUM(if(trim(`SurveyAnswer`.`answer`)  REGEXP 'No$', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array(
            '`SurveyAnswer`.`bdc_survey_id`'=>array_keys($survy_ids),
        );
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question' => array('conditions' => array('Question.q_options' => 'yes,no')))));
		$question_dealer_count['yes_no']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));

		// Find the average for one survey question
		$answer_cond1=$answer_cond;
		$answer_cond1['`SurveyAnswer`.`answer` !=']='';
        $this->loadModel('Question');
        $question_ids = $this->Question->find('list',array('fields'=>array('id'),'conditions'=>array('Question.q_options'=>'yes,no','survey_id'=>2)));
		$answer_cond1['`SurveyAnswer`.`question_id`']= $question_ids;
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question' => array('conditions' => array('Question.q_options' => 'yes,no')))));
		$question_dealer_count['avg']=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
		$user_question_per=array();
		foreach($user_wise_survey as $u_id=>$u_s_ids)
		{
			$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$u_s_ids);
			$answer_cond1=$answer_cond;
			$answer_cond1['`SurveyAnswer`.`answer` !=']='';
			$answer_cond1['`SurveyAnswer`.`question_id`']= $question_ids;
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question' => array('conditions' => array('Question.q_options' => 'yes,no')))));
			$user_s_count=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question' => array('conditions' => array('Question.q_options' => 'yes,no')))));
			$user_s_count1=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
			$user_question_per[$u_id]['yes_no']=$user_s_count;
			$user_question_per[$u_id]['avg']=$user_s_count1;
		}

		return array($report_results,$status_result,$top_status_json,$question_dealer_count,$user_question_per,$survy_ids,$user_wise_survey,$total_days);
	}

	public function sales_person_report($show_group=null)
	{
		$this->layout = null;

		list($total_counts,$all_leads,$report_results,$status_result,$top_status_json,$question_dealer_count,$bdc_survey_ids,$user_wise_survey,$bdc_sold_leads,$user_question_per)=$this->_salesperson_report($show_group);
		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','bdc_survey_ids','user_wise_survey','bdc_sold_leads','user_question_per'));
	}

	public function crmreport_sales_person_report($show_group=null)
	{
		$this->layout = null;
		$this->view='sales_person_report';

		list($total_counts,$all_leads,$report_results,$status_result,$top_status_json,$question_dealer_count,$bdc_survey_ids,$user_wise_survey,$bdc_sold_leads,$user_question_per)=$this->_salesperson_report($show_group);

		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','bdc_survey_ids','user_wise_survey','bdc_sold_leads','user_question_per'));
	}

	public function bdcapp_sales_person_report($show_group=null)
	{
		$this->layout = null;
		$this->view='sales_person_report';

		list($total_counts,$all_leads,$report_results,$status_result,$top_status_json,$question_dealer_count,$bdc_survey_ids,$user_wise_survey,$bdc_sold_leads,$user_question_per)=$this->_salesperson_report($show_group);

		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','bdc_survey_ids','user_wise_survey','bdc_sold_leads','user_question_per'));
	}

		public function month_export($export='no',$lead_type='contact')
		{
			$this->layout=false;
			$this->_bdc_month_export($export,$lead_type);
		}

		public function bdcapp_month_export($export='no',$lead_type='contact')
		{
			$this->layout=false;
			$this->view = 'month_export';
			$this->_bdc_month_export($export,$lead_type);

		}

	private function _bdc_month_export($export='no',$lead_type='contact')
	{

		$this->layout=false;
		//$this->autoRender=false;
		$sold_lead_offset = 7;
		$sales_step_cond = array(1,10);
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		if(in_array($dealer_id,array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
		$zone = $this->Auth->User('zone');
		$survey_id=2;
		date_default_timezone_set($zone);
		$past_date_check = date('Y-m-d',strtotime('-6 months'));
		$past_date_check = $past_date_check." 00:00:00";
		$stats_month=date('m');
		//last month stat
		$last_month=date('m',strtotime('-1 month'));
		$first_day_last_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$last_month."-01"));
		$last_day_last_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$last_month."-01"));
		//first month
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->loadModel('LeadStatus');
		$this->loadModel('LeadSold');
		if($lead_type=='sold')
		{
			$survey_id=array(3,4);
		}
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'')));
		$dnc_number_list = array('0000000000','1111111111');

		$this->loadModel('BdcSurvey');
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array('c_status'=>array(6,43),'latest'=>'yes','dealer_id'=>$dealer_id,'created >='=> $past_date_check,'survey_id'=>array(2,3,4))));
$fields = array(
			'BdcLead.id',
			'BdcLead.first_name',
			'BdcLead.last_name',
			'ContactStatus.name',
			'BdcLead.type',
			'BdcLead.condition',
			'BdcLead.year',
			'BdcLead.make',
			'BdcLead.model',
			'BdcLead.modified_full_date',
			'BdcLead.modified',
			'BdcLead.mobile',
			'BdcLead.phone',
			'BdcLead.address',
			'BdcLead.city',
			'BdcLead.state',
			'BdcLead.zip',
			'BdcLead.email',
			'BdcLead.lead_status',
			'BdcLead.status',
			'BdcLead.sperson',
			'BdcLead.notes',
			'BdcLead.chk_duplicate',
			'BdcLead.created',
			'BdcLead.step_modified',
			'DATEDIFF(NOW(),BdcLead.created) AS days',

		);
		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'bdc_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$filter_array['contact_list']=$contact_list;
		$filter_array['nocontact_list']=$nocontact_list;
		$filter_array['callback_list']=$callback_list;
		$filter_array['bad_list']=$bad_list;
		$filter_array['voice_list']=$voice_list;



//////////////
		if($lead_type=='contact')
		{
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');

		$pre_conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'NOT'=>array('BdcLead.status' => $lead_statuses,'BdcLead.sales_step' =>$sales_step_cond),
			'BdcLead.'.$modified_date_field.' >=' => $first_day_this_month,
			'BdcLead.'.$modified_date_field.' <=' => $last_day_this_month,
			'BdcLead.bdc_inavlid' =>0
            );

			if(!empty($not_show_leads)){
			$pre_conditions['NOT']['BdcLead.id']=$not_show_leads;
		}
		$pre_conditions['BdcLead.company_id'] = $dealer_id;
		$pre_conditions['NOT']['BdcLead.dnc_status'] = array('not_call','no_call_email');
		$pre_conditions['NOT']['BdcLead.source'] = array('Dealer Spike - Employment');
		$pre_conditions['NOT']['IFNULL(BdcLead.mobile,1)']  = $dnc_number_list;
		$pre_conditions['NOT']['IFNULL(BdcLead.phone,1)'] = $dnc_number_list;
		//$pre_conditions['NOT']['BdcLead.work_number'] = $dnc_number_list;
		$last_pre_conditions=$pre_conditions;
		$last_pre_conditions['BdcLead.'.$modified_date_field.' >=']=$first_day_last_month;
		$last_pre_conditions['BdcLead.'.$modified_date_field.' <=']=$last_day_last_month;
		$pre_contacts = $this->BdcLead->find('all', array('fields'=>$fields,'conditions' => $pre_conditions));
		$last_pre_contacts = $this->BdcLead->find('all', array('fields'=>$fields,'conditions' => $last_pre_conditions));
		$seprate_contacts= $this->_filter_leads($pre_contacts,$filter_array);
		$last_seprate_contacts= $this->_filter_leads($last_pre_contacts,$filter_array);
		}else{
			///////// Sold
			$start_date = strtotime("-2 months");
			$start_date = date("Y-m-d 00:00:00",$start_date);
			$end_date = date("Y-m-d 23:59:59");
			$lead_ids=$this->LeadSold->find('list',array('fields'=>'LeadSold.id,LeadSold.contact_id','conditions'=>array('DATEDIFF(NOW(),LeadSold.created) >='=>$sold_lead_offset,'LeadSold.company_id'=>$dealer_id,'LeadSold.created >='=>$start_date,'LeadSold.created <='=>$end_date,)));

			$sold_conditions = array(
				'BdcLead.id' => $lead_ids,
				'BdcLead.bdc_inavlid' =>0
			//	'BdcLead.user_id' => $current_user_id,
				/*'BdcLead.status' => array('Sold/Rolled',' Sold/Rolled-Multi Vehicle'),
				'DATEDIFF(NOW(),BdcLead.modified) >=' => 14,*/
				//'BdcLead.modified <=' => $last_day_this_month
            );
		if(!empty($not_show_leads)){
			$sold_conditions['NOT']['BdcLead.id']=$not_show_leads;

		}
		$sold_conditions['BdcLead.company_id'] = $dealer_id;
		$sold_conditions['NOT']['BdcLead.dnc_status'] = array('not_call','no_call_email');
		$sold_conditions['NOT']['IFNULL(BdcLead.mobile,1)'] = $dnc_number_list;
		$sold_conditions['NOT']['IFNULL(BdcLead.phone,1)'] = $dnc_number_list;
	//	$sold_conditions['NOT']['BdcLead.work_number'] = $dnc_number_list;
		$sold_conditions['NOT']['BdcLead.source'] = array('Dealer Spike - Employment');
		$pre_conditions = $this->BdcLead->find('all', array('fields'=>$fields,'conditions' => $sold_conditions));
		$seprate_contacts= $this->_filter_leads($sold_contacts,$filter_array);
		$last_seprate_contacts= $this->_filter_leads(array(),$filter_array);
		}
		//this month
		$this->set('contacts', $seprate_contacts);
		$this->set('last_contacts', $last_seprate_contacts);
		$this->set('lead_type', $lead_type);
		if($export=='yes'){
		$html=$this->render('/Elements/bdc_month');
		$this->export($html);
		die;
		}

	}

	public function export($html,$name=''){
		App::import('Component', 'ExcelWriter');
		$excel = new ExcelWriterComponent();
		if(empty($name))
		{
			$name = time().'_BdcReport.xls';
		}
		if($excel==false){
			echo $objExcel->error;die;
		}else{
			$excel->stream($html,'/'.$name);
		}
	}
	//part lead excelexport

	public function part_month_export($export='no')
	{
		$this->layout=false;
		//$this->autoRender=false;
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=11;
		$this->loadModel('PartLeadsDms');
		$this->loadModel('DealerName');
		$this->loadModel('BdcSurvey');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$offset=2;
		if(!empty($dealer_info['DealerName']['service_day_offset']))
		{
			$offset=$dealer_info['DealerName']['service_day_offset'];
		}
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,part_lead_id','conditions'=>array('c_status'=>array(6,43),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		//$conditions=array('DATEDIFF(DATE(NOW()),ServiceLeadsDms.date_cash) >=' => $offset);
		$conditions['NOT']['PartLeadsDms.id']=$not_show_leads;
		$conditions['PartLeadsDms.dealer_id']=$dealer_id;
		$conditions['NOT']['PartLeadsDms.dnc_status']=array('not_call','no_call_email');
		$conditions['OR']['PartLeadsDms.before_tax_total >=']='250';
		$conditions['OR']['PartLeadsDms.counter_taxable_sales >=']='250';
		$conditions['OR']['PartLeadsDms.special_before_tax_total >=']='250';
		$conditions['PartLeadsDms.bdc_inavlid']=0;
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'')));
		$dnc_number_list = array('0000000000','1111111111');
		$conditions['NOT']['PartLeadsDms.work_phone'] = $dnc_number_list;
		$conditions['NOT']['PartLeadsDms.home_phone'] = $dnc_number_list;
		//$lead_count=$this->ServiceLeadsDms->find('count',array('conditions'=>$conditions));
		$all_leads=$this->PartLeadsDms->find('all',array('order'=>'modified desc','conditions'=>$conditions));

		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'part_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));

		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		foreach($all_leads as $contact)
		{
			if(in_array($contact['PartLeadsDms']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['PartLeadsDms']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact;
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}
		$this->set('contacts',$seprate_contacts);
		$this->set('offset',$offset);
		if($export=='yes'){
		$html=$this->render('/Elements/part_bdc_month');
		$this->export($html);
		die;
		}
	}



	public function service_month_export($export='no')
	{
		$this->layout=false;
		//$this->autoRender=false;
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$survey_id=5;
		$this->loadModel('ServiceLeadsDms');
		$this->loadModel('DealerName');
		$this->loadModel('BdcSurvey');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$offset=2;
		if(!empty($dealer_info['DealerName']['service_day_offset']))
		{
			$offset=$dealer_info['DealerName']['service_day_offset'];
		}
		$not_show_leads=$this->BdcSurvey->find('list',array('fields'=>'id,service_lead_id','conditions'=>array('c_status'=>array(6,43),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>5)));
		$conditions=array('DATEDIFF(DATE(NOW()),ServiceLeadsDms.date_cash) >=' => $offset);
		$conditions['NOT']['ServiceLeadsDms.id']=$not_show_leads;
		$conditions['ServiceLeadsDms.dealer_id']=$dealer_id;
		$conditions['NOT']['ServiceLeadsDms.dnc_status']=array('not_call','no_call_email');
		$conditions['ServiceLeadsDms.bdc_inavlid']=0;
		//$this->loadModel('DncNumberList');
		//$dnc_number_list=$this->DncNumberList->find('list',array('fields'=>'id,phone_no','conditions'=>array('phone_no !='=>'')));
		$dnc_number_list = array('0000000000','1111111111');
		$conditions['NOT']['ServiceLeadsDms.work_phone'] = $dnc_number_list;
		$conditions['NOT']['ServiceLeadsDms.home_phone'] = $dnc_number_list;
		//$lead_count=$this->ServiceLeadsDms->find('count',array('conditions'=>$conditions));
		$all_leads=$this->ServiceLeadsDms->find('all',array('order'=>'modified desc','conditions'=>$conditions));

		$contact_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$nocontact_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'no contact','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$callback_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'call back','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$bad_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>array('bad number','no number'),'latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));
		$voice_list=$this->BdcSurvey->find('list',array('fields'=>'service_lead_id','conditions'=>array('status'=>'voicemail','latest'=>'yes','dealer_id'=>$dealer_id,'survey_id'=>$survey_id)));

		$seprate_contacts['new']=array();
		$seprate_contacts['contact']=array();
		$seprate_contacts['no_contact']=array();
		$seprate_contacts['bad_number']=array();
		$seprate_contacts['voicemail']=array();
		$seprate_contacts['call_back']=array();
		foreach($all_leads as $contact)
		{
			if(in_array($contact['ServiceLeadsDms']['id'],$contact_list))
			{
				$seprate_contacts['contact'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$nocontact_list))
			{
				$seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$bad_list))
			{
				$seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$voice_list))
			{
				$seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['ServiceLeadsDms']['id'],$callback_list))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$seprate_contacts['call_back'][]=$contact;
			}
			else
			{
				$seprate_contacts['new'][]=$contact;
			}

		}
		$this->set('contacts',$seprate_contacts);
		$this->set('offset',$offset);
		if($export=='yes'){
		$html=$this->render('/Elements/service_bdc_month');
		$this->export($html);
		die;
		}
	}

	private function _filter_leads($all_leads=array(),$filter_array=array())
	{
		$last_seprate_contacts['new']=array();
		$last_seprate_contacts['contact']=array();
		$last_seprate_contacts['no_contact']=array();
		$last_seprate_contacts['bad_number']=array();
		$last_seprate_contacts['voicemail']=array();
		$last_seprate_contacts['call_back']=array();
		foreach($all_leads as $contact)
		{
			if(in_array($contact['BdcLead']['id'],$filter_array['contact_list']))
			{
				$last_seprate_contacts['contact'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$filter_array['nocontact_list']))
			{
				$last_seprate_contacts['no_contact'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$filter_array['bad_list']))
			{
				$last_seprate_contacts['bad_number'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$filter_array['voice_list']))
			{
				$last_seprate_contacts['voicemail'][]=$contact;
			}
			elseif(in_array($contact['BdcLead']['id'],$filter_array['callback_list']))
			{
				//$seprate_contacts['call_back'][]=$contact;
				$last_seprate_contacts['call_back'][]=$contact;
			}
			else
			{
				$last_seprate_contacts['new'][]=$contact;
			}

		}
		return $last_seprate_contacts;

	}


	private function _salesperson_report($show_group=null)
	{

		$user_id[] = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		if(in_array($this->Auth->user('dealer_id'),array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
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
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}
		$this->loadModel('LeadStatus');
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');

		$this->loadModel('BdcSurvey');

		// Bdc Main report stats

		$fields=array('BdcSurvey.*','BdcLead.id','BdcLead.sales_step','BdcLead.modified');

		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$conditions = array(

		//	'BdcLead.user_id' => $current_user_id,
			'Contact.sales_step !=' => '1',
			/*'User.group_id' => $this->Contact->ReportUserGroups,*/
			'NOT'=>array('Contact.status' => $lead_statuses),
			'Contact.'.$modified_date_field.' >=' => $first_day_this_month,
			'Contact.'.$modified_date_field.' <=' => $last_day_this_month,
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

		// Bdc Sales Person report
		$report_results = $this->BdcSurvey->query("
		SELECT
		`Contact`.`user_id`,
		`BdcSurvey`.`status`,

		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.$modified_date_field, 1, 0)) AS sold_leads

		FROM `contacts` AS `Contact`
		LEFT JOIN users `User` ON Contact.user_id = `User`.id
		RIGHT JOIN `bdc_surveys` `BdcSurvey` ON `Contact`.id=BdcSurvey.bdc_lead_id
		WHERE  `BdcSurvey`.`dealer_id` IN ($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes' AND `BdcSurvey`.`survey_id`=2
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		$this->loadModel('BdcStatus');

		$bdc_sold_leads=$this->BdcSurvey->query("select LeadSold.id,LeadSold.contact_id from bdc_surveys AS BdcSurvey RIGHT JOIN lead_solds LeadSold ON BdcSurvey.`bdc_lead_id`=`LeadSold`.`contact_id` AND `BdcSurvey`.`modified` <= `LeadSold`.`modified` where `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` IN ($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`status`='contact'",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		$bdc_sold_leads=array_map(function($element){return $element['LeadSold']['contact_id'];}, $bdc_sold_leads);

		//$status_list=$this->BdcSurvey->find('list',array('fields'=>'BdcSurvey.c_status,COUNT(BdcSurvey.c_status) '));
		//pr($status_list);
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` IN ($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` IN ($user_ids,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//pr($status_result);
		//die;
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")'
		);

        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 5'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
        foreach ($top_status as $status) {
            $final_data[] = array(
                $status['BdcStatus']['name'],
                (int) $status[0]['count']
            );
        }
        $top_status_json = array($final_data);

		$this->loadModel('SurveyAnswer');
		$conditions_survey=$conditions;
		$conditions_survey['BdcSurvey.status']='contact';
		//Find list of all contacted survey
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$survy_ids=$this->BdcSurvey->find('all',array('fields'=>'BdcSurvey.id,BdcLead.user_id','conditions'=>$conditions_survey));

		// make all survey ids user wise
		$user_wise_survey=array();
		$bdc_survey_ids=array();
		foreach ($survy_ids as $val)
		{
			$bdc_survey_ids[]=$val['BdcSurvey']['id'];
			$user_wise_survey[$val['BdcLead']['user_id']][]=$val['BdcSurvey']['id'];
		}

		// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^Yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^No', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$bdc_survey_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['yes_no']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));

		// Find the average for one survey question
		$answer_cond1=$answer_cond;
		$answer_cond1['`SurveyAnswer`.`answer` !=']='';
		$answer_cond1['`SurveyAnswer`.`question_id`']=29;
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['avg']=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
		$user_question_per=array();
		foreach($user_wise_survey as $u_id=>$u_s_ids)
		{
			$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$u_s_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
			$answer_cond1=$answer_cond;
			$answer_cond1['`SurveyAnswer`.`answer` !=']='';
			$answer_cond1['`SurveyAnswer`.`question_id`']=29;
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count1=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
			$user_question_per[$u_id]['yes_no']=$user_s_count;
			$user_question_per[$u_id]['avg']=$user_s_count1;
		}


		return array($total_counts,$all_leads,$report_results,$status_result,$top_status_json,$question_dealer_count,$bdc_survey_ids,$user_wise_survey,$bdc_sold_leads,$user_question_per);
	}

	public  function saleperson_pdf_report()
		{
			//$this->layout=null;
		date_default_timezone_set('America/Los_Angeles');
		$unix_time = strtotime("-9 hour");

		$this->autoRender=false;
		$this->layout = null;
		$dealer_names=$this->User->find('list',array('fields'=>'dealer_id,dealer','group'=>'dealer_id'));
		// get Month
		$get_day=date('d');
		$stats_month = date('m');
		if($stats_month=='01')
		{
				if($stats_month=='01')
				{
					$stats_month = 12;
				}else
				{
					$stats_month--;
				}
		}


		$first_day_this_month = date('Y-m-1 00:00:00');
		//$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d H:i:s');


		$this->loadModel('RecapCronEmail');
		$dealer_emails=$this->RecapCronEmail->find('all');
		$dealer_info_array=array();
		$bdc_fields = array(
					'BdcLead.id',
					'BdcLead.first_name',
					'BdcLead.full_name',
					'BdcLead.last_name',
					'BdcLead.type',
					'BdcLead.condition',
					'BdcLead.company_id',
					'BdcLead.year',
					'BdcLead.make',
					'BdcLead.model',
					'BdcLead.mobile',
					'BdcLead.phone',
					'BdcLead.email',
					'BdcLead.lead_status',
					'BdcLead.status',
					'BdcLead.sperson',
					'BdcLead.notes',
					'BdcLead.dnc_status',
					'BdcLead.sales_step',
					'BdcLead.work_number'

		);
		foreach($dealer_emails as $d_emails)
		{
			$dealer_info_array[$d_emails['RecapCronEmail']['dealer_id']][]=$d_emails['RecapCronEmail']['email'];
		}
		foreach($dealer_info_array as $d_id=>$d_s_emails)
		{
			//$testing++;
		$user_id = $d_id;
		//$user_id = 762;
		$this->loadModel('LeadStatus');
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');
		$this->loadModel('BdcSurvey');
		$fields=array('BdcSurvey.*','BdcLead.id','BdcLead.sales_step','BdcLead.modified');
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead'=>array('fields'=>$bdc_fields))));
		$conditions = array(
			'Contact.sales_step !=' => '1',
			'NOT'=>array('Contact.status' => $lead_statuses),
			'Contact.modified >=' => $first_day_this_month,
			'Contact.modified <=' => $last_day_this_month,
			'Contact.company_id'=>$user_id
            );
		$today_conditions = array(
			'Contact.sales_step !=' => '1',
			'NOT'=>array('Contact.status' => $lead_statuses),
			'DATE(Contact.modified)' => date('Y-m-d'),
			'Contact.company_id'=>$user_id
            );
		$today_conditions['NOT']['Contact.dnc_status'] = array('not_call','no_call_email');
		$conditions['NOT']['Contact.dnc_status'] = array('not_call','no_call_email');
		$all_leads = $this->Contact->find('list', array('fields'=>'Contact.id,Contact.id','conditions'=>$conditions));
		$today_leads = $this->Contact->find('list', array('fields'=>'Contact.id,Contact.id','conditions'=>$today_conditions));
		$today_count = count($today_leads);
		$leads=count($all_leads);
		$all_calls=$this->BdcSurvey->find('all',array('fields'=>$fields,'conditions'=>array('dealer_id'=>$user_id,'latest'=>'yes','BdcSurvey.created >='=>$first_day_this_month,'BdcSurvey.created <='=>$last_day_this_month,'BdcSurvey.survey_id'=>2)));
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead'=>array('fields'=>$bdc_fields))));
		$today_calls=$this->BdcSurvey->find('all',array('fields'=>$fields,'conditions'=>array('dealer_id'=>$user_id,'latest'=>'yes','DATE(BdcSurvey.created)'=>date('Y-m-d'),'BdcSurvey.survey_id'=>2)));
		if(empty($all_calls))
		{
			continue;
		}
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
		$today_total_count = $total_counts;
		$total_counts['total_ndf']=$leads;

		$today_total_count['total_ndf']=$today_count;
	  	$total_counts = $this->_bdc_daily_filter($all_calls,$total_counts);
		$today_total_count = $this->_bdc_daily_filter($today_calls,$today_total_count);

		$this->set('total_count',$total_counts);
		$this->set('all_leads',$all_leads);
		$this->set('today_leads',$today_leads);
		$this->set('today_total_count',$today_total_count);

		$bdc_sold_leads=$this->BdcSurvey->query("select LeadSold.id,LeadSold.contact_id from bdc_surveys AS BdcSurvey RIGHT JOIN lead_solds LeadSold ON BdcSurvey.`bdc_lead_id`=`LeadSold`.`contact_id` AND `BdcSurvey`.`modified` <= `LeadSold`.`modified` where `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`status`='contact'",array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		$bdc_sold_leads=array_map(function($element){return $element['LeadSold']['contact_id'];}, $bdc_sold_leads);
		$today_sold_leads=$this->BdcSurvey->query("select LeadSold.id,LeadSold.contact_id from bdc_surveys AS BdcSurvey RIGHT JOIN lead_solds LeadSold ON BdcSurvey.`bdc_lead_id`=`LeadSold`.`contact_id` AND `BdcSurvey`.`modified` <= `LeadSold`.`modified` where `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND DATE(`BdcSurvey`.`modified`) = :today_date AND `BdcSurvey`.`status`='contact'",array('user_id'=>$user_id,'today_date'=>date('Y-m-d')));
		$today_sold_leads=array_map(function($element){return $element['LeadSold']['contact_id'];}, $bdc_sold_leads);
		$this->set(compact('today_sold_leads','bdc_sold_leads','dealer_names','user_id'));

		$this->loadModel('BdcStatus');
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")'
		);

        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 10'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
		$total_status_count = 0;
        foreach ($top_status as $status) {
			$s_key = $status['BdcStatus']['name'].' ('.$status[0]['count']. ')';
            $final_data[$s_key] = (int) $status[0]['count'];
			$total_status_count +=$status[0]['count'];
        }




		$html=$this->render('/Elements/sales_person_report_pdf');
		//$htmlArray=explode("############################",$html);
			App::import('Vendor','SVGGraph/SVGGraph');
			App::import('Vendor','tcpdf/tcpdf');
		  	$settings = array(
			  'back_colour' => '#eee',   'stroke_colour' => '#000',
			  'back_stroke_width' => 0,  'back_stroke_colour' => '#eee',
			  'show_labels' => true,     'show_label_amount' => false,
			  'label_font' => 'Georgia', 'label_font_size' => '11',
			  'legend_entries'=>array_keys($final_data),
			  'show_label_percent'=>true,
			  'label_colour' => '#000',
			  'graph_title'=>'Top 10 Customer Statuses ('.$total_status_count.')', 'graph_title_font' => 'Georgia',
			  'graph_title_font_size'=>14,'graph_title_font_weight'=>'bold',
			  'sort' => false,
			  'legend_font_size' =>8,
			  'legend_entry_width' => 16,
			  'legend_entry_height' => 16,
			 // 'legend_position' => "outer right 10 2"
			);

			$colours = array('#EDC240','#4DA74D','#CB4B4B','#AFD8F8','#0f3','#339','#BCA9E8','#E8A9D5','#81CADE','#ADA144');
			$links = array('Dough' => 'jpegsaver.php', 'Ray' => 'crcdropper.php',
			  'Me' => 'svggraph.php');

			$graph = new SVGGraph(900, 400, $settings);
			$graph->colours = $colours;

			$graph->Values($final_data);
			//$graph->Links($links);
			$graphData=$graph->Fetch('PieGraph');

			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Tod Kilgore');
			$pdf->SetSubject('Daily Report ('.date('m/d/Y', $unix_time).')');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			$pdf->SetHeaderData('DealershipPerformance_FinalLogo.jpg', 30, 'Daily Report ('.date('m/d/Y').')', "Dealership Performance 360 crm", array(75,168,211), array(75,168,211));
			$pdf->setFooterData(array(0,64,0), array(0,64,128));

			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			$pdf->SetMargins(5, PDF_MARGIN_TOP, 5);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			$pdf->SetFont('helvetica', '', 10);



			// output the HTML content
			$pdf->AddPage();
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->ImageSVG('@'.$graphData, -60,78, $w='270', $h='185');

			if (!file_exists(APP.'webroot/files/bdc_reports/dealer_'.$user_id)) {
   				mkdir(APP.'webroot/files/bdc_reports/dealer_'.$user_id, 0777, true);
			}
			$filepath=APP.'webroot/files/bdc_reports/dealer_'.$user_id.'_bdc_salesperson_report_'.date('Y_m_d',$unix_time).'.pdf';

			$pdf->Output($filepath, 'F');

			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->config('sender');
			$email->from('sender@dp360crm.com');
			$email->attachments($filepath);
			$email->viewVars(array('unix_time'=>$unix_time));
			$email->template('sales_person_report_email')
					->emailFormat('html')
					->subject('BDC Daily Report')
					->to(array('ss737207@gmail.com','andrew@dp360crm.com'))
					->send();
			die;

		}
			die;



		}


		public function bdc_csr_report_pdf()
		{

		$this->layout = null;
		$dealer_names=$this->User->find('list',array('fields'=>'dealer_id,dealer','group'=>'dealer_id'));
		// get Month


		$first_day_this_month = date('Y-m-01 00:00:00');

		$last_day_this_month  = date('Y-m-t 23:59:59');

		$s_conditions = array(
					'BdcSurvey.survey_id' => 3,
					'BdcSurvey.created >=' => $first_day_this_month,
					'BdcSurvey.created <=' => $last_day_this_month,
					'BdcSurvey.status' => 'contact',
					'BdcSurvey.latest' => 'yes',
					'BdcSurvey.dealer_id' => $dealer_id
		);
		$this->loadModel('BdcSurvey');
		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		foreach($freedom_group as $dealer_id){

		$s_conditions = array(
					'BdcSurvey.survey_id' => 3,
					'BdcSurvey.created >=' => $first_day_this_month,
					'BdcSurvey.created <=' => $last_day_this_month,
					'BdcSurvey.status' => 'contact',
					'BdcSurvey.latest' => 'yes',
					'BdcSurvey.dealer_id' => $dealer_id
		);
		$survey_ids = $this->BdcSurvey->find('list',array('fields' => 'id,id','conditions' => $s_conditions));

		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^Yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^No', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>array_keys($survey_ids),'`SurveyAnswer`.`question_id`'=>array(39));
		$this->loadModel('SurveyAnswer');
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count[$dealer_id]['stats']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
		$question_dealer_count[$dealer_id]['all_survey'] = count($survey_ids) ;
		}

		App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->config('support');
			$email->from('sender@dp360crm.com');

			$email->viewVars(array('dealer_names'=>$dealer_names,'data'=>$question_dealer_count));
			$email->template('question_stats')
					->emailFormat('html')
					->subject('Question stats')
					->to(array('ss737207@gmail.com','andrew@dp360crm.com'))
					->send();
		echo '<pre>';
		print_r($question_dealer_count);
		echo '</pre>';
		die;

		$this->loadModel('RecapCronEmail');
		$dealer_emails=$this->RecapCronEmail->find('all');
		$dealer_info_array=array();
		foreach($dealer_emails as $d_emails)
		{
			$dealer_info_array[$d_emails['RecapCronEmail']['dealer_id']][]=$d_emails['RecapCronEmail']['email'];
		}
		foreach($dealer_info_array as $d_id=>$d_s_emails){


		$user_id = $d_id;
		$this->loadModel('BdcSurvey');
		$report_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,

		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		count(distinct(`BdcSurvey`.`bdc_lead_id`)) as unique_leads,
		SUM(if( `BdcSurvey`.`status`= 'contact',CAST(`BdcSurvey`.`duration` AS DECIMAL),0)) AS avg_time,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.`modified`, 1, 0)) AS sold_leads

		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN contacts `Contact` ON BdcSurvey.bdc_lead_id = `Contact`.id
		WHERE ".$this->Contact->ReportUserGroupQuery." `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND  `BdcSurvey`.`survey_id`=2
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		if(empty($report_results))
		{
			continue;
		}
		$total_days=date('d',$last_day_this_month);
		$this->loadModel('BdcStatus');

		//$status_list=$this->BdcSurvey->find('list',array('fields'=>'BdcSurvey.c_status,COUNT(BdcSurvey.c_status) '));
		//pr($status_list);
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` in (:user_id,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC ",array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//pr($status_result);
		//die;
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")'
		);

        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 5'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
        foreach ($top_status as $status) {
            $final_data[$status['BdcStatus']['name']] = (int) $status[0]['count'];
        }
        //$top_status_json = array($final_data);

		$this->loadModel('SurveyAnswer');
		$conditions_survey=$conditions;
		$conditions_survey['BdcSurvey.status']='contact';
		//Find list of all contacted survey
		$survy_ids=$this->BdcSurvey->find('list',array('fields'=>'id,user_id','conditions'=>$conditions_survey));
		// make all survey ids user wise
		$user_wise_survey=array();
		foreach ($survy_ids as $key=>$val)
		{
			$user_wise_survey[$val][]=$key;
		}

		// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^Yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^No', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>array_keys($survy_ids),'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['yes_no']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));

		// Find the average for one survey question
		$answer_cond1=$answer_cond;
		$answer_cond1['`SurveyAnswer`.`answer` !=']='';
		$answer_cond1['`SurveyAnswer`.`question_id`']=29;
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['avg']=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
		$user_question_per=array();
		foreach($user_wise_survey as $u_id=>$u_s_ids)
		{
			$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$u_s_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
			$answer_cond1=$answer_cond;
			$answer_cond1['`SurveyAnswer`.`answer` !=']='';
			$answer_cond1['`SurveyAnswer`.`question_id`']=29;
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count1=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
			$user_question_per[$u_id]['yes_no']=$user_s_count;
			$user_question_per[$u_id]['avg']=$user_s_count1;
		}
		//pr($question_dealer_count);
		$this->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','survy_ids','user_wise_survey','total_days','dealer_names','user_id'));

		$html=$this->render('/Elements/bdc_csr_report_pdf');
		$html=preg_replace('/\s\s\s+/',' ',$html);
		$htmlArray=explode("############################",$html);
			App::import('Vendor','SVGGraph/SVGGraph');
			App::import('Vendor','tcpdf/tcpdf');
		  	$settings = array(
			  'back_colour' => '#eee',   'stroke_colour' => '#000',
			  'back_stroke_width' => 0,  'back_stroke_colour' => '#eee',
			  'show_labels' => true,     'show_label_amount' => false,
			  'label_font' => 'Georgia', 'label_font_size' => '11',
			  'legend_entries'=>array_keys($final_data),
			  'show_label_percent'=>true,
			  'label_colour' => '#000',
			  'graph_title'=>'Top 5 Customer Statuses', 'graph_title_font' => 'Georgia',
			  'graph_title_font_size'=>14,'graph_title_font_weight'=>'bold',
			  'sort' => false
			);

			$colours = array('#EDC240','#4DA74D','#CB4B4B','#AFD8F8','#0f3','#339');
			$links = array('Dough' => 'jpegsaver.php', 'Ray' => 'crcdropper.php',
			  'Me' => 'svggraph.php');

			$graph = new SVGGraph(900, 400, $settings);
			$graph->colours = $colours;

			$graph->Values($final_data);
			//$graph->Links($links);
			$graphData=$graph->Fetch('PieGraph');

			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// add a page
			/*$pdf->AddPage();

			$pdf->ImageSVG('@'.$graphData, $x=-5, $y=30, $w='200', $h='190');*/
			// output the HTML content
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[0], true, false, true, false, '');
			$pdf->Image(APP.'/webroot/img/dealership-performance-logo.jpg', $x=47, $y=8,$w='110', $h='19');
			//$pdf->endPage();

			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[1], true, false, true, false, '');
			//$pdf->endPage();

			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[2], true, false, true, false, '');
			$pdf->ImageSVG('@'.$graphData, $x=-35, $y=30, $w='240', $h='225');
			//$pdf->endPage();


			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[3], true, false, true, false, '');

			for($page=4;$page<count($htmlArray);$page++)
			{
				$pdf->AddPage();
				$pdf->writeHTML($htmlArray[$page], true, false, true, false, '');
			}
			$pdf->deletePage($page);

			if (!file_exists(APP.'webroot/files/bdc_reports/dealer_'.$user_id)) {
   				mkdir(APP.'webroot/files/bdc_reports/dealer_'.$user_id, 0777, true);
			}
			$filepath=APP.'webroot/files/bdc_reports/dealer_'.$user_id.'/'.$user_id.'_bdc_csr_report_'.date('Y_m',strtotime($first_day_this_month)).'.pdf';
			$pdf->Output($filepath, 'F');

		}
		die;

		}

	public function check_duplicate_status($histories, $new_history){
    	$duplicate = false;
    	if(!empty($histories)){
	    	foreach($histories as $key => $his){
	    		if(
	    			($his['History']['sperson'] == $new_history['History']['sperson']  &&
	    			$his['History']['sales_step'] == $new_history['History']['sales_step']  &&
	    			$his['History']['status'] == $new_history['History']['status']  &&
	    			$his['History']['cond'] == $new_history['History']['cond']  &&
	    			$his['History']['comment'] == $new_history['History']['comment']) ||

	    			($his['History']['created'] == $new_history['History']['created'])
	    		){
	    			return $key;
	    		}
	    	}
    	}
    	return $duplicate;
    }

	public function get_dealer_steps(){
		$dealer_id = $this->Auth->User('dealer_id');
		$step_procces = $this->Auth->User('step_procces');

		$this->loadModel('StepDefinition');
		$current_definition = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.dealer_id'=> $dealer_id ) ));
		$step_map = array();
		foreach($current_definition as $cd){
			$step_map[ $cd['StepDefinition']['step_id'] ] = $cd['StepDefinition'];
		}
		//debug($step_map);

		$this->loadModel('SalesStep');
		$step_cond = array();
		if($step_procces == 'lemco_steps'){
			$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		}else{
			$step_cond = array('SalesStep.step_process'=>'hd_steps');
		}
		$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		//debug( $sales_steps );

		$sales_step_options_popup = array();
		foreach($sales_steps as $sales_step){

			$step_label =  $sales_step['SalesStep']['step'];

			if(isset( $step_map[  $sales_step['SalesStep']['id']  ]    )){
				$step_label = $step_map[  $sales_step['SalesStep']['id']  ]['custom_name'];
				if( !$step_map[  $sales_step['SalesStep']['id']  ]['visible']  ){
					continue;
				}
			}
			$sales_step_options_popup [ $sales_step['SalesStep']['id'] ] =  $step_label;
		}

		return  $sales_step_options_popup;


	}

	public function bdcapp_bdc_invalid_lead($id)
	{
		$this->_set_invalid_lead($id);
	}

	public function bdc_invalid_lead($id)
	{
		$this->_set_invalid_lead($id);
	}

	private function _set_invalid_lead($id)
	{
		$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
	$this->layout = false;
	$this->autoRender = false;
	$this->BdcLead->id = $id;
	if($this->BdcLead->saveField('bdc_inavlid','1'))
	{
	//$this->BdcLead->id = $id;
	$this->BdcLead->saveField('bdc_invalid_date' , date('Y-m-d H:i:s'));
	$history_data = array();
	$history_data['contact_id'] = 		$id;
	$history_data['cond'] = 			"BDC Invalid Lead";
	$history_data['user_id']=  			$this->Auth->user('id');
	$history_data['status'] = 			$this->Auth->user('first_name').' '.$this->Auth->user('last_name').' Set the lead as BDC invalid';
	$history_data['comment'] = 			'Lead set as BDC Invalid';
	$history_data['h_type'] = 			"BDC Invalid";
	$history_data['sales_step'] = 		"BDC Invalid";
	$history_data['sperson'] = 			$this->Auth->user('full_name');
	$history_data['modified']=    date('D - M d,Y h:i A');
	//$history_data['event_id'] = 		$bdc_survey_id;
	$history = array(
		'History' => $history_data
	);
	$this->History->create();
	$this->History->save($history);
	echo 'chnaged status';
	}
	else
	echo $id.'not saved';
	die;
	}

public function part_invalid_lead($id)
{
	$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
	$this->loadModel('PartLeadsDms');
	$this->layout = false;
	$this->autoRender = false;
	$this->PartLeadsDms->id = $id;
	$this->PartLeadsDms->save(array('bdc_inavlid' => '1','bdc_invalid_date' => date('Y-m-d H:i:s')));
	die;
}

public function service_invalid_lead($id)
{
	$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
	$this->loadModel('ServiceLeadsDms');
	$this->layout = false;
	$this->autoRender = false;
	$this->ServiceLeadsDms->id = $id;
	$this->ServiceLeadsDms->save(array('bdc_inavlid' => '1','bdc_invalid_date' => date('Y-m-d H:i:s')));
	die;
}

private function _get_bdc_status()
{

		$this->loadModel('BdcStatus');

		$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309);
		$freedom_not_show = array("Duplicate Customer","Customer Busy-Call Back 2nd","Customer Busy-Call Back 3rd","Customer Busy-Call Back-Voice Mail","Customer Busy-Call Back-Refuses Survey","Appointment for Call Back","No appointment for call back","Bad Credit - Turndown","Customer Called BDC","Dealer-Price too high","Did Not Purchase","Not In Dealership","Unavailable At this time","Vehicle Not In Stock","Customer Disconnected Call","Customer Attending","Customer Not Attending","Lead","Remove From List","No Longer Working with Sales Person","No Answer-3rd","3rd-Left Follow-Up Message");
		$dealer_id = $this->Auth->user('dealer_id');
		$conditions = array('BdcStatus.status_type'=>'crm_leads','BdcStatus.dealer_id'=>array(0,$dealer_id));
		if(in_array($dealer_id,$freedom_group))
		{
			$conditions['NOT']['name'] = $freedom_not_show;
		}
		$this->BdcStatus->virtualFields=array('header_id'=>'CONCAT(status_id,"_",id)');
		$bdc_status=$this->BdcStatus->find('list',array('fields'=>'header_id,name','conditions'=>$conditions));
		$bdc_statuses=array();
		foreach($bdc_status as $key=>$val)
		{

			if(preg_match('/^contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['contact'][$match[1]]=$val;
			}
			elseif(preg_match('/^no contact_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_contact'][$match[1]]=$val;
			}elseif(preg_match('/^bad number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['bad_number'][$match[1]]=$val;
			}elseif(preg_match('/^voicemail_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['voicemail'][$match[1]]=$val;
			}elseif(preg_match('/^call back_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['call_back'][$match[1]]=$val;
			}
			elseif(preg_match('/^no number_([0-9]+)$/',$key,$match))
			{
				$bdc_statuses['no_number'][$match[1]]=$val;
			}
		}
		return $bdc_statuses;
}

private function _bdc_daily_filter($all_calls =array(), $total_counts = array() )
{
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
		return $total_counts;
}

public function new_bdc_survey_report()
{
	$this->layout = NULL;
	$this->autoRender = false;
	date_default_timezone_set('America/Los_Angeles');
		$unix_time = strtotime("-15 hour");
		$today_date= date('Y-m-d', $unix_time);
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:00',$unix_time);
	App::import('Vendor','tcpdf/tcpdf');
	$dealer_id = $this->Auth->user('dealer_id');
		list($sold_month_data,$sold_today_data) = $this->_bdc_csr_daily_report($dealer_id,3);

		$this->loadModel('BdcSurvey');
		$next_month_data = $this->BdcSurvey->query("
		SELECT
		`Contact`.`user_id`,
		`BdcSurvey`.`status`,
		`BdcSurvey`.`user_id`,
		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if(`BdcSurvey`.`c_status` = 6, 1, 0)) AS crs_survey,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`sales_step` = '10' || `Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.`modified`, 1, 0)) AS sold_leads

		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN `contacts` `Contact` ON `Contact`.id=BdcSurvey.bdc_lead_id
		WHERE  `BdcSurvey`.`dealer_id` = :dealer_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`survey_id`=:survey_id
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('dealer_id'=>$dealer_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month,'survey_id'=>2)
		);

		$next_today_data = $this->BdcSurvey->query("
		SELECT
		`Contact`.`user_id`,
		`BdcSurvey`.`status`,
		`BdcSurvey`.`user_id`,
		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if(`BdcSurvey`.`c_status` = 6, 1, 0)) AS crs_survey,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`sales_step` = '10' || `Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.`modified`, 1, 0)) AS sold_leads

		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN `contacts` `Contact` ON `Contact`.id=BdcSurvey.bdc_lead_id
		WHERE `BdcSurvey`.`dealer_id` = :dealer_id AND DATE(`BdcSurvey`.`created`) = :today_date  AND `BdcSurvey`.`survey_id`= :survey_id
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('dealer_id'=>$dealer_id,'today_date'=>$today_date,'survey_id'=>2)
		);
	list($service_month_data,$service_today_data) = $this->_bdc_csr_daily_report($dealer_id,5);
	list($part_month_data,$part_today_data) = $this->_bdc_csr_daily_report($dealer_id,11);

	$this->set(compact('next_month_data','next_today_data','service_month_data','service_today_data','part_month_data','part_today_data','sold_month_data','sold_today_data'));
	$html = $this->render('/Elements/new_daily_csr_report');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('DP360CRM');
	$pdf->SetSubject('Daily Report ('.date('m/d/Y', $unix_time).')');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	$pdf->SetHeaderData('DealershipPerformance_FinalLogo.jpg', 30, 'Daily Report ('.date('m/d/Y').')', 'Dealership Performance 360', array(75,168,211), array(75,168,211));
	$pdf->setFooterData(array(0,64,0), array(0,64,128));

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->SetMargins(5, 15, 5);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(5);

	$pdf->SetFont('helvetica', '', 10);
		// output the HTML content
	$pdf->AddPage();
	$pdf->writeHTML($html, true, false, true, false, '');
	if (!file_exists(APP.'webroot/files/bdc_reports/dealer_'.$dealer_id)) {
   			mkdir(APP.'webroot/files/bdc_reports/dealer_'.$dealer_id, 0777, true);
		}
	$filepath=APP.'webroot/files/bdc_reports/dealer_'.$dealer_id.'/'.$dealer_id.'_bdc_csr_report_'.date('Y_m_d',$unix_time).'.pdf';
			$pdf->Output($filepath, 'F');
			die;


}

private function _bdc_csr_daily_report($dealer_id = NULL,$survey_id = NULL)
{
		date_default_timezone_set('America/Los_Angeles');
		$unix_time = strtotime("-15 hour");
		$today_date= date('Y-m-d', $unix_time);
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:00',$unix_time);
		$this->loadModel('BdcSurvey');
		$report_results_month = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,

		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if(`BdcSurvey`.`c_status` = 6, 1, 0)) AS crs_survey


		FROM `bdc_surveys` `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id

		WHERE  `BdcSurvey`.`dealer_id` = :dealer_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`survey_id`=:survey_id
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('dealer_id'=>$dealer_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month,'survey_id'=>$survey_id)
		);

		$report_results_day = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,

		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if(`BdcSurvey`.`c_status` = 6, 1, 0)) AS crs_survey
		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id

		WHERE `BdcSurvey`.`dealer_id` = :dealer_id AND DATE(`BdcSurvey`.`created`) = :today_date  AND `BdcSurvey`.`survey_id`= :survey_id
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('dealer_id'=>$dealer_id,'today_date'=>$today_date,'survey_id'=>$survey_id)
		);

		return array($report_results_month,$report_results_day);
}

	public function get_callback_info($survey_id =2)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_bdcCallBackInfo($survey_id);

	}
	public function bdcapp_get_callback_info($survey_id =2)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_bdcCallBackInfo($survey_id);

	}
	private function _bdcCallBackInfo($survey_id =2)
	{
		$dealer_id = $this->Auth->user('dealer_id');
		if($this->Session->check('SelectedDealer')&&$this->params['bdcapp'])
		{
			$d_id=$this->Session->read('SelectedDealer');
			if($d_id=='all_builds')
			{
				$this->loadModel('DealerName');
				$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
				$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			}else{
				$dealer_id=$d_id;
			}
		}
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$start_time = date('Y-m-d H:i:s');
		$end_time = date('Y-m-d H:i:s',strtotime('+1 hour'));
		$this->set(compact('start_time','end_time'));
		$join_table = array(
						array('table'=>'contacts',
								'alias' => 'Contact',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('Contact.dnc_status' =>  array('not_call','no_call_email'),'Contact.sales_step' => array(1,10)),
									'Contact.bdc_inavlid' => 0,
									'BdcSurvey.bdc_lead_id' => 'Contact.id',

								)
						)

		);
		$sold_join_table = array(
						array('table'=>'contacts',
								'alias' => 'Contact',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('Contact.dnc_status' =>  array('not_call','no_call_email')),
									'Contact.bdc_inavlid' => 0,
									'BdcSurvey.bdc_lead_id' => 'Contact.id',
								)
						)

		);

		$part_join_table = array(
						array('table'=>'part_leads_dms',
								'alias' => 'PartLeadsDms',
								'type' => 'RIGHT',
								'conditions' =>array(
									'NOT'=>array('PartLeadsDms.dnc_status' =>  array('not_call','no_call_email')),
									'PartLeadsDms.bdc_inavlid' => 0,
									'BdcSurvey.part_lead_id' => 'PartLeadsDms.id',
									'OR' => array(
											'PartLeadsDms.before_tax_total >=' => '250',
											'PartLeadsDms.counter_taxable_sales >=' =>'250',
											'PartLeadsDms.special_before_tax_total >=' => '250'

									),

								)
						)

		);
		$res_html = '';
		$this->loadModel('BdcSurvey');
		if($survey_id == 2){
			$call_back_count=$this->BdcSurvey->find('count',array(
			//'joins'=>$join_table,
			'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>2,'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','BdcSurvey.call_back_date >='=>$start_time,'BdcSurvey.call_back_date <=' => $end_time)));

		if($call_back_count)
		{
			$action = 'leads_main';
			$option = 'today_callback';
			$lead_type = 'contact';
			$survey_type = 'Pre-Purchase Survey';
		}
		}elseif(in_array($survey_id,array(3,4))){
			$call_back_count=$this->BdcSurvey->find('count',array(
			//'joins' => $sold_join_table,
			'conditions'=>array('BdcSurvey.dealer_id'=>$dealer_id,'BdcSurvey.survey_id'=>array(3,4),'BdcSurvey.status'=>'call back','BdcSurvey.latest'=>'yes','BdcSurvey.call_back_date >='=>$start_time,'BdcSurvey.call_back_date <=' => $end_time)));
			if($call_back_count)
			{
				$action = 'leads_main';
				$option = 'sold_today_callback';
				$lead_type = 'sold';
				$survey_type = 'CSI Sold Survey';
			}
		}
		if($call_back_count)
		{
			$this->set(compact('call_back_count','option','action','lead_type','survey_type'));
			$res_html = $this->render('/Elements/bdc_callback_alert');
		}

		echo $res_html;
		die;


	}


	public function bdc_email_update()
	{
		$this->_bdcEmailReport();
	}

	public function bdcapp_bdc_email_update()
	{
		$this->view = 'bdc_email_update';
		$this->_bdcEmailReport();
	}

	public function crmreport_bdc_email_update()
	{
		$this->view = 'bdc_email_update';
		$this->_bdcEmailReport();
	}


	private function _bdcEmailReport($show_group = null)
	{
	    $dealer_id = $this->Auth->user('dealer_id');
	    $zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		if(!is_null($show_group)&& $show_group=='all_builds'){
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
		$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
		//$dealer_id=array(262, 762, 758, 760,759, 761);

		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$dealer_id=$show_group;
		}
		$r_limit=$record_limit;
		$stats_month = date('m');
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}
		$today_start_date = date('Y-m-d 00:00:00');
		$today_end_date = date('Y-m-d 23:59:59');
		$this->loadModel('BdcSurvey');
		$month_count = $this->BdcSurvey->find('count',array('conditions'=> array('BdcSurvey.dealer_id' => $dealer_id,'BdcSurvey.email_update' => 1,'BdcSurvey.created >=' => $first_day_this_month,'BdcSurvey.created <=' => $last_day_this_month)));
		$today_count = $this->BdcSurvey->find('count',array('conditions'=> array('BdcSurvey.dealer_id' => $dealer_id,'BdcSurvey.email_update' => 1,'BdcSurvey.created >=' => $today_start_date,'BdcSurvey.created <=' => $today_end_date)));

		$this->set(compact('month_count','today_count','today_start_date','first_day_this_month','last_day_this_month'));

	}
	public function update_contact_info()
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_updateContact();

	}
	public function bdcapp_update_contact_info()
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_updateContact();

	}
	private function _updateContact()
	{
		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);

		if($this->request->is('post')){
			//pr($this->request->data);
			$data_diff = array_diff($this->request->data['Contact'],$this->request->data['Old']);
			$comment_text = '';
			$this->request->data['Contact']['mobile'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['mobile']);
			$this->request->data['Contact']['phone'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['phone']);
			$this->request->data['Contact']['work_number'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['work_number']);
			$save_data['BdcLead'] = $this->request->data['Contact'];
			$this->BdcLead->id = $save_data['BdcLead']['id'];
			if($this->BdcLead->save($save_data)){

				foreach($data_diff as $field => $value){
					$comment_text .= $field . ' updated to '.$value.' , ';
				}
				$comment_text .= ' by BDC.';
				if(!empty($data_diff)){
					$history_data = array();
					$history_data['contact_id'] = 		$save_data['BdcLead']['id'];
					$history_data['field_changed'] = serialize($data_diff);
					$history_data['cond'] = 			"BDC Info Update";
					$history_data['user_id']=  			$this->Auth->user('id');
					$history_data['status'] = 			'Contact Info Updated From BDC ';
					$history_data['comment'] = 			$comment_text;
					$history_data['h_type'] = 			"Lead";
					$history_data['sales_step'] = 		"BDC Info Update";
					$history_data['sperson'] = 			$this->Auth->user('full_name');
					$history_data['modified']=   	 date('D - M d,Y h:i A');
					//$history_data['event_id'] = 		$bdc_survey_id;
					$history = array(
						'History' => $history_data
					);
					$this->History->create();
					$this->History->save($history);
				}
				//$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['Contact']['id']);
				die('success');
			}else{

				die('failure');
			}
		}
	}

	public function bdc_appt_report()
	{
		$this->layout='default_new';
		$this->_bdcApptReport();
	}

	public function bdcapp_bdc_appt_report()
	{
		$this->layout='bdcapp_layout';
		$this->view = 'bdc_appt_report';
		$this->_bdcApptReport();
	}
	private function get_team_list($dealer_id){

		$dealer_teams = array();

		$this->loadModel('DealerSetting');
		$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $dealer_id);
		$dealer_teams = array();
		$this->loadModel("ManageTeam");
		$ManageTeams = $this->ManageTeam->find('all',array(
			'conditions'=>array(
				'ManageTeam.dealer_id'=> $dealer_id
			)
		));
		foreach($ManageTeams as $manageteam){
			$dealer_teams[ "team_".$manageteam['ManageTeam']['id']  ] = $manageteam['ManageTeam']['team_name']." (Team)";
			$user_id_team[ $manageteam['ManageTeam']['floor_manager_id'] ] = $manageteam;
		}
		asort($dealer_teams);
		return $dealer_teams;
	}
	private function get_team_members($team_id){

		$this->loadModel("ManageTeam");
		$ManageTeams = $this->ManageTeam->find('first',array(
			'conditions'=>array(
				'ManageTeam.id'=> $team_id
			)
		));
		$team_members_floor = explode(",", $ManageTeams['ManageTeam']['team_members'].",".$ManageTeams['ManageTeam']['floor_manager_id']);
		return $team_members_floor;

	}

	private function _bdcApptReport()
	{
		$zone = $this->Auth->user('zone');
		$dealer_id = $this->Auth->user('dealer_id');
		$selected_user_id = $this->Auth->user('id');
		$feed_end_date = $feed_start_date = date('Y-m-d');
		$feed_first_date = date('Y-m-d 00:00:00');
		$feed_last_date = date('Y-m-d 23:59:00');
		$event_type_id = 21;

		if(!empty($this->request->params['named']['from_feed_stat_date']) && !empty($this->request->params['named']['to_feed_stat_date']))
		{
			$feed_first_date =  date('Y-m-d 00:00:00',strtotime($this->request->params['named']['from_feed_stat_date']));
			$feed_last_date = date('Y-m-d 23:59:00',strtotime($this->request->params['named']['to_feed_stat_date']));
			$feed_start_date =$this->request->params['named']['from_feed_stat_date'];
			$feed_end_date =$this->request->params['named']['to_feed_stat_date'];
		}

		if(!empty($this->request->params['named']['event_type_id'])) {
            $event_type_id =$this->request->params['named']['event_type_id'];
        }

		if(!empty($this->request->params['named']['appt_user_id'])) {
            $selected_user_id =$this->request->params['named']['appt_user_id'];
        }

        $dealer_teams = $this->get_team_list($dealer_id);

		$this->loadModel('Event');
		$field_list = array(
			'BdcLead.id',
			'BdcLead.first_name',
			'BdcLead.full_name',
			'BdcLead.contact_status_id',
			'BdcLead.last_name',
			'BdcLead.type',
			'BdcLead.condition',
			'BdcLead.company_id',
			'BdcLead.year',
			'BdcLead.make',
			'BdcLead.model',
			'BdcLead.mobile',
			'BdcLead.phone',
			'BdcLead.email',
			'BdcLead.lead_status',
			'BdcLead.status',
			'BdcLead.source',
			'BdcLead.sperson',
			'BdcLead.notes',
			'BdcLead.dnc_status',
			'BdcLead.sales_step',
			'BdcLead.work_number'
		);
		$this->Event->unbindModel(array('belongsTo' => array('Contact')));
		$this->Event->bindModel(array('belongsTo' => array('BdcLead' => array('className' => 'BdcLead', 'fields' => $field_list, 'foreignKey' => 'contact_id'))));

		$conditions = array(
            'Event.start >=' => $feed_first_date,
            'Event.end <=' => $feed_last_date,
            'Event.dealer_id' => $dealer_id,
            'Event.event_type_id' => $event_type_id,
            'Event.active' => 1
        );

        if ($selected_user_id != 'Staff') {
            $conditions['Event.user_id'] = $selected_user_id;
        }
        if (strpos($selected_user_id, 'team_') !== false) {
            $team_str = explode("_", $selected_user_id);
    		$team_members = $this->get_team_members($team_str[1]);
    		$conditions['Event.user_id'] = $team_members;
        }

        // debug($conditions);

		$bdc_appts = $this->Event->find('all', array('conditions' => $conditions, 'order' => array('Event.start DESC')));
		$group_id = $this->Auth->user('group_id');
		$stat_options = array();

		if( $group_id != 3) {
			$this->loadModel('User');
			$stat_options['Staff'] = 'All Staff';

			if(!empty($dealer_teams)){
				$stat_options = Set::merge($stat_options, $dealer_teams);
			}

			$emps = $this->User->find('list', array('recursive' => -1, 'conditions' => array('User.group_id <>' => array(6,7,8),  'User.active' => 1, 'User.dealer_id' => $dealer_id), 'order' => 'User.first_name ASC'));
			$stat_options = Set::merge($stat_options, $emps);


		} else {
			$stat_options[ $this->Auth->user('id')  ] = 'My Appts';
		}

		$this->set(compact('bdc_appts','feed_first_date','feed_last_date','event_type_id','stat_options','selected_user_id'));
	}

	public function event_survey_report()
	{
		$this->layout='default_new';
		$this->_bdcEventSurvey();
		if($this->request->params['named']['export']== 'yes')
		{
			$this->layout= null;
			$html = $this->render('/Elements/event_survey_report');
			$this->export($html);
			die;
		}

	}

	private function _bdcEventSurvey()
	{
		$zone=$this->Auth->user('zone');
		$dealer_id = $this->Auth->user('dealer_id');
		date_default_timezone_set($zone);
		$feed_first_date = date('Y-m-d 00:00:00');
		$feed_last_date = date('Y-m-d 23:59:00');
		$survey_id = 14;
		if($dealer_id == 2344)
		{
			$survey_id = 4;
		}
		if(!empty($this->request->params['named']['survey']))
		{
			$survey_id = $this->request->params['named']['survey'];
		}
		if(!empty($this->request->params['named']['from_feed_stat_date']) && !empty($this->request->params['named']['to_feed_stat_date']))
		{
			$feed_first_date =  date('Y-m-d 00:00:00',strtotime($this->request->params['named']['from_feed_stat_date']));
			$feed_last_date = date('Y-m-d 23:59:00',strtotime($this->request->params['named']['to_feed_stat_date']));
		}
		$this->loadModel('BdcSurvey');
		$survey_data = $this->BdcSurvey->query("SELECT Contact.id ,Contact.first_name ,Contact.last_name,Contact.mobile,Contact.phone,Contact.sperson,Contact.work_number ,Contact.email,
BdcStatus.name ,CONCAT(User.first_name,' ' ,User.last_name) AS CSR, BdcSurvey.* FROM bdc_surveys BdcSurvey LEFT JOIN contacts Contact ON Contact.id = BdcSurvey.`bdc_lead_id` LEFT JOIN users `User` ON `User`.`id` = BdcSurvey.`user_id` LEFT JOIN bdc_statuses BdcStatus ON BdcStatus.id = BdcSurvey.`c_status` WHERE BdcSurvey.`latest` = 'yes' AND BdcSurvey.`dealer_id` = ".$dealer_id." AND BdcSurvey.`survey_id` = ".$survey_id."  AND BdcSurvey.`created` >= '".$feed_first_date."' AND BdcSurvey.`created` <= '".$feed_last_date."' ORDER BY BdcSurvey.`created` DESC");

		$this->set(compact('survey_data','survey_id','feed_first_date','feed_last_date'));



	}

	public function customer_status_report($show_group=null)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_call_status_report($show_group);
		$show_print =true;
		if($this->request->params['named']['export']== 'yes')
		{
			$show_print =false;
			$this->set(compact('show_print'));
			$html = $this->render('/Elements/customer_status_report');
			$this->export($html);
			die;
		}
		$this->set(compact('show_print'));
		echo $this->render('/Elements/customer_status_report');
		die;
	}

	public function crmreport_customer_status_report($show_group=null)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_call_status_report($show_group);
		$show_print =true;
		if($this->request->params['named']['export']== 'yes')
		{
			$show_print =false;
			$this->set(compact('show_print'));
			$html = $this->render('/Elements/customer_status_report');
			$this->export($html);
			die;
		}
		$this->set(compact('show_print'));
		echo $this->render('/Elements/customer_status_report');
		die;
	}

	public function bdcapp_customer_status_report($show_group=null)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->_call_status_report($show_group);
		$show_print =true;
		if($this->request->params['named']['export']== 'yes')
		{
			$show_print =false;
			$this->set(compact('show_print'));
			$html = $this->render('/Elements/customer_status_report');
			$this->export($html);
			die;
		}
		$this->set(compact('show_print'));
		echo $this->render('/Elements/customer_status_report');
		die;
	}

	private function _call_status_report($show_group=null){

		$user_id[] = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		if(in_array($this->Auth->user('dealer_id'),array(1225,1226,20080,20090)))
		{
			$modified_date_field = 'step_modified';
		}
		$this->loadModel('BdcStatus');
		$this->loadModel('DealerName');
		$dealer_info = $this->DealerName->findByDealer_id($user_id);
		if($dealer_info['DealerName']['dealer_group']){
		$dealer_names = $this->DealerName->find('list',array('fields' => 'dealer_id,name','conditions' => array('dealer_group' =>$dealer_info['DealerName']['dealer_group'])));
		$this->set(compact('dealer_names'));
		}

		if(!is_null($show_group)&& $show_group=='all_builds'){

			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			//$dealer_id=array(262, 762, 758, 760,759, 761);

		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id[]=$show_group;
		}
		$user_ids=implode(',',$user_id);

		$stats_month = date('m');
		$first_day_this_month = date('Y-m-01 00:00:00');
		$last_day_this_month  = date('Y-m-d 23:59:59');
		if( $this->Session->check("bdc_date_range.start_date") ){
			$start_date = $this->Session->read("bdc_date_range.start_date");
			$end_date = $this->Session->read("bdc_date_range.end_date");
			$first_day_this_month = date('Y-m-d 00:00:00', strtotime($start_date));
			$last_day_this_month  = date('Y-m-d 23:59:59', strtotime($end_date));
		}
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` IN ($user_ids) AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` IN ($user_ids,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC",array('first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));

		$this->set(compact('status_result','show_group'));


	}


	public function bdc_sold_report($stats_month = null,$s_date = null, $e_date = null,$layout="yes")
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

	/*
	BDC Reprot for sold leads

	 */
	 public function sold_report_info($stuff,  $s_date = null, $e_date = null,$export='')
	{
		$this->layout = null;
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}
		$this->loadModel('BdcSurvey');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date." 00:00:00";
		$l_date = $e_date." 23:59:59";
		$this->loadModel('Contact');
		$fields = array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.first_name',
			'Contact.last_name',
			'Contact.type',
			'Contact.contact_status_id',
			'Contact.condition',
			'Contact.year',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.mobile',
			'Contact.phone',
			'Contact.work_number',
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

		);


		$this->loadModel('Contact');
		$this->Contact->unbindModel(array('belongsTo' => array('User'),'hasMany' => array('Deal')));

		$this->loadModel('Event');
		$this->Event->bindModel(array('belongsTo' => array('Contact' => array(
								'className' => 'Contact',
								'foreignKey' => 'contact_id',
								'fields' => $fields,

						))));

		$conditions = array('Event.start >=' => $f_date,'Event.start <=' => $l_date,'Event.dealer_id' => $dealer_id,'Event.event_type_id' => array(20,21),'Event.status' => 'Completed','Contact.status' => array('Sold/Rolled','Sold/Rolled-Multi Vehicle'));
		if(!empty($stuff) && is_numeric($stuff))
		{
			$conditions['Contact.user_id'] = $stuff;
		}
		$this->loadModel('EventType');
		$this->EventType->unbindModel(array('hasMany' =>array('Event')));
		$event_fields = array('Event.id','Event.start','Event.event_type_id','Event.customer_showed','Event.contact_id');
		$all_contacts = $this->Event->find('all',array('fields' => $event_fields,'recursive'=> 2,'conditions' => $conditions,'order' => 'Event.start DESC','group' => 'Event.contact_id'));

		$this->set('export',false);
		$this->set('all_contacts',$all_contacts);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}


	}

	//Freedom group Custom ebay survey recipients list

	private function _freedom_ebay_reciepients($address_type,$dealer_id)
	{
		$recipient_list = array('parts_manager' => array(
								'denton' => array('dmontey@freedompowersportstx.com'),
								'262' => array('sdennis@freedompowersportstx.com'),
								'491' => array('juzzell@freedompowersportstx.com'),
								'492' => array('stotz@freedompowersportstx.com'),
								'758' => array('anevarez@freedompowersportstx.com'),
								'759' => array('dwebb@freedompowersportstx.com'),
								'760' => array('cmartinez@freedompowersportstx.com'),
								'761' => array('fpdparts@freedompowersportstx.com'),
								'762' => array('kmccord@freedompowersportstx.com'),
								'1406' => array('ssmith@freedompowersportstx.com'),
		),

		'service_manager' => array(
					'492' => array('stotz@freedompowersportstx.com'),
					'761' => array('ccadieux@freedompowersportstx.com'),
					'denton' => array('dmontey@freedompowersportstx.com'),
					'1406' => array('ssmith@freedompowersportstx.com','dtynes@freedompowersportstx.com'),
					'491' => array('psmallwood@freedompowersportstx.com'),
					'760' => array('rblackwell@freedompowersportstx.com'),
					'758' => array('dbrown@freedompowersportstx.com'),
					'762' => array('jherrin@freedompowersportstx.com'),
					'759' => array('shannon@freedompowersportstx.com'),
					'262' => array('lbobbitt@freedompowersportstx.com'),

		),
		'sales_manager' => array(
					'761' => array('daron@freedompowersportstx.com'),
					'1406' => array('roconnell@freedompowersportstx.com'),
					'491' => array('nbarrow@freedompowersportstx.com'),
					'760' => array('jwilson@freedompowersportstx.com'),
					'758' => array('mlang@freedompowersportstx.com','jdwire@freedompowersportstx.com'),
					'762' => array('lgarrison@freedompowersportstx.com'),
					'759' => array('haddleman@freedompowersportstx.com'),
					'denton' => array('gjudd@freedompowersportstx.com'),
					'262' => array('jrobison@freedompowersportstx.com'),
					'492' => array('stotz@freedompowersportstx.com'),


		),
		'general_manager' => array(
					'492' => array('sdavis@freedompowersportstx.com'),
					'262' => array('lbobbitt@freedompowersportstx.com'),
					'denton' => array('mmayberry@freedompowersportstx.com'),
					'491' => array('cvance@freedompowersportstx.com'),
					'759' => array('vanderson@freedompowersportstx.com'),
					'760' => array('tsouther@freedompowersportstx.com'),
					'758' => array('schandler@freedompowersportstx.com'),
					'762' => array('lgalbreaith@freedompowersportstx.com'),
					'1406' => array('nhull@freedompowersportstx.com'),
					'761' => array('ccadieux@freedompowersportstx.com'),


		)

		);

	}

	public function freedom_marketing_report()
	{
		$this->layout='default_new';
		$report_start_date = date('Y-m-01 00:00:00');
		$report_end_date = date('Y-m-d 23:59:59');
		$dealer_id = $this->Auth->user('dealer_id');
		if(!empty($this->request->params['named']['report_start_date']))
		{
			$report_start_date = date('Y-m-d 00:00:00',strtotime($this->request->params['named']['report_start_date']));
		}
		if(!empty($this->request->params['named']['report_end_date']))
		{
			$report_end_date = date('Y-m-d 23:59:59',strtotime($this->request->params['named']['report_end_date']));
		}

		$this->loadModel('BdcSurvey');
		$conditions = array('BdcSurvey.dealer_id' => $dealer_id,'BdcSurvey.status' => 'contact','BdcSurvey.created >=' => $report_start_date,'BdcSurvey.created <=' => $report_end_date,'BdcSurvey.survey_id' => 13);
		$survey_fields = array('BdcSurvey.id','BdcSurvey.dealer_id','BdcSurvey.user_id');
		$all_bdc_surveys = $this->BdcSurvey->find('all',array('fields' =>$survey_fields,'conditions' => $conditions));
		$bdc_survey_ids = Set::classicExtract($all_bdc_surveys,'{n}.BdcSurvey.id');
		$this->loadModel('SurveyAnswer');

			// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^no', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$bdc_survey_ids,'`SurveyAnswer`.`question_id`'=>array(125,127,128));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count = $this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
		$this->set(compact('question_dealer_count','bdc_survey_ids','report_start_date','report_end_date'));

	}

	public function freedom_custom_report()
	{

		$dealer_id = $this->Auth->user('dealer_id');
		$modified_date_field = 'modified';
		$this->loadModel('User');
		$all_users = $this->User->find('list',array('fields' => array('id','full_name'),'conditions' => array('User.dealer_id' => $dealer_id)));
		$all_user_ids = array_keys($all_users);

		$this->layout='default_new';
		$report_start_date = date('Y-m-01 00:00:00');
		$report_end_date = date('Y-m-d 23:59:59');
		$dealer_id = $this->Auth->user('dealer_id');
		if(!empty($this->request->params['named']['report_start_date']))
		{
			$report_start_date = date('Y-m-d 00:00:00',strtotime($this->request->params['named']['report_start_date']));
		}
		if(!empty($this->request->params['named']['report_end_date']))
		{
			$report_end_date = date('Y-m-d 23:59:59',strtotime($this->request->params['named']['report_end_date']));
		}
		$user_ids = implode(',',$all_user_ids);
		$this->loadModel('BdcSurvey');
		$report_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,
		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		count(distinct(`BdcSurvey`.`bdc_lead_id`)) as unique_leads,
		SUM(if( `BdcSurvey`.`status`= 'contact',CAST(`BdcSurvey`.`duration` AS DECIMAL),0)) AS avg_time,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(IF(`BdcSurvey`.`c_status`= 105,1,0)) AS not_interested,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if(`BdcSurvey`.`status` = 'voicemail', 1, 0)) AS voicemail_lead,
		SUM(if(`BdcSurvey`.`c_status` = 104, 1, 0)) AS new_lead,
		SUM(if(`BdcSurvey`.`event_id` <> 0, 1, 0)) AS appointment_count,
		SUM(if(`Contact`.`lead_status` <> 'Open', 1, 0)) AS open_leads,
		SUM(if(`Contact`.`lead_status` <> 'Closed', 1, 0)) AS closed_leads,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.$modified_date_field), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`status` = 'Sold/Rolled' ||`Contact`.`status` = 'Sold/Rolled-Multi Vehicle' || `Contact`.`sales_step` = 10)&&`BdcSurvey`.`modified` <= `Contact`.$modified_date_field, 1, 0)) AS sold_leads

		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN contacts `Contact` ON BdcSurvey.bdc_lead_id = `Contact`.id
		WHERE  `BdcSurvey`.`user_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :report_start_date AND `BdcSurvey`.`modified` <= :report_end_date AND  `BdcSurvey`.`survey_id`=13
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('report_start_date'=>$report_start_date,'report_end_date'=>$report_end_date)
		);


		$lead_soldtype_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		SUM(if((`SurveyAnswer`.`question_id` = 125 && `SurveyAnswer`.`answer` = 'trade_in' && `Contact`.`sales_step` = 10), 1, 0)) AS tradein_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 125 && `SurveyAnswer`.`answer` = 'seller' && `Contact`.`sales_step` = 10), 1, 0)) AS seller_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 127 && `SurveyAnswer`.`answer` = 'yes' && `Contact`.`sales_step` = 10), 1, 0)) AS part_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 128 && `SurveyAnswer`.`answer` = 'yes' && `Contact`.`sales_step` = 10), 1, 0)) AS service_leads
		FROM `bdc_surveys` AS `BdcSurvey`
		RIGHT JOIN survey_answers `SurveyAnswer` ON BdcSurvey.id = `SurveyAnswer`.bdc_survey_id
		LEFT JOIN contacts `Contact` ON BdcSurvey.bdc_lead_id = `Contact`.id
		WHERE  `BdcSurvey`.`user_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :report_start_date AND `BdcSurvey`.`modified` <= :report_end_date AND  `BdcSurvey`.`survey_id`=13
		GROUP BY  `BdcSurvey`.`user_id`
		",array('report_start_date'=>$report_start_date,'report_end_date'=>$report_end_date)
		);
		$lead_soldtype_report = array();
		foreach($lead_soldtype_results as $result)
		{
			$report_data = array();
			$report_data['tradein_leads'] = $result[0]['tradein_leads'];
			$report_data['seller_leads'] = $result[0]['seller_leads'];
			$report_data['part_leads'] = $result[0]['part_leads'];
			$report_data['service_leads'] = $result[0]['service_leads'];
			$lead_soldtype_report[$result['BdcSurvey']['user_id']] = $report_data;
		}



		$lead_bytype_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		SUM(if((`SurveyAnswer`.`question_id` = 125 && `SurveyAnswer`.`answer` = 'trade_in'), 1, 0)) AS tradein_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 125 && `SurveyAnswer`.`answer` = 'seller'), 1, 0)) AS seller_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 127 && `SurveyAnswer`.`answer` = 'yes'), 1, 0)) AS part_leads,
		SUM(if((`SurveyAnswer`.`question_id` = 128 && `SurveyAnswer`.`answer` = 'yes'), 1, 0)) AS service_leads
		FROM `bdc_surveys` AS `BdcSurvey`
		RIGHT JOIN survey_answers `SurveyAnswer` ON BdcSurvey.id = `SurveyAnswer`.bdc_survey_id
		WHERE  `BdcSurvey`.`user_id` IN($user_ids) AND `BdcSurvey`.`modified` >= :report_start_date AND `BdcSurvey`.`modified` <= :report_end_date AND  `BdcSurvey`.`survey_id`=13
		GROUP BY  `BdcSurvey`.`user_id`
		",array('report_start_date'=>$report_start_date,'report_end_date'=>$report_end_date)
		);

		$lead_bytype_report = array();
		foreach($lead_bytype_results as $result)
		{
			$report_data = array();
			$report_data['tradein_leads'] = $result[0]['tradein_leads'];
			$report_data['seller_leads'] = $result[0]['seller_leads'];
			$report_data['part_leads'] = $result[0]['part_leads'];
			$report_data['service_leads'] = $result[0]['service_leads'];
			$lead_bytype_report[$result['BdcSurvey']['user_id']] = $report_data;
		}

		$this->loadModel('Contact');
		$sperson_lead_data = $this->Contact->query("Select `Contact`.`user_id`,`Contact`.`sperson`,`Contact`.`company_id`,`Contact`.`company`,SUM(IF(`Contact`.`contact_status_id` = 5,1,0)) as web_lead_count,
		SUM(IF(`Contact`.`contact_status_id` = 6,1,0)) as phone_lead_count,
		SUM(IF(`Contact`.`contact_status_id` = 7,1,0)) as showroom_lead_count,
		SUM(IF(`Contact`.`contact_status_id` = 12,1,0)) as mobile_lead_count,
		SUM(IF(`Contact`.`dealer_transfer_date` >= `Contact`.`modified`,1,0)) as not_worked_leads,
		count(`Contact`.`user_id`) as total_lead_count from `contacts` `Contact` where `Contact`.`dealer_transfer_from` = :dealer_id AND `Contact`.`dealer_transfer_date` >= :report_start_date AND
		`Contact`.`dealer_transfer_date` <= :report_end_date
		GROUP BY  `Contact`.`user_id`
		",array('report_start_date'=>$report_start_date,'report_end_date'=>$report_end_date,'dealer_id' => $dealer_id)
		);
		$per_dealer_data = array();
		foreach($sperson_lead_data as $lead_data)
		{
			$per_dealer_data[$lead_data['Contact']['company_id']]['company'] = $lead_data['Contact']['company'];
			$per_dealer_data[$lead_data['Contact']['company_id']]['sperson_data'][] = $lead_data;
		}

		$hourdiff = round((strtotime($report_end_date) - strtotime($report_start_date))/3600);
		$days = round($hourdiff/24);
		$hourdiff = $days * 8;
		$this->set(compact('report_results','hourdiff','report_start_date','report_end_date','lead_bytype_report','all_users','lead_soldtype_report','sperson_lead_data','per_dealer_data'));

	}

	public function bdc_vm_followup()
	{
		if($this->request->is('post'))
		{
			$history_data = array();
			$history_data['contact_id'] = 		$this->request->data['lead_id'];
			$history_data['cond'] = 			"BDC Followup Email";
			$history_data['user_id']=  			$this->Auth->user('id');
			$history_data['status'] = 			'Follow up email sent From BDC ';
			$history_data['comment'] = 			'Follow up email sent From BDC from Voicemail list';
			$history_data['h_type'] = 			"Lead";
			$history_data['sales_step'] = 		"BDC Followup Email";
			$history_data['sperson'] = 			$this->Auth->user('full_name');
			$history_data['modified']=    date('D - M d,Y h:i A');
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

			/**
			* Add email queue
			* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
			* template = "", $from = "", $to = "", $bcc = "")
			**/

			$bcc_list = array('andrew@dp360crm.com','reports_all@dp360crm.com');
			$recipients = array($this->request->data['cust_email']);
			$this->loadModel("QueueEmail");
			$this->QueueEmail->create_email_queue(
				"vm_followup_email",
				'Follow up from '.$this->request->data['dealer'],
				"sender",
				serialize( array('dealer'=>$this->request->data['dealer'],'cust_name' => $this->request->data['cust_name'])),
				'sender@dp360crm.com',
				'vm_followup_email',
				"sender@dp360crm.com",
				serialize($recipients),
				serialize($bcc_list)
			);
			die('email sent');
		}
		die('email not sent');

	}
}
