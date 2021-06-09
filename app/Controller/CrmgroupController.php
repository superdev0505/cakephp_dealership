<?php
class CrmgroupController extends AppController {

	public $uses = array('Contact', 'User');
    public $components = array('RequestHandler','Paginator');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function contact_comment() {
    	$contact_id = $this->request->query['contact_id'];
    	$params = array(
    		'recursive' => -1,
    		'fields' => array('Contact.id','Contact.notes'),
            'conditions' => array('Contact.id' => $contact_id),
        );

        $contact = $this->Contact->find('first', $params);
        echo '<div style="overflow: auto;" >'.nl2br($contact['Contact']['notes'])."</div>" ;
        $this->autoRender = false;
	}


    public function get_dealer_steps($dealer_id){
		$this->loadModel('ContactStatus');
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		return  $sales_step_options_popup;
	}

	public function get_dealer_user_ids(){

		$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');
    	$other_locations_ar = explode(",", $other_locations);

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

		$dconditions = array("User.dealer_id"=>$other_locations_ar, 'User.username' => $this->Auth->User('username') );
    	$user_active = $this->User->find('list', array('fields' => array('User.id', 'dealer'),'conditions' => $dconditions ));

    	return $user_active;
    }

    public function get_dealer_ids(){

    	$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');


    	if($other_locations > '') $other_locations_ar = explode(",", $other_locations);
			else $other_locations_ar = array($this->Auth->User('dealer_id'));

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => $dconditions ));

    	return $user_active;
    }

   	public function get_settings($settings_name) {
   		$this->loadModel('CrmgroupSetting');
		$user_id = $this->Auth->user('username');
		if($settings_name == 'show_web_lead'){
			$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => 'show_web_lead', 'CrmgroupSetting.user_id'=>$user_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['CrmgroupSetting']['value'];
			}
		}

		if($settings_name == 'show_web_lead_push'){
			$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => 'show_web_lead_push', 'CrmgroupSetting.user_id'=>$user_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['CrmgroupSetting']['value'];
			}
		}

		if($settings_name == 'show_other_locations'){
			$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => 'show_other_locations', 'CrmgroupSetting.user_id'=>$user_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['CrmgroupSetting']['value'];
			}
		}

		if($settings_name == 'lead_process'){
			$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => 'lead_process', 'CrmgroupSetting.user_id'=>$user_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['CrmgroupSetting']['value'];
			}
		}


	}

	public function save_settings_user_id($settings_name) {
		$this->loadModel('CrmgroupSetting');
		$this->layout = 'ajax';
		$user_id = $this->Auth->user('id');
		$this->autoRender = false;


		$group_id = $this->Auth->User('group_id');




		$value =  ($this->request->data['value'] == 'false')? "Off" : "On";
		$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => $settings_name, 'CrmgroupSetting.user_id'=>$user_id)));
		if(empty($settings)){
			$this->CrmgroupSetting->create();
			$this->CrmgroupSetting->save(array('CrmgroupSetting'=>array(
				'settings_name'=>$settings_name,
				'value'=>$value,
				'user_id'=>$user_id
			)));
		}else{
			$this->CrmgroupSetting->id = $settings['CrmgroupSetting']['id'];
			$this->CrmgroupSetting->saveField($settings_name, $value);

			$this->CrmgroupSetting->updateAll(array(
				'settings_name'=>"'".$settings_name."'",
				'value'=>"'$value'",
				'user_id'=>"'".$user_id."'"
			), array('CrmgroupSetting.id'=> $settings['CrmgroupSetting']['id']) );
		}
		echo json_encode(array('status'=>'success','message'=>'Plese refresh to see chnages'));

	}

	public function save_settings($settings_name) {
		$this->loadModel('CrmgroupSetting');
		$this->layout = 'ajax';
		$user_id = $this->Auth->user('username');
		$this->autoRender = false;


		$group_id = $this->Auth->User('group_id');

		//debug($group_id);


		if($group_id != '2' && $group_id != '12' && $settings_name == 'lead_process'){
			$pwd = (isset($this->request->data['master_pwd']))? $this->request->data['master_pwd'] : "" ;
			if($pwd != '4756ty3663!'){
				echo json_encode(array('status'=>'failed','message'=>'Invalid master password'));
				return;
			}

		}

		$value =  ($this->request->data['value'] == 'false')? "Off" : "On";
		$settings = $this->CrmgroupSetting->find('first', array('conditions'=>array('CrmgroupSetting.settings_name' => $settings_name, 'CrmgroupSetting.user_id'=>$user_id)));
		if(empty($settings)){
			$this->CrmgroupSetting->create();
			$this->CrmgroupSetting->save(array('CrmgroupSetting'=>array(
				'settings_name'=>$settings_name,
				'value'=>$value,
				'user_id'=>$user_id
			)));
		}else{
			$this->CrmgroupSetting->id = $settings['CrmgroupSetting']['id'];
			$this->CrmgroupSetting->saveField($settings_name, $value);

			$this->CrmgroupSetting->updateAll(array(
				'settings_name'=>"'".$settings_name."'",
				'value'=>"'$value'",
				'user_id'=>"'".$user_id."'"
			), array('CrmgroupSetting.id'=> $settings['CrmgroupSetting']['id']) );
		}
		echo json_encode(array('status'=>'success','message'=>'Plese refresh to see chnages'));

	}

	public function crmgroup_search_result($result_type = null){

		$date_from =   date("Y-m-d 00:00:00", strtotime('-90 days') );
		$part_leads = array();
		$service_leads = array();
		$part_lead_count =0;
		$service_lead_count =0;
    	$this->layout = 'ajax';
    	$dealer_id = $this->request->query['dealer_id'];
		//if($dealer_id == ''){
			$dids = $this->get_dealer_ids();
			foreach ($dids as $key => $value) {
				$dealer_id[] = $key;
				$dealer_id[] = 'invalid-'.$key;
			}

		//}

		//debug($dealer_id);

		// $conditions = array('Contact.created = Contact.modified');
		// $conditions['Contact.xml_weblead'] = '1';
		$conditions['Contact.modified >='] = $date_from;

		//$conditions['Contact.contact_status_id'] = '5';
		$conditions['Contact.status <>'] = 'Duplicate-Closed';
		$conditions['Contact.company_id'] = $dealer_id;

		$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['search_phone']));
		$email = trim($this->request->query['search_email']);
		$first_name = trim($this->request->query['search_first_name']);
		$last_name = trim($this->request->query['search_last_name']);

		$dosearch  = false;
		if($phone != ''){
			$conditionsz_src['OR']['Contact.mobile LIKE'] = $phone."%";
			$conditionsz_src['OR']['Contact.phone LIKE'] = $phone."%";
			$conditionsz_src['OR']['Contact.work_number LIKE'] = $phone."%";
			$dosearch  = true;
		}
		if( $first_name != ''){
			$conditionsz_src['OR']['Contact.first_name LIKE'] = $first_name."%";
			$conditionsz_src['OR']['Contact.spouse_first_name like'] = '%' . $first_name  . '%';
			$conditionsz_src['OR']['Contact.company_work like'] = '%' . $first_name  . '%';
			$dosearch  = true;
		}
		if( $last_name != ''){
			$conditionsz_src['Contact.last_name LIKE'] = $last_name."%";
			$dosearch  = true;
		}
		if( $email != ''){
			$conditionsz_src['Contact.email like'] = '%' . $email . '%';
			$dosearch  = true;
		}
		$conditions [] = $conditionsz_src;

		$contacts = array();

		if($result_type == ''){

			if($dosearch == true){

				//debug($conditions);
				$fields = array(
					'Contact.id',
					'Contact.first_name',
					'Contact.last_name',
					'ContactStatus.name',
					'Contact.type',
					'Contact.company_id',
					'Contact.condition',
					'Contact.company',
					'Contact.year',
					'Contact.class',
					'Contact.make',
					'Contact.model',
					'Contact.modified_full_date',
					'Contact.modified',
					'Contact.created',
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
					'Contact.notes',
					'Contact.lead_status',
					'Contact.status',
					'Contact.sales_step',
					'Contact.source',
					'Contact.chk_duplicate',
					'Contact.web_selection',
					'DealerName.name',
					'Contact.dealer_transfer_from'
				);


				$this->Contact->unbindModel(array(
					'hasMany'=>array('Deal'),
				));


				if($this->request->query['search_bdc_lead'] == '1'){


					$this->Contact->bindModel(array(

						'hasMany' => array('BdcSurvey'=>
							array(
								'foreignKey' => 'bdc_lead_id',
								'order' => 'BdcSurvey.id DESC',
								'fields'=>array('BdcSurvey.id','BdcSurvey.status')
							))

						), false);

					$conditions['BdcSurveycnd.bdc_lead_id <>'] = null;

					$this->Paginator->settings['Contact'] = array(
						'conditions' => $conditions,
						'fields'=>$fields,
						'joins' => array(
					        array(
					            'alias' => 'BdcSurveycnd',
					            'table' => 'bdc_surveys',
					            'type' => 'LEFT',
					            'conditions' => '`Contact`.`id` = `BdcSurveycnd`.`bdc_lead_id`'
					        ),							
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
					    ),
						'group' => array('Contact.id'),
						'order'=>'Contact.modified DESC',
						'limit' => 50,
					);
					$service_leads = $this->_service_lead_search();
					$part_leads  = $this->_part_lead_search();
		    	}else{

					if(isset($this->request->query['leadsearch_colorcode'])){
						$color_code = $this->request->query['leadsearch_colorcode'];
						if($color_code == 'yellow'){
							$conditions[] = ['Contact.owner <> Contact.sperson'];
							$conditions[] = ['Contact.created = Contact.modified'];
						}
						if($color_code == 'red'){
							$conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
							$conditions[] = ['Contact.created = Contact.modified'];
						}
						if($color_code == 'green'){
							$conditions[] = ['Contact.created <> Contact.modified'];
						}
					}

					// debug($conditions);


					/*$this->Contact->bindModel(array('belongsTo'=>array('DealerName'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.dealer_transfer_from = DealerName.dealer_id')
					))), false);*/

			    $this->Paginator->settings['Contact']  = array(
						'conditions' => $conditions,
						'fields'=>$fields,
						'order'=>'Contact.modified DESC',
						'limit' => 50,
						'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
					);
		    	}


				$contacts = $this->Paginator->paginate('Contact');

				//debug($contacts);

			}
			$this->set('contacts', $contacts);
			$this->set('service_leads',$service_leads);
			$this->set('part_leads',$part_leads);
		}else{
			$this->autoRender = false;
			if($dosearch == true){

				if($this->request->query['search_bdc_lead'] == 1){
					$conditions['BdcSurvey.bdc_lead_id <>'] = null;
					$lead_count = $this->Contact->find('count', array(

						'joins' => array(
					        array(
					            'alias' => 'BdcSurvey',
					            'table' => 'bdc_surveys',
					            'type' => 'LEFT',
					            'conditions' => '`Contact`.`id` = `BdcSurvey`.`bdc_lead_id`'
					        )
					    ),
					    'group' => array('Contact.id'),
						'conditions'=>$conditions));
					$service_lead_count =$this->_service_lead_search(true);
					$part_lead_count = $this->_part_lead_search(true);
					$lead_count += $service_lead_count + $part_lead_count;
				}else{
					$lead_count = $this->Contact->find('count', array('conditions'=>$conditions));
				}
				//debug($conditions);

				echo '<span class="label label-info label-inverse" id="new_search_cnt" style="margin-top: 9px; font-size: 13px; display: inline;">'.$lead_count.' - Lead Found</span>';
			}else{
				echo "";
			}


		}

		//debug($contacts);
		$custom_step_map = $this->get_dealer_steps($dealer_id);
		$this->set('custom_step_map', $custom_step_map);

	}

	public function overdue_events() {

		$dealer_ids = array();
		$dids = $this->get_dealer_ids();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}

		$user_ids = array();
		$userids = $this->get_dealer_user_ids();
		foreach ($userids as $key => $value) {
			$user_ids[] = $key;
		}
		// debug( $dealer_ids );
		// debug( $user_ids );

		$user_info = $this->Auth->User();
		date_default_timezone_set( $user_info['zone'] );
		//debug($user_info);

		$overdue_conditions = array(
			'Contact.user_id' => $user_ids,
	        'Contact.company_id' => $dealer_ids,
	        'Contact.status <>' => 'Duplicate-Closed',
	        'Event.start <=' =>  date('Y-m-d H:i:s'),
	        'Event.status <>' => array('Completed','Canceled'),
		);

		if(  isset($this->request->query['internet_staff']) && $this->request->query['internet_staff'] != '' ){
			unset($overdue_conditions['Contact.user_id']);
			$overdue_conditions['User.username'] = $this->request->query['internet_staff'];
		}


		if(isset($this->request->query['selected_color'])){
			$color_code = $this->request->query['selected_color'];
			if($color_code == 'yellow'){
				$overdue_conditions[] = ['Contact.owner <> Contact.sperson'];
				$overdue_conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$overdue_conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$overdue_conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$overdue_conditions[] = ['Contact.created <> Contact.modified'];
			}
		}

		// debug($overdue_conditions);

		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.condition',
			'Contact.company',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Event.start',
			'Event.id',
			'Contact.dealer_transfer_from'

		);

    	$this->paginate = array(
			'conditions' => $overdue_conditions,
			'fields'=>$fields,
			'order'=>'Event.start ASC',
			'limit' => 50,
			'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
		);

		$this->Contact->bindModel(array(
			'hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))
			), false);

		$contacts = $this->Paginate();
		$this->set('contacts', $contacts);

		//debug($contacts);


		$group_id = $this->Auth->User('group_id');
		$internet_stuffs = array();
		if($group_id == '12'){
			$dids_stuff = $this->get_dealer_ids();
			$dealer_id_stuff = array();
			foreach ($dids_stuff as $key => $value) {
				$dealer_id_stuff[] = $key;
			}
			$stuffs = $this->User->find('all', array('order'=>"User.first_name",
				'fields'=>array('User.username','User.first_name','User.last_name','User.dealer_id'),
				'conditions'=>array("User.active"=>'1', "User.dealer_id"=>$dealer_id_stuff,'User.group_id'=>array('10','11'))));
			foreach ($stuffs as $stuff) {
				$internet_stuffs[ $stuff['User']['username'] ] = $stuff['User']['first_name']." ".$stuff['User']['last_name'];
			}
			//debug($internet_stuffs);
		}
		$this->set('internet_stuffs', $internet_stuffs);

	}

	public function today_events() {

		$dealer_ids = array();
		$dids = $this->get_dealer_ids();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}

		$user_ids = array();
		$userids = $this->get_dealer_user_ids();
		foreach ($userids as $key => $value) {
			$user_ids[] = $key;
		}
		// debug( $dealer_ids );
		// debug( $user_ids );

		$user_info = $this->Auth->User();
		date_default_timezone_set( $user_info['zone'] );
		//debug($user_info);

		$overdue_conditions = array(
			'Contact.user_id' => $user_ids,
	        'Contact.company_id' => $dealer_ids,
	        'Contact.status <>' => 'Duplicate-Closed',
	        'Event.start >=' =>  date('Y-m-d')." 00:00:00",
	        'Event.start <=' =>  date('Y-m-d')."  23:59:59",
	        'Event.status <>' => array('Completed','Canceled'),
		);

		if(  isset($this->request->query['internet_staff']) && $this->request->query['internet_staff'] != '' ){
			unset($overdue_conditions['Contact.user_id']);
			$overdue_conditions['User.username'] = $this->request->query['internet_staff'];
		}

		if(isset($this->request->query['selected_color'])){
			$color_code = $this->request->query['selected_color'];
			if($color_code == 'yellow'){
				$overdue_conditions[] = ['Contact.owner <> Contact.sperson'];
				$overdue_conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$overdue_conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$overdue_conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$overdue_conditions[] = ['Contact.created <> Contact.modified'];
			}
		}

		// debug($overdue_conditions);

		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.company',
			'Contact.condition',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Event.start',
			'Event.id',
			'Contact.dealer_transfer_from'

		);

    	$this->paginate = array(
			'conditions' => $overdue_conditions,
			'fields'=>$fields,
			'order'=>'Event.start ASC',
			'limit' => 50,
			'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
		);

		$this->Contact->bindModel(array(
			'hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))), false);

		$contacts = $this->Paginate();
		$this->set('contacts', $contacts);

		//debug($contacts);


		$group_id = $this->Auth->User('group_id');
		$internet_stuffs = array();
		if($group_id == '12'){
			$dids_stuff = $this->get_dealer_ids();
			$dealer_id_stuff = array();
			foreach ($dids_stuff as $key => $value) {
				$dealer_id_stuff[] = $key;
			}
			$stuffs = $this->User->find('all', array('order'=>"User.first_name",
				'fields'=>array('User.username','User.first_name','User.last_name','User.dealer_id'),
				'conditions'=>array("User.active"=>'1', "User.dealer_id"=>$dealer_id_stuff,'User.group_id'=>array('10','11'))));
			foreach ($stuffs as $stuff) {
				$internet_stuffs[ $stuff['User']['username'] ] = $stuff['User']['first_name']." ".$stuff['User']['last_name'];
			}
			//debug($internet_stuffs);
		}
		$this->set('internet_stuffs', $internet_stuffs);

	}

	public function _get_gm_uids($did=null){
		$gm_uids = $this->User->find('list', array('fields' => array('User.id','User.id'),'conditions' => array('User.group_id' => '6','User.dealer_id' => $did)));
		return $gm_uids;
	}

  public function web_leads() {

    	$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
        $group_id = $this->Auth->User('group_id');
    	$this->layout = 'ajax';
    	$dealer_id = $this->request->query['dealer_id'];
		if($dealer_id == ''){
			$dids = $this->get_dealer_ids();
			foreach ($dids as $key => $value) {
				$dealer_id[] = $key;
			}

		}
		//debug($dealer_id);

		$this->loadModel("CrmgroupTab");
		$crmgroupTabs = $this->CrmgroupTab->find('list', array('fields'=> array('CrmgroupTab.source', 'CrmgroupTab.source') ,'conditions' => array('CrmgroupTab.remove_source_all_weblead'=> 1,'CrmgroupTab.dealer_ids'=>implode(",", $dealer_id))));
		$exclude_sources = array_keys($crmgroupTabs);

		// Removed, clients are seeing any "Green Leads"
		//$conditions = array('Contact.created = Contact.modified');

		$conditions['Contact.xml_weblead'] = '1';
		$conditions['Contact.created >='] = $date_from;

		$conditions['Contact.contact_status_id'] = '5';
		$conditions['Contact.status <>'] = 'Duplicate-Closed';

		if(!empty($exclude_sources)){
			foreach($exclude_sources as $es){
					$conditions['NOT'][] = array("Contact.source LIKE" => "%".$es."%");
			}

		}

/* Old logic handling conditions to set to show which leads to display.
		if(  isset($this->request->query['internet_staff']) && $this->request->query['internet_staff'] != '' ){
			$conditions['Contact.company_id'] = $dealer_id;
			$conditions['User.username'] = $this->request->query['internet_staff'];

		}else{
            if($group_id==6){
				$conditions['Contact.company_id'] = $dealer_id;
			}else{
				$lead_process = $this->get_settings('lead_process');
				if($lead_process == 'On'){
					$uids = $this->User->find('list', array('fields' => array('User.id', 'dealer_id'),
		                'conditions' => array('User.username' => $this->Auth->User('username'))));
					//debug($uids);
					$cnds = array();
					foreach($uids as $key=>$value){
						//Replacing below commented out line with following two lines. This allows for Sales Managers to see all leads in their location.
						//$gm_uids = $this->User->find('list', array('fields' => array('User.id','User.id'),'conditions' => array('User.group_id' => '6','User.dealer_id' => $value)));
						//$cnds[] = array('Contact.company_id'=>$value,  'NOT' => array('Contact.user_id' => $gm_uids));
						$cnds[]['AND'] = array('Contact.company_id'=>$value,  'OR' => array('Contact.user_id' => $key, 'Contact.user_id' => null));
					}
					$conditions['OR'] = $cnds;

				}else{
					$conditions['Contact.company_id'] = $dealer_id;
				}
			}
		}
*/
		$show_locations_leads = $this->get_settings('show_other_locations');
		//debug($show_locations_leads);
		$user_groups_ary = array("internet_sales" => array(10,11),"reg_managers" => array(2,4,7,12,13,16),"general_managers" => array(6));
		$usr_grp = '';
		foreach($user_groups_ary as $key=>$value){
			if(in_array($group_id,$value)) $usr_grp = $key;
		}
		//debug($usr_grp);
		switch ($usr_grp) {
			case('internet_sales') :
				if($show_locations_leads == "On" and count($dealer_id) > 1){
					$conditions['Contact.company_id'] = $dealer_id;
					$uids = $this->User->find('list', array('fields' => array('User.id'),'conditions' => array('User.username' => $this->Auth->User('username'))));
					$conditions['Contact.user_id'] = $uids;
				}else{
					$conditions['Contact.company_id'] = $this->Auth->User('dealer_id');
					$conditions['Contact.user_id'] = $this->Auth->User('id');
				}

				//}
				//$conditions['User.username'] = ($this->request->query['internet_staff'] > '') ? $this->request->query['internet_staff'] > '' : $this->Auth->User('id');
				break;

			case('general_managers') :
				if($show_locations_leads == "On" and count($dealer_id) > 1){
					$conditions['Contact.company_id'] = $dealer_id;
				}else{
					$conditions['Contact.company_id'] = $this->Auth->User('dealer_id');
				}
				break;

			case('reg_managers') :
				$lead_process = $this->get_settings('lead_process');
				//debug($lead_process);
				$gm_uids = $this->User->find('list', array('fields' => array('User.id','User.id'),'conditions' => array('User.group_id' => '6','User.dealer_id' => $value)));
				if($lead_process == 'On'){
                    $conds = array('User.username' => $this->Auth->User('username'),'User.dealer_id' => $dealer_id);
                    //debug($conds);
					$uids = $this->User->find('list', array('fields' => array('User.id', 'dealer_id'),'conditions' => $conds));
                    //debug($uids);
					$cnds = array();
					foreach($uids as $key=>$value){
						$cnds[]['AND'] = array(
							'Contact.company_id' => $value,
							//'OR' => array('Contact.user_id' => $key, 'Contact.user_id' => null),
							//'OR' => array('Contact.user_id' => array($key,null)),

							'NOT' => array('Contact.user_id' => $this->_get_gm_uids($value))
						);
					}
					$conditions['OR'] = $cnds;
					break;
				}elseif($show_locations_leads == "On" and count($dealer_id) > 1){
					//debug("elseif fired");
					$conditions['Contact.company_id'] = $dealer_id;
					foreach($dealer_id as $did){
						$cnds['NOT'][] = array('Contact.user_id' => $this->_get_gm_uids($did));
					}
					$conditions['OR'] = $cnds;
				} else {

					$conditions['Contact.company_id'] = $this->Auth->User('dealer_id');
					$conditions['NOT'][] = array('Contact.user_id' => $this->_get_gm_uids($this->Auth->User('dealer_id')));
				}

				break;

			default:
				if($show_locations_leads == "On" and count($dealer_id) > 1){
					$conditions['Contact.company_id'] = $dealer_id;
				} else {
					$conditions['Contact.company_id'] = $this->Auth->User('dealer_id');
				}
				$conditions['Contact.user_id'] = $this->Auth->User('id');
				break;
		}

		if(isset($this->request->query['selected_color'])){
			$color_code = $this->request->query['selected_color'];
			if($color_code == 'yellow'){
				$conditions[] = ['Contact.owner <> Contact.sperson'];
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$conditions[] = ['Contact.created <> Contact.modified'];
			}
		}
		 //debug($conditions);

		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.company',
			'Contact.condition',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Contact.dealer_transfer_from'

		);

    	$this->paginate = array(
			'conditions' => $conditions,
			'fields'=>$fields,
			'order'=>'Contact.modified DESC',
			'limit' => 50,
			'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
		);

		$this->Contact->unbindModel(array('hasMany'=>array('Deal')), false);

		/*$this->Contact->bindModel(array('belongsTo'=>array('DealerName'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.dealer_transfer_from = DealerName.dealer_id')
		))), false);*/

		$contacts = $this->Paginate();
		$this->set('contacts', $contacts);

		//debug($contacts);
		//debug($dealer_id);
		$custom_step_map = $this->get_dealer_steps( $this->Auth->user("dealer_id") );
		$this->set('custom_step_map', $custom_step_map);


		$group_id = $this->Auth->User('group_id');
		$internet_stuffs = array();
		if($group_id == '12'){
			$dids_stuff = $this->get_dealer_ids();
			$dealer_id_stuff = array();
			foreach ($dids_stuff as $key => $value) {
				$dealer_id_stuff[] = $key;
			}
			$stuffs = $this->User->find('all', array('order'=>"User.first_name", 'fields'=>array('User.username','User.first_name','User.last_name','User.dealer_id'),
			 'conditions'=>array("User.active"=>'1', "User.dealer_id"=>$dealer_id_stuff,'User.group_id'=>array('10','11'))));
			foreach ($stuffs as $stuff) {
				$internet_stuffs[ $stuff['User']['username'] ] = $stuff['User']['first_name']." ".$stuff['User']['last_name'];
			}
			//debug($internet_stuffs);
		}
		$this->set('internet_stuffs', $internet_stuffs);







	}


	public function web_leads_pushed() {

		//$user_ids = $this->get_dealer_user_ids();
		//debug($user_ids);

		$this->layout = 'ajax';

    	$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
		$conditions = array('Contact.location_modified = Contact.modified');
		$conditions['Contact.staff_transfer'] = '1';
		$conditions['Contact.created >='] = $date_from;
		$conditions['Contact.status <>'] = 'Duplicate-Closed';


		if(  isset($this->request->query['internet_staff']) && $this->request->query['internet_staff'] != '' ){

			$dids = $this->get_dealer_ids();
			foreach ($dids as $key => $value) {
				$dealer_id[] = $key;
			}

			$conditions['Contact.company_id'] = $dealer_id;
			$conditions['User.username'] = $this->request->query['internet_staff'];

		}else{


			$uids = $this->User->find('list', array('fields' => array('User.id', 'dealer_id'),
	            'conditions' => array('User.username' => $this->Auth->User('username'))));
			$cnds = array();
			foreach($uids as $key=>$value){
				$cnds[] = array('Contact.company_id'=>$value, 'Contact.user_id'=>$key);
			}
			$conditions['OR'] = $cnds;
		}

		if(isset($this->request->query['selected_color'])){
			$color_code = $this->request->query['selected_color'];
			if($color_code == 'yellow'){
				$conditions[] = ['Contact.owner <> Contact.sperson'];
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$conditions[] = ['Contact.created <> Contact.modified'];
			}
		}

		// debug($conditions);

		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.condition',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Contact.dealer_transfer_from'

		);

    	$this->paginate = array(
			'conditions' => $conditions,
			'fields'=>$fields,
			'order'=>'Contact.modified DESC',
			'limit' => 50,
			'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
		);

		/*$this->Contact->bindModel(array('belongsTo'=>array('DealerName'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.company_id = DealerName.dealer_id')
		))), false);*/

		$contacts = $this->Paginate();
		$this->set('contacts', $contacts);

		//debug($contacts);
		$custom_step_map = $this->get_dealer_steps($dealer_id);
		$this->set('custom_step_map', $custom_step_map);


		//Internet Stuff
		$group_id = $this->Auth->User('group_id');
		$internet_stuffs = array();
		if($group_id == '12'){
			$dids_stuff = $this->get_dealer_ids();
			$dealer_id_stuff = array();
			foreach ($dids_stuff as $key => $value) {
				$dealer_id_stuff[] = $key;
			}
			$stuffs = $this->User->find('all', array('order'=>"User.first_name", 'fields'=>array('User.username','User.first_name','User.last_name','User.dealer_id'),
			 'conditions'=>array("User.active"=>'1',"User.dealer_id"=>$dealer_id_stuff,'User.group_id'=>array('10','11'))));
			foreach ($stuffs as $stuff) {
				$internet_stuffs[ $stuff['User']['username'] ] = $stuff['User']['first_name']." ".$stuff['User']['last_name'];
			}
			//debug($internet_stuffs);
		}
		$this->set('internet_stuffs', $internet_stuffs);




	}




    public function main(){
    	$this->layout = 'crmgroup_main';

    	$dealer_ids = $this->get_dealer_ids();
    	//debug($dealer_ids);
    	$this->set('dealer_ids',$dealer_ids);

    	$show_web_lead = $this->get_settings('show_web_lead');
    	//debug($show_web_lead);
    	$this->set('show_web_lead',$show_web_lead);

    	$show_web_lead_push = $this->get_settings('show_web_lead_push');
    	//debug($show_web_lead_push);
    	$this->set('show_web_lead_push',$show_web_lead_push);

			$show_other_locations = $this->get_settings('show_web_lead_push');
    	//debug($show_web_lead_push);
    	$this->set('show_other_locations',$show_other_locations);

    	$lead_process = $this->get_settings('lead_process');
    	//debug($lead_process);
    	$this->set('lead_process',$lead_process);

    	$group_id = $this->Auth->User('group_id');
		$this->set('group_id',$group_id);
		//debug($group_id);


		//Show web leads
		$cnt_web_lead = 0;
		if($show_web_lead == 'On'){

			$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
			$dealer_id = $this->request->query['dealer_id'];
			if($dealer_id == ''){
				$dids = $this->get_dealer_ids();
				foreach ($dids as $key => $value) {
					$dealer_id[] = $key;
				}

			}

			$conditions = array('Contact.created = Contact.modified');
			$conditions['Contact.xml_weblead'] = '1';
			$conditions['Contact.created >='] = $date_from;

			$conditions['Contact.contact_status_id'] = '5';
			$conditions['Contact.status <>'] = 'Duplicate-Closed';

                        if($group_id==6){
                            $conditions['Contact.company_id'] = $dealer_id;
                        }else{
			$lead_process = $this->get_settings('lead_process');
			if($lead_process == 'On'){
				$uids = $this->User->find('list', array('fields' => array('User.id', 'dealer_id'),
	                'conditions' => array('User.username' => $this->Auth->User('username'))));
				//debug($uids);
				$cnds = array();
				foreach($uids as $key=>$value){
					$cnds[] = array('Contact.company_id'=>$value,  'OR' => array( array('Contact.user_id' => $key),  array('Contact.user_id' => null)  ));
				}
				$conditions['OR'] = $cnds;

			}else{
				$conditions['Contact.company_id'] = $dealer_id;
			}
                      }
			$cnt_web_lead = $this->Contact->find('count', array('conditions' => $conditions));
		}
		$this->set('cnt_web_lead',$cnt_web_lead);


		//Lead Push cnt
		$lead_pushed_cnt = 0;
		if($show_web_lead_push == 'On'){

			$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
			$conditions = array('Contact.location_modified = Contact.modified');
			$conditions['Contact.staff_transfer'] = '1';
			$conditions['Contact.created >='] = $date_from;
			$conditions['Contact.status <>'] = 'Duplicate-Closed';

			$uids = $this->User->find('list', array('fields' => array('User.id', 'dealer_id'),
	            'conditions' => array('User.username' => $this->Auth->User('username'))));
			$cnds = array();
			foreach($uids as $key=>$value){
				$cnds[] = array('Contact.company_id'=>$value, 'Contact.user_id'=>$key);
			}
			$conditions['OR'] = $cnds;
			$lead_pushed_cnt = $this->Contact->find('count', array('conditions' => $conditions));
		}
		$this->set('lead_pushed_cnt',$lead_pushed_cnt);


		//Overdue event count

		$dealer_ids = array();
		$dids = $this->get_dealer_ids();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}

		$user_ids = array();
		$userids = $this->get_dealer_user_ids();
		foreach ($userids as $key => $value) {
			$user_ids[] = $key;
		}

		$user_info = $this->Auth->User();
		date_default_timezone_set( $user_info['zone'] );

		$overdue_conditions = array(
			'Contact.user_id' => $user_ids,
	        'Contact.company_id' => $dealer_ids,
	        'Contact.status <>' => 'Duplicate-Closed',
	        'Event.start <=' =>  date('Y-m-d H:i:s'),
	        'Event.status <>' => array('Completed','Canceled'),
		);
		$this->Contact->bindModel(array(
			'hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))
		), false);
		$overdue_event_count = $this->Contact->find('count', array('conditions' => $overdue_conditions));
		$this->set('overdue_event_count',$overdue_event_count);




		$today_event_conditions = array(
			'Contact.user_id' => $user_ids,
	        'Contact.company_id' => $dealer_ids,
	        'Contact.status <>' => 'Duplicate-Closed',
	        'Event.start >=' =>  date('Y-m-d 00:00:00'),
	        'Event.start <=' =>  date('Y-m-d 23:59:59'),
	        'Event.status <>' => array('Completed','Canceled'),
		);
		$this->Contact->bindModel(array(
			'hasOne'=>array('Event'=>array(
				'foreignKey' => false,
				'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
			))
		), false);
		$today_event_count = $this->Contact->find('count', array('conditions' => $today_event_conditions));
		$this->set('today_event_count',$today_event_count);



		//Get Status Headers
		$this->loadModel('LeadStatus');
		$leadStatuses = $this->LeadStatus->find('all',array('order'=>'LeadStatus.header ASC','conditions'=>array(
			'LeadStatus.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_status_headers = array();
		foreach($leadStatuses as $leadStatus){
			$lead_status_headers[$leadStatus['LeadStatus']['header']] = $leadStatus['LeadStatus']['header'];
		}
		$this->set('lead_status_headers', $lead_status_headers);
		//debug( $lead_status_headers );


		//source options
		$this->loadModel('LeadSourcesHide');
		$lead_sources_hide = $this->LeadSourcesHide->find('list',array('conditions'=>array(
			'LeadSourcesHide.dealer_id'=> $this->Auth->user('dealer_id'),
		)));

		//source options
		$this->loadModel('LeadSource');
		$lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
			'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));
		$lead_sources_options = array();
		foreach($lead_sources as $lead_source){
			$lead_sources_options[$lead_source] = $lead_source;
		}
		$this->set('lead_sources_options', $lead_sources_options);


		//Other Tabs
		$this->loadModel("CrmgroupTab");
		$crmgroupTabs = $this->CrmgroupTab->find('all', array('conditions' => array('CrmgroupTab.dealer_ids'=>implode(",", $dealer_ids)) ));
		$this->set('crmgroupTabs', $crmgroupTabs);
    }

    public function open_build($dealer_id) {

    	$user_data = $this->Auth->User();
    	$usename = $this->Auth->User('username');

    	$user_active = $this->User->find('first', array('conditions' => array('User.username' => $usename, 'User.dealer_id' => $dealer_id )));
		//debug($user_active);

		$user_active['User']['group_id'] = $user_data['group_id'];		

		$this->Auth->login($user_active['User']);

		$this->Session->delete('stat_user');
		$this->Session->delete('stats_month');
		$this->redirect(array('controller' => 'dashboards', 'action' => 'main'));

	}
	public function open_build_main($dealer_id, $contact_id) {

    	$user_data = $this->Auth->User();

    	$usename = $this->Auth->User('username');
    	$user_active = $this->User->find('first', array('conditions' => array('User.username' => $usename, 'User.dealer_id' => $dealer_id )));

        $user_active['User']['group_id'] = $user_data['group_id'];
        // debug($user_active);

		$this->Auth->login($user_active['User']);

		$this->Session->delete('stat_user');
		$this->Session->delete('stats_month');
		$this->redirect(array('controller' => 'contacts', 'action' => 'leads_main', 'view',$contact_id));

	}

	public function open_build_bdc($dealer_id, $contact_id, $lead_type) {

		$user_data = $this->Auth->User();
    	$usename = $this->Auth->User('username');

    	$user_active = $this->User->find('first', array('conditions' => array('User.username' => $usename, 'User.dealer_id' => $dealer_id )));
		//debug($user_active);

		$user_active['User']['group_id'] = $user_data['group_id'];

		$this->Auth->login($user_active['User']);

		$this->Session->delete('stat_user');
		$this->Session->delete('stats_month');

		//$this->redirect(array('controller' => 'contacts', 'action' => 'leads_main', 'view',$contact_id));

		$this->redirect( array('controller'=>'bdc_leads', 'action'=>'leads_main','?'=>array('lead_type'=>$lead_type), 'view_lead_id'=>$contact_id  ) );



	}

	public function save_save_custom_tab(){

		$dids = $this->get_dealer_ids();
		$dealer_ids = array();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}

		if ($this->request->is('post')) {

			$remove_source_all_weblead = ($this->request->data['remove_source_all_weblead'] == 'true')? 1 : 0;

			$this->loadModel("CrmgroupTab");
			$this->CrmgroupTab->create();
			$this->CrmgroupTab->save(array("CrmgroupTab" => array(
				'dealer_ids' => implode(",", $dealer_ids),
				'name' => $this->request->data['name'],
				'source' => $this->request->data['source'],
				'remove_source_all_weblead' => $remove_source_all_weblead
			)));

		}
		$this->autoRender = false;
	}
	public function remove_custom_tab() {
		if ($this->request->is('post')) {
			// debug($this->request->data);
			$this->loadModel("CrmgroupTab");
			$this->CrmgroupTab->id = $this->request->data['custom_tab_id'];
			$this->CrmgroupTab->delete();
		}
		$this->autoRender = false;
	}
	public function update_custom_tab() {
		if ($this->request->is('post')) {
			// debug($this->request->data);
			$this->loadModel("CrmgroupTab");
			$remove_source_all_weblead = ($this->request->data['weblead_opt'] == 'true')? 1 : 0;
			$this->CrmgroupTab->id = $this->request->data['custom_tab_id'];
			$this->CrmgroupTab->saveField("remove_source_all_weblead", $remove_source_all_weblead);
		}
		$this->autoRender = false;
	}

	public function index() {
		$this->layout = 'default_login';
		if ($this->request->is('post')) {

            //print_r($this->data); die() ;
			//echo $this->Auth->password($this->request->data['User']['password']);
			$user_active = $this->User->find('first', array(
                'conditions' => array(
                	'User.dealer_id' => $this->request->data['User']['dealer_id'],
                    'User.username' => $this->request->data['User']['username'],
                    'User.password' => $this->Auth->password($this->request->data['User']['password']),
                    'User.group_id' => array('2','4','8','10','11','6','7','12','13')
			)));

            if (!empty($user_active)) {
                if ($user_active['User']['active']) {

                    if ($this->Auth->login($user_active['User'])) {

                        $this->Session->delete('stat_user');
                        $this->Session->delete('stats_month');



                        $this->redirect(array('controller' => 'crmgroup', 'action' => 'main'));
                    } else {
                        $this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
                    }
                } else {
                    $this->Session->setFlash(__('User not active'), 'session_message', array('class' => 'alert-error'));
                }
            } else {
                $this->Session->setFlash(__('User not found'), 'session_message', array('class' => 'alert-error'));
            }


		}
	}

	private function _part_lead_search($count =false)
	{
		$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
		$dealer_id = $this->request->query['dealer_id'];
		$dids = $this->get_dealer_ids();
		$this->loadModel('PartLeadsDms');
		$conditions['PartLeadsDms.modified >='] = $date_from;
		$conditions['PartLeadsDms.dealer_id'] = array_keys($dids);
		$conditions['PartLeadsDms.bdc_inavlid']=0;
		$conditions['AND']['OR']['PartLeadsDms.before_tax_total >=']='250';
		$conditions['AND']['OR']['PartLeadsDms.counter_taxable_sales >=']='250';
		$conditions['AND']['OR']['PartLeadsDms.special_before_tax_total >=']='250';
		$conditions['NOT']['PartLeadsDms.dnc_status']=array('not_call','no_call_email');
		$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['search_phone']));
		$email = trim($this->request->query['search_email']);
		$first_name = trim($this->request->query['search_first_name']);
		$last_name = trim($this->request->query['search_last_name']);

		$dosearch  = false;
		if($phone != ''){

			$conditionsz_src['OR']['PartLeadsDms.home_phone LIKE'] = $phone."%";
			$conditionsz_src['OR']['PartLeadsDms.work_phone LIKE'] = $phone."%";
			$dosearch  = true;
		}
		if( $first_name != ''){
			$conditionsz_src['PartLeadsDms.name LIKE'] = "%".$first_name."%";
			$dosearch  = true;
		}
		if( $last_name != ''){
			$conditionsz_src['PartLeadsDms.name LIKE'] = "%".$last_name."%";
			$dosearch  = true;
		}
		if( $email != ''){
			$conditionsz_src['PartLeadsDms.email like'] = '%' . $email . '%';
			$dosearch  = true;
		}
		$conditions['BdcSurveycnd.part_lead_id <>'] = NULL;
		$conditions['BdcSurveycnd.survey_id'] = 11;
		$conditions['NOT']['BdcSurveycnd.c_status'] = array(6,43);
		$conditions [] = $conditionsz_src;

		$fields = array(
					'PartLeadsDms.id',
					'PartLeadsDms.name',
					'PartLeadsDms.dealer_id',
					'PartLeadsDms.dealer',
					'PartLeadsDms.home_phone',
					'PartLeadsDms.work_phone',
					'PartLeadsDms.created',
					'PartLeadsDms.modified',
					'PartLeadsDms.invoice_no',
					'PartLeadsDms.sperson',

		);

		$this->PartLeadsDms->bindModel(array(

						'hasMany' => array('BdcSurvey'=>
							array(
								'foreignKey' => 'part_lead_id',
								'order' => 'BdcSurvey.id DESC',
								'fields'=>array('BdcSurvey.id','BdcSurvey.status')
							))
						), false);
		$c_options = array(
						'conditions' => $conditions,
						'fields'=>$fields,
						'joins' => array(
					        array(
					            'alias' => 'BdcSurveycnd',
					            'table' => 'bdc_surveys',
					            'type' => 'LEFT',
					            'conditions' => '`PartLeadsDms`.`id` = `BdcSurveycnd`.`part_lead_id`'
					        ),
							array(
								'alias' => 'DealerName',
					            'table' => 'dealer_names',
					            'type' => 'LEFT',
					            'conditions' => 'PartLeadsDms.dealer_id = DealerName.dealer_id'
							)
					    ),
						'group' => array('PartLeadsDms.id'),
						'order'=>'PartLeadsDms.modified DESC',
						'limit' => 50,
					);
		if($count)
		{
			$part_leads = $this->PartLeadsDms->find('count',$c_options);
		}else{
		$part_leads = $this->PartLeadsDms->find('all',$c_options);
		}
		return $part_leads;
	}


	private function _service_lead_search($count =false)
	{
		$date_from =   date("Y-m-d 00:00:00", strtotime('-60 days') );
		$dealer_id = $this->request->query['dealer_id'];
		$dids = $this->get_dealer_ids();
		$this->loadModel('ServiceLeadsDms');
		$conditions['ServiceLeadsDms.modified >='] = $date_from;
		$conditions['ServiceLeadsDms.dealer_id'] = array_keys($dids);
		$conditions['ServiceLeadsDms.bdc_inavlid']=0;
		$conditions['NOT']['ServiceLeadsDms.dnc_status']=array('not_call','no_call_email');
		$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['search_phone']));
		$email = trim($this->request->query['search_email']);
		$first_name = trim($this->request->query['search_first_name']);
		$last_name = trim($this->request->query['search_last_name']);

		$dosearch  = false;
		if($phone != ''){

			$conditionsz_src['OR']['ServiceLeadsDms.home_phone LIKE'] = $phone."%";
			$conditionsz_src['OR']['ServiceLeadsDms.work_phone LIKE'] = $phone."%";
			$dosearch  = true;
		}
		if( $first_name != ''){
			$conditionsz_src['ServiceLeadsDms.name LIKE'] = "%".$first_name."%";
			$dosearch  = true;
		}
		if( $last_name != ''){
			$conditionsz_src['ServiceLeadsDms.name LIKE'] = "%".$last_name."%";
			$dosearch  = true;
		}
		if( $email != ''){
			$conditionsz_src['ServiceLeadsDms.email like'] = '%' . $email . '%';
			$dosearch  = true;
		}
		$conditions [] = $conditionsz_src;
		$conditions['BdcSurveycnd.service_lead_id <>'] = NULL;
		$conditions['BdcSurveycnd.survey_id'] = 5;
		$conditions['NOT']['BdcSurveycnd.c_status'] = array(6,43);
		$this->ServiceLeadsDms->bindModel(array(

						'hasMany' => array('BdcSurvey'=>
							array(
								'foreignKey' => 'service_lead_id',
								'order' => 'BdcSurvey.id DESC',
								'fields'=>array('BdcSurvey.id','BdcSurvey.status')
							))
						), false);

		$fields = array(
					'ServiceLeadsDms.id',
					'ServiceLeadsDms.name',
					'ServiceLeadsDms.dealer_id',
					'ServiceLeadsDms.dealer',
					'ServiceLeadsDms.home_phone',
					'ServiceLeadsDms.work_phone',
					'ServiceLeadsDms.created',
					'ServiceLeadsDms.modified',
					'ServiceLeadsDms.order_no',
					'ServiceLeadsDms.service_writer',

		);
		$c_options= array(
						'conditions' => $conditions,
						'fields' => $fields,
 						'joins' => array(
					        array(
					            'alias' => 'BdcSurveycnd',
					            'table' => 'bdc_surveys',
					            'type' => 'LEFT',
					            'conditions' => '`ServiceLeadsDms`.`id` = `BdcSurveycnd`.`service_lead_id`'
					        ),
							array(
					            'alias' => 'DealerName',
					            'table' => 'dealer_names',
					            'type' => 'LEFT',
					            'conditions' => 'ServiceLeadsDms.dealer_id = DealerName.dealer_id'
					        )
					    ),
						'group' => array('ServiceLeadsDms.id'),
						'order'=>'ServiceLeadsDms.modified DESC',
						'limit' => 50,
					);
		if($count)
		{
			$service_leads = $this->ServiceLeadsDms->find('count',$c_options);
		}else
		{
			$service_leads = $this->ServiceLeadsDms->find('all',$c_options);
		}
		return $service_leads;
	}


	public function all_lead_search(){

		$this->layout = 'ajax';


		$src_params = $this->request->query;
		// debug($src_params);
		$dealer_ids = array();
		$dids = $this->get_dealer_ids();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}

		$conditions["Contact.modified >="] = $src_params['s_d_range']." 00:00:00";
		$conditions["Contact.modified <="] = $src_params['e_d_range']." 23:59:59";
		$conditions["Contact.company_id"] = $dealer_ids;
		$conditions['Contact.status <>'] = 'Duplicate-Closed';
		if($src_params['search_status'] <> ''){
			$conditions['Contact.status'] = $src_params['search_status'];
		}



		if(isset($src_params['alllead_colorcode'])){
			$color_code = $src_params['alllead_colorcode'];
			if($color_code == 'yellow'){
				$conditions[] = ['Contact.owner <> Contact.sperson'];
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$conditions[] = ['Contact.created <> Contact.modified'];
			}
		}

		// debug($conditions);





		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.condition',
			'Contact.company',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Contact.dealer_transfer_from'
		);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));

		/*$this->Contact->bindModel(array('belongsTo'=>array('DealerName'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.dealer_transfer_from = DealerName.dealer_id')
		))), false);*/

	    $this->Paginator->settings['Contact']  = array(
				'conditions' => $conditions,
				'fields'=>$fields,
				'order'=>'Contact.modified DESC',
				'limit' => 50,
				'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
			);

    	$contacts = $this->Paginator->paginate('Contact');
    	$this->set('contacts', $contacts);

    	// debug( $contacts );

    	$custom_step_map = $this->get_dealer_steps($dealer_id);
		$this->set('custom_step_map', $custom_step_map);

	}

	public function custom_tab_data() {
		$tab_id = $this->request->query['custom_tab_id'];
		$this->loadModel("CrmgroupTab");
		$crmgroupTab = $this->CrmgroupTab->find('first', array('conditions' => array('CrmgroupTab.id'=>$tab_id)));
		$this->set('crmgroupTab', $crmgroupTab);

		$this->layout = 'ajax';


		$dealer_ids = array();
		$dids = $this->get_dealer_ids();
		foreach ($dids as $key => $value) {
			$dealer_ids[] = $key;
		}
		$date_from =   date("Y-m-d 00:00:00", strtotime('-90 days') );

		$conditions['Contact.created >='] = $date_from;
		$conditions["Contact.company_id"] = $dealer_ids;
		$conditions["Contact.source LIKE"] = "%".$crmgroupTab['CrmgroupTab']['source']."%";
		$conditions['Contact.status <>'] = 'Duplicate-Closed';


		if(isset($this->request->query['selected_color'])){
			$color_code = $this->request->query['selected_color'];
			if($color_code == 'yellow'){
				$conditions[] = ['Contact.owner <> Contact.sperson'];
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'red'){
				$conditions[] = array('OR' => array('Contact.owner = Contact.sperson', array('Contact.owner is null' , 'Contact.sperson' => '' ) ) );
				$conditions[] = ['Contact.created = Contact.modified'];
			}
			if($color_code == 'green'){
				$conditions[] = ['Contact.created <> Contact.modified'];
			}
		}

		// debug($conditions);

		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'ContactStatus.name',
			'Contact.type',
			'Contact.company_id',
			'Contact.condition',
			'Contact.company',
			'Contact.year',
			'Contact.class',
			'Contact.make',
			'Contact.model',
			'Contact.modified_full_date',
			'Contact.modified',
			'Contact.created',
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
			'Contact.notes',
			'Contact.lead_status',
			'Contact.status',
			'Contact.sales_step',
			'Contact.source',
			'Contact.chk_duplicate',
			'Contact.web_selection',
			'DealerName.name',
			'Contact.dealer_transfer_from'
		);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));

		/*$this->Contact->bindModel(array('belongsTo'=>array('DealerName'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.dealer_transfer_from = DealerName.dealer_id')
		))), false);*/

	    $this->Paginator->settings['Contact']  = array(
				'conditions' => $conditions,
				'fields'=>$fields,
				'order'=>'Contact.modified DESC',
				'limit' => 50,
				'joins' => array(
							array('table'=>'dealer_names',
								'type'=>'LEFT',
								'alias'=>'DealerName',
								'conditions'=>array('Contact.dealer_transfer_from = DealerName.dealer_id')
							)
						)
			);

    	$contacts = $this->Paginator->paginate('Contact');
    	$this->set('contacts', $contacts);

    	// debug( $contacts );

    	$custom_step_map = $this->get_dealer_steps( $this->Auth->user("dealer_id")  );
		$this->set('custom_step_map', $custom_step_map);















	}






}
