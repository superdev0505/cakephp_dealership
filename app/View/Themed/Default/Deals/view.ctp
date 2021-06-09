<?
$zone = AuthComponent::user('zone');
//echo $zone;

$daddress = AuthComponent::user('d_address');
//echo $daddress;

$dcity = AuthComponent::user('d_city');
//echo $dcity;

$dstate = AuthComponent::user('d_state');
//echo $dstate;

$dzip = AuthComponent::user('d_zip');
//echo $dzip;

$dphone = AuthComponent::user('d_phone');
//echo $dphone;

$dfax = AuthComponent::user('d_fax');
//echo $dfax;

$demail = AuthComponent::user('d_email');
//echo $demail;

$dwebsite = AuthComponent::user('d_website');
//echo $dwebsite;

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;

?>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<style>
/* CSS Document */
@media all {
	.page-break	{ display: none; }
}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
	.page-break	{ display: block; page-break-before: always; }
                   body {-webkit-print-color-adjust: exact;}
}

@font-face
{
font-family:'Arial, Helvetica, sans-serif';
}
@font-face
{
font-family:'Arial, Helvetica, sans-serif';
}

body{
font-family:'Arial, Helvetica, sans-serif';
min-height:600px;
width:100%;
-webkit-print-color-adjust:exact;
}
.body{
width:100%;
}
.wrapper{
margin:10px;
margin-top:20px;
width:900px;
}
.logo{
font-family:'Arial, Helvetica, sans-serif';
font-size:30px;
color:#000000;
float:left;
margin-right:75px;
margin-bottom:15px;
}
.subhead{
font-family:'Arial, Helvetica, sans-serif';
font-size:18px;
color:#000000;
width:100%;
padding: 2px;
}
.semi-subhead{
font-family:'Arial, Helvetica, sans-serif';
font-size:14px;
color:#000000;
padding:3px;
margin-bottom:5px;
}
.semi-subhead input{
border:solid 0.1em #000000;
height:14px;
padding:3px;
vertical-align:middle;
}
.boxhead{
background-color:#000000;
-webkit-border-radius:7px;
-moz-border-radius:7px;
border-radius:7px;
behavior: url(css/PIE.htc);
position:relative;
padding:9px;
padding-top:5px;
padding-bottom:15px;
color:#fff;
font-family:'Arial, Helvetica, sans-serif';
font-size:18px;
text-align:center;
width:98%;
}
.box{
background-color:#fff;
-webkit-border-radius:7px;
-moz-border-radius:7px;
border-radius:7px;
behavior: url(css/PIE.htc);
position:relative;
padding:10px;
width:97.6%;
margin-top:-10px;
border:solid 0.15em #000000;
height:320px;
}

.box_med{
background-color:#fff;
-webkit-border-radius:7px;
-moz-border-radius:7px;
border-radius:7px;
behavior: url(css/PIE.htc);
position:relative;
padding:10px;
width:97.6%;
margin-top:-10px;
border:solid 0.15em #000000;
height:200px;
}

.box input{
border:solid 0.1em #000000;
height:10px;
padding:3px;
vertical-align:middle;
}
.leftbox{
height:200px;
width:900px;
float:left;
font-family:'Arial, Helvetica, sans-serif';
font-weight: bold
font-size:14px;
font-weight:bold;
}
.topbox_rightsection{
text-align:left;
font-family:'Arial, Helvetica, sans-serif';
font-size:10px;
font-weight:bold;
}
.topbox_rightsection input{
float:right;
}
.leftbox_content{
float:left;
margin-right:5px;
}
</style>
</head>
<body>
<div class='body' align='center'>
<div class='wrapper'>	
<div class='logo'><?php echo $this->request->data['Deal']['company']; ?></br>
</div>
<div class='subhead'></div>

