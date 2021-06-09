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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 3px;}
	
	
	
@media print {
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%;margin: 3px 0; font-size: 20px; text-align: center;"><b>MOTO UNITED LOS ANGELES</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 70%; float: left;">
				<label><b>SALES PERSON</b></label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label><b>DATE</b></label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 70%; float: left;">
				<label><b>CUSTOMER</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 23%; float: left;">
				<label><b>YEAR</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 23%; float: left;">
				<label><b>MAKE</b></label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="width: 54%; float: left;">
				<label><b>MODEL</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 65%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px;">
			<label><b>BANK:</b></label>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>AHFC</b></label>
				<input type="text" name="ahfc1" value="<?php echo isset($info['ahfc1'])?$info['ahfc1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="ahfc2" value="<?php echo isset($info['ahfc2'])?$info['ahfc2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>SHEFFIELD BANK</b></label>
				<input type="text" name="sheffield1" value="<?php echo isset($info['sheffield1'])?$info['sheffield1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="sheffield2" value="<?php echo isset($info['sheffield2'])?$info['sheffield2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>SYNCHRONY BANK</b></label>
				<input type="text" name="synbchrony1" value="<?php echo isset($info['synbchrony1'])?$info['synbchrony1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="synbchrony2" value="<?php echo isset($info['synbchrony2'])?$info['synbchrony2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>YAMAHA CARD</b></label>
				<input type="text" name="yamaha1" value="<?php echo isset($info['yamaha1'])?$info['yamaha1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="yamaha2" value="<?php echo isset($info['yamaha2'])?$info['yamaha2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>YAMAHA INSTALL</b></label>
				<input type="text" name="yamaha_install1" value="<?php echo isset($info['yamaha_install1'])?$info['yamaha_install1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="yamaha_install2" value="<?php echo isset($info['yamaha_install2'])?$info['yamaha_install2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>CITI BANK</b></label>
				<input type="text" name="citi1" value="<?php echo isset($info['citi1'])?$info['citi1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="citi2" value="<?php echo isset($info['citi2'])?$info['citi2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>MODEL FINANCE</b></label>
				<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>FREEDOM ROAD FINANCIAL</b></label>
				<input type="text" name="freedom1" value="<?php echo isset($info['freedom1'])?$info['freedom1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="freedom2" value="<?php echo isset($info['freedom2'])?$info['freedom2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>MB FINANCIAL</b></label>
				<input type="text" name="mb1" value="<?php echo isset($info['mb1'])?$info['mb1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="mb2" value="<?php echo isset($info['mb2'])?$info['mb2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>WESTLAKE</b></label>
				<input type="text" name="west1" value="<?php echo isset($info['west1'])?$info['west1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="west2" value="<?php echo isset($info['west2'])?$info['west2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 5px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b>LBS</b></label>
				<input type="text" name="lbs1" value="<?php echo isset($info['lbs1'])?$info['lbs1']:''; ?>" style="width: 70%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 100%; float: left;">
				<input type="text" name="lbs2" value="<?php echo isset($info['lbs2'])?$info['lbs2']:''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0px;">
			<div class="form-field" style="width: 60%; float: left; border-right: 1px solid #000;">
				<label><b>NOTES</b></label>
				<textarea  id="term_notes" name="term_notes" style="width: 90%; border: 0px; height: 150px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
			</div>

			<div class="form-field" style="width: 40%; float: left;">
				<label><b>STIPS</b></label>
				<textarea  id="stips" name="stips" style="width: 88%; border: 0px; height: 150px;"><?php echo isset($info['stips'])?$info['stips']:'' ?></textarea>
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


	$(".price").on('change keyup paste', function(){
			calculate_totalaccess();
	});

	function calculate_totalaccess($this) {
		var unit_value = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var less_trade = isNaN(parseFloat( $('#less_trade').val()))?0.00:parseFloat($('#less_trade').val());
		var trade_defference = unit_value - less_trade;
		$("#trade_defference").val(trade_defference.toFixed(2));
		var payoff_amount = isNaN(parseFloat( $('#payoff_amount').val()))?0.00:parseFloat($('#payoff_amount').val());

		var sale_total = trade_defference + payoff_amount;
		$("#sale_total").val(sale_total.toFixed(2));

		var price1 = isNaN(parseFloat( $('#price1').val()))?0.00:parseFloat($('#price1').val());
		var price2 = isNaN(parseFloat( $('#price2').val()))?0.00:parseFloat($('#price2').val());
		var price3 = isNaN(parseFloat( $('#price3').val()))?0.00:parseFloat($('#price3').val());
		var price4 = isNaN(parseFloat( $('#price4').val()))?0.00:parseFloat($('#price4').val());
		var price5 = isNaN(parseFloat( $('#price5').val()))?0.00:parseFloat($('#price5').val());
		var price6 = isNaN(parseFloat( $('#price6').val()))?0.00:parseFloat($('#price6').val());
		var price7 = isNaN(parseFloat( $('#price7').val()))?0.00:parseFloat($('#price7').val());
		var price8 = isNaN(parseFloat( $('#price8').val()))?0.00:parseFloat($('#price8').val());

		var price9 = isNaN(parseFloat( $('#price9').val()))?0.00:parseFloat($('#price9').val());
		var price10 = isNaN(parseFloat( $('#price10').val()))?0.00:parseFloat($('#price10').val());
		var price11 = isNaN(parseFloat( $('#price11').val()))?0.00:parseFloat($('#price11').val());
		var price12 = isNaN(parseFloat( $('#price12').val()))?0.00:parseFloat($('#price12').val());
		var price13 = isNaN(parseFloat( $('#price13').val()))?0.00:parseFloat($('#price13').val());

		var price14 = isNaN(parseFloat( $('#price14').val()))?0.00:parseFloat($('#price14').val());
		var price15 = isNaN(parseFloat( $('#price15').val()))?0.00:parseFloat($('#price15').val());
		var price16 = isNaN(parseFloat( $('#price16').val()))?0.00:parseFloat($('#price16').val());
		var price17 = isNaN(parseFloat( $('#price17').val()))?0.00:parseFloat($('#price17').val());
		var total = sale_total + price1 + price2 + price3 + price4 + price5 + price6 + price7 + price8 + price9 +price10 + price11 + price12 + price13 + price14 + price15 + price16 + price17;
		
		$("#total").val(total.toFixed(2));

	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
