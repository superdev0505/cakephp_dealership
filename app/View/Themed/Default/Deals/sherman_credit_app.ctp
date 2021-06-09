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
$expectedt = date('m/d/Y');
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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 5px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	.content-upper input[type="text"]{border: 0px;}
	.content-upper label, .content-upper{font-size: 13px;}
@media print {
	
	.first-end {margin-bottom: 280px !important;}
	input[type="text"]{padding: 1px;}
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000; padding-bottom: 7px;">
			<div class="logo" style="width: 47%; margin: 0 auto; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/cover-sheet-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 40%; margin-top: 10px;">
				<div class="row" style="float: left; width: 100%;margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Contact Person:</label>
						<input type="text" name="contact_person" value="<?php echo isset($info['contact_person'])?$info['contact_person']:''; ?>" style="width: 70%">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%;margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Year:</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 68%">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make:</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 74%">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%;margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Model:</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 85%">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%;margin: 2px 0;">
					<div class="form-field" style="float: left; width: 35%;">
						<label><input type="radio" name="condition" <?php echo ($info['condition'] == "NEW") ? "checked" : ""; ?> value="NEW"/> New</label> or
						<label><input type="radio" name="condition" <?php echo ($info['condition'] == "USED") ? "checked" : ""; ?> value="USED"/> Used</label>
					</div>
					<div class="form-field" style="float: left; width: 65%;">
						<label>LOAN Request: $</label>
						<input type="text" name="loan_request" value="<?php echo isset($info['loan_request'])?$info['loan_request']:''; ?>" style="width: 52%">
					</div>
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 7px 0 20px; font-size: 16px;"><b> CREDIT APPLICATION <br> 
1205 S Sam Rayburn FWY | Sherman, Texas 75090 <br>
Phone: 903-868-3030| Fax: 903-892-4816 |</b>  <a href="#" style="color: blue;">www.shermanpowersports.com</a></h2>

	<p style="float: left; width: 100%; font-size: 15px; margin; 5px 0;"><b>IMPORTANT: Read these Directions before completing the Application.</b></p>
		
	<p style="float: left; width: 100%;margin: 5px 0; font-size: 13px;"> <input type="text" name="import_title1" value="<?php echo isset($info['import_title1'])?$info['import_title1']:''; ?>" style="width: 10%;"> If you are applying for individual credit in your own name and are relying on your own income or assets and not the income or assets of another person as the basis for repayment complete only Sections A & C. </p>
		
	<p style="float: left; width: 100%;margin: 5px 0; font-size: 13px;"> <input type="text" name="import_title2" value="<?php echo isset($info['import_title2'])?$info['import_title2']:''; ?>" style="width: 10%;"> If you are apply-nolazying for joint credit with Co-applicant, complete Sections A, B & C, providing information in Section B about the Co-applicant  </p>

	<p style="float: left; width: 100%;margin: 5px 0; font-size: 13px; margin-bottom: 30px;"> <input type="text" name="import_title3" value="<?php echo isset($info['import_title3'])?$info['import_title3']:''; ?>" style="width: 10%;"> If you are applying for individual credit but are relying on income or assets of another person as the basis for repayment, complete Sections A, B & C, proving information in Section B about the person on whose income or assets you are relying.</p>
		
		
	<p style="float: left; width: 100%; margin: 10px 0; font-size: 14px;"><b>APPLICANT INFORMATION – SECTION A</b></p>

	<div class="content-upper" style="float: left; width: 100%;">
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px; box-sizing: border-box;">
				<label>Material Status:</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="marital_check" <?php echo ($info['marital_check'] == "material") ? "checked" : ""; ?> value="material"/> Married</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="marital_check" <?php echo ($info['marital_check'] == "separated") ? "checked" : ""; ?> value="separated"/> Separated</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="marital_check" <?php echo ($info['marital_check'] == "unmarried") ? "checked" : ""; ?> value="unmarried"/> Unmarried (single, divorced, widowed)</label>
			</div>
		</div>


		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Drivers Lic State & #:  </label>
				<input type="text" name="driver_lic" value="<?php echo isset($info['driver_lic'])?$info['driver_lic']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Date of Birth:</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Home Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Cell Phone:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 70%;">
			</div>	
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>SSN:</label>
				<input type="text" name="ssn" value="<?php echo isset($info['ssn'])?$info['ssn']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Street Address:</label>
				<input type="text" name="street_address" value="<?php echo isset($info['street_address'])?$info['street_address']: $info['address']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>Time There:</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">Years/ 
				<input type="text" name="month1" value="<?php echo isset($info['month1'])?$info['month1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Month
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box;">
				<label>ZIP Code:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 65%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Previous Address:</label>
				<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>Time There:</label>
				<input type="text" name="time2" value="<?php echo isset($info['time2'])?$info['time2']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">Years/ 
				<input type="text" name="month2" value="<?php echo isset($info['month2'])?$info['month2']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Month
			</div>
		</div>


		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="pre_city" value="<?php echo isset($info['pre_city'])?$info['pre_city']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="pre_state" value="<?php echo isset($info['pre_state'])?$info['pre_state']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box;">
				<label>ZIP Code:</label>
				<input type="text" name="pre_zip" value="<?php echo isset($info['pre_zip'])?$info['pre_zip']:''; ?>" style="width: 65%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Current Employer:</label>
				<input type="text" name="current_employer" value="<?php echo isset($info['current_employer'])?$info['current_employer']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Address:</label>
				<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; padding: 3px;  box-sizing: border-box;">
				<label>Phone:</label>
				<input type="text" name="pre_phone" value="<?php echo isset($info['pre_phone'])?$info['pre_phone']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; padding: 5px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Title/Position:</label>
				<input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 64%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 5px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Current Supervisor:</label>
				<input type="text" name="current_supervisor" value="<?php echo isset($info['current_supervisor'])?$info['current_supervisor']:''; ?>" style="width: 47%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000; height: 39px;">
				<label>Time There:</label>
				<input type="text" name="year3" value="<?php echo isset($info['year3'])?$info['year3']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"><span style="font-size: 10px;">Years/</span>
				<input type="text" name="month3" value="<?php echo isset($info['month3'])?$info['month3']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"><span style="font-size: 10px;">Months</span>
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box;">
				<label style="font-size: 10px;">Gross Monthly Earnings:</label>
				<input type="text" name="gross" value="<?php echo isset($info['gross'])?$info['gross']:''; ?>" style="width: 35%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Previous Employer (If less than 2 years listed above):</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer'])?$info['pre_employer']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000; height: 52px;">
				<label>Time There:</label>
				<input type="text" name="year4" value="<?php echo isset($info['year4'])?$info['year4']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">Years/ 
				<input type="text" name="month4" value="<?php echo isset($info['month4'])?$info['month4']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">Months
			</div>
			<div class="form-field" style="float: left; width: 33%; padding: 3px;  box-sizing: border-box;">
				<label>Previous Employer Phone:</label>
				<input type="text" name="pre_employer_phone" value="<?php echo isset($info['pre_employer_phone'])?$info['pre_employer_phone']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Home:</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="own_check" <?php echo ($info['own_check'] == "own") ? "checked" : ""; ?> value="own"/> OWN</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="rent_check" <?php echo ($info['rent_check'] == "rent") ? "checked" : ""; ?> value="rent"/> Rent</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="parent_check" <?php echo ($info['parent_check'] == "parent") ? "checked" : ""; ?> value="parent"/> Parents</label><br>
				<label style="margin: 0 1%;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other"/> Other</label>
				<input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="width: 40%; border-bottom: 1px solid #000; margin-bottom: 5px;"> explain <br>
				Monthly Payment $  <input type="text" name="month_payment1" value="<?php echo isset($info['month_payment1'])?$info['month_payment1']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000; height: 91px;">
				<label>Landlord or First Mortgage Holder (Name & Address):</label>
				<input type="text" name="landlord1" value="<?php echo isset($info['landlord1'])?$info['landlord1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box;">
				<label>Landlord’s Phone:</label>
				<input type="text" name="landlord_phone1" value="<?php echo isset($info['landlord_phone1'])?$info['landlord_phone1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; padding: 10px 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Other Income Per Month: $ </label>
				<input type="text" name="income_month1" value="<?php echo isset($info['income_month1'])?$info['income_month1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 3px;  box-sizing: border-box;">
				<label><b>Source:</b> (Alimony, child support or separate maintenance  need not be revealed if you do not  wish to have it considered as a basis for repaying the obligation) </label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 65%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Name of Nearest Relative:</label>
				<input type="text" name="nearest_name" value="<?php echo isset($info['nearest_name'])?$info['nearest_name']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; padding: 3px;  box-sizing: border-box;">
				<label>Relationship:</label>
				<input type="text" name="relationship" value="<?php echo isset($info['relationship'])?$info['relationship']:''; ?>" style="width: 67%;">
			</div>
		</div>
		
		<div class="row first-end" style="float: left; width: 100%; margin: 0; border: 1px solid #000;margin-bottom: 30px;">
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Address of Nearest Relative:</label>
				<input type="text" name="nearest_address" value="<?php echo isset($info['nearest_address'])?$info['nearest_address']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box;">
				<label>Phone:</label>
				<input type="text" name="nearest_phone" value="<?php echo isset($info['nearest_phone'])?$info['nearest_phone']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		
		
		<p class="second-page" style="float: left; width: 100%; margin: 10px 0; font-size: 14px;"><b>Co-APPLICANT INFORMATION – SECTION B</b></p>

	<div class="content-upper" style="float: left; width: 100%;">
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Name:</label>
				<input type="text" name="co_name" value="<?php echo isset($info['co_name'])?$info['co_name']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px; box-sizing: border-box;">
				<label>Material Status:</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_marital_check" <?php echo ($info['co_marital_check'] == "co_material") ? "checked" : ""; ?> value="co_material"/> Married</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_separated_check" <?php echo ($info['co_separated_check'] == "co_separated") ? "checked" : ""; ?> value="co_separated"/> Separated</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_unmarried_check" <?php echo ($info['co_unmarried_check'] == "co_unmarried") ? "checked" : ""; ?> value="co_unmarried"/> Unmarried (single, divorced, widowed)</label>
			</div>
		</div>


		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Drivers Lic State & #:  </label>
				<input type="text" name="co_driver" value="<?php echo isset($info['co_driver'])?$info['co_driver']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Date of Birth:</label>
				<input type="text" name="co_birthday" value="<?php echo isset($info['co_birthday'])?$info['co_birthday']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>Relationship to Applicant (if any) :</label>
				<input type="text" name="co_relathion" value="<?php echo isset($info['co_relathion'])?$info['co_relathion']:''; ?>" style="width: 45%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Home Phone:</label>
				<input type="text" name="co_phone" value="<?php echo isset($info['co_phone'])?$info['co_phone']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Cell Phone:</label>
				<input type="text" name="co_mobile" value="<?php echo isset($info['co_mobile'])?$info['co_mobile']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>SSN:</label>
				<input type="text" name="co_ssn" value="<?php echo isset($info['co_ssn'])?$info['co_ssn']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Street Address:</label>
				<input type="text" name="co_address" value="<?php echo isset($info['co_address'])?$info['co_address']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; padding: 3px;  box-sizing: border-box;">
				<label>Time There:</label>
				<input type="text" name="co_year1" value="<?php echo isset($info['co_year1'])?$info['co_year1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">Year/ 
				<input type="text" name="co_month1" value="<?php echo isset($info['co_month1'])?$info['co_month1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Month
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="co_city" value="<?php echo isset($info['co_city'])?$info['co_city']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="co_state" value="<?php echo isset($info['co_state'])?$info['co_state']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box;">
				<label>ZIP Code:</label>
				<input type="text" name="co_zip" value="<?php echo isset($info['co_zip'])?$info['co_zip']:''; ?>" style="width: 65%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Current Employer:</label>
				<input type="text" name="co_current_employer" value="<?php echo isset($info['co_current_employer'])?$info['co_current_employer']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Address:</label>
				<input type="text" name="co_address" value="<?php echo isset($info['co_address'])?$info['co_address']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 3px;  box-sizing: border-box;">
				<label>Phone:</label>
				<input type="text" name="co_pre_phone" value="<?php echo isset($info['co_pre_phone'])?$info['co_pre_phone']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 29%; padding: 5px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Title/Position:</label>
				<input type="text" name="co_title" value="<?php echo isset($info['co_title'])?$info['co_title']:''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 31%; padding: 5px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Current Supervisor:</label>
				<input type="text" name="co_supervisor" value="<?php echo isset($info['co_supervisor'])?$info['co_supervisor']:''; ?>" style="width: 48%;">
			</div>
			<div class="form-field" style="float: left; width: 23%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000; height: 39px;">
				<label>Time There:</label>
				<input type="text" name="co_year3" value="<?php echo isset($info['co_year3'])?$info['co_year3']:''; ?>" style="width: 17%; border-bottom: 1px solid #000;"><span style="font-size: 10px;">Years/</span>  
				<input type="text" name="co_month3" value="<?php echo isset($info['co_month3'])?$info['co_month3']:''; ?>" style="width: 18%; border-bottom: 1px solid #000;"><span style="font-size: 10px;">Months</span> 
			</div>
			<div class="form-field" style="float: left; width: 17%; padding: 3px;  box-sizing: border-box;">
				<label style="font-size: 10px;">Gross Monthly Earnings:</label>
				<input type="text" name="co_gross" value="<?php echo isset($info['co_gross'])?$info['co_gross']:''; ?>" style="width: 27%;">
			</div>
		</div>
				
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Home:</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_own_check" <?php echo ($info['co_own_check'] == "co_own") ? "checked" : ""; ?> value="co_own"/> OWN</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_rent_check" <?php echo ($info['co_rent_check'] == "co_rent") ? "checked" : ""; ?> value="co_rent"/> Rent</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_parent_check" <?php echo ($info['co_parent_check'] == "co_parent") ? "checked" : ""; ?> value="co_parent"/> Parents</label><br>
				<label style="margin: 0 1%;"><input type="checkbox" name="co_other_check" <?php echo ($info['co_other_check'] == "co_other") ? "checked" : ""; ?> value="co_other"/> Other</label>
				<input type="text" name="co_explain" value="<?php echo isset($info['co_explain'])?$info['co_explain']:''; ?>" style="width: 40%; border-bottom: 1px solid #000; margin-bottom: 5px;"> explain <br>
				Monthly Payment $  <input type="text" name="co_month_pay" value="<?php echo isset($info['co_month_pay'])?$info['co_month_pay']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000; height: 91px;">
				<label>Landlord or First Mortgage Holder (Name & Address):</label>
				<input type="text" name="co_landlord" value="<?php echo isset($info['co_landlord'])?$info['co_landlord']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 3px;  box-sizing: border-box;">
				<label>Landlord’s Phone:</label>
				<input type="text" name="co_landlord_phone" value="<?php echo isset($info['co_landlord_phone'])?$info['co_landlord_phone']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000;margin-bottom: 30px;">
			<div class="form-field" style="float: left; width: 50%; padding: 10px 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Other Income Per Month: $ </label>
				<input type="text" name="co_income_month" value="<?php echo isset($info['co_income_month'])?$info['co_income_month']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 3px;  box-sizing: border-box;">
				<label><b>Source:</b> (Alimony, child support or separate maintenance  need not be revealed if you do not  wish to have it considered as a basis for repaying the obligation) </label>
			</div>
		</div>

		<p style="float: left; width: 100%; margin: 10px 0; font-size: 14px;"><b>REFERENCES – SECTION C</b></p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Name:</label>
				<input type="text" name="ref_name1" value="<?php echo isset($info['ref_name1'])?$info['ref_name1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box;">
				<label>Relationship to Applicant:</label>
				<input type="text" name="ref_relationship1" value="<?php echo isset($info['ref_relationship1'])?$info['ref_relationship1']:''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Address:</label>
				<input type="text" name="ref_address1" value="<?php echo isset($info['ref_address1'])?$info['ref_address1']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Phone:</label>
				<input type="text" name="ref_phone1" value="<?php echo isset($info['ref_phone1'])?$info['ref_phone1']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box;">
				<label>Years Acquainted:</label>
				<input type="text" name="ref_years1" value="<?php echo isset($info['ref_years1'])?$info['ref_years1']:''; ?>" style="width: 40%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Name:</label>
				<input type="text" name="ref_name2" value="<?php echo isset($info['ref_name2'])?$info['ref_name2']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 6px 3px;  box-sizing: border-box;">
				<label>Relationship to Applicant:</label>
				<input type="text" name="ref_relation2" value="<?php echo isset($info['ref_relation2'])?$info['ref_relation2']:''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; margin-bottom: 30px;">
			<div class="form-field" style="float: left; width: 50%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Address:</label>
				<input type="text" name="ref_address2" value="<?php echo isset($info['ref_address2'])?$info['ref_address2']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box; border-right: 1px solid #000;">
				<label>Phone:</label>
				<input type="text" name="ref_phone2" value="<?php echo isset($info['ref_phone2'])?$info['ref_phone2']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px;  box-sizing: border-box;">
				<label>Years Acquainted:</label>
				<input type="text" name="ref_years2" value="<?php echo isset($info['ref_years2'])?$info['ref_years2']:''; ?>" style="width: 40%;">
			</div>
		</div>

		<p style="float: left; width: 100%; margin: 7px 0; font-size: 12px;">Each person signing this Application (each such person being hereinafter referred to as “I”) hereby certifies that everything I have stated in this Application is correct to the best of my knowledge and is provided to Sherman Powersports or one or more additional third party financial institutions, at dealers discretion, for the purpose of initiating the extension of credit. I understand that potential lenders will retain this Application whether or not it is approved. The ultimate lender is authorized to periodically check my credit and employment history and to provide information to others about its credit experience with me. Upon request I will be provided a copy of this credit application. </p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 3px;">
			<div class="fomr-field" style="float: left; width: 70%;">
				<label>Applicant’s Signature:</label>
				<input type="text" name="app_sign" value="<?php echo isset($info['app_sign'])?$info['app_sign']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="fomr-field" style="float: left; width: 30%;">
				<label>Date signed:</label>
				<input type="text" name="date_sign" value="<?php echo isset($info['date_sign'])?$info['date_sign']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="fomr-field" style="float: left; width: 70%;">
				<label>Co-Applicant’s Signature:</label>
				<input type="text" name="co_app_sign" value="<?php echo isset($info['co_app_sign'])?$info['co_app_sign']:''; ?>" style="width: 77%; border-bottom: 1px solid #000;">
			</div>
			<div class="fomr-field" style="float: left; width: 30%;">
				<label>Date signed:</label>
				<input type="text" name="co_date_sign" value="<?php echo isset($info['co_date_sign'])?$info['co_date_sign']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
		</div>
			
			
	</div>
	<!-- worksheet end -->
		
		
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
