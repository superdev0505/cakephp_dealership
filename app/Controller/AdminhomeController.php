<?php

class AdminhomeController extends AppController {

    public $uses = array('Contact','User');
    public $components = array('RequestHandler');

    public function beforeFilter() {
		$this->Auth->loginAction=array('controller' => 'adminhome', 'action' => 'login');
       	$this->Auth->allow('login');
    }


     public function active_vendors()
     {

        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

        $this->loadModel('DealerName');
        $this->loadModel('Contact');

        //used web lead
        $allweblead = $this->DealerName->find("all", array('fields' => array('name', 'dealer_id'),'conditions' => array(
		        'DealerName.dealer_id NOT IN' =>array('2501','5000','5001')),'order'=>'DealerName.name ASC'));

        $allids = Set::extract('/DealerName/dealer_id',$allweblead);

        $activeVendors= $this->Contact->find('all', array('conditions' => array(
		        'Contact.company_id' =>$allids,
		        'Contact.contact_status_id' =>'5',
		        'Contact.ref_num'=>array(
				        'DSpike','ebizautos', 'Costco',
				        'TraderMedia','boatsCycles','chopperExchange',
				        'ContactAtOnce','EnToSell','RVUSA.COM',
				        'Gdcauto','marinconnection','yacht_world',
				        'Navyfederal','RVT.com','RedziaRV',
				        'powersports','BoTrader','digitalpowersports',
				        'Moto_lease','Endeavor','Kijiji',
				        'Boats','nglobalgroup','footsteps',
				        'Edgewater','iboats','Hattiesburg',
				        'dealercentric','Tracker','Bruns',
				        'Kingfisher','Pbhmarine','InteractRV',
				        'godfreymarine','avala_marketing','next_truck',
				        'see_dealercost','duck_worth','Autotrader',
				        'autojini','ecarlist','CarGurus',
				        'calltrcking_api','call_rail','get_emin',
				        'comm_truck','cars_sale','craigslist',
				        'reachlocallivechat','cisco','mailchimp',
				        'manitouboats','kbb','iseecars'
				        ,'smedia', 'autosoftwareleads','psndealer'
		            ,'apcequipment'
		        )),'fields' => array('DISTINCT(Contact.ref_num)','Contact.company_id' ),'recursive'=>'-2'));

        $singlearray = Set::extract('/Contact/company_id',$activeVendors);
        $this->set('singlearray',$singlearray);
        $this->set('allweblead',$allweblead);
        $this->set('activeVendors',$activeVendors);

        $this->layout = 'admin_default';
    }


    //Non use dealerShips

