<?php

class AdditionalContactsController extends AppController {

	//public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
	public $components = array('RequestHandler');
	
	public function beforeFilter() {

		parent::beforeFilter();
	}

    public function upload_contacts($contact_id = null) {
    	$this->layout='ajax'; 

    	$this->set("contact_id", $contact_id);

    	if ($this->request->is('post')) {

    		//debug($this->request->data);
    		//debug($_FILES);

    		if( !empty($_FILES) ){

    			// debug($this->request->data);
	    		// debug($_FILES);
	    		// if($_FILES)

    			$error = "";

	    		$row = 1;
	    		if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

				    	if(count($data) == 13){

					        if($this->request->data['first_row_header'] == 'true' && $row == 1){
					        	//echo "skip";
					        }else{
					        	//debug($data);
					        	$this->AdditionalContact->create();
		    					$this->AdditionalContact->save(array("AdditionalContact"=> array(
		    						"contact_id" => $contact_id,
		    						"first_name" => $data[0],
		    						"last_name" => $data[1],
		    						"address" => $data[2],
		    						"city" => $data[3],
		    						"state" => $data[4],
		    						"zip" => $data[5],
		    						"mobile" => $data[6],
		    						"phone" => $data[7],
		    						"work_number" => $data[8],
		    						"email" => $data[9],
		    						"role" => $data[10],
		    						"vehicle" => $data[11],
		    						"dob" => $data[12]
		    					) ));	
					        }
					        $row++;
					    }else{
					    	$error = "Invalid CSV file";
					    	break;

					    }

				    }
				    fclose($handle);


				}else{
					$error = "Invalid CSV file";
				}

				$this->autoRender = false;
				if($error != ''){
					echo $error;
				}else{
					$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);
					echo "success";	
				}


    		}
    		

			
    	}

    	
    	
    }

}

