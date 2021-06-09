<?php
class KnowledgeBase extends AppModel {
	
 	
 	function GetInsertdata($page_id){
		$count = $this->find('count',array('conditions'=>array('page'=>$page_id)));
		if($count==0){
			
				$data = array(
                                            'content'=>'',
                                            'page'=>$page_id
						);
				$this->save($data);
		}
		
		return $this->find('first',array('conditions'=>array('page'=>$page_id)));
	
	}
 	
 	
}