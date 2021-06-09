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
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 16px; margin-bottom: 0px; font-weight: normal !important;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
@media print {
.left-text{background:#000;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
input[type="text"]{margin-bottom: 40px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="width: 40%; float: left; margin: 0 30px 0 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bluff-powersports-logo.png'); ?>" alt="" style="width: 100%;">
				<strong style="font-size: 20px; display: block; text-align: right; padding: 16px 25px;">Sales<span>.</span> Service <span>.</span> Parts</strong>
			</div>
			
			<div class="combo-logo" style="width: 15%; float: left;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/honda-motocycle-logo.jpg'); ?>" alt="" style="width: 100%; height: 50px;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/polaris-logo.jpg'); ?>" alt="" style="width: 100%; height: 50px;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/spartan-mower-logo.png'); ?>" alt="" style="width: 100%; height: 50px;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/kawasaki-logo.png'); ?>" alt="" style="width: 100%; height: 50px;">
			</div>
			
			<div class="right" style="float: right; text-align: center; font-size: 25px; margin: 40px 24px;">
				Bluff Powersports <br> 4250 Hwy 67 N <br> Poplar Bluff, MO 63901
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 79%;">
			</div>
		</div>
		
		
		<p style="float: left; width: 100%; margin: 36px 0;"> To Whom it May Concern,</p>
		<p style="float: left; width: 100%; line-height: 30px; margin-bottom: 70px;"> Our Customer <input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 39%;"> Acct #  <input type="text" name="acct" value="<?php echo isset($info['acct']) ? $info['acct'] : ''; ?>" style="width: 37%;"> traded in a <input type="text" name="trade_in" value="<?php echo isset($info['trade_in']) ? $info['trade_in'] : $info['year_trade']." ".$info['make_trade']." ".$info['model_trade']; ?>" style="width: 45%;"> VIN# <input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 44%;">. Their account has been paid in full. Please send us  a title and lien release stating it has been paid  in full. Our address is Bluff Powersports 4250 HWY 67 N Poplar Bluff, MO 63901. If you have any questions or there is any problem, please contact me at (573) 785-0146</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 70px;">
			<div class="left" style="float: left; width: 40%;">
				<p style="margin-bottom: 22px;">Thank You</p>
				<div class="signature" style="float: left; width: 100%; height: 120px;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/signature.jpg'); ?>" alt="">
				</div>
				<p style="margin: 0;">Gwen Horner</p>
				<p style="margin: 0;">Finance Manager</p>
			</div>
			
			<div class="right" style="float: right; width: 40%">
				<p>Send Payoff to:</p>
				<input type="text" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : ''; ?>" style="width: 100%; margin: 10px 0;">
				<input type="text" name="payoff2" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : ''; ?>" style="width: 100%; margin: 10px 0;">
				<input type="text" name="payoff3" value="<?php echo isset($info['payoff3']) ? $info['payoff3'] : ''; ?>" style="width: 100%; margin: 10px 0 60px;">
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>In the amount of: $</label>
					<input type="text" name="amount" value="<?php echo isset($info['amount']) ? $info['amount'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<input type="text" name="cus_sign" value="<?php echo isset($info['cus_sign']) ? $info['cus_sign'] : ''; ?>" style="width: 100%;">
				<label>Customer Signature</label>
			</div>
			<div class="form-field" style="float: right; width: 40%;">
				<input type="text" name="manage_appr" value="<?php echo isset($info['manage_appr']) ? $info['manage_appr'] : ''; ?>" style="width: 100%;">
				<label>Management Approval</label>
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
