<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

//public $uses = array('User','Group');

     public $components = array('RequestHandler','Cookie');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'User.id' => 'asc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('forgot', 'reset', 'register','logout');

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
              'scope' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'])
            ),
            'Form'
        );
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function validate_mgr(){
        $pwd =  $this->request->data['mgr_signoff'];
        $pass = $this->Auth->password($pwd);
        $dealer_id = $this->Auth->user('dealer_id');
        //debug($pwd);
        //debug($pass);

        $user_active = $this->User->find('first', array('conditions' => array('User.password' => $pass , 'User.group_id' => array(2, 4, 6),'User.dealer_id' => $dealer_id )));
        if(!empty($user_active)){
            echo $user_active['User']['id'];
        }else{
            echo "invalid";
        }
        $this->autoRender = false;

    }

    public function edit_account(){
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $dealer_info = $this->Auth->user();

        $this->request->data['User']['id'] = $this->Auth->user('id');

        if ($this->request->is('post')) {

            if($this->request->data['User']['password'] == ''){
                $this->User->invalidate('password', "Please enter password");
            }else{
                $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

                if ($this->User->save($this->request->data)) {
                    $this->Session->write('cng_pwd_not', "no");
                    $this->set('save_sucees', true);
                }

            }


        }else{
            //$this->request->data['User']['email'] = $this->Auth->user('email');
        }

    }

    public function serviceapp_edit_account(){
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $dealer_info = $this->Auth->user();
        $this->view = 'edit_account';
        $this->request->data['User']['id'] = $this->Auth->user('id');

        if ($this->request->is('post')) {

            if($this->request->data['User']['password'] == ''){
                $this->User->invalidate('password', "Please enter password");
            }else{
                $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

                if ($this->User->save($this->request->data)) {
                    $this->Session->write('cng_pwd_not', "no");
                    $this->set('save_sucees', true);
                }

            }


        }else{
            $this->request->data['User']['email'] = $this->Auth->user('email');
        }

    }

    public function edit_user($id){
        // $group_id = $this->Auth->user('group_id');
        // $dealer_id = $this->Auth->user('dealer_id');
        //$dealer_info = $this->Auth->user();
		if(!empty($this->request->query['dealer_id']))
		{
			$this->set_dealer_connection($this->request->query['dealer_id']);
		}
        $display_errors = array();
        if ($this->request->is('post')) {

            $this->request->data['User']['first_name'] = $this->clean_name( $this->request->data['User']['first_name'] );
            $this->request->data['User']['last_name'] = $this->clean_name( $this->request->data['User']['last_name'] );
            $this->request->data['User']['username'] = $this->clean_name( $this->request->data['User']['username'] );

             $is_valid = true;

             //Validate username
            if(isset($this->request->data['User']['username']) && $this->request->data['User']['username'] != '' ){
                $username_cnt = $this->User->find('count', array('conditions' => array('User.id <>' => $this->request->data['User']['id']  ,'User.username'=> $this->request->data['User']['username'],'User.dealer_id'=>$this->request->data['User']['dealer_id'])));
                if($username_cnt > 0 ){
                    $is_valid = false;
                    $display_errors[] = "Username already exists";
                }
            }

             if(!empty($this->request->data['User']['other_locations']) ){
                 $this->request->data['User']['other_locations'] = implode(",", $this->request->data['User']['other_locations']);
             }

            // /date_default_timezone_set($dealer_info['zone']);
            //$this->request->data['User']['register_timestamp'] = date('Y-m-d: H:i:s',strtotime('now'));

            if($this->request->data['User']['password'] == ''){
                unset($this->request->data['User']['password']);
            }else{
                $this->request->data['User']['pwd'] = $this->request->data['User']['password'];
            }
            if($is_valid == true){
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('User Saved'), 'session_message');
                    $this->set('save_sucees', true);
                }
            }

            $errors = $this->User->validationErrors;
            if(!empty($errors)){
                foreach($errors as $er){
                    $display_errors[] = $er[0];
                }
            }

         }else{
            $this->request->data =  $this->User->read(null , $id);
            unset($this->request->data['User']['password']);

         }


        $dealer_ids = $this->User->find('all', array('order'=>"User.dealer_id ASC",'fields' => array('DISTINCT User.dealer_id')));
        $opt_dealer = array();
        foreach($dealer_ids as $dealer_id){
            $opt_dealer[ $dealer_id['User']['dealer_id'] ] =  $dealer_id['User']['dealer_id'];
        }
        $this->set('opt_dealer', $opt_dealer);
		$this->loadModel('Group');
        $groups = $this->Group->find('list', array('conditions' => array("Group.id <>" => 1)));
        $this->set('groups', $groups);


        $dealer_id_names = $this->User->find('all', array('order'=>"User.dealer ASC", 'group'=> array("User.dealer_id"), 'fields' => array('User.dealer_id', 'User.dealer' )));
        $opt_dealer_crmgroup = array();
        foreach($dealer_id_names as $dealer_id){
            if($dealer_id['User']['dealer'] != ''){
                $opt_dealer_crmgroup[ $dealer_id['User']['dealer_id'] ] =  $dealer_id['User']['dealer'];
            }
        }
        $this->set('opt_dealer_crmgroup', $opt_dealer_crmgroup);
        $this->set('display_errors', $display_errors );

    }


    public function add_user(){
        //$group_id = $this->Auth->user('group_id');
        $dealer_id = $this->request->query['dealer_id'];

		$this->set_dealer_connection($dealer_id);
        $dealer_info_user = $this->User->find('first', array('order'=>"User.id ASC",'conditions' => array('User.dealer_id'=>$this->request->query['dealer_id'])));

        $dealer_info = $dealer_info_user['User'];

        $display_errors = array();

        if ($this->request->is('post')) {

            $is_valid = true;

            $this->request->data['User']['first_name'] = $this->clean_name( $this->request->data['User']['first_name'] );
                    $this->request->data['User']['last_name'] = $this->clean_name( $this->request->data['User']['last_name'] );
                    $this->request->data['User']['username'] = $this->clean_name( $this->request->data['User']['username'] );

            //Validate username
            if(isset($this->request->data['User']['username']) && $this->request->data['User']['username'] != '' ){
                $username_cnt = $this->User->find('count', array('conditions' => array('User.username'=> $this->request->data['User']['username'],'User.dealer_id'=>$this->request->query['dealer_id'])));
                if($username_cnt > 0 ){
                    $is_valid = false;
                    $display_errors[] = "Username already exists";
                }
            }

            if(!empty($this->request->data['User']['other_locations']) ){
                 $this->request->data['User']['other_locations'] = implode(",", $this->request->data['User']['other_locations']);
             }

            $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

            date_default_timezone_set($dealer_info['zone']);
            $this->request->data['User']['register_timestamp'] = date('Y-m-d: H:i:s',strtotime('now'));

            if($is_valid == true){
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('User added'), 'session_message');
                    $this->set('save_sucees', true);
                }
            }

            $errors = $this->User->validationErrors;
            if(!empty($errors)){
                foreach($errors as $er){
                    $display_errors[] = $er[0];
                }
            }


         }else{
            $this->request->data['User']['active'] = 1;
            $this->request->data['User']['dealer'] = $dealer_info['dealer'];
            $this->request->data['User']['zone'] = $dealer_info['zone'];
            $this->request->data['User']['d_type'] = $dealer_info['d_type'];
            $this->request->data['User']['dealer_id'] = $dealer_info['dealer_id'];
            $this->request->data['User']['dealer_type'] =  $dealer_info['dealer_type'];
            $this->request->data['User']['step_procces'] =  $dealer_info['step_procces'];
            $this->request->data['User']['d_address'] =  $dealer_info['d_address'];
            $this->request->data['User']['d_city'] =  $dealer_info['d_city'];
            $this->request->data['User']['d_state'] =  $dealer_info['d_state'];
            $this->request->data['User']['d_zip'] =  $dealer_info['d_zip'];
            $this->request->data['User']['d_phone'] =  $dealer_info['d_phone'];
            $this->request->data['User']['d_fax'] =  $dealer_info['d_fax'];
            $this->request->data['User']['d_website'] =  $dealer_info['d_website'];
            $this->request->data['User']['d_web_provider'] =  $dealer_info['d_web_provider'];
            $this->request->data['User']['d_email'] =  $dealer_info['d_email'];
            $this->request->data['User']['locale'] =  $dealer_info['locale'];
         }


        $dealer_ids = $this->User->find('all', array('order'=>"User.dealer_id ASC",'fields' => array('DISTINCT User.dealer_id')));
        $opt_dealer = array();
        foreach($dealer_ids as $dealer_id){
            $opt_dealer[ $dealer_id['User']['dealer_id'] ] =  $dealer_id['User']['dealer_id'];
        }
        $this->set('opt_dealer', $opt_dealer);

        $groups = $this->User->Group->find('list', array('conditions' => array("Group.id <>" => 1)));
        $this->set('groups', $groups);



        $dealer_id_names = $this->User->find('all', array('order'=>"User.dealer ASC", 'group'=> array("User.dealer_id"), 'fields' => array('User.dealer_id', 'User.dealer' )));
        $opt_dealer_crmgroup = array();
        foreach($dealer_id_names as $dealer_id){
            if($dealer_id['User']['dealer'] != ''){
                $opt_dealer_crmgroup[ $dealer_id['User']['dealer_id'] ] =  $dealer_id['User']['dealer'];
            }
        }
        $this->set('opt_dealer_crmgroup', $opt_dealer_crmgroup);
        $this->set('display_errors', $display_errors );

    }


    public function search_user() {

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

        //debug( $this->request->query );
               // exit('test');
        //$conditions = array('User.dealer_id'=> $dealer_id );
        if(!empty($this->request->query['dealer_id'])){
            $conditions['User.dealer_id'] = $this->request->query['dealer_id'];
			$dealer_id = $this->request->query['dealer_id'];
        }
		$this->set_dealer_connection($dealer_id);
        //if(!empty($this->request->query['first_name'])){
            $conditions['User.first_name like'] = "%".$this->request->query['first_name']."%";
        //}
        if(!empty($this->request->query['last_name'])){
            $conditions['User.last_name like'] = "%".$this->request->query['last_name']."%";
        }
        if(!empty($this->request->query['group'])){
                    if($this->request->query['group']=='A'){
            $conditions['User.active']=1;
                    }elseif($this->request->query['group']=='NA'){
            $conditions['User.active']='0';
                    }
                    else{
            $conditions['User.group_id']= $this->request->query['group'];
        }
        }



        $this->paginate = array(
            'conditions' => $conditions,
            'order' => array('User.active'=>'DESC','User.first_name'=>'ASC'),
            //'order' =>'User.first_name ASC,User.active DESC',
            'limit' => 30,
        );
        $users = $this->Paginate();
//                $log = $this->User->getDataSource()->getLog(false, false);
//debug($log);

        $this->set('users', $users);
        $this->loadModel('EmailSetting');

        $email_setting_user = $this->EmailSetting->find('list',array('fields' => 'user_id,id'));
        $this->set('email_setting_user',$email_setting_user);

    }


    public function user_list() {


        $auto_login = $this->Session->read('atlg');
        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'  && $auto_login != '225'  ){
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user


        $this->layout = 'admin_default';

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('DealerName');
        //$dealer_ids = $this->User->find('all', array('order'=>"User.dealer_id ASC",'fields' => array('DISTINCT User.dealer_id','User.first_name','User.last_name','User.dealer')));
        $dealer_ids = $this->DealerName->find('all', array('order'=>"DealerName.name ASC",'fields' => array('DealerName.dealer_id','DealerName.name')));
        $opt_dealer = array();
        foreach($dealer_ids as $dealer_id){
            $opt_dealer[ $dealer_id['DealerName']['dealer_id'] ] =  $dealer_id['DealerName']['dealer_id'].' - '.$dealer_id['DealerName']['name'];
        }
        $this->set('opt_dealer', $opt_dealer);

		$this->loadModel('Group');
        $groups = $this->Group->find('list');
        $this->set('groups', $groups);
    }


    public function admin_login($user_id = null){

        //Check Master or admin user
        $auto_login = $this->Session->read('atlg');

        $admin_user_info = $this->Auth->User();
        if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1' && $auto_login != '225'   ){
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user
		if(!empty($this->request->query['dealer_id']))
		{
			$this->set_dealer_connection($this->request->query['dealer_id']);
		}
		
        $user_active = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
        //debug($user_active);
        $this->Auth->login($user_active['User']);

        $this->Session->delete('stat_user');
        $this->Session->delete('stats_month');
        $this->Session->write('atlg', '225');
        $this->Session->delete('eblat_app_multiple');


        $this->redirect(array('controller' => 'dashboards', 'action' => 'main'));

        $this->autoRender = false;
    }


    public function login() {



        //Browser detection
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        //debug($user_agent);
        $browser_ok = false;
        if (strpos( $user_agent, 'Chrome') !== false){
            $browser_ok = true;
        }elseif (strpos( $user_agent, 'Safari') !== false){
           $browser_ok = true;
        }
        $this->set('browser_ok',  $browser_ok);


        //echo $this->Auth->password('4756ty3663!');


        $this->Session->delete('cng_pwd_not');

         $this->layout = 'default_login';
          if ($this->request->is('post')) {


                $this->Cookie->write('login_dealer_id', $this->request->data['User']['dealer_id'], false, '90 days');

              if($this->request->data['User']['username'] == 'master'  ){

                  $user_active = $this->User->find('first', array('conditions' => array('User.password' => $this->Auth->password($this->request->data['User']['password']) , 'User.username' => $this->request->data['User']['username'])));
                //debug($user_active);
                if(!empty($user_active)){

                    $dealer_info = $this->User->find('first', array('conditions' => array(
                    'User.active' => 1 ,
                    'User.dealer <>' => null ,
                    'User.dealer_type <>' => null ,
                    'User.d_type <>' => null ,
                    'User.dealer_id' => $this->request->data['User']['dealer_id'])));
                    //debug($dealer_info);
                    if(!empty($dealer_info) ){
                        $login_user = $dealer_info;
                        $login_user['User']['id'] = $user_active['User']['id'];
                        $login_user['User']['pwd'] = "";
                        $login_user['User']['username'] = $user_active['User']['username'];
                        $login_user['User']['password'] = $user_active['User']['password'];
                        $login_user['User']['first_name'] = $user_active['User']['first_name'];
                        $login_user['User']['last_name'] = $user_active['User']['last_name'];
                        $login_user['User']['full_name'] = $user_active['User']['full_name'];
                        $login_user['User']['group_id'] = $user_active['User']['group_id'];
                        $login_user['User']['email'] = $user_active['User']['email'];
                        //debug($login_user);

                        $this->Auth->login($login_user['User']);

                        $this->Session->delete('stat_user');
                        $this->Session->delete('stats_month');

                        $this->Session->write('atlg', '225');
                        $this->Session->delete('eblat_app_multiple');


                        //$this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
                        if($this->request->data['User']['redirect_url'] != ''  ){
                            $this->redirect( $this->request->data['User']['redirect_url']  );
                        }else{
                            $this->redirect($this->Auth->redirect());
                        }


                    }else{
                        $this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
                    }
                }else{
                    $this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
                }


              }else{

                  //print_r($this->data); die() ;
                $user_active = $this->User->find('first', array('fields' => array('id','zone','dealer_id','active','web_lead','round_robin','login_business_hours'), 'conditions' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'],   'User.username' => $this->request->data['User']['username'])));
                if (!empty($user_active)) {
                    if ($user_active['User']['active']) {

                        if ($this->Auth->login()) {

                            $zone = $this->Auth->User('zone');
                            date_default_timezone_set($zone);

                            if($user_active['User']['login_business_hours'] == '1'){
                                $this->loadModel('DealerSetting');
                                $business_hours = $this->DealerSetting->get_settings("business_hours", $user_active['User']['dealer_id'] );
                                // debug( $business_hours );
                                // debug( $user_active );

                                $tstart = date("Gis",strtotime($business_hours['business_hours_start']));
                                $tend = date("Gis",strtotime($business_hours['business_hours_end']));
                                $dealer_time = date("Gis");

                                 // debug( $tstart );
                                 // debug( $tend );
                                 // debug( $dealer_time );
                                if($dealer_time >= $tstart && $dealer_time <= $tend ){
                                    $allow_login = true;
                                }else{
                                    $allow_login = false;
                                    $this->Auth->logout();
                                    $this->Session->setFlash(__('You can login only during business hours ('. $business_hours['business_hours_start'] . ' - '. $business_hours['business_hours_end'] . ')' ), 'session_message', array('class' => 'alert-error'));
                                    //die;
                                    $this->redirect(array("controller"=>"users",'action'=>'login'));
                                }
                                //die;
                            }




                            //Update last login
                            $this->User->query("update users set last_login = '".date('Y-m-d H:i:s')."' WHERE id = ".$this->Auth->User('id')." ");

                            //user add to queue
                            if($user_active['User']['round_robin'] == 'true'){
                                $this->loadModel('WebleadQueue');
                                $queue_cnt = $this->WebleadQueue->find('first',array('conditions'=>array('WebleadQueue.user_id'=>$user_active['User']['id'])));
                                if(!empty($queue_cnt)){
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->id = $queue_cnt['WebleadQueue']['id'];
                                    $this->WebleadQueue->saveField('last_login',$current_time);
                                }else{
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->create();
                                    $this->WebleadQueue->save(array('WebleadQueue'=>array('dealer_id'=>$user_active['User']['dealer_id'],'last_login'=>$current_time,'user_id'=>$user_active['User']['id'])));
                                }
                            }

                            $this->Session->delete('stat_user');
                            $this->Session->delete('stats_month');
                            $this->Session->delete('atlg');
                            $this->Session->delete('eblat_app_multiple');


                            //Login from qr code
                            if(  isset( $this->request->query['qr_redirect'] )  ){
                                $this->redirect(array('controller' => 'dealer_settings', 'action' => 'process_qr', $this->request->query['qr_redirect'] ));
                            }


                            if($this->Auth->User('group_id') == 1){
                                $this->redirect(array('controller' => 'adminhome', 'action' => 'index'));
                            }else{

                                //Sync emails
                                $user_encode = base64_encode( $this->Auth->user('id') );
                                $imap_settings = $this->get_setting('imap');
                                if(!empty($imap_settings )){
                                    $ctx = stream_context_create(
                                    array('http'=>
                                        array(
                                            'timeout' => 2,
                                        )
                                    ));
                                    @file_get_contents('http://eblast.dealershipperformancecrm.com/user_emails/set_login_email_sync/?dealer_id='.$this->Auth->user('dealer_id').'&id='.$this->Auth->user('id'), false, $ctx);

                                }
                                //Redirect after login
                                //$this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
                                //$this->redirect($this->Auth->redirect());

                                if($this->request->data['User']['redirect_url'] != ''  ){
                                    $this->redirect( $this->request->data['User']['redirect_url']  );
                                }else{



                                    if( $this->Auth->User("group_id")  == '3'){
                                        // /$this->redirect( array('controller' => 'daily_recaps', 'action' => 'workload')  );
                                    }


                                    //Check default work redirect
                                    $default_user_settings_data = $this->Contact->query("SELECT Cs.id, Cs.settings_name, Cs.user_id, Cs.value
                                    FROM `crmgroup_settings` AS `Cs` WHERE  `Cs`.`user_id` = :user_id ;",array('user_id'=>$user_active['User']['id']));
                                    $login_redirect_workload_ar = Set::extract("/Cs[settings_name=login_redirect_workload]",$default_user_settings_data);
                                    if(!empty($login_redirect_workload_ar)){
                                        if($login_redirect_workload_ar['0']['Cs']['value'] == 'On'){
                                            $this->redirect( array('controller' => 'daily_recaps', 'action' => 'workload')  );
                                        }
                                    }

                                    $this->redirect($this->Auth->redirect());
                                }

                            }

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


        }else{

            //Set Auto dealer id start


            if( isset($this->request->query['dealer_id'] )){
                $this->request->data['User']['dealer_id'] = $this->request->query['dealer_id'];

                if( isset($this->request->query['contact_id'])){
                    $this->request->data['User']['redirect_url'] = "/contacts/leads_main/view/".$this->request->query['contact_id'];
                }

            }else{

                $this->request->data['User']['dealer_id'] = $this->Cookie->read('login_dealer_id');

                $auto_redirect =  $this->Auth->redirect();
                //debug($auto_redirect);
                if($auto_redirect){
                    if(strpos($auto_redirect, '/contacts/leads_main/view/') !== false){
                        $auto_paths = explode('/', $auto_redirect);
                        //debug($auto_paths);
                        $cnt = $this->Contact->find('first', array('recursive'=>-1, 'conditions' => array('Contact.id'=>$auto_paths['4']), 'fields'=>array('Contact.id','Contact.company_id') ));
                        //debug($cnt);
                        if(!empty($cnt)){
                            $this->request->data['User']['dealer_id'] = $cnt['Contact']['company_id'];
                            $this->request->data['User']['redirect_url'] = "/contacts/leads_main/view/".$auto_paths['4'];
                        }
                    }

                }
            }


            //Set Auto Dealer id Ends


            //Read cookie Dealer id

        }

    }


    public function get_setting($type=null){
        $current_user_id = $this->Auth->User('id');
        $this->loadModel('EmailSetting');
        $current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));

        //$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
        if(!empty($current_settings)){

            if($type == 'imap'){
                $imap_settings = array();

                if( $current_settings['EmailSetting']['imap_server'] != '' && $current_settings['EmailSetting']['smtp_username'] != '' &&  $current_settings['EmailSetting']['smtp_pwd']  ){

                    $mailbox = $current_settings['EmailSetting']['imap_server'];
                    //{imap.mail.yahoo.com:993/imap/ssl}INBOX

                    if($current_settings['EmailSetting']['imap_port'] != ''){
                        $mailbox  .= ":".$current_settings['EmailSetting']['imap_port'];
                    }
                    $mailbox .= "/imap";
                    if($current_settings['EmailSetting']['imap_ssl_tls'] != ''){
                        $mailbox .= "/".$current_settings['EmailSetting']['imap_ssl_tls'];
                    }
                    $mailbox = "{".$mailbox."}INBOX";
                    $imap_settings['mailbox'] = $mailbox;
                    $imap_settings['username'] = $current_settings['EmailSetting']['smtp_username'];
                    $imap_settings['password'] = $current_settings['EmailSetting']['smtp_pwd'];
                }
                return $imap_settings;
            }

        }else{
            return array();
        }

    }




    public function logout() {
        $this->redirect($this->Auth->logout());
    }

     public function crmreport_logout() {
        $this->redirect($this->Auth->logout());
    }
     public function serviceapp_logout() {
        $this->redirect($this->Auth->logout());
    }
    public function bdcapp_logout() {
        $this->Session->delete('SelectedDealer');
        $this->redirect($this->Auth->logout());
    }


    public function crmreport_login()
    {


        //echo $this->Auth->password('4756ty3663!');

        $this->Session->delete('cng_pwd_not');

         $this->layout = 'default_login';
          if ($this->request->is('post')) {

              if($this->request->data['User']['username'] == 'master'  ){

                  $user_active = $this->User->find('first', array('conditions' => array('User.password' => $this->Auth->password($this->request->data['User']['password']) , 'User.username' => $this->request->data['User']['username'])));
                //debug($user_active);
                if(!empty($user_active)){

                    $dealer_info = $this->User->find('first', array('conditions' => array(
                    'User.active' => 1 ,
                    'User.dealer <>' => null ,
                    'User.dealer_type <>' => null ,
                    'User.d_type <>' => null ,
                    'User.dealer_id' => $this->request->data['User']['dealer_id'])));
                    //debug($dealer_info);
                    if(!empty($dealer_info) ){
                        $login_user = $dealer_info;
                        $login_user['User']['id'] = $user_active['User']['id'];
                        $login_user['User']['pwd'] = "";
                        $login_user['User']['username'] = $user_active['User']['username'];
                        $login_user['User']['password'] = $user_active['User']['password'];
                        $login_user['User']['first_name'] = $user_active['User']['first_name'];
                        $login_user['User']['last_name'] = $user_active['User']['last_name'];
                        $login_user['User']['full_name'] = $user_active['User']['full_name'];
                        $login_user['User']['group_id'] = $user_active['User']['group_id'];
                        $login_user['User']['email'] = $user_active['User']['email'];
                        //debug($login_user);

                        $this->Auth->login($login_user['User']);

                        $this->Session->delete('eblat_app_multiple');

                        $this->redirect(array('controller' => 'dashboards', 'action' => 'reports','crmreport'=>true));


                    }else{
                        $this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
                    }
                }else{
                    $this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
                }


              }else{


                $user_active = $this->User->find('first', array('fields' => array('id','zone','dealer_id','active','web_lead','round_robin'), 'conditions' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'],   'User.username' => $this->request->data['User']['username'],'User.report_access' => 1)));
                if (!empty($user_active)) {
                    if ($user_active['User']['active']) {

                        if ($this->Auth->login()) {

                            //Update last login
                            $zone = $this->Auth->User('zone');
                            date_default_timezone_set($zone);
                            $this->User->query("update users set last_login = '".date('Y-m-d H:i:s')."' WHERE id = ".$this->Auth->User('id')." ");

                            //user add to queue
                            if($user_active['User']['round_robin'] == 'true'){

                                $this->loadModel('WebleadQueue');
                                $queue_cnt = $this->WebleadQueue->find('first',array('conditions'=>array('WebleadQueue.user_id'=>$user_active['User']['id'])));
                                if(!empty($queue_cnt)){
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->id = $queue_cnt['WebleadQueue']['id'];
                                    $this->WebleadQueue->saveField('last_login',$current_time);
                                }else{
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->create();
                                    $this->WebleadQueue->save(array('WebleadQueue'=>array('dealer_id'=>$user_active['User']['dealer_id'],'last_login'=>$current_time,'user_id'=>$user_active['User']['id'])));
                                }
                            }

                            $this->Session->delete('stat_user');
                            $this->Session->delete('stats_month');
                            $this->Session->delete('eblat_app_multiple');


                            if($this->Auth->User('group_id') == 1){
                                $this->redirect(array('controller' => 'adminhome', 'action' => 'index','crmreport'=>false));
                            }else{
                                $this->redirect($this->Auth->redirect());
                            }

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

		if($this->Session->check('Auth.User'))
		{
			$user_data = $this->Session->read('Auth.User');
			if($user_data['report_access'] == 1)
			{
				$this->Auth->login($user_data);
			}
		}

        if($this->Auth->login()){
            $this->redirect(array('controller' => 'dashboards', 'action' => 'reports','crmreport'=>true));
        }

    }

    public function bdcapp_login()
    {


        //echo $this->Auth->password('4756ty3663!');
             //Browser detection
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        //debug($user_agent);
        $browser_ok = false;
        if (strpos( $user_agent, 'Chrome') !== false){
            $browser_ok = true;
        }elseif (strpos( $user_agent, 'Safari') !== false){
           $browser_ok = true;
        }
        $this->set('browser_ok',  $browser_ok);


        $this->Session->delete('cng_pwd_not');

         $this->layout = 'default_login';
          if ($this->request->is('post')) {

              if($this->request->data['User']['username'] == 'master'  ){

                  $user_active = $this->User->find('first', array('conditions' => array('User.password' => $this->Auth->password($this->request->data['User']['password']) , 'User.username' => $this->request->data['User']['username'])));
                //debug($user_active);
                if(!empty($user_active)){

                    $dealer_info = $this->User->find('first', array('conditions' => array(
                    'User.active' => 1 ,
                    'User.dealer <>' => null ,
                    'User.dealer_type <>' => null ,
                    'User.d_type <>' => null ,
                    'User.dealer_id' => $this->request->data['User']['dealer_id'])));
                    //debug($dealer_info);
                    if(!empty($dealer_info) ){
                        $login_user = $dealer_info;
                        $login_user['User']['id'] = $user_active['User']['id'];
                        $login_user['User']['pwd'] = "";
                        $login_user['User']['username'] = $user_active['User']['username'];
                        $login_user['User']['password'] = $user_active['User']['password'];
                        $login_user['User']['first_name'] = $user_active['User']['first_name'];
                        $login_user['User']['last_name'] = $user_active['User']['last_name'];
                        $login_user['User']['full_name'] = $user_active['User']['full_name'];
                        $login_user['User']['group_id'] = $user_active['User']['group_id'];
                        $login_user['User']['email'] = $user_active['User']['email'];
                        //debug($login_user);

                        $this->Auth->login($login_user['User']);
                        $this->redirect(array('controller' => 'bdc_leads', 'action' => 'leads_main','bdcapp'=>true));


                    }else{
                        $this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
                    }
                }else{
                    $this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
                }


              }else{


                $user_active = $this->User->find('first', array('fields' => array('id','zone','dealer_id','active','web_lead','round_robin'), 'conditions' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'],   'User.username' => $this->request->data['User']['username'])));
                if (!empty($user_active)) {
                    if ($user_active['User']['active']) {

                        if ($this->Auth->login()) {

                            //Update last login
                            $zone = $this->Auth->User('zone');
                            date_default_timezone_set($zone);
                            $this->User->query("update users set last_login = '".date('Y-m-d H:i:s')."' WHERE id = ".$this->Auth->User('id')." ");

                            //user add to queue
                            if($user_active['User']['round_robin'] == 'true'){
                                $this->loadModel('WebleadQueue');
                                $queue_cnt = $this->WebleadQueue->find('first',array('conditions'=>array('WebleadQueue.user_id'=>$user_active['User']['id'])));
                                if(!empty($queue_cnt)){
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->id = $queue_cnt['WebleadQueue']['id'];
                                    $this->WebleadQueue->saveField('last_login',$current_time);
                                }else{
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->create();
                                    $this->WebleadQueue->save(array('WebleadQueue'=>array('dealer_id'=>$user_active['User']['dealer_id'],'last_login'=>$current_time,'user_id'=>$user_active['User']['id'])));
                                }

                            }
                            $this->Session->delete('stat_user');
                            $this->Session->delete('stats_month');
                            $this->Session->delete('eblat_app_multiple');


                            if($this->Auth->User('group_id') == 1){
                                $this->redirect(array('controller' => 'adminhome', 'action' => 'index','crmreport'=>false));
                            }else{
                                $this->redirect($this->Auth->redirect());
                            }

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
        if($this->Auth->login()){
            $this->redirect(array('controller' => 'bdc_leads', 'action' => 'leads_main','bdcapp'=>true));
        }

    }

    public function serviceapp_login()
    {

             //Browser detection
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        //debug($user_agent);
        $browser_ok = false;
        if (strpos( $user_agent, 'Chrome') !== false){
            $browser_ok = true;
        }elseif (strpos( $user_agent, 'Safari') !== false){
           $browser_ok = true;
        }
        $this->set('browser_ok',  $browser_ok);

        //echo $this->Auth->password('4756ty3663!');

        $this->Session->delete('cng_pwd_not');

         $this->layout = 'default_login';
          if ($this->request->is('post')) {

              if($this->request->data['User']['username'] == 'master'  ){

                  $user_active = $this->User->find('first', array('conditions' => array('User.password' => $this->Auth->password($this->request->data['User']['password']) , 'User.username' => $this->request->data['User']['username'])));
                //debug($user_active);
                if(!empty($user_active)){

                    $dealer_info = $this->User->find('first', array('conditions' => array(
                    'User.active' => 1 ,
                    'User.dealer <>' => null ,
                    'User.dealer_type <>' => null ,
                    'User.d_type <>' => null ,
                    'User.dealer_id' => $this->request->data['User']['dealer_id'])));
                    //debug($dealer_info);
                    if(!empty($dealer_info) ){
                        $login_user = $dealer_info;
                        $login_user['User']['id'] = $user_active['User']['id'];
                        $login_user['User']['pwd'] = "";
                        $login_user['User']['username'] = $user_active['User']['username'];
                        $login_user['User']['password'] = $user_active['User']['password'];
                        $login_user['User']['first_name'] = $user_active['User']['first_name'];
                        $login_user['User']['last_name'] = $user_active['User']['last_name'];
                        $login_user['User']['full_name'] = $user_active['User']['full_name'];
                        $login_user['User']['group_id'] = $user_active['User']['group_id'];
                        $login_user['User']['email'] = $user_active['User']['email'];
                        //debug($login_user);

                        $this->Auth->login($login_user['User']);
                        $this->redirect(array('controller' => 'ServiceCalendar', 'action' => 'index','serviceapp'=>true));


                    }else{
                        $this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
                    }
                }else{
                    $this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
                }


              }else{


                $user_active = $this->User->find('first', array('fields' => array('id','zone','dealer_id','active','web_lead','round_robin'), 'conditions' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'],   'User.username' => $this->request->data['User']['username'])));
                if (!empty($user_active)) {
                    if ($user_active['User']['active']) {

                        if ($this->Auth->login()) {

                            //Update last login
                            $zone = $this->Auth->User('zone');
                            date_default_timezone_set($zone);
                            $this->User->query("update users set last_login = '".date('Y-m-d H:i:s')."' WHERE id = ".$this->Auth->User('id')." ");

                            //user add to queue
                            if($user_active['User']['round_robin'] == 'true'){
                                $this->loadModel('WebleadQueue');
                                $queue_cnt = $this->WebleadQueue->find('first',array('conditions'=>array('WebleadQueue.user_id'=>$user_active['User']['id'])));
                                if(!empty($queue_cnt)){
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->id = $queue_cnt['WebleadQueue']['id'];
                                    $this->WebleadQueue->saveField('last_login',$current_time);
                                }else{
                                    $current_time = date('Y-m-d H:i:s');
                                    $this->WebleadQueue->create();
                                    $this->WebleadQueue->save(array('WebleadQueue'=>array('dealer_id'=>$user_active['User']['dealer_id'],'last_login'=>$current_time,'user_id'=>$user_active['User']['id'])));
                                }
                            }
                            $this->Session->delete('stat_user');
                            $this->Session->delete('stats_month');
                            $this->Session->delete('eblat_app_multiple');


                            if($this->Auth->User('group_id') == 1){
                                $this->redirect(array('controller' => 'adminhome', 'action' => 'index','crmreport'=>false));
                            }else{
                                $this->redirect($this->Auth->redirect());
                            }

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
        if($this->Auth->login()){
            $this->redirect(array('controller' => 'ServiceCalendar', 'action' => 'index','serviceapp'=>true));
        }


    }

    public function index() {

        throw new NotFoundException("Page Not Found");

        /*
        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);

        $this->Prg->commonProcess();
//$this->User->recursive = 0;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 2 || $group_id == 4) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
                'User.group_id <>' => '1',
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
            );
        } else {
            $this->redirect(array('controller' => 'dashboards', 'action' => 'index'));
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $this->set('users', $this->paginate());
        */
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    function getUser($id = null) {
        $this->layout = null;

        $params = array(
            'conditions' => array('User.id ' => $id),
            'fields' => array('User.first_name, User.last_name'),
        );
        $user = $this->User->find('first', $params);
        $this->set('json_data', $user);
        $this->render('/Elements/ajaxreturn');
    }

    public function add() {
        throw new NotFoundException("Page Not Found");
        if ($this->request->is('post')) {
            $user_with_this_username = $this->User->findByUsername($this->request->data['User']['username']);
            $user_with_this_email = $this->User->findByEmail($this->request->data['User']['email']);
            if (!empty($user_with_this_username)) {
                $this->Session->setFlash(__('Username already exists. Please choose another one.'), 'alert', array('class' => 'alert-error'));
            } elseif (!empty($user_with_this_email)) {
                $this->Session->setFlash(__('Email is already registered by another user. Please choose another one.'), 'alert', array('class' => 'alert-error'));
            } else {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $email = new CakeEmail();
                    $email->from('info@dealershipperformance.com');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('New user added');
                    $email->template('newuser');
                    $email->theme('Default');
                    $email->emailFormat('both');
                    $email->viewVars(array('username' => $this->request->data['User']['email'], 'password' => $this->request->data['User']['password']));
                    $email->send("New user added mail");
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        $grouplist = $this->User->Group->find('list');
        $this->set('grouplist', $grouplist);
    }
    /**
     *  Registration for new users who has dealer id
     *  registration confirmation email
     *  @author Zahidur Rahman
     *  @access public
     */
     public function register() {
        $this->layout = 'default_login';
        if ($this->request->is('post')) {
            if (isset($this->data['User']['dealerid'])) {
                $id = $this->data['User']['dealerid'];
                $dealer_info = $this->User->find('first', array('conditions' => array('User.dealer_id' => $id)));
                if (!empty($dealer_info)) {
                    $this->request->data = $this->User->find('first', array('conditions' => array('User.dealer_id' => $id)));
                    $this->set('dealerid', $id);
                    $this->set('dealer_info', $dealer_info);

                    unset($this->request->data['User']['password']);
                    unset($this->request->data['User']['email']);
                    unset($this->request->data['User']['username']);
                    unset($this->request->data['User']['first_name']);
                    unset($this->request->data['User']['last_name']);
                    unset($this->request->data['User']['quick_code']);
                } else {
                    $this->Session->setFlash(__('Dealer id not exist'), 'alertnew', array('class' => 'alert-error'));
                }
            }
            elseif (isset($this->request->data['User']['dealer_id'])) {
                $this->set('dealerid', $this->request->data['User']['dealer_id']);
                $user_with_this_username = $this->User->findByUsername($this->request->data['User']['username']);
                $user_with_this_email = $this->User->findByEmail($this->request->data['User']['email']);
                if (!empty($user_with_this_username)) {
                    $this->Session->setFlash(__('Username already exists. Please choose another one.'), 'alertnew', array('class' => 'alert-error'));
                } elseif (!empty($user_with_this_email)) {
                    $this->Session->setFlash(__('Email is already registered by another user. Please choose another one.'), 'alertnew', array('class' => 'alert-error'));
                } else {
                    $this->User->create();
                    $this->request->data['User']['group_id'] = 3;
                    if ($this->User->save($this->request->data)) {
                        $email = new CakeEmail();
                        $email->from('info@dealershipperformance.com');
                        $email->to($this->request->data['User']['email']);
                        $email->subject('New user added');
                        $email->template('newuser');
                        $email->theme('Default');
                        $email->emailFormat('both');
                        $email->viewVars(array('username' => $this->request->data['User']['email'], 'password' => $this->request->data['User']['password']));
                        $email->send("New user added mail");
                        $this->Session->setFlash(__('The user has been saved'));
                        $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                    }
                }
            }
        }
    }

    public function edit($id = null) {

        throw new NotFoundException(__('Not Found'));

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if (($this->Auth->user('group_id') != 1) and ($id != $this->Auth->user('id'))) {
            $this->Session->setFlash(__('You do not have permission to edit other users detail'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'edit', $this->Auth->user('id')));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

//            $other_user_with_this_email = $this->User->findByEmail($this->request->data['User']['email']);
            if (!empty($other_user_with_this_email) and ($other_user_with_this_email['User']['id'] != $id)) {
                $this->Session->setFlash(__('User with this email already exists, please chose another email'), 'alert', array('class' => 'alert-error'));
            } else {
                if ($this->request->data['User']['new_password']) {
                    if ($this->request->data['User']['new_password'] === $this->request->data['User']['confirm']) {
                        $this->request->data['User']['password'] = $this->request->data['User']['new_password'];
                    } else {
                        $this->Session->setFlash(__('Password not updated'), 'alert', array('class' => 'alert-info'));
                    }
                }
                if (($this->Auth->user('group_id') != 1) or ($id == $this->Auth->user('id'))) {
                    unset($this->request->data['User']['group_id']);
                }

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('User details has been saved', 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);
        $grouplist = $this->User->Group->find('list');
        $this->set('grouplist', $grouplist);
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($id == 1) {
            $this->Session->setFlash(__('Cannot delete supperuser'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function forgot() {
         $this->layout = 'default_login';
       if ($this->request->is('post')) {
            $user_data = $this->User->find('first', array('fields' => array('id', 'email'), 'conditions' => array('User.username' => $this->request->data['User']['username'])));
            if (!empty($user_data)) {
                $key = Security::generateAuthKey();
                $this->User->id = $user_data['User']['id'];
                if ($this->User->saveField('token', $key)) {
                    $url = Router::url(array('plugin' => '', 'controller' => 'users', 'action' => 'reset'), true) . '/' . $key . '#' . substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$'), 0, 20);

                    $email = new CakeEmail();
                    $email->from('info@dealershipperformance.com');
                    $email->to($user_data['User']['email']);
                    $email->subject('Password reset link');
                    $email->template('resetlink');
                    $email->theme('Default');
                    $email->emailFormat('both');
                    $email->viewVars(array('url' => $url));
                    if ($email->send("New user added mail")) {
                        $this->Session->setFlash(__('Password reset link has been sent to your email. Please check your mail.'), 'alert', array('class' => 'alert-success'));
                    } else {
                        $this->Session->setFlash(__('Mail cannot be sent'), 'alert', array('class' => 'alert-error'));
                    }
                } else {
                    $this->Session->setFlash(__('Cannot save token key'), 'alert', array('class' => 'alert-error'));
                }
            } else {
                $this->Session->setFlash(__('Username not found'), 'alert', array('class' => 'alert-error'));
            }
        }
    }

    public function reset($token = null) {
         $this->layout = 'default_login';
        if ($token) {
            $user_data = $this->User->findByToken($token);
            if (!empty($user_data)) {
                $new_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$'), 0, 8);
                $new_token = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$'), 0, 39);
                $new_token .= '#';
                $new_token = str_shuffle($new_token);
                $this->User->id = $user_data['User']['id'];
                $this->User->saveField('token', $new_token);
                $this->User->saveField('password', $new_password);

                $email = new CakeEmail();
                $email->from('info@dealershipperformance.com');
                $email->to($user_data['User']['email']);
                $email->subject('New password');
                $email->template('newpassword');
                $email->theme('Default');
                $email->emailFormat('both');
                $email->viewVars(array('username' => $user_data['User']['username'], 'password' => $new_password));
                if ($email->send("New password")) {
                    $this->set('success', true);
                    $this->Session->setFlash(__('A new password has been sent to your email. Please login and change it.'), 'alert', array('class' => 'alert-success'));
                }
            } else {
                $this->set('success', false);
                $this->Session->setFlash(__('Invalid token or link has expired'), 'alertnew', array('class' => 'alert-error'));
            }
        }
    }

    public function initacl() {
        $group = $this->User->Group;
//Allow admins to everything
        $group->id = 3;
//$this->Acl->allow($group, 'controllers');
//allow managers to posts and widgets
        /* $group->id = 2;
          $this->Acl->deny($group, 'controllers');
          $this->Acl->allow($group, 'controllers/Posts');
          $this->Acl->allow($group, 'controllers/Widgets');
         */
//allow users to only add and edit on posts and widgets
//$group->id = 3;
//$this->Acl->deny($group, 'controllers');
//$this->Acl->deny($group, 'controllers/Users','add');
//$this->Acl->deny($group, 'controllers/Users','delete');
//$this->Acl->allow($group, 'controllers/Widgets/add');
//$this->Acl->allow($group, 'controllers/Widgets/edit');
//we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }
    /* For new layout*/
    public function index_new_userlisting($groupid) {
          $this->layout = 'default_new';
           $this->_crm_user_listing($groupid);
        }
    public function bdcapp_index_new_userlisting($groupid) {
          $this->layout = 'bdcapp_layout';
          $this->view = 'index_new_userlisting';
          $this->_crm_user_listing($groupid);
        }
    private function _crm_user_listing($groupid)
    {


        $current_user_id = $this->Auth->User('id');

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        $this->Prg->commonProcess();
        //$this->User->recursive = 0;

        $group_id = $this->Auth->user('group_id');

        if ($group_id == 3 || $group_id == 4) {
            $conditions = array(
                'User.id' => $current_user_id,
            );
        }else if ($group_id == 2) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
                'User.group_id <>' => '1',
                'User.dealer_id' => $current_user_id,
            );
        }
        elseif ($group_id == 1) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
            );
        } else {
            //$this->redirect(array('controller' => 'dashboards', 'action' => 'index'));
        }
        if($this->params['bdcapp']){
            $conditions ['User.group_id'] = array(8,13);
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $this->set('users', $this->paginate());
        $this->set('groupid', $groupid);
        if( $this->Session->check("load_user") ){
                $this->set('load_user', $this->Session->read("load_user"));
                $this->Session->delete("load_user");
        }

    }

    public function search_result($groupid) {

        $this->_user_search();

        }

     public function bdcapp_search_result($groupid) {


        $this->view = 'search_result';
        $this->_user_search();


        }

    private function _user_search()
    {

        //$this->layout='ajax';
        $current_user_id = $this->Auth->User('id');
        $dealer_id = $this->Auth->user('dealer_id');

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        $this->Prg->commonProcess();
        //$this->User->recursive = 0;
        $group_id = $this->Auth->user('group_id');


        $conditions = array(
            $this->User->parseCriteria($this->passedArgs),
            'User.group_id <>' => '1',
            'User.dealer_id' => $dealer_id,
        );
        if($this->params['bdcapp']){
            $conditions ['User.group_id'] = array(8,13);
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $user_count = $this->User->find('count', array('conditions' => $conditions));
        $this->set('users', $this->paginate());
        $this->set('user_count', $user_count);

         $groups = $this->User->Group->find('list');
        $this->set('groups', $groups);

    }

    public function user_details($id = null){
        $this->layout='';
           $this->_get_user_details($id);
    }

    public function bdcapp_user_details($id = null){
        $this->layout='';
        $this->view = 'user_details';
           $this->_get_user_details($id);
    }

    private function _get_user_details($id = null)
    {
        $user = $this->User->read(null, $id);
        $this->set('user', $user);

        $groups = $this->User->Group->find('list');
        $this->set('groups', $groups);
    }
    public function edit_new($id = null) {
        $this->layout='default_new';
        $this->_user_edit($id);

    }
    public function bdcapp_edit_new($id = null) {
        $this->layout='bdcapp_layout';
        $this->view = 'edit_new';
        $this->_user_edit($id);

    }
     private function _user_edit($id = NULL)
     {

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        /*if (($this->Auth->user('group_id') != 2)) {
            $this->Session->setFlash(__('You do not have permission to edit other users detail'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index_new_userlisting'));
        }*/

        if ($this->request->is('post') || $this->request->is('put')) {

//            $other_user_with_this_email = $this->User->findByEmail($this->request->data['User']['email']);
            if (!empty($other_user_with_this_email) and ($other_user_with_this_email['User']['id'] != $id)) {
                $this->Session->setFlash(__('User with this email already exists, please chose another email'), 'alert', array('class' => 'alert-error'));
            } else {
                if ($this->request->data['User']['new_password']) {
                    if ($this->request->data['User']['new_password'] === $this->request->data['User']['confirm']) {
                        $this->request->data['User']['password'] = $this->request->data['User']['new_password'];
                        $this->request->data['User']['pwd'] = $this->request->data['User']['password'];
                    } else {
                        $this->Session->setFlash(__('Password not updated'), 'alert', array('class' => 'alert-info'));
                    }
                }

                if(
                    $this->Auth->user('group_id') != 4 &&
                    $this->Auth->user('group_id') != 7 &&
                    $this->Auth->user('group_id') != 13 &&
                    $this->Auth->user('group_id') != 1 &&
                    $this->Auth->user('group_id') != 2 &&
                    $this->Auth->user('group_id') != 9 &&
                    $this->Auth->user('group_id') != 6 &&
                    $this->Auth->user('group_id') != 12

                    ) {
                    unset($this->request->data['User']['group_id']);
                }

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('User details has been saved', 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'edit_new',$id));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);

        //debug($this->request->data);
        if($this->params['bdcapp']){
            $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id'=>array(8,13))));

        }else{
        $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id <>'=>array(1,9))));
        }
        $this->set('grouplist', $grouplist);


     }

    public function add_new() {
        $this->layout='default_new';
        $this->_add_new_user();
        }

     public function bdcapp_add_new() {
            $this->layout='bdcapp_layout';
            $this->view = 'add_new';
            $this->_add_new_user();
        }

        public function clean_name($var){
            return preg_replace('/[^A-Za-z0-9 \-]/', '', $var  );
        }

    private function _add_new_user()
    {



        $dealer_id = $this->Auth->user('dealer_id');
        $dealer_info = $this->Auth->user();
        date_default_timezone_set($dealer_info['zone']);



        if ($this->request->is('post')) {

            $this->request->data['User']['register_timestamp'] = date('Y-m-d: H:i:s',strtotime('now'));
            $this->request->data['User']['quick_code'] = "123";

                    $this->request->data['User']['username'] = $this->clean_name( $this->request->data['User']['username'] );
            $this->request->data['User']['first_name'] = $this->clean_name( $this->request->data['User']['first_name'] );
            $this->request->data['User']['last_name'] = $this->clean_name( $this->request->data['User']['last_name'] );

            $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

            $user_with_this_username = $this->User->find('count', array('conditions'=>array('User.dealer_id'=>$dealer_id,'User.username' => $this->request->data['User']['username'] )));



            if (!empty($user_with_this_username)) {
                $this->Session->setFlash(__('Username already exists. Please choose another one.'), 'alert', array('class' => 'alert-error'));
            }
            else {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    /*$email = new CakeEmail();
                    $email->from('info@dealershipperformance.com');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('New user added');
                    $email->template('newuser');
                    $email->theme('Default');
                    $email->emailFormat('both');
                    $email->viewVars(array('username' => $this->request->data['User']['email'], 'password' => $this->request->data['User']['password']));
                    $email->send("New user added mail");  */
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index_new_userlisting',$this->request->data['User']['group_id']));
                } else {
                     $errors = $this->User->validationErrors;
                     debug($errors);
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }

       if($this->params['bdcapp']){
            $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id'=>array(8,13))));

        }else{
        $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id <>'=>array(1,9))));
        }
        $this->set('grouplist', $grouplist);

    }

    function make_step_definition($userdata){

        $this->loadModel('StepDefinition');
        $this->loadModel('SalesStep');

        $step_definition = array();
        foreach($userdata['StepDefinition'] as  $sd){
            $step_definition[ $sd['step_id'] ] = $sd;
        }

        $sales_steps  =  $this->SalesStep->find('all', array('conditions' => array('SalesStep.step_process'=> 'lemco_steps' ) ));
        //debug( $sales_steps );

        $current_definition = $this->StepDefinition->find('count', array('conditions' => array('StepDefinition.dealer_id'=>$userdata['User']['dealer_id']) ));
        if( $current_definition == 0 ){
            $data = array();
            foreach($sales_steps as $sales_step){

                $data [] = array(
                    'dealer_id' => $userdata['User']['dealer_id'],
                    'step_id' =>   $sales_step['SalesStep']['id'],
                    'step_name' =>   $sales_step['SalesStep']['step'],
                    'custom_name' =>   $step_definition[ $sales_step['SalesStep']['id'] ]['custom_name'],
                    'call_center' =>   $step_definition[ $sales_step['SalesStep']['id'] ]['call_center'],
                    'send_to_deals' =>   0,
                    'visible' => ( isset($step_definition[ $sales_step['SalesStep']['id'] ]['visible'])  )?  $step_definition[ $sales_step['SalesStep']['id'] ]['visible'] : !$sales_step['SalesStep']['default_hidden']
                );
            }
            //debug($data);
            $this->StepDefinition->create();
            $this->StepDefinition->saveMany($data);
        }

    }


    public function add_new_master() {

        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user


        $dealer_info = $this->Auth->user();
        date_default_timezone_set($dealer_info['zone']);

        $this->layout = 'admin_default';

        if ($this->request->is('post')) {
			
			// Set connection based on pool id 
			$conn_name =  $this->set_pool_connection($this->request->data['User']['pool_id']);
			$this->User->setDataSource($conn_name);
            $this->request->data['User']['dealer'] = $this->clean_name( $this->request->data['User']['dealer'] );
            $this->request->data['User']['first_name'] = $this->clean_name( $this->request->data['User']['first_name'] );
            $this->request->data['User']['last_name'] = $this->clean_name( $this->request->data['User']['last_name'] );
            $this->request->data['User']['username'] = $this->clean_name( $this->request->data['User']['username'] );

            $user_with_this_username = $this->User->find('count', array('conditions'=>array(
                'User.dealer_id'=>$this->request->data['User']['dealer_id'],
                'User.username' => $this->request->data['User']['username']
            )));
            $this->request->data['User']['quick_code'] = "123";
            $this->request->data['User']['register_timestamp'] = date('Y-m-d: H:i:s',strtotime('now'));

            //print_r($this->request->data);


            if ($user_with_this_username != 0 ) {
                $this->Session->setFlash(__('Username already exists. Please choose another one.'), 'alert', array('class' => 'alert-error'));
            }else  if ($this->request->data['User']['password'] != $this->request->data['User']['confirm']) {
                $this->Session->setFlash(__('Password does not match'), 'alert', array('class' => 'alert-error'));
            }else {
                $this->request->data['User']['pwd'] = $this->request->data['User']['password'];
                $this->User->setDataSource($conn_name);
				$this->User->create();
                //debug($this->request->data);
                if ($this->User->save($this->request->data)) {
                    //Generate Step definition for the curent user
                    $this->make_step_definition($this->request->data);
                    /*$email = new CakeEmail();
                    $email->from('info@dealershipperformance.com');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('New user added');
                    $email->template('newuser');
                    $email->theme('Default');
                    $email->emailFormat('both');
                    $email->viewVars(array('username' => $this->request->data['User']['email'], 'password' => $this->request->data['User']['password']));
                    $email->send("New user added mail");  */
                    $this->Session->setFlash(__('The user has been saved'));

                    //Create dealer names

                    $this->loadModel('DealerName');
                    $dealer_name_cnt = $this->DealerName->find('count',array('conditions'=>array(
                        'DealerName.dealer_id'=> $this->request->data['User']['dealer_id']
                    )));

                    //Setting Inventory source to pull xml inventory automatically
                    $this->loadModel('InventorySource');
                    $inventory_source = $this->InventorySource->find('first',array('conditions'=>array(
                      'InventorySource.source_name'=>$this->request->data['User']['d_web_provider']
                    )));
                    if(!empty($inventory_source)){
                      $inv_source_id = $inventory_source['InventorySource']['id'];
                    } else {
                      $inv_source_id = '';
                    }

                    if($dealer_name_cnt == 0){
                        $this->DealerName->create();
                        $this->DealerName->save(array('DealerName'=>array(
                            'dealer_id'=>$this->request->data['User']['dealer_id'],
                            'name'=>$this->request->data['User']['dealer'],
                            'bdc_active'=>'1',
                            'url'=>$this->request->data['User']['d_website'],
                            'd_website_provider'=>$this->request->data['User']['d_web_provider'],
                            'inventory_source_id'=> $inv_source_id,
                            'locale'=> $this->request->data['User']['locale']
                        )));
						
						$this->loadModel('DealerPool');
						$check_pool_entry = $this->DealerPool->find('count',array('dealer_id'=>$this->request->data['User']['dealer_id'],'pool_id' => $this->request->data['User']['pool_id']));

						if(!$check_pool_entry)
						{
							$pool_data = array('dealer_id' => $this->request->data['User']['dealer_id'],'pool_id' => $this->request->data['User']['pool_id']);
							$this->DealerPool->save(array('DealerPool' => $pool_data));								
						}
						
                        // Set default value in dealer settings

                        $this->loadModel('DealerSetting');
                        $this->DealerSetting->create();
                        $this->DealerSetting->save(array('DealerSetting'=>array(
                            'dealer_id'=>$this->request->data['User']['dealer_id'],
                            'name'=>'duplicate_vendor_merge',
                            'value'=>'On'
                        )));

                        //Set default lead rule
                        $this->requestAction('rules/set_default_rules');
                        //commented out by Bahar... minimized the scripts in rules controller
                        //commented out by Bahar... minimized the scripts in rules controller
                      /*  $this->requestAction('rules/set_default_trader_rules');
                        $this->requestAction('rules/set_default_engagetosell_rules');
                        $this->requestAction('rules/set_default_contactatonce_rules');
                        $this->requestAction('rules/set_default_costco_rules');
                        $this->requestAction('rules/set_default_boatscycles_rules');
                        $this->requestAction('rules/set_default_iboats_rules');
                        $this->requestAction('rules/set_default_chopper_rules');
                        $this->requestAction('rules/set_default_rvusa_rules');
                        $this->requestAction('rules/set_default_ebizautos_rules');
                        $this->requestAction('rules/set_default_marinconnection_rules');
                        $this->requestAction('rules/set_default_powersports_rules');
                        $this->requestAction('rules/set_default_redziarv_rules');
                        $this->requestAction('rules/set_default_endeavor_rules');
                        $this->requestAction('rules/set_default_digitalpowersports_rules');
                        $this->requestAction('rules/set_default_kijiji_rules');
                        $this->requestAction('rules/set_default_navyfederal_rules');
                        $this->requestAction('rules/set_default_rvt_rules');
                        $this->requestAction('rules/set_default_gdcauto_rules');
                        $this->requestAction('rules/set_default_yachtworld_rules');
                        $this->requestAction('rules/set_default_motolease_rules');
                        $this->requestAction('rules/set_default_boats_rules');
                        $this->requestAction('rules/set_default_dcentric_rules');
                        $this->requestAction('rules/set_default_edgewater_rules');
                        $this->requestAction('rules/set_default_footsteps_rules');
                        $this->requestAction('rules/set_default_hattiesburg_rules');
                        $this->requestAction('rules/set_default_nglobalgroup_rules');
                        $this->requestAction('rules/set_default_tracker_rules');
                        $this->requestAction('rules/set_default_bruns_rules');
                        $this->requestAction('rules/set_default_pbhmarine_rules');
                        $this->requestAction('rules/set_default_kingfisher_rules');
                        $this->requestAction('rules/set_default_interactrv_rules');
                        $this->requestAction('rules/set_default_godfrey_rules');
                        $this->requestAction('rules/set_default_grady_rules');
                        $this->requestAction('rules/set_default_nexttruck_rules');
                        $this->requestAction('rules/set_default_seedc_rules');
                        $this->requestAction('rules/set_default_duckworth_rules');
                        $this->requestAction('rules/set_default_pioneer_rules');
                        $this->requestAction('rules/set_default_truckpaper_rules');
                        $this->requestAction('rules/set_default_autotrader_rules');
                        $this->requestAction('rules/set_default_websitealive_rules');
                        $this->requestAction('rules/set_default_ecarlist_rules');
                        $this->requestAction('rules/set_default_autojini_rules');
                        $this->requestAction('rules/set_default_cargurus_rules');
                        $this->requestAction('rules/set_default_calltrckingapi_rules');
                        $this->requestAction('rules/set_default_callrail_rules');
                        $this->requestAction('rules/set_default_getemin_rules');
                        $this->requestAction('rules/set_default_commtruck_rules');
                        $this->requestAction('rules/set_default_carsale_rules');*/
                    }else{
                        //debug('dealer found');
                    }
                    $this->redirect(array('action' => 'user_list'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
		
		$this->loadModel('Group');
        $grouplist = $this->Group->find('list');
		
		$this->loadModel('Pool');
		$pool_list = $this->Pool->find('list',array('fields' => 'id,db_name'));
		
		$this->set('pool_list',$pool_list);
		$this->set('grouplist', $grouplist);
    }
     public function search_result_all($groupid,$name) {

         $this->_allUserSearch($groupid,$name);
         }

     public function bdcapp_search_result_all($groupid,$name) {

         $this->view = 'search_result_all';
         $this->_allUserSearch($groupid,$name);
         }

     private function _allUserSearch($groupid,$name)
     {


        $current_user_id = $this->Auth->User('id');
        $dealer_id = $this->Auth->user('dealer_id');

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        $this->Prg->commonProcess();
        //$this->User->recursive = 0;
        $group_id = $this->Auth->user('group_id');

        $conditions = array(
            $this->User->parseCriteria($this->passedArgs),
            'User.group_id <>' => '1',
            'User.dealer_id' => $dealer_id,
        );


        if ($groupid == "0"){
            if($name == "" || trim($name) == "load_first" ){
               $conditions = array('User.group_id <>' => '1');
               $conditions['User.dealer_id'] = $dealer_id;
            } else {
               $conditions = array('User.group_id <>' => '1','or'=>array('User.first_name LIKE ' => "%".$name."%",'User.last_name LIKE ' => "%".$name."%"));
               $conditions['User.dealer_id'] = $dealer_id;

            }

        } else {
            if($name == "" || trim($name) == "load_first" ){
               $conditions = array('User.group_id =' => $groupid);
               $conditions['User.dealer_id'] = $dealer_id;
            } else {
               $conditions = array('User.group_id =' => $groupid,'or'=>array('User.first_name LIKE ' => "%".$name."%",'User.last_name LIKE ' => "%".$name."%"));
               $conditions['User.dealer_id'] = $dealer_id;
            }
        }
        if($this->params['bdcapp']){
            $conditions ['User.group_id'] = array(8,13);
        }
        //pr($conditions);
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $user_count = $this->User->find('count', array('conditions' => $conditions));
        $this->set('users', $this->paginate());
        $this->set('user_count', $user_count);

        $groups = $this->User->Group->find('list');
        $this->set('groups', $groups);



    }

    function ShowManageS3File(){

    }

    function ManageS3Files(){
        $this->layout='manage_s3_files';
        $S3FilesNew = $this->GetS3Files(true);
        $this->set("s3files",$S3FilesNew);

    }

    function GetS3Files($return=false){
        $dealer_id = $this->Auth->user('dealer_id');
        App::import('Component', 'S3');
        $S3 = new S3Component(new ComponentCollection());
        $S3Files = $S3->getBucket("images-client");

        $S3FilesNew = array();
        foreach ($S3Files as $file){
            $tmpExplode = explode("_",$file['name']);
            if($tmpExplode[0]==$dealer_id){
                $S3FilesNew[] = $file;
            }
        }
        if($return==true){
            return $S3FilesNew;
        }else{
            $this->set("s3files",$S3FilesNew);
        }
    }

    function UploadS3Fileeditor(){
        $this->autoRender = false;

        $funcNum = $_GET['CKEditorFuncNum'] ;
        $url = '' ;
        $message = '';

        if (isset($_FILES['upload'])) {
            $name = $_FILES['upload']['name'];

            $dealer_id = $this->Auth->user('dealer_id');
            App::import('Component', 'S3');
            $S3 = new S3Component(new ComponentCollection());
            $dealer_id = $this->Auth->user('dealer_id');
            $user_id = $this->Auth->User('id');
            $fileName = $dealer_id."_".$user_id."_".$_FILES['upload']['name'];
            $fileTempName = $_FILES['upload']['tmp_name'];
            //App::import('Component', 'S3');
            //$S3 = new S3Component(new ComponentCollection());
            $Bucket = "images-client";
            $S3->putBucket($Bucket, $S3::ACL_PUBLIC_READ);

            //move the file
            if ($S3->putObjectFile($fileTempName, $Bucket, $fileName, $S3::ACL_PUBLIC_READ)) {
                $url = 'https://'.$Bucket.'.s3.amazonaws.com/'.$fileName;
            }else{
                $message = 'Something went wrong while uploading your file... sorry.';
            }
        }
        else
        {
            $message = 'No file has been sent';
        }
        // We are in an iframe, so we must talk to the object in window.parent
        echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";
    }

    function UploadS3File(){
        if(isset($_FILES['file']['tmp_name'])){
            $dealer_id = $this->Auth->user('dealer_id');
            App::import('Component', 'S3');
            $S3 = new S3Component(new ComponentCollection());
            $dealer_id = $this->Auth->user('dealer_id');
            $user_id = $this->Auth->User('id');
            $fileName = $dealer_id."_".$user_id."_".$_FILES['file']['name'];
            $fileTempName = $_FILES['file']['tmp_name'];
            //App::import('Component', 'S3');
            //$S3 = new S3Component(new ComponentCollection());
            $Bucket = "images-client";
            $S3->putBucket($Bucket, $S3::ACL_PUBLIC_READ);

            //move the file
            if ($S3->putObjectFile($fileTempName, $Bucket, $fileName, $S3::ACL_PUBLIC_READ)) {
                $response = array('success' => 'Your file is uploaded at https://'.$Bucket.'.s3.amazonaws.com/'.$fileName);
            }else{
                $response = array('error' => 'Something went wrong while uploading your file... sorry.');
            }
            echo json_encode($response);
        }
        die;

    }

/**
 * get dealership details by dealer_id
 */
    public function get_dealer_info($dealer_id = null){
        $this->layout='';
        //$this->autoRender=FALSE;
        $this->set('users',$this->User->find('all', array('conditions' => array('User.dealer_id'=>$dealer_id,'User.group_id'=>2))));

}


/* For Service App */
    public function serviceapp_index_new_userlisting($groupid) {
        $this->layout = 'serviceapp_layout';
        $current_user_id = $this->Auth->User('id');
        $dealer_id = $this->Auth->user('dealer_id');
        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        $this->Prg->commonProcess();
        //$this->User->recursive = 0;

        $group_id = $this->Auth->user('group_id');

        if ($group_id == 3 || $group_id == 4) {
            $conditions = array(
                'User.id' => $current_user_id,
            );
        }else if ($group_id == 2) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
                'User.group_id <>' => '1',
                'User.dealer_id' => $current_user_id,
            );
        }
        elseif ($group_id == 1) {
            $conditions = array(
                $this->User->parseCriteria($this->passedArgs),
            );
        } else {
            //$this->redirect(array('controller' => 'dashboards', 'action' => 'index'));
        }
        $conditions['User.group_id'] = $this->User->getServiceGroup();
         $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $service_group = $this->User->Group->find('list',array('conditions' => array('id' => $this->User->getServiceGroup())));
        $this->set('users', $this->paginate());
        $this->set('groupid', $groupid);
        $this->set('service_group',$service_group);
        if( $this->Session->check("load_user") ){
                $this->set('load_user', $this->Session->read("load_user"));
                $this->Session->delete("load_user");
        }
    }

    //Service app
     public function serviceapp_search_result($groupid) {
        //$this->layout='ajax';
        $this->view= 'search_result';
        $current_user_id = $this->Auth->User('id');
        $dealer_id = $this->Auth->user('dealer_id');

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        $this->Prg->commonProcess();
        //$this->User->recursive = 0;
        $group_id = $this->Auth->user('group_id');


        $conditions = array(
            $this->User->parseCriteria($this->passedArgs),
            'User.group_id' =>$this->User->getServiceGroup(),
            'User.dealer_id' => $dealer_id,
        );

        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 25,
            'order' => array(
                'User.active' => 'DESC'
            )
        );
        $user_count = $this->User->find('count', array('conditions' => $conditions));
        $this->set('users', $this->paginate());
        $this->set('user_count', $user_count);

         $groups = $this->User->Group->find('list');
        $this->set('groups', $groups);
    }

    ///service app

    public function serviceapp_user_details($id = null){
        $this->view = 'user_details';
        $user = $this->User->read(null, $id);
        $this->set('user', $user);
        $service_group = $this->User->getServiceGroup();
        $groups = $this->User->Group->find('list',array('conditions' => array('Group.id' => $service_group)));
        $this->set('groups', $groups);
    }
    public function serviceapp_edit_new($id = null) {
       $this->layout='serviceapp_layout';
        $this->view = 'edit_new';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        /*if (($this->Auth->user('group_id') != 2)) {
            $this->Session->setFlash(__('You do not have permission to edit other users detail'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index_new_userlisting'));
        }*/

        if ($this->request->is('post') || $this->request->is('put')) {

//            $other_user_with_this_email = $this->User->findByEmail($this->request->data['User']['email']);
            if (!empty($other_user_with_this_email) and ($other_user_with_this_email['User']['id'] != $id)) {
                $this->Session->setFlash(__('User with this email already exists, please chose another email'), 'alert', array('class' => 'alert-error'));
            } else {
                if ($this->request->data['User']['new_password']) {
                    if ($this->request->data['User']['new_password'] === $this->request->data['User']['confirm']) {
                        $this->request->data['User']['password'] = $this->request->data['User']['new_password'];
                        $this->request->data['User']['pwd'] = $this->request->data['User']['password'];
                    } else {
                        $this->Session->setFlash(__('Password not updated'), 'alert', array('class' => 'alert-info'));
                    }
                }
                if ($this->Auth->user('group_id') != 2 && $this->Auth->user('group_id') != 9) {
                    unset($this->request->data['User']['group_id']);
                }

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('User details has been saved', 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'edit_new',$id));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);

        //debug($this->request->data);

        $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id'=>$this->User->getServiceGroup())));
        $this->set('grouplist', $grouplist);

    }
    public function serviceapp_add_new() {

        $dealer_id = $this->Auth->user('dealer_id');
        $dealer_info = $this->Auth->user();
        date_default_timezone_set($dealer_info['zone']);


        $this->layout='serviceapp_layout';
        $this->view = 'add_new';
        if ($this->request->is('post')) {

            $this->request->data['User']['register_timestamp'] = date('Y-m-d: H:i:s',strtotime('now'));
            $this->request->data['User']['quick_code'] = "123";

            $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

            $user_with_this_username = $this->User->find('count', array('conditions'=>array('User.dealer_id'=>$dealer_id,'User.username' => $this->request->data['User']['username'] )));



            if (!empty($user_with_this_username)) {
                $this->Session->setFlash(__('Username already exists. Please choose another one.'), 'alert', array('class' => 'alert-error'));
            }
            else {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    /*$email = new CakeEmail();
                    $email->from('info@dealershipperformance.com');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('New user added');
                    $email->template('newuser');
                    $email->theme('Default');
                    $email->emailFormat('both');
                    $email->viewVars(array('username' => $this->request->data['User']['email'], 'password' => $this->request->data['User']['password']));
                    $email->send("New user added mail");  */
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index_new_userlisting',$this->request->data['User']['group_id']));
                } else {
                     $errors = $this->User->validationErrors;
                     debug($errors);
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        $service_group = $this->User->getServiceGroup();
        $grouplist = $this->User->Group->find('list', array('conditions'=>array('Group.id'=>$service_group)));
        $this->set('grouplist', $grouplist);
    }


}
