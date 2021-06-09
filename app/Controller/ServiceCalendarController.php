<?php
class ServiceCalendarController extends AppController {
	

	public $uses = array('ServiceEvent','ServiceLead','ServiceEventType', 'ServiceHistory');
	 public $components = array('RequestHandler');
	
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function serviceapp_event_list($bay_id=null) {
		$this->layout = 'ajax';
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');

		$conditions = array(
			'ServiceEvent.dealer_id'=>$dealer_id
		);
		if($bay_id!=null)
		{
			$conditions['ServiceEvent.bay_id']=$bay_id;
		}
		if(isset($this->request->query['type']) && $this->request->query['type']  == 'today'){
			$conditions['ServiceEvent.start >='] =  date('Y-m-d 00:00:00');
			$conditions['ServiceEvent.start <='] = date('Y-m-d 23:59:59');
		}
		if(isset($this->request->query['type']) && $this->request->query['type']  == 'overdue'){
			$conditions['ServiceEvent.start <='] =  date('Y-m-d H:i:s');
			$conditions['ServiceEvent.status <>'] = array('Completed','Canceled');
		}

		$events = $this->ServiceEvent->find('all', array('conditions' => $conditions,'order'=>'ServiceEvent.start ASC'));
		$this->set('events', $events);

		$Not_Completed_count = 0;
		$completed_count = 0;
		$canceled_count = 0;
		foreach($events as $event1){ 
			if($event1['ServiceEvent']['status'] != "Completed" && $event1['ServiceEvent']['status'] != "Canceled"){
				$Not_Completed_count ++;
			}
			if($event1['ServiceEvent']['status'] == "Completed"){
				$completed_count ++;
			}
			if($event1['ServiceEvent']['status'] == "Canceled"){
				$canceled_count ++;
			}
		}
		$this->set('Not_Completed_count', $Not_Completed_count);
		$this->set('completed_count', $completed_count);
		$this->set('canceled_count', $canceled_count);

			
	}
	
