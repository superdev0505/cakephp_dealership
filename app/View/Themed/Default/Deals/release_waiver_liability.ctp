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
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px;"><b>THIS IS A RELEASE AND WAIVER OF LIABILITY</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 12px 0 4px; font-size: 15px;">I, <input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 30%;">, the undersigned am desirous of obtaining the use of a vehicle from: <br><i>Nilsen Brothers, Inc D.B.A: The Brothers Power Sports</i> in Bremerton, WA.</p>

		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">Its owners, sales personnel, employees or agents referred to hereafter as (the "Dealer") for test ride.</p>

		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I undertand that such rides or use are furnished to me as a courtesy of the Dealer without cost or obligation to me. In consideration of the Dealer furnishing a vehicle to me now or in the future, I agree to walve any and all claims, to indemnify and harmless Dealer, for any and all injuries to myself, passengers and cost (including but not limited to attorney fees) arising in connecion with or related to my use, in any manner, of any Dealer vehicle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init1" value="<?php echo isset($info['init1'])?$info['init1']:''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I further represent that I am at least 21 years of age and posses a motorcycle endorsed drivers' license</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init2" value="<?php echo isset($info['init2'])?$info['init2']:''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I willl not take any Dealer vehicle out of the state of WASHINGTON. I will not exceed posted speed limits, and will obey all laws of the State of WASHINGTON.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init3" value="<?php echo isset($info['init3'])?$info['init3']:''; ?>" style="width: 83%;">
			</div>
		</div>
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I will not allow any other person to operate the Dealer vehicle entrusted to me.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init4" value="<?php echo isset($info['init4'])?$info['init4']:''; ?>" style="width: 83%;">
			</div>
		</div>
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I will not operate any Dealer vehicle if I have consumed any alcoholic beverages or drugs that may impair my abilities within 12 hours of the usage of the Dealer vehicle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init5" value="<?php echo isset($info['init5'])?$info['init5']:''; ?>" style="width: 83%;">
			</div>
		</div>
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I own, have owned or operated a comparable vehicle to the one that I am about to test ride and as a result certify that I am competent to safely operate the motorcycles, ATV, PWC, or other similar vehicle of the type and class that I am being provide by the dealer.</p>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init6" value="<?php echo isset($info['init6'])?$info['init6']:''; ?>" style="width: 83%;">
			</div>
		</div>
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;">I will pay or authorize to be paid in behalf by my estate any and all costs incurred by the Dealer of its agents, as a result of any claims, losses, actions, demands, judgments, (including but not limited to attorney fees) of any type arising in connection with or related to my use in any manner of any Dealer vehicle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: right; width: 30%;">
				<label>Initial</label>
				<input type="text" name="init7" value="<?php echo isset($info['init7'])?$info['init7']:''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 14px 0 7px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Print Name</label>
				<input type="text" name="print" value="<?php echo isset($info['print'])?$info['print']:''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Vehicle being test rode</label>
				<input type="text" name="vehicle" value="<?php echo isset($info['vehicle'])?$info['vehicle']:''; ?>" style="width: 59%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 93%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 28%;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 22%;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Drivers License Number</label>
				<input type="text" name="license_number" value="<?php echo isset($info['license_number'])?$info['license_number']:''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>State</label>
				<input type="text" name="license_state" value="<?php echo isset($info['license_state'])?$info['license_state']:''; ?>"  style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Insurance Company</label>
				<input type="text" name="ins_company" value="<?php echo isset($info['ins_company'])?$info['ins_company']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Policy Number</label>
				<input type="text" name="policy_number" value="<?php echo isset($info['policy_number'])?$info['policy_number']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Signature</label>
				<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:''; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<h2 style="text-decoration: underline; float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px;"><b>THIS IS A RELEASE AND WAIVER OF LIABILITY</b></h2>
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
