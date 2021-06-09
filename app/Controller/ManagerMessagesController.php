<?php
class ManagerMessagesController extends AppController {

	public $uses = array('ManagerMessage','History','User','Contact');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function send() {
		$this->layout = 'ajax';
	 	if ($this->request->is('post')) {
			
			$current_user = $this->Auth->User();
			$timezone = $current_user['zone'];
			date_default_timezone_set($timezone);
			$created = date('Y-m-d H:i:s');
			$this->request->data['ManagerMessage']['created'] = $created;
			
			$this->ManagerMessage->create();			
			if($this->ManagerMessage->save($this->request->data)){
				
				//Save History
				$history_data = array();
				$history_data['contact_id'] = 		$this->request->data['ManagerMessage']['contact_id'];
				$history_data['cond'] = 			"Manager Message";
				$history_data['year'] = 			$this->request->data['ManagerMessage']['sender_name'];
				$history_data['make'] = 			$this->request->data['ManagerMessage']['receiver_name'];
				$history_data['model'] = 			$this->request->data['ManagerMessage']['email_from'];
				$history_data['deal_id'] = 			$this->request->data['ManagerMessage']['sender_id'];
				$history_data['status'] = 			"to Sales Person";
				$history_data['comment'] = 			$this->request->data['ManagerMessage']['message'];
				$history_data['start_date'] = 		$this->request->data['ManagerMessage']['created'];
				$history_data['h_type'] = 			"MMS";
				$history_data['sales_step'] = 		"MMS";
				$history_data['sperson'] = 			$this->request->data['ManagerMessage']['sender_name'];
				$history_data['modified']=    date('D - M d,Y h:i A');
				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));
				$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['ManagerMessage']['contact_id']);	
				
				
			}
		}
		echo $this->request->data['ManagerMessage']['contact_id'];
		$this->autoRender = false;

	}
	
	public function compose($contact_id) {
		$this->layout = 'ajax';

		$contact_info = $this->Contact->find('first', array('fields'=>array('Contact.id','Contact.full_name','Contact.user_id', 'Contact.sperson'),'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$this->request->data['UserEmail']['receiver_name'] = $contact_info['Contact']['full_name'];
		$this->request->data['UserEmail']['receiver_id'] = $contact_info['Contact']['id'];
		$receiver_email = 	$contact_info['Contact']['email'];
		$this->set('contact_info',$contact_info);
		
		$from_id = $this->Auth->User('id');
		$this->set('from_id',$from_id);
		
		$sender_name = $this->Auth->User('full_name');
		$this->set('sender_name',$sender_name);
		
		
		$messages = $this->ManagerMessage->find('all', array('recursive'=>-1,'order'=>array("ManagerMessage.created DESC"), 'conditions'=>array(
			'ManagerMessage.contact_id'=>$contact_id, 'OR' => array('ManagerMessage.from_id'=>$from_id,  'ManagerMessage.to_id'=>$from_id)
		)));
		$this->set('messages',$messages);
		
		

	}
	public function reply($contact_id, $id) {
		$this->layout = 'ajax';

		$contact_info = $this->Contact->find('first', array('fields'=>array('Contact.id','Contact.full_name','Contact.user_id', 'Contact.sperson'),'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$message_info = $this->ManagerMessage->find('first', array('recursive'=>-1,'conditions'=>array('ManagerMessage.id'=>$id)));
		
		$from_id = $this->Auth->User('id');
		$to_id = ($message_info['ManagerMessage']['from_id'] == $from_id) ?  $message_info['ManagerMessage']['to_id'] :  $message_info['ManagerMessage']['from_id'];
		
		$sender_name = $this->Auth->User('full_name');
		$receiver_name = ($message_info['ManagerMessage']['from_id'] == $from_id) ?  $message_info['ManagerMessage']['receiver_name'] :  $message_info['ManagerMessage']['sender_name'];
		
		
		$this->set('contact_info',$contact_info);
		
		$this->set('from_id',$from_id);
		$this->set('to_id',$to_id);
		$this->set('sender_name',$sender_name);
		$this->set('receiver_name',$receiver_name);
		
		
		
		
		
		$messages = $this->ManagerMessage->find('all', array('recursive'=>-1,'order'=>array("ManagerMessage.created DESC"), 'conditions'=>array(
			'ManagerMessage.contact_id'=>$contact_id, 'OR' => array('ManagerMessage.from_id'=>$from_id,  'ManagerMessage.to_id'=>$from_id)
		)));
		$this->set('messages',$messages);
		
		

	}

}