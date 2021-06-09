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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px;}
	.list li {display: inline-block; font-size: 13px; list-style: outside none none; width: 24%; margin-bottom: 7px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: left; padding: 1px 10px; font-size: 15px;}
	 table input[type="text"]{ border-bottom: 0px solid #000;}
	 table{border-top: 1px solid #000; border-left: 1px solid #000;}
	
	body{font-size: 12px;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0  0;">
			<h1 style="text-align: center; font-size: 25px; margin: 20px 0 7px;"><b>DEMO RIDER WAIVER <br> RELEASE OF LIABILITY AND INDEMNITY AGREEMENT</b></h1>
			<p style="margin: 0; font-size: 18px;">I <input type="text" name="content1" value="<?php echo isset($info['content1']) ? $info['content1'] : ''; ?>" style="width: 20%;">, the undersigned, am requesting to test drive a vehicle from:</p>
			
			<h3 style="float: left; width: 100%; margin: 7px 0; font-size: 20px;">RIDERS BIKE SHOP. INC. DBA <br> RIDERS HARLEY DAVIDSON <span style="margin: 0 0 0 100px; font-size: 20px;">BIRMINGHAM, AL 35173</span></h3>
			
			<p style="float: left; width: 100%; margin: 10px 0;">Its owners, sales personnel, employees or agents (referred to hereinafter as "Dealer").<b>Initial </b> [ <input type="text" name="content2" value="<?php echo isset($info['content2']) ? $info['content2'] : ''; ?>" style="width: 5%"> ]</p>
			
			
			<p style="float: left; width: 100%; margin: 10px 0;">I understand that such test drive(s) is/are furnished to me as a courtesy by the dealer without cost or obligation on to me and in consideration of the Dealer furnishing a vehicle to me mow or in the future for the above purpose. I agree to  waive any and all claims for any and all injuries to myself, passengers, property damage, losses, claims, demands, judgments, and liabilities, whatsoever	, and from all expenses and costs (including but not limited to attorneys' fees) arising in connection with or related to my use, in any manner, of any Dealer vehicle, and if Dealer is/or does become liable in connection with my use of the vehicle, I agree to indemnify and hold harmless the Dealer.	<span><b>Initial </b>[ <input type="text" name="content3" value="<?php echo isset($info['content3']) ? $info['content3'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I further represent that I am at least 18 years of age and personally posses a valid operator's license fot the type of vehicle/product being test driven, if such license is requries by law. (<b>If no, Parent or Guardian Permission below <span style="text-decoration: underline;">must</span> be completed.</b>) <br> <span style="margin: 0;"><b>Initial </b>[ <input type="text" name="content4" value="<?php echo isset($info['content4']) ? $info['content4'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I will not take any Dealer vehicle out of the state of <b style="text-decoration: underline;">ALABAMA</b>. I will not exceed posted speed limlits, and will obey all laws of the state of <b style="text-decoration: underline;">ALABAMA</b> while test driving this vehicle. <span style="margin: 0 0 0 100px;"><b>Initial </b>[ <input type="text" name="content9" value="<?php echo isset($info['content9']) ? $info['content9'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I will not allow any other person to operate the dealer vehicle entrusted to me. <span style="margin: 0 0 0 100px;"><b>Initial </b>[ <input type="text" name="content5" value="<?php echo isset($info['content5']) ? $info['content5'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I will not operate any dealer vehicle if I have consumed any alcoholic beverages or drugs that may impair my abilities, within 12 hours of usage of the dealer vehicle. <span style="margin: 0 0 0 100px;"><b>Initial </b>[ <input type="text" name="content6" value="<?php echo isset($info['content6']) ? $info['content6'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I owe, have owned or operated a comparable vehicle to the one that I am about to test drive as a result certify that I am competent to safely operate the motorcycle, ATV, personal watercraft, snowmobile or similar vehicle of the type and class that I am now requesting the Dealer to provide me for purpose of a test drive. <span style="margin: 0 0 0 100px;"><b>Initial </b>[ <input type="text" name="content7" value="<?php echo isset($info['content7']) ? $info['content7'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 10px 0 3px;">I will pay or authorize to be paid in my behalf of my estate, any and all costs incurred by the Dealer or its agents, as a result of any claims, losses, actions, demands, judgments, (including but not limited to attorneys'), of any type arising in connection with or related to my use, in any manner, of any Dealer vehicle. <span style="margin: 0 0 0 100px;"><b>Initial </b>[ <input type="text" name="content8" value="<?php echo isset($info['content8']) ? $info['content8'] : ''; ?>" style="width: 5%"> ]</span></p>
			
			<p style="float: left; width: 100%; margin: 0 0 10px;"><b>As evidence by my signature below, I fully understand the contents of this release and waiver of liability and, further, I am knowingly and voluntarily signing this release and waiver of liability.</b></p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 75%;">
				<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 100%;">
				<label>SIGNATURE:</label>
			</div>
			<div class="form-field" style="float: right; width: 24%;">
				<input type="text" name="date" value="<?php echo date("m/d/Y") ?>" style="width: 100%; float: right;">
				<label>DATE:</label>
			</div>
		</div>
	
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Print Name:</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 87%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 93%; float: right">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 80%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 75%;">
				<label>Driver's License Number:</label>
				<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>State:</label>
				<input type="text" name="state1" value="<?php echo isset($info['state1']) ? $info['state1'] : ''; ?>" style="width: 80%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Insurance Company:</label>
				<input type="text" name="insurance_company" value="<?php echo isset($info['insurance_company']) ? $info['insurance_company'] : ''; ?>" style="width: 68%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Policy Number:</label>
				<input type="text" name="policy_number" value="<?php echo isset($info['policy_number'])?$info['policy_number']:''; ?>" style="width: 76%; float: right;">
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; margin: 16px 0; font-size: 23px; text-align: center;">Parent or Guardian Permission</h3>
		
		<p style="float: left; width: 100%; margin: 0 0 10px;">In consideration for my child or ward being allowed to participate in this test drive and use and/or operate the dealer vehicle, I agree and represent that I am the parent or legal guardian of the above rider and give permission for the minor child or ward to operate, use and ride the Dealer vehicle and agree on behalf of the minor, myself and my spouse, heirs, and legal representatives, to the terms of the above waiver, release of Liability and Indemnity Agreement.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 15%;">
				<input type="text" name="date1" value="<?php echo isset($info['date1'])?$info['date1']:''; ?>" style="width: 100%;">
				<label>Date:</label>
			</div>
			<div class="form-field" style="float: left; width: 45%; margin: 0 1%;">
				<input type="text" name="signature_parent1" value="<?php echo isset($info['signature_parent1'])?$info['signature_parent1']:''; ?>" style="width: 100%;">
				<label>Signature of Parent / Guardian:</label>
			</div>
			<div class="form-field" style="float: left; width: 38%;">
				<input type="text" name="print_parent1" value="<?php echo isset($info['print_parent1'])?$info['print_parent1']:''; ?>" style="width: 100%;">
				<label>Print Name  of Parent / Guardian:</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 15%;">
				<input type="text" name="date2" value="<?php echo isset($info['date2'])?$info['date2']:''; ?>" style="width: 100%;">
				<label>Date:</label>
			</div>
			<div class="form-field" style="float: left; width: 45%; margin: 0 1%;">
				<input type="text" name="signature_parent2" value="<?php echo isset($info['signature_parent2'])?$info['signature_parent2']:''; ?>" style="width: 100%;">
				<label>Signature of Parent / Guardian:</label>
			</div>
			<div class="form-field" style="float: left; width: 38%;">
				<input type="text" name="print_witness" value="<?php echo isset($info['print_witness'])?$info['print_witness']:''; ?>" style="width: 100%;">
				<label>Print Name of Witness:</label>
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
