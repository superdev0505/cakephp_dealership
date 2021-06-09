<?php
class CategoriesController extends AppController {

    public $uses = array('Category','Trim','XmlInventory','MarineInventory');
    public $components = array('RequestHandler');

     public function beforeFilter() {
           parent::beforeFilter();
//        $this->response->header('Access-Control-Allow-Origin: *');
           $this->Auth->allow('get_d_type', 'get_classes_type','vehicle_details','get_make_n','get_year_n','get_model_n','get_category_list','get_specification','get_body_sub_type','get_year','get_make','get_model','get_model');
    }


    public function _hd_prefix($year, $make, $model){
        $model_part = explode("-", $model);
        //debug($model_part);
        $prefix = "";
        $model = "";
        if(count($model_part) == 2){
            $prefix = trim($model_part[0]);
            $model = trim($model_part[1]);
            $model_data = $this->Contact->query("SELECT
            `Trim`.`id`, `Trim`.`model_id`, `Trim`.`category_type_id`, `Trim`.`model_prefix`,  `Category`.`d_type`,
            `Trim`.`msrp`, `Trim`.`short_name`, `Trim`.`pretty_name`, `Model`.`id`, `Model`.`make_id`, `Model`.`year`, `Model`.`short_name`,
            `Model`.`pretty_name`, `Make`.`id`, `Make`.`short_name`, `Make`.`pretty_mame`, `Make`.`locale`, `Category`.`id`, `Category`.`body_type`,
            `Category`.`body_sub_type`, `Category`.`visible_in_ui` FROM `crmdeva1_crm2`.`trims` AS `Trim`
            LEFT JOIN `crmdeva1_crm2`.`models` AS `Model` ON (`Trim`.`model_id` = `Model`.`id`)
            LEFT JOIN `crmdeva1_crm2`.`makes` AS `Make` ON (`Model`.`make_id` = `Make`.`id`)
            LEFT JOIN `crmdeva1_crm2`.`categories` AS `Category` ON (`Trim`.`category_type_id` = `Category`.`id`)
            WHERE
            `Make`.`locale` = 'en-us' AND
            `Category`.`d_type` = 'Harley-Davidson' AND
            `Trim`.`model_prefix` = :prefix AND
            `Model`.`pretty_name` = :model_name AND
            `Model`.`year` = :year AND
            `Make`.`id` = 611
            ORDER BY `Trim`.`id` ASC LIMIT 2", array('prefix'=>$prefix,'model_name'=>$model,'year'=>$year));
            return $model_data;
        }else{

            return array();
        }
    }

    public function change_category_hd(){

        $model_details = $this->_hd_prefix(2014,"Harley-Davidson", 'FLSTC - Heritage Softail Classic');
        debug($model_details);

        /*

        $trims = $this->Trim->query("
        SELECT
            `Trim`.`id`, `Trim`.`category_type_id`,  `Category`.`id`, `Category`.`body_type`,
        `Category`.`body_sub_type`, `Category`.`d_type` FROM `crmdeva1_crm2`.`trims` AS `Trim`
        LEFT JOIN `crmdeva1_crm2`.`models` AS `Model` ON (`Trim`.`model_id` = `Model`.`id`)
        LEFT JOIN `crmdeva1_crm2`.`makes` AS `Make` ON (`Model`.`make_id` = `Make`.`id`)
        LEFT JOIN `crmdeva1_crm2`.`categories` AS `Category` ON (`Trim`.`category_type_id` = `Category`.`id`)
        WHERE `Make`.`id` =  611");

        //debug($trims);

        $d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>'Harley-Davidson')));
        $d_type_options = array();
        foreach($d_types as $d_type){
            $d_type_options[$d_type['Category']['body_sub_type']] = $d_type['Category']['id'];
        }
        //debug( $d_type_options );

        foreach($trims as $trim){
            if(isset($d_type_options[ $trim['Category']['body_sub_type'] ])){
                $category_type_id = $d_type_options[ $trim['Category']['body_sub_type'] ];
                //Update trim
                $query_str = "UPDATE  `crmdeva1_crm2`.`trims` SET  `category_type_id` =  '".$category_type_id ."' WHERE  `trims`.`id` =".$trim['Trim']['id']."";
                $this->Trim->query($query_str);
            }


        }

        */


    }


    /* Inventory admin */
    public function edit_trim($trim_id){

         if ($this->request->is('post')) {
             if ($this->Trim->save($this->request->data)) {
                $this->set('save_sucees', true);
            }
         }else{

            $conditions = array('Trim.id'=>$trim_id);
            $this->Trim->bindModel(array(
                'belongsTo'=>array(
                    'Model',
                    'Make'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Model.make_id = Make.id'),
                    ),
                    'Category'=>array(
                        'foreignKey'=>false,
                        'conditions'=>array('Trim.category_type_id = Category.id'),
                    ),
                ),
                'hasMany'=>array('TrimColor')
            ), false);
            $trim = $this->Trim->find('first',array(
                'conditions' => $conditions,
            ));
            $this->set('trim', $trim);
            $this->request->data = $trim;

            $this->request->data['Trim']['search_category'] = $trim['Category']['d_type'];
            $this->request->data['Trim']['search_type'] = $trim['Category']['body_type'];
            $this->request->data['Trim']['msrp'] =  number_format($trim['Trim']['msrp'], 2, '.', '');


            //category_type_id

         }



        $d_types = $this->Category->find("all", array('order'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
        $d_type_options = array();
        foreach($d_types as $d_type){
            $d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
        }
        $this->set('d_type_options', $d_type_options);


        $d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$this->request->data['Trim']['search_category']),'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
        $body_type = array();
        foreach($d_types as $d_te){
            $body_type[$d_te['Category']['body_type']] = $d_te['Category']['body_type'];
        }
        $this->set('body_type', $body_type);

        $body_sub_types = $this->Category->find("all", array('conditions'=>array('Category.body_type'=>$this->request->data['Trim']['search_type'], 'Category.d_type'=>$this->request->data['Trim']['search_category']),'order'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
        $body_sub_type_options = array();
        foreach($body_sub_types as $body_sub_type){
            $body_sub_type_options[$body_sub_type['Category']['id']] = $body_sub_type['Category']['body_sub_type'];
        }
        $this->set('body_sub_type_options', $body_sub_type_options);




    }
    public function search_result() {

        //debug( $this->request->query );

        $conditions = array('Make.locale'=>'en-us');
        if(!empty($this->request->query['search_category'])){
            $conditions['Category.d_type'] = $this->request->query['search_category'];
        }
        if(!empty($this->request->query['search_type'])){
            $conditions['Category.body_type'] = $this->request->query['search_type'];
        }
        if(!empty($this->request->query['search_make'])){
            $conditions['Make.pretty_mame']= $this->request->query['search_make'];
        }
        if(!empty($this->request->query['search_year'])){
            $conditions['Model.year']= $this->request->query['search_year'];
        }

        if(!empty($this->request->query['search_new_add'])){
            $conditions['Trim.new_add']= 1;
        }

        $this->Trim->bindModel(array(
            'belongsTo'=>array(
                'Model',
                'Make'=>array(
                    'foreignKey'=>false,
                    'conditions'=>array('Model.make_id = Make.id'),
                ),
                'Category'=>array(
                    'foreignKey'=>false,
                    'conditions'=>array('Trim.category_type_id = Category.id'),
                ),
            ),
            'hasMany'=>array('TrimColor')
        ), false);
        $this->paginate = array(
            'conditions' => $conditions,
            'order' =>'Trim.id ASC',
            'limit' => 30,
        );
        $trims = $this->Paginate('Trim');
        $this->set('trims', $trims);

    }

    public function list_trims(){


        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user


        //debug( $this->Auth->password('vtfade') );
        //debug( $this->Auth->password('vtfade') );
        $this->layout = 'admin_default';



        //Search options
        $this->loadModel("Category");
        $d_types = $this->Category->find("all", array('order'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
        $d_type_options = array();
        foreach($d_types as $d_type){
            $d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
        }
        $this->set('d_type_options', $d_type_options);

        $user_d_type = 'Powersports';
        $d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$user_d_type),'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
        $type_options = array();
        foreach($d_types as $d_type){
            $type_options[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
        }
        $this->set('type_options', $type_options);

    }


    /* New inventory starts */
    public function get_classes($rtype='view'){
        $this->layout = 'ajax';

        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];


        $category = $this->request->query['category'];
        $type = $this->request->query['type'];

        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            $conditions['MarineInventory.category'] = $category;
            $marineInventories = $this->MarineInventory->find("all", array(
                'conditions' => $conditions,
                'fields'=>array("MarineInventory.class"),
                'group'=>"MarineInventory.class"
            ));

            //debug( $marineInventories );

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Class'] = 'Any Class';
            foreach($marineInventories as $marineInventory){
                $body_sub_type_options_trade[$marineInventory['MarineInventory']['class']] = $marineInventory['MarineInventory']['class'];
            }


        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }

            $conditions = array(
                'XmlInventory.dealerid' => $dealer_id,
                //'XmlInventory.bodysubtype <>' => "",
            );
            //debug($conditions);


            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }

            $classes = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.bodysubtype'=>'ASC'),
            'fields'=>array('DISTINCT XmlInventory.bodysubtype')));

            // debug( $conditions );
            // debug( $classes );

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Class'] = 'Any Class';
            foreach($classes as $classes){
                if($classes['XmlInventory']['bodysubtype'] == null || $classes['XmlInventory']['bodysubtype'] == ''){
                    continue;
                }
                $body_sub_type_options_trade[$classes['XmlInventory']['bodysubtype']] = $classes['XmlInventory']['bodysubtype'];
            }

        }else{

            $body_sub_types_trade = $this->Category->find("all", array('conditions'=>array(
                'Category.d_type' => $type, 'Category.body_type'=>$category),
                'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')
            ));
            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Class'] = 'Any Class';
            foreach($body_sub_types_trade as $body_sub_type_trade){
                $body_sub_type_options_trade[" ".$body_sub_type_trade['Category']['id']] = $body_sub_type_trade['Category']['body_sub_type'];
            }


        }


        if($rtype == 'view'){
            $this->set('body_sub_type_options', $body_sub_type_options_trade);
            $this->render("/Categories/get_body_sub_type");
        }else{
            return $body_sub_type_options_trade;
        }


    }


    public function get_categories_n($rtype='view'){
        $this->layout = 'ajax';
        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];
        $type = $this->request->query['type'];


        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            //$conditions['MarineInventory.year'] = $year;
            //$conditions['MarineInventory.make'] = $make;
            $marineInventories = $this->MarineInventory->find("all", array('fields'=>array("MarineInventory.category"), 'group'=>"MarineInventory.category"));
            // debug($marineInventories);

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($marineInventories as $marineInventory){
                $body_sub_type_options_trade[$marineInventory['MarineInventory']['category']] = $marineInventory['MarineInventory']['category'];
            }

        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }
            //$body_sub_type_options_trade[ $this->request->query['class'] ] = $this->request->query['class'];
            $conditions = array(
                'XmlInventory.dealerid' => $dealer_id
            );

            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }


            $classes = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.category_name'=>'ASC'),
            'fields'=>array('DISTINCT XmlInventory.category_name')));

            // debug( $conditions );
            // debug( $classes );

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($classes as $classes){
                if($classes['XmlInventory']['category_name'] == null || $classes['XmlInventory']['category_name'] == ''){
                    continue;
                }
                $body_sub_type_options_trade[$classes['XmlInventory']['category_name']] = $classes['XmlInventory']['category_name'];
            }


        } else {

            $body_sub_types_trade = $this->Category->find("all", array('group'=>array('Category.body_type'),
                'conditions'=>array('Category.d_type'=>$type),'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('Category.id','Category.body_type')));
            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($body_sub_types_trade as $body_sub_type_trade){
                $body_sub_type_options_trade[$body_sub_type_trade['Category']['body_type']] = $body_sub_type_trade['Category']['body_type'];
            }

        }




        if($rtype == 'view'){
            $this->set('body_sub_type_options', $body_sub_type_options_trade);
            $this->render("/Categories/get_body_sub_type");
        }else{
            return $body_sub_type_options_trade;
        }

    }


    /* New inventory starts */
    public function get_classes_type($rtype='view'){

        $this->layout = 'ajax';

        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];
        $type = $this->request->query['type'];

        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            //$conditions['MarineInventory.year'] = $year;
            //$conditions['MarineInventory.make'] = $make;
            $marineInventories = $this->MarineInventory->find("all", array('fields'=>array("MarineInventory.category"), 'group'=>"MarineInventory.category"));
            // debug($marineInventories);

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($marineInventories as $marineInventory){
                $body_sub_type_options_trade[$marineInventory['MarineInventory']['category']] = $marineInventory['MarineInventory']['category'];
            }

        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }
            //$body_sub_type_options_trade[ $this->request->query['class'] ] = $this->request->query['class'];
            $conditions = array(
                'XmlInventory.dealerid' => $dealer_id,
                //'XmlInventory.vehtype <>' => "",
            );

            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }
            //$conditions['XmlInventory.category_name <>'] = null;
            $classes = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.vehtype'=>'ASC'),
            'fields'=>array('DISTINCT XmlInventory.category_name')));
            // debug($classes);

            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($classes as $classes){
                if( $classes['XmlInventory']['category_name'] == null || $classes['XmlInventory']['category_name'] == '' ){
                    continue;
                }
                $body_sub_type_options_trade[$classes['XmlInventory']['category_name']] = $classes['XmlInventory']['category_name'];
            }

        } else {

            $body_sub_types_trade = $this->Category->find("all", array('group'=>array('Category.body_type'),
                'conditions'=>array('Category.d_type'=>$type),'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('Category.id','Category.body_type')));
            $body_sub_type_options_trade = array();
            $body_sub_type_options_trade['Any Category'] = 'Any Category';
            foreach($body_sub_types_trade as $body_sub_type_trade){
                $body_sub_type_options_trade[$body_sub_type_trade['Category']['body_type']] = $body_sub_type_trade['Category']['body_type'];
            }

        }




        if($rtype == 'view'){
            $this->set('body_sub_type_options', $body_sub_type_options_trade);
            $this->render("/Categories/get_body_sub_type");
        }else{
            return $body_sub_type_options_trade;
        }
    }


    public function get_year_n($rtype='view') {

        $this->layout = 'ajax';
        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];
        $type = $this->request->query['type'];
        $make = $this->request->query['make'];


        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            $conditions = array(
                "MarineInventory.make" => $make
            );
            $years = $this->MarineInventory->find("all", array(
                'conditions'=>$conditions,
                'order' => array('MarineInventory.year DESC'),
                'fields' => array('DISTINCT MarineInventory.year')
            ));
            $year_opt = array();
            $year_opt[' 0'] = 'Any Year';
            foreach($years as $year){
                $year_opt[" ".$year['MarineInventory']['year'] ] = $year['MarineInventory']['year'];
            }

        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }

            $conditions = array(
                'XmlInventory.dealerid' => $dealer_id,
                'XmlInventory.make'=> $make,
            );

            if(!isset($this->request->query['show_hidden']) ){
                $conditions['XmlInventory.hidden'] = 0;
            }

            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }

            if(isset($this->request->query['no_sold']) && $this->request->query['no_sold'] == 'yes'){
                $conditions['XmlInventory.sold'] = '0';
            }
            $years = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.year DESC'),
                'fields'=>array('DISTINCT XmlInventory.year')
            ));
            $year_opt = array();
            $year_opt[' 0'] = 'Any Year';
            foreach($years as $year){
                $year_opt[" ".$year['XmlInventory']['year'] ] = $year['XmlInventory']['year'];
            }
            // debug($years);
        }else{

            $cats = $this->Category->find("list", array('conditions'=>array('Category.d_type'=>$type),'fields'=>array('Category.id','Category.body_type')));
            $cat_ids = array_keys($cats);

            $this->loadModel('Trim');
            $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
                'foreignKey'=>false,
                'conditions'=>array('Model.make_id = Make.id'),
            ))));
            $trims = $this->Trim->find('all',array('order'=>array('Model.year'=>'DESC'),'fields'=>array('DISTINCT Model.year'),'conditions'=>array(
                'Make.pretty_mame'=>$make,
                'Make.locale'=>'en-us','Trim.category_type_id'=>$cat_ids)));

            $year_opt = array();
            $year_opt[' 0'] = 'Any Year';
            foreach($trims as $trim){
                $year_opt[ " ".$trim['Model']['year'] ] = $trim['Model']['year'];
            }
        }

        if($rtype == 'view'){
            $this->set('year_opt', $year_opt);
            $this->render("/Categories/get_year");
        }else{
            return $year_opt;
        }
    }

    public function get_d_type( $rtype = 'view' ){

        $this->layout = 'ajax';
        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];

        $referer = $this->referer();
        if(preg_match('/serviceapp/',$referer)){
            $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
        }elseif(preg_match('/bdcapp/',$referer)){
            $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
        }else{
            $dealer_id = $this->Auth->user('dealer_id');
        }


        if($vehicle_selection_type == 'In Stock'){

            $hidden_cond = " AND a.hidden = 0";
            if( isset($this->request->query['show_hidden']) ){
                $hidden_cond = "";
            }

            $d_types = $this->Category->query("SELECT a.id,  a.vehtype
            FROM xml_inventories a
            where a.dealerid = :dealerid ".$hidden_cond."
            GROUP BY a.vehtype order by a.vehtype", array('dealerid' => $dealer_id ));

            foreach($d_types as $dt){
                if($dt['a']['vehtype']  == '' || $dt['a']['vehtype'] == null){
                    $d_type_options ['Other'] = 'Other';
                }else{
                    $d_type_options [ $dt['a']['vehtype'] ] = $dt['a']['vehtype'];
                }
            }
            //debug();
            if(!empty($d_type_options) && !is_null($d_type_options)){
                asort($d_type_options);
            }

        }else if($vehicle_selection_type == 'Branch Inventory'){
            $d_type_options['Marine'] = 'Marine';
        }else{
            $d_type_options = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
        }

        if($rtype == 'view'){
            $this->set('mk_options', $d_type_options);
            $this->render("get_make");
        }else{
            //$this->autoRender = false;
            return $d_type_options;
        }
    }

    public function get_make_n($rtype = 'view')
    {
        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];
        $this->layout = 'ajax';
        $type = $this->request->query['type'];
        $category = $this->request->query['category'];

        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            $conditions = array();

            $makes = $this->MarineInventory->find("all", array('conditions'=>$conditions,
                'order'=>array('MarineInventory.make'=>'ASC'),'fields'=>array('DISTINCT MarineInventory.make')));
            $mk_options = array();
            $mk_options['Any Make'] = 'Any Make';

            foreach($makes as $make){
                $mk_options[$make['MarineInventory']['make']] = $make['MarineInventory']['make'];
            }

        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }

            $conditions = array(
                'XmlInventory.make <>'=> '',
                'XmlInventory.dealerid' => $dealer_id
            );

            if(!isset($this->request->query['show_hidden']) ){
                $conditions['XmlInventory.hidden'] = 0;
            }

            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }

            if(isset($this->request->query['no_sold']) && $this->request->query['no_sold'] == 'yes'){
                $conditions['XmlInventory.sold'] = '0';
            }

            $makes = $this->XmlInventory->find("all", array(
                //'group' => array('XmlInventory.make') ,
                'conditions'=>$conditions,'order'=>array('XmlInventory.make'=>'ASC'),
                'fields'=>array('XmlInventory.make')
            ));

            $mk_options = array();
            $mk_options['Any Make'] = 'Any Make';
            foreach($makes as $make){
                $mk_options[$make['XmlInventory']['make']] = $make['XmlInventory']['make'];
            }

        } else {

            if($type != ''){

                $cats = $this->Category->find("list", array('conditions'=>array('Category.d_type'=>$type),'fields'=>array('Category.id','Category.body_type')));
                $cat_ids = array_keys($cats);

                $this->loadModel('Trim');
                $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
                    'foreignKey'=>false,
                    'conditions'=>array('Model.make_id = Make.id'),
                ))));

                $trim_condition = array(
                    //'Make.id <>' => null,
                    'Make.locale' => 'en-us',
                    'Trim.category_type_id' => $cat_ids
                );

                if($type == 'Harley-Davidson'){
                    $trim_condition['Make.pretty_mame'] = array('Harley-Davidson', 'Harley-Davidson Police & Fire');
                }

                $trims = $this->Trim->find('all',array(
                    'order' => array('Make.short_name' => 'ASC'),
                    'fields' => array('DISTINCT Make.pretty_mame'),
                    'conditions' => $trim_condition
                ));

                $make_opt = array();
                $make_opt['Any Make'] = 'Any Make';
                foreach($trims as $trim) {
                    $make_opt[$trim['Make']['pretty_mame']] = $trim['Make']['pretty_mame'];
                }

                $mk_options = $make_opt;
            }
        }

        if($rtype == 'view') {
            echo json_encode($mk_options);
            exit;
        }else{
            return $mk_options;
        }
    }


    public function get_model_n($rtype='view') {

        $this->layout = 'ajax';
        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];

        $type = $this->request->query['type'];
        $year = trim($this->request->query['year']);
        $make = $this->request->query['make'];

        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){
            $conditions = array(
                //'MarineInventory.category'=> $category,
                'MarineInventory.make'=> $make,
                'MarineInventory.year'=> $year,
            );
            $models = $this->MarineInventory->find("all", array('conditions'=>$conditions,'order'=>array('MarineInventory.model'=>'ASC'),'fields'=>array('MarineInventory.inv_id','MarineInventory.model','MarineInventory.stock_num')));
            //debug($models);
            $model_opt = array();
            foreach($models as $model){
                $model_opt[$model['MarineInventory']['inv_id']." "] = $model['MarineInventory']['model']." - ".$model['MarineInventory']['stock_num'];
            }

        }else if($vehicle_selection_type == 'In Stock'){

            $referer = $this->referer();
            if(preg_match('/serviceapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
            }elseif(preg_match('/bdcapp/',$referer)){
                $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
            }else{
                $dealer_id = $this->Auth->user('dealer_id');
            }

            $conditions = array(
                'XmlInventory.make'=> $make,
                'XmlInventory.year'=> $year,
                'XmlInventory.dealerid' => $dealer_id
            );

            if(!isset($this->request->query['show_hidden']) ){
                $conditions['XmlInventory.hidden'] = 0;
            }

            if($type == 'Other'){
                $conditions['OR']['XmlInventory.vehtype']  = '';
                $conditions['OR']['XmlInventory.vehtype ']  = null;
            }else{
                $conditions['XmlInventory.vehtype'] = $type;
            }

            if(isset($this->request->query['no_sold']) && $this->request->query['no_sold'] == 'yes'){
                $conditions['XmlInventory.sold'] = '0';
            }
            // debug($conditions);

            $models = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.model'=>'ASC'),
                'fields'=>array('XmlInventory.id','XmlInventory.model','XmlInventory.stocknumber')
            ));
            // debug($models);
            $model_opt = array();
            foreach($models as $model){
                $model_opt[" ".$model['XmlInventory']['id']] = $model['XmlInventory']['model']." - ".$model['XmlInventory']['stocknumber'];
            }


        }else{

            // debug("get model");
            $cats = $this->Category->find("list", array('conditions'=>array('Category.d_type'=>$type),'fields'=>array('Category.id','Category.body_type')));
            $cat_ids = array_keys($cats);

            $this->loadModel('Trim');
            $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
                'foreignKey'=>false,
                'conditions'=>array('Model.make_id = Make.id'),
            ))));
            $trims = $this->Trim->find('all',array('order'=>array('Trim.model_prefix'=>'ASC','Model.pretty_name ASC'),'fields'=>array('Trim.id', 'Trim.short_name','Trim.model_prefix','Model.id','Model.pretty_name', 'Model.year'),
                'conditions'=>array('Model.year'=>$year,'Make.pretty_mame'=>$make,'Make.locale'=>'en-us','Trim.category_type_id'=>$cat_ids)));
            // debug($trims);
            $model_opt = array();
            foreach($trims as $trim){
                $model_opt[" ".$trim['Trim']['id']] = $trim['Trim']['model_prefix']." ".$trim['Model']['pretty_name']." ".$trim['Trim']['short_name'];
            }

        }

        if($rtype == 'view'){
            $this->set('model_opt', $model_opt);
            $this->render("/Categories/get_model");
        }else{
            return $model_opt;
        }
    }



     public function get_category_list($rtype='view'){
        $this->layout = 'ajax';
        $d_type = $this->request->query['d_type'];

        //Generate cache id
        $c_d_type = Inflector::slug($d_type);
        $cache_id = "get_category_list_{$d_type}";

        //Cache::set(array('duration' => '+30 days'));
        //if (($d_type_options = Cache::read($cache_id)) === false) {

            if($d_type == 'Branch Inventory'){

                //$conditions['MarineInventory.sale_date'] = '';
                $marineInventories = $this->MarineInventory->find("all", array('conditions'=>$conditions,'order'=>array('MarineInventory.category'=>'ASC'),'fields'=>array('DISTINCT MarineInventory.category')));
                //debug($marineInventories);
                $d_type_options = array();
                $d_type_options['Any Category'] = 'Any Category';
                //$d_type_options['Any Category'] = 'Any Category';
                foreach($marineInventories as $MarineInventory){
                    $d_type_options[$MarineInventory['MarineInventory']['category']] = $MarineInventory['MarineInventory']['category'];
                }


            }else if($d_type != 'In Stock'){
                $d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'order'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type','Category.id')));
                //debug($d_types);
                $d_type_options = array();
                $d_type_options['Any Category'] = 'Any Category';

                foreach($d_types as $d_type){
                    //$d_type_options[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
                    $d_type_options[$d_type['Category']['id']] = $d_type['Category']['body_type'];
                }
            }else if($d_type == 'In Stock'){
                    $referer = $this->referer();
                   if(preg_match('/serviceapp/',$referer))
                   {
                    $dealer_id = $this->Session->read('Auth.ServiceApp.dealer_id');
                   }elseif(preg_match('/bdcapp/',$referer)){
                    $dealer_id = $this->Session->read('Auth.BdcApp.dealer_id');
                   }else{
                    $dealer_id = $this->Auth->user('dealer_id');
                   }
                $conditions = array('XmlInventory.vehtype <>'=>'', 'XmlInventory.dealerid' => $dealer_id );
                if(isset($this->request->query['no_sold']) && $this->request->query['no_sold'] == 'yes'){
                    $conditions['XmlInventory.sold'] = '0';
                }

                $xmlInventories = $this->XmlInventory->find("all", array('conditions'=>$conditions,'order'=>array('XmlInventory.vehtype'=>'ASC'),'fields'=>array('DISTINCT XmlInventory.vehtype')));
                $d_type_options = array();
                //$d_type_options['Any Category'] = 'Any Category';
                foreach($xmlInventories as $xmlInventory){
                    $d_type_options[$xmlInventory['XmlInventory']['vehtype']] = $xmlInventory['XmlInventory']['vehtype'];
                }
            }



            //Cache::set(array('duration' => '+30 days'));
            //Cache::write($cache_id, $d_type_options);
            //debug($d_type_options);
        //}
        $this->set('d_type_options', $d_type_options);

        if($rtype == 'view'){
            //$this->render("input/get_category_list");
            $this->render("/Categories/get_category_list");
        }else{
            return $d_type_options;
        }

    }
    /* New inventory ends */


    public function get_specification_xml($model_id, $contact_id){
        $this->layout = 'ajax';

        $xmlInventories = $this->XmlInventory->find("first", array('fields'=>array('XmlInventory.description'),'conditions'=>array( 'XmlInventory.sold'=>'0','XmlInventory.id' => $model_id )));
        $this->set('xmlInventories', $xmlInventories);
        //debug($xmlInventories['XmlInventory']['description']);

        $this->loadModel('Contact');
        $contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
        $this->set('contact', $contact);

    }


    public function get_specification($model_id,$contact_id){

        $this->layout = 'ajax';

        //Get Description and spec
        $specification = array();
        $description = "";

        $this->loadModel('Specification');
        $this->loadModel('Trim');
        $this->loadModel('Description');
        $trim = $this->Trim->find("first", array('conditions'=>array('Trim.id'=>$model_id)));
        if(!empty($trim)){
            $specs = $this->Specification->find("first", array('conditions'=>array('Specification.trim_id'=> $trim['Trim']['id']  )));
            $specification = !empty($specs)? json_decode($specs['Specification']['attributes']) : "" ;
            $desc = $this->Description->find("first", array('conditions'=>array('Description.trim_id'=> $trim['Trim']['id']  )));
            $description = $desc['Description']['description'];
        }

        $this->set('specification', $specification);
        $this->set('description', $description);

        $this->loadModel('Contact');
        $contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
        $this->set('contact', $contact);

    }


    public function get_body_sub_type($type='tool'){
        $this->layout = 'ajax';
        $this->loadModel('Trim');
        $this->loadModel('Make');
        $this->loadModel('Model');

        $body_type = $this->request->query['body_type'];
        $d_type = $this->request->query['d_type'];

        $body_sub_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type,'Category.body_type'=>$body_type),'order'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
        $body_sub_type_options = array();
        $category_ids = array();
        foreach($body_sub_types as $body_sub_type){
            $body_sub_type_options[$body_sub_type['Category']['id']] = $body_sub_type['Category']['body_sub_type'];
            $category_ids[] = $body_sub_type['Category']['id'];
        }
        $this->set('body_sub_type_options', $body_sub_type_options);

        if($type == 'input'){
            $this->render("input/get_body_sub_type");
        }

    }

    public function get_year($type='tool') {
        $this->layout = 'ajax';
        $class = $this->request->query['class'];

        $this->loadModel('Trim');
        $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
            'foreignKey'=>false,
            'conditions'=>array('Model.make_id = Make.id'),
        ))));
        $trims = $this->Trim->find('all',array('order'=>array('Model.year'=>'DESC'),'fields'=>array('DISTINCT Model.year'),'conditions'=>array('Make.pretty_mame <>'=>null,'Model.year <>' => null, 'Trim.category_type_id'=>$class)));
        $year_opt = array();
        foreach($trims as $trim){
            $year_opt[$trim['Model']['year']] = $trim['Model']['year'];
        }
        $this->set('year_opt', $year_opt);

        if($type == 'input'){
            $this->render("input/get_year");
        }
    }

    public function get_make($type='tool') {
        $this->layout = 'ajax';
        $year = $this->request->query['year'];
        $class = $this->request->query['class'];

        $this->loadModel('Trim');

        $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
            'foreignKey'=>false,
            'conditions'=>array('Model.make_id = Make.id'),
        ))));
        $trims = $this->Trim->find('all',array('order'=>array('Make.short_name'=>'ASC'),'fields'=>array('Make.id','Make.pretty_mame'),'conditions'=>array('Make.id <>'=>null, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
        //debug($trims);
        $make_opt = array();
        foreach($trims as $trim){
            $make_opt[] = $trim['Make']['pretty_mame'];
        }
        $make_opt = array_unique($make_opt);

        $mk_options = array();
        foreach($make_opt as $val){
            $mk_options[$val] = $val;
        }
        $this->set('mk_options', $mk_options);

        if($type == 'input'){
            $this->render("input/get_make");
        }

    }

    public function get_model($type='tool') {
        $this->layout = 'ajax';
        $this->loadModel('Trim');
        $year = $this->request->query['year'];
        $class = $this->request->query['class'];
        $make = $this->request->query['make'];

        $this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
            'foreignKey'=>false,
            'conditions'=>array('Model.make_id = Make.id'),
        ))));
        $trims = $this->Trim->find('all',array('order'=>array('Model.short_name'=>'ASC'),'fields'=>array('Model.id','Model.pretty_name','Model.year'),'conditions'=>array('Make.pretty_name'=>$make, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
        $model_opt = array();
        foreach($trims as $trim){
            $model_opt[$trim['Model']['id']] = $trim['Model']['pretty_name'];
        }
        $this->set('model_opt', $model_opt);

        if($type == 'input'){
            $this->render("input/get_model");
        }

    }


    function vehicle_details(){
        $this->layout = 'ajax';

        //$model_id = $this->request->query['model_id'];
        $trim_id = $this->request->query['model_id'];
        $type = $this->request->query['type'];
        //debug($type);

        $vehicle_selection_type = $this->request->query['vehicle_selection_type'];

        if($vehicle_selection_type == 'Branch Inventory' || $type == 'Branch Inventory'){

            $conditions['MarineInventory.inv_id'] = $trim_id;
            $marineInventory = $this->MarineInventory->find("first", array('conditions'=>$conditions));
            //debug($marineInventory);

            echo json_encode(array(
                'Year'=>$marineInventory['MarineInventory']['year'],
                'Model_id'=>$marineInventory['MarineInventory']['inv_id'],
                'Model'=>$marineInventory['MarineInventory']['model'],
                'Price'=>$marineInventory['MarineInventory']['price'],
                'Vin'=>$marineInventory['MarineInventory']['hin'],
                'Stock_num'=>$marineInventory['MarineInventory']['stock_num'],
                'Make'=>$marineInventory['MarineInventory']['make'],
                'Category'=>$marineInventory['MarineInventory']['category'],
                'Color'=>$marineInventory['MarineInventory']['color'],
                'Engine'=>$marineInventory['MarineInventory']['engine_no'],
                'Class'=>$marineInventory['MarineInventory']['class'],
                'Miles'=>$marineInventory['MarineInventory']['hours'],
                'Condition'=>  ucfirst( strtolower($marineInventory['MarineInventory']['condition'])),
                'Branch_location'=>$marineInventory['MarineInventory']['branch'],

                )
            );
        }else if($vehicle_selection_type == 'In Stock'){

            $xmlInventories = $this->XmlInventory->find("first", array('conditions'=>array('XmlInventory.id' => $trim_id )));
            $xmlInventories['XmlInventory']['price'] = number_format($xmlInventories['XmlInventory']['price'], 2, '.', '');
            $xmlInventories['XmlInventory']['condition'] = (strtolower($xmlInventories['XmlInventory']['condition']) == 'n' || strtolower($xmlInventories['XmlInventory']['condition']) == 'new' )? "New" : "Used";

            //Get Instock d_type
            $category = $this->Category->find('first',array('conditions'=>array(
                'Category.body_type' => $xmlInventories['XmlInventory']['vehtype'],
                'Category.d_type <>' => 'Harley-Davidson',
                'Category.d_type <>' => '',
                'Category.d_type <>' => null
            )));

            if(!empty($category)){
                $xmlInventories['XmlInventory']['instock_d_type'] = $category['Category']['d_type'];
            }else{
                $xmlInventories['XmlInventory']['instock_d_type'] = 'Uncategorized';
            }

            //debug($xmlInventories['XmlInventory']['category_name']);
            if($xmlInventories['XmlInventory']['category_name'] == null || $xmlInventories['XmlInventory']['category_name'] == ''){
                $xmlInventories['XmlInventory']['category_name'] = 'Any Category';
            }

            if($xmlInventories['XmlInventory']['bodysubtype'] == null || $xmlInventories['XmlInventory']['bodysubtype'] == ''){
                $xmlInventories['XmlInventory']['bodysubtype'] = 'Any Class';
            }


            echo json_encode(array('Model'=>$xmlInventories['XmlInventory']));

        }else{

            $this->loadModel('Trim');
            $this->loadModel('Model');
            $this->loadModel('Make');
            $this->loadModel('TrimColor');

            $trim = $this->Trim->find('first',array('conditions'=>array('Trim.id'=>$trim_id),
            'fields'=>array('Trim.id','Trim.model_id','Trim.category_type_id','Trim.model_prefix','Trim.msrp','Trim.short_name')));
            $model = $this->Model->find('first',array('conditions'=>array('Model.id'=>$trim['Trim']['model_id'])));
            $make = $this->Make->find('first',array('conditions'=>array('Make.id'=>$model['Model']['make_id'])));

            /*
            $model = $this->Model->find('first',array('conditions'=>array('Model.id'=>$model_id)));
            $trim = $this->Trim->find('first',array('conditions'=>array('Trim.model_id'=>$model_id),'fields'=>array('Trim.id','Trim.model_id','Trim.category_type_id','Trim.model_prefix','Trim.msrp','Trim.short_name')));
            $make = $this->Make->find('first',array('conditions'=>array('Make.id'=>$model['Model']['make_id'])));
            */



            $category['Category'] = null;
            $color = array();
            $engine = "";
            if(!empty($trim)){
                $trim['Trim']['msrp'] = number_format($trim['Trim']['msrp'], 2, '.', '');
                $category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$trim['Trim']['category_type_id'])));

                $tcolor = $this->TrimColor->find('all',array('conditions'=>array('TrimColor.trim_id'=>$trim['Trim']['id'])));
                foreach($tcolor as $tc){
                    $color[ $tc['TrimColor']['pretty_mame'] ] = $tc['TrimColor']['pretty_mame'];
                }

                //Get engine;
                $this->loadModel('Specification');
                $specs = $this->Specification->find("first", array('conditions'=>array('Specification.trim_id'=> $trim['Trim']['id']  )));
                if(!empty($specs)){
                    $specs_ar = json_decode($specs['Specification']['attributes']);
                    if(is_array($specs_ar)){
                        foreach($specs_ar as $sp){
                        if($sp->Name == 'Engine' && $sp->Value != ""){
                            $engine = $sp->Value;
                            break;
                        }
                        if($sp->Name == 'Engine Type' && $sp->Value != ""){
                            $engine = $sp->Value;
                            break;
                        }
                    }
                    }
                }
            }
            //debug($model);
            //debug($trim);
            //debug($make);
            //debug($category);
            echo json_encode(array('Model'=>$model['Model'],'Trim'=>$trim['Trim'],'Make'=>$make['Make'],'Category'=>$category['Category'],'Color'=>$color,'Engine'=>$engine));

        }


        $this->autoRender = false;


    }

}

?>
