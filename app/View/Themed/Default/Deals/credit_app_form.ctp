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
//echo "<pre>";
//print_r($info);
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	body {
    margin: 0;
    padding: 0;
    font-family: arial;
    font-size: 13px;
	}
	* {
		margin: 0;
		padding: 0;
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
		/*border:1px solid #000;*/
	}
	.container {
		margin: 0 -64px;
		width: 100%;
	}
	hr {
		/*margin: 5px 0;
		color: #bcbcbc;*/
		margin: 15px 0;
		color: #bcbcbc;
		width: 85%;
		float: right;
	}
	.top-head{
		margin:25px 0 0;
	}
	.col-lg-5 {
		float: left;
		width: 40%;
		padding: 0 1%;
		box-sizing: border-box;
	}
	.col-lg-6 {
		float: left;
		width: 50%;
		padding: 0 1%;
		box-sizing: border-box;
	}
	.col-lg-7 {
		float: left;
		width: 60%;
		padding: 0 1%;
		box-sizing: border-box;
	}
	table {
		border-collapse: collapse;
		width: 100%;
		border-spacing: 0px;
		/*border:1px solid #000;*/
	}

	table tr {
		/*border:1px solid #000;*/
	}

	table tr td {
		border: 1px solid #000;
		padding: 3px 7px;
		vertical-align: top;
		/*width:33%;*/
	}
	/*
	table.noborder tr {
		border-top:1px solid #9c9c9c;
		margin:0 0 20px;
	}
	table.noborder tr td {
		border: 0px solid #ccc;
		padding-bottom:25px;
	}*/
	.rotate{
		transform:rotate(-90deg);
		-moz-transform:rotate(-90deg);
		-o-transform:rotate(-90deg);
		text-align:center;
		vertical-align:middle;
		-webkit-transform:rotate(-90deg);
	}
	span.info{
		font-size: 11px;
	}

	.title{
		margin-top: 10px;
		text-align: center;
		text-decoration: underline;
		font-size: 18px;
		font-weight: 700;
	}
	.custom-tr td{
		width: 20px;
	}
	.empty-td{
		height: 18px;
	}
	.center-text{
		text-align:center;
		margin-top:10px;
	}
	.margin-top{
		margin-top:10px;
	}
	.form-title-bar{
		color:#FFF;
		background-color:#000;
		text-align:center;
	}
	.align-center{
		text-align:center;
	}
	.border{
		border: 1px solid #000;
	}
	h3.form-title-bar
	{
		color:#FFF;
		background-color:#000;
		text-align:left;
		padding-left:8px;
		margin:0;
	}
	.sub-title-bar{
		font-weight: 500;
		font-size: 20px;
		text-align:left;
		margin-left:8px;
		background-color:#000;
		color: #FFF;
	}
	.margin-bottom{
		margin: 20px;
	}
	.td-height{
		height:30px;
	}
	.td-height.td-color {
		background-color: gray;
	}
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;} 
		.container{
			width:980px;
		}
	}

	</style>

	<div class="wraper header"> 
		
		<div class="container">
			<center>
				<!--<img class="logo" src="<?php //echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo_crform.jpg'); ?>" alt="">
				-->
			</center>
			<!--div class="border">
				<h1 class="form-title-bar">
					Credit Application
				</h1>
				<span class="info">
					IMPORTANT APPLICATION INFORMATION: Federal law requires financial institutions to obtain sufficient information to verify your identity. You may be asked several questions and to provide one or more forms of identification to fulfill the requirement. In some instances we may use outside sources to confirm information. The information you provide is protected by our privacy policy and federal law.
				</span>
			</div-->
			<div class="row">
				<table>
					<tbody>
						<tr class="border">
							<td class="sub-title-bar" colspan="5" style="font-size:28px;font-weight:800px;text-align:center;">
									Credit Application
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<span class="info">
									IMPORTANT APPLICATION INFORMATION: Federal law requires financial institutions to obtain sufficient information to verify your identity. You may be asked several questions and to provide one or more <br />
									forms of identification to fulfill the requirement. In some instances we may use outside sources to confirm information. The information you provide is protected by our privacy policy and federal law.
								</span>
							</td>
						</tr>
						<tr class="align-center">
							<td colspan="5">
								TYPE OF CREDIT REQUESTED
							</td>
						</tr>
						<tr>
							<td>
								___  Unsecured
							</td>
							<td colspan="4">
								___  INDIVIDUAL CREDIT - relying solely on my income or assets
							</td>
						</tr>
						<tr>
							<td>
								___  Secured
							</td>
							<td colspan="4">
								___  JOINT CREDIT -  We intend to apply for joint credit (Please initial if Joint Application) Applicant  _____ Joint Applicant  _____
							</td>
						</tr>
						<tr>
							<td>
								AMOUNT REQUESTED <br> <input type="text" name="amt_request" value="<?php echo isset($info["amt_request"]) ? $info['amt_request'] : ''?>" />
							</td>
							<td>
								TERM (Months) <br> <input type="text" name="term" value="<?php echo isset($info["term"]) ? $info['term'] : ''?>" />
							</td>
							<td>
								PAYMENT DATE REQUESTED <br> <input type="text" name="payment_date_request" value="<?php echo isset($info["payment_date_request"]) ? $info['payment_date_request'] : ''?>" />
							</td>
							<td>
								PROCEEDS OF Loan to be used for: <br> <input type="text" name="proceed_loan" value="<?php echo isset($info["proceed_loan"]) ? $info['proceed_loan'] : ''?>" />
							</td>
							<td>
								Description of covered <br />Collateral (Year, Make, Model) <br> <input type="text" name="description_collateral" value="<?php echo isset($info["description_collateral"]) ? $info['description_collateral'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								APPLICANT - PLEASE TELL US ABOUT YOURSELF
							</td>
						</tr>
						<tr>
							<td>
								First Name <br> <input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info['fname'] : $info['first_name'];?>" />
							</td>
							<td>
								Middle Initial <br> <input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info['mname'] : $info['m_name'];?>" />
							</td>
							<td>
								Last Name <br> <input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info['lname'] : $info['last_name']?>" />
							</td>
							<td>
								Social Security Number <br> <input type="text" name="snumber" value="<?php echo isset($info["snumber"]) ? $info['snumber'] : ''?>" />
							</td>
							<td>
								Date of Birth <br> <input type="text" name="dob" value="<?php echo isset($info["dob"]) ? $info['dob'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Present Street Address <input type="text" name="pstreet_address" value="<?php echo isset($info["pstreet_address"]) ? $info['pstreet_address'] :  $info['address']?>" />
							</td>
							<td colspan="2">
								City/State <br> <input type="text" name="city_state1" value="<?php echo isset($info["city_state1"]) ? $info['city_state1'] : $info['city']?>" />
							</td>
							<td>
								Zip Code <br> <input type="text" name="zip_code1" value="<?php echo isset($info["zip_code1"]) ? $info['zip_code1'] : $info['zip']?>" />
							</td>
							<td>
								How Long <br> <input type="text" name="distance1" value="<?php echo isset($info["distance1"]) ? $info['distance1'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Previous Street Address (if present address less than 3 years) <input type="text" name="pstreet_address_alt" value="<?php echo isset($info["pstreet_address_alt"]) ? $info['pstreet_address_alt'] : ''?>" />
							</td>
							<td colspan="2">
								City/State <br> <input type="text" name="city_state2" value="<?php echo isset($info["city_state2"]) ? $info['city_state2'] : ''?>" />
							</td>
							<td>
								Zip Code <br> <input type="text" name="zip_code2" value="<?php echo isset($info["zip_code2"]) ? $info['zip_code2'] : ''?>" />
							</td>
							<td>
								How Long <br> <input type="text" name="distance2" value="<?php echo isset($info["distance2"]) ? $info['distance2'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Home Phone: <input type="text" name="home_contact" value="<?php echo isset($info["home_contact"]) ? $info['home_contact'] : ''?>" />
							</td>
							<td colspan="2">
								Mobile Phone: <input type="text" name="mobile_contact" value="<?php echo isset($info["mobile_contact"]) ? $info['mobile_contact'] : ''?>" />
							</td>
							<td colspan="2" >
								Email Address: <input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="5">
								Nearest Relative NOT Living with you:
							</td>
						</tr>
						<tr>
							<td>
								First Name: <input type="text" name="fname2" value="<?php echo isset($info["fname2"]) ? $info['fname2'] : ''?>" />
							</td>
							<td colspan="2">
								Last Name: <input type="text" name="lname2" value="<?php echo isset($info["lname2"]) ? $info['lname2'] : ''?>" />
							</td>
							<td>
								Relationship: <input type="text" name="relationship" value="<?php echo isset($info["relationship"]) ? $info['relationship'] : ''?>" />
							</td>
							<td>
								Home or Mobile Phone: <input type="text" name="mphone" value="<?php echo isset($info["mphone"]) ? $info['mphone'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Street Address: <input type="text" name="street_address" value="<?php echo isset($info["street_address"]) ? $info['street_address'] : ''?>" />
							</td>
							<td>
								City: <input type="text" name="city2" value="<?php echo isset($info["city2"]) ? $info['city2'] : ''?>" />
							</td>
							<td>
								State: <input type="text" name="state2" value="<?php echo isset($info["state2"]) ? $info['state2'] : ''?>" />
							</td>
							<td>
								Zip Code: <input type="text" name="zipcode2" value="<?php echo isset($info["zipcode2"]) ? $info['zipcode2'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								PLEASE TELL US ABOUT YOUR JOB
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Present Employer: <input type="text" name="present_employer" value="<?php echo isset($info["present_employer"]) ? $info['present_employer'] : ''?>" />
							</td>
							<td colspan="2">
								Position: <input type="text" name="position" value="<?php echo isset($info["position"]) ? $info['position'] : ''?>" />
							</td>
							<td>
								How Long? <input type="text" name="since_when" value="<?php echo isset($info["since_when"]) ? $info['since_when'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Employer's Phone <input type="text" name="emp_phone" value="<?php echo isset($info["emp_phone"]) ? $info['emp_phone'] : ''?>" />
							</td>
							<td colspan="2">
								Employer's Street Address <input type="text" name="emp_address" value="<?php echo isset($info["emp_address"]) ? $info['emp_address'] : ''?>" />
							</td>
							<td>
								City/State <input type="text" name="emp_city" value="<?php echo isset($info["emp_city"]) ? $info['emp_city'] : ''?>" />
							</td>
							<td>
								ZIP Code <input type="text" name="emp_zip" value="<?php echo isset($info["emp_zip"]) ? $info['emp_zip'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<center>
									<small>
										IF SELF EMPLOYED, PROVIDE LAST 2 YEARS TAX RETURN AND LIST NAME OF BUSINESS, IF RETIRED, PLEASE LIST PREVIOUS EMPLOYER
									</small>
								</center>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								Previous Employer (if current employer less than 3 years) <input type="text" name="emp_pre_work" value="<?php echo isset($info["emp_pre_work"]) ? $info['emp_pre_work'] : ''?>" />
							</td>
							<td>
								Position <input type="text" name="e_position" value="<?php echo isset($info["e_position"]) ? $info['e_position'] : ''?>" />
							</td>
							<td>
								How Long? <input type="text" name="emp_how_long" value="<?php echo isset($info["emp_how_long"]) ? $info['emp_how_long'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								PLEASE PROVIDE SOME FINANCIAL INFORMATION
							</td>
						</tr>
						<tr style="background-color: #000;color:#FFF;">
							<td colspan="5">
								<small>
									Alimony, Child Support or Separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repayment of credit requested
								</small>
							</td>
						</tr>
						<tr>
							<td>
								Monthly Gross Salary <input type="text" name="monthly_gross_salary" value="<?php echo isset($info["monthly_gross_salary"]) ? $info['monthly_gross_salary'] : ''?>" />
							</td>
							<td>
								Additional Income (1) <input type="text" name="additional_income1" value="<?php echo isset($info["additional_income1"]) ? $info['additional_income1'] : ''?>" />
							</td>
							<td>
								Additional Income (2) <input type="text" name="additional_income2" value="<?php echo isset($info["additional_income2"]) ? $info['additional_income2'] : ''?>" />
							</td>
							<td>
								Source of Additional Income (1) <input type="text" name="source_additional_income1" value="<?php echo isset($info["source_additional_income1"]) ? $info['source_additional_income1'] : ''?>" />
							</td>
							<td>
								Source of Additional Income (2) <input type="text" name="source_additional_income2" value="<?php echo isset($info["source_additional_income2"]) ? $info['source_additional_income2'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Monthly Rent or Mortgage: <input type="text" name="monthly_rent" value="<?php echo isset($info["monthly_rent"]) ? $info['monthly_rent'] : ''?>" />
							</td>
							<td colspan="2">
								_____ Rent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _____ Lives with parents <br> _____ Own &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _____ Other
							</td>
							<td>
								Payable to: <input type="text" name="payable_to" value="<?php echo isset($info["payable_to"]) ? $info['payable_to'] : ''?>" />
							</td>
							<td>
								Monthly Auto Payment <br />(Year, Make, Model): <input type="text" name="monthly_auto_payment" value="<?php echo isset($info["monthly_auto_payment"]) ? $info['monthly_auto_payment'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Bank Name(Checking): <input type="text" name="bank_name_checking" value="<?php echo isset($info["bank_name_checking"]) ? $info['bank_name_checking'] : ''?>" />
							</td>
							<td>
								Account Number: <input type="text" name="account_number" value="<?php echo isset($info["account_number"]) ? $info['account_number'] : ''?>" />
							</td>
							<td colspan="2">
								Bank Name (Saving): <input type="text" name="bank_name_saving" value="<?php echo isset($info["bank_name_saving"]) ? $info['bank_name_saving'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								JOINT APPLICANT - PLEASE TELL US ABOUT YOURSELF
							</td>
						</tr>
						<tr>
							<td>
								First Name <br> <input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info['fname'] : $info['first_name']?>" />
							</td>
							<td>
								Middle Initial <br> <input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info['mname'] : $info['mname']?>" />
							</td>
							<td>
								Last Name <br> <input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info['lname'] : $info['last_name']?>" />
							</td>
							<td>
								Social Security Number <br> <input type="text" name="snumber" value="<?php echo isset($info["snumber"]) ? $info['snumber'] : ''?>" />
							</td>
							<td>
								Date of Birth <br> <input type="text" name="dob" value="<?php echo isset($info["dob"]) ? $info['dob'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Present Street Address <input type="text" name="pstreet_address" value="<?php echo isset($info["pstreet_address"]) ? $info['pstreet_address'] : $info['address']?>" />
							</td>
							<td colspan="2">
								City/State <br> <input type="text" name="city_state1" value="<?php echo isset($info["city_state1"]) ? $info['city_state1'] : $info['city']?>" />
							</td>
							<td>
								Zip Code <br> <input type="text" name="zip_code1" value="<?php echo isset($info["zip_code1"]) ? $info['zip_code1'] : $info['zip']?>" />
							</td>
							<td>
								How Long <br> <input type="text" name="distance1" value="<?php echo isset($info["distance1"]) ? $info['distance1'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Previous Street Address (if present address less than 3 years) <input type="text" name="pstreet_address_alt" value="<?php echo isset($info["pstreet_address_alt"]) ? $info['pstreet_address_alt'] : $info['address']?>" />
							</td>
							<td colspan="2">
								City/State <br> <input type="text" name="city_state2" value="<?php echo isset($info["city_state2"]) ? $info['city_state2'] : $info['city']?>" />
							</td>
							<td>
								Zip Code <br> <input type="text" name="zip_code2" value="<?php echo isset($info["zip_code2"]) ? $info['zip_code2'] : $info['zip']?>" />
							</td>
							<td>
								How Long <br> <input type="text" name="distance2" value="<?php echo isset($info["distance2"]) ? $info['distance2'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Home Phone: <input type="text" name="home_contact" value="<?php echo isset($info["home_contact"]) ? $info['home_contact'] : $info['phone']?>" />
							</td>
							<td>
								Mobile Phone: <input type="text" name="mobile_contact" value="<?php echo isset($info["mobile_contact"]) ? $info['mobile_contact'] : $info['mobile']?>" />
							</td>
							<td colspan="3">
								Email Address: <input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : $info['email']?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								PLEASE TELL US ABOUT YOUR JOB
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Present Employer: <input type="text" name="present_employer" value="<?php echo isset($info["present_employer"]) ? $info['present_employer'] : ''?>" />
							</td>
							<td colspan="2">
								Position: <input type="text" name="position" value="<?php echo isset($info["position"]) ? $info['position'] : ''?>" />
							</td>
							<td>
								How Long? <input type="text" name="since_when" value="<?php echo isset($info["since_when"]) ? $info['since_when'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Employer's Phone <input type="text" name="emp_phone" value="<?php echo isset($info["emp_phone"]) ? $info['emp_phone'] : ''?>" />
							</td>
							<td colspan="2">
								Employer's Street Address <input type="text" name="emp_address" value="<?php echo isset($info["emp_address"]) ? $info['emp_address'] : ''?>" />
							</td>
							<td>
								City/State <input type="text" name="emp_city" value="<?php echo isset($info["emp_city"]) ? $info['emp_city'] : ''?>" />
							</td>
							<td>
								ZIP Code <input type="text" name="emp_zip" value="<?php echo isset($info["emp_zip"]) ? $info['emp_zip'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<center>
									<small>
										IF SELF EMPLOYED, PROVIDE LAST 2 YEARS TAX RETURN AND LIST NAME OF BUSINESS, IF RETIRED, PLEASE LIST PREVIOUS EMPLOYER
									</small>
								</center>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								Previous Employer (if current employer less than 3 years) <input type="text" name="emp_pre_work" value="<?php echo isset($info["emp_pre_work"]) ? $info['emp_pre_work'] : ''?>" />
							</td>
							<td>
								Position <input type="text" name="e_position" value="<?php echo isset($info["e_position"]) ? $info['e_position'] : ''?>" />
							</td>
							<td>
								How Long? <input type="text" name="emp_how_long" value="<?php echo isset($info["emp_how_long"]) ? $info['emp_how_long'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td class="sub-title-bar" colspan="5">
								PLEASE PROVIDE SOME FINANCIAL INFORMATION
							</td>
						</tr>
						<tr style="background-color: #000;color:#FFF;">
							<td colspan="5">
								<small>
									Alimony, Child Support or Separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repayment of credit requested
								</small>
							</td>
						</tr>
						<tr>
							<td>
								Monthly Gross Salary <input type="text" name="monthly_gross_salary" value="<?php echo isset($info["monthly_gross_salary"]) ? $info['monthly_gross_salary'] : ''?>" />
							</td>
							<td>
								Additional Income (1) <input type="text" name="additional_income1" value="<?php echo isset($info["additional_income1"]) ? $info['additional_income1'] : ''?>" />
							</td>
							<td>
								Additional Income (2) <input type="text" name="additional_income2" value="<?php echo isset($info["additional_income2"]) ? $info['additional_income2'] : ''?>" />
							</td>
							<td>
								Source of Additional Income (1) <input type="text" name="source_additional_income1" value="<?php echo isset($info["source_additional_income1"]) ? $info['source_additional_income1'] : ''?>" />
							</td>
							<td>
								Source of Additional Income (2) <input type="text" name="source_additional_income2" value="<?php echo isset($info["source_additional_income2"]) ? $info['source_additional_income2'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td>
								Monthly Rent or Mortgage: <input type="text" name="monthly_rent" value="<?php echo isset($info["monthly_rent"]) ? $info['monthly_rent'] : ''?>" />
							</td>
							<td colspan="2">
								_____ Rent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _____ Lives with parents <br> _____ Own &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _____ Other
							</td>
							<td>
								Payable to: <input type="text" name="payable_to" value="<?php echo isset($info["payable_to"]) ? $info['payable_to'] : ''?>" />
							</td>
							<td>
								Monthly Auto Payment <br /> (Year, Make, Model): <input type="text" name="monthly_auto_payment" value="<?php echo isset($info["monthly_auto_payment"]) ? $info['monthly_auto_payment'] : ''?>" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Bank Name(Checking): <input type="text" name="bank_name_checking" value="<?php echo isset($info["bank_name_checking"]) ? $info['bank_name_checking'] : ''?>" />
							</td>
							<td>
								Account Number: <input type="text" name="account_number" value="<?php echo isset($info["account_number"]) ? $info['account_number'] : ''?>" />
							</td>
							<td colspan="2">
								Bank Name (Saving): <input type="text" name="bank_name_saving" value="<?php echo isset($info["bank_name_saving"]) ? $info['bank_name_saving'] : ''?>" />
							</td>
						</tr>
					<tr>
			<td colspan="5">
				<small>
					By signing below, I certify that the information contained in this application and on my attachments represents my current financial condition accurately, and I authorize you to check my credit <br />
					and employment history. You may verify the information arising out of my transactions with you to others. This application shall remain the property of the Bank. I agree to notify the Bank<br />
					of any material adverse changes in my financial condition and to furnish current financial information upon request by the bank from time to time.
				</small><br><br>
				Applicant's Signature ______________________________________ Dale __________ Joint Applicant's Signature _______________________________ Date ___________
			</td>
			  <tr>
				  <td class="td-height" style="color:#FFF;font-size:28px;font-weight:800; background-color:#443c3c;">
					FACTS
				  </td>
				  <td colspan="4" class="td-height" style="font-weight:800;font-size:16px;">
					WHAT DOES FREEDOM POWERSPORTS MCKINNEY, LLC DO WITH <br />YOUR PERSONAL INFORMATION?
				  </td>
			  </tr>
			  <tr>
				  <td  style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3">
					Why?
				  </td>
				  <td colspan="4">
					Financial companies choose how they share your personal information. Federal law gives consumers the right to limit some but not <br />all sharing. Federal law also requires us to tell you how we collect, share, and protect your personal information. <br /> Please read this notice carefully to understand what we do.
				  </td>
			  </tr>
				<tr>
					<td colspan="1" rowspan="5" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3">
						What?
					</td>
					<td colspan="4" >
						The types of personal information we collect and share depend on the product or service you have with us. This information can include:								
					</td>
				</tr>
				<tr>
					<td colspan="4" style="padding:4px 18px;">
						<ul>
					    	<li>
								Social Security number and income
							</li>
						</ul>
					</td>
				<tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
						<li>
							Credit history and credit scores
						</li>
						</ul>
					 </td>	
				 </tr> 
					<tr>
						 <td colspan="4" style="padding:4px 18px;">
							<ul>
								<li>
									Social Security number and income
								</li>
							</ul>
						 </td>
					 </tr>
					 <tr>
						 <td colspan="4" style="padding:4px 18px;  font-size: 14px;">						
								When you are no longer our customer, we continue to share your information as described in this notice.							
						 </td>
					 </tr>					
				<tr>
					<td  colspan="1" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
						How?
					</td>
					<td colspan="4">
						All financial companies need to share customers’ personal information to run their everyday business. In the section <br />below, we list the reasons financial companies can share their customers’ personal information; the reasons Freedom Powersports McKinney, LLC chooses to share; and whether you can limit this sharing.
					</td>
				</tr>	
				<tr>
					<td  colspan="3" style="color:#FFF;background-color:#d3d3d3">
					   Reasons we can share your personal information
					</td>
					<td  colspan="1" style="color:#FFF;background-color:#d3d3d3">
					   Does Freedom Powersports McKinney, LLC share?
					</td>
					<td   colspan="1" style="color:#FFF;background-color:#d3d3d3">
					   Can you limit this sharing?
					</td>
				</tr>
				<tr>
					<td colspan="3">
					  <b>For our everyday business purposes—</b>
					</td>
					<td rowspan="2" >
						<b>Yes</b>
					</td>
					<td rowspan="2" >
						<b>No</b>
					</td>
				</tr>
				<tr>
					<td colspan="3">
					  such as to process your transactions, maintain your account(s), respond to court orders and legal investigations, or report to credit bureaus
					</td>
				</tr>
				<tr>
					<td colspan="3">
					 <b>For our marketing purposes—</b>
					</td>
					<td rowspan="2" >
						<b>Yes</b>
					</td>
					<td rowspan="2" >
						<b>No</b>
					</td>
				</tr>
				<tr>
					<td colspan="3">
					  to offer our products and services to you
					</td>
				</tr>
				<tr>
					<td colspan="3">
					  <b>For joint marketing with other financial companies</b>
					</td>
					<td>
						<b>Yes</b>
					</td>
					<td>
						<b>No</b>
					</td>
				</tr>
				<tr>
					<td colspan="3">
					 <b>For our affiliates’ everyday business purposes—</b>
					</td>
					<td rowspan="2" >
						<b>No</b>
					</td>
					<td rowspan="2" >
					   <b>We do not share</b>
					</td>
				</tr>
				<tr>
					<td colspan="5">
					  information about your transactions and experiences
					</td>
				</tr>
					<tr>
					<td colspan="3">
					   <b>For our affiliates’ everyday business purposes—</b>
					</td>
					<td rowspan="2" >
						<b>No</b>
					</td>
					<td rowspan="2" >
					    <b>We do not share</b>
					</td>
				</tr>
				<tr>
					<td colspan="5">
					  information about your creditworthiness
					</td>
				</tr>
				<tr>
					<td colspan="3">
					  <b>For nonaffiliates to market to you</b>
					</td>
					<td>
					  <b>No</b>
					</td>
					<td>
					   <b>We do not share</b>
					</td>
				</tr>
				<tr>
					<td  colspan="1" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
						Questions? 
					</td>
					<td colspan="4">
						Call our Finance Manager at (972) 562-2077
					</td>
				</tr>	
				<tr>
					<td colspan="5" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
					  Who we are				
					</td>
				</tr>
				<tr>
					<td  colspan="2">
					   <b>Who is providing this notice?</b>
					</td>
					<td colspan="3">
						Freedom Powersports, LLC is doing business as Freedom Powersports McKinney, LLC.
					</td>
				</tr>
				<tr>
					<td colspan="5" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
					  What we do				
					</td>
				</tr>
				<tr>
					<td  colspan="2">
					   <b>How does Freedom Powersports McKinney, LLC protect my personal information?</b>
					</td>
					<td colspan="3">
						To protect your personal information from unauthorized access and use, we use security measures that comply with federal law. These measures include computer safeguards and secured files and buildings.
					</td>
				</tr>
				<tr>
					<td  colspan="2" rowspan="8">
					   <b>How does Freedom Powersports McKinney, LLC protect my personal information?</b>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="padding:4px 18px;">
						We collect your personal information, for example, when you
					</td>
				</tr>
				<tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
								 Apply for financing
							</li>
						</ul>
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
								Apply for a lease
							</li>
						</ul>
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
								Provide employment information
							</li>
						</ul>
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
								Give us your contact information
							</li>
						</ul>
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
								 Show your driver’s license
							</li>
						</ul>
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						   We also collect your personal information from others, such as credit bureaus, affiliates, or other companies.
					</td>	
				 </tr> 
				 <tr>
					<td  colspan="2" rowspan="6">
					     <b>Why can’t I limit all sharing?</b>
					</td>
				</tr>
				<tr>
					 <td colspan="4" style="padding:4px 18px;">
					       Federal law gives you the right to limit only
					 </td>	
				 </tr> 
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 sharing for affiliates’ everyday business purposes—information about your creditworthiness
						   </li>
						</ul>							
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 affiliates from using your information to market to you
						   </li>
						</ul>							
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 sharing for nonaffiliates to market to you 
						   </li>
						</ul>							
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						    State laws and individual companies may give you additional rights to limit sharing.						  		
					</td>	
				 </tr>
				 <tr>
					<td colspan="5" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
				           Definitions			
					</td>
				</tr>
				<tr>
					<td  colspan="2" rowspan="3">
					   <b>Affiliates</b>
					</td>
				</tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
							 Companies related by common ownership or control. They can be financial and nonfinancial companies.
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 Freedom Powersports McKinney, LLC does not share with its affiliates.
						   </li>
						</ul>							
					</td>	
				 </tr>
				 <tr>
					<td  colspan="2" rowspan="3">
					   <b>Nonaffiliates</b>
					</td>
				</tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						 Companies related by common ownership or control. They can be financial and nonfinancial companies.
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 Freedom Powersports McKinney, LLC does not share with nonaffiliates so they can market to you.
						   </li>
						</ul>							
					</td>	
				 </tr>
				<tr>
					<td  colspan="2" rowspan="3">
					   <b>Joint marketing</b>
					</td>
				</tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						 A formal agreement between nonaffiliated financial companies that together market financial products or services to you.
					</td>	
				 </tr>
				 <tr>
					 <td colspan="4" style="padding:4px 18px;">
						<ul>
							<li>
							 Our joint marketing partners include banks, credit unions and other lenders.
						   </li>
						</ul>							
					</td>	
				 </tr>
				 <tr>
					<td colspan="5" style="color:#FFF;font-size:15px;font-weight:800;background-color:#d3d3d3;">
				           Other important information		
					</td>
				</tr>
				<tr>
					<td colspan="5">
				           <b>By signing below, you acknowledge receipt of this Privacy Notice:</b>
					</td>
				</tr>
				<tr>
					<td colspan="3">
				        _________________________________________________________________________________ <br> 
						<span style="float:left">Signature</span><span style="float:right;">Date</span>
					</td>
					<td colspan="2">
				        _________________________________________________________________________________ <br> 
						<span style="float:left">Signature</span><span style="float:right;">Date</span>
					</td>
				</tr>
				<tr>
					<td colspan="3">
				        _________________________________________________________________________________ <br> 
						Printname
					</td>
					<td colspan="2">
				        _________________________________________________________________________________ <br> 
						Printname
					</td>
				</tr>
			</table>			
			</div>
		</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	$(".date_input_field").bdatepicker();
	
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
