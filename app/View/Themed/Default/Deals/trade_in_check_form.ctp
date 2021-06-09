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
$expectedt = date('Y-m-d H:i:s');
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
	<div id="worksheet_container" style="width:97%; margin:0 auto;">
	<style>
		body{ margin:0 1%; padding:0; }

	.trade_from{ width:60%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.trade_from2{ width:50%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.trade_from3 {
		border: solid 2px #000 !important;
	    width: 18px;
	    height: 18px; vertical-align:middle;
	    margin-right: 10px;
	}

	.trade_from4{ width:100%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
.wraper.main input{padding: 0px; margin: 1px 0;}
input[type=text]{border-color: #000 !important;}
@media print { 
	input{padding: 0px !important; margin: 0px !important;}
}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td>
				    <img width="100%" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/trade_in_check.png'); ?>" alt="">
	
				    </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style="font-size:13px; font-weight:600; width:40%; color:#000;"> Pre-Owned Marine Check In / Equipment List </td>
				     <td style="font-size:13px; font-weight:600; width:20%; color:#000;">Date: <input name="date_data" value="<?php echo date('Y-m-d h:i:s'); ?>"  type="text" class="trade_from" /></td>
				      <td style="font-size:13px; font-weight:600; width:40%; color:#000;"> Salesperson: <input value="<?php echo isset($info['sperson_data']) ? $info['sperson_data'] : $info['sperson']; ?>"  name="sperson_data" type="text" class="trade_from" style="width: 68%;"></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="font-size:13px; font-weight:600; width:20%; color:#000;">Make: <input name="make_data"  value="<?php echo isset($info['make_data']) ? $info['make_data'] : $info['make_trade']; ?>"  type="text" class="trade_from" /> </td>
				     <td style="font-size:13px; font-weight:600; width:20%; color:#000;">Model: <input name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] : $info['model_trade']; ?>"  type="text" class="trade_from" /> </td>
				      <td style="font-size:13px; font-weight:600; width:20%; color:#000;"> HID: <input name="hid_data"  value="<?php echo isset($info['hid_data']) ? $info['hid_data'] : $info['hid_data']; ?>"  type="text" class="trade_from" /> </td>
				      <td style="font-size:13px; font-weight:600; width:10%; color:#000;"> YR: <input name="yr_data"  value="<?php echo isset($info['yr_data']) ? $info['yr_data'] : $info['year_trade']; ?>"  type="text" class="trade_from"  style="width: 52%;"></td>
				      <td style="font-size:13px; font-weight:600; width:15%; color:#000;"> Length: <input name="length_data"  value="<?php echo isset($info['length_data']) ? $info['length_data'] : $info['length_data']; ?>"  type="text" class="trade_from" style="width: 55%;"></td>
				      <td style="font-size:13px; font-weight:600; width:15%; color:#000;"> Type: <input name="type_data"  value="<?php echo isset($info['type_data']) ? $info['type_data'] : $info['condition_trade']; ?>"  type="text" class="trade_from" style="width: 52%;"></td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="font-size:13px; font-weight:600; width:35%; color:#000;">Trailer YR/Make: <input name="traileryrmake_data"  value="<?php echo isset($info['traileryrmake_data']) ? $info['traileryrmake_data'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				     <td style="font-size:13px; font-weight:600; width:35%; color:#000;">Trailer VIN: <input name="trailer_vin"  value="<?php echo isset($info['trailer_vin']) ? $info['trailer_vin'] :''; ?>"  type="text" class="trade_from" /> </td>
				      <td style="font-size:13px; font-weight:600; width:15%; color:#000;">Hours: <input name="trailer_hours"  value="<?php echo isset($info['trailer_hours']) ? $info['trailer_hours'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				      <td style="font-size:13px; font-weight:600; width:15%; color:#000;"> Color: <input name="trailer_color"  value="<?php echo isset($info['trailer_color']) ? $info['trailer_color'] : ''; ?>"  type="text" class="trade_from2" /></td>
				      
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:6px;">
				  <tr>
				    <td style="width:100%; background: #2F5395; height: 5px; border-top: solid 1px #333; border-bottom: solid 1px #333;"> </td>
				      
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td> 
				   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:100%; font-size: 13px; font-weight: 600; color: #000;"> Owner Info</td>
				      
				  </tr>
				</table>
				    </td>
				    </tr>


				  <tr>
				    <td> 
				   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:30%; font-size: 13px; font-weight: 600; color: #000;"> Trade Owner:<input name="TradeOwner"  value="<?php echo isset($info['TradeOwner']) ? $info['TradeOwner'] : ''; ?>"  type="text" class="trade_from" /> </td>
				       <td style="width:25%; font-size: 13px; font-weight: 600; color: #000;"> Titles: B T<input name="TitlesBT"  value="<?php echo isset($info['TitlesBT']) ? $info['TitlesBT'] : ''; ?>"  type="text" class="trade_from" /></td>
					<td style="width:25%; font-size: 13px; font-weight: 600; color: #000;"> Lien Release(s): B T<input name="LienReleaseBT"  value="<?php echo isset($info['LienReleaseBT']) ? $info['LienReleaseBT'] : ''; ?>"  type="text" class="trade_from" style="width: 32%;"></td>
					 <td style="width:20%; font-size: 13px; font-weight: 600; color: #000;"> Manuals: Y N<input name="ManualsYN"  value="<?php echo isset($info['ManualsYN']) ? $info['ManualsYN'] : ''; ?>"  type="text" class="trade_from" style="width: 40%;"></td>
				  </tr>
				</table>
				    </td>
				    </tr>


				<tr>
				    <td> 
				   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:33%; font-size: 13px; font-weight: 600; color: #000;"> # Previous Owners: <input name="PreviousOwners"  value="<?php echo isset($info['PreviousOwners']) ? $info['PreviousOwners'] : ''; ?>"  type="text" class="trade_from" style="width: 42%;"></td>
				       <td style="width:33%; font-size: 13px; font-weight: 600; color: #000;"> Local Trade: <input name="LocalTrade"  value="<?php echo isset($info['LocalTrade']) ? $info['LocalTrade'] : '' ?>"  type="text" class="trade_from" /></td>
					<td style="width:34%; font-size: 13px; font-weight: 600; color: #000;"> Use: Fresh / Saltwater <input name="Fresh_Saltwater"  value="<?php echo isset($info['Fresh_Saltwater']) ? $info['Fresh_Saltwater'] : ''; ?>"  type="text" class="trade_from" style="width: 42%;"></td>
				  </tr>
				</table>
				    </td>
				  </tr>
				  </table>

				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
				  <tr>
				    <td style="width:100%; background: #ccc; height: 5px; border-top: solid 1px #2F5395; border-bottom: solid 1px #333;"> </td>
				      
				  </tr>
				</table>

				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:100%; font-size: 13px; padding:5px 0; color: #000;"> Equipment / Options </td>
				  </tr>

				  <tr>
				    <td style="width:100%; font-size: 12px; padding:5px 0; color: #000;"> <strong style="font-size: 14px;"> Hull Config </strong> Hull Type/Width/ Pontoon Pkg: <input name="hull_type_width"  value="<?php echo isset($info['hull_type_width']) ? $info['hull_type_width'] : ''; ?>"  type="text" class="trade_from2" style="width: 67%;"></td>
				  </tr>

				  <tr>
				    <td style="width:100%; font-size: 12px; padding:5px 0; color: #000;"> <strong style="font-size: 14px;"> Flooring </strong> Type/Color/Pattern: <input name="flooring_type"  value="<?php echo isset($info['flooring_type']) ? $info['flooring_type'] :''; ?>"  type="text" class="trade_from" style="width: 77%;"> </td>
				  </tr>
				</table>

				     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Canvas </strong></td>
				     <td style="width:15%; font-size:11px;"> <input name="Mooring" value="Mooring" <?php echo ($info['Mooring'] == "Mooring") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  Mooring  </td>
				       <td style="width:15%; font-size:11px;">  <input name="B_C_Snap" value="B_C_Snap" <?php echo ($info['B_C_Snap'] == "B_C_Snap") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> B/C Snap </td>
				     <td style="width:15%; font-size:11px;">  <input name="Bimini" value="Bimini" <?php echo ($info['Bimini'] == "Bimini") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Bimini </td>
				    <td style="width:15%; font-size:11px;">  <input name="Enclosure" value="Enclosure" <?php echo ($info['Enclosure'] == "Enclosure") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Enclosure </td>
				      <td style="width:25%; font-size:11px;">  <input name="Other_data" value="New" <?php echo ($info['Other_data'] == "Other_data") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Other:  <input name="Other_data_input"  value="<?php echo isset($info['Other_data_input']) ? $info['Other_data_input'] : ''; ?>"  type="text" class="trade_from2" style="width: 68%;"></td>
					</tr>
				      </table>

				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Lighting </strong> </td>
				     <td style="width:15%; font-size:11px;">  <input name="AnchLTPole" value="AnchLTPole" <?php echo ($info['AnchLTPole'] == "AnchLTPole") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  Anch LT Pole </td>
				       <td style="width:15%; font-size:11px;">  <input name="AnchTWRIntgrtd" value="AnchTWRIntgrtd" <?php echo ($info['AnchTWRIntgrtd'] == "AnchTWRIntgrtd") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Anch TWR Intgrtd </td>
				     <td style="width:15%; font-size:11px;"> <input name="UnderwaterLED" value="UnderwaterLED" <?php echo ($info['UnderwaterLED'] == "UnderwaterLED") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Underwater LED  </td>
				    <td style="width:15%; font-size:11px;">  <input name="ExteriorLTS_LED" value="ExteriorLTS_LED" <?php echo ($info['ExteriorLTS_LED'] == "ExteriorLTS_LED") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Exterior LTS/LED </td>
				      <td style="width:25%; font-size:11px;"> <input name="TowerLights" value="TowerLights" <?php echo ($info['TowerLights'] == "TowerLights") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Tower Lights  </td>
					</tr>
				      </table>
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="CupholderLED" value="CupholderLED" <?php echo ($info['CupholderLED'] == "CupholderLED") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  Cupholder LED  </td>
				       <td style="width:15%; font-size:11px;"> <input name="InteriorLightsd" value="InteriorLightsd" <?php echo ($info['InteriorLightsd'] == "InteriorLightsd") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Interior Lightsd  </td>
				     <td style="width:15%; font-size:11px;"> <input name="UDeckLED" value="UDeckLED" <?php echo ($info['UDeckLED'] == "UDeckLED") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> U.Deck LED </td>
				    <td style="width:15%; font-size:11px;">  <input name="RemoteSpot" value="RemoteSpot" <?php echo ($info['RemoteSpot'] == "RemoteSpot") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Remote Spot </td>
				      <td style="width:25%; font-size:11px;">  <input name="DockingLights" value="DockingLights" <?php echo ($info['DockingLights'] == "DockingLights") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Docking Lights </td>
					</tr>
				      </table>
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> ELECTRONICS </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="Fish_Depth" value="Fish_Depth" <?php echo ($info['Fish_Depth'] == "Fish_Depth") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Fish/Depth  </td>
				       <td style="width:15%; font-size:11px;">  <input name="Chartplotter" value="Chartplotter" <?php echo ($info['Chartplotter'] == "Chartplotter") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Chartplotter </td>
				     <td style="width:15%; font-size:11px;"> <input name="UWaterCam" value="UWaterCam" <?php echo ($info['UWaterCam'] == "UWaterCam") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> U. Water Cam  </td>
				    <td style="width:15%; font-size:11px;">  <input name="RearCam" value="RearCam" <?php echo ($info['RearCam'] == "RearCam") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Rear Cam </td>
				      <td style="width:15%; font-size:11px;"> <input name="DigitalDash" value="DigitalDash" <?php echo ($info['DigitalDash'] == "DigitalDash") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Digital Dash  </td>
					<td style="width:10%; font-size:11px;"> <input name="Windlass" value="Windlass" <?php echo ($info['Windlass'] == "Windlass") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Windlass  </td>
					</tr>
				      </table>
				 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> </strong>  </td>
				     <td style="width:25%; font-size:11px;"> <input name="AM_FM_BT_USB_LI_WB_CD" value="AM_FM_BT_USB_LI_WB_CD" <?php echo ($info['AM_FM_BT_USB_LI_WB_CD'] == "AM_FM_BT_USB_LI_WB_CD") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  AM/FM/BT/USB/LI/WB/CD  </td>
				       <td style="width:15%; font-size:11px;"> <input name="Speakers" value="Speakers" <?php echo ($info['Speakers'] == "Speakers") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> #Speakers  </td>
				     <td style="width:15%; font-size:11px;"> <input name="TowerSpkrs" value="TowerSpkrs" <?php echo ($info['TowerSpkrs'] == "TowerSpkrs") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Tower Spkrs  </td>
				    <td style="width:15%; font-size:11px;"> <input name="Sub" value="Sub" <?php echo ($info['Sub'] == "Sub") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Sub  </td>
				      <td style="width:15%; font-size:11px;"> <input name="Amps" value="Amps" <?php echo ($info['Amps'] == "Amps") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Amps  </td>
					</tr>
				      </table>

				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> </strong>  </td>
				     <td style="width:10%; font-size:11px;"> <input name="TV1" value="TV1" <?php echo ($info['TV1'] == "TV1") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  TV1 </td>
				       <td style="width:10%; font-size:11px;"> <input name="TV2" value="TV2" <?php echo ($info['TV2'] == "TV2") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> TV2  </td>
				     <td style="width:10%; font-size:11px;"> <input name="SatTV" value="SatTV" <?php echo ($info['SatTV'] == "SatTV") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Sat TV  </td>
				    <td style="width:15%; font-size:11px;"> <input name="UHF_VHF_Radio" value="UHF_VHF_Radio" <?php echo ($info['UHF_VHF_Radio'] == "UHF_VHF_Radio") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> UHF/VHF Radio </td>
				      <td style="width:10%; font-size:11px;"> <input name="Radar" value="Radar" <?php echo ($info['Radar'] == "Radar") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Radar  </td>
				      <td style="width:10%; font-size:11px;"> <input name="A_C" value="A_C" <?php echo ($info['A_C'] == "A_C") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> A/C </td>
				      <td style="width:10%; font-size:11px;"> <input name="Heat" value="Heat" <?php echo ($info['Heat'] == "Heat") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Heat  </td>
				      <td style="width:10%; font-size:11px;">  other <input name="other_heat_data"  value="<?php echo isset($info['other_heat_data']) ? $info['other_heat_data'] : ""; ?>"  type="text" class="trade_from2" /> </td>
					</tr>
				      </table>

				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Ballast </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="HardTanks" value="HardTanks" <?php echo ($info['HardTanks'] == "HardTanks") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  # Hard Tanks  </td>
				       <td style="width:10%; font-size:11px;"> <input name="Bags" value="Bags" <?php echo ($info['Bags'] == "Bags") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> # Bags  </td>
				     <td style="width:15%; font-size:11px;"> <input name="Pumps" value="Pumps" <?php echo ($info['Pumps'] == "Pumps") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> # Pumps  </td>
				    <td style="width:15%; font-size:11px;"> <input name="FullyPlumbed" value="FullyPlumbed" <?php echo ($info['FullyPlumbed'] == "FullyPlumbed") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Fully Plumbed </td>
				      <td style="width:15%; font-size:11px;"> <input name="PartiallyPlumbed " value="PartiallyPlumbed" <?php echo ($info['PartiallyPlumbed'] == "PartiallyPlumbed") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Partially Plumbed </td>
				      <td style="width:15%; font-size:11px;"> <input name="RiderProfiles" value="Rider Profiles" <?php echo ($info['RiderProfiles'] == "Rider Profiles") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Rider Profiles </td>
					</tr>
				      </table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Sports </strong>  </td>
				     <td style="width:20%; font-size:11px;"> <input name="SkiPylon" value="SkiPylon" <?php echo ($info['SkiPylon'] == "SkiPylon") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" />  Ski Pylon  </td>
				     <td style="width:15%; font-size:11px;"> <input name="WakeboardTower" value="WakeboardTower" <?php echo ($info['WakeboardTower'] == "WakeboardTower") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Wakeboard Tower </td>
				    <td style="width:20%; font-size:11px;"> <input name="Folding" value="Folding" <?php echo ($info['Folding'] == "Folding") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Folding </td
					>
				      <td style="width:15%; font-size:11px;"> <input name="Power" value="Power" <?php echo ($info['Power'] == "Power") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Power </td>
				      <td style="width:15%; font-size:11px;"> <input name="Cable_Strut_Assist" value="Cable_Strut_Assist" <?php echo ($info['Cable_Strut_Assist'] == "Cable_Strut_Assist") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Cable/Strut Assist </td>
					</tr>
				      </table>
				      
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;">  </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="TurboSwing" value="TurboSwing" <?php echo ($info['TurboSwing'] == "TurboSwing") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Turbo Swing  </td>
				     <td style="width:15%; font-size:11px;"> <input name="Ladder" value="Ladder" <?php echo ($info['Ladder'] == "Ladder") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Ladder </td>
				    <td style="width:15%; font-size:11px;"> <input name="SurfSystem" value="SurfSystem" <?php echo ($info['SurfSystem'] == "SurfSystem") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Surf System </td>
				      <td style="width:40%; font-size:11px;"> <input name="Other_surf_data" value="Other_surf_data" <?php echo ($info['Other_surf_data'] == "Other_surf_data") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Other <input name="Other_surf_data_input"  value="<?php echo isset($info['Other_surf_data_input']) ? $info['Other_surf_data_input'] : ""; ?>"  type="text" class="trade_from" style="width: 77%;"> </td>
					</tr>
				      </table>
				      
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Fishing </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="RodHolders" value="RodHolders" <?php echo ($info['RodHolders'] == "RodHolders") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> #Rod Holders  </td>
				     <td style="width:15%; font-size:11px;"> <input name="Downriggers" value="Downriggers" <?php echo ($info['Downriggers'] == "Downriggers") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Downriggers </td>
				    <td style="width:15%; font-size:11px;"> <input name="TrollingMtr" value="TrollingMtr" <?php echo ($info['TrollingMtr'] == "TrollingMtr") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Trolling Mtr </td>
				      <td style="width:40%; font-size:11px;"> YR/MK/MDL: <input name="YR_MK_MDL"  value="<?php echo isset($info['YR_MK_MDL']) ? $info['YR_MK_MDL'] : ''; ?>"  type="text" class="trade_from" style="width: 73%;"> </td>
					</tr>
				      </table>
				      
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Other </strong>  </td>
				     <td style="width:15%; font-size:11px;"> <input name="Privacy" value="Privacy" <?php echo ($info['Privacy'] == "Privacy") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Privacy  </td>
				     <td style="width:15%; font-size:11px;"> <input name="HeadCompartment" value="HeadCompartment" <?php echo ($info['HeadCompartment'] == "HeadCompartment") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Head Compartment </td>
				    <td style="width:15%; font-size:11px;">  Head Type: <input name="HeadType"  value="<?php echo isset($info['HeadType']) ? $info['HeadType'] :''; ?>"  type="text" class="trade_from2" style="width: 40%;"> </td>
				      <td style="width:20%; font-size:11px;"> <input name="Shower" value="Shower" <?php echo ($info['Shower'] == "Shower") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Shower </td>
				      <td style="width:20%; font-size:11px;"> Other: <input name="fishing_data"  value="<?php echo isset($info['fishing_data']) ? $info['fishing_data'] : ''; ?>"  type="text" class="trade_from2" style="width: 66%;">  </td>
					</tr>
				      </table>
				      
				     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:100%; background: #2E3069; height: 4px; border-top: solid 1px #333; border-bottom: solid 1px #333;"> </td>
				      
				  </tr>
				</table> 

				   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Drive </strong>  </td>
				     <td style="width:10%; font-size:11px;"> <input name="I_O" value="I_O" <?php echo ($info['I_O'] == "I_O") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> I/O  </td>
				     <td style="width:10%; font-size:11px;"> <input name="Jet" value="Jet" <?php echo ($info['Jet'] == "Jet") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Jet </td>
				    <td style="width:10%; font-size:11px;">  <input name="O_B" value="O_B" <?php echo ($info['O_B'] == "O_B") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> O/B </td>
				      <td style="width:15%; font-size:11px;"> <input name="Dual_I_O" value="Dual_I_O" <?php echo ($info['Dual_I_O'] == "Dual_I_O") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Dual I/O </td>
				      <td style="width:10%; font-size:11px;"> <input name="V-Drive" value="V-Drive" <?php echo ($info['V-Drive'] == "V-Drive") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> V-Drive</td>
				      <td style="width:10%; font-size:11px;"> <input name="D-Drive" value="D-Drive" <?php echo ($info['D-Drive'] == "D-Drive") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> D-Drive</td>
				      <td style="width:10%; font-size:11px;"> <input name="R-Drive" value="R-Drive" <?php echo ($info['R-Drive'] == "R-Drive") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> R-Drive</td>
				       <td style="width:10%; font-size:11px;"> <input name="DTS" value="DTS" <?php echo ($info['DTS'] == "DTS") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> DTS </td>
					</tr>
				      </table> 
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;"> Power </strong>  </td>
				     <td style="width:25%; font-size:11px;"> <input name="Main" value="Main" <?php echo ($info['Main'] == "Main") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Main: <input name="Main_input"  value="<?php echo isset($info['Main_input']) ? $info['Main_input'] : ''; ?>"  type="text" class="trade_from2" />  </td>
				     <td style="width:30%; font-size:11px;"> Drive Brand/Model: <input name="Drive_Brand_Model"  value="<?php echo isset($info['Drive_Brand_Model']) ? $info['Drive_Brand_Model'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				    <td style="width:15%; font-size:11px;">  S/N: <input name="S_N"  value="<?php echo isset($info['S_N']) ? $info['S_N'] : ''; ?>"  type="text" class="trade_from2" /></td>
				      <td style="width:15%; font-size:11px;"> <input name="Axius" value="Axius" <?php echo ($info['Axius'] == "Axius") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Axius </td>
				      
					</tr>
				      </table> 
				      
				      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;">  </strong>  </td>
				     <td style="width:25%; font-size:11px;"> <input name="Secondary" value="Secondary" <?php echo ($info['Secondary'] == "Secondary") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Secondary: <input name="Secondary_input"  value="<?php echo isset($info['Secondary_input']) ? $info['Secondary_input'] : ''; ?>"  type="text" class="trade_from2" />  </td>
				     <td style="width:30%; font-size:11px;"> Drive Brand/Model: <input name="Secondary_Drive_Brand"  value="<?php echo isset($info['Secondary_Drive_Brand']) ? $info['Secondary_Drive_Brand'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				    <td style="width:15%; font-size:11px;">  S/N: <input name="secondary_S_N"  value="<?php echo isset($info['secondary_S_N']) ? $info['secondary_S_N'] : ''; ?>"  type="text" class="trade_from2" /></td>
				      <td style="width:15%; font-size:11px;"> <input name="Secondary_Skyhook" value="Secondary_Skyhook" <?php echo ($info['Secondary_Skyhook'] == "Secondary_Skyhook") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Skyhook </td>
				      
					</tr>
				      </table> 
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:15%; font-size:11px;"><strong style="font-size:13px;">  </strong>  </td>
				     <td style="width:25%; font-size:11px;"> <input name="Tiller_Trolling" value="Tiller_Trolling" <?php echo ($info['Tiller_Trolling'] == "Tiller_Trolling") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Tiller/Trolling: <input name="Tiller_Trolling_input"  value="<?php echo isset($info['Tiller_Trolling_input']) ? $info['Tiller_Trolling_input'] : ''; ?>"  type="text" class="trade_from2" />  </td>
				     <td style="width:30%; font-size:11px;"> Drive Brand/Model <input name="Tiller_DriveBrand"  value="<?php echo isset($info['Tiller_DriveBrand']) ? $info['Tiller_DriveBrand'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				    <td style="width:15%; font-size:11px;">  Generator: <input name="Generator"  value="<?php echo isset($info['Generator']) ? $info['Generator'] : ''; ?>"  type="text" class="trade_from2" style="width: 46%;"></td>
				      <td style="width:15%; font-size:11px;"> <input name="tiller_Skyhook" value="tiller_Skyhook" <?php echo ($info['tiller_Skyhook'] == "tiller_Skyhook") ? "checked" : ""; ?>  type="checkbox" class="trade_from3" /> Skyhook </td>
				      
					</tr>
				      </table>
				      
				      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				  <tr>
				    <td style="width:100%; background: #2E306A; height: 4px; border-top: solid 1px #333; border-bottom: solid 1px #333;"> </td>
				      
				  </tr>
				</table> 

				     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:100%; font-size:13px; vertical-align:top;"> Cosmetic Condition / Remarks  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition1"  value="<?php echo isset($info['CosmeticCondition1']) ? $info['CosmeticCondition1'] : ''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition2"  value="<?php echo isset($info['CosmeticCondition2']) ? $info['CosmeticCondition2'] :''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition3"  value="<?php echo isset($info['CosmeticCondition3']) ? $info['CosmeticCondition3'] : ''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
				      </table>
				      
				      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:100%; font-size:13px; vertical-align:top;"> Cosmetic Condition / Remarks  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition11"  value="<?php echo isset($info['CosmeticCondition11']) ? $info['CosmeticCondition11'] : ''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition21"  value="<?php echo isset($info['CosmeticCondition21']) ? $info['CosmeticCondition21'] : ''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
					
					 <tr>
				      <td style="width:100%; font-size:13px; "> <input name="CosmeticCondition31"  value="<?php echo isset($info['CosmeticCondition31']) ? $info['CosmeticCondition31'] : ''; ?>"  type="text" class="trade_from4" />  </td> 
					</tr>
				      </table>
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:33%; font-size:13px;">  Salesperon Signature:<input name="SalesperonSignature"  value="<?php echo isset($info['SalesperonSignature']) ? $info['SalesperonSignature'] :''; ?>"  type="text" class="trade_from2" style="width: 40%;"> </td>
				     <td style="width:34%; font-size:13px;"> Entered Online By: <input name="EnteredOnlineBy"  value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city']; ?>"  type="text" class="trade_from2" /> </td>
				    <td style="width:33%; font-size:13px;">  Date: <input name="SalesperonSignaturedate"  value="<?php echo isset($info['SalesperonSignaturedate']) ? $info['SalesperonSignaturedate'] :''; ?>"  type="text" class="trade_from2" /></td>
					</tr>
				      </table>
				      
				       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
				      <tr>
				      <td style="width:33%; font-size:13px;"> New Stock #:<input name="NewStock"  value="<?php echo isset($info['NewStock']) ? $info['NewStock'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				     <td style="width:34%; font-size:13px;"> Photos By: <input name="PhotosBy"  value="<?php echo isset($info['PhotosBy']) ? $info['PhotosBy'] : ''; ?>"  type="text" class="trade_from2" /> </td>
				    <td style="width:33%; font-size:13px;">  Date: <input name="NewStockdate"  value="<?php echo isset($info['NewStockdate']) ? $info['NewStockdate'] : ''; ?>"  type="text" class="trade_from2" /></td>
					</tr>
				      </table>    
			</div>
	</div></div>
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
	
	
	 function convertFormatedMoney (money){
			return money
				  .replace(/\D/g, "")
				  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
				  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
    }
	
	$('input.currency').on('keyup',function(){
		
		if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
		
        $(this).val(function(index, value) {
			value = value.replace(/^0+/, "");
            return convertFormatedMoney(value);
        });
	});
	
	$(".price_set , .additional").on('keyup',function(){
		
		var valdata = 0;
		//$( ".labor" ).each(function( index ) {			
			var price = $(this).val();	
			price = price.replace(/,/g, '');
			var attrid = $(this).attr("id");	
			//alert(attrid);
			//console.log(attrid);
			if(price != "")
			{	
				// hours1
				hourval = $("#hours"+attrid).val();
				hourval = hourval.replace(/,/g, '');
				
				// rate1
				rateval = $("#rate"+attrid).val();
				rateval = rateval.replace(/,/g, '');
				
				
				
				qty = $("#qty"+attrid).val();
				qty = qty.replace(/,/g, '');
				
				
				totalquality =  (qty * parseFloat(price)) + hourval * parseFloat(rateval);
				
				$("#total"+attrid).val(convertFormatedMoney(totalquality.toFixed(2)));
			}
		//});

		
	});
	
	
     
});
</script>
</div>