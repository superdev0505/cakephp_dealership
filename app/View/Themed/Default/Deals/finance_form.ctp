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
	label{font-size: 11px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-left: 1px solid #000; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px; text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	td:last-child{border-right: 0px; text-align: left;}
	td:last-child input[type="text"]{text-align: right;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="left" style="float: left; width: 4%;">
			<label style="display: inline-block; width: 10%; transform: rotate(271deg); margin-top: 440%; margin-left: 48%; font-size: 14px;"><b>Buyer</b></label>
			<label style="display: inline-block; width: 52%; transform: rotate(271deg); margin-top: 224px; margin-left: -275px; font-size: 14px; position: absolute;"><b>Buyer Employment</b></label>
			<label style="    display: inline-block; width: 53%; transform: rotate(271deg); margin-top: 34%; margin-left: -26%; font-size: 14px; position: absolute;"><b>Co-Buyer</b></label>
			<label style="    display: inline-block; width: 30%; transform: rotate(271deg); margin-top: 77%; margin-left: -15%; font-size: 14px; position: absolute;"><b>Co-Buyer Employment</b></label>
		</div>
		<div class="right" style="float: right; width: 96%;">
		<div class="row" style="float: left; margin: 0; width: 100%; margin: 0;">
			<div class="logo" style="float: right; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/priority-one.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="section" style="float: right; width: 60%; margin-top: 12px; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
					<label>Dealer Name</label>
					<input type="text" name="dealer" value="<?php echo isset($info['dealer'])?$info['dealer']:''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
					<label>Dealer State</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px;">
				<label>First Name</label>
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px;">
				<label>Middle Initial</label>
				<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Last Name</label>
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Date of Birth</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:'';  ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Social Security Number</label>
				<input type="text" name="snumber" value="<?php echo isset($info["snumber"]) ? $info['snumber'] : ''?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label>Area Code & Home Phone Number</label>
				<input type="text" name="phone" value="<?php echo isset($info["phone"]) ? $info['phone'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 31%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Current Physical Address (Number and Street)</label>
				<input type="text" name="address" value="<?php echo isset($info["address"]) ? $info['address'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>City,State & Zip Code</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Driver License #</label>
				<input type="text" name="license" value="<?php echo isset($info["license"]) ? $info['license'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label>Area Code & Cell Phone Number</label>
				<input type="text" name="mobile" value="<?php echo isset($info["mobile"]) ? $info['mobile'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">U.S Citizen</label>
				<label><input type="radio" name="citizen_status" value="yes" <?php echo (isset($info['citizen_status']) && $info['citizen_status']=='yes')?'checked="checked"':''; ?> style="margin: 0;"> Yes</label>
				<label><input type="radio" name="citizen_status" value="no" <?php echo (isset($info['citizen_status']) && $info['citizen_status']=='no')?'checked="checked"':''; ?> style="margin: 0;"> No</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label><input type="radio" name="single_check" value="single" <?php echo (isset($info['single_check']) && $info['single_check']=='single')?'checked="checked"':''; ?> /> Single</label>
				<label><input type="radio" name="married_check" value="married" <?php echo (isset($info['married_check']) && $info['married_check']=='married')?'checked="checked"':''; ?> /> Married</label><br>
				<label><input type="radio" name="seprated_check" value="seprated" <?php echo (isset($info['seprated_check']) && $info['seprated_check']=='seprated')?'checked="checked"':''; ?> />Separated</label>
			</div>
			<div class="form-field" style="float: left; width: 27%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="width: 30%; display: inline-block;"><input type="radio" name="buying_check" value="buying" <?php echo (isset($info['buying_check']) && $info['buying_check']=='buying')?'checked="checked"':''; ?> /> Buying</label>
				<label style="width: 68%; display: inline-block;"><input type="radio" name="own_check" value="own" <?php echo (isset($info['own_check']) && $info['own_check']=='own')?'checked="checked"':''; ?> /> Own Free & Clear</label>
				<label style="width: 30%; display: inline-block;"><input type="radio" name="renting_check" value="renting" <?php echo (isset($info['renting_check']) && $info['renting_check']=='renting')?'checked="checked"':''; ?> />Renting</label>
				<label style="width: 45%; display: inline-block;"><input type="radio" name="parents_check" value="parents" <?php echo (isset($info['parents_check']) && $info['parents_check']=='parents')?'checked="checked"':''; ?> />Living with Parents</label>
				<label><input type="radio" name="other_check" value="other" <?php echo (isset($info['other_check']) && $info['other_check']=='other')?'checked="checked"':''; ?> />Other</label>
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; height: 46px; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Rent or Mortgage Payment</label>
				<input type="text" name="rent" value="<?php echo isset($info["rent"]) ? $info['rent'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; height: 46px; border-right: 1px solid #000;">
				<label style="display: block;">Mortgage Holder/Landland</label>
				<input type="text" name="mortage" value="<?php echo isset($info["mortage"]) ? $info['mortage'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="residence_year" value="<?php echo isset($info["residence_year"]) ? $info['residence_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="residence_month" value="<?php echo isset($info["residence_month"]) ? $info['residence_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 63%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000; height: 44px;">
				<label>Previous  Address (Street, State and Zip Code) (Complete if less than three  years at present address)</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time at Previous Residence</label>
				<input type="text" name="pre_residence_year" value="<?php echo isset($info["pre_residence_year"]) ? $info['pre_residence_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="pre_residence_month" value="<?php echo isset($info["pre_residence_month"]) ? $info['pre_residence_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
				
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Name of Personal Reference Not Living With You</label>
				<input type="text" name="personal_name" value="<?php echo isset($info["personal_name"]) ? $info['personal_name'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Address of Personal Reference Not Living With You</label>
				<input type="text" name="personal_address" value="<?php echo isset($info["personal_address"]) ? $info['personal_address'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Relationship</label>
				<input type="text" name="relationship" value="<?php echo isset($info["relationship"]) ? $info['relationship'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Area Code  & Home Phone Number</label>
				<input type="text" name="emp_phone" value="<?php echo isset($info["emp_phone"]) ? $info['emp_phone'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 63%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Present Employer Name (If Self-Employed Please List Business Name) <span style="font-size: 12px; margin-left: 5%;">(If Retired enter RETIRED)</span></label>
				<input type="text" name="present_emp" value="<?php echo isset($info["present_emp"]) ? $info['present_emp'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">City, State</label>
				<input type="text" name="emp_city_state" value="<?php echo isset($info["emp_city_state"]) ? $info['emp_city_state'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Employer Area Code & Phone Number</label>
				<input type="text" name="emp_mobile" value="<?php echo isset($info["emp_mobile"]) ? $info['emp_mobile'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Self-Employed    <label><input type="radio" name="self_emp" value="yes" <?php echo (isset($info['self_emp']) && $info['self_emp']=='yes')?'checked="checked"':''; ?> /> Yes</label> <label><input type="radio" name="self_emp" value="no" <?php echo (isset($info['self_emp']) && $info['self_emp']=='no')?'checked="checked"':''; ?> /> No</label></label>
				<label>
					If Yes, S Corp <input type="text" name="s_corp" value="<?php echo isset($info["s_corp"]) ? $info['s_corp'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;"> 
					C Corp <input type="text" name="c_corp" value="<?php echo isset($info["c_corp"]) ? $info['c_corp'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					LLC <input type="text" name="llc" value="<?php echo isset($info["llc"]) ? $info['llc'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					Partnership <input type="text" name="partnership" value="<?php echo isset($info["partnership"]) ? $info['partnership'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					Proprietor<input type="text" name="propertier" value="<?php echo isset($info["propertier"]) ? $info['propertier'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
				</label>
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Buyer Occupation or Job Title (If Military, State Rank)</label>
				<input type="text" name="military" value="<?php echo isset($info["military"]) ? $info['military'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time At Job or Title Retired</label>
				<input type="text" name="retired_year" value="<?php echo isset($info["retired_year"]) ? $info['retired_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="retired_month" value="<?php echo isset($info["retired_month"]) ? $info['retired_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Gross Monthly Income Amount (Before taxes)</label>
				<input type="text" name="gross_monthly" value="<?php echo isset($info["gross_monthly"]) ? $info['gross_monthly'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: %; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Type of Wages</label>
				<label><input type="checkbox" name="wage_check" <?php echo ($info['wage_check'] == "w2") ? "checked" : ""; ?> value="w2"/> w2</label>
				<label style="margin: 0 4%;"><input type="checkbox" name="wage_value_check" <?php echo ($info['wage_value_check'] == "1099") ? "checked" : ""; ?> value="1099"/> 1099</label>
				<label><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other"/> Other</label>
				<label>If other, provide an explanation</label>
				<input type="text" name="explanation" value="<?php echo isset($info["explanation"]) ? $info['explanation'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Is there any additional income? If so, what is the source?</label>
				<input type="text" name="additional_income" value="<?php echo isset($info["additional_income"]) ? $info['additional_income'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 31%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Additional Gross Monthly Income Amount<sup>*</sup></label>
				<input type="text" name="additional_mon_income" value="<?php echo isset($info["additional_mon_income"]) ? $info['additional_mon_income'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 41%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">What Kind of Income? 
					<label><input type="checkbox" name="income_check" <?php echo ($info['income_check'] == "w2") ? "checked" : ""; ?> value="w2"/> w2</label>
					<label style="margin: 0 3%;"><input type="checkbox" name="income_val_check" <?php echo ($info['income_val_check'] == "1090") ? "checked" : ""; ?> value="1090"/> 1090</label>
					<label><input type="checkbox" name="cash_check" <?php echo ($info['cash_check'] == "cash") ? "checked" : ""; ?> value="cash"/> Cash</label>
					<label style="margin: 0 0 0 3%;"><input type="checkbox" name="pension_check" <?php echo ($info['pension_check'] == "pension") ? "checked" : ""; ?> value="pension"/> Retirement/Pension</label>
				</label>
				<label style="display: block;"> 
					<label><input type="checkbox" name="ss_check" <?php echo ($info['ss_check'] == "ss") ? "checked" : ""; ?> value="ss"/> SS</label>
					<label style="margin: 0 4%;"><input type="checkbox" name="ss_other_check" <?php echo ($info['ss_other_check'] == "ss_other") ? "checked" : ""; ?> value="ss_other"/> Other</label>
					If Other, provide an explanation <input type="text" name="explanation" value="<?php echo isset($info["explanation"]) ? $info['explanation'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Employer (Complete if less than two years at present job or less than two year retired)</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info["pre_employer"]) ? $info['pre_employer'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Occupation or Job Title</label>
				<input type="text" name="occupation" value="<?php echo isset($info["occupation"]) ? $info['occupation'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time At Job or Time Retired</label>
				<input type="text" name="pre_year" value="<?php echo isset($info["pre_year"]) ? $info['pre_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="pre_month" value="<?php echo isset($info["pre_month"]) ? $info['pre_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<!-- second-part start -->
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px;">
				<label>First Name</label>
				<input type="text" name="co_first_name" value="<?php echo isset($info["co_first_name"]) ? $info['co_first_name'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px;">
				<label>Middle Initial</label>
				<input type="text" name="co_m_name" value="<?php echo isset($info["co_m_name"]) ? $info['co_m_name'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Last Name</label>
				<input type="text" name="co_last_name" value="<?php echo isset($info["co_last_name"]) ? $info['co_last_name'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Date of Birth</label>
				<input type="text" name="co_dob" value="<?php echo isset($info["co_dob"]) ? $info['co_dob'] : ''?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Social Security Number</label>
				<input type="text" name="co_ssn" value="<?php echo isset($info["co_ssn"]) ? $info['co_ssn'] : ''?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label>Area Code & Home Phone Number</label>
				<input type="text" name="co_phone" value="<?php echo isset($info["co_phone"]) ? $info['co_phone'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 31%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Current Physical Address (Number and Street)</label>
				<input type="text" name="co_address" value="<?php echo isset($info["co_address"]) ? $info['co_address'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>City,State & Zip Code</label>
				<input type="text" name="co_city_state" value="<?php echo isset($info["co_city_state"]) ? $info['co_city_state'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Driver License #</label>
				<input type="text" name="co_license" value="<?php echo isset($info["co_license"]) ? $info['co_license'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label>Area Code & Cell Phone Number</label>
				<input type="text" name="co_mobile" value="<?php echo isset($info["co_mobile"]) ? $info['co_mobile'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">U.S Citizen</label>
				<label><input type="radio" name="co_citizen_status" value="yes" <?php echo (isset($info['co_citizen_status']) && $info['co_citizen_status']=='yes')?'checked="checked"':''; ?> style="margin: 0;"> Yes</label>
				<label><input type="radio" name="co_citizen_status" value="no" <?php echo (isset($info['co_citizen_status']) && $info['co_citizen_status']=='no')?'checked="checked"':''; ?> style="margin: 0;"> No</label>
			</div>
			<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label><input type="radio" name="co_single_check" value="co_single" <?php echo (isset($info['co_single_check']) && $info['co_single_check']=='co_single')?'checked="checked"':''; ?> /> Single</label>
				<label><input type="radio" name="co_married_check" value="co_married" <?php echo (isset($info['co_married_check']) && $info['co_married_check']=='co_married')?'checked="checked"':''; ?> /> Married</label><br>
				<label><input type="radio" name="co_separate_check" value="co_separate" <?php echo (isset($info['co_separate_check']) && $info['co_separate_check']=='co_separate')?'checked="checked"':''; ?> />Separated</label>
			</div>
			<div class="form-field" style="float: left; width: 27%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="width: 30%; display: inline-block;"><input type="radio" name="co_buying_check" value="co_buying" <?php echo (isset($info['co_buying_check']) && $info['co_buying_check']=='co_buying')?'checked="checked"':''; ?> /> Buying</label>
				<label style="width: 68%; display: inline-block;"><input type="radio" name="co_own_check" value="co_own" <?php echo (isset($info['co_own_check']) && $info['co_own_check']=='co_own')?'checked="checked"':''; ?> /> Own Free & Clear</label>
				<label style="width: 30%; display: inline-block;"><input type="radio" name="co_rent_check" value="co_rent" <?php echo (isset($info['co_rent_check']) && $info['co_rent_check']=='co_rent')?'checked="checked"':''; ?> />Renting</label>
				<label style="width: 45%; display: inline-block;"><input type="radio" name="co_living_check" value="co_living" <?php echo (isset($info['co_living_check']) && $info['co_living_check']=='co_living')?'checked="checked"':''; ?> />Living with Parents</label>
				<label><input type="radio" name="co_other_check" value="co_other" <?php echo (isset($info['co_other_check']) && $info['co_other_check']=='co_other')?'checked="checked"':''; ?> />Other</label>
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; height: 46px; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Rent or Mortgage Payment</label>
				<input type="text" name="co_rent" value="<?php echo isset($info["co_rent"]) ? $info['co_rent'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; height: 46px; border-right: 1px solid #000;">
				<label style="display: block;">Mortgage Holder/Landland</label>
				<input type="text" name="co_mortage" value="<?php echo isset($info["co_mortage"]) ? $info['co_mortage'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time at Residence</label>
				<input type="text" name="co_year" value="<?php echo isset($info["co_year"]) ? $info['co_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_month" value="<?php echo isset($info["co_month"]) ? $info['co_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 63%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Previous  Address (Street, State and Zip Code) (Complete if less than three  years at present address)</label>
				<input type="text" name="co_pre_address" value="<?php echo isset($info["co_pre_address"]) ? $info['co_pre_address'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time at Previous Residence</label>
				<input type="text" name="co_pre_year" value="<?php echo isset($info["co_pre_year"]) ? $info['co_pre_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_pre_month" value="<?php echo isset($info["co_pre_month"]) ? $info['co_pre_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
				
		<!--<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Name of Personal Reference Not Living With You</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Name of Personal Reference Not Living With You</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Relationship</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Area Code  & Home Phone Number</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
		</div>-->
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 63%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Present Employer Name (If Self-Employed Please List Business Name) <span style="font-size: 12px; margin-left: 5%;">(If Retired enter RETIRED)</span></label>
				<input type="text" name="co_emp_name" value="<?php echo isset($info["co_emp_name"]) ? $info['co_emp_name'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">City, State</label>
				<input type="text" name="co_emp_city_state" value="<?php echo isset($info["co_emp_city_state"]) ? $info['co_emp_city_state'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Employer Area Code & Phone Number</label>
				<input type="text" name="co_emp_area" value="<?php echo isset($info["co_emp_area"]) ? $info['co_emp_area'] : ''?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Self-Employed<label><input type="radio" name="self_emp_check" value="yes" <?php echo (isset($info['self_emp_check']) && $info['self_emp_check']=='yes')?'checked="checked"':''; ?> /> Yes</label> <label><input type="radio" name="self_emp_check" value="no" <?php echo (isset($info['self_emp_check']) && $info['self_emp_check']=='no')?'checked="checked"':''; ?> /> No</label></label>
				<label>
					If Yes, S Corp <input type="text" name="co_s_corp" value="<?php echo isset($info["co_s_corp"]) ? $info['co_s_corp'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;"> 
					C Corp <input type="text" name="co_c_corp" value="<?php echo isset($info["co_c_corp"]) ? $info['co_c_corp'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					LLC <input type="text" name="co_llc" value="<?php echo isset($info["co_llc"]) ? $info['co_llc'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					Partnership <input type="text" name="co_partnership" value="<?php echo isset($info["co_partnership"]) ? $info['co_partnership'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
					Proprietor<input type="text" name="co_propertier" value="<?php echo isset($info["co_propertier"]) ? $info['co_propertier'] : ''?>" style="width: 7%; border-bottom: 1px solid #000;">
				</label>
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Co-Buyer Occupation or Job Title (If Military, State Rank)</label>
				<input type="text" name="co_buyer" value="<?php echo isset($info["co_buyer"]) ? $info['co_buyer'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time At Job or Title Retired</label>
				<input type="text" name="co_retired_year" value="<?php echo isset($info["co_retired_year"]) ? $info['co_retired_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_retired_month" value="<?php echo isset($info["co_retired_month"]) ? $info['co_retired_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Gross Monthly Income Amount (Before taxes)</label>
				<input type="text" name="co_gross_month" value="<?php echo isset($info["co_gross_month"]) ? $info['co_gross_month'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: %; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Type of Wages</label>
				<label><input type="checkbox" name="co_wage_check" value="w2" <?php echo (isset($info['co_wage_check']) && $info['co_wage_check']=='w2')?'checked="checked"':''; ?> /> w2</label>
				<label style="margin: 0 4%;"><input type="checkbox" name="co_value_check" value="1099" <?php echo (isset($info['co_value_check']) && $info['co_value_check']=='1099')?'checked="checked"':''; ?> /> 1099</label>
				<label><input type="checkbox" name="co_other_check" value="other" <?php echo (isset($info['co_other_check']) && $info['co_other_check']=='other')?'checked="checked"':''; ?> /> Other</label>
				<label>If other, provide an explanation</label>
				<input type="text" name="co_explanation" value="<?php echo isset($info["co_explanation"]) ? $info['co_explanation'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Is there any additional income? If so, what is the source?</label>
				<input type="text" name="co_addition_income" value="<?php echo isset($info["co_addition_income"]) ? $info['co_addition_income'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 31%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Additional Gross Monthly Income Amount<sup>*</sup></label>
				<input type="text" name="co_gross_mon_income" value="<?php echo isset($info["co_gross_mon_income"]) ? $info['co_gross_mon_income'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 41%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">What Kind of Income? 
					<label><input type="checkbox" name="co_income_check" value="w2" <?php echo (isset($info['co_income_check']) && $info['co_income_check']=='w2')?'checked="checked"':''; ?> /> w2</label>
					<label style="margin: 0 3%;"><input type="checkbox" name="co_income_value_check" value="1090" <?php echo (isset($info['co_income_value_check']) && $info['co_income_value_check']=='1090')?'checked="checked"':''; ?> /> 1090</label>
					<label><input type="checkbox" name="co_cash_check" value="cash" <?php echo (isset($info['co_cash_check']) && $info['co_cash_check']=='cash')?'checked="checked"':''; ?> /> Cash</label>
					<label style="margin: 0 0 0 3%;"><input type="checkbox" name="co_pension_check" value="pension" <?php echo (isset($info['co_pension_check']) && $info['co_pension_check']=='pension')?'checked="checked"':''; ?> /> Retirement/Pension</label>
				</label>
				<label style="display: block;"> 
					<label><input type="checkbox" name="name"> SS</label>
					<label style="margin: 0 4%;"><input type="checkbox" name="co_ss" value="ss" <?php echo (isset($info['co_ss']) && $info['co_ss']=='ss')?'checked="checked"':''; ?> /> Other</label>
					If Other, provide an explanation <input type="text" name="co_explanation" value="<?php echo isset($info["co_explanation"]) ? $info['co_explanation'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Previous Employer (Complete if less than two years at present job or less than two year retired)</label>
				<input type="text" name="co_pre_emp" value="<?php echo isset($info["co_pre_emp"]) ? $info['co_pre_emp'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Occupation or Job Title</label>
				<input type="text" name="co_emp_occupation" value="<?php echo isset($info["co_emp_occupation"]) ? $info['co_emp_occupation'] : ''?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Time At Job or Time Retired</label>
				<input type="text" name="co_emp_year" value="<?php echo isset($info["co_emp_year"]) ? $info['co_emp_year'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Years</label>
				<input type="text" name="co_emp_month" value="<?php echo isset($info["co_emp_month"]) ? $info['co_emp_month'] : ''?>" style="width: 25%; border-bottom: 1px solid #000;">
				<label>Months</label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 11px;"><sup>Alimony, child support or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation.</sup></p>
		
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 11px;"><b>Please answer the following questions to expedite the credit application process.</b></p>
		
		
		<div class="row" style="float: left; margin: 0; width: 100%; margin: 2px 0;">
			<div class="left" style="float: left; width: 50%;">
				<label style="display: block; font-size: 10px;">1. How much money do you anticipate using a down payments (not including the trade allowance)? <input type="text" name="down_pay" value="<?php echo isset($info["down_pay"]) ? $info['down_pay'] : ''?>" style="width: 8%; border-bottom: 1px solid #000;"></label>
				<label style="display: block; font-size: 10px;">2. Whom can we call with the detail of the credit application? Buyer <input type="text" name="name" style="width: 10%; border-bottom: 1px solid #000;" > Co-Buyer <input type="text" name="credit_app" value="<?php echo isset($info["credit_app"]) ? $info['credit_app'] : ''?>" style="width: 10%; border-bottom: 1px solid #000;"></label>
				<label style="display: block; font-size: 10px;">3.Where should we contact you? Home<input type="text" name="contact_home" value="<?php echo isset($info["contact_home"]) ? $info['contact_home'] : ''?>" style="width: 10%; border-bottom: 1px solid #000;"> work<input type="text" name="contact_work" value="<?php echo isset($info["contact_work"]) ? $info['contact_work'] : ''?>" style="width: 10%; border-bottom: 1px solid #000;"> Cell<input type="text" name="contact_cell" value="<?php echo isset($info["contact_cell"]) ? $info['contact_cell'] : ''?>" style="width: 10%; border-bottom: 1px solid #000;"></label>
			</div>
			<div class="left" style="float: right; width: 45%;">
				<label style="display: block; font-size: 10px;">4. Email address <input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : ''?>" style="width: 40%; border-bottom: 1px solid #000;"></label>
				<label style="display: block; font-size: 10px;">5. When do you anticipate delivery? <input type="text" name="anticipate" value="<?php echo isset($info["anticipate"]) ? $info['anticipate'] : ''?>" style="width: 20%; border-bottom: 1px solid #000;"></label>
				<label style="display: block; font-size: 10px;">6. Previously owned boats or recreational vehicles (list largest, if several) <input type="text" name="recreational" value="<?php echo isset($info["recreational"]) ? $info['recreational'] : ''?>" style="width: 24%; border-bottom: 1px solid #000;"></label>
				<label style="display: block; font-size: 10px;">7. If purchasing an RV, do you plan to live in the RV more than 6 months of the year? <label>Yes <input type="radio" name="rv_status" value="yes" <?php echo (isset($info['rv_status']) && $info['rv_status']=='yes')?'checked="checked"':''; ?> /></label>  <label>No <input type="radio" name="rv_status" value="no" <?php echo (isset($info['rv_status']) && $info['rv_status']=='no')?'checked="checked"':''; ?> /></label></label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 5px 0; font-size: 10px;">Federal law requires the creditor to obtain, verify and record information that identifies you when you open n account. The creditor will use your name, address, and other information for this purpose.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 10px;">Evidence of physical damage insurance on the collateral securing the credit you seek is required prior to closing. by submitting this application, you are authorizing Dealer/Priority One to disclose information contained in your application to an insurance carrier solely for the purpose of providing you with a premium quote for such insurance. You are, however, under no obligation whatsoever to purchase insurance from the insurance carrier providing the quote.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 10px;">By signing below: You authorize Dealer/Priority One/affiliated entities and any financial institution to obtain any information pertaining to your trade payoff from the current finance company. You certithat everything stated in this application and on any attachments is true and correct. dealer/Priority One/affiliated entities and financial institution may keep this application whether or not it is approved. You authorize the above named Dealer/Priority One/affiliated entities and any financial institution to whom your application is submitted to check your credit and employment history and to obtain a consumer credit report in connection with this application or in connection with additional approval, extensions or collection of credit. You understand that you must update application information if your financial condition changes prior to closing of the credit transaction. Communication with Dealer/Priority One//affiliated entities and any financial institution may be recorded or monitored to assure the quality of service, for training purpose or for other reasons. You agree that we and our assignees may try to contact you in writing, by email or using prerecorded and/ or artificial voice messages, text messages and automatic telephone dialing systems, as the law allows. You also agree that we and our assigneers may try to contact you in these and other ways at any address or telephone number you provide us, even if the telephone number is a cell phone number or the contact results in a charge to you.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 11px;">FAIR CREDIT REPORTING ACT DISCLOSURE: This application for credit may be submitted to various financial institutions.</p>
		
		<div class="row" style="float: left; margin: 0; width: 100%; margin: 3px 0px;">
			<div class="form-field" style="float: left; width: 65%;">
				<label style="display: inline-block; width: 38%;">We intend to apply for joint credit.  <span style="margin-left: 3%; font-size: 11px">Buyer's Initial</span></label>
				<input type="text" name="buyer_initial" value="<?php echo isset($info["buyer_initial"]) ? $info['buyer_initial'] : ''?>" style="width: 50%; border-bottom: 1px solid #000;;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Co-Buyer's Initial</label>
				<input type="text" name="co_buyer_initial" value="<?php echo isset($info["co_buyer_initial"]) ? $info['co_buyer_initial'] : ''?>" style="width: 60%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; margin: 3px 0px;">
			<div class="left" style="float: left; width: 48%;">
				<div class="form-field" style="float: left; width: 70%;">
					X<input type="text" name="buyer_sign" value="<?php echo isset($info["buyer_sign"]) ? $info['buyer_sign'] : ''?>" style="width: 95%; border-bottom: 1px solid #000;">
					<label>Buyer's Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="buyer_sign_date" value="<?php echo isset($info["buyer_sign_date"]) ? $info['buyer_sign_date'] : ''?>" style="width: 100%; border-bottom: 1px solid #000;">
					<label>Date</label>
				</div>
			</div>
			<div class="right" style="float: right; width: 48%;">
				<div class="form-field" style="float: left; width: 70%;">
					O<input type="text" name="co_buyer_sign" value="<?php echo isset($info["co_buyer_sign"]) ? $info['co_buyer_sign'] : ''?>" style="width: 95%; border-bottom: 1px solid #000;">
					<label>Co-Buyer's Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="co_buyer_sign_date" value="<?php echo isset($info["co_buyer_sign_date"]) ? $info['co_buyer_sign_date'] : ''?>" style="width: 100%; border-bottom: 1px solid #000;">
					<label>Date</label>
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 3px 0 0; font-size: 12px;">Priority One Financial Service, Inc. - Please call 1-800-747-6223 for questions concerning your credit application.</p>
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

	var previousElem;
    $("input[type='radio']").click(function (e) {
        var previous = $(this).attr('previous');
       
        if (previous == "true" && previousElem === this) {
          $(this).prop('checked', false);
        }
        previousElem = this;
        $(this).attr('previous', $(this).prop('checked'));
    
    });
});
	
</script>
</div>
