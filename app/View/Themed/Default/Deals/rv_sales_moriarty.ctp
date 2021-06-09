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
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 0px solid #000;}
	th{padding: 4px; border-right: 0px solid #000;}
	td:first-child{text-align: left;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	td{padding: 3px;}
	.second-table td{text-align: center;}
	.second-table td:first-child{text-align: left;}
	.no-border input[type="text"]{border: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h3 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 18px;"><b>RV Sales</b></h3>
		<h3 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 16px;"><b>Trade / Consignment Check in form</b></h3>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Name(s):</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 4px;">
				<label style="display: block;">Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 4px;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table>
				<tr>
					<td>Yes</td>
					<td>No</td>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title1_check" <?php echo (isset($info['title1_check']) && $info['title1_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title1_check" <?php echo (isset($info['title1_check']) && $info['title1_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Does the above described vehicle ("vehicle") have FRAME DAMAGE or damage to the exterior? </td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title2_check" <?php echo (isset($info['title2_check']) && $info['title2_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title2_check" <?php echo (isset($info['title2_check']) && $info['title2_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Are all slide outs operating correctly?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title3_check" <?php echo (isset($info['title3_check']) && $info['title3_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title3_check" <?php echo (isset($info['title3_check']) && $info['title3_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Is there any damage, weak spots. or sagging in the floors or walls? If yes, Where? <input type="text" name="title3" value="<?php echo isset($info['title3'])?$info['title3']:''; ?>" style="width: 20%; border-bottom: 1px solid;"></td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title4_check" <?php echo (isset($info['title4_check']) && $info['title4_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title4_check" <?php echo (isset($info['title4_check']) && $info['title4_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Have all fresh, grey, and black water tanks been dumped?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title5_check" <?php echo (isset($info['title5_check']) && $info['title5_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title5_check" <?php echo (isset($info['title5_check']) && $info['title5_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Has the vehicle sustained water damage?</td>
				</tr>
				<tr>
					<td><input type="radio" name="title6_check" <?php echo (isset($info['title6_check']) && $info['title6_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title6_check" <?php echo (isset($info['title6_check']) && $info['title6_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Have factory furniture, TVs or appliances been removed or modified?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title7_check" <?php echo (isset($info['title7_check']) && $info['title7_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title7_check" <?php echo (isset($info['title7_check']) && $info['title7_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Have there been pets inside the RV?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title8_check" <?php echo (isset($info['title8_check']) && $info['title8_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title8_check" <?php echo (isset($info['title8_check']) && $info['title8_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>Has there been smoking inside the RV?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title9_check" <?php echo (isset($info['title9_check']) && $info['title9_check']=='yes')?'checked="checked"':''; ?> value="yes"> </td>
					<td><input type="radio" name="title9_check" <?php echo (isset($info['title9_check']) && $info['title9_check']=='no')?'checked="checked"':''; ?> value="no"> </td>
					<td>If the RV has a rubber roof, are black streaks showing through the white coating?</td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="left" style="float: left; width: 60%;">
				<table style="width: 100%;">
					<tr>
						<td style="width: 40%;"><b>Overall Condition:</b></td>
						<td style="width: 15%;"><b>Great</b></td>
						<td style="width: 15%;"><b>Good</b></td>
						<td style="width: 15%;"><b>Fair</b></td>
						<td style="width: 15%;"><b>Poor</b></td>
					</tr>
					
					<tr>
						<td>Upholstery</td>
						<td><input type="checkbox" name="upholstery_great" <?php echo ($info['upholstery_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="upholstery_good" <?php echo ($info['upholstery_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="upholstery_fair" <?php echo ($info['upholstery_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="upholstery_poor" <?php echo ($info['upholstery_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Carpet / flooring</td>
						<td><input type="checkbox" name="carpet_great" <?php echo ($info['carpet_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="carpet_good" <?php echo ($info['carpet_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="carpet_fair" <?php echo ($info['carpet_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="carpet_poor" <?php echo ($info['carpet_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Roof</td>
						<td><input type="checkbox" name="roof_great" <?php echo ($info['roof_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="roof_good" <?php echo ($info['roof_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="roof_fair" <?php echo ($info['roof_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="roof_poor" <?php echo ($info['roof_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Exterior / decals</td>
						<td><input type="checkbox" name="exterior_great" <?php echo ($info['exterior_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="exterior_good" <?php echo ($info['exterior_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="exterior_fair" <?php echo ($info['exterior_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="exterior_poor" <?php echo ($info['exterior_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Tires (list age) <input type="text" name="tires" value="<?php echo isset($info['tires'])?$info['tires']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></td>
						<td><input type="checkbox" name="tires_great" <?php echo ($info['tires_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="tires_good" <?php echo ($info['tires_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="tires_fair" <?php echo ($info['tires_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="tires_poor" <?php echo ($info['tires_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Appliances</td>
						<td><input type="checkbox" name="app_great" <?php echo ($info['app_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="app_good" <?php echo ($info['app_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="app_fair" <?php echo ($info['app_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="app_poor" <?php echo ($info['app_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Water pump / lines</td>
						<td><input type="checkbox" name="water_great" <?php echo ($info['water_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="water_good" <?php echo ($info['water_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="water_fair" <?php echo ($info['water_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="water_poor" <?php echo ($info['water_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Antenna / Satellite dish</td>
						<td><input type="checkbox" name="antenna_great" <?php echo ($info['antenna_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="antenna_good" <?php echo ($info['antenna_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="antenna_fair" <?php echo ($info['antenna_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="antenna_poor" <?php echo ($info['antenna_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
					
					<tr>
						<td>Awning</td>
						<td><input type="checkbox" name="awning_great" <?php echo ($info['awning_great'] == "great") ? "checked" : ""; ?> value="great"></td>
						<td><input type="checkbox" name="awning_good" <?php echo ($info['awning_good'] == "good") ? "checked" : ""; ?> value="good"></td>
						<td><input type="checkbox" name="awning_fair" <?php echo ($info['awning_fair'] == "fair") ? "checked" : ""; ?> value="fair"></td>
						<td><input type="checkbox" name="awning_poor" <?php echo ($info['awning_poor'] == "poor") ? "checked" : ""; ?> value="poor"></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: right; width: 35%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="form-field" style="float: left; width: 100%; margin-bottom: 3px;">
					<label>Notes / Repairs needed (Scheduled <input type="text" name="schedule" value="<?php echo isset($info['schedule'])?$info['schedule']:''; ?>" style="width: 27%; border-bottom: solid 1px #000;">)</label>
				</div>
				<textarea name="notes1" style="float: left; width: 98%;  height: 200px;"><?php echo isset($info['notes1'])?$info['notes1']:'' ?></textarea>
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; margin: 6px 0;">Are the following items present at time of intake</h3>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="left" style="float: left; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td style="width: 40%;"><b>Item:</b></td>
						<td style="width: 15%;"><b>Yes</b></td>
						<td style="width: 15%;"><b>No</b></td>
					</tr>
					
					<tr>
						<td>Elec Cord 50 or 30A</td>
						<td><input type="checkbox" name="elec_check" <?php echo ($info['elec_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="elec_check" <?php echo ($info['elec_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Generator</td>
						<td><input type="checkbox" name="generat_check" <?php echo ($info['generat_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="generat_check" <?php echo ($info['generat_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Solar</td>
						<td><input type="checkbox" name="solar_check" <?php echo ($info['solar_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="solar_check" <?php echo ($info['solar_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Satellite / Antenna</td>
						<td><input type="checkbox" name="satellite_check" <?php echo ($info['satellite_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="satellite_check" <?php echo ($info['satellite_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Washer / Dryer</td>
						<td><input type="checkbox" name="washer_check" <?php echo ($info['washer_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="washer_check" <?php echo ($info['washer_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Retention Straps</td>
						<td><input type="checkbox" name="strap_check" <?php echo ($info['strap_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="strap_check" <?php echo ($info['strap_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
					
					<tr>
						<td>Fireplace</td>
						<td><input type="checkbox" name="fireplace_check" <?php echo ($info['fireplace_check'] == "yes") ? "checked" : ""; ?> value="yes"></td>
						<td><input type="checkbox" name="fireplace_check" <?php echo ($info['fireplace_check'] == "no") ? "checked" : ""; ?> value="no"></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: right; width: 40%; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
				<div class="form-field" style="float: left; width: 100%; margin-bottom: 3px;">
					<label>Notes</label>
				</div>
				<textarea name="notes2" style="float: left; width: 98%; height: 170px;"><?php echo isset($info['notes2'])?$info['notes2']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="width: 35%; float: left;">
				<label>Batteries: How many?</label>
				<input type="text" name="batteries" value="<?php echo isset($info['batteries'])?$info['batteries']:''; ?>" style="width: 30%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="width: 25%; float: left;">
				<label>Size?</label>
				<input type="text" name="size" value="<?php echo isset($info['size'])?$info['size']:''; ?>" style="width: 50%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 15px;">
		<label>Have any items, including those listed above, been removed form this unit? If so, list the item nd the location in which it is stored:</label>
		<input type="text" name="item" value="<?php echo isset($info['item'])?$info['item']:''; ?>" style="float: left; width: 100%; margin: 5px 0; border-bottom: 1px solid #000;">
		</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 4px;">
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
				<label style="display: block;">Date:</label>
			</div>
			<div class="form-field" style="float: right; width: 60%; box-sizing: border-box; padding: 4px;">
				<input type="text" name="tech_sign" value="<?php echo isset($info['tech_sign'])?$info['tech_sign']:''; ?>" style="width: 100%;  border-bottom: 1px solid #000; margin-bottom: 3px;">
				<label>Tech Signature(s):</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box;">
			<div class="form-field" style="float: right; width: 60%; box-sizing: border-box; padding: 4px;">
				<input type="text" name="sales_sign" value="<?php echo isset($info['sales_sign'])?$info['sales_sign']:''; ?>" style="width: 100%;  border-bottom: 1px solid #000; margin-bottom: 3px;">
				<label>Sales Signature(s):</label>
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