<div class='semi-subhead' align='left'>
<strong><?php echo $daddress; ?>&nbsp;<?php echo $dcity; ?>,&nbsp; <?php echo $dstate; ?>&nbsp; <?php echo $dzip; ?> &nbsp;|&nbsp;&nbsp;Phone: <?php echo $dphone; ?> &nbsp;|&nbsp;&nbsp;Fax: <?php echo $dfax; ?>
<span style='margin-left:25px;'></br>
Email:&nbsp;<?php echo $demail; ?> &nbsp;|&nbsp;&nbsp;Website:&nbsp;<?php echo $dwebsite; ?> </strong>
</span>
</div>
<div class='boxhead'>Dealer  / Customer Information</div>
<div class='box'>
<div class='leftbox' align='left'>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Dealer ID: &nbsp;<input type='text' name='dealerid' class='input-mini' value='<?php echo $this->request->data['Deal']['company_id']; ?>' />
</div>

<div class='leftbox_content'>
Dealer#&nbsp;<input type='text' name='dealer' class='input-medium' value='<?php echo $this->request->data['Deal']['company']; ?>' />
</div>

<div class='leftbox_content'>
Sales Person:&nbsp; <input type='text' name='sperson' class='input-small' value='<?php echo $this->request->data['Deal']['sperson']; ?>' />
</div>

<div class='leftbox_content'>
Stock#&nbsp; <input type='text' name='stocknum' class='input-mini' value='<?php echo $this->request->data['Deal']['stock_num']; ?>' />
</div>

<div class='leftbox_content'>
Date:&nbsp; <input type='text' name='datetime' class='input-medium' value='<?php echo $datetimefullview; ?>' />
</div>

<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>

First:&nbsp; <input type='text' name='firstname' class='input-small' value='<?php echo $this->request->data['Deal']['first_name']; ?>' />
</div>

<div class='leftbox_content'>
Middle:&nbsp; <input type='text' name='middlename' class='input-small' value='<?php echo $this->request->data['Deal']['middle_name']; ?>' />
</div>

<div class='leftbox_content'>
Last:&nbsp; <input type='text' name='lastname' class='input-small' value='<?php echo $this->request->data['Deal']['last_name']; ?>' />
</div>

<div class='leftbox_content'>
Home#&nbsp; <input type='text' name='homephone' class='input-small' value='<?php echo $this->request->data['Deal']['phone']; ?>' />
</div>

<div class='leftbox_content'>
Mobile#&nbsp; <input type='text' name='mobilphone' class='input-small' value='<?php echo $this->request->data['Deal']['mobile']; ?>' />
<div style='clear:both;margin-bottom:8px;'></div>
</div>

<div class='leftbox_content'>
Gender:&nbsp; <input type='text' name='mobilphone' class='input-mini' value='<?php echo $this->request->data['Deal']['gender']; ?>' />
<div style='clear:both;margin-bottom:8px;'></div>
</div>

<div class='leftbox_content'>
Address:&nbsp; <input type='text' name='address' class='input-small' value='<?php echo $this->request->data['Deal']['address']; ?>' />
</div>

<div class='leftbox_content'>
City:&nbsp; <input type='text' name='city' class='input-medium' value='<?php echo $this->request->data['Deal']['city']; ?>' />
</div>

<div class='leftbox_content'>
State:&nbsp; <input type='text' name='state' class='input-small' value='<?php echo $this->request->data['Deal']['state']; ?>' />
</div>

<div class='leftbox_content'>
Zip:&nbsp; <input type='text' name='zip' class='input-mini' value='<?php echo $this->request->data['Deal']['zip']; ?>' />
</div>

<div class='leftbox_content'>
Emaill Address:&nbsp; <input type='text' name='email' class='input-medium' value='<?php echo $this->request->data['Deal']['email']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
Driver/State ID#:&nbsp; <input type='text' name='dl' class='input-small' value='<?php echo $this->request->data['Deal']['driver_lic']; ?>' />
</div>

<div class='leftbox_content'>
Driver/State EXP:&nbsp; <input type='text' name='dlexp' class='input-small' value='<?php echo $this->request->data['Deal']['driver_lic_exp']; ?>' />
</div>

<div class='leftbox_content'>
Social Security Number:&nbsp; <input type='text' name='ssnum' class='input-small' value='<?php echo $this->request->data['Deal']['ss_num']; ?>' />
</div>

