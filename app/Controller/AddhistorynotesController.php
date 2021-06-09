<?php
class AddhistorynotesController extends AppController {

    public $uses = array('Contact', 'History','Users', 'Event');
    public $components = array('RequestHandler','Utility');

	public function beforeFilter() {

		parent::beforeFilter();
	}


	function add_signoff_history($dealer_id = '263'){

		$rets = $this->Contact->find('all',array('recursive' => -1, 'conditions'=>array('Contact.company_id'=> $dealer_id, 'Contact.mgr_signoff <>' => '' )));
		foreach($rets as $ret){


			// debug($ret['Contact']['id']);

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

			$pass = $this->Auth->password( $ret['Contact']['mgr_signoff'] );

			//History Entry for MGR item
			$mgr_user_name = $this->User->find('first', array('recursive' => -1,'conditions' => array( "User.dealer_id" => $dealer_id,   'User.password' => $pass )));


			$signoff_history_data = $history_data;
			$signoff_history_data['h_type'] = 'MGR Check';
			$signoff_history_data['event_id'] = $mgr_user_name['User']['id'];
			$signoff_history_data['comment'] = "Signed off by: ".$mgr_user_name['User']['first_name']." ".$mgr_user_name['User']['last_name'].", <br> " . "Date: ".date('D - M d, Y g:i A', strtotime($ret['Contact']['created']));

			// $this->History->create();
			// $this->History->save(array(
			// 	'History' => $signoff_history_data
			// ));




		}



	}








	public function get_crm_move_history($contact_id){
		$history = $this->History->find("first", array('recursive' => -1, 'conditions' => array("History.contact_id"=>$contact_id,'History.h_type' => 'New CRM Move') ));
		return $history;
	}


	public function check_crm_move_history($contact_id){
		$history = $this->History->find("count", array('recursive' => -1, 'conditions' => array("History.contact_id"=>$contact_id,'History.h_type' => 'Lead') ));
		return $history;
	}

	public function get_data_id($leadid){
		$dataid = $this->Contact->query("select id, `Client_Id` from `imp_great_bay_marine_legacy_data_stage3` where id = :leadid ", array('leadid'=>$leadid) );
		return $dataid;
	}


	public function get_comments($data_id){
		$get_comments = $this->Contact->query("select * from `imp_23_0023_Note_01112017_1153` where contact_id = :ID order by `ModifiedOn` asc ", array('ID'=>$data_id) );
		return $get_comments;
	}

	public function get_comments_event($data_id){
		$get_comments = $this->Contact->query("select * from `imp_fox_harley_notes_all_stage1`  where lead_id = :ID and NoteCreatedDate >= '2016-08-19 00:00:00' order by NoteCreatedDate asc limit 1", array('ID'=>$data_id) );
		return $get_comments;
	}

	public function history_note($start_lead_id = null){

		$start_lead_cond = "";
		if($start_lead_id != null){
			$start_lead_cond = " and id > $start_lead_id ";
		}
		$query_str = "select first_name, last_name, company_id, user_id, sperson, id, leadid, vin_trade from contacts where  ref_num = '23_1485922620' and company_id = '23' ".$start_lead_cond." order by id asc limit 1000";
		echo $query_str."<br><br>";

		$contacts = $this->Contact->query($query_str);
		// debug($contacts);

		$last_contact = "";

		// debug($contacts);
		$contacts = array();
		foreach($contacts as $contact){

			$comments = $this->get_comments( $contact['contacts']['vin_trade'] );
			// debug($contact);
			// debug( $comments );

			// $comments = array();
			if(!empty($comments)){

				// debug($contact['contacts']['id']);
				// debug($comments);
				// $first_history = $this->get_crm_move_history($contact['contacts']['id']);

				// $comments = array();
				// debug($contact);
				// debug($comments);
				foreach ($comments as $cmt) {



					$h_data = array();
					$h_data['History']['contact_id'] = $contact['contacts']['id'];
					$h_data['History']['dealer_id'] = $contact['contacts']['company_id'];
					$h_data['History']['sperson'] = $cmt['imp_23_0023_Note_01112017_1153']['CreatedByName'];



					$h_type = "Lead";
					// if($cmt['imp_23_0023_Note_01112017_1153']['LastContactType']  == 'Email'){
					// 	$h_type = 'Email';
					// }

					$h_data['History']['h_type'] = $h_type ;
					// $h_data['History']['status'] = $cmt['imp_23_0023_Note_01112017_1153']['LastContactType'];


					$h_data['History']['status'] = $cmt['imp_23_0023_Note_01112017_1153']['CreatedOn'] ." - ". $cmt['imp_23_0023_Note_01112017_1153']['id'] ;

					$h_data['History']['created'] = $cmt['imp_23_0023_Note_01112017_1153']['ModifiedOn'] ;
					$h_data['History']['modified'] = $cmt['imp_23_0023_Note_01112017_1153']['ModifiedOn'];

					$h_data['History']['comment'] = $cmt['imp_23_0023_Note_01112017_1153']['NoteText'] ;
					$h_data['History']['form_used'] = 'imp_23_6' ;
					// $h_data['History']['make'] = $cmt['imp_velocity_notes_stage1']['subject'] ;

					// debug( $h_data );

					$this->History->create();
					$this->History->save($h_data);


					/*
					// debug( $cmt );
					$tmpar = $first_history['History'];
					unset($tmpar['id']);
					$tmpar['h_type'] = 'Lead';
					$tmpar['sperson'] = $cmt['imp_prox_notes_stage1']['CreatedBy'];
					$tmpar['status'] = $cmt['imp_prox_notes_stage1']['LastContactType'].' <br> #'. $cmt['imp_prox_notes_stage1']['id_num'] ;
					$tmpar['comment'] = $cmt['imp_prox_notes_stage1']['Body'];
					$tmpar['created'] = $cmt['imp_prox_notes_stage1']['NoteCreatedDate'];
					$tmpar['form_used'] = "2138_imp";
					$history_data[] = $tmpar;

					debug( $tmpar );
					$this->History->create();
					$this->History->save(array('History'=>$tmpar));
					*/
				}


			}



			$last_contact = $contact['contacts']['id'];
		}

		echo "<a href='/addhistorynotes/history_note/{$last_contact}'>".$last_contact."</a>";

		$this->autoRender = false;


	}

