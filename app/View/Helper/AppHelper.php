<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {


	public function getCountryList()
	{
		return array('United States' => 'United States','Canada' =>'Canada');
	}

	public function getStateList($country = '', $listAs = 'array')
	{
		$state_list = array('United States' => array(
					'AL' => 'AL',
					'AK' => 'AK',
					'AZ' => 'AZ',
					'AR' => 'AR',
					'CA' => 'CA',
					'CO' => 'CO',
					'CT' => 'CT',
					'DE' => 'DE',
					'FL' => 'FL',
					'GA' => 'GA',
					'HI' => 'HI',
					'ID' => 'ID',
					'IL' => 'IL',
					'IN' => 'IN',
					'IA' => 'IA',
					'KS' => 'KS',
					'KY' => 'KY',
					'LA' => 'LA',
					'ME' => 'ME',
					'MD' => 'MD',
					'MA' => 'MA',
					'MI' => 'MI',
					'MN' => 'MN',
					'MS' => 'MS',
					'MO' => 'MO',
					'MT' => 'MT',
					'NE' => 'NE',
					'NV' => 'NV',
					'NH' => 'NH',
					'NJ' => 'NJ',
					'NM' => 'NM',
					'NY' => 'NY',
					'NC' => 'NC',
					'ND' => 'ND',
					'OH' => 'OH',
					'OK' => 'OK',
					'OR' => 'OR',
					'PA' => 'PA',
					'RI' => 'RI',
					'SC' => 'SC',
					'SD' => 'SD',
					'TN' => 'TN',
					'TX' => 'TX',
					'UT' => 'UT',
					'VT' => 'VT',
					'VA' => 'VA',
					'WA' => 'WA',
					'WV' => 'WV',
					'WI' => 'WI',
					'WY' => 'WY',
					'AS' => 'AS',
					'DC' => 'DC',
					'PR' => 'PR',
					'VI' => 'VI'
				),
				'Canada' => array(
					'ON'=>'ON',
					'QC'=>'QC',
					'NS'=>'NS',
					'NB'=>'NB',
					'MB'=>'MB',
					'BC'=>'BC',
					'PE'=>'PE',
					'SK'=>'SK',
					'AB'=>'AB',
					'NL'=>'NL',
					'NU'=>'NU',
					'YT'=>'YT'
				)
			);
		if(!empty($country)){
			$state_list = $state_list[$country];
		}

		if($listAs == 'array') {
			return $state_list;
		} else {
			return json_encode($state_list);
		}
	}

	public function getLocaleList()
	{
		return array('en-us' =>'en-us','en-ca' => 'en-ca');
	}

	public function getTimezoneList($country = '')
	{
		$timezone_list =  array('United States' => array(
                        'Pacific/Honolulu' => 'Pacific/Honolulu',
                        'America/Adak' => 'America/Adak',
						'America/Los_Angeles' => 'America/Los_Angeles',
						'America/Phoenix' => 'America/Phoenix',
						'America/Denver' => 'America/Denver',
						'America/Chicago' => 'America/Chicago',
						'America/New_York' => 'America/New_York'),
						'Canada' => array(
						'Canada/Central' => 'Canada/Central',
						'Canada/East-Saskatchewan' =>'Canada/East-Saskatchewan',
						'Canada/Eastern' => 'Canada/Eastern',
						'Canada/Mountain' => 'Canada/Mountain',
						'Canada/Newfoundland' => 'Canada/Newfoundland',
						'Canada/Pacific' => 'Canada/Pacific',
						'Canada/Saskatchewan' =>'Canada/Saskatchewan',
						'Canada/Yukon' => 'Canada/Yukon'
						),

						'Australia' => array('Australia/Brisbane' => ' Australia/Brisbane')
						);
		if(!empty($country))
		{
			$timezone_list = $timezone_list[$country];
		}
		return $timezone_list;
	}

	public function getStateLabels($country ='')
	{
		$state_list = array('United States' => 'States','Canada' => 'Province');
		if(!empty($country))
		$state_list = $state_list[$country];

		return  $state_list;
	}

	public function getDealerSettings($setting_names = array(),$dealer_id)
	{
		$DealerSetting = ClassRegistry::init('DealerSetting');
		$setting_val = array();
		if(!empty($setting_names))
		{
			$setting_val = $DealerSetting->find('list',array('fields' => 'name,value','conditions' => array('name'=> $setting_names,'dealer_id' => $dealer_id)));

		}
		return $setting_val;
	}

	public function default_settings($setting_name='')
	{
		$default_setting_array = array(
			'move_lead_allowed_group' => array(1,2,3, 4,6,9,10,11,12,13)

		);

		return $default_setting_array[$setting_name];

	}

	public function get_service_status_color()
	{
		$color_array=array('1' => '#ab7a4b','2' => '#C53FCC',3 => '#4193d0',4 => '#AD540A',5 => '#8bbf61',6 => '#B57467', 8=> '#35656E',18 => '#2A6B2E',17 => '#7F9917',12 => '#523D91',13 => '#913D91',15 =>'#614F59');
		return $color_array;
	}

	public function phone_no_format($phone = '')
	{
		$mobile_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it
		return $cleaned;
	}

	public function mgr_group_ids()
	{
		return array(2,4,6,7,12,13,9);
	}

	public function bdc_staff_group_ids()
	{
		return array(8);
	}

}
