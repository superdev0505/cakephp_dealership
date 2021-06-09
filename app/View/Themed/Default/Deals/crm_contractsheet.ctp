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
	label{font-size: 14px; font-weight: normal; margin: 0;}
	span{font-size: 12px; padding: 2px 0;}
	input[type="text"]{padding: 1px !important; }
@media print {
	input[type="text"]{padding: 1px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 16px; text-decoration: underline;"><b>CONTRACT WORKSHEET</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">CLOSING DATE :</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TIME:</label>
				<input type="text" name="time" value="<?php echo date('g:i A'); ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">SALESPERSON:</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 15px 0 3px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">NAME:</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 81%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 15px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">ADDRESS:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 81%; margin-bottom: 10px;">
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 81%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 15px 0 3px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">YR:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 81%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 15px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">SERIAL #:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 15px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">LENDER:</label>
				<input type="text" name="lender" value="<?php echo isset($info['lender'])?$info['lender']:''; ?>" style="width: 60%; margin-bottom: 10px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">PRICE:</label>
				<input type="text" name="price" value="<?php echo isset($info['price'])?$info['price']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">BUY RATE:</label>
				<input type="text" name="buy_rate" value="<?php echo isset($info['buy_rate'])?$info['buy_rate']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TAX:</label>
				<input type="text" name="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">SELL RATE:</label>
				<input type="text" name="sell_rate" value="<?php echo isset($info['sell_rate'])?$info['sell_rate']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">V.I.TAX:</label>
				<input type="text" name="v_tax" value="<?php echo isset($info['v_tax'])?$info['v_tax']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TERM:</label>
				<input type="text" name="term" value="<?php echo isset($info['term'])?$info['term']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">LICENSE:</label>
				<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">EXPECTED RESERVE:</label>
				<input type="text" name="exp_reserve" value="<?php echo isset($info['exp_reserve'])?$info['exp_reserve']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TITLE:</label>
				<input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">% EARNED:</label>
				<input type="text" name="earned" value="<?php echo isset($info['earned'])?$info['earned']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">DOC:</label>
				<input type="text" name="doc" value="<?php echo isset($info['doc'])?$info['doc']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">POINT MARKUP:</label>
				<input type="text" name="markup" value="<?php echo isset($info['markup'])?$info['markup']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOTAL:</label>
				<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 15px 0 3px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">DEPOSIT:</label>
				$<input type="text" name="deposit" value="<?php echo isset($info['deposit'])?$info['deposit']:''; ?>" style="width: 59%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">TOTAL DOWN PAYMENT:</label>
				$<input type="text" name="total_pay" value="<?php echo isset($info['total_pay'])?$info['total_pay']:''; ?>" style="width: 36%;">
				<i style="font-size: 13px;">INCLUDES TRADE - $1000 NET TRADE EQUITY</i>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 15px 0 3px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">GAP:</label>
				$<input type="text" name="gap" value="<?php echo isset($info['gap'])?$info['gap']:''; ?>" style="width: 59%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 15px 0 3px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">TOTAL CASH DUE AT DELIVERY:</label>
				$<input type="text" name="total_cash" value="<?php echo isset($info['total_cash'])?$info['total_cash']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOT.AMT.FINANCED:</label>
				<input name="financed" value="<?php echo isset($info['financed'])?$info['financed']:''; ?>" style="width: 60%;" type="text">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;"><i>ESC COST:</i></label>
				<input name="esc_cost" value="<?php echo isset($info['esc_cost'])?$info['esc_cost']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px dashed #000; padding: 0 0 20px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOTAL REFUND:</label>
				<input name="total_refund" value="<?php echo isset($info['total_refund'])?$info['total_refund']:''; ?>" style="width: 60%;" type="text">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;"><i>GAP COST:</i></label>
				<input name="gap_cost" value="<?php echo isset($info['gap_cost'])?$info['gap_cost']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-top: 1px dashed #000; padding: 20px 0 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">MONTHLY PMT:</label>
				<input name="month_pmt" value="<?php echo isset($info['month_pmt'])?$info['month_pmt']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOTAL OF PMTS:</label>
				<input name="total_pmt" value="<?php echo isset($info['total_pmt'])?$info['total_pmt']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">FINANCE CHARGE:</label>
				<input name="finance_charge" value="<?php echo isset($info['finance_charge'])?$info['finance_charge']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">CASH DOWN PAYMENT:</label>
				<input name="cash_pay" value="<?php echo isset($info['cash_pay'])?$info['cash_pay']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 18%; display: inline-block; text-align: right;">TOTAL DOWN PAYMENT:</label>
				<input name="total_pay" value="<?php echo isset($info['total_pay'])?$info['total_pay']:''; ?>" style="width: 36%;" type="text">
				<i style="font-size: 13px;">INCLUDES TRADE - $1000 NET TRADE EQUITY</i>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px dashed #000; padding: 0 0 25px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOTAL DEFERRED:</label>
				<input name="total_def1" value="<?php echo isset($info['total_def1'])?$info['total_def1']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-top: 1px dashed #000; padding: 20px 0 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">TOTAL DEFERRED:</label>
				<input name="total_def2" value="<?php echo isset($info['total_def2'])?$info['total_def2']:''; ?>" style="width: 60%;" type="text">
			</div>
			
			<div class="form-field" style="float: left; width: 20%;">
				<label style="width: 30%; display: inline-block; text-align: right;">MAKE:</label>
				<input name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 60%;" type="text">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label style="width: 30%; display: inline-block; text-align: right;">MODEL:</label>
				<input name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">SERIAL # :</label>
				<input name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 60%;" type="text">
			</div>
			
			<div class="form-field" style="float: left; width: 20%;">
				<label style="width: 30%; display: inline-block; text-align: right;">LIC #:</label>
				<input name="lic" value="<?php echo isset($info['lic'])?$info['lic']:''; ?>" style="width: 60%;" type="text">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label style="width: 30%; display: inline-block; text-align: right;">STATE:</label>
				<input name="state_trade" value="<?php echo isset($info['state_trade'])?$info['state_trade']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">ALLOWANCE:</label>
				<input name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 60%;" type="text">
			</div>
			
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">PAY OFF TO :</label>
				<input name="pay_off" value="<?php echo isset($info['pay_off'])?$info['pay_off']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">AMOUNT OF PAYOFF :</label>
				<input name="amount_pay" value="<?php echo isset($info['amount_pay'])?$info['amount_pay']:''; ?>" style="width: 60%;" type="text">
			</div>
			
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 34%; display: inline-block; text-align: right;">NET TRADE EQUITY:</label>
				<input name="trade_equity" value="<?php echo isset($info['trade_equity'])?$info['trade_equity']:''; ?>" style="width: 56%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">PAYOFF GOOD UNTIL:</label>
				<input name="payoff_good" value="<?php echo isset($info['payoff_good'])?$info['payoff_good']:''; ?>" style="width: 60%;" type="text">
			</div>
			
			<div class="form-field" style="float: left; width: 40%;">
				<label style="width: 30%; display: inline-block; text-align: right;">CASH:</label>
				
				
				<input name="cash" value="<?php echo isset($info['cash'])?$info['cash']:''; ?>" style="width: 60%;" type="text">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; padding-bottom: 1px dashed #000; padding: 0 0 20px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label style="width: 30%; display: inline-block; text-align: right;">ACV:</label>
				<input name="acv" value="<?php echo isset($info['acv'])?$info['acv']:''; ?>" style="width: 60%;" type="text">
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
