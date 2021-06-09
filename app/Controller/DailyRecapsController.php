<?php
class DailyRecapsController extends AppController {

    public $uses = array('Contact','History');
    public $components = array('RequestHandler','Utility');

	public function beforeFilter() {
		// Configure::write('Session', array(
		// 	'defaults' => 'cake',
		// 	'timeout'=>500,
		// 	'cookieTimeout' => 1440,
		// 	'checkAgent' => false,
		// 	'autoRegenerate'=>false
		// ));
		
		parent::beforeFilter();
	}
	
	

	function TestUtility(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->Utility->AddSubUser($dealer_id,'test_user_tmp','mfn39#@$');
	}

    public function index() {

    }

    public function GetRecapsDataNew($stuff, $f_date,$t_date,$required='all',$dealer_id=''){
    	$dealer_id = $this->Auth->user('dealer_id');
    	// debug($stuff);
    	// debug($required);
    	// debug($dealer_id);

    	$startdate = date('Y-m-d H:i:s', strtotime($f_date));
    	$enddate = date('Y-m-d H:i:s', strtotime($t_date));

    	// debug($startdate);
    	// debug($enddate);


    	$fields = array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.condition',
			'Contact.year',
			'Contact.make',
			'Contact.model',

			'Contact.condition_trade',
			'Contact.year_trade',
			'Contact.make_trade',
			'Contact.model_trade',

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
		$result = array();



    	// Showroom Leads Start
		$showroom_conditions = array(
			'User.active' => 1,
			'Contact.step_modified >=' => $startdate,
			'Contact.step_modified <=' => $enddate,
			'Contact.contact_status_id' => 7,
			'Contact.status <>' => 'Duplicate-Closed',
			'Contact.company_id' => $dealer_id,
		);
		if($stuff != 'Staff'){
			$showroom_conditions['Contact.user_id'] = $stuff;
		}
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$showroom_leads = $this->Contact->find('all', array('order' => 'Contact.modified', 'conditions' =>  $showroom_conditions , 'fields'=>$fields ));
		//debug($showroom_leads);
		$result['showroom_leads'] = $showroom_leads;
		// Showroom leads ends




		//Closed start
		$raw_statuses = $this->Contact->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
		$closed_statuses = array();
		foreach($raw_statuses as $raw_status){
			if($raw_status['lead_statuses']['name'] == 'Duplicate-Closed'){
				continue;
			}
			$closed_statuses[] = $raw_status['lead_statuses']['name'];
		}
		$closed_condition = array(
		  		'User.active' => 1,
				'Contact.company_id' => $dealer_id,
				'Contact.status' => $closed_statuses,
				'Contact.modified >=' => $startdate,
				'Contact.modified <=' => $enddate
		);
		if($stuff != 'Staff'){
			$closed_condition['Contact.user_id'] = $stuff;
		}
		//debug($closed_condition);
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$closed_leads = $this->Contact->find('all', array('conditions' =>  $closed_condition , 'fields'=>$fields ));
		//debug($closed_leads);
		$result['closed_leads'] = $closed_leads;

		//Closed End




		// Sold Start

		$sold_conditions = array(
			'User.active' => 1,
			'LeadSold.company_id' => $dealer_id,
			'LeadSold.modified >=' => $startdate,
			'LeadSold.modified <=' => $enddate
		);
		if($stuff != 'Staff'){
			$sold_conditions['LeadSold.user_id'] = $stuff;
		}

		$this->loadModel('LeadSold');
		$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
		$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $sold_conditions));
		$contact_ids = array();
		foreach($sold_leads as $sold_lead){
			$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
		}
		//debug($contact_ids);
		$sold_ids = array(
			'Contact.id' => $contact_ids
		);
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$solds_leads = $this->Contact->find('all', array('conditions' =>  $sold_ids , 'fields'=>$fields ));
		$result['solds_leads'] = $solds_leads;
		//debug($solds_leads);
		// Sold End


		// Web Leads Start

		$weblead_conditions = array(
			'User.active' => 1,
			'Contact.modified >=' => $startdate,
			'Contact.modified <=' => $enddate,
			'Contact.contact_status_id' => 5,
			'Contact.status <>' => 'Duplicate-Closed',
			'Contact.company_id' => $dealer_id,
		);
		if($stuff != 'Staff'){
			$weblead_conditions['Contact.user_id'] = $stuff;
		}
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$web_leads = $this->Contact->find('all', array('order' => 'Contact.modified', 'conditions' =>  $weblead_conditions , 'fields'=>$fields ));
		//debug($web_leads);
		$result['web_leads'] = $web_leads;

		// Web Leads End



		// Phone Leads Start
		$weblead_conditions = array(
			'User.active' => 1,
			'Contact.modified >=' => $startdate,
			'Contact.modified <=' => $enddate,
			'Contact.contact_status_id' => '6',
			'Contact.status <>' => 'Duplicate-Closed',
			'Contact.company_id' => $dealer_id,
		);
		if($stuff != 'Staff'){
			$weblead_conditions['Contact.user_id'] = $stuff;
		}
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$web_leads = $this->Contact->find('all', array('order' => 'Contact.modified', 'conditions' =>  $weblead_conditions , 'fields'=>$fields ));
		$result['phone_leads'] = $web_leads;
		// Phone Leads End


		// Mobile Leads Start
		$weblead_conditions = array(
			'User.active' => 1,
			'Contact.modified >=' => $startdate,
			'Contact.modified <=' => $enddate,
			'Contact.contact_status_id' => '12',
			'Contact.status <>' => 'Duplicate-Closed',
			'Contact.company_id' => $dealer_id,
		);
		if($stuff != 'Staff'){
			$weblead_conditions['Contact.user_id'] = $stuff;
		}
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$web_leads = $this->Contact->find('all', array('order' => 'Contact.modified', 'conditions' =>  $weblead_conditions , 'fields'=>$fields ));
		$result['mobile_leads'] = $web_leads;
		// Mobile Leads End










		//Email Start
		$user_log = "";
		if($stuff != 'Staff'){
			$user_log = " `UserEmailLog`.`user_id` = '".$stuff."' AND  ";
		}

		$lead_user = "";
		if($stuff != 'Staff'){
			$lead_user =  "  `Contact`.`user_id` =".$stuff." AND  ";
		}


		$emailsent = $this->Contact->query('
		SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
		FROM  contacts as Contact
		LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
		WHERE
		'.$user_log.'
		`Contact`.`company_id` = :company_id  AND   `UserEmailLog`.`send_date` between :s_date and :e_date
		GROUP BY contact_id',array('company_id'=>$dealer_id , 's_date'=>$startdate , 'e_date' => $enddate ));

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
        SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
        FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

        WHERE  '. $lead_user .'
        User.active = 1
        '. $elog_con_str .'
        AND  `Contact`.`modified` between :s_date and :e_date
        AND `Contact`.`company_id` = :company_id
        AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
        ',array('company_id'=>$dealer_id, 's_date'=>$startdate , 'e_date' => $enddate  ));

       // debug( $emailsent );
        //debug( $sent_status );
        $arem = array_merge($emailsent, $sent_status);
       // debug($arem);
        $email_ids = array();
        foreach($arem as $are){
        	$email_ids[] = $are['Contact']['contact_id'];
        }
        $this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$email_leads = $this->Contact->find('all', array('conditions' => array('Contact.id'=>$email_ids), 'fields'=>$fields ));
		$result['email_leads'] = $email_leads;


		//Email End









		// New Inbound/Outbound Phone Calls Start
		$lead_user_n_i = "";
		if($stuff != 'Staff'){
			$lead_user_n_i =  "  `Contact`.`user_id` =".$stuff." AND  ";
		}


		$inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header in ('Outbound Call (Open)',  'Inbound Call (Open)', 'Web Lead (Open)') ");
		$statuses = array();
		App::uses('Sanitize', 'Utility');
		foreach($inbounds as $inbound){
			$statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
		}
		$status_cond = implode(",", $statuses);

		//debug($startdate );

		$new_inbound = $this->Contact->query('
		SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
		FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
		WHERE  '.$lead_user_n_i.'
		 User.active = 1
		 AND date_format(`Contact`.`created`,\'%Y-%m-%d\') between  :today AND :enddate

			AND `Contact`.`id` not in
			(
				SELECT id from contacts as ct where
				date_format(`ct`.`created`,\'%Y-%m-%d\')  between  :today AND :enddate
				AND xml_weblead = 1 AND  `ct`.`created` = `ct`.`modified`
				AND `Contact`.`company_id` = :company_id
			)


		AND `Contact`.`company_id` = :company_id AND
			(
				(date_format(`Contact`.`modified`,\'%Y-%m-%d\') between  :today AND :enddate AND `Contact`.`status` in ('.$status_cond.')  ) OR
				(date_format(`History`.`created`,\'%Y-%m-%d\') between  :today AND :enddate AND `History`.`status` in ('.$status_cond.')  ) OR
                (date_format(`Contact`.`modified`,\'%Y-%m-%d\') between  :today AND :enddate AND `Contact`.`lead_call_types` = \'outbound\'  )
			)
		GROUP BY contact_id',  array('company_id'=>$dealer_id , 'today' => date('Y-m-d', strtotime($startdate)), 'enddate' => date('Y-m-d', strtotime($enddate))       ));

		$new_ids = array();
        foreach($new_inbound as $are){
        	$new_ids[] = $are['Contact']['contact_id'];
        }
        $this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$new_inbound = $this->Contact->find('all', array('conditions' => array('Contact.id'=>$new_ids), 'fields'=>$fields ));
		$result['new_inbound'] = $new_inbound;

		// New Inbound/Outbound Phone Calls Ends








		// Existing Inbound/Outbound Phone Calls Start

		$inbounds = $this->Contact->query("SELECT * FROM lead_statuses WHERE header in ('Sold FollowUp In (Closed)','Inbound Call (Open)' ,  'Sold FollowUp Out (Closed)','Outbound Call (Open)') ");
		$statuses = array();
		App::uses('Sanitize', 'Utility');
		foreach($inbounds as $inbound){
			$statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
		}
		$lead_user_n_i = "";
		if($stuff != 'Staff'){
			$lead_user_n_i =  "  `Contact`.`user_id` =".$stuff." AND  ";
		}
		$Existing_Phone_Calls_Out = $this->Contact->query('
		SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
		FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
		WHERE   '. $lead_user_n_i . '
		 User.active = 1

		AND date_format(`Contact`.`created`,\'%Y-%m-%d\') < :today

		AND `Contact`.`company_id` = :company_id AND
		(
			(date_format(`Contact`.`modified`,\'%Y-%m-%d\') between  :today AND :enddate AND `Contact`.`status` in ('.$status_cond.')  ) OR
			(date_format(`History`.`created`,\'%Y-%m-%d\') between  :today AND :enddate AND  `History`.`h_type` = \'Lead\' AND `History`.`status` in ('.$status_cond.')  )
		)
		GROUP BY contact_id',array('company_id'=>$dealer_id, 'today'  => date('Y-m-d', strtotime($startdate)) , 'enddate' => date('Y-m-d', strtotime($enddate))         ));


		$existing_ids = array();
        foreach($Existing_Phone_Calls_Out as $are){
        	$existing_ids[] = $are['Contact']['contact_id'];
        }
        $this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$existing_inbound = $this->Contact->find('all', array('conditions' => array('Contact.id'=>$existing_ids), 'fields'=>$fields ));
		$result['existing_inbound'] = $existing_inbound;
		//debug($existing_inbound);

		// Existing Inbound/Outbound Phone Calls End



		//Update Step Name
		$tmp_newdata = $result;
		$custom_step_map = $this->requestAction('dashboards/get_dealer_steps');
		foreach($tmp_newdata as $k=>$v){
			foreach($v as $key=>$value ){
				$result[$k][$key]['Contact']['sales_step'] = $custom_step_map[ $value['Contact']['sales_step'] ];
			}
		}

		//debug($result);


		return $result;


    }


	public function all($stuff,  $s_date = null, $e_date = null,$export='',$create_attachment='',$dealerid='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}
		//echo "<pre>";
		//echo "$s_date, $e_date,$export,$create_attachment,$dealerid";die;
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		// list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open_results,$sold_results,$closed_results,$note_update_results)
		// 	= $this->GetRecapsData($stuff,$f_date,$t_date,'all',$dealerid);

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);

		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);





		//debug($newdata );
		$step_log_results = $newdata['showroom_leads'];
		$closed_results = $newdata['closed_leads'];
		$sold_results = $newdata['solds_leads'];
		$web_lead_results = $newdata['web_leads'];
		$email_open_results = $newdata['email_leads'];
		$new_inbound_phone_results = $newdata['new_inbound'];
		$exiting_outbound_phone_results = $newdata['existing_inbound'];

		$phone_lead_results = $newdata['phone_leads'];
		$mobile_lead_results = $newdata['mobile_leads'];






		$this->set('step_log_results',$step_log_results);
		$this->set('web_lead_results',$web_lead_results);
		$this->set('new_inbound_phone_results',$new_inbound_phone_results);
		$this->set('exiting_outbound_phone_results',$exiting_outbound_phone_results);
		$this->set('email_open_results',$email_open_results);
		$this->set('sold_results',$sold_results);
		$this->set('closed_results',$closed_results);

		$this->set('phone_lead_results',$phone_lead_results);
		$this->set('mobile_lead_results',$mobile_lead_results);

		//$this->set('note_update_results',$note_update_results);

		if($create_attachment){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->create_attachment($html,$create_attachment);// create_attachment has file name
			die;
		}elseif($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_all($stuff,  $s_date = null, $e_date = null,$export='',$create_attachment='',$dealerid='') {

		$this->view='all';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}
		//echo "<pre>";
		//echo "$s_date, $e_date,$export,$create_attachment,$dealerid";die;
		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);

		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);





		//debug($newdata );
		$step_log_results = $newdata['showroom_leads'];
		$closed_results = $newdata['closed_leads'];
		$sold_results = $newdata['solds_leads'];
		$web_lead_results = $newdata['web_leads'];
		$email_open_results = $newdata['email_leads'];
		$new_inbound_phone_results = $newdata['new_inbound'];
		$exiting_outbound_phone_results = $newdata['existing_inbound'];






		$this->set('step_log_results',$step_log_results);
		$this->set('web_lead_results',$web_lead_results);
		$this->set('new_inbound_phone_results',$new_inbound_phone_results);
		$this->set('exiting_outbound_phone_results',$exiting_outbound_phone_results);
		$this->set('email_open_results',$email_open_results);
		$this->set('sold_results',$sold_results);
		$this->set('closed_results',$closed_results);
		//$this->set('note_update_results',$note_update_results);

		if($create_attachment){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->create_attachment($html,$create_attachment);// create_attachment has file name
			die;
		}elseif($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function step_logs($stuff = null, $s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$step_log_results = $newdata['showroom_leads'];
		$this->set('step_log_results',$step_log_results);

		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);





		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_step_logs($stuff = null, $s_date = null, $e_date = null,$export='') {

		$this->view='step_logs';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results) = $this->GetRecapsData($stuff, $f_date,$t_date);
		$this->set('step_log_results',$step_log_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function new_inbound_phone_calls($stuff = null, $s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$new_inbound_phone_results = $newdata['new_inbound'];
		$this->set('new_inbound_phone_results',$new_inbound_phone_results);




		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);




		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_new_inbound_phone_calls($stuff = null, $s_date = null, $e_date = null,$export='') {
		$this->view='new_inbound_phone_calls';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results) = $this->GetRecapsData($stuff,$f_date,$t_date);
		$this->set('new_inbound_phone_results',$new_inbound_phone_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function web_leads($stuff = null,$s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$web_lead_results = $newdata['web_leads'];
		$this->set('web_lead_results',$web_lead_results);


		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);




		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}



	public function crmreport_web_leads($stuff = null,$s_date = null, $e_date = null,$export='') {

		$this->view='web_leads';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results) = $this->GetRecapsData($stuff,$f_date,$t_date);
		$this->set('web_lead_results',$web_lead_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function existing_outbound_phone_calls($stuff = null,$s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$exiting_outbound_phone_results = $newdata['existing_inbound'];
		$this->set('exiting_outbound_phone_results',$exiting_outbound_phone_results);



		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);











		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_existing_outbound_phone_calls($stuff = null,$s_date = null, $e_date = null,$export='') {
		$this->view='existing_outbound_phone_calls';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results) = $this->GetRecapsData($stuff,$f_date,$t_date);
		$this->set('exiting_outbound_phone_results',$exiting_outbound_phone_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function email_open($stuff = null,$s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$email_open_results = $newdata['email_leads'];
		//debug($email_open_results);
		$this->set('email_open_results',$email_open_results);


		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);




		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_email_open($stuff = null,$s_date = null, $e_date = null,$export='') {
		$this->view='email_open';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open_results) = $this->GetRecapsData($stuff,$f_date,$t_date);
		$this->set('email_open_results',$email_open_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}


	public function sold($stuff = null, $s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		$sold_results = $newdata['solds_leads'];

		$this->set('sold_results',$sold_results);



		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);











		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_sold($stuff = null, $s_date = null, $e_date = null,$export='') {
		$this->view='sold';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open_results,$sold_results) = $this->GetRecapsData($stuff,$f_date,$t_date,'sold');
		$this->set('sold_results',$sold_results);

		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function closed($stuff = null, $s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";

		$newdata = $this->GetRecapsDataNew($stuff,$f_date,$t_date,'all',$dealerid);
		//debug($newdata );
		$closed_results = $newdata['closed_leads'];
		$this->set('closed_results',$closed_results);



		//Next Activity
		$contact_ids = array();
		foreach($newdata as $ndata){
			foreach($ndata as $cnts){
				$contact_ids[] = $cnts['Contact']['id'];
			}
		}
		//debug($contact_ids);
		$events = $this->Event->find('all', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.contact_id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_ids,'Event.status <>' => array('Completed','Canceled'))));
		$next_acvt = array();
		foreach($events as $evt){
			$next_acvt[ $evt['Event']['contact_id']  ] = $evt['Event']['start'];
		}
		$this->set('next_acvt',$next_acvt);
		//debug($next_acvt);









		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function crmreport_closed($stuff = null, $s_date = null, $e_date = null,$export='') {

		$this->view='closed';
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open,$sold_results,$closed_results) = $this->GetRecapsData($stuff, $f_date,$t_date);
		$this->set('closed_results',$closed_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	public function note_updates($s_date = null, $e_date = null,$export='') {
		if($s_date == null && $e_date == null){ // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

		$this->set('s_date', $s_date);
		$this->set('e_date', $e_date);

		$f_date = $s_date;
		$t_date = $e_date." 23:59:59";
		list($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open,$sold_results,$closed_results,$note_update_results) = $this->GetRecapsData($f_date,$t_date);
		$this->set('note_update_results',$note_update_results);
		if($export){
			$this->layout=false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}

	}

	function GetRecapsData($stuff, $f_date,$t_date,$required='all',$dealer_id=''){
		if($dealer_id==''){
			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');
			$show_group = null;
			if($this->request->is('post')&&isset($this->request->data['show_group']))
			{
				$show_group=$this->request->data['show_group'];
				$this->Session->write("show_group", $show_group);
			}
			elseif( $this->Session->check("show_group") ){
				$show_group = $this->Session->read("show_group");
			}
			if(!is_null($show_group)&& $show_group=='all_builds'){
				$this->loadModel('DealerName');
				$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
				$dealer_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			}elseif(!is_null($show_group)&& is_numeric($show_group))
			{
				$dealer_id=$show_group;
			}
		}else{
			$group_id = '';
		}




		App::import('Model', 'User');
		$User = new User();

		$userids = array();

		if($stuff != 'Staff'){
			$userids[] = $stuff;
		}else{

			if($group_id==3){
				$userids[] = $this->Auth->User('id');
			}else{
				$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
				$userids = array('-1');// means nothing
				foreach($users as $key=>$details){
					$userids[] = $details['User']['id'];
				}
			}

		}

		$userids = implode(",",$userids);
		//$userinfo['id'] = 84; //temp
		$TableAlias = 'C';
		$conditions = "$TableAlias.user_id IN(".$userids.") AND (($TableAlias.modified>='$f_date' AND $TableAlias.modified<='$t_date') OR ($TableAlias.created>='$f_date' AND $TableAlias.created<='$t_date'))";
		if($required=='new_inbound_phone_calls'){
			$conditions .= " AND $TableAlias.status LIKE LIKE '%call in'";
		}elseif($required=='web_leads'){
			$conditions .= " AND $TableAlias.status='web lead'";
		}elseif($required=='existing_outbound_phone_calls'){
			$conditions .= " AND $TableAlias.status LIKE LIKE '%call out'";
		}
		//echo "SELECT id,sperson,first_name,m_name,last_name,mobile,`condition`,`year`,make,model,sales_step,notes,`status`,created,modified FROM contacts C WHERE $conditions ORDER BY C.created";
		$contacts = $this->Contact->Query("SELECT id,sperson,first_name,m_name,last_name,mobile,`condition`,`year`,make,model,sales_step,notes,`status`,contact_status_id,created,modified,lead_status FROM contacts C WHERE $conditions ORDER BY C.created");
		$contact_ids = array('-1');//nothing

		foreach($contacts as $key=>$details){
			$contact_ids[$details['C']['id']] = $details['C']['id'];
		}

		$this->loadModel('History');
		$TableAlias = 'H';
		//echo "SELECT user_id,id,sperson,created,modified from histories $TableAlias  WHERE $TableAlias.contact_id IN(".implode(",",$contact_ids).")";
		$histories = $this->History->query("SELECT user_id,id,sperson,contact_id,comment,created,modified from histories $TableAlias  WHERE $TableAlias.contact_id IN(".implode(",",$contact_ids).") AND $TableAlias.h_type='Lead' ORDER BY modified ASC");

		$historiesNew = array();
		foreach($histories as $details){
			$historiesNew[$details['H']['contact_id']][] = $details['H'];
		}
		$histories = $historiesNew;
		//prx($histories);
		$this->loadModel('Event');
		$TableAlias = 'E';
		//echo "SELECT `start`,`end`,contact_id,sperson from events $TableAlias  WHERE $TableAlias.contact_id IN(".implode(",",$contact_ids).")";
		$events = $this->Event->query("SELECT `start`,`end`,contact_id,sperson from events $TableAlias  WHERE $TableAlias.contact_id IN(".implode(",",$contact_ids).")");
		$eventsNew = array();
		foreach($events as $details){
			$eventsNew[$details['E']['contact_id']][] = $details['E'];
		}
		$events = $eventsNew;

		$newResult = array();
		foreach($contacts as $details){ /* Avoid duplicate entries */
			$newResult[$details['C']['id']] = $details;
		}
		$this->loadModel('ContactStatus');
		$contactstatus = $this->ContactStatus->find('all');
		$contactstatusarr = array();
		foreach($contactstatus as $key=>$details){
			$contactstatusarr[$details['ContactStatus']['id']] = $details['ContactStatus']['name'];
		}

		$this->set("ReadmoreHeight","60");
		$step_log_results = array();
		foreach($newResult as $key=>$details){
				if(isset($events[$details['C']['id']])){
					$event_contacts = $events[$details['C']['id']];
					$event_contacts = end($event_contacts);
					$details['E']['start'] = $event_contacts['start'];
				}else{
					$details['E']['start'] = '';
				}

				if(isset($histories[$details['C']['id']])){
					$history_contacts = $histories[$details['C']['id']];
					if(count($history_contacts)>0){
						$history_contacts = end($history_contacts);
						$details['H']['notes'] = $history_contacts['comment'];

					}

				}else{
					$details['H']['notes'] = '';
				}

			 $tmpDetails = 	array(
										'ref_num'=>$details['C']['id'],
										'created'=>$details['C']['created'],
										'modified'=>$details['C']['modified'],
										'next_activity'=>$details['E']['start'],
										'salesperson'=>ucwords(strtolower($details['C']['sperson'])),
										'fullname'=>ucwords(strtolower($details['C']['first_name']))." ".ucwords(strtolower($details['C']['m_name']))." ".ucwords(strtolower($details['C']['last_name'])),
										'phone'=>$this->FormatPhoneNumber($details['C']['mobile']),
										'vehicle'=>$details['C']['condition']." ".$details['C']['year']." ".$details['C']['make']." ".$details['C']['model'],
										'logtype'=> isset($contactstatusarr[$details['C']['contact_status_id']]) ? $contactstatusarr[$details['C']['contact_status_id']] : '',
										'salestep' => $details['C']['sales_step'],
										'comment'=>$details['C']['notes'],
										'status'=>$details['C']['status'],
										'lead_status'=>$details['C']['lead_status']

										);
				/*
				if($details['C']['created']!=$details['C']['modified'] && $details['H']['notes']!=''){
					$tmpDetails['comment'] = $details['H']['notes'];
				}
*/
				$status = strtolower(trim($details['C']['status']));
				if($status=='web lead' || $details['C']['contact_status_id']==5){
					$web_lead_results[] = $tmpDetails;
					if(strpos("temp ".$status,'email')){ /* Email (Open) */
						$email_open[] = $tmpDetails;
					}
				}elseif(strpos($status,'call in') || strpos($status,'call out')){ /* Existing Inbound/Outbound Phone Calls*/
					if($details['C']['created']==$details['C']['modified']){/* New Inbound/Outbound Calls, created = modified */
						$new_inbound_phone_results[] = $tmpDetails;
					}elseif($details['C']['created']!=$details['C']['modified']){
						$exiting_outbound_phone_results[] = $tmpDetails;
					}
				}elseif(strpos("temp ".$status,'email')){ /* Email (Open) */
					$email_open[] = $tmpDetails;
				}elseif($status!='sold/rolled' && strpos($status,'closed') ){
					$closed_results[] = $tmpDetails;
				}elseif($status!='sold/rolled' && $details['C']['contact_status_id']==7){
					$step_log_results[] = $tmpDetails;
				}


		}

		/* Get Records for SOLD items */
		if($required=='all' || $required=='sold'){
			$TableAlias = 'L';
			$conditions = "$TableAlias.user_id IN(".$userids.") AND $TableAlias.modified>='$f_date' AND $TableAlias.modified<='$t_date'";
			//echo "SELECT *FROM lead_solds L JOIN `events` E ON L.`contact_id`=E.`contact_id` WHERE $conditions ORDER BY L.created";
			$ResultSold = $this->Contact->Query("SELECT *FROM lead_solds L LEFT JOIN `events` E ON L.`contact_id`=E.`contact_id` WHERE $conditions ORDER BY L.created");
				$newResult = array();
			foreach($ResultSold as $details){ /* Avoid duplicate entries */
				$newResult[$details['L']['contact_id']] = $details;
			}


			foreach($newResult as $key=>$details){
				 $sold_results[] = 	array(
									'ref_num'=>$details['L']['contact_id'],
									'created'=>$details['L']['created'],
									'modified'=>$details['L']['modified'],
									'next_activity'=>$details['E']['start'],
									'salesperson'=>ucwords(strtolower($details['L']['sperson'])),
									'fullname'=>ucwords(strtolower($details['L']['first_name']))." ".ucwords(strtolower($details['L']['m_name']))." ".ucwords(strtolower($details['L']['last_name'])),
									'phone'=>$this->FormatPhoneNumber($details['L']['mobile']),
									'vehicle'=>$details['L']['condition']." ".$details['L']['year']." ".$details['L']['make']." ".$details['L']['model'],
									'logtype'=> isset($contactstatusarr[$details['L']['contact_status_id']]) ? $contactstatusarr[$details['L']['contact_status_id']] : '',
									'salestep' => $details['L']['sales_step'],
									'comment'=>$details['L']['notes'],
									'status'=>$details['L']['status'],
									'lead_status'=>$details['L']['lead_status']
								);


			}
		}else{
			$sold_results = array();
		}

		/* Records for Notes Update */
                $note_update_result = array();
		/*if($required=='all' || $required=='note_update'){
			$conditions = "C.user_id IN(".$userids.") AND H.created>='$f_date' AND H.created<='$t_date' AND H.h_type='Note Update'";
			//echo "SELECT C.id,H.sperson,C.first_name,C.m_name,C.last_name,C.mobile,H.`condition`,H.`year`,H.make,H.model,H.sales_step,C.notes,H.`status`,C.contact_status_id,H.created,C.modified,C.lead_status,H.`comment`,H.`h_type`,E.start FROM histories H LEFT JOIN contacts C ON H.`contact_id`=C.`id` LEFT JOIN `events` E ON E.`contact_id`=C.id WHERE $conditions";
			$notesupdate = $this->History->Query("SELECT C.id,H.sperson,C.first_name,C.m_name,C.last_name,C.mobile,H.`condition`,H.`year`,H.make,H.model,H.sales_step,C.notes,H.`status`,C.contact_status_id,H.created,C.modified,C.lead_status,H.`comment`,H.`h_type`,E.start FROM histories H LEFT JOIN contacts C ON H.`contact_id`=C.`id` LEFT JOIN `events` E ON E.`contact_id`=C.id WHERE $conditions");

			foreach($notesupdate as $key=>$details){
				 $note_update_result[] = 	array(
									'ref_num'=>$details['C']['id'],
									'created'=>$details['H']['created'],
									'next_activity'=>$details['E']['start'],
									'salesperson'=>ucwords($details['H']['sperson']),
									'fullname'=>ucwords($details['C']['first_name']." ".$details['C']['m_name']." ".$details['C']['last_name']),
									'phone'=>$this->FormatPhoneNumber($details['C']['mobile']),
									'vehicle'=>$details['H']['condition']." ".$details['H']['year']." ".$details['H']['make']." ".$details['H']['model'],
									'logtype'=> isset($contactstatusarr[$details['C']['contact_status_id']]) ? $contactstatusarr[$details['C']['contact_status_id']] : '',
									'salestep' => $details['H']['sales_step'],
									'comment'=>$details['H']['comment'],
									'status'=>$details['H']['status'],
									'lead_status'=>$details['C']['lead_status']
								);


			}
		}else{
			$note_update_result = array();
		}*/
		//prx($note_update_result);
		return array($step_log_results,$new_inbound_phone_results,$web_lead_results,$exiting_outbound_phone_results,$email_open,$sold_results,$closed_results,$note_update_result);

	}

	public function export($html){
		App::import('Component', 'ExcelWriter');
		$excel = new ExcelWriterComponent();
		if($excel==false){
			echo $objExcel->error;die;
		}else{
			$excel->stream($html,'/'.time().'_DailyRecapReport.xls');
		}
	}

	public function FormatPhoneNumber($phone){
			$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
			return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

	public function create_attachment($html,$create_attachment){
		App::import('Component', 'ExcelWriter');
		if(file_exists('files/export/DailyRecapReport.xls')){
			unlink('files/export/DailyRecapReport.xls');
		}
		$excel = new ExcelWriterComponent($create_attachment);
		if($excel==false){
			echo $objExcel->error;die;
		}else{
			$excel->WriteHTML($html,'/'.time().'');
		}
	}

        public function workload($UserId='Staff',$Tab="tab3") {
			if($this->request->is('ajax')){
				$this->layout= false;
			}else{
				$this->layout='default_workload';
			}
			$group_id = $this->Auth->user('group_id');
			$dealer_id = $this->Auth->User('dealer_id');
			$this->loadModel('WorkloadSetting');
			$this->WorkloadSetting->GetInsertHeaders($dealer_id);
			$PresaleSections = $this->GetPresaleSectionList();
			$this->set('PresaleSections',$PresaleSections);
			$this->set("DefaultRecs",4);


			$current_user_id = $this->Auth->User('id');
			$this->set('current_user_id',$current_user_id);
			$stat_options = array();
			if( $group_id != 3){
				$this->loadModel('User');
				$stat_options['Staff'] = 'All Staff';
				$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
				$stat_options = Set::merge($stat_options, $emps);
			}else{
				$stat_options[ $this->Auth->user('id')  ] = 'My Stat';
			}


			$this->set('selected_stats',$UserId);
			$this->set('activeTab',$Tab);
			$this->set('stat_options', $stat_options);
		}

		public function load_postsale($DefaultRecs=4,$UserId='Staff'){
			$this->layout=false;
			$PostsaleSections = $this->GetPostsaleSectionList();
			$this->set('PostsaleSections',$PostsaleSections);
			$this->set("DefaultRecs",$DefaultRecs);
			$this->set("selected_stats",$UserId);

			//debug($PostsaleSections);
			$section_count = array();
			foreach($PostsaleSections as $key => $value){
				$section_count[$key] = $this->PostsaleFollowupCount($key, $UserId);
			}
			$this->set("section_count",$section_count);
			//debug($section_count);
		}

		public function load_presale($DefaultRecs=4,$UserId='Staff'){
			$this->layout=false;
			$PresaleSections = $this->GetPresaleSectionList();
			$this->set('PresaleSections',$PresaleSections);
			$this->set("DefaultRecs",$DefaultRecs);
			$this->set("selected_stats",$UserId);

			$section_count = array();
			foreach($PresaleSections as $key=>$value){
				$section_count[$key] = $this->PresaleFollowupCount($key, $UserId);
			}
			$this->set("section_count",$section_count);
			//debug($section_count);
		}

		public function GetPresaleSection($SecId=1,$RecordsPerSec=4,$UserId='Staff'){
			$this->layout=false;
			list($PresaleFollowupData,$PresaleSections) = $this->PresaleFollowupData($SecId,$RecordsPerSec,$UserId);
			//prx($PresaleFollowupData);
			$this->set('PresaleFollowupData',$PresaleFollowupData);
			$this->set('PresaleSections',$PresaleSections);
			$this->set("RecordsPerSec",$RecordsPerSec);
			$this->set('SecId',$SecId);

		}


		public function GetPostsaleSection($SecId=1,$RecordsPerSec=4,$UserId='Staff'){
			$this->layout=false;
			list($PostsaleFollowupData,$PostsaleSections) = $this->PostsaleFollowupData($SecId,$RecordsPerSec,$UserId);
			//prx($PresaleFollowupData);
			$this->set('PostsaleFollowupData',$PostsaleFollowupData);
			$this->set('PostsaleSections',$PostsaleSections);
			$this->set("RecordsPerSec",$RecordsPerSec);
			$this->set('SecId',$SecId);

		}

		public function load_events($DefaultRecs=4,$UserId='Staff'){
			$this->layout=false;
			$EventSections = $this->GetEventSectionList();
			$this->set('EventSections',$EventSections);
			$this->set("DefaultRecs",$DefaultRecs);
			$this->set("selected_stats",$UserId);

			$section_count = array();
			foreach($EventSections as $key=>$value){
				$section_count[$key] = $this->GetEventsCount($key, $UserId);
			}
			$this->set("section_count",$section_count);
			//debug($section_count);
		}

		public function GetEventSection($SecId=1,$RecordsPerSec=4,$UserId='Staff'){
			$this->layout=false;
			list($EventData,$EventSections) = $this->GetEvents($SecId,$RecordsPerSec,$UserId);
			//prx($PresaleFollowupData);
			$this->set('EventData',$EventData);
			$this->set('EventSections',$EventSections);
			$this->set("RecordsPerSec",$RecordsPerSec);
			$this->set('SecId',$SecId);

		}


        function PresaleFollowupCount($SecId,$UserId='Staff'){
        	$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');

			if($UserId != 'Staff'){
				$userids = $UserId;
			}else{

				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}

			$PresaleSections = $this->GetPresaleSectionList();
			if(isset($PresaleSections[$SecId]['interval'])){
				$SectionDetails = $PresaleSections[$SecId];
				$From = $SectionDetails['interval']['from'];
				$To = $SectionDetails['interval']['to'];
			}else{
				$From = "NOW()";
				$To = " INTERVAL - 2 MONTH";
			}

			$conditions = " C.user_id IN(".$userids.") AND C.lead_status='open'  AND C.created <= $From and C.created > $To";

			$conditions_not_worked = $conditions;
			$conditions_worked = $conditions;

			$conditions_not_worked .= " AND C.created = C.modified ";
			$conditions_worked .= " AND   C.created <> C.modified ";

			$Countnotworked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_not_worked");
			$Countworked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_worked");

			return compact('Countnotworked','Countworked');
        }


        function PresaleFollowupData($SecId,$RecordsPerSec,$UserId='Staff'){

        	$show_completed = (!empty($this->request->query['completed']))? $this->request->query['completed'] : 'false';

        	$custom_step_map = $this->requestAction('dashboards/get_dealer_steps');


			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');
			//echo $group_id;
			if($UserId=='Staff'){
				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}else{
				$userids = $UserId;
			}

			$this->loadModel('ContactStatus');
			$contactstatus = $this->ContactStatus->find('all');
			//die("here");
			$contactstatusarr = array();
			foreach($contactstatus as $key=>$details){
				$contactstatusarr[$details['ContactStatus']['id']] = $details['ContactStatus']['name'];
			}
			//die("here1");

			$PresaleSections = $this->GetPresaleSectionList();
			if(isset($PresaleSections[$SecId]['interval'])){
				$SectionDetails = $PresaleSections[$SecId];
				$From = $SectionDetails['interval']['from'];
				$To = $SectionDetails['interval']['to'];
			}else{
				$From = "NOW()";
				$To = " INTERVAL - 2 MONTH";
			}
			if($RecordsPerSec!='all'){
				$Limit = "LIMIT $RecordsPerSec";
			}else{
				$Limit = ""; //show all
			}

			/* Get All leads either Pre-sale or Post-sale which are created in last two months  - its because we have sections to show upto 45 days. So approx I have choosen 60 days*/
			$conditions = " C.user_id IN(".$userids.") AND C.lead_status='open' AND C.status not in ('Sold/Rolled','Sold/Rolled-Multi Vehicle')  AND C.created <= $From and C.created > $To AND company_id = '$dealer_id'";

			if($show_completed == 'true'){
				$conditions .= " AND C.created <> C.modified";
			}else{
				$conditions .= " AND C.created = C.modified";
			}

// Need to add to condition company_id = $this->Auth->user('dealer_id');
      $q = "SELECT C.user_id,C.id,C.sperson,C.first_name,C.m_name,C.last_name,C.mobile,C.`condition`,C.`year`,C.make,C.model,C.sales_step,C.note_update,C.notes,C.`status`,C.contact_status_id,C.modified,C.lead_status,C.created, C.modified, C.email, C.dnc_status, C.phone, C.mobile,C.work_number, C.spouse_first_name, C.spouse_last_name FROM contacts C USE INDEX (company_id) WHERE $conditions order by id $Limit";
			$LeadsData = $this->Contact->Query($q);

			// $conditions_not_worked = $conditions;
			// $conditions_worked = $conditions;

			// $conditions_not_worked .= " AND C.created = C.modified ";
			// $conditions_worked .= " AND C.created <> C.modified ";

			// $Count = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_not_worked");
			// $this->set("TotalCountNotWorked",$Count[0][0]['count']);

			// $Countworked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_worked");
			// $this->set("TotalCountWorked",$Countworked[0][0]['count']);

			// $this->set("TotalCount", $Count[0][0]['count'] + $Countworked[0][0]['count']);

			/* Categorize the leads record in "Pre-sale" or "Post-sale" */
			$LeadIdArr = array(-1);
			$LeadsDataNew = array();

			foreach($LeadsData as $details)
            {
                //add spouse name in fullname
                $spouseName = "";
                if($details['C']['spouse_first_name'] != '' && $details['C']['spouse_last_name'] != '') {
                    $spouseName = "<br>Spouse: " . $details['C']['spouse_first_name'] . " " . $details['C']['spouse_last_name'];
                }

                $LeadIdArr[] = $details['C']['id'];
				$tmpDetails['C'] = 	array(
					'id'          => $details['C']['id'],
					'ref_num'     => $details['C']['id'],
					'created'     => $details['C']['created'],
					'user_id'     => $details['C']['user_id'],
					'modified'    => $details['C']['modified'],
					'salesperson' => ucwords(strtolower($details['C']['sperson'])),
					'fullname'    => ucwords(strtolower($details['C']['first_name']))." ".ucwords(strtolower($details['C']['m_name']))." ".ucwords(strtolower($details['C']['last_name']) . $spouseName),
					'phone'       => $this->FormatPhoneNumber($details['C']['phone']),
					'mobile'      => $this->FormatPhoneNumber($details['C']['mobile']),
					'work_number' => $this->FormatPhoneNumber($details['C']['work_number']),
					'vehicle'     => $details['C']['condition']." ".$details['C']['year']." ".$details['C']['make']." ".$details['C']['model'],
					'logtype'     => isset($contactstatusarr[$details['C']['contact_status_id']]) ? $contactstatusarr[$details['C']['contact_status_id']] : '',
					'salestep'    => $custom_step_map[ $details['C']['sales_step'] ],
					'step_id'     => $details['C']['sales_step'],
					'dnc_status'  => $details['C']['dnc_status'],
					'comment'     => $details['C']['notes'],
					'status'      => $details['C']['status'],
					'lead_status' => $details['C']['lead_status'],
					'email'       => $details['C']['email']
				);
				$LeadsDataNew[$details['C']['id']] = $tmpDetails;
			}
			//debug($LeadsDataNew);
			$events = $this->GetEventsOfContacts($LeadIdArr);

			foreach($LeadsDataNew as $id=>$details){
				if(isset($events[$details['C']['id']])){
					$event_contacts = $events[$details['C']['id']];
					$event_contacts = end($event_contacts);
					$LeadsDataNew[$id]['E']['start'] = $event_contacts['start'];
				}else{
					$LeadsDataNew[$id]['E']['start'] = '';
				}
			}

			$LeadIdArr = array_unique($LeadIdArr);

			$HistoryData = $this->History->find('all',array('conditions'=>array('contact_id'=>$LeadIdArr),'order'=>'History.created DESC'));
			$HistoryDataNew = array();
			foreach($HistoryData as $history){
				/* CAtegorize in successful and unsuccessful contact */
				if($history['History']['status'] == 'contact'){
					$HistoryDataNew[$history['History']['contact_id']]['successful'][] = $history;
				}else{
					$HistoryDataNew[$history['History']['contact_id']]['unsuccessful'][] = $history;
				}
				/* Check either a successful survey is done */
				if(trim($history['History']['h_type'])=='BDC Survey' && $history['History']['event_id']>0){
					$HistoryDataNew[$history['History']['contact_id']]['SuccessfulSurvey'] = true;
				}

				$HistoryDataNew[$history['History']['contact_id']]['last'] = $history;
				$HistoryDataNew[$history['History']['contact_id']]['all'][] = $history;
			}

			//prx($HistoryDataNew);
			/* post sale Rules

			 - If no call record found then show in "(BDC) No purchase Survey (Attempt 1)" section
			 - If one call is made within 24 hrs but its status is not "contact" (this means call was not successful), then show in "(BDC) (No contact)  No purchase Survey (Attempt 2)" section
			 - If successful call is already made and its more that 24 hrs and less than or equal to 48 hrs then show in "(Sales) (Call 1) Earn Your Business"
			 - If successful call is already made and its more that 48 hrs and less than or equal to 5 days then show in "(Sales) (Call 2) Earn Your Business"
			 - If successful call is already made and its more that 5 days and less than or equal to 7 days then show in "(Sales) (Call 3) Earn Your Business"
			 - If successful call is already made and its more that 7 days and less than or equal to 10 days then show in "(Sales) (Call 4) Earn Your Business"
			 - If successful call is already made and its more that 10 days and less than or equal to 14 days then show in "(Sales) (Call 5) Earn Your Business"
			 - If successful call is already made and its more that 14 days and less than or equal to 21 days then show in "(Sales) (Call 6) Earn Your Business"
			 - If successful call is already made and its more that 21 days and less than or equal to 30 days then show in "(Sales) (Call 7) Earn Your Business"
			 - If successful call is already made and its more that 30 days and less than or equal to 45 days then show in "(Sales) (Call 8) Earn Your Business"
			*/



			$PresaleData = array();
			$SecondsInADay = 86400;
			//prx($LeadsDataNew['presale']);

			/* Presale Followups */
			foreach($LeadsDataNew as $PreSaleLead){
				$created = strtotime($PreSaleLead['C']['created']);
				$Diff = (time()-$created);
				$histories = isset($HistoryDataNew[$PreSaleLead['C']['id']]) ? $HistoryDataNew[$PreSaleLead['C']['id']] : array();
				$PresaleData[$SecId][] = array_merge($PreSaleLead,array('Histories'=>$histories));
				/*if(!isset($HistoryDataNew[$PreSaleLead['C']['id']]['successful']) && $Diff<=$SecondsInADay){ // Still there is no followup taken
					$PresaleData[1][] = array_merge($PreSaleLead,array('Histories'=>$histories));
				}else{
					// First attempt made but was unsuccessful, hence look for second attempt
					if(!isset($HistoryDataNew[$PreSaleLead['C']['id']]['successful']) && isset($HistoryDataNew[$PreSaleLead['C']['id']]['unsuccessful']) && $Diff<=$SecondsInADay){
						$LastUnsuccessfulDetails = end($HistoryDataNew[$PreSaleLead['C']['id']]['unsuccessful']);
						$LastCreatedDate = strtotime($LastUnsuccessfulDetails['History']['created']);
						if(($LastCreatedDate-$created)<=$SecondsInADay){ // Need to make 2nd attempt in 24hrs
							$PresaleData[2][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}

					}elseif(isset($HistoryDataNew[$PreSaleLead['C']['id']]['last'])){ // Now check for 2, 5, 7, 10, 14, 21, 30, 45 days followup
						if(isset($HistoryDataNew[$PreSaleLead['C']['id']]['successful'])){
							$LastUnsuccessfulDetails = end($HistoryDataNew[$PreSaleLead['C']['id']]['successful']);
							$LastCreatedDate = strtotime($LastUnsuccessfulDetails['History']['created']);
							$ContactDiff = ($LastCreatedDate-$created); // this is duration of a successful call
						}else{
							$ContactDiff = 0;
						}
						if($Diff>$SecondsInADay && $Diff<=(2*$SecondsInADay) && (($ContactDiff<$SecondsInADay && $ContactDiff<(2*$SecondsInADay)) || ($ContactDiff>$SecondsInADay && $ContactDiff>(2*$SecondsInADay)))){ // Will come under 48 hrs followup section
							//echo $PreSaleLead['C']['created']."=>".date("Y-m-d H:i:s")."$Diff";
							$PresaleData[3][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(2*$SecondsInADay) && $Diff<=(3*$SecondsInADay) && (($ContactDiff<(2*$SecondsInADay) && $ContactDiff<(3*$SecondsInADay)) || ($ContactDiff>(2*$SecondsInADay) && $ContactDiff>(3*$SecondsInADay)))){  //Will come under 72 hrs followup section
							//echo $PreSaleLead['C']['created']."=>".date("Y-m-d H:i:s")."$Diff";
							$PresaleData[4][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(2*$SecondsInADay) && $Diff<=(5*$SecondsInADay) && (($ContactDiff<(2*$SecondsInADay) && $ContactDiff<(5*$SecondsInADay)) || ($ContactDiff>(2*$SecondsInADay) && $ContactDiff>(5*$SecondsInADay)))){  //Will come under 5 days followup section
							$PresaleData[5][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(5*$SecondsInADay) && $Diff<=(7*$SecondsInADay) && (($ContactDiff<(5*$SecondsInADay) && $ContactDiff<(7*$SecondsInADay)) || ($ContactDiff>(5*$SecondsInADay) && $ContactDiff>(7*$SecondsInADay)))){  //Will come under 7 days followup section
							$PresaleData[6][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(7*$SecondsInADay) && $Diff<=(10*$SecondsInADay)  && (($ContactDiff<(7*$SecondsInADay) && $ContactDiff<(10*$SecondsInADay)) || ($ContactDiff>(7*$SecondsInADay) && $ContactDiff>(10*$SecondsInADay)))){  //Will come under 10 days followup section
							$PresaleData[7][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(10*$SecondsInADay) && $Diff<=(14*$SecondsInADay)  && (($ContactDiff<(10*$SecondsInADay) && $ContactDiff<(14*$SecondsInADay)) || ($ContactDiff>(10*$SecondsInADay) && $ContactDiff>(14*$SecondsInADay)))){  //Will come under 14 days followup section
							$PresaleData[8][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(14*$SecondsInADay) && $Diff<=(21*$SecondsInADay)  && (($ContactDiff<(14*$SecondsInADay) && $ContactDiff<(21*$SecondsInADay)) || ($ContactDiff>(14*$SecondsInADay) && $ContactDiff>(21*$SecondsInADay)))){  //Will come under 21 days followup section
							$PresaleData[9][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(21*$SecondsInADay) && $Diff<=(30*$SecondsInADay) && (($ContactDiff<(21*$SecondsInADay) && $ContactDiff<(30*$SecondsInADay)) || ($ContactDiff>(21*$SecondsInADay) && $ContactDiff>(30*$SecondsInADay)))){  //Will come under 30 days followup section
							$PresaleData[10][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(30*$SecondsInADay) && $Diff<=(45*$SecondsInADay) && (($ContactDiff<(30*$SecondsInADay) && $ContactDiff<(45*$SecondsInADay)) || ($ContactDiff>(30*$SecondsInADay) && $ContactDiff>(45*$SecondsInADay)))){  //Will come under 45 days followup section
							$PresaleData[11][] = array_merge($PreSaleLead,array('Histories'=>$histories));
						}else{
							$PresaleData['other'][] = array_merge($PreSaleLead,array($Diff/$SecondsInADay),$HistoryDataNew[$PreSaleLead['C']['id']]['last']);
						}
					}
				} */
			}
			//prx($PresaleData);
			//prx($PresaleData,$PresaleSections);
            return array($PresaleData,$PresaleSections);
        }


		function PostsaleFollowupCount($SecId,$UserId='Staff'){
			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');

			if($UserId=='Staff'){
				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}else{
				$userids = $UserId;
			}

			$PostsaleSections = $this->GetPostsaleSectionList();
			if(isset($PostsaleSections[$SecId]['interval'])){
				$SectionDetails = $PostsaleSections[$SecId];
				$From = $SectionDetails['interval']['from'];
				$To = $SectionDetails['interval']['to'];
			}else{
				$From = "NOW()";
				$To = " DATE_ADD(NOW(), INTERVAL - 2 MONTH)";
			}



			$conditions = "C.sales_step = '10'   AND C.user_id IN(".$userids.")  AND C.modified <= $From and C.modified > $To";

			$conditions_not_worked = $conditions;
			$conditions_worked = $conditions;

			$conditions_not_worked .= " AND C.status IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle') ";
			$conditions_worked .= " AND C.status NOT IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle') ";


			$Count_not_worked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_not_worked");
			$Countworked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_worked");
			$total_count = $Count_not_worked[0][0]['count'] + $Countworked[0][0]['count'];

			return compact('Count_not_worked','Countworked','total_count');

		}

		function PostsaleFollowupData($SecId,$RecordsPerSec,$UserId='Staff')
        {
        	$show_completed = (!empty($this->request->query['completed']))? $this->request->query['completed'] : 'false';	
			$custom_step_map = $this->requestAction('dashboards/get_dealer_steps');

			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');

			//lead sort settings
			$this->loadModel("DealerSetting");
			$workload_order = $this->DealerSetting->get_settings('workload_order', $dealer_id);
			//debug($workload_order);
			if($workload_order == 'On'){
				$lead_order = " order by modified asc ";
			}else{
				$lead_order = " order by modified desc ";
			}

			if($UserId=='Staff'){
				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}else{
				$userids = $UserId;
			}


			$this->loadModel('ContactStatus');
			$contactstatus = $this->ContactStatus->find('all');
			$contactstatusarr = array();
			foreach($contactstatus as $key=>$details){
				$contactstatusarr[$details['ContactStatus']['id']] = $details['ContactStatus']['name'];
			}

			$PostsaleSections = $this->GetPostsaleSectionList();
			if(isset($PostsaleSections[$SecId]['interval'])){
				$SectionDetails = $PostsaleSections[$SecId];
				$From = $SectionDetails['interval']['from'];
				$To = $SectionDetails['interval']['to'];
			}else{
				$From = "NOW()";
				$To = " DATE_ADD(NOW(), INTERVAL - 2 MONTH)";
			}

			if($RecordsPerSec!='all'){
				$Limit = "LIMIT $RecordsPerSec";
			}else{
				$Limit = ""; //show all
			}

			/* Get All leads either Pre-sale or Post-sale which are created in last two months  - its because we have sections to show upto 45 days. So approx I have choosen 60 days*/
			$conditions = "C.sales_step = '10'   AND C.user_id IN(".$userids.")  AND C.modified <= $From and C.modified > $To";
			
			if($show_completed == 'true'){
				$conditions .= " AND C.status NOT IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle') ";
			}else{
				$conditions .= " AND C.status IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle')  ";
			}

			$LeadsData = $this->Contact->Query("SELECT C.user_id,C.id,C.id,C.sperson,C.first_name,C.m_name,C.last_name,C.mobile,C.work_number,C.phone,C.`condition`,C.`year`,C.make,C.model,C.sales_step,C.notes,C.`status`,C.contact_status_id,C.modified,C.lead_status,C.created, C.modified,C.email,C.dnc_status, C.spouse_first_name, C.spouse_last_name FROM contacts C WHERE $conditions $lead_order $Limit");

			// $conditions_not_worked = $conditions;
			// $conditions_worked = $conditions;

			// $conditions_not_worked .= " AND C.status IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle') ";
			// $conditions_worked .= " AND C.status NOT IN ('Sold/Rolled','Sold/Rolled-Multi Vehicle') ";

			// $Count = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_not_worked");
			// $this->set("TotalCountNotWorked",$Count[0][0]['count']);

			// $Countworked = $this->Contact->Query("SELECT count(C.id) as count FROM contacts C WHERE $conditions_worked");
			// $this->set("TotalCountWorked",$Countworked[0][0]['count']);

			// $this->set("TotalCount", $Count[0][0]['count'] + $Countworked[0][0]['count']);

			/* Categorize the leads record in "Pre-sale" or "Post-sale" */
			$LeadIdArr = array(-1);
			$LeadsDataNew = array();

			foreach($LeadsData as $details)
            {
                //add spouse name in fullname
                $spouseName = "";
                if($details['C']['spouse_first_name'] != '' && $details['C']['spouse_last_name'] != '') {
                    $spouseName = "<br>Spouse: " . $details['C']['spouse_first_name'] . " " . $details['C']['spouse_last_name'];
                }

                $LeadIdArr[] = $details['C']['id'];
				$tmpDetails['C'] = 	array(
					'id'          => $details['C']['id'],
					'ref_num'     => $details['C']['id'],
					'contact_id'  => $details['C']['id'],
					'created'     => $details['C']['created'],
					'modified'    => $details['C']['modified'],
					'user_id'     => $details['C']['user_id'],
					'salesperson' => ucwords(strtolower($details['C']['sperson'])),
					'fullname'    => ucwords(strtolower($details['C']['first_name']))." ".ucwords(strtolower($details['C']['m_name']))." ".ucwords(strtolower($details['C']['last_name']) . $spouseName),
					'phone'       => $this->FormatPhoneNumber($details['C']['phone']),
					'mobile'      => $this->FormatPhoneNumber($details['C']['mobile']),
					'work_number' => $this->FormatPhoneNumber($details['C']['work_number']),
					'vehicle'     => $details['C']['condition']." ".$details['C']['year']." ".$details['C']['make']." ".$details['C']['model'],
					'logtype'     => isset($contactstatusarr[$details['C']['contact_status_id']]) ? $contactstatusarr[$details['C']['contact_status_id']] : '',
					'salestep'    => $custom_step_map[ $details['C']['sales_step'] ],
					'step_id'     => $details['C']['sales_step'],
					'dnc_status'  => $details['C']['dnc_status'],
					'comment'     => $details['C']['notes'],
					'status'      => $details['C']['status'],
					'lead_status' => $details['C']['lead_status'],
					'email'       => $details['C']['email']
				);
				$LeadsDataNew[$details['C']['id']] = $tmpDetails;
			}


			$events = $this->GetEventsOfContacts($LeadIdArr);

			foreach($LeadsDataNew as $id=>$details){
				if(isset($events[$details['C']['contact_id']])){
					$event_contacts = $events[$details['C']['contact_id']];
					$event_contacts = end($event_contacts);
					$LeadsDataNew[$id]['E']['start'] = $event_contacts['start'];
				}else{
					$LeadsDataNew[$id]['E']['start'] = '';
				}
			}



			//prx($LeadsDataNew);

			$LeadIdArr  =array_unique($LeadIdArr);
			//$LeadIds = implode(",",$LeadIdArr);

			$HistoryData = $this->History->find('all',array('conditions'=>array('contact_id'=>$LeadIdArr),'order'=>'History.created DESC'));
			$HistoryDataNew = array();
			foreach($HistoryData as $history){
				/* CAtegorize in successful and unsuccessful contact */
				if($history['History']['status'] == 'contact'){
					$HistoryDataNew[$history['History']['contact_id']]['successful'][] = $history;
				}else{
					$HistoryDataNew[$history['History']['contact_id']]['unsuccessful'][] = $history;
				}
				/* Check either a successful survey is done */
				if(trim($history['History']['h_type'])=='BDC Survey' && $history['History']['event_id']>0){
					$HistoryDataNew[$history['History']['contact_id']]['SuccessfulSurvey'] = true;
				}
				$HistoryDataNew[$history['History']['contact_id']]['last'] = $history;
				$HistoryDataNew[$history['History']['contact_id']]['all'][] = $history;
			}

			//prx($HistoryDataNew);
			/* post sale Rules

			 - If no call record found then show in "(BDC) No purchase Survey (Attempt 1)" section
			 - If one call is made within 24 hrs but its status is not "contact" (this means call was not successful), then show in "(BDC) (No contact)  No purchase Survey (Attempt 2)" section
			 - If successful call is already made and its more that 24 hrs and less than or equal to 48 hrs then show in "(Sales) (Call 1) Earn Your Business"
			 - If successful call is already made and its more that 48 hrs and less than or equal to 5 days then show in "(Sales) (Call 2) Earn Your Business"
			 - If successful call is already made and its more that 5 days and less than or equal to 7 days then show in "(Sales) (Call 3) Earn Your Business"
			 - If successful call is already made and its more that 7 days and less than or equal to 10 days then show in "(Sales) (Call 4) Earn Your Business"
			 - If successful call is already made and its more that 10 days and less than or equal to 14 days then show in "(Sales) (Call 5) Earn Your Business"
			 - If successful call is already made and its more that 14 days and less than or equal to 21 days then show in "(Sales) (Call 6) Earn Your Business"
			 - If successful call is already made and its more that 21 days and less than or equal to 30 days then show in "(Sales) (Call 7) Earn Your Business"
			 - If successful call is already made and its more that 30 days and less than or equal to 45 days then show in "(Sales) (Call 8) Earn Your Business"
			*/


			$PostsaleData = array();
			$SecondsInADay = 86400;
			//prx($LeadsDataNew['presale']);

			/* Presale Followups */
			foreach($LeadsDataNew as $PostSaleLead){
				$created = strtotime($PostSaleLead['C']['created']);
				$Diff = (time()-$created);
				$histories = isset($HistoryDataNew[$PostSaleLead['C']['contact_id']]) ? $HistoryDataNew[$PostSaleLead['C']['contact_id']] : array();
				$PostsaleData[$SecId][] = array_merge($PostSaleLead,array('Histories'=>$histories));

				/*

				if(!isset($HistoryDataNew[$PostSaleLead['C']['id']]['successful']) && $Diff<=$SecondsInADay){ // Still there is no followup taken
					$PostsaleData[1][] = $PostSaleLead;
				}else{
					// First attempt made but was unsuccessful, hence look for second attempt
					if(!isset($HistoryDataNew[$PostSaleLead['C']['id']]['successful']) && isset($HistoryDataNew[$PostSaleLead['C']['id']]['unsuccessful']) && $Diff<=$SecondsInADay){
						$LastUnsuccessfulDetails = end($HistoryDataNew[$PostSaleLead['C']['id']]['unsuccessful']);
						$LastCreatedDate = strtotime($LastUnsuccessfulDetails['History']['created']);
						if(($LastCreatedDate-$created)<=$SecondsInADay){ // Need to make 2nd attempt in 24hrs
							$PostsaleData[2][] = $PostSaleLead;
						}

					}elseif(isset($HistoryDataNew[$PostSaleLead['C']['id']]['last'])){ // Now check for 2, 5, 7, 10, 14, 21, 30, 45 days followup
						if(isset($HistoryDataNew[$PostSaleLead['C']['id']]['successful'])){
							$LastUnsuccessfulDetails = end($HistoryDataNew[$PostSaleLead['C']['id']]['successful']);
							$LastCreatedDate = strtotime($LastUnsuccessfulDetails['History']['created']);
							$ContactDiff = ($LastCreatedDate-$created); // this is duration of a successful call
							$dLast1 = new DateTime($LastCreatedDate['History']['created']);
							$dLast2 = new DateTime();
							$ContactDiffMonths = $dLast1->diff($dLast2)->m;
						}else{
							$ContactDiff = 0;
							$ContactDiffMonths = 0;
						}
						$d1 = new DateTime($PostSaleLead['C']['created']);
						$d2 = new DateTime();
						$DiffMonths = $d1->diff($d2)->m;
						//$Diff = ($LastCreatedDate-$created);
						if($Diff>(5*$SecondsInADay) && $Diff<=(7*$SecondsInADay) && (($ContactDiff<(5*$SecondsInADay) && $ContactDiff<(7*$SecondsInADay)) || ($ContactDiff>(5*$SecondsInADay) && $ContactDiff>(7*$SecondsInADay)))){ // Will come under 7 days followup section
							$PostsaleData[5][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(7*$SecondsInADay) && $Diff<=(10*$SecondsInADay) && (($ContactDiff<(7*$SecondsInADay) && $ContactDiff<(10*$SecondsInADay)) || ($ContactDiff>(7*$SecondsInADay) && $ContactDiff>(10*$SecondsInADay)))){ // Will come under 10 days followup section
							$PostsaleData[6][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(10*$SecondsInADay) && $Diff<=(14*$SecondsInADay)  && (($ContactDiff<(10*$SecondsInADay) && $ContactDiff<(14*$SecondsInADay)) || ($ContactDiff>(10*$SecondsInADay) && $ContactDiff>(14*$SecondsInADay)))){ // Will come under 14 days followup section
							$PostsaleData[7][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(14*$SecondsInADay) && $Diff<=(30*$SecondsInADay)  && (($ContactDiff<(14*$SecondsInADay) && $ContactDiff<(30*$SecondsInADay)) || ($ContactDiff>(14*$SecondsInADay) && $ContactDiff>(30*$SecondsInADay)))){ //Will come under 30 days followup section
							$PostsaleData[9][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(30*$SecondsInADay) && $Diff<=(45*$SecondsInADay)  && (($ContactDiff<(30*$SecondsInADay) && $ContactDiff<(45*$SecondsInADay)) || ($ContactDiff>(30*$SecondsInADay) && $ContactDiff>(45*$SecondsInADay)))){ // Will come under 45 days followup section
							$PostsaleData[10][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($Diff>(45*$SecondsInADay) && $Diff<=(60*$SecondsInADay)  && (($ContactDiff<(45*$SecondsInADay) && $ContactDiff<(60*$SecondsInADay)) || ($ContactDiff>(45*$SecondsInADay) && $ContactDiff>(60*$SecondsInADay)))){  Will come under 60 days followup section
							$PostsaleData[11][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>2 && $DiffMonths<=6  && (($ContactDiffMonths<2 && $ContactDiffMonths<6) || ($ContactDiffMonths>2 && $ContactDiffMonths>6))){ // Will come under 6 months follow up section
							$PostsaleData[12][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>6 && $DiffMonths<=12  && (($ContactDiffMonths<6 && $ContactDiffMonths<12) || ($ContactDiffMonths>6 && $ContactDiffMonths>12))){  Will come under 12 months follow up section
							$PostsaleData[13][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>12 && $DiffMonths<=18  && (($ContactDiffMonths<12 && $ContactDiffMonths<18) || ($ContactDiffMonths>12 && $ContactDiffMonths>18))){  Will come under 18 months follow up section
							$PostsaleData[14][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>18 && $DiffMonths<=24  && (($ContactDiffMonths<18 && $ContactDiffMonths<24) || ($ContactDiffMonths>18 && $ContactDiffMonths>24))){  Will come under 24 months follow up section
							$PostsaleData[15][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>24 && $DiffMonths<=30   && (($ContactDiffMonths<24 && $ContactDiffMonths<30) || ($ContactDiffMonths>24 && $ContactDiffMonths>30))){  Will come under 30 months follow up section
							$PostsaleData[16][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}elseif($DiffMonths>30 && $DiffMonths<=36  && (($ContactDiffMonths<30 && $ContactDiffMonths<36) || ($ContactDiffMonths>30 && $ContactDiffMonths>36))){  Will come under 36 months follow up section
							$PostsaleData[17][] = array_merge($PostSaleLead,array('Histories'=>$histories));
						}else{
							$PostsaleData['other'][] = array_merge($PostSaleLead,array($Diff/$SecondsInADay),$HistoryDataNew[$PostSaleLead['C']['id']]['last']);
						}
					}
				} */
			}
			//echo "<pre>";
			//print_r($PostsaleData);
			//prx($PostsaleData);
			//prx($PostsaleData,$PostsaleSections);
            return array($PostsaleData,$PostsaleSections);
        }


		function GetPresaleSectionList(){
			$dealer_id = $this->Auth->user('dealer_id');
			$this->loadModel('WorkloadSetting');
			return $this->WorkloadSetting->GetWorkloadSections('presale',$dealer_id);
		}



		function GetPostsaleSectionList(){
			$dealer_id = $this->Auth->user('dealer_id');
			$this->loadModel('WorkloadSetting');
			return $this->WorkloadSetting->GetWorkloadSections('postsale',$dealer_id);
		}

		function GetEventsCount($SecId,$UserId='Staff'){

			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');
			$zone = $this->Auth->User('zone');
			date_default_timezone_set($zone);

			if($UserId=='Staff'){
				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}else{
				$userids = $UserId;
			}

			$PresaleSections = $this->GetEventSectionList();
			//debug($PresaleSections);
			if(isset($PresaleSections[$SecId]['cond'])){
				$SectionDetails = $PresaleSections[$SecId];
				$SQLCond = $SectionDetails['cond'];
			}else{
				$SQLCond = "C.start<'".date('Y-m-d H:i:s')."'";
			}

			$conditions = " C.user_id IN(".$userids.") AND $SQLCond";

			$Count = $this->Contact->Query("SELECT count(*) as count FROM events C WHERE $conditions");
			return $Count;
		}

		function GetEvents($SecId,$RecordsPerSec,$UserId = 'Staff')
		{
			$dealer_id = $this->Auth->user('dealer_id');
			$group_id = $this->Auth->user('group_id');
			$zone = $this->Auth->User('zone');
			date_default_timezone_set($zone);

			if($UserId=='Staff'){
				if($group_id!=3){ //manager
					App::import('Model', 'User');
					$User = new User();
					$users = $User->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'active'=>1),'fields'=>array('id')));
					$userids = array('-1');// means nothing
					foreach($users as $key=>$details){
						$userids[] = $details['User']['id'];
					}
					$userids = implode(",",$userids);
				}else{
					$userids = $this->Auth->User('id');
				}
			}else{
				$userids = $UserId;
			}

			$this->loadModel('ContactStatus');
			$contactstatus = $this->ContactStatus->find('all');

			$contactstatusarr = array();
			foreach($contactstatus as $key=>$details){
				$contactstatusarr[$details['ContactStatus']['id']] = $details['ContactStatus']['name'];
			}


			$PresaleSections = $this->GetEventSectionList();
			$OrderBy = 'C.start ASC';

			if(isset($PresaleSections[$SecId]['cond'])){
				$SectionDetails = $PresaleSections[$SecId];
				$SQLCond = $SectionDetails['cond'];
			}else{
				$SQLCond = "C.start<'".date('Y-m-d H:i:s')."'";
				//Adding condition in query on base of start date and end date,
				//entered by user using periodic events search.
				if(isset($this->start_date)){
					$SQLCond = "C.start >= '".$this->start_date."' AND C.start <= '".$this->end_date."'AND C.status NOT IN('Completed','Canceled')";
					$OrderBy = 'C.end ASC';
				}
			}

			if($RecordsPerSec!='all'){
				$Limit = "LIMIT $RecordsPerSec";
			}else{
				$Limit = ""; //show all
			}

			/* Get All leads either Pre-sale or Post-sale which are created in last two months  - its because we have sections to show upto 45 days. So approx I have choosen 60 days*/
			$conditions = " C.user_id IN(".$userids.") AND $SQLCond";

			$LeadsData = $this->Contact->Query("SELECT C.*,CNT.notes,CNT.condition,CNT.year, CNT.phone, CNT.mobile, CNT.work_number, CNT.make,CNT.model,CNT.email, CNT.dnc_status, CNT.spouse_first_name, CNT.spouse_last_name, CNT.condition_trade, CNT.year_trade, CNT.make_trade, CNT.model_trade FROM events C INNER JOIN contacts CNT ON CNT.id= C.contact_id WHERE $conditions order by $OrderBy $Limit");
			$Count = $this->Contact->Query("SELECT count(*) as count FROM events C WHERE $conditions");
			$this->set("TotalCount",$Count[0][0]['count']);

			$LeadIdArr    = array(-1);
			$LeadsDataNew = array();

			foreach($LeadsData as $details)
            {
                //add spouse name in fullname
                $spouseName = "";
                if($details['CNT']['spouse_first_name'] != '' && $details['CNT']['spouse_last_name'] != '') {
                    $spouseName = "<br>Spouse: " . $details['CNT']['spouse_first_name'] . " " . $details['CNT']['spouse_last_name'];
                }

                $trade = "";
                if($details['CNT']['condition_trade'] != 'any' || $details['CNT']['year_trade'] != '0' || $details['CNT']['make_trade'] != 'Any Make' || $details['CNT']['model_trade'] != 'Any Model') {
                	$trade = "<hr><b>Trade In: </b>".$details['CNT']['condition_trade'] . " " . $details['CNT']['year_trade'] . " " . $details['CNT']['make_trade'] . " " . $details['CNT']['model_trade'];
                }

				$LeadIdArr[] = $details['C']['contact_id'];
                $tmpDetails['C'] = array(
					'id'          => $details['C']['id'],
					'contact_id'  => $details['C']['contact_id'],
					'ref_num'     => $details['C']['id'],
					'start'       => $details['C']['start'],
					'modified'    => $details['C']['modified'],
					'user_id'     => $details['C']['user_id'],
					'end'         => $details['C']['end'],
					'salesperson' => ucwords($details['C']['sperson']),
					'fullname'    => ucwords($details['C']['first_name']." ".$details['C']['m_name']." ".$details['C']['last_name'].$spouseName),
					'phone'       => $this->FormatPhoneNumber($details['CNT']['phone']),
					'mobile'      => $this->FormatPhoneNumber($details['CNT']['mobile']),
					'work_number' => $this->FormatPhoneNumber($details['CNT']['work_number']),
					'vehicle'     => "<b>Interested: </b>".$details['CNT']['condition']." ".$details['CNT']['year']." ".$details['CNT']['make']." ".$details['CNT']['model'] . " " . $trade,
					'logtype'     => isset($contactstatusarr[$details['C']['contact_status_id']]) ? $contactstatusarr[$details['C']['contact_status_id']] : '',
					'salestep'    => $details['C']['sales_step'],
					'title'       => $details['C']['title'],
					'details'     => $details['C']['details'],
					'comment'     => $details['CNT']['notes'],
					'dnc_status'  => $details['CNT']['dnc_status'],
					'status'      => $details['C']['status'],
					'lead_status' => $details['C']['lead_status'],
					'email'       => $details['CNT']['email']
				);
				$LeadsDataNew[$details['C']['id']] = $tmpDetails;
			}

			$LeadIdArr = array_unique($LeadIdArr);

			$HistoryData = $this->History->find('all',array('conditions'=>array('contact_id'=>$LeadIdArr),'order'=>'created DESC'));
			$HistoryDataNew = array();
			foreach($HistoryData as $history){
				/* Check either a successful survey is done */
				if(trim($history['History']['h_type'])=='BDC Survey' && $history['History']['event_id']>0){
					$HistoryDataNew[$history['History']['contact_id']]['SuccessfulSurvey'] = true;
				}

				$HistoryDataNew[$history['History']['contact_id']]['last'] = $history;
				$HistoryDataNew[$history['History']['contact_id']]['all'][] = $history;
			}

			$PresaleData = array();
			$SecondsInADay = 86400;

			/* Presale Followups */
			foreach($LeadsDataNew as $PreSaleLead){
				$created = strtotime($PreSaleLead['C']['start']);
				$Diff = (time()-$created);
				$histories = isset($HistoryDataNew[$PreSaleLead['C']['contact_id']]) ? $HistoryDataNew[$PreSaleLead['C']['contact_id']] : array();
				$PresaleData[$SecId][] = array_merge($PreSaleLead,array('Histories'=>$histories));

			}

            return array($PresaleData,$PresaleSections);
		}


		function GetEventSectionList(){
			return array(
				'1'=>array('name'=>'Due Today','cond'=>"C.start >= '".date('Y-m-d 00:00:00')."' AND C.start < '". date('Y-m-d 23:59:59')."' AND C.status NOT IN('Completed','Canceled')"),
				'2'=>array('name'=>'Over Due','cond'=>"C.start <= '".date('Y-m-d H:i:s')."' AND C.status NOT IN('Completed','Canceled')")
			);

		}

		function GetEventsOfContacts($contact_ids){
			$this->loadModel('Event');
			$TableAlias = 'E';
			//echo "SELECT `start`,`end`,contact_id,sperson from events $TableAlias  WHERE $TableAlias.contact_id IN(".implode(",",$contact_ids).")";
			$events = $this->Event->query("SELECT `start`,`end`,contact_id,sperson from events $TableAlias  WHERE  $TableAlias.status NOT IN   ('Completed','Canceled')  AND   $TableAlias.contact_id IN(".implode(",",$contact_ids).")");
			$eventsNew = array();
			foreach($events as $details){
				$eventsNew[$details['E']['contact_id']][] = $details['E'];
			}
			$events = $eventsNew;
			return $events;
		}

		// Logs report based on created date

	public function log_created_report($stuff, $owner_id = null,  $s_date = null, $e_date = null,$export = '')
	{
		$this->layout = null;
		if($s_date == null && $e_date == null) { // by default yesterday date
			$s_date = date("Y-m-d",(time()-86400));
			$e_date = date("Y-m-d",(time()-86400));
		}

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

		$conditions = array('Contact.created >=' => $f_date,'Contact.created <=' => $l_date,'Contact.company_id' => $dealer_id,'Contact.status <>' => 'Duplicate-Closed');

		if(!empty($stuff) && is_numeric($stuff))
		{
			$conditions['Contact.user_id'] = $stuff;
		}

		if(!empty($owner_id) && !is_null($owner_id) && is_numeric($owner_id))
		{
			$conditions['Contact.owner_id'] = $owner_id;
		}

		$all_contacts = $this->Contact->find('all',array('fields' =>$fields,'conditions' => $conditions));

		$contact_ids = Set::classicExtract($all_contacts,'{n}.Contact.id');

		$events = $this->Event->find('all', array(
			'recursive' => -1,
			'order' => array('Event.modified DESC'),
			'fields' => array('Event.contact_id', 'Event.start'),
			'conditions' => array(
				'Event.contact_id' => $contact_ids,
				'Event.status <>' => array('Completed','Canceled')
				)
			)
		);

		$next_acvt = array();

		foreach($events as $evt) {
			$next_acvt[$evt['Event']['contact_id']] = $evt['Event']['start'];
		}

		$this->set('next_acvt',$next_acvt);
		$this->set('export',false);
		$this->set('all_contacts',$all_contacts);

		if($export) {
			$this->layout = false;
			$this->set('export',true);
			$html = $this->render();
			$this->export($html);
			die;
		}
	}

	/**
	 * This method is used to search events on basis of start and end date,
	 * Selected by user in events search
	 *
	 * The fallowing params are only declared.
	 * Static values passed and GetEvents function required them.
	 * So, to use old functionaliy they are added, they do not effect this functionality.
	 * @param Int $SecId Section id.
	 * @param Int $RecordsPerSec Records Per Sec.
	 * @param String $UserId UserId value.
	 * @author Abha Sood Negi
	 */
	public function doEventsPeriodSearch($SecId=3,$RecordsPerSec='all',$UserId='Staff') {
		$this->start_date  = $this->request->data['event_s_d_range'];
		$this->end_date  = $this->request->data['event_e_d_range'];

		$this->layout=false;
		list($EventData,$EventSections) = $this->GetEvents($SecId,$RecordsPerSec,$UserId);

		$this->set('EventData',$EventData);
		$this->set('EventSections',$EventSections);
		$this->set("RecordsPerSec",$RecordsPerSec);
		$this->set('SecId',$SecId);
	}
}