<div class='leftbox_content'>
Date of Birth:&nbsp; <input type='text' name='dob' class='input-small' value='<?php echo $this->request->data['Deal']['dob']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
 Address(2):&nbsp; <input type='text' name='address2' class='input-medium' value='<?php echo $this->request->data['Deal']['address2']; ?>' />
</div>

<div class='leftbox_content'>
City(2):&nbsp; <input type='text' name='city2' class='input-small' value='<?php echo $this->request->data['Deal']['city2']; ?>' />
</div>

<div class='leftbox_content'>
State(2):&nbsp; <input type='text' name='state2' class='input-small' value='<?php echo $this->request->data['Deal']['state2']; ?>' />
</div>

<div class='leftbox_content'>
Zip(2):&nbsp; <input type='text' name='zip2' class='input-mini' value='<?php echo $this->request->data['Deal']['zip2']; ?>' />
</div>

<div class='leftbox_content'>
 Residence Status:&nbsp; <input type='text' name='residence_status' class='input-small' value='<?php echo $this->request->data['Deal']['residence_status']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Monthly Mortgage or Rent: $:&nbsp; <input type='text' name='mortgage_month_amount' class='input-small' value='<?php echo $this->request->data['Deal']['mortgage_month_amount']; ?>' />
</div>

<div class='leftbox_content'>
Apt. #:&nbsp; <input type='text' name='apt_num' class='input-small' value='<?php echo $this->request->data['Deal']['apt_num']; ?>' />
</div>

<div class='leftbox_content'>
Residence Length?&nbsp; <input type='text' name='residence_length' class='input-mini' value='<?php echo $this->request->data['Deal']['residence_length']; ?>' />
</div>

<div class='leftbox_content'>
 Are you retired?&nbsp; <input type='text' name='retired_status' class='input-small' value='<?php echo $this->request->data['Deal']['retired_status']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Income(yearly) $&nbsp; <input type='text' name='income_yearly' class='input-mini' value='<?php echo $this->request->data['Deal']['income_yearly']; ?>' />
</div>

<div class='leftbox_content'>
Income(monthly) $&nbsp; <input type='text' name='income_monthly' class='input-mini' value='<?php echo $this->request->data['Deal']['income_monthly']; ?>' />
</div>

<div class='leftbox_content'>
Main Occupation:&nbsp; <input type='text' name='main_job' class='input-medium' value='<?php echo $this->request->data['Deal']['main_job']; ?>' />
</div>

<div class='leftbox_content'>
Main Employer:&nbsp; <input type='text' name='employer' class='input-medium' value='<?php echo $this->request->data['Deal']['employer']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
Job Length?&nbsp; <input type='text' name='job_length' class='input-mini' value='<?php echo $this->request->data['Deal']['job_length']; ?>' />
</div>

<div class='leftbox_content'>
Work Phone#&nbsp;<input type='text' name='work_phone' class='input-small' value='<?php echo $this->request->data['Deal']['work_phone']; ?>' />
</div>

<div class='leftbox_content'>
Previous Employer:&nbsp;<input type='text' name='previous_employer' class='input-medium' value='<?php echo $this->request->data['Deal']['previous_employer']; ?>' />
</div>

<div class='leftbox_content'>
Previous Job Length?&nbsp; <input type='text' name='previous_employer_length' class='input-mini' value='<?php echo $this->request->data['Deal']['previous_employer_length']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
Previous Work#&nbsp; <input type='text' name='previous_employer_number' class='input-small' value='<?php echo $this->request->data['Deal']['previous_employer_number']; ?>' />
</div>

<div class='leftbox_content'>
Other Income &nbsp; <input type='text' name='other_income' class='input-mini' value='<?php echo $this->request->data['Deal']['other_income']; ?>' />
</div>

<div class='leftbox_content'>
Other Emp:&nbsp;<input type='text' name='other_employer' class='input-small' value='<?php echo $this->request->data['Deal']['other_employer']; ?>' />
</div>

