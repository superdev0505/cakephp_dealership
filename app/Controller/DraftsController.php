<?php

class DraftsController extends AppController {

    public $uses = array('Contact', 'History', 'Draft');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('lead_push', 'lead_push_success');
    }

    

    public function druft_template(){

        $user_id = $this->Auth->user('id');
        $message_body = $this->request->data['message_body'];

        $draft_exists = $this->Draft->find('first', array('conditions' => array('Draft.user_id'=>$user_id, 'Draft.template_id' => $user_id  ) ));
        if(empty($draft_exists)){
            $this->Draft->create();
            $this->Draft->save(array('Draft' => array(
                'user_id' => $user_id,
                'message_body' => $message_body,
                'template_id' => $user_id,
            )));
        }else{
            $this->Draft->save(array('Draft' => array(
                'id' => $draft_exists['Draft']['id'],   
                'user_id' => $user_id,
                'message_body' => $message_body,
                'template_id' => $user_id,
            )));
        }
        $this->autoRender = false;
        
    }


    public function druft_email(){

    	$user_id = $this->Auth->user('id');
    	$message_body = $this->request->data['message_body'];
    	$contact_id = $this->request->data['contact_id'];
    	$subject = $this->request->data['subject'];

    	// debug($user_id);
    	// debug($message_body);
    	// debug($contact_id);
    	// debug($subject);

    	$draft_exists = $this->Draft->find('first', array('conditions' => array('Draft.user_id'=>$user_id, 'Draft.contact_id' => $contact_id  ) ));
    	if(empty($draft_exists)){
	    	$this->Draft->create();
	    	$this->Draft->save(array('Draft' => array(
	    		'user_id' => $user_id,
	    		'message_body' => $message_body,
	    		'contact_id' => $contact_id,
	    		'subject' => $subject
	    	)));
    	}else{
    		$this->Draft->save(array('Draft' => array(
    			'id' => $draft_exists['Draft']['id'],	
	    		'user_id' => $user_id,
	    		'message_body' => $message_body,
	    		'contact_id' => $contact_id,
	    		'subject' => $subject
	    	)));
    	}
    	$this->autoRender = false;
    	
    }
	
}
