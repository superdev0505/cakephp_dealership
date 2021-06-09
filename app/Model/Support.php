<?php
class Support extends AppModel {
	public $belongsTo = 'User';

        public $hasOne = array(
                'Project' => array(
                    'className' => 'Project',
                    'foreignKey' => 'support_id'
                )
            );
        
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