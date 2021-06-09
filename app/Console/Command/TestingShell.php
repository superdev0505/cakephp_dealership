<?php 

// ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');
// require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';
// use Aws\S3\S3Client;

// App::uses('AbstractTransport', 'Network/Email');
require APP . 'Vendor' . DS . 'vendor' . DS. 'autoload.php';

use \jamesiarmes\PhpEws\Client;
use \jamesiarmes\PhpEws\Request\FindItemType;
use \jamesiarmes\PhpEws\Type\ItemResponseShapeType;
use \jamesiarmes\PhpEws\Enumeration\DefaultShapeNamesType;
use \jamesiarmes\PhpEws\Type\ContactsViewType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseFolderIdsType;
use \jamesiarmes\PhpEws\Type\DistinguishedFolderIdType;
use \jamesiarmes\PhpEws\Enumeration\DistinguishedFolderIdNameType;
use \jamesiarmes\PhpEws\Enumeration\ItemQueryTraversalType;
use \jamesiarmes\PhpEws\Type\IndexedPageViewType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfFieldOrdersType;
use \jamesiarmes\PhpEws\Type\FieldOrderType;
use \jamesiarmes\PhpEws\Enumeration\RoutingType;
use \jamesiarmes\PhpEws\Autodiscover;
use \jamesiarmes\PhpEws\Type\PathToUnindexedFieldType;
use \jamesiarmes\PhpEws\Type\FieldURIOrConstantType;
use \jamesiarmes\PhpEws\Type\ConstantValueType;
use \jamesiarmes\PhpEws\Type\RestrictionType;
use \jamesiarmes\PhpEws\Type\IsGreaterThanType;
use \jamesiarmes\PhpEws\Request\GetItemType;
use \jamesiarmes\PhpEws\Enumeration\BodyTypeResponseType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfPathsToElementType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseItemIdsType;
use \jamesiarmes\PhpEws\Type\ItemIdType;

class TestingShell extends AppShell {

