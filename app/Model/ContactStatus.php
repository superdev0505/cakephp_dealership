<?php
class ContactStatus extends AppModel {
	//public $hasMany = array('Contact'=>array('className'=>'Contact'));
	//public $displayField = 'name';

 	public function PriceRangeOptions(){

 		return array(
	 		'0-5'=>'$0-$5k',
	 		'5-10'=>'$5k-$10k',
	 		'10-20'=>'$10k-$20k',
	 		'20-30'=>'$20k-$30k',
	 		'30-40'=>'$30k-$40k',
	 		'40-50'=>'$40k-$50k',
	 		'50-100'=>'$50k-$100k',
	 		'100+'=>'$100k +'
 		);
 	}

 	public function PriceRangeNonRvOptions(){
 		
 		$dealer_id =  CakeSession::read("Auth.User.dealer_id");
		$price_ranges = array();

		App::import('model','Dealer');
		$this->Dealer = new Dealer;
		$dealer = $this->Dealer->find('first', array('conditions'=>  array('Dealer.dealer_num'=> $dealer_id ) ));
		// debug($dealer);
		
		if(!empty($dealer)){
			App::import('model','PriceRange');
			$this->PriceRange = new PriceRange;
			$price_ranges = $this->PriceRange->find('list', array(
				'order' => array("PriceRange.order"),
				'fields' => array("PriceRange.value", "PriceRange.name"),
				'conditions'=>  array('PriceRange.dealer_id'=> $dealer['Dealer']['id'] ) 
			));

			//debug( $price_ranges );
		}

		if(empty($price_ranges)){
			$price_ranges = array(
		 		'0-5'=>'$0-$5k',
		 		'5-10'=>'$5k-$10k',
		 		'10-20'=>'$10k-$20k',
		 		'20-30'=>'$20k-$30k',
		 		'30-40'=>'$30k-$40k',
		 		'40-50'=>'$40k-$50k',
		 		'50-100'=>'$50k-$100k',
		 		'100+'=>'$100k +'
 			);
		}

		//debug( $price_ranges );
 		return $price_ranges;

 	}

 	public $FloorPlansOptions  = array(
 		
		'bunkhouse'=>'BunkHouse',
		'camper' => 'Camper',
		'cargo' => 'Cargo',
		'frontbath' => 'FrontBath',
		'frontbedroom' => 'FrontBedroom',
		'frontbunkhouse' => 'FrontBunkhouse',
		'frontdinette' => 'FrontDinette',
		'frontentertainment'=>'FrontEntertainment',
		'frontkitchen' => 'FrontKitchen',
		'frontqueen' => 'FrontQueen',
		'frontsleeper' => 'FrontSleeper',
		'hybrid' => 'Hybrid',
		'islandkitchen' => 'IslandKitchen',
		'motorhome' => 'MotorHome',
		'outside kitchen floorplan' => 'Outside Kitchen Floorplan',
		'rearbath' => 'RearBath',
		'rearbedroom' => 'RearBedroom',
		'rearbunks' => 'RearBunks',
		'reardinette' => 'RearDinette',
		'rearentertainment' => 'RearEntertainment',
		'rearkitchen' => 'RearKitchen',
		'rearliving'=>'RearLiving',
		'rearlivingroom' => 'RearLivingRoom',
		'rearlounge' => 'RearLounge',
		'rearsofa' => 'RearSofa',
		'toyhauler' => 'ToyHauler'
	 	
 	);

 	public $LengthOptions  = array(
 		'0-24'=>'Up to 24 ft',
		'25-29'=>'25 ft. - 29 ft.',
 		'30-34'=>'30 ft. - 34 ft.',
 		'35+'=>'35 ft. and Above',
 	);

 	public $WeightOptions  = array(
 		'0-4000'=>'0-4000 lb',
	 	'4001-7500'=>'4001-7500 lb',
	 	'7501+'=>'7501 lb +',
 	);

 	public $SleepsOptions  = array(
 		'2'=>'Sleeps 2',
	 	'3'=>'Sleeps 3',
	 	'4'=>'Sleeps 4',
	 	'5'=>'Sleeps 5',
	 	'6'=>'Sleeps 6',
	 	'7'=>'Sleeps 7',
	 	'8'=>'Sleeps 8',
	 	'9'=>'Sleeps 9',
	 	'10'=>'Sleeps 10',
 	);

