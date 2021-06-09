<?php
$dealer_not_tax_payoff = array(2501,576);
$dealer_id_array = array(1606,62000,762);

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');
$dealer_id =$cid;
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

?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container">
		<style>
			body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}
			.wrk_frm3{ width:60%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm{ width:70%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm2{ width:80%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm3{background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frmdesc{ width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm4{ width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm41{ width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm_model{font-size:10px; width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
			.wrk_frm31{ width:70%; background:none; border-bottom:solid 1px #646464; border-top:none;border:2px solid #646464; border-right:none; border-left:none;}
			.dealer_dropdown{
			 float:right;
			 width:100%;
			 border-right:solid 1px #000; 
			 border-top:solid 1px #000; 
			 padding-left:5px; 
			 font-size:11px; 
			 height:32px; 
			 text-align:left;
			 color:#000;
			}
			#dealer_service_fees_dropdown {
			    line-height: 14px;
			    height: 28px;
			    margin-top: 2px;
			}
			.left-side, .right-side{border: 1px solid #000; float: left; width: 48%; margin: 1% 1%; box-sizing: border-box; padding: 0px 8px;}
			.left-side input[type="text"], .right-side input[type="text"]{border: 0px; height: 25px;}
			.left-side label, .right-side label{font-weight: normal; color: #777; margin: 0px; font-size: 12px;}
			#term_notes{height:90px;}
			.wraper.main input { padding: 1px;}
			.trade_info {
				width:92.5%;
				}
			.small {
				height: 25px;
			}
			.unit_left {width:70%; float:left;}
			.unit_right {
				width:30%;
				float: left;
			}
			@media print {
				.wrk_frm4{ width:80%;font-size:9px !important; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
				.wrk_frm41{ width:80%;font-size:9px !important;  background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
				.wrk_frm_model{font-size:9px; width:80%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
				#term_notes{height:70px;}
				.wrk_frm31{ width:70%; font-size:9px !important; background:none; border-bottom:solid 1px #646464; border-top:none;border:2px solid #646464; border-right:none; border-left:none;}
				.wrk_frm_model{font-size:10px !important; width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;} 
				#dealer_service_fees_dropdown {
					line-height: 14px !important;
					height: 12px !important;
					margin-top: 4px !important;
					width:50px !important;
					font-size:6px !important;
				}
				#fixedfee_selection,.price_options,.noprint {
					display: none;
				}
				#worksheet_container{}
				.dealer_dropdown{
					float:right;
					width:100%;
					border-right:solid 1px #000; 
					border-top:solid 1px #000; 
					padding-left:5px; 
					font-size:5px; 
					height:20px !important; 
					text-align:left;
					color:#000;

				}
				.trade_info {
					width:92.5%;
				}
				.unit_left {
					width:70%; 
					float:left;
				}
				.unit_right {
					width:30%; 
					float:left;
				}
				table{margin-top:0px !important;}
				td{
					height:15px !important;
					font-size:8px !important;
				}
				.small {
					height: 25px !important;
				}
				.form_title {
					height: 25px !important;
				}
				.service {
					height: 50px !important;
				}
				input[type=text]{
					height:13px !important;
				}
				.left-side label, .right-side label{font-size: 9px;}
				.left-side label, .left-side label{font-size: 10px!important; padding: 3px 0 !important;}
				.print_mng_width {width:50% !important;}
				

				.customer_class {
					height:28px !important;
					line-height:20px !important;
					font-size: 9px !important;
				}
				/*.customer_input_class { height:18px !important; }*/
				.manager_class {
					height:28px !important;
					line-height:20px !important;
					font-size: 9px !important;
				}
				/*.manager_input_class { height:18px !important; }*/
			}
		</style>
		<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
		$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

		if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
		{
			$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
		}


		?>
		<div class="wraper header"> 
			
				<input name="contact_id" type="hidden"  value="<?php echo $contact['Contact']['id']; ?>" />
				 <?php  if($edit){?>
					<input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
					<?php } ?>
					<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
					<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
					<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
					<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
					<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
					<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
					<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
					<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
					<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
					<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
					<input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
					 <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  />   
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr style="background:#2E3069;">
				<td style="text-align:center;font-size:24px; font-weight:bold; color:#fff;">
				<img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/header.png'); ?>" alt="">
				</td>
			  </tr>
			</table>


		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:100%; background:#2E3069; height:25px;"></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:30%;"></td>
			<td style=" width:45%; font-size:14px; font-weight:600;">SALESPERSON <input name="salesperson"   value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>"   type="text" class="wrk_frm" /></td>
			<td style=" width:25%; font-size:14px; font-weight:600;">DATE <input name="date"   value="<?php echo date("Y-m-d h:i:s") ?>"  type="text" class="wrk_frm2" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%; background:#2E3069; color:#fff; font-size:14px; font-weight:600; padding:5px 5px;">BUYER</td>
			<td style=" width:50%; background:#2E3069; color:#fff; font-size:14px; font-weight:600; padding:5px 5px;">Co Buyer</td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">NAME <input name="name"   value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">NAME <input name="name_data"   value="<?php echo isset($info['name_data']) ? $info['name_data'] : $info['spouse_first_name']." ". $info['spouse_last_name']; ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">ADDRESS <input name="address_data1"   value="<?php echo isset($info['address_data1']) ? $info['address_data1'] : $info['address']; ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">ADDRESS <input name="address_data2"   value="<?php echo isset($info['address_data2']) ? $info['address_data2'] : $info['address']; ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">CITY, ST, ZIP <input name="city_data1"   value="<?php echo isset($info['city_data1']) ? $info['city_data1'] : $info['city'].','.$info['state'].','.$info['zip']; ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">CITY, ZIP <input name="city_data2"   value="<?php echo isset($info['city_data2']) ? $info['city_data2'] : $info['city'].','.$info['zip']; ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">PHONE # <input name="phone_data1"   value="<?php echo isset($info['phone_data1']) ? $info['phone_data1'] : $info['mobile']; ?>"   type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">PHONE # <input name="phone_data2"   value="<?php echo isset($info['phone_data2']) ? $info['phone_data2'] : $info['phone']; ?>"   type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">DL # <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">DL # <input name="dl1"   value="<?php echo isset($info['dl1']) ? $info['dl1'] : "" ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">DOB <input name="dob_data"   value="<?php echo isset($info['dob_data']) ? $info['dob_data'] : $info['dob']; ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">DOB <input name="dob_data1"   value="<?php echo isset($info['dob_data1']) ? $info['dob_data1'] : ""; ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">E-MAIL <input name="email"   value="<?php echo isset($info['email']) ? $info['email'] : $info['email']; ?>"  type="text" class="wrk_frm3" /></td>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">E-MAIL <input name="email1"   value="<?php echo isset($info['email1']) ? $info['email1'] : $info['email1']; ?>"  type="text" class="wrk_frm3" /></td>
		  </tr>
		</table>

		<table border="1" width="100%" border="0" cellspacing="0" cellpadding="0" 		style="border:solid 1px #000;">
			<tr>
				<td style="background:#2E3069; width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">NEW/USED</td>
				<td style="background:#2E3069; width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">YEAR</td>
				<td style="background:#2E3069; width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MODEL</td>
				<td style="background:#2E3069; width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">VIN NUMBER</td>
				<td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MSRP</td>
				<td style="background:#2E3069; width:12%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">SALE PRICE</td>
			</tr>
		</table>


        
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
            <tr>
                <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">              
                	<input name="condition1" id="condition1"   value="<?php echo (isset($info['condition1']) && !empty($info['condition1'])) ? $info['condition1'] : $info['condition']; ?>" style="width:100%" type="text" class="wrk_frm4" />
                </td>
              	<td style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="year1" id="year1"   value="<?php echo (isset($info['year1']) && !empty($info['year1'])) ? $info['year1'] : $info['year']; ?>"  type="text" style="width:100%" class="wrk_frm4 quality" />
              	</td>
              	<td style="width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="model1" id="model1"   value="<?php echo (isset($info['model1'])&& !empty($info['model1'])) ? $info['model1'] : $info['model']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />
                </td>
              	<td style="width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="vin1" id="vin1"   value="<?php echo (isset($info['vin1'])&& !empty($info['vin1'])) ? $info['vin1'] : $info['vin']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
               <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="unit_value1" id="unit_value1"   value="<?php echo (isset($info['unit_value1'])&& !empty($info['unit_value1'])) ? $info['unit_value1'] : $info['unit_value']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
                <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="sales_price1" id="1"  value="<?php echo isset($info['sales_price1']) ? $info['sales_price1'] : ''; ?>" type="text" class="wrk_frm31 sale_price" />
                </td>
			</tr>
			<tr>
                <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">               
                	<input name="condition2" id="condition2"   value="<?php echo (isset($info['condition2']) && !empty($info['condition2'])) ? $info['condition2'] : $addonVehicles[0]['AddonVehicle']['condition']; ?>" style="width:100%" type="text" class="wrk_frm4" />
                </td>
              	<td style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="year2" id="year2"   value="<?php echo (isset($info['year2']) && !empty($info['year2'])) ? $info['year2'] : $addonVehicles[0]['AddonVehicle']['year']; ?>"  type="text" style="width:100%" class="wrk_frm4 quality" />
              	</td>
              	<td style="width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="model2" id="model2"   value="<?php echo (isset($info['model2'])&& !empty($info['model2'])) ? $info['model2'] : $addonVehicles[0]['AddonVehicle']['model']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />
                </td>
              	<td style="width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="vin2" id="vin2"   value="<?php echo (isset($info['vin2'])&& !empty($info['vin2'])) ? $info['vin2'] : $addonVehicles[0]['AddonVehicle']['vin']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
               	<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="unit_value2" id="unit_value2"   value="<?php echo (isset($info['unit_value2'])&& !empty($info['unit_value2'])) ? $info['unit_value2'] : $addonVehicles[0]['AddonVehicle']['unit_value']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
                <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	 <input name="sales_price2" id="2" value="<?php echo isset($info['sales_price2']) ? $info['sales_price2'] : ''; ?>"  type="text" class="wrk_frm31 sale_price" />
                </td>
			</tr>
			<tr>
                <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">               
                	<input name="condition3" id="condition3"   value="<?php echo (isset($info['condition3']) && !empty($info['condition3'])) ? $info['condition3'] : $addonVehicles[1]['AddonVehicle']['condition']; ?>" style="width:100%" type="text" class="wrk_frm4" />
                </td>
              	<td style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="year3" id="year3"   value="<?php echo (isset($info['year3']) && !empty($info['year3'])) ? $info['year3'] : $addonVehicles[1]['AddonVehicle']['year']; ?>"  type="text" style="width:100%" class="wrk_frm4 quality" />
              	</td>
              	<td style="width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="model3" id="model3"   value="<?php echo (isset($info['model3'])&& !empty($info['model3'])) ? $info['model3'] : $addonVehicles[1]['AddonVehicle']['model']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />
                </td>
              	<td style="width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="vin3" id="vin3"   value="<?php echo (isset($info['vin3'])&& !empty($info['vin3'])) ? $info['vin3'] : $addonVehicles[1]['AddonVehicle']['vin']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
               	<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	<input name="unit_value3" id="unit_value3"   value="<?php echo (isset($info['unit_value3'])&& !empty($info['unit_value3'])) ? $info['unit_value3'] : $addonVehicles[1]['AddonVehicle']['unit_value']; ?>" style="width:100%" type="text" class="wrk_frm41 quality" />		   
        
               	</td>
                <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
                	 <input name="sales_price3" id="3" value="<?php echo isset($info['sales_price3']) ? $info['sales_price3'] : ''; ?>"  type="text" class="wrk_frm31 sale_price" />
                </td>
			</tr>
			 <tr>
				<td colspan="5" align="right">RIVER VALLEY DISCOUNT</td>
                <td style="width:15%;" >
                  <input name="river_valley_discount" value="<?php echo isset($info['river_valley_discount']) ? $info['river_valley_discount'] : ''; ?>"  type="text" id="river_valley_discount" class="wrk_frm31 subtotalval_test" />
                  <input name="salesprice_total" type="hidden" id="salesprice_total" class="wrk_frm31 subtotalval" />
              </td>		  
			</tr>
		</table>

		<table border="1" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			<tr>
				<td style="background:#2E3069; width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">ACCESSORIES</td>
				<td style="background:#2E3069; width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">QTY</td>
				<td style="background:#2E3069; width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">PART NUMBER</td>
				<td style="background:#2E3069; width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">DESCRIPTION</td>
				<!--<td style="background:#2E3069; width:9%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">HOURS</td>
				<td style="background:#2E3069; width:9%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">RATE</td>-->
				<td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">PRICE</td>
				<td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px;">&nbsp;</td>
			</tr>
		</table>

		<?php $row_number = (in_array(AuthComponent::user('dealer_id'), $dealer_id_array)) ? 15 : 15; ?>
		<?php for($i=1; $i<= $row_number; $i++) { ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
				<tr>
					<td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
						<input name="accessories<?php echo $i; ?>" id="accessories<?php echo $i; ?>" value="<?php echo isset($info['accessories'.$i]) ? $info['accessories'.$i] : "" ?>" type="text" class="wrk_frm4 quality" />
					</td>
					<td style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					  	<input name="quantity<?php echo $i; ?>" id="quantity<?php echo $i; ?>" value="<?php echo isset($info['quantity'.$i]) ? $info['quantity'.$i] : "" ?>" type="text" class="wrk_frm4 quality" />
					</td>
					<td style="width:25%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
						<input name="part_number<?php echo $i; ?>" value="<?php echo isset($info['part_number'.$i]) ? $info['part_number'.$i] : "" ?>" type="text" class="wrk_frm4" />
					</td>
				    <td style="width:32%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
				   		<input name="description<?php echo $i; ?>" value="<?php echo isset($info['description'.$i]) ? $info['description'.$i] : "" ?>" type="text" class="wrk_frmdesc" />
				    </td>
				    <!--</td>
				   	<td colspan="2" style="width:9%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">-->
				   		<input name="hours<?php echo $i; ?>" id="hours<?php echo $i; ?>" value="<?php echo isset($info['hours'.$i]) ? $info['hours'.$i] : "0" ?>" type="hidden" class="wrk_frmdesc additional" />
				   	<!--</td>
				   	<td colspan="2" style="width:9%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">-->
			   			<input name="rate<?php echo $i; ?>" id="rate<?php echo $i; ?>" value="<?php echo isset($info['rate'.$i]) ? $info['rate'.$i] : "0" ?>" type="hidden" class="wrk_frmdesc additional" />
				   	</td>
				   	<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
				   		<input id="<?php echo $i; ?>" name="price<?php echo $i; ?>" value="<?php echo isset($info['price'.$i]) ? $info['price'.$i] : "" ?>" type="text" style="width:100%;"  class="wrk_frm4 currency price_set"/>
				   	</td>			
				   	<td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
						<input id="price_qty_val<?php echo $i; ?>" name="price_qty_val<?php echo $i; ?>" value="<?php echo isset($info['price_qty_val'.$i]) ? $info['price_qty_val'.$i] : "" ?>" readonly="readonly"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
				   	</td>
				</tr>
			</table>
		<?php } ?>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
			<tr>
				<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
				<td colspan="6" style="width:50%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<textarea placeholder="TERMS / NOTES" name="term_notes" id="term_notes" style="width: 100%; border: 0px;"><?php echo isset($info['term_notes'])?$info['term_notes']:''; ?></textarea>
				</td>
				<td  style="width:6.8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<input id="price_qty_val16" name="price_qty_val16" value="<?php echo isset($info['price_qty_val16']) ? $info['price_qty_val16'] : "" ?>" readonly="readonly"  type="text" style="width:100%;" class="wrk_frm4 currency" />
					<input id="price_qty_val16" name="price_qty_val16" value="<?php echo isset($info['price_qty_val16']) ? $info['price_qty_val16'] : "" ?>" readonly="readonly"  type="text" style="width:100%;" class="wrk_frm4 currency" />
					<input id="price_qty_val16" name="price_qty_val16" value="<?php echo isset($info['price_qty_val16']) ? $info['price_qty_val16'] : "" ?>" readonly="readonly"  type="text" style="width:100%;" class="wrk_frm4 currency" />
					<input id="price_qty_val16" name="price_qty_val16" value="<?php echo isset($info['price_qty_val16']) ? $info['price_qty_val16'] : "" ?>" readonly="readonly"  type="text" style="width:100%;" class="wrk_frm4 currency" /> 
				</td>		   
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			<tr>
				<!--<td style="background:#2E3069; width:70%; border-right:solid 1px #000; text-align:center; padding:3px 0; padding-left:5px; font-size:14px; color:#fff;">DEPOSIT INFORMATION</td>
				<td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;text-align:right;">UNIT TOTAL&nbsp;</td>
				<td style=" width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">-->
					<input  id="unit_total" class="currency"  name="unit_total" value="<?php echo isset($info['unit_total']) ? $info['unit_total'] : "" ?>"  type="hidden" style="width:100%;" />		   
				<td style="background:#2E3069; width:100%; border-right:solid 1px #000; padding:3px 0; padding-left:5px; color:#fff;"></td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;  border-right:solid 1px #000; border-left:solid 1px #000; position: relative;">
			<tr>
				<td style="width:64.6%; position: relative; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
					<textarea placeholder="DEPOSIT INFO" name="deposit_info" style="position: absolute; width: 100%; top: 0px; left: 0px; height: 52px; border: 0px; z-index: 999;"><?php echo isset($info['deposit_info'])?$info['deposit_info']:''; ?></textarea>
				</td>
				<td style="width:5.3%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;"></td>
				<td style="width:18.1%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; text-align:right; color:#000;padding-right:4px;">PARTS</td>
				<td style="width:20%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000; border-bottom: 1px solid #000;">
					<input name="partsval" id="parts" value="<?php echo isset($info['partsval']) ? $info['partsval'] : '0'; ?>"  type="text" class="wrk_frm31 subtotalval currency" /></td>
				</td>
				<!--<td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;text-align:right;">LESS DEPOSIT</td>
				<td style="width:15%; border-right:solid 1px #000; padding-left:5px; border-bottom: 1px solid #000; font-size:14px; color:#000;">-->
					<input name="less_deposit"   value="<?php echo isset($info['less_deposit']) ? $info['less_deposit'] : '0'; ?>"  type="hidden" class="wrk_frm31 currency" id="less_deposit" />
				<!--</td>-->
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-right:solid 1px #000; border-left:solid 1px #000;">
			<tr>
				<td style="width:64.6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
				<td style="width:5.3%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;"></td>
				<td style="width:18.1%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; text-align:right; color:#000;padding-right:4px;">LABOR TO INSTALL</td>
				<td style="width:20%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;">
					<input name="labor_to_install" id="labor_to_install"   value="<?php echo isset($info['labor_to_install']) ? $info['labor_to_install'] : '0'; ?>"  type="text" class="wrk_frm31 subtotalval currency" />
				</td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
			<tr>
				<td style="width:64.6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
				<td style="width:5.3%; border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;"></td>
				<td style="width:18.1%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000; padding-right:4px;">SUBTOTAL</td>
				<td style="width:20%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<input name="sub_totalcal" id="sub_totalcal"  value="<?php echo isset($info['sub_totalcal']) ? $info['sub_totalcal'] : '0'; ?>"  type="text" class="wrk_frm31 currency" />
				</td>
			</tr>
		</table>

		<table width="69.9%" class="unit_left" border="2" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
			<tr>
				<td class="trade_info" style="background:#2E3069; border-right:solid 1px #000; font-size:14px; height:25px; color:#fff;">TRADE INFO:</td>
				<td style="border-right:solid 1px #000; padding-left:5px; font-size:14px; border-bottom: 1px solid #000; color:#000;"></td>
			</tr>
			
			<tr>
				<td style="width:92.4%;">
					<span class="left-side">
						<h5 style="font-weight: bold; padding: 8px 0;">TRADE 1</h5>
						<span class="form-field" style="float: left; width: 100%;">
							<label>YEAR/MAKE</label>
							<input type="text" name="year_make_trade" value="<?php echo isset($info['year_make_trade']) ? $info['year_make_trade'] : $info['year_trade'].' '.$info['make_trade']; ?>" style="width: 60%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>MODEL/MOTOR</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>MILES/HOURS</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>VALUE</label>
							<input type="text" name="trade_value1" value="<?php echo isset($info['trade_value1']) ? $info['trade_value1'] : $info['trade_value']; ?>" id="trade_value1" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 70%;">
							<input type="checkbox" name="trade_check_in1"  value="yes" <?php echo (isset($info['trade_check_in1']) && $info['trade_check_in1]'] == 'yes')?'checked':''; ?> />
							<label>TRADE CHECK IN</label>
						</span>
						
						<span class="form-field" style="float: left; width: 30%;">
							<input type="checkbox" name="evaluation2"  value="yes" <?php echo (isset($info['evaluation2']) && $info['evaluation2'] == 'yes')?'checked':''; ?> />
							<label>EVAL</label>
						</span>
					</span>
					<span class="left-side">
						<h5 style="font-weight: bold; padding: 8px 0;">TRADE 2</h5>
						<span class="form-field" style="float: left; width: 100%;">
							<label>YEAR/MAKE</label>
							<input type="text" name="year_make2" value="<?php echo isset($addontrade_vehicle['AddonTradeVehicle']['year']) ? $addontrade_vehicle['AddonTradeVehicle']['year'].' '.$addontrade_vehicle['AddonTradeVehicle']['make'] : ''; ?>" style="width: 60%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>MODEL/MOTOR</label>
							<input type="text" name="model_trade2" value="<?php echo isset($addontrade_vehicle['AddonTradeVehicle']['model']) ? $addontrade_vehicle['AddonTradeVehicle']['model'] : ''; ?>" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>MILES/HOURS</label>
							<input type="text" name="odometer_trade2" value="<?php echo isset($addontrade_vehicle['AddonTradeVehicle']['odometer']) ? $addontrade_vehicle['AddonTradeVehicle']['odometer'] : ''; ?>" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 100%;">
							<label>VALUE</label>
							<input type="text" name="trade_value2" id="trade_value2" value="<?php echo isset($addontrade_vehicle['AddonTradeVehicle']['unit_value']) ? $addontrade_vehicle['AddonTradeVehicle']['unit_value'] : ''; ?>" style="width: 40%;">
						</span>
						
						<span class="form-field" style="float: left; width: 70%;">
							<input type="checkbox" name="trade_check_in2"  value="yes" <?php echo (isset($info['trade_check_in2']) && $info['trade_check_in2'] == 'yes')?'checked':''; ?> />
							<label>TRADE CHECK IN</label>
						</span>
						
						<span class="form-field" style="float: left; width: 30%;">
							<input type="checkbox" name="evaulation2" value="yes" <?php echo (isset($info['evaulation2']) && $info['evaulation2'] == 'yes')?'checked':''; ?> />
							<label>EVAL</label>
						</span>
					</span>
					<td class="small_field" style="font-size:14px; color:#000; vertical-align: top;">
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%; border-bottom: 1px solid #000;"></div>
						<div class="form-field small" style="width: 100%;"></div>
					</td>
				</td>
			</tr>
			
			<tr class="customer_class" style="width:100%; height:55px;">
				<td class="customer_class" style="width:92.4%; height:55px;padding: 0px">
					<div class="print_mng_width customer_class" style="width:45%; height:55px; padding-left:5px; background:#FF0; font-size:16px; color:#000; float:left; text-align:center; font-weight:bold;line-height: 55px;">
						CUSTOMER SIGNATURE
					</div>
					<div class="print_mng_width customer_class" style="width:55%; height:55px; padding-left:5px; font-size:13px; color:#000; float:left;">
						<input class="customer_input_class" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>"  type="text" class="wrk_frm31" style="width:100%;height:53px;"/>
						MANAGER APPROVAL
					</div>
				</td>
				<td style="border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"> </td>
			</tr>
			
			<?php /*<tr>
				<td style="width:45%; padding-left:5px; font-size:13px; background:#FF0; height:20px; color:#000;">SIGNATURE</td>
				<td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
				<td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
				<td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">
					<input name="referred_by" placeholder="REFERRED BY"  value="<?php echo isset($info['referred_by']) ? $info['referred_by'] : ''; ?>"  type="text" class="wrk_frm31" />
				</td>
				<td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
				<!--<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>-->
			</tr> */ ?>
			
			 <tr class="manager_class" style="width:100%; height:55px;">
				<td class="manager_class" style="width:92.4%; height:55px;padding: 0px">
					<div class="print_mng_width manager_class" style="width:45%; height:55px; padding-left:5px; background:#F00; font-size:16px; color:#000; float:left; text-align:center; font-weight:bold;line-height: 55px;">
						MANAGER APPROVAL
					</div>
					<div class="print_mng_width manager_class" style="width:55%; height:55px; padding-left:5px; font-size:13px; color:#000; float:left;">
						<input class="manager_input_class" name="manager_approval" value="<?php echo isset($info['manager_approval']) ? $info['manager_approval'] : ''; ?>"  type="text" class="wrk_frm31" style="width:100%;height:53px;"/>
					</div>
				</td>
				<td style="border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"> </td>
			</tr>
			
			<!--<tr>
				<td style="width:45%; padding-left:5px; font-size:13px; background:#F00; height:20px; color:#000;">SIGNATURE</td>
				<td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
				<td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>-->
		</table>

		<table class="unit_right" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
			<tr>
				<td style="border-right:solid 1px #000;  border-top:solid 1px #000; font-size:14px; height:20px; text-align:right; color:#000; padding-right:4px;">TRADE IN VALUE</td>
				<td style="border-right:solid 1px #000;  border-top:solid 1px #000;font-size:14px; color:#000; padding-left: 5px;">
					<?php
						$trade_in_value = 0;
						$trade_in_value = $info['trade_value']+$addontrade_vehicle['AddonTradeVehicle']['unit_value'];
						if(empty($trade_in_value)){
							$trade_in_value = 0;
						}
					?>
					<input name="trade_in_value" id="trade_in_value"  value="<?php echo $trade_in_value; ?>"  type="text" class="wrk_frm31 currency" />
				</td>
			</tr>
			
			<tr>
				<td class="service" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:12px; height:50px; text-align:right; color:#000; padding-right:4px;">
					<select name="dealer_service_fees_dropdown" id="dealer_service_fees_dropdown" style="width:100%;font-size:10px;">	
						<option value="0.00">Choose Fees</option>			
						<?php 
							foreach($DealFixedfeeslist as $list){
						?>
						<option value="<?php echo $list['DealFixedfee']['doc_fee']; ?>"><?php echo $list['DealFixedfee']['condition']; ?></option>
						<?php
						}?>
					</select><br/>
					DEALER SERVICES FEE
				</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<input name="dealer_service_fees" id="dealer_service_fees"   value="<?php echo isset($info['dealer_service_fees']) ? $info['dealer_service_fees'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
				</td>
			</tr>
			
			<tr>
				<td class="form_title" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000; padding-right:4px;">TAXABLE TOTAL
				</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<input name="taxable_total"  id="taxable_valtotal" value="<?php echo isset($info['taxable_total']) ? $info['taxable_total'] : ''; ?>"  type="text" class="wrk_frm31 currency_value" />
				</td>
			</tr>

			<tr>
				<td class="form_title" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:25px; text-align:right; color:#000;">&nbsp;</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
					<input name="credit_info"   value="<?php echo isset($info['credit_info']) ? $info['credit_info'] : ''; ?>"  type="hidden" class="wrk_frm31 currency" />
				</td>
			</tr>
			
			<tr>
				<td class="form_title" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000; padding-right:4px;">MN/WI SALES TAX</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
					<input name="sales_tax" id="sales_tax"  value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>"  type="text" class="wrk_frm31 currency_value" />
				</td>
			</tr>
			
			<tr>
				<td class="form_title" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; font-size:14px; height:20px; text-align:right; color:#000; padding-right:4px;">WARRANTY/EXT SERVICE</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
					<input name="ext_services" id="ext_services"   value="<?php echo isset($info['ext_services']) ? $info['ext_services'] : ''; ?>"  type="text" class="wrk_frm31 currency_value" />
				</td>
			</tr>
			
			<tr>
				<td class="form_title" style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:26px; text-align:right; color:#000; padding-right:4px;">LICENSE FEE</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
					<input name="license_fees"   value="<?php echo isset($info['license_fees']) ? $info['license_fees'] : ''; ?>"  type="text" id="license_fee" class="wrk_frm31 currency_value" />
				</td>
			</tr>
			
			<tr>
				<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;"></td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>

			<tr>
				<td style="width:60%; border-right:solid 1px #000; padding-left:5px; font-size:20px; height:36px; text-align:right; color:#000; padding-right:4px;">TOTAL</td>
				<td style="width:40%; border-right:solid 1px #000; background:#ccc; padding-left:5px; font-size:14px height:20px; color:#000;"><input name="total" id="cal_total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" type="text" class="wrk_frm31 currency" /></td>
			</tr>
			
			<tr>
				<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; padding-right:4px; font-size:10px; height:28px; text-align:right; color:#000;">DEPOSIT RECEIVED</td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"><input name="deposit_received" value="<?php echo isset($info['deposit_received']) ? $info['deposit_received'] : ''; ?>" type="text" class="wrk_frm31 currency" /></td>
			</tr>

			<tr>
				<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:28px; text-align:right; color:#000;"></td>
				<td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>

		</table>
		</div>
		<!---left1-->
		</br>
		<span class="span24" style="width:28%">&nbsp;</span>
		<span class="span24" style="width:40%">&nbsp;</span>
		<span class="span24" style="width:28%">&nbsp;</span>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->
	<div style="clear:both"></div>
	
	<br/>	
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>
		
		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	<br/>	<br/>	<br/>	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">



$(document).ready(function(){

	//alert("please select a fee");	var updated = parseFloat(current) - parseFloat(procuring);var updated = parseFloat(current) - parseFloat(procuring);
	////.replace(/\D/g, "")
	 function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\.\-]/g,"")
				  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
    }
	
	
function calculate_subBalance()
{
	var valdata = 0;
		$( ".subtotalval" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			//alert(totalcount);
			if(totalcount != "")
			{
				valdata = valdata + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);
		var less_deposit = isNaN(parseFloat($("#less_deposit").val()))?0.00:parseFloat($("#less_deposit").val());
		valdata = valdata - less_deposit;
		$("#sub_totalcal").val(convertFormatedMoney(valdata.toFixed(2)));
		$("#dealer_service_fees").trigger('keyup');
}
	
	$('input.currency').on('keyup',function(event){
		
		if(event != undefined && event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
		
        $(this).val(function(index, value) {
			value = value.replace(/^0+/, "");
            return convertFormatedMoney(value);
        });
	});
	
	$("#less_deposit").on('change keyup paste',function(){
			calculate_subBalance();
		});
	$("body").on('keyup','.subtotalval',function(){
		
		calculate_subBalance();
	});
	
	$("body table td").on('keyup change paste','input.additional',function(){
		labourVal = 0;
		for(var attrid=1;attrid<=7;attrid++) {			
			
			hourval = $("#hours"+attrid).val();
			if(hourval != undefined){
				hourval = hourval.replace(/,/g, '');
				// rate1
				rateval = $("#rate"+attrid).val();
				rateval = rateval.replace(/,/g, '');
				l_rate = parseFloat(rateval*hourval);
				labourVal += l_rate;
				labourVal = parseFloat(labourVal);
			}
		}
		setTimeout(function(){
		$("#labor_to_install").val(labourVal.toFixed(2));
			calculate_subBalance();
		},200);
		
		
		});

	$(".price_set , .quality, .sale_price").on('change keyup paste',function(){
		var valdata = 0;
		var sale_price = 0;
		
		$( ".price_set" ).each(function( index ) {			
			var price = $(this).val();	
			price = price.replace(/,/g, '');
			var attrid = $(this).attr("id");	
			//alert(attrid);
			//console.log(attrid);
			if(price != "")
			{	
				quantityval = $("#quantity"+attrid).val();
				quantityval = quantityval.replace(/,/g, '');
				
				quality = parseFloat(quantityval);
				totalquality =  quality * parseFloat(price);
				$("#price_qty_val"+attrid).val(convertFormatedMoney(totalquality.toFixed(2)));
				valdata = valdata + totalquality;
			}
		});
		$("#parts").val(convertFormatedMoney(valdata.toFixed(2)));
		calculate_subBalance();
	});
	
	$(".sale_price").trigger('change');
	
	$("#fright_set_up_val").on('keyup',function(){
		var fright_set_up_val = $(this).val();
		fright_set_up_val = fright_set_up_val.replace(/,/g, '');
		
		$( ".sales_price" ).trigger("keyup");
		
		salesprice_total = $("#unit_total").val();
		salesprice_total = salesprice_total.replace(/,/g, '');
		
		unit_total = parseFloat(salesprice_total) + parseFloat(fright_set_up_val);
		$("#unit_total").val(convertFormatedMoney(unit_total.toFixed(2)));
	});

	 $(".sale_price").on('change keyup paste',function(){
	 	var valdata = 0;
		var salesprice_total=0;
		
		$( ".sale_price" ).each(function( index ) {			
			var price = $(this).val();
			price = price.replace(/,/g, '');
				
			var attrid = $(this).attr("id");	
			var unitval = $("#unit_value"+attrid).val();
			unitval = unitval.replace(/,/g, '');
			//alert(attrid);
			//console.log(attrid);
			if(price != "" && unitval != "")
			{

				salesprice_total = parseFloat(salesprice_total) + parseFloat(price);
				unit_value = parseFloat(unitval);
				totalquality =  unit_value -  parseFloat(price);
				valdata = valdata + totalquality;
			}
		});
		
		$("#salesprice_total").val(convertFormatedMoney(salesprice_total.toFixed(2)));
		$("#unit_total").val(convertFormatedMoney(salesprice_total.toFixed(2)));		
		$("#river_valley_discount").val(convertFormatedMoney(valdata.toFixed(2)));
        calculate_subBalance();
     });
	
	$("#dealer_service_fees_dropdown").on('change',function(){
		taxablevaltotal = parseFloat($(this).val());	
		//taxablevaltotal = taxablevaltotal.replace(/,/g, '');		
		$("#dealer_service_fees").val(convertFormatedMoney(taxablevaltotal.toFixed(2)));
		$("#dealer_service_fees").trigger("keyup");
	});
	
	/*
	$("#dealer_service_fees_dropdown").on('change',function(){
		taxablevaltotal = parseFloat($(this).val());		
		$("#dealer_service_fees").val(taxablevaltotal.toFixed(2));
		
	});
	*/
	
	$(".subval").on('keyup',function(){
		var nada_avg_trade = $("#nada_avg_trade").val();
		nada_avg_trade = nada_avg_trade.replace(/,/g, '');
		
		var less_labor = $("#less_labor").val();
		less_labor = less_labor.replace(/,/g, '');
		
		var diff,taxablevaltotal,dealer_service_fees;
		//taxablevaltotal = taxablevaltotal.replace(/,/g, '');
		
		if(nada_avg_trade != "" && less_labor != "")
		{	
			nada_avg_trade = parseFloat(nada_avg_trade);
			diff =  nada_avg_trade -  parseFloat(less_labor);	
			$("#total_trade_val").val(convertFormatedMoney(diff.toFixed(2)));
			$("#trade_in_value").val(convertFormatedMoney(diff.toFixed(2)));
			
			subtotalval = $("#sub_totalcal").val();
			subtotalval = subtotalval.replace(/,/g, '');
			
			dealer_service_fees =  $("#dealer_service_fees").val();
			dealer_service_fees = dealer_service_fees.replace(/,/g, '');
			
			if(dealer_service_fees != ""){			
				taxablevaltotal = (parseFloat(subtotalval) - parseFloat(diff)) + parseFloat(dealer_service_fees);
			}
			else
			taxablevaltotal = (parseFloat(subtotalval) - parseFloat(diff));
			
			$("#taxable_valtotal").val(convertFormatedMoney(taxablevaltotal.toFixed(2)));
			
		}
		//alert(diff);
		
		
	});


	$("#dealer_service_fees,#sub_totalcal").on('change keyup paste',function(){	
		
		var diff,taxablevaltotal,dealer_service_fees,subtotalval;
		subtotalval = $("#sub_totalcal").val();
		subtotalval = subtotalval.replace(/,/g, '');
		
		dealer_service_fees =  $("#dealer_service_fees").val();
		dealer_service_fees = dealer_service_fees.replace(/,/g, '');
		
		diff = $("#trade_in_value").val();
		diff = diff.replace(/,/g, '');
		
		if(dealer_service_fees != ""){			
			taxablevaltotal = (parseFloat(subtotalval) - parseFloat(diff)) + parseFloat(dealer_service_fees);
		}
		else
		taxablevaltotal = (parseFloat(subtotalval) - parseFloat(diff));
		
		$("#taxable_valtotal").val(taxablevaltotal.toFixed(2));
			
	});
	
	$("#trade_value1,#trade_value2").on('change keyup paste',function(){
		trade_val1 = isNaN(parseFloat($("#trade_value1").val()))?0.00:parseFloat($("#trade_value1").val());	
		trade_val2 = isNaN(parseFloat($("#trade_value2").val()))?0.00:parseFloat($("#trade_value2").val());	
		trade_in_val = trade_val1 + trade_val2;
		$("#trade_in_value").val(trade_in_val.toFixed(2));
		$("#dealer_service_fees").trigger('keyup');
		
	});
	
	/*
	$("#sales_price").on('keyup',function(){
		var saleprice = $(this).val();
		var msrp_id = $("#msrp_id").text();
		
		var updated = parseFloat(msrp_id) - parseFloat(saleprice);
		
		$("#river_valley_discount").text(updated.toFixed(2));
		
	});
	*/									
	var actual_balance = <?php  echo (isset($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (isset($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	
	function calculateProfit()
	{
		profitOption=$("#profitOption").val();
		if(profitOption=='cost_sell')
		{
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
		}
		else
		{
			freight=($("#freight").val()=='')?0:parseFloat($("#freight").val());
			prep=($("#prep").val()=='')?0:parseFloat($("#prep").val());
			doc=($("#doc").val()=='')?0:parseFloat($("#doc").val());
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
			profit=parseFloat(profit+parseFloat(freight)+parseFloat(prep)+doc);
		}
		$("#profit").val(profit.toFixed(2));
		
	}
	$("#profitOption").on('change',function(){
											calculateProfit();
											
											});
	$("#calculateDown").on('click',function(){
											calculate_initial_investment();
											//alert(actual_balance);
											
											});
	$(".priceChange").on('change keyup paste',function(){
									 
									 tax_percent=$("#tax_percent").val();
									 if($("#est_payoff").val()!='');
									 update_10days_payoff();
									 if($("#doc").val()!=''&&$("freight").val()!='')
									 calculate_tax(tax_percent);
									 
									 });
									 
	$(".payment_print_option").on('change',function(){
		$val = $(this).val();
		if($(this).is(':checked'))
		{
			$("#"+$val).removeClass('noprint');	
		}else{
			$("#"+$val).addClass('noprint');
		}
	});
											 
	
	$("#cost").on('change keyup paste',function(){
									calculateProfit();
									});
	
	$(".tradeDiff").on('change keyup paste',function(){
											   allowance=parseFloat($("#trade_allowance").val());
											   if(isNaN(allowance))
											   {
												  allowance=0; 
											   }
											   est_payoff=parseFloat($("#est_payoff").val());
											   if(isNaN(est_payoff))
											   {
												  est_payoff=0; 
											   }
											   sell_price=parseFloat(actual_value-allowance);	
									
										
										 $("#sub_total").val(sell_price.toFixed(2));	   
											  /* if(allowance!='')
											   {*/
												  /* if(allowance.match(/^[0-9]+(\.[0-9]*)?$/))
												   {*/
													  
													   calculateProfit();
													   tax_percent=$("#tax_percent").val();
													   if($("#est_payoff").val()!='');
													   update_10days_payoff();
													 if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
													/*}else
												   {
													   alert("Please enter the correct amount in trade allowance");
													   $(this).focus();
												   }*/
											 /*  }
											   else
											   {
												    $("#sell_price").val(parseFloat(actual_value).toFixed(2));
													profit=parseFloat(actual_value-$("#cost").val());
												    $("#profit").val(profit.toFixed(2));
													tax_percent=$("#tax_percent").val();
													if($("#est_payoff").val()!='');
													if($("#doc").val()!=''&&$("freight").val()!='')
													calculate_tax(tax_percent);
													update_10days_payoff();
													
											   }*/
											   
											   });
		
	$("#sell_price").on('change keyup paste',function(){
											   price=parseFloat($(this).val());
											   if(isNaN(price))
											   price =0.00;
											   actual_value=price;
											   //allowance=$("#trade_allowance").val();
											   /*if(allowance.match(/^[0-9]+(\.[0-9]+)?$/))
											   {*/
												  // new_bal=parseFloat(price-parseFloat(allowance));
												  // new_bal=new_bal.toFixed(2);
												   //$("#sell_price").val(new_bal);
												 //  profit=parseFloat(new_bal-$("#cost").val());
												  // $("#profit").val(profit.toFixed(2));
											  /* }*/
											  actual_value=price;
											  calculateProfit();
											   tax_percent=$("#tax_percent").val();
											  if($("#est_payoff").val()!='');
												if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
											   			// update_10days_payoff();
											   });

	function calculate_tax(tax_value){
		var tax_type = $('input:radio[name=taxopt]:checked').val();
		
		/*var freight = parseFloat( $('#freight').val() );
		var prep = parseFloat( $('#prep').val() );
		var doc = parseFloat( $('#doc').val() );
		var part_serv = parseFloat( $('#part_serv').val() );
		var tag_tit = parseFloat( $('#tag_tit').val() );*/
		var sell_price = isNaN(parseFloat( $("#sell_price").val()))?0.00:parseFloat( $("#sell_price").val());
		var trade_allowance = isNaN(parseFloat( $("#trade_allowance").val()))?0.00:parseFloat( $("#trade_allowance").val());
		amount = sell_price- trade_allowance;
		if(tax_type == 'tax_vehicle_only'){
			var amount = amount;
		}else{
			//var amount = freight+prep+part_serv+sell_price; 
			amount = amount ;
		}
		$("#sub_total").val(amount.toFixed(2));
		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		$('#tax').val( amountIncludingTax );
		
		//actual_balance = freight+prep+doc+part_serv+tag_tit+sell_price+parseFloat(amountIncludingTax); 
		actual_balance = amount + parseFloat(amountIncludingTax);
		//alert(actual_balance);
		est_payoff=parseFloat($("#est_payoff").val());
		   if(isNaN(est_payoff))
		   {
			  est_payoff=0; 
		   }
		   actual_balance = actual_balance +est_payoff;
		   $('#bal').val( actual_balance   );
		
		//calculate_initial_investment();
		
		 update_10days_payoff(); 
	}
	
	function calculate_initial_investment(){
		//$('#bal').val();
		investment = ($('#bal').val() * 25 ) / 100;
		$('#down_pay').val( investment.toFixed(2)    );
		newbal = actual_balance -  investment ;
		$('#bal').val( newbal.toFixed(2) );
	}
	
	function update_initial_investment(){
		var initialinv = $('#down_pay').val();
		var inv = 0;
		if(initialinv == '' || isNaN(initialinv)){
			inv = 0;
			$('#down_pay').val("");
		}else{
			inv = parseFloat(initialinv);
		}
		newbal = actual_balance - inv;
		$('#bal').val( newbal.toFixed(2) ); 
	}
	
	$('#down_pay').on('change keyup paste',function(){
		update_initial_investment();
		update_10days_payoff();
	});
	
	
	function get_initial_inv(){
		var initialinv = $('#down_pay').val();
		if(initialinv == '' || isNaN(initialinv)){
			return 0;
		}else{
			return parseFloat(initialinv);
		}
	}
	function get_10day_estimated(){
		est_payoff = $('#est_payoff').val();
		if(est_payoff == ''){
			return 0;
		}
		if(isNaN(est_payoff)){
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
			return 0;
		}else{
			$('#errorForPayoff').text("");
			return parseFloat(est_payoff);
		}
		
	}
	
	function update_10days_payoff(){/*
		initialinv = get_initial_inv();
		est = get_10day_estimated();
		selling_price=actual_balance;
		trade_allowance=$("#trade_allowance").val();
		if(trade_allowance.match(/^[0-9]+(\.[0-9]+)?$/)&&!($("#doc").val()!=''&&$("freight").val()!=''))
		{
			selling_price=selling_price-parseFloat(trade_allowance);
		}
		newbalance = (selling_price - initialinv ) + est;
		
		
		$('#bal').val( newbalance.toFixed(2)   );
	*/}
		
	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	$("input:radio[name=taxopt]").click(function() {
		tax_value = $('#tax_percent').val();
		if(tax_value == 0){
			alert('Please select a fee');
		}else{
			calculate_tax(tax_value);
		}
		
	});
	
	$('#fixed_fee_options').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					$('#freight').val(data.freight_fee);
					$('#prep').val(data.prep_fee);
					$('#license_fee').val(data.licreg_fee);
					$('#part_serv').val(parseFloat(data.parts_fee) + parseFloat(data.service_fee));
					$('#tag_tit').val(parseFloat(data.title_fee) + parseFloat(data.tag_fee));
					
					$('#tax_percent').val(data.tax_fee);
					calculate_tax(data.tax_fee);
				}
			});
		}
	});
	

	$("#btn_save_quote").click(function(){
		if($("#deal_status_id").val() == ''){
			alert("Please select status");
			$("#deal_status_id").focus();
			return false;	
		}else{
			return true;
		}
	});
	
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
	if($('#apr').val() != "" && $('#apr').val() != null){
	calculateMonthWisePayments();
	}else {
		$('input[id^="paymentFor"]').val("");
	}
	var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
	$('#apr').on('change keyup paste',function(){
		
		if(rx.test($('#apr').val())){
			calculateMonthWisePayments();
			}else{
					$('.options_price').val("");
			}
	 });
	
	$(".price_options").on('change',function(){
										span_id=$(this).attr('price-id')+'_span';
										$("#"+span_id).text($(this).val());	 
										calculateMonthWisePayments();	 
											 });
     
});
function calculate() 
{
	var selling_price = $('#sell_price').val();
	var freight = $('#freight').val();
	var prep = $('#prep').val();
	var doc = $('#doc').val();
	var parts_fee = "0";
	var service_fee = "0";
	var parts_service = parseFloat(parts_fee)+parseFloat(service_fee);
	var tag_fee = "0";
	var title_fee = "0";
	var tag_title = parseFloat(tag_fee)+parseFloat(title_fee);
	$('#part_serv').val(parts_service);
	$('#tag_tit').val(tag_title);
	var amount = parseFloat(selling_price) + parseFloat(freight) + parseFloat(prep) + parseFloat(doc) + parseFloat(parts_service) + parseFloat(tag_title);
	var tax = $('#tax').val();
	var amountIncludingTax = amount + (amount*parseFloat(tax))/100;
	var estimated_payoff = $('#est_payoff').val();
	if(estimated_payoff.trim() === "") {
		estimated_payoff = 0;
	} 
	
	var downpayment = $('#down_pay').val();
	if(downpayment.trim() === "") {
		downpayment = 0;
	} 
	if(isNaN(downpayment) || isNaN(estimated_payoff))
	{
		//alert("Please enter valid amount");
		if(isNaN(downpayment)){
			$('#errorForDownPay').text("Please enter valid  Down Payment.");
			$('#down_pay').val("");
		}else{
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
		}
		$('#bal').val("");
		$('.options_price').val("");
		
	}else{
		$('#errorForDownPay').text("");
		$('#errorForPayoff').text("");
	var balance = parseFloat(amountIncludingTax) + parseFloat(estimated_payoff) - parseFloat(downpayment);
		balance_value = balance.toFixed(2);
		if(!isNaN(balance_value)){
			$('#bal').val(balance_value);
		}
		
	}
	
	//console.log( $('#bal').val() );
	
}
	
	
	 function calculateMonthWisePayments(){
		 
		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
										  payment.value = pay_monthly;
										  
										  });
	 	}
	
	function MonthwisePayments(years)
	{
		var apr = parseFloat($('#apr').val());
		var principal = parseFloat($('#bal').val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		var tax = parseFloat($('#tax').val());
		//var payment = document.getElementById(("paymentFor"+i).toString());
		var x = Math.pow(1 + interest, payments, tax);   // Math.pow() computes powers
			var monthly = (principal * x * interest) / (x - 1);
			// If the result is a finite number, the user's input was good and
			// we have meaningful results to display
			if (isFinite(monthly)) {
			// Fill in the output fields, rounding to 2 decimal places
			//payment.value = monthly.toFixed(2);
			return monthly.toFixed(2);
		}else{
			//payment.value = "";
			return "";
		}
	}

	 function calculate_total() {
        
          var taxable_valtotal = isNaN(parseFloat( $("#taxable_valtotal").val()))?0.00:parseFloat( $("#taxable_valtotal").val());
          var sales_tax = isNaN(parseFloat( $("#sales_tax").val()))?0.00:parseFloat( $("#sales_tax").val());
          var ext_services = isNaN(parseFloat( $("#ext_services").val()))?0.00:parseFloat( $("#ext_services").val());
          var license_fee = isNaN(parseFloat( $("#license_fee").val()))?0.00:parseFloat( $("#license_fee").val());
          var tax_percent = (parseFloat(sales_tax)/100)*taxable_valtotal;
          var cal_total = taxable_valtotal + tax_percent + license_fee + ext_services;
        $("#cal_total").val(cal_total.toFixed(2));
     }

	 $(".currency_value").on('change keyup paste',function(){
        calculate_total();
     });
</script>
</div>
