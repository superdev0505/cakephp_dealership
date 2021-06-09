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

        'search_id' => array('type' => 'value', 'field' => 'Contact.id'),
        'search_first_name' => array('type' => 'like', 'field' => 'Contact.first_name'),
        'search_last_name' => array('type' => 'like', 'field' => 'Contact.last_name'),
        'search_phone' => array('type' => 'like', 'field' => 'Contact.phone'),
        'search_mobile' => array('type' => 'like', 'field' => 'Contact.mobile'),
        'search_email' => array('type' => 'like', 'field' => 'Contact.email'),
        'search_condition' => array('type' => 'like', 'field' => 'Contact.condition'),
        'search_year' => array('type' => 'value', 'field' => 'Contact.year'),
        'search_make' => array('type' => 'like', 'field' => 'Contact.make'),
        'search_model' => array('type' => 'like', 'field' => 'Contact.model'),
        'search_category' => array('type' => 'value', 'field' => 'Contact.category'),
        'search_class' => array('type' => 'value', 'field' => 'Contact.class'),


        'search_type' => array('type' => 'value', 'field' => 'Contact.type'),
        'search_condition_trade' => array('type' => 'like', 'field' => 'Contact.condition_trade'),
        'search_year_trade' => array('type' => 'like', 'field' => 'Contact.year_trade'),
        'search_make_trade' => array('type' => 'like', 'field' => 'Contact.make_trade'),
        'search_model_trade' => array('type' => 'like', 'field' => 'Contact.model_trade'),
        'search_type_trade' => array('type' => 'like', 'field' => 'Contact.type_trade'),
        'search_status' => array('type' => 'value', 'field' => 'Contact.status'),
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
        'search_sales_step' => array('type' => 'value', 'field' => 'Contact.sales_step'),
        'search_user_id' => array('type' => 'value', 'field' => 'Contact.user_id'),
        'search_all2' => array('type' => 'query', 'method' => 'searchDefault2'),
        'search_all' => array('type' => 'query', 'method' => 'searchDefault'),
        'search_current_month' => array('type' => 'query', 'method' => 'searchCurent_month'),

        'search_price_range' => array('type' => 'value', 'field' => 'price_range'),
        'search_floor_plans' => array('type' => 'value', 'field' => 'floor_plans'),
        'search_length' => array('type' => 'value', 'field' => 'length'),
        'search_weight' => array('type' => 'value', 'field' => 'weight'),
        'search_sleeps' => array('type' => 'value', 'field' => 'sleeps'),
        'search_fuel_type' => array('type' => 'value', 'field' => 'fuel_type'),
        'search_range_adv' => array('type' => 'query', 'method' => 'search_range_adv'),
        'search_spouse_first_name' => array('type' => 'like', 'field' => 'Contact.spouse_first_name'),
        'search_spouse_last_name' => array('type' => 'like', 'field' => 'Contact.spouse_last_name'),
        'search_company_work' => array('type' => 'like', 'field' => 'Contact.company_work'),

        'vehicle_selection_type_search' => array('type' => 'value', 'field' => 'Contact.vehicle_selection_type'),



    );
    public $virtualFields = array(
        "full_name" => "CONCAT(Contact.first_name, ' ' ,Contact.last_name)"
    );
    public $displayField = 'full_name';
    public $validate = array(

        'status' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
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
        'notes' => array(
            'length' => array(
                'required' => true,
                'rule' => array('maxLength', 2500),
                'message' => 'Maximum length 2500 Character'
            )
        ),
        // 'condition' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         'message' => '!!',
        //         'allowEmpty' => false,
        //         'required' => true,
        //     )
        // ),
        // 'year' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         'message' => '!!',
        //         'allowEmpty' => false,
        //         'required' => true,
        //     )
        // ),
        // 'make' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         'message' => '!!',
        //         'allowEmpty' => false,
        //         'required' => true,
        //     )
        // ),
        // 'model' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         'message' => '!!',
        //         'allowEmpty' => false,
        //         'required' => true,
        //     )
        // ),
        // 'type' => array(
        //     'notBlank' => array(
        //         'rule' => array('notBlank'),
        //         'message' => '!!',
        //         'allowEmpty' => false,
        //         'required' => true,
        //     )
        // ),
        'mobile' => array(
            'rule' => array('numeric'),
            'required' => true,
            'rule' => array('maxLength', 40),
            'message' => 'Please check phone number'
        )
    );

    public function searchCurent_month($data = array()){
         $cond = array(
                $this->alias . '.modified >=' => date('Y-m-01 00:00:00'),
                $this->alias . '.modified <=' => date("Y-m-t 23:59:01", strtotime("now")),
            );
        return $cond;

    }

    public function search_range_adv($data = array()){
        if($data['search_range_adv'] == 'two_years'){
            $cond = array(
                $this->alias . '.modified >=' => date("Y-m-d", strtotime('-2 year'))
            );
        }else{
            array();
        }
        return $cond;

    }

    public function convert_in_condition($dealer_id){
        $return_val = "";
        $arval = array();
        if(is_array($dealer_id)){
            foreach ($dealer_id as $value) {
                $arval[] = "'{$value}'";
                $return_val =  implode(",", $arval);
            }


        }else{
            $return_val =  "'{$dealer_id}'";
        }
        return $return_val;
    }



    public function searchDefault($data = array())
    {
        $filter = $data['search_all'];
        $cond = array(
            'OR' => array(

                $this->alias . '.id' => $filter,
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

                $this->alias . '.id' => $filter,
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

    public $ReportUserGroups = array(1,2,3,4,5,6,10,11);
    public $ReportUserGroupQuery = "`User`.`group_id` in (1,2,3,4,5,6,10,11) AND ";


    public function today_lead_count($zone, $dealer_id, $stat_type = 0){

        //debug( $dealer_id );

        date_default_timezone_set($zone);
        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step <>' => '1',
                'Contact.company_id' => $dealer_id,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.sales_step <>' => '1',
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                // 'Contact.user_id' => $dealer_id,
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }

    private function user_in_equal(&$lead_condition, $user_ids, $table_name = 'Contact'){
        if(is_array($user_ids)){
            if(count($user_ids) == 1){
                $lead_condition[$table_name.'.user_id'] = $user_ids[0];
            }else{
                $lead_condition[$table_name.'.user_id'] = $user_ids;
            }
        }else{
            $user_ids_ar  = explode(",",$user_ids);
            if(count($user_ids_ar) == 1){
                $lead_condition[$table_name.'.user_id'] = $user_ids_ar[0];
            }else{
                $lead_condition[$table_name.'.user_id'] = $user_ids_ar;
            }
        }
    }

    public function open_lead_count($zone, $dealer_id, $stats_month, $stats_year, $stat_type = 0){
        date_default_timezone_set($zone);
        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));
        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.lead_status' => 'Open',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.company_id' => $dealer_id,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
                // 'User.active' => 1,
            );
        }else{
            $lead_condition =  array(
                // 'User.group_id' => $this->ReportUserGroups,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.lead_status' => 'Open',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                // 'Contact.user_id' => $dealer_id,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }

    public function _get_closed_statuses(){
        //$inbounds = $this->query("SELECT * FROM lead_statuses WHERE header='Dead Lead (Closed)' OR  header='Sold Deal (Closed)' ");
        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ( 'Dead Lead (Closed)', 'Sold FollowUp In (Closed)','Sold FollowUp Out (Closed)','Sold Pick-Up (Closed)' )    ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        return $statuses;
    }

    public function closed_lead_count($zone, $dealer_id, $stats_month, $stats_year,  $stat_type = 0){

        date_default_timezone_set($zone);
        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

        $inbounds = $this->query("SELECT name FROM lead_statuses WHERE header = 'Dead Lead (Closed)'");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        //debug($statuses);
        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.company_id' => $dealer_id,
                 'Contact.status' => $statuses,
                //'Contact.sales_step <>' => "10",
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }else{
            $lead_condition = array(
                // 'User.active' => 1,
                // 'User.group_id' => $this->ReportUserGroups,
                'Contact.status' => $statuses,
                //'Contact.sales_step <>' => "10",
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }

    public function pending_lead_count($zone, $dealer_id, $stats_month, $stats_year, $stat_type = 0){

        date_default_timezone_set($zone);
        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

        //debug($statuses);
        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.company_id' => $dealer_id,
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.sales_step' => "1",
                'Contact.lead_status' => "Open",
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
        }else{
            $lead_condition = array(
                // 'User.active' => 1,
                // 'User.group_id' => $this->ReportUserGroups,
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.sales_step' => "1",
                'Contact.lead_status' => "Open",
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }



    public function sold_lead_count($zone, $dealer_id, $stats_month, $stats_year, $stat_type = 0){
        date_default_timezone_set($zone);

        $this_month = date('Y-m', strtotime($stats_year."-".$stats_month."-01"));
        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

        //debug($first_day_this_month);
        //debug($last_day_this_month);

        //$inbounds = $this->query("SELECT * FROM lead_statuses WHERE header = 'Sold Deal (Closed)'   ");
        //$statuses = array();
        //foreach($inbounds as $inbound){
        //  $statuses[] = $inbound['lead_statuses']['name'];
        //}

        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                //'LeadSold.status' => $statuses,
                'LeadSold.company_id' => $dealer_id,
                'LeadSold.user_id' => $this->_get_user_list_dealer($dealer_id),

                'LeadSold.modified >=' => $first_day_this_month,
                'LeadSold.modified <=' => $last_day_this_month,
            );
        }else{
            $lead_condition =  array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                //'LeadSold.status' => $statuses,
                'LeadSold.user_id' => $dealer_id,
                'LeadSold.company_id' => AuthComponent::user('dealer_id'),
                'LeadSold.modified >=' => $first_day_this_month,
                'LeadSold.modified <=' => $last_day_this_month,
            );
            $this->user_in_equal($lead_condition, $dealer_id, 'LeadSold');
            return $lead_condition;
        }
    }

    public function today_event_count($zone, $user_id, $stat_type = 0){
        date_default_timezone_set($zone);

        if($stat_type == 'Dealer'){
            return array(
                // 'User.active' => 1,
                'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $this->_get_user_list_dealer($user_id),
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>'=>array('Completed','Canceled'),
            );
        }else{
            $lead_condition = array(
                // 'User.active' => 1,
                // 'User.group_id' => $this->ReportUserGroups,
                // 'Contact.user_id' => $user_id,
                'Event.start >=' =>  date('Y-m-d 00:00:00'),
                'Event.start <=' => date('Y-m-d 23:59:59'),
                'Event.status <>'=>array('Completed','Canceled'),
            );
            $this->user_in_equal($lead_condition, $user_id);
            return $lead_condition;
        }
    }

    public function overdue_event_count($zone, $user_id, $stat_type = 0, $dealer_id = null){
        //debug(AuthComponent::user('dealer_id'));
        date_default_timezone_set($zone);
        if($stat_type == 'Dealer'){
            return array(
                'Contact.user_id' => $this->_get_user_list_dealer($user_id),
                'Contact.company_id' => $user_id,
                'Event.start <=' =>  date('Y-m-d H:i:s'),
                'Event.status <>' => array('Completed','Canceled')
            );
        }else{
            $lead_condition = array(
                // 'Contact.user_id' => $user_id,
                'Contact.company_id' => $dealer_id,
                'Event.start <=' =>  date('Y-m-d H:i:s'),
                'Event.status <>' => array('Completed','Canceled')
            );
            $this->user_in_equal($lead_condition, $user_id);
            return $lead_condition;
        }
    }




    /* Lead type stats conditions */

    public function day_to_condition($date){

    }


    public function closed_today($contact_status_id, $zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);
        $day_month_opt = $this->_stat_day_month($zone);
       // debug($day_month_opt);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header = 'Dead Lead (Closed)'   ");
        $statuses = array();
        foreach($inbounds as $inbound){
            if($inbound['lead_statuses']['name'] == 'Duplicate-Closed'){
                continue;
            }
            $statuses[] = $inbound['lead_statuses']['name'];
        }
        //debug($statuses);

        // debug( $day_month_opt[1]." 00:00:00" );
        // debug( $day_month_opt[1]." 23:59:59" );

        if($stat_type == 'Dealer'){

            return array(
                'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $day_month_opt[1]." 00:00:00",
                'Contact.modified <=' => $day_month_opt[1]." 23:59:59",
                'Contact.status' => $statuses,
                'Contact.company_id' => $dealer_id,
                'Contact.contact_status_id' => $contact_status_id
            );

        }else{
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.modified >=' => $day_month_opt[1]." 00:00:00",
                'Contact.modified <=' => $day_month_opt[1]." 23:59:59",
                'Contact.status' => $statuses,
                'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => $contact_status_id
            );

        }

    }

    private function _stat_day_month($zone){
        date_default_timezone_set($zone);
        $stat_session = CakeSession::read('stat_user');
        //debug($stat_session);
        if($stat_session != null){
            if($stat_session == 'Dealer_month' ){
                $stats_day_month = 'month';
            }else if($stat_session == 'Dealer_day' ){
                $stats_day_month = 'day';
            }else{
                $stats_day_month = 'day';
            }
        }else{
            $stats_day_month = 'day';
        }

        $day_month_data = array();
        if($stats_day_month == 'day'){
            $day_month_data = array('%Y-%m-%d', date('Y-m-d'));
        }else if($stats_day_month == 'month'){
            $day_month_data = array('%Y-%m', date('Y-m'));
        }
        return $day_month_data;
    }

    public function sold_today($contact_status_id, $zone, $dealer_id, $stat_type){

        $day_month_opt = $this->_stat_day_month($zone);
        //debug($day_month_opt);

        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                'LeadSold.user_id' => $this->_get_user_list_dealer($dealer_id),
                'LeadSold.modified >=' => $day_month_opt[1]." 00:00:00",
                'LeadSold.modified <=' => $day_month_opt[1]." 23:59:59",
                'LeadSold.company_id' => $dealer_id,
                'LeadSold.contact_status_id' => $contact_status_id
            );

        }else{
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'LeadSold.modified >=' => $day_month_opt[1]." 00:00:00",
                'LeadSold.modified <=' => $day_month_opt[1]." 23:59:59",
                'LeadSold.user_id' => $dealer_id,
                'LeadSold.company_id' => AuthComponent::user('dealer_id'),
                'LeadSold.contact_status_id' => $contact_status_id
            );


        }


    }

    public function just_arrived_condition_mobile($zone, $dealer_id, $stat_type = 0, $stats_month, $stats_year){
        date_default_timezone_set($zone);

        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));


        if($stat_type == 'Dealer'){

            return array(
            //  'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step' => '1',
                'Contact.created = Contact.modified',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => $dealer_id,
                'Contact.contact_status_id' => 12,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,
            );

        }else{

            return array(
                'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step' => '1',
                'Contact.created = Contact.modified',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.user_id' => $dealer_id,
                'Contact.contact_status_id' => 12,

                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $last_day_this_month,

            );


        }



    }


    public function just_arrived_condition_top_alert($zone, $user_id){
        date_default_timezone_set($zone);
            return array(
                //'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step' => '1',
                'Contact.xml_weblead' => '1',
                #'date_format(Contact.created,\'%Y-%m-%d\')' => date('Y-m-d'),
                'Contact.created = Contact.modified',
                array('OR' =>array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null)),
                array('OR' => array('Contact.user_id'=>$user_id, 'Contact.user_id is null')),
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => 5,
            );

    }



    public function just_arrived_condition($contact_status_id, $zone, $dealer_id, $stat_type = 0){
        date_default_timezone_set($zone);
        $search_limit = date('Y-m-d',strtotime('-25 days',time()));
		$search_limit = $search_limit.' 00:00:00';
        if($stat_type == 'Dealer'){

            return array(
            //  'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step' => '1',
                //'Contact.sperson' => null,
                'Contact.xml_weblead' => 1,
                #'date_format(Contact.created,\'%Y-%m-%d\')' => date('Y-m-d'),
                'Contact.created = Contact.modified',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => $dealer_id,
                'Contact.contact_status_id' => $contact_status_id,
				'Contact.created >=' => $search_limit
            );

        }else{

            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                'Contact.sales_step' => '1',
                'Contact.xml_weblead' => 1,
                #'date_format(Contact.created,\'%Y-%m-%d\')' => date('Y-m-d'),
                'Contact.created = Contact.modified',
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                // 'Contact.user_id' => $dealer_id,
                'Contact.contact_status_id' => $contact_status_id,
				'Contact.created >=' => $search_limit
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }



    }

    public function worked_today_condition($contact_status_id, $zone, $dealer_id, $stat_type = 0){
        date_default_timezone_set($zone);

        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.created <> Contact.modified',

                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),

                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => $contact_status_id
            );

        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.created <> Contact.modified',

                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),
                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => $contact_status_id
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }

    public function still_pending_condition($contact_status_id, $zone, $dealer_id, $stat_type = 0,$stat_month='', $stats_year){
        date_default_timezone_set($zone);
        if($stat_month=='')
        {
            //$stat_month=date('Y-m');

            $first_day_this_month = date('Y-m-01 00:00:00');
            $last_day_this_month  = date('Y-m-t 23:59:59');

        }else{
            //$stat_month = $stats_year."-".$stat_month;
            $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stat_month."-01"));
            $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stat_month."-01"));

        }

        // debug($first_day_this_month);
        // debug($last_day_this_month);

        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.sales_step' => '1',
                'Contact.lead_status' => "Open",
                'Contact.created = Contact.modified',

                'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                'Contact.company_id' => $dealer_id,
                //'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => $contact_status_id
            );

        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.sales_step' => '1',
                'Contact.lead_status' => "Open",
                'Contact.created = Contact.modified',

                'Contact.created >=' => $first_day_this_month,
                'Contact.created <=' => $last_day_this_month,

                'OR' => array('Contact.status <> '=>'Duplicate-Closed', 'Contact.status'=>null),
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.contact_status_id' => $contact_status_id
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            // debug( $lead_condition );
            return $lead_condition;

        }

    }

    public function note_update($contact_status_id, $zone, $dealer_id, $stat_type){

        date_default_timezone_set($zone);

        if($stat_type == 'Dealer'){

            if($contact_status_id == 12 || $contact_status_id == 6){

                $note_update = $this->query('
                SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`contact_status_id`
                FROM  contacts as Contact
                LEFT JOIN users as User ON (`User`.`id` = `Contact`.`user_id`)
                WHERE
                '.$this->ReportUserGroupQuery.'

                `Contact`.`company_id` = :company_id
                AND   `Contact`.`step_modified` >=  :today_start
                AND   `Contact`.`step_modified` <=  :today_end

                AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
                GROUP BY contact_id
                ',array(
                    'company_id'=>$dealer_id,
                    'today_start'=> date('Y-m-d 00:00:00') ,
                    'today_end'=> date('Y-m-d 23:59:59')
                 ));

            }else{

                $note_update = $this->query('
                SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`contact_status_id`
                FROM  contacts as Contact
                LEFT JOIN users as User ON (`User`.`id` = `Contact`.`user_id`)
                WHERE
                '.$this->ReportUserGroupQuery.'

                `Contact`.`company_id` = :company_id
                AND `Contact`.`status` in  ( select name from lead_statuses where header = \'Customer Update Edit ONLY\'  )


                AND   `Contact`.`step_modified` >=  :today_start
                AND   `Contact`.`step_modified` <=  :today_end

                AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
                GROUP BY contact_id
                ',array('company_id'=>$dealer_id,
                    'today_start'=> date('Y-m-d 00:00:00') ,
                    'today_end'=> date('Y-m-d 23:59:59')
                 ));
            }

            //debug( $note_update );
            return $note_update;
        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);

            if($contact_status_id == 12 || $contact_status_id == 6){

                $note_update = $this->query('
                SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`contact_status_id`
                FROM contacts as Contact
                LEFT JOIN users as User ON (`User`.`id` = `Contact`.`user_id`)
                WHERE
                '.$this->ReportUserGroupQuery.'

                `Contact`.`user_id` in ('.$user_ids_vals.')

                AND   `Contact`.`step_modified` >=  :today_start
                AND   `Contact`.`step_modified` <=  :today_end

                AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
                GROUP BY contact_id
                ',array(
                    'today_start'=> date('Y-m-d 00:00:00') ,
                    'today_end'=> date('Y-m-d 23:59:59')
                 ));
                //debug( $note_update );
                return $note_update;

            }else{
                $note_update = $this->query('
                SELECT `Contact`.`id` contact_id, `Contact`.`company_id`, `Contact`.`contact_status_id`
                FROM contacts as Contact
                LEFT JOIN users as User ON (`User`.`id` = `Contact`.`user_id`)
                WHERE
                '.$this->ReportUserGroupQuery.'

                `Contact`.`user_id` in ('.$user_ids_vals.')
                AND `Contact`.`status` in  ( select name from lead_statuses where header = \'Customer Update Edit ONLY\'  )

                AND   `Contact`.`modified` >=  :today_start
                AND   `Contact`.`modified` <=  :today_end

                AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
                GROUP BY contact_id
                ',array(
                    'today_start'=> date('Y-m-d 00:00:00') ,
                    'today_end'=> date('Y-m-d 23:59:59')
                ));
                //debug( $note_update );
                return $note_update;
            }
        }

    }



    public function email_sent($contact_status_id, $zone, $dealer_id, $stat_type){

        date_default_timezone_set($zone);
        $day_month_opt = $this->_stat_day_month($zone);

        //debug($day_month_opt);

        $today_start = $day_month_opt[1]." 00:00:00";
        $today_ends = $day_month_opt[1]." 23:59:59";

        //debug( $today_start );
        //debug( $today_ends );

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $emailsent = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM  contacts as Contact
            LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
            WHERE
            `UserEmailLog`.`user_id` in ('.$user_cond.') AND
             `Contact`.`company_id` = :company_id

             AND `UserEmailLog`.`send_date` >= :today_start
             AND `UserEmailLog`.`send_date` >= :today_ends

            AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
            GROUP BY contact_id',array(
                'company_id'=>$dealer_id,
                'today_start'=> $today_start,
                'today_ends'=> $today_ends,
            ));

            $elog = array();
            foreach($emailsent as $el){
                $elog[] = "'".$el['Contact']['contact_id']."'";
            }
            $elog_con = implode(",", $elog);
            $elog_con_str = '';
            if(!empty($elog)){
                $elog_con_str = 'AND `Contact`.`id` NOT IN  ('. $elog_con .')   ';
            }

            $sent_status = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

            WHERE '.$this->ReportUserGroupQuery.'  `Contact`.`user_id` in ('.$user_cond.')

            '. $elog_con_str .'

            AND `Contact`.`modified` >= :today_start
            AND `Contact`.`modified` >= :today_ends


            AND `Contact`.`company_id` = :company_id
            AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
            AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
            ',array(
                'company_id'=>$dealer_id,
                'today_start'=> $today_start,
                'today_ends'=> $today_ends,
            ));

           // debug( $emailsent );
           // debug( $sent_status );
            $ar = array_merge($emailsent, $sent_status);
            //debug( $ar );



            return $ar;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
           // debug('`UserEmailLog`.`user_id` in ('.$user_ids_vals.') AND ');

            $emailsent = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM  contacts as Contact
            LEFT JOIN user_email_logs as UserEmailLog ON (`Contact`.`id` = `UserEmailLog`.`contact_id`)
            WHERE
            `UserEmailLog`.`user_id` in ('.$user_ids_vals.') AND
             `Contact`.`company_id` = :company_id  AND

             `UserEmailLog`.`send_date`  >= :today_start
             AND `UserEmailLog`.`send_date`  <= :today_ends

            AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
            GROUP BY contact_id',array('company_id'=>AuthComponent::user('dealer_id'),
                'today_start'=> $day_month_opt[1]." 00:00:00",
                'today_ends'=> $day_month_opt[1]." 23:59:59"
            ));

            //debug( $emailsent );


             $elog = array();
            foreach($emailsent as $el){
                $elog[] = "'".$el['Contact']['contact_id']."'";
            }
            $elog_con = implode(",", $elog);
            $elog_con_str = '';
            if(!empty($elog)){
                $elog_con_str = 'AND `Contact`.`id` NOT IN  ('. $elog_con .')   ';
            }

            $sent_status = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

            WHERE '.$this->ReportUserGroupQuery.'

            `Contact`.`modified` >= :today_start
            AND `Contact`.`modified` >= :today_ends

            '. $elog_con_str .'

            AND `Contact`.`user_id` in ( '.$user_ids_vals.' )
            AND `Contact`.`contact_status_id`  = '.$contact_status_id.'
            AND `Contact`.`status` in (  SELECT name FROM lead_statuses WHERE header = \'Email (Open)\'  )
            ',array(
                'today_start'=> $today_start,
                'today_ends'=> $today_ends,
            ));
            $ar = array_merge($emailsent, $sent_status);
            return $ar;
        }



    }

    public function appointment($contact_status_id, $zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);


        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header='Appointment (Open)' ");
        $statuses = array();

        App::uses('Sanitize', 'Utility');

        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){


            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $appointment = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)

            WHERE
            '.$this->ReportUserGroupQuery.'
              `Contact`.`user_id` in ('.$user_cond.') AND  `Contact`.`contact_status_id` = :contact_status_id  AND  `Contact`.`company_id` = :company_id
             AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')

            AND  `Event`.`start` >= :today_start
            AND  `Event`.`start` <= :today_end

            GROUP BY contact_id',array('contact_status_id' => $contact_status_id, 'company_id'=>$dealer_id,

                'today_start'=> date('Y-m-d 00:00:00') ,
                'today_end'=> date('Y-m-d 23:59:59')

            ));
            return $appointment;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);

            $appointment = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)

            WHERE
            '.$this->ReportUserGroupQuery.'

             `Contact`.`contact_status_id` = :contact_status_id  AND  `Contact`.`user_id` in ('.$user_ids_vals.')
             AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')

            AND  `Event`.`start` >= :today_start
            AND  `Event`.`start` <= :today_end

            GROUP BY contact_id',array('contact_status_id' => $contact_status_id,
                'today_start'=> date('Y-m-d 00:00:00') ,
                'today_end'=> date('Y-m-d 23:59:59')

            ));
            return $appointment;

        }



    }


    public function new_inbound($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        //$inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Inbound Call (Open)', 'Web Lead (Open)') ");
        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Inbound Call (Open)') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);


            $new_inbound = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE '.$this->ReportUserGroupQuery.'  `Contact`.`user_id` in ('.$user_cond.')

            AND `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends

            AND  `Contact`.`id` not in
            (
                SELECT id from contacts as ct where
                    `ct`.`created` >= :today_start
                AND `ct`.`created` <= :today_ends

                AND xml_weblead = 1 AND  `ct`.`created` = `ct`.`modified`
                AND `Contact`.`company_id` = :company_id
            )
            AND `Contact`.`company_id` = :company_id
            AND(
                (
                        `Contact`.`modified` = :today_start
                    AND `Contact`.`modified` = :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                    `History`.`created` >= :today_start AND
                    `History`.`created` <= :today_ends AND

                    `History`.`status` in ('.$status_cond.')  ) OR
                (
                        `Contact`.`modified` = :today_start
                    AND `Contact`.`modified` = :today_ends
                    AND `Contact`.`lead_call_types` = \'inbound\'  )
            )
            GROUP BY contact_id',array(
                'company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
             ));
            //debug($new_inbound);

            return  $new_inbound;
            /*
            return array(
                'User.active' => 1,
                'Contact.company_id' => $dealer_id,
                'Contact.user_id' =>$this->_get_user_list_dealer($dealer_id),
                'Contact.status' => $statuses,
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
            */

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);

            $new_inbound = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE '.$this->ReportUserGroupQuery.'

             `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends

            AND `Contact`.`user_id` in ('.$user_ids_vals.')
             AND
            (
                (
                        `Contact`.`modified` <= :today_start
                    AND `Contact`.`modified` <= :today_ends
                AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND `History`.`status` in ('.$status_cond.')  ) OR
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`lead_call_types` = \'inbound\'  )
            )
            GROUP BY contact_id',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
             ));
            return  $new_inbound;
            /*
            return array(
                'User.active' => 1,
                'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.status' => $statuses,
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
            */

        }

    }

    public function new_outbound($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $outbounds = $this->query("SELECT * FROM lead_statuses WHERE header='Outbound Call (Open)' ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($outbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){


            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);


            $new_outbound = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE  `Contact`.`user_id` in ('.$user_cond.')


            AND `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends

            AND `Contact`.`company_id` = :company_id AND
            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')
                ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND `History`.`status` in ('.$status_cond.')  ) OR
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`lead_call_types` = \'outbound\'  )
            )
            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today'=> date('Y-m-d'),
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
                ));
            //debug($new_outbound);
            return  $new_outbound;

            /*
            return array(
                'User.active' => 1,
                'Contact.company_id' => $dealer_id,
                'Contact.user_id' =>$this->_get_user_list_dealer($dealer_id),
                'Contact.status' => $statuses,
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
            */

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);

            $new_outbound = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE
            '.$this->ReportUserGroupQuery.'


            `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends
            AND `Contact`.`user_id` in ('.$user_ids_vals.') AND
            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND `History`.`status` in ('.$status_cond.')  ) OR
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`lead_call_types` = \'outbound\'  )
            )
            GROUP BY contact_id',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),

                ));
            return  $new_outbound;


            /*
            return array(
                'User.active' => 1,
                'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.status' => $statuses,
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),
                'Contact.created >=' => date('Y-m-d 00:00:00'),
                'Contact.created <=' => date('Y-m-d 23:59:59')
            );
            */

        }

    }

    public function sms_text($contact_status_id, $zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);
        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('SMS Text- Out','SMS Text-In') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);
        //debug($status_cond);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $sms_text = $this->query('

            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE '.$this->ReportUserGroupQuery.' `Contact`.`user_id` in ('.$user_cond.')

            AND `Contact`.`contact_status_id` = '.$contact_status_id.'
            AND `Contact`.`company_id` = :company_id AND
            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND `History`.`status` in ('.$status_cond.')  )
            )
            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            //debug($sms_text);
            return $sms_text;

        }else{
            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);
            $sms_text = $this->query('

            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE  '.$this->ReportUserGroupQuery.'
             `Contact`.`contact_status_id` = '.$contact_status_id.'

            AND `Contact`.`user_id` in ('.$user_ids_vals.') AND

            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND `History`.`status` in ('.$status_cond.')  )
            )
            GROUP BY contact_id
        ',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),

            ));
            return $sms_text;

        }




    }

    public function existing_in($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Sold FollowUp In (Closed)','Inbound Call (Open)') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $Existing_Phone_Calls_Out = $this->query('



            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE '.$this->ReportUserGroupQuery.' `Contact`.`user_id` in ('.$user_cond.')


            AND `Contact`.`created` < :today_start

            AND `Contact`.`company_id` = :company_id AND

            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND  `History`.`h_type` = \'Lead\' AND `History`.`status` in ('.$status_cond.')  )
            )

            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $Existing_Phone_Calls_Out;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);

            $Existing_Phone_Calls_Out = $this->query('

            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE  '.$this->ReportUserGroupQuery.'

             `Contact`.`created` < :today_start
            AND `Contact`.`user_id` in ('.$user_ids_vals.') AND

            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND  `History`.`h_type` = \'Lead\' AND `History`.`status` in ('.$status_cond.')  )
            )


            GROUP BY contact_id

        ',array(

            'today_start'=> date('Y-m-d 00:00:00'),
            'today_ends'=> date('Y-m-d 23:00:00'),
        ));
            return $Existing_Phone_Calls_Out;

        }


    }

    public function existing_out($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Sold FollowUp Out (Closed)','Outbound Call (Open)') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        //debug($status_cond);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            //debug($user_cond);

            $Existing_Phone_Calls_In = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id` )
            WHERE '.$this->ReportUserGroupQuery.' `Contact`.`user_id` in ('.$user_cond.')

            AND `Contact`.`created` < :today_start
            AND `Contact`.`company_id` = :company_id AND

            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND  `History`.`h_type` = \'Lead\' AND   `History`.`status` in ('.$status_cond.')  )
            )


            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $Existing_Phone_Calls_In;


        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);


            $Existing_Phone_Calls_In = $this->query('

            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            LEFT JOIN histories as History ON (`Contact`.`id` = `History`.`contact_id`)
            WHERE  '.$this->ReportUserGroupQuery.'
            `Contact`.`created` < :today_start
            AND `Contact`.`user_id` in ('.$user_ids_vals.')  AND
            (
                (
                        `Contact`.`modified` >= :today_start
                    AND `Contact`.`modified` <= :today_ends
                    AND `Contact`.`status` in ('.$status_cond.')  ) OR
                (
                        `History`.`created` >= :today_start
                    AND `History`.`created` <= :today_ends
                    AND  `History`.`h_type` = \'Lead\' AND  `History`.`status` in ('.$status_cond.')  )
            )

            GROUP BY contact_id
            ',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $Existing_Phone_Calls_In;


        }


    }

    public function web_visit($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Showroom (Open)','Sold Deal (Closed)') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $web_visit = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE `Contact`.`user_id` in ('.$user_cond.')

            AND `Contact`.`contact_status_id` =  \'5\'
            AND `Contact`.`sales_step` <>  \'1\'

            AND `Contact`.`modified` >= :today_start
            AND `Contact`.`modified` <= :today_ends

            AND `Contact`.`company_id` = :company_id
            AND `Contact`.`status` <> \'Duplicate-Closed\'

            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            //debug($web_visit);
            return $web_visit;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);

            $web_visit = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE
             '.$this->ReportUserGroupQuery.'
            `Contact`.`contact_status_id` =  \'5\'
            AND `Contact`.`sales_step` <>  \'1\'

            AND `Contact`.`modified` >= :today_start
            AND `Contact`.`modified` <= :today_ends


            AND `Contact`.`user_id` in ('.$user_ids_vals.')
            AND `Contact`.`status` <> \'Duplicate-Closed\'
            GROUP BY contact_id',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            //debug($web_visit);
            return $web_visit;

        }






    }


    public function showroom_new_visit($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Showroom (Open)','Sold Deal (Closed)') ");
        $statuses = array();
        App::uses('Sanitize', 'Utility');
        foreach($inbounds as $inbound){
            $statuses[] = "'".Sanitize::escape($inbound['lead_statuses']['name'])."'";
        }
        $status_cond = implode(",", $statuses);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $showroom_new_visit = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE `Contact`.`user_id` in ('.$user_cond.')

            AND `Contact`.`contact_status_id` =  \'7\'
            AND `Contact`.`sales_step` <>  \'1\'
            AND `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends
            AND `Contact`.`company_id` = :company_id
            AND `Contact`.`status` <> \'Duplicate-Closed\'

            GROUP BY contact_id',array('company_id'=>$dealer_id,
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            //debug($showroom_new_visit);
            return $showroom_new_visit;


            /*
            return array(
                'User.active' => 1,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.company_id' => $dealer_id,
                'Contact.status' => $statuses,
        //      'Contact.contact_status_id' => 7,
                'Contact.sales_step <>' => '1',
                'date_format(Contact.created,\'%Y-%m-%d\')' => date('Y-m-d'),
            );
            */

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);

            $showroom_new_visit = $this->query('
            SELECT `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM contacts as Contact LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE
             '.$this->ReportUserGroupQuery.'

             `Contact`.`contact_status_id` =  \'7\'
            AND `Contact`.`sales_step` <>  \'1\'
            AND `Contact`.`created` >= :today_start
            AND `Contact`.`created` <= :today_ends

            AND `Contact`.`user_id` in ('.$user_ids_vals.')
            AND `Contact`.`status` <> \'Duplicate-Closed\'
            GROUP BY contact_id',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $showroom_new_visit;



            /*
            return array(
                'User.active' => 1,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.user_id' => $dealer_id,
                'Contact.status' => $statuses,
        //      'Contact.contact_status_id' => 7,
                'Contact.sales_step <>' => '1',
                'date_format(Contact.created,\'%Y-%m-%d\')' => date('Y-m-d'),
            );
            */

        }




    }

    public function showroom_existing_visit($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        $inbounds = $this->query("SELECT * FROM lead_statuses WHERE header in ('Sold Pick-Up (Closed)', 'Showroom (Open)','Sold Deal (Closed)') ");
        $statuses = array();
        foreach($inbounds as $inbound){
            $statuses[] = $inbound['lead_statuses']['name'];
        }

        if($stat_type == 'Dealer'){

            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '1',
                'Contact.contact_status_id' => 7,
                'Contact.status' => $statuses,
                'Contact.created <' => date('Y-m-d: 00:00:00'),
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <=' => date('Y-m-d 23:59:59'),

            );

        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                // 'Contact.user_id' => $dealer_id,
                'Contact.sales_step <>' => '1',
                'Contact.contact_status_id' => 7,
                'Contact.status' => $statuses,
                'Contact.created <' => date('Y-m-d: 00:00:00'),
                'Contact.modified >=' => date('Y-m-d 00:00:00'),
                'Contact.modified <= ' => date('Y-m-d 23:59:59'),
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }
    }

    public $GET_USER_LIST_DEALER_AR = array();
    private function _get_user_list_dealer($dealer_id){

        if(!isset($this->GET_USER_LIST_DEALER_AR[$dealer_id])){
            App::import('model','User');
            $user = new User;
            $users = $user->find('list', array('conditions'=>array('User.group_id'=>$this->ReportUserGroups, 'User.active'=>1,'User.dealer_id'=>$dealer_id)));
            $user_ids = array_keys($users);

            if(empty($user_ids)){
                $user_ids = array(AuthComponent::user('id'));
            }
            $this->GET_USER_LIST_DEALER_AR[$dealer_id] = $user_ids;
        }
        //debug( $this->GET_USER_LIST_DEALER_AR[$dealer_id] );
        return $this->GET_USER_LIST_DEALER_AR[$dealer_id];
    }

    public function dormant_lead_count($zone, $dealer_id, $stat_type = 0, $stats_month, $stats_year){
        date_default_timezone_set($zone);
        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));

        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));


        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';

        if($stat_type == 'Dealer'){
            return array(
                //'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' => $c_statuses,
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),

            );
        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' =>  $c_statuses,
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            // debug($lead_condition);
            return $lead_condition;
        }
    }


    public function dormant_48hrs_condition($contact_status_id, $zone, $dealer_id, $stat_type = 0, $stats_month, $stats_year){
        date_default_timezone_set($zone);

        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
        if( date('m') != $stats_month ){
            $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours",  strtotime( date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01")) )    ));
        }

        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';

        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),

                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' =>  $c_statuses,
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '10',
                'Contact.contact_status_id' => $contact_status_id,
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
        }else{

            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.status <>' =>  $c_statuses,
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.sales_step <>' => '10',
                'Contact.contact_status_id' => $contact_status_id,
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }


    }


    public function showroom_dormant_48hrs($zone, $dealer_id, $stat_type = 0, $stats_month, $stats_year){
        date_default_timezone_set($zone);

        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));

        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
        if( date('m') != $stats_month ){
            $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours",  strtotime( date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01")) )    ));
        }

        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';

        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                'Contact.user_id' => $this->_get_user_list_dealer($dealer_id),
                'Contact.company_id' => $dealer_id,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => 'Open',
                'Contact.contact_status_id' => 7,
                'Contact.company_id' => $dealer_id,
                'Contact.sales_step <>' => '10',
                'Contact.status <>' =>  $c_statuses,
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => "Open",
                'Contact.contact_status_id' => 7,
                'Contact.status <>' =>  $c_statuses,
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.sales_step <>' => '10',
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }


    }

    public function phone_dormant_48hrs($zone, $dealer_id, $stat_type = 0,  $stats_month, $stats_year){
        date_default_timezone_set($zone);

        $first_day_this_month = date('Y-m-01 00:00:00', strtotime($stats_year."-".$stats_month."-01"));
        $last_day_this_month  = date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01"));


        $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours"));
        if( date('m') != $stats_month ){
            $datetime_48hours_back = date('Y-m-d H:i:s', strtotime("-48 hours",  strtotime( date('Y-m-t 23:59:59', strtotime($stats_year."-".$stats_month."-01")) )    ));
        }

        $c_statuses = $this->_get_closed_statuses();
        $c_statuses[] = 'Duplicate-Closed';


        if($stat_type == 'Dealer'){
            return array(
                'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                'Contact.company_id' => $dealer_id,
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => 'Open',
                'Contact.contact_status_id' => 6,
                'Contact.status <>' =>   $c_statuses,
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
        }else{
            $lead_condition = array(
                // 'User.group_id' => $this->ReportUserGroups,
                // 'User.active' => 1,
                // 'Contact.user_id' => $dealer_id,
                'Contact.company_id' => AuthComponent::user('dealer_id'),
                'Contact.modified >=' => $first_day_this_month,
                'Contact.modified <=' => $datetime_48hours_back,
                'Contact.lead_status' => 'Open',
                'Contact.contact_status_id' => 6,
                'Contact.status <>' =>   $c_statuses,
                'OR' => array('Event.start <=' => $datetime_48hours_back,'Event.start'=>null),
            );
            $this->user_in_equal($lead_condition, $dealer_id);
            return $lead_condition;
        }

    }


    public function showroom_worksheet($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $showroom_worksheet = $this->query('
            SELECT `Contact`.`id`, `Contact`.`company_id` FROM contacts AS `Contact`
            LEFT JOIN deals as Deal ON (`Contact`.`id` = `Deal`.`contact_id`)
            LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE '.$this->ReportUserGroupQuery.'
            `Contact`.`company_id` = '.$dealer_id.' AND  `Contact`.`user_id` in ('.$user_cond.')
            AND    `Deal`.`date` >= :today_start
            AND    `Deal`.`date` <= :today_ends
            GROUP BY  `Contact`.`id`
            ',array(
                'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $showroom_worksheet;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);

            $showroom_worksheet = $this->query('
            SELECT `Contact`.`id`, `Contact`.`company_id` FROM contacts AS `Contact`
            LEFT JOIN deals as Deal ON (`Contact`.`id` = `Deal`.`contact_id`)
            LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)

            WHERE '.$this->ReportUserGroupQuery.'

              `Contact`.`user_id` in ('.$user_ids_vals.')
            AND `Deal`.`date` >= :today_start
            AND `Deal`.`date` <= :today_ends
            GROUP BY  `Contact`.`id`
            ',array(
                 'today_start'=> date('Y-m-d 00:00:00'),
                'today_ends'=> date('Y-m-d 23:00:00'),
            ));
            return $showroom_worksheet;

        }


    }

    public function overdue_events($dealer_id, $start, $zone, $users=""){
        date_default_timezone_set($zone);

        if($users == 'all'){

            App::import('model','User');
            $userm = new User;
            $users = $userm->find('list', array('conditions'=>array('User.dealer_id'=>$dealer_id)));
            $user_ids = array_keys($users);

            $userin = array();
            foreach($user_ids as $user){
                $userin[] = $user;
            }
            //debug($userin);
            $user_cond = implode(",", $userin);
        }else{

             $user_cond = $users;
        }


        $missed_appt = $this->query('
        SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
        FROM `events` AS `Event`
        LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
        LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)
        WHERE  `Event`.`user_id` in ('.$user_cond.') AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
        AND `Event`.`start` < :current_datetime AND `Contact`.`status` <> \'Duplicate-Closed\'
        AND date_format(`Event`.`start`,\'%Y-%m-%d\') = :start
        GROUP BY contact_id',array('start'=> $start, 'current_datetime' => date('Y-m-d H:i:s')  ));
        return $missed_appt;

    }

    public function events($dealer_id, $start, $zone, $users=""){

        date_default_timezone_set($zone);

        if($users == 'all'){
            App::import('model','User');
            $userm = new User;
            $users = $userm->find('list', array('conditions'=>array('User.dealer_id'=>$dealer_id)));
            $user_ids = array_keys($users);

            $userin = array();
            foreach($user_ids as $user){
                $userin[] = $user;
            }
            //debug($userin);
            $user_cond = implode(",", $userin);
        }else{
            $user_cond = $users;
        }



        $missed_appt = $this->query('
        SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
        FROM `events`  AS `Event`
        LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
        LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)
        WHERE     `Event`.`user_id` in ('.$user_cond.')
         AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
        AND `Event`.`start` >= :current_datetime AND `Contact`.`status` <> \'Duplicate-Closed\'
        AND date_format(`Event`.`start`,\'%Y-%m-%d\') = :start
        GROUP BY contact_id',array('start'=> $start, 'current_datetime' => date('Y-m-d H:i:s')  ));
        return $missed_appt;

    }


    public function showroom_missed_appt($zone, $dealer_id, $stat_type){
        date_default_timezone_set($zone);
        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $missed_appt = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE '.$this->ReportUserGroupQuery.'    `Contact`.`company_id` = '.$dealer_id.' AND  `Contact`.`contact_status_id` = 7 AND `Contact`.`sales_step` <> \'1\' AND  `Event`.`user_id` in ('.$user_cond.')   AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
            AND `Event`.`start` < :current_datetime
            GROUP BY contact_id',array('current_datetime' => date('Y-m-d H:i:s')  ));
            return $missed_appt;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);

            $missed_appt = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Contact`.`user_id` = `User`.`id`)
            WHERE '.$this->ReportUserGroupQuery.'

             `Contact`.`contact_status_id` = 7 AND `Contact`.`sales_step` <> \'1\' AND `Event`.`user_id` in ('.$user_ids_vals.')  AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
            AND `Event`.`start` < :current_datetime
            GROUP BY contact_id',array('current_datetime' => date('Y-m-d H:i:s')  ));
            return $missed_appt;

        }


    }

    public function missed_event($zone, $contact_status_id, $dealer_id, $stat_type){
        date_default_timezone_set($zone);

        if($stat_type == 'Dealer'){

            $users = $this->_get_user_list_dealer($dealer_id);
            $userin = array();
            foreach($users as $user){
                $userin[] = $user;
            }
            $user_cond = implode(",", $userin);

            $missed_appt = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)
            WHERE '.$this->ReportUserGroupQuery.'

             `Contact`.`company_id` = '.$dealer_id.' AND
            `Contact`.`sales_step` = \'1\' AND `Contact`.`contact_status_id` = '.$contact_status_id.' AND `Event`.`user_id` in ('.$user_cond.') AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
            AND `Event`.`start` < :current_datetime
            GROUP BY contact_id',array('current_datetime' => date('Y-m-d H:i:s')  ));

            return $missed_appt;

        }else{

            $user_ids_vals = $this->convert_in_condition($dealer_id);
            //debug($user_ids_vals);

            $missed_appt = $this->query('
            SELECT `Event`.`id`, `Contact`.`id` contact_id, `Contact`.`company_id`
            FROM events AS `Event`
            LEFT JOIN contacts as Contact ON (`Contact`.`id` = `Event`.`contact_id`)
            LEFT JOIN users as User ON (`Event`.`user_id` = `User`.`id`)
            WHERE '.$this->ReportUserGroupQuery.'

            `Contact`.`sales_step` = \'1\' AND `Contact`.`contact_status_id` = '.$contact_status_id.' AND `Event`.`user_id` in ('.$user_ids_vals.')  AND `Event`.`status` NOT IN (\'Completed\',\'Canceled\')
            AND `Event`.`start` < :current_datetime
            GROUP BY contact_id',array('current_datetime' => date('Y-m-d H:i:s')  ));
            return $missed_appt;

        }





    }


    public function set_price_range(&$conditions, $price_range, $field ){
        //debug($conditions);
        //unit value condition
        $pos_plus = strpos($price_range, "+");
        //debug($pos_plus);
        if($pos_plus !== false){
            $p_val = explode("+", $price_range);
            $p_val = $p_val[0] * 1000;
            $conditions['OR']['Contact.'.$field." > "] = $p_val;
            //debug($p_val);
        }else{
            $p_val = explode("-", $price_range);
            //debug($p_val);
            $p_val1 = $p_val[0] * 1000;
            $p_val2 = $p_val[1] * 1000;
            $conditions['OR']['Contact.'.$field."  between ? AND ? "] = array($p_val1,$p_val2);
            //$conditions['OR']['Contact.'.$field." <= "] = $p_val2;
        }
        return $conditions;
    }

    public function getMakeList($dealer_id = null)
    {
        $makeList = array();

        if(!is_null($dealer_id))
        {
            $options = array(
                'conditions' => array('Contact.company_id' => $dealer_id, 'Contact.make !=' => '', 'Contact.make is not null'),
                'fields' => array('DISTINCT Contact.make'),
                'order' => array('Contact.make ASC'),
                'recursive' => -1,
            );

            $make = $this->find('all', $options);

            if(!empty($make))
            {
                foreach($make as $k => $v)
                {
                    $makeList[$v['Contact']['make']] = $v['Contact']['make'];
                }
            }
        }

        return $makeList;
    }

    public function getActiveVendors(){

        App::import('model','ActiveVendor');
        $ActiveVendor = new ActiveVendor;
        $ActiveVendor->bindModel(array('hasMany' => array('ActiveVendorDealer')));

        $activeVendor_list = $ActiveVendor->find('all');
        // debug( $activeVendor_list );

        $VendordealerList = [];
        foreach($activeVendor_list as $ac_vendor){
            $VendordealerList[ $ac_vendor['ActiveVendor']['vendor_name'] ] = [];
            foreach($ac_vendor['ActiveVendorDealer'] as $a_dealer){
                $VendordealerList[ $ac_vendor['ActiveVendor']['vendor_name'] ][] = ['name'=>$a_dealer['dealer_name'],'id'=>$a_dealer['dealer_id']];
            }
        }
        return $VendordealerList;
    }

		// before save method to check whether the record is modified first time or not

	public function beforeSave($options = array()) {

		$user = $this->getCurrentUser();
		if(!empty($user['zone']))
    	date_default_timezone_set($user['zone']);

		if (!empty($this->data['Contact']['id']) && !isset($this->data['Contact']['first_modified']))
		{
			$check_reocrd = $this->find('first',array('fields' =>array('Contact.id','Contact.first_modified'),'conditions' => array('Contact.id' => $this->data['Contact']['id'])));
			if(empty($check_reocrd['Contact']['first_modified']))
			{
				$this->data['Contact']['first_modified'] = date('Y-m-d H:i:s');
			}
		}elseif(empty($this->data['Contact']['first_modified']))
		{
			$this->data['Contact']['first_modified'] = date('Y-m-d H:i:s');
		}

		return true;
	}

	function getCurrentUser() {

	  // for CakePHP 2.x:
	  App::uses('CakeSession', 'Model/Datasource');
	  $Session = new CakeSession();


	  $user = $Session->read('Auth.User');

	  return $user;
	}

	public function saveFirstModified($contact_info)
	{
		$user = $this->getCurrentUser();
		if(!empty($user['zone']))
    	date_default_timezone_set($user['zone']);
		if(isset($contact_info['Contact']['first_modified']) && empty($contact_info['Contact']['first_modified']))
		{
			$contact_info['Contact']['first_modified'] =date('Y-m-d H:i:s');
			$this->save($contact_info);
		}elseif(!isset($contact_info['Contact']['first_modified']))
		{
			$check_reocrd = $this->find('first',array('fields' =>array('Contact.id','Contact.first_modified'),'conditions' => array('Contact.id' => $contact_info['Contact']['id'])));
			if(empty($check_reocrd['Contact']['first_modified']))
			{
				$contact_info['Contact']['first_modified'] = date('Y-m-d H:i:s');
				$this->save($contact_info);
			}
		}
		return true;

	}

}
