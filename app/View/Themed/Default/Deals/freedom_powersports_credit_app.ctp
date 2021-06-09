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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	
@media print {
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; margin: 4px 0; font-size: 24px;"><b>Standard Dealer Loan Application</b></h2>
		<h3 style="float: left; width: 100%; text-align: center; margin: 4px 0; font-size: 17px;">READ ALL SECTIONS THOROUGHLY</h3>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 45%">
				<label>Dealer Name:</label>
				<input type="text" name="dealer" value="<?php echo isset($info['dealer'])?$info['dealer']:''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 27%">
				<label>Amount Requested:</label>
				<input type="text" name="amount" value="<?php echo !empty($info['amount'])?$info['amount']:''; ?>" style="width: 46%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 28%">
				<label>Collateral Value $:</label>
				<input type="text" name="collateral" value="<?php echo !empty($info['collateral'])?$info['collateral']:''; ?>" style="width: 54%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<h3 style="margin: 3px 0; font-size: 16px; float: left; "><b>APPLICATION INFORMATION</b></h3>
			<div class="form-field" style="float: right; width: 45%; padding: 6px 3px; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
				<label>E MAIL:</label>
				<input type="text" name="email" value="<?php echo !empty($info['email'])?$info['email']:''; ?>" style="width: 87%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>NAME:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="float: left; width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label style="display: block;">IDENTIFICATION :</label>
				<label>Type</label>
				<input type="text" name="type" value="<?php echo !empty($info['type'])?$info['type']:''; ?>" style="width: 12%;">
				<label>Place of Issue</label>
				<input type="text" name="issue" value="<?php echo !empty($info['issue'])?$info['issue']:''; ?>" style="width:11%;">
				<label>Number</label>
				<input type="text" name="number" value="<?php echo !empty($info['number'])?$info['number']:''; ?>" style="width: 11%;">
				<label>Date of Issue</label>
				<input type="text" name="date_issue" value="<?php echo !empty($info['date_issue'])?$info['date_issue']:''; ?>" style="width: 11%;">
				<label>Exp. Date</label>
				<input type="text" name="ex_date" value="<?php echo !empty($info['ex_date'])?$info['ex_date']:''; ?>" style="width: 11%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>SOCIAL SECURITY NO.</label>
				<input type="text" name="security_no" value="<?php echo !empty($info['security_no'])?$info['security_no']:''; ?>" style="float: left; width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HOME PHONE:</label>
				<input type="text" name="phone" value="<?php echo !empty($info['phone'])?$info['phone']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 9px 3px; border-right: 1px solid #000;">
				<label><input type="radio" name="own_status" value="own" <?php echo (isset($info['own_status']) && $info['own_status']=='own')?'checked="checked"':''; ?> /> OWN</label>
				<label><input type="radio" name="rent_status" value="rent" <?php echo (isset($info['rent_status']) && $info['rent_status']=='rent')?'checked="checked"':''; ?> /> RENT</label>
				<label><input type="radio" name="other_status" value="other" <?php echo (isset($info['other_status']) && $info['other_status']=='other')?'checked="checked"':''; ?> /> OTHER</label>
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>MONTHLY PMT/RENT:</label>
				<input type="text" name="monthly" value="<?php echo !empty($info['monthly'])?$info['monthly']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>DATE OF BIRTH:</label>
				<input type="text" name="birthday" value="<?php echo isset($info['birthday']) ? $info['birthday'] : $info['dob']; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label>DEPENDENTS (Excl. Self)</label>
				<input type="text" name="dependent" value="<?php echo !empty($info['dependent'])?$info['dependent']:''; ?>" style="float: left; width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PRESENT RESIDENTIAL ADDRESS:</label>
				<input type="text" name="address" value="<?php echo !empty($info['address'])?$info['address']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="city" value="<?php echo !empty($info['city'])?$info['city']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="state" value="<?php echo !empty($info['state'])?$info['state']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="zip" value="<?php echo !empty($info['zip'])?$info['zip']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label style="display: block;">TIME AT THIS ADDRESS</label>
				<div class="form-field" style="width: 49%; float: left;">
					<label>Yrs</label>
					<input type="text" name="yrs" value="<?php echo !empty($info['yrs'])?$info['yrs']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="width: 49%; float: right;">
					<label>Mos</label>
					<input type="text" name="mos" value="<?php echo !empty($info['mos'])?$info['mos']:''; ?>" style="width: 70%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PREVIOUS RESIDENTIAL ADDRESS:</label>
				<input type="text" name="resident_address" value="<?php echo !empty($info['resident_address'])?$info['resident_address']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="resident_city" value="<?php echo !empty($info['resident_city'])?$info['resident_city']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="resident_state" value="<?php echo !empty($info['resident_state'])?$info['resident_state']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="resident_zip" value="<?php echo !empty($info['resident_zip'])?$info['resident_zip']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label style="display: block;">TIME AT THIS ADDRESS</label>
				<div class="form-field" style="width: 49%; float: left;">
					<label>Yrs</label>
					<input type="text" name="resident_yrs" value="<?php echo !empty($info['resident_yrs'])?$info['resident_yrs']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="width: 49%; float: right;">
					<label>Mos</label>
					<input type="text" name="resident_mos" value="<?php echo !empty($info['resident_mos'])?$info['resident_mos']:''; ?>" style="width: 70%;">
				</div>
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PRESENT EMPLOYER:</label>
				<input type="text" name="pre_employer" value="<?php echo !empty($info['pre_employer'])?$info['pre_employer']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>EMPLOYER ADDRESS</label>
				<input type="text" name="employer_address" value="<?php echo !empty($info['employer_address'])?$info['employer_address']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="pre_city" value="<?php echo !empty($info['pre_city'])?$info['pre_city']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="pre_state" value="<?php echo !empty($info['pre_state'])?$info['pre_state']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 1px 3px;">
				<label>ZIP:</label>
				<input type="text" name="pre_zip" value="<?php echo !empty($info['pre_zip'])?$info['pre_zip']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>WORK PHONE:</label>
				<input type="text" name="work_number" value="<?php echo !empty($info['work_number'])?$info['work_number']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>POSITION :</label>
				<input type="text" name="position" value="<?php echo !empty($info['position'])?$info['position']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HIRE DATE:</label>
				<input type="text" name="hire_date" value="<?php echo !empty($info['hire_date'])?$info['hire_date']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px;">
				<label>GROSS MONTHLY INCOME:</label>
				<input type="text" name="gross_income" value="<?php echo !empty($info['gross_income'])?$info['gross_income']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<p style="font-size: 12px; margin: 3px 0; padding: 0 3px;">Alimony, child support or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for eepayment of this obligation.</p>
			
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 1px 3px;">
				<label>OTHER INCOME: $</label>
				<input type="text" name="other_income" value="<?php echo !empty($info['other_income'])?$info['other_income']:''; ?>" style="width: 60%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label>PER</label>
				<input type="text" name="per" value="<?php echo !empty($info['per'])?$info['per']:''; ?>" style=" width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 1px 3px;">
				<label>SOURCE OF OTHER INCOME</label>
				<input type="text" name="source_income" value="<?php echo !empty($info['source_income'])?$info['source_income']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 46%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PREVIOUS EMPLOYER:</label>
				<input type="text" name="pre_employer" value="<?php echo !empty($info['pre_employer'])?$info['pre_employer']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 27%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>POSITION:</label>
				<input type="text" name="pre_position" value="<?php echo !empty($info['pre_position'])?$info['pre_position']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HIRE DATE:</label>
				<input type="text" name="pre_hire" value="<?php echo !empty($info['pre_hire'])?$info['pre_hire']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>DEARTURE DATE:</label>
				<input type="text" name="dearture_date" value="<?php echo !empty($info['dearture_date'])?$info['dearture_date']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>NAME OF NEAREST RELATIVE (Not Living With You)</label>
				<input type="text" name="nearest_relative1" value="<?php echo !empty($info['nearest_relative1'])?$info['nearest_relative1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>RESIDENTIAL ADDRESS:</label>
				<input type="text" name="resident_address1" value="<?php echo !empty($info['resident_address1'])?$info['resident_address1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="resident_city1" value="<?php echo !empty($info['resident_city1'])?$info['resident_city1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="resident_state1" value="<?php echo !empty($info['resident_state1'])?$info['resident_state1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="resident_zip1" value="<?php echo !empty($info['resident_zip1'])?$info['resident_zip1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HOME PHONE</label>
				<input type="text" name="phone1" value="<?php echo !empty($info['phone1'])?$info['phone1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>RELATIONSHIP</label>
				<input type="text" name="relationship1" value="<?php echo !empty($info['relationship1'])?$info['relationship1']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>NAME OF NEAREST RELATIVE (Not Living With You)</label>
				<input type="text" name="nearest_relative2" value="<?php echo !empty($info['nearest_relative2'])?$info['nearest_relative2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>RESIDENTIAL ADDRESS:</label>
				<input type="text" name="resident_address2" value="<?php echo !empty($info['resident_address2'])?$info['resident_address2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="resident_city2" value="<?php echo !empty($info['resident_city2'])?$info['resident_city2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="resident_state2" value="<?php echo !empty($info['resident_state2'])?$info['resident_state2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="resident_zip2" value="<?php echo !empty($info['resident_zip2'])?$info['resident_zip2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HOME PHONE</label>
				<input type="text" name="phone2" value="<?php echo !empty($info['phone2'])?$info['phone2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>RELATIONSHIP</label>
				<input type="text" name="relationship2" value="<?php echo !empty($info['relationship2'])?$info['relationship2']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<h3 style="margin: 18px 0 0; font-size: 16px; float: left; "><b>CO-APPLICAT OR OTHER PARTY INFORMATION:</b></h3>
			<div class="form-field" style="float: right; width: 20.1%; padding: 6px 3px; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
				<label>RELATIONSHIP TO APPLICANT:</label>
				<input type="text" name="relation_applicant" value="<?php echo !empty($info['relation_applicant'])?$info['relation_applicant']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>NAME</label>
				<input type="text" name="co_name" value="<?php echo !empty($info['co_name'])?$info['co_name']:''; ?>" style="float: left; width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 55%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label style="display: block;">IDENTIFICATION :</label>
				<label>Type</label>
				<input type="text" name="co_type" value="<?php echo !empty($info['co_type'])?$info['co_type']:''; ?>" style="width: 9%;">
				<label>Place of Issue</label>
				<input type="text" name="co_issue" value="<?php echo !empty($info['co_issue'])?$info['co_issue']:''; ?>" style="width: 9%;">
				<label>Number</label>
				<input type="text" name="co_number" value="<?php echo !empty($info['co_number'])?$info['co_number']:''; ?>" style="width: 8%;">
				<label>Date of Issue</label>
				<input type="text" name="co_date" value="<?php echo !empty($info['co_date'])?$info['co_date']:''; ?>" style="width: 9%;">
				<label>Exp. Date</label>
				<input type="text" name="co_expdate" value="<?php echo !empty($info['co_expdate'])?$info['co_expdate']:''; ?>" style="width: 8%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label>SOCIAL SECURITY NO.</label>
				<input type="text" name="co_security" value="<?php echo !empty($info['co_security'])?$info['co_security']:''; ?>" style="float: left; width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HOME PHONE:</label>
				<input type="text" name="co_phone" value="<?php echo !empty($info['co_phone'])?$info['co_phone']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 9px 3px; border-right: 1px solid #000;">
				<label><input type="radio" name="co_own_status" value="co_own" <?php echo (isset($info['co_own_status']) && $info['co_own_status']=='co_own')?'checked="checked"':''; ?> /> OWN</label>
				<label><input type="radio" name="co_rent_status" value="co_rent" <?php echo (isset($info['co_rent_status']) && $info['co_rent_status']=='co_rent')?'checked="checked"':''; ?> /> RENT</label>
				<label><input type="radio" name="co_other_status" value="co_other" <?php echo (isset($info['co_other_status']) && $info['co_other_status']=='co_other')?'checked="checked"':''; ?> /> OTHER</label>
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>MONTHLY PMT/RENT:</label>
				<input type="text" name="co_monthly" value="<?php echo !empty($info['co_monthly'])?$info['co_monthly']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>DATE OF BIRTH:</label>
				<input type="text" name="co_birth" value="<?php echo !empty($info['co_birth'])?$info['co_birth']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label>DEPENDENTS (Excl. Self)</label>
				<input type="text" name="co_dependent" value="<?php echo !empty($info['co_dependent'])?$info['co_dependent']:''; ?>" style="float: left; width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PRESENT RESIDENTIAL ADDRESS:</label>
				<input type="text" name="co_present_address1" value="<?php echo !empty($info['co_present_address1'])?$info['co_present_address1']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="co_city1" value="<?php echo !empty($info['co_city1'])?$info['co_city1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="co_state1" value="<?php echo !empty($info['co_state1'])?$info['co_state1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="co_zip1" value="<?php echo !empty($info['co_zip1'])?$info['co_zip1']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label style="display: block;">TIME AT THIS ADDRESS</label>
				<div class="form-field" style="width: 49%; float: left;">
					<label>Yrs</label>
					<input type="text" name="co_yrs1" value="<?php echo !empty($info['co_yrs1'])?$info['co_yrs1']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="width: 49%; float: right;">
					<label>Mos</label>
					<input type="text" name="co_mos1" value="<?php echo !empty($info['co_mos1'])?$info['co_mos1']:''; ?>" style="width: 70%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PREVIOUS RESIDENTIAL ADDRESS:</label>
				<input type="text" name="co_present_address2" value="<?php echo !empty($info['co_present_address2'])?$info['co_present_address2']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="co_city2" value="<?php echo !empty($info['co_city2'])?$info['co_city2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="co_state2" value="<?php echo !empty($info['co_state2'])?$info['co_state2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="co_zip2" value="<?php echo !empty($info['co_zip2'])?$info['co_zip2']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label style="display: block;">TIME AT THIS ADDRESS</label>
				<div class="form-field" style="width: 49%; float: left;">
					<label>Yrs</label>
					<input type="text" name="co_yrs2" value="<?php echo !empty($info['co_yrs2'])?$info['co_yrs2']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="width: 49%; float: right;">
					<label>Mos</label>
					<input type="text" name="co_mos2" value="<?php echo !empty($info['co_mos2'])?$info['co_mos2']:''; ?>" style="width: 70%;">
				</div>
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PRESENT EMPLOYER:</label>
				<input type="text" name="co_present_employer" value="<?php echo !empty($info['co_present_employer'])?$info['co_present_employer']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>EMPLOYER ADDRESS</label>
				<input type="text" name="co_employer_address" value="<?php echo !empty($info['co_employer_address'])?$info['co_employer_address']:''; ?>" style="float: left; width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="co_pre_city" value="<?php echo !empty($info['co_pre_city'])?$info['co_pre_city']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="co_pre_state" value="<?php echo !empty($info['co_pre_state'])?$info['co_pre_state']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 1px 3px;">
				<label>ZIP:</label>
				<input type="text" name="co_pre_zip" value="<?php echo !empty($info['co_pre_zip'])?$info['co_pre_zip']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>WORK PHONE:</label>
				<input type="text" name="co_work_number" value="<?php echo !empty($info['co_work_number'])?$info['co_work_number']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>POSITION :</label>
				<input type="text" name="co_position" value="<?php echo !empty($info['co_position'])?$info['co_position']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HIRE DATE:</label>
				<input type="text" name="co_hire_date" value="<?php echo !empty($info['co_hire_date'])?$info['co_hire_date']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 3px;">
				<label>GROSS MONTHLY INCOME:</label>
				<input type="text" name="co_gross_income" value="<?php echo !empty($info['co_gross_income'])?$info['co_gross_income']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<p style="font-size: 12px; margin: 3px 0; padding: 0 3px;">Alimony, child support or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for eepayment of this obligation.</p>
			
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 1px 3px;">
				<label>OTHER INCOME: $</label>
				<input type="text" name="co_other_income" value="<?php echo !empty($info['co_other_income'])?$info['co_other_income']:''; ?>" style="width: 60%;">
			</div>
			
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px;">
				<label>PER</label>
				<input type="text" name="co_per" value="<?php echo !empty($info['co_per'])?$info['co_per']:''; ?>" style=" width: 70%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 1px 3px;">
				<label>SOURCE OF OTHER INCOME</label>
				<input type="text" name="co_source_income" value="<?php echo !empty($info['co_source_income'])?$info['co_source_income']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 46%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>PREVIOUS EMPLOYER:</label>
				<input type="text" name="co_pre_employer" value="<?php echo !empty($info['co_pre_employer'])?$info['co_pre_employer']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 27%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>POSITION:</label>
				<input type="text" name="co_pre_position" value="<?php echo !empty($info['co_pre_position'])?$info['co_pre_position']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HIRE DATE:</label>
				<input type="text" name="co_hire" value="<?php echo !empty($info['co_hire'])?$info['co_hire']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>DEPARTURE DATE:</label>
				<input type="text" name="co_depart" value="<?php echo !empty($info['co_depart'])?$info['co_depart']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>NAME OF NEAREST RELATIVE (Not Living With You)</label>
				<input type="text" name="co_nearest_relative" value="<?php echo !empty($info['co_nearest_relative'])?$info['co_nearest_relative']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>RESIDENTIAL ADDRESS:</label>
				<input type="text" name="co_resident_address" value="<?php echo !empty($info['co_resident_address'])?$info['co_resident_address']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>CITY:</label>
				<input type="text" name="co_resident_city" value="<?php echo !empty($info['co_resident_city'])?$info['co_resident_city']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 9%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>STATE:</label>
				<input type="text" name="co_resident_state" value="<?php echo !empty($info['co_resident_state'])?$info['co_resident_state']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>ZIP:</label>
				<input type="text" name="co_resident_zip" value="<?php echo !empty($info['co_resident_zip'])?$info['co_resident_zip']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid #000;">
				<label>HOME PHONE:</label>
				<input type="text" name="co_resident_home" value="<?php echo !empty($info['co_resident_home'])?$info['co_resident_home']:''; ?>" style="float: left; width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 1px 3px;">
				<label>RELATIONSHIP</label>
				<input type="text" name="co_resident_relation" value="<?php echo !empty($info['co_resident_relation'])?$info['co_resident_relation']:''; ?>" style="float: left; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="left" style="float: left; width: 70%;">
				<h3 style="float: left; width: 100%; font-size: 15px; margin: 3px 0;"><b>Financial Information</b></h3>
				<p style="font-size: 12px; margin: 0;">Is Application obligated to pay alimony, child support or maintenance paymens, whether under separation agreement or court order?</p>
			</div>
			
			<div class="right" style="float: left; width: 30%; margin-top: 17px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label><input type="radio" name="financial_status" value="yes" <?php echo (isset($info['financial_status']) && $info['financial_status']=='yes')?'checked="checked"':''; ?> />  YES</label>
					<label><input type="radio" name="financial_status" value="no" <?php echo (isset($info['financial_status']) && $info['financial_status']=='no')?'checked="checked"':''; ?> />  No</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>If Yes, amount per month is $</label>
					<input type="text" name="per_month" value="<?php echo !empty($info['per_month'])?$info['per_month']:''; ?>" style="width: 42%; border-bottom: 1px solid #000;">
				</div>	
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 39%; margin: 30px 0 0;">
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Have you ever declared bankrupty?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Have you had any property foreclosed on or repossessed?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Are there any unsatisfied judgements against you?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Are you a co-signer, endorser or guarantor on any loan or contract?</p>
			</div>
			
			
			<div class="center" style="float: left; width: 28%; margin: 3px 0;">
				<div class="left" style="float: left; width: 49%; margin: 0; ">
					<h4 style="font-size: 15px; text-align: center; border-bottom: 1px solid #000; margin: 0;">Applicant</h4>
					<div class="cover" style="border-right: 1px solid #000; float: left; width: 100%;">
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="declared_applicant" value="yes" <?php echo (isset($info['declared_applicant']) && $info['declared_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="declared_applicant" value="no" <?php echo (isset($info['declared_applicant']) && $info['declared_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="reposses_applicant" value="yes" <?php echo (isset($info['reposses_applicant']) && $info['reposses_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="reposses_applicant" value="no" <?php echo (isset($info['reposses_applicant']) && $info['reposses_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="judgment_applicant" value="yes" <?php echo (isset($info['judgment_applicant']) && $info['judgment_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="judgment_applicant" value="no" <?php echo (isset($info['judgment_applicant']) && $info['judgment_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="endor_applicant" value="yes" <?php echo (isset($info['endor_applicant']) && $info['endor_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="endor_applicant" value="no" <?php echo (isset($info['endor_applicant']) && $info['endor_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
					</div>
				</div>
				
				<div class="right" style="float: left; width: 50%; margin: 0;">
					<h4 style="font-size: 15px; text-align: center; border-bottom: 1px solid #000; margin: 0;">Applicant</h4>
					<div class="cover" style="border-right: 1px solid #000;">
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="declared_co_applicant" value="yes" <?php echo (isset($info['declared_co_applicant']) && $info['declared_co_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="declared_co_applicant" value="no" <?php echo (isset($info['declared_co_applicant']) && $info['declared_co_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="reposses_co_applicant" value="yes" <?php echo (isset($info['reposses_co_applicant']) && $info['reposses_co_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="reposses_co_applicant" value="no" <?php echo (isset($info['reposses_co_applicant']) && $info['reposses_co_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="judgment_co_applicant" value="yes" <?php echo (isset($info['judgment_co_applicant']) && $info['judgment_co_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="judgment_co_applicant" value="no" <?php echo (isset($info['judgment_co_applicant']) && $info['judgment_co_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">
							<label style="width: 46%;"><input type="radio" name="endor_co_applicant" value="yes" <?php echo (isset($info['endor_co_applicant']) && $info['endor_co_applicant']=='yes')?'checked="checked"':''; ?> /> YES</label>
							<label style="width: 46%;"><input type="radio" name="endor_co_applicant" value="no" <?php echo (isset($info['endor_co_applicant']) && $info['endor_co_applicant']=='no')?'checked="checked"':''; ?> /> NO</label>
						</p>
					</div>
				</div>
			</div>
			
			<div class="left" style="float: left; width: 25%; margin: 30px 0 0 20px;">
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">If "YES", When?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">If "YES", When?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">If "YES", for whom? To whom?</p>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">If "YES", to whom owed? Amount?</p>
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 14px; margin: 5px 0;">By signing below, I/We authorize the Credit Union to check My/Our credit & employment history & to report My/Our credit performance to others who may properly receive this information. I/We understand that you may contct Me/Us for further information & that this application must be completed for the Credit Union to process My/Our request. I/We understand that you will retain this application whether or not it is approved. Everything that I/We have stated in this application is correct to the best of My/Our knowledge.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0 0;">
			<div class="left" style="float: left; width: 46%;">
				<div class="form-field" style="float: left; width: 80%;">
					<input type="text" name="applicant_sign" value="<?php echo !empty($info['applicant_sign'])?$info['applicant_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 3px;">
					<label><b>APPLICANT SIGNATURE</b></label>
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<input type="text" name="applicant_date" value="<?php echo !empty($info['applicant_date'])?$info['applicant_date']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 3px;">
					<label><b>DATE</b></label>
				</div>
			</div>
			
			<div class="left" style="float: right; width: 46%;">
				<div class="form-field" style="float: left; width: 80%;">
					<input type="text" name="co_applicant_sign" value="<?php echo !empty($info['co_applicant_sign'])?$info['co_applicant_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 3px;">
					<label><b>CO-APPLICANT SIGNATURE</b></label>
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<input type="text" name="co_applicant_date" value="<?php echo !empty($info['co_applicant_date'])?$info['co_applicant_date']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 3px;">
					<label><b>DATE</b></label>
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
