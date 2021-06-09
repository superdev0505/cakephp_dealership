<?php
class EblastsController extends AppController {
	public $uses = array('Contact', 'History', 'ContactStatus', 'User', 'Event', 'EventType');
    public $components = array('RequestHandler');
	
	function index() {
  $this->layout='default_new';
  }
  	function eblast() {
  $this->layout='default_new';
  }
  	function newsletter() {
  $this->layout='default_new';
  }
  	function autoresponders() {
  $this->layout='default_new';
  }
  	function templates() {
  $this->layout='default_new';
  }
    function templates_create() {
  $this->layout='default_new';
  }
  	function search_leads_send() {
  $this->layout='default_new';
  }
  
}
