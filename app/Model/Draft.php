<?php
class Draft extends AppModel {
	


	
	public function clear_druft_email($user_id = null, $contact_id = null){
    	$this->deleteAll(array('user_id'=>$user_id,'contact_id'=>$contact_id));
    }

    public function clear_druft_template($user_id = null){
    	$this->deleteAll(array('user_id'=>$user_id,'template_id'=>$user_id));
    }

    
	
	
}