<div class='leftbox_content'>
Other (Yearly) $&nbsp;<input type='text' name='other_yearly' class='input-mini' value='<?php echo $this->request->data['Deal']['other_yearly']; ?>' />
</div>

<div class='leftbox_content'>
Other (Monthly) $&nbsp; <input type='text' name='other_monthly' class='input-mini' value='<?php echo $this->request->data['Deal']['other_monthly']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
</div>
</div>
<!-- another one -->
<div class='boxhead'>Customer Co-Buyer Information</div>
<div class='box'>
<div class='leftbox' align='left'>

<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>

CO-First:&nbsp; <input type='text' name='cobuyer_fname' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_fname']; ?>' />
</div>

<div class='leftbox_content'>
CO-Middle:&nbsp; <input type='text' name='cobuyer_mname' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_mname']; ?>' />
</div>

<div class='leftbox_content'>
CO-Last:&nbsp; <input type='text' name='cobuyer_lname' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_lname']; ?>' />
</div>

<div class='leftbox_content'>
CO-Home#&nbsp; <input type='text' name='cobuyer_phone' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_phone']; ?>' />
</div>

<div class='leftbox_content'>
CO-Mobile#:&nbsp; <input type='text' name='cobuyer_mobile' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_mobile']; ?>' />
<div style='clear:both;margin-bottom:8px;'></div>
</div>
<div class='leftbox_content'>
CO-Address:&nbsp; <input type='text' name='cobuyer_address' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_address']; ?>' />
</div>

<div class='leftbox_content'>
CO-City:&nbsp; <input type='text' name='cobuyer_city' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_city']; ?>' />
</div>

<div class='leftbox_content'>
CO-State:&nbsp; <input type='text' name='cobuyer_state' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_state']; ?>' />
</div>

<div class='leftbox_content'>
CO-Zip:&nbsp; <input type='text' name='cobuyer_zip' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_zip']; ?>' />
</div>

<div class='leftbox_content'>
CO-Emaill Address:&nbsp; <input type='text' name='cobuyer_email' class='input-medium' value='<?php echo $this->request->data['Deal']['cobuyer_email']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
CO-Driver/State ID#:&nbsp; <input type='text' name='cobuyer_licence' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_licence']; ?>' />
</div>

<div class='leftbox_content'>
CO-Driver/State EXP:&nbsp; <input type='text' name='cobuyer_licence_exp' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_licence_exp']; ?>' />
</div>

<div class='leftbox_content'>
CO-Social Security#&nbsp; <input type='text' name='cobuyer_ssn' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_ssn']; ?>' />
</div>

<div class='leftbox_content'>
CO-Date of Birth:&nbsp; <input type='text' name='cobuyer_dob' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_dob']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
CO-Address(2):&nbsp; <input type='text' name='co_address' class='input-small' value='<?php echo $this->request->data['Deal']['co_address']; ?>' />
</div>

<div class='leftbox_content'>
CO-City(2):&nbsp; <input type='text' name='co_city' class='input-small' value='<?php echo $this->request->data['Deal']['co_city']; ?>' />
</div>

<div class='leftbox_content'>
CO-State(2):&nbsp; <input type='text' name='co_state' class='input-mini' value='<?php echo $this->request->data['Deal']['co_state']; ?>' />
</div>

<div class='leftbox_content'>
CO-Zip(2):&nbsp; <input type='text' name='co_zip' class='input-mini' value='<?php echo $this->request->data['Deal']['co_zip']; ?>' />
</div>

<div class='leftbox_content'>
 CO-Residence Status:&nbsp; <input type='text' name='cobuyer_residence_status' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_residence_status']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
CO-Monthly Mortgage or Rent: $:&nbsp; <input type='text' name='cobuyer_monthly_mortgage' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_monthly_mortgage']; ?>' />
</div>

<div class='leftbox_content'>
CO-Apt. #:&nbsp; <input type='text' name='cobuyer_apt_num' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_apt_num']; ?>' />
</div>

<div class='leftbox_content'>
CO-Residence Length?&nbsp; <input type='text' name='cobuyer_residence_length' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_residence_length']; ?>' />
</div>

