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



echo $this->element('followupelement', array('arrResults'=>isset($PostsaleFollowupData[$SecId])? $PostsaleFollowupData[$SecId]: array(),'Tab'=>'Postsale','SecId'=>$SecId,'TotalCount'=>$TotalCount)); ?>