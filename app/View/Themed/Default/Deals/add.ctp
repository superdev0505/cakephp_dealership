<?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#DealAddForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>

<?php
$dealer = AuthComponent::user('dealer');
// echo $dealer;
$cid = AuthComponent::user('dealer_id');
// echo $cid;
$sperson = AuthComponent::user('full_name');
// echo $cid;
$zone = AuthComponent::user('zone');
//echo $zone;
$id = $_GET['id'];
//$cid = $_GET['cid'];
//$dealer = $_GET['dealer'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$address = $_GET['address'];
$city = $_GET['city'];
$state = $_GET['state'];
$zip = $_GET['zip'];
$phone = $_GET['phone'];
$mobile = $_GET['mobile'];
$email = $_GET['email'];
$gender = $_GET['gender'];
$unitvalue = $_GET['unitvalue'];
$condition = $_GET['condition'];
$year = $_GET['year'];
$make = $_GET['make'];
$model = $_GET['model'];
$type = $_GET['type'];
$vin = $_GET['vin'];
$miles = $_GET['miles'];
$color = $_GET['color'];
$stocknum = $_GET['stocknum'];
$tradevalue = $_GET['tradevalue'];
$conditiont = $_GET['conditiont'];
$yeart = $_GET['yeart'];
$maket = $_GET['maket'];
$modelt = $_GET['modelt'];
$typet = $_GET['typet'];
$vint = $_GET['vint'];
$milest = $_GET['milest'];
$colort = $_GET['colort'];
$stocknumt = $_GET['stocknumt'];
$status = $_GET['status'];
$source = $_GET['source'];


$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;

?>

<div class="control-group head-group" >
<?php echo $this->Form->create('Deal', array('action' => 'add', 'class' => 'form-inline')); ?>
<fieldset>
<hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;">
<div class="control-group" >
<div class="controls">
</div> 
</div>
<tr>
<div align ="center">
<?php echo $this->Form->input('contact_id', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$id)); ?>
<?php echo $this->Form->input('ref_num', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$id)); ?>

<?php echo $this->Form->input('company_id', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$cid)); ?>
<?php echo $this->Form->input('company', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$dealer)); ?>
<?php echo $this->Form->input('sperson', array('type' => 'hidden', 'required' => 'required', 'class' => 'input-medium','value'=>$sperson)); ?>
<?php echo $this->Form->input('status', array('type' => 'hidden', 'required' => 'required', 'class' => 'input-medium','value'=>$status)); ?>
<?php echo $this->Form->input('source', array('type' => 'hidden', 'required' => 'required', 'class' => 'input-medium','value'=>$source)); ?>
<?php echo $this->Form->input('deal_status_id', array('type' => 'hidden', 'required' => 'required', 'class' => 'input-medium','value'=>4)); ?>
<?php echo $this->Form->input('date', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>
<?php echo $this->Form->input('created', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>
<?php echo $this->Form->input('created_long', array('type' => 'hidden', 'class' => 'input-medium','value'=>$datetimefullview)); ?>

<?php echo $this->Form->input('modified', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>

<?php echo $this->Form->input('modified_long', array('type' => 'hidden', 'class' => 'input-medium','value'=>$datetimefullview)); ?>
</tr>
<p id="main-customer-toggle" style="cursor:pointer"><strong>MAIN CUSTOMER INFO<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="main-customer" style="display:none">
&nbsp;Suffix:&nbsp; <?php
echo $this->Form->input('suffix', array('type' => 'select', 'options' => array(
'Jr' => 'Jr',
'Sr' => 'Sr',
'II' => 'II',
'III' => 'III',
'IV' => 'IV'
), 'empty' => 'Select', 'selected' => '','class' => 'span1'));
?>
&nbsp;&nbsp;First:&nbsp; <?php echo $this->Form->input('first_name', array('type' => 'text', 'required' => 'required','value'=>$fname,'class' => 'input-small')); ?>

&nbsp; &nbsp;Middle:&nbsp; <?php echo $this->Form->input('middle_name', array('type' => 'text', 'class' => 'input-small')); ?>

&nbsp; Last:&nbsp;<?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'input-medium','value'=>$lname)); ?>

&nbsp;Gender:&nbsp; <?php
echo $this->Form->input('gender', array('type' => 'select', 'options' => array(
'Male' => 'Male',
'Female' => 'Female'
), 'empty' => 'Select', 'selected' => '','required' => 'required','value'=>$gender, 'class' => 'input-small'));
?></br></br>
&nbsp; Address:&nbsp; <?php echo $this->Form->input('address', array('type' => 'text', 'class' => 'input-medium','value'=>$address)); ?>
&nbsp; City:&nbsp; <?php echo $this->Form->input('city', array('type' => 'text', 'class' => 'input-medium','value'=>$city)); ?>
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
), 'empty' => 'Select', 'selected' => '','value'=>$state, 'class' => 'input-small'));
?>
&nbsp;Zip:&nbsp;<?php echo $this->Form->input('zip', array('type' => 'text', 'class' => 'span1','value'=>$zip)); ?>
</br></br>
&nbsp;Phone:&nbsp; <?php echo $this->Form->input('phone', array('type' => 'text', 'class' => 'input-small','value'=>$phone)); ?>
&nbsp;Cell:&nbsp; <?php echo $this->Form->input('mobile', array('type' => 'text', 'required' => 'required', 'class' => 'input-small','value'=>$mobile)); ?>
&nbsp;&nbsp;Email:&nbsp;<?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'input-medium','value'=>$email)); ?>
&nbsp;Driver/State ID#:&nbsp;<?php echo $this->Form->input('driver_lic', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;&nbsp;Driver/State EXP:&nbsp;$ <?php echo $this->Form->input('driver_lic_exp', array('type' => 'text', 'class' => 'input-small','placeholder'=>'mm/dd/yyyy')); ?>
&nbsp;Social Security Number:&nbsp;<?php echo $this->Form->input('ss_num', array('type' => 'text', 'class' => 'input-medium','placeholder'=>'_ _ _ -_ _ -_ _ _ _')); ?>
&nbsp;&nbsp;Date of Birth&nbsp;<?php echo $this->Form->input('dob', array('type' => 'text', 'class' => 'input-small','placeholder'=>'mm/dd/yyyy')); ?>

