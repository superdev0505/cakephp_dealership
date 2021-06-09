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


class XmlShell extends AppShell {
	public $uses = array('Contact','User', 'Rule','History','Category');

   public function utf8_clean($string){
    	//$string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
	    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special cha
	}
	
	public function clean_s($output){
    	return preg_replace('/[^(\x20-\x7F)]*/','', $output);
	}
	
	
	public function _get_tradeinfo($year='', $make='', $model=''){
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
			`Model`.`pretty_name` = :model_name AND 
			`Model`.`year` = :year AND 
			`Make`.`pretty_mame` = :make
			ORDER BY `Trim`.`id` ASC LIMIT 2", array('make'=>$make,'model_name'=>$model,'year'=>$year));
			return $model_data;
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
	
	public function _get_category($body_type){
		$category = $this->Category->find('first', array('conditions'=>array('Category.body_type'=>$body_type)));
		return $category['Category']['d_type'];  
	}
	public function _get_class_id($body_type, $class_name){
		$category = $this->Category->find('first', array('conditions'=>array( 'Category.body_sub_type'=>$class_name,'Category.body_type'=>$body_type)));
		return $category;  
	}
	public function set_values($ar_adf, $subject=""){
		
		$ret = array();
	
		$dt_ar = explode("T",$ar_adf['adf']['prospect']['requestdate']);
		$ret['created'] = date("Y-m-d H:i:s",strtotime($dt_ar[0]." ".$dt_ar[1]));
		
		$ret['fname'] = $ar_adf['adf']['prospect']['customer']['contact']['name'][0]['value'];
		$ret['lname']  = $ar_adf['adf']['prospect']['customer']['contact']['name'][1]['value'];

		
		//customer phone
		$ret['evening'] = "";
		$ret['cellphone'] = "";
		foreach($ar_adf['adf']['prospect']['customer']['contact']['phone'] as $phone){
			//debug($phone);
			if($phone['attributes']['type'] == 'cellphone' &&  $subject != 'AbbrName Contact Form' ){
				$ret['cellphone'] = $phone['value'];
			}else if( isset($phone['attributes']['time']) && $phone['attributes']['time'] == 'evening' && $phone['value'] != '' ){
				$ret['evening'] = $phone['value'];
			}
			else if( isset($phone['attributes']['time']) && $phone['attributes']['time'] == 'day' && $phone['value'] != '' ){
				$ret['evening'] = $phone['value'];
			}
			else if( isset($phone['attributes']['time']) && $phone['attributes']['time'] == 'day' &&  $subject == 'AbbrName Contact Form' ){
				$ret['cellphone'] = $phone['value'];
			}
		}
		if($ret['evening'] != '' && $ret['cellphone'] == ''){
			$ret['cellphone'] = $ret['evening'];
			$ret['evening'] = "";
		}

		$ret['evening'] = str_replace("-","",$ret['evening']);
		$ret['cellphone'] = str_replace("-","",$ret['cellphone']);
		
		$ret['email'] = $ar_adf['adf']['prospect']['customer']['contact']['email'];
		
		$ret['street'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['street']['value'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['street']['value'] : "";
		$ret['city'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['city'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['city'] : "";
		$ret['regioncode'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['regioncode'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['regioncode'] : "";
		$ret['postalcode'] = isset($ar_adf['adf']['prospect']['customer']['contact']['address']['postalcode'])?  $ar_adf['adf']['prospect']['customer']['contact']['address']['postalcode'] : "";

		$ret['comments'] = $ar_adf['adf']['prospect']['customer']['comments'];
		
		
		/******* Vehicle Inputs *******/
		$main_vehicle = array();
		$trade_vehicle = array();
		$all_vehicls = $ar_adf['adf']['prospect']['vehicle'];
		
		if( isset($all_vehicls[0])){
			foreach($all_vehicls as $vehicle){
				if(isset($vehicle['attributes']['interest']) && $vehicle['attributes']['interest'] == 'trade-in' ){
					$trade_vehicle = $vehicle;
				}else{
					$main_vehicle = $vehicle;
				}	
			}  	
		}else{
			$main_vehicle = $all_vehicls;
		} 
		
		//debug($main_vehicle);
		$vehicle_comment = isset($main_vehicle['comments'])? " - ".$main_vehicle['comments'] : '';
		$floorplans = isset($main_vehicle['floorplans'])? " - Floor plans:".$main_vehicle['floorplans'] : '';
		
		
		$ret['comments'] = $ret['comments'].$vehicle_comment.$floorplans;  
		//debug($ret['comments']);
		
		
		$ret['year'] = isset($main_vehicle['year'])? $main_vehicle['year'] : null;
		$ret['make'] = isset($main_vehicle['make'])?   $main_vehicle['make']       : "" ;
		$ret['make'] = $this->clean_s($ret['make']);
		$ret['model'] = isset($main_vehicle['model'])? $main_vehicle['model'] : "" ;
		$ret['model'] = $this->clean_s($ret['model']);
		$ret['year'] = ($ret['year'] != '')? $ret['year'] : null ;
		
		//match HD prefix and get model id
		$ret['model_id'] = null;
		$ret['model_prefix'] = null;
		
		$ret['type'] = isset($main_vehicle['type'])?   $main_vehicle['type']       : "" ;
		$class_name = isset($main_vehicle['category'])?   $main_vehicle['category']       : "" ;
		//debug($ret['type']);
		//debug($class_name);
		
		if($ret['type'] != '' && $class_name != ''){
			$category_details = $this->_get_class_id($ret['type'], $class_name);
			if(empty($category_details)){
				$category_details = $this->_get_class_id($class_name, $ret['type']);
				$ret['type'] = $main_vehicle['category'];
			}
			
			$ret['category'] = $category_details['Category']['d_type'];
			$ret['class']  = $category_details['Category']['id'];
			
		}
		
		$ret['unit_value'] = "0.00";
		
		if($ret['make'] == 'Harley-Davidson'){
			$ret['category'] = 'Harley-Davidson';
			$ret['type'] = 'Motorcycle / Scooter';
			$ret['make'] = 'Harley-Davidson';
		}
		
		/*
		if($ret['year'] != '' && $ret['make'] == 'Harley-Davidson' && $ret['model'] != ''){
			$model_details = $this->_hd_prefix($ret['year'],$ret['make'], $ret['model']);
			if(!empty($model_details)){
				$ret['model_id'] = $model_details[0]['Model']['id'];
				$ret['model_prefix'] = $model_details[0]['Trim']['model_prefix'];
				$ret['type'] = $model_details[0]['Category']['body_type'];
				$ret['class'] = $model_details[0]['Trim']['category_type_id'];
				$ret['category'] = $model_details[0]['Category']['d_type'];
				$ret['unit_value'] = number_format( $model_details[0]['Trim']['msrp'] , 2, '.', '');
			}
		}
		*/
		
		$ret['notes_vehicle'] = $ret['year'].", ".$ret['make'].", ".$ret['model'];
		
		$ret['stock'] = isset($main_vehicle['stock'])? $main_vehicle['stock'] : "";
		$ret['vin'] = isset($main_vehicle['vin'])? $main_vehicle['vin'] : "";
		
		$ret['year_trade'] = null;
		$ret['make_trade'] = "";
		$ret['model_trade'] = "";
		$ret['odometer_trade'] = "";
		
		$ret['condition'] = isset($main_vehicle['condition'])?   $main_vehicle['condition']       : "" ;
		
		
		//debug( $trade_vehicle );
		$ret['trade_selection'] = '';
		if( !empty($trade_vehicle)){
		
			$ret['make_trade'] = isset($trade_vehicle['make'])?  $this->clean_s($trade_vehicle['make']) : null;
			$ret['year_trade'] = isset($trade_vehicle['year'])? $trade_vehicle['year'] : null;
			$ret['model_trade'] = isset($trade_vehicle['model'])? $this->clean_s($trade_vehicle['model']) : null;
			$ret['odometer_trade'] = isset($trade_vehicle['odometer']['value']  )? $trade_vehicle['odometer']['value'] : null;
			
			$ret['trade_selection'] = $ret['year_trade'].", ".$ret['make_trade'].", ".$ret['model_trade'];
			
			
			$trade_info = $this->_get_tradeinfo($ret['year_trade'], $ret['make_trade'], $ret['model_trade'] );
			//debug($trade_info);
			
			$ret['condition_trade'] = 'Used';
			$ret['category_trade'] = null; 
			$ret['type_trade']	= null;
			$ret['class_trade']	= null;
			
			if(!empty($trade_info)){
				$td = $trade_info['0'];
				$ret['category_trade'] = $td['Category']['d_type']; 
				$ret['type_trade']	= $td['Category']['body_type'];
				$ret['class_trade']	= $td['Category']['id'];
			}
			
			
		
		}
		
		//Trade options
		/*
		if(isset($ar_adf['adf']['prospect']['vehicle']['option'])){
			$ret['condition'] = "Used";
			foreach($ar_adf['adf']['prospect']['vehicle']['option'] as $v_opt){
				if($v_opt['optionname'] == 'Trade In Year'){
					$ret['year_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Make'){
					$ret['make_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Model'){
					$ret['model_trade'] = $v_opt['manufacturecode'];
				}elseif($v_opt['optionname'] == 'Current Mileage'){
					$ret['odometer_trade'] = $v_opt['manufacturecode'];
				}
			}
		}
		*/
		
		$ret['provider_name'] =   $ar_adf['adf']['prospect']['provider']['name']['value'];
		$ret['provider_id'] =   $ar_adf['adf']['prospect']['provider']['id'];
		$ret['vendorname'] =   $ar_adf['adf']['prospect']['vendor']['vendorname']['value'];
		return $ret;
	}
	
	public function getsource($subject = ""){
		$pos = strpos($subject, " ");
		$source_sub = substr($subject, $pos+1);
		$source_map = array(
			'Get A Quote Form' => "Dealer Spike - Quote",
			'Trade Value Form' => "Dealer Spike - Trade",
			'Schedule Ride Form' => "Dealer Spike - Schedule Ride",
			'Parts Request' => "Dealer Spike - Parts Request",
			'Service Appointment' => "Dealer Spike - Service Appt.",
			'Contact Form' => "Dealer Spike - Contact Form",
			'LeadPop Popup Form' => "Dealer Spike - LeadPop",
			'InquiryMobile Popup Form' => "Dealer Spike - Mobile",
		
				
		
		);
		return $source_map[$source_sub];
	}
	
	public function save_history($ret){
		
		$last_contact = $this->Contact->find('first',array('order'=>array('Contact.id DESC')));
		$last_contact_id = $last_contact['Contact']['id'];
		
		$history_data = array();
		$history_data['user_id'] = $ret['User_id']; // for change log
		//$history_data['changed_by'] = $ret; // for change log
//		$history_data['field_changed'] = "";  // for change log
		$history_data['contact_id'] = $last_contact_id;
		$history_data['sperson'] = $ret['User_first_name_last_name'];
		//$history_data['cond'] = $ret;
		$history_data['year'] = $ret['year'];
		$history_data['make'] = $ret['make'];
		$history_data['model'] = $ret['model'];
		//$history_data['type'] = $old_data['Contact']['type'];
		$history_data['sales_step'] = "Pending";
		$history_data['status'] = 'Web Lead';
		$history_data['modified'] = date('D - M d, Y g:i A', strtotime($ret['created']));
		$history_data['created'] = $ret['created'];
		$history_data['comment'] = $ret['comments']." - Web Selction:".$ret['notes_vehicle'];
		$history_data['h_type'] = "Lead Arrived";
		$history = array(
			'History' => $history_data
		);
		$this->History->save($history);
			
	}
	
	public function get_emaildetail(){
	
		//$this->autoRender = false;
		
		// configure your imap mailboxes
		$mailboxes = array(
			array(
				'label' 	=> 'Gmail',
				'enable'	=> true,
				'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
				'username'     => 'dealerweblead@gmail.com',
				'password'     => '4756ty3663'
				//'username' 	=> 'developerweb6@gmail.com',
				//'password' 	=> 'abhi1234'
			),
		);


	 	if (!count($mailboxes)) { 
			$this->out(print_r("Please configure at least one IMAP mailbox.", true));
	 	} else { 
		
			foreach ($mailboxes as $current_mailbox) {
				$this->out(print_r($current_mailbox['label'], true));
	
				if (!$current_mailbox['enable']) {
					//echo '<p>This mailbox is disabled.</p>';
					$this->out(print_r('This mailbox is disabled', true));
				} else {
					// Open an IMAP stream to our mailbox
					$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
					
					$numMessages = imap_num_msg($imap);
					for ($i = $numMessages; $i > 0 ; $i--) {
					
						$header = imap_header($imap, $i);
						$fromInfo = $header->from[0];
						$replyInfo = $header->reply_to[0];
					 
						$details = array(
							"fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
								? $fromInfo->mailbox . "@" . $fromInfo->host : "",
							"fromName" => (isset($fromInfo->personal))
								? $fromInfo->personal : "",
							"replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
								? $replyInfo->mailbox . "@" . $replyInfo->host : "",
							"replyName" => (isset($replyTo->personal))
								? $replyto->personal : "",
							"subject" => (isset($header->subject))
								? $header->subject : "",
							"udate" => (isset($header->udate))
								? $header->udate : ""
						);
					 
						$uid = imap_uid($imap, $i);
						$body = $this->getBody( $uid , $imap );
						
						
					//	if(strpos($body, "&lt;") !== false){
					//		$body = strip_tags($body);
					//		$body = html_entity_decode($body);
					//		$body = preg_replace('/[^(\x20-\x7F)]*/','', $body);
					//	}
						
						
						//skip cycle trader
						if(strpos($body, "CycleTrader.com") !== false){
							//debug('CycleTrader');
							continue;
						}
						
						$body = utf8_encode($body);
						//debug($body);
						
						//$ar_adf = XML2Array::createArray($body);	
						try {
							$ar_adf = XML2Array::createArray($body);	
						} catch (Exception $e) {
							$this->out(print_r('Invalid xml', true));
							
							imap_delete($imap, $uid, FT_UID);
							imap_expunge($imap);
							
							continue;
						}
						
						
						if(isset($ar_adf['adf']['prospect']['provider']['name']['value']) &&  $ar_adf['adf']['prospect']['provider']['name']['value'] != 'Dealerspike'){
							//debug("Not - Dealerspike");
							$this->out(print_r('Not - Dealerspike', true));
							continue ;
						}
						
						$ret = $this->set_values($ar_adf, $details['subject']);
						
						//$cond = array( 'Contact.created' => $ret['created'] );
						//$contact = $this->Contact->find('first',array('recursive'=>-1,'conditions' => $cond,'fields'=> array('Contact.*' )));
						$contact = array();
						
						$source =  $this->getsource($details['subject']);
						
						$ret['notes_vehicle'] = $ret['notes_vehicle'].", Source: ". $source;
						
						$active_rule = $this->Rule->find("first",array('conditions' => array('Rule.dealer_id'=>$ret['provider_id'],'Rule.active'=>1)));
						
						//Web lead alert
						$this->loadModel('WebAlertEmail');
						$webAlertEmails = $this->WebAlertEmail->find('all',array('conditions'=>array('WebAlertEmail.dealer_id'=>$ret['provider_id'] )));
						$alert_recipients = array();
						foreach($webAlertEmails as $webAlertEmail){
							$alert_recipients[] = $webAlertEmail['WebAlertEmail']['email'];
						} 
						
						
						$alert_body['user_id'] = "";
						$alert_body['sperson'] = "";
						$alert_body['zone'] = "";

						if(count($contact) == 0) {
							if(!empty($ret)){
							
								if($active_rule['Rule']['type'] == 'direct'){
								
								
									$user_dtl = $this->User->find('first',array('recursive'=>-1,'conditions' =>array('User.id'=>$active_rule['Rule']['user_id'])));
									
									$alert_body['user_id'] = $user_dtl['User']['id'];
									$alert_body['sperson'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$alert_body['zone'] = $user_dtl['User']['zone'];
									date_default_timezone_set( $user_dtl['User']['zone'] );
									
									
									$this->Contact->query('Insert into contacts(
									`xml_weblead`,
									`condition_trade`,
									`category_trade`,
									`type_trade`,
									`class_trade`,
								  `condition`,`unit_value`,`type`, `class`, `category`,   `model_id`,`model_prefix`,`web_selection`, `trade_selection` , `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `year_trade` , `make_trade` , `model_trade` , `odometer_trade` , `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` ,	`company_id`,`user_id`, `owner_id`, `sperson` ) 
									values(
									\'1\',
									:condition_trade,
									:category_trade,
									:type_trade,
									:class_trade,  :condition, :unit_value, :type, :class, :category,  :model_id, :model_prefix, :web_selection, :trade_selection, :fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade ,    :vin, :User_first_name_last_name , "'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id , :User_id , :owner_id,	:User_first_name_last_name)',
									array(
									
									'condition_trade'=>$ret['condition_trade'],
									'category_trade'=>$ret['category_trade'],
									'type_trade'=>$ret['type_trade'],
									'class_trade'=>$ret['class_trade'],	
									
									
										'condition'=>$ret['condition'],
										
										'unit_value'=>$ret['unit_value'],
										'type'=>$ret['type'],
										'class'=>$ret['class'],
										'category'=>$ret['category'],
										
										
										'model_id'=>$ret['model_id'],
										'model_prefix'=>$ret['model_prefix'],
										
										'web_selection'=>$ret['notes_vehicle'],
										'trade_selection'=>$ret['trade_selection'],
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments']." - Web Selection:".$ret['notes_vehicle'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$ret['provider_id'],
										'User_id'=>$user_dtl['User']['id'],
										'owner_id'=>$user_dtl['User']['id'],
										'User_first_name_last_name'=>$user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'],
									));
									
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = $user_dtl['User']['id'];
									$ret['User_first_name_last_name'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$this->save_history($ret);
									
								}else if($active_rule['Rule']['type'] == 'round-robin'){
								
									$this->loadModel('WebleadQueue');
									$this->WebleadQueue->bindModel(array('belongsTo'=>array('User')));
									$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_login DESC'),'conditions'=>array(
										'WebleadQueue.last_receive'=> null,
										'User.group_id' => 3,
										'User.round_robin' => 1,
										'WebleadQueue.dealer_id'=> $ret['provider_id'] 
									)));
									if(empty($receive_user)){
										$this->WebleadQueue->bindModel(array('belongsTo'=>array('User')));
										$receive_user = $this->WebleadQueue->find('first',array('order'=>array('WebleadQueue.last_receive ASC'),'conditions'=>array(
											'WebleadQueue.last_receive <>'=> null,
											'User.group_id' => 3,
											'User.round_robin' => 1,
											'WebleadQueue.dealer_id'=> $ret['provider_id'] 
										)));
									}
									$user_dtl = $this->User->find('first',array('recursive'=>-1,'conditions' =>array('User.id'=>$receive_user['WebleadQueue']['user_id']),'fields'=> array('User.*' )));
									//debug($user_dtl);
									date_default_timezone_set( $user_dtl['User']['zone'] );
									
									$alert_body['user_id'] = $user_dtl['User']['id'];
									$alert_body['sperson'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$alert_body['zone'] = $user_dtl['User']['zone'];
									
									$this->Contact->query('Insert into contacts(
									`xml_weblead`,
									`condition_trade`,
									`category_trade`,
									`type_trade`,
									`class_trade`,
									`condition`,`unit_value`, `type`, `class`, `category`,    `model_id`,`model_prefix`, `web_selection`, `trade_selection`, `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` ,  `year_trade` , `make_trade` , `model_trade` , `odometer_trade` ,
									`vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` ,
									`company_id`,`user_id`, `owner_id`, `sperson` ) values(
									\'1\',
									:condition_trade,
									:category_trade,
									:type_trade,
									:class_trade,
									:condition, :unit_value, :type, :class, :category, :model_id, :model_prefix,:web_selection, :trade_selection, :fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade , :vin, :User_first_name_last_name , 
									"'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id , :User_id , :owner_id,
									:User_first_name_last_name)',array(
										'condition_trade'=>$ret['condition_trade'],
									'category_trade'=>$ret['category_trade'],
									'type_trade'=>$ret['type_trade'],
									'class_trade'=>$ret['class_trade'],	
									
										'condition'=>$ret['condition'],
										
										'unit_value'=>$ret['unit_value'],
										'type'=>$ret['type'],
										'class'=>$ret['class'],
										'category'=>$ret['category'],
										
										'model_id'=>$ret['model_id'],
										'model_prefix'=>$ret['model_prefix'],
										
										'web_selection'=>$ret['notes_vehicle'],
										'trade_selection'=>$ret['trade_selection'],
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments']." - Web Selection:".$ret['notes_vehicle'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$ret['provider_id'],
										'User_id'=>$user_dtl['User']['id'],
										'owner_id'=>$user_dtl['User']['id'],
										'User_first_name_last_name'=>$user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'],
									));
									
									$this->WebleadQueue->id = $receive_user['WebleadQueue']['id'];
									$this->WebleadQueue->saveField('last_receive', date('Y-m-d H:i:s'));
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = $user_dtl['User']['id'];
									$ret['User_first_name_last_name'] = $user_dtl['User']['first_name']." ".$user_dtl['User']['last_name'];
									$this->save_history($ret);
									
								
								}else if($active_rule['Rule']['type'] == 'open'){
									$user_dtl['User']['dealer_id'] = "";
									
									$alert_body['user_id'] = "";
									$alert_body['sperson'] = "Open";
								
									$this->Contact->query('Insert into contacts(
									`xml_weblead`,
									`condition_trade`,
									`category_trade`,
									`type_trade`,
									`class_trade`,
									`condition`,`unit_value`, `type`, `class`, `category`,   `model_id`,`model_prefix`, `web_selection`, `trade_selection`, `first_name` , `last_name` , `created` , `modified` , `phone` , `mobile` , `email` , `year` , `make` , `model` , `stock_num` , `year_trade` , `make_trade` , `model_trade` , `odometer_trade` ,  `vin` , `owner` , `source` , `address` , `city` , `state` , `zip` , `status` , `contact_status_id` , `sales_step` , `lead_status` , `notes` , `web_provider` ,  `company` , `company_id`) 
									values(
									\'1\',
									:condition_trade,
									:category_trade,
									:type_trade,
									:class_trade,
									:condition, :unit_value,:type, :class, :category, :model_id, :model_prefix, :web_selection, :trade_selection, :fname, :lname, :created, :requestdate, :evening, :cellphone, :email, :year , :make ,  :model, :stock , :year_trade , :make_trade , :model_trade , :odometer_trade ,  :vin, "Please Transfer" , "'.$source.'" , :street, :city, :regioncode, :postalcode, "Web Lead"  , "5" , "Pending" , "Open" ,  :comments , :provider_name, :vendorname , :User_dealer_id)',
									array(
									'condition_trade'=>$ret['condition_trade'],
									'category_trade'=>$ret['category_trade'],
									'type_trade'=>$ret['type_trade'],
									'class_trade'=>$ret['class_trade'],	
										'condition'=>$ret['condition'],
										'unit_value'=>$ret['unit_value'],	
										'type'=>$ret['type'],
										'class'=>$ret['class'],
										'category'=>$ret['category'],
										
										'model_id'=>$ret['model_id'],
										'model_prefix'=>$ret['model_prefix'],
										'web_selection'=>$ret['notes_vehicle'],
										'trade_selection'=>$ret['trade_selection'],
										'fname'=>$ret['fname'],
										'lname'=>$ret['lname'],
										'created'=>$ret['created'],
										'requestdate'=>$ret['created'],
										'evening'=>$ret['evening'],
										'cellphone'=>$ret['cellphone'],
										'email'=>$ret['email'],
										'year'=>$ret['year'],
										'make'=>$ret['make'],
										'model'=>$ret['model'],
										'stock'=>$ret['stock'],
										
										'year_trade'=>$ret['year_trade'],
										'make_trade'=>$ret['make_trade'],
										'model_trade'=>$ret['model_trade'],
										'odometer_trade'=>$ret['odometer_trade'],
										
										'vin'=>$ret['vin'],
										'street'=>$ret['street'],
										'city'=>$ret['city'],
										'regioncode'=>$ret['regioncode'],
										'postalcode'=>$ret['postalcode'],
										'comments'=>$ret['comments']." - Web Selection:".$ret['notes_vehicle'],
										'provider_name'=>$ret['provider_name'],
										'vendorname'=>$ret['vendorname'],
										'User_dealer_id'=>$ret['provider_id']
									));
									
									//Save History
									$ret['User_dealer_id'] = $user_dtl['User']['dealer_id'];
									$ret['User_id'] = "";
									$ret['User_first_name_last_name'] = "";
									$this->save_history($ret);
								
								}
								

								try {
									//debug( $alert_recipients );
									if(!empty($alert_recipients)){
									
										//if($alert_body['zone'] != ''){
											//date_default_timezone_set( $alert_body['zone'] );
										//}

										$last_id = $this->Contact->query('select id from contacts order by id desc limit 1');
										//debug( $last_id );
										$lid = $last_id['0']['contacts']['id'];
									
										// Send Email alert
										$subject = "New Web Lead Arrived - ".$source;
										$emailData = "New ".$source." arrived and it ready to be worked.  This lead was tranfered to ".$alert_body['sperson']." #".$alert_body['user_id']." <br>".date('m/d/Y g:i A'). "<br><br><br>"  ;
										
										$emailData .= "ID: ".$lid." <br>";
										$emailData .= "Name: ".$ret['fname']." ".$ret['lname']." <br>";
										$emailData .= "Address: ".$ret['street'].", ".$ret['city'].", ".$ret['postalcode']." <br>";
										$emailData .= "Mobile: ".$ret['cellphone']." <br>";
										$emailData .= "Evening: ".$ret['evening']." <br>";
										
										$emailData .= "Email: ".$ret['email']." <br>";
										$emailData .= "Year: ".$ret['year']." <br>";
										$emailData .= "Make: ".$ret['make']." <br>";
										$emailData .= "Model: ".$ret['model']." <br>";
										$emailData .= "T/Year: ".$ret['year_trade']." <br>";
										$emailData .= "T/Make: ".$ret['make_trade']." <br>";
										$emailData .= "T/Model: ".$ret['model_trade']." <br>";
										$emailData .= "Stock Number: ".$ret['stock']." <br>";
										$emailData .= "Vin: ".$ret['vin']." <br><br>";
										$emailData .= "Web Selection: ".$ret['notes_vehicle']." <br>";
										$emailData .= "Trade Selection: ".$ret['trade_selection']." <br>";
										
										
										
										
										
										App::uses('CakeEmail', 'Network/Email');
										$email = new CakeEmail();
										$email->config('sender');
										$email->viewVars(array('email_content'=>$emailData));
										$email->template('internal_message')
											->emailFormat('html')
											->subject($subject)
											->from("sender@dp360crm.com")
											->to($alert_recipients)
											->bcc('andrew@dp360crm.com')
											->replyTo("sender@dp360crm.com")
											->send();
					
									}								
								}catch (Exception $e) {
									$this->out(print_r('Error sending mail', true));
								}
								
								
								
								
								
								
								
								$this->out(print_r('added - '.$ret['fname']." ".$ret['lname'], true));
								imap_delete($imap, $uid, FT_UID);
								imap_expunge($imap);
							}else{
								//debug('Errors');
								$this->out(print_r('Errors', true));
								imap_mail_move($imap, $uid, 'Errors', CP_UID);
								imap_expunge($imap);
							}
							
						}else{ //duplicate
							//debug('duplicate');
							$this->out(print_r('duplicate', true));
							imap_mail_move($imap, $uid, 'Duplicates', CP_UID);
							imap_expunge($imap);
						}
						
					}
					imap_close($imap);		
				
				} 
			}  
		} 
	}
	
	function getdata( $start_tag , $tag , $str ) {
		preg_match( '/<'.$start_tag.'(.*?)<\/'.$tag.'>/s', $str, $matches );
		return strip_tags($matches[0]);
	}
	
	
	function getBody($uid, $imap) {
	    $body = $this->get_part($imap, $uid, "TEXT/HTML");
    	// if HTML body is empty, try getting text body
    	if ($body == "") {
        	$body = $this->get_part($imap, $uid, "TEXT/PLAIN");
   		}
    	return $body;
	}
 
	function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
		if (!$structure) {
			   $structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if ($structure) {
			if ($mimetype == $this->get_mime_type($structure)) {
				if (!$partNumber) {
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3: return imap_base64($text);
					case 4: return imap_qprint($text);
					default: return $text;
			   }
		   }
	 
			// multipart 
			if ($structure->type == 1) {
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = "";
					if ($partNumber) {
						$prefix = $partNumber . ".";
					}
					$data = $this->get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
					if ($data) {
						return $data;
					}
				}
			}
		}
		return false;
	}
 
 
	function get_mime_type($structure) {
		$primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");
		 
		if ($structure->subtype) {
			  return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
		}
		return "TEXT/PLAIN";
	}
   
   
}

?>