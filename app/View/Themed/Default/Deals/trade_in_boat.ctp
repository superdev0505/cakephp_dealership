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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 11px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
		label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	textarea {border: 0px;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	.left td{padding: 0px 3px;}
	.right td{padding: 10px 10px;}
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; font-size: 18px;"><b>WATERCRAFT SALES TRADE IN CHECKOVER FORM - <i style="text-decoration: underline;">SKI BOAT</b></i></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 36%;">
				<label>Stock #</label>
				<input type="text" name="stock" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 70%;">
			</div>
			
			<div class="form-field" style="float: right; width: 25%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border: 1px solid #000; margin: 5px 0 5px;">
			<h2 style="float: left; width: 100%; font-size: 18px; margin: 3px 0px;"><b>BOAT/MOTOR/TRAILER:</b></h2>
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>Boat Manufacturer</label>
					<input type="text" name="boat_manufact" value="<?php echo isset($info['boat_manufact'])?$info['boat_manufact']:''; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 23%;">
					<label>Boat Model</label>
					<input type="text" name="boat_model" value="<?php echo isset($info['boat_model'])?$info['boat_model']:''; ?>" style="width: 64%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>Boat Year</label>
					<input type="text" name="boat_year" value="<?php echo isset($info['boat_year'])?$info['boat_year']:''; ?>" style="width: 68%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>Boat Serial #</label>
					<input type="text" name="boat_serial" value="<?php echo isset($info['boat_serial'])?$info['boat_serial']:''; ?>" style="width: 82%;">
				</div>
				<div class="form-field" style="float: left; width: 50%;">
					<label>Boat Color(s)</label>
					<input type="text" name="boat_color" value="<?php echo isset($info['boat_color'])?$info['boat_color']:''; ?>" style="width: 81%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>Engine Manufacture</label>
					<input type="text" name="engine_manufact" value="<?php echo isset($info['engine_manufact'])?$info['engine_manufact']:''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 23%;">
					<label>Engine Model</label>
					<input type="text" name="engine_model" value="<?php echo isset($info['engine_model'])?$info['engine_model']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>Engine Year</label>
					<input type="text" name="engine_year" value="<?php echo isset($info['engine_year'])?$info['engine_year']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>Engine Serial #</label>
					<input type="text" name="engine_serial" value="<?php echo isset($info['engine_serial'])?$info['engine_serial']:''; ?>" style="width: 78%;">
				</div>	
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>Trailer Manufacturer</label>
					<input type="text" name="trailer_manufact" value="<?php echo isset($info['trailer_manufact'])?$info['trailer_manufact']:''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 23%;">
					<label>Trailer Model</label>
					<input type="text" name="trailer_model" value="<?php echo isset($info['trailer_model'])?$info['trailer_model']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>Trailer Year</label>
					<input type="text" name="trailer_year" value="<?php echo isset($info['trailer_year'])?$info['trailer_year']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Trailer Serial Number</label>
					<input type="text" name="trailer_serial" value="<?php echo isset($info['trailer_serial'])?$info['trailer_serial']:''; ?>" style="width: 85%;">
				</div>	
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px; border: 1px solid #000;">
				<h2 style="float: left; width: 100%; font-size: 18px; margin: 2px 0;"><b>CONDITION:</b></h2>
				<table style="float: left; width: 100%; border-top: 1px solid #000;" cellpadding="0" cellspacing="0">
					<tr>
						<td>&nbsp;</td>
						<td>GOOD</td>
						<td>NEED REPAIR</td>
						<td>&nbsp;</td>
						<td>GOOD</td>
						<td>NEED REPAIR</td>
					</tr>
					
					<tr>
						<td><b>Boat</b></td>
						<td><input type="text" name="boat_good" value="<?php echo isset($info['boat_good'])?$info['boat_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="boat_repeat" value="<?php echo isset($info['boat_repeat'])?$info['boat_repeat']:''; ?>" style="width: 100%;"></td>
						<td><b>Engine</b></td>
						<td><input type="text" name="engine_good" value="<?php echo isset($info['engine_good'])?$info['engine_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="engine_repeat" value="<?php echo isset($info['engine_repeat'])?$info['engine_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Deck</td>
						<td><input type="text" name="deck_good" value="<?php echo isset($info['deck_good'])?$info['deck_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="deck_repeat" value="<?php echo isset($info['deck_repeat'])?$info['deck_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Hours?</td>
						<td><input type="text" name="hours_good" value="<?php echo isset($info['hours_good'])?$info['hours_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="hours_repeat" value="<?php echo isset($info['hours_repeat'])?$info['hours_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Hullsides</td>
						<td><input type="text" name="hull_good" value="<?php echo isset($info['hull_good'])?$info['hull_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="hull_repeat" value="<?php echo isset($info['hull_repeat'])?$info['hull_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Fuel Tank</td>
						<td><input type="text" name="fuel_good" value="<?php echo isset($info['fuel_good'])?$info['fuel_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="fuel_repeat" value="<?php echo isset($info['fuel_repeat'])?$info['fuel_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Rubrail</td>
						<td><input type="text" name="rubrail_good" value="<?php echo isset($info['rubrail_good'])?$info['rubrail_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="rubrail_repeat" value="<?php echo isset($info['rubrail_repeat'])?$info['rubrail_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Paint</td>
						<td><input type="text" name="paint_good" value="<?php echo isset($info['paint_good'])?$info['paint_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="paint_repeat" value="<?php echo isset($info['paint_repeat'])?$info['paint_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Interior</td>
						<td><input type="text" name="interior_good" value="<?php echo isset($info['interior_good'])?$info['interior_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="interior_repeat" value="<?php echo isset($info['interior_repeat'])?$info['interior_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Prop</td>
						<td><input type="text" name="prop_good" value="<?php echo isset($info['prop_good'])?$info['prop_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="prop_repeat" value="<?php echo isset($info['prop_repeat'])?$info['prop_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Upholstery</td>
						<td><input type="text" name="upholstery_good" value="<?php echo isset($info['upholstery_good'])?$info['upholstery_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="upholstery_repeat" value="<?php echo isset($info['upholstery_repeat'])?$info['upholstery_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Prop Shaft</td>
						<td><input type="text" name="shaft_good" value="<?php echo isset($info['shaft_good'])?$info['shaft_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="shaft_repeat" value="<?php echo isset($info['shaft_repeat'])?$info['shaft_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Tower</td>
						<td><input type="text" name="tower_good" value="<?php echo isset($info['tower_good'])?$info['tower_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="tower_repeat" value="<?php echo isset($info['tower_repeat'])?$info['tower_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Controls</td>
						<td><input type="text" name="control_good" value="<?php echo isset($info['control_good'])?$info['control_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="control_repeat" value="<?php echo isset($info['control_repeat'])?$info['control_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Board Racks</td>
						<td><input type="text" name="board_good" value="<?php echo isset($info['board_good'])?$info['board_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="board_repeat" value="<?php echo isset($info['board_repeat'])?$info['board_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Battery</td>
						<td><input type="text" name="battery_good" value="<?php echo isset($info['battery_good'])?$info['battery_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="battery_repeat" value="<?php echo isset($info['battery_repeat'])?$info['battery_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Flooring</td>
						<td><input type="text" name="flooring_good" value="<?php echo isset($info['flooring_good'])?$info['flooring_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="flooring_repeat" value="<?php echo isset($info['flooring_repeat'])?$info['flooring_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Water Pump</td>
						<td><input type="text" name="pump_good" value="<?php echo isset($info['pump_good'])?$info['pump_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="pump_repeat" value="<?php echo isset($info['pump_repeat'])?$info['pump_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Steering</td>
						<td><input type="text" name="steering_good" value="<?php echo isset($info['steering_good'])?$info['steering_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="steering_repeat" value="<?php echo isset($info['steering_repeat'])?$info['steering_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Bellow/Hoses</td>
						<td><input type="text" name="bellow_good" value="<?php echo isset($info['bellow_good'])?$info['bellow_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="bellow_repeat" value="<?php echo isset($info['bellow_repeat'])?$info['bellow_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Bimini</td>
						<td><input type="text" name="bimini_good" value="<?php echo isset($info['bimini_good'])?$info['bimini_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="bimini_repeat" value="<?php echo isset($info['bimini_repeat'])?$info['bimini_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Distributor</td>
						<td><input type="text" name="distri_good" value="<?php echo isset($info['distri_good'])?$info['distri_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="distri_repeat" value="<?php echo isset($info['distri_repeat'])?$info['distri_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Mooring Cover</td>
						<td><input type="text" name="mooring_good" value="<?php echo isset($info['mooring_good'])?$info['mooring_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="mooring_repeat" value="<?php echo isset($info['mooring_repeat'])?$info['mooring_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Transmission</td>
						<td><input type="text" name="trans_good" value="<?php echo isset($info['trans_good'])?$info['trans_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trans_repeat" value="<?php echo isset($info['trans_repeat'])?$info['trans_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Air Dam</td>
						<td><input type="text" name="dam_good" value="<?php echo isset($info['dam_good'])?$info['dam_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="dam_repeat" value="<?php echo isset($info['dam_repeat'])?$info['dam_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Temp</td>
						<td><input type="text" name="temp_good" value="<?php echo isset($info['temp_good'])?$info['temp_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="temp_repeat" value="<?php echo isset($info['temp_repeat'])?$info['temp_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Stereo/Speakers</td>
						<td><input type="text" name="stereo_good" value="<?php echo isset($info['stereo_good'])?$info['stereo_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="stereo_repeat" value="<?php echo isset($info['stereo_repeat'])?$info['stereo_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Oil Pressure</td>
						<td><input type="text" name="oil_good" value="<?php echo isset($info['oil_good'])?$info['oil_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="oil_repeat" value="<?php echo isset($info['oil_repeat'])?$info['oil_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Amp./Sub.</td>
						<td><input type="text" name="amp_good" value="<?php echo isset($info['amp_good'])?$info['amp_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="amp_repeat" value="<?php echo isset($info['amp_repeat'])?$info['amp_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Fuel Pressure</td>
						<td><input type="text" name="fuel_good" value="<?php echo isset($info['fuel_good'])?$info['fuel_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="fuel_repeat" value="<?php echo isset($info['fuel_repeat'])?$info['fuel_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Aux. Hookup</td>
						<td><input type="text" name="aux_good" value="<?php echo isset($info['aux_good'])?$info['aux_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="aux_repeat" value="<?php echo isset($info['aux_repeat'])?$info['aux_repeat']:''; ?>" style="width: 100%;"></td>
						<td>Volts</td>
						<td><input type="text" name="volt_good" value="<?php echo isset($info['volt_good'])?$info['volt_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="volt_repeat" value="<?php echo isset($info['volt_repeat'])?$info['volt_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>12v Charger</td>
						<td><input type="text" name="charger_good" value="<?php echo isset($info['charger_good'])?$info['charger_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="charger_repeat" value="<?php echo isset($info['charger_repeat'])?$info['charger_repeat']:''; ?>" style="width: 100%;"></td>
						<td>&nbsp;</td>
						<td><input type="text" name="good2" value="<?php echo isset($info['good2'])?$info['good2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="repeat2" value="<?php echo isset($info['repeat2'])?$info['repeat2']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><b>RGB Lighting</b></td>
						<td><input type="text" name="light_good" value="<?php echo isset($info['light_good'])?$info['light_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="light_repeat" value="<?php echo isset($info['light_repeat'])?$info['light_repeat']:''; ?>" style="width: 100%;"></td>
						<td><b>COMPRESSION</b></td>
						<td>1.<input type="text" name="compress_good" value="<?php echo isset($info['compress_good'])?$info['compress_good']:''; ?>" style="width: 100%;"></td>
						<td>2.<input type="text" name="compress_repeat" value="<?php echo isset($info['compress_repeat'])?$info['compress_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Digital Depth</td>
						<td><input type="text" name="digital_good" value="<?php echo isset($info['digital_good'])?$info['digital_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="digital_repeat" value="<?php echo isset($info['digital_repeat'])?$info['digital_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression1" value="<?php echo isset($info['compression1'])?$info['compression1']:''; ?>" style="width: 100%;"></td>
						<td>3.<input type="text" name="compress1_good" value="<?php echo isset($info['compress1_good'])?$info['compress1_good']:''; ?>" style="width: 100%;"></td>
						<td>4.<input type="text" name="compress1_repeat" value="<?php echo isset($info['compress1_repeat'])?$info['compress1_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>HelmScreen/LINC</td>
						<td><input type="text" name="helm_good" value="<?php echo isset($info['helm_good'])?$info['helm_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="helm_repeat" value="<?php echo isset($info['helm_repeat'])?$info['helm_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression2" value="<?php echo isset($info['compression2'])?$info['compression2']:''; ?>" style="width: 100%;"></td>
						<td>5.<input type="text" name="compress2_good" value="<?php echo isset($info['compress2_good'])?$info['compress2_good']:''; ?>" style="width: 100%;"></td>
						<td>6.<input type="text" name="compress2_repeat" value="<?php echo isset($info['compress2_repeat'])?$info['compress2_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Gauges</td>
						<td><input type="text" name="gauges_good" value="<?php echo isset($info['gauges_good'])?$info['gauges_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="gauges_repeat" value="<?php echo isset($info['gauges_repeat'])?$info['gauges_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression3" value="<?php echo isset($info['compression3'])?$info['compression3']:''; ?>" style="width: 100%;"></td>
						<td>7.<input type="text" name="compress3_good" value="<?php echo isset($info['compress3_good'])?$info['compress3_good']:''; ?>" style="width: 100%;"></td>
						<td>8.<input type="text" name="compress3_repeat" value="<?php echo isset($info['compress3_repeat'])?$info['compress3_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Ballast</td>
						<td><input type="text" name="ballast_good" value="<?php echo isset($info['ballast_good'])?$info['ballast_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="ballast_repeat" value="<?php echo isset($info['ballast_repeat'])?$info['ballast_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression4" value="<?php echo isset($info['compression4'])?$info['compression4']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress4_good" value="<?php echo isset($info['compress4_good'])?$info['compress4_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress4_repeat" value="<?php echo isset($info['compress4_repeat'])?$info['compress4_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Surf System</td>
						<td><input type="text" name="surf_good" value="<?php echo isset($info['surf_good'])?$info['surf_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="surf_repeat" value="<?php echo isset($info['surf_repeat'])?$info['surf_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression5" value="<?php echo isset($info['compression5'])?$info['compression5']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress5_good" value="<?php echo isset($info['compress5_good'])?$info['compress5_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress5_repeat" value="<?php echo isset($info['compress5_repeat'])?$info['compress5_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Seat Heater(s)</td>
						<td><input type="text" name="seat_good" value="<?php echo isset($info['seat_good'])?$info['seat_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="seat_repeat" value="<?php echo isset($info['seat_repeat'])?$info['seat_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression6" value="<?php echo isset($info['compression6'])?$info['compression6']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress6_good" value="<?php echo isset($info['compress6_good'])?$info['compress6_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress6_repeat" value="<?php echo isset($info['compress6_repeat'])?$info['compress6_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Defroster</td>
						<td><input type="text" name="defroster_good" value="<?php echo isset($info['defroster_good'])?$info['defroster_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="defroster_repeat" value="<?php echo isset($info['defroster_repeat'])?$info['defroster_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression7" value="<?php echo isset($info['compression7'])?$info['compression7']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress7_good" value="<?php echo isset($info['compress7_good'])?$info['compress7_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress7_repeat" value="<?php echo isset($info['compress7_repeat'])?$info['compress7_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>	
						<td>Heater</td>
						<td><input type="text" name="heater_good" value="<?php echo isset($info['heater_good'])?$info['heater_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="heater_repeat" value="<?php echo isset($info['heater_repeat'])?$info['heater_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression8" value="<?php echo isset($info['compression8'])?$info['compression8']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress8_good" value="<?php echo isset($info['compress8_good'])?$info['compress8_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress8_repeat" value="<?php echo isset($info['compress8_repeat'])?$info['compress8_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Fire Extinguisher</td>
						<td><input type="text" name="fire_good" value="<?php echo isset($info['fire_good'])?$info['fire_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="fire_repeat" value="<?php echo isset($info['fire_repeat'])?$info['fire_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression9" value="<?php echo isset($info['compression9'])?$info['compression9']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress9_good" value="<?php echo isset($info['compress9_good'])?$info['compress9_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress9_repeat" value="<?php echo isset($info['compress9_repeat'])?$info['compress9_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Horn</td>
						<td><input type="text" name="horn_good" value="<?php echo isset($info['horn_good'])?$info['horn_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="horn_repeat" value="<?php echo isset($info['horn_repeat'])?$info['horn_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression10" value="<?php echo isset($info['compression10'])?$info['compression10']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress10_good" value="<?php echo isset($info['compress10_good'])?$info['compress10_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress10_repeat" value="<?php echo isset($info['compress10_repeat'])?$info['compress10_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Cruise Control</td>
						<td><input type="text" name="cruise_good" value="<?php echo isset($info['cruise_good'])?$info['cruise_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="cruise_repeat" value="<?php echo isset($info['cruise_repeat'])?$info['cruise_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression11" value="<?php echo isset($info['compression11'])?$info['compression11']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress11_good" value="<?php echo isset($info['compress11_good'])?$info['compress11_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress11_repeat" value="<?php echo isset($info['compress11_repeat'])?$info['compress11_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td><b>Trailer</b></td>
						<td><input type="text" name="trailer_good" value="<?php echo isset($info['trailer_good'])?$info['trailer_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trailer_repeat" value="<?php echo isset($info['trailer_repeat'])?$info['trailer_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression12" value="<?php echo isset($info['compression12'])?$info['compression12']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress12_good" value="<?php echo isset($info['compress12_good'])?$info['compress12_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress12_repeat" value="<?php echo isset($info['compress12_repeat'])?$info['compress12_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Paint</td>
						<td><input type="text" name="paint_good" value="<?php echo isset($info['paint_good'])?$info['paint_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="paint_repeat" value="<?php echo isset($info['paint_repeat'])?$info['paint_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression13" value="<?php echo isset($info['compression13'])?$info['compression13']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress13_good" value="<?php echo isset($info['compress13_good'])?$info['compress13_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress13_repeat" value="<?php echo isset($info['compress13_repeat'])?$info['compress13_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Tires</td>
						<td><input type="text" name="tire_good" value="<?php echo isset($info['tire_good'])?$info['tire_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="tire_repeat" value="<?php echo isset($info['tire_repeat'])?$info['tire_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression14" value="<?php echo isset($info['compression14'])?$info['compression14']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress14_good" value="<?php echo isset($info['compress14_good'])?$info['compress14_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress14_repeat" value="<?php echo isset($info['compress14_repeat'])?$info['compress14_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Wheel Brngs</td>
						<td><input type="text" name="brngs_good" value="<?php echo isset($info['brngs_good'])?$info['brngs_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="brngs_repeat" value="<?php echo isset($info['brngs_repeat'])?$info['brngs_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression15" value="<?php echo isset($info['compression15'])?$info['compression15']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress15_good" value="<?php echo isset($info['compress15_good'])?$info['compress15_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress15_repeat" value="<?php echo isset($info['compress15_repeat'])?$info['compress15_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Springs</td>
						<td><input type="text" name="spring_good" value="<?php echo isset($info['spring_good'])?$info['spring_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="spring_repeat" value="<?php echo isset($info['spring_repeat'])?$info['spring_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression16" value="<?php echo isset($info['compression16'])?$info['compression16']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress16_good" value="<?php echo isset($info['compress16_good'])?$info['compress16_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress16_repeat" value="<?php echo isset($info['compress16_repeat'])?$info['compress16_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Tongue Jack</td>
						<td><input type="text" name="tongue_good" value="<?php echo isset($info['tongue_good'])?$info['tongue_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="tongue_repeat" value="<?php echo isset($info['tongue_repeat'])?$info['tongue_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression17" value="<?php echo isset($info['compression17'])?$info['compression17']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress17_good" value="<?php echo isset($info['compress17_good'])?$info['compress17_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress17_repeat" value="<?php echo isset($info['compress17_repeat'])?$info['compress17_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>


					<tr>
						<td>Winch</td>
						<td><input type="text" name="winch_good" value="<?php echo isset($info['winch_good'])?$info['winch_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="winch_repeat" value="<?php echo isset($info['winch_repeat'])?$info['winch_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression18" value="<?php echo isset($info['compression18'])?$info['compression18']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress18_good" value="<?php echo isset($info['compress18_good'])?$info['compress18_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress18_repeat" value="<?php echo isset($info['compress18_repeat'])?$info['compress18_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Brakes</td>
						<td><input type="text" name="brake_good" value="<?php echo isset($info['brake_good'])?$info['brake_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="brake_repeat" value="<?php echo isset($info['brake_repeat'])?$info['brake_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression19" value="<?php echo isset($info['compression19'])?$info['compression19']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress19_good" value="<?php echo isset($info['compress19_good'])?$info['compress19_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress19_repeat" value="<?php echo isset($info['compress19_repeat'])?$info['compress19_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>


					<tr>
						<td>Spare Tire</td>
						<td><input type="text" name="spare_good" value="<?php echo isset($info['spare_good'])?$info['spare_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="spare_repeat" value="<?php echo isset($info['spare_repeat'])?$info['spare_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression20" value="<?php echo isset($info['compression20'])?$info['compression20']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress21_good" value="<?php echo isset($info['compress21_good'])?$info['compress21_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress21_repeat" value="<?php echo isset($info['compress21_repeat'])?$info['compress21_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Trailer Lights</td>
						<td><input type="text" name="trailer_good" value="<?php echo isset($info['trailer_good'])?$info['trailer_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trailer_repeat" value="<?php echo isset($info['trailer_repeat'])?$info['trailer_repeat']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compression21" value="<?php echo isset($info['compression21'])?$info['compression21']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress21_good" value="<?php echo isset($info['compress21_good'])?$info['compress21_good']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="compress22_repeat" value="<?php echo isset($info['compress22_repeat'])?$info['compress22_repeat']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				
				<div class="row" style="float: left; width: 100%;  margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Additional Work Needed:</label>
						<textarea name="term_notes" style="width: 98%; height: 30px; border: 0px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
					</div>
				</div>
			</div>
			<!-- left side end -->
			
			<!-- right side start -->
			<div class="right" style="float: left; width: 50%; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-left: 0px;">
				<h2 style="float: left; width: 100%; font-size: 18px; margin: 2px 0;">Repair Estimate</h2>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<table cellpadding="0" cellspacing="0" style="border-top: 1px solid #000; width: 100%;">
						<tr>
							<th>Issue</td>
							<th>Part Number</td>
							<th>Labor Hours</td>
						</tr>
						
						<tr>
							<td><textarea name="issue1" style="width: 100%; height: 50px;"><?php echo isset($info['issue1'])?$info['issue1']:'' ?></textarea></td>
							<td><textarea name="part_num1" style="width: 100%; height: 50px;"><?php echo isset($info['part_num1'])?$info['part_num1']:'' ?></textarea></td>
							<td><textarea name="labor1" style="width: 100%; height: 50px;"><?php echo isset($info['labor1'])?$info['labor1']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue2" style="width: 100%; height: 50px;"><?php echo isset($info['issue2'])?$info['issue2']:'' ?></textarea></td>
							<td><textarea name="part_num2" style="width: 100%; height: 50px;"><?php echo isset($info['part_num2'])?$info['part_num2']:'' ?></textarea></td>
							<td><textarea name="labor2" style="width: 100%; height: 50px;"><?php echo isset($info['labor2'])?$info['labor2']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue3" style="width: 100%; height: 50px;"><?php echo isset($info['issue3'])?$info['issue3']:'' ?></textarea></td>
							<td><textarea name="part_num3" style="width: 100%; height: 50px;"><?php echo isset($info['part_num3'])?$info['part_num3']:'' ?></textarea></td>
							<td><textarea name="labor3" style="width: 100%; height: 50px;"><?php echo isset($info['labor3'])?$info['labor3']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue4" style="width: 100%; height: 50px;"><?php echo isset($info['issue4'])?$info['issue4']:'' ?></textarea></td>
							<td><textarea name="part_num4" style="width: 100%; height: 50px;"><?php echo isset($info['part_num4'])?$info['part_num4']:'' ?></textarea></td>
							<td><textarea name="labor4" style="width: 100%; height: 50px;"><?php echo isset($info['labor4'])?$info['labor4']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue5" style="width: 100%; height: 50px;"><?php echo isset($info['issue5'])?$info['issue5']:'' ?></textarea></td>
							<td><textarea name="part_num5" style="width: 100%; height: 50px;"><?php echo isset($info['part_num5'])?$info['part_num5']:'' ?></textarea></td>
							<td><textarea name="labor5" style="width: 100%; height: 50px;"><?php echo isset($info['labor5'])?$info['labor5']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue6" style="width: 100%; height: 50px;"><?php echo isset($info['issue6'])?$info['issue6']:'' ?></textarea></td>
							<td><textarea name="part_num6" style="width: 100%; height: 50px;"><?php echo isset($info['part_num6'])?$info['part_num6']:'' ?></textarea></td>
							<td><textarea name="labor6" style="width: 100%; height: 50px;"><?php echo isset($info['labor6'])?$info['labor6']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td><textarea name="issue7" style="width: 100%; height: 50px;"><?php echo isset($info['issue7'])?$info['issue7']:'' ?></textarea></td>
							<td><textarea name="part_num7" style="width: 100%; height: 50px;"><?php echo isset($info['part_num7'])?$info['part_num7']:'' ?></textarea></td>
							<td><textarea name="labor7" style="width: 100%; height: 50px;"><?php echo isset($info['labor7'])?$info['labor7']:'' ?></textarea></td>
						</tr>
						
						<tr>
							<td colspan="3"><textarea name="note" style="width: 100%; height: 150px; border: 1px solid #000;"><?php echo isset($info['note'])?$info['note']:'' ?></textarea></td>
						</tr>
					</table>
				</div>
			</div>
			<!-- right side end -->
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<h2 style="float: left; width: 100%; font-size: 18px; margin: 2px 0;">CUSTOMER:</h2>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Name</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name'])?$info['customer_name']:''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Customer #</label>
				<input type="text" name="customer" value="<?php echo isset($info['customer'])?$info['customer']:''; ?>" style="width: 82%;">
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
