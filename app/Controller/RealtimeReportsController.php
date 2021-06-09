<?php
class RealtimeReportsController extends AppController {

	public $uses = array('Contact','ContactStatus');
	public $components = array('RequestHandler');

	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function all_event_details($event_type, $user_id) {
		$dealer_id = $this->Auth->user('dealer_id');
    	$zone = $this->Auth->User('zone');
    	$fields = array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.first_name',
			'Contact.last_name',
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
			'Contact.contact_status_id',
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
			'Contact.user_id',
			'Event.id',
			'Event.start',
			'Event.status',
			'Event.title',

		);
		date_default_timezone_set($zone);

		$report_type = "";

		if($event_type == 'todays_event'){
			$report_type = "Todays Events";

			if($user_id != 'all'){
				$event_conditions = $this->Contact->today_event_count($zone, $user_id, 'User' );
			}else{
				$event_conditions = $this->Contact->today_event_count($zone, $dealer_id, 'Dealer' );
			}

		}else if($event_type == 'overdue'){
			$report_type = "Past Due Events";
			if($user_id != 'all'){
				$event_conditions = $this->Contact->overdue_event_count($zone, $user_id, 'User', $dealer_id );
			}else{
				$event_conditions = $this->Contact->overdue_event_count($zone, $dealer_id, 'Dealer' );
			}
		}


		//debug($event_conditions);


		//$this->Event->bindModel(array('belongsTo'=>array('User')), false);
		$this->Event->bindModel(array('belongsTo'=>array('User'=>array('foreignKey'=>false, 'conditions'=>array("Contact.user_id = User.id")))), false);
		$this->paginate = array(
			'conditions' => $event_conditions,
			'fields'=>$fields,
			'order'=>'Event.start ASC',
			'limit' => 30,
		);
		$events = $this->Paginate('Event');
		$this->set('events', $events);

		$this->set('report_type', $report_type);

		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('list', array('fields'=>array('SalesStep.id','SalesStep.step') ));
		$this->set('sales_steps', $sales_steps);

