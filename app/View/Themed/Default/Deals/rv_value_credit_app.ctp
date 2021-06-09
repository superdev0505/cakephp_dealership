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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	.bg{background-color: #000;}
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 18.5% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="left; width: 45%; box-sizing: border-box;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 24px; border-box; "><b>CREDIT APPLICATION</b></h2>
				<div class="lender" style="float: left; width: 100%; border: 1px solid #000; margin: 4px 0;">
					<label class="bg" style="font-size: 15px; float: left; width: 30%; text-align: center; padding: 7px 0; background-color: #000; color: #fff;">Lender</label>
					<textarea name="lender" style="float: left; width: 98%; height: 76px; border: 0;"><?php echo isset($info['lender'])?$info['lender']:'' ?></textarea>	
				</div>
			</div>
			
			<div class="right" style="float: right; width: 54%; border: 1px solid #000; padding: 3px; box-sizing: border-box; margin-bottom: 3px;">
				<p style="float: left; width: 100%; margin: 0; font-size: 15px;"><b>CHECK FOR JOINT ACCOUNT:</b> <input type="checkbox" name="account_check" <?php echo ($info['account_check'] == "joint") ? "checked" : ""; ?> value="joint"/> If you are applying for a joint account or an account that you
and another person will use, complete all sections, providing information in section B, below,
about the joint Application or user.
We intend to apply for Joint Credit</p>

				<div class="row" style="float: left; width: 100%; margin: 4px 0 0;">
					<div class="form-field" style="float: left; width: 40%;">
						<input type="text" name="applicant" value="<?php echo isset($info['applicant'])?$info['applicant']:''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label><b>Applicant</b></label>
					</div>
					<div class="form-field" style="float: right; width: 40%;">
						<input type="text" name="co_applicant" value="<?php echo isset($info['co_applicant'])?$info['co_applicant']:''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label><b>CoApplicant</b></label>
					</div>
				</div>
			</div>
			
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 48%; margin: 0;">
				<h2 class="bg" style="border: 1px solid #000; float: left; width: 100%; margin: 0; background-color: #000; font-size: 16px; padding: 10px; box-sizing: border-box; color: #fff; text-align: center;">SECTION A: Information Regarding Applicant</h2>
				
				<div class="row" style="float: left; width: 100%; border: 1px solid #000; border-top: 1px solid #000; box-sizing: border-box; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>NAME</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style=" margin: 0; float: left; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>STREET ADDRESS</label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left;  margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 54%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>CITY </label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>STATE </label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px;">
						<label>ZIP </label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>DATE OF BIRTH </label>
						<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 29%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>HOME PHONE</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>SOCIAL SEC. No </label>
						<input type="text" name="social_num" value="<?php echo isset($info['social_num'])?$info['social_num']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px;">
						<label>DEP </label>
						<input type="text" name="dep" value="<?php echo isset($info['dep'])?$info['dep']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>LANDLORD/MORTGAGE HOLDER NAME AND ADDRESS </label>
						<input type="text" name="mortgage" value="<?php echo isset($info['mortgage'])?$info['mortgage']:''; ?>" style="width: 66%;">
						<label><input type="checkbox" name="mortgage_check" <?php echo ($info['mortgage_check'] == "own") ? "checked" : ""; ?> value="own"/> OWN</label><br>
						<label style="float: right; margin-top: -24px;"><input type="checkbox" name="mortgage_check" <?php echo ($info['mortgage_check'] == "rent") ? "checked" : ""; ?> value="rent"/> RENT</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>HOW LONG THERE </label>
						<input type="text" name="long" value="<?php echo isset($info['long'])?$info['long']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>DATE PURCHASED</label>
						<input type="text" name="purchased" value="<?php echo isset($info['purchased'])?$info['purchased']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PURCHASE PRICE</label>
						<input type="text" name="purchased_price" value="<?php echo isset($info['purchased_price'])?$info['purchased_price']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>ORIGINAL MORTGAGE </label>
						<input type="text" name="original_mortgage" value="<?php echo isset($info['original_mortgage'])?$info['original_mortgage']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PRESENT BALANCE</label>
						<input type="text" name="pre_balance" value="<?php echo isset($info['pre_balance'])?$info['pre_balance']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>MARKET VALUE</label>
						<input type="text" name="market_value" value="<?php echo isset($info['market_value'])?$info['market_value']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>MONTHLY PAYMENT </label>
						<input type="text" name="monthly_pay" value="<?php echo isset($info['monthly_pay'])?$info['monthly_pay']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PREVIOUS ADDRESS  (IF PRESENT ADDRESS LESS THAN 5 YEARS) </label>
						<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 66%;">
						<label><input type="checkbox" name="address_check" <?php echo ($info['address_check'] == "own") ? "checked" : ""; ?> value="own"/> OWN</label><br>
						<label style="float: right; margin-top: -24px;"><input type="checkbox" name="address_check" <?php echo ($info['address_check'] == "rent") ? "checked" : ""; ?> value="rent"/> RENT</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>HOW LONG THERE </label>
						<input type="text" name="three" value="<?php echo isset($info['three'])?$info['three']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 57%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>APPLICANTS EMPLOYER</label>
						<input type="text" name="app_employer" value="<?php echo isset($info['app_employer'])?$info['app_employer']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>YEARS</label>
						<input type="text" name="app_year" value="<?php echo isset($info['app_year'])?$info['app_year']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>POSITION </label>
						<input type="text" name="app_option" value="<?php echo isset($info['app_option'])?$info['app_option']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS</label>
						<input type="text" name="employer_address1" value="<?php echo isset($info['employer_address1'])?$info['employer_address1 ']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>PHONE NO. </label>
						<input type="text" name="employer_phone1" value="<?php echo isset($info['employer_phone1'])?$info['employer_phone1 ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 57%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS (IF WITH PRESENT ADDRESS LESS THAN 5 YEARS)</label>
						<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer ']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 62px;">
						<label>YEARS</label>
						<input type="text" name="employer_year" value="<?php echo isset($info['employer_year'])?$info['employer_year ']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>POSITION </label>
						<input type="text" name="employer_position" value="<?php echo isset($info['employer_position'])?$info['employer_position ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS</label>
						<input type="text" name="employer_address2" value="<?php echo isset($info['employer_address2'])?$info['employer_address2 ']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>PHONE NO. </label>
						<input type="text" name="employer_phone2" value="<?php echo isset($info['employer_phone2'])?$info['employer_phone2 ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>GROSS MONTHLY SALARY</label>
						<input type="text" name="gross_salary" value="<?php echo isset($info['gross_salary'])?$info['gross_salary ']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 2px;">
						<label>OTHER INCOME<sup>*</sup> </label>
						<input type="text" name="other_income" value="<?php echo isset($info['other_income'])?$info['other_income ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>SOURCE OF OTHER INCOME <sup>*</sup></label>
						<input type="text" name="source_income" value="<?php echo isset($info['source_income'])?$info['source_income ']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 2px;">
						<label>TOTAL GROSS INCOME<sup>*</sup> </label>
						<input type="text" name="total_income" value="<?php echo isset($info['total_income'])?$info['total_income ']:''; ?>" style="width: 100%;">
					</div>
				</div>	
			</div>
			
			<div class="right" style="float: right; width: 48%; margin: 0;">
				<h2 class="bg" style="border: 1px solid #000; float: left; width: 100%; margin: 0; background-color: #000; font-size: 16px; padding: 10px; box-sizing: border-box; color: #fff; text-align: center;">SECTION B: Information Regarding Applicant</h2>
				
				<div class="row" style="float: left; width: 100%; border: 1px solid #000; border-top: 1px solid #000; box-sizing: border-box; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>NAME</label>
						<input type="text" name="b_name" value="<?php echo isset($info['b_name'])?$info['b_name ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style=" margin: 0; float: left; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
						<label>STREET ADDRESS</label>
						<input type="text" name="b_address" value="<?php echo isset($info['b_address'])?$info['b_address  ']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left;  margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 54%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>CITY </label>
						<input type="text" name="b_city" value="<?php echo isset($info['b_city'])?$info['b_city']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>STATE </label>
						<input type="text" name="b_state" value="<?php echo isset($info['b_state'])?$info['b_state']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 2px;">
						<label>ZIP </label>
						<input type="text" name="b_zip" value="<?php echo isset($info['b_zip'])?$info['b_zip']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>DATE OF BIRTH </label>
						<input type="text" name="b_dob" value="<?php echo isset($info['b_dob'])?$info['b_dob']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 29%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>HOME PHONE</label>
						<input type="text" name="b_phone" value="<?php echo isset($info['b_phone'])?$info['b_phone']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>SOCIAL SEC. No </label>
						<input type="text" name="b_social" value="<?php echo isset($info['b_social'])?$info['b_social']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 2px;">
						<label>DEP </label>
						<input type="text" name="b_dep" value="<?php echo isset($info['b_dep'])?$info['b_dep']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>LANDLORD/MORTGAGE HOLDER NAME AND ADDRESS </label>
						<input type="text" name="b_mortgage" value="<?php echo isset($info['b_mortgage'])?$info['b_mortgage']:''; ?>" style="width: 66%;">
						<label><input type="checkbox" name="b_mortgage_check" <?php echo ($info['b_mortgage_check'] == "own") ? "checked" : ""; ?> value="own"/> OWN</label><br>
						<label style="float: right; margin-top: -24px;"><input type="checkbox" name="b_mortgage_check" <?php echo ($info['b_mortgage_check'] == "rent") ? "checked" : ""; ?> value="rent"/> RENT</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>HOW LONG THERE </label>
						<input type="text" name="b_long" value="<?php echo isset($info['b_long'])?$info['b_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>DATE PURCHASED</label>
						<input type="text" name="b_purchased" value="<?php echo isset($info['b_purchased'])?$info['b_purchased']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PURCHASE PRICE</label>
						<input type="text" name="b_price" value="<?php echo isset($info['b_price'])?$info['b_price']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>ORIGINAL MORTGAGE </label>
						<input type="text" name="b_original" value="<?php echo isset($info['b_original'])?$info['b_original']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PRESENT BALANCE</label>
						<input type="text" name="b_balance" value="<?php echo isset($info['b_balance'])?$info['b_balance']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>MARKET VALUE</label>
						<input type="text" name="b_market" value="<?php echo isset($info['b_market'])?$info['b_market']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
						<label>MONTHLY PAYMENT </label>
						<input type="text" name="b_payment" value="<?php echo isset($info['b_payment'])?$info['b_payment']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>PREVIOUS ADDRESS  (IF PRESENT ADDRESS LESS THAN 5 YEARS) </label>
						<input type="text" name="b_pre_address" value="<?php echo isset($info['b_pre_address'])?$info['b_pre_address']:''; ?>" style="width: 66%;">
						<label><input type="checkbox" name="b_address_check" <?php echo ($info['b_address_check'] == "own") ? "checked" : ""; ?> value="own"/> OWN</label><br>
						<label style="float: right; margin-top: -24px;"><input type="checkbox" name="b_address_check" <?php echo ($info['b_address_check'] == "rent") ? "checked" : ""; ?> value="rent"/>  RENT</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
						<label>HOW LONG THERE </label>
						<input type="text" name="b_long" value="<?php echo isset($info['b_long'])?$info['b_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 57%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>APPLICANTS EMPLOYER</label>
						<input type="text" name="b_app_employer" value="<?php echo isset($info['b_app_employer'])?$info['b_app_employer']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>YEARS</label>
						<input type="text" name="b_app_year" value="<?php echo isset($info['b_app_year'])?$info['b_app_year']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>POSITION </label>
						<input type="text" name="b_app_position" value="<?php echo isset($info['b_app_position'])?$info['b_app_position']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS</label>
						<input type="text" name="b_emp_address1" value="<?php echo isset($info['b_emp_address1'])?$info['b_emp_address1']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>PHONE NO. </label>
						<input type="text" name="b_emp_phone1" value="<?php echo isset($info['b_emp_phone1'])?$info['b_emp_phone1']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 57%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS (IF WITH PRESENT ADDRESS LESS THAN 5 YEARS)</label>
						<input type="text" name="b_emp_address" value="<?php echo isset($info['b_emp_address'])?$info['b_emp_address']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 62px;">
						<label>YEARS</label>
						<input type="text" name="b_emp_year" value="<?php echo isset($info['b_emp_year'])?$info['b_emp_year']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>POSITION </label>
						<input type="text" name="b_emp_position" value="<?php echo isset($info['b_emp_position'])?$info['b_emp_position']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>EMPLOYERS ADDRESS</label>
						<input type="text" name="b_emp_address2" value="<?php echo isset($info['b_emp_address2'])?$info['b_emp_address2']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px;">
						<label>PHONE NO. </label>
						<input type="text" name="b_emp_phone2" value="<?php echo isset($info['b_emp_phone2'])?$info['b_emp_phone2']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>GROSS MONTHLY SALARY</label>
						<input type="text" name="b_salary" value="<?php echo isset($info['b_salary'])?$info['b_salary']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 2px;">
						<label>OTHER INCOME<sup>*</sup> </label>
						<input type="text" name="b_income" value="<?php echo isset($info['b_income'])?$info['b_income']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label>SOURCE OF OTHER INCOME <sup>*</sup></label>
						<input type="text" name="b_source" value="<?php echo isset($info['b_source'])?$info['b_source']:''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 2px;">
						<label>TOTAL GROSS INCOME<sup>*</sup> </label>
						<input type="text" name="b_gross" value="<?php echo isset($info['b_gross'])?$info['b_gross']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 3px;">
			<p style="margin: 0; float: left; width: 100%; font-size: 14px; text-align: center;"><b>*INCOME FROM ALIMONY, CHILD SUPPORT OR SEPARATE MAINTENANACE NEED NOT BE REVEALED IF YOU DO NOT WISH TO HAVE IT CONSIDERED FOR REPAYING THIS OBLIGATION. IF YOU WISH TO REVEAL SUCH INCOME HOW MUCH DO YOU RECEIVE MONTHLY?</b></p>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 0; text-align: center;">
					<label><b>RECEIVED UNDER</b></label>
					<label><input type="checkbox" name="received_check" <?php echo ($info['received_check'] == "court") ? "checked" : ""; ?> value="court"/> COURT ORDER</label>
					<label style="margin: 0 5%;"><input type="checkbox" name="received_check" <?php echo ($info['received_check'] == "agreement") ? "checked" : ""; ?> value="agreement"/> WRITTEN AGREEMENT</label>
					<label><input type="checkbox" name="received_check" <?php echo ($info['received_check'] == "oral") ? "checked" : ""; ?> value="oral"/> ORAL AGREEMENT</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 3px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>NAME AND ADDRESS OF NEAREST RELATIVE NOT LIVING WITH YOU</label>
				<input type="text" name="nearest" value="<?php echo isset($info['nearest'])?$info['nearest']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 3px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>DID YOU PREVIOUSLY OWN SAME TYPE OF UNIT BEING PURCHASED?</label>
				<input type="text" name="unit_type" value="<?php echo isset($info['unit_type'])?$info['unit_type']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>HAVE YOU EVER HAD REPOSSESSION? HAVE YOU HAD ANY JUDGEMENTS ENETERED</label>
				<input type="text" name="judgement" value="<?php echo isset($info['judgement'])?$info['judgement']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px;">
				<label style="font-size: 10px;">ARE THERE ANY LAWSUITS AGAINST YOU HAVE YOU EVER BEN DECLARED BANKRUPT (CHAPTER)</label>
				<input type="text" name="declared" value="<?php echo isset($info['declared'])?$info['declared']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<h2 class="bg second-page" style="border: 1px solid #000; float: left; width: 100%; text-align: center; margin: 0; font-size: 17px; background-color: #000; color: #fff; padding: 10px; box-sizing: border-box;">DEALER INFORMATION</h2>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>DEALER NAME </label>
				<input type="text" name="dealer" value="<?php echo $dealer; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>LOCATION</label>
				<input type="text" name="location" value="<?php echo isset($info['location'])?$info['location']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>SALESMAN</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<label>PHONE NO:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="margin-right: 10%;">YEAR/ MAKE UNIT </label>
				<label> <input type="checkbox" name="unit_check" <?php echo ($info['unit_check'] == "new") ? "checked" : ""; ?> value="new"/> NEW</label>
				<label> <input type="checkbox" name="unit_check" <?php echo ($info['unit_check'] == "used") ? "checked" : ""; ?> value="used"/> USED</label>
				<input type="text" name="used" value="<?php echo isset($info['used'])?$info['used']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label style="display: block;">CASH SELLING</label>
				<label>PRICE $</label>
				<input type="text" name="cash_sell" value="<?php echo isset($info['cash_sell'])?$info['cash_sell']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>TRADE-IN YEAR</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<label>WHERE UNIT TO BE RELOCATED</label>
				<input type="text" name="relocated" value="<?php echo isset($info['relocated'])?$info['relocated']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>MODEL</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>SIZE</label>
						<input type="text" name="size" value="<?php echo isset($info['size'])?$info['size']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">TAXES $</label>
				<input type="text" name="taxe" value="<?php echo isset($info['taxe'])?$info['taxe']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>MODEL-SIZE</label>
				<input type="text" name="model_size" value="<?php echo isset($info['model_size'])?$info['model_size']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>CITY</label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>STATE</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>INVOICES COST <input type="checkbox" name="invoice_check" <?php echo ($info['invoice_check'] == "invoice") ? "checked" : ""; ?> value="invoice"/></label> <br>
				<label style="margin: -6px 0 0 0;">APPRAISAL <input type="checkbox" name="appraisal_check" <?php echo ($info['appraisal_check'] == "appraisal") ? "checked" : ""; ?> value="appraisal"/></label> <br>
				<label style="margin: -6px 0 0 0;">BOOKVALUE <input type="checkbox" name="book_check" <?php echo ($info['book_check'] == "book") ? "checked" : ""; ?> value="book"/></label>
			</div>
			<div class="form-field" style="float: left; width: 22%; height: 68px; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">FEES $</label>
				<input type="text" name="fee" value="<?php echo isset($info['fee'])?$info['fee']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;height: 68px;">
				<label style="display: block;">A. DEALER</label>
				<label>ALLOWANCE $</label>
				<input type="text" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 52%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>COUNTY</label>
						<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>RENT $</label>
						<input type="text" name="rent" value="<?php echo isset($info['rent'])?$info['rent']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="margin: 0; float: left; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">EXTRA EQUIPMENT</label>
				<label>AT DEALER COST $</label>
				<input type="text" name="dealer_cost" value="<?php echo isset($info['dealer_cost'])?$info['dealer_cost']:''; ?>" style="width: 47%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">CASH SELLING</label>
				<label>DOWN PAYMENT $</label>
				<input type="text" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 42%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>B. LESS PAY OFF</label>
				<input type="text" name="pay_off" value="<?php echo isset($info['pay_off'])?$info['pay_off']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<label>INSURANCE CO.</label>
				<input type="text" name="insurance" value="<?php echo isset($info['insurance'])?$info['insurance']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">TOTAL DEALER</label>
				<label>COST VALUE $</label>
				<input type="text" name="cost_value" value="<?php echo isset($info['cost_value'])?$info['cost_value']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>UNPAID BALANCES $</label>
				<input type="text" name="unpaid_balance" value="<?php echo isset($info['unpaid_balance'])?$info['unpaid_balance']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">C. NET TRADE PAY</label>
				<label>A - B</label>
				<input type="text" name="trade_pay" value="<?php echo isset($info['trade_pay'])?$info['trade_pay']:''; ?>" style="width: 80%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<label>AGENT</label>
				<input type="text" name="agent" value="<?php echo isset($info['agent'])?$info['agent']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 53%;">
						<label style="display: block;">FIGURES ON</label>
						<label>CONTRACT</label>
						<input type="text" name="figure" value="<?php echo isset($info['figure'])?$info['figure']:''; ?>" style="width: 46%;">
					</div>
					<div class="form-field" style="float: left; width: 20%;">
						<label>TERM</label>
						<input type="text" name="term" value="<?php echo isset($info['term'])?$info['term']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 27%;">
						<label>PAYMENT</label>
						<input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label style="display: block;">INSURANCE AMOUNT $</label>
				<input type="text" name="insurance" value="<?php echo isset($info['insurance'])?$info['insurance']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>D. CASH DOWN</label>
				<input type="text" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>PHONE NO</label>
					<input type="text" name="phone_no" value="<?php echo isset($info['phone_no'])?$info['phone_no']:''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin: 0; float: left; width: 100%; border: 1px solid #000; border-top: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 58px;">
				<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 60%;">
						<label>RATE</label>
						<input type="text" name="rate" value="<?php echo isset($info['rate'])?$info['rate']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 40%;">
						<label>APPROVED BY:</label>
						<input type="text" name="approved_by" value="<?php echo isset($info['approved_by'])?$info['approved_by']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="form-field" style="float: left; width: 22%; height: 58px; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block;">AMOUNT  TO FINANCE $</label>
				<input type="text" name="amount_finance" value="<?php echo isset($info['amount_finance'])?$info['amount_finance']:''; ?>" style="width: 70%;">
			</div>
					
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000; height: 58px;">
				<label>TOTAL C & D</label>
				<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;">
			</div>
					
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 2px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="width: 40%; display: block; float: left;"> PRIMARY</label>
					<label> <input type="checkbox" name="pleasure_check" <?php echo ($info['pleasure_check'] == "pleasure") ? "checked" : ""; ?> value="pleasure"/> PLEASURE</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: -6px 0 0 0;">
					<label style="width: 40%; display: block; float: left;"> USE OF</label>
					<label> <input type="checkbox" name="pleasure_check" <?php echo ($info['pleasure_check'] == "live_in") ? "checked" : ""; ?> value="live_in"/> LIVE-IN</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: -6px 0 0 0;">
					<label style="width: 40%; display: block; float: left;"> UNIT</label>
					<label> <input type="checkbox" name="pleasure_check" <?php echo ($info['pleasure_check'] == "comm") ? "checked" : ""; ?> value="comm"/> COMM/BUSINESS</label>
				</div>
			</div>
		</div>
		
		
		<p style="font-size: 12px; float: left;  width: 100%; margin: 0; padding: 5px; border: 1px solid #000; border-top: 0px; box-sizing: border-box;"><b style="font-size: 14px;">CERTIFICATION, ACKNOWLEDGEMENT AND CONSENT</b> <br>
THE UNDERSIGNED INDIVIDUAL(S) CERTIFY, ACKNOWLEDGE AND CONSENT TO THE FOLLOWING: <br>
THE ABOVE INFORMATION IS COMPLETE, TRUE AND CORRECT.<br>
IT IS A FEDERAL CRIME TO INTENTIONALLY GIVE FALSE STATEMENTS TO INDUCE A LENDER TO EXTEND CREDIT. LENDER IS AUTHORIZED TO CONTACT ANY PARTY
LISTED HEREIN AND ANY OTHER NORMAL SOURCE OF CREDIT INFORMATION. ANY PARTY SO CONTACTED IS AUTHORIZED TO FURNISH SUCH INFORMATION TO
LENDER AS LENDER MAY REQUEST. LENDER WILL RETAIN THIS APPLICATION AND ANY OTHER CREDIT INFORMATION LENDER RECIEVES WHETHER OR NOT CREDIT</br>
IS<br>
EXTENDED, LENDER IS AUTHORIZED TO GIVE CREDIT INFORMATION TO ITS AFFILIATES. THIS CERTIFICATION, ACKNOWLEDGEMENT AND CONSENT EXTEND NOT
ONLY<br>
IMPORTANT INFORMATION ABOUR PROCEDURES FOR OPENING A NEW ACCOUNT:<br>
TO HELP THE GOVERNMENT FIGHT THE FUNDING OR TERRORISM AND MONEY LAUNDERING ACTIVITIES, FEDERAL LAW REQUIRES ALL FINANCIAL INSTITUTIONS TO
OBSTAIN, VERIFY AND RECORD INFORMATION THAT IDENTIFIES EACH PERSON WHO OPENS AN ACCOUNT, WHAT THIS MEANS TO YOU: WHEN YOU OPEN AN<br>
ACCOUNT,</br>
WE WILL ASK YOUR NAME, ADDRESS, DATE OF BIRTH, AND OTHER INFORMATION THAT WILL ALLOW US TO IDENTIFY YOU. WE MAY ALSO ASK TO SEE YOUR</p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>APPLICANT'S SIGNATURE</b></label>
				<input type="text" name="app_sign" value="<?php echo isset($info['app_sign'])?$info['app_sign']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label><b>DATE</b></label>
				<input type="text" name="app_date" value="<?php echo isset($info['app_date'])?$info['app_date']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>COAPPLICANT'S SIGNATURE</b></label>
				<input type="text" name="coapp_sign" value="<?php echo isset($info['coapp_sign'])?$info['coapp_sign']:''; ?>" style="width: 46%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label><b>DATE</b></label>
				<input type="text" name="coapp_date" value="<?php echo isset($info['coapp_date'])?$info['coapp_date']:''; ?>" style="width: 73%; border-bottom: 1px solid #000;">
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
