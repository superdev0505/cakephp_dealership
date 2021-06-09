<?php
class EblastSpamsController extends AppController { 

	public $uses = array('EblastSpam', 'Contact');
    public $components = array('RequestHandler' );
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function index($stats_month = null) {
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
		$conditions = array('EblastSpam.spamed_on >=' => $first_day_this_month,
							'EblastSpam.spamed_on <=' => $last_day_this_month);
		if(isset($this->request->query['src']) && $this->request->query['src'] != ''){
			$conditions['EblastSpam.email LIKE'] = '%'.trim($this->request->query['src']).'%';
			$search_all2 = trim($this->request->query['src']);
		}
		
		$current_user_id = $this->Auth->User('id');
		
		$this->EblastSpam->bindModel(array(
			'belongsTo'	=> array('Contact')
		), false);
		
		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => 20,
			'order' => array(
				'EblastBounce.created' => 'DESC',
			)
		);
        $this->set('eblastspams', $this->Paginate('EblastSpam'));
		$this->set('src', $search_all2);
		//debug($emails);
		
	}
}