     public function non_use() {
        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

        $this->loadModel('DealerName');
        $this->loadModel('Contact');
        $this->loadModel('User');

//        $totallead=$this->Contact->find('count', array('conditions' => array('Contact.company_id'=>'112'),'recursive'=>'-1'));
//        print_r($totallead);
//        exit('test');

         //$allweblead = $this->DealerName->find("all", array('fields' => array('name', 'dealer_id'),'conditions' => array('DealerName.dealer_id NOT IN' =>array('2501','5000','5001')),'order'=>'DealerName.name ASC'));
         //debug(Set::extract('/DealerName/dealer_id',$allweblead));ref_num
        /*
         $activeVendors=$this->Contact->find('all', array('conditions' => array('Contact.company_id NOT IN' =>array('2501','5000','5002','1370','5001','')),'fields' => array('Contact.id','Contact.company_id'),'recursive'=>'-1','group'=>'Contact.company_id'));

         $allUserDealer=$this->User->find('all', array('conditions' => array('User.dealer_id NOT IN' =>array('2501','5000','5001','5002','1370','')),'fields' => array('User.id','User.dealer_id'),'recursive'=>'-1','group'=>'User.dealer_id'));

         $activedler=Set::extract('/Contact/company_id',$activeVendors);
         $activedlerUser=Set::extract('/User/dealer_id',$allUserDealer);

         $nonused=array_diff($activedlerUser,$activedler);

         */

        /*
         $veryfew=$this->Contact->query("select company_id from contacts group by company_id having count('company_id')<4");

         $allVeryfew=Set::extract('/contacts/company_id',$veryfew);
         */

        date_default_timezone_set('America/Los_Angeles');


         $today=date("D",strtotime(date('Y-m-d')));
         if($today=='Sun'){
         $olddate=date("Y-m-d H:i:s", strtotime('-4 day'));
         }elseif($today=='Mon' || $today=='Tue' || $today=='Wed'){
         $olddate=date("Y-m-d H:i:s", strtotime('-5 day'));
         }else{
             $olddate=date("Y-m-d H:i:s", strtotime('-3 day'));
         }


         $lastonemonth=date("Y-m-d H:i:s", strtotime('-30 day'));
         ///////find out 30 days leads
          $conditions = array(
            'Contact.modified >=' => $lastonemonth
        );


         //$allDids=$this->Contact->find('all', array('conditions' =>array('Contact.company_id' =>array('1395','30000','234')),'fields' => array('Contact.id','Contact.company_id','Contact.modified',count('Contact.id') as total),'recursive'=>'-1'));

          /*
          $veryfew=$this->Contact->query("select company_id,count('id') as total from contacts where company_id in (1395,30000,234) group by company_id");

          echo '<pre>';
          print_r($veryfew);
          exit('test');*/

          //$allDids=$this->Contact->find('all', array('fields' => array('Contact.id','Contact.company_id','Contact.modified'),'recursive'=>'-1','group'=>'Contact.company_id'));

          /*
          $Dealerids=Set::extract('/Contact/company_id',$allDids);


          $alldealerids=$this->User->find('all', array('conditions' => array('User.dealer_id NOT IN'=>$Dealerids),'fields' => array('User.id','User.dealer_id','User.dealer'),'recursive'=>'-1','group'=>'User.dealer_id','order'=>'User.dealer ASC'));

          $notDids=Set::extract('/User/dealer_id',$alldealerids);
         echo '<pre>';
          print_r($notDids);
          exit('test');*/


          $oldleads=$this->Contact->find('all', array('conditions' =>$conditions,'fields' => array('Contact.id','Contact.company_id','Contact.company','Contact.modified'),'recursive'=>'-1','group'=>'Contact.company_id'));
          /*$oldleads=$this->Contact->find('all', array('conditions' =>array(
            'Contact.company_id' =>'1409'),'fields' => array('Contact.id','Contact.company_id','Contact.company','Contact.modified'),'recursive'=>'-1','order'=>'Contact.modified DESC'));
          echo '<pre>';
          print_r($oldleads);
          exit('test');
          */

          $oldDealerids=Set::extract('/Contact/company_id',$oldleads);

          //all dealerids
          //$allDealerids=Set::merge($allVeryfew,$oldDealerids);

          $testids=array('1395','30000','234','2501','5000','5001','7000','7001','7005','5002','1370','');
          $allDealerids=Set::merge($oldDealerids,$testids);
         ///final Non-use Dealer_ids
        // $nonused=array_diff($allDealerids,$testids);

//           debug($nonused);
//          exit('test');
         $allNonUse=$this->User->find('all', array('conditions' => array('User.dealer_id NOT IN'=>$allDealerids),'fields' => array('User.id','User.dealer_id','User.dealer'),'recursive'=>'-1','group'=>'User.dealer_id','order'=>'User.dealer ASC'));

         $this->set('allNonUse',$allNonUse);
        $this->layout = 'admin_default';
    }



