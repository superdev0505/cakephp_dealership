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

		.open_road_we_own{ width:85%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_we_own2{ width:70%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_we_own3{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.open_road_we_own4{border: solid 2px #000 !important;
			  -webkit-appearance: none;
			  -moz-appearance: none;
			  -o-appearance: none;
			  appearance: none;
			  width: 25px;
			  height: 25px; vertical-align:middle;
			  margin-right: 10px;}
				  
		.open_road_we_own5{ width:65%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
     
     
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
				    <td style="font-size:24px; color:#333; font-weight:600; padding:9px 0;"> Open Road Complete RV  </td>
				  </tr> 
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:50%; font-size:15px; color:#333; padding:2px 0;"> NAME <input name="NAME"  value="<?php echo isset($info['NAME']) ? $info['NAME'] : $info['first_name']." ".$info['last_name'] ; ?>" type="text" class="open_road_we_own" /> </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:2px 0;"> STK No. <input name="STK_No"  value="<?php echo isset($info['STK_No']) ? $info['STK_No'] : $info['stock_num']; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:2px 0;"> NEW/USED <input name="NEW_USED"  value="<?php echo isset($info['NEW_USED']) ? $info['NEW_USED'] : ''; ?>" type="text" class="open_road_we_own3" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:50%; font-size:15px; color:#333; padding:2px 0;"> ADDRESS <input name="ADDRESS"  value="<?php echo isset($info['ADDRESS']) ? $info['ADDRESS'] : $info['address']; ?>" type="text" class="open_road_we_own" /> </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:2px 0;"> YEAR <input name="YEAR"  value="<?php echo isset($info['YEAR']) ? $info['YEAR'] : $info['year']; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:2px 0;"> MAKE <input name="MAKE"  value="<?php echo isset($info['MAKE']) ? $info['MAKE'] : $info['make']; ?>" type="text" class="open_road_we_own3" /> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:35%; font-size:15px; color:#333; padding:2px 0;"> CITY <input name="CITY"  value="<?php echo isset($info['CITY']) ? $info['CITY'] : $info['city']; ?>" type="text" class="open_road_we_own" /> </td>
				    <td style="width:20%; font-size:15px; color:#333; padding:2px 0;"> STATE <input name="STATE"  value="<?php echo isset($info['STATE']) ? $info['STATE'] : $info['state']; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:20%; font-size:15px; color:#333; padding:2px 0;"> ZIP <input name="ZIP"  value="<?php echo isset($info['ZIP']) ? $info['ZIP'] : $info['zip']; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:2px 0;"> MODEL <input name="MODEL"  value="<?php echo isset($info['MODEL']) ? $info['MODEL'] : $info['model']; ?>" type="text" class="open_road_we_own3" /> </td>
				  </tr>
				</table>


				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:60%; font-size:15px; color:#333; padding:2px 0;"> PHONE <input name="PHONE"  value="<?php echo isset($info['PHONE']) ? $info['PHONE'] : $info['phone']; ?>" type="text" class="open_road_we_own" /> </td>
				    <td style="width:40%; font-size:15px; color:#333; padding:2px 0;"> VIN NO. <input name="VIN"  value="<?php echo isset($info['VIN']) ? $info['VIN'] : $info['vin']; ?>" type="text" class="open_road_we_own" /> </td>
				  </tr>
				</table>   

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:20%; font-size:15px; color:#333; padding:2px 0;"> </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:2px 0;"> SALESPERSON <input name="SALESPARSON"  value="<?php echo isset($info['SALESPARSON']) ? $info['SALESPARSON'] : $info['sperson']; ?>" type="text" class="open_road_we_own2" /> </td>
				     <td style="width:20%; font-size:15px; color:#333; padding:2px 0;"> DEL.DATE <input name="DEL_DATE"  value="<?php echo isset($info['DEL_DATE']) ? $info['DEL_DATE'] : ''; ?>" type="text" class="open_road_we_own3" /> </td>
				  </tr>
				</table> 


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px;">
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"> QTY </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;">  NAME OF ITEM </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> PART  </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> LABOR  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"> <input name="QTY1"  value="<?php echo isset($info['QTY1']) ? $info['QTY1'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="ITEM1"  value="<?php echo isset($info['ITEM1']) ? $info['ITEM1'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;">  <input name="PART1"  value="<?php echo isset($info['PART1']) ? $info['PART1'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR1"  value="<?php echo isset($info['LABOR1']) ? $info['LABOR1'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"><input name="QTY2"  value="<?php echo isset($info['QTY2']) ? $info['QTY2'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="ITEM2"  value="<?php echo isset($info['ITEM2']) ? $info['ITEM2'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="PART2"  value="<?php echo isset($info['PART2']) ? $info['PART2'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR2"  value="<?php echo isset($info['LABOR2']) ? $info['LABOR2'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"><input name="QTY3"  value="<?php echo isset($info['QTY3']) ? $info['QTY3'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="ITEM3"  value="<?php echo isset($info['ITEM3']) ? $info['ITEM3'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="PART3"  value="<?php echo isset($info['PART3']) ? $info['PART3'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR4"  value="<?php echo isset($info['LABOR4']) ? $info['LABOR4'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"><input name="QTY5"  value="<?php echo isset($info['QTY5']) ? $info['QTY5'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="ITEM5"  value="<?php echo isset($info['ITEM5']) ? $info['ITEM5'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="PART5"  value="<?php echo isset($info['PART5']) ? $info['PART5'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR5"  value="<?php echo isset($info['LABOR5']) ? $info['LABOR5'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"><input name="QTY6"  value="<?php echo isset($info['QTY6']) ? $info['QTY6'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="ITEM6"  value="<?php echo isset($info['ITEM6']) ? $info['ITEM6'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="PART6"  value="<?php echo isset($info['PART6']) ? $info['PART6'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR6"  value="<?php echo isset($info['LABOR6']) ? $info['LABOR6'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:10%; font-size:15px; color:#333; padding:5px 0; border:solid 1px #333;"><input name="QTY7"  value="<?php echo isset($info['QTY7']) ? $info['QTY7'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				    <td style="width:60%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="ITEM7"  value="<?php echo isset($info['ITEM7']) ? $info['ITEM7'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				     <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"><input name="PART7"  value="<?php echo isset($info['PART7']) ? $info['PART7'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				      <td style="width:15%; font-size:15px; color:#333; padding:5px 0; text-align:center; border:solid 1px #333;"> <input name="LABOR7"  value="<?php echo isset($info['LABOR7']) ? $info['LABOR7'] : ''; ?>" type="text" class="open_road_we_own2" />  </td>
				  </tr>
				  
				</table>      
				       
					
				    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
				  <tr>
				    <td style="font-size:15px; color:#333; padding:2px 0; line-height:25px;"> I here by accept this  WE-OWN with the understanding that it is valid for only ( 30 ) THIRTY <br />
				     DAYS FROM DATE OF ISSUANCE , and that i must make an ADVANCE APPOINTMENT WITH <br />
				     THE SERVICE DEPARTMENT before the above work can be performed</td>
				  </tr>
				</table>    

				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; color:#ccc; padding:2px 0; line-height:22px;">  ( FOR APPOINTMENT CALL SERVICE DEP. )</td>
				  </tr>
				</table> 

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style=" width:60%; font-size:16px; color:#333; padding:2px 0; line-height:22px;">  CUSTOMER <input name="CUSTOMER_NAME"  value="<?php echo isset($info['CUSTOMER_NAME']) ? $info['CUSTOMER_NAME'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				    <td style=" width:40%; font-size:14px; color:#333; padding:2px 0; line-height:22px;"> 
				     <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="font-size:16px; color:#333; padding:5px 0;"> DATE <input name="DATE"  value="<?php echo isset($info['DATE']) ? $info['DATE'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				      </tr>
				      
				      <tr>
					<td style="font-size:16px; color:#333; padding:5px 0;"> APPROVED <input name="APPROVED"  value="<?php echo isset($info['APPROVED']) ? $info['APPROVED'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				      </tr>
				    </table> 
				     </td>
				  </tr>
				</table>    
					 
				     
				     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:25px;">
				  <tr>
				    <td style="width:25%; font-size:14px; color:#333; padding:8px 0; border:solid 1px #333; text-align:center;"> YOU OWE </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="font-size:14px; color:#333;"> TO BERECEIVED </td>
				      </tr>
				    </table>
				    
				    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:solid 1px #333;">
				      <tr>
					<td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> DATE  </td>
					<td style=" width:50%; font-size:14px; color:#333;"> TIME </td>
				      </tr>
				    </table>
				   
				     </td>
				     <td style="width:25%; font-size:14px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> YOU OWE  </td>
				      <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="font-size:14px; color:#333;"> TO BERECEIVED </td>
				      </tr>
				    </table>
				    
				    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:solid 1px #333;">
				      <tr>
					<td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> DATE  </td>
					<td style=" width:50%; font-size:14px; color:#333;"> TIME </td>
				      </tr>
				    </table>
				       </td>
				  </tr> 
				</table>    

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:25%; font-size:14px; color:#333; padding:8px 0; border:solid 1px #333; font-weight:600;"> 1 ) Title to trade in vehicle </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;">
					   <input name="tradeinvehicledate"  value="<?php echo isset($info['tradeinvehicledate']) ? $info['tradeinvehicledate'] : ''; ?>" type="text" class="open_road_we_own2" />
					   </td>
						<td style=" width:50%; font-size:14px; color:#333;">
						<input name="tradeinvehicletime"  value="<?php echo isset($info['tradeinvehicletime']) ? $info['tradeinvehicletime'] : ''; ?>" type="text" class="open_road_we_own2" />
						</td>
				      </tr>
				    </table>   
				   
				     </td>
				     <td style="width:25%; font-size:14px; color:#333; padding:8px 0; font-weight:600; border-bottom:solid 1px #333;"> 5 )  
					 
					 	  <input name="youowe_tradeinvehicle"  value="<?php echo isset($info['youowe_tradeinvehicle']) ? $info['youowe_tradeinvehicle'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					 </td>
				      <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				        <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;">
					   <input name="tradeinvehicleTodate"  value="<?php echo isset($info['tradeinvehicleTodate']) ? $info['tradeinvehicleTodate'] : ''; ?>" type="text" class="open_road_we_own2" />
					   </td>
						<td style=" width:50%; font-size:14px; color:#333;">
						<input name="tradeinvehicleTotime"  value="<?php echo isset($info['tradeinvehicleTotime']) ? $info['tradeinvehicleTotime'] : ''; ?>" type="text" class="open_road_we_own2" />
						</td>
				   
				      </tr>
				    </table>
				       </td>
				  </tr> 
				</table>  

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:25%; font-size:14px; color:#333; padding:8px 0; border:solid 1px #333; font-weight:600;"> 2 ) All Money </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;">   
						  <input name="allmoneydate"  value="<?php echo isset($info['allmoneydate']) ? $info['allmoneydate'] : ''; ?>" type="text" class="open_road_we_own2" />
					 
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;">
					  <input name="allmoneytime"  value="<?php echo isset($info['allmoneytime']) ? $info['allmoneytime'] : ''; ?>" type="text" class="open_road_we_own2" />
					 	
					</td>
				      </tr>
				    </table>
				     </td>
				     <td style="width:25%; font-size:14px; color:#333; padding:8px 0; font-weight:600; border-bottom:solid 1px #333;"> 6 )  
					 	  <input name="youowe_allmoney"  value="<?php echo isset($info['youowe_allmoney']) ? $info['youowe_allmoney'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					 </td>
				      <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;">   
						  <input name="allmoneyTodate"  value="<?php echo isset($info['allmoneyTodate']) ? $info['allmoneyTodate'] : ''; ?>" type="text" class="open_road_we_own2" />
					 
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;">
					  <input name="allmoneyTotime"  value="<?php echo isset($info['allmoneyTotime']) ? $info['allmoneyTotime'] : ''; ?>" type="text" class="open_road_we_own2" />
					 	
					</td>
				      </tr>
				    </table>
				       </td>
				  </tr> 
				</table> 


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:25%; font-size:14px; color:#333; padding:8px 0; border:solid 1px #333; font-weight:600;"> 3 ) Valid Insurance Card </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> 
						  <input name="ValidInsuranceCardDate"  value="<?php echo isset($info['ValidInsuranceCardDate']) ? $info['ValidInsuranceCardDate'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;"> 
							  <input name="ValidInsuranceCardTime"  value="<?php echo isset($info['ValidInsuranceCardTime']) ? $info['ValidInsuranceCardTime'] : ''; ?>" type="text" class="open_road_we_own2" />
					
							</td>
				      </tr>
				    </table>
				    
				     </td>
				     <td style="width:25%; font-size:14px; color:#333; padding:8px 0; font-weight:600; border-bottom:solid 1px #333;"> 7 ) 
					<input name="youowe_ValidInsuranceCard"  value="<?php echo isset($info['youowe_ValidInsuranceCard']) ? $info['youowe_ValidInsuranceCard'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					 </td>
				      <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				      <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> 
						  <input name="ValidInsuranceCardToDate"  value="<?php echo isset($info['ValidInsuranceCardToDate']) ? $info['ValidInsuranceCardToDate'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;"> 
							  <input name="ValidInsuranceCardToTime"  value="<?php echo isset($info['ValidInsuranceCardToTime']) ? $info['ValidInsuranceCardToTime'] : ''; ?>" type="text" class="open_road_we_own2" />
					
							</td>
				      </tr>
				    </table>
				       </td>
				  </tr> 
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:25%; font-size:14px; color:#333; padding:8px 0; border:solid 1px #333; font-weight:600;"> 4 )  </td>
				    <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> 
						  <input name="OtherDate"  value="<?php echo isset($info['OtherDate']) ? $info['OtherDate'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;">
					  <input name="OtherTime"  value="<?php echo isset($info['OtherTime']) ? $info['OtherTime'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					</td>
				      </tr>
				    </table>
				    
				     </td>
				     <td style="width:25%; font-size:14px; color:#333; padding:8px 0; font-weight:600; border-bottom:solid 1px #333;"> 8 ) 
				<input name="youowe_other"  value="<?php echo isset($info['youowe_other']) ? $info['youowe_other'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					 </td>
				      <td style="width:25%; font-size:15px; color:#333; padding:8px 0; text-align:center; border:solid 1px #333;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				       <td style=" width:50%; font-size:14px; color:#333; border-right:solid 1px #333;"> 
						  <input name="OtherToDate"  value="<?php echo isset($info['OtherToDate']) ? $info['OtherToDate'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					   </td>
					<td style=" width:50%; font-size:14px; color:#333;">
					  <input name="OtherToTime"  value="<?php echo isset($info['OtherToTime']) ? $info['OtherToTime'] : ''; ?>" type="text" class="open_road_we_own2" />
					
					</td>
				      </tr>
				    </table>
				       </td>
				  </tr> 
				</table>



				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:14px; color:#333; padding:2px 0; line-height:22px;"> I here by agree to provid such items in a timely manner</td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style=" width:60%; font-size:16px; color:#333; padding:2px 0; line-height:22px;">  CUSTOMER <input name="CUSTOMER2"  value="<?php echo isset($info['CUSTOMER2']) ? $info['CUSTOMER2'] : ''; ?>" type="text" class="open_road_we_own2" /></td>
				    <td style=" width:40%; font-size:14px; color:#333; padding:2px 0; line-height:22px;"> 
				     <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="font-size:16px; color:#333; padding:5px 0;"> DATE <input name="DATE1"  value="<?php echo isset($info['DATE1']) ? $info['DATE1'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
				      </tr>
				      
				      <tr>
					<td style="font-size:16px; color:#333; padding:5px 0;"> APPROVED <input name="APPROVED1"  value="<?php echo isset($info['APPROVED1']) ? $info['APPROVED1'] : ''; ?>" type="text" class="open_road_we_own2" /> </td>
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
