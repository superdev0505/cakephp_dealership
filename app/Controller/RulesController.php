<?php
class RulesController extends AppController {

    public $uses = array('Rule', 'Contact','User');
    public $components = array('RequestHandler');

	/**
   * [DO NOT DELETE THIS SECTION!!!]
	 * A list of REFNUMS for callng in a loop
	 * * Currently used in index function.
	 * * May possibly be used in all places for accessing code in a loop:
	 *    -> Like set_defaults_rule()
   */
	public $REFNUM_LIST = array(
				'trader'			,'engagetosell'			,'contactatonce'
				,'costco'			,'chopper'
				,'rvusa'			,'ebizautos'			,'marinconnection'
				,'powersports'			,'redziarv'			,'endeavor'
				,'digitalpowersports'			,'kijiji'			,'navyfederal'
				,'rvt'			,'gdcauto'			,'yachtworld'
				,'motolease'			,'boats'			,'nglobalgroup'
				,'edgewater'			,'iboats'			,'footsteps'
				,'dcentric'			,'tracker'			,'bruns'
				,'pbhmarine'			,'kingfisher'			,'interactrv'
				,'godfrey'			,'grady'			,'nexttruck'
				,'seedc'			,'duckworth'			,'pioneer'
				,'autotrader'			,'websitealive'			,'ecarlist'
				,'autojini'			,'cargurus'			,'calltrckingapi'
				,'callrail'			,'getemin'			,'commtruck'
				,'carsale'			,'craigslist'			,'reachlocallivechat'
				,'mailchimp'			,'cisco'			,'manitouboats'
				,'kbb'			,'iseecars'			,'smedia'
				,'autosoftwareleads'			,'psndealer'			,'apcequipment'
				,'hattiesburg'    ,'truckpaper','mydealers',    'oempolaris',   'freedomsite'
                ,'driveitnow',  'onlyinboards',     'airstream',    'nautique'
                ,'getauto',     'pixelmotionmotors',    'liveadmins',   'uvsjunction'
                ,'valuemytradein',      'cars',     'textron',      'carfax'
                ,'credit',    'ducatiomaha',    'liveeventstream',  'carnow'
                ,'trailercentral',  'endeavorsuite',    'armsvc',   'automoxiecrm'
                ,'truecar',     'ducati',   'skierschoice',     'dxone'
                ,'adventurecamper',     'thepapers',    'automanager',    'targetmediapartners'
                ,'searay',  'hclrv',    'brp',      'dealer',   'yourautosolutions'
                ,'autorevo',    'youradstats',      'cfm',      'dealercarsearch'
                ,'tractorhouse',    'gubagoo',      'fastline',     'leisurevans'
                ,'edmunds',     'boattradevalue',   'carcode',      'kawasakidealer'
                ,'fpsapproved',     'servicesinteractrv',   'used',     'boatchat'
                ,'truckertotrucker',    'equipmenttrader',  'sportsmanboatsmfg'
                ,'cargigi',     'jastmedia',    'rollickoutdoor',   'lancecamper'
                ,'truckntrailer',   'imanpro', 'storm_division',     'celltuck'
                ,'kz_rv',   'vogtrv_wpengine',      'dealerwebinstinct',    'buckeyerv'
                ,'polaris_digital',     'skyriverrv',   'callcap',      'auction'
                ,'northwoodmail',       'hammer_corp',  'montereyboats',    'rvadpros'
                ,'malibuboats',     'hubspot',  'appone',   'pixelmotion',  'sitedonerite'
                ,'geteminleads',    'rvchat',   'natureandmerv',    'ipssolutions'
                ,'webdb',       'denvermarine',     'builderdesigns',   'vespaoftc'
                ,'eldoradorv'
			);

    public function beforeFilter() {
        parent::beforeFilter();

    }

