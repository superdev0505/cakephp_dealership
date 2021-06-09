<?php

class DormantReportController extends AppController {

    public $uses = array('Contact','ContactStatus');
    public $components = array('RequestHandler','Cookie');


    public function get_dealer_steps($dealer_id){
		
		$this->set_dealer_connection($dealer_id);
		$this->loadModel('StepDefinition');
		$this->loadModel('SalesStep');
		$current_definition = $this->StepDefinition->find('all', array('conditions' => array('StepDefinition.visible' => 1 ,  'StepDefinition.dealer_id'=> $dealer_id, 'not' => array('StepDefinition.custom_name'=> null))));
		//debug($current_definition);

		if(!empty($current_definition)){

			$has_order = $current_definition[1]['StepDefinition']['step_order'];
			if($has_order){
				$current_def = $this->StepDefinition->find('all', array('order' => array("StepDefinition.step_order ASC"),
					'conditions' => array('StepDefinition.visible' => 1 ,'StepDefinition.dealer_id'=> $dealer_id, 'not' => array('StepDefinition.custom_name'=> null) ) ));
			}else{
				$current_def = $this->StepDefinition->find('all', array('order' => array("StepDefinition.id ASC"),
					'conditions' => array('StepDefinition.visible' => 1 ,'StepDefinition.dealer_id'=> $dealer_id,'not' => array('StepDefinition.custom_name'=> null) ) ));
			}
			foreach ($current_def as $curr_def) {
				$sales_step_options_popup[ $curr_def['StepDefinition']['step_id']  ] = $curr_def['StepDefinition']['custom_name'];
			}

			return $sales_step_options_popup;

		}else{

			$step_map = array();
			foreach($current_definition as $cd){
				$step_map[ $cd['StepDefinition']['step_id'] ] = $cd['StepDefinition'];
			}


			$step_cond = array();
			if($step_procces == 'lemco_steps'){
				$step_cond = array('SalesStep.step_process'=>'lemco_steps');
			}else{
				$step_cond = array('SalesStep.step_process'=>'hd_steps');
			}
			$sales_steps = $this->SalesStep->find('all', array('conditions'=>$step_cond));
			//debug( $sales_steps );

			$sales_step_options_popup = array();
			foreach($sales_steps as $sales_step){

				$step_label =  $sales_step['SalesStep']['step'];

				if(isset( $step_map[  $sales_step['SalesStep']['id']  ]    )){
					$step_label = $step_map[  $sales_step['SalesStep']['id']  ]['custom_name'];
					if( !$step_map[  $sales_step['SalesStep']['id']  ]['visible']  ){
						continue;
					}
				}else{
					if($sales_step['SalesStep']['default_hidden'] == 1){
						continue;
					}
				}
				$sales_step_options_popup [ $sales_step['SalesStep']['id'] ] =  $step_label;
			}

			return  $sales_step_options_popup;
		}


	}

	public function get_dormant_settings($dealer_id){
		
		
		$this->set_dealer_connection($dealer_id);
		$this->loadModel('DealerSetting');
		
		$dealer = $this->DealerSetting->find('first', array('conditions'=>array("DealerSetting.dealer_id"=>$dealer_id,  "DealerSetting.name"=>'dormant_time')));
		
		if( !empty($dealer) && $dealer['DealerSetting']['value'] != ''){
			return $dealer['DealerSetting']['value'];
		}else{
			return '2';
		}
	}

	private function _get_user_list_dealer($dealer_id){
		
		$this->set_dealer_connection($dealer_id);
		$this->loadModel('User');
		$ReportUserGroups = array(1,2,3,4,5,6,10,11);
        
        $users = $this->User->find('list', array('conditions'=>array('User.group_id'=>$ReportUserGroups, 'User.active'=>1,'User.dealer_id'=>$dealer_id)));
        $user_ids = array_keys($users);
        return $user_ids;
    }
	
	public function _get_closed_statuses(){
		$this->loadModel('User');
        $inbounds = $this->User->query("SELECT * FROM lead_statuses WHERE header in ( 'Dead Lead (Closed)', 'Sold FollowUp In (Closed)','Sold FollowUp Out (Closed)','Sold Pick-Up (Closed)' )  ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        return $statuses;
    }

	public function index(){

		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$this->layout='default_new';
		$this->set_dealer_connection($dealer_id);
		$dormant_time = $this->get_dormant_settings( $dealer_id );
		$user_list_dealer = $this->_get_user_list_dealer($dealer_id);

		$datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-{$dormant_time} day"));
        $first_day_this_month = date('Y-m-01 00:00:00');

        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';

		$conditions = array(
			'Contact.user_id' => $user_list_dealer,
            'Contact.modified >=' => $first_day_this_month,
            'Contact.modified <=' => $datetime_48hours_back,
            'Contact.lead_status' => "Open",
            'Contact.status <>' => $c_statuses,
            'Contact.company_id' => $dealer_id,
            'Contact.sales_step <>' => '10',
            'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
		);
		// debug( $conditions );

		$this->loadModel('Contact');
		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		
		$fields = array(
			'Contact.id',
			'Contact.ref_num',
			'Contact.first_name',
			'Contact.last_name',
			'Contact.type',
			'Contact.condition',
			'Contact.year',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.mobile',
			'Contact.phone',
			'Contact.work_number',
			'Contact.contact_status_id',
			'Contact.address',
			'Contact.city',
			'Contact.state',
			'Contact.zip',
			'Contact.email',
			'Contact.sperson',
			'Contact.owner',
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.created',
			'Contact.modified',
			'Contact.user_id',
			'ContactStatus.name',
			'Event.id',
			'Event.start',
			'Event.status',
			'Event.title',
		);
			
		$this->paginate = 	array(
			'fields' => $fields,
			"conditions" => $conditions, 
			'order' => 'Contact.modified asc', 
			'limit' => 10
		);
		$contacts = $this->Paginate('Contact');
		$this->set('contacts', $contacts);
		$this->set('dormant_time', $dormant_time);

		$sales_steps = $this->get_dealer_steps($dealer_id);
		$this->set('sales_steps', $sales_steps);

		$this->set('ContactStatus', $ContactStatus);

		
	}

	
	
}

?>