	public function serviceapp_edit($data_id){
	
		$this->layout = "ajax";
		if(isset($this->request->params['named']['set_view'])&& $this->request->params['named']['set_view'] == 'edit2'){
			$this->view = 'serviceapp_edit2';
		}
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');
		
		$modified = date('Y-m-d H:i:s');
		
		if ($this->request->is('post')) {
			
			$this->request->data['ServiceEvent']['logged_user_id'] = $current_user_id;
			$this->request->data['ServiceEvent']['user_id'] = $this->request->data['ServiceLead']['user_id'];
			$this->request->data['ServiceEvent']['dealer_id'] = $dealer_id;
			$this->request->data['ServiceEvent']['service_status_id']=$this->request->data['ServiceLead']['service_status_id'];
			//$this->request->data['ServiceLead']['writer_id'] = $current_user_id;
			$this->request->data['ServiceLead']['warrant_id']=$this->request->data['ServiceEvent']['warrant_id'];
			$this->request->data['ServiceLead']['bay_id']=$this->request->data['ServiceEvent']['bay_id'];
			$this->request->data['ServiceLead']['company_id'] = $dealer_id;
			$this->request->data['ServiceLead']['company'] = $this->Auth->user('dealer');
			//$this->request->data['ServiceLead']['year'] = $this->request->data['ServiceEvent']['ServiceLead']['year'];
			//contact info
			$this->request->data['ServiceEvent']['first_name'] = $this->request->data['ServiceLead']['first_name'];
			$this->request->data['ServiceEvent']['event_type_id'] = implode(',',$this->request->data['ServiceEvent']['event_type_id']);
			$this->request->data['ServiceEvent']['last_name'] = $this->request->data['ServiceLead']['last_name'];
			$this->request->data['ServiceEvent']['mobile'] = $this->request->data['ServiceLead']['mobile'];
			$this->request->data['ServiceEvent']['phone'] = $this->request->data['ServiceLead']['phone'];
			$this->request->data['ServiceEvent']['sperson'] = $this->request->data['ServiceLead']['sperson'];
			$this->request->data['ServiceEvent']['email'] = $this->request->data['ServiceLead']['email'];
			$this->request->data['ServiceEvent']['start'] = '';
			if($this->request->data['ServiceEvent']['start_date'] != '' && $this->request->data['ServiceEvent']['start_time'] != ''){
				$this->request->data['ServiceEvent']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['start_date']." ".$this->request->data['ServiceEvent']['start_time']));
			}
			$this->request->data['ServiceEvent']['end'] = '';
			if($this->request->data['ServiceEvent']['end_date'] != '' && $this->request->data['ServiceEvent']['end_time'] != ''){
				$this->request->data['ServiceEvent']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['end_date']." ".$this->request->data['ServiceEvent']['end_time']));
			}
			$this->request->data['ServiceEvent']['modified'] = $modified;
			
			$old_data = $this->ServiceEvent->find('first', array('recursive' =>0, 'conditions'=>array('ServiceEvent.id' => $data_id)));
			
			//Save history
			$history_data = array();
			$history_data['contact_id'] = 			$old_data['ServiceEvent']['contact_id'];
			$history_data['event_id'] = 			$old_data['ServiceEvent']['id'];
			$history_data['customer_name'] = 		$old_data['ServiceEvent']['first_name']." ".$old_data['ServiceEvent']['last_name'];
			$history_data['make'] = 				$old_data['ServiceEventType']['name'];
			$history_data['model'] = 				date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['start']));
			$history_data['status'] = 				$old_data['ServiceEvent']['status'];
			$history_data['comment'] = 				$old_data['ServiceEvent']['details'];
			$history_data['notes'] = 				$old_data['ServiceEvent']['title'];
			$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['modified']));
			$history_data['start_date'] = 			$this->request->data['ServiceEvent']['start'];
			$history_data['end_date'] = 			$this->request->data['ServiceEvent']['end'];
			$history_data['h_type'] = 				"Service Appointment";
			$history_data['sales_step'] = 				"Service Appointment";
			$history_data['sperson'] 	=	$this->request->data['ServiceEvent']['sperson'];
		
			$history = array(
				'ServiceHistory' => $history_data
			);
			$this->ServiceHistory->save($history);
			$this->ServiceLead->save($this->request->data);
			
			if($this->ServiceEvent->save($this->request->data)){
				
				$this->Session->setFlash(__('Event updated successfully'), 'alert', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'service_calendar', 'action' => 'index','serviceapp'=>true));
			}
			

		
		}else{
			$eventinfo = $this->ServiceEvent->find('first', array('recursive' =>0, 'conditions'=>array('ServiceEvent.id' => $data_id)));
			$this->request->data = $eventinfo;
			$this->request->data['ServiceLead']['first_name'] = $eventinfo['ServiceLead']['first_name'];
			$this->request->data['ServiceLead']['last_name'] = $eventinfo['ServiceLead']['last_name'];
			$this->request->data['ServiceLead']['email'] = $eventinfo['ServiceLead']['email'];
			$this->request->data['ServiceLead']['phone'] = $eventinfo['ServiceLead']['phone'];
			$this->request->data['ServiceLead']['mobile'] = $eventinfo['ServiceLead']['mobile'];
			
			$this->request->data['ServiceLead']['sperson'] = $eventinfo['ServiceLead']['sperson'];
			$this->request->data['ServiceLead']['work_number'] = $eventinfo['ServiceLead']['work_number'];
			$this->request->data['ServiceLead']['city'] = $eventinfo['ServiceLead']['city'];
			$this->request->data['ServiceLead']['id'] = $eventinfo['ServiceLead']['id'];
			$this->request->data['ServiceLead']['state'] = $eventinfo['ServiceLead']['state'];
			$this->request->data['ServiceLead']['zip'] = $eventinfo['ServiceLead']['zip'];
			$this->request->data['ServiceLead']['address'] = $eventinfo['ServiceLead']['address'];
			//Vehicle info
			$this->request->data['ServiceLead']['category'] = $eventinfo['ServiceLead']['category'];
			$this->request->data['ServiceLead']['type'] = $eventinfo['ServiceLead']['type'];
			$this->request->data['ServiceLead']['make'] = $eventinfo['ServiceLead']['make'];
			$this->request->data['ServiceLead']['year'] = $eventinfo['ServiceLead']['year'];
			$this->request->data['ServiceLead']['model'] = $eventinfo['ServiceLead']['model'];
			$this->request->data['ServiceLead']['class'] = $eventinfo['ServiceLead']['class'];
			$this->request->data['ServiceLead']['condition'] = $eventinfo['ServiceLead']['condition'];
			
			$this->request->data['ServiceEvent']['event_type_id'] = explode(',',$eventinfo['ServiceEvent']['event_type_id']);
			$this->request->data['ServiceEvent']['contact_id'] = $eventinfo['ServiceLead']['id'];
			$this->request->data['ServiceEvent']['start_date'] = date('Y-m-d', strtotime($eventinfo['ServiceEvent']['start']));
			$this->request->data['ServiceEvent']['start_time'] = date('h:i A', strtotime($eventinfo['ServiceEvent']['start']));
			$this->request->data['ServiceEvent']['end_date'] = date('Y-m-d', strtotime($eventinfo['ServiceEvent']['end']));
			$this->request->data['ServiceEvent']['end_time'] = date('h:i A', strtotime($eventinfo['ServiceEvent']['end']));
			
			$this->request->data['ServiceEvent']['details'] = $eventinfo['ServiceEvent']['details'];

		}
		$this->loadModel('ServiceSetting');
		$ss_conditions =array('dealer_id' => array(0,$dealer_id));
		$selected_jobs=explode(',',$eventinfo['ServiceEvent']['event_type_id']);
		$service_settings = $this->ServiceSetting->find('first',array('conditions' => array('dealer_id' => $dealer_id)));
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$alleventTypes = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions' =>$ss_conditions));
		$alleventTypeTime = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,est_time','order'=>"ServiceEventType.id ASC",'conditions' =>$ss_conditions));
		$this->set(compact('service_settings','alleventTypes','alleventTypeTime'));
		if($service_settings['ServiceSetting']['advanced_job']){
			$category_id = $this->request->data['ServiceEvent']['service_category_id'];
			$vendor_id = $this->request->data['ServiceEvent']['service_job_category_id'];
			//$ss_conditions['service_category_id'] = $category_id;
			//$ss_conditions['service_job_category_id'] = $vendor_id;
		}
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$eventTypes = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions' =>$ss_conditions));
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$selectEventTypes = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions' =>array('id' => $selected_jobs)));
		$eventTypeTime = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,est_time','order'=>"ServiceEventType.id ASC",'conditions' =>$ss_conditions));
		$this->set(compact('eventTypeTime','eventTypes','selectEventTypes'));
		// Vehicle info section data
		
		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		$d_type_options = array('In Stock'=>'In Stock');
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type']; 
		}
		$this->set('d_type_options', $d_type_options);
		//$this->loadModel('Category');
		//$this->loadModel('Category');
		
		$d_type = $this->request->data['ServiceLead']['category'];
		
		if($d_type == '' && $this->request->data['ServiceLead']['make'] == 'Harley-Davidson'){
			$d_type = "Harley-Davidson";
			$this->request->data['ServiceLead']['category'] = $d_type;
		}else if($d_type == '' && $this->request->data['ServiceLead']['make'] != 'Harley-Davidson' ){
			$d_type = "Powersports";
			$this->request->data['ServiceLead']['category'] = "Powersports";
		}
		
		$body_type = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_category_list','return','?'=>array('d_type'=>$this->request->data['ServiceLead']['category'])));
		$this->set('body_type', $body_type);
		
		
		$body_type_val = $this->request->data['ServiceLead']['type'];
		if($body_type_val == ''){
			$body_type_val = array_keys($body_type);
		}
		
		$body_sub_type_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_classes_type','return','?'=>array(
			'class'=>$this->request->data['ServiceLead']['class'],
			'd_type'=>$d_type,'category'=>$body_type_val,
			'make'=>$this->request->data['ServiceLead']['make'],
			'year'=>$this->request->data['ServiceLead']['year'],
		)));
		$this->set('body_sub_type_options', $body_sub_type_options);
		
		$category_contact = $this->request->data['ServiceLead']['type'];
		$mk_options = array();
		if($category_contact != ''){
			$mk_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_make_n','return','?'=>array('type'=>$d_type,'category'=>$category_contact)));
		}
		$this->set('mk_options', $mk_options);	
		
		$make_contact = $this->request->data['ServiceLead']['make'];
		$year_opt = array();
		if( $this->request->data['ServiceLead']['model_id'] != '' ){
			if($make_contact != '' && $body_type_val != ''){
				$year_opt = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_year_n','return','?'=>array('make'=>$make_contact,'type'=>$d_type,'category'=>$body_type_val)));
			}
		}else{
			$year_opt = array();
			$year_opt[0] = 'Any Year';
			for($i=date('Y')+1; $i>=1980; $i--){
				$year_opt[$i] = $i;
			}
		}
		$this->set('year_opt', $year_opt);
		
		$this->loadModel('Trim');
		
		
		//get model options
		//Get Model Selection
		$year_contact =  $this->request->data['ServiceLead']['year'];
		$category_contact = $this->request->data['ServiceLead']['type'];
		$make_contact = $this->request->data['ServiceLead']['make'];
		$model_opt = array();
		if($make_contact != '' && $category_contact != '' && $year_contact != ''){

			$model_opt = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_model_n','return','?'=>array('year'=>$year_contact,'make'=>$make_contact,'type'=>$d_type,'category'=>$category_contact)));
		}
		$this->set('model_opt', $model_opt);
		///
		
		$histories = $this->ServiceHistory->find('all', array('order' => array('ServiceHistory.id DESC'), 'conditions'=>array('ServiceHistory.event_id'=>$data_id)));
		$this->set('histories', $histories);
		$this->loadModel('ServiceEventStatus');
		$event_statuses=$this->ServiceEventStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('event_statuses',$event_statuses);
		
		$this->loadModel('ServiceWarrantyType');
		$service_warrant_types=$this->ServiceWarrantyType->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$this->set('service_warrant_types',$service_warrant_types);	
		//Service Status
		$this->loadModel('ServiceStatus');
		$service_statuses=$this->ServiceStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('service_statuses',$service_statuses);	
		// Service Bays
		
		$this->loadModel('ServiceBay');
		$service_bays=$this->ServiceBay->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'is_active' => 1)));
		$this->loadModel('User');
		$users=$this->User->find('list',array('conditions'=>array('dealer_id'=>$dealer_id,'group_id'=>15,'User.active'=>1)));
		
		$this->set('users',$users);
		$this->set('service_bays',$service_bays);
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
		if(empty($service_timings))
		{
			$service_timings['ServiceSetting']['start']='07:00:00';
			$service_timings['ServiceSetting']['end']='19:00:00';
		}
		$this->set('service_timings',$service_timings);	
		$this->loadModel('ServiceJobCategory');
		$service_categories = $this->ServiceJobCategory->find('list',array('conditions'=>array('ServiceJobCategory.dealer_id'=>array(0,$dealer_id))));
		$this->set('service_categories',$service_categories);
		$this->loadModel('ServiceCategory');
		$service_sub_categories=$this->ServiceCategory->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$this->set('service_sub_categories',$service_sub_categories);
		
		
	}
	

	public function serviceapp_index($action_type = null, $data_id = null) {
		
		
		$zone = $this->Auth->User('zone');
		$this->Session->delete('service_tech_id');
		date_default_timezone_set($zone);
		$month_offset = date('Y-m-d',strtotime('-2 months'));
		//$this->layout = 'calendar_new';
		$this->layout='serviceapp_layout';
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');
		$modified = date('Y-m-d H:i:s');
		$this->set('serviceEventTypes', $this->ServiceEventType->find('list', array('order'=>"ServiceEventType.id ASC")));
		
		$this->loadModel('ServiceEventStatus');
		$event_statuses=$this->ServiceEventStatus->find('all',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('event_statuses',$event_statuses);
		
		
			$eventTypes = $this->ServiceEvent->ServiceEventType->find('list', array('order'=>"ServiceEventType.id ASC"));
			$this->set('eventTypes',$eventTypes);
			//$this->set('service_bays',$service_bays);
			//debug($events);
			
			
			
		
		
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
		if(empty($service_timings))
		{
			$service_timings['ServiceSetting']['start']='07:00:00';
			$service_timings['ServiceSetting']['end']='19:00:00';
		}
		$this->set('service_timings',$service_timings);
		$this->loadModel('User');
		$service_techs = $this->User->find('all',array('fields' => array('User.id','User.full_name'),'conditions' => array('User.dealer_id' => $dealer_id , 'User.group_id' => 15, 'User.active' => 1),'order' => 'User.service_order asc'));
		$service_tech_array = array();
		$service_guys = array();
		foreach($service_techs as $tech)
		{
			$data['id'] = $tech['User']['id'];
			$data['name'] = $tech['User']['full_name'];
			$service_tech_array[] = $data; 
			$service_guys[$tech['User']['id']]=  $tech['User']['full_name'];
		}
		if(!$this->Session->check('service_tech_id'))
		{
			$this->Session->write('service_tech_id',$service_techs[0]['User']['id']);
		}
		$this->set(compact('service_tech_array','service_guys'));
		$show_change_password = false;
		if(in_array($this->Auth->user('pwd'),array('access123!','#access123'))){
			$show_change_password = true;
			if($this->Session->check('cng_pwd_not') && $this->Session->check('cng_pwd_not') == 'no')
			$show_change_password = false;
		}
		$this->set('show_change_password',$show_change_password);
		
	}
	function serviceapp_update() {
        $this->autoRender = false;
      	if($this->request->is('post'))
		{	
			if(isset($this->request->data['ServiceEvent'])){
			
			$this->request->data['ServiceEvent']['start'] = '';
			$this->request->data['ServiceEvent']['event_type_id'] = implode(',',$this->request->data['ServiceEvent']['event_type_id']);
			if($this->request->data['ServiceEvent']['start_date'] != '' && $this->request->data['ServiceEvent']['start_time'] != ''){
				$this->request->data['ServiceEvent']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['start_date']." ".$this->request->data['ServiceEvent']['start_time']));
			}
			$this->request->data['ServiceEvent']['end'] = '';
			if($this->request->data['ServiceEvent']['end_date'] != '' && $this->request->data['ServiceEvent']['end_time'] != ''){
				$this->request->data['ServiceEvent']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['end_date']." ".$this->request->data['ServiceEvent']['end_time']));
			}	
			$this->ServiceEvent->save($this->request->data);
			$this->Session->setFlash(__('Appointment updated successfully'), 'alert', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'service_calendar', 'action' => 'index','serviceapp'=>true));
			}else{
			$user_id = $this->request->data['user_id'][0]; 
			unset($this->request->data['user_id']);
			$data['ServiceEvent'] = $this->request->data;
			$data['ServiceEvent']['user_id'] =$user_id;
			$this->ServiceEvent->save($data);	
			}
			/*$this->ServiceEvent->id = $vars['id'];
			$this->ServiceEvent->saveField('start', $vars['start']);
			$this->ServiceEvent->saveField('end', $vars['end']);
			if (isset($vars['allDay'])) {
				$this->ServiceEvent->saveField('all_day', $vars['allday']);
			}*/
		}
		
    }
	function serviceapp_break_update() {
        $this->autoRender = false;
		$this->loadModel('TechEvent');
        $vars = $this->params['url'];
        $this->TechEvent->id = $vars['id'];
        $this->TechEvent->saveField('start', $vars['start']);
        $this->TechEvent->saveField('end', $vars['end']);
        if (isset($vars['allDay'])) {
            $this->ServiceEvent->saveField('all_day', $vars['allday']);
        }
    }

	private function _get_user_list_dealer(){
		$dealer_id = $this->Auth->User('dealer_id');
		$this->loadModel('User');
		$users = $this->User->find('list', array('conditions'=>array('User.active'=>1,'User.dealer_id'=>$dealer_id)));
		$user_ids = array_keys($users);
		return $user_ids;
	}
	
	 function serviceapp_feed($service_bay = null, $stat_type = null) {
       $this->layout = "ajax";
        $vars = $this->params['url'];
        $dealer_id = $this->Auth->User('dealer_id');
		
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		if($service_bay==null)
		{
        $conditions = array('conditions' => array(
			'ServiceEvent.dealer_id'=>$dealer_id,
			'ServiceEvent.status <>'=>array('Completed','Canceled'),
			'DATE(end) >=' => $vars['start'], 'DATE(start) <=' => $vars['end']));
		}else{
			$conditions = array('conditions' => array(
			'ServiceEvent.dealer_id'=>$dealer_id,
			'ServiceEvent.bay_id'=>$service_bay,
			'ServiceEvent.status <>'=>array('Completed','Canceled'),
			'DATE(start) >=' => $vars['start'], 'DATE(start) <=' => $vars['end']));
		}
		
		$date_range_array = $this->createDateRangeArray($vars['start'],$vars['end']);
		$is_month_view = false;
		if(count($date_range_array) >10)
		{
			$is_month_view = true;
		}
		//pr($conditions);
		if($is_month_view){
			$max_hours=12;
			$this->loadModel('ServiceSetting');
			$service_timings=$this->ServiceSetting->find('all',array('fields'=>'(time_to_sec(timediff(ServiceSetting.end, ServiceSetting.start )) / 3600) as max_hours,ServiceSetting.dealer_id,ServiceSetting.start,ServiceSetting.end','conditions'=>array('ServiceSetting.dealer_id'=>$dealer_id)));
			$dealer_service_timings = array();
			if(!empty($service_timings))
			{
				$max_hours=round($service_timings[0][0]['max_hours']);
				$dealer_service_timings = $service_timings[0]['ServiceSetting'];
			}else
			{
				$dealer_service_timings['start']='07:00:00';
				$dealer_service_timings['end']='19:00:00';
			}
			$this->loadModel('User');
			$service_techs = $this->User->find('count',array('conditions' => array('User.dealer_id' => $dealer_id , 'User.group_id' => 15, 'User.active' => 1)));	
			$max_hours = $max_hours * $service_techs;
			$start_date = $vars['start'];
			$end_date = $vars['end'];
			$m_conditions['DATE(ServiceEvent.start) >=']=$start_date;
			$m_conditions['DATE(ServiceEvent.start) <=']=$end_date;
			//$m_conditions['DATE(ServiceEvent.end) >=']=$start_date;
			//$m_conditions['DATE(ServiceEvent.end) <=']=$end_date;
			$m_conditions['ServiceEvent.dealer_id'] = $dealer_id;
			$conditions1['DATE(TechEvent.start) >=']=$start_date;
			$conditions1['DATE(TechEvent.start) <=']=$end_date;
			$conditions1['DATE(TechEvent.end) >=']=$start_date;
			$conditions1['DATE(TechEvent.end) <=']=$end_date;
			$conditions1['TechEvent.dealer_id'] = $dealer_id;	
			list($hours_array,$tech_hours_array) = $this->_agendaViewData($m_conditions,$conditions1,$dealer_service_timings);
			$data = array();
			$i=1;
			
			foreach($hours_array as $s_date=>$day_hour){
			$percentage = round(($day_hour/$max_hours)*100,2);
			$title = $percentage."% of $max_hours hours booked";
			$day_hour = round($day_hour,2) ;
			$color_code = '#3a87ad';
			if($percentage >= 60)
			{
				$color_code = '#ff4c4c';
			}elseif($percentage>=50)
			{
				$color_code = '#ffa500';
			}
			$d_date=date("Y-m-d\TH:i:s",strtotime($s_date));
			$data[] = array(
							'id' => $i,
							'title' => 	$title,
							'month_view' =>'yes',
							'stat_date' => $s_date,
							'start' => $d_date,
							'end' => $d_date,
							'color' => $color_code,
							'event_type'=>'service',
							'toolTip' => "Total $day_hour hours booked for the day ". date('m/d/Y',strtotime($s_date)) ,	
				);
			}
			
		}else{
		$color_array=array('1' => '#ab7a4b','2' => '#C53FCC',3 => '#4193d0',4 => '#AD540A',5 => '#8bbf61',6 => '#B57467', 8=> '#35656E',18 => '#2A6B2E',17 => '#7F9917',12 => '#523D91',13 => '#913D91',15 =>'#614F59');
		
		if(count($date_range_array) > 2)
		{
			if($this->Session->check('service_tech_id'))
			{
				$service_tech_id = $this->Session->read('service_tech_id');
				if($service_tech_id){
					$conditions['conditions']['ServiceEvent.user_id'] = $service_tech_id;
					$t_conditions['TechEvent.user_id']= $service_tech_id;
				}
			}
		}
		//pr($conditions);
		$events = $this->ServiceEvent->find('all', $conditions);
        $data = array();
		$this->loadModel('ServiceEventStatus');
		$event_statuses=$this->ServiceEventStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$event_status_color=$this->ServiceEventStatus->find('list',array('fields' => 'id,color_code','conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$month_data_array =array();
		$date_index_array = array();
		//pr($events);
        foreach ($events as $event) {
			/*  if ($event['ServiceEvent']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            } else {*/
                $allday = false;
                $end = $event['ServiceEvent']['end'];
           /* }*/

            $event_contacts = $event['ServiceEvent']['first_name'] . " " . $event['ServiceEvent']['last_name'];
            $this->uses[] = "User";
            $event_users = $this->User->find('first', array('conditions' => array('User.id' => $event['ServiceEvent']['user_id']), 'fields' => "User.first_name, User.last_name, User.id"));
            $event_users = $event_users['User']['first_name'] . " " . $event_users['User']['last_name'];

            $start1 = new DateTime($event['ServiceEvent']['start']);
			
            $start2 = new DateTime($event['ServiceEvent']['start']);
            $start1 = $start1->format('n/j/Y g:i A');
            $start = $start2->format('D M d Y H:i:s eO (T)');
			
            $event['ServiceEvent']['start'] = date("Y-m-d\TH:i:s",strtotime($event['ServiceEvent']['start']));
			
            $end1 = new DateTime($event['ServiceEvent']['end']);
            $end2 = new DateTime($event['ServiceEvent']['end']);
            $end1 = $end1->format('n/j/Y g:i A');
            $end = $end2->format('D M d Y H:i:s eO (T)');
			$event['ServiceEvent']['end'] = date("Y-m-d\TH:i:s",strtotime($event['ServiceEvent']['end']));
			$is_appointment_overdue = false;
			$overdue_color=!empty($event_status_color[$event['ServiceEvent']['status']])?$event_status_color[$event['ServiceEvent']['status']]:'#ab7a4b';
			
			
			$appointment_title = "#".$event['ServiceEvent']['id']."-".$event['ServiceEvent']['first_name']." ".$event['ServiceEvent']['last_name']."--".$event['ServiceEvent']['title'];
			$appointment_title .= '-- Vehicle--'.$event['ServiceLead']['category'].' '.$event['ServiceLead']['make'].' '.$event['ServiceLead']['model'].' '.$event['ServiceLead']['year'];
			if(( strtotime('now') > strtotime($event['ServiceEvent']['start']) &&  $event['ServiceEvent']['status'] == 1 )){
			$is_appointment_overdue =true;
			$appointment_title = $appointment_title.' (Overdue)';
			 $overdue_color="red";
			 if($event['ServiceEvent']['status'] == 3)
			 {
				 $overdue_color=$color_array[$event['ServiceEvent']['status']];
			 }
		}
			$phone1 = $event['ServiceEvent']['mobile'];
			$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
			$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
			
			
            $data[] = array(
                'id' => $event['ServiceEvent']['id'],
				'contact_id' => $event['ServiceEvent']['contact_id'],
				'resources' => $event['ServiceEvent']['user_id'],
				'user_id' => $event['ServiceEvent']['user_id'],
                'title' => $appointment_title,
                'start' => $event['ServiceEvent']['start'],
                'end' => $event['ServiceEvent']['end'],
                'allDay' => $allday,
				'color' => $overdue_color,
				'month_view' => 'no',
				'event_type'=>'service',
				'contact_name' => $event_contacts,
				'is_overdue' => $is_appointment_overdue,
               // 'url' => Router::url('/') . 'full_calendar/events/view/' . $event['ServiceEvent']['id'],
                'details' => $event['ServiceEvent']['details'],
                //'className' => $event['EventType']['color'],
                'toolTip' => '<ul><li><strong>'.$appointment_title.'</strong></li><li><strong>Description: </strong>' . $event['ServiceEvent']['details'] . '</li><li><strong>Customer: </strong>' . $event_contacts . '</li><li><strong>Technician: </strong>' . $event_users . '</li><li><strong>Service Writer: </strong>' .  $event['ServiceEvent']['sperson'] . '</li><li><strong>Start: </strong>' . $start1 . '</li><li><strong>End: </strong>' . $end1 . '</li><li><strong>Mobile: </strong>' . $cleaned1 . '</li><li><strong>Email: </strong>' . $event['ServiceEvent']['email']. '</li><li><strong>Appointment Status: </strong>' . $event_statuses[$event['ServiceEvent']['status']].'</li></ul>'
			   );
        }
		$this->loadModel('TechEvent');
		$t_conditions['TechEvent.dealer_id']=$dealer_id;
		if($service_bay!=null)
		{
			$t_conditions['TechEvent.bay_id']=$service_bay;
		}
		$t_conditions['DATE(TechEvent.start) >=']= $vars['start'];
		$t_conditions['DATE(TechEvent.start) <=']= $vars['end'];
		
		$tech_events=$this->TechEvent->find('all',array('conditions'=>$t_conditions));
		//pr($tech_events);
		foreach($tech_events as $t_event)
		{
			$allday = false;
            $end = $t_event['TechEvent']['end'];
           /*// $tech_contacts = $t_event['ServiceEvent']['first_name'] . " " . $event['ServiceEvent']['last_name'];
            $this->uses[] = "User";
            $event_users = $this->User->find('first', array('conditions' => array('User.id' => $event['ServiceEvent']['user_id']), 'fields' => "User.first_name, User.last_name, User.id"));
            $event_users = $event_users['User']['first_name'] . " " . $event_users['User']['last_name'];*/

            $start1 = date('n/j/Y g:i A',strtotime($t_event['TechEvent']['start']));
        	$t_event['TechEvent']['start'] = date("Y-m-d\TH:i:s",strtotime($t_event['TechEvent']['start']));
			$end1 = date('n/j/Y g:i A',strtotime($t_event['TechEvent']['end']));
          
            $t_event['TechEvent']['end'] = date("Y-m-d\TH:i:s",strtotime($t_event['TechEvent']['end']));
			$overdue_color = "#717171";
			
					
            $data[] = array(
                'id' => $t_event['TechEvent']['id'],
				'user_id' => $t_event['TechEvent']['user_id'],
				'resources' =>$t_event['TechEvent']['user_id'],
                'title' => $t_event['TechEvent']['break_type'],
                'start' => $t_event['TechEvent']['start'],
                'end' => $t_event['TechEvent']['end'],
                'allDay' => $allday,
				'color' => $overdue_color,
				'month_view' => 'no',
				'event_type'=>'tech_event',
               // 'url' => Router::url('/') . 'full_calendar/events/view/' . $event['ServiceEvent']['id'],
                'details' => $t_event['TechEvent']['detail'],
                //'className' => $event['EventType']['color'],
                'toolTip' => '<strong>Description: </strong>' . $t_event['TechEvent']['detail'] . '<br /><strong>Type: </strong>' .$t_event['TechEvent']['break_type']. '<br /><strong>Start: </strong>' . $start1 . '<br /><strong>End: </strong>' . $end1
			   );
			
		}
		$dealer_breaks = $this->_getDealerBreaks($date_range_array);
		$data = array_merge($data,$dealer_breaks);
		
		
		
		}
		
      	$this->set("json", json_encode($data));
    }
	
	public function lead_appointment($contact_id=null){
		$contactinfo = $this->ServiceEvent->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id' => $contact_id)));
		if($this->request->is('post')){
			
			$this->request->data['ServiceEvent']['first_name'] = $contactinfo['ServiceLead']['first_name'];
			$this->request->data['ServiceEvent']['last_name'] = $contactinfo['ServiceLead']['last_name'];
			$this->request->data['ServiceEvent']['email'] = $contactinfo['ServiceLead']['email'];
			$this->request->data['ServiceEvent']['phone'] = $contactinfo['ServiceLead']['phone'];
			$this->request->data['ServiceEvent']['mobile'] = $contactinfo['ServiceLead']['mobile'];
			$this->request->data['ServiceEvent']['contact_id'] = $contact_id;
			$this->request->data['ServiceEvent']['status'] = 'Scheduled';
			$this->request->data['ServiceEvent']['event_type_id'] = 21;
			$this->request->data['ServiceEvent']['user_id'] = $contactinfo['ServiceLead']['user_id'];
			$this->request->data['ServiceEvent']['sperson']=$contactinfo['ServiceLead']['sperson'];
			$this->request->data['ServiceEvent']['logged_user_id'] = $this->Auth->user('id');
			$this->request->data['ServiceEvent']['start'] = '';
			if($this->request->data['ServiceEvent']['start_date'] != '' && $this->request->data['ServiceEvent']['start_time'] != ''){
				$this->request->data['ServiceEvent']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['start_date']." ".$this->request->data['ServiceEvent']['start_time']));
			}
			$this->request->data['ServiceEvent']['end'] = '';
			if($this->request->data['ServiceEvent']['end_date'] != '' && $this->request->data['ServiceEvent']['end_time'] != ''){
				$this->request->data['ServiceEvent']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['end_date']." ".$this->request->data['ServiceEvent']['end_time']));
			}
			if($this->ServiceEvent->save($this->request->data)){
			
				//Save history for new event
				$old_data = $this->ServiceEvent->find('first', array('recursive' =>0, 'conditions'=>array('ServiceEvent.id' => $this->ServiceEvent->id)));
			$history_data = array();
				$history_data['contact_id'] = 			$old_data['ServiceEvent']['contact_id'];
				$history_data['event_id'] = 			$old_data['ServiceEvent']['id'];
				$history_data['customer_name'] = 		$old_data['ServiceEvent']['first_name']." ".$old_data['ServiceEvent']['last_name'];
				$history_data['make'] = 			$old_data['EventType']['name'];
				$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['start']));
				$history_data['status'] = 				$old_data['ServiceEvent']['status'];
				$history_data['comment'] = 				$old_data['ServiceEvent']['details'];
				$history_data['notes'] = 				$old_data['ServiceEvent']['title'];
				$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['modified']));
				$history_data['start_date'] = 			$this->request->data['ServiceEvent']['start'];
				$history_data['end_date'] = 			$this->request->data['ServiceEvent']['end'];
				$history_data['h_type'] = 				"Service Appointment";
				$history_data['sales_step'] = 				"Service Appointment";
				$history_data['sperson'] 	=	$this->request->data['ServiceEvent']['sperson'];
			
				$history = array(
					'ServiceHistory' => $history_data
				);
				$this->ServiceHistory->save($history);
				die('success');
			}else
			{
				die('failure');
			}
			
		
		}
	}
	
	public function serviceapp_main()
	{
		$this->layout='serviceapp_layout';
		$this->loadModel('ServiceEvent');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$dealer_id=$this->Auth->user('dealer_id');
		$stats_month=date('m');
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		//$this->ServiceEvent->unbindModel(array('belongsTo'=>array('ServiceLead')));
		/*$events = $this->ServiceEvent->find('all', array('order'=>'ServiceEvent.start ASC','conditions'=>array('dealer_id'=>$dealer_id)));
		//debug($events);
		$this->set('events', $events);*/
		$this->set('eventTypes', $this->ServiceEvent->ServiceEventType->find('list', array('order'=>"ServiceEventType.id ASC")));
		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		$d_type_options = array('In Stock'=>'In Stock');
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type']; 
		}
		$this->set('d_type_options', $d_type_options);
		//$this->loadModel('Category');
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}
		$this->set('body_type', $body_type);
		$this->loadModel('ServiceEventStatus');
		$event_statuses=$this->ServiceEventStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('event_statuses',$event_statuses);
		
		$this->loadModel('ServiceWarrantyType');
		$service_warrant_types=$this->ServiceWarrantyType->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$this->set('service_warrant_types',$service_warrant_types);		
		
		$this->loadModel('ServiceStatus');
		$service_statuses=$this->ServiceStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('service_statuses',$service_statuses);	
		
		// Service Bays
		
		$this->loadModel('ServiceBay');
		$service_bays=$this->ServiceBay->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'is_active' => 1)));
		$this->set('service_bays',$service_bays);
		$new_service=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.contact_id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.dealer_id'=>$dealer_id),'group'=>'ServiceEvent.contact_id Having(count(ServiceEvent.contact_id)=1)'));
		$existing_service=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.contact_id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.dealer_id'=>$dealer_id),'group'=>'ServiceEvent.contact_id Having(count(ServiceEvent.contact_id)>1)'));
		$date=date('Y-m-d');
		$today_service=$this->ServiceEvent->find('list',array('fields'=>'id,contact_id','conditions'=>array('ServiceEvent.dealer_id'=>$dealer_id,'DATE(ServiceEvent.created)'=>$date)));
		$month_service=$this->ServiceEvent->find('list',array('fields'=>'id,contact_id','conditions'=>array('ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.created >='=>$first_day_this_month,'ServiceEvent.created <=' => $last_day_this_month)));
		$warranty_service=$this->ServiceEvent->find('list',array('fields'=>'id,contact_id','conditions'=>array('ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.warrant_id IS NOT NULL')));
		$this->set(compact('new_service','existing_service','today_service','month_service','warranty_service'));
		
	
		
	}
	
	
	public function serviceapp_add()
	{
		
	
		$this->layout = "ajax";
		
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');
		
		$modified = date('Y-m-d H:i:s');
		
		if ($this->request->is('post')) {
			
			$this->request->data['ServiceEvent']['logged_user_id'] = $current_user_id;
			$this->request->data['ServiceEvent']['user_id'] = $this->request->data['ServiceLead']['user_id'];
			$this->request->data['ServiceEvent']['dealer_id'] = $dealer_id;
			$this->request->data['ServiceEvent']['service_status_id']=$this->request->data['ServiceLead']['service_status_id'];
			$this->request->data['ServiceLead']['writer_id'] = $current_user_id;
			$this->request->data['ServiceLead']['company_id'] = $dealer_id;
			$this->request->data['ServiceLead']['company'] = $this->Auth->user('dealer');
			$this->request->data['ServiceLead']['warrant_id']=$this->request->data['ServiceEvent']['warrant_id'];
			$this->request->data['ServiceLead']['bay_id']=$this->request->data['ServiceEvent']['bay_id'];
			//$this->request->data['ServiceLead']['year'] = $this->request->data['ServiceLead']['year'];
			//contact info
			$this->request->data['ServiceEvent']['first_name'] = $this->request->data['ServiceLead']['first_name'];
			$this->request->data['ServiceEvent']['last_name'] = $this->request->data['ServiceLead']['last_name'];
			$this->request->data['ServiceEvent']['mobile'] = $this->request->data['ServiceLead']['mobile'];
			$this->request->data['ServiceEvent']['phone'] = $this->request->data['ServiceLead']['phone'];
			$this->request->data['ServiceEvent']['sperson'] = $this->request->data['ServiceLead']['sperson'];
			$this->request->data['ServiceEvent']['email'] = $this->request->data['ServiceLead']['email'];
			$this->request->data['ServiceEvent']['event_type_id'] = implode(',',$this->request->data['ServiceEvent']['event_type_id']);
			//$this->request->data['ServiceEvent']['zone'] = $zone;
			$this->request->data['ServiceEvent']['start'] = '';
			if($this->request->data['ServiceEvent']['start_date'] != '' && $this->request->data['ServiceEvent']['start_time'] != ''){
				$this->request->data['ServiceEvent']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['start_date']." ".$this->request->data['ServiceEvent']['start_time']));
			}
			$this->request->data['ServiceEvent']['end'] = '';
			if($this->request->data['ServiceEvent']['end_date'] != '' && $this->request->data['ServiceEvent']['end_time'] != ''){
				$this->request->data['ServiceEvent']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['ServiceEvent']['end_date']." ".$this->request->data['ServiceEvent']['end_time']));
			}
			$this->request->data['ServiceEvent']['modified'] = $modified;
			
			if($this->ServiceLead->save($this->request->data)){
				$service_lead_id=$this->ServiceLead->id;
				$this->request->data['ServiceEvent']['contact_id'] = $service_lead_id;
				$old_appts=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.id','conditions'=>array('ServiceEvent.contact_id'=>$service_lead_id)));
				if(!empty($old_appts)){
					$this->ServiceEvent->updateAll(array('ServiceEvent.active'=>0),array('ServiceEvent.id'=>$old_appts));
				}
				$this->ServiceEvent->save($this->request->data);
				$old_data = $this->ServiceEvent->find('first', array('recursive' =>0, 'conditions'=>array('ServiceEvent.id' => $this->ServiceEvent->id)));
					$history_data = array();
					$history_data['contact_id'] = 			$old_data['ServiceEvent']['contact_id'];
					$history_data['event_id'] = 			$old_data['ServiceEvent']['id'];
					$history_data['customer_name'] = 		$old_data['ServiceEvent']['first_name']." ".$old_data['ServiceEvent']['last_name'];
					$history_data['make'] = 			$old_data['ServiceEvent']['title'];
					$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['start']));
					$history_data['status'] = 				$old_data['ServiceStatus']['name'];
					$history_data['comment'] = 				$old_data['ServiceEvent']['details'];
					$history_data['notes'] = 				$old_data['ServiceEvent']['title'];
					$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['modified']));
					$history_data['start_date'] = 			$this->request->data['ServiceEvent']['start'];
					$history_data['end_date'] = 			$this->request->data['ServiceEvent']['end'];
					$history_data['h_type'] = 				"Service Appointment";
					$history_data['sales_step'] = 				"Service Appointment";
					$history_data['sperson'] 	=	$this->request->data['ServiceEvent']['sperson'];
				
					$history = array(
						'ServiceHistory' => $history_data
					);
					$this->ServiceHistory->save($history);
				if($this->request->is('ajax'))
				{
					die('saved');
				}
				$this->Session->setFlash(__('Booking added successfully'), 'alert', array('class' => 'alert-success'));
				
				$this->redirect(array('controller' => 'service_calendar', 'action' => 'index','serviceapp'=>true));
			}
		}
		/*
		$this->ServiceEvent->ServiceEventType->bindModel(array('belongsTo' => array('ServiceJobCategory')));
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$eventTypes = $this->ServiceEvent->ServiceEventType->find('all', array('order'=>"ServiceEventType.id ASC",'conditions' => array('ServiceEventType.dealer_id' => array(0,$dealer_id))));
		$service_job_array = array();
		foreach($eventTypes as $e_type){
			$job_name = $e_type['ServiceEventType']['combine_name'];
			if(!empty($e_type['ServiceJobCategory'])){
				$job_name = $e_type['ServiceJobCategory']['name'].' - '.$job_name ;
			}
			$service_job_array[$e_type['ServiceEventType']['id']] = $job_name ;
		}
		
		
		*/
		$this->loadModel("Category");
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$eventTypes = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$eventTypeTime = $this->ServiceEvent->ServiceEventType->find('list', array('fields' => 'id,est_time','order'=>"ServiceEventType.id ASC",'conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set(compact('eventTypeTime'));
		$model_opt = $year_opt =$mk_options = $body_sub_type_options = array();
		if(isset($this->request->params['named']['start_date'])&&!empty($this->request->params['named']['start_date']))
		{
		$start_date=$this->request->params['named']['start_date'];
		//$s_event_type_id = $this->request->params['named']['event_type_id'];
		$this->request->data['ServiceEvent']['start_date'] = date('Y-m-d', strtotime($start_date));
			$this->request->data['ServiceEvent']['start_time'] = date('h:i A', strtotime($start_date));
			$this->request->data['ServiceEvent']['end_date'] = date('Y-m-d', strtotime($start_date));
			$this->request->data['ServiceEvent']['end_time'] = date('h:i A', strtotime('+1 hour',strtotime($start_date)));
			$this->request->data['ServiceEvent']['event_type_id'] = $s_event_type_id;
			if(isset($this->request->params['named']['contact_id']) && !empty($this->request->params['named']['contact_id']))
			{
				$contact_id =$this->request->params['named']['contact_id'];
				$this->loadModel('Contact');
				$fields = array('Contact.id','Contact.first_name','Contact.last_name','ContactStatus.name',			'Contact.type',	'Contact.condition','Contact.year',	'Contact.make',	'Contact.model','Contact.stock_num',
				'Contact.modified_full_date','Contact.modified','Contact.mobile','Contact.phone','Contact.work_number','Contact.address','Contact.city','Contact.state','Contact.zip','Contact.email',		'Contact.sperson','Contact.owner','Contact.company','Contact.company_id','Contact.lead_status','Contact.status',
				'Contact.sales_step','Contact.source','Contact.chk_duplicate','Contact.category','Contact.unit_value','Contact.model_id','Contact.class','Contact.condition','Contact.engine','Contact.vin',
				'Contact.odometer','Contact.unit_color', 'Contact.vehicle_selection_type'				
			); 
				$Contactinfo =$this->Contact->find('first',array('fields' => $fields,'recursive' => 0,'conditions'=> array('Contact.id' => $contact_id)));
				$contactID =  $Contactinfo['Contact']['id'];
				unset( $Contactinfo['Contact']['id']);
				$this->request->data['ServiceLead'] = $Contactinfo['Contact'];
				$this->request->data['ServiceLead']['contact_id'] =   $contactID;
				$this->request->data['ServiceLead']['first_name'] = $Contactinfo['Contact']['first_name'];
				$this->request->data['ServiceLead']['last_name'] = $Contactinfo['Contact']['last_name'];
				$this->request->data['ServiceLead']['email'] = $Contactinfo['Contact']['email'];
				$this->request->data['ServiceLead']['phone'] = $Contactinfo['Contact']['phone'];
				$this->request->data['ServiceLead']['mobile'] = $Contactinfo['Contact']['mobile'];
				$this->request->data['ServiceLead']['sperson'] = $Contactinfo['Contact']['sperson'];
				$this->request->data['ServiceLead']['work_number'] = $Contactinfo['Contact']['work_number'];
				$this->request->data['ServiceLead']['city'] = $Contactinfo['Contact']['city'];
				$this->request->data['ServiceLead']['id'] = $Contactinfo['Contact']['id'];
				$this->request->data['ServiceLead']['state'] = $Contactinfo['Contact']['state'];
				$this->request->data['ServiceLead']['zip'] = $Contactinfo['Contact']['zip'];
				$this->request->data['ServiceLead']['address'] = $Contactinfo['Contact']['address'];
				
				//Vehicle info
				
				$this->request->data['ServiceLead']['vehicle_selection_type'] = $Contactinfo['Contact']['vehicle_selection_type'];
				$this->request->data['ServiceLead']['category'] = $Contactinfo['Contact']['category'];
				$this->request->data['ServiceLead']['type'] = $Contactinfo['Contact']['type'];
				$this->request->data['ServiceLead']['make'] = $Contactinfo['Contact']['make'];
				$this->request->data['ServiceLead']['year'] = $Contactinfo['Contact']['year'];
				$this->request->data['ServiceLead']['model'] = $Contactinfo['Contact']['model'];
				$this->request->data['ServiceLead']['model_id'] = $Contactinfo['Contact']['model_id'];
				$this->request->data['ServiceLead']['class'] = $Contactinfo['Contact']['class'];
				$this->request->data['ServiceLead']['condition'] = $Contactinfo['Contact']['condition'];


				// debug( $this->request->data['ServiceLead']['vehicle_selection_type'] );

				//D_TYPE SELECTION
				$d_type_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_d_type','return',
					'?'=>array('vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'] )));
				$this->set('d_type_options', $d_type_options);

				// debug( $d_type_options );


				//MAKE SELECTION
				$mk_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_make_n','return',
					'?'=>array( 'vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'],  'type'=> $this->request->data['ServiceLead']['category'])));
				$this->set('mk_options', $mk_options);


				//YEAR SELECTION
				if( $this->request->data['ServiceLead']['model_id'] != '' ){
					$year_opt = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_year_n','return',
						'?'=>array( 'vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'], 
							'type'=> $this->request->data['ServiceLead']['category'],
							'make'=> $this->request->data['ServiceLead']['make'],
						 )));
				}else{
					$year_opt = array();
					$year_opt[0] = 'Any Year';
					for($i=date('Y')+1; $i>=1980; $i--){
						$year_opt[$i] = $i;
					}
				}
				$this->set('year_opt', $year_opt);


				//MODEL SELECTION
				$year_contact =  $this->request->data['ServiceLead']['year'];
				$make_contact = $this->request->data['ServiceLead']['make'];

				$model_opt_withspace = array();
				if($make_contact != '' && $year_contact != ''){
					$model_opt_withspace = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_model_n','return',
						'?'=>array(
								'vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'],  
								'year'=>$year_contact,'make'=>$make_contact,
								'type' => $this->request->data['ServiceLead']['category']
							)
					));
				}
				foreach($model_opt_withspace as $key=>$value){
					$model_opt[ trim($key) ] = $value;
				}
				$this->set('model_opt', $model_opt);



				//CATEGORY SELECTION
				$body_type = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_classes_type','return',
					'?'=>array('vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'],'type'=>$this->request->data['ServiceLead']['category'])));
				$this->set('body_type', $body_type);

				
				
				//CLASS SELECTION
				$body_sub_type_options_space = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_classes','return','?'=>array(
					'vehicle_selection_type'=>$this->request->data['ServiceLead']['vehicle_selection_type'],  
					'class'=>$this->request->data['ServiceLead']['class'],
					'type'=> $this->request->data['ServiceLead']['category'],
					'category'=>$this->request->data['ServiceLead']['type'],
				)));
				$body_sub_type_options = array();
				foreach($body_sub_type_options_space as $key=>$value){
					$body_sub_type_options[trim($key)] = $value;
				}
				$this->set('body_sub_type_options', $body_sub_type_options);


				
				// $d_type = $this->request->data['ServiceLead']['category'];
				
				// if($d_type == '' && $this->request->data['ServiceLead']['make'] == 'Harley-Davidson'){
				// 	$d_type = "Harley-Davidson";
				// 	$this->request->data['ServiceLead']['category'] = $d_type;
				// }else if($d_type == '' && $this->request->data['ServiceLead']['make'] != 'Harley-Davidson' ){
				// 	$d_type = "Powersports";
				// 	$this->request->data['ServiceLead']['category'] = "Powersports";
				// }
				
				
				// $body_type = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_category_list','return','?'=>array('d_type'=>$this->request->data['ServiceLead']['category'])));
				// $this->set('body_type', $body_type);
				
				// $body_type_val = $this->request->data['ServiceLead']['type'];
				// if($body_type_val == ''){
				// 	$body_type_val = array_keys($body_type);
				// }
		
				// $body_sub_type_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_classes_type','return','?'=>array(
				// 	'class'=>$this->request->data['ServiceLead']['class'],
				// 	'd_type'=>$d_type,'category'=>$body_type_val,
				// 	'make'=>$this->request->data['ServiceLead']['make'],
				// 	'year'=>$this->request->data['ServiceLead']['year'],
				// )));
				// $category_contact = $this->request->data['ServiceLead']['type'];
				// $mk_options = array();
				// if($category_contact != ''){
				// 	$mk_options = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_make_n','return','?'=>array('type'=>$d_type,'category'=>$category_contact)));
				// }
				
				
				// $make_contact = $this->request->data['ServiceLead']['make'];
				// $year_opt = array();
				// if( $this->request->data['ServiceLead']['model_id'] != '' ){
				// 	if($make_contact != '' && $body_type_val != ''){
				// 		$year_opt = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_year_n','return','?'=>array('make'=>$make_contact,'type'=>$d_type,'category'=>$body_type_val)));
				// 	}
				// }else{
				// 	$year_opt = array();
				// 	$year_opt[0] = 'Any Year';
				// 	for($i=date('Y')+1; $i>=1980; $i--){
				// 		$year_opt[$i] = $i;
				// 	}
				// }
				
				
				// $this->loadModel('Trim');
				
		
				// //get model options
				// //Get Model Selection
				// $year_contact =  $this->request->data['ServiceLead']['year'];
				// $category_contact = $this->request->data['ServiceLead']['type'];
				// $make_contact = $this->request->data['ServiceLead']['make'];
				// $model_opt = array();
				// if($make_contact != '' && $category_contact != '' && $year_contact != ''){
		
				// 	$model_opt = $this->requestAction(array('serviceapp'=>false,'controller'=>'categories','action'=>'get_model_n','return','?'=>array('year'=>$year_contact,'make'=>$make_contact,'type'=>$d_type,'category'=>$category_contact)));
				// }
















				
		
			}elseif(!empty($this->request->params['named']['adp_customer_id']))
			{
				$this->loadModel('AdpCustomer');
				$adp_lead_fields = array('AdpCustomer.id','AdpCustomer.dealer_id','AdpCustomer.first_name','AdpCustomer.last_name','AdpCustomer.mobile','AdpCustomer.home_phone','AdpCustomer.work_phone','AdpCustomer.address','AdpCustomer.city','AdpCustomer.state','AdpCustomer.zip','AdpCustomer.email','AdpCustomer.county','AdpCustomer.birth_date');		
				$lightspeed_lead = $this->AdpCustomer-> find('first',array('recursive' => -1,'fields' => $adp_lead_fields,'conditions' => array('AdpCustomer.id' => $this->request->params['named']['adp_customer_id'])));
				if(!empty($lightspeed_lead))
				{
					unset($lightspeed_lead['AdpCustomer']['id']);
					$this->request->data['ServiceLead'] = $lightspeed_lead['AdpCustomer'];
					$this->request->data['ServiceLead']['phone'] = $lightspeed_lead['AdpCustomer']['home_phone'];
					$this->request->data['ServiceLead']['work_number'] = $lightspeed_lead['AdpCustomer']['work_phone'];
				}
			}
			//$this->request->data['ServiceEvent']['title'] = $eventTypes[$s_event_type_id];
	}
	if(isset($this->request->params['named']['user_id'])&&!empty($this->request->params['named']['user_id']))
	{
		$this->request->data['ServiceLead']['user_id'] = $this->request->params['named']['user_id'];
	}
	
		//vehicle info
		$this->set(compact('model_opt','year_opt','mk_options','body_sub_type_options'));
		
		$this->set('eventTypes',$eventTypes );
		
		// $d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		// $d_type_options = array();
		// //$d_type_options = array('In Stock'=>'In Stock');
		// foreach($d_types as $d_type){
		// 	$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type']; 
		// }
		$this->set('d_type_options', $d_type_options);
		//$this->loadModel('Category');
		
		$this->set('body_type', $body_type);
		$this->loadModel('ServiceEventStatus');
		$event_statuses=$this->ServiceEventStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('event_statuses',$event_statuses);
		
		$this->loadModel('ServiceWarrantyType');
		$service_warrant_types=$this->ServiceWarrantyType->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$this->set('service_warrant_types',$service_warrant_types);		
		
		$this->loadModel('ServiceStatus');
		$service_statuses=$this->ServiceStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('service_statuses',$service_statuses);	
		$this->loadModel('ServiceCategory');
		$service_sub_categories=$this->ServiceCategory->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id))));
		$this->set('service_sub_categories',$service_sub_categories);	
		
		// Service Bays
		
		$this->loadModel('ServiceBay');
		$service_bays=$this->ServiceBay->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'is_active' => 1)));
		$this->set('service_bays',$service_bays);
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
		if(empty($service_timings))
		{
			$service_timings['ServiceSetting']['start']='07:00:00';
			$service_timings['ServiceSetting']['end']='19:00:00';
		}
		$this->set('service_timings',$service_timings);
		$this->loadModel('User');
		$users=$this->User->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'group_id'=>15,'active' => 1)));
		
		$this->set('users',$users);
		$this->loadModel('ServiceJobCategory');
	
		$service_categories = $this->ServiceJobCategory->find('list',array('conditions'=>array('ServiceJobCategory.dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		
		$this->set('service_categories',$service_categories);
		$this->loadModel('ServiceSetting');
		$service_settings = $this->ServiceSetting->find('first',array('conditions' => array('dealer_id' => $dealer_id)));
		$this->set(compact('service_settings'));


		$vehicle_selection_type_options = array('In Stock' => '&nbsp In Stock',  'Showroom' => '&nbsp Catalog');
		if($this->Auth->User('dealer_id') == '20020'){
			$vehicle_selection_type_options = array('Branch Inventory' => '&nbsp Branch Inventory',  'Showroom' => '&nbsp Catalog');
		}
		$this->set('vehicle_selection_type_options', $vehicle_selection_type_options);


	
	}
	
	public function serviceapp_search($limit =20)
	{
		//$model='ServiceLead';
		$dealer_id=$this->Auth->user('dealer_id');
		$this->layout=null;
		if($this->request->is('post'))
		{
		$seachData=$this->request->data;
		
		$conditions=$this->_get_search_conditions($seachData);
		//pr($conditions);
		/*$this->ServiceLead->bindModel(array('belongsTo'=>array('Tech'=>array('className'=>'User','fields'=>'id,first_name,last_name','foreignKey'=>'user_id'),'Tech2'=>array('className'=>'User','fields'=>'id,first_name,last_name','foreignKey'=>'tech2_id'),'Tech2'=>array('className'=>'User','fields'=>'id,first_name,last_name','foreignKey'=>'tech2_id'))));*/
		
		$this->ServiceLead->bindModel(array(
				'hasMany'=>array(
					'ServiceHistory'=>array(
							'className'=>'ServiceHistory',
							'foreignKey'=>'contact_id'
							)
					),
				'hasOne' => array(
					'ServiceEvent'=>array(
							'className'=>'ServiceEvent',
							'foreignKey'=>'contact_id',
							'conditions'=>array('ServiceEvent.active'=>1)
							)
					)
				));
		$this->ServiceEvent->unBindModel(array('belongsTo'=>array('ServiceEvent')));
		if($limit=='all')
		{
			$service_leads=$this->ServiceLead->find('all',array('conditions'=>$conditions,'order' => 'ServiceEvent.start DESC'));
		
		}else
		{
			$service_leads=$this->ServiceLead->find('all',array('conditions'=>$conditions,'limit'=>$limit,'order' => 'ServiceEvent.start DESC'));
		}
		$service_leads_count=$this->ServiceLead->find('count',array('conditions'=>$conditions));
		$this->loadModel('User');
		$user_names=$this->User->find('list',array('fields'=>'id,full_name','conditions'=>array('User.dealer_id'=>$dealer_id)));
		$this->loadModel('ServiceBay');
		$service_bays=$this->ServiceBay->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'is_active' => 1)));
		$this->set('service_bays',$service_bays);
		$this->loadModel('ServiceEventType');
		$service_types=$this->ServiceEventType->find('list');
		$this->set('service_types',$service_types);
		$this->loadModel('ServiceStatus');
		$service_statuses=$this->ServiceStatus->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'hide_list NOT LIKE ' => '%'.$dealer_id.'%')));
		$this->set('service_statuses',$service_statuses);	
		$this->set('service_leads',$service_leads);
		$this->set('user_names',$user_names);
		$this->set('limit',$limit);
		$this->set('service_leads_count',$service_leads_count);
		}
	}
	private function _get_search_conditions($seachData=array(),$model='ServiceLead')
	{
		$dealer_id=$this->Auth->user('dealer_id');
		$service_leads=array();
		$conditions=array($model.'.company_id'=>$dealer_id);
		
		if(!empty($seachData['first_name']))
		{
			$conditions['OR'][$model.'.first_name LIKE']='%'.$seachData['first_name'].'%';
		}
		if(!empty($seachData['last_name']))
		{
			$conditions['OR'][$model.'.last_name LIKE']='%'.$seachData['last_name'].'%';
		}
		if(!empty($seachData['phone']))
		{
			$conditions['OR'][$model.'.phone LIKE']='%'.$seachData['phone'].'%';
			$conditions['OR'][$model.'.mobile LIKE']='%'.$seachData['mobile'].'%';
			$conditions['OR'][$model.'.work_number LIKE']='%'.$seachData['work_number'].'%';
		}
		if(!empty($seachData['email']))
		{
			$conditions['OR'][$model.'.email LIKE']='%'.$seachData['email'].'%';
		}
		if(!empty($seachData['category']))
		{
			$conditions['OR'][$model.'.category LIKE']='%'.$seachData['category'].'%';
		}
		if(!empty($seachData['type']))
		{
			$conditions['OR'][$model.'.type LIKE']='%'.$seachData['type'].'%';
		}
		if(!empty($seachData['syear']))
		{
			$conditions['OR'][$model.'.year LIKE']='%'.$seachData['year'].'%';
		}
		if(!empty($seachData['model_id']))
		{
			$conditions['OR'][$model.'.model_id']=$seachData['model_id'];
		}if(!empty($seachData['class']))
		{
			$conditions['OR'][$model.'.class LIKE']='%'.$seachData['class'].'%';
		}if(!empty($seachData['unit_value']))
		{
			$conditions['OR'][$model.'.unit_value']=$seachData['unit_value'];
		}if(!empty($seachData['stock_num']))
		{
			$conditions['OR'][$model.'.stock_num LIKE']='%'.$seachData['stock_num'].'%';
		}if(!empty($seachData['condition']))
		{
			$conditions['OR'][$model.'.condition LIKE']='%'.$seachData['condition'].'%';
		}if(!empty($seachData['engine']))
		{
			$conditions['OR'][$model.'.engine LIKE']='%'.$seachData['engine'].'%';
		}if(!empty($seachData['vin']))
		{
			$conditions['OR'][$model.'.vin LIKE']='%'.$seachData['vin'].'%';
		}if(!empty($seachData['odometer']))
		{
			$conditions['OR'][$model.'.odometer LIKE']='%'.$seachData['odometer'].'%';
		}if(!empty($seachData['condition']))
		{
			$conditions['OR'][$model.'.unit_color LIKE']='%'.$seachData['unit_color'].'%';
		}if(!empty($seachData['user_id']))
		{
			$conditions['OR'][$model.'.user_id']=$seachData['user_id'];
		}if(!empty($seachData['tech2_id']))
		{
			$conditions['OR'][$model.'.tech2_id']=$seachData['tech2_id'];
		}
				
		if(!empty($seachData['event_type_id']))
		{
			$leads=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.event_type_id'=>$seachData['event_type_id'],'ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.active'=>1)));
			$service_leads=array_merge($service_leads,$leads);
			
		}
		
		if(!empty($seachData['status']))
		{
			$leads=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.status'=>$seachData['status'],'ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.active'=>1)));
			$service_leads=array_merge($service_leads,$leads);
			
		}if(!empty($seachData['warrant_id']))
		{
			$leads=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.warrant_id'=>$seachData['warrant_id'],'ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.active'=>1)));
			$service_leads=array_merge($service_leads,$leads);
			
			
		}if(!empty($seachData['service_status_id']))
		{
			$leads=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.service_status_id'=>$seachData['service_status_id'],'ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.active'=>1)));
			$service_leads=array_merge($service_leads,$leads);
			
		}if(!empty($seachData['bay_id']))
		{
			$leads=$this->ServiceEvent->find('list',array('fields'=>'ServiceEvent.id,ServiceEvent.contact_id','conditions'=>array('ServiceEvent.bay_id'=>$seachData['bay_id'],'ServiceEvent.dealer_id'=>$dealer_id,'ServiceEvent.active'=>1)));
			$service_leads=array_merge($service_leads,$leads);
			
		}
		if(!empty($seachData['service_lead_id']))
		{
			unset($conditions['OR']);
			$service_leads=explode(',',$seachData['service_lead_id']);
			
		}
		if(!empty($service_leads))
		{
			$conditions['ServiceLead.id']=$service_leads;
		}
		
		return $conditions;
	}
	
	public function serviceapp_get_hours()
	{
		$this->layout=false;
		$dealer_id=$this->Auth->user('dealer_id');
		$zone = $this->Auth->User('zone');
		//date_default_timezone_set($zone);
		$bay_id=null;
		$max_hours=12;
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->find('all',array('fields'=>'(time_to_sec(timediff(ServiceSetting.end, ServiceSetting.start )) / 3600) as max_hours,ServiceSetting.dealer_id,,ServiceSetting.start,,ServiceSetting.end','conditions'=>array('ServiceSetting.dealer_id'=>$dealer_id)));
		$dealer_service_timings = array();
		if(!empty($service_timings))
		{
			$max_hours=$service_timings[0][0]['max_hours'];
			$dealer_service_timings = $service_timings[0]['ServiceSetting'];
		}
		else
		{
			$dealer_service_timings['start']='07:00:00';
			$dealer_service_timings['end']='19:00:00';
		}
		if($this->request->is('post')){
			
			$this->loadModel('DealerBreak');
			$dealer_breaks = $this->DealerBreak->find('first',array('fields' =>'SUM(time_to_sec(timediff(DealerBreak.end, DealerBreak.start )) / 3600) as break_time','conditions' => array('dealer_id' => $dealer_id),'group' => 'dealer_id'));
			
			$view_name=$this->request->data['view_name'];
			if($view_name=='month')
			{
				die;
			}
			//pr($this->request->data);
			if(isset($this->request->data['bay_id']))
			{
				$bay_id=$this->request->data['bay_id'];
			}
			if($view_name == 'resourceDay')
			{
				$start_date=date('Y-m-d',strtotime('+1 day',strtotime($this->request->data['start_date'])));
				$end_date=date('Y-m-d',strtotime($this->request->data['end_date']));
			}else
			{
				$start_date = date('Y-m-d',strtotime($this->request->data['start_date']));
				$end_date = date('Y-m-d',strtotime('-1 day',strtotime($this->request->data['end_date'])));
			}
			$start_date = date('Y-m-d',strtotime($this->request->data['start_date']));
			$end_date = date('Y-m-d',strtotime('-1 day',strtotime($this->request->data['end_date'])));
			$conditions=array();
			$conditions1=array();
			$conditions['ServiceEvent.dealer_id']=$dealer_id;
			$conditions1['TechEvent.dealer_id']=$dealer_id;
			
			if($bay_id!=null){
				$conditions['ServiceEvent.bay_id']=$bay_id;
				$conditions1['TechEvent.bay_id']=$bay_id;	
			}
			if($view_name=='agendaDay')
			{
				$conditions['DATE(ServiceEvent.start)']=$start_date;
				$conditions['DATE(ServiceEvent.end)']=$start_date;
				$conditions1['DATE(TechEvent.start)']=$start_date;
				$conditions1['DATE(TechEvent.end)']=$start_date;
				$date_array=$this->createDateRangeArray($start_date,$end_date);
				list($hours_array,$tech_hours_array) = $this->_agendaViewData($conditions,$conditions1,$dealer_service_timings);

			}elseif($view_name=='resourceDay')
			{
				$conditions['DATE(ServiceEvent.start) <=']=$end_date;
				$conditions['DATE(ServiceEvent.end) >=']=$start_date;
				$conditions1['DATE(TechEvent.start) <=']=$end_date;
				$conditions1['DATE(TechEvent.end) >=']=$start_date;
				$search_range = array('start_date' => $start_date,'end_date' => $end_date);
				list($date_array,$hours_array,$tech_hours_array) = $this->_resourceViewData($conditions,$conditions1,$dealer_service_timings,$search_range);

			}
			else
			{
				
				$conditions['DATE(ServiceEvent.start) <=']=$end_date;
				$conditions['DATE(ServiceEvent.end) >=']=$start_date;
				
				//
				$conditions1['DATE(TechEvent.start) <='] = $end_date;
				$conditions1['DATE(TechEvent.end) >='] = $start_date;
				
				$date_array=$this->createDateRangeArray($start_date,$end_date);
				if($date_array > 2)
				{
					if($this->Session->check('service_tech_id'))
					{
						$service_tech_id = $this->Session->read('service_tech_id');
						if($service_tech_id){
						$conditions['ServiceEvent.user_id'] = $service_tech_id;
						$conditions1['TechEvent.user_id'] = $service_tech_id;
						}
					}
				}
				list($hours_array,$tech_hours_array) = $this->_agendaViewData($conditions,$conditions1,$dealer_service_timings);
				

			}
			//pr($conditions);
			
			
			$this->set(compact('date_array','hours_array','tech_hours_array','max_hours','dealer_breaks'));
			
		}
		
	}
	
	private function createDateRangeArray($strDateFrom,$strDateTo)
	{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

   
    $aryRange=array();
	$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

public function serviceapp_add_break($id=null)
{
	$this->layout = "ajax";
	$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
	$current_user_id = $this->Auth->User('id');
	$dealer_id = $this->Auth->User('dealer_id');
	$this->loadModel('TechEvent');
	
	if($this->request->is('post')){
		$this->request->data['TechEvent']['dealer_id']=$dealer_id;
		$this->request->data['TechEvent']['added_by']=$current_user_id;
		$this->request->data['TechEvent']['start'] = '';
		
		if($this->request->data['TechEvent']['start_date'] != '' && $this->request->data['TechEvent']['start_time'] != ''){
				$this->request->data['TechEvent']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['TechEvent']['start_date']." ".$this->request->data['TechEvent']['start_time']));
			}
			$this->request->data['TechEvent']['end'] = '';
		if($this->request->data['TechEvent']['end_date'] != '' && $this->request->data['TechEvent']['end_time'] != ''){
				$this->request->data['TechEvent']['end'] = date("Y-m-d H:i:s", strtotime($this->request->data['TechEvent']['end_date']." ".$this->request->data['TechEvent']['end_time']));
			}
			//$this->TechEvent->create();
			if($this->TechEvent->save($this->request->data)){
				$this->Session->setFlash(__('Break added Successfully'), 'alert', array('class' => 'alert-success'));
			
			}else{
				$this->Session->setFlash(__('Break Could Not be added.Please try again!'), 'alert', array('class' => 'alert-danger'));
			}
			$this->redirect(array('controller' => 'service_calendar', 'action' => 'index','serviceapp'=>true));
		
	}
	$start_date='';
	$break_type='Break';
	if(isset($this->request->params['named']['etype'])&&!empty($this->request->params['named']['etype'])){
		$break_type=$this->request->params['named']['etype'];
	}
	if(isset($this->request->params['named']['start_date'])&&!empty($this->request->params['named']['start_date']))
	{
		$start_date=$this->request->params['named']['start_date'];
			$this->request->data['TechEvent']['start_date'] = date('Y-m-d', strtotime($start_date));
			$this->request->data['TechEvent']['start_time'] = date('h:i A', strtotime($start_date));
			$this->request->data['TechEvent']['end_date'] = date('Y-m-d', strtotime($start_date));
			if($break_type == 'Break'){
			$this->request->data['TechEvent']['end_time'] = date('h:i A', strtotime('+30 minutes',strtotime($start_date)));}
			else{
			$this->request->data['TechEvent']['end_time'] = date('h:i A', strtotime('+1 hour',strtotime($start_date)));
			}
			
	}
	if(!empty($this->request->params['named']['user_id']))
	{
		$this->request->data['TechEvent']['user_id'] = $this->request->params['named']['user_id'];
	}
	
	$this->request->data['TechEvent']['break_type']=$break_type;
	$edit_mode=false;
	if($id!=null)
	{
		$edit_mode=true;
		$eventData=$this->TechEvent->findById($id);
		$this->request->data=$eventData;
		$this->request->data['TechEvent']['start_date'] = date('Y-m-d', strtotime($eventData['TechEvent']['start']));
			$this->request->data['TechEvent']['start_time'] = date('h:i A', strtotime($eventData['TechEvent']['start']));
			$this->request->data['TechEvent']['end_date'] = date('Y-m-d', strtotime($eventData['TechEvent']['end']));
			$this->request->data['TechEvent']['end_time'] = date('h:i A', strtotime($eventData['TechEvent']['end']));
		
	}
	$this->loadModel('ServiceBay');
	$service_bays=$this->ServiceBay->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'is_active' => 1)));
	$this->set('service_bays',$service_bays);
	$this->set('edit_mode',$edit_mode);
	$this->loadModel('ServiceSetting');
	$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
	if(empty($service_timings))
	{
		$service_timings['ServiceSetting']['start']='07:00:00';
		$service_timings['ServiceSetting']['end']='19:00:00';
	}
	$this->set('service_timings',$service_timings);
	$this->loadModel('User');
	$users=$this->User->find('list',array('conditions'=>array('dealer_id'=>array(0,$dealer_id),'group_id'=>15)));
	$this->set('users',$users);
}
	