    public function set_round_robin(){
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->User->updateAll( array('round_robin' => $this->request->data['rr_status']),array('User.id'=>$this->request->data['user_id']));
            if($this->request->data['rr_status'] == 'false'){

                $this->loadModel('WebleadQueue');
                $this->WebleadQueue->deleteAll(array('user_id'=>$this->request->data['user_id']));

                $this->loadModel('TraderWebleadQueue');
                $this->TraderWebleadQueue->deleteAll(array('user_id'=>$this->request->data['user_id']));

                $this->loadModel('EngagetosellWebleadQueue');
                $this->EngagetosellWebleadQueue->deleteAll(array('user_id'=>$this->request->data['user_id']));
            }

        }
        $this->autoRender =  false;

    }

    //Create default rule set for newly added Dealer
    public function set_default_rules(){
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 0);
        $this->loadModel('DealerName');
        $DealerNames = $this->DealerName->find("list", array(
	        'fields' => array(
		        'DealerName.dealer_id',
		        'DealerName.name'
	        )));

        foreach($DealerNames as $key=>$value){

            //For DealerSpike
            $rule_cnt = $this->Rule->find("count", array(
	            'conditions' => array(
		            'Rule.dealer_id'=>$key,
		            'Rule.type'=>array(
			            'open',
			            'direct',
			            'round-robin'))));
            //debug($rule_cnt);
            if($rule_cnt == 0){
                $r_data = array(
                    array(
                    'dealer_id'=>$key,
                    'type'=>'open',
                    'active'=>1
                ),
                 array(
                    'dealer_id'=>$key,
                    'type'=>'direct',
                    'active'=>0
                ),
                 array(
                    'dealer_id'=>$key,
                    'type'=>'round-robin',
                    'active'=>0
                )
                    );
                $this->Rule->create();
                $this->Rule->saveMany($r_data);
            }

            ////for all other vendors
            $vendorKeyword = array(
	            'trader','engagetosell','contactatonce',
	            'costco','boatscycles','chopper',
	            'rvusa','ebizautos','marinconnection',
	            'powersports','redziarv','endeavor',
	            'digitalpowersports','kijiji','navyfederal',
	            'rvt','gdcauto','yachtworld',
	            'motolease','boats','nglobalgroup',
	            'edgewater','iboats','hattiesburg',
	            'footsteps','dcentric','tracker',
	            'bruns','pbhmarine','kingfisher',
	            'interactrv','godfrey','grady',
	            'nexttruck','seedc','duckworth',
	            'pioneer','truckpaper','autotrader',
	            'websitealive','ecarlist','autojini',
	            'cargurus','calltrckingapi','callrail',
	            'getemin','commtruck','carsale',
              'craigslist','reachlocallivechat','mailchimp',
	            'cisco','manitouboats','kbb','iseecars',
              'smedia','auto_sweet','autosoftwareleads','psndealer'
              ,'apcequipment','mydealers','oempolaris','freedomsite',
              'driveitnow','onlyinboards','airstream','nautique',
              'getauto','pixelmotionmotors','liveadmins','uvsjunction',
              'valuemytradein','cars','textron','carfax','credit',
              'ducatiomaha','liveeventstream','carnow','trailercentral',
              'endeavorsuite','armsvc','automoxiecrm','truecar',
              'ducati','skierschoice','dxone','adventurecamper',
              'thepapers','automanager','targetmediapartners',
              'searay','hclrv','brp','dealer','yourautosolutions',
              'autorevo','youradstats','cfm','dealercarsearch',
              'tractorhouse','gubagoo','fastline','leisurevans',
              'edmunds','boattradevalue','carcode','kawasakidealer',
              'fpsapproved','servicesinteractrv','used','boatchat',
              'truckertotrucker','equipmenttrader','sportsmanboatsmfg',
              'cargigi','jastmedia','rollickoutdoor','lancecamper',
              'truckntrailer','imanpro', 'storm_division','celltuck',
              'kz_rv','vogtrv_wpengine','dealerwebinstinct','buckeyerv',
              'polaris_digital','skyriverrv','callcap','auction',
              'northwoodmail','hammer_corp','montereyboats','rvadpros',
              'malibuboats','hubspot','appone','pixelmotion','sitedonerite',
              'geteminleads','rvchat','natureandmerv','ipssolutions',
              'webdb','denvermarine','builderdesigns','vespaoftc',
              'eldoradorv'
            );

             foreach ($vendorKeyword as $VKvalue) {
                $rule_cnt = $this->Rule->find("count", array(
	                'conditions' => array(
		                'Rule.dealer_id' => $key,
		                'Rule.type' => array(
			                $VKvalue.'_open',
			                $VKvalue.'_direct',
			                $VKvalue.'_round-robin'
		                ))));
                //debug($rule_cnt);
                if ($rule_cnt == 0) {
                    $r_data = array(
                        array(
                            'dealer_id' => $key,
                            'type' => $VKvalue.'_open',
                            'active' => 1
                        ),
                        array(
                            'dealer_id' => $key,
                            'type' => $VKvalue.'_direct',
                            'active' => 0
                        ),
                        array(
                            'dealer_id' => $key,
                            'type' => $VKvalue.'_round-robin',
                            'active' => 0
                        )
                    );
                    $this->Rule->create();
                    $this->Rule->saveMany($r_data);
                }
            }

        }
        $this->autoRender = false;
        //debug($rules);
    }


    public function get_holidays($dealer_id){
        $this->loadModel('DealerSetting');

        $lstar = array();
        if(!empty($settings)){
            $lstar = explode(",", $settings['DealerSetting']['value']);
        }
        return $lstar;
    }

    public function get_after_hr_setting($dealer_id,  $settings_type = 'after_hrs_gsm_push'){
        $this->loadModel('DealerSetting');

        if($settings_type == 'after_hrs_gsm_push'){
            $after_hrs_gsm_push = 'Off';
            $settings_hrs = $this->DealerSetting->find('first',
                array('conditions'=>array('DealerSetting.name' => 'after_hrs_gsm_push', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(!empty($settings_hrs)){
                $after_hrs_gsm_push = $settings_hrs['DealerSetting']['value'];
            }
            return $after_hrs_gsm_push;
        }else if($settings_type == 'logged_active_round_robin'){

            $active_round_robin = 'Off';
            $settings_round_robin = $this->DealerSetting->find('first',
                array('conditions'=>array('DealerSetting.name' => 'logged_active_round_robin', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(!empty($settings_round_robin)){
                $active_round_robin = $settings_round_robin['DealerSetting']['value'];
            }
            return $active_round_robin;
        }
    }

    /* get users queue if  Logged In - Active Round Robin is "No" */
    public function round_robin_user_queue($dealer_id){
        $this->loadModel('User');
        $not_received_user = $this->User->find('first',array("recursive"=>-1, 'order'=>array('User.last_receive ASC'),
            'fields'=>array('User.id','User.full_name', 'User.username','User.first_name','User.last_name','User.zone','last_receive'),
            'conditions'=>array(
                'User.round_robin' => 1,
                'User.active' => 1,
                'User.dealer_id'=> $dealer_id
            )
        ));
        return $not_received_user;
    }

    public function create_roundrobin_cats(){
        $dealer_id = '1830';
        $srvs = array(
             'Dealer Spike',
             'Trader Media',
             'Engage To Sell',
             'Contact At Once',
             'Costco',
             'Boats and Cycles',
             'ChopperExchange',
             'RVUSA',
             'Ebizautos',
             'Marine Connection',
             'Powersports Marketing',
             'Redzia RV',
             'Endeavor'
        );
        debug($srvs);

        $this->loadModel("RoundrobinCategory");
        foreach($srvs as $srv){

            $srv_count = $this->RoundrobinCategory->find('count', array('conditions' => array('RoundrobinCategory.service'=>$srv,'RoundrobinCategory.dealer_id'=>$dealer_id)));
            debug($srv_count);
            if($srv_count == 0){

                $this->RoundrobinCategory->create();
                $this->RoundrobinCategory->save(array(
                    'RoundrobinCategory' => array(
                        'service' => $srv,
                        'dealer_id' => $dealer_id,
                        'category_name' => 'Motorized',
                        'body_types' => "Class A,Class B,Class C,Motorhome",
                    )
                ));

                $this->RoundrobinCategory->create();
                $this->RoundrobinCategory->save(array(
                    'RoundrobinCategory' => array(
                        'service' => $srv,
                        'dealer_id' => $dealer_id,
                        'category_name' => 'Towable',
                        'body_types' => "All",
                    )
                ));

                $this->RoundrobinCategory->create();
                $this->RoundrobinCategory->save(array(
                    'RoundrobinCategory' => array(
                        'service' => $srv,
                        'dealer_id' => $dealer_id,
                        'category_name' => 'Default',
                    )
                ));
            }

        }

    }

    public function round_robin_category_data($current_hour, $dealer_id, $after_hr, $logged_active_round_robin, $service){

        date_default_timezone_set( $this->Auth->User('zone') );

        $this->loadModel("RoundrobinCategory");
        $this->loadModel("RoundrobinCategoryUser");


        $r_categories = $this->RoundrobinCategory->find('all', array('recursive'=>-1, 'conditions' => array(
          'RoundrobinCategory.service'=>$service,'RoundrobinCategory.dealer_id'=>$dealer_id)));

        $ret_data = array();
        foreach($r_categories as $rcats){
            $this->RoundrobinCategoryUser->bindModel(array(
                'belongsTo'=>array('User'=>array('fields'=>array('User.id','User.first_name','User.last_name','User.last_login', 'User.last_receive'))),
            ));
            $r_usrs = $this->RoundrobinCategoryUser->find('all', array('order'=> 'RoundrobinCategoryUser.id ASC',  'conditions' => array('RoundrobinCategoryUser.roundrobin_category_id'=>$rcats['RoundrobinCategory']['id'])));
            //debug($r_usrs);

            $ruser_ar = array();
            foreach($r_usrs as $rs){
                $ruser_ar [] =  SET::merge($rs['RoundrobinCategoryUser'], array('User' => $rs['User'] ) );
            }

            $this->RoundrobinCategoryUser->bindModel(array(
                'belongsTo'=>array('User'=>array('fields'=>array('User.id','User.first_name','User.last_name','User.last_login', 'User.last_receive'))),
            ));
            $next_receive =  $this->RoundrobinCategoryUser->find('first', array('order'=> array('RoundrobinCategoryUser.last_receive ASC', 'RoundrobinCategoryUser.id ASC'  ),  'conditions' => array('RoundrobinCategoryUser.roundrobin_category_id'=>$rcats['RoundrobinCategory']['id'])));


            $ret_data[] = SET::merge(array('next_receive' => $next_receive, 'RoundrobinCategory' => $rcats['RoundrobinCategory']), array('RoundrobinCategoryUser' =>  $ruser_ar) );
        }
        return $ret_data;
    }

    public function roundrobin_user_add($roundrobin_cat_id = null, $user_id = null) {

        $this->loadModel("RoundrobinCategoryUser");
        $this->RoundrobinCategoryUser->create();
        $this->RoundrobinCategoryUser->save(array('RoundrobinCategoryUser'=>array(
            'user_id'=>$user_id,
            'roundrobin_category_id' => $roundrobin_cat_id
        )));

        $this->Session->setFlash(__('User added'), 'alert'); //print_r($this->request->data); exit;
        $this->redirect(array('action' => 'index'));

    }
    public function roundrobin_user_delete($user_id = null) {

        // $this->loadModel("RoundrobinCategoryUser");
        // $this->RoundrobinCategoryUser->id = $roundrobin_user_id;
        // $this->RoundrobinCategoryUser->delete();

        // $this->Session->setFlash(__('User removed'), 'alert'); //print_r($this->request->data); exit;
        // $this->redirect(array('action' => 'index'));


        $this->loadModel("RoundRobinUser");
        $this->RoundRobinUser->id = $user_id;
        $this->RoundRobinUser->delete();

        // $this->Session->setFlash(__('User removed'), 'alert'); //print_r($this->request->data); exit;
        $this->redirect(array('action' => 'index'));



    }






    public function queue_next_receive(
        $current_hour,
        $model,
        $model_name,
        $dealer_id,
        $after_hr,
        $logged_active_round_robin){

        date_default_timezone_set( $this->Auth->User('zone') );
        $current_day = date('N');
        //debug($current_day);
        $holidays =  $this->get_holidays($dealer_id);


        $return = array();

        if($logged_active_round_robin == 'On'){
            $model->bindModel(array('belongsTo'=>array('User')));
            $weblead_queue = $model->find('all',array('order'=>array( $model_name.'.last_login DESC'),'conditions'=>array(
                $model_name.'.dealer_id'=> $dealer_id,
                'User.active' => 1,
                'User.group_id' => array('3', '4', '10', '11', '6', '2', '12', '8', '13')
            )));
        }else{
            $weblead_queue = $this->User->find('all',array("recursive"=>-1, 'order'=>array('User.last_receive ASC'),
                'fields'=>array('User.id','User.username','User.first_name','User.last_name','User.dealer_id','User.last_login','User.zone','last_receive'),
                'conditions'=>array(
                    'User.round_robin' => 1,
                    'User.active' => 1,
                    'User.dealer_id'=> $dealer_id
                )
            ));
        }
        $return['weblead_queue'] =  $weblead_queue;

        if(  ($after_hr == 'Off') ||  ($current_hour > 8 && $current_hour < 19 && !in_array($current_day, $holidays) )   ){

            /* get users queue if  Logged In - Active Round Robin is "Yes" */
            if($logged_active_round_robin == 'On'){


                $model->bindModel(array('belongsTo'=>array('User')));
                $receive_user = $model->find('first',array('order'=>array($model_name.'.last_login DESC'),'conditions'=>array(
                    $model_name.'.last_receive'=> null,
                    $model_name.'.dealer_id'=> $dealer_id,
                    'User.round_robin' => 1,
                    'User.active' => 1,
                    'User.group_id' => array('3', '4', '10', '11', '6', '2', '12', '8', '13')
                )));

                if(empty($receive_user)){
                    $model->bindModel(array('belongsTo'=>array('User')));
                    $receive_user = $model->find('first',array('order'=>array($model_name.'.last_receive ASC'),'conditions'=>array(
                        $model_name.'.last_receive <>'=> null,
                        $model_name.'.dealer_id'=> $dealer_id,
                        'User.round_robin' => 1,
                        'User.active' => 1,
                        'User.group_id' => array('3', '4', '10', '11', '6', '2', '12', '8', '13')
                    )));
                }


                $next_receive = $this->User->find('first',array('recursive'=>-1,'conditions' =>array( 'User.group_id' => array('3', '4', '10', '11', '6', '2', '12', '8', '13'), 'User.active' => 1, 'User.id'=>$receive_user[$model_name]['user_id']),'fields'=> array('User.*' )));
                $return['next_receive'] = $next_receive;

            }else{
                $next_receive = $this->round_robin_user_queue($dealer_id);
                $return['next_receive'] = $next_receive;
            }


        }else{
            //After Hour
            $userInfo = $this->User->find('first',array('recursive'=>-1, 'order'=>array('User.group_id DESC'),  'conditions'=>array('User.active'=>1,'User.group_id'=>array('2','12'),'User.dealer_id'=>$dealer_id), 'fields'=> array('User.*' )));
            $return['next_receive'] = $userInfo;
        }

        return $return;
    }



    public function index(){

        $this->loadModel('DealerSetting');

        $this->layout = "default_new";
        $current_user_id = $this->Auth->User('id');
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
        $this->set('dealer_id',$dealer_id);

        date_default_timezone_set( $this->Auth->User('zone') );
        $current_hour = date("G");
        //$current_hour = 5;

        $holidays =  $this->get_holidays($dealer_id);
        $current_day = date('N');

        //Depricated, can be removed ~ASR
        //$round_robin_category = $this->DealerSetting->get_settings('round_robin_category', $dealer_id );
        //$this->set('round_robin_category', $round_robin_category);

        $RulesRoundrobinNovehicle_user_id = "";
        $this->loadModel('RulesRoundrobinNovehicle');
        $RulesRoundrobinNovehicle = $this->RulesRoundrobinNovehicle->find('first',array('conditions'=>array('RulesRoundrobinNovehicle.dealer_id'=>$dealer_id)));
        if(!empty($RulesRoundrobinNovehicle)){
            $RulesRoundrobinNovehicle_user_id = $RulesRoundrobinNovehicle['RulesRoundrobinNovehicle']['user_id'];
        }
        $this->set('RulesRoundrobinNovehicle_user_id', $RulesRoundrobinNovehicle_user_id);

        $logged_active_round_robin = $this->get_after_hr_setting($dealer_id, 'logged_active_round_robin');
        $this->set('logged_active_round_robin', $logged_active_round_robin);
        $after_hr = $this->get_after_hr_setting($dealer_id);

        //debug($dealer_id);
        $users = $this->User->find("list",array(
	        'order' => 'User.first_name',
	        'conditions' => array(
		        'User.active' => 1,
		        'User.dealer_id' => $dealer_id,
		        'User.group_id' => array(2, 3,4, 6, 12, 10)
	        )));
        //debug($users);

        $this->set('users', $users);

        $rules = $this->Rule->find("list",array('conditions' => array('Rule.dealer_id'=>$dealer_id,'Rule.type'=>array('open','direct','round-robin')), 'fields' => array('Rule.type','Rule.active')));
        //debug($rules);
        $this->set('rules', $rules);

        $round_robin_users = $this->User->find("all",array('order'=>array("User.first_name ASC"), 'recursive'=>-1,'conditions' => array('User.active' => 1,  'User.dealer_id' => $dealer_id,  'User.group_id' => array('3','4','10', '11', '6', '2', '12', '8', '13'))));
        //debug($round_robin_users);
        $this->set('round_robin_users', $round_robin_users);

        $round_robin_active_users = array();
        foreach($round_robin_users as $usr){
            if($usr['User']['round_robin']){
                $round_robin_active_users[ $usr['User']['id'] ]    = $usr['User']['first_name']." ".$usr['User']['last_name'];
            }
        }
        $this->set('round_robin_active_users', $round_robin_active_users);


        $all_active_users = $this->User->find("list",array('order' => 'User.first_name', 'conditions' => array('User.active' => 1, 'User.dealer_id' => $dealer_id )));
        //debug($all_active_users);
        $this->set('all_active_users', $all_active_users);


        $this->loadModel('WebleadQueue');
        //Round Robin queue list and next receive
        $weblead_queue = array();
        if($rules['round-robin'] == true){

            $WebleadQueue_return = $this->queue_next_receive($current_hour,$this->WebleadQueue, 'WebleadQueue', $dealer_id, $after_hr,$logged_active_round_robin);
            $this->set('weblead_queue', $WebleadQueue_return['weblead_queue']);
            $this->set('next_receive', $WebleadQueue_return['next_receive']);
        }


        //Starting new lead rule filters for DS
         //Generates lists from different tables called in as args
        function get_filter_lists($model_class,$table_name,$fields,$conditions,$find_type = 'list',$order=null){
          $values_ary = $model_class->find(
            $find_type,
            array(
              'fields' => $fields,
              'order' => (!empty($order) && is_array($order)) ? $order : $fields[0],
              'conditions' => $conditions
            )
          );
          return $values_ary;
        };

        //Load Models
        //  Commenting out to revert to legacy method while fixing issues in new method
        $this->loadModel('Category');
        $this->loadModel('RoundrobinLocation');
        $this->loadModel('XmlInventory');
        $this->loadModel("RoundRobinUser");  //Load the model Class

        $advanced_round_robin_dealer_setting = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'advanced_round_robin_rules', 'DealerSetting.dealer_id' => $dealer_id)));
        $this->set('advanced_round_robin_dealer_setting', $advanced_round_robin_dealer_setting);

        //Declare scope on some variables
        $d_types = $this->Auth->User("d_type");

        $d_type_ary = array();
        $type_ary = array();
        $make_ary = array();
        $locations_ary = array();
        $conditions_ary = array();
        $categories_ary = array();
        $contact_type_ar = array();

        $this->LoadModel("RoundRobinFilter");
        $RoundRobinFilters = $this->RoundRobinFilter->find('list', array("fields" => array("RoundRobinFilter.id","RoundRobinFilter.filter" ), 'conditions' => array("RoundRobinFilter.active" => 1, "RoundRobinFilter.dealer_id" => $dealer_id )));

        foreach($RoundRobinFilters as $RoundRobinFilter ) {

            if($RoundRobinFilter == 'D Type') {
                $d_type_ary = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
            }

            if($RoundRobinFilter == 'Type') {
                $type_ary_d_type = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
                $type_ary = $this->Category->find("list", array('conditions' => array('Category.d_type' =>  $type_ary_d_type), "fields"=>array('Category.body_sub_type','Category.body_sub_type'),'order' => "Category.body_sub_type" ));
                $categories_instock_a = $this->XmlInventory->find("list",array("order"=>array("XmlInventory.bodysubtype"),"fields" => array('XmlInventory.bodysubtype','XmlInventory.bodysubtype'),"conditions" => array('XmlInventory.bodysubtype is not null',   'XmlInventory.bodysubtype <>' => '',  'XmlInventory.dealerid'=>$dealer_id)));

                foreach($categories_instock_a as $key => $value ){
                    $type_ary[ $key ] = $value;
                }
                asort($type_ary);

                //Categories from contacts able
                $vendors_names = array(
                    'Dealer Spike' => 'DSpike',
                    'Ecarlist.com' => 'ecarlist',
                    'Engage To Sell' => 'EnToSell',
                    'rvt' => 'RVT.com',
                    'Trader Media' => 'TraderMedia'
                );
                foreach($vendors_names as $key => $value){
                    $ctn_types  = $this->Contact->find("list",array("order"=>array("Contact.type"),"fields" => array('Contact.type','Contact.type'),"conditions" => array('Contact.company_id' => $dealer_id,   'Contact.ref_num' => $value, 'Contact.type <>' => array('', 'Any Category') )));
                    $contact_type_ar[ $key ] = array_keys($ctn_types);
                }
            }

            if($RoundRobinFilter == 'Make') {
                $make_ary = $this->Contact->getMakeList($dealer_id);
            }

            if($RoundRobinFilter == 'Condition' ) {
                $conditions_ary = array("New" => "New", 'Used' => 'Used');
            }

            if($RoundRobinFilter == 'Location' ) {
                $locations_ary = get_filter_lists($this->RoundrobinLocation,'RoundrobinLocation',array('RoundrobinLocation.location','RoundrobinLocation.location'),array('dealer_id'=>$dealer_id),$find_type = 'list');
            }

            if($RoundRobinFilter == 'Source' ) {
                $sources_ary = $this->Contact->find('list',array(
                    'fields' => array('Contact.source','Contact.source'),
                    'conditions' => array('Contact.company_id'=>$dealer_id),
                    'order' => array('Contact.source')
                ));
            }

            if($RoundRobinFilter == 'Category' ) {
                $categories_ary = get_filter_lists($this->Category,'Category',array('Category.body_type','Category.body_type'),array('d_type'=>$d_types),$find_type = 'list');
                $categories_instock = $this->XmlInventory->find("list",array("fields" => array('XmlInventory.bodysubtype','XmlInventory.bodysubtype'),"conditions" => array('XmlInventory.bodysubtype is not null',   'XmlInventory.bodysubtype <>'  => '',  'XmlInventory.dealerid'=>$dealer_id)));

                $categories_instock_tmp = $categories_instock;

                foreach($categories_instock_tmp as $in_tmp){
                    if(!isset($categories_ary[ $in_tmp ])){
                        $categories_ary[$in_tmp] = $in_tmp;
                    }
                }
            }
        }
        //Set Users Ary
        $users_ary = get_filter_lists($this->User,'User',array('User.id','User.full_name'),array('dealer_id'=>$dealer_id,'User.active'=>'1'),$find_type = 'list',array('User.first_name','User.last_name'));
        $users_ary = array_map('ucfirst',$users_ary);
        //Set our view vars
        $this->set('rr_ds_users_list',$users_ary);
        $this->set('rr_ds_locations_list',$locations_ary);
        $this->set('rr_ds_conditions_list',$conditions_ary);
        $this->set('rr_ds_categories_list',$categories_ary);
        $this->set('rr_ds_sources_list',$sources_ary);

        $this->set('rr_ds_d_type_list', $d_type_ary);
        $this->set('rr_ds_type_list', $type_ary);
        $this->set('rr_ds_make_list', $make_ary);
        $this->set('rr_contact_type_ar', $contact_type_ar);
        // debug($contact_categories_ar);

        //Set User Data to pass to the view

        //Round Robin Filter Groups
        $this->LoadModel("RoundRobinGroup");
        $round_robin_groups = $this->RoundRobinGroup->find('all', array('conditions' => array("RoundRobinGroup.dealer_id" => $dealer_id )));

        $round_robin_group_ids = array();
        $round_robin_group_vendor = array();

        foreach($round_robin_groups as $round_robin_group){
            $round_robin_group_ids[] = $round_robin_group['RoundRobinGroup']['id'];
            $round_robin_group_vendor[ $round_robin_group['RoundRobinGroup']['vendor_name'] ][] = $round_robin_group;
        }
        $this->set('round_robin_group_vendor',$round_robin_group_vendor);


        //Round Robin round robin users
        $this->LoadModel("RoundRobinUser");
        $this->RoundRobinUser->bindModel(array(
            'belongsTo'=>array('User'=>array("fields" => array("User.id","User.first_name","User.last_name"))),
        ));
        $round_robin_group_users = $this->RoundRobinUser->find('all', array("order" => array("RoundRobinUser.round_robin_group_id", "User.first_name"), 'conditions' => array("RoundRobinUser.round_robin_group_id" => $round_robin_group_ids, "User.active" => "1" )));
        $this->set('round_robin_group_users',$round_robin_group_users);
        // debug($round_robin_group_users);


    //End of the new section.

        //Round robin category 'Dealer Spike'
        $dealer_spike_round_data = array();
        $dealer_spike_round_location_list = array();
        $dealer_spike_round_loc_cond_rules = array();
        if($round_robin_category == 'On'){

            //Location List
            $this->loadModel("RoundrobinLocation");
            $dealer_spike_round_location_list = $this->RoundrobinLocation->find('list', array('order'=>array('RoundrobinLocation.default_location DESC', 'RoundrobinLocation.location ASC'),'conditions' => array('RoundrobinLocation.dealer_id'=>$dealer_id), 'fields'=>array('RoundrobinLocation.location','RoundrobinLocation.location') ));
            //Location Rules
            $this->loadModel("RoundrobinNewusedRule");
            $this->RoundrobinNewusedRule->bindModel(array(
                'belongsTo'=>array('User'=>array("fields"=>array('User.full_name'))),
            ));
            $dealer_spike_round_loc_cond_rules = $this->RoundrobinNewusedRule->find('all', array('order'=>array('RoundrobinNewusedRule.round_robin_location'),'conditions' => array('RoundrobinNewusedRule.dealer_id'=>$dealer_id)));

            $dealer_spike_round_data = $this->round_robin_category_data(
                $current_hour,
                $dealer_id,
                $after_hr,
                $logged_active_round_robin,
                'Dealer Spike'
            );
        }
        //debug( $dealer_spike_round_loc_cond_rules );

        $this->set('dealer_spike_round_data', $dealer_spike_round_data);
        $this->set('dealer_spike_round_location_list', $dealer_spike_round_location_list);
        $this->set('dealer_spike_round_loc_cond_rules', $dealer_spike_round_loc_cond_rules);


        ///boats cycles rules set

        $boatscycles_rules = $this->Rule->find("list",array('conditions' =>
            array('Rule.dealer_id'=>$dealer_id,'Rule.type'=>array('boatsCycles_open','boatsCycles_direct','boatsCycles_round-robin','boatsCycles_call_center')), 'fields' => array('Rule.type','Rule.active')));
        //debug($trader_rules);
        $this->set('boatscycles_rules', $boatscycles_rules);

        //Boats Cycles Round Robin queue list and next receive
        $boatscycles_weblead_queue = array();
        if($boatscycles_rules['boatsCycles_round-robin'] == true){
            //$this->loadModel('BoatscyclesWebleadQueue');
            $BoatscyclesWebleadQueue_return = $this->queue_next_receive($current_hour,$this->WebleadQueue, 'WebleadQueue', $dealer_id, $after_hr,$logged_active_round_robin);
            $this->set('boatscycles_weblead_queue', $BoatscyclesWebleadQueue_return['weblead_queue']);
            $this->set('boatscycles_next_receive', $BoatscyclesWebleadQueue_return['next_receive']);
        }

        //Round robin category 'Boats and Cycles'
        $boats_and_cycle_round_data = array();
        if($round_robin_category == 'On'){
            $boats_and_cycle_round_data = $this->round_robin_category_data(
                $current_hour,
                $dealer_id,
                $after_hr,
                $logged_active_round_robin,
                'Boats and Cycles'
            );
        }
        //debug( $boats_and_cycle_round_data );
        $this->set('boats_and_cycle_round_data', $boats_and_cycle_round_data);

        //Auto Sweet web lead rules set
        $auto_sweet_rules = $this->Rule->find("list",array('conditions' =>
            array('Rule.dealer_id'=>$dealer_id,'Rule.type'=>array('auto_sweet_open','auto_sweet_direct','auto_sweet_round-robin')), 'fields' => array('Rule.type','Rule.active')));
        // debug($auto_sweet_rules);
        $this->set('auto_sweet_rules', $auto_sweet_rules);

        //carsale Round Robin queue list and next receive
        $auto_sweet_weblead_queue = array();
        if($auto_sweet_rules['auto_sweet_round-robin'] == true){

            $AutoSweetWebleadQueue_return = $this->queue_next_receive(
                $current_hour,
                $this->WebleadQueue,
                'WebleadQueue',
                $dealer_id,
                $after_hr,
                $logged_active_round_robin);
            $this->set('auto_sweet_weblead_queue', $AutoSweetWebleadQueue_return['weblead_queue']);
            $this->set('auto_sweet_next_receive', $AutoSweetWebleadQueue_return['next_receive']);
        }
        //Round robin category 'auto_sweet'
        $auto_sweet_round_data = array();
        if($round_robin_category == 'On'){
            $auto_sweet_round_data = $this->round_robin_category_data(
                $current_hour,
                $dealer_id,
                $after_hr,
                $logged_active_round_robin,
                'auto_sweet'
            );
        }

        $this->set('auto_sweet_round_data', $auto_sweet_round_data);

///////---------------------------
			/////The Loop for setting web lead rules [START]
	    // With the use of public REFNUM_LIST
	    foreach($this->REFNUM_LIST as $rn){
				// refnum web lead rules set
		    ${$rn.'_rules'} = $this->Rule->find("list",array('conditions' =>
		      array('Rule.dealer_id'=>$dealer_id,'Rule.type'=>array(
		        $rn.'_open',
			      $rn.'_direct',
			      $rn.'_round-robin'
		      )), 'fields' => array(
		        'Rule.type',
		        'Rule.active'
		    )));
		    //debug($trader_rules);
		    $this->set($rn.'_rules', ${$rn.'_rules'});

		    //refnum Round Robin queue list and next receive
		    ${$rn .'_weblead_queue'} = array();
		    if(${$rn.'_rules'}[$rn.'_round-robin'] == true){

		      ${ucfirst($rn) .'WebleadQueue_return'} = $this->queue_next_receive($current_hour,$this->WebleadQueue, 'WebleadQueue', $dealer_id, $after_hr,$logged_active_round_robin);
		      $this->set($rn.'_weblead_queue', ${ucfirst($rn) .'WebleadQueue_return'}['weblead_queue']);
		      $this->set($rn.'_next_receive', ${ucfirst($rn) .'WebleadQueue_return'}['next_receive']);
		    }
		    //Round robin category 'refnum'
		    ${$rn .'_round_data'} = array();
		    if($round_robin_category == 'On'){
		      ${$rn .'_round_data'} = $this->round_robin_category_data(
		        $current_hour,
		        $dealer_id,
		        $after_hr,
		        $logged_active_round_robin,
		        ucfirst($rn)
		      );
		    }
		    $this->set($rn.'_round_data', ${$rn .'_round_data'});
	    }
	    /////The Loop for setting web lead rules [END]
//////--------------



        if ($this->request->is('post')) {

            $this->Rule->updateAll(
                array('active' => 0, 'user_id' => null),
                array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>array('open','direct','round-robin') )
            );

            if(isset($this->request->data['Contact']['direct']) && $this->request->data['Contact']['users_id'] != '' ){
                $this->Rule->updateAll( array('active' => 1,'user_id'=>$this->request->data['Contact']['users_id']),array('Rule.dealer_id' => $dealer_id,'Rule.type'=>'direct'));
                //$this->User->updateAll( array('round_robin' => 0),array('User.group_id'=>3));
            }
            if(isset($this->request->data['Contact']['open'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'open'));
                //$this->User->updateAll( array('round_robin' => 0),array('User.group_id'=>3));
            }
            if(isset($this->request->data['Contact']['round-robin'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'round-robin'));
                //$this->User->updateAll( array('round_robin' => 1),array('User.group_id'=>3));
            }
            $this->Session->setFlash(__('Rule saved'), 'alert'); //print_r($this->request->data); exit;
            $this->redirect(array('action' => 'index'));
        }else{
            $rule_direct = $this->Rule->find("first",array('conditions' => array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'direct')));
            $this->set('rule_direct', $rule_direct);
            //debug($rule_direct);


	        /*
	         * Loop for finding direct rules, and setting variables for the view. (Coo-Coo)
	         */
            foreach($this->REFNUM_LIST as $rn) {

              ${$rn . '_rule_direct'} = $this->Rule->find("first",array(
                'conditions' => array(
                  'Rule.dealer_id' => $dealer_id,
                  'Rule.type'=>$rn . '_direct'
                )));
               $this->set($rn . '_rule_direct', ${$rn . '_rule_direct'});

            }
	        //////Boats Cycles rules
	                    $boatscycles_rule_direct = $this->Rule->find("first",array('conditions' => array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'boatsCycles_direct')));
	                    $this->set('boatscycles_rule_direct', $boatscycles_rule_direct);

	         ///// Auto_Sweet direct rule
               $auto_sweet_rule_direct = $this->Rule->find("first",array('conditions' => array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'auto_sweet_direct')));
               $this->set('auto_sweet_rule_direct', $auto_sweet_rule_direct);

        }
    }






         /// save rule for Boats Cycles
        public function save_boatscycles_rule(){

        $current_user_id = $this->Auth->User('id');
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

        if ($this->request->is('post')) {

            //debug($this->request->data);
            $this->Rule->updateAll(
                array('active' => 0, 'user_id' => null),
                array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>array('boatsCycles_call_center', 'boatsCycles_open','boatsCycles_direct','boatsCycles_round-robin'))
            );

            if(isset($this->request->data['Contact']['boatsCycles_call_center'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'boatsCycles_call_center'));
            }
            if(isset($this->request->data['Contact']['boatsCycles_direct']) && $this->request->data['Contact']['boatsCycles_users_id'] != '' ){
                $this->Rule->updateAll( array('active' => 1,'user_id'=>$this->request->data['Contact']['boatsCycles_users_id']),array('Rule.dealer_id' => $dealer_id,'Rule.type'=>'boatsCycles_direct'));
            }
            if(isset($this->request->data['Contact']['boatsCycles_open'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'boatsCycles_open'));
            }
               if(isset($this->request->data['Contact']['boatsCycles_round-robin'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'boatsCycles_round-robin'));
            }
            $this->Session->setFlash(__('Boats and Cycles web Rule saved'), 'alert'); //print_r($this->request->data); exit;
            $this->redirect(array('action' => 'index'));
        }

    }



    /*   [DO NOT DELETE THIS SECTION AND RULES1.CTP!!! - It's the new way to reach for the result]
     *    save rule for refnum received
     *    rule1 element in views sends coordinates to this method
     *  , resulting noNeed in save_[refnum]_rule method creation and modification for each Parser that we have.
     */
    	public function save_refnum_rule($refnum = 'nothing'){

          if ($refnum == 'nothing'){
              echo ('No refnum received, cannot proceed.');
              return false;
          }

    		$dealer_id = $this->Auth->user('dealer_id');

    			if ($this->request->is('post')) {

    				//debug($this->request->data);
    				$this->Rule->updateAll(
    					array(
    						'active' => 0,
    						'user_id' => null
    					),array(
    						'Rule.dealer_id' => $dealer_id,
    						'Rule.type'=>array(
							    strtolower($refnum) . '_open',
							    strtolower($refnum) . '_direct',
							    strtolower($refnum) . '_round-robin'
    						)));
    				if(isset($this->request->data['Contact'][strtolower($refnum) . '_direct'])
    					&& $this->request->data['Contact'][strtolower($refnum) . '_users_id'] != '' ){
    					$this->Rule->updateAll( array(
    						'active' => 1,
    						'user_id'=>$this->request->data['Contact'][strtolower($refnum) . '_users_id']
    					),array(
    						'Rule.dealer_id' => $dealer_id,
    						'Rule.type'=>strtolower($refnum) . '_direct'
    					));
    				}
    				if(isset($this->request->data['Contact'][strtolower($refnum) . '_open'])){
    					$this->Rule->updateAll( array(
    						'active' => 1
    					),array(
    						'Rule.dealer_id' => $dealer_id,
    						'Rule.type'=>strtolower($refnum) . '_open'
    					));
    				}
    				if(isset($this->request->data['Contact'][strtolower($refnum) . '_round-robin'])){
    					$this->Rule->updateAll( array(
    						'active' => 1
    					),array(
    						'Rule.dealer_id' => $dealer_id,
    						'Rule.type'=>strtolower($refnum) . '_round-robin'
    					));
    				}
    				$this->Session->setFlash(__(ucfirst($refnum) .'.com web Rule saved'), 'alert');
    				//print_r($this->request->data); exit;
    				$this->redirect(array('action' => 'index'));
    			}

    		}
    /// save rule for carsale (autosweet)
    public function save_auto_sweet_rule(){

        $current_user_id = $this->Auth->User('id');
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');

        if ($this->request->is('post')) {

            //debug($this->request->data);
            $this->Rule->updateAll(
                array('active' => 0, 'user_id' => null),
                array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>array('auto_sweet_open','auto_sweet_direct','auto_sweet_round-robin')));
            if(isset($this->request->data['Contact']['auto_sweet_direct']) && $this->request->data['Contact']['auto_sweet_users_id'] != '' ){
                debug("update auto sweet");
                $this->Rule->updateAll( array('active' => 1,'user_id'=>$this->request->data['Contact']['auto_sweet_users_id']),array('Rule.dealer_id' => $dealer_id,'Rule.type'=>'auto_sweet_direct'));
            }
            if(isset($this->request->data['Contact']['auto_sweet_open'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'auto_sweet_open'));
            }
            if(isset($this->request->data['Contact']['auto_sweet_round-robin'])){
                $this->Rule->updateAll( array('active' => 1),array('Rule.dealer_id' => $dealer_id, 'Rule.type'=>'auto_sweet_round-robin'));
            }
            $this->Session->setFlash(__('Auto Sweet web Rule saved'), 'alert'); //print_r($this->request->data); exit;
            $this->redirect(array('action' => 'index'));
        }

    }


    public function roundrobin_no_vehicle(){

        if ($this->request->is('post')) {
            $user_id = $this->request->data['usrid'];
            $dealer_id = $this->Auth->User('dealer_id');

            $this->loadModel('RulesRoundrobinNovehicle');
            $userInfo = $this->RulesRoundrobinNovehicle->find('first',array('conditions'=>array('RulesRoundrobinNovehicle.dealer_id'=>$dealer_id)));

            if(empty($userInfo)){
                $this->RulesRoundrobinNovehicle->create();
                $this->RulesRoundrobinNovehicle->save(array('RulesRoundrobinNovehicle' => array(
                    'user_id' =>  $user_id,
                    'dealer_id' =>  $dealer_id,
                )));
            }else{
                $this->RulesRoundrobinNovehicle->save(array('RulesRoundrobinNovehicle' => array(
                    'id' =>  $userInfo['RulesRoundrobinNovehicle']['id'],
                    'user_id' =>  $user_id,
                    'dealer_id' =>  $dealer_id,
                )));
            }
        }
        $this->autoRender =  false;
    }


    public function roundrobin_loc_cond_delete($rule_id = null){
        $this->loadModel('RoundrobinNewusedRule');
        $this->RoundrobinNewusedRule->id = $rule_id;
        $this->RoundrobinNewusedRule->delete();
        $this->redirect(array('action' => 'index'));
    }

    //New Round Robin Rule Set
    public function round_robin_user_delete($rule_id = null){
        $this->loadModel('RoundRobinUser');
        $this->RoundRobinUser->id = $rule_id;
        $this->RoundRobinUser->delete();
        $this->redirect(array('action' => 'index'));
    }

    public function roundrobin_group_delete($id){

        $this->loadModel('RoundRobinUser');
        $this->RoundRobinUser->deleteAll(array('RoundRobinUser.round_robin_group_id'=>$id));


        //Delete Round Robin Group
        $this->loadModel("RoundRobinGroup");
        $this->RoundRobinGroup->id = $id;
        $this->RoundRobinGroup->delete();

        $this->redirect(array('action' => 'index'));
        $this->autoRender = false;
    }

    public function round_robin_filter_group(){
        if($this->request->is('post')) {

            //debug( $this->request->data );

            $group_data['RoundRobinGroup']['vendor_name'] =  $this->request->data['RoundRobinGroup']['round_robin_filter_group_vendor'];
            $group_data['RoundRobinGroup']['group_name'] =  $this->request->data['RoundRobinGroup']['name_input'];

            $group_data['RoundRobinGroup']['dealer_id'] = $this->Auth->User("dealer_id");

            if($this->request->data['RoundRobinGroup']['round_robin_filter_group_default'] == 'true'){
                $group_data['RoundRobinGroup']['is_default'] =  '1';
            }else{
                $group_data['RoundRobinGroup']['is_default'] =  '0';
            }

            if( !empty($this->request->data['RoundRobinGroup']['location_input']) &&  $this->request->data['RoundRobinGroup']['location_input'] != '' ){
                 $group_data['RoundRobinGroup']['location'] =  $this->request->data['RoundRobinGroup']['location_input'];
            }
            if( !empty($this->request->data['RoundRobinGroup']['condition_input']) &&  $this->request->data['RoundRobinGroup']['condition_input'] != '' ){
                 $group_data['RoundRobinGroup']['condition'] =  $this->request->data['RoundRobinGroup']['condition_input'];
            }
            if( !empty($this->request->data['RoundRobinGroup']['category_input']) &&  $this->request->data['RoundRobinGroup']['category_input'] != '' ){

                $group_data['RoundRobinGroup']['category'] = implode(",", $this->request->data['RoundRobinGroup']['category_input']);

                $this->loadModel('Category');
                $category_id_ary = $this->Category->find('all',array('conditions'=>array('Category.d_type' =>  $this->Auth->User("d_type") ,'Category.body_type'=>$this->request->data['RoundRobinGroup']['category_input'])));
                $cat_id_ar = array();
                if(!empty($category_id_ary)){
                    foreach($category_id_ary as $catar){
                        $cat_id_ar[] = '"'.$catar['Category']['id'] . '"';
                    }
                }
                $group_data['RoundRobinGroup']['category_id'] = implode(",", $cat_id_ar);
            }

            if(!empty($this->request->data['RoundRobinGroup']['vehicle_type_input']) && $this->request->data['RoundRobinGroup']['vehicle_type_input'] != '' ){
                $group_data['RoundRobinGroup']['vehicle_type'] = $this->request->data['RoundRobinGroup']['vehicle_type_input'];
            }

            if(!empty($this->request->data['RoundRobinGroup']['vehicle_make_input']) && $this->request->data['RoundRobinGroup']['vehicle_make_input'] != '' ){
                $group_data['RoundRobinGroup']['vehicle_make'] = $this->request->data['RoundRobinGroup']['vehicle_make_input'];
            }


            if(!empty($this->request->data['RoundRobinGroup']['vehicle_d_type_input']) && $this->request->data['RoundRobinGroup']['vehicle_d_type_input'] != '' ){
                $group_data['RoundRobinGroup']['d_type'] = $this->request->data['RoundRobinGroup']['vehicle_d_type_input'];
            }


            $this->loadModel("RoundRobinGroup");
            $this->RoundRobinGroup->create();
            $this->RoundRobinGroup->save($group_data);
        }

        $this->autoRender = false;
    }

    public function round_robin_add_user(){
        if($this->request->is('post')) {

            debug($this->request->data);

            $round_robin_user_data = array();
            $round_robin_user_data['RoundRobinUser']['user_id'] = $this->request->data['sperson'];
            $round_robin_user_data['RoundRobinUser']['round_robin_group_id'] = $this->request->data['roundrobin_group_id'];
            $round_robin_user_data['RoundRobinUser']['dealer_id'] = $this->Auth->User("dealer_id");

            $this->loadModel('RoundRobinUser');
            $this->RoundRobinUser->create();
            $this->RoundRobinUser->save($round_robin_user_data );





      //   $user_id = (!empty($this->request->data['User']))? $this->request->data['User']:'';
      //   $location = (!empty($this->request->data['Location']))? $this->request->data['Location']:'';
      //   $condition = (!empty($this->request->data['Condition']))? $this->request->data['Condition']:'';
      //   $category = (!empty($this->request->data['Category']))? $this->request->data['Category']:'';
      //   $dealer_id = $this->Auth->User('dealer_id');

      //   //get category_ids from name
      //   $this->loadModel('Category');
      //   $category_id_ary = $this->Category->find('first',array('conditions'=>array('Category.body_sub_type'=>$category)));
      //   $category_id = ($category!='') ? $category_id_ary['Category']['id']:'';

      //   //get last_received
      //   $this->loadModel('User');
      //   $last_receive = $this->User->find('first',array('fields' => array('User.last_receive'),'conditions' => array('User.id'=>$user_id)));

      //   $full_name = $this->User->find('first',array('fields' => array('User.full_name'),'conditions' => array('User.id'=>$user_id)));

      //   $this->loadModel('RoundRobinUser');
      //   $this->RoundRobinUser->create();
      //   $this->RoundRobinUser->save(array(
      //     'RoundRobinUser' => array(
      //       'user_id'=> $user_id,
      //       'full_name'=>$full_name['User']['full_name'],
      //       'location'=> $location,
      //       'condition'=> $condition,
      //       'dealer_id'=> $dealer_id,
      //       'category'=>$category,
      //       'category_id'=>$category_id,
      //       'last_receive'=>$last_receive['User']['last_receive']
      //     )
      //   ));

      }
      $this->autoRender = false;
    }
    //End of new Round Robin Rule set

    public function roundrobin_add_loc_cond(){

        if ($this->request->is('post')) {

            $location_value = $this->request->data['location_value'];
            $sperson_value = $this->request->data['sperson_value'];

            $dealer_id = $this->Auth->User('dealer_id');

            $this->loadModel('RoundrobinNewusedRule');
            $this->RoundrobinNewusedRule->create();
            $this->RoundrobinNewusedRule->save(array('RoundrobinNewusedRule' => array(
                'round_robin_location' =>  $location_value,
                'user_id' =>  $sperson_value,
                'dealer_id' =>  $dealer_id,
            )));

        }
        $this->autoRender =  false;
    }

    public function edit_roundrobingroup($round_robin_groups_id = null) {

        $dealer_id = $this->Auth->user('dealer_id');
        //Declare scope on some variables
        $d_types = $this->Auth->User("d_type");

        $this->LoadModel("RoundRobinGroup");
        $round_robin_groups_data = $this->RoundRobinGroup->find('first', array('conditions' => array('RoundRobinGroup.id' => $round_robin_groups_id ) ));

        $d_type_ary = array();
        $type_ary = array();
        $make_ary = array();
        $locations_ary = array();
        $conditions_ary = array();
        $categories_ary = array();

        $this->loadModel('Category');
        $this->loadModel('XmlInventory');
        $this->loadModel('RoundrobinLocation');
        $this->loadModel("RoundRobinUser");

         //Starting new lead rule filters for DS
         //Generates lists from different tables called in as args
        function get_filter_lists($model_class,$table_name,$fields,$conditions,$find_type = 'list',$order=null){

          $values_ary = $model_class->find(
            $find_type,
            array(
              'fields' => $fields,
              'order' => (!empty($order) && is_array($order)) ? $order : $fields[0],
              'conditions' => $conditions
            )
          );
          debug($values_ary);
          return $values_ary;
        };


        $this->LoadModel("RoundRobinFilter");
        $RoundRobinFilters = $this->RoundRobinFilter->find('list', array("fields" => array("RoundRobinFilter.id","RoundRobinFilter.filter" ), 'conditions' => array("RoundRobinFilter.active" => 1, "RoundRobinFilter.dealer_id" => $dealer_id )));
        foreach($RoundRobinFilters as $RoundRobinFilter ) {
            if($RoundRobinFilter == 'D Type') {
                $d_type_ary = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
            }
            if($RoundRobinFilter == 'Type') {
                $type_ary_d_type = $this->requestAction('dealer_settings/d_type_options/'.$dealer_id );
                $type_ary = $this->Category->find("list", array('conditions' => array('Category.d_type' =>  $type_ary_d_type), "fields"=>array('Category.body_sub_type','Category.body_sub_type'),'order' => "Category.body_sub_type" ));
                $categories_instock_a = $this->XmlInventory->find("list",array("order"=>array("XmlInventory.bodysubtype"),"fields" => array('XmlInventory.bodysubtype','XmlInventory.bodysubtype'),"conditions" => array('XmlInventory.bodysubtype is not null',   'XmlInventory.bodysubtype <>' => '',  'XmlInventory.dealerid'=>$dealer_id)));

                foreach($categories_instock_a as $key => $value ){
                    $type_ary[ $key ] = $value;
                }
                asort($type_ary);
            }
            if($RoundRobinFilter == 'Make') {
                $make_ary = $this->Contact->getMakeList($dealer_id);
            }
            if($RoundRobinFilter == 'Condition' ) {
                $conditions_ary = array("New" => "New", 'Used' => 'Used');
            }
            if($RoundRobinFilter == 'Location' ) {
                $locations_ary = get_filter_lists($this->RoundrobinLocation,'RoundrobinLocation',array('RoundrobinLocation.location','RoundrobinLocation.location'),array('dealer_id'=>$dealer_id),$find_type = 'list');
            }

            if($RoundRobinFilter == 'Source' ) {
                $sources_ary = $this->Contact->find('list',array(
                    'fields' => array('Contact.source','Contact.source'),
                    'conditions' => array('Contact.company_id'=>$dealer_id),
                    'order' => array('Contact.source')
                ));
            }

            if($RoundRobinFilter == 'Category' ) {
                $categories_ary = get_filter_lists($this->Category,'Category',array('Category.body_type','Category.body_type'),array('d_type'=>$d_types),$find_type = 'list');
                $categories_instock = $this->XmlInventory->find("list",array("fields" => array('XmlInventory.bodysubtype','XmlInventory.bodysubtype'),"conditions" => array('XmlInventory.bodysubtype is not null',   'XmlInventory.bodysubtype <>'  => '',  'XmlInventory.dealerid'=>$dealer_id)));

                $categories_instock_tmp = $categories_instock;

                foreach($categories_instock_tmp as $in_tmp){
                    if(!isset($categories_ary[ $in_tmp ])){
                        $categories_ary[$in_tmp] = $in_tmp;
                    }
                }

                //Categories from contacts able
                $vendors_names = array(
                    'Dealer Spike' => 'DSpike',
                    'Ecarlist.com' => 'ecarlist',
                    'Engage To Sell' => 'EnToSell',
                    'rvt' => 'RVT.com',
                    'Trader Media' => 'TraderMedia'
                );
                if( isset($vendors_names[ $round_robin_groups_data['RoundRobinGroup']['vendor_name'] ] )){
                    $ctn_types  = $this->Contact->find("list",array("order"=>array("Contact.type"),"fields" => array('Contact.type','Contact.type'),"conditions" => array('Contact.company_id' => $dealer_id,   'Contact.ref_num' =>  $vendors_names[ $round_robin_groups_data['RoundRobinGroup']['vendor_name'] ] , 'Contact.type <>' => array('', 'Any Category') )));
                    foreach($ctn_types as $key => $value){
                        $categories_ary[ $key ] = $value;
                    }
                }

                asort($categories_ary);

            }
        }

        // //Set our view vars
        $this->set('rr_ds_users_list',$users_ary);
        $this->set('rr_ds_locations_list',$locations_ary);
        $this->set('rr_ds_conditions_list',$conditions_ary);
        $this->set('rr_ds_categories_list',$categories_ary);
        $this->set('rr_ds_sources_list',$sources_ary);

        $this->set('rr_ds_d_type_list', $d_type_ary);
        $this->set('rr_ds_type_list', $type_ary);
        $this->set('rr_ds_make_list', $make_ary);


        $category_options = array();
        foreach($categories_ary as $key=>$value){
            $category_options[] = json_encode($value);
        }
        $this->set('category_options', $category_options);

        $make_options = array();
        foreach($make_ary as $key=>$value){
            if($value == 'Any Make') continue;
            $make_options[] = json_encode($value);
        }
        $this->set('make_options', $make_options);




        $saveSuccess = false;
        // debug( $round_robin_groups_data );
        if ( $this->request->is('post') || $this->request->is('put') ) {


            $this->loadModel('Category');
            $category_id_ary = $this->Category->find('all',array('conditions'=>array('Category.d_type' =>  $this->Auth->User("d_type") ,'Category.body_type'=> explode(",", $this->request->data['RoundRobinGroup']['category']) )));
            $cat_id_ar = array();
            if(!empty($category_id_ary)){
                foreach($category_id_ary as $catar){
                    $cat_id_ar[] = '"'.$catar['Category']['id'] . '"';
                }
            }
            $this->request->data['RoundRobinGroup']['category_id'] = implode(",", $cat_id_ar);
            if($this->RoundRobinGroup->save($this->request->data)){
                $saveSuccess = true;
            }

        }else{
            $this->request->data = $round_robin_groups_data;
        }

        $this->set('saveSuccess', $saveSuccess);

        $this->layout = 'ajax';
    }

}
