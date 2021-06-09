<?php

class ContactInstockController extends AppController
{
	public $uses = array('XmlInventory','MarineInventory');
    public $components = array('RequestHandler');

	public function beforeFilter() {

		parent::beforeFilter();
	}

 	public function instock_search_branch()
	{
		$search_type = $this->request->query['search_type'];

		if($search_type == 'stock_num'){
			$conditions = array(
				'MarineInventory.status <>' => 'sold'
			);
		}else{
			$conditions = array(
				'MarineInventory.status <>' => 'sold'
			);
		}

		if(isset($this->request->query["src"]) && isset($this->request->query["search_field"]) && $this->request->query["src"] != '' )
		{
			$conditions['OR']['MarineInventory.hin LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['MarineInventory.stock_num LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['MarineInventory.year'] = $this->request->query["src"];
			$conditions['OR']['MarineInventory.make LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['MarineInventory.model LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['MarineInventory.category LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['MarineInventory.class LIKE'] = "%".$this->request->query["src"]."%";
		}

		$this->paginate = array(
			'conditions' => $conditions,
			'order'=>'MarineInventory.class DESC',
			'limit' => 30,
		);

		$marineInventories = $this->Paginate('MarineInventory');
		$this->set('marineInventories', $marineInventories);
    }

    public function instock_search()
	{
		$search_type = $this->request->query['search_type'];

		if($search_type == 'stock_num'){
			$conditions = array(
				'XmlInventory.dealerid' => $this->Auth->user('dealer_id'),
				'XmlInventory.hidden' => 0,
			);
		}else{
			$conditions = array(
				'XmlInventory.dealerid' => $this->Auth->user('dealer_id'),
				'XmlInventory.hidden' => 0,
			);
		}

		if(isset($this->request->query["src"]) && isset($this->request->query["search_field"]) && $this->request->query["src"] != '' )
		{
			$conditions['OR']['XmlInventory.vin LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['XmlInventory.stocknumber LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['XmlInventory.make LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['XmlInventory.year'] = $this->request->query["src"];
			$conditions['OR']['XmlInventory.model LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['XmlInventory.classid LIKE'] = "%".$this->request->query["src"]."%";
			$conditions['OR']['XmlInventory.category_name LIKE'] = "%".$this->request->query["src"]."%";
		}

		$this->paginate = array(
			'conditions' => $conditions,
			'order'=>'XmlInventory.bodysubtype DESC',
			'limit' => 30,
		);

		$XmlInventories = $this->Paginate('XmlInventory');
		$this->set('XmlInventories', $XmlInventories);
    }
}
