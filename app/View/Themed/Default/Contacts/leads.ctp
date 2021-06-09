</br></br>
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
if ($step_procces === "lemco_steps") {
    $options = array('Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<div class="innerLR">



			<div class="widget widget-body-white">
				<div class="widget-body">
					<div class="row">
						<?php echo $this->Form->create('Contact', array('url' => array_merge(array('action' => 'search_result'), $this->params['pass']),'autocomplete'=>"off", 'class' => 'form-inline no-ajaxify')); ?>
						<div class="col-md-3">
							<button type="submit" id="btn-submit-search" class="btn btn-inverse pull-right no-ajaxify"><i class="icon-search"></i></button>
							<div class="overflow-hidden">
								<?php						
								echo $this->Form->input('search_all2', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'placeholder' => 'Other Search'), array('div' => false, 'id' => 'ContactSearchAll2'));
								?>						
							</div>
						</div>
						<div class="col-md-3">
							<?php
							echo $this->Form->select('search_all', array(
								'Open' => 'Open',
								'Closed' => 'Closed',
								$datetimeshort => 'Today',
								$yesterday => 'Yesterday',
								$month => 'This Month',
								$lastmonth => 'Last Month',
								'Web Lead' => 'Web Lead',
								'Phone Lead' => 'Phone Lead',
								'Showroom' => 'Showroom',
								$options
							), array('div' => false, 'selected'=>$selected_type, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
						</div>
						<?php echo $this->Form->end(); ?>
						
						<div class="col-md-4">
							<button class="btn btn-inverse" data-toggle="collapse" data-target="#advance-search"><i class="fa fa-search"></i> Advance Search</button>
						</div>
						
					</div>
					
					<div id="advance-search" class="collapse">
					<div class="innerAll">
						<!-- Advance search -->
						<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array_merge(array('action' => 'search_result'), $this->params['pass']),'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>
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
								<?php echo $this->Form->select('search_sales_step', $options, array(
									'empty' => 'Select',
									'selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								$options = array(
									'Open Deals' => array(
										'Web Lead Arrived' => 'Web Lead Arrived',
										'MGR Move Web Lead' => 'MGR Move Web Lead',
										'Call Web Lead' => 'Call Web Lead',
										'Meeting Web Lead' => 'Meeting Web Lead',
										'Web Lead Sold' => 'Web Lead Sold',
										'Web Lead Follow Up' => 'Web Lead Follow Up',
										'Call In' => 'Call In',
										'Call Out' => 'Call Out',
										'Reminder Call' => 'Reminder Call',
										'Thank you Call' => 'Thank you Call',
										'Special Events Call' => 'Special Events Call',
										'F/I Reminder Call' => 'F/I Reminder Call',
										'Meeting Phone Lead' => 'Meeting Phone Lead',
										'Phone Lead Sold' => 'Phone Lead Sold',
										'Phone Lead Follow Up' => 'Phone Lead Follow Up',
										'Showroom Visit' => 'Showroom Visit',
										'Showroom Return' => 'Showroom Return',
										'Showroom Meeting' => 'Showroom Meeting',
										'Showroom Sold' => 'Showroom Sold',
										'Showroom Follow Up' => 'Showroom Follow Up',
										'Events Meeting' => 'Events Meeting',
										'Events Sold' => 'Events Sold',
										'Events Follow Up' => 'Events Follow Up',
								
									),
									'Closed Deals' => array(
										'Dead Lead' => 'Dead Lead',
										'Not in Stock' => 'Not in Stock',
										'Price To High' => 'Price To High',
										'Dealer not trade' => 'Dealer not trade',
										'Bad Credit' => 'Bad Credit',
										'Needs Cosign' => 'Needs Cosign',
										'Down Payment' => 'Down Payment',
										'Bought Elsewhere' => 'Bought Elsewhere',
										'Credit Turndown' => 'Credit Turndown'
									),
									'Call Center' => array(
										'Refferal Call 1m' => 'Refferal Call 1m',
										'Refferal Call 3m' => 'Refferal Call 3m',
										'Refferal Call 6m' => 'Refferal Call 6m',
										'Refferal Call 12m' => 'Refferal Call 12m',
										'Refferal Call 18m' => 'Refferal Call 18m',
										'Trade Call 24m' => 'Trade Call 24m',
										'Trade Call 30m' => 'Trade Call 30m',
										'Trade Call 36m' => 'Trade Call 36m'
									),
									'Rental' => array(
										'Rental Showroom' => 'Rental Shoowroom',
										'Rental Call In' => 'Rental Call In',
										'Rental Call Out' => 'Rental Call Out',
										'Rental Meeting' => 'Rental Meeting',
										'Rental Trade' => 'Rental Trade',
										'Rental Follow Up' => 'Rental Follow Up'
									)
								);
								echo $this->Form->label('search_status','Status:'); 
								echo $this->Form->select('search_status', $options, array(
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
										'Morning' => 'Morning',
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
									'options' => array(
										'Walk in' => 'Walk in',
										'Sign' => 'Sign',
										'Website' => 'Website',
										'Mobile Lead' => 'Mobile Lead',
										'Refferal' => 'Refferal',
										'Did Not Ask' => 'Did Not Ask',
										'Buliding' => 'Buliding',
										'Previous Customer' => 'Previous Customer',
										'Event' => 'Event',
										'Bike Night' => 'Bike Night',
										'Craigslist' => 'Craigslist',
										'Ebay' => 'Ebay',
										'Moto lease Flyer' => 'Moto lease Flyer',
										'Parts Customer' => 'Parts Customer',
										'Service Customer' => 'Service Customer',
										'Emailer' => 'Emailer'
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
					<div class="col-md-4 listWrapper">
						<div id="search-result-content">
						</div>
					</div>
					<div class="col-md-8 detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div id="lead_details_content">
						</div>
					</div>
				</div>
				
			</div>
		</div>
	<!-- // Widget END -->
	</div>
		

		
	
</div>
<script >
	
$script.ready(['core', 'plugins_dependency', 'plugins'], function(){
	
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
	
});

$script.ready(['core'], function(){
	
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
				
				$("#advance-search").collapse('toggle');
				
			}
		});
		return false;
	});
	
	//quick search
	$("#btn-submit-search").click(function(event){
		$("#search-result-content").html("");
		$('.ajax-loading').removeClass('hide');
		event.preventDefault();
		var search_url = $(this).closest('form').attr('action') + "/search_all2:"+$("#ContactSearchAll2").val()+"/search_all:"+$("#ContactSearchAll").val()+"/search_all_value:";
		$.ajax({
			type: "POST",
			url:  search_url,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		return false;
	});

	
});
</script>

