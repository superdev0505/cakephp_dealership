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
	label{font-size: 14px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-left: 1px solid #000; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px; text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	td:nth-child(2){text-align: left;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 2px 0; text-decoration: underline; text-align: center; font-size: 18px;"><i>Tractor Checklist</i></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; border-right: 1px solid #000;">
				<p style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 6px 3px;">
					<label><input type="radio" name="delivery_check" value="delivery" <?php echo (isset($info['delivery_check']) && $info['delivery_check']=='delivery')?'checked="checked"':''; ?> style="margin: 0;"> Delivery</label>
					<label><input type="radio" name="pick_check" value="pick" <?php echo (isset($info['pick_check']) && $info['pick_check']=='pick')?'checked="checked"':''; ?> style="margin: 0;"> Pick-up</label>
					<label><input type="radio" name="ship_check" value="ship" <?php echo (isset($info['ship_check']) && $info['ship_check']=='ship')?'checked="checked"':''; ?> style="margin: 0;"> or Ship</label>
				</p>
				<p style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0 3px;">
					<label>Date:</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; margin: 0; padding: 10px;">
				</p>
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Invoice #</b></label>
				<input type="text" name="invoice"  value="<?php echo isset($info['invoice']) ? $info['invoice'] :  ''; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Customer</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Phone Number</b></label>
				<input type="text" name="phone"  value="<?php echo isset($info['phone']) ? $info['phone'] :  ''; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-top: 0px">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Notes</b></label>
				<input type="text" name="notes"  value="<?php echo isset($info['notes']) ? $info['notes'] :  ''; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Serial #</b></label>
				<input type="text" name="vin"  value="<?php echo isset($info['vin']) ? $info['vin'] :  ''; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; border-right: 1px solid #000;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Make</b></label>
				<input type="text" name="make"  value="<?php echo isset($info['make']) ? $info['make'] :  ''; ?>" style="width: 100%; text-align: center; padding: 10px;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Model</b></label>
				<input type="text" name="model"  value="<?php echo isset($info['model']) ? $info['model'] :  ''; ?>"  style="width: 100%; text-align: center; padding: 10px;">
			</div>
		</div>
		
		<div class="row" style="float: right; width: 60%; margin: 0 0 3px; border: 1px solid #000; box-sizing: border-box; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box;">
				<label style="text-align: center; border-bottom: 1px solid #000; padding: 5px 3px 4px; display: block;"><b>Implements</b></label>
				<textarea name="implement" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['implement'])?$info['implement']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="one-third" style="float: left; width: 33%;">
				<p style="float: left; width: 100%; margin: 3px 0;">Check</p>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="startup1_check" value="startup1" <?php echo (isset($info['startup1_check']) && $info['startup1_check']=='startup1')?'checked="checked"':''; ?> /> <b>Start up check</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="fluids_check" value="fluids" <?php echo (isset($info['fluids_check']) && $info['fluids_check']=='fluids')?'checked="checked"':''; ?> /> <b>Check Fluids</b></label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="motor_check" value="motor" <?php echo (isset($info['motor_check']) && $info['motor_check']=='motor')?'checked="checked"':''; ?> style="margin-right: 40px;">  Motor Oil</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="hydraulic_check" value="hydraulic" <?php echo (isset($info['hydraulic_check']) && $info['hydraulic_check']=='hydraulic')?'checked="checked"':''; ?> style="margin-right: 40px;">  Hydraulic oil</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="coolant_check" value="coolant" <?php echo (isset($info['coolant_check']) && $info['coolant_check']=='coolant')?'checked="checked"':''; ?> style="margin-right: 40px;">  coolant</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="diesel_check" value="diesel" <?php echo (isset($info['diesel_check']) && $info['diesel_check']=='diesel')?'checked="checked"':''; ?> style="margin-right: 40px;">  diesel</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="axle1_check" value="axle1" <?php echo (isset($info['axle1_check']) && $info['axle1_check']=='axle1')?'checked="checked"':''; ?> style="margin-right: 40px;">  front axle lube</label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="tractor1_check" value="tractor1" <?php echo (isset($info['tractor1_check']) && $info['tractor1_check']=='tractor1')?'checked="checked"':''; ?> /><b>Check Serial Number on Tractor</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="hydraulic1_check" value="hydraulic1" <?php echo (isset($info['hydraulic1_check']) && $info['hydraulic1_check']=='hydraulic1')?'checked="checked"':''; ?> /> <b>Hydraulic Leaks</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="operation_check" value="operation" <?php echo (isset($info['operation_check']) && $info['operation_check']=='operation')?'checked="checked"':''; ?> /> <b>Hydraulic Valve Operation</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="major1_check" value="major1" <?php echo (isset($info['major1_check']) && $info['major1_check']=='major1')?'checked="checked"':''; ?> /> <b>Check all Major bolts for tightness</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="tire1_check" value="tire1" <?php echo (isset($info['tire1_check']) && $info['tire1_check']=='tire1')?'checked="checked"':''; ?> /> <b>Tire Pressure</b></label>
				<br>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="skid1_check" value="skid1" <?php echo (isset($info['skid1_check']) && $info['skid1_check']=='skid1')?'checked="checked"':''; ?> /> <b>Skid Steer Mount operation</b></label>
				<br><br>
			</div>
			<div class="one-third" style="float: left; width: 33%; margin-left: 5%;">
				<p style="float: left; margin: 1px 12px 0px 0px;">Check</p><span><b>Functions</b></span>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="throttle_check" value="throttle" <?php echo (isset($info['throttle_check']) && $info['throttle_check']=='throttle')?'checked="checked"':''; ?> style="margin-right: 40px;"> throttle </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="headlamps_check" value="headlamps" <?php echo (isset($info['headlamps_check']) && $info['headlamps_check']=='headlamps')?'checked="checked"':''; ?> style="margin-right: 40px;">  headlamps</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="warning_check" value="warning" <?php echo (isset($info['warning_check']) && $info['warning_check']=='warning')?'checked="checked"':''; ?> style="margin-right: 40px;"> warning lights </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="battery_check" value="battery" <?php echo (isset($info['battery_check']) && $info['battery_check']=='battery')?'checked="checked"':''; ?> style="margin-right: 40px;">  battery</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="signal_check" value="signal" <?php echo (isset($info['signal_check']) && $info['signal_check']=='signal')?'checked="checked"':''; ?> style="margin-right: 40px;"> turn signals </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="horn_check" value="horn" <?php echo (isset($info['horn_check']) && $info['horn_check']=='horn')?'checked="checked"':''; ?> style="margin-right: 40px;">  horn</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="belt_check" value="belt" <?php echo (isset($info['belt_check']) && $info['belt_check']=='belt')?'checked="checked"':''; ?> style="margin-right: 40px;"> seat belt </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="loader_check" value="loader" <?php echo (isset($info['loader_check']) && $info['loader_check']=='loader')?'checked="checked"':''; ?> style="margin-right: 40px;"> front end loader controls </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="controls_check" value="controls" <?php echo (isset($info['controls_check']) && $info['controls_check']=='controls')?'checked="checked"':''; ?> style="margin-right: 40px;"> 3pt controls </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="parking_check" value="parking" <?php echo (isset($info['parking_check']) && $info['parking_check']=='parking')?'checked="checked"':''; ?> style="margin-right: 40px;">  Parking Brake</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="turning_check" value="turning" <?php echo (isset($info['turning_check']) && $info['turning_check']=='turning')?'checked="checked"':''; ?> style="margin-right: 40px;">  Turning Brake Lock </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="foot_check" value="foot" <?php echo (isset($info['foot_check']) && $info['foot_check']=='foot')?'checked="checked"':''; ?> style="margin-right: 40px;">  Foot Brake</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="glow_check" value="glow" <?php echo (isset($info['glow_check']) && $info['glow_check']=='glow')?'checked="checked"':''; ?> style="margin-right: 40px;">  glow plugs</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="tachometer_check" value="tachometer" <?php echo (isset($info['tachometer_check']) && $info['tachometer_check']=='tachometer')?'checked="checked"':''; ?> style="margin-right: 40px;">  tachometer	</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="fuel_check" value="fuel" <?php echo (isset($info['fuel_check']) && $info['fuel_check']=='fuel')?'checked="checked"':''; ?> style="margin-right: 40px;">  fuel gauge</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cylinder_check" value="cylinder" <?php echo (isset($info['cylinder_check']) && $info['cylinder_check']=='cylinder')?'checked="checked"':''; ?> style="margin-right: 40px;"> cylinder decompression lever </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="gears_check" value="gears" <?php echo (isset($info['gears_check']) && $info['gears_check']=='gears')?'checked="checked"':''; ?> style="margin-right: 40px;">  High & Low gears</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="range_check" value="range" <?php echo (isset($info['range_check']) && $info['range_check']=='range')?'checked="checked"':''; ?> style="margin-right: 40px;">  Main range gears</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="power_check" value="power" <?php echo (isset($info['power_check']) && $info['power_check']=='power')?'checked="checked"':''; ?> style="margin-right: 40px;">  Power shifter/Shuttle</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="pto_check" value="pto" <?php echo (isset($info['pto_check']) && $info['pto_check']=='pto')?'checked="checked"':''; ?> style="margin-right: 40px;"> PTO gears </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="clutch_check" value="clutch" <?php echo (isset($info['clutch_check']) && $info['clutch_check']=='clutch')?'checked="checked"':''; ?> style="margin-right: 40px;">  Clutch</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="lockout_check" value="lockout" <?php echo (isset($info['lockout_check']) && $info['lockout_check']=='lockout')?'checked="checked"':''; ?> style="margin-right: 40px;">  Clutch lockout </label>
			</div>
			<div class="one-third" style="float: right; width: 25%;">
				<p style="float: left; width: 100%; margin: 3px 0;">Check</p>
				<label style="display: block; margin: 3px 0;"><input type="checkbox" name="customer_check" value="customer" <?php echo (isset($info['customer_check']) && $info['customer_check']=='customer')?'checked="checked"':''; ?> /> <b>Customer needs before	arrival</b></label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="chain_check" value="chain" <?php echo (isset($info['chain_check']) && $info['chain_check']=='chain')?'checked="checked"':''; ?> style="margin-right: 30px;"> 2 sets of chains </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="binders_check" value="binders" <?php echo (isset($info['binders_check']) && $info['binders_check']=='binders')?'checked="checked"':''; ?> style="margin-right: 30px;">  2 binders</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers1_check" value="cashiers1" <?php echo (isset($info['cashiers1_check']) && $info['cashiers1_check']=='cashiers1')?'checked="checked"':''; ?> style="margin-right: 30px;"> Cashiers check or cash </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers14_check" value="cashiers14" <?php echo (isset($info['cashiers14_check']) && $info['cashiers14_check']=='cashiers14')?'checked="checked"':''; ?> />  <b>Implements</b></label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers15_check" value="cashiers15" <?php echo (isset($info['cashiers15_check']) && $info['cashiers15_check']=='cashiers15')?'checked="checked"':''; ?> style="margin-right: 30px;"> Serial Numbers </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers16_check" value="cashiers16" <?php echo (isset($info['cashiers16_check']) && $info['cashiers16_check']=='cashiers16')?'checked="checked"':''; ?> style="margin-right: 30px;">  Tiller attachment</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers17_check" value="cashiers17" <?php echo (isset($info['cashiers17_check']) && $info['cashiers17_check']=='cashiers17')?'checked="checked"':''; ?> style="margin-right: 30px;">  Drive Shaft length checked & cut</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers18_check" value="cashiers18" <?php echo (isset($info['cashiers18_check']) && $info['cashiers18_check']=='cashiers18')?'checked="checked"':''; ?> style="margin-right: 30px;">  Implement fit to tractor</label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers19_check" value="cashiers19" <?php echo (isset($info['cashiers19_check']) && $info['cashiers19_check']=='cashiers19')?'checked="checked"':''; ?> style="margin-right: 30px;">Gear box fluid </label>
				<label style="display: block; margin: 3px 0;"> <input type="checkbox" name="cashiers20_check" value="cashiers20" <?php echo (isset($info['cashiers20_check']) && $info['cashiers20_check']=='cashiers20')?'checked="checked"':''; ?> style="margin-right: 30px;">  Clutch</label>
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
