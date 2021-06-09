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
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px;}
	td, th{padding: 0px; border-bottom: 0px solid #000;}
	td:first-child{border-left: 0px solid #000;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	.cover input[type="text"]{border: 0px;}
	.no-border input[type="text"]{border: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 50% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="logo" style="width: 120px; float: left; margin-left: 16%; position: relative; top: -8px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-gold-store.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 38%; text-align: center;">
				RV GENERAL STORE <br> 3333 N. MERIDIAN AVE.<br> NEWCASTLE, OK  73065 <br> PH: (405)392-3700  FAX: (405)392-5444
			</div>
			<div class="logo" style="width: 265px; float: left; margin: 20px 0 0 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-wf-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0 0 20px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="font-size: 16px; padding: 5px;"><b>(A)</b></label>
						<p style="width: 80%; margin: 0; display: inline-block; text-align: center;"><b>APPLICANT INFORMATION</b></p>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; padding: 4px; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>PRINT FULL NAME</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>DOB</label>
						<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>SSN</label>
						<input type="text" name="ssn" value="<?php echo isset($info['ssn'])?$info['ssn']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 3px;">
						<label style="font-size: 11px;"># OF DEPENDENTS</label>
						<input type="text" name="dependent" value="<?php echo isset($info['dependent'])?$info['dependent']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>STREET ADDRESS</label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>CITY</label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>STATE</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
						<label>ZIP CODE</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>HOW LONG?</label>
						<input type="text" name="long" value="<?php echo isset($info['long'])?$info['long']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>HOME PHONE</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
						<label>CELL PHONE</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>RESIDENTIAL STATUS </label>
						<input type="text" name="resident" value="<?php echo isset($info['resident'])?$info['resident']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>MONTHLY RENT/MORTGAGE PMT </label>
						<input type="text" name="monthly" value="<?php echo isset($info['monthly'])?$info['monthly']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>LANDLORD OR MORTGAGE HOLDER’S NAME </label>
						<input type="text" name="landlord" value="<?php echo isset($info['landlord'])?$info['landlord']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>PREVIOUS ADDRESS (if less than 2 yrs at current address) </label>
						<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>CURRENT EMPLOYER’S NAME </label>
						<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>CURRENT EMPLOYER’S ADDRESS  </label>
						<input type="text" name="employer_address" value="<?php echo isset($info['employer_address'])?$info['employer_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>GROSS MONTHLY SALARY</label>
						<input type="text" name="salary" value="<?php echo isset($info['salary'])?$info['salary']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>WORK PHONE</label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>OCCUPATION/JOB TITLE </label>
						<input type="text" name="occupation" value="<?php echo isset($info['occupation'])?$info['occupation']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
						<label>HOW LONG? </label>
						<input type="text" name="occupation_long" value="<?php echo isset($info['occupation_long'])?$info['occupation_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>PREVIOUS EMPLOYER (if less than 2 yrs on current job)</label>
						<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer'])?$info['pre_employer']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
						<label>HOW LONG? </label>
						<input type="text" name="pre_employer_long" value="<?php echo isset($info['pre_employer_long'])?$info['pre_employer_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 50%; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0 0 20px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="font-size: 16px; padding: 5px;"><b>(B)</b></label>
						<p style="width: 80%; margin: 0; display: inline-block; text-align: center;"><b>JOINT APPLICANT INFORMATION</b></p>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; padding: 4px; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>PRINT FULL NAME</label>
						<input type="text" name="joint_name" value="<?php echo isset($info['joint_name'])?$info['joint_name']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>DOB</label>
						<input type="text" name="joint_dob" value="<?php echo isset($info['joint_dob'])?$info['joint_dob']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>SSN</label>
						<input type="text" name="joint_ssn" value="<?php echo isset($info['joint_ssn'])?$info['joint_ssn']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 3px;">
						<label style="font-size: 11px;"># OF DEPENDENTS</label>
						<input type="text" name="joint_dependent" value="<?php echo isset($info['joint_dependent'])?$info['joint_dependent']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>STREET ADDRESS</label>
						<input type="text" name="joint_address" value="<?php echo isset($info['joint_address'])?$info['joint_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>CITY</label>
						<input type="text" name="joint_city" value="<?php echo isset($info['joint_city'])?$info['joint_city']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>STATE</label>
						<input type="text" name="joint_state" value="<?php echo isset($info['joint_state'])?$info['joint_state']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
						<label>ZIP CODE</label>
						<input type="text" name="joint_zip" value="<?php echo isset($info['joint_zip'])?$info['joint_zip']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>HOW LONG?</label>
						<input type="text" name="joint_long" value="<?php echo isset($info['joint_long'])?$info['joint_long']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>HOME PHONE</label>
						<input type="text" name="joint_phone" value="<?php echo isset($info['joint_phone'])?$info['joint_phone']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
						<label>CELL PHONE</label>
						<input type="text" name="joint_mobile" value="<?php echo isset($info['joint_mobile'])?$info['joint_mobile']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>RESIDENTIAL STATUS </label>
						<input type="text" name="joint_resident" value="<?php echo isset($info['joint_resident'])?$info['joint_resident']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>MONTHLY RENT/MORTGAGE PMT </label>
						<input type="text" name="joint_monthly" value="<?php echo isset($info['joint_monthly'])?$info['joint_monthly']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>LANDLORD OR MORTGAGE HOLDER’S NAME </label>
						<input type="text" name="joint_landlord" value="<?php echo isset($info['joint_landlord'])?$info['joint_landlord']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>PREVIOUS ADDRESS (if less than 2 yrs at current address) </label>
						<input type="text" name="joint_pre_address" value="<?php echo isset($info['joint_pre_address'])?$info['joint_pre_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>CURRENT EMPLOYER’S NAME </label>
						<input type="text" name="joint_current_employer" value="<?php echo isset($info['joint_current_employer'])?$info['joint_current_employer']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>CURRENT EMPLOYER’S ADDRESS  </label>
						<input type="text" name="joint_current_address" value="<?php echo isset($info['joint_current_address'])?$info['joint_current_address']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>GROSS MONTHLY SALARY</label>
						<input type="text" name="joint_salary" value="<?php echo isset($info['joint_salary'])?$info['joint_salary']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>WORK PHONE</label>
						<input type="text" name="joint_work" value="<?php echo isset($info['joint_work'])?$info['joint_work']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>OCCUPATION/JOB TITLE </label>
						<input type="text" name="joint_occupation" value="<?php echo isset($info['joint_occupation'])?$info['joint_occupation']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
						<label>HOW LONG? </label>
						<input type="text" name="joint_occupation_long" value="<?php echo isset($info['joint_occupation_long'])?$info['joint_occupation_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 80%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>PREVIOUS EMPLOYER (if less than 2 yrs on current job)</label>
						<input type="text" name="joint_pre_employer" value="<?php echo isset($info['joint_pre_employer'])?$info['joint_pre_employer']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
						<label>HOW LONG? </label>
						<input type="text" name="joint_pre_long" value="<?php echo isset($info['joint_pre_long'])?$info['joint_pre_long']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<!-- right side end -->
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000; padding: 3px 5px;">
				<b>OTHER INCOME NOTE:</b>  Alimony, child support, or separate maintenance incomes do not have to be revealed unless the applicant wishes to have such sources considered as a basis for repayment of the requested credit amount. 
			</div>
			
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>GROSS  MONTHLY OTHER INCOME</label>
						<input type="text" name="income1" value="<?php echo isset($info['income1'])?$info['income1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>OTHER INCOME SOURCE</label>
						<input type="text" name="income1_source" value="<?php echo isset($info['income1_source'])?$info['income1_source']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>REFERENCE 1</label>
						<input type="text" name="reference1" value="<?php echo isset($info['reference1'])?$info['reference1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>PHONE</label>
						<input type="text" name="reference1_phone" value="<?php echo isset($info['reference1_phone'])?$info['reference1_phone']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>REFERENCE 2</label>
						<input type="text" name="reference2" value="<?php echo isset($info['reference2'])?$info['reference2']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>PHONE</label>
						<input type="text" name="reference2_phone" value="<?php echo isset($info['reference2_phone'])?$info['reference2_phone']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>GROSS  MONTHLY OTHER INCOME</label>
						<input type="text" name="income2" value="<?php echo isset($info['income2'])?$info['income2']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>OTHER INCOME SOURCE</label>
						<input type="text" name="income2_source" value="<?php echo isset($info['income2_source'])?$info['income2_source']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>ADDRESS</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>RELATIONSHIP</label>
						<input type="text" name="address1_relation" value="<?php echo isset($info['address1_relation'])?$info['address1_relation']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>ADDRESS</label>
						<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>RELATIONSHIP</label>
						<input type="text" name="address2_relation" value="<?php echo isset($info['address2_relation'])?$info['address2_relation']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 10px 0;"><b>FAIR CREDIT REPORTING ACT TO CONSUMER</b></h2>
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;">THIS WILL ADIVSE YOU THAT YOUR RETAIL INSTALLMENT SALES CONTRACT AND BUYER’S APPLICATION FOR SECURED DEBT WILL  BE SUBMITTED TO FINANCIAL INSTITUTIONS AND THEIR AFFILIATES FOR PURCHASE AND CONSIDERATION AS TO WHETHER YOU MEET THEIR CREDIT REQUIREMENTS.</p>
		
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;">THE UNDERSIGNED FURTHER AUTORIZES THESE FINANCIAL INSTITUTIONS AND THEIR AFFILIATES TO OBTAIN SUCH INFORMATION THAT THEY MAY REQUIRE IN ORDER TO VERIFY INFORMATION RELATIVE TO THIS REQUEST INCLUDING CONTACTING SPOUSES TO VERIFY SPOUSE  RELATED INFORMATION.</p>
		
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;">I CERTIFY THAT ALL INFORMATION GIVEN BY ME ON THIS APPLICATION IS COMPLETE AND ACCURATE.  I GIVE MY PERMISSION FOR ANY FINANCIAL INSTITUTION WHICH WILL REVIEW THIS CREIDT APPLICATION, TO INVESTIGATE MY CREDIT AND EMPLOYMENT HISTORY, AND TO ANSWER QUESTIONS ABOUT THEIR CREDIT EXPERIENCE WITH ME INCLUDING BUT NOT LIMITED TO LATE PAYMENTS, MISSED PAYMENTS OR OTHER DEFAULTS, AND THIS INFORMATION MAY BY REPORTED IN YOUR CREIDIT REPORT.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">

			<div class="left" style="float: left; width: 40%;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block;">APPLICANT</label>
						<label>SIGNATURE</label>
						<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:''; ?>" style="width: 66%; border-bottom: 1px solid #000;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 48%;">
						<label>REQUIRED </label>
					</div>
					<div class="form-field" style="float: left; width: 40%;">
						<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="float: left; width: 70%;">
						<label>DATE</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width; 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>(A) APPLICANT Driver’s License No.</label>
						<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">
					</div>
				</div>
			</div>
			
			<div class="left" style="float: right; width: 40%;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block;">JOINT APPLICANT</label>
						<label>SIGNATURE</label>
						<input type="text" name="joint_sign" value="<?php echo isset($info['joint_sign'])?$info['joint_sign']:''; ?>" style="width: 79%; border-bottom: 1px solid #000;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 72%;">
						<label>REQUIRED (means you intend to apply for joint credit)</label>
					</div>
					<div class="form-field" style="float: left; width: 27%;">
						<input type="text" name="joint_sign_date" value="<?php echo isset($info['joint_sign_date'])?$info['joint_sign_date']:''; ?>" style="float: left; width: 70%;">
						<label>DATE</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width; 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>(B) JOINT APPLICANT Driver’s License No.</label>
						<input type="text" name="joint_license" value="<?php echo isset($info['joint_license'])?$info['joint_license']:''; ?>" style="width: 39%; border-bottom: 1px solid #000;">
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
