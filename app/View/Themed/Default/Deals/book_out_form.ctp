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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 11px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<h2 style="float: left; width: 40%;; margin: 0; font-size: 17px;"><b>Book Out Form - RV</b></h2>
			<div class="right" style="float: right; width: 30%;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Customer:</label>
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Mileage:</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 78%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>AIR CONDITIONING AND HEATING</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="btu1" value="btu1" <?php echo ($info['btu1_check'] == "btu1") ? "checked" : ""; ?> /> 7,000 BTU</label>
					<label style="display: block;"><input type="checkbox" name="btu2" value="btu2" <?php echo ($info['btu2_check'] == "btu2") ? "checked" : ""; ?> /> 11,000 BTU</label>
					<label style="display: block;"><input type="checkbox" name="btu3" value="btu3" <?php echo ($info['btu3_check'] == "btu3") ? "checked" : ""; ?> /> 13,500 BTU</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="btu4" value="btu4" <?php echo ($info['btu4_check'] == "btu4") ? "checked" : ""; ?> /> 13,500 BTU (Non-Central/Non Ducted)</label>
					<label style="display: block;"><input type="checkbox" name="btu5" value="btu5" <?php echo ($info['btu5_check'] == "btu5") ? "checked" : ""; ?> /> 13,500 BTU Central/Ducted</label>
					<label style="display: block;"><input type="checkbox" name="btu6" value="btu6" <?php echo ($info['btu6_check'] == "btu6") ? "checked" : ""; ?> /> 15,000 BTU (Non-Central/Non Ducted)</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="btu7" value="btu7" <?php echo ($info['btu7_check'] == "btu7") ? "checked" : ""; ?> /> 15,000 BTU Central/Ducted</label>
					<label style="display: block;"><input type="checkbox" name="ipo" value="ipo" <?php echo ($info['ipo_check'] == "ipo") ? "checked" : ""; ?> /> 15,000 IPO 13,500</label>
					<label style="display: block;"><input type="checkbox" name="heater1" value="heater1" <?php echo ($info['heater1_check'] == "heater1") ? "checked" : ""; ?> /> 16,000 BTU Heater W/Elect. lgn</label>
					<label style="display: block;"><input type="checkbox" name="heater2" value="heater2" <?php echo ($info['heater2_check'] == "heater2") ? "checked" : ""; ?> /> 18,000 BTU Heater W/Elect. lgn</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="air" value="air" <?php echo ($info['air_check'] == "air") ? "checked" : ""; ?> /> Air Conditioner</label>
					<label style="display: block;"><input type="checkbox" name="aqua" value="aqua" <?php echo ($info['aqua_check'] == "aqua") ? "checked" : ""; ?> /> Aqua Hot Heating System</label>
					<label style="display: block;"><input type="checkbox" name="swap" value="swap" <?php echo ($info['swap_check'] == "swap") ? "checked" : ""; ?> /> Swamp Cooler</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="funrnace1" value="funrnace1" <?php echo ($info['funrnace1_check'] == "funrnace1") ? "checked" : ""; ?> /> Funrnace (10,000 - 12,000 BTU) </label>
					<label style="display: block;"><input type="checkbox" name="funrnace2" value="funrnace2" <?php echo ($info['funrnace2_check'] == "funrnace2") ? "checked" : ""; ?> /> Funrnace (13,000 - 17,000 BTU) </label>
					<label style="display: block;"><input type="checkbox" name="funrnace3" value="funrnace3" <?php echo ($info['funrnace3_check'] == "funrnace3") ? "checked" : ""; ?> /> Funrnace (21,000 - 27,000 BTU) </label>
					<label style="display: block;"><input type="checkbox" name="funrnace4" value="funrnace4" <?php echo ($info['funrnace4_check'] == "funrnace4") ? "checked" : ""; ?> /> Funrnace (30,000 - 35,000 BTU) </label>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>APPLIANCES</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="cu1" value="cu1" <?php echo ($info['cu1_check'] == "cu1") ? "checked" : ""; ?> /> 2.5 CU Refrignerator</label>
					<label style="display: block;"><input type="checkbox" name="cu2" value="cu2" <?php echo ($info['cu2_check'] == "cu2") ? "checked" : ""; ?> /> 2.5 - 4.0 CU. FT.</label>
					<label style="display: block;"><input type="checkbox" name="cu3" value="cu3" <?php echo ($info['cu3_check'] == "cu3") ? "checked" : ""; ?> /> 3.0 CU Refrignerator</label>
					<label style="display: block;"><input type="checkbox" name="cu4" value="cu4" <?php echo ($info['cu4_check'] == "cu4") ? "checked" : ""; ?> /> 5 - 7.0 CU. FT.</label>
					<label style="display: block;"><input type="checkbox" name="cu5" value="cu5" <?php echo ($info['cu5_check'] == "cu5") ? "checked" : ""; ?> /> 8 - 10.0 CU. FT.</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="refri1" value="refri1" <?php echo ($info['refri1_check'] == "refri1") ? "checked" : ""; ?> /> 3-Way Refrignerator</label>
					<label style="display: block;"><input type="checkbox" name="vacuum" value="vacuum" <?php echo ($info['vacuum_check'] == "vacuum") ? "checked" : ""; ?> /> Central Vacuum Cleaner</label>
					<label style="display: block;"><input type="checkbox" name="diswasher" value="diswasher" <?php echo ($info['diswasher_check'] == "diswasher") ? "checked" : ""; ?> /> Diswasher</label>
					<label style="display: block;"><input type="checkbox" name="dryer" value="dryer" <?php echo ($info['dryer_check'] == "dryer") ? "checked" : ""; ?> /> Dryer</label>
					<label style="display: block;"><input type="checkbox" name="exterior" value="exterior" <?php echo ($info['exterior_check'] == "exterior") ? "checked" : ""; ?> /> Exterior Refrignerator/Freezer</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="garbage" value="garbage" <?php echo ($info['garbage_check'] == "garbage") ? "checked" : ""; ?> /> Garbage Disposal</label>
					<label style="display: block;"><input type="checkbox" name="gas" value="gas" <?php echo ($info['gas_check'] == "gas") ? "checked" : ""; ?> /> Gas Grill Cook Top</label>
					<label style="display: block;"><input type="checkbox" name="ice" value="ice" <?php echo ($info['ice_check'] == "ice") ? "checked" : ""; ?> /> Ice Maker (Stand ALone Unit)</label>
					<label style="display: block;"><input type="checkbox" name="refrig" value="refrig" <?php echo ($info['refrig_check'] == "refrig") ? "checked" : ""; ?> /> Refrig. 4dr w/Ice Maker (Luxury)</label>
					<label style="display: block;"><input type="checkbox" name="upgrade" value="upgrade" <?php echo ($info['upgrade_check'] == "upgrade") ? "checked" : ""; ?> /> Refrignerator Side by Side Upgrade</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="oven" value="oven" <?php echo ($info['oven_check'] == "oven") ? "checked" : ""; ?> /> Microwave Oven</label>
					<label style="display: block;"><input type="checkbox" name="combo1" value="combo1" <?php echo ($info['combo1_check'] == "combo1") ? "checked" : ""; ?> /> Microwave/Convection Combo</label>
					<label style="display: block;"><input type="checkbox" name="combo2" value="combo2" <?php echo ($info['combo2_check'] == "combo2") ? "checked" : ""; ?> /> Microwave/Hood Combo</label>
					<label style="display: block;"><input type="checkbox" name="combo3" value="combo3" <?php echo ($info['combo3_check'] == "combo3") ? "checked" : ""; ?> /> Washer/Dryer Combo</label>
					<label style="display: block;"><input type="checkbox" name="combo4" value="combo4" <?php echo ($info['combo4_check'] == "combo4") ? "checked" : ""; ?> /> Washing Machine</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="water1" value="water1" <?php echo ($info['water1_check'] == "water1") ? "checked" : ""; ?> /> Water and Propane System </label>
					<label style="display: block;"><input type="checkbox" name="water2" value="water2" <?php echo ($info['water2_check'] == "water2") ? "checked" : ""; ?> /> Water Heater 10 Gallon Gas/Elec </label>
					<label style="display: block;"><input type="checkbox" name="water3" value="water3" <?php echo ($info['water3_check'] == "water3") ? "checked" : ""; ?> /> Water Heater 10 Gallon Gas/Elec w/DSI</label>
					<label style="display: block;"><input type="checkbox" name="water4" value="water4" <?php echo ($info['water4_check'] == "water4") ? "checked" : ""; ?> /> Water Heater 6 Gallon Gas/Elec </label>
					<label style="display: block;"><input type="checkbox" name="water5" value="water5" <?php echo ($info['water5_check'] == "water5") ? "checked" : ""; ?> /> Water Heater 6 Gallon Gas/Elec w/DSI </label>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>ENGINE AND SUSPENSION SYSTEMS</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="assist1" value="assist1" <?php echo ($info['assist1_check'] == "assist1") ? "checked" : ""; ?> /> Air Assisted Suspension</label>
					<label style="display: block;"><input type="checkbox" name="brake" value="brake" <?php echo ($info['brake_check'] == "brake") ? "checked" : ""; ?> /> Air/Hydraulic Brakes (5th Whe)</label>
				</div>
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="electric" value="electric" <?php echo ($info['electric_check'] == "electric") ? "checked" : ""; ?> /> Electric Brakes</label>
					<label style="display: block;"><input type="checkbox" name="surge" value="surge" <?php echo ($info['surge_check'] == "surge") ? "checked" : ""; ?> /> Hydraulic Surge Breaks</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="exhaust" value="exhaust" <?php echo ($info['exhaust_check'] == "exhaust") ? "checked" : ""; ?> /> Exhaust Brake</label>
					<label style="display: block;"><input type="checkbox" name="steering" value="steering" <?php echo ($info['steering_check'] == "steering") ? "checked" : ""; ?> /> Steering Stabllizer</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>ENTERAINMENT</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="flat1" value="flat1" <?php echo ($info['flat1_check'] == "flat1") ? "checked" : ""; ?> /> 14" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat2" value="flat2" <?php echo ($info['flat2_check'] == "flat2") ? "checked" : ""; ?> /> 15" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat3" value="flat3" <?php echo ($info['flat3_check'] == "flat3") ? "checked" : ""; ?> /> 17" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat4" value="flat4" <?php echo ($info['flat4_check'] == "flat4") ? "checked" : ""; ?> /> 23" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat5" value="flat5" <?php echo ($info['flat5_check'] == "flat5") ? "checked" : ""; ?> /> 27" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat6" value="flat6" <?php echo ($info['flat6_check'] == "flat6") ? "checked" : ""; ?> /> 32" Flat Screen TV</label>
					<label style="display: block;"><input type="checkbox" name="flat7" value="flat7" <?php echo ($info['flat7_check'] == "flat7") ? "checked" : ""; ?> /> 32" Exterior LCD TV</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="lcd1" value="lcd1" <?php echo ($info['lcd1_check'] == "lcd1") ? "checked" : ""; ?> /> 15" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd2" value="lcd2" <?php echo ($info['lcd2_check'] == "lcd2") ? "checked" : ""; ?> /> 17" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd3" value="lcd3" <?php echo ($info['lcd3_check'] == "lcd3") ? "checked" : ""; ?> /> 19" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd4" value="lcd4" <?php echo ($info['lcd4_check'] == "lcd4") ? "checked" : ""; ?> /> 20" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd5" value="lcd5" <?php echo ($info['lcd5_check'] == "lcd5") ? "checked" : ""; ?> /> 27" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd6" value="lcd6" <?php echo ($info['lcd6_check'] == "lcd6") ? "checked" : ""; ?> /> 30" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd7" value="lcd7" <?php echo ($info['lcd7_check'] == "lcd7") ? "checked" : ""; ?> /> 32" LCD TV</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="lcd8" value="lcd8" <?php echo ($info['lcd8_check'] == "lcd8") ? "checked" : ""; ?> /> 37" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd9" value="lcd9" <?php echo ($info['lcd9_check'] == "lcd9") ? "checked" : ""; ?> /> 40" LCD TV</label>
					<label style="display: block;"><input type="checkbox" name="lcd10" value="lcd10" <?php echo ($info['lcd10_check'] == "lcd10") ? "checked" : ""; ?> /> 50" LCD TV with HD & Surround</label>
					<label style="display: block;"><input type="checkbox" name="tv1" value="tv1" <?php echo ($info['tv1_check'] == "tv1") ? "checked" : ""; ?> /> TV 10" Color</label>
					<label style="display: block;"><input type="checkbox" name="tv2" value="tv2" <?php echo ($info['tv2_check'] == "tv2") ? "checked" : ""; ?> /> TV 13" Color</label>
					<label style="display: block;"><input type="checkbox" name="tv3" value="tv3" <?php echo ($info['tv3_check'] == "tv3") ? "checked" : ""; ?> /> TV 19" Color</label>
					<label style="display: block;"><input type="checkbox" name="tv4" value="tv4" <?php echo ($info['tv4_check'] == "tv4") ? "checked" : ""; ?> /> TV 27" Color</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="tv5" value="tv5" <?php echo ($info['tv5_check'] == "tv5") ? "checked" : ""; ?> /> TV 27" Plasma 9</label>
					<label style="display: block;"><input type="checkbox" name="am1" value="am1" <?php echo ($info['am1_check'] == "am1") ? "checked" : ""; ?> /> AM/FM cassete Stereo</label>
					<label style="display: block;"><input type="checkbox" name="am2" value="am2" <?php echo ($info['am2_check'] == "am2") ? "checked" : ""; ?> /> AM/FM/CD Stereo</label>
					<label style="display: block;"><input type="checkbox" name="cd" value="cd" <?php echo ($info['cd_check'] == "cd") ? "checked" : ""; ?> /> CD Player (multiple)</label>
					<label style="display: block;"><input type="checkbox" name="dvd" value="dvd" <?php echo ($info['dvd_check'] == "dvd") ? "checked" : ""; ?> /> DVD Player</label>
					<label style="display: block;"><input type="checkbox" name="anenna" value="anenna" <?php echo ($info['anenna_check'] == "anenna") ? "checked" : ""; ?> /> TV Antenna W/Booster</label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="satellite1" value="satellite1" <?php echo ($info['satellite1_check'] == "satellite1") ? "checked" : ""; ?> /> Satellite Radio </label>
					<label style="display: block;"><input type="checkbox" name="satellite2" value="satellite2" <?php echo ($info['satellite2_check'] == "satellite2") ? "checked" : ""; ?> /> Satellite System - In Motion</label>
					<label style="display: block;"><input type="checkbox" name="satellite3" value="satellite3" <?php echo ($info['satellite3_check'] == "satellite3") ? "checked" : ""; ?> /> Satellite Dish WIthout Receiver</label>
					<label style="display: block;"><input type="checkbox" name="satellite4" value="satellite4" <?php echo ($info['satellite4_check'] == "satellite4") ? "checked" : ""; ?> /> Satellite System w/Auto Seek </label>
					<label style="display: block;"><input type="checkbox" name="satellite5" value="satellite5" <?php echo ($info['satellite5_check'] == "satellite5") ? "checked" : ""; ?> /> Sattellite System w/Mannual Point </label>
					<label style="display: block;"><input type="checkbox" name="satellite6" value="satellite6" <?php echo ($info['satellite6_check'] == "satellite6") ? "checked" : ""; ?> /> VCR/VCP </label>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>GENERATIONS</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="kw1" value="kw1" <?php echo ($info['kw1_check'] == "kw1") ? "checked" : ""; ?> /> 2 - 3 KW Gas</label>
					<label style="display: block;"><input type="checkbox" name="kw2" value="kw2" <?php echo ($info['kw2_check'] == "kw2") ? "checked" : ""; ?> /> 3.1 - 7 KW Gas</label>
					<label style="display: block;"><input type="checkbox" name="kw3" value="kw3" <?php echo ($info['kw3_check'] == "kw3") ? "checked" : ""; ?> /> 7 - 8 KW Gas</label>
				</div>
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="kw4" value="kw4" <?php echo ($info['kw4_check'] == "kw4") ? "checked" : ""; ?> /> 6.5 - 7.5 KW Propane </label>
					<label style="display: block;"><input type="checkbox" name="kw5" value="kw5" <?php echo ($info['kw5_check'] == "kw5") ? "checked" : ""; ?> /> 4.5 - 5.5 KW Propane </label>
					<label style="display: block;"><input type="checkbox" name="kw6" value="kw6" <?php echo ($info['kw6_check'] == "kw6") ? "checked" : ""; ?> /> 3.4 - 5.6 KW Propane </label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="kw7" value="kw7" <?php echo ($info['kw7_check'] == "kw7") ? "checked" : ""; ?> /> 10 KW Diesel</label>
					<label style="display: block;"><input type="checkbox" name="kw8" value="kw8" <?php echo ($info['kw8_check'] == "kw8") ? "checked" : ""; ?> /> 6-8 KW Diesel</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>JACKS AND LEVELING SYSTEMS</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="sys" value="sys" <?php echo ($info['sys_check'] == "sys") ? "checked" : ""; ?> /> Air Levelling System</label>
					<label style="display: block;"><input type="checkbox" name="jack" value="jack" <?php echo ($info['jack_check'] == "jack") ? "checked" : ""; ?> /> Electric Jacks</label>
					<label style="display: block;"><input type="checkbox" name="rear" value="rear" <?php echo ($info['rear_check'] == "rear") ? "checked" : ""; ?> /> Electric Rear Levelling</label>
					<label style="display: block;"><input type="checkbox" name="power" value="power" <?php echo ($info['power_check'] == "power") ? "checked" : ""; ?> /> Front Power Levelling Jacks</label>
					<label style="display: block;"><input type="checkbox" name="hydra" value="hydra" <?php echo ($info['hydra_check'] == "hydra") ? "checked" : ""; ?> /> Hydraulic Jacks</label>
				</div>
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="hydra1" value="hydra1" <?php echo ($info['hydra1_check'] == "hydra1") ? "checked" : ""; ?> /> Hydraulic Leveling System (Automatic)</label>
					<label style="display: block;"><input type="checkbox" name="hydra2" value="hydra2" <?php echo ($info['hydra2_check'] == "hydra2") ? "checked" : ""; ?> /> Hydraulic Leveling System (Manual) </label>
					<label style="display: block;"><input type="checkbox" name="hydra3" value="hydra3" <?php echo ($info['hydra3_check'] == "hydra3") ? "checked" : ""; ?> /> Hydraulic/Air Dual Leveling System </label>
					<label style="display: block;"><input type="checkbox" name="hydra4" value="hydra4" <?php echo ($info['hydra4_check'] == "hydra4") ? "checked" : ""; ?> /> Mechanical 4-Corner Jacks </label>
					<label style="display: block;"><input type="checkbox" name="camper" value="camper" <?php echo ($info['camper_check'] == "camper") ? "checked" : ""; ?> /> Portable Camper Jacks </label>
				</div>
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="power1" value="power1" <?php echo ($info['power1_check'] == "power1") ? "checked" : ""; ?> /> Power Hitch Jack</label>
					<label style="display: block;"><input type="checkbox" name="power2" value="power2" <?php echo ($info['power2_check'] == "power2") ? "checked" : ""; ?> /> Power Lift</label>
					<label style="display: block;"><input type="checkbox" name="scissor" value="scissor" <?php echo ($info['scissor_check'] == "scissor") ? "checked" : ""; ?> /> Scissor Stabllizer Jacks</label>
					<label style="display: block;"><input type="checkbox" name="stab" value="stab" <?php echo ($info['stab_check'] == "stab") ? "checked" : ""; ?> /> Stabllizer Jacks (Crank Down)</label>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0  ;">
			<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>MISCELLANEOUS OPTIONAL EQUIPMENT</b></p>
			<div class="inner" style="float: left; width: 100%;">
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="3m" value="3m" <?php echo ($info['3m_check'] == "3m") ? "checked" : ""; ?> /> 3M Film</label>
					<label style="display: block;"><input type="checkbox" name="seat1" value="seat1" <?php echo ($info['seat1_check'] == "seat1") ? "checked" : ""; ?> /> 6-Way Power Seat (Each)</label>
					<label style="display: block;"><input type="checkbox" name="seat2" value="seat2" <?php echo ($info['seat2_check'] == "seat2") ? "checked" : ""; ?> /> 8-Way Power Seat (Each)</label>
					<label style="display: block;"><input type="checkbox" name="roof" value="roof" <?php echo ($info['roof_check'] == "roof") ? "checked" : ""; ?> /> 12V Elec Roof Lift System</label>
					<label style="display: block;"><input type="checkbox" name="alumium" value="alumium" <?php echo ($info['alumium_check'] == "alumium") ? "checked" : ""; ?> /> Aluminum RV Wheels (Set of 4)</label>
					<label style="display: block;"><input type="checkbox" name="battery" value="battery" <?php echo ($info['battery_check'] == "battery") ? "checked" : ""; ?> /> Auxiliary Battery (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning1" value="awning1" <?php echo ($info['awning1_check'] == "awning1") ? "checked" : ""; ?> /> Awning - Electric (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning2" value="awning2" <?php echo ($info['awning2_check'] == "awning2") ? "checked" : ""; ?> /> Awning Patio</label>
					<label style="display: block;"><input type="checkbox" name="awning3" value="awning3" <?php echo ($info['awning3_check'] == "awning3") ? "checked" : ""; ?> /> Awning Rear</label>
					<label style="display: block;"><input type="checkbox" name="awning4" value="awning4" <?php echo ($info['awning4_check'] == "awning4") ? "checked" : ""; ?> /> Awning 8 " - 12 (Self Storing)</label>
					<label style="display: block;"><input type="checkbox" name="awning5" value="awning5" <?php echo ($info['awning5_check'] == "awning5") ? "checked" : ""; ?> /> Awning W/Screen Room</label>
					<label style="display: block;"><input type="checkbox" name="awning6" value="awning6" <?php echo ($info['awning6_check'] == "awning6") ? "checked" : ""; ?> /> Awning 10" - 12 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning7" value="awning7" <?php echo ($info['awning7_check'] == "awning7") ? "checked" : ""; ?> /> Awning 13" - 14 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning8" value="awning8" <?php echo ($info['awning8_check'] == "awning8") ? "checked" : ""; ?> /> Awning 15" - 16 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning9" value="awning9" <?php echo ($info['awning9_check'] == "awning9") ? "checked" : ""; ?> /> Awning 17" - 19 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning10" value="awning10" <?php echo ($info['awning10_check'] == "awning10") ? "checked" : ""; ?> /> Awning 20" - 22 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning11" value="awning11" <?php echo ($info['awning11_check'] == "awning11") ? "checked" : ""; ?> /> Awning 23" - 14 (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning12" value="awning12" <?php echo ($info['awning12_check'] == "awning12") ? "checked" : ""; ?> /> Awning 25" (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning13" value="awning13" <?php echo ($info['awning13_check'] == "awning13") ? "checked" : ""; ?> /> Awning For Slide-Out (Bedroom)</label>
					<label style="display: block;"><input type="checkbox" name="awning14" value="awning14" <?php echo ($info['awning14_check'] == "awning14") ? "checked" : ""; ?> /> Awning For Slide Out (Coach)</label>
					<label style="display: block;"><input type="checkbox" name="cabin" value="cabin" <?php echo ($info['cabin_check'] == "cabin") ? "checked" : ""; ?> /> Cabinetry Upgrade (Luxury)</label>
					<label style="display: block;"><input type="checkbox" name="cb" value="cb" <?php echo ($info['cb_check'] == "cb") ? "checked" : ""; ?> /> CB Radio</label>
					<label style="display: block;"><input type="checkbox" name="celling" value="celling" <?php echo ($info['celling_check'] == "celling") ? "checked" : ""; ?> /> Celling Fan</label>
					<label style="display: block;"><input type="checkbox" name="collision" value="collision" <?php echo ($info['collision_check'] == "collision") ? "checked" : ""; ?> /> Collision Avoidance System</label>
					<label style="display: block;"><input type="checkbox" name="curise" value="curise" <?php echo ($info['curise_check'] == "curise") ? "checked" : ""; ?> /> Cruise Control</label>
					<label style="display: block;"><input type="checkbox" name="storage" value="storage" <?php echo ($info['storage_check'] == "storage") ? "checked" : ""; ?> /> Front Storage Box</label>
					<label style="display: block;"><input type="checkbox" name="diamond" value="diamond" <?php echo ($info['diamond_check'] == "diamond") ? "checked" : ""; ?> /> Diamond Shield</label>
					<label style="display: block;"><input type="checkbox" name="driver1" value="driver1" <?php echo ($info['driver1_check'] == "driver1") ? "checked" : ""; ?> /> Driver Side Door</label>
					<label style="display: block;"><input type="checkbox" name="driver2" value="driver2" <?php echo ($info['driver2_check'] == "driver2") ? "checked" : ""; ?> /> Driver Side Door W/Power Window</label>
					<label style="display: block;"><input type="checkbox" name="electric1" value="electric1" <?php echo ($info['electric1_check'] == "electric1") ? "checked" : ""; ?> /> Electric Step (Double)</label>
					<label style="display: block;"><input type="checkbox" name="electric2" value="electric2" <?php echo ($info['electric2_check'] == "electric2") ? "checked" : ""; ?> /> Electric Step (Single)</label>
					<label style="display: block;"><input type="checkbox" name="exterior1" value="exterior1" <?php echo ($info['exterior1_check'] == "exterior1") ? "checked" : ""; ?> /> Exterior Paint</label>
					<label style="display: block;"><input type="checkbox" name="exterior2" value="exterior2" <?php echo ($info['exterior2_check'] == "exterior2") ? "checked" : ""; ?> /> Fiberglass Exterior 30" and Under</label>
					<label style="display: block;"><input type="checkbox" name="exterior3" value="exterior3" <?php echo ($info['exterior3_check'] == "exterior3") ? "checked" : ""; ?> /> Fiberglass Exterior 31" and Over</label>
					<label style="display: block;"><input type="checkbox" name="walls" value="walls" <?php echo ($info['walls_check'] == "walls") ? "checked" : ""; ?> /> Fiberglass Walls</label>
					<label style="display: block;"><input type="checkbox" name="fire" value="fire" <?php echo ($info['fire_check'] == "fire") ? "checked" : ""; ?> /> Fireplace</label>
				</div>
				
				<div class="one-fifth" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="fuel1" value="fuel1" <?php echo ($info['fuel1_check'] == "fuel1") ? "checked" : ""; ?> /> Fuel Station</label>
					<label style="display: block;"><input type="checkbox" name="fuel2" value="fuel2" <?php echo ($info['fuel2_check'] == "fuel2") ? "checked" : ""; ?> /> Full Body Paint</label>
					<label style="display: block;"><input type="checkbox" name="gps" value="gps" <?php echo ($info['gps_check'] == "gps") ? "checked" : ""; ?> /> GPS Navigation System</label>
					<label style="display: block;"><input type="checkbox" name="hitch" value="hitch" <?php echo ($info['hitch_check'] == "hitch") ? "checked" : ""; ?> /> Hitch Stanblilizer</label>
					<label style="display: block;"><input type="checkbox" name="invertor1" value="invertor1" <?php echo ($info['invertor1_check'] == "invertor1") ? "checked" : ""; ?> /> Invertor (1000 Watt)</label>
					<label style="display: block;"><input type="checkbox" name="invertor2" value="invertor2" <?php echo ($info['invertor2_check'] == "invertor2") ? "checked" : ""; ?> /> Invertor (2000 Watt)</label>
					<label style="display: block;"><input type="checkbox" name="invertor3" value="invertor3" <?php echo ($info['invertor3_check'] == "invertor3") ? "checked" : ""; ?> /> Invertor (600 Watt)</label>
					<label style="display: block;"><input type="checkbox" name="invisible" value="invisible" <?php echo ($info['invisible_check'] == "invisible") ? "checked" : ""; ?> /> Invisible Bra</label>
					<label style="display: block;"><input type="checkbox" name="lpg" value="lpg" <?php echo ($info['lpg_check'] == "lpg") ? "checked" : ""; ?> /> LPG Gas/Smoke Detector</label>
					<label style="display: block;"><input type="checkbox" name="luggage" value="luggage" <?php echo ($info['luggage_check'] == "luggage") ? "checked" : ""; ?> /> Luggage Rack and Ladder</label>
					<label style="display: block;"><input type="checkbox" name="shade" value="shade" <?php echo ($info['shade_check'] == "shade") ? "checked" : ""; ?> /> Manual Roman Shades</label>
					<label style="display: block;"><input type="checkbox" name="lift" value="lift" <?php echo ($info['lift_check'] == "lift") ? "checked" : ""; ?> /> Manual Roof Lift System</label>
					<label style="display: block;"><input type="checkbox" name="manual1" value="manual1" <?php echo ($info['manual1_check'] == "manual1") ? "checked" : ""; ?> /> Manual Slide Out (Bedroom)</label>
					<label style="display: block;"><input type="checkbox" name="manual2" value="manual2" <?php echo ($info['manual2_check'] == "manual2") ? "checked" : ""; ?> /> Manual Slide Out (Coach)</label>
					<label style="display: block;"><input type="checkbox" name="manual3" value="manual3" <?php echo ($info['manual3_check'] == "manual3") ? "checked" : ""; ?> /> Manual Solar Screens</label>
					<label style="display: block;"><input type="checkbox" name="mirror" value="mirror" <?php echo ($info['mirror_check'] == "mirror") ? "checked" : ""; ?> /> Mirrors  (Power W/Defrost)</label>
					<label style="display: block;"><input type="checkbox" name="multi" value="multi" <?php echo ($info['multi_check'] == "multi") ? "checked" : ""; ?> /> Multifles Lighting</label>
					<label style="display: block;"><input type="checkbox" name="grill" value="grill" <?php echo ($info['grill_check'] == "grill") ? "checked" : ""; ?> /> Outside Grill</label>
					<label style="display: block;"><input type="checkbox" name="shower" value="shower" <?php echo ($info['shower_check'] == "shower") ? "checked" : ""; ?> /> Outside Shower</label>
					<label style="display: block;"><input type="checkbox" name="skirt" value="skirt" <?php echo ($info['skirt_check'] == "skirt") ? "checked" : ""; ?> /> Painted  Skirt</label>
					<label style="display: block;"><input type="checkbox" name="porta" value="porta" <?php echo ($info['porta_check'] == "porta") ? "checked" : ""; ?> /> Porta Potti/Shower</label>
					<label style="display: block;"><input type="checkbox" name="cockpit" value="cockpit" <?php echo ($info['cockpit_check'] == "cockpit") ? "checked" : ""; ?> /> Power Cockpit Window Blinds</label>
					<label style="display: block;"><input type="checkbox" name="cord" value="cord" <?php echo ($info['cord_check'] == "cord") ? "checked" : ""; ?> /> Power Cord Reel</label>
					<label style="display: block;"><input type="checkbox" name="bunk" value="bunk" <?php echo ($info['bunk_check'] == "bunk") ? "checked" : ""; ?> /> Power Double Bunk System</label>
					<label style="display: block;"><input type="checkbox" name="vent" value="vent" <?php echo ($info['vent_check'] == "vent") ? "checked" : ""; ?> /> Power Roof Vent</label>
					<label style="display: block;"><input type="checkbox" name="rain" value="rain" <?php echo ($info['rain_check'] == "rain") ? "checked" : ""; ?> /> Power Roof Vent/w Rain Sensor</label>
					<label style="display: block;"><input type="checkbox" name="room1" value="room1" <?php echo ($info['room1_check'] == "room1") ? "checked" : ""; ?> /> Power Slide-Out Room Bedroom (Each)</label>
					<label style="display: block;"><input type="checkbox" name="room2" value="room2" <?php echo ($info['room2_check'] == "room2") ? "checked" : ""; ?> /> Power Slide-Out Room 14" (Each)</label>
					<label style="display: block;"><input type="checkbox" name="room3" value="room3" <?php echo ($info['room3_check'] == "room3") ? "checked" : ""; ?> /> Power Slide-Out Room 16" (Each)</label>
					<label style="display: block;"><input type="checkbox" name="room4" value="room4" <?php echo ($info['room4_check'] == "room4") ? "checked" : ""; ?> /> Power Slide-Out Room 6" (Each)</label>
					<label style="display: block;"><input type="checkbox" name="room5" value="room5" <?php echo ($info['room5_check'] == "room5") ? "checked" : ""; ?> /> Power Slide-Out Room 8" (Each)</label>
					<label style="display: block;"><input type="checkbox" name="bike" value="bike" <?php echo ($info['bike_check'] == "bike") ? "checked" : ""; ?> /> Rear Bike Rack</label>
					<label style="display: block;"><input type="checkbox" name="vision" value="vision" <?php echo ($info['vision_check'] == "vision") ? "checked" : ""; ?> /> Rear Vision Camera/Monitor</label>
					<label style="display: block;"><input type="checkbox" name="camera" value="camera" <?php echo ($info['camera_check'] == "camera") ? "checked" : ""; ?> /> Rear View Camera System</label>
					<label style="display: block;"><input type="checkbox" name="rack" value="rack" <?php echo ($info['rack_check'] == "rack") ? "checked" : ""; ?> /> Roof Rack</label>
					<label style="display: block;"><input type="checkbox" name="safe" value="safe" <?php echo ($info['safe_check'] == "safe") ? "checked" : ""; ?> /> Safe</label>
				</div>
				
				<div class="one-fifth" style="float: left; width: 20%; box-sizing: border-box;">
					<label style="display: block;"><input type="checkbox" name="screen1" value="screen1" <?php echo ($info['screen1_check'] == "screen1") ? "checked" : ""; ?> /> Screen Room 10' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="screen2" value="screen2" <?php echo ($info['screen2_check'] == "screen2") ? "checked" : ""; ?> /> Screen Room 11' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="screen3" value="screen3" <?php echo ($info['screen3_check'] == "screen3") ? "checked" : ""; ?> /> Screen Room 12' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="screen4" value="screen4" <?php echo ($info['screen4_check'] == "screen4") ? "checked" : ""; ?> /> Screen Room 7' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="screen5" value="screen5" <?php echo ($info['screen5_check'] == "screen5") ? "checked" : ""; ?> /> Screen Room 8' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="screen6" value="screen6" <?php echo ($info['screen6_check'] == "screen6") ? "checked" : ""; ?> /> Screen Room 9' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="security1" value="security1" <?php echo ($info['security1_check'] == "security1") ? "checked" : ""; ?> /> Security System (Basic)</label>
					<label style="display: block;"><input type="checkbox" name="security2" value="security2" <?php echo ($info['security2_check'] == "security2") ? "checked" : ""; ?> /> Security System (Deluxe)</label>
					<label style="display: block;"><input type="checkbox" name="security3" value="security3" <?php echo ($info['security3_check'] == "security3") ? "checked" : ""; ?> /> Security System (Glass)</label>
					<label style="display: block;"><input type="checkbox" name="side" value="side" <?php echo ($info['side_check'] == "side") ? "checked" : ""; ?> /> Side View Camera</label>
					<label style="display: block;"><input type="checkbox" name="six" value="six" <?php echo ($info['six_check'] == "six") ? "checked" : ""; ?> /> Six Way Power Driver Seat</label>
					<label style="display: block;"><input type="checkbox" name="aky" value="aky" <?php echo ($info['aky_check'] == "aky") ? "checked" : ""; ?> /> Akylight</label>
					<label style="display: block;"><input type="checkbox" name="tray1" value="tray1" <?php echo ($info['tray1_check'] == "tray1") ? "checked" : ""; ?> /> Slide Out Tray-Full Pass Through</label>
					<label style="display: block;"><input type="checkbox" name="tray2" value="tray2" <?php echo ($info['tray2_check'] == "tray2") ? "checked" : ""; ?> /> Slide Out Tray-One Side</label>
					<label style="display: block;"><input type="checkbox" name="solar1" value="solar1" <?php echo ($info['solar1_check'] == "solar1") ? "checked" : ""; ?> /> Solar Battery Charger</label>
					<label style="display: block;"><input type="checkbox" name="solar2" value="solar2" <?php echo ($info['solar2_check'] == "solar2") ? "checked" : ""; ?> /> Solar Panel (Each)</label>
					<label style="display: block;"><input type="checkbox" name="solar3" value="solar3" <?php echo ($info['solar3_check'] == "solar3") ? "checked" : ""; ?> /> Spare Tire and Carrier</label>
					<label style="display: block;"><input type="checkbox" name="spot" value="spot" <?php echo ($info['spot_check'] == "spot") ? "checked" : ""; ?> /> Spot Light (Remote)</label>
					<label style="display: block;"><input type="checkbox" name="storm" value="storm" <?php echo ($info['storm_check'] == "storm") ? "checked" : ""; ?> /> Storm Windows (All)</label>
					<label style="display: block;"><input type="checkbox" name="title1" value="title1" <?php echo ($info['title1_check'] == "title1") ? "checked" : ""; ?> /> Tile Upgrade (Bathroom/Kicthen)</label>
					<label style="display: block;"><input type="checkbox" name="title2" value="title2" <?php echo ($info['title2_check'] == "title2") ? "checked" : ""; ?> /> Tilt Wheel</label>
					<label style="display: block;"><input type="checkbox" name="tire" value="tire" <?php echo ($info['tire_check'] == "tire") ? "checked" : ""; ?> /> Tire Pressure Monitor</label>
					<label style="display: block;"><input type="checkbox" name="flush" value="flush" <?php echo ($info['flush_check'] == "flush") ? "checked" : ""; ?> /> Toilet-Electric Flush</label>
					<label style="display: block;"><input type="checkbox" name="hitch" value="hitch" <?php echo ($info['hitch_check'] == "hitch") ? "checked" : ""; ?> /> Trailer Hitch</label>
					<label style="display: block;"><input type="checkbox" name="toilet" value="toilet" <?php echo ($info['toilet_check'] == "toilet") ? "checked" : ""; ?> /> Travel Toilet</label>
					<label style="display: block;"><input type="checkbox" name="wheel" value="wheel" <?php echo ($info['wheel_check'] == "wheel") ? "checked" : ""; ?> /> Two Wheel Car Tow</label>
					<label style="display: block;"><input type="checkbox" name="vinyl1" value="vinyl1" <?php echo ($info['vinyl1_check'] == "vinyl1") ? "checked" : ""; ?> /> Vinyl Graphics</label>
					<label style="display: block;"><input type="checkbox" name="vinyl2" value="vinyl2" <?php echo ($info['vinyl2_check'] == "vinyl2") ? "checked" : ""; ?> /> Vinyl Walls</label>
					<label style="display: block;"><input type="checkbox" name="hose" value="hose" <?php echo ($info['hose_check'] == "hose") ? "checked" : ""; ?> /> Water Hose Reel</label>
					<label style="display: block;"><input type="checkbox" name="purifier" value="purifier" <?php echo ($info['purifier_check'] == "purifier") ? "checked" : ""; ?> /> Water Purifier W/Despenser</label>
					<label style="display: block;"><input type="checkbox" name="awning1" value="awning1" <?php echo ($info['awning1_check'] == "awning1") ? "checked" : ""; ?> /> Window Awning 3' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning2" value="awning2" <?php echo ($info['awning2_check'] == "awning2") ? "checked" : ""; ?> /> Window Awning 4' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning3" value="awning3" <?php echo ($info['awning3_check'] == "awning3") ? "checked" : ""; ?> /> Window Awning 5' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning4" value="awning4" <?php echo ($info['awning4_check'] == "awning4") ? "checked" : ""; ?> /> Window Awning 6' (Each)</label>
					<label style="display: block;"><input type="checkbox" name="awning5" value="awning5" <?php echo ($info['awning5_check'] == "awning5") ? "checked" : ""; ?> /> Window Awning 7' (Each)</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="vertical-align: top; display: inline-block;"><b>Others</b></label>
				<textarea name="term_notes" style="width: 70%; border: 0px; height: 100px"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label><b>Completed by:</b></label>
				<input type="text" name="completed" value="<?php echo isset($info['completed'])?$info['completed']:''; ?>" style="width: 48%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label><b>Dealership:</b></label>
				<input type="text" name="dealership" value="<?php echo isset($info['dealership'])?$info['dealership']:''; ?>" style="width: 50%;">
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
