<?
$date = new DateTime();
date_default_timezone_set('America/Los_Angeles');
$datetimeshort = date('mdY');

//echo $datetimeshort;
?>

<?
$date = new DateTime();
date_default_timezone_set('America/Los_Angeles');
$datetimeslash = date('m/d/Y');

//echo $datetimeslash;
?>


<?
$date = new DateTime();
date_default_timezone_set('America/Los_Angeles');
$datetimetext = date('mdYHi');

//echo $datetimetext;
?>

<?
$date = new DateTime();
date_default_timezone_set('America/Los_Angeles');
$datetimefullview = date('D - M d, Y g:i A');

//echo $datetimefullview;
?>

<?php
$x = AuthComponent::user('full_name');
// echo $x;
?>

<?php echo $this->Form->create('Contact', array('action' => 'edit', 'class' => 'form-inline')); ?>
<fieldset>
<!--

<?php echo $contact['ContactStatus']['name'] ?>


<div class="control-group" >
<div class="controls">
</div> 
<div align ="center"></br>
&nbsp; &nbsp; &nbsp;<font color="red"><strong>*<u>SELECTED LEAD TYPE</u></font></strong>&nbsp; </br>
<div class="btn-group" data-toggle="buttons-radio" data-toggle-name="contact_status_id" >
<?php foreach ($contactstatuses as $key => $value): ?>
<?php
if ($value == 'Web Lead')
$color_class = 'btn btn-info';
else if ($value == 'Phone Lead')
$color_class = 'btn btn-info';
else if ($value == 'Showroom')
$color_class = 'btn btn-info';
else if ($value == 'Parts')
$color_class = 'btn btn-info';
else if ($value == 'Service')
$color_class = 'btn btn-info';
else if ($value == 'Call Center')
$color_class = 'btn btn-info';
else if ($value == 'Rental')
$color_class = 'btn btn-info';
else
$color_class = 'btn-info';
?>
<button type="button" class="btn <?php echo $color_class; ?>" value="<?php echo $key; ?>">
<?php echo $value; ?>
</button>
<?php endforeach; ?>
</div>




<tr align="center">
<td >
<hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
&nbsp; Sales Person: <?php echo $this->Form->input('sperson', array('type' => 'hidden', 'value' => "$x", 'class' => 'input-medium', 'readonly' => 'true')); ?>
-->
<div align ="center">
</br></br> 
<?php
$options = array(
'Web Lead' => array(
'Lead Arrived' => 'Lead Arrived',
'Call Web Lead' => 'Call Web Lead',
'Appointment Web Lead' => 'Appointment Web Lead'
),
'Phone lead' => array(
'Call In' => 'Call In',
'Call Out' => 'Call Out',
'Mobile Lead' => 'Mobile Lead',
'Call Refferal' => 'Call Refferal',
'Call Appointment' => 'Call Appointment',
'Call Orpahan Owner' => 'Call Orpahan Owner'
),
'ShowRoom' => array(
'Greet' => 'Greet',
'Probe' => 'Probe',
'Sit-on' => 'Sit-on',
'Features' => 'Features',
'Sit Down' => 'Sit Down',
'Credit or Cash' => 'Credit  or Cash',
'Credit Decsion' => 'Credit Decsion',
'Disclosure' => 'Disclosure',
'F&I' => 'F&I',
'Sold' => 'Sold',
'Sold Post Call' => 'Sold Post Call'
),
'Parts' => array(
'Parts Customer' => 'Parts Customer'
),
'Service' => array(
'Service Customer' => 'Service Customer'
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
'Rental Trade' => 'Rental Trade'
)
);
?>
<!--
&nbsp;<font color='red'>*Status:</font>&nbsp; <? echo $this->Form->select('status', $options, array('empty' => 'Select', 'required' => 'required', 'selected' => $this->request->input['Contact']['status'], 'class' => 'input-large')); ?>


