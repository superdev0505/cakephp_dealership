<?php
class TrimsController extends AppController {

    public $uses = array('Category','Trim', 'Make', 'Model');
    public $components = array('RequestHandler');

	 public function beforeFilter() {
       	parent::beforeFilter();
//		$this->response->header('Access-Control-Allow-Origin: *');
       	//$this->Auth->allow();
    }

	public function add_make(){

		 if ($this->request->is('post')) {
			$this->request->data['Make']['locale'] = 'en-us';
			$this->request->data['Make']['new_add'] = 1;
		 	$pool_list = $this->getDbPoolList();
			foreach($pool_list as $pool_id){
				$conn_name = $this->set_pool_connection($pool_id);
				
				$this->Make->setDataSource($conn_name);
				$this->Make->create();
				if ($this->Make->save($this->request->data)) {
					$this->set('save_sucees', true);
				}
			}
		 
		 }

	}

	public function add(){

		 if ($this->request->is('post')) {
		 	$this->request->data['Model']['new_add'] = 1;
			$pool_list = $this->getDbPoolList();
			foreach($pool_list as $pool_id){
				$conn_name = $this->set_pool_connection($pool_id);
				$this->Model->setDataSource($conn_name);
				$this->Model->create();
				if($this->Model->save($this->request->data)){
					//save trim
					$this->Trim->setDataSource($conn_name);
					$this->Trim->create();
					$this->request->data['Trim']['model_id'] = $this->Model->id;
					$this->request->data['Trim']['new_add'] = 1;
			//Below line is being taken out.  Not sure why it is the way it is ~ASR
					//$this->request->data['Trim']['category_type_id'] = $this->request->data['Model']['category_type_id'];
			$this->request->data['Trim']['category_type_id'] = $this->request->data['Model']['search_type'];
					if($this->Trim->save( $this->request->data)){
						$this->set('save_sucees', true);
					}
				}
			}

		 }

		$year_opt = array();
		$start_year = date('Y');
		$start_year++;
		for($i=$start_year;$i>=1980;$i--){
			$year_opt[$i] = $i;
		}
		$this->set('year_opt', $year_opt);


		$make_opt = $this->Make->find("list", array('conditions'=>array('Make.locale'=>"en-us"),'order'=>array('Make.pretty_mame'=>'ASC'),'fields'=>array('Make.id','Make.pretty_mame')));
		$this->set('make_opt', $make_opt);
		//debug($make_opt);


		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		$this->set('d_type_options', $d_type_options);


		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$this->request->data['Trim']['search_category']),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['id']] = $d_te['Category']['body_type'];
		}
		$this->set('body_type', $body_type);

		$body_sub_types = $this->Category->find("all", array('conditions'=>array('Category.body_type'=>$this->request->data['Trim']['search_type'], 'Category.d_type'=>$this->request->data['Trim']['search_category']),'orders'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
		$body_sub_type_options = array();
		foreach($body_sub_types as $body_sub_type){
			$body_sub_type_options[$body_sub_type['Category']['id']] = $body_sub_type['Category']['body_sub_type'];
		}
		$this->set('body_sub_type_options', $body_sub_type_options);



	}

}

?>
