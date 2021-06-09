<?php
class DealerSettingsController extends AppController {

	public $uses = array('DealerSetting');
	public $components = array('RequestHandler','Utility');

	private $webAlert = array();
	private $activeVendors = array();

	private function setWebAlert()
	{
		$this->webAlert = array(
	        'engage_to_sell' => array(
	                'dealer_name' => 'Engage to Sell WEB ALERT GROUP',
	                'model_name'  => 'EngagetosellWebAlertEmail',
	                'dealer_id' => $this->getDealerId('EnToSell'),
	            ),
	        'trader_media' => array(
	                'dealer_name' => 'TRADER MEDIA WEB ALERT GROUP',
	                'model_name'  => 'TraderWebAlertEmail',
	                'dealer_id' => $this->getDealerId('TraderMedia'),
	            ),
	        'redziarv' => array(
	                'dealer_name' => 'Redzia RV',
	                'model_name'  => 'RedziarvWebAlertEmail',
	                'dealer_id' => $this->getDealerId('RedziaRV'),
	            ),
	        'endeavor' => array(
	                'dealer_name' => 'Endeavor',
	                'model_name'  => 'EndeavorWebAlertEmail',
	                'dealer_id' => $this->getDealerId('Endeavor'),
	            ),
	        'rvt' => array(
	                'dealer_name' => 'RVT.com',
	                'model_name'  => 'RvtWebAlertEmail',
	                'dealer_id' => $this->getDealerId('RVT.com'),
	            ),
	        'not_worked' => array(
	                'dealer_name' => 'NOT WORKED LEAD ALERT GROUP',
	                'model_name'  => 'NotWorkedAlertEmail',
	                'dealer_id'   => array('all'),
	            ),
	        'contact_at_once' => array(
	                'dealer_name' => 'Contact At Once-Web',
	                'model_name'  => 'ContactatonceWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('ContactAtOnce'),
	            ),
	        'costco' => array(
	                'dealer_name' => 'Costco Auto Program',
	                'model_name'  => 'CostcoWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Costco'),
	            ),
	        'boats_cycles' => array(
	                'dealer_name' => 'Boats and Cycles Web',
	                'model_name'  => 'BoatscyclesWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('boatsCycles'),
	            ),
	        'chopperexchange' => array(
	                'dealer_name' => 'ChopperExchange Web',
	                'model_name'  => 'ChopperWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('chopperExchange'),
	            ),
	        'rvusa' => array(
	                'dealer_name' => 'RVUSA Web',
	                'model_name'  => 'RvusaWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('RVUSA.COM'),
	            ),
	        'ebizautos' => array(
	                'dealer_name' => 'Ebizautos Web',
	                'model_name'  => 'EbizautosWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('ebizautos'),
	            ),
	        'marineconnection' => array(
	                'dealer_name' => 'Marine Connection Web',
	                'model_name'  => 'MarinconnectionWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('marinconnection'),
	            ),
	        'powersports' => array(
	                'dealer_name' => 'Powersports Marketing Web',
	                'model_name'  => 'PowersportsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('powersports'),
	            ),
	        'digital_powersports' => array(
	                'dealer_name' => 'Digital Powersports Web',
	                'model_name'  => 'DigitalpowersportsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('digitalpowersports'),
	            ),
	        'kijiji' => array(
	                'dealer_name' => 'Kijijileads.com Web',
	                'model_name'  => 'KijijiWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Kijiji'),
	            ),
	        'navy_federal' => array(
	                'dealer_name' => 'Navy Federal Auto Buying Program',
	                'model_name'  => 'NavyfederalWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Navyfederal'),
	            ),
	        'gdcauto' => array(
	                'dealer_name' => 'Gdcauto',
	                'model_name'  => 'GdcautoWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Gdcauto'),
	            ),
	        'yachtworld' => array(
	                'dealer_name' => 'Yachtworld',
	                'model_name'  => 'YachtworldWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('yacht_world'),
	            ),
	        'motolease' => array(
	                'dealer_name' => 'Motolease',
	                'model_name'  => 'MotoleaseWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Moto_lease'),
	            ),
	        'boatscom' => array(
	                'dealer_name' => 'Boats.com',
	                'model_name'  => 'BoatsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Boats'),
	            ),
	        'nautic_global' => array(
	                'dealer_name' => 'Nautic Global Group',
	                'model_name'  => 'NglobalgroupWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('nglobalgroup'),
	            ),
	        'edgewater_boats' => array(
	                'dealer_name' => 'Edgewater Boats',
	                'model_name'  => 'EdgewaterWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Edgewater'),
	            ),
	        'iboats' => array(
	                'dealer_name' => 'iboats',
	                'model_name'  => 'IboatsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('iboats'),
	            ),
	        'hattiesburg' => array(
	                'dealer_name' => 'Hattiesburg Cycles',
	                'model_name'  => 'HattiesburgWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Hattiesburg'),
	            ),
	        'footsteps' => array(
	                'dealer_name' => 'Footsteps',
	                'model_name'  => 'FootstepsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('footsteps'),
	            ),
	        'dealercentrics' => array(
	                'dealer_name' => 'DealerCentrics',
	                'model_name'  => 'DcentricWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('dealercentric'),
	            ),
	        'tracker_marine_group' => array(
	                'dealer_name' => 'Tracker Marine Group',
	                'model_name'  => 'TrackerWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Tracker'),
	            ),
	        'brunswickboatgroup' => array(
	                'dealer_name' => 'Brunswickboatgroup.com',
	                'model_name'  => 'BrunsWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Brunswick'),
	            ),
	        'pbhmarinegroup' => array(
	                'dealer_name' => 'Pbhmarinegroup.com',
	                'model_name'  => 'PbhmarineWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Pbhmarine'),
	            ),
	        'kingfisher' => array(
	                'dealer_name' => 'Kingfisher',
	                'model_name'  => 'KingfisherWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('Kingfisher'),
	            ),
	        'interactrv' => array(
	                'dealer_name' => 'Interactrv',
	                'model_name'  => 'InteractrvWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('InteractRV'),
	            ),
	        'godfrey_marine' => array(
	                'dealer_name' => 'Godfrey Marine',
	                'model_name'  => 'GodfreyWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('godfreymarine'),
	            ),
	        'grady_white' => array(
	                'dealer_name' => 'Grady White',
	                'model_name'  => 'GradyWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('avala_marketing'),
	            ),
	        'next_truck' => array(
	                'dealer_name' => 'Next Truck Online',
	                'model_name'  => 'NexttruckWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('next_truck'),
	            ),
	        'see_dealer_cost' => array(
	                'dealer_name' => 'See Dealer Cost',
	                'model_name'  => 'SeedcWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('see_dealercost'),
	            ),
	        'duck_worth' => array(
	                'dealer_name' => 'Duck worth',
	                'model_name'  => 'DuckworthWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('duck_worth'),
	            ),
	        'websitealive_com' => array(
	                'dealer_name' => 'websitealive.com',
	                'model_name'  => 'WebsitealiveWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('website_alive'),
	            ),
	        'pioneer' => array(
	                'dealer_name' => 'Pioneerboats.com',
	                'model_name'  => 'PioneerWebAlertEmail',
	                'dealer_id'   => $this->getDealerId('pioneer_boats'),
	            ),
			'Truckpaper' => array(
				'dealer_name' => 'Truckpaper.com',
				'model_name'  => 'TruckpaperWebAlertEmail',
				'dealer_id'   => $this->getDealerId('Truckpaper'),
			),
			'Autotrader' => array(
				'dealer_name' => 'Autotrader',
				'model_name'  => 'AutotraderWebAlertEmail',
				'dealer_id'   => $this->getDealerId('Autotrader'),
			),
			'ecarlist' => array(
				'dealer_name' => 'ecarlist.com',
				'model_name'  => 'EcarlistWebAlertEmail',
				'dealer_id'   => $this->getDealerId('ecarlist'),
			),
			'autojini' => array(
				'dealer_name' => 'autojini.com',
				'model_name'  => 'AutojiniWebAlertEmail',
				'dealer_id'   => $this->getDealerId('autojini'),
			),
			'cargurus' => array(
				'dealer_name' => 'cargurus.com',
				'model_name'  => 'CargurusWebAlertEmail',
				'dealer_id'   => $this->getDealerId('CarGurus'),
			),
			'calltrackingapi' => array(
				'dealer_name' => 'calltrackingmetrics.com',
				'model_name'  => 'CalltrckingapiWebAlertEmail',
				'dealer_id'   => $this->getDealerId('calltrcking_api'),
			),
			'callrailapi' => array(
				'dealer_name' => 'Callrail.com',
				'model_name'  => 'CallrailWebAlertEmail',
				'dealer_id'   => $this->getDealerId('call_rail')
			),
			'getemin' => array(
				'dealer_name' => 'Get Em In',
				'model_name'  => 'GeteminWebAlertEmail',
				'dealer_id'   => $this->getDealerId('get_emin')
			),
			'Carsforsale' => array(
				'dealer_name' => 'Carsforsale.com',
				'model_name'  => 'CarsaleWebAlertEmail',
				'dealer_id'   => $this->getDealerId('cars_sale')
			),
			'Intercom' => array(
				'dealer_name' => 'Intercom.io',
				'model_name'  => 'IntercomWebAlertEmail',
				'dealer_id'   => $this->getDealerId('intercom')
			),
			'craigslist' => array(
				'dealer_name' => 'Craigslist',
				'model_name'  => 'CraigslistWebAlertEmail',
				'dealer_id'   => $this->getDealerId('craigslist')
			),
			'reachlocallivechat' => array(
        'dealer_name' => 'reachlocallivechat.com',
        'model_name'  => 'reachlocallivechatWebAlertEmail',
        'dealer_id'   => $this->getDealerId('reachlocallivechat')
			),
			'Mailchimp' => array(
        'dealer_name' => 'Mailchimp',
        'model_name'  => 'MailchimpWebAlertEmail',
        'dealer_id'   => $this->getDealerId('mailchimp')
			),
			'cisco' => array(
				'dealer_name' => 'cisco.com',
				'model_name'  => 'CiscoWebAlertEmail',
				'dealer_id'   => $this->getDealerId('cisco')
			),
			'manitouboats' => array(
				'dealer_name' => 'manitouboats.com',
				'model_name'  => 'ManitouboatsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('manitouboats')
			),
			'Kbb' => array(
				'dealer_name' => 'Kbb.com',
				'model_name'  => 'KbbWebAlertEmail',
				'dealer_id'   => $this->getDealerId('kbb')
			),
			'smedia' => array(
				'dealer_name' => 'smedia.ca',
				'model_name'  => 'SmediaWebAlertEmail',
				'dealer_id'   => $this->getDealerId('smedia')
			),
			'iseecars' => array(
				'dealer_name' => 'Iseecars.com',
				'model_name'  => 'IseecarsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('iseecars')
			),
			'auto_sweet_leads' => array(
				'dealer_name' => 'Auto Sweet Leads',
				'model_name'  => 'AutoSweetWebAlertEmails',
				'dealer_id'   => $this->getDealerId('auto_sweet')
			),
			'Autosoftwareleads' => array(
				'dealer_name' => 'Autosoftwareleads',
				'model_name'  => 'AutosoftwareleadsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('autosoftwareleads')
			),
			'Psndealer' => array(
				'dealer_name' => 'Psndealer.com',
				'model_name'  => 'PsndealerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('psndealer')
			),
				'apcequipment' => array(
					'dealer_name' => 'Apcequipment.com',
					'model_name'  => 'ApcequipmentWebAlertEmail',
					'dealer_id'   => $this->getDealerId('apcequipment')
			),
			'Mydealers' => array(
				'dealer_name' => 'BoatDealers.ca',
				'model_name'  => 'MydealersWebAlertEmail',
				'dealer_id'   => $this->getDealerId('mydealers')
			),
			'oempolaris' => array(
				'dealer_name' => 'Polaris',
				'model_name'  => 'PolarisWebAlertEmail',
				'dealer_id'   => $this->getDealerId('oempolaris')
			),
			'freedomsite' => array(
				'dealer_name' => 'FreedomMarine.com',
				'model_name'  => 'FreedomsiteWebAlertEmail',
				'dealer_id'   => $this->getDealerId('freedomsite')
			),
			'driveitnow' => array(
				'dealer_name' => 'Driveitnow',
				'model_name'  => 'DriveitnowWebAlertEmail',
				'dealer_id'   => $this->getDealerId('driveitnow')
			),
			'onlyinboards' => array(
				'dealer_name' => 'Onlyinboards',
				'model_name'  => 'OnlyinboardsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('onlyinboards')
			),
			'airstream' => array(
				'dealer_name' => 'Airstream',
				'model_name'  => 'AirstreamWebAlertEmail',
				'dealer_id'   => $this->getDealerId('airstream')
			),
			'nautique' => array(
				'dealer_name' => 'Nautique',
				'model_name'  => 'NautiqueWebAlertEmail',
				'dealer_id'   => $this->getDealerId('nautique')
			),
			'getauto' => array(
				'dealer_name' => 'Getauto',
				'model_name'  => 'GetautoWebAlertEmail',
				'dealer_id'   => $this->getDealerId('getauto')
			),
			'pixelmotionmotors' => array(
				'dealer_name' => 'Pixelmotionmotors',
				'model_name'  => 'PixelmotionmotorsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('pixelmotionmotors')
			),
			'liveadmins' => array(
				'dealer_name' => 'Liveadmins',
				'model_name'  => 'LiveadminsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('liveadmins')
			),
			'uvsjunction' => array(
				'dealer_name' => 'Uvsjunction',
				'model_name'  => 'UvsjunctionWebAlertEmail',
				'dealer_id'   => $this->getDealerId('uvsjunction')
			),
			'valuemytradein' => array(
				'dealer_name' => 'Valuemytradein',
				'model_name'  => 'ValuemytradeinWebAlertEmail',
				'dealer_id'   => $this->getDealerId('valuemytradein')
			),
			'cars' => array(
				'dealer_name' => 'Cars',
				'model_name'  => 'CarsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('cars')
			),
			'textron' => array(
				'dealer_name' => 'Textron',
				'model_name'  => 'TextronWebAlertEmail',
				'dealer_id'   => $this->getDealerId('textron')
			),
			'carfax' => array(
				'dealer_name' => 'Carfax',
				'model_name'  => 'CarfaxWebAlertEmail',
				'dealer_id'   => $this->getDealerId('carfax')
			),
			'credit' => array(
				'dealer_name' => 'Credit',
				'model_name'  => 'CreditWebAlertEmail',
				'dealer_id'   => $this->getDealerId('credit')
			),
			'ducatiomaha' => array(
				'dealer_name' => 'Ducatiomaha',
				'model_name'  => 'DucatiomahaWebAlertEmail',
				'dealer_id'   => $this->getDealerId('ducatiomaha')
			),
			'liveeventstream' => array(
				'dealer_name' => 'Liveeventstream',
				'model_name'  => 'LiveeventstreamWebAlertEmail',
				'dealer_id'   => $this->getDealerId('liveeventstream')
			),
			'carnow' => array(
				'dealer_name' => 'Carnow',
				'model_name'  => 'CarnowWebAlertEmail',
				'dealer_id'   => $this->getDealerId('carnow')
			),
			'trailercentral' => array(
				'dealer_name' => 'Trailercentral',
				'model_name'  => 'TrailercentralWebAlertEmail',
				'dealer_id'   => $this->getDealerId('trailercentral')
			),
			'endeavorsuite' => array(
				'dealer_name' => 'Endeavorsuite',
				'model_name'  => 'EndeavorsuiteWebAlertEmail',
				'dealer_id'   => $this->getDealerId('endeavorsuite')
			),
			'armsvc' => array(
				'dealer_name' => 'Armsvc',
				'model_name'  => 'ArmsvcWebAlertEmail',
				'dealer_id'   => $this->getDealerId('armsvc')
			),
			'automoxiecrm' => array(
				'dealer_name' => 'Automoxiecrm',
				'model_name'  => 'AutomoxiecrmWebAlertEmail',
				'dealer_id'   => $this->getDealerId('automoxiecrm')
			),
			'truecar' => array(
				'dealer_name' => 'Truecar',
				'model_name'  => 'TruecarWebAlertEmail',
				'dealer_id'   => $this->getDealerId('truecar')
			),
			'ducati' => array(
				'dealer_name' => 'Ducati',
				'model_name'  => 'DucatiWebAlertEmail',
				'dealer_id'   => $this->getDealerId('ducati')
			),
			'skierschoice' => array(
				'dealer_name' => 'Skierschoice',
				'model_name'  => 'SkierschoiceWebAlertEmail',
				'dealer_id'   => $this->getDealerId('skierschoice')
			),
			'dxone' => array(
				'dealer_name' => 'Dx1app',
				'model_name'  => 'DxoneWebAlertEmail',
				'dealer_id'   => $this->getDealerId('dxone')
			),
			'adventurecamper' => array(
				'dealer_name' => 'Adventurecamper',
				'model_name'  => 'AdventurecamperWebAlertEmail',
				'dealer_id'   => $this->getDealerId('adventurecamper')
			),
			'thepapers' => array(
				'dealer_name' => 'Thepapers',
				'model_name'  => 'ThepapersWebAlertEmail',
				'dealer_id'   => $this->getDealerId('thepapers')
			),
			'automanager' => array(
				'dealer_name' => 'Automanager',
				'model_name'  => 'AutomanagerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('automanager')
			),
			'targetmediapartners' => array(
				'dealer_name' => 'Targetmediapartners',
				'model_name'  => 'TargetmediapartnersWebAlertEmail',
				'dealer_id'   => $this->getDealerId('targetmediapartners')
			),
			'searay' => array(
				'dealer_name' => 'Searay',
				'model_name'  => 'SearayWebAlertEmail',
				'dealer_id'   => $this->getDealerId('searay')
			),
			'hclrv' => array(
				'dealer_name' => 'Hclrv',
				'model_name'  => 'HclrvWebAlertEmail',
				'dealer_id'   => $this->getDealerId('hclrv')
			),
			'brp' => array(
				'dealer_name' => 'Brp',
				'model_name'  => 'BrpWebAlertEmail',
				'dealer_id'   => $this->getDealerId('brp')
			),
			'dealer' => array(
				'dealer_name' => 'Dealer',
				'model_name'  => 'DealerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('dealer')
			),
			'yourautosolutions' => array(
				'dealer_name' => 'Yourautosolutions',
				'model_name'  => 'YourautosolutionsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('yourautosolutions')
			),
			'autorevo' => array(
				'dealer_name' => 'Autorevo',
				'model_name'  => 'AutorevoWebAlertEmail',
				'dealer_id'   => $this->getDealerId('autorevo')
			),
			'youradstats' => array(
				'dealer_name' => 'Youradstats',
				'model_name'  => 'YouradstatsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('youradstats')
			),
			'cfm' => array(
				'dealer_name' => 'Cfm',
				'model_name'  => 'CfmWebAlertEmail',
				'dealer_id'   => $this->getDealerId('cfm')
			),
			'dealercarsearch' => array(
				'dealer_name' => 'Dealercarsearch',
				'model_name'  => 'DealercarsearchWebAlertEmail',
				'dealer_id'   => $this->getDealerId('dealercarsearch')
			),
			'tractorhouse' => array(
				'dealer_name' => 'Tractorhouse',
				'model_name'  => 'TractorhouseWebAlertEmail',
				'dealer_id'   => $this->getDealerId('tractorhouse')
			),
			'gubagoo' => array(
				'dealer_name' => 'Gubagoo',
				'model_name'  => 'GubagooWebAlertEmail',
				'dealer_id'   => $this->getDealerId('gubagoo')
			),
			'fastline' => array(
				'dealer_name' => 'Fastline',
				'model_name'  => 'FastlineWebAlertEmail',
				'dealer_id'   => $this->getDealerId('fastline')
			),
			'leisurevans' => array(
				'dealer_name' => 'Leisurevans',
				'model_name'  => 'LeisurevansWebAlertEmail',
				'dealer_id'   => $this->getDealerId('leisurevans')
			),
			'edmunds' => array(
				'dealer_name' => 'Edmunds',
				'model_name'  => 'EdmundsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('edmunds')
			),
			'boattradevalue' => array(
				'dealer_name' => 'Boattradevalue',
				'model_name'  => 'BoattradevalueWebAlertEmail',
				'dealer_id'   => $this->getDealerId('boattradevalue')
			),
			'carcode' => array(
				'dealer_name' => 'Carcode',
				'model_name'  => 'CarcodeWebAlertEmail',
				'dealer_id'   => $this->getDealerId('carcode')
			),
			'kawasakidealer' => array(
				'dealer_name' => 'Kawasakidealer',
				'model_name'  => 'KawasakidealerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('kawasakidealer')
			),
			'fpsapproved' => array(
				'dealer_name' => 'Fpsapproved',
				'model_name'  => 'FpsapprovedWebAlertEmail',
				'dealer_id'   => $this->getDealerId('fpsapproved')
			),
			'servicesinteractrv' => array(
				'dealer_name' => 'Servicesinteractrv',
				'model_name'  => 'ServicesinteractrvWebAlertEmail',
				'dealer_id'   => $this->getDealerId('servicesinteractrv')
			),
			'used' => array(
				'dealer_name' => 'Used',
				'model_name'  => 'UsedWebAlertEmail',
				'dealer_id'   => $this->getDealerId('used')
			),
			'boatchat' => array(
				'dealer_name' => 'Boatchat',
				'model_name'  => 'BoatchatWebAlertEmail',
				'dealer_id'   => $this->getDealerId('boatchat')
			),
			'truckertotrucker' => array(
				'dealer_name' => 'Truckertotrucker',
				'model_name'  => 'TruckertotruckerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('truckertotrucker')
			),
			'equipmenttrader' => array(
				'dealer_name' => 'Equipmenttrader',
				'model_name'  => 'EquipmenttraderWebAlertEmail',
				'dealer_id'   => $this->getDealerId('equipmenttrader')
			),
			'sportsmanboatsmfg' => array(
				'dealer_name' => 'Sportsmanboatsmfg',
				'model_name'  => 'SportsmanboatsmfgWebAlertEmail',
				'dealer_id'   => $this->getDealerId('sportsmanboatsmfg')
			),
			'cargigi' => array(
				'dealer_name' => 'Cargigi',
				'model_name'  => 'CargigiWebAlertEmail',
				'dealer_id'   => $this->getDealerId('cargigi')
			),
			'jastmedia' => array(
				'dealer_name' => 'Jastmedia',
				'model_name'  => 'JastmediaWebAlertEmail',
				'dealer_id'   => $this->getDealerId('jastmedia')
			),
			'rollickoutdoor' => array(
				'dealer_name' => 'Rollickoutdoor',
				'model_name'  => 'RollickoutdoorWebAlertEmail',
				'dealer_id'   => $this->getDealerId('rollickoutdoor')
			),
			'lancecamper' => array(
				'dealer_name' => 'Lancecamper',
				'model_name'  => 'LancecamperWebAlertEmail',
				'dealer_id'   => $this->getDealerId('lancecamper')
			),
			'truckntrailer' => array(
				'dealer_name' => 'Truckntrailer',
				'model_name'  => 'TruckntrailerWebAlertEmail',
				'dealer_id'   => $this->getDealerId('truckntrailer')
			),
			'imanpro' => array(
				'dealer_name' => 'Imanpro',
				'model_name'  => 'ImanproWebAlertEmail',
				'dealer_id'   => $this->getDealerId('imanpro')
			),
			'storm_division' => array(
				'dealer_name' => 'Storm Division',
				'model_name'  => 'StormdivisionWebAlertEmail',
				'dealer_id'   => $this->getDealerId('storm_division')
			),
			'celltuck' => array(
				'dealer_name' => 'Celltuck',
				'model_name'  => 'CelltuckWebAlertEmail',
				'dealer_id'   => $this->getDealerId('celltuck')
			),
			'kz_rv' => array(
				'dealer_name' => 'Kzrv',
				'model_name'  => 'KzrvWebAlertEmail',
				'dealer_id'   => $this->getDealerId('kz_rv')
			),
			'vogtrv_wpengine' => array(
				'dealer_name' => 'Vogtrv Wpengine',
				'model_name'  => 'VogtrvWpengineWebAlertEmail',
				'dealer_id'   => $this->getDealerId('vogtrv_wpengine')
			),
			'dealerwebinstinct' => array(
				'dealer_name' => 'Dealer Webinstinct',
				'model_name'  => 'DealerwebinstinctWebAlertEmail',
				'dealer_id'   => $this->getDealerId('dealerwebinstinct')
			),
			'buckeyerv' => array(
				'dealer_name' => 'Buckeyerv',
				'model_name'  => 'BuckeyervWebAlertEmail',
				'dealer_id'   => $this->getDealerId('buckeyerv')
			),
			'polaris_digital' => array(
				'dealer_name' => 'Polaris Digital',
				'model_name'  => 'PolarisDigitalWebAlertEmail',
				'dealer_id'   => $this->getDealerId('polaris_digital')
			),
			'skyriverrv' => array(
				'dealer_name' => 'Skyriverrv',
				'model_name'  => 'SkyriverrvWebAlertEmail',
				'dealer_id'   => $this->getDealerId('skyriverrv')
			),
			'callcap' => array(
				'dealer_name' => 'Callcap',
				'model_name'  => 'CallcapWebAlertEmail',
				'dealer_id'   => $this->getDealerId('callcap')
			),
			'auction' => array(
				'dealer_name' => 'Auction',
				'model_name'  => 'AuctionWebAlertEmail',
				'dealer_id'   => $this->getDealerId('auction')
			),
			'northwoodmail' => array(
				'dealer_name' => 'Northwoodmail',
				'model_name'  => 'NorthwoodmailWebAlertEmail',
				'dealer_id'   => $this->getDealerId('northwoodmail')
			),
			'hammer_corp' => array(
				'dealer_name' => 'Hammer Corp',
				'model_name'  => 'HammerCorpWebAlertEmail',
				'dealer_id'   => $this->getDealerId('hammer_corp')
			),
			'montereyboats' => array(
				'dealer_name' => 'Montereyboats',
				'model_name'  => 'MontereyboatsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('montereyboats')
			),
			'rvadpros' => array(
				'dealer_name' => 'Rvadpros',
				'model_name'  => 'RvadprosWebAlertEmail',
				'dealer_id'   => $this->getDealerId('rvadpros')
			),
			'malibuboats' => array(
				'dealer_name' => 'Malibuboats',
				'model_name'  => 'MalibuboatsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('malibuboats')
			),
			'hubspot' => array(
				'dealer_name' => 'Hubspot',
				'model_name'  => 'HubspotWebAlertEmail',
				'dealer_id'   => $this->getDealerId('hubspot')
			),
			'appone' => array(
				'dealer_name' => 'Appone',
				'model_name'  => 'ApponeWebAlertEmail',
				'dealer_id'   => $this->getDealerId('appone')
			),
			'pixelmotion' => array(
				'dealer_name' => 'Pixelmotion',
				'model_name'  => 'PixelmotionWebAlertEmail',
				'dealer_id'   => $this->getDealerId('pixelmotion')
			),
			'sitedonerite' => array(
				'dealer_name' => 'Sitedonerite',
				'model_name'  => 'SitedoneriteWebAlertEmail',
				'dealer_id'   => $this->getDealerId('sitedonerite')
			),
			'geteminleads' => array(
				'dealer_name' => 'Geteminleads',
				'model_name'  => 'GeteminleadsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('geteminleads')
			),
			'rvchat' => array(
				'dealer_name' => 'Rvchat',
				'model_name'  => 'RvchatWebAlertEmail',
				'dealer_id'   => $this->getDealerId('rvchat')
			),
			'natureandmerv' => array(
				'dealer_name' => 'Natureandmerv',
				'model_name'  => 'NatureandmervWebAlertEmail',
				'dealer_id'   => $this->getDealerId('natureandmerv')
			),
			'ipssolutions' => array(
				'dealer_name' => 'Ipssolutions',
				'model_name'  => 'IpssolutionsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('ipssolutions')
			),
			'webdb' => array(
				'dealer_name' => 'Webdb',
				'model_name'  => 'WebdbWebAlertEmail',
				'dealer_id'   => $this->getDealerId('webdb')
			),
			'denvermarine' => array(
				'dealer_name' => 'Denvermarine',
				'model_name'  => 'DenvermarineWebAlertEmail',
				'dealer_id'   => $this->getDealerId('denvermarine')
			),
			'builderdesigns' => array(
				'dealer_name' => 'Builderdesigns',
				'model_name'  => 'BuilderdesignsWebAlertEmail',
				'dealer_id'   => $this->getDealerId('builderdesigns')
			),
			'vespaoftc' => array(
				'dealer_name' => 'Vespaoftc',
				'model_name'  => 'VespaoftcWebAlertEmail',
				'dealer_id'   => $this->getDealerId('vespaoftc')
			),
			'eldoradorv' => array(
				'dealer_name' => 'Eldoradorv',
				'model_name'  => 'EldoradorvWebAlertEmail',
				'dealer_id'   => $this->getDealerId('eldoradorv')
			)
		);
	}

	public function beforeFilter() {
		 parent::beforeFilter();
		$this->Auth->allow('process_qr', 'd_type_options');
    }

	public function get_settings($settings_name) {
		$dealer_id = $this->Auth->user('dealer_id');

		if($settings_name == 'unit_value_price'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'unit_value_price', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == '24-follow-up'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => '24-follow-up', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}
		if($settings_name == 'show-all-leads'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'show-all-leads', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}
		if($settings_name == 'in-stock'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'in-stock', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'show-second-face'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'show-second-face', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'required-second-face'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'required-second-face', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'traditional-log-view'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'traditional-log-view', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'hide-side-menu'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'hide-side-menu', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'email-process'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'email-process', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'location_transfer'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'location_transfer', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'service_search'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => $settings_name, 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'address-validation'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'address-validation', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'start_search'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'start_search', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Name";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'gender_required'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'gender_required', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'dealer_visit'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'dealer_visit', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'dealer_visit_showroom'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'dealer_visit_showroom', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}

		if($settings_name == 'location_names'){
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'location_names', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				return  "Off";
			}else{
				return  $settings['DealerSetting']['value'];
			}
		}






	}

	public function shopper_notification_ckbox(){
		if ($this->request->is('post')) {

			//debug($this->request->data);
			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'shopper_notification_group', 'DealerSetting.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'shopper_notification_group',
					'value'=> implode(",", $this->request->data['checked']),
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'shopper_notification_group'",
					'value'=>"'".implode(",", $this->request->data['checked'])."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}
		}
		$this->autoRender = false;
	}

	public function save_holidays_ckbox(){
		if ($this->request->is('post')) {

			//debug($this->request->data);
			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'holidays', 'DealerSetting.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'holidays',
					'value'=> implode(",", $this->request->data['checked']),
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'holidays'",
					'value'=>"'".implode(",", $this->request->data['checked'])."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}
		}
		$this->autoRender = false;
	}

	public function save_casl_unsubscribe_page(){
		if ($this->request->is('post')) {

			$this->loadModel("CaslUnsubscribe");

			$value = $this->request->data['content'];

			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->CaslUnsubscribe->find('first', array('conditions'=>array('CaslUnsubscribe.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->CaslUnsubscribe->create();
				$this->CaslUnsubscribe->save(array('CaslUnsubscribe'=>array(
					'content'=> $value,
					'dealer_id'=>$dealer_id
				)));
			}else{
				App::uses('Sanitize', 'Utility');
				$this->CaslUnsubscribe->updateAll(array(
					'content'=>"'".Sanitize::escape($value)."'",
					'dealer_id'=>$dealer_id
				), array('CaslUnsubscribe.id'=> $settings['CaslUnsubscribe']['id']) );
			}
		}
		$this->autoRender = false;
	}

	public function save_event_auto_time(){

		if ($this->request->is('post')) {
			//$event_auto_time_value = $this->request->data['auto_time'];
			$event_auto_time_value = $this->request->data['auto_time'];

			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'auto_event_time', 'DealerSetting.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'auto_event_time',
					'value'=> $event_auto_time_value,
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'auto_event_time'",
					'value'=>"'".$event_auto_time_value."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}
		}
		$this->autoRender = false;

	}


	public function save_business_hours(){

		if ($this->request->is('post')) {

			$business_hours_start = ($this->request->data['business_hours_start'] != '')? $this->request->data['business_hours_start'] : "08:00 AM" ;
			$business_hours_end = ($this->request->data['business_hours_end'] != '')? $this->request->data['business_hours_end'] : "08:00 PM" ;

			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'business_hours_start', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'business_hours_start',
					'value'=> $business_hours_start,
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'business_hours_start'",
					'value'=>"'".$business_hours_start."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}

			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'business_hours_end', 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'business_hours_end',
					'value'=> $business_hours_end,
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'business_hours_end'",
					'value'=>"'".$business_hours_end."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}

		}
		$this->autoRender = false;

	}












	public function save_bad_web_lead_ckbox(){
		if ($this->request->is('post')) {

			//debug($this->request->data);
			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'bad_web_lead_group', 'DealerSetting.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>'bad_web_lead_group',
					'value'=> implode(",", $this->request->data['checked']),
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);
				$this->DealerSetting->updateAll(array(
					'name'=>"'bad_web_lead_group'",
					'value'=>"'".implode(",", $this->request->data['checked'])."'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}
		}
		$this->autoRender = false;
	}

	public function save_settings_form_view($settings_name) {
		$this->layout = 'ajax';
		$dealer_id = $this->Auth->user('dealer_id');

		$value =  $this->request->query['value'];


		$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => $settings_name, 'DealerSetting.dealer_id'=>$dealer_id)));
		if(empty($settings)){
			$this->DealerSetting->create();
			$this->DealerSetting->save(array('DealerSetting'=>array(
				'name'=>$settings_name,
				'value'=>$value,
				'dealer_id'=>$dealer_id
			)));
		}else{
			$this->DealerSetting->id = $settings['DealerSetting']['id'];
			$this->DealerSetting->saveField($settings_name, $value);

			$this->DealerSetting->updateAll(array(
				'name'=>"'".$settings_name."'",
				'value'=>"'$value'",
				'dealer_id'=>$dealer_id
			), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
		}
		$this->autoRender = false;
	}



	public function save_settings_lead_dup_duration() {
		$this->layout = 'ajax';
		$dealer_id = $this->Auth->user('dealer_id');
		$value =  $this->request->query['value'];

		$this->LoadModel('DuplicateLeadAlert');

		$duplicateLeadAlert = $this->DuplicateLeadAlert->find("first", array("conditions"=>array("DuplicateLeadAlert.dealer_id" => $dealer_id)));
		if(empty($duplicateLeadAlert)){
			$this->DuplicateLeadAlert->create();
			$this->DuplicateLeadAlert->save(array('DuplicateLeadAlert'=>array(
				'notification_duration'=>$value,
				'dealer_id'=>$dealer_id
			)));
		}else{
			$this->DuplicateLeadAlert->id = $duplicateLeadAlert['DuplicateLeadAlert']['id'];
			$this->DuplicateLeadAlert->saveField("notification_duration", $value);
		}
		$this->autoRender = false;
	}

	public function add_lead_dup_alert_group() {
		$this->LoadModel('DuplicateLeadAlert');
		$dealer_id = $this->Auth->user('dealer_id');
		$duplicateLeadAlert = $this->DuplicateLeadAlert->find("first", array("conditions"=>array("DuplicateLeadAlert.dealer_id" => $dealer_id)));

		$recipients = array();
		if(empty($duplicateLeadAlert)){
			$this->DuplicateLeadAlert->create();
			$this->DuplicateLeadAlert->save(array('DuplicateLeadAlert'=>array(
				'dealer_id'=>$dealer_id,
				'recipients'=>json_encode(array($this->request->data['email']) ),
			)));
			$recipients[] = $this->request->data['email'];
		}else{
			$this->DuplicateLeadAlert->id = $duplicateLeadAlert['DuplicateLeadAlert']['id'];
			if($duplicateLeadAlert['DuplicateLeadAlert']['recipients'] != ''){
				$recipients = json_decode( $duplicateLeadAlert['DuplicateLeadAlert']['recipients'] , true );
			}
			$recipients[] = $this->request->data['email'];
			$this->DuplicateLeadAlert->saveField("recipients", json_encode( $recipients ) );
		}
		$this->set('duplicateLeadAlert_recipients', $recipients);
	}

	public function delete_dup_lead_alert_group() {
		$this->layout = 'ajax';
		$this->LoadModel('DuplicateLeadAlert');
		$dealer_id = $this->Auth->user('dealer_id');
		$duplicateLeadAlert = $this->DuplicateLeadAlert->find("first", array("conditions"=>array("DuplicateLeadAlert.dealer_id" => $dealer_id)));

		$current_recipeints = array();
		if( !empty($duplicateLeadAlert) &&  $duplicateLeadAlert['DuplicateLeadAlert']['recipients']  != ''){
			$current_recipeints = json_decode($duplicateLeadAlert['DuplicateLeadAlert']['recipients'], true );
			// debug( $current_recipeints );
			if(($key = array_search( $this->request->data['id'] , $current_recipeints)) !== false) {
 			   unset($current_recipeints[$key]);
 			   // debug( $current_recipeints );
 			   $this->DuplicateLeadAlert->id = $duplicateLeadAlert['DuplicateLeadAlert']['id'];
 			   $this->DuplicateLeadAlert->saveField("recipients", json_encode( $current_recipeints ) );
			}
		}
		$this->set('duplicateLeadAlert_recipients', $current_recipeints);
		$this->render('add_lead_dup_alert_group');
		//$this->autoRender = false;
	}


	public function add_dormant_lead_alert_group() {
		$this->LoadModel('DormantLeadAlert');
		$dealer_id = $this->Auth->user('dealer_id');
		$dormantLeadAlert = $this->DormantLeadAlert->find("first", array("conditions"=>array("DormantLeadAlert.dealer_id" => $dealer_id)));

		$recipients = array();
		if(empty($dormantLeadAlert)){
			$this->DormantLeadAlert->create();
			$this->DormantLeadAlert->save(array('DormantLeadAlert'=>array(
				'dealer_id'=>$dealer_id,
				'recipients'=>json_encode(array($this->request->data['email']) ),
			)));
			$recipients[] = $this->request->data['email'];
		}else{
			$this->DormantLeadAlert->id = $dormantLeadAlert['DormantLeadAlert']['id'];
			if($dormantLeadAlert['DormantLeadAlert']['recipients'] != ''){
				$recipients = json_decode( $dormantLeadAlert['DormantLeadAlert']['recipients'] , true );
			}
			$recipients[] = $this->request->data['email'];
			$this->DormantLeadAlert->saveField("recipients", json_encode( $recipients ) );
		}
		$this->set('dormantLeadAlert_recipients', $recipients);
	}

	public function delete_dormant_lead_alert_group() {
		$this->layout = 'ajax';
		$this->LoadModel('DormantLeadAlert');
		$dealer_id = $this->Auth->user('dealer_id');
		$dormantLeadAlert = $this->DormantLeadAlert->find("first", array("conditions"=>array("DormantLeadAlert.dealer_id" => $dealer_id)));

		$current_recipeints = array();
		if( !empty($dormantLeadAlert) &&  $dormantLeadAlert['DormantLeadAlert']['recipients']  != ''){
			$current_recipeints = json_decode($dormantLeadAlert['DormantLeadAlert']['recipients'], true );
			// debug( $current_recipeints );
			if(($key = array_search( $this->request->data['id'] , $current_recipeints)) !== false) {
 			   unset($current_recipeints[$key]);
 			   // debug( $current_recipeints );
 			   $this->DormantLeadAlert->id = $dormantLeadAlert['DormantLeadAlert']['id'];
 			   $this->DormantLeadAlert->saveField("recipients", json_encode( $current_recipeints ) );
			}
		}
		$this->set('dormantLeadAlert_recipients', $current_recipeints);
		$this->render('add_dormant_lead_alert_group');
		//$this->autoRender = false;
	}

	public function add_custom_event_type() {
		$this->LoadModel('EventType');
		$dealer_id = $this->Auth->user('dealer_id');

		$this->EventType->create();
		$this->EventType->save(array('EventType'=>array(
			'dealer_id' => $dealer_id,
			'name' => $this->request->data['event_type_name'],
			'color' => 'Black'
		)));
		$eventCustomTypes = $this->EventType->find("all", array("conditions"=>array("EventType.dealer_id" => $dealer_id)));
		$this->set('eventCustomTypes', $eventCustomTypes);
	}

	public function delete_custom_event_type() {
		if ($this->request->is('post')) {

			$this->LoadModel('EventType');
			$dealer_id = $this->Auth->user('dealer_id');

			$this->EventType->id = $this->request->data['id'];
			$this->EventType->delete();

			$eventCustomTypes = $this->EventType->find("all", array("conditions"=>array("EventType.dealer_id" => $dealer_id)));
			$this->set('eventCustomTypes', $eventCustomTypes);

			$this->render('add_custom_event_type');
		}
	}



 public function save_round_robin_filters($filter_name) {
	 $this->layout = 'ajax';
	 $dealer_id = $this->Auth->user('dealer_id');
	 $value =  ($this->request->query['value'] == 'false')? false : true;

	 	$this->loadModel('RoundRobinFilter');
	 	$filters = $this->RoundRobinFilter->find('first', array('conditions'=>array('RoundRobinFilter.filter' => $filter_name, 'RoundRobinFilter.dealer_id'=>$dealer_id)));
	 	if(empty($filters)){
	 		$this->RoundRobinFilter->create();
	 		$this->RoundRobinFilter->save(array('RoundRobinFilter'=>array(
	 			'filter'=>$filter_name,
	 			'active'=>$value,
	 			'dealer_id'=>$dealer_id
	 		)));
	 	}else{
	 		$this->RoundRobinFilter->id = $filters['RoundRobinFilter']['id'];
	 		$this->RoundRobinFilter->saveField($filter_name, $value);

	 		$this->RoundRobinFilter->updateAll(array(
	 			'filter'=>"'".$filter_name."'",
	 			'active'=>"'$value'",
	 			'dealer_id'=>$dealer_id
	 		), array('RoundRobinFilter.id'=> $filters['RoundRobinFilter']['id']) );
	 	}
	 $this->autoRender = false;

 }




	public function save_settings($settings_name) {
		$this->layout = 'ajax';
		$dealer_id = $this->Auth->user('dealer_id');

			if($settings_name != 'start_search'){
				$value =  ($this->request->query['value'] == 'false')? "Off" : "On";
			}else{
				$value =  $this->request->query['value'];
			}


			$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => $settings_name, 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>$settings_name,
					'value'=>$value,
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);

				$this->DealerSetting->updateAll(array(
					'name'=>"'".$settings_name."'",
					'value'=>"'$value'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}

			//Save Round Robin Filters to the Round Robin Filters Table
			if(!empty($this->request->query['setting_type'])){
				$this->save_round_robin_filters($this->request->query['setting_type']);
			}


			if($settings_name == 'advanced_round_robin_rules'){
				$this->requestAction(array("controller"=>'dealer_settings', 'action'=>'save_settings', 'round_robin_category', '?' => array('value'=>$value,'setting_type'=>"") ));
			}


		$this->autoRender = false;
	}

		//Dealer country settings
	public function dealer_location_settings($settings_name) {
		$this->layout = 'ajax';
		$dealer_id = $this->Auth->user('dealer_id');
		$value =  $this->request->query['value'];
		$settings = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => $settings_name, 'DealerSetting.dealer_id'=>$dealer_id)));
			if(empty($settings)){
				$this->DealerSetting->create();
				$this->DealerSetting->save(array('DealerSetting'=>array(
					'name'=>$settings_name,
					'value'=>$value,
					'dealer_id'=>$dealer_id
				)));
			}else{
				$this->DealerSetting->id = $settings['DealerSetting']['id'];
				$this->DealerSetting->saveField($settings_name, $value);

				$this->DealerSetting->updateAll(array(
					'name'=>"'".$settings_name."'",
					'value'=>"'$value'",
					'dealer_id'=>$dealer_id
				), array('DealerSetting.id'=> $settings['DealerSetting']['id']) );
			}
		$this->autoRender = false;
	}

	/**
	-------------------------Procedure Definition Begin-------------------------------
	 Author: RichestSoft
	 Date: 2017-05-02
	 Owner: DP360
	 Description: This function is used to filter New and Used Types for Autoresponder
	 */
	public function d_condition_options(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->autoRender = false;
		$this->loadModel("Category");
		$this->LoadModel('SettingsDtype');
		$this->LoadModel('AddOnVehicle');
		if(!empty($this->request->params['named']['conditionVal'])){
			$conditionVal  = $this->request->params['named']['conditionVal'];
			$d_options_val = $this->SettingsDtype->query("SELECT DISTINCT settings_dtypes.dtype FROM crmdeva1_crm2.settings_dtypes LEFT JOIN crmdeva1_crm2.addon_vehicles ON crmdeva1_crm2.settings_dtypes.dtype=crmdeva1_crm2.addon_vehicles.category  WHERE crmdeva1_crm2.addon_vehicles.condition='".$conditionVal."' AND crmdeva1_crm2.settings_dtypes.status='On' AND dealer_id=".$dealer_id);
		}else{
			$d_options_val = $this->SettingsDtype->query("SELECT DISTINCT settings_dtypes.dtype FROM crmdeva1_crm2.settings_dtypes LEFT JOIN crmdeva1_crm2.addon_vehicles ON crmdeva1_crm2.settings_dtypes.dtype=crmdeva1_crm2.addon_vehicles.category  WHERE crmdeva1_crm2.settings_dtypes.status='On' AND dealer_id=".$dealer_id);
		}

		return json_encode($d_options_val);
	}
	// -------------------------Procedure Definition Closed-------------------------------

	public function d_type_options($dealer_id = null){
		//DType Settins
		$this->loadModel("Category");
		$this->LoadModel('SettingsDtype');

		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type <>' => ''), 'orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options_popup = array();
		foreach($d_types as $d_type){
			$d_type_options_popup[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		//debug($d_type_options_popup);
		$d_options = $d_type_options_popup;
		if($dealer_id != null){
			$current_d_type_settings = $this->SettingsDtype->find('list', array( 'fields'=>array('SettingsDtype.dtype','SettingsDtype.status'), 'conditions' => array( 'SettingsDtype.status' => 'Off', 'SettingsDtype.dealer_id'=> $dealer_id)));
			//debug( $current_d_type_settings  );
			foreach($current_d_type_settings as $key=>$value){

				unset($d_options[$key] );
			}
		}
		return $d_options;
		//$this->set('d_type_options_popup', $d_type_options_popup);
	}

	public function save_dtype_settings(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('SettingsDtype');

		$dtype = $this->request->query['dtype'];
		$status = ($this->request->query['value'] == 'true')? "On" : "Off" ;

		$current_settings = $this->SettingsDtype->find('first', array('conditions' => array( 'SettingsDtype.dtype'=> $dtype , 'SettingsDtype.dealer_id'=> $dealer_id  )));

		if(empty( $current_settings )){
			$this->SettingsDtype->create();
			$this->SettingsDtype->save(array('SettingsDtype'=>array(
				'dealer_id' => $dealer_id,
				'dtype' => $dtype,
				'status' => $status
			)));
		}else{
			$this->SettingsDtype->id = $current_settings['SettingsDtype']['id'];
			$this->SettingsDtype->saveField('status', $status);
		}
		$this->autoRender = false;
	}

	public function save_dealerspikesource_settings(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('SettingsDealerspike');

		$dtype = $this->request->query['dtype'];
		$status = ($this->request->query['value'] == 'true')? "On" : "Off" ;

		$current_settings = $this->SettingsDealerspike->find('first', array('conditions' => array( 'SettingsDealerspike.source'=> $dtype , 'SettingsDealerspike.dealer_id'=> $dealer_id  )));

		if(empty( $current_settings )){
			$this->SettingsDealerspike->create();
			$this->SettingsDealerspike->save(array('SettingsDealerspike'=>array(
				'dealer_id' => $dealer_id,
				'source' => $dtype,
				'status' => $status
			)));
		}else{
			$this->SettingsDealerspike->id = $current_settings['SettingsDealerspike']['id'];
			$this->SettingsDealerspike->saveField('status', $status);
		}
		$this->autoRender = false;

		if($status == 'Off'){
			echo "false";
		}else{
			echo "true";
		}
	}


        //npa setting for active / deactive
	public function npa_active(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('NpaapiSetting');

		//$dtype = $this->request->query['dtype'];
		$status = ($this->request->query['value'] == 'true')? "1" : "0";
                $current_settings = $this->NpaapiSetting->find('first', array('conditions' => array('NpaapiSetting.dealer_id'=> $dealer_id)));

		if(!empty( $current_settings )){
			$this->NpaapiSetting->id = $current_settings['NpaapiSetting']['id'];
			$this->NpaapiSetting->saveField('active', $status);
		}
		$this->autoRender = false;
	}

	private function setActiveVendors()
	{
		$this->activeVendors = $this->Contact->getActiveVendors();
	}

	//this function get All DealerIds allowed to access specifically web alert list
	private function getDealerId($vendor)
	{
		$activeVendors = $this->activeVendors;

		$dealerIds = array();

		if(isset($activeVendors[$vendor]) && !empty($activeVendors[$vendor]))
		{
			foreach($activeVendors[$vendor] as $data)
			{
				array_push($dealerIds, $data['id']);
			}
		}

		return $dealerIds;
	}

	private function loadWebAlertGroups()
    {
        $webAlertList = array();
        $dealer_id = $this->Auth->user('dealer_id');

		$this->setActiveVendors();

		$this->setWebAlert();

        foreach($this->webAlert as $k => $webAlertData)
        {
			if($webAlertData['dealer_id'][0] != "all") {
	            //check if the current dealer has access to these web leads emails
	            if(!in_array($dealer_id, $webAlertData['dealer_id'])) { // && $this->Auth->user('group_id') != 9
	                continue;
	            }
			}

            $model = $webAlertData['model_name'];

            $webAlertList[$k] = $webAlertData;

            $this->loadModel($model);
            $emailList = $this->$model->find('all', array(
                'order' => 'email',
                'conditions' => array(
                    'dealer_id' => $this->Auth->user('dealer_id')
                )
            ));

            $webAlertList[$k]['email_list'] = $emailList;
        }

        return $webAlertList;
    }

	public function index(){

		$this->layout='default_new_settings';
        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$settings = $this->DealerSetting->find('all', array('conditions'=>array('DealerSetting.dealer_id'=>$dealer_id)));
		$dealer_settings = array();
		foreach($settings as $setting){
			$dealer_settings[ $setting['DealerSetting']['name'] ] =  $setting['DealerSetting']['value'];
		}
		$this->set('dealer_settings', $dealer_settings);
		$this->loadModel('Survey');
		$this->loadModel('SurveyGroup');
		$this->loadModel('BdcStatus');
		$this->loadModel('RecapCronEmail');
		$this->loadModel('WebleadResponseEmail');
		$this->loadModel('LeadScoreEmail');
		$emails=$this->SurveyGroup->find('all',array('order'=>'SurveyGroup.survey_id ASC','conditions'=>array('SurveyGroup.dealer_id'=>$this->Auth->user('dealer_id'))));

		$recap_emails = $this->RecapCronEmail->find('all',array('order'=>'RecapCronEmail.email','conditions'=>array('RecapCronEmail.dealer_id'=>$this->Auth->user('dealer_id'))));

		$weblead_response_emails = $this->WebleadResponseEmail->find('all',array('order'=>'WebleadResponseEmail.id DESC','conditions'=>array('WebleadResponseEmail.dealer_id'=>$this->Auth->user('dealer_id'))));

		$this->loadModel('BdcServicesGroupEmail');
		$BdcServicesGroupEmails = $this->BdcServicesGroupEmail->find('all',array('order'=>'BdcServicesGroupEmail.email','conditions'=>array('BdcServicesGroupEmail.dealer_id'=>$this->Auth->user('dealer_id'))));

		$this->loadModel('SetCcBccDefaultEmail');
		$SetCcBccDefaultEmail = $this->SetCcBccDefaultEmail->find('first', array('conditions' => array('dealer_id' => $this->Auth->user('dealer_id'))));
		$this->set('SetCcBccDefaultEmail',$SetCcBccDefaultEmail);


		$bdc_statuses=$this->BdcStatus->find('all',array('order'=>'BdcStatus.status_id ASC','conditions'=>array('BdcStatus.dealer_id'=>array(0,$this->Auth->user('dealer_id')),'BdcStatus.del_status'=>'no')));
		$lead_score_emails=$this->LeadScoreEmail->find('all',array('conditions'=>array('dealer_id'=>$this->Auth->user('dealer_id'))));
		$surveys = $this->Survey->find('list',array('conditions'=>array('id'=>array(2,3,4,5,11,13,14,15))));
		$this->set(compact('surveys','emails','bdc_statuses','recap_emails','lead_score_emails','BdcServicesGroupEmails','weblead_response_emails'));

		$this->loadModel('SoldAlertEmail');
		$SoldAlertEmails = $this->SoldAlertEmail->find('all',array('order'=>'SoldAlertEmail.email','conditions'=>array('SoldAlertEmail.dealer_id'=>$this->Auth->user('dealer_id'))));
		//debug($SoldAlertEmails);
		$this->set('SoldAlertEmails',$SoldAlertEmails);



		$this->loadModel('WebAlertEmail');
		$webAlertEmails = $this->WebAlertEmail->find('all',array('order'=>'WebAlertEmail.email','conditions'=>array('WebAlertEmail.dealer_id'=>$this->Auth->user('dealer_id'))));
		//debug($webAlertEmails);
		$this->set('webAlertEmails',$webAlertEmails);


		// Mgr Event Reminder group
		$this->loadModel('MgrEventReminderEmail');
		$MgrEventReminderEmails = $this->MgrEventReminderEmail->find('all',array('order'=>'MgrEventReminderEmail.email','conditions'=>array('MgrEventReminderEmail.dealer_id'=>$this->Auth->user('dealer_id'))));
		//debug($MgrEventReminderEmails);
		$this->set('MgrEventReminderEmails',$MgrEventReminderEmails);


		// Worksheet notification email
		$this->loadModel('WorksheetNotificationEmail');
		$worksheet_notification_emails = $this->WorksheetNotificationEmail->find('all',array('order'=>'WorksheetNotificationEmail.email','conditions'=>array('WorksheetNotificationEmail.dealer_id'=>$this->Auth->user('dealer_id'))));
		//debug($TraderWebAlertEmails);
		$this->set('worksheet_notification_emails',$worksheet_notification_emails);


		//Load the webleads and send to the view.
		$webLeads = $this->loadWebAlertGroups();
		$this->set('webleads', $webLeads);

		/* Workload Settings */
		$this->loadModel('WorkloadSetting');
		$WorkloadSettings = $this->WorkloadSetting->GetInsertHeaders( $dealer_id);
		$WorkloadSettingsNew = array();
		foreach($WorkloadSettings as $details){
			$WorkloadSettingsNew[$details['WorkloadSetting']['section']][] = $details;
		}
		$this->set('WorkloadSettings',$WorkloadSettingsNew);
		$this->loadModel('DealerName');
		$dealer_info=$this->DealerName->findByDealerId($dealer_id);
		$this->set('dealer_info',$dealer_info);


		//DType Settins
		$this->loadModel("Category");
		$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type <>' => ''), 'orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
		$d_type_options_popup = array();
		foreach($d_types as $d_type){
			$d_type_options_popup[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
		}
		$this->set('d_type_options_popup', $d_type_options_popup);

		//debug($d_type_options_popup);

		$this->LoadModel('SettingsDtype');
		$current_d_type_settings = $this->SettingsDtype->find('list', array( 'fields'=>array('SettingsDtype.dtype','SettingsDtype.status'), 'conditions' => array( 'SettingsDtype.dealer_id'=> $dealer_id)));
		$this->set('current_d_type_settings', $current_d_type_settings);
		//debug($current_d_type_settings);

		//Advanccd Round Robin Section
		$advanced_round_robin_dealer_setting = $this->DealerSetting->find('first', array('conditions'=>array('DealerSetting.name' => 'advanced_round_robin_rules', 'DealerSetting.dealer_id'=>$dealer_id)));
		$this->set('advanced_round_robin_dealer_setting',$advanced_round_robin_dealer_setting);

		$this->loadModel('SendMonthlyLeadContact');
		$send_lead_contact_details = $this->SendMonthlyLeadContact->find('all',array('order'=>'SendMonthlyLeadContact.email','conditions'=>array('SendMonthlyLeadContact.dealer_id'=>$this->Auth->user('dealer_id'))));
		$this->set('send_lead_contact_details',$send_lead_contact_details);

		$this->loadModel('CustomForm');

		//Added for shoals specifically
        $custom_forms_ids = array(9,10,15,17,22);
        $custom_form_dealer_ids = array(1224, 829, 830,5000);

        if($this->Auth->user('dealer_type') != 'RV') {
            $custom_forms_ids = array_diff($custom_forms_ids, [17]);
        }

        if (in_array($dealer_id, $custom_form_dealer_ids) || $this->Auth->user('id') == 232) {
            $custom_worksheet_forms = $this->CustomForm->find('all',array('conditions' => array('CustomForm.form_type' => array('worksheet','credit_app'))));
        } else {
            if($dealer_id == '182') {
                $custom_worksheet_forms = $this->CustomForm->find('all',array('conditions' => array('CustomForm.id' => $custom_forms_ids)));
            } else {
                $custom_forms_ids = array_diff($custom_forms_ids, [22]);
                $custom_worksheet_forms = $this->CustomForm->find('all',array('conditions' => array('CustomForm.id' => $custom_forms_ids)));
            }
        }

        $custom_forms = $this->CustomForm->find('all',array('conditions' => array('CustomForm.form_type' => 'custom_form')));

		$this->loadModel('DealerForm');
		$active_custom_form=$this->DealerForm->find('list',array('fields'=>'id,custom_form_id','conditions'=>array('dealer_id'=>$dealer_id,'print'=>0)));
		$active_print_form=$this->DealerForm->find('list',array('fields'=>'id,custom_form_id','conditions'=>array('dealer_id'=>$dealer_id,'print'=>1)));
		$this->set(compact('custom_forms','custom_worksheet_forms','active_custom_form','active_print_form'));

		$this->loadModel('Group');
		$groups = $this->Group->find('list', array('conditions'=>array('Group.id <>'=>array(1, 9))));
		//debug($groups);
		$this->set('groups',$groups);

       ///NPA API settings
                $this->loadModel('NpaapiSetting');
		$npa_setting = $this->NpaapiSetting->find('first',array('conditions'=>array('dealer_id'=>$dealer_id)));
                ///NPA API settings End
                $this->set(compact('npa_setting'));

		$this->loadModel('SendgridSubuser');
		$SendgridUserDetails = $this->SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$dealer_id)));
		$this->set('SendgridUserDetails',$SendgridUserDetails);


		$this->LoadModel('SettingsDealerspike');
		$current_SettingsDealerspike = $this->SettingsDealerspike->find('list', array(
			'fields'=>array('SettingsDealerspike.source','SettingsDealerspike.status'),
			'conditions' => array( 'SettingsDealerspike.dealer_id'=> $dealer_id)));
		$this->set('current_SettingsDealerspike', $current_SettingsDealerspike);

		//debug( $current_SettingsDealerspike );

		$this->LoadModel('LocationName');
		$locationNames = $this->LocationName->find('all', array('conditions' => array( 'LocationName.dealer_id'=> $dealer_id)));
		$this->set('locationNames', $locationNames);
		//debug($locationNames);


		$this->LoadModel('LeadChangeAlertEmail');
		$lead_change_alert_emails = $this->LeadChangeAlertEmail->find('all', array('conditions' => array( 'LeadChangeAlertEmail.dealer_id'=> $dealer_id)));
		$this->set('lead_change_alert_emails', $lead_change_alert_emails);
		if($dealer_id == 5000){
			//Contact Report Group emails
			$this->loadModel('ReportAlertEmail');
			$contact_alert_emails = $this->ReportAlertEmail->find('all',array('conditions' => array('dealer_id' => $dealer_id)));
			$this->set(compact('contact_alert_emails'));
		}

		// debug("duplicate lead alert");
		$this->LoadModel('DuplicateLeadAlert');
		$duplicateLeadAlert = $this->DuplicateLeadAlert->find("first", array("conditions"=>array("DuplicateLeadAlert.dealer_id" => $dealer_id)));
		//debug( $duplicateLeadAlert );
		$duplicateLeadAlert_recipients = array();
		if( !empty($duplicateLeadAlert) && $duplicateLeadAlert['DuplicateLeadAlert']['recipients'] != '' ){
			$duplicateLeadAlert_recipients = json_decode( $duplicateLeadAlert['DuplicateLeadAlert']['recipients'], true );
		}
		//debug($duplicateLeadAlert_recipients);
		$this->set('duplicateLeadAlert', $duplicateLeadAlert);
		$this->set('duplicateLeadAlert_recipients', $duplicateLeadAlert_recipients);

		$this->loadModel('NewLogAlert');
		$newlog_emails = $this->NewLogAlert->find('all',array('order'=>'NewLogAlert.email','conditions'=>array('NewLogAlert.dealer_id'=>$this->Auth->user('dealer_id'))));
		$this->set('newlog_emails',$newlog_emails);


		//Dormant lead alert
		$this->LoadModel('DormantLeadAlert');
		$dormantLeadAlert = $this->DormantLeadAlert->find("first", array("conditions"=>array("DormantLeadAlert.dealer_id" => $dealer_id)));
		//debug( $dormantLeadAlert );
		$dormantLeadAlert_recipients = array();
		if( !empty($dormantLeadAlert) && $dormantLeadAlert['DormantLeadAlert']['recipients'] != '' ){
			$dormantLeadAlert_recipients = json_decode( $dormantLeadAlert['DormantLeadAlert']['recipients'], true );
		}
		$this->set('dormantLeadAlert', $dormantLeadAlert);
		$this->set('dormantLeadAlert_recipients', $dormantLeadAlert_recipients);

		//Custom Event Types
		$this->LoadModel('EventType');
		$eventCustomTypes = $this->EventType->find("all", array("conditions"=>array("EventType.dealer_id" => $dealer_id)));
		$this->set('eventCustomTypes', $eventCustomTypes);


		// CASL Unsub Content
		$this->LoadModel('CaslUnsubscribe');
		$caslUnsubscribe = $this->CaslUnsubscribe->find("first", array("conditions"=>array("CaslUnsubscribe.dealer_id" => $dealer_id)));
		$caslUnsubscribe_content = "You have been successfully removed from this subscriber list.";
		if( !empty($caslUnsubscribe) ){
			$caslUnsubscribe_content = $caslUnsubscribe['CaslUnsubscribe']['content'];
		}
		$this->set('caslUnsubscribe_content', $caslUnsubscribe_content);

		// Calendar Invite Content
		$this->LoadModel('CalendarInviteContent');
		$calendar_invites = $this->CalendarInviteContent->find("first", array("conditions"=>array("CalendarInviteContent.dealer_id" => $dealer_id)));
		$calendar_invitation_data['subject'] = "Calendar event invitation";
		$calendar_invitation_data['content'] = "Please find attached calendar event invitation file";
		if( !empty($calendar_invites) ){
			$calendar_invitation_data['subject'] = $calendar_invites['CalendarInviteContent']['subject'];
			$calendar_invitation_data['content'] = $calendar_invites['CalendarInviteContent']['content'];
		}
		$this->set('calendar_invitation_data', $calendar_invitation_data);


	}


	public function add_lead_change_alert_group() {
		$this->LoadModel('LeadChangeAlertEmail');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LeadChangeAlertEmail->create();
		$this->LeadChangeAlertEmail->save(array('LeadChangeAlertEmail' => array(
			'dealer_id'=> $dealer_id,
			'email'=> $this->request->data['email']
		)));

		$lead_change_alert_emails = $this->LeadChangeAlertEmail->find('all', array('conditions' => array( 'LeadChangeAlertEmail.dealer_id'=> $dealer_id)));
		$this->set('lead_change_alert_emails', $lead_change_alert_emails);

	}

	public function delete_lead_change_alert_group() {
		$this->LoadModel('LeadChangeAlertEmail');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LeadChangeAlertEmail->id = $this->request->data['id'];
		$this->LeadChangeAlertEmail->delete();

		$lead_change_alert_emails = $this->LeadChangeAlertEmail->find('all', array('conditions' => array( 'LeadChangeAlertEmail.dealer_id'=> $dealer_id)));
		$this->set('lead_change_alert_emails', $lead_change_alert_emails);
		$this->render('add_lead_change_alert_group');
	}


	public function add_location() {
		$this->LoadModel('LocationName');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LocationName->create();
		$this->LocationName->save(array('LocationName' => array(
			'dealer_id'=> $dealer_id,
			'location_name'=> $this->request->data['location_name']
		)));

		$locationNames = $this->LocationName->find('all', array('conditions' => array( 'LocationName.dealer_id'=> $dealer_id)));
		$this->set('locationNames', $locationNames);

	}
	public function delete_location() {
		$this->LoadModel('LocationName');
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LocationName->id = $this->request->data['location_id'];
		$this->LocationName->delete();

		$locationNames = $this->LocationName->find('all', array('conditions' => array( 'LocationName.dealer_id'=> $dealer_id)));
		$this->set('locationNames', $locationNames);

	}


	public function add_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SurveyGroup');
		if ($this->request->is('post')) {

			$this->SurveyGroup->create();
			if ($this->SurveyGroup->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function delete_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('SurveyGroup');
		$this->SurveyGroup->id=$id;
		if ($this->SurveyGroup->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function edit_survey($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SurveyGroup');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->SurveyGroup->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		//return $this->redirect(array('action' => 'index'));
	}


	public function add_status()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('BdcStatus');
		$dealer_id = $this->Auth->user('dealer_id');
		if ($this->request->is('post')) {
			$cache_key = "bdc_statuses_".$dealer_id;
			$this->BdcStatus->create();
			if ($this->BdcStatus->save($this->request->data)) {
				$this->Session->setFlash(__('Status Added Successfully'));
				//clear cache
				$this->requestAction('manage_cache/clear_bdc_cache/'.$cache_key."/".$dealer_id);

				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save Status'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function set_cc_bcc_default_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SetCcBccDefaultEmail');
		$dealer_id = $this->Auth->user('dealer_id');
		if ($this->request->is('post')) {
            $this->SetCcBccDefaultEmail->create();
            $setting = $this->SetCcBccDefaultEmail->find('all', array('conditions' => array('SetCcBccDefaultEmail.dealer_id'=>$dealer_id)));
            if(!empty($setting))  $this->SetCcBccDefaultEmail->id = $setting['SetCcBccDefaultEmail']['id'];
			if ($this->SetCcBccDefaultEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Default CC and BCC Added/Updated Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save Status'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
		else
		{
			$this->request->data = $this->SetCcBccDefaultEmail->find('first', array('conditions' => array('dealer_id' => $dealer_id)));
		}
	}

	public function delete_status($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('BdcStatus');
		$this->BdcStatus->id=$id;
		if ($this->BdcStatus->delete()) {
			$this->Session->setFlash(__('Status deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Status could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function edit_status($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('BdcStatus');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->BdcStatus->save($this->request->data)) {
				$this->Session->setFlash(__('Status updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Status could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		//return $this->redirect(array('action' => 'index'));
	}


	public function add_recap_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('RecapCronEmail');
		if ($this->request->is('post')) {

			$this->RecapCronEmail->create();
			if ($this->RecapCronEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function add_weblead_response_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WebleadResponseEmail');
		if ($this->request->is('post')) {

			if(empty($this->request->data['WebleadResponseEmail']['id']))
			$this->WebleadResponseEmail->create();
			if ($this->WebleadResponseEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Saved Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function add_bdc_service_group_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('BdcServicesGroupEmail');
		if ($this->request->is('post')) {

			$this->BdcServicesGroupEmail->create();
			if ($this->BdcServicesGroupEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function add_send_contact_details(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SendMonthlyLeadContact');
		if ($this->request->is('post')) {
			$this->SendMonthlyLeadContact->create();
			if ($this->SendMonthlyLeadContact->save($this->request->data['SendMonthlyLeadContact'])) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
		die;
	}

	public function add_worksheet_notification_email(){

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WorksheetNotificationEmail');
		if ($this->request->is('post')) {

			$this->WorksheetNotificationEmail->create();
			if ($this->WorksheetNotificationEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Worksheet Notification Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}


	}

	public function add_sold_alert_email(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SoldAlertEmail');
		if ($this->request->is('post')) {

			$this->SoldAlertEmail->create();
			if ($this->SoldAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	/**
     * This function will add a new web alert for any model since they are in the previous list
     *
     * @return void
     *
     */
    public function add_web_alert_dealer()
    {
    	if ($this->request->is('post'))
        {
 			$this->setWebAlert();

            $formData = $this->request->data['WebLead'];
            $modelName = $this->webAlert[$formData['dealer_key']]['model_name'];

            $this->loadModel($modelName);

            $this->$modelName->create();

            if ($this->$modelName->save($formData)) {
             	$this->Session->setFlash(__('Email Added Successfully'));
            } else {
            	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
            }
        }

        $this->redirect(array('action' => 'index'));
    }

    /**
     * This function edit any web alert created
     *
     * @param String $dealerKey
     * @param Integer $id
     * @return view
	 *
	 */
	public function edit_web_alert_dealer($dealerKey = null, $id = null)
	{
		if(is_null($dealerKey) || is_null($id))
		{
			$this->Session->setFlash(__('Email Invalid.'),'alert', array('class' => 'alert-error'));
			$this->redirect(array('action' => 'index'));
		}

 		$this->setWebAlert();

        $modelName = $this->webAlert[$dealerKey]['model_name'];
        $this->loadModel($modelName);

        if($this->request->is('post') || $this->request->is('put'))
        {
        	if ($this->$modelName->save($this->request->data)) {
                $this->Session->setFlash(__('Email updated successfully'), 'alert', array('class' => 'alert-success'));
            } else {
            	$this->Session->setFlash(__('Email could not be updated try again'),'alert', array('class' => 'alert-error'));
            }
        }

        $this->request->data = $this->$modelName->find('first', array('conditions' => array('id' => $id)));

        $this->set('dealerKey', $dealerKey);
        $this->set('id', $id);
        $this->set('modelName', $modelName);

        $this->layout = false;
        $this->render('modal/edit_web_lead');
    }

    /**
     * This function delete any web alert
     *
     * @param String $dealerKey
     * @param Integer $id
     * @return void
     *
     */
    public function delete_web_alert_dealer($dealerKey = null, $id = null)
    {
        if(is_null($dealerKey) || is_null($id))
        {
            $this->Session->setFlash(__('Email Invalid.'),'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

 		$this->setWebAlert();

        $modelName = $this->webAlert[$dealerKey]['model_name'];
        $this->loadModel($modelName);

        $this->$modelName->id = $id;

        if($this->$modelName->delete()) {
            $this->Session->setFlash(__('Email deleted successfully'), 'alert', array('class' => 'alert-success'));
        } else {
            $this->Session->setFlash(__('Email could not be deleted try again'), 'alert', array('class' => 'alert-error'));
        }

        return $this->redirect(array('action' => 'index'));
    }

	public function add_web_alert(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WebAlertEmail');
		if ($this->request->is('post')) {

			$this->WebAlertEmail->create();
			if ($this->WebAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function add_mgr_event_reminder(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('MgrEventReminderEmail');
		if ($this->request->is('post')) {

			$this->MgrEventReminderEmail->create();
			if ($this->MgrEventReminderEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Mgr. event reminder recipient Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function add_not_worked_lead_alert(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('NotWorkedAlertEmail');
		if ($this->request->is('post')) {

			$this->NotWorkedAlertEmail->create();
			if ($this->NotWorkedAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function delete_recap_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('RecapCronEmail');
		$this->RecapCronEmail->id=$id;
		if ($this->RecapCronEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_weblead_response_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('WebleadResponseEmail');
		$this->WebleadResponseEmail->id=$id;
		if ($this->WebleadResponseEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function delete_bdc_service_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('BdcServicesGroupEmail');
		$this->BdcServicesGroupEmail->id=$id;
		if ($this->BdcServicesGroupEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}











	public function delete_send_contact_details($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('SendMonthlyLeadContact');
		$this->SendMonthlyLeadContact->id=$id;
		if ($this->SendMonthlyLeadContact->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function delete_sold_web_alert($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('SoldAlertEmail');
		$this->SoldAlertEmail->id=$id;
		if ($this->SoldAlertEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_web_alert($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('WebAlertEmail');
		$this->WebAlertEmail->id=$id;
		if ($this->WebAlertEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_worksheet_notification_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('WorksheetNotificationEmail');
		$this->WorksheetNotificationEmail->id = $id;
		if ($this->WorksheetNotificationEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_mgr_event_recipient($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('MgrEventReminderEmail');
		$this->MgrEventReminderEmail->id=$id;
		if ($this->MgrEventReminderEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_notworked_lead_alert($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('NotWorkedAlertEmail');
		$this->NotWorkedAlertEmail->id=$id;
		if ($this->NotWorkedAlertEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function edit_bdc_service_group_email($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('BdcServicesGroupEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->BdcServicesGroupEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}

	}

	public function edit_worksheet_notification_email(){

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WorksheetNotificationEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->WorksheetNotificationEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}

	}



	public function edit_recap_email($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('RecapCronEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->RecapCronEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		//return $this->redirect(array('action' => 'index'));
	}

	public function edit_web_alert($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WebAlertEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->WebAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function edit_sold_alert($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('SoldAlertEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->SoldAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function mgr_event_reminder_edit($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('MgrEventReminderEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->MgrEventReminderEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function notworked_edit_web_alert($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('NotWorkedAlertEmail');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->NotWorkedAlertEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Not Worked Lead Email Updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function add_lead_score_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('LeadScoreEmail');
		if ($this->request->is('post')) {

			$this->LeadScoreEmail->create();
			if ($this->LeadScoreEmail->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function delete_lead_score_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('LeadScoreEmail');
		$this->LeadScoreEmail->id=$id;
		if ($this->LeadScoreEmail->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function list_daily_door_counts(){
		$this->layout = 'ajax';
		date_default_timezone_set($this->Auth->user('zone'));
		$dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('DealerDoorcount');
		$daily_door_counts = $this->DealerDoorcount->find('all', array('conditions'=>
			array(
				'DealerDoorcount.dealer_id'=>$dealer_id,
				'date_format(DealerDoorcount.log_date,\'%Y-%m\')' => date('Y-m')
			)
		,'order'=>array('DealerDoorcount.created ASC')));
		//debug($daily_door_counts);
		$this->set('daily_door_counts',$daily_door_counts);
	}


	public function add_dealer_doorcounts() {
		$this->autoRender = false;
		$this->loadModel('DealerDoorcount');
		if ($this->request->is('post')) {

			date_default_timezone_set($this->Auth->user('zone'));
			$created = date('Y-m-d H:i:s');
			debug($created);
			$this->request->data['DealerDoorcount']['created'] = $created;

			$this->DealerDoorcount->create();
			if ($this->DealerDoorcount->save($this->request->data)) {
				$this->Session->setFlash(__('Daily Door Counts Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save Daily Door Counts'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}

		}

	}

	public function list_dealer_registers(){
		$this->layout = 'ajax';
		date_default_timezone_set($this->Auth->user('zone'));
		$dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('DealerRegister');
		$dealer_registers = $this->DealerRegister->find('all', array('conditions'=>
			array(
				'DealerRegister.dealer_id'=>$dealer_id,
				'date_format(DealerRegister.log_date,\'%Y-%m\')' => date('Y-m')
			)
		,'order'=>array('DealerRegister.created ASC')));
		//debug($dealer_registers);
		$this->set('dealer_registers',$dealer_registers);
	}

	public function add_dealer_registers() {
		$this->autoRender = false;
		$this->loadModel('DealerRegister');
		if ($this->request->is('post')) {

			date_default_timezone_set($this->Auth->user('zone'));
			$created = date('Y-m-d H:i:s');
			debug($created);
			$this->request->data['DealerRegister']['created'] = $created;

			$this->DealerRegister->create();
			if ($this->DealerRegister->save($this->request->data)) {
				$this->Session->setFlash(__('Daily POS Count Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save Daily POS Count'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}

		}

	}


	public function workload_settings(){
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('WorkloadSetting');
		if ($this->request->is('post')) {
			if(!isset($this->request->data['WorkloadSetting']['active'])){
				$this->request->data['WorkloadSetting']['active'] = 0;
			}
			if ($this->WorkloadSetting->save($this->request->data['WorkloadSetting'])) {
				$this->Session->setFlash(__('Header updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Header could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		die;

	}


	function activate_workload_header(){
		$active = $this->request->query['active'];
		$id = $this->request->query['id'];
		if($active=="true"){
			$status = 1;
		}else{
			$status = 0;
		}
		$this->loadModel('WorkloadSetting');
		//echo "UPDATE workload_settings SET `active`=$status WHERE id = $id";
		$this->WorkloadSetting->query("UPDATE workload_settings SET `active`=$status WHERE id = $id");
		die;

	}

	public function set_service_day_offset($offset=2)
	{
		$this->loadModel('DealerName');
		$dealer_id=$this->Auth->user('dealer_id');
		$this->DealerName->updateAll(array('service_day_offset'=>$offset),array('dealer_id'=>$dealer_id));
		die;
	}

	public function move_lead_deal($status=0)
	{
		$this->loadModel('DealerName');
		$dealer_id=$this->Auth->user('dealer_id');
		$this->DealerName->updateAll(array('move_lead'=>$status),array('dealer_id'=>$dealer_id));
		die;
	}


          ///NPA setting API info save

	function create_npa_user(){
		$dealer_id = $this->Auth->user('dealer_id');
		$this->LoadModel('NpaapiSetting');
                $current_settings = $this->NpaapiSetting->find('first', array('conditions' => array('NpaapiSetting.dealer_id'=> $dealer_id)));

                $data['NpaapiSetting']['username']=$this->request->query['user'];
                $data['NpaapiSetting']['password']=$this->request->query['password'];


	if (!empty($current_settings)) {
            $this->NpaapiSetting->id = $current_settings['NpaapiSetting']['id'];
//            $this->NpaapiSetting->save($data);
        } else {
            $data['NpaapiSetting']['active'] = 1;
            $data['NpaapiSetting']['dealer_id']=$dealer_id;
            $this->NpaapiSetting->id = null;
        }
        if($this->NpaapiSetting->save($data)) {
                echo "success";
                die;
            } else {
                echo 'Unsuccessful! Something went wrong. Please try later';
                die;
            }

	}

        ///NPA setting API info save End



	public function bdc_alert_status($status=0)
	{
		$this->loadModel('DealerName');
		$dealer_id=$this->Auth->user('dealer_id');
		$this->DealerName->updateAll(array('bdc_alert'=>$status),array('dealer_id'=>$dealer_id));
		die;
	}

	public function custom_forms(){
		$this->layout=null;
		$this->autoRender=false;
		if($this->request->is('post')){
			$this->loadModel('DealerForm');
			$dealer_id=$this->Auth->user('dealer_id');
			$form_id=$this->request->data['form_id'];
			$form_type=$this->request->data['form_type'];
			$form_print=$this->request->data['form_print'];
			if($this->request->data['action']=='delete')
			{
				$this->DealerForm->deleteAll(array('custom_form_id'=>$form_id,'dealer_id'=>$dealer_id,'print'=>$form_print));
			}else{
				$save_data['DealerForm']=array('custom_form_id'=>$form_id,'form_type'=>$form_type,'dealer_id'=>$dealer_id,'print'=>$form_print);
				$this->DealerForm->create();
				$this->DealerForm->save($save_data);
			}
		}
		die;
	}

	public function insert_dealer_forms()
	{
		$this->layout = null;
		$this->autoRender =false;
		$this->loadModel('DealerForm');
		$this->loadModel('DealerName');
		$other_form_ids =array(9=>'worksheet',10 => 'worksheet',15=>'credit_app');
		$all_dealers = $this->DealerName->find('list',array('fields' => 'id,dealer_id','conditions'=>array('NOT'=>array('dealer_id' => array(1224, 829, 830,5000)))));
		foreach($all_dealers as $dealer){
			foreach($other_form_ids as $f_id => $f_type){
				$is_exist = $this->DealerForm->find('first',array('conditions' => array('custom_form_id'=>$f_id,'dealer_id'=>$dealer,'print'=>0)));
				if(empty($is_exist))
				{
					$save_data['DealerForm']=array('custom_form_id'=>$f_id,'form_type'=>$f_type,'dealer_id'=>$dealer,'print'=>0);
					$this->DealerForm->create();
					$this->DealerForm->save($save_data);
				}
			}
		}

	}

	public function upload_coupon_image()
	{
		$this->autoRender=false;

		if($this->request->is('post'))
		{
			$this->loadModel('DealerName');
			/*if($this->request->data['DealerName']['coupon_image']['error']==4)
			{
				unset($this->request->data['DealerName']['coupon_image']);
			}*/
			if($this->request->data['DealerName']['dealer_logo']['error']==4)
			{
				unset($this->request->data['DealerName']['dealer_logo']);
			}
			$this->DealerName->save($this->request->data);
		}
		$this->redirect(array('action'=>'index'));

	}

	function create_sendgrid_user(){
		$dealer_id = $this->Auth->user('dealer_id');

		$this->loadModel("SendgridSubuser");
		$details = $this->SendgridSubuser->find('first',array('conditions'=>array('dealer_id'=>$dealer_id)));
		if(empty($details)){
			$this->SendgridSubuser->create();
			$this->SendgridSubuser->save(array('SendgridSubuser'=>array(
				'dealer_id'=>$dealer_id,
				'username'=>$this->request->query['user'],
				'password'=>$this->request->query['password']
			)));

		}else{
			$this->SendgridSubuser->id = $details['SendgridSubuser']['id'];
			$this->SendgridSubuser->saveField("username", $this->request->query['user']);
			$this->SendgridSubuser->saveField("password", $this->request->query['password']);
		}

		// $response = $this->Utility->AddSubUser($dealer_id,$this->request->query['user'],$this->request->query['password']);
		// $response_decoded = json_decode($response);
		// $response_decoded = (array) $response_decoded;
		// if($response_decoded['message']=='error'){
		// 	$errors = implode(" - ",$response_decoded['errors']);
		// 	echo $errors;die;
		// }elseif($response_decoded['message']=='success'){
		// 	echo "success";die;
		// }else{
		// 	echo 'Unsuccessful! Something went wrong. Please try later';
		// 	die;
		// }

		echo "success";
		$this->autoRender = false;

	}




	/*

Function Name: list_xmlinventory()
Description: It is used for listing the inventories.
Return: It will return the list of inventories.

*/

	public function list_xmlinventory(){

		$this->layout='default_new';
		$dealer_id = $this->Auth->user('dealer_id');
		$this->loadModel('XmlInventory');
		$search=$this->data[XmlInventory][Search];
		$where = array();
        $conditions = array();

        if ($search != null) {
            $this->paginate=array('conditions'=>array('OR'=>array('XmlInventory.vehtype LIKE'=>"%$search%",'XmlInventory.bodysubtype LIKE'=>"%$search%",'XmlInventory.category_name LIKE' =>"%$search%",'XmlInventory.condition LIKE' =>"%$search%",'XmlInventory.year LIKE' =>"%$search%",'XmlInventory.make LIKE' =>"%$search%",'XmlInventory.model LIKE' =>"%$search%",'XmlInventory.price LIKE' =>"%$search%",'XmlInventory.vin LIKE' =>"%$search%",'XmlInventory.dealername LIKE' =>"%$search%",'XmlInventory.address LIKE' =>"%$search%",'XmlInventory.city LIKE' =>"%$search%",'XmlInventory.state LIKE' =>"%$search%",'XmlInventory.zipcode LIKE' =>"%$search%",'XmlInventory.telephone LIKE' =>"%$search%",'XmlInventory.email LIKE' =>"%$search%",'XmlInventory.url LIKE' =>"%$search%",'XmlInventory.stocknumber LIKE' =>"%$search%",'XmlInventory.color LIKE' =>"%$search%",'XmlInventory.miles LIKE' =>"%$search%",'XmlInventory.description LIKE' =>"%$search%",'XmlInventory.sold LIKE' =>"%$search%",'XmlInventory.created LIKE' =>"%$search%")),'limit'=>10);
        }else{
			$this->paginate=array('conditions'=>array('XmlInventory.dealerid'=>$dealer_id),'limit'=>10);
		}

		$inventory = $this->paginate('XmlInventory');
		$this->set('inventory',$inventory);
	}

	public function process_qr($id){

			if($this->Auth->User()  == null){
				$this->redirect(array('controller' => 'users', 'action' => 'login', '?'=>array('qr_redirect'=>$id) ));
			}

			$pass = $this->Auth->User();
			$this->loadModel("User");
			$APIKEY	 = $this->User->find('first',array('conditions'=>array('User.id'=>$pass['id'])));
			$this->set('apikey', $APIKEY['User']['password']);


			$this->layout = 'default_login';
			if ($id != null) {
				$this->loadModel('XmlInventory');
				$this->XmlInventory->id = $id;

				if (!$this->XmlInventory->exists()) {
					throw new NotFoundException(__('Invalid Inventory'));
				}

				$dealer_id = $this->Auth->user('dealer_id');
				if($dealer_id==''){
					$details = $this->XmlInventory->find('first',array('conditions'=>array('XmlInventory.id'=>$id)));
					/*if(!empty($details)){
						$dealer_id=$details['XmlInventory']['dealerid'];
						$this->loadModel('User');
						$login_user=$this->User->find("first",array('conditions'=>array('User.rand_code'=>$rand)));
						if(!empty($login_user)){
							$user_active=array();
							$user_active['User']['id'] = $login_user['User']['id'];
							$user_active['User']['username'] = $login_user['User']['username'];
							$user_active['User']['password'] = $login_user['User']['password'];
							$user_active['User']['first_name'] = $login_user['User']['first_name'];
							$user_active['User']['last_name'] = $login_user['User']['last_name'];
							$user_active['User']['full_name'] = $login_user['User']['full_name'];
							$user_active['User']['group_id'] = $login_user['User']['group_id'];
							$user_active['User']['email'] = $login_user['User']['email'];
							$user_active['User']['dealer_id'] = $dealer_id;

							$this->Auth->login($user_active['User']);
						}else{
							$this->redirect($this->Auth->logout());
						}
					}
					*/
				}
				$this->set('xml_inv_id',$id);
		}
	}

	/*

	Function Name: detail_xmlinventory()
	Description: It is used for detailing the inventories.
	Parameter: User id and Random number.
	Return: It will return the complete detail of inventories.

	*/

	public function detail_xmlinventory($id){


		$this->layout = 'default_login';
		$details=array();
		if ($id != null) {
			$this->loadModel('XmlInventory');
            $this->XmlInventory->id = $id;

			if (!$this->XmlInventory->exists()) {
                throw new NotFoundException(__('Invalid Inventory'));
            }

			$dealer_id = $this->Auth->user('dealer_id');
			$details = $this->XmlInventory->find('first',array('conditions'=>array('XmlInventory.id'=>$id,'XmlInventory.dealerid'=>$dealer_id)));
			$this->set('details',$details);
		}

	}

public function update_dealer_password()
{
	$this->layout = null;
	$this->autoRender = false;
	if($this->request->is('post')){
		$this->loadModel('DealerName');
		$dealer_id = $this->Auth->user('dealer_id');
		$dealer_password = $this->request->data['DealerName']['dealer_password'];
		$this->DealerName->updateAll(array('DealerName.dealer_password' =>"'".$dealer_password."'"),array('DealerName.dealer_id' => $dealer_id));
	}
	$this->redirect(array('controller' => 'dealer_settings', 'action' => 'index'));

}

public function save_contact_alert_group()
{
	$dealer_id = $this->Auth->user('dealer_id');
	$this->loadModel('ReportAlertEmail');
	if($this->request->is('post')){
		$action = $this->request->data['action'];
		if($action == 'add'){
			$email = $this->request->data['email'];
			$save_data['ReportAlertEmail']['email'] = $email;
			$save_data['ReportAlertEmail']['dealer_id'] = $dealer_id;
			$this->ReportAlertEmail->create();
			$this->ReportAlertEmail->save($save_data);
		}else{
			$this->ReportAlertEmail->delete($this->request->data['id']);
		}

	}
	$all_emails = $this->ReportAlertEmail->find('all',array('conditions' => array('dealer_id' => $dealer_id)));
	$this->set(compact('all_emails'));
}

public function save_option_group_setting()
	{

        if ($this->request->is('post')) {

            //debug($this->request->data);
            $dealer_id = $this->Auth->user('dealer_id');
			$setting_name = $this->request->data['setting'];
            $settings = $this->DealerSetting->find('first', array('conditions' => array('DealerSetting.name' => $setting_name, 'DealerSetting.dealer_id' => $dealer_id)));
            //debug($settings);
            if (empty($settings)) {
                $this->DealerSetting->create();
                $this->DealerSetting->save(array('DealerSetting' => array(
                        'name' => $setting_name,
                        'value' => implode(",", $this->request->data['checked']),
                        'dealer_id' => $dealer_id
                        )));
            } else {
                $this->DealerSetting->id = $settings['DealerSetting']['id'];
				$settings['DealerSetting']['value'] = implode(",", $this->request->data['checked']);
                $this->DealerSetting->save($settings);

            }
        }
        $this->autoRender = false;

	}

	public function add_newlog_email()
	{
		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('NewLogAlert');
		if ($this->request->is('post')) {

			$this->NewLogAlert->create();
			if ($this->NewLogAlert->save($this->request->data)) {
				$this->Session->setFlash(__('Email Added Successfully'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save email'), 'alert', array('class' => 'alert-error'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function edit_newlog_email($id = null) {

		$this->layout=null;
		$this->autoRender=false;
		$this->loadModel('NewLogAlert');
		if($this->request->is('post')|| $this->request->is('put'))
		{

			if ($this->NewLogAlert->save($this->request->data)) {
				$this->Session->setFlash(__('Email updated successfully'),'alert',
						array(

							'class' => 'alert-success'
						));
			} else {
				$this->Session->setFlash(__('Email could not be updated try again'),'alert',
						array(

							'class' => 'alert-error'
						));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function delete_newlog_email($id = null) {

		$this->request->onlyAllow('post', 'delete');
		$this->loadModel('NewLogAlert');
		$this->NewLogAlert->id=$id;
		if ($this->NewLogAlert->delete()) {
			$this->Session->setFlash(__('Email deleted successfully'),'alert',
					array(

						'class' => 'alert-success'
					));
		} else {
			$this->Session->setFlash(__('Email could not be deleted try again'),'alert',
					array(

						'class' => 'alert-error'
					));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function save_calendar_invite(){
		if ($this->request->is('post')) {

			$this->loadModel("CalendarInviteContent");

			$subject = $this->request->data['subject'];
			$content = $this->request->data['content'];

			$dealer_id = $this->Auth->user('dealer_id');
			$settings = $this->CalendarInviteContent->find('first', array('conditions'=>array('CalendarInviteContent.dealer_id'=>$dealer_id)));
			//debug($settings);
			if(empty($settings)){
				$this->CalendarInviteContent->create();
				$this->CalendarInviteContent->save(array('CalendarInviteContent'=>array(
					'subject'=> $subject,
					'content'=> $content,
					'dealer_id'=>$dealer_id
				)));
			}else{
				App::uses('Sanitize', 'Utility');
				$this->CalendarInviteContent->updateAll(array(
					'subject'=>"'".Sanitize::escape($subject)."'",
					'content'=>"'".Sanitize::escape($content)."'",
					'dealer_id'=>$dealer_id
				), array('CalendarInviteContent.id'=> $settings['CalendarInviteContent']['id']) );
			}
		}
		$this->autoRender = false;
	}

	public function creat_modelobj($objname){
	    $this->autoRender=FALSE;
	        $this->loadModel($objname);
	        $this->$objname->find('all',array('order'=>$objname.'.email','conditions'=>array($objname.'.dealer_id'=>$this->Auth->user('dealer_id'))));
		exit('Done!!!');
	}


}
