<?php

class TraderMediaController extends AppController {

    public $components = array('RequestHandler');

    
    public function index() {
		$this->layout = 'admin_default'; 
            
    }
    
}

?>