<div class='leftbox_content'>
 CO-Are you retired?&nbsp; <input type='text' name='cobuyer_retired' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_retired']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
CO-Income(yearly) $&nbsp; <input type='text' name='cobuyer_income_yearly' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_income_yearly']; ?>' />
</div>

<div class='leftbox_content'>
CO-Income(monthly) $&nbsp; <input type='text' name='cobuyer_income_monthly' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_income_monthly']; ?>' />
</div>

<div class='leftbox_content'>
CO-Main Job:&nbsp; <input type='text' name='cobuyer_main_job' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_main_job']; ?>' />
</div>

<div class='leftbox_content'>
CO-Main Employer:&nbsp; <input type='text' name='cobuyer_employer' class='input-medium' value='<?php echo $this->request->data['Deal']['cobuyer_employer']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
CO-Job Length?&nbsp; <input type='text' name='cobuyer_job_length' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_job_length']; ?>' />
</div>

<div class='leftbox_content'>
CO-Work#&nbsp;<input type='text' name='cobuyer_work_phone' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_work_phone']; ?>' />
</div>

<div class='leftbox_content'>
CO-Previous Employer:&nbsp;<input type='text' name='co_previous_employer' class='input-medium' value='<?php echo $this->request->data['Deal']['co_previous_employer']; ?>' />
</div>

<div class='leftbox_content'>
CO-Previous Job Length?&nbsp; <input type='text' name='co_previous_employer_length' class='input-mini' value='<?php echo $this->request->data['Deal']['co_previous_employer_length']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
CO-Previous Work#&nbsp; <input type='text' name='co_previous_employer_number' class='input-small' value='<?php echo $this->request->data['Deal']['co_previous_employer_number']; ?>' />
</div>

<div class='leftbox_content'>
CO-Other Income &nbsp; <input type='text' name='cobuyer_other_income' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_other_income']; ?>' />
</div>

<div class='leftbox_content'>
CO-Other Emp:&nbsp;<input type='text' name='cobuyer_other_employer' class='input-small' value='<?php echo $this->request->data['Deal']['cobuyer_other_employer']; ?>' />
</div>

<div class='leftbox_content'>
CO-Other (Yearly) $&nbsp;<input type='text' name='cobuyer_other_income_yearly' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_other_income_yearly']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
CO-Other (Monthly) $&nbsp; <input type='text' name='cobuyer_other_income_monthly' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_other_income_monthly']; ?>' />
</div>

<div class='leftbox_content'>
Co-Realtionship?&nbsp; <input type='text' name='cobuyer_relationship' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_relationship']; ?>' />
</div>

<div class='leftbox_content'>
Co-Gender:&nbsp; <input type='text' name='cobuyer_gender' class='input-mini' value='<?php echo $this->request->data['Deal']['cobuyer_gender']; ?>' />
<div style='clear:both;margin-bottom:8px;'></div>
</div>
<div style='clear:both;margin-bottom:8px;'></div>
</div>
</div>

<!-- another one -->
<div class='boxhead'>References / Vechicle Info</div>
<div class='box'>
<div class='leftbox' align='left'>
<div align='center' style='clear:both;margin-bottom:8px;'>(3)Three References</div>
<div class='leftbox_content'>
Ref #1 Name: &nbsp;<input type='text' name='ref1_name' class='input-small' value='<?php echo $this->request->data['Deal']['ref1_name']; ?>' />
</div>

<div class='leftbox_content'>
Ref #1 Phone:&nbsp;<input type='text' name='ref1_phone' class='input-small' value='<?php echo $this->request->data['Deal']['ref1_phone']; ?>' />
</div>

<div class='leftbox_content'>
Ref #1 City:&nbsp; <input type='text' name='ref1_city' class='input-small' value='<?php echo $this->request->data['Deal']['ref1_city']; ?>' />
</div>

<div class='leftbox_content'>
Ref #1 State:&nbsp; <input type='text' name='ref1_state' class='input-mini' value='<?php echo $this->request->data['Deal']['ref1_state']; ?>' />
</div>

