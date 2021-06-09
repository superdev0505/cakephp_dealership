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
    <input type="hidden" id="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" name="vin">
    <input type="hidden" id="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" name="vin_trade">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	label{font-size: 15px;}
	table{font-size: 14px;}
	td, th{padding: 7px;}
	table{border: 1px solid #000;}
	th{border-right: 1px solid #000; padding: 4px; border-bottom: 1px solid #000; background-color: #dce9f1; color: black; text-align: center;}
	th:last-child, td:last-child{border-right: 0;}
	td{border-right: 1px solid #000;}
	td input{border-bottom: 0px;}
	.wraper.main input {padding: 0px;}
@media print {
	input[type="text"]{padding: 0px;}
	.sign {margin-top: 10px !important;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">

		<div class="row" style="float: left; width: 100%; margin: 30px 0px 10px;">
			<p>We have been helping family's like you find the RV they need for more than a 1/2 century. In order to come up with a win-win proposal, it is helpful to know what you really want so that we can best suit your needs.</p>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 75%">
				<label>Name(s):</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: right; width: 25%">
				<label style="width: 26%;text-align: right;">Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 74%">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 90.7%;">
			</div>
			<div class="form-field" style="float: right; width: 25%">
				<label style="width: 26%;text-align: right;">Stock #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 75%">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 90.7%;">
			</div>
			<div class="form-field" style="float: right; width: 25%">
				<label style="width: 26%;text-align: right;">Phone #:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 73%; float: right;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 15%">
				<label>Trade In Information:</label>
			</div>
			<div class="form-field" style="width: 60%">
				<label style="float: left;">Amount owned on current RV:</label>
				$<input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="width: 30%;">
			</div>
		</div>
		
		<table style="float: left; margin: 0px 0 15px; width: 100%; text-align: left;" cellpadding="0" cellspacing="0">
			<tr>
				<th class="title">Year</th>
				<th class="title">Make</th>
				<th class="title" style="width: 25%;">Model</th>
				<th class="title" style="width: 25%;">Options</th>
				<th class="title" style="width: 25%;">Condition</th>
			</tr>
			<tr style="height: 55px;">
				<td><input type="text" name="year" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['year'])?$info['year']:''; ?>" /></td>
				<td><input type="text" name="make" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['make'])?$info['make']:''; ?>" /></td>
				<td style="text-align: center;"><input type="text" name="model" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['model'])?$info['model']:''; ?>" /></td>
				<td style="text-align: center;"><input type="text" name="options" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['options'])?$info['options']:''; ?>" /></td>
				<td style="text-align: center;"><input type="text" name="condition" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>" /></td>
			</tr>
		</table>

		<div class="row" style="float: left; width: 100%; margin: 15px 0;">
			<p>We try to be fair when negotiating. We've found that if we take care of our customers, that they take care of us. We want you to get the best value possible, while making enough to cover our overhead and stay in business to server your RV if you need us in the futher.</p>
		</div>

		<table style="float: left; margin: 0px 0 15px; width: 100%; text-align: left;" cellpadding="0" cellspacing="0">
			<tr style="border-bottom: 1px solid;">
				<td style="text-align: center;"><b>Amount Most Dealers Offer</b><br>(Wholesale x.7)</td>
				<td style="text-align: center;"><b>NADA Wholesale</b></td>
				<td style="text-align: center;"><b>NADA Retail</b></td>
			</tr>
			<tr style="height: 55px;">
				<td style="text-align: center;"><input type="text" name="dealers_offer" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['dealers_offer'])?$info['dealers_offer']:''; ?>" /></td>
				<td style="text-align: center;"><input type="text" name="wholesale" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['wholesale'])?$info['wholesale']:''; ?>" /></td>
				<td style="text-align: center;"><input type="text" name="retail" style="border-bottom: 0px; text-align: center;" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" /></td>
			</tr>
		</table>

		<div class="row" style="float: left; width: 100%; margin: 10px 0 15px;">
			<p>Keeping that in mind, what do you think we should  be a fair offer for your RV and why?</p>
		</div>

		<table style="float: left; margin: 0px 0 -1px; width: 100%; text-align: left;" cellpadding="0" cellspacing="0">
			<tr>
				<th style="width: 50%;">
					<label>Vehicle Asking Price:</label>
					<input type="text" name="vehicle_price" style="background-color: #dce9f1;" value="<?php echo isset($info['vehicle_price'])?$info['vehicle_price']:''; ?>" />
				</th>
				<th>
					<label>Trade In Payoff:</label>
					$<input type="text" name="payoff" style="background-color: #dce9f1;" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" />
				</th>
			</tr>
			<tr style="height: 55px;">
				<td>
					<label>Your offer:</label>
					<textarea name="offer" style="width: 96%; height: 250px; border: 0px;"><?php echo isset($info['offer'])?$info['offer']:'' ?></textarea>
				</td>
				<td>
					<label>Amount requested for trade in unit</label>
					<textarea name="trade_in" style="width: 96%; height: 250px; border: 0px;"><?php echo isset($info['trade_in'])?$info['trade_in']:'' ?></textarea>
				</td>
			</tr>
		</table>

		<table style="float: left; margin: 0px; width: 100%; text-align: left;" cellpadding="0" cellspacing="0">
			<tr>
				<th style="width: 50%;">
					<label>Down Payment(most banks require 20%)</label>
				</th>
				<th>
					<label>How Much of a Monthly Payment can you Afford?</label>
				</th>
			</tr>
			<tr style="height: 55px;">
				<td>
					<textarea name="down_payment" style="width: 96%; height: 250px; border: 0px;"><?php echo isset($info['down_payment'])?$info['down_payment']:'' ?></textarea>
				</td>
				<td>
					<textarea name="afford" style="width: 96%; height: 250px; border: 0px;"><?php echo isset($info['afford'])?$info['afford']:'' ?></textarea>
				</td>
			</tr>
		</table>

		<div class="row" style="float: left; width: 100%; margin: 0px;">
			<p><i>Salesman cannot accept offer or obligate seller in any manner whatsover. OFFER IS NOT BINDING UNIT ACCEPTED IN WRITING BY OFFICER OR SALES MANAGER. if  all terms are acceptable, I will likely purchase today.</i></p>
		</div>
		<!-- first page end -->
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


	var vin = $('#vin').val();
	var res = vin.split("");
	for (var i = 0; i <= 15; i++) {
		$("#vin" + i).val(res[i]);
	}
	var vin = $('#vin_trade').val();
	var res = vin.split("");
	for (var i = 0; i <= 15; i++) {
		$("#vin_trade" + i).val(res[i]);
	}

	$(".amount_field").on('change keyup paste',function(){
		calculate_total();
	});

	function calculate_total(){
		var unit_value = isNaN(parseFloat( $("#msrp").val()))?0.00:parseFloat( $("#msrp").val());
		var frieght_fee = isNaN(parseFloat( $("#frieght").val()))?0.00:parseFloat( $("#frieght").val());
		var prep = isNaN(parseFloat( $("#prep").val()))?0.00:parseFloat( $("#prep").val());
		var subtotal1 = unit_value + frieght_fee + prep;
		$("#subtotal1").val(subtotal1.toFixed(2));
		var subtotal1 = isNaN(parseFloat( $("#subtotal1").val()))?0.00:parseFloat( $("#subtotal1").val());
		var dealer_count = isNaN(parseFloat( $("#dealer_count").val()))?0.00:parseFloat( $("#dealer_count").val());
		var unit_value = isNaN(parseFloat( $("#unit_value").val()))?0.00:parseFloat( $("#unit_value").val());
		var trade_value = isNaN(parseFloat( $("#trade_value").val()))?0.00:parseFloat( $("#trade_value").val());
		var difference = unit_value - trade_value;
		$("#difference").val(difference.toFixed(2));
		var difference = isNaN(parseFloat( $("#difference").val()))?0.00:parseFloat( $("#difference").val());
		var doc_fee = isNaN(parseFloat( $("#doc_fee").val()))?0.00:parseFloat( $("#doc_fee").val());
		var access_total = isNaN(parseFloat( $("#access_total").val()))?0.00:parseFloat( $("#access_total").val());
		var taxable_total = subtotal1 + dealer_count + difference + doc_fee + access_total;
		$("#taxable_total").val(taxable_total.toFixed(2));
		var sales_tax = isNaN(parseFloat( $("#sales_tax").val()))?0.00:parseFloat( $("#sales_tax").val());
		var title_lic = isNaN(parseFloat( $("#title_lic").val()))?0.00:parseFloat( $("#title_lic").val());
		var install_total = isNaN(parseFloat( $("#install_total").val()))?0.00:parseFloat( $("#install_total").val());
		var payoff_val = isNaN(parseFloat( $("#payoff_val").val()))?0.00:parseFloat( $("#payoff_val").val());
		var subtotal2 = taxable_total + sales_tax + title_lic + install_total + payoff_val;
		$("#subtotal2").val(subtotal2.toFixed(2));
		
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
