<?php
 
class ServiceEvent extends AppModel {
	var $name = 'ServiceEvent';
	var $displayField = 'title';
	var $validate = array(
		
		'contact_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select contact_id'
			),
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter title'
			),
		),
		'details' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter event details'
			),
		),
		'event_type_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select event type'
			),
		),
		'status' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select event status'
			),
		),
		'start' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter start date'
			),
		),
		'end' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter end date'
			),
		)
		
	);


	public $belongsTo = array(
        'ServiceEventType' => array(
            'className' => 'ServiceEventType',
            'foreignKey' => 'event_type_id'
        ),
        
        'ServiceLead' => array(
            'className' => 'ServiceLead',
            'foreignKey' => 'contact_id'
        ),
		'ServiceEventStatus' => array(
            'className' => 'ServiceEventStatus',
            'foreignKey' => 'status'
        ),
    );


	
	
}