</br></br>
<p><strong><font color="red">*</font>&nbsp;If address less than 6 years please fill the address info (below).</strong></p>

&nbsp; Address(2):&nbsp; <?php echo $this->Form->input('address2', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;City(2):&nbsp; <?php echo $this->Form->input('city2', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; State(2):&nbsp; <?php
echo $this->Form->input('state2', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp; Zip(2):&nbsp;<?php echo $this->Form->input('zip2', array('type' => 'text', 'class' => 'span1')); ?>
</br></br>
<p><strong><font color="red">*</font>&nbsp;If you are filling out a CREDIT APP please fill in info below (All Required for Credit).</strong></p>
&nbsp;Residence Status&nbsp; <?php
echo $this->Form->input('residence_status', array('type' => 'select', 'options' => array(
'Own' => 'Own',
'Rent' => 'Rent',
'Lease' => 'Lease',
'Parents' => 'Parents',
'Relatives' => 'Relatives',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>

&nbsp;Monthly Mortgage or Rent:&nbsp;$ <?php echo $this->Form->input('mortgage_month_amount', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Apt. #&nbsp;<?php echo $this->Form->input('apt_num', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Residence Length?&nbsp; <?php
echo $this->Form->input('residence_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
</br></br>
&nbsp;Are you retired?&nbsp; <?php
echo $this->Form->input('retired_status', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Income(yearly) :&nbsp;$&nbsp;<?php echo $this->Form->input('income_yearly', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Income(monthly) :&nbsp;$&nbsp;<?php echo $this->Form->input('income_monthly', array('type' => 'text', 'class' => 'span1')); ?>


&nbsp;Main Occupation:&nbsp;<?php echo $this->Form->input('main_job', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;Main Employer:&nbsp;<?php echo $this->Form->input('employer', array('type' => 'text', 'class' => 'input-medium')); ?>

&nbsp;Job Length?&nbsp; <?php
echo $this->Form->input('job_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Work Phone Number&nbsp;<?php echo $this->Form->input('work_phone', array('type' => 'text', 'class' => 'input-small')); ?>

</br></br>
&nbsp;Previous Employer:&nbsp;<?php echo $this->Form->input('previous_employer', array('type' => 'text', 'class' => 'input-medium')); ?>

&nbsp;Previous Job Length?&nbsp; <?php
echo $this->Form->input('previous_employer_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Previous Work Phone Number&nbsp;<?php echo $this->Form->input('previous_employer_number', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;Other Income</font>&nbsp; <?php
echo $this->Form->input('other_income', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Other Employer:&nbsp;<?php echo $this->Form->input('other_employer', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;Other (Yearly)&nbsp;$&nbsp;<?php echo $this->Form->input('other_yearly', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;Other (Monthly)&nbsp;$&nbsp;<?php echo $this->Form->input('other_monthly', array('type' => 'text', 'class' => 'input-small')); ?>
</div>
</br></br>

<hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
<p id="co-buyer-toggle" style="cursor:pointer"><strong>CO-BUYER CUSTOMER INFO<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="co-buyer" style="display:none">
&nbsp;Co-Buyer Suffix:&nbsp; <?php
echo $this->Form->input('co_suffix', array('type' => 'select', 'options' => array(
'Jr' => 'Jr',
'Sr' => 'Sr',
'II' => 'II',
'III' => 'III',
'IV' => 'IV'
), 'empty' => 'Select', 'selected' => '','class' => 'span1'));
?>
&nbsp;&nbsp;Co-First:&nbsp; <?php echo $this->Form->input('cobuyer_fname', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Co-Middle:</font>&nbsp; <?php echo $this->Form->input('cobuyer_mname', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Co-Last:&nbsp;<?php echo $this->Form->input('cobuyer_lname', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;Co-Gender:&nbsp; <?php
echo $this->Form->input('cobuyer_gender', array('type' => 'select', 'options' => array(
'Male' => 'Male',
'Female' => 'Female'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?></br></br>
&nbsp; Co-Address:&nbsp; <?php echo $this->Form->input('cobuyer_address', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;Co-City:&nbsp; <?php echo $this->Form->input('cobuyer_city', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Co-State:&nbsp; <?php
echo $this->Form->input('cobuyer_state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp; Co-Buyer Zip:&nbsp;<?php echo $this->Form->input('cobuyer_zip', array('type' => 'text', 'class' => 'span1')); ?>
</br></br>
&nbsp;Co-Phone:&nbsp; <?php echo $this->Form->input('cobuyer_phone', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;Co-Cell:&nbsp; <?php echo $this->Form->input('cobuyer_mobile', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;&nbsp;Co-Buyer Email:&nbsp;<?php echo $this->Form->input('cobuyer_email', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;Co-Driver/State ID#:&nbsp;<?php echo $this->Form->input('cobuyer_licence', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;&nbsp;Co-Date Driver/State EXP:&nbsp;$ <?php echo $this->Form->input('cobuyer_licence_exp', array('type' => 'text', 'class' => 'input-small','placeholder'=>'mm/dd/yyyy')); ?>

&nbsp;Co-Social Security Number:&nbsp;<?php echo $this->Form->input('cobuyer_ssn', array('type' => 'text', 'class' => 'input-medium','placeholder'=>'_ _ _ -_ _ -_ _ _ _')); ?>
&nbsp;&nbsp;Co-Date of Birth&nbsp;<?php echo $this->Form->input('cobuyer_dob', array('type' => 'text', 'class' => 'input-small','placeholder'=>'mm/dd/yyyy')); ?>

</br></br>
<p><strong> <font color="red">*</font>&nbsp;If address less than 6 years please fill the address info (below).</strong></p>

&nbsp; Co-Address(2):&nbsp; <?php echo $this->Form->input('co_address', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;Co-City(2):&nbsp; <?php echo $this->Form->input('co_city', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp; Co-State(2):&nbsp; <?php
echo $this->Form->input('co_state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp; Co-Zip(2):&nbsp;<?php echo $this->Form->input('co_zip', array('type' => 'text', 'class' => 'span1')); ?>
</br></br>
<p><strong> <font color="red">*</font>&nbsp;If you are filling out a CREDIT APP please fill in info below (All Required for Credit).</strong></p>
&nbsp;Co-Residence Status</font>&nbsp; <?php
echo $this->Form->input('cobuyer_residence_status', array('type' => 'select', 'options' => array(
'Own' => 'Own',
'Rent' => 'Rent',
'Lease' => 'Lease',
'Parents' => 'Parents',
'Relatives' => 'Relatives',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>

&nbsp;Co-Monthly Mortgage or Rent:&nbsp;$ <?php echo $this->Form->input('cobuyer_monthly_mortgage', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Co-Apt. #&nbsp;<?php echo $this->Form->input('cobuyer_apt_num', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Co-Residence Length?</font>&nbsp; <?php
echo $this->Form->input('cobuyer_residence_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
</br></br>
&nbsp;Co-Are you retired?</font>&nbsp; <?php
echo $this->Form->input('cobuyer_retired', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Co-Realtionship?</font>&nbsp; <?php
echo $this->Form->input('cobuyer_relationship', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Co-Income(Yearly)&nbsp;$&nbsp;<?php echo $this->Form->input('cobuyer_income_yearly', array('type' => 'text', 'class' => 'span1')); ?>
&nbsp;Co-Income(Monthly)&nbsp;$&nbsp;<?php echo $this->Form->input('cobuyer_income_monthly', array('type' => 'text', 'class' => 'span1')); ?>
</br></br>
&nbsp;Co-Main Occupation:&nbsp;<?php echo $this->Form->input('cobuyer_main_job', array('type' => 'text', 'class' => 'input-small')); ?>

&nbsp;Co-Employer:&nbsp;<?php echo $this->Form->input('cobuyer_employer', array('type' => 'text', 'class' => 'input-medium')); ?>

&nbsp;Co-Job Length?</font>&nbsp; <?php
echo $this->Form->input('cobuyer_job_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Co-Work Phone#&nbsp;<?php echo $this->Form->input('cobuyer_work_phone', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;Co-Previous Employer:&nbsp;<?php echo $this->Form->input('co_previous_employer', array('type' => 'text', 'class' => 'input-medium')); ?>

&nbsp;Co-Previous Job Length?&nbsp; <?php
echo $this->Form->input('co_previous_employer_length', array('type' => 'select', 'options' => array(
'1' => '1',
'2' => '2'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Co-Previous Work Phone Number&nbsp;<?php echo $this->Form->input('co_previous_employer_number', array('type' => 'text', 'class' => 'input-small')); ?>
</br></br>
&nbsp;Co-Other Income</font>&nbsp; <?php
echo $this->Form->input('cobuyer_other_income', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Co-Other Employer:&nbsp;<?php echo $this->Form->input('cobuyer_other_employer', array('type' => 'text', 'class' => 'input-medium')); ?>
&nbsp;Co-Other (Yearly)&nbsp;$&nbsp;<?php echo $this->Form->input('cobuyer_other_income_yearly', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;Co-Other (Monthly)&nbsp;$&nbsp;<?php echo $this->Form->input('cobuyer_other_income_monthly', array('type' => 'text', 'class' => 'input-small')); ?>
</div>
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
<p id="customer-reference-toggle" style="cursor:pointer"><strong>CUSTOMER REFERENCES (3)<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="customer-reference" style="display:none">
<p><strong> <font color="red">*</font>&nbsp;If you are filling out a CREDIT APP please fill in the References below. (All Required for Credit).</strong></p>
&nbsp;Ref #1 Name:&nbsp;<?php echo $this->Form->input('ref1_name', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #1 Phone:&nbsp;<?php echo $this->Form->input('ref1_phone', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #1 City:&nbsp;<?php echo $this->Form->input('ref1_city', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp; Ref #1 State:&nbsp; <?php
echo $this->Form->input('ref1_state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Ref #1 Type:</font>&nbsp; <?php
echo $this->Form->input('ref1_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
</br></br>

&nbsp;Ref #2 Name:&nbsp;<?php echo $this->Form->input('ref2_name', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;*Ref #2 Phone:&nbsp;<?php echo $this->Form->input('ref2_phone', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #2 City:&nbsp;<?php echo $this->Form->input('ref2_city', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp; Ref #2 State:&nbsp; <?php
echo $this->Form->input('ref2_state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Ref #2 Type:</font>&nbsp; <?php
echo $this->Form->input('ref2_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
</br></br>

&nbsp;Ref #3 Name:</font>&nbsp;<?php echo $this->Form->input('ref3_name', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #3 Phone:</font>&nbsp;<?php echo $this->Form->input('ref3_phone', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #3 City:</font>&nbsp;<?php echo $this->Form->input('ref3_city', array('type' => 'text', 'class' => 'input-small')); ?>&nbsp;
&nbsp;Ref #3 State:&nbsp; <?php
echo $this->Form->input('ref3_state', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
&nbsp;Ref #3 Type:</font>&nbsp; <?php
echo $this->Form->input('ref3_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'empty' => 'Select', 'selected' => '', 'class' => 'input-small'));
?>
</div>
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
<p id="main-unit-toggle" style="cursor:pointer"><strong>MAIN UNIT<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="main-unit" style="display:none">
&nbsp;Stock#</font>&nbsp;&nbsp;<?php
echo $this->Form->input('stock_num', array(
    'type' => 'text',
    'class' => 'span1',
    'value'=>$stocknum
));
?>
&nbsp;Condition:&nbsp; <?php
echo $this->Form->input('condition', array('type' => 'select', 'options' => array(
'New' => 'New',
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'Select', 'selected' => '','value'=>$condition, 'class' => 'span1'));
?>
&nbsp; Year:&nbsp; <?php
echo $this->Form->input('year', array('type' => 'select', 'options' => array('2014' => '2014',
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
), 'empty' => 'selected', 'selected' => '','value'=>$year, 'class' => 'span1'));
?>
&nbsp;Make:&nbsp; <?php
echo $this->Form->input('make', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '','value'=>$make, 'class' => 'input-medium'));
?>
</br></br>&nbspModel:&nbsp; <?php echo $this->Form->input('model', array('type' => 'text', 'class' => 'input-small','value'=>$model)); ?>
&nbsp;Unit Type:&nbsp; <?php
echo $this->Form->input('type', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '','value'=>$type, 'class' => 'input-medium'));
?>
&nbsp; Engine:&nbsp; <?php echo $this->Form->input('engine', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Trans:&nbsp;  <?php echo $this->Form->input('transmission', array('type' => 'text', 'class' => 'input-small')); ?>
</br>
</br>
&nbsp; Drivetrain:&nbsp; <?php echo $this->Form->input('drivetrain', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp;Vin#:&nbsp; <?php echo $this->Form->input('vin', array('type' => 'text', 'class' => 'input-medium','value'=>$vin)); ?>
&nbsp;Miles:&nbsp;<?php echo $this->Form->input('odometer', array('type' => 'text', 'class' => 'input-small','value'=>$miles)); ?> 
&nbsp;Color:&nbsp;<?php echo $this->Form->input('unit_color', array('type' => 'text', 'class' => 'input-small','value'=>$color)); ?> 
</div>
</br></br><hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
<p id="used-unit-toggle" style="cursor:pointer"><strong>USED UNIT<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="used-unit" style="display:none">
&nbsp;Stock#/T&nbsp;&nbsp;<?php
echo $this->Form->input('stock_num_used', array(
    'type' => 'text',
    'class' => 'span1',
    'value'=>$stocknumt
));
?> 
&nbsp; U/T:&nbsp; <?php
echo $this->Form->input('condition_trade', array('type' => 'select', 'options' => array(
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'Select', 'selected' => '','value'=>$conditiont, 'class' => 'input-small'));
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
), 'empty' => 'Select', 'selected' => '','value'=>$yeart, 'class' => 'input-small'));
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
), 'empty' => 'Select', 'selected' => '','value'=>$maket, 'class' => 'input-medium'));
?>
</br>
</br>
&nbsp; Model/T:&nbsp; <?php echo $this->Form->input('model_trade', array('type' => 'text', 'class' => 'input-medium','value'=>$modelt)); ?>
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
), 'empty' => 'Select', 'selected' => '','value'=>$typet, 'class' => 'input-medium'));
?>
&nbsp; Engine/T:&nbsp; <?php echo $this->Form->input('engine_used', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Trans/T:&nbsp;  <?php echo $this->Form->input('transmission_used', array('type' => 'text', 'class' => 'span1')); ?>
</br>
</br>
&nbsp; Drivetrain/T:&nbsp; <?php echo $this->Form->input('drivetrain_used', array('type' => 'text', 'class' => 'input-small')); ?>
&nbsp; Vin Number #/T:&nbsp; <?php echo $this->Form->input('vin_trade', array('type' => 'text', 'class' => 'input-medium','value'=>$vint)); ?>
&nbsp; Miles/T:&nbsp; <?php echo $this->Form->input('odometer_trade', array('type' => 'text', 'class' => 'input-small','value'=>$milest)); ?>
&nbsp; Color:&nbsp; <?php echo $this->Form->input('usedunit_color', array('type' => 'text', 'class' => 'input-small','value'=>$colort)); ?> 
</div>
</br></br>
<hr style="height:3px; border:none; color:#000; background-color:#000; width:100%; text-align:left; margin: 0 0 0 auto;"></br>
<p id="fixed-fee-toggle" style="cursor:pointer"><strong>FIXED FEE / PAYMENT<span style="font-size:11px;margin-left:10px;color:#555555">(click to expand)</span></strong></p>
<div id="fixed-fee" style="display:none">

FIXED FEE / PAYMENT: 
	<?php
	echo $this->Form->input('fee_type', array(
		'id' => "edit_options_type_condition",
		'type' => 'select',
		'required' => 'required',
		'options' => $selected_type_condition,
		'empty' => "Select",
		'selected' => $this->request->data['DealFixedfee']['id'],
		'class' => 'input-medium',
		'label' => false,
		'div' => false,
		'style' =>'margin-bottom: 0'
	));
	?>
</br>
</br>



&nbsp;Unit Amount:$&nbsp; <?php echo $this->Form->input('unit_value', array('type' => 'text','id' => 'DealerUnitValue','class' => 'input-mini','value'=>$unitvalue)); ?>
&nbsp;Down Payment:$&nbsp; <?php echo $this->Form->input('down_payment', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; Trade Value: $&nbsp; <?php echo $this->Form->input('trade_value', array('type' => 'text', 'class' => 'input-mini','value'=>$tradevalue)); ?>
&nbsp; Trade Payoff: $&nbsp; <?php echo $this->Form->input('trade_payoff', array('type' => 'text', 'class' => 'input-mini')); ?>
</br>
</br>
&nbsp;Tags:$&nbsp;  <?php echo $this->Form->input('tag_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Title:$&nbsp;  <?php echo $this->Form->input('title_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Doc:$&nbsp;  <?php echo $this->Form->input('doc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Freight$&nbsp;<?php echo $this->Form->input('freight_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Prep:$&nbsp; <?php echo $this->Form->input('prep_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;PPM:$&nbsp; <?php echo $this->Form->input('ppm_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Hazard:$&nbsp; <?php echo $this->Form->input('hazard_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br>
</br>
&nbsp;ESP:$&nbsp; <?php echo $this->Form->input('esp_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;GAP:$&nbsp; <?php echo $this->Form->input('gap_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Tire/W:$&nbsp; <?php echo $this->Form->input('tire_wheel_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbspLic/R:$&nbsp; <?php echo $this->Form->input('licreg_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;VSC:$&nbsp; <?php echo $this->Form->input('vsc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Roadside:$&nbsp; <?php echo $this->Form->input('roadside_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Theft:$&nbsp; <?php echo $this->Form->input('theft_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br></br>
&nbsp;Parts:$&nbsp; <?php echo $this->Form->input('parts_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Service:$&nbsp; <?php echo $this->Form->input('service_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;Tax:&nbsp; <?php
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
), 'empty' => 'Select', 'selected' => '', 'id' => 'DealTaxFee', 'selected' => $this->request->input['Contact']['tax_fee'], 'class' => 'input-small'));
?> %

<!-- <div class="csWidget csFPWidget" id="CSAutoLoanFPWidget"><table class="csInputTable"> -->
&nbsp;<input type=button value="Totals" onclick="add()">&nbsp;
&nbsp;<strong>Amount:</strong>&nbsp;$&nbsp; <?php echo $this->Form->input('amount', array('type' => 'text', 'id' => 'Dealeramount', 'onchange' => 'calculate();', 'class' => 'span1')); ?>
&nbsp;APR:&nbsp; <?php
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
), 'empty' => 'Select', 'selected' => '', 'id' => 'apr','selected' => $this->request->input['Contact']['loan_apr'], 'class' => 'input-small'));
?>%
</br>
</br>
&nbsp;&nbsp;Deal Notes:&nbsp;<?php echo $this->Form->input('notes', array('type' => 'text','required'=>'required', 'class' => 'span6')); ?>
</br>
</br>

<p><font color="red">**</font>&nbsp;<strong>Please Note: <u>ESTIMATE ONLY</u> real payment is based on customer credit.&nbsp;&nbsp;Monthly Payment:&nbsp;</strong></p>
<hr size="2" width="70%">
<br>
<button onclick="calculate();" type="button" style="text-align:center">Calculate Payments</button>&nbsp;
</br>
<br/>
<ul style="list-style-type:none;">
<li>For 12 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor1" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor1" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor1" class="output" type="text" style="width: 100px"></li>
<li>For 24 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor2" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor2" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor2" class="output" type="text" style="width: 100px"></li>
<li>For 36 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor3" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor3" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor3" class="output" type="text" style="width: 100px"></li>
<li>For 48 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor4" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor4" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor4" class="output" type="text" style="width: 100px"></li>
<li>For 60 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor5" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor5" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor5" class="output" type="text" style="width: 100px"></li>
<li>For 72 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor6" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor6" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor6" class="output" type="text" style="width: 100px"></li>
<li>For 84 Months: Payment Amount: <input name="data[Deal][payment]" id="paymentFor7" class="output" type="text" style="width: 100px"> &nbsp; Total/Payments: <input name="data[Deal][paymentTOtal]" id="totalFor7" class="output" type="text" style="width: 100px"> &nbsp; Total w/interest: <input name="data[Deal][totalwinterest]" id="totalinterestFor7" class="output" type="text" style="width: 100px"></li>
</ul>

</div>
<div align="center">
<!-- &nbsp; Time Zone:&nbsp; <?php echo $this->Form->input('zone', array('type' => 'text', 'readonly' => 'true', 'value' => "$zone", 'class' => 'input-medium')); ?>

</br></br>


&nbsp;&nbsp;Current Log Date:&nbsp;<?php echo $datetimefullview; ?>--></br>
&nbsp; MGR Sign-off:&nbsp; <?php echo $this->Form->input('mgr_signoff', array('type' => 'password', 'value' => '', 'class' => 'input-small')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'index')); ?>" class="btn btn-danger"><i class="icon-reply"></i>&nbsp;Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<?php echo $this->Form->submit('<i class="icon-save"></i> Save Log', array('div' => false, 'class' => 'btn btn-success')); ?>
</fieldset>
<div class="form-actions" align="left">
<?php echo $this->Form->end(); ?>
</div>
</form>
<style>
/* This is a CSS style sheet: it adds style to the program output */
.output { font-weight: bold; }           /* Calculated values in bold */
#payment { text-decoration: underline; } /* For element with id="payment" */
#graph { border: solid black 1px; }      /* Chart has a simple border */
th, td { vertical-align: top; }          /* Don't center table cells */
</style>

<script>
	$(window).error(function(e){
			e.preventDefault();
	});
	jQuery(document).ready(function(){
	
	
		//load fixed fees
		$('#edit_options_type_condition').change(function(){ 
			$.ajax({
				type: "GET",
				cache: false,
				dataType: "json",
				url:  "<?php echo $this->Html->url(array('controller'=>'deal_fixedfees','action'=>'get_fees')); ?>/"+$('#edit_options_type_condition').val(),
				success: function(data){
					$("#DealTagFee").val(data.tag_fee);
					$("#DealTitleFee").val(data.title_fee);
					$("#DealDocFee").val(data.doc_fee);
					$("#DealFreightFee").val(data.freight_fee);
					$("#DealPrepFee").val(data.prep_fee);
					$("#DealPpmFee").val(data.ppm_fee);
					$("#DealHazardFee").val(data.hazard_fee);
					$("#DealEspFee").val(data.esp_fee);
					$("#DealGapFee").val(data.gap_fee);
					$("#DealTireWheelFee").val(data.tire_wheel_fee);
					$("#DealLicregFee").val(data.licreg_fee);
					$("#DealVscFee").val(data.vsc_fee);
					$("#DealRoadsideFee").val(data.roadside_fee);
					$("#DealTheftFee").val(data.theft_fee);
					$("#DealPartsFee").val(data.parts_fee);
					$("#DealServiceFee").val(data.service_fee);
					$("#DealTaxFee").val(Math.round(data.tax_fee));
				}
			});
			return false;
		});
	
	
	
	
	
		jQuery("#customer-reference").hide();
		jQuery("#used-unit").hide();
		jQuery("#fee").hide();
		jQuery("#co-buyer").hide();
		jQuery("#main-customer").hide();
		
	});
	
	jQuery("p#main-customer-toggle").click(function(){
		jQuery("#main-customer").toggle("fast");
	});
	
	jQuery("p#customer-reference-toggle").click(function(){
		jQuery("#customer-reference").toggle("fast");
	});
	
	jQuery("p#co-buyer-toggle").click(function(){
		jQuery("#co-buyer").toggle("fast");
	});
	
	jQuery("p#main-unit-toggle").click(function(){
		jQuery("#main-unit").toggle("fast");
	});
	
	jQuery("p#used-unit-toggle").click(function(){
		jQuery("#used-unit").toggle("fast");
	});
	
	jQuery("p#fixed-fee-toggle").click(function(){
		jQuery("#fixed-fee").toggle("fast");
	});
	
	
	
</script>

<script>
"use strict"; // Use ECMAScript 5 strict mode in browsers that support it

function calculate() {
	// Look up the input and output elements in the document
	//var amount = document.getElementById("amount");//
	//var apr = document.getElementById("apr");
	//var tax = document.getElementById("DealTaxFee");
	//var years = document.getElementById("years");
	//Outgoing var 
	//var payment = document.getElementById("payment");
	//var total = document.getElementById("total");
	//var taxamount = document.getElementById("DealTaxFee");
	//var totalinterest = document.getElementById("totalinterest");
	//var principal = parseFloat(amount.value);
	//var interest = parseFloat(apr.value) / 100 / 12;
	var validationForCal = validate();
	if(validationForCal)
	{
		for(var i=1;i<=7;i++)
		{
			var amount = document.getElementById("Dealeramount");
			var apr = document.getElementById("apr");
			var taxamount = document.getElementById("DealTaxFee");
			var principal = parseFloat(amount.value);
			var interest = parseFloat(apr.value) / 100 / 12;
			var payment = document.getElementById(("paymentFor"+i).toString());
			var total = document.getElementById(("totalFor"+i).toString());
			var totalinterest = document.getElementById(("totalinterestFor"+i).toString());
			//var payments = parseFloat(years.value) * 12;
			var payments = i * 12;
			// Now compute the monthly payment figure.
			var x = Math.pow(1 + interest, payments, taxamount);   // Math.pow() computes powers
			var monthly = (principal * x * interest) / (x - 1);
			// If the result is a finite number, the user's input was good and
			// we have meaningful results to display
			if (isFinite(monthly)) {
			// Fill in the output fields, rounding to 2 decimal places
			payment.value = monthly.toFixed(2);
			total.value = (monthly * payments).toFixed(2);
			totalinterest.value = ((monthly * payments) - principal).toFixed(2);
			}
			else {
			// Result was Not-a-Number or infinite, which means the input was
			// incomplete or invalid. Clear any previously displayed output.
				payment.value = "";        // Erase the content of these elements
				total.value = ""
				totalinterest.value = "";
				chart();                       // With no arguments, clears the chart
			}	
	        }
 	}
  }
function validate()
{
                var amount = $("#Dealeramount").val();
		var apr = $("#apr").val();
		var taxamount = $("#DealTaxFee").val();
                if(amount == "" || amount == null || apr == "" || apr == null || taxamount == "" || taxamount == null)
                {
                   alert("Please enter the required fields to calculate payment");
                   return false;
                }else{
                   return true;
                }
}
</script>

<script type="text/javascript">
function applyTax() {
var inputAmount = document.getElementById('amount').value;
var salesTax = (inputAmount / 100 * document.getElementById('DealTaxFee').value);
var totalAmount = (inputAmount * 1) + (salesTax * 1);
document.getElementById('requestedTax').innerHTML = salesTax;
}

</script>
<script language=javascript>
function add() {
	var sum = 0;
	var valid = true;
	var validation = true;
	//var inputs = document.getElementsByClassName("input-mini");
	
	if($("#DealDownPayment").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealDownPayment").val(0);
	if($("#DealTradeValue").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealTradeValue").val(0);
	if($("#DealTradePayoff").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealTradePayoff").val(0);
	
	var inputs = $("div[id='fixed-fee']").find(".input-mini");
	var validation = validateFields();
	if(validation){
	inputs.each(function() 
		{
			var val = $(this).val();
			if(/^\d*\.?\d{0,2}$/.test(val))
			{
				sum += parseFloat(val);
			}
			else
			{
				valid = false;
				return false;
			}
		});
	};
	if (valid && validation) {
	//document.getElementById('amount').value = sum - document.getElementById('DealTradeValue').value - document.getElementById('DealDownPayment').value + sum / 100 * document.getElementById('DealTaxFee').value;
	var dealTradeVal = $("#DealTradeValue").val();
	var dealDownPay = $("#DealDownPayment").val();
	var dealTaxFee = $("#DealTaxFee").val();
        sum = sum - (2*parseFloat(dealTradeVal)) - (2*parseFloat(dealDownPay));
	var amount = sum + ((sum/100)*dealTaxFee);
	$("#Dealeramount").val(amount.toFixed(2));
	}
	else {
		if(!valid)
		alert("Please enter valid numbers only");
	}
}
function validateFields(){
	var inputs = $("div[id='fixed-fee']").find(".input-mini").add("#DealTaxFee");
	var missing = false;
	inputs.each(function() 
		{
			var val = $(this).val();
			if(val == "" || val == null) 
			{
				alert("Please enter all the required fields");
				missing = true;
	                        return false;
			}
	   
		});
	if(missing)
	return false;
	else
	return true;
	}
</script>
</table>
</div> 