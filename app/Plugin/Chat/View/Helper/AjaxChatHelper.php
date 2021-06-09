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

if (!defined('CHAT_FREQUENCY')) {
	define('CHAT_FREQUENCY', 5);
}

class AjaxChatHelper extends Helper {
	var $helpers = array('Html', 'Js', 'Form');

	/*
	key is an identifier for the chat.
	You can have multiple chats by using different keys.
	*/
	function generate($key) {
    $id = sprintf('chat_%s', $key);

    echo $this->Html->scriptBlock('
          $(document).ready(function(){
            $("#' . $id . '").chat();
          });
    ');    
    
		$html = array();
		$html[] = '<div id="' . $id. '" class="chat" name="' . $key . '">';
		$html[] = '<div class="chat_window"><p>Loading...</p></div>';
		$html[] = $this->Form->create('Chat', array('id' => $key . 'ChatForm',
                                                'url' => '/chat/chats/post'));
		$html[] = $this->Form->input('key', array('type' => 'hidden', 'value' => $key));
  
    $html[] = $this->Form->input('name', array('id' => $key . 'ChatName'));
    $html[] = $this->Form->input('message', array('id' => $key . 'ChatMessage',
                                                  'type' => 'textarea'));
    
  	$html[] = $this->Form->end(__('Send', true));
		$html[] = '</form>';
		$html[] = '</div>';

		return "\n" . implode("\n", $html);
	}
	
	function get_chat_keys()
	{
		$chats=ClassRegistry::init('ChatSession');
		$SupportStaffChatId=Configure::read('SupportStaffChatId'); 
		$chat_keys = $chats->find('all',array('fields' => 'DISTINCT(ChatSession.key) as chat_key,user_id,name','group' => 'ChatSession.key'));
		$Html =array();
		foreach($chat_keys as $key)
		{
			
			$name= $key['ChatSession']['name'];
			$to_id = $key['ChatSession']['user_id'];
			
			$chat_key =$key['ChatSession']['chat_key'];
			
			$Html[]='<li class="list-group-item border-top-none">';
			$Html[] =  '<a href="javascript:void(0)" class="user_chat_key" data-key="'.$chat_key.'" data-name="'.$name.'" data-id="'.$to_id.'"><span class="badge pull-right bg-primary " style="display:none">30</span><i class="fa fa-circle" style="color:#8bbf61;" ></i>'.$name.'</a>';
			$Html[] = ' </li>';
		}
		return "\n" . implode("\n", $Html);
	}
	
}
?>