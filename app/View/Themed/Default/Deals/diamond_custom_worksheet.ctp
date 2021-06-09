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
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
     <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
        <input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
        <input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
        <input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
        <input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
        <input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
        <input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
        <input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
        <input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
        <input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
        <input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
        <input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
        <input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
        <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
        <input name="contact_status_id" type="hidden"  value="<?php echo $info['contact_status_id']; ?>" />
        
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; text-transform: uppercase;}
	.row{float: left; width: 100%; margin: 7px 0 !important;}
	textarea{width: 96%; border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 100px;}
	@media print { 
	.dontprint{display: none;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<h2 style="text-align: center; float: left; width: 100%; text-transform: uppercase; font-size: 18px; margin: 20px 0;">
			<?php if(AuthComponent::user('dealer_id')==739) { ?>
				Gibs RV Superstore worksheet
			<?php } else { ?>
				Diamond rv center worksheet
			<?php } ?>
		</h2>
	<div class="row">
		<div class="form-field" style="float: left; width: 30%;">
			<label>SALESPERSON</label>
			<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 52%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 60%;">
			<label>LEADTYPE</label>
			<?php if(isset($info['contact_status_name'])) { ?>
				<span><?php echo $info['contact_status_name']; ?></span>
			<?php } ?>
		</div>
		
		<div class="form-field" style="float: right; width: 25%;">
			<label>SOURCE</label>
			<input type="text" name="source" value="<?php echo isset($info['source']) ? $info['source'] : ''; ?>" style="width: 62%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 70%;">
			<label>NAME</label>
			<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 90%;">
		</div>
		<div class="form-field" style="float: left; width: 30%;">
			<label>DATE</label>
			<input type="text" name="date" value="<?php echo date("Y-m-d h:i:s") ?>" style="width: 80%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 100%;">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 89%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 50%;">
			<label>City</label>
			<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 87%;">
		</div>
		<div class="form-field" style="float: left; width: 25%;">
			<label>State</label>
			<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 72%;">
		</div>
		<div class="form-field" style="float: left; width: 25%;">
			<label>ZIP</label>
			<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 82%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 50%;">
			<label>CELL#</label>
			<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 83%;">
		</div>
		<div class="form-field" style="float: left; width: 50%;">
			<label>HOME</label>
			<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 85%;">
		</div>
	</div>
	
	<div class="row">
		<div class="form-field" style="float: left; width: 100%;">
			<label>EMAIL</label>
			<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 93%;">
		</div>
	</div>
	
	<div class="row" style="border-top: 1px solid #000; margin: 32px 0 0 0 !important; ">
		<div class="one-half" style="float: left; width: 50%; padding-top: 15px;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Stock#</label>
				<input type="text" name="stockdata1" value="<?php echo isset($info['stockdata1']) ? $info['stockdata1'] : $info['stock_num']; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>UNIT DESC</label>
				<input type="text" name="unit_value1" value="<?php echo isset($info['unit_value1']) ? $info['unit_value1'] : $info['make'].' '.$info['model']; ?>" style="width: 71%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>MSRP</label>
				<input type="text" name="msrp" value="<?php echo isset($info['msrp']) ? $info['msrp'] : $info['unit_value']; ?>" style="width: 80%;">
			</div>
		</div>
		<div class="one-half" style="float: left; width: 50%;  border-left: 1px solid #000;  padding-left: 24px; padding-top: 15px; padding-bottom: 18px;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>TRADE</label>
				  <input type="radio" name="gender" value="male" checked> YES
					<input type="radio" name="gender" value="female"> No
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>CURRENT PAYMENT $</label>
				<input type="text" name="current_payment" value="<?php echo isset($info['current_payment']) ? $info['current_payment'] : ''; ?>" style="width: 48%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>PAYOFF $</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>LIENHOLDER $</label>
				<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 63%;">
			</div>
		</div>
		
		<div class="row" style="border-top: 1px solid #000; margin-top: 0px !important;">
			<div class="one-half" style=" float: left; width: 50%; padding-top: 15px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>CASH DOWN</label>
					<textarea name="cash_down"><?php echo isset($info['cash_down']) ? $info['cash_down'] : ''; ?></textarea>
				</div>
			</div>
			<div class="one-half" style="float: left; width: 50%;  border-left: 1px solid #000;  padding-left: 24px; padding-top: 15px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Monthly Payment</label>
					<textarea name="monthly_payment"><?php echo isset($info['monthly_payment']) ? $info['monthly_payment'] : ''; ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-field" style=" margin: 7px 0; width: 100%; text-align: center;">
				<label>OFFER TO PURCHASE</label>
				<input type="text" name="offer_purchase" value="<?php echo isset($info['offer_purchase']) ? $info['offer_purchase'] : ''; ?>" style="width: 24%">
			</div>
		</div>
		
		<div class="row">
			<div class="one-half" style="width: 50%; float: left;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>X</label>
					<input type="text" name="x" value="<?php echo isset($info['x']) ? $info['x'] : ''; ?>" style="width: 87%;">
				</div>
			</div>
			<div class="one-half" style="width: 50%; float: left;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>X</label>
					<input type="text" name="x1" value="<?php echo isset($info['x1']) ? $info['x1'] : ''; ?>" style="width: 87%;">
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
