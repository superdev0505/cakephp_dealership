<?php
$dealer_not_tax_payoff = array(2501,576);

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
		body{ margin:0 5%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.square_one{ width:90%; border-bottom:solid 1px #FF9; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.square_two{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.square_thr{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.entry_one{ width:70%; border-bottom:solid 1px #FF9; border-top:none; background:none; padding:3px 0; border-left:none; border-right:none; margin-left:6px;}
		.square_fou{border: solid 2px #000 !important;
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
		.entry_one{ width:70%; border-bottom:solid 1px #FF9; border-top:none; background:none; padding:0px 0; border-left:none; border-right:none; margin-left:6px;}
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
			<div class="left1" style="border:0px !important;">
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
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;">CUSTOMER NAME</td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> <input name="CUSTOMER_NAME" value="<?php echo isset($info['CUSTOMER_NAME']) ? $info['CUSTOMER_NAME'] : $info['first_name']." ".$info['last_name']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			     
			    </table>

			     </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;">SOCIAL SECURITY</td>
				</tr>
				
				<tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;"> <input name="SOCIAL_SECURITY" value="<?php echo isset($info['SOCIAL_SECURITY']) ? $info['SOCIAL_SECURITY'] : ''; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
			     </td>
			      <td style="width:55%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;">. </td>
				</tr>
				
				<tr>
				<td style="font-size:18px; color:#000; font-weight:600; padding:5px 0; vertical-align:bottom;"> FREEDOM HARLEY-DAVIDSON, INC. </td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>



			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;">ADDRESS</td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"><input name="ADDRESS_DATA" value="<?php echo isset($info['ADDRESS_DATA']) ? $info['ADDRESS_DATA'] : $info['address']; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			     
			    </table>

			    </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;">BIRTHDAY</td>
				</tr>
				
				<tr>
				<td style=" font-size:18px; color:#000; font-weight:600; padding:5px 0;"><input name="BIRTHDAY" value="<?php echo isset($info['BIRTHDAY']) ? $info['BIRTHDAY'] : $info['dob']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			     </td>
			      <td style="width:55%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;">. </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:5px 0; vertical-align:bottom;">7233 SUNSET STRIP AVE NW </td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>



			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;">CITY STATE </td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> <input name="CITY_STATE" value="<?php echo isset($info['CITY_STATE']) ? $info['CITY_STATE'] : $info['city'].",".$info['state']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			     
			    </table>

			    </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;"> ZIP CODE</td>
				</tr>
				
				<tr>
				<td style=" font-size:18px; color:#000;  padding:5px 0;"><input name="ZIP_CODE" value="<?php echo isset($info['ZIP_CODE']) ? $info['ZIP_CODE'] : $info['zip']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			     </td>
			      <td style="width:55%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:14px; color:#000; padding:5px 0;"> NORTH CANTON OH 44720-7038 </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:5px 0; vertical-align:bottom;">(330) 494-2453 </td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>



			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> CELL PHONE </td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> <input name="CELL_PHONE" value="<?php echo isset($info['CELL_PHONE']) ? $info['CELL_PHONE'] : $info['phone']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			     
			    </table>

			    </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;"> COUNTY </td>
				</tr>
				
				<tr>
				<td style=" font-size:18px; color:#000;  padding:5px 0;"> <input name="COUNTY" value="<?php echo isset($info['COUNTY']) ? $info['COUNTY'] : $info['phone']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			     </td>
			      <td style="width:55%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:14px; color:#000; padding:5px 0;"> www.freedomharley.com </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:5px 0; vertical-align:bottom;">  </td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>



			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> HOME PHONE </td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> <input name="HOME_PHONE" value="<?php echo isset($info['HOME_PHONE']) ? $info['HOME_PHONE'] : $info['phone']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			     
			    </table>

			    </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;"> HOG NUMBER </td>
				</tr>
				
				<tr>
				<td style=" font-size:18px; color:#000;  padding:5px 0;"><input name="HOG_NUMBER" value="<?php echo isset($info['HOG_NUMBER']) ? $info['HOG_NUMBER'] : ''; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
			     </td>
			      <td style="width:55%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:14px; color:#000; padding:5px 0;"> E-MAIL </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:5px 0; vertical-align:bottom;"> <input name="E-MAIL" value="<?php echo isset($info['E-MAIL']) ? $info['E-MAIL'] : $info['email']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>

			  
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			  <tr>
			    <td style="width:30%; border-right:solid 1px #000;"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> N - U / VIN </td>
				</tr>
				
				<tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> <input name="VIN" value="<?php echo isset($info['VIN']) ? $info['VIN'] : $info['vin']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			     
			    </table>

			    </td>
			     <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style=" font-size:10px; color:#639; padding:5px 0;"> YEAR </td>
				</tr>
				
				<tr>
				<td style=" font-size:18px; color:#000;  padding:5px 0;"> <input name="YEAR" value="<?php echo isset($info['YEAR']) ? $info['YEAR'] : $info['year']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			     </td>
			    <td style="width:20%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> MAKE </td>
				</tr>
				
				<tr>
				<td style="font-size:18px; color:#000;  padding:5px 0; vertical-align:bottom;"> <input name="MAKE" value="<?php echo isset($info['MAKE']) ? $info['MAKE'] : $info['make']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			      </td>
			      
			    <td style="width:15%; border-right:solid 1px #000;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> MODEL </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:5px 0; vertical-align:bottom;"><input name="MODEL" value="<?php echo isset($info['MODEL']) ? $info['MODEL'] : $info['model']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			      </td>
			      
			      <td style="width:20%;">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:5px 0;"> REF NO. </td>
				</tr>
				
				<tr>
				<td style="font-size:18px; color:#000;  padding:5px 0; vertical-align:bottom;"> <input name="REF_NO" value="<?php echo isset($info['REF_NO']) ? $info['REF_NO'] : ''; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
			      </td>
			  </tr>
			</table>


			  <table style="border:solid 1px #000;" width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:50%;"> 
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> PRICE </td>
				<td style="width:33%; font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> <input name="PRICE" value="<?php echo isset($info['PRICE']) ? $info['PRICE'] : $info['unit_value']; ?>" type="text"  class="entry_one currency priceVal" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;"></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> ACCYS </td>
				<td style="width:33%; font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> <input name="ACCYS" value="<?php echo isset($info['ACCYS']) ? $info['ACCYS'] : ''; ?>" type="text"  class="entry_one currency priceVal" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> LABOR </td>
				<td style="width:33%; font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> $<input name="LABOR" value="<?php echo isset($info['LABOR']) ? $info['LABOR'] : ''; ?>" type="text"  class="entry_one currency priceVal" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			     
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TOTAL </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#F00; text-align:center; padding:5px 0;"><input name="TOTAL_DATA1" value="<?php echo isset($info['TOTAL_DATA1']) ? $info['TOTAL_DATA1'] : ''; ?>" type="text"  class="entry_one currency totalsumval" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TRADE </td>
				<td style="width:33%; font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> <input name="TRADE" value="<?php echo isset($info['TRADE']) ? $info['TRADE'] : $info['trade_value']; ?>" type="text"  class="entry_one currency tradeval" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;"></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TOTAL </td>
				<td style="width:33%; font-size:16px; font-weight:600; text-align:center; padding:5px 0;"> <input name="TOTAL_DATA2" value="<?php echo isset($info['TOTAL_DATA2']) ? $info['TOTAL_DATA2'] : ''; ?>" type="text"  class="entry_one currency totalsubval" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> DOCUMENT FEE </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> $ <input name="DOCUMENT_FEE" value="<?php echo isset($info['DOCUMENT_FEE']) ? $info['DOCUMENT_FEE'] : @$doc_fee; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TAX </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> <input name="TAX" value="<?php echo isset($info['TAX']) ? $info['TAX'] : ''; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;">TITLE </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> $ <input name="TITLE" value="<?php echo isset($info['TITLE']) ? $info['TITLE'] : @$title_fee; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TEMPORARY TAG </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> <input name="TEMPORARY_TAG" value="<?php echo isset($info['TEMPORARY_TAG']) ? $info['TEMPORARY_TAG'] : ''; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TRADE PAYOFF </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> <input name="TRADE_PAYOFF" value="<?php echo isset($info['TRADE_PAYOFF']) ? $info['TRADE_PAYOFF'] : ''; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> DP </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> <input name="DP_DATA" value="<?php echo isset($info['DP_DATA']) ? $info['DP_DATA'] : ''; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			      <tr>
				<td style="width:33%; font-size:14px; color:#639; text-align:right; font-weight:600; padding:5px 0;"> TOTAL O-T-D </td>
				<td style="width:33%; font-size:16px; font-weight:600; color:#000; text-align:center; padding:5px 0;"> <input name="TOTAL_O_T_D" value="<?php echo isset($info['TOTAL_O_T_D']) ? $info['TOTAL_O_T_D'] : ''; ?>" type="text"  class="entry_one" /> </td>
				<td style="width:33%; font-size:10px; padding:5px 0;">  </td>
			      </tr>
			    </table>

			    </td>
			    <td style="width:50%;"> 
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="width:70%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:8px 0;"> TRADE VIN </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:8px 0; vertical-align:bottom;"> <input name="TRADE_VIN" value="<?php echo isset($info['TRADE_VIN']) ? $info['TRADE_VIN'] : $info['vin_trade']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
				<td style="width:30%; border-right:solid 1px #000;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:8px 0;"> REFERENCE NO. </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:8px 0; vertical-align:bottom;"> <input name="REFERENCE_NO" value="<?php echo isset($info['REFERENCE_NO']) ? $info['REFERENCE_NO'] : ''; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:8px 0;"> YEAR </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:8px 0; vertical-align:bottom;"><input name="YEAR_TRADE" value="<?php echo isset($info['YEAR_TRADE']) ? $info['YEAR_TRADE'] : $info['year_trade']; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:8px 0;"> MAKE  </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:8px 0; vertical-align:bottom;"> <input name="MAKE_TRADE" value="<?php echo isset($info['MAKE_TRADE']) ? $info['MAKE_TRADE'] : $info['make_trade']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:30%; border-right:solid 1px #000;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:10px 0;"> MODEL </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:10px 0; vertical-align:bottom;"><input name="MODEL_TRADE" value="<?php echo isset($info['MODEL_TRADE']) ? $info['MODEL_TRADE'] : $info['model_trade']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:10px 0;"> COLOR </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:10px 0; vertical-align:bottom;"><input name="COLOR" value="<?php echo isset($info['COLOR']) ? $info['COLOR'] : ''; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:10px 0;">MILES </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:10px 0; vertical-align:bottom;"> <input name="MILES_TRADE" value="<?php echo isset($info['MILES_TRADE']) ? $info['MILES_TRADE'] : $info['odometer_trade']; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:30%; border-right:solid 1px #000;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:10px; color:#639; padding:10px 0;"> LOAN BALANCE </td>
				</tr>
				
				<tr>
				<td style="font-size:14px; color:#000;  padding:10px 0; vertical-align:bottom;"><input name="LOAN_BALANCE" value="<?php echo isset($info['LOAN_BALANCE']) ? $info['LOAN_BALANCE'] : ''; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="font-size:10px; color:#639; padding:10px 0;"> LIENHOLDER </td>
				</tr>
				
				<tr>
				<td style="font-size:18px; color:#000; font-weight:600; padding:10px 0; vertical-align:bottom;"> <input name="LIENHOLDER" value="<?php echo isset($info['LIENHOLDER']) ? $info['LIENHOLDER'] : ''; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; color:#639; font-weight:600; padding:10px 0;"> TRADE VALUE </td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:35%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:10px 0;"> VALUE </td>
				</tr>
				
				<tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:10px 0; vertical-align:bottom;"> <input name="
				" value="<?php echo isset($info['TRADE_VALUE']) ? $info['TRADE_VALUE'] : $info['trade_value']; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:30%; border-right:solid 1px #000;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:10px 0;"> OWED </td>
				</tr>
				
				<tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:10px 0; vertical-align:bottom;"> <input name="TRADE_OWED" value="<?php echo isset($info['TRADE_OWED']) ? $info['TRADE_OWED'] : ''; ?>" type="text"  class="entry_one" /></td>
				</tr>
			      
			    </table>
				</td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="width:50%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; color:#639; font-weight:600; padding:8px 0;"> </td>
				</tr>
				
				 <tr>
				<td style="font-size:16px; color:#639; font-weight:600; padding:8px 0;"> </td>
				</tr>
			      
			    </table>
				</td>
				
				<td style="width:50%; border-right:solid 1px #000;">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:8px 0;"> NET </td>
				</tr>
				
				<tr>
				<td style="font-size:16px; color:#000; font-weight:600; padding:8px 0; vertical-align:bottom;"> <input name="NET_TOTAL" value="<?php echo isset($info['NET_TOTAL']) ? $info['NET_TOTAL'] : ''; ?>" type="text"  class="entry_one" /> </td>
				</tr>
			      
			    </table>
				</td>
				
			      </tr>
			    </table>

			    </td>
			  </tr>
			</table>



			   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			    <td style="width:50%; border:solid 1px #000;">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="color:#639; font-size:16px; font-weight:600; padding-top:10px;"> DOWN PAYMENT </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="color:#000; font-size:24px; font-weight:600; text-align:left; height:100px;">
				<textarea name="downpayment1" style="font-size:24px; font-weight:600;" rows="4" cols="30" >
				<?php echo isset($info['downpayment1']) ? $info['downpayment1'] : ''; ?>
				</textarea>
				</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; color:#639; font-size:16px;"> 
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:8px; color:#000; font-weight:600;">BRING TO SALESMGR</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> 1  WORKSHEET </td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> 2  REF # </td>
				  </tr>
				  
				   <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> 3  LICENSE # </td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> 4  NADA </td>
				  </tr>
				</table>

				</td>
				 <td style="width:50%; color:#639; font-size:16px;"> 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; color:#000; font-weight:600;"> WARRANTY INFORMATION (USED) </td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> A  SOLD AS IS </td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> G  SOLD WITH GUARANTEE </td>
				  </tr>
				  
				   <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> W  MFG. WARR. STILL APPLIES </td>
				  </tr>

				</table>
				  </td>
			      </tr>
			    </table>

			    </td>
			     <td style="width:50%; border:solid 1px #000;"> 
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="color:#639; font-size:16px; font-weight:600; padding-top:10px;"> MONTHLY PAYMENT GOAL</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="color:#000; font-size:24px; font-weight:600; text-align:left; height:100px;">
				<textarea name="downpayment2" style="font-size:24px; font-weight:600;" rows="4" cols="30" >
				<?php echo isset($info['downpayment2']) ? $info['downpayment2'] : ''; ?>
				</textarea>
				</td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; color:#639; font-size:16px;"> 
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; color:#000; font-weight:600;">&nbsp;</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				  
				   <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				</table>

				</td>
				 <td style="width:50%; color:#639; font-size:16px;"> 
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; color:#000; font-weight:600;">&nbsp;</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				  
				  <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; "> &nbsp;</td>
				  </tr>
				  
				   <tr>
				    <td style="font-size:14px; color:#000; padding:5px 0; ">&nbsp; </td>
				  </tr>

				</table>
				  </td>
			      </tr>
			    </table>
			     </td>
			    </tr>
			  </table>

			    
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; border:solid 1px #000;"> 
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;">&nbsp;CUSTOMER APPROVAL </td>
				  </tr>
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;"><input name="CUSTOMER_APPROVAL1" value="<?php echo isset($info['CUSTOMER_APPROVAL1']) ? $info['CUSTOMER_APPROVAL1'] : ''; ?>" type="text"  class="entry_one" /></td>
				  </tr>
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;">.</td>
				  </tr>
				</table>
				</td>
				<td style="width:50%; border:solid 1px #000;">  
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;">&nbsp;Dealership APPROVAL </td>
				  </tr>
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;">
				    <input name="CUSTOMER_APPROVAL2" value="<?php echo isset($info['CUSTOMER_APPROVAL2']) ? $info['CUSTOMER_APPROVAL2'] : ''; ?>" type="text"  class="entry_one" />
				    </td>
				  </tr>
				  <tr>
				    <td style="font-size:10px; color:#639; padding:3px 0;">.</td>
				  </tr>
				</table>
				</td>
			      </tr>
			    </table>  
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
			      <tr>
				<td style="font-size:13px; color:#000; padding:10px 0; text-align:center;">I hereby indicate my intent to purchase a motorcycle. I have available, or can obtain, sufficient funds to complete the transaction. I authorize the dealer representative to investigate my credit and employment history to evaluate my ability to purchase the above referenced motorcycle.</td>
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
	
	
	
	$(".priceVal").on('keyup',function(){
		
		var valdata = 0;
		$( ".priceVal" ).each(function( index ) 
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
		$(".totalsumval").val(convertFormatedMoney(valdata.toFixed(2)));
	});
	
	$(".tradeval").on('keyup',function(){
		var tradeval = $(this).val();
		tradeval = tradeval.replace(/,/g, '');
		
		totalsumval = $(".totalsumval").val();
		totalsumval = totalsumval.replace(/,/g, '');
		subval = parseFloat(totalsumval) - parseFloat(tradeval);
		$(".totalsubval").val(convertFormatedMoney(subval.toFixed(2)));
	});
	
	
	$(".subtotalval").on('keyup',function(){
		
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
		$("#sub_totalcal").val(convertFormatedMoney(valdata.toFixed(2)));
	});
	$(".price_set , .quality , .additional").on('keyup',function(){
		
		var valdata = 0;
		/*
		var salesprice_total=0;
		$( ".quality" ).each(function( index ) {
			var price = $(this).val();	
			salesprice_total = salesprice_total + price;
		});
		$("#salesprice_total").val(salesprice_total.toFixed(2));
		*/
		
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
				
				// hours1
				hourval = $("#hours"+attrid).val();
				hourval = hourval.replace(/,/g, '');
				
				// rate1
				rateval = $("#rate"+attrid).val();
				rateval = rateval.replace(/,/g, '');
				
				quality = parseFloat(quantityval);
				totalquality =  quality * parseFloat(price) + hourval * parseFloat(rateval);
				$("#price_qty_val"+attrid).val(convertFormatedMoney(totalquality.toFixed(2)));
				valdata = valdata + totalquality;
			}
		});

		$("#parts").val(convertFormatedMoney(valdata.toFixed(2)));
		$(".subtotalval").trigger("keyup");
	});
	
	
	$("#fright_set_up_val").on('keyup',function(){
		var fright_set_up_val = $(this).val();
		fright_set_up_val = fright_set_up_val.replace(/,/g, '');
		
		$( ".sales_price" ).trigger("keyup");
		
		salesprice_total = $("#unit_total").val();
		salesprice_total = salesprice_total.replace(/,/g, '');
		
		unit_total = parseFloat(salesprice_total) + parseFloat(fright_set_up_val);
		$("#unit_total").val(convertFormatedMoney(unit_total.toFixed(2)));
	});
	$(".sales_price").on('keyup',function(){
		
		var valdata = 0;
		var salesprice_total=0;
		
		$( ".sales_price" ).each(function( index ) {			
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
		$(".subtotalval").trigger("keyup");
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
	
	$("#dealer_service_fees").on('keyup',function(){	
		
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
		
		$("#taxable_valtotal").val(convertFormatedMoney(taxablevaltotal.toFixed(2)));
			
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
					$('#doc').val(data.doc_fee);
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
</script>
</div>
