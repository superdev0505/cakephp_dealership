<?php

ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');
require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';
use Aws\S3\S3Client;

class ContactsManageController extends AppController {

    public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
    public $components = array('RequestHandler');

	public function beforeFilter() {       	
		parent::beforeFilter();        
    }

    public function remove_additional_contact(){
    	$this->loadModel('AdditionalContact');
    	$add_id	= $this->request->data['addid'];
    	$this->AdditionalContact->id = $add_id;
    	$this->AdditionalContact->delete();

    	$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['contactid']);

    	$this->autoRender = false;
    }

    public function history_comment() {
    	$history_id = $this->request->query['history_id'];
    	$params = array(
            'conditions' => array('History.id' => $history_id),
        );
        $histories = $this->History->find('first', $params);
        echo '<div style="overflow: auto; position: relative;" >'.$histories['History']['comment']."</div>" ;
        $this->autoRender = false;
	}
	public function contact_comment() {
    	$contact_id = $this->request->query['contact_id'];
    	$params = array(
    		'recursive' => -1,
    		'fields' => array('Contact.id','Contact.notes'),
            'conditions' => array('Contact.id' => $contact_id),
        );

        $contact = $this->Contact->find('first', $params);
        echo '<div style="overflow: auto; position: relative;" >'.nl2br($contact['Contact']['notes'])."</div>" ;
        $this->autoRender = false;
	}

    public function load_history($contact_id){

    	$params = array(
            'conditions' => array('History.contact_id' => $contact_id),
			'order' => array('History.created DESC'),
        );
        $histories = $this->History->find('all', $params);
    	//debug($histories);
    	$this->set('histories', $histories);
    	$this->set('contact_id', $contact_id);

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


    public function load_history_other($contact_id){

    	$this->set('contact_id', $contact_id);

    	$params = array(
            'conditions' => array(     'History.contact_id' => $contact_id),
            'fields' => array('History.*'),
			'order' => array('History.created DESC'),
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);

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
        	'DNC'=>'list',
        	'MGR Check'=>'check',
        );


        $history_ar = array();
       // debug($history);
        foreach ($history as $his) {

        	$duplicate_key = $this->check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
        	if( $duplicate_key === false  ){
        		$history_ar[ trim($his['History']['h_type']) ][] = $his;
        	}
        }
		//debug($history_ar);

		$this->set('history_ar', $history_ar);
		$this->set('history_types', $history_types);













    }

    public function set_event_completed($contact_id,$new_event = false){

    	date_default_timezone_set( $this->Auth->user('zone') );
		$datetimetext = date('Y-m-d H:i:s');

    	$events = $this->Event->find('all', array('recursive'=>-1, 'conditions'=>array(
    		'Event.contact_id' => $contact_id,
    		'Event.status <>' => array('Completed','Canceled')
    	)));
    	//debug($events);
    	foreach($events as $event){
    		$this->Event->updateAll(
				array(
					'Event.status' => "'Completed'",
					'Event.modified' => "'".$datetimetext."'",
				),
				array('Event.id' => $event['Event']['id'])
			);

			//History Entry
			$old_data = $event;
			$history_data = array();
			$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
			$history_data['event_id'] = 			$old_data['Event']['id'];
			$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
			$history_data['make'] = 				$old_data['EventType']['name'];
			$history_data['model'] = 				date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
			$history_data['status'] = 				"Completed";
			if(!$new_event)
			$history_data['comment'] = 				"Event completed due to being closed lead - ".$old_data['Event']['details'];
			else
			$history_data['comment'] = 				"Event completed due to new event scheduled - ".$old_data['Event']['details'];
			$history_data['notes'] = 				$old_data['Event']['title'];
			$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($datetimetext));
			$history_data['created'] = 				$datetimetext;
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

    	}
    	$this->AutoRender = false;
    }

    private function __check_sold_status($status){

    	$this->loadModel("LeadStatus");
    	$leadStatuses = $this->LeadStatus->find('first',array('conditions'=>array('LeadStatus.name'=>$status)));
    	$hd = $leadStatuses['LeadStatus']['header'];
    	//debug($hd);
    	if($hd == 'Sold Deal (Closed)' || $hd == 'Sold FollowUp In (Closed)' || $hd == 'Sold FollowUp Out (Closed)' || $hd == 'Sold Pick-Up (Closed)'){
    		return 'sold';
    	}else{
    		return 'not_sold';
    	}
    	//Status options
    	/*
		$this->loadModel("LeadStatus");
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>$status_condition));

		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['LeadStatus']['header']][] = $leadStatus['LeadStatus']['name'];
		}
		//$this->set('lead_status_options', $lead_status_options);
		$lead_status_options_sorted = array();
		foreach($lead_status_options as $key=>$value ){
			$items = $value;
			asort($items);
			$lead_status_options_sorted[$key] = $items;
		}
		*/

    }


   	public function note_status_update($contact_id){


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

   		$update_type = $this->request->query['update_type'];
   		$this->set('update_type', $update_type);

		$this->loadModel('SetCcBccDefaultEmail');
		$SetCcBccDefaultEmail = $this->SetCcBccDefaultEmail->find('first', array('conditions' => array('dealer_id' => $this->Auth->user('dealer_id'),'email_type' => 'Lead Emails')));
		$this->set('SetCcBccDefaultEmail',$SetCcBccDefaultEmail);

   		$contact_info = $old_contact_data =  $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
   		$this->set('contact_info',$contact_info);

   		/**
   		* Check Unsubscription
   		*/
   		$this->loadModel('CrmUnsubscribe');
   		$crmUnsubscribe_cnt = $this->CrmUnsubscribe->find('count', array('recursive' => -1,
			'conditions'=>array(
				'CrmUnsubscribe.contact_id' => $contact_id
			)
		));
		$this->set('crmUnsubscribe_cnt',$crmUnsubscribe_cnt);

   		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");
		$this->set('follow_up_24',$follow_up_24);


		$this->loadModel('DealerSetting');
		$auto_event_start_time = $this->DealerSetting->get_settings('auto_event_time', $this->Auth->user('dealer_id') );
		$auto_event_end_time =  date("h:i A",strtotime("+15 minute",  strtotime($auto_event_start_time)));
		$this->set('auto_event_start_time',$auto_event_start_time);
		$this->set('auto_event_end_time',$auto_event_end_time);

		$dnc_bdc_only = $this->DealerSetting->get_settings('dnc_bdc_only', $this->Auth->user('dealer_id') );
		$this->set('dnc_bdc_only', $dnc_bdc_only);

		$status_update_optional_event = $this->DealerSetting->get_settings('status_update_optional_event', $this->Auth->user('dealer_id') );
		$this->set('status_update_optional_event', $status_update_optional_event);
		//debug($status_update_optional_event);
		$send_log_change_notification = $this->DealerSetting->get_settings('log_change_notification', $this->Auth->user('dealer_id') );

		$casl_feature = $this->DealerSetting->get_settings('casl_feature', $this->Auth->user('dealer_id') );
		$this->set('casl_feature', $casl_feature);

		$this->LoadModel('ContactCaslStatuse');
		$contactCaslStatuse_list = $this->ContactCaslStatuse->find('list');
		$this->set('contactCaslStatuse_list', $contactCaslStatuse_list);

//Andi
//debug($contact_info);
    $dealer_visit = $this->DealerSetting->get_settings('dealer_visit_showroom', $this->Auth->user('dealer_id'));
    $this->set('dealer_visit',$dealer_visit);

    $dealer_visit_showroom = $this->DealerSetting->get_settings('dealer_visit_showroom', $this->Auth->user('dealer_id'));
    $this->set('dealer_visit_showroom',$dealer_visit_showroom);

		App::uses('Sanitize', 'Utility');


   		if ($this->request->is('post') || $this->request->is('put')) {

			$current_user_id = $this->Auth->user('id');
			$this->Contact->saveFirstModified($contact_info);


   			if( $this->Auth->user('group_id') == '8' || $this->Auth->user('group_id') == '13' ){
				$this->request->data['Contact']['notes'] = 'EDIT by BDC - '.$this->request->data['Contact']['notes'];
			}

			if($this->request->data['Contact']['notes'] == '' && isset($this->request->data['UserEmail']['message'])){
				$this->request->data['Contact']['notes'] = $this->request->data['UserEmail']['message'];
			}

			if($this->request->data['Contact']['spit_deal_update'] == 'yes'){
				$spit_deal_isuer = 	$this->Auth->user('id');
			}else{
				$spit_deal_isuer = 	"0";
			}

            //start transaction
            // $contactDataSource = $this->Contact->getDataSource();
            // $contactDataSource->begin();

            $note_added_by = $this->Auth->user("first_name")." ".$this->Auth->user("last_name"). " #".$this->Auth->user("id");

            //Update Contact
   			if($update_type == 'Dead Lead (Closed)') {

   				$this->Contact->updateAll(
					array(
						'Contact.status' => "'".Sanitize::escape($this->request->data['Contact']['status'])."'",
						'Contact.notes' => "'".Sanitize::escape($this->request->data['Contact']['notes'])."'",
						// 'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'",
						'Contact.lead_status' => "'Closed'",
						'Contact.modified' => "'".$datetimetext."'",
						'Contact.form_used' => "'short'",
						'Contact.spit_deal_update' => "'".Sanitize::escape($this->request->data['Contact']['spit_deal_update'])."'",
						'Contact.spit_deal_user_id' => "'".$spit_deal_isuer."'",
						'Contact.note_added_by' => "'".Sanitize::escape($note_added_by)."'"
					),
					array('Contact.id' => $contact_id)
				);

			} else if($update_type == 'Showroom Visit Update' && $contact_info['Contact']['sales_step']  != '10') {

				$this->Contact->updateAll(
					array(
						'Contact.status' => "'".Sanitize::escape($this->request->data['Contact']['status'])."'",
						// 'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'",
						'Contact.sales_step' => "'".$this->request->data['Contact']['sales_step']."'",
						'Contact.notes' => "'".Sanitize::escape($this->request->data['Contact']['notes'])."'",
						'Contact.modified' => "'".$datetimetext."'",
						'Contact.form_used' => "'short'",
						'Contact.spit_deal_update' => "'".Sanitize::escape($this->request->data['Contact']['spit_deal_update'])."'",
						'Contact.spit_deal_user_id' => "'".$spit_deal_isuer."'",
						'Contact.note_added_by' => "'".Sanitize::escape($note_added_by)."'"
					),
					array('Contact.id' => $contact_id)
				);

            } else if($update_type == 'Email Update (All)') {

                $this->Contact->updateAll(
					array(
						'Contact.status' => "'".Sanitize::escape($this->request->data['Contact']['status'])."'",
						// 'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'",
						'Contact.notes' => "'".Sanitize::escape($this->request->data['Contact']['notes'])."'",
						'Contact.modified' => "'".$datetimetext."'",
						'Contact.form_used' => "'short'",
						'Contact.spit_deal_update' => "'".Sanitize::escape($this->request->data['Contact']['spit_deal_update'])."'",
						'Contact.spit_deal_user_id' => "'".$spit_deal_isuer."'",
						'Contact.note_added_by' => "'".Sanitize::escape($note_added_by)."'"
					),
					array('Contact.id' => $contact_id)
				);

			} else {

                $this->Contact->updateAll(
					array(
						'Contact.status' => "'".Sanitize::escape($this->request->data['Contact']['status'])."'",
						// 'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'",
						'Contact.notes' => "'".Sanitize::escape($this->request->data['Contact']['notes'])."'",
						'Contact.modified' => "'".$datetimetext."'",
						'Contact.form_used' => "'short'",
						'Contact.spit_deal_update' => "'".Sanitize::escape($this->request->data['Contact']['spit_deal_update'])."'",
						'Contact.spit_deal_user_id' => "'".$spit_deal_isuer."'",
						'Contact.note_added_by' => "'".Sanitize::escape($note_added_by)."'"
					),
					array('Contact.id' => $contact_id)
				);

			}

			if(isset($this->request->data['Contact']['dnc_status'])){
				$this->Contact->updateAll(
					array(
						'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'"
					),
					array('Contact.id' => $contact_id)
				);
			}else if( isset($this->request->data['Contact']['contact_casl_status_id']) ){
				$this->Contact->updateAll(
					array(
						'Contact.contact_casl_status_id' => "'".$this->request->data['Contact']['contact_casl_status_id']."'"
					),
					array('Contact.id' => $contact_id)
				);
			}


			//Save History


			/* STARTS : Trigger Update Email - Autoresponders */
			// $message = $this->requestAction('user_emails/SendUpdateEmail', array(
			// 		'data' => array('contact_id' => $contact_id,
			// 						'form_data'=>$this->request->data,
			// 						'old_contact_data'=>$old_contact_data
			// 						)
			// 					)
			// 	);
			// debug($this->request->data);


			//Insert casl opt-out
			if(isset($this->request->data['Contact']['contact_casl_status_id']) && $old_contact_data['Contact']['contact_casl_status_id'] != $this->request->data['Contact']['contact_casl_status_id'] && in_array($this->request->data['Contact']['contact_casl_status_id'], array('3','4') ) ){
				$contact_info_casl['Contact']['id'] = $contact_id;
				$contact_info_casl['Contact']['email'] = $old_contact_data['Contact']['email'];
				$contact_info_casl['Contact']['contact_casl_status_id'] = $this->request->data['Contact']['contact_casl_status_id'];

				$this->loadModel('CrmUnsubscribe');
				$this->CrmUnsubscribe->opt_out($contact_info_casl, $old_contact_data['Contact']['company_id'], $this->Auth->user('first_name'). " " . $this->Auth->user('last_name'));
			}

			//remove opt out
			if(isset($this->request->data['Contact']['contact_casl_status_id']) && $old_contact_data['Contact']['contact_casl_status_id'] != $this->request->data['Contact']['contact_casl_status_id'] && ! in_array($this->request->data['Contact']['contact_casl_status_id'], array('3','4') ) ){
				$this->loadModel('CrmUnsubscribe');
				$this->CrmUnsubscribe->remove_opt_out($contact_id,  $old_contact_data['Contact']['company_id'], $this->Auth->user('first_name'). " " . $this->Auth->user('last_name'));
			}


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



			if($casl_send_email == true){
				$message = $this->requestAction('autoresponder_emails/send_auto_responder_update_email', array(
					'data' => array(
							'contact_id' => $contact_id,
							'form_data'=>$this->request->data,
							'old_contact_data'=>$old_contact_data
						)
					)
				);
				// Create and send ics file
				$file_path 	=	'';
				if($this->request->data['Newevent']['send_calendar_invite'] == '1' && isset($_POST['event_confirm']) && ($_POST['event_confirm'] == 'close_reschedule')){
					$ics_filename 		= 	'event_'.$contact_id.".ics";
					$ics_start   		=	strtotime($this->request->data['Newevent']['start_date'].' '.$this->request->data['Newevent']['start_time']);
					$ics_end   			=	strtotime("+15 minute",  $ics_start);
					$ics_title			=	$this->request->data['Newevent']['title'];
					$ics_description	=	$this->request->data['Newevent']['details'];

					$file_path 			= 	$this->requestAction(array('controller' => 'contacts', 'action' => 'create_ics',$ics_filename, $ics_start, $ics_end, $ics_title, $ics_description));

					$this->LoadModel('CalendarInviteContent');
					$calendar_invite_contents = $this->CalendarInviteContent->find("first", array("conditions"=>array("CalendarInviteContent.dealer_id" => $dealer_id)));
					$mail_subject 	=	(isset($calendar_invite_contents['CalendarInviteContent']['subject']))?$calendar_invite_contents['CalendarInviteContent']['subject']:'Calendar event invitation';
					$mail_content 	=	(isset($calendar_invite_contents['CalendarInviteContent']['content']))?$calendar_invite_contents['CalendarInviteContent']['content']:'Please find attached calendar event invitation file';
					$message = $this->requestAction('user_emails/send_ics_email', array(
					    'contact_id' => $contact_id,
						'subject'=>$mail_subject,
						'mailbody'=>$mail_content,
						'ics_attachment_files'=>$file_path,
					));
				}
			}

			/* ENDS : Trigger Update Email - Autoresponders */


   			//Field Changed
			$field_changed_ar = array();
			foreach($this->request->data['Contact'] as $key=>$value){
				if($key == 'modified' || $key == 'modified_full_date' || $key == 'modified_date_short' || $key == 'modified_date_short_slash' || $key == 'sperson'){
					continue;
				}
				//debug($key." - ".$value." - ".$old_data['Contact'][$key]);
				if($contact_info['Contact'][$key] != $value){
					$field_value = ($key == 'contact_status_id')? $contact_statuses[$this->request->data['Contact'][$key]] : $this->request->data['Contact'][$key];
					$field_name = (array_key_exists($key, $fields_map_array))?  $fields_map_array[$key] : $key ;
					$field_changed_ar[] = $field_name.": ".$field_value;
				}
			}


			//save step change
            if(isset($this->request->data['Contact']['sales_step']) &&   $contact_info['Contact']['sales_step'] !=  $this->request->data['Contact']['sales_step']){
            	$history_data['last_step'] = $contact_info['Contact']['sales_step'];
            	$history_data['step_chage_date'] = date('Y-m-d H:i:s');

            	//setp modified date in the contacts table
            	$this->Contact->updateAll(
					array(
						'Contact.step_modified' => "'".date('Y-m-d H:i:s')."'"
					),
					array('Contact.id' => $contact_id)
				);



            }

            if( isset($this->request->data['Contact']['note_update']) && $this->request->data['Contact']['note_update'] == 1 && $this->request->query['Contact']['customer_showed'] != 'true' ){
            	$contact_info['Contact']['notes'] = $contact_info['Contact']['notes'] . ' <br> Additional Notes: <br>'. $this->request->data['Contact']['note_update_details'];



            	//Save History
				$h_data = array();

				$h_data['user_id'] = $contact_info['Contact']['user_id']; // for change log
				$h_data['contact_id'] = $contact_info['Contact']['id'];
				//$h_data['changed_by'] = $this->Auth->user('id'); // for change log
				$h_data['sperson'] = $this->Auth->user('first_name')." ".$this->Auth->user('last_name');
				$h_data['cond'] = $contact_info['Contact']['condition'];
				$h_data['year'] = $contact_info['Contact']['year'];
				$h_data['make'] = $contact_info['Contact']['make'];
				$h_data['model'] = $contact_info['Contact']['model'];
				$h_data['type'] = $contact_info['Contact']['type'];
				$h_data['status'] = 			"Email/Note Update";
				$h_data['comment'] = 			$this->request->data['Contact']['note_update_details'];
				$h_data['start_date'] = 		$contact_info['Contact']['received_date'];
				$h_data['h_type'] = 			"Email";
				$h_data['sales_step'] = 		"Email";
				$h_data['modified'] = 		date('D - M d, Y g:i A');
				$h_data['created'] =  		date('Y-m-d H:i:s');

				$htr = array(
					'History' => $h_data
				);
				$this->History->create();
				$this->History->save($htr);






            }
//Andi
      if($update_type == 'Dealer Visit' or $this->request->query['customer_showed'] == 'true'){
        //$contact_info['Contact']['notes'] == 'Andi';//$this->request->data['Contact']['notes'];
        $contact_info['Contact']['model'] == 'Dealer Visit';
        $contact_info['Contact']['year']  == '';
        $contact_info['Contact']['make'] == '';
        $contact_info['Contact']['status'] == $old_data['Contact']['status'];

        $htype = 'Dealer Visit';
      }

			$history_data['user_id'] = $contact_info['Contact']['user_id']; // for change log
			$history_data['changed_by'] = $this->Auth->user('id'); // for change log
			$history_data['field_changed'] = implode(", ",$field_changed_ar);  // for change log

			$history_data['contact_id'] = $contact_info['Contact']['id'];
			$history_data['sperson'] = $contact_info['Contact']['sperson'];
			$history_data['cond'] = $contact_info['Contact']['condition'];
			$history_data['year'] = $contact_info['Contact']['year'];
			$history_data['make'] = $contact_info['Contact']['make'];
			$history_data['model'] = $contact_info['Contact']['model'];
			$history_data['type'] = $contact_info['Contact']['type'];
			$history_data['sales_step'] = $contact_info['Contact']['sales_step'];
			$history_data['status'] = $contact_info['Contact']['status'];
			$history_data['modified'] = date('D - M d, Y g:i A', strtotime($contact_info['Contact']['modified']) );
			$history_data['created'] = $contact_info['Contact']['modified'];
			$history_data['comment'] = $contact_info['Contact']['notes'];
			$history_data['form_used'] = $contact_info['Contact']['form_used'];
			$history_data['dealer_id'] = $contact_info['Contact']['company_id'];
			$history_data['condition'] = $contact_info['Contact']['spit_deal_update'];
			$history_data['spit_deal_user_id'] = $contact_info['Contact']['spit_deal_user_id'];




			$history_data['h_type'] = (!empty($htype)) ? $htype : "Lead";
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);


			//Existing evetn udpate
			if(isset($this->request->data['Event']['id']) && $this->request->data['Event']['id'] != '' && $this->request->data['Event']['editevent'] == 'yes'){

				$this->request->data['Event']['start'] = '';
				if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
					$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
				}

				$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
				$this->request->data['Event']['form_used'] = 'short_539';
				$event_updated = false;
				if(!in_array($this->request->data['Event']['status'],array('Completed','Canceled')))
				{
					$check_event_status = $this->Event->findById($this->request->data['Event']['id']);

					if(in_array($check_event_status['Event']['status'],array('Completed','Canceled'))){
						$event_updated = true;
					}

				}
				// if event is already updated by other user then do not perform any action
				if($event_updated)
				{
					$this->Session->setFlash('Event already updated by other salesperson.You cannot update event.', 'alert', array('class' => 'alert-error'));
					die;
				}

				/*
				$this->request->data['Event']['end'] = '';
				if($this->request->data['Event']['end_date'] != '' && $this->request->data['Event']['end_time'] != ''){
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['end_date']." ".$this->request->data['Event']['end_time']));
				}*/

				$this->Event->save($this->request->data);


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
				$history_data['created'] = 				$old_data['Event']['modified'];
				$history_data['start_date'] = 			$old_data['Event']['start'];
				$history_data['end_date'] = 			$old_data['Event']['end'];
				$history_data['form_used'] = 			$old_data['Event']['form_used'];

				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 			"Event";
				$history_data['sperson'] 	=			$old_data['Event']['sperson'];

				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);

			}

			//New evetn Insert
			if(isset($this->request->data['Newevent']['create']) && $this->request->data['Newevent']['create'] == 'yes'){

				$this->requestAction(array('controller'=>'contacts_manage','action'=>'set_event_completed', $contact_id ,1));
				//save event
				$this->request->data['Event'] = array();
				$this->request->data['Event']['user_id'] = $this->Auth->user('id');
				$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
				$this->request->data['Event']['contact_id'] = $contact_id ;
				$this->request->data['Event']['sperson'] =  $contact_info['Contact']['sperson'];
				$this->request->data['Event']['first_name'] = $contact_info['Contact']['first_name'];
				$this->request->data['Event']['last_name'] = $contact_info['Contact']['last_name'];
				$this->request->data['Event']['email'] = $contact_info['Contact']['email'];
				$this->request->data['Event']['mobile'] = $contact_info['Contact']['mobile'];
				$this->request->data['Event']['phone'] = $contact_info['Contact']['phone'];

				$this->request->data['Event']['event_type_id'] = $this->request->data['Newevent']['event_type_id'];
				$this->request->data['Event']['title'] = $this->request->data['Newevent']['title'];
				$this->request->data['Event']['status'] = $this->request->data['Newevent']['status'];
				$this->request->data['Event']['details'] = $this->request->data['Newevent']['details'];

				$this->request->data['Event']['start'] = '';
				$this->request->data['Event']['end'] = '';
				if($this->request->data['Newevent']['start_date'] != '' && $this->request->data['Newevent']['start_time'] != ''){
					$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Newevent']['start_date']." ".$this->request->data['Newevent']['start_time']));
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
				}
				$this->request->data['Event']['form_used'] = 'short_2';
				$this->request->data['Event']['logged_user_id'] = $this->Auth->user('id');

				/*
				$this->request->data['Event']['end'] = '';
				if($this->request->data['Newevent']['end_date'] != '' && $this->request->data['Newevent']['end_time'] != ''){
					$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['Newevent']['end_date']." ".$this->request->data['Newevent']['end_time']));
				}
				*/
				//debug($this->request->data);
				$this->Event->create();
				$this->Event->save($this->request->data);


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
				$history_data['created'] = 				$old_data['Event']['modified'];
				$history_data['start_date'] = 			$old_data['Event']['start'];
				$history_data['end_date'] = 			$old_data['Event']['end'];
				$history_data['form_used'] = 			$old_data['Event']['form_used'];
				$history_data['h_type'] = 				"Event";
				$history_data['sales_step'] = 			"Event";
				$history_data['sperson'] 	=			$old_data['Event']['sperson'];

				$history = array(
					'History' => $history_data
				);
				$this->History->create();
				$this->History->save($history);



			}

			$this->LoadModel('LeadChangeAlertEmail');

   			//upddate sperson if edit from differnt sperson
			if(   $this->request->data['Contact']['spit_deal_update'] == 'no' && $this->Auth->user('id') !=  $contact_info['Contact']['user_id']  && $this->Auth->user('group_id') != '8' && $this->Auth->user('group_id') != '13' ){
				//Update Events
				$this->_update_sperson_user_id($this->Auth->user('id'),  $contact_id);
				$this->_update_event($this->Auth->user('id'), $contact_id);

				//Send Lead Change Update
				$this->LeadChangeAlertEmail->send_lead_change_report( $this->Auth->user('dealer_id'), $this->Auth->user('zone'), $contact_info['Contact']['modified'], $contact_id);
			}

			//Send Log Change Notification
			if($send_log_change_notification == 'On' && $contact_info['Contact']['user_id'] != '' && $contact_info['Contact']['user_id'] != 0 && $this->Auth->user('id') !=  $contact_info['Contact']['user_id'] ){
				$this->LeadChangeAlertEmail->send_log_change_notification($contact_info['Contact']['user_id'], $contact_info, $this->Auth->user('first_name'). " " . $this->Auth->user('last_name')." (". $this->Auth->user('id') .")" );
			}

			//Update Originator if Originator is empty
			if($contact_info['Contact']['owner_id'] == '' || $contact_info['Contact']['owner_id'] == '0'){
				//Update Events
				$this->_update_owner($this->Auth->user('id'),  $contact_id);
			}


			//Update mgr 24hr call log
			 if(isset($this->request->params['named']['mgr_24hr_calls']) && $this->request->params['named']['mgr_24hr_calls']=='mgr_24hr_calls'){
			 	$this->loadModel("Mgr24hrCall");
			 	$this->Mgr24hrCall->create();
			 	$this->Mgr24hrCall->save(array('Mgr24hrCall'=>array(
			 		'dealer_id' => $this->Auth->user('dealer_id'),
			 		'contact_id' => $contact_id,
			 		'created' => date('Y-m-d H:i:s'),
			 		'user_id' => $this->Auth->user('id'),
			 		'sperson' => $this->Auth->user('first_name')." ".$this->Auth->user('last_name')
			 	)));

			 }



			//<Set Event Completed for dead lead>

			// If there is new event then add new event'
			if(empty($this->request->data['Newevent']['create']) || $this->request->data['Newevent']['create'] != 'yes'){
				$this->loadModel('LeadStatus');
				$dead_lead_head = $this->LeadStatus->find('first',array(
					'conditions'=>array(
						'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
						'LeadStatus.name'=> $this->request->data['Contact']['status'],
					)
				));
				$contact_lead_status = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
				if($contact_lead_status['Contact']['sales_step'] != '10' && $contact_lead_status['Contact']['lead_status'] == 'Closed' ){
					$this->requestAction(array('controller'=>'contacts_manage','action'=>'set_event_completed', $contact_id  ));
				}
			}
			//<Set Event Completed for dead lead ends />





			//Send emails

			$message = "";

			//Send customer email
			if($this->request->data['UserEmail']['send_email'] == '1' && $casl_send_email == true){

				$this->loadModel("Draft");
				$this->Draft->clear_druft_email( $this->Auth->user('id'), $contact_id);

				$message = $this->requestAction('user_emails/send_contact_email/update_note', array(
					'contact_id' => $contact_id,
					'cc' => $this->request->data['UserEmail']['cc'],
					'bcc' => $this->request->data['UserEmail']['bcc'],
					'subject'=>$this->request->data['UserEmail']['subject'],
					'mailbody'=>$this->request->data['UserEmail']['message'],
					'attachment_files'=>$this->request->data['attachment_files'],
				));
			}

            if($message != '') {
				if($message == 'Email sent'){
                    // $contactDataSource->commit();
					$this->Session->setFlash($message, 'alert');
				} else {
					//CakeLog::write($contact_id.'_contact_rollback',"User ID :".$this->Auth->user('id').' -- '.date('Y-m-d H:i:s'));
                    // $contactDataSource->rollback();
					$this->Session->setFlash($message, 'alert', array('class' => 'alert-error'));
				}
			} else {
                // $contactDataSource->commit();
            }

			// CLEAR CACHE ON EDIT LEAD
			$this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));
			$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);


   		}else{


   			//debug($contact_info);
   			$this->request->data = $contact_info;

   			if( $this->request->data['Contact']['dnc_status'] == '' ){
				$this->request->data['Contact']['dnc_status'] = 'ok_call_email';
			}

   			$eventinfo = $this->Event->find('first', array('recursive' => 0,'order'=>'Event.id DESC', 'conditions'=>array('Event.status <>' => array('Completed','Canceled'),'Event.contact_id' => $contact_id)));
   			if(!empty($eventinfo)){

				$this->request->data['Event']['id'] = $eventinfo['Event']['id'];
				$this->request->data['Event']['event_type_id'] = $eventinfo['Event']['event_type_id'];
				$this->request->data['Event']['status'] = $eventinfo['Event']['status'];
				$this->request->data['Event']['title'] = $eventinfo['Event']['title'];
				$this->request->data['Event']['details'] = $eventinfo['Event']['details'];

				$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
				$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
				$this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
			}

			if($follow_up_24 == 'On'){
				$this->request->data['Newevent']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
				$this->request->data['Newevent']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));

				$this->request->data['Newevent']['start_time'] = $auto_event_start_time;
				$this->request->data['Newevent']['end_time'] = $auto_event_end_time;


				$this->request->data['Newevent']['status'] = "Scheduled";
				$this->request->data['Newevent']['event_type_id'] = "13";
				$this->request->data['Newevent']['title'] = " Call Out to Customer";
				$this->request->data['Newevent']['details'] = "Call Out to Customer- ";
			}

			$this->request->data['Newevent']['start_time'] = $auto_event_start_time;
			$this->request->data['Newevent']['end_time'] = $auto_event_end_time;
			$this->request->data['Newevent']['details'] = "Call Out to Customer- ";



			//retrive draft
			if($update_type == 'Email Update (All)'){
   				$status_condition['LeadStatus.header'] = array('Email (Open)');
   				$this->loadModel("Draft");
   				$draft_exists = $this->Draft->find('first', array('conditions' => array('Draft.user_id'=> $this->Auth->user('id') , 'Draft.contact_id' => $contact_id  ) ));
   				//debug($draft_exists);
   				$this->set("draft_exists", $draft_exists);
   			}


   		}


   		//$smtp_settings = $this->requestAction("/user_emails/get_setting/smtp");
   		$this->loadModel('UserEmail');
   		$smtp_settings = $this->UserEmail->get_setting("smtp", $this->Auth->user('id'));
   		$this->set("smtp_settings", $smtp_settings);


   		if( $this->request->data['Contact']['email'] == '' ){
			$smtp_settings = array();
		}
   		$this->set("smtp_settings", $smtp_settings);

   		$email_settings = $this->requestAction("dealer_settings/get_settings/email-process");
		$this->set('email_settings', $email_settings);




		if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' ){


			$client = S3Client::factory(array(
	    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
	    		'secret' => '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',
			));
			$bucket = "dp360-attachments";




			App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
	    	$bucket = 'dp360-attachments';
	    	$success_action_redirect = "https://app.dealershipperformancecrm.com/contact_s3/test/";
	    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
			$s3policy->addCondition('', 'acl', 'private')
		         ->addCondition('', 'bucket', $bucket)
		         ->addCondition('starts-with', '$key', '')
		         ->addCondition('starts-with', '$Content-Type', '')
		         ->addCondition('content-length-range', 1, 5242880)
		         ->addCondition('', 'success_action_redirect', $success_action_redirect);

			$policy = $s3policy->getPolicy(true);
			$signature = $s3policy->getSignedPolicy();

			$this->set('policy',$policy);
			$this->set('signature',$signature);
			$this->set('bucket',$bucket);

			$message_key = uniqid();

			$filename =  uniqid($message_key."_")."_";
			$this->set('filename',$filename);
			$this->set('message_key',$message_key);




		}








		//get Signaure
		$this->loadModel('Setting');
		$setting = $this->Setting->find('first', array('conditions'=>array('Setting.user_id' => $this->Auth->user('id')    )));
		//debug($setting);
		$this->set('setting',$setting);




   		//Event Details
		$appointment = $this->Event->find('first', array('recursive'=>-1,'order' => array('Event.modified DESC'),'conditions'=>array(
		'Event.contact_id'=>$contact_id,
		//'Event.user_id'=>$current_user_id,
		'Event.status <>' => array('Completed','Canceled'))));
		$this->set('appointment', $appointment);

   		$this->set('eventTypes', $this->EventType->find('list', array('conditions'=>['OR' => ['EventType.dealer_id IS NULL', 'EventType.dealer_id'=>$this->Auth->user('dealer_id')]] ,'order'=>"EventType.id ASC")));



   		$status_condition['LeadStatus.dealer_id'] = array($this->Auth->user('dealer_id'), 0);
   		if($update_type == 'Outbound Call Update'){

   			if( $contact_info['Contact']['lead_status'] != 'Closed'  )
   				$status_condition['LeadStatus.header'] = array('Outbound Call (Open)');
   			else
   				$status_condition['LeadStatus.header'] = array('Dead Lead (Closed)');

   				if(  $contact_info['Contact']['sales_step']  == '10'){
				$status_condition['LeadStatus.header'] = array('Sold FollowUp Out (Closed)');
			}



   		}else if($update_type == 'Inbound Call Update'){
   			if( $contact_info['Contact']['lead_status'] != 'Closed'  )
   				$status_condition['LeadStatus.header'] = array('Inbound Call (Open)');
			else
   				$status_condition['LeadStatus.header'] = array('Dead Lead (Closed)');

   			if(  $contact_info['Contact']['sales_step']  == '10'){
				$status_condition['LeadStatus.header'] = array('Sold FollowUp In (Closed)');
			}

   		}else if($update_type == 'Showroom Visit Update'){
   			if( $contact_info['Contact']['lead_status'] != 'Closed'  )
   				$status_condition['LeadStatus.header'] = array('Showroom (Open)');
   			else
   				$status_condition['LeadStatus.header'] = array('Dead Lead (Closed)');

   				if(  $contact_info['Contact']['sales_step']  == '10'){
				$status_condition['LeadStatus.header'] = array('Sold Pick-Up (Closed)');
			}
   		}

   		else if($update_type == 'Dead Lead (Closed)'){
			$status_condition['LeadStatus.header'] = array('Dead Lead (Closed)');
			$status_condition['LeadStatus.name <>'] = "Duplicate-Closed";
   		}
   		else if($update_type == 'Email Update (All)'){

   			$status_condition['LeadStatus.header'] = array('Email (Open)');
   		}
   		else if($update_type == 'text status'){
   			$status_condition['LeadStatus.header'] = array('SMS Text- Out','SMS Text-In');
   		}
   		else if($update_type == 'Set Appointment'){
   			//$status_condition['LeadStatus.header'] = array('Appointment (Open)');
   		}


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


		$status_condition['LeadStatus.top_status'] = 0 ;
		$status_condition['LeadStatus.active'] = 1 ;
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.order ASC','conditions'=>$status_condition));

        //Create Dealer Visit Showroom options
        $d_visit_status_condition = $status_conditions;
        $d_visit_status_condition['LeadStatus.header'] = 'Dealer Visit (Open)';
        $dealer_visit_statuses = $this->LeadStatus->find('list',array(
                'order'=>'LeadStatus.id ASC',
                'fields'=>array('name'),
                'conditions'=>$d_visit_status_condition
        ));
        $dvopt = array();
        foreach($dealer_visit_statuses as $dv){
            $dvopt['Dealer Visit (Open)'][$dv] = $dv;
        }
        $this->set('dvopt', $dvopt);

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

		//debug( $lead_status_options_sorted )
		$sopt = array();
		foreach($lead_status_options_sorted as $key=>$value ){
			$sopt[$key] = array();
			foreach($value as $v){
				$sopt[$key][$v] =$v;
			}
		}
		$this->set('sopt', $sopt);


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
			//$sales_step_options[ $sales_step['SalesStep']['step']  ] = $sales_step['SalesStep']['step'];

			//Get sold step to auto select status
			if($sales_step['SalesStep']['sold_step'] == 'sold'){
				$sold_step = $sales_step['SalesStep']['id'];
			}
		}

		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));



		unset($sales_step_options['10']);
		if($contact_info['Contact']['contact_status_id'] == '7'){
			unset($sales_step_options['1']);
		}

		$this->set('sales_step_options', $sales_step_options);
		$this->set('sold_step', $sold_step);

		//debug( $sold_step );
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



   	}

   	public function note_update($contact_id){

   		$contact_info = $this->Contact->find('first', array('fields'=>array('Contact.id','Contact.full_name','Contact.user_id', 'Contact.sperson', 'Contact.first_modified'),'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
   		$this->set('contact_info',$contact_info);

   		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

   		if ($this->request->is('post')) {

			$this->Contact->saveFirstModified($contact_info);
   			//Update Contact
			$this->Contact->updateAll(
				array(
					'Contact.note_update' => "'".$this->request->data['Contact']['note_update']."'",
					'Contact.note_update_time' => "'".$datetimetext."'",
					'Contact.status' => "'Notes Update'"
				),
				array('Contact.id' => $contact_id)
			);


			$current_user_id = $this->Auth->user('id');


			//Add history entory

			$history_data = array();
			$history_data['user_id'] = $user_details['User']['id']; // for change log
			$history_data['changed_by'] = $current_user_id;
			$history_data['status'] = 'Notes Update';
			$history_data['contact_id'] = $contact_id;
			$history_data['sperson'] = $contact_info['Contact']['sperson'];
			$history_data['modified'] = date('D - M d, Y g:i A');
			$history_data['created'] = $datetimetext;
			$history_data['comment'] = $this->request->data['Contact']['note_update'];
			$history_data['h_type'] = "Note Update";
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

   		}

   	}

	public function lead_transfer_mass(){
		$this->layout = "default_new";
		$group = $this->Auth->user('group_id');
		$timezone = $this->Auth->user('zone');
		$current_user_id = $this->Auth->user('id');
		$current_dealer_id = $this->Auth->user('dealer_id');

		if($group == 1 || $group == 2 || $group == 9 || $group == 6){
			$users = $this->User->find("list", array('conditions'=>array(
				'User.dealer_id'=>$current_dealer_id,
				'User.group_id <>'=>array(1,6,7,8),
				'User.active'=>1
			)));
			$this->set('users',$users);

			if ($this->request->is('post')) {
				$from_user_id = $this->request->data['Contact']['user_id_from'];
				$to_user_id = $this->request->data['Contact']['user_id_to'];

				if ($from_user_id != '' && $to_user_id != '' && $to_user_id != $from_user_id){
					//transfer mass leads
					$this->User->recursive = -1;
					$user_details = $this->User->findById($to_user_id);
					$d_cs =  $this->Contact->find('all',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status'),'conditions' => array(
						'Contact.user_id'=>$from_user_id,
						'Contact.sales_step <>'=>'10',
						'Contact.lead_status'=>'Open',
					)));
					foreach($d_cs as $d_c){
						$this->_move_contact_to_user($user_details, $d_c['Contact']['id'],  $this->request->data['Contact']['note']);
					}
				}

				// CLEAR CACHE ON EDIT LEAD
				$this->requestAction('manage_cache/refresh/'.$current_dealer_id);


				$this->Session->setFlash(__('Contact moved'), 'alert');
				$this->redirect(array('controller'=>'contacts_manage','action'=>'lead_transfer_mass'));
			}
		}
		$this->set('group',$group);

	}

	public function lead_distribution_get_reciver($user_from){
		$dealer_id = $this->Auth->user('dealer_id');

		$users = $this->User->find("list", array('conditions'=>array(
			'User.dealer_id'=>$dealer_id,
			'User.id <>' => $user_from,
			'User.group_id'=>array(2,3,4,10,11),
			'User.active'=>1
		)));
		echo json_encode($users);
		$this->autoRender = false;
	}

	public function lead_distribution(){
		$this->layout = "default_new";

		$group_id = $this->Auth->user('group_id');
		if($group_id != '4' && $group_id != '2' && $group_id != '9' && $group_id != '1'  && $group_id != '6'){
			$this->redirect(array('controller'=>'dashboards', 'action'=>'main'));
		}

		$dealer_id = $this->Auth->user('dealer_id');

		$users = $this->User->find("list", array('order' => 'User.first_name', 'conditions'=>array(
			'User.dealer_id'=>$dealer_id,
			'User.group_id <>'=>array(1,6,7,8),
			'User.active'=>1
		)));
		$this->set('users',$users);
	}
	public function leads_distribute(){
		$dealer_id = $this->Auth->user('dealer_id');

		//debug($this->request->data);
		$user_from =  $this->request->data['user_from'];
		$receiver =  $this->request->data['receiver'];
		$notes = $this->request->data['notes'];

		$conditions['Contact.company_id'] = $dealer_id;
		$conditions['Contact.status <>'] = 'Duplicate-Closed';
		$conditions['Contact.lead_status'] = 'Open';
		$conditions['Contact.user_id'] = $user_from;

		$message = "";

		//$listof_leads =
		$this->Contact->recursive = -1;
		$listof_leads = $this->Contact->find('list', array('conditions' => $conditions,  'fields'=>array('Contact.id','Contact.id') ));
		if(count($listof_leads) == 0){
			$message = 'There is no open lead found belongs to this user';
		}else{

			$total_receiver = count($receiver);
			$chunk_size = round(count($listof_leads) / $total_receiver);
			if($chunk_size < 1){
				$chunk_size= 1;
			}
			$chunk_leads = array_chunk($listof_leads, $chunk_size);

			//Assign leads to users
			$lead_user_ids;
			foreach($chunk_leads as $key => $chunk){
				$lead_user_ids[ $receiver[$key] ] = $chunk;
			}
			//debug($lead_user_ids);

			foreach($lead_user_ids as $key=>$value){
				$user_id = $key;

				$this->User->recursive = -1;
				$user_details = $this->User->findById($user_id);
				foreach($value as $contact_id){
					$this->_move_contact_to_user($user_details, $contact_id,  $notes);
				}
			}

			$log_array = array(
				'user_from' => $user_from,
				'lead_user_ids' => $lead_user_ids
			);
			CakeLog::write('lead_distributoin', json_encode($log_array));

			$message = 'Lead Transfer Successful!! Total number of lead transferred: '.count($listof_leads);
		}

		echo $message;


		$this->autoRender = false;
	}

	public function temp_lead_move(){

		// $lead_user_ids = array(
		// 	'96'  => array(114991,115064,115250,115330,115389,115564,115565,115566,115568,115569,115827,115973,115974,115975,115979,116093,116120,116128,116141,116147,127720,128486,128487,128493,128495,128516,128647,128648,128651,128722,128724,128725,128868,128869,128870,128871,129076,129077,129079,129081,129409,129420,129423,129424,129408),
		// 	'98'  => array(129720,129723,129744,129751,129752,129803,129804,129805,129829,129841,129899,129909,129996,129998,130261,130304,130326,130347,130625,130647,130843,130845,131094,131173,131561,131563,131716,131727,131735,131743,131782,131838,131954,131962,131988,132006,132061,132083,132119,132352,132540,132557,132560,132563,132659),
		// 	'101' => array(132684,132734,132882,132883,133028,133029,133109,133137,133282,133385,133387,133494,133499,133503,133504,133607,133609,144921,144925,145095,145234,145418,145522,145693,145736,293415,293416,293524,293525,293924,293929,294153,294322,294325,294500,294645,294646,294663,294901,295039,295043,295133,295134,295572,295581),
		// );


		// $lead_user_ids = array(
		// 	'91'  => array(132352, 130304, 762632, 129803, 129804, 129804, 762644, 131094, 130326, 132119, 130843, 130845, 129829, 548902, 130347, 129841, 132659, 762429, 130625, 130647, 762721, 131173, 129899, 549230, 303982, 131954, 129909, 131962, 128643, 131716, 131727, 131988, 131735, 131743, 77476, 132006, 129720, 129723, 132540, 548803, 131782, 310217),
		// 	'298'  => array(129996, 132557, 762318, 129998, 132560, 129744, 132563, 309971, 133588, 130261, 129751, 129752, 132061, 304352, 131561, 131563, 132083, 131838, 133378, 294663, 133385, 294153, 145418, 133387, 144139, 144141, 133137, 132882, 305426, 132883, 144921, 131610, 130332, 131357, 144925, 145693, 293924, 116260, 306981, 293415, 293416, 293929),
		// 	'687' => array(306989, 304942, 145736, 132684, 307020, 307022, 306000, 145234, 116054, 304989, 294500, 295535, 307055, 145522, 145525, 133494, 305014, 304503, 307321, 133499, 294525, 132734, 133503, 295039, 133504, 295043, 294795, 293521, 305809, 115089, 130195, 293524, 295572, 293525, 77462, 306582, 77463, 305049, 77466, 295581, 306589, 293534),
		// 	'688' => array(306592, 304289, 306593, 133282, 129954, 133028, 133029, 293797, 133286, 306089, 131242, 145322, 131247, 294322, 294325, 305591, 305345, 305606, 145095, 305610, 305357, 306894, 306895, 77521, 295121, 302545, 130772, 305367, 295133, 131806, 295134, 133607, 305384, 133609, 305387, 304877, 133109, 294645, 294901, 294646, 302078, 307454),
		// );

		// $lead_user_ids = array(
		// 	'691'  => array(632335,632925,634869,635846,636724,638583,639563,639862,640117,641752,642208,642631,644378,646062,646120,646524,648331,648746,649397,649686,650694,650924,651617,651621,651851,652554,652700),
		// 	'636'  => array(653025,653618,653850,655311,656388,656551,656995,657018,658273,658283,658728,658914,659055,659062,661451,661906,662819,663333,666914,667070,668413,669214,669745,670319,671620,671987,672389,672422),
		// 	'388' => array(672484,673445,674298,675038,675196,675867,676344,676504,677688,682247,684307,684448,684998,685770,686415,687483,688815,688916,690115,690281,690787,690943,691115,692531,899166,899180,899217,899242,899248),
		// 	'384' => array(899283,899284,899289,899312,899323,899336,899362,899410,899429,899469,899470,899499,899509,899542,899565,899616,899621,899623,899651,899699,899711,899778,899787,899807,899816,899817,899829,899953,899962,900049,900050),
		// );


		// $lead_user_ids = array(
		// 	'636'  => array(540613,540615,540618,540619,540620,540622,540625,540629,540635,540644,540646,540648,540665,540670,540673,540676,540677,540696,540697,540705,540708,540709,540714,540715,540725,540726,540728,540732,540741,540746,540748,540751,540756,540774,540776,540783,540786,540787,540788,540794,540800,540802,540805,540812,540815,540822,540825,540830,540836,540847,540854,540859,540864,540865,540884,540885,540886,540897,540908,540915,540930,540938,540942,540950,540958,541014,541024,541039,541053,541068,541085,541089,541101,541116,541119,541126,541148,541160,541181,541182,541201,541205,541210,541243,541245,541250,541252,541262,541276,541277,541283,541287,541295,541307,541311,541333,541339,541342,541355,541376,541377,541385,541416,541434,541449,541469,541486,541502,541508,541511,541518,541538,541544,541548,541557,541569,541577,541598,541602,541611,541623,541630,541644,541652,541656,541664,541669,541675,541683,541687,541688,541690,541693,541694,541695,541703,541721,541732,541736,541737,541745,541777,541781,541837,541841,541866,541873,541880,541893,541896,541901,541941,541951,541961,541967,541985,541996,542002,542008,542016,542018,542019,542023,542025,542030,542059,542065,542068,542070,542071,542072,542075,542076,542083,542116,542159,542161,542173,542176,542180,542181,542192,542232,542240,542244,542263,542270,542273,542277,542279,542281,542293,542301,542310,542325,542344,542377,542387,542403,542424,542445,542447,542449,542453,542461,542465,542504,542551,542600,542602,542607,542609,542625,542632,542636,542655,542663,542671,542685,542686,542694,542702,542721,542738,542744,542791,542809,542836,542858,542861,542877,542892,542894,542898,542906,542916,542920,542929,542941,542946,542976,542984,543046,543047,543054,543071,543081,543099,543114,543133,543143,543189,543197,543201,543204,543277,543318,543329,543361,543368,543434,543442,543445,543460,543469,543483,543524,543536,543553,543562,543600,543605,543609,543639,543644,543692,543708,543718,543719,543752,543762,543787,543797,543861,543891,543922,543963,543981,544013,544047,544074,544148,544268,544301,544341,544347,544372,544375,544386,544419,544425,544433),
		// 	'388'  => array(544442,544452,544474,544480,544486,544496,544507,544514,544541,544600,544612,544644,544657,544670,544716,544717,544724,544735,544738,544752,544767,544810,544811,544829,544878,544901,544925,544947,544952,544960,545034,545038,545150,545156,545193,545198,545290,545300,545309,545341,545344,545355,545360,545377,545382,545428,545440,545464,545476,545492,545516,545520,545562,545608,545614,545669,545704,545715,545720,545781,545791,545798,545802,545818,545878,545891,545895,545901,545918,545921,545924,545927,545956,545971,545997,546018,546028,546035,546058,546068,546079,546084,546107,546110,546118,546128,546138,546140,546141,546150,546166,546185,546192,546194,546195,546217,546252,546253,546264,546293,546305,546309,546316,546340,546344,546349,546355,546359,546360,546361,546363,546368,546370,546373,546376,546377,546406,546420,546425,546433,546438,546449,546472,546479,546483,546496,546497,546498,546501,546507,546517,546518,546520,546528,546556,546560,546562,546568,546572,546573,546604,546611,546615,546623,546627,546635,546648,546653,546659,546681,546682,546690,546706,546717,546722,546724,546734,546739,546749,546751,546761,546763,546767,546779,546793,546798,546799,546818,546834,546837,546845,546846,546859,546860,546863,546876,546887,546902,546904,546907,546913,546921,546927,546931,546942,546946,546951,546967,546986,546989,547001,547017,547064,547065,547072,547099,547105,547112,547114,547119,547128,547144,547145,547146,547159,547166,547167,547169,547170,547187,547219,547223,547259,547273,547288,547289,547309,547310,547316,547323,547324,547328,547350,547358,547368,547387,547404,547421,547424,547435,547448,547453,547500,547501,547507,547514,547523,547545,547570,547571,547581,547591,547599,547604,547616,547622,547638,547642,547654,547661,547665,547667,547675,547707,547708,547717,547724,547741,547743,547771,547779,547790,547816,547821,547822,547829,547835,547849,547864,547869,547878,547889,547919,547956,548002,548034,548035,548044,548056,548062,899237,899309,899327,899347,899402,899420,899445,899533,899583,899601,899688,899717,899733,899832,899890,899913,899976,900110,900326,900430,900659,901037,901066,901081),
		// );

		// $lead_user_ids = array(
		// 	'585'  => array(308805,308806,308807,308808,308809,308810,308811,308812,308813,308814,308815,308816,308817,308818,308819,308820,308821,308822,308824,308825,308826,308827,308828,308829,308830,308831,308832,308833,308834,308835,308836,308837,308838,308839,308840,308841,308842,308843,308844,308845,308846,308847,308848,308849,308850,308851,308852,308853,308854,308855,308856,308857,308858,308859,308860,308861,308862,308863,308864,308865,308866,308867,308868,308869,308870,308871,308872,308873,308874,308875,308876,308877,308878,308879,308880,308881,308882,308883,308884,308885,308886,308887,308888,308889,308890,308891,308892,308893,308894,308895,308896,308897,308898,308899,308900,308901,308902,308903,308904,308905,308906,308907,308908,308909,308910,308911,308912,308913,308914,308915,308916,308917,308918,308919,308920,308921,308922,308923,308924,308925,308926,308927,308928,308929,308931,308932,308933,308935,308936,308937,308938,308939,308940,308941,308942,308943,308944,308945,308946,308947,308948,308949,308950,308951,308952,308953,308954,308955,308956,308957,308958,308960,308961,308962,308963,308964,308965,308966,308967,308968,308969,308970,308971,308972,308973,308974,308975,308976,308977,308978,308979,308980,308981,308982,308983,308984,308985,308986,308987,308988,308989,308990,308991,308993,308994,308995,308996,308997,308998,308999,309000,309001,309002,309003,309004,309005,309007,309008,309009,309010,309011,309012,309013,309014,309015,309016,309017,309018,309019,309020,309021,309022,309023,309024,309025,309026,309027,309028,309029,309030,309031,309032,309033,309034,309035,309036,309037,309038,309039,309040,309041,309042,309043,309044,309045,309046,309047,309048,309049,309050,309051,309052,309053,309054,309055,309056,309057,309058,309059,309060,309061,309062,309063,309064,309065,309066,309067,309068,309069,309070,309071,309072,309073,309074,309075,309076,309077,309078,309079,309080,309081,309082,309083,309084,309085,309086,309087,309088,309089,309090,309091,309092,309093,309094,309095,309096,309097,309099,309100,309101,309102,309103,309104,309105,309106,309107,309108,309109,309110,309111,309112,309113,309114,309115,309116,309117,309118,309119,309120,309121,309122,309123,309124,309125,309126,309127,309128,309129,309130,309131,309132,309133,309134,309135,309136,309137,309138,309139,309140,309141,309142,309143,309144,309145,309146,309147,309148,309149,309150,309151,309152,309153,309154,309155,309156,309157,309158,309159,309160,309161,309162,309163,309164,309165,309166,309167,309168,309169,309170,309171,309172),
		// 	'584'  => array(309173,309174,309175,309176,309177,309178,309179,309180,309181,309183,309185,309186,309187,309188,309189,309190,309191,309192,309193,309194,309195,309196,309197,309198,309199,309200,309201,309202,309203,309204,309205,309206,309207,309209,309210,309211,309212,309213,309214,309215,309216,309217,309218,309219,309220,309221,309222,309223,309224,309225,309226,309227,309229,309230,309231,309232,309233,309235,309236,309237,309238,309239,309240,309241,309242,309243,309244,309245,309246,309247,309248,309249,309250,309251,309252,309253,309254,309255,309256,309257,309258,309259,309260,309261,309262,309263,309264,309265,309266,309267,309268,309269,309270,309271,309272,309273,309274,309275,309276,309277,309278,309279,309280,309281,309282,309283,309284,309285,309286,309287,309288,309289,309290,309291,309292,309293,309294,309295,309296,309297,309298,309299,309300,309301,309302,309303,309304,309305,309306,309307,309308,309309,309310,309311,309312,309313,309314,309315,309316,309317,309318,309319,309320,309321,309322,309323,309324,309325,309326,309327,309328,309329,309330,309331,309332,309333,309334,309335,309336,309337,309338,309339,309340,309341,309342,309343,309344,309345,309346,309347,309348,309349,309350,309351,309352,309353,309354,309355,309356,309357,309358,309359,309360,309361,309362,309363,309364,309365,309366,309367,309368,309369,309370,309371,309372,309373,309374,309375,309376,309377,309378,309379,309380,309381,309382,309383,309384,309385,309386,309387,309388,309389,309390,309391,309392,309393,309394,309395,309396,309397,309398,309399,309400,309401,309402,309403,309404,309405,309406,309407,309408,309409,309410,309411,309412,309413,309414,309415,309416,309417,309418,309419,309420,309421,309422,309423,309424,309425,309426,309427,309428,309429,309430,309431,309432,309433,309434,309435,309436,309437,309438,309439,309440,309441,309442,309443,309444,309445,309446,309447,309448,309449,309450,309451,309452,309453,309454,309455,309456,309457,309458,309459,309460,309461,309462,309463,309464,309465,309466,309467,309468,309469,309470,309471,309472,309473,309474,309475,309476,309477,309478,309479,309480,309481,309482,309483,309484,309485,309486,309487,309488,309489,309490,309491,309492,309493,309494,309495,309496,309497,309498,309499,309500,309501,309502,309503,309504,309505,309506,309507,309508,309509,309510,309511,309512,309513,309514,309515,309516,309517,309518,309519,309520,309521,309522,309523,309524,309525,309526,309527,309528,309529,309530,309531,309532,309533,309535,309536,309537,309538,309539,309540),
		// );


		$notes = 'Lead Move Request 02/24/2015';

		foreach($lead_user_ids as $key=>$value){
			$user_id = $key;
			//debug($user_id);

			$this->User->recursive = -1;
			$user_details = $this->User->findById($user_id);
			//debug($user_details);
			foreach($value as $contact_id){
				$this->_move_contact_to_user($user_details, $contact_id,  $notes);
			}
		}
	}

	private function _move_contact_to_user($user_details, $contact_id, $note)
    {
		//History Variable
		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		//Save history for user move
		$c_d =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array(),'conditions' => array(
			'Contact.id'=>$contact_id
		)));

		$this->Contact->saveFirstModified($c_d);

		$old_data = $c_d;
		$history_data = array();
		$history_data['user_id'] = $user_details['User']['id']; // for change log
		$history_data['changed_by'] = $user_details['User']['id'];
		$history_data['contact_id'] = $old_data['Contact']['id'];
		$history_data['sperson'] = $old_data['Contact']['sperson'];
		$history_data['cond'] = $old_data['Contact']['condition'];
		$history_data['year'] = $old_data['Contact']['year'];
		$history_data['make'] = $old_data['Contact']['make'];
		$history_data['model'] = $old_data['Contact']['model'];
		$history_data['type'] = $old_data['Contact']['type'];
		$history_data['sales_step'] = $old_data['Contact']['sales_step'];
		$history_data['status'] = $old_data['Contact']['status'];
		$history_data['modified'] = date('D - M d, Y g:i A');
		$history_data['created'] = $datetimetext;
		$history_data['comment'] = "Leads Pushed to ".$user_details['User']['full_name']." #".$user_details['User']['id']." from ".  $this->Auth->User('first_name'). " ". $this->Auth->User('last_name') ." #".$this->Auth->User('id')." - ".$note;
		$history_data['h_type'] = "Staff Transfer";
		$history = array(
			'History' => $history_data
		);
		$this->History->create();
		$this->History->save($history);

		$is_gsm =0;
		if( $this->Auth->user('group_id') == 2 ){
			$is_gsm =1;
		}

		App::uses('Sanitize', 'Utility');

		$internet_group_transfer = 0;
		if(in_array($this->Auth->user('group_id') , array('10','12','11')))
        {
			$internet_group_transfer =1;
		}

		if($old_data['Contact']['user_id'] == ''){

			//Update Contact
			$this->Contact->updateAll(
				array(
					'Contact.user_id'  => "'".$user_details['User']['id']."'",
					'Contact.owner_id' => "'".$user_details['User']['id']."'",
					'Contact.owner' =>   "'".$user_details['User']['full_name']."'",
					'Contact.sperson' => "'".Sanitize::escape($user_details['User']['full_name'])."'",
					'Contact.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
					'Contact.company_id' => "'".$user_details['User']['dealer_id']."'",
					'Contact.staff_transfer' => "'1'",
					'Contact.location_modified' => "'".$old_data['Contact']['modified']."'",
					'Contact.is_gsm' => "'".$is_gsm."'",
					'Contact.internet_group_transfer' => "'".$internet_group_transfer."'",

                    //add transfer location comments as notes in contact
                    //'Contact.notes' => "'".$history_data['comment']."'",
				),
				array('Contact.id' => $contact_id)
			);

		}else{

			//Update Contact
			$this->Contact->updateAll(
				array(
					'Contact.user_id' => "'".$user_details['User']['id']."'",
					'Contact.sperson' => "'".Sanitize::escape($user_details['User']['full_name'])."'",
					'Contact.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
					'Contact.company_id' => "'".$user_details['User']['dealer_id']."'",
					'Contact.staff_transfer' => "'1'",
					'Contact.location_modified' => "'".$old_data['Contact']['modified']."'",
					'Contact.is_gsm' => "'".$is_gsm."'",
					'Contact.internet_group_transfer' => "'".$internet_group_transfer."'",

                    //add transfer location comments as notes in contact
                    //'Contact.notes' => "'".$history_data['comment']."'",
				),
				array('Contact.id' => $contact_id)
			);
		}

		//Update event
		$this->Event->updateAll(
			array(
				'Event.user_id' => "'".$user_details['User']['id']."'",
			),
			array('Event.contact_id' => $contact_id)
		);

		//Update Deal
		$this->Deal->updateAll(
			array(
				'Deal.user_id' => "'".$user_details['User']['id']."'",
				'Deal.sperson' => "'".Sanitize::escape($user_details['User']['full_name'])."'",
				'Deal.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
				'Deal.company_id' => "'".$user_details['User']['dealer_id']."'"
			),
			array('Deal.contact_id' => $contact_id)
		);

		//Update lead sold table
		$this->loadModel('LeadSold');
		$sold_leads_count = $this->LeadSold->find('count', array('conditions' => array('LeadSold.contact_id'=>$contact_id)));

		if($sold_leads_count != 0) {
			$this->LeadSold->updateAll(
				array(
					'LeadSold.user_id' => "'".$user_details['User']['id']."'",
				//	'LeadSold.owner' => "'".$user_details['User']['full_name']."'",
					'LeadSold.sperson' => "'".Sanitize::escape($user_details['User']['full_name'])."'",
					'LeadSold.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
					'LeadSold.company_id' => "'".$user_details['User']['dealer_id']."'",
				),
				array('LeadSold.contact_id' => $contact_id)
			);
		}

		$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);
	}

	public function move_contact() {
		//debug($this->request->query);
		$contact_id = $this->request->data['Contact']['contact_id'];
		$user_id = $this->request->data['Contact']['user_id'];

		//History Variable
		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$this->User->recursive = -1;
		$user_details = $this->User->findById($user_id);
		//debug($user_details);

		$this->_move_contact_to_user($user_details, $contact_id,  $this->request->data['Contact']['note']);

		// CLEAR CACHE ON EDIT LEAD
		$this->requestAction('manage_cache/refresh/'.$user_details['User']['dealer_id']);


		//Save Event Start
		//debug($this->request->data);

		$contact_info = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
   		$this->set('contact_info',$contact_info);

		//Existing evetn udpate
		if(isset($this->request->data['Event']['id']) && $this->request->data['Event']['id'] != '' && $this->request->data['Event']['editevent'] == 'yes'){

			$this->request->data['Event']['start'] = '';
			if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
				$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
				$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
			}

			$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->request->data['Event']['form_used'] = 'short_1450';

			$this->Event->save($this->request->data);


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
			$history_data['created'] = 				$old_data['Event']['modified'];
			$history_data['start_date'] = 			$old_data['Event']['start'];
			$history_data['end_date'] = 			$old_data['Event']['end'];
			$history_data['form_used'] = 			$old_data['Event']['form_used'];

			$history_data['h_type'] = 				"Event";
			$history_data['sales_step'] = 			"Event";
			$history_data['sperson'] 	=			$old_data['Event']['sperson'];

			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

		}

		//New evetn Insert

		$ntitle = "";
		$nstart = "";
		$nstatus = "";

		if(isset($this->request->data['Newevent']['create']) && $this->request->data['Newevent']['create'] == 'yes'){

			//save event
			$this->request->data['Event'] = array();
			$this->request->data['Event']['user_id'] = $user_id;
			$this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->request->data['Event']['contact_id'] = $contact_id ;
			$this->request->data['Event']['sperson'] =  $contact_info['Contact']['sperson'];
			$this->request->data['Event']['first_name'] = $contact_info['Contact']['first_name'];
			$this->request->data['Event']['last_name'] = $contact_info['Contact']['last_name'];
			$this->request->data['Event']['email'] = $contact_info['Contact']['email'];
			$this->request->data['Event']['mobile'] = $contact_info['Contact']['mobile'];
			$this->request->data['Event']['phone'] = $contact_info['Contact']['phone'];

			$this->request->data['Event']['event_type_id'] = $this->request->data['Newevent']['event_type_id'];
			$this->request->data['Event']['title'] = $this->request->data['Newevent']['title'];
			$this->request->data['Event']['status'] = $this->request->data['Newevent']['status'];
			$this->request->data['Event']['details'] = $this->request->data['Newevent']['details'];

			$this->request->data['Event']['start'] = '';
			$this->request->data['Event']['end'] = '';
			if($this->request->data['Newevent']['start_date'] != '' && $this->request->data['Newevent']['start_time'] != ''){
				$this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Newevent']['start_date']." ".$this->request->data['Newevent']['start_time']));
				$this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
			}
			$this->request->data['Event']['form_used'] = 'short_1';
			$this->request->data['Event']['logged_user_id'] = $this->Auth->user('id');

			//debug($this->request->data);
			$this->Event->create();
			$this->Event->save($this->request->data);

			$ntitle = $this->request->data['Newevent']['title'];
			$nstart = $this->request->data['Event']['start'];
			$nstatus = $this->request->data['Newevent']['status'];


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
			$history_data['created'] = 				$old_data['Event']['modified'];
			$history_data['start_date'] = 			$old_data['Event']['start'];
			$history_data['end_date'] = 			$old_data['Event']['end'];
			$history_data['form_used'] = 			$old_data['Event']['form_used'];
			$history_data['h_type'] = 				"Event";
			$history_data['sales_step'] = 			"Event";
			$history_data['sperson'] 	=			$old_data['Event']['sperson'];

			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

		}

		//Save Event Ends


		//Send Email Alert Start

		$emailData = "Dealer Name: ".$contact_info['Contact']['company']." <br>";
		$emailData .= "Source: ".$contact_info['Contact']['source']." <br>";
		$emailData .= "Dealer ID: ".$contact_info['Contact']['company_id']." <br>";
		$emailData .= "ID: ".$contact_info['Contact']['id']." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$contact_info['Contact']['id']."' target='_blank' >(Open)</a><br>";
		$emailData .= "Name: ".$contact_info['Contact']['first_name']." ".$contact_info['Contact']['last_name']." <br>";
		$emailData .= "Address: ".$contact_info['Contact']['address'].", ".$contact_info['Contact']['city'].", ".$contact_info['Contact']['state'].", ".$contact_info['Contact']['zip']." <br>";
		$emailData .= "Mobile: ".$contact_info['Contact']['mobile']." <br>";
		$emailData .= "Phone: ".$contact_info['Contact']['phone']." <br>";
		$emailData .= "Work number: ".$contact_info['Contact']['work_number']." <br>";

		$emailData .= "Email: ".$contact_info['Contact']['email']." <br>";
		$emailData .= "Year: ".$contact_info['Contact']['year']." <br>";
		$emailData .= "Make: ".$contact_info['Contact']['make']." <br>";
		$emailData .= "Model: ".$contact_info['Contact']['model']." <br>";

		$pusher_email = $this->Auth->User('email');

		$email_reply_to = "";
		if($pusher_email != ''){
			$email_reply_to = $pusher_email;
		}else{
			$email_reply_to = "sender@dp360crm.com";
		}

		/**
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"push_notification",
			"New Lead pushed to ".$user_details['User']['full_name'],
			"sender",
			serialize(array(
				'emailData'=>$emailData,
				'username'=>$user_details['User']['full_name'],
				'pusher' =>  $this->Auth->User('first_name') ." ". $this->Auth->User('last_name'),
				'contact_id'=>$contact_id,
				'title'=>$ntitle,
				'start'=>$nstart,
				'status'=>$nstatus
			)),
			$email_reply_to,
			'move_lead_message',
			"sender@dp360crm.com",
			serialize($user_details['User']['email']),
			serialize(array(
				'andrew@dp360crm.com',
				'russel@dp360crm.com'
			))
		);

		//Send Email Alert end










		$this->autoRender = false;
		$this->Session->setFlash(__('Contact Moved'), 'alert');
		echo json_encode(array('status'=>'ok'));
	}
	//Transfer leads
	public function lead_transfer($contact_id){
		$group = $this->Auth->user('group_id');
		$dealer_id = $this->Auth->user('dealer_id');
		$contact =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.user_id'),'conditions' => array(
			'Contact.id'=>$contact_id
		)));
		$move_lead_allowed_group = array(1,2,3,4,5,6,7,8,9,10,11,12,13);

		$this->loadModel('DealerSetting');
		$move_lead_settings = $this->DealerSetting->find('first',array('fields' => 'name,value','conditions' => array('name'=> 'move_lead_allowed_group','dealer_id' => $dealer_id)));
	if(!empty($move_lead_settings))
	{
		$movelead_group = explode(',',$move_lead_settings['DealerSetting']['value']);
		if(!empty($movelead_group))
		$move_lead_allowed_group = $movelead_group;
	}
		if(in_array($group,$move_lead_allowed_group)){
			$timezone = $this->Auth->user('zone');
			$current_user_id = $this->Auth->user('id');
			$current_dealer_id = $this->Auth->user('dealer_id');

      //Check the Dealer Setting for pushing leads to Managers
      $this->loadModel('DealerSetting');
      $add_mgr_group_to_lead_push_options = $this->DealerSetting->get_settings('add_mgr_group_to_lead_push_options', $this->Auth->user('dealer_id'));

      if($add_mgr_group_to_lead_push_options == 'On'){
        $group_ids = 8;
      }else{
        $group_ids = array(6,7,8);
      }

			$users = $this->User->find("list", array('conditions'=>array(
				'User.dealer_id'=>$current_dealer_id,
				'User.group_id <> '=> $group_ids,
				'User.active'=>1,
				'User.id <>'=>$contact['Contact']['user_id']
      ),
        'order' => array('User.first_name')
    ));
			$this->set('users',$users);
		}
		$this->set('group',$group);
		$this->set('contact_id',$contact_id);

		//Current Event

		$follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");
		$this->set('follow_up_24',$follow_up_24);

		$eventinfo = $this->Event->find('first', array('recursive' => 0,'order'=>'Event.id DESC', 'conditions'=>array('Event.status <>' => array('Completed','Canceled'),'Event.contact_id' => $contact_id)));
		if(!empty($eventinfo)){

			$this->request->data['Event']['id'] = $eventinfo['Event']['id'];
			$this->request->data['Event']['event_type_id'] = $eventinfo['Event']['event_type_id'];
			$this->request->data['Event']['status'] = $eventinfo['Event']['status'];
			$this->request->data['Event']['title'] = $eventinfo['Event']['title'];
			$this->request->data['Event']['details'] = $eventinfo['Event']['details'];

			$this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
			$this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
			$this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
			$this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
		}


		$this->loadModel('DealerSetting');
		$auto_event_start_time = $this->DealerSetting->get_settings('auto_event_time', $this->Auth->user('dealer_id') );
		$auto_event_end_time =  date("h:i A",strtotime("+15 minute",  strtotime($auto_event_start_time)));

		$this->request->data['Newevent']['start_time'] = $auto_event_start_time;
		$this->request->data['Newevent']['end_time'] = $auto_event_end_time;

		if($follow_up_24 == 'On'){

			$this->request->data['Newevent']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
			$this->request->data['Newevent']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));

			$this->request->data['Newevent']['status'] = "Scheduled";
			$this->request->data['Newevent']['event_type_id'] = "13";
			$this->request->data['Newevent']['title'] = " Call Out to Customer";
			$this->request->data['Newevent']['details'] = "Call Out to Customer- ";
		}
		$this->request->data['Newevent']['details'] = "Call Out to Customer- ";




		//Event Details
		$appointment = $this->Event->find('first', array('recursive'=>-1,'order' => array('Event.modified DESC'),'conditions'=>array(
		'Event.contact_id'=>$contact_id,
		//'Event.user_id'=>$current_user_id,
		'Event.status <>' => array('Completed','Canceled'))));
		$this->set('appointment', $appointment);

   		$this->set('eventTypes', $this->EventType->find('list', array('conditions'=>['OR' => ['EventType.dealer_id IS NULL', 'EventType.dealer_id'=>$this->Auth->user('dealer_id')]] ,  'order'=>"EventType.id ASC")));


	}


	public function remove_duplicate_mark(){
		$contact_id = $this->params->query['contact_id'];
		$comment = $this->params->query['comment'];
		$dealer_id = $this->Auth->user('dealer_id');

		$c_d =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status'),'conditions' => array(
			'Contact.id'=>$contact_id
		)));

		$d_cs =  $this->Contact->find('all',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status'),'conditions' => array(
			'Contact.company_id'=>$dealer_id,
			'Contact.id <>'=>$c_d['Contact']['id'],
			'Contact.chk_duplicate'=>0,
			'Contact.status <>'=>'Duplicate-Closed',
			'Contact.first_name'=>$c_d['Contact']['first_name'],
			'Contact.last_name'=>$c_d['Contact']['last_name'],
		)));

		foreach($d_cs as $d_c){
			//Remove Mark
			$this->Contact->updateAll(
				array('Contact.chk_duplicate' => "'1'",'Contact.notes' => "'$comment'"),
				array('Contact.id' => $d_c['Contact']['id'])
			);
		}
		$this->autoRender = false;
		$this->Session->setFlash(__('Contact duplicate mark removed'), 'alert');
		echo json_encode(array('status'=>'ok'));

	}

	//< marge events  >
	public function merge_events($contact_id, $duplicate_contact_id){
		$this->autoRender = false;
		$events = $this->Event->find('all', array('recursive'=>-1,'conditions' => array(
			'Event.contact_id' => $contact_id,
			'Event.status <>' => array('Completed','Canceled')
		)));
		$event_ar = array();
		foreach($events as $event){
			$event_ar[ date('Y-m-d', strtotime($event['Event']['start']))  ] =  array(strtotime($event['Event']['start']), $event['Event']['id']) ;
		}
		//debug($event_ar);


		$events_dpulicate_leads = $this->Event->find('all', array('recursive'=>-1,'conditions' => array(
			'Event.contact_id' => $duplicate_contact_id,
			//'Event.status <>' => array('Completed','Canceled')
		)));
		//debug($events_dpulicate_leads);
		foreach($events_dpulicate_leads as $event){

			//debug('check matched');
			$e_date = date('Y-m-d', strtotime($event['Event']['start']));
			//debug($e_date);
			if( isset( $event_ar[$e_date] ) && $event['Event']['status'] != 'Completed'  && $event['Event']['status'] != 'Canceled'   ){
				//debug('same day found');
				if( $event_ar[$e_date][0] > strtotime($event['Event']['start']) ){
					//debug("cancel events from duplicate lead");
					//cancel event from duplicate lead
					$this->Event->updateAll(
						array(
							'Event.status' => "'Canceled'",
							'Event.contact_id' => "'".$contact_id."'"
						),
						array('Event.id' => $event['Event']['id'])
					);
					//debug($event['Event']['id']);
				}else{
					//cancel event from merging lead and update contact id for duplicate lead event
					//cancel event
					$this->Event->updateAll(
						array('Event.status' => "'Canceled'",),
						array('Event.id' => $event_ar[$e_date][1])
					);
					//udpate contact id
					$this->Event->updateAll(
						array('Event.contact_id' => "'".$contact_id."'",),
						array('Event.id' => $event['Event']['id'])
					);
					//debug('win - '.$event['Event']['id'] );
				}
			}else{
				//udpate contact id
				$this->Event->updateAll(
					array('Event.contact_id' => "'".$contact_id."'",),
					array('Event.id' => $event['Event']['id'])
				);

				//Close all old events
				//debug("close future event");
				$current_events = $this->Event->find("all", array('recursive'=>-1,
					'order' => "Event.start asc",
					'conditions'=>array(
						'Event.status <>'=> array('Completed', 'Canceled'),
						'Event.contact_id' =>  $contact_id
					)
				));

				if(count($current_events) > 1){
					$active_event = $current_events['0']['Event']['id'];
				}
				//Close future events
				$this->Event->updateAll(
					array('Event.status' => "'Canceled'",),
					array('Event.id <>' => $active_event, 'Event.contact_id' => $contact_id )
				);

			}

		}
	}
	//< marge events end  />

	public function merge_contact($last_one_month = 'yes'){
	//	debug($this->params->query);
		$contact_id = $this->params->query['contact_id'];
		$comment = $this->params->query['comment'];

		$dealer_id = $this->Auth->user('dealer_id');
		$duplicate_lead_ids = $this->params->query['duplicates'];
		//debug($duplicate_lead_ids);

		//History Variables
		$timezone = $this->Auth->user('zone');
		$current_user_id = $this->Auth->user('id');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$c_d =  $this->Contact->find('first',array('recursive'=>-1,'conditions' => array(
			'Contact.id'=>$contact_id
		)));

		//Check for if the master lead has empty phone numbers
		$update_phone_master = false;
		$update_master_phone_fields = array();
		if( $c_d['Contact']['phone'] == '' && $c_d['Contact']['mobile'] == '' && $c_d['Contact']['work_number'] == '' ){
			$update_phone_master = true;
			$update_master_phone_fields['id'] = $c_d['Contact']['id'];
		}



		$cond = array(
			'Contact.company_id'=>$dealer_id,
			'Contact.id'=>$duplicate_lead_ids,
		);
		$d_cs =  $this->Contact->find('all',array('recursive'=>-1,'conditions' =>$cond));

		$merged_leads = array();
		$merger_lead_ids_ar = array();

		$notes_from_duplicate_leads = "";

		foreach($d_cs as $d_c){

			if($update_phone_master == true){
				$db = $this->Contact->getDataSource();

				if( $d_c['Contact']['phone'] != '' ){
					$update_master_phone_fields['phones']['Contact.phone'] =  $db->value($d_c['Contact']['phone'], 'string');
				}
				if( $d_c['Contact']['mobile'] != '' ){
					$update_master_phone_fields['phones']['Contact.mobile'] = $db->value($d_c['Contact']['mobile'], 'string');
				}
				if( $d_c['Contact']['work_number'] != '' ){
					$update_master_phone_fields['phones']['Contact.work_number'] = $db->value($d_c['Contact']['work_number'], 'string');
				}
			}

			$notes_from_duplicate_leads .=  " <br> #".$d_c['Contact']['id'].": <br> ".$d_c['Contact']['notes'];

			//Set status duplicate for lower steps
			$this->Contact->updateAll(
				array('Contact.status' => "'Duplicate-Closed'",'Contact.notes' => "'$comment'"),
				array('Contact.id' => $d_c['Contact']['id'])
			);


			//Merge Histories
			$histories = $this->History->find('all', array('conditions' => array('History.contact_id' => $d_c['Contact']['id'])));
			foreach($histories as $history){
				$this->History->create();
				$new_history = $history;
				$new_history['History']['contact_id'] = $contact_id;
				$new_history['History']['user_id'] = $current_user_id;
				unset($new_history['History']['id']);
				$this->History->save($new_history);
			}

			//Merge BDC Surveys
			$this->loadModel('BdcSurvey');
			$bdcSurveys = $this->BdcSurvey->find('all', array('recursive'=>-1,'conditions' => array('BdcSurvey.bdc_lead_id' => $d_c['Contact']['id'])));
			foreach($bdcSurveys as $bdcSurvey){
				$new_bdcSurvey = $bdcSurvey;
				$new_bdcSurvey['BdcSurvey']['bdc_lead_id'] = $contact_id;
				unset($new_bdcSurvey['BdcSurvey']['id']);
				$this->BdcSurvey->create();
				$this->BdcSurvey->save($new_bdcSurvey);
			}


			//Merge Events
			/*
			$events = $this->Event->find('all', array('recursive'=>-1,'conditions' => array('Event.contact_id' => $d_c['Contact']['id'])));
			foreach($events as $event){
				$new_event = $event;
				$new_event['Event']['contact_id'] = $contact_id;
				unset($new_event['Event']['id']);
				$this->Event->create();
				$this->Event->save($new_event);
			}
			*/
			$this->merge_events($contact_id, $d_c['Contact']['id']);


			$merged_leads[] = "#".$d_c['Contact']['id'];
			$merger_lead_ids_ar[] = $d_c['Contact']['id'];

			//Save history for duplicate leads
			$old_data = $d_c;
			$history_data = array();
			$history_data['user_id'] = $old_data['Contact']['user_id']; // for change log
			$history_data['changed_by'] = $current_user_id;
			$history_data['contact_id'] = $old_data['Contact']['id'];
			$history_data['sperson'] = $old_data['Contact']['sperson'];
			$history_data['cond'] = $old_data['Contact']['condition'];
			$history_data['year'] = $old_data['Contact']['year'];
			$history_data['make'] = $old_data['Contact']['make'];
			$history_data['model'] = $old_data['Contact']['model'];
			$history_data['type'] = $old_data['Contact']['type'];
			$history_data['sales_step'] = $old_data['Contact']['sales_step'];
			$history_data['status'] = $c_d['Contact']['status'];
			$history_data['modified'] = date('D - M d, Y g:i A');
			$history_data['created'] = $datetimetext;
			$history_data['comment'] = "This Lead is merged with #".$contact_id." - ".$comment;
			$history_data['field_changed'] = "This Lead is merged with #".$contact_id;
			$history_data['h_type'] = "Merge";
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);



			//Save current state of the duplicate lead
			$ret = $d_c;
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
			$history_data['h_type'] = 'Lead_duplicate';
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

			$this->requestAction('manage_cache/clear_contact_cache/'.$ret['Contact']['id']);




        }

		//$merged_leads[] = "#".$old_data['Contact']['id'];
		$notes = implode(", ",$merged_leads)." ";

		//Save History for main lead
		$old_data = $c_d;
		$history_data = array();
		$history_data['user_id'] = $old_data['Contact']['user_id']; // for change log
		$history_data['changed_by'] = $current_user_id;
		$history_data['contact_id'] = $old_data['Contact']['id'];
		$history_data['sperson'] = $old_data['Contact']['sperson'];
		$history_data['cond'] = $old_data['Contact']['condition'];
		$history_data['year'] = $old_data['Contact']['year'];
		$history_data['make'] = $old_data['Contact']['make'];
		$history_data['model'] = $old_data['Contact']['model'];
		$history_data['type'] = $old_data['Contact']['type'];
		$history_data['sales_step'] = $old_data['Contact']['sales_step'];
		$history_data['status'] = $old_data['Contact']['status'];
		$history_data['modified'] = $old_data['Contact']['modified_full_date'];
		$history_data['created'] = $datetimetext;
		$history_data['comment'] = "Merged with ".$notes." - ".$comment;
		$history_data['h_type'] = "Merge";
		$history = array(
			'History' => $history_data
		);
		$this->History->create();
		$this->History->save($history);

		//update $merger_lead_ids_ar
		if($old_data['Contact']['merger_lead_ids'] != ''){
			$new_merger_lead_ids = array_merge($merger_lead_ids_ar, explode(",", $old_data['Contact']['merger_lead_ids']) );
		}else{
			$new_merger_lead_ids	= $merger_lead_ids_ar;
		}
		$merger_lead_ids = implode(",", $new_merger_lead_ids);
		$this->Contact->id = $old_data['Contact']['id'];
		$this->Contact->saveField('merger_lead_ids',$merger_lead_ids);

		//New Note
		$notes_from_duplicate_leads = $c_d['Contact']['notes']." -  ".$notes_from_duplicate_leads;
		$this->Contact->saveField('notes', $notes_from_duplicate_leads);


		//Update master phone numbers if empty
		//debug($update_master_phone_fields['phones']);
		if(!empty($update_master_phone_fields) && isset($update_master_phone_fields['phones']) ){
			CakeLog::write('update_master_phone_numbers', json_encode($update_master_phone_fields));
			$this->Contact->updateAll(
				$update_master_phone_fields['phones'],
				array('Contact.id' => $update_master_phone_fields['id'])
			);
		}






		// CLEAR CACHE ON EDIT LEAD
		$this->requestAction('manage_cache/refresh/'.$dealer_id);
		$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);


		$this->autoRender = false;
		$this->Session->setFlash(__('Contact Merged'), 'alert');
		echo json_encode(array('status'=>'ok'));
	}

	public function merge_all_matched($contact_id, $last_one_month = 'yes'){

		$this->set('last_one_month', $last_one_month);

		$dealer_id = $this->Auth->user('dealer_id');

		//get sales step
		$this->loadModel('SalesStep');
		$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
		foreach($sales_steps as $sales_step){
			$sales_step_opt[] = $sales_step['SalesStep']['step'];
		}
		//debug($sales_step_opt);

		$contact_list = array();

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
			'Contact.lead_status',
			'Contact.sales_step',
			'Contact.status',
			'Contact.notes',
			'Contact.chk_duplicate',
			'Contact.sperson',
			'Contact.source',
			'Contact.owner',
			"(SELECT comment FROM histories WHERE h_type = 'Lead' AND contact_id = Contact.id ORDER BY id DESC LIMIT 1) as last_comment ",

		);

		$c_d =  $this->Contact->find('first',array('recursive'=>0,'fields'=>$fields,'conditions' => array(
			'Contact.id'=>$contact_id
		)));
		//debug($c_d);

		$cond = array(
			'Contact.company_id'=>$dealer_id,
			'Contact.id <>'=>$c_d['Contact']['id'],
			'Contact.chk_duplicate'=>0,
			'Contact.status <>'=>'Duplicate-Closed',
			'Contact.lead_status'=>'Open',
			'Contact.sales_step <>'=>'10',
			//'Contact.first_name'=>$c_d['Contact']['first_name'],
			//'Contact.last_name'=>$c_d['Contact']['last_name'],
		);


		$cond['OR'][] = array('Contact.first_name'=>$c_d['Contact']['first_name'], 'Contact.last_name'=>$c_d['Contact']['last_name']  );

		$phone_array = array();
		if($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] != null && $c_d['Contact']['mobile'] != '0000000000' && $c_d['Contact']['mobile'] != '1111111111' && $c_d['Contact']['mobile'] != '9999999999'   ){
			$phone_array[] = $c_d['Contact']['mobile'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] != null && $c_d['Contact']['phone'] != '0000000000'  && $c_d['Contact']['phone'] != '1111111111' && $c_d['Contact']['phone'] != '9999999999'   ){
			$phone_array[] = $c_d['Contact']['phone'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] != null && $c_d['Contact']['work_number'] != '0000000000'  && $c_d['Contact']['work_number'] != '1111111111' && $c_d['Contact']['work_number'] != '9999999999'  ){
			$phone_array[] = $c_d['Contact']['work_number'];
			$checkduplicate = true;
		}
		if(!empty($phone_array)){
			$cond['OR']['Contact.mobile'] =  $phone_array;
			$cond['OR']['Contact.phone'] =  $phone_array;
			$cond['OR']['Contact.work_number'] =  $phone_array;
		}


		$one_month = date('Y-m-d H:i:s', strtotime("-60 days"));
		//debug($one_month);
		if( $last_one_month == 'yes'){
			$cond['Contact.modified >='] =  $one_month;
			//$cond['date_format(Contact.modified,\'%Y-%m\')'] = date('Y-m');
		}

		$d_cs =  $this->Contact->find('all',array('order'=>'Contact.modified DESC','recursive'=>0,'fields'=>$fields,'conditions' => $cond));
		$contact_list[ $c_d['Contact']['id'] ] = $c_d;
		foreach($d_cs as $d_c){
			$contact_list[ $d_c['Contact']['id'] ] = $d_c;
		}
		//debug($contact_list);
		$steps = array();
		foreach($contact_list as $cl){
			if($cl['Contact']['sales_step'] != ''){
				$step = array_search($cl['Contact']['sales_step'],$sales_step_opt);
				$steps[$step] = $cl['Contact']['id'];
			}
		}
		arsort($steps);

		$merge_step = current($steps);
		$this->set('merge_step',$merge_step);
		//debug($merge_step);

		$this->set('contact_list',$contact_list);

		//debug($contact_list);
		$list_by_modified_contact_id = array();

		$unix_time_for_sold = strtotime("+2 day");

		$count_flag = 1;
		foreach($contact_list as $con_list){

			//Move Sold items always top
			if($con_list['Contact']['sales_step'] == '10'){
				$list_by_modified_contact_id[ strtotime($con_list['Contact']['modified']) + $count_flag + $unix_time_for_sold  ] = $con_list['Contact']['id'];
			}else{
				$list_by_modified_contact_id[ strtotime($con_list['Contact']['modified']) + $count_flag ] = $con_list['Contact']['id'];
			}

			$count_flag ++;
		}
		//debug($list_by_modified_contact_id);
		krsort($list_by_modified_contact_id);
		//debug($list_by_modified_contact_id);
		$this->set('list_by_modified_contact_id',$list_by_modified_contact_id);




		$dup_count = array();
		if($last_one_month == 'yes'){
			$dup_count['yes'] = count($d_cs) +1 ;
			$cond_y = $cond;
			//unset($cond_y['date_format(Contact.modified,\'%Y-%m\')']);
			unset($cond_y['Contact.modified >=']);


			//debug($cond_y);
			$dup_count['no'] = $this->Contact->find('count',array('order'=>'Contact.created DESC','recursive'=>0,'fields'=>$fields,'conditions' => $cond_y));
			$dup_count['no'] = $dup_count['no'] + 1;
		}else if($last_one_month == 'no'){
			$dup_count['no'] = count($d_cs) + 1;
			$cond_y = $cond;
			$cond_y['Contact.modified >='] = $one_month;
			//debug($cond_y);
			$dup_count['yes'] = $this->Contact->find('count',array('order'=>'Contact.created DESC','recursive'=>0,'fields'=>$fields,'conditions' => $cond_y));
			$dup_count['yes'] = $dup_count['yes'] + 1;
		}
		//debug($dup_count);
		$this->set('dup_count', $dup_count);

		//debug($c_d);
		//debug($d_cs);


		//$sales_step_options = $this->requestAction('dashboards/get_dealer_steps');
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('sales_step_options', $sales_step_options);

	}

	public function clear_session(){
		$session_path = APP.'tmp'.DS.'sessions';

		debug( $session_path );
		//$this->Session->destroy();
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');

		$dir = new Folder($session_path);
		$files = $dir->find(".*");
		debug($files);
		foreach($files as $f){
			//$file = new File($dir . DS . $itemId . DS . $imgName);
    		//$file->delete();
		}
	}

	private function _update_event($user_id, $contact_id){

		$user = $this->User->read(array('full_name'), $user_id);

		$this->Event->updateAll(
			array(
				'Event.user_id' => "'".$user_id."'",
				'Event.sperson' => "'".$user['User']['full_name']."'",
			),
			array('Event.contact_id' => $contact_id)
		);

	}


	private function _get_history($contact_id){

		$new_contacts = $this->Contact->query("
		select  History.id, History.contact_id,  History.user_id, History.sperson,  History.changed_by, History.h_type  from histories  as History where
		History.h_type = 'Lead' AND History.contact_id = '".$contact_id."' order by  History.id DESC");
		return $new_contacts;

	}

	private function _update_sperson_user_id($user_id,  $contact_id){

		$user = $this->User->read(array('full_name'), $user_id);

		$this->Contact->updateAll(
			array(
				'Contact.user_id' => "'".$user_id."'",
				'Contact.sperson' => "'".$user['User']['full_name']."'",
			),
			array('Contact.id' => $contact_id)
		);


	}
	private function _update_owner($user_id,  $contact_id){

		$user = $this->User->read(array('full_name'), $user_id);

		$this->Contact->updateAll(
			array(
				'Contact.owner_id' => "'".$user_id."'",
				'Contact.owner' => "'".$user['User']['full_name']."'",
			),
			array('Contact.id' => $contact_id)
		);


	}



	public function upate_owner_id(){

		$new_contacts = $this->Contact->query("
		select distinct Contact.id, Contact.company_id, Contact.`owner`, Contact.`owner_id`, Contact.sperson, Contact.user_id  from histories  as History
		LEFT JOIN contacts as Contact ON (`Contact`.`id` = `History`.`contact_id`)
		where History.changed_by <> History.user_id  AND History.h_type = 'Lead'
		order by  Contact.company_id, Contact.id");
		//debug($new_contacts);

		//$this->_update_event(58, 20396);

		foreach($new_contacts as $new_contact){
			if($new_contact['Contact']['id'] != '' ){
				$his = $this->_get_history($new_contact['Contact']['id']);
				//debug($his);
				if($his[0]['History']['user_id'] != $his[0]['History']['changed_by']){
					$this->_update_sperson_user_id($his[0]['History']['changed_by'],  $new_contact['Contact']['id']);
					$this->_update_event($his[0]['History']['changed_by'], $new_contact['Contact']['id']);
				}

				$this->requestAction('manage_cache/clear_contact_cache/'.$new_contact['Contact']['id']);
			}
		}

	}


	public function tmp_cancel_dead_event(){

		date_default_timezone_set( $this->Auth->user('zone') );
		$datetimetext = date('Y-m-d H:i:s');

		$dead_events = $this->Contact->query("
		SELECT Event.* FROM `events` AS `Event`
		LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
		LEFT JOIN lead_statuses as LeadStatus ON (`LeadStatus`.`name` = `Contact`.`status`)
		WHERE  LeadStatus.header <> 'Sold Deal (Closed)'
		AND Contact.lead_status = 'Closed'
		AND `Event`.`status` NOT IN ('Completed','Canceled')
		");
		//debug($dead_events);


		foreach($dead_events as $event){

			$this->Event->updateAll(
				array(
					'Event.status' => "'Canceled'",
					'Event.modified' => "'".$datetimetext."'",
				),
				array('Event.id' => $event['Event']['id'])
			);

			//History Entry
			$old_data = $event;
			$history_data = array();
			$history_data['contact_id'] = 			$old_data['Event']['contact_id'];
			$history_data['event_id'] = 			$old_data['Event']['id'];
			$history_data['customer_name'] = 		$old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
			$history_data['make'] = 				$old_data['EventType']['name'];
			$history_data['model'] = 				date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
			$history_data['status'] = 				"Canceled";
			$history_data['comment'] = 				"Event Canceled - Closed Dead Lead - ".$old_data['Event']['details'];
			$history_data['notes'] = 				$old_data['Event']['title'];
			$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($datetimetext));
			$history_data['created'] = 				$datetimetext;
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

			$this->requestAction('manage_cache/clear_contact_cache/'.$old_data['Event']['contact_id']);

		}



	}









	public function send_emails(){
		//phpinfo();
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->config('sender');
		$email->viewVars(array('email_content'=>'test messae'));
		$email->template('internal_message')
			->emailFormat('html')
			->subject('test mail from cron')
			->from('andrew@dp360crm.com')
			->to('russel@dp360crm.com')
			->cc(array('awrussel2002@yahoo.com'=>'russel'))
			->replyTo(array('andrew@dp360crm.com'=>'Tod'))
			->send();

	}


	public function merge_dups(){

		/*
		$main_lead = '2526450';
		$duplicate_leads = array(
			'2526450'
			'2526369',
		 	'2526373',
			'2526374'
		);
		$this->requestAction(array("controller" => 'contacts_manage','action'=>'test_query', "no", "?"=>array('main_lead'=>$main_lead,'duplicates'=>$duplicate_leads)));
		*/

        $contacts = $this->Contact->find('all', array(
    		'recursive' => -1,
    		'fields' => array('Contact.id','Contact.first_name', 'Contact.last_name','Contact.modified'),
    		'order' => array('Contact.first_name', 'Contact.last_name'),
            'conditions' => array(
            	'Contact.source' => "Dans Data",
            	'Contact.status <> ' => 'Duplicate-Closed' ,
	       						//  	'Contact.id' => array(
								// 	'2526450',
								// 	'2526369',
								//  	'2526373',
								// 	'2526374'
								// )
            ),
        ));

        $duplicates = array();
        foreach($contacts as $contact){
        	$duplicates[ $contact['Contact']['first_name']. $contact['Contact']['last_name']	 ][] = $contact;
        }

        // debug($duplicates);
        foreach($duplicates as $dup){

        	if(count($dup) > 1){
        		// debug( $dup );

        		//find latest
        		$dupar = array();
        		foreach($dup as $ds){
					// debug( $ds );
        			$dupar[ strtotime( $ds['Contact']['modified'] ) ] = $ds['Contact']['id'];
        		}
        		// debug( $dupar );
        		krsort($dupar);
        		// debug( $dupar );

        		//Merge
        		$main_lead = "";
        		$duplicate_leads = array();
        		$cnt = 1;
        		foreach($dupar as $dleads){
        			if($cnt == 1){
        				$main_lead = $dleads;
        			}else{
        				$duplicate_leads[] = $dleads;
        			}
        			$cnt++;
        		}
        		debug($main_lead);
        		debug($duplicate_leads);
        		debug("-------------------------------");
        		$this->requestAction(array("controller" => 'contacts_manage','action'=>'merge_contact', "no", "?"=>array('contact_id'=>$main_lead,'duplicates'=>$duplicate_leads)));




        	}
        }





	}
































}
