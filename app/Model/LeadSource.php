<?php
class LeadSource extends AppModel {

	public $validate = array(
         'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter source',
                'allowEmpty' => false,
                'required' => true,
            ),
			'dealer_unique' => array(
				'rule' => array('dealer_unique'),
				'message' => 'This source already exists',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
        ),
	);

	public function dealer_unique($check) {

        $existingSource = $this->find('count', array(
            'conditions' => array(
            	'LeadSource.name' => $check,
            	'LeadSource.dealer_id' => array( AuthComponent::user('dealer_id'), '0' )	
            ),
            'recursive' => -1
        ));
        return $existingSource == 0;
    }





}
