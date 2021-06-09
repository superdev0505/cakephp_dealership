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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	
	
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px; border-top: 1px solid #000;}
	td, th{padding: 4px; text-align: center; padding: 7px; border-bottom: 1px solid #000;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	.vehicle_info td input {text-align: center;}
	.leftalign td{text-align: left;}
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.logo-title h2 {line-height: 61px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left logo-title" style="float: left; width: 400px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/van_boxtel_rv_logo.gif'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="right" style="float: right; border: 1px solid #000; width: 43%; border: 1px solid #000; box-sizing: border-box; padding: 3px;">
				<table class="vehicle_info" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td>Stock #</td>
						<td>Mileage</td>
						<td>Date</td>
					</tr>
					
					<tr>
						<td><input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				
				<table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 3px;">
					<tr>
						<td style="text-align: left; width: 33.5%;">Salesperson</td>
						<td style="text-align: left;"><input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: left;">Split Deal</td>
						<td style="text-align: left;"><input type="text" name="split" value="<?php echo isset($info['split']) ? $info['split'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		
		<div class="outer" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; padding: 3px; border: 1px solid #000;">
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 78%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
					<label>Purchaser</label>
					<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] :$info['first_name'].' '.$info['last_name']; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px 3px;">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
					<label>Address</label>
					<input type="text" name="customer_address" value="<?php echo isset($info['customer_address']) ? $info['customer_address'] : $info['address']; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
					<label>City</label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px 3px;">
					<label>State & Zip</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['state'].' '.$info['zip']; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
					<label>Home Phone</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000;">
					<label>Cell Phone</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 2px 3px;">
					<label>&nbsp;</label>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<label style="border: 1px solid #000; border-bottom: 0px; display: inline-block; padding: 10px;"><input type="radio" name="condition_new_check" <?php echo (isset($info['condition_new_check']) && $info['condition_new_check']=='new')?'checked="checked"':''; ?> value="new"> New</label>
			<label style="border: 1px solid #000; border-bottom: 0px; display: inline-block; margin: 0 0 0 -5px; padding: 10px; border-left: 0px; "><input type="radio" name="condition_used_check" <?php echo (isset($info['condition_used_check']) && $info['condition_used_check']=='used')?'checked="checked"':''; ?> value="used"> Used</label>
		</div>
		
		<div class="outer" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px; border: 1px solid #000;">
			<table class="vehicle_info" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="width: 13%;">Year</td>
					<td style="width: 26%;">Make</td>
					<td style="width: 20%;">Model</td>
					<td style="width: 10%;">Type</td>
					<td>Vehicle Identification Number</td>
				</tr>
				
				<tr>
					<td><input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="type" value="<?php echo isset($info['type'])?$info['type']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_id_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="type1" value="<?php echo isset($info['type1'])?$info['type1']:$info['category_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin1" value="<?php echo isset($info['vin1'])?$info['vin1']:$info['vin_addon1']; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$info['year_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make1']:$info['make_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$info['model_id_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="type2" value="<?php echo isset($info['type2'])?$info['type2']:$info['category_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:$info['vin_addon2']; ?>" style="width: 100%;"></td>
				</tr>
			</table>
		</div>
		
		<div class="outer" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box;">
			<div class="left" style="float: left; width: 47%; box-sizing: border-box; padding: 3px; border: 1px solid #000;">
				<table class="leftalign" cellpadding="0" cellspacing="0" width="100%">
					<tr><td><b>Other Conditions of Sale</b></td></tr>
					<tr><td><input type="text" name="condition1" value="<?php echo isset($info['condition1'])?$info['condition1']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition2" value="<?php echo isset($info['condition2'])?$info['condition2']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition3" value="<?php echo isset($info['condition3'])?$info['condition3']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition4" value="<?php echo isset($info['condition4'])?$info['condition4']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition5" value="<?php echo isset($info['condition5'])?$info['condition5']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition6" value="<?php echo isset($info['condition6'])?$info['condition6']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition7" value="<?php echo isset($info['condition7'])?$info['condition7']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition8" value="<?php echo isset($info['condition8'])?$info['condition8']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition9" value="<?php echo isset($info['condition9'])?$info['condition9']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition10" value="<?php echo isset($info['condition10'])?$info['condition10']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition11" value="<?php echo isset($info['condition11'])?$info['condition11']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition12" value="<?php echo isset($info['condition12'])?$info['condition12']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition13" value="<?php echo isset($info['condition13'])?$info['condition13']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition14" value="<?php echo isset($info['condition14'])?$info['condition14']:''; ?>" style="width: 100%;"></td></tr>
					<tr><td><input type="text" name="condition15" value="<?php echo isset($info['condition15'])?$info['condition15']:''; ?>" style="width: 100%;"></td></tr>
				</table>
				
				<div class="row" style="width: 100%; margin: 0; float: left; border: 1px solid #000; box-sizing: border-box; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; border-right: 1px solid #000; text-align: center;">
						<label><input type="checkbox" name="cash_check" <?php echo ($info['cash_check'] == "cash") ? "checked" : ""; ?> value="cash"/> Cash Deal <br> Lien? 
							<label><input type="radio" name="cash_deal" <?php echo ($info['cash_deal'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label>
							<label><input type="radio" name="cash_deal" <?php echo ($info['cash_deal'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
						</label>
						<input type="text" name="cash_deal" value="<?php echo isset($info['cash_deal'])?$info['cash_deal']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 3px; text-align: center;">
						<label><input type="checkbox" name="financing_term" <?php echo ($info['financing_term'] == "finance") ? "checked" : ""; ?> value="finance"/> Pending acceptable <br> financing terms </label>
					</div>
				</div>
				
			</div>
			
			
			<div class="right" style="float: right; width: 47%; box-sizing: border-box; padding: 3px; border: 1px solid #000;">
				<table class="leftalign" cellpadding="0" cellspacing="0" width="100%;"> 
					<tr>
						<td><b>NEW MSRP or Used Price</b></td>
						<td><input type="text" id="unit_value" class="price" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Options</td>
						<td><input type="text" id="price1" class="price" name="price1" value="<?php echo isset($info['price1'])?$info['price1']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options1" value="<?php echo isset($info['options1'])?$info['options1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" id="price2" class="price" name="price2" value="<?php echo isset($info['price2'])?$info['price2']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options2" value="<?php echo isset($info['options2'])?$info['options2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" id="price3" class="price" name="price3" value="<?php echo isset($info['price3'])?$info['price3']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options3" value="<?php echo isset($info['options3'])?$info['options3']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" id="price4" class="price" name="price4" value="<?php echo isset($info['price4'])?$info['price4']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options4" value="<?php echo isset($info['options4'])?$info['options4']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" id="price5" class="price" name="price5" value="<?php echo isset($info['price5'])?$info['price5']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options5" value="<?php echo isset($info['options5'])?$info['options5']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" id="price6" class="price" name="price6" value="<?php echo isset($info['price6'])?$info['price6']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Service Fee</td>
						<td><input type="text" id="service_fee" class="price" name="service_fee" value="<?php echo isset($info['service_fee'])?$info['service_fee']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Discount</td>
						<td><input type="text" id="discount" class="price" name="discount" value="<?php echo isset($info['discount'])?$info['discount']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Cash Price</td>
						<td><input type="text" id="cash_price" class="price" name="cash_price" value="<?php echo isset($info['cash_price'])?$info['cash_price']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options6" value="<?php echo isset($info['options6'])?$info['options6']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price7" value="<?php echo isset($info['price7'])?$info['price7']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Trade Allowance</td>
						<td><input type="text" id="trade_allowance" class="price" name="trade_allowance" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Trade Payoff due to:</td>
						<td><input type="text" id="trade_payoff" class="price" name="trade_payoff" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options7" value="<?php echo isset($info['options7'])?$info['options7']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price8" value="<?php echo isset($info['price8'])?$info['price8']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Down payment on offer</td>
						<td><input type="text" id="down_payment" class="price" name="down_payment" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Additional cash down</td>
						<td><input type="text" id="addition_cash" class="price" name="addition_cash" value="<?php echo isset($info['addition_cash'])?$info['addition_cash']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options8" value="<?php echo isset($info['options8'])?$info['options8']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price9" value="<?php echo isset($info['price9'])?$info['price9']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><b>Total plus tax and license fees</b></td>
						<td><input type="text" id="total_price" class="price" name="total_price" value="<?php echo isset($info['total_price'])?$info['total_price']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="outer" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box;">
			<table class="leftalign" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="width: 77%;">Buyer signature(s) <input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="width: 100%;"></td>
					<td style="width: 23%;">Date <input type="text" name="buyer_date" value="<?php echo isset($info['buyer_date'])?$info['buyer_date']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Accepted by Dealer <input type="text" name="accepted_dealer" value="<?php echo isset($info['accepted_dealer'])?$info['accepted_dealer']:''; ?>" style="width: 100%;"></td>
					<td>Date <input type="text" name="accepted_date" value="<?php echo isset($info['accepted_date'])?$info['accepted_date']:''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
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

	$(".price").on('change keyup paste', function(){
		calculate_totalinvoice();
	});

	function calculate_totalinvoice() {
		var unit_value = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var price1 = isNaN(parseFloat( $('#price1').val()))?0.00:parseFloat($('#price1').val());
		var price2 = isNaN(parseFloat( $('#price2').val()))?0.00:parseFloat($('#price2').val());
		var price3 = isNaN(parseFloat( $('#price3').val()))?0.00:parseFloat($('#price3').val());
		var price4 = isNaN(parseFloat( $('#price4').val()))?0.00:parseFloat($('#price4').val());
		var price5 = isNaN(parseFloat( $('#price5').val()))?0.00:parseFloat($('#price5').val());
		var price6 = isNaN(parseFloat( $('#price6').val()))?0.00:parseFloat($('#price6').val());
		
		var service_fee = isNaN(parseFloat( $('#service_fee').val()))?0.00:parseFloat($('#service_fee').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		var cash_price = isNaN(parseFloat( $('#cash_price').val()))?0.00:parseFloat($('#cash_price').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var down_payment = isNaN(parseFloat( $('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
		var addition_cash = isNaN(parseFloat( $('#addition_cash').val()))?0.00:parseFloat($('#addition_cash').val());
		
		var total_price = unit_value + price1 + price2 + price3 + price4 + price5 + price6 + service_fee - discount + cash_price - trade_allowance + trade_payoff - down_payment - addition_cash;

		$("#total_price").val(total_price.toFixed(2));
	}

	$(document).find("input:checked[type='radio']").addClass('bounce');   
    $("input[type='radio']").click(function() {
        $(this).prop('checked', false);
        $(this).toggleClass('bounce');

        if( $(this).hasClass('bounce') ) {
            $(this).prop('checked', true);
            $(document).find("input:not(:checked)[type='radio']").removeClass('bounce');
        }
    });

	//calculate();
});
</script>
</div>
