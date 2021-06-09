<?php

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');

$d_address = AuthComponent::user('d_address');
//echo $daddress;

$sperson = AuthComponent::user('full_name');

$d_city = AuthComponent::user('d_city');
//echo $dcity;

$d_state = AuthComponent::user('d_state');
//echo $dstate;

$d_zip = AuthComponent::user('d_zip');
//echo $dzip;

$d_phone = AuthComponent::user('d_phone');
//echo $dphone;

$d_fax = AuthComponent::user('d_fax');
//echo $dfax;

$d_email = AuthComponent::user('d_email');
//echo $demail;

$d_website = AuthComponent::user('d_website');
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

<div class="wraper main" id="worksheet_wraper"  style="overflow: auto;">
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px; margin:0 auto;">
		<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}

.text_captialize{
	text-transform:capitalize;
}

body {
	font-family:"Arial";
}

a {
	text-decoration:none;
	color:inherit;
}
hr {
display: block;
margin-top:0.1em;
margin-bottom:0.1em;

border-style: inset;
border-width: 1px;
}
input{
    border: 1px solid #aaa;
    padding: 5px 0;



}
input, textarea, keygen, select, button, isindex {
margin-top: 0em;
}


.clear:after {
    content: '';
    display: table;
    clear: both;
}

.full,
.half,
.three,
.four,
.two-three,
.six,
.label20,
.label30,
.eight {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
}

.label20{
	width:19%;
}
.label30{
	width:28%;
}
.six {
	width :15%
}
.eight {
	width :12%
}
.full {
	width: 99%;
}

.half {
	width: 49%;
}

.three {
	width: 32.33%;
}

.four {
	width: 24%;
}

.two-three {
	width: 65.66%;
}

.wraper.main,
.wraper.main *{
	box-sizing: border-box;
}

.wraper.main{
	width:1048px;
	background:#fff;
	padding: 0;
	margin:0px auto;
	border-radius: 7px;
}

.wraper.main input {
	padding: 5px;
	margin:2px 0px 2px 0px;
}
.wraper.main input::-moz-placeholder {
     padding: 1px 1px 1px 1px;
}
.wraper.main input:-moz-placeholder {
    text-indent: 3.8%;
}
.have-border {
    border: 1px solid #aaa;
}

button, select, option{
	cursor:pointer;
	padding:4px 0;
}
.top-three {
    display: inline-block;
    width: 33%;
    padding:0 3px;
}

.date{
	text-align:center;
	padding: 18px 0;
}
.red{
color:red;
}
.sub-title {
	font-weight:bold;
	text-align:center;
	padding:4px 0;
}

.condition-text {
    width: 32%;
    display: inline-block;
}

.select-person select {
    width: 100%;
}

.condition-input {
    width: 32.33%;
}

.salesection input {
    width: 30%;
}
.salesection span {
    width: 65%;
    display: inline-block;
}

.wraper-section {
	margin-bottom: 15px;
}

.content-left {
    width: 63.76%;
    border: 1px solid #aaa;
    padding: 10px 3px;
    display: inline-block;
    float: left;
    margin: 0 0 0 12px;
}
.content-left .col1 {
    width: 10%;
}
.content-left .col2 {
    width: 20%;
}
.content-left .col3 {
    width: 25%;
}
.content-left .col4 {
    width: 41%;
}

.content-right {
    width: 31.4%;
    display: inline-block;
    height: 119px;
    padding: 5px;
    border: 1px solid #aaa;
    margin: 0 7px 0 7px;
}

.wraper.content.middle:after {
    content: "";
    clear: both;
    display: table;
}

.detail-left p {
    font-weight: bold;
}

.detail-left hr {
    border-color: #000;
    margin: 0 0 29px 0;
}

.detail-right .col1 {
    width: 99%;
}
.detail-right .col2 {
    width: 48%;
}
.detail-right .col3 {
    width: 32.4%;
}

.footer button {
    padding: 10px 0;
    width: 33%;
}
.wraper.footer {
    padding: 10px 10px 30px 10px;
}

/*2nd Form*/

.left1{
    width: 50%;

    padding: 3px;
    display: inline-table;
	margin:1px 0;

}
.right1{
    width: 49%;

    padding: 3px;
    display: inline-table;
	margin:1px 0;

}

.input3 {
    width: 3%;
}
.input5 {
    width: 5%;
}
.input12 {
    width: 12%;
}
.input15 {
    width: 15%;
}
.input17 {
    width: 17%;
}
.input20 {
    width: 20%;
}
.input35 {
    width: 33%;
}
.input37 {
    width: 35%;
}
.input60 {
    width: 55%;
}
.span24 {
    width: 24%;
    display: inline-block;
}
.span15 {
    width: 15%;
    display: inline-block;
}
.span60 {
    width: 62%;
    display: inline-block;
}

