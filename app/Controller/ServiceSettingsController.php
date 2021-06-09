<?php
class ServiceSettingsController extends AppController {
	public $uses = array('ServiceEventType','ServiceEventStatus','ServiceStatus', 'ServiceWarrantyType','ServiceBay','ServiceJobCategory','ServiceCategory','DealerBreak');
	// public $components = array('RequestHandler','Utility');
	//public $components = array('Csv');
	
	
	public function beforeFilter() {
		//Configure::write('debug',2);
		parent::beforeFilter();
    }
    	
	public function serviceapp_index(){
		
		$this->layout='serviceapp_layout'; 
        //$group_id = $this->Auth->user('group_id');
		
		$dealer_id = $this->Auth->user('dealer_id');
		$service_categories = $this->ServiceJobCategory->find('list',array('conditions'=>array('ServiceJobCategory.dealer_id'=>array(0,$dealer_id))));
		$service_sub_categories = $this->ServiceCategory->find('list',array('conditions'=>array('ServiceCategory.dealer_id'=>array(0,$dealer_id))));
		$all_service_categories = $this->ServiceJobCategory->find('all',array('fields' => array('*'),'conditions'=>array('ServiceJobCategory.dealer_id'=>array(0,$dealer_id))));
		$this->set(compact('service_categories'));
		$this->ServiceEventType->bindModel(array('belongsTo' => array('ServiceJobCategory')));
		$service_events=$this->ServiceEventType->find('all',array('order'=>'ServiceEventType.name','conditions'=>array('ServiceEventType.dealer_id'=>array(0,$dealer_id))));
		$service_event_status = $this->ServiceEventStatus->find('all',array('order'=>'ServiceEventStatus.name','conditions'=>array('ServiceEventStatus.dealer_id'=>array(0,$dealer_id))));
		$service_statuses=$this->ServiceStatus->find('all',array('order'=>'ServiceStatus.name ASC','conditions'=>array('ServiceStatus.dealer_id'=>array(0,$dealer_id))));
		$service_warranty_types=$this->ServiceWarrantyType->find('all',array('order'=>'ServiceWarrantyType.name ASC','conditions'=>array('ServiceWarrantyType.dealer_id'=>array(0,$dealer_id))));
		$service_bays=$this->ServiceBay->find('all',array('order'=>'ServiceBay.name ASC','conditions'=>array('ServiceBay.dealer_id'=>array(0,$dealer_id))));
		$this->loadModel('ServiceSetting');
		$service_timings=$this->ServiceSetting->findByDealerId($dealer_id);
		$timing_exist=false;
		if(!empty($service_timings))
		{
			$timing_exist=true;
			$this->request->data=$service_timings;
			$this->request->data['ServiceSetting']['start'] = date('h:i A', strtotime($service_timings['ServiceSetting']['start']));
			$this->request->data['ServiceSetting']['end'] = date('h:i A', strtotime($service_timings['ServiceSetting']['end']));
			
		}
		$dealer_breaks = $this->DealerBreak->find('all',array('conditions' => array('dealer_id' => $dealer_id)));
		
		$this->set(compact('service_events','service_event_status','service_statuses','service_warranty_types','service_bays','timing_exist','all_service_categories','service_timings','service_sub_categories','dealer_breaks'));
		
	
	}

