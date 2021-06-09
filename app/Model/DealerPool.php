<?php
class DealerPool extends AppModel {
		
	public $useDbConfig  = 'maindb';
	
	public $belongsTo = array(
							'Pool'
						);
	
}