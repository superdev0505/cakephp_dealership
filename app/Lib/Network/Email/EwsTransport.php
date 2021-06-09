<?php
App::uses('AbstractTransport', 'Network/Email');
require APP . 'Vendor' . DS . 'vendor' . DS. 'autoload.php';

use \jamesiarmes\PhpEws;
use \jamesiarmes\PhpEws\Client;
use \jamesiarmes\PhpEws\Autodiscover;
use \jamesiarmes\PhpEws\Type\MessageType;
use \jamesiarmes\PhpEws\Type\EmailAddressType;
use \jamesiarmes\PhpEws\Type\SingleRecipientType;
use \jamesiarmes\PhpEws\Type\BodyType;
use \jamesiarmes\PhpEws\Request\CreateItemType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfAllItemsType;

use \jamesiarmes\PhpEws\Type\FileAttachmentType;
use \jamesiarmes\PhpEws\Request\CreateAttachmentType;
use \jamesiarmes\PhpEws\Type\NonEmptyArrayOfAttachmentsType;
use \jamesiarmes\PhpEws\Type\ItemIdType;
use \jamesiarmes\PhpEws\Request\SendItemType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseItemIdsType;
use \jamesiarmes\PhpEws\Type\TargetFolderIdType;
use \jamesiarmes\PhpEws\Type\DistinguishedFolderIdType;

class EwsTransport extends AbstractTransport {

	protected $_cakeEmail;

	protected function _prepareMessageHeaders() {
		return $this->_cakeEmail->getHeaders(array('from', 'sender', 'replyTo', 'readReceipt', 'to', 'cc', 'subject'));
	}
	protected function _prepareMessage() {
		$lines = $this->_cakeEmail->message();
		// debug($lines);
		$messages = array();
		foreach ($lines as $line) {
			if ((!empty($line)) && ($line[0] === '.')) {
				$messages[] = '.' . $line;
			} else {
				$messages[] = $line;
			}
		}
		return implode("\r\n", $messages);
	}

	private function __buildMessage()
	{
		if ($this->_cakeEmail->emailFormat() === 'html' || $this->_cakeEmail->emailFormat() === 'both') {
			$message = $this->_cakeEmail->message('html');
		}
		if ($this->_cakeEmail->emailFormat() === 'text' || $this->_cakeEmail->emailFormat() === 'both') {
			$message = $this->_cakeEmail->message('text');
		}
		return $message;
	}

    //New Version
    public function send(CakeEmail $Email) {

        $config = $this->config();
        $this->_cakeEmail = $Email;

        $to = $this->_cakeEmail->to();
        $from =  $this->_cakeEmail->from();

        $cc = $this->_cakeEmail->cc();
        $bcc = $this->_cakeEmail->bcc();

        $subject = $this->_cakeEmail->subject();
        $attachments_files = $this->_cakeEmail->attachments();
        $message = $this->__buildMessage();

        $server = $config['host'];
        $username = $config['username'];
        $password = $config['password'];

        if( isset($config['version']) && $config['version'] ){
            $ews = new Client($server, $username, $password, $config['version']);
        }else{
            $ews = new Client($server, $username, $password);
        }
        $msg = new MessageType();

        //Recipients
        $toAddresses = array();
        foreach($to as $key => $value){
            $toAddress = new EmailAddressType();
            $toAddress->EmailAddress = $key;
            $toAddress->Name = $value;
            $toAddresses[] = $toAddress;
        }
        $msg->ToRecipients = $toAddresses;

        //CcRecipients
        $ccAddresses = array();
        foreach($cc as $key => $value){
            $ccAddress = new EmailAddressType();
            $ccAddress->EmailAddress = $key;
            $ccAddress->Name = $value;
            $ccAddresses[] = $ccAddress;
        }
        if(!empty($ccAddresses)){
            $msg->CcRecipients = $ccAddresses;    
        }
        

        //BCC Recipient
        $bccAddresses = array();
        foreach($bcc as $key => $value){
            $bccAddress = new EmailAddressType();
            $bccAddress->EmailAddress = $key;
            $bccAddress->Name = $value;
            $bccAddresses[] = $bccAddress;
        }
        if(!empty($bccAddresses)){
            $msg->BccRecipients = $bccAddresses;
        }
        



        //From Address
        $fromAddress = new EmailAddressType();
        $fromAddress->EmailAddress = key($from);
        $fromAddress->Name = $from[ key($from) ];
        $msg->From = new SingleRecipientType();
        $msg->From->Mailbox = $fromAddress;

        $msg->Subject = $subject;
        $msg->Body = new BodyType();
        $msg->Body->BodyType = 'HTML';
        $msg->Body->_ = $message;

        if(!empty($attachments_files)){

            //Attachments
            $msgRequest = new CreateItemType();
            $msgRequest->Items = new NonEmptyArrayOfAllItemsType();
            $msgRequest->Items->Message = $msg;
            $msgRequest->MessageDisposition = 'SaveOnly';
            $msgRequest->MessageDispositionSpecified = true;
            $msgResponse = $ews->CreateItem($msgRequest);
            $msgResponseItems = $msgResponse->ResponseMessages->CreateItemResponseMessage->Items;

            //Adding attachment files
            $attachments = array();
            $att_index = 0;
            foreach($attachments_files as $key => $value){

                $attachment = new FileAttachmentType();

                if(isset($value['data'])){
                    $attachment->Content = base64_decode($value['data']) ;
                }else{
                    $attachment->Content = file_get_contents($value['file']);    
                }
                
                $attachment->Name = $key;
                $attachment->ContentType = $value['mimetype'];
                $attachments[] = $attachment;

                $attRequest = new CreateAttachmentType();
                $attRequest->ParentItemId = $msgResponseItems->Message->ItemId;
                $attRequest->Attachments = new NonEmptyArrayOfAttachmentsType();
                $attRequest->Attachments->FileAttachment = $attachment;

                $attResponse = $ews->CreateAttachment($attRequest);
                $attResponseId = $attResponse->ResponseMessages->CreateAttachmentResponseMessage->Attachments->FileAttachment->AttachmentId;

                $msgItemId = new ItemIdType();
                $msgItemId->ChangeKey = $attResponseId->RootItemChangeKey;
                $msgItemId->Id = $attResponseId->RootItemId;

                $att_index++;
            }

            // Send and save message
            $msgSendRequest = new SendItemType();
            $msgSendRequest->ItemIds = new NonEmptyArrayOfBaseItemIdsType();
            $msgSendRequest->ItemIds->ItemId = $msgItemId;
            $msgSendRequest->SavedItemFolderId = new TargetFolderIdType();
            $sentItemsFolder = new DistinguishedFolderIdType();
            $sentItemsFolder->Id = 'sentitems';
            $msgSendRequest->SavedItemFolderId->DistinguishedFolderId = $sentItemsFolder;
            $msgSendRequest->SaveItemToFolder = true;
            return $msgSendResponse = $ews->SendItem($msgSendRequest);

        }else{

            //Without attachment
            $msgRequest = new CreateItemType();
            $msgRequest->Items = new NonEmptyArrayOfAllItemsType();
            $msgRequest->Items->Message = $msg;
            $msgRequest->MessageDisposition = 'SendAndSaveCopy';
            $msgRequest->MessageDispositionSpecified = true;
            // debug($msg);
            return $response = $ews->CreateItem($msgRequest);
        }

    }
	
