<?php
class SendgridHandlersController extends AppController {
	public $uses = array('Contact');
	public function beforeFilter() {
		parent::beforeFilter();
		//Configure::write('debug', 2);
		$this->Auth->allow('index');
	    $this->layout=null;
	}
	function index(){
		$this->loadModel('SendgridStatistic');
		$HTTP_RAW_POST_DATA = file_get_contents('php://input'); 
		$fh = fopen('files/sendgridnotificationsnew.txt', 'w+');
		if ( $fh )
		{
		// Dump body
		fwrite($fh, $HTTP_RAW_POST_DATA);
		fclose($fh);
		}
		/*
		
		$filename = "files/sendgridnotificationsnew.txt";
		$handle = fopen($filename, "r");
		$data = fread($handle, filesize($filename));
		$data = json_decode($data);
		*/
		$data = json_decode($HTTP_RAW_POST_DATA);
		foreach($data as $details){
			 $details = (array)  $details;
			 $email = trim($details['email']);
			 $eblast_id = $this->GetEblastIdFromCategory($details['category']);
			 list($Type,$Id,$ContactIds,$Rule) = $this->GetDetailsFromCategory($details['category']);
			 $SaveResponse = array();
			 $processed = $dropped = $deferred= $delivered = $bounced = $opened = $clicked = $unsubscribed = $spam = 0;
			 $this->Contact->recursive = -1;
			 if($email!='' && $Id>0){
				$ContactDetails = $this->Contact->find('first',array('conditions'=>array('email'=>$email),'fields'=>array('company_id','id')));
				if(isset($ContactDetails['Contact']['company_id']) && $ContactDetails['Contact']['company_id']!='' && in_array($ContactDetails['Contact']['id'],$ContactIds) && $Type!=''){
					$SaveResponse['dealer_id'] = $ContactDetails['Contact']['company_id'];
					$SaveResponse['contact_id'] = $ContactDetails['Contact']['id'];
					$SaveResponse['response'] = json_encode($details);
					$SaveResponse['email'] = $email;
					$SaveResponse['type'] = $Type;
					$event = trim($details['event']);
					if($event=='processed'){
						$processed = 1;
					}elseif($event=='dropped'){
						$dropped = 1;
					}elseif($event=='delivered'){
						$delivered = 1;
					}elseif($event=='open'){
						$opened = 1;
					}elseif($event=='click'){
						$clicked = 1;
					}elseif($event=='unsubscribe'){
						$unsubscribed = 1;
					}elseif($event=='bounce'){
						$bounced = 1;
					}elseif($event=='deferred'){
						$deferred = 1;
					}elseif($event=='spam'){
						$spam = 1;
					}
					
					$SaveResponse['processed'] = $processed;
					$SaveResponse['dropped'] = $dropped;
					$SaveResponse['deffered'] = $deferred;
					$SaveResponse['delivered'] = $delivered;
					$SaveResponse['bounced'] = $bounced;
					$SaveResponse['opened'] = $opened;
					$SaveResponse['clicked'] = $clicked;
					$SaveResponse['unsubscribed'] = $unsubscribed;
					$SaveResponse['spam'] = $spam;
					$SaveResponse['tstmp'] = $details['timestamp'];
					$SaveResponse['eblasts_id'] = $Id;
					//pr($SaveResponse);
					try {
						$this->SendgridStatistic->SaveAll($SaveResponse);
					} catch (Exception $e) {
					
					}
				}
			 }
		}
		die;
	}
	
	function GetEblastIdFromCategory($CatArr){
		$EblastId = '';
		foreach($CatArr as $category){
			$tmpExplode = explode("^^",$category);
			if(strtolower($tmpExplode[0])=='category' && isset($tmpExplode[1]) && $tmpExplode[1]>0){
				$EblastId = $tmpExplode[1];
			}
		}
		
		if($EblastId>0){
			return $EblastId;
		}else{
			return false;
		}
	}
	
	
	function GetDetailsFromCategory($CatArr){
		$Type = $Id = $Rule = '';
		$ContactIds = array();
		
		foreach($CatArr as $category){
			$tmpExplode = explode("^^",$category);
			if((strtolower($tmpExplode[0])=='eblast' || strtolower($tmpExplode[0])=='autoresponder' ) && isset($tmpExplode[1]) && $tmpExplode[1]>0){
				$Type = $tmpExplode[0];
				$Id = $tmpExplode[1];
				$ContactIds = explode(",",$tmpExplode[2]);
				if(isset($tmpExplode[3])){
					$Rule = $tmpExplode[3];
				}
				break;
				break;
			}
		}
		
		return array($Type,$Id,$ContactIds,$Rule);
	}

}
?>