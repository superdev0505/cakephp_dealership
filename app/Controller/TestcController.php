<?php

class TestcController extends AppController {

    public $components = array('RequestHandler');


    public function set_config($cash_dealer_id = null){

		// $cache_dealers_1 = array("1225","1280","1226","762","262","759","758","760","761","1370","491","1573","492","1627","1626","1640","560","1632","829","830","1224","881","1235","7005","1406","1715","112","1332","5000","2501","20010","1562","1788","1792","20020","5001","20040","20060","889","896","30000","20080","20090","1963","234","1409","33080","1485","1830","1833","1055","263","739","1289","40013","2070","2071","2079","2080","2081");
		$cache_dealers_1 = array("5000");
		
		if(in_array($cash_dealer_id, $cache_dealers_1)){
			return $Memcache_config = "default_2";
		}else{
			return $Memcache_config = "default";
		}

	}

    
    public function index($dealer_id = null) {

    	debug( $this->Memcache_config );
		
		$Memcache_config = $this->set_config($dealer_id);

		$this->autoRender = false;

		echo "<pre>";

		$cache_config = Cache::config($Memcache_config);
		$settings = $cache_config['settings'];
		print_r($settings); 
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
						//$result .= $key."<br>";
						// if (strpos($key, $settings['prefix'].$dealer_id."_") === 0) {
							$result .= $key."<br>";
							//$memcache->delete($key);
						// }
					}
				}
			}
		}

		//echo "Follwoing key deleted <br>";
		echo $result;

		echo "</pre>";

            
    }
    
}

?>