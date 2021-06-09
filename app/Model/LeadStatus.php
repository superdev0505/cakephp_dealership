<?php
class LeadStatus extends AppModel {
	
	public $validate = array(
         'header' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please select header',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
		'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter source',
                'allowEmpty' => false,
                'required' => true,
            ),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'The status is already exists',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
	);

}