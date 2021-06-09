<?php


function check_duplicate_status($histories, $new_history){
    	$duplicate = false;
    	if(!empty($histories)){
	    	foreach($histories as $key => $his){
	    		if(
	    			($his['History']['sperson'] == $new_history['History']['sperson']  &&
	    			$his['History']['sales_step'] == $new_history['History']['sales_step']  &&
	    			$his['History']['status'] == $new_history['History']['status']  &&
	    			$his['History']['cond'] == $new_history['History']['cond']  &&
	    			$his['History']['comment'] == $new_history['History']['comment']) || 

	    			($his['History']['created'] == $new_history['History']['created'])
	    		){
	    			return $key;
	    		}
	    	}
    	}
    	return $duplicate;
    }

    	//History tab
        $history_types = array(
        	'Lead'=>'user',
        	'Event'=>'alarm',
        	'Lead Arrived'=>'cloud',
            'New CRM Move'=>'list',
        	'BDC REP Web Lead'=>'cogwheel',
        	'BDC Survey'=>'list',
        	'BDC Survey Call Back'=>'list',
        	'Deal'=>'list',
        	'DNC Status '=>'list',
        	'Email'=>'envelope',
        	'Lead Score'=>'list',
        	'Lead_duplicate'=>'list',
        	'Location Transfer'=>'list',
        	'MMS'=>'list',
        	'Note Update'=>'list',
        	'Source Changed'=>'list',
        	'Staff Transfer'=>'list',
        	'Merge'=>'list',
        );
echo $this->element('eventfollowupelement', array('arrResults'=>isset($EventData[$SecId])? $EventData[$SecId]: array(),'Tab'=>'Event','SecId'=>$SecId,'TotalCount'=>$TotalCount)); ?>