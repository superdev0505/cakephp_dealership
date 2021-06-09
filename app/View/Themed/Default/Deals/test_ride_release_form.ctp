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
	 body{ margin:0 10%; padding:0; font-family:Verdana, Geneva, sans-serif; }

	.test_ride{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.test_ride2{ width:90%; background:none; border:solid 1px #333; margin-left:6px; height:40px; font-size:30px; font-weight:600;}

	.test_ride3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.test_ride4{ width:80%; background:none; border:solid 1px #333; margin-left:6px; height:40px; font-size:30px; font-weight:600;}
	
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
	}

	
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:34%; font-size:22px; font-weight:600; color:#F00;">SALES DEAL ENTRY</td>
				     <td style="width:33%; font-size:12px; font-weight:normal; text-align:center; color:#000;"> CUSTOMER'S FULL NAME </td>
				      <td style="width:33%; font-size:12px; font-weight:normal; color:#000; text-align:center;"> <?php echo date('Y-m-d'); ?> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:34%; font-size:12px; color:#000;"> <input name="driver_license_yes_no" <?php echo ($info['driver_license_yes_no'] == "driver_license_yes_no") ? "checked" : ""; ?>  type="checkbox" value="driver_license_yes_no" style="vertical-align:middle;" /> Copy customer's<strong> Driver's License.</strong> </td>
				     <td style="width:33%; font-size:12px; font-weight:normal; text-align:center; color:#F00; height:40px;"> <input name="customer_name_data"   value="<?php echo isset($info['customer_name_data']) ? $info['customer_name_data'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="test_ride2" /> </td>
				      <td style="width:33%; font-size:12px; font-weight:normal; color:#000;">  </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="verify_address_yes_no" <?php echo ($info['verify_address_yes_no'] == "verify_address_yes_no") ? "checked" : ""; ?> type="checkbox" value="verify_address_yes_no" style="vertical-align:middle;" /> Verify address on Driver's License is correct. If not, enter correct address below: </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> STREET ADDRESS </td>
				     <td style="width:30%; font-size:13px; color:#000; text-align:center;"> CITY </td>
				      <td style="width:10%; font-size:13px; color:#000; text-align:center;"> STATE </td>
				       <td style="width:10%; font-size:13px; color:#000; text-align:center;"> ZIP CODE </td>
				  </tr>
				</table>
				 
				 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> <input name="stress_address"   value="<?php echo isset($info['stress_address']) ? $info['stress_address'] : $info['address']; ?>"  type="text" class="test_ride2" /> </td>
				     <td style="width:30%; font-size:13px; color:#000; text-align:center; "> <input name="city_data"   value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city']; ?>"  type="text" class="test_ride2" /> </td>
				      <td style="width:10%; font-size:13px; color:#000; text-align:center; "> <input name="state_data"   value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>"  type="text" class="test_ride2" /> </td>
				       <td style="width:10%; font-size:13px; color:#000; text-align:center; "> <input name="zip_data"   value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : $info['zip']; ?>"  type="text" class="test_ride2" /> </td>
				  </tr>
				</table>



				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="SocialSecurityNumber" <?php echo ($info['SocialSecurityNumber'] == "SocialSecurityNumber") ? "checked" : ""; ?> type="checkbox" value="SocialSecurityNumber" style="vertical-align:middle;" /> Enter Customer"s County (If Ohio) and Social Security Number. </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> COUNTY OF RESIDENCE </td>
				     <td style="width:50%; font-size:13px; color:#000; text-align:center;"> SOCIAL SECURITY NUMBER </td>
				  </tr>
				</table>
				 
				 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> <input name="COUNTY_OF_RESIDENCE"   value="<?php echo isset($info['COUNTY_OF_RESIDENCE']) ? $info['COUNTY_OF_RESIDENCE'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				     <td style="width:50%; font-size:13px; color:#000; text-align:center; "> <input name="SOCIAL_SECURITY_NUMBER1"   value="<?php echo isset($info['SOCIAL_SECURITY_NUMBER1']) ? $info['SOCIAL_SECURITY_NUMBER1'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				  </tr>
				</table>
				 
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="talones" <?php echo ($info['talones'] == "talones") ? "checked" : ""; ?>  type="checkbox" value="talones" style="vertical-align:middle;" /> Enter or correct Customer information in TALONes. </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="inventory_talones"  <?php echo ($info['inventory_talones'] == "inventory_talones") ? "checked" : ""; ?>   type="checkbox" value="inventory_talones" style="vertical-align:middle;" /> Enter Deal in TALONes and attach the proper motorcycle if in inventory. </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="trade_in_val"   <?php echo ($info['trade_in_val'] == "trade_in_val") ? "checked" : ""; ?>  type="checkbox" value="trade_in_val" style="vertical-align:middle;" /> If there is a Trade-In, enter the following: </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> VIN </td>
				     <td style="width:10%; font-size:13px; color:#000; text-align:center;"> YEAR </td>
					  </tr>
				</table>
				 
				 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:50%; font-size:13px; color:#000; text-align:center;"> <input name="vin_data"   value="<?php echo isset($info['vin_data']) ? $info['vin_data'] : $info['vin']; ?>"  type="text" class="test_ride4" /> </td>
				     <td style="width:10%; font-size:13px; color:#000; text-align:center; "> <input name="year_data"   value="<?php echo isset($info['year_data']) ? $info['year_data'] : $info['year']; ?>"  type="text" class="test_ride4" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				       <td style="width:50%; font-size:13px; color:#000; text-align:center;"> MAKE </td>
				       <td style="width:25%; font-size:13px; color:#000; text-align:center;"> MODEL </td>
					<td style="width:25%; font-size:13px; color:#000; text-align:center;"> MILEAGE </td>
				  </tr>
				</table>
				 
				 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				      <td style="width:50%; font-size:13px; color:#000; text-align:center; "> <input name="make_data"   value="<?php echo isset($info['make_data']) ? $info['make_data'] : $info['make']; ?>"  type="text" class="test_ride4" /> </td>
				       <td style="width:25%; font-size:13px; color:#000; text-align:center; "> <input name="model_data"   value="<?php echo isset($info['model_data']) ? $info['model_data'] : $info['model']; ?>"  type="text" class="test_ride4" /> </td>
					<td style="width:25%; font-size:13px; color:#000; text-align:center; "> <input name="mileage_data"   value="<?php echo isset($info['mileage_data']) ? $info['mileage_data'] : $info['odometer']; ?>"  type="text" class="test_ride4" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:40%; font-size:13px; color:#000; text-align:center;"> CURRENT LIENHOLDER </td>
				     <td style="width:20%; font-size:13px; color:#000; text-align:center;"> AMOUNT OWED </td>
				      <td style="width:20%; font-size:13px; color:#000; text-align:center;"> GOOD THROUGH </td>
				       <td style="width:20%; font-size:13px; color:#000; text-align:center;"> QUOTED BY </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:13px; color:#000; text-align:center;"> <input name="CURRENT_LIENHOLDER"   value="<?php echo isset($info['CURRENT_LIENHOLDER']) ? $info['CURRENT_LIENHOLDER'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				     <td style="width:20%; font-size:13px; color:#000; text-align:center; "> <input name="AMOUNT_OWED"   value="<?php echo isset($info['AMOUNT_OWED']) ? $info['AMOUNT_OWED'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				      <td style="width:20%; font-size:13px; color:#000; text-align:center; "> <input name="GOOD_THROUGH"   value="<?php echo isset($info['GOOD_THROUGH']) ? $info['GOOD_THROUGH'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				       <td style="width:20%; font-size:13px; color:#000; text-align:center; "> <input name="QUOTED_BY"   value="<?php echo isset($info['QUOTED_BY']) ? $info['QUOTED_BY'] : ""; ?>"  type="text" class="test_ride2" /> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="print_data"   <?php echo ($info['print_data'] == "print_data") ? "checked" : ""; ?>  type="checkbox" value="print_data" style="vertical-align:middle;" />Print <strong>NADA</strong> Sheet and <strong>Appraisal</strong> form for Sales Manager. </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:25%; font-size:13px; color:#000;"> <input name="Type_of_Payment"   <?php echo ($info['Type_of_Payment'] == "Type_of_Payment") ? "checked" : ""; ?>  type="checkbox" value="Type_of_Payment" style="vertical-align:middle;" /> Type of Payment: </td>
				     <td style="width:25%; font-size:13px; color:#000;">  <input name="Cash"   <?php echo ($info['Cash'] == "Cash") ? "checked" : ""; ?>  type="checkbox" value="Cash" style="vertical-align:middle;" />  Cash </td>
				      <td style="width:20%; font-size:13px; color:#000;">  <input name="Dealership_Financing"   <?php echo ($info['Dealership_Financing'] == "Dealership_Financing") ? "checked" : ""; ?>  type="checkbox" value="Dealership_Financing" style="vertical-align:middle;" />Dealership Financing </td>
				       <td style="width:30%; font-size:13px; color:#000;">  <input name="Customer_Financing"   <?php echo ($info['Customer_Financing'] == "Customer_Financing") ? "checked" : ""; ?>  type="checkbox" value="Customer_Financing" style="vertical-align:middle;" />Customer Financing </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:25%; font-size:13px; color:#000;"> <input name="Expected_delivery"   <?php echo ($info['Expected_delivery'] == "Expected_delivery") ? "checked" : ""; ?>  type="checkbox" value="Expected_delivery" style="vertical-align:middle;" /> Expected delivery: </td>
				     <td style="width:25%; font-size:13px; color:#000;"> <input name="Today"   <?php echo ($info['Today'] == "Today") ? "checked" : ""; ?>  type="checkbox" value="Today" style="vertical-align:middle;" /> Today</td>
				      <td style="width:20%; font-size:13px; color:#000;">  <input name="Next_30_Days"   <?php echo ($info['Next_30_Days'] == "Next_30_Days") ? "checked" : ""; ?>  type="checkbox" value="Next_30_Days" style="vertical-align:middle;" />Next 30 Days </td>
				       <td style="width:30%; font-size:13px; color:#000;">  <input name="financing_options"   <?php echo ($info['financing_options'] == "financing_options") ? "checked" : ""; ?>  type="checkbox" value="financing_options" style="vertical-align:middle;" />Depends on financing options available</td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:13px; color:#000;"> <input name="Deliver_this_sheet"   <?php echo ($info['Deliver_this_sheet'] == "Deliver_this_sheet") ? "checked" : ""; ?>  type="checkbox" value="Deliver_this_sheet" style="vertical-align:middle;" />Deliver this sheet and attachments in <strong>Bold - Underlined</strong> type font to the Sales Manager. </td>
				  </tr>
				</table>
				<br /><br />	
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
					
				 <tr>
				    <td style="width:50%; font-size:13px; color:#000;"> 
				    SalesMan	
				    <input name="salesman"   value="<?php echo isset($info['salesman']) ? $info['salesman'] : $info['sperson']; ?>"  type="text" class="test_ride4" /> </td>
				       <td style="width:50%; font-size:13px; color:#000;"> 
				       Sales Manager
				       <input name="salesmanager"   value="<?php echo isset($info['salesmanager']) ? $info['salesmanager'] : ""; ?>"  type="text" class="test_ride4" /> </td>
				  </tr>
				</table>
				

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:30px; color:#000;"> FREEDOM HARLEY DAVIDSON  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:100%; font-size:25px; color:#000;"> TEST RIDE RELEASE FORM  </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:100%; font-size:12px; color:#000; padding-left:25px; line-height:20px; "> The undersigned (on my own behalf and on behalf of my heirs, personal representatives, successors and assigns), for and in consideration of the opportunity to engage today in a free demonstration ride of a Harley-Davidson motorcycle(s) and for other valuable consideration, the receipt and adequacy of which are hereby acknowledged, releases Harley-Davidson, Inc., its officers, directors, employees, agents, and authorized dealers (“released parties”) from any and all claims, demands, rights, and causes of action of any kind whatsoever, known or unknown, which I now have or may have in any way resulting from, or arising out of, my demonstration ride on a Harley-Davidson model motorcycle(s). </td>
				  </tr>
				  
				  <tr>
				    <td style="width:100%; font-size:12px; color:#000; padding-left:25px; padding-top:15px; line-height:20px;"> This Release extends to any and all claims I have or may have against the released parties, even if such claims result from strict liability or negligence on the part of any or all of the released parties, concerning the design, manufacture, repair or maintenance of the motorcycle(s) which I will be demonstration riding, or concerning the conditions, qualifications, instructions, rules or procedures under which the demonstration ride is conducted, or from any other cause.  However, I do not release any released party from any intentional misconduct on its part.  </td>
				  </tr>
				  
				   <tr>
				    <td style="width:100%; font-size:12px; color:#000; padding-left:25px; padding-top:15px; line-height:20px;"> I hereby state I am experienced in and familiar with the operation of various motorcycles and fully understand the risks and dangers inherent in motorcycling.  I am voluntarily participating in the demonstration ride and I expressly agree to assume the entire risk of any accidents or personal injury, including death, which I might suffer as a result of my participation in the demonstration ride.  I participate in the ride knowing the existing weather conditions, road conditions and other similar conditions and factors associated with this demonstration ride.  </td>
				  </tr>
				</table>


				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
				  <tr>
				    <td style="width:10%;"> <input name="age_data"   value="<?php echo isset($info['age_data']) ? $info['age_data'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:90%; font-size:14px; font-weight:600;">I am at least 18 years of age.</td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%;"> <input name="financial_data"   value="<?php echo isset($info['financial_data']) ? $info['financial_data'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:90%; font-size:14px; font-weight:600;">I agree to be financially responsible for any damage to the motorcycle being test-ridden while in my possession.   </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%;"> <input name="equipment_data"   value="<?php echo isset($info['equipment_data']) ? $info['equipment_data'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:90%; font-size:14px; font-weight:600;">Proper equipment including an improved, long heavy pants and leather shoes or boots are required.   </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%;"> <input name="return_bike"   value="<?php echo isset($info['return_bike']) ? $info['return_bike'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:22%; font-size:14px; font-weight:600;">I will return the bike within   </td>
				     
				      <td style="width:10%;"> <input name="return_bike_miles"   value="<?php echo isset($info['return_bike_miles']) ? $info['return_bike_miles'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:8%; font-size:14px; font-weight:600;">miles or </td>
				     
				      <td style="width:10%;"> <input name="return_bike_minutes"   value="<?php echo isset($info['return_bike_minutes']) ? $info['return_bike_minutes'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> </td>
				     <td style="width:20%; font-size:14px; font-weight:600;">minutes or less </td>
				      <td style="width:10%;"> <input name="return_bike_deptime"   value="<?php echo isset($info['return_bike_deptime']) ? $info['return_bike_deptime'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:40px;" /> <strong style="font-size:12px; font-weight:normal;">Departure Time</strong> </td>
				     <td style="width:20%; font-size:14px; font-weight:600;"> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 0 0;">
				  <tr>
				    <td style="width:100%; font-size:14px; font-weight:600;"> BY SIGNING THIS RELEASE, I CERTIFY THAT I HAVE READ THIS RELEASE AND FULLY UNDERSTAND IT AND THAT I AM NOT RELYING ON ANY STATEMENTS OR REPRESENTATIONS OF ANYONE RELEASED THEREBY.</td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 10px 0;">
				  <tr>
				    <td style="width:30%; font-size:14px; font-weight:600;"> THIS IS A RELEASE:</td>
				    
				    <td style="width:20%; font-size:14px; text-align:right;">Signed:</td>
				    
				    <td style="width:50%; font-size:14px;"> <input name="dob_data1"   value="<?php echo isset($info['dob_data1']) ? $info['dob_data1'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:30px;" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 10px 0;">
				  <tr>
				    <td style="width:30%; font-size:14px; font-weight:600;"> </td>
				    
				    <td style="width:20%; font-size:14px; text-align:right;"> Passenger Signature:</td>
				    
				    <td style="width:50%; font-size:14px;"> <input name="dob_data1"   value="<?php echo isset($info['dob_data1']) ? $info['dob_data1'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:30px;" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 10px 0;">
				  <tr>
				    <td style="width:30%; font-size:14px; font-weight:600;"> </td>
				    
				    <td style="width:20%; font-size:14px; text-align:right;"> Phone Number:</td>
				    
				    <td style="width:50%; font-size:14px;"> <input name="Phone_Number"   value="<?php echo isset($info['Phone_Number']) ? $info['Phone_Number'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:30px;" /> </td>
				  </tr>
				</table>

				<br /><br /><br />

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 10px 0;">
				  <tr>
				    <td style="width:50%; font-size:14px; font-weight:600;"> Rider Driver’s License: </td>
				    
				    <td style="width:50%; font-size:14px;font-weight:600;"> Passenger Driver’s License: </td>
				  </tr>
				</table>
				<br />
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 10px 0;">
				  <tr>
				    <td style="width:50%; font-size:14px; "> <input name="Rider_Driver_License"   value="<?php echo isset($info['Rider_Driver_License']) ? $info['Rider_Driver_License'] : ""; ?>"  type="text" class="test_ride4" style="height:200px;" />  </td>
				    
				    <td style="width:50%; font-size:14px;"> <input name="Passenger_Driver_License"   value="<?php echo isset($info['Passenger_Driver_License']) ? $info['Passenger_Driver_License'] : ""; ?>"  type="text" class="test_ride4" style="height:200px;" />  </td>
				  </tr>
				</table>
				<br /><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px 0 40px 0;">
				  <tr>
				    <td style="width:50%; font-size:14px; "> 
				     <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:20%; font-size:14px; ">Service Represenative:</td>
					<td style="width:30%; font-size:14px; "><input name="dob_data1"   value="<?php echo isset($info['dob_data1']) ? $info['dob_data1'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:30px;" /> </td>
				      </tr>
				    </table>

				    </td>
				    
				    <td style="width:50%; font-size:14px;">
				     <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:20%; font-size:14px; ">Sales Represenative:</td>
					<td style="width:30%; font-size:14px; "><input name="dob_data1"   value="<?php echo isset($info['dob_data1']) ? $info['dob_data1'] : ""; ?>"  type="text" class="test_ride" style="background:#FF0; height:30px;" /> </td>
				      </tr>
				    </table>  </td>
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
