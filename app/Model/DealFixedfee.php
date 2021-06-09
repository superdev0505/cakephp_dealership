<?php
class DealFixedfee extends AppModel{
  
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    );
  

    public $validate = array(
		 'type' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),        
        ),
		'condition' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),        
		),
		'notes' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),        
		),
		'tag_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'doc_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'freight_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prep_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ppm_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hazard_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'esp_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gap_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tire_wheel_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'licreg_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vsc_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roadside_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'theft_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'parts_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tax_fee' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '!!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
		
    );
}