<?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#ContactAddForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>
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
<div class="control-group head-group" >
<div class="row-fluid">
<?php
echo $this->Form->create('Contact', array(
    'class' => 'form-inline',
    'type' => 'file'
));
?>

<div align ="center">
<div class="controls">
<fieldset>
<tr>
<td>
<div>
<hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;"></br>
<!-- Dealer Number:&nbsp;<?php
echo AuthComponent::user('dealer');
?> &nbsp;|&nbsp; -->
<!-- get dealership info -->
<?php
$company = AuthComponent::user('dealer');
// echo $x;
$companyid = AuthComponent::user('dealer_id');
// echo $x;
?>
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

<!-- get salesperson (user ful name) -->

<?php
$x = AuthComponent::user('full_name');
// echo $x;
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
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>


<?php
if ($step_procces === "lemco_steps")
  {
  $options = array('Meet' => 'Meet','Greet' => 'Greet','Probe' => 'Probe','Sit On' => 'Sit On','Sit Down' => 'Sit Down','Write Up' => 'Write Up','Close' => 'Close','F/I' => 'F/I','Sold' => 'Sold');
  }
else
  {
  $options = array('Connect' => 'Connect','Understand' => 'Understand','Satisfy' => 'Satisfy','Trial Close' => 'Trial Close','Obtain Commitment' => 'Obtain Commitment','Maintain Realationship' => 'Maintain Realationship');
  }
?>
&nbsp;&nbsp;<font color='red'>*&nbsp;</font>Lead Type:&nbsp; <?php
echo $this->Form->input('contact_status_id', array(
    'type' => 'select',
    'options' => array(
        '5' => 'Web Lead',
        '6' => 'Phone Lead',
        '7' => 'Showroom',
        '8' => 'Parts',
        '9' => 'Service',
        '10' => 'Call Center',
        '11' => 'Rental'),
    'empty' => 'Select',
    'selected' => $this->request->input['Contact']['contact_status_id'],
    'required' => 'required',
    'class' => 'input-medium'
));
?> 
&nbsp;<font color='red'>*&nbsp;</font>Step:&nbsp; <?php
echo $this->Form->select('sales_step',$options , array(
    'empty' => 'Select',
    'required' => 'required',
    'selected' => '',
    'class' => 'input-medium'
));
?>


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
&nbsp;<font color='red'>*&nbsp;</font>Status:&nbsp; <?php
echo $this->Form->select('status', $options, array(
    'empty' => 'Select',
    'required' => 'required',
    'selected' => '',
    'class' => 'input-medium'
));
?>