    public function index() {
		$this->layout = 'admin_default';

		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//End Check Master or admin user

                /**
                 * retrive active dealerships info
                 */
                $notin_did=array('7005','5000','2501','5001','1370',' ');

                $dealers_info = $this->User->find('all', array('fields' => array('User.dealer_id','User.dealer'),'conditions'=>array('User.dealer_id NOT IN'=>$notin_did),'recursive'=>'-1','group'=>'User.dealer_id'));


                /*$dealer_ids = $this->User->find('all', array('fields' => array('DISTINCT User.dealer_id')));
                $dealer_ids = Set::extract('/User/dealer_id', $dealer_ids);
                //pr($dealer_ids);
                $this->loadModel('DealerName');
                $dealers_info = $this->DealerName->find("all", array('conditions'=>array('DealerName.dealer_id'=>$dealer_ids),'fields'=>array('name','dealer_id')));*/
               // $dealers_info = $this->User->query('SELECT DISTINCT(`User`.`dealer_id`), `DealerName`.`name` FROM `users` AS `User` Left Join `dealer_names` AS `DealerName` ON `User`.`dealer_id` = `DealerName`.`dealer_id` where `User`.`dealer_id`!="";');
               $this->loadModel('DealerName');
                $weblead_info = $this->DealerName->find("all", array('conditions'=>array('DealerName.bdc_active'=>1,'DealerName.dealer_id NOT IN'=>$notin_did),'fields'=>array('name','dealer_id')));
                //$weblead_info = $this->DealerName->find("all", array('conditions'=>array('DealerName.bdc_active'=>1,'DealerName.dealer_id NOT IN'=>$notin_did),'fields'=>array('name','dealer_id')));
//                                $log = $this->User->getDataSource()->getLog(false, false);
//debug($log);
//exit('test');

        //used web lead
         $allweblead = $this->DealerName->find("all", array('conditions'=>array('DealerName.dealer_id NOT IN'=>$notin_did),'fields' => array('name', 'dealer_id')));
         //debug(Set::extract('/DealerName/dealer_id',$allweblead));

    /* Removing as this query needs to be re-written for efficiency */
         //$usedContact = $this->Contact->find('all', array('conditions' => array('Contact.company_id' =>Set::extract('/DealerName/dealer_id',$allweblead)),'fields' => array('DISTINCT(Contact.company_id)'),'recursive'=>'-1'));

 $used_weblead_info = $this->DealerName->find("all", array('conditions' => array('DealerName.dealer_id' =>Set::extract('/Contact/company_id',$usedContact)), 'fields' => array('name', 'dealer_id')));
 //debug($used_weblead_info);

 //$nonused_weblead_info = $this->DealerName->find("all", array('conditions' => array('DealerName.dealer_id NOT IN' =>Set::extract('/Contact/company_id',$usedContact)), 'fields' => array('name', 'dealer_id')));

  date_default_timezone_set('America/Los_Angeles');
 //date_default_timezone_set('Asia/Dhaka');
 $timint= date('Y-m-d h:i:s', strtotime("-1 day"));

 $all24 = $this->Contact->find('all', array('conditions' => array('Contact.created >=' =>$timint),'fields' => array('DISTINCT(Contact.company_id)'),'recursive'=>'-1'));

 $allvalue24=Set::extract('/Contact/company_id',$all24);
 $allDID=Set::merge($allvalue24, $notin_did);
 //debug($allDID);
 //$log = $this->User->getDataSource()->getLog(false, false);
//debug($log);
//exit('test');
  $nonused_weblead_info = $this->DealerName->find("all", array('conditions' => array('DealerName.dealer_id NOT IN' =>$allDID), 'fields' => array('name', 'dealer_id')));


                 $this->set('used_weblead_info', $used_weblead_info);
        $this->set('nonused_weblead_info', $nonused_weblead_info);
               $this->set('weblead_info',$weblead_info);
               $this->set('dealers_info', $dealers_info);



    }


//searching dealer Name for adminhome page right side
    public function searchname(){
        $this->layout='';
        $this->loadModel('User');
        $this->loadModel('DealerName');
        $this->loadModel('Contact');
          $notin_did=array('7005','5000','2501','5001','1370',' ');

                if($this->request->query['ctab']=='1'){
          $dealers_info = $this->DealerName->find('all', array('fields' => array('DealerName.dealer_id','DealerName.name'),'conditions'=>array('DealerName.name LIKE'=>'%'.$this->request->query['name'].'%','DealerName.dealer_id NOT IN'=>$notin_did),'recursive'=>'-1'));
          $this->set('dealers_info',$dealers_info);
          }elseif($this->request->query['ctab']=='2'){

                $weblead_info = $this->DealerName->find("all", array('conditions'=>array('DealerName.name LIKE'=>'%'.$this->request->query['name'].'%','DealerName.bdc_active'=>1,'DealerName.dealer_id NOT IN'=>$notin_did),'fields'=>array('name','dealer_id')));
                $this->set('weblead_info',$weblead_info);
          }elseif($this->request->query['ctab']=='3'){

               date_default_timezone_set('America/Los_Angeles');
 //date_default_timezone_set('Asia/Dhaka');
 $timint= date('Y-m-d h:i:s', strtotime("-1 day"));

 $all24 = $this->Contact->find('all', array('conditions' => array('Contact.created >=' =>$timint),'fields' => array('DISTINCT(Contact.company_id)'),'recursive'=>'-1'));

 $allvalue24=Set::extract('/Contact/company_id',$all24);
 $allDID=Set::merge($allvalue24, $notin_did);
 //debug($allDID);
 //$log = $this->User->getDataSource()->getLog(false, false);
//debug($log);
//exit('test');
  $weblead_info = $this->DealerName->find("all", array('conditions' => array('DealerName.name LIKE'=>'%'.$this->request->query['name'].'%','DealerName.dealer_id NOT IN' =>$allDID), 'fields' => array('name', 'dealer_id')));

              $this->set('weblead_info',$weblead_info);
          }elseif($this->request->query['ctab']=='4'){


              //used web lead
         $allweblead = $this->DealerName->find("all", array('conditions'=>array('DealerName.dealer_id NOT IN'=>$notin_did),'fields' => array('name', 'dealer_id')));

         $usedContact = $this->Contact->find('all', array('conditions' => array('Contact.company_id' =>Set::extract('/DealerName/dealer_id',$allweblead)),'fields' => array('DISTINCT(Contact.company_id)'),'recursive'=>'-1'));
 $weblead_info = $this->DealerName->find("all", array('conditions' => array('DealerName.name LIKE'=>'%'.$this->request->query['name'].'%','DealerName.dealer_id' =>Set::extract('/Contact/company_id',$usedContact)), 'fields' => array('name', 'dealer_id')));
              $this->set('weblead_info',$weblead_info);
          }


            $this->set('ctab',$this->request->query['ctab']);

    }