	private function get_attachment_data($filename){

		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "dp360-attachments";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename
		));
		return $result['Body'];
    }
	
	public function exchange_test() {		

		App::uses('CakeEmail', 'Network/Email');
		
		$header = '<p style="font-size: 18px; font-weight: bold;">Test email message from php ews library.</p>';
		$html = '<p style="font-size: 18px; font-weight: bold;">Test email message from php ews library.</p>';
		$footer = '<p style="font-size: 18px; font-weight: bold;">Test email message from php ews library.</p>';

		$Email = new CakeEmail();
		$Email->config(array(
			'host' => 'webmail.selkinginternational.com',
			'transport' => 'Ews',
			'username' => 'greatint\rcollins',
			'password' => 'WaltDisneyIs#1'
		));
		$Email->template('ews_test', 'ews_layout');
		$Email->emailFormat('html');
		$Email->viewVars(array('header' => $header, 'html'=>$html, 'footer' => $footer));
		
		$Email->from(['roncollins@selkinginternational.com'=>'Ron Collins']);
		// $Email->to('russel@dp360crm.com');
		$Email->to(array('russel@dp360crm.com' => 'Russel') );

		$Email->subject('Test Message Ews');

		$data_attachment_data = $this->get_attachment_data('57ef36bbc0fea_57ef36bbc1095_Screen Shot 2016-08-11 at 9.51.21 PM.png');
		// debug($data_attachment_data);

		// debug(file_get_contents(WWW_ROOT."files".DS."Screen Shot 2016-09-29 at 10.26.42 AM.png"));
		
		$Email->attachments(array(
			'57ef36bbc0fea_57ef36bbc1095_Screen Shot 2016-08-11 at 9.51.21 PM.png' => array(
				'data' => $data_attachment_data,
			),
			'additional_contact_template1.csv' => array(
				'file' => WWW_ROOT."files".DS."additional_contact_template1.csv",
			),
			// 'additional_contact_template.csv' => array(
			// 	'file' => WWW_ROOT."files".DS."additional_contact_template.csv",
			// )
		));

		// $Email->attachments(array(
		// 	'additional_contact_template.csv' => array(
		// 		'file' => WWW_ROOT."files".DS."additional_contact_template.csv",
		// 	)
		// ));

		$response = $Email->send();
		debug( $response );

		$this->autoRender = false;
	}

	public function auto_discover(){

		// $email = 'roncollins@selkinginternational.com';
  //       $username = 'greatint\rcollins';
  //       $password = 'WaltDisneyIs#1';

		// $ews = Autodiscover::getEWS($email, $password, $username);
		// debug($ews);
	
		$date = new DateTime('6 hour ago');
		$dd = $date->format('c');
		debug($dd);


		$date = new DateTime('2 day ago', new \DateTimeZone( 'UTC' ) );
		$dd = $date->format('c');
		debug($dd);

	}

	public function email_list(){
		
		$server = 'webmail.selkinginternational.com';
        $username = 'greatint\rcollins';
        $password = 'WaltDisneyIs#1';

		$ews = new Client($server, $username, $password);

		$request = new FindItemType();
		$request->ItemShape = new ItemResponseShapeType();
		$request->ItemShape->BaseShape = DefaultShapeNamesType::DEFAULT_PROPERTIES;
			
		$request->Traversal = ItemQueryTraversalType::SHALLOW;
			
		// Limits the number of items retrieved
		$request->IndexedPageItemView = new IndexedPageViewType();
		$request->IndexedPageItemView->BasePoint = "Beginning";
		$request->IndexedPageItemView->Offset = 0; // Item number you want to start at
		$request->IndexedPageItemView->MaxEntriesReturned = 100; // Numer of items to return in total

		$request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
		$request->ParentFolderIds->DistinguishedFolderId = new DistinguishedFolderIdType();
		$request->ParentFolderIds->DistinguishedFolderId->Id = DistinguishedFolderIdNameType::INBOX;

		// Search on the contact's created date and time.
		$request->Restriction = new RestrictionType();
		$request->Restriction->IsGreaterThan = new IsGreaterThanType();

		$request->Restriction->IsGreaterThan->FieldURI = new PathToUnindexedFieldType();
		$request->Restriction->IsGreaterThan->FieldURI->FieldURI = 'item:DateTimeCreated';
		
		$date = new DateTime('8 hour ago');
		// We only want contacts created in the last week.
		$request->Restriction->IsGreaterThan->FieldURIOrConstant = new FieldURIOrConstantType();
		$request->Restriction->IsGreaterThan->FieldURIOrConstant->Constant = new ConstantValueType();
		$request->Restriction->IsGreaterThan->FieldURIOrConstant->Constant->Value = $date->format('c');
		debug($date->format('c'));

		// sort order
		$request->SortOrder = new NonEmptyArrayOfFieldOrdersType();
		$request->SortOrder->FieldOrder = array();
		$order = new FieldOrderType();

		$order->FieldURI = '';
		@$order->FieldURI->FieldURI = 'item:DateTimeReceived';
		$order->Order = 'Ascending'; 
		$request->SortOrder->FieldOrder[] = $order;

		$response = $ews->FindItem($request);

		if(!isset($response->ResponseMessages->FindItemResponseMessage->RootFolder))
		{
			$responseMessage = $response->ResponseMessages->FindItemResponseMessage;
			print_r("<h3 style='text-align: center;'>Email</h3>" . $responseMessage->MessageText . "<br /><br />" . $responseMessage->ResponseCode);
			return array();
		}
		else
			$totalItems = $response->ResponseMessages->FindItemResponseMessage->RootFolder->TotalItemsInView;
	
		$emails = array();
		$rootFolder = $response->ResponseMessages->FindItemResponseMessage->RootFolder;
		
		$messages = array();
		$messages_data = $rootFolder->Items->Message;
		if(is_array($messages_data)){
			$messages = $messages_data;
		}else{
			$messages[] = $messages_data;
		}
		$lastItemInRange = $rootFolder->IncludesLastItemInRange;
		
		$i = 1;
		while($lastItemInRange != 1)
		{
			$limit = $request->IndexedPageItemView->MaxEntriesReturned;
			$offset = $limit * $i;
			$request->IndexedPageItemView->Offset = $offset;
			
			$response = $ews->FindItem($request);
			$rootFolder = $response->ResponseMessages->FindItemResponseMessage->RootFolder;
			
			$new_messages = $rootFolder->Items->Message;
			if(is_array($new_messages)){
				$messages = array_merge($messages, $new_messages);	
			}else{
				$messages[] = $new_messages;
			}
			$lastItemInRange = $rootFolder->IncludesLastItemInRange;
			$i++;
		}
		debug($messages);

		// foreach($messages as $message){

		// 	if($message->From->Mailbox->RoutingType == 'SMTP'){
		// 		// debug($message);
		// 		$message_id = $message->ItemId->Id;
		// 		$subject = $message->Subject;
		// 		$from_email = $message->From->Mailbox->EmailAddress;
		// 		$message_body = $this->ews_message_body($message_id);
		// 		// debug($message_body);
		// 	}
		// }

		//Regrive Message Body
		return $messages;
	}
	public function ews_message_body($message_id = null){
		$message_id = 'AAAjAHJvbmNvbGxpbnNAc2Vsa2luZ2ludGVybmF0aW9uYWwuY29tAEYAAAAAADzOvYz36RtEo2d8/pY1EHwHADXR5d7HA8lAuUuadr+aQUMAAAAAN70AAIJ9WEDB8s1Mq2YyxtSD9fAAAX/bjAMAAA==';
		// debug($message_id);

		$server = 'webmail.selkinginternational.com';
        $username = 'greatint\rcollins';
        $password = 'WaltDisneyIs#1';

		$ews = new Client($server, $username, $password);

		// Build the request for the parts.
		$request = new GetItemType();
		$request->ItemShape = new ItemResponseShapeType();
		$request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;
		// You can get the body as HTML, text or "best".
		$request->ItemShape->BodyType = BodyTypeResponseType::HTML;

		// Add the body property.
		$body_property = new PathToUnindexedFieldType();
		$body_property->FieldURI = 'item:Body';
		$request->ItemShape->AdditionalProperties = new NonEmptyArrayOfPathsToElementType();
		$request->ItemShape->AdditionalProperties->FieldURI = array($body_property);

		$request->ItemIds = new NonEmptyArrayOfBaseItemIdsType();
		$request->ItemIds->ItemId = array();

		// Add the message to the request.
		$message_item = new ItemIdType();
		$message_item->Id = $message_id;
		$request->ItemIds->ItemId[] = $message_item;

		$response = $ews->GetItem($request);
		$attachments = null;
		if(isset($response->ResponseMessages->GetItemResponseMessage->Items->Message->Attachments)){
			$attachments = $response->ResponseMessages->GetItemResponseMessage->Items->Message->Attachments;
		}
		debug( $attachments );
		return $response->ResponseMessages->GetItemResponseMessage->Items->Message->Body->_;
	}

	public function connect_contact_list(){

		$server = 'webmail.selkinginternational.com';
        $username = 'greatint\rcollins';
        $password = 'WaltDisneyIs#1';

		$ews = new Client($server, $username, $password);
		$request = new FindItemType();

		$request->ItemShape = new ItemResponseShapeType();
		$request->ItemShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;

		$request->ContactsView = new ContactsViewType();
		$request->ContactsView->InitialName = 'a';
		$request->ContactsView->FinalName = 'z';

		$request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();
		$request->ParentFolderIds->DistinguishedFolderId = new DistinguishedFolderIdType();
		$request->ParentFolderIds->DistinguishedFolderId->Id = DistinguishedFolderIdNameType::CONTACTS;

		$request->Traversal = ItemQueryTraversalType::SHALLOW;

		$response = $ews->FindItem($request);
		echo '<pre>'.print_r($response, true).'</pre>';

	}


	public function test_send(){

		$this->requestAction('user_emails/send_contact_email', array(
			'contact_id' => '3738626',
			'subject'=>'Test Message Ews',
			'mailbody'=>'<p style="font-size: 18px; font-weight: bold;">Test email message from php ews library.</p>' )
		);

	}












  
}

?>