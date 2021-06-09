<?php 
class ParsemailShell extends AppShell {
	public $uses = array('UserEmail','History','User','Setting','Contact','UserTemplate','Template');

	
	public function send_emails(){
		phpinfo();
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->config('sender');
		$email->viewVars(array('email_content'=>'test messae'));
		$email->template('internal_message')
			->emailFormat('html')
			->subject('test mail from cron')
			->from('andrew@dp360crm.com')
			->to('awrussel2002@gmail.com')
			->replyTo(array('andrew@dp360crm.com'=> 'Tod'))
			->send();
	
	}

	public function get_ids($str){

		$pos = strpos($str, "REF: ");
		if ($pos !== false) {

			$fpos = $pos+5;
			$last = stripos($str, ' ' , $fpos);
			$ref = substr($str, $fpos , $last -  $fpos  );
			//debug($ref);		

			$sender_part=explode('.',$ref);
			$id_part=explode('_',$sender_part[1]);

			/*
			array(
			(int) 0 => array(
			        (int) 0 => '20559',
			        (int) 1 => '50',
			        (int) 2 => '5000'
			),
			(int) 1 => array(
			        (int) 0 => 'C',
			        (int) 1 => '20559_50_5000'
			)
			)
			*/

			return array($id_part, $sender_part); 

		}else{
			return false;
		}
	}

