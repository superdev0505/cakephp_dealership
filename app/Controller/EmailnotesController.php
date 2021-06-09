<?php
App::uses('CakeEmail', 'Network/Email');

class EmailnotesController extends AppController {

//	public function index() {
//		$this->layout='default_new';
//	}
	
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
	
		
	
	
	public function add() {
              date_default_timezone_set('America/Los_Angeles');
		//$this->loadModel('DevteamDaily');
		//$this->loadModel('Developer');
                
                /*$developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1')
    ));
                $this->set('developers',$developers);
                */
        if ($this->request->is('post')) {
			$this->request->data['Emailnote']['status'] =1;
			$this->Emailnote->create();
  			if($this->Emailnote->save($this->request->data)){
                            
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
			
			$this->Session->setFlash(__('Email info has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'emailnotes', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to add new Email.'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
	$this->layout = '';
		
	}
        
	public function edit($id) {
              date_default_timezone_set('America/Los_Angeles');
          //  debug($this->request->method());
        if ($this->request->is('PUT')) {
          
			//$this->Developer->create();
           $this->request->data['Emailnote']['id']=$id;
  			if($this->Emailnote->save($this->request->data)){
                            
			$this->Session->setFlash(__('Email info has been Updated.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'emailnotes', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to update Email info.'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
                
            $this->request->data=  $this->Emailnote->findById($id);    
		$this->layout = '';
	}
        
        
        
	public function adminindex() {
  date_default_timezone_set('America/Los_Angeles');
            $this->loadModel('DevteamDaily');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

	$this->loadModel('Emailnote');
        $developers = $this->Emailnote->find('all', array(
            'order' => array('Emailnote.id DESC')
                ));
      //  debug($developers);
        
        $this->set('developers', $developers);
	$this->layout = 'admin_default';
 	}
        
     
		
	public function admindelete($id) {
			
              date_default_timezone_set('America/Los_Angeles');
            $supports = $this->Emailnote->find('first',array('conditions'=>array('Emailnote.id'=>$id)));
                        
			if($supports['Emailnote']['status'] == 1)
                        {
                            $s=0;
                        }else {
                            $s=1;
                        }
                        
			if(!empty($supports)){
				$this->Emailnote->id = $id;
				$this->Emailnote->saveField('status',$s);
				$this->Session->setFlash(__(''), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'emailnotes', 'action' => 'adminindex'));

			}
 		$this->layout='default_new';
		}
		
	  
                
 
}