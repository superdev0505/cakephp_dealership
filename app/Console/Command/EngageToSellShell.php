<?php 

class XML2Array {

    private static $xml = null;
	private static $encoding = 'UTF-8';

    /**
     * Initialize the root XML node [optional]
     * @param $version
     * @param $encoding
     * @param $format_output
     */
    public static function init($version = '1.0', $encoding = 'UTF-8', $format_output = true) {
        self::$xml = new DOMDocument($version, $encoding);
        self::$xml->formatOutput = $format_output;
		self::$encoding = $encoding;
    }

    /**
     * Convert an XML to Array
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DOMDocument
     */
    public static function &createArray($input_xml) {
        $xml = self::getXMLRoot();
		if(is_string($input_xml)) {
			$parsed = $xml->loadXML($input_xml);
			if(!$parsed) {
				throw new Exception('[XML2Array] Error parsing the XML string.');
			}
		} else {
			if(get_class($input_xml) != 'DOMDocument') {
				throw new Exception('[XML2Array] The input XML object should be of type: DOMDocument.');
			}
			$xml = self::$xml = $input_xml;
		}
		$array[$xml->documentElement->tagName] = self::convert($xml->documentElement);
        self::$xml = null;    // clear the xml node in the class for 2nd time use.
        return $array;
    }

    /**
     * Convert an Array to XML
     * @param mixed $node - XML as a string or as an object of DOMDocument
     * @return mixed
     */
    private static function &convert($node) {
		$output = array();

		switch ($node->nodeType) {
			case XML_CDATA_SECTION_NODE:
				$output = trim($node->textContent);
				break;

			case XML_TEXT_NODE:
				$output = trim($node->textContent);
				break;

			case XML_ELEMENT_NODE:

				// for each child node, call the covert function recursively
				for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
					$child = $node->childNodes->item($i);
					$v = self::convert($child);
					if(isset($child->tagName)) {
						$t = $child->tagName;

						// assume more nodes of same kind are coming
						if(!isset($output[$t])) {
							$output[$t] = array();
						}
						$output[$t][] = $v;
					} else {
						//check if it is not an empty text node
						if($v !== '') {
							$output = $v;
						}
					}
				}

				if(is_array($output)) {
					// if only one node of its kind, assign it directly instead if array($value);
					foreach ($output as $t => $v) {
						if(is_array($v) && count($v)==1) {
							$output[$t] = $v[0];
						}
					}
					if(empty($output)) {
						//for empty nodes
						$output = '';
					}
				}

				// loop through the attributes and collect them
				if($node->attributes->length) {
					$a = array();
					foreach($node->attributes as $attrName => $attrNode) {
						$a[$attrName] = (string) $attrNode->value;
					}
					// if its an leaf node, store the value in @value instead of directly storing it.
					if(!is_array($output)) {
						$output = array('value' => $output);
					}
					$output['attributes'] = $a;
				}
				break;
		}
		return $output;
    }

    /*
     * Get the root XML node, if there isn't one, create it.
     */
    private static function getXMLRoot(){
        if(empty(self::$xml)) {
            self::init();
        }
        return self::$xml;
    }
}


class EngageToSellShell extends AppShell {
	public $uses = array('Contact','User', 'Rule','History');
	
	
	function sendemail(){
		$message = '<?xml version="1.0"?>
		 <?adf version="1.0"?>
		 <adf>
		 <prospect>
		 <requestdate>2014-04-28T16:31:37-05:00</requestdate>
		 <vehicle interest="buy" status="used">
		 <year></year>
		 <make></make>
		 <model></model>
		 <vin></vin>
		 <stock></stock>
		 <trim></trim>
		 </vehicle>
		 <customer>
		 <contact>
		 <name part="first">Bob</name>
		 <name part="last">Crane</name>
		 <email>andrew@dp360crm.com</email>
		 <phone>321-458-5555</phone>
		 <address>
		 <street line="1"></street>
		 <city>San Marcos</city>
		 <regioncode>CA</regioncode>
		 <postalcode></postalcode>
		 <country>US</country>
		 </address>
		 </contact>
		 <comments>
		 <![CDATA[
				 Customer is looking for a mid to fullsize sedan or suv 2008 or newer around $300 or less per month. Provided both email and phone number. Customer left the chat
		 ]]>
		 </comments>
		 </customer>
		 <vendor>
		 <id sequence="1" source="Engage To Sell"></id>
		 <vendorname>El Cajon Ford</vendorname>
		 <contact>
		 <name part="full">Internet Department</name>
		 <email></email>
		 <phone></phone>
		 <address>
		 <street line="1">1595 East Main Street</street>
		 <city>El Cajon</city>
		 <regioncode>CA</regioncode>
		 <postalcode>92021</postalcode>
		 <country></country>
		 </address>
		 </contact>
		 </vendor>
		 <provider>
		 <name part="full">Engage To Sell sales</name>
		 <service>Engage To Sell</service>
		 </provider>
		 <leadtype>sales</leadtype>
		 </prospect>
		 </adf>
		';
		
		$to      = 'dealerweblead@gmail.com';
		$subject = 'AbbrName Get A Quote Form';
		$headers = 'From: andrew@dp360crm.com' . "\r\n" .
			'Reply-To: andrew@dp360crm.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
	}
	
	
	public function utf8_clean($string){
    	//$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
	    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special cha
	}
	