	public function parse_emails(){

		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				'username'     => 'leads@dp360crm.com',
				'password'     => 'TK4756ty3663TK!'
			),
		);

		if (!count($mailboxes)) { 
			$this->out(print_r("Please configure at least one IMAP mailbox.", true));
	 	} else { 

	 		foreach ($mailboxes as $current_mailbox) {
	 			$this->out(print_r($current_mailbox['label'], true));

	 			if (!$current_mailbox['enable']) {
					$this->out(print_r('This mailbox is disabled', true));
				} else {

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

						$body = utf8_encode($body);
						//debug($body);
						$ids = $this->get_ids($body);
						if($ids !== false){
							
							$sender_type = $ids[1][0]; // C OR U
							$contact_id = $ids[0][0];
							$user_id = $ids[0][1];
							$dealer_id = $ids[0][2];

							
							$receiver_id = $user_id;
							$dealer_id = $dealer_id;
							$model = ($sender_type == 'C')?'Contact':'User';
							
							//contact info
							$sender_info = $this->Contact->findById($contact_id);
														//user info
							$reciever_info = $this->User->findById($receiver_id);
												
							
							$emailData['UserEmail']['sender_id']=$sender_info['Contact']['id'];
							$emailData['UserEmail']['sender_name']=$sender_info['Contact']['full_name'];
							$emailData['UserEmail']['email_from']=$sender_info['Contact']['email'];
							$emailData['UserEmail']['email_type']=strtolower('Contact');
							$emailData['UserEmail']['receiver_id']=$reciever_info['User']['id'];
							$emailData['UserEmail']['receiver_name']=$reciever_info['User']['full_name'];
							$emailData['UserEmail']['email_replyto']=$reciever_info['User']['email'];
							$emailData['UserEmail']['subject']=$details['subject'];
							$emailData['UserEmail']['message'] = $body;
							
							$timezone = $reciever_info['User']['zone'];
							date_default_timezone_set($timezone);
							$received_date = date('Y-m-d H:i:s');
							$emailData['UserEmail']['received_date']=$received_date;
							
							
							//copy of the email to sales person
							
							App::uses('CakeEmail', 'Network/Email');
							$email = new CakeEmail();
							$email->config('sender');
							$email->viewVars(array('email_content'=>$emailData['UserEmail']['message']));
							$email->template('internal_message')
								->emailFormat('html')
								->subject($details['subject'])
								->from($sender_info['Contact']['email'])
								->to($reciever_info['User']['email'])
								->replyTo(array($sender_info['Contact']['email']=> $sender_info['Contact']['full_name']))
								->send();
							
							
							$this->UserEmail->create();
							if( $this->UserEmail->save($emailData) ){
								$this->out(print_r('New Message - '.$sender_info['Contact']['full_name'], true));
								imap_delete($imap, $uid, FT_UID);
								imap_expunge($imap);
							}




						}


					}


				}	


	 		}

	 	}
		
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










	
	public function parse_emails_old(){
	
		//require_once('MimeMailParser.class.php');
		
		App::import('Vendor', 'MimeMailParserClass', array('file' => 'MimeMailParser.class.php'));
		$path = '/home/emails/Maildir/new';
		$files = scandir($path);
		
		
		foreach($files as $file){
			if($file == '.' || $file == '..')
				continue;
			//$file=end($files);
			//debug($file);
			
			$file_path=$path.'/'.$file;
			$perms=fileperms ($file_path);
			
			try{
			
				$Parser = new MimeMailParser();
				$Parser->setPath($file_path);
				//$header=$Parser->getHeadersRaw();
				$header=$Parser->getHeaders();
				$to = $Parser->getHeader('to');
				$from = $Parser->getHeader('from');
				$subject = $Parser->getHeader('subject');
				$text = $Parser->getMessageBody('text');
				$html = $Parser->getMessageBody('html');
				
				
				if(strpos($to, "yourlocaldealership.com") !== false){
					
					//debug( $from );
					
					$to_part=explode('@',$to);
					$id_part=explode('_',$to_part[0]);
					$sender_part=explode('.',$id_part[0]);
					
					//debug($sender_part);
					//debug($id_part);
					
					$receiver_id=$id_part[1];
					$dealer_id=$id_part[2];
					$model=($sender_part[0]=='C')?'Contact':'User';
					
					//contact info
					$sender_info = $this->Contact->findById($sender_part[1]);
					//debug($sender_info);
					//user info
					$reciever_info=$this->User->findById($receiver_id);
					//print_r($reciever_info);
					//$this->out(print_r($reciever_info, true));
					//$this->out(print_r($sender_info, true));
					
					
					$emailData['UserEmail']['sender_id']=$sender_info['Contact']['id'];
					$emailData['UserEmail']['sender_name']=$sender_info['Contact']['full_name'];
					$emailData['UserEmail']['email_from']=$sender_info['Contact']['email'];
					$emailData['UserEmail']['email_type']=strtolower('Contact');
					$emailData['UserEmail']['receiver_id']=$reciever_info['User']['id'];
					$emailData['UserEmail']['receiver_name']=$reciever_info['User']['full_name'];
					$emailData['UserEmail']['email_replyto']=$reciever_info['User']['email'];
					$emailData['UserEmail']['subject']=$subject;
					$emailData['UserEmail']['message']=$text . "<br /><br />".$reciever_info['User']['email'];
					
					$timezone = $reciever_info['User']['zone'];
					date_default_timezone_set($timezone);
					$received_date = date('Y-m-d H:i:s');
					$emailData['UserEmail']['received_date']=$received_date;
					
					
					//copy of the email to sales person
					
					App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->config('sender');
					$email->viewVars(array('email_content'=>$emailData['UserEmail']['message']));
					$email->template('internal_message')
						->emailFormat('html')
						->subject($subject)
						->from($sender_info['Contact']['email'])
						->to($reciever_info['User']['email'])
						->replyTo(array($sender_info['Contact']['email']=> $sender_info['Contact']['full_name']))
						->send();
					

					
					
							
					
					$this->UserEmail->create();
					if( $this->UserEmail->save($emailData) ){
						//Move file 
						rename($file_path, "/home/emails/Maildir/cur/".$file);
						$this->out(print_r('New Message - '.$sender_info['Contact']['full_name'], true));
					}
					
				}
			
			
			} catch (Exception $e) {
    			$this->out(print_r($e->getMessage(), true));
			}
			
		
		}
	
	}


   
   
}

?>