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
	<div id="worksheet_container" style="width: 925px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
	.rect input[type="text"]{border-bottom: 0px !important;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
input[type="text"]{margin-bottom: 40px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 20px 0; text-align: center;text-decoration: underline;"><b>INSURANCE VERIFICATION</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>CUSTOMER NAME:</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="float: right; width: 82%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>COMPANY:</b></label>
				<input type="text" name="company" value="<?php echo isset($info['company']) ? $info['company'] : ''; ?>" style="float: right; width: 89%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>AGENCY:</b></label>
				<input type="text" name="agency" value="<?php echo isset($info['agency']) ? $info['agency'] : ''; ?>" style="float: right; width: 90%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>ADDRESS:</b></label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="float: right; width: 90%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>CITY:</b></label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="float: right; width: 94%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label><b style="font-size: 17px;">STATE</b></label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 85%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 58%;">
				<label><b style="font-size: 17px;">ZIP CODE</b></label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 83%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>PHONE:</b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="float: right; width: 92%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>AGENT:</b></label>
				<input type="text" name="agent" value="<?php echo isset($info['agent']) ? $info['agent'] : ''; ?>" style="float: right; width: 92%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>POLICY:</b></label>
				<input type="text" name="policy" value="<?php echo isset($info['policy']) ? $info['policy'] : ''; ?>" style="float: right; width: 91%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>EFFECTIVE DATE:</b></label>
				<input type="text" name="effect_date" value="<?php echo isset($info['effect_date']) ? $info['effect_date'] : ''; ?>" style="float: right; width: 83%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>EXPIRATION DATE:</b></label>
				<input type="text" name="expirat_date" value="<?php echo isset($info['expirat_date']) ? $info['expirat_date'] : ''; ?>" style="float: right; width: 82%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>COMP DEDUCT:</b></label>
				<input type="text" name="deduct" value="<?php echo isset($info['deduct']) ? $info['deduct'] : ''; ?>" style="float: right; width: 85%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="font-size: 17px;"><b>COLL DEDUCT:</b></label>
				<input type="text" name="coll_deduct" value="<?php echo isset($info['coll_deduct']) ? $info['coll_deduct'] : ''; ?>" style="float: right; width: 85%;">
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
