<?php
class CycletraderController extends AppController {

    public $uses = array('Contact','User');
    public $components = array('RequestHandler');

	public function test(){
		$dt_ar = explode("T","2014-04-24T1:14:13 PM");
		echo date("Y-m-d H:i:s",strtotime($dt_ar[0]." ".$dt_ar[1]));
		
		//get make the queue
		$this->loadModel('WebleadQueue');
		$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_login DESC'),'conditions'=>array('WebleadQueue.last_receive'=> null,'WebleadQueue.dealer_id'=> '5000' )));
		if(empty($receive_user)){
			$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_receive ASC'),'conditions'=>array('WebleadQueue.last_receive <>'=> null,'WebleadQueue.dealer_id'=> '5000' )));
		}
		debug($receive_user);
	
	}
	
	
	
	
	public function get_plainemaildetail(){
	
		$this->autoRender = false;

		// configure your imap mailboxes
		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				//'username'     => 'dealerweblead@gmail.com',
				//'password'     => '4756ty3663'
				'username' 	=> 'developerweb6@gmail.com',
				'password' 	=> 'abhi1234'
			),
		);


	 	if (!count($mailboxes)) { 
			echo '<p>Please configure at least one IMAP mailbox.</p>';
	 	} 
	 	else { 

			foreach ($mailboxes as $current_mailbox) {
			
				echo '<h2>'.$current_mailbox['label'].'</h2>';
	
				if (!$current_mailbox['enable']) {
					echo '<p>This mailbox is disabled.</p>';
				
				} 
				else {
				
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
						
												
						$find  = 'VEHICLE INFO';
						$find2  = 'LEAD CONTACT INFO';
						
						$pos  = strpos($body , $find);
						$pos2 = strpos($body , $find);
						$dtlarr = array();	
						if ( ($pos !== false) &&  ($pos2 !== false) ) {
 
 							 $get_next_line = false;
							 $vehicle_info = false;
							 
							 $line = explode( '</o:p></pre>'  , $body );
							 
							 for( $x = 0 ; $x < count($line) ; $x++ ) {
							 	 
								 
								  // code for the vehicle info
								 		  	
								  if( $get_next_line) {
								  
									  $arr =  explode( ',' , $line[$x] );
								  
									  $dtlarr['amount'] = trim($arr[1]);
									  $arr_inv = explode(' ' , $arr[0]);
									  $a1 = str_replace("style='background:white'>" , '' , $arr_inv[1] );
									  $dtlarr['year']  =  trim(strip_tags($a1));
									  $dtlarr['make']  =  trim(strip_tags($arr_inv[2]));
									  $dtlarr['model'] =  trim(strip_tags($arr_inv[3]));
									  $dtlarr['type']  =  trim(strip_tags($arr_inv[4]));
									  
									  $get_next_line = false;
									  
									  //$ret =  str_replace( '<pre [make]=""> style=\'background:white\'&gt;' , '' ,  $ret[1]);
								  }
								  
								  
								  $pos  = strpos($line[$x] , 'VEHICLE INFO');
								  if ( $pos !== false) {
									  $get_next_line = true;
								  }
								  
								  $exst  = strpos($line[$x] , 'Ad ID:');
								  
								  if( $exst !== false ) {
									   $dtlarr['ID'] = $this->parsenonXML($line[$x] , 'Ad ID:');
								  }
								  
								  
								  //  lead contact info
								  $aa = array("Name" ,"Email" , "Comments" , "Type" , "Make" , "Model" , "Year" , "Best time to call" , "StockNumber");
								  
								  
								  
								  for(  $zz=0 ; $zz < count($aa) ; $zz++) {
								  
								  		$pos  = strpos($line[$x] , $aa[$zz]);
										if( $pos !== false) {
											$dtlarr[$aa[$zz]] =  $this->parsenonXML ( $line[$x] , $aa[$zz].":" );
										}
										
								  }

								  
								  
								  
							 }
							 
							 //Array ( [Email] => grace79leo@gmail.com [Type] => Motorcycle or ATV [amount] => $2999      [year] => 2006 [make] => Suzuki [model] => Boulevard [type] => S40 [ID] => 112195494  [Name] => Grace Holcomb [Comments] => TRADE-IN DETAILS [Make] => KAWASAKI [Model] => NINJA ZX [Year] => 2007 [Best time to call] => Anytime [StockNumber] => C00498 )
							 						
							$cond = array( 'Contact.vin' => $dtlarr['ID'] );
							$contact = $this->Contact->find('first',array('conditions' => $cond,'fields'=> array('Contact.*' )));
							
							if(!count($contact)) {

							 
							 $this->Contact->query('Insert into contacts(   `year` , `make` , `model` , `type` , `stock_num` , email , type_trade , trade_value , year_trade , make_trade , model_trade , best_time , notes  , sperson , vin ,  `status` , `contact_status_id` , `sales_step` , `lead_status` ) values( "'.$dtlarr['year'].'" , "'.$dtlarr['make'].'" , "'.$dtlarr['model'].'" , "'.$dtlarr['type'].'" , "'.$dtlarr['StockNumber'].'" ,  "'.$dtlarr['Email'].'" , "'.$dtlarr['Email'].'" ,  "'.$dtlarr['Type'].'" ,  "'.$dtlarr['Year'].'" , "'.$dtlarr['Make'].'"  , "'.$dtlarr['Model'].'" ,   "'.$dtlarr['Best time to call'].'" , "'.$dtlarr['Comments'].'" , "'.$dtlarr['Name'].'" ,  "'.$dtlarr['ID'].'"  , "Web Lead"  , "5" , "Pending" , "Open")');
							 
							 }
						
						}
						
						
					}
				} 
			}  
		} 
	}
	
	
	
	
	public function parsenonXML( $line , $title ) {
		$ret = explode($title , $line);		
		return trim(strip_tags($ret[1]));
	}
	
	
	
	
	
	
	
	function getplaindata( $start_tag , $tag , $str ) {
		preg_match( '/'.$start_tag.'(.*?)'.$tag.'/s', $str, $matches );
		$str = $matches[0];
		$str = str_replace($start_tag , '' , $str);
		$str = str_replace($tag , '' , $str);
		$str = str_replace('&nbsp;' , '' , $str);
		return strip_tags($str);
	}
	
	
	
	
	
	
	
	
	public function get_emaildetail(){
		//$this->autoRender = false;

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
			echo '<p>Please configure at least one IMAP mailbox.</p>';
	 	} 
	 	else { 

			foreach ($mailboxes as $current_mailbox) {
			
				echo '<h2>'.$current_mailbox['label'].'</h2>';
	
				if (!$current_mailbox['enable']) {
					echo '<p>This mailbox is disabled.</p>';
				
				} 
				else {
				
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
						
						
						
						if(strpos($body, "&lt;adf&gt;") == false){
							preg_match_all( '/<adf>(.*?)<\/adf>/s', $body, $matches );
						}else{
							preg_match_all( '/&lt;adf&gt;(.*?)&lt;\/adf&gt;/s', $body, $matches );
						}
						//preg_match_all( '/<adf>(.*?)<\/adf>/s', $body, $matches );
						//preg_match_all( '/&lt;adf&gt;(.*?)&lt;\/adf&gt;/s', $body, $matches );
						//debug($matches);
								
						$arr[0][0] = 'requestdate';
						$arr[0][1] = 'requestdate';
						$arr[0][2] = 'requestdate';
								
						$arr[1][0] = 'name part="first"';
						$arr[1][1] = 'name';
						$arr[1][2] = 'fname';
								
						$arr[2][0] = 'name part="last"';
						$arr[2][1] = 'name';
						$arr[2][2] = 'lname';
								
						$arr[3][0] = 'phone type="voice" time="day"';
						$arr[3][1] = 'phone';
						$arr[3][2] = 'phoneday';
								
						$arr[4][0] = 'phone type="voice" time="evening"';
						$arr[4][1] = 'phone';
						$arr[4][2] = 'evening';
								
						$arr[5][0] = 'phone type="cellphone"';
						$arr[5][1] = 'phone';
						$arr[5][2] = 'cellphone';
								
						$arr[6][0] = 'email';
						$arr[6][1] = 'email';
						$arr[6][2] = 'email';
								
						$arr[7][0] = 'comments';
						$arr[7][1] = 'comments';
						$arr[7][2] = 'comments';
								
						$arr[8][0] = 'year';
						$arr[8][1] = 'year';
						$arr[8][2] = 'year';
								
						$arr[9][0] = 'make';
						$arr[9][1] = 'make';
						$arr[9][2] = 'make';
								
						$arr[10][0] = 'model';
						$arr[10][1] = 'model';
						$arr[10][2] = 'model';
								
						$arr[11][0] = 'stock';
						$arr[11][1] = 'stock';
						$arr[11][2] = 'stock';
								
						$arr[12][0] = 'vin';
						$arr[12][1] = 'vin';
						$arr[12][2] = 'vin';
								
						$arr[13][0] = 'vendorname';
						$arr[13][1] = 'vendorname';
						$arr[13][2] = 'vendorname';
								
						$arr[14][0] = 'phone';
						$arr[14][1] = 'phone';
						$arr[14][2] = 'phone';
								
						$arr[15][0] = 'street line="1"';
						$arr[15][1] = 'street';
						$arr[15][2] = 'street';
								
						$arr[16][0] = 'city';
						$arr[16][1] = 'city';
						$arr[16][2] = 'city';
								
						$arr[17][0] = 'regioncode';
						$arr[17][1] = 'regioncode';
						$arr[17][2] = 'regioncode';
								
						$arr[18][0] = 'postalcode';
						$arr[18][1] = 'postalcode';
						$arr[18][2] = 'postalcode';
								
						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';
								
						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';
								
						$arr[19][0] = 'country';
						$arr[19][1] = 'country';
						$arr[19][2] = 'country';
								
						$arr[20][0] = 'id';
						$arr[20][1] = 'id';
						$arr[20][2] = 'provider_id';
								
						$arr[21][0] = 'service';
						$arr[21][1] = 'service';
						$arr[21][2] = 'provider_service';
								
						$arr[22][0] = 'dealix';
						$arr[22][1] = 'dealix';
						$arr[22][2] = 'provider_dealix';
								
						$arr[23][0] = 'url';
						$arr[23][1] = 'url';
						$arr[23][2] = 'provider_url';
								
						$arr[24][0] = 'name sequence="1" part="full"';
						$arr[24][1] = 'name';
						$arr[24][2] = 'provider_name';
								
						$arr[25][0] = 'name part="full"';
						$arr[25][1] = 'name';
						$arr[25][2] = 'contact_name';
								
						$arr[26][0] = 'phone';
						$arr[26][1] = 'phone';
						$arr[26][2] = 'contact_phone';
						
						for($z=0 ; $z < count($matches[0]) ; $z++ ) {
						
							$str  = $matches[0][$z];

							$str = str_replace("<![CDATA[","",$str);
							$str = str_replace("]]>","",$str);
							
							echo '<br><br><br>';
							
							$str = str_replace("&lt;", "<", $str);
							$str = str_replace("&gt;", ">", $str);
							$str = str_replace('&quot;', '"' , $str);
							for($x=0 ; $x < count($arr) ; $x++ ) {
								$ret[$arr[$x][2]] = $this->getdata( $arr[$x][0] , $arr[$x][1] , $str );
							}
							
							$dt_ar = explode("T",$ret['requestdate']);
							$created = date("Y-m-d H:i:s",strtotime($dt_ar[0]." ".$dt_ar[1]));
								
							$cond = array( 'Contact.created' => $created );
							$contact = $this->Contact->find('first',array('conditions' => $cond,'fields'=> array('Contact.*' )));
							
							debug($ret);

							if(count($contact) == 0) {
							
								//$cond = array( 'User.dealer_id' => $ret['provider_id'] ,  'User.username' => $ret['provider_service']  );
								//$user_dtl = $this->User->find('first',array('conditions' => $cond,'fields'=> array('User.*' )));
								
								$this->loadModel('WebleadQueue');
								$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_login DESC'),'conditions'=>array('WebleadQueue.last_receive'=> null,'WebleadQueue.dealer_id'=> $ret['provider_id'] )));
								if(empty($receive_user)){
									$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_receive ASC'),'conditions'=>array('WebleadQueue.last_receive <>'=> null,'WebleadQueue.dealer_id'=> $ret['provider_id'] )));
								}
								
								$year = ($ret['year'] != '')? '"'.$ret['year'].'"' : "null" ;
								
								if(!empty($receive_user)){
									$user_dtl = $this->User->find('first',array('conditions' =>array('User.id'=>$receive_user['WebleadQueue']['user_id']),'fields'=> array('User.*' )));
									$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `company` , `company_id`,`user_id`, `sperson` ) values("'.$ret['fname'].'" , "'.$ret['lname'].'" , "'.$created.'" ,  "'.$ret['requestdate'].'" ,  "'.$ret['evening'].'" ,  "'.$ret['cellphone'].'" , "'.$ret['email'].'"  , '.$year.' , "'.$ret['make'].'" ,  "'.$ret['model'].'"  , "'.$ret['stock'].'" , "'.$ret['vin'].'" ,  "None" , "Website" , "'.$ret['street'].'" , "'.$ret['city'].'", "'.$ret['regioncode'].'", "'.$ret['postalcode'].'" , "Web Lead"  , "5" , "Pending" , "Open" ,  "'.$ret['comments'].'" ,  "'.$ret['vendorname'].'" , "'.$user_dtl['User']['dealer_id'].'" , "'.$user_dtl['User']['id'].'" , "'.$user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'].'"  )');
									
									$this->WebleadQueue->id = $receive_user['WebleadQueue']['id'];
									$this->WebleadQueue->saveField('last_receive', date('Y-m-d H:i:s'));
									
								}else{
									$user_dtl['User']['dealer_id'] = $ret['provider_id'];
									$this->Contact->query('Insert into contacts( `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `company` , `company_id` ) values("'.$ret['fname'].'" , "'.$ret['lname'].'" , "'.$created.'" ,  "'.$ret['requestdate'].'" ,  "'.$ret['evening'].'" ,  "'.$ret['cellphone'].'" , "'.$ret['email'].'"  , '.$year.' , "'.$ret['make'].'" ,  "'.$ret['model'].'"  , "'.$ret['stock'].'" , "'.$ret['vin'].'" ,  "None" , "Website" , "'.$ret['street'].'" , "'.$ret['city'].'", "'.$ret['regioncode'].'", "'.$ret['postalcode'].'" , "Web Lead"  , "5" , "Pending" , "Open" , "'.$ret['comments'].'" , "'.$ret['vendorname'].'" , "'.$user_dtl['User']['dealer_id'].'" )');
								}
							
							}
							
						}
						
						
					}
						
					
				
				
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



