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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			p{margin: 11px 0; line-height: 20px;}
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
		.text ul li{margin: 0 0 0 17px; list-style: none;}
	@media print { 
	.dontprint{display: none;}
		/*body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; margin: 0; padding: 0;}
	label{font-size: 13px;}*/
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
			<div class="row" style="float: left; width: 100%; margin: 0 0; border-bottom: 3px solid #f58220;">
			<div class="logo" style="width: 200px; margin: 0 auto;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/dealer_logo.png'); ?>" alt="" style="width: 100%; margin-bottom: 20px;">
			</div>
			<h2 style="text-align: center; font-weight: bold; font-size: 24px;">PAYOFF FORM</h2>
		</div>
		<div class="row" style="border-bottom: 1px solid #f58220; float: left; margin: 0 0 2px 0; padding: 0 0 8px; position: relative; text-align: center; width: 100%;">
			<span style="font-weight: bold; font-size: 20px; left: 0; position: absolute; top: 40%; transform: rotate(270deg);">Dealer</span>
			<h3 style="margin: 9px 0 4px; font-weight: bold; font-size: 20px;">MAIL LIEN RELEASE AND/OR TITLE TO:</h3>
			<p style="margin: 0;">Southern Thunder Harley-Davidson</p>
			<p style="margin: 0;">4870 Venture Dr</p>
			<p style="margin: 0;">Southaven, MS 38671</p>
			<p style="margin: 0;">Phone: (662) 349-1099</p>
		</div>
		<div class="customer" style="border-bottom: 1px solid #f58220; border-top: 1px solid #f58220; float: left; margin: 0 0 2px; padding: 0 0 20px; position: relative; width: 100%;">
			<span style="font-weight: bold; font-size: 20px; left: -14px; position: absolute; top: 40%; transform: rotate(270deg);">Customer</span>
			<div class="inner" style="width: 78%; margin: 20px auto 0;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Customer</label>
					<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 90%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 91%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>City</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>State</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 74%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>Zip</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%;">
				</div>
			</div>
			</div>
		</div>
		
		<div class="unit-info" style="float: left; width: 100%; border-top: 1px solid #f58220; border-bottom: 1px solid #f58220; position: relative; padding: 22px 0; margin-bottom: 2px;">
			<span style="font-weight: bold; font-size: 20px; left: -14px; position: absolute; top: 40%; transform: rotate(270deg);">Unit Info</span>
			<div class="inner" style="width: 78%; margin: 0 auto;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%;">
						<label>Year</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 84%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin: 0 3%">
						<label>Make</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 81%;">
					</div>
					<div class="form-field" style="float: right; width: 30%; ">
						<label>Model</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 74%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Serial #</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 91%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="Lienholder" style="float: left; width: 100%;  position: relative; padding: 22px 0; border-top: 1px solid #f58220; border-bottom: 1px solid #f58220;">
			<span style="font-weight: bold; font-size: 20px; left: -20px; position: absolute; top: 40%; transform: rotate(270deg);">Lienholder</span>
			<div class="inner" style="width: 78%; margin: 0 auto;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Lienholder</label>
					<input type="text" name="lienholder" value="<?php echo isset($info['lienholder'])?$info['lienholder']:''; ?>" style="width: 89%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Address</label>
					<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 90.4%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0; ">
				<div class="form-field" style="float: left; width: 50%;">
					<label>City</label>
					<input type="text" name="city2"  value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>State</label>
					<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>Zip</label>
					<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label>Phone #</label>
					<input type="text" name="lien_phone" value="<?php echo isset($info['lien_phone'])?$info['lien_phone']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 49%;">
					<label>Contact</label>
					<input type="text" name="lien_mobile" value="<?php echo isset($info['lien_mobile'])?$info['lien_mobile']:''; ?>" style="width: 83%;">
				</div>
			</div>
			
			<div class="row pay-off-amount" style="float: left; width: 100%; margin: 7px 0; ">
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width: 100%; border: 1px solid #000; height: 30px;">
					<label>Pay Off Amount</label>
				</div>
				<div class="form-field" style="float: left; width: 30%; margin: 0 4%">
					<input type="text" name="good_untill" value="<?php echo isset($info['good_untill'])?$info['good_untill']:''; ?>" style="width: 100%; border: 1px solid #000; height: 30px;">
					<label>Good Until</label>
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="per_diem_amount" value="<?php echo isset($info['per_diem_amount'])?$info['per_diem_amount']:''; ?>" style="width: 100%; border: 1px solid #000; height: 30px;">
					<label>Per Diem Amount</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Account#</label>
					<input type="text" name="account_num" value="<?php echo isset($info['account_num'])?$info['account_num']:''; ?>" style="width: 89%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Payoff information recorded by:</label>
					<input type="text" name="payoff_info" value="<?php echo isset($info['payoff_info'])?$info['payoff_info']:''; ?>" style="width: 68%;">
				</div>
			</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0; border-top: 1px solid #f58220;">
			<p style="width: 90%; margin: 22px auto;">My signature below authorizes lienholder to accept loan payoﬀ from Southern Thunder Harley-Davidson
and authorizes the title to be mailed directly to Southern Thunder Harley-Davidson. Should the payoﬀ be
more than estimate above, I agree to pay the dealer the diﬀerence.</p>
		</div>
		
		<div class="row" style="float: left; width: 100%;">
			<div class="inner" style="width: 85%; margin: 0 auto;">
				<div class="form-field" style="float: left; width: 49%;">
					<label>Signed: </label>
					<input type="text" name="name" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 49%;">
					<label>Date: </label>
					<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 80%;">
				</div>
			</div>
		</div>
		
		</div>
		<!-- container end -->
		
			
	
	</div>
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
