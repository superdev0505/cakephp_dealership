<?php
class EblastUnsubscribesController extends AppController { 

	public $uses = array('EblastUnsubscribe', 'Contact');
    public $components = array('RequestHandler' );
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function index() {
		if(!isset($this->request->page)){
			//$this->InsertUnsubscribes();
		}
		$this->layout='default_new';
		$conditions = array();
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['EblastUnsubscribe.email LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		
		$current_user_id = $this->Auth->User('id');
		
		$this->EblastUnsubscribe->bindModel(array(
			'belongsTo'	=> array('Contact')
		), false);
		
		
		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'order' => array(
				'EblastUnsubscribe.created' => 'DESC',
			)
		);
        $this->set('eblastUnsubscribes', $this->Paginate('EblastUnsubscribe'));
		$this->set('search_all2', $search_all2);
		//debug($emails);
		
	}
	
}