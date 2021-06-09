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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 2px;}
	
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
		<h2 style="float: left; width: 100%; margin: 7px 0; font-size: 20px; text-align: center;"><b>RV Value Mart Trade-In <br> Info Sheet and Agreement</b></h2>
		<p style="float: left; widh: 100%; margin: 3px 0; font-size: 15px;"><b>Customer Information:</b></p>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Phone #</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 23%;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 12%;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<p style="float: left; widh: 100%; margin: 13px 0 3px; font-size: 15px;"><b>RV Trade Information:</b></p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model#</label>
				<input type="text" name="model_num" value="<?php echo isset($info['model_num']) ? $info['model_num'] : ''; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Title Status Clear</label>
				<label style="margin: 0 3%;"><input type="checkbox" name="title_yes" value="yes" <?php echo (isset($info['title_yes']) && $info['title_yes']=='yes')?'checked="checked"':''; ?> />Yes</label>
				<label><input type="checkbox" name="title_no" value="no" <?php echo (isset($info['title_no']) && $info['title_no']=='no')?'checked="checked"':''; ?> />No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Reconstructed</label>
				<label style="margin: 0 3%;"><input type="checkbox" name="reconstructed_yes" value="yes" <?php echo (isset($info['reconstructed_yes']) && $info['reconstructed_yes']=='yes')?'checked="checked"':''; ?> />Yes</label>
				<label><input type="checkbox" name="reconstructed_no" value="no" <?php echo (isset($info['reconstructed_no']) && $info['reconstructed_no']=='no')?'checked="checked"':''; ?> />No</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Registered Owner Name</label>
				<input type="text" name="rv_trade_owner" value="<?php echo isset($info['rv_trade_owner']) ? $info['rv_trade_owner'] : ''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<p style="float: left; widh: 100%; margin: 13px 0 3px; font-size: 15px;"><b>Condition Information:</b></p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 5px;">
				<label>Exterior: </label>
				<label style="margin: 0 2%;"><input type="radio" name="exterior_status" value="great" <?php echo (isset($info['exterior_status']) && $info['exterior_status']=='great')?'checked="checked"':''; ?> />Great</label>
				<label><input type="radio" name="exterior_status" value="good" <?php echo (isset($info['exterior_status']) && $info['exterior_status']=='good')?'checked="checked"':''; ?> />Good</label>
				<label style="margin: 0 2%;"><input type="radio" name="exterior_status" value="fair" <?php echo (isset($info['exterior_status']) && $info['exterior_status']=='fair')?'checked="checked"':''; ?> />Fair</label>
				<label><input type="radio" name="exterior_status" value="poor" <?php echo (isset($info['exterior_status']) && $info['exterior_status']=='poor')?'checked="checked"':''; ?> />Poor</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0 7px;">
				<label>Interior: </label>
				<label style="margin: 0 2%;"><input type="radio" name="interior_status" value="great" <?php echo (isset($info['interior_status']) && $info['interior_status']=='great')?'checked="checked"':''; ?> />Great</label>
				<label><input type="radio" name="interior_status" value="good" <?php echo (isset($info['interior_status']) && $info['interior_status']=='good')?'checked="checked"':''; ?> />Good</label>
				<label style="margin: 0 2%;"><input type="radio" name="interior_status" value="fair" <?php echo (isset($info['interior_status']) && $info['interior_status']=='fair')?'checked="checked"':''; ?> />Fair</label>
				<label><input type="radio" name="interior_status" value="poor" <?php echo (isset($info['interior_status']) && $info['interior_status']=='poor')?'checked="checked"':''; ?> />Poor</label>
			</div>
			
			
			<div class="form-field" style="float: left; width: 100%; margin: 15px 0 7px;">
				<label>Water Damage: </label>
				<label style="margin: 0 2%;"><input type="radio" name="water_status" value="yes" <?php echo (isset($info['water_status']) && $info['water_status']=='yes')?'checked="checked"':''; ?> />Yes</label>
				<label><input type="radio" name="water_status" value="no" <?php echo (isset($info['water_status']) && $info['water_status']=='no')?'checked="checked"':''; ?> />No</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Describe: </label>
				<input type="text" name="descripe1" value="<?php echo isset($info['descripe1']) ? $info['descripe1'] : ''; ?>" style="width: 93%; float: right;">
				<input type="text" name="descripe2" value="<?php echo isset($info['descripe2']) ? $info['descripe2'] : ''; ?>" style="width: 100%; margin: 8px 0 5px;">
				<input type="text" name="descripe3" value="<?php echo isset($info['descripe3']) ? $info['descripe3'] : ''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 15px 0 7px;">
				<label>Fiberglass Delamination: </label>
				<label style="margin: 0 2%;"><input type="radio" name="delmination_status" value="yes" <?php echo (isset($info['delmination_status']) && $info['delmination_status']=='yes')?'checked="checked"':''; ?> />Yes</label>
				<label><input type="radio" name="delmination_status" value="no" <?php echo (isset($info['delmination_status']) && $info['delmination_status']=='no')?'checked="checked"':''; ?> />No</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Describe: </label>
				<input type="text" name="descripe4" value="<?php echo isset($info['descripe4']) ? $info['descripe4'] : ''; ?>" style="width: 93%; float: right;">
				<input type="text" name="descripe5" value="<?php echo isset($info['descripe5']) ? $info['descripe5'] : ''; ?>" style="width: 100%; margin: 8px 0 5px;">
				<input type="text" name="descripe6" value="<?php echo isset($info['descripe6']) ? $info['descripe6'] : ''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 15px 0 7px;">
				<label>Current State Inspection: </label>
				<label style="margin: 0 2%;"><input type="radio" name="inspection_status" value="yes" <?php echo (isset($info['inspection_status']) && $info['inspection_status']=='yes')?'checked="checked"':''; ?> /> Yes</label>
				<label><input type="radio" name="inspection_status" value="no" <?php echo (isset($info['inspection_status']) && $info['inspection_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0 7px;">
				<label>Tires: </label>
				<label style="margin: 0 2%;"><input type="radio" name="tires_status" value="new" <?php echo (isset($info['tires_status']) && $info['tires_status']=='new')?'checked="checked"':''; ?> /> New</label>
				<label><input type="radio" name="tires_status" value="good" <?php echo (isset($info['tires_status']) && $info['tires_status']=='good')?'checked="checked"':''; ?> /> Good</label>
				<label style="margin: 0 2%;"><input type="radio" name="tires_status" value="fair" <?php echo (isset($info['tires_status']) && $info['tires_status']=='fair')?'checked="checked"':''; ?> /> Fair</label>
				<label><input type="radio" name="tires_status" value="poor" <?php echo (isset($info['tires_status']) && $info['tires_status']=='poor')?'checked="checked"':''; ?> /> Poor</label>
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 60%;">
				<h3 style="float; left; width: 100%; margin: 7px 0; font-size: 17px;">Systems and Appliance Functioning:</h3>
				<div class="one-half" style="float: left; width: 36%;">
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Awning</span> <input type="checkbox" name="system_status" value="awning" <?php echo (isset($info['system_status']) && $info['system_status']=='awning')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Water System</span> <input type="checkbox" name="system_status" value="water" <?php echo (isset($info['system_status']) && $info['system_status']=='water')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Refridgerator</span> <input type="checkbox" name="system_status" value="refrid" <?php echo (isset($info['system_status']) && $info['system_status']=='refrid')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">A/C</span> <input type="checkbox" name="system_status" value="ac" <?php echo (isset($info['system_status']) && $info['system_status']=='ac')?'checked="checked"':''; ?> /></label>
				</div>
				
				<div class="one-half" style="float: left; width: 36%;">
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Stove/Oven</span> <input type="checkbox" name="system_status" value="stove" <?php echo (isset($info['system_status']) && $info['system_status']=='stove')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Microwave</span> <input type="checkbox" name="system_status" value="microwave" <?php echo (isset($info['system_status']) && $info['system_status']=='microwave')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Furnace</span> <input type="checkbox" name="system_status" value="furnace" <?php echo (isset($info['system_status']) && $info['system_status']=='furnace')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Water Heater</span> <input type="checkbox" name="system_status" value="heater" <?php echo (isset($info['system_status']) && $info['system_status']=='heater')?'checked="checked"':''; ?> /></label>
				</div>
			</div>
			<div class="right" style="float: left; width: 40%;">
				<h3 style="float; left; width: 100%; margin: 7px 0; font-size: 17px;">Motorhomes</h3>
				<div class="one-half" style="float: left; width: 60%;">
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Engine</span> <input type="checkbox" name="system_status" value="engine" <?php echo (isset($info['system_status']) && $info['system_status']=='engine')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Brakes</span> <input type="checkbox" name="system_status" value="brakes" <?php echo (isset($info['system_status']) && $info['system_status']=='brakes')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Transmission</span> <input type="checkbox" name="system_status" value="transmission" <?php echo (isset($info['system_status']) && $info['system_status']=='transmission')?'checked="checked"':''; ?> /></label>
					<label style="display: block;"><span style="width: 60%; float: left; display: block;">Generator</span> <input type="checkbox" name="system_status" value="generator" <?php echo (isset($info['system_status']) && $info['system_status']=='generator')?'checked="checked"':''; ?> /></label>
				</div>
			</div>
		</div>
		
		<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
			<label>Other: </label>
			<input type="text" name="other1" value="<?php echo isset($info['other1']) ? $info['other1'] : ''; ?>" style="width: 93%; float: right;">
			<input type="text" name="other2" value="<?php echo isset($info['other2']) ? $info['other2'] : ''; ?>" style="width: 100%; margin: 8px 0 5px;">
			<input type="text" name="other3" value="<?php echo isset($info['other3']) ? $info['other3'] : ''; ?>" style="width: 100%;">
		</div>
		
		<p style="float: left; width: 100%; margin: 0; font-size: 15px;">I Affirm that all information given is correct to the best of my knowledge. I am aware that the RV will be inspected upon arrival. I agree to allow the dealership to change the value of my trade- in if the information given is incorrect:</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Purchaser Signature</label>
				<input type="text" name="purchaser_sign" value="<?php echo isset($info['purchaser_sign']) ? $info['purchaser_sign'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Co- Purchaser Signature</label>
				<input type="text" name="co_purchaser_sign" value="<?php echo isset($info['co_purchaser_sign']) ? $info['co_purchaser_sign'] : ''; ?>" style="width: 66%">
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
