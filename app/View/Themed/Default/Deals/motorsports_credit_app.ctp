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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	/*td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}*/
	td{padding: 10px;}
	.right td{padding: 25px 10px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 28px; text-align: center;"><b>CREDIT APPLICATION</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<h2 style="float: left; width: 100%; margin: 0; padding: 4px; box-sizing: border-box; font-size: 17px; text-align: center;"><b>Applicant</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>First Name:</label>
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Middle:</label>
				<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px;">
				<label>Last Name:</label>
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:'';  ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:'';  ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:'';  ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:'';  ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>County:</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Years:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Own <input type="checkbox" name="own_check" <?php echo ($info['own_check'] == "own") ? "checked" : ""; ?> value="own"/></label>
				<label>Rent <input type="checkbox" name="rent_check" <?php echo ($info['rent_check'] == "rent") ? "checked" : ""; ?> value="rent"/></label>
				<label>Other <input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other"/></label>
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 3px;">
				<label>Monthly Payment:</label>
				<input type="text" name="monthly_pay" value="<?php echo isset($info['monthly_pay']) ? $info['monthly_pay'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Previous Address:</label>
				<input type="text" name="pre_address" value="<?php echo isset($info['pre_address']) ? $info['pre_address'] : "" ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city1" value="<?php echo isset($info['city1']) ? $info['city1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state1" value="<?php echo isset($info['state1']) ? $info['state1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="zip1" value="<?php echo isset($info['zip1']) ? $info['zip1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>Years:</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1']) ? $info['year1'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>D/L Number:</label>
				<input type="text" name="dl_number" value="<?php echo isset($info['dl_number']) ? $info['dl_number'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Birth Date:</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Iss. Date:</label>
				<input type="text" name="iss_date" value="<?php echo isset($info['iss_date']) ? $info['iss_date'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>Exp. Date:</label>
				<input type="text" name="exp_date" value="<?php echo isset($info['exp_date']) ? $info['exp_date'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Married:</label>
				<label>Y <input type="radio" name="married_check" value="yes" <?php echo (isset($info['married_check']) && $info['married_check']=='yes')?'checked="checked"':''; ?> /></label> / 
				<label>N <input type="radio" name="married_check" value="no" <?php echo (isset($info['married_check']) && $info['married_check']=='no')?'checked="checked"':''; ?> /></label>
			</div>
			<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px 3px;">
				<label>Social Security Number:</label>
				<input type="text" name="security_num" value="<?php echo isset($info['security_num']) ? $info['security_num'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Current Employer:</label>
				<input type="text" name="current_emp" value="<?php echo isset($info['current_emp']) ? $info['current_emp'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Position:</label>
				<input type="text" name="current_postion" value="<?php echo isset($info['current_postion']) ? $info['current_postion'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Employer Address:</label>
				<input type="text" name="emp_address" value="<?php echo isset($info['emp_address']) ? $info['emp_address'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city3" value="<?php echo isset($info['city3']) ? $info['city3'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 24%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state3" value="<?php echo isset($info['state3']) ? $info['state3'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px;">
				<label>Zip:</label>
				<input type="text" name="zip3" value="<?php echo isset($info['zip3']) ? $info['zip3'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Employer Phone:</label>
				<input type="text" name="emp_phone" value="<?php echo isset($info['emp_phone']) ? $info['emp_phone'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>How long Years:</label>
				<input type="text" name="how_long1" value="<?php echo isset($info['how_long1']) ? $info['how_long1'] : "" ?>" style="width: 30%;">
				<label> Months:</label>
				<input type="text" name="how_month" value="<?php echo isset($info['how_month']) ? $info['how_month'] : "" ?>" style="width: 22%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>Monthly Gross:</label>
				<input type="text" name="monthly_gross" value="<?php echo isset($info['monthly_gross']) ? $info['monthly_gross'] : "" ?>" style="width: 50%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Previous Employer:</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer']) ? $info['pre_employer'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Position:</label>
				<input type="text" name="pre_position" value="<?php echo isset($info['pre_position']) ? $info['pre_position'] : "" ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>How Long Years:</label>
				<input type="text" name="how_long2" value="<?php echo isset($info['how_long2']) ? $info['how_long2'] : "" ?>" style="width: 50%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Additional Income:</label>
				<input type="text" name="addition_income" value="<?php echo isset($info['addition_income']) ? $info['addition_income'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Source:</label>
				<input type="text" name="source" value="<?php echo isset($info['source']) ? $info['source'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Closest relative not at same Add:</label>
				<input type="text" name="closest_relative" value="<?php echo isset($info['closest_relative']) ? $info['closest_relative'] : "" ?>" style="width: 36%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>First Name:</label>
				<input type="text" name="first_name1" value="<?php echo isset($info['first_name1']) ? $info['first_name1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px 3px;">
				<label>Last Name:</label>
				<input type="text" name="last_name1" value="<?php echo isset($info['last_name1']) ? $info['last_name1'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Address:</label>
				<input type="text" name="current_address" value="<?php echo isset($info['current_address']) ? $info['current_address'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city4" value="<?php echo isset($info['city4']) ? $info['city4'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state4" value="<?php echo isset($info['state4']) ? $info['state4'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="zip4" value="<?php echo isset($info['zip4']) ? $info['zip4'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>Phone:</label>
				<input type="text" name="phone4" value="<?php echo isset($info['phone4']) ? $info['phone4'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 10px; border: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Relationship to You:</label>
				<input type="text" name="relationship" value="<?php echo isset($info['relationship']) ? $info['relationship'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Your Primary Bank:</label>
				<input type="text" name="primary_bank" value="<?php echo isset($info['primary_bank']) ? $info['primary_bank'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<h2 style="float: left; width: 100%; margin: 0; padding: 4px; box-sizing: border-box; font-size: 17px; text-align: center;"><b>Co - Applicant</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>First Name:</label>
				<input type="text" name="co_first_name" value="<?php echo isset($info['co_first_name']) ? $info['co_first_name'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Middle:</label>
				<input type="text" name="co_middle_name" value="<?php echo isset($info['co_middle_name']) ? $info['co_middle_name'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px;">
				<label>Last Name:</label>
				<input type="text" name="co_last_name" value="<?php echo isset($info['co_last_name']) ? $info['co_last_name'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Address:</label>
				<input type="text" name="co_current_address" value="<?php echo isset($info['co_current_address']) ? $info['co_current_address'] : "" ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="co_city" value="<?php echo isset($info['co_city']) ? $info['co_city'] : "" ?>" style="width: 70%;">
			</div>	
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="co_state" value="<?php echo isset($info['co_state']) ? $info['co_state'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="co_zip" value="<?php echo isset($info['co_zip']) ? $info['co_zip'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>County:</label>
				<input type="text" name="co_country" value="<?php echo isset($info['co_country']) ? $info['co_country'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Phone:</label>
				<input type="text" name="co_phone" value="<?php echo isset($info['co_phone']) ? $info['co_phone'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="co_year" value="<?php echo isset($info['co_year']) ? $info['co_year'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Own <input type="checkbox" name="co_own_check" <?php echo ($info['co_own_check'] == "co_own") ? "checked" : ""; ?> value="co_own"/></label>
				<label>Rent <input type="checkbox" name="co_rent_check" <?php echo ($info['co_rent_check'] == "co_rent") ? "checked" : ""; ?> value="co_rent"/></label>
				<label>Other <input type="checkbox" name="co_other_check" <?php echo ($info['co_other_check'] == "co_other") ? "checked" : ""; ?> value="co_other"/></label>
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 3px;">
				<label>Monthly Payment:</label>
				<input type="text" name="co_monthly_pay" value="<?php echo isset($info['co_monthly_pay']) ? $info['co_monthly_pay'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Previous Address:</label>
				<input type="text" name="co_pre_address" value="<?php echo isset($info['co_pre_address']) ? $info['co_pre_address'] : "" ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="co_city1" value="<?php echo isset($info['co_city1']) ? $info['co_city1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="co_state1" value="<?php echo isset($info['co_state1']) ? $info['co_state1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="co_zip1" value="<?php echo isset($info['co_zip1']) ? $info['co_zip1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>Years:</label>
				<input type="text" name="co_years1" value="<?php echo isset($info['co_years1']) ? $info['co_years1'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>D/L Number:</label>
				<input type="text" name="co_dl_number" value="<?php echo isset($info['co_dl_number']) ? $info['co_dl_number'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Birth Date:</label>
				<input type="text" name="co_dob" value="<?php echo isset($info['co_dob']) ? $info['co_dob'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Iss. Date:</label>
				<input type="text" name="co_iss_date" value="<?php echo isset($info['co_iss_date']) ? $info['co_iss_date'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px;">
				<label>Exp. Date:</label>
				<input type="text" name="co_exp_date" value="<?php echo isset($info['co_exp_date']) ? $info['co_exp_date'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Married:</label>
				<label>Y <input type="radio" name="co_married_check" <?php echo ($info['co_married_check'] == "yes") ? "checked" : ""; ?> value="yes"/></label> / 
				<label>N <input type="radio" name="co_married_check" <?php echo ($info['co_married_check'] == "no") ? "checked" : ""; ?> value="no"/></label>
			</div>
			<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px 3px;">
				<label>Social Security Number:</label>
				<input type="text" name="co_security_num" value="<?php echo isset($info['co_security_num']) ? $info['co_security_num'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Current Employer:</label>
				<input type="text" name="co_current_emp" value="<?php echo isset($info['co_current_emp']) ? $info['co_current_emp'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Position:</label>
				<input type="text" name="co_current_position" value="<?php echo isset($info['co_current_position']) ? $info['co_current_position'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Employer Address:</label>
				<input type="text" name="co_emp_address" value="<?php echo isset($info['co_emp_address']) ? $info['co_emp_address'] : "" ?>" style="width: 65%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="co_city2" value="<?php echo isset($info['co_city2']) ? $info['co_city2'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 24%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="co_state2" value="<?php echo isset($info['co_state2']) ? $info['co_state2'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px;">
				<label>Zip:</label>
				<input type="text" name="co_zip2" value="<?php echo isset($info['co_zip2']) ? $info['co_zip2'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Employer Phone:</label>
				<input type="text" name="co_emp_phone" value="<?php echo isset($info['co_emp_phone']) ? $info['co_emp_phone'] : "" ?>" style="width: 66%;">
			</div>
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>How long Years:</label>
				<input type="text" name="co_long_year1" value="<?php echo isset($info['co_long_year1']) ? $info['co_long_year1'] : "" ?>" style="width: 30%;">
				<label> Months:</label>
				<input type="text" name="co_month" value="<?php echo isset($info['co_month']) ? $info['co_month'] : "" ?>" style="width: 22%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>Monthly Gross:</label>
				<input type="text" name="co_monthly_gross" value="<?php echo isset($info['co_monthly_gross']) ? $info['co_monthly_gross'] : "" ?>" style="width: 50%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Previous Employer:</label>
				<input type="text" name="co_pre_emp" value="<?php echo isset($info['co_pre_emp']) ? $info['co_pre_emp'] : "" ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Position:</label>
				<input type="text" name="co_position" value="<?php echo isset($info['co_position']) ? $info['co_position'] : "" ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>How Long Years:</label>
				<input type="text" name="co_long_year2" value="<?php echo isset($info['co_long_year2']) ? $info['co_long_year2'] : "" ?>" style="width: 50%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Additional Income:</label>
				<input type="text" name="co_additional_income" value="<?php echo isset($info['co_additional_income']) ? $info['co_additional_income'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Source:</label>
				<input type="text" name="co_source" value="<?php echo isset($info['co_source']) ? $info['co_source'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Closest relative not at same Add:</label>
				<input type="text" name="co_relative" value="<?php echo isset($info['co_relative']) ? $info['co_relative'] : "" ?>" style="width: 36%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>First Name:</label>
				<input type="text" name="co_first_name1" value="<?php echo isset($info['co_first_name1']) ? $info['co_first_name1'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px 3px;">
				<label>Last Name:</label>
				<input type="text" name="co_last_name1" value="<?php echo isset($info['co_last_name1']) ? $info['co_last_name1'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px 3px;">
				<label>Current Address:</label>
				<input type="text" name="co_current_address" value="<?php echo isset($info['co_current_address']) ? $info['co_current_address'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="co_city3" value="<?php echo isset($info['co_city3']) ? $info['co_city3'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="co_state3" value="<?php echo isset($info['co_state3']) ? $info['co_state3'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Zip:</label>
				<input type="text" name="co_zip3" value="<?php echo isset($info['co_zip3']) ? $info['co_zip3'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px 3px;">
				<label>Phone:</label>
				<input type="text" name="co_phone3" value="<?php echo isset($info['co_phone3']) ? $info['co_phone3'] : "" ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 10px; border: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
				<label>Relationship to You:</label>
				<input type="text" name="co_relationship" value="<?php echo isset($info['co_relationship']) ? $info['co_relationship'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px;">
				<label>Your Primary Bank:</label>
				<input type="text" name="co_primary" value="<?php echo isset($info['co_primary']) ? $info['co_primary'] : "" ?>" style="width: 70%;">
			</div>
		</div>

			
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Applicant Signature:</label>
				<input type="text" name="app_sign" value="<?php echo isset($info['app_sign']) ? $info['app_sign'] : "" ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date:</label>
				<input type="text" name="app_date" value="<?php echo isset($info['app_date']) ? $info['app_date'] : "" ?>" style="width: 87%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Co-Applicant Signature:</label>
				<input type="text" name="co_app_sign" value="<?php echo isset($info['co_app_sign']) ? $info['co_app_sign'] : "" ?>" style="width: 77%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date:</label>
				<input type="text" name="co_app_date" value="<?php echo isset($info['co_app_date']) ? $info['co_app_date'] : "" ?>" style="width: 87%; border-bottom: 1px solid #000;">
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
