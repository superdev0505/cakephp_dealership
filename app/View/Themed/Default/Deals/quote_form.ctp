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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 16px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	.bg{background-color: blue;}
	
@media print {
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	.bg{background-color: blue !important;}
	.header-title {color: blue !important;}
	.row {margin: 10px 0 !important;}
	input {padding: 4px !important;}
	.input-color {-webkit-print-color-adjust: exact;}
	label {font-size: 23px !important;}
	p {font-size: 18px !important;}
	.input70 {width: 65% !important;}
	.input75 {width: 76% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 300px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-life.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 14px 0px 5px;">
			<div class="form-field" style="float: left; width: 80%;">
				<label class="header-title" style="float: left; font-size: 25px; color: blue; font-style: italic; font-weight: 700;">RVs Northwest</label>
				<label class="header-title" style="float: left; margin-left: 31%; font-family: cursive; font-size: 21px; color: blue; font-style: italic; font-weight: 700;">Since 1985</label>
			</div>
			<div class="form-field" style="float: right; width: 20%;">
				<label class="header-title" style="float: left; color: blue;font-size: 21px; font-style: italic; font-weight: 700;">Quote#</label>
				<input class="input-color" type="text" name="quote" value="<?php echo isset($info['quote'])?$info['quote']:''; ?>" style="width: 60%;color: blue; background-color: yellow !important;">
			</div>
		</div>
		
		<p style="float: left; width: 53%; font-siz: 14px; text-align: center;">18919 E Broadway Ave, Spokane Valley, WA 99016 * 509-924-6800 Phone</p>
		<p class="header-title" style="float: left;margin-left: 29%;font-size: 18px;color: blue; font-style: italic; font-weight: 700;">*RVsNorthwest.com</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>	Salesperson(s)</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: right; width: 20%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer(s) <b><i style="color: #757373">LEGAL NAME</i></b></label>
				<input type="text" class="input70" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 78.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Physical Address</label>
				<input type="text" class="input75" name="address_data"  value="<?php echo isset($info['address_data']) ? $info['address_data'] :  $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 86.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Mailing Address</label>
				<input type="text" class="input75" name="mailing_address" value="<?php echo isset($info['mailing_address'])?$info['mailing_address']:''; ?>" style="width: 87.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>Ph</b></label>
				<input type="text" name="phone" value="<?php $phone = $info['phone']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $cleaned1;  ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>Ph</b></label>
				<input type="text" name="mobile" value="<?php $mobile = $info['mobile']; $mobile_number = preg_replace('/[^0-9]+/', '', $mobile); $cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $mobile_number); echo $cleaned2;  ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>email</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 21%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<label>Brand</label>
				<input type="text" name="brand" value="<?php echo isset($info['brand'])?$info['brand']:''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 37%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Stock #</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Vin #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Miles</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; font-size: 15px; margin: 10px 0 3px;"><b>Trade</b></h3>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Brand</label>
				<input type="text" name="brand_trade" value="<?php echo isset($info['brand_trade'])?$info['brand_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Stock #</label>
				<input type="text" name="stock_num_trade" value="<?php echo isset($info['stock_num_trade'])?$info['stock_num_trade']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Vin #</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Miles</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>My hitch set up will be :</label>
				<input type="text" class="input70" name="hitch" value="<?php echo isset($info['hitch'])?$info['hitch']:''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>$</label>
				<input type="text" class="price" id="retail_value" name="retail_value" value="<?php echo isset($info['retail_value'])?$info['retail_value']:''; ?>" style="width: 15%;">
				<label>Retail Value</label>
				<input type="text" class="price" id="retail_price" name="retail_price" value="<?php echo isset($info['retail_price'])?$info['retail_price']:''; ?>" style="width: 15%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>$</label>
				<input type="text" class="price" id="sale_value" name="sale_value" value="<?php echo isset($info['sale_value'])?$info['sale_value']:''; ?>" style="width: 15%;">
				<label>Sale Amount +</label>
				<input type="text" class="price" id="sale_amount" name="sale_amount" value="<?php echo isset($info['sale_amount'])?$info['sale_amount']:''; ?>" style="width: 15%;">
				<label>Adds = $</label>
				<input type="text" class="price" id="add" name="add" value="<?php echo isset($info['add'])?$info['add']:''; ?>" style="width: 15%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>+</label>
				<input type="text" class="price" id="tax" name="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 15%; border-bottom: 1px solid red;">
				<label style="color: red !important;">Tax</label>
				<input type="text" class="price" id="doc" name="doc" value="<?php echo isset($info['doc'])?$info['doc']:''; ?>" style="width: 15%;">
				<label>Doc</label>
				<input type="text" class="price" id="title" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 15%;">
				<label>Title</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>+</label>
				<input type="text" class="price" id="sub_total" name="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" style="width: 15%;">
				<label>Sub Total</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>-</label>
				<input type="text" class="price" id="trade_amt" name="trade_amt" value="<?php echo isset($info['trade_amt'])?$info['trade_amt']:''; ?>" style="width: 15%;">
				<label>Trade Amount</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>+</label>
				<input type="text" class="price" id="trade_payoff" name="trade_payoff" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" style="width: 15%;">
				<label>Trade Payoff</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>$</label>
				<input type="text" class="price" id="net_trade" name="net_trade" value="<?php echo isset($info['net_trade'])?$info['net_trade']:''; ?>" style="width: 15%;">
				<label>Net Trade <span style="color: blue !important; font-size: 18px;">+/-</span></label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>$</label>
				<input type="text" class="price" id="total_amt" name="total_amt" value="<?php echo isset($info['total_amt'])?$info['total_amt']:''; ?>" style="width: 15%;">
				<label>Total Amount </label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>-</label>
				<input type="text" class="price" id="cash_down" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 15%; border-bottom: 1px solid green;">
				<label style="color: green !important;">$ Cash Down $</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>$</label>
				<input class="input-color" type="text" class="price" id="balance" name="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 15%; background-color: yellow !important;">
				<label>Unpaid Balance</label>
			</div>
			
			
			<div class="form-field" style="float: left; width: 100%; margin: 20px 0 3px;">
				<label>Buyer Accepts</label>
				<input class="input-color" type="text" name="buyer_accept" value="<?php echo isset($info['buyer_accept'])?$info['buyer_accept']:''; ?>" style="width: 15%; background-color: yellow !important;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>Co-Buyer Accepts</label>
				<input class="input-color" type="text" name="co_buyer_accept" value="<?php echo isset($info['co_buyer_accept'])?$info['co_buyer_accept']:''; ?>" style="width: 15%; background-color: yellow !important;">
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
	
	$(".price").on('change keyup paste', function(){
		calculate_totalinvoice();
	});

	function calculate_totalinvoice() {
		var retail_value = isNaN(parseFloat( $('#retail_value').val()))?0.00:parseFloat($('#retail_value').val());
		$("#sale_value").val(retail_value.toFixed(2));
		var sale_amount = isNaN(parseFloat( $('#sale_amount').val()))?0.00:parseFloat($('#sale_amount').val());
		var add = retail_value + sale_amount;
		$("#add").val(add.toFixed(2));
		var tax = isNaN(parseFloat( $('#tax').val()))?0.00:parseFloat($('#tax').val());
		var doc = isNaN(parseFloat( $('#doc').val()))?0.00:parseFloat($('#doc').val());
		var title = isNaN(parseFloat( $('#title').val()))?0.00:parseFloat($('#title').val());
		var sub_total = add + tax + doc + title;
		$("#sub_total").val(sub_total.toFixed(2));
		var trade_amt = isNaN(parseFloat( $('#trade_amt').val()))?0.00:parseFloat($('#trade_amt').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var net_trade = trade_payoff - trade_amt;
		$("#net_trade").val(net_trade.toFixed(2));
		var total_amt = sub_total + net_trade;
		$("#total_amt").val(total_amt.toFixed(2));
		var cash_down = isNaN(parseFloat( $('#cash_down').val()))?0.00:parseFloat($('#cash_down').val());
		var balance = total_amt - cash_down;
		$("#balance").val(balance.toFixed(2));
	}
     
});

	
	
	
	
	
</script>
</div>
