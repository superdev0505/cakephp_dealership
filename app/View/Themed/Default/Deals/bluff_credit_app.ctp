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
	<div id="worksheet_container" style="width: 1030px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 11px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	ul li { font-size: 12px; padding: 3px 0 2px 23px;}
	p{font-size: 12px; margin: 3px 0;}
@media print {
	input[type="text"]{padding: 0px;font-size: 13px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 0; text-align: center; font-size: 20px;"><b>BLUFF POWERSPORTS CREDIT APPLICATION</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000;">
			<div class="form-field" style="float: left; text-align: center; border-right: 1px solid #000; width: 50%; box-sizing: border-box; padding: 5px;">
				<label>APPLICANT</label>
			</div>
			<div class="form-field" style="float: left; text-align: center; width: 50%; box-sizing: border-box; padding: 5px;">
				<label>CO-APPLICANT</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>NAME First, Ml, Last</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['m_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>BIRTHDATE (MM/DD/YY)</label>
				<input type="text" name="birthday" value="<?php echo isset($info['birthday']) ? $info['birthday'] : $info['dob']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>NAME First, Ml, Last</label>
				<input type="text" name="co_name" value="<?php echo isset($info['co_name']) ? $info['co_name'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; ">
				<label>BIRTHDATE (MM/DD/YY)</label>
				<input type="text" name="co_birth_date" value="<?php echo isset($info['co_birth_date']) ? $info['co_birth_date'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>SOCIAL SECURITY NUMBER</label>
				<input type="text" name="snumber" value="<?php echo isset($info['snumber']) ? $info['snumber'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>HOME PHONE NUMBER</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>CELL PHONE NUMBER</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>SOCIAL SECURITY NUMBER</label>
				<input type="text" name="co_snumber" value="<?php echo isset($info['co_snumber']) ? $info['co_snumber'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>HOME PHONE NUMBER</label>
				<input type="text" name="co_home" value="<?php echo isset($info['co_home']) ? $info['co_home'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>CELL PHONE NUMBER</label>
				<input type="text" name="co_mobile" value="<?php echo isset($info['co_mobile']) ? $info['co_mobile'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>PRESENT STREET ADDRESS <span style="font-size: 11px; margin: 0 0 0 10px;">If PO Box, list name, address, city, state, ZIP nearest living relative. </span></label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>PRESENT STREET ADDRESS <span style="font-size: 11px; margin: 0 0 0 10px;">If PO Box, list name, address, city, state, ZIP nearest living relative. </span></label>
				<input type="text" name="co_address" value="<?php echo isset($info['co_address']) ? $info['co_address'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>CITY, STATE, ZIP,COUNTY</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']." ".$info['county']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>MORTGAGE/RENT PAYMENT</label>
				<input type="text" name="mortga"  value="<?php echo isset($info['mortga']) ? $info['mortga'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>CITY, STATE, ZIP,COUNTY</label>
				<input type="text" name="co_address_data" value="<?php echo isset($info['co_address_data']) ? $info['co_address_data'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>MORTGAGE/RENT PAYMENT</label>
				<input type="text" name="co_mortga" value="<?php echo isset($info['co_mortga']) ? $info['co_mortga'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>YEARS AT ADDRESS</label>
				<input type="text" name="years" value="<?php echo isset($info['years']) ? $info['years'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<div class="inner-field" style="float: left; width: 50%;">
					<label>OWN</label>
					<input type="text" name="own" value="<?php echo isset($info['own']) ? $info['own'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>RENT</label>
					<input type="text" name="rent" value="<?php echo isset($info['rent']) ? $info['rent'] : "" ?>" style="width: 34%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 70%; margin-bottom: 2px;">
					<label>OTHER</label>
					<input type="text" name="other" value="<?php echo isset($info['other']) ? $info['other'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>EMAIL ADDRESS (OPTIONAL)<sup>*</sup></label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : "" ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>YEARS AT ADDRESS</label>
				<input type="text" name="co_year" value="<?php echo isset($info['co_year']) ? $info['co_year'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<div class="inner-field" style="float: left; width: 50%;">
					<label>OWN</label>
					<input type="text" name="co_own" value="<?php echo isset($info['co_own']) ? $info['co_own'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>RENT</label>
					<input type="text" name="co_rent" value="<?php echo isset($info['co_rent']) ? $info['co_rent'] : "" ?>" style="width: 38%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 70%; margin-bottom: 2px;">
					<label>OTHER</label>
					<input type="text" name="co_other" value="<?php echo isset($info['co_other']) ? $info['co_other'] : "" ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>EMAIL ADDRESS (OPTIONAL)<sup>*</sup></label>
				<input type="text" name="co_email" value="<?php echo isset($info['co_email']) ? $info['co_email'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>PREVIOUS ADDRESS (Street, City, State & ZIP) (If less than 3 years at present address)</label>
				<input type="text" name="pre_address" value="<?php echo isset($info['pre_address']) ? $info['pre_address'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>PREVIOUS ADDRESS (Street, City, State & ZIP) (If less than 3 years at present address)</label>
				<input type="text" name="co_pre_address" value="<?php echo isset($info['co_pre_address']) ? $info['co_pre_address'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label>ZIP CODE</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; text-align: center;">
				<label style="display: block;">OWN <input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "own") ? "checked" : ""; ?> value="own"> </label>
				<label style="display: block;">RENT <input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "rent") ? "checked" : ""; ?> value="rent"> </label>
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label style="display: block;">HOW LONG</label>
				<input type="text" name="yr" value="<?php echo isset($info['yr']) ? $info['yr'] : "" ?>" style="width: 30%;"> <label>YR</label>
				<input type="text" name="mo" value="<?php echo isset($info['mo']) ? $info['mo'] : "" ?>" style="width: 30%;"> <label>MO</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label>CITY</label>
				<input type="text" name="co_city" value="<?php echo isset($info['co_city']) ? $info['co_city'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label>STATE</label>
				<input type="text" name="co_state" value="<?php echo isset($info['co_state']) ? $info['co_state'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 39px;">
				<label>ZIP CODE</label>
				<input type="text" name="co_zip" value="<?php echo isset($info['co_zip']) ? $info['co_zip'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; text-align: center;">
				<label style="display: block;">OWN <input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "co_own") ? "checked" : ""; ?> value="co_own"> </label>
				<label style="display: block;">RENT <input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "co_rent") ? "checked" : ""; ?> value="co_rent"> </label>
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; height: 39px;">
				<label style="display: block;">HOW LONG</label>
				<input type="text" name="co_yr" value="<?php echo isset($info['co_yr']) ? $info['co_yr'] : "" ?>" style="width: 30%;"> <label>YR</label>
				<input type="text" name="co_mo" value="<?php echo isset($info['co_mo']) ? $info['co_mo'] : "" ?>" style="width: 30%;"> <label>MO</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; padding: 3px; height: 50px;">
				<label style="font-size: 13px; display: block;"><sup>*</sup>By providing an Email address, I consent to receive Email communications about my Account and authorize you to provide my Email address to the Manufacturer sponsor and to the Dealer where I applied so that I may receive such communications, offers and updates.</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; text-align: center; width: 50%; box-sizing: border-box; padding: 5px;">
				<label>APPLICANT EMPLOYMENT/INCOME</label>
			</div>
			<div class="form-field" style="float: left; text-align: center; width: 50%; box-sizing: border-box; padding: 5px;">
				<label>CO-APPLICANT EMPLOYMENT/INCOME</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>EMPLOYER,ADDRESS,CITY,STATE</label>
				<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>PHONE NUMBER</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>EMPLOYER,ADDRESS,CITY,STATE</label>
				<input type="text" name="co_employer" value="<?php echo isset($info['co_employer'])?$info['co_employer']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>PHONE NUMBER</label>
				<input type="text" name="co_work_number" value="<?php echo isset($info['co_work_number'])?$info['co_work_number']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>SELF EMPLOYED?</label>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>YES</label>
					<input type="text" name="employed" value="<?php echo isset($info['employed'])?$info['employed']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>NO</label>
					<input type="text" name="non_employed" value="<?php echo isset($info['non_employed'])?$info['non_employed']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>HOW LONG AT PRESENT JOB</label>
				<div class="inner-field" style="float: left; width: 46%;">
					<label>YEARS</label>
					<input type="text" name="pre_years" value="<?php echo isset($info['pre_years'])?$info['pre_years']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 54%;">
					<label>MONTHS</label>
					<input type="text" name="pre_month" value="<?php echo isset($info['pre_month'])?$info['pre_month']:''; ?>" style="width: 38%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>Current Occupation</label>
				<input type="text" name="current_occupation" value="<?php echo isset($info['current_occupation'])?$info['current_occupation']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000; border-right: 1px solid #000; height: 43px;">
				<label>SELF EMPLOYED?</label>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>YES</label>
					<input type="text" name="co_employed" value="<?php echo isset($info['co_employed'])?$info['co_employed']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 50%;">
					<label>NO</label>
					<input type="text" name="non_co_employed" value="<?php echo isset($info['non_co_employed'])?$info['non_co_employed']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 43px;">
				<label>HOW LONG AT PRESENT JOB</label>
				<div class="inner-field" style="float: left; width: 46%;">
					<label>YEARS</label>
					<input type="text" name="co_pre_year" value="<?php echo isset($info['co_pre_year'])?$info['co_pre_year']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
				</div>
				<div class="inner-field" style="float: left; width: 54%;">
					<label>MONTHS</label>
					<input type="text" name="co_pre_month" value="<?php echo isset($info['co_pre_month'])?$info['co_pre_month']:''; ?>" style="width: 38%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>Current Occupation</label>
				<input type="text" name="co_current_occupation" value="<?php echo isset($info['co_current_occupation'])?$info['co_current_occupation']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 50px;">
				<label>PREVIOUS EMPLOYER NAME</label>
				<input type="text" name="employer_name" value="<?php echo isset($info['employer_name'])?$info['employer_name']:''; ?>" style="width: 100%;">
				<label style="position: relative; top: -13px; font-size: 10px;">(If less than 3 years)</label>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 50px;">
				<label>HOW LONG AT PRESENT JOB</label>
				<div class="inner-field" style="float: left; width: 46%;">
					<input type="text" name="yrs" value="<?php echo isset($info['yrs'])?$info['yrs']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
					<label>Yrs.</label>
				</div>
				<div class="inner-field" style="float: left; width: 54%;">
					<input type="text" name="mos" value="<?php echo isset($info['mos'])?$info['mos']:''; ?>" style="width: 38%; border-bottom: 1px solid #000;">
					<label>Mos.</label>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 50px;">
				<label>Previous Occupation</label>
				<input type="text" name="per_occupation" value="<?php echo isset($info['per_occupation'])?$info['per_occupation']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 50px;">
				<label>PREVIOUS EMPLOYER NAME</label>
				<input type="text" name="co_employer_name" value="<?php echo isset($info['co_employer_name'])?$info['co_employer_name']:''; ?>" style="width: 100%;">
				<label style="position: relative; top: -13px; font-size: 10px;">(If less than 3 years)</label>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 50px;">
				<label>HOW LONG AT PRESENT JOB</label>
				<div class="inner-field" style="float: left; width: 46%;">
					<input type="text" name="co_yrs" value="<?php echo isset($info['co_yrs'])?$info['co_yrs']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
					<label>Yrs.</label>
				</div>
				<div class="inner-field" style="float: left; width: 54%;">
					<input type="text" name="co_mos" value="<?php echo isset($info['co_mos'])?$info['co_mos']:''; ?>" style="width: 38%; border-bottom: 1px solid #000;">
					<label>Mos.</label>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; height: 50px;">
				<label>Previous Occupation</label>
				<input type="text" name="co_per_occupation" value="<?php echo isset($info['co_per_occupation'])?$info['co_per_occupation']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; padding: 3px;">
				<label style="font-size: 14px; text-align: center; display: block;"><sup>*</sup>NOTE: Alimony, child support, or separate maintenance income need not to be revealed unless you want them considered as a basis for repaying this obligation.</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label style="display: block;">SOURCE OF OTHER INCOME</label>
				<label>SPOUSAL INCOME MAY ONLY BE</label>
				<input type="text" name="spe_income" value="<?php echo isset($info['spe_income'])?$info['spe_income']:''; ?>" style="width: 48%;">
				<label>INCLUDED FOR WISCONSIN RESIDENTS</label>
				<input type="text" name="resident" value="<?php echo isset($info['resident'])?$info['resident']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>MONTHLY AMOUNT</label>
				<input type="text" name="mon_amount" value="<?php echo isset($info['mon_amount'])?$info['mon_amount']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000; border-right: 1px solid #000;">
				<label style="display: block;">SOURCE OF OTHER INCOME</label>
				<label>SPOUSAL INCOME MAY ONLY BE</label>
				<input type="text" name="co_spe_income" value="<?php echo isset($info['co_spe_income'])?$info['co_spe_income']:''; ?>" style="width: 48%;">
				<label>INCLUDED FOR WISCONSIN RESIDENTS</label>
				<input type="text" name="co_resident" value="<?php echo isset($info['co_resident'])?$info['co_resident']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>MONTHLY AMOUNT</label>
				<input type="text" name="co_mon_amount" value="<?php echo isset($info['co_mon_amount'])?$info['co_mon_amount']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; box-sizing: border-box;">
				<label style="font-size: 13px; text-align: center; background-color: #ccc; display: block; padding: 4px;"><b>REFERENCES (REQUIRED)</b></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>NEAREST RELATIVE NOT LIVING WITH YOU</label>
				<input type="text" name="source_income" value="<?php echo isset($info['source_income'])?$info['source_income']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 23%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Name</label>
				<input type="text" name="name1" value="<?php echo isset($info['name1'])?$info['name1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Address</label>
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Phone</label>
				<input type="text" name="phone1" value="<?php echo isset($info['phone1'])?$info['phone1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>Relationship</label>
				<input type="text" name="relation1" value="<?php echo isset($info['relation1'])?$info['relation1']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>ADDITIONAL REFERENCE</label>
				<input type="text" name="addition_info" value="<?php echo isset($info['addition_info'])?$info['addition_info']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 23%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">	
				<label>Name</label>
				<input type="text" name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Address</label>
				<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Phone</label>
				<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>Relationship</label>
				<input type="text" name="relation2" value="<?php echo isset($info['relation2'])?$info['relation2']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 23%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Name</label>
				<input type="text" name="name3" value="<?php echo isset($info['name3'])?$info['name3']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Address</label>
				<input type="text" name="address3" value="<?php echo isset($info['address3'])?$info['address3']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>Phone</label>
				<input type="text" name="phone3" value="<?php echo isset($info['phone3'])?$info['phone3']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
				<label>Relationship</label>
				<input type="text" name="relation3" value="<?php echo isset($info['relation3'])?$info['relation3']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<p style="float: left; width: 100%;">By signing below I/We ("I", "me", "my") submit this application to <input type="text" name="signiing" value="<?php echo isset($info['signiing'])?$info['signiing']:''; ?>" style="width: 30%; border-bottom: 1px solid #000;"> to apply for a loan to purchase a qualifying product from the participating dealer/retailer to whom this Application has been submitted, or my personal, family or household purposes, I agree that:</p>
			
			<ul>
				<li>I am providing the information in this application to the Bank, the manufacturer sponsor and to the dealer taking this application. This bank may provide information about me (even if my application is declined) to the manufacturer sponsor and to the dealer taking this application so that they can create and update their records, and provide me with servicer and special offers.	</li>
				<li>The Bank may obtain information from others about me (including verifying my credit, employment and income references and requesting reports from consumer reporting agencies and other sources) to evaluate my application and to review, maintain or collect my account.</li>
				<li>The Bank may give consumer reporting agencies (credit bureaus) and others information, regarding its credit experience with me.</li>
				<li>I consent to Bank and any other owner or servicer of my account contacting me about my account (if credit extended), including using any contact information or cell phone numbers I provide and I consent to the use of any automatic telephone dialing system and/or an artifical or prerecorded voice when contacting me, even if I am charged for the call under my phone plan.</li>
				<li>Upon my request, the Bank will inform me of the name and address of each consumer reporting agency from which it obtained a consumer report about me.</li>
				<li>If credit is extended, the loan contract will include a resolving a dispute with arbitration provision that may limit my rights unless I reject that provision under the contract's Instructions.</li>
				<li>If I am married, I may apply for a separate account.</li>
				<li>I certify that all information provided in this application is true, complete and I am 18 years of age or older.</li>
			</ul>

			<p>Federal law requires the Bank to obtain, verify, and record information that identifies you when you open an account. The bank will use your name, address, date of birth, and other information for this purpose.</p>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000;">
				<div class="form-field" style="float: left;  width: 40%; box-sizing: border-box; padding: 0 3px;">
					<label style="display: block;">APPLICANT SIGN HERE</label>
					X<input type="text" name="applicant" value="<?php echo isset($info['applicant'])?$info['applicant']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>DATE</label>
					<input type="text" name="applicant_date" value="<?php echo isset($info['applicant_date'])?$info['applicant_date']:''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left;  width: 40%; box-sizing: border-box; padding: 0 3px;">
					<label style="display: block;">CO-APPLICANT SIGN HERE</label>
					X<input type="text" name="co_applicant" value="<?php echo isset($info['co_applicant'])?$info['co_applicant']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 0 3px;">
					<label>DATE</label>
					<input type="text" name="co_applicant_date" value="<?php echo isset($info['co_applicant_date'])?$info['co_applicant_date']:''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000;">
				<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>PRIMARY ID TYPE</label>
					<input name="primary" value="<?php echo isset($info['primary'])?$info['primary']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>ID NUMBER</label>
					<input name="id_num" value="<?php echo isset($info['id_num'])?$info['id_num']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>PRIMARY ID TYPE</label>
					<input name="co_primary" value="<?php echo isset($info['co_primary'])?$info['co_primary']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; ">
					<label>ID NUMBER</label>
					<input name="co_id_num" value="<?php echo isset($info['co_id_num'])?$info['co_id_num']:''; ?>" style="width: 100%;" type="text">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>ISSUING DATE</label>
					<input name="issu_date" value="<?php echo isset($info['issu_date'])?$info['issu_date']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>EXPIRATION DATE</label>
					<input name="exp_date" value="<?php echo isset($info['exp_date'])?$info['exp_date']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>ISSUING DATE</label>
					<input name="co_issu_date" value="<?php echo isset($info['co_issu_date'])?$info['co_issu_date']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
					<label>EXPIRATION DATE</label>
					<input name="co_exp_date" value="<?php echo isset($info['co_exp_date'])?$info['co_exp_date']:''; ?>" style="width: 100%;" type="text">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>SECONDARY ID TYPE</label>
					<input name="sec_id" value="<?php echo isset($info['sec_id'])?$info['sec_id']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>ISSUER</label>
					<input name="issuer" value="<?php echo isset($info['issuer'])?$info['issuer']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>EXPIRATION DATE</label>
					<input name="ex_date" value="<?php echo isset($info['ex_date'])?$info['ex_date']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>SECONDARY ID TYPE</label>
					<input name="co_sec_id" value="<?php echo isset($info['co_sec_id'])?$info['co_sec_id']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
					<label>ISSUER</label>
					<input name="co_issuer" value="<?php echo isset($info['co_issuer'])?$info['co_issuer']:''; ?>" style="width: 100%;" type="text">
				</div>
				<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; box-sizing: border-box; padding: 0 3px;">
					<label>EXPIRATION DATE</label>
					<input name="co_ex_date" value="<?php echo isset($info['co_ex_date'])?$info['co_ex_date']:''; ?>" style="width: 100%;" type="text">
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