<div class='leftbox_content'>
Ref #1 Type: &nbsp; <input type='text' name='ref1_type' class='input-mini' value='<?php echo $this->request->data['Deal']['ref1_type']; ?>' />
</div>

<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
Ref #2 Name: &nbsp;<input type='text' name='ref2_name' class='input-small' value='<?php echo $this->request->data['Deal']['ref2_name']; ?>' />
</div>

<div class='leftbox_content'>
Ref #2 Phone:&nbsp;<input type='text' name='ref2_phone' class='input-small' value='<?php echo $this->request->data['Deal']['ref2_phone']; ?>' />
</div>

<div class='leftbox_content'>
Ref #2 City:&nbsp; <input type='text' name='ref2_city' class='input-small' value='<?php echo $this->request->data['Deal']['ref2_city']; ?>' />
</div>

<div class='leftbox_content'>
Ref #2 State:&nbsp; <input type='text' name='ref2_state' class='input-mini' value='<?php echo $this->request->data['Deal']['ref2_state']; ?>' />
</div>

<div class='leftbox_content'>
Ref #2 Type: &nbsp; <input type='text' name='ref2_type' class='input-mini' value='<?php echo $this->request->data['Deal']['ref2_type']; ?>' />
</div>

<div style='clear:both;margin-bottom:8px;'></div>

<div class='leftbox_content'>
Ref #3 Name: &nbsp;<input type='text' name='ref3_name' class='input-small' value='<?php echo $this->request->data['Deal']['ref3_name']; ?>' />
</div>

<div class='leftbox_content'>
Ref #3 Phone:&nbsp;<input type='text' name='ref3_phone' class='input-small' value='<?php echo $this->request->data['Deal']['ref3_phone']; ?>' />
</div>

<div class='leftbox_content'>
Ref #3 City:&nbsp; <input type='text' name='ref3_city' class='input-small' value='<?php echo $this->request->data['Deal']['ref3_city']; ?>' />
</div>

<div class='leftbox_content'>
Ref #3 State:&nbsp; <input type='text' name='ref3_state' class='input-mini' value='<?php echo $this->request->data['Deal']['ref3_state']; ?>' />
</div>

<div class='leftbox_content'>
Ref #3 Type: &nbsp; <input type='text' name='ref3_type' class='input-mini' value='<?php echo $this->request->data['Deal']['ref3_type']; ?>' />
</div>

<div align='center' style='clear:both;margin-bottom:8px;'>Vechicle Info</div>

<div class='leftbox_content'>
Stock#: &nbsp;<input type='text' name='stock_num' class='input-mini' value='<?php echo $this->request->data['Deal']['stock_num']; ?>' />
</div>

<div class='leftbox_content'>
Condition:&nbsp;<input type='text' name='condition' class='input-mini' value='<?php echo $this->request->data['Deal']['condition']; ?>' />
</div>

<div class='leftbox_content'>
Year:&nbsp; <input type='text' name='year' class='input-mini' value='<?php echo $this->request->data['Deal']['year']; ?>' />
</div>

<div class='leftbox_content'>
Make:&nbsp; <input type='text' name='make' class='input-medium' value='<?php echo $this->request->data['Deal']['make']; ?>' />
</div>

<div class='leftbox_content'>
Model: &nbsp; <input type='text' name='model' class='input-mini' value='<?php echo $this->request->data['Deal']['model']; ?>' />
</div>

<div class='leftbox_content'>
Unit Type: &nbsp;<input type='text' name='type' class='input-small' value='<?php echo $this->request->data['Deal']['type']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Engine:&nbsp;<input type='text' name='engine' class='input-small' value='<?php echo $this->request->data['Deal']['engine']; ?>' />
</div>

<div class='leftbox_content'>
Trans:&nbsp; <input type='text' name='transmission' class='input-small' value='<?php echo $this->request->data['Deal']['transmission']; ?>' />
</div>

