<?php
class ManageCacheController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('refresh', 'clear_manager_message_cache','clear_contact_cache', 'clear_vehicle_match_cache','clear_contact_cache');
	}

	public function set_config($cash_dealer_id = null){

		$cache_dealers_1 = array("1225","1280","1226","762","262","759","758","760","761","1370","491","1573","492","1627","1626","1640","560","1632","829","830","1224","881","1235","7005","1406","1715","112","1332","5000","2501","20010","1562","1788","1792","20020","5001","20040","20060","889","896","30000","20080","20090","1963","234","1409","33080","1485","1830","1833","1055","263","739","1289","40013","2070","2071","2079","2080","2081","576");
		// $cache_dealers_1 = array("5000");
		
		if(in_array($cash_dealer_id, $cache_dealers_1)){
			return $Memcache_config = "default_2";
		}else{
			return $Memcache_config = "default";
		}


	}

	public function clear_manager_message_cache($cache_key_top_manager_message = "managermessge", $dealer_id = null){


		$Memcache_config = $this->set_config($dealer_id);
		$cache_config = Cache::config($Memcache_config);
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		Cache::delete($cache_key_top_manager_message, $Memcache_config);

		/*
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings);
		// debug($srv_settings_arr[0]);

		// $cache_config = Cache::config($Memcache_config);
		// $settings = $cache_config['settings'];

		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);
		$key = $settings['prefix'].$cache_key_top_manager_message;
		$memcache->delete($key);
		*/

		$this->autoRender = false;
	}


	public function refresh_main_report_cache_all(){

		// $cache_config = Cache::config($Memcache_config);
		
		// $settings = $cache_config['settings'];
		// $memcache = new Memcache;
		// $memcache->addServer('localhost', $srv_settings_arr[1]);
		

		$this->loadModel('MainreportRefreshTime');
		$ca = $this->MainreportRefreshTime->find('all');
		foreach ($ca as $caches) {
			$cache_key = "main_report_".$caches['MainreportRefreshTime']['dealer_id'];

			$Memcache_config = $this->set_config($caches['MainreportRefreshTime']['dealer_id']);

			Cache::set(array('duration' => '+12 hours'), $Memcache_config);
			Cache::delete($cache_key, $Memcache_config);				
		}

		$this->autoRender = false;

	}

	public function refresh_main_report_cache(){

		$dealer_id = $this->request->query['dealer_id'];
		$Memcache_config = $this->set_config($dealer_id);

		$zone = $this->request->query['zone'];
		date_default_timezone_set($zone);

		$cache_key = "main_report_".$dealer_id;
		Cache::set(array('duration' => '+12 hours'), $Memcache_config);
		Cache::delete($cache_key, $Memcache_config);				

		/*
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings);
		// debug($srv_settings_arr[0]);

		$zone = $this->request->query['zone'];
		date_default_timezone_set($zone);

		$cache_key = "main_report_".$dealer_id;

		//Disable these lines when working in local
		//Delete Memcache
		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);
		$key = $settings['prefix'].$cache_key;
		$memcache->delete($key);
	
		*/

		$this->autoRender = false;

    }

	public function delete_all_cache(){

		$this->loadModel('User');

		$dealers = $this->User->find('all', array('conditions'=>array(
    		'User.dealer_id <>'=>'',
    		//'User.dealer_id'=> array('762')
    	),  'group' => array('User.dealer_id')));

		foreach($dealers as $dealer){
			$this->refresh( $dealer['User']['dealer_id'] );
		}

	}

	public function list_clear_contact_cache($delete = 'no'){

		$this->contact_cache_list('default', $delete);
		$this->contact_cache_list('default_2', $delete);
	}

	public function contact_cache_list($Memcache_config,  $delete = 'no'){


		$this->autoRender = false;

		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings); 

		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);


		$result = "";

		foreach ($memcache->getExtendedStats('slabs') as $slabs) {

			foreach (array_keys($slabs) as $slabId) {
				if (!is_numeric($slabId)) {
					continue;
				}
				foreach ($memcache->getExtendedStats('cachedump', $slabId, 50000) as $stats) {
					if (!is_array($stats)) {
						continue;
					}
					foreach (array_keys($stats) as $key) {
						if (strpos($key, $settings['prefix']."lead_") === 0) {
							if($delete == 'yes'){
								$memcache->delete($key);
							}
							//debug($key);
							$result .= $key."<br>";
						}
					}
				}
			}
		}

		echo "List of contact cache <br>";
		echo $result;



	}

	public function clear_vehicle_match_cache($dealer_id = null){

		$cache_key = $dealer_id."_"."vehicle_match_alert";
		$Memcache_config = $this->set_config($dealer_id);

		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		Cache::delete($cache_key, $Memcache_config);				

		/*
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];

		$memcache = new Memcache;
		$memcache->addServer('localhost', $srv_settings_arr[1]);
		$key = $settings['prefix'].$cache_key;
		$memcache->delete($key);

		*/

		 $this->autoRender = false;
	}


	public function clear_contact_cache($contact_id){

		$this->loadModel("Dealer");
		$cnt_data = $this->Dealer->query("select id, company_id from contacts where id = :contact_id", array("contact_id" => $contact_id ));
		if(!empty($cnt_data)){
			$dealer_id = $cnt_data['0']['contacts']['company_id'];
		}
		// debug($dealer_id);


		$Memcache_config = $this->set_config($dealer_id);
		$cache_key = "lead_".$contact_id;

		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		Cache::delete($cache_key, $Memcache_config);


		/*
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings);
		// debug($srv_settings_arr[0]);


		$cache_key = "lead_".$contact_id;

		//Delete Memcache
		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0] , $srv_settings_arr[1]);
		$key = $settings['prefix'].$cache_key;
		$memcache->delete($key);
		*/
		
		$this->autoRender = false;

	}
	

	public function refresh($dealer_id) {

		$this->autoRender = false;
		$Memcache_config = $this->set_config($dealer_id);

		$dealer_key_name = $dealer_id."_key_list";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		$dealer_key_list = Cache::read($dealer_key_name, $Memcache_config);

		$result = "";
		if(!empty($dealer_key_list)){
			foreach($dealer_key_list as $dealer_kl){
				// debug($dealer_kl);
				Cache::set(array('duration' => '+6 hours'), $Memcache_config);
				Cache::delete($dealer_kl, $Memcache_config);

				$result .= $dealer_kl."<br>";
			}
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::delete($dealer_key_name, $Memcache_config);
		}
		

		/*
		$this->loadModel("CacheKey");
		$cacheKeys = $this->CacheKey->find("all", array('conditions'=>array("dealer_id" => $dealer_id)));
	
		$result = "";		
		foreach($cacheKeys as $cacheKey){
			Cache::set(array('duration' => '+6 hours'), $Memcache_config);
			Cache::delete($cacheKey['CacheKey']['key_name'], $Memcache_config);
			$result .= $cacheKey['CacheKey']['key_name']."<br>";

			$cnt = $this->Contact->query("select count(*) as key_count from cache_keys where key_name = :key_name", array(
    			'key_name' => $cacheKey['CacheKey']['key_name']
    		));
    		if($cnt[0][0]['key_count'] =! 0){
    			$this->Contact->query("delete from cache_keys where key_name = :key_name", array(
    			'key_name' => $cacheKey['CacheKey']['key_name']
    			));
    		}
		}
		*/

		/*
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 

		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);

		$result = "";

		foreach ($memcache->getExtendedStats('slabs') as $slabs) {

			foreach (array_keys($slabs) as $slabId) {
				if (!is_numeric($slabId)) {
					continue;
				}
				foreach ($memcache->getExtendedStats('cachedump', $slabId, 50000) as $stats) {
					if (!is_array($stats)) {
						continue;
					}
					foreach (array_keys($stats) as $key) {
						if (strpos($key, $settings['prefix'].$dealer_id."_") === 0) {
							
							$new_key = str_replace($settings['prefix'], "", $key);
							$result .= $key."<br>";
							// $memcache->delete($key);
							Cache::delete($new_key, $Memcache_config);
						}
					}
				}
			}
		}
		*/

		echo "Follwoing key deleted <br>";
		echo $result;

	}


	public function dealer_cashes($dealer_id){

		$Memcache_config = $this->set_config($dealer_id);

		$this->autoRender = false;
		$result = "";
		
		$dealer_key_name = $dealer_id."_key_list";
		Cache::set(array('duration' => '+6 hours'), $Memcache_config);
		$dealer_key_list = Cache::read($dealer_key_name, $Memcache_config);

		// print_r( $dealer_key_list );
		if(!empty($dealer_key_list)){
			foreach($dealer_key_list as $dealer_kl){
				$result .= $dealer_kl."<br>";
			}
		}


		/*

		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings); 

		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);

		$result = "";

		foreach ($memcache->getExtendedStats('slabs') as $slabs) {

			foreach (array_keys($slabs) as $slabId) {
				if (!is_numeric($slabId)) {
					continue;
				}
				foreach ($memcache->getExtendedStats('cachedump', $slabId, 50000) as $stats) {
					if (!is_array($stats)) {
						continue;
					}
					foreach (array_keys($stats) as $key) {
						//$result .= $key."<br>";
						if (strpos($key, $settings['prefix'].$dealer_id."_") === 0) {
							$result .= $key."<br>";
							//$memcache->delete($key);
						}
					}
				}
			}
		}

		*/

		//echo "Follwoing key deleted <br>";
		echo $result;


	}


	public function get_all_dealer_cache(){

		$this->loadModel('User');

		$dealers = $this->User->find('all', array('conditions'=>array(
    		'User.dealer_id <>'=>'',
    		//'User.dealer_id'=> array('762')
    	),  'group' => array('User.dealer_id')));

		foreach($dealers as $dealer){
			$this->dealer_cashes( $dealer['User']['dealer_id'] );
		}

	}



	public function clear_bdc_cache($cache_key = null, $dealer_id = null){

		$Memcache_config = $this->set_config($dealer_id);
		
		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		$srv_settings_arr =  explode(":", $settings['servers']['0']); 
		// debug($settings); 

		$memcache = new Memcache;
		$memcache->addServer($srv_settings_arr[0], $srv_settings_arr[1]);
		$key = $settings['prefix'].$cache_key;
		$memcache->delete($key);
		$this->autoRender = false;

	}











}

?>