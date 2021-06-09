<?php
App::uses('CakeEmail', 'Network/Email');

class ProjectsController extends AppController {

//	public function index() {
//		$this->layout='default_new';
//	}

	public function beforeFilter() {

		parent::beforeFilter();
	}

	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}


	public function gettodolist($id) {
       $this->autoRender=FALSE;
       $this->layout='';
          $this->loadModel('DevteamDaily');

        return $this->DevteamDaily->find('count', array(
           'conditions' => array('DevteamDaily.project_id'=>$id)
           ));

   }


   public function download($id) {
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        $name=  explode('.', $id);

        $params = array(
            'id'        => $id,
            'name'      => $name[0],
            'download'  => true,
            'extension' => $name[1],
            'path'      => WWW_ROOT."files".DS."projects".DS
        );
        $this->set($params);
    }


   public function download_note($id) {
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        $name=  explode('.', $id);

        $params = array(
            'id'        => $id,
            'name'      => $name[0],
            'download'  => true,
            'extension' => $name[1],
            'path'      => WWW_ROOT."files".DS."notes".DS
        );
        $this->set($params);
    }



   public function download_todo($id) {
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        $name=  explode('.', $id);

        $params = array(
            'id'        => $id,
            'name'      => $name[0],
            'download'  => true,
            'extension' => $name[1],
            'path'      => WWW_ROOT."files".DS."todo".DS
        );
        $this->set($params);
    }


	public function add() {
         $this->loadModel('Emailnote');
         $this->loadModel('Developer');
    $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1'),
        'order'=>'Developer.name ASC'
    ));
    $this->set('developers',$developers);

        date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {

//            debug($this->request->data);
//            exit('test');
            
            $demails = array('andrew@dp360crm.com','andrew@dp360crm.com');
            if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                $demails = set::merge($demails, $_POST['to_others']);
            }

            ///File uploading Code
            ///File 1
            if($this->request->data['Project']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file1']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

                $orgfilename=$this->request->data['Project']['file1']["name"];
//
//            debug($imageFileType);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file1']=$fname;
                    $this->request->data['Project']['org_file1']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['Project']['file1']='';
                }
            }else{
                $this->request->data['Project']['file1']='';
            }

            }else{
                $this->request->data['Project']['file1']='';
            }


            ///File 2
            if($this->request->data['Project']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file2']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

              $orgfilename2=$this->request->data['Project']['file2']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file2']=$fname;
                   $this->request->data['Project']['org_file2']=$orgfilename2;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                   $this->request->data['Project']['file2']='';
                }
            }else{
                $this->request->data['Project']['file2']='';
            }

            }else{
                $this->request->data['Project']['file2']='';
            }

            ///File 3
            if($this->request->data['Project']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file3']["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
             $orgfilename3=$this->request->data['Project']['file3']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file3']=$fname;
                    $this->request->data['Project']['org_file3']=$orgfilename3;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                  $this->request->data['Project']['file3']='';
                }
            }else{
                $this->request->data['Project']['file3']='';
            }

            }else{
                $this->request->data['Project']['file3']='';
            }


