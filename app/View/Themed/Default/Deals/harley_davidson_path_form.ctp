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
	label{font-size: 13px;}
	.list li {display: inline-block; font-size: 13px; list-style: outside none none; width: 24%; margin-bottom: 7px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: left; padding: 1px 10px; font-size: 15px;}
	 table input[type="text"]{ border-bottom: 0px solid #000;}
	 table{border-top: 1px solid #000; border-left: 1px solid #000;}
	
	body{font-size: 12px;}
	.wraper.main input {padding: 5px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 20px;">
			<div class="logo" style="float: left; width: 30%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-f.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right-side" style="float: right; width: 25%;">
				<h2 style="font-size: 18px; margin: 10px 0;"><b>Rider Harley-Davidson</b></h2>
				<p style="font-size: 16px; margin: 2px 0;">4750 Norrell Drive</p>
				<p style="font-size: 16px; margin: 2px 0;">Trussville, AL. 35173</p>
				<p style="font-size: 16px; margin: 2px 0;">Phone: (205) 655-1234</p>
				<p style="font-size: 16px; margin: 2px 0;">Fax: (205) 508-5110</p>
				<p style="font-size: 16px; margin: 2px 0;">www.ridersharleydavidson.com</p>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Customer Name:</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 84%;">
			</div>		
			<div class="form-field" style="float: left; width: 20%;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 20px 0; text-align: center; font-size: 20px; text-decoration: underline;"><b>Make Mine Rumble & Shine</b></h2>
		
		
		<table style="float: left; width: 100%; margin: 0;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 16%;"><input type="text" name="highway_page" value="<?php echo isset($info['highway_page'])?$info['highway_page']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">Highway Pegs & Engine Guard</td>
				<td style="width: 16%;"><input type="text" name="handlebars" value="<?php echo isset($info['handlebars'])?$info['handlebars']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">HandleBars & Grips</td>
			</tr>
			
			<tr>
				<td><input type="text" name="passenger" value="<?php echo isset($info['passenger'])?$info['passenger']:''; ?>" style="width: 100%;"></td>
				<td>Passenger / Rider Backrest</td>
				<td><input type="text" name="windshield" value="<?php echo isset($info['windshield'])?$info['windshield']:''; ?>" style="width: 100%;"></td>
				<td>Windshields</td>
			</tr>
			
			<tr>
				<td><input type="text" name="exhaust" value="<?php echo isset($info['exhaust'])?$info['exhaust']:''; ?>" style="width: 100%;"></td>
				<td>Exhaust</td>
				<td><input type="text" name="seats" value="<?php echo isset($info['seats'])?$info['seats']:''; ?>" style="width: 100%;"></td>
				<td>Seats</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="form-field" style="width: 80%; margin: 0 auto;">
				<label style="font-size: 15px;">Introduced To:</label>
				<input type="text" name="introduced1" value="<?php echo isset($info['introduced1'])?$info['introduced1']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 20px 0; text-align: center; font-size: 20px; text-decoration: underline;"><b>Gear Up for Riding</b></h2>
		
		
		<table style="float: left; width: 100%; margin: 0;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 16%;"><input type="text" name="helmets" value="<?php echo isset($info['helmets'])?$info['helmets']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">Helmets</td>
				<td style="width: 16%;"><input type="text" name="gloves" value="<?php echo isset($info['gloves'])?$info['gloves']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">Gloves</td>
			</tr>
			
			<tr>
				<td><input type="text" name="boots" value="<?php echo isset($info['boots'])?$info['boots']:''; ?>" style="width: 100%;"></td>
				<td>Boots</td>
				<td><input type="text" name="leather" value="<?php echo isset($info['leather'])?$info['leather']:''; ?>" style="width: 100%;"></td>
				<td>Leather</td>
			</tr>
			
			<tr>
				<td><input type="text" name="eyewear" value="<?php echo isset($info['eyewear'])?$info['eyewear']:''; ?>" style="width: 100%;"></td>
				<td>Eyewear</td>
				<td><input type="text" name="rain_suit" value="<?php echo isset($info['rain_suit'])?$info['rain_suit']:''; ?>" style="width: 100%;"></td>
				<td>Rain Suit</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="form-field" style="width: 80%; margin: 0 auto;">
				<label style="font-size: 15px;">Introduced To:</label>
				<input type="text" name="introduced2" value="<?php echo isset($info['introduced2'])?$info['introduced2']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 20px 0; text-align: center; font-size: 20px; text-decoration: underline;"><b>Service, Head Out On The Open Road</b></h2>
		
		
		<table style="float: left; width: 100%; margin: 0;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 16%;"><input type="text" name="intervals" value="<?php echo isset($info['intervals'])?$info['intervals']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">Explained Service Intervals</td>
				<td style="width: 16%;"><input type="text" name="levers" value="<?php echo isset($info['levers'])?$info['levers']:''; ?>" style="width: 100%;"></td>
				<td style="width: 34%;">Adjust Levers & Pegs</td>
			</tr>
			
			<tr>
				<td><input type="text" name="service_hours" value="<?php echo isset($info['service_hours'])?$info['service_hours']:''; ?>" style="width: 100%;"></td>
				<td>Explained Service Hours</td>
				<td><input type="text" name="service_appointment" value="<?php echo isset($info['service_appointment'])?$info['service_appointment']:''; ?>" style="width: 100%;"></td>
				<td>Schedule Service Appointment</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="form-field" style="width: 80%; margin: 0 auto;">
				<label style="font-size: 15px;">Introduced To:</label>
				<input type="text" name="introduced3" value="<?php echo isset($info['introduced3'])?$info['introduced3']:''; ?>" style="width: 85%;">
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
