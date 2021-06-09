<?php
class DevteamDaily extends AppModel {
	public $belongsTo = 'Developer';

	public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Title required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Description required'
            )
        ),
		'sevarity' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Please select evarity'
            )
        )
		
		     
    );
    
}