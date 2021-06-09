<?php

class ContactsController extends AppController {

    public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
    public $components = array('RequestHandler','Cookie');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('search_data');
    }


	public function customer() {
  		$this->layout='default_new';
	}

	public function get_dealer_steps(){
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		return  $sales_step_options_popup;
	}

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


	/*

	private function _getlast_step($contact_id){
		$this->Contact->id = $contact_id;
		return $sp = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$contact_id)));
	}
	public function update_last_step_change(){




		$contact_ids = $this->History->find('all',array(
			'fields'=>array('DISTINCT contact_id'),
			'conditions'=>array('History.h_type' => "Lead",'History.last_step' => null),
		));
		//debug($contact_ids);
		foreach($contact_ids as $cd){

			//debug($cd['History']['contact_id']);

			$c_id = $cd['History']['contact_id'] ;
			//$c_id = 20407;

			$histories = $this->History->find('all',array(
				'fields'=>array('id', 'contact_id', 'sales_step', 'last_step', 'step_chage_date', 'created', 'modified'),
				'conditions'=>array('History.h_type' => "Lead",'History.contact_id'=>array($c_id) ),
				'order'=>array('contact_id DESC', 'id ASC')
			));
			//debug($histories);

			$step_changes = array();
			$last_step = "";
			foreach($histories as $history){
				//debug($history);
				if(isset($step_changes[$history['History']['sales_step']])){
					continue;
				}else{
					$step_changes[$history['History']['sales_step']] = $history;
					$last_step = $history['History']['sales_step'];
				}
			}
			//debug($step_changes);
			$cnt = $this->_getlast_step($c_id);
			if($last_step != '' && $cnt['Contact']['sales_step'] == $last_step){
				unset($step_changes[$last_step]);
			}
			//debug($step_changes);

			foreach($step_changes as $step_change){
				$this->History->query('UPDATE histories set last_step = :ls, step_chage_date = :lsd  WHERE id = :hid', array(
					'ls'=>$step_change['History']['sales_step'],
					'lsd'=>$step_change['History']['created'],
					'hid'=>$step_change['History']['id'],
				));
			}


		}


	}

	*/


	private function _getsperson($contact_id){
		$this->Contact->id = $contact_id;
		return $sp = $this->Contact->field('sperson');
	}
	public function update_sperson(){
		$events = $this->History->find('all',array('conditions'=>array('History.h_type' => "Event", 'History.contact_id !=' => null,  'History.sperson' => null )));
		//debug($events);
		foreach($events as $event){
			if($event['History']['contact_id'] != ''){

				$sp = $this->_getsperson($event['History']['contact_id']);
				debug($sp);
				$this->History->query('UPDATE histories set sperson = :sp WHERE id = :hid', array(
					'sp'=>$sp,
					'hid'=>$event['History']['id']
				));
			}

		}

	}


 	public function listings($csvFile = null) {
		$this->layout='default_new';
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        $selected_type = "";
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

        $current_user_id = $this->Auth->User('id');
        $this->Prg->commonProcess();
        //$this->Contact->recursive = 0;
        $this->passedArgs['user_id'] = $current_user_id;
        if ($group_id == 2) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.company_id' => $dealer_id,
                //'Contact.sales_step = Contact.sales_step',
            );
        } elseif ($group_id == 1) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                //'Contact.sales_step = Contact.sales_step',
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.user_id' => $current_user_id,
                //'Contact.sales_step = Contact.sales_step',
                '1 = 1'
            );
        }
        if ($csvFile) {
            $this->paginate = array(
                'conditions' => $conditions,
                'order' => array(
                    'Contact.sperson' => 'DESC',
                )
            );
            $this->request->params['named']['page'] = null;
        } else {
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => 3,
                'order' => array(
                    'Contact.id' => 'DESC'
                )
            );
        }
        $this->set('contacts', $this->Paginate());
    }



    public function npaGuideUrl(){
                $this->layout='';

		App::import('Component', 'Utility');
                $this->request->data['dealer_id']=$this->Auth->user('dealer_id');
		$Utility = new UtilityComponent(new ComponentCollection());
		$response = $Utility->NPAGuideURL($this->request->data);

               $this->set('response',$response);

		//echo json_encode($response);die;
	}



    public function check_duplicate_status($histories, $new_history){
    	if($new_history['History']['h_type'] == 'Lead Arrived'){
    		return false;
    	}
    	$duplicate = false;
    	if(!empty($histories)){

    		if( strrpos($new_history['History']['form_used'], "_imp")  !== false ){
    			return false;
    		}

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
    	//debug($new_history['History']['h_type']);
    	//debug($duplicate);
    	return $duplicate;
    }

	public function lead_details($id = null){

		$hide_deaelrnames = $this->Contact->query("select * from hide_dealernames limit 1");
		$hide_deaelrname = $hide_deaelrnames['0']['hide_dealernames']['dealer_id'];
		$this->set('hide_deaelrname', $hide_deaelrname);

		$DncStatusOptions =  $this->ContactStatus->DncStatusOptions;
		//debug($DncStatusOptions);


		$dealer_id=$this->Auth->user('dealer_id');
		$this->set('dealer_id',$dealer_id);
		//History tab
        $history_types = array(
        	'Lead'=>'user',
        	'Event'=>'alarm',
        	'Lead Arrived'=>'cloud',
        	'New CRM Move'=>'list',
        	'BDC REP Web Lead'=>'cogwheel',
        	'BDC Survey'=>'list',
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
        	'DNC'=>'circle_exclamation_mark',
        	'MGR Check'=>'check',
        	'Consent'=>'envelope',
          'Dealer Visit'=>'list'
        );
		$this->set('history_types', $history_types);

		$LEAD_DATA = array();
		$cache_key = "lead_".$id;
		//debug($cache_key);

		$dnc_options = $this->ContactStatus->DncStatusOptions;

		$this->loadModel("DealerSetting");
		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $dealer_id );
		$this->set('casl_feature', $casl_feature);

    $dealer_visit = $this->DealerSetting->get_settings('dealer_visit', $dealer_id);
    //$this->set('dealer_visit',$dealer_visit); //This is set further down the controller

    $dealer_visit_showroom = $this->DealerSetting->get_settings('dealer_visit_showroom', $dealer_id);
    //$this->set('dealer_visit_showroom',$dealer_visit_showroom);

		Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
		if (($LEAD_DATA = Cache::read($cache_key, $this->Memcache_config)) === false) {

			$this->Contact->bindModel(array(
				'belongsTo'=>array('ContactAccount', 'ContactCaslStatus'),
				'hasOne'=>array('CrmUnsubscribe'),
			));
			$contact = $this->Contact->read(null, $id);
			// debug( $contact );



			//Contact Accounts
			$account_leads = array();
			// if($contact['Contact']['contact_account_id'] != ''){

			// 	$account_leads = $this->Contact->find("all", array(
			// 		'recursive' => -1,
			// 		'order' => "Contact.modified desc",
			// 		'fields' => array("Contact.id", 'Contact.first_name', 'Contact.m_name', 'Contact.last_name', 'Contact.status', 'Contact.sales_step', 'Contact.modified'),
			// 		'conditions'=>array('Contact.id <>' => $contact['Contact']['id'], 'Contact.contact_account_id' => $contact['Contact']['contact_account_id'])
			// 	));
			// 	// debug($account_leads);

			// }
			$LEAD_DATA['contact_account_leads'] = $account_leads;


			$class = $contact['Contact']['class'];

			//Split note user name
			$note_sales_person = $contact['Contact']['note_added_by'];
			if($note_sales_person == ''){
				$note_sales_person = $contact['Contact']['sperson'];
			}
			if($contact['Contact']['spit_deal_update'] == 'yes'){
				$note_user = $this->User->find('first', array('conditions' => array('User.id' => $contact['Contact']['spit_deal_user_id']), 'fields' =>array('User.id','User.first_name', 'User.last_name') ));
				$note_sales_person = $note_user['User']['first_name']." ".$note_user['User']['last_name'];
			}
			//debug($note_sales_person);



			if( $contact['Contact']['class'] != '' && is_numeric($contact['Contact']['class'])){

				$this->LoadModel('Category');
				$cat = $this->Category->find('first',array('conditions'=>array('Category.id'=>$contact['Contact']['class'])));
				$class = $cat['Category']['body_sub_type'];
			}

			$class_trade = "";
			if( $contact['Contact']['class_trade'] != '' && is_numeric($contact['Contact']['class_trade'])){

				$this->LoadModel('Category');
				$cat = $this->Category->find('first',array('conditions'=>array('Category.id'=>$contact['Contact']['class_trade'])));
				$class_trade = $cat['Category']['body_sub_type'];
			}

			$second_face = "";
			if( $contact['Contact']['second_face'] != ''){
				$this->LoadModel('User');
				$SecondFace = $this->User->find('first',array('recursive'=>-1,'conditions'=>array('User.id'=>$contact['Contact']['second_face'])));
				//debug($SecondFace);
				$second_face = $SecondFace['User']['full_name'];
			}

			//Process Histories
			$params = array(
	            'conditions' => array(     'History.contact_id' => $id),
	            'fields' => array('History.*'),
				'order' => array('History.created DESC'),
	        );
	        $history = $this->History->find('all', $params);
	        $contact['dnc_change_date'] = "";

	        $history_ar = array();
	        $lead_transfer_note = "";

	        foreach ($history as $his) {

	        	if(($his['History']['h_type'] == "Staff Transfer" || $his['History']['h_type'] == "Location Transfer") && $lead_transfer_note == "" ){
	        		$lead_transfer_note = $his['History']['comment'];
	        	}


    			if($his['History']['h_type'] == 'Lead' && $his['History']['condition'] == 'yes' ){
    				$split_deal_sperson = $this->User->find('first', array('recursive'=>-1,'conditions'=>array('User.id'=> $his['History']['spit_deal_user_id'] )));
    				$split_deal_sperson = $split_deal_sperson['User']['first_name']." ".$split_deal_sperson['User']['last_name'];
    				$his['History']['spit_deal_username'] = $split_deal_sperson;
    			}


	        	if(isset($history_ar[ trim($his['History']['h_type']) ])){
	        		$duplicate_key = $this->check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
	        	}else{
	        		$duplicate_key = $this->check_duplicate_status(array(),  $his  );
	        	}
	        	// 'Calendar' h_type added as exception for duplicate list
	        	if( $duplicate_key === false  || $his['History']['h_type'] == 'Calendar'){
	        		$history_ar[ trim($his['History']['h_type']) ][] = $his;
	        	}

	        	if($his['History']['field_changed'] != null ){
	        		$dnc_start = strpos($his['History']['field_changed'], "dnc_status");
	        		if($dnc_start !== false){
	        			$dnc_status_value = "";
	        			$dnc_last = explode(",", $his['History']['field_changed']);
	        			foreach($dnc_last as $ds){
	        				if( strpos($ds, "dnc_status")){
	        					$dvals = explode(":", $ds);
	        					$dnc_status_value = trim($dvals[1]);
	        				}
	        			}
	        			//debug($dnc_last);
	        			$his['History']['comment'] = $DncStatusOptions[$dnc_status_value] ;
	        			if($his['History']['changed_by'] != ''){
	        				$changed_by_sperson = $this->User->find('first', array('recursive'=>-1,'conditions'=>array('User.id'=> $his['History']['changed_by'] )));
	        				$changed_by_sperson = $changed_by_sperson['User']['first_name']." ".$changed_by_sperson['User']['last_name'];
	        				$his['History']['sperson'] = $changed_by_sperson;
	        			}




		        		$history_ar[ 'DNC' ][] = $his;
		        		$contact['dnc_change_date'] = date("m/d/Y g:i A",strtotime($his['History']['created']));
	        		}
	        	}
	        }

			//debug($history_ar);
			//debug($dnc_change_date);
			$contact['dnc_icon_phone'] = "";
			$contact['dnc_icon_email'] = "";
			if($contact['Contact']['dnc_status'] == 'not_call' || $contact['Contact']['dnc_status'] == 'no_call_email'){
				$contact['dnc_icon_phone'] = "<i title='{$contact['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
			}
			if($contact['Contact']['dnc_status'] == 'not_email' || $contact['Contact']['dnc_status'] == 'no_call_email'){
				$contact['dnc_icon_email'] = "<i title='{$contact['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
			}



			if($casl_feature == 'On' && in_array($contact['Contact']['contact_casl_status_id'], array('3','4'))  ){
				$contact['dnc_icon_email'] = "<i title='{$contact['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
			}




			if($contact['Contact']['created'] == $contact['Contact']['modified'] && $contact['Contact']['dnc_status'] != '' && $contact['Contact']['dnc_status'] != 'ok_call_email'){

		        $history_ar[ 'DNC' ][] = array("History"=>array(
					'id' => '',
					'user_id' => $contact['Contact']['user_id'],
					'changed_by' => "",
					'field_changed' => "",
					'deal_id' => "",
					'event_id' => "",
					'contact_id' => $contact['Contact']['id'],
					'sperson' => $contact['Contact']['sperson'],
					'mgr_signoff' => "",
					'comment' => $dnc_options[ trim($contact['Contact']['dnc_status']) ],
					'cond' => "",
					'year' => $contact['Contact']['year'],
					'make' => $contact['Contact']['make'],
					'model' => $contact['Contact']['model'],
					'type' => "",
					'status' => $contact['Contact']['status'],
					'h_type' => 'DNC',
					'created' => $contact['Contact']['created'],
					'modified' => '',
					'sales_step' => $contact['Contact']['sales_step'],
					'customer_name' => "",
					'amount' => "",
					'condition' => "",
					'notes' => "",
					'start_date' => "",
					'end_date' => "",
					'last_step' => "",
					'step_chage_date' => "",
					'hide' => "",
					'form_used' => "",
					'dealer_id' => "",
					'sales_step_temp' => "",
					'last_step_temp' => ""
				));

			}

			$timezone = $this->Auth->user('zone');
			$appointment = $this->_appointment_date($id, $timezone);



			//$LEAD_DATA['score_lead'] = $score_lead;
			//$LEAD_DATA['recipients'] = $recipients;
			$LEAD_DATA['lead_transfer_note'] = $lead_transfer_note;
			$LEAD_DATA['appointment'] = $appointment;
			$LEAD_DATA['history_ar'] = $history_ar;
			$LEAD_DATA['contact'] = $contact;
			$LEAD_DATA['class'] = $class;
			$LEAD_DATA['class_trade'] = $class_trade;
			$LEAD_DATA['second_face'] = $second_face;
			$LEAD_DATA['note_sales_person'] = $note_sales_person;


			$this->loadModel("AdditionalContact");
        	$additionalContacts = $this->AdditionalContact->find("all", array('conditions'=>array('AdditionalContact.contact_id'=>$id)));
			$LEAD_DATA['additionalContacts'] = $additionalContacts;




			//Add on vehicle start
			$this->loadModel('AddonVehicle');
			$this->AddonVehicle->bindModel(array(
				'belongsTo'=>array('Category'=>array(
					'foreignKey'=>false,
					'conditions'=> array("AddonVehicle.class = Category.id")
				)),
			));
			$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$id) ));
			$LEAD_DATA['addonVehicles'] = $addonVehicles;
			//Add on vehicle end

			//Add on vehicle trade start
			$this->loadModel('AddonTradeVehicle');
			$this->AddonTradeVehicle->bindModel(array(
				'belongsTo'=>array('Category'=>array(
					'foreignKey'=>false,
					'conditions'=> array("AddonTradeVehicle.class = Category.id")
				)),
			));
			$addonTradeVehicles = $this->AddonTradeVehicle->find('all', array('conditions' => array('AddonTradeVehicle.contact_id'=>$id) ));
			$LEAD_DATA['addonTradeVehicles'] = $addonTradeVehicles;
			//Add on vehicle trade end

			//debug($addonTradeVehicles);


			//debug($cache_key);
			Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
			Cache::write($cache_key, $LEAD_DATA, $this->Memcache_config);
		}
		$this->loadModel('LeadScoreEmail');
		$recipients=$this->LeadScoreEmail->find('count',array('conditions'=>array('dealer_id'=>$dealer_id)));
		$this->loadModel('LeadScore');
		$score_lead=$this->LeadScore->findByContactId($id);

		$this->set('score_lead', $score_lead);
		$this->set('recipients', $recipients);

		$this->loadModel('DealerForm');
		$questionnaire_submit = 'No';
		$questionnaire_dealers = $this->DealerForm->find('list',array('fields' => 'id,dealer_id','conditions' =>array('custom_form_id' => 23)));
		if(in_array($this->Auth->user('dealer_id'),$questionnaire_dealers)){
			$this->loadModel('CustomFormSave');
			$check_record= $this->CustomFormSave->find('count',array('conditions' => array('CustomFormSave.contact_id' => $id,'CustomFormSave.form_id' => 23)));
			if($check_record >0)
			$questionnaire_submit ='Yes';
		}
		$this->set(compact('questionnaire_submit','questionnaire_dealers'));


		$this->set('appointment', $LEAD_DATA['appointment']);
		$this->set('history_ar', $LEAD_DATA['history_ar']);
		$this->set('contact', $LEAD_DATA['contact']);
		$this->set('class', $LEAD_DATA['class']);
		$this->set('class_trade', $LEAD_DATA['class_trade']);
		$this->set('second_face', $LEAD_DATA['second_face']);
		$this->set('addonVehicles', $LEAD_DATA['addonVehicles']);
		$this->set('addonTradeVehicles', $LEAD_DATA['addonTradeVehicles']);

		$this->set('lead_transfer_note', $LEAD_DATA['lead_transfer_note']);


		$this->set('additionalContacts', $LEAD_DATA['additionalContacts']);

		$this->set('note_sales_person', $LEAD_DATA['note_sales_person']);
		$this->set('contact_account_leads', $LEAD_DATA['contact_account_leads']);


		$this->LoadModel('ContactStatus');
		$this->set('DncStatusOptions', $this->ContactStatus->DncStatusOptions);


		$this->LoadModel('UserEmail');
		$smtp_settings = $this->UserEmail->get_setting("smtp", $this->Auth->User('id') );
   		$this->set("smtp_settings", $smtp_settings);


	   	$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
		$this->set('email_settings', $email_settings);



		//debug($email_settings);
		/*$cooper_dealers = array(1225,1226);
		if(in_array($dealer_id,$cooper_dealers) )
		{
			$other_form_ids =array(16);
		}else
		{
			$other_form_ids =array(9,10,15);
		}
		$custom_form_dealer_ids=array(1224, 829, 830,5000);
		if(in_array($dealer_id,$custom_form_dealer_ids)){
		$this->loadModel('DealerForm');
		$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
		$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>0)));
		}else{
			$this->loadModel('CustomForm');
			$dealer_forms=$this->CustomForm->find('all',array('conditions'=>array('id'=>$other_form_ids)));
		}*/
		$this->loadModel('DealerForm');
		$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
		$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>0)));
		$this->set(compact('dealer_forms'));

		$this->set('sales_step_options',  $this->get_dealer_steps() );

		$location_transfer = $this->requestAction("dealer_settings/get_settings/location_transfer");
		$this->set('location_transfer', $location_transfer);
		//debug($location_transfer);


		$this->loadModel('DealerSetting');
		$bad_web_lead_group = $this->DealerSetting->get_settings('bad_web_lead_group', $dealer_id);

		$is_allow_bad_weblead = false;
		$group_id = $this->Auth->user('group_id');
        if(!empty($bad_web_lead_group)){
        	if($bad_web_lead_group != ''){
        		$lstar = explode(",", $bad_web_lead_group['DealerSetting']['value']);
        		$is_allow_bad_weblead = in_array($group_id, $lstar);
        	}
        }else{
        	if($group_id == '3' || $group_id == '8' || $group_id == '7'){
        		$is_allow_bad_weblead = false;
        	}else{
        		$is_allow_bad_weblead = true;
        	}
        }
        $this->set('is_allow_bad_weblead',  $is_allow_bad_weblead );

        $owner_change_internet = $this->DealerSetting->get_settings('owner_change_internet', $dealer_id);
        $this->set('owner_change_internet',  $owner_change_internet );

        $additional_contact = $this->DealerSetting->get_settings('additional_contact', $this->Auth->user('dealer_id') );
		$this->set('additional_contact', $additional_contact);
		//debug($additional_contact);

		$forms_view = $this->DealerSetting->get_settings('forms_view', $this->Auth->user('dealer_id') );
		$this->set('forms_view', $forms_view);

		// Check Cookie to show upl move lead popup
		$other_salesperson_transfer = false;
		if($this->Cookie->check('transfer_other_salesperson_'.$contact['Contact']['id'])){
			$other_salesperson_transfer = true;
			$this->Cookie->delete('transfer_other_salesperson_'.$contact['Contact']['id']);
		}
		$this->set('other_salesperson_transfer',$other_salesperson_transfer);
