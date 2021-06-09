<?php
class Contact extends AppModel
{

    public $belongsTo = array(
        'ContactStatus' => array(
            'className' => 'ContactStatus',
            'foreignKey' => 'contact_status_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    );
    public $hasMany = 'Deal';
    public $actsAs = array(
        'Search.Searchable',
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailSizes' => array(
                    'view' => '100x120',
                    'thumb' => '20x30'
                ),
                'thumbnailMethod' => 'php', //GD library instead of imagick
                'thumbnailQuality' => '8'
            )
        )
    );
    public $filterArgs = array(

        'search_id' => array('type' => 'like', 'field' => 'Contact.id'),
        'search_first_name' => array('type' => 'like', 'field' => 'Contact.first_name'),
        'search_last_name' => array('type' => 'like', 'field' => 'Contact.last_name'),
        'search_phone' => array('type' => 'like', 'field' => 'Contact.phone'),
        'search_mobile' => array('type' => 'like', 'field' => 'Contact.mobile'),
        'search_email' => array('type' => 'like', 'field' => 'Contact.email'),
        'search_condition' => array('type' => 'like', 'field' => 'Contact.condition'),
        'search_year' => array('type' => 'like', 'field' => 'Contact.year'),
        'search_make' => array('type' => 'like', 'field' => 'Contact.make'),
        'search_model' => array('type' => 'like', 'field' => 'Contact.model'),
        'search_type' => array('type' => 'like', 'field' => 'Contact.type'),
        'search_condition_trade' => array('type' => 'like', 'field' => 'Contact.condition_trade'),
        'search_year_trade' => array('type' => 'like', 'field' => 'Contact.year_trade'),
        'search_make_trade' => array('type' => 'like', 'field' => 'Contact.make_trade'),
        'search_model_trade' => array('type' => 'like', 'field' => 'Contact.model_trade'),
        'search_type_trade' => array('type' => 'like', 'field' => 'Contact.type_trade'),
        'search_status' => array('type' => 'like', 'field' => 'Contact.status'),
        'search_gender' => array('type' => 'like', 'field' => 'Contact.gender'),
        'search_best_time' => array('type' => 'like', 'field' => 'Contact.best_time'),
        'search_buying_time' => array('type' => 'like', 'field' => 'Contact.buying_time'),
        'search_source' => array('type' => 'like', 'field' => 'Contact.source'),
        'search_contact_status_id' => array('type' => 'like', 'field' => 'Contact.contact_status_id'),
        'search_created' => array('type' => 'like', 'field' => 'Contact.created'),
        'search_modified' => array('type' => 'like', 'field' => 'Contact.modified'),
        'search_unit_color' => array('type' => 'like', 'field' => 'Contact.unit_color'),
        'search_usedunit_color' => array('type' => 'like', 'field' => 'Contact.usedunit_color'),
        'search_lead_status' => array('type' => 'like', 'field' => 'Contact.lead_status'),
        'search_stock_num' => array('type' => 'like', 'field' => 'Contact.stock_num'),
        'search_stock_num_trade' => array('type' => 'like', 'field' => 'Contact.stock_num_trade'),
        'search_sales_step' => array('type' => 'like', 'field' => 'Contact.sales_step'),
        'search_all2' => array('type' => 'query', 'method' => 'searchDefault2'),
        'search_all' => array('type' => 'query', 'method' => 'searchDefault'),
		'search_current_month' => array('type' => 'query', 'method' => 'searchCurent_month'),

    );
    public $virtualFields = array(
        "full_name" => "CONCAT(Contact.first_name, ' ' ,Contact.last_name)"
    );
    public $displayField = 'full_name';
    public $validate = array(

        'status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'first_name' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 40),
                'message' => 'Maximum length 40 Character'
            )
        ),
        'gender' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 40),
                'message' => 'Maximum length 40 Character'
            )
        ),
        'notes' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 2500),
                'message' => 'Maximum length 2500 Character'
            )
        ),
        'condition' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'year' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'make' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'model' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'mobile' => array(
            'rule' => array('numeric'),
            'required' => true,
            'rule' => array('maxLength', 40),
            'message' => 'Please check phone number'
        )
    );

	public function searchCurent_month($data = array()){
		 $cond = array(
                $this->alias . '.created >=' => date('Y-m-01 00:00:00'),
				$this->alias . '.created <=' => date("Y-m-t 23:59:01", strtotime("now")),
            );
        return $cond;
	
	}

    public function searchDefault($data = array())
    {
        $filter = $data['search_all'];
        $cond = array(
            'OR' => array(

                $this->alias . '.id like' => '%' . $filter . '%',
                $this->alias . '.first_name like' => '%' . $filter . '%',
                $this->alias . '.last_name like' => '%' . $filter . '%',
                $this->alias . '.phone like' => '%' . $filter . '%',
                $this->alias . '.mobile like' => '%' . $filter . '%',
                $this->alias . '.email like' => '%' . $filter . '%',
                $this->alias . '.condition like' => '%' . $filter . '%',
                $this->alias . '.year like' => '%' . $filter . '%',
                $this->alias . '.make like' => '%' . $filter . '%',
                $this->alias . '.model like' => '%' . $filter . '%',
                $this->alias . '.type like' => '%' . $filter . '%',
                $this->alias . '.condition_trade like' => '%' . $filter . '%',
                $this->alias . '.year_trade like' => '%' . $filter . '%',
                $this->alias . '.make_trade like' => '%' . $filter . '%',
                $this->alias . '.model_trade like' => '%' . $filter . '%',
                $this->alias . '.type_trade like' => '%' . $filter . '%',
                $this->alias . '.status like' => '%' . $filter . '%',
                $this->alias . '.gender like' => '%' . $filter . '%',
                $this->alias . '.best_time like' => '%' . $filter . '%',
                $this->alias . '.buying_time like' => '%' . $filter . '%',
                $this->alias . '.source like' => '%' . $filter . '%',
                $this->alias . '.contact_status_id like' => '%' . $filter . '%',
                $this->alias . '.created like' => '%' . $filter . '%',
				'ContactStatus.name like' => '%' . $filter . '%',
                $this->alias . '.modified like' => '%' . $filter . '%',
                $this->alias . '.unit_color like' => '%' . $filter . '%',
                $this->alias . '.usedunit_color like' => '%' . $filter . '%',
                $this->alias . '.lead_status like' => '%' . $filter . '%',
                $this->alias . '.sales_step like' => '%' . $filter . '%',
                $this->alias . '.stock_num like' => '%' . $filter . '%',
                $this->alias . '.stock_num_trade like' => '%' . $filter . '%',

            ));
        return $cond;
    }

