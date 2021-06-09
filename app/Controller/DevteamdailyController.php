<?php
App::uses('CakeEmail', 'Network/Email');

class DevteamdailyController extends AppController {

	public function index() {
		$this->layout='default_new';
	}
	
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
	
		
	
	
	public function add($pid) {
            
		$this->loadModel('DevteamDaily');
		$this->loadModel('Developer');
                $this->loadModel('Emailnote');
                 $this->loadModel('Project');
                 $projinfo=$this->Project->findById($pid);
                 
      $this->set('pinfo',$this->Project->findById($pid));
                
                $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1')
    ));
    $this->set('developers',$developers);
      date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
			//$this->request->data['DevteamDaily']['developer_id'] = $this->Auth->user('id');
            
            
             ///File uploading Code
            ///File 1
            if($this->request->data['DevteamDaily']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file1']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            
                
              $orgfilename=$this->request->data['DevteamDaily']['file1']["name"];  
            //            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file1']=$fname;
                      $this->request->data['DevteamDaily']['org_file1']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['DevteamDaily']['file1']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file1']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file1']='';
            }
            
            
            ///File 2
            if($this->request->data['DevteamDaily']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file2']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
              $orgfilename=$this->request->data['DevteamDaily']['file2']["name"];  
            
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file2']=$fname;
                      $this->request->data['DevteamDaily']['org_file2']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['DevteamDaily']['file2']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file2']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file2']='';
            }
            
            ///File 3
            if($this->request->data['DevteamDaily']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file3']["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
             $orgfilename=$this->request->data['DevteamDaily']['file3']["name"];  
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file3']=$fname;
                     $this->request->data['DevteamDaily']['org_file3']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                  $this->request->data['DevteamDaily']['file3']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file3']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file3']='';
            }
            
                        
///End File Uploading code
            
            
			$this->DevteamDaily->create();
  			if($this->DevteamDaily->save($this->request->data)){
                            
                          
			 $developerinfo = $this->Developer->findById($this->request->data['DevteamDaily']['developer_id']);			
			
			  $demails=array('andrew@dp360crm.com',$developerinfo['Developer']['email']);
                          if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                                $demails = set::merge($demails, $_POST['to_others']);
                            }
                            
//                            debug($demails);
//                            exit('test');
                            
			//admin email
			/*$email = new CakeEmail();
			$email->config('sender');
			$email->from("sender@dp360crm.com");
			$email->to($demails); 
			//$email->to(array('dan@dp360crm.com','andrew@dp360crm.com','andrew@dp360crm.com','tad@dp360crm.com','russel@dp360crm.com','kmlshrm167@gmail.com')); 
			//$email->to(array('andrew@dp360crm.com','kodegeek12@gmail.com')); 
			//$email->to(array('kodegeek12@gmail.com')); 
						
			
			$email->subject('New To-do');
			$email->template('newproject');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				'assign_to'=>$developerinfo['Developer']['name'],
				'sevarity' => $this->request->data['DevteamDaily']['sevarity'],
				'pname' => $projinfo['Project']['name'],
				'title' => $this->request->data['DevteamDaily']['title'], 'description' => $this->request->data['DevteamDaily']['description']));
                        $email->send();
			*/
                            
                            
                  
                               /**  
                                * 
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"new_todo",
			'New To-do',
			"sender",
			serialize(array(
				'assign_to'=>$developerinfo['Developer']['name'],
				'sevarity' => $this->request->data['DevteamDaily']['sevarity'],
				'pname' => $projinfo['Project']['name'],
				'title' => $this->request->data['DevteamDaily']['title'],
                            'description' => $this->request->data['DevteamDaily']['description'])
                                ),
			'sender@dp360crm.com',
			'newproject',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end	
			
			//sperson email
			/*$email = new CakeEmail();
			$email->config('sender');
			$email->from("sender@dp360crm.com");
			$email->to($developerinfo['Developer']['email']);
			
			$email->subject('New To-do (Copy)');
			$email->template('newproject');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				'assign_to'=>$developerinfo['Developer']['name'],
				'sevarity' => $this->request->data['DevteamDaily']['sevarity'],
				'pname' => $projinfo['Project']['name'],
				'title' => $this->request->data['DevteamDaily']['title'], 'description' => $this->request->data['DevteamDaily']['description']));
            $email->send();*/
			
			
			$this->Session->setFlash(__('New To-do has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to add new To-do'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
                
                 
                $this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));
		$this->layout = '';
		
	}
	
	public function add_todo($pid) {
              date_default_timezone_set('America/Los_Angeles');
		$this->loadModel('DevteamDaily');
		$this->loadModel('Developer');
                $this->loadModel('Emailnote');
                 $this->loadModel('Project');
                 $projinfo=$this->Project->findById($pid);
                 
      $this->set('pinfo',$this->Project->findById($pid));
                
                $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1')
    ));
                $this->set('developers',$developers);
                
        if ($this->request->is('post')) {
			//$this->request->data['DevteamDaily']['developer_id'] = $this->Auth->user('id');
            
                 ///File uploading Code
            ///File 1
            if($this->request->data['DevteamDaily']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file1']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            
                
                
            //            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file1']=$fname;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['DevteamDaily']['file1']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file1']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file1']='';
            }
            
            
            ///File 2
            if($this->request->data['DevteamDaily']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file2']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            
            
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file2']=$fname;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['DevteamDaily']['file2']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file2']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file2']='';
            }
            
            ///File 3
            if($this->request->data['DevteamDaily']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/todo/";
            $target_file = $target_dir . basename($this->request->data['DevteamDaily']['file3']["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['DevteamDaily']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['DevteamDaily']['file3']=$fname;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                  $this->request->data['DevteamDaily']['file3']='';
                }
            }else{
                $this->request->data['DevteamDaily']['file3']='';
            }
            
            }else{
                $this->request->data['DevteamDaily']['file3']='';
            }
            
                        
