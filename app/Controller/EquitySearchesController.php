<?php
class EquitySearchesController extends AppController {

    public $uses = array('Contact', 'EquitySearch','History','DealerSetting','User','ContactStatus');
    public $components = array('RequestHandler','Utility');

    private $selectFields = array(
		'Contact.id',
		'Contact.first_name',
		'Contact.last_name',
		'ContactStatus.name',
		'Contact.type',
		'Contact.condition',
		'Contact.year',
		'Contact.make',
		'Contact.model',
		'Contact.modified_full_date',
		'Contact.created',
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
		'Contact.notes',
		'Contact.lead_status',
		'Contact.status',
		'Contact.sales_step',
		'Contact.source',
		'Contact.user_id',
		'Contact.dnc_status',
		'Contact.chk_duplicate',
        'Contact.spouse_first_name',
        'Contact.spouse_last_name',
		'Event.id',
		'Event.start',
		'Event.event_type_id',
        'Event.customer_showed'
	);

	public function beforeFilter()
    {
		parent::beforeFilter();
	}

	public function load_mgrcalls() {

		$this->loadModel('ContactStatus');
		$contactstatus = $this->ContactStatus->find('all');
		$contactstatusarr = array();
		foreach($contactstatus as $key=>$details){
			$contactstatusarr[$details['ContactStatus']['id']] = $details['ContactStatus']['name'];
		}
		$this->set('contactstatusarr', $contactstatusarr);

		$dealer_id = $this->Auth->user("dealer_id");
    	$zone = $this->Auth->user("zone");
    	date_default_timezone_set($zone);

		$date_start = date('Y-m-d', strtotime("-1 days")) ;
		$date_end = date('Y-m-d', strtotime("-1 days")) ;

		$this->set('date_start', $date_start);
		$this->set('date_end', $date_end);
	}

