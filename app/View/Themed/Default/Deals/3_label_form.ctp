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

	.3_label{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.3_label2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.3_label3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.3_label4{border: solid 2px #000 !important;
          -webkit-appearance: none;
          -moz-appearance: none;
          -o-appearance: none;
          appearance: none;
          width: 25px;
          height: 25px; vertical-align:middle;
          margin-right: 10px;}
	  
	  .title_off{ width:40%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
	   .title_off{ width:60%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		
	  
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
			    <td style="width:80%; font-size:24px; color:#F00; font-weight:600;"> INSURANCE INFORMATION </td>
			    <td style="width:20%;"> <?php echo date("Y-m-d"); ?> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:20px 0 0 0;">
			  <tr>
			    <td style="width:100%; background:#FF6; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> CUSTOMER INFORMATION </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:60%; font-size:12px; padding:15px 0; border-right:solid 1px #000; border-bottom:solid 1px #000;"> CUSTOMER NAME :<input name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:40%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> TELEPHONE : <input name="telephone_data" value="<?php echo isset($info['telephone_data']) ? $info['telephone_data'] : $info['phone']; ?>" type="text" class="title_off" /> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:35%; font-size:12px; padding:15px 0; border-right:solid 1px #000; border-bottom:solid 1px #000;"> CUSTOMER ADDRESS : <input name="customer_address" value="<?php echo isset($info['customer_address']) ? $info['customer_address'] : $info['address']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:25%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> CUSTOMER CITY : <input name="city_address" value="<?php echo isset($info['city_address']) ? $info['city_address'] : $info['city']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> STATE : <input name="state_address" value="<?php echo isset($info['state_address']) ? $info['state_address'] : $info['state']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> ZIP CODE : <input name="zip_address" value="<?php echo isset($info['zip_address']) ? $info['zip_address'] : $info['zip']; ?>" type="text" class="title_off" /> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; background:#FF6; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> PURCHASED MOTORCYCLE INFORMATION </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000; border-bottom:solid 1px #000;"> MAKE </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> Model </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> YEAR </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> VIN </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> CCS </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000;  border-bottom:solid 1px #000;"> MILEAGE </td>
			  </tr>
			  
			  <tr>
			    <td style="width:15%; font-size:16px; padding:15px 0; border-right:solid 1px #000; font-weight:600;"><input name="make_data" value="<?php echo isset($info['make_data']) ? $info['make_data'] : $info['make']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000; ">  <input name="model_data" value="<?php echo isset($info['model_data']) ? $info['model_data'] : $info['model']; ?>" type="text" class="title_off" style="width:80% !important;" /></td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000; "> <input name="year_data" value="<?php echo isset($info['year_data']) ? $info['year_data'] : $info['year']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:15%; font-size:12px; padding:15px 0; border-right:solid 1px #000; ">  <input name="vin_data" value="<?php echo isset($info['vin_data']) ? $info['vin_data'] : $info['vin']; ?>" type="text" class="title_off" /></td>
			     <td style="width:15%; font-size:12px; padding:15px 0 border-right:solid 1px #000;; ">  <input name="ccs_data" value="<?php echo isset($info['ccs_data']) ? $info['ccs_data'] : ''; ?>" type="text" class="title_off" /></td>
			     <td style="width:15%; font-size:12px; padding:15px 0 border-right:solid 1px #000;; ">  <input name="mileage_data" value="<?php echo isset($info['mileage_data']) ? $info['mileage_data'] : $info['odometer']; ?>" type="text" class="title_off" /></td>
			  </tr>
			</table>
			 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; background:#FF6; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> LIENHOLDER INFORMATION AS ENTERED ON TITLE APPLICATION </td>
			  </tr>
			</table>

			 
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:20%; font-size:12px; padding:15px 0; text-align:center;"> NAME </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; text-align:center;"> ADDRESS </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; text-align:center;"> CITY </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; text-align:center;"> STATE </td>
			     <td style="width:20%; font-size:12px; padding:15px 0; text-align:center;"> ZIP CODE </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input name="EAGLEMARK_SAVINGS_BANK" <?php echo ($info['EAGLEMARK_SAVINGS_BANK'] == "EAGLEMARK_SAVINGS_BANK") ? "checked" : ""; ?>  type="checkbox" value="EAGLEMARK_SAVINGS_BANK" class="3_label4" /> EAGLEMARK SAVINGS BANK </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> PO BOX 277940 </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> SACREMENTO </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> CA </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 95827-7940 </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input  name="FIRST_MERIT_BANK" <?php echo ($info['FIRST_MERIT_BANK'] == "FIRST_MERIT_BANK") ? "checked" : ""; ?>  type="checkbox" value="FIRST_MERIT_BANK"  class="3_label4" /> FIRST MERIT BANK </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> 295 FIRST MERIT CIR MTG 25 </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> AKRON </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> OH </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 44307-2305 </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input  name="FIRST_OHIO_COMM_FED_CU" <?php echo ($info['FIRST_OHIO_COMM_FED_CU'] == "FIRST_OHIO_COMM_FED_CU") ? "checked" : ""; ?>  type="checkbox" value="FIRST_OHIO_COMM_FED_CU"  class="3_label4" /> FIRST OHIO COMM FED CU </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> PO BOX 2479 - 8200 CLEVELAND AVE NW </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> NORTH CANTON </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> OH </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 44720-0479 </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input  name="GEN_FED_FINANCIAL" <?php echo ($info['GEN_FED_FINANCIAL'] == "GEN_FED_FINANCIAL") ? "checked" : ""; ?>  type="checkbox" value="GEN_FED_FINANCIAL"  class="3_label4" />GEN FED FINANCIAL</td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> 85 MASSILLON RD </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> AKRON </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> OH </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 44312-1051 </td>
			  </tr>
			  
			   <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input  name="PEOPLES_BANK_NATIONAL_ASSOC" <?php echo ($info['PEOPLES_BANK_NATIONAL_ASSOC'] == "PEOPLES_BANK_NATIONAL_ASSOC") ? "checked" : ""; ?>  type="checkbox" value="PEOPLES_BANK_NATIONAL_ASSOC"  class="3_label4" /> PEOPLES BANK NATIONAL ASSOC. </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> 138 PUTNAM ST </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> MARIETTA </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> OH </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 45750-2923 </td>
			  </tr>
			  
			   <tr>
			    <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> <input  name="STARK_FEDERAL_CREDIT_UNION" <?php echo ($info['STARK_FEDERAL_CREDIT_UNION'] == "STARK_FEDERAL_CREDIT_UNION") ? "checked" : ""; ?>  type="checkbox" value="STARK_FEDERAL_CREDIT_UNION"  class="3_label4" /> STARK FEDERAL CREDIT UNION </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000; "> 4100 DRESSLER RD NW </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> CANTON </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> OH </td>
			     <td style="width:20%; font-size:12px; padding:15px 10px; border-right:solid 1px #000; border-top:solid 1px #000;"> 44718-2754 </td>
			  </tr>
			  
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; background:#FF6; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> INSURANCE AGENT/CARRIER TO FAX BINDER TO FREEDOM HARLEY-DAVIDSON </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #000; border-left:solid 1px #000;" >
			  <tr>
			    <td style="width:100%; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0; display:inline-block;"> THE BINDER MUST INCLUDE THE FOLLOWING: </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #000; border-left:solid 1px #000;">
			  <tr>
			    <td style="width:100%; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> <input  name="EAGLEMARK_SAVINGS_BANK" <?php echo ($info['EAGLEMARK_SAVINGS_BANK'] == "EAGLEMARK_SAVINGS_BANK") ? "checked" : ""; ?>  type="checkbox" value="EAGLEMARK_SAVINGS_BANK"  class="3_label4" /> THE LIENHOLDER SPECIFIED ABOVE (IF NOT A CASH DEAL) </td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> <input  name="THE_NAME_OF_THE_INSURANCE_CARRIER" <?php echo ($info['THE_NAME_OF_THE_INSURANCE_CARRIER'] == "THE_NAME_OF_THE_INSURANCE_CARRIER") ? "checked" : ""; ?>  type="checkbox" value="THE_NAME_OF_THE_INSURANCE_CARRIER"  class="3_label4" /> THE NAME OF THE INSURANCE CARRIER </td>
			  </tr>
			  
			  <tr>
			    <td style="width:100%; border-top:solid 1px #000; font-size:18px; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> <input  name="THE_CARRIER_PHONE_NUMBER" <?php echo ($info['THE_CARRIER_PHONE_NUMBER'] == "THE_CARRIER_PHONE_NUMBER") ? "checked" : ""; ?>  type="checkbox" value="THE_CARRIER_PHONE_NUMBER"  class="3_label4" /> THE CARRIER PHONE NUMBER (OR THE LOCAL AGENCY IF APPLICABLE) </td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> <input  name="COLLISION_AND_COMPREHENSIVE_COVERAGE" <?php echo ($info['COLLISION_AND_COMPREHENSIVE_COVERAGE'] == "COLLISION_AND_COMPREHENSIVE_COVERAGE") ? "checked" : ""; ?>  type="checkbox" value="COLLISION_AND_COMPREHENSIVE_COVERAGE"  class="3_label4" /> THE DEDUCTABLE FOR BOTH COLLISION AND COMPREHENSIVE COVERAGE </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #000; border-left:solid 1px #000;" >
			  <tr>
			    <td style="width:50%; border-top:solid 1px #000; border-bottom:solid 1px #000; font-size:22px; text-align:center; padding:5px 0; border-right:solid 1px #000;"> SEND FAX TO:  </td>
			     <td style="width:50%; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; font-size:22px; padding:5px 0;"> <input name="send_to_fax" value="<?php echo isset($info['send_to_fax']) ? $info['send_to_fax'] : ''; ?>" type="text" class="title_off" />  </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; text-align:center; padding:5px 0;"> EITHER CUT OR FOLD UNDER ON THE LINE BELOW </td>
			  </tr>
			</table>
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width: 100%;text-align: center;padding: 0px 0;border: 1px solid;">
				
			    </td>
			  </tr>
			</table>

			<table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin:20px auto;">
			  <tr>
			    <td style="width:70%; text-align:center; background:#FF6; padding:5px 0; border-right:solid 1px #000;"> SALES / F&I DEAL REVIEW  </td>
			     <td style="width:30%; text-align:center; background:#FF6; padding:5px 0;">			      
			      	  <input name="DEAD" value="<?php echo isset($info['DEAD']) ? $info['DEAD'] : ''; ?>" type="text" placeholder="DEAD" style="width:100px !important;"  class="entry_one" /> 
			     </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:20px auto;">
			  <tr>
			    <td style="width:30%; text-align:center; font-size:20px; padding:5px 0; ">DEAL JACKET LABEL </td>
			     <td style="width:7%; text-align:center;  padding:5px 0; border:solid 1px #000;"> <input name="DEAL_JACKET_LABEL1" value="<?php echo isset($info['DEAL_JACKET_LABEL1']) ? $info['DEAL_JACKET_LABEL1'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /> </td>
			     <td style="width:7%; text-align:center; padding:5px 0; border:solid 1px #000;"> <input name="DEAL_JACKET_LABEL2" value="<?php echo isset($info['DEAL_JACKET_LABEL2']) ? $info['DEAL_JACKET_LABEL2'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /> </td>
			     <td style="width:6%; text-align:center; padding:5px 0;border:solid 1px #000;"><input name="DEAL_JACKET_LABEL3" value="<?php echo isset($info['DEAL_JACKET_LABEL3']) ? $info['DEAL_JACKET_LABEL3'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /></td>
			     <td style="width:7%; text-align:center; padding:5px 0;border:solid 1px #000;"> <input name="DEAL_JACKET_LABEL4" value="<?php echo isset($info['DEAL_JACKET_LABEL4']) ? $info['DEAL_JACKET_LABEL4'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /> </td>
			     <td style="width:7%; text-align:center; padding:5px 0;border:solid 1px #000;"><input name="DEAL_JACKET_LABEL5" value="<?php echo isset($info['DEAL_JACKET_LABEL5']) ? $info['DEAL_JACKET_LABEL5'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /></td>
			     <td style="width:6%; text-align:center; padding:5px 0;border:solid 1px #000;"><input name="DEAL_JACKET_LABEL6" value="<?php echo isset($info['DEAL_JACKET_LABEL6']) ? $info['DEAL_JACKET_LABEL6'] : ''; ?>" type="text" placeholder="12-16" style="width:100px !important;"  class="entry_one" /> </td>
			     <td style="width:30%; text-align:center; padding:5px 0;"> DATE SUBMITTED <input name="DATE_SUBMITTED" value="<?php echo isset($info['DATE_SUBMITTED']) ? $info['DATE_SUBMITTED'] : ''; ?>" type="text" placeholder="<?php echo date('Y-m-d'); ?>" style="width:100px !important;"  class="entry_one" />  </td>
			  </tr>
			</table>
			       
			       
			    <table width="60%" border="0" cellspacing="0" cellpadding="0" style="margin:20px auto;">
			  <tr>
			    <td style="width:50%; text-align:center; padding:5px 0; border:solid 1px #000; font-size:22px; font-weight:600;"> CUSTOMER NAME: <input name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" type="text" class="title_off" /> </td>
			     <td style="width:25%; text-align:center; padding:5px 0;">REFERENCE NO: <input name="REFERENCE" value="<?php echo isset($info['REFERENCE']) ? $info['REFERENCE'] : ''; ?>" type="text" class="title_off" /> </td>
			     <td style="width:25%; text-align:center; padding:5px 0;"> SALESMAN : <input name="SALESMAN" value="<?php echo isset($info['SALESMAN']) ? $info['SALESMAN'] : $info['sperson']; ?>" type="text" class="title_off" /> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; background:#FF6; border-top:solid 1px #000; border-bottom:solid 1px #000; text-align:center; padding:5px 0;"> PURCHASED VECHICLE INFORMATION </td>
			  </tr>
			  </table>
			  
			  
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:35%;  padding:10px 0; font-size:12px; text-align:left; border:solid 1px #000;"> VEHICLE MODEL :  <input name="VEHICLE_MODEL" value="<?php echo isset($info['VEHICLE_MODEL']) ? $info['VEHICLE_MODEL'] : $info['model']; ?>" type="text" class="title_off" />  </td>
			     <td style="width:15%; padding:10px 0; font-size:12px; text-align:left;  border:solid 1px #000;">YEAR :  <input name="VECHICLE_YEAR" value="<?php echo isset($info['VECHICLE_YEAR']) ? $info['VECHICLE_YEAR'] : $info['year']; ?>" type="text" class="title_off" />  </td>
			     <td style="width:15%; padding:10px 0; font-size:12px; text-align:left; border:solid 1px #000;"> CATEGORY : <input name="CATEGORY" value="<?php echo isset($info['CATEGORY']) ? $info['CATEGORY'] : $info['category']; ?>" type="text" class="title_off" style="width:150px !important;" /> </td>
			     <td style="width:20%; padding:10px 0; font-size:12px; text-align:left; border:solid 1px #000;"> CATEGORY NAME :  <input name="CATEGORY_NAME" value="<?php echo isset($info['CATEGORY_NAME']) ? $info['CATEGORY_NAME'] : ''; ?>" type="text" class="title_off" /> </td>
			     <td style="width:15%; padding:10px 0; font-size:12px; text-align:left; border:solid 1px #000;"> DISPLACEMENT (CCs) :  <input name="DISPLACEMENT" value="<?php echo isset($info['DISPLACEMENT']) ? $info['DISPLACEMENT'] : ''; ?>" type="text" class="title_off" /> </td>
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
