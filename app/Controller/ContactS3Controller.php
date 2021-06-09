<?php


ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');

require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';

use Aws\S3\S3Client;


class ContactS3Controller extends AppController {

	public $uses = array('XmlInventory');
    public $components = array('RequestHandler');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}

    public function test(){

    	$this->autoRender = false;
    	echo "success";
    }

    public function uplaod() {

    	$this->layout = 'default_new';

    	App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	$bucket = 'lead-assets';
    	$success_action_redirect = "http://dp360crm/contact_s3/test/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		$s3policy->addCondition('', 'acl', 'private')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);
         
		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);

		$filename =  uniqid('112233a'."_");
		$this->set('filename',$filename);

	}


	public function index($contact_id = '') {


		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "lead-assets";




		App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	$bucket = 'lead-assets';
    	$success_action_redirect = "https://app.dealershipperformancecrm.com/contact_s3/test/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		$s3policy->addCondition('', 'acl', 'private')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);
         
		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);

		$filename =  uniqid($contact_id."_")."_";
		$this->set('filename',$filename);





		// $result = $client->listBuckets();
		// foreach ($result['Buckets'] as $bucket) {
		//     // Each Bucket value will contain a Name and CreationDate
		//     echo "{$bucket['Name']} - {$bucket['CreationDate']}\n";
		// }

		// $iterator = $client->getIterator('ListObjects', array(
  //  			'Bucket' => "images-client"
		// ));
		// debug($iterator);

		// $iterator = $client->getIterator('ListObjects', array(
		//     'Bucket' => $bucket ,
		//    // 'Prefix' => '1370'
		// ));

		// foreach ($iterator as $object) {
		//     echo $object['Key'] . "\n";
		// }




		
    }


    public function upload($contact_id){

    	$bucket = "lead-assets";

    	$filename =  uniqid($contact_id."_");
    	if(isset($_FILES['file']['tmp_name'])){
    		$filename =  $filename."_".$_FILES['file']['name'];

    		$client = S3Client::factory(array(
    			'key'    => 'AKIAJCHHC37LYOABAIIQ',
    			'secret' => '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',
			));
			$bucket = "lead-assets";

			$result = $client->putObject(array(
			    'Bucket'     => $bucket,
			    'Key'        => $filename,
			    'SourceFile' => $_FILES['file']['tmp_name'],
			));
    	}

    	$this->set('contact_id',$contact_id);
		$this->set('files',$this->get_files($contact_id));
		$this->render('file_list');
    }

    function get_filename($fname){
		$name1 = substr($fname, strpos($fname, "_")+1   );
		$filename = substr($name1, strpos($name1, "_")+1   );
		return $filename;
	}

    function download_file(){
		$filename  = $this->request->query['filename'];
		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "lead-assets";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		));
	    $this->response->body($result['Body']);
	    $this->response->download($this->get_filename( $filename ) );
	    return $this->response;
    }

    public function delete_file(){
    	$filename  = $this->request->query['filename'];
    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "lead-assets";
		$result = $client->deleteObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		)); 

		$contact_id = $this->request->query['contact_id'];
		$this->set('contact_id',$contact_id);
		$this->set('files',$this->get_files($contact_id));
		$this->render('file_list');

    }

    public function get_files($contact_id){
    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "lead-assets";

    	$iterator = $client->getIterator('ListObjects', array(
		    'Bucket' => $bucket ,
		    'Prefix' => $contact_id."_"
		));
    	$files = array();
		foreach ($iterator as $object) {
		    $files[] = $object;
		}
		return $files;
    }

    public function file_list($contact_id){
		$this->set('files',$this->get_files($contact_id));
		$this->set('contact_id',$contact_id);
    }


    public function get_attachment($message_key){

    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dp360-attachments";
    	$iterator = $client->getIterator('ListObjects', array(
		    'Bucket' => $bucket ,
		    'Prefix' => $message_key."_"
		));
    	$files = array();
		foreach ($iterator as $object) {
		    $files[] = $object;
		}
		return $files;
    }

    public function get_attachment_support($message_key){

    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dpcrm-support";
    	$iterator = $client->getIterator('ListObjects', array(
		    'Bucket' => $bucket ,
		    'Prefix' => $message_key."_"
		));
    	$files = array();
		foreach ($iterator as $object) {
		    $files[] = $object;
		}
		return $files;
    }

    public function delete_attachment(){
    	$filename  = $this->request->query['filename'];
    	$message_key = $this->request->query['message_key'];
    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dp360-attachments";
		$result = $client->deleteObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		)); 

		$this->set('files',$this->get_attachment($message_key));
		$this->set('message_key',$message_key);
		$this->render('file_list_attachment');
    }

    public function delete_attachment_support(){
    	$filename  = $this->request->query['filename'];
    	$message_key = $this->request->query['message_key'];
    	$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dpcrm-support";
		$result = $client->deleteObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		)); 

		$this->set('files',$this->get_attachment_support($message_key));
		$this->set('message_key',$message_key);
		$this->render('file_list_attachment_support');
    }


    public function file_list_attachment(){

    	$this->layout = 'ajax';
    	$message_key = $this->request->query['message_key'];
    	$this->set('files',$this->get_attachment($message_key));
    	$this->set('message_key',$message_key);
    }

    public function file_list_attachment_support(){

    	$this->layout = 'ajax';
    	$message_key = $this->request->query['message_key'];
    	$this->set('files',$this->get_attachment_support($message_key));
    	$this->set('message_key',$message_key);
    }


	function download_attachment(){
		$filename  = $this->request->query['filename'];
		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dp360-attachments";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		));
	    $this->response->body($result['Body']);
	    $this->response->download($this->get_filename( $filename ) );
	    return $this->response;
    }

    function download_attachment_support(){
		$filename  = $this->request->query['filename'];
		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dpcrm-support";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		));
	    $this->response->body($result['Body']);
	    $this->response->download($this->get_filename( $filename ) );
	    return $this->response;
    }

    







    public function php_information(){
		phpinfo();
    }
   
    

public function testupload($contact_id = '') {
                
                $this->layout = 'admin_default';

		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "auto-import-files";


		App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	//$bucket = 'lead-assets';
    	$success_action_redirect = "https://app.dealershipperformancecrm.com/contact_s3/testsuccess/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		//$s3policy->addCondition('', 'acl', 'private')
		$s3policy->addCondition('', 'acl', 'public-read')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);
         
		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);

		$filename =  uniqid("autoimport_")."_";
		$this->set('filename',$filename);
		
    }
    
     public function testsuccess(){

    	$this->autoRender = false;
        echo'<pre>';
            var_dump($this->request->query['key']);
    	echo "success";
    }
	
}