	public function serviceapp_add_option()
	{
		$this->layout=null;
		$this->autoRender=false;
	
		if ($this->request->is('post')) {
			$model_array=array('ServiceEventType'=>'Visit Type','ServiceEventStatus'=>'Appointment Status','ServiceStatus'=>'Service Status', 'ServiceWarrantyType'=>'Warrant Type','ServiceBay'=>'Service Bay','ServiceJobCategory' => 'Service Category');
			$model=$this->request->data['Model']['name'];
			if($model == 'ServiceEventType')
			{
				$this->request->data[$model]['est_time'] = $this->request->data[$model]['est_time']*60;
				if(!empty($this->request->data[$model]['est_minutes']))
				{
					$this->request->data[$model]['est_time'] += $this->request->data[$model]['est_minutes'];
				}
			}
			$this->$model->create();
			if ($this->$model->save($this->request->data)) {
				$this->Session->setFlash(__($model_array[$model].' Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save '.$model_array[$model]), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function serviceapp_delete_option($id = null,$model='') {
		
		$this->request->onlyAllow('post', 'delete');
		$this->$model->id=$id;
		$model_array=array('ServiceEventType'=>'Visit Type','ServiceEventStatus'=>'Appointment Status','ServiceStatus'=>'Service Status', 'ServiceWarrantyType'=>'Warrant Type','ServiceBay'=>'Service Bay');
		if ($this->$model->delete()) {
			
			$this->Session->setFlash(__($model_array[$model].' deleted successfully'),'alert',
					array(
						
						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__($model_array[$model].' could not be deleted try again'),'alert',
					array(
						
						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index','serviceapp' => true));
	}
	
	public function serviceapp_edit_option($id = null) {
		
		$this->layout=null;
		$this->autoRender=false;
		$model_array=array('ServiceEventType'=>'Visit Type','ServiceEventStatus'=>'Appointment Status','ServiceStatus'=>'Service Status', 'ServiceWarrantyType'=>'Warrant Type','ServiceBay'=>'Service Bay','ServiceJobCategory' => 'Service Category');
		if($this->request->is('post')|| $this->request->is('put'))
		{
			$model=$this->request->data['Model']['name'];
			if($model == 'ServiceEventType')
			{
				$this->request->data['Option']['est_time'] = $this->request->data['Option']['est_time']*60;
				if(!empty($this->request->data['Option']['est_minutes']))
				{
					$this->request->data['Option']['est_time'] += $this->request->data['Option']['est_minutes'];
				}
			}
			$data[$model]=$this->request->data['Option'];
			
			if ($this->$model->save($data)) {
				$this->Session->setFlash(__($model_array[$model].' updated successfully'),'alert',
						array(
							
							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__($model_array[$model].' could not be updated try again'),'alert',
						array(
							
							'class' => 'alert-error'
						));
			}
			$this->redirect(array('action' => 'index','serviceapp' => true));
		}
		
	}
	
	public function serviceapp_timings()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('ServiceSetting');
		if($this->request->is('post'))
		{
			$this->request->data['ServiceSetting']['start']=date('H:i:s',strtotime($this->request->data['ServiceSetting']['start']));
			$this->request->data['ServiceSetting']['end']=date('H:i:s',strtotime($this->request->data['ServiceSetting']['end']));
			if($this->ServiceSetting->save($this->request->data))
			{
				$this->Session->setFlash(__('Service timings updated successfully'),'alert',
						array(
							
							'class' => 'alert-success'
						));
			}else
			{
				$this->Session->setFlash(__('Service timings could not be updated try again'),'alert',
						array(
							
							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	 public function serviceapp_del_amo_import_script()
	 {
		 
		$all_job_types = $this->ServiceStatus->find('all',array('conditions' => array('dealer_id' => 829)));
		foreach($all_job_types as $job)
		{
			unset($job['ServiceEventType']['id']);
			$job['ServiceEventType']['dealer_id'] = 830;
			$this->ServiceStatus->create();
			$this->ServiceStatus->save($job);
			$job['ServiceEventType']['dealer_id'] = 1224;
			$this->ServiceStatus->create();
			$this->ServiceStatus->save($job);
			
		}
		 
		 die;
		 /*
		 $main_array =array(
					0 =>  '1',
					9 =>  '2',
					14 => '3',
					21 => '4',
					24 => '5',
					26 => '6',
					33 => '7',
					39 => '8',
					43 => '9',
					48 => '10',
					51 => '11',
					62 => '12',
					69 => '13',
					81 => '14',
					86 => '15'				
					);
		
		
        //$group_id = $this->Auth->user('group_id');
		$content = file_get_contents(WWW_ROOT.DS.'files'.DS.'Book2.csv');
		//echo $content;
		$mydata = $this->Csv->import(WWW_ROOT.DS.'files'.DS.'Book9.csv', array('Job.name', 'Job.est_time','Job.service_job_category_id'));
		pr($mydata);
		
		$category_id = 9;
		$heading ='';
		$counter =0;
		foreach($mydata as $data){
			$name = trim($data['Job']['name']);
			$est_time = trim($data['Job']['est_time']);
			if(array_key_exists($counter,$main_array))
			{
				$heading = $main_array[$counter];
			}
			if(!empty($name) && !empty($est_time))
			{
				
				$est_time =explode('.',$est_time);
				$est_time[1] = (strlen($est_time[1])<2)?($est_time[1]*10):$est_time[1];
				$service_time = $est_time[1] + ($est_time[0]*60);
				
				$save_data['ServiceEventType'] = array('name' => $name,'est_time' => $service_time,'dealer_id' => 829,'service_job_category_id' => $category_id,'service_category_id' => $heading);
				$this->ServiceEventType->create();
				$this->ServiceEventType->save($save_data);
			}
			$counter++;
		}
		
		die;
	 */}
	 
	public function serviceapp_advanced_job($status=0)
	{
		$dealer_id=$this->Auth->user('dealer_id');
		$this->loadModel('ServiceSetting');
		$this->ServiceSetting->updateAll(array('advanced_job'=>$status),array('dealer_id'=>$dealer_id));
		die;
	}
	
	public function serviceapp_add_job_type()
	{
		$this->layout = null;
		$this->autoRender = false;
		$dealer_id =$this->Auth->user('dealer_id');
		if($this->request->is('post'))
		{
			$this->request->data['ServiceEventType']['est_time'] = $this->request->data['ServiceEventType']['est_time']*60;
			if(!empty($this->request->data['ServiceEventType']['est_minutes']))
			{
				$this->request->data['ServiceEventType']['est_time'] += $this->request->data['ServiceEventType']['est_minutes'];
			}
			$this->ServiceEventType->create();
			$this->ServiceEventType->save($this->request->data);
			$job_id = $this->ServiceEventType->id;
			$job_info = $this->ServiceEventType->findById($job_id);
			$this->ServiceEventType->virtualFields = array('combine_name' => "CONCAT(ServiceEventType.name,' (',(round(ServiceEventType.est_time/60 ,2)),' hrs)')");
			$eventTypes = $this->ServiceEventType->find('list', array('fields' => 'id,combine_name','order'=>"ServiceEventType.id ASC",'conditions'=>array('dealer_id'=>array(0,$dealer_id))));
			$eventTypeTime = $this->ServiceEventType->find('list', array('fields' => 'id,est_time','order'=>"ServiceEventType.id ASC",'conditions'=>array('dealer_id'=>array(0,$dealer_id))));
			$key = $job_info['ServiceEventType']['id'];
			$val = $job_info['ServiceEventType']['id'];
			
			$html ='<option value="'.$val.'" selected ="selected" >'.$eventTypes[$val].'</option>';
			$json_array['html'] = $html;
			$json_array['visitTime'] = $eventTypeTime;
			$json_array['visitText'] = $eventTypes;
			echo json_encode($json_array);
		}
		die;
	}
	
	public function serviceapp_service_hide_list()
	{
		$this->layout = null;
		$this->autoRender = false;
		if($this->request->is('post')){
			$model = $this->request->data['model'];
			unset($this->request->data['model']);
			$data[$model] = $this->request->data;
			$this->$model->save($data);
		}
		die;
	}
	
		
	public function serviceapp_dealer_break()
	{
		
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('DealerBreak');
		if($this->request->is('post'))
		{
			$this->request->data['DealerBreak']['start']=date('H:i:s',strtotime($this->request->data['DealerBreak']['start']));
			$this->request->data['DealerBreak']['end']=date('H:i:s',strtotime($this->request->data['DealerBreak']['end']));
			if(!isset($this->request->data['DealerBreak']['id']))
			$this->DealerBreak->create();
			if($this->DealerBreak->save($this->request->data))
			{
				$this->Session->setFlash(__('Service timings updated successfully'),'alert',
						array(
							
							'class' => 'alert-success'
						));
			}else
			{
				$this->Session->setFlash(__('Service timings could not be updated try again'),'alert',
						array(
							
							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	
	}
	public function serviceapp_delete_break($break_id =null)
	{
		$this->request->onlyAllow('post', 'delete');
		$this->DealerBreak->id=$break_id;
		if ($this->DealerBreak->delete()) {
			$this->Session->setFlash(__('Break deleted successfully'),'alert',
					array(
						
						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Break could not be deleted try again'),'alert',
					array(
						
						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}