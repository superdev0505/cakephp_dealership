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
	<div id="worksheet_container" style="width: 1031px; height:1056 margin:0 auto;">
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
	
table.main_width td,table.mid_width td
{
	padding:6px;
}
.back-color{background:#ccc!important;padding:8px;border: 1px solid #000;text-align:center;}

body{-webkit-print-color-adjust:exact;}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }

	.print_month
	{
		display:block;
	}


input[type="text"]{
height : 22px!important;
border:0px!important;
}

table.main_width
{
	width:1025px!important;
}
table.mid_width
{
	width:918px!important;
}
table.set_padding td
{
	padding: 1px 2px 0px 8px;!important;
	
}

td
{
	font-size:12px!important;
}
input[type="text"].bottom_border
{
border-bottom: 1px solid #000!important;

}
span.zero_padding,div.zero_padding
{
	padding:0px!important;
}

 @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 7mm 7mm 1mm 7mm ;  /* this affects the margin in the printer settings */
        }

        
}
</style>
            <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']); 
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>

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
         <table class="main_width no_padding" style="width:100%">
			<tr><td colspan="3"><h2 style="text-align:center;">CREDIT APPLICATION</h2></td></tr>
         <tr><td rowspan="2"><h4><?php echo AuthComponent::user('dealer'); ?><br/>
         						<?php echo AuthComponent::user('d_address'); ?><br/>
                               <?php echo AuthComponent::user('d_city').', '.AuthComponent::user('d_state').' '.AuthComponent::user('d_zip'); ?><br/>
                                Phone: <?php echo AuthComponent::user('d_phone'); ?> &nbsp;&nbsp;Fax: <?php echo AuthComponent::user('d_fax'); ?> 
         </h4><br/>
         <strong></strong>
         </td>
         <td align="right"><label><input type="checkbox" name="individual_app" <?php echo (!empty($info['individual_app']) && $info['individual_app'] == 'yes')?'checked="checked"':''; ?> value="yes" />&nbsp;Individual Application </label></td>
         <td align="right"><label><input type="checkbox" name="joint_app" <?php echo (!empty($info['joint_app']) && $info['joint_app'] == 'yes')?'checked="checked"':''; ?> value="yes" />&nbsp;Joint Application </label></td>         
         </tr>
         <tr>
         <td align="right"><label>F&I Manager</label></td>
         <td><input type="text" class="bottom_border" name="f_i_manger" value="<?php echo isset($info['f_i_manger'])?$info['f_i_manger']:''; ?>" /></td>
         </tr>
         
         </table>
           
            
        
        
                           