.input70 {
    width: 68%;
}
.input71 {
    width: 69%;
}

.input33 {
    width: 30.4%;
}

.separator1 {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}
.separatorFoot {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}


.center {
    height: 64px;
}
.center span {
    width: 40%;
    display: inline-block;
}
.center input {
    width: 55%;
}

.blank {
    visibility: hidden;
    padding: 190px 0 0px 0;
}
.blank2 {
    visibility: hidden;
    padding: 172px 0 0px 0;
}
.blank3 {
    visibility: hidden;
    padding: 86px 0 0px 0;
}

.left-margin {
    text-align: left;
}

.select.condition {
    width: 32.43%;
}

.lookup {
    width: 32.33%;
}

.have-border.two-three {
    padding: 10px;
}

.wraper-section.clear.foot {
    padding: 0 0 20px 0;
}
.wraper-section.clear.foot button {
    width: 33%;
    padding: 7px 0;
}

.separator1-half {
    display: inline-block;
    width: 49.66%;
    text-align: center;
    background: #000;
    color: #fff;
    padding: 7px 0;
}
.print_month
	{
		display:none;
	}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
}
</style>
<?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
		<div class="wraper header">
			<span class="span24" style="padding:10px;"><h2 style="text-align:center;">CREDIT APPLICATION</h2></span>
            <span class="span60" style="padding:10px;text-align:center;width:55%;"><strong>IMPORTANT:</strong> READ THESE INSTRUCTIONS<br/> BEFORE COMPLETING THIS APPLICATION</span><span class="span15" style="text-align:center;"><h4>PURCHASE / LEASE</h4></span>
            <br />
            <span class="span15">&nbsp;</span>
            <span class="span60" style="text-align:justify;width:80%;"><input type="checkbox" name="individual_credit" value="yes" <?php echo (isset($info['individual_credit'])&&$info['individual_credit']=='yes')?'checked="checked"':''; ?> />&nbsp; If you are applying for individual credit in your own name and are relying on your own income or assets and not the income and assets of another person as the basis for repayment of the credit
requested, complete Section A.</span><br />
            <span class="span15" style="text-align:justify; vertical-align:middle;"><h4 style="text-align:center; vertical-align:middle;">Check Appropriate Box</h4></span>
            <span class="span60" style="text-align:justify;width:80%;"><input type="checkbox" name="married_and_community" value="yes" <?php echo (isset($info['married_and_community'])&&$info['married_and_community']=='yes')?'checked="checked"':''; ?> />&nbsp; If you are married and live in a community property state, complete all Sections including Section B providing information about your spouse.</span>
<br />
<span class="span15">&nbsp;</span>
<span class="span60" style="text-align:justify;width:78%;"><input type="checkbox" name="joint_credit" value="yes" <?php echo (isset($info['joint_credit'])&&$info['joint_credit']=='yes')?'checked="checked"':''; ?>  />&nbsp; If this is an application for joint credit with another person, complete all Sections providing information in Section B about the co-applicant.</span><br />
		<h4 style="text-align:center;padding:10px;">NOTE: APPLICANT, IF MARRIED, MAY APPLY FOR A SEPARATE ACCOUNT</h4><br />

         <table border="1" bordercolor="#CCCCCC" cellpadding="6">
         <tr>
         <td>SELLER<br  />
         <input type="text" style="width:285px;" name="company" value="<?php echo $dealer; ?>" /></td>
         <td>STOCK NO.<br /><input type="text" style="width:150px;" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></td>
         <td>VIN<br /><input type="text" style="width:220px;" name="vin" value="<?php echo $info['vin']; ?>" /></td>
         <td>DATE<br /><input type="text" style="width:123px;" name="created" value="<?php echo date('Y-m-d'); ?>" /></td>
         <td>AMOUNT REQUESTED<br /><input type="text" style="width:153px;" name="amount" value="<?php echo $info['amount']; ?>" /></td>
         </tr>
         </table>