&nbsp; Ref Num:&nbsp; <?php echo $this->Form->input('id', array('type' => 'text', 'class' => 'span1', 'readonly' => 'true')); ?>
&nbsp;Gender:&nbsp; <?php
echo $this->Form->input('gender', array('type' => 'select', 'options' => array(
'Male' => 'Male',
'Female' => 'Female'
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['gender'], 'class' => 'input-small'));
?>

</td></tr>
</br></br><font color="red">*First Name:</font>&nbsp; <?php echo $this->Form->input('first_name', array('type' => 'text', 'required' => 'required', 'class' => 'input-medium')); ?>
&nbsp; Last Name:&nbsp; <?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Address:&nbsp; <?php echo $this->Form->input('address', array('type' => 'text', 'class' => 'input-medium')); ?>
</br></br>City:&nbsp; <?php echo $this->Form->input('city', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; State:&nbsp; <?php
echo $this->Form->input('state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['state'], 'class' => 'input-small'));
?>
&nbsp; Zip:&nbsp;<?php echo $this->Form->input('zip', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp; Phone:&nbsp; <?php echo $this->Form->input('phone', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; <font color="red">*Cell:</font>&nbsp; <?php echo $this->Form->input('mobile', array('type' => 'text', 'required' => 'required', 'class' => 'input-small')); ?>
</br></br>
Email:&nbsp;<?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Best Time:&nbsp; <?php
echo $this->Form->input('best_time', array('type' => 'select', 'options' => array(
'Anytime' => 'Anytime',
'Morning' => 'Morning',
'Mid Day' => 'Mid Day',
'Afternoon' => 'Afternoon',
'Evening' => 'Evening'
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['best_time'], 'class' => 'input-small'));
?>


&nbsp; <font color='red'>*Buying Time:</font>&nbsp;<?php
echo $this->Form->input('buying_time', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'required' => 'required', 'selected' => $this->request->input['Contact']['buying_time'], 'class' => 'input-small'));
?>
</br></br>
&nbsp; <font color='red'>*Customer Notes</font>:&nbsp;<?php echo $this->Form->input('notes', array('class' => 'span5')); ?>

&nbsp; <font color='red'>*Source:</font>&nbsp; <?php
echo $this->Form->input('source', array('type' => 'select', 'options' => array(
'Walk in' => 'Walk in',
'Sign' => 'Sign',
'Website' => 'Website',
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
), 'empty' => 'Select', 'selected' => '', 'required' => 'required', 'selected' => $this->request->input['Contact']['source'], 'class' => 'input-medium'));
?>


</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
-->
&nbsp; <font color="red">*Value/Unit:</font>&nbsp; $&nbsp;<?php echo $this->Form->input('unit_value', array('type' => 'text', 'id' => 'ContactUnitValue', 'required' => 'required', 'class' => 'input-mini')); ?>
&nbsp; Down:&nbsp; $&nbsp;<?php echo $this->Form->input('down_payment', array('type' => 'text', 'id' => 'ContactDownPayment', 'class' => 'span1')); ?>


&nbsp; <font color='red'>* N or U</font>:&nbsp; <?php
echo $this->Form->input('condition', array('type' => 'select', 'required' => 'required', 'options' => array(
'New' => 'New',
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['condition'], 'class' => 'span1'));
?>


&nbsp; <font color='red'>*Year</font>:&nbsp; <?php
echo $this->Form->input('year', array('type' => 'select', 'required' => 'required', 'options' => array('2014' => '2014',
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
), 'empty' => 'selected', 'selected' => '', 'selected' => $this->request->input['Contact']['year'], 'class' => 'span1'));
?>


&nbsp; <font color='red'>*Make</font>:&nbsp; <?php
echo $this->Form->input('make', array('type' => 'select', 'required' => 'required', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['make'], 'class' => 'input-medium'));
?>

</br></br>&nbsp; <font color="red">*Model:</font>&nbsp; <?php echo $this->Form->input('model', array('type' => 'text', 'required' => 'required', 'class' => 'input-small')); ?>

&nbsp; <font color='red'>*Unit Type</font>:&nbsp; <?php
echo $this->Form->input('type', array('type' => 'select', 'required' => 'required', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['type'], 'class' => 'input-medium'));
?>

&nbsp; Engine:&nbsp; <?php echo $this->Form->input('engine', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Trans:&nbsp;  <?php echo $this->Form->input('transmission', array('type' => 'text', 'class' => 'input-small')); ?>
<!-- &nbsp; Doors:&nbsp; <?php echo $this->Form->input('doors', array('type' => 'text', 'class' => 'span1')); ?> -->
</br></br>

&nbsp; Drivetrain:&nbsp; <?php echo $this->Form->input('drivetrain', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Vin Number #:&nbsp; <?php echo $this->Form->input('vin', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Miles:&nbsp; <?php echo $this->Form->input('odometer', array('type' => 'text', 'class' => 'input-small')); ?> 
&nbsp; Color:&nbsp; <?php echo $this->Form->input('unit_color', array('type' => 'text', 'class' => 'input-small')); ?> 
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
&nbsp; Value/T:&nbsp; $&nbsp; <?php echo $this->Form->input('trade_value', array('type' => 'text', 'id' => 'ContactTradeValue', 'class' => 'span1')); ?> 
&nbsp; Payoff/T:&nbsp; $&nbsp; <?php echo $this->Form->input('trade_payoff', array('type' => 'text', 'id' => 'ContactTradePayoff', 'class' => 'input-mini')); ?> 


&nbsp; U/T:&nbsp; <?php
echo $this->Form->input('condition_trade', array('type' => 'select', 'options' => array(
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['condition_trade'], 'class' => 'input-small'));
?>

&nbsp; Year/T:&nbsp; <?php
echo $this->Form->input('year_trade', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['year_trade'], 'class' => 'input-small'));
?>

&nbsp; Make/T:&nbsp; <?php
echo $this->Form->input('make_trade', array('type' => 'select', 'options' => array('American Ironhorse' => 'American Ironhorse', 'American Ironhorse' => 'American Ironhorse',
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['make_trade'], 'class' => 'input-medium'));
?>

</br></br>
&nbsp; Model/T:&nbsp; <?php echo $this->Form->input('model_trade', array('type' => 'text', 'class' => 'input-medium')); ?>

&nbsp; Type/T:&nbsp; <?php
echo $this->Form->input('type_trade', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Contact']['type_trade'], 'class' => 'input-medium'));
?>

&nbsp; Engine/T:&nbsp; <?php echo $this->Form->input('engine_trade', array('type' => 'text', 'class' => 'input-small')); ?>

&nbsp; Trans/T:&nbsp;  <?php echo $this->Form->input('transmission_trade', array('type' => 'text', 'class' => 'span1')); ?>

</br></br>
&nbsp; Drivetrain/T:&nbsp; <?php echo $this->Form->input('drivetrain_trade', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Vin Number #/T:&nbsp; <?php echo $this->Form->input('vin_trade', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Miles/T:&nbsp; <?php echo $this->Form->input('odometer_trade', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Color:&nbsp; <?php echo $this->Form->input('usedunit_color', array('type' => 'text', 'class' => 'input-small')); ?> 
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>



&nbsp; Tags: $&nbsp;  <?php echo $this->Form->input('tag_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Title: $&nbsp;  <?php echo $this->Form->input('title_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Doc: $&nbsp;  <?php echo $this->Form->input('doc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Freight: $&nbsp;<?php echo $this->Form->input('freight_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Prep: $&nbsp; <?php echo $this->Form->input('prep_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; PPM: $&nbsp; <?php echo $this->Form->input('ppm_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br></br>
&nbsp; ESP: $&nbsp; <?php echo $this->Form->input('esp_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; GAP: $&nbsp; <?php echo $this->Form->input('gap_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Tire/W:  $&nbsp; <?php echo $this->Form->input('tire_wheel_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Lic/R: $&nbsp; <?php echo $this->Form->input('licreg_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; VSC: $&nbsp; <?php echo $this->Form->input('vsc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Parts: $&nbsp; <?php echo $this->Form->input('parts_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br></br>

&nbsp; Service: $&nbsp; <?php echo $this->Form->input('service_fee', array('type' => 'text', 'class' => 'input-mini')); ?>

&nbsp; Tax:&nbsp; <?php

echo $this->Form->input('tax_fee', array('type' => 'select', 'options' => array(
'1' => '1%',
'2' => '2%',
'3' => '3%',
'4' => '4%'
, '5' => '5%',
'6' => '6%',
'7' => '7%',
'8' => '8%',
'9' => '9%',
'10' => '10%',
'11' => '11%',
'12' => '12%',
'13' => '13%',
'14' => '14%',
'15' => '15%',
'16' => '16%',
), 'empty' => 'Select', 'selected' => '', 'id' => 'ContactTaxFee', 'selected' => $this->request->input['Contact']['tax_fee'], 'class' => 'input-small'));
?> %

&nbsp;<input type=button value="Totals" onclick="add()">&nbsp;
&nbsp; Amount:&nbsp;$&nbsp; <?php echo $this->Form->input('amount', array('type' => 'text', 'id' => 'amount', 'onchange' => 'calculate();', 'class' => 'span1')); ?>

&nbsp; APR:&nbsp; <?php
echo $this->Form->input('loan_apr', array('type' => 'select', 'options' => array(
'1' => '1%',
'2' => '2%',
'3' => '3%',
'4' => '4%',
'5' => '5%',
'6' => '6%',
'7' => '7%',
'8' => '8%',
'9' => '9%',
'10' => '10%',
'11' => '11%',
'12' => '12%',
'13' => '13%',
'14' => '14%',
'15' => '15%',
'16' => '16%',
'17' => '17%',
'18' => '18%',
'19' => '19%',
'20' => '20%',
'21' => '21%'
), 'empty' => 'Select', 'selected' => '', 'id' => 'apr', 'onchange' => 'calculate();', 'selected' => $this->request->input['Contact']['loan_apr'], 'class' => 'input-small'));
?>%

&nbsp; Term:&nbsp; <?php
echo $this->Form->input('loan_term', array('type' => 'select', 'class' => 'input-small', 'options' => array(
'1' => '12 Months',
'2' => '24 Months',
'3' => '36 months',
'4' => '48 Months',
'5' => '60 Months',
'6' => '72 Months',
'7' => '84 Months'
), 'empty' => 'Select', 'selected' => '', 'id' => 'years', 'onchange' => 'calculate();', 'selected' => $this->request->input['Contact']['loan_term'], 'class' => 'input-small'));
?>
</br></br>

<table width="800" height="49px">
<tr height="4">
<td colspan="10" bgcolor="black" height="1"></td>

<tr>
<td width="25%">
<button onclick="calculate();" type="button">Payment Amount</button>&nbsp;<i class="icon-pencil"></i></span>&nbsp;&nbsp;</font>&nbsp;<strong>&nbsp;Monthly Payment:&nbsp;$<strong><type='text' class='output' class='control-label' id='payment'></div>
</td>

<td width="25%"></br></td>
<td  width="25%"></br><strong>&nbsp;Total/Payments:&nbsp;$<strong><type='text' class='output' id='total'></td>
<td colspan="25%"></br><strong>&nbsp;Total w/interest:&nbsp;$<strong><type='text' class='output' id='totalinterest'></td>

</tr>
</table> 
<div align="center">
&nbsp; Delivery Date:&nbsp; <?php echo $this->Form->input('date_input', array('id' => 'datepicker', 'type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Delivery Time:&nbsp; <?php echo $this->Form->input('time_input', array('id' => 'timepicker', 'type' => 'text', 'class' => 'input-small')); ?>

</br></br>
&nbsp; MGR Sign-off:&nbsp; <?php echo $this->Form->input('mgr_signoff',array('type'=>'password','value' =>'','class'=>'span1')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'index')); ?>" class="btn btn-danger"><i class="icon-reply"></i>&nbsp;Cancel</a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<?php echo $this->Form->submit('<i class="icon-save"></i> Save Log', array('div' => false, 'class' => 'btn btn-success')); ?>


<!-- Time Date modified 
<?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => $datetimetext)); ?>
<?php echo $this->Form->input('modified_full_date', array('type' => 'hidden', 'value' => "$datetimefullview")); ?>
<?php echo $this->Form->input('modified_date_short', array('type' => 'hidden', 'value' => "$datetimeshort")); ?>
<?php echo $this->Form->input('modified_date_short_slash', array('type' => 'hidden', 'value' => "$datetimeslash")); ?>

 Notes (History) Need varibles -->

<div class="control-group" >
<div class="controls">
</div>
</fieldset>
<?php echo $this->Form->input('contact_status_id', array('type' => 'hidden')); ?>
<div class="form-actions" align="left">


</div>
</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<script>
jQuery(function($) {
$('div.btn-group[data-toggle-name]').each(function() {
var group = $(this);
var form = group.parents('form').eq(0);
var name = "data[Contact][contact_status_id]";
var hidden = $('input[name="' + name + '"]', form);
$('button', group).each(function() {
var button = $(this);
button.live('click', function() {
hidden.val($(this).val());
});
if (button.val() == hidden.val()) {
button.addClass('active');
}
});
});
});
</script>

</form>
<script>

//Confirm delete modal/dialog with Twitter bootstrap?
// ---------------------------------------------------------- Generic Confirm  

function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {

var confirmModal =
$('<div class="modal hide fade">' +
'<div class="modal-header">' +
'<a class="close" data-dismiss="modal" >&times;</a>' +
'<h3>' + heading + '</h3>' +
'</div>' +
'<div class="modal-body">' +
'<p>' + question + '</p>' +
'</div>' +
'<div class="modal-footer">' +
'<a href="#" class="btn" data-dismiss="modal">' +
cancelButtonTxt +
'</a>' +
'<a href="#" id="okButton" class="btn btn-danger">' +
okButtonTxt +
'</a>' +
'</div>' +
'</div>');
confirmModal.find('#okButton').click(function(event) {
callback();
confirmModal.modal('hide');
});

confirmModal.modal('show');
}
;

// ---------------------------------------------------------- Confirm Put To Use

$(".cdelete").live("click", function(event) {
var heading = '<?php echo __('Confirm Delete') ?>';
var question = '<?php echo __('Are you sure, you want to delete this contact!') ?>';
var cancelButtonTxt = '<?php echo __('Cancel') ?>';
var okButtonTxt = '<?php echo __('Delete'); ?>';

var callback = function() {

$('#del').submit();
};

confirm(heading, question, cancelButtonTxt, okButtonTxt, callback);

});
</script>

<style>
/* This is a CSS style sheet: it adds style to the program output */
.output { font-weight: bold; }           /* Calculated values in bold */
#payment { text-decoration: underline; } /* For element with id="payment" */
#graph { border: solid black 1px; }      /* Chart has a simple border */
th, td { vertical-align: top; }          /* Don't center table cells */
</style>

<script>
"use strict"; // Use ECMAScript 5 strict mode in browsers that support it

function calculate() {
// Look up the input and output elements in the document
var amount = document.getElementById("amount");
var apr = document.getElementById("apr");
var tax = document.getElementById("DealTaxFee");
var years = document.getElementById("years");

//Outgoing var 
var payment = document.getElementById("payment");

var total = document.getElementById("total");

var taxamount = document.getElementById("DealTaxFee");

var totalinterest = document.getElementById("totalinterest");


// Get the user's input from the input elements. Assume it is all valid.
// Convert interest from a percentage to a decimal, and convert from
// an annual rate to a monthly rate. Convert payment period in years
// to the number of monthly payments.

var principal = parseFloat(amount.value);
var interest = parseFloat(apr.value) / 100 / 12;
var payments = parseFloat(years.value) * 12;

// Now compute the monthly payment figure.
var x = Math.pow(1 + interest, payments, taxamount);   // Math.pow() computes powers
var monthly = (principal * x * interest) / (x - 1);

// If the result is a finite number, the user's input was good and
// we have meaningful results to display
if (isFinite(monthly)) {
// Fill in the output fields, rounding to 2 decimal places

payment.innerHTML = monthly.toFixed(2);

total.innerHTML = (monthly * payments).toFixed(2);

totalinterest.innerHTML = ((monthly * payments) - principal).toFixed(2);



}
else {
// Result was Not-a-Number or infinite, which means the input was
// incomplete or invalid. Clear any previously displayed output.
payment.innerHTML = "";        // Erase the content of these elements
total.innerHTML = ""
totalinterest.innerHTML = "";
chart();                       // With no arguments, clears the chart
}
}


</script>

<script type="text/javascript">
function applyTax() {
var inputAmount = document.getElementById('amount').value;
var salesTax = (inputAmount / 100 * document.getElementById('ContactTaxFee').value);
var totalAmount = (inputAmount * 1) + (salesTax * 1);


document.getElementById('requestedTax').innerHTML = salesTax;

}

</script>

<script language=javascript>
function add() {
var sum = 0;
var valid = true;
var inputs = document.getElementsByClassName("input-mini");



for (i = 0; i < inputs.length; i++) {
if (inputs[i].value.match(/^[0]*(\d+)$/)) {
sum += parseInt(RegExp.$1);
}
else {
valid = true;
}
}
if (valid) {
document.getElementById('amount').value = sum - document.getElementById('ContactTradeValue').value - document.getElementById('ContactDownPayment').value + sum / 100 * document.getElementById('ContactTaxFee').value;
}
else {
alert("Please enter numbers only");
}
}
</script>

<script>
$(document).ready(function() {
$('#ContactAddForm').live('submit', function(ev) {
if ($('#lead_source').val() == "") {
alert("Please Select the LEAD TYPE");
$('#lead_source_btn_container').css('border', '3px solid #ff0000');
$('html,body').animate({scrollTop: 0}, 'slow');
ev.preventDefault();
return false;
}
});

$('.lead_source').live('click', function() {
$('#lead_source_btn_container').css('border', '0px solid #ff0000');
$('#lead_source').val($(this).val());
});
});
</script>




