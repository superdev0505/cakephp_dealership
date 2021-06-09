<?php
class Make extends AppModel {
	
	public $validate = array(
         'pretty_mame' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter pretty name',
                'allowEmpty' => false,
                'required' => true,
            ),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'The make already exists',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
		
	);

}