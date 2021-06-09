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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 11px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	.bg{background-color: #000;}
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="left" style="float: left; width: 80%;">
				<h2 style="float: left; width: 100%; margin: 0; text-align: center; font-size: 18px;"><b>Please fax this completed credit application & buyers order to</b></h2>
				<h3 style="float: left; width: 100%; margin: 3px 0; font-size: 20px; text-align: center;"><b>(877) 341-APPS (2777)</b></h3>
				<div style="clear: both;"></div>
				<div class="row" style=" width: 70%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000;">
					<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Dealer Name</label>
						<input type="text" name="dealer" value="<?php echo $dealer; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
						<label>Dealer State</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
			</div>
		</div>
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 44%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 34%">
						<label>First Name</label>
						<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%">
						<label>Middle Name</label>
						<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%">
						<label>Last Name</label>
						<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Social Security Number</label>
				<input type="text" name="snumber" value="<?php echo isset($info['snumber']) ? $info['snumber'] : "" ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Date of Birth</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : "" ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Home Phone Number</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>" style="width: 100%;">
			</div>	
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Present Address (Number and Street)</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">City,State & Zip Code</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Drivers License #</label>
				<input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Cell Phone Number</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; height: 44px; width: 16%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">US Citizen</label>
				<label><input type="checkbox" name="citizen_status" <?php echo ($info['citizen_status'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label>
				<label><input type="checkbox" name="citizen_status" <?php echo ($info['citizen_status'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: inline-block; width: 25%;"><input type="checkbox" name="buy_status" <?php echo ($info['buy_status'] == "buying") ? "checked" : ""; ?> value="buying"/> Buying</label>
				<label style="display: inline-block; width: 42%;"><input type="checkbox" name="own_status" <?php echo ($info['own_status'] == "own") ? "checked" : ""; ?> value="own"/> Own Free & Clear</label><br>
				<label style="display: inline-block; width: 25%;"><input type="checkbox" name="rent_status" <?php echo ($info['rent_status'] == "rent") ? "checked" : ""; ?> value="rent"/> Renting</label>
				<label style="display: inline-block; width: 45%;"><input type="checkbox" name="living_status" <?php echo ($info['living_status'] == "living") ? "checked" : ""; ?> value="living"/> Living with Parents</label>
				<label style="display: inline-block; width: 20%;"><input type="checkbox" name="other_status" <?php echo ($info['other_status'] == "other") ? "checked" : ""; ?> value="other"/> Other</label>
			</div>
			<div class="form-field" style="height: 44px; float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Rent  or Mortgage Payment</label>
				$ <input type="text" name="mortgage" value="<?php echo isset($info['mortgage']) ? $info['mortgage'] : "" ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 44px;">
				<label style="display: block;">Mortgage Holder/Landlord </label>
				<input type="text" name="holder" value="<?php echo isset($info['holder']) ? $info['holder'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="residence_year" value="<?php echo isset($info['residence_year']) ? $info['residence_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="residence_month" value="<?php echo isset($info['residence_month']) ? $info['residence_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Address (Street, City, State and Zip Code) (Complete if less  than three years at present address)</label>
				<input type="text" name="previous_address" value="<?php echo isset($info['previous_address']) ? $info['previous_address'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="previous_year" value="<?php echo isset($info['previous_year']) ? $info['previous_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="previous_month" value="<?php echo isset($info['previous_month']) ? $info['previous_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Name and address of Personal Reference Not Living With You</label>
				<input type="text" name="personal_info" value="<?php echo isset($info['personal_info']) ? $info['personal_info'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Relationship</label>
				<input type="text" name="relationship" value="<?php echo isset($info['relationship']) ? $info['relationship'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Home Phone Number</label>
				<input type="text" name="home_phone" value="<?php echo isset($info['home_phone']) ? $info['home_phone'] : "" ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Present Employer Name (If Self-Employment Please List Business Name)</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer']) ? $info['pre_employer'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">City, State</label>
				<input type="text" name="city_state" value="<?php echo isset($info['city_state']) ? $info['city_state'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Employer's Area Code & Phone Number</label>
				<input type="text" name="employer_phone" value="<?php echo isset($info['employer_phone']) ? $info['employer_phone'] : "" ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Gross Monthly Income (Before Taxes)</label>
				<input type="text" name="monthly_income" value="<?php echo isset($info['monthly_income']) ? $info['monthly_income'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Buyer's Occupation or Job Title (if Miltary, State Rank)</label>
				<input type="text" name="occupation" value="<?php echo isset($info['occupation']) ? $info['occupation'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="time_year" value="<?php echo isset($info['time_year']) ? $info['time_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="time_month" value="<?php echo isset($info['time_month']) ? $info['time_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Source of Additional Income</label>
				<input type="text" name="addition_income" value="<?php echo isset($info['addition_income']) ? $info['addition_income'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Additional Annual Income (gross amount)<sup>*</sup></label>
				<input type="text" name="annual_income" value="<?php echo isset($info['annual_income']) ? $info['annual_income'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Employer (Complete if less than two years at present job)</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer']) ? $info['pre_employer'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Occupation or Job Title</label>
				<input type="text" name="occupation_job" value="<?php echo isset($info['occupation_job']) ? $info['occupation_job'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Job</label>
				<input type="text" name="job_year" value="<?php echo isset($info['job_year']) ? $info['job_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="job_month" value="<?php echo isset($info['job_month']) ? $info['job_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 44%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 34%">
						<label>First Name</label>
						<input type="text" name="co_fname" value="<?php echo isset($info['co_fname']) ? $info['co_fname'] : "" ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%">
						<label>Middle Name</label>
						<input type="text" name="co_mname" value="<?php echo isset($info['co_mname']) ? $info['co_mname'] : "" ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%">
						<label>Last Name</label>
						<input type="text" name="co_lname" value="<?php echo isset($info['co_lname']) ? $info['co_lname'] : "" ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Social Security Number</label>
				<input type="text" name="co_social_num" value="<?php echo isset($info['co_social_num']) ? $info['co_social_num'] : "" ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Date of Birth</label>
				<input type="text" name="co_dob" value="<?php echo isset($info['co_dob']) ? $info['co_dob'] : "" ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Home Phone Number</label>
				<input type="text" name="co_phone" value="<?php echo isset($info['co_phone']) ? $info['co_phone'] : "" ?>" style="width: 100%;">
			</div>	
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Present Address (Number and Street)</label>
				<input type="text" name="co_address" value="<?php echo isset($info['co_address']) ? $info['co_address'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">City,State & Zip Code</label>
				<input type="text" name="co_address_data" value="<?php echo isset($info['co_address_data']) ? $info['co_address_data'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Drivers License #</label>
				<input type="text" name="co_driver" value="<?php echo isset($info['co_driver']) ? $info['co_driver'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Cell Phone Number</label>
				<input type="text" name="co_mobile" value="<?php echo isset($info['co_mobile']) ? $info['co_mobile'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; height: 44px; width: 16%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">US Citizen</label>
				<label><input type="checkbox" name="co_citizen" <?php echo ($info['co_citizen'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label>
				<label><input type="checkbox" name="co_citizen" <?php echo ($info['co_citizen'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: inline-block; width: 25%;"><input type="checkbox" name="co_buying" <?php echo ($info['co_buying'] == "buying") ? "checked" : ""; ?> value="buying"/> Buying</label>
				<label style="display: inline-block; width: 40%;"><input type="checkbox" name="co_own" <?php echo ($info['co_own'] == "own") ? "checked" : ""; ?> value="own"/> Own Free & Clear</label><br>
				<label style="display: inline-block; width: 25%;"><input type="checkbox" name="co_renting" <?php echo ($info['co_renting'] == "renting") ? "checked" : ""; ?> value="renting"/> Renting</label>
				<label style="display: inline-block; width: 45%;"><input type="checkbox" name="co_living" <?php echo ($info['co_living'] == "living") ? "checked" : ""; ?> value="living"/> Living with Parents</label>
				<label style="display: inline-block; width: 20%;"><input type="checkbox" name="co_other" <?php echo ($info['co_other'] == "other") ? "checked" : ""; ?> value="other"/> Other</label>
			</div>
			<div class="form-field" style="height: 44px; float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Rent  or Mortgage Payment</label>
				$ <input type="text" name="co_mortage" value="<?php echo isset($info['co_mortage']) ? $info['co_mortage'] : "" ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 44px;">
				<label style="display: block;">Mortgage Holder/Landlord </label>
				<input type="text" name="co_holder" value="<?php echo isset($info['co_holder']) ? $info['co_holder'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="co_time_year" value="<?php echo isset($info['co_time_year']) ? $info['co_time_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_time_month" value="<?php echo isset($info['co_time_month']) ? $info['co_time_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Address (Street, City, State and Zip Code) (Complete if less  than three years at present address)</label>
				<input type="text" name="co_pre_address" value="<?php echo isset($info['co_pre_address']) ? $info['co_pre_address'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="co_pre_time" value="<?php echo isset($info['co_pre_time']) ? $info['co_pre_time'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_pre_month" value="<?php echo isset($info['co_pre_month']) ? $info['co_pre_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Name and address of Personal Reference Not Living With You</label>
				<input type="text" name="co_personal_info" value="<?php echo isset($info['co_personal_info']) ? $info['co_personal_info'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Relationship</label>
				<input type="text" name="co_relation" value="<?php echo isset($info['co_relation']) ? $info['co_relation'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Area Code & Home Phone Number</label>
				<input type="text" name="co_home_num" value="<?php echo isset($info['co_home_num']) ? $info['co_home_num'] : "" ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Present Employer Name (If Self-Employment Please List Business Name)</label>
				<input type="text" name="co_employer_name" value="<?php echo isset($info['co_employer_name']) ? $info['co_employer_name'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">City, State</label>
				<input type="text" name="co_employer_name" value="<?php echo isset($info['co_employer_name']) ? $info['co_employer_name'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Employer's Area Code & Phone Number</label>
				<input type="text" name="co_employer_code" value="<?php echo isset($info['co_employer_code']) ? $info['co_employer_code'] : "" ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Gross Monthly Income (Before Taxes)</label>
				<input type="text" name="co_monthly_income" value="<?php echo isset($info['co_monthly_income']) ? $info['co_monthly_income'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Buyer's Occupation or Job Title (if Miltary, State Rank)</label>
				<input type="text" name="co_occupation" value="<?php echo isset($info['co_occupation']) ? $info['co_occupation'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="co_residence_year" value="<?php echo isset($info['co_residence_year']) ? $info['co_residence_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_residence_month" value="<?php echo isset($info['co_residence_month']) ? $info['co_residence_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 62%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Source of Additional Income</label>
				<input type="text" name="co_source_income" value="<?php echo isset($info['co_source_income']) ? $info['co_source_income'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Additional Annual Income (gross amount)<sup>*</sup></label>
				<input type="text" name="co_annual_income" value="<?php echo isset($info['co_annual_income']) ? $info['co_annual_income'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style=" width: 100%; float: left; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Employer (Complete if less than two years at present job)</label>
				<input type="text" name="co_pre_employer" value="<?php echo isset($info['co_pre_employer']) ? $info['co_pre_employer'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">Occupation or Job Title</label>
				<input type="text" name="co_job" value="<?php echo isset($info['co_job']) ? $info['co_job'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label style="display: block;">Time at Job</label>
				<input type="text" name="co_job_year" value="<?php echo isset($info['co_job_year']) ? $info['co_job_year'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_job_month" value="<?php echo isset($info['co_job_month']) ? $info['co_job_month'] : "" ?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;"><b><b>Please answer the following questions to expedite the loan process:</b></b></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">1. How much money do you anticipate using as a down payment ( not including the trade allowance )? $<input type="text" name="down-payment" value="<?php echo isset($info['down-payment']) ? $info['down-payment'] : "" ?>" style="border-bottom: 1px solid #000; width: 20%;"></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;"><i>(Typically 10% to 20% cash and/or trade equity is considered a minimum down payment by lenders.)</i></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">2. Whom should we call with the details of the loan? <label style="margin: 0 10px;">Buyer <input type="radio" name="loan_status" <?php echo ($info['loan_status'] == "buyer") ? "checked" : ""; ?> value="buyer"/></label>  <label>Co-Buyer <input type="radio" name="loan_status" <?php echo ($info['loan_status'] == "co_buyer") ? "checked" : ""; ?> value="co_buyer"/></label></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">3. Where should we contact you? <label style="margin: 0 10px;">Home <input type="radio" name="contact_status" <?php echo ($info['contact_status'] == "home") ? "checked" : ""; ?> value="home"/> </label>  <label style="margin-right: 10px;"> Work<input type="radio" name="contact_status" <?php echo ($info['contact_status'] == "work") ? "checked" : ""; ?> value="work"/> </label> <label>Cell Phone <input type="radio" name="contact_status" <?php echo ($info['contact_status'] == "cell") ? "checked" : ""; ?> value="cell"/></label></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">4. Email Address <input type="text" name="email_address" value="<?php echo isset($info['email_address']) ? $info['email_address'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;"></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">5. When do you anticipte delivery? <input type="text" name="anticipte_delivery" value="<?php echo isset($info['anticipte_delivery']) ? $info['anticipte_delivery'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;"></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">6. Previous Owned Boats or Recreational Vehicles (list lagrest, if sereral) <input type="text" name="pre_owned" value="<?php echo isset($info['pre_owned']) ? $info['pre_owned'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;"></p>
			<p style="float: left; width: 100%; font-size: 15px; margin: 2px 0;">7. If purchasing an R V , do you plan to live in the RV more than 6 months of the year? <label><input type="radio" name="rv_status" <?php echo ($info['rv_status'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label> <label><input type="radio" name="rv_status" <?php echo ($info['rv_status'] == "no") ? "checked" : ""; ?> value="no"/> No</label></p>
			
			<p style="font-size: 11px; margin: 5px 0;">Federal law requires the creditor to obtain, verify and record information that identifies me (us) when I (we) open an account. The creditor will use my (our) name, address, and other information for this purpose.</p>
			
			<p style="float: left; width: 100%; font-size: 10px;">Evidence of phyical damage insurance on the collateral securing the loan you seek is required prior to closing By submitting this application, you are authorizing us to disclose information contained in your application to n insurance carrier solely for the purpose of providing you with a premium quote for such insurance. You are, howerver, under no obligation whatsoever to purchase insurance from the insurance carrier providing the quote</p>
			
			<p style="float: left; width: 100%; font-size: 10px;"><sup>*</sup>Alimony, child support or seprate maintenance income need not be revealed if you do not wish to hve it considered as a basis for repaying this obligation.</p>
			
			<p style="float: left; width: 100%; font-size: 10px;">SIGNATURES: I (we) authorize Priority One to obtain any information pertaining to my (our) trade payoff from the lender. I (we) certify that everything stated in this application and on any attachments is true and correct. Priority One and any participating lender may keep this application whether or not it is approved. By Signing below I (we) authorize Priority One and any participating lender to chck my credit and employment history and to obtain a consumer credit report in connection with this application or in connection with additonal approval, extensions or collection of credit. I (we) understand that I (we) must update application information if my financial condition changes prior to closing of the loan. upon request I (we) will be informed whether or not a consumer credit report was requested and if so the name and address of the agency that furnished such report. </p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%">
				<div class="form-field" style="width: 70%; float: left;">
					X<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign']) ? $info['buyer_sign'] : "" ?>" style="width: 95.5%; border-bottom: 1px solid #000;">
					<label>Buyer's Signature</label>
				</div>
				<div class="form-field" style="width: 28%; float: left;">
					<input type="text" name="buyer_date" value="<?php echo isset($info['buyer_date']) ? $info['buyer_date'] : "" ?>" style="width: 100%; border-bottom: 1px solid #000;">
					<label>Date</label>
				</div>
			</div>
			
			<div class="left" style="float: right; width: 56%">
				<div class="form-field" style="width: 70%; float: left;">
					X<input type="text" name="co_buyer_sign" value="<?php echo isset($info['co_buyer_sign']) ? $info['co_buyer_sign'] : "" ?>" style="width: 95.5%; border-bottom: 1px solid #000;">
					<label>Co-Buyer's Signature</label>
				</div>
				<div class="form-field" style="width: 28%; float: left;">
					<input type="text" name="co_buyer_date" value="<?php echo isset($info['co_buyer_date']) ? $info['co_buyer_date'] : "" ?>" style="width: 100%; border-bottom: 1px solid #000;">
					<label>Date</label>
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; margin: 0;">Priority One Financial  Services, Inc. - Please call us at 1-800-747-6223 for questions concerning your loan.</p>
		
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