	public function history_create_events($start_lead_id = null){

		$start_lead_cond = "";
		if($start_lead_id != null){
			$start_lead_cond = " and id > $start_lead_id ";
		}
		$query_str = "select first_name, last_name, company_id, user_id, sperson, id, leadid from contacts where `status` <> 'Duplicate-Closed' AND company_id = '161' and ref_num = '161_20161005'   ".$start_lead_cond."  order by id asc LIMIT 500";
		echo $query_str."<br><br>";

		$contacts = $this->Contact->query($query_str);
		// debug($contacts);

		$last_contact = "";

		// debug($contacts);
		// $contacts = array();
		foreach($contacts as $contact){

			// $data_id = $this->get_data_id($contact['contacts']['leadid']);
			// debug($data_id);

			// $comments = $this->get_comments_event( $contact['contacts']['leadid'] );
			// debug($comments);

			// $comments = array();
			// if(!empty($comments) ){

				$cmt = $comments[0];

				$event_type = '13';
				// $evetn_start = $cmt['imp_fox_harley_notes_all_stage1']['NextContactDate'];
				// $evetn_end = date( "Y-m-d H:i:s",  strtotime('+15 minute', strtotime($cmt['imp_fox_harley_notes_all_stage1']['NextContactDate']) ) );
				$evetn_start = "2016-10-03 10:00:00";
				$evetn_end = "2016-10-03 10:15:00";


				$this->Event->create();
				$this->Event->save(array('Event'=>array(
					'contact_id' => $contact['contacts']['id'],
					'event_type_id' => $event_type,
					'dealer_id' => $contact['contacts']['company_id'],
					'title' => 'Call Out to Customer',
					'details' => 'Call Out to Customer',
					'start' => $evetn_start,
					'end' => $evetn_end,
					'status' => 'Scheduled',
					'active' => '1',
					'form_used' => '161_act10',
					'user_id' => $contact['contacts']['user_id'],
					'sperson' => $contact['contacts']['sperson']
				)));

				$eventid = $this->Event->id;

				//Crate History Events
				$this->History->create();
				$this->History->save(array('History'=>array(
					'contact_id' => $contact['contacts']['id'],
					'event_id' => $eventid,
					'sperson' => $contact['contacts']['sperson'],
					'comment' => 'Call Out to Customer',
					'status' => 'Scheduled',
					'h_type' => 'Event',
					'notes' => 'Call Out to Customer',
					'start_date' => $evetn_start,
					'end_date' => $evetn_end,
					'form_used' => '161_act9',
					'created' => '2016-09-08 10:00:51',
					'modified' => 'Thu - Sep 08, 2016 10:00 AM'
				)));

			// }

			$last_contact = $contact['contacts']['id'];
		}

		// echo "<a href='/addhistorynotes/history_create_events/{$last_contact}'>".$last_contact."</a>";

		$this->autoRender = false;


	}


