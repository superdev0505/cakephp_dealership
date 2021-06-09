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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
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
		<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 16px;"><b>DEAL NOTE</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%; border-bottom: 1px solid #000;">
				<label><b>FROM :</b></label>
				<input type="text" name="from" value="<?php echo isset($info['from'])?$info['from']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; border-bottom: 1px solid #000;  margin-left: 11%;">
				<label><b>TO :</b></label>
				<input type="text" name="to" value="<?php echo isset($info['to'])?$info['to']:''; ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: right; width: 25%; border-bottom: 1px solid #000;">
				<label><b>DATE :</b></label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 30%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000;">
				<label><b>CUSTOMER :</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: right; width: 40%; border-bottom: 1px solid #000;">
				<label><b>SPLIT WITH :</b></label>
				<input type="text" name="split" value="<?php echo isset($info['split'])?$info['split']:''; ?>" style="width: 30%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%; border-bottom: 1px solid #000;">
				<label><b>YEAR :</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: right; width: 30%; border-bottom: 1px solid #000; margin-left: 5%;">
				<label><b>MAKE :</b></label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: right; width: 30%; border-bottom: 1px solid #000;">
				<label><b>MODEL :</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>VIN :</b></label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 91%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>DEPOSIT :</b></label>
				$ <input type="text" name="deposit" value="<?php echo isset($info['deposit'])?$info['deposit']:''; ?>" style="width: 82%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 40%; ">
				<label><b>DEPOSIT TYPE :</b></label>
				<input type="text" name="deposit_type" value="<?php echo isset($info['deposit_type'])?$info['deposit_type']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>ADDITIONAL FUNDS DUE AT CLOSING :</b></label>
				<input type="text" name="funds" value="<?php echo isset($info['funds'])?$info['funds']:''; ?>" style="width: 72%;  border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>TYPE OF SALE :</b></label>
				$ <input type="text" name="sale_type" value="<?php echo isset($info['sale_type'])?$info['sale_type']:''; ?>" style="width: 87%;  border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; ">
				<label><b>TRADE IN :</b></label>
				<input type="text" name="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 79%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 5%;">
				<label><b>ALLOWANCE :</b></label>
				 $ <input type="text" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 61%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 20%;">
				<label><b>ACV :</b></label>
				 $ <input type="text" name="acv" value="<?php echo isset($info['acv'])?$info['acv']:''; ?>" style="width: 71%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; ">
				<label><b>DELIVERY DATE :</b></label>
				<input type="text" name="deli_date" value="<?php echo isset($info['deli_date'])?$info['deli_date']:''; ?>" style="width: 67%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin-left: 5%;">
				<label><b>AT :</b></label>
				 $ <input type="text" name="at" value="<?php echo isset($info['at'])?$info['at']:''; ?>" style="width: 74%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label><b>LOT PLANNED :</b></label>
				 $ <input type="text" name="lot" value="<?php echo isset($info['lot'])?$info['lot']:''; ?>" style="width: 57%; border-bottom: 1px solid #000;">
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
