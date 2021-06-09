<?php

class AdminhomeHelper extends AppHelper {

    public function getDbPools()
	{
		$Pool = ClassRegistry::init('Pool');
		$pool_list = $Pool->find('list',array('fields' => 'id,db_name'));
		return $pool_list;		
	}
}
