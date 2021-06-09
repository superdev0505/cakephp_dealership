</br>
<?php
$timezone = AuthComponent::user('zone');
//echo $timezone;
?>
<?php
$sperson = AuthComponent::user('username');
//echo $sperson;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeshort = date('mdY');
//echo $datetimeshort;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeslash = date('m/d/Y');
//echo $datetimeslash;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimetext = date('Y-m-d H:i:s');
//echo $datetimetext;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;
?>
<?php
$company = AuthComponent::user('dealer');
// echo $x;
$companyid = AuthComponent::user('dealer_id');
// echo $x;
?>
<!-- get salesperson (user ful name) -->
<?php
//$x = AuthComponent::user('full_name');
// echo $x;
?>

<br />
<br />
<br />
<?php //debug( $this->request->data ); ?>
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-8">
			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head">
						<ul>
							<li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>Lead Contact Info</a></li>
							<li><a href="#tab2-1" class="glyphicons road" data-toggle="tab"><i></i>Vechicle</a></li>
							<li><a href="#tab3-1" class="glyphicons tag" data-toggle="tab"><i></i>Trade-In</a></li>
							<li><a href="#tab4-1" class="glyphicons notes" data-toggle="tab"><i></i>Notes</a></li>
							<li><a href="#tab5-1" class="glyphicons alarm" data-toggle="tab"><i></i>Appointment</a></li>
							<li><a href="#tab6-1" class="glyphicons list" data-toggle="tab"><i></i>History</a></li>
						</ul>
					</div>
					<!-- // Widget heading END -->
					<div class="widget-body"> <?php echo $this->Form->create('Contact', array( 'type' => 'post', 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
						<?php echo $this->Form->input('id'); ?>
						<?php //echo $this->Form->input('sperson', array('type' => 'hidden', 'value' => "$x", 'class' => 'input-small', 'readonly' => 'true')); ?>

						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane active" id="tab1-1">
								<div class="row">
									<div class="col-md-3">
										<input type="hidden"  id="inputTitle" class="col-md-6 form-control" value="123" />
										<font color="red">*</font> <?php echo $this->Form->label('contact_status_id','Lead Type:', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('contact_status_id', array('type' => 'select', 'options' => array(
'12' => 'Mobile Lead',
'5' => 'Web Lead',
'6' => 'Phone Lead',
'7' => 'Showroom',
'8' => 'Parts',
'9' => 'Service',
'10' => 'Call Center',
'11' => 'Rental'
), 'empty' => 'Select',  'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<font color="red">*</font> <?php echo $this->Form->label('sales_step','Step:', array('class'=>'strong')); ?>
										<?php
										echo $this->Form->select('sales_step',$sales_step_options , array(
										'empty' => 'Select',
										'required' => 'required',
										'class' => 'form-control' ,'style'=>'width: 100%'
										));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">

										<?php echo $this->Form->hidden('status'); ?>
										<?php echo $this->Form->label('status','<font color="red">*</font>Status:', array('class'=>'strong')); ?></br>

										<a  href="#modal-2" id="btn_status_modal" data-toggle="modal" class="btn btn-default btn-stroke"><i class="fa fa-edit"></i></a>



										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('lead_status','Open/Close:', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('lead_status', array(
'options'=>array('Open' => 'Open','Closed' => 'Closed'),
'empty' => '',
'label'=>false,
'div'=>false,
'required' => 'required',
'class' => 'form-control','style'=>'width: 100%'
));
?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('first_name', array('type' => 'text','label'=>false,'div'=>false,'required' => 'required', 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('last_name','Last Name:'); ?> <?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('address','Address:', array('class'=>'strong')); ?> <?php echo $this->Form->input('address', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('city','City:'); ?> <?php echo $this->Form->input('city', array('type' => 'text',  'class' => 'col-md-1 form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <?php echo $this->Form->label('state','State:', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('state', array('type' => 'select',
'options' => array(
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
), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false, 'selected' => $this->request->input['Contact']['state'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('zip','Zip:'); ?> <?php echo $this->Form->input('zip', array('type' => 'text', 'class' => 'col-md-1 form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?> <?php echo $this->Form->input('gender', array('type' => 'select', 'options' => array(
'Male' => 'Male',
'Female' => 'Female'
), 'empty' => 'Select', 'required' => 'required','label'=>false,'div'=>false, 'selected' => $this->request->input['Contact']['gender'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('phone','Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('mobile','Cell:'); ?> <?php echo $this->Form->input('mobile', array('type' => 'text','required' => 'required','class' => 'form-control')); ?>
										<div class="separator bottom"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('email','Email:', array('class'=>'strong')); ?> <?php echo $this->Form->input('email', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('best_time','Best Time:', array('class'=>'strong')); ?> <?php echo $this->Form->input('best_time', array('type' => 'select', 'options' => array(
'Anytime' => 'Anytime',
'Morning' => 'Morning',
'Mid Day' => 'Mid Day',
'Afternoon' => 'Afternoon',
'Evening' => 'Evening'
), 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['best_time'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('buying_time','Buying Time:', array('class'=>'strong')); ?> <?php echo $this->Form->input('buying_time', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['buying_time'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('source','Source:', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('source', array('type' => 'select', 'options' => $lead_sources_options, 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['source'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('zone','TimeZone:'); ?>
										<?php
echo $this->Form->input('zone', array(
'type' => 'text',
'disabled' => 'true',
'value' => "$zone",
'label'=>false,'div'=>false,
'class' => 'form-control','style'=>'width: 100%'
));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('created_full_date','Date:'); ?>
										<?php
echo $this->Form->input('created_full_date', array(
'type' => 'text',
'disabled' => 'true',
'value' => "$datetimefullview",
'label'=>false,'div'=>false,
'class' => 'form-control','style'=>'width: 100%'
));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('sperson','Sales Person:'); ?> <?php echo $this->Form->input('sperson', array('type' => 'text','label'=>false,'div'=>false, 'disabled' => 'true', 'class' => 'form-control','value'=>$sperson)); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Step 1 END -->
							<!-- Step 2 -->
							<div class="tab-pane" id="tab2-1">
								<div class="row">
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('unit_value','Value/Unit:'); ?> <?php echo $this->Form->input('unit_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue', 'required' => 'required', 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('stock_num','Stock#'); ?> <?php echo $this->Form->input('stock_num', array(
'type' => 'text',
'required' => 'required',
'label'=>false,'div'=>false,
'class' => 'form-control'
));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('condition','Condition:'); ?>
										<?php
echo $this->Form->input('condition', array('type' => 'select', 'required' => 'required', 'options' => array(
'New' => 'New',
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('year','Year:'); ?> <?php echo $this->Form->input('year', array('type' => 'select', 'required' => 'required', 'options' => array('2014' => '2014',
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
'2000' => '2000',
), 'empty' => 'selected','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['year'],  'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('make','Make:'); ?> <?php echo $this->Form->input('make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
'Zero' => 'Zero',
), 'empty' => 'Select', 'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['make'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('model','Model:'); ?> <?php echo $this->Form->input('model', array('type' => 'text', 'required' => 'required', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('type','Unit Type:'); ?> <?php echo $this->Form->input('type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
'Yacht' => 'Yacht'), 'empty' => 'Select',  'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['type'], 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('engine','Engine:'); ?> <?php echo $this->Form->input('engine', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <?php echo $this->Form->label('vin','Vin Number #:'); ?> <?php echo $this->Form->input('vin', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('odometer','Miles:'); ?> <?php echo $this->Form->input('odometer', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('unit_color','Color:'); ?> <?php echo $this->Form->input('unit_color', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Step 2 END -->
							<!-- Step 3 -->
							<div class="tab-pane" id="tab3-1">
								<div class="row">
									<div class="col-md-3"> <?php echo $this->Form->label('trade_value','(Trade) Value:'); ?> <?php echo $this->Form->input('trade_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactTradeValue', 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('stock_num_trade','(Trade) Stock#'); ?> <?php echo $this->Form->input('stock_num_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('condition_trade','(Trade) Condition:'); ?> <?php echo $this->Form->input('condition_trade', array('type' => 'select', 'options' => array(
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition_trade'],'style'=>'width: 100%','class' => 'form-control'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('year_trade','(Trade) Year:'); ?> <?php echo $this->Form->input('year_trade', array('type' => 'select', 'options' => array(
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
'2000' => '2000',
), 'empty' => 'Select','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['year_trade'],'style'=>'width: 100%','class' => 'form-control'));
?>
										<div class="separator"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> <?php echo $this->Form->label('make_trade','(Trade) Make:'); ?> <?php echo $this->Form->input('make_trade', array('type' => 'select', 'options' => array('American Ironhorse' => 'American Ironhorse', 'American Ironhorse' => 'American Ironhorse',
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
'Zero' => 'Zero',
), 'empty' => 'Select','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['make_trade'],'style'=>'width: 100%','class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('model_trade','(Trade) Model:'); ?> <?php echo $this->Form->input('model_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('type_trade','(Trade) Type:'); ?> <?php echo $this->Form->input('type_trade', array('type' => 'select', 'options' => array(
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
'Yacht' => 'Yacht'), 'empty' => 'Select','style'=>'width: 100%','selected' => $this->request->input['Contact']['type_trade'],'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('vin_trade','(Trade) Vin Number:'); ?> <?php echo $this->Form->input('vin_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('odometer_trade','(Trade) Miles:'); ?> <?php echo $this->Form->input('odometer_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('usedunit_color','(Trade) Color:'); ?> <?php echo $this->Form->input('usedunit_color', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Step 3 END -->
							<!-- Step 4 -->
							<div class="tab-pane" id="tab4-1">
								<div class="row">
									<div class="col-md-12"> <font color="red">*</font> <?php echo $this->Form->label('notes','Notes:'); ?> <?php echo $this->Form->input('notes', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- Step End 4 -->
							<div class="tab-pane" id="tab5-1">
								<div class="row">
									<div class="col-md-12">
										<!-- Widget -->
										<div class="widget widget-body-gray">
											<!-- Widget Heading -->
											<div class="widget-head">
												<h4 class="heading glyphicons calendar"><i></i>
												 <?php
													if(isset($this->request->data['Event']['id'])){
														echo "Edit";
													}else{
														echo "Set";
													}
												?>
												 Appointment
												 </h4>
											</div>
											<!-- // Widget Heading END -->
											<div class="widget-body innerAll inner-2x">

												<div class="row">
													<div class="col-md-6">
														<?php
														if(isset($this->request->data['Event']['id'])){
															echo $this->Form->input('Event.id');
														}
														?>

														<font color="red" >*</font>
														<?php  echo $this->Form->input('Event.event_type_id', array('label'=>'Event Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => $eventTypes));   ?>
														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->input('Event.status', array('label'=>'Event Status:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' => 'required', 'options' => array(
														'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
														'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed')));	?>
														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->input('Event.title', array('label'=>'Event Title:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<div class="separator bottom"></div>
													</div>
													<div class="col-md-6">
														<font color="red" >*</font>
														<?php echo $this->Form->label('Event.start_date','Event Start-Date:&nbsp;'); ?>
														<div class="input-group date" >
															<?php echo $this->Form->input('Event.start_date', array('style' => "width: 156px;",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
															<span class="input-group-addon"><i class="fa fa-th"></i></span>
															<div class="input-group bootstrap-timepicker">
																<?php echo $this->Form->input('Event.start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
																<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
															</div>
														</div>
														<?php echo $this->Form->error('Event.start'); ?>

														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->label('Event.start','Event End-Date:&nbsp;'); ?>
														<div class="input-group date">
															<?php echo $this->Form->input('Event.end_date', array('style' => "width: 156px;",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
															<span class="input-group-addon"><i class="fa fa-th"></i></span>

															<div class="input-group bootstrap-timepicker">
																<?php echo $this->Form->input('Event.end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
																<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
															</div>
														</div>
														<?php echo $this->Form->error('Event.end',null, array('class'=>'has-error help-block')); ?>

														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->input('Event.details', array('label'=>'Event Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => 'required')); ?>



													</div>
												</div>

											</div>
										</div>
										<!-- // Widget END -->
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab6-1">
								<div class="row">
									<div class="col-md-12">
										<div style="max-height: 280px; overflow: auto;">
											<!-- Table -->
											<table class="table table-striped table-responsive swipe-horizontal ">
												<!-- Table heading -->
												<thead>
													<tr>
														<th>History Type</th>
														<th>Sperson</th>
														<th>Step</th>
														<th>Status</th>
														<th>Vechicle</th>
														<th>Notes</th>
														<th>Date</th>
													</tr>
												</thead>
												<!-- // Table heading END -->
												<!-- Table body -->
												<tbody>
													<!-- Table row -->
													<?php foreach ($history as $entry) { ?>
													<tr class="gradeA">
														<td><?php echo $entry['History']['h_type']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['sperson']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['sales_step']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['year']; ?>, <?php echo $entry['History']['make']; ?>, <?php echo $entry['History']['model']; ?>, <?php echo $entry['History']['type']; ?></td>
														<td><?php echo $entry['History']['comment']; ?>&nbsp;</td>
														<td><?php echo ($entry['History']['created']!='')?  $this->Time->format('n/j/Y g:i A', $entry['History']['created'])   : "" ?>&nbsp;</td>
													</tr>
													<?php } ?>
													<!-- // Table row END -->
												</tbody>
												<!-- // Table body END -->
											</table>
											<!-- // Table END -->
										</div>
										<div class="separator bottom"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
		$selected_lead_type = "";
		if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
			$selected_lead_type = $this->request->params['named']['selected_lead_type'];
		}
		?>
								<a href="<?php echo $this->Html->url(array('action'=>'leads_main', $selected_lead_type )); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
								<button type="submit" class="btn btn-success no-ajaxify hide" id="btn-submit-lead"><i class="fa fa-save"></i> Save Log</button>
							</div>
							<div class=" col-md-6">
								<div class="pagination pull-right margin-none" >
									<!-- Time Date modified -->
									<?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => $datetimetext)); ?> <?php echo $this->Form->input('modified_full_date', array('type' => 'hidden', 'value' => "$datetimefullview")); ?> <?php echo $this->Form->input('modified_date_short', array('type' => 'hidden', 'value' => "$datetimeshort")); ?> <?php echo $this->Form->input('modified_date_short_slash', array('type' => 'hidden', 'value' => "$datetimeslash")); ?>
									<!-- Time Date modified End -->
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
										<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>
										<li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
										<li class="next finish primary" style="display:none;">
											<button class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
										</li>
									</ul>
									<!-- // Wizard pagination controls END -->
								</div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?> </div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="text-center bg-primary" style="margin-bottom: 1px; padding: 5px;">
				Inventory Center
			</div>
			<!-- Widget -->
			<div class="widget widget-tabs widget-tabs-responsive">
				<div class="widget-head">
					<ul>
						<li class="active"><a href="#tab2-v" class="" data-toggle="tab">OEM</a></li>
						<li><a href="#tab1-v" class="" data-toggle="tab">Used</a></li>
						<li><a href="#tab3-v" class="" data-toggle="tab">Trade</a></li>
					</ul>
				</div>
				<div class="widget-body">
					<div class="tab-content">

						<!-- Vehicle info - Used OEM -->
						<div class="tab-pane active" id="tab2-v">

							<?php //debug($used_vehicles); ?>
							<div class="clearfix">
								<?php echo $this->Form->create('InventoryOem', array('url'=>array('controller'=>'contacts','action'=>'search_oem_vehicle'),'class' => 'form-inline apply-nolazy', 'role' => "form")); ?>
								<?php echo $this->Form->input('Year', array('type' => 'select', 'required' => 'required', 'options' => array(
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
										'2000' => '2000',
									), 'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 75px;  float: left;'));	 ?>
								<?php echo $this->Form->input('Make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'Zero' => 'Zero',
                                            ), 'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;  float: left;')); ?>

								<div style="width: 147px; float: left">
									<?php echo $this->Form->input('Type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'UTV' => 'UTV',
                                            ), 'empty' => 'Type', 'selected' => '', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;')); ?>
								 	&nbsp; <button id="btn_search_oem_vehicle" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
								</div>
								<?php echo $this->Form->end(); ?>
							</div>
							<div class="separator"></div>
							<div id="oem_vehicle_list" style="max-height: 366px;overflow: auto;">
								<i class="disabled">This is used for section Vehicle and Trade-In. Simple search for the vehicle and then click on selection to move to form automaticly.</i>
							</div>
						</div>
						<!-- //Vehicle info - Used OEM -->

						<!-- Vehicle info - Used Start -->
						<div class="tab-pane" id="tab1-v">
							<?php //debug($used_vehicles); ?>
							<div class="clearfix">
								<?php echo $this->Form->create('Inventory', array('url'=>array('controller'=>'contacts','action'=>'search_used_vehicle'),'class' => 'form-inline apply-nolazy', 'role' => "form")); ?>
								<?php echo $this->Form->input('Year', array('type' => 'select', 'required' => 'required', 'options' => array(
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
										'2000' => '2000',
									), 'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 75px;  float: left;'));	 ?>
								<?php echo $this->Form->input('Make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'Zero' => 'Zero',
                                            ), 'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;  float: left;')); ?>

								<div style="width: 147px; float: left">
									<?php echo $this->Form->input('Type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'UTV' => 'UTV',
                                            ), 'empty' => 'Type', 'selected' => '', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;')); ?>
								 	&nbsp; <button id="btn_search_used_vehicle" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
								</div>
								<?php echo $this->Form->end(); ?>
							</div>
							<div class="separator"></div>
							<div id="used_vehicle_list" style="max-height: 366px;overflow: auto;">
								<i class="disabled">This is used for section Vehicle and Trade-In. Simple search for the vehicle and then click on selection to move to form automaticly.</i>
							</div>

						</div>
						<!-- //Vehicle info - Used End -->




						<!-- Vehicle info - Trade -->
						<div class="tab-pane" id="tab3-v">
							<?php //debug($used_vehicles); ?>
							<div class="clearfix">
								<?php echo $this->Form->create('InventoryOem', array('url'=>array('controller'=>'contacts','action'=>'search_trade_vehicle'),'class' => 'form-inline apply-nolazy', 'role' => "form")); ?>
								<?php echo $this->Form->input('Year', array('type' => 'select', 'required' => 'required', 'options' => array(
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
										'2000' => '2000',
									), 'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 75px;  float: left;'));	 ?>
								<?php echo $this->Form->input('Make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'Zero' => 'Zero',
                                            ), 'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;  float: left;')); ?>

								<div style="width: 147px; float: left">
									<?php echo $this->Form->input('Type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
                                                'UTV' => 'UTV',
                                            ), 'empty' => 'Type', 'selected' => '', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;')); ?>
								 	&nbsp; <button id="btn_search_trade_vehicle" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
								</div>
								<?php echo $this->Form->end(); ?>
							</div>
							<div class="separator"></div>
							<div id="trade_vehicle_list" style="max-height: 366px;overflow: auto;">
								<i class="disabled">This is used for section Vehicle and Trade-In. Simple search for the vehicle and then click on selection to move to form automaticly.</i>
							</div>
						</div>
						<!-- //Vehicle info - trade end -->





					</div>
				</div>
			</div>
			<!-- // Widget END -->
		</div>
	</div>
	<!-- // row END -->
</div>


<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog" style="width: 850px;">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">

				<div class="row">
					<?php foreach($lead_status_options as $key=>$value){ ?>
						<div class="col-md-3">
							<strong><u><?php echo $key; ?></u></strong>
							<?php foreach($value as $v){ ?>
								<div class="checkbox">
									<label class="checkbox-custom status-done" <?php echo (isset($history_status[$v]))? 'style="color: #CCCCCC;" ' : '' ?> >
										<input type="checkbox" <?php echo (isset($history_status[$v]))? 'disabled="disabled"' : '' ?>   class="chk_lead_status <?php echo (isset($history_status[$v]))? 'status_done' : '' ?>" name="checkbox_status" value="<?php echo $v; ?>" >
										<i class="fa fa-fw fa-square-o"></i> <?php echo $v; ?> <?php echo (isset($history_status[$v]))? $history_status[$v] : "" ?>
									</label>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
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

		//console.log(" <?php echo $this->data['Contact']['status']; ?> ");
		$(".chk_lead_status[value='<?php echo $this->data['Contact']['status']; ?>'], .chk_lead_status.status_done").prop('checked',true);
		$("#btn_status_modal").html( "<i class='fa fa-edit'></i> <?php echo $this->data['Contact']['status']; ?>"  );

		$(".chk_lead_status").click(function(){
			$(".chk_lead_status:not(.status_done)").checkbox('uncheck');
			$(this).checkbox('check');
			$("#ContactStatus").val(  $(this).prop('value')  );
			$("#btn_status_modal").html(  "<i class='fa fa-edit'></i> "+$(this).prop('value')  );

			//Set Sales Step
			if( $(this).prop('value') == 'Lead Sold'){
				if(confirm('Do you want to change Step?')){
					$("#ContactSalesStep").val('<?php echo $sold_step; ?>');
					$("#ContactLeadStatus").val('Closed');
				}
			}


		});

		// Set Sold status
		$("#ContactSalesStep").change(function(){
			if( $(this).val() == '<?php echo $sold_step; ?>' ){
				if(confirm('Do you want to change status?')){
					$("#ContactStatus").val('Lead Sold');
					$("#ContactLeadStatus").val('Closed');
					$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Lead Sold"  );
				}
			}
		});







		//Search used Vehicle
		$("#btn_search_used_vehicle").click(function(event){
			$("#used_vehicle_list").html("");
			$.ajax({
				type: "POST",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#used_vehicle_list").html(data);
				}
			});
			return false;
		});
		/*
		$.ajax({
			type: "POST",
			cache: false,
			url:  "/contacts/search_used_vehicle/",
			success: function(data){
				$("#used_vehicle_list").html(data);
			}
		});
		*/

		//Search oem Vehicle
		$("#btn_search_oem_vehicle").click(function(event){
			$("#oem_vehicle_list").html("");
			$.ajax({
				type: "POST",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#oem_vehicle_list").html(data);
				}
			});
			return false;
		});
		/*
		$.ajax({
			type: "POST",
			cache: false,
			url:  "/contacts/search_oem_vehicle/",
			success: function(data){
				$("#oem_vehicle_list").html(data);
			}
		});
		*/

		//Search trade Vehicle
		$("#btn_search_trade_vehicle").click(function(event){
			$("#trade_vehicle_list").html("");
			$.ajax({
				type: "POST",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#trade_vehicle_list").html(data);
				}
			});
			return false;
		});
		/*
		$.ajax({
			type: "POST",
			cache: false,
			url:  "/contacts/search_trade_vehicle/",
			success: function(data){
				$("#trade_vehicle_list").html(data);
			}
		});
		*/






	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
