<?php
class User extends AppModel {
	public $belongsTo = 'Group';
	
	//public $hasMany = 'Contact';
	
	public $virtualFields = array("full_name"=>"CONCAT(User.first_name, ' ' ,User.last_name)");
	
	public $displayField = 'full_name';
	
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required'
            ),
            /*
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username already exists. Please choose another one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			*/
        ),
        'first_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'First name is required'
            )
        ),
        'last_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Last name is required',
				'on' => 'create'
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Email is required'
            ),
            /*
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email is already registered by another user. Please choose another one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			*/
        ),
		'group_id' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Please select user group'
            )
        ),
        'quick_code' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Mobile quick code is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            )
        ),
       'register' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A Dealer ID is required'
            )
        )
    
    );
    
	
	public $actsAs = array(
			//'Acl' => array('type' => 'requester'),
			'Search.Searchable'
	);
	
	public $filterArgs = array(
			'search_username' => array('type'=>'value','field'=>'User.username'),
			'search_name' => array('type'=>'value','field'=>array('User.first_name','User.last_name')),
			'search_group' => array('type'=>'value','value','field'=>'Group.name'),
			'search_zone' => array('type'=>'value','field'=>'User.zone'),
		    'search_email' => array('type'=>'value','field'=>'User.email'),
			'search_all' => array('type'=>'query','method'=>'searchDefault'),
		    'search_dealer' => array('type'=>'value','field'=>'User.dealer'),
		    'search_active' => array('type'=>'value','field'=>'User.active'),
		    'search_dealer_id' => array('type'=>'value','field'=>'User.dealer_id')
	);
	
	public function searchDefault($data = array()) {
		$filter = $data['search_all'];
		$cond = array(
				'OR' => array(
						$this->alias . '.username LIKE' => '%' . $filter . '%',
						$this->alias . '.first_name LIKE' => '%' . $filter . '%',
						$this->alias . '.last_name LIKE' => '%' . $filter . '%',
						'Group.name LIKE' => '%' . $filter . '%',
						$this->alias . '.email LIKE' => '%' . $filter . '%',
						$this->alias . '.dealer LIKE' => '%' . $filter . '%',
						$this->alias . '.dealer_id LIKE' => '%' . $filter . '%',
						$this->alias . '.zone LIKE' => '%' . $filter . '%'
				));
		return $cond;
	}
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}
	

	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
		return true;
	}
	
	public function getServiceGroup()
	{
		return array(14,15,16,17,18,19);
	}
}