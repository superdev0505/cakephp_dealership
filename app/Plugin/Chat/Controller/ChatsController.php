<?php
/*
 * CakePHP Ajax Chat Plugin (using jQuery);
 * Copyright (c) 2008 Matt Curry
 * www.PseudoCoder.com
 * http://github.com/mcurry/cakephp/tree/master/plugins/chat
 * http://sandbox2.pseudocoder.com/demo/chat
 *
 * @author      Matt Curry <matt@pseudocoder.com>
 * @license     MIT
 *
 */

class ChatsController extends ChatAppController {
	var $name = 'Chats';
	var $components = array('RequestHandler');
  var $helpers = array('Time');
  
	function update($key) {
		date_default_timezone_set('America/Los_Angeles');
		$this->set('messages', $this->Chat->find('latest', $key));
	}

	function post() {
		//$zone = $this->Auth->User('zone');
		$SupportStaffChatId=Configure::read('SupportStaffChatId');
		date_default_timezone_set('America/Los_Angeles');
   		App::uses('Sanitize', 'Utility');
		$this->loadModel('ChatSession');
		$this->data = Sanitize::clean($this->data);

		
		if($this->data['Chat']['key']) {
		$find_count = $this->ChatSession->find('count',array('conditions' => array('ChatSession.key' => $this->data['Chat']['key'])));
			
			$user_id = $this->Auth->user('id');
			if($find_count == 0 && $SupportStaffChatId != $user_id)
			{
				$save_array['ChatSession'] = array('key' => $this->data['Chat']['key'],'user_id' => $user_id,'name' => $this->data['Chat']['name']);
				$this->ChatSession->save($save_array);
				$this->loadModel('User');
				$user_data =$this->Auth->user();
				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->config('sender');
				$email->from('sender@dp360crm.com');
				$email->viewVars(array('user_data'=>$user_data));
				$user_name = $user_data['first_name']. ' '.$user_data['last_name'];		
				$email->template('chat_request_notification')
							->emailFormat('html')
							->subject('Chat Initiated By '.$user_name.' #'. $user_data['id'])
							->from('sender@dp360crm.com')
							->to(array('andrew@dp360crm.com','dan@dp360crm.com','tod@dp360crm.com','ss737207@gmail.com'))
							->send();
			}	
		$this->Chat->save($this->data);
			 
		}
    die;
	}
	
	public function new_chat()
	{
		$SupportStaffChatId=Configure::read('SupportStaffChatId');
		if($this->request->is('post'))
		{
			$this->loadModel('ChatSession');
			$chat_keys = substr($this->data['chat_keys'],1);
			$chat_keys = explode(',',$chat_keys);
			$new_chats=$this->ChatSession->find('all',array('fields' => 'DISTINCT(ChatSession.key) as chat_key,user_id,name','conditions'=>array('NOT' => array('ChatSession.key' => $chat_keys))));
			$Html =array();
			
			$l_chat_keys =$this->ChatSession->find('list',array('fields' => 'id,key'));
		foreach($new_chats as $key)
		{
			//$l_chat_keys[] = $key['ChatSession']['key'];
			$chat_key = $key['ChatSession']['chat_key'];
			$name = $key['ChatSession']['name'];
			$to_id =$key['ChatSession']['user_id'];
			$Html[]='<li class="list-group-item border-top-none">';
			$Html[] =  '<a href="javascript:void(0)" class="user_chat_key" data-key="'.$chat_key.'" data-name="'.$name.'" data-id="'.$to_id.'"><span class="badge pull-right bg-primary " style="display:none">30</span><i class="fa fa-circle" style="color:#8bbf61;" ></i>'.$name.'</a>';
			$Html[] = ' </li>';
		}
		$new_html = '';
		if(!empty($Html))
		$new_html = "\n" . implode("\n", $Html);
		$deleted_keys = array_diff($chat_keys,$l_chat_keys);
		$deleted_keys = implode(',',$deleted_keys);
		$json_data['html'] = $new_html;
		$json_data['deleted_keys'] = $deleted_keys;
		echo json_encode($json_data);
		
		}
		die;
		
	}
	
	public function end_chat_session($key='')
	{
		
		$this->loadModel('ChatSession');
		$this->ChatSession->deleteAll(array('ChatSession.key' => $key));
		die;
	}
}

?>