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
input[type="text"]{ border-bottom: 0px solid #000; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 15px; font-weight: normal;}
	li{margin-bottom: 7px; font-size: 15px;}
	.address2 {
		height: 38px;
	}
	.address3 {
		height: 37px;
	}
@media print {
	.address2_title {
		height: 43px;
	}
	.address3_title {
		height: 43px;
	}
	.price {
	    height: 298px;
	}
	input[type="text"]{
		padding: 32px;
	}
	h2{background-color: #ccc;}	
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h2 style="float: left; width: 100%; text-align: center;"><b>ALSBOU MOTORS</b></h2>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0px; border-top: 1px solid #000; border-right: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<label>NAME:</label>
				<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000;">
				<label>VEHICLE:</label>
				<input type="text" name="vehicle" value="<?php echo isset($info['vehicle']) ? $info['vehicle'] : ''; ?>" style="width: 82%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px; border-right: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<span style="border-bottom: 1px solid #000; box-sizing: border-box; padding: 15px 5px; display: block;">
					<label>ADDRESS:</label>
					<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:'';  ?>" style="width: 80%">
				</span>
				<label class="address2_title"></label>
				<input class="address2" type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:'';  ?>" style="width: 100%; border-bottom: 1px solid #000;">
				<label class="address3_title"></label>
				<input class="address3" type="text" name="address3" value="<?php echo isset($info['address3'])?$info['address3']:'';  ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box;  border-left: 1px solid #000;">
				<div class="one-half-outer" style="float: left;  box-sizing: border-box; padding: 15px 5px; width: 100%; border-bottom: 1px solid #000;">
					<div class="one-half" style="float: left; width: 50%;">
						<label>PLATES:</label>
						<input type="text" name="plates1" value="<?php echo isset($info['plates1'])?$info['plates1']:'';  ?>" style="width: 68%">
					</div>
					<div class="one-half" style="float: right; width: 50%;">
						<label>MILES:</label>
						<input type="text" name="miles1" value="<?php echo isset($info['miles1'])?$info['miles1']:'';  ?>" style="width: 64%">
					</div>
				</div>
				
				<div class="one-half-outer" style="float: left; width: 100%; box-sizing: border-box; padding: 15px 5px; border-bottom: 1px solid #000;">
					<div class="one-half" style="float: left; width: 100%;">
						<label>TRADE VIN:</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" style="width: 80%">
					</div>
				</div>
				
				<div class="one-half-outer" style="float: left; width: 100%; box-sizing: border-box; padding: 15px 5px; border-bottom: 1px solid #000;">
					<div class="one-half" style="float: left; width: 50%;">
						<label>PLATES:</label>
						<input type="text" name="plates2" value="<?php echo isset($info['plates2'])?$info['plates2']:'';  ?>" style="width: 68%">
					</div>
					<div class="one-half" style="float: right; width: 50%;">
						<label>MILES:</label>
						<input type="text" name="miles2" value="<?php echo isset($info['miles2'])?$info['miles2']:'';  ?>" style="width: 64%">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px; border-right: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<label>PHONE:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:'';  ?>" style="width: 83%">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000;">
				<label>REGISTERED TO:</label>
				<input type="text" name="rigistered" value="<?php echo isset($info['rigistered'])?$info['rigistered']:'';  ?>" style="width: 72%">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0px; border-right: 1px solid #000">
			<div class="form-field price" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<h2 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0 0 20px;">PRICE OF VEHICLE:</h2>
				<span style="float: left; width: 100%;">
					<label style="vertical-align: top;">RETAIL:</label>
					<textarea name="retail" value="<?php echo isset($info['retail'])?$info['retail']:'';  ?>" style="width: 80%; height: 69px; border: 0;"></textarea>
				</span>
				<span style="float: left; width: 100%;">
					<label style="vertical-align: top;">ASKING:</label>
					<textarea name="ask" value="<?php echo isset($info['ask'])?$info['ask']:'';  ?>" style="width: 80%; height: 94px;  border: 0;"></textarea>
				</span>
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000;">
				<h2 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0 0 20px;">PRICE OF VEHICLE:</h2>
				<span style="float: left; width: 100%;">
					<label style="vertical-align: top;">STILL OWING:</label>
					<textarea name="still_owing" value="<?php echo isset($info['still_owing'])?$info['still_owing']:'';  ?>" style="width: 76%; height: 60px; border: 0;"></textarea>
				</span>
				<span style="float: left; width: 100%;">
					<label style="vertical-align: top;">WHICH BANK:</label>
					<textarea name="bank" value="<?php echo isset($info['bank'])?$info['bank']:'';  ?>" style="width: 76%; height: 60px;  border: 0;"></textarea>
				</span>
				
				<div class="one-half-outer" style="float: left; width: 100%; box-sizing: border-box; padding: 7px 5px;">
					<div class="one-half" style="float: left; width: 50%;">
						<label>PLATES:</label>
						<input type="text" name="plates3" value="<?php echo isset($info['plates3'])?$info['plates3']:'';  ?>" style="width: 68%">
					</div>
					<div class="one-half" style="float: right; width: 50%;">
						<label>MILES:</label>
						<input type="text" name="miles3" value="<?php echo isset($info['miles3'])?$info['miles3']:'';  ?>"  style="width: 64%">
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px; border-right: 1px solid #000">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<h2 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0 0 20px;">CASH DOWN:</h2>
				<textarea name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:'';  ?>" style="width: 100%; height: 120px; border: 0;"></textarea>
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000;">
				<h2 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0 0 20px;">MONTHLY PAYMENT:</h2>
				<textarea name="mon_payment" value="<?php echo isset($info['mon_payment'])?$info['mon_payment']:'';  ?>" style="width: 100%; height: 120px; border: 0;"></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px; border-right: 1px solid #000">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 15px 5px; border-left: 1px solid #000; border-bottom: 1px solid #000; ">
				<label style=" font-size: 16px; margin: 0;">IF ALL TERMS ARE AGREEABLE, I WILL BUY TODAY:</label>
				<input type="text" name="terms_agree" value="<?php echo isset($info['terms_agree'])?$info['terms_agree']:'';  ?>" style="width: 55%">
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