///End File Uploading code
            
            
            
			$this->DevteamDaily->create();
  			if($this->DevteamDaily->save($this->request->data)){
                            
                          
			 $developerinfo = $this->Developer->findById($this->request->data['DevteamDaily']['developer_id']);			
			
			  $demails=array('andrew@dp360crm.com',$developerinfo['Developer']['email']);
                          if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                                $demails = set::merge($demails, $_POST['to_others']);
                            }
                            
                  
                               /**  
                                * 
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"new_todo",
			'New To-do',
			"sender",
			serialize(array(
				'assign_to'=>$developerinfo['Developer']['name'],
				'sevarity' => $this->request->data['DevteamDaily']['sevarity'],
				'pname' => $projinfo['Project']['name'],
				'title' => $this->request->data['DevteamDaily']['title'],
                            'description' => $this->request->data['DevteamDaily']['description'])
                                ),
			'sender@dp360crm.com',
			'newproject',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end	
			
			
			$this->Session->setFlash(__('New To-do has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'supports', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to add new To-do'), 'alert', array('class' => 'alert-error'));
			}
 			
		}
                
                 
                $this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));
		$this->layout = '';
		
	}
        
        
        
	public function adminindex($pid) {
            date_default_timezone_set('America/Los_Angeles');
            $this->loadModel('DevteamDaily');
            //$this->loadModel('DevteamDaily');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

      $this->loadModel('Project');
      $this->set('pinfo',$this->Project->findById($pid));
                
                  if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
            //$date=date('Y-m-d',  strtotime($this->request->data['devteamdaily']['select_date']));
//            debug($date);
//            exit('test');
            $pendings = $this->DevteamDaily->find('count',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.developer_id'=>$this->request->data['devteamdaily']['developer_id'],'DevteamDaily.project_id'=>$pid)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            $supports = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.developer_id'=>$this->request->data['devteamdaily']['developer_id'],'DevteamDaily.project_id'=>$pid)));
            $cal_responsetime = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'1','DevteamDaily.developer_id'=>$this->request->data['devteamdaily']['developer_id'],'DevteamDaily.project_id'=>$pid)));
        }elseif(isset($this->request->data['devteamdaily']['select_date']) && $this->request->data['devteamdaily']['select_date']!=''){
            $date=date('Y-m-d',  strtotime($this->request->data['devteamdaily']['select_date']));
//            debug($date);
//            exit('test');
            $pendings = $this->DevteamDaily->find('count',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'0','DATE(DevteamDaily.created)'=>$date)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            $supports = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DATE(DevteamDaily.created)'=>$date)));
            $cal_responsetime = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'1','DATE(DevteamDaily.created)'=>$date)));
        }elseif(isset($this->request->data['stats_month']['month']) && $this->request->data['stats_month']['month']!=''){
            $year=date('Y');
            $month=$this->request->data['stats_month']['month'];
//            debug($month);
//            exit('test');
            $pendings = $this->DevteamDaily->find('count',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'0','DevteamDaily.project_id'=>$pid,'YEAR(DevteamDaily.created)'=>$year,'MONTH(DevteamDaily.created)'=>$month)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','YEAR(Support.created)'=>$year,'MONTH(Support.created)'=>$month)));
            $supports = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('YEAR(DevteamDaily.created)'=>$year,'MONTH(DevteamDaily.created)'=>$month,'DevteamDaily.project_id'=>$pid)));
            
            $cal_responsetime = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'1','DevteamDaily.project_id'=>$pid,'YEAR(DevteamDaily.created)'=>$year,'MONTH(DevteamDaily.created)'=>$month)));
            
        }
        else{
            
             $date=date('Y-m-d');
            $pendings = $this->DevteamDaily->find('count',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'0','DevteamDaily.project_id'=>$pid)));
            
            $supports = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.project_id'=>$pid)));
           // $supports = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC'));
//            debug($supports);
//            exit('test');
            
            
            $cal_responsetime = $this->DevteamDaily->find('all',array('order'=>'DevteamDaily.id DESC',  'conditions'=>array('DevteamDaily.status'=>'1','DevteamDaily.project_id'=>$pid)));
        }
        
        if(!empty($cal_responsetime)){
        $timeDiff=0;
            foreach ($cal_responsetime as $value) {
                $perticketimeDiff=  strtotime($value['DevteamDaily']['modified']) - strtotime($value['DevteamDaily']['created']);
            $timeDiff+=$perticketimeDiff;
//            debug('perTicket: '.$perticketimeDiff);
//            debug('calculate Time: '.$timeDiff);
                
            }
            
            //calculate avg time
            $avgTime=$timeDiff/count($cal_responsetime);
            
                        //calculate in Days
            $avg_responsetime=floor($avgTime/86400);
            
            if($avg_responsetime==0){
                       //calculate in Min
            $avg_minutes = floor(($avgTime / 60) % 60);
            }  else {
                $avg_minutes =0;
            }
//            debug(count($cal_responsetime));
//            debug($timeDiff);
//            debug($avgTime);
//            debug($avg_responsetime);
//            exit('test');
            
        }else{
            $avg_responsetime=0;
            $avg_minutes =0;
        }
        
	$this->loadModel('Developer');
        $developers = $this->Developer->find('list', array(
            'conditions' => array('Developer.status' => '1')
                ));
        $this->set('developers', $developers);
        $this->set('pid', $pid);
        
        if(isset($this->request->data['stats_month']['month']) && $this->request->data['stats_month']['month']!=''){
        $this->set('month',$this->request->data['stats_month']['month']);    
        }else{
         $this->set('month','');   
        }
        


        $this->layout='support';
		$this->set('supports',$supports);
		$this->set('pendings',$pendings);
		$this->set('avg_responsetime',$avg_responsetime);
		$this->set('avg_minutes',$avg_minutes);
		$this->set('cal_responsetime',$cal_responsetime);
		
		$this->layout = 'admin_default';
 	}
        
         public function closed_status($id) {
        
  date_default_timezone_set('America/Los_Angeles');
//Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user
        $this->layout = '';
        $this->loadModel('DevteamHistory');
       $allresults = $this->DevteamHistory->find('all', array(
            'conditions' => array('DevteamHistory.support_id'=>$id),
            'order' => array('DevteamHistory.id DESC')
           ));
   
   $this->set(compact('allresults'));

    }
		
	public function admindelete($id) {

              date_default_timezone_set('America/Los_Angeles');
            $supports = $this->Support->find('first',array('conditions'=>array('Support.id'=>$id)));
			$supports['Support']['status'] = 1;
			if(!empty($supports)){
				$this->Support->id = $id;
				$this->Support->saveField('status',1);
				$this->Session->setFlash(__('Ticke has been closed!'), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'supports', 'action' => 'adminindex'));

			}
 		$this->layout='default_new';
		}
		
		
           
public function send($id=null) {
 
   date_default_timezone_set('America/Los_Angeles');
    $this->layout='';
    $this->loadModel('Emailnote');
    
     $this->loadModel('DevteamDaily');    
     $dinfo=$this->DevteamDaily->findById($id);
     
     $this->loadModel('Project');
     $projinfo=$this->Project->findById($dinfo['DevteamDaily']['project_id']);
     
    
        if ($this->request->is('post')) {
//            debug($this->request->data);
//            exit('test');
             $this->set('save_sucees', true);
             
                
                       // exit('test');
            $this->loadModel('DevteamHistory');      
             
            $this->loadModel('Developer');      
            $this->request->data['DevteamHistory']['note'] = $this->request->data['note'];
            $this->request->data['DevteamHistory']['percentage'] = $this->request->data['percentage'];
            $this->request->data['DevteamHistory']['status'] = $this->request->data['response_status'];
            $this->request->data['DevteamHistory']['support_id'] = $id;
            

                    $ticketinfo=$this->DevteamDaily->findById($id);
			 $demails=array('andrew@dp360crm.com');
                          if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                                $demails = set::merge($demails, $_POST['to_others']);
                            }
/*                            
			//admin email
			$email = new CakeEmail();
			$email->config('sender');
			$email->from("sender@dp360crm.com");
                        $email->to($demails); 
			$email->subject('To-do Status');
			$email->template('responseproject');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				'title'=>$ticketinfo['DevteamDaily']['title'],
				'status'=>$this->request->data['response_status'],
				'percentage'=>$this->request->data['percentage'],
				'pname' => $projinfo['Project']['name'],
				'note'=>$this->request->data['note'],
				'description'=>$ticketinfo['DevteamDaily']['description'],
				'created'=>$ticketinfo['DevteamDaily']['created'],
				'name'=>$ticketinfo['Developer']['name']
                                ));
                        //$email->send();
			*/
                            
            //; 
                            $this->DevteamHistory->create();
						
			if($this->DevteamHistory->save($this->request->data)){
                            
                               /**  
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"send_status",
			'To-do Status',
			"sender",
			serialize(array(
				'title'=>$ticketinfo['DevteamDaily']['title'],
				'status'=>$this->request->data['response_status'],
				'percentage'=>$this->request->data['percentage'],
				'pname' => $projinfo['Project']['name'],
				'note'=>$this->request->data['note'],
				'description'=>$ticketinfo['DevteamDaily']['description'],
				'created'=>$ticketinfo['DevteamDaily']['created'],
				'name'=>$ticketinfo['Developer']['name']
                                )
                                ),
			'sender@dp360crm.com',
			'responseproject',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end	
                            
                            
                            
                 if ($this->request->data['response_status'] == 'Close') {
                    $this->DevteamDaily->id = $id;
                    $this->DevteamDaily->saveField('status', 1);
                }
                        
			$this->Session->setFlash(__('To-do Status has been sent.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'Projects', 'action' => 'adminindex'));
			
			}else{
				$this->Session->setFlash(__('Unable to sent To-do Status.'), 'alert', array('class' => 'alert-error'));
                                $this->redirect(array('controller' => 'Projects', 'action' => 'adminindex'));
			}
                        
          
           
        }
       // $this->loadModel('User');
      //  $dealers_list = $this->User->find('list', array('fields' => array('User.dealer_id', 'User.dealer'), 'conditions' => array('User.dealer_id !=' => '')));
        // debug($dealers_list);

       // $this->set('dealers_list', $dealers_list);
        
         $this->loadModel('DevteamHistory');
            $allresults = $this->DevteamHistory->find('all', array(
                'conditions' => array('DevteamHistory.support_id' => $id),
                'order' => array('DevteamHistory.id DESC')
                    ));

            $this->set(compact('allresults'));
         $this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));
        $this->set('sid', $id);
    }     
                
 
}