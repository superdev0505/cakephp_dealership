<?php

class DevsController extends AppController {


	public $uses = array('Contact');
    public $components = array('RequestHandler');
    
	
    public function beforeFilter() {
        parent::beforeFilter();
			//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'logout'));
		}
    } 

   	public function call_update_request($server = null, $service = null, $debug_mode = null,$importID=null){
           
           $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    )
                );   
            
            
   	$output = "";

      if($server == 'eblast'){
        if($service == 'svnup'){
          $output = file_get_contents("http://eblast.dealershipperformancecrm.com/managesvn/svnup", false, stream_context_create($arrContextOptions));
        }
        if($service == 'debug'){
          //echo "call";
          $output = file_get_contents("http://eblast.dealershipperformancecrm.com/managesvn/setdebug/".$debug_mode, false, stream_context_create($arrContextOptions));
        }
      }

	if($server == 'mobile'){
        	if($service == 'svnup'){
          		$output = file_get_contents("http://mobile.dealershipperformancecrm.com/managesvn/svnup", false, stream_context_create($arrContextOptions));
        	}
       		if($service == 'debug'){
          		//echo "call";
          		$output = file_get_contents("http://mobile.dealershipperformancecrm.com/managesvn/setdebug/".$debug_mode, false, stream_context_create($arrContextOptions));
        	}
      	}

   		if($server == 'devteam'){
   			if($service == 'svnup'){
   				$output = file_get_contents("https://devteam.dealershipperformancecrm.com/managesvn/svnup", false, stream_context_create($arrContextOptions));
   			}
   			if($service == 'debug'){
          //echo "call";
   				$output = file_get_contents("https://devteam.dealershipperformancecrm.com/managesvn/setdebug/".$debug_mode, false, stream_context_create($arrContextOptions));
   			}
   		}
   		if ($server == 'handler') {
            if ($service == 'svnup') {
                $output = file_get_contents("https://handler.dealershipperformancecrm.com/managesvn/svnup", false, stream_context_create($arrContextOptions));
            }
            if ($service == 'debug') {
                $output = file_get_contents("https://handler.dealershipperformancecrm.com/managesvn/setdebug/" . $debug_mode, false, stream_context_create($arrContextOptions));
            }
            
            if ($service == 'createtable') {
              
                $output = file_get_contents("https://handler.dealershipperformancecrm.com/managesvn/create_table/".$debug_mode, false, stream_context_create($arrContextOptions));
               // $output = file_get_contents("https://handler.dealershipperformancecrm.com/Importprocess/import_dump/".$debug_mode);
                //$output = file_get_contents("http://dphandler/managesvn/dataimport");
            }
            
            if ($service == 'dataimport') {
                $output = file_get_contents("https://handler.dealershipperformancecrm.com/managesvn/dataimport/".$debug_mode, false, stream_context_create($arrContextOptions));
               // $output = file_get_contents("https://handler.dealershipperformancecrm.com/Importprocess/import_dump/".$debug_mode);
                //$output = file_get_contents("http://dphandler/managesvn/dataimport");
            }
            if ($service == 'dataclean') {
                $output = file_get_contents("https://handler.dealershipperformancecrm.com/managesvn/dataclean/".$debug_mode, false, stream_context_create($arrContextOptions));
                //$output = file_get_contents("https://handler.dealershipperformancecrm.com/Importprocess/data_clean/".$debug_mode);
                //$output = file_get_contents("http://dphandler/managesvn/dataclean");
            }
        }
   		if($server == 'live'){
   			if($service == 'svnup'){
   				$output = file_get_contents("https://app.dealershipperformancecrm.com/managesvn/svnup", false, stream_context_create($arrContextOptions));
   			}
   			if($service == 'debug'){
   				$output = file_get_contents("https://app.dealershipperformancecrm.com/managesvn/setdebug/".$debug_mode, false, stream_context_create($arrContextOptions));
   			}
   		}
   		echo $output;
   		$this->autoRender = false;
   	}


	public function index(){

		$this->layout = 'admin_default';
	
	}

}
