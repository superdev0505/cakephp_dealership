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

		.trade_inf{ width:30%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.trade_inf_model{ width:70%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.trade_inf_input{ width:70%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.trade_inf_input_notes{ width:95%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		
		.trade_inf_s{ width:15%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		
		.trade_inf_s1{ width:15%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}.trade_inf1{ width:50%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.trade_inf2{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.trade_inf3 { width:95%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.trade_inf4{ width:30%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.trade_inf5{ width:15%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
		.paddingdiv{line-height:20px;}
		.trade_inf6{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		.paddingdiv{line-height:320px;}
		#worksheet_container {width:100%;}
		#worksheet_wraper {width:100%;}
		.trade_inf2{ width:65%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
		      <tr>
			<td style="font-size:20px; font-weight:600; text-align:center;"> TRADE INFORMATION </td>
		      </tr>
		    </table>

		     <table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
			<td style=" width:50%; font-size:16px; padding:5px 0;"> Customer : <input  name="Customer_Data"  value="<?php echo isset($info['Customer_Data']) ? $info['Customer_Data'] :  $info['first_name']." ".$info['last_name']; ?>"  type="text"  class="trade_inf_input" /> </td>
			<td style="  width:50%; font-size:16px; padding:5px 0;"> Allowed : <input  name="Allowed_Data"  value="<?php echo isset($info['Allowed_Data']) ? $info['Allowed_Data'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
		      </tr>
		      
		       <tr>
			<td style=" width:50%; font-size:16px; padding:5px 0;"> ACV : <input  name="ACV_Data"  value="<?php echo isset($info['ACV_Data']) ? $info['ACV_Data'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
			<td style="  width:50%; font-size:16px; padding:5px 0;"> Stock : <input  name="stock_Data"  value="<?php echo isset($info['stock_Data']) ? $info['stock_Data'] :  $info['stock_num']; ?>"  type="text"  class="trade_inf_input" /> </td>

		      </tr>
		    </table>

		     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; border:solid 1px #000;">
		      <tr>
			<td style=" width:50%; border-right:solid 1px #000;">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Year : <input  name="customer_year"  value="<?php echo isset($info['customer_year']) ? $info['customer_year'] :  $info['year_trade']; ?>"  type="text"  class="trade_inf" /></td>
		      </tr>
		      
		       <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Make : <input  name="customer_make"  value="<?php echo isset($info['customer_make']) ? $info['customer_make'] :  $info['make_trade']; ?>"    type="text"  class="trade_inf" /></td>
		      </tr>
		      
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Model : <input  name="customer_model"  value="<?php echo isset($info['customer_model']) ? $info['customer_model'] :  $info['model_trade']; ?>"    type="text"  class="trade_inf_model" /></td>

		      </tr>
		      
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> RV Type :  <input  name="rvtype_customer"  value="<?php echo isset($info['rvtype_customer']) ? $info['rvtype_customer'] :  ''; ?>"    type="text"  class="trade_inf" /></td>
		      </tr>
		      
		       <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Mileage :  <input  name="mileage_customer"  value="<?php echo isset($info['mileage_customer']) ? $info['mileage_customer'] :  $info['odometer_trade']; ?>"    type="text"  class="trade_inf" /></td>
		      </tr>
		      
		       <tr>
			<td style="font-size:16px; padding:8px 5px; border-bottom:solid 1px #000;"> Engine / Chassis :  <input  name="engine_customer"  value="<?php echo isset($info['engine_customer']) ? $info['engine_customer'] :  $info['engine']; ?>"    type="text"  class="trade_inf" /></td>
		      </tr>
		    </table>
		    </td>
		    
			 <td style=" width:50%; font-size:16px; "> 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Interior color : <input  name="interior_customer"  value="<?php echo isset($info['interior_customer']) ? $info['interior_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
		      </tr>
		      
		       <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Exterior color : <input  name="exterior_customer"  value="<?php echo isset($info['exterior_customer']) ? $info['exterior_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
		      </tr>
		      
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Vin# : <input  name="vin_customer"  value="<?php echo isset($info['vin_customer']) ? $info['vin_customer'] :  $info['vin_trade']; ?>"    type="text"  class="trade_inf1" /></td>
		      </tr>
		      
		      <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000;"> 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="font-size:16px; width:50%; padding:8px 5px;">License #: <input  name="license_customer"  value="<?php echo isset($info['license_customer']) ? $info['license_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
			    <td style="font-size:16px; width:50%; padding:8px 5px;">State <input  name="state_customer"  value="<?php echo isset($info['state_customer']) ? $info['state_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
			    </tr>
			    <tr>
			    <td style="font-size:16px; width:50%; padding:8px 5px;">Exp. Date <input  name="expdate_customer"  value="<?php echo isset($info['expdate_customer']) ? $info['expdate_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
			  </tr>
			</table>
		       </td>
		      </tr>
			      
		       <tr>
			<td style="font-size:16px; border-bottom:solid 1px #000; padding:8px 5px;"> Size : <input  name="size_customer"  value="<?php echo isset($info['size_customer']) ? $info['size_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
		      </tr>
		      
		       <tr>
			<td style="font-size:16px; padding:8px 5px; border-bottom:solid 1px #000; font-weight:600;"> Amount Owed : <input  name="amountowed_customer"  value="<?php echo isset($info['amountowed_customer']) ? $info['amountowed_customer'] :  ''; ?>"    type="text"  class="trade_inf1" /></td>
		      </tr>
		    </table>
			</td>
		      </tr>
		    </table>
		    
		    
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:40%;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:20px; font-weight:600; padding:8px 5px;"> FLOORPLAN INFORMATION</td>
			      </tr>
			      
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Bed Type: Queen <input  name="bed_type_queen"  value="<?php echo isset($info['bed_type_queen']) ? $info['bed_type_queen'] :  ''; ?>"  type="text"  class="trade_inf_s" /> King <input  name="king_data"  value="<?php echo isset($info['king_data']) ? $info['king_data'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Double <input  name="double_data"  value="<?php echo isset($info['double_data']) ? $info['double_data'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Twin <input  name="twin_data"  value="<?php echo isset($info['twin_data']) ? $info['twin_data'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Bunks <input  name="bunk_data"  value="<?php echo isset($info['bunk_data']) ? $info['bunk_data'] :  ''; ?>"  type="text"  class="trade_inf_s" /></td>
			      </tr>
			      
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Dinette Type: built-in <input  name="dinette_type"  value="<?php echo isset($info['dinette_type']) ? $info['dinette_type'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Free Standing <input  name="free_standing"  value="<?php echo isset($info['free_standing']) ? $info['free_standing'] :  ''; ?>"  type="text"  class="trade_inf_s" /></td>
			      </tr>
			      
			       <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Seating type : Sofa <input  name="seating_type"  value="<?php echo isset($info['seating_type']) ? $info['seating_type'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Swivel Rockers <input  name="swivel_rockers"  value="<?php echo isset($info['swivel_rockers']) ? $info['swivel_rockers'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Recliners <input  name="recliners"  value="<?php echo isset($info['recliners']) ? $info['recliners'] :  ''; ?>"  type="text"  class="trade_inf_s" /></td>
			      </tr>
			      
				<tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Bath type: Shower <input  name="bath_type_shower"  value="<?php echo isset($info['bath_type_shower']) ? $info['bath_type_shower'] :  ''; ?>"  type="text"  class="trade_inf_s" /> Tube <input  name="tube_data"  value="<?php echo isset($info['tube_data']) ? $info['tube_data'] :  ''; ?>"  type="text"  class="trade_inf_s" /> </td>
			      </tr>
			    </table>

			     </td>
			     
			    <td style="width:40%;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Front <input  name="bed_type_front"  value="<?php echo isset($info['bed_type_front']) ? $info['bed_type_front'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Rear <input  name="bed_type_rear"  value="<?php echo isset($info['bed_type_rear']) ? $info['bed_type_rear'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Side <input  name="bed_type_side"  value="<?php echo isset($info['bed_type_side']) ? $info['bed_type_side'] :  ''; ?>"  type="text"  class="trade_inf_s1" /></td>
			      </tr>
			      
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Front <input  name="dinette_type_front"  value="<?php echo isset($info['dinette_type_front']) ? $info['dinette_type_front'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Rear <input  name="dinette_type_rear"  value="<?php echo isset($info['dinette_type_rear']) ? $info['dinette_type_rear'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Side <input  name="dinette_type_side"  value="<?php echo isset($info['dinette_type_side']) ? $info['dinette_type_side'] :  ''; ?>"  type="text"  class="trade_inf_s1" /></td>
			      </tr>
			      
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Front <input  name="seating_type_front"  value="<?php echo isset($info['seating_type_front']) ? $info['seating_type_front'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Rear <input  name="seating_type_rear"  value="<?php echo isset($info['seating_type_rear']) ? $info['seating_type_rear'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Side <input  name="seating_type_side"  value="<?php echo isset($info['seating_type_side']) ? $info['seating_type_side'] :  ''; ?>"  type="text"  class="trade_inf_s1" /></td>
			      </tr>
			      
			      <tr>
				<td style="font-size:16px; font-weight:normal; padding:8px 5px;"> Front <input  name="seating_type_front"  value="<?php echo isset($info['seating_type_front']) ? $info['seating_type_front'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Rear <input  name="seating_type_rear"  value="<?php echo isset($info['seating_type_rear']) ? $info['seating_type_rear'] :  ''; ?>"  type="text"  class="trade_inf_s1" /> Side <input  name="seating_type_side"  value="<?php echo isset($info['seating_type_side']) ? $info['seating_type_side'] :  ''; ?>"  type="text"  class="trade_inf_s1" /></td>
			      </tr>
			    </table>

			    </td>
			  </tr>
			</table>
			<div class="paddingdiv">&nbsp;</div>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:60%; font-size:20px; font-weight:600;"> CONDITION OF TRADE </td>
			    <td style="width:40%; font-size:20px; font-weight:600;"> RATE ITEMS 1-10 </td>
			  </tr>
			  
			   <tr>
			    <td style="width:60%; padding:10px 0;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-weight:600; border-top:solid 1px #000; border-left:solid 1px #000; padding:5px 5px;"> Options: </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;"> Yes </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;"> Work </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> Notes </td>
			      </tr>
			      
			      <tr>
				<td style="width:20%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Generator/Size </td>
				 <td style="width:15%; border:solid 1px #000; padding:5px 5px;"> <input  name="generator_yes"  value="<?php echo isset($info['generator_yes']) ? $info['generator_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:15%; border:solid 1px #000; padding:5px 5px;">  <input  name="generator_work"  value="<?php echo isset($info['generator_work']) ? $info['generator_work'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;">   <input  name="generator_notes"  value="<?php echo isset($info['generator_notes']) ? $info['generator_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" /> </td>

			      </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Roof A/c </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;"><input  name="roof_yes"  value="<?php echo isset($info['roof_yes']) ? $info['roof_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" />   </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="roof_work"  value="<?php echo isset($info['roof_work']) ? $info['roof_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="roof_notes"  value="<?php echo isset($info['roof_notes']) ? $info['roof_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Dash A/c </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;"> <input  name="dash_yes"  value="<?php echo isset($info['dash_yes']) ? $info['dash_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="dash_work"  value="<?php echo isset($info['dash_work']) ? $info['dash_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="dash_notes"  value="<?php echo isset($info['dash_notes']) ? $info['dash_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Furnace </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="furnance_yes"  value="<?php echo isset($info['furnance_yes']) ? $info['furnance_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="furnance_work"  value="<?php echo isset($info['furnance_work']) ? $info['furnance_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="furnance_notes"  value="<?php echo isset($info['furnance_notes']) ? $info['furnance_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Refer </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="refer_yes"  value="<?php echo isset($info['refer_yes']) ? $info['refer_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="refer_work"  value="<?php echo isset($info['refer_work']) ? $info['refer_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="refer_notes"  value="<?php echo isset($info['refer_notes']) ? $info['refer_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Jacks </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="jacks_yes"  value="<?php echo isset($info['jacks_yes']) ? $info['jacks_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="jacks_work"  value="<?php echo isset($info['jacks_work']) ? $info['jacks_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="jacks_notes"  value="<?php echo isset($info['jacks_notes']) ? $info['jacks_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Stereo/CD/Cassette </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="stereo_yes"  value="<?php echo isset($info['stereo_yes']) ? $info['stereo_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="stereo_work"  value="<?php echo isset($info['stereo_work']) ? $info['stereo_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="stereo_notes"  value="<?php echo isset($info['stereo_notes']) ? $info['stereo_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> DVD/VCR </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="dvd_yes"  value="<?php echo isset($info['dvd_yes']) ? $info['dvd_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="dvd_work"  value="<?php echo isset($info['dvd_work']) ? $info['dvd_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="dvd_notes"  value="<?php echo isset($info['dvd_notes']) ? $info['dvd_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Awning </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="awning_yes"  value="<?php echo isset($info['awning_yes']) ? $info['awning_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="awning_work"  value="<?php echo isset($info['awning_work']) ? $info['awning_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="awning_notes"  value="<?php echo isset($info['awning_notes']) ? $info['awning_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			      </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Converter/Inverter </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="converter_yes"  value="<?php echo isset($info['converter_yes']) ? $info['converter_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="converter_work"  value="<?php echo isset($info['converter_work']) ? $info['converter_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="converter_notes"  value="<?php echo isset($info['converter_notes']) ? $info['converter_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			       </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Microwave </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="microwave_yes"  value="<?php echo isset($info['microwave_yes']) ? $info['microwave_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="microwave_work"  value="<?php echo isset($info['microwave_work']) ? $info['microwave_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="microwave_notes"  value="<?php echo isset($info['microwave_notes']) ? $info['microwave_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			       </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Oven/Convection </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="oven_yes"  value="<?php echo isset($info['oven_yes']) ? $info['oven_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="oven_work"  value="<?php echo isset($info['oven_work']) ? $info['oven_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="oven_notes"  value="<?php echo isset($info['oven_notes']) ? $info['oven_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			        </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> TV/LCD </td>
				<td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="tvlcd_yes"  value="<?php echo isset($info['tvlcd_yes']) ? $info['tvlcd_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="tvlcd_work"  value="<?php echo isset($info['tvlcd_work']) ? $info['tvlcd_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="tvlcd_notes"  value="<?php echo isset($info['tvlcd_notes']) ? $info['tvlcd_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			        </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Water/Heater </td>
				<td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="water_yes"  value="<?php echo isset($info['water_yes']) ? $info['water_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="water_work"  value="<?php echo isset($info['water_work']) ? $info['water_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="water_notes"  value="<?php echo isset($info['water_notes']) ? $info['water_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			        </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Power Air Vent(s) </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="power_yes"  value="<?php echo isset($info['power_yes']) ? $info['power_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="power_work"  value="<?php echo isset($info['power_work']) ? $info['power_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="power_notes"  value="<?php echo isset($info['power_notes']) ? $info['power_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			         </tr>
			      
			      <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Side Out (s) </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="sideout_yes"  value="<?php echo isset($info['sideout_yes']) ? $info['sideout_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="sideout_work"  value="<?php echo isset($info['sideout_work']) ? $info['sideout_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="sideout_notes"  value="<?php echo isset($info['sideout_notes']) ? $info['sideout_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			        </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Moniter Panel </td>
				 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="moniter_yes"  value="<?php echo isset($info['moniter_yes']) ? $info['moniter_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="moniter_work"  value="<?php echo isset($info['moniter_work']) ? $info['moniter_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="moniter_notes"  value="<?php echo isset($info['moniter_notes']) ? $info['moniter_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			         </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Moniter Panel </td>
					<td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="moniter1_yes"  value="<?php echo isset($info['moniter1_yes']) ? $info['moniter1_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="moniter1_work"  value="<?php echo isset($info['moniter1_work']) ? $info['moniter1_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="moniter1_notes"  value="<?php echo isset($info['moniter1_notes']) ? $info['moniter1_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			         </tr>
			      
			       <tr>
				<td style="width:30%; font-weight:normal; border-left:solid 1px #000; border-bottom:solid 1px #000; padding:5px 5px;"> Water pump </td>
			 <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="water_yes"  value="<?php echo isset($info['water_yes']) ? $info['water_yes'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				  <td style="width:10%; border:solid 1px #000; padding:5px 5px;">  <input  name="water_work"  value="<?php echo isset($info['water_work']) ? $info['water_work'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
				   <td style="width:50%; border:solid 1px #000; padding:5px 5px;"> <input  name="water_notes"  value="<?php echo isset($info['water_notes']) ? $info['water_notes'] :  ''; ?>"  type="text"  class="trade_inf_input_notes" />  </td>

			           </tr>
			    </table>

			     </td>
			    <td style="width:40%;"> 
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-weight:600; border-top:solid 1px #000; border-left:solid 1px #000; padding:6px 5px;"> Exterior </td>
				 <td style="width:50%;  padding:6px 5px; border-top:solid 1px #000; border-right:solid 1px #000;"> </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Siding FG or Alum </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Siding_FG"  value="<?php echo isset($info['Siding_FG']) ? $info['Siding_FG'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Undercarriage </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;">  <input  name="Undercarriage"  value="<?php echo isset($info['Undercarriage']) ? $info['Undercarriage'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
			      </tr>
			      
			       <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Tires </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;">  <input  name="Tires"  value="<?php echo isset($info['Tires']) ? $info['Tires'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
			      </tr>
			      
			       <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Engine/Transmission </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;">  <input  name="Engine_Transmission"  value="<?php echo isset($info['Engine_Transmission']) ? $info['Engine_Transmission'] :  ''; ?>"  type="text"  class="trade_inf_input" /> </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Brakes </td>
				 <td style="width:50%;  padding:5px 5px; border:solid 1px #000;"> <input  name="Brakes"  value="<?php echo isset($info['Brakes']) ? $info['Brakes'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Awning </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Awning"  value="<?php echo isset($info['Awning']) ? $info['Awning'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Tanks & Valves </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Tanks_Valves"  value="<?php echo isset($info['Tanks_Valves']) ? $info['Tanks_Valves'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:600; border-left:solid 1px #000; padding:6px 5px;"> Interior </td>
				 <td style="width:50%;  padding:6px 5px; border-right:solid 1px #000;"></td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Carpet/Vinyl </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Carpet_Vinyl"  value="<?php echo isset($info['Carpet_Vinyl']) ? $info['Carpet_Vinyl'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Ceilling </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Ceilling"  value="<?php echo isset($info['Ceilling']) ? $info['Ceilling'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Walls </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Walls"  value="<?php echo isset($info['Walls']) ? $info['Walls'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Furniture </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"><input  name="Furniture"  value="<?php echo isset($info['Furniture']) ? $info['Furniture'] :  ''; ?>"  type="text"  class="trade_inf_input" />   </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Cabinets/Countertops </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Cabinets_Countertops"  value="<?php echo isset($info['Cabinets_Countertops']) ? $info['Cabinets_Countertops'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Windows/Blinds </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Windows_Blinds"  value="<?php echo isset($info['Windows_Blinds']) ? $info['Windows_Blinds'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Lighting </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"> <input  name="Lighting"  value="<?php echo isset($info['Lighting']) ? $info['Lighting'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:6px 5px;"> Pet Damage? ( Yes/No ) </td>
				 <td style="width:50%;  padding:6px 5px; border:solid 1px #000;"><input  name="Pet_Damage"  value="<?php echo isset($info['Pet_Damage']) ? $info['Pet_Damage'] :  ''; ?>"  type="text"  class="trade_inf_input" />   </td>
			      </tr>
			      
			       <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; padding:5px 5px;"> Any Water damage? ( Yes/No ) </td>
				 <td style="width:50%;  padding:5px 5px; border:solid 1px #000;"><input  name="Water_damage"  value="<?php echo isset($info['Water_damage']) ? $info['Water_damage'] :  ''; ?>"  type="text"  class="trade_inf_input" />   </td>
			      </tr>
			      
			      <tr>
				<td style="width:50%; font-weight:normal; border-left:solid 1px #000; border-bottom:solid 1px #000; padding:5px 5px;"> Smoked inside? ( Yes/No ) </td>
				 <td style="width:50%;  padding:5px 5px; border:solid 1px #000;"> <input  name="Smoked_inside"  value="<?php echo isset($info['Smoked_inside']) ? $info['Smoked_inside'] :  ''; ?>"  type="text"  class="trade_inf_input" />  </td>

			      </tr>
			      </table>
			    </td>
			  </tr>
			</table>
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			     <tr>
			       <td style="font-size:16px; padding:7px 0;"> Repair Needed <input  name="repair_needed1"  value="<?php echo isset($info['repair_needed1']) ? $info['repair_needed1'] :  ''; ?>"  type="text"  class="trade_inf2" /> </td>

			      </tr>			      
			       <tr>
			       <td style="font-size:14px; padding:7px 0; line-height:20px;">  I Certify that the above information is accurate and true, and acknowledge that the actual allowance for my trade may be lowered if after your inspection you find the condition of this equipment is not as i represented it. </td>
			      </tr>
			      
			       <tr>
			       <td style="font-size:16px; padding:6px 0;"> Signature <input  name="signature_data"  value="<?php echo isset($info['signature_data']) ? $info['signature_data'] :  ''; ?>"  type="text"  class="trade_inf4" />  Date <input  name="date_data"  value="<?php echo date('Y-m-d h:i:s'); ?>"  type="text"  class="trade_inf5" /> </td>
			      </tr>
			      
			       <tr>
			       <td style="font-size:16px; padding:6px 0;"> Salesperson inspection:key <input  name="salesperson_inspection_key"  value="<?php echo isset($info['salesperson_inspection_key']) ? $info['salesperson_inspection_key'] :  ''; ?>"  type="text"  class="trade_inf" /> Title/Reg  <input  name="title_reg_data"  value="<?php echo isset($info['title_reg_data']) ? $info['title_reg_data'] :  ''; ?>"  type="text"  class="trade_inf" /> Condition  <input  name="condition_data"  value="<?php echo isset($info['condition_data']) ? $info['condition_data'] :  ''; ?>"  type="text"  class="trade_inf" /> Notes  <input  name="notes_data"  value="<?php echo isset($info['notes_data']) ? $info['notes_data'] :  ''; ?>"  type="text"  class="trade_inf4" /></td>

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
