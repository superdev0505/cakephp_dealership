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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	table th, table td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;}
	table input[type="text"]{border-bottom: 0px;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 20%; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-river-wind.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="logo" style="width: 20%; margin: 0 auto;">
			<img src="wind-river-logo1.jpg" alt="" style="width: 100%;">
		</div>
		<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;"><b>CUSTOMER INFO</b></h2>
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Name</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Sales</label>
				<input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Home Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 86%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 70%;;">
			</div>
			<div class="form-field" style="float: left; width: 10%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 67%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; border-bottom: 1px dashed #000; padding: 0 0 14px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>EmailAddress</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 90.5%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;"><b>NEW UNIT INFO</b></h2>
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 13%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;;">
			</div>
			<div class="form-field" style="float: left; width: 12%;">
				<label>Key Code</label>
				<input type="text" name="key" value="<?php echo isset($info['key']) ? $info['key'] : ''; ?>" style="width: 40%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; border-bottom: 1px dashed #000; padding: 0 0 14px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Stock#</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Vin</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 94%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;"><b>TRADE INFO</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label>Allowance</label>
				<input type="text" name="allowance" value="<?php echo isset($info['allowance']) ? $info['allowance'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Payoff</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Difference</label>
				<input type="text" name="diff" value="<?php echo isset($info['diff']) ? $info['diff'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Color</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Mileage</label>
				<input type="text" name="mileage_data" value="<?php echo isset($info['mileage_data']) ? $info['mileage_data'] : $info['odometer']; ?>" style="width: 72%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; padding: 0 0 14px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Vin</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Lien Holder</label>
				<input type="text" name="lien" value="<?php echo isset($info['lien']) ? $info['lien'] : ''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 20px 0 3px; float: left;">
			<tr>
				<td style="width: 46%;">Price</td>
				<td style="width: 54%;"><input type="text" name="price" value="<?php echo isset($info['price']) ? $info['price'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Freight & Prep</td>
				<td><input type="text" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Assessories</td>
				<td><input type="text" name="assess" value="<?php echo isset($info['assess']) ? $info['assess'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Labor</td>
				<td><input type="text" name="labor" value="<?php echo isset($info['labor']) ? $info['labor'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Document Fee</td>
				<td><input type="text" name="document_fee" value="<?php echo isset($info['document_fee']) ? $info['document_fee'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo isset($info['price']) ? $info['price'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Trade</td>
				<td><input type="text" name="trade" value="<?php echo isset($info['trade']) ? $info['trade'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td><input type="text" name="total_price" value="<?php echo isset($info['total_price']) ? $info['total_price'] : ''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 49%; margin: 0;">
				<input type="text" name="sign_buyer" value="<?php echo isset($info['sign_buyer']) ? $info['sign_buyer'] : ''; ?>" style="float: left; width: 100%; margin-bottom: 2px;">
				<label>Signature of Buyer</label>
			</div>
			<div class="form-field" style="float: right; width: 49%; margin: 0; margin-bottom: 2px;">
				<input type="text" name="acceptance" value="<?php echo isset($info['acceptance']) ? $info['acceptance'] : ''; ?>" style="float: left; width: 100%;">
				<label>Dealer Acceptance</label>
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
