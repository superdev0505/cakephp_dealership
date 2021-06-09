<?php

ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');
require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';
use Aws\S3\S3Client;

App::uses('CakeEmail', 'Network/Email');

class SupportsController extends AppController {

	public function index() {
		$this->layout='default_new';
	}
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}


	public function add_make_trade() {
		$this->layout='ajax';
		  date_default_timezone_set('America/Los_Angeles');
		//Default category for powershoot
		$this->loadModel('Category');
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}
		$this->set('body_type', $body_type);



		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		$this->set('d_type_options', $d_type_options);

		$year_opt = array();
		for($i=date('Y')+1;$i>=2000;$i--){
			$year_opt[$i] = $i;
		}
		$this->set('year_opt', $year_opt);


		if ($this->request->is('post')) {

			//Send support ticket

			$this->request->data['Support']['user_id'] = $this->Auth->user('id');
			$this->request->data['Support']['sevarity'] ='High';
			$this->request->data['Support']['title'] ='Add make request - Trade';
			$this->request->data['Support']['direct_phone'] = $this->format_phone($this->Auth->user('d_phone'));
			$this->request->data['Support']['email'] = $this->Auth->user('email');
			$this->request->data['Support']['description'] = "Type: ".$this->request->data['Support']['category'].", Category: ".$this->request->data['Support']['type'].", Year: ".$this->request->data['Support']['year'].", Make:  ".$this->request->data['Support']['make'].", Model: ".$this->request->data['Support']['model'];

			$this->Support->create();
  			if($this->Support->save($this->request->data)){

                                 $support_id=$this->Support->getLastInsertId();
				$s_id =  $this->Auth->user('id');
				$s_name =   $this->Auth->user('full_name');
				$s_email =   $this->Auth->user('email');
				$dealer = $this->Auth->user('dealer')." # ".$this->Auth->user('dealer_id');
				$d_phone = $this->format_phone($this->Auth->user('d_phone'));




				//admin email
				// $email = new CakeEmail();
				// $email->config('support');
				// $email->from("dealerweblead@gmail.com");
				// //$email->to(array('russel@dp360crm.com' ));
				// $email->to(array('dan@dp360crm.com','tod@dp360crm.com','andrew@dp360crm.com','mike@dp360crm.com','russel@dp360crm.com'));
				// $email->bcc(array('jay@dealerspike.com'));


				// $email->subject('DP CRM Support Ticket');
				// $email->template('newticket');
				// $email->theme('Default');
				// $email->emailFormat('both');
	 			// 	$email->viewVars(array(
				// 	's_id'=>$s_id,
				// 	's_name'=>$s_name,
				// 	's_email'=>$s_email,
				// 	'dealer'=>$dealer,
				// 	'd_phone'=>$d_phone,
				// 	'sevarity' => $this->request->data['Support']['sevarity'],
				// 	'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	   			//  $email->send("New support ticket");


	            /**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"support_add_make_request_trade",
					'DP CRM Support Ticket - Support ID #'. $support_id,
					"support",
					serialize(array(
						's_id'=>$s_id,
						's_name'=>$s_name,
						's_email'=>$s_email,
						'dealer'=>$dealer,
						'd_phone'=>$d_phone,
						'sevarity' => $this->request->data['Support']['sevarity'],
						'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize(array('support@dp360crm.com','dan@dp360crm.com','andrew@dp360crm.com','kyle@dp360crm.com')),
					serialize(array('jay@dealerspike.com'))
				);
				//Send Email Alert end


				//sperson email
				// $email = new CakeEmail();
				// $email->config('support');
				// $email->from("dealerweblead@gmail.com");
				// $email->to($s_email);

				// $email->subject('DP CRM Support Ticket - Copy');
				// $email->template('newticket');
				// $email->theme('Default');
				// $email->emailFormat('both');
	 		// 	$email->viewVars(array(
				// 	's_id'=>$s_id,
				// 	's_name'=>$s_name,
				// 	's_email'=>$s_email,
				// 	'dealer'=>$dealer,
				// 	'd_phone'=>$d_phone,
				// 	'sevarity' => $this->request->data['Support']['sevarity'],
				// 'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	   //          $email->send("New support ticket");



	            /**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"support_add_make_request_trade_copy",
					'DP CRM Support Ticket (Copy) - Support ID #'. $support_id,
					"support",
					serialize(array(
						's_id'=>$s_id,
						's_name'=>$s_name,
						's_email'=>$s_email,
						'dealer'=>$dealer,
						'd_phone'=>$d_phone,
						'sevarity' => $this->request->data['Support']['sevarity'],
						'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize($s_email),
					serialize(array())
				);
				//Send Email Alert end


  			}

		}

	}




	public function add_make() {
		$this->layout='ajax';
		  date_default_timezone_set('America/Los_Angeles');
		//Default category for powershoot
		$this->loadModel('Category');
		$d_typenew = $this->Auth->User('d_type');
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_typenew),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
		$body_type = array();
		foreach($d_types as $d_te){
			$body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
		}
		$this->set('body_type', $body_type);



		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options = array();
		foreach($d_types as $d_type){
			$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		$this->set('d_type_options', $d_type_options);

		$year_opt = array();
		for($i=date('Y')+1;$i>=2000;$i--){
			$year_opt[$i] = $i;
		}
		$this->set('year_opt', $year_opt);


		if ($this->request->is('post')) {

			//Send support ticket

			$this->request->data['Support']['user_id'] = $this->Auth->user('id');
			$this->request->data['Support']['sevarity'] ='High';
			$this->request->data['Support']['title'] ='Add make request';
			$this->request->data['Support']['direct_phone'] = $this->format_phone($this->Auth->user('d_phone'));
			$this->request->data['Support']['email'] = $this->Auth->user('email');
			$this->request->data['Support']['description'] = "Type: ".$this->request->data['Support']['category'].", Category: ".$this->request->data['Support']['type'].", Year: ".$this->request->data['Support']['year'].", Make:  ".$this->request->data['Support']['make'].", Model: ".$this->request->data['Support']['model'];

			$this->Support->create();
  			if($this->Support->save($this->request->data)){

                                 $support_id=$this->Support->getLastInsertId();
				$s_id =  $this->Auth->user('id');
				$s_name =   $this->Auth->user('full_name');
				$s_email =   $this->Auth->user('email');
				$dealer = $this->Auth->user('dealer')." # ".$this->Auth->user('dealer_id');
				$d_phone = $this->format_phone($this->Auth->user('d_phone'));




				//admin email
				// $email = new CakeEmail();
				// $email->config('support');
				// $email->from("dealerweblead@gmail.com");
				// //$email->to(array('russel@dp360crm.com' ));
				// $email->to(array('dan@dp360crm.com','andrew@dp360crm.com','andrew@dp360crm.com','mike@dp360crm.com','russel@dp360crm.com' ));
				// $email->bcc(array('jay@dealerspike.com'));


				// $email->subject('DP CRM Support Ticket');
				// $email->template('newticket');
				// $email->theme('Default');
				// $email->emailFormat('both');
	 		// 	$email->viewVars(array(
				// 	's_id'=>$s_id,
				// 	's_name'=>$s_name,
				// 	's_email'=>$s_email,
				// 	'dealer'=>$dealer,
				// 	'd_phone'=>$d_phone,
				// 	'sevarity' => $this->request->data['Support']['sevarity'],
				// 	'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	   //          $email->send("New support ticket");


	            /**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"support_add_make_request",
					'DP CRM Support Ticket - Support ID #'. $support_id,
					"support",
					serialize(array(
						's_id'=>$s_id,
						's_name'=>$s_name,
						's_email'=>$s_email,
						'dealer'=>$dealer,
						'd_phone'=>$d_phone,
						'sevarity' => $this->request->data['Support']['sevarity'],
						'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize(array('support@dp360crm.com','dan@dp360crm.com','andrew@dp360crm.com','kyle@dp360crm.com')),
					serialize(array('jay@dealerspike.com'))
				);
				//Send Email Alert end



				//sperson email
				// $email = new CakeEmail();
				// $email->config('support');
				// $email->from("dealerweblead@gmail.com");
				// $email->to($s_email);

				// $email->subject('DP CRM Support Ticket - Copy');
				// $email->template('newticket');
				// $email->theme('Default');
				// $email->emailFormat('both');
	 		// 	$email->viewVars(array(
				// 	's_id'=>$s_id,
				// 	's_name'=>$s_name,
				// 	's_email'=>$s_email,
				// 	'dealer'=>$dealer,
				// 	'd_phone'=>$d_phone,
				// 	'sevarity' => $this->request->data['Support']['sevarity'],
				// 'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	   //          $email->send("New support ticket");


	            /**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"support_add_make_request_copy",
					'DP CRM Support Ticket (Copy) - Support ID #'. $support_id,
					"support",
					serialize(array(
						's_id'=>$s_id,
						's_name'=>$s_name,
						's_email'=>$s_email,
						'dealer'=>$dealer,
						'd_phone'=>$d_phone,
						'sevarity' => $this->request->data['Support']['sevarity'],
						'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize($s_email),
					serialize()
				);
				//Send Email Alert end


  			}

		}

	}

	public function add() {

		$this->loadModel('Project');


		date_default_timezone_set('America/Los_Angeles');

		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dpcrm-support";
		App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	$bucket = 'dpcrm-support';
    	$success_action_redirect = "https://app.dealershipperformancecrm.com/contact_s3/test/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		$s3policy->addCondition('', 'acl', 'private')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('content-length-range', 1, 5242880)
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);

		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);

		$message_key = uniqid();

		$filename =  uniqid($message_key."_")."_";
		$this->set('filename',$filename);
		$this->set('message_key',$message_key);




        if ($this->request->is('post')) {

        	//debug($this->request->data);

        	//Process attachments
			$attachment_file_names = array();
			if(isset($this->request->data['attachment_files']) && !empty($this->request->data['attachment_files'])){
				foreach( $this->request->data['attachment_files'] as $at_f ){
					$attachment_file_names[] = $at_f;
				}
			}
			$this->request->data['Support']['attachments'] = json_encode($attachment_file_names);

			$this->request->data['Support']['user_id'] = $this->Auth->user('id');
			$this->Support->create();
  			if($this->Support->save($this->request->data)){

	            $support_id=$this->Support->getLastInsertId();
	            $pinfo['Project']['support_id']=$support_id;
	            $pinfo['Project']['developer_id']=4;


	            if(!empty($attachment_file_names['0'])){
	            	$pinfo['Project']['org_file1'] = $attachment_file_names['0'];
	            }
	            if(!empty($attachment_file_names['1'])){
	            	$pinfo['Project']['org_file2'] = $attachment_file_names['1'];
	            }
	            if(!empty($attachment_file_names['2'])){
	            	$pinfo['Project']['org_file3'] = $attachment_file_names['2'];
	            }

				///added any new support ticket as new project into projects table

				$pinfo['Project']['severity']=$this->request->data['Support']['sevarity'];
				$pinfo['Project']['name']=$this->request->data['Support']['title'];
				$pinfo['Project']['description']=$this->request->data['Support']['description'];

				$pinfo['Project']['status']=0;
				$this->Project->create();
				$this->Project->save($pinfo);

				$s_id =  $this->Auth->user('id');
				$s_name =   $this->Auth->user('full_name');
				$s_email =   $this->Auth->user('email');
				$dealer = $this->Auth->user('dealer')." # ".$this->Auth->user('dealer_id');
				$d_phone = $this->format_phone($this->Auth->user('d_phone'));



				//admin email
				/*$email = new CakeEmail();
				$email->config('support');
				$email->from("dealerweblead@gmail.com");
				$email->replyTo($s_email);
				$email->to(array('dan@dp360crm.com','andrew@dp360crm.com','andrew@dp360crm.com','mike@dp360crm.com','russel@dp360crm.com' ));
				$email->bcc(array('jay@dealerspike.com'));


				$email->subject('DP CRM Support Ticket');
				$email->template('newticket');
				$email->theme('Default');
				$email->emailFormat('both');
	 			$email->viewVars(array(
					's_id'=>$s_id,
					's_name'=>$s_name,
					's_email'=>$s_email,
					'dealer'=>$dealer,
					'd_phone'=>$d_phone,
					'direct_phone'=>$this->request->data['Support']['direct_phone'],
					'sevarity' => $this->request->data['Support']['sevarity'],
					'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	            $email->send("New support ticket");*/


             	/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"add_support_ticket",
					'DP CRM Support Ticket - Support ID #'. $support_id,
					"support",
					serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize(array('support@dp360crm.com','dan@dp360crm.com','andrew@dp360crm.com','kyle@dp360crm.com')),
					serialize(array('jay@dealerspike.com')),
					json_encode($attachment_file_names)

				);
				//Send Email Alert end



				//sperson email
				/* $email = new CakeEmail();
				$email->config('support');
				$email->from("dealerweblead@gmail.com");
				$email->to($s_email);

				$email->subject('DP CRM Support Ticket - Copy');
				$email->template('newticket');
				$email->theme('Default');
				$email->emailFormat('both');
	 			$email->viewVars(array(
					's_id'=>$s_id,
					's_name'=>$s_name,
					's_email'=>$s_email,
					'direct_phone'=>$this->request->data['Support']['direct_phone'],
					'dealer'=>$dealer,
					'd_phone'=>$d_phone,
					'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
	            $email->send("New support ticket");
				*/

             	/**
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				$this->loadModel("QueueEmail");
				$this->QueueEmail->create_email_queue(
					"add_support_ticket",
					'DP CRM Support Ticket (Copy) - Support ID #'. $support_id,
					"support",
					serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])
					),
					$s_email,
					'newticket',
					$s_email,
					serialize(array($s_email)),
					serialize(array()),
					json_encode($attachment_file_names)
				);
				//Send Email Alert end


				$this->Session->setFlash(__('Your ticket has been submitted. Someone will be in contact with you shortly!'), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'supports', 'action' => 'add'));

			}else{
				$this->Session->setFlash(__('Unable to add ticket'), 'alert', array('class' => 'alert-error'));
			}

		}
		$this->layout = 'default_new';








	}



	public function adminindex($month=null) {

              date_default_timezone_set('America/Los_Angeles');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user

/***
 *  if(isset($this->request->data['reports']['select_date'])){
            $date=date('Y-m-d',  strtotime($this->request->data['reports']['select_date']));
        }else{
        $date=  date('Y-m-d');

        }
       $allresults = $this->DmsEmailReport->find('all', array(
            'fields' => array('DmsEmailReport.id','DmsEmailReport.dealer_id','DmsEmailReport.created','count(DmsEmailReport.dealer_id) as total'),
             'conditions' => array('DATE(DmsEmailReport.created)'=>$date),
            'group' => array('DmsEmailReport.dealer_id')
           ));
 */


          /*$this->loadModel('Project');
                 $this->Support->bindModel(
        array('hasOne' => array(
                'Project' => array(
                    'className' => 'Project',
                    'foreignKey' => 'support_id'
                )
            )
        )
    );
        */
                $this->loadModel('Project');
                $this->loadModel('ProjectFile');

                if(isset($this->request->data['supports']['select_date'])){
            $date=date('Y-m-d',  strtotime($this->request->data['supports']['select_date']));
//            debug($date);
//            exit('test');
            $pendings = $this->Support->find('count',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            $supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('DATE(Support.created)'=>$date),'recursive'=>2));
            $cal_responsetime = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'1','DATE(Support.created)'=>$date)));
        }elseif($month!=null){
            $year=date('Y');
            //debug($date);
            //exit('test');
            $pendings = $this->Support->find('count',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','YEAR(Support.created)'=>$year,'MONTH(Support.created)'=>$month)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','YEAR(Support.created)'=>$year,'MONTH(Support.created)'=>$month)));
            $supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('YEAR(Support.created)'=>$year,'MONTH(Support.created)'=>$month),'recursive'=>2));

            $cal_responsetime = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'1','YEAR(Support.created)'=>$year,'MONTH(Support.created)'=>$month)));

        }
        else{
            /*  $y=date('Y');
            $m=date('m');
             $pendings = $this->Support->find('count',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','YEAR(Support.created)'=>$y,'MONTH(Support.created)'=>$m)));
             $supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('YEAR(Support.created)'=>$y,'MONTH(Support.created)'=>$m)));
             //$supports = $this->Support->find('all',array('order'=>'Support.id DESC'));
             $cal_responsetime = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'1','YEAR(Support.created)'=>$y,'MONTH(Support.created)'=>$m)));*/

             $date=date('Y-m-d');
//            debug($date);
//            exit('test');
            $pendings = $this->Support->find('count',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            //$supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'0','DATE(Support.created)'=>$date)));
            $supports = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('DATE(Support.created)'=>$date),'recursive'=>2));
            $cal_responsetime = $this->Support->find('all',array('order'=>'Support.id DESC',  'conditions'=>array('Support.status'=>'1','DATE(Support.created)'=>$date)));


        }

        if(!empty($cal_responsetime)){
        $timeDiff=0;
            foreach ($cal_responsetime as $value) {
                $perticketimeDiff=  strtotime($value['Support']['modified']) - strtotime($value['Support']['created']);
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

//	debug($supports);
//        exit('test');
//
		$this->layout='support';
		$this->set('supports',$supports);
		$this->set('pendings',$pendings);
		$this->set('avg_responsetime',$avg_responsetime);
		$this->set('cal_responsetime',$cal_responsetime);
		$this->set('avg_minutes',$avg_minutes);
		$this->set('month',$month);
	$this->layout = 'admin_default';
 	}

          public function closed_status($id) {
        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }

          date_default_timezone_set('America/Los_Angeles');
        //Check Master or admin user
        $this->layout = '';
        $this->loadModel('SupportHistory');
       $allresults = $this->SupportHistory->find('all', array(
            'conditions' => array('SupportHistory.support_id'=>$id),
            'order' => array('SupportHistory.id DESC')
           ));

   $this->set(compact('allresults'));

    }

	public function admindelete($id) {
			$supports = $this->Support->find('first',array('conditions'=>array('Support.id'=>$id)));
                          date_default_timezone_set('America/Los_Angeles');
			$supports['Support']['status'] = 1;
			if(!empty($supports)){
				$this->Support->id = $id;
				$this->Support->saveField('status',1);
				$this->Session->setFlash(__('Ticke has been closed!'), 'alertsuccess', array('class' => 'alert-success'));
				$this->redirect(array('controller' => 'supports', 'action' => 'adminindex'));

			}
 		$this->layout='default_new';
		}

		public function view_alerts($alert_id =null)
		{
			$this->layout=null;
			$this->loadModel('UpdateAlert');
			$user_info = $this->Auth->user();
			$conditions = array();
			if(!empty($alert_id))
			{
				$conditions['UpdateAlert.id'] = $alert_id;
				
			}else
			{
				$conditions = array('UpdateAlert.hide_user_ids NOT LIKE' => '%,'.$user_info['id'].'%','OR' => array('UpdateAlert.dealer_id LIKE' => '%,'.$user_info['dealer_id'].'%','UpdateAlert.dealer_id' => '0'));
			}
			$update_alert=$this->UpdateAlert->find('first',array('conditions' => $conditions,'order'=>'id desc'));
			if(empty($update_alert))
			die;
			else{
				if(!preg_match('/,'.$user_info['id'].'/',$update_alert['UpdateAlert']['hide_user_ids']))
				{
					$update_alert['UpdateAlert']['hide_user_ids'] = $update_alert['UpdateAlert']['hide_user_ids'].','.$user_info['id'];
					$this->UpdateAlert->save($update_alert);
				}	
				$system_update_alert=$this->UpdateAlert->find('count',array('conditions'=>array('UpdateAlert.hide_user_ids NOT LIKE' => '%,'.$user_info['id'].'%','OR' => array('UpdateAlert.dealer_id LIKE' => '%,'.$user_info['dealer_id'].'%','UpdateAlert.dealer_id' => '0'))));			
				$this->set(compact('update_alert','system_update_alert'));
			}
		}

		public function hide_alert($alert_id=null){

			$this->layout=null;
			$this->autoRender=false;
			$user_id=$this->Auth->user('id');
			$this->UpdateAlert->query("UPDATE update_alerts SET hide_user_ids=CONCAT(hide_user_ids,',','$user_id') WHERE id=$alert_id ");
			  $system_update_alert=$this->UpdateAlert->find('count',array('conditions'=>array("UpdateAlert.hide_user_ids NOT LIKE" =>"%$user_id%")));
			  echo  $system_update_alert;

		}


     public function send($id = null) {

           date_default_timezone_set('America/Los_Angeles');
         $this->layout = '';
        if ($this->request->is('post')) {
            $this->set('save_sucees', true);

            $this->loadModel('SupportHistory');
            $this->request->data['SupportHistory']['note'] = $this->request->data['note'];
            $this->request->data['SupportHistory']['percentage'] = $this->request->data['percentage'];
            $this->request->data['SupportHistory']['status'] = $this->request->data['response_status'];
            $this->request->data['SupportHistory']['support_id'] = $id;
            $this->SupportHistory->create();
            //$this->SupportHistory->save($this->request->data);

            if ($this->SupportHistory->save($this->request->data)) {
                ///change status
                if ($this->request->data['response_status'] == 'Close') {
                    $this->Support->id = $id;
                    $this->Support->saveField('status', 1);
                }

                $ticketinfo = $this->Support->findById($id);
                //admin email
            /*    $email = new CakeEmail();
                $email->config('support');
                $email->from("dealerweblead@gmail.com");
                $email->to("support@dp360crm.com");

                $email->subject('DP CRM Support Ticket (Responding Message)');
                $email->template('responseticket');
                $email->theme('Default');
                $email->emailFormat('both');
                $email->viewVars(array(
                    'title' => $ticketinfo['Support']['title'],
                    'status' => $this->request->data['response_status'],
                    'percentage' => $this->request->data['percentage'],
                    'note' => $this->request->data['note'],
                    'description' => $ticketinfo['Support']['description'],
                    'created' => $ticketinfo['Support']['created'],
                    'email' => $ticketinfo['User']['email'],
                    'dealer' => $ticketinfo['User']['dealer'],
                    'dealer_id' => $ticketinfo['User']['dealer_id']
                ));
*/
                /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "send_support_ticket_status", 'DP CRM Support Ticket (Responding Message)', "support",                        serialize(array(
                    'title' => $ticketinfo['Support']['title'],
                    'status' => $this->request->data['response_status'],
                    'percentage' => $this->request->data['percentage'],
                    'note' => $this->request->data['note'],
                    'description' => $ticketinfo['Support']['description'],
                    'created' => $ticketinfo['Support']['created'],
                    'email' => $ticketinfo['User']['email'],
                    'dealer' => $ticketinfo['User']['dealer'],
                    'dealer_id' => $ticketinfo['User']['dealer_id']
                )),
                  "dealerweblead@gmail.com",
                        'responseticket',
                        "dealerweblead@gmail.com",
                        serialize(array('support@dp360crm.com')),
                        serialize(array())
                );
                //Send Email Alert end


                $this->Session->setFlash(__('Support Status has been sent.'), 'alertsuccess', array('class' => 'alert-success'));
                $this->redirect(array('controller' => 'supports', 'action' => 'adminindex'));
            } else {
                $this->Session->setFlash(__('Unable to sent Support Status.'), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'supports', 'action' => 'adminindex'));
            }
        }

        $this->set('sid', $id);
    }



	public function serviceapp_add() {
	  date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
			$this->request->data['Support']['user_id'] = $this->Auth->user('id');
			$this->Support->create();
  			if($this->Support->save($this->request->data)){
			
                         $support_id=$this->Support->getLastInsertId();
                         
                        $s_id =  $this->Auth->user('id');
			$s_name =   $this->Auth->user('full_name');
			$s_email =   $this->Auth->user('email');
			$dealer = $this->Auth->user('dealer')." # ".$this->Auth->user('dealer_id');
			$d_phone = $this->format_phone($this->Auth->user('d_phone'));



			//admin email
			/*$email = new CakeEmail();
			$email->config('support');
			$email->from("dealerweblead@gmail.com");
			$email->replyTo($s_email);
			$email->to(array('andrew@dp360crm.com'));
			$email->bcc(array('kmlshrm167@gmail.com'));
			$email->subject('DP Service App Support Ticket');
			$email->template('newticket');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
            $email->send("New support ticket");
		*/

             /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "serviceapp_add",
                        'DP Service App Support Ticket - Support ID #'. $support_id,
                        "support",
                        serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])),
                        $s_email,
                        'newticket',
                        $s_email,
                        serialize(array('support@dp360crm.com','dan@dp360crm.com','andrew@dp360crm.com','kyle@dp360crm.com')),
                        serialize(array())
                );
                //Send Email Alert end


			//sperson email
			/*$email = new CakeEmail();
			$email->config('support');
			$email->from("dealerweblead@gmail.com");
			$email->to($s_email);

			$email->subject('DP Service App Support Ticket - Copy');
			$email->template('newticket');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'sevarity' => $this->request->data['Support']['sevarity'],
			'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
            $email->send("New support ticket");*/

             /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "serviceapp_add",
                        'DP Service App Support Ticket (Copy) - Support ID #'. $support_id,
                        "support",
                        serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'sevarity' => $this->request->data['Support']['sevarity'],
			'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])),
                        $s_email,
                        'newticket',
                        $s_email,
                        serialize(array($s_email)),
                        serialize(array())
                );
                //Send Email Alert end






			$this->Session->setFlash(__('Your ticket has been submitted. Someone will be in contact with you shortly!'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'supports', 'action' => 'add'));

			}else{
				$this->Session->setFlash(__('Unable to add ticket'), 'alert', array('class' => 'alert-error'));
			}

		}
		$this->layout = 'serviceapp_layout';

	}


	public function bdcapp_add()
	{

	  date_default_timezone_set('America/Los_Angeles');
        if ($this->request->is('post')) {
			$this->request->data['Support']['user_id'] = $this->Auth->user('id');
			$this->Support->create();
  			if($this->Support->save($this->request->data)){
			 $support_id=$this->Support->getLastInsertId();	
                            
                        $s_id =  $this->Auth->user('id');
			$s_name =   $this->Auth->user('full_name');
			$s_email =   $this->Auth->user('email');
			$dealer = $this->Auth->user('dealer')." # ".$this->Auth->user('dealer_id');
			$d_phone = $this->format_phone($this->Auth->user('d_phone'));



			//admin email
			/*$email = new CakeEmail();
			$email->config('support');
			$email->from("dealerweblead@gmail.com");
			$email->replyTo($s_email);
			$email->to(array('andrew@dp360crm.com'));
			$email->bcc(array('kmlshrm167@gmail.com'));
			$email->subject('DP Service App Support Ticket');
			$email->template('newticket');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
            $email->send("New support ticket");
		*/

             /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "serviceapp_add",
                        'DP Service App Support Ticket - Support ID #'. $support_id,
                        "support",
                        serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'sevarity' => $this->request->data['Support']['sevarity'],
				'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])),
                        $s_email,
                        'newticket',
                        $s_email,
                        serialize(array('support@dp360crm.com','dan@dp360crm.com','andrew@dp360crm.com','kyle@dp360crm.com')),
                        serialize(array())
                );
                //Send Email Alert end


			//sperson email
			/*$email = new CakeEmail();
			$email->config('support');
			$email->from("dealerweblead@gmail.com");
			$email->to($s_email);

			$email->subject('DP Service App Support Ticket - Copy');
			$email->template('newticket');
			$email->theme('Default');
			$email->emailFormat('both');
 			$email->viewVars(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'sevarity' => $this->request->data['Support']['sevarity'],
			'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description']));
            $email->send("New support ticket");*/

             /**
                 * Add email queue
                 * create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
                 * template = "", $from = "", $to = "", $bcc = "")
                 * */
                $this->loadModel("QueueEmail");
                $this->QueueEmail->create_email_queue(
                        "serviceapp_add",
                        'DP BDC App Support Ticket (Copy) - Support ID #'. $support_id,
                        "support",
                        serialize(array(
				's_id'=>$s_id,
				's_name'=>$s_name,
				's_email'=>$s_email,
				'direct_phone'=>$this->request->data['Support']['direct_phone'],
				'dealer'=>$dealer,
				'd_phone'=>$d_phone,
				'sevarity' => $this->request->data['Support']['sevarity'],
			'title' => $this->request->data['Support']['title'], 'description' => $this->request->data['Support']['description'])),
                        $s_email,
                        'newticket',
                        $s_email,
                        serialize(array($s_email)),
                        serialize(array())
                );
                //Send Email Alert end






			$this->Session->setFlash(__('Your ticket has been submitted. Somone will be in contact with you shortly!'), 'alertsuccess', array('class' => 'alert-success'));
			$this->redirect(array('controller' => 'supports', 'action' => 'add'));

			}else{
				$this->Session->setFlash(__('Unable to add ticket'), 'alert', array('class' => 'alert-error'));
			}

		}
		$this->layout = 'bdcapp_layout';


	}
	
	public function all_alerts()
	{
		$this->layout = 'default_new';
		$user_info = $this->Auth->user();
		$this->loadModel('UpdateAlert');
		$all_alerts=$this->UpdateAlert->find('all',array('order'=>'id desc','conditions' => array('OR' => array('UpdateAlert.dealer_id LIKE' => '%,'.$user_info['dealer_id'].'%','UpdateAlert.dealer_id' => '0'))));
		
		$this->set(compact('all_alerts'));
	}


}
