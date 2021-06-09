<?php
class ContactAccountsController extends AppController {

	public function beforeFilter() {
          parent::beforeFilter();
    }

    /**
	* List and Search Contact Account
	*/
	public function index() {

		$allowed_groups = array("2","6","9");
		$group_id = $this->Auth->user('group_id');
		
		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		
		$this->loadModel("ContactAccount");
		$this->layout = "default_new";

		$conditions = array('ContactAccount.dealer_id'=> $this->Auth->user('dealer_id'));
		$src_name = "";
		if(!empty($this->request->query['name'])){
            $conditions['ContactAccount.name like'] = "%".$this->request->query['name']."%";
            $src_name = $this->request->query['name'];
        }
        $src_user = "";
        if(!empty($this->request->query['user_id'])){
            $conditions['ContactAccount.user_id'] = $this->request->query['user_id'];
            $src_user = $this->request->query['user_id'];
        }
        $this->set("src_name", $src_name);
        $this->set("src_user", $src_user);
		
		$this->ContactAccount->bindModel(array(
			'belongsTo'=>
				array(
					'User'=>array(
						'foreignKey'=>false,
						'conditions'=> array("ContactAccount.user_id = User.id"),
						'fields' => array("User.id","User.first_name","User.last_name")
					),
					'Owner' => array(
						'foreignKey'=>false,
						'className' => 'User',
						'conditions'=> array("ContactAccount.owner_id = Owner.id"),
						'fields' => array("Owner.id","Owner.first_name","Owner.last_name")
					)
				),
			)
		);
		
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array('ContactAccount.name'),
            'limit' => 50,
        );
        $contactAccounts = $this->Paginate("ContactAccount");

		$this->set('contactAccounts',$contactAccounts);

		$this->loadModel("User");
		$users = $this->User->find('all',array(
			"order" => "User.first_name",
			'conditions'=>array(
			'User.dealer_id'=> $this->Auth->user('dealer_id'),
			'User.active'=> 1
		)));
		$user_list = array();
		foreach($users as $user){
			$user_list[ $user['User']['id'] ] = $user['User']['first_name']. " " .$user['User']['last_name'];
		}
		$this->set('user_list',$user_list);