		$this->loadModel('ContactStatus');
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name') ));
		$this->set('ContactStatus', $ContactStatus);




	}



	public function crmreport_all_event_details($event_type, $user_id, $dealer_id = null) {

		$dealer_info = $this->get_dealer_id_dealer_details($dealer_id);

    	$zone = $dealer_info['User']['zone'];
    	$fields = array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.first_name',
			'Contact.last_name',
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
			'Contact.contact_status_id',
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
			'Contact.user_id',
			'Event.id',
			'Event.start',
			'Event.status',
			'Event.title',

		);
		date_default_timezone_set($zone);

		$report_type = "";

		if($event_type == 'todays_event'){
			$report_type = "Todays Events";

			if($user_id != 'all'){
				$event_conditions = $this->Contact->today_event_count($zone, $user_id, 'User' );
			}else{
				$event_conditions = $this->Contact->today_event_count($zone, $dealer_id, 'Dealer' );
			}

		}else if($event_type == 'overdue'){
			$report_type = "Past Due Events";
			if($user_id != 'all'){
				$event_conditions = $this->Contact->overdue_event_count($zone, $user_id, 'User', $dealer_id );
			}else{
				$event_conditions = $this->Contact->overdue_event_count($zone, $dealer_id, 'Dealer' );
			}
		}


		//debug($event_conditions);


		//$this->Event->bindModel(array('belongsTo'=>array('User')), false);
		$this->Event->bindModel(array('belongsTo'=>array('User'=>array('foreignKey'=>false, 'conditions'=>array("Contact.user_id = User.id")))), false);
		$this->paginate = array(
			'conditions' => $event_conditions,
			'fields'=>$fields,
			'order'=>'Event.start ASC',
			'limit' => 30,
		);
		$events = $this->Paginate('Event');
		$this->set('events', $events);

		$this->set('report_type', $report_type);

		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('list', array('fields'=>array('SalesStep.id','SalesStep.step') ));
		$this->set('sales_steps', $sales_steps);

		$this->loadModel('ContactStatus');
		$ContactStatus = $this->ContactStatus->find('list', array('fields'=>array('ContactStatus.id','ContactStatus.name') ));
		$this->set('ContactStatus', $ContactStatus);


		$this->render("all_event_details");

	}



	public function crmreport_all_emails_details() {

		$this->all_emails_details();
		$this->render("all_emails_details");
	}


	public function all_emails_details() {


		$dealer_id = $this->request->query['dealer_id'];
		$dealer_info = $this->get_dealer_id_dealer_details($dealer_id);

		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id,  $dealer_info['User']['step_procces']);
		$this->set('custom_step_map', $custom_step_map);


		//$user_ids = explode(",", $this->request->query['user_id'] );
		$user_ids =  $this->request->query['user_id'];
		$s_date = $this->request->query['s_date'];
		$e_date = $this->request->query['e_date'];
		$contact_status_id = $this->request->query['contact_status_id'];
		//debug( $user_ids );

		if( $contact_status_id != 'mgr' ){
			$result = $this->email_sent($user_ids, $dealer_id, $s_date, $e_date, $contact_status_id);
			//debug($result);
		}else{


			$result = $this->Contact->query('
	      SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
			,Contact.mgr_signoff

	        FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
	        LEFT JOIN manager_messages as ManagerMessage ON (`Contact`.`id` = `ManagerMessage`.`contact_id`)

	        WHERE `Contact`.`user_id` in ('.$user_ids.')
	        AND date_format(`ManagerMessage`.`created`,\'%Y-%m-%d\') between :s_date and :e_date
	        AND `Contact`.`company_id` = :company_id
	        AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
	        ',array('company_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));



		}





		$this->set('contacts', $result);
	}


	public function email_sent($user_cond, $dealer_id, $s_date, $e_date, $contact_status_id){

		$emailsent = $this->Contact->query('
		SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
			,Contact.mgr_signoff
		FROM  contacts as Contact
		LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
		LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
		WHERE
		`Contact`.`user_id` in ('.$user_cond.') AND
		 `Contact`.`company_id` = :company_id  AND   date_format(`UserEmailLog`.`send_date`,\'%Y-%m-%d\') between :s_date and :e_date
		AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
		GROUP BY contact_id',array('company_id'=>$dealer_id,'s_date'=> $s_date, 'e_date'=> $e_date   ));

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
        SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
        FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)


        WHERE  `Contact`.`user_id` in ('.$user_cond.')

        '. $elog_con_str .'
        AND date_format(`Contact`.`modified`,\'%Y-%m-%d\') between :s_date and :e_date
        AND `Contact`.`company_id` = :company_id
        AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
        AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
        ',array('company_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));

        // debug( $emailsent );
       // debug( $sent_status );
        $ar = array_merge($emailsent, $sent_status);
        $all_leads = array();
        foreach($ar as $cnt){
        	$all_leads[ $cnt['Contact']['id'] ] = $cnt;
        }
        // debug( $all_leads );

        return $all_leads;

	}

	public function crmreport_all_call_details(){
		$this->all_call_details();
		$this->render("all_call_details");
	}


	public function text_status_details(){
		$user_ids = explode(",", $this->request->query['user_id'] );
		//debug($user_ids);
		$dealer_info = $this->get_dealer_id_user_id($user_ids['0']);
		$dealer_id = $dealer_info['User']['dealer_id'];
		$step_procces = $dealer_info['User']['step_procces'];
		$type = $this->request->query['type'];

		$s_date = $this->request->query['s_date']." 00:00:00";
		$e_date = $this->request->query['e_date']." 23:59:59";

		$zone = $dealer_info['User']['zone'];
		date_default_timezone_set($zone);

		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $step_procces );
		$this->set('custom_step_map', $custom_step_map);


		if($type == 'out'){

		/*	$q_new_in = $this->Contact->query('
			SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
			WHERE `Contact`.`user_id` in ('.$this->request->query['user_id'].')
			AND `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			(
				(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'SMS Text- Out\'      )) OR
				(`History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'SMS Text- Out\'      ))
			); '
			);
			$this->set('contacts', $q_new_in);*/

			$q_new_in = $this->Contact->query('
				SELECT Contact.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`) 

				WHERE `Contact`.`user_id` in ('.$this->request->query['user_id'].')
				AND `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'
				
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'SMS Text- Out\' )
				UNION
				SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`, Contact.created
				,Contact.mgr_signoff

				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`) 
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id` AND `History`.`h_type` = \'Lead\') 
				WHERE `User`.`group_id` IN (1,2,3,4,5,6,10,11) AND  User.active = 1 
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `History`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'SMS Text- Out\'  );
				'
			);
			$this->set('contacts', $q_new_in);

		}else if($type == 'in'){


			/*$q_new_in = $this->Contact->query('
			SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
			WHERE `Contact`.`user_id` in ('.$this->request->query['user_id'].')
			AND `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			(
				(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'SMS Text-In\'      )) OR
				(`History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'SMS Text-In\'      ))

			); '
			);

			$this->set('contacts', $q_new_in);*/

			$q_new_in = $this->Contact->query('
				SELECT Contact.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`) 

				WHERE `Contact`.`user_id` in ('.$this->request->query['user_id'].')
				AND `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'
				
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'SMS Text-In\' )
				UNION
				SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`, Contact.created
				,Contact.mgr_signoff

				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`) 
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id` AND `History`.`h_type` = \'Lead\') 
				WHERE `User`.`group_id` IN (1,2,3,4,5,6,10,11) AND  User.active = 1 
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `History`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'SMS Text-In\'  );
				'
			);
			$this->set('contacts', $q_new_in);

		}
	}


	public function all_call_details() {

		//	$dealer_id = $this->Auth->user('dealer_id');

		$user_ids = explode(",", $this->request->query['user_id'] );
		$dealer_info = $this->get_dealer_id_user_id($user_ids['0']);
		$dealer_id = $dealer_info['User']['dealer_id'];
		$step_procces = $dealer_info['User']['step_procces'];


    	$zone = $dealer_info['User']['zone'];
		date_default_timezone_set($zone);

		$custom_step_map = $this->ContactStatus->get_dealer_steps($dealer_id, $step_procces );
		$this->set('custom_step_map', $custom_step_map);

		$user_ids =  $this->request->query['user_id'];
		$s_date = $this->request->query['s_date']." 00:00:00";
		$e_date = $this->request->query['e_date']." 23:59:59";
		$type = $this->request->query['type'];



		//debug( $user_ids );

		if($type == 'new_in'){
			/*
			$q_new_in = $this->Contact->query('
				SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
				WHERE `Contact`.`created` between \''.$s_date.'\' and \''.$e_date.'\'

				AND  `Contact`.`id` not in (
					SELECT id from contacts as ct where
					`ct`.`created` between \''.$s_date.'\' and \''.$e_date.'\'
					AND xml_weblead = 1 AND  `ct`.`created` = `ct`.`modified`
					AND `Contact`.`company_id` = \''.$dealer_id.'\'
					AND `Contact`.`user_id` in ('.$user_ids.')
				)
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `Contact`.`user_id` in ('.$user_ids.') AND
				(
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header in (\'Inbound Call (Open)\', \'Web Lead (Open)\')      )) OR
					( `History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header in (\'Inbound Call (Open)\', \'Web Lead (Open)\')      )) OR
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`lead_call_types` = \'inbound\' )
				)
				GROUP BY `Contact`.`id` ');
			*/

			$q_new_in = $this->Contact->query('
				SELECT Contact.id, Contact.id as lead_id,  User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				 Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				WHERE `Contact`.`created` between \''.$s_date.'\' and \''.$e_date.'\'

				AND  `Contact`.`id` not in (
					SELECT id from contacts as ct where
					`ct`.`created` between \''.$s_date.'\' and \''.$e_date.'\'
					AND xml_weblead = 1 AND  `ct`.`created` = `ct`.`modified`
					AND `Contact`.`company_id` = \''.$dealer_id.'\'
					AND `Contact`.`user_id` in ('.$user_ids.')
				)
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `Contact`.`user_id` in ('.$user_ids.') AND
				(
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header in (\'Inbound Call (Open)\', \'Web Lead (Open)\')      )) OR
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`lead_call_types` = \'inbound\' )
				)

				UNION

				SELECT  History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`,  `History`.`comment`,
				 Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
				WHERE `Contact`.`created` between \''.$s_date.'\' and \''.$e_date.'\'

				AND  `Contact`.`id` not in (
					SELECT id from contacts as ct where
					`ct`.`created` between \''.$s_date.'\' and \''.$e_date.'\'
					AND xml_weblead = 1 AND  `ct`.`created` = `ct`.`modified`
					AND `Contact`.`company_id` = \''.$dealer_id.'\'
					AND `Contact`.`user_id` in ('.$user_ids.')
				)
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND `Contact`.`user_id` in ('.$user_ids.') AND
				(
					( `History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header in (\'Inbound Call (Open)\', \'Web Lead (Open)\')      )) 
				);');


			//debug( $q_new_in );
			$this->set('contacts', $q_new_in);
		}else if($type == 'new_out'){

			/*
			$q_new_out = $this->Contact->query('
				SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
				WHERE `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'
				AND `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
				(
					(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'Outbound Call (Open)\'      )) OR
					(`History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'Outbound Call (Open)\'      )) OR
					(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`lead_call_types` = \'outbound\' )
				)
				GROUP BY `Contact`.`id`;
			');
			*/


			$q_new_out = $this->Contact->query('
				SELECT Contact.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
				WHERE `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'
				AND `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
				(
					(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE header=\'Outbound Call (Open)\'      )) OR
					(`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\'  AND `Contact`.`lead_call_types` = \'outbound\' )
				)
				UNION
				SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,  `History`.`created`, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`  AND `History`.`h_type` = \'Lead\' )
				WHERE `Contact`.`created`  between \''.$s_date.'\' and \''.$e_date.'\'
				AND `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
				(
					(`History`.`created` between \''.$s_date.'\' and \''.$e_date.'\'  AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE header=\'Outbound Call (Open)\'      ))	
				)
				
			');
			// debug( $q_new_out );
			$this->set('contacts', $q_new_out);
		}else if($type == 'existing_in'){
			//$s_date = $s_date." 00:00:00";
			//$e_date = $e_date." 23:59:59";

			$q_existing_in = $this->Contact->query('

				SELECT Contact.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				 Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff , \'Contact\'
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			WHERE `Contact`.`user_id` in ('.$user_ids.')
			AND `Contact`.`created` < \''.date("Y-m-d H:i:s").'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\' AND `Contact`.`status` in (
			SELECT `name` FROM lead_statuses WHERE header in (\'Sold FollowUp In (Closed)\',\'Inbound Call (Open)\')
			)
			UNION

			SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				 Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`, Contact.created
				,Contact.mgr_signoff , History.id
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id` AND `History`.`h_type` = \'Lead\' )
			WHERE `History`.`user_id` in ('.$user_ids.')
			AND `Contact`.`created` < \''.date("Y-m-d H:i:s").'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`History`.`created` between \''.$s_date.'\' and \''.$e_date.'\' AND `History`.`status` in (
				SELECT `name` FROM lead_statuses WHERE header in (\'Sold FollowUp In (Closed)\',\'Inbound Call (Open)\')
			);

			');
			// debug( $q_existing_in );
			// $q_existing_in_ar = array();
			// foreach($q_existing_in as $q_existing_i){
			// 	$q_existing_in_ar[] = array('Contact'=>$q_existing_i['0']);
			// }
			$this->set('contacts', $q_existing_in);
		}else if( $type == 'existing_out'){

			//$s_date = $s_date." 00:00:00";
			//$e_date = $e_date." 23:59:59";

			$q_existing_out = $this->Contact->query('
			 SELECT Contact.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff , \'Contact\'
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			WHERE `Contact`.`user_id` in ('.$user_ids.')
			AND `Contact`.`created` < \''.date("Y-m-d H:i:s").'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`Contact`.`modified` >= \''.$s_date.'\' and `Contact`.`modified` <= \''.$e_date.'\' AND `Contact`.`status` in (
			SELECT `name` FROM lead_statuses WHERE header in (\'Sold FollowUp Out (Closed)\',\'Outbound Call (Open)\')
			)
			UNION

			SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`, Contact.created
				,Contact.mgr_signoff , History.id
			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`  AND `History`.`h_type` = \'Lead\')
			WHERE `History`.`user_id` in ('.$user_ids.')
			AND `Contact`.`created` < \''.date("Y-m-d H:i:s").'\'

			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`History`.`created` >= \''.$s_date.'\' and `History`.`created` <= \''.$e_date.'\' AND `History`.`status` in (
				SELECT `name` FROM lead_statuses WHERE header in (\'Sold FollowUp Out (Closed)\',\'Outbound Call (Open)\')
			);
			');

			//debug( $q_existing_out );
			// $q_existing_out_ar = array();
			// foreach($q_existing_out as $q_existing_o){
			// 	$q_existing_out_ar[] = array('Contact'=>$q_existing_o['0']);
			// }
			$this->set('contacts', $q_existing_out);

		}else if( $type == 'closed_out'){

			/*
			$q_existing_out = $this->Contact->query('
				SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
				WHERE `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\'
				AND  `Contact`.`created` < \''.$s_date.'\'
				AND
				(
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\' AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE `name` in ( \'Unable to Contact-Call Out\', \'No longer interested-Closed\', \'No Response-Closed\' , \'Call later this month-Closed\', \'Call later this year-Closed\')      )) OR
					( `History`.`created` between \''.$s_date.'\' and \''.$e_date.'\' AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE `name` in ( \'Unable to Contact-Call Out\' , \'No longer interested-Closed\', \'No Response-Closed\', \'Call later this month-Closed\', \'Call later this year-Closed\')      ))
				)
				GROUP BY `Contact`.`id`

			');
			*/

			$q_existing_out = $this->Contact->query('
				SELECT Contact.id, Contact.id as lead_id,  User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				WHERE `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\'
				AND  `Contact`.`created` < \''.$s_date.'\'
				AND
				(
					( `Contact`.`modified` between \''.$s_date.'\' and \''.$e_date.'\' AND `Contact`.`status` in (      SELECT `name` FROM lead_statuses WHERE `name` in ( \'Unable to Contact-Call Out\', \'No longer interested-Closed\', \'No Response-Closed\' , \'Call later this month-Closed\', \'Call later this year-Closed\')      )) 
				)
				UNION
				SELECT History.id, Contact.id as lead_id, User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `History`.`comment`,
				Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, `History`.`created`,  Contact.created
				,Contact.mgr_signoff
				FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
				LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id` AND `History`.`h_type` = \'Lead\')
				WHERE `Contact`.`user_id` in ('.$user_ids.')
				AND `Contact`.`company_id` = \''.$dealer_id.'\'
				AND  `Contact`.`created` < \''.$s_date.'\'
				AND
				(
					( `History`.`created` between \''.$s_date.'\' and \''.$e_date.'\' AND `History`.`status` in (       SELECT `name` FROM lead_statuses WHERE `name` in ( \'Unable to Contact-Call Out\' , \'No longer interested-Closed\', \'No Response-Closed\', \'Call later this month-Closed\', \'Call later this year-Closed\')      ))
				)
			');



			//debug( $q_existing_out );
			$this->set('contacts', $q_existing_out);

		}else if( $type == 'mgr'){

			$q_mgr = $this->Contact->query('
				SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff

			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN manager_messages as ManagerMessage ON (`Contact`.`id` = `ManagerMessage`.`contact_id`)
			WHERE `Contact`.`user_id` in ('.$user_ids.')
			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`ManagerMessage`.`created` between \''.$s_date.'\' and \''.$e_date.'\'
			GROUP BY `Contact`.`id`;

			');
			//debug( $q_mgr );
			$this->set('contacts', $q_mgr);

		}else if( $type == 'mgr24hrcall'){

			$mgr_qr = $this->Contact->query('
				SELECT User.first_name, User.last_name, Contact.first_name as cf, Contact.last_name as cl, `Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`, Contact.modified, Contact.created
				,Contact.mgr_signoff

			FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
			LEFT JOIN mgr24hr_calls as Mgr24hrCall ON (`Contact`.`id` = `Mgr24hrCall`.`contact_id`)
			WHERE `Mgr24hrCall`.`user_id` in ('.$user_ids.')
			AND `Contact`.`company_id` = \''.$dealer_id.'\' AND
			`Mgr24hrCall`.`created` between \''.$s_date.'\' and \''.$e_date.'\';

			');
			// debug( $mgr_qr );
			$this->set('contacts', $mgr_qr);
		}





	}

	public function get_higher_steps($custom_step_map, $current_step){
    	$higher = array();
    	$count = false;
    	foreach($custom_step_map as $key=>$value){
    		if($count == true){
    			$higher[] = $key;
    		}
    		if($key == $current_step){
    			$higher[] = $key;
    			$count = true;
    		}
    	}
    	return $higher;
    }

    private function get_dealer_id_user_id($user_id){
    	$this->loadModel("User");
    	$this->User->recursive = -1;
    	$user = $this->User->findById($user_id, array("User.id","User.dealer_id","User.step_procces","User.zone"));
    	return $user;
    }
    private function get_dealer_id_dealer_details($dealer_id){
    	$this->loadModel("User");
    	$this->User->recursive = -1;
    	$user = $this->User->find("first", array("conditions"=>array("User.dealer_id"=>$dealer_id, "User.active"=>1),"fields"=>array("User.id","User.dealer_id","User.step_procces","User.zone")));
    	return $user;
    }

    public function crmreport_all_step_details() {

    	$this->all_step_details();
    	$this->render("all_step_details");
    }

	public function all_step_details() {

		$user_ids = explode(",", $this->request->query['user_id'] );
		$dealer_info = $this->get_dealer_id_user_id($user_ids['0']);
		$dealer_id = $dealer_info['User']['dealer_id'];


		$custom_step_map = $this->ContactStatus->get_dealer_steps( $dealer_id , $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);

		$dealer_id = $this->Auth->User('dealer_id');

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);



		//$user_ids = $this->request->query['user_id'];
		$s_date = $this->request->query['s_date']." 00:00:00";
		$e_date = $this->request->query['e_date']." 23:59:59";
		$step_id = $this->request->query['step_id'];


		$single_multiple_condition = "";

		// if($step_id == '30'){
		// 	$step_id = '10';
		// 	$single_multiple_condition = "  `LeadSold`.`multi_vehicle` = '1'  AND ";
		// }else{
			$number_of_setp = 0;
			$cnt = 1;
			foreach($custom_step_map as $key=>$val){
				if($cnt > 1 && $key == $step_id){
					$number_of_setp	= $cnt-1;
				}
				$cnt++;
			}
			//debug($number_of_setp);
			if($number_of_setp < $multi_deal_higher_step){
				$single_multiple_condition = "  `LeadSold`.`multi_vehicle` = '0'  AND ";
			}

			// if($step_id == '10'){
			// 	$single_multiple_condition = " `LeadSold`.`multi_vehicle` = '0'  AND  ";
			// }

		// }
		//debug($single_multiple_condition);

		$user_conditions_cnt = "";
		$user_conditions_sold = "";
		$history_user_conditions_cnt = "";
		$user_conditions_cnt = "  `Contact`.`user_id` in (". implode(",", $user_ids) .")  AND ";
		$history_user_conditions_cnt = "  `History`.`user_id` in (". implode(",", $user_ids) .")  AND ";
		$user_conditions_sold = "  `LeadSold`.`user_id` in (". implode(",", $user_ids) .")  AND ";


		$step_condition = "";
		$history_step_condition = "";
		$steps_ar = array();
		$steps_ar_normal = array();
		$cond_date_field = 'step_modified';
		if($step_id != 1){

			$higher_step = $this->get_higher_steps($custom_step_map, $step_id);
			//debug($higher_step);

			// for($i=$step_id; $i<=9; $i++ ){
			// 	$steps_ar[] = "'".$i."'";
			// }
			foreach($higher_step as $key=>$value){
				$steps_ar[] = "'".$value."'";

				if($value != '10'){
					$steps_ar_normal[] = "'".$value."'";
				}
			}

			$step_condition_normal = " Contact.sales_step in (" .  implode(",", $steps_ar_normal) . ") AND ";
			$step_condition = " Contact.sales_step in (" .  implode(",", $steps_ar) . ") AND ";
			$history_step_condition = " History.sales_step in (" .  implode(",", $steps_ar_normal) . ") AND ";

			//debug($step_condition);

		}else{
			$cond_date_field = 'created';
			$step_condition_normal = " Contact.sales_step = '1' AND ";
			$history_step_condition = " History.sales_step <> '1' AND ";
		}


		$contact_block = "";
		$history_block = "";
		if($step_id != '10'){
			$contact_block = '

				SELECT User.first_name, User.last_name,
				Contact.first_name as cf, Contact.last_name as cl,
				`Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,
				  Contact.modified, Contact.created, \'contact\'
				  ,Contact.mgr_signoff,\'0\'  as `multi_vehicle`
				FROM `contacts` AS `Contact`
				LEFT JOIN users as User ON (Contact.user_id = User.id)
					WHERE '. $step_condition_normal .'  '.$user_conditions_cnt.'  `Contact`.`status` <> \'Duplicate-Closed\'
					AND `Contact`.`company_id` = :dealer_id
					AND `Contact`.`'.$cond_date_field.'` >= :s_date and `Contact`.`'.$cond_date_field.'` <= :e_date

			';
			if($step_id != 1){
			$history_block = '

				SELECT User.first_name, User.last_name,
				Contact.first_name as cf, Contact.last_name as cl,
				`Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,
				  Contact.modified, Contact.created, \'contact\'
				  ,Contact.mgr_signoff,\'0\' as `multi_vehicle`
				FROM histories as History

				LEFT JOIN `contacts` AS `Contact` ON (Contact.id = History.contact_id)
				LEFT JOIN users as User ON (Contact.user_id = User.id)

					WHERE '. $history_step_condition .'  '.$history_user_conditions_cnt.'
					`History`.`dealer_id` = :dealer_id
					AND `History`.`step_chage_date` IS NOT NULL
					AND `History`.`created` >=  :s_date and `History`.`created` <= :e_date

			';
			}



		}




		$lead_sold_block = "";
		if($step_id != 1){
			$lead_sold_block = '

					SELECT
					`User`.first_name, `User`.last_name,
					`LeadSold`.`first_name` as cf, `LeadSold`.`last_name` as cl,
					`Contact`.`owner`, `Contact`.`notes`,
					`Contact`.`id`,
						Contact.contact_status_id,
					`LeadSold`.`user_id`,
					`LeadSold`.`sperson`,
					\'10\',
					`LeadSold`.`status`,
					`LeadSold`.`modified`,
					`Contact`.`created`,
					\'Lead Sold\'
					,Contact.mgr_signoff
					,LeadSold.multi_vehicle as `multi_vehicle`
					FROM `lead_solds` AS `LeadSold`
					LEFT JOIN users AS User ON (LeadSold.user_id = User.id)
					LEFT JOIN contacts AS Contact ON (LeadSold.contact_id = Contact.id)
						WHERE '.$user_conditions_sold.' '. $single_multiple_condition .'
						 `LeadSold`.`company_id` = :dealer_id
						AND	`LeadSold`.`modified` >= :s_date and `LeadSold`.`modified` <= :e_date ;
			';
		}



		//debug( $contact_block .'	' . $union_block .' '. $lead_sold_block  );

		if( $contact_block != ''){


			$contacts = $this->Contact->query($contact_block , 	array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
		 	$results = array();

	 		foreach ($contacts as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}
	 	}

 		//History Block
		if($history_block != ''){
			$histories = $this->Contact->query($history_block,array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
			 foreach ($histories as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}

		}

		//Lead Sold
		if($lead_sold_block != ''){
			$solds = $this->Contact->query($lead_sold_block,array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
			 foreach ($solds as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}

		}






 		$this->set('contacts', $results);

	}

	public function highest_step_details()
		{

		$this->view = 'all_step_details';
		$user_ids = explode(",", $this->request->query['user_id'] );
		$dealer_info = $this->get_dealer_id_user_id($user_ids['0']);
		$dealer_id = $dealer_info['User']['dealer_id'];


		$custom_step_map = $this->ContactStatus->get_dealer_steps( $dealer_id , $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);

		$dealer_id = $this->Auth->User('dealer_id');

		$this->loadModel('DealerSetting');
		$multi_deal_higher_step = $this->DealerSetting->get_settings('multi_deal_higher_step', $dealer_id);



		//$user_ids = $this->request->query['user_id'];
		$s_date = $this->request->query['s_date']." 00:00:00";
		$e_date = $this->request->query['e_date']." 23:59:59";
		$step_id = $this->request->query['step_id'];


		$single_multiple_condition = "";

		// if($step_id == '30'){
		// 	$step_id = '10';
		// 	$single_multiple_condition = "  `LeadSold`.`multi_vehicle` = '1'  AND ";
		// }else{
			$number_of_setp = 0;
			$cnt = 1;
			foreach($custom_step_map as $key=>$val){
				if($cnt > 1 && $key == $step_id){
					$number_of_setp	= $cnt-1;
				}
				$cnt++;
			}
			//debug($number_of_setp);
			if($number_of_setp < $multi_deal_higher_step){
				$single_multiple_condition = "  `LeadSold`.`multi_vehicle` = '0'  AND ";
			}

			// if($step_id == '10'){
			// 	$single_multiple_condition = " `LeadSold`.`multi_vehicle` = '0'  AND  ";
			// }

		// }
		//debug($single_multiple_condition);

		$user_conditions_cnt = "";
		$user_conditions_sold = "";
		$history_user_conditions_cnt = "";
		$user_conditions_cnt = "  `Contact`.`user_id` in (". implode(",", $user_ids) .")  AND ";
		$history_user_conditions_cnt = "  `History`.`user_id` in (". implode(",", $user_ids) .")  AND ";
		$user_conditions_sold = "  `LeadSold`.`user_id` in (". implode(",", $user_ids) .")  AND ";


		$step_condition = "";
		$history_step_condition = "";
		$steps_ar = array();
		$steps_ar_normal = array();
		$cond_date_field = 'step_modified';
		if($step_id != 1){

			$higher_step = $this->get_higher_steps($custom_step_map, $step_id);
			//debug($higher_step);

			// for($i=$step_id; $i<=9; $i++ ){
			// 	$steps_ar[] = "'".$i."'";
			// }
			foreach($higher_step as $key=>$value){
				$steps_ar[] = "'".$value."'";

				if($value != '10'){
					$steps_ar_normal[] = "'".$value."'";
				}
			}

			$step_condition_normal = " Contact.sales_step = ".$step_id." AND ";
			$step_condition = " Contact.sales_step = ".$step_id." AND ";
			$history_step_condition = " History.sales_step = ".$step_id." AND ";


			//debug($step_condition);

		}else{
			$cond_date_field = 'created';
			$step_condition_normal = " Contact.sales_step = '1' AND ";
			$history_step_condition = " History.sales_step <> '1' AND ";
		}


		$contact_block = "";
		$history_block = "";
		if($step_id != '10'){
			$contact_block = '

				SELECT User.first_name, User.last_name,
				Contact.first_name as cf, Contact.last_name as cl,
				`Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,
				  Contact.modified, Contact.created, \'contact\'
				  ,Contact.mgr_signoff,\'0\'  as `multi_vehicle`
				FROM `contacts` AS `Contact`
				LEFT JOIN users as User ON (Contact.user_id = User.id)
					WHERE '. $step_condition_normal .'  '.$user_conditions_cnt.'  `Contact`.`status` <> \'Duplicate-Closed\'
					AND `Contact`.`company_id` = :dealer_id
					AND `Contact`.`'.$cond_date_field.'` >= :s_date and `Contact`.`'.$cond_date_field.'` <= :e_date

			';
			if($step_id != 1){
			$history_block = '

				SELECT User.first_name, User.last_name,
				Contact.first_name as cf, Contact.last_name as cl,
				`Contact`.`owner`, `Contact`.`notes`,
				Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,
				  Contact.modified, Contact.created, \'contact\'
				  ,Contact.mgr_signoff,\'0\' as `multi_vehicle`
				FROM histories as History

				LEFT JOIN `contacts` AS `Contact` ON (Contact.id = History.contact_id)
				LEFT JOIN users as User ON (Contact.user_id = User.id)

					WHERE '. $history_step_condition .'  '.$history_user_conditions_cnt.'
					`Contact`.`company_id` = :dealer_id AND  `User`.`group_id` IN (1,2,3,4,5,6,10,11) AND `Contact`.`status` <> \'Duplicate-Closed\'
					AND `History`.`last_step` IS NOT NULL AND `History`.`user_id` IS NOT NULL
					AND `History`.`created` >=  :s_date and `History`.`created` <= :e_date

			';
			}



		}




		$lead_sold_block = "";
		if($step_id == 10){
			$lead_sold_block = '

					SELECT
					`User`.first_name, `User`.last_name,
					`LeadSold`.`first_name` as cf, `LeadSold`.`last_name` as cl,
					`Contact`.`owner`, `Contact`.`notes`,
					`Contact`.`id`,
						Contact.contact_status_id,
					`LeadSold`.`user_id`,
					`LeadSold`.`sperson`,
					\'10\',
					`LeadSold`.`status`,
					`LeadSold`.`modified`,
					`Contact`.`created`,
					\'Lead Sold\'
					,Contact.mgr_signoff
					,LeadSold.multi_vehicle as `multi_vehicle`
					FROM `lead_solds` AS `LeadSold`
					LEFT JOIN users AS User ON (LeadSold.user_id = User.id)
					LEFT JOIN contacts AS Contact ON (LeadSold.contact_id = Contact.id)
						WHERE '.$user_conditions_sold.' '. $single_multiple_condition .'
						 `LeadSold`.`company_id` = :dealer_id
						AND	`LeadSold`.`modified` >= :s_date and `LeadSold`.`modified` <= :e_date ;
			';
		}



		//debug( $contact_block .'	' . $union_block .' '. $lead_sold_block  );

		if( $contact_block != ''){


			$contacts = $this->Contact->query($contact_block , 	array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
		 	$results = array();

	 		foreach ($contacts as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}
	 	}

 		//History Block
		if($history_block != ''){
			$histories = $this->Contact->query($history_block,array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
			 foreach ($histories as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}

		}

		//Lead Sold
		if($lead_sold_block != ''){
			$solds = $this->Contact->query($lead_sold_block,array(
				'dealer_id' => $dealer_id,
				's_date' => $s_date,
				'e_date' => $e_date,
		 	) );
			 foreach ($solds as $cont) {
	 			if( isset( $cont['Contact'] )   ){

		 			$results[] = array('0' => array(
		 				'first_name' => $cont['User']['first_name'],
		 				'last_name' => $cont['User']['last_name'],
		 				'cf' => (isset($cont['LeadSold']['cf']))? $cont['LeadSold']['cf']  : $cont['Contact']['cf'] ,
		 				'cl' => (isset($cont['LeadSold']['cl']))? $cont['LeadSold']['cl']  : $cont['Contact']['cl'] ,
		 				'owner' => $cont['Contact']['owner'],
		 				'id' => $cont['Contact']['id'],
		 				'contact_status_id' => $cont['Contact']['contact_status_id'],
		 				'user_id' => "",
		 				'sperson' => "",
		 				'sales_step' => (isset($cont['0']['10']))? $cont['0']['10']  : $cont['Contact']['sales_step'] ,
		 				'status' => $cont['LeadSold']['status'],
		 				'modified' =>  (isset($cont['LeadSold']['modified']))?  $cont['LeadSold']['modified'] : $cont['Contact']['modified'] ,
		 				'created' => $cont['Contact']['created'],
		 				'notes' => $cont['Contact']['notes'],
		 				'mgr' => $cont['0']['mgr'],
		 				'multi_vehicle' =>  (isset($cont['LeadSold']['multi_vehicle']))?  $cont['LeadSold']['multi_vehicle'] : 0 ,

		 			));

		 		}else{
		 			$results[] = array('0'=>$cont[0]);
		 		}

	 		}

		}

 		$this->set('contacts', $results);

		}


}
