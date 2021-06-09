<?php

class BdcAppShowsController extends AppController {

    public $uses = array('Contact', 'bdc_app_shows', 'User', 'History', 'BdcAppShow');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
    }


    public function add_log($contact_id) {

    	$this->layout = 'ajax';

    	$timezone = $this->Auth->user('zone');
    	$dealer_id = $this->Auth->user('dealer_id');
    	$user_id = $this->Auth->user('id');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$date_view = date('m/d/Y g:i A');

		$this->Contact->id = $contact_id;
		$contact = $this->Contact->find('first', array('recursive' =>  -1, 'conditions' => array('Contact.id'=> $contact_id)));

		$current_count  = $contact['Contact']['bdc_app_show'] + 1;

		$this->Contact->saveField("bdc_app_show", $current_count);

		$this->BdcAppShow->create();
		$this->BdcAppShow->save(array('BdcAppShow' => array(
			'dealer_id' => $dealer_id,
			'contact_id' => $contact_id,
			'user_id' => $user_id,
			'created' => $datetimetext
		)));

		//Save History
		$user_details = $this->User->findById($user_id);
		$old_data = $contact;
		$history_data = array();
		$history_data['user_id'] = $user_details['User']['id']; // for change log
		$history_data['changed_by'] = $user_details['User']['id'];
		$history_data['contact_id'] = $old_data['Contact']['id'];
		$history_data['sperson'] = $user_details['User']['first_name']." ".$user_details['User']['last_name'];
		$history_data['cond'] = $old_data['Contact']['condition'];
		$history_data['year'] = $old_data['Contact']['year'];
		$history_data['make'] = $old_data['Contact']['make'];
		$history_data['model'] = $old_data['Contact']['model'];
		$history_data['type'] = $old_data['Contact']['type'];
		$history_data['sales_step'] = $old_data['Contact']['sales_step'];
		$history_data['status'] = $old_data['Contact']['status'];
		$history_data['modified'] = date('D - M d, Y g:i A');
		$history_data['created'] = $datetimetext;
		$history_data['comment'] = 'You set the following customer as arrived for a lead visit. They have visited ('.$current_count.') times '.$date_view . " :  ".$old_data['Contact']['first_name'] . " ".$old_data['Contact']['last_name'];


		$history_data['h_type'] = "Appt Show";
		$history = array(
			'History' => $history_data
		);
		$this->History->create();
		$this->History->save($history);


		$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);



		echo json_encode(array("contact"=>$contact, 'datetime' => $date_view, "count"=> $current_count  ));

    	$this->autoRender = false;

	}


}
