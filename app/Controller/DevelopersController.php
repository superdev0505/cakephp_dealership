<?php
App::uses('CakeEmail', 'Network/Email');

class DevelopersController extends AppController {

//	public function index() {
//		$this->layout='default_new';
//	}
	
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
	
		
	
	
	public function add() {
            
		//$this->loadModel('DevteamDaily');
		//$this->loadModel('Developer');
                
                /*$developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1')
    ));
                $this->set('developers',$developers);
                */
              date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
			$this->request->data['Developer']['status'] =1;
			$this->Developer->create();
  			if($this->Developer->save($this->request->data)){
                            
			//sperson email
			/*$email = new CakeEmail();
			$email->config('support');
			$email->from("dealerweblead@gmail.com");
			$email->to($developerinfo['Developer']['email']);
			
			$email->subject('New Project');
			$email->template('newproject');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				'assign_to'=>$developerinfo['Developer']['name'],
				'sevarity' => $this->request->data['DevteamDaily']['sevarity'],
				'title' => $this->request->data['DevteamDaily']['title'], 'description' => $this->request->data['DevteamDaily']['description']));
            $email->send();
			*/
			
			$this->Session->setFlash(__('Developer info has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'developers', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to add new developer'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
	$this->layout = '';
		
	}
        
	public function edit($id) {
              date_default_timezone_set('America/Los_Angeles');
          //  debug($this->request->method());
        if ($this->request->is('PUT')) {
          
			//$this->Developer->create();
           $this->request->data['Developer']['id']=$id;
  			if($this->Developer->save($this->request->data)){
                            
			$this->Session->setFlash(__('Developer info has been Updated.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'developers', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to update developer info.'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
                
            $this->request->data=  $this->Developer->findById($id);    
		$this->layout = '';
	}
        
        
        
	public function adminindex() {

            $this->loadModel('DevteamDaily');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

	$this->loadModel('Developer');
        $developers = $this->Developer->find('all', array(
            'order' => array('Developer.id DESC')
                ));
      //  debug($developers);
        
        $this->set('developers', $developers);
	$this->layout = 'admin_default';
 	}
        
     
		
	public function admindelete($id) {
	  date_default_timezone_set('America/Los_Angeles');		
            $supports = $this->Developer->find('first',array('conditions'=>array('Developer.id'=>$id)));
                        
			if($supports['Developer']['status'] == 1)
                        {
                            $s=0;
                        }else {
                            $s=1;
                        }
                        
			if(!empty($supports)){
				$this->Developer->id = $id;
				$this->Developer->saveField('status',$s);
				$this->Session->setFlash(__(''), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'developers', 'action' => 'adminindex'));

			}
 		$this->layout='default_new';
		}
		
	  
                
 
}