//New Dealer Visit Settting
        if($dealer_visit == 'On' && $dealer_visit_showroom == 'On'){
            $dealer_visit = ($LEAD_DATA['contact']['ContactStatus']['id'] == '7') ? 'Off' : 'On';
        }
        $this->set('dealer_visit',$dealer_visit);


	}

	private function _appointment_date($contact_id, $timezone){
		date_default_timezone_set($timezone);
		$event = $this->Event->find('first', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.id','Event.start','Event.event_type_id','Event.customer_showed'),'conditions'=>array(
		'Event.contact_id'=>$contact_id,
		//'Event.user_id'=>$current_user_id,
		'Event.status <>' => array('Completed','Canceled'))));
		return $event;
	}

	public function search_result_new_lead() {
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		if(!empty($this->request->query)){
			// debug($this->request->query);

			$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['phone']));

			$email = trim($this->request->query['email']);

			$first_name = trim($this->request->query['first_name']);
			$last_name = trim($this->request->query['last_name']);
			$id = trim($this->request->query['id']);

		//	$quick = str_replace("-","", trim($this->request->query['quick']));

			$conditions = array();
			if($this->request->query['search_type'] == 'broad'){
				/*
				if( $quick != ''){
					$conditions['OR']['Contact.email like'] = '%' . $quick . '%';
					$conditions['OR']['Contact.mobile like'] = '%' . $quick . '%';
					$conditions['OR']['Contact.phone like'] = '%' . $quick . '%';
					$conditions['OR']['Contact.first_name like'] = '%' . $quick . '%';
					$conditions['OR']['Contact.last_name like'] = '%' . $quick . '%';
					//full name search
					if(!is_numeric($quick)){
						$name_part = explode(" ", $quick);
						if(count($name_part) == 2  ){
							$conditions['OR']['Contact.first_name like'] = '%' . $name_part[0] . '%';
							$conditions['OR']['Contact.last_name like'] = '%' . $name_part[1] . '%';
						}
					}

				}
				*/

				if( $email != ''){
					$conditions['Contact.email like'] = '%' . $email . '%';
				}
				if( $phone != ''){
					$conditions['OR']['Contact.mobile like'] = '%' . $phone . '%';
					$conditions['OR']['Contact.phone like'] = '%' . $phone . '%';
					$conditions['OR']['Contact.work_number like'] = '%' . $phone . '%';
				}
				if( $first_name != ''){
					$conditions['OR']['Contact.first_name like'] = '%' . $first_name  . '%';
					$conditions['OR']['Contact.spouse_first_name like'] = '%' . $first_name  . '%';
					$conditions['OR']['Contact.company_work like'] = '%' . $first_name  . '%';

					$acc_id = $this->find_contact_account_id( $first_name );
					if($acc_id){
						$conditions['OR']['Contact.contact_account_id'] = $acc_id;
					}

				}
				if( $last_name != ''){
					$conditions['Contact.last_name like'] = '%' . $last_name  . '%';
				}
				if( $id != ''){
					$conditions['Contact.id like'] = '%' . $id  . '%';
				}

				$price_range = $this->request->query['price_range'];
				$trade_price_range = $this->request->query['trade_price_range'];
				$floor_plans = $this->request->query['floor_plans'];
				$length = $this->request->query['length'];
				$weight = $this->request->query['weight'];
				$sleeps = $this->request->query['sleeps'];
				$fuel_type = $this->request->query['fuel_type'];

				if( $price_range != ''){
					$conditions['OR']['Contact.price_range'] = $price_range;
					$conditions = $this->Contact->set_price_range($conditions,  $price_range,  "unit_value");
					//debug($conditions);
				}
				if( $trade_price_range != ''){
					$conditions['OR']['Contact.trade_price_range'] = $trade_price_range;
					$conditions = $this->Contact->set_price_range($conditions,  $trade_price_range,  "trade_value");
					//debug($conditions);
				}
				if( $floor_plans != ''){
					$conditions['Contact.floor_plans'] = $floor_plans;
				}
				if( $length != ''){
					$conditions['Contact.length'] = $length;
				}
				if( $weight != ''){
					$conditions['Contact.weight'] = $weight;
				}
				if( $sleeps != ''){
					$conditions['Contact.sleeps'] = $sleeps;
				}
				if( $fuel_type != ''){
					$conditions['Contact.fuel_type'] = $fuel_type;
				}
				if( $this->request->query['model'] != '' && $this->request->query['model'] != 'Any Model'){
					$conditions['Contact.model LIKE'] = '%' .$this->request->query['model']."%";
				}

				//debug($conditions);

			}else if($this->request->query['search_type'] == 'exact'){
				/*
				if( $quick != ''){
					$conditions['OR']['Contact.email'] = $quick;
					$conditions['OR']['Contact.mobile'] =  $quick;
					$conditions['OR']['Contact.phone'] = $quick;
					$conditions['OR']['Contact.first_name'] = $quick;
					$conditions['OR']['Contact.last_name'] = $quick;

					//full name search
					if(!is_numeric($quick)){
						$name_part = explode(" ", $quick);
						if(count($name_part) == 2  ){
							$conditions['OR']['Contact.first_name'] = $name_part[0];
							$conditions['OR']['Contact.last_name'] = $name_part[1];
						}
					}


				}
				*/

				if( $email != ''){
					$conditions['Contact.email'] = $email;
				}
				/*
				if( $mobile != ''){
					$conditions['Contact.mobile'] = $mobile;
				}
				*/
				if( $phone != ''){
					//$conditions['Contact.phone'] = $phone;
					$conditions['OR']['Contact.mobile LIKE'] = $phone."%";
					$conditions['OR']['Contact.phone LIKE'] = $phone."%";
					$conditions['OR']['Contact.work_number LIKE'] = $phone."%";

				}
				if( $first_name != ''){
					$conditions['OR']['Contact.first_name LIKE'] = $first_name."%";
					$conditions['OR']['Contact.spouse_first_name like'] = '%' . $first_name  . '%';
					$conditions['OR']['Contact.company_work like'] = '%' . $first_name  . '%';

					$acc_id = $this->find_contact_account_id( $first_name );
					if($acc_id){
						$conditions['Contact.contact_account_id'] = $acc_id;
					}

				}
				if( $last_name != ''){
					$conditions['Contact.last_name LIKE'] = $last_name."%";
				}
				if( $id != ''){
					$conditions['Contact.id'] = $id;
				}

				$price_range = $this->request->query['price_range'];
				$trade_price_range = $this->request->query['trade_price_range'];
				$floor_plans = $this->request->query['floor_plans'];
				$length = $this->request->query['length'];
				$weight = $this->request->query['weight'];
				$sleeps = $this->request->query['sleeps'];
				$fuel_type = $this->request->query['fuel_type'];

				if( $price_range != ''){
					$conditions['OR']['Contact.price_range'] = $price_range;
					$conditions = $this->Contact->set_price_range($conditions,  $price_range,  "unit_value");
					//debug($conditions);
				}
				if( $trade_price_range != ''){
					$conditions['OR']['Contact.trade_price_range'] = $trade_price_range;
					$conditions = $this->Contact->set_price_range($conditions,  $trade_price_range,  "trade_value");
					//debug($conditions);
				}

				//debug($conditions);

				if( $floor_plans != ''){
					$conditions['Contact.floor_plans'] = $floor_plans;
				}
				if( $length != ''){
					$conditions['Contact.length'] = $length;
				}
				if( $weight != ''){
					$conditions['Contact.weight'] = $weight;
				}
				if( $sleeps != ''){
					$conditions['Contact.sleeps'] = $sleeps;
				}
				if( $fuel_type != ''){
					$conditions['Contact.fuel_type'] = $fuel_type;
				}
				if( $this->request->query['model'] != '' && $this->request->query['model'] != 'Any Model'){
					$conditions['Contact.model'] = $this->request->query['model'];
				}
			}

			//debug($this->request->query['status']);
			if( $this->request->query['status'] != ''){
				$conditions['Contact.status'] = $this->request->query['status'];
			}
			if( $this->request->query['sales_step'] != ''){
				$conditions['Contact.sales_step'] = $this->request->query['sales_step'];
			}

			if( $this->request->query['est_payment_search'] != ''){
				$conditions['Contact.est_payment_search'] = $this->request->query['est_payment_search'];
			}

			if( $this->request->query['search_quick_lead'] != ''){
				$quick_search = $this->request->query['search_quick_lead'];

				if($quick_search == 'this_month'){
					// $conditions['date_format(Contact.modified,\'%Y-%m\')'] = date('Y-m');
					$conditions['Contact.modified >='] = date('Y-m-01 00:00:00');
					$conditions['Contact.modified <='] = date('Y-m-t 23:59:59');
				}

				if($quick_search == 'last_month'){
					$day_start = date('Y-m-01  00:00:00', strtotime('previous month'));
					$day_end = date('Y-m-t 23:59:59', strtotime('previous month'));
					$conditions = array(
						'Contact.modified >=' => $day_start,
						'Contact.modified <=' => $day_end
		            );
				}

				if($quick_search == 'yesterday'){
					$day_start = date('Y-m-d 00:00:00',strtotime("-1 day"));
					$day_end  = date('Y-m-d 23:59:59',strtotime("-1 day"));
					$conditions = array(
						'Contact.modified >=' => $day_start,
						'Contact.modified <=' => $day_end
		            );
				}

				if($quick_search == 'Today'){
					$conditions = $this->Contact->today_lead_count($zone, $dealer_id, 'Dealer');
				}

				if($quick_search == 'Closed'){
					$conditions = array(
						// 'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
						'Contact.created >=' => date('Y-m-01 00:00:00'),
						'Contact.created <=' => date('Y-m-t 23:59:59'),
						'Contact.lead_status' => 'Closed',
		            );
				}

				if($quick_search == 'Open'){
					$conditions = array(
						//'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
						'Contact.created >=' => date('Y-m-01 00:00:00'),
						'Contact.created <=' => date('Y-m-t 23:59:59'),
						'Contact.lead_status' => 'Open',
		            );
		            // debug($conditions);
				}

				if($quick_search == 'web_lead'){
					$conditions = array(
						'Contact.contact_status_id' => 5,
		            );
				}
				if($quick_search == 'showroom_lead'){
					$conditions = array(
						'Contact.contact_status_id' => 7,
		            );
				}
				if($quick_search == 'phone_lead'){
					$conditions = array(
						'Contact.contact_status_id' => 6,
		            );
				}
				if($quick_search == 'mobile_lead'){
					$conditions = array(
						'Contact.contact_status_id' => 12,
		            );
				}




				//debug($this->request->query['search_quick_lead']);
				//$conditions['Contact.sales_step'] = $this->request->query['sales_step'];
			}

			//debug( $this->request->query['vehicle_type']  );


			if( $this->request->query['vehicle_type'] == 'new_vehicle' ){

				if( $this->request->query['category'] != ''){
					$conditions['Contact.category'] = $this->request->query['category'];
				}
				if( $this->request->query['type'] != '' && $this->request->query['type'] != 'Any Category'){
					$conditions['Contact.type'] = $this->request->query['type'];
				}
				if( $this->request->query['make'] != '' && $this->request->query['make'] != 'Any Make'){
					$conditions['Contact.make'] = $this->request->query['make'];
				}
				if( $this->request->query['year'] != '' && $this->request->query['year'] != '0'){
					$conditions['Contact.year'] = $this->request->query['year'];
				}
				if( $this->request->query['condition'] != ''){
					$conditions['Contact.condition'] = $this->request->query['condition'];
				}
				if( $this->request->query['vin'] != ''){
					$conditions['Contact.vin'] = $this->request->query['vin'];
				}
				if( $this->request->query['stock_num'] != ''){
					$conditions['Contact.stock_num'] = $this->request->query['stock_num'];
				}
				if( $this->request->query['unit_color'] != ''){
					$conditions['Contact.unit_color'] = $this->request->query['unit_color'];
				}


				//debug($this->request->query);
				if(isset($this->request->query['vehicle_selection_type']) && $this->request->query['vehicle_selection_type'] != '' ){
					//$conditions['Contact.vehicle_selection_type'] = $this->request->query['vehicle_selection_type'];
				}


			}else{

				if( $this->request->query['category'] != '' ){
					$conditions['Contact.category_trade'] = $this->request->query['category'];
				}
				if( $this->request->query['type'] != ''  && $this->request->query['type'] != 'Any Category'){
					$conditions['Contact.type_trade'] = $this->request->query['type'];
				}
				if( $this->request->query['make'] != '' && $this->request->query['make'] != 'Any Make'){
					$conditions['Contact.make_trade'] = $this->request->query['make'];
				}
				if( $this->request->query['year'] != ''&& $this->request->query['year'] != '0'){
					$conditions['Contact.year_trade'] = $this->request->query['year'];
				}
				if( $this->request->query['condition'] != ''){
					$conditions['Contact.condition_trade'] = $this->request->query['condition'];
				}
				if( $this->request->query['vin'] != ''){
					$conditions['Contact.vin_trade'] = $this->request->query['vin'];
				}
				if( $this->request->query['stock_num'] != ''){
					$conditions['Contact.stock_num_trade'] = $this->request->query['stock_num'];
				}
				if( $this->request->query['unit_color'] != ''){
					$conditions['Contact.usedunit_color'] = $this->request->query['unit_color'];
				}

				if(isset($this->request->query['vehicle_selection_type']) && $this->request->query['vehicle_selection_type'] != '' ){
					//$conditions['Contact.vehicle_selection_type_trade'] = $this->request->query['vehicle_selection_type'];
				}



			}





			$conditions['Contact.status <>']='Duplicate-Closed';
			$conditions['Contact.company_id'] = $dealer_id;

			if($this->request->query['searchrange'] == 'two_years' ){
				$conditions['Contact.modified >='] = date("Y-m-d", strtotime('-2 year'));
			}
			/*
			else{
				$conditions['date_format(Contact.modified,\'%Y\')'] = array( "".(date('Y')-1)."",  date('Y'));
			}
			*/


			//$this->Contact->bindModel(array('hasMany'=>array('Deal'=>array('fields'=>array('Deal.id')))), false);
			$contacts_count = $this->Contact->find('count', array('recursive'=>0,'conditions' => $conditions));
			//debug($conditions);


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
				'Contact.stock_num',
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
				'Contact.company',
				'Contact.company_id',
				'Contact.lead_status',
				'Contact.status',
				'Contact.sales_step',
				'Contact.source',
				'Contact.chk_duplicate',
			);



			// Open Lead Alert Start
			$alert_done = false;
			$show_alert = array();
			if( $phone != '' && $contacts_count > 0){
				$condition_open_lead = $conditions;
				$condition_open_lead['Contact.lead_status'] = "Open";
				$condition_open_lead['Contact.sales_step <>'] = "10";
				$open_lead_count = $this->Contact->find('first', array('order' =>'Contact.id desc' ,
					'fields' => $fields,
					 'recursive'=>0,'conditions' => $condition_open_lead));
				$show_alert = $open_lead_count;

				$alert_done = true;
			}
			if( $email != ''  && $contacts_count > 0 && $alert_done == false){

				$condition_open_lead = $conditions;
				$condition_open_lead['Contact.lead_status'] = "Open";
				$condition_open_lead['Contact.sales_step <>'] = "10";
				$open_lead_count = $this->Contact->find('first', array('order' =>'Contact.id desc' ,
					'fields' => $fields,
					'recursive'=>0,'conditions' => $condition_open_lead));
				$show_alert = $open_lead_count;
			}
			// Open Lead Alert Ends

			$display_alert = false;
			$show_alert_clean = array();
			if(!empty($show_alert)){
				$display_alert = true;
				//debug($show_alert);
				foreach($show_alert['Contact'] as $key => $value){
					if($value == null){
						$show_alert_clean['Contact'][ $key ] = "";
					}else{

						if( $key == 'phone' || $key == 'mobile' || $key == 'work_number'){
							$show_alert_clean['Contact'][ $key ] = $this->format_phone($value);
						}else if( $key == 'modified'){
							$show_alert_clean['Contact'][ $key ] = date("m/d/Y g:i A", strtotime($value));
						}else{
							$show_alert_clean['Contact'][ $key ] = $value;
						}
					}
				}

			}
			//debug($show_alert_clean);

			//pr($conditions);
			$result = array();
			$result['result'] = $contacts_count;
			$result['show_alert'] = $show_alert_clean;
			$result['display_alert'] = $display_alert;




			//Crm Group Result

			if(isset($this->request->params['named']['allow_shopper']) && $this->request->params['named']['allow_shopper'] == 'yes' ){


				$this->loadModel('DealerName');
				$dealer_group  = $this->DealerName->find('first', array('conditions' => array('DealerName.dealer_id'=>$dealer_id), 'fields'=>array('DealerName.id','DealerName.dealer_id','DealerName.crm_group') ));
				if(!empty($dealer_group) && $dealer_group['DealerName']['crm_group'] != ''){
					$other_locations  = explode(',', $dealer_group['DealerName']['crm_group']);

					$other_conditions = array();
					if( $email != ''){
						$other_conditions['Contact.email'] =  $email;
					}
					if($last_name != ''){
            $other_conditions['OR'] = array('Contact.last_name' => $last_name, 'ContactAccount.name like' => '%'.$last_name.'%');
            if($first_name != ''){
              $other_conditions['Contact.first_name'] = $first_name;
            }
					}
					if( $phone != '' && $phone != '0000000000'){
						$other_conditions['OR']['Contact.mobile'] = $phone;
						$other_conditions['OR']['Contact.phone'] = $phone;
						$other_conditions['OR']['Contact.work_number'] = $phone;
					}

					if(!empty($other_conditions)){
						$other_conditions['Contact.company_id'] = $other_locations;

						if( in_array($dealer_id, array("2051", "2337", "2335"))){
							$other_conditions['Contact.modified >='] = date("Y-m-d 00:00:00", strtotime('-12 month'));
						}else{
							$other_conditions['Contact.modified >='] = date("Y-m-d 00:00:00", strtotime('-90 day'));
						}
						$other_conditions['Contact.status <>'] = 'Duplicate-Closed';

						//debug($other_conditions);
            //Search in the Accounts table as well using last_name field
            array_push($fields,'ContactAccount.name');
            $this->Contact->bindModel(array('belongsTo'=>array('ContactAccount')));

						$contacts_shoppers  = $this->Contact->find('all', array('fields'=>$fields,'recursive'=>0,'conditions' => $other_conditions));

						$contacts_clean = array();
						foreach($contacts_shoppers as $contacts_shoppe){
							$contacts_shoppe['Contact']['modified'] = date('m/d/Y g:i A', strtotime($contacts_shoppe['Contact']['modified']));
							$contacts_shoppe['Contact']['mobile'] = $this->format_phone($contacts_shoppe['Contact']['mobile']);
							$contacts_shoppe['Contact']['phone'] = $this->format_phone($contacts_shoppe['Contact']['phone']);
							$contacts_shoppe['Contact']['work_number'] = $this->format_phone($contacts_shoppe['Contact']['work_number']);
							$contacts_clean[] = $contacts_shoppe;
						}
						$result['shoppers'] = $contacts_clean;
					}
				}

			}
			$result['service_search'] = array();
			if($this->get_dealer_settings("service_search") == 'On'){
				$service_conditions = array();
				if( $last_name != ''){
				$service_conditions['ServiceLead.last_name LIKE ']= '%'.$last_name.'%';
				}
				if( $first_name != ''){
				$service_conditions['ServiceLead.first_name LIKE ']= '%'.$first_name.'%';
				}
				if( $email != '')
				$service_conditions['ServiceLead.email']=$email;
				if( $phone != '' && $phone != '0000000000'){
					$service_conditions['OR']['ServiceLead.mobile'] = $phone;
					$service_conditions['OR']['ServiceLead.phone'] = $phone;
					$service_conditions['OR']['ServiceLead.work_number'] = $phone;
				}
				if(!empty($service_conditions))
				$result['service_search'] = $this->_service_search_result($service_conditions);

			}

			$result['lightspeed_search'] = array();

			if($this->get_dealer_settings("lightspeed_search") == 'On'){

				$lightspeed_conditions = array();
				if( $last_name != ''){
				$lightspeed_conditions['AdpCustomer.last_name LIKE ']= '%'.$last_name.'%';
				}
				if( $first_name != ''){
				$lightspeed_conditions['AdpCustomer.first_name LIKE ']= '%'.$first_name.'%';
				}
				if( $email != '')
				$lightspeed_conditions['AdpCustomer.email']=$email;
				if( $phone != '' && $phone != '0000000000'){
					$lightspeed_conditions['OR']['AdpCustomer.mobile'] = $phone;
					$lightspeed_conditions['OR']['AdpCustomer.home_phone'] = $phone;
					$lightspeed_conditions['OR']['AdpCustomer.work_phone'] = $phone;
				}
				if(!empty($lightspeed_conditions))
				$result['lightspeed_search'] = $this->_lightspeed_search_result($lightspeed_conditions);

			}


			echo json_encode($result);
			$this->autoRender = false;
		}

	}
	//Search result in the lead page /contacts/lead
	public function search_result(){
		$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);


		$searched = false;
        $selected_type = "";
        $set_status = 0;

		if(!empty($this->request->query)){
			$this->passedArgs = $this->request->query;
		}

		if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

		$current_user_id = $this->Auth->User('id');
		$this->Prg->commonProcess();
		$this->passedArgs['user_id'] = $current_user_id;

		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));


		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}

		$stats_year = date('Y');
		if( $this->Session->check("stats_year") ){
			$stats_year = $this->Session->read("stats_year");
		}


		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01"));
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));

		$today_start = date('Y-m-d 00:00:00');
		$today_end  = date('Y-m-d 23:59:59');


		if(!isset($this->request->query['stat_type']) || $this->request->query['stat_type'] == '' ){
			$this->request->query['stat_type'] = 'Dealer';
		}

		if(isset($this->request->query['stat_type']) || $this->request->query['stat_type'] != '' ){

			$current_user_id = $this->request->query['stat_type'];
		}

		if(isset($this->request->query['grp_ids']) && $this->request->query['grp_ids'] != '' && $this->request->query['stat_type'] == 'Dealer' ){
			$grp_ids = $this->request->query['grp_ids'];
			$this->request->query['stat_type'] = explode(",", $grp_ids);
			$current_user_id = $this->request->query['stat_type'];
			//debug($this->request->query['stat_type']);
		}




		if(isset($this->request->params['named']['contact_id'])){
			$conditions = array(
				'Contact.id' => $this->request->params['named']['contact_id']
            );
		}

		//Contact vehicle type  Search
		else if(isset($this->request->params['named']['search_all']) && strpos($this->request->params['named']['search_all'], "vehicle_type_search_") !== false ){
			$type =  substr($this->request->params['named']['search_all'], strlen("vehicle_type_search_"));
			$type = str_replace("----", "/", $type);
			$conditions = array(
				'Contact.created >=' => $first_day_this_month,
				'Contact.created <=' => $last_day_this_month,
				'Contact.type' => $type,
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}

		//Contact status Search
		else if(isset($this->request->params['named']['search_all']) && strpos($this->request->params['named']['search_all'], "contact_status_search_") !== false ){
			$status =  substr($this->request->params['named']['search_all'], strlen("contact_status_search_"));
			$status = str_replace("----", "/", $status);
			$conditions = array(
				'Contact.created >=' => $first_day_this_month,
				'Contact.created <=' => $last_day_this_month,
				'Contact.status' => $status,
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
            // debug($conditions);
		}

		//Sales Step Search
		else if(isset($this->request->params['named']['search_all']) && strpos($this->request->params['named']['search_all'], "salesstep_search_") !== false ){
			$setp =  substr($this->request->params['named']['search_all'], strlen("salesstep_search_"));
			$setp = str_replace("----", "/", $setp);
			$conditions = array(
				'Contact.created >=' => $first_day_this_month,
				'Contact.created <=' => $last_day_this_month,
				'Contact.sales_step' => $setp
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}
		//contact_status_id Search
		else if(isset($this->request->params['named']['search_all']) && strpos($this->request->params['named']['search_all'], "contactstatus_search_") !== false ){
			$contact_status_id =  substr($this->request->params['named']['search_all'], strlen("contactstatus_search_"));

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				$conditions = array(
					// 'date_format(Contact.modified,\'%Y-%m\')' => date('Y')."-".$stats_month,
					'Contact.modified >=' => $first_day_this_month,
					'Contact.modified <=' => $last_day_this_month,
					'Contact.contact_status_id' => $contact_status_id,
					'Contact.user_id' => $this->request->query['stat_type']
            	);
			}else{

				$conditions = array(
					// 'date_format(Contact.modified,\'%Y-%m\')' => date('Y')."-".$stats_month,
					'Contact.modified >=' => $first_day_this_month,
					'Contact.modified <=' => $last_day_this_month,
					'Contact.contact_status_id' => $contact_status_id
            	);
			}

		}

		//POPUP search
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'popup_stat'){
			$report_type = $this->request->params['named']['report_type'];
			$stat_type = $this->request->query['stat_type'];
			$range = $this->request->query['range'];

			// debug($report_type);
			// debug($stat_type);
			// debug($range);

			$start_date = "";
			$end_date = "";
			if($range == 'last_month'){
				$start_date = date('Y-m-01 00:00:00', strtotime('previous month'));
				$end_date = date('Y-m-t 23:59:59', strtotime('previous month'));
			}else if($range == 'this_month'){
				$start_date = date('Y-m-01 00:00:00', strtotime('now'));
				$end_date = date('Y-m-t 23:59:59', strtotime('now'));
			}else if($range == 'this_week'){
				$start_date = date('Y-m-d 00:00:00', strtotime('-2 days', strtotime('monday this week')) );
				$end_date = date('Y-m-d 23:59:59', strtotime('friday this week'));
			}else if($range == 'today'){
				$start_date = date('Y-m-d 00:00:00', strtotime('now'));
				$end_date = date('Y-m-d 23:59:59', strtotime('now'));
			}

			//debug($start_date);
			//debug($end_date);

			if($report_type == 'open_month_box'){
				$conditions = $this->Event->open_lead_count($stat_type, $start_date, $end_date,$dealer_id);
			}else if($report_type == 'clsoed_month_box'){
				$conditions = $this->Event->closed_lead_count($stat_type, $start_date, $end_date,$dealer_id);
			}else if($report_type == 'sold_month_box'){
				//$conditions = $this->Event->sold_lead_count($stat_type, $start_date, $end_date,$dealer_id);

				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Event->sold_lead_count($stat_type, $start_date, $end_date,$dealer_id)  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}else if($report_type == 'pending_month_box'){
				$conditions = $this->Event->pending_lead_count($stat_type, $start_date, $end_date,$dealer_id);
			}else if($report_type == 'dormant_48_box'){
				$conditions = $this->Event->dormant_lead_count($stat_type, $start_date, $end_date,$dealer_id);
			}else if($report_type == 'today_event_box'){
				$this->Event->bindModel(array('belongsTo'=>array('User')));
				$con = $this->Event->today_event_count($stat_type, $start_date, $end_date,$dealer_id);
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}else if($report_type == 'overdue_event_box'){

				$con = $this->Event->overdue_event_count($stat_type, $start_date, $end_date,$dealer_id);
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}else if($report_type == 'web_lead_box'){
				$conditions = $this->Event->contact_status_search($stat_type, $start_date, $end_date,$dealer_id, '5');
			}else if($report_type == 'phone_lead_box'){
				$conditions = $this->Event->contact_status_search($stat_type, $start_date, $end_date,$dealer_id, '6');
			}else if($report_type == 'showroom_lead_box'){
				$conditions = $this->Event->contact_status_search($stat_type, $start_date, $end_date,$dealer_id, '7');
			}else if($report_type == 'mobile_lead_box'){
				$conditions = $this->Event->contact_status_search($stat_type, $start_date, $end_date,$dealer_id, '12');
			}








		}



		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Dormant'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->dormant_lead_count($zone, $this->request->query['stat_type'], 'User', $stats_month, $stats_year );
			else
				$conditions = $this->Contact->dormant_lead_count($zone, $dealer_id, 'Dealer',  $stats_month, $stats_year);

			//debug($conditions);
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'other_lead_search'){
			$quick = str_replace("-","", trim($this->request->query['search_str']));
			$conditions['OR']['Contact.email like'] = '%' . $quick . '%';
			$conditions['OR']['Contact.mobile like'] = '%' . $quick . '%';
			$conditions['OR']['Contact.phone like'] = '%' . $quick . '%';
			$conditions['OR']['Contact.first_name like'] = '%' . $quick . '%';
			$conditions['OR']['Contact.last_name like'] = '%' . $quick . '%';
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'weblead_notifications'){
			$conditions = [
				'Contact.sales_step'  => 1,
				'Contact.xml_weblead' => 1,
				'Contact.contact_status_id' => 5,
				'Contact.created = Contact.modified'
			];
			$conditions[] = ['OR' =>[ 'Contact.status <>' => 'Duplicate-Closed',  'Contact.status' => null] ];
			$conditions[] = ['OR' =>[ 'Contact.user_id =' => $this->Auth->User('id'),  'Contact.user_id' => null]];
			$set_status = 1;
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'leadpush_notifications'){
			$conditions = [
				'Contact.staff_transfer' => 1,
				'Contact.user_id' => $this->Auth->User('id'),
				'Contact.location_modified = Contact.modified',
			];
		}else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'bdc_rep_webleads'){

				$bdc_rep_webleads = $this->Contact->query("
				SELECT Contact.id, Contact.user_id, Contact.sperson, Contact.modified, Contact.created
				FROM `contacts` AS `Contact`
				LEFT JOIN users as User ON (Contact.user_id = User.id)
				WHERE
				`User`.`group_id` = 8
				AND `Contact`.`status` =  'BDC Lead Input'
				AND `Contact`.`contact_status_id` = 5
				AND `Contact`.`company_id` = :company_id
				ORDER BY Contact.created DESC;
				", array('company_id'=> $dealer_id ));
				//debug($bdc_rep_webleads);
				$contact_ids = array();
				foreach($bdc_rep_webleads as $bdc_rep_weblead){
					$contact_ids[] = $bdc_rep_weblead['Contact']['id'];
				}
				$conditions = array(
					'Contact.id' => $contact_ids
				);
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_lead_assigned'){

			$bdc_rep_webleads = $this->Contact->query("SELECT Contact.id, Contact.sales_step, Contact.user_id, Contact.sperson, Contact.modified, Contact.created
			FROM `contacts` AS `Contact`
			LEFT JOIN users as User ON (Contact.user_id = User.id)
			WHERE
			`User`.`group_id` <> 8
			AND `Contact`.`user_id` = :user_id
			AND `Contact`.`is_gsm` = 1
			AND `Contact`.`contact_status_id` = 5
			AND `Contact`.`status` <>  'Duplicate-Closed'
			AND `Contact`.`created` = `Contact`.`modified`
			ORDER BY Contact.created DESC;
			", array('user_id'=> $this->Auth->user('id') ));
			$contact_ids = array();
			foreach($bdc_rep_webleads as $bdc_rep_weblead){
				$contact_ids[] = $bdc_rep_weblead['Contact']['id'];
			}
			$conditions = array(
				'Contact.id' => $contact_ids
			);
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_lead_pushed'){

			$lead_push_alert  = $this->Contact->query("SELECT Contact.id, Contact.sales_step, Contact.user_id, Contact.sperson, Contact.modified, Contact.created
			FROM `contacts` AS `Contact`
			WHERE
			`Contact`.`user_id` = :user_id
			AND `Contact`.`staff_transfer` = 1
			AND `Contact`.`status` <>  'Duplicate-Closed'
			AND `Contact`.`location_modified` = `Contact`.`modified`
			ORDER BY Contact.created DESC;",array('user_id'=> $this->Auth->user('id')   ));


			$contact_ids = array();
			foreach($lead_push_alert as $lead_push){
				$contact_ids[] = $lead_push['Contact']['id'];
			}
			$conditions = array(
				'Contact.id' => $contact_ids
			);
		}


		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'today_event_count'){
			$this->Event->bindModel(array('belongsTo'=>array('User')));
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){

				$con = $this->Contact->today_event_count($zone, $this->request->query['stat_type'], 'User' );
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);


			}else{
				$con = $this->Contact->today_event_count($zone, $dealer_id, 'Dealer' );
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}

		}



		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'overdue_event_count'){
			$this->Event->bindModel(array('belongsTo'=>array('User')));
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){

				$con = $this->Contact->overdue_event_count($zone, $this->request->query['stat_type'], 'User', $dealer_id );
        //debug($con);
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);


			}else{
				$con = $this->Contact->overdue_event_count($zone, $dealer_id, 'Dealer' );
        //debug($con);
				$today_events = $this->Event->find('all', array('fields'=>array('Contact.id'),'conditions' => $con   ));
				$contact_ids = array();
				foreach($today_events as $today_event){
					$contact_ids[] = $today_event['Contact']['id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}

		}




		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'closed_this_month'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions =  $this->Contact->closed_lead_count($zone, $this->request->query['stat_type'], $stats_month, $stats_year, 'User' );
			else
				$conditions =  $this->Contact->closed_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' );

		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'pending_this_month'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions =  $this->Contact->pending_lead_count($zone, $this->request->query['stat_type'], $stats_month, $stats_year, 'User' );
			else
				$conditions =  $this->Contact->pending_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' );

		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'open_this_month'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->open_lead_count($zone, $this->request->query['stat_type'], $stats_month, $stats_year, 'User' );
			else
				$conditions = $this->Contact->open_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'sold_this_month'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//$conditions = $this->Contact->sold_lead_count($zone, $current_user_id , $stats_month, 'User' );
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_lead_count($zone, $current_user_id , $stats_month, $stats_year, 'User' )  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);

			}else{
				//$conditions = $this->Contact->sold_lead_count($zone, $dealer_id, $stats_month, 'Dealer' );
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_lead_count($zone, $dealer_id , $stats_month, $stats_year, 'Dealer' )  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Sold'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->sold_lead_count($zone, $current_user_id , $stats_month, $stats_year, 'User' );
			else
				$conditions = $this->Contact->sold_lead_count($zone, $dealer_id, $stats_month, $stats_year, 'Dealer' );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'last_month'){

			$day_start = date('Y-m-01  00:00:00', strtotime('previous month'));
			$day_end = date('Y-m-t 23:59:59', strtotime('previous month'));
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				'Contact.modified >=' => $day_start,
				'Contact.modified <=' => $day_end
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'this_month'){
			$conditions = array(
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Today'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->today_lead_count($zone, $this->request->query['stat_type'], 'User');
			else
				$conditions = $this->Contact->today_lead_count($zone, $dealer_id, 'Dealer');

			if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'yesterday'){

			$day_start = date('Y-m-d 00:00:00',strtotime("-1 day"));
			$day_end  = date('Y-m-d 23:59:59',strtotime("-1 day"));
			$conditions = array(
				'Contact.modified >=' => $day_start,
				'Contact.modified <=' => $day_end
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Closed'){
			$conditions = array(
				// 'Contact.user_id' => $current_user_id,
				// 'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				'Contact.created >=' => $first_day_this_month,
				'Contact.created <=' => $last_day_this_month,
				'Contact.lead_status' => 'Closed',
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'Open'){
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				// 'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
				'Contact.created >=' => $first_day_this_month,
				'Contact.created <=' => $last_day_this_month,
				'Contact.lead_status' => 'Open',
            );
            if($group_id == '3'){
            	$conditions['Contact.user_id'] = $this->Auth->User('id');
            }
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_lead_pending'){
			//show room
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				'Contact.sales_step' => '1',
				'Contact.contact_status_id' => 7
            );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_lead_notpending'){
			//show room
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				'Contact.sales_step <>' => '1',
				'Contact.contact_status_id' => 7
            );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_lead_pending'){
			//phone room
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				'Contact.sales_step' => '1',
				'Contact.contact_status_id' => 6
            );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_lead_notpending'){
			//phone room
			$conditions = array(
			//	'Contact.user_id' => $current_user_id,
				'Contact.sales_step <>' => '1',
				'Contact.contact_status_id' => 6
            );
		}


		// web lead
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_just_arrived'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->just_arrived_condition(5,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->just_arrived_condition(5,$zone,$dealer_id, 'Dealer');

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_worked_today'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->worked_today_condition(5,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->worked_today_condition(5,$zone,$dealer_id, 'Dealer');

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_lead_still_pending'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->still_pending_condition(5,$zone,$current_user_id, 'User', $stats_month, $stats_year);
			else
				$conditions = $this->Contact->still_pending_condition(5,$zone,$dealer_id, 'Dealer', $stats_month, $stats_year);

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_dormant_48hrs'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->dormant_48hrs_condition(5,$zone,$current_user_id, 'User', $stats_month, $stats_year);
			else
				$conditions = $this->Contact->dormant_48hrs_condition(5,$zone,$dealer_id, 'Dealer', $stats_month, $stats_year);

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_closed_today'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->closed_today(5,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->closed_today(5,$zone,$dealer_id, 'Dealer');

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_sold_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//$conditions = $this->Contact->sold_today(5,$zone,$current_user_id, 'User');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(5,$zone,$current_user_id, 'User')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}else{
				//$conditions = $this->Contact->sold_today(5,$zone,$dealer_id, 'Dealer');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(5,$zone,$dealer_id, 'Dealer')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}
		}



		// mobile lead counts
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_just_arrived'){
			//$conditions = $this->Contact->just_arrived_condition(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->just_arrived_condition_mobile($zone,$current_user_id, 'User',$stats_month, $stats_year);
			else
				$conditions = $this->Contact->just_arrived_condition_mobile($zone,$dealer_id, 'Dealer',$stats_month, $stats_year);
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_worked_today'){
			//$conditions = $this->Contact->worked_today_condition(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->worked_today_condition(12,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->worked_today_condition(12,$zone,$dealer_id, 'Dealer');
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_still_pending'){
			//$conditions = $this->Contact->still_pending_condition(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->still_pending_condition(12,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->still_pending_condition(12,$zone,$dealer_id, 'Dealer');
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_dormant_48hrs'){
			//$conditions = $this->Contact->dormant_48hrs_condition(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->dormant_48hrs_condition(12,$zone,$current_user_id, 'User', $stats_month, $stats_year);
			else
				$conditions = $this->Contact->dormant_48hrs_condition(12,$zone,$dealer_id, 'Dealer', $stats_month, $stats_year);
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_closed_today'){
			//$conditions = $this->Contact->closed_today(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->closed_today(12,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->closed_today(12,$zone,$dealer_id, 'Dealer');
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_sold_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//$conditions = $this->Contact->sold_today(12,$zone,$current_user_id, 'User');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(12,$zone,$current_user_id, 'User')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);

			}else{
				//$conditions = $this->Contact->sold_today(12,$zone,$dealer_id, 'Dealer');

				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(12,$zone,$dealer_id, 'Dealer')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);
			}
		}

		//Phone Leads (Month)
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_inbound'){
			//$conditions = $this->Contact->new_inbound($zone, $dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$new_inbound_ar = $this->Contact->new_inbound($zone, $current_user_id, 'User');
			else
				$new_inbound_ar = $this->Contact->new_inbound($zone, $dealer_id, 'Dealer');
			$ids = array();
			foreach($new_inbound_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_outbound'){
			//$conditions = $this->Contact->new_outbound($zone, $dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$new_outbound_ar = $this->Contact->new_outbound($zone, $current_user_id, 'User');
			else
				$new_outbound_ar = $this->Contact->new_outbound($zone, $dealer_id, 'Dealer');

			$ids = array();
			foreach($new_outbound_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'existing_in'){
			//$existing_in_ar =  $this->Contact->existing_in($zone, $dealer_id);

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$existing_in_ar =  $this->Contact->existing_in($zone, $current_user_id , 'user');
			else
				$existing_in_ar =  $this->Contact->existing_in($zone, $dealer_id, 'Dealer');



			$ids = array();
			foreach($existing_in_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'existing_out'){
			//$existing_out_ar =  $this->Contact->existing_out($zone, $dealer_id);
			//debug();
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$existing_out_ar =  $this->Contact->existing_out($zone, $current_user_id , 'user');
			else
				$existing_out_ar =  $this->Contact->existing_out($zone, $dealer_id, 'Dealer');


			$ids = array();
			foreach($existing_out_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_closed_today'){
			//$conditions = $this->Contact->closed_today(6,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->closed_today(6,$zone,$current_user_id, 'User');
			else
				$conditions = $this->Contact->closed_today(6,$zone,$dealer_id, 'Dealer');

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_sold_today'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//$conditions = $this->Contact->sold_today(6,$zone,$current_user_id, 'User');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(6,$zone,$current_user_id, 'User')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);

			}else{
				//$conditions = $this->Contact->sold_today(6,$zone,$dealer_id, 'Dealer');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(6,$zone,$dealer_id, 'Dealer')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);


			}

		}


		//Showroom (Month)
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_new_visit'){
			//$conditions = $this->Contact->showroom_new_visit($zone, $dealer_id);

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//debug($this->request->query['stat_type']);
				$showroom_new_visit_ar = $this->Contact->showroom_new_visit($zone, $current_user_id, 'User');
			}else{
				$showroom_new_visit_ar = $this->Contact->showroom_new_visit($zone, $dealer_id, 'Dealer');
			}

			$ids = array();
			foreach($showroom_new_visit_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );

		}


		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_visit'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$web_visit_ar = $this->Contact->web_visit($zone, $current_user_id, 'User');
			else
				$web_visit_ar = $this->Contact->web_visit($zone, $dealer_id, 'Dealer');

			$ids = array();
			foreach($web_visit_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );

		}







		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_existing_visit'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->showroom_existing_visit($zone, $current_user_id, 'User');
			else
				$conditions = $this->Contact->showroom_existing_visit($zone, $dealer_id, 'Dealer');
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_dormant_48hrs'){

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->showroom_dormant_48hrs($zone, $current_user_id , 'user', $stats_month, $stats_year);
			else
				$conditions = $this->Contact->showroom_dormant_48hrs($zone, $dealer_id, 'Dealer', $stats_month, $stats_year);
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_dormant_48hrs'){
			//$conditions = $this->Contact->phone_dormant_48hrs($zone, $dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				$conditions = $this->Contact->phone_dormant_48hrs($zone, $current_user_id, 'user', $stats_month, $stats_year);
			}else{
				$conditions = $this->Contact->phone_dormant_48hrs($zone, $dealer_id, 'Dealer', $stats_month, $stats_year);
			}

		}
		//Events
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'overdue_events'){
			$start =  $this->request->query['start'];
			$overdue_events = $this->Contact->overdue_events( $dealer_id , $start, $zone, $this->request->query['users']);
			//debug( $overdue_events  );
			$ids = array();
			foreach($overdue_events as $overdue_event){
				$ids[] = $overdue_event['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'events'){
			$start =  $this->request->query['start'];
			$overdue_events = $this->Contact->events( $dealer_id , $start, $zone , $this->request->query['users']);
			//debug( $overdue_events  );
			$ids = array();
			foreach($overdue_events as $overdue_event){
				$ids[] = $overdue_event['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_missed_appt'){
			//$showroom_missed_appt_ar = $this->Contact->showroom_missed_appt($zone, $current_user_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$showroom_missed_appt_ar = $this->Contact->showroom_missed_appt($zone, $current_user_id , 'user');
			else
				$showroom_missed_appt_ar = $this->Contact->showroom_missed_appt($zone, $dealer_id, 'Dealer');



			$ids = array();
			foreach($showroom_missed_appt_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_missed_event'){
			//$web_missed_event_ar =$this->Contact->missed_event($zone, $current_user_id, 5);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$web_missed_event_ar =$this->Contact->missed_event($zone, 5, $current_user_id , 'user');
			else
				$web_missed_event_ar =$this->Contact->missed_event($zone,  5, $dealer_id, 'Dealer');


			$ids = array();
			foreach($web_missed_event_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_missed_event'){
			//$phone_missed_event_ar = $this->Contact->missed_event($zone, $current_user_id, 6);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$phone_missed_event_ar =$this->Contact->missed_event($zone, 6, $current_user_id , 'user');
			else
				$phone_missed_event_ar =$this->Contact->missed_event($zone,  6, $dealer_id, 'Dealer');

			$ids = array();
			foreach($phone_missed_event_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_missed_event'){
			//$mobile_missed_event_ar = $this->Contact->missed_event($zone, $current_user_id, 12);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$mobile_missed_event_ar =$this->Contact->missed_event($zone, 12, $current_user_id , 'user');
			else
				$mobile_missed_event_ar =$this->Contact->missed_event($zone,  12, $dealer_id, 'Dealer');


			$ids = array();
			foreach($mobile_missed_event_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_worksheet'){
			//$mobile_missed_event_ar = $this->Contact->showroom_worksheet($zone, $current_user_id);

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$mobile_missed_event_ar = $this->Contact->showroom_worksheet($zone, $current_user_id , 'user');
			else
				$mobile_missed_event_ar = $this->Contact->showroom_worksheet($zone, $dealer_id, 'Dealer');



			$ids = array();
			foreach($mobile_missed_event_ar as $epo){
				$ids[] = $epo['Contact']['id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_lead_search'){

			$mobile = str_replace("-","", trim($this->request->query['mobile']));
			$phone = str_replace("-","", trim($this->request->query['phone']));
			$first_name = trim($this->request->query['first_name']);
			$last_name = trim($this->request->query['last_name']);
			$id = trim($this->request->query['id']);

			$conditions = array();
			if($this->request->params['named']['search_type'] == 'broad'){
				if( $mobile != ''){
					$conditions['Contact.mobile like'] = '%' . $mobile . '%';
				}
				if( $phone != ''){
					$conditions['Contact.phone like'] = '%' . $phone  . '%';
				}
				if( $first_name != ''){
					$conditions['Contact.first_name like'] = '%' . $first_name  . '%';
				}
				if( $last_name != ''){
					$conditions['Contact.last_name like'] = '%' . $last_name  . '%';
				}
				if( $id != ''){
					$conditions['Contact.id like'] = '%' . $id  . '%';
				}

			}else if($this->request->params['named']['search_type'] == 'exact'){
				if( $mobile != ''){
					$conditions['Contact.mobile'] = $mobile;
				}
				if( $phone != ''){
					$conditions['Contact.phone'] = $phone;
				}
				if( $first_name != ''){
					$conditions['Contact.first_name'] = $first_name;
				}
				if( $last_name != ''){
					$conditions['Contact.last_name'] = $last_name;
				}
				if( $id != ''){
					$conditions['Contact.id'] = $id;
				}
			}




			/*
			$conditions = array();
			if(trim($this->params->query['mobile']) != ''){
				$conditions['OR']['Contact.mobile '] =  str_replace("-","",trim($this->params->query['mobile']));
			}
			if(trim($this->params->query['phone']) != ''){
				$conditions['OR']['Contact.phone'] = str_replace("-","",trim($this->params->query['phone']));
			}

			if(trim($this->params->query['id']) != ''){
				$conditions['OR']['Contact.id'] = trim($this->params->query['id']);
			}

			if(trim($this->params->query['first_name']) != ''){
				$fname = trim($this->params->query['first_name']);
				if( strlen($fname) > 1 ){
					$conditions['OR']['Contact.first_name LIKE'] = substr($fname,0,2)."%";
				}else{
					$conditions['OR']['Contact.first_name LIKE'] = $fname."%";
				}
			}
			if(trim($this->params->query['last_name']) != ''){
				$lname = trim($this->params->query['last_name']);
				if( strlen($fname) > 1 ){
					$conditions['OR']['Contact.last_name LIKE'] = substr($lname,0,2)."%";
				}else{
					$conditions['OR']['Contact.last_name LIKE'] = $lname."%";
				}
			}
			*/





			//debug($conditions);
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_closed_today'){
			//$conditions = $this->Contact->closed_today(7,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$conditions = $this->Contact->closed_today(7,$zone,$current_user_id , 'user');
			else
				$conditions = $this->Contact->closed_today(7,$zone, $dealer_id, 'Dealer');

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_sold_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer'){
				//$conditions = $this->Contact->sold_today(7,$zone,$current_user_id , 'user');

				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(7,$zone,$current_user_id , 'user')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);


			}else{
				//$conditions = $this->Contact->sold_today(7,$zone,$dealer_id, 'Dealer');
				$this->loadModel('LeadSold');
				$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
				$sold_leads = $this->LeadSold->find('all', array('fields'=>array('LeadSold.id','LeadSold.contact_id'), 'conditions' => $this->Contact->sold_today(7,$zone,$dealer_id, 'Dealer')  ));
				$contact_ids = array();
				foreach($sold_leads as $sold_lead){
					$contact_ids[] = $sold_lead['LeadSold']['contact_id'];
				}
				//debug($contact_ids);
				$conditions = array(
					'Contact.id' => $contact_ids
				);

			}
		}


		//sms text
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_sms_text'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$sms_texts = $this->Contact->sms_text(5,$zone,$current_user_id,'user');
			else
				$sms_texts = $this->Contact->sms_text(5,$zone,$dealer_id,'Dealer');
			$ids = array();
			foreach($sms_texts as $sms_text){
				$ids[] = $sms_text['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_sms_text'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$sms_texts = $this->Contact->sms_text(12,$zone,$current_user_id,'user');
			else
				$sms_texts = $this->Contact->sms_text(12,$zone,$dealer_id,'Dealer');
			$ids = array();
			foreach($sms_texts as $sms_text){
				$ids[] = $sms_text['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_sms_text'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$sms_texts = $this->Contact->sms_text(6,$zone,$current_user_id,'user');
			else
				$sms_texts = $this->Contact->sms_text(6,$zone,$dealer_id,'Dealer');
			$ids = array();
			foreach($sms_texts as $sms_text){
				$ids[] = $sms_text['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_sms_text'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$sms_texts = $this->Contact->sms_text(7,$zone,$current_user_id,'user');
			else
				$sms_texts = $this->Contact->sms_text(7,$zone,$dealer_id,'Dealer');
			$ids = array();
			foreach($sms_texts as $sms_text){
				$ids[] = $sms_text['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		//Note Update
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_noteupdate_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->note_update(5,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->note_update(5,$zone,$dealer_id, 'Dealer');
			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_noteupdate_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->note_update(12,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->note_update(12,$zone,$dealer_id, 'Dealer');
			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_noteupdate_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->note_update(6,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->note_update(6,$zone,$dealer_id, 'Dealer');
			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_noteupdate_today'){
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->note_update(7,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->note_update(7,$zone,$dealer_id, 'Dealer');
			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}







		//email sent
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_email_sent'){
			//$conditions = $this->Contact->email_sent(5,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->email_sent(5,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->email_sent(5,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_email_sent'){
			//$conditions = $this->Contact->email_sent(6,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->email_sent(6,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->email_sent(6,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );


		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_email_sent'){
			//$conditions = $this->Contact->email_sent(7,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->email_sent(7,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->email_sent(7,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );

		}
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_email_sent'){
			//$conditions = $this->Contact->email_sent(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$emails = $this->Contact->email_sent(12,$zone,$current_user_id , 'user');
			else
				$emails = $this->Contact->email_sent(12,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($emails as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		//appointment
		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'web_appointment'){
			//$appointments_ar =  $this->Contact->appointment(5,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$appointments_ar =  $this->Contact->appointment(5, $zone, $current_user_id , 'user');
			else
				$appointments_ar =  $this->Contact->appointment(5,$zone,$dealer_id, 'Dealer');



			$ids = array();
			foreach($appointments_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'phone_appointment'){
			//$appointments_ar =  $this->Contact->appointment(6,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$appointments_ar =  $this->Contact->appointment(6,$zone,$current_user_id , 'user');
			else
				$appointments_ar =  $this->Contact->appointment(6,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($appointments_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'showroom_appointment'){
			//$appointments_ar =  $this->Contact->appointment(7,$zone,$dealer_id);

			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$appointments_ar =  $this->Contact->appointment(7,$zone,$current_user_id , 'user');
			else
				$appointments_ar =  $this->Contact->appointment(7,$zone,$dealer_id, 'Dealer');


			$ids = array();
			foreach($appointments_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}

		else if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'mobile_appointment'){
			//$appointments_ar =  $this->Contact->appointment(12,$zone,$dealer_id);
			if(isset($this->request->query['stat_type']) && $this->request->query['stat_type'] != 'Dealer')
				$appointments_ar =  $this->Contact->appointment(12,$zone,$current_user_id , 'user');
			else
				$appointments_ar =  $this->Contact->appointment(12,$zone,$dealer_id, 'Dealer');

			$ids = array();
			foreach($appointments_ar as $epo){
				$ids[] = $epo['Contact']['contact_id'];
			}
			$conditions = array('Contact.id' => $ids );
		}
		elseif(isset($this->request->params['named']['search_all2'])&&!empty($this->request->params['named']['search_all2'])){

			$search_str =  $this->request->query['search_str'];
			// debug($search_str);

			$nls = array('quick:','email:','phone:','first_name:','last_name:','id:','price_range:','trade_price_range:',
			'floor_plans:','length:','weight:','sleeps:','fuel_type:',
			'sales_step:','status:','search_quick_lead:','searchrange:','vehicle_type:','vin:','stock_num:','unit_color:',
			'category:',
			'type:',
			'make:',
			'year:',
			'model:',
			'condition:'
			);
			$is_new = false;
			foreach ($nls as $nl){
				$pos =  strpos($search_str, $nl);
				if ($pos !== false) {
					$is_new = true;
					break;
				}
			}
			if($is_new == true){
				$ca = explode(",",$search_str);
				// debug($ca);
				$conds = array();
				foreach($ca as $c){
					$ca = explode(":",$c);
					$conds[trim($ca[0])] = trim($ca[1]);
				}
				// debug($conds);
				$fields = array('quick','email','phone','first_name','last_name','id','price_range','trade_price_range','floor_plans',
				'length','weight','sleeps','fuel_type', 'sales_step','status','search_quick_lead','searchrange',
				'vehicle_type','vin','stock_num','unit_color',
				'category',
				'type',
				'make',
				'year',
				'model',
				'condition', 'est_payment_search', 'vehicle_selection_type');
				$conditions = array();
				$vehicle_type = 'new_vehicle';
				foreach($conds as $key=>$value){
					if($key == 'vehicle_type'){
						$vehicle_type = $value;
					}
				}
				// debug( $vehicle_type);
				foreach($conds as $key=>$value){

					if($key == 'phone'){
						$new_lead_alert_condition['phone'] = str_replace(array(" ","-", '(',')'),"", trim($value));
					}
					if($key == 'email'){
						$new_lead_alert_condition['email'] = $value;
					}
                    if($key == 'first_name'){
						$new_lead_alert_condition['first_name'] = $value;
					}
                    if($key == 'last_name'){
						$new_lead_alert_condition['last_name'] = $value;
					}

					if( in_array($key, $fields) ){
						if( isset($conds['search_type']) &&  $conds['search_type'] == 'broad'){
							if($key == 'quick'){
								$value = str_replace("-","", trim($value));
								$conditions['OR']['Contact.email like'] = '%' . $value . '%';
								$conditions['OR']['Contact.mobile like'] = '%' . $value . '%';
								$conditions['OR']['Contact.phone like'] = '%' . $value . '%';
								$conditions['OR']['Contact.first_name like'] = '%' . $value . '%';
								$conditions['OR']['Contact.last_name like'] = '%' . $value . '%';

								//full name search
								if(!is_numeric($value)){
									$name_part = explode(" ", $value);
									if(count($name_part) == 2  ){
										$conditions['OR']['Contact.first_name like'] = '%' . $name_part[0] . '%';
										$conditions['OR']['Contact.last_name like'] = '%' . $name_part[1] . '%';
									}
								}

							}
							else if($key == 'first_name'){
								$conditions['OR']['Contact.first_name like'] = '%'.$value. '%';
								$conditions['OR']['Contact.spouse_first_name like'] = '%'.$value. '%';
								$conditions['OR']['Contact.company_work like'] = '%' . '%'.$value  . '%';

								$acc_id = $this->find_contact_account_id( $value );
								if($acc_id){
									$conditions['OR']['Contact.contact_account_id'] = $acc_id;
								}

							}
							else if($key == 'price_range'){
								$conditions['OR']['Contact.price_range'] = $value;
								$conditions = $this->Contact->set_price_range($conditions,  $value,  "unit_value");
							}
							else if($key == 'trade_price_range'){
								$conditions['OR']['Contact.trade_price_range'] = $value;
								$conditions = $this->Contact->set_price_range($conditions,  $value,  "trade_value");
							}else if($key == 'phone'){
								$value = str_replace(array(" ","-", '(',')'),"", trim($value));
								$conditions['OR']['Contact.mobile like'] = '%' . $value . '%';
								$conditions['OR']['Contact.phone like'] = '%' . $value . '%';
								$conditions['OR']['Contact.work_number like'] = '%' . $value . '%';
							}else if(
							$key == 'year' ||
								$key == 'make' ||
								$key == 'category' ||
								$key == 'type' ||

								$key == 'vehicle_type' ||
								$key == 'vin' ||
								$key == 'stock_num' ||
								$key == 'unit_color' ||
								$key == 'condition' ||
								$key == 'model' ||
								$key == 'year' ||
								$key == 'vehicle_selection_type' ||
								$key == 'searchrange' ||	$key == 'status' || $key ==  'sales_step' ||  $key == 'search_vehicle' || $key ==  'search_quick_lead' ){

								//do nothing



							}else{
								/*
								if($key == 'mobile' || $key == 'phone'){
									$value = str_replace("-","", trim($value));
								}
								*/
								$conditions["Contact.".$key." LIKE"] = "%".$value."%";
							}

						}else{
							if($key == 'quick'){
								$value = str_replace("-","", trim($value));
								$conditions['OR']['Contact.email'] = $value;
								$conditions['OR']['Contact.mobile'] =  $value;
								$conditions['OR']['Contact.phone'] = $value;
								$conditions['OR']['Contact.first_name'] = $value;
								$conditions['OR']['Contact.last_name'] = $value;

								//full name search
								if(!is_numeric($value)){
									$name_part = explode(" ", $value);
									if(count($name_part) == 2  ){
										$conditions['OR']['Contact.first_name'] = $name_part[0];
										$conditions['OR']['Contact.last_name'] = $name_part[1];
									}
								}


							}
							else if($key == 'first_name'){
								$conditions['OR']['Contact.first_name like'] = $value. '%';
								$conditions['OR']['Contact.spouse_first_name like'] = $value. '%';
								$conditions['OR']['Contact.company_work like'] = '%' . $value  . '%';

								$acc_id = $this->find_contact_account_id( $value );
								if($acc_id){
									$conditions['OR']['Contact.contact_account_id'] = $acc_id;
								}

							}
							else if($key == 'last_name'){
								$conditions['Contact.last_name like'] = $value . '%';
							}

							else if($key == 'price_range'){
								$conditions['OR']['Contact.price_range'] = $value;
								$conditions = $this->Contact->set_price_range($conditions,  $value,  "unit_value");
							}
							else if($key == 'trade_price_range'){
								$conditions['OR']['Contact.trade_price_range'] = $value;
								$conditions = $this->Contact->set_price_range($conditions,  $value,  "trade_value");
							}else if($key == 'phone'){
								$value = str_replace(array(" ","-", '(',')'),"", trim($value));
								$conditions['OR']['Contact.mobile like'] =  $value. '%';
								$conditions['OR']['Contact.phone like'] = $value. '%';
								$conditions['OR']['Contact.work_number like'] = $value. '%';
							}
							else if(
								$key == 'make' ||
								$key == 'category' ||
								$key == 'type' ||

								$key == 'vehicle_type' ||
								$key == 'vin' ||
								$key == 'stock_num' ||
								$key == 'unit_color' ||
								$key == 'condition' ||
								$key == 'model' ||
								$key == 'year' ||
								$key == 'vehicle_selection_type' ||


							     $key == 'searchrange' ||   $key == 'status' || $key ==  'sales_step' ||  $key == 'search_vehicle' || $key ==  'search_quick_lead' ){

								//do nothing

							}
							else{
								/*
								if($key == 'mobile' || $key == 'phone'){
									$value = str_replace("-","", trim($value));
								}
								*/
								$conditions["Contact.".$key] = $value;
							}

						}

						if($vehicle_type == 'new_vehicle'){

							if( $key == 'category' ){
								$conditions['Contact.category'] = $value;
							}
							if( $key == 'type' && $value != 'Any Category'){
								$conditions['Contact.type'] =$value;
							}
							if( $key == 'make' && $value != 'Any Make'){
								$conditions['Contact.make'] =$value;
							}
							if( $key == 'year' && $value != '0'){
								$conditions['Contact.year'] =$value;
							}
							if( $key == 'condition'){
								$conditions['Contact.condition'] =$value;
							}
							if( $key == 'vin'){
								$conditions['Contact.vin'] =$value;
							}
							if( $key == 'stock_num'){
								$conditions['Contact.stock_num'] =$value;
							}
							if( $key == 'unit_color'){
								$conditions['Contact.unit_color'] =$value;
							}
							if( $key == 'model' && $value != 'Any Model'){
								$conditions['Contact.model like'] = '%' . $value . '%';
							}

							if($key == 'vehicle_selection_type'){
								//$conditions['Contact.vehicle_selection_type'] = $value;
							}

						}else{

							if( $key == 'category'){
								$conditions['Contact.category_trade'] = $value;
							}
							if( $key == 'type' && $value != 'Any Category'){
								$conditions['Contact.type_trade'] =$value;
							}
							if( $key == 'make' && $value != 'Any Make'){
								$conditions['Contact.make_trade'] =$value;
							}
							if( $key == 'year' && $value != '0'){
								$conditions['Contact.year_trade'] =$value;
							}
							if( $key == 'condition'){
								$conditions['Contact.condition_trade'] =$value;
							}
							if( $key == 'vin'){
								$conditions['Contact.vin_trade'] =$value;
							}
							if( $key == 'stock_num'){
								$conditions['Contact.stock_num_trade'] =$value;
							}
							if( $key == 'unit_color'){
								$conditions['Contact.usedunit_color'] =$value;
							}
							if( $key == 'model' && $value != 'Any Model'){
								$conditions['Contact.model like'] = '%' . $value . '%';
							}

							if($key == 'vehicle_selection_type'){
								//$conditions['Contact.vehicle_selection_type_trade'] = $value;
							}



						}

						if( $key == 'est_payment_search'){
							$conditions['Contact.est_payment_search'] = $value;
						}

						//debug($this->request->query['status']);
						if( $key == 'status'){
							$conditions['Contact.status'] =$value;
						}
						if( $key == 'sales_step'){
							$conditions['Contact.sales_step'] = $value;
						}

						if( $key == 'search_vehicle'){
							$conditions['Contact.type'] = $value;
							// $conditions['date_format(Contact.modified,\'%Y-%m\')'] = date('Y-m');
							$conditions['Contact.modified >='] = date('Y-m-01 00:00:00');
							$conditions['Contact.modified <='] = date('Y-m-t 23:59:59');
						}

						if( $key == 'searchrange'){
							if($value == 'two_years'){
								$conditions['Contact.modified >='] = date("Y-m-d", strtotime('-2 year'));
							}
						}

						if( $key == 'search_quick_lead'){
							$quick_search = $value;

							if($quick_search == 'this_month'){
								// $conditions['date_format(Contact.modified,\'%Y-%m\')'] = date('Y-m');
								$conditions['Contact.modified >='] = date('Y-m-01 00:00:00');
								$conditions['Contact.modified <='] = date('Y-m-t 23:59:59');
							}

							if($quick_search == 'last_month'){
								$day_start = date('Y-m-01  00:00:00', strtotime('previous month'));
								$day_end = date('Y-m-t 23:59:59', strtotime('previous month'));
								$conditions = array(
									'Contact.modified >=' => $day_start,
									'Contact.modified <=' => $day_end
					            );
							}

							if($quick_search == 'yesterday'){
								$day_start = date('Y-m-d 00:00:00',strtotime("-1 day"));
								$day_end  = date('Y-m-d 23:59:59',strtotime("-1 day"));
								$conditions = array(
									'Contact.modified >=' => $day_start,
									'Contact.modified <=' => $day_end
					            );
							}

							if($quick_search == 'Today'){
								$conditions = $this->Contact->today_lead_count($zone, $dealer_id, 'Dealer');
							}

							if($quick_search == 'Closed'){
								$conditions = array(
									// 'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
									'Contact.created >=' => date('Y-m-01 00:00:00'),
									'Contact.created <=' => date('Y-m-t 23:59:59'),
									'Contact.lead_status' => 'Closed',
					            );
							}

							if($quick_search == 'Open'){
								$conditions = array(
									// 'date_format(Contact.created,\'%Y-%m\')' => date('Y-m'),
									'Contact.created >=' => date('Y-m-01 00:00:00'),
									'Contact.created <=' => date('Y-m-t 23:59:59'),
									'Contact.lead_status' => 'Open',
					            );
							}

							if($quick_search == 'web_lead'){
								$conditions = array(
									'Contact.contact_status_id' => 5,
					            );
							}
							if($quick_search == 'showroom_lead'){
								$conditions = array(
									'Contact.contact_status_id' => 7,
					            );
							}
							if($quick_search == 'phone_lead'){
								$conditions = array(
									'Contact.contact_status_id' => 6,
					            );
							}
							if($quick_search == 'mobile_lead'){
								$conditions = array(
									'Contact.contact_status_id' => 12,
					            );
							}





							//debug($this->request->query['search_quick_lead']);
							//$conditions['Contact.sales_step'] = $this->request->query['sales_step'];
						}
















					}
				}
				//$conditions['Contact.status <>'] = 'Duplicate-Closed';
			//	$conditions['date_format(Contact.modified,\'%Y\')'] = array( (date('Y')-1),  date('Y'));
				// debug($new_lead_alert_condition);
				$this->set('new_lead_alert_condition', $new_lead_alert_condition);
			}else{
				//debug($search_str);
				$search['search_all2'] = $search_str;
				$conditions = array($this->Contact->searchDefault2(array('search_all2'=>$search_str)));
				// debug($conditions);
				//$search['search_all2'] = $this->request->params['named']['search_all2'];
				//$conditions = array($this->Contact->searchDefault2($search));
			}
			//debug($conditions);

		}
		elseif(isset($this->passedArgs['search_created'])&&!empty($this->passedArgs['search_modified'])&&!empty($this->passedArgs['search_created']))
		{
			$conditions=array(array('Date(Contact.created) >='=>date('Y-m-d',strtotime($this->passedArgs['search_created'])),'Date(Contact.modified) <='=>date('Y-m-d',strtotime($this->passedArgs['search_modified']))));
		}
		elseif(isset($this->passedArgs['search_created'])&&!empty($this->passedArgs['search_created']))
		{
			$conditions=array(array('Date(Contact.created)'=>date('Y-m-d',strtotime($this->passedArgs['search_created']))));
		}
		elseif(isset($this->passedArgs['search_modified'])&&!empty($this->passedArgs['search_modified']))
		{
			$conditions=array(array('Date(Contact.modified)'=>date('Y-m-d',strtotime($this->passedArgs['search_modified']))));
		}


		else{
			$tmp_pass = $this->passedArgs;
			//debug($tmp_pass);
			if($this->passedArgs['search_vehicle_trade'] == 'trade'){
				unset($tmp_pass['search_category']);
				unset($tmp_pass['search_type']);
				unset($tmp_pass['search_class']);
				unset($tmp_pass['search_year']);
				unset($tmp_pass['search_make']);
				unset($tmp_pass['search_model_id']);
				unset($tmp_pass['search_model']);
				unset($tmp_pass['search_condition']);
				unset($tmp_pass['search_unit_color']);

				$tmp_pass['search_category_trade'] = $this->passedArgs['search_category'];
				$tmp_pass['search_type_trade'] = $this->passedArgs['search_type'];
				$tmp_pass['search_class_trade'] = $this->passedArgs['search_class'];
				$tmp_pass['search_year_trade'] = $this->passedArgs['search_year'];
				$tmp_pass['search_make_trade'] = $this->passedArgs['search_make'];
				$tmp_pass['search_model_id_trade'] = $this->passedArgs['search_model_id'];
				$tmp_pass['search_model_trade'] = $this->passedArgs['search_model'];
				$tmp_pass['search_condition_trade'] = $this->passedArgs['search_condition'];
				$tmp_pass['search_usedunit_color'] = $this->passedArgs['search_unit_color'];
			}

			// debug($tmp_pass);

			if($tmp_pass['search_type'] == 'Any Category'){
				unset($tmp_pass['search_type']);
			}
			if($tmp_pass['search_make'] == 'Any Make'){
				unset($tmp_pass['search_make']);
			}
			if($tmp_pass['search_year'] == '0'){
				unset($tmp_pass['search_year']);
			}
			if($tmp_pass['search_model'] == 'Any Model'){
				unset($tmp_pass['search_model']);
			}
			if($tmp_pass['search_class'] == 'Any Class'){
				unset($tmp_pass['search_class']);
			}

			//debug($tmp_pass);

			$conditions = array($this->Contact->parseCriteria($tmp_pass));
			if(!in_array($this->Auth->user('group_id'),array(2,4,6,7,12)))
			{
				$conditions['Contact.user_id'] = $this->Auth->user('id');
			}
			//debug($conditions);
		}

		if($set_status == 0){
			foreach($conditions as $con){
				if( is_array($con)){
					if(key($con) == 'Contact.status'){
						$set_status = 1;
					}
				}
			}
		}

		if($set_status == 0){
			//$conditions['OR']= array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null);
			$conditions['Contact.status <> '] = 'Duplicate-Closed';
		}
		$conditions['Contact.company_id'] = $dealer_id;

		// debug($conditions);

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
			'Contact.work_number',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.sperson',
			'Contact.owner',
      'Contact.user_id',
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Event.start',
			'Contact.dnc_status',
      'Contact.created'
		);

		if( isset( $this->request->query['view_type']) && $this->request->query['view_type'] == 'table_view'   ){
			$this->Contact->bindModel(array('hasMany'=>array('Deal'=>array('fields'=>array('Deal.id')))), false);
		}else{
			$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);
		}

		//debug($this->request->named);
		//Condition commented to show only salesperson leads when sales person is logged in
		if(isset($this->request->named['search_source']) && $this->request->named['search_source'] =='left_menu' && $this->Auth->User('group_id') == '3' ){
			//debug('limit');
			$conditions['Contact.user_id'] = $this->Auth->User('id');
		}

		//debug( $conditions );
		//Order
		$order_list  = 'Contact.modified DESC';
		if(isset($this->request->params['named']['search_all']) && (
				$this->request->params['named']['search_all'] == 'overdue_event_count' ||
				$this->request->params['named']['search_all'] == 'today_event_count' ||
				$this->request->params['named']['search_all'] == 'showroom_missed_appt' ||
				$this->request->params['named']['search_all'] == 'web_missed_event' ||
				$this->request->params['named']['search_all'] == 'mobile_missed_event' ||

				$this->request->params['named']['search_all'] == 'web_appointment' ||
				$this->request->params['named']['search_all'] == 'phone_appointment' ||
				$this->request->params['named']['search_all'] == 'showroom_appointment' ||
				$this->request->params['named']['search_all'] == 'mobile_appointment'


			) ){
			$order_list = 'Event.start ASC';

		}

		// if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == ''){
		// 	$order_list = 'Event.start ASC';
		// }
		// if(isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'today_event_count'){
		// 	$order_list = 'Event.start ASC';
		// }


    //Dependent code for Table View Sort Feature ~ASR
    if( isset( $this->request->query['search'])){
      $search_url = $this->request->query['search']."&_=".$this->request->query['_']."&stat_type=".$this->request->query['stat_type']."&range=".$this->request->query['range']."&view_type=".$this->request->query['view_type'];
      $this->set('search_string',$search_url);
    }

    if(isset($this->request->query['order'])){
      $ord = (isset($this->request->query['ord'])) ? $this->request->query['ord'] : "DESC";
      $order_obj['header'] = $this->request->query['order'];
      $order_obj['ord'] = $this->request->query['ord'];
      $this->set('orders',$order_obj);
      switch($this->request->query['order']) {
        case 'Name':
          $order_list = 'Contact.first_name '.$ord;
          break;
        case 'Contact':
          $order_list = 'Contact.phone '.$ord;
          break;
        case 'Source':
          $order_list = 'Contact.source '.$ord;
          break;
        case 'Modified':
          $order_list = 'Contact.modified '.$ord;
          break;
        case 'Created':
          $order_list = 'Contact.created '.$ord;
          break;
        case 'SPerson':
          $order_list = 'Contact.sperson '.$ord;
          break;
        default:
        	$order_list  = 'Contact.id '.$ord;
          break;
      }
    }
    //End of Table View Sort Feature
		if(isset($this->request->query['onlycount'])){

			$contact_count = $this->Contact->find("count", array('conditions' => $conditions));
			echo $contact_count." - Lead found";
			$this->autoRender = false;
		}else{

			/* Changing the order by clause for new lead search to speed up the SQL Query response */
			if((isset($this->request->params['named']['search_all2'])&&!empty($this->request->params['named']['search_all2']) && !empty($this->request->query['search_str'])) || (isset($this->request->params['named']['search_all']) && $this->request->params['named']['search_all'] == 'new_lead_search'))
			{
				$ord = (isset($this->request->query['ord'])) ? $this->request->query['ord'] : "DESC";
				$order_list  = 'Contact.id '.$ord;
			}

      /* Using a custom Data source that allows use of MySQL FORCE INDEX due to the MySQL Optimizer trying to use Modified Date as index instead of company_id */

	  // commenting this code for the Db pool changes
      /*$this->Contact->setDataSource('ContactReadonlySource');
      $this->ContactStatus->setDataSource('ContactReadonlySource');
      $this->Event->setDataSource('ContactReadonlySource');
      $this->User->setDataSource('ContactReadonlySource');
      $this->Contact->useIndex = 'FORCE INDEX(company_id)';
		*/
			$this->paginate = array(
				'conditions' => $conditions,
				'fields'=>$fields,
				'order'=>$order_list,
				'limit' => 20,
			);

			$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))), false);


			$contacts = $this->Paginate();
			$this->set('contacts', $contacts);
			//debug($contacts);
			// debug($conditions);

			/*
			$contacts_count = $this->Contact->find('count', array('conditions' => $conditions));
			$this->Contact->unbindModel(array('belongsTo'=>array('User'),'hasMany'=>array('Deal')));

			$contacts = $this->Contact->find('all', array('fields'=>$fields,'conditions' => $conditions, 'order' => array('Contact.id' => 'DESC')));
			$this->set('contacts_count', $contacts_count);
			$this->set('contacts', $contacts);
			*/
			$history_count = array();
			$appointments = array();

			$rds = array();
			$yds = array();


			foreach($contacts as $contact){
				if($contact['Contact']['status'] == 'Duplicate-Closed' || $contact['Contact']['chk_duplicate'] == 1 || $contact['Contact']['lead_status'] == 'Closed' ||  $contact['Contact']['sales_step'] == '10'  ){
					continue;
				}else{
					//debug($contact['Contact']['id']);
					//debug($contact['Contact']['status']);
					//debug($contact['Contact']['chk_duplicate']);
					$is_dupllicate = $this->_find_duplicates($contact);
					foreach($is_dupllicate['rd'] as $rd){
						$rds[$rd] = 1;
					}
					foreach($is_dupllicate['yd'] as $rd){
						$yds[$rd] = 1;
					}
				}

				/* count history */
				$params = array(
	           	 'conditions' => array('History.contact_id' => $contact['Contact']['id']),
	        	);

	        	if( isset( $this->request->query['view_type']) && $this->request->query['view_type'] == 'table_view'   ){
					$history_count[$contact['Contact']['id']] = $this->History->find('count', $params);
					$appointments[$contact['Contact']['id']] = $this->_appointment_date($contact['Contact']['id'], $zone);
	        	}



			}
			$this->set('rds', $rds);
			$this->set('yds', $yds);
			$this->set('history_count', $history_count);
			$this->set('appointments', $appointments);

			//debug($appointments);

				// $smtp_settings = $this->requestAction("/user_emails/get_setting/smtp");
			 //   	$this->set("smtp_settings", $smtp_settings);
			 //   	//debug($smtp_settings);

			 //   	$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
				// $this->set('email_settings', $email_settings);



			if( isset( $this->request->query['view_type']) && $this->request->query['view_type'] == 'table_view'   ){

				$this->set('sales_step_options',  $this->get_dealer_steps() );

				$this->loadModel('LeadScoreEmail');
				$recipients=$this->LeadScoreEmail->find('count',array('conditions'=>array('dealer_id'=>$dealer_id)));
				$this->set(compact('recipients'));
				$this->render('search_result_table');
			}

















		}







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

   	public function leads_main($csvFile = null,$contact_id = null) {

		$this->layout='default_new';
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$this->set('dealer_id',$dealer_id);
        $searched = false;
        $selected_type = "";
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

        $current_user_id = $this->Auth->User('id');
        $this->Prg->commonProcess();
        //$this->Contact->recursive = 0;
        $this->passedArgs['user_id'] = $current_user_id;
        if ($group_id == 2) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.company_id' => $dealer_id,
                //'Contact.sales_step = Contact.sales_step',
            );
        } elseif ($group_id == 1) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                //'Contact.sales_step = Contact.sales_step',
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.user_id' => $current_user_id,
                //'Contact.sales_step = Contact.sales_step',
                '1 = 1'
            );
        }
        if ($csvFile) {
            $this->paginate = array(
                'conditions' => $conditions,
                'order' => array(
                    'Contact.sperson' => 'DESC',
                )
            );
            $this->request->params['named']['page'] = null;
        } else {
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => 3,
                'order' => array(
                    'Contact.id' => 'DESC'
                )
            );
        }
      //  $this->set('contacts', $this->Paginate());
		if( $this->Session->check("load_lead") ){
			$this->set('load_lead', $this->Session->read("load_lead"));
			$this->Session->delete("load_lead");
		}


		//Status options
		$this->loadModel("LeadStatus");
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']][$leadStatus['LeadStatus']['name']] = $leadStatus['LeadStatus']['name'];
		}
		$this->set('lead_status_options', $lead_status_options);

		//source options
		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('lead_sources_options', $lead_sources_options);


    //location options
    /*
    $lead_locations = $this->Contact->find('list',array('order'=>array('Contact.location ASC'),'conditions'=>array(
      'Contact.company_id'=> $this->Auth->user('dealer_id')
    )));
    $lead_locations_options = array();
    foreach($lead_locations['location'] as $lead_locations){
      $lead_locations_options[$lead_locations] = $lead_locations;
    }
    $this->set('lead_locations_options',$lead_locations_options);
    */

		//SalesStep options
		$this->loadModel('SalesStep');
		// $step_cond = array();
		// if($this->Auth->user('step_procces') == 'lemco_steps'){
		// 	$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		// }else{
		// 	$step_cond = array('SalesStep.step_process'=>'hd_steps');
		// }
		// $sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		// $sales_step_options = array();
		// foreach($sales_steps as $sales_step){
		// 	$sales_step_options[ "salesstep_search_". str_replace("/", "----", $sales_step['SalesStep']['step'])  ] =  $sales_step['SalesStep']['step'];
		// }
		//$this->set('sales_step_options', $sales_step_options);
		$this->set('sales_step_options_original',  $this->get_dealer_steps() );


		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$stats_month_name = date('M', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month_name', $stats_month_name);




		//Inventory Center
		 $this->loadModel("Category");
		// $d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		// $d_type_options = array();
		// foreach($d_types as $d_type){
		// 	$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		// }
		$d_type_options = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
		if($this->Auth->User('dealer_id') == '20020'){
			$d_type_options['Branch Inventory'] = 'Branch Inventory';
		}
		asort( $d_type_options );

		$this->set('d_type_options', $d_type_options);




		$user_d_type = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$user_d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$type_options = array();
		foreach($d_types as $d_type){
			$type_options[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
		}
		$this->set('type_options', $type_options);
		$this->set('user_d_type', $user_d_type);


		$this->set('d_type', $this->Auth->User('d_type'));


		//< vehicle inputs start >
		$this->set('PriceRangeOptions', $this->ContactStatus->PriceRangeNonRvOptions());
		$this->set('PriceRangeNonRvOptions', $this->ContactStatus->PriceRangeNonRvOptions());

		$this->set('FloorPlansOptions', $this->ContactStatus->FloorPlansOptions);
		$this->set('LengthOptions', $this->ContactStatus->LengthOptions);
		$this->set('WeightOptions', $this->ContactStatus->WeightOptions);
		$this->set('SleepsOptions', $this->ContactStatus->SleepsOptions);
		$this->set('FuelTypeOptions', $this->ContactStatus->FuelTypeOptions);
		//</ vehicle inputs end >


		$traditional_log_view = $this->requestAction("dealer_settings/get_settings/traditional-log-view");
		$this->set('traditional_log_view', $traditional_log_view);

		$start_search = $this->requestAction("dealer_settings/get_settings/start_search");
		$this->set('start_search', $start_search);


		//SalesStep options
		$this->loadModel('SalesStep');
		// $step_cond = array();
		// if($this->Auth->user('step_procces') == 'lemco_steps'){
		// 	$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		// }else{
		// 	$step_cond = array('SalesStep.step_process'=>'hd_steps');
		// }
		// $sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		// $sales_step_options_popup = array();
		// foreach($sales_steps as $sales_step){
		// 	$sales_step_options_popup [ $sales_step['SalesStep']['step'] ] =  $sales_step['SalesStep']['step'];
		// }
		// $this->set('sales_step_options_popup', $sales_step_options_popup);
		$sales_step_options_popup = $this->get_dealer_steps();
		$this->set('sales_step_options_popup',  $sales_step_options_popup  );

		$sales_step_options = array();
		foreach($sales_step_options_popup as $key=>$value){
			$sales_step_options[ "salesstep_search_". $key  ] =  $value;
		}
		$this->set('sales_step_options',  $sales_step_options);


		//Status options
		$this->loadModel("LeadStatus");
		$leadStatuses = $this->LeadStatus->find('all',array('conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options_popup = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options_popup[$leadStatus['LeadStatus']['header']][ $leadStatus['LeadStatus']['name'] ] = $leadStatus['LeadStatus']['name'];
		}
		$this->set('lead_status_options_popup', $lead_status_options_popup);

		$this->loadModel('Category');
		$d_type = $this->Auth->User('d_type');
		$this->set('d_type', $d_type);

		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$d_type_options_popup = array();
		foreach($d_types as $d_type){
			$d_type_options_popup[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
		}
		$this->set('d_type_options_popup', $d_type_options_popup);


		$categoryn = '';
		$typen = '';
		$maken = '';
		$yearn = '';
		$model_idn = '';
		$modeln = '';

		$body_typen = array();
		$mk_optionsn = array();
		$year_optn = array();
		$model_optn = array();

		if(  isset( $this->params->query['newleadsearch']) ){
			$original_text =  $this->params->query['newleadsearch'];
			$txt_ar = explode(",", $original_text);
			//debug($txt_ar);
			foreach($txt_ar as $ta){
				$inp = explode(":", $ta);
				if(count($inp) == 2){
					$inp[0] = trim($inp[0]);
					$inp[1] = trim($inp[1]);

					//load Type
					if($inp[0] == 'category'){
						$categoryn = $inp[1];
						$body_typen = $this->requestAction(array('controller'=>'categories','action'=>'get_category_list','return','?'=>array('d_type'=>$categoryn)));

					}
					//load make
					if($inp[0] == 'type'){
						$typen = $inp[1];
						$mk_optionsn = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return','?'=>array('type'=>$categoryn,'category'=>$typen)));
					}
					//Load Year
					if($inp[0] == 'make'){
						$maken = $inp[1];
						$year_optn[0] = 'Any Year';
						for($i=date('Y')+1; $i>=1980; $i--){
							$year_optn[$i] = $i;
						}
					}
					//load Model
					if($inp[0] == 'year'){
						$yearn = $inp[1];
						$model_optn = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return','?'=>array(
							'year'=>$yearn,
							'make'=>$maken,
							'type'=>$categoryn,
							'category'=>$typen
						)));
					}

					//$model_idn = '';
					//$modeln = '';

					if($inp[0] == 'model_id'){
						$model_idn = $inp[1];
					}
					if($inp[0] == 'model'){

						$modeln = $inp[1];
					}



				}

			}
		}
		//debug($model_optn);
		$this->set('body_typen', $body_typen);
		$this->set('mk_optionsn', $mk_optionsn);
		$this->set('year_optn', $year_optn);
		$this->set('model_optn', $model_optn);

		//$display_model_idn
		//$display_model_txtn
		$display_model_idn = 'inline-block';
		$display_model_txtn = 'none';
		if($modeln != '' && $model_idn == ''){
			$display_model_idn = 'none';
			$display_model_txtn = 'inline-block';
		}
		$this->set('display_model_idn', $display_model_idn);
		$this->set('display_model_txtn', $display_model_txtn);

		$sperson_list = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),
		 'User.active'=>1, 'User.dealer_id'=>$this->Auth->user('dealer_id') )));
		$this->set('sperson_list', $sperson_list  );
		//debug( $sperson_list );



		if($contact_id != ''){
			//debug($contact_id);
			$cnt = $this->Contact->find('first', array('recursive'=>-1, 'conditions' => array('Contact.id'=>$contact_id), 'fields'=>array('Contact.id','Contact.company_id') ));
			if(!empty($cnt)){
				if($cnt['Contact']['company_id'] != $this->Auth->user('dealer_id') ){

					$this->redirect(array('controller' => 'users', 'action' => 'login', '?'=>array('contact_id'=>$contact_id, 'dealer_id'=>$cnt['Contact']['company_id']) ));

				}

			}

		}



		$this->loadModel('DealerSetting');
		$shopper_notification_group = $this->DealerSetting->get_settings('shopper_notification_group', $dealer_id);
		$allow_shopper = 'yes';
		if(!empty($shopper_notification_group)){
			if( in_array($group_id, $shopper_notification_group) ){
				$allow_shopper = 'yes';
			}else{
				$allow_shopper = 'no';
			}
		}else{
			$allow_shopper = 'yes';
		}
		$this->set('allow_shopper', $allow_shopper);
		//debug($allow_shopper);


		$d_type_options_search = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('vehicle_selection_type'=>"Showroom" )));
		$this->set('d_type_options_search', $d_type_options_search);

    }

    public function duplicate_lead_test(){

    	$c_d = $this->Contact->find("first", array("recursive" => -1, 'conditions' => array('Contact.id'=>'3884114')));
    	$c_d['Contact']['id'] = 50000;
    	 //debug( $c_d );

    	$this->layout = 'ajax';
    	$this->duplicate_lead_alert($c_d);
      $this->autoRender = false;
    }
    public function duplicate_lead_alert_settings(){
    	//DUPLICATE LEAD ALERT SETTINGS
    	$this->LoadModel('DuplicateLeadAlert');
		$dealer_id = $this->Auth->user('dealer_id');
		$duplicateLeadAlert = $this->DuplicateLeadAlert->find("first", array("conditions"=>array("DuplicateLeadAlert.dealer_id" => $dealer_id)));

		$recipients = array();
		$duration = 0;
		if(!empty($duplicateLeadAlert) && $duplicateLeadAlert['DuplicateLeadAlert']['notification_duration'] != ''  &&  $duplicateLeadAlert['DuplicateLeadAlert']['recipients'] != ''  ){
			$recipients = json_decode( $duplicateLeadAlert['DuplicateLeadAlert']['recipients'], true );
			$duration = $duplicateLeadAlert['DuplicateLeadAlert']['notification_duration'];
			if(!empty($recipients) && $duration >= 30 ){
				return array('recipients'=>$recipients, 'duration' => $duration);
			}
		}
		return array();
    }
    public function duplicate_lead_alert_find( $c_d, $days ){

		$dealer_id = $this->Auth->user('dealer_id');

    //Find Dealer IDs in CRM Group of Dealers
    $this->loadModel("DealerName");
    $dlr = $this->DealerName->find('list',array('recursive'=>-1,'conditions' => array('DealerName.dealer_id' => $dealer_id), 'fields' => array('dealer_id','crm_group')));
    if(!empty($dlr[$this->Auth->user('dealer_id')])) $dealer_id = explode(",",$dlr[$this->Auth->user('dealer_id')]);

		$one_month = date('Y-m-d H:i:s', strtotime("-".$days." days")   ) ;
		$cond = array(
			'Contact.company_id'=>$dealer_id,
			'Contact.id <>'=>$c_d['Contact']['id'],
			'Contact.chk_duplicate' => 0,
			'Contact.status <>'=>'Duplicate-Closed',
			'Contact.lead_status'=>'Open',
			'Contact.sales_step <>'=>'10',
			'Contact.modified >='=>$one_month,
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
		//	debug($cond);
		if($checkduplicate == false){
			return 0;
		}
		$d_cs =  $this->Contact->find('count',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status','Contact.created'),
			'conditions' => $cond
		));

		return $d_cs;
    }
    public function duplicate_lead_alert($lead_data){
    	$settings = $this->duplicate_lead_alert_settings();
    	if(!empty( $settings )){
    		//debug($settings);
    		$duplicate_lead = $this->duplicate_lead_alert_find( $lead_data,  $settings['duration']);
    		//debug( $duplicate_lead );

    		if($duplicate_lead > 0){

    			//SEND DUPLICATE NOTIFICATION
				$mail_body = "New  Duplicate Added #".$lead_data['Contact']['id']." - ".date('m/d/Y g:i A' , strtotime($lead_data['Contact']['modified']) ). "<br><br>"  ;
				$mail_body .= "Originator: ".$lead_data['Contact']['owner']." <br>";
				$mail_body .= "Sales Person: ".$lead_data['Contact']['sperson']." <br>";
				$mail_body .= "Status: ".$lead_data['Contact']['status']." <br>";

				$mail_body .= "Dealer Name: ".$lead_data['Contact']['company']." <br>";
				$mail_body .= "Source: ".$lead_data['Contact']['source']." <br>";
				$mail_body .= "Dealer ID: ".$lead_data['Contact']['company_id']." <br>";
				$mail_body .= "ID: ".$lid." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$lead_data['Contact']['id']."' target='_blank' >(Go to Lead)</a> <br>";
				$mail_body .= "Name: ".$lead_data['Contact']['first_name']." ".$lead_data['Contact']['last_name']." <br>";
				$mail_body .= "Address: ".$lead_data['Contact']['address'].", ".$lead_data['Contact']['city'].", ".$lead_data['Contact']['state'].", ".$lead_data['Contact']['zip']." <br>";
				$mail_body .= "Mobile: ".$lead_data['Contact']['mobile']." <br>";
				$mail_body .= "Phone: ".$lead_data['Contact']['phone']." <br>";
				$mail_body .= "Work number: ".$lead_data['Contact']['work_number']." <br>";

				$mail_body .= "Email: ".$lead_data['Contact']['email']." <br>";
				$mail_body .= "Year: ".$lead_data['Contact']['year']." <br>";
				$mail_body .= "Make: ".$lead_data['Contact']['make']." <br>";
				$mail_body .= "Model: ".$lead_data['Contact']['model']." <br>";
				$mail_body .= "T/Year: ".$lead_data['Contact']['year_trade']." <br>";
				$mail_body .= "T/Make: ".$lead_data['Contact']['make_trade']." <br>";
				$mail_body .= "T/Model: ".$lead_data['Contact']['model_trade']." <br>";
				$mail_body .= "Stock Number: ".$lead_data['Contact']['stock']." <br>";
				$mail_body .= "Vin: ".$lead_data['Contact']['vin']." <br><br>";

				$reply_to = "sender@dp360crm.com";
				$from_email = "sender@dp360crm.com";
				$template = 'cron_email';
				/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"duplicate_lead_alert",
					"New Duplicate Lead #".$lead_data['Contact']['id'],
					"sender",
					serialize(array(
						'EmailContents'=>$mail_body,
					)),
					$reply_to,
					$template,
					$from_email,
					serialize($settings['recipients']),
					serialize(array())
				);

    		}

    	}
    }

	public function leads_input(){
		$this->layout='leads_add';
        $contactstatuses = $this->ContactStatus->find('list');
        $this->set(compact('contactstatuses'));
        $this->set('zone', $this->Auth->user('zone'));
        $dealer_id = $this->Auth->user('dealer_id');
		$this->set('dealer_id',$dealer_id);
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);

		$this->loadModel('DealerSetting');

		$unit_value_price = $this->requestAction("dealer_settings/get_settings/unit_value_price");
		$this->set('unit_value_price', $unit_value_price);

		$follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");

		$show_second_face = $this->requestAction("dealer_settings/get_settings/show-second-face");
		$required_second_face = $this->requestAction("dealer_settings/get_settings/required-second-face");
		$in_stock_settings = $this->requestAction("dealer_settings/get_settings/in-stock");

		$address_validation = $this->requestAction("dealer_settings/get_settings/address-validation");
		$this->set('address_validation', $address_validation);

		$gender_required = $this->DealerSetting->get_settings('gender_required', $dealer_id);

		$mgr_sign_off = $this->DealerSetting->get_settings('mgr_sign_off', $dealer_id);
		$this->set('mgr_sign_off', $mgr_sign_off);

		$email_required = $this->DealerSetting->get_settings('email_required', $dealer_id);
		$this->set('email_required', $email_required);
		//debug($email_required);

		$state_provinces = $this->DealerSetting->get_settings('state_provinces', $dealer_id );
		$this->set('state_provinces', $state_provinces);
		//debug($state_provinces);

		$dnc_bdc_only = $this->DealerSetting->get_settings('dnc_bdc_only', $dealer_id );
		$this->set('dnc_bdc_only', $dnc_bdc_only);

		$additional_contact = $this->DealerSetting->get_settings('additional_contact', $dealer_id );
		$this->set('additional_contact', $additional_contact);


		$validate_method_of_payment = $this->DealerSetting->get_settings('validate_method_of_payment', $dealer_id );
		$this->set('validate_method_of_payment', $validate_method_of_payment);


		$person_in_dealership = $this->DealerSetting->get_settings('person_in_dealership', $dealer_id );
		$this->set('person_in_dealership', $person_in_dealership);

		$lead_status_required_new_lead = $this->DealerSetting->get_settings('lead_status_required_new_lead', $dealer_id );
		$this->set('lead_status_required_new_lead', $lead_status_required_new_lead);

		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $dealer_id );
		$this->set('casl_feature', $casl_feature);


		$stock_num_required_sold = $this->DealerSetting->get_settings('stock_num_required_sold', $dealer_id );
		$this->set('stock_num_required_sold', $stock_num_required_sold);


		$this->LoadModel('ContactCaslStatuse');
		$contactCaslStatuse_list = $this->ContactCaslStatuse->find('list');
		$this->set('contactCaslStatuse_list', $contactCaslStatuse_list);


		//debug($casl_feature);


		$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$this->Auth->User('dealer_id'))));
		$this->set('emps', $emps);
		$this->set('show_second_face', $show_second_face);
		$this->set('required_second_face', $required_second_face);

		$this->loadModel("OemLocationSetting");
		$oemLocationSetting = $this->OemLocationSetting->find('first', array('conditions'=>array("OemLocationSetting.id"=>'1')));
		//debug($oemLocationSetting);

		$oem_dealer_ids = explode(",", $oemLocationSetting['OemLocationSetting']['dealer_ids']);
		$oem_dealer_ids_text = "";
		foreach($oem_dealer_ids as $oem_ids){
			$oem_dealer_ids_text .= "'".trim($oem_ids)."' ";
		}
		$this->set('oem_dealer_ids_text', $oem_dealer_ids_text);

		$oem_makes = explode(",", $oemLocationSetting['OemLocationSetting']['makes']);
		$oem_makes_text = "";
		foreach($oem_makes as $oem_ids){
			$oem_makes_text .= "'".trim($oem_ids)."' ";
		}
		$this->set('oem_makes_text', $oem_makes_text);

		//Your Locations
		$location_names = $this->DealerSetting->get_settings('location_names', $dealer_id);
		$this->set('location_names', $location_names);
		//debug($location_names);

		$your_locations = $this->DealerSetting->locations_list($dealer_id);
		if(empty($your_locations)){
			$your_locations = array( $this->Auth->user('dealer') => $this->Auth->user('dealer') );
		}
		$this->set('your_locations', $your_locations);


		$required_year_make_model = $this->DealerSetting->get_settings('required_year_make_model', $dealer_id);
		$this->set('required_year_make_model', $required_year_make_model);
		// debug($required_year_make_model);


		//Validation group for palmer group
		$validation_palmer = 0;
		if(in_array($dealer_id, array('2663','266900','266800','266700','266600','266500','266400'))){
			$validation_palmer = 1;
			$gender_required = 'Off';
		}
		$this->set('validation_palmer', $validation_palmer);
		$this->set('gender_required', $gender_required);


        if ($this->request->is('post')) {

        	$this->request->data['Contact']['note_added_by'] = $this->Auth->user("first_name")." ".$this->Auth->user("last_name"). " #".$this->Auth->user("id");

        	$this->request->data['Contact']['first_name'] = ucwords(strtolower( $this->request->data['Contact']['first_name'] ));
        	$this->request->data['Contact']['last_name'] = ucwords(strtolower( $this->request->data['Contact']['last_name'] ));

        	//Price range for non RV
        	if( $this->request->data['Contact']['category'] != 'RV' ){
				$this->request->data['Contact']['price_range'] = $this->request->data['Contact']['price_range_non_rv'];
				$this->request->data['Contact']['trade_price_range'] = $this->request->data['Contact']['trade_price_range_non_rv'];
			}

			if(isset($this->request->query['multiple_vehicle'])){
				$this->request->data['Contact']['chk_duplicate'] = 1;
			}

            //debug($this->request->data);
            $this->request->data['Contact']['user_id'] = $this->Auth->user('id');
            $this->request->data['Contact']['owner_id'] = $this->Auth->user('id');

            //notes for inbound and outbound call type
            if($this->request->data['Contact']['lead_call_types'] != '' &&   $this->request->data['Contact']['lead_call_types'] == 'inbound'  ) {
            	 $this->request->data['Contact']['notes'] = "Inbound/Step Update - ".$this->request->data['Contact']['notes'];
            }
            if($this->request->data['Contact']['lead_call_types'] != '' &&   $this->request->data['Contact']['lead_call_types'] == 'outbound'  ) {
            	 $this->request->data['Contact']['notes'] = "Outbound/Step Update - ".$this->request->data['Contact']['notes'];
            }


            $this->Contact->create();

			$this->request->data['Contact']['mobile'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['mobile']);
			$this->request->data['Contact']['phone'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['phone']);
			$this->request->data['Contact']['work_number'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['work_number']);


			//set created date time and modified
			if($this->request->data['Contact']['created_date'] != '' && $this->request->data['Contact']['created_time'] != ''){
				$unix_t = strtotime($this->request->data['Contact']['created_date']." ".$this->request->data['Contact']['created_time']);

				$this->request->data['Contact']['created']  = date('Y-m-d H:i:s', $unix_t );
				$this->request->data['Contact']['created_date_short']  = date('mdY', $unix_t );
				$this->request->data['Contact']['created_date_short_slash']  = date('m/d/Y', $unix_t );
				$this->request->data['Contact']['created_full_date']  =date('D - M d, Y g:i A', $unix_t );


				$this->request->data['Contact']['modified']  = date('Y-m-d H:i:s', $unix_t );
				$this->request->data['Contact']['modified_date_short']  = date('mdY', $unix_t );
				$this->request->data['Contact']['modified_date_short_slash']  = date('m/d/Y', $unix_t );
				$this->request->data['Contact']['modified_full_date']  =date('D - M d, Y g:i A', $unix_t );
			}

			$this->request->data['Contact']['step_modified']  = date('Y-m-d H:i:s');

			if( $this->Auth->user('group_id') == 8 && $this->request->data['Contact']['contact_status_id'] == 5 ){
				$this->request->data['Contact']['bdc_weblead']  = '1';
			}

			if(isset($this->request->data['Contact']['contact_casl_status_id'])){
				$this->request->data['Contact']['dnc_status'] = '';
			}

            if ($this->Contact->save($this->request->data)) {

            	$this->loadModel("AdditionalContact");
            	//debug( $this->request->data );
            	//Insert Additional Contacts
            	if(isset($this->request->data['AdditionalContact']) && !empty($this->request->data['AdditionalContact']) ){
            		foreach($this->request->data['AdditionalContact'] as $add_cnt){
            			if($add_cnt['first_name'] != ''){
            				$add_cnt['contact_id'] = $this->Contact->id;
            				$this->AdditionalContact->create();
            				$this->AdditionalContact->save(array("AdditionalContact"=>$add_cnt));
            			}
            		}

            	}



            	/**    Insert add on vehicle Start
				'category_addon1' => 'In Stock',
				'type_addon1' => 'Motorcycle / Scooter',
				'make_addon1' => 'Honda',
				'year_addon1' => '2010',
				'model_id_addon1' => '28295',
				'model_addon1' => 'Stateline ABS (VT1300CRA)',
				'class_addon1' => 'Cruiser',
				'condition_addon1' => 'Used',
				'vin_addon1' => '',
            	**/
            	$this->loadModel('AddonVehicle');
            	if($this->request->data['Contact']['category_addon1'] != '' && $this->request->data['Contact']['type_addon1']
            		&& $this->request->data['Contact']['make_addon1']
            	){
            		$this->AddonVehicle->create();
            		$this->AddonVehicle->save(array('AddonVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon1'],
						'category'=>$this->request->data['Contact']['category_addon1'],
						'type'=>$this->request->data['Contact']['type_addon1'],
						'year'=>$this->request->data['Contact']['year_addon1'],
						'make'=>$this->request->data['Contact']['make_addon1'],
						'model_id'=>$this->request->data['Contact']['model_id_addon1'],
						'model'=>$this->request->data['Contact']['model_addon1'],
						'class'=>$this->request->data['Contact']['class_addon1'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon1'],
						'vin'=>$this->request->data['Contact']['vin_addon1'],
						'condition'=>$this->request->data['Contact']['condition_addon1'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon1'],
						'engine'=>$this->request->data['Contact']['engine_addon1'],
						'odometer'=>$this->request->data['Contact']['odometer_addon1'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon1'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon1']

            		)));
            	}
            	if($this->request->data['Contact']['category_addon2'] != '' && $this->request->data['Contact']['type_addon2']
            		&& $this->request->data['Contact']['make_addon2']
            	){
            		$this->AddonVehicle->create();
            		$this->AddonVehicle->save(array('AddonVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon2'],
						'category'=>$this->request->data['Contact']['category_addon2'],
						'type'=>$this->request->data['Contact']['type_addon2'],
						'year'=>$this->request->data['Contact']['year_addon2'],
						'make'=>$this->request->data['Contact']['make_addon2'],
						'model_id'=>$this->request->data['Contact']['model_id_addon2'],
						'model'=>$this->request->data['Contact']['model_addon2'],
						'class'=>$this->request->data['Contact']['class_addon2'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon2'],
						'vin'=>$this->request->data['Contact']['vin_addon2'],
						'condition'=>$this->request->data['Contact']['condition_addon2'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon2'],
						'engine'=>$this->request->data['Contact']['engine_addon2'],
						'odometer'=>$this->request->data['Contact']['odometer_addon2'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon2'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon2']

            		)));
            	}
            	/**    Insert add on vehicle End   	**/


            	/**    Insert add on vehicle Trade Start
				'category_addon1' => 'In Stock',
				'type_addon1' => 'Motorcycle / Scooter',
				'make_addon1' => 'Honda',
				'year_addon1' => '2010',
				'model_id_addon1' => '28295',
				'model_addon1' => 'Stateline ABS (VT1300CRA)',
				'class_addon1' => 'Cruiser',
				'condition_addon1' => 'Used',
				'vin_addon1' => '',
            	**/
            	$this->loadModel('AddonTradeVehicle');
            	if($this->request->data['Contact']['category_addon1_trade'] != '' && $this->request->data['Contact']['type_addon1_trade']
            		&& $this->request->data['Contact']['make_addon1_trade']
            	){
            		$this->AddonTradeVehicle->create();
            		$this->AddonTradeVehicle->save(array('AddonTradeVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon1_trade'],
						'category'=>$this->request->data['Contact']['category_addon1_trade'],
						'type'=>$this->request->data['Contact']['type_addon1_trade'],
						'year'=>$this->request->data['Contact']['year_addon1_trade'],
						'make'=>$this->request->data['Contact']['make_addon1_trade'],
						'model_id'=>$this->request->data['Contact']['model_id_addon1_trade'],
						'model'=>$this->request->data['Contact']['model_addon1_trade'],
						'class'=>$this->request->data['Contact']['class_addon1_trade'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon1_trade'],
						'vin'=>$this->request->data['Contact']['vin_addon1_trade'],
						'condition'=>$this->request->data['Contact']['condition_addon1_trade'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon1_trade'],
						'engine'=>$this->request->data['Contact']['engine_addon1_trade'],
						'odometer'=>$this->request->data['Contact']['odometer_addon1_trade'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon1_trade'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon1_trade']

            		)));
            	}
            	if($this->request->data['Contact']['category_addon2_trade'] != '' && $this->request->data['Contact']['type_addon2_trade']
            		&& $this->request->data['Contact']['make_addon2_trade']
            	){
            		$this->AddonTradeVehicle->create();
            		$this->AddonTradeVehicle->save(array('AddonTradeVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon2_trade'],
						'category'=>$this->request->data['Contact']['category_addon2_trade'],
						'type'=>$this->request->data['Contact']['type_addon2_trade'],
						'year'=>$this->request->data['Contact']['year_addon2_trade'],
						'make'=>$this->request->data['Contact']['make_addon2_trade'],
						'model_id'=>$this->request->data['Contact']['model_id_addon2_trade'],
						'model'=>$this->request->data['Contact']['model_addon2_trade'],
						'class'=>$this->request->data['Contact']['class_addon2_trade'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon2_trade'],
						'vin'=>$this->request->data['Contact']['vin_addon2_trade'],
						'condition'=>$this->request->data['Contact']['condition_addon2_trade'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon2_trade'],
						'engine'=>$this->request->data['Contact']['engine_addon2_trade'],
						'odometer'=>$this->request->data['Contact']['odometer_addon2_trade'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon2_trade'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon2_trade']

            		)));
            	}
            	/**    Insert add on vehicle Trade End   	**/







                $uid = $this->Contact->getLastInsertId();

				//save event
				$this->request->data['Event']['user_id'] = $this->request->data['Contact']['user_id'];
				$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
				$this->request->data['Event']['contact_id'] = $uid ;

				$this->request->data['Event']['sperson'] = $this->request->data['Contact']['sperson'];
				$this->request->data['Event']['first_name'] = $this->request->data['Contact']['first_name'];
				$this->request->data['Event']['last_name'] = $this->request->data['Contact']['last_name'];
				$this->request->data['Event']['email'] = $this->request->data['Contact']['email'];
				$this->request->data['Event']['mobile'] = $this->request->data['Contact']['mobile'];
				$this->request->data['Event']['phone'] = $this->request->data['Contact']['phone'];


				$this->request->data['Event']['start'] = '';
				$this->request->data['Event']['end'] = '';
				if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
					$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
				}
				/*
				$this->request->data['Event']['end'] = '';
				if($this->request->data['Event']['end_date'] != '' && $this->request->data['Event']['end_time'] != ''){
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['end_date']." ".$this->request->data['Event']['end_time']));
				}
				*/
				$this->request->data['Event']['logged_user_id'] = $this->Auth->user('id');
				$this->Event->create();
				$this->Event->save($this->request->data);



				$new_data = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$this->Contact->id)));

				//Duplicate Lead Alert
            	$this->duplicate_lead_alert($new_data);

            	//Save lead sold
            	if($this->request->data['Contact']['sales_step'] == '10'){
            		$lead_sold_data['LeadSold'] = $new_data['Contact'];
            		$lead_sold_data['LeadSold']['contact_id'] = $lead_sold_data['LeadSold']['id'];
            		unset($lead_sold_data['LeadSold']['id']);
            		$this->loadModel('LeadSold');
            		$this->LeadSold->create();
            		$this->LeadSold->save($lead_sold_data);

            		//Update in Stock Inventory
            		if($this->request->data['Contact']['category'] == 'In Stock' && $this->request->data['Contact']['model_id'] != '' ){
	            		$this->loadModel('XmlInventory');
            			$this->XmlInventory->updateAll(
							array(
								'XmlInventory.sold' => "'1'",
							),array('XmlInventory.id' => $this->request->data['Contact']['model_id'] )
						);
            		}

            		$this->send_sold_alert($lead_sold_data['LeadSold']['contact_id']);

            		//Autoresponder send immediate sold notification start
            		$this->requestAction("autoresponder_emails/immediate_sold/".$lead_sold_data['LeadSold']['contact_id']);
            		//Autoresponder send immediate sold notification ends


            	}





				////////////////////////////////History entry for events/////////////
				$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
				$history_data = array();
				$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
				$history_data['event_id'] = 			$old_data['Event']['id'];
				$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
				$history_data['make'] = 				$old_data['EventType']['name'];
				$history_data['model'] = 				date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
				$history_data['status'] = 				$old_data['Event']['status'];
				$history_data['comment'] = 				$old_data['Event']['details'];
				$history_data['notes'] = 				$old_data['Event']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
				$history_data['start_date'] = 			$old_data['Event']['start'];
				$history_data['end_date'] = 			$old_data['Event']['end'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 			"Event";
				$history_data['sperson'] 	=			$old_data['Event']['sperson'];

				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);

				//Save History for BDC REP web lead
				$history_type = 'Lead';
				if( $this->Auth->user('group_id') == 8 && $this->request->data['Contact']['contact_status_id'] == 5 ){
					$history_type = 'BDC REP Web Lead';
				}

				$ret = $this->Contact->find('first',array('conditions'=>array('Contact.id'=>$uid)));

				$history_data = array();
				$history_data['user_id'] = $ret['Contact']['user_id']; // for change log
				$history_data['contact_id'] = $ret['Contact']['id'];
				$history_data['sperson'] = $ret['Contact']['sperson'];
				$history_data['year'] = ($ret['Contact']['year'] != '0')? $ret['Contact']['year'] : "Any Year" ;

				$history_data['make'] = $ret['Contact']['make'];
				$history_data['model'] = $ret['Contact']['model'];
				$history_data['sales_step'] = $ret['Contact']['sales_step'];
				$history_data['status'] = $ret['Contact']['status'];
				$history_data['modified'] = date('D - M d, Y g:i A', strtotime($ret['Contact']['created']));
				$history_data['created'] = $ret['Contact']['created'];
				$history_data['comment'] = $ret['Contact']['notes'];
				$history_data['h_type'] = $history_type;
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);


				//History Entry for MGR item
				if($this->request->data['Contact']['mgr_signoff'] != ''){
					$mgr_user_name = $this->User->find('first', array('conditions' => array('User.id' => $this->request->data['Contact']['mgr_signoff_user_id'] )));
					$signoff_history_data = $history_data;
					$signoff_history_data['h_type'] = 'MGR Check';
					$signoff_history_data['event_id'] = $this->request->data['Contact']['mgr_signoff_user_id'];
					$signoff_history_data['comment'] = "Signed off by: ".$mgr_user_name['User']['first_name']." ".$mgr_user_name['User']['last_name'].", <br> " . "Date: ".date('D - M d, Y g:i A', strtotime($ret['Contact']['created']));
					$this->History->create();
					$this->History->save(array(
						'History' => $signoff_history_data
					));
				}



				//<Set Event Completed for dead lead>
				$this->loadModel('LeadStatus');
				$dead_lead_head = $this->LeadStatus->find('first',array(
					'conditions'=>array(
						'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
						'LeadStatus.name'=> $this->request->data['Contact']['status'],
					)
				));
				//debug($dead_lead_head['LeadStatus']['header']);
				//debug($dead_lead_head['LeadStatus']['lead_status']);
				//debug($this->Contact->id);

				if($dead_lead_head['LeadStatus']['header'] != 'Sold Deal (Closed)' && $this->request->data['Contact']['lead_status'] == 'Closed' ){
					$this->requestAction(array('controller'=>'contacts_manage','action'=>'set_event_completed', $this->Contact->id  ));
				}
				//<Set Event Completed for dead lead ends />
				/* STARTS: Trigger Autoresponder Welcome Emails*/
				$this->requestAction("autoresponder_emails/SendWelcomeEmail/".$this->Contact->id);
				/* ENDS: Trigger Autoresponder Welcome Emails*/


				//Insert casl opt-out
				$casl_send_email = true;
				if(isset($ret['Contact']['contact_casl_status_id']) && in_array($ret['Contact']['contact_casl_status_id'], array('3','4') ) ){
					$casl_send_email = false;
					$this->loadModel('CrmUnsubscribe');
					$this->CrmUnsubscribe->opt_out($ret, $ret['Contact']['company_id'], $this->Auth->user('first_name'). " " . $this->Auth->user('last_name'));
				}

				//Send customer email
				// Original code commented by dts
				/*$message = "";
				if($this->request->data['UserEmail']['send_email'] == '1' && $casl_send_email == true){
					// 'UserEmail' => array(
					// 'send_email' => '1',
					// 'subject' => 'sdfdsf',
					// 'template_id' => '',
					// 'message' => '<p>Template&nbsp;{first_name}</p>
					$message = $this->requestAction('user_emails/send_contact_email', array(
						'contact_id' => $this->Contact->id,
						'subject'=>$this->request->data['UserEmail']['subject'],
						'mailbody'=>$this->request->data['UserEmail']['message']
					));

				}*/

				if($casl_send_email == true){

					 // Create ics file if calendar invite is checked
					$file_path 	=	'';
					if($this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						 $ics_filename 		= 	'event_'.$this->Contact->id.".ics";

						 $ics_start   		=	$this->request->data['Event']['start'];
						 $ics_end   		=	$this->request->data['Event']['end'];
						 $ics_title			=	$this->request->data['Event']['title'];
						 $ics_description	=	$this->request->data['Event']['details'];

						 $file_path 		= 	$this->create_ics($ics_filename,$ics_start,$ics_end,$ics_title,$ics_description);
					}

					 // Create ics file if calendar invite is checked end

					 // Attach the ics file attached to the same email sent
					if($this->request->data['UserEmail']['send_email'] == '1' && $this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						$message = $this->requestAction('user_emails/send_ics_email', array(
							'contact_id' => $this->Contact->id,
							'subject'=>$this->request->data['UserEmail']['subject'],
							'mailbody'=>$this->request->data['UserEmail']['message'],
							'ics_attachment_files'=>$file_path,
						));
					}
					elseif($this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						$this->LoadModel('CalendarInviteContent');
						$calendar_invite_contents = $this->CalendarInviteContent->find("first", array("conditions"=>array("CalendarInviteContent.dealer_id" => $dealer_id)));
						$mail_subject 	=	(isset($calendar_invite_contents['CalendarInviteContent']['subject']))?$calendar_invite_contents['CalendarInviteContent']['subject']:'Calendar event invitation';
						$mail_content 	=	(isset($calendar_invite_contents['CalendarInviteContent']['content']))?$calendar_invite_contents['CalendarInviteContent']['content']:'Please find attached calendar event invitation file';
						$message = $this->requestAction('user_emails/send_ics_email', array(
						    'contact_id' => $this->Contact->id,
							'subject'=>$mail_subject,
							'mailbody'=>$mail_content,
							'ics_attachment_files'=>$file_path,
						));
					}
					elseif ($this->request->data['UserEmail']['send_email'] == '1') {
						// 'UserEmail' => array(
						// 'send_email' => '1',
						// 'subject' => 'sdfdsf',
						// 'template_id' => '',
						// 'message' => '<p>Template&nbsp;{first_name}</p>
						$message = $this->requestAction('user_emails/send_contact_email', array(
							'contact_id' => $this->Contact->id,
							'subject'=>$this->request->data['UserEmail']['subject'],
							'mailbody'=>$this->request->data['UserEmail']['message']
						));
					}

				}

				//insert alert report Start
				if( isset($this->request->query['alert_new_lead'])  && $this->request->query['alert_new_lead'] == 'yes' ){
					$this->loadModel('AlertNewLead');
					$this->AlertNewLead->create();
					$this->AlertNewLead->save(array('AlertNewLead'=>array(
						'contact_id' => $this->Contact->id,
						'user_id' => $this->Auth->user('id'),
						//'new_contact_id' => $this->Contact->id,
						'created' =>  date('Y-m-d H:i:s'),
						'dealer_id' => $this->Auth->user('dealer_id')
					)));
				}
				//insert alert report End


				if($message != ''){
					$this->Session->setFlash($message, 'alert');
				}


				// CLEAR CACHE ON EDIT LEAD
				$this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));


                $this->Session->setFlash(__('New contact added'), 'alert'); //print_r($this->request->data); exit;

				//debug($this->request->data);
				// Set Cookie to Show  Move lead popup
				if(!empty($this->request->data['Contact']['transfer_other_salesperson']))
					{
						$contact_id = $this->Contact->id;
						$this->Cookie->write('transfer_other_salesperson_'.$contact_id,'yes',false,600);

					}

				if($this->request->data['Contact']['status'] == 'Sold/Rolled-Multi Vehicle'){
					$this->redirect(array('action' => 'leads_input','?'=>array('multiple_vehicle'=>$this->Contact->id)));
				}

                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id = ' . $uid . '&fname = ' . $this->request->data['Contact']['first_name'] . '&lname = ' . $this->request->data['Contact']['last_name'] . '&email = ' . $this->request->data['Contact']['email'] . '&phone = ' . $this->request->data['Contact']['phone'] . '&mobile = ' . $this->request->data['Contact']['mobile']);
                } else {
					$this->redirect(array('action' => 'leads_main','view',$this->Contact->id));
                }


            } else {
                $this->Session->setFlash(__('Unable to add log'), 'alert', array('class' => 'alert-error'));
            }

        }else{

			//lead come from multiple sold vehicle selection
			if(isset($this->request->query['multiple_vehicle'])){
				$ref_contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$this->request->query['multiple_vehicle'])));
				//debug($ref_contact);
				$this->request->data['Contact']['contact_status_id'] = $ref_contact['Contact']['contact_status_id'];
				$this->request->data['Contact']['sales_step'] = $ref_contact['Contact']['sales_step'];
				$this->request->data['Contact']['status'] = "Sold/Rolled";
				$this->request->data['Contact']['lead_status'] = $ref_contact['Contact']['lead_status'];
				$this->request->data['Contact']['first_name'] = $ref_contact['Contact']['first_name'];
				$this->request->data['Contact']['last_name'] = $ref_contact['Contact']['last_name'];
				$this->request->data['Contact']['address'] = $ref_contact['Contact']['address'];

				$this->request->data['Contact']['city'] = $ref_contact['Contact']['city'];
				$this->request->data['Contact']['state'] = $ref_contact['Contact']['state'];
				$this->request->data['Contact']['zip'] = $ref_contact['Contact']['zip'];
				$this->request->data['Contact']['gender'] = $ref_contact['Contact']['gender'];
				$this->request->data['Contact']['phone'] = $ref_contact['Contact']['phone'];
				$this->request->data['Contact']['mobile'] = $ref_contact['Contact']['mobile'];

				$this->request->data['Contact']['email'] = $ref_contact['Contact']['email'];
				$this->request->data['Contact']['best_time'] = $ref_contact['Contact']['best_time'];
				$this->request->data['Contact']['buying_time'] = $ref_contact['Contact']['buying_time'];
				$this->request->data['Contact']['source'] = $ref_contact['Contact']['source'];


			}


			if(isset($this->request->query['new_lead_contact'])){

				$ref_contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$this->request->query['new_lead_contact'])));
				//debug($ref_contact);
				$this->request->data['Contact']['first_name'] = $ref_contact['Contact']['first_name'];
				$this->request->data['Contact']['last_name'] = $ref_contact['Contact']['last_name'];
				$this->request->data['Contact']['address'] = $ref_contact['Contact']['address'];

				$this->request->data['Contact']['city'] = $ref_contact['Contact']['city'];
				$this->request->data['Contact']['state'] = $ref_contact['Contact']['state'];
				$this->request->data['Contact']['zip'] = $ref_contact['Contact']['zip'];
				$this->request->data['Contact']['gender'] = $ref_contact['Contact']['gender'];
				$this->request->data['Contact']['phone'] = $ref_contact['Contact']['phone'];
				$this->request->data['Contact']['mobile'] = $ref_contact['Contact']['mobile'];
				$this->request->data['Contact']['work_number'] = $ref_contact['Contact']['work_number'];
				$this->request->data['Contact']['email'] = $ref_contact['Contact']['email'];
				$this->request->data['Contact']['company_work'] = $ref_contact['Contact']['company_work'];

				$this->request->data['Contact']['spouse_first_name'] = $ref_contact['Contact']['spouse_first_name'];
				$this->request->data['Contact']['spouse_last_name'] = $ref_contact['Contact']['spouse_last_name'];

				$this->request->data['Contact']['preferred_language'] = $ref_contact['Contact']['preferred_language'];
				$this->request->data['Contact']['best_time'] = $ref_contact['Contact']['best_time'];






			}

			if(isset($this->request->query['service_ref'])){
				$this->loadModel('ServiceLead');
				$service_lead_fields = array('ServiceLead.id','ServiceLead.company_id','ServiceLead.first_name','ServiceLead.last_name','ServiceLead.mobile','ServiceLead.phone','ServiceLead.work_number','ServiceLead.year','ServiceLead.make','ServiceLead.model','ServiceLead.stock_num','ServiceLead.email');
				$service_lead = $this->ServiceLead-> find('first',array('recursive' => -1,'fields' => $service_lead_fields,'conditions' => array('ServiceLead.id' => $this->request->query['service_ref'])));
				if(!empty($service_lead))
				{
					unset($service_lead['ServiceLead']['id']);
					$this->request->data['Contact'] = $service_lead['ServiceLead'];
				}
			}

			if(isset($this->request->query['lightspeed_ref'])){
				$this->loadModel('AdpCustomer');
				$adp_lead_fields = array('AdpCustomer.id','AdpCustomer.dealer_id','AdpCustomer.first_name','AdpCustomer.last_name','AdpCustomer.mobile','AdpCustomer.home_phone','AdpCustomer.work_phone','AdpCustomer.address','AdpCustomer.city','AdpCustomer.state','AdpCustomer.zip','AdpCustomer.email','AdpCustomer.county','AdpCustomer.birth_date');
				$lightspeed_lead = $this->AdpCustomer-> find('first',array('recursive' => -1,'fields' => $adp_lead_fields,'conditions' => array('AdpCustomer.id' => $this->request->query['lightspeed_ref'])));
				if(!empty($lightspeed_lead))
				{
					unset($lightspeed_lead['AdpCustomer']['id']);
					$this->request->data['Contact'] = $lightspeed_lead['AdpCustomer'];
					$this->request->data['Contact']['phone'] = $lightspeed_lead['AdpCustomer']['home_phone'];
					$this->request->data['Contact']['work_number'] = $lightspeed_lead['AdpCustomer']['work_phone'];
				}
			}

			if(isset($this->request->query['ref_other'])){
				$ref_contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$this->request->query['ref_other'])));
				//debug($ref_contact);
				$this->request->data['Contact']['first_name'] = $ref_contact['Contact']['first_name'];
				$this->request->data['Contact']['last_name'] = $ref_contact['Contact']['last_name'];
				$this->request->data['Contact']['address'] = $ref_contact['Contact']['address'];

				$this->request->data['Contact']['city'] = $ref_contact['Contact']['city'];
				$this->request->data['Contact']['state'] = $ref_contact['Contact']['state'];
				$this->request->data['Contact']['zip'] = $ref_contact['Contact']['zip'];
				$this->request->data['Contact']['gender'] = $ref_contact['Contact']['gender'];
				$this->request->data['Contact']['phone'] = $ref_contact['Contact']['phone'];
				$this->request->data['Contact']['mobile'] = $ref_contact['Contact']['mobile'];
				$this->request->data['Contact']['work_number'] = $ref_contact['Contact']['work_number'];
				$this->request->data['Contact']['email'] = $ref_contact['Contact']['email'];
				$this->request->data['Contact']['company_work'] = $ref_contact['Contact']['company_work'];
				$this->request->data['Contact']['spouse_first_name'] = $ref_contact['Contact']['spouse_first_name'];
				$this->request->data['Contact']['spouse_last_name'] = $ref_contact['Contact']['spouse_last_name'];
				$this->request->data['Contact']['preferred_language'] = $ref_contact['Contact']['preferred_language'];
				$this->request->data['Contact']['best_time'] = $ref_contact['Contact']['best_time'];
			}

			if($this->request->data['Contact']['state'] == ''){
				$this->request->data['Contact']['state'] = $this->Auth->User("d_state");
			}






			 if(isset($this->params->query['mainsearch'])){
			 	$this->request->data['Contact']['mobile'] = $this->format_phone($this->params->query['search_phone']);
				$this->request->data['Contact']['first_name'] = $this->params->query['search_first_name'];
				$this->request->data['Contact']['last_name'] = $this->params->query['search_last_name'];
				$this->request->data['Contact']['email'] = $this->params->query['search_email'];

			 }
			 $this->request->data['Contact']['unit_value'] = "0.00";

			 //get Dealer settings for followup 24

			$follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");
			$auto_event_time = $this->DealerSetting->get_settings('auto_event_time', $dealer_id);

			$this->request->data['Event']['start_time'] = $auto_event_time;
			$this->request->data['Event']['end_time'] =  date("h:i A",strtotime("+15 minute",  strtotime($auto_event_time)));

		 	if($follow_up_24 == 'On'){


				$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
				$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));



				$this->request->data['Event']['status'] = "Scheduled";
				$this->request->data['Event']['event_type_id'] = "13";
				$this->request->data['Event']['title'] = " Call Out to Customer";
				$this->request->data['Event']['details'] = "Call Out to Customer- ";
			}


			//Default category for powershoot
			$this->loadModel('Category');
			$d_typenew = $this->Auth->User('d_type');
			$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
			$body_type["Any Category"] = "Any Category";
			$this->set('body_type', $body_type);

			$this->request->data['Contact']['dnc_status'] = 'ok_call_email';



			if($in_stock_settings == 'On'){
				$this->request->data['Contact']['vehicle_selection_type'] = 'In Stock';
			}else{
				$this->request->data['Contact']['vehicle_selection_type'] = 'Showroom';
			}
			if($this->Auth->User('dealer_id') == '20020'){
				$this->request->data['Contact']['vehicle_selection_type'] = 'Branch Inventory';
			}
			$this->request->data['Contact']['vehicle_selection_type_trade'] = 'Showroom';



			if(count($your_locations) == 1){
				$this->request->data['Contact']['your_location'] = $your_locations[ key($your_locations) ];
			}

			//Validation group for palmer group
			if($validation_palmer == 1){
				$this->request->data['Contact']['mobile'] = '000-000-0000';
			}

		}
		$this->set('follow_up_24', $follow_up_24);

		$this->set('eventTypes', $this->EventType->find('list', array( 'conditions'=>['OR' => ['EventType.dealer_id IS NULL', 'EventType.dealer_id'=>$this->Auth->user('dealer_id')]] ,   'order'=>"EventType.id ASC")));

		$vehicle_selection_type_options = array('Showroom' => '&nbsp Catalog');
		if($in_stock_settings == 'On'){
			$vehicle_selection_type_options['In Stock'] = '&nbsp In Stock';
		}
		if($this->Auth->User('dealer_id') == '20020'){
			$vehicle_selection_type_options = array('Branch Inventory' => '&nbsp Branch Inventory',  'Showroom' => '&nbsp Catalog');
		}
		$this->set('vehicle_selection_type_options', $vehicle_selection_type_options);


		//Status options
		$this->loadModel("LeadStatus");

		//Get Top Statuses
		$top_leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.top_status ASC','conditions'=>array(
		'LeadStatus.active'=> 1,
		'LeadStatus.top_status <>'=> 0 ,'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$top_statuses = array();
		foreach($top_leadStatuses as $top_status){
			$top_statuses[ $top_status['LeadStatus']['header'] ][] = $top_status['LeadStatus']['name'];
		}
		//debug($top_statuses);


		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
		'LeadStatus.active'=> 1,
		'LeadStatus.top_status'=> 0 ,'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']][] = $leadStatus['LeadStatus']['name'];
		}
		//$this->set('lead_status_options', $lead_status_options);
		/* sort statuses */
		$lead_status_options_sorted = array();
		foreach($lead_status_options as $key=>$value ){
			$items = $value;
			asort($items);
			$lead_status_options_sorted[$key] = $items;

			if( !empty($top_statuses[$key])){
				foreach($top_statuses[$key] as $ts ){
					array_unshift($lead_status_options_sorted[$key], $ts );
				}
			}
		}
		//debug($lead_status_options_sorted);
		$this->set('lead_status_options', $lead_status_options_sorted);






		//source options
		$this->loadModel('LeadSourcesHide');
		$lead_sources_hide = $this->LeadSourcesHide->find('list',array('conditions'=>array(
			'LeadSourcesHide.dealer_id'=> $this->Auth->user('dealer_id'),
		)));

		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('lead_sources_options', $lead_sources_options);

		//SalesStep options
		$sold_step = "";
		$this->loadModel('SalesStep');
		$step_cond = array();
		if($this->Auth->user('step_procces') == 'lemco_steps'){
			$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		}else{
			$step_cond = array('SalesStep.step_process'=>'hd_steps');
		}
		$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		foreach($sales_steps as $sales_step){
			//Get sold step to auto select status
			if($sales_step['SalesStep']['sold_step'] == 'sold'){
				$sold_step = $sales_step['SalesStep']['id'];
			}
		}

		//	debug(  $this->get_dealer_steps()  );

		$this->set('sales_step_options',  $this->get_dealer_steps() );
		$this->set('sold_step', $sold_step);

		//Inventory Center
		// $this->loadModel("Category");
		// //$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		// $d_types = $this->requestAction('dealer_settings/d_type_options/'.$this->Auth->user('dealer_id') );
		// $d_type_options = array();
		// if($in_stock_settings == 'On'){
		// 	$d_type_options = array('In Stock'=>'In Stock');
		// }

		// if($this->Auth->User('dealer_id') == '20020'){
		// 	$d_type_options = array('Branch Inventory'=>'Branch Inventory');
		// }

		// foreach($d_types as $d_type){
		// 	$d_type_options[$d_type] = $d_type;
		// }
		// $this->set('d_type_options', $d_type_options);


		//D_TYPE SELECTION
		//debug($this->request->data['Contact']['vehicle_selection_type']);
		$d_type_options = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'] )));
		$this->set('d_type_options', $d_type_options);


		$d_type_options_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'] )));
		$this->set('d_type_options_trade', $d_type_options_trade);
		//debug( $this->request->data['Contact']['vehicle_selection_type'] );



		//< vehicle inputs start >
		$this->set('PriceRangeOptions', $this->ContactStatus->PriceRangeNonRvOptions() );
		$this->set('PriceRangeNonRvOptions', $this->ContactStatus->PriceRangeNonRvOptions());
		$this->set('FloorPlansOptions', $this->ContactStatus->FloorPlansOptions);
		$this->set('LengthOptions', $this->ContactStatus->LengthOptions);
		$this->set('WeightOptions', $this->ContactStatus->WeightOptions);
		$this->set('SleepsOptions', $this->ContactStatus->SleepsOptions);
		$this->set('FuelTypeOptions', $this->ContactStatus->FuelTypeOptions);
		//</ vehicle inputs end >
		$this->set('DncStatusOptions', $this->ContactStatus->DncStatusOptions);



		//Template List
		$this->loadModel('UserTemplate');
		$this->UserTemplate->virtualFields['model_id']='CONCAT("UserTemplate_",UserTemplate.id)';
		$userTemplates = $this->UserTemplate->find('list', array('conditions'=>array(
			'UserTemplate.dealer_id'=>$dealer_id,
			'UserTemplate.template_type'=>'customer'),
		'fields'=>array('UserTemplate.model_id','UserTemplate.template_title')));
		$this->set('userTemplates',$userTemplates);


		$this->loadModel('UserEmail');
		$smtp_settings = $this->UserEmail->get_setting("smtp", $this->Auth->User('id') );
   		$this->set("smtp_settings", $smtp_settings);

		// $smtp_settings = $this->requestAction("/user_emails/get_setting/smtp");
  		//  		$this->set("smtp_settings", $smtp_settings);



   		$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
		$this->set('email_settings', $email_settings);


            //for NPA API setting
                $dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('NpaapiSetting');
                $npa_settings = $this->NpaapiSetting->find('first', array('conditions' => array('NpaapiSetting.dealer_id'=> $dealer_id)));
		$this->set(compact('npa_settings'));

		//get Signaure
		$this->loadModel('Setting');
		$setting = $this->Setting->find('first', array('conditions'=>array('Setting.user_id' => $this->Auth->user('id')    )));
		//debug($setting);
		$this->set('setting',$setting);


    }

	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

	public function send_sold_alert($contact_id = ''){

		$contact =  $this->Contact->find('first',array('recursive'=>-1,'conditions' => array(
			'Contact.id'=>$contact_id
		)));

		$this->loadModel('SoldAlertEmail');
		$SoldAlertEmails = $this->SoldAlertEmail->find('all',array('order'=>'SoldAlertEmail.email',
			'conditions'=>array('SoldAlertEmail.dealer_id'=>$this->Auth->user('dealer_id'))));
		//debug($SoldAlertEmails);

		$reply_to = "sender@dp360crm.com";
		$from_email = "sender@dp360crm.com";
		$template = 'cron_email';


		$mail_body = "New  Lead Sold #".$contact['Contact']['id']." - ".date('m/d/Y g:i A' , strtotime($contact['Contact']['modified']) ). "<br><br>"  ;

		$mail_body .= "Originator: ".$contact['Contact']['owner']." <br>";
		$mail_body .= "Sales Person: ".$contact['Contact']['sperson']." <br>";
		$mail_body .= "Status: ".$contact['Contact']['status']." <br>";

		$mail_body .= "Dealer Name: ".$contact['Contact']['company']." <br>";
		$mail_body .= "Source: ".$contact['Contact']['source']." <br>";
		$mail_body .= "Dealer ID: ".$contact['Contact']['company_id']." <br>";
		$mail_body .= "ID: ".$lid." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$contact['Contact']['id']."' target='_blank' >(Go to Lead)</a> <br>";
		$mail_body .= "Name: ".$contact['Contact']['first_name']." ".$contact['Contact']['last_name']." <br>";
		$mail_body .= "Address: ".$contact['Contact']['address'].", ".$contact['Contact']['city'].", ".$contact['Contact']['state'].", ".$contact['Contact']['zip']." <br>";
		$mail_body .= "Mobile: ".$contact['Contact']['mobile']." <br>";
		$mail_body .= "Phone: ".$contact['Contact']['phone']." <br>";
		$mail_body .= "Work number: ".$contact['Contact']['work_number']." <br>";

		$mail_body .= "Email: ".$contact['Contact']['email']." <br>";
    $mail_body .= "Condition: ".$contact['Contact']['condition']." <br>";
		$mail_body .= "Year: ".$contact['Contact']['year']." <br>";
		$mail_body .= "Make: ".$contact['Contact']['make']." <br>";
		$mail_body .= "Model: ".$contact['Contact']['model']." <br>";
		$mail_body .= "T/Year: ".$contact['Contact']['year_trade']." <br>";
		$mail_body .= "T/Make: ".$contact['Contact']['make_trade']." <br>";
		$mail_body .= "T/Model: ".$contact['Contact']['model_trade']." <br>";
		$mail_body .= "Stock Number: ".$contact['Contact']['stock_num']." <br>";
		$mail_body .= "Vin: ".$contact['Contact']['vin']." <br><br>";
		$mail_body .= "Web Selection: ".$contact['Contact']['web_selection']." <br>";
		$mail_body .= "Trade Selection: ".$contact['Contact']['trade_selection']." <br>";

    $mail_body .= "Last Comment: ".$contact['Contact']['notes']." <br>";

		foreach($SoldAlertEmails as $SoldAlertEmail){
			$to_email = $SoldAlertEmail['SoldAlertEmail']['email'];
			/**
			* Add email queue
			* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
			* template = "", $from = "", $to = "", $bcc = "")
			**/
			$this->loadModel("QueueEmail");
			$this->QueueEmail->create_email_queue(
				"sold_notification",
				"New Lead Sold #".$contact_id,
				"sender",
				serialize(array(
					'EmailContents'=>$mail_body,
				)),
				$reply_to,
				$template,
				$from_email,
				serialize($to_email),
				serialize(array())
			);
			//Send Email Alert end
		}


	}

	public function leads_input_edit($id = null) {

		$fields_map_array = array(
			'lead_status'=>'Open/Close',
			'contact_status_id'=>'Lead Type',
			'sales_step'=>'Step',
			'address'=>'Address',
			'city'=>'City',
			'state'=>'State',
			'zip'=>'Zip',
			'unit_value'=>'Unit Value',
			'engine'=>'Engine',
			'vin'=>'Vin',
			'odometer'=>'Miles',
			'status'=>'Status',
			'gender'=>'Gender',
			'best_time'=>'Best Time',
			'buying_time'=>'Buying Time',
			'source'=>'Source',
			'stock_num'=>'Stock',
			'stock_num_trade'=>'Stock#/T',
			'first_name'=>'First Name',
			'last_name'=>'Last Name',
			'phone'=>'Phone',
			'mobile'=>'Mobile',
			'email'=>'Email',
			'condition'=>'Unit Condtion',
			'year'=>'Year',
			'make'=>'Make',
			'model'=>'Model',
			'type'=>'Unit Type',
			'condition_trade'=>'Trade Condition',
			'trade_value'=>'Trade Value',
			'year_trade'=>'Trade Year',
			'make_trade'=>'Trade Make',
			'model_trade'=>'Trade Model',
			'type_trade'=>'Trade Type',
			'unit_color'=>'Unit Color',
			'vin_trade'=>'(Trade) Vin Number',
			'odometer_trade'=>'(Trade) Miles',
			'notes'=>'Notes',
			'usedunit_color'=>'Trade Color',
		);
		$contact_statuses = array(
			'12' => 'Mobile Lead',
			'5' => 'Web Lead',
			'6' => 'Phone Lead',
			'7' => 'Showroom',
			'8' => 'Parts',
			'9' => 'Service',
			'10' => 'Call Center',
			'11' => 'Rental'
		);

		/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
		if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){		$this->layout=false;
		}else{
			$this->layout='leads_edit';
		}
        $group_id = $this->Auth->user('group_id');
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Record not found'));
        }
        $contact = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$id)));
        //if ($group_id == 2) {
            if ($this->Auth->user('dealer_id') != $contact['Contact']['company_id']) {
                $this->redirect(array('controller' =>'dashboards', 'action' => 'main'));
            }
        //}

        //debug($group_id);
        $source_editable = true;
        if( !in_array($group_id, array('2','6','12','9')) &&  $contact['Contact']['xml_weblead'] == '1'){
        	$source_editable = false;
        }
        $this->set('source_editable', $source_editable);

        $this->set('zone', $this->Auth->user('zone'));

		$unit_value_price = $this->requestAction("dealer_settings/get_settings/unit_value_price");
		$this->set('unit_value_price', $unit_value_price);

		$follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");



		$show_second_face = $this->requestAction("dealer_settings/get_settings/show-second-face");
		$required_second_face = $this->requestAction("dealer_settings/get_settings/required-second-face");

		$emps = $this->User->find('list', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$this->Auth->User('dealer_id'))));
		$this->set('emps', $emps);
		$this->set('show_second_face', $show_second_face);
		$this->set('required_second_face', $required_second_face);

		$this->loadModel("DealerSetting");
		$gender_required = $this->DealerSetting->get_settings('gender_required', $this->Auth->user('dealer_id') );

		$stock_num_required_sold = $this->DealerSetting->get_settings('stock_num_required_sold', $this->Auth->user('dealer_id') );
		$this->set('stock_num_required_sold', $stock_num_required_sold);


		$email_required = $this->DealerSetting->get_settings('email_required', $this->Auth->user('dealer_id') );
		$this->set('email_required', $email_required);


		$state_provinces = $this->DealerSetting->get_settings('state_provinces', $this->Auth->user('dealer_id') );
		$this->set('state_provinces', $state_provinces);
		//debug($state_provinces);

		$dnc_bdc_only = $this->DealerSetting->get_settings('dnc_bdc_only', $this->Auth->user('dealer_id') );
		$this->set('dnc_bdc_only', $dnc_bdc_only);
		//debug($dnc_bdc_only);

		$additional_contact = $this->DealerSetting->get_settings('additional_contact', $this->Auth->user('dealer_id') );
		$this->set('additional_contact', $additional_contact);
		//debug($additional_contact);

		$required_year_make_model = $this->DealerSetting->get_settings('required_year_make_model', $this->Auth->user('dealer_id'));
		$this->set('required_year_make_model', $required_year_make_model);


		$validate_method_of_payment = $this->DealerSetting->get_settings('validate_method_of_payment', $this->Auth->user('dealer_id') );
		$this->set('validate_method_of_payment', $validate_method_of_payment);

		$send_log_change_notification = $this->DealerSetting->get_settings('log_change_notification', $this->Auth->user('dealer_id') );

		/**
		* Casl Settings and Status list
		*/
		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $this->Auth->user('dealer_id') );
		$this->set('casl_feature', $casl_feature);

		$this->LoadModel('ContactCaslStatuse');
		$contactCaslStatuse_list = $this->ContactCaslStatuse->find('list');
		$this->set('contactCaslStatuse_list', $contactCaslStatuse_list);


		$this->loadModel("LeadStatus");

		$address_validation = $this->requestAction("dealer_settings/get_settings/address-validation");
		$this->set('address_validation', $address_validation);


		//Your Locations
		$location_names = $this->DealerSetting->get_settings('location_names', $this->Auth->user('dealer_id') );
		$this->set('location_names', $location_names);
		//debug($location_names);

		$your_locations = $this->DealerSetting->locations_list( $this->Auth->user('dealer_id')  );
		if(empty($your_locations)){
			$your_locations = array( $this->Auth->user('dealer') => $this->Auth->user('dealer') );
		}
		$this->set('your_locations', $your_locations);

		//Validation group for palmer group
		$validation_palmer = 0;
		if(in_array($this->Auth->user('dealer_id'), array('2663','266900','266800','266700','266600','266500','266400'))){
			$validation_palmer = 1;
			$gender_required = 'Off';
		}
		$this->set('validation_palmer', $validation_palmer);
		$this->set('gender_required', $gender_required);



        if ($this->request->is('post')) {

        	$this->request->data['Contact']['note_added_by'] = $this->Auth->user("first_name")." ".$this->Auth->user("last_name"). " #".$this->Auth->user("id");

        	$this->request->data['Contact']['first_name'] = ucwords(strtolower( $this->request->data['Contact']['first_name'] ));
        	$this->request->data['Contact']['last_name'] = ucwords(strtolower( $this->request->data['Contact']['last_name'] ));

			//Price range for non RV
        	if( $this->request->data['Contact']['category'] != 'RV' ){
				$this->request->data['Contact']['price_range'] = $this->request->data['Contact']['price_range_non_rv'];
				$this->request->data['Contact']['trade_price_range'] = $this->request->data['Contact']['trade_price_range_non_rv'];
			}

			$this->request->data['Contact']['mobile'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['mobile']);
			$this->request->data['Contact']['phone'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['phone']);
			$this->request->data['Contact']['work_number'] = str_replace(array("(","-",")"," "),"",$this->request->data['Contact']['work_number']);

            $old_data = $old_contact_data = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$id)));

			//for open contact
			$open_contact = false;
			if( $old_data['Contact']['sperson'] == '' && $old_data['Contact']['user_id'] == '' && $old_data['Contact']['status'] == "Web Lead"){
				//$old_data['Contact']['sperson'] = $this->Auth->user('username');
				$old_data['Contact']['sperson'] = $this->Auth->user('full_name');
				$old_data['Contact']['user_id'] = $this->Auth->user('id');
				$open_contact = true;
			}

			//Field Changed
			$field_changed_ar = array();
			foreach($this->request->data['Contact'] as $key=>$value){
				if($key == 'modified' || $key == 'modified_full_date' || $key == 'modified_date_short' || $key == 'modified_date_short_slash' || $key == 'sperson'){
					continue;
				}
				//debug($key." - ".$value." - ".$old_data['Contact'][$key]);
				if($old_data['Contact'][$key] != $value){
					$field_value = ($key == 'contact_status_id')? $contact_statuses[$this->request->data['Contact'][$key]] : $this->request->data['Contact'][$key];
					$field_name = (array_key_exists($key, $fields_map_array))?  $fields_map_array[$key] : $key ;
					$field_changed_ar[] = $field_name.": ".$field_value;
				}
			}

			//calculate setp change interval
			if( $old_data['Contact']['sales_step'] != $this->request->data['Contact']['sales_step']){
				$this->request->data['Contact']['step_change_interval'] = strtotime('now') - strtotime( $old_data['Contact']['modified'] );
				$this->request->data['Contact']['step_modified']  = date('Y-m-d H:i:s');
			}

			//set created date time and modified
			if($this->request->data['Contact']['created_date'] != '' && $this->request->data['Contact']['created_time'] != ''){
				$unix_t = strtotime($this->request->data['Contact']['created_date']." ".$this->request->data['Contact']['created_time']);

				$this->request->data['Contact']['created']  = date('Y-m-d H:i:s', $unix_t );
				$this->request->data['Contact']['created_date_short']  = date('mdY', $unix_t );
				$this->request->data['Contact']['created_date_short_slash']  = date('m/d/Y', $unix_t );
				$this->request->data['Contact']['created_full_date']  =date('D - M d, Y g:i A', $unix_t );


				$this->request->data['Contact']['modified']  = date('Y-m-d H:i:s', $unix_t );
				$this->request->data['Contact']['modified_date_short']  = date('mdY', $unix_t );
				$this->request->data['Contact']['modified_date_short_slash']  = date('m/d/Y', $unix_t );
				$this->request->data['Contact']['modified_full_date']  =date('D - M d, Y g:i A', $unix_t );


				$this->loadModel('LeadSold');
        		$c_lead_sold = $this->LeadSold->find("first", array("conditions"=>array("LeadSold.contact_id"=>$old_data['Contact']['id'])));
        		if(!empty($c_lead_sold)){
        			$this->LeadSold->id = $c_lead_sold['LeadSold']['id'];
        			$this->LeadSold->saveField("modified", date('Y-m-d H:i:s', $unix_t ) );
        		}



			}

			$send_lead_change_notification = false;

			//debug( $this->request->data );
			//$this->request->data['Contact']['user_id'] = $old_data['Contact']['user_id'];
			//$this->request->data['Contact']['sperson'] = $old_data['Contact']['sperson'];
			if($this->Auth->user('id') !=  $old_data['Contact']['user_id'] && $this->Auth->user('group_id') != '8' && $this->Auth->user('group_id') != '13'   && $this->request->data['Contact']['gsm_edit'] != 'yes'  ){
				$this->request->data['Contact']['user_id'] = $this->Auth->user('id');
				$this->request->data['Contact']['sperson'] = $this->Auth->user('full_name');
				$send_lead_change_notification = true;
				//Update Events
			}

			if($this->Auth->user('group_id') == '8' || $this->Auth->user('group_id') == '13' || $this->request->data['Contact']['gsm_edit'] == 'yes' ){
				if($this->request->data['Contact']['gsm_edit'] == 'yes'){
					$this->request->data['Contact']['notes'] = 'EDIT by Sales Manager - '.$this->request->data['Contact']['notes'];
				}else{
					$this->request->data['Contact']['notes'] = 'EDIT by BDC - '.$this->request->data['Contact']['notes'];
				}
				$this->request->data['Contact']['spit_deal_update'] = 'yes';
				$this->request->data['Contact']['spit_deal_user_id'] = $this->Auth->user('id');
			}else{
				$this->request->data['Contact']['spit_deal_update'] = 'no';
				$this->request->data['Contact']['spit_deal_user_id'] = null;
			}


            if ($this->Contact->save($this->request->data)) {

            	//Insert casl opt-out
				if(isset($this->request->data['Contact']['contact_casl_status_id']) && $old_data['Contact']['contact_casl_status_id'] != $this->request->data['Contact']['contact_casl_status_id'] && in_array($this->request->data['Contact']['contact_casl_status_id'], array('3', '4') ) ){
					$this->loadModel('CrmUnsubscribe');
					$this->CrmUnsubscribe->opt_out($this->request->data, $old_data['Contact']['company_id'], $this->Auth->user('first_name'). " " . $this->Auth->user('last_name'));
				}

				//remove opt out
				if(isset($this->request->data['Contact']['contact_casl_status_id']) && $old_data['Contact']['contact_casl_status_id'] != $this->request->data['Contact']['contact_casl_status_id'] && ! in_array($this->request->data['Contact']['contact_casl_status_id'], array('3','4')) ){
					$this->loadModel('CrmUnsubscribe');
					$this->CrmUnsubscribe->remove_opt_out($this->Contact->id,  $old_data['Contact']['company_id'], $this->Auth->user('first_name'). " " . $this->Auth->user('last_name'));
				}


            	$this->LoadModel('LeadChangeAlertEmail');

            	if($send_lead_change_notification == true){
            		//Send Lead Change Update
					$this->LeadChangeAlertEmail->send_lead_change_report( $this->Auth->user('dealer_id'), $this->Auth->user('zone'), $old_data['Contact']['modified'], $old_data['Contact']['id']);
            	}

            	//Send Log Change Notification
				if($send_log_change_notification == 'On' && $contact['Contact']['user_id'] != '' && $contact['Contact']['user_id'] != 0 && $this->Auth->user('id') !=  $contact['Contact']['user_id'] ){
					$log_change_noti_data = $this->request->data;
					$log_change_noti_data['Contact']['company'] = $contact['Contact']['company'];
					$log_change_noti_data['Contact']['company_id'] = $contact['Contact']['company_id'];
					$this->LeadChangeAlertEmail->send_log_change_notification($contact['Contact']['user_id'], $log_change_noti_data , $this->Auth->user('first_name'). " " . $this->Auth->user('last_name')." (". $this->Auth->user('id') .")" );
				}




            	$this->loadModel("AdditionalContact");
            	//debug( $this->request->data );
            	//Insert Additional Contacts
            	if(isset($this->request->data['AdditionalContact']) && !empty($this->request->data['AdditionalContact']) ){
            		foreach($this->request->data['AdditionalContact'] as $add_cnt){

						if( isset($add_cnt['id'])){
							$this->AdditionalContact->save(array("AdditionalContact"=>$add_cnt));
						}else{

							if($add_cnt['first_name'] != ''){
            					$add_cnt['contact_id'] = $this->Contact->id;
            					$this->AdditionalContact->create();
            					$this->AdditionalContact->save(array("AdditionalContact"=>$add_cnt));
            				}
						}

            		}

            	}



            	/**    Insert add on vehicle Start
				'category_addon1' => 'In Stock',
				'type_addon1' => 'Motorcycle / Scooter',
				'make_addon1' => 'Honda',
				'year_addon1' => '2010',
				'model_id_addon1' => '28295',
				'model_addon1' => 'Stateline ABS (VT1300CRA)',
				'class_addon1' => 'Cruiser',
				'condition_addon1' => 'Used',
				'vin_addon1' => '',
            	**/
            	$this->loadModel('AddonVehicle');
            	$this->AddonVehicle->deleteAll(array('contact_id'=>$this->Contact->id));
            	if($this->request->data['Contact']['category_addon1'] != '' && $this->request->data['Contact']['type_addon1']
            		&& $this->request->data['Contact']['make_addon1']
            	){
            		$this->AddonVehicle->create();
            		$this->AddonVehicle->save(array('AddonVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon1'],
						'category'=>$this->request->data['Contact']['category_addon1'],
						'type'=>$this->request->data['Contact']['type_addon1'],
						'year'=>$this->request->data['Contact']['year_addon1'],
						'make'=>$this->request->data['Contact']['make_addon1'],
						'model_id'=>$this->request->data['Contact']['model_id_addon1'],
						'model'=>$this->request->data['Contact']['model_addon1'],
						'class'=>$this->request->data['Contact']['class_addon1'],
						'vin'=>$this->request->data['Contact']['vin_addon1'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon1'],
						'condition'=>$this->request->data['Contact']['condition_addon1'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon1'],
						'engine'=>$this->request->data['Contact']['engine_addon1'],
						'odometer'=>$this->request->data['Contact']['odometer_addon1'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon1'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon1'],



            		)));
            	}
            	if($this->request->data['Contact']['category_addon2'] != '' && $this->request->data['Contact']['type_addon2']
            		&& $this->request->data['Contact']['make_addon2']
            	){
            		$this->AddonVehicle->create();
            		$this->AddonVehicle->save(array('AddonVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon2'],
						'category'=>$this->request->data['Contact']['category_addon2'],
						'type'=>$this->request->data['Contact']['type_addon2'],
						'year'=>$this->request->data['Contact']['year_addon2'],
						'make'=>$this->request->data['Contact']['make_addon2'],
						'model_id'=>$this->request->data['Contact']['model_id_addon2'],
						'model'=>$this->request->data['Contact']['model_addon2'],
						'class'=>$this->request->data['Contact']['class_addon2'],
						'vin'=>$this->request->data['Contact']['vin_addon2'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon2'],
						'condition'=>$this->request->data['Contact']['condition_addon2'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon2'],
						'engine'=>$this->request->data['Contact']['engine_addon2'],
						'odometer'=>$this->request->data['Contact']['odometer_addon2'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon2'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon2'],
            		)));
            	}
            	/**    Insert add on vehicle End   	**/






            	/**    Insert add on vehicle Trade Start
				'category_addon1' => 'In Stock',
				'type_addon1' => 'Motorcycle / Scooter',
				'make_addon1' => 'Honda',
				'year_addon1' => '2010',
				'model_id_addon1' => '28295',
				'model_addon1' => 'Stateline ABS (VT1300CRA)',
				'class_addon1' => 'Cruiser',
				'condition_addon1' => 'Used',
				'vin_addon1' => '',
            	**/
            	$this->loadModel('AddonTradeVehicle');
            	$this->AddonTradeVehicle->deleteAll(array('contact_id'=>$this->Contact->id));
            	if($this->request->data['Contact']['category_addon1_trade'] != '' && $this->request->data['Contact']['type_addon1_trade']
            		&& $this->request->data['Contact']['make_addon1_trade']
            	){
            		$this->AddonTradeVehicle->create();
            		$this->AddonTradeVehicle->save(array('AddonTradeVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon1_trade'],
						'category'=>$this->request->data['Contact']['category_addon1_trade'],
						'type'=>$this->request->data['Contact']['type_addon1_trade'],
						'year'=>$this->request->data['Contact']['year_addon1_trade'],
						'make'=>$this->request->data['Contact']['make_addon1_trade'],
						'model_id'=>$this->request->data['Contact']['model_id_addon1_trade'],
						'model'=>$this->request->data['Contact']['model_addon1_trade'],
						'class'=>$this->request->data['Contact']['class_addon1_trade'],
						'vin'=>$this->request->data['Contact']['vin_addon1_trade'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon1_trade'],
						'condition'=>$this->request->data['Contact']['condition_addon1_trade'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon1_trade'],
						'engine'=>$this->request->data['Contact']['engine_addon1_trade'],
						'odometer'=>$this->request->data['Contact']['odometer_addon1_trade'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon1_trade'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon1_trade'],



            		)));
            	}
            	if($this->request->data['Contact']['category_addon2_trade'] != '' && $this->request->data['Contact']['type_addon2_trade']
            		&& $this->request->data['Contact']['make_addon2_trade']
            	){
            		$this->AddonTradeVehicle->create();
            		$this->AddonTradeVehicle->save(array('AddonTradeVehicle'=>array(
						'contact_id'=>$this->Contact->id,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_addon2_trade'],
						'category'=>$this->request->data['Contact']['category_addon2_trade'],
						'type'=>$this->request->data['Contact']['type_addon2_trade'],
						'year'=>$this->request->data['Contact']['year_addon2_trade'],
						'make'=>$this->request->data['Contact']['make_addon2_trade'],
						'model_id'=>$this->request->data['Contact']['model_id_addon2_trade'],
						'model'=>$this->request->data['Contact']['model_addon2_trade'],
						'class'=>$this->request->data['Contact']['class_addon2_trade'],
						'vin'=>$this->request->data['Contact']['vin_addon2_trade'],
						'stock_num'=>$this->request->data['Contact']['stock_num_addon2_trade'],
						'condition'=>$this->request->data['Contact']['condition_addon2_trade'],

						'unit_value'=>$this->request->data['Contact']['unit_value_addon2_trade'],
						'engine'=>$this->request->data['Contact']['engine_addon2_trade'],
						'odometer'=>$this->request->data['Contact']['odometer_addon2_trade'],
						'unit_color'=>$this->request->data['Contact']['unit_color_addon2_trade'],
						'branch_location'=>$this->request->data['Contact']['branch_location_addon2_trade'],
            		)));
            	}
            	/**    Insert add on vehicle Trade End   	**/




            	//Save lead sold
            	if($old_data['Contact']['sales_step'] != '10' && $this->request->data['Contact']['sales_step'] == '10'){
            		$new_data = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$this->Contact->id)));
            		$lead_sold_data['LeadSold'] = $new_data['Contact'];
            		$lead_sold_data['LeadSold']['contact_id'] = $lead_sold_data['LeadSold']['id'];
            		unset($lead_sold_data['LeadSold']['id']);
            		$this->loadModel('LeadSold');
            		$this->LeadSold->create();
            		$this->LeadSold->save($lead_sold_data);

            		$this->send_sold_alert($lead_sold_data['LeadSold']['contact_id']);

            		//Autoresponder send immediate sold notification start
            		$this->requestAction("autoresponder_emails/immediate_sold/".$lead_sold_data['LeadSold']['contact_id']);
            		//Autoresponder send immediate sold notification ends

            		//Update in Stock Inventory
            		if($this->request->data['Contact']['category'] == 'In Stock' && $this->request->data['Contact']['model_id'] != '' ){
	            		$this->loadModel('XmlInventory');
            			$this->XmlInventory->updateAll(
							array(
								'XmlInventory.sold' => "'1'",
							),array('XmlInventory.id' => $this->request->data['Contact']['model_id'] )
						);
            		}

            	}



				$history_data = array();

           		//save step change
            	if($old_data['Contact']['sales_step'] !=  $this->request->data['Contact']['sales_step']){
            		$history_data['last_step'] = $old_data['Contact']['sales_step'];
            		$history_data['step_chage_date'] = date('Y-m-d H:i:s');
            	}


				$history_data['user_id'] = $old_data['Contact']['user_id']; // for change log
				$history_data['changed_by'] = $this->Auth->user('id'); // for change log
				$history_data['field_changed'] = implode(", ",$field_changed_ar);  // for change log

				$history_data['contact_id'] = $old_data['Contact']['id'];
				$history_data['sperson'] = $old_data['Contact']['sperson'];
				$history_data['cond'] = $old_data['Contact']['condition'];
				$history_data['year'] = $old_data['Contact']['year'];
				$history_data['make'] = $old_data['Contact']['make'];
				$history_data['model'] = $old_data['Contact']['model'];
				$history_data['type'] = $old_data['Contact']['type'];
				$history_data['sales_step'] = $old_data['Contact']['sales_step'];
				$history_data['status'] = $old_data['Contact']['status'];
				$history_data['modified'] = date('D - M d, Y g:i A', strtotime($old_data['Contact']['modified']) );
				$history_data['created'] = $old_data['Contact']['modified'];
				$history_data['comment'] = $old_data['Contact']['notes'];
				$history_data['dealer_id'] = $old_data['Contact']['company_id'];

				$history_data['condition'] = $old_data['Contact']['spit_deal_update'];
				$history_data['spit_deal_user_id'] = $old_data['Contact']['spit_deal_user_id'];



				$history_data['h_type'] = "Lead";
				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);

				//for open contact
				if($open_contact){
					//$this->Contact->id =;
					$this->Contact->saveField('sperson', $this->Auth->user('username'));
					$this->Contact->saveField('owner', $this->Auth->user('username'));
					$this->Contact->saveField('user_id', $this->Auth->user('id'));
					$this->Contact->saveField('owner_id', $this->Auth->user('id'));

				}


				if(isset($this->request->data['Event']['id']) || $this->request->data['Contact']['create_new_event'] == 1){


					//save event
					$this->request->data['Event']['user_id'] = $old_data['Contact']['user_id'];
					$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
					$this->request->data['Event']['contact_id'] = $id ;
					$this->request->data['Event']['sperson'] =  $this->request->data['Contact']['sperson'];
					$this->request->data['Event']['first_name'] = $this->request->data['Contact']['first_name'];
					$this->request->data['Event']['last_name'] = $this->request->data['Contact']['last_name'];
					$this->request->data['Event']['email'] = $this->request->data['Contact']['email'];
					$this->request->data['Event']['mobile'] = $this->request->data['Contact']['mobile'];
					$this->request->data['Event']['phone'] = $this->request->data['Contact']['phone'];

					$this->request->data['Event']['start'] = '';
					$this->request->data['Event']['end'] = '';
					if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
						$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
						$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
					}

					if(!isset($this->request->data['Event']['id'])){
						$this->request->data['Event']['logged_user_id'] = $this->Auth->user('id');
						$this->Event->create();
					}
					$this->Event->save($this->request->data);

					//Update Events if sperson changed
	            	if($this->Auth->user('id') !=  $this->request->data['Contact']['user_id'] && $this->Auth->user('group_id') != '8' && $this->Auth->user('group_id') != '13'  && $this->Auth->user('group_id') != '13' ){
	            		$this->Event->updateAll(
							array(
								'Event.user_id' => "'".$this->Auth->user('id')."'",
								'Event.sperson' => "'".$this->Auth->user('full_name')."'",
							),
							array('Event.contact_id' => $this->Contact->id)
						);
					}


					////////////////////////////////History entry for events/////////////
					$old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
					$history_data = array();
					$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
					$history_data['event_id'] = 			$old_data['Event']['id'];
					$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
					$history_data['make'] = 				$old_data['EventType']['name'];
					$history_data['model'] = 				date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
					$history_data['status'] = 				$old_data['Event']['status'];
					$history_data['comment'] = 				$old_data['Event']['details'];
					$history_data['notes'] = 				$old_data['Event']['title'];
					$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
					$history_data['start_date'] = 			$old_data['Event']['start'];
					$history_data['end_date'] = 			$old_data['Event']['end'];
					$history_data['h_type'] = 				"Event";
					$history_data['sales_step'] = 			"Event";
					$history_data['sperson'] 	=			$old_data['Event']['sperson'];

					$history = array(
						'History' => $history_data
					);
					$this->History->create();
					$this->History->save($history);

	                $this->Session->setFlash(__('Contact data saved'), 'alert');


				}





	            //<Set Event Completed for dead lead>
				$dead_lead_head = $this->LeadStatus->find('first',array(
					'conditions'=>array(
						'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
						'LeadStatus.name'=> $this->request->data['Contact']['status'],
					)
				));
				if($dead_lead_head['LeadStatus']['header'] != 'Sold Deal (Closed)' && $this->request->data['Contact']['lead_status'] == 'Closed' ){
					$this->requestAction(array('controller'=>'contacts_manage','action'=>'set_event_completed', $this->Contact->id  ));
				}
				//<Set Event Completed for dead lead ends />

				$message = "";


				/**
		   		* Check casl status for email send
		   		*/
				$casl_send_email = true;
				if(isset($this->request->data['Contact']['contact_casl_status_id']) && $this->request->data['Contact']['contact_casl_status_id'] =='3' ){
					$casl_send_email = false;
				}

				/**
		   		* Check Unsubscription
		   		*/
		   		$this->loadModel('CrmUnsubscribe');
		   		$crmUnsubscribe_cnt = $this->CrmUnsubscribe->find('count', array('recursive' => -1,
					'conditions'=>array(
						'CrmUnsubscribe.contact_id' => $this->Contact->id
					)
				));
				if($crmUnsubscribe_cnt != '0'){
					$casl_send_email = false;
				}


				/* Commented by dts */
				//Send customer email
				/*if($this->request->data['UserEmail']['send_email'] == '1' && $casl_send_email == true){
					// 'UserEmail' => array(
					// 'send_email' => '1',
					// 'subject' => 'sdfdsf',
					// 'template_id' => '',
					// 'message' => '<p>Template&nbsp;{first_name}</p>
					$message = $this->requestAction('user_emails/send_contact_email', array(
						'contact_id' => $this->Contact->id,
						'subject'=>$this->request->data['UserEmail']['subject'],
						'mailbody'=>$this->request->data['UserEmail']['message']
					));
				}*/

				if($casl_send_email == true){

					 // Create ics file if calendar invite is checked
					$file_path 	=	'';
					if($this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						 $ics_filename 		= 'event_'.$this->Contact->id.".ics";
						 $ics_start   		=	$this->request->data['Event']['start'];
						 $ics_end   		=	$this->request->data['Event']['end'];
						 $ics_title			=	$this->request->data['Event']['title'];
						 $ics_description	=	$this->request->data['Event']['details'];

						 $file_path 		= 	$this->create_ics($ics_filename,$ics_start,$ics_end,$ics_title,$ics_description);
					}

					 // Create ics file if calendar invite is checked end

					 // Attach the ics file attached to the same email sent
					if($this->request->data['UserEmail']['send_email'] == '1' && $this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						$message = $this->requestAction('user_emails/send_ics_email', array(
							'contact_id' => $this->Contact->id,
							'subject'=>$this->request->data['UserEmail']['subject'],
							'mailbody'=>$this->request->data['UserEmail']['message'],
							'ics_attachment_files'=>$file_path,
						));
					}
					elseif($this->request->data['UserEmail']['send_calendar_invite'] == '1'){
						$this->LoadModel('CalendarInviteContent');
						$calendar_invite_contents = $this->CalendarInviteContent->find("first", array("conditions"=>array("CalendarInviteContent.dealer_id" => $this->Auth->user('dealer_id'))));
						$mail_subject 	=	(isset($calendar_invite_contents['CalendarInviteContent']['subject']))?$calendar_invite_contents['CalendarInviteContent']['subject']:'Calendar event invitation';
						$mail_content 	=	(isset($calendar_invite_contents['CalendarInviteContent']['content']))?$calendar_invite_contents['CalendarInviteContent']['content']:'Please find attached calendar event invitation file';
						$message = $this->requestAction('user_emails/send_ics_email', array(
						    'contact_id' => $this->Contact->id,
							'subject'=>$mail_subject,
							'mailbody'=>$mail_content,
							'ics_attachment_files'=>$file_path,
						));
					}
					elseif ($this->request->data['UserEmail']['send_email'] == '1') {
						// 'UserEmail' => array(
						// 'send_email' => '1',
						// 'subject' => 'sdfdsf',
						// 'template_id' => '',
						// 'message' => '<p>Template&nbsp;{first_name}</p>
						$message = $this->requestAction('user_emails/send_contact_email', array(
							'contact_id' => $this->Contact->id,
							'subject'=>$this->request->data['UserEmail']['subject'],
							'mailbody'=>$this->request->data['UserEmail']['message']
						));
					}

				}

				/* STARTS : Trigger Update Email - Autoresponders */
					$message = $this->requestAction('autoresponder_emails/send_auto_responder_update_email', array(
						'data' => array(
								'contact_id' => $this->Contact->id,
								'form_data'=>$this->request->data,
								'old_contact_data'=>$old_contact_data
							)
						)
					);
				/* ENDS : Trigger Update Email - Autoresponders */


				// CLEAR CACHE ON EDIT LEAD
				$this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));
				$this->requestAction('manage_cache/clear_contact_cache/'.$this->Contact->id);



				if($message != ''){
					$this->Session->setFlash($message, 'alert');
				}

				if($this->request->data['Contact']['status'] == 'Sold/Rolled-Multi Vehicle'){
					$this->redirect(array('action' => 'leads_input','?'=>array('multiple_vehicle'=>$id)));
				}else{
					$this->redirect(array('action' => 'leads_main','view',$id));
				}



				/*
                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id=' . $id . '&fname=' . $this->request->data['Contact']['first_name'] . '&lname=' . $this->request->data['Contact']['last_name'] . '&email=' . $this->request->data['Contact']['email'] . '&phone=' . $this->request->data['Contact']['phone'] . '&mobile=' . $this->request->data['Contact']['mobile']);
                } else {
					$this->Session->write('load_lead', $id);
                    $this->redirect(array('action' => 'leads_main', $this->request->data['Contact']['contact_status_id']));
                }
				*/


            } else {
                $this->Session->setFlash(__('Unable to save changes'), 'alert', array('class' => 'alert-error'));
            }
        } else {


        	$this->loadModel("AdditionalContact");
        	$additionalContacts = $this->AdditionalContact->find("all", array('conditions'=>array('AdditionalContact.contact_id'=>$id)));
        	$this->set('additionalContacts', $additionalContacts);
        	//debug($additionalContacts);



            $contactstatuses = $this->ContactStatus->find('list');
            $this->set(compact('contactstatuses'));
            $this->request->data = $this->Contact->read();

        	if( $this->request->data['Contact']['category'] != 'RV' ){
				$this->request->data['Contact']['price_range_non_rv'] = $this->request->data['Contact']['price_range'];
				$this->request->data['Contact']['trade_price_range_non_rv'] = $this->request->data['Contact']['trade_price_range'];
			}

			$this->request->data['Contact']['phone'] = $this->format_phone($this->request->data['Contact']['phone']);
			$this->request->data['Contact']['mobile'] = $this->format_phone($this->request->data['Contact']['mobile']);
			$this->request->data['Contact']['work_number'] = $this->format_phone($this->request->data['Contact']['work_number']);

			if( $this->request->data['Contact']['dnc_status'] == '' ){
				$this->request->data['Contact']['dnc_status'] = 'ok_call_email';
			}


			if( $this->request->data['Contact']['contact_status_id'] == '5' && $this->request->data['Contact']['condition'] == '' && $this->request->data['Contact']['year'] != ''){
				if( $this->request->data['Contact']['year'] < date("Y") ){
					$this->request->data['Contact']['condition'] = 'Used';
				}
			}

			//get last event
			$eventinfo = $this->Event->find('first', array('recursive' => 0,'order'=>'Event.id DESC', 'conditions'=>array('Event.contact_id' => $id)));
			if(!empty($eventinfo) && $eventinfo['Event']['status'] != 'Completed' && $eventinfo['Event']['status'] != 'Canceled'  ){

				$this->request->data['Event']['id'] = $eventinfo['Event']['id'];
				$this->request->data['Event']['event_type_id'] = $eventinfo['Event']['event_type_id'];
				$this->request->data['Event']['status'] = $eventinfo['Event']['status'];
				$this->request->data['Event']['title'] = $eventinfo['Event']['title'];
				$this->request->data['Event']['details'] = $eventinfo['Event']['details'];

				$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
				$this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
			}else{

				$auto_event_time = $this->DealerSetting->get_settings('auto_event_time', $this->Auth->user("dealer_id")  );

				$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
				$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));

				$this->request->data['Event']['start_time'] = $auto_event_time;
				$this->request->data['Event']['end_time'] =  date("h:i A",strtotime("+15 minute",  strtotime($auto_event_time)));


				/*
			 	if($follow_up_24 == 'On'){
					$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
					$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));

					$this->request->data['Event']['start_time'] = "10:00 AM";
					$this->request->data['Event']['end_time'] = "10:15 AM";
					$this->request->data['Event']['end_time'] = "10:15 AM";
					$this->request->data['Event']['end_time'] = "10:15 AM";

					$this->request->data['Event']['status'] = "Scheduled";
					$this->request->data['Event']['event_type_id'] = "13";
					$this->request->data['Event']['title'] = " Call Out to Customer";
					$this->request->data['Event']['details'] = "Call Out to Customer- ";
				}
				*/

			}

			if( $this->request->data['Contact']['trade_value'] == '' ){
				$this->request->data['Contact']['trade_value'] = '0.00';
			}

			/*
        	//default status for edit lead
        	if( isset($this->request->query['do']) && $this->request->query['do'] = 'edit_lead'  ){
        		$this->request->data['Contact']['status'] = 'Customer Update Edit ONLY';
        	}
        	*/




			//Add on vehicle start
			$this->loadModel('AddonVehicle');
			$this->AddonVehicle->bindModel(array(
				'belongsTo'=>array('Category'=>array(
					'foreignKey'=>false,
					'conditions'=> array("AddonVehicle.class = Category.id")
				)),
			));
			$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$id) ));
			$this->set('addonVehicles', $addonVehicles);

			//debug($addonVehicles);
			if(!empty($addonVehicles[0])){
				$this->request->data['Contact']['id_addon1'] = $addonVehicles[0]['AddonVehicle']['id'];

				$this->request->data['Contact']['vehicle_selection_type_addon1'] = $addonVehicles[0]['AddonVehicle']['vehicle_selection_type'];
				$this->request->data['Contact']['condition_addon1'] = $addonVehicles[0]['AddonVehicle']['condition'];
				$this->request->data['Contact']['vin_addon1'] = $addonVehicles[0]['AddonVehicle']['vin'];
				$this->request->data['Contact']['stock_num_addon1'] = $addonVehicles[0]['AddonVehicle']['stock_num'];

				$this->request->data['Contact']['unit_value_addon1'] = $addonVehicles[0]['AddonVehicle']['unit_value'];
				$this->request->data['Contact']['engine_addon1'] = $addonVehicles[0]['AddonVehicle']['engine'];
				$this->request->data['Contact']['odometer_addon1'] = $addonVehicles[0]['AddonVehicle']['odometer'];
				$this->request->data['Contact']['unit_color_addon1'] = $addonVehicles[0]['AddonVehicle']['unit_color'];
				$this->request->data['Contact']['branch_location_addon1'] = $addonVehicles[0]['AddonVehicle']['branch_location'];


				//D_TYPE SELECTION
				$this->request->data['Contact']['category_addon1'] = $addonVehicles[0]['AddonVehicle']['category'];
				$d_type_options_addon1 = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
					'?'=>array('show_hidden' => true, 'vehicle_selection_type'=> $addonVehicles[0]['AddonVehicle']['vehicle_selection_type']  )));
				$this->set('d_type_options_addon1', $d_type_options_addon1);

				//MAKE SELECTION
				$mk_options_addon1 = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
					'?'=>array(
						'show_hidden' => true,
						'vehicle_selection_type' => $addonVehicles[0]['AddonVehicle']['vehicle_selection_type'] ,
						'type'=> $addonVehicles[0]['AddonVehicle']['category']
				)));
				$this->set('mk_options_addon1', $mk_options_addon1);
				$this->request->data['Contact']['make_addon1'] = $addonVehicles[0]['AddonVehicle']['make'];

				//YEAR SELECTION
				$this->request->data['Contact']['year_addon1'] = $addonVehicles[0]['AddonVehicle']['year'];
				if( $this->request->data['Contact']['model_id_addon1'] != '' ){
					$year_addon1_opt = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
						'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$addonVehicles[0]['AddonVehicle']['vehicle_selection_type'],
							'type'=> $addonVehicles[0]['AddonVehicle']['category'],
							'make'=> $this->request->data['Contact']['make_addon1'],
						 )));
				}else{
					$year_addon1_opt = array();
					$year_addon1_opt[0] = 'Any Year';
					for($i=date('Y')+1; $i>=1980; $i--){
						$year_addon1_opt[$i] = $i;
					}
				}
				$this->set('year_addon1_opt', $year_addon1_opt);

				//MODEL SELECTION
				$this->request->data['Contact']['model_id_addon1'] = $addonVehicles[0]['AddonVehicle']['model_id'];
				$this->request->data['Contact']['model_addon1'] = $addonVehicles[0]['AddonVehicle']['model'];
				$year_contact_addon1 = $this->request->data['Contact']['year_addon1'];
				$make_contact_addon1 = $this->request->data['Contact']['make_addon1'];

				$model_opt_withspace_addon1 = array();
				if($make_contact_addon1 != '' && $year_contact_addon1 != ''){
					$model_opt_withspace_addon1 = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
						'?'=>array(
								'show_hidden' => true,
								'vehicle_selection_type'=>$addonVehicles[0]['AddonVehicle']['vehicle_selection_type'],
								'year' => $year_contact_addon1,
								'make' => $make_contact_addon1,
								'type' => $addonVehicles[0]['AddonVehicle']['category']
							)
					));
				}
				foreach($model_opt_withspace_addon1 as $key=>$value){
					$model_opt_addon1[ trim($key) ] = $value;
				}
				$this->set('model_opt_addon1', $model_opt_addon1);

				//CATEGORY SELECTION
				$this->request->data['Contact']['type_addon1'] = $addonVehicles[0]['AddonVehicle']['type'];
				$body_type_addon1 = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type' => $addonVehicles[0]['AddonVehicle']['vehicle_selection_type'],
					'type'=> $addonVehicles[0]['AddonVehicle']['category']  )));
				$this->set('body_type_addon1', $body_type_addon1);


				//CLASS SELECTION
				$this->request->data['Contact']['class_addon1'] = $addonVehicles[0]['AddonVehicle']['class'];
				$body_sub_type_options_addon1_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
					'vehicle_selection_type'=>$addonVehicles[0]['AddonVehicle']['vehicle_selection_type'],
					'type'=> $addonVehicles[0]['AddonVehicle']['category'],
					'category'=>$addonVehicles[0]['AddonVehicle']['type'],
				)));
				$body_sub_type_options_addon1 = array();
				foreach($body_sub_type_options_addon1_space as $key=>$value){
					$body_sub_type_options_addon1[trim($key)] = $value;
				}
				$this->set('body_sub_type_options_addon1', $body_sub_type_options_addon1);


				//Adjust empty category and class for In Stock Add-On Vehicle
				if($this->request->data['Contact']['vehicle_selection_type_addon1'] == 'In Stock' &&
					($this->request->data['Contact']['type_addon1'] == null ||  $this->request->data['Contact']['type_addon1'] == '' )
				){
					$this->request->data['Contact']['type_addon1'] = 'Any Category';
				}
				if($this->request->data['Contact']['vehicle_selection_type_addon1'] == 'In Stock' &&
					($this->request->data['Contact']['class_addon1'] == null ||  $this->request->data['Contact']['class_addon1'] == '' )
				){
					$this->request->data['Contact']['class_addon1'] = 'Any Class';
				}


			}


			if(!empty($addonVehicles[1])){

				$this->request->data['Contact']['id_addon2'] = $addonVehicles[1]['AddonVehicle']['id'];
				$this->request->data['Contact']['vehicle_selection_type_addon2'] = $addonVehicles[1]['AddonVehicle']['vehicle_selection_type'];
				$this->request->data['Contact']['condition_addon2'] = $addonVehicles[1]['AddonVehicle']['condition'];
				$this->request->data['Contact']['vin_addon2'] = $addonVehicles[1]['AddonVehicle']['vin'];
				$this->request->data['Contact']['stock_num_addon2'] = $addonVehicles[1]['AddonVehicle']['stock_num'];

				$this->request->data['Contact']['unit_value_addon2'] = $addonVehicles[1]['AddonVehicle']['unit_value'];
				$this->request->data['Contact']['engine_addon2'] = $addonVehicles[1]['AddonVehicle']['engine'];
				$this->request->data['Contact']['odometer_addon2'] = $addonVehicles[1]['AddonVehicle']['odometer'];
				$this->request->data['Contact']['unit_color_addon2'] = $addonVehicles[1]['AddonVehicle']['unit_color'];
				$this->request->data['Contact']['branch_location_addon2'] = $addonVehicles[1]['AddonVehicle']['branch_location'];


				//D_TYPE SELECTION
				$this->request->data['Contact']['category_addon2'] = $addonVehicles[1]['AddonVehicle']['category'];
				$d_type_options_addon2 = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
					'?'=>array('show_hidden' => true,'vehicle_selection_type'=> $addonVehicles[1]['AddonVehicle']['vehicle_selection_type']  )));
				$this->set('d_type_options_addon2', $d_type_options_addon2);

				//MAKE SELECTION
				$mk_options_addon2 = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
					'?'=>array('show_hidden' => true,
						'vehicle_selection_type' => $addonVehicles[1]['AddonVehicle']['vehicle_selection_type'] ,
						'type'=> $addonVehicles[1]['AddonVehicle']['category']
				)));
				$this->set('mk_options_addon2', $mk_options_addon2);
				$this->request->data['Contact']['make_addon2'] = $addonVehicles[1]['AddonVehicle']['make'];

				//YEAR SELECTION
				$this->request->data['Contact']['year_addon2'] = $addonVehicles[1]['AddonVehicle']['year'];
				if( $this->request->data['Contact']['model_id_addon2'] != '' ){
					$year_addon2_opt = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
						'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$addonVehicles[1]['AddonVehicle']['vehicle_selection_type'],
							'type'=> $addonVehicles[1]['AddonVehicle']['category'],
							'make'=> $this->request->data['Contact']['make_addon2'],
						 )));
				}else{
					$year_addon2_opt = array();
					$year_addon2_opt[0] = 'Any Year';
					for($i=date('Y')+1; $i>=1980; $i--){
						$year_addon2_opt[$i] = $i;
					}
				}
				$this->set('year_addon2_opt', $year_addon2_opt);

				//MODEL SELECTION
				$this->request->data['Contact']['model_id_addon2'] = $addonVehicles[1]['AddonVehicle']['model_id'];
				$this->request->data['Contact']['model_addon2'] = $addonVehicles[1]['AddonVehicle']['model'];
				$year_contact_addon2 = $this->request->data['Contact']['year_addon2'];
				$make_contact_addon2 = $this->request->data['Contact']['make_addon2'];

				$model_opt_withspace_addon2 = array();
				if($make_contact_addon2 != '' && $year_contact_addon2 != ''){
					$model_opt_withspace_addon2 = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
						'?'=>array('show_hidden' => true,
								'vehicle_selection_type'=>$addonVehicles[1]['AddonVehicle']['vehicle_selection_type'],
								'year' => $year_contact_addon2,
								'make' => $make_contact_addon2,
								'type' => $addonVehicles[1]['AddonVehicle']['category']
							)
					));
				}
				foreach($model_opt_withspace_addon2 as $key=>$value){
					$model_opt_addon2[ trim($key) ] = $value;
				}
				$this->set('model_opt_addon2', $model_opt_addon2);

				//CATEGORY SELECTION
				$this->request->data['Contact']['type_addon2'] = $addonVehicles[1]['AddonVehicle']['type'];
				$body_type_addon2 = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type' => $addonVehicles[1]['AddonVehicle']['vehicle_selection_type'],
					'type'=> $addonVehicles[1]['AddonVehicle']['category']  )));
				$this->set('body_type_addon2', $body_type_addon2);


				//CLASS SELECTION
				$this->request->data['Contact']['class_addon2'] = $addonVehicles[1]['AddonVehicle']['class'];
				$body_sub_type_options_addon2_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
					'vehicle_selection_type'=>$addonVehicles[1]['AddonVehicle']['vehicle_selection_type'],
					'type'=> $addonVehicles[1]['AddonVehicle']['category'],
					'category'=>$addonVehicles[1]['AddonVehicle']['type'],
				)));
				$body_sub_type_options_addon2 = array();
				foreach($body_sub_type_options_addon2_space as $key=>$value){
					$body_sub_type_options_addon2[trim($key)] = $value;
				}
				$this->set('body_sub_type_options_addon2', $body_sub_type_options_addon2);


				//Adjust empty category and class for In Stock Add-On Vehicle
				if($this->request->data['Contact']['vehicle_selection_type_addon2'] == 'In Stock' &&
					($this->request->data['Contact']['type_addon2'] == null ||  $this->request->data['Contact']['type_addon2'] == '' )
				){
					$this->request->data['Contact']['type_addon2'] = 'Any Category';
				}
				if($this->request->data['Contact']['vehicle_selection_type_addon2'] == 'In Stock' &&
					($this->request->data['Contact']['class_addon2'] == null ||  $this->request->data['Contact']['class_addon2'] == '' )
				){
					$this->request->data['Contact']['class_addon2'] = 'Any Class';
				}
			}
			//Add on vehicle end





			//Add on vehicle TRADE start
			$this->loadModel('AddonTradeVehicle');
			$this->AddonTradeVehicle->bindModel(array(
				'belongsTo'=>array('Category'=>array(
					'foreignKey'=>false,
					'conditions'=> array("AddonTradeVehicle.class = Category.id")
				)),
			));
			$addonTradeVehicles = $this->AddonTradeVehicle->find('all', array('conditions' => array('AddonTradeVehicle.contact_id'=>$id) ));
			$this->set('addonTradeVehicles', $addonTradeVehicles);

			//debug($addonVehicles);
			if(!empty($addonTradeVehicles[0])){
				$this->request->data['Contact']['id_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['id'];

				$this->request->data['Contact']['vehicle_selection_type_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'];
				$this->request->data['Contact']['condition_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['condition'];
				$this->request->data['Contact']['vin_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['vin'];
				$this->request->data['Contact']['stock_num_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['stock_num'];

				$this->request->data['Contact']['unit_value_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['unit_value'];
				$this->request->data['Contact']['engine_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['engine'];
				$this->request->data['Contact']['odometer_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['odometer'];
				$this->request->data['Contact']['unit_color_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['unit_color'];
				$this->request->data['Contact']['branch_location_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['branch_location'];


				//D_TYPE SELECTION
				$this->request->data['Contact']['category_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['category'];
				$d_type_options_addon1_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
					'?'=>array('show_hidden' => true,'vehicle_selection_type'=> $addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type']  )));
				$this->set('d_type_options_addon1_trade', $d_type_options_addon1_trade);

				//MAKE SELECTION
				$mk_options_addon1_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
					'?'=>array(
						'show_hidden' => true,
						'vehicle_selection_type' => $addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'] ,
						'type'=> $addonTradeVehicles[0]['AddonTradeVehicle']['category']
				)));
				$this->set('mk_options_addon1_trade', $mk_options_addon1_trade);
				$this->request->data['Contact']['make_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['make'];

				//YEAR SELECTION
				$this->request->data['Contact']['year_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['year'];
				if( $this->request->data['Contact']['model_addon1_trade'] != '' ){
					$year_addon1_trade_opt = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
						'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'],
							'type'=> $addonTradeVehicles[0]['AddonTradeVehicle']['category'],
							'make'=> $this->request->data['Contact']['make_addon1_trade'],
						 )));
				}else{
					$year_addon1_trade_opt = array();
					$year_addon1_trade_opt[0] = 'Any Year';
					for($i=date('Y')+1; $i>=1980; $i--){
						$year_addon1_trade_opt[$i] = $i;
					}
				}
				$this->set('year_addon1_trade_opt', $year_addon1_trade_opt);

				//MODEL SELECTION
				$this->request->data['Contact']['model_id_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['model_id'];
				$this->request->data['Contact']['model_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['model'];
				$year_contact_addon1_trade = $this->request->data['Contact']['year_addon1_trade'];
				$make_contact_addon1_trade = $this->request->data['Contact']['make_addon1_trade'];

				$model_opt_withspace_addon1_trade = array();
				if($make_contact_addon1_trade != '' && $year_contact_addon1_trade != ''){
					$model_opt_withspace_addon1_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
						'?'=>array(
								'show_hidden' => true,
								'vehicle_selection_type'=>$addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'],
								'year' => $year_contact_addon1_trade,
								'make' => $make_contact_addon1_trade,
								'type' => $addonTradeVehicles[0]['AddonTradeVehicle']['category']
							)
					));
				}
				foreach($model_opt_withspace_addon1_trade as $key=>$value){
					$model_opt_addon1_trade[ trim($key) ] = $value;
				}
				$this->set('model_opt_addon1_trade', $model_opt_addon1_trade);

				//CATEGORY SELECTION
				$this->request->data['Contact']['type_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['type'];
				$body_type_addon1_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type' => $addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'],
					'type'=> $addonTradeVehicles[0]['AddonTradeVehicle']['category']  )));
				$this->set('body_type_addon1_trade', $body_type_addon1_trade);


				//CLASS SELECTION
				$this->request->data['Contact']['class_addon1_trade'] = $addonTradeVehicles[0]['AddonTradeVehicle']['class'];
				$body_sub_type_options_addon1_trade_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
					'vehicle_selection_type'=>$addonTradeVehicles[0]['AddonTradeVehicle']['vehicle_selection_type'],
					'type'=> $addonTradeVehicles[0]['AddonTradeVehicle']['category'],
					'category'=>$addonTradeVehicles[0]['AddonTradeVehicle']['type'],
				)));
				$body_sub_type_options_addon1_trade = array();
				foreach($body_sub_type_options_addon1_trade_space as $key=>$value){
					$body_sub_type_options_addon1_trade[trim($key)] = $value;
				}
				$this->set('body_sub_type_options_addon1_trade', $body_sub_type_options_addon1_trade);


				//Adjust empty category and class for In Stock main vehicle
				if($this->request->data['Contact']['vehicle_selection_type_addon1_trade'] == 'In Stock' &&
					($this->request->data['Contact']['type_addon1_trade'] == null ||  $this->request->data['Contact']['type_addon1_trade'] == '' )
				){
					$this->request->data['Contact']['type_addon1_trade'] = 'Any Category';
				}
				if($this->request->data['Contact']['vehicle_selection_type_addon1_trade'] == 'In Stock' &&
					($this->request->data['Contact']['class_addon1_trade'] == null ||  $this->request->data['Contact']['class_addon1_trade'] == '' )
				){
					$this->request->data['Contact']['class_addon1_trade'] = 'Any Class';
				}


			}


			if(!empty($addonTradeVehicles[1])){

				$this->request->data['Contact']['id_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['id'];
				$this->request->data['Contact']['vehicle_selection_type_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'];
				$this->request->data['Contact']['condition_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['condition'];
				$this->request->data['Contact']['vin_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['vin'];
				$this->request->data['Contact']['stock_num_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['stock_num'];

				$this->request->data['Contact']['unit_value_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['unit_value'];
				$this->request->data['Contact']['engine_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['engine'];
				$this->request->data['Contact']['odometer_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['odometer'];
				$this->request->data['Contact']['unit_color_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['unit_color'];
				$this->request->data['Contact']['branch_location_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['branch_location'];


				//D_TYPE SELECTION
				$this->request->data['Contact']['category_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['category'];
				$d_type_options_addon2_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
					'?'=>array('show_hidden' => true,'vehicle_selection_type'=> $addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type']  )));
				$this->set('d_type_options_addon2_trade', $d_type_options_addon2_trade);

				//MAKE SELECTION
				$mk_options_addon2_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
					'?'=>array(
						'show_hidden' => true,
						'vehicle_selection_type' => $addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'] ,
						'type'=> $addonTradeVehicles[1]['AddonTradeVehicle']['category']
				)));
				$this->set('mk_options_addon2_trade', $mk_options_addon2_trade);
				$this->request->data['Contact']['make_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['make'];

				//YEAR SELECTION
				$this->request->data['Contact']['year_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['year'];
				if( $this->request->data['Contact']['model_id_addon2_trade'] != '' ){
					$year_addon2_trade_opt = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
						'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'],
							'type'=> $addonTradeVehicles[1]['AddonTradeVehicle']['category'],
							'make'=> $this->request->data['Contact']['make_addon2_trade'],
						 )));
				}else{
					$year_addon2_trade_opt = array();
					$year_addon2_trade_opt[0] = 'Any Year';
					for($i=date('Y')+1; $i>=1980; $i--){
						$year_addon2_trade_opt[$i] = $i;
					}
				}
				$this->set('year_addon2_trade_opt', $year_addon2_trade_opt);

				//MODEL SELECTION
				$this->request->data['Contact']['model_id_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['model_id'];
				$this->request->data['Contact']['model_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['model'];
				$year_contact_addon2_trade = $this->request->data['Contact']['year_addon2_trade'];
				$make_contact_addon2_trade = $this->request->data['Contact']['make_addon2_trade'];

				$model_opt_withspace_addon2_trade = array();
				if($make_contact_addon2_trade != '' && $year_contact_addon2_trade != ''){
					$model_opt_withspace_addon2_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
						'?'=>array(
								'show_hidden' => true,
								'vehicle_selection_type'=>$addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'],
								'year' => $year_contact_addon2_trade,
								'make' => $make_contact_addon2_trade,
								'type' => $addonTradeVehicles[1]['AddonTradeVehicle']['category']
							)
					));
				}
				foreach($model_opt_withspace_addon2_trade as $key=>$value){
					$model_opt_addon2_trade[ trim($key) ] = $value;
				}
				$this->set('model_opt_addon2_trade', $model_opt_addon2_trade);

				//CATEGORY SELECTION
				$this->request->data['Contact']['type_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['type'];
				$body_type_addon2_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type' => $addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'],
					'type'=> $addonTradeVehicles[1]['AddonTradeVehicle']['category']  )));
				$this->set('body_type_addon2_trade', $body_type_addon2_trade);


				//CLASS SELECTION
				$this->request->data['Contact']['class_addon2_trade'] = $addonTradeVehicles[1]['AddonTradeVehicle']['class'];
				$body_sub_type_options_addon2_trade_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
					'vehicle_selection_type'=>$addonTradeVehicles[1]['AddonTradeVehicle']['vehicle_selection_type'],
					'type'=> $addonVehicles[1]['AddonTradeVehicle']['category'],
					'category'=>$addonVehicles[1]['AddonTradeVehicle']['type'],
				)));
				$body_sub_type_options_addon2_trade = array();
				foreach($body_sub_type_options_addon2_trade_space as $key=>$value){
					$body_sub_type_options_addon2_trade[trim($key)] = $value;
				}
				$this->set('body_sub_type_options_addon2_trade', $body_sub_type_options_addon2_trade);



				//Adjust empty category and class for In Stock main vehicle
				if($this->request->data['Contact']['vehicle_selection_type_addon2_trade'] == 'In Stock' &&
					($this->request->data['Contact']['type_addon2_trade'] == null ||  $this->request->data['Contact']['type_addon2_trade'] == '' )
				){
					$this->request->data['Contact']['type_addon2_trade'] = 'Any Category';
				}
				if($this->request->data['Contact']['vehicle_selection_type_addon2_trade'] == 'In Stock' &&
					($this->request->data['Contact']['class_addon2_trade'] == null ||  $this->request->data['Contact']['class_addon2_trade'] == '' )
				){
					$this->request->data['Contact']['class_addon2_trade'] = 'Any Class';
				}

			}
			//Add on vehicle TRADE end

			//debug($this->request->data['Contact']);



        }

	  $this->set('follow_up_24', $follow_up_24);

		$params = array(
            'conditions' => array('History.contact_id' => $id),
            'fields' => array('History.*'),
			'order' => array('History.id DESC')
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);
		$this->set('eventTypes', $this->EventType->find('list', array('conditions'=>['OR' => ['EventType.dealer_id IS NULL', 'EventType.dealer_id'=>$this->Auth->user('dealer_id')]] , 'order'=>"EventType.id ASC")));
		//debug($history);
		//History Statuses
		$history_status = array();
		foreach($history as $h_status){
			$history_status[$h_status['History']['status']] = date("n/j/Y g:i A",strtotime($h_status['History']['created']));
		}
		$this->set('history_status', $history_status);



		//Get Top Statuses
		$top_leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.top_status ASC','conditions'=>array(
		'LeadStatus.active'=> 1,
		'LeadStatus.top_status <>'=> 0 ,'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$top_statuses = array();
		foreach($top_leadStatuses as $top_status){
			$top_statuses[ $top_status['LeadStatus']['header'] ][] = $top_status['LeadStatus']['name'];
		}
		//debug($top_statuses);


		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>array(
		'LeadStatus.active'=> 1,
		'LeadStatus.top_status'=> 0 ,'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']][] = $leadStatus['LeadStatus']['name'];
		}
		//$this->set('lead_status_options', $lead_status_options);
		/* sort statuses */
		$lead_status_options_sorted = array();
		foreach($lead_status_options as $key=>$value ){
			$items = $value;
			asort($items);
			$lead_status_options_sorted[$key] = $items;

			if( !empty($top_statuses[$key])){
				foreach($top_statuses[$key] as $ts ){
					array_unshift($lead_status_options_sorted[$key], $ts );
				}
			}
		}
		//debug($lead_status_options_sorted);
		$this->set('lead_status_options', $lead_status_options_sorted);




		//source options
		$this->loadModel('LeadSourcesHide');
		$lead_sources_hide = $this->LeadSourcesHide->find('list',array('conditions'=>array(
			'LeadSourcesHide.dealer_id'=> $this->Auth->user('dealer_id'),
		)));

		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('lead_sources_options', $lead_sources_options);

		//SalesStep options

		$sold_step = "";
		$this->loadModel('SalesStep');
		$step_cond = array();
		if($this->Auth->user('step_procces') == 'lemco_steps'){
			$step_cond = array('SalesStep.step_process'=>'lemco_steps');
		}else{
			$step_cond = array('SalesStep.step_process'=>'hd_steps');
		}
		$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		$sales_step_options = array();
		foreach($sales_steps as $sales_step){
			$sales_step_options[ $sales_step['SalesStep']['step']  ] = $sales_step['SalesStep']['step'];

			//Get sold step to auto select status
			if($sales_step['SalesStep']['sold_step'] == 'sold'){
				$sold_step = $sales_step['SalesStep']['id'];
			}
		}
		//$this->set('sales_step_options', $sales_step_options);

		$this->set('sales_step_options',  $this->get_dealer_steps() );
		$this->set('sold_step', $sold_step);


		//Inventory Center
    $in_stock_settings = $this->requestAction("dealer_settings/get_settings/in-stock");
    $vehicle_selection_type_options = array('Showroom' => '&nbsp Catalog');
		if($in_stock_settings == 'On'){
			$vehicle_selection_type_options['In Stock'] = '&nbsp In Stock';
		}
		if($this->Auth->User('dealer_id') == '20020'){
			$vehicle_selection_type_options = array('Branch Inventory' => '&nbsp Branch Inventory',  'Showroom' => '&nbsp Catalog');
		}
		$this->set('vehicle_selection_type_options', $vehicle_selection_type_options);


		//D_TYPE SELECTION
		$d_type_options = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('show_hidden' => true,'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'] )));
		$this->set('d_type_options', $d_type_options);


		//MAKE SELECTION
		$mk_options = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
			'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'],  'type'=> $this->request->data['Contact']['category'])));
		$this->set('mk_options', $mk_options);

		// debug(array( $this->request->data['Contact']['vehicle_selection_type'],  $this->request->data['Contact']['category']));


		//YEAR SELECTION
		if( $this->request->data['Contact']['model_id'] != '' ){
			$year_opt = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
				'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'],
					'type'=> $this->request->data['Contact']['category'],
					'make'=> $this->request->data['Contact']['make'],
				 )));

			$year_opt_all = array();
			foreach($year_opt as $key => $value){
				$year_opt_all[ trim($key) ] = $value;
			}
			$year_opt = $year_opt_all;
		}else{
			$year_opt = array();
			$year_opt[0] = 'Any Year';
			for($i=date('Y')+1; $i>=1980; $i--){
				$year_opt[$i] = $i;
			}
		}
		$this->set('year_opt', $year_opt);

		//MODEL SELECTION
		$year_contact =  $this->request->data['Contact']['year'];
		$make_contact = $this->request->data['Contact']['make'];

		$model_opt_withspace = array();
		if($make_contact != '' && $year_contact != ''){
			$model_opt_withspace = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
				'?'=>array('show_hidden' => true,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'],
						'year'=>$year_contact,'make'=>$make_contact,
						'type' => $this->request->data['Contact']['category']
					)
			));
		}
		foreach($model_opt_withspace as $key=>$value){
			$model_opt[ trim($key) ] = $value;
		}
		$this->set('model_opt', $model_opt);

		//CATEGORY SELECTION
		$body_type = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
			'?'=>array('vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'],'type'=>$this->request->data['Contact']['category'])));
		$this->set('body_type', $body_type);


		//CLASS SELECTION
		$body_sub_type_options_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
			'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type'],
			'class'=>$this->request->data['Contact']['class'],
			'type'=> $this->request->data['Contact']['category'],
			'category'=>$this->request->data['Contact']['type'],
		)));
		$body_sub_type_options = array();
		foreach($body_sub_type_options_space as $key=>$value){
			$body_sub_type_options[trim($key)] = $value;
		}
		$this->set('body_sub_type_options', $body_sub_type_options);


		//Adjust empty category and class for In Stock main vehicle
		if($this->request->data['Contact']['vehicle_selection_type'] == 'In Stock' &&
			($this->request->data['Contact']['type'] == null ||  $this->request->data['Contact']['type'] == '' )
		){
			$this->request->data['Contact']['type'] = 'Any Category';
		}
		if($this->request->data['Contact']['vehicle_selection_type'] == 'In Stock' &&
			($this->request->data['Contact']['class'] == null ||  $this->request->data['Contact']['class'] == '' )
		){
			$this->request->data['Contact']['class'] = 'Any Class';
		}
		// debug($this->request->data['Contact']);

		//Get selected option
		$this->loadModel('Category');

		$d_type = $this->request->data['Contact']['category'];

		if($d_type == '' && $this->request->data['Contact']['make'] == 'Harley-Davidson'){
			$d_type = "Harley-Davidson";
			$this->request->data['Contact']['category'] = $d_type;
		}else if($d_type == '' && $this->request->data['Contact']['make'] != 'Harley-Davidson' ){
			$d_type = "Powersports";
			$this->request->data['Contact']['category'] = "Powersports";
		}


		$this->loadModel('Trim');





		//****************Inventory selection for import ***********************/
		$this->request->data['Contact']['condition'] = ucfirst(strtolower($this->request->data['Contact']['condition']));
		if($this->request->data['Contact']['import'] == "Y"){
			if($this->request->data['Contact']['class'] == 'ATV')
				$this->request->data['Contact']['type'] = "ATV";


			$year_opt = array();
			$year_opt[0] = 'Any Year';
			for($i=date('Y')+1; $i>=1980; $i--){
				$year_opt[$i] = $i;
			}
			$this->set('year_opt', $year_opt);

		}






		//Inventory Center Trade Values

		//D_TYPE SELECTION
		$d_type_options_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_d_type','return',
			'?'=>array('show_hidden' => true,'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'] )));
		$this->set('d_type_options_trade', $d_type_options_trade);

		//MAKE SELECTION
		$mk_options_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return',
			'?'=>array( 'show_hidden' => true,'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'],  'type'=> $this->request->data['Contact']['category_trade'])));
		$this->set('mk_options_trade', $mk_options_trade);

		//YEAR SELECTION
		if( $this->request->data['Contact']['model_id_trade'] != '' ){
			$year_opt_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return',
				'?'=>array('show_hidden' => true, 'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'],
					'type'=> $this->request->data['Contact']['category_trade'],
					'make'=> $this->request->data['Contact']['make_trade'],
				 )));
		}else{
			$year_opt_trade = array();
			$year_opt_trade[0] = 'Any Year';
			for($i=date('Y')+1; $i>=1980; $i--){
				$year_opt_trade[$i] = $i;
			}
		}
		$this->set('year_opt_trade', $year_opt_trade);

		//MODEL SELECTION
		$year_contact_trade =  $this->request->data['Contact']['year_trade'];
		$make_contact_trade = $this->request->data['Contact']['make_trade'];

		$model_opt_withspace_trade = array();
		if($make_contact_trade != '' && $year_contact_trade != ''){
			$model_opt_withspace_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return',
				'?'=>array('show_hidden' => true,
						'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'],
						'year'=>$year_contact_trade,'make'=>$make_contact_trade,
						'type' => $this->request->data['Contact']['category_trade']
					)
			));
		}
		foreach($model_opt_withspace_trade as $key=>$value){
			$model_opt_trade[ trim($key) ] = $value;
		}
		$this->set('model_opt_trade', $model_opt_trade);

		//CATEGORY SELECTION
		$body_type_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_classes_type','return',
			'?'=>array('vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'],'type'=>$this->request->data['Contact']['category_trade'])));
		$this->set('body_type_trade', $body_type_trade);

		//CLASS SELECTION
		$body_sub_type_options_trade_space = $this->requestAction(array('controller'=>'categories','action'=>'get_classes','return','?'=>array(
			'vehicle_selection_type'=>$this->request->data['Contact']['vehicle_selection_type_trade'],
			'class'=>$this->request->data['Contact']['class_trade'],
			'type'=> $this->request->data['Contact']['category_trade'],
			'category'=>$this->request->data['Contact']['type_trade'],
		)));
		$body_sub_type_options_trade = array();
		foreach($body_sub_type_options_trade_space as $key=>$value){
			$body_sub_type_options_trade[trim($key)] = $value;
		}
		$this->set('body_sub_type_options_trade', $body_sub_type_options_trade);

		//debug( $this->request->data['Contact'] );

		//Adjust empty category and class for In Stock main vehicle
		if($this->request->data['Contact']['vehicle_selection_type_trade'] == 'In Stock' &&
			($this->request->data['Contact']['type_trade'] == null ||  $this->request->data['Contact']['type_trade'] == '' )
		){
			$this->request->data['Contact']['type_trade'] = 'Any Category';
		}
		if($this->request->data['Contact']['vehicle_selection_type_trade'] == 'In Stock' &&
			($this->request->data['Contact']['class_trade'] == null ||  $this->request->data['Contact']['class_trade'] == '' )
		){
			$this->request->data['Contact']['class_trade'] = 'Any Class';
		}






		//Get Description and spec
		$specification = array();
		$description = "";
		if( $this->request->data['Contact']['model_id'] != ''){
			$this->loadModel('Specification');
			$this->loadModel('Trim');
			$this->loadModel('Description');
			$trim = $this->Trim->find("first", array('conditions'=>array('Trim.model_id'=>$this->request->data['Contact']['model_id'])));
			if(!empty($trim)){
				$specs = $this->Specification->find("first", array('conditions'=>array('Specification.trim_id'=> $trim['Trim']['id']  )));
				$specification = !empty($specs)? json_decode($specs['Specification']['attributes']) : "" ;
				$desc = $this->Description->find("first", array('conditions'=>array('Description.trim_id'=> $trim['Trim']['id']  )));
				$description = $desc['Description']['description'];
			}
		}
		$this->set('specification', $specification);
		$this->set('description', $description);


		//< vehicle inputs start >
		$this->set('PriceRangeOptions', $this->ContactStatus->PriceRangeNonRvOptions());
		$this->set('PriceRangeNonRvOptions', $this->ContactStatus->PriceRangeNonRvOptions());

		$this->set('FloorPlansOptions', $this->ContactStatus->FloorPlansOptions);
		$this->set('LengthOptions', $this->ContactStatus->LengthOptions);
		$this->set('WeightOptions', $this->ContactStatus->WeightOptions);
		$this->set('SleepsOptions', $this->ContactStatus->SleepsOptions);
		$this->set('FuelTypeOptions', $this->ContactStatus->FuelTypeOptions);
		//</ vehicle inputs end >

		$this->set('DncStatusOptions', $this->ContactStatus->DncStatusOptions);


		$dealer_id = $this->Auth->user('dealer_id');
		//Template List
		$this->loadModel('UserTemplate');
		$this->UserTemplate->virtualFields['model_id']='CONCAT("UserTemplate_",UserTemplate.id)';
		$userTemplates = $this->UserTemplate->find('list', array('conditions'=>array(
			'UserTemplate.dealer_id'=>$dealer_id,
			'UserTemplate.template_type'=>'customer'),
		'fields'=>array('UserTemplate.model_id','UserTemplate.template_title')));
		$this->set('userTemplates',$userTemplates);

		$this->loadModel("UserEmail");
		$smtp_settings = $this->UserEmail->get_setting("smtp", $this->Auth->user('id') );
   		if( $this->request->data['Contact']['email'] == '' ){
			$smtp_settings = array();
		}
   		$this->set("smtp_settings", $smtp_settings);

   		$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
		$this->set('email_settings', $email_settings);



                //for NPA API setting
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('NpaapiSetting');
                $npa_settings = $this->NpaapiSetting->find('first', array('conditions' => array('NpaapiSetting.dealer_id'=> $dealer_id)));
		$this->set(compact('npa_settings'));


    }
	public function editcontact($id = null) {
        $group_id = $this->Auth->user('group_id');
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Record not found'));
        }
        $contact = $this->Contact->read();
        if ($group_id == 2) {
            if ($this->Auth->user('dealer_id') != $contact['Contact']['company_id']) {
                $this->redirect('dashboards', 'index');
            }
        }
        $this->set('zone', $this->Auth->user('zone'));
        if ( $this->request->is('post')) {
            $old_data = $this->Contact->read();
            $history_data = array();
            $history_data['contact_id'] = $old_data['Contact']['id'];
            $history_data['sperson'] = $old_data['Contact']['sperson'];
            $history_data['cond'] = $old_data['Contact']['condition'];
            $history_data['year'] = $old_data['Contact']['year'];
            $history_data['make'] = $old_data['Contact']['make'];
            $history_data['model'] = $old_data['Contact']['model'];
            $history_data['type'] = $old_data['Contact']['type'];
            $history_data['sales_step'] = $old_data['Contact']['sales_step'];
            $history_data['status'] = $old_data['Contact']['status'];
            $history_data['created'] = $old_data['Contact']['created_full_date'];
            $history_data['modified'] = $old_data['Contact']['modified_full_date'];
            $history_data['comment'] = $old_data['Contact']['notes'];
            $history = array(
                'History' => $history_data
            );
            $this->History->save($history);
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('Contact data saved'), 'alert');
                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id=' . $id . '&fname=' . $this->request->data['Contact']['first_name'] . '&lname=' . $this->request->data['Contact']['last_name'] . '&email=' . $this->request->data['Contact']['email'] . '&phone=' . $this->request->data['Contact']['phone'] . '&mobile=' . $this->request->data['Contact']['mobile']);
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Unable to save changes'), 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contactstatuses = $this->ContactStatus->find('list');
            $this->set(compact('contactstatuses'));
            $this->request->data = $this->Contact->read();
        }
    }


    public function index($csvFile = null) {
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        $selected_type = "";
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
            $selected_type = $args['search_all'];
        }
        $this->set('searched', $searched);
        $this->set('selected_type', $selected_type);

        $current_user_id = $this->Auth->User('id');
        $this->Prg->commonProcess();
        //$this->Contact->recursive = 0;
        $this->passedArgs['user_id'] = $current_user_id;
        if ($group_id == 2) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.company_id' => $dealer_id,
                //'Contact.sales_step = Contact.sales_step',
            );
        } elseif ($group_id == 1) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                //'Contact.sales_step = Contact.sales_step',
                '1=1'
            );
        } elseif ($group_id == 3) {
            $conditions = array($this->Contact->parseCriteria($this->passedArgs),
                'Contact.user_id' => $current_user_id,
                //'Contact.sales_step = Contact.sales_step',
                '1 = 1'
            );
        }
        if ($csvFile) {
            $this->paginate = array(
                'conditions' => $conditions,
                'order' => array(
                    'Contact.sperson' => 'DESC',
                )
            );
            $this->request->params['named']['page'] = null;
        } else {
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => 5,
                'order' => array(
                    'Contact.id' => 'DESC'
                )
            );
        }
        $this->set('contacts', $this->Paginate());
    }

    public function import() {
        if ($this->request->is('POST')) {
            $records_count = $this->Contact->find('count');
            try {
                $allData = $this->Contact->importCSVdata($this->request->data['Contact']['CsvFile']['tmp_name']);
            } catch (Exception $e) {
                $import_errors = $this->Contact->getImportErrors();
                $this->set('import_errors', $import_errors);
                $this->Session->setFlash(__('Error Importing') . ' ' . $this->request->data['Contact']['CsvFile']['name'] . ', ' . __('column name mismatch.'));
                $this->redirect(array('action' => 'import'));
            }
            //test
            $dt = array(
                'Contact' => array('first_name' => 'imp_test4', 'contact_status_id' => 5)
            );

            if (!empty($allData)) {
                $result = $this->Contact->saveMany($allData, array('validate' => false, 'atomic' => false));
            }
            /*
              foreach ($allData as $theData) {
              if($theData['Contact']['contact_status_id']){
              $this->Contact->create();
              $this->Contact->save($dt);
              }
              //print_r($theData);

              }
             */
            $new_records_count = $this->Contact->find('count') - $records_count;
            if ($result === true) {
                $this->Session->setFlash(__('Successfully imported') . ' ' . $new_records_count . ' records from ' . $this->request->data['Contact']['CsvFile']['name']);
            } else if ($result === false) {
                $this->Session->setFlash(__('Successfully imported') . ' ' . $new_records_count . ' records from ' . $this->request->data['Contact']['CsvFile']['name']);
            } else {
                $ir = 1;
                $rows = '';
                foreach ($result as $r) {
                    if ($r['Contact'] == false)
                        $rows .= ', ' . $ir;
                    $ir++;
                }
                $this->Session->setFlash(__('Successfully imported') . ' ' . $new_records_count . ' records from ' . $this->request->data['Contact']['CsvFile']['name']) .
                        "\nRows" . $rows . __(' Could not be saved.');
            }
            $this->redirect(array('action' => 'index'));
        }
    }

    public function view($id = null) {
        $group_id = $this->Auth->user('group_id');
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Record not found'));
        }
        $contact = $this->Contact->read();
        $this->set('contact', $contact);
        $deals = $this->Deal->find('all', array(
            'limit' => 3,
            'conditions' => array(
                'Deal.contact_id' => $id
            )
                )
        );
        if ($group_id == 2) {
            if ($this->Auth->user('dealer_id') != $contact['Contact']['company_id']) {
                $this->redirect('dashboards', 'index');
            }
        }

        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
        }
        $this->set('deals', $deals);

        $this->Event->bindModel(array('hasOne' => array('ContactsEvent')), false);

        //$this->Event->Behaviors->load('Containable');

        $this->set('events', $this->Event->find('all', array(
                    'conditions' => array('ContactsEvent.contact_id' => $id),
                    'limit' => 10
                        )
                )
        );
    }

	 public function addcontact() {

        $contactstatuses = $this->ContactStatus->find('list');
        $this->set(compact('contactstatuses'));
        $this->set('zone', $this->Auth->user('zone'));
        if ($this->request->is('post')) {
            //print_r($this->request->data);die;
            $this->request->data['Contact']['user_id'] = $this->Auth->user('id');
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $uid = $this->Contact->getLastInsertId();
                $this->Session->setFlash(__('New contact added'), 'alert'); //print_r($this->request->data); exit;
                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id = ' . $uid . '&fname = ' . $this->request->data['Contact']['first_name'] . '&lname = ' . $this->request->data['Contact']['last_name'] . '&email = ' . $this->request->data['Contact']['email'] . '&phone = ' . $this->request->data['Contact']['phone'] . '&mobile = ' . $this->request->data['Contact']['mobile']);
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Unable to add log'), 'alert', array('class' => 'alert-error'));
            }
        }
    }

    public function add() {

        $contactstatuses = $this->ContactStatus->find('list');
        $this->set(compact('contactstatuses'));
        $this->set('zone', $this->Auth->user('zone'));
        if ($this->request->is('post')) {
            //print_r($this->request->data);die;
            $this->request->data['Contact']['user_id'] = $this->Auth->user('id');
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $uid = $this->Contact->getLastInsertId();
                $this->Session->setFlash(__('New contact added'), 'alert'); //print_r($this->request->data); exit;
                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id = ' . $uid . '&fname = ' . $this->request->data['Contact']['first_name'] . '&lname = ' . $this->request->data['Contact']['last_name'] . '&email = ' . $this->request->data['Contact']['email'] . '&phone = ' . $this->request->data['Contact']['phone'] . '&mobile = ' . $this->request->data['Contact']['mobile']);
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Unable to add log'), 'alert', array('class' => 'alert-error'));
            }
        }
    }

    public function edit($id = null) {
        $group_id = $this->Auth->user('group_id');
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Record not found'));
        }
        $contact = $this->Contact->read();
        if ($group_id == 2) {
            if ($this->Auth->user('dealer_id') != $contact['Contact']['company_id']) {
                $this->redirect('dashboards', 'index');
            }
        }
        $this->set('zone', $this->Auth->user('zone'));
        if ($this->request->is('post')) {
            $old_data = $this->Contact->read();
            $history_data = array();
            $history_data['contact_id'] = $old_data['Contact']['id'];
            $history_data['sperson'] = $old_data['Contact']['sperson'];
            $history_data['cond'] = $old_data['Contact']['condition'];
            $history_data['year'] = $old_data['Contact']['year'];
            $history_data['make'] = $old_data['Contact']['make'];
            $history_data['model'] = $old_data['Contact']['model'];
            $history_data['type'] = $old_data['Contact']['type'];
            $history_data['status'] = $old_data['Contact']['status'];
            $history_data['created'] = $old_data['Contact']['created_full_date'];
            $history_data['modified'] = $old_data['Contact']['modified_full_date'];
            $history_data['comment'] = $old_data['Contact']['notes'];
            $history = array(
                'History' => $history_data
            );
            $this->History->save($history);
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('Contact data saved'), 'alert');
                if (isset($this->request->data['set_event'])) {
                    $this->redirect('/full_calendar/events/add?id=' . $id . '&fname=' . $this->request->data['Contact']['first_name'] . '&lname=' . $this->request->data['Contact']['last_name'] . '&email=' . $this->request->data['Contact']['email'] . '&phone=' . $this->request->data['Contact']['phone'] . '&mobile=' . $this->request->data['Contact']['mobile']);
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Unable to save changes'), 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contactstatuses = $this->ContactStatus->find('list');
            $this->set(compact('contactstatuses'));
            $this->request->data = $this->Contact->read();
        }
    }

    public function delete($id = null) {
        $group_id = $this->Auth->user('group_id');
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Contact->id = $this->request->data['id']; //--
        $contact = $this->Contact->read();
        if ($group_id == 2) {
            if ($this->Auth->user('dealer_id') != $contact['Contact']['company_id']) {
                $this->redirect('dashboards', 'index');
            }
        }
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Record not found'));
        }
        $user_id = $this->Contact->read('Contact.user_id', $id);
        if ($user_id['Contact']['user_id'] == $this->Auth->user('id')) {
            if ($this->Contact->delete($id)) {
                $this->Session->setFlash(__('Contact deleted'), 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to delete'), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('Oops!Looks like you are not the owner of Contact. Only the user corresponding to the contact can delete it.'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
    }

     public function history($id = null) {
        $this->layout = "ajax";

        $params = array(
            'conditions' => array('History.contact_id' => $id),
            'fields' => array('History.*'),
        );
        $params1 = array(
            'conditions' => array('Contact.id' => $id),
            'fields' => array('Contact.first_name, Contact.last_name'),
        );
        $contact_name = $this->Contact->find('first', $params1);
        $history = $this->History->find('all', $params);
        $this->set('history', $history);
        $this->set('contact_name', $contact_name['Contact']['first_name'] . " " . $contact_name['Contact']['last_name']);
    }
	public function search_used_vehicle(){
		$conditons = array();
		if( $this->request->data['Inventory']['Year'] != '')
			$conditons['Inventory.Year'] = $this->request->data['Inventory']['Year'];
		if( $this->request->data['Inventory']['Make'] != '')
			$conditons['Inventory.Make'] = $this->request->data['Inventory']['Make'];
		if( $this->request->data['Inventory']['Model'] != '')
			$conditons['Inventory.Model'] = $this->request->data['Inventory']['Model'];

		$used_vehicles = $this->Inventory->find('all',array('conditions'=>$conditons));
		$this->set('used_vehicles', $used_vehicles);
	}
    public function used_vehicle_input($inventory_id = null){
		$this->layout='default_new';

   		$contactstatuses = $this->Inventory->find('list');
        $this->set(compact('contactstatuses'));
        $this->set('zone', $this->Auth->user('zone'));
        if ($this->request->is('post')) {
			if(!isset($this->request->params['pass'][0])){
				$this->Inventory->create();
			}
            if ($this->Inventory->save($this->request->data)) {
				$this->Session->setFlash(__('New vehical information updated'), 'alert');
				$this->redirect(array('action' => 'used_vehicle_input'));
            } else {
                $this->Session->setFlash(__('Unable to add vehical information'), 'alert', array('class' => 'alert-error'));
            }
        }else{
			if(isset($this->request->params['pass'][0])){
				$inventory = $this->Inventory->read(null, $inventory_id);
				$this->request->data['Inventory'] = $inventory['Inventory'];
			}
		}

		$conditons = array();
		if( isset($this->request->params['named']['Year']) &&  $this->request->params['named']['Year'] != ''){
			$conditons['Inventory.Year'] = $this->request->params['named']['Year'];
			$this->request->data['Inventory2']['Year'] = $this->request->params['named']['Year'];
		}
		if( isset($this->request->params['named']['Make']) &&  $this->request->params['named']['Make'] != ''){
			$conditons['Inventory.Make'] =$this->request->params['named']['Make'];
			$this->request->data['Inventory2']['Make'] = $this->request->params['named']['Make'];
		}
		if( isset($this->request->params['named']['Type']) &&  $this->request->params['named']['Type'] != ''){
			$conditons['Inventory.Type'] = $this->request->params['named']['Type'];
			$this->request->data['Inventory2']['Type'] = $this->request->params['named']['Type'];
		}
		//$used_vehicles = $this->Inventory->find('all',array('conditions'=>$conditons));


		$this->paginate = array(
			'conditions' => $conditons,
			'limit'=>40
		);
		$used_vehicles = $this->paginate('Inventory');
		$this->set('used_vehicles', $used_vehicles);


    }
	public function get_used_vehicle($inventory_id){
		$used_vehicle = $this->Inventory->read(null, $inventory_id);
		$this->autoRender = false;
		echo json_encode($used_vehicle);
	}

	public function search_oem_vehicle(){
		$conditons = array();
		if( $this->request->data['InventoryOem']['Year'] != '')
			$conditons['InventoryOem.Year'] = $this->request->data['InventoryOem']['Year'];
		if( $this->request->data['InventoryOem']['Make'] != '')
			$conditons['InventoryOem.Make'] = $this->request->data['InventoryOem']['Make'];
		if( $this->request->data['Inventory']['Model'] != '')
			$conditons['InventoryOem.Model'] = $this->request->data['InventoryOem']['Model'];

		$oem_vehicles = $this->InventoryOem->find('all',array('conditions'=>$conditons));
		$this->set('oem_vehicles', $oem_vehicles);
	}

	public function search_trade_vehicle(){
		$conditons = array();
		if( $this->request->data['InventoryOem']['Year'] != '')
			$conditons['InventoryOem.Year'] = $this->request->data['InventoryOem']['Year'];
		if( $this->request->data['InventoryOem']['Make'] != '')
			$conditons['InventoryOem.Make'] = $this->request->data['InventoryOem']['Make'];
		if( $this->request->data['Inventory']['Model'] != '')
			$conditons['InventoryOem.Model'] = $this->request->data['InventoryOem']['Model'];

		$oem_vehicles = $this->InventoryOem->find('all',array('conditions'=>$conditons));
		$this->set('oem_vehicles', $oem_vehicles);
	}

	public function oem_vehicle_delete($id = null) {

		$this->InventoryOem->id = $id;
		if (!$this->InventoryOem->exists()) {
			throw new NotFoundException(__('Invalid Vehicle'));
		}
		if ($this->InventoryOem->delete()) {
			$this->Session->setFlash(__('Vehicle deleted'), 'alert');
			$this->redirect(array('controller'=>'contacts','action' => 'oem_vehicle_input'));
		}
		$this->Session->setFlash(__('Vehicle was not deleted'), 'alert',  array('class' => 'alert-error'));
		$this->redirect(array('controller'=>'contacts','action' => 'oem_vehicle_input'));
	}

    public function oem_vehicle_input($inventory_oem_id = null){

    	//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user


		$this->layout = 'admin_default';
        $this->set('zone', $this->Auth->user('zone'));

        if ($this->request->is('post')) {

			$pool_list = $this->getDbPoolList();
			foreach($pool_list as $pool_id){
				$conn_name = $this->set_pool_connection($pool_id);
				$this->InventoryOem->setDataSource($conn_name);
				if(!isset($this->request->params['pass'][0])){
					$this->InventoryOem->create();
				}
				if ($this->InventoryOem->save($this->request->data)) {
					$this->Session->setFlash(__('OEM Vehical information saved'), 'alert'); //print_r($this->request->data); exit;
				} else {
					$this->Session->setFlash(__('Unable to add OEM Vehical information'), 'alert', array('class' => 'alert-error'));
				}
			}

			$this->redirect(array('action' => 'oem_vehicle_input'));
        }else{
			if(isset($this->request->params['pass'][0])){
				$InventoryOem = $this->InventoryOem->read(null, $inventory_oem_id);
				$this->request->data['InventoryOem'] = $InventoryOem['InventoryOem'];
			}
		}

		$conditons = array();
		if( isset($this->request->params['named']['Year']) &&  $this->request->params['named']['Year'] != ''){
			$conditons['InventoryOem.Year'] = $this->request->params['named']['Year'];
			$this->request->data['InventoryOem2']['Year'] = $this->request->params['named']['Year'];
		}
		if( isset($this->request->params['named']['Make']) &&  $this->request->params['named']['Make'] != ''){
			$conditons['InventoryOem.Make'] =$this->request->params['named']['Make'];
			$this->request->data['InventoryOem2']['Make'] = $this->request->params['named']['Make'];
		}
		if( isset($this->request->params['named']['Type']) &&  $this->request->params['named']['Type'] != ''){
			$conditons['InventoryOem.Type'] = $this->request->params['named']['Type'];
			$this->request->data['InventoryOem2']['Type'] = $this->request->params['named']['Type'];
		}
		$this->paginate = array(
			'conditions' => $conditons,
			'limit'=>40
		);
		$oem_vehicles = $this->paginate('InventoryOem');
		$this->set('oem_vehicles', $oem_vehicles);
		//debug($oem_vehicles);
    }
	public function get_oem_vehicle($inventoryOem_id){
		$oem_vehicle = $this->InventoryOem->read(null, $inventoryOem_id);
		$this->autoRender = false;
		echo json_encode($oem_vehicle);
	}


	public function get_emaildetail(){
		$this->autoRender = false;



		// configure your imap mailboxes
		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				'username'     => 'dealerweblead@gmail.com',
				'password'     => '4756ty3663'
				//'username' 	=> 'developerweb6@gmail.com',
				//'password' 	=> 'abhi1234'
			),
		);


	 	if (!count($mailboxes)) {
			echo '<p>Please configure at least one IMAP mailbox.</p>';
	 	}
	 	else {

			foreach ($mailboxes as $current_mailbox) {

				echo '<h2>'.$current_mailbox['label'].'</h2>';

				if (!$current_mailbox['enable']) {
					echo '<p>This mailbox is disabled.</p>';

				}
				else {

					// Open an IMAP stream to our mailbox
					$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);

					$numMessages = imap_num_msg($imap);
					for ($i = $numMessages; $i > 0 ; $i--) {

						$header = imap_header($imap, $i);
						$fromInfo = $header->from[0];
						$replyInfo = $header->reply_to[0];

						$details = array(
							"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
								? $fromInfo->mailbox . "@" . $fromInfo->host : "",
							"fromName" => (isset($fromInfo->personal))
								? $fromInfo->personal : "",
							"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
								? $replyInfo->mailbox . "@" . $replyInfo->host : "",
							"replyName" => (isset($replyTo->personal))
								? $replyto->personal : "",
							"subject" => (isset($header->subject))
								? $header->subject : "",
							"udate" => (isset($header->udate))
								? $header->udate : ""
						);

						$uid = imap_uid($imap, $i);
						$body = $this->getBody( $uid , $imap );

						//preg_match_all( '/<adf>(.*?)<\/adf>/s', $body, $matches );

						preg_match_all( '/&lt;adf&gt;(.*?)&lt;\/adf&gt;/s', $body, $matches );

						$arr[0][0] = 'requestdate';
						$arr[0][1] = 'requestdate';
						$arr[0][2] = 'requestdate';

						$arr[1][0] = 'name part="first"';
						$arr[1][1] = 'name';
						$arr[1][2] = 'fname';

						$arr[2][0] = 'name part="last"';
						$arr[2][1] = 'name';
						$arr[2][2] = 'lname';

						$arr[3][0] = 'phone type="voice" time="day"';
						$arr[3][1] = 'phone';
						$arr[3][2] = 'phoneday';

						$arr[4][0] = 'phone type="voice" time="evening"';
						$arr[4][1] = 'phone';
						$arr[4][2] = 'evening';

						$arr[5][0] = 'phone type="cellphone"';
						$arr[5][1] = 'phone';
						$arr[5][2] = 'cellphone';

						$arr[6][0] = 'email';
						$arr[6][1] = 'email';
						$arr[6][2] = 'email';

						$arr[7][0] = 'comments';
						$arr[7][1] = 'comments';
						$arr[7][2] = 'comments';

						$arr[8][0] = 'year';
						$arr[8][1] = 'year';
						$arr[8][2] = 'year';

						$arr[9][0] = 'make';
						$arr[9][1] = 'make';
						$arr[9][2] = 'make';

						$arr[10][0] = 'model';
						$arr[10][1] = 'model';
						$arr[10][2] = 'model';

						$arr[11][0] = 'stock';
						$arr[11][1] = 'stock';
						$arr[11][2] = 'stock';

						$arr[12][0] = 'vin';
						$arr[12][1] = 'vin';
						$arr[12][2] = 'vin';

						$arr[13][0] = 'vendorname';
						$arr[13][1] = 'vendorname';
						$arr[13][2] = 'vendorname';

						$arr[14][0] = 'phone';
						$arr[14][1] = 'phone';
						$arr[14][2] = 'phone';

						$arr[15][0] = 'street line="1"';
						$arr[15][1] = 'street';
						$arr[15][2] = 'street';

						$arr[16][0] = 'city';
						$arr[16][1] = 'city';
						$arr[16][2] = 'city';

						$arr[17][0] = 'regioncode';
						$arr[17][1] = 'regioncode';
						$arr[17][2] = 'regioncode';

						$arr[18][0] = 'postalcode';
						$arr[18][1] = 'postalcode';
						$arr[18][2] = 'postalcode';

						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';

						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';

						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';

						$arr[20][0] = 'id';
						$arr[20][1] = 'id';
						$arr[20][2] = 'provider_id';

						$arr[21][0] = 'service';
						$arr[21][1] = 'service';
						$arr[21][2] = 'provider_service';

						$arr[22][0] = 'dealix';
						$arr[22][1] = 'dealix';
						$arr[22][2] = 'provider_dealix';

						$arr[23][0] = 'url';
						$arr[23][1] = 'url';
						$arr[23][2] = 'provider_url';

						$arr[24][0] = 'name sequence="1" part="full"';
						$arr[24][1] = 'name';
						$arr[24][2] = 'provider_name';

						$arr[25][0] = 'name part="full"';
						$arr[25][1] = 'name';
						$arr[25][2] = 'contact_name';

						$arr[26][0] = 'phone';
						$arr[26][1] = 'phone';
						$arr[26][2] = 'contact_phone';


						for($z=0 ; $z < count($matches[0]) ; $z++ ) {

							echo $str  = $matches[0][$z];
							echo '<br><br><br>';

							$str = str_replace("&lt;", "<", $str);
							$str = str_replace("&gt;", ">", $str);
							$str = str_replace('&quot;', '"' , $str);
							for($x=0 ; $x < count($arr) ; $x++ ) {
								$ret[$arr[$x][2]] = $this->getdata( $arr[$x][0] , $arr[$x][1] , $str );
							}

							$cond = array( 'Contact.created' => $ret['requestdate'] );
							$contact = $this->Contact->find('first',array('conditions' => $cond,'fields'=> array('Contact.*' )));

							if(!count($contact)) {

								$cond = array( 'User.dealer_id' => $ret['provider_id'] ,  'User.username' => $ret['provider_service']  );
								$user_dtl = $this->User->find('first',array('conditions' => $cond,'fields'=> array('User.*' )));

								$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `sperson` , `company_id` ) values("'.$ret['fname'].'" , "'.$ret['lname'].'" , "'.$ret['requestdate'].'" ,  "'.$ret['requestdate'].'" ,  "'.$ret['evening'].'" ,  "'.$ret['cellphone'].'" , "'.$ret['email'].'"  , "'.$ret['year'].'" , "'.$ret['make'].'" ,  "'.$ret['model'].'"  , "'.$ret['stock'].'" , "'.$ret['vin'].'" ,  "'.$ret['vendorname'].'" , "Website" , "'.$ret['street'].'" , "'.$ret['city'].'", "'.$ret['regioncode'].'", "'.$ret['postalcode'].'" , "Web Lead"  , "5" , "0" , "Open" , "'.$ret['provider_service'].'" , "'.$user_dtl['User']['id'].'" )');
							}

						}


					}




				}
			}
		}
	}








	public function get_plainemaildetail(){

		$this->autoRender = false;

		// configure your imap mailboxes
		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				//'username'     => 'dealerweblead@gmail.com',
				//'password'     => '4756ty3663'
				'username' 	=> 'developerweb6@gmail.com',
				'password' 	=> 'abhi1234'
			),
		);


	 	if (!count($mailboxes)) {
			echo '<p>Please configure at least one IMAP mailbox.</p>';
	 	}
	 	else {

			foreach ($mailboxes as $current_mailbox) {

				echo '<h2>'.$current_mailbox['label'].'</h2>';

				if (!$current_mailbox['enable']) {
					echo '<p>This mailbox is disabled.</p>';

				}
				else {

					// Open an IMAP stream to our mailbox
					$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);

					$numMessages = imap_num_msg($imap);
					for ($i = $numMessages; $i > 0 ; $i--) {

						$header = imap_header($imap, $i);
						$fromInfo = $header->from[0];
						$replyInfo = $header->reply_to[0];

						$details = array(
							"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
								? $fromInfo->mailbox . "@" . $fromInfo->host : "",
							"fromName" => (isset($fromInfo->personal))
								? $fromInfo->personal : "",
							"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
								? $replyInfo->mailbox . "@" . $replyInfo->host : "",
							"replyName" => (isset($replyTo->personal))
								? $replyto->personal : "",
							"subject" => (isset($header->subject))
								? $header->subject : "",
							"udate" => (isset($header->udate))
								? $header->udate : ""
						);

						$uid = imap_uid($imap, $i);
						$body = $this->getBody( $uid , $imap );

						$find  = 'VEHICLE INFO';
						$find2  = 'LEAD CONTACT INFO';

						$pos  = strpos($body , $find);
						$pos2 = strpos($body , $find);

						if ( ($pos !== false) &&  ($pos2 !== false) ) {

							$arr[0]['start'] = 'VEHICLE INFO';
							$arr[0]['end'] = 'Ad ID:';
							$arr[0]['lbl'] = 'vh_dtl';

							$arr[1]['start'] = 'Ad ID:';
							$arr[1]['end'] = 'LEAD CONTACT INFO';
							$arr[1]['lbl'] = 'ad_id';

							$arr[2]['start'] = 'Name:';
							$arr[2]['end'] = 'Email';
							$arr[2]['lbl'] = 'name';

							$arr[3]['start'] = 'Email:';
							$arr[3]['end'] = 'Comments';
							$arr[3]['lbl'] = 'email';

							$arr[4]['start'] = 'Comments:';
							$arr[4]['end'] = 'Type';
							$arr[4]['lbl'] = 'comments';

							$arr[5]['start'] = 'Make:';
							$arr[5]['end'] = 'Model';
							$arr[5]['lbl'] = 'make';

							$arr[6]['start'] = 'Model:';
							$arr[6]['end'] = 'Year';
							$arr[6]['lbl'] = 'model';

							$arr[7]['start'] = 'Year:';
							$arr[7]['end'] = 'Best time to call:';
							$arr[7]['lbl'] = 'year';

							$arr[8]['start'] = 'Best time to call';
							$arr[8]['end'] = 'StockNumber';
							$arr[8]['lbl'] = 'best_time';

							$arr[9]['start'] = 'StockNumber';
							$arr[9]['end'] = 'Thank';
							$arr[9]['lbl'] = 'stockNumber';





							for($x=0 ; $x < count($arr) ; $x++ ) {
								$ret[$arr[$x]['lbl']] = $this->getplaindata( $arr[$x]['start'] , $arr[$x]['end'] , $body );
							}
							print_r($ret);
							echo 'hoiiiiiiii';
						}


					}
				}
			}
		}
	}


	function getplaindata( $start_tag , $tag , $str ) {
		preg_match( '/'.$start_tag.'(.*?)'.$tag.'/s', $str, $matches );
		$str = $matches[0];
		$str = str_replace($start_tag , '' , $str);
		$str = str_replace($tag , '' , $str);
		$str = str_replace('&nbsp;' , '' , $str);
		return strip_tags($str);
	}



	function getdata( $start_tag , $tag , $str ) {
		preg_match( '/<'.$start_tag.'(.*?)<\/'.$tag.'>/s', $str, $matches );
		return strip_tags($matches[0]);
	}


	function getBody($uid, $imap) {
	    $body = $this->get_part($imap, $uid, "TEXT/HTML");
    	// if HTML body is empty, try getting text body
    	if ($body == "") {
        	$body = $this->get_part($imap, $uid, "TEXT/PLAIN");
   		}
    	return $body;
	}



	function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
		if (!$structure) {
			   $structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if ($structure) {
			if ($mimetype == $this->get_mime_type($structure)) {
				if (!$partNumber) {
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3: return imap_base64($text);
					case 4: return imap_qprint($text);
					default: return $text;
			   }
		   }

			// multipart
			if ($structure->type == 1) {
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = "";
					if ($partNumber) {
						$prefix = $partNumber . ".";
					}
					$data = $this->get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
					if ($data) {
						return $data;
					}
				}
			}
		}
		return false;
	}



	function get_mime_type($structure) {
		$primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

		if ($structure->subtype) {
			  return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
		}
		return "TEXT/PLAIN";
	}

	public function lead_score($contact_id=null)
	{
		//$this->layout='default_worksheet2';
		$dealer_id=$this->Auth->user('dealer_id');
		$user_id=$this->Auth->user('id');
		$timezone = $this->Auth->user('zone');
		//debug($timezone);
		date_default_timezone_set($timezone);

		$this->loadModel('ScoreSource');
		$this->loadModel('LeadScore');
		$this->loadModel('User');
		$this->loadModel('LeadSource');
		$score_sources=$this->ScoreSource->find('list',array('order'=>'ScoreSource.name','conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$lead_sources=$this->LeadSource->find('list',array('fields'=>'name,name','order'=>'name','conditions'=>array('dealer_id'=>array(0,$dealer_id))));

		if($this->request->is('post'))
		{
			if($this->LeadScore->save($this->request->data))
			{
				$contact_details=$this->Contact->findById($this->request->data['LeadScore']['contact_id']);
				$lead_score_id=$this->LeadScore->id;
				$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['LeadScore']['contact_id'];
				$history_data['cond'] = 			"Lead Score";
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			'Grade '.$this->request->data['LeadScore']['score'];
				$history_data['comment'] = 			$this->request->data['LeadScore']['details'];
				//$history_data['deal_id'] = 			'lead_score';
				$history_data['h_type'] = 			'Lead Score';
				$history_data['sales_step'] = 		$this->request->data['LeadScore']['location'];
				$history_data['sperson'] = 			$this->request->data['LeadScore']['sperson'];
				$history_data['modified']=    date('D - M d,Y h:i A');
				$history_data['created']=    date('Y-m-d H:i:s');
				$history_data['event_id'] = 		$lead_score_id;

				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);
				if($this->request->data['LeadScore']['crm_source_correct']=='no'&&$this->request->data['Contact']['source']!=$contact_details['Contact']['source']){
					$this->Contact->id=$contact_details['Contact']['id'];
					$this->Contact->saveField('source',$this->request->data['Contact']['source']);
				$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['LeadScore']['contact_id'];
				$history_data['cond'] = 			"Source changed by BDC";
				$history_data['user_id']=  			$this->Auth->user('id');
				$history_data['status'] = 			$contact_details['Contact']['source'];
				$history_data['comment'] = 			'Source changed by BDC';
				//$history_data['deal_id'] = 			'lead_score';
				$history_data['h_type'] = 			'Source Changed';
				$history_data['sales_step'] = 		$this->request->data['LeadScore']['location'];
				$history_data['sperson'] = 			$this->request->data['LeadScore']['sperson'];
				$history_data['modified']=    date('D - M d,Y h:i A');
				$history_data['created']=    date('Y-m-d H:i:s');
				$history_data['event_id'] = 		$lead_score_id;

				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);

				}
				$this->loadModel('LeadScoreEmail');
				$recipients=$this->LeadScoreEmail->find('list',array('fields'=>'id,email','conditions'=>array('dealer_id'=>$dealer_id)));
				if(!empty($recipients))
				{
				try{
					$lead_data=$this->Contact->findById($this->request->data['LeadScore']['contact_id']);
					/*App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->config('sender');
					$email->from('sender@dp360crm.com');
					$email->viewVars(array('lead_data'=>$lead_data,'score'=>$this->request->data,'score_sources'=>$score_sources));

					$email->template('score_lead_email')
						->emailFormat('html')
						->subject('Lead Score')
						->from('sender@dp360crm.com')
						->to($recipients)
						->bcc(array('andrew@dp360crm.com','reports_all@dp360crm.com','andrew@dp360crm.com'))
						->send();*/

					$this->loadModel("QueueEmail");
					$this->QueueEmail->create_email_queue(
					"score_lead_email",
					'Lead Score',
					"sender",
					serialize(array('lead_data'=>$lead_data,'score'=>$this->request->data,'score_sources'=>$score_sources)),
					'sender@dp360crm.com',
					'score_lead_email',
					"sender@dp360crm.com",
					serialize($recipients),
					serialize(array('andrew@dp360crm.com','reports_all@dp360crm.com','andrew@dp360crm.com'))
				);


				} catch(Exception $e)
				{
					$e_message = 'Lead Score Error --' .  $e->getMessage(). "--- Time --". date('Y-m-d H:i:s') . "\n" ;				file_put_contents(APP.DS.'webroot'.DS.'leadscore_error_'.$dealer_id.'.txt',$e_message);
					die;
				}
			}


			$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['LeadScore']['contact_id']);
				$this->Session->setFlash(__('Lead Scored successfully'), 'alert');
				//$this->redirect(array('controller'=>'contacts','action'=>'leads_main'));

			}else
			{
				$this->Session->setFlash(__('Unable score lead'), 'alert', array('class' => 'alert-error'));
			}
			die;
		}

		$fields=array('Contact.id','Contact.user_id','Contact.sperson','Contact.notes');
		$contact_details=$this->Contact->findById($contact_id);
		//$spersons=$this->User->find('list',array('fields'=>'full_name,full_name','conditions'=>array('User.dealer_id'=>$dealer_id,'User.group_id'=>array(2,3,4,5,6))));

		$this->set(compact('score_sources','contact_details','dealer_id','user_id','lead_sources'));

	}

	public function view_lead_score($score_id=null)
	{
		$this->layout='default_worksheet2';
		if($score_id!=null)
		{
			$this->loadModel('LeadScore');
			$this->loadModel('ScoreSource');
			$score=$this->LeadScore->findById($score_id);
			$lead_data=$this->Contact->findById($score['LeadScore']['contact_id']);
			$source=$this->ScoreSource->findById($score['LeadScore']['source']);
			$this->set(compact('score','lead_data','source'));

		}else
		{
			die('Not Found');
		}


	}


        //searching data for XML API for CRM
        public function search_data_111(){

            $this->autoRender=false;
            $this->layout='';

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
				'Contact.stock_num',
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
				'Contact.company',
				'Contact.company_id',
				'Contact.lead_status',
				'Contact.status',
				'Contact.sales_step',
				'Contact.source',
				'Contact.chk_duplicate',
			);

            //$_POST['fname']='Steve';
