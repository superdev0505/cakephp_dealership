<?php
class StepDefinitionsController extends AppController {

    public $uses = array('StepDefinition','SalesStep', 'User');
    public $components = array('RequestHandler');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}

    public function make_default_step_definition(){

    	$dealer_ids = $this->User->find('all', array('conditions'=>array(
    		'User.dealer_id <>'=>'',
    		//'User.dealer_id'=>1225
    	),  'group' => array('User.dealer_id'), 'fields'=>array('User.dealer_id', 'User.step_procces'  ) ));
    	
    	//debug( $dealer_ids );

    	foreach($dealer_ids as $dealer_id){

            $sales_steps  =  $this->SalesStep->find('all', array('conditions' => array('SalesStep.step_process'=> $dealer_id['User']['step_procces'] ) ));
            //debug( $sales_steps );

    		$current_definition = $this->StepDefinition->find('count', array('conditions' => array('StepDefinition.dealer_id'=>$dealer_id['User']['dealer_id']) ));
    		if( $current_definition == 0 ){
    			//Insert default definitation

    			$data = array();
    			foreach($sales_steps as $sales_step){

    				$data [] = array(
    					'dealer_id' => $dealer_id['User']['dealer_id'],
    					'step_id' =>   $sales_step['SalesStep']['id'],
    					'step_name' =>   $sales_step['SalesStep']['step'],
    					'custom_name' =>   $sales_step['SalesStep']['step'],
                        'call_center' =>   0,
                        'send_to_deals' =>   0,
    					'visible' => 1
    				);
    			}
    			//debug($data);
    			$this->StepDefinition->create();
    			$this->StepDefinition->saveMany($data);
    		}

    		//debug($current_definition);

    	}
    	


    }
	
	public function index(){

		$this->layout = 'default_new';

		$dealer_id = $this->Auth->user('dealer_id');

		$sales_steps  =  $this->SalesStep->find('all', array('conditions' => array('SalesStep.step_process'=>'lemco_steps') ));
		//debug($sales_steps);

		$step_definitions = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.step_id <>'=> '1',   'StepDefinition.dealer_id'=>$dealer_id)));
		//debug($step_definitions);
        if(empty($step_definitions)){
            $this->requestAction('step_definitions/make_default_step_definition');
            $step_definitions = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.dealer_id'=>$dealer_id)));
        }

		$this->set('sales_steps', $sales_steps);
		$this->set('step_definitions', $step_definitions);

        if ($this->request->is('post')) {

            //debug($this->request->data);
            foreach($this->request->data['StepDefinition'] as $definition_id => $definition){
                $visible = (isset($definition['visible']))? $definition['visible'] : 1 ;
                $call_center = (isset($definition['call_center']))? $definition['call_center'] : 1 ;

                $this->StepDefinition->updateAll(
                    array(
                        'StepDefinition.custom_name'=>"'".$definition['custom_name']."'",
                        'StepDefinition.visible'=>$visible,
                        'StepDefinition.call_center'=>$call_center,
                    ),
                    array('StepDefinition.id'=>$definition_id)
                );
            }

            $this->Session->setFlash(__('Step Updated'), 'alert');
            $this->redirect(array('action' => 'index'));
        }

	}



    public function edit(){

        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user
        

        $this->layout = 'admin_default';
		$this->loadModel('DealerName');
        $opt_dealer = $this->DealerName->find('list', array('order'=>"DealerName.dealer_id ASC",'fields' => array('DealerName.dealer_id','DealerName.dealer_id')));
        
        $this->set('opt_dealer', $opt_dealer);

        if(isset($this->request->query['dealer_id']) && $this->request->query['dealer_id'] != '' ){

            $dealer_id = $this->request->query['dealer_id'];
			$this->set_dealer_connection($dealer_id);
            $sales_steps  =  $this->SalesStep->find('all', array('conditions' => array('SalesStep.step_process'=>'lemco_steps') ));
            //debug($sales_steps);

            $step_definitions = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.step_id <>'=> '1',   'StepDefinition.dealer_id'=>$dealer_id)));
            //debug($step_definitions);
            if(empty($step_definitions)){
                $this->requestAction('step_definitions/make_default_step_definition');
                $step_definitions = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.dealer_id'=>$dealer_id)));
            }

            $this->set('sales_steps', $sales_steps);
            $this->set('step_definitions', $step_definitions);

            if ($this->request->is('post')) {

               // debug($this->request->data);
                foreach($this->request->data['StepDefinition'] as $definition_id => $definition){
                    $visible = (isset($definition['visible']))? $definition['visible'] : 1 ;
                    $call_center = (isset($definition['call_center']))? $definition['call_center'] : 1 ;
                    $step_order = ($definition['step_order'] != '')? $definition['step_order'] : null ;

                    $this->StepDefinition->updateAll(
                        array(
                            'StepDefinition.custom_name'=>"'".$definition['custom_name']."'",
                            'StepDefinition.visible'=>$visible,
                            'StepDefinition.call_center'=>$call_center,
                            'StepDefinition.step_order'=>$step_order
                        ),
                        array('StepDefinition.id'=>$definition_id)
                    );
                }

                $this->Session->setFlash(__('Step Updated'), 'alert');
                $this->redirect(array('action' => 'edit', '?'=> array('dealer_id'=>$dealer_id)  ));
            }


        }                








    }




}
	
?>