		if ($this->request->is('post')) {
			//debug($this->request->data);
			$this->request->data['ContactAccount']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->request->data['ContactAccount']['owner_id'] = $this->Auth->user('id');

			if($this->request->data['ContactAccount']['id'] == ''){
				unset($this->request->data['ContactAccount']['id']);
				$this->ContactAccount->create();
				if($this->ContactAccount->save($this->request->data)){
					$this->redirect(array('action' => 'index'));
				}
			}else{
				if($this->ContactAccount->save($this->request->data)){
					$this->redirect(array('action' => 'index'));
				}
			}
		}else{

			if(isset(  $this->request->query['team_id'])){
				$ContactAccounts_data = $this->ContactAccount->find('first',array('conditions'=>array(
					'ContactAccount.dealer_id'=> $this->Auth->user('dealer_id'),
					'ContactAccount.id'=> $this->request->query['team_id'],
				)));
				$this->request->data= $ContactAccounts_data;

			}

		}

	}

	/**
	* Search Contact for adding a lead to a contact account
	*/
	function search_account_lead(){

		$dealer_id = $this->Auth->User("dealer_id");
		$this->loadModel("Contact");

		if(!empty($this->request->query)){

			// debug( $this->request->query  );	

			$phone = str_replace(array(" ","-", '(',')'),"", trim($this->request->query['phone']));
			$email = trim($this->request->query['email']);
			$first_name = trim($this->request->query['first_name']);
			$last_name = trim($this->request->query['last_name']);
			$contact_account_id = trim($this->request->query['contact_account_id']);

			$this->set("contact_account_id", $contact_account_id);

			$conditions = array();
			$conditions[] = array("OR" => array('Contact.contact_account_id <>' => $contact_account_id, 'Contact.contact_account_id' => null ));
			/**
			* Search Criteria 
			*/
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
			}else{
				if( $email != ''){
					$conditions['Contact.email'] = $email;
				}
				if( $phone != ''){
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

			if($this->request->query['searchrange'] == 'two_years' ){
				$conditions['Contact.modified >='] = date("Y-m-d H:i:s", strtotime('-2 year'));
			}
			$conditions['Contact.status <>']='Duplicate-Closed';
			$conditions['Contact.company_id'] = $dealer_id;

			// debug($conditions );

			$fields = array(
				'Contact.id',
				'Contact.first_name',
				'Contact.m_name',
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
				'Contact.contact_account_id',
				'Contact.dnc_status',
				'ContactAccount.id',
				'ContactAccount.name',
			);

			$this->Contact->unbindModel(array(
				'hasMany'=>array('Deal'),
			), false);

			$this->Contact->bindModel(array(
				'belongsTo'=>array('ContactAccount' => array(
					'foreignKey' => false,
					'conditions' => array("Contact.contact_account_id = ContactAccount.id") 
				)),
			), false);

			$this->paginate = array(
	            'conditions' => $conditions,
	            'order' => 'Contact.modified desc',
	            'limit' => 10,
	            'fields' => $fields
	        );
	        $contacts = $this->Paginate("Contact");
	        $this->set('contacts', $contacts);
	        // debug( $contacts );
		}
		$this->layout = 'ajax';

	}

	/**
	* Assign a lead to the selected company account
	*/
	function add_lead_company(){
		$this->loadModel("Contact");
		if ($this->request->is('post')) {
			// debug($this->request->data);
			$this->Contact->id = $this->request->data['contact_id'];
			$this->Contact->saveField("contact_account_id", $this->request->data['contact_acc_id']);
			$this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['contact_id']);
		}
		$this->autoRender = false;
	}

	public function autoaccount() {
    	$this->loadModel("ContactAccount");
        //if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
			$carNames = $this->ContactAccount->find('list', array('fields'=>array('name'),
				'conditions' => array(
					'ContactAccount.name LIKE' => '%'. trim($term) . '%'
				)
			));
			echo json_encode($carNames);
        //}
			$this->autoRender = false;
    }


    public function get_leads(){
    	$dealer_id = $this->Auth->User("dealer_id");

    	$this->layout = "ajax";

    	$this->loadModel("Contact");

    	$contact_account_id =  $this->request->query['contact_account_id'];
		$conditions = array('Contact.company_id' => $dealer_id, 'Contact.contact_account_id' => $contact_account_id, 'Contact.status <>' => 'Duplicate-Closed' );


		$fields = array(
			'Contact.id',
			'Contact.first_name',
			'Contact.last_name',
			'Contact.m_name',
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
			'Contact.created',
			'Contact.modified',
			'Contact.chk_duplicate',
			'Contact.contact_account_id',
			'Contact.dnc_status',
			'ContactAccount.id',
			'ContactAccount.name',
		);

		$this->Contact->unbindModel(array(
			'hasMany'=>array('Deal'),
		), false);

		$this->Contact->bindModel(array(
			'belongsTo'=>array('ContactAccount'=>array(
					'foreignKey' => false,
					'conditions' => array("Contact.contact_account_id = ContactAccount.id") 
				)),
		), false);

		$this->paginate = array(
            'conditions' => $conditions,
            'order' => 'Contact.modified desc',
            'limit' => 40,
            'fields' => $fields
        );
        $contacts = $this->Paginate("Contact");
        $this->set('contacts', $contacts);
        // debug( $contacts );

        $dealer_id = $this->Auth->User('dealer_id');
        $this->loadModel("ContactStatus");
        $custom_step_map = $this->ContactStatus->get_dealer_steps( $dealer_id , $this->Auth->User('step_procces'));
		$this->set('custom_step_map', $custom_step_map);


    }

     public function delete(){
    	$this->layout = 'ajax';
    	$contact_account_id = $this->request->query['contact_account_id'];
    	$this->ContactAccount->delete($contact_account_id);
    	$this->redirect(array('action' => 'index'));
    }

    function import_account(){
		$this->loadModel("ContactAccount");
    	$accs = $this->ContactAccount->query("select *  from imp_mccoy_fre_vehicle_sales_stage6 group by CusId");
		
		foreach($accs as $acc){
			// debug($acc);
			$acc_data = array( 'ContactAccount' => array(
				'dealer_id' => '41000',
				'user_id' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['CusId'],
				'name' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['CusName'],
				'address' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['CusAddr1'],
				'phone' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['CusPhone1'],
				'email' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['Email'],
				'created' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['created'],
				'modified' => $acc['imp_mccoy_fre_vehicle_sales_stage6']['modified']
			));
			// $this->ContactAccount->create();
			// $this->ContactAccount->save($acc_data);
		}	
		$this->autoRender = false;
    }

    /* 
	A function to remove a contact by setting the company_id to invalid-company_id
    */

    public function remove_contact($contact_id) {

		App::uses('Sanitize', 'Utility');

		$timezone = $this->Auth->user('zone');
		date_default_timezone_set($timezone);
		$datetimetext = date('Y-m-d H:i:s');

		$this->layout = 'ajax';
    	$params = array(
    		'recursive' => -1,
            'conditions' => array('Contact.id' => $contact_id),
        );
        $contact = $this->Contact->find('first', $params);
        $this->set('contact',$contact);
        //debug($contact);
        if ( $this->request->is('post')) {

        	$user_info = $this->Auth->User();

			$new_note = "sperson: ".$user_info['full_name']." <br> "." User ID: ".$user_info['id']."<br>";
        	$new_note .= $this->request->data['Contact']['notes']."<br> -- " .  $contact['Contact']['notes'];

        	//debug($new_note);

			$this->Contact->updateAll(
				array(
					'Contact.company_id' => "'". "invalid-".$contact['Contact']['company_id'] ."'",
					'Contact.notes' => "'".Sanitize::escape($new_note)."'",
					'Contact.modified' => "'".$datetimetext."'",
				),
				array('Contact.id' => $contact['Contact']['id'])
			);
        }
        echo 'Contact removed successfully';
        exit();


	}


















}