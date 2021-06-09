
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

		.open_road_complate{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_complate2{ width:80%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_complate3{ width:95%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_complate4{border: solid 2px #000 !important;
		
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
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:20px; color:#333; font-weight:600; padding:9px 0; text-align:center;"> Open Road Complete RV - DEAL CHECKLIST  </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:16px; font-weight:600; color:#333; padding:6px 0;"> Customer <input name="customer_data"  value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="open_road_complate2" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:16px; font-weight:600; color:#333; padding:6px 0;"> Date # <input name="date_data"  value="<?php echo isset($info['date_data']) ? $info['date_data'] : date("Y-m-d"); ?>"  type="text" class="open_road_complate2" /> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:50%; font-size:16px; font-weight:600; color:#333; padding:6px 0;"> Sales person1 # <input name="Sales_person1"  value="<?php echo isset($info['Sales_person1']) ? $info['Sales_person1'] : ''; ?>"  type="text" class="open_road_complate2" /> </td>
			    <td style="width:50%; font-size:16px; font-weight:600; color:#333; padding:6px 0;"> Sales person2 # <input name="Sales_person2"  value="<?php echo isset($info['Sales_person2']) ? $info['Sales_person2'] : ''; ?>"  type="text" class="open_road_complate2" /> </td>
			  </tr>
			</table>



			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:25px;">
			  <tr>
			    <td style="width:50%; vertical-align:top;">
			     
			       <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> SALESPERSON: </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Top Sheet </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Top_Sheet"  value="<?php echo isset($info['Top_Sheet']) ? $info['Top_Sheet'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Driver's License ( Buyer & Trade ) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="driver_license"  value="<?php echo isset($info['driver_license']) ? $info['driver_license'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Insurance Card </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Insurance_Card"  value="<?php echo isset($info['Insurance_Card']) ? $info['Insurance_Card'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Cradit Application Boureau </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Cradit_Application_Boureau"  value="<?php echo isset($info['Cradit_Application_Boureau']) ? $info['Cradit_Application_Boureau'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Privacy Notice (Signed) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Privacy_Notice"  value="<?php echo isset($info['Privacy_Notice']) ? $info['Privacy_Notice'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> We Owe </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="We_Owe"  value="<?php echo isset($info['We_Owe']) ? $info['We_Owe'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Stips: <br /> Printed </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Proff of Income </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Proff_of_Income"  value="<?php echo isset($info['Proff_of_Income']) ? $info['Proff_of_Income'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Required Proof of Residence</td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Required_Proof_of_Residence"  value="<?php echo isset($info['Required_Proof_of_Residence']) ? $info['Required_Proof_of_Residence'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Required 4 Reference Sheet </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Required_Reference_Sheet"  value="<?php echo isset($info['Required_Reference_Sheet']) ? $info['Required_Reference_Sheet'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Email Address </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Email_Address"  value="<?php echo isset($info['Email_Address']) ? $info['Email_Address'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> MSRP/ Equip list (Signed) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="MSRP_Equip_list"  value="<?php echo isset($info['MSRP_Equip_list']) ? $info['MSRP_Equip_list'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> PDI Checklist (Signed) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="PDI_Checklist"  value="<?php echo isset($info['PDI_Checklist']) ? $info['PDI_Checklist'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Worksheet ! </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Wooksheet"  value="<?php echo isset($info['Wooksheet']) ? $info['Wooksheet'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> AS-IS/ Buyer's Guide  </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;">  </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Trade Appraisal NADA  </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;">  </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Signed w/trade appraisal  </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="trade_appraisal"  value="<?php echo isset($info['trade_appraisal']) ? $info['trade_appraisal'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>

				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> SALES DESK: </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Deal Recap </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Deal_Recap"  value="<?php echo isset($info['Deal_Recap']) ? $info['Deal_Recap'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Proposal Sheet (desking) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Proposal_Sheet"  value="<?php echo isset($info['Proposal_Sheet']) ? $info['Proposal_Sheet'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> OFAC (ALL) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;">  </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:2px 0;"> Risk based Pricing notice (Signed) </td>
				    <td style="width:40%; font-size:15px; padding:2px 0; text-align:center;"> <input name="Risk_based_Pricing"  value="<?php echo isset($info['Risk_based_Pricing']) ? $info['Risk_based_Pricing'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:2px 0;"> Check Request/ Ref Fee </td>
				    <td style="width:40%; font-size:15px; padding:2px 0; text-align:center;"> <input name="Check_Request"  value="<?php echo isset($info['Check_Request']) ? $info['Check_Request'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:4px 0;"> Unit Invoice </td>
				    <td style="width:40%; font-size:15px; padding:4px 0; text-align:center;"> <input name="Unit_Invoice"  value="<?php echo isset($info['Unit_Invoice']) ? $info['Unit_Invoice'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:4px 0;"> Book Out Sheet </td>
				    <td style="width:40%; font-size:15px; padding:4px 0; text-align:center;"> <input name="Book_Out_Sheet"  value="<?php echo isset($info['Book_Out_Sheet']) ? $info['Book_Out_Sheet'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; font-weight:600; padding:4px 0;"> TRADE IN: </td>
				    <td style="width:40%; font-size:15px; padding:4px 0; text-align:center;"> <input name="TRADE_IN"  value="<?php echo isset($info['TRADE_IN']) ? $info['TRADE_IN'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:4px 0;"> Appraisal Worksheet/Carfax Tag Receipt/ GRATIS</td>
				    <td style="width:40%; font-size:15px; padding:4px 0; text-align:center;"> <input name="deal_data"  value="<?php echo isset($info['Carfax_Tag_Receipt']) ? $info['Carfax_Tag_Receipt'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:4px 0;"> Title/ Payoff Verification form</td>
				    <td style="width:40%; font-size:15px; padding:4px 0; text-align:center;"> <input name="Payoff_Verification_form"  value="<?php echo isset($info['Payoff_Verification_form']) ? $info['Payoff_Verification_form'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
			      </td>
			     
			     
			     <td style="width:50%; padding-left:50px;"> 
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> F & I: </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Contract </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Contract"  value="<?php echo isset($info['Contract']) ? $info['Contract'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Buyer's Order </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Buyer_Order"  value="<?php echo isset($info['Buyer_Order']) ? $info['Buyer_Order'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			       
			       <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Insurance Agreement </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Insurance_Agreement"  value="<?php echo isset($info['Insurance_Agreement']) ? $info['Insurance_Agreement'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Bank Approval </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Bank_Approval"  value="<?php echo isset($info['Bank_Approval']) ? $info['Bank_Approval'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:16px; padding:8px 0;"> Copy Of Top </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Copy_Of_Top"  value="<?php echo isset($info['Copy_Of_Top']) ? $info['Copy_Of_Top'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> MVI Signed (Printed) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="MVI_Signed"  value="<?php echo isset($info['MVI_Signed']) ? $info['MVI_Signed'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> MVI Signed Not </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;">  </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Odometer Statement </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Odometer_Statement"  value="<?php echo isset($info['Odometer_Statement']) ? $info['Odometer_Statement'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Finance Product Menu </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Finance_Product_Menu"  value="<?php echo isset($info['Finance_Product_Menu']) ? $info['Finance_Product_Menu'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Road Hazard </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Road_Hazard"  value="<?php echo isset($info['Road_Hazard']) ? $info['Road_Hazard'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Extended Contract </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Extended_Contract"  value="<?php echo isset($info['Extended_Contract']) ? $info['Extended_Contract'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Gap </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Gap"  value="<?php echo isset($info['Gap']) ? $info['Gap'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Down Payment </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Down_Payment"  value="<?php echo isset($info['Down_Payment']) ? $info['Down_Payment'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Cash Receipt </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Cash_Receipt"  value="<?php echo isset($info['Cash_Receipt']) ? $info['Cash_Receipt'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Check (Guarantee Receipt) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Guarantee_Receipt"  value="<?php echo isset($info['Guarantee_Receipt']) ? $info['Guarantee_Receipt'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Credit Card Receipt</td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Credit_Card_Receipt"  value="<?php echo isset($info['Credit_Card_Receipt']) ? $info['Credit_Card_Receipt'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Arbitration Agreement </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Arbitration_Agreement"  value="<?php echo isset($info['Arbitration_Agreement']) ? $info['Arbitration_Agreement'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:14px; padding:9px 0;"> Out of state Tax Form (Non-GA)</td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Out_of_state_Tax"  value="<?php echo isset($info['Out_of_state_Tax']) ? $info['Out_of_state_Tax'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> 8300 Form (Greater Than$10K) </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="8300_Form"  value="<?php echo isset($info['8300_Form']) ? $info['8300_Form'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:14px; padding:9px 0;"> Odometer Statement </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Odometer_Statement1"  value="<?php echo isset($info['Odometer_Statement1']) ? $info['Odometer_Statement1'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Secure POA </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Secure_POA"  value="<?php echo isset($info['Secure_POA']) ? $info['Secure_POA'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Power Of Atttorney </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Power_Of_Atttorney"  value="<?php echo isset($info['Power_Of_Atttorney']) ? $info['Power_Of_Atttorney'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:14px; padding:9px 0;"> Title Reassignment </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Title_Reassignment"  value="<?php echo isset($info['Title_Reassignment']) ? $info['Title_Reassignment'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
			    
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:9px 0;"> Notice to Co-Buyer </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;"> <input name="Notice_to_Co_Buyer"  value="<?php echo isset($info['Notice_to_Co_Buyer']) ? $info['Notice_to_Co_Buyer'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%; font-size:15px; padding:5px 0; font-weight:600;"> Funding </td>
				    <td style="width:40%; font-size:15px; padding:5px 0; text-align:center;">  </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Approval"  value="<?php echo isset($info['Approval']) ? $info['Approval'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0;"> Approval </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Contract1"  value="<?php echo isset($info['Contract1']) ? $info['Contract1'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0;"> Contract </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Credit_Application"  value="<?php echo isset($info['Credit_Application']) ? $info['Credit_Application'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Credit Application </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Buyer_Order"  value="<?php echo isset($info['Buyer_Order']) ? $info['Buyer_Order'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Buyer's Order </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Warranty_Contracts"  value="<?php echo isset($info['Warranty_Contracts']) ? $info['Warranty_Contracts'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Warranty Contracts </td>
				  </tr>
				</table>
				
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Agreement_provide_Insurance"  value="<?php echo isset($info['Agreement_provide_Insurance']) ? $info['Agreement_provide_Insurance'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Agreement to provide Insurance </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Invoice_or_Book"  value="<?php echo isset($info['Invoice_or_Book']) ? $info['Invoice_or_Book'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> New Unite Invoice or Book out Sheet  </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Odometer_Statement"  value="<?php echo isset($info['Odometer_Statement']) ? $info['Odometer_Statement'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Odometer Statement </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="MV1"  value="<?php echo isset($info['MV1']) ? $info['MV1'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> MV1 </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Driver_License_Insurance_Card"  value="<?php echo isset($info['Driver_License_Insurance_Card']) ? $info['Driver_License_Insurance_Card'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Driver's License & Insurance Card </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%; font-size:13px; padding:2px 0;"> <input name="Stips"  value="<?php echo isset($info['Stips']) ? $info['Stips'] : ''; ?>"  type="text" class="open_road_complate" /> </td>
				    <td style="width:80%; font-size:13px; padding:2px 0; "> Stips </td>
				  </tr>
				</table>
				
			     </td>
			  </tr>
			</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:35px;">
				  <tr>
				    <td style="width:50%; font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate2" /> <br /> Sales Manager Signature </td>
				    <td style="width:50%; font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate2" /> <br /> F & I Manager Signature </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="font-size:13px;"> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px;">
				  <tr>
				    <td style="font-size:18px; font-weight:600; padding:7px 10px; background:#ccc; color:#000;"> Who we are </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border-bottom:solid 1px #000; border-left:solid 1px #000; border-right:solid 1px #000;"> Who is Providing this notic ? </td>
				    <td style="width:60%; font-size:15px; padding:19px 10px; border-bottom:solid 1px #000; border-left:solid 1px #000; border-right:solid 1px #000;"> Open Roads Complete RV </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> How Does Open Roads Complete RV <br /> Protact my persnoal Information </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> To protect your personal Information from Unauthorized access and Use We Use Security measures that comply with Federal law. These measures inciude Computer safeguards and secured files and building </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> How Does Open Roads Complete RV <br /> Protact my persnoal Information </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> We collect your personal information, for, example, when you <br/> apply for financing <br/> give us your income information or provide employment information <br/> provide Account information or give us your contact information <br/> We also collect your personal information from other's such as credit <br/> bureaus, affiliates, or other companies.   </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> Why cant't I limit all sharing </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> Federal law gives you the right to limit only <br/> Sharing for affiliates everyday business purposes-information about <br/> your Credit worthiness <br/>  affiliates from useing your information to market to you<br/> sharing for nonaffiliates to market to you <br/> state law and individual comepanies may give to additional rights to <br/> limit sharing.    </td>
				  </tr>
				</table>


				   <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:18px; font-weight:600; padding:7px 10px; background:#ccc; color:#000;"> Definitions </td>
				  </tr>
				</table>
				
				
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> Affiliates </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> Companies related by common Ownership or control. they can be <br/> financial and nonfinancial companies.<br/> affiliates include companies with open Roads complete RV <br/> name and financial companies such as dealerships.  </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> Nonaffiliates </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> Companies related by common Ownership or control. they can be <br/> financial and nonfinancial companies. <br/> Open Road complete RV does not share with nonaffiliates so <br/> they can market to you .   </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
				    <td style="width:40%; font-size:15px; font-weight:600; padding:19px 10px; border:solid 1px #000; line-height:22px; vertical-align:top;"> Join Marketing  </td>
				    
				    <td style="width:60%; font-size:15px; padding:10px 10px; border:solid 1px #000; line-height:22px;"> A formal agreement between nonaffiliates financial that together market financial products or services to you. <br/> Our join marketing partners include  finance companies.   </td>
				  </tr>
				</table>
			       
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:18px; font-weight:600; padding:7px 10px; background:#ccc; color:#000;"> Other important information </td>
				  </tr>
				</table> 
				
				
			       <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
				    
				    <td style="font-size:15px; padding:10px 10px; height:80px; vertical-align:top; border:solid 1px #000; text-align:center; line-height:22px;"> I (WE)ACKNOWLEDGE THAT I WE RECEIVED A COPY OF THIS NOTICE.   </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
				    <td style="width:33%; font-size:15px; padding:19px 10px; "> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Print Customer Name  </td>
				    <td style="width:33%; font-size:15px; padding:19px 10px; "> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Customer signature </td>
				    <td style="width:33%; font-size:15px; padding:10px 10px;">  <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Date </td>
				  </tr>
				</table>
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr> 
				   <td style="width:33%; font-size:15px; padding:19px 10px; "> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Print Customer Name  </td>
				    <td style="width:33%; font-size:15px; padding:19px 10px; "> <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Customer signature </td>
				    <td style="width:33%; font-size:15px; padding:10px 10px;">  <input name="deal_data"  value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>"  type="text" class="open_road_complate3" /> <br/> Date </td>
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
