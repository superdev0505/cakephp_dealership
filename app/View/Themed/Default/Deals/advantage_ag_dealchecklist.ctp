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
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;margin-left: 5px;}
	label{font-size: 16px;}
	ul{padding: 0px; text-align: center; width: 70%; margin: 0 auto;}
	li{list-style: none; padding: 0 2%; border-right: 1px solid #000; display: inline-block; font-size: 11px;}
@media print {
	input[type="text"]{padding: 0px;}
	.payoff {
		margin-left: -130px !important;
	}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 250px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo11.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<ul>
				<li>1025 Harcourt Rd. STE 400</li>
				<li>Mount Vernon, OH 43050</li>
				<li>(740) 392-3633</li>
				<li style="border: 0px;">Fax (740) 393-2539</li>
				<li>200 W. Monroe St.</li>
				<li>Zanesville, OH 43701</li>
				<li>(740) 454-1289</li>
				<li style="border: 0px;">Fax (740) 454-6498</li>
			</ul>
		</div>
		
		<h2 style="width: 100%; float: left; text-align: center; margin: 10px 0; font-size: 18px;"><b>Deal Check List</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "purchase") ? "checked" : ""; ?> value="purchase"/> Signed Purchase Order</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "contract") ? "checked" : ""; ?> value="contract"/> 3 Copies of Signed Contract</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "check") ? "checked" : ""; ?> value="check"/> Signed Check and Copy of Check</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "warranty") ? "checked" : ""; ?> value="warranty"/> Signed Warranty Paperwork</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "license") ? "checked" : ""; ?> value="license"/> Copy of Driver’s License</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "tax") ? "checked" : ""; ?> value="tax"/> Tax exempt card</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "protection") ? "checked" : ""; ?> value="protection"/> Purchase Protection Plan Offered</span>
				<span style="float: left; width: 100%; padding-left: 3%">o	Acceptance/Declination Form Signed</span>
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "pin") ? "checked" : ""; ?> value="pin"/> PINS Used:</span>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin1" value="<?php echo isset($info['pin1'])?$info['pin1']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt1" value="<?php echo isset($info['amt1'])?$info['amt1']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin2" value="<?php echo isset($info['pin2'])?$info['pin2']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt2" value="<?php echo isset($info['amt2'])?$info['amt2']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin3" value="<?php echo isset($info['pin3'])?$info['pin3']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt3" value="<?php echo isset($info['amt3'])?$info['amt3']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin4" value="<?php echo isset($info['pin4'])?$info['pin4']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt4" value="<?php echo isset($info['amt4'])?$info['amt4']:''; ?>" style="width: 80%;">
					</div>
				</div>
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "trade") ? "checked" : ""; ?> value="trade"/> All trade information</span>
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Year, Make, Model </label>
				<input type="text" name="vehicle_info" value="<?php echo isset($info['vehicle_info'])?$info['vehicle_info']:$info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 55%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Serial Number</label>
				<input type="text" name="serial_number" value="<?php echo isset($info['serial_number']) ? $info['serial_number'] : ''; ?>" style="width: 58%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Hours </label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 64%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Horsepower, Drive </label>
				<input type="text" name="horsepower" value="<?php echo isset($info['horsepower']) ? $info['horsepower'] : ''; ?>" style="width: 54.5%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Actual Cash Value of Trade </label>
				<input type="text" name="cash" value="<?php echo isset($info['cash']) ? $info['cash'] : ''; ?>" style="width: 48%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Payoff Information </label>
				<input type="text" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : ''; ?>" style="width: 54.5%;">
				<input type="text" name="payoff2" class="payoff" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : ''; ?>" style="width: 68.5%; margin: 16px 0 0 0; margin-left: 80px;">
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
