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

		.taxes_one{ width:90%; border-bottom:solid 1px #FF9; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.taxes_one2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.taxes_one3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.taxes_one4{border: solid 2px #000 !important;
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
		#worksheet_
		wraper {width:100%;}
		}

	
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="font-size:20px; font-weight:600; color:#F00;"> SALES TAX COMPUTATIONS </td>
				  </tr>
				</table>

				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:60%;">
				 
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> </td>
				    <td style=" width:10%;font-size:13px; font-weight:600;"> </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; font-weight:600; text-align:center; color:#000;"> STATE </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;">  </td>
				  </tr>
				</table>



				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> NEW (N) OR USED (U) </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; background:#0CF; text-align:center; border:solid 1px #00CC33;">
				    New <input name="new_data" <?php echo ($info['new_data'] == "New") ? "selected" : ''; ?> value="New" type="radio"  class="entry_one" />
				    Used <input name="new_data" <?php echo ($info['new_data'] == "Used") ? "selected" : ''; ?> type="radio" value="Used"  class="entry_one" />
				    </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> AZ </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;"> SALES TAX COMPUTATIONS </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> STATE OF RESIDENCY </td>
				    <td style=" width:10%;font-size:13px; background:#0CF; text-align:center; border:solid 1px #00CC33;">
				    <input style="width:100% !important;" name="STATE_OF_RESIDENCY" value="<?php echo isset($info['STATE_OF_RESIDENCY']) ? $info['STATE_OF_RESIDENCY'] : ''; ?>" type="text"  class="entry_one" />
				    </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> CA </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;"> NO TRADE ALLOWANCE / DEDUCTION </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> MOTORCYCLE PURCHASE PRICE </td>
				    <td style=" width:10%;font-size:13px; background:#0CF; font-weight:600; text-align:center; border:solid 1px #00CC33;"> <input style="width:100% !important;" name="MOTORCYCLE_PURCHASE_PRICE" value="<?php echo isset($info['MOTORCYCLE_PURCHASE_PRICE']) ? $info['MOTORCYCLE_PURCHASE_PRICE'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> FL </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;">DEDUCT TRADE FROM NEW & USED </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> TRADE-IN AMOUNT </td>
				    <td style=" width:10%;font-size:13px; background:#0CF; font-weight:600; text-align:center; border:solid 1px #00CC33;">
				    <input style="width:100% !important;" name="TRADE_IN_AMOUNT" value="<?php echo isset($info['TRADE_IN_AMOUNT']) ? $info['TRADE_IN_AMOUNT'] : ''; ?>" type="text"  class="entry_one" />
				    </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> IN </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;">DEDUCT TRADE FROM NEW & USED </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;">  </td>
				    <td style=" width:10%;font-size:13px;  text-align:center; ">  </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> MA </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;">DEDUCT TRADE FROM NEW & USED </td>
				  </tr>
				  </table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> STATE TAX TO BE COLLECTED </td>
				    <td style=" width:10%;font-size:13px; background:#FF0; font-weight:600; text-align:center; border:solid 1px #00CC33;"> <input style="width:100% !important;" name="STATE_TAX" value="<?php echo isset($info['STATE_TAX']) ? $info['STATE_TAX'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> MI </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;"> DEDUCT TRADE FROM NEW & USED </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;">  </td>
				    <td style=" width:10%;font-size:13px;  text-align:center; ">  </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> SC </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;"> DEDUCT TRADE FROM NEW & USED </td>
				  </tr>
				  </table>
				  
				  
				  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;"> PERCENT TO BE COLLECTED </td>
				    <td style=" width:10%;font-size:13px; background:#FF0; font-weight:600; text-align:center; border:solid 1px #00CC33;"> <input style="width:100% !important;" name="PERCENT_TO_BE_COLLECTED" value="<?php echo isset($info['PERCENT_TO_BE_COLLECTED']) ? $info['PERCENT_TO_BE_COLLECTED'] : ''; ?>" type="text"  class="entry_one" /> </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;">  </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;">  </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
				  <tr>
				    <td style=" width:30%; font-size:13px; font-weight:600; text-align:right;">  </td>
				    <td style=" width:10%;font-size:13px;  text-align:center; ">  </td>
				    <td style=" width:10%;font-size:13px; font-weight:600; color:#000;">  </td>
				     <td style=" width:10%;font-size:13px; color:#000; text-align:center;"> OH </td>
				    <td style=" width:40%;font-size:13px; color:#000; padding:3px 0;"> DEDUCT TRADE FROM NEW ONLY </td>
				  </tr>
				  </table>
				  </td>
				  
				  <td style="width:40%;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> STATE </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> RATE </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> CAP</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> OHIO </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">PRELIM. STATE </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">STATE FINAL</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">COLLECT COMPUTE</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> AZ </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 5.6 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> CA </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 7.50 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> FL </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 6.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> IN </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 7.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> MA </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 6.25 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> MI </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 6.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> SC </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 5.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 300 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">  </td>
				     <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">  </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">  </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00 </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;">  </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> </td>
				      <td style="width:15%; font-size:13px; color:#000; text-align:center; padding:3px 0;"> 0.00</td>
				  </tr>
				</table>

				  </td>
				  
				    </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:50px;">
				  <tr>
				    <td style="font-size:20px; font-weight:600; color:#F00;"> OHIO TAXES BY COUNTY </td>
				  </tr>
				</table>

				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:15%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> COUNTY </td>
				     <td style="width:10%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> RATE </td>
				      <td style="width:10%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> MATCH </td>
				       <td style="width:10%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> CURRENT </td>
					<td style="width:10%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> NEW </td>
					 <td style="width:10%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> EFFECT NAME </td>
					 <td style="width:35%; font-size:13px; color:#933; padding:3px 0; font-weight:600;"> . </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> ADAMS </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; ">  </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> ALLEN </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> LOOK FOR COTA </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> #N/A </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> ASHLAND </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00%</td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> RETRIEVE COTA RATE </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> 0 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> ASHTABULA </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> OHIO BASE + COTA RATE </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> 0 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> ATHENS </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> LOOK FOR MATCH ON RECIPROCITY </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> 0 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> AUGLAIZE </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> RECIPROCITY TAX AMOUNT </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> $0.00 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> BELMONT </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> RECIPROCITY TAX RATE </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> 0 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> BROWN </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> OHIO TAX AMOUNT </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> #N/A </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> BUTLER </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.50% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.50% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> FINAL TAX AMOUNT ROUNDED </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> #N/A </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CARROLL </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> REFORMATTED AS TEXT </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> #N/A </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CHAMPAIGN </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;"> FINAL TAX RATE </td>
						 <td style="width:20%; font-size:13px; text-align:center;"> 0 </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CLARK </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CLERMONT </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CLINTON </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> COLUMBIANA </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> COSHOCTON </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CRAWFORD </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> CUYAHOGA </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 8.00% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 8.00% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> DARKE </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.25% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				  <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> DEFIANCE </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 6.75% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				  
				   <tr>
				    <td style="width:15%; font-size:13px; color:#000; padding:3px 0; "> DELAWARE </td>
				     <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00% </td>
				      <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 0.00% </td>
				       <td style="width:10%; font-size:13px; color:#000; padding:3px 0; "> 7.00% </td>
					<td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:10%; font-size:13px; color:#000; padding:3px 0; ">  </td>
					 <td style="width:35%; font-size:13px; color:#000; padding:3px 0; "> 
					   <table width="80%" border="0" cellspacing="0" cellpadding="0">
					      <tr>
						<td style="width:80%; font-size:13px; text-align:right;">  </td>
						 <td style="width:20%; font-size:13px; text-align:center;">  </td>
					      </tr>
					    </table>
				     </td>
				  </tr>
				</table>


				<table width="40%" border="0" cellspacing="0" cellpadding="0" style="margin-top:50px;">
				  <tr>
				    <td style="font-size:14px; text-align:center; background:#FF0;color:#000; padding:7px 0;"> COTA TABLE </td>
				  </tr>
				</table>

				<table width="40%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHDELAWARECOLUMBUS</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">DELAWARECOTA</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHDELAWAREWESTERVILLE</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">DELAWARECOTA</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHFAIRFIELDCOLUMBUS</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">FAIRFIELDCOTA</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHFAIRFIELDREYNOLDSBURG</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">FAIRFIELDCOTA</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHLICKINGREYNOLDSBURG</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">LICKINGCOTA</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">OHUNIONDUBLIN</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">UNIONCOTA</td>
				  </tr>
				  
				   <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				  </tr>
				  
				  <tr>
				    <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
				     <td style="width:50%; font-size:13px; padding:3px 0;">zzzzzz</td>
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
