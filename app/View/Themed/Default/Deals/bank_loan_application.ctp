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
	label{font-size: 13px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px;  float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	/*th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}*/
	table input[type="text"]{border: 0px;}
	th, td{padding: 4px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 2px 0;font-size: 22px;"><b>Application Information</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px;">
				<label>Last Name</label>
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px;">
				<label>First Name</label>
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Middle Name</label>
				<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label>Banking Information</label>
				<input type="text" name="banking_info" value="<?php echo isset($info['banking_info'])?$info['banking_info']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px;">
				<label>Present Street Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Apt. #</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;"><i>Check all that apply</i></label>
				<label><input type="checkbox" name="checking_box" <?php echo ($info['checking_box'] == "checking") ? "checked" : ""; ?> value="checking"> Checking</label>
				<label><input type="checkbox" name="visa_box" <?php echo ($info['visa_box'] == "visa") ? "checked" : ""; ?> value="visa"> Visa</label>
				<label><input type="checkbox" name="discover_box" <?php echo ($info['discover_box'] == "discover") ? "checked" : ""; ?> value="discover"> Discover</label>
				<label><input type="checkbox" name="savings_box" <?php echo ($info['savings_box'] == "savings") ? "checked" : ""; ?> value="savings"> Savings</label>
				<label><input type="checkbox" name="mc_box" <?php echo ($info['mc_box'] == "mc") ? "checked" : ""; ?> value="mc"> M/C</label>
				<label><input type="checkbox" name="amex_box" <?php echo ($info['amex_box'] == "amex") ? "checked" : ""; ?> value="amex"> Amex</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 3px;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Zip Code</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label>Landlord or Mortgage Holder</label>
				<input type="text" name="landlord" value="<?php echo isset($info['landlord'])?$info['landlord']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px;">
				<label style="font-size: 12px;">Time at Address (<i>if less than 2 years, give previous address</i>)</label>
				<input type="text" name="time_address" value="<?php echo isset($info['time_address'])?$info['time_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Home Telephone</label>
				<input type="text" name="home" value="<?php echo isset($info['home'])?$info['home']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Payment</label>
				$ <input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 92%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label style="display: inline-block; width: 48%;"><input type="checkbox" name="buy_check" <?php echo ($info['buy_check'] == "buy") ? "checked" : ""; ?> value="buy" style="margin: 0;">Buy</label>
				<label style="display: inline-block; width: 48%;"><input type="checkbox" name="parents_check" <?php echo ($info['parents_check'] == "parents") ? "checked" : ""; ?> value="parents" style="margin: 0;">Parents</label>
				<label style="display: inline-block; width: 48%;"><input type="checkbox" name="rent_check" <?php echo ($info['rent_check'] == "rent") ? "checked" : ""; ?> value="rent" style="margin: 0;">Rent</label>
				<label style="display: inline-block; width: 48%;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other" style="margin: 0;">Others</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Previous Address</label>
				<input type="text" name="pre_address" value="<?php echo isset($info['pre_address'])?$info['pre_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Name of Nearest Relative Not Living with You</label>
				<input type="text" name="nearest" value="<?php echo isset($info['nearest'])?$info['nearest']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
				<label>Social Security #</label>
				<input type="text" name="ssn" value="<?php echo isset($info['ssn'])?$info['ssn']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Date of Birth</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Drivers License Number</label>
				<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Telephone Number</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;">
					<label>Mailing Address (If Different From Above)</label>
					<input type="text" name="mail" value="<?php echo isset($info['mail'])?$info['mail']:''; ?>" style="width: 100%;">
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px;">
						<label>City</label>
						<input type="text" name="city1" value="<?php echo isset($info['city1'])?$info['city1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px;">
						<label>State</label>
						<input type="text" name="state1" value="<?php echo isset($info['state1'])?$info['state1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 3px;">
						<label>Zip Code</label>
						<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 100%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 68%; box-sizing: border-box; padding: 3px;">
						<label>Current Employer (If Self-Employed, Business Name)</label>
						<input type="text" name="current_employer" value="<?php echo isset($info['current_employer'])?$info['current_employer']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 32%; box-sizing: border-box; padding: 3px;">
						<label style="display: block;">How Long?</label>
						<label>Yrs <input type="radio" name="howlong_check" <?php echo ($info['howlong_check'] == "yrs") ? "checked" : ""; ?> value="yrs" style="margin: 0;"></label>
						<label>Mos <input type="radio" name="howlong_check" <?php echo ($info['howlong_check'] == "mos") ? "checked" : ""; ?> value="mos" style="margin: 0;"></label>
					</div>
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;">
					<label>Employer Address</label>
					<input type="text" name="employer_address" value="<?php echo isset($info['employer_address'])?$info['employer_address']:''; ?>" style="width: 100%;">
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 3px;">
						<label>Business Phone #</label>
						<input type="text" name="business_phone" value="<?php echo isset($info['business_phone'])?$info['business_phone']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 3px;">
						<label>Position</label>
						<input type="text" name="position" value="<?php echo isset($info['position'])?$info['position']:''; ?>" style="width: 100%;">
					</div> 
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>Applicant Salary: $</label>
						<input type="text" name="app_salary" value="<?php echo isset($info['app_salary'])?$info['app_salary']:''; ?>" style="width: 30%; border-bottom: 1px solid;">
						<label>Gross Monthly</label>
					</div>
					<p style="float: left; width: 100%; font-size: 14px; box-sizing: border-box; padding: 3px; margin: 10px 0px -5px; text-align: center;">Alimony, child support, or separate maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation. <br> Alimony, child support, separate maintenance received under:</p>
					<div class="form-field" style="float: left; width: 100%; text-align: center; margin-bottom: 3px;">
						<label style="dispaly: inline-block; width: 30%;"><input type="text" name="court" value="<?php echo isset($info['court'])?$info['court']:''; ?>" style="width: 15%; border-bottom: 1px solid #000;"> Court</label>
						<label style="margin: 0 10px; dispaly: inline-block; width: 30%;"><input type="text" name="agreement" value="<?php echo isset($info['agreement'])?$info['agreement']:''; ?>" style="width: 15%; border-bottom: 1px solid #000;"> Written Agreement</label>
						<label style="dispaly: inline-block; width: 30%;"><input type="text" name="oral" value="<?php echo isset($info['oral'])?$info['oral']:''; ?>" style="width: 15%; border-bottom: 1px solid #000;"> Oral Understanding</label>
					</div>

					<div class="form-field" style="float: left; width: 100%; text-align: center; margin-bottom: 15px;">
						<label style="dispaly: inline-block; width: 45%;">Sources of Other Income<input type="text" name="source_income" value="<?php echo isset($info['source_income'])?$info['source_income']:''; ?>" style="width: 36%; border-bottom: 1px solid #000;"></label>
						<label style="dispaly: inline-block; width: 45%;">Amount Per Month $<input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="width: 45%; border-bottom: 1px solid #000;"></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin; 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; text-align: center; margin: 20px 0 0;">
						<label><input type="checkbox" name="married_check" <?php echo ($info['married_check'] == "married") ? "checked" : ""; ?> value="married"> Married</label>
						<label><input type="checkbox" name="separated_check" <?php echo ($info['separated_check'] == "separated") ? "checked" : ""; ?> value="separated"> Separated</label>
						<label><input type="checkbox" name="unmarried_check" <?php echo ($info['unmarried_check'] == "unmarried") ? "checked" : ""; ?> value="unmarried"> Unmarried<sup>*</sup></label>
					</div>
					<p style="float: left; width: 100%; margin: 0; text-align: center; margin: 6px 0 12px; font-size: 14px;"><sup>*</sup>Includes single, divorced or widowed</p>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px 10px;">
			<h2 style="float: left; width: 100%; margin: 0; font-size: 17px;"><b>Equipment Information (Attach dealer invoice if available)</b></h2>
			<table cellpadding="0" cellspacing="0" width="100%;">
				<tr>
					<td style="text-align: center; border: 0px;">Quantity</td>
					<td style="text-align: center; border: 0px;">Mode #s</td>
					<td style="text-align: center; border: 0px;">Description</td>
					<td style="text-align: center; border: 0px;">Serial #</td>
					<td style="text-align: center; border: 0px;">Price</td>
				</tr>
				<tr>
					<td>1. <input type="text" name="quantity1" value="<?php echo isset($info['quantity1'])?$info['quantity1']:''; ?>" style="width: 90%;"></td>
					<td><input type="text" name="mode1" value="<?php echo isset($info['mode1'])?$info['mode1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="des1" value="<?php echo isset($info['des1'])?$info['des1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="serial1" value="<?php echo isset($info['serial1'])?$info['serial1']:''; ?>" style="width: 100%;"></td>
					<td>$<input type="text" name="price1" value="<?php echo isset($info['price1'])?$info['price1']:''; ?>" style="width: 95%;"></td>
				</tr>
				<tr>
					<td>2. <input type="text" name="quantity2" value="<?php echo isset($info['quantity2'])?$info['quantity2']:''; ?>" style="width: 90%;"></td>
					<td><input type="text" name="mode2" value="<?php echo isset($info['mode2'])?$info['mode2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="des2" value="<?php echo isset($info['des2'])?$info['des2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="serial2" value="<?php echo isset($info['serial2'])?$info['serial2']:''; ?>" style="width: 100%;"></td>
					<td>$<input type="text" name="price2" value="<?php echo isset($info['price2'])?$info['price2']:''; ?>" style="width: 95%;"></td>
				</tr>
				<tr>
					<td>3. <input type="text" name="quantity3" value="<?php echo isset($info['quantity3'])?$info['quantity3']:''; ?>" style="width: 90%;"></td>
					<td><input type="text" name="mode3" value="<?php echo isset($info['mode3'])?$info['mode3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="des3" value="<?php echo isset($info['des3'])?$info['des3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="serial3" value="<?php echo isset($info['serial3'])?$info['serial3']:''; ?>" style="width: 100%;"></td>
					<td>$<input type="text" name="price3" value="<?php echo isset($info['price3'])?$info['price3']:''; ?>" style="width: 95%;"></td>
				</tr>
			</table>
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
