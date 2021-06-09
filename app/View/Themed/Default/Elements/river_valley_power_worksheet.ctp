<div class="page-break"></div>
<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container">
		<style>body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}

.wrk_frm{ width:70%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
.wrk_frm2{ width:80%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
.wrk_frm3{ width:60%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}

.wrk_frmdesc{ width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}

.wrk_frm4{ width:80%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
.wrk_frm_model{font-size:10px; width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}

.wrk_frm31{ width:80%; background:none; border-bottom:solid 1px #646464; border-top:none;border:2px solid #646464; border-right:none; border-left:none;}
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
@media print
 {
.wrk_frm_model{font-size:10px !important; width:100%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;} 
		#dealer_service_fees_dropdown {
			line-height: 14px !important;;
			height: 12px !important;
			margin-top: 4px !important;;
			width:50px !important;;
			font-size:6px !important;;
		}

		#fixedfee_selection,.price_options,.noprint {
			display: none;
		}
		#worksheet_container{
	
		}
		
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
		table{
				margin-top:0px !important;
		}
		td{
			height:10px !important;
			font-size:8px !important;
		}
		input[type=text]{
			height:18px !important;
		}
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
			<div class="left1">
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
			
			</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr style="background:#2E3069;">
				<td style="text-align:center;font-size:24px; font-weight:bold;color:#fff;">
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
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;">PHONE # <input name="phone_data1"   value="<?php echo isset($info['phone_data1']) ? $info['phone_data1'] : $info['phone']; ?>"   type="text" class="wrk_frm3" /></td>
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

		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td style=" width:100%; background:#2F5497; color:#fff; font-size:14px; font-weight:600; padding:5px 5px;"></td>
		  </tr>
		</table>


		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
		  <tr>
			<td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">NEW/USED</td>
		   <td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">YEAR</td>
			<td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MAKE</td>
			<td style="background:#2E3069; width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MODEL ! DESC</td>
			<td style="background:#2E3069; width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">VIN ! PID</td>
			<td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">MSRP</td>
			<td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">SALE PRICE</td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"><?php echo $info['condition']; ?></td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"><?php echo $info['year']; ?></td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"><?php echo $info['make']; ?></td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"><?php echo $info['model']; ?></td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"><?php echo $info['vin']; ?></td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;" id="msrp_id">
		   <input name="unit_value1" id="unit_value1"   value="<?php echo isset($info['unit_value1']) ? $info['unit_value1'] : $info['unit_value']; ?>"  type="text" class="wrk_frm4 quantity currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price1" id="1"  value="<?php echo isset($info['sales_price1']) ? $info['sales_price1'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" /></td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
			
			<input name="condition2" id="condition2"   value="<?php echo isset($info['condition2']) ? $info['condition2'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="year2" id="year2"   value="<?php echo isset($info['year2']) ? $info['year2'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="make2" id="make1"   value="<?php echo isset($info['make2']) ? $info['make2'] : "" ?>"  type="text" class="wrk_frm4 quality" />
			</td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="model2" id="model2"   value="<?php echo isset($info['model2']) ? $info['model2'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   
		   </td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="vin2" id="vin2"   value="<?php echo isset($info['vin2']) ? $info['vin2'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   	
			</td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="unit_value2" id="unit_value2"   value="<?php echo isset($info['unit_value2']) ? $info['unit_value2'] : "" ?>"  type="text" class="wrk_frm4 quality currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price2" id="2"   value="<?php echo isset($info['sales_price2']) ? $info['sales_price2'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" />
			</td>
			</tr>
		</table>

		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
			<input name="condition3" id="condition3"   value="<?php echo isset($info['condition3']) ? $info['condition3'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="year3" id="year3"   value="<?php echo isset($info['year3']) ? $info['year3'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="make3" id="make3"   value="<?php echo isset($info['make3']) ? $info['make3'] : "" ?>"  type="text" class="wrk_frm4 quality" />
			</td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="model3" id="model3"   value="<?php echo isset($info['model3']) ? $info['model3'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   
		   </td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="vin3" id="vin3"   value="<?php echo isset($info['vin3']) ? $info['vin3'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   	
			</td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="unit_value3" id="unit_value3"   value="<?php echo isset($info['unit_value3']) ? $info['unit_value3'] : "" ?>"  type="text" class="wrk_frm4 quality currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price3" id="3"   value="<?php echo isset($info['sales_price3']) ? $info['sales_price3'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" />
			</td>
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
			<input name="condition4" id="condition4"   value="<?php echo isset($info['condition4']) ? $info['condition4'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="year4" id="year4"   value="<?php echo isset($info['year4']) ? $info['year4'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="make4" id="make4"   value="<?php echo isset($info['make4']) ? $info['make4'] : "" ?>"  type="text" class="wrk_frm4 quality" />
			</td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="model4" id="model4"   value="<?php echo isset($info['model4']) ? $info['model4'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   
		   </td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="vin4" id="vin4"   value="<?php echo isset($info['vin4']) ? $info['vin4'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   	
			</td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="unit_value4" id="unit_value4"   value="<?php echo isset($info['unit_value4']) ? $info['unit_value4'] : "" ?>"  type="text" class="wrk_frm4 quality currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price4" id="4"   value="<?php echo isset($info['sales_price4']) ? $info['sales_price4'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" />
			</td>
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
			<input name="condition5" id="condition5"   value="<?php echo isset($info['condition5']) ? $info['condition5'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="year5" id="year5"   value="<?php echo isset($info['year5']) ? $info['year5'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="make5" id="make5"   value="<?php echo isset($info['make5']) ? $info['make5'] : "" ?>"  type="text" class="wrk_frm4 quality" />
			</td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="model5" id="model5"   value="<?php echo isset($info['model5']) ? $info['model5'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   
		   </td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="vin5" id="vin5"   value="<?php echo isset($info['vin5']) ? $info['vin5'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   	
			</td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="unit_value5" id="unit_value5"   value="<?php echo isset($info['unit_value5']) ? $info['unit_value5'] : "" ?>"  type="text" class="wrk_frm4 quality currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price5" id="5"   value="<?php echo isset($info['sales_price5']) ? $info['sales_price5'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" />
			</td>
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">
			<input name="condition6" id="condition6"   value="<?php echo isset($info['condition6']) ? $info['condition6'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="year6" id="year6"   value="<?php echo isset($info['year6']) ? $info['year6'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="make6" id="make6"   value="<?php echo isset($info['make6']) ? $info['make6'] : "" ?>"  type="text" class="wrk_frm4 quality" />
			</td>
		   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="model6" id="model6"   value="<?php echo isset($info['model6']) ? $info['model6'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   
		   </td>
			<td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="vin6" id="vin6"   value="<?php echo isset($info['vin6']) ? $info['vin6'] : "" ?>"  type="text" class="wrk_frm4 quality" />		   	
			</td>
		   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="unit_value6" id="unit_value6"   value="<?php echo isset($info['unit_value6']) ? $info['unit_value6'] : "" ?>"  type="text" class="wrk_frm4 quality currency" />		   	
		   </td>
			<td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="sales_price6" id="6"   value="<?php echo isset($info['sales_price6']) ? $info['sales_price6'] : ''; ?>"  type="text" class="wrk_frm31 sales_price currency" />
			</td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:85%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">RIVER VALLEY DISCOUNT</td>
		  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;" >
		  <input name="river_valley_discount" value="<?php echo isset($info['river_valley_discount']) ? $info['river_valley_discount'] : ''; ?>"  type="text" id="river_valley_discount" class="wrk_frm31 subtotalval_test" />
		  <input name="salesprice_total" type="hidden" id="salesprice_total" class="wrk_frm31 subtotalval" />
		  </td>
		  
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:85%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">FREIGHT & SET UP</td>
		  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;" id="fright_set_up"> <input id="fright_set_up_val" name="fright_set_up" value="<?php echo isset($info['fright_set_up']) ? $info['fright_set_up'] : ''; ?>"  type="text" class="wrk_frm31 subtotalval currency" /></td>
		  
			</tr>
		</table>

		<table border="1" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
		  <tr>
			<!--<td style="background:#2E3069; width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">&nbsp;</td>-->
		   <td style="background:#2E3069; width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">QTY</td>
			<td colspan="2" style="background:#2E3069; width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">PART NUMBER</td>
			<td colspan="2" style="background:#2E3069; width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">DESCRIPTION</td>
			
			<td colspan="1" style="background:#2E3069; width:7%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">PRICE</td>
			
			<td style="background:#2E3069; width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">&nbsp;</td>
		</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity1" id="quantity1"   value="<?php echo isset($info['quantity1']) ? $info['quantity1'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2" style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number1"   value="<?php echo isset($info['part_number1']) ? $info['part_number1'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description1"   value="<?php echo isset($info['description1']) ? $info['description1'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="1" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="1" name="price1" class="price_set currency"  value="<?php echo isset($info['price1']) ? $info['price1'] : "" ?>"  type="text" style="width:100%;"  class="wrk_frm4 currency"/>
		   </td>			
		   <td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
				<input id="price_qty_val1" name="price_qty_val1" value="<?php echo isset($info['price_qty_val1']) ? $info['price_qty_val1'] : "" ?>"  type="text" style="width:100%;"  class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity2" id="quantity2"      value="<?php echo isset($info['quantity2']) ? $info['quantity2'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number2"   value="<?php echo isset($info['part_number2']) ? $info['part_number2'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description2"   value="<?php echo isset($info['description2']) ? $info['description2'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="2"  name="price2" class="price_set currency"  value="<?php echo isset($info['price2']) ? $info['price2'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val2"  name="price_qty_val2" value="<?php echo isset($info['price_qty_val2']) ? $info['price_qty_val2'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity3" id="quantity3"      value="<?php echo isset($info['quantity3']) ? $info['quantity3'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number3"   value="<?php echo isset($info['part_number3']) ? $info['part_number3'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description3"   value="<?php echo isset($info['description3']) ? $info['description3'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="3"  name="price3" class="price_set currency"  value="<?php echo isset($info['price3']) ? $info['price3'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td   style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val3" name="price_qty_val3" value="<?php echo isset($info['price_qty_val3']) ? $info['price_qty_val3'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity4" id="quantity4"      value="<?php echo isset($info['quantity4']) ? $info['quantity4'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td  colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number4"   value="<?php echo isset($info['part_number4']) ? $info['part_number4'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description4"   value="<?php echo isset($info['description4']) ? $info['description4'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="4"  name="price4" class="price_set currency"  value="<?php echo isset($info['price4']) ? $info['price4'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val4"  name="price_qty_val4" value="<?php echo isset($info['price_qty_val4']) ? $info['price_qty_val4'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency"  />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity5" id="quantity5"      value="<?php echo isset($info['quantity5']) ? $info['quantity5'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number5"   value="<?php echo isset($info['part_number5']) ? $info['part_number5'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description5"   value="<?php echo isset($info['description5']) ? $info['description5'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="5"  name="price5" class="price_set currency"  value="<?php echo isset($info['price5']) ? $info['price5'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val5"  name="price_qty_val5" value="<?php echo isset($info['price_qty_val5']) ? $info['price_qty_val5'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
		  <!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity6" id="quantity6"      value="<?php echo isset($info['quantity6']) ? $info['quantity6'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2" style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number6"   value="<?php echo isset($info['part_number6']) ? $info['part_number6'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description6"   value="<?php echo isset($info['description6']) ? $info['description6'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="6"  name="price6" class="price_set currency"  value="<?php echo isset($info['price6']) ? $info['price6'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val6"  name="price_qty_val6" value="<?php echo isset($info['price_qty_val6']) ? $info['price_qty_val6'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity7" id="quantity7"      value="<?php echo isset($info['quantity7']) ? $info['quantity7'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number7"   value="<?php echo isset($info['part_number7']) ? $info['part_number7'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description7"   value="<?php echo isset($info['description7']) ? $info['description7'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="7"  name="price7" class="price_set currency"  value="<?php echo isset($info['price7']) ? $info['price7'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input  id="price_qty_val7"  name="price_qty_val7" value="<?php echo isset($info['price_qty_val7']) ? $info['price_qty_val7'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity8" id="quantity8"     value="<?php echo isset($info['quantity8']) ? $info['quantity8'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number8"   value="<?php echo isset($info['part_number8']) ? $info['part_number8'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description8"   value="<?php echo isset($info['description8']) ? $info['description8'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="8"  name="price8" class="price_set currency"  value="<?php echo isset($info['price8']) ? $info['price8'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val8"  name="price_qty_val8" value="<?php echo isset($info['price_qty_val8']) ? $info['price_qty_val8'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity9" id="quantity9"     value="<?php echo isset($info['quantity9']) ? $info['quantity9'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number9"   value="<?php echo isset($info['part_number9']) ? $info['part_number9'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description9"   value="<?php echo isset($info['description9']) ? $info['description9'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="9"  name="price9" class="price_set currency"  value="<?php echo isset($info['price9']) ? $info['price9'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val9" name="price_qty_val9" value="<?php echo isset($info['price_qty_val9']) ? $info['price_qty_val9'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity10" id="quantity10"     value="<?php echo isset($info['quantity10']) ? $info['quantity10'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2" style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number10"   value="<?php echo isset($info['part_number10']) ? $info['part_number10'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description10"   value="<?php echo isset($info['description10']) ? $info['description10'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="10" name="price10" class="price_set currency"  value="<?php echo isset($info['price10']) ? $info['price10'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val10" name="price_qty_val10" value="<?php echo isset($info['price_qty_val10']) ? $info['price_qty_val10'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity11" id="quantity11"     value="<?php echo isset($info['quantity11']) ? $info['quantity11'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number11"   value="<?php echo isset($info['part_number11']) ? $info['part_number11'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description11"   value="<?php echo isset($info['description11']) ? $info['description11'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="11" name="price11" class="price_set currency"  value="<?php echo isset($info['price11']) ? $info['price11'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val11" name="price_qty_val11" value="<?php echo isset($info['price_qty_val11']) ? $info['price_qty_val11'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<!--<td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>-->
		  <td style="width:5%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="quantity12" id="quantity12"     value="<?php echo isset($info['quantity12']) ? $info['quantity12'] : "" ?>"  type="text" class="wrk_frm4 quality" />
		  </td>
			<td colspan="2"  style="width:11%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="part_number12"   value="<?php echo isset($info['part_number12']) ? $info['part_number12'] : "" ?>"  type="text" class="wrk_frm4" />
			</td>
		   <td colspan="2" style="width:28%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="description12"   value="<?php echo isset($info['description12']) ? $info['description12'] : "" ?>"  type="text" class="wrk_frmdesc" />
		   </td>
			
		   <td colspan="2" style="width:7%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="12" name="price12" class="price_set currency"  value="<?php echo isset($info['price12']) ? $info['price12'] : "" ?>"  type="text" style="width:100%;" />
		   </td>
			<td  style="width:6%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input id="price_qty_val12" name="price_qty_val12" value="<?php echo isset($info['price_qty_val12']) ? $info['price_qty_val12'] : "" ?>"  type="text" style="width:100%;" class="wrk_frm4 currency" />		   
		   </td>		   
			</tr>
		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
		  <tr>
			<td style="background:#2E3069; width:70%; border-right:solid 1px #000; text-align:center; padding:3px 0; padding-left:5px; font-size:14px; color:#fff;">DEPOSIT INFORMATION</td>
		   <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;text-align:right;">UNIT TOTAL&nbsp;</td>
			<td style=" width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input  id="unit_total" class="currency"  name="unit_total" value="<?php echo isset($info['unit_total']) ? $info['unit_total'] : "" ?>"  type="text" style="width:100%;" />		   
			</td></tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
		  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
		  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;">PARTS</td>
			<td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="partsval"   value="<?php echo isset($info['partsval']) ? $info['partsval'] : '0'; ?>"  type="text" class="wrk_frm31 subtotalval currency" id="parts" /></td>
			</td>
			</tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
		  <tr>
			<td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
		  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;">LABOR TO INSTALL</td>
			<td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
			<input name="labor_to_install"   value="<?php echo isset($info['labor_to_install']) ? $info['labor_to_install'] : '0'; ?>"  type="text" class="wrk_frm31 subtotalval currency" /></td>
			</tr>
		</table>


		<table width="60%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
		  <tr>
			<td style="width:45%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">TRADE INFO:</td>
		  <td style="width:27%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			 <tr>
			<td style="width:45%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">YEAR : 
			<?php //echo $info['year_trade']; ?>
			
			 <input name="year_trade_val" id="year_trade_val"     value="<?php echo isset($info['year_trade_val']) ? $info['year_trade_val'] : $info['year_trade']; ?>"  type="text" class="wrk_frm_model" />
			</td>
		  <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">VIN :
		  <?php //echo $info['vin_trade']; ?>
		   <input name="vin_trade_val" id="vin_trade_val"     value="<?php echo isset($info['vin_trade_val']) ? $info['vin_trade_val'] : $info['vin_trade']; ?>"  type="text" class="wrk_frm_model" />
		  </td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			 <tr>
			<td style="width:45%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">MAKE : 
			<?php //echo $info['make_trade']; ?>
			 <input name="make_trade_val" id="make_trade_val"     value="<?php echo isset($info['make_trade_val']) ? $info['make_trade_val'] : $info['make_trade']; ?>"  type="text" class="wrk_frm_model" />
			</td>
		  <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">MODEL : 
		  <?php //echo $info['model_trade']; ?>
		  	 <input name="model_trade_val" id="model_trade_val"     value="<?php echo isset($info['model_trade_val']) ? $info['model_trade_val'] : $info['model_trade']; ?>"  type="text" class="wrk_frm_model" />
		
		  </td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">NADA AVERAGE TRADE VALUE : 
			<input name="nada_avg_trade" id="nada_avg_trade"  value="<?php echo isset($info['nada_avg_trade']) ? $info['nada_avg_trade'] : ''; ?>"  type="text" class="wrk_frm31 subval currency" />
			</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">LESS REPAIRS RECONDITIONING NEEDED: LABOR :
			<input name="less_labor" id="less_labor" value="<?php echo isset($info['less_labor']) ? $info['less_labor'] : ''; ?>"  type="text" class="wrk_frm31 subval currency" />
			</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; border-right:solid 1px #000; font-size:14px; height:20px; color:#000;">MILES/HOURS
						<input name="miles"   value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
			</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">PARTS
		  <input name="partsdata"   value="<?php echo isset($info['partsdata']) ? $info['partsdata'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			<td style="width:27%; border-left:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">TOTAL TRADE VALUE LESS RECONDITIONING
			<input name="total_trade_val" id="total_trade_val"  value="<?php echo isset($info['total_trade_val']) ? $info['total_trade_val'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
			</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; background:#FF0; font-size:13px; height:20px; color:#000;">CUSTOMER</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; padding-left:5px; font-size:13px; background:#FF0; height:20px; color:#000;">SIGNATURE</td>
		  <td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">REFERRED BY
						<input name="referred_by"   value="<?php echo isset($info['referred_by']) ? $info['referred_by'] : ''; ?>"  type="text" class="wrk_frm31" />
			</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			 <tr>
			<td style="width:45%; border-top:solid 1px #000; padding-left:5px; background:#F00; font-size:13px; height:20px; color:#000;">Manager</td>
		  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			<tr>
			<td style="width:45%; padding-left:5px; font-size:13px; background:#F00; height:20px; color:#000;">SIGNATURE</td>
		  <td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
			<td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
		</table>


		<table width="40%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
		  <tr>
			<td style="width:60%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">SUBTOTAL</td>
		  <td style="width:40%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  	  <input name="sub_totalcal" id="sub_totalcal"  value="<?php echo isset($info['sub_totalcal']) ? $info['sub_totalcal'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
	
		  </td>
			</tr>
			
			<tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">TRADE IN VALUE</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  
			<?php
				$trade_in_value = 0;
				if(isset($info['trade_in_value'])){
					$trade_in_value = $info['trade_in_value'];				
				}
				else{
					$trade_in_value = $info['trade_value'];
				}
				
				
				if(empty($trade_in_value)){
					$trade_in_value = 0;
				}
			?>
		  
		  
		  <input name="trade_in_value" id="trade_in_value"  value="<?php echo $trade_in_value; ?>"  type="text" class="wrk_frm31 currency" />
	
		  </td>
			</tr>
			
			<tr>
			<td class="dealer_dropdown">
			<select name="dealer_service_fees_dropdown" id="dealer_service_fees_dropdown">	
			<option value="0.00">Choose Fees</option>			
			<?php 
				foreach($DealFixedfeeslist as $list){
			?>
			<option value="<?php echo $list['DealFixedfee']['doc_fee']; ?>"><?php echo $list['DealFixedfee']['condition']; ?></option>
			<?php
			}?>
			</select>&nbsp;&nbsp;DEALER SERVICES FEE
			</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		  <input name="dealer_service_fees" id="dealer_service_fees"   value="<?php echo isset($info['dealer_service_fees']) ? $info['dealer_service_fees'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">TAXABLE TOTAL
			
			
			</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
		  <input name="taxable_total"  id="taxable_valtotal" value="<?php echo isset($info['taxable_total']) ? $info['taxable_total'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">MN/WI SALES TAX</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
		   <input name="sales_tax"   value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">WARRANTY/EXT SERVICE</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
		   <input name="ext_services"   value="<?php echo isset($info['ext_services']) ? $info['ext_services'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LICENSE FEE</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
		  <input name="license_fees"   value="<?php echo isset($info['license_fees']) ? $info['license_fees'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			  <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">CREDIT PROGRAM PARTICIPATION</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">
		   <input name="credit_info"   value="<?php echo isset($info['credit_info']) ? $info['credit_info'] : ''; ?>"  type="text" class="wrk_frm31 currency" />
		  </td>
			</tr>
			
			  <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LOAN ORIGINATION FEE</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;">
		  
		   <input name="loan_info"   value="<?php echo isset($info['loan_info']) ? $info['loan_info'] : ''; ?>"  type="text" class="wrk_frm31 currency" /></td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;"></td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			 <tr>
			<td style="width:60%; border-right:solid 1px #000;   padding-left:5px; font-size:20px; height:20px; text-align:right; color:#000;">Total</td>
		  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
			</tr>
			
			
			  <tr>
			<td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LOAN ORIGINATION FEE</td>
		  <td style="width:40%; border-right:solid 1px #000; background:#ccc;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
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
	
</div>