public function serviceapp_status_update($id=null)
{
		$fields_map_array = array(
			'lead_status'=>'Open/Close',
			'contact_status_id'=>'Lead Type',
			'sales_step'=>'Step',
			'address'=>'Address',
			'city'=>'City',
			'state'=>'State',
			'zip'=>'Zip',
			'unit_value'=>'Unit Value',
			'engine'=>'Engine',
			'vin'=>'Vin',
			'odometer'=>'Miles',
			'status'=>'Status',
			'gender'=>'Gender',
			'best_time'=>'Best Time',
			'buying_time'=>'Buying Time',
			'source'=>'Source',
			'stock_num'=>'Stock',
			'stock_num_trade'=>'Stock#/T',
			'first_name'=>'First Name',
			'last_name'=>'Last Name',
			'phone'=>'Phone',
			'mobile'=>'Mobile',
			'email'=>'Email',
			'condition'=>'Unit Condtion',
			'year'=>'Year',
			'make'=>'Make',
			'model'=>'Model',
			'type'=>'Unit Type',
			'condition_trade'=>'Trade Condition',
			'trade_value'=>'Trade Value',
			'year_trade'=>'Trade Year',
			'make_trade'=>'Trade Make',
			'model_trade'=>'Trade Model',
			'type_trade'=>'Trade Type',
			'unit_color'=>'Unit Color',
			'vin_trade'=>'(Trade) Vin Number',
			'odometer_trade'=>'(Trade) Miles',
			'notes'=>'Notes',
			'usedunit_color'=>'Trade Color',
		);
		$contact_statuses = array(
			'12' => 'Mobile Lead',
			'5' => 'Web Lead',
			'6' => 'Phone Lead',
			'7' => 'Showroom',
			'8' => 'Parts',
			'9' => 'Service',
			'10' => 'Call Center',
			'11' => 'Rental'
		);
   	
   		$update_type = $this->request->query['update_type'];
   		$this->set('update_type', $update_type);
   	
   		$contact_info = $this->ServiceLead->find('first', array('recursive'=>-1,'conditions'=>array('ServiceLead.id'=>$id)));
   		$this->set('contact_info',$contact_info);
   		
   		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');
		
		App::uses('Sanitize', 'Utility');
	if ($this->request->is('post')) {
		$current_user_id = $this->Auth->user('id');
		$this->ServiceLead->updateAll(
					array(
						'ServiceLead.status' => "'".$this->request->data['Contact']['status']."'",
						//'Contact.dnc_status' => "'".$this->request->data['Contact']['dnc_status']."'",
						'ServiceLead.notes' => "'".Sanitize::escape($this->request->data['Contact']['notes'])."'",
						'ServiceLead.modified' => "'".$datetimetext."'",
						'ServiceLead.form_used' => "'short'",
					),
					array('ServiceLead.id' => $id)
				);
				
				$history_data['contact_id'] = $contact_info['ServiceLead']['id'];
			$history_data['sperson'] = $contact_info['ServiceLead']['sperson'];
			$history_data['cond'] = $contact_info['ServiceLead']['condition'];
			$history_data['year'] = $contact_info['ServiceLead']['year'];
			$history_data['make'] = $contact_info['ServiceLead']['make'];
			$history_data['model'] = $contact_info['ServiceLead']['model'];
			$history_data['type'] = $contact_info['ServiceLead']['type'];
			$history_data['sales_step'] = $contact_info['ServiceLead']['sales_step'];
			$history_data['status'] = $contact_info['ServiceLead']['status'];
			$history_data['modified'] = date('D - M d, Y g:i A', strtotime($contact_info['ServiceLead']['modified']) );
			$history_data['created'] = $contact_info['ServiceLead']['modified'];
			$history_data['comment'] = $contact_info['ServiceLead']['notes'];
			$history_data['form_used'] = $contact_info['ServiceLead']['form_used'];
			
			$history_data['h_type'] = "Lead";
			$history = array(
				'ServiceHistory' => $history_data
			);
			$this->ServiceHistory->create();
			$this->ServiceHistory->save($history);
			$this->Session->setFlash(__('Status updated successfully!'), 'alert', array('class' => 'alert-success'));
	}
	
	
	
	$status_condition['ServiceLeadStatus.dealer_id'] = array($this->Auth->user('dealer_id'), 0);
   		if($update_type == 'Outbound Call Update'){
   					
   				$status_condition['ServiceLeadStatus.header'] = array('Service Outbound');
   					 			
   		}else if($update_type == 'Inbound Call Update'){
   			
   				$status_condition['ServiceLeadStatus.header'] = array('Service Inbound');
			
   			
   		}else if($update_type == 'Showroom Visit Update'){
   			
   				$status_condition['ServiceLeadStatus.header'] = array('Service Visit');
   			
   		}
   		
   		else if($update_type == 'Dead Lead (Closed)'){
			$status_condition['ServiceLeadStatus.header'] = array('Dead Lead (Closed)');
   		}
   		else if($update_type == 'Email Update (All)'){
   		
   			$status_condition['ServiceLeadStatus.header'] = array('Email (Open)');
   		}
   		else if($update_type == 'text status'){
   			$status_condition['ServiceLeadStatus.header'] = array('SMS Text- Out','SMS Text-In');
   		} 
   		

   		
   		//Status options
		$this->loadModel("ServiceLeadStatus");
		$leadStatuses = $this->ServiceLeadStatus->find('all',array('order'=>'ServiceLeadStatus.order ASC','conditions'=>$status_condition));
		
		$lead_status_options = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_options[$leadStatus['ServiceLeadStatus']['header']][] = $leadStatus['ServiceLeadStatus']['name'];
		}
		//$this->set('lead_status_options', $lead_status_options);
		/* sort statuses */
		$lead_status_options_sorted = array();
		foreach($lead_status_options as $key=>$value ){
			$items = $value;
			asort($items);
			$lead_status_options_sorted[$key] = $items;
		}
		
		
		
		$sopt = array();
		foreach($lead_status_options_sorted as $key=>$value ){
			$sopt[$key] = array();
			foreach($value as $v){
				$sopt[$key][$v] =$v; 
			}
		}
		$this->set('sopt', $sopt);
   		
}