<table>
<tr><td><h4 class="back-color">Primary Applicant</h4></td></tr>
<tr><td>
 <table border="1" bordercolor="#CCCCCC" class="main_width set_padding" >
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
<td>Home Phone<br/><input type="text" style="width:120px;" name="phone" value="<?php echo $cleaned2; ?>" /></td>
<td colspan="2">HOW LONG AT ADDRESS?<br/><input type="text" style="width:100px;" name="residence_length" value="<?php echo $info['residence_length']; ?>" />YRS</td>
</tr>
<tr><td colspan="2" style="width:25%">PREVIOUS ADDRESSES (TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="address2" value="<?php echo $info['address2']; ?>" /></td>
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
<?php /*?><td colspan="2">LIVED IN THE COMMUNITY?<br/>
<input type="text" style="width:100px;" name="in_community3" value="<?php echo $info['in_community3']; ?>" /> YRS
<input type="text" style="width:40px;" />&nbsp;YRS&nbsp;&nbsp; <input type="text" style="width:40px;" /><?php&nbsp;MOS  </td>*/?>
<td valign="middle">
<input type="radio" name="house_rent" value="Buy" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Buy')?'checked="checked"':''; ?> /> &nbsp;Buy &nbsp;&nbsp;&nbsp;<input type="radio" name="house_rent" value="Rent" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Rent')?'checked="checked"':''; ?> /> &nbsp;Rent&nbsp;&nbsp;
&nbsp;<input type="radio" name="house_rent" value="Own" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Own')?'checked="checked"':''; ?> /> &nbsp;Other
</td>
<td> Payment Amt. <br/>
<input type="text" style="width:102px;" name="rent_payment_amount" value="<?php echo $info['rent_payment_amount']; ?>" />
</td>
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
<input type="text" style="width:120px;" name="work_phone" value="<?php echo $cleaned3; ?>" /></td>
<td colspan="2">Cell Phone<br/>
<input type="text" style="width:120px;" name="mobile" value="<?php echo $cleaned1; ?>" /></td>
</tr>
<tr>
<table bordercolor="#CCCCCC" border="1" class="main_width set_padding">
<tr><td style="width:25%">PREVIOUS EMPLOYMENT (TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:272px;" name="previous_employer" value="<?php echo $info['previous_employer']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="previous_employer_address" value="<?php echo $info['previous_employer_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="previous_employer_city" value="<?php echo $info['previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="previous_employer_state" value="<?php echo $info['previous_employer_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="previous_employer_zip" value="<?php echo $info['previous_employer_zip']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="previous_employer_length" value="<?php echo $info['previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>Ever Filed Bankruptcy<br /><input type="radio" name="filed_bankruptcy" value="yes" <?php echo (isset($info['filed_bankruptcy'])&&$info['filed_bankruptcy']=='yes')?'checked="checked"':''; ?> /> &nbsp;Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="filed_bankruptcy" value="no" <?php echo (isset($info['filed_bankruptcy'])&&$info['filed_bankruptcy']=='no')?'checked="checked"':''; ?> /> &nbsp;No</td>
<td>Year Filed<br /><input type="text" style="width:157px;" name="year_filed" value="<?php echo $info['year_filed']; ?>" /></td>
<td>Type<br /><input type="radio" name="bankruptcy_type" value="Chapter7" <?php echo (isset($info['bankruptcy_type'])&&$info['bankruptcy_type']=='Chapter7')?'checked="checked"':''; ?> /> &nbsp;Chapter 7<br/><input type="radio" name="bankruptcy_type" value="Chapter13" <?php echo (isset($info['bankruptcy_type'])&&$info['bankruptcy_type']=='Chapter13')?'checked="checked"':''; ?> /> &nbsp;Chapter 13</td>
<td><input type="radio" name="bankruptcy_res" value="Dischared" <?php echo (isset($info['bankruptcy_res'])&&$info['bankruptcy_res']=='Discharged')?'checked="checked"':''; ?> /> &nbsp;Dischared<br/><input type="radio" name="bankruptcy_res" value="Dismissed" <?php echo (isset($info['bankruptcy_res'])&&$info['bankruptcy_res']=='Dismissed')?'checked="checked"':''; ?> /> &nbsp;Dismissed</td>

<td colspan="2">If Dismissed give reason<br/><input type="text" style="width:180px;"  name="dismissed_reason" value="<?php echo $info['dismissed_reason']; ?>" /></td>
</tr>
<tr>
<td>Monthy Income<br/>
<input type="text" style="width:200px;"  name="monthly_income" value="<?php echo $info['monthly_income']; ?>" />
</td>
<td>Other Income(Monthly)<br/>
<input type="text"   name="other_income" value="<?php echo $info['other_income']; ?>" />
</td>
<td colspan="2">Other Income Source<br/>
<input type="text" name="other_source" style="width:180px;" value="<?php echo $info['other_source']; ?>" />
</td>
<td>Bank Reference<br/>
<input type="text" name="bank_refrence" style="width:100px;" value="<?php echo $info['bank_refrence']; ?>" />
</td>
<td><input type="checkbox" name="checking_account" value="Checking" <?php echo (isset($info['checking_account'])&&$info['checking_account']=='Checking')?'checked="checked"':''; ?> /> &nbsp;Checking<br/><input type="checkbox" name="saving_account" value="Savings" <?php echo (isset($info['saving_account'])&&$info['saving_account']=='Savings')?'checked="checked"':''; ?> /> &nbsp;Savings</td>
</tr>

<tr><td style="width:25%">NEAREST RELATIVE NOT LIVING WITH YOU<br /><input type="text" style="width:272px;" name="ref1_name" value="<?php echo $info['ref1_name']; ?>"  /></td>
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
 
 
 
<table>
<tr><td><h4 class="back-color">Co-Applicant</h4></td></tr>
<tr><td>
 <table border="1" bordercolor="#CCCCCC" class="main_width set_padding">
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
<tr><td colspan="2" style="width:25%">PREVIOUS ADDRESSES (TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="co_address" value="<?php echo $info['co_address']; ?>" /></td>
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
<?php /*?><td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="co_in_community2" value="<?php echo $info['co_in_community2']; ?>" /> YRS</td><?php */?>
<td valign="middle">
<input type="radio" name="house_rent2" value="Buy" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Buy')?'checked="checked"':''; ?> /> &nbsp;Buy &nbsp;&nbsp;&nbsp;<input type="radio" name="house_rent2" value="Rent" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Rent')?'checked="checked"':''; ?> /> &nbsp;Rent&nbsp;&nbsp;
&nbsp;<input type="radio" name="house_rent2" value="Own" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Own')?'checked="checked"':''; ?> /> &nbsp;Other
</td>
<td> Payment Amt. <br/>
<input type="text" style="width:102px;" name="rent_payment_amount2" value="<?php echo $info['rent_payment_amount2']; ?>" />
</td>
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
<td colspan="2">
Cell Phone<br/>
<input type="text" style="width:120px;" name="cobuyer_mobile" value="<?php echo $info['cobuyer_mobile']; ?>" />
</td>
</tr>
<tr>
<table bordercolor="#CCCCCC" border="1" class="main_width set_padding">
<tr><td style="width:25%">PREVIOUS EMPLOYMENT (TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:272px;" name="co_previous_employer" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_previous_employer_address" value="<?php echo $info['co_previous_employer_address']; ?>"  /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_previous_employer_city" value="<?php echo $info['co_previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="co_previous_employer_state" value="<?php echo $info['co_previous_employer_state']; ?>"  /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="co_previous_employer_zip" value="<?php echo $info['co_previous_employer_zip']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="co_previous_employer_length" value="<?php echo $info['co_previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>Ever Filed Bankruptcy<br /><input type="radio" name="co_filed_bankruptcy" value="yes" <?php echo (isset($info['co_filed_bankruptcy'])&&$info['co_filed_bankruptcy']=='yes')?'checked="checked"':''; ?> /> &nbsp;Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="co_filed_bankruptcy" value="no" <?php echo (isset($info['co_filed_bankruptcy'])&&$info['co_filed_bankruptcy']=='no')?'checked="checked"':''; ?> /> &nbsp;No</td>
<td>Year Filed<br /><input type="text" style="width:157px;" name="co_year_filed" value="<?php echo $info['co_year_filed']; ?>" /></td>
<td>Type<br /><input type="radio" name="co_bankruptcy_type" value="Chapter7" <?php echo (isset($info['co_bankruptcy_type'])&&$info['co_bankruptcy_type']=='Chapter7')?'checked="checked"':''; ?> /> &nbsp;Chapter 7<br/><input type="radio" name="co_bankruptcy_type" value="Chapter13" <?php echo (isset($info['co_bankruptcy_type'])&&$info['co_bankruptcy_type']=='Chapter13')?'checked="checked"':''; ?> /> &nbsp;Chapter 13</td>
<td><input type="radio" name="co_bankruptcy_res" value="Dischared" <?php echo (isset($info['co_bankruptcy_res'])&&$info['co_bankruptcy_res']=='Discharged')?'checked="checked"':''; ?> /> &nbsp;Dischared<br/><input type="radio" name="co_bankruptcy_res" value="Dismissed" <?php echo (isset($info['co_bankruptcy_res'])&&$info['co_bankruptcy_res']=='Dismissed')?'checked="checked"':''; ?> /> &nbsp;Dismissed</td>

<td colspan="2">If Dismissed give reason<br/><input type="text" style="width:180px;"  name="dismissed_reason" value="<?php echo $info['co_dismissed_reason']; ?>" /></td>
</tr>
<tr>
<td>Monthy Income<br/>
<input type="text" style="width:200px;"  name="co_monthly_income" value="<?php echo $info['co_monthly_income']; ?>" />
</td>
<td>Other Income(Monthly)<br/>
<input type="text"   name="co_other_income" value="<?php echo $info['co_other_income']; ?>" />
</td>
<td colspan="2">Other Income Source<br/>
<input type="text" name="co_other_source" style="width:180px;" value="<?php echo $info['co_other_source']; ?>" />
</td>
<td>Bank Reference<br/>
<input type="text" name="co_bank_refrence" style="width:100px;" value="<?php echo $info['co_bank_refrence']; ?>" />
</td>
<td><input type="checkbox" name="co_checking_account" value="Checking" <?php echo (isset($info['co_checking_account'])&&$info['co_checking_account']=='Checking')?'checked="checked"':''; ?> /> &nbsp;Checking<br/><input type="checkbox" name="co_saving_account" value="Savings" <?php echo (isset($info['co_saving_account'])&&$info['co_saving_account']=='Savings')?'checked="checked"':''; ?> /> &nbsp;Savings</td>
</tr>
<tr><td style="width:25%">NEAREST RELATIVE NOT LIVING WITH YOU<br /><input type="text" style="width:272px;" name="co_ref_name" value="<?php echo $info['co_ref_name']; ?>" /></td>
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
 
 

 
 <span class="full"><p>By signing below I/we certify all information contained herein is true and correct to the best of my/our knowledge.  I/we hereby authorize you to obtain, verify, or confirm any information about me/us, or my/our credit and employment history, from credit reporting agencies, directly from my/our creditors, landlords, or other businesses or individuals, as well as my/our current or former employers.  I/we consent to such persons or entities providing such information to you as a means of securing credit.</p>
 </span>  
         
         
          
             
         <span class="span60" style="width:48%">
             <input type="text" class="bottom_border" style="width:99%" /><br/>
         APPLICANT'S SIGNATURE
         
         </span>   
          <span class="span60" style="width:48%">
          <input type="text" class="bottom_border" style="width:99%" /><br/>
       DATE
         </span>  
         
              <span class="span60" style="width:48%">
             <input type="text" class="bottom_border" style="width:99%" /><br/>
        CO-APPLICANT'S SIGNATURE    
         
         </span>   
          <span class="span60" style="width:48%">
          <input type="text" class="bottom_border" style="width:99%" /><br/>
         DATE      
         </span>    
		<!---left1-->
	
        <p align="center" style="padding-top:10px;">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->

		
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
