<?php
$timezone = AuthComponent::user('zone');
//echo $timezone;
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
$x = AuthComponent::user('full_name');
// echo $x;
?>
<div class="wizard">
	<div class="widget widget-tabs widget-tabs-responsive">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<ul>
				<li class="active"><a href="#tab1-1" class="glyphicons home" data-toggle="tab"><i></i>Leads First</a></li>
				<li><a href="#tab2-1" class="glyphicons umbrella" data-toggle="tab"><i></i>Leads Second</a></li>
				<li><a href="#tab3-1" class="glyphicons fishes" data-toggle="tab"><i></i>Leads Third</a></li>
				<li><a href="#tab4-1" class="glyphicons car" data-toggle="tab"><i></i>Leads Fourth</a></li>
				<li><a href="#tab5-1" class="glyphicons leaf" data-toggle="tab"><i></i>Leads Fifth</a></li>
				<li><a href="#tab6-1" class="glyphicons cup" data-toggle="tab"><i></i>Leads Sixth</a></li>
				<li><a href="#tab7-1" class="glyphicons tie" data-toggle="tab"><i></i>Leads Seventh</a></li>
			</ul>
		</div>
		<!-- // Widget heading END -->
		<div class="widget-body">
			<?php echo $this->Form->create('Contact', array('action' => 'addcontact', 'class' => 'form-inline')); ?>
			
			<?php
			echo $this->Form->input('company', array(
				'type' => 'hidden',
				'value' => $company
			));
			?>
			<?php
			echo $this->Form->input('company_id', array(
				'type' => 'hidden',
				'value' => $companyid
			));
			?>
			<?php
			echo $this->Form->input('owner', array(
				'type' => 'hidden',
				'value' => "$x"
			));
			?>
			<?php
			echo $this->Form->input('sperson', array(
				'type' => 'hidden',
				'value' => "$x",
				'readonly' => 'true',
				'class' => 'input-small'
			));
			?>
			
			<div class="tab-content">
			
				<!-- Step 1 -->
				<div class="tab-pane active" id="tab1-1">
					<div class="row">
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('contact_status_id','Lead Type:', array('class'=>'strong')); ?>
							<?php
							echo $this->Form->input('contact_status_id', array('type' => 'select', 'options' => array(
							'5' => 'Web Lead',
							'6' => 'Phone Lead',
							'7' => 'Showroom',
							'8' => 'Parts',
							'9' => 'Service',
							'10' => 'Call Center',
							'11' => 'Rental'
							), 'empty' => 'Select', 'selected' => $this->request->input['Contact']['contact_status_id'], 'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
						
							<?php
							$step_procces = AuthComponent::user('step_procces');
							if ($step_procces === "lemco_steps"){
							  $options = array('Meet' => 'Meet','Greet' => 'Greet','Probe' => 'Probe','Sit On' => 'Sit On','Sit Down' => 'Sit Down','Write Up' => 'Write Up','Close' => 'Close','F/I' => 'F/I','Sold' => 'Sold');
							}else{
							  $options = array('Connect' => 'Connect','Understand' => 'Understand','Satisfy' => 'Satisfy','Trial Close' => 'Trial Close','Obtain Commitment' => 'Obtain Commitment','Maintain Realationship' => 'Maintain Realationship');
							}
							?>
							<font color="red">*</font> <?php echo $this->Form->label('sales_step','Step:', array('class'=>'strong')); ?>
							<?php
							echo $this->Form->select('sales_step',$options , array(
								'empty' => 'Select',
								'required' => 'required',
								'selected' => '',
								'class' => 'form-control' ,'style'=>'width: 100%'
							));
							?>
							<div class="separator"></div>
						
						</div>
						<div class="col-md-3">
							<?php
							$options = array(
								'Open Deals' => array(
									'Mobile Lead' => 'Mobile Lead',          
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
							?>
							<font color="red">*</font> <?php echo $this->Form->label('status','Status:', array('class'=>'strong')); ?>
							<?php echo $this->Form->select('status', $options, array('empty' => 'Select', 'required' => 'required', 'selected' => '', 'class' => 'form-control','style'=>'width: 100%')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('lead_status','Open/Close:', array('class'=>'strong')); ?>
							<?php
							echo $this->Form->input('lead_status', array(
								'options'=>array('Open' => 'Open','Closed' => 'Closed'),
								'empty' => '',
								'label'=>false,
								'div'=>false,
								'required' => 'required',
								'selected' => 'Open',
								'class' => 'form-control','style'=>'width: 100%'
							));
							echo $this->Form->hidden("lead_status", array('value'=> 'Open'))
							?>
							
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('first_name', array('type' => 'text','label'=>false,'div'=>false,'required' => 'required', 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('last_name','Last Name:'); ?>
							<?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('address','Address:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('address', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('city','City:'); ?>
							<?php echo $this->Form->input('city', array('type' => 'text',  'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
				</div>
				<!-- // Step 1 END -->
				
				<!-- Step 2 -->
				<div class="tab-pane" id="tab2-1">
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('state','State:', array('class'=>'strong')); ?>
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
							), 'empty' => 'Select', 'selected' => '', 'label'=>false,'div'=>false, 'selected' => $this->request->input['Contact']['state'], 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
							
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('zip','Zip:'); ?>
							<?php echo $this->Form->input('zip', array('type' => 'text', 'class' => 'form-control')); ?>
							<div class="separator"></div>
							
						</div>
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('gender', array('type' => 'select', 'options' => array(
							'Male' => 'Male',
							'Female' => 'Female'
							), 'empty' => 'Select', 'selected' => $this->request->input['Contact']['gender'],'required' => 'required','label'=>false,'div'=>false, 'selected' => $this->request->input['Contact']['gender'], 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('phone','Phone:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('mobile','Cell:'); ?>
							<?php echo $this->Form->input('mobile', array('type' => 'text','required' => 'required','class' => 'form-control')); ?>
							<div class="separator bottom"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('email','Email:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('email', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>								
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('best_time','Best Time:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('best_time', array('type' => 'select', 'options' => array(
							'Anytime' => 'Anytime',
							'Morning' => 'Morning',
							'Mid Day' => 'Mid Day',
							'Afternoon' => 'Afternoon',
							'Evening' => 'Evening'
							), 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['best_time'], 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('buying_time','Buying Time:', array('class'=>'strong')); ?>
							<?php echo $this->Form->input('buying_time', array('type' => 'select', 'options' => array(
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
					</div>
					
				</div>
				<!-- // Step 2 END -->
				
				<!-- Step 3 -->
				<div class="tab-pane" id="tab3-1">
					<div class="row">
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('source','Source:', array('class'=>'strong')); ?>
							<?php	echo $this->Form->input('source', array('type' => 'select', 'options' => array(
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
							), 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['source'], 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>

						</div>
						<div class="col-md-9">
							<font color='red'>*</font> <?php echo $this->Form->label('notes','Notes:'); ?>
							<?php echo $this->Form->input('notes', array('type'=>'textarea','label'=>false,'div'=>false,'class' => 'form-control','value'=>'')); ?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<input type="checkbox" name="set_event" id="setEvent"/>
							<font color='red'>&nbsp;*</font>&nbsp;Reminder&nbsp;&nbsp
							<p>Please Note - If checked you will be taken to the Events section after log submit.</p>
							<div class="separator"></div>
						</div>
					</div>
				</div>
				<!-- // Step 3 END -->
				
				<!-- Step 4 -->
				<div class="tab-pane" id="tab4-1">
					<div class="row">
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('unit_value','Value/Unit:'); ?>
							<?php echo $this->Form->input('unit_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue', 'required' => 'required', 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('stock_num','Stock#'); ?>
							<?php echo $this->Form->input('stock_num', array(
								'type' => 'text',
								'required' => 'required',
								'label'=>false,'div'=>false,
								'class' => 'form-control'
							));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('condition','Condition:'); ?>
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
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('year','Year:'); ?>
							<?php echo $this->Form->input('year', array('type' => 'select', 'required' => 'required', 'options' => array('2014' => '2014',
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
							), 'empty' => 'selected','label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('make','Make:'); ?>
							<?php echo $this->Form->input('make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
							), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color="red">*</font> <?php echo $this->Form->label('model','Model:'); ?>
							<?php echo $this->Form->input('model', array('type' => 'text', 'required' => 'required', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<font color='red'>*</font> <?php echo $this->Form->label('type','Unit Type:'); ?>
							<?php echo $this->Form->input('type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
							), 'empty' => 'Select', 'selected' => '', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('engine','Engine:'); ?>
							<?php echo $this->Form->input('engine', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					
				</div>
				<!-- // Step 4 END -->
				
				<!-- Step 5 -->
				<div class="tab-pane" id="tab5-1">
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('vin','Vin Number #:'); ?>
							<?php echo $this->Form->input('vin', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('odometer','Miles:'); ?>
							<?php echo $this->Form->input('odometer', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?> 
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('unit_color','Color:'); ?>
							<?php echo $this->Form->input('unit_color', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?> 
							<div class="separator"></div>
						</div>
					</div>
					
				</div>
				<!-- // Step 5 END -->
				
				<!-- Step 6 -->
				<div class="tab-pane" id="tab6-1">
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('trade_value','Value/T:'); ?>
							<?php echo $this->Form->input('trade_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactTradeValue', 'class' => 'form-control')); ?> 
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('stock_num_trade','Stock#/T:'); ?>
							<?php echo $this->Form->input('stock_num_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('condition_trade','U/T:'); ?>
							<?php echo $this->Form->input('condition_trade', array('type' => 'select', 'options' => array(
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Select', 'label'=>false,'div'=>false,'style'=>'width: 100%','class' => 'form-control'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('year_trade','Year/T:'); ?>
							<?php echo $this->Form->input('year_trade', array('type' => 'select', 'options' => array(
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
							), 'empty' => 'Select','label'=>false,'div'=>false,'style'=>'width: 100%','class' => 'form-control'));
							?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('make_trade','Make/T:'); ?> 
							<?php echo $this->Form->input('make_trade', array('type' => 'select', 'options' => array('American Ironhorse' => 'American Ironhorse', 'American Ironhorse' => 'American Ironhorse',
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
							), 'empty' => 'Select','label'=>false,'div'=>false,'style'=>'width: 100%','class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('model_trade','Model/T:'); ?> 
							<?php echo $this->Form->input('model_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('type_trade','Type/T:'); ?> 
							<?php echo $this->Form->input('type_trade', array('type' => 'select', 'options' => array(
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
							), 'empty' => 'Select','style'=>'width: 100%','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
						</div>
					</div>
					
				</div>
				<!-- // Step 6 END -->
				
				<!-- Step 7 -->
				<div class="tab-pane" id="tab7-1">
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('vin_trade','Vin Number #/T:'); ?> 
							<?php echo $this->Form->input('vin_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('odometer_trade','Miles/T:'); ?> 
							<?php echo $this->Form->input('odometer_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->label('usedunit_color','Color:'); ?> 
							<?php echo $this->Form->input('usedunit_color', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							Current Log Date:
							<?php
							echo $this->Form->input('created_full_date', array(
								'type' => 'text',
								'readonly' => 'true',
								'value' => "$datetimefullview",
								'class' => 'form-control'
							));
							?>
							
							<?php
							echo $this->Form->input('created', array(
								'type' => 'hidden',
								'value' => "$datetimetext"
							));
							?>
							<?php
							echo $this->Form->input('created_date_short', array(
								'type' => 'hidden',
								'value' => "$datetimeshort"
							));
							?>
							<?php
							echo $this->Form->input('created_date_short_slash', array(
								'type' => 'hidden',
								'value' => "$datetimeslash"
							));
							?>
							<?php
							echo $this->Form->input('modified_date_short', array(
								'type' => 'hidden',
								'value' => "$datetimeshort"
							));
							?>
							<?php
							echo $this->Form->input('modified_date_short_slash', array(
								'type' => 'hidden',
								'value' => "$datetimeslash"
							));
							?>
							<?php
							echo $this->Form->input('modified', array(
								'type' => 'hidden',
								'value' => "$datetimetext"
							));
							?>
							<?php
							echo $this->Form->input('modified_full_date', array(
								'type' => 'hidden',
								'value' => "$datetimefullview"
							));
							?>
							
							
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->label('mgr_signoff','MGR Sign-off:'); ?> 
							<?php echo $this->Form->input('mgr_signoff', array('type' => 'password','value' => '','label'=>false,'div'=>false,'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</div>
				<!-- // Step 7 END -->
				
			</div>
			<!-- Wizard pagination controls -->
			<button class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add Contact</button>
			
			<!-- // Wizard pagination controls END -->
			<?php echo $this->Form->end(); ?> 
		</div>	
		
	</div>
</div>		