private function _agendaViewData($conditions,$conditions1,$service_timings= array())
{
	$dealer_id = $this->Auth->user('dealer_id');
	
	$end_time = $service_timings['end'];
	
	// Need logic to calulate hours for start day end time and end day start time
	$booked_hours = $this->ServiceEvent->find('all',array('fields'=>'ServiceEvent.id,ServiceEvent.start,ServiceEvent.end','conditions'=>$conditions,'order'=>'ServiceEvent.start asc')); 
	//$booked_hours=$this->ServiceEvent->find('all',array('fields'=>'SUM(time_to_sec(timediff(IF((DATE(ServiceEvent.end) = DATE(ServiceEvent.start)),ServiceEvent.end,CONCAT(DATE(ServiceEvent.start)," '.$end_time.'")), ServiceEvent.start )) / 3600) as booked_hours,DATE(ServiceEvent.start) as stat_date','conditions'=>$conditions,'order'=>'ServiceEvent.start asc','group'=>'DATE(ServiceEvent.start)'));
	$this->loadModel('DealerBreak');
	$dealer_breaks = $this->DealerBreak->find('first',array('fields' =>'SUM(time_to_sec(timediff(DealerBreak.end, DealerBreak.start )) / 3600) as break_time','conditions' => array('dealer_id' => $dealer_id),'group' => 'dealer_id'));
	
	$hours_array=array();
	//pr($booked_hours);
	foreach($booked_hours as $hours)
	{
		$start_date = date('Y-m-d',strtotime($hours['ServiceEvent']['start']));
		$end_date = date('Y-m-d',strtotime($hours['ServiceEvent']['end']));
		if($start_date != $end_date)
		{
			$start_day_hours = round((strtotime($start_date.' '.$service_timings['end']) - strtotime($hours['ServiceEvent']['start']))/3600 ,2);
			$end_day_hours = round((strtotime($hours['ServiceEvent']['end']) - strtotime($end_date.' '.$service_timings['start']))/3600,2);
			$hours_array[$start_date] = !empty($hours_array[$start_date])?($hours_array[$start_date]+$start_day_hours):($start_day_hours + $dealer_breaks[0]['break_time']);
			$hours_array[$end_date] = !empty($hours_array[$end_date])?($hours_array[$end_date]+$end_day_hours):($end_day_hours + $dealer_breaks[0]['break_time']);
			
		}else
		{
			$day_hours = round((strtotime($hours['ServiceEvent']['end']) - strtotime($hours['ServiceEvent']['start'])
			
			)/3600 ,2);
			$hours_array[$start_date] = !empty($hours_array[$start_date])?($hours_array[$start_date]+$day_hours):($day_hours + $dealer_breaks[0]['break_time']);
		}
		
	}
	//tech event
	$this->loadModel('TechEvent');
	$tech_booked_hours=$this->TechEvent->find('all',array('fields'=>'SUM(time_to_sec(timediff(TechEvent.end, TechEvent.start )) / 3600) as booked_hours,DATE(TechEvent.start) as stat_date','conditions'=>$conditions1,'order'=>'TechEvent.start asc','group'=>'DATE(TechEvent.start)'));
	
	$tech_hours_array=array();
	//pr($booked_hours);
	foreach($tech_booked_hours as $hours)
	{
		if(isset($hours_array[$hours[0]['stat_date']]))
		{
			$hours_array[$hours[0]['stat_date']] +=$hours[0]['booked_hours'];
		}else{
			$hours_array[$hours[0]['stat_date']] =$hours[0]['booked_hours'];
		}
		$tech_hours_array[$hours[0]['stat_date']]=$hours[0]['booked_hours'];
	}
	
	//pr($hours_array);
	return array($hours_array,$tech_hours_array);
}

