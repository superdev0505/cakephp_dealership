<?php

class DncprocessHelper extends AppHelper {

    public function show_phone($dnc_manual_uplaod_process, $dnc_status, $phone, $modified, $sales_step) {
	
		//debug($phone);

    	if( trim($phone) != '' && $dnc_manual_uplaod_process == 'On' && ($dnc_status ==  'not_call' || $dnc_status ==  'no_call_email')  ){
			if($sales_step == '10'){	
				$modified_time = strtotime($modified);			
				$current_time = strtotime("-540 day");
				//debug( date("Y-m-d H:i:s",$current_time) );
				if($modified_time < $current_time){
					return "<span class='text-warning'>Hidden</span>";
				}else{
					return $phone;		
				}
			}else{
				$modified_time = strtotime($modified);			
				$current_time = strtotime("-120 day");
				//debug( date("Y-m-d H:i:s",$current_time) );
				if($modified_time < $current_time){
					return "<span class='text-warning'>Hidden</span>";
				}else{
					return $phone;		
				}
			}
		}else{
			return $phone;
		}	
		return $phone;
    }
}