///End File Uploading code



                        $this->request->data['Project']['status'] =0;
			$this->Project->create();
  			if($this->Project->save($this->request->data)){

                             $pid = $this->Project->getLastInsertId();
			//sperson email
			/*$email = new CakeEmail();
			$email->config('sender');
			$email->from("sender@dp360crm.com");
			$email->to($demails);
			//$email->to('kodegeek12@gmail.com');

			$subject='DP360 CRM - Project #'.$pid.' - New Project';
                        $email->subject($subject);
			$email->template('newprt');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
			    'pname' => $this->request->data['Project']['name'],
                            'description' => $this->request->data['Project']['description']));
                        $email->send();*/

                 $subject='DP360 CRM - Project #'.$pid.' - New Project';

                        /**
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"add_project",
			$subject,
			"sender",
			serialize(array(
			    'severity' => $this->request->data['Project']['severity'],
			    'pname' => $this->request->data['Project']['name'],
                            'description' => $this->request->data['Project']['description'])),
			'sender@dp360crm.com',
			'newprt',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end




			$this->Session->setFlash(__('Project info has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));

			}else{
				$this->Session->setFlash(__('Unable to add new project'), 'alert', array('class' => 'alert-error'));
			}

		}

                $this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));

		$this->layout = '';

	}


      public function file_upload($id,$s=null) {

       $this->loadModel('ProjectFile');
        date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
             $this->request->data['ProjectFile']['project_id']=$id;
            $success=0;

            ///File uploading Code
            ///File 1
            if($this->request->data['ProjectFile']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['ProjectFile']['file1']["name"]);

           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

               $orgfilename=$this->request->data['ProjectFile']['file1']["name"];

            //            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['ProjectFile']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $success = 1;
                    $this->request->data['ProjectFile']['file1']=$fname;
                    $this->request->data['ProjectFile']['org_filename']=$orgfilename;

                    $this->ProjectFile->create();
            $this->ProjectFile->id=null;
            $this->request->data['ProjectFile']['filename']=$this->request->data['ProjectFile']['file1'];
            $this->ProjectFile->save($this->request->data);


                } else {
                   // echo "Sorry, there was an error uploading your file.";
                    $this->request->data['ProjectFile']['file1']='';
                }
            }else{
                $this->request->data['ProjectFile']['file1']='';
            }

            }


            ///File 2
            if($this->request->data['ProjectFile']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['ProjectFile']['file2']["name"]);
            //$uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

            $orgfilename=$this->request->data['ProjectFile']['file2']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['ProjectFile']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                   $success = 1;
                    $this->request->data['ProjectFile']['file2']=$fname;
                     $this->request->data['ProjectFile']['org_filename']=$orgfilename;
                    $this->ProjectFile->create();
            $this->ProjectFile->id=null;
            $this->request->data['ProjectFile']['filename']=$this->request->data['ProjectFile']['file2'];
            $this->ProjectFile->save($this->request->data);

                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['ProjectFile']['file2']='';
                }
            }else{
                $this->request->data['ProjectFile']['file2']='';
            }


            }

            ///File 3
            if($this->request->data['ProjectFile']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['ProjectFile']['file3']["name"]);
            //$uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            $orgfilename=$this->request->data['ProjectFile']['file3']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['ProjectFile']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                 $success = 1;
                        $this->request->data['ProjectFile']['file3'] = $fname;
                         $this->request->data['ProjectFile']['org_filename']=$orgfilename;
                        $this->ProjectFile->create();
                        $this->ProjectFile->id = null;
                        $this->request->data['ProjectFile']['filename'] = $this->request->data['ProjectFile']['file3'];
                        $this->ProjectFile->save($this->request->data);
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['ProjectFile']['file3']='';
                }
            }else{
                $this->request->data['ProjectFile']['file3']='';
            }



            }
///End File Uploading code

  			if($success){
			$this->Session->setFlash(__('File Uploaded Successfully.'), 'alertsuccess', array('class' => 'alert-success'));


			}else{
				$this->Session->setFlash(__('Unable to Upload file.'), 'alert', array('class' => 'alert-error'));
			}
                        if($s=='s'){
 			$this->redirect(array('controller' => 'Supports', 'action' => 'adminindex'));
                        }else{
 			$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
                        }
		}

                //$this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));

		$this->layout = '';

	}

	public function edit($id) {
              $this->loadModel('Emailnote');
              $this->loadModel('Developer');
          //  debug($this->request->method());

                date_default_timezone_set('America/Los_Angeles');

                $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1'),
        'order'=>'Developer.name ASC'
    ));
    $this->set('developers',$developers);

        if ($this->request->is('PUT')) {

            $demails = array('andrew@dp360crm.com');

            if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                $demails = set::merge($demails, $_POST['to_others']);
            }

	 $oldinfo=$this->Project->findById($id);


            ///File uploading Code
            ///File 1
            if($this->request->data['Project']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file1']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

           $orgfilename=$this->request->data['Project']['file1']["name"];

            //            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file1']=$fname;
                     $this->request->data['Project']['org_file1']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                  $this->request->data['Project']['file1']=$oldinfo['Project']['file1'];
                  $this->request->data['Project']['org_file1']=$oldinfo['Project']['org_file1'];
                }
            }
            else{
                $this->request->data['Project']['file1']=$oldinfo['Project']['file1'];
                $this->request->data['Project']['org_file1']=$oldinfo['Project']['org_file1'];
            }

            }
            else{
                $this->request->data['Project']['file1']=$oldinfo['Project']['file1'];
                $this->request->data['Project']['org_file1']=$oldinfo['Project']['org_file1'];
            }


            ///File 2
            if($this->request->data['Project']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file2']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            $orgfilename2=$this->request->data['Project']['file2']["name"];

//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file2']=$fname;
                    $this->request->data['Project']['org_file2']=$orgfilename2;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['Project']['file2']=$oldinfo['Project']['file2'];
                     $this->request->data['Project']['org_file2']=$oldinfo['Project']['org_file2'];
                }
            }
            else{
                $this->request->data['Project']['file2']=$oldinfo['Project']['file2'];
                $this->request->data['Project']['org_file2']=$oldinfo['Project']['org_file2'];
            }

            }
            else{
                $this->request->data['Project']['file2']=$oldinfo['Project']['file2'];
                $this->request->data['Project']['org_file2']=$oldinfo['Project']['org_file2'];
            }

            ///File 3
            if($this->request->data['Project']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/projects/";
            $target_file = $target_dir . basename($this->request->data['Project']['file3']["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
           $orgfilename3=$this->request->data['Project']['file3']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Project']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Project']['file3']=$fname;
                    $this->request->data['Project']['org_file3']=$orgfilename3;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                      $this->request->data['Project']['file3']=$oldinfo['Project']['file3'];
                      $this->request->data['Project']['org_file3']=$oldinfo['Project']['org_file3'];
                }
            }
            else{
                $this->request->data['Project']['file3']=$oldinfo['Project']['file3'];
                $this->request->data['Project']['org_file3']=$oldinfo['Project']['org_file3'];
            }

            }
            else{
                $this->request->data['Project']['file3']=$oldinfo['Project']['file3'];
                $this->request->data['Project']['org_file3']=$oldinfo['Project']['org_file3'];
            }


///End File Uploading code




            //$this->Developer->create();
           $this->request->data['Project']['id']=$id;
  			if($this->Project->save($this->request->data)){

			////send email

                            //sperson email
			/*$email = new CakeEmail();
			$email->config('sender');
			$email->from("sender@dp360crm.com");
			$email->to($demails);
			//$email->to('kodegeek12@gmail.com');

			$subject='DP360 CRM - Project #'.$id.' - Update Project';
                        $email->subject($subject);
			$email->template('upprt');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
			    'pname' => $this->request->data['Project']['name'],
                            'description' => $this->request->data['Project']['description']));
                        $email->send();
                            ///end send eamil
                        */

                     $subject='DP360 CRM - Project #'.$id.' - Update Project';
                          /**
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"update_project",
			$subject,
			"sender",
			serialize(array(
			    'severity' => $this->request->data['Project']['severity'],
			    'pname' => $this->request->data['Project']['name'],
                            'description' => $this->request->data['Project']['description'])),
			'sender@dp360crm.com',
			'upprt',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end


                            $this->Session->setFlash(__('Project info has been Updated.'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));

			}else{
				$this->Session->setFlash(__('Unable to update Project info.'), 'alert', array('class' => 'alert-error'));
			}

		}

                 $this->set('emails',$this->Emailnote->find('all',array('conditions'=>array('Emailnote.status'=>1), 'order' => array('Emailnote.name ASC'))));


            $this->request->data=  $this->Project->findById($id);
		$this->layout = '';
		  //exit('test');
	}



	public function adminindex($pid=null) {
            date_default_timezone_set('America/Los_Angeles');
          // Configure::write('debug',2);
//            $this->load

           // $this->loadModel('Project');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

	$this->loadModel('Project');
	$this->loadModel('ProjectFile');
 $this->Project->bindModel(
        array('hasMany' => array(
                'ProjectFile' => array(
                    'className' => 'ProjectFile'
                )
            )
        )
    );

 $this->Project->bindModel(
        array('belongsTo' => array(
                'Support' => array(
                    'className' => 'Support'
                )
            )
        )
    );


 if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
     $con=array('Project.status'=>0,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id']);
     $this->set('filter',1);
 }elseif(!empty($pid)){
            $con=array('Project.status'=>0,'Project.id'=>$pid);
        }else{
            $con=array('Project.status'=>0);
        }


        $projects= $this->Project->find('all', array(
            'conditions' => $con,
            'order' => array('Project.id DESC'),
            'recursive' =>2));


//        debug($projects);
//        exit('test');
        if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
        $totalprojects= $this->Project->find('count', array(
            'conditions' => array('Project.status'=>0,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id'])));
        }else{
        $totalprojects= $this->Project->find('count', array(
            'conditions' => array('Project.status'=>0)));

        }


        $this->set('totalprojects',$totalprojects);



        $quicklins= $this->Project->find('all', array(
            'conditions' => array('Project.status'=>0),
            'order' => array('Project.id DESC')));


        $allquicklinks = array();
        foreach ($quicklins as $value) {
            $new = array($value['Project']['id'] => 'Project # '.$value['Project']['id'].' - '.$value['Project']['name']);
            $allquicklinks = Set::merge($allquicklinks, $new);
        }

        $this->set('allquicklinks',$allquicklinks);

//        debug($projects);
//        exit('test');
      //  debug($developers);



        if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
        $this->set('closed', $this->Project->find('count', array(
            'conditions' => array('Project.status'=>1,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id']))));

        $cal_responsetime = $this->Project->find('all',array('order'=>'Project.id DESC',  'conditions'=>array('Project.status'=>'1','Project.developer_id'=>$this->request->data['devteamdaily']['developer_id'])));


        }else{
        $this->set('closed', $this->Project->find('count', array(
            'conditions' => array('Project.status'=>1)
                )));

          $cal_responsetime = $this->Project->find('all',array('order'=>'Project.id DESC',  'conditions'=>array('Project.status'=>'1')));


        }

        $this->set('projects', $projects);



        if(!empty($cal_responsetime)){
        $timeDiff=0;
            foreach ($cal_responsetime as $value) {
                $perticketimeDiff=  strtotime($value['Project']['modified']) - strtotime($value['Project']['created']);
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
        $this->set('avg_responsetime',$avg_responsetime);
        $this->set('avg_minutes',$avg_minutes);


         $this->loadModel('Developer');
    $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1'),
        'order'=>'Developer.name ASC'
    ));
    $this->set('developers',$developers);

	$this->layout = 'admin_default';
 	}


        public function testproject(){
            $this->layout = 'admin_default';

            $this->loadModel('Project');
            $this->loadModel('ProjectFile');
            Configure::write('debug', 2);

               $quicklins= $this->Project->find('all', array(
            'conditions' => array('Project.status'=>0),
            'order' => array('Project.id DESC')));
            debug($quicklins);
            exit('test');




        }


	public function close($pid=null) {

              date_default_timezone_set('America/Los_Angeles');

           // $this->loadModel('Project');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

	$this->loadModel('Project');
        $this->loadModel('ProjectFile');
 $this->Project->bindModel(
        array('hasMany' => array(
                'ProjectFile' => array(
                    'className' => 'ProjectFile'
                )
            )
        )
    );



 $this->Project->bindModel(
        array('belongsTo' => array(
                'Support' => array(
                    'className' => 'Support'
                )
            )
        )
    );


           if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
     $con=array('Project.status'=>1,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id']);
     $this->set('filter',1);
 }elseif(!empty($pid)){
            $con=array('Project.status'=>1,'Project.id'=>$pid);
        }else{
            $con=array('Project.status'=>1);
        }


        $projects= $this->Project->find('all', array(
            'conditions' => $con,
            'order' => array('Project.id DESC'),
            'recursive' =>2));

          if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){
        $totalprojects= $this->Project->find('count', array(
            'conditions' => array('Project.status'=>1,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id'])));
        }else{
        $totalprojects= $this->Project->find('count', array(
            'conditions' => array('Project.status'=>1)));

        }
        $this->set('totalprojects',$totalprojects);



        $quicklins= $this->Project->find('all', array(
            'conditions' => array('Project.status'=>1),
            'order' => array('Project.id DESC')));


        $allquicklinks = array();
        foreach ($quicklins as $value) {
            $new = array($value['Project']['id'] => 'Project # '.$value['Project']['id'].' - '.$value['Project']['name']);
            $allquicklinks = Set::merge($allquicklinks, $new);
        }

        $this->set('allquicklinks',$allquicklinks);

        $this->set('projects', $projects);


         if(isset($this->request->data['devteamdaily']['developer_id']) && $this->request->data['devteamdaily']['developer_id']!=''){

         $this->set('pendings', $this->Project->find('count', array(
            'conditions' => array('Project.status'=>0,'Project.developer_id'=>$this->request->data['devteamdaily']['developer_id'])
                )));

         $cal_responsetime = $this->Project->find('all',array('order'=>'Project.id DESC',  'conditions'=>array('Project.status'=>'1','Project.developer_id'=>$this->request->data['devteamdaily']['developer_id'])));

        }else{
        $this->set('pendings', $this->Project->find('count', array(
            'conditions' => array('Project.status'=>0)
                )));

         $cal_responsetime = $this->Project->find('all',array('order'=>'Project.id DESC',  'conditions'=>array('Project.status'=>'1')));

        }





        if(!empty($cal_responsetime)){
        $timeDiff=0;
            foreach ($cal_responsetime as $value) {
                $perticketimeDiff=  strtotime($value['Project']['modified']) - strtotime($value['Project']['created']);
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
        $this->set('avg_responsetime',$avg_responsetime);
	$this->set('avg_minutes',$avg_minutes);


         $this->loadModel('Developer');
    $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1'),
        'order'=>'Developer.name ASC'
    ));
    $this->set('developers',$developers);


	$this->layout = 'admin_default';
 	}


               public function projectdetails($pid) {
                   $this->layout='ajax';
                   $this->loadModel('Project');
                  $this->set('pinfo',$this->Project->findById($pid));
               }


        public function addnote($pid) {
        //Configure::write('debug',2);
        date_default_timezone_set('America/Los_Angeles');
        $this->loadModel('DevteamDaily');
        //$this->loadModel('Developer');
        $this->loadModel('Note');
        $this->loadModel('Emailnote');

        $this->loadModel('Project');
        $projinfo = $this->Project->findById($pid);

        $this->set('pinfo', $this->Project->findById($pid));

        if ($this->request->is('post')) {


            $demails = array('andrew@dp360crm.com');

            if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                $demails = set::merge($demails, $_POST['to_others']);
            }

            ///File uploading Code
            ///File 1
            if ($this->request->data['Note']['file1']['size'] > 0) {
                $target_dir = WWW_ROOT . "files/notes/";
                $target_file = $target_dir . basename($this->request->data['Note']['file1']["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $fname = md5(microtime()) . '_' . rand() . '.' . $imageFileType;
                $target_file = $target_dir . $fname;

                  $orgfilename=$this->request->data['Note']['file1']["name"];

                //            debug($target_file);
//            exit('test');
                if (in_array(strtolower($imageFileType), array('png', 'jpeg', 'gif', 'jpg', 'xls', 'xlsx', 'doc', 'docx', 'csv', 'pdf'))) {
                    if (move_uploaded_file($this->request->data['Note']['file1']["tmp_name"], $target_file)) {
                        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                        $this->request->data['Note']['file1'] = $fname;
                        $this->request->data['Note']['org_file1']=$orgfilename;
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                        $this->request->data['Note']['file1'] = '';
                    }
                } else {
                    $this->request->data['Note']['file1'] = '';
                }
            } else {
                $this->request->data['Note']['file1'] = '';
            }


            ///File 2
            if ($this->request->data['Note']['file2']['size'] > 0) {
                $target_dir = WWW_ROOT . "files/notes/";
                $target_file = $target_dir . basename($this->request->data['Note']['file2']["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $fname = md5(microtime()) . '_' . rand() . '.' . $imageFileType;
                $target_file = $target_dir . $fname;

                $orgfilename=$this->request->data['Note']['file2']["name"];
//            debug($target_file);
//            exit('test');
                if (in_array(strtolower($imageFileType), array('png', 'jpeg', 'gif', 'jpg', 'xls', 'xlsx', 'doc', 'docx', 'csv', 'pdf'))) {
                    if (move_uploaded_file($this->request->data['Note']['file2']["tmp_name"], $target_file)) {
                        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                        $this->request->data['Note']['file2'] = $fname;
                         $this->request->data['Note']['org_file2']=$orgfilename;
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                        $this->request->data['Note']['file2'] = '';
                    }
                } else {
                    $this->request->data['Note']['file2'] = '';
                }
            } else {
                $this->request->data['Note']['file2'] = '';
            }

            ///File 3
            if ($this->request->data['Note']['file3']['size'] > 0) {
                $target_dir = WWW_ROOT . "files/notes/";
                $target_file = $target_dir . basename($this->request->data['Note']['file3']["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $fname = md5(microtime()) . '_' . rand() . '.' . $imageFileType;
                $target_file = $target_dir . $fname;
  $orgfilename=$this->request->data['Note']['file3']["name"];
//            debug($target_file);
//            exit('test');
                if (in_array(strtolower($imageFileType), array('png', 'jpeg', 'gif', 'jpg', 'xls', 'xlsx', 'doc', 'docx', 'csv', 'pdf'))) {
                    if (move_uploaded_file($this->request->data['Note']['file3']["tmp_name"], $target_file)) {
                        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                        $this->request->data['Note']['file3'] = $fname;
                         $this->request->data['Note']['org_file3']=$orgfilename;
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                        $this->request->data['Note']['file3'] = '';
                    }
                } else {
                    $this->request->data['Note']['file3'] = '';
                }
            } else {
                $this->request->data['Note']['file3'] = '';
            }
            ///End File Uploading code
            $this->Note->create();
            if ($this->Note->save($this->request->data)) {

                //$developerinfo = $this->Developer->findById($this->request->data['DevteamDaily']['developer_id']);
                // //admin email
                // $email = new CakeEmail();
                // $email->config('sender');
                // $email->from("sender@dp360crm.com");
                // $email->to($demails);
                //          $subject='DP360 CRM - Project #'.$pid.' - New Note';
                // $email->subject($subject);
                // $email->template('newnote');
                // $email->theme('Default');
                // $email->emailFormat('both');
                // 	$email->viewVars(array(
                // 	'pname' => $projinfo['Project']['name'],
                // 	'note' => $this->request->data['Note']['note']));
                //                      $email->send();



                /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "newnote", 'DP360 CRM - Project #' . $pid . ' - New Note', "sender", serialize(
                                array(
                                    'pname' => $projinfo['Project']['name'],
                                    'note' => $this->request->data['Note']['note']
                                )
                        ), 'sender@dp360crm.com', 'newnote', "sender@dp360crm.com", serialize($demails), serialize(array())
                );

                //Send Email Alert end
                /*
                  //sperson email
                  $email = new CakeEmail();
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
                  $email->send(); */


                $this->Session->setFlash(__('New Note has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
                $this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
            } else {
                $this->Session->setFlash(__('Unable to add new Note'), 'alert', array('class' => 'alert-error'));
            }
        }

        $this->set('emails', $this->Emailnote->find('all', array('conditions' => array('Emailnote.status' => 1), 'order' => array('Emailnote.name ASC'))));

        $this->layout = '';
    }




        public function addtest($pid) {

        $this->loadModel('DevteamDaily');
        $this->loadModel('Note');
        //$this->loadModel('Emailnote');
        $this->loadModel('Developer');
        $this->loadModel('Project');

          date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
            $demails = array('andrew@dp360crm.com');
 $developerinfo = $this->Developer->findById($this->request->data['Note']['developer_id']);
	$projinfo = $this->Project->findById($pid);
            //if (isset($_POST['to_others']) && !empty($_POST['to_others'])) {
                $demails = set::merge($demails,$developerinfo['Developer']['email']);
           // }

//                debug($demails);
//                exit('test');

                  ///File uploading Code
            ///File 1
            if($this->request->data['Note']['file1']['size']>0){
            $target_dir = WWW_ROOT."files/notes/";
            $target_file = $target_dir . basename($this->request->data['Note']['file1']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
            $orgfilename=$this->request->data['Note']['file1']["name"];


            //            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Note']['file1']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Note']['file1']=$fname;
                  $this->request->data['Note']['org_file1']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['Note']['file1']='';
                }
            }else{
                $this->request->data['Note']['file1']='';
            }

            }else{
                $this->request->data['Note']['file1']='';
            }


            ///File 2
            if($this->request->data['Note']['file2']['size']>0){
            $target_dir = WWW_ROOT."files/notes/";
            $target_file = $target_dir . basename($this->request->data['Note']['file2']["name"]);
            $uploadOk = 1;
           $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;

              $orgfilename=$this->request->data['Note']['file2']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Note']['file2']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Note']['file2']=$fname;
                    $this->request->data['Note']['org_file2']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['Note']['file2']='';
                }
            }else{
                $this->request->data['Note']['file2']='';
            }

            }else{
                $this->request->data['Note']['file2']='';
            }

            ///File 3
            if($this->request->data['Note']['file3']['size']>0){
            $target_dir = WWW_ROOT."files/notes/";
            $target_file = $target_dir . basename($this->request->data['Note']['file3']["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $fname=md5(microtime()).'_'.rand().'.'.$imageFileType;
            $target_file =$target_dir.$fname;
              $orgfilename=$this->request->data['Note']['file3']["name"];
//            debug($target_file);
//            exit('test');
if (in_array(strtolower($imageFileType), array( 'png', 'jpeg', 'gif','jpg','xls','xlsx','doc','docx','csv','pdf'))) {
                if (move_uploaded_file($this->request->data['Note']['file3']["tmp_name"], $target_file)) {
                   // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    $this->request->data['Note']['file3']=$fname;
                      $this->request->data['Note']['org_file3']=$orgfilename;
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                     $this->request->data['Note']['file3']='';
                }
            }else{
                $this->request->data['Note']['file3']='';
            }

            }else{
                $this->request->data['Note']['file3']='';
            }


///End File Uploading code


                $note= $this->request->data['Note']['note'];
                $this->request->data['Note']['note']=$this->request->data['Note']['note'].'<br><b>Assign To: </b>'.$developerinfo['Developer']['name'];

            $this->Note->create();
            if ($this->Note->save($this->request->data)) {



//admin email
                /*$email = new CakeEmail();
                $email->config('sender');
                $email->from("sender@dp360crm.com");
                $email->to($demails);
                //$email->to(array('kodegeek12@gmail.com'));
                $subject = 'TEST ( DP360 CRM - Project #' . $pid.' )';
                $email->subject($subject);
                $email->template('sendtest');
                $email->theme('Default');
                $email->emailFormat('both');
                $email->viewVars(array(
                    'pname' => $projinfo['Project']['name'],
                    'assignto' =>$developerinfo['Developer']['name'],
                    'note' => $note));
                $email->send();*/

                 $subject = 'TEST ( DP360 CRM - Project #' . $pid.' )';

                   /**
		* Add email queue
		* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
		* template = "", $from = "", $to = "", $bcc = "")
		**/
		$this->loadModel("QueueEmail");
		$this->QueueEmail->create_email_queue(
			"move_project_test",
			$subject,
			"sender",
			serialize(array(
                    'pname' => $projinfo['Project']['name'],
                    'assignto' =>$developerinfo['Developer']['name'],
                    'note' => $note)
                                ),
			'sender@dp360crm.com',
			'sendtest',
			"sender@dp360crm.com",
			serialize($demails),
			serialize(array())
		);

		//Send Email Alert end




                $this->Session->setFlash(__('Test Message has been submitted.'), 'alertsuccess', array('class' => 'alert-success'));
                $this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
            } else {
                $this->Session->setFlash(__('Unable to send Test Message'), 'alert', array('class' => 'alert-error'));
            }
        }


        $developers = $this->Developer->find('list', array(
        'conditions' => array('Developer.status' => '1')
    ));
        $this->set('developers',$developers);
        $this->set('pinfo', $this->Project->findById($pid));
       // $this->set('emails', $this->Emailnote->find('all', array('conditions' => array('Emailnote.status' => 1), 'order' => array('Emailnote.name ASC'))));

        $this->layout = '';
    }



    public function admindelete($id) {

        date_default_timezone_set('America/Los_Angeles');
        $this->loadModel('Note');
        $this->loadModel('Emailnote');
        $this->loadModel('Project');
    $this->set('pinfo', $this->Project->findById($id));
        if ($this->request->is('post')) {

              $projinfo = $this->Project->findById($id);
             // $this->set('pinfo', $this->Project->findById($pid));
              $allemails=$this->Emailnote->find('all', array('conditions' => array('Emailnote.status' => 1), 'order' => array('Emailnote.name ASC')));
                 $onlyemails = Set::extract('/Emailnote/email', $allemails);
                 $allonlyemails = set::merge($onlyemails,'dan@dp360crm.com');
//debug($onlyemails);
//debug($this->request->data);
//exit('test');
            $this->Project->id = $id;
            if ($this->Project->saveField('status', 1)) {
            $this->Note->create();
            $this->Note->save($this->request->data);

            $this->loadModel("QueueEmail");
            $this->QueueEmail->create_email_queue(
                    "newnote", 'DP360 CRM - Project #' . $id . ' - New Note', "sender", serialize(
                            array(
                                'pname' => $projinfo['Project']['name'],
                                'note' => $this->request->data['Note']['note']
                            )
                    ), 'sender@dp360crm.com', 'newnote', "sender@dp360crm.com", serialize($allonlyemails), serialize(array())
            );

            }

            $this->Session->setFlash(__(''), 'alertsuccess', array('class' => 'alert-success'));
            $this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
        }

        $this->layout = '';
    }

    public function reactive($id) {
			/*$supports = $this->Developer->find('first',array('conditions'=>array('Developer.id'=>$id)));

			if($supports['Developer']['status'] == 1)
                        {
                            $s=0;
                        }else {
                            $s=1;
                        }*/

			//if(!empty($supports)){
				$this->Project->id = $id;
				$this->Project->saveField('status',0);
				$this->Session->setFlash(__('Re-activated.'), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));

			//}
 		$this->layout='default_new';
		}




}