private function _resourceViewData($conditions,$conditions1,$service_timings,$search_range)
{
	$dealer_id =  $this->Auth->user('dealer_id');
	
	$booked_hours = $this->ServiceEvent->find('all',array('fields'=>'ServiceEvent.id,ServiceEvent.start,ServiceEvent.end,ServiceEvent.user_id','conditions'=>$conditions,'order'=>'ServiceEvent.user_id ASC')); 	
	
	$this->loadModel('DealerBreak');
	$dealer_breaks = $this->DealerBreak->find('first',array('fields' =>'SUM(time_to_sec(timediff(DealerBreak.end, DealerBreak.start )) / 3600) as break_time','conditions' => array('dealer_id' => $dealer_id),'group' => 'dealer_id'));
		
	$hours_array=array();
	foreach($booked_hours as $hours)
	{
		$user_id = $hours['ServiceEvent']['user_id'];
		$start_date = date('Y-m-d',strtotime($hours['ServiceEvent']['start']));
		$end_date = date('Y-m-d',strtotime($hours['ServiceEvent']['end']));
		if($start_date != $end_date)
		{
			$start_day_hours = round((strtotime($start_date.' '.$service_timings['end']) - strtotime($hours['ServiceEvent']['start']))/3600 ,2);
			$end_day_hours = round((strtotime($hours['ServiceEvent']['end']) - strtotime($end_date.' '.$service_timings['start']))/3600,2);
			if($start_date == $search_range['start_date'])
				$hours_array[$user_id] = !empty($hours_array[$user_id])?($hours_array[$user_id]+$start_day_hours):($start_day_hours + $dealer_breaks[0]['break_time']);
			else
			{
				$hours_array[$user_id] = !empty($hours_array[$user_id])?($hours_array[$user_id]+$end_day_hours):($end_day_hours + $dealer_breaks[0]['break_time']);
			}
		}else
		{
			$day_hours = round((strtotime($hours['ServiceEvent']['end']) - strtotime($hours['ServiceEvent']['start']))/3600 ,2);
			$hours_array[$user_id] = !empty($hours_array[$user_id])?($hours_array[$user_id]+$day_hours):($day_hours + $dealer_breaks[0]['break_time']);
		}
		
		
	}
	//tech event
	$this->loadModel('TechEvent');
	$tech_booked_hours=$this->TechEvent->find('all',array('fields'=>'SUM(time_to_sec(timediff(TechEvent.end, TechEvent.start )) / 3600) as booked_hours,DATE(TechEvent.start) as stat_date,TechEvent.user_id','conditions'=>$conditions1,'order'=>'TechEvent.user_id asc','group'=>'TechEvent.user_id'));
	
	$tech_hours_array=array();
	//pr($booked_hours);
	foreach($tech_booked_hours as $hours)
	{
		$tech_hours_array[$hours['TechEvent']['user_id']] = $hours[0]['booked_hours'];
	}
	
	//pr($hours_array);
	$this->loadModel('User');
	$date_array = $this->User->find('list',array('fields' => 'User.id,User.id','conditions' => array('User.dealer_id' => $dealer_id , 'User.group_id' => 15,'User.active' => 1),'order' => 'User.service_order asc'));
	return array($date_array,$hours_array,$tech_hours_array);

}