//public $hasMany = array('Deal'=>array('className'=>'Deal'));

    public function searchDefault2($data = array())
    {
        $filter = $data['search_all2'];
        $cond = array(
            'OR' => array(

                $this->alias . '.id like' => '%' . $filter . '%',
                $this->alias . '.first_name like' => '%' . $filter . '%',
                $this->alias . '.last_name like' => '%' . $filter . '%',
                $this->alias . '.phone like' => '%' . $filter . '%',
                $this->alias . '.mobile like' => '%' . $filter . '%',
                $this->alias . '.email like' => '%' . $filter . '%',
                $this->alias . '.condition like' => '%' . $filter . '%',
                $this->alias . '.year like' => '%' . $filter . '%',
                $this->alias . '.make like' => '%' . $filter . '%',
                $this->alias . '.model like' => '%' . $filter . '%',
                $this->alias . '.type like' => '%' . $filter . '%',
                $this->alias . '.condition_trade like' => '%' . $filter . '%',
                $this->alias . '.year_trade like' => '%' . $filter . '%',
                $this->alias . '.make_trade like' => '%' . $filter . '%',
                $this->alias . '.model_trade like' => '%' . $filter . '%',
                $this->alias . '.type_trade like' => '%' . $filter . '%',
                $this->alias . '.status like' => '%' . $filter . '%',
                $this->alias . '.gender like' => '%' . $filter . '%',
                $this->alias . '.best_time like' => '%' . $filter . '%',
                $this->alias . '.buying_time like' => '%' . $filter . '%',
                $this->alias . '.source like' => '%' . $filter . '%',
                $this->alias . '.contact_status_id like' => '%' . $filter . '%',
                $this->alias . '.created like' => '%' . $filter . '%',
                $this->alias . '.modified like' => '%' . $filter . '%',
                $this->alias . '.unit_color like' => '%' . $filter . '%',
                $this->alias . '.usedunit_color like' => '%' . $filter . '%',
                $this->alias . '.lead_status like' => '%' . $filter . '%',
                $this->alias . '.sales_step like' => '%' . $filter . '%',
                $this->alias . '.stock_num like' => '%' . $filter . '%',
                $this->alias . '.stock_num_trade like' => '%' . $filter . '%',

            ));
        return $cond;
    }
}