<?php
class ListsController extends AppController {

	public $components = array('RequestHandler','Paginator');
    public $uses = array('List');

	public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','index','logout');
        $dealer_ids = $this->get_dealer_ids(); 
    	$this->set('dealer_ids',$dealer_ids);
    }

    public function add() {
    	$this->layout = 'ajax';
    	$zone = $this->Auth->User("zone");
    	date_default_timezone_set($zone);
    	
    	if ($this->request->is('post')) {

    		if($this->request->data['List']['list_name'] != ''){

    			$list_data = array(
					'list_name' => $this->request->data['List']['list_name'],
					'created' => date("Y-m-d H:i:s"),
					'modified' => date("Y-m-d H:i:s")
    			);

    			$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
				if(is_array($eblat_app_multiple)){
					$list_data['group_ids'] = implode(",", $eblat_app_multiple);
				}else{
					$list_data['dealer_id'] = $this->Auth->User("dealer_id");
				}

    			$this->List->create();
				$this->List->save(array("List"=>$list_data));
				$this->set('save_sucees', "success");
				$this->set('list_id',  base64_encode( $this->List->id ) );

    		}

    	}
	}

	public function index() {
		$this->layout = 'marketing_default';

		$group_id = $this->Auth->user('group_id');
		$dealer_id = $this->Auth->user('dealer_id');
		
		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			$conditions['List.group_ids'] = implode(",", $eblat_app_multiple);
		}else{
			$conditions['List.dealer_id'] = $dealer_id;
		}

		
		$this->paginate = array(
			'conditions' => $conditions,
			'order' => array('List.id'=>'DESC'),
			'limit' => 30,
		);
		$lists = $this->Paginate("List");
		$this->set('lists', $lists);
		//debug($lists);
	}
	public function get_dealer_ids(){
		$this->loadModel("User");
		$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');
    	

    	$other_locations_ar = array();
    	if($other_locations){
    		$other_locations_ar = explode(",", $other_locations);	
    	}

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('order' => "User.dealer_id", 'fields' => array('User.dealer_id', 'User.dealer'),
                'conditions' => $dconditions ));
    	ksort($user_active);
    	return $user_active;
    }

}