public function serviceapp_service_report()
{
	$this->layout='serviceapp_layout';
}

public function serviceapp_get_report_data()
{
	$this->layout = null;
	$dealer_id = $this->Auth->user('dealer_id');
	$zone = $this->Auth->User('zone');
	date_default_timezone_set($zone);
	$conditions['ServiceEvent.dealer_id'] = $dealer_id;
	$report_type = '';
	if(!empty($this->request->params['named']['report_type']))
	{
		$rptType = $this->request->params['named']['report_type'];
		if($rptType=='yesterday_missed'){
			$report_type='yesterday_missed';
		}elseif($rptType=='tomorrow_appointments'){
			$report_type='tomorrow_appointments';
		}else{
			$report_type = date('Y-m-d',strtotime($rptType));
		}		
	}
	$report_header = 'Service Apointment';
	if($report_type == 'yesterday_missed')
	{
		$condition_date = date('Y-m-d',strtotime('-1 day'));
		$date_formatted = date('m/d/Y',strtotime('-1 day'));
		$report_header = 'Service Apointment for '.$date_formatted.' (Missed)';
		$conditions['NOT']['ServiceEvent.status'] = 5 ;
		$conditions['DATE(ServiceEvent.start)'] = $condition_date;
	}elseif($report_type == 'tomorrow_appointments'){
		$date_formatted = date('m/d/Y',strtotime('+1 day'));
		$report_header = 'Service Apointment for '.$date_formatted;
		$condition_date = date('Y-m-d',strtotime('+1 day'));
		$conditions['DATE(ServiceEvent.start)'] = $condition_date;
	}else{		
		$report_header = 'Service Apointment for '.$report_type;		
		$conditions['DATE(ServiceEvent.start)'] = $report_type;
		//$conditions['DATE(ServiceEvent.end)'] = $report_type;
	}
	
	$this->ServiceEvent->bindModel(array('belongsTo' =>array(
								'ServiceLead' => array('foreignKey' => 'contact_id'),
								'ServiceStatus' => array('foreignKey' => 'service_status_id'),
								'ServiceBay' => array('foreignKey' => 'bay_id'),
								//'Tech' => array('className' => 'User','foreignKey' => 'user_id','fields' => array('first_name','last_name')),
								
								
	)));
	$this->loadModel('ServiceEventType');
	$eventTypes = $this->ServiceEventType->find('list', array('order'=>"ServiceEventType.id ASC"));
	$this->set('eventTypes',$eventTypes);
	$all_appointments = $this->ServiceEvent->find('all',array('conditions' => $conditions));
	$this->set(compact('all_appointments','report_header'));
	$this->loadModel('User');
	$service_techs = $this->User->find('list',array('fields' => 'id,full_name','conditions' => array('User.dealer_id' => $dealer_id , 'User.group_id' => 15,'User.active' => 1),'order' => 'User.service_order asc'));
	$this->set(compact('service_techs'));
}