	public function history_memo(){

		// //get lead_ids
		// $contacts = $this->Contact->query("select id, leadid from contacts where company_id = '1729' and ref_num = '1729_20150607' ");
		// //debug($contacts);


		// foreach($contacts as $contact){

		// 	$first_history = $this->get_crm_move_history($contact['contacts']['id']);
		// 	//debug($first_history);

		// 	$ck_history = $this->check_crm_move_history($contact['contacts']['id']);
		// 	//debug($ck_history);

		// 	if($ck_history == 0){

		// 		$memos = $this->Contact->query("select * from steerintrailers_memos where customer_id = :customer_id", array("customer_id"=>$contact['contacts']['leadid']));
		// 		//debug($memos);

		// 		$cnt = 1;
		// 		foreach ($memos as $cmt) {
		// 			$tmpar = $first_history['History'];
		// 			unset($tmpar['id']);
		// 			$tmpar['h_type'] = 'Lead';
		// 			$tmpar['dealer_id'] = '1729';
		// 			$tmpar['sperson'] = $cmt['steerintrailers_memos']['Last modified by'];
		// 			$tmpar['sales_step'] = $cmt['steerintrailers_memos']['Type'];


		// 			$tmpar['status'] = $cmt['steerintrailers_memos']['Memo'];
		// 			$tmpar['cond'] = $cmt['steerintrailers_memos']['Item'];


		// 			$tmpar['comment'] = $cmt['steerintrailers_memos']['notes_crm'];

		// 			$tmpar['created'] = date("Y-m-d: H:i:s", strtotime("+".$cnt." second",  strtotime($cmt['steerintrailers_memos']['created'])));

		// 			$tmpar['form_used'] = "1729_imp";
		// 			$tmpar['modified'] = date("D - M d, Y g:i A",strtotime($cmt['steerintrailers_memos']['created']));
		// 			$this->History->create();
		// 			$this->History->save(array('History'=>$tmpar));
		// 			$cnt++;
		// 		}

		// 	}




		// }


	}




	public function load_crm_access(){

		$this->loadModel("User");

		$dup_users = $this->User->query("select usr1.username from users as usr1 group by username having count(usr1.username) > 1 order by usr1.username");
		//debug($dup_users);
		foreach($dup_users as $du){

			$cuser = $this->User->find("all", array(
				'fields' => array('User.id','User.username','User.dealer_id', 'User.dealer'),
				"conditions"=>array('User.username' => $du['usr1']['username']
			)));
			//debug($cuser);
			$dealer_id_collection = array();
			foreach($cuser as $cus){
				$dealer_id_collection[] = $cus['User']['dealer_id'];
			}
			$dealer_id_collection_str = implode(",", $dealer_id_collection);
			//debug($dealer_id_collection_str);

			//Update other_locations
			foreach($cuser as $cus){
				$this->User->id = $cus['User']['id'];
				$this->User->saveField('other_locations', $dealer_id_collection_str);

			}


		}







	}



	public function auto_merge($dealer_id,$ref_num){
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 300);

    if(empty($dealer_id)){
      echo "You must provide dealer_id";
      return false;
    }
    if(empty($ref_num)){
      echo "You must provide ref_num";
      return false;
    }

		$imported_leads = $this->Contact->find("all", array('recursive' => -1, 'fields' => array('Contact.company_id', 'Contact.first_name', 'Contact.last_name',  'Contact.source', 'Contact.id', "Contact.email", "Contact.mobile", 'Contact.phone', 'Contact.work_number', 'Contact.first_name', 'Contact.last_name','Contact.sales_step'),
			'order' => 'Contact.id asc',

			'conditions' => array(
				'Contact.ref_num' => $ref_num,
				'Contact.company_id' => $dealer_id,
				'Contact.sales_step <>' => '10',
        'Contact.status <>' => 'Duplicate-Closed',
				// 'Contact.user_id' => '3740',
				// 'Contact.id' => array('3675028', '3675291'),
			)
		));

		 //debug($imported_leads);
		 //$imported_leads = array();

		$d_count = 0;

    echo sprintf("Number of leads imported: %s.  Now looping through each and checking for duplicates<br />",count($imported_leads));