&nbsp;Open/Close:&nbsp; <?php
echo $this->Form->select('lead_status', array('Open' => 'Open',
        'Closed' => 'Closed',), array(
        'Open' => 'Open',
        'disabled' => 'true',
	'selected' => 'Open',
        'value' => 'Open',
    'class' => 'input-small'
));
echo $this->Form->hidden("lead_status", array('value'=> 'Open'))
?>
<br/><br/>
<font color='red'>*&nbsp;</font>First Name:&nbsp; <?php
echo $this->Form->input('first_name', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>
&nbsp; Last Name:&nbsp; <?php
echo $this->Form->input('last_name', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>
&nbsp; Address:&nbsp; <?php
echo $this->Form->input('address', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>
<br/><br/>
&nbsp; City:&nbsp; <?php
echo $this->Form->input('city', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp; State:&nbsp; <?php
echo $this->Form->input('state', array(
    'type' => 'select',
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
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; Zip:&nbsp;<?php
echo $this->Form->input('zip', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp;<font color='red'>*&nbsp;</font>Gender:&nbsp; <?php
echo $this->Form->input('gender', array(
    'type' => 'select',
    'options' => array(
        'Male' => 'Male',
        'Female' => 'Female'
    ),
    'empty' => 'Select',
    'selected' => '',
    'required' => 'required',
    'selected' => $this->request->input['Contact']['gender'],
    'class' => 'input-small'
));
?>
&nbsp; Phone:&nbsp; <?php
echo $this->Form->input('phone', array(
    'type' => 'tel',
    'class' => 'input-small'
));
?>
&nbsp; <font color='red'>*&nbsp;</font>Cell:&nbsp; <?php
echo $this->Form->input('mobile', array(
    'type' => 'tel',
    'class' => 'input-small'
));
?>
<br/><br/>
&nbsp; Email:&nbsp;<?php
echo $this->Form->input('email', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>

&nbsp;<font color='red'>*&nbsp;</font>Best Time:&nbsp; <?php
echo $this->Form->input('best_time', array(
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
    'required' => 'required',
    'class' => 'input-small'
));
?>

&nbsp; <font color='red'>*&nbsp;</font>Buying Time:&nbsp;<?php
echo $this->Form->input('buying_time', array(
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
    'required' => 'required',
    'class' => 'input-small'
));
?>
&nbsp; <font color='red'>*&nbsp;</font>Source:&nbsp; <?php
echo $this->Form->input('source', array(
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
    'required' => 'required',
    'class' => 'input-medium'
));
?>
</br></br>

&nbsp; <font color='red'>*&nbsp;</font>Notes:&nbsp;<?php
echo $this->Form->input('notes', array(
    'type' => 'textarea',
    'class' => 'span7'
));
?>
<br/><br/>


<input type="checkbox" name="set_event" id="setEvent"/>&nbsp;<font color='red'>&nbsp;*</font>&nbsp;Reminder&nbsp;&nbsp<p>Please Note - If checked you will be taken to the Events section after log submit.

<hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;"></br>




<td>
<a class="fancybox fancybox.iframe" href="http://www.nadaguides.com/motorcycles" id="value_btn"><font color='red'>*</font>&nbsp;<u>Value/Unit:</u></a>
<script>
$('document').ready(function(){
    $('#value_btn').fancybox({
        autoDimensions: false,
        height: 600,
        width: 1000
    });
});
</script>
</td>

<?php
echo $this->Form->input('unit_value', array(
    'type' => 'text',
    'id' => 'ContactUnitValue',
    'class' => 'input-mini',
    'required' => 'required'
));
?>
&nbsp;<font color="red">*&nbsp;</font>Stock#&nbsp;&nbsp;
<?php echo $this->Form->input('stock_num', array(
    'type' => 'text',
    'required' => 'required',
    'class' => 'span1'
));
?>

&nbsp; <font color='red'>*&nbsp;</font>Condition:&nbsp; <?php
echo $this->Form->input('condition', array(
    'type' => 'select',
    'required' => 'required',
    'options' => array(
        'New' => 'New',
        'Used' => 'Used',
        'Rental' => 'Rental',
        'Demo' => 'Demo'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>

&nbsp; <font color='red'>*&nbsp;</font>Year:&nbsp; <?php
echo $this->Form->input('year', array(
    'type' => 'select',
    'required' => 'required',
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
    'selected' => '',
    'class' => 'input-small'
));
?>

&nbsp; <font color='red'>*&nbsp;</font>Make:&nbsp; <?php
echo $this->Form->input('make', array(
    'type' => 'select',
    'required' => 'required',
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
    'selected' => '',
    'class' => 'input-medium'
));
?></br></br>

&nbsp; <font color='red'>*&nbsp;</font>Model:&nbsp; <?php
echo $this->Form->input('model', array(
    'type' => 'text',
    'class' => 'input-small',
    'required' => 'required'
));
?>

&nbsp; <font color='red'>*&nbsp;</font>Unit Type:&nbsp; <?php
echo $this->Form->input('type', array(
    'type' => 'select',
    'required' => 'required',
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
    'selected' => '',
    'class' => 'input-medium'
));
?>
<!--
&nbsp; Engine:&nbsp; <?php
echo $this->Form->input('engine', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
-->
<!--
&nbsp; Transmission:&nbsp; <?php
echo $this->Form->input('transmission', array(
    'type' => 'select',
    'options' => array(
        'Automatic' => 'Automatic',
        'Manual' => 'Manual'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; Doors:&nbsp; <?php
echo $this->Form->input('doors', array(
    'type' => 'select',
    'options' => array(
        '2DR' => '2DR',
        '3DR' => '3DR',
        '4DR' => '4DR',
        '5DR' => '5DR'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
</br></br>
&nbsp; Drivetrain:&nbsp; <?php
echo $this->Form->input('drivetrain', array(
    'type' => 'select',
    'options' => array(
        '2WD' => '2WD',
        '4WD' => '4WD',
        'AWD' => 'AWD'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
-->
&nbsp; Vin#:&nbsp; <?php
echo $this->Form->input('vin', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>
&nbsp; Miles:&nbsp; <?php
echo $this->Form->input('odometer', array(
    'type' => 'text',
    'class' => 'span1'
));
?> 

&nbsp; Color:&nbsp; <?php
echo $this->Form->input('unit_color', array(
    'type' => 'text',
    'class' => 'input-small'
));
?> 
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;"></br>
&nbsp; 
<a href="http://www.nadaguides.com/Motorcycles/Manufacturers" onclick="javascript:void window.open('http://www.nadaguides.com/Motorcycles/Manufacturers', '1387821643666', 'width=680,height=520,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,center=1,top=1');
return false;"><font color='black'><u>Value/Trade</u></font></a>:&nbsp; $&nbsp; <?php
echo $this->Form->input('trade_value', array(
    'type' => 'text',
    'id' => 'ContactTradeValue',
    'class' => 'span1'
));
?> 
&nbsp;Stock#/T&nbsp;&nbsp;<?php
echo $this->Form->input('stock_num_trade', array(
    'type' => 'text',
    'class' => 'span1'
));
?>

&nbsp; Condition/T:&nbsp; <?php
echo $this->Form->input('condition_trade', array(
    'type' => 'select',
    'options' => array(
        'Used' => 'Used',
        'Rental' => 'Rental',
        'Demo' => 'Demo'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>

&nbsp; Year/T:&nbsp; <?php
echo $this->Form->input('year_trade', array(
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
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>

&nbsp; Make/T:&nbsp; <?php
echo $this->Form->input('make_trade', array(
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
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
</br></br>

&nbsp; Model/T:&nbsp; <?php
echo $this->Form->input('model_trade', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>

&nbsp; Type/T:&nbsp; <?php
echo $this->Form->input('type_trade', array(
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
    'selected' => '',
    'class' => 'input-medium'
));
?>
<!--
&nbsp; Engine/T:&nbsp; <?php
echo $this->Form->input('engine_trade', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp; Transmission/T:&nbsp; <?php
echo $this->Form->input('transmission_trade', array(
    'type' => 'select',
    'options' => array(
        'Automatic' => 'Automatic',
        'Manual' => 'Manual'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; Doors/T:&nbsp; <?php
echo $this->Form->input('doors_trade', array(
    'type' => 'select',
    'options' => array(
        '2DR' => '2DR',
        '3DR' => '3DR',
        '4DR' => '4DR',
        '5DR' => '5DR'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
</br></br>
&nbsp; Drivetrain/T:&nbsp; <?php
echo $this->Form->input('drivetrain_trade', array(
    'type' => 'select',
    'options' => array(
        '2WD' => '2WD',
        '4WD' => '4WD',
        'AWD' => 'AWD'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
-->
&nbsp; Vin#/T:&nbsp; <?php
echo $this->Form->input('vin_trade', array(
    'type' => 'text',
    'class' => 'input-medium'
));
?>
&nbsp; M/T:&nbsp; <?php
echo $this->Form->input('odometer_trade', array(
    'type' => 'text',
    'class' => 'span1'
));
?>
&nbsp; Color/T:&nbsp; <?php
echo $this->Form->input('usedunit_color', array(
    'type' => 'text',
    'class' => 'input-small'
));
?> 

</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;"></br>
<!-- 
&nbsp; Tags: $&nbsp;  <?php
echo $this->Form->input('tag_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Title: $&nbsp;  <?php
echo $this->Form->input('title_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Doc: $&nbsp;  <?php
echo $this->Form->input('doc_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Frieght: $&nbsp;<?php
echo $this->Form->input('freight_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Prep: $&nbsp; <?php
echo $this->Form->input('prep_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; PPM: $&nbsp; <?php
echo $this->Form->input('ppm_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
</br></br>
&nbsp; ESP: $&nbsp; <?php
echo $this->Form->input('esp_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; GAP: $&nbsp; <?php
echo $this->Form->input('gap_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Tire/Wheel:  $&nbsp; <?php
echo $this->Form->input('tire_wheel_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Lic/R: $&nbsp; <?php
echo $this->Form->input('licreg_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; VSC: $&nbsp; <?php
echo $this->Form->input('vsc_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Parts: $&nbsp; <?php
echo $this->Form->input('parts_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
</br></br>
&nbsp; Service: $&nbsp; <?php
echo $this->Form->input('service_fee', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp; Tax:&nbsp; <?php
echo $this->Form->input('tax_fee', array(
    'type' => 'select',
    'options' => array(
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
        '16' => '16%'
    ),
    'empty' => 'Select',
    'selected' => '',
    'id' => 'ContactTaxFee',
    'class' => 'input-small'
));
?>
&nbsp; &nbsp; <input type=button value="Get Totals" onclick="add()">&nbsp;<span class="add-on"><i class="icon-pencil"></i></span>&nbsp;
&nbsp; Amount:&nbsp;$&nbsp; <?php
echo $this->Form->input('amount', array(
    'type' => 'text',
    'id' => 'amount',
    'onchange' => 'calculate();',
    'class' => 'span2'
));
?>

&nbsp; APR:&nbsp; <?php
echo $this->Form->input('loan_apr', array(
    'type' => 'select',
    'options' => array(
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
    ),
    'empty' => 'Select',
    'selected' => '',
    'id' => 'apr',
    'onchange' => 'calculate();',
    'class' => 'input-small'
));
?>

&nbsp; Term:&nbsp; <?php
echo $this->Form->input('loan_term', array(
    'type' => 'select',
    'class' => 'input-small',
    'options' => array(
        '1' => '12 Months',
        '2' => '24 Months',
        '3' => '36 months',
        '4' => '48 Months',
        '5' => '60 Months',
        '6' => '72 Months',
        '7' => '84 Months'
    ),
    'empty' => 'Select',
    'selected' => '',
    'id' => 'years',
    'onchange' => 'calculate();',
    'class' => 'input-small'
));
?>
</br></br>
<table width="830px" height="49px">
<tr height="4">
<td colspan="8" bgcolor="black" height="2"></td>
<tr>
<td width="25%">
<button onclick="calculate();" type="button">Payment Amount</button>&nbsp;<i class="icon-pencil"></i></span>&nbsp;&nbsp;Please Note: ESTIMATE ONLY real payment is based on credit.</font>&nbsp;<strong>&nbsp;Monthly Payment:&nbsp;$<strong><type='text' class='output' class='control-label' id='payment'></div>
</td>
<!--
<td width="25%"></br></td>
<td  width="25%"></br><strong>&nbsp;Total/Payments:&nbsp;$<strong><type='text' class='output' id='total'></td>
<td colspan="25%"></br><strong>&nbsp;Total w/interest:&nbsp;$<strong><type='text' class='output' id='totalinterest'></td>

</tr>-->
</table>
<div align="center">
&nbsp; Time Zone:&nbsp; <?php
echo $this->Form->input('zone', array(
    'type' => 'text',
    'readonly' => 'true',
    'value' => "$zone",
    'class' => 'span3'
));
?>


<!-- Date Time -->
&nbsp;&nbsp;Current Log Date:&nbsp;<?php
echo $this->Form->input('created_full_date', array(
    'type' => 'text',
    'readonly' => 'true',
    'value' => "$datetimefullview",
    'class' => 'span3'
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
<br/><br/>&nbsp; MGR Sign-off:&nbsp; <?php
echo $this->Form->input('mgr_signoff', array(
    'type' => 'password',
    'value' => '',
    'class' => 'span1'
));
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php
echo $this->Html->url(array(
    'controller' => 'contacts',
    'action' => 'index'
));
?>" class="btn btn-danger"><i class="icon-reply"></i>&nbsp;Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
echo $this->Form->submit('<i class="icon-save"></i> Add Contact', array(
    'div' => false,
    'class' => 'btn btn-success'
));
?>
<?php //echo $this->Form->input('contact_status_id', array('type' => 'hidden'));  
?>
<div class="form-actions">
</fieldset>
<?php
echo $this->Form->end();
?>
</div>
</div>
</div>
</div>
</div>
</div>