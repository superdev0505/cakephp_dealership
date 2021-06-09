<?php
class Deal extends AppModel {
	public $belongsTo = array(
			'Contact'=>array(
					'className'=>'Contact',
					'foreignKey'=>'contact_id',
					'fields' => array('Contact.id','Contact.company','Contact.year','Contact.type','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.created','Contact.modified','Contact.owner','Contact.status','Contact.sales_step','Contact.buying_time','Contact.best_time','Contact.lead_status','Contact.gender','Contact.source','Contact.company_work','Contact.dnc_status')
					),
			'DealStatus'=>array(
					'className' => 'DealStatus',
					'foreignKey' => 'deal_status_id'
					)
			);
	
	public $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
			'search_name' => array('type'=>'like','field'=>array('Contact.first_name','Contact.last_name')),
			'search_amount' => array('type'=>'value','field'=>'Deal.amount'),
			'search_date_from' => array('type'=>'expression','method'=>'searchDate','field'=>'Deal.date BETWEEN ? AND ?'),
			'search_all' => array('type'=>'query','method'=>'searchDefault'),
			'search_deal_status_id' => array('type'=>'query','method'=>'searchDealStatusId'),
			'search_current_month' => array('type'=>'query','method'=>'searchCurent_month')
			
	);
	
	public function searchCurent_month($data = array()){
		 $cond = array(
                $this->alias . '.modified >=' => date('Y-m-01 00:00:00'),
				$this->alias . '.modified <=' => date("Y-m-t 23:59:01", strtotime("now")),
            );
        return $cond;
	
	}
	public function searchDealStatusId($data = array()) {
		$filter = $data['search_deal_status_id'];
		$cond = array(
				'OR' => array(
			            $this->alias . '.deal_status_id' => $filter
				));
		return $cond;
	}
	public function searchDefault($data = array()) {
		$filter = $data['search_all'];
		$cond = array(
				'OR' => array(
						'Contact.first_name LIKE' => '%' . $filter . '%',
						'Contact.last_name LIKE' => '%' . $filter . '%',
			            $this->alias . '.amount LIKE' => '%' . $filter . '%'
				));
		return $cond;
	}
	
	public function searchDate($data = array()) {
		$date_from = $data['search_date_from'];
		if(!empty($data['search_date_to'])){
			$date_to = $data['search_date_to'] . ' 23:59:59';
		} else {
			$date_to = date('m-d-Y H:i:s');
		}
		$cond = array($date_from,$date_to);
		return $cond;
	}
}