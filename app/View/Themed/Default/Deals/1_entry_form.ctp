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

		.entry_one{ width:90%; border-bottom:solid 1px #FF9; border-top:none; background:none; padding:3px 0; border-left:none; border-right:none; margin-left:6px;}

		.1_entry2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.1_entry3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.1_entry4{border: solid 2px #000 !important;
		-webkit-appearance: none;
		-moz-appearance: none;
		-o-appearance: none;
		appearance: none;
		width: 25px;
		height: 25px; vertical-align:middle;
		margin-right: 10px;}
		
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
	}

	
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 1  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerName </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> SOCIAL SECURITY </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"> <input name="SOCIAL_SECURITY" value="<?php echo isset($info['SOCIAL_SECURITY']) ? $info['SOCIAL_SECURITY'] : ''; ?>" type="text"  class="entry_one" /> </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 2  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerAddress1 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerAddress1" value="<?php echo isset($info['CustomerAddress1']) ? $info['CustomerAddress1'] : $info['address']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 3 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerAddress2 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerAddress2" value="<?php echo isset($info['CustomerAddress2']) ? $info['CustomerAddress2'] : $info['address']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"></td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 4 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerCity </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerCity" value="<?php echo isset($info['CustomerCity']) ? $info['CustomerCity'] : $info['city']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 5 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerState </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerState" value="<?php echo isset($info['CustomerState']) ? $info['CustomerState'] :$info['state']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 6 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerZip </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerZip" value="<?php echo isset($info['CustomerZip']) ? $info['CustomerZip'] : $info['zip']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">OHIO COUNTY </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"><input name="COUNTY" value="<?php echo isset($info['COUNTY']) ? $info['COUNTY'] : $info['county']; ?>" type="text"  class="entry_one" /> </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 7 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerHomephone </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerHomephone" value="<?php echo isset($info['CustomerHomephone']) ? $info['CustomerHomephone'] : $info['phone']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"></td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 8 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">CustomerWorkPhone </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="CustomerWorkPhone" value="<?php echo isset($info['CustomerWorkPhone']) ? $info['CustomerWorkPhone'] : $info['phone']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 9 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">Vehicle Make </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="Vehicle_Make" value="<?php echo isset($info['Vehicle_Make']) ? $info['Vehicle_Make'] : $info['make']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">  OVERTYPE IF NOT HD - THEN RE-SET TO HD </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 10 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">VehicleIdentificationNum </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="VehicleIdentificationNum" value="<?php echo isset($info['VehicleIdentificationNum']) ? $info['VehicleIdentificationNum'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 11 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">VehicleReferenceCode </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="VehicleReferenceCode" value="<?php echo isset($info['VehicleReferenceCode']) ? $info['VehicleReferenceCode'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">CATEGORY </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"> <input name="CATEGORY" value="<?php echo isset($info['CATEGORY']) ? $info['CATEGORY'] : ''; ?>" type="text"  class="entry_one" />  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 12 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">Model</td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="Model" value="<?php echo isset($info['Model']) ? $info['Model'] : $info['model']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 13 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; ">ModelYear </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="ModelYear" value="<?php echo isset($info['ModelYear']) ? $info['ModelYear'] : $info['year']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;"> cc </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"> <input name="cc" value="<?php echo isset($info['cc']) ? $info['cc'] : ''; ?>" type="text"  class="entry_one" />  </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 14 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> VehicleMileage </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="VehicleMileage" value="<?php echo isset($info['VehicleMileage']) ? $info['VehicleMileage'] : $info['odometer']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 15 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> Color </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="Color" value="<?php echo isset($info['Color']) ? $info['Color'] : $info['unit_color']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 16 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeVin </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeVin" value="<?php echo isset($info['TradeVin']) ? $info['TradeVin'] : $info['vin_trade']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 17 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeReferenceNumber </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeReferenceNumber" value="<?php echo isset($info['TradeReferenceNumber']) ? $info['TradeReferenceNumber'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				    <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 18 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeColor </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeColor" value="<?php echo isset($info['TradeColor']) ? $info['TradeColor'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				    <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 19 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeMileage </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeMileage" value="<?php echo isset($info['TradeMileage']) ? $info['TradeMileage'] : $info['odometer_trade']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 20 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> Make </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="Make" value="<?php echo isset($info['Make']) ? $info['Make'] : $info['make_trade']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;"> OVERTYPE IF NOT HD - THEN RE-SET TO HD  </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 21 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeModel </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeModel" value="<?php echo isset($info['TradeModel']) ? $info['TradeModel'] : $info['model_trade']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 22 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> TradeModelYear </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="TradeModelYear" value="<?php echo isset($info['TradeModelYear']) ? $info['TradeModelYear'] : $info['year_trade']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 23 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> Salesperson </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; background:#FF9;"> <input name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 24 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CEARFOSS, RICHARD A JR  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM14-152 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 25 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GRAYBILL, KENNETH A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-78 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 26 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HARTMANN, KATHY J  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM15-125 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 27 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HARTMANN, KATHY J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-26 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 28 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *SMITH, DAVID M SR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM12-178 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 29 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *YOUNKIN, TODD E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-79 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 30 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ABRAHAM, TYSON </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC4432 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 31 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ADKINS, DANIEL C </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM15-95 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 32 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *AKINS, DALE </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB038431 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 33 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ALEXANDER, JUSTIN </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB670493 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 34 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ALLEN, RONALD L </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-63 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 35 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ALLEN, RYAN C </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-40 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 36 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ALLMAN, ANGELA M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC435451 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 37 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *AMATO, JOSEPH A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB662245 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 38 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ANIOL, BRETT A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC019271 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 39 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BAIRD, ROBERT W </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-31 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 40 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BAKER, DENNIS E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB850156 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 41 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BAUMAN, BLAIR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-67 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 42 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BECKETT, DAVID L</td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM13-103 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 43 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BERKLEY, RANDY J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-74 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 44 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BEYER, RAYMOND J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC320834  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 45 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BISHOP, DANIEL T</td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-50 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 46 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BLACKBURN, WADE E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-66 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 47 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BLYSTONE, KELLY S </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB672185 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 48 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BROOKS, JOHN F JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB018251  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 49 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BRUCKNER, TROY S </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB953697  </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 50 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BUNN, ROBERT W </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB690338 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 51 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *BYLAND, ALLEN K JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-15 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 52 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CANTWELL, SCOTT B </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-41 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 53 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CARTER, BRENDA L </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-75 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 54 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CHEWNING, ANDREW </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-33 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 55 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CHEYNEY, OWEN K JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB608953 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 56 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CHILSON, JESSICA L </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-16 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 57 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CLENDENIN, LORI A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-36 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 58 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *COLE, DANA </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC312754 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 59 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *COLE, JAYNE M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-91 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 60 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *COLLINS, JEFFERY </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB043933 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 61 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CORNELIUS, JASON </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-33 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 62 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CORNELIUS, JASON </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-62 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 63 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CORNETT, CALVIN </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB670348 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 64 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *COX, DOUGLAS F JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB026528 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 65 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CROSKEY, KODY R </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> FC804343 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 66 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CUNNINGHAM, MICHAEL S </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB647324 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 67 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *CURRIE, WILLIAM </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM15-130 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 68 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DAVIS, ALISHA M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC439659 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				 
				 
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 69 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DAVIS, ROBERT A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-58 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 70 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DAWSON, JOSEPH A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM15-124 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 71 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DAYTON, LARRY JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB646886 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 72 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DEMO, VEHICLE </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB607636 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 73 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DEMO, VEHICLE </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB607979 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 74 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DENNIS, PAUL M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-64 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 75 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DESANTIS, EMIL S </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB670357 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 76 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DIGIACOMO, FRANK J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC321825 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 77 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *DOWDY, DAVID </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-27 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 78 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *ELSON, RAYMOND E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB025130 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 79 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FAGAN, BRUCE M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB681434 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 80 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FANIZZI, ANTONIO </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-32 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 81 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FANO, CHAD M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-35 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 82 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FELTON, STANLEY </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB654217 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 83 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FLEMING, SHERRI M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-70 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 84 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FOSTER, DONALD G </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC501759 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 85 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FRARY, DARION E</td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-43 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 86 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *FULLER, RODNEY E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB033852 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 87 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GAY, SCOTT E JR </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB039983 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 88 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GOLDEN, STEVEN E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB671383 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 89 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GOLDSMITH, ALEXANDER M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC426990 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 90 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GRAHAM, RODNEY G </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-13 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 91 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GREEN, CURTIS E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> FC403215 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 92 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GREENE, DEBORAH L </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB039056 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 93 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *GRIFFIN, CHARLES D </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB855137 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 94 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HATTON, MICHAEL J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB603817 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 95 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HAWK, TIMOTHY C </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB851241 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 96 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HEIM, SCOTT </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-57 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 97 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HENDERHAN, THOMAS </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> FC431717 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 98 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HIGLEY, SCOTT D </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB622118 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 99 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HIGLEY, SCOTT D </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB622118 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 100 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HILLEN, CHARLES T </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-38 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 101 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HOLMES, JUSTIN M </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-56 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 102 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HORNAK, JEFF </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> HB952822 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 103 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HORNER, JUSTIN J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM13-40 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 104 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HOWALD, WILLIAM A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> 0027590 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 105 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HOWALD, WILLIAM A </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> 0027590 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 106 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HULL, JAMES E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB674774 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 107 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HUNSINGER, MICHAEL G </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-29 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 108 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *HUNT, GARY E </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB681654 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 109 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *JOAQUIN, JIM </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB671115 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 110 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *JONES, DONALD </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC434986 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 111 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *KELLAM, BELO </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GB964203 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 112 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *KELLAM, MINDY M</td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-48 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 113 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *KELLY, MARK J </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> UM16-30 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 114 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *KESTER, KERRY K </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> FC320769 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				  
				   <tr>
				  <td style="width:5%; font-size:13px; padding:3px 0; "> 115 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; "> *KLEINEN, JESSE R </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; border:solid 1px #000;"> GC427028 </td>
				    <td style="width:15%; font-size:13px; padding:3px 0; text-align:center;">  </td>
				    <td style="width:50%; font-size:13px; padding:3px 0;">   </td>
				  </tr>
				</table>

				<table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
				  <tr>
				    <td style="width:30%; font-size:14px; border:solid 1px #000; padding:5px 0; text-align:center;">ENTER REF NUMBER</td>
				    <td style="width:70%; font-size:14px; border:solid 1px #000; padding:5px 0; text-align:center;">WHEN ALL ENTRIES ON ALL TABS COMPLETE</td>
				  </tr>
				</table>

				<table width="60%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:30%; font-size:14px; border:solid 1px #000; padding:15px 0; text-align:center; background:#FF0;"></td>
				    <td style="width:70%; font-size:34px; border:solid 1px #000; padding:15px 0; text-align:center;">WCtrl> Shift >P> </td>
				  </tr>
				</table>


				<table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px;">
				  <tr>
				    <td style="width:30%; font-size:14px; padding:5px 0; text-align:center;"> </td>
				    <td style="width:70%; font-size:14px; border:solid 1px #000; padding:5px 0; ">DATA  ENTRY PAGE</td>
				  </tr>
				  
				  <tr>
				    <td style="width:30%; font-size:14px; padding:5px 0; text-align:center;"> </td>
				    <td style="width:70%; font-size:14px; border:solid 1px #000; padding:5px 0;">ENTER NUMBER IN ABOVE REF </td>
				  </tr>
				  
				  <tr>
				    <td style="width:30%; font-size:14px; padding:5px 0; text-align:center;"> </td>
				    <td style="width:70%; font-size:14px; border:solid 1px #000; padding:5px 0; ">POPULATES ALL THE INFO FROM LEFT </td>
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
	
	
	
	function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\-]/g,"")
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
	$(".pricetotal").on('keyup',function(){
		
		var valdata1 = 0;
		var totalcount = 0;
		$( ".pricetotal" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			if(totalcount != "")
			{
				valdata1 = valdata1 + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);total_service_val
		
		$("#total_data").val(convertFormatedMoney(valdata1.toFixed(2)));
	});
	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
