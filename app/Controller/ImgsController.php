<?php

class ImgsController extends AppController {

    public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
    public $components = array('RequestHandler');

  	public function beforeFilter() {
        $this->Auth->allow('index','eblast','autoresponders');
    }

	public function index($logid = null) {

		$this->LoadModel('UserEmailLog');
		$email_log = $this->UserEmailLog->find('first', array('conditions' => array('UserEmailLog.ref_number'=>$logid), 'fields'=>array('UserEmailLog.id','UserEmailLog.history_id','UserEmailLog.read','UserEmailLog.timezone' ) ));

		// debug($email_log);
		if(!empty($email_log) && $email_log['UserEmailLog']['history_id'] != '' && $email_log['UserEmailLog']['read'] == '0' ){

			if(  $email_log['UserEmailLog']['timezone'] != '' ){
				date_default_timezone_set( $email_log['UserEmailLog']['timezone']  );
			}
			// debug("Save history");
			//set history
			$this->LoadModel('History');
			$history = $this->History->find('first', array('recursive'=>-1, 'conditions' => array('History.id'=> $email_log['UserEmailLog']['history_id'] ) ));
			$history['History']['sales_step'] = 'Email Open';
			unset($history['History']['id']);
			$history['History']['created'] = date('Y-m-d H:i:s');
			$history['History']['modified'] = date('Y-m-d H:i:s');

			$this->History->create();
			$this->History->save($history);

      $url = 'https://app.dealershipperformancecrm.com/manage_cache/clear_contact_cache/'.$history['History']['contact_id'];
      $opts = stream_context_create(array(
        'http' => array(
          'method' => 'GET',
          'timeout' => 5, //Setting timeout to fix error seeing with AWS Cache clusters "sticking"
        )
      ));
			@file_get_contents($url, false, $opts);

			//Update Read status
			$this->UserEmailLog->id = $email_log['UserEmailLog']['id'];
			$this->UserEmailLog->saveField('read', 1);
		}

		$this->response->type('png');
		$this->response->body( base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=') );
		return $this->response;


	}


	function GetDealerZone($dealer_id) {
		
		$this->set_dealer_connection($dealer_id);
        $this->loadModel('User');
        $result = $this->User->find('first',array('conditions'=>array('User.dealer_id'=>$dealer_id)));
        return $result['User']['zone'];
    }

	public function eblast($template_type = null, $contact_id = null, $eblast_id = null) {

		$type_text = "";
		if($template_type == 'M'){
			$type_text = "Eblast";
		}else if($template_type == 'N'){
			$type_text = "Newsletter";
		}

		$this->autoResponse = false;

		$this->LoadModel('EblastClicklog');
		$eblast_email = $this->EblastClicklog->find('first', array('conditions' => array('EblastClicklog.contact_id'=>$contact_id, 'EblastClicklog.eblast_id'=>$eblast_id)  ));

		if(empty($eblast_email)){


			 $contact_info = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			// //debug($contact_info);

			 $dealer_zone = $this->GetDealerZone($contact_info['Contact']['company_id']);
			// //debug($dealer_zone);
			 date_default_timezone_set($dealer_zone);

			 //$this->loadModel("Eblast");
			 $eblast = $this->EblastClicklog->query('select * from eblasts where eblasts_id = :id', array('id'=>$eblast_id));
			//debug($eblast);



			 // //Insert eblast click log
			$this->EblastClicklog->create();
			$this->EblastClicklog->save(array('EblastClicklog' => array(
				'contact_id' => $contact_id,
				'eblast_id' => $eblast_id,
				'campaign_name' => $eblast[0]['eblasts']['campaign_name']
			)));


			$history_data['user_id'] = $contact_info['Contact']['user_id']; // for change log
			$history_data['contact_id'] = $contact_info['Contact']['id'];
			$history_data['sperson'] = $contact_info['Contact']['sperson'];
			$history_data['cond'] = $contact_info['Contact']['condition'];
			$history_data['year'] = $contact_info['Contact']['year'];
			$history_data['make'] = $contact_info['Contact']['make'];
			$history_data['model'] = $contact_info['Contact']['model'];
			$history_data['type'] = $contact_info['Contact']['type'];
			$history_data['sales_step'] = $type_text.' Open';
			$history_data['status'] = $contact_info['Contact']['status'];
			$history_data['modified'] = date('D - M d, Y g:i A', strtotime("now") );
			$history_data['created'] = date('Y-m-d H:i:s');
			$history_data['comment'] = $type_text." Open ({$eblast[0]['eblasts']['campaign_name']})";
			$history_data['dealer_id'] = $contact_info['Contact']['company_id'];
			$history_data['field_changed'] = $eblast_id;


			$history_data['h_type'] = "Marketing";
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

			$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);
			//save eblast click log

		}

		//ob_start();

		$this->response->type('png');
		$this->response->body( base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=') );
		return $this->response;
	}



	public function autoresponders($autoresponder_id = null, $contact_id = null) {

		$type_text = "";
		if($template_type == 'M'){
			$type_text = "Eblast";
		}else if($template_type == 'N'){
			$type_text = "Newsletter";
		}

		$this->autoResponse = false;

		$this->LoadModel('AutoresponderClicklog');
		$eblast_email = $this->AutoresponderClicklog->find('first', array('conditions' => array('AutoresponderClicklog.contact_id'=>$contact_id, 'AutoresponderClicklog.autoresponder_id'=>$autoresponder_id)  ));

		if(empty($eblast_email)){

			// //Insert eblast click log
			$this->AutoresponderClicklog->create();
			$this->AutoresponderClicklog->save(array('AutoresponderClicklog' => array(
				'contact_id' => $contact_id,
				'autoresponder_id' => $autoresponder_id
			)));


			 $contact_info = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			// //debug($contact_info);

			 $dealer_zone = $this->GetDealerZone($contact_info['Contact']['company_id']);
			// //debug($dealer_zone);
			 date_default_timezone_set($dealer_zone);

			 //$this->loadModel("Eblast");
			 $eblast = $this->AutoresponderClicklog->query('select * from autoresponder_rules where id = :id', array('id'=>$autoresponder_id));
			//debug($eblast);


			$history_data['user_id'] = $contact_info['Contact']['user_id']; // for change log
			$history_data['contact_id'] = $contact_info['Contact']['id'];
			$history_data['sperson'] = $contact_info['Contact']['sperson'];
			$history_data['cond'] = $contact_info['Contact']['condition'];
			$history_data['year'] = $contact_info['Contact']['year'];
			$history_data['make'] = $contact_info['Contact']['make'];
			$history_data['model'] = $contact_info['Contact']['model'];
			$history_data['type'] = $contact_info['Contact']['type'];
			$history_data['sales_step'] = 'Autoresponder Open';
			$history_data['status'] = $contact_info['Contact']['status'];
			$history_data['modified'] = date('D - M d, Y g:i A', strtotime("now") );
			$history_data['created'] = date('Y-m-d H:i:s');
			$history_data['comment'] = 'Autoresponder ('.$eblast[0]['autoresponder_rules']['rule_type'].')';
			$history_data['dealer_id'] = $contact_info['Contact']['company_id'];
			$history_data['field_changed'] = $autoresponder_id;


			$history_data['h_type'] = "Marketing";
			$history = array(
				'History' => $history_data
			);
			$this->History->create();
			$this->History->save($history);

			$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);
			//save eblast click log

		}

		//ob_start();

		$this->response->type('png');
		$this->response->body( base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=') );
		return $this->response;
	}









}
