<?php
//This Credit App Mapped Author: Abha Sood Negi

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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

		.container{width: 960px; margin: 0 auto; font-size: 12px;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 12px; font-weight: normal; margin: 0;}
	textarea{width: 96%; border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 100px;}
	td input[type="text"]{width: 100%; border: 0px; text-align: center;}
	td{text-align: center; border-right: 1px solid #000; border-top: 1px solid #000;}
	.one-half-table input {padding: 6px;}
	.wraper.main input {padding: 1px;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	textarea{width: 96%; border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 100px;}
	.a-application input[type="text"], .lower-section input[type="text"]{border: 0px;}
	.part{font-size: 14px;}
	.from-field {font-size: 12px;}
	@media print { 
	.dontprint{display: none;}
	.sm-margin{margin-bottom: 116px !important;}
	.third-page{margin-bottom: 60% !important;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container">
			<div class="row" style="float: left; width: 100%;">
				<!--<div class="logo" style="float: right; width: 200px">
					<img src="images/logo.png" alt="">
				</div>-->
				<!-- inner start -->
				<div class="inner" style="float: left; width: 100%; border: 1px solid #000;">
					<h2 style="float: left; width: 100%; border-bottom: 1px solid #000; font-size: 16px; margin:0; box-sizing: border-box; padding: 6px 10px;">PLEASE PRINT . INCOMPLETE APPLICATION WILL NOT BE PROCESSED</h2>
					<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="left" style="float: left; width: 49%; padding: 1%;">
						<span>INSTRUCTIONS</span>
						<p style="margin: 0; font-size: 13px;">You may apply for credit in your alone, whether or not you are married.</p>
						<p style="margin: 0; font-size: 13px;">
							1) Please indicate whether you are applying for 
							<input type="checkbox" name="individual_credit" value="yes" <?php echo (isset($info['individual_credit'])&&$info['individual_credit']=='yes')?'checked="checked"':''; ?> /> Individual Credit 
							<input type="checkbox" name="joint_credit" value="yes" <?php echo (isset($info['joint_credit'])&&$info['joint_credit']=='yes')?'checked="checked"':''; ?> /> Joint Credit
						</p>
						<p style="margin: 0; font-size: 13px;">
							<span style="display: inline-block; margin: 2px 0 2px 14px;">
								<input type="checkbox" name="community_property_state" value="yes" <?php echo (isset($info['community_property_state'])&&$info['community_property_state']=='yes')?'checked="checked"':''; ?> /> Community Property State
							</span>
							<span style="display: inline-block; margin: 2px 0 2px ;">
								<input type="checkbox" name="business_application" value="yes" <?php echo (isset($info['business_application'])&&$info['business_application']=='yes')?'checked="checked"':''; ?> /> Business Application
							</span>
						</p>
						<p style="margin: 0; font-size: 13px;">2) 
							<input type="checkbox" name="section_a" value="yes" <?php echo (isset($info['section_a'])&&$info['section_a']=='yes')?'checked="checked"':''; ?> /> If you are applying for individual credit in your name and relying on your own income or assets and not the income or assests of another person as the basis for repayment of the credit requested, complete only Section A.
						</p>
					</div>
					<div class="right" style="float: right; width: 48%;">
						<p style="margin: 0; font-size: 13px;">
							<input type="checkbox" name="section_a_b" value="yes" <?php echo (isset($info['section_a_b'])&&$info['section_a_b']=='yes')?'checked="checked"':''; ?> /> If you are applying for joint credit with another person, complete sections A and B. We intend to apply for joint credit.
						</p>
						<div class="outer" style="text-align: center;">
							<div class="form-field" style="width: 36%; display: inline-block;">
								<label>Applicant</label>
								<input type="text" name="applicant" value="<?php echo isset($info['applicant']) ? $info['applicant'] : ''; ?>" style="width: 60%">
							</div>
							<div class="form-field" style="width: 40%; display: inline-block; margin: 2% 2%">
								<label>Co-Applicant</label>
								<input type="text" name="co_applicant" value="<?php echo isset($info['co_applicant']) ? $info['co_applicant'] : ''; ?>" style="width: 55%">
							</div>
						</div>
						<p style="margin: 0; font-size: 13px;">If you are married and live 	in a community property state, please complete Section A about youself and Section B about your spouse. You must sign this application. Your spouse must sign this application only if she wishes to be a Co-Applicant.</p>
					</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<h2 style="float: left; width: 100%; font-size: 18px; margin: 0; border-top: 1px solid #000;; border-bottom: 1px solid #000; padding-left: 10px; box-sizing: border-box; background-color: #999;">A APPLICATION INFORMATION</h2>
						<!-- A APPLICTION START-->
							<div class="a-application" style="float: left; width: 100%;">
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 55%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 33%; float: left;">
											<label>Last Name</label>
											<input type="text" name="last_name" value="<?php echo isset($info['last_name']) ? $info['last_name'] : ''; ?>" style="width: 100%;">
										</div>
										<div class="from-field" style="width: 33%; float: left;">
											<label style="display: block; text-align: center;">First Name</label>
											<input type="text" name="first_name" value="<?php echo isset($info['first_name']) ? $info['first_name'] : ''; ?>" style="width: 100%;">
										</div>
										<div class="from-field" style="width: 33%; float: left;">
											<label style="float: right;">Middle Initial</label>
											<input type="text" name="middle_initial" value="<?php echo isset($info['middle_initial']) ? $info['middle_initial'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 25%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Social Security Number</label>
											<input type="text" name="social_security_number" value="<?php echo isset($info['social_security_number']) ? $info['social_security_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 17%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Birth Date</label>
											<input type="text" name="birth_date" value="<?php echo isset($info['birth_date']) ? $info['birth_date'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 33%; float: left;">
											<label>Address</label>
											<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Apt# / Suite #</label>
											<input type="text" name="apt_suite" value="<?php echo isset($info['apt_suite']) ? $info['apt_suite'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>P.O. Box</label>
											<input type="text" name="p_o_box" value="<?php echo isset($info['p_o_box']) ? $info['p_o_box'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Rural Route</label>
											<input type="text" name="rural_route" value="<?php echo isset($info['rural_route']) ? $info['rural_route'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>City</label>
											<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>State</label>
											<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Zip</label>
											<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 14%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Home Phone</label>
											<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Cell Phone</label>
											<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 33%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Residential Status</label>
											<span>
												<input type="checkbox" name="homeowner" value="yes" <?php echo (isset($info['homeowner'])&&$info['homeowner']=='yes')?'checked="checked"':''; ?> /> Homeowner
											</span>
											<span>
												<input type="checkbox" name="rent" value="yes" <?php echo (isset($info['rent'])&&$info['rent']=='yes')?'checked="checked"':''; ?> /> 
												Rent
											</span>
											<span>
												<input type="checkbox" name="family" value="yes" <?php echo (isset($info['family'])&&$info['family']=='yes')?'checked="checked"':''; ?> /> Family
											</span>
											<span>
												<input type="checkbox" name="other" value="yes" <?php echo (isset($info['other'])&&$info['other']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="width: 100%; display: block;">Time at address</label>
											<input type="text" name="yrs_time_address" value="<?php echo isset($info['yrs_time_address']) ? $info['yrs_time_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="mos_time_address" value="<?php echo isset($info['mos_time_address']) ? $info['mos_time_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block; width: 100%;">&nbsp;</label>
											<label>Rent/Mfg. Pmt.</label>
											<input type="text" name="rent_mfg" value="<?php echo isset($info['rent_mfg']) ? $info['rent_mfg'] : ''; ?>" style="width: 48%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 40%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>E-Mail Address</label>
											<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Driver's License No.</label>
											<input type="text" name="driver_license_no" value="<?php echo isset($info['driver_license_no']) ? $info['driver_license_no'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="border-right: 1px solid #000; float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Driver's License State</label>
											<input type="text" name="driver_license_state" value="<?php echo isset($info['driver_license_state']) ? $info['driver_license_state'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Time at Previous Address</label>
											<input type="text" name="yrs_time_previous_address" value="<?php echo isset($info['yrs_time_previous_address']) ? $info['yrs_time_previous_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="mos_time_previous_address" value="<?php echo isset($info['mos_time_previous_address']) ? $info['mos_time_previous_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Full Address(If less than 2 Years)</label>
											<input type="text" name="previous_address" value="<?php echo isset($info['previous_address']) ? $info['previous_address'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Apt# / Suite #</label>
											<input type="text" name="apt_suite1" value="<?php echo isset($info['apt_suite1']) ? $info['apt_suite1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>P.O. Box</label>
											<input type="text" name="p_o_box1" value="<?php echo isset($info['p_o_box1']) ? $info['p_o_box1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Rural Route</label>
											<input type="text" name="rural_route_1" value="<?php echo isset($info['rural_route_1']) ? $info['rural_route_1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>City</label>
											<input type="text" name="city1" value="<?php echo isset($info['city1']) ? $info['city1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>State</label>
											<input type="text" name="state1" value="<?php echo isset($info['state1']) ? $info['state1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Zip</label>
											<input type="text" name="zip1" value="<?php echo isset($info['zip1']) ? $info['zip1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Employer Name</label>
											<input type="text" name="employer_name" value="<?php echo isset($info['employer_name']) ? $info['employer_name'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 70%; margin: 0; padding-left: 1%; ">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Employer Type</label>
											<span>
												<input type="checkbox" name="employed" value="yes" <?php echo (isset($info['employed'])&&$info['employed']=='yes')?'checked="checked"':''; ?> /> Employed
											</span>
											<span>
												<input type="checkbox" name="unemployed" value="yes" <?php echo (isset($info['unemployed'])&&$info['unemployed']=='yes')?'checked="checked"':''; ?> /> Unemployed
											</span>
											<span>
												<input type="checkbox" name="self_employed" value="yes" <?php echo (isset($info['self_employed'])&&$info['self_employed']=='yes')?'checked="checked"':''; ?> /> Self-employed
											</span>
											<span>
												<input type="checkbox" name="military" value="yes" <?php echo (isset($info['military'])&&$info['military']=='yes')?'checked="checked"':''; ?> /> Military
											</span>
											<span>
												<input type="checkbox" name="retired" value="yes" <?php echo (isset($info['retired'])&&$info['retired']=='yes')?'checked="checked"':''; ?> /> Retired
											</span>
											<span>
												<input type="checkbox" name="student" value="yes" <?php echo (isset($info['student'])&&$info['student']=='yes')?'checked="checked"':''; ?> /> Student
											</span>
											<span>
												<input type="checkbox" name="other1" value="yes" <?php echo (isset($info['other1'])&&$info['other1']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 8%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Salary</label>
											<input type="text" name="salary" value="<?php echo isset($info['salary']) ? $info['salary'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 34%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Salary Type</label>
											<span>
												<input type="checkbox" name="weekly" value="yes" <?php echo (isset($info['weekly'])&&$info['weekly']=='yes')?'checked="checked"':''; ?> /> Weekly
											</span>
											<span>
												<input type="checkbox" name="bi_weekly" value="yes" <?php echo (isset($info['bi_weekly'])&&$info['bi_weekly']=='yes')?'checked="checked"':''; ?> /> Bi-Weekly
											</span>
											<span>
												<input type="checkbox" name="monthly" value="yes" <?php echo (isset($info['monthly'])&&$info['monthly']=='yes')?'checked="checked"':''; ?> /> Monthly
											</span>
											<span>
												<input type="checkbox" name="annually" value="yes" <?php echo (isset($info['annually'])&&$info['annually']=='yes')?'checked="checked"':''; ?> /> Annually
											</span>
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; border-right: 1px solid #000; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Occupation</label>
											<input type="text" name="occupation" value="<?php echo isset($info['occupation']) ? $info['occupation'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									
									<div class="part" style="border-right: 1px solid #000; float: left; width: 19%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Length of Employment</label>
											<input type="text" name="employment_yrs" value="<?php echo isset($info['employment_yrs']) ? $info['employment_yrs'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="employment_mos" value="<?php echo isset($info['employment_mos']) ? $info['employment_mos'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									<div class="part" style="float: left; padding-left: 1%; width: 15%; margin: 0;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Work Phone Number</label>
											<input type="text" name="work_phone_number" value="<?php echo isset($info['work_phone_number']) ? $info['work_phone_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 29%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Employer Name</label>
											<input type="text" name="previous_employer_name" value="<?php echo isset($info['previous_employer_name']) ? $info['previous_employer_name'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 61%; margin: 0; padding-left: 1%; ">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;"> Previous Employer Type</label>
											<span>
												<input type="checkbox" name="employed1" value="yes" <?php echo (isset($info['employed1'])&&$info['employed1']=='yes')?'checked="checked"':''; ?> /> Employed
											</span>
											<span>
												<input type="checkbox" name="unemployed1" value="yes" <?php echo (isset($info['unemployed1'])&&$info['unemployed1']=='yes')?'checked="checked"':''; ?> /> Unemployed
											</span>
											<span>
												<input type="checkbox" name="self_employed1" value="yes" <?php echo (isset($info['self_employed1'])&&$info['self_employed1']=='yes')?'checked="checked"':''; ?> /> Self-employed
											</span>
											<span>
												<input type="checkbox" name="military1" value="yes" <?php echo (isset($info['military1'])&&$info['military1']=='yes')?'checked="checked"':''; ?> /> Military
											</span>
											<span>
												<input type="checkbox" name="retired1" value="yes" <?php echo (isset($info['retired1'])&&$info['retired1']=='yes')?'checked="checked"':''; ?> /> Retired
											</span>
											<span>
												<input type="checkbox" name="student1" value="yes" <?php echo (isset($info['student1'])&&$info['student1']=='yes')?'checked="checked"':''; ?> /> Student
											</span>
											<span>
												<input type="checkbox"  name="other2" value="yes" <?php echo (isset($info['other2'])&&$info['other2']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Occupation</label>
											<input type="text" name="previous_occupation" value="<?php echo isset($info['previous_occupation']) ? $info['previous_occupation'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									
									<div class="part" style="float: left; width: 20%; border-right: 1px solid #000; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Length of Employment</label>
											<input type="text" name="yrs_length_employment" value="<?php echo isset($info['yrs_length_employment']) ? $info['yrs_length_employment'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="mos_length_employment" value="<?php echo isset($info['mos_length_employment']) ? $info['mos_length_employment'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									
									<div class="part" style="float: left; width: 48%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Work Phone Number</label>
											<input type="text" name="previous_work_phone_number" value="<?php echo isset($info['previous_work_phone_number']) ? $info['previous_work_phone_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								<p style="float: left; width: 100%; margin: 0;  border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 10px; font-size: 13px;"> Almony, child support or separate maintenance income need not be revealed if you do not choose to have it considered as a basis for repaying this obligation.</p>
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 25%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Other Income (Monthly)</label>
											<input type="text" name="other_income_monthly" value="<?php echo isset($info['other_income_monthly']) ? $info['other_income_monthly'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 70%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Source of Other Income</label>
											<input type="text" name="source_other_income" value="<?php echo isset($info['source_other_income']) ? $info['source_other_income'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
							</div>
						<!-- A APPLICTION END-->
						
						<!-- B APPLICTION START-->
						<h2 style="float: left; width: 100%; font-size: 18px; margin: 0; border-bottom: 1px solid #000; padding-left: 10px; box-sizing: border-box; background-color: #999;">B CO-APPLICANT INFORMATION</h2>
						
							<div class="a-application" style="float: left; width: 100%;">
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 45%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 33%; float: left;">
											<label>Last Name</label>
											<input type="text" name="b_last_name" value="<?php echo isset($info['b_last_name']) ? $info['b_last_name'] : ''; ?>" style="width: 100%;">
										</div>
										<div class="from-field" style="width: 33%; float: left;">
											<label style="display: block; text-align: center;">First Name</label>
											<input type="text" name="b_first_name" value="<?php echo isset($info['b_first_name']) ? $info['b_first_name'] : ''; ?>" style="width: 100%;">
										</div>
										<div class="from-field" style="width: 33%; float: left;">
											<label style="float: right;">Middle Initial</label>
											<input type="text" name="b_middle_initial" value="<?php echo isset($info['b_middle_initial']) ? $info['b_middle_initial'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 25%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Social Security Number</label>
											<input type="text" name="b_social_securitynumber" value="<?php echo isset($info['b_social_securitynumber']) ? $info['b_social_securitynumber'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Birth Date</label>
											<input type="text" name="b_birth_date" value="<?php echo isset($info['b_birth_date']) ? $info['b_birth_date'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Relationship</label>
											<input type="text" name="b_birth_date" value="<?php echo isset($info['b_birth_date']) ? $info['b_birth_date'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 33%; float: left;">
											<label>Address</label>
											<input type="text" name="b_address" value="<?php echo isset($info['b_address']) ? $info['b_address'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Apt# / Suite #</label>
											<input type="text" name="b_apt_suite" value="<?php echo isset($info['b_apt_suite']) ? $info['b_apt_suite'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>P.O. Box</label>
											<input type="text" name="b_p_o_box" value="<?php echo isset($info['b_p_o_box']) ? $info['b_p_o_box'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Rural Route</label>
											<input type="text" name="b_rural_route" value="<?php echo isset($info['b_rural_route']) ? $info['b_rural_route'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>City</label>
											<input type="text" name="b_city" value="<?php echo isset($info['b_city']) ? $info['b_city'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>State</label>
											<input type="text" name="b_state" value="<?php echo isset($info['b_state']) ? $info['b_state'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Zip</label>
											<input type="text" name="b_zip" value="<?php echo isset($info['b_zip']) ? $info['b_zip'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 14%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Home Phone</label>
											<input type="text" name="b_home_phone" value="<?php echo isset($info['b_home_phone']) ? $info['b_home_phone'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Cell Phone</label>
											<input type="text" name="b_cell_phone" value="<?php echo isset($info['b_cell_phone']) ? $info['b_cell_phone'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 33%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Residential Status</label>
											<span>
												<input type="checkbox" name="b_homeowner" value="yes" <?php echo (isset($info['b_homeowner'])&&$info['b_homeowner']=='yes')?'checked="checked"':''; ?> /> Homeowner
											</span>
											<span>
												<input type="checkbox" name="b_rent" value="yes" <?php echo (isset($info['b_rent'])&&$info['b_rent']=='yes')?'checked="checked"':''; ?> /> Rent
											</span>
											<span>
												<input type="checkbox" name="b_family" value="yes" <?php echo (isset($info['b_family'])&&$info['b_family']=='yes')?'checked="checked"':''; ?> /> Family
											</span>
											<span>
												<input type="checkbox" name="b_other" value="yes" <?php echo (isset($info['b_other'])&&$info['b_other']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="width: 100%; display: block;">Time at address</label>
											<input type="text" name="b_yrs_time_address" value="<?php echo isset($info['b_yrs_time_address']) ? $info['b_yrs_time_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="b_mos_time_address" value="<?php echo isset($info['b_mos_time_address']) ? $info['b_mos_time_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block; width: 100%;">&nbsp;</label>
											<label>Rent/Mfg. Pmt.</label>
											<input type="text" name="b_rent_mfg" value="<?php echo isset($info['b_rent_mfg']) ? $info['b_rent_mfg'] : ''; ?>" style="width: 48%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 40%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>E-Mail Address</label>
											<input type="text" name="b_email" value="<?php echo isset($info['b_email']) ? $info['b_email'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Driver's License No.</label>
											<input type="text" name="b_driver_license_no" value="<?php echo isset($info['b_driver_license_no']) ? $info['b_driver_license_no'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="border-right: 1px solid #000; float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Driver's License State</label>
											<input type="text" name="b_driver_license_state" value="<?php echo isset($info['b_driver_license_state']) ? $info['b_driver_license_state'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 20%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Time at Previous Address</label>
											<input type="text" name="b_yrs_time_previous_address" value="<?php echo isset($info['b_yrs_time_previous_address']) ? $info['b_yrs_time_previous_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="b_mos_time_previous_address" value="<?php echo isset($info['b_mos_time_previous_address']) ? $info['b_mos_time_previous_address'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Full Address(If less than 2 Years)</label>
											<input type="text" name="b_previous_address" value="<?php echo isset($info['b_previous_address']) ? $info['b_previous_address'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Apt# / Suite #</label>
											<input type="text" name="b_apt_suite1" value="<?php echo isset($info['b_apt_suite1']) ? $info['b_apt_suite1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>P.O. Box</label>
											<input type="text" name="b_p_o_box1" value="<?php echo isset($info['b_p_o_box1']) ? $info['b_p_o_box1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Rural Route</label>
											<input type="text" name="b_rural_route_1" value="<?php echo isset($info['b_rural_route_1']) ? $info['b_rural_route_1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>City</label>
											<input type="text" name="b_city1" value="<?php echo isset($info['b_city1']) ? $info['b_city1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>State</label>
											<input type="text" name="b_state1" value="<?php echo isset($info['b_state1']) ? $info['b_state1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Zip</label>
											<input type="text" name="b_zip1" value="<?php echo isset($info['b_zip1']) ? $info['b_zip1'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Employer Name</label>
											<input type="text" name="b_employer_name" value="<?php echo isset($info['b_employer_name']) ? $info['b_employer_name'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 70%; margin: 0; padding-left: 1%; ">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Employer Type</label>
											<span>
												<input type="checkbox" name="b_employed" value="yes" <?php echo (isset($info['b_employed'])&&$info['b_employed']=='yes')?'checked="checked"':''; ?> /> Employed
											</span>
											<span>
												<input type="checkbox" name="b_unemployed" value="yes" <?php echo (isset($info['b_unemployed'])&&$info['b_unemployed']=='yes')?'checked="checked"':''; ?> /> Unemployed
											</span>
											<span>
												<input type="checkbox" name="b_self_employed" value="yes" <?php echo (isset($info['b_self_employed'])&&$info['b_self_employed']=='yes')?'checked="checked"':''; ?> /> Self-employed
											</span>
											<span>
												<input type="checkbox" name="b_military" value="yes" <?php echo (isset($info['b_military'])&&$info['b_military']=='yes')?'checked="checked"':''; ?> /> Military
											</span>
											<span>
												<input type="checkbox" name="b_retired" value="yes" <?php echo (isset($info['b_retired'])&&$info['b_retired']=='yes')?'checked="checked"':''; ?> /> Retired
											</span>
											<span>
												<input type="checkbox" name="b_student" value="yes" <?php echo (isset($info['b_student'])&&$info['b_student']=='yes')?'checked="checked"':''; ?> /> Student
											</span>
											<span>
												<input type="checkbox" name="b_other1" value="yes" <?php echo (isset($info['b_other1'])&&$info['b_other1']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 8%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Salary</label>
											<input type="text" name="b_salary" value="<?php echo isset($info['b_salary']) ? $info['b_salary'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 34%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;">Salary Type</label>
											<span>
												<input type="checkbox" name="b_weekly" value="yes" <?php echo (isset($info['b_weekly'])&&$info['b_weekly']=='yes')?'checked="checked"':''; ?> /> Weekly
											</span>
											<span>
												<input type="checkbox" name="b_bi_weekly" value="yes" <?php echo (isset($info['b_bi_weekly'])&&$info['b_bi_weekly']=='yes')?'checked="checked"':''; ?> /> Bi-Weekly
											</span>
											<span>
												<input type="checkbox" name="b_monthly" value="yes" <?php echo (isset($info['b_monthly'])&&$info['b_monthly']=='yes')?'checked="checked"':''; ?> /> Monthly
											</span>
											<span>
												<input type="checkbox" name="b_annually" value="yes" <?php echo (isset($info['b_annually'])&&$info['b_annually']=='yes')?'checked="checked"':''; ?> /> Annually
											</span>
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; border-right: 1px solid #000; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Occupation</label>
											<input type="text" name="b_occupation" value="<?php echo isset($info['b_occupation']) ? $info['b_occupation'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									
									<div class="part" style="border-right: 1px solid #000; float: left; width: 19%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Length of Employment</label>
											<input type="text" name="b_employment_yrs" value="<?php echo isset($info['b_employment_yrs']) ? $info['b_employment_yrs'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="b_employment_mos" value="<?php echo isset($info['b_employment_mos']) ? $info['b_employment_mos'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									<div class="part" style="float: left; padding-left: 1%; width: 15%; margin: 0;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Work Phone Number</label>
											<input type="text" name="b_work_phone_number" value="<?php echo isset($info['b_work_phone_number']) ? $info['b_work_phone_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 29%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Employer Name</label>
											<input type="text" name="b_previous_employer_name" value="<?php echo isset($info['b_previous_employer_name']) ? $info['b_previous_employer_name'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 61%; margin: 0; padding-left: 1%; ">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block;"> Previous Employer Type</label>
											<span>
												<input type="checkbox" name="b_employed1" value="yes" <?php echo (isset($info['b_employed1'])&&$info['b_employed1']=='yes')?'checked="checked"':''; ?> /> Employed
											</span>
											<span>
												<input type="checkbox" name="b_unemployed1" value="yes" <?php echo (isset($info['b_unemployed1'])&&$info['b_unemployed1']=='yes')?'checked="checked"':''; ?> /> Unemployed
											</span>
											<span>
												<input type="checkbox" name="b_self_employed1" value="yes" <?php echo (isset($info['b_self_employed1'])&&$info['b_self_employed1']=='yes')?'checked="checked"':''; ?> /> Self-employed
											</span>
											<span>
												<input type="checkbox" name="b_military1" value="yes" <?php echo (isset($info['b_military1'])&&$info['b_military1']=='yes')?'checked="checked"':''; ?> /> Military
											</span>
											<span>
												<input type="checkbox" name="b_retired1" value="yes" <?php echo (isset($info['b_retired1'])&&$info['b_retired1']=='yes')?'checked="checked"':''; ?> /> Retired
											</span>
											<span>
												<input type="checkbox" name="b_student1" value="yes" <?php echo (isset($info['b_student1'])&&$info['b_student1']=='yes')?'checked="checked"':''; ?> /> Student
											</span>
											<span>
												<input type="checkbox" name="b_other2" value="yes" <?php echo (isset($info['b_other2'])&&$info['b_other2']=='yes')?'checked="checked"':''; ?> /> Other
											</span>
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 28%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Occupation</label>
											<input type="text" name="b_previous_occupation" value="<?php echo isset($info['b_previous_occupation']) ? $info['b_previous_occupation'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									
									<div class="part" style="float: left; width: 20%; border-right: 1px solid #000; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left; text-align: center;">
											<label style="display: block; width: 100%; text-align: left;">Length of Employment</label>
											<input type="text" name="b_yrs_length_employment" value="<?php echo isset($info['b_yrs_length_employment']) ? $info['b_yrs_length_employment'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Yrs.</label>
											<input type="text" name="b_mos_length_employment" value="<?php echo isset($info['b_mos_length_employment']) ? $info['b_mos_length_employment'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
											<label>Mos.</label>
										</div>
									</div>
									
									<div class="part" style="float: left; width: 48%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Previous Work Phone Number</label>
											<input type="text" name="b_previous_work_phone_number" value="<?php echo isset($info['b_previous_work_phone_number']) ? $info['b_previous_work_phone_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<p style="float: left; width: 100%; margin: 0;  border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 10px; font-size: 14px;"> Almony, child support or separate maintenance income need not be revealed if you do not choose to have it considered as a basis for repaying this obligation.</p>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 25%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Other Income (Monthly)</label>
											<input type="text" name="b_other_income_monthly" value="<?php echo isset($info['b_other_income_monthly']) ? $info['b_other_income_monthly'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 70%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Source of Other Income</label>
											<input type="text" name="b_source_other_income" value="<?php echo isset($info['b_source_other_income']) ? $info['b_source_other_income'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
								</div>
								
								<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box;">
									<div class="part" style="float: left; width: 25%; margin: 0;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Comments</label>
											<textarea name="comments" style="width: 100%; height: 60px; border: 0px;">
												<?php echo isset($info['comments']) ? $info['comments'] : ''; ?>
											</textarea>
										</div>
									</div>
								</div>
							</div>
						<!-- B APPLICTION END-->
					</div>
					
				</div>
				<!-- inner end -->
				<p class="sm-margin" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box;"> I hereby consent to receive autodialed and/or pre-recorded telemarkting calls from or on behalf of dealer (for any financing source to which dealer assigns my contract) at the telephone numbers(s) provided in this credit application, including any cell phone numbers. I understand that this consent is not a condition of purchase or credit.</p>
				
				<!-- lower section start -->
				<div class="lower-section" style="float: left; width: 100%; margin: 10px 0 0; border: 1px solid #000;">
					<h2 style="font-size: 18px; background-color: #999; margin: 0; border-bottom: 1px solid #000; float: left; width: 100%; text-transform: uppercase; padding: 5px 0; text-align: center;">Dealer Section</h2>
					
					<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 10%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Dealer #</label>
											<input type="text" name="dealer" value="<?php echo isset($info['dealer']) ? $info['dealer'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Vehicle Type</label>
											<input type="text" name="vehicle_type" value="<?php echo isset($info['vehicle_type']) ? $info['vehicle_type'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Mileage</label>
											<input type="text" name="mileage" value="<?php echo isset($info['mileage']) ? $info['mileage'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Product Type</label>
											<input type="text" name="product_type" value="<?php echo isset($info['product_type']) ? $info['product_type'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Stock Number</label>
											<input type="text" name="stock_number" value="<?php echo isset($info['stock_number']) ? $info['stock_number'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 18%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Source</label>
											<input type="text" name="source" value="<?php echo isset($info['source']) ? $info['source'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="display: block; width: 100%;">&nbsp;</label>
											Certified Pre Owned <input type="checkbox" name="certified_pre_owned" value="yes" <?php echo (isset($info['certified_pre_owned'])&&$info['certified_pre_owned']=='yes')?'checked="checked"':''; ?> />
										</div>
									</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 7%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Year</label>
											<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 23%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Make</label>
											<input type="text" name="make" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 23%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Model</label>
											<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 23%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Trim</label>
											<input type="text" name="trim" value="<?php echo isset($info['trim']) ? $info['trim'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 17%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>VIN</label>
											<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
						</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 7%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Term</label>
											<input type="text" name="term" value="<?php echo isset($info['term']) ? $info['term'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 13%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Cash Selling Price</label>
											<input type="text" name="cash_selling_price" value="<?php echo isset($info['cash_selling_price']) ? $info['cash_selling_price'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 10%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Sales Tax</label>
											<input type="text" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 7%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>T & L</label>
											<input type="text" name="t_l" value="<?php echo isset($info['t_l']) ? $info['t_l'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 9%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Cash Down</label>
											<input type="text" name="cash_down" value="<?php echo isset($info['cash_down']) ? $info['cash_down'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 12%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Front-End Fees</label>
											<input type="text" name="front_end_fees" value="<?php echo isset($info['front_end_fees']) ? $info['front_end_fees'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 7%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Rebate</label>
											<input type="text" name="rebate" value="<?php echo isset($info['rebate']) ? $info['rebate'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 9%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Net Trade</label>
											<input type="text" name="net_trade" value="<?php echo isset($info['net_trade']) ? $info['net_trade'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 8%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Acq Fee</label>
											<input type="text" name="acq_fee" value="<?php echo isset($info['acq_fee']) ? $info['acq_fee'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 14%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Unpaid Balance</label>
											<input type="text" name="unpaid_balance" value="<?php echo isset($info['unpaid_balance']) ? $info['unpaid_balance'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
						</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 16%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Accident/Health Ins.</label>
											<input type="text" name="accident_health_ins" value="<?php echo isset($info['accident_health_ins']) ? $info['accident_health_ins'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 18%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Credit Life Insurance</label>
											<input type="text" name="credit_life_insurance" value="<?php echo isset($info['credit_life_insurance']) ? $info['credit_life_insurance'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Gap</label>
											<input type="text" name="gap" value="<?php echo isset($info['gap']) ? $info['gap'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Service Plan</label>
											<input type="text" name="service_plan" value="<?php echo isset($info['service_plan']) ? $info['service_plan'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Back-End Fees</label>
											<input type="text" name="back_end_fees" value="<?php echo isset($info['back_end_fees']) ? $info['back_end_fees'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 15%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Requested APR</label>
											<input type="text" name="requested_apr" value="<?php echo isset($info['requested_apr']) ? $info['requested_apr'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box; border-bottom: 1px solid #000;">
									<div class="part" style="float: left; width: 15%; margin: 0; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="width: 100%; display: block;">&nbsp;</label>
											Vehicle Bookouts <input type="checkbox" name="vehicle_bookouts" value="yes" <?php echo (isset($info['vehicle_bookouts'])&&$info['vehicle_bookouts']=='yes')?'checked="checked"':''; ?> />
										</div>
									</div>
									<div class="part" style="float: left; width: 13%; margin: 0; padding-left: 1%; border-right: 1px solid #000;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Bookout Date </label>
											<input type="text" name="bookout_date" value="<?php echo isset($info['bookout_date']) ? $info['bookout_date'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
									<div class="part" style="float: left; width: 66%; margin: 0; padding-left: 1%;">
										<div class="from-field" style="width: 100%; float: left;">
											<label>Lender Program</label>
											<input type="text" name="lender_program" value="<?php echo isset($info['lender_program']) ? $info['lender_program'] : ''; ?>" style="width: 100%;">
										</div>
									</div>
						</div>
						
						
						<div class="row" style="float: left; width: 100%; margin: 0; padding: 0 10px; box-sizing: border-box;">
									<div class="part" style="float: left; width: 90%; margin: 0;">
										<div class="from-field" style="width: 100%; float: left;">
											<label style="width: 100%; display: block;">Vehicle Options</label>
											<textarea name="vehicle_options" style="width: 100%; border:0; height: 100px;"><?php echo isset($info['vehicle_options']) ? $info['vehicle_options'] : ''; ?></textarea>	
										</div>
									</div>
						</div>
						
						
					
					
				</div>
				<!-- lower section end -->
				
				
				<h2 style=" float: left; width: 100%;text-transform: uppercase; font-size: 18px; text-align: center; margin-top: 30px;">Agreement</h2>
				<p class="third-page" style="margin: 0; font-size: 14px; float: left; width: 100%; text-align: justify;">You understand and agree that you are applying for credit by providing the Information to complete and submit this credit application. We may keep this application and any other application submitted to us and information about you whether or not the application is approved. You certify that the information on the application and in any other application submitted to us, is true and complete. You understand that fasle statements may subject you to criminal penalties. The words "you" "your" and "yours" mean each person submitting this application. The words "we" "us" "ours" as used below refer to us, the dealer, and to the financial institution(s) selected to receive your application. You authorize us to submit this application and any other application such financial Institutions on behalf of themselves and us the dealer. In accordance with the Fair Credit Reporting Act, you authorize will be reviewed by such financial institutions may submit your applications to other financial institutions for the purpose of fullfilling your request to apply for credit. You agree that we may obtain a consumer credit report periodically from one or more consumer reporting agencies (credit bureaus) in connection with the proposed transaction and any update, renewal, refinancing, modification or extension of that transaction. You also agree that we or any affiliate or ours may obtain one or more consumer credit reports on you at any time whatsoever.If you ask, you will be told whether a credit report was requested, and if so, the name and address of any credit bureau from which we or our affiliate obtained your credit report. You agree that we may verify your employment, pay, assets and debts, and that anyone receiving a copy of this is authorized to provide us with such information. Your futher authorize us to gather whatever credit and employment history we consider necessary and appropriate in evaluating this application and any other applications submitted in connection with the proposed transaction. You understand that we will rely on the information in this credit application in making our decision. We may monitor and record telephone calls regarding your account for quality assurance, compliance, training, or similar purposes.</p>
				
				<h2 style="float: left; width: 100%; margin: 60px 0 10px; font-size: 35px; text-align: center;"><span style="text-decoration: underline; text-align: center; display: block;">FEDERAL NOTICES</span></h2>
				<p style="margin: 0; font-size: 14px; float: left; width: 100%; text-align: justify;">IMPORTANT INFORMATION ABOUT PROCEDURES FOR OPENING A NEW ACCOUNT If applicable to your credit transaction, to help the government fight the funding of terrorism and money laundering activities, Federal law requires financial institutions to obtain, verify, and record information that identifies each person who opens an account. What this means for you: When you open an account, you will be asked for your name, address, date of birth and other information to identify you. You may also be asked to see your driver's license or other identifying documents.</p>
				
				<h2 style=" float: left; width: 100%;text-transform: uppercase; font-size: 18px; text-align: center; margin-top: 30px;">STATE NOTICES</h2>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">California Residents: An applicant if married, may apply for a separate account.</p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">Maine and Tennessee Residents: You must have physical damage insurance covering loss or damage to the vehicle for the term of the contract. For a lease, you must also have the liability Insurance as described in the lease. You may purchase required Insurance through any Insurance agent or broker and form any insurance company that is reasonably acceptable to us. You are not required to deal with any of our affiliates when choosing an agent, broker or insurer. Your choice of a particular Insurance agent, broker or Insurer will not affect our credit decision, so long as the insurance provides adequate coverage with an insurer who meets our reasonable requirements.</p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">New Hampshire Residents: If you are applying for a ballon payment contract, you are entitled, if you ask, to receive a written estimate of the monthy payment amount for refinancing the ballon payment in accord with the creditor's existing refinance programs. You would be entitled to receive the estimate before you enter into a ballon payment contract. A balloon contract is an installment sales contract with a final scheduled payment that is at least twice the amount of one of the earlier scheduled equal periodic installment payment.  </p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">New York Residents: In connection with your application for credit, a consumer report may be obtained from a consumer reporting agency (credit bureau), If credit is extended, the parties extending credit or holding such credit may order additional consumer reports in connection with any update, renewal or extension od the credit. If you ask, you will be told whether consumer report was requested and, if so, the name and address of any consumer reporting agency (credit bureau) from which such credit report was obtained. </p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">Ohio Residents: Ohio laws against discrimination require that all creditors make credit equally available to all creditworthy customers and that credit reporting agencies maintain separate cedit histories on each individual upon request. The Ohio Civial Rights Commission administers compliance with this law.</p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">Rhode Island Residents: Consumer reports may be requested In connection with this application. Buyer has the right of free choice In selecting an Insurer to provide insurance required in connection with this transaction subject to our reasonable approval in accordance with applicable law.</p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">Vermont Residents: You authorize us and any financial institution with which this credit application is shared, and each of their respective employees or agents. to obtain and verify information about you (including one or more credit reports, information about your employment and banking and credit relationships) that they may deem necessary or appropriate in evaluating your credit application. If your credit application is approved and credit is granted , you also authorize the parties granting credit or holding your account, increasing the available credit on the account (If applicable), taking collection on the account, or for any other legitimate purpose.</p>
				<p style="margin: 0 0 30px; font-size: 14px; float: left; width: 100%; text-align: justify;">Married Wisconsin Residents: No provision of any marital property agreement, any unilateral statement under Wis, Stat $ 766.59 or any court decree under $ 766.70 applied to marital property adversely affects our interest unless you fumish a copy of the agreement, statement, or court decree or we have actual knowledge of such adverse provision before credit is granted. If you are making this credit application individually and not jointly with your spouse, complete Section A about yourself and Section B about your non-applicant spouse. Your non-applicant spouse should not sign the credit application if you are applying for individual credit.</p>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 30px 0 10px;">
				<div class="form-field" style="width: 100%;">
					<label>The application may be submitted to the following financial Institutions (Name(s) and Address(es))</label>
					<input type="text" name="institutions_name" value="<?php echo isset($info['institutions_name']) ? $info['institutions_name'] : ''; ?>" style="width: 40%; float: right;">
					<input type="text" name="institutions_address" value="<?php echo isset($info['institutions_address']) ? $info['institutions_address'] : ''; ?>" style="width: 100%; margin-top: 10px;">
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; text-align: center; text-transform: uppercase; font-size: 12px; font-weight: bold; border: 1px solid #000; padding: 5px 0;">BY SIGNING BELOW, YOU CERTIFY THAT YOU HAVE READ AND AGREE TO THE TERMS AND DISCLOSURES ON THE PAGES OF THIS APPLICATION</h2>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 34%; position: relative;">
					<label style="position: absolute; left:0px; top: 0;">X</label>
					<input type="text" name="x" value="<?php echo isset($info['x']) ? $info['x'] : ''; ?>" style="border-bottom: 1px solid #000; width: 100%; ">
					<label style="display: block; width: 100%; text-align: center;">APPLICANTS SIGNATURE</label>
				</div>
				<div class="form-field" style="float: left; width: 15%; margin: 0 1%;">
					<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="border-bottom: 1px solid #000; width: 100%;">
					<label style="display: block; width: 100%; text-align: center;">DATE</label>
				</div>
				<div class="form-field" style="float: left; width: 33%; position: relative;">
					<label style="position: absolute; left:0px; top: 0;">X</label>
					<input type="text" name="x2" value="<?php echo isset($info['x2']) ? $info['x2'] : ''; ?>" style="border-bottom: 1px solid #000; width: 100%; ">
					<label style="display: block; width: 100%; text-align: center;">CO-APPLICANTS SIGNATURE</label>
				</div>
				<div class="form-field" style="float: right; width: 15%; margin: 0 0 0 1% ;">
					<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
					<label style="display: block; width: 100%; text-align: center;">DATE</label>
				</div>
				</div>
			</div>
		
		<!-- container end -->
		
			
	
	</div>
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
