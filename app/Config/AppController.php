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
			'Acl',
			'Email',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'dashboards', 'action' => 'main'),
					'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
					'authorize' => array(
							
							)
			),
			'Search.Prg'
	);


	public $helpers = array(
			'Session',
			'Time',
			'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
			'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
			'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator')
			
    );
	
	public $uses = array('Option','History','Contact','ManagerMessage');
	
	public function beforeFilter(){
		$this->Auth->authError = "You need to login!!";
		
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
		$temp_logo = $option_copyright['Option']['logo_dir'] . "/l_" . $option_copyright['Option']['logo'];
		$this->set('logo',$temp_logo);
		
		$change_log = array();
		$userinfo = $this->Auth->user();
		if(!empty($userinfo)){
			//debug($userinfo);
			//Change Log
			$this->History->bindModel(array('belongsTo'=>array(
				'User'=>array(
					'foreignKey'=>false,
					'conditions'=>array('History.changed_by = User.id')
				),
				'Contact'
			)));
			
			if($userinfo['group_id'] == 1 || $userinfo['group_id'] == 3){
				$conditions = array('History.h_type' => 'Lead', 'History.changed_by <>'=> $userinfo['id'] );
			}else{
				$conditions = array('History.h_type' => 'Lead', 'History.user_id'=>$userinfo['id'], 'History.changed_by <>'=> $userinfo['id'] );
			}
			
			$change_log = $this->History->find('all',array(
				'order'=>array('History.created DESC'),'conditions'=>$conditions,
				'fields'=>array(
					'History.id','History.field_changed','History.contact_id','User.first_name','User.id','User.last_name' ,'Contact.first_name','Contact.id','Contact.last_name' 
				)
			));
			//debug($change_log);
		}
		$this->set('change_log',$change_log);
		
		//Web Lead Arrived
		$web_lead_arrived = $this->Contact->find('all', array('recursive'=>-1,'order'=>array('Contact.modified DESC'),'fields'=>array(
			'Contact.id','Contact.first_name','Contact.last_name','Contact.sales_step','Contact.lead_status','Contact.modified','Contact.status','Contact.source'
		),'conditions'=>array('Contact.sales_step'=>'Pending','Contact.contact_status_id'=>5)));
        $this->set('web_lead_arrived', $web_lead_arrived);
		//debug($web_lead_arrived);
		
		
		//Manager Message Alert
		
		$this->ManagerMessage->bindModel(array('belongsTo'=>array(
			'Contact'
		)));
		$manager_messages = $this->ManagerMessage->find('all', array('recursive'=>0,'order'=>array('ManagerMessage.created DESC'),
			'fields'=>array(
				'ManagerMessage.id','ManagerMessage.contact_id','ManagerMessage.from_id','ManagerMessage.to_id','ManagerMessage.sender_name','ManagerMessage.receiver_name','ManagerMessage.message','ManagerMessage.created',
				'Contact.first_name','Contact.last_name'
			),
			'conditions'=>array('ManagerMessage.to_id'=>$userinfo['id'])));
        $this->set('manager_messages', $manager_messages);
		//debug($manager_messages);
		
		
		/*
		$option_logo = $this->Option->find('first',array('conditions'=>array('name'=>'logo')));
		if(!empty($option_logo)){
			$this->set('logo',$option_logo['Option']['value']);
		}
		else {
			$this->set('logo','');
		}*/
		//$this->response->header('Cache-Control: no-transform');
	}
	
	public function beforeRender()
	{
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
		
}