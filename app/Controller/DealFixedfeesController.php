<?php

class DealFixedfeesController extends AppController {

    //public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType');
    public $components = array('RequestHandler');

    
	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {
		
		$dealer_id = $this->Auth->User('dealer_id');
	
        $this->layout='default_new';
        $group_id = $this->Auth->user('group_id');
		$this->paginate = array(
			'conditions' => array('DealFixedfee.dealer_id'=>$dealer_id ),
			'limit' => 20,
			'order' => array('DealFixedfee.id'=>'ASC')
		);
		$deal_fixedfees = $this->Paginate();
		//debug( $deal_fixedfees );
        $this->set('deal_fixedfees', $deal_fixedfees);
    }
	public function add(){
		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='default_new';
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['custom_name']))
			{
				unset($this->request->data['DealFixedfee']['type']);
				$this->request->data['DealFixedfee']['condition']=$this->request->data['DealFixedfee']['custom_name_value'];
			}
			$this->request->data['DealFixedfee']['user_id'] = $this->Auth->user('id');
			$this->request->data['DealFixedfee']['dealer_id'] = $this->Auth->user('dealer_id');
			
			$error = false;
			$this->DealFixedfee->set($this->request->data);
			if ($this->DealFixedfee->validates()) {
				if($this->DealFixedfee->find('count',array('conditions'=>array( 'User.dealer_id'=>$dealer_id, 'DealFixedfee.type'=>$this->request->data['DealFixedfee']['type'],'DealFixedfee.condition'=>$this->request->data['DealFixedfee']['condition']))) != 0){
					$error = true;
					$this->set("duplicate_message","Duplicate Condition and the Unit Type found");
				}
			}else{
				$error = true;
			}
			if( !$error ){
				$this->DealFixedfee->create();
				if ($this->DealFixedfee->save($this->request->data, array('validate' => false))) {
					$this->Session->setFlash('Fixed fee saved', 'alert');
               		$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
				}
			}else{
				$this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
			} 
		}else{
			$this->request->data['DealFixedfee']['freight_fee'] = "0.00";
			
			$this->request->data['DealFixedfee']['prep_fee'] = "0.00";
			$this->request->data['DealFixedfee']['doc_fee'] = "0.00";
			$this->request->data['DealFixedfee']['parts_fee'] = "0.00";
			$this->request->data['DealFixedfee']['service_fee'] = "0.00";
			$this->request->data['DealFixedfee']['tag_fee'] = "0.00";
			$this->request->data['DealFixedfee']['title_fee'] = "0.00";
			$this->request->data['DealFixedfee']['ppm_fee'] = "0.00";
			$this->request->data['DealFixedfee']['hazard_fee'] = "0.00";
			$this->request->data['DealFixedfee']['esp_fee'] = "0.00";
			$this->request->data['DealFixedfee']['gap_fee'] = "0.00";
			$this->request->data['DealFixedfee']['tire_wheel_fee'] = "0.00";
			$this->request->data['DealFixedfee']['licreg_fee'] = "0.00";
			$this->request->data['DealFixedfee']['vsc_fee'] = "0.00";
			$this->request->data['DealFixedfee']['roadside_fee'] = "0.00";
			$this->request->data['DealFixedfee']['theft_fee'] = "0.00";
			$this->request->data['DealFixedfee']['tax_fee'] = "0.00";
			$this->request->data['DealFixedfee']['dmv_fee'] = "0.00";
			$this->request->data['DealFixedfee']['dmv_offroad'] = "0.00";
			$this->request->data['DealFixedfee']['apr_percentage'] = "0.00";
			$this->request->data['DealFixedfee']['down_percentage'] = "0.00";
			$this->request->data['DealFixedfee']['filling_fee'] = "0.00";
			$this->request->data['DealFixedfee']['vehicle_axle_fee_2'] = "0.00";
			$this->request->data['DealFixedfee']['vehicle_axle_fee_4'] = "0.00";
			
		}
	}
	public function edit($id = null){
		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='default_new';
		if (!$this->DealFixedfee->exists($id)) {
			throw new NotFoundException(__('Invalid Deal Fixedfee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$error = false;
			if(isset($this->request->data['custom_name']))
			{
				unset($this->request->data['DealFixedfee']['type']);
				$this->request->data['DealFixedfee']['condition']=$this->request->data['DealFixedfee']['custom_name_value'];
			}
			$this->DealFixedfee->set($this->request->data);
			if ($this->DealFixedfee->validates()) {
				if($this->DealFixedfee->find('count',array('conditions'=>array( 'DealFixedfee.dealer_id'=>$dealer_id, 'DealFixedfee.id <>'=>$id,'DealFixedfee.type'=>$this->request->data['DealFixedfee']['type'],'DealFixedfee.condition'=>$this->request->data['DealFixedfee']['condition']))) != 0){
					$error = true;
					$this->set("duplicate_message","Duplicate Condition and the Unit Type found");
				}
			}else{
				$error = true;
			}
			if( !$error ){
				if ($this->DealFixedfee->save($this->request->data, array('validate' => false))) {
					$this->Session->setFlash('Fixed fee saved', 'alert');
               		$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
				}
			}else{
				$this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
			}
			
			 
		}else {
			$options = array('conditions' => array('DealFixedfee.' . $this->DealFixedfee->primaryKey => $id));
			$this->request->data = $this->DealFixedfee->find('first', $options);
		}

		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array( 'DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);

	}
	public function get_fees($id){

		$options = array('recursive'=> -1,'conditions' => array('DealFixedfee.' . $this->DealFixedfee->primaryKey => $id));
		$fixed_fees = $this->DealFixedfee->find('first', $options);
		$this->autoRender = false;
		echo json_encode($fixed_fees['DealFixedfee']);
	}
	
	public function delete($id){
	 	$this->DealFixedfee->delete($id);
		$this->redirect(array('controller' =>'deal_fixedfees','action' =>'index'));
	}

}
