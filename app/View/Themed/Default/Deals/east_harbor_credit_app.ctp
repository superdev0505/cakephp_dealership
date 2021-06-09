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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td, th{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 1%;}
	.right td{text-align: center; padding: 3px 6px 3px }
	
	
	
@media print {
	.right td{padding: 3px 6px 4px!imporatnt;}
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="float: right; width: 300px; margin-bottom: 10px;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/east-harbor.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<h2 class="bg1" style="float: left; color: #fff; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; background-color: #818181; font-size: 18px; border: 1px solid #000; border-bottom: 0px;">APPLICATION</h2>
		<h2 class="bg2" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px; border: 1px solid #000;">BUSINESS & CUSTOMER INFORMATION</h2>
		<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 2px; border-left: 1px solid #000; border-right: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Name of Salesperson?</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Business Name</label>
				<input type="text" name="business_name" value="<?php echo isset($info['business_name'])?$info['business_name']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px;">
				<label>Yrs. In Business</label>
				<input type="text" name="yrs" value="<?php echo isset($info['yrs'])?$info['yrs']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Business Address</label>
				<input type="text" name="business_address" value="<?php echo isset($info['business_address'])?$info['business_address']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="business_city" value="<?php echo isset($info['business_city'])?$info['business_city']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px;">
				<label>State</label>
				<input type="text" name="business_state" value="<?php echo isset($info['business_state'])?$info['business_state']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px;">Principal Buyer 1</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Principal’s Name (As It Appears On Driver’s License)</label>
				<input type="text" name="pricipal_name1" value="<?php echo isset($info['pricipal_name1']) ? $info['pricipal_name1'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Social Security Number</label>
				<input type="text" name="social_num1" value="<?php echo isset($info['social_num1'])?$info['social_num1']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px;">
				<label>Date Of Birth</label>
				<input type="text" name="date_birth1" value="<?php echo isset($info['date_birth1'])?$info['date_birth1']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Home Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px;">
				<label>Zip Code</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label><input type="radio" name="own_check" <?php echo ($info['own_check'] == "own") ? "checked" : ""; ?> value="own"/> Own</label>
				<label style="margin: 0 4%;"><input type="radio" name="rent_check" <?php echo ($info['rent_check'] == "rent") ? "checked" : ""; ?> value="rent"/> Rent</label>
				<label>(Please circle)</label>
				<input type="text" name="own" value="<?php echo isset($info['own'])?$info['own']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 0 2px;">
				<label>Years at Address</label>
				<input type="text" name="years" value="<?php echo isset($info['years'])?$info['years']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>E-mail Address</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label style="display: block;">Marital Status (Circle One)</label>
				<label><input type="radio" name="marital_check" <?php echo ($info['marital_check'] == "single") ? "checked" : ""; ?> value="single"/> Single</label>
				<label style="margin: 0 4%;"><input type="radio" name="married_check" <?php echo ($info['married_check'] == "married") ? "checked" : ""; ?> value="married"/> Married</label>
				<label style="margin: 0 4%;"><input type="radio" name="divorced_check" <?php echo ($info['divorced_check'] == "divorced") ? "checked" : ""; ?> value="divorced"/> Divorced</label>
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Spouse’s Name</label>
				<input type="text" name="spouse" value="<?php echo isset($info['spouse'])?$info['spouse']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px;">
				<label>Spouse’s Mobile</label>
				<input type="text" name="spouse_mobile" value="<?php echo isset($info['spouse_mobile'])?$info['spouse_mobile']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px;">Principal Buyer 2</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Principal 2 Name (As It Appears On Driver’s License)</label>
				<input type="text" name="pricipal_name2" value="<?php echo isset($info['pricipal_name2'])?$info['pricipal_name2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Social Security Number</label>
				<input type="text" name="social_num2" value="<?php echo isset($info['social_num2'])?$info['social_num2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 2px;">
				<label>Date Of Birth</label>
				<input type="text" name="date_birth2" value="<?php echo isset($info['date_birth2'])?$info['date_birth2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Home Address</label>
				<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>State</label>
				<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px;">
				<label>Zip Code</label>
				<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label><input type="radio" name="own2_check" <?php echo ($info['own2_check'] == "own") ? "checked" : ""; ?> value="own"/> Own</label>
				<label style="margin: 0 4%;"><input type="radio" name="rent2_check" <?php echo ($info['rent2_check'] == "rent") ? "checked" : ""; ?> value="rent"/> Rent</label>
				<label>(Please circle)</label>
				<input type="text" name="own2" value="<?php echo isset($info['own2'])?$info['own2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Years at Address</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Preferred Phone</label>
				<input type="text" name="preferred_phone" value="<?php echo isset($info['preferred_phone'])?$info['preferred_phone']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 2px;">
				<label>% Ownership</label>
				<input type="text" name="ownership" value="<?php echo isset($info['ownership'])?$info['ownership']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px; text-align: center;">EXPERIENCE</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>#Of Yrs. With CDL</label>
				<input type="text" name="cdl_yrs" value="<?php echo isset($info['cdl_yrs'])?$info['cdl_yrs']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label># Of Yrs. As O/O</label>
				<input type="text" name="as_yrs" value="<?php echo isset($info['as_yrs'])?$info['as_yrs']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px; text-align: center;">TRUCK/EQUIPMENT USAGE</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<span style="float: left; width: 40%; display: block;">
					<label style="display: block;">Will Purchaser Be Driving This Truck?</label>
					<label><input type="radio" name="truck_check" <?php echo ($info['truck_check'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
					<label style="margin: 0 4%;"><input type="radio" name="truck_check" <?php echo ($info['truck_check'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label>
					<label>If No, Provide Driver Information ->
						<input type="text" name="driver_info" value="<?php echo isset($info['driver_info'])?$info['driver_info']:''; ?>" style="width: 40%; background-color: #fgfgfg;"></label>
				</span>
				<input type="text" name="driver_info" value="<?php echo isset($info['driver_info'])?$info['driver_info']:''; ?>" style="width: 60%; float: right; background-color: #fgfgfg;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 5px 2px; background-color: #dadada; font-size: 16px; text-align: center;">PERSONAL INFO</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>Does Truck Appraise?</label>
				<input type="text" name="truck_appr" value="<?php echo isset($info['truck_appr'])?$info['truck_appr']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Credit (What Is An Estimate of Your credit Score?) If Low Explain Why</label>
				<input type="text" name="credit_score" value="<?php echo isset($info['credit_score'])?$info['credit_score']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>Type Of Truck / Make / Model / Year / Mileage / Max Down Payment</label>
				<input type="text" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Additional Collateral? (Equipment, Trucks, Cars, Real Estate, Jewelry, etc.)</label>
				<input type="text" name="collateral" value="<?php echo isset($info['collateral'])?$info['collateral']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>What Is the Largest Loan On Your Credit?</label>
				<input type="text" name="loan" value="<?php echo isset($info['loan'])?$info['loan']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>What Is Your Gross On The Last 2 Years 1099 Tax Returns?</label>
				<input type="text" name="gross" value="<?php echo isset($info['gross'])?$info['gross']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>Average Balance? Last 3 Months Bank Statements?</label>
				<input type="text" name="average_balance" value="<?php echo isset($info['average_balance'])?$info['average_balance']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Bankruptcies? (If Yes, Dismissed or Open?)</label>
				<input type="text" name="bankrupt" value="<?php echo isset($info['bankrupt'])?$info['bankrupt']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>Is This Your First Truck Purchase?</label>
				<input type="text" name="purchase" value="<?php echo isset($info['purchase'])?$info['purchase']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>How Many Trucks Do You Operate?</label>
				<input type="text" name="trucks" value="<?php echo isset($info['trucks'])?$info['trucks']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label style="display: block;">Term Desired?</label>
				<label>12 Months<input type="radio" name="term_check" <?php echo ($info['term_check'] == "12month") ? "checked" : ""; ?> value="12month" style="margin-left: 5px;"></label>
				<label style="margin: 0 2%;">24 Months<input type="radio" name="term_check" <?php echo ($info['term_check'] == "24month") ? "checked" : ""; ?> value="24month" style="margin-left: 5px;"></label>
				<label>36 Months<input type="radio" name="term_check" <?php echo ($info['term_check'] == "36month") ? "checked" : ""; ?> value="36month" style="margin-left: 5px;"></label>
				<label style="margin: 0 2%;">48 Months<input type="radio" name="term_check" <?php echo ($info['term_check'] == "48month") ? "checked" : ""; ?> value="48month" style="margin-left: 5px;"></label>
				<label>60 Months<input type="radio" name="term_check" <?php echo ($info['term_check'] == "60month") ? "checked" : ""; ?> value="60month" style="margin-left: 5px;"></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Desired Monthly Payment</label>
				<input type="text" name="desired" value="<?php echo isset($info['desired'])?$info['desired']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>Child Support? (Delinquent?)</label>
				<input type="text" name="support" value="<?php echo isset($info['support'])?$info['support']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px; border-right: 1px solid #000;">
				<label>Ever Had Vehicle Repossession?</label>
				<input type="text" name="repossession" value="<?php echo isset($info['repossession'])?$info['repossession']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 2px;">
				<label>What City Will The Truck Be Working In?</label>
				<input type="text" name="truck_post" value="<?php echo isset($info['truck_post'])?$info['truck_post']:''; ?>" style="width: 100%; background-color: #fgfgfg;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; font-size: 15px; margin: 13 px 0; text-decoration: underline;"><a href="#">PLEASE ATTACH INVOICE</a></p>
		
		
		
		<div class="second-page" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="float: right; width: 300px; margin-bottom: 10px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/east-harbor.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box; padding: 20px 2px; background-color: #dadada; font-size: 16px; text-align: center;">SIGNATURES</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0; padding: 7px; box-sizing: border-box; border: 1px solid #000;">
			<p style="float: left; width: 100%; margin: 0; font-size: 14px;">The undersigned acknowledges the statements on this application are true, correct and accurate to the best of my knowledge, and the information contained herein may be used by the bank, lender or leasing company/broker, to make credit decisions. The undersigned authorizes the bank, lender or leasing company/broker and its affiliates to obtain any consumer and/or business information from banks, credit unions, as well as other credit reporting services, and authorizes them to furnish such information to the lending institution. The undersigned acknowledges that this signed application is an application for credit only, and the final terms of the financing agreement will be based on the documents themselves. No commitment or guarantee to lend exists until the Applicant/Joint Applicant(s) receives such approval in writing</p>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px;">
					<label>APPLICANT (PRINT)</label>
					<input type="text" name="applicant_print" value="<?php echo isset($info['applicant_print'])?$info['applicant_print']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 0 2px;">
					<label>SIGNATURE</label>
					<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 69%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 0 2px;">
					<label>Date</label>
					<input type="text" name="signature_date" value="<?php echo isset($info['signature_date'])?$info['signature_date']:''; ?>" style="width: 48%; border-bottom: 1px solid #000;">
				
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 2px;">
					<label>CO - APPLICANT (PRINT)</label>
					<input type="text" name="co_applicant_print" value="<?php echo isset($info['co_applicant_print'])?$info['co_applicant_print']:''; ?>" style="width: 52%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 0 2px;">
					<label>SIGNATURE</label>
					<input type="text" name="co_sign" value="<?php echo isset($info['co_sign'])?$info['co_sign']:''; ?>" style="width: 69%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 0 2px;">
					<label>Date</label>
					<input type="text" name="co_sign_date" value="<?php echo isset($info['co_sign_date'])?$info['co_sign_date']:''; ?>" style="width: 48%; border-bottom: 1px solid #000;">
					
				</div>
			</div>
		</div>
		
		
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 14px; text-align: center; text-decoration: underline; margin: 200px 0 0;">Internal Use Only</h2>
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<div class="form-field" style="float: left; width; 100%; margin: 0;">
					<p style="font-size: 14px; margin: 3px 0; ">Does Application Pass Test<p>
					<p style="font-size: 14px; margin: 3px 0; ">
						<b>-  Down Payment</b> (meet the required amount?)
						<span style="display: block; float: right; width: 25%;">
							<label>initial</label>
							<input type="text" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</span>
					<p>
					<p style="font-size: 14px; margin: 3px 0; ">
						<b>- Collateral</b> (devaluation, re-marketability)
						<span style="display: block; float: right; width: 25%;">
							<label>initial</label>
							<input type="text" name="collateral" value="<?php echo isset($info['collateral'])?$info['collateral']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</span>
					<p>
					<p style="font-size: 14px; margin: 3px 0; ">
						<b>- Appraisal</b> (does it pass?)
						<span style="display: block; float: right; width: 25%;">
							<label>initial</label>
							<input type="text" name="appraisal " value="<?php echo isset($info['appraisal'])?$info['appraisal']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</span>
					<p>
					<p style="font-size: 14px; margin: 3px 0; ">
						<b>- Case Scenario Test</b> (does it pass?)
						<span style="display: block; float: right; width: 25%;">
							<label>initial</label>
							<input type="text" name="scenario " value="<?php echo isset($info['scenario'])?$info['scenario']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</span>
					<p>
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<label>Finance Specialist Recommendation:</label>
					<textarea id="note" name="note" style="width: 100%; height: 68px; box-sizing: border-box; border: 0px;"><?php echo isset($info['note'])?$info['note']:'' ?></textarea>
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