public function serviceapp_category_job()
{
	$this->layout = null;
	$this->autoRender = false;
	$dealer_id = $this->Auth->user('dealer_id');
	if($this->request->is('post'))
	{
		$category_id = $this->request->data['category_id'];
		$vendor_id = $this->request->data['vendor_id'];
		$this->loadModel('ServiceEventType');
		$this->ServiceEvent->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
		$eventTypes = $this->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions' =>array('service_category_id' => $category_id,'service_job_category_id' => $vendor_id,'dealer_id' => $dealer_id)));
		$eventTypeTime = $this->ServiceEventType->find('list', array('fields' => 'id,est_time','order'=>"ServiceEventType.id ASC",'conditions' =>array('service_category_id' => $category_id,'service_job_category_id' => $vendor_id,'dealer_id' => $dealer_id)));
		$select_html = '';
		foreach($eventTypes as $key => $value)
		{
			$html .='<option value="'.$key.'">'.$value.'</option>';
		}
		$json_array['html'] = $html;
		$json_array['visitTime'] = $eventTypeTime;
		$json_array['visitText'] = $eventTypes;
		echo json_encode($json_array);
	}
	die;
}

 public function serviceapp_set_service_tech($tech_id = NULL)
	 {
		 $this->layout = null;
		 $this->autoRender = false;
		 $this->Session->write('service_tech_id',$tech_id);
		 die;
	 }
	
 public function serviceapp_search_contact_result()
 {
	$this->layout = null;
	$this->autoRender = false;
	$this->loadModel('Contact');
	$dealer_id = $this->Auth->user('dealer_id');
	$conditions['Contact.company_id'] = $dealer_id;
	if(!empty($this->request->query)){
		$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['phone']));
		$email = trim($this->request->query['email']);
		$first_name = trim($this->request->query['first_name']);
		$last_name = trim($this->request->query['last_name']);
		if( $this->request->query['vin'] != ''){
			$conditions['Contact.vin'] = $this->request->query['vin'];
		}
		if( $this->request->query['stock_num'] != ''){
			$conditions['Contact.stock_num'] = $this->request->query['stock_num'];
		}
		if($this->request->query['search_type'] == 'broad'){
			if( $email != ''){
			$conditions['Contact.email like'] = '%' . $email . '%';
			}
			if( $phone != ''){
				$conditions['OR']['Contact.mobile like'] = '%' . $phone . '%';
				$conditions['OR']['Contact.phone like'] = '%' . $phone . '%';
				$conditions['OR']['Contact.work_number like'] = '%' . $phone . '%';
			} 
			if( $first_name != ''){
				$conditions['OR']['Contact.first_name like'] = '%' . $first_name  . '%';
				$conditions['OR']['Contact.spouse_first_name like'] = '%' . $first_name  . '%';
				$conditions['OR']['Contact.company_work like'] = '%' . $first_name  . '%';
			} 
			if( $last_name != ''){
				$conditions['Contact.last_name like'] = '%' . $last_name  . '%';
			} 
		}elseif($this->request->query['search_type'] == 'exact'){
			
				if( $email != ''){
					$conditions['Contact.email'] = $email;
				}
				if( $phone != ''){
					//$conditions['Contact.phone'] = $phone;
					$conditions['OR']['Contact.mobile LIKE'] = $phone."%";
					$conditions['OR']['Contact.phone LIKE'] = $phone."%";
					$conditions['OR']['Contact.work_number LIKE'] = $phone."%";
					
				} 
				if( $first_name != ''){
					$conditions['OR']['Contact.first_name LIKE'] = $first_name."%";
					$conditions['OR']['Contact.spouse_first_name like'] = '%' . $first_name  . '%';
					$conditions['OR']['Contact.company_work like'] = '%' . $first_name  . '%';
				} 
				if( $last_name != ''){
					$conditions['Contact.last_name LIKE'] = $last_name."%";
				} 			
			}		
		}
		$conditions['Contact.modified >='] = date("Y-m-d 00:00:00", strtotime('-120 day'));
		$contacts_count = $this->Contact->find('count', array('recursive'=>0,'conditions' => $conditions));
		$result = array();
		$result['result'] = $contacts_count;
		$fields = array(
				'Contact.id',
				'Contact.first_name',
				'Contact.last_name',
				'ContactStatus.name',
				'Contact.type',
				'Contact.condition',
				'Contact.year',
				'Contact.make',
				'Contact.model',
				'Contact.stock_num',
				'Contact.modified_full_date',
				'Contact.modified',
				'Contact.mobile',
				'Contact.phone',
				'Contact.work_number',
				'Contact.address',
				'Contact.city',
				'Contact.state',
				'Contact.zip',
				'Contact.email',
				'Contact.sperson',
				'Contact.owner',
				'Contact.company',
				'Contact.company_id',
				'Contact.lead_status',
				'Contact.status',
				'Contact.sales_step',
				'Contact.source',
				'Contact.chk_duplicate',
			);
			$all_contacts = $this->Contact->find('all', array('recursive'=>-1,'conditions' => $conditions,'order' =>'Contact.modified DESC'));	
			$contacts_clean = array();
			foreach($all_contacts as $contacts_shoppe){
				$contacts_shoppe['Contact']['modified'] = date('m/d/Y g:i A', strtotime($contacts_shoppe['Contact']['modified']));
				$contacts_shoppe['Contact']['mobile'] = $this->format_phone($contacts_shoppe['Contact']['mobile']);
				$contacts_shoppe['Contact']['phone'] = $this->format_phone($contacts_shoppe['Contact']['phone']);
				$contacts_shoppe['Contact']['work_number'] = $this->format_phone($contacts_shoppe['Contact']['work_number']);
				$contacts_clean[] = $contacts_shoppe;
			}
		$result['shoppers'] = $contacts_clean;	
		$result['lightspeed_search'] = array();
			
		if($this->get_dealer_settings("lightspeed_search") == 'On'){
			
			$lightspeed_conditions = array();
			if( $last_name != ''){
			$lightspeed_conditions['AdpCustomer.last_name LIKE ']= '%'.$last_name.'%';
			}
			if( $first_name != ''){
			$lightspeed_conditions['AdpCustomer.first_name LIKE ']= '%'.$first_name.'%';
			}
			if( $email != '')
			$lightspeed_conditions['AdpCustomer.email']=$email;
			if( $phone != '' && $phone != '0000000000'){
				$lightspeed_conditions['OR']['AdpCustomer.mobile'] = $phone;
				$lightspeed_conditions['OR']['AdpCustomer.home_phone'] = $phone;
				$lightspeed_conditions['OR']['AdpCustomer.work_phone'] = $phone;
			}
			if(!empty($lightspeed_conditions))				
			$result['lightspeed_search'] = $this->_lightspeed_search_result($lightspeed_conditions);
			
		}
		
		echo json_encode($result);
		$this->autoRender = false;
					 
 	}
	
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
	
	public function serviceapp_delete_service_appointment($event_id = null)
	{
		$this->layout = null;
		$this->autoRender = false;
		$this->loadModel('ServiceEvent');
		$old_data = $this->ServiceEvent->find('first', array('recursive' =>0, 'conditions'=>array('ServiceEvent.id' => $event_id)));
		if(!empty($old_data)){
			$logged_name = $this->Auth->user('full_name');
			$history_data = array();
			$history_data['contact_id'] = 			$old_data['ServiceEvent']['contact_id'];
			$history_data['event_id'] = 			$old_data['ServiceEvent']['id'];
			$history_data['customer_name'] = 		$old_data['ServiceEvent']['first_name']." ".$old_data['ServiceEvent']['last_name'];
			$history_data['make'] = 			$old_data['ServiceEvent']['title'];
			$history_data['model'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['start']));
			$history_data['status'] = 				$old_data['ServiceStatus']['name'];
			$history_data['comment'] = 				'Service Appontment deleted';
			$history_data['notes'] = 				'Appointment deleted by '.$logged_name;
			$history_data['modified'] = 			date('D - M d, Y g:i A',strtotime($old_data['ServiceEvent']['modified']));
			$history_data['start_date'] = 			$this->request->data['ServiceEvent']['start'];
			$history_data['end_date'] = 			$this->request->data['ServiceEvent']['end'];
			$history_data['h_type'] = 				"Service Appointment Deleted";
			$history_data['sales_step'] = 				"Service Appointment";
			$history_data['sperson'] 	=	$logged_name;
		
			$history = array(
				'ServiceHistory' => $history_data
			);
			$this->ServiceHistory->save($history);
			$this->ServiceEvent->id = $event_id;
			$this->ServiceEvent->delete();
		}
		die;
	}
	
	public function serviceapp_day_view($view_date= '',$user_id= null)
	{
		$this->layout = null;
		$this->_day_view_data($view_date,$user_id);
	}
	
	public function serviceapp_appointment_view($view_date= '',$user_id= null){
		$this->autoRender = false;
		$this->_day_view_data($view_date,$user_id= null);
		echo $this->render('/Elements/appointment_tree_view');
		die;
			
	}
	
	private function _get_slot($range,$time){
		$time = date('H:i:s',strtotime($time));
		$timestamp = strtotime($time);
		
		$time_slot = $range[0];
		if($timestamp >= end($range))
		{
			return end($range);
		}else{
			for($i = 0; $i<count($range)-1;$i++){
				if($timestamp >= $range[$i] && $timestamp < $range[($i+1)]){
				$time_slot = $range[$i];
				break;
				}
			}
			return $time_slot;
		}
		
	
	}
	
	private function _day_view_data($view_date ='',$user_id = null)
	{
		if(empty($view_date)){
		$view_date = date('Y-m-d');
		}else{
			$view_date = date('Y-m-d',strtotime($view_date));
		}
		
		$current_user_id = $this->Auth->User('id');
		$dealer_id = $this->Auth->User('dealer_id');  
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
		if(empty($service_timings))
		{
			$service_timings['ServiceSetting']['start']='07:00:00';
			$service_timings['ServiceSetting']['end']='19:00:00';
			$service_timings['ServiceSetting']['time_slots'] = '60';
		}
		$start_time = strtotime($service_timings['ServiceSetting']['start']); 
		$end_time = strtotime($service_timings['ServiceSetting']['end']); 
		$slot_duration = $service_timings['ServiceSetting']['time_slots'];
		$time_slot_array = $this->_get_time_slots($start_time,$end_time,$slot_duration);
		$nice_time_array = array();
		
		$conditions = array('ServiceEvent.dealer_id' => $dealer_id,'DATE(ServiceEvent.start)'=> $view_date);
		if(!empty($user_id))
		{
			$conditions['ServiceEvent.user_id'] = $user_id;
		}
		$events = $this->ServiceEvent->find('all', array('conditions' => $conditions,'order' => 'ServiceEvent.start asc'));
		$slot_event_array = array();
		$total_events = count($events);
		foreach($events as $event){
			$time_slot = $this->_get_slot($time_slot_array,$event['ServiceEvent']['start']);
			$slot_event_array[$time_slot][] = $event;
		}
		
		$this->loadModel('User');
		$tech_users= $this->User->find('list',array('fields' => 'id,full_name','conditions' => array('dealer_id' => $dealer_id,'group_id' => array(14,15,16))));
		$this->set(compact('slot_event_array','time_slot_array','view_date','tech_users','total_events','user_id'));
	}
	
	private function _get_time_slots($start_time,$end_time,$slot_duration = 60)
	{
		$time_slot_array = array();
		while($start_time<=$end_time)
		{
			$time_slot_array[] = $start_time;
			$start_time = strtotime('+'.$slot_duration.' minutes',$start_time);
		}
		return  $time_slot_array;
	}
	
	private function _getDealerBreaks($date_range_array = array())
	{
		
		$dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('DealerBreak');
		$dealer_breaks= $this->DealerBreak->find('all',array('conditions' =>array('dealer_id' => $dealer_id)));
		$this->loadModel('User');
		$user_conditions = array('User.dealer_id' => $dealer_id , 'User.group_id' => 15, 'User.active' => 1);
		if($this->Session->check('service_tech_id') && count($date_range_array)>3)
		{
			$user_conditions['User.id'] = $this->Session->read('service_tech_id'); 
			
		}
		$service_techs = $this->User->find('all',array('fields' => array('User.id','User.full_name'),'conditions' => $user_conditions ,'order' => 'User.service_order asc'));
		
		$break_time = array();                                
		foreach($date_range_array as $data_time){
			foreach($service_techs as $tech){
				foreach($dealer_breaks as $t_event){
					
					$allday = false;					
					$t_event['DealerBreak']['start'] = date("Y-m-d\TH:i:s",strtotime($data_time.' '.$t_event['DealerBreak']['start']));
					$end1 = date('n/j/Y g:i A',strtotime($t_event['DealerBreak']['end']));
				  
					$t_event['DealerBreak']['end'] = date("Y-m-d\TH:i:s",strtotime($data_time.' '.$t_event['DealerBreak']['end']));
					
					$start1 = date('n/j/Y g:i A',strtotime($t_event['DealerBreak']['start']));
					$end1 = date('n/j/Y g:i A',strtotime($t_event['DealerBreak']['end']));
					$overdue_color = "#D32F2F";
					
							
					$break_time[] = array(
						'id' => 'break_'.$t_event['DealerBreak']['id'],
						'user_id' => $tech['User']['id'],
						'resources' =>$tech['User']['id'],
						'title' => $t_event['DealerBreak']['break_type'],
						'start' => $t_event['DealerBreak']['start'],
						'end' => $t_event['DealerBreak']['end'],
						'allDay' => $allday,
						'color' => $overdue_color,
						'month_view' => 'no',
						'event_type'=>'dealer_break',
					   // 'url' => Router::url('/') . 'full_calendar/events/view/' . $event['ServiceEvent']['id'],
						'details' =>$t_event['DealerBreak']['break_type'],
						//'className' => $event['EventType']['color'],
						'toolTip' => '<strong>Description: </strong>' . $t_event['DealerBreak']['break_type'] . '<br /><strong>Start: </strong>' . $start1 . '<br /><strong>End: </strong>' . $end1
					   );
			
		
				}
			
			}
		}
		
		
		return $break_time ;
	}
	
	private function _lightspeed_search_result($conditions = array())
	{
		
		$this->loadModel('AdpCustomer');
		$dealer_id = $this->Auth->user('dealer_id');
		$conditions['AdpCustomer.dealer_id'] = $dealer_id;
		$conditions['AdpCustomer.modified >='] = date("Y-m-d 00:00:00", strtotime('-90 day'));
		$fields = array('AdpCustomer.id','AdpCustomer.dealer_id','AdpCustomer.first_name','AdpCustomer.last_name','AdpCustomer.mobile','AdpCustomer.home_phone','AdpCustomer.work_phone','AdpCustomer.modified','AdpCustomer.email','AdpCustomer.parts_deptt','AdpCustomer.service_deptt','AdpCustomer.sales_deptt');
		$lightspeed_result = $this->AdpCustomer->find('all',array('fields' => $fields,'conditions' => $conditions));
		$contacts_clean = array();
		foreach($lightspeed_result as $contacts_shoppe){
			$lead_source = array();
			$contacts_shoppe['AdpCustomer']['modified'] = date('m/d/Y g:i A', strtotime($contacts_shoppe['AdpCustomer']['modified']));
			$contacts_shoppe['AdpCustomer']['mobile'] = $this->format_phone($contacts_shoppe['AdpCustomer']['mobile']);
			$contacts_shoppe['AdpCustomer']['phone'] = $this->format_phone($contacts_shoppe['AdpCustomer']['home_phone']);
			$contacts_shoppe['AdpCustomer']['work_number'] = $this->format_phone($contacts_shoppe['AdpCustomer']['work_phone']);
			if($contacts_shoppe['AdpCustomer']['service_deptt'])
			{
				$lead_source[] = 'Service Dept';
			}
			if($contacts_shoppe['AdpCustomer']['parts_deptt'])
			{
				$lead_source[] = 'Parts Dept';
			}
			if($contacts_shoppe['AdpCustomer']['sales_deptt'])
			{
				$lead_source[] = 'Sales Dept';
			}
			$contacts_shoppe['AdpCustomer']['lead_source'] = implode(',',$lead_source);
			$contacts_clean[] = $contacts_shoppe;
		}
		return $contacts_clean;
		
	}
	
	/*
	* Method Name :- serviceapp_delete_break
	* PURPOSE :- Delete the break 
	* parmater :- break id
	*/
	
	public function serviceapp_delete_break($break_id = NULL)
	{
		if(!empty($break_id))
		{
			$this->loadModel('TechEvent');
			$this->TechEvent->delete($break_id);
		}
		die;
	}

}