//            $_POST['lname']='nnnn';
//            $_POST['email']='email';
//            $_POST['phone']='phone';
//            $_POST['mobile']='mobile';
//            $_POST['work']='work';
//            debug($_POST);
//            exit('test');
            $ok=0;
            if(!empty($_POST['fname'])){
			$conditions['Contact.first_name like'] = "%".$_POST['fname']."%";
                        $ok=1;
		}

            if(!empty($_POST['lname'])){
			$conditions['Contact.last_name like'] = "%".$_POST['lname']."%";
                        $ok=1;
		}
            if(!empty($_POST['email'])){
			$conditions['Contact.email'] = $_POST['email'];
                        $ok=1;
		}

            if(!empty($_POST['phone'])){
			$conditions['Contact.phone'] = $_POST['phone'];
                        $ok=1;
		}
            if(!empty($_POST['mobile'])){
			$conditions['Contact.mobile'] = $_POST['mobile'];
                        $ok=1;
		}
            if(!empty($_POST['work'])){
			$conditions['Contact.work_number'] = $_POST['work'];
                        $ok=1;
		}



//              $t=array('OR' => array(
//    array('Post.title LIKE' => '%one%'),
//    array('Post.title LIKE' => '%two%')
//));
//                          debug(array('OR'=>$conditions));
//                exit('test');
		if($ok==1){

    $results=$this->Contact->find('all',array('fields'=>$fields,'conditions' => array('OR'=>$conditions)));
    return $results;
    //debug($results);
//    $log = $this->User->getDataSource()->getLog(false, false);
//debug($log);
    //exit(test);
                }else{
             $results=array();
             return $results;
                }

        }

	private function _service_search_result($service_conditions = array())
	{
		$this->loadModel('ServiceLead');
		$dealer_id = $this->Auth->user('dealer_id');
		$service_conditions['ServiceLead.company_id'] = $dealer_id;
		$service_conditions[' ISNULL(ServiceLead.contact_id)']=1;
		$service_conditions['ServiceLead.modified >='] = date("Y-m-d 00:00:00", strtotime('-90 day'));
		$fields = array('ServiceLead.id','ServiceLead.company_id','ServiceLead.first_name','ServiceLead.last_name','ServiceLead.mobile','ServiceLead.phone','ServiceLead.work_number','ServiceLead.modified','ServiceLead.year','ServiceLead.make','ServiceLead.model','ServiceLead.stock_num','ServiceLead.email');
		$service_result = $this->ServiceLead->find('all',array('fields' => $fields,'conditions' => $service_conditions));
		$contacts_clean = array();
		foreach($service_result as $contacts_shoppe){
			$contacts_shoppe['ServiceLead']['modified'] = date('m/d/Y g:i A', strtotime($contacts_shoppe['ServiceLead']['modified']));
			$contacts_shoppe['ServiceLead']['mobile'] = $this->format_phone($contacts_shoppe['ServiceLead']['mobile']);
			$contacts_shoppe['ServiceLead']['phone'] = $this->format_phone($contacts_shoppe['ServiceLead']['phone']);
			$contacts_shoppe['ServiceLead']['work_number'] = $this->format_phone($contacts_shoppe['ServiceLead']['work_number']);
			$contacts_clean[] = $contacts_shoppe;
		}
		return $contacts_clean;

	}

	private function _lightspeed_search_result($conditions = array())
	{
		$this->loadModel('AdpCustomer');
		$dealer_id = $this->Auth->user('dealer_id');
		$conditions['AdpCustomer.dealer_id'] = $dealer_id;
		$conditions['AdpCustomer.modified >='] = date("Y-m-d 00:00:00", strtotime('-90 day'));
		$fields = array('AdpCustomer.id','AdpCustomer.dealer_id','AdpCustomer.first_name','AdpCustomer.last_name','AdpCustomer.mobile','AdpCustomer.home_phone','AdpCustomer.work_phone','AdpCustomer.modified','AdpCustomer.email','AdpCustomer.parts_deptt','AdpCustomer.service_deptt','AdpCustomer.sales_deptt');
		$lightspeed_result = $this->AdpCustomer->find('all',array('fields' => $fields,'conditions' => $conditions));
		$contacts_clean = array();
		foreach($lightspeed_result as $contacts_shoppe){
			$lead_source = array();
			$contacts_shoppe['AdpCustomer']['modified'] = date('m/d/Y g:i A', strtotime($contacts_shoppe['AdpCustomer']['modified']));
			$contacts_shoppe['AdpCustomer']['mobile'] = $this->format_phone($contacts_shoppe['AdpCustomer']['mobile']);
			$contacts_shoppe['AdpCustomer']['phone'] = $this->format_phone($contacts_shoppe['AdpCustomer']['home_phone']);
			$contacts_shoppe['AdpCustomer']['work_number'] = $this->format_phone($contacts_shoppe['AdpCustomer']['work_phone']);
			if($contacts_shoppe['AdpCustomer']['service_deptt'])
			{
				$lead_source[] = 'Service Dept';
			}
			if($contacts_shoppe['AdpCustomer']['parts_deptt'])
			{
				$lead_source[] = 'Parts Dept';
			}
			if($contacts_shoppe['AdpCustomer']['sales_deptt'])
			{
				$lead_source[] = 'Sales Dept';
			}
			$contacts_shoppe['AdpCustomer']['lead_source'] = implode(',',$lead_source);
			$contacts_clean[] = $contacts_shoppe;
		}
		return $contacts_clean;

	}

	/* Funtion to create ics file and return status */
	function create_ics($ics_filename,$start,$end,$title,$description){
		$start = is_numeric($start)?date('Y-m-d H:i:s',$start):$start;
    //$timezone = new DateTime();
    //$timezone->setTimeZone(new DateTimeZone($this->Auth->user('zone')));
    //$timezone->format('T');
    $start = new DateTime($start, new DateTimeZone($this->Auth->user('zone')));
    $start->setTimezone(new DateTimeZone('UTC'));
		$end = is_numeric($end)?date('Y-m-d H:i:s',$end):$end;
    $end = new DateTime($end, new DateTimeZone($this->Auth->user('zone')));
    $end->setTimezone(new DateTimeZone('UTC'));
		$folder_path = WWW_ROOT.'files/ics/';
		$file_path = $folder_path.$ics_filename;
		if (file_exists($file_path)) {
			$file_name = basename($ics_filename, ".ics");
			$renewed_name = $file_name.'_'.time().'.ics';
			rename($file_path, $folder_path.$renewed_name);
		}
	    $data   	=   "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:".$start->format('Ymd\THis\Z')."\nDTEND:".$end->format('Ymd\THis\Z')."\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:".date("Ymd\THis\Z")."\nSUMMARY:".$title."\nDESCRIPTION:".$description."\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";

	    try {
	    	file_put_contents($file_path,$data);
	    	return $file_path;
	    } catch (Exception $e) {
	    	return '';
	    }

	}



}
