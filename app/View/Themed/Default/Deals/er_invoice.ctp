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
$expectedt = date('m/d/Y');
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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 2px;}
	
	
	
@media print {
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="left" style="float: left; width: 55%;">
			<div class="logo" style="float: left; width: 100%; margin-bottom: 10px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-e.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 36px 0 10px; box-sizing: border-box; border: 1px solid #000; padding: 3px;">
				<h3 style="float: left; width: 100%; font-size: 16px; margin: 0; padding: 10px 5px; background-color: #ededed; color: red; box-sizing: border-box;"><b>SELLER</b></h3>
				<p style="font-size: 15px; margin: 2px 0;"><b>E.R. TRUCK & EQUIPMENT</b></p>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 60%;font-weight: bold;font-size: 15px;"></p>
				<p style="font-size: 15px; margin: 2px 0;">12360 NW SOUTH RIVER DRIVE</p>
				<p style="font-size: 15px; margin: 2px 0;">MIAMI, FL 33178</p>
				<p style="font-size: 15px; margin: 2px 0px 5px;">(305) 676-7640</p>
			</div>
		</div>
		
		<div class="right" style="float: right; width: 36%;">
			<h3 style="float: left; width: 100%; margin: 3px 0; font-size: 18px;"><b>E.R. Truck & Equipment</b></h3>
			<p style="font-size: 15px; margin: 0;">(305) 676-7640</p>
			<a href="#" style="font-size: 15px; margin: 0; color: blue;">www.ertruck.com</a>
			
			<div class="row" style="float: left; width: 100%; border-top: 1px solid #000; padding: 3px 0; margin: 7px 0;">
				<div class="form-field" style="width: 100%; float: left; margin: 4px 0;">
					<label><b>Invoice:</b></label>
					<input type="text" name="invoice" value="<?php echo isset($info['invoice'])?$info['invoice']:''; ?>" style="width: 60%; float: right; color: red;">
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 2px 0;">
					<label><b>Invoice Date:</b></label>
					<input type="text" name="invoice_date" value="<?php echo isset($info['invoice_date'])?$info['invoice_date']:''; ?>" style="width: 60%; float: right;">
				</div>	
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0 ; box-sizing: border-box; border: 1px solid #000; padding: 3px;">
				<h3 style="float: left; width: 100%; font-size: 16px; margin: 0; padding: 10px 5px; background-color: #ededed; color: red; box-sizing: border-box;"><b>BUYER</b></h3>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 60%;font-weight: bold;font-size: 15px;"></p>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 60%;"></p>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="company" value="<?php echo isset($info['company'])?$info['company']:''; ?>" style="width: 60%;"></p>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 60%;"></p>
				<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 60%;"></p>
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border-top: 1px solid #000;">
			<tr>
				<td colspan="10" style="background-color: blue; color: #fff; text-align: left;">DUMPS</td>
			</tr>
			
			<tr>
				<td style="text-align: center;"><b>#</b></td>
				<td style="text-align: center;"><b>ID #</b></td>
				<td style="text-align: center;"><b>HOURS/Miles</b></td>
				<td style="text-align: center;"><b>VIN/SN</b></td>
				<td style="text-align: center;"><b>YR</b></td>
				<td style="text-align: center;"><b>MAKE</b></td>
				<td style="text-align: center;"><b>MODEL</b></td>
				<td style="text-align: center;"><b>TYPE</b></td>
				<td style="text-align: center;"><b>COLOR</b></td>
				<td style="width: 18%; text-align: center;"><b>COST</b></td>
			</tr>
			
			<tr style="height: 40px;">
				<td style="width: 2%;">01</td>
				<td style="width: 10%;"><input type="text" name="id" value="<?php echo isset($info['id']) ? $info['id'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 20%;"><input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 5%;"><input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%;"><input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%; text-align: center;"><textarea  id="type" name="type_data" style="border: 0px; text-align: center;"><?php echo isset($info['type_data']) ? $info['type_data'] : $info['class']." ".$info['type']; ?></textarea></td>
				<td><input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" class="invoice" id="unit_value" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			<tr style="height: 40px;">
				<td style="width: 2%;">02</td>
				<td style="width: 10%;"><input type="text" name="id1" value="<?php echo isset($info['id1']) ? $info['id1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="hours1" value="<?php echo isset($info['hours1']) ? $info['hours1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 20%;"><input type="text" name="vin1" value="<?php echo isset($info['vin1'])?$info['vin1']:$info['vin_addon1']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 5%;"><input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%;"><input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_id_addon1']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%; text-align: center;"><textarea  id="type1" name="type1" style="border: 0px; text-align: center;"><?php echo isset($info['type1'])?$info['type1']:$info['category_addon1']; ?></textarea></td>
				<td><input type="text" name="color1" value="<?php echo isset($info['color1'])?$info['color1']:$info['unit_color_addon1']; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" class="invoice" id="unit_value1" name="unit_value1" value="<?php echo isset($info['unit_value1'])?$info['unit_value1']:$info['unit_value_addon1']; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			<tr style="height: 40px;">
				<td style="width: 2%;">03</td>
				<td style="width: 10%;"><input type="text" name="id2" value="<?php echo isset($info['id2']) ? $info['id2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="hours2" value="<?php echo isset($info['hours2']) ? $info['hours2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 20%;"><input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:$info['vin_addon2']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 5%;"><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$info['year_addon2']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%;"><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:$info['make_addon2']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$info['model_id_addon2']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%; text-align: center;"><textarea  id="type1" name="type1" style="border: 0px; text-align: center;"><?php echo isset($info['type2'])?$info['type2']:$info['category_addon2']; ?></textarea></td>
				<td><input type="text" name="color2" value="<?php echo isset($info['color2'])?$info['color2']:$info['unit_color_addon2']; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" class="invoice" id="unit_value2" name="unit_value2" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:$info['unit_value_addon2']; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			
			<tr style="height: 40px;">
				<td style="width: 2%;">04</td>
				<td style="width: 10%;"><input type="text" name="id3" value="<?php echo isset($info['id3']) ? $info['id3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="hours3" value="<?php echo isset($info['hours3']) ? $info['hours3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 20%;"><input type="text" name="vin3" value="<?php echo isset($info['vin3'])?$info['vin3']:$info['vin_addon3']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 5%;"><input type="text" name="year3" value="<?php echo isset($info['year3'])?$info['year3']:$info['year_addon3']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%;"><input type="text" name="make3" value="<?php echo isset($info['make3'])?$info['make3']:$info['make_addon3']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:$info['model_id_addon3']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%; text-align: center;"><textarea  id="type3" name="type3" style="border: 0px; text-align: center;"><?php echo isset($info['type3'])?$info['type3']:$info['category_addon3']; ?></textarea></td>
				<td><input type="text" name="color3" value="<?php echo isset($info['color3'])?$info['color3']:$info['unit_color_addon3']; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" class="invoice" id="unit_value3" name="unit_value3" value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:$info['unit_value_addon3']; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			<tr style="height: 40px;">
				<td style="width: 2%;">05</td>
				<td style="width: 10%;"><input type="text" name="id4" value="<?php echo isset($info['id4']) ? $info['id4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="hours4" value="<?php echo isset($info['hours4']) ? $info['hours4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 20%;"><input type="text" name="vin4" value="<?php echo isset($info['vin4'])?$info['vin4']:$info['vin_addon4']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 5%;"><input type="text" name="year4" value="<?php echo isset($info['year4'])?$info['year4']:$info['year_addon4']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%;"><input type="text" name="make4" value="<?php echo isset($info['make4'])?$info['make4']:$info['make_addon4']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 10%;"><input type="text" name="model4" value="<?php echo isset($info['model4'])?$info['model4']:$info['model_id_addon4']; ?>" style="width: 100%; text-align: center;"></td>
				<td style="width: 15%; text-align: center;"><textarea  id="type4" name="type4" style="border: 0px; text-align: center;"><?php echo isset($info['type4'])?$info['type4']:$info['category_addon4']; ?></textarea></td>
				<td><input type="text" name="color4" value="<?php echo isset($info['color4'])?$info['color4']:$info['unit_color_addon4']; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" class="invoice" id="unit_value4" name="unit_value4" value="<?php echo isset($info['unit_value4'])?$info['unit_value4']:$info['unit_value_addon4']; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<table cellpadding="0" cellspacing="0" style="float: right; width: 50%; border-top: 1px solid #000;">
				<tr>
					<td style="text-align: right; background-color: #ededed"><b>DEALER FEE</b></td>
					<td style="text-align: center; width: 36%;"><input type="text" name="dealer_fee" class="invoice" id="dealer_fee" value="<?php echo isset($info['dealer_fee']) ? $info['dealer_fee'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				</tr>
				
				<tr>
					<td style="text-align: right; background-color: #ededed"><b>REGISTRATION</b></td>
					<td style="text-align: center;"><input type="text" name="regist" class="invoice" id="regist" value="<?php echo isset($info['regist']) ? $info['regist'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				</tr>
				
				<tr>
					<td style="text-align: right; background-color: #ededed"><b>TAXES</b></td>
					<td style="text-align: center;"><input type="text" name="taxes" class="invoice" id="taxes" value="<?php echo isset($info['taxes']) ? $info['taxes'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<table cellpadding="0" cellspacing="0" style="float: right; width: 30%; border-top: 1px solid #000;">
				<tr>
					<td style="text-align: center; background-color: blue; color: #fff;"><b>Invoice Total</b></td>
					<td style="text-align: center; width: 60%;"><input type="text" name="taxes" class="invoice" id="total_invoice" value="<?php echo isset($info['total_invoice']) ? $info['total_invoice'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				</tr>
			</table>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="width: 55%; margin: 0;">
				<div class="row" style="float: left; width: 100%; margin: 20px 0 10px; box-sizing: border-box; border: 1px solid #000; padding: 3px; height: 140px;">
					<h3 style="float: left; width: 100%; font-size: 16px; margin: 0 0 4px; padding: 10px 5px; background-color: #ededed; color: red; box-sizing: border-box;"><b>ADDITIONAL NOTES</b></h3>
					<p style="font-size: 15px; margin: 2px 0;"><input type="text" name="addition_note" value="<?php echo isset($info['addition_note'])?$info['addition_note']:''; ?>" style="width: 60%;"></p>
					<p style="font-size: 15px; margin: 2px 0; color: blue;"><b>Please Sign and Fax to (305) 805-4778</b></p>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 36%">
				<div class="form-field" style="float: left; width: 100%; margin: 20px 0 20px;">
					<label><b>Seller Signature</b></label>
					<input type="text" name="seller_sign" value="<?php echo isset($info['seller_sign'])?$info['seller_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin: 15px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label><b>Buyer Signature</b></label>
					<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin: 15px 0 0;">
				</div>
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; margin: 4px 0; font-size: 17px;"><b>BY SIGNING THIS INVOICE, YOU HAVE READ AND AGREE TO THE FOLLOWING:</b></h3>
		
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">I hereby certify that I am 21 years of age. This writing is intended by the parties as a final expression of the agreement for sale of the above-mentioned unit, and as a complete and exclusive statement of the terms of agreement.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">Purchaser affirmatively represents that the vehicle(s) described herein is being purchased without any expressed or implied warranties, whether oral or written, by any employee, agent or representative of seller, as in the accuracy of the odometer reading. This sale is final, and there will be no returns for any reason whatsoever. The purchaser is purchasing the mentioned unit with the equipment specified above, and at the price and other terms specified above. The purchaser may not demand or expect equipment, parts, supplies, labor, service, or rebate other than as specified above. No course of prior dealings between parties, and no usage of the trade shall be relevant to the supplement or explain any term used herein.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">This agreement shall be governed by the laws of the State of Florida. Any action to enforce this agreement must be brought to the court in Miami Dade County, Florida, where each agreement has been entered into and contracted to be performed. To the extent any provision of this agreement may be determined to be invalid or unenforceable, such invalidity or unenforceability shall not affect the other provisions hereof. If more
than one, shall be joint and several. This agreement shall be binding upon the parties, its/their successors, legal representatives and assigns and is a valid legal instrument. Notices here under shall (a) be in writing, (b) be delivered personally or sent by mail or overnight courier to the intended recipient at its address specified above.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">After careful inspection and demonstration, the purchaser hereby agrees to purchase and accept the
above-mentioned unit in their present "as is" condition. the seller makes no warranty of merchant-ability in respect to the unit being sold here under in addition, the seller makes no warranty that the unit sold here under are fit for any particular purpose.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">This sale is not valid until accepted by the seller's company manager. Deposit may not be refundable. If sale is not completed in 3 days, the vehicle may be resold and the deposit forfeited as liquidated damages. Should a problem arise in the soundness of the equipment buyer agrees to hold seller harmless.</p>
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 14px;">To the extent permitted by law, buyer waives trial by jury in any action arising out of, under or in connection with this agreement, or the transactions contemplated herein.</p>
	</div>
	<!-- worksheet end -->
		
		
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

	$(".invoice").on('change keyup paste', function(){
		calculate_totalinvoice();
	});

	function calculate_totalinvoice() {
		var unit_value = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var unit_value1 = isNaN(parseFloat( $('#unit_value1').val()))?0.00:parseFloat($('#unit_value1').val());
		var unit_value2 = isNaN(parseFloat( $('#unit_value2').val()))?0.00:parseFloat($('#unit_value2').val());
		var unit_value3 = isNaN(parseFloat( $('#unit_value3').val()))?0.00:parseFloat($('#unit_value3').val());
		var unit_value4 = isNaN(parseFloat( $('#unit_value4').val()))?0.00:parseFloat($('#unit_value4').val());
		
		var dealer_fee = isNaN(parseFloat( $('#dealer_fee').val()))?0.00:parseFloat($('#dealer_fee').val());
		var regist = isNaN(parseFloat( $('#regist').val()))?0.00:parseFloat($('#regist').val());
		var taxes = isNaN(parseFloat( $('#taxes').val()))?0.00:parseFloat($('#taxes').val());
		var total_invoice = unit_value + unit_value1 + unit_value2 + unit_value3 + unit_value4 + dealer_fee + regist + taxes;

		$("#total_invoice").val(total_invoice.toFixed(2));
	}

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
