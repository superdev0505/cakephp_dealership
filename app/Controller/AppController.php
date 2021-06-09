<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('ConnectionManager', 'Model');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $theme = 'Default';
	
	public $components = array(
			'Session',
			//'Acl',
			'Email',
			//'RequestHandler',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'dashboards', 'action' => 'main'),
					'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
					'authorize' => array(
							
							)
			),
			'Search.Prg',
			// 'DebugKit.Toolbar'
	);


	public $helpers = array(
			'Session',
			'Time',
			'Dncprocess',
			'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
			'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
			'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
			
			
    );
	
	public $uses = array('Option','History','Contact','ManagerMessage','Event');
	
	public function beforeFilter(){
		$this->Auth->authError = "You need to login!!";
		
	
		if($this->params['crmreport'])
		{
			AuthComponent::$sessionKey = 'Auth.CrmReport';
			$this->Auth->loginRedirect=array('controller' => 'bdc_leads', 'action' => 'bdc_report','crmreport'=>true);
			$this->Auth->logoutRedirect=array('controller' => 'users', 'action' => 'login','crmreport'=>true);
			$this->Auth->authorize=array();
			
		}elseif($this->params['serviceapp']){
			AuthComponent::$sessionKey = 'Auth.ServiceApp';
			$this->Auth->loginRedirect=array('controller' => 'service_calendar', 'action' => 'main','serviceapp'=>true);
			$this->Auth->logoutRedirect=array('controller' => 'users', 'action' => 'login','serviceapp'=>true);
			$this->Auth->authorize=array();
			
		}elseif($this->params['bdcapp']){
			AuthComponent::$sessionKey = 'Auth.BdcApp';
			$this->Auth->loginRedirect=array('controller' => 'bdc_leads', 'action' => 'leads_main','bdcapp'=>true);
			$this->Auth->logoutRedirect=array('controller' => 'users', 'action' => 'login','bdcapp'=>true);
			$this->Auth->authorize=array();
			if($this->Auth->user())
			{
				$dealer_id=$this->Auth->user('dealer_id');
				$this->set_dealer_connection($dealer_id);
				$this->loadModel('DealerName');
				$dealer_info = $this->DealerName->findByDealer_id($dealer_id);
			$dealer_ids=$this->DealerName->find('list',array('fields'=>'dealer_id,name','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'],'DealerName.dealer_group !='=>0)));
			
			$this->set('dealer_info',$dealer_info);
			$build_ids=array('all_builds'=>'All Group')+$dealer_ids;
			$this->set(compact('build_ids'));
			}
			
		}
		
		


		//Disable options for notification controller
		if($this->request->params['controller'] != 'notifications'){ 


			$option_title = $this->Option->find('first',array('conditions'=>array('name'=>'title')));
			if(!empty($option_title)){
				$this->set('title',$option_title['Option']['value']);
			}
			else {
				$this->set('title','');
			}
			
			$option_copyright = $this->Option->find('first',array('conditions'=>array('name'=>'copyright')));
			if(!empty($option_copyright)){
				$this->set('copyright',$option_copyright['Option']['value']);
			}
			else {
				$this->set('copyright','');
			}
			// $temp_logo = $option_copyright['Option']['logo_dir'] . "/l_" . $option_copyright['Option']['logo'];
			// $this->set('logo',$temp_logo);
			
			$this->Contact->bindModel(array('belongsTo'=>array('User')));
			
			//Access log
			// $access_log_data['ip'] = $_SERVER['REMOTE_ADDR'];;
			// $access_log_data['url'] = $this->request->here;
			// $access_log_data['user_id'] = '0';
			// $access_log_data['user_id'] = '0';
			// $access_log_data['dealer_id'] = '0';
			// $access_log_data['sperson'] = '';
			// $access_log_data['http_user_agent'] = $_SERVER['HTTP_USER_AGENT'];


			$change_log = array();
			$userinfo = $this->Auth->user();
			if(!empty($userinfo)){


				// //Update Last activity
				// $this->loadModel("User");
				// $this->User->id = $userinfo['id'];
				// $timezoneSettingBackup = date_default_timezone_get();
				// date_default_timezone_set("UTC");
				// $this->User->saveField("last_activity", date("Y-m-d H:i:s"));
				// $access_log_data['created'] = date("Y-m-d H:i:s");

				// date_default_timezone_set($timezoneSettingBackup);
				
				// $access_log_data['user_id'] = $userinfo['id'];
				// $access_log_data['dealer_id'] = $userinfo['dealer_id'];
				// $access_log_data['sperson'] = $userinfo['first_name']." ".$userinfo['last_name'];
				

				// //debug($userinfo);
				// //Change Log
				// $this->History->bindModel(array('belongsTo'=>array(
				// 	'User'=>array(
				// 		'foreignKey'=>false,
				// 		'conditions'=>array('History.changed_by = User.id')
				// 	),
				// 	'Contact'
				// )));
				
				// $conditions = array( 'date_format(History.created,\'%Y-%m\')' => date('Y-m'),   'Contact.id <>' => null,    'History.hide' => '0', 'History.h_type' => 'Lead', 'History.user_id'=>$userinfo['id'], 'History.changed_by <>'=> $userinfo['id'] );
				// $this->set('bdc_lead_appointments', array());
			}else{
				// date_default_timezone_set("UTC");
				// $access_log_data['created'] = date("Y-m-d H:i:s");

			}
			$this->set('change_log',$change_log);

			//SAVE ACCESS LOG
			//debug($access_log_data);
			//$this->Contact->query("insert into access_logs (ip,url,user_id,created, http_user_agent,dealer_id,sperson) values(:ip,:url,:user_id,:created, :http_user_agent, :dealer_id, :sperson)", $access_log_data);

			
			
	        $this->set('web_lead_arrived', array());
	        
	       
	        $this->set('manager_messages', array());
			//debug($manager_messages);
			
	       // This count is for update alerts
		   $this->loadModel('UpdateAlert');
		   $l_user_id=$userinfo['id'];
		   $dealer_id = $userinfo['dealer_id'];
		   $system_update_alert=$this->UpdateAlert->find('count',array('conditions'=>array("UpdateAlert.hide_user_ids NOT LIKE" =>"%,$l_user_id%",'OR' => array('UpdateAlert.dealer_id LIKE' => '%,'.$dealer_id.'%','UpdateAlert.dealer_id' => '0'))));
		   $this->set(compact('system_update_alert'));
		   
		   if(in_array($this->params['controller'],array('dashboards','bdc_leads'))){
			   $this->Session->delete('c_leads.new_url');
			$this->Session->delete('c_leads.old_url');
		   }



		}


		//Cache Configuration 
		$this->Memcache_config = 'default';
		if($this->Auth->User()){
			$cash_dealer_id = $this->Auth->User("dealer_id");
			$cache_dealers_1 = array("1225","1280","1226","762","262","759","758","760","761","1370","491","1573","492","1627","1626","1640","560","1632","829","830","1224","881","1235","7005","1406","1715","112","1332","5000","2501","20010","1562","1788","1792","20020","5001","20040","20060","889","896","30000","20080","20090","1963","234","1409","33080","1485","1830","1833","1055","263","739","1289","40013","2070","2071","2079","2080","2081");
			// $cache_dealers_1 = array('5000');
			if(in_array($cash_dealer_id, $cache_dealers_1)){
				$this->Memcache_config = 'default_2';
			}
		}


	}
	
	public function beforeRender()
	{

		//Disable options for notification controller
		if($this->request->params['controller'] != 'notifications'){ 

			$open_menu = false;
			if($this->Auth->user()){
				$userinfo = $this->Auth->user();

				$this->loadModel("User");
				$this->User->id = $userinfo['id'];
				$timezoneSettingBackup = date_default_timezone_get();
				date_default_timezone_set("UTC");
				$this->User->saveField("last_activity", date("Y-m-d H:i:s"));
				date_default_timezone_set($timezoneSettingBackup);



				$this->loadModel("DealerSetting");
				$qr_code_activation = $this->DealerSetting->get_settings('qr_code_activation', $userinfo['dealer_id']);
				$this->set('qr_code_activation', $qr_code_activation);

				//Team Break Down
				$team_breakdown_settings = $this->DealerSetting->get_settings('team_breakdown', $userinfo['dealer_id']);
				$this->set('team_breakdown_settings', $team_breakdown_settings);

				$dnc_manual_uplaod_process = $this->DealerSetting->get_settings('dnc_manual_uplaod_process', $userinfo['dealer_id']);
				$this->set('dnc_manual_uplaod_process', $dnc_manual_uplaod_process);
				//debug($dnc_manual_uplaod_process);

				$activate_lite_version = $this->DealerSetting->get_settings('activate_lite_version', $userinfo['dealer_id']);
				$this->set('activate_lite_version', $activate_lite_version);
				// debug($activate_lite_version);

				
				//Vehicle match settings
				$vehicle_match_settings = "Off";
				$vmatch_settings = $this->Contact->query("SELECT * from dealer_settings where dealer_id = :dealer_id and name = 'vehicle_match_alert'", array("dealer_id"=>$userinfo['dealer_id']));
				if(!empty($vmatch_settings)){
					$vehicle_match_settings = $vmatch_settings['0']['dealer_settings']['value'];
				}
				$this->set('vehicle_match_settings', $vehicle_match_settings);


				
				if($open_menu == true){
					$this->set('hide_side_menu', 'Off');
				}else{
					$hide_side_menu = $this->requestAction("dealer_settings/get_settings/hide-side-menu");
		   			$this->set('hide_side_menu', $hide_side_menu);
				}

				//User settings 
				
				$default_user_settings_data = $this->Contact->query("SELECT Cs.id, Cs.settings_name, Cs.user_id, Cs.value
				FROM `crmgroup_settings` AS `Cs` WHERE  `Cs`.`user_id` = :user_id ;",array('user_id'=>$userinfo['id']));
				//debug($default_user_settings_data);

				$default_search_lead_range_ar = Set::extract("/Cs[settings_name=default_search_lead_range]",$default_user_settings_data);
				$default_search_lead_range = 'On';
				if(!empty($default_search_lead_range_ar)){
					$default_search_lead_range = $default_search_lead_range_ar['0']['Cs']['value'];
				}
				$this->set('default_search_lead_range', $default_search_lead_range);

				$event_reminder_email_ar = Set::extract("/Cs[settings_name=event_reminder_email]",$default_user_settings_data);
				$event_reminder_email = 'Off';
				if(!empty($event_reminder_email_ar)){
					$event_reminder_email = $event_reminder_email_ar['0']['Cs']['value'];
				}
				$this->set('event_reminder_email', $event_reminder_email);


				$login_redirect_workload_ar = Set::extract("/Cs[settings_name=login_redirect_workload]",$default_user_settings_data);
				$login_redirect_workload = 'Off';
				if(!empty($login_redirect_workload_ar)){
					$login_redirect_workload = $login_redirect_workload_ar['0']['Cs']['value'];
				}
				$this->set('login_redirect_workload', $login_redirect_workload);

				//debug($login_redirect_workload);
			}	
			
		}
	   
		// only compile it on development mode
		if (Configure::read('debug') > 1)
		{
			// import the file to application
			App::import('Vendor', 'lessc');
	
			// set the LESS file location
			$less = ROOT . DS . APP_DIR . DS .'View'.DS.'Themed'.DS.'Default'.DS. 'webroot' . DS . 'less' . DS . 'styleless.less';
	
			// set the CSS file to be written
			$css = ROOT . DS . APP_DIR . DS .'View'.DS.'Themed'.DS.'Default'.DS. 'webroot' . DS . 'css' . DS . 'styleless.css';
	
			// compile the file
			//lessc::ccompile($less, $css);
		}
		parent::beforeRender();
	}
	
	public function isAuthorized($user) {
		// Admin can access every action
		/*if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}*/
	
		// Default deny
		return true;// allow all for now
	}
	
	
	protected function get_dealer_settings($setting_name='')
	{
		$setting_val = false;
		$dealer_id = $this->Auth->user('dealer_id');
		if(!empty($setting_name))
		{
			$this->loadModel('DealerSetting');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => $setting_name, 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				$setting_val =  "Off";
			}else{
				$setting_val = $settings['DealerSetting']['value'];
			}
		}
		return $setting_val;
	}
	
	
	//
	/**
	* Method to set the Dealer specific database connection based on dealer pool 
	*
	* @param int $dealer_id
	* @return Void
	* @author Kamal Sharma
	*/
	protected function set_dealer_connection($dealer_id = NULL)
	{
		if(!empty($dealer_id)){
		// Create database pool connection based on the dealer id provided
            $pool_host = $pool_username = $pool_password=$pool_db_name ='';
            $this->loadModel('DealerPool');
			$pool_config = $this->DealerPool->find('first',array('conditions' => array('DealerPool.dealer_id' => $dealer_id)));		
			
            if(!empty($pool_config) ){
				
                $pool_db_name =  $pool_config['Pool']['db_name'];
                $pool_host =  	 $pool_config['Pool']['host'];
                $pool_username = $pool_config['Pool']['username'];
                $pool_password = $pool_config['Pool']['password'];
				
				$db_config = array(
					'datasource' => 'Database/Mysql',
					'persistent' => false,
					'host' => $pool_host,
					'login' =>  $pool_username,
					'password' => $pool_password,
					'database' => $pool_db_name,
					'prefix' => '',
					//'encoding' => 'utf8',
					);
					
				if(ConnectionManager::drop('default'))
				{
					$db_connection = ConnectionManager::create('default',$db_config);
				}
				
            }

            
		}
	}
	
	
	//
	/**
	* Method to set the  database connection based on dealer pool id
	*
	* @param int $pool_id
	* @return Void
	* @author Kamal Sharma
	*/
	protected function set_pool_connection($pool_id = NULL)
	{
		$connection_name = 'default';
		if(!empty($pool_id)){
		// Create database pool connection based on the dealer id provided
            $pool_host = $pool_username = $pool_password=$pool_db_name ='';
            $this->loadModel('Pool');
			$pool_config = $this->Pool->find('first',array('conditions' => array('Pool.id' => $pool_id)));	
			
            if(!empty($pool_config) ){
				$connection_name = 'db_pool_'. $pool_config['Pool']['id'];
                $pool_db_name =  $pool_config['Pool']['db_name'];
                $pool_host =  	 $pool_config['Pool']['host'];
                $pool_username = $pool_config['Pool']['username'];
                $pool_password = $pool_config['Pool']['password'];
				
				$db_config = array(
					'datasource' => 'Database/Mysql',
					'persistent' => false,
					'host' => $pool_host,
					'login' =>  $pool_username,
					'password' => $pool_password,
					'database' => $pool_db_name,
					'prefix' => '',
					//'encoding' => 'utf8',
					);
				$db_connection = ConnectionManager::create($connection_name,$db_config);
				ConnectionManager::create('default',$db_config);
				
				
            }            
		}
		
		return $connection_name;
	}
	
	protected function getDbPoolList()
	{
		$this->loadModel('Pool');
		$pool_list = $this->Pool->find('list',array('fields' => 'id,id'));
		return $pool_list;
	}
		
}