	public function set_values($ar_adf, $subject=""){

		$ret = array();
	
		$dt_ar = explode("T",$ar_adf['adf']['prospect']['requestdate']);
		$ret['created'] = date("Y-m-d H:i:s",strtotime($dt_ar[0]." ".$dt_ar[1]));
		
		$ret['fname'] = $ar_adf['adf']['prospect']['customer']['contact']['name'][0]['value'];
		$ret['lname']  = $ar_adf['adf']['prospect']['customer']['contact']['name'][1]['value'];

		//customer phone
		$ret['cellphone'] = $ar_adf['adf']['prospect']['customer']['contact']['phone'];
		$ret['cellphone'] = str_replace("-","",$ret['cellphone']);
		
		
		$ret['email'] = $ar_adf['adf']['prospect']['customer']['contact']['email'];
		
		$ret['street'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['street']['value'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['street']['value'] : "";
		$ret['city'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['city'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['city'] : "";
		$ret['regioncode'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['regioncode'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['regioncode'] : "";
		$ret['postalcode'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['postalcode'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['postalcode'] : "";

		$ret['comments'] = $ar_adf['adf']['prospect']['customer']['comments'];
		
		$ret['year'] = (isset($ar_adf['adf']['prospect']['vehicle']['year']) && $ar_adf['adf']['prospect']['vehicle']['year'] != '')? $ar_adf['adf']['prospect']['vehicle']['year'] : null ;
		$ret['make'] = isset($ar_adf['adf']['prospect']['vehicle']['make'])?   $ar_adf['adf']['prospect']['vehicle']['make']       : "" ;
		$ret['make'] = $this->utf8_clean($ret['make']);
		$ret['model'] = isset($ar_adf['adf']['prospect']['vehicle']['model'])? $ar_adf['adf']['prospect']['vehicle']['model'] : "" ;
		$ret['model'] = $this->utf8_clean($ret['model']);
		
		$ret['stock'] = isset($ar_adf['adf']['prospect']['vehicle']['stock'])? $ar_adf['adf']['prospect']['vehicle']['stock'] : "";
		$ret['vin'] = isset($ar_adf['adf']['prospect']['vehicle']['vin'])? $ar_adf['adf']['prospect']['vehicle']['vin'] : "";
		
		$ret['year_trade'] = null;
		$ret['make_trade'] = "";
		$ret['model_trade'] = "";
		$ret['odometer_trade'] = "";
		//Trade options
		if(isset($ar_adf['adf']['prospect']['vehicle']['option'])){
			foreach($ar_adf['adf']['prospect']['vehicle']['option'] as $v_opt){
				if($v_opt['optionname'] == 'Trade In Year'){
					$ret['year_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Make'){
					$ret['make_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Model'){
					$ret['model_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Mileage'){
					$ret['odometer_trade'] = $v_opt['manufacturecode'];
				}
			}
		}
		
		
		$ret['provider_name'] =   $ar_adf['adf']['prospect']['provider']['name']['value'];
		$ret['vendorname'] =   $ar_adf['adf']['prospect']['vendor']['vendorname'];
		return $ret;
	}
	
	public function getsource($subject = ""){
		$source_map = array(
			'AbbrName Get A Quote Form' => "Engage To Sell sales - Quote",
			'AbbrName Trade Value Form' => "Engage To Sell sales - Trade",
			'AbbrName Schedule Ride Form' => "Engage To Sell sales - Schedule Ride",
			'AbbrName Parts Request' => "Engage To Sell sales - Parts Request",
			'AbbrName Service Appointment' => "Engage To Sell sales - Service Appt.",
			'AbbrName Contact Form' => "Engage To Sell sales - Contact Us",
			'AbbrName LeadPop Popup Form' => "Engage To Sell sales - LeadPop",
		);
		return $source_map[$subject];
	}
	
	public function save_history($ret){
		
		$last_contact = $this->Contact->find('first',array('order'=>array('Contact.id DESC')));
		$last_contact_id = $last_contact['Contact']['id'];
		
		$history_data = array();
		$history_data['user_id'] = $ret['User_id']; // for change log
		//$history_data['changed_by'] = $ret; // for change log
//		$history_data['field_changed'] = "";  // for change log
		$history_data['contact_id'] = $last_contact_id;
		$history_data['sperson'] = $ret['User_first_name_last_name'];
		//$history_data['cond'] = $ret;
		$history_data['year'] = $ret['year'];
		$history_data['make'] = $ret['make'];
		$history_data['model'] = $ret['model'];
		//$history_data['type'] = $old_data['Contact']['type'];
		$history_data['sales_step'] = "Pending";
		$history_data['status'] = 'Web Lead';
		$history_data['modified'] = $ret['created'];
		$history_data['created'] = $ret['created'];
		$history_data['comment'] = $ret['comments'];
		$history_data['h_type'] = "Lead Arrived";
		$history = array(
			'History' => $history_data
		);
		$this->History->save($history);
			
	}
	
	public function get_emaildetail(){
		//$this->autoRender = false;
		$active_rule = $this->Rule->find("first",array('conditions' => array('Rule.active'=>1)));
		// configure your imap mailboxes
		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				'username'     => 'dealerweblead@gmail.com',
				'password'     => '4756ty3663'
				//'username' 	=> 'developerweb6@gmail.com',
				//'password' 	=> 'abhi1234'
			),
		);


	 	if (!count($mailboxes)) { 
			$this->out(print_r("Please configure at least one IMAP mailbox.", true));
	 	} else { 
		
			foreach ($mailboxes as $current_mailbox) {
				//echo '<h2>'.$current_mailbox['label'].'</h2>';
				$this->out(print_r($current_mailbox['label'], true));
	
				if (!$current_mailbox['enable']) {
					//echo '<p>This mailbox is disabled.</p>';
					$this->out(print_r('This mailbox is disabled', true));
				} else {
					// Open an IMAP stream to our mailbox
					$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
					
					$numMessages = imap_num_msg($imap);
					for ($i = $numMessages; $i > 0 ; $i--) {
					
						$header = imap_header($imap, $i);
						$fromInfo = $header->from[0];
						$replyInfo = $header->reply_to[0];
					 
						$details = array(
							"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
								? $fromInfo->mailbox . "@" . $fromInfo->host : "",
							"fromName" => (isset($fromInfo->personal))
								? $fromInfo->personal : "",
							"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
								? $replyInfo->mailbox . "@" . $replyInfo->host : "",
							"replyName" => (isset($replyTo->personal))
								? $replyto->personal : "",
							"subject" => (isset($header->subject))
								? $header->subject : "",
							"udate" => (isset($header->udate))
								? $header->udate : ""
						);
					 
						$uid = imap_uid($imap, $i);
						$body = $this->getBody( $uid , $imap );
						
						if(strpos($body, "&lt;") !== false){
							$body = strip_tags($body);
							$body = html_entity_decode($body);
							$body = preg_replace('/[^(\x20-\x7F)]*/','', $body);
						}
						
						//skip cycle trader
						if(strpos($body, "CycleTrader.com") !== false){
							//debug('CycleTrader');
							continue;
						}
						
						$ar_adf = XML2Array::createArray($body);
						
						if(isset($ar_adf['adf']['prospect']['provider']['name']['value']) &&  $ar_adf['adf']['prospect']['provider']['name']['value'] != 'Engage To Sell sales'){
							//debug("Not - Engage To Sell sales");
							$this->out(print_r('Not -  Engage To Sell sales', true));
							continue ;
						}
						
						$ret = $this->set_values($ar_adf, $details['subject']);
						
						$cond = array( 'Contact.created' => $ret['created'] );
						$contact = $this->Contact->find('first',array('recursive'=>-1,'conditions' => $cond,'fields'=> array('Contact.*' )));
						
						$source =  $this->getsource($details['subject']);

						if(count($contact) == 0) {
							if(!empty($ret)){
							
								if($active_rule['Rule']['type'] == 'direct'){
								
									$user_dtl = $this->User->find('first',array('recursive'=>-1,'conditions' =>array('User.id'=>$active_rule['Rule']['user_id'])));
									$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `year_trade` , `make_trade` , `model_trade` , `odometer_trade` , `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` ,	`company_id`,`user_id`, `sperson` ) values(:fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade ,    :vin, :User_first_name_last_name , "'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id , :User_id ,	:User_first_name_last_name)',array(
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$user_dtl['User']['dealer_id'],
										'User_id'=>$user_dtl['User']['id'],
										'User_first_name_last_name'=>$user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'],
									));
									
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = $user_dtl['User']['id'];
									$ret['User_first_name_last_name'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$this->save_history($ret);
									
								}else if($active_rule['Rule']['type'] == 'round-robin'){
								
									$this->loadModel('WebleadQueue');
									$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_login DESC'),'conditions'=>array(
										'WebleadQueue.last_receive'=> null,
										// 'WebleadQueue.dealer_id'=> $ret['provider_id'] 
									)));
									if(empty($receive_user)){
										$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_receive ASC'),'conditions'=>array(
											'WebleadQueue.last_receive <>'=> null,
										//	'WebleadQueue.dealer_id'=> $ret['provider_id'] 
										)));
									}
									$user_dtl = $this->User->find('first',array('recursive'=>-1,'conditions' =>array('User.id'=>$receive_user['WebleadQueue']['user_id']),'fields'=> array('User.*' )));
									//debug($user_dtl);
									
									$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` ,  `year_trade` , `make_trade` , `model_trade` , `odometer_trade` ,
									`vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` ,
									`company_id`,`user_id`, `sperson` ) values(:fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade , :vin, :User_first_name_last_name , 
									"'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id , :User_id ,
									:User_first_name_last_name)',array(
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$user_dtl['User']['dealer_id'],
										'User_id'=>$user_dtl['User']['id'],
										'User_first_name_last_name'=>$user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'],
									));
									
									$this->WebleadQueue->id = $receive_user['WebleadQueue']['id'];
									$this->WebleadQueue->saveField('last_receive', date('Y-m-d H:i:s'));
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = $user_dtl['User']['id'];
									$ret['User_first_name_last_name'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$this->save_history($ret);
									
								
								}else if($active_rule['Rule']['type'] == 'open'){
									$user_dtl['User']['dealer_id'] = "";
								
									$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `year_trade` , `make_trade` , `model_trade` , `odometer_trade` ,  `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` , `company_id`) values(:fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade ,  :vin, "Please Transfer" , "'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id)',
									array(	
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$user_dtl['User']['dealer_id']
									));
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = "";
									$ret['User_first_name_last_name'] = "";
									$this->save_history($ret);
								
								}
								$this->out(print_r('added - '.$ret['fname']." ".$ret['lname'], true));
								imap_delete($imap, $uid, FT_UID);
								imap_expunge($imap);
							}else{
								//debug('Errors');
								$this->out(print_r('Errors', true));
								imap_mail_move($imap, $uid, 'Errors', CP_UID);
								imap_expunge($imap);
							}
							
						}else{ //duplicate
							//debug('duplicate');
							$this->out(print_r('duplicate', true));
							imap_mail_move($imap, $uid, 'Duplicates', CP_UID);
							imap_expunge($imap);
						}
						
					}
					imap_close($imap);		
				
				} 
			}  
		} 
	}
	
	
	
	function getdata( $start_tag , $tag , $str ) {
		preg_match( '/<'.$start_tag.'(.*?)<\/'.$tag.'>/s', $str, $matches );
		return strip_tags($matches[0]);
	}
	
	
	function getBody($uid, $imap) {
	    $body = $this->get_part($imap, $uid, "TEXT/HTML");
    	// if HTML body is empty, try getting text body
    	if ($body == "") {
        	$body = $this->get_part($imap, $uid, "TEXT/PLAIN");
   		}
    	return $body;
	}
 
 
 
	function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
		if (!$structure) {
			   $structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if ($structure) {
			if ($mimetype == $this->get_mime_type($structure)) {
				if (!$partNumber) {
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3: return imap_base64($text);
					case 4: return imap_qprint($text);
					default: return $text;
			   }
		   }
	 
			// multipart 
			if ($structure->type == 1) {
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = "";
					if ($partNumber) {
						$prefix = $partNumber . ".";
					}
					$data = $this->get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
					if ($data) {
						return $data;
					}
				}
			}
		}
		return false;
	}
 
 
	function get_mime_type($structure) {
		$primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");
		 
		if ($structure->subtype) {
			  return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
		}
		return "TEXT/PLAIN";
	}
	
   
   
}

?>