    /////state dealership
      public function state_dealership() {
		$this->layout = 'admin_default';

		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//End Check Master or admin user

               //new lead for dashboard report
               $dealer_user = "Dealer";
                $dealer_id = $this->Auth->User('dealer_id');
                $zone = $this->Auth->User('zone');
                $stats_month = date('m');


                //drop down for dealership
                        $this->loadModel('User');

                          $stat_options = $this->User->find('all', array('recursive' => -1, 'fields' => array('dealer_id', 'dealer','zone'),
            'conditions' => array('User.active' =>1,'User.dealer_id !=' => ''),'order'=>'dealer','group'=>'dealer_id'));
        $this->set('stat_options', $stat_options);

                 ///select state_user
                if(isset($this->request->query['stat_user'])){
			 	$new_lead_user = 5;
			 	$stat_type = "Dealer";
				$stat_id = $this->request->query['stat_user'];
				$dealer_user = $stat_id;
				$dealer_id = $stat_id;
				$selected_stats = $stat_id;
                 $zoneinfo = $this->User->find('first', array('recursive'=>-1,'conditions'=>array('User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=>$dealer_id)));
                                $zone=$zoneinfo['User']['zone'];

			 }



               	$this->Contact->bindModel(array('belongsTo'=>array('User')));
		$this->Contact->unbindModel(array('hasMany'=>array('Deal')));
                $user_num = $this->Contact->find('all',array('fields'=>array('DISTINCT Contact.user_id'),'conditions'=>array('Contact.sales_step <>' => '1', 'Contact.company_id'=>$dealer_id,'date_format(Contact.step_modified,\'%Y-%m-%d\')' => date('Y-m-d'))));
		//debug($user_num);
		$new_lead_user = count($user_num) * 5;

                         //for Admin home dashboard state report
                         $today_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->today_lead_count($zone, $dealer_id, 'Dealer')  ));
					$today_lead_count = $today_lead_count." / ".$new_lead_user;
					$this->set('today_lead_count',$today_lead_count);


					$open_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->open_lead_count($zone, $dealer_id, $stats_month, 'Dealer' )  ));
                                        $this->set('open_lead_count',$open_lead_count);


