<?php
class UserTemplatesController extends AppController {

	public $uses = array('UserTemplate', 'UserEmail','Template');
    public $components = array('RequestHandler' );

	var $fileModel = 'Upload';
	var $uploadDir = 'files';
	var $fileVar = 'file';
	var $allowedTypes = array(
		'image/jpeg',
		'image/gif',
		'image/png',
		'image/pjpeg',
		'image/x-png'
	);
	var $fields = array('name'=>'name','type'=>'type','size'=>'size');
	var $uploadDetected = false;
	var $uploadedFile = false;
	var $data = array();
	var $params = array();
	var $finalFile = null;
	var $success = false;
	var $errors = array();

	function beforeFilter() {
		parent::beforeFilter();
	}
	public function get_template(){
		$id = $this->request->query['id'];
		$split_id=explode('_',$id);
		$id=$split_id[1];
		if($split_id[0]=='UserTemplate')
		{

		$userTemplate = $this->UserTemplate->find('first', array('conditions'=>array('UserTemplate.id'=>$id),'fields'=>array('UserTemplate.template_html','UserTemplate.template_email_subject')));
		$response = array('template_body' => stripslashes($userTemplate['UserTemplate']['template_html']),'template_subject' =>$userTemplate['UserTemplate']['template_email_subject'] );
		echo json_encode($response);

		}
		elseif($split_id[0]=='Template')
		{
			$userTemplate = $this->Template->find('first', array('conditions'=>array('Template.template_id'=>$id),'fields'=>array('Template.template_html')));
			echo stripslashes($userTemplate[$split_id[0]]['template_html']);
		}


		die;
		//$this->set('userTemplate',$userTemplate);
	}

	public function delete($template_id) {
		$this->UserTemplate->id = $template_id;
		$this->UserTemplate->delete();
		$this->Session->setFlash(__('Template deleted'), 'alert');
		$this->redirect(array('action' => 'index'));
	}

	public function templates_duplicate($id = '') {

		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');
		date_default_timezone_set($zone);

		$base_template = $this->UserTemplate->find('first',
			array('conditions' => array(
				'id' => $id,
				'dealer_id' => $dealer_id
			))
		);
        $base_template['UserTemplate']['template_html'] = addslashes($base_template['UserTemplate']['template_html']);
		$new_name_value = $base_template;
		unset($new_name_value['UserTemplate']['id']);
		unset($new_name_value['UserTemplate']['created_date']);
		$new_name_value['UserTemplate']['template_title'] = $new_name_value['UserTemplate']['template_title']." Copy";
		$new_name_value['UserTemplate']['created_date'] = date('Y-m-d H:i:s');
		$new_name_value['UserTemplate']['user_id'] = $this->Auth->user('id');

		$this->UserTemplate->create();
		$this->UserTemplate->save($new_name_value);
		$this->Session->setFlash('Template Created');
		$this->redirect(array('action' => 'index'));

	}

	public function add($template_type, $id=null) {
		$this->layout='default_template';
		$zone = $this->Auth->User('zone');
		$dealer_id = $this->Auth->User('dealer_id');
		date_default_timezone_set($zone);

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['UserTemplate']['created_date'] = date('Y-m-d H:i:s');
			$this->request->data['UserTemplate']['template_type'] = $template_type;
			$this->request->data['UserTemplate']['dealer_id'] = $dealer_id;
			$this->request->data['UserTemplate']['user_id'] = $this->Auth->user('id');
            $this->request->data['UserTemplate']['template_html'] = addslashes($this->request->data['UserTemplate']['template_html']);

			if(!isset($this->params['pass'][1])) {
				$this->UserTemplate->create();
			}

			if ($this->UserTemplate->save($this->request->data)) {


				$this->loadModel("Draft");
				$this->Draft->clear_druft_template( $this->Auth->user('id'));


				//Save Template Thumbnails
				$fileData = addslashes($this->request->data['UserTemplate']['thumbfile']);
				$path = APP."View".DS."Themed".DS."Default".DS."webroot".DS."img".DS."template-thumbs";

				if($fileData['size'] != 0) {

					//Delete Old File
					if(isset($this->request->params['pass'][1])) {
						$oldImage = $this->UserTemplate->find('first', array('conditions'=>array('UserTemplate.id'=>$this->request->params['pass'][1]),'fields'=>array('UserTemplate.template_image')));
						if($oldImage['UserTemplate']['template_image'] != ''){
							@unlink(APP."View".DS."Themed".DS."Default".DS."webroot".DS."img".DS."template-thumbs".DS.$oldImage['UserTemplate']['template_image']);
						}
					}

					$no = 1;
					$newFileName = $fileData['name'];
					$fileName = $fileData['name'];
					while (file_exists($path.DS.$newFileName)) {
						$no++;
						$newFileName = substr_replace($fileName, "_$no.", strrpos($fileName, "."), 1);
					}
					if( move_uploaded_file($fileData['tmp_name'], $path.DS.$newFileName) ){
						$this->UserTemplate->saveField('template_image', $newFileName);
					}
				}
				$this->Session->setFlash(__('Template information saved!'), 'alert');
				$this->redirect(array('action' => 'index'));
			}

		}else{
			if( isset($this->request->params['pass']['1']) &&  $this->request->params['pass']['1'] != '' ) {
				$templatesSrc = $this->UserTemplate->find('first',  array('conditions' => array('UserTemplate.id' => $this->request->params['pass']['1'], 'dealer_id' => $dealer_id)));
				if(!isset($templatesSrc['UserTemplate'])) {
					$this->redirect('index');
				}
                $templatesSrc['UserTemplate']['template_html'] = stripslashes($templatesSrc['UserTemplate']['template_html']);
				$this->request->data = $templatesSrc;
			}else{

				$this->LoadModel("Draft");
   				$draft_exists = $this->Draft->find('first', array('conditions' => array(
   					'Draft.user_id'=> $this->Auth->user('id') , 'Draft.template_id' => $this->Auth->user('id')
   				) ));
   				if(!empty($draft_exists)){
   					$this->request->data['UserTemplate']['template_html'] = stripslashes($draft_exists['Draft']['message_body']);

   				}




			}
		}


	}

	function index($stats_month = null) {
		$dealer_id = $this->Auth->user('dealer_id');
		$this->layout='default_new';
		$this->UserTemplate->bindModel(array('belongsTo' => array('User' => array('className' => 'User','fields' => array('User.first_name','User.last_name','User.id')))));
		$this->paginate = array(
				'conditions'=>array('UserTemplate.dealer_id' => $this->Auth->user('dealer_id')),
				'limit' => 20,
				'order' => array(
					'UserTemplate.id' => 'DESC',
				),
		);
        $this->set('userTemplates', $this->Paginate('UserTemplate'));
	}



}
