<?php

class CrmgroupErrorlogsController extends AppController {

	public $uses = array('CrmgroupErrorlog');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

	public function add() {
		
		 $page_url = $this->request->query['page_url'];
		 $user_id = $this->request->query['user_id'];
		 $dealer_id = $this->request->query['dealer_id'];

		 $this->CrmgroupErrorlog->create();
		 $this->CrmgroupErrorlog->save(array('CrmgroupErrorlog'=>array(
		 	'page_url' => $page_url,
		 	'user_id' => $user_id,
		 	'dealer_id' => $dealer_id
		 )));

		 $this->autoRender = false;
	}


}