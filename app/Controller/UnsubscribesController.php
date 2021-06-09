<?php
class UnsubscribesController extends AppController {

	public $uses = array('Contact', 'Unsubscribe');
    public $components = array('RequestHandler' );


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('cnt');
    }

    private function get_dealer_timezone($dealer_id){
		$this->loadModel("User");
		$result = $this->User->find('first',array('conditions'=>array('User.dealer_id'=>$dealer_id)));	
		return $result['User']['zone'];
    }

    private function save_history($contact_info){

			//Save History
			$h_data = array();
			$h_data['contact_id'] = 	$contact_info['Contact']['id'];
			$h_data['year'] = 			$contact_info['Contact']['year'];
			$h_data['make'] = 			$contact_info['Contact']['make'];
			$h_data['model'] = 			$contact_info['Contact']['model'];
			$h_data['status'] = 		"Customer Opt-Out";
			$h_data['comment'] = 		"Unsubscribed by: {$contact_info['Contact']['first_name']} {$contact_info['Contact']['m_name']} {$contact_info['Contact']['last_name']}";
			$h_data['start_date'] = 	$contact_info['Contact']['received_date'];
			$h_data['h_type'] = 		"Consent";
			$h_data['sales_step'] = 	"Opted Out";
			$h_data['sperson'] = 		$contact_info['Contact']['sperson'];
			$h_data['modified'] = 		date('D - M d, Y g:i A');
			$h_data['created'] =  		date('Y-m-d H:i:s');
			$h_data['field_changed'] =  "contact_casl_status_id : ".$contact_info['Contact']['contact_casl_status_id'];
			
			$htr = array(
				'History' => $h_data
			);
			$this->History->create();
			$this->History->save($htr);
    }


	public function opt_out_test(){

		// $contact_id = '3126682';
		// App::uses('CakeEmail', 'Network/Email');
		// $key = 'ioOJ987hKhyiu687iHkKHKhkHkHKjhIU';
		// $contact_id_enc = base64_encode(Security::encrypt($contact_id, $key));
		// debug(  urlencode( $contact_id_enc ) );
		

		// $contact = $this->Contact->find('first', array('recursive' => -1, 'conditions'=>array('Contact.id' => $contact_id),
  //   				"fields"=>array("Contact.id","Contact.email","Contact.company_id","Contact.sperson","Contact.first_name",'Contact.m_name', 'Contact.year','Contact.make','Contact.model','Contact.last_name',"Contact.modified","Contact.email","Contact.contact_casl_status_id")));

		// date_default_timezone_set($this->get_dealer_timezone($contact['Contact']['company_id']));

		// $this->loadModel('CrmUnsubscribe');
		// $this->CrmUnsubscribe->remove_opt_out($contact_id ,  '3456', 'AW Russel');
		// // $this->CrmUnsubscribe->opt_out($contact,  '3456', 'AW Russel');

	}

    /**
    *
    * Email opt-out from CRM email
    */
    public function cnt() {

    	$this->layout = 'ajax';

    	if(isset($this->request->query['ld'])){

    		$key = 'ioOJ987hKhyiu687iHkKHKhkHkHKjhIU';
			$contact_id = Security::rijndael(base64_decode($this->request->query['ld']), $key, 'decrypt');

			
    		if(is_numeric($contact_id)){

    			CakeLog::write("crm_unsubscribe", $contact_id);
    			$contact = $this->Contact->find('first', array('recursive' => -1, 'conditions'=>array('Contact.id' => $contact_id),
    				"fields"=>array("Contact.id","Contact.email","Contact.company_id","Contact.sperson","Contact.first_name",'Contact.m_name', 'Contact.year','Contact.make','Contact.model','Contact.last_name',"Contact.modified","Contact.email","Contact.contact_casl_status_id")));
    			
    			if(!empty($contact)){



    				$this->LoadModel('CaslUnsubscribe');
					$caslUnsubscribe = $this->CaslUnsubscribe->find("first", array("conditions"=>array("CaslUnsubscribe.dealer_id" => $contact['Contact']['company_id'] )));
					$caslUnsubscribe_content = "You have been successfully removed from this subscriber list.";
					if( !empty($caslUnsubscribe) ){
						$caslUnsubscribe_content = $caslUnsubscribe['CaslUnsubscribe']['content'];
					}
					$this->set('caslUnsubscribe_content', $caslUnsubscribe_content);


    				
    				date_default_timezone_set($this->get_dealer_timezone($contact['Contact']['company_id']));

    				$this->loadModel('CrmUnsubscribe');

					$crmUnsubscribe_cnt = $this->CrmUnsubscribe->find('count', array('recursive' => -1, 
						'conditions'=>array(
							'CrmUnsubscribe.contact_id' => $contact['Contact']['id']
						)
					));

					if($crmUnsubscribe_cnt  == 0){ 
    					$this->Contact->updateAll(
							array(
								'Contact.contact_casl_status_id' => "'3'",
								'Contact.modified' => "'".date('Y-m-d H:i:s')."'"
							),
							array('Contact.id' => $contact_id)
						);	
    					$this->CrmUnsubscribe->opt_out($contact, $contact['Contact']['company_id'], $contact['Contact']['first_name']." ".$contact['Contact']['last_name']);
    					$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);
    				}
    				
    			}

    		}
    	}
	}

	public function index() {

		$this->layout='default_new';

		$conditions = array('Unsubscribe.dealer_id' => $this->Auth->user('dealer_id'));
		if(!empty($this->request->query) && $this->request->query['src'] != '' ){
			$conditions['Unsubscribe.email'] = $this->request->query;
		}
		$this->Unsubscribe->bindModel(array(
			'belongsTo'=>array('Contact'=>array("fields"=>array("Contact.id", "Contact.first_name", 'Contact.last_name',"Contact.modified", "Contact.email"))),
		), false);
		$this->paginate = array(
				'conditions'=> $conditions,
				'limit' => 20,
				'order' => array(
					'user.id' => 'asc',
				),
		);
		$Unsubscribes = $this->Paginate('Unsubscribe');
        $this->set('Unsubscribes', $Unsubscribes);
	}

	public function delete( $id ) {
		$condition = array( 'Unsubscribe.id' => $id);
		if($this->Unsubscribe->deleteAll( $condition, false )) {
			$this->Session->setFlash(__('Email deleted!'), 'alert');
		}
		$this->redirect(array('action' => 'index') );
	}




}