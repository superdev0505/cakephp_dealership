<?php 

class XML2Array {

    private static $xml = null;
	private static $encoding = 'UTF-8';

    /**
     * Initialize the root XML node [optional]
     * @param $version
     * @param $encoding
     * @param $format_output
     */
    public static function init($version = '1.0', $encoding = 'UTF-8', $format_output = true) {
        self::$xml = new DOMDocument($version, $encoding);
        self::$xml->formatOutput = $format_output;
		self::$encoding = $encoding;
    }

    /**
     * Convert an XML to Array
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DOMDocument
     */
    public static function &createArray($input_xml) {
        $xml = self::getXMLRoot();
		if(is_string($input_xml)) {
			$parsed = $xml->loadXML($input_xml);
			if(!$parsed) {
				throw new Exception('[XML2Array] Error parsing the XML string.');
			}
		} else {
			if(get_class($input_xml) != 'DOMDocument') {
				throw new Exception('[XML2Array] The input XML object should be of type: DOMDocument.');
			}
			$xml = self::$xml = $input_xml;
		}
		$array[$xml->documentElement->tagName] = self::convert($xml->documentElement);
        self::$xml = null;    // clear the xml node in the class for 2nd time use.
        return $array;
    }

    /**
     * Convert an Array to XML
     * @param mixed $node - XML as a string or as an object of DOMDocument
     * @return mixed
     */
    private static function &convert($node) {
		$output = array();

		switch ($node->nodeType) {
			case XML_CDATA_SECTION_NODE:
				$output = trim($node->textContent);
				break;

			case XML_TEXT_NODE:
				$output = trim($node->textContent);
				break;

			case XML_ELEMENT_NODE:

				// for each child node, call the covert function recursively
				for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
					$child = $node->childNodes->item($i);
					$v = self::convert($child);
					if(isset($child->tagName)) {
						$t = $child->tagName;

						// assume more nodes of same kind are coming
						if(!isset($output[$t])) {
							$output[$t] = array();
						}
						$output[$t][] = $v;
					} else {
						//check if it is not an empty text node
						if($v !== '') {
							$output = $v;
						}
					}
				}

				if(is_array($output)) {
					// if only one node of its kind, assign it directly instead if array($value);
					foreach ($output as $t => $v) {
						if(is_array($v) && count($v)==1) {
							$output[$t] = $v[0];
						}
					}
					if(empty($output)) {
						//for empty nodes
						$output = '';
					}
				}

				// loop through the attributes and collect them
				if($node->attributes->length) {
					$a = array();
					foreach($node->attributes as $attrName => $attrNode) {
						$a[$attrName] = (string) $attrNode->value;
					}
					// if its an leaf node, store the value in @value instead of directly storing it.
					if(!is_array($output)) {
						$output = array('value' => $output);
					}
					$output['attributes'] = $a;
				}
				break;
		}
		return $output;
    }

    /*
     * Get the root XML node, if there isn't one, create it.
     */
    private static function getXMLRoot(){
        if(empty(self::$xml)) {
            self::init();
        }
        return self::$xml;
    }
}


class InstockShell extends AppShell {
	public $uses = array('XmlInventory');
	
	public function clean_s($output){
    	return preg_replace('/[^(\x20-\x7F)]*/','', $output);
	}	
	
	
	public function update_feed() {
	
		$this->loadModel('DealerName');
		$DealerNames =  $this->DealerName->find('all', array('conditions'=>array(
			//'DealerName.id'=>1, 
		'DealerName.url <>'=>'')));
		
		$report = array();
		
		foreach($DealerNames as $DealerName){
		
			$url = $DealerName['DealerName']['url'].'/feeds.asp?feed=GenericXMLFeed';
			$dealer_id = $DealerName['DealerName']['dealer_id'];
			$last_record =  $this->XmlInventory->find('first', array('fields'=>array('XmlInventory.id','XmlInventory.inv_id'),'order'=>'XmlInventory.inv_id DESC','conditions'=>array('XmlInventory.dealerid'=>$dealer_id)));

			$last_id = 0;
			if(!empty($last_record)){
				$last_id = $last_record['XmlInventory']['inv_id'];
			}
			//debug($last_id);
			
			$xml = file_get_contents($url);
			$inventories = XML2Array::createArray($xml);
			//debug($inventories);
			$report[$dealer_id] = 0;
			foreach($inventories['inventory']['item'] as $inventory){
				if($inventory['id'] > $last_id){
					$data['XmlInventory'] = array(
						'inv_id'=>$inventory['id'],
						'classid'=>$inventory['classid'],
						'vehtype'=>$inventory['vehtype'],
						'bodysubtype'=>$inventory['bodysubtype'],
						'category_name'=>$inventory['category_name'],
						'condition'=>$inventory['condition'],
						'year'=> $inventory['year'],
						'make'=>$this->clean_s($inventory['make']),
						'model'=>$this->clean_s($inventory['model']),
						'price'=>$inventory['price'],
						'vin'=>$inventory['vin'],
						'dealername'=>$inventory['dealername'],
						'dealerid'=>$inventory['dealerid'],
						'address'=>$inventory['address'],
						'city'=>$inventory['city'],
						'state'=>$inventory['state'],
						'zipcode'=>$inventory['zipcode'],
						'telephone'=>$inventory['telephone'],
						'email'=>$inventory['email'],
						'stocknumber'=>$inventory['stocknumber'],
						'color'=>$inventory['color'],
						'miles'=>$inventory['miles'],
						'description'=>$this->clean_s($inventory['description']),
					);
					$this->XmlInventory->create();
					if($this->XmlInventory->save($data)){
						$report[$dealer_id] ++ ;
					}
					
				}
			
			}
		
		
		}
		$this->out(print_r($report, true));

	}
  
   
   
}

?>