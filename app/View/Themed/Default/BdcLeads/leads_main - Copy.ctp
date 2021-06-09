</br></br>
<style>
#list_lead_search_result ul li{
	display: block !important;
}
</style>
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-1 month', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<?php 
$selected_lead_type = (isset($this->request->params['pass'][0]))? $this->request->params['pass'][0] : "" ;
?>
<div class="innerLR">
			
			<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
			
			<div class="widget widget-body-white">
				<div class="widget-body">
					
					<div class="row">
						<?php echo $this->Form->create('Contact', array('url' => array('action' => 'search_result','load_first') ,'autocomplete'=>"off", 'class' => 'form-inline no-ajaxify')); ?>
						<div class="col-md-3">
							<?php
							echo $this->Form->select('search_all', array(
								'Open' => 'Open',
								'open_this_month' => 'Open Month ('.$stats_month_name.')',
								'Closed' => 'Closed',
								'closed_this_month' => 'Closed Month ('.$stats_month_name.')',
								$datetimeshort => 'Today',
								$yesterday => 'Yesterday',
								$month => 'This Month',
								'last_month' => 'Last Month',
								'Web Lead' => 'Web Lead',
								'Dorment' => 'Dorment',
								'Phone Lead' => 'Phone Lead',
								'Mobile Lead' => 'Mobile Lead',
								'Showroom' => 'Showroom',
								$sales_step_options,
								'sold_this_month' => 'Sold Month ('.$stats_month_name.')',
							), array('div' => false, 'selected'=>$selected_type, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
						</div>
						<div class="col-md-3">
							<button type="submit" id="btn-submit-search" class="btn btn-inverse pull-right no-ajaxify"><i class="icon-search"></i></button>
							<div class="overflow-hidden">
								<?php						
								echo $this->Form->input('search_all2', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'placeholder' => 'Other Lead Search'), array('div' => false, 'id' => 'ContactSearchAll2'));
								?>						
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
						
						<div class="col-md-6">
							<button class="btn btn-inverse" data-toggle="collapse" data-target="#advance-search"><i class="fa fa-search"></i> Advance Lead Search</button>
							<button class="btn btn-inverse" id="form_reset_button" type="button">Reset</button>
						
							
							<?php if(isset($this->params->query['mainsearch'])){ ?>
								<a id="lnk_add_new_lead" href="<?php echo $this->Html->url(array('action'=>'leads_input', 'selected_lead_type'=>$selected_lead_type, '?'=>$this->params->query )); ?>" class="btn btn-success" ><i class="fa fa-plus"></i> New Lead</a>	
							<?php }else{ ?>
									<a id="lnk_add_new_lead" href="<?php echo $this->Html->url(array('action'=>'leads_input', 'selected_lead_type'=>$selected_lead_type)); ?>" class="btn btn-success" ><i class="fa fa-plus"></i> New Lead</a>								
							<?php } ?>
						
						</div>
						
					</div>
					
					<div id="advance-search" class="collapse">
					<div class="innerAll">
						<!-- Advance search -->
						<?php 
						echo $this->Form->create('Contact', array('type'=>'GET','url' => array('action' => 'search_result', 'load_first', 'selected_lead_type'=> $selected_lead_type   ) ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>
						<div class="row">
							<div class="col-md-2">
								<?php echo $this->Form->label('search_lead_status','Open/Close:'); ?>
								<?php echo $this->Form->input('search_lead_status', array('type' => 'select', 'options' => array('Open' => 'Open', 'Closed' => 'Closed'),'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
								<?php echo $this->Form->input('search_contact_status_id', array(
									'type' => 'select',
									'options' => array(
										'5' => 'Web Lead',
										'6' => 'Phone Lead',
										'7' => 'Showroom',
										'8' => 'Parts',
										'9' => 'Service',
										'10' => 'Call Center',
										'11' => 'Rental'
									),
									'empty' => 'Select','selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_sales_step','Step:'); ?>
								<?php echo $this->Form->select('search_sales_step', $sales_step_options, array(
									'empty' => 'Select',
									'selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2" style="2px solid red;">
								<?php

								echo $this->Form->label('search_status','Status:'); 
								echo $this->Form->select('search_status', $lead_status_options, array(
									'empty' => 'Select',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php 
								echo $this->Form->label('search_gender','Gender:'); 
								echo $this->Form->input('search_gender', array(
									'type' => 'select',
									'options' => array(
										'Male' => 'Male',
										'Female' => 'Female'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_best_time','Best Time:'); 
								echo $this->Form->input('search_best_time', array(
									'type' => 'select',
									'options' => array(
										'Anytime' => 'Anytime',
										'Morining' => 'Morining',
										'Mid Day' => 'Mid Day',
										'Afternoon' => 'Afternoon',
										'Evening' => 'Evening'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_buying_time','Buying Time:'); 
								echo $this->Form->input('search_buying_time', array(
									'type' => 'select',
									'options' => array(
										'now' => 'now',
										'5days' => '5days',
										'10days' => '10days',
										'15days' => '15days',
										'20days' => '20days',
										'30days' => '30days',
										'40days' => '40days',
										'50days' => '50days',
										'60days' => '60days',
										'70days' => '70days',
										'80days' => '80days',
										'90days' => '90days',
										'120days' => '120days',
										'180days' => '180days',
										'6Months' => '6Months',
										'9Months' => '9Months',
										'1year' => '1year',
										'2year' => '2year'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_source','Source:'); 
								echo $this->Form->input('search_source', array(
									'type' => 'select',
									'options' => $lead_sources_options,
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('stock_num','Stock:'); 
								echo $this->Form->input('stock_num', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('stock_num_trade','Stock#/T:'); 
								echo $this->Form->input('stock_num_trade', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_id','Ref#:'); 
								echo $this->Form->input('search_id', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_first_name','First:'); 
								echo $this->Form->input('search_first_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'FName'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_last_name','Last:'); 
								echo $this->Form->input('search_last_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'LName'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_phone','Phone:'); 
								echo $this->Form->input('search_phone', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Phone'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_mobile','Mobile:'); 
								echo $this->Form->input('search_mobile', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Mobile'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_email','Email:'); 
								echo $this->Form->input('search_email', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Email'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_condition','Unit Condtion:'); 
								echo $this->Form->input('search_condition', array(
									'type' => 'select',
									'options' => array(
										'New' => 'New',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_year','Year:'); 
								echo $this->Form->input('search_year', array(
									'type' => 'select',
									'options' => array(
										'2014' => '2014',
										'2013' => '2013',
										'2012' => '2012',
										'2011' => '2011',
										'2010' => '2010',
										'2009' => '2009',
										'2008' => '2008',
										'2007' => '2007',
										'2006' => '2006',
										'2005' => '2005',
										'2004' => '2004',
										'2003' => '2003',
										'2002' => '2002',
										'2001' => '2001',
										'2000' => '2000'
									),
									'empty' => 'selected',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_make','Make:'); 
								echo $this->Form->input('search_make', array(
									'type' => 'select',
									'options' => array(
										'American Ironhorse' => 'American Ironhorse',
										'Anderson MA' => 'Anderson MA',
										'Aprilia' => 'Aprilia',
										'Arctic Cat' => 'Arctic Cat',
										'Argo' => 'Argo',
										'ATK' => 'ATK',
										'ASPT' => 'ASPT',
										'Benelli' => 'Benelli',
										'Big Bear Choppers' => 'Big Bear Choppers',
										'Big Dog' => 'Big Dog',
										'Bimota' => 'Bimota',
										'BMW' => 'BMW',
										'Bombardier' => 'Bombardier',
										'Boss Hoss' => 'Boss Hoss',
										'Buell' => 'Buell',
										'Bultaco' => 'Bultaco',
										'Bush Hog' => 'Bush Hog',
										'Bushtec' => 'Bushtec',
										'Can-Am' => 'Can-Am',
										'Cannondale' => 'Cannondale',
										'Continental' => 'Continental',
										'Cobra' => 'Cobra',
										'Dinli' => 'Dinli',
										'Ducati' => 'Ducati',
										'Down to Ear' => 'Down to Ear',
										'E-TON' => 'E-TON',
										'Excelsior-Henderson' => 'Excelsior-Henderson',
										'Gas Gas' => 'Gas Gas',
										'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
										'Harley-Davidson' => 'Harley-Davidson',
										'Hannigan' => 'Hannigan',
										'Honda' => 'Honda',
										'Husaberg' => 'Husaberg',
										'Husqvarna' => 'Husqvarna',
										'Hyosung' => 'Hyosung',
										'Indian' => 'Indian',
										'John Deere' => 'John Deere',
										'Kasea' => 'Kasea',
										'Karavan' => 'Karavan',
										'Kawasaki' => 'Kawasaki',
										'KTM' => 'KTM',
										'Kubota' => 'Kubota',
										'KYMCO' => 'KYMCO',
										'LEM' => 'LEM',
										'Lehman Trikes' => 'Lehman Trikes',
										'Maico' => 'Maico',
										'Magic Tilt' => 'Magic Tilt',
										'Moto Guzzi' => 'Moto Guzzi',
										'Motor-Trike' => 'Motor-Trike',
										'Moto-Ski' => 'Moto-Ski',
										'Motovation' => 'Motovation',
										'MV Agusta' => 'MV Agusta',
										'Neosho' => 'Neosho',
										'Nuko' => 'Nuko',
										'Piaggio' => 'Piaggio',
										'Polaris' => 'Polaris',
										'Performance' => 'Perfromance',
										'Rupp' => 'Rupp',
										'Roadsmith' => 'Roadsmith',
										'Royal Enfield' => 'Royal Enfield',
										'Schwinn' => 'Schwinn',
										'SDG' => 'SDG',
										'Sea-Doo' => 'Sea-Doo',
										'Shuttle Craf' => 'Shutle Craf',
										'Shorelandr' => 'Shorelandr',
										'Ski-Doo' => 'Ski-Doo',
										'Snow Hawk' => 'Snow Hawk',
										'Suzuki' => 'Suzuki',
										'SYM' => 'SYM',
										'Swift' => 'Swift',
										'Squire' => 'Squire',
										'TM' => 'TM',
										'Thunder Mountain' => 'Thunder Mountain',
										'Tomberlin' => 'Tomberlin',
										'Triumph' => 'Triumph',
										'Qlink' => 'Qlink',
										'United Motors' => 'United Motors',
										'Ural' => 'Ural',
										'Vespa' => 'Vespa',
										'Victory' => 'Victory',
										'VOR' => 'VOR',
										'Yamaha' => 'Yamaha',
										'Wells fargo' => 'Wells Fargo',
										'Watsonian' => 'Watsonian',
										'Zero' => 'Zero'
									),
									'empty' => 'Select',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_model','Model:'); 
								echo $this->Form->input('search_model', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_type','Unit Type:'); 
								echo $this->Form->input('search_type', array(
									'type' => 'select',
									'options' => array(
'ATV' => 'ATV',
'Car' => 'Car',
'Cruiser/Vtwin' => 'Cruiser/Vtwin',
'Dirt Bike' => 'Dirt Bike',
'Go Kart' => 'Go Kart',
'PWC' => 'PWC',
'Scooter' => 'Scooter',
'Side x Side' => 'Side x Side',
'Side Car' => 'Side Car',
'Trailer' => 'Trailer',
'Trike' => 'Trike',
'Snowmobile' => 'Snowmobile',
'Street Bikes' => 'Street Bikes',
'Utility Vehicle' => 'Utility Vehicle',
'UTV' => 'UTV',
'RV Class A' => 'RV Class A',
'RV Class B' => 'RV Class B',
'RV Class C' => 'RV Class C',
'Destination' => 'Destination',
'Expandable Trailer' => 'Expandable Trailer',
'Fifth Wheel' => 'Fifth Wheel',
'Toy Hauler ' => 'Toy Hauler ',
'Travel Trailer' => 'Travel Trailer',
'Truck Camper' => 'Truck Camper',
'Bass Boat' => 'Bass Boat',
'Bowrider Boat' => 'Bowrider Boat',
'Center Console Boat' => 'Center Console Boat',
'Cruiser Boat' => 'Cruiser Boat',
'Cuddy Cabin Boat' => 'Cuddy Cabin Boat',
'Deck Boat' => 'Deck Boat',
'Fishing Boat' => 'Fishing Boat',
'Performance Boat' => 'Performance Boat',
'Pontoon Boat' => 'Pontoon Boat',
'Ski/Wakeboard Boat' => 'Ski/Wakeboard Boat',
'Utility Boat' => 'Utility Boat',
'Yacht' => 'Yacht'
									),
									'empty' => 'Select',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_condition_trade','Trade Condition:'); 
								echo $this->Form->input('search_condition_trade', array(
									'type' => 'select',
									'options' => array(
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>	
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_year_trade','Trade Year:'); 
								echo $this->Form->input('search_year_trade', array(
									'type' => 'select',
									'options' => array(
										'2014' => '2014',
										'2013' => '2013',
										'2012' => '2012',
										'2011' => '2011',
										'2010' => '2010',
										'2009' => '2009',
										'2008' => '2008',
										'2007' => '2007',
										'2006' => '2006',
										'2005' => '2005',
										'2004' => '2004',
										'2003' => '2003',
										'2002' => '2002',
										'2001' => '2001',
										'2000' => '2000'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_make_trade','Trade Make:'); 
								echo $this->Form->input('search_make_trade', array(
									'type' => 'select',
									'options' => array(
										'American Ironhorse' => 'American Ironhorse',
										'American Ironhorse' => 'American Ironhorse',
										'Anderson MA' => 'Anderson MA',
										'Aprilia' => 'Aprilia',
										'Arctic Cat' => 'Arctic Cat',
										'Argo' => 'Argo',
										'ATK' => 'ATK',
										'ASPT' => 'ASPT',
										'Benelli' => 'Benelli',
										'Big Bear Choppers' => 'Big Bear Choppers',
										'Big Dog' => 'Big Dog',
										'Bimota' => 'Bimota',
										'BMW' => 'BMW',
										'Bombardier' => 'Bombardier',
										'Boss Hoss' => 'Boss Hoss',
										'Buell' => 'Buell',
										'Bultaco' => 'Bultaco',
										'Bush Hog' => 'Bush Hog',
										'Bushtec' => 'Bushtec',
										'Can-Am' => 'Can-Am',
										'Cannondale' => 'Cannondale',
										'Continental' => 'Continental',
										'Cobra' => 'Cobra',
										'Dinli' => 'Dinli',
										'Ducati' => 'Ducati',
										'Down to Ear' => 'Down to Ear',
										'E-TON' => 'E-TON',
										'Excelsior-Henderson' => 'Excelsior-Henderson',
										'Gas Gas' => 'Gas Gas',
										'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
										'Harley-Davidson' => 'Harley-Davidson',
										'Hannigan' => 'Hannigan',
										'Honda' => 'Honda',
										'Husaberg' => 'Husaberg',
										'Husqvarna' => 'Husqvarna',
										'Hyosung' => 'Hyosung',
										'Indian' => 'Indian',
										'John Deere' => 'John Deere',
										'Kasea' => 'Kasea',
										'Karavan' => 'Karavan',
										'Kawasaki' => 'Kawasaki',
										'KTM' => 'KTM',
										'Kubota' => 'Kubota',
										'KYMCO' => 'KYMCO',
										'LEM' => 'LEM',
										'Lehman Trikes' => 'Lehman Trikes',
										'Maico' => 'Maico',
										'Magic Tilt' => 'Magic Tilt',
										'Moto Guzzi' => 'Moto Guzzi',
										'Motor-Trike' => 'Motor-Trike',
										'Moto-Ski' => 'Moto-Ski',
										'Motovation' => 'Motovation',
										'MV Agusta' => 'MV Agusta',
										'Neosho' => 'Neosho',
										'Nuko' => 'Nuko',
										'Piaggio' => 'Piaggio',
										'Polaris' => 'Polaris',
										'Performance' => 'Perfromance',
										'Rupp' => 'Rupp',
										'Roadsmith' => 'Roadsmith',
										'Royal Enfield' => 'Royal Enfield',
										'Schwinn' => 'Schwinn',
										'SDG' => 'SDG',
										'Sea-Doo' => 'Sea-Doo',
										'Shuttle Craf' => 'Shutle Craf',
										'Shorelandr' => 'Shorelandr',
										'Ski-Doo' => 'Ski-Doo',
										'Snow Hawk' => 'Snow Hawk',
										'Suzuki' => 'Suzuki',
										'SYM' => 'SYM',
										'Swift' => 'Swift',
										'Squire' => 'Squire',
										'TM' => 'TM',
										'Thunder Mountain' => 'Thunder Mountain',
										'Tomberlin' => 'Tomberlin',
										'Triumph' => 'Triumph',
										'Qlink' => 'Qlink',
										'United Motors' => 'United Motors',
										'Ural' => 'Ural',
										'Vespa' => 'Vespa',
										'Victory' => 'Victory',
										'VOR' => 'VOR',
										'Yamaha' => 'Yamaha',
										'Wells fargo' => 'Wells Fargo',
										'Watsonian' => 'Watsonian',
										'Zero' => 'Zero'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_model_trade','Trade Model:'); 
								echo $this->Form->input('search_model_trade', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_trade_type','Trade Type:'); 
								echo $this->Form->input('search_trade_type', array(
									'type' => 'select',
									'options' => array(
										'ATV' => 'ATV',
										'Boat' => 'Boat',
										'Car' => 'Car',
										'Cruiser/Vtwin' => 'Cruiser/Vtwin',
										'Dirt Bike' => 'Dirt Bike',
										'Go Kart' => 'Go Kart',
										'PWC' => 'PWC',
										'RV' => 'RV',
										'Scooter' => 'Scooter',
										'Side x Side' => 'Side x Side',
										'Side Car' => 'Side Car',
										'Trailer' => 'Trailer',
										'Trike' => 'Trike',
										'Snowmobile' => 'Snowmobile',
										'Street Bikes' => 'Street Bikes',
										'Utility Vehicle' => 'Utility Vehicle',
										'UTV' => 'UTV'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_unit_color','Unit Color:'); 
								echo $this->Form->input('search_unit_color', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_usedunit_color','Trade Color:'); 
								echo $this->Form->input('search_usedunit_color', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_created','Search Start Date:'); 
								echo $this->Form->input('search_created', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_modified','Search End Date:'); 
								echo $this->Form->input('search_modified', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<button type="button" data-toggle="collapse" data-target="#advance-search" class="btn btn-danger no-ajaxify"><i class="fa fa-times"></i> Close</button> &nbsp;
									<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Filter</button>
								</div>
							</div>
						</div>
						
						<?php echo $this->Form->end(); ?>
						<!-- // Advance search end -->
					</div>
				</div>
				</div>
			</div>	

	<!-- Widget -->
	<div class="wizard">
	
		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">
				
				<div class="row row-merge">
					<div class="col-md-3 listWrapper">
						<div id="search-result-content" style="max-height: 500px; overflow: auto;"></div>
					</div>
					<div class="col-md-9 detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div id="lead_details_content"></div>
					</div>
				</div>
				
			</div>
		</div>
	
	</div>
<!-- // Widget END -->		

</div>

<!-- Modal -->
<div class="modal fade" id="modal-2">
	
	<div class="modal-dialog" style="width: 850px;">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				
				<div class="row">
	
					<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array('action' => 'search_result', 'selected_lead_type'=> ""   ) ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>

					<div class="col-md-4">
						<?php						
						echo $this->Form->input('search_mobile', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Cell'), array('div' => false));
						?>		
					</div>
					<div class="col-md-4">
						<?php						
						echo $this->Form->input('search_phone', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Phone'), array('div' => false));
						?>		
					</div>
					<div class="col-md-4">
						<?php						
						echo $this->Form->input('search_first_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'First Name'), array('div' => false));
						?>		
					</div>
					<div class="col-md-4">
						<button type="submit" id="submit_advance_search_filter" class="btn btn-inverse pull-right no-ajaxify"><i class="icon-search"></i></button>
						<div class="overflow-hidden">
							<?php						
							echo $this->Form->input('search_last_name', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Last Name'), array('div' => false));
							?>						
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				
				
				
			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-primary" data-dismiss="modal">Ok</a>
			</div>
		</div>
	</div>
	
</div>
<!-- // Modal END -->

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	
	function display_pending_notpending(query_type){
		$("#search-result-content").html("");
		$('.ajax-loading').removeClass('hide');
		var search_url = "/contacts/search_result/load_first/search_all2:"+query_type+"/search_all:"+query_type+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
		$.ajax({
			type: "GET",
			cache: false,
			url:  search_url,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
	}
	
	
	
	search_current_month = true;
	
	$("#form_reset_button").click(function() {
        $('#ContactLeadsForm2').find('input, select').each(function() {
            $(this).val('');
        });
		$('#ContactLeadsMainForm').find('input, select').each(function() {
            $(this).val('');
        });
		
    });
	

		$(".alert").delay(3000).fadeOut("slow");
	
		
		<?php if( isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'view'){ ?>
		
		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts/search_result/load_first/contact_id:<?php echo $this->request->params['pass']['1']; ?>/",
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		
		
		<?php }else if( isset($this->request->params['pass']['0'])){ ?>

		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts/search_result/load_first/selected_lead_type:<?php echo $selected_lead_type; ?>/?search_contact_status_id=<?php echo $this->request->params['pass']['0']; ?>",
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
		
		<?php
		//load newly added/edited leads
		if( isset($load_lead)){ ?>
		$("#lead_details_content").html("&nbsp;");
		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'lead_details', 'selected_lead_type'=>$selected_lead_type, $load_lead )); ?>",
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		<?php 
		} ?>
	
		
		$("#ContactSearchCreated").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchModified').bdatepicker('setStartDate', startDate);
			
		});
		
		$("#ContactSearchModified").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchCreated').bdatepicker('setEndDate', FromEndDate);
		});
		
		//advance search
		$("#submit_advance_search_filter").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
					$("#advance-search").collapse('hide');
				}
			});
			return false;
		});
		
		//quick search
		$("#btn-submit-search").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url = $(this).closest('form').attr('action') + "/search_all2:"+$("#ContactSearchAll2").val()+"/search_all:"+$("#ContactSearchAll").val()+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
		
		
		<?php if(isset($this->params->query['search_sales_step'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchSalesStep").val("<?php echo $this->params->query['search_sales_step']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
	
		<?php if(isset($this->params->query['search_status'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchStatus").val("<?php echo $this->params->query['search_status']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
		<?php if(isset($this->params->query['search_type'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchType").val("<?php echo $this->params->query['search_type']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
	
		
		<?php if(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'mobile_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('mobile_lead_pending');
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'mobile_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('mobile_lead_notpending');
			
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'showroom_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('showroom_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'showroom_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('showroom_lead_notpending');
		
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'phone_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('phone_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'phone_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('phone_lead_notpending');
			
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'web_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('web_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'web_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('web_lead_notpending');		
			
			
			
			
		<?php }else if(isset($this->params->query['quick_lead_search'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchAll").val("<?php echo $this->params->query['quick_lead_search']; ?>");	
		$("#btn-submit-search").trigger('click');
		<?php } ?>
		
		
		<?php if(isset($this->params->query['mainsearch'])){ ?>
		search_current_month = false;
		$("#ContactSearchPhone").val("<?php echo $this->params->query['search_phone']; ?>");
		$("#ContactSearchMobile").val("<?php echo $this->params->query['search_mobile']; ?>");
		$("#ContactSearchFirstName").val("<?php echo $this->params->query['search_first_name']; ?>");
		$("#ContactSearchLastName").val("<?php echo $this->params->query['search_last_name']; ?>");
		
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
			}
		});
		
		<?php } ?>
		
		
		
		//load todays leads if search and viwe area is empty
		if( $("#lead_details_content").html() == "" && $("#search-result-content").html() == "" && search_current_month == true){
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				url:  "/contacts/search_result/load_first/selected_lead_type:<?php echo $selected_lead_type; ?>/?search_current_month=123",
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
		}
		
		
		/*
		$("#lnk_add_new_lead").click(function(){
			
			
			
			
		
		});
		*/
		
		
		
	
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

