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
		.entry_one{ width:60%; border-bottom:solid 1px #FF9; border-top:none; background:none; padding:3px 0; border-left:none; border-right:none; margin-left:6px;}
		.entry_one_updated{ width:40%; border-bottom:solid 1px #FF9; border-top:none; background:none; padding:3px 0; border-left:none; border-right:none; margin-left:6px;}
		.crm_form_rv{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.crm_form_rv2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.crm_form_rv3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.crm_form_rv4{border: solid 2px #000 !important;
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
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #333; margin-top:10px;">
				  <tr>
				    <td style="font-size:20px; color:#333; font-weight:600; padding:9px 0; text-align:center;"> TOP SHEET </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Deal <input name="deal_data" value="<?php echo isset($info['deal_data']) ? $info['deal_data'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Deal / Delivery Date <input name="deal_date_data" value="<?php echo isset($info['deal_date_data']) ? $info['deal_date_data'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Salesperson <input name="salesperson_data" value="<?php echo isset($info['salesperson_data']) ? $info['salesperson_data'] : $info['sperson']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Trade VIN <input name="trade_vin_data" value="<?php echo isset($info['trade_vin_data']) ? $info['trade_vin_data'] : $info['vin_trade']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Buyer (Last Name)<input name="buyer_last_name" value="<?php echo isset($info['buyer_last_name']) ? $info['buyer_last_name'] : $info['last_name']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;">Trade year <input name="trade_year_data" value="<?php echo isset($info['trade_year_data']) ? $info['trade_year_data'] : $info['year_trade']; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;">Trade Stock #<input name="trade_stock_data" value="<?php echo isset($info['trade_stock_data']) ? $info['trade_stock_data'] : $info['stock_num_trade']; ?>" type="text"  class="entry_one_updated" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Buyer ( First & M.I) <input name="buyer_first_mi" value="<?php echo isset($info['buyer_first_mi']) ? $info['buyer_first_mi'] : $info['first_name']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Trade Make <input name="trade_make" value="<?php echo isset($info['trade_make']) ? $info['trade_make'] : $info['make_trade']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Buyer DOB <input name="buyer_dob" value="<?php echo isset($info['buyer_dob']) ? $info['buyer_dob'] : $info['dob']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Trade Model <input name="trade_model" value="<?php echo isset($info['trade_model']) ? $info['trade_model'] : $info['model_trade']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Buyer E-mail <input name="buyer_email" value="<?php echo isset($info['buyer_email']) ? $info['buyer_email'] : $info['email']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Trade Body Type <input name="trade_body_type" value="<?php echo isset($info['trade_body_type']) ? $info['trade_body_type'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Address <input name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;">Trade Mileage <input name="trade_mileage" value="<?php echo isset($info['trade_mileage']) ? $info['trade_mileage'] : $info['odometer_trade']; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:50%;">Trade Color<input name="trade_color" value="<?php echo isset($info['trade_color']) ? $info['trade_color'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				  </table>
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> City <input name="city_data" value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Pay Off To <input name="pay_off_to" value="<?php echo isset($info['pay_off_to']) ? $info['pay_off_to'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;">State <input name="state_data" value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;">Zip<input name="zip_data" value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : $info['zip']; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				     </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Account <input name="account_data" value="<?php echo isset($info['account_data']) ? $info['account_data'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Country  <input name="country_data" value="<?php echo isset($info['country_data']) ? $info['country_data'] : $info['country']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Address <input name="address_data2" value="<?php echo isset($info['address_data2']) ? $info['address_data2'] : $info['address']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Home Phone  <input name="home_phone_data" value="<?php echo isset($info['home_phone_data']) ? $info['home_phone_data'] : $info['phone']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> City, State, Zip <input name="city_state_zip_data" value="<?php echo isset($info['city_state_zip_data']) ? $info['city_state_zip_data'] : $info['city'].",".$info['state'].",".$info['zip']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Work Phone  <input name="work_phone" value="<?php echo isset($info['work_phone']) ? $info['work_phone'] : $info['mobile']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Pay Off Phone <input name="pay_off_phone" value="<?php echo isset($info['pay_off_phone']) ? $info['pay_off_phone'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Co Buyer (Last Name)  <input name="co_buyer_lastname" value="<?php echo isset($info['co_buyer_lastname']) ? $info['co_buyer_lastname'] : $info['spouse_last_name']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Spoke With <input name="spoke_with" value="<?php echo isset($info['spoke_with']) ? $info['spoke_with'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Co Buyer (First & M.I)  <input name="co_buyer_firstmi" value="<?php echo isset($info['co_buyer_firstmi']) ? $info['co_buyer_firstmi'] : $info['spouse_first_name']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:33%;">PO Amt $ <input name="po_amt" value="<?php echo isset($info['po_amt']) ? $info['po_amt'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:33%;">Good Til <input name="good_til" value="<?php echo isset($info['good_til']) ? $info['good_til'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:33%;">Per Deim <input name="per_deim" value="<?php echo isset($info['per_deim']) ? $info['per_deim'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				</table>
				  
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Co Buyer E-mail <input name="co_buyer_email" value="<?php echo isset($info['co_buyer_email']) ? $info['co_buyer_email'] : $info['email']; ?>" type="text"  class="entry_one" /> </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Insurance Company<input name="insurance_company" value="<?php echo isset($info['insurance_company']) ? $info['insurance_company'] : ''; ?>" type="text"  class="entry_one" /> </td>
				  </tr>
				</table>

				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;">
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:33%;">Sold Stock<input name="sold_stock" value="<?php echo isset($info['sold_stock']) ? $info['sold_stock'] : $info['stock_num']; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:33%;"> Sold Year <input name="sold_year" value="<?php echo isset($info['sold_year']) ? $info['sold_year'] : $info['year']; ?>" type="text"  class="entry_one_updated" /></td>
					  </tr>
					</table>
				      </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Policy <input name="Policy" value="<?php echo isset($info['Policy']) ? $info['Policy'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold Make  <input name="sold_make" value="<?php echo isset($info['sold_make']) ? $info['sold_make'] : $info['make']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Agent Name <input name="agent_name" value="<?php echo isset($info['agent_name']) ? $info['agent_name'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold Model  <input name="sold_model" value="<?php echo isset($info['sold_model']) ? $info['sold_model'] : $info['model']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Address <input name="address3" value="<?php echo isset($info['address3']) ? $info['address3'] : $info['address']; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>
				  
				   <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;">
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:33%;">Sold  <input name="sold2" value="<?php echo isset($info['sold2']) ? $info['sold2'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:33%;"> Sold Year <input name="sold_year2" value="<?php echo isset($info['sold_year2']) ? $info['sold_year2'] : $info['year']; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				      </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Policy <input name="Policy1" value="<?php echo isset($info['Policy1']) ? $info['Policy1'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold Make  <input name="Sold_Make2" value="<?php echo isset($info['Sold_Make2']) ? $info['Sold_Make2'] : $info['make']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Agent Name  <input name="Agent_Name2" value="<?php echo isset($info['Agent_Name2']) ? $info['Agent_Name2'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold Model  <input name="sold_model2" value="<?php echo isset($info['sold_model2']) ? $info['sold_model2'] : $info['model']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Address  <input name="address4" value="<?php echo isset($info['address4']) ? $info['address4'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;">
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:70%;">Sold Cylinders <input name="Sold_Cylinders" value="<?php echo isset($info['Sold_Cylinders']) ? $info['Sold_Cylinders'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:10%;"> N </td>
					     <td style="width:10%;"> U </td>
					     <td style="width:10%;"> D </td>
					  </tr>
					</table>
				      </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> City, State, Zip <input name="city_state_zip_data2" value="<?php echo isset($info['city_state_zip_data2']) ? $info['city_state_zip_data2'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold Body Type  <input name="Sold_Body_Type" value="<?php echo isset($info['Sold_Body_Type']) ? $info['Sold_Body_Type'] : ''; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Phone  <input name="phone_data2" value="<?php echo isset($info['phone_data2']) ? $info['phone_data2'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Sold VIN <input name="Sold_VIN2" value="<?php echo isset($info['Sold_VIN2']) ? $info['Sold_VIN2'] : $info['vin']; ?>" type="text"  class="entry_one" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> Verified  <input name="Verified" value="<?php echo isset($info['Verified']) ? $info['Verified'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;">  Car Added <input name="Car_Added" value="<?php echo isset($info['Car_Added']) ? $info['Car_Added'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> Sold mileage  <input name="Sold_mileage" value="<?php echo isset($info['Sold_mileage']) ? $info['Sold_mileage'] : $info['odometer']; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:50%;"> Sold color <input name="Sold_Color" value="<?php echo isset($info['Sold_Color']) ? $info['Sold_Color'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				     </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> Eff Date <input name="Eff_Date" value="<?php echo isset($info['Eff_Date']) ? $info['Eff_Date'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;"> Exp Date <input name="Exp_Date" value="<?php echo isset($info['Exp_Date']) ? $info['Exp_Date'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:60%;"> Title Upon Funding <input name="Title_Upon_Funding" value="<?php echo isset($info['Title_Upon_Funding']) ? $info['Title_Upon_Funding'] : ''; ?>" type="text"  class="entry_one_updated" /> </td>
					    <td style="width:40%;"> Unit <input name="Unit_data" value="<?php echo isset($info['Unit_data']) ? $info['Unit_data'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					  </tr>
					</table>
				     </td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> 
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> Comp. Deduct <input name="Comp_Deduct" value="<?php echo isset($info['Comp_Deduct']) ? $info['Comp_Deduct'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					    <td style="width:50%;"> Coll Deduct <input name="Coll_Deduct" value="<?php echo isset($info['Coll_Deduct']) ? $info['Coll_Deduct'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
					  </tr>
					</table>
				     </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border-left:solid 1px #000; padding:5px 4px;"> Title Upon Funding and Check Clear  <input name="Title_Upon_Funding" value="<?php echo isset($info['Title_Upon_Funding']) ? $info['Title_Upon_Funding'] : ''; ?>" type="text"  class="entry_one_updated" /></td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;">   </td>
				  </tr>
				</table>


				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border-left:solid 1px #333; padding:5px 4px;">
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td style="width:50%;"> Unit  <input name="Unit_data3" value="<?php echo isset($info['Unit_data3']) ? $info['Unit_data3'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;"> Date <input name="Data" value="<?php echo isset($info['Data']) ? $info['Data'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					  <tr>
					    <td style="width:50%;"> Title Immediately  <input name="Title_Immediately" value="<?php echo isset($info['Title_Immediately']) ? $info['Title_Immediately'] : ''; ?>" type="text"  class="entry_one" /></td>
					    <td style="width:50%;"> Unit <input name="unit5" value="<?php echo isset($info['unit5']) ? $info['unit5'] : ''; ?>" type="text"  class="entry_one" /></td>
					  </tr>
					</table>
				      </td>
				    <td style="font-size:14px; width:50%; color:#333; border-left:solid 1px #333; border-right:solid 1px #333; padding:5px 4px;">  </td>
				  </tr>
				</table>

				<table width="100%" border="1" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333; border-left:solid 1px #333;  padding:5px 4px;">&nbsp;</td>
				    <td style="font-size:14px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> &nbsp;  </td>
				  </tr>
				</table>

				<table width="100%" border="1" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; width:50%; color:#333;  border-left:solid 1px #333;  padding:5px 4px;">&nbsp;</td>
				    <td style="font-size:16px; width:50%; color:#333; border:solid 1px #333; padding:5px 4px;"> Note. service Data if Demo  </td>
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