<div class='leftbox_content'>
Drivetrain:&nbsp; <input type='text' name='drivetrain' class='input-mini' value='<?php echo $this->request->data['Deal']['drivetrain']; ?>' />
</div>

<div class='leftbox_content'>
Vin#&nbsp; <input type='text' name='vin' class='input-medium' value='<?php echo $this->request->data['Deal']['vin']; ?>' />
</div>

<div class='leftbox_content'>
Miles: &nbsp;<input type='text' name='odometer' class='input-mini' value='<?php echo $this->request->data['Deal']['odometer']; ?>' />
</div>

<div class='leftbox_content'>
Color:&nbsp;<input type='text' name='unit_color' class='input-small' value='<?php echo $this->request->data['Deal']['unit_color']; ?>' />
</div>
<div align='center' style='clear:both;margin-bottom:8px;'>Used Vechicle Info</div>

<div class='leftbox_content'>
Stock#: &nbsp;<input type='text' name='stock_num_used' class='input-mini' value='<?php echo $this->request->data['Deal']['stock_num_used']; ?>' />
</div>

<div class='leftbox_content'>
Condition:&nbsp;<input type='text' name='condition_trade' class='input-mini' value='<?php echo $this->request->data['Deal']['condition_trade']; ?>' />
</div>

<div class='leftbox_content'>
Year:&nbsp; <input type='text' name='year_trade' class='input-mini' value='<?php echo $this->request->data['Deal']['year_trade']; ?>' />
</div>

<div class='leftbox_content'>
Make:&nbsp; <input type='text' name='make_trade' class='input-medium' value='<?php echo $this->request->data['Deal']['make_trade']; ?>' />
</div>

<div class='leftbox_content'>
Model: &nbsp; <input type='text' name='model_trade' class='input-mini' value='<?php echo $this->request->data['Deal']['model_trade']; ?>' />
</div>

<div class='leftbox_content'>
Unit Type: &nbsp;<input type='text' name='type_trade' class='input-small' value='<?php echo $this->request->data['Deal']['type_trade']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Engine:&nbsp;<input type='text' name='engine_used' class='input-small' value='<?php echo $this->request->data['Deal']['engine_used']; ?>' />
</div>

<div class='leftbox_content'>
Trans:&nbsp; <input type='text' name='transmission_used' class='input-small' value='<?php echo $this->request->data['Deal']['transmission_used']; ?>' />
</div>

<div class='leftbox_content'>
Drivetrain:&nbsp; <input type='text' name='drivetrain_used' class='input-mini' value='<?php echo $this->request->data['Deal']['drivetrain_used']; ?>' />
</div>

<div class='leftbox_content'>
Vin#&nbsp; <input type='text' name='vin_trade' class='input-medium' value='<?php echo $this->request->data['Deal']['vin_trade']; ?>' />
</div>

<div class='leftbox_content'>
Miles: &nbsp;<input type='text' name='odometer_trade' class='input-mini' value='<?php echo $this->request->data['Deal']['odometer_trade']; ?>' />
</div>

<div class='leftbox_content'>
Color:&nbsp;<input type='text' name='usedunit_color' class='input-small' value='<?php echo $this->request->data['Deal']['usedunit_color']; ?>' />
</div>
</div>
</div>
<div class='page-break'></div>
<!-- another one -->
<div class='boxhead'>Customer Payment  / Fee</div>
<div class='box'>
<div class='leftbox' align='left'>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Tags: $&nbsp;<input type='text' name='tag_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['tag_fee']; ?>' />
</div>

<div class='leftbox_content'>
Title: $&nbsp;<input type='text' name='title_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['title_fee']; ?>' />
</div>

<div class='leftbox_content'>
Doc: $&nbsp; <input type='text' name='doc_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['doc_fee']; ?>' />
</div>

<div class='leftbox_content'>
Freight: $&nbsp; <input type='text' name='freight_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['freight_fee']; ?>' />
</div>

<div class='leftbox_content'>
Prep: $&nbsp; <input type='text' name='prep_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['prep_fee']; ?>' />
</div>



<div class='leftbox_content'>
PPM: $&nbsp;<input type='text' name='ppm_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['ppm_fee']; ?>' />
</div>

