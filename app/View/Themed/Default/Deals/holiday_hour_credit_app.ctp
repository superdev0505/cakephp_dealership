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
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
@media print {
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 16px;"><b>CONSUMER CREDIT APPLICATION</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 60%; margin: 3px 0;">
				<label>Dealer Name:</label>
				<input type="text" name="dealer" value="<?php echo isset($info['dealer'])?$info['dealer']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
			</div>
			<div class="from-field" style="float: right; width: 38%; margin: 3px 0;">
				<label>Date of Application:</label>
				<input type="text" name="date_app" value="<?php echo isset($info['date_app'])?$info['date_app']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>Application Type:</label>
				<span style="font-size: 14px;margin-left: 33px;">Include Co-applicant information if married and a resident of  Wisconsin or living in a community property state.</span>
			</div>
			
			<div class="right" style="width: 85%; float: right;">
				<div class="left" style="float: left; width: 40%;">
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;"><input type="text" name="sep_credit" value="<?php echo isset($info['sep_credit'])?$info['sep_credit']:''; ?>" style="width: 25%; border-bottom: 1px solid #000;"> Separate Credit</p>
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;"><input type="text" name="spo_credit" value="<?php echo isset($info['spo_credit'])?$info['spo_credit']:''; ?>" style="width: 25%; border-bottom: 1px solid #000;"> Joint Credit with Spouse</p>
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;"><input type="text" name="joint_credit" value="<?php echo isset($info['joint_credit'])?$info['joint_credit']:''; ?>" style="width: 25%; border-bottom: 1px solid #000;"> Joint Credit with</p>
				</div>
				
				<div class="right" style="width: 55%; float: right;">
					<p style="font-size: 14px; margin: 3px 0;">I/We intend to apply Jointly (initials): <input type="text" name="i_jointly" value="<?php echo isset($info['i_jointly'])?$info['i_jointly']:''; ?>" style="width: 10%; margin-right: 2%; border-bottom: 1px solid #000;"> <input type="text" name="we_jointly" value="<?php echo isset($info['we_jointly'])?$info['we_jointly']:''; ?>" style="width: 10%; border-bottom: 1px solid #000;"></p>
					<p style="font-size: 14px; margin: 3px 0;"><input type="text" name="spouse" value="<?php echo isset($info['spouse'])?$info['spouse']:''; ?>" style="width: 30%; border-bottom: 1px solid #000;"> (not your Spouse)</p>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-filed" style="width: 100%; float: left;">
				<label>Marital Status: <sup>*</sup></label>
				<input type="text" name="marital_status" value="<?php echo isset($info['marital_status'])?$info['marital_status']:''; ?>" style="width: 9%; border-bottom: 1px solid #000; margin-left: 41px;">
				<label style="margin-right: 10%;">Married</label>
				<input type="text" name="unmarried" value="<?php echo isset($info['unmarried'])?$info['unmarried']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
				<label>Unmarried</label>
			</div>
		</div>
		
		<p style="font-size: 14px; margin: 3px 0; float: left; width: 100%;"><sup>*</sup> Indicate marital status only if the loan  is for secured credit or you live in a community property state.</p>
		
		<h2 style="float: left; width: 100%; margin: 0; text-align: center; font-size: 16px; padding: 5px; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;"><b>SECTION I - APPLICANT</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Full Name</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['last_name']; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label>Date of Birth</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Socail Security Number</label>
				<input type="text" name="snumber" value="<?php echo isset($info['snumber'])?$info['snumber']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Home Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>City/State</label>
				<input type="text" name="city_state" value="<?php echo isset($info['city_state']) ? $info['city_state'] : $info['city']." ".$info['state']; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Email Address</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Own or Rent</label>
				<input type="text" name="own" value="<?php echo isset($info['own'])?$info['own']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Home Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 58%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Mortgage Holder / Landlord</label>
				<input type="text" name="landlord" value="<?php echo isset($info['landlord'])?$info['landlord']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px;">
				<label>Monthly Payment</label>
				<input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Length at current residence</label>
				<input type="text" name="current_residence" value="<?php echo isset($info['current_residence'])?$info['current_residence']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Length at current employment</label>
				<input type="text" name="current_employment" value="<?php echo isset($info['current_employment'])?$info['current_employment']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Salary</label>
				<input type="text" name="salary" value="<?php echo isset($info['salary'])?$info['salary']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Employer</label>
				<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Position</label>
				<input type="text" name="position" value="<?php echo isset($info['position'])?$info['position']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Work Phone</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Other Income Source</label>
				<input type="text" name="income_source" value="<?php echo isset($info['income_source'])?$info['income_source']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 58%; box-sizing: border-box; padding: 2px;">
				<label>Amount</label>
				<input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Are you obligated to pay child <span style="font-size: 14px; margin: 0 0 0 5px;">Amount</span></label>
				<input type="text" name="obligated_amount" value="<?php echo isset($info['obligated_amount'])?$info['obligated_amount']:''; ?>" style="width: 20%;">
				<span style="font-size: 14px; margin: 0 0 0 5px;">Unit</span>
				<input type="text" name="obligated_unit" value="<?php echo isset($info['obligated_unit'])?$info['obligated_unit']:''; ?>" style="width: 20%;">
				<br>
				<label>support or alimony?</label>
				<input type="text" name="alimony" value="<?php echo isset($info['alimony'])?$info['alimony']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px;">
				<label>Have you ever field for</label>
				<input type="text" name="bankruptcy" value="<?php echo isset($info['bankruptcy'])?$info['bankruptcy']:''; ?>" style="width: 60%;"><br>
				<label>bankruptcy?</label>
				<span style="margin: 0 4%;"><input type="radio" name="bankruptcy_check" <?php echo ($info['bankruptcy_check'] == "yes") ? "checked" : ""; ?> value="yes"/> YES</span>
				<span style="margin: 0 20%"><input type="radio" name="bankruptcy_check" <?php echo ($info['bankruptcy_check'] == "no") ? "checked" : ""; ?> value="no"/> NO</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Are there any suits, unsatisfied judgements, ailmony or maintenance awards pending against you? If yes, explain.</label>
				<input type="text" name="suits" value="<?php echo isset($info['suits'])?$info['suits']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; padding: 5px; text-align: center; font-size: 16px; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;"><b>SECTION II - JOINT APPLICANT</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Full Name</label>
				<input type="text" name="joint_name" value="<?php echo isset($info['joint_name'])?$info['joint_name']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label>Date</label>
				<input type="text" name="joint_date" value="<?php echo isset($info['joint_date'])?$info['joint_date']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Socail Security Number</label>
				<input type="text" name="joint_snumber" value="<?php echo isset($info['joint_snumber'])?$info['joint_snumber']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Home Address</label>
				<input type="text" name="joint_address" value="<?php echo isset($info['joint_address'])?$info['joint_address']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>City/State</label>
				<input type="text" name="joint_city_state" value="<?php echo isset($info['joint_city_state'])?$info['joint_city_state']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 2px;">
				<label>Zip</label>
				<input type="text" name="joint_zip" value="<?php echo isset($info['joint_zip'])?$info['joint_zip']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Email Address</label>
				<input type="text" name="joint_email" value="<?php echo isset($info['joint_email'])?$info['joint_email']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Own or Rent</label>
				<input type="text" name="joint_own" value="<?php echo isset($info['joint_own'])?$info['joint_own']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Home Phone</label>
				<input type="text" name="joint_phone" value="<?php echo isset($info['joint_phone'])?$info['joint_phone']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px;">
				<label>Cell Phone</label>
				<input type="text" name="joint_mobile" value="<?php echo isset($info['joint_mobile'])?$info['joint_mobile']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 58%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Mortgage Holder / Landlord</label>
				<input type="text" name="joint_landlord" value="<?php echo isset($info['joint_landlord'])?$info['joint_landlord']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px;">
				<label>Monthly Payment</label>
				<input type="text" name="joint_payment" value="<?php echo isset($info['joint_payment'])?$info['joint_payment']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Length at current residence</label>
				<input type="text" name="joint_residence" value="<?php echo isset($info['joint_residence'])?$info['joint_residence']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Length at current employment</label>
				<input type="text" name="joint_employment" value="<?php echo isset($info['joint_employment'])?$info['joint_employment']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Salary</label>
				<input type="text" name="joint_salary" value="<?php echo isset($info['joint_salary'])?$info['joint_salary']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Employer</label>
				<input type="text" name="joint_employer" value="<?php echo isset($info['joint_employer'])?$info['joint_employer']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Position</label>
				<input type="text" name="joint_position" value="<?php echo isset($info['joint_position'])?$info['joint_position']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Work Phone</label>
				<input type="text" name="joint_work_number" value="<?php echo isset($info['joint_work_number'])?$info['joint_work_number']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Other Income Source</label>
				<input type="text" name="joint_other_income" value="<?php echo isset($info['joint_other_income'])?$info['joint_other_income']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 58%; box-sizing: border-box; padding: 2px;">
				<label>Amount</label>
				<input type="text" name="joint_amount" value="<?php echo isset($info['joint_amount'])?$info['joint_amount']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>Are you obligated to pay child <span style="font-size: 14px; margin: 0 0 0 5px;">Amount</span></label>
				<input type="text" name="joint_amt" value="<?php echo isset($info['joint_amt'])?$info['joint_amt']:''; ?>" style="width: 20%;">
				<span style="font-size: 14px; margin: 0 0 0 5px;">Unit</span>
				<input type="text" name="joint_unit" value="<?php echo isset($info['joint_unit'])?$info['joint_unit']:''; ?>" style="width: 20%;">
				<br>
				<label>support or alimony?</label>
				<input type="text" name="joint_alimony" value="<?php echo isset($info['joint_alimony'])?$info['joint_alimony']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px;">
				<label>Have you ever field for</label>
				<input type="text" name="joint_ever_field" value="<?php echo isset($info['joint_ever_field'])?$info['joint_ever_field']:''; ?>" style="width: 60%;"><br>
				<label>bankruptcy?</label>
				<span style="margin: 0 4%;"><input type="radio" name="joint_bankruptcy_check" <?php echo ($info['joint_bankruptcy_check'] == "yes") ? "checked" : ""; ?> value = "yes"> YES</span>
				<span style="margin: 0 20%"><input type="radio" name="joint_bankruptcy_check" <?php echo ($info['joint_bankruptcy_check'] == "no") ? "checked" : ""; ?> value = "no"> NO</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Are there any suits, unsatisfied judgements, ailmony or maintenance awards pending against you? If yes, explain.</label>
				<input type="text" name="joint_suits" value="<?php echo isset($info['joint_suits'])?$info['joint_suits']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; margin: 0; border-right: 1px solid #000; box-sizing: border-box;">
				<h3 style="float: left; width: 100%; margin: 0; box-sizing: border-box; font-size: 16px; text-align: center; border-bottom: 1px solid #000;"><b>SECTION I - APPLICANT</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>Applicant Name</label>
						<input type="text" name="app_name" value="<?php echo isset($info['app_name'])?$info['app_name']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<h3 style="float: left; width: 100%; margin: 0; box-sizing: border-box; text-align: center; border-bottom: 1px solid #000; font-size: 16px; margin: 0;"><b>A) Nearest Living Realative not Living with you</b></h3>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label style="font-size: 19px;">Name</label>
						<input type="text" name="relative_name" value="<?php echo isset($info['relative_name'])?$info['relative_name']:''; ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Address</label>
						<input type="text" name="relative_address" value="<?php echo isset($info['relative_address'])?$info['relative_address']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>City/State</label>
						<input type="text" name="relative_city" value="<?php echo isset($info['relative_city'])?$info['relative_city']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>Zip</label>
						<input type="text" name="relative_zip" value="<?php echo isset($info['relative_zip'])?$info['relative_zip']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Relationship</label>
						<input type="text" name="relative_relation" value="<?php echo isset($info['relative_relation'])?$info['relative_relation']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Phone</label>
						<input type="text" name="relative_phone" value="<?php echo isset($info['relative_phone'])?$info['relative_phone']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>Cell Phone</label>
						<input type="text" name="relative_mobile" value="<?php echo isset($info['relative_mobile'])?$info['relative_mobile']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<h3 style="float: left; width: 100%; margin: 0; box-sizing: border-box; font-size: 16px; text-align: center; border-bottom: 1px solid #000; font-size: 16px;"><b>B) Personal Reference</b></h3>
				
				<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; margin: 0; width: 100%; box-sizing: border-box; padding: 2px;">
						<label style="font-size: 19px;">Name</label>
						<input type="text" name="per_name" value="<?php echo isset($info['per_name'])?$info['per_name']:''; ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Address</label>
						<input type="text" name="per_address" value="<?php echo isset($info['per_address'])?$info['per_address']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>City/State</label>
						<input type="text" name="per_city" value="<?php echo isset($info['per_city'])?$info['per_city']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>Zip</label>
						<input type="text" name="per_zip" value="<?php echo isset($info['per_zip'])?$info['per_zip']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Relationship</label>
						<input type="text" name="per_relation" value="<?php echo isset($info['per_relation'])?$info['per_relation']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Phone</label>
						<input type="text" name="per_phone" value="<?php echo isset($info['per_phone'])?$info['per_phone']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>Cell Phone</label>
						<input type="text" name="per_mobile" value="<?php echo isset($info['per_mobile'])?$info['per_mobile']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
			</div>
			
			
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box;">
				<h3 style="float: left; width: 100%; font-size: 16px; margin: 0; box-sizing: border-box; text-align: center; border-bottom: 1px solid #000;"><b>SECTION II - JOINT APPLICANT</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>Applicant Name</label>
						<input type="text" name="joint_app_name" value="<?php echo isset($info['joint_app_name'])?$info['joint_app_name']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<h3 style="float: left; width: 100%; margin: 0; font-size: 16px; box-sizing: border-box; text-align: center; border-bottom: 1px solid #000;"><b>A) Nearest Living Realative not Living with you</b></h3>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label style="font-size: 19px;">Name</label>
						<input type="text" name="joint_relative_name" value="<?php echo isset($info['joint_relative_name'])?$info['joint_relative_name']:''; ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Address</label>
						<input type="text" name="joint_relative_address" value="<?php echo isset($info['joint_relative_address'])?$info['joint_relative_address']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>City/State</label>
						<input type="text" name="joint_relative_city" value="<?php echo isset($info['joint_relative_city'])?$info['joint_relative_city']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>Zip</label>
						<input type="text" name="joint_relative_zip" value="<?php echo isset($info['joint_relative_zip'])?$info['joint_relative_zip']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Relationship</label>
						<input type="text" name="joint_relative_relationship" value="<?php echo isset($info['joint_relative_relationship'])?$info['joint_relative_relationship']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Phone</label>
						<input type="text" name="joint_relative_phone" value="<?php echo isset($info['joint_relative_phone'])?$info['joint_relative_phone']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>Cell Phone</label>
						<input type="text" name="joint_relative_mobile" value="<?php echo isset($info['joint_relative_mobile'])?$info['joint_relative_mobile']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<h3 style="float: left; width: 100%; margin: 0; box-sizing: border-box; font-size: 16px; text-align: center; border-bottom: 1px solid #000;"><b>B) Personal Reference</b></h3>
				
				<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label style="font-size: 19px;">Name</label>
						<input type="text" name="joint_pre_name" value="<?php echo isset($info['joint_pre_name'])?$info['joint_pre_name']:''; ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 42%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Address</label>
						<input type="text" name="joint_pre_address" value="<?php echo isset($info['joint_pre_address'])?$info['joint_pre_address']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>City/State</label>
						<input type="text" name="joint_pre_city" value="<?php echo isset($info['joint_pre_city'])?$info['joint_pre_city']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>Zip</label>
						<input type="text" name="joint_pre_zip" value="<?php echo isset($info['joint_pre_zip'])?$info['joint_pre_zip']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 auto; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Relationship</label>
						<input type="text" name="joint_pre_relation" value="<?php echo isset($info['joint_pre_relation'])?$info['joint_pre_relation']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>Home Phone</label>
						<input type="text" name="joint_pre_phone" value="<?php echo isset($info['joint_pre_phone'])?$info['joint_pre_phone']:''; ?>" style="float: left; width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>Cell Phone</label>
						<input type="text" name="joint_pre_mobile" value="<?php echo isset($info['joint_pre_mobile'])?$info['joint_pre_mobile']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Signature of Applicant</label>
				<input type="text" name="sign_app" value="<?php echo isset($info['sign_app'])?$info['sign_app']:''; ?>" style="width: 77%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Signature of Co-Applicant</label>
				<input type="text" name="sign_co_app" value="<?php echo isset($info['sign_co_app'])?$info['sign_co_app']:''; ?>" style="width: 74%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="sign_co_date" value="<?php echo isset($info['sign_co_date'])?$info['sign_co_date']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
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
