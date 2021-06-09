<?php
class EblastBouncesController extends AppController { 

	public $uses = array('EblastBounce', 'Contact');
    public $components = array('RequestHandler' );
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function index($stats_month = null) {
		//prx($this->request);
		if(!isset($this->request->page)){
			//$this->InsertBounces();
		}
		$this->layout='default_new';
		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$conditions = array('EblastBounce.bounced_on >=' => $first_day_this_month,
							'EblastBounce.bounced_on <=' => $last_day_this_month);
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['EblastBounce.email LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		
		$current_user_id = $this->Auth->User('id');
		
		$this->EblastBounce->bindModel(array(
			'belongsTo'	=> array('Contact')
		), false);
		
		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'order' => array(
				'EblastBounce.created' => 'DESC',
			)
		);
        $this->set('eblastbounces', $this->Paginate('EblastBounce'));
		$this->set('search_all2', $search_all2);
		//debug($emails);
		
	}
}