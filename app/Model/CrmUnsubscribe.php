<?php

class CrmUnsubscribe extends AppModel {
	var $name = 'CrmUnsubscribe';

	public function remove_opt_out($contact_id, $dealer_id, $sperson){
		
		//Crm Unsubscribe
		$crmUnsubscribe_cnt = $this->find('count', array('recursive' => -1, 
			'conditions'=>array(
				'CrmUnsubscribe.dealer_id' => $dealer_id, 
				'CrmUnsubscribe.contact_id' => $contact_id
			)
		));
		// debug($crmUnsubscribe_cnt);
		if($crmUnsubscribe_cnt != 0){
			$this->deleteAll(array('CrmUnsubscribe.dealer_id' => $dealer_id, 'CrmUnsubscribe.contact_id' => $contact_id));
		}
		
		//Eblast Opt Out
		App::import('model','Unsubscribe');
		$this->Unsubscribe = new Unsubscribe;
		$this->Unsubscribe->useDbConfig  =  'eblast_rds';

		$eblast_unsubscribecnt = $this->Unsubscribe->find('count', array('recursive' => -1, 
			'conditions'=>array(
				'Unsubscribe.dealer_id' => $dealer_id, 
				'Unsubscribe.contact_id' => $contact_id
			)
		));
		// debug($eblast_unsubscribecnt);
		if($eblast_unsubscribecnt != 0){
			$this->Unsubscribe->deleteAll(array('Unsubscribe.dealer_id' => $dealer_id,'Unsubscribe.contact_id' => $contact_id));
		}

		//Save History
		App::import('model','History');
		$this->History = new History;
		$date_full = date('D - M d, Y g:i A');

		$h_data = array();
		$h_data['contact_id'] = 	$contact_id;
		$h_data['status'] = 		"Opt-Out Removed";
		$h_data['comment'] = 		"Removed by: {$sperson}, {$date_full}";
		$h_data['h_type'] = 		"Consent";
		$h_data['sales_step'] = 	"Opted Out Removed";
		$h_data['sperson'] = 		$sperson;
		$h_data['modified'] = 		$date_full;
		$h_data['created'] =  		date('Y-m-d H:i:s');
		
		$htr = array(
			'History' => $h_data
		);
		$this->History->create();
		$this->History->save($htr);

	}

	public function opt_out($contact_info, $dealer_id, $sperson){

		if($contact_info['Contact']['email'] == ''){
			return true;
		}

		//Crm Unsubscribe
		$crmUnsubscribe_cnt = $this->find('count', array('recursive' => -1, 
			'conditions'=>array(
				'CrmUnsubscribe.dealer_id' => $dealer_id, 
				'CrmUnsubscribe.contact_id' => $contact_info['Contact']['id']
			)
		));
		// debug($crmUnsubscribe_cnt);
		if($crmUnsubscribe_cnt == 0){
			$this->create();
			$this->save(array('CrmUnsubscribe'=>array(
				'dealer_id' => $dealer_id,
				'contact_id' => $contact_info['Contact']['id'],
				'email' => $contact_info['Contact']['email']
			)));
		}
		
		//Eblast Opt Out
		App::import('model','Unsubscribe');
		$this->Unsubscribe = new Unsubscribe;
		$this->Unsubscribe->useDbConfig  =  'eblast_rds';

		$eblast_unsubscribecnt = $this->Unsubscribe->find('count', array('recursive' => -1, 
			'conditions'=>array(
				'Unsubscribe.dealer_id' => $dealer_id, 
				'Unsubscribe.contact_id' => $contact_info['Contact']['id']
			)
		));
		// debug($eblast_unsubscribecnt);
		if($eblast_unsubscribecnt == 0){
			$this->Unsubscribe->create();
			$this->Unsubscribe->save(array('Unsubscribe'=>array(
				'dealer_id' => $dealer_id,
				'contact_id' => $contact_info['Contact']['id'],
				'email' => $contact_info['Contact']['email'],
			)));
		}


		//Save History
		App::import('model','History');
		$this->History = new History;

		$date_full = date('D - M d, Y g:i A');

		$sales_step = "Opted Out";
		if($contact_info['Contact']['contact_casl_status_id'] == 4){
			$sales_step = "Implied Consent Expired";
		}

		$h_data = array();
		$h_data['contact_id'] = 	$contact_info['Contact']['id'];
		$h_data['status'] = 		"Customer Opt-Out";
		$h_data['comment'] = 		"Unsubscribed by: {$sperson}, {$date_full}";
		$h_data['h_type'] = 		"Consent";
		$h_data['sales_step'] = 	$sales_step;
		$h_data['sperson'] = 		$sperson;
		$h_data['modified'] = 		$date_full;
		$h_data['created'] =  		date('Y-m-d H:i:s');
		$h_data['field_changed'] =  "contact_casl_status_id : ".$contact_info['Contact']['contact_casl_status_id'];
		
		$htr = array(
			'History' => $h_data
		);
		$this->History->create();
		$this->History->save($htr);








		return true;

	}
	

}
?>
