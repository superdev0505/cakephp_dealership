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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>
		body{ margin:0 5%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.trade_in_from{ width:70%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.trade_in_from2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.trade_in_from3 {
			    width: 18px;
		    height: 18px; vertical-align:middle;
		    margin-right: 10px;
		}
		
		@media print
		{
			#worksheet_container{
			
				height:100% !important;
				width:1000px !important;
			}
		
		}

		.trade_in_from4{ width:30%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.trade_in_from5{ width:20%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.trade_in_from6{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
						
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="text-align:center;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/scan-one.png'); ?>" /></td>
						<td style="width:60%; font-size:40px; font-style:italic; font-weight:600;">TRADE-IN APPRAISAL</td>
					  </tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:70%;"> Customer Name: <input  name="customer_name_data"  value="<?php echo isset($info['customer_name_data']) ? $info['customer_name_data'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="trade_in_from" /></td>
					    <td style="width:30%;"> Salesperson <input  name="saleperson_name"  value="<?php echo isset($info['saleperson_name']) ? $info['saleperson_name'] :  $info['sperson']; ?>"  type="text" class="trade_in_from2" /> </td>
					 </td> 
					</table>


					 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:70%;"> 
					    
					    <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;">City/State <input  name="city_state_name"  value="<?php echo isset($info['city_state_name']) ? $info['city_state_name'] :  $info['city']; ?>"  type="text" class="trade_in_from" />  </td>
					    <td style="width:50%;">Phone <input  name="phone_name"  value="<?php echo isset($info['phone_name']) ? $info['phone_name'] :  $info['phone']; ?>"  type="text" class="trade_in_from" />  </td>
					  </tr>
					</table>

					  </td>
					    <td style="width:30%;"> Lic Plate# <input  name="lic_plate"  value="<?php echo isset($info['lic_plate']) ? $info['lic_plate'] :  ''; ?>"  type="text" class="trade_in_from2" /> </td>
					 </td> 
					</table>

					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:50%;"> 
					    
					    <table width="90%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:20%;"> Year <input  name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] :  $info['year_trade']; ?>"  type="text" class="trade_in_from" style="width:30% !important;"/>  </td>
					    <td style="width:30%;"> Make <input  name="make_data"  value="<?php echo isset($info['make_data']) ? $info['make_data'] :  $info['make_trade']; ?>"  type="text" class="trade_in_from" />  </td>
					     <td style="width:30%;"> Model <input  name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :  $info['model_trade']; ?>"  type="text" class="trade_in_from" />  </td>
					      <td style="width:20%;"> Color <input  name="color_data"  value="<?php echo isset($info['color_data']) ? $info['color_data'] :  ''; ?>"  type="text" class="trade_in_from2" />  </td>
					  </tr>
					</table>

					  </td>
					    <td style="width:20%;"> EXACT Mileage <input  name="exact_mileage"  value="<?php echo isset($info['exact_mileage']) ? $info['exact_mileage'] :  $info['odometer_trade']; ?>"  type="text" class="trade_in_from2" /> </td>
					 </td> 
					</table>

					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:70%;"> 
					    
					    <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> VIN: <input  name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] :  $info['vin_trade']; ?>"  type="text" class="trade_in_from" />  </td>
					    <td style="width:50%;"> Engine # <input  name="engine_data"  value="<?php echo isset($info['engine_data']) ? $info['engine_data'] :  $info['engine_trade']; ?>"  type="text" class="trade_in_from" />  </td>
					    
					  </tr>
					</table>

					  </td>
					    <td style="width:30%;">Bought Here:Y N<span style="padding-left:12px;">Service Here:Y N </span> </td>
					 </td> 
					</table>

					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:100%;"> Factory Options / Standard Equipment: </td>
					  </tr>
					</table>

					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:40%; padding-left:70px;"> <input  name="key12"  value="key12" <?php echo ($info['key12'] == "key12") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />  Keys: 1 2 </td>
					     <td style="width:20%;"> <input  name="Securityfab12"  value="Securityfab12" <?php echo ($info['Securityfab12'] == "Securityfab12") ? "checked" :  ''; ?>   type="checkbox"  class="trade_in_from3" />  Security Fobs 1 2 </td>
					      <td style="width:20%;"> <input  name="ABSBrakes"  value="ABSBrakes" <?php echo ($info['ABSBrakes'] == "ABSBrakes") ? "checked" :  ''; ?>   type="checkbox"  class="trade_in_from3" />  ABS Brakes </td>
					       <td style="width:20%;"> <input  name="CruiseControl"  value="CruiseControl" <?php echo ($info['CruiseControl'] == "CruiseControl") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Cruise Control </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:40%; padding-left:70px;"> <input  name="wheel_laced_smooth"  value="wheel_laced_smooth" <?php echo ($info['wheel_laced_smooth'] == "wheel_laced_smooth") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Wheels Cast / Laced / Smooth </td>
					     <td style="width:40%;"> <input  name="engineci"  value="engineci" <?php echo ($info['engineci'] == "engineci") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Engine ______CI </td>
					      <td style="width:20%;"> <input  name="owner_manual"  value="owner_manual" <?php echo ($info['owner_manual'] == "owner_manual") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Owner’s Manual </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:40%; padding-left:70px;"> <input  name="Saddlebag_Liners"  value="Saddlebag_Liners" <?php echo ($info['Saddlebag_Liners'] == "Saddlebag_Liners") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Saddlebag Liners </td>
					     <td style="width:40%;"> <input  name="Headset12"  value="Headset12" <?php echo ($info['Headset12'] == "Headset12") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Headset 1 2 </td>
					      <td style="width:20%;"> <input  name=" Cover"  value="Cover" <?php echo ($info['Cover'] == "Cover") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Cover </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					</table>

					    
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:100%;"> Customizations (P&A and After Market ONLY - NOT Factory Options or Standard Equipment): </td>
					  </tr>
					</table>

					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="Wheelsdata"  value="Wheelsdata" <?php echo ($info['Wheelsdata'] == "Wheelsdata") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Wheels <input  name="wheelinput"  value="<?php echo isset($info['exact_mileage']) ? $info['exact_mileage'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="Passengerdata"  value="Passengerdata" <?php echo ($info['Passengerdata'] == "Passengerdata") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Passenger Backrest - Detachable Y N </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="ChromeForks"  value="ChromeForks" <?php echo ($info['ChromeForks'] == "ChromeForks") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Chrome Forks <input  name="rider_printed_name"  value="<?php echo isset($info['exact_mileage']) ? $info['exact_mileage'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="LuggageRack"  value="LuggageRack" <?php echo ($info['LuggageRack'] == "LuggageRack") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Luggage Rack – Detachable Y N </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="Seat"  value="Seat" <?php echo ($info['Seat'] == "Seat") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Seat <input  name="Seat_input"  value="<?php echo isset($info['Seat_input']) ? $info['Seat_input'] :  ''; ?>"   type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="Saddlebags"  value="Saddlebags" <?php echo ($info['Saddlebags'] == "Saddlebags") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Saddlebags <input  name="Saddlebags_input"  value="<?php echo isset($info['Saddlebags_input']) ? $info['Saddlebags_input'] :  ''; ?>"   type="text" class="trade_in_from2" /></td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="EngineGuard"  value="EngineGuard" <?php echo ($info['EngineGuard'] == "EngineGuard") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Engine Guard <input  name="EngineGuard_input"  value="<?php echo isset($info['EngineGuard_input']) ? $info['EngineGuard_input'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="SaddleBagGuards"  value="SaddleBagGuards" <?php echo ($info['SaddleBagGuards'] == "SaddleBagGuards") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Saddle Bag Guards <input  name="SaddleBagGuards_input" value="<?php echo isset($info['SaddleBagGuards_input']) ? $info['SaddleBagGuards_input'] :  ''; ?>"   type="text" class="trade_in_from2" /></td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="HighwayPegs"  value="HighwayPegs" <?php echo ($info['HighwayPegs'] == "HighwayPegs") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Highway Pegs <input  name="HighwayPegs_input"  value="<?php echo isset($info['HighwayPegs_input']) ? $info['HighwayPegs_input'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="Suspension"  value="Suspension" <?php echo ($info['Suspension'] == "Suspension") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Suspension <input  name="Suspension_input"  value="<?php echo isset($info['Suspension_input']) ? $info['Suspension_input'] :  ''; ?>"    type="text" class="trade_in_from4" /> Lowered: Front Rear</td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="Windshield"  value="Windshield" <?php echo ($info['Windshield'] == "Windshield") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Windshield - Detachable Y N  </td>
					     <td style="width:40%;"> <input  name="RaceTuner"  value="RaceTuner" <?php echo ($info['RaceTuner'] == "RaceTuner") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Race Tuner / Download <input  name="RaceTuner_input"  value="<?php echo isset($info['RaceTuner_input']) ? $info['RaceTuner_input'] :  ''; ?>"    type="text" class="trade_in_from4" /> </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="Grips"  value="Grips" <?php echo ($info['Grips'] == "Grips") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Grips <input  name="Grips_input"  value="<?php echo isset($info['Grips_input']) ? $info['Grips_input'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="BigBore"  value="BigBore" <?php echo ($info['BigBore'] == "BigBore") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Big Bore <input  name="Big_Bore_input"  value="<?php echo isset($info['Big_Bore_input']) ? $info['Big_Bore_input'] :  ''; ?>"   type="text" class="trade_in_from2" /> </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="SwitchHousings"  value="SwitchHousings" <?php echo ($info['SwitchHousings'] == "SwitchHousings") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Switch Housings <input  name="SwitchHousings_input"  value="<?php echo isset($info['SwitchHousings_input']) ? $info['SwitchHousings_input'] :  ''; ?>"    type="text" class="trade_in_from2" /> </td>
					     <td style="width:40%;"> <input  name="Cams"  value="Cams" <?php echo ($info['Cams'] == "Cams") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Cams <input  name="Cams_input"  value="<?php echo isset($info['Cams_input']) ? $info['Cams_input'] :  ''; ?>"   type="text" class="trade_in_from2" /></td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="Stereo_Speakers_Amp"  value="Stereo_Speakers_Amp" <?php echo ($info['Stereo_Speakers_Amp'] == "Stereo_Speakers_Amp") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Stereo/Speakers/Amp <input  name="Stereo_Speakers_Amp_input"  value="<?php echo isset($info['Stereo_Speakers_Amp_input']) ? $info['Stereo_Speakers_Amp_input'] :  ''; ?>"   type="text" class="trade_in_from4" /> </td>
					     <td style="width:40%;"> <input  name="Airbox_Conversion"  value="Airbox_Conversion" <?php echo ($info['Airbox_Conversion'] == "Airbox_Conversion") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Air box / Conversion <input  name="Airbox_Conversion_input"  value="<?php echo isset($info['Airbox_Conversion_input']) ? $info['Airbox_Conversion_input'] :  ''; ?>"    type="text" class="trade_in_from4" /> </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  <tr>
					    <td> 
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="DriversBackrest"  value="DriversBackrest" <?php echo ($info['DriversBackrest'] == "DriversBackrest") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Drivers Backrest – Detachable Y N  </td>
					     <td style="width:40%;"> <input  name="Exhaust"  value="Exhaust" <?php echo ($info['Exhaust'] == "Exhaust") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" /> Exhaust <input  name="Exhaust_input"   value="<?php echo isset($info['Exhaust_input']) ? $info['Exhaust_input'] :  ''; ?>"    type="text" class="trade_in_from" /> </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					</table>


					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:100%;"> Condition: </td>
					  </tr>
					</table>

					   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="FrontTire"  value="FrontTire" <?php echo ($info['FrontTire'] == "FrontTire") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Front Tire <input  name="FrontTire_input"  value="<?php echo isset($info['FrontTire_input']) ? $info['FrontTire_input'] :  ''; ?>"   type="text" class="trade_in_from5" /> 32 Replace – Y N</td>
					     <td style="width:40%;"> <input  name="paint"  value="paint" <?php echo ($info['paint'] == "paint") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Paint <input  name="paint_input" value="<?php echo isset($info['paint_input']) ? $info['paint_input'] :  ''; ?>"   type="text" class="trade_in_from5" /> Custom Y N </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> <input  name="RearTire"  value="RearTire" <?php echo ($info['RearTire'] == "RearTire") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Rear Tire <input  name="RearTire_input"  value="<?php echo isset($info['RearTire_input']) ? $info['RearTire_input'] :  ''; ?>"   type="text" class="trade_in_from5" /> 32 Replace – Y N</td>
					     <td style="width:40%;"> <input  name="rider_printed_name"  value="key12" <?php echo ($info['key12'] == "key12") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Saddlebags <input  name="rider_printed_name"  value="<?php echo isset($info['FrontTire_input']) ? $info['FrontTire_input'] :  ''; ?>"   type="text" class="trade_in_from2" />  </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					   <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;">
					    <input  name="Brakes–Front1"  value="Brakes–Front1" <?php echo ($info['Brakes–Front1'] == "Brakes–Front1") ? "checked" :  ''; ?>    type="checkbox"  class="trade_in_from3" />  Brakes – Front 
					    <input  name="Rear_input"  value="<?php echo isset($info['Rear_input']) ? $info['Rear_input'] :  ''; ?>"   type="text" class="trade_in_from5" /> Rear 
					    <input  name="Rear_input1" value="<?php echo isset($info['Rear_input1']) ? $info['Rear_input1'] :  ''; ?>"    type="text" class="trade_in_from5" /> </td>
					     
					     <td style="width:40%;"> <input  name="Exhau_condition"   value="Exhau_condition" <?php echo ($info['Exhau_condition'] == "Exhau_condition") ? "checked" :  ''; ?>  type="checkbox"  class="trade_in_from3" />  Exhaust <input  name="rider_printed_name"  value="<?php echo isset($info['FrontTire_input']) ? $info['FrontTire_input'] :  ''; ?>"   type="text" class="trade_in_from2" />  </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  
					  <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:65%; padding-left:70px;">  Leaks: Shift Shaft <input  name="ShiftShaft"   value="<?php echo isset($info['ShiftShaft']) ? $info['ShiftShaft'] :  ''; ?>"  type="text" class="trade_in_from5" />
					    Rocker Boxes <input  name="RockerBoxes" value="<?php echo isset($info['RockerBoxes']) ? $info['RockerBoxes'] :  ''; ?>"    type="text" class="trade_in_from4" /> </td>
					     <td style="width:35%;">   Stator Plug <input  name="StatorPlug"  value="<?php echo isset($info['StatorPlug']) ? $info['StatorPlug'] :  ''; ?>"   type="text" class="trade_in_from2" />  </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					  <tr>
					    <td> 
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:60%; padding-left:70px;"> Last Oil Change / Servicet <input  name="LastOilChange"  value="<?php echo isset($info['LastOilChange']) ? $info['LastOilChange'] :  ''; ?>"   type="text" class="trade_in_from2" />  </td>
					     <td style="width:40%;"> Cam Chains (1999-2006) When <input  name="CamChains" value="<?php echo isset($info['CamChains']) ? $info['CamChains'] :  ''; ?>"    type="text" class="trade_in_from4" />  </td>
					  </tr>
					</table>
					     </td>
					  </tr>
					  
					</table>


					  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:100%;"> Additional Info: <input  name="AdditionalInfo"  value="<?php echo isset($info['AdditionalInfo']) ? $info['AdditionalInfo'] :  ''; ?>"    type="text" class="trade_in_from6" /> </td>
					  </tr>
					</table>
					  
					  
					  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					  <tr>
					    <td style="width:40%; background:#999;">
					    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:70%;"> Purchase Appraised By: <input  name="PurchaseAppraisedBy"   value="<?php echo isset($info['PurchaseAppraisedBy']) ? $info['PurchaseAppraisedBy'] :  ''; ?>"  type="text" class="trade_in_from4" /> </td>
					    <td style="width:30%;"> Date: <input  name="date_input"   value="<?php echo isset($info['date_input']) ? $info['date_input'] :  ''; ?>"   type="text" class="trade_in_from2" /> </td>
					  </tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:70%; text-align:right;"> KBB Trade Allowance </td>
					    <td style="width:30%; ">  <input  name="KBBTradeAllowance"  value="<?php echo isset($info['KBBTradeAllowance']) ? $info['KBBTradeAllowance'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td>
					  </tr>
					</table>


					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:70%; text-align:right;"> SCHD + </td>
					    <td style="width:30%; ">  <input  name="SCHD_input1"   value="<?php echo isset($info['SCHD_input1']) ? $info['SCHD_input1'] :  ''; ?>"   type="text" class="trade_in_from6" /> </td>
					  </tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:70%; text-align:right;"> SCHD - </td>
					    <td style="width:30%; ">  <input  name="SCHD_input2"   value="<?php echo isset($info['SCHD_input2']) ? $info['SCHD_input2'] :  ''; ?>"   type="text" class="trade_in_from6" /> </td>
					  </tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:70%; text-align:right;"> SCHD Parchase Price </td>
					    <td style="width:30%; ">  <input  name="SCHDParchasePrice"  value="<?php echo isset($info['SCHDParchasePrice']) ? $info['SCHDParchasePrice'] :  ''; ?>"   type="text" class="trade_in_from6" /> </td>
					  </tr>
					</table>

					   </td>
					   
					    <td style="width:60%;">
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; padding:0 7px;">
					  <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input1data"  value="<?php echo isset($info['input1data']) ? $info['input1data'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input2data"   value="<?php echo isset($info['input2data']) ? $info['input2data'] :  ''; ?>"    type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input3data"   value="<?php echo isset($info['input3data']) ? $info['input3data'] :  ''; ?>"   type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input4data"   value="<?php echo isset($info['input4data']) ? $info['input4data'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input5data"  value="<?php echo isset($info['input5data']) ? $info['input5data'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input6data"   value="<?php echo isset($info['input6data']) ? $info['input6data'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					   <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input7data"   value="<?php echo isset($info['input7data']) ? $info['input7data'] :  ''; ?>"  type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					  <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input8data"  value="<?php echo isset($info['input8data']) ? $info['input8data'] :  ''; ?>"    type="text" class="trade_in_from6" /> </td
					  </tr>
					  
					  <tr>
					    <td style="width:100%; vertical-align:top;"> <input  name="input9data"  value="<?php echo isset($info['input9data']) ? $info['input9data'] :  ''; ?>"   type="text" class="trade_in_from6" /> </td
					  </tr>
					</table>
					     </td>
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
	
	
     
});

	
	
	
	
	
</script>
</div>