		foreach($imported_leads as $c_d){

			$dealer_id = $c_d['Contact']['company_id'];

			//Check duplicate
			$dup = $this->Contact->find("first", array('recursive' => -1, 'conditions' => array('Contact.id' => $c_d['Contact']['id']), 'fields' => array('Contact.id', 'Contact.status')));

			if($dup['Contact']['status'] <> 'Duplicate-Closed'){

				$cond = array(
					'Contact.company_id' => $dealer_id,
					// 'Contact.id <>'=>$c_d['Contact']['id'],
					'Contact.chk_duplicate' => 0,
					'Contact.status <>' => 'Duplicate-Closed',
					'Contact.lead_status' => 'Open',
					'Contact.sales_step <>' => '10',
				);

				$checkduplicate = false;

				if($c_d['Contact']['first_name'] != '' && $c_d['Contact']['last_name'] != ''){
					$cond['OR'][] = array('Contact.first_name'=>$c_d['Contact']['first_name'], 'Contact.last_name'=>$c_d['Contact']['last_name']  );
					$checkduplicate = true;
				}


				if($c_d['Contact']['email'] != ''){
					$cond['Contact.email'] = $c_d['Contact']['email'];
					$checkduplicate = true;
				}
				$phone_array = array();
				if($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] != null && $c_d['Contact']['mobile'] != '0000000000' && $c_d['Contact']['mobile'] != '1111111111' && $c_d['Contact']['mobile'] != '9999999999'  && $c_d['Contact']['mobile'] != '765' && $c_d['Contact']['mobile'] != '260' && $c_d['Contact']['mobile'] != '419' ){
					$phone_array[] = $c_d['Contact']['mobile'];
					$checkduplicate = true;
				}
				// if($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] != null && $c_d['Contact']['phone'] != '0000000000'  && $c_d['Contact']['phone'] != '1111111111' && $c_d['Contact']['phone'] != '9999999999' && $c_d['Contact']['phone'] != '765' && $c_d['Contact']['phone'] != '260' && $c_d['Contact']['phone'] != '419' ){
				// 	$phone_array[] = $c_d['Contact']['phone'];
				// 	$checkduplicate = true;
				// }
				// if($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] != null && $c_d['Contact']['work_number'] != '0000000000'  && $c_d['Contact']['work_number'] != '1111111111' && $c_d['Contact']['work_number'] != '9999999999' && $c_d['Contact']['work_number'] != '765' && $c_d['Contact']['work_number'] != '260' && $c_d['Contact']['work_number'] != '419' ){
				// 	$phone_array[] = $c_d['Contact']['work_number'];
				// 	$checkduplicate = true;
				// }
				if(!empty($phone_array)){
					$cond['OR']['Contact.mobile'] =  $phone_array;
					$cond['OR']['Contact.phone'] =  $phone_array;
					$cond['OR']['Contact.work_number'] =  $phone_array;
				}

				if($checkduplicate == false){
					continue;
				}

				// debug($cond);

				$fields = array('Contact.company_id', 'Contact.first_name', 'Contact.last_name',  'Contact.source', 'Contact.id', "Contact.email", "Contact.mobile", 'Contact.phone', 'Contact.work_number', 'Contact.first_name', 'Contact.last_name','Contact.sales_step','Contact.modified');
				$d_cs =  $this->Contact->find('all', array(
					// 'limit' => 1,
					'order'=>'Contact.modified DESC',
					'recursive'=>0,
					'fields'=>$fields,
					'conditions' => $cond
				));


				if(count($d_cs) > 1){
          echo sprintf("Lead.id: %s has %s duplicates.<br />",$d_cs[0]['Contact']['id'],count($d_cs));

					$d_count++;

					// debug($cond);
					// debug($c_d);
					// debug($d_cs);

					$contact_id = $d_cs[0]['Contact']['id'];
					$duplicates = array();
          echo "The following leads were all merged<br>";
					foreach($d_cs as $key => $ab){
						if($key > 0){
							$duplicates[] = $ab['Contact']['id'];
						}
						// debug($ab);

					 	echo "{$ab['Contact']['id']}  = {$ab['Contact']['first_name']} - {$ab['Contact']['last_name']} - {$ab['Contact']['email']} - {$ab['Contact']['mobile']} - {$ab['Contact']['phone']} - {$ab['Contact']['work_number']} - {$ab['Contact']['modified']} <br>";
					}
					echo "<br>------------------------------------------<br>";

					$this->requestAction(array('controller' => 'contacts_manage', 'action' => 'merge_contact',  'yes',  '?' => array(
						'contact_id' => $contact_id,
						'comment' => "Improt Merge",
						'duplicates' => $duplicates
					)));


				}

			}


		}

    echo "<br>------------------------------------------<br>";
    echo "<br>-------------------TOTAL------------------<br>";
    echo "<br>------------------------------------------<br>";
    echo ("Total number of times the merge script ran - this is the number of group duplicates:<br />");
		echo 	$d_count;

		$this->autoRender = false;


	}

}

?>
