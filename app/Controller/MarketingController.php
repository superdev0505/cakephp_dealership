<?php
class MarketingController extends AppController {

    public $components = array('RequestHandler','Paginator','Cookie');
    public $uses = array('Contact', 'History', 'ContactStatus', 'User', 'Event', 'EventType', 'Template', 'TemplatesCategory', 'EblastApp','UserEmail', 'EblastsSent','EblastUnsubscribe','EblastBounce','EblastSpam' );

	public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('login','index','logout');
    }

    public function index(){


    	//debug($this->Session->read('eblat_app_multiple'));

    	$dealer_ids = $this->get_dealer_ids(); 
    	$this->set('dealer_ids',$dealer_ids);


    	$user_info = $this->Auth->User();
    	if(empty($user_info)){
    		$this->redirect(array('controller' => 'marketing', 'action' => 'login'));
    	}
    	$this->layout = 'marketing_default';


    	$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);
		
		$current_user_id = $this->Auth->User('id');
		//user emails
		$emails = array();
		$this->set('emails',$emails);
		$this->set('current_user_id',$current_user_id);
		
		//debug($emails);
		
		//opt-out count
		if($stats_month == null){
			$stats_month = date('m');
			if( $this->Session->check("stats_month") ){
				$stats_month = $this->Session->read("stats_month");
			}
		}else{
			$this->Session->write("stats_month", $stats_month);
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$this->set('stats_month', $stats_month);

		$dealer_id = $this->Auth->user('dealer_id');
		//$StatisticsCount = $this->GetStatisticsCount($dealer_id,$first_day_this_month,$last_day_this_month,true);
		
		
		
		
		/* Eblasts Sent */
		$eblat_app_multiple = $this->Session->read('eblat_app_multiple');
		if(is_array($eblat_app_multiple)){
			$conditions = array('EblastApp.group_ids'=> implode(",", $eblat_app_multiple),'template_type'=>'M');
		}else{
			$conditions = array('EblastApp.user_id'=>$dealer_id,'EblastApp.template_type'=>'M', 'EblastApp.scheduled' => '1');
			$conditions['OR']  = array('EblastApp.group_ids is null', 'EblastApp.group_ids' =>   '');
		}
		$eblast_sent_count = $this->EblastApp->find('count',array('conditions'=>$conditions));
		$this->set('eblast_sent_count',$eblast_sent_count);
		
		
		/* Newsletter Sent */
		if(is_array($eblat_app_multiple)){
			$conditions = array('EblastApp.group_ids'=> implode(",", $eblat_app_multiple),'template_type'=>'N');
		}else{
			$conditions = array('EblastApp.user_id'=>$dealer_id,'EblastApp.template_type'=>'N','EblastApp.scheduled' => '1');
			$conditions['OR']  = array('EblastApp.group_ids is null', 'EblastApp.group_ids' =>   '');
		}
		// debug($conditions);
		$newsletter_sent_count = $this->EblastApp->find('count',array('conditions'=>$conditions));
		$this->set('newsletter_sent_count',$newsletter_sent_count);

		//Open % months

		$this->loadModel('SendgridStatistic');
		$dealer_id = $this->Auth->user('dealer_id');
		$start_date = date('Y-m-d 00:00:00', strtotime("-30 day"));
		$end_date = date('Y-m-d 00:00:00', strtotime("+2 day"));
		
		
		$this->loadModel('EblastStatistic');
		$this->EblastStatistic->useDbConfig  =  'eblast_rds';

		//Total Deliver
		if(is_array($eblat_app_multiple)){
			$total_deli = $this->EblastStatistic->query("SELECT count(*) AS delivered FROM eblast_statistics WHERE event_type = 'send' AND dealer_id = '".implode(",", $eblat_app_multiple)."' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		}else{
			$total_deli = $this->EblastStatistic->query("SELECT count(*) AS delivered FROM eblast_statistics WHERE event_type = 'send' AND dealer_id = '{$dealer_id}' AND group_ids is null AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		}
		$total_delivered = 	$total_deli[0][0]['delivered'];

		//Total opens
		if(is_array($eblat_app_multiple)){
			$total_opens = $this->EblastStatistic->query("SELECT count(distinct recipient_id) AS open FROM eblast_statistics WHERE event_type = 'open' AND dealer_id = '".implode(",", $eblat_app_multiple)."' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
			$total_opens_c = $this->EblastStatistic->query("SELECT count(distinct contact_id) AS open FROM eblast_statistics WHERE event_type = 'open' AND dealer_id = '".implode(",", $eblat_app_multiple)."' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		}else{
			$total_opens = $this->EblastStatistic->query("SELECT count(distinct recipient_id) AS open FROM eblast_statistics WHERE event_type = 'open' AND dealer_id = '{$dealer_id}' AND group_ids is null AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
			$total_opens_c = $this->EblastStatistic->query("SELECT count(distinct contact_id) AS open FROM eblast_statistics WHERE event_type = 'open' AND dealer_id = '{$dealer_id}' AND group_ids is null AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		}
		$total_opened = $total_opens[0][0]['open'] + $total_opens_c[0][0]['open'];
		// debug($total_opened);

		$open_percent = 0;
		if($total_opened == '0'){
			$open_percent = 0;
		}else{
			$open_percent = floor(($total_opened/$total_delivered) * 100 );
		}
		$this->set('open_percent', $open_percent);
		$this->set('total_opened', $total_opened);

		//Total Opt-Out
		if(is_array($eblat_app_multiple)){
			$Opt_Out_Month = $this->EblastStatistic->query("SELECT count(*) AS unsubscribed FROM eblast_statistics WHERE event_type = 'unsub' AND dealer_id = '".implode(",", $eblat_app_multiple)."' AND created >= '{$start_date}' AND created <= '{$end_date}'  ");
		}else{
			$Opt_Out_Month = $this->EblastStatistic->query("SELECT count(*) AS unsubscribed FROM eblast_statistics WHERE event_type = 'unsub' AND dealer_id = '{$dealer_id}'    AND created >= '{$start_date}' AND created <= '{$end_date}' ");
		}
		$total_Opt_Out_Month = $Opt_Out_Month['0']['0']['unsubscribed']; 
		$this->set('total_Opt_Out_Month', $total_Opt_Out_Month);

		//Spam
		if(is_array($eblat_app_multiple)){
			$Spam_Month = $this->EblastStatistic->query("SELECT count(*) AS spam FROM eblast_statistics WHERE event_type = 'spam' AND  dealer_id = '".implode(",", $eblat_app_multiple)."' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		}else{
			$Spam_Month = $this->EblastStatistic->query("SELECT count(*) AS spam FROM eblast_statistics WHERE event_type = 'spam' AND  dealer_id = '{$dealer_id}'  AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		}
		$total_Spam_Month = $Spam_Month['0']['0']['spam']; 
		$this->set('total_Spam_Month', $total_Spam_Month);

		//Bounce
		if(is_array($eblat_app_multiple)){
			$Bounce_Month = $this->EblastStatistic->query("SELECT count(*) AS bounced FROM eblast_statistics WHERE event_type in('soft_bounce','hard_bounce') AND dealer_id = '".implode(",", $eblat_app_multiple)."' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		}else{
			$Bounce_Month = $this->EblastStatistic->query("SELECT count(*) AS bounced FROM eblast_statistics WHERE event_type in('soft_bounce','hard_bounce') AND dealer_id = '{$dealer_id}' AND date_format(created,'%Y-%m') = '".date('Y-m')."'");
		}	
		$total_Bounce_Month = $Bounce_Month['0']['0']['bounced']; 
		$this->set('total_Bounce_Month', $total_Bounce_Month);


		//	debug($Bounce_Month);

		// $conditions = array('SendgridStatistic.dealer_id'=>$dealer_id);
		// $this->paginate = array(
		// 	'conditions' => $conditions,
		// 	'order' =>'SendgridStatistic.created DESC',
		// 	'limit' => 30,
		// );
		// $sendgridStatistics = $this->Paginate('SendgridStatistic');
		// $this->set('sendgridStatistics', $sendgridStatistics);



    }

	public function switch_location($dealer_id) {

		$dealer_ids = explode(",", $dealer_id);
		//debug($dealer_ids);
		if( count($dealer_ids) == 1){
			
			$username = $this->Auth->User("username");
			$user_active = $this->User->find('first', array(
	            'conditions' => array(
	            	'User.dealer_id' => $dealer_id,
	                'User.username' => $username 
			)));
			//debug($user_active);

			$this->Auth->login($user_active['User']);
			$this->Session->delete('eblat_app_multiple');
			$this->redirect(array('controller' => 'marketing', 'action' => 'index'));	

		}else{
			//debug("multiple dealership");
			$this->Session->write('eblat_app_multiple', $dealer_ids );
			$this->redirect(array('controller' => 'marketing', 'action' => 'index'));
		}

			
	}
    public function login() {
		$this->layout = 'default_login';

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
						$this->Session->delete('eblat_app_multiple', $dealer_ids );

						$this->Session->write('atlg', '225');

	        			$this->redirect(array('controller' => 'marketing', 'action' => 'index'));

	        			
					}else{
						$this->Session->setFlash(__('Invalid dealer id'), 'session_message', array('class' => 'alert-error'));
					}
				}else{
					$this->Session->setFlash(__('Invalid username or password, try again'), 'session_message', array('class' => 'alert-error'));
				}

				
      		}else{


      			$user_active = $this->User->find('first', array('fields' => array('id', 'zone', 'dealer_id', 'active', 'web_lead', 'round_robin'),
	                'conditions' => array(
	                	'User.dealer_id' => $this->request->data['User']['dealer_id'],
	                    'User.username' => $this->request->data['User']['username'], 
	                    'User.password' => $this->Auth->password($this->request->data['User']['password']),
	                    'User.group_id' => array('2','4','8','10','11','6','12','13')
				)));

	            if (!empty($user_active)) {
	                if ($user_active['User']['active']) {

	                    if ($this->Auth->login()) {

	                        $this->Session->delete('stat_user');
	                        $this->Session->delete('stats_month');
	                        $this->Session->delete('eblat_app_multiple', $dealer_ids );

	                        $this->redirect(array('controller' => 'marketing', 'action' => 'index'));
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
			$this->request->data['User']['dealer_id'] = $this->Cookie->read('login_dealer_id');   
		}
	}
	public function logout() {
        $this->Auth->logout();
		$this->redirect(array('controller' => 'marketing', 'action' => 'login'));
    }
    public function get_dealer_ids(){

    	$current_dealer_id = $this->Auth->User('dealer_id');
    	$other_locations = $this->Auth->User('other_locations');
    	
    	$other_locations_ar = array();
    	if($other_locations){
    		$other_locations_ar = explode(",", $other_locations);	
    	}
  

		if(array_search($current_dealer_id, $other_locations_ar) === false){
			$other_locations_ar[] = $current_dealer_id;
		}

    	$dconditions = array('User.dealer_id' => $other_locations_ar );
    	$user_active = $this->User->find('list', array('order' => "User.dealer_id", 'fields' => array('User.dealer_id', 'User.dealer'),
                'conditions' => $dconditions ));
    	ksort($user_active);
    	return $user_active;
    }


}