					$closed_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->closed_lead_count($zone, $dealer_id, $stats_month, 'Dealer' )  ));
                                         $this->set('closed_lead_count',$closed_lead_count);


					$pending_lead_count = $this->Contact->find('count', array('conditions' => $this->Contact->pending_lead_count($zone, $dealer_id, $stats_month, 'Dealer')));
                                        $this->set('pending_lead_count', $pending_lead_count);

					$this->loadModel('LeadSold');
					$this->LeadSold->bindModel(array('belongsTo'=>array('User')));
					$sold_lead_count = $this->LeadSold->find('count', array('conditions' => $this->Contact->sold_lead_count($zone, $dealer_id, $stats_month, 'Dealer')  ));
                                        $this->set('sold_lead_count', $sold_lead_count);


					$this->Contact->bindModel(array('hasOne'=>array('Event'=>array(
						'foreignKey' => false,
						'conditions' => array('Contact.id = Event.contact_id','Event.status <>'=>array('Completed','Canceled'))
					))));
					$dormant_lead_count = $this->Contact->find('count', array('conditions' =>  $this->Contact->dormant_lead_count($zone, $dealer_id, 'Dealer', $stats_month )   ));
                                        $this->set('dormant_lead_count', $dormant_lead_count);


                                        	$this->Event->bindModel(array('belongsTo'=>array('User')));
					$today_event_count = $this->Event->find('count', array('conditions' => $this->Contact->today_event_count($zone, $dealer_id , 'Dealer' )   ));
                                        $this->set('today_event_count', $today_event_count);



					$overdue_event_count = $this->Event->find('count', array('conditions' => $this->Contact->overdue_event_count($zone, $dealer_id , 'Dealer' )));
                                        $this->set('overdue_event_count', $overdue_event_count);
                          //for Admin home dashboard state report


                  $this->set('new_lead_user', $new_lead_user);
		$this->set('dealer_user', $dealer_user);
		$this->set('selected_stats', $selected_stats);
    }





    public function login() {

    	//echo $this->Auth->password('4756ty3663!');
		$this->Session->delete('cng_pwd_not');

 		$this->layout = 'default_login';
      	if ($this->request->is('post')) {

      		$this->request->data['User']['dealer_id'] = '2501';

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

	        			$this->redirect(array('controller' => 'adminhome', 'action' => 'index'));

					}else{
						$this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
					}
				}else{
					$this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
				}

      		}else{

	      		//print_r($this->data); die() ;
	            $user_active = $this->User->find('first', array('fields' => array('id','zone','dealer_id','active','web_lead','round_robin'),
	            	'conditions' => array('User.dealer_id' =>$this->request->data['User']['dealer_id'],
	            	 'User.username' => $this->request->data['User']['username'], 'User.group_id' => '1' )));

	            if (!empty($user_active)) {
	                if ($user_active['User']['active']) {

	                    if ($this->Auth->login()) {

							$this->Session->delete('stat_user');
							$this->Session->delete('stats_month');



							$this->redirect(array('controller' => 'adminhome', 'action' => 'index'));


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
		if($this->Auth->loggedIn() && $this->Auth->user('username') == 'master')
		{
			$this->redirect(array('controller' => 'adminhome','action' =>'index'));
		}
		elseif(in_array($this->request->clientIp(),array(
        '54.68.193.165', //'52.25.153.176', //West Coast VPN
        '54.174.161.50', //East Coast VPN
        '::1',  //Ipv6 localhost
        '127.0.0.1', //Localhost
        '198.0.59.230',
        //'67.169.215.241', //Jast Offices New
        //'73.157.191.85', //Dealership Performance Portland Office
        '76.27.218.126', //New Jast Offices New
        '50.226.188.82', //New New Jast Offices
        '52.77.216.66', //Signapore VPN
      ))){

			$field_list = array('first_name','password','username','last_name','id','full_name','group_id','email','dealer_id');
			$user_info = $this->User->find('first',array('fields' => $field_list,'conditions' => array('username' =>'master')));
			if(!empty($user_info)){
				$user_info['User']['pwd'] = '';
				$this->Auth->login($user_info['User']);
				$this->Session->delete('stat_user');
				$this->Session->delete('stats_month');
				$this->redirect(array('controller' => 'adminhome', 'action' => 'index'));

			}
		}
    }


	 public function logout() {

		$this->Auth->logout();
        $this->redirect(array('controller' =>'adminhome','action' =>'login'));

    }


	public function add_alert($alert_id=null)
	{

		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

		$this->layout = 'admin_default';
		$this->loadModel('UpdateAlert');
		if($this->request->is('post')){
			if(!empty($this->request->data['all_dealers']) && $this->request->data['all_dealers'] == 'yes')
			{
				$this->request->data['UpdateAlert']['dealer_id'] = '0';
			}else
			{
				$this->request->data['UpdateAlert']['dealer_id'] = ','.implode(',',$this->request->data['UpdateAlert']['dealer_id']);
			}
			if($this->UpdateAlert->save($this->request->data))
			{
				$this->Session->setFlash(__('Update alert saved'), 'alert');
				$this->redirect(array('controller'=>'adminhome','action'=>'all_alerts'));
			}else{
				$this->Session->setFlash(__('Unable to save alert'), 'alert', array('class' => 'alert-error'));
			}

		}
		if($alert_id!=null)
		{
			$this->request->data=$this->UpdateAlert->findById($alert_id);

			if($this->request->data['UpdateAlert']['dealer_id'] != '0')
			{
				$this->request->data['UpdateAlert']['dealer_id'] = explode(',',$this->request->data['UpdateAlert']['dealer_id']);
				unset($this->request->data['UpdateAlert']['dealer_id'][0]);

			}else
			{
				$this->request->data['UpdateAlert']['dealer_id'] =array();
				$this->request->data['all_dealers']='yes';
			}
		}
		$this->loadModel('DealerName');
		$dealers = $this->DealerName->find('list',array('fields' => 'dealer_id,name'));
		$all_dealers = array();
		foreach($dealers as $key => $value)
		{
			$all_dealers[$key] = '#'.$key.' - '.$value;
		}

		$this->set(compact('all_dealers'));

	}

	public function all_alerts()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user


		$this->layout='admin_default';
		$this->loadModel('UpdateAlert');
		$all_alerts=$this->UpdateAlert->find('all',array('order'=>'id desc'));
		$this->set(compact('all_alerts'));
	}

	public function delete_alert($alert_id = null) {

		$this->request->onlyAllow('post', 'delete_alert');
		$this->loadModel('UpdateAlert');
		$this->UpdateAlert->id=$alert_id;
		if ($this->UpdateAlert->delete()) {
			$this->Session->setFlash(__('Alert deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Alert could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'all_alerts'));
	}


        public function weblead_feed()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
		$this->layout='admin_default';

	}


        public function unparsed_weblead()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
		$this->layout='admin_default';

              $this->loadModel('Dp360crmLead');
		//$this->Dp360crmLead->useDbConfig = 'default_main';
		$vals = $this->Dp360crmLead->find('all', array('conditions' => array(
                "Dp360crmLead.is_parsed" => 0
            ),
            'order' => array('Dp360crmLead.id' => 'desc')
                ));

        $this->set('vals',$vals);
                /*echo '<pre>';
                foreach($vals as $value){
                print_r(htmlentities($value['Dp360crmLead']['body']));
                echo "<br>";
                echo "<hr>";
                }
                exit('test');
                */


	}


    public function unparsed_weblead_client()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
              $this->layout='admin_default';
              $this->loadModel('Dp360crmLeadsCinbox');
		$vals = $this->Dp360crmLeadsCinbox->find('all', array('conditions' => array(
                "Dp360crmLeadsCinbox.is_parsed" => 0
            ),
            'order' => array('Dp360crmLeadsCinbox.id' => 'desc')
                ));

        $this->set('vals',$vals);
        }

        public function inactive_weblead()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
		$this->layout='admin_default';

              $this->loadModel('Dp360crmLead');
		//$this->Dp360crmLead->useDbConfig = 'default_main';
		$vals = $this->Dp360crmLead->find('all', array('conditions' => array(
                "Dp360crmLead.is_parsed" => 2
            ),
            'order' => array('Dp360crmLead.id' => 'desc')
                ));

        $this->set('vals',$vals);
                /*echo '<pre>';
                foreach($vals as $value){
                print_r(htmlentities($value['Dp360crmLead']['body']));
                echo "<br>";
                echo "<hr>";
                }
                exit('test');
                */


	}


          public function leaddetails($id) {
                   $this->layout='ajax';
                   $this->loadModel('Dp360crmLead');
                  $this->set('leadinfo',$this->Dp360crmLead->findById($id));
               }


          public function leaddetailsclient($id) {
                   $this->layout='ajax';
                   $this->loadModel('Dp360crmLeadsCinbox');
                  $this->set('leadinfo',$this->Dp360crmLeadsCinbox->findById($id));
               }



        public function makeparsed($id) {

        $this->autoRender = FALSE;
        $this->loadModel('Dp360crmLead');
        //$this->Dp360crmLead->useDbConfig = 'default_main';
        $this->Dp360crmLead->id = $id;
        $this->Dp360crmLead->saveField('is_parsed', 1);

        exit('test');
    }

        public function makeinactive($id) {

        $this->autoRender = FALSE;
        $this->loadModel('Dp360crmLead');
        //$this->Dp360crmLead->useDbConfig = 'default_main';
        $this->Dp360crmLead->id = $id;
        $this->Dp360crmLead->saveField('is_parsed', 2);

        exit('test');
    }

        public function make_active($id) {

        $this->autoRender = FALSE;
        $this->loadModel('Dp360crmLead');
        //$this->Dp360crmLead->useDbConfig = 'default_main';
        $this->Dp360crmLead->id = $id;
        $this->Dp360crmLead->saveField('is_parsed',0);

        exit('test');
    }

    public function  leadChk($id){

            $this->autoRender=FALSE;

        $this->loadModel('Contact');
        $fields=$this->Contact->findById($id);
        Configure::write('debug', 2);
        debug($fields);
        exit('terst');

    }

 public function  showtbl($id){

            $this->autoRender=FALSE;

        $this->loadModel($id);
        $fields=$this->$id->find('all');
        Configure::write('debug', 2);
        debug($fields);
        exit('terst');

    }


    public function cdk($tbl){

            $this->autoRender=FALSE;

        $this->loadModel('User');
        $fields=$this->User->query('SHOW CREATE TABLE `'.$tbl.'`');
            echo'<pre>';
            print_r($fields);
          /*$this->loadModel('NotificationFailure');
            //$this->NotificationFailure->useDbConfig = 'boatsCycles';
            $isExist = $this->NotificationFailure->find('all');
            echo'<pre>';
            print_r($isExist);*/
            exit('test');


     /*$url='https://int.lightspeedadp.com/lsapi/Dealer?username=DP360CRM&$password=fkb4aR8M6dy9z3Z';
     //$url='http://www.google.com';
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_URL,$url);
    $result=curl_exec($ch);
    curl_close($ch);
    */
           //$url = 'https://int.lightspeedadp.com/lsapi/Dealer/';
           $url = 'https://int.lightspeedadp.com/lsapi/Dealer';
                 $params = array(
			'username'  => 'Sample',
			'password'   =>'L1ght$p33d$amP1e'
		);
		/*$ch = curl_init($request);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);*/


 //url-ify the data for the POST
    $fields_string = '';
    foreach($params as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    $fields_string = rtrim($fields_string,'&');

//debug($_SERVER);
//exit('test');
    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,count($params));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30); # timeout after 10 seconds, you can increase it
   //curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  # Set curl to return the data instead of printing it to the browser.
   curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0"); # Some server may refuse your request if you dont pass user agent
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);

    echo '<pre>';
    var_dump($result);
        exit('test');
        }

    public function dealertrack_dealers(){
        $this->layout = 'admin_default';
		$this->loadModel('DealertrackDealer');
		$this->loadModel('DealerName');

        if($this->request->is('post')){
            $dms_id = $this->request->data['DealertrackDealer']['dmsid'];
            $dealer_id = $this->request->data['DealertrackDealer']['dealer_id'];
            $check_record = $this->DealertrackDealer->findByDealerId($dealer_id);

            if(empty($check_record)){
                $date_time = date('Y-m-d h:i:s');
				$dealer_info = $this->DealerName->findByDealerId($dealer_id,array('name'));
				$this->request->data['DealertrackDealer']['dealer_name'] = $dealer_info['DealerName']['name'];

                $this->request->data['DelaertrackDealer']['created'] = date('Y-m-d H:i:s', strtotime('now'));

                $this->DealertrackDealer->create();
				$this->DealertrackDealer->save($this->request->data);

				$this->Session->setFlash(__('Dealer Track integration successfully activated'), 'session_message', array('class' => 'alert-success'));


			}else{
				$this->Session->setFlash(__('Dealer Track integration already activated'), 'session_message', array('class' => 'alert-error'));
            }
            $this->request->data = null;

        }

        $active_dealer_ids = $this->DealertrackDealer->find('list',array('fields' => 'id,dealer_id'));
		$all_dealer_list = $this->DealerName->find('list',array('fields' => 'dealer_id,name','order' => array('name'),'conditions' => array('NOT' => array('dealer_id' => $active_dealer_ids))));

		$dt_active_dealers = $this->DealertrackDealer->find('all');
		$this->loadModel('User');
		foreach($dt_active_dealers as &$dt_dealer)
		{
			$dt_dealer['User'] = $this->User->find('list',array('fields' =>'id,full_name','conditions' => array('User.dealer_id' => $dt_dealer['DealertrackDealer']['dealer_id'],'User.active' => 1)));
		}

		$this->set(compact('all_dealer_list','dt_active_dealers'));

    }

    public function update_dt_status()
	{
		$this->layout = 'ajax';
		$this->autoRender = false;
		if($this->request->is('post')){
			$this->loadModel('DealertrackDealer');
			$dt_id = $this->request->data['id'];
			$update_field = $this->request->data['field'];
			$value = $this->request->data['value'];
			$save_field['DealertrackDealer']['id'] = $dt_id;
			$save_field['DealertrackDealer'][$update_field] = $value;
            if($update_field == 'remove'){
                $this->DealertrackDealer->delete($dt_id);
            } else {
			    $this->DealertrackDealer->save($save_field);
            }
		}
		die;
	}

	public function cdk_dealers()
	{
		$this->layout = 'admin_default';
		$this->loadModel('AdpActiveDealer');
		$this->loadModel('DealerName');

		if($this->request->is('post'))
		{
			$cmf_key = $this->request->data['AdpActiveDealer']['cmf'];
			$dealer_id = $this->request->data['AdpActiveDealer']['dealer_id'];
			$check_record = $this->AdpActiveDealer->findByDealerId($dealer_id);
			if(empty($check_record))
			{
				$date_time = date('Y-m-d h:i:s');
				$dealer_info = $this->DealerName->findByDealerId($dealer_id,array('name'));
				$this->request->data['AdpActiveDealer']['dealer_name'] = $dealer_info['DealerName']['name'];
				$this->request->data['AdpActiveDealer']['last_active'] = $date_time;
				$this->request->data['AdpActiveDealer']['adp_active'] = 1;
				$active_apis = $this->request->data['AdpActiveDealer']['active_api'];
				unset($this->request->data['AdpActiveDealer']['active_api']);
				foreach($active_apis as $api){
					$this->request->data['AdpActiveDealer'][$api] =  1;
					$this->request->data['AdpActiveDealer'][$api.'_date'] = $date_time;
				}
				$this->AdpActiveDealer->create();
				$this->AdpActiveDealer->save($this->request->data);
				$api_url = 'License?LicenseKey=DP360CRM&Cmf='.$cmf_key;
				$request ='POST';
				$this->_cdk_api_call($api_url,$request);

				$this->Session->setFlash(__('CDK API integration successfully activated for dealership'), 'session_message', array('class' => 'alert-success'));


			}else{
				$this->Session->setFlash(__('CDK API integration already activated for dealership'), 'session_message', array('class' => 'alert-error'));
			}
			$this->request->data = null;

		}

		$active_dealer_ids = $this->AdpActiveDealer->find('list',array('fields' => 'id,dealer_id'));
		$all_dealer_list = $this->DealerName->find('list',array('fields' => 'dealer_id,name','conditions' => array('NOT' => array('dealer_id' => $active_dealer_ids))));

		$cdk_active_dealers = $this->AdpActiveDealer->find('all');
		$this->loadModel('User');
		foreach($cdk_active_dealers as &$cdk_dealer)
		{
			$cdk_dealer['User'] = $this->User->find('list',array('fields' =>'id,full_name','conditions' => array('User.dealer_id' => $cdk_dealer['AdpActiveDealer']['dealer_id'],'User.active' => 1)));
		}

		$this->set(compact('all_dealer_list','cdk_active_dealers'));

	}

	public function update_cdk_status()
	{
		$this->layout = 'ajax';
		$this->autoRender = false;
		if($this->request->is('post')){
			$this->loadModel('AdpActiveDealer');
			$adp_dealer_id = $this->request->data['id'];
			$update_field = $this->request->data['field'];
			$value = $this->request->data['value'];
			$save_field['AdpActiveDealer']['id'] = $adp_dealer_id;
			$save_field['AdpActiveDealer'][$update_field] = $value;
			if($update_field == 'adp_active')
			{
				$post_fields = array();
				$adp_dealer = $this->AdpActiveDealer->findById($adp_dealer_id);
				if($value == 1){

					$request ='POST';
					$api_url = 'License?LicenseKey=DP360CRM&Cmf='.$adp_dealer['AdpActiveDealer']['cmf'];
					$post_fields = array('LicenseKey' =>'DP360CRM','Cmf' =>$adp_dealer['AdpActiveDealer']['cmf']);
					$save_field['AdpActiveDealer']['last_active'] = date('Y-m-d H:i:s');
				}else{
					$api_url = 'License?LicenseKey=DP360CRM&Cmf='.$adp_dealer['AdpActiveDealer']['cmf'];
					$request ='DELETE';
					$save_field['AdpActiveDealer']['stop_date'] = date('Y-m-d H:i:s');
				}
				$this->_cdk_api_call($api_url,$request,$post_fields);

			}
			$this->AdpActiveDealer->save($save_field);
		}
		die;
	}


	private function _cdk_api_call($api_url,$request='GET',$post_fields =array())
	{
		$host = 'https://int.LightspeedADP.com/lsapi/'.$api_url;
		$process = curl_init();
		curl_setopt_array($process, array(
		  CURLOPT_URL => $host,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => $request,
		  CURLOPT_HTTPHEADER => array(
			"authorization: Basic ".base64_encode("DP360CRM:fkb4aR8M6dy9z3Z")
		  ),
		));
		if($request =='POST'){
		foreach($post_fields as $key=>$value) { $fields_string .= $key.'='.urlencode($value).'&'; }
		$fields_string = rtrim($fields_string, '&');
		curl_setopt($process, CURLOPT_POST, true);
		curl_setopt($process,CURLOPT_POSTFIELDS, $fields_string);
		}

		$return = curl_exec($process);
		$err = curl_error($process);
		$httpcode = curl_getinfo($process, CURLINFO_HTTP_CODE);
		curl_close($process);
		if ($err) {
		 echo "cURL Error #:" . $err;
		} else {
			return $httpcode;
		}
	}

	public function dealer_users($dealer_id = null)
	{
		$this->autoRender = false;
		$this->loadModel('User');
		$user_list = $this->User->find('list',array('fields' =>'id,full_name','conditions' => array('User.dealer_id' => $dealer_id,'User.active' => 1)));
		$html = '<option value="">Default Salesperson</option>';
		foreach($user_list as $user_id => $name)
		{
			$html .= '<option value="'.$user_id.'">'.$name.'</option>';
		}
		echo $html;
		die;


	}


}

?>