<h4 style="text-align:left;padding-top:8px;"><strong>SECTION A:</strong> Information Regarding Applicant</h4><br />
<table><tr><td>
 <table border="1" bordercolor="#CCCCCC" cellpadding="6">
 <tr><td>LAST NAME <br/><input type="text" style="width:130px;" class="text_captialize" name="last_name" value="<?php echo $info['last_name']; ?>" /></td>
 <td>FIRST NAME<br/><input type="text" style="width:130px;" name="first_name" class="text_captialize" value="<?php echo $info['first_name']; ?>" /></td>
 <td>INITIAL<br/><input type="text" style="width:70px;" name="suffix" value="<?php echo $info['suffix']; ?>" /></td>
  <td>DOB<br/><input type="text" style="width:80px;" name="dob" value="<?php echo $info['dob']; ?>" /></td>
  <td>DRIVER LICENSE#<br/><input type="text" style="width:140px;" name="driver_lic" value="<?php echo !empty($info['driver_lic'])?$info['driver_lic']:''; ?>" /></td>
   <td>SSN / TAX ID<br/><input type="text" style="width:120px;" name="ss_num" value="<?php echo $info['ss_num']; ?>"  /></td>
    <td>Age of <br />Dependants<br/><input type="text" style="width:120px;" name="age_of_dependants" value="<?php echo $info['age_of_dependants']; ?>" /></td>
     <td><input type="radio" name="martial_status" value="Married" <?php echo (isset($info['martial_status'])&&$info['martial_status']=='Married')?'checked="checked"':''; ?> /> &nbsp;Married<br/><input type="radio" name="martial_status" value="Unmarried" <?php echo (isset($info['martial_status'])&&$info['martial_status']=='Separated')?'checked="checked"':''; ?>  /> &nbsp;Unmarried<br/><input type="radio" name="martial_status" Unmarried value="Separated" /> &nbsp;Separated</td>
 </tr>
 <tr><td colspan="2">Address<br/><input type="text" style="width:272px;" name="address" value="<?php echo $info['address']; ?>"  /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city" value="<?php echo $info['city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state" value="<?php echo $info['state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip" value="<?php echo $info['zip']; ?>" /></td>
<td>Home Phone<br/><input type="text" style="width:120px;" name="phone" value="<?php echo $info['phone']; ?>" /></td>
<td colspan="2">HOW LONG AT ADDRESS?<br/><input type="text" style="width:100px;" name="residence_length" value="<?php echo $info['residence_length']; ?>" />YRS</td>
</tr>
<tr><td colspan="2">PREVIOUS ADDRESSES<br />
(TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="address2" value="<?php echo $info['address2']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city2" value="<?php echo $info['city2']; ?>"  /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state2" value="<?php echo $info['state2']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip2" value="<?php echo $info['zip2']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="residence_length2" value="<?php echo $info['residence_length2']; ?>" />YRS</td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="in_community2" value="<?php echo $info['in_community2']; ?>" />&nbsp;YRS</td>
</tr>
<tr><td colspan="2"><input type="text" style="width:272px;" name="address3" value="<?php echo $info['address3']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city3" value="<?php echo $info['city3']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state3" value="<?php echo $info['state3']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip3" value="<?php echo $info['zip3']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="residence_length3" value="<?php echo $info['residence_length3']; ?>" />YRS
<?php /*?><input type="text" style="width:25px;" />YRS&nbsp; <input type="text" style="width:25px;" />MOS<?php */?></td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/>
<input type="text" style="width:100px;" name="in_community3" value="<?php echo $info['in_community3']; ?>" /> YRS
<?php /*?><input type="text" style="width:40px;" />&nbsp;YRS&nbsp;&nbsp; <input type="text" style="width:40px;" /><?php&nbsp;MOS  */?></td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER<br /><input type="text" style="width:272px;" name="employer" value="<?php echo $info['employer']; ?>" /></td>
<td colspan="2">OCCUPATION OR RANK<br /><input type="text" style="width:160px;" name="main_job" value="<?php echo $info['main_job']; ?>" /></td>
<td colspan="2">DEPARTMENT OR BADGE NO.<br /><input type="text" style="width:275px;" name="department"  value="<?php echo $info['department']; ?>" /></td>
<td colspan="2">HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="job_length" value="<?php echo $info['job_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER'S ADDRESS<br /><input type="text" style="width:272px;" name="employer_address" value="<?php echo $info['employer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="employer_city" value="<?php echo $info['employer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="employer_state" value="<?php echo $info['employer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="employer_zip" value="<?php echo $info['employer_zip']; ?>" /></td>
<td>Work Phone<br/>
<input type="text" style="width:120px;" name="work_phone" value="<?php echo $info['work_phone']; ?>" /></td>
<td colspan="2"></td>
</tr>
<tr>
<table cellpadding="6" bordercolor="#CCCCCC" border="1">
<tr><td>PREVIOUS EMPLOYMENT <br />(TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:272px;" name="previous_employer" value="<?php echo $info['previous_employer']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="previous_employer_address" value="<?php echo $info['previous_employer_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="previous_employer_city" value="<?php echo $info['previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="previous_employer_state" value="<?php echo $info['previous_employer_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="previous_employer_zip" value="<?php echo $info['previous_employer_zip']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="previous_employer_length" value="<?php echo $info['previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>&nbsp;<br /><input type="text" style="width:272px;" name="previous_employer2" value="<?php echo $info['previous_employer2']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="previous_employer_address2" value="<?php echo $info['previous_employer_address2']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="previous_employer_city2" value="<?php echo $info['previous_employer_city2']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="previous_employer_state2" value="<?php echo $info['previous_employer_state2']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="previous_employer_zip2" value="<?php echo $info['previous_employer_zip2']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;"  name="previous_employer_length2" value="<?php echo $info['previous_employer_length2']; ?>" /> YRS</td>
</tr>
<tr><td>NEAREST RELATIVE NOT<br /> LIVING WITH YOU<br /><input type="text" style="width:272px;" name="ref1_name" value="<?php echo $info['ref1_name']; ?>"  /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="ref1_address" value="<?php echo $info['ref1_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref1_city" value="<?php echo $info['ref1_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="ref1_state" value="<?php echo $info['ref1_state']; ?>"  /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="ref1_zip" value="<?php echo $info['ref1_zip']; ?>"  /></td>
<td>Relationship<br/><input type="text" style="width:120px;" name="ref1_type" value="<?php echo $info['ref1_type']; ?>"  /></td>
</tr>

</table>
</tr>
 </table>
 </td></tr>
 </table>
 <div class="full">
 <span class="full">
 <strong>Income</strong>
 </span>
 <span class="two-three">Applicant's Gross Monthly Income from Employment</span>
 <span class="six">&nbsp;</span>
 <span class="six">$<input type="text" style="width:120px;" name="income_monthly"  value="<?php echo $info['income_monthly']; ?>" /></span>

  <span class="two-three">Alimony, Child Support, or separate Maintenance Income not to be revealed if you do not wish to have it considered as a basis for repaying this obligation</span>
 <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="mortgage_month_amount" value="<?php echo $info['mortgage_month_amount']; ?>" /></span>
  <span class="two-three">Alimony, Child Support, or separate Maintenance Income received under:<br />
  <input type="checkbox" name="income_court" value="yes" <?php echo (isset($info['income_court'])&&$info['income_court']=='yes')?'checked="checked"':''; ?> />&nbsp; Court Order&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="income_written_agreement" value="yes" <?php echo (isset($info['income_written_agreement'])&&$info['income_written_agreement']=='yes')?'checked="checked"':''; ?> />&nbsp; Written Agreement&nbsp;&nbsp;&nbsp;
  <input type="checkbox"  name="income_oral_understanding" <?php echo (isset($info['income_oral_understanding'])&&$info['income_oral_understanding']=='yes')?'checked="checked"':''; ?> />&nbsp; Oral Understanding&nbsp;&nbsp;&nbsp;
  </span>
  <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="other_income2" value="<?php echo $info['other_income2']; ?>" /></span>
  <span class="two-three">Amount of other Monthly Income and Source(s)</span>
   <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="other_income" value="<?php echo $info['other_income']; ?>" /></span>

  <span class="two-three">&nbsp;</span>
   <span class="six"><strong>TOTAL MONTHLY INCOME</strong></span>
  <span class="six">$<input type="text" style="width:120px;" name="other_monthly" value="<?php echo $info['other_monthly']; ?>" /></span>

 </div>

 <h4 style="text-align:left;padding-top:8px;"><strong>SECTION B:</strong> Information Regarding Spouse, or Co-Applicant</h4><br />
<table><tr><td>
 <table border="1" bordercolor="#CCCCCC" cellpadding="6">
 <tr><td>LAST NAME <br/><input type="text" style="width:130px;" name="cobuyer_lname" value="<?php echo $info['cobuyer_lname']; ?>" /></td>
 <td>FIRST NAME<br/><input type="text" style="width:130px;" name="cobuyer_fname" value="<?php echo $info['cobuyer_fname']; ?>" /></td>
 <td>INITIAL<br/><input type="text" style="width:70px;" name="co_suffix" value="<?php echo $info['co_suffix']; ?>" /></td>
  <td>DOB<br/><input type="text" style="width:80px;" name="cobuyer_dob" value="<?php echo $info['cobuyer_dob']; ?>"  /></td>
  <td>DRIVER LICENSE#<br/><input type="text" style="width:140px;" name="cobuyer_licence" value="<?php echo $info['cobuyer_licence']; ?>" /></td>
   <td>SSN / TAX ID<br/><input type="text" style="width:120px;" name="cobuyer_ssn" value="<?php echo $info['cobuyer_ssn']; ?>" /></td>
    <td>Age of <br />Dependants<br/><input type="text" style="width:120px;" name="age_of_dependants" value="<?php echo $info['age_of_dependants']; ?>" /></td>
     <td><input type="radio" name="co_maritial_status" value="Married" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Married')?'checked="checked"':''; ?> /> &nbsp;Married<br/><input type="radio" name="co_maritial_status" value="Unmarried" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Unmarried')?'checked="checked"':''; ?> /> &nbsp;Unmarried<br/><input type="radio" name="co_maritial_status" value="Separated" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Separated')?'checked="checked"':''; ?> /> &nbsp;Separated</td>
 </tr>
 <tr><td colspan="2">Address<br/><input type="text" style="width:272px;" name="cobuyer_address" value="<?php echo $info['cobuyer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="cobuyer_city" value="<?php echo $info['cobuyer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="cobuyer_state" value="<?php echo $info['cobuyer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="cobuyer_zip" value="<?php echo $info['cobuyer_zip']; ?>" /></td>
<td>Home Phone<br/><input type="text" style="width:120px;" name="cobuyer_phone" value="<?php echo $info['cobuyer_phone']; ?>" /></td>
<td colspan="2">HOW LONG AT ADDRESS?<br/><input type="text" style="width:100px;" name="cobuyer_residence_length" value="<?php echo $info['cobuyer_residence_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PREVIOUS ADDRESSES<br />
(TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="co_address" value="<?php echo $info['co_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="co_city" value="<?php echo $info['co_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="co_state" value="<?php echo $info['co_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="co_zip" value="<?php echo $info['co_zip']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="co_residence_length" value="<?php echo $info['co_residence_length']; ?>" /> YRS</td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="co_in_community" value="<?php echo $info['co_in_community']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2"><input type="text" style="width:272px;" name="co_address2" value="<?php echo $info['co_address2']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="co_city2" value="<?php echo $info['co_city2']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="co_state2" value="<?php echo $info['co_state2']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="co_zip2" value="<?php echo $info['co_zip2']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="co_residence_length2" value="<?php echo $info['co_residence_length2']; ?>" /> YRS</td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="co_in_community2" value="<?php echo $info['co_in_community2']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER<br /><input type="text" style="width:272px;" name="cobuyer_employer" value="<?php echo $info['cobuyer_employer']; ?>" /></td>
<td colspan="2">OCCUPATION OR RANK<br /><input type="text" style="width:160px;" name="cobuyer_main_job" value="<?php echo $info['cobuyer_main_job']; ?>" /></td>
<td colspan="2">DEPARTMENT OR BADGE NO.<br /><input type="text" style="width:275px;" name="cobuyer_department" value="<?php echo $info['cobuyer_department']; ?>" /></td>
<td colspan="2">HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="cobuyer_job_length" value="<?php echo $info['cobuyer_job_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER'S ADDRESS<br /><input type="text" style="width:272px;" name="cobuyer_employer_address" value="<?php echo $info['cobuyer_employer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="cobuyer_employer_city" value="<?php echo $info['cobuyer_employer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="cobuyer_employer_state" value="<?php echo $info['cobuyer_employer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="cobuyer_employer_zip" value="<?php echo $info['cobuyer_employer_zip']; ?>" /></td>
<td>Work Phone<br/>
<input type="text" style="width:120px;" name="cobuyer_work_phone" value="<?php echo $info['cobuyer_work_phone']; ?>" /></td>
<td colspan="2"></td>
</tr>
<tr>
<table cellpadding="6" bordercolor="#CCCCCC" border="1">
<tr><td>PREVIOUS EMPLOYMENT <br />(TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:272px;" name="co_previous_employer" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_previous_employer_address" value="<?php echo $info['co_previous_employer_address']; ?>"  /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_previous_employer_city" value="<?php echo $info['co_previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="co_previous_employer_state" value="<?php echo $info['co_previous_employer_state']; ?>"  /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="co_previous_employer_zip" value="<?php echo $info['co_previous_employer_zip']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="co_previous_employer_length" value="<?php echo $info['co_previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>&nbsp;<br /><input type="text" style="width:272px;" name="co_previous_employer2" value="<?php echo $info['co_previous_employer2']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_previous_employer_address2" value="<?php echo $info['co_previous_employer_address2']; ?>"  /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_previous_employer_city2" value="<?php echo $info['co_previous_employer_city2']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="co_previous_employer_state2" value="<?php echo $info['co_previous_employer_state2']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="co_previous_employer_zip2" value="<?php echo $info['co_previous_employer_zip2']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="co_previous_employer_length2" value="<?php echo $info['co_previous_employer_length2']; ?>" /> YRS</td>
</tr>
<tr><td>NEAREST RELATIVE NOT<br /> LIVING WITH YOU<br /><input type="text" style="width:272px;" name="co_ref_name" value="<?php echo $info['co_ref_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_ref_address" value="<?php echo $info['co_ref_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_ref_city" value="<?php echo $info['co_ref_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="co_ref_state" value="<?php echo $info['co_ref_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="co_ref_zip" value="<?php echo $info['co_ref_zip']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:120px;" name="co_ref_type" value="<?php echo $info['co_ref_type']; ?>" /></td>
</tr>

</table>
</tr>
 </table>
 </td></tr>
 </table>
 <div class="full">
 <span class="full">
 <strong>Income</strong>
 </span>
 <span class="two-three">Applicant's Gross Monthly Income from Employment</span>
 <span class="six">&nbsp;</span>
 <span class="six">$<input type="text" style="width:120px;" name="cobuyer_income_monthly" value="<?php echo $info['cobuyer_income_monthly']; ?>" /></span>

  <span class="two-three">Alimony, Child Support, or separate Maintenance Income not to be revealed if you do not wish to have it considered as a basis for repaying this obligation</span>
 <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="cobuyer_monthly_mortgage" value="<?php echo $info['cobuyer_monthly_mortgage']; ?>" /></span>
  <span class="two-three">Alimony, Child Support, or separate Maintenance Income received under:<br />
  <input type="checkbox" name="court_order" value="yes" <?php echo (isset($info['court_order'])&&$info['court_order']=='yes')?'checked="checked"':''; ?> />&nbsp; Court Order&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="written_agreement" value="yes" <?php echo (isset($info['written_agreement'])&&$info['written_agreement']=='yes')?'checked="checked"':''; ?> />&nbsp; Written Agreement&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="oral_understanding" value="yes" <?php echo (isset($info['oral_understanding'])&&$info['oral_understanding']=='yes')?'checked="checked"':''; ?> />&nbsp; Oral Understanding&nbsp;&nbsp;&nbsp;
  </span>
  <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="cobuyer_monthly_mortgage2" value="<?php echo $info['cobuyer_monthly_mortgage2']; ?>" /></span>
  <span class="two-three">Amount of other Monthly Income and Source(s)</span>
   <span class="six">&nbsp;</span>
  <span class="six">$<input type="text" style="width:120px;" name="cobuyer_other_income_monthly" value="<?php echo $info['cobuyer_other_income_monthly']; ?>" /></span>

  <span class="two-three">&nbsp;</span>
   <span class="six"><strong>TOTAL MONTHLY INCOME</strong></span>
  <span class="six">$<input type="text" style="width:120px;" name="cobuyer_total_income_monthly" value="<?php echo $info['cobuyer_total_income_monthly']; ?>" /></span>

 </div>

 <h4 style="text-align:left;padding-top:8px;"><strong>SECTION C:</strong> <h4 style="text-align:left;padding-top:8px;"><strong>SECTION B:</strong> Information Regarding Spouse, or Co-Applicant</h4><br /></h4><br />
 <table cellpadding="6" bordercolor="#CCCCCC" border="1">
 <tr><td>PERSONAL FRIENDS KNOWN OVER ONE YEAR<br />1. &nbsp;<input type="text" style="width:292px;" name="ref2_name" value="<?php echo $info['ref2_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:180px;" name="ref2_address" value="<?php echo $info['ref2_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref2_city" value="<?php echo $info['ref2_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="ref2_state" value="<?php echo $info['ref2_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="ref2_zip" value="<?php echo $info['ref2_zip']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:110px;" name="ref2_type" value="<?php echo $info['ref2_type']; ?>" /></td>
</tr>
<tr><td>&nbsp;<br />2. &nbsp;<input type="text" style="width:292px;" name="ref3_name" value="<?php echo $info['ref3_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:180px;" name="ref3_address" value="<?php echo $info['ref3_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref3_city" value="<?php echo $info['ref3_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="ref3_state" value="<?php echo $info['ref3_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="ref3_zip" value="<?php echo $info['ref3_zip']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:110px;" name="ref3_type" value="<?php echo $info['ref3_type']; ?>" /></td>
</tr>
 </table> <br /> <br />
  <h4 style="text-align:left;padding-top:8px;"><strong>Fee Section:</strong> Fee</h4><br />
 <table cellpadding="6" bordercolor="#CCCCCC" border="1">
 <tr><td>FIXED FEE / PAYMENT:<br /><select name="fee_type" style="width:235px;">
 <option value="">Select</option>
 <?php foreach($selected_type_condition as $key=>$val){
	echo '<option value="'.$key.'">'.$val.'</option>';
 }?>
 </select>
 </td>
<td>Unit Amount:<br /><input type="text" style="width:235px;" name="unit_value" value="<?php echo $info['unit_value']; ?>" /></td>
<td>Down Payment:<br /><input type="text" style="width:235px;" name="down_payment" /></td>
<td>Trade Value:<br /><input type="text" style="width:246px;" name="trade_value" value="<?php echo $info['trade_value'];  ?>" /></td>

</tr>
<tr><td>Trade Payoff:<br /><input type="text" style="width:235px;" name="trade_payoff" value="<?php echo $info['trade_payoff']; ?>" />
 </td>
<td>Tags:<br /><input type="text" style="width:235px;" name="tag_fee" value="<?php echo $info['tag_fee']; ?>" /></td>
<td>Title:<br /><input type="text" style="width:235px;" name="title_fee" /></td>
<td>
Doc:<br /><input type="text" style="width:246px;" name="doc_fee" value="<?php echo $info['doc_fee'];  ?>" /></td>

</tr>
<tr><td>Freight:<br /><input type="text" style="width:235px;" name="freight_fee" value="<?php echo $info['freight_fee']; ?>" />
 </td>
<td>Prep:<br /><input type="text" style="width:235px;" name="prep_fee" value="<?php echo $info['prep_fee']; ?>" /></td>
<td>PPM:<br /><input type="text" style="width:235px;" name="ppm_fee" /></td>
<td>Hazard:<br /><input type="text" style="width:246px;" name="hazard_fee" /></td>

</tr>
<tr><td>ESP:<br /><input type="text" style="width:235px;" name="esp_fee"  />
 </td>
<td>
GAP:<br /><input type="text" style="width:235px;" name="gap_fee"  /></td>
<td>Tire/W:<br /><input type="text" style="width:235px;" name="tire_wheel_fee" /></td>
<td>R:<br /><input type="text" style="width:246px;" name="licreg_fee"  /></td>

</tr>

<tr><td>VSC:<br /><input type="text" style="width:235px;" name="vsc_fee" value="<?php echo $info['vsc_fee']; ?>" />
 </td>
<td>
Roadside:<br /><input type="text" style="width:235px;" name="roadside_fee" value="<?php echo $info['roadside_fee']; ?>" /></td>
<td>Theft:<br /><input type="text" style="width:235px;" name="theft_fee" /></td>
<td>Parts:<br /><input type="text" style="width:246px;" name="parts_fee" value="<?php echo $info['parts_fee'];  ?>" /></td>

</tr>
<tr><td>Service:<br /><input type="text" style="width:235px;" name="service_fee" value="<?php echo $info['service_fee']; ?>" />
 </td>
<td>
Tax:<br /><input type="text" style="width:235px;" name="tax_fee" value="<?php echo $info['tax_fee']; ?>" /></td>
<td>Amount:<br /><input type="text" style="width:235px;" name="amount" /></td>
<td>APR:<br /><input type="text" style="width:246px;" name="loan_apr" value="<?php echo $info['loan_apr'];  ?>" /></td>

</tr>
</table>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
 <h4 style="text-align:left;padding-top:8px;"><strong>Payment Section:</strong> Payment Option</h4><br />
<table cellpadding="6" bordercolor="#CCCCCC" border="1">
<tr>
<td>For <select name="payment_option1" class="price_options" style="width:30%;" id="payment_option1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:<br />
            <input type="text" name="option1_price" style="width:332px;" />
            </td>
<td>Total/Payments: <br /><input type="text" name="paymentTOtal" style="width:310px;" /></td>
<td>Total w/interest: <br /><input type="text" name="totalwinterest" style="width:320px;" /></td>

</tr>
<tr>

<tr>
<td>For <select name="payment_option2" class="price_options" style="width:30%;" id="payment_option1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:<br />
            <input type="text" name="option2_price" style="width:332px;" />
            </td>
<td>Total/Payments: <br /><input type="text" name="paymentTOtal" style="width:310px;" /></td>
<td>Total w/interest: <br /><input type="text" name="totalwinterest" style="width:320px;" /></td>

</tr>
<tr>
<tr>
<td>For <select name="payment_option3" class="price_options" style="width:30%;" id="payment_option1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:<br />
            <input type="text" name="option3_price" style="width:332px;" />
            </td>
<td>Total/Payments: <br /><input type="text" name="paymentTOtal" style="width:310px;" /></td>
<td>Total w/interest: <br /><input type="text" name="totalwinterest" style="width:320px;" /></td>

</tr>
<tr>
<td>For <select name="payment_option4" class="price_options" style="width:30%;" id="payment_option1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:<br />
            <input type="text" name="option4_price" style="width:332px;" />
            </td>
<td>Total/Payments: <br /><input type="text" name="paymentTOtal" style="width:310px;" /></td>
<td>Total w/interest: <br /><input type="text" name="totalwinterest" style="width:320px;" /></td>

</tr>
<tr>


</table>
 <br /><br /><br /><br />
 <span class="full">The undersigned, (1) make the above representations, which are certified to be correct, for the purpose of securing credit; (2) authorize financial institutions to obtain consumer credit reports on me periodically and to gather employment history as they consider necessary and appropriate; (3) authorize your affiliates to obtain consumer credit reports on me; (4) understands that we, or any financial institution to whom this application is submitted,will retain this application whether or not it is approved, and that it is the applicant's responsibility to notify the creditor of any change of name, addreess, or employment; (5) unless the circle that follows is marked, I authorize the Dealer and any assignee or other person to whom this application is submitted to share and use information about me, including information in my application, with other entities that are related to them by common ownership or affiliated with them by common control. If the circle is marked, I direct the dealer and any assignee or other person to whom this application is submitted not to give information to such entities (other than information on their own transactions and experiences).<br/>
The financial instution named below may be requested to purchase a sales finance contractwritten, or to be written, with your purchase. You are notified pursuant to the Fair Credit Reporting Act that your application may be
submitted to them. I acknowledge that I have received the privacy policy provided by Del Amo Motorsports.
 </span>

         <h3 style="text-align:left;padding-top:8px;">FINANCIAL INSTITUTIONS AND ADDRESSES</h3><br />
         <div class="full">
         <span class="six" style="width:19%"><strong>Los Angeles Federal CU</strong><br />
         P.O. Box 53032<br />
         Los Angeles, CA 90053
         </span>
         <span class="six" style="width:19%"><strong>GE Capital Retail Bank</strong><br />
        332 Minnesota Street Suite 610<br />
        St. Paul, MN 55101</span>
         <span class="six" style="width:19%"><strong>Model Finance</strong><br />
         1068 Town & Country<br />
         Orange, CA 92668</span>
         <span class="six" style="width:19%"><strong>CAPITAL ONE, NA</strong><br />
        700 N. Wood Dale Road<br />
         Wood Dale, IL 60191</span>
         <span class="six" style="width:19%"><strong>LBS FNCL CU</strong><br />
         P.O. Box 7860<br />
         Long Beach, CA 90804</span>

         </div>
         <div class="full" style="padding:0px;padding-left:10px;">
          <span class="six" style="width:19%"><strong>Sheffield FNCL FSB</strong><br />
        P.O. Box 1704<br />
         Clemmons, NC 27012
         </span>
         <span class="six" style="width:19%"><strong>Dwight FNCL Inc.</strong><br />
      P.O. Box 7397<br />
       Phoenix, AZ 85011</span>
         <span class="six" style="width:19%"><strong>Freedom Road Financial</strong><br />
         P.O. Box 18218<br />
         Reno, NV 89511</span>
         <span class="six" style="width:19%"><strong>Medalion Bank</strong><br />
        1100 East 6600 South Suite 510
<br />
         Salt Lake City, UT 84121</span>
         <span class="six" style="width:19%"><strong>MB Financial Bank</strong><br />
        6111 North River Road<br />
       Rosemont, IL 60018</span>
         </div>

          <div class="full" style="padding:0px;padding-left:10px;">
          <span class="six" style="width:19%"><strong>Merrick Bank Corporation</strong><br />
       10705 So. Jordan Gateway<br />
        Suite 200
South Jordan, UT 84095
         </span>
         <span class="six" style="width:19%"><strong>State Farm Bank</strong><br />
     P.O. Box 5961
<br />
       Madison, WI 53705</span>
        <span class="six" style="width:19%"><strong>SWCE Federal Credit Union
</strong><br />
     3810 Durbin Street
<br />
      Irwindale, CA 91706</span>
              </div>
              <br/>
         <span class="span60" style="width:48%">
         PURCHASER HEREBY ACKNOWLEDGES RECEIPT OF A COPY OF THIS CREDIT STATEMENT<br />
         <input type="text" style="width:99%" /><br/>
         APPLICANT'S SIGNATURE

         </span>
          <span class="span60" style="width:48%">
         CO-APPLICANT'S SIGNATURE MEANS YOU INTEND TO APPLY FOR JOINT CREDIT<br />
         <input type="text" style="width:99%" /><br/>
         CO-APPLICANT'S SIGNATURE

         </span>
		<!---left1-->
		</br>
        <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>

		<!-- no print buttons -->
	<br/>

	<div class="noprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print </button>
		<button class="btn btn-inverse pull-right"  data-dismiss="modal" style="margin-left:5px;" type="button">Close</button>

		<?php /*?><select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select><?php */?>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;" >Submit</button>


		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />

	</div>

	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");
























	/*$('#est_payoff').on('change keyup paste',function(){

		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/







	/*
	if( $('#sell_price').val() != '' && $('#sell_price').val() > 0 ){
		downpayment = ($('#sell_price').val() / 100 ) * 25;
		$('#down_pay').val( downpayment.toFixed(2)  ) ;
	}
	*/


	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);


	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis();
	});

	$("#btn_back").click(function(){

	});


	//calculate();



});






</script>
</div>
