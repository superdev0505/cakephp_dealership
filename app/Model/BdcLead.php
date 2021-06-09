<?php
class BdcLead extends AppModel
{
	
	public $useTable = "contacts";
	
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
   // public $hasMany = 'Deal';
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

        'search_id' => array('type' => 'like', 'field' => 'BdcLead.id'),
        'search_first_name' => array('type' => 'like', 'field' => 'BdcLead.first_name'),
        'search_last_name' => array('type' => 'like', 'field' => 'BdcLead.last_name'),
        'search_phone' => array('type' => 'like', 'field' => 'BdcLead.phone'),
        'search_mobile' => array('type' => 'like', 'field' => 'BdcLead.mobile'),
        'search_email' => array('type' => 'like', 'field' => 'BdcLead.email'),
        'search_condition' => array('type' => 'like', 'field' => 'BdcLead.condition'),
        'search_year' => array('type' => 'like', 'field' => 'BdcLead.year'),
        'search_make' => array('type' => 'like', 'field' => 'BdcLead.make'),
        'search_model' => array('type' => 'like', 'field' => 'BdcLead.model'),
        'search_type' => array('type' => 'like', 'field' => 'BdcLead.type'),
        'search_condition_trade' => array('type' => 'like', 'field' => 'BdcLead.condition_trade'),
        'search_year_trade' => array('type' => 'like', 'field' => 'BdcLead.year_trade'),
        'search_make_trade' => array('type' => 'like', 'field' => 'BdcLead.make_trade'),
        'search_model_trade' => array('type' => 'like', 'field' => 'BdcLead.model_trade'),
        'search_type_trade' => array('type' => 'like', 'field' => 'BdcLead.type_trade'),
        'search_status' => array('type' => 'value', 'field' => 'BdcLead.status'),
        'search_gender' => array('type' => 'like', 'field' => 'BdcLead.gender'),
        'search_best_time' => array('type' => 'like', 'field' => 'BdcLead.best_time'),
        'search_buying_time' => array('type' => 'like', 'field' => 'BdcLead.buying_time'),
        'search_source' => array('type' => 'like', 'field' => 'BdcLead.source'),
        'search_contact_status_id' => array('type' => 'like', 'field' => 'BdcLead.contact_status_id'),
        'search_created' => array('type' => 'like', 'field' => 'BdcLead.created'),
        'search_modified' => array('type' => 'like', 'field' => 'BdcLead.modified'),
        'search_unit_color' => array('type' => 'like', 'field' => 'BdcLead.unit_color'),
        'search_usedunit_color' => array('type' => 'like', 'field' => 'BdcLead.usedunit_color'),
        'search_lead_status' => array('type' => 'like', 'field' => 'BdcLead.lead_status'),
        'search_stock_num' => array('type' => 'like', 'field' => 'BdcLead.stock_num'),
        'search_stock_num_trade' => array('type' => 'like', 'field' => 'BdcLead.stock_num_trade'),
        'search_sales_step' => array('type' => 'like', 'field' => 'BdcLead.sales_step'),
        'search_all2' => array('type' => 'query', 'method' => 'searchDefault2'),
        'search_all' => array('type' => 'query', 'method' => 'searchDefault'),
		'search_current_month' => array('type' => 'query', 'method' => 'searchCurent_month'),

    );
    public $virtualFields = array(
        "full_name" => "CONCAT(BdcLead.first_name, ' ' ,BdcLead.last_name)"
    );
    public $displayField = 'full_name';
    public $validate = array(

        'status' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'first_name' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 40),
                'message' => 'Maximum length 40 Character',
				'on' =>'create'
            )
        ),
        'gender' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 40),
                'message' => 'Maximum length 40 Character',
				'on' =>'create'
            )
        ),
        'notes' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 2500),
                'message' => 'Maximum length 2500 Character',
				'on' =>'create'
            )
        ),
        'condition' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'year' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'make' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'model' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'type' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '!!',
                'allowEmpty' => false,
                'required' => true,
				'on' =>'create'
            )
        ),
        'mobile' => array(
            'rule' => array('numeric'),
            'required' => true,
            'rule' => array('maxLength', 40),
            'message' => 'Please check phone number',
			'on' =>'create'
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

    public function searchDefault2($data = array(),$model='')
    {
        $filter = $data['search_all2'];
		if($model == '')
		{
			$model=$this->alias;
		}
        $cond = array(
            'OR' => array(

               $model . '.id like' => '%' . $filter . '%',
               $model . '.first_name like' => '%' . $filter . '%',
                $model . '.last_name like' => '%' . $filter . '%',
                $model . '.phone like' => '%' . $filter . '%',
                $model . '.mobile like' => '%' . $filter . '%',
                $model . '.email like' => '%' . $filter . '%',
				 $model . '.work_number like' => '%' . $filter . '%',
                
               // $this->alias . '.created like' => '%' . $filter . '%',
                //$this->alias . '.modified like' => '%' . $filter . '%',
              

            ));
        return $cond;
    }
	
	public function getFieldsArray()
	{
		$fields = array(
					'BdcLead.id',
					'BdcLead.company_id',
					'BdcLead.full_name',
					'BdcLead.contact_status_id',
					'BdcLead.first_name',
					'BdcLead.last_name',
					'BdcLead.type',
					'BdcLead.condition',
					'BdcLead.company',
					'BdcLead.user_id',
					'BdcLead.year',
					'BdcLead.make',
					'BdcLead.model',
					'BdcLead.mobile',
					'BdcLead.phone',
					'BdcLead.email',
					'BdcLead.lead_status',
					'BdcLead.status',
					'BdcLead.sperson',
					'BdcLead.notes',
					'BdcLead.dnc_status',
					'BdcLead.sales_step',
					'BdcLead.work_number',
					'BdcLead.created'				
			
		);
		return $fields;
	}
}