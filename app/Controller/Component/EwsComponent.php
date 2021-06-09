<?php
require APP . 'Vendor' . DS . 'vendor' . DS. 'autoload.php';
use \jamesiarmes\PhpEws\Client;
use \jamesiarmes\PhpEws\Request\FindFolderType;
use \jamesiarmes\PhpEws\Enumeration\FolderQueryTraversalType;
use \jamesiarmes\PhpEws\Type\FolderResponseShapeType;
use \jamesiarmes\PhpEws\Enumeration\DefaultShapeNamesType;
use \jamesiarmes\PhpEws\Type\IndexedPageViewType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfBaseFolderIdsType;
use \jamesiarmes\PhpEws\Type\DistinguishedFolderIdType;
use \jamesiarmes\PhpEws\Enumeration\DistinguishedFolderIdNameType;


class EwsComponent extends Component {

	/**
	* Test Ews Connection
	*
	*/
	public function test_connection($config) {
    ini_set("default_socket_timeout", 5); // timout the soap client connections after 5 seconds
		try{

			if( isset($config['version']) && $config['version'] ){
	            $ews = new Client($config['host'], $config['username'], $config['password'], $config['version']);
	        }else{
	            $ews = new Client($config['host'], $config['username'], $config['password']);
	        }


			$request = new FindFolderType();
			$request->Traversal = FolderQueryTraversalType::SHALLOW; // use FolderQueryTraversalType::DEEP for subfolders too
			$request->FolderShape = new FolderResponseShapeType();
			$request->FolderShape->BaseShape = DefaultShapeNamesType::ALL_PROPERTIES;

			// configure the view
			$request->IndexedPageFolderView = new IndexedPageViewType();
			$request->IndexedPageFolderView->BasePoint = 'Beginning';
			$request->IndexedPageFolderView->Offset = 0;

			$request->ParentFolderIds = new NonEmptyArrayOfBaseFolderIdsType();

			// use a distinguished folder name to find folders inside it
			$request->ParentFolderIds->DistinguishedFolderId = new DistinguishedFolderIdType();
			$request->ParentFolderIds->DistinguishedFolderId->Id = DistinguishedFolderIdNameType::INBOX;

			// request
			$response = $ews->FindFolder($request);

			if($response->ResponseMessages->FindFolderResponseMessage->ResponseClass == 'Success'){
				return true;
			}else{
				return false;
			}


		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;

		}







	}

}
