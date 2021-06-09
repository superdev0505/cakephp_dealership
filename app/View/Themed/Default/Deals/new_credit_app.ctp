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
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	#worksheet_container
	{
		font-size:8px!important;
	}
	.print_month
	{
		display:block;
	}

input[type="checkbox"],input[type="radio"]{
height : 9px!important;
}
input[type="text"]{
height : 20px!important;
border: none;
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


	padding: 2px 2px!important;

}
h2{
	font-size:18px!important;
	font-weight:bolder;
}
h4,h3
{
	font-size:13px!important;
	font-weight:bold;
	padding-top:0px;!important;
	padding: 0px!important;
}
table.main_width
{
	width:997px!important;
}
table.mid_width
{
	width:890px!important;
}
table.set_padding td
{
	padding: 1px 2px 0px 8px;!important;

}
table.no_padding td
{
	padding: 0px!important;
}
td
{
	font-size:10px!important;
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

img {
    border: none;
}
h1 {
    font-size: 28px;
    margin: 0 0 10px;
}
h2 {
    font-size: 24px;
    margin: 0 0 10px;
}
h3 {
    font-size: 20px;
    margin: 0 0 10px;
}
h4 {
    font-size: 18px;
    margin: 0 0 10px;
}
h5 {
    font-size: 16px;
    font-weight: normal;
    margin: 0 0 10px;
}
h6 {
    font-size: 14px;
}
p {
    margin: 0 0 5px;
}
.row {
    float: left;
    width: 100%;
    margin: 0;
}
.container {
    margin: 0 auto;
    width: 100%;
}
hr {
    margin: 5px 0;
    color: #bcbcbc;
}
.col-lg-6 {
    float: left;
    width: 50%;
    padding: 0 1%;
    box-sizing: border-box;
}
table {
    border-collapse: collapse;
    width: 100%;
    border-spacing: 0px;
}
table tr {

} 
table tr td {
    border: 1px solid #ccc;
    padding: 0px 7px;
    vertical-align: top;
}
</style>
<?php
 if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
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
				<input name="owner" type="hidden"  value="<?php echo $info['owner']; ?>" />
		<div class="wraper header">
       <div class="container">
			<div class="row">
		<p><strong>Check appropriate box:</strong></p>
		<p><input type="radio" name="credit_request_joint" value="no" <?php echo (isset($info['credit_request_joint']) && $info['credit_request_joint'] == 'no')?'checked':''; ?> />&nbsp; I am applying for individual credit in my own name and relying only on my income and assets for repayment of the credit requested.</p>
		<p><input type="radio" name="credit_request_joint" value="yes" <?php echo (isset($info['credit_request_joint']) && $info['credit_request_joint'] == 'yes')?'checked':''; ?> />&nbsp; We are applying for joint credit and are relying on our joint income and assets as the basis for repayments of the credit requested.</p>
		<div class="row">
			<div class="col-lg-6">&nbsp;<hr></div>
			<div class="col-lg-6">&nbsp;<hr></div>
		</div>
		
		<table width="100%">
			<tbody>
				<tr>
					<td colspan="12">Information on Individual Applicant (Section A)</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="4">Full Name (First, Middle, Last)
					<br />
					<input name="individual_information" value="<?php echo isset($info['individual_information'])?$info['individual_information']:''; ?>"  type="text" style="width:250px;">
					</td>
					<td colspan="4">Soc. Sec. No. / TIN. <br />
					<input name="individual_information_soc_sec_no" value="<?php echo isset($info['individual_information_soc_sec_no'])?$info['individual_information_soc_sec_no']:''; ?>"  type="text" style="width:250px;">
					</td>
					<td colspan="3">Date of Birth</td>
					<td colspan="2">Home Telephone Number</td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td colspan="4">
						<input type="text"  name="dob_month" value="<?php echo isset($info['dob_month'])?$info['dob_month']:''; ?>"   style="width:50px;">
						<input type="text"  name="dob_day" value="<?php echo isset($info['dob_day'])?$info['dob_day']:''; ?>"  style="width:50px;">
						<input type="text"  name="dob_year" value="<?php echo isset($info['dob_year'])?$info['dob_year']:''; ?>"  style="width:70px; ">
					
					</td>
					<td colspan="3">
					<input  name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>"   type="text" style="width:100%;">
					</td>
				</tr>
				<tr>
					<td colspan="10">Present Address (Number and Street, City, County, State, ZIp Code)
					<br />
					<input name="individual_information_paddress" value="<?php echo isset($info['individual_information_paddress'])?$info['individual_information_paddress']:''; ?>"  type="text" style="width:100%;">
					</td>
					<td>Years 
					<input type="text"  name="individual_information_paddress_year" value="<?php echo isset($info['individual_information_paddress_year'])?$info['individual_information_paddress_year']:''; ?>"   style="width:100%">
					</td>
					<td>Months<br />
					<input type="text"  name="individual_information_paddress_months" value="<?php echo isset($info['individual_information_paddress_months'])?$info['individual_information_paddress_months']:''; ?>"   style="width:100%;">
					</td>
				</tr>
				<tr>
					<td colspan="8">
					<input type="checkbox" name="name_address1" value="Renting" <?php echo (isset($info['name_address1'])&&$info['name_address1']=='Renting')?'checked="checked"':''; ?>
> Renting
					<input type="checkbox" name="name_address2" value="Buying" <?php echo (isset($info['name_address2'])&&$info['name_address2']=='Buying')?'checked="checked"':''; ?>
> Buying
					<input type="checkbox" name="name_address3" value="Own" <?php echo (isset($info['name_address3'])&&$info['name_address3']=='Own')?'checked="checked"':''; ?>
> Own 
					<input type="checkbox" name="name_address4" value="Living_with_Relatives" <?php echo (isset($info['name_address4'])&&$info['name_address4']=='Living_with_Relatives')?'checked="checked"':''; ?>
> Living with Relatives 
					<input type="checkbox" name="name_address5" value="Other" <?php echo (isset($info['name_address5'])&&$info['name_address5']=='Other')?'checked="checked"':''; ?>
> Other
					<p>Name and Address of Landlord / Mortgage</p></td>
					<td colspan="2">Monthly Pmt.<br/>
					<input type="text"  name="landlord_balance_monthamt" value="<?php echo isset($info['landlord_balance_monthamt'])?$info['landlord_balance_monthamt']:$info['landlord_balance_monthamt']; ?>"   style="width:100%;">
					
					</td>
					<td>Balance<br/>
					<input type="text"  name="landlord_balance" value="<?php echo isset($info['landlord_balance'])?$info['landlord_balance']:$info['landlord_balance']; ?>"   style="width:100%;">
					
					</td>
					<td>Approx. Value <br />
					<input type="text"  name="landlord_balance_appx_val" value="<?php echo isset($info['landlord_balance_appx_val'])?$info['landlord_balance_appx_val']:$info['landlord_balance_appx_val']; ?>"   style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td colspan="10">Previous Home Address
					<br />
						<input name="previous_home_address" value="<?php echo isset($info['previous_home_address'])?$info['previous_home_address']:''; ?>"  type="text" style="width:100%; ">
					</td>
					<td>Years <br />
						<input name="previous_home_address_years" value="<?php echo isset($info['previous_home_address_years'])?$info['previous_home_address_years']:''; ?>"    type="text" style="width:100%;">
					
					</td>
					<td>Months<br />
						<input name="previous_home_address_months" value="<?php echo isset($info['previous_home_address_months'])?$info['previous_home_address_months']:''; ?>"   type="text" style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td colspan="9">Employed By<br>
					<input type="radio"  name="employed_by" value="Self" <?php echo ($info['employed_by'] == "Self")?"checked":""; ?>> Self
					<input type="radio"  name="employed_by" value="Other" <?php echo ($info['employed_by'] == "Other")?"checked":""; ?>> Other</td>
					<td>Name of Address
					<input type="text"  name="employed_by_nameaddress" value="<?php echo isset($info['employed_by_nameaddress'])?$info['employed_by_nameaddress']:$info['employed_by_nameaddress']; ?>" style="width:100%;">
					
					</td>
					<td>Years <br />
					<input type="text"  name="employed_by_year" value="<?php echo isset($info['employed_by_year'])?$info['employed_by_year']:$info['employed_by_year']; ?>"   style="width:100%;">
					
					</td>
					<td>Months
					<br /><input type="text"  name="employed_by_month" value="<?php echo isset($info['employed_by_month'])?$info['landlord_balance']:$info['employed_by_month']; ?>"   style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td colspan="2">Trade or Occupation<br>
					<input name="previous_trade_occupation" value="<?php echo isset($info['previous_trade_occupation'])?$info['previous_trade_occupation']:''; ?>"  type="text" style="width:100%;">
					
					</td>
					<td colspan="3">Salary or Wages
					<input name="previous_salary_wages" value="<?php echo isset($info['previous_salary_wages'])?$info['previous_salary_wages']:''; ?>"  type="text" style="width:100%;">
					
					</td>
					<td colspan="3">Previous Employer
					<input name="previous_previous_employer" value="<?php echo isset($info['previous_previous_employer'])?$info['previous_previous_employer']:''; ?>"  type="text" style="width:100%;">
					
					</td>
					<td colspan="2">Name of Address
					<input name="previous_previous_employer_nameaddress" value="<?php echo isset($info['previous_previous_employer_nameaddress'])?$info['previous_previous_employer_nameaddress']:''; ?>"  type="text" style="width:100%;">
					
					</td>
					<td colspan="1">Years
					<input type="text"  name="previous_trade_occupation_year" value="<?php echo isset($info['previous_trade_occupation_year'])?$info['previous_trade_occupation_year']:$info['previous_trade_occupation_year']; ?>"   style="width:100%;">
					
					</td>
					<td colspan="1">Months
					<br />
					<input type="text"  name="previous_trade_occupation_month" value="<?php echo isset($info['previous_trade_occupation_month'])?$info['previous_trade_occupation_month']:$info['previous_trade_occupation_month']; ?>"   style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td colspan="12"><p>Allmony, child support or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation.</p>
					</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="9">Other Income <br />
						<input name="previous_previous_employer_other_income"  value="<?php echo isset($info['previous_previous_employer_other_income'])?$info['previous_previous_employer_other_income']:''; ?>"  type="text" style="width:250px;">
					
					</td>
					<td>Years
					<input type="text"  name="previous_previous_employer_other_income_year" value="<?php echo isset($info['previous_previous_employer_other_income_year'])?$info['previous_previous_employer_other_income_year']:''; ?>"   style="width:100%;">
					
					</td>
					<td>Months 
					<input type="text"  name="previous_previous_employer_other_income_month" value="<?php echo isset($info['previous_previous_employer_other_income_month'])?$info['previous_previous_employer_other_income_month']:''; ?>"   style="width:100%;">
					
					</td>
					<td>Monthly Amount
					<br />
					<input type="text"  name="previous_previous_employer_other_income_mamount" value="<?php echo isset($info['previous_previous_employer_other_income_mamount'])?$info['previous_previous_employer_other_income_mamount']:''; ?>"  style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>	
				<tr>
					<td rowspan="2" colspan="10">Name and Address of Parents or Nearest Relative Not Living With You<br>
					<input name="persional_information" value="<?php echo isset($info['persional_information'])?$info['persional_information']:''; ?>"  type="text" style="width:100%;">
					</td>
					<td>Phone Number <br /></td>
					<td>Relationship <br />
					</td>
				</tr>
				<tr>
					<td><input name="phone_number1" value="<?php echo isset($info['phone_number1'])?$info['phone_number1']:''; ?>"  type="text" style="width:100%;"></td>
					<td>
					<input name="relationship" value="<?php echo isset($info['relationship'])?$info['relationship']:''; ?>"  type="text" style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="10">Name and Address of Personal Friend<br>
					<input name="persional_information2" value="<?php echo isset($info['persional_information2'])?$info['persional_information2']:''; ?>"  type="text" style="width:250px;"></td>
					
					</td>
					<td>Phone Number</td>
					<td>Known How Long?
					
					</td>
				</tr>
				<tr>
					<td><input name="phone_number2" value="<?php echo isset($info['phone_number2'])?$info['phone_number2']:''; ?>"   type="text" style="width:100%;"></td>
					<td><input name="know_how_long" value="<?php echo isset($info['know_how_long'])?$info['know_how_long']:''; ?>"  type="text" style="width:100%;"></td>
				</tr>
				<tr>
					<td colspan="9">Bank Account<br>
						<input type="radio" name="bank_account" value="Checking" <?php echo ($info['bank_account'] == "Loan")?"checked":""; ?>> Checking
						<input type="radio" name="bank_account" value="Saving" <?php echo ($info['bank_account'] == "Loan")?"checked":""; ?>> Saving
					</td>
					<td>Name and Address<br />
					<input type="text" name="bank_account_nameaddress" value="<?php echo isset($info['bank_account_nameaddress'])?$info['bank_account_nameaddress']:''; ?>" style="width:100%;">
					</td>
					<td colspan="2">
						<div style="width:75px; float:left;">Education<br>(check one)</div>
						<div style="width:255px; float:left;">
							<input type="checkbox" name="education1" value="4_yr_Coll" <?php echo (isset($info['education1'])&&$info['education1']=='4_yr_Coll')?'checked="checked"':''; ?>
> 4-yr Coll.
							<input type="checkbox" name="education2" value="Spec_Trng" <?php echo (isset($info['education2'])&&$info['education2']=='Spec_Trng')?'checked="checked"':''; ?>
> Spec. Trng.
							<input type="checkbox" name="education3" value="High_Sch" <?php echo (isset($info['education3'])&&$info['education3']=='High_Sch')?'checked="checked"':''; ?>
> High Sch.<br>
							<input type="checkbox" name="education4" value="2_yr_Coll" <?php echo (isset($info['education4'])&&$info['education4']=='2_yr_Coll')?'checked="checked"':''; ?>
> 2-yr Coll.
							<input type="checkbox" name="education5" value="Some_Coll" <?php echo (isset($info['education5'])&&$info['education5']=='Some_Coll')?'checked="checked"':''; ?>
> Some Coll.
							<input type="checkbox" name="education6" value="Other" <?php echo (isset($info['education6'])&&$info['education6']=='Other')?'checked="checked"':''; ?>
> <input style="width:70px;" type="text" name="education_other" value="<?php echo isset($info['education_other'])?$info['education_other']:''; ?>" >
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="12">
						Have you ever filed for bankruptcy?
						<input type="radio" name="bankruptcy" value="Yes" <?php echo (isset($info['bankruptcy'])&& $info['bankruptcy'] == "Yes")?"checked":""; ?>> Yes
						<input type="radio" name="bankruptcy" value="No" <?php echo (isset($info['bankruptcy'] ) && $info['bankruptcy'] == "No")?"checked":""; ?>> No
						When ? <input type="text" name="bankruptcy2" value="<?php echo isset($info['bankruptcy2'])?$info['bankruptcy2']:''; ?>"   style="width:150px; border:1px solid #ccc">
						Are you currently a part to any suits or judgements, pending or otherwise ?
						<input type="radio" name="bankruptcy1" value="Yes" <?php echo (isset($info['bankruptcy1']) && $info['bankruptcy1'] == "Yes")?"checked":""; ?>> Yes
						<input type="radio"  name="bankruptcy1" value="No" <?php echo (isset($info['bankruptcy1']) && $info['bankruptcy1'] == "No")?"checked":""; ?> > No
					</td>
				</tr>
				<tr>
					<td colspan="6" style="width:50%;">
						<input type="radio"  name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition'] == "New")?"checked":""; ?>> New
						<input type="radio"  name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition'] == "Used")?"checked":""; ?>> Used
						<input type="radio"  name="condition" value="Demo" <?php echo (isset($info['condition']) && $info['condition'] == "Demo")?"checked":""; ?>> Demo
						Year <input  name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>"  type="text" style="width:150px;">
						<br/>Make <input  name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>"  type="text" style="width:150px; ">
					</td>
					<td rowspan="5" colspan="6">
						<table>
							<tr>
							
								<td style="border:0;">Cash Price</td>
								<td style="border:0;">$ <input  name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Less: Net Trade</td>
								<td colspan="2" style="border:0;">$ <input  name="net_trade" value="<?php echo isset($info['net_trade'])?$info['net_trade']:''; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Cash</td>
								<td colspan="2" style="border:0;">$ <input  name="cash" value="<?php echo isset($info['cash'])?$info['cash']:''; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Rebates (describe)<br><input  name="rebates_des" value="<?php echo isset($info['rebates_des'])?$info['rebates_des']:''; ?>"  style="width:120px;" type="text"></td>
								<td colspan="2" style="border:0;">$ <input name="rebates" value="<?php echo isset($info['rebates'])?$info['rebates']:''; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Other (describe)<br><input name="other_des" value="<?php echo isset($info['other_des'])?$info['other_des']:''; ?>"  style="width:120px;" type="text"></td>
								<td colspan="2" style="border:none;">$ <input name="other_val" value="<?php echo isset($info['other_val'])?$info['other_val']:''; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="2" style="border:none;">Total Down Payment</td>
								<td style="border:0;">$ <input  name="total_down_payment" value="<?php echo isset($info['total_down_payment'])?$info['total_down_payment']:''; ?>" style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="2" style="border:none;">Unpaid Balance</td>
								<td style="border:0;">$ <input  name="unpaid_balance" value="<?php echo isset($info['unpaid_balance'])?$info['unpaid_balance']:''; ?>" style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="2" style="border:none;">Plus Other Charges (Life, Disabllity, MRA)</td>
								<td style="border:none;">$ <input  name="plus_other_charges" value="<?php echo isset($info['plus_other_charges'])?$info['plus_other_charges']:''; ?>" style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="2" style="border:none;"><input style="width:120px;" name="plus_other_charges1" value="<?php echo isset($info['plus_other_charges1'])?$info['plus_other_charges1']:''; ?>" type="text"></td>
								<td style="border:0;">$ <input  name="total_amount_financed" value="<?php echo isset($info['total_amount_financed'])?$info['total_amount_financed']:''; ?>" style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="2" style="border:0;">Total Amount Financed</td>
								<td style="border:0;">$ <input   name="total_amount_financed1" value="<?php echo isset($info['total_amount_financed1'])?$info['total_amount_financed1']:$info['total_amount_financed1']; ?>" style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Retail $ <input  name="retail" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" style="width:120px;" type="text"></td>
								<td colspan="2" style="border:0;">Cost $ <input style="width:100px;"  name="cost1" value="<?php echo isset($info['cost1'])?$info['cost1']:$info['cost1']; ?>" type="text"></td>
							</tr>
							<tr>
								<td style="border:0;">Term <input  name="term" value="<?php echo isset($info['term'])?$info['term']:$info['term']; ?>"  style="width:120px;" type="text"></td>
								<td colspan="2" style="border:0;">Special Programs <input   name="special_programs" value="<?php echo isset($info['special_programs'])?$info['special_programs']:$info['special_programs']; ?>"  style="width:100px;" type="text"></td>
							</tr>
							<tr>
								<td colspan="3" style="border:0;">
									Credit requested (Check one) 
									<input type="radio" name="credit_requested" value="Loan" <?php echo ($info['credit_requested'] == "Loan")?"checked":""; ?>> Loan
									<input type="radio"  name="credit_requested"  value="Lease" <?php echo ($info['credit_requested'] == "Lease")?"checked":""; ?>> Lease
									<input type="radio"   name="credit_requested" value="Balloon" <?php echo ($info['credit_requested'] == "Balloon")?"checked":""; ?>> Balloon
									<input type="radio" name="credit_requested"   value="Other" <?php echo ($info['credit_requested'] == "Other")?"checked":""; ?>> Other
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						Model <input name="stuff_model" value="<?php echo isset($info['stuff_model'])?$info['stuff_model']:''; ?>" type="text" style="width:120px;">
						Cylinders <input name="stuff_cylinders" value="<?php echo isset($info['stuff_cylinders'])?$info['stuff_cylinders']:''; ?>" type="text" style="width:120px;">
						Mileage <input  name="stuff_mileage" value="<?php echo isset($info['stuff_mileage'])?$info['stuff_mileage']:''; ?>" type="text" style="width:120px;">
					</td>
					
				</tr>
				<tr>
					<td colspan="6">
                    <label style="width:60%;float:left;">Vehicle Identification Number
                    <input type="text" name="vin" value="<?php echo $info['vin']; ?>" style="width:90%" />
                    </label>
					 <label style="width:40%;float:left;">
					Salesperson
                    <input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width:90%" />
                    </label></td>
					
				</tr>
				<tr>
					<td colspan="6">
						<table>
							<tbody>
								<tr>
									<td style="border:0;"><input type="checkbox"  name="service_type1" value="1_Air_Conditioning" <?php echo (isset($info['service_type1'])&&$info['service_type1']=='1_Air_Conditioning')?'checked="checked"':''; ?>> 1 - Air Conditioning</td>
									<td style="border:0;"><input type="checkbox"  name="service_type2" value="2_Sunroof" <?php echo (isset($info['service_type2'])&&$info['service_type2']=='2_Sunroof')?'checked="checked"':''; ?>> 2 - Sunroof</td>
									<td style="border:0;"><input type="checkbox"  name="service_type3" value="3_Stereo" <?php echo (isset($info['service_type3'])&&$info['service_type3']=='3_Stereo')?'checked="checked"':''; ?>> 3 - Stereo</td>
								</tr>
								<tr>
									<td style="border:0;"><input type="checkbox"  name="service_type4" value="4_Cruise" <?php echo (isset($info['service_type4'])&&$info['service_type4']=='4_Cruise')?'checked="checked"':''; ?>> 4 - Cruise</td>
									<td style="border:0;"><input type="checkbox"  name="service_type5" value="5_Power_Windows" <?php echo (isset($info['service_type5'])&&$info['service_type5']=='5_Power_Windows')?'checked="checked"':''; ?>> 5 - Power Windows</td>
									<td style="border:0;"><input type="checkbox"  name="service_type6" value="6_Power_Seats" <?php echo (isset($info['service_type6'])&&$info['service_type6']=='6_Power_Seats')?'checked="checked"':''; ?>> 6 - Power Seats</td>
								</tr>
								<tr>
									<td style="border:0;"><input type="checkbox"  name="service_type7" value="7_Four_Wheel_Drive" <?php echo (isset($info['service_type7'])&&$info['service_type7']=='7_Four_Wheel_Drive')?'checked="checked"':''; ?>> 7 - Four Wheel Drive</td>
									<td style="border:0;"><input type="checkbox"  name="service_type8" value="8_Manual_Trans" <?php echo (isset($info['service_type8'])&&$info['service_type8']=='8_Manual_Trans')?'checked="checked"':''; ?>> 8 - Manual Trans</td>
									<td style="border:0;"><input type="checkbox"  name="service_type9" value="9_Alum_Wire_Wheels" <?php echo (isset($info['service_type9'])&&$info['service_type9']=='9_Alum_Wire_Wheels')?'checked="checked"':''; ?>> 9 - Alum/Wire Wheels</td>
								</tr>
								<tr>
									<td style="border:0;">Other: </td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<table>
							<tbody>
								<tr>
									<td><br>Trade
									<input name="trade1" value="<?php echo isset($info['trade1'])?$info['trade1']:''; ?>" type="text" style="width:100%;">
									</td>
									<td><br>Year
									<input name="year1" value="<?php echo isset($info['year1'])?$info['year1']:''; ?>" type="text" style="width:100%;">
									</td>
									<td><br>Make
									<input name="make1" value="<?php echo isset($info['make1'])?$info['make1']:''; ?>" type="text" style="width:100%;">
									</td>
									<td><br>Model
									<input name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" type="text" style="width:100%;">
									</td>
									<td><br>Description
									<input name="description1" value="<?php echo isset($info['description1'])?$info['description1']:''; ?>" type="text" style="width:100%;">
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="12">Information on Joint Applicant (Section B)</td>
				</tr>
				<tr>
					<td rowspan="2" colspan="4">Full Name (First, Middle, Last) <br />
						<input name="personal_information3" value="<?php echo isset($info['personal_information3'])?$info['personal_information3']:''; ?>"  type="text" style="width:250px;">
					</td>
					<td colspan="2">Soc. Sec. No. / TIN.
						
					</td>
					<td colspan="4">Date of Birth</td>
					<td colspan="2">Home Telephone Number</td>
				</tr>
				<tr>
					<td colspan="2"><input name="soc_sec_no_tin" value="<?php echo isset($info['soc_sec_no_tin'])?$info['soc_sec_no_tin']:''; ?>"  type="text" style="width:100%;"></td>
					<td colspan="4">
						<input type="text"  name="information_month" value="<?php echo isset($info['information_month'])?$info['information_month']:''; ?>"   style="width:50px;">
						<input type="text" name="information_day" value="<?php echo isset($info['information_day'])?$info['information_day']:$info['information_day']; ?>"   style="width:50px;">
						<input type="text"  name="information_year" value="<?php echo isset($info['information_year'])?$info['information_year']:$info['information_year']; ?>"   style="width:70px;">
					</td>
					<td colspan="2">
			
					<input  name="home_telephone_number3" value="<?php echo isset($info['home_telephone_number3'])?$info['home_telephone_number3']:$info['home_telephone_number3']; ?>" type="text" style="width:100%;"></td>
				</tr>
				<tr>
					<td colspan="10">Present Address (Number and Street, City, County, State, ZIp Code)
						<input name="present_address3" value="<?php echo isset($info['present_address3'])?$info['present_address3']:''; ?>"  type="text" style="width:280px;">
					</td>
					<td>Years
							<input name="present_address3_years" value="<?php echo isset($info['present_address3_years'])?$info['present_address3_years']:''; ?>"     type="text" style="width:50px; ">
					</td>
					<td>Months
							<input name="present_address3_months" value="<?php echo isset($info['present_address3_months'])?$info['present_address3_months']:''; ?>"     type="text" style="width:50px;">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<p>Landlord / Mortgage</p>
						<input type="checkbox"  name="landlord_mortgage1" value="Renting" <?php echo (isset($info['landlord_mortgage1'])&&$info['landlord_mortgage1']=='Renting')?'checked="checked"':''; ?>> Renting
						<input type="checkbox"  name="landlord_mortgage2" value="Buying" <?php echo (isset($info['landlord_mortgage1'])&&$info['landlord_mortgage1']=='Buying')?'checked="checked"':''; ?>> Buying 
						<input type="checkbox"  name="landlord_mortgage3" value="Own" <?php echo (isset($info['landlord_mortgage1'])&&$info['landlord_mortgage1']=='Own')?'checked="checked"':''; ?>> Own 
					</td>
					<td colspan="4">
						<p>Name and Address</p>
						<input type="text"  name="landlord_balance1_information" value="<?php echo isset($info['landlord_balance1_information'])?$info['landlord_balance1_information']:''; ?>"  style="width:100%;">
					
					</td>
					<td colspan="2">Monthly Pmt.
					<input type="text"  name="landlord_balance1_information_mp" value="<?php echo isset($info['landlord_balance1_information_mp'])?$info['landlord_balance1_information_mp']:''; ?>"   style="width:100%;">
					
					</td>
					<td>Balance
					
					<input type="text"  name="landlord_balance1_information_b" value="<?php echo isset($info['landlord_balance1_information_b'])?$info['landlord_balance1_information_b']:''; ?>"   style="width:100%;">
					
					</td>
					<td>Approx. Value
					<input type="text"  name="landlord_balance1_information_av" value="<?php echo isset($info['landlord_balance1_information_av'])?$info['landlord_balance1_information_av']:''; ?>"  style="width:100%;">
					
					</td>
				</tr>
				<tr>
					<td colspan="10">
						Previous Address 
						<input name="previous_address" value="<?php echo isset($info['previous_address'])?$info['previous_address']:''; ?>"  type="text" style="width:80%;">
					</td>
					<td>Years
							<input name="previous_address_years" value="<?php echo isset($info['previous_address_years'])?$info['previous_address_years']:''; ?>"  type="text" style="width:60px; ">
					</td>
					<td>Months
					<input name="previous_address_months" value="<?php echo isset($info['previous_address_months'])?$info['previous_address_months']:''; ?>"  type="text" style="width:70px;">
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<p>Employed By</p>
						<input type="radio"   name="Employed_id" value="Renting" <?php echo (isset($info['Employed_id'])&&$info['Employed_id']=='Self')?'checked="checked"':''; ?>> Self 
						<input type="radio"   name="Employed_id" value="Other" <?php echo (isset($info['Employed_id'])&&$info['Employed_id']=='Other')?'checked="checked"':''; ?>> Other
					</td>
					<td colspan="4">
						<p>Name and Address <br />
							<input name="employed_information_1" value="<?php echo isset($info['employed_information_1'])?$info['employed_information_1']:''; ?>"  type="text" style="width:100%;">
						</p>
					</td>
					<td colspan="2">Years
							<input name="employed_information_1_years" value="<?php echo isset($info['employed_information_1_years'])?$info['employed_information_1_years']:''; ?>"  type="text" style="width:100%;">
					</td>
					<td>Months
							<input name="employed_information_1_months" value="<?php echo isset($info['employed_information_1_months'])?$info['employed_information_1_months']:''; ?>"  type="text" style="width:100%;">
					</td>
					<td colspan="2">
						Business Telephone Number
						<input type="text"  name="bus_telephone_number1" value="<?php echo isset($info['bus_telephone_number1'])?$info['bus_telephone_number1']:''; ?>"  style="width:100%;">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Trade or Occupation
							<input type="text"  name="trade_occupation" value="<?php echo isset($info['trade_occupation'])?$info['trade_occupation']:$info['trade_occupation']; ?>"  style="width:100%;">
					</td>
					<td colspan="2">
						<p>Salary or Wages</p>
						$<input type="text"  name="salary_wages" value="<?php echo isset($info['salary_wages'])?$info['salary_wages']:$info['salary_wages']; ?>"  style="width:80px; border:1px solid #ccc">
					Gross Monthly
					</td>
					<td colspan="2">Previous Employer <br />
						<input name="previous_employer" value="<?php echo isset($info['previous_employer'])?$info['previous_employer']:''; ?>"  type="text" style="width:100%;">
					</td>
					<td colspan="3">Name and Address
						<input name="previous_employer_information" value="<?php echo isset($info['previous_employer_information'])?$info['previous_employer_information']:''; ?>"  type="text" style="width:100%;">
						</td>
					<td colspan="1">
						<p>Years</p>
							<input name="previous_employer_information_years" value="<?php echo isset($info['previous_employer_information_years'])?$info['previous_employer_information_years']:''; ?>"  type="text" style="width:100%;">
						</td>
					<td colspan="1">
						<p>Months</p>
								<input name="previous_employer_information_months" value="<?php echo isset($info['previous_employer_information_months'])?$info['previous_employer_information_months']:''; ?>"  type="text" style="width:100%;">
					</td>
				</tr>
				<tr>
					<td colspan="12">Allmony, child support, or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation.
						<input name="support_maintance_information" value="<?php echo isset($info['support_maintance_information'])?$info['support_maintance_information']:''; ?>"  type="text" style="width:250px; ">
					</td>
				</tr>
				<tr>
					<td colspan="9">Other Income<br>
							<input name="other_income" value="<?php echo isset($info['other_income'])?$info['other_income']:''; ?>"  type="text" style="width:250px; ">
				</td>
					<td colspan="1">Years
									<input name="other_income_years" value="<?php echo isset($info['other_income_years'])?$info['other_income_years']:''; ?>"  type="text" style="width:100%;">
				</td>
					<td colspan="1">Months
											<input name="other_income_months" value="<?php echo isset($info['other_income_months'])?$info['other_income_months']:''; ?>"  type="text" style="width:100%;">
			
					</td>
					<td colspan="1">Monthly Amount
											<input name="other_income_amount" value="<?php echo isset($info['other_income_amount'])?$info['other_income_amount']:''; ?>"  type="text" style="width:100%;">
			
					</td>
				</tr>
				<tr>
					<td colspan="10">Name and Address of Parents or Nearest Relative Not Living With You<br>
											<input name="other_income_amount_information" value="<?php echo isset($info['other_income_amount_information'])?$info['other_income_amount_information']:''; ?>"  type="text" style="width:100%;">
			
					</td>
					<td colspan="1">Phone Number<br>
						<input  name="phone_number_next1" value="<?php echo isset($info['phone_number_next1'])?$info['phone_number_next1']:''; ?>"    type="text" style="width:100%;">
					</td>
					<td colspan="1">Relationship
										<br />	<input name="other_income_amount_information_relationship" value="<?php echo isset($info['other_income_amount_information_relationship'])?$info['other_income_amount_information_relationship']:''; ?>"  type="text" style="width:100%;">
					</td>
				</tr>
				<tr>
					<td colspan="10">Name and Address of Personal Friend<br>
											<input name="other_income_amount_information1" value="<?php echo isset($info['other_income_amount_information1'])?$info['other_income_amount_information1']:''; ?>"  type="text" style="width:100%;">
			
					</td>
					<td colspan="1">Phone Number<br>
						<input  name="phone_number_next2" value="<?php echo isset($info['phone_number_next2'])?$info['phone_number_next2']:''; ?>"    type="text" style="width:100%;"> 
					</td>
					<td colspan="1">Known How Long?
											<input name="other_income_amount_information1_how_long" value="<?php echo isset($info['other_income_amount_information1_how_long'])?$info['other_income_amount_information1_how_long']:''; ?>"  type="text" style="width:100%;">
			
					</td>
				</tr>
				
				<tr>
					<td colspan="9">Bank Account<br>
						<input type="radio" name="bank_account1" value="Checking" <?php echo ($info['bank_account1'] == "Loan")?"checked":""; ?>> Checking
						<input type="radio" name="bank_account1" value="Saving" <?php echo ($info['bank_account1'] == "Loan")?"checked":""; ?>> Saving
					</td>
					<td>Name and Address<br />
					<input type="text" name="bank_account_nameaddress1" value="<?php echo isset($info['bank_account_nameaddress1'])?$info['bank_account_nameaddress1']:''; ?>" style="width:100%;">
					</td>
					<td colspan="2">
						<div style="width:75px; float:left;">Education<br>(check one)</div>
						<div style="width:250px; float:left;">
							<input type="checkbox" name="education11" value="4_yr_Coll" <?php echo (isset($info['education11'])&&$info['education11']=='4_yr_Coll')?'checked="checked"':''; ?>
> 4-yr Coll.
							<input type="checkbox" name="education21" value="Spec_Trng" <?php echo (isset($info['education21'])&&$info['education21']=='Spec_Trng')?'checked="checked"':''; ?>
> Spec. Trng.
							<input type="checkbox" name="education31" value="High_Sch" <?php echo (isset($info['education31'])&&$info['education31']=='High_Sch')?'checked="checked"':''; ?>
> High Sch.<br>
							<input type="checkbox" name="education41" value="2_yr_Coll" <?php echo (isset($info['education41'])&&$info['education41']=='2_yr_Coll')?'checked="checked"':''; ?>
> 2-yr Coll.
							<input type="checkbox" name="education51" value="Some_Coll" <?php echo (isset($info['education51'])&&$info['education51']=='Some_Coll')?'checked="checked"':''; ?>
> Some Coll.
							<input type="checkbox" name="education61" value="Other" <?php echo (isset($info['education61'])&&$info['education61']=='Other')?'checked="checked"':''; ?>
> <input style="width:40px;" type="text" name="education_other1" value="<?php echo isset($info['education_other1'])?$info['education_other1']:''; ?>" >
						</div>
					</td>
				</tr>
					<tr>
					<td colspan="9">Last Car Financed(Year/Model)<br>
					</td>
					<td>Name of Creditor<br />
					<input type="text" name="lastcar_creditorname" value="<?php echo isset($info['lastcar_creditorname'])?$info['lastcar_creditorname']:''; ?>" style="width:100px;">
					</td>
					<td colspan="1">
						Balance Due Date
							<input type="text" name="lastcar_due_date" value="<?php echo isset($info['lastcar_due_date'])?$info['lastcar_due_date']:''; ?>" style="width:100px;">
					
					</td>
					<td colspan="1">
						Trading this car ?
						<input type="radio" name="trading_car_yes" value="Yes" <?php echo ($info['trading_car_yes'] == "Yes")?"checked":""; ?>> Yes
						<input type="radio" name="trading_car_yes" value="No" <?php echo ($info['trading_car_yes'] == "No")?"checked":""; ?>> No
					
					</td>
				</tr>
				<tr>
					<td colspan="12">Fair Credit Reporting Act Disclosure - This application for credit sale will be submitted to potential finance/lease sources for purchase or consideration as to whether it meets purchase requirements.</td>
				</tr>
				<tr>
					<td colspan="12">
					I Certify that the above information is complete and accurate. I authorize potential finance/lease sources and dealer to obtain credit bureau reports and complete an investigation of my credit and employment history and the release of information about my credit experience with finance/lease sources.
					Check which applies:
					<input type="radio"  name="check_apply" value="Individuals" <?php echo ($info['check_apply'] == "Individuals")?"checked":""; ?>> Individuals 
					<input type="radio"  name="check_apply" value="Partnership" <?php echo ($info['check_apply'] == "Partnership")?"checked":""; ?>> Partnership 
					<input type="radio"  name="check_apply" value="Corporation" <?php echo ($info['check_apply'] == "Corporation")?"checked":""; ?>> Corporation
					</td>
				</tr>
				<tr>
					<td colspan="3" style="border:0;">&nbsp;<hr>Applicant Signature</td>
					<td colspan="3" style="border:0;">&nbsp;<hr>Applicant Signature</td>
					<td colspan="4" style="border:0;">&nbsp;<hr>Applicant Signature</td>
					<td colspan="4" style="border:0;">&nbsp;<hr>Applicant Signature</td>
				</tr>
			</tbody>
		</table>
	</div>
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
