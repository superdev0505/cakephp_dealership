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
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{font-size: 14px;}
	td, th{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; text-align: center;}
	th:last-child {border-right: 0px;}
	td:last-child {border-right: 0px;}
	.detail-form td:first-child, .detail-form th:first-child{border-bottom: 0px;}
	table input[type="text"]{border-bottom: 0px solid #000; text-align: center;}
	.wraper.main input {padding: 0px;}
	
@media print {
	input[type="text"]{padding: 0px;}
	.dontprint{display: none;}
	
	.row {margin: 1px 0 !important;}
	.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="text" style="float: left; width: 30%;">
				<b>APPLICANT INFORMATION</b>
			</div>
			<div class="form-field" style="float: left; width: 70%;">
				<label style="margin: 0 3%; font-size: 15px;"><input type="checkbox"> CONSUMER/PERSONAL/HOUSEHOLD USE</label>
				<label style="font-size: 15px;"><input type="checkbox"> BUSINESS/COMMERCIAL USE</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 29%;">
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 100%;">
				<label>FIRST NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 29%; margin: 0 1%;">
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 100%;">
				<label>LAST NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 29%;">
				<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 100%;">
				<label>MIDDLE NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 0 0 1%;">
				<input type="text" name="jr_sr" value="<?php echo isset($info['jr_sr'])?$info['jr_sr']:''; ?>" style="width: 100%;">
				<label>JR/SR</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 32%;">
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
				<label>PRESENT STREET ADDRESS (NOT P.O BOX)</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="apt" value="<?php echo isset($info['apt'])?$info['apt']:''; ?>" style="width: 100%;">
				<label>APT #</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; ">
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; margin: 0 0 0 1%;">
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
				<label>HOW LONG? YEARS</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 17%;">
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
				<label>HOME TELEPHONE</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0 1%;">
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
				<label>CELL PHONE</label>
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<input type="text" name="social" value="<?php echo isset($info['social'])?$info['social']:''; ?>" style="width: 100%;">
				<label>SOCIAL SECURITY #</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;">
				<label>BIRTH DATE</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label style="margin: 0 1%;"><input type="checkbox" name="own_buy" value="ownbuying" <?php echo ($info['own_buy'] == "ownbuying") ? "checked" : ""; ?> />OWNBUYING</label>
				<label style="width: 50%;"><input type="checkbox" name="rent_free" value="rent_free" <?php echo ($info['rent_free'] == "rent_free") ? "checked" : ""; ?> /> RENT FREE</label>
				<label style="margin: 0 1%;"><input type="checkbox" name="rent" value="rent" <?php echo ($info['rent'] == "rent") ? "checked" : ""; ?> />RENT</label>
				<label><input type="checkbox" name="other" value="other" <?php echo ($info['other'] == "other") ? "checked" : ""; ?> />OTHER</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 36%;">
				<input type="text" name="mail" value="<?php echo isset($info['mail'])?$info['mail']:''; ?>" style="width: 100%;">
				<label>MAILING ADDRESS IF DIFFERENT FROM ABOVE</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="api1" value="<?php echo isset($info['api1'])?$info['api1']:''; ?>" style="width: 100%;">
				<label>APT #</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city1" value="<?php echo isset($info['city1'])?$info['city1']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="state1" value="<?php echo isset($info['state1'])?$info['state1']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; ">
				<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%;">
				<label>EMAIL ADDRESS</label>
			</div>
		</div>
		
		<div class="row employment" style="float: left; width: 100%; margin: 4px 0;">
			<label><b>EMPLOYMENT INFORMATION - SELF EMPLOYMENT</b></label>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="width: 100%;">
				<label>CURRENT EMPLOYER (IF SELF EMPLOYED, BUSINESS NAME)</label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 0 1%;">
				<input type="text" name="business_telep" value="<?php echo isset($info['business_telep'])?$info['business_telep']:''; ?>" style="width: 100%;">
				<label>BUSINESS TELEPHONE NUMBER</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<input type="text" name="employer_address" value="<?php echo isset($info['employer_address'])?$info['employer_address']:''; ?>" style="width: 100%;">
				<label>EMPLOYER ADDRESS</label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0 1%;">
				<input type="text" name="yr1" value="<?php echo isset($info['yr1'])?$info['yr1']:''; ?>" style="width: 100%;">
				<label>HOW LONG? YRS. MOS</label>
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<input type="text" name="gross" value="<?php echo isset($info['gross'])?$info['gross']:''; ?>" style="width: 100%;">
				<label>GROSS MONTHLY INCOME FROM ALL SOURCES</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 14%; ">
				<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
			<div class="form-field" style="float: left; width: 47%; margin: 0 0 0 1%;">
				<input type="text" name="postive" value="<?php echo isset($info['postive'])?$info['postive']:''; ?>" style="width: 100%;">
				<label>POSTIVE/TITLE</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<input type="text" name="nearest" value="<?php echo isset($info['nearest'])?$info['nearest']:''; ?>" style="width: 100%;">
				<label>NAME OF THE NEAREST RELATIVE NOT LIVING WITH YOU</label>
			</div>
			<div class="form-field" style="float: left; width: 29%; margin: 0 0 0 1%;">
				<input type="text" name="tele_num" value="<?php echo isset($info['tele_num'])?$info['tele_num']:''; ?>" style="width: 100%;">
				<label>TELEPHONE NUMBER</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city3" value="<?php echo isset($info['city3'])?$info['city3']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="state3" value="<?php echo isset($info['state3'])?$info['state3']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 14%; ">
				<input type="text" name="zip3" value="<?php echo isset($info['zip3'])?$info['zip3']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
		</div>
		
		<div class="row top-margin" style="float: left; width: 100%; margin: 4px 0;">
			<div class="text" style="float: left; width: 30%; margin: 10px 0;">
				<b>JOINT APPLICANT INFORMATION</b>
			</div>
			<div class="form-field" style="float: left; width: 70%;">
				<label style="font-size: 15px;">An additional card will be issued to you. The primary card holder (and joint applicant, if any) will be jointly and severally liable for all purchases made and all amounts due on the account.</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 29%;">
				<input type="text" name="first_name1" value="<?php echo isset($info['first_name1'])?$info['first_name1']:''; ?>" style="width: 100%;">
				<label>FIRST NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 29%; margin: 0 1%;">
				<input type="text" name="last_name1" value="<?php echo isset($info['last_name1'])?$info['last_name1']:''; ?>" style="width: 100%;">
				<label>LAST NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 29%;">
				<input type="text" name="middle_name1" value="<?php echo isset($info['middle_name1'])?$info['middle_name1']:''; ?>" style="width: 100%;">
				<label>MIDDLE NAME</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 0 0 1%;">
				<input type="text" name="js_sr1" value="<?php echo isset($info['js_sr1'])?$info['js_sr1']:''; ?>" style="width: 100%;">
				<label>JR/SR</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 32%;">
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 100%;">
				<label>PRESENT STREET ADDRESS (NOT P.O BOX)</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="apt1" value="<?php echo isset($info['apt1'])?$info['apt1']:''; ?>" style="width: 100%;">
				<label>APT #</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city4" value="<?php echo isset($info['city4'])?$info['city4']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="state4" value="<?php echo isset($info['state4'])?$info['state4']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; ">
				<input type="text" name="zip4" value="<?php echo isset($info['zip4'])?$info['zip4']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; margin: 0 0 0 1%;">
				<input type="text" name="year4" value="<?php echo isset($info['year4'])?$info['year4']:''; ?>" style="width: 100%;">
				<label>YEARS</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 17%;">
				<input type="text" name="home_telep" value="<?php echo isset($info['home_telep'])?$info['home_telep']:''; ?>" style="width: 100%;">
				<label>HOME TELEPHONE</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0 1%;">
				<input type="text" name="cell_telep" value="<?php echo isset($info['cell_telep'])?$info['cell_telep']:''; ?>" style="width: 100%;">
				<label>CELL PHONE</label>
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<input type="text" name="social1" value="<?php echo isset($info['social1'])?$info['social1']:''; ?>" style="width: 100%;">
				<label>SOCIAL SECURITY #</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0 1%;">
				<input type="text" name="dob1" value="<?php echo isset($info['dob1'])?$info['dob1']:''; ?>" style="width: 100%;">
				<label>BIRTH DATE</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 36%;">
				<input type="text" name="mail1" value="<?php echo isset($info['mail1'])?$info['mail1']:''; ?>" style="width: 100%;">
				<label>MAILING ADDRESS IF DIFFERENT FROM ABOVE</label>
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 0 1%;">
				<input type="text" name="api2" value="<?php echo isset($info['api2'])?$info['api2']:''; ?>" style="width: 100%;">
				<label>APT #</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city5" value="<?php echo isset($info['city5'])?$info['city5']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="state5" value="<?php echo isset($info['state5'])?$info['state5']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; ">
				<input type="text" name="zip5" value="<?php echo isset($info['zip5'])?$info['zip5']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<label><b>EMPLOYMENT INFORMATION - SELF EMPLOYMENT</b></label>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<input type="text" name="current_employer" value="<?php echo isset($info['current_employer'])?$info['current_employer']:''; ?>" style="width: 100%;">
				<label>CURRENT EMPLOYER (IF SELF EMPLOYED, BUSINESS NAME)</label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 0 1%;">
				<input type="text" name="business_telep1" value="<?php echo isset($info['business_telep1'])?$info['business_telep1']:''; ?>" style="width: 100%;">
				<label>BUSINESS TELEPHONE NUMBER</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<input type="text" name="employer_address1" value="<?php echo isset($info['employer_address1'])?$info['employer_address1']:''; ?>" style="width: 100%;">
				<label>EMPLOYER ADDRESS</label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0 1%;">
				<input type="text" name="yrs1" value="<?php echo isset($info['yrs1'])?$info['yrs1']:''; ?>" style="width: 100%;">
				<label>HOW LONG? YRS. MOS</label>
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<input type="text" name="gross1" value="<?php echo isset($info['gross1'])?$info['gross1']:''; ?>" style="width: 100%;">
				<label>GROSS MONTHLY INCOME FROM ALL SOURCES</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<input type="text" name="city6" value="<?php echo isset($info['city6'])?$info['city6']:''; ?>" style="width: 100%;">
				<label>CITY</label>
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0 1%;">
				<input type="text" name="state6" value="<?php echo isset($info['state6'])?$info['state6']:''; ?>" style="width: 100%;">
				<label>STATE</label>
			</div>
			<div class="form-field" style="float: left; width: 14%; ">
				<input type="text" name="zip6" value="<?php echo isset($info['zip6'])?$info['zip6']:''; ?>" style="width: 100%;">
				<label>ZIP CODE</label>
			</div>
			<div class="form-field" style="float: left; width: 47%; margin: 0 0 0 1%;">
				<input type="text" name="postive1" value="<?php echo isset($info['postive1'])?$info['postive1']:''; ?>" style="width: 100%;">
				<label>POSITION/TITLE</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; border-top: 1px solid #000; padding: 5px 0; position: relative;">
			<div class="left" style="transform: rotate(-90deg); float: left; width: 20%; margin: 87px 0 0 -62px; position: absolute;">
				<label><b>EQUIPMENT INFORMATION</b></label>
			</div>
			<div class="right" style="width: 90%; float: right; box-sizing: border-box; padding: 7px; border: 1px solid #000;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<th>MANUFACTURE</th>
						<th style="width: 10%;">YEAR</th>
						<th style="width: 20%;">MAKE</th>
						<th style="width: 21%;">MODEL</th>
						<th style="width: 20%;">VIN/ SERIAL</th>
						<th>PRICE</th>
					</tr>
					
					<tr>
						<td>1. <input type="text" name="manu1" value="<?php echo isset($info['manu1'])?$info['manu1']:''; ?>" style="width: 83%;"></td>
						<td><input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;"></td>
						<td>$ <input type="text" class="price" id="price" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 89%;"></td>
					</tr>
					
					<tr>
						<td>2. <input type="text" name="manu2" value="<?php echo isset($info['manu2'])?$info['manu2']:''; ?>" style="width: 83%;"></td>
						<td><input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_id_addon1']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="vin1" value="<?php echo isset($info['vin1'])?$info['vin1']:$info['vin_addon1']; ?>" style="width: 100%;"></td>
						<td>$ <input type="text" name="price1" class="price" id="price1" value="<?php echo isset($info['price1'])?$info['price1']:$info['unit_value_addon1']; ?>" style="width: 89%;"></td>
					</tr>
					
					<tr>
						<td>3. <input type="text" name="manu3" value="<?php echo isset($info['manu3'])?$info['manu3']:''; ?>" style="width: 83%;"></td>
						<td><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$info['year_addon2']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:$info['make_addon2']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$info['model_id_addon2']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:$info['vin_addon2']; ?>" style="width: 100%;"></td>
						<td>$ <input type="text" name="price2" class="price" id="price2" value="<?php echo isset($info['price2'])?$info['price2']:$info['unit_value_addon2']; ?>" style="width: 89%;"></td>
					</tr>
					
					
					<tr>
						<td style="font-size: 12px;" colspan="4">NOTICE OF DEALER	</td>
						<td style="font-size: 12px;">TOTAL (LINES 1-3)<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 60%;"></td>
						<td>$ <input type="text" name="price4" id="total_price" class="price" value="<?php echo isset($info['price4'])?$info['price4']:''; ?>" style="width: 89%;"></td>
					</tr>
					
					<tr>
						<td style="font-size: 12px;" colspan="4">THIS INFORMATION WILL BE USED TO PREMOTE YOUR CUSTOMER</td>
						<td style="font-size: 10px;">LESS CASH DOWNPAYMENT<input type="text" name="premote" value="<?php echo isset($info['premote'])?$info['premote']:''; ?>" style="width: 35%;"></td>
						<td>$ <input type="text" name="price5" id="cash_down" class="price" value="<?php echo isset($info['price5'])?$info['price5']:''; ?>" style="width: 89%;"></td>
					</tr>
					
					<tr>
						<td style="font-size: 12px;" colspan="4">CONTRACT INCORRECT INFORMATION WILL DELAY FUNOINC</td>
						<td style="font-size: 10px;" >LESS TRADE IN<input type="text" name="conract" value="<?php echo isset($info['conract'])?$info['conract']:''; ?>" style="width: 64%;"></td>
						<td>$ <input type="text" id="trade_in" class="price" name="price6" value="<?php echo isset($info['price6'])?$info['price6']:''; ?>" style="width: 89%;"></td>
					</tr>
					
					<tr>
						<td style="font-size: 12px;" colspan="4">If equipment being traded in is financed through Shefield, call us for pay-off and instructions</td>
						<td style="font-size: 10px;">REQUESTED AMOUNT<input type="text" name="request" value="<?php echo isset($info['request'])?$info['request']:''; ?>" style="width: 47%;"></td>
						<td>$ <input type="text" name="price7" id="request_amount" class="price" value="<?php echo isset($info['price7'])?$info['price7']:''; ?>" style="width: 89%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<p style="fon-size: 14px; margin: 3px 0; float: left; width: 100%;"><i>IMPORTANT INFORMATION ABOUT ACCOUNT OPENING PROCEDURES</i>: Federal law requires all financial institutions, prior to account opening, to obtain, varify, and record information that identifies each person who asks to open an account.</p>
		
		<p style="fon-size: 14px; margin: 3px 0; float: left; width: 100%;">WHAT THIS MEANS TO YOU: When you apply for credit, we will ask your name, address, date of birth, and other information that will allow us to identify you. We may also ask to see your driver's license or other identifying documents. Faliure to provide the required information may result in denial of your request to open an account.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label><b>SIGNATURE (Primary Applicant)</b></label>
				<input type="text" name="primary_sign" value="<?php echo isset($info['primary_sign'])?$info['primary_sign']:''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; margin: 0 0 0 1%;">
				<label><b>DATE</b></label>
				<input type="text" name="primary_date" value="<?php echo isset($info['primary_date'])?$info['primary_date']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label><b>SIGNATURE (Joint Applicant)</b></label>
				<input type="text" name="joint_sign" value="<?php echo isset($info['joint_sign'])?$info['joint_sign']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; margin: 0 0 0 1%;">
				<label><b>DATE</b></label>
				<input type="text" name="joint_date" value="<?php echo isset($info['joint_date'])?$info['joint_date']:''; ?>" style="width: 85%;">
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

		price = isNaN(parseFloat($("#price").val()))?0.00:parseFloat($("#price").val());
       	price1 = isNaN(parseFloat($("#price1").val()))?0.00:parseFloat($("#price1").val());	
       	price2 = isNaN(parseFloat($("#price2").val()))?0.00:parseFloat($("#price2").val());	
      	var total_price = price + price1 + price2;
		$("#total_price").val(total_price.toFixed(2));
		cash_down = isNaN(parseFloat($("#cash_down").val()))?0.00:parseFloat($("#cash_down").val());
		trade_in = isNaN(parseFloat($("#trade_in").val()))?0.00:parseFloat($("#trade_in").val());
      	var request_amount = total_price - cash_down - trade_in;
       	$("#request_amount").val(request_amount.toFixed(2));
	
	function calculate_total() {
       price = isNaN(parseFloat($("#price").val()))?0.00:parseFloat($("#price").val());
       price1 = isNaN(parseFloat($("#price1").val()))?0.00:parseFloat($("#price1").val());	
       price2 = isNaN(parseFloat($("#price2").val()))?0.00:parseFloat($("#price2").val());	
       var total_price = price + price1 + price2;
		$("#total_price").val(total_price.toFixed(2));
		cash_down = isNaN(parseFloat($("#cash_down").val()))?0.00:parseFloat($("#cash_down").val());
		trade_in = isNaN(parseFloat($("#trade_in").val()))?0.00:parseFloat($("#trade_in").val());
      var request_amount = total_price - cash_down - trade_in;
       $("#request_amount").val(request_amount.toFixed(2));
    }

	$(".price").on('change keyup paste',function(){
        calculate_total();
    });
	
     
});

	
	
	
	
	
</script>
</div>