<div class='leftbox_content'>
Hazard: $&nbsp;<input type='text' name='hazard_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['hazard_fee']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
ESP: $&nbsp; <input type='text' name='esp_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['esp_fee']; ?>' />
</div>

<div class='leftbox_content'>
GAP: $&nbsp; <input type='text' name='gap_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['gap_fee']; ?>' />
</div>

<div class='leftbox_content'>
Tire/W: $&nbsp; <input type='text' name='tire_wheel_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['tire_wheel_fee']; ?>' />
</div>



<div class='leftbox_content'>
Lic/R: $&nbsp;<input type='text' name='licreg_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['licreg_fee']; ?>' />
</div>

<div class='leftbox_content'>
VSC:$&nbsp;<input type='text' name='vsc_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['vsc_fee']; ?>' />
</div>

<div class='leftbox_content'>
Roadside:$&nbsp; <input type='text' name='roadside_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['roadside_fee']; ?>' />
</div>

<div class='leftbox_content'>
Theft:$&nbsp; <input type='text' name='theft_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['theft_fee']; ?>' />
</div>

<div class='leftbox_content'>
Parts: $ &nbsp; <input type='text' name='parts_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['parts_fee']; ?>' />
</div>

<div class='leftbox_content'>
Service: $&nbsp; <input type='text' name='service_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['service_fee']; ?>' />
</div>

<div class='leftbox_content'>
Tax:  %&nbsp; <input type='text' name='tax_fee' class='input-mini' value='<?php echo $this->request->data['Deal']['tax_fee']; ?>' />
</div>

<div class='leftbox_content'>
Amount: $&nbsp; <input type='text' name='amount' class='input-mini' value='<?php echo $this->request->data['Deal']['amount']; ?>' />
</div>

<div class='leftbox_content'>
APR:  %&nbsp; <input type='text' name='loan_apr' class='input-mini' value='<?php echo $this->request->data['Deal']['loan_apr']; ?>' />
</div>

<div class='leftbox_content'>
Term Years:&nbsp; <input type='text' name='loan_term' class='input-mini' value='<?php echo $this->request->data['Deal']['loan_term']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>
<span style='margin-right:20px;'>
<div align='center' style='clear:both;margin-bottom:8px;'>Vechicle Amount / Fees</div>
<div class='leftbox_content'>
Total:&nbsp; <input type='text' name='amount' class='input-mini' value='<?php echo $this->request->data['Deal']['amount']; ?>' />
</div>
<div class='leftbox_content'>
Unit Price:&nbsp; <input type='text' name='amount' class='input-mini' value='<?php echo $this->request->data['Deal']['amount']; ?>' />
</div>
<div class='leftbox_content'>
Fee Total:&nbsp; <input type='text' name='amount' class='input-mini' value='<?php echo $this->request->data['Deal']['fee_amount']; ?>' />
</div>
<div class='leftbox_content'>
Down Payment: $&nbsp; <input type='text' name='down_payment' class='input-mini' value='<?php echo $this->request->data['Deal']['down_payment']; ?>' />
</div>
<div class='leftbox_content'>
Trade Value: $&nbsp; <input type='text' name='trade_value' class='input-mini' value='<?php echo $this->request->data['Deal']['trade_value']; ?>' />
</div>
<div class='leftbox_content'>
Trade Payoff: $&nbsp; <input type='text' name='trade_payoff' class='input-mini' value='<?php echo $this->request->data['Deal']['trade_payoff']; ?>' />
</div><div style='clear:both;margin-bottom:8px;'></div>
<div style='clear:both;margin-bottom:8px;'></div>
<div style='clear:both;margin-bottom:8px;'></div>
<div class='leftbox_content'>
Deal Notes:</br>&nbsp; <input type='text' name='deal_notes' class='span9' value='<?php echo $this->request->data['Deal']['notes']; ?>' />
</div>
<div style='clear:both;margin-bottom:8px;'></div>

</body>
</html>
</div>
</div>
</div>
</div>
