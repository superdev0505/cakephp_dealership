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
	.checks span{display: block;}
	label{font-size: 12px;}
	li{margin-bottom: 7px; font-size: 16px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 5px;}
	.middle input[type="text"]{border-bottom: 0px;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	.wraper.main input {padding: 0px;}
	
@media print {
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="trader" style="text-align: center;">
				<p style="width: 40%; border: 1px solid #000; margin: 0 auto 20px; padding: 10px 0;"><span>[&nbsp; &nbsp;]</span> TRADE  <span style="margin: 0 0 0 30px;">[&nbsp; &nbsp;]</span> PURCHASE</p>
			</div>
			
			<div class="row" style="float: left; width: 100%;">
				<div class="inner" style="width: 70%; margin: 0 auto; border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000; padding: 4px; box-sizing: border-box; border-left: 1px solid #000;">
						<label>Customer:</label>
						<input type="text" name="customer" value="<?php echo isset($info["customer"]) ? $info['customer'] : $info['first_name'].' '.$info['last_name'];?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000; padding: 4px; box-sizing: border-box; border-right: 1px solid #000;border-left: 1px solid #000; ">
						<label>Phone#:</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:'';  ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000; padding: 4px; box-sizing: border-box; border-left: 1px solid #000;">
						<label>Salesperson:</label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000; padding: 4px; box-sizing: border-box; border-right: 1px solid #000; border-left: 1px solid #000;">
						<label>Date:</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>"  style="width: 80%;">
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="inner" style="width: 70%; margin: 20px auto;">
					<div class="form-field" style="float: left; width: 20%; padding: 4px; box-sizing: border-box; border: 1px solid #000; ">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; padding: 4px; box-sizing: border-box; width: 30%; border-bottom: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; padding: 4px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000;">
						<label>VIN:</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 80%;">
					</div>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 10px auto; ">
				<table cellspacing="0" cellpadding="0" width="100%" style="text-align: center; margin-bottom: 10px;">
					<tr style="background-color: #ddd;">
						<th style="width: 7%;"><img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/check.png'); ?>" alt="" style="width: 50%;"></th>
						<th style="width: 15%;">TYPE</th>
						<th style="width: 22%;">MODEL</th>
						<th style="width: 22%;">SUB-MODEL</th>
						<th style="width: 34%">SUB-SUBMODEL</th>
					</tr>
					<tr>
						<td><input type="text" name="num1" value="<?php echo isset($info['num1'])?$info['num1']:''; ?>" style="width: 100%;"></td>
						<td>Horse</td>
						<td><input type="text" name="horse" value="<?php echo isset($info['horse'])?$info['horse']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Horse (Slant / Straight)</td>
						<td><input type="text" name="ft" value="<?php echo isset($info['ft'])?$info['ft']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">ft (DR / LQ)</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num2" value="<?php echo isset($info['num2'])?$info['num2']:''; ?>" style="width: 100%;"></td>
						<td>Cargo</td>
						<td><input type="text" name="x1_1" value="<?php echo isset($info['x1_1'])?$info['x1_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="x1_2" value="<?php echo isset($info['x1_2'])?$info['x1_2']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;"></td>
						<td>Ramp / Single / Double</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num3" value="<?php echo isset($info['num3'])?$info['num3']:''; ?>" style="width: 100%;"></td>
						<td>Dump</td>
						<td><input type="text" name="x2_1" value="<?php echo isset($info['x2_1'])?$info['x2_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="name" style="width: 50%; border-bottom: 1px solid #000;"></td>
						<td><b>Axles:</b> <input type="text" name="axles2_1" value="<?php echo isset($info['axles2_1'])?$info['axles2_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="axles2_2" value="<?php echo isset($info['axles2_2'])?$info['axles2_2']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">lbs.</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num4" value="<?php echo isset($info['num4'])?$info['num4']:''; ?>" style="width: 100%;"></td>
						<td>Car</td>
						<td><input type="text" name="ft_open" value="<?php echo isset($info['ft_open'])?$info['ft_open']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">ft (Open / Enclosed)</td>
						<td><b>Axles:</b> <input type="text" name="axles3_1" value="<?php echo isset($info['axles3_1'])?$info['axles3_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="axles3_2" value="<?php echo isset($info['axles3_2'])?$info['axles3_2']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">lbs.</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model4" value="<?php echo isset($info['model4'])?$info['model4']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num5" value="<?php echo isset($info['num5'])?$info['num5']:''; ?>" style="width: 100%;"></td>
						<td>Utility</td>
						<td><input type="text" name="x4_1" value="<?php echo isset($info['x4_1'])?$info['x4_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="x4_2" value="<?php echo isset($info['x4_2'])?$info['x4_2']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;"></td>
						<td>Aluminum / Steel</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model5" value="<?php echo isset($info['model5'])?$info['model5']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num6" value="<?php echo isset($info['num6'])?$info['num6']:''; ?>" style="width: 100%;"></td>
						<td>Stock</td>
						<td><input type="text" name="x5_1" value="<?php echo isset($info['x5_1'])?$info['x5_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="x5_2" value="<?php echo isset($info['x5_2'])?$info['x5_2']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;"></td>
						<td>Bumber / Gooseneck</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model6" value="<?php echo isset($info['model6'])?$info['model6']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num8" value="<?php echo isset($info['num8'])?$info['num8']:''; ?>" style="width: 100%;"></td>
						<td>Vending</td>
						<td><input type="text" name="x7_1" value="<?php echo isset($info['x7_1'])?$info['x7_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="x7_2" value="<?php echo isset($info['x7_2'])?$info['x7_2']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;"></td>
						<td><b>Axles:</b> <input type="text" name="axles7_1" value="<?php echo isset($info['axles7_1'])?$info['axles7_1']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> X <input type="text" name="axles7_2" value="<?php echo isset($info['axles7_2'])?$info['axles7_2']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">lbs.</td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model8" value="<?php echo isset($info['model8'])?$info['model8']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num9" value="<?php echo isset($info['num9'])?$info['num9']:''; ?>" style="width: 100%;"></td>
						<td>Truck</td>
						<td><b style="font-size: 11px;">Model: <input type="text" name="model_name1" value="<?php echo isset($info['model_name1'])?$info['model_name1']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Trim pkg: <input type="text" name="trim1" value="<?php echo isset($info['trim1'])?$info['trim1']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model9" value="<?php echo isset($info['model9'])?$info['model9']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					<tr>
						<td><input type="text" name="num10" value="<?php echo isset($info['num10'])?$info['num10']:''; ?>" style="width: 100%;"></td>
						<td>Motorhome</td>
						<td><b style="font-size: 11px;">Model: <input type="text" name="model_name2" value="<?php echo isset($info['model_name2'])?$info['model_name2']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Trim pkg: <input type="text" name="trim2" value="<?php echo isset($info['trim2'])?$info['trim2']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model10" value="<?php echo isset($info['model10'])?$info['model10']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
					<tr>
						<td><input type="text" name="num11" value="<?php echo isset($info['num11'])?$info['num11']:''; ?>" style="width: 100%;"></td>
						<td>Other</td>
						<td><b style="font-size: 11px;">Model: <input type="text" name="model_name3" value="<?php echo isset($info['model_name3'])?$info['model_name3']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Trim pkg: <input type="text" name="trim3" value="<?php echo isset($info['trim3'])?$info['trim3']:''; ?>" style="width: 70%;"></b></td>
						<td><b style="font-size: 11px;">Model name: <input type="text" name="model11" value="<?php echo isset($info['model11'])?$info['model11']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					
				</table>
				
				
				<table cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 10px;">
					<tr>
						<td><label>Hitch size:</label> <input type="text" name="hitch" value="<?php echo isset($info['hitch'])?$info['hitch']:''; ?>" style="width: 100%;"></td>
						<td><label>Color:</label> <input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 100%;"></td>
						<td><label>Length:</label> <input type="text" name="length" value="<?php echo isset($info['length'])?$info['length']:''; ?>" style="width: 100%;"></td>
						<td><label>Width:</label> <input type="text" name="width" value="<?php echo isset($info['width'])?$info['width']:''; ?>" style="width: 100%;"></td>
						<td><label>Inside Height:</label> <input type="text"  name="height" value="<?php echo isset($info['height'])?$info['height']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><label>Mileage:</label> <input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 100%;"></td>
						<td><label>Axie type:</label> <input type="text" name="axie" value="<?php echo isset($info['axie'])?$info['axie']:''; ?>" style="width: 100%;"></td>
						<td><label>Rear Door:</label> <input type="text" name="rear" value="<?php echo isset($info['rear'])?$info['rear']:''; ?>" style="width: 100%;"></td>
						<td><label>Keys?</label> <input type="text" name="keys" value="<?php echo isset($info['keys'])?$info['keys']:''; ?>" style="width: 100%;"></td>
						<td><label>Gen. hours:</label> <input type="text" name="gen" value="<?php echo isset($info['gen'])?$info['gen']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				<div class="half-section" style="width: 65%; margin: 20px auto;">
					<table cellpadding="0" cellspacing="0" width="60%" style="width: 100%;">
						<tr>
							<td><label>Tire condition (1-10):</label> <input type="text" name="tire_condi" value="<?php echo isset($info['tire_condi'])?$info['tire_condi']:''; ?>" style="width: 38%;"></td>
							<td><label>Brakes working?</label> <input type="text" name="break" value="<?php echo isset($info['break'])?$info['break']:''; ?>" style="width: 45%;"></td>
							<td><label>Overall condition (1-10):</label> <input type="text" name="overall" value="<?php echo isset($info['overall'])?$info['overall']:''; ?>" style="width: 33%;"></td>
						</tr>
						
						<tr>
							<td><label>Tire age (years):</label> <input type="text" name="tire_age" value="<?php echo isset($info['tire_age'])?$info['tire_age']:''; ?>" style="width: 50%;"></td>
							<td><label>Title in your name?</label> <input type="text" name="title_name" value="<?php echo isset($info['title_name'])?$info['title_name']:''; ?>" style="width: 40%;"></td>
							<td><label>Payoff?</label> <input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 70%;"></td>
						</tr>
					</table>
				</div>
				
				
				<table cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
					<tr>
						<td colspan="2" style="text-align: center; background-color: #ddd;"><b>OPTIONS / DESCRIPTIONS</b></td>
					<tr>
					
					<tr>
						<td><input type="text" name="options1" value="<?php echo isset($info['options1'])?$info['options1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description1" value="<?php echo isset($info['description1'])?$info['description1']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="options2" value="<?php echo isset($info['options2'])?$info['options2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description2" value="<?php echo isset($info['description2'])?$info['description2']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="options3" value="<?php echo isset($info['options3'])?$info['options3']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description3" value="<?php echo isset($info['description3'])?$info['description3']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="options4" value="<?php echo isset($info['options4'])?$info['options4']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description4" value="<?php echo isset($info['description4'])?$info['description4']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="options5" value="<?php echo isset($info['options5'])?$info['options5']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description5" value="<?php echo isset($info['description5'])?$info['description5']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="options6" value="<?php echo isset($info['options6'])?$info['options6']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="name" style="width: 100%;"></td>
					</tr>
				</table>
				
				<table cellpadding="0" cellspacing="0" width="60%" style="width: 100%; margin: 20px 0 0;">
					<tr>
						<td><label><b style="font-size:16px;">ACV:</b></label> <input type="text" name="acv" value="<?php echo isset($info['acv']) ? $info['acv'] : "" ?>" style="width: 100%;"></td>
						<td><label><b>Authorized by:</b></label> <input type="text" name="authorized" value="<?php echo isset($info['authorized']) ? $info['authorized'] : "" ?>" style="width: 100%;"></td>
						<td><label><b>Retail / Sale:</b></label> <input type="text" name="retail" value="<?php echo isset($info['retail']) ? $info['retail'] : "" ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
		</div>
		
		<strong style="display: block; text-decoration: underline; font-size: 14px; text-align: center;">TRADE APPRAISALS ARE GOOD FOR THIRTY (30) DAYS FROM DATE WRITTEN ON THIS SHEET UNLESS OTHERWISE NOTED.</strong>
		
		
		
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