 	public $FuelTypeOptions  = array(
 		'diesel'=>'Diesel',
 		'gas'=>'Gas',
 		'propane' => 'Propane'
 	);

 	public $DncStatusOptions  = array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');






	public function get_dealer_steps($dealer_id, $step_procces = 'lemco_steps'){

		App::import('model','StepDefinition');
		$StepDefinition = new StepDefinition;

		$current_definition = $StepDefinition->find('all', array('conditions' => array('StepDefinition.visible' => 1 ,  'StepDefinition.dealer_id'=> $dealer_id, 'not' => array('StepDefinition.custom_name'=> null))));
		//debug($current_definition);

		if(!empty($current_definition)){

			$has_order = $current_definition[1]['StepDefinition']['step_order'];
			if($has_order){
				$current_def = $StepDefinition->find('all', array('order' => array("StepDefinition.step_order ASC"),
					'conditions' => array('StepDefinition.visible' => 1 ,'StepDefinition.dealer_id'=> $dealer_id, 'not' => array('StepDefinition.custom_name'=> null) ) ));
			}else{
				$current_def = $StepDefinition->find('all', array('order' => array("StepDefinition.id ASC"),
					'conditions' => array('StepDefinition.visible' => 1 ,'StepDefinition.dealer_id'=> $dealer_id,'not' => array('StepDefinition.custom_name'=> null) ) ));
			}
			foreach ($current_def as $curr_def) {
				$sales_step_options_popup[ $curr_def['StepDefinition']['step_id']  ] = $curr_def['StepDefinition']['custom_name'];
			}

			return $sales_step_options_popup;

		}else{

			$step_map = array();
			foreach($current_definition as $cd){
				$step_map[ $cd['StepDefinition']['step_id'] ] = $cd['StepDefinition'];
			}

			App::import('model','SalesStep');
			$SalesStep = new SalesStep;

			$step_cond = array();
			if($step_procces == 'lemco_steps'){
				$step_cond = array('SalesStep.step_process'=>'lemco_steps');
			}else{
				$step_cond = array('SalesStep.step_process'=>'hd_steps');
			}
			$sales_steps = $SalesStep->find('all', array('conditions'=>$step_cond));
			//debug( $sales_steps );

			$sales_step_options_popup = array();
			foreach($sales_steps as $sales_step){

				$step_label =  $sales_step['SalesStep']['step'];

				if(isset( $step_map[  $sales_step['SalesStep']['id']  ]    )){
					$step_label = $step_map[  $sales_step['SalesStep']['id']  ]['custom_name'];
					if( !$step_map[  $sales_step['SalesStep']['id']  ]['visible']  ){
						continue;
					}
				}else{
					if($sales_step['SalesStep']['default_hidden'] == 1){
						continue;
					}
				}
				$sales_step_options_popup [ $sales_step['SalesStep']['id'] ] =  $step_label;
			}

			return  $sales_step_options_popup;
		}

	}















}

/*


[{"Key":301,"Name":"Engine","Value":"","IsHeader":true},
{"Key":311,"Name":"Engine","Value":"Toro Premium 4-cycle OHV, 8.0 ft-lbs gross torque","IsHeader":false},
{"Key":341,"Name":"Displacement","Value":"163cc","IsHeader":false},
{"Key":2031,"Name":"Features","Value":"","IsHeader":true},
{"Key":2721,"Name":"Ignition","Value":"Electronic","IsHeader":false},
{"Key":3221,"Name":"Starter","Value":"Electric","IsHeader":false},
{"Key":1801,"Name":"Drive System","Value":"Power Propel™ Drive","IsHeader":false},
{"Key":241,"Name":"Fuel Capacity","Value":"1.1 Quarts / 1 L","IsHeader":false},
{"Key":3301,"Name":"Note","Value":"Throws snow up to 35' / 11 m range, and up to 1800 lbs. / 818 kg per minute / Auger System: Power Curve®



*/
