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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; font-size: 18px; box-sizing: border-box; background: #000; color: #fff; margin: 0; padding: 12px 5px">THE BROTHERS POWERSPORTS CREDIT APPLICATION</h2>
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Last Name</label>
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>First Name</label>
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Middle</label>
				<input type="text" name="mname" value="<?php echo isset($info["mname"]) ? $info["mname"] : $info["m_name"] ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Birthdate</label>
				<input type="text" name="birthdate" value="<?php echo isset($info['birthdate'])?$info['birthdate']:''; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>SSN</label>
				<input type="text" name="ssn_num" value="<?php echo isset($info['ssn_num'])?$info['ssn_num']:''; ?>" style="width: 60%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>How long YRS</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 19%; border-bottom: 1px solid #000;">
				<label>MOS</label>
				<input type="text" name="mos" value="<?php echo isset($info['mos'])?$info['mos']:''; ?>" style="width: 27%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 74%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Mailing Address (if different)</label>
				<input type="text" name="mail_address" value="<?php echo isset($info['mail_address'])?$info['mail_address']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Drivers License No.</label>
				<input type="text" name="license_num" value="<?php echo isset($info['license_num'])?$info['license_num']:''; ?>" style="width: 50%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Home Phone</label>
				<input type="text" name="home" value="<?php echo isset($info['home'])?$info['home']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 56%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Resident Status:</label>
				<span><input type="checkbox" name="resident_status" <?php echo ($info['resident_status'] == "rent") ? "checked" : ""; ?> value="resident_status"/> Rent </span>
				<span><input type="checkbox" name="resident_status" <?php echo ($info['resident_status'] == "own") ? "checked" : ""; ?> value="own"/> Own </span>
				<span><input type="checkbox" name="resident_status" <?php echo ($info['resident_status'] == "other") ? "checked" : ""; ?> value="other"/> Other </span>
				<input type="text" name="resident" value="<?php echo isset($info['resident'])?$info['resident']:''; ?>" style="width: 9%; border-bottom: 1px solid #000;">
				<label>Monthly Payment: </label>
				$<input type="text" name="month_pay" value="<?php echo isset($info['month_pay'])?$info['month_pay']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Email Address</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Married</label>
				<span style="margin-left: 20px;"><input type="checkbox" name="married_status" <?php echo ($info['married_status'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes </span>
				<span><input type="checkbox" name="married_status" <?php echo ($info['married_status'] == "no") ? "checked" : ""; ?> value="no"/> No </span>
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 20px 2px 2px;">
				&nbsp;
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 74%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Previous Full Address (if less than 2 years)</label>
				<input type="text" name="full_address" value="<?php echo isset($info['full_address'])?$info['full_address']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>How long YRS</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:''; ?>" style="width: 24%; border-bottom: 1px solid #000;">
				<label>MOS</label>
				<input type="text" name="mos1" value="<?php echo isset($info['mos1'])?$info['mos1']:''; ?>" style="width: 24%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box; padding: 3px;">
			<strong style="font-size: 13px;">Employment and Income Information: </strong> <span style="font-size: 11px;">Note-alimony, child support, or separate maintance income need not be revealed if you do not choose to have it considered a a basis for repaying this obligation.</span>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Employer Name</label>
				<input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="width: 52%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Employer Phone</label>
				<input type="text" name="emp_phone" value="<?php echo isset($info['emp_phone'])?$info['emp_phone']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 26%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Occupation</label>
				<input type="text" name="occupation1" value="<?php echo isset($info['occupation1'])?$info['occupation1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Annual Income: $</label>
				<input type="text" name="an_income1" value="<?php echo isset($info['an_income1'])?$info['an_income1']:''; ?>" style="width: 52%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Address</label>
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>City</label>
				<input type="text" name="city1" value="<?php echo isset($info['city1'])?$info['city1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>State</label>
				<input type="text" name="state1" value="<?php echo isset($info['state1'])?$info['state1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Zip</label>
				<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 41%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Length of Employment YRS</label>
				<input type="text" name="employ_length" value="<?php echo isset($info['employ_length'])?$info['employ_length']:''; ?>" style="width: 19%; border-bottom: 1px solid #000;">
				<label>MOS</label>
				<input type="text" name="mos2" value="<?php echo isset($info['mos2'])?$info['mos2']:''; ?>" style="width: 27%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Previous Employer and Address (if less than 2 years)</label>
				<input type="text" name="pre_employer" value="<?php echo isset($info['pre_employer'])?$info['pre_employer']:''; ?>" style="width: 38%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Occupation</label>
				<input type="text" name="occupation2" value="<?php echo isset($info['occupation2'])?$info['occupation2']:''; ?>" style="width: 40%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Annual Income</label>
				<input type="text" name="an_income2" value="<?php echo isset($info['an_income2'])?$info['an_income2']:''; ?>" style="width: 36%;">
			</div>
				
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>How long YRS</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width: 18%; border-bottom: 1px solid #000;">
				<label>MOS</label>
				<input type="text" name="mos3" value="<?php echo isset($info['mos3'])?$info['mos3']:''; ?>" style="width: 18%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box; padding: 3px;">
			<strong style="font-size: 13px;">Reference: </strong> <input type="text" name="reference" value="<?php echo isset($info['reference'])?$info['reference']:''; ?>" style="width: 80%;"></span>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>Nearest Relative</label>
				<input type="text" name="nearest" value="<?php echo isset($info['nearest'])?$info['nearest']:''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 20px 2px 2px; border-right: 1px solid #000;">
				<label>State</label>
				<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 36%; box-sizing: border-box; padding: 20px 2px 2px;">
				<label>Phone</label>
				<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 52%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px;">
				<p style="font-size: 14px; margin: 0 0 7px;">By signing this application you understand that the Brothers Power Sports will run a credit check and will submit your application to one or more lenders to get approval. You understand that the lenders may send you a credit card in the mail, even if you do not accept the terms.</p>
				<div class="from-field-inner" style="float: left; width: 100%;">
					<label><b>SIGN HERE: </b></label>
					<input type="text" name="sign_here" value="<?php echo isset($info['sign_here'])?$info['sign_here']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
				</div>
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 20px 2px 2px; border-left: 1px solid #000;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/brother-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
	
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-top: 0px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<p style="font-size: 14px; margin: 0 0 7px;"><i><b>Lenders may require proof of insurance before you take delivery of your new unit. Would you like an insurance <br> quote? <input type="checkbox" name="quote_status" <?php echo ($info['quote_status'] == "yes") ? "checked" : ""; ?> value="yes"/> Y <input type="checkbox" name="quote_status" <?php echo ($info['quote_status'] == "no") ? "checked" : ""; ?> value="no"/> N if yes, how many years of motorcycle  experience do you have? <input type="text" name="motorcycle" value="<?php echo isset($info['motorcycle'])?$info['motorcycle']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> <br> How many tickets/accidents in the last 3 years? <input type="text" name="ticket" value="<?php echo isset($info['ticket'])?$info['ticket']:''; ?>" style="width: 30%; border-bottom: 1px solid #000;"></b></i></p>
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 20px 2px 2px;">
				&nbsp;
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
