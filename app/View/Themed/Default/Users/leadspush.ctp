<?php 

/*******************************************************************
DealsAggregator
Description: PHP Wrapper Class for Aggregating deals data from 
Groupon, LivingSocial, CrowdSavings, Tippr and more
Date: 12/29/2011
Copyright 2011 Code Slingers
********************************************************************/


// ensure Curl extension installed
if  (in_array('curl', get_loaded_extensions()) == false ) 
{
	$loadingException = new Exception(
	"DealsAggregator has a dependency on the PHP Curl extension.")	;

	throw( $loadingException );
}


/*Pointing to current GROUPON URL, change this static var if GROUPON API changes*/ 
define('URL_GROUPON_REST', 'http://lesserthan.com/api.');

define('JSON', 'json');
define('XML', 'xml');
define('OBJECT', 'php');

/** 
 *  This class contains functions for calling BuyDeals API
 *  This allows us to aggregate deals from  Groupon, LivingSocial, CrowdSavings, Tippr and more
 */
class DealsAggregator
{
	//Instance variables
	private $dataFormat = "json";
	
	function __construct($dataFormat) 
	{
		
		if($dataFormat!=JSON && $dataFormat!=XML && $dataFormat!=OBJECT)	
		{
			throw new DealsAggregatorException('Please provide a valid Result return type.  Options are json,xml,object.');		
		}

		
		$this->dataFormat=$dataFormat;	
		
	}	
	


	/**
	 * CURL Request Function used to make http GET API call to the remote Endpoint	
	 * Input String method name, Array Method Arguments
	 * Output String XML
	 **/
	private function readRequest($api_method, $method_args = NULL ) 
	{
		$method_url = URL_GROUPON_REST . $api_method;

		$params = '?';
		if ( is_array($method_args)  ) {
			foreach ($method_args as $key => $value) {
				$params .= "$key=" . urlencode($value) . '&';
			}

		}

		


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		

		curl_setopt($ch, CURLOPT_URL, $method_url.$params);
		$data = curl_exec($ch);
		curl_close($ch);

		
		return $data;
	}


	/** 
	 * Get all aggregated deals in a particular city
	 * Input city, state
	 * 
	 **/
	public function getDealsInCity($city, $state)
	{
		$api_method = 'getDealsCity/';
		
		if((!isset($city) || $city=='') || (!isset($state) || $state==''))	
		{
			throw new DealsAggregatorException('Please provide a valid city and/or state');		
		}

		$api_method = $api_method.'/'.urlencode($state).'/'.urlencode($city).'/'.$this->dataFormat;	
		


		$response = $this->readRequest( $api_method, array() );
		return $response;	
	}


	/** 
	 * Get all aggregated deals near a latitude and longitude point
	 * Input latitude, longitude
	 * 
	 **/
	public function getDealsByGeoPoint($latitude, $longitude)
	{
		$api_method = 'getDealsLatLon/';
		
		if((!isset($latitude) || $latitude=='') || (!isset($longitude) || $longitude==''))	
		{
			throw new DealsAggregatorException('Please provide a valid latitude and longitude');		
		}

		$api_method = $api_method.'/'.$this->dataFormat.'/';	

		$args = array();
		$args['lat']=$latitude;
		$args['lon']=$longitude;

		$response = $this->readRequest( $api_method, $args );
		return $response;	
	}

	/** 
	 * Get all aggregated deals in a particular zip code
	 * Input zip
	 * 
	 **/
	public function getDealsInZip($zip)
	{
		$api_method = 'getDealsZip/';
		
		if((!isset($zip) || $zip=='') )	
		{
			throw new DealsAggregatorException('Please provide a valid zip code');		
		}

		$api_method = $api_method.'/'.urlencode($zip).'/'.$this->dataFormat;	
		


		$response = $this->readRequest( $api_method, array() );
		return $response;	
	}


	/** 
	 * Get all market regions that have active deals 
	 * 
	 * 
	 **/
	public function getMarketRegions()
	{
		$api_method = 'getMarkets/';
		$api_method = $api_method.'/'.$this->dataFormat;	

		$response = $this->readRequest( $api_method, array() );
		return $response;	
	}


	/** 
	 * Get details on a specific deal
	 * Input dealId
	 * 
	 **/
	public function getSingleDeal($dealId)
	{
		if((!isset($dealId) || $dealId=='') )	
		{
			throw new DealsAggregatorException('Please provide a valid deal ID');		
		}		

		$api_method = 'getDealSingle/';
		$api_method = $api_method.'/'.urlencode($dealId).'/'.$this->dataFormat;	

		$response = $this->readRequest( $api_method, array() );
		return $response;	
	}





	
}

/* Custom Exception  */
class DealsAggregatorException extends Exception {}


?>
