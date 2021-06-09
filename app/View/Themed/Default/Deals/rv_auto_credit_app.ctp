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
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	
	
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px; border-top: 1px solid #000;}
	td, th{padding: 4px; text-align: center; padding: 7px; border-bottom: 1px solid #000;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	.leftalign td{text-align: left;}
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.signature {margin: 62px 0 78px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; font-size: 17px; margin: 3px 0;"><i>RV APPLICATION FOR CREDIT</i></h2>
		<h2 style="float: left; width: 100%; text-align: center; font-size: 19px; margin: 3px 0;"><b>VAN BOXTEL</b></h2>
		<div class="upper" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
				<h2 style="float: left; width: 100%; background-color: #ededed; margin: 0; box-sizing: border-box; padding: 4px 3px; font-size: 16px; border-bottom: 1px solid #000;"><b>Applicant</b></h2>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>Name</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>Present Street Address</label>
						<input type="text" name="customer_address" value="<?php echo isset($info['customer_address']) ? $info['customer_address'] : $info['address']; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>City, State, Zip Code</label>
						<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
						<label>Years at Address</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="padding: 3px; float: left; width: 34%; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Home Phone Number</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; padding: 3px; width: 33%; margin: 0; box-sizing: border-box;">
						<label>Date of Birth</label>
						<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 45%; padding: 3px; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Social Security Number</label>
						<input type="text" name="snumber" value="<?php echo isset($info["snumber"]) ? $info['snumber'] : ''?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 55%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Drivers License Number</label>
						<input type="text" name="license_number" value="<?php echo isset($info['license_number'])?$info['license_number']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 67%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Previous Address</label>
						<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Yrs. At Prev Address</label>
						<input type="text" name="pre_yrs" value="<?php echo isset($info['pre_yrs'])?$info['pre_yrs']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 67%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Nearest Relative (Not living in household)</label>
						<input type="text" name="nearest_relative" value="<?php echo isset($info['nearest_relative'])?$info['nearest_relative']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Relationship</label>
						<input type="text" name="relationship" value="<?php echo isset($info['relationship'])?$info['relationship']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; margin: 0; box-sizing: border-box;">
				<h2 style="float: left; font-size: 16px; background-color: #ededed; width: 100%; margin: 0; box-sizing: border-box; padding: 4px 3px; border-bottom: 1px solid #000;"><b>Co-Applicant</b></h2>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>Name</label>
						<input type="text" name="co_name" value="<?php echo isset($info['co_name'])?$info['co_name']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>Present Street Address</label>
						<input type="text" name="co_address" value="<?php echo isset($info['co_address'])?$info['co_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
						<label>City, State, Zip Code</label>
						<input type="text" name="co_address_data" value="<?php echo isset($info['co_address_data'])?$info['co_address_data']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
						<label>Years at Address</label>
						<input type="text" name="co_year" value="<?php echo isset($info['co_year'])?$info['co_year']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="padding: 3px; float: left; width: 34%; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Home Phone Number</label>
						<input type="text" name="co_phone" value="<?php echo isset($info['co_phone'])?$info['co_phone']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; padding: 3px; width: 33%; margin: 0; box-sizing: border-box;">
						<label>Date of Birth</label>
						<input type="text" name="co_dob" value="<?php echo isset($info['co_dob'])?$info['co_dob']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 45%; padding: 3px; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Social Security Number</label>
						<input type="text" name="co_security" value="<?php echo isset($info['co_security'])?$info['co_security']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 55%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Drivers License Number</label>
						<input type="text" name="co_license" value="<?php echo isset($info['co_license'])?$info['co_license']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 67%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Previous Address</label>
						<input type="text" name="co_pre_address" value="<?php echo isset($info['co_pre_address'])?$info['co_pre_address']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Yrs. At Prev Address</label>
						<input type="text" name="co_pre_yrs" value="<?php echo isset($info['co_pre_yrs'])?$info['co_pre_yrs']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 67%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Nearest Relative (Not living in household)</label>
						<input type="text" name="co_nearest" value="<?php echo isset($info['co_nearest'])?$info['co_nearest']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label>Relationship</label>
						<input type="text" name="co_relation" value="<?php echo isset($info['co_relation'])?$info['co_relation']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; font-size: 16px; background-color: #ededed; border: 1px solid #000; border-top: 0px; border-bottom: 0px; box-sizing: border-box; padding: 4px 3px;"><b>Employment</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 33.5%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Present Employer Name & Address</label>
				<input type="text" name="pre_employer1" value="<?php echo isset($info['pre_employer1'])?$info['pre_employer1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16.5%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Phone Number</label>
				<input type="text" name="phone_number1" value="<?php echo isset($info['phone_number1'])?$info['phone_number1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33.5%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Present Employer Name & Address</label>
				<input type="text" name="pre_employer2" value="<?php echo isset($info['pre_employer2'])?$info['pre_employer2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16.5%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label>Phone Number</label>
				<input type="text" name="phone_number2" value="<?php echo isset($info['phone_number2'])?$info['phone_number2']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 21%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Occupation</label>
				<input type="text" name="occupation1" value="<?php echo isset($info['occupation1'])?$info['occupation1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 29%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Supervisor</label>
				<input type="text" name="supervisor1" value="<?php echo isset($info['supervisor1'])?$info['supervisor1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 21%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Occupation</label>
				<input type="text" name="occupation2" value="<?php echo isset($info['occupation2'])?$info['occupation2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 29%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label>Supervisor</label>
				<input type="text" name="supervisor2" value="<?php echo isset($info['supervisor2'])?$info['supervisor2']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 15%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Yrs. Of Service</label>
				<input type="text" name="service1" value="<?php echo isset($info['service1'])?$info['service1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="display: block;">Salary Per Month</label>
				$ <input type="text" name="salary1" value="<?php echo isset($info['salary1'])?$info['salary1']:''; ?>" style="width: 52%;">
				<label><input type="checkbox" name="gross1_check" <?php echo ($info['gross1_check'] == "gross1") ? "checked" : ""; ?> value="gross1"/> Gross</label>
				<input type="text" name="gross1" value="<?php echo isset($info['gross1'])?$info['gross1']:''; ?>" style="width: 24%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Yrs. Of Service</label>
				<input type="text" name="service2" value="<?php echo isset($info['service2'])?$info['service2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label style="display: block;">Salary Per Month</label>
				$ <input type="text" name="salary2" value="<?php echo isset($info['salary2'])?$info['salary2']:''; ?>" style="width: 52%;">
				<label><input type="checkbox" name="gross2_check" <?php echo ($info['gross2_check'] == "gross2") ? "checked" : ""; ?> value="gross2"/> Gross</label>
				<input type="text" name="gross2" value="<?php echo isset($info['gross2'])?$info['gross2']:''; ?>" style="width: 24%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 49.95%; margin: 0; padding: 4px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Alimony, child support or separate maintenance income need not be revealed. If you do not wish to have it considered as a basis of repaying this obligation.</label>
			</div>
			<div class="form-field" style="float: left; width: 31%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Other Income</label>
				$ <input type="text" name="other_income" value="<?php echo isset($info['other_income'])?$info['other_income']:''; ?>" style="width: 94%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label style="display: block;">Soure</label>
				<input type="text" name="source_info" value="<?php echo isset($info['source_info'])?$info['source_info']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 81%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Previous Employment</label>
				<input type="text" name="previous_emp" value="<?php echo isset($info['previous_emp'])?$info['previous_emp']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label style="display: block;">Years of Service</label>
				<input type="text" name="years_source" value="<?php echo isset($info['years_source'])?$info['years_source']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box;">
			<h2 style="float: left; width: 100%; margin: 0; background-color: #ededed; font-size: 16px; background-color: #ededed; padding: 3px; box-sizing: border-box; border-bottom: 1px solid #000;"><b>Housing</b></h2>
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
				<div class="form-field" style="float: left; width: 30%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="display: inline-block; width: 48%;"><input type="radio" name="housing_check" <?php echo ($info['housing_check'] == "own") ? "checked" : ""; ?> value="own"/> Own</label>
					<label style="display: inline-block; width: 48%;"><input type="radio" name="housing_check" <?php echo ($info['housing_check'] == "land") ? "checked" : ""; ?> value="land"/> Land Contract</label>
					<label style="display: inline-block; width: 48%;"><input type="radio" name="housing_check" <?php echo ($info['housing_check'] == "rent") ? "checked" : ""; ?> value="rent"/> Rent</label>
					<label style="display: inline-block; width: 48%;"><input type="radio" name="housing_check" <?php echo ($info['housing_check'] == "other") ? "checked" : ""; ?> value="other"/> Other</label>
					<label style="display: inline-block; width: 100%;"><input type="radio" name="housing_check" <?php echo ($info['housing_check'] == "live") ? "checked" : ""; ?> value="live"/> Live with Parent/Relative</label>
				</div>
				<div class="form-field" style="float: left; width: 51%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="display: block;">Name and Address</label>
					<textarea name="name_address" style="width: 94%; height: 46px; border: 0px;"><?php echo isset($info['name_address'])?$info['name_address']:'' ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 19%; margin: 0; padding: 3px; box-sizing: border-box;">
					<label style="display: block;">Monthly Payment</label>
					$ <input type="text" name="monthly_pay" value="<?php echo isset($info['monthly_pay'])?$info['monthly_pay']:''; ?>" style="width: 90%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; padding: 3px; background-color: #ededed; text-align: center; border-bottom: 0px; box-sizing: border-box;">
			<label style="width: 33%;">
				<b>Recreational Vehicle</b>
				<span style="margin: 0 3%;"><input type="radio" name="vehicle_status" <?php echo ($info['vehicle_status'] == "new") ? "checked" : ""; ?> value="new"/> New</span>
				<span><input type="radio" name="vehicle_status" <?php echo ($info['vehicle_status'] == "used") ? "checked" : ""; ?> value="used"/> Used</span>
			</label>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label style="display: block; float: left; margin-right: 3px;">Length</label>
				<input type="text" name="length" value="<?php echo isset($info['length'])?$info['length']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label><input type="checkbox" name="camper_check" <?php echo ($info['camper_check'] == "camper") ? "checked" : ""; ?> value="camper"/> Camper</label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label><input type="checkbox" name="trailer_check" <?php echo ($info['trailer_check'] == "trailer") ? "checked" : ""; ?> value="trailer"/> Trailer</label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label><input type="checkbox" name="wheel_check" <?php echo ($info['wheel_check'] == "wheel") ? "checked" : ""; ?> value="wheel"/> Fifth Wheel</label>
			</div>
			<div class="form-field" style="float: left; width: 19%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label><input type="checkbox" name="motor_check" <?php echo ($info['motor_check'] == "motor") ? "checked" : ""; ?> value="motor"/> Motor Home</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>MSRP</label>
				<input type="text" name="msrp" value="<?php echo isset($info['msrp'])?$info['msrp']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
				<label>Invoice</label>
				<input type="text" name="invoice" value="<?php echo isset($info['invoice'])?$info['invoice']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
				<label style="display: block; float: left; margin-right: 3px;">Mileage</label>
				<input type="text" name="mileage" value="<?php echo isset($info['mileage'])?$info['mileage']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; margin: 0; border-right: 1px solid #000; box-sizing: border-box;">
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 3px; box-sizing: border-box; border-bottom: 1px solid #000; background-color: #ededed;">
					<label><b>Applicant(s)</b></label>
				</div>
				<p style="float: left; width: 100%; margin: 0; font-size: 14px; box-sizing: border-box; padding: 5px; margin-bottom: 20px;">Everything I have stated in this application is true to the best of my knowledge, and is an accurate statement of my obligations and the income upon which I will rely on to pay th credit requested. I understand that you will rely on this information in deciding whether or not to grant or continue credit to me. I also understand that you will retain this information whether or my application is approved. You are authorized to check my credit and employment history and to answer questions about your credit experience with me.</p>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; margin: 0;">
						<input type="text" name="sign_app1" value="<?php echo isset($info['sign_app1'])?$info['sign_app1']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; padding: 0 3px;">
						<label style="padding: 0 3px;">Signature of Applicant</label>
					</div>
					<div class="form-field" style="float: left; width: 30%; margin: 0;">
						<input type="text" name="sign_date1" value="<?php echo isset($info['sign_date1'])?$info['sign_date1']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; padding: 0 3px;">
						<label style="padding: 0 3px;">Date</label>
					</div>
				</div>
				
				<div class="row signature" style="float: left; width: 100%; margin: 62px 0 62px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; margin: 0;">
						<input type="text" name="sign_app2" value="<?php echo isset($info['sign_app2'])?$info['sign_app2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; padding: 0 3px;">
						<label style="padding: 0 3px;">Signature of Applicant</label>
					</div>
					<div class="form-field" style="float: left; width: 30%; margin: 0; height: 55px;">
						<input type="text" name="sign_date2" value="<?php echo isset($info['sign_date2'])?$info['sign_date2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; padding: 0 3px;">
						<label style="padding: 0 3px;">Date</label>
					</div>
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; background-color: #ededed; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label><b>Trade</b></label>
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;"><b>Transitional</b></label>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Descripition of Trade-In</label>
						<input type="text" name="descrip_trade" value="<?php echo isset($info['descrip_trade'])?$info['descrip_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;">Selling Price</label>
						$ <input type="text" name="selling_price" value="<?php echo isset($info['selling_price'])?$info['selling_price']:''; ?>" style="width: 94%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Balanced Owned To:</label>
						<input type="text" name="balance_owned" value="<?php echo isset($info['balance_owned'])?$info['balance_owned']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;">Cash Down</label>
						$ <input type="text" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 94%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Trade-In Allowance</label>
						$ <input type="text" name="trade_allowance" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" style="width: 94%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;">Trade Equity</label>
						$ <input type="text" name="trade_equity1" value="<?php echo isset($info['trade_equity1'])?$info['trade_equity1']:''; ?>" style="width: 94%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Amount Owing</label>
						$ <input type="text" name="amount_owing" value="<?php echo isset($info['amount_owing'])?$info['amount_owing']:''; ?>" style="width: 94%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;">Amount to Finance</label>
						$ <input type="text" name="amount_finance" value="<?php echo isset($info['amount_finance'])?$info['amount_finance']:''; ?>" style="width: 94%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;     border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box; border-right: 1px solid #000;">
						<label>Trade Equity</label>
						$ <input type="text" name="trade_equity2" value="<?php echo isset($info['trade_equity2'])?$info['trade_equity2']:''; ?>" style="width: 94%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; padding: 3px; box-sizing: border-box;">
						<label style="display: block;">Term Requested</label>
						<input type="text" name="term_requested" value="<?php echo isset($info['term_requested'])?$info['term_requested']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<p style="padding: 3px;">If this application is for joint credit complete all sections for the applicant and the co-applicant and acknowledge below</p>
					<p style="padding: 3px;">We intend to apply for joint credit.</p>

					<div class="form-field" style="float: left; width: 49%; margin: 0;">
						<input type="text" name="sign_app2" value="<?php 	echo isset($info['sign_app2'])?$info['sign_app2']:''; ?>" style="width: 98%; border-bottom: 1px solid #000; padding: 0 3px; float: right;">
						<label style="padding: 0 3px;">Applicant Signature</label>
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0; height: 55px;">
						<input type="text" name="sign_date2" value="<?php echo isset($info['sign_date2'])?$info['sign_date2']:''; ?>" style="width: 98%; border-bottom: 1px solid #000; padding: 0 3px;float: right;">
						<label style="padding: 0 3px;">Co-Applicant Signature</label>
					</div>
				</div>
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