    //Old Version
    public function send_old(CakeEmail $Email) {
    	$this->_cakeEmail = $Email;

        $config = $this->config();
        
        // $message = $this->_prepareMessage();
        // $headers = $this->_prepareMessageHeaders();

        $to = $this->_cakeEmail->to();
        $from =  $this->_cakeEmail->from();
        $subject = $this->_cakeEmail->subject();
        $attachments = $this->_cakeEmail->attachments();
        debug( $attachments );

        $message = $this->__buildMessage();
        debug( $message );
        debug( $config );
        
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'ExchangeWebServices.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'NTLMSoapClient.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'NTLMSoapClient/Exchange.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWS_Exception.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/MessageType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/EmailAddressType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/BodyType.php');

        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/FileAttachmentType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/CreateAttachmentType.php');

        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/SingleRecipientType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/CreateItemType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/NonEmptyArrayOfAllItemsType.php');
        require_once(APP.'Vendor'.DS.'php-ews'.DS.'EWSType/ItemType.php');

        $server = $config['host'];
        $username = $config['username'];
        $password = $config['password'];

        $ews = new ExchangeWebServices($server, $username, $password);
        $msg = new EWSType_MessageType();

        $toAddresses = array();
        foreach($to as $key => $value){
        	$toAddress = new EWSType_EmailAddressType();
        	$toAddress->EmailAddress = $key;
	        $toAddress->Name = $value;
	        $toAddresses[] = $toAddress;
        }
        $msg->ToRecipients = $toAddresses;

        $fromAddress = new EWSType_EmailAddressType();
        $fromAddress->EmailAddress = key($from);
        $fromAddress->Name = $from[ key($from) ];

        $msg->From = new EWSType_SingleRecipientType();
        $msg->From->Mailbox = $fromAddress;
        $msg->Subject = $subject;

        $msg->Body = new EWSType_BodyType();
        $msg->Body->BodyType = 'HTML';
        $msg->Body->_ = $message;

		$msgRequest = new EWSType_CreateItemType();
        $msgRequest->Items = new EWSType_NonEmptyArrayOfAllItemsType();
        $msgRequest->Items->Message = $msg;
        $msgRequest->MessageDisposition = 'SendAndSaveCopy';
        $msgRequest->MessageDispositionSpecified = true;
                
        $response = $ews->CreateItem($msgRequest);
        return $response;
    }

    public function config($config = null) {
		if ($config === null) {
			return $this->_config;
		}
		$default = array(
			'host' => '',
			'port' => 25,
			'timeout' => 30,
			'username' => '',
			'password' => '',
			'client' => null,
			'tls' => false,
			'ssl_allow_self_signed' => false
		);
		$this->_config = array_merge($default, $this->_config, $config);
		return $this->_config;
	}


}

