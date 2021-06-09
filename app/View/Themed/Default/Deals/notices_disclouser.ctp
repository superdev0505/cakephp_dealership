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
	label{font-size: 12px;}
	p{font-size: 16px; text-align: center; line-height: 28px;}
	
@media print {
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="width: 300px; margin: 0 auto;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/one-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<h2 style="text-align: center; text-decoration: underline;"><b>NOTICE AND DISCLOSURES</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
			<h3 style="text-align: center; font-size: 17px; margin: 14px 0 7px;"><b>DOCUMENTARY FEE (NG G.S. 20-101.1)</b></h3>
			<p style="margin: 10px 0 7px;;">PURSUANT TO NC GENERAL STATUTE 20-101.1, TRAILERS OF THE EAST COAST, INC. ("TOEC") IS AUTHORIZED TO COLLECT A DOCUMENTARY FEE OF <b>FIFTY DOLLARS ($50.00)</b> FROM ALL CUSTOMERS AS REGULATED UNDER THIS SECTION.</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
			<h3 style="text-align: center; font-size: 17px; margin: 14px 0 7px;"><b>BE SURE TO CHECK THE LUG NUTS ON YOUR TRAILER</b></h3>
			<p style="margin: 10px 0 7px;">TOEC RECOMMENDS THAT YOU CHECK YOUR WHEEL LUGS/BOLTS AT 10, 25, 50, AND 100 MILES THE FIRST TIME YOU TOW YOUR TRAILER. IT IS YOUR RESPONSIBILITY TO ENSURE THAT YOUR TRAILER IS SECURELY CONNECTED TO YOUR TOW VEHICLE USING THE PROPER SIZE BALL, SAFETY CHAINS, AND A 12V BRAKING SYSTEM (IF EQUIPPED).</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
			<h3 style="text-align: center; font-size: 16px; margin: 14px 0 7px; line-height: 28px;"><b>THE TITLE OR CERTIFICATE OF ORIGIN (MCO) TO YOUR TRAILER WILL NOT BE MAILED TO YOU FOR 2-3 WEEKS FROM THE DATE OF PURCHASE, IN ACCORDANCE WITH TOEC POLICY.</b></h3>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
			<h3 style="text-align: center; font-size: 16px; margin: 14px 0 7px; line-height: 28px;"><b>TOEC IS NOT RESPONSIBLE FOR ANY FEES, FINES, OR CITATIONS DUE TO IMPROPERLY WEIGHTED TAGS OR IMPROPERLY CLASSIFIED DRIVERS LICENSES.</b></h3>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<h3 style="text-align: center; font-size: 16px; margin: 14px 0 7px; line-height: 28px;"><b>BY SIGNING BELOW, YOU ACKNOWLEDGE THAT YOU HAVE READ AND AGREE TO ALL DISCLOSURES AND NOTICES LISTED ABOVE.</b></h3>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="width: 100%;">
				<label style="display: block; text-align: right;">CUSTOMER SIGN</label>
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<input type="text" name="date_sign" value="<?php echo isset($info['date_sign']) ? $info['date_sign'] : ''; ?>" style="width: 100%;">
				<label style="display: block; text-align: right;">DATE</label>
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
