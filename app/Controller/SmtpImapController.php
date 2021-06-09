<?php

class SmtpImapController extends AppController {

    public $uses = array('ImapServer', 'SmtpServer');
    public $components = array('RequestHandler');

    public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function smtp() {

    	//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

		$this->layout = 'admin_default';
		$dealer_id = $this->Auth->User('dealer_id');
		$smtps = $this->Paginate('SmtpServer');
        $this->set('smtps', $smtps);
    }
	
	public function edit_smtp($id){
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user


		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='admin_default';
		if ($this->request->is('post')) {
			$this->SmtpServer->create();
			if ($this->SmtpServer->save($this->request->data)) {
				$this->Session->setFlash('SMTP server added', 'alert');
           		$this->redirect(array('action' => 'smtp'));
			}else{
				$this->Session->setFlash('Unable to add smtp', 'alert', array('class' => 'alert-error'));
			}
		}else{

			$options = array('conditions' => array('SmtpServer.' . $this->SmtpServer->primaryKey => $id));
			$this->request->data = $this->SmtpServer->find('first', $options);

		}
	}

	public function add_smtp(){

		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='admin_default';
		if ($this->request->is('post')) {
			$this->SmtpServer->create();
			if ($this->SmtpServer->save($this->request->data)) {
				$this->Session->setFlash('SMTP server added', 'alert');
           		$this->redirect(array('action' => 'smtp'));
			}else{
				$this->Session->setFlash('Unable to add smtp', 'alert', array('class' => 'alert-error'));
			}
		}
	}


	public function delete_smtp($id = null) {

		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
		

		$this->SmtpServer->id = $id;
		if (!$this->SmtpServer->exists()) {
			throw new NotFoundException(__('Invalid smtp'));
		}
		if ($this->SmtpServer->delete()) {
			$this->Session->setFlash(__('SMTP deleted'),'default',array('class'=>'success'));
			$this->redirect(array('action' => 'smtp'));
		}
		$this->redirect(array('action' => 'smtp'));
	}










	public function imap() {
		$this->layout = 'admin_default';
		$dealer_id = $this->Auth->User('dealer_id');
		$imaps = $this->Paginate('ImapServer');
        $this->set('imaps', $imaps);
    }
	
	public function edit_imap($id){
		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='admin_default';
		if ($this->request->is('post')) {
			$this->ImapServer->create();
			if ($this->ImapServer->save($this->request->data)) {
				$this->Session->setFlash('imap server added', 'alert');
           		$this->redirect(array('action' => 'imap'));
			}else{
				$this->Session->setFlash('Unable to add imap', 'alert', array('class' => 'alert-error'));
			}
		}else{

			$options = array('conditions' => array('ImapServer.' . $this->ImapServer->primaryKey => $id));
			$this->request->data = $this->ImapServer->find('first', $options);

		}
	}

	public function add_imap(){
		
		$dealer_id = $this->Auth->User('dealer_id');
	
		$this->layout='admin_default';
		if ($this->request->is('post')) {
			$this->ImapServer->create();
			if ($this->ImapServer->save($this->request->data)) {
				$this->Session->setFlash('imap server added', 'alert');
           		$this->redirect(array('action' => 'imap'));
			}else{
				$this->Session->setFlash('Unable to add imap', 'alert', array('class' => 'alert-error'));
			}
		}
	}


	public function delete_imap($id = null) {
		$this->ImapServer->id = $id;
		if (!$this->ImapServer->exists()) {
			throw new NotFoundException(__('Invalid imap'));
		}
		if ($this->ImapServer->delete()) {
			$this->Session->setFlash(__('imap deleted'),'default',array('class'=>'success'));
			$this->redirect(array('action' => 'imap'));
		}
		$this->redirect(array('action' => 'imap'));
	}













}