	public function do_mgrcalls_search(){

		$mgr_lead_action_no_lead_ownership = $this->DealerSetting->get_settings('mgr_lead_action_no_lead_ownership', $this->Auth->user('dealer_id') );
		$this->set('mgr_lead_action_no_lead_ownership', $mgr_lead_action_no_lead_ownership);

    	$dealer_id = $this->Auth->user("dealer_id");
    	$zone = $this->Auth->user("zone");
    	date_default_timezone_set($zone);

		$src_params = $this->request->query;

		$date_start = $src_params['start_date']." 00:00:00";
		$date_end = $src_params['end_date']." 23:59:59";

		$conditions["Contact.created >="] = $date_start;
		$conditions["Contact.created <="] = $date_end;
		$conditions['Contact.company_id'] = $dealer_id;
    	$conditions['Contact.status <>'] = 'Duplicate-Closed';

    	if($src_params['search_contact_status_id'] != ''){
    		$conditions['Contact.contact_status_id'] = $src_params['search_contact_status_id'];
    	}

    	$this->paginate = array(
			'conditions' => $conditions,
			'fields'     => $this->selectFields,
			'order'      => "Contact.created asc",
			'limit'      => 20,
		);
		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));
		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);
		$contacts = $this->Paginate('Contact');

		$this->set('contacts', $contacts);
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);
    }


    private function _find_duplicates($c_d = array())
    {
		$dealer_id = $this->Auth->user('dealer_id');
		$step_sequence = array();

		$one_month = date('Y-m-d H:i:s', strtotime("-60 days")   ) ;

		$cond = array(
			'Contact.company_id'     => $dealer_id,
			'Contact.id <>'          => $c_d['Contact']['id'],
			'Contact.chk_duplicate'  => 0,
			'Contact.status <>'      => 'Duplicate-Closed',
			'Contact.lead_status'    => 'Open',
			'Contact.sales_step <>'  => '10',
			'Contact.modified >='    => $one_month,
		);

		$checkduplicate = false;

		if($c_d['Contact']['first_name'] != '' && $c_d['Contact']['last_name'] != ''){
			$cond['OR'][] = array('Contact.first_name'=>$c_d['Contact']['first_name'], 'Contact.last_name'=>$c_d['Contact']['last_name']  );
			$checkduplicate = true;
		}

		$phone_array = array();

		if($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] != null && $c_d['Contact']['mobile'] != '0000000000' && $c_d['Contact']['mobile'] != '1111111111' && $c_d['Contact']['mobile'] != '9999999999'  ){
			$phone_array[] = $c_d['Contact']['mobile'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] != null && $c_d['Contact']['phone'] != '0000000000'  && $c_d['Contact']['phone'] != '1111111111' && $c_d['Contact']['phone'] != '9999999999'   ){
			$phone_array[] = $c_d['Contact']['phone'];
			$checkduplicate = true;
		}
		if($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] != null && $c_d['Contact']['work_number'] != '0000000000'  && $c_d['Contact']['work_number'] != '1111111111' && $c_d['Contact']['work_number'] != '9999999999' ){
			$phone_array[] = $c_d['Contact']['work_number'];
			$checkduplicate = true;
		}
		if(!empty($phone_array)){
			$cond['OR']['Contact.mobile'] =  $phone_array;
			$cond['OR']['Contact.phone'] =  $phone_array;
			$cond['OR']['Contact.work_number'] =  $phone_array;
		}


		if($checkduplicate == false){
			$results['rd'] = array();
			$results['yd'] = array();
			return $results;
		}

		//debug($cond);
		$d_cs =  $this->Contact->find('all',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.sales_step','Contact.status','Contact.created'),
			'conditions' => $cond
		));
		//debug($d_cs);

		$results['rd'] = array();
		$results['yd'] = array();
		// check duplidates for whether its all match or only name
		foreach($d_cs as $d_c){

			if( strtolower($c_d['Contact']['first_name']) == strtolower($d_c['Contact']['first_name'])
				&& strtolower($c_d['Contact']['last_name']) == strtolower($d_c['Contact']['last_name'])
				&& (
					($c_d['Contact']['mobile'] != '' && $c_d['Contact']['mobile'] == $d_c['Contact']['mobile'])   ||
					($c_d['Contact']['phone'] != '' && $c_d['Contact']['phone'] == $d_c['Contact']['phone']) ||
					($c_d['Contact']['work_number'] != '' && $c_d['Contact']['work_number'] == $d_c['Contact']['work_number'])
				)
			){
				$results['rd'][] = $c_d['Contact']['id'];
				//$results['rd'][] = $d_c['Contact']['id'];
			}else{
				$results['yd'][] = $c_d['Contact']['id'];
				//$results['yd'][] = $d_c['Contact']['id'];
			}
		}
		return $results;
	}



    public function index() {
		$user_id = $this->Auth->user("id");
    	$dealer_id = $this->Auth->user("dealer_id");
    	$this->loadModel('User');
		$mgr_group_ids = array(2,4,6,7,12);
		$mgr_user_ids = $this->User->find('list',array('fields' => 'id,id','conditions' => array('dealer_id' => $dealer_id,'group_id' => $mgr_group_ids)));
		$mgr_user_ids[] = $user_id;
		$this->EquitySearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User'))));
	 	$equitySearches = $this->EquitySearch->find('all', array(
        'conditions' => array(
            'EquitySearch.user_id'=>$mgr_user_ids,
            'EquitySearch.dealer_id'=>$dealer_id
          ),
          'order'=>array('EquitySearch.id ASC') ));
    //debug($equitySearches);
    $equitySearches = $this->_refresh_equity_searches();
    $this->set('equitySearches', $equitySearches);


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

		//Steps
		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);

    //Sources

    /* Depricated code.  We are going to start pulling lead sources from the Contacts table instead of the lead sources table
    $this->loadModel('LeadSource');
    $lead_sources = $this->LeadSource->find('list',array('order'=>array('LeadSource.name ASC'),'conditions'=>array(
      'LeadSource.name !=' =>  $lead_sources_hide , 'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
    )));*/

    $this->Contact->unbindModel(array('belongsTo' => array('User')));
    $this->Contact->unbindModel(array('belongsTo' => array('ContactStatus')));
    $this->Contact->unbindModel(array('hasMany' => array('Deal')));
    //$this->loadModel('Contact');
    $lead_sources = $this->Contact->find('all',array(
      //'order'=>array('Contact.source ASC'),
      //'recursive'=>-1,
      'conditions'=>array(
        //'Contact.source !=' => $lead_sources_hide ,
        'Contact.company_id'=> array($this->Auth->user('dealer_id'), 0),
      ),
      'fields' => array('Contact.id','Contact.source'),
      'group' => array('Contact.source')
    ));

    $lead_sources_options = array();
    $cnt = 0;

    foreach($lead_sources as $lead_source){
      $cnt ++;
      $lead_sources_options[$lead_source['Contact']['source']] = $lead_source['Contact']['source'];
    }

    $this->set('lead_sources_options', $lead_sources_options);


		$show_user = $this->DealerSetting->get_settings('equity_sperson', $this->Auth->user('dealer_id') );
		$this->set('show_user', $show_user);
		$spersons = array();
		if($show_user == 'On' || in_array($this->Auth->user('group_id'),array(2,6,9))){
			$spersons = $this->User->find('list', array('recursive'=>-1, 'order' =>'User.first_name', 'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=> $this->Auth->user('dealer_id') )));
		}
		$this->set('spersons', $spersons);


     // Creating $makeOptions for use in EquitySearches/index.ctp

			//$makeOptions = $this->XmlInventory->query ("SELECT DISTINCT `make` FROM `xml_inventories` WHERE dealerid = '$dealer_id' ");
/*
	    $this->loadModel('XmlInventory');

      $makeOptionsPre = $this->XmlInventory->find ('all',
          array(
            'fields'  => array('DISTINCT make'),
            'conditions' => array (
                'dealerid'  => $dealer_id
            )
          )
      );

      $makeOptions = array();
      foreach ($makeOptionsPre as $option) {
        $makeOptions[$option['XmlInventory']['make']] = $option['XmlInventory']['make'];
      }
      $this->set('makeOptions', $makeOptions);
*/
		// Get Category List  Depricated Code
    /*
		$this->loadModel('Category');
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}*/

    // Logic to fetch all categories for dealer from contact table
    $this->loadModel('Contact');
    $this->Contact->recursive = -1;
    $d_types = $this->Contact->find("all", array(
      'conditions'=>array(
        'Contact.company_id'=>$dealer_id,
        'not'=>array('Contact.type'=> null,'Contact.status LIKE'=>'%Closed%'),
        'Contact.type <>'=>''
      ),
      'fields'=>array('DISTINCT Contact.type')
    ));
    foreach($d_types as $d_te){

			$body_type[$d_te['Contact']['type']] = $d_te['Contact']['type'];
		}
		$this->set('body_type', $body_type);

		// Logic to fetch all classes for dealer from contact table
		$this->loadModel('Contact');
		$dealer_class_ids = $this->Contact->query("Select DISTINCT class from contacts where company_id = '".$dealer_id."'AND  class REGEXP '^[0-9]+$'");
		$dealer_classes = $this->Contact->query("Select DISTINCT class from contacts where company_id = '".$dealer_id."'AND  class REGEXP '[a-zA-Z]+'");
		//pr($dealer_class_ids);
		$dealer_class_ids = Set::classicExtract($dealer_class_ids,'{n}.contacts.class');
		$dealer_classes = Set::classicExtract($dealer_classes,'{n}.contacts.class');

		if(!empty($dealer_classes) || !is_null($dealer_classes)) {
			$all_class_array = array_combine($dealer_classes,$dealer_classes);
		} else {
			$all_class_array = array();
		}

		if(!empty($dealer_class_ids)){
			$this->loadModel('Category');
			$category_classes = $this->Category->find('list',array('fields' => 'id,body_sub_type','conditions' => array('Category.id' => $dealer_class_ids),'order' => 'body_sub_type asc'));
			if(!empty($category_classes))
			$all_class_array = $all_class_array + $category_classes;
		}
		$exist_classs = array();
		$new_class_array = array();
		foreach($all_class_array as $key =>$class){
			if(array_key_exists($class,$exist_classs))
			{
				$new_key = $exist_classs[$class].'@@'.$key;
				unset($new_class_array[$exist_classs[$class]]);
				$new_class_array[$new_key] = $class;
				$exist_classs[$class] = $new_key;
			}else
			{
				$new_class_array[$key] = $class;
				$exist_classs[$class] = $key;
			}

		}
		$all_class_array = $new_class_array;
		$this->set(compact('all_class_array'));
		//echo $this->layout; die;

    }

    public function dormant($stuff_type = null)
    {
		$dealer_id = $this->Auth->user("dealer_id");
	 	$zone = $this->Auth->user("zone");
	 	date_default_timezone_set($zone);

	 	$conditions = $this->Contact->dormant_lead_count($zone, $dealer_id, 'Dealer',  date("m"), date("Y"));

	 	if($stuff_type != 'Staff') {
	 		$conditions['Contact.user_id'] = $stuff_type;
	 	} elseif($this->Auth->user('group_id') == 3) {
			$conditions['Contact.user_id'] = $this->Auth->user('id');
		}

		if($this->request->query('startDate') != "" && $this->request->query('endDate') != "")
		{
			$conditions["Contact.modified >="] = date('Y-m-d 00:00:00', strtotime($this->request->query('startDate')));
			$conditions["Contact.modified <="] = date('Y-m-d 59:59:59', strtotime($this->request->query('endDate')));

			$this->set('startDate', $this->request->query('startDate'));
            $this->set('endDate', $this->request->query('endDate'));
		}

		$this->paginate = array(
			'conditions' => $conditions,
			'fields'     => $this->selectFields,
			'order'      => "Contact.modified DESC",
			'limit'      => 20,
		);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		));

		$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);

		$contacts = $this->Paginate('Contact');

		$this->set('contacts', $contacts);

		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);
    }

    public function save_search()
    {
    	$user_id = $this->Auth->user("id");
		$dealer_id = $this->Auth->user("dealer_id");
    	if(!empty($this->request->data)){

    		$src_data = array('EquitySearch'=>array(
    			"user_id" => $user_id,
				"dealer_id" => $dealer_id,
    			'date_start' => $this->request->data['s_d_range'],
    			'date_end' => $this->request->data['e_d_range'],
    			'search_lead_type' => $this->request->data['search_lead_type'],
				'search_header' => $this->request->data['search_status_header'],
    			'search_status' => $this->request->data['search_status'],
    			'search_model' => $this->request->data['search_model'],
    			'search_zip' => $this->request->data['search_zip'],
    			'search_name' => $this->request->data['search_name'],
    			'search_county' => $this->request->data['search_county'],
    			'search_sales_step' => $this->request->data['search_sales_step'],
    			'search_est_payment_search' => $this->request->data['search_est_payment_search'],
    			'search_source' => $this->request->data['search_source'],
    			'search_user_id' => $this->request->data['search_user_id'],
				'search_type' => (!empty($this->request->data['search_type'])) ? implode(",", $this->request->data['search_type']) : '',
				'search_company_work' => $this->request->data['search_company_work'],
                'search_make' => $this->request->data['search_make'],
                'search_comment' => $this->request->data['search_comment'],
                'search_state' => $this->request->data['search_state'],
                'search_condition' => $this->request->data['search_condition'],
				'search_class' => $this->request->data['search_class'],
				'search_company_account_id' => $this->request->data['search_company_account_id'],
				'bdc_search' => $this->request->data['bdc_search'],
        		'search_full_name' => $this->request->data['search_full_name'],
            'method_of_payment' => $this->request->data['method_of_payment'],
        		'search_vin' => $this->request->data['search_vin']
    		));
    		// Add Code By SB
        	//'search_vin' => $this->request->data['search_vin'],
    		if(isset($this->request->data['search_pushed']) && $this->request->data['search_pushed'] == '1'){
    			$src_data['EquitySearch']['search_pushed'] = 1;
    		}
        //debug($src_data);
			$this->EquitySearch->create();
			$this->EquitySearch->save($src_data);
    	}

      $equitySearches = $this->_refresh_equity_searches();
      $this->set('equitySearches', $equitySearches);
    }
    public function _refresh_equity_searches(){
      $user_id = $this->Auth->user("id");
      $dealer_id = $this->Auth->user("dealer_id");
      $this->loadModel('User');
	$mgr_group_ids = array(2,4,6,7,12);
	$mgr_user_ids = $this->User->find('list',array('fields' => 'id,id','conditions' => array('dealer_id' => $dealer_id,'group_id' => $mgr_group_ids)));
	$mgr_user_ids[] = $user_id;
	$this->EquitySearch->bindModel(array('belongsTo' => array('User' => array('className' => 'User'))));
	$equitySearches = $this->EquitySearch->find('all', array(
	'conditions' => array(
		'EquitySearch.user_id'=>$mgr_user_ids,
		'EquitySearch.dealer_id'=>$dealer_id
	  ),
	  'order'=>array('EquitySearch.id ASC') ));
      return $equitySearches;
    }
    public function remove_search($equity_search_id)
    {
      $user_id = $this->Auth->user("id");
      $saved_equity_search = $this->EquitySearch->findById($equity_search_id);
      if($saved_equity_search['EquitySearch']['user_id'] == $user_id){
        $this->EquitySearch->id = $equity_search_id;
    		$this->EquitySearch->delete();
      } else {
        $err_msg = 'Only the creator of this Search can delete it.';
        $this->Session->setFlash("yes");
        //$this->Session->setFlash(__('Only the creator of this Search can delete it.'), 'alert', array('class' => 'alert-error'));
      }

      $equitySearches = $this->_refresh_equity_searches();
      //$this->set('err_msg',$err_msg);
  		$this->set('equitySearches', $equitySearches);
    }

    public function automodel() {
    	$this->loadModel("XmlInventory");
        //if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
			$carNames = $this->XmlInventory->find('list', array('fields'=>array('model'),
				'conditions' => array(
					'XmlInventory.model LIKE' => trim($term) . '%'
				),
				'group'=>'XmlInventory.model'
			));
			echo json_encode($carNames);
        //}
			$this->autoRender = false;
    }

    public function find_contact_account_id($contact_acc_name){

		$this->loadModel("ContactAccount");
		$carNames = $this->ContactAccount->find('first', array('fields'=>array('id'),
			'conditions' => array(
				'ContactAccount.name LIKE' => "%".trim($contact_acc_name) . '%'
			)
		));
		if(!empty($carNames)){
			return $carNames['ContactAccount']['id'];
		}else{
			return false;
		}
	}

    public function do_equity_search($equity_search_id = null)
    {
    	$dealer_id = $this->Auth->user("dealer_id");

		$this->loadModel("DealerSetting");
		$workload_order = $this->DealerSetting->get_settings('workload_order', $dealer_id);

		if($workload_order == 'On'){
			$lead_order = "Contact.modified asc ";
		}else{
			$lead_order = "Contact.modified desc ";
		}

		$show_user = $this->DealerSetting->get_settings('equity_sperson', $this->Auth->user('dealer_id') );

        $src_params = array(); //search params

        if($equity_search_id != null) {

            $equitySearches = $this->EquitySearch->find('first', array('conditions' => array('EquitySearch.id'=>$equity_search_id)));
	    	$this->set('equitySearches', $equitySearches);

            $src_params = $equitySearches['EquitySearch'];

	    	$conditions["Contact.modified >="] = $equitySearches['EquitySearch']['date_start']." 00:00:00";
	    	$conditions["Contact.modified <="] = $equitySearches['EquitySearch']['date_end']." 23:59:59";

        } else {

            $src_params = $this->request->query;

			$conditions["Contact.modified >="] = $src_params['s_d_range']." 00:00:00";
	    	$conditions["Contact.modified <="] = $src_params['e_d_range']." 23:59:59";

        }

        //Set conditions for search
        if($src_params['search_status'] != '') {
            $conditions["Contact.status"] = $src_params['search_status'];
        }

        if($src_params['search_lead_type'] == 'Open') {
            $conditions["Contact.lead_status"] = "Open";
        }

        if($src_params['search_lead_type'] == 'Closed') {
            $conditions["Contact.lead_status"] = "Closed";
        }

        if(trim($src_params['search_make']) != '') {
            $conditions["Contact.make LIKE"] = "%".trim($src_params['search_make'])."%";
        }

        if(trim($src_params['search_model']) != '') {
            $conditions["Contact.model LIKE"] = "%".trim($src_params['search_model'])."%";
        }

        /* Start Code Add by Sb */
        if(trim($src_params['search_vin']) != '')
        {
            $conditions["Contact.vin LIKE"] = "%".trim($src_params['search_vin'])."%";
        }
        /* End Code Add by Sb */



        if(trim($src_params['search_zip']) != '') {
            $conditions["Contact.zip"] = trim($src_params['search_zip']);
        }

        if(trim($src_params['search_state']) != '') {
            $conditions["Contact.state"] = trim($src_params['search_state']);
        }

        if($src_params['search_est_payment_search'] != '') {
            $conditions["Contact.est_payment_search"] = $src_params['search_est_payment_search'];
        }

        if($src_params['search_source'] != '') {
            $conditions["Contact.source"] = $src_params['search_source'];
        }

        if($src_params['search_sales_step'] != '') {
            $conditions["Contact.sales_step"] = $src_params['search_sales_step'];
        }

        if($src_params['search_company_work'] != '') {
            $conditions["Contact.company_work LIKE"] = "%".trim($src_params['search_company_work'])."%";
        }

        if($src_params['search_full_name'] != '') {
          $conditions["Contact.full_name LIKE"] = "%".trim($src_params['search_full_name'])."%";
        }

        if($src_params['method_of_payment'] != '') {
          $conditions["Contact.method_of_payment"] = $src_params['method_of_payment'];
        }

        if(!empty($src_params['search_type'])) {
          //$s_ary = implode(",",$src_params['search_type']);
          $conditions['OR'] = array();
          foreach($src_params['search_type'] as $t){
            array_push($conditions["OR"],array("Contact.type"=>$t));
          }
        }
			//print_r($conditions); die;
        if($src_params['search_condition'] != '') {
        	if($src_params['search_condition'] == 'All') {
        		$conditions["Contact.condition"] = array('New', 'Used', 'Rental', 'Demo', 'Any');
        	} else {
        		$conditions["Contact.condition"] = $src_params['search_condition'];
        	}
        }

        if($src_params['search_company_account_id'] != '') {
        	$acc_id = $this->find_contact_account_id( $src_params['search_company_account_id'] );
			if($acc_id){
				$conditions['Contact.contact_account_id'] = $acc_id;
			}
        }

		// For class Search
		if(!empty($src_params['search_class'])){
			$class_array  = explode('@@',$src_params['search_class']);
			 $conditions["Contact.class"] = $class_array;
		}

        if($src_params['search_user_id'] != '') {

            $conditions["Contact.user_id"] = $src_params['search_user_id'];

        } else {

            if($show_user == 'Off' && $this->Auth->User("group_id") == '3') {
                $conditions["Contact.user_id"] = $this->Auth->User("id");
            }

        }

        if(isset($src_params['search_pushed']) && $src_params['search_pushed'] == '1') {
            $conditions["Contact.staff_transfer"] = 1;
            //Removing this so that we can turn off lead notifications for pushed on dashboard and still use equity lead search
            //$conditions[] = array("Contact.location_modified = Contact.modified");
        }

        if(trim($src_params['search_lead_type'] == 'Sold')) {
          $conditions["Contact.sales_step"] = "10";
          unset($conditions['Contact.created <=']);
          unset($conditions['Contact.created >=']);
          unset($conditions['Contact.modified <=']);
          unset($conditions['Contact.modified >=']);

        }

	    if(!empty($conditions)){

	    	$conditions['Contact.company_id'] = $dealer_id;
	    	$conditions['Contact.status <>'] = 'Duplicate-Closed';
	    	//$conditions['User.group_id'] = array(1,2,3,4,5,6,10,11);

            $options = array(
				'conditions' => $conditions,
				'fields'     => $this->selectFields,
				'order'      => $lead_order,
				'limit'      => 20,
                'group'      => 'Contact.id',
			);

        if(trim($src_params['search_lead_type'] =='Sold')){
          $options['joins'] = array(
              array(
                  'table' => 'lead_solds',
                  'type' => 'RIGHT',
                  'conditions' => array(
                    'lead_solds.contact_id = Contact.id',
                    'lead_solds.created >=' => $src_params['s_d_range']." 00:00:00",
                    'lead_solds.created <=' =>  $src_params['e_d_range']." 23:59:59"
                  )
              )
          );
        }


            if(trim($src_params['search_comment']) != '' )
            {
                $options['joins'] = array(
                    array(
                        'table' => 'histories',
                        'type' => 'RIGHT',
                        'conditions' => array('histories.contact_id = Contact.id', 'histories.comment LIKE "%'.$src_params['search_comment'].'%"')
                    )
                );
	    	}



	    	$this->paginate = $options;

	    	$this->Session->write('Equity.Options', $options);

			if($equity_search_id != null) {

				$my_unique_cache_id =  $dealer_id."_equity_".$equity_search_id;
				$my_unique_cache_id_paging =  $dealer_id."_equity_paging_".$equity_search_id;

				$page = !isset($this->request->named['page']) ? '1' : $this->request->named['page'];
				Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				$contacts = Cache::read($my_unique_cache_id . $page, $this->Memcache_config);
				Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				$paging = Cache::read($my_unique_cache_id_paging . $page, $this->Memcache_config);

				if ($contacts && $paging) {

				    $this->set('contacts', $contacts);
				    $this->request->params['paging'] = $paging;

				} else {

					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))), false);
					$contacts = $this->Paginate('Contact');

				    Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				    Cache::write($my_unique_cache_id_paging . $page, $this->request->params['paging'], $this->Memcache_config);
				    Cache::set(array('duration' => '+6 hours'), $this->Memcache_config);
				    Cache::write($my_unique_cache_id . $page, $contacts, $this->Memcache_config);
				    $this->set('contacts', $contacts);

				}

			} else {

				$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
					'foreignKey' => false,
					'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
				))), false);
				$contacts = $this->Paginate('Contact');
				$this->set('contacts', $contacts);

			}


			//< Find Duplicate >
			$rds = array();
			$yds = array();
			foreach($contacts as $contact) {
				if($contact['Contact']['status'] == 'Duplicate-Closed' || $contact['Contact']['chk_duplicate'] == 1 || $contact['Contact']['lead_status'] == 'Closed' ||  $contact['Contact']['sales_step'] == '10'  ){
					continue;
				} else {
					$is_dupllicate = $this->_find_duplicates($contact);
					foreach($is_dupllicate['rd'] as $rd){
						$rds[$rd] = 1;
					}
					foreach($is_dupllicate['yd'] as $rd){
						$yds[$rd] = 1;
					}
				}
			}
			$this->set('rds', $rds);
			$this->set('yds', $yds);

		}else{
			$this->set('contacts', array());
		}

		$sales_step_options = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		$this->set('SalesStep',$sales_step_options);
    }

    public function print_equity_search()
    {
    	$options = $this->Session->read('Equity.Options');

    	$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
			'foreignKey' => false,
			'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
		))), false);

    	unset($options['limit']);

		$contacts = $this->Contact->find('all', $options);

		$this->set('contacts', $contacts);

		$this->layout = 'print_layout';

		$this->view = 'print_contacts';
    }
}
?>
