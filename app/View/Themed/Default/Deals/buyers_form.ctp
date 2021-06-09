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
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	table label{font-size: 11px;}
	table{font-size: 11px;}
	td, th{padding: 1px;}
	table{border: 1px solid #000; border-right: 0px;}
	th{border-right: 1px solid #000; padding: 4px;}
	td{border-right: 1px solid #000; border-bottom: 1px solid #000;}
	table td input[type="text"]{border-bottom: 0px;}
	.no-border input[type="text"]{border-bottom: 0px;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="left" style="float: left; width: 25%; text-align: center; margin-top: 10px; font-size: 11px;">
				P.O. Box 354 <br> 14884 113th Street <br> LITTLE FALLS, MN 56345
			</div>
			<div class="center" style="float: left; width: 22%; margin-left: 13%; text-align: center;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/hillson-rv.png'); ?>" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 25%; text-align: center; margin-top: 10px; font-size: 11px;">
				(320) 632-4065 or <br> 1-800-856-4065 <br> FAX (320) 632-9302
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 33%; margin: 0;">
				<label>Stock #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 34%; margin: 0;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 0;">
				<label>Salesperson:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 40%; margin: 0;">
				<label>Buyer Name: (Last)</label>
				<input type="text" name="l_name"  value="<?php echo isset($info['l_name']) ? $info['l_name'] : $info['last_name']; ?>" style="width: 64%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0;">
				<label>(First)</label>
				<input type="text" name="f_name" value="<?php echo isset($info['f_name']) ? $info['f_name'] :  $info['first_name']; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0;">
				<label>(Middle)</label>
				<input type="text" name="m_name" value="<?php echo isset($info['m_name']) ? $info['m_name'] :  $info['m_name']; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 40%; margin: 0;">
				<label>Co Buyer Name: (Last)</label>
				<input type="text" name="co_l_name"  value="<?php echo isset($info['co_l_name']) ? $info['co_l_name'] : $info['spouse_last_name']; ?>" style="width: 58%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0;">
				<label>(First)</label>
				<input type="text" name="co_f_name" value="<?php echo isset($info['co_f_name']) ? $info['co_f_name'] :  $info['spouse_first_name']; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0;">
				<label>(Middle)</label>
				<input type="text" name="co_m_name" value="<?php echo isset($info['co_m_name']) ? $info['co_m_name'] :  $info['spouse_suffix']; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%; margin: 0;">
				<label>Address:</label>
				<input type="text" name="address"  value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] :  ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0;">
				<label>State:</label>
				<input type="text" name="State" value="<?php echo isset($info['State']) ? $info['State'] :  ''; ?>" style="width: 58%;">
			</div>
			<div class="form-field" style="float: left; width: 16%; margin: 0;">
				<label>Country:</label>
				<input type="text" name="county" value="<?php echo isset($info['county']) ? $info['county'] :  ''; ?>" style="width: 57%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] :  ''; ?>" style="width: 69%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 25%; margin: 0;">
				<label>Home Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 61%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0;">
				<label>Bus Phone:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 64%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0;">
				<label>Buyer DOB:</label>
				<input type="text" name="buyer_dob" value="<?php echo isset($info['buyer_dob']) ? $info['buyer_dob'] : $info['dob']; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0;">
				<label>Co-Buyer DOB:</label>
				<input type="text" name="co_buyer_dob" value="<?php echo isset($info['co_buyer_dob']) ? $info['co_buyer_dob'] : ''; ?>" style="width: 55%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 0;">
				<label>Buyer D.L #:</label>
				<input type="text" name="buyer_dl" value="<?php echo isset($info['buyer_dl']) ? $info['buyer_dl'] : ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 0;">
				<label>Co-Buyer D.L #:</label>
				<input type="text" name="co_buyer_dl" value="<?php echo isset($info['co_buyer_dl']) ? $info['co_buyer_dl'] : ''; ?>" style="width: 77%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label>Buyers Insurance Co.:</label>
				<input type="text" name="buyer_ins" value="<?php echo isset($info['buyer_ins']) ? $info['buyer_ins'] : ''; ?>" style="width: 85%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 45%; margin: 0;">
				<label>PLEASE ENTER MY ORDER FOR:</label>
				<label>New <input type="checkbox" name="order_check" value="New" <?php echo ($info['order_check'] == "New") ? "checked" : ""; ?> /></label>
				<label>Used <input type="checkbox" name="order_check" value="Used" <?php echo ($info['order_check'] == "Used") ? "checked" : ""; ?> /></label>
				<label>Demo <input type="checkbox" name="order_check" value="Demo" <?php echo ($info['order_check'] == "Demo") ? "checked" : ""; ?> /></label>
			</div>
			<div class="form-field" style="float: left; width: 28%; margin: 0;">
				<label>Lienholder:</label>
				<input type="text" name="leinholder" value="<?php echo isset($info['leinholder']) ? $info['leinholder'] : "" ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 27%; margin: 0;">
				<label>Address:</label>
				<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : "" ?>" style="width: 74%">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 12%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 18%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>BODY</label>
				<input type="text" name="body" value="<?php echo isset($info['body']) ? $info['body'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 18%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>TRANSMISSION</label>
				<input type="text" name="transmission" value="<?php echo isset($info['transmission']) ? $info['transmission'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>COLOR</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0; box-sizing: border-box; padding: 2px;">
				<label>INTERIOR</label>
				<input type="text" name="interior" value="<?php echo isset($info['interior']) ? $info['interior'] : ''; ?>" style="width: 100%">
			</div>
		</div>
		
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 15%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>LIC. #</label>
				<input type="text" name="lic" value="<?php echo isset($info['lic']) ? $info['lic'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>TAB EXP. DATE</label>
				<input type="text" name="exp_date" value="<?php echo isset($info['exp_date']) ? $info['exp_date'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label>MILEAGE</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%">
			</div>
			<div class="form-field" style="float: left; width: 23%; margin: 0; box-sizing: border-box; padding: 2px;">
				<label>DELIVERED ON OR ABOUT</label>
				<input type="text" name="delivery" value="<?php echo isset($info['delivery']) ? $info['delivery'] : ''; ?>" style="width: 100%">
			</div>
		</div>
		
		
		<table class="activity" cellpadding="0" cellspacing="0" width="100%" style="border-bottom: 0px;">
			<tr>
				<td style="width: 40%;">Buyer Email:<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 70%;"></td>
				<td style="width: 47%;">
				<label>CASH PRICE OF VEHICLE</label> 
				<input type="checkbox" name="vehicle_status" style="margin-left: 5px;" <?php echo ($info['vehicle_status'] == "vehicle_status") ? "checked" : ""; ?> value="vehicle_status" class="cb-tax"/>
				</td>
				<td style="width: 13%;"><input type="text" name="cash_price" id="cash_price" class="total_price" value="<?php echo isset($info['cash_price']) ? $info['cash_price'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Buyer Email:<input type="text" name="buyer_email" value="<?php echo isset($info['buyer_email']) ? $info['buyer_email'] : ''; ?>" style="width: 70%;"></td>
				<td>FREIGHT</td>
				<td><input type="text" name="freight" id="freight" class="total_price" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email3" value="<?php echo isset($info['email3']) ? $info['email3'] : ''; ?>" style="width: 100%;"></td>
				<td>DEALER INSTALLED OPTIONS</td>
				<td><input type="text" name="dealer_option1" id="dealer_option1" class="total_price" value="<?php echo isset($info['dealer_option1']) ? $info['dealer_option1'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email4" value="<?php echo isset($info['email4']) ? $info['email4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option2" id="dealer_option2" class="total_price" value="<?php echo isset($info['dealer_option2']) ? $info['dealer_option2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email5" value="<?php echo isset($info['email5']) ? $info['email5'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price5" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option3" id="dealer_option3" class="total_price" value="<?php echo isset($info['dealer_option3']) ? $info['dealer_option3'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email6" value="<?php echo isset($info['email6']) ? $info['email6'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option4" id="dealer_option4" class="total_price" value="<?php echo isset($info['dealer_option4']) ? $info['dealer_option4'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email7" value="<?php echo isset($info['email7']) ? $info['email7'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price7" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option5" id="dealer_option5" class="total_price" value="<?php echo isset($info['dealer_option5']) ? $info['dealer_option5'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email8" value="<?php echo isset($info['email8']) ? $info['email8'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option6" id="dealer_option6" class="total_price" value="<?php echo isset($info['dealer_option6']) ? $info['dealer_option6'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email9" value="<?php echo isset($info['email9']) ? $info['email9'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price9" value="<?php echo isset($info['price9']) ? $info['price9'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option7" id="dealer_option7" class="total_price" value="<?php echo isset($info['dealer_option7']) ? $info['dealer_option7'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email10" value="<?php echo isset($info['email10']) ? $info['email10'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price10" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option8" id="dealer_option8" class="total_price" value="<?php echo isset($info['dealer_option8']) ? $info['dealer_option8'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email11" value="<?php echo isset($info['email11']) ? $info['email11'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price11" value="<?php echo isset($info['price11']) ? $info['price11'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option9" id="dealer_option9" class="total_price" value="<?php echo isset($info['dealer_option9']) ? $info['dealer_option9'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email12" value="<?php echo isset($info['email12']) ? $info['email12'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="price12" value="<?php echo isset($info['price12']) ? $info['price12'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="dealer_option10" id="dealer_option10" class="total_price" value="<?php echo isset($info['dealer_option10']) ? $info['dealer_option10'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="email13" value="<?php echo isset($info['email13']) ? $info['email13'] : ''; ?>" style="width: 100%;"></td>
				<td><label style="float: right;">TOTAL</label></td>
				<td><input type="text" id="total" name="total" class="total_price" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;"><input type="text" name="name" style="width: 100%;"></td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 75%;">REGISTRATION TAX</td>
						<td style="width: 25%;"><input type="text" name="regist_tax" id="regist_tax" class="total_price" value="<?php echo isset($info['regist_tax']) ? $info['regist_tax'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;">LESS TRADE IN <br> ALLOWANCE (-)</td>
						<td style="width: 29%;"><input type="text" name="trade_in" id="trade_in" class="total_price" value="<?php echo isset($info['trade_in']) ? $info['trade_in'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;"><input type="text" name="name" style="width: 100%;"></td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 60%;">PLATE FEE</td>
						<td style="width: 20%;"><input type="text" name="plante_fee" id="plante_fee" class="total_price" value="<?php echo isset($info['plante_fee']) ? $info['plante_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;">
							<label>TRADE DIFFERENCE</label>
							<input type="checkbox" name="trade_status" class="cb-tax" style="margin-left: 5px;" <?php echo ($info['trade_status'] == "trade_status") ? "checked" : ""; ?> value="trade_status"/> 
						</td>
						<td style="width: 29%;"><input type="text" name="trade_diff" id="trade_diff" class="total_price" value="<?php echo isset($info['trade_diff']) ? $info['trade_diff'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;"><b style="display: block; text-align: center;">TRADE IN INDIA</b></td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 60%;">PUBLIC SAFTY <br> VEHICLE FEE</td>
						<td style="width: 20%;"><input type="text" name="vehicle_fee" id="vehicle_fee" class="total_price" value="<?php echo isset($info['vehicle_fee']) ? $info['vehicle_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 50%;">&nbsp;</td>
						<td style="width: 29%;"><input type="text" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%; padding: 0px;">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 9%; border-bottom: 0px;">
							<label>YEAR</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 20%; border-bottom: 0px;">
							<label>MAKE</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 20%; border-bottom: 0px;">
							<label>MODEL</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 20%; border: 0px;">
							<label>BODY STYLE</label>
							<input type="text" name="body_style" value="<?php echo isset($info['body_style']) ? $info['body_style'] : ''; ?>" style="width: 100%;">
						</td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">TRANSFER TAX</td>
						<td style="width: 20%;"><input type="text" name="transfer_tax" id="transfer_tax" class="total_price" value="<?php echo isset($info['transfer_tax']) ? $info['transfer_tax'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">MOTOR VEHICLE <br> SALES TAX</td>
						<td style="width: 29%;"><input type="text" name="sales_tax" id="sales_tax" class="total_price" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;">
					<label>VIN #</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 100%;">
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">TITLE/TRANSFER FEE</td>
						<td style="width: 20%;"><input type="text" name="title_fee" id="title_fee" class="total_price" value="<?php echo isset($info['title_fee']) ? $info['title_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">&nbsp;</td>
						<td style="width: 29%;"><input type="text" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;">
					<label>LIEN HOLDER NAME</label>
					<input type="text" name="holder_name" value="<?php echo isset($info['holder_name']) ? $info['holder_name'] : ''; ?>" style="width: 100%;">
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">STATE/DEPUTY <br> FILING FEE</td>
						<td style="width: 20%;"><input type="text" name="filing_fee" id="filing_fee" class="total_price" value="<?php echo isset($info['filing_fee']) ? $info['filing_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">SERVICE CONTRACT</td>
						<td style="width: 29%;"><input type="text" name="service_contract" id="service_contract" class="total_price" value="<?php echo isset($info['service_contract']) ? $info['service_contract'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%;">
					<label>ADDRESS</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : ''; ?>" style="width: 100%;">
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">LIEN RECORDING FEE</td>
						<td style="width: 20%;"><input type="text" name="lien_fee" id="lien_fee" class="total_price" value="<?php echo isset($info['lien_fee']) ? $info['lien_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">MAINTENANCE <br>CONTRACT</td>
						<td style="width: 29%;"><input type="text" name="maintain" id="maintain" class="total_price" value="<?php echo isset($info['maintain']) ? $info['maintain'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%; padding: 0px;">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 33%; border-bottom: 0px;">
							<label>LICENSE PLATE #</label>
							<input type="text" name="license_plate" value="<?php echo isset($info['license_plate']) ? $info['license_plate'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 34%; border-bottom: 0px;">
							<label>LICENSE STATE</label>
							<input type="text" name="license_state" value="<?php echo isset($info['license_state']) ? $info['license_state'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 33%; border: 0px;">
							<label>EXP. DATE</label>
							<input type="text" name="exp_date" value="<?php echo isset($info['exp_date']) ? $info['exp_date'] : ''; ?>" style="width: 100%;">
						</td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">WHEELAGE TAX</td>
						<td style="width: 20%;"><input type="text" name="wheel_fee" id="wheel_fee" class="total_price" value="<?php echo isset($info['wheel_fee']) ? $info['wheel_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">OTHER STATE<br> & LOCAL SALES TAXES</td>
						<td style="width: 29%;"><input type="text" name="local_tax" class="total_price" id="local_tax" value="<?php echo isset($info['local_tax']) ? $info['local_tax'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%; padding: 0px;">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="width: 33%; border-bottom: 0px;">
							<label>MILEAGE NOW</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 100%;">
						</td>
						<td style="width: 33%; border: 0px;">
							<label>TRANSMISSION</label>
							<input type="text" name="trans_trade" value="<?php echo isset($info['trans_trade']) ? $info['trans_trade'] : ''; ?>" style="width: 100%;">
						</td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">TRANSIT TAX</td>
						<td style="width: 20%;"><input type="text" name="transit_tax" id="transit_tax" class="total_price" value="<?php echo isset($info['transit_tax']) ? $info['transit_tax'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">&nbsp;</td>
						<td style="width: 29%;"><input type="text" name="total9" value="<?php echo isset($info['total9']) ? $info['total9'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style="width: 40%; padding: 0px 3px;">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="border: 0px; padding: 0px;">
							<label>DOES YOUR TRADE-IN HAVE A BRANDED <br> TITLE OR INSURANCE SALVAGE HISTORY?</label>
							<label style="margin: 0 5px;">YES <input type="checkbox" name="brand_check" value="yes" <?php echo ($info['brand_check'] == "yes") ? "checked" : ""; ?> /></label>
							<label>NO <input type="checkbox" name="brand_check" value="no" <?php echo ($info['brand_check'] == "no") ? "checked" : ""; ?> /></label>
						</td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 60%;">&nbsp;</td>
						<td style="width: 20%;"><input type="text" name="tax_title1" value="<?php echo isset($info['tax_title1']) ? $info['tax_title1'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 40px;">
						<td style="width: 50%;">DOCUMENT <br> ADMIISTRATION FEE</td>
						<td style="width: 29%;"><input type="text" name="document_fee" id="document_fee" class="total_price" value="<?php echo isset($info['document_fee']) ? $info['document_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td style=" padding: 0px 3px; width: 40%; ">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 39px;">
						<td style="border: 0px; padding: 0px;">
							<label>IS THE POLLUTION CONTROL EQUIPMENT ON YOUR<br>TRADE-IN INTACT AND IN OPERATING CONDITION?</label>
							<label style="margin: 0 5px;">YES <input type="checkbox" name="equip_check" value="yes" <?php echo ($info['equip_check'] == "yes") ? "checked" : ""; ?> /></label>
							<label>NO <input type="checkbox" name="equip_check" value="no" <?php echo ($info['equip_check'] == "no") ? "checked" : ""; ?> /></label>
						</td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 25%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 45px;">
						<td style="width: 60%;">&nbsp;</td>
						<td style="width: 20%;"><input type="text" name="tax_title2" value="<?php echo isset($info['tax_title2']) ? $info['tax_title2'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
				<td style="padding: 0px; border: 0px; width: 35%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px; height: 45px;">
						<td style="width: 50%;">OPTIONAL ELECTRONIC <br> TRANSFER FEE</td>
						<td style="width: 29%;"><input type="text" name="transfer_fee" id="transfer_fee" class="total_price" value="<?php echo isset($info['transfer_fee']) ? $info['transfer_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		
		
		<table cellpadding="0" cellspacing="0" width="100%" style="border: 0px; border-left: 1px solid #000;">
			<tr>
				<td rowspan="5" style=" padding: 3px; width: 40%; font-size: 11px; ">
					<b style="display: block; text-align: center;">Dealer's Disclaimer of Warranty</b>
					<p style="margin: 0;">Unless the vehicle is sold with a separate written dealer warranty or the dealer enters into a service contract with the buyer, the vehicle is sold "AS IS". Dealer expressly disclaims all warranties, either express or implied, Including the implied warranties of merchantability and fitness for a particular purpose. The entire risk of the quality and performance of the vehicle is with the buyer.</p>
					<b style="display: block; text-align: center;">Important: A manufacturer warranty may apply.</b>
				</td>
				<td style="padding: 0px; width: 47%">
					<b style="text-align: right; display: block; font-size: 13px;">TOTAL LICENSE & FEES</b>
				</td>
				<td style="padding: 0px; border: 0px; width: 20%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;"><input type="text" name="license_fee" id="license_fee" class="total_price" value="<?php echo isset($info['license_fee']) ? $info['license_fee'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="padding: 0px; width: 40%">
					<b style="text-align: right; display: block;">SUBTOTAL</b>
				</td>
				<td style="padding: 0px; border: 0px; width: 20%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;"><input type="text" name="subtotal" id="subtotal" class="total_price" value="<?php echo isset($info['subtotal']) ? $info['subtotal'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="padding: 0px 3px; width: 40%">
					<b style="text-align: right; display: block;">LESS AMOUNT SUBMITTED WITH ORDER (-)</b>
				</td>
				<td style="padding: 0px; border: 0px; width: 20%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;"><input type="text" name="amount" id="amount" class="total_price" value="<?php echo isset($info['amount']) ? $info['amount'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="padding: 0px 3px; width: 40%">
					<b style="text-align: right; display: block;">PLUS BALANCE OWING TO LEINHOLDER ON TRADE IN (+)</b>
				</td>
				<td style="padding: 0px; border: 0px; width: 20%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;"><input type="text" name="leinholder" id="leinholder" class="total_price" value="<?php echo isset($info['leinholder']) ? $info['leinholder'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="padding: 0px 3px; width: 40%">
					<b style="font-size: 15px; text-align: right; display: block;">TOTAL AMOUNT DUE ON DELIVERY</b>
				</td>
				<td style="padding: 0px; border: 0px; width: 20%">
					<table cellpadding="0" cellspacing="0" width="100%" style="padding: 0px; border: 0px;">
						<td style="width: 50%;"><input type="text" name="total_balance" id="total_balance" class="total_price" value="<?php echo isset($info['total_balance']) ? $info['total_balance'] : ''; ?>" style="width: 100%;"></td>
					</table>
				</td>
			</tr>
		</table>
		
		<p style="float: left; width: 100%; margin: 3px 0 0; font-size: 12px; text-align: center;"><b>The front and back of this CONTRACT</b> comprise the entire CONTRACT affecting this purchase. THE DEALER will not recognize any verbal agreement, or any other  agreement or understanding of any nature. You certify that you are 18 years of age or older and acknowledge receiving a copy of this contract.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 49%;">
				<b style="display: block; font-size: 12px;">The terms of the CONTRACT were agreed upon and the CONTRACT signed in the dealership on the date noted at top of this form.</b>
				<p style="font-size: 12px; margin: 0;">NOTICE OF SALESPERSON'S LIMITED AUTHORITY. This Contract is not valid unless signed and accepted by Sales Manager or Officer of Dealership.</p>
			</div>
			<div class="right" style="float: right; width: 49%;">
				<p style="font-size: 15px; margin: 14px 0;"><b>IMPORTANT: THIS MAY BE A BINDING CONTRACT AND YOU MAY LOSE ANY DEPOSITS IF YOU DO NOT PERFORM ACCORDING TO ITS TERMS.</p>
			</div>
		</div>
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


	//calculate();

	$(".total_price").on('change keyup paste', function(){
		calculate_totalaccess();
	});



	$('.cb-tax').on('change', function() {
		calculate_totalaccess();
	});
		
	function calculate_totalaccess($this) {

		cash_price = isNaN(parseFloat( $('#cash_price').val()))?0.00:parseFloat($('#cash_price').val());
		tax_cash_price = 0;
		if ($('#cash_price').closest('tr').find('.cb-tax').is(':checked'))
			tax_cash_price = cash_price * 6.5 / 100;
		freight = isNaN(parseFloat( $('#freight').val()))?0.00:parseFloat($('#freight').val());
		dealer_option1 = isNaN(parseFloat( $('#dealer_option1').val()))?0.00:parseFloat($('#dealer_option1').val());
		dealer_option2 = isNaN(parseFloat( $('#dealer_option2').val()))?0.00:parseFloat($('#dealer_option2').val());
		dealer_option3 = isNaN(parseFloat( $('#dealer_option3').val()))?0.00:parseFloat($('#dealer_option3').val());
		dealer_option4 = isNaN(parseFloat( $('#dealer_option4').val()))?0.00:parseFloat($('#dealer_option4').val());
		dealer_option5 = isNaN(parseFloat( $('#dealer_option5').val()))?0.00:parseFloat($('#dealer_option5').val());
		dealer_option6 = isNaN(parseFloat( $('#dealer_option6').val()))?0.00:parseFloat($('#dealer_option6').val());
		dealer_option7 = isNaN(parseFloat( $('#dealer_option7').val()))?0.00:parseFloat($('#dealer_option7').val());
		dealer_option8 = isNaN(parseFloat( $('#dealer_option8').val()))?0.00:parseFloat($('#dealer_option8').val());
		dealer_option9 = isNaN(parseFloat( $('#dealer_option9').val()))?0.00:parseFloat($('#dealer_option9').val());
		dealer_option10 = isNaN(parseFloat( $('#dealer_option10').val()))?0.00:parseFloat($('#dealer_option10').val());

		var total = cash_price + freight + dealer_option1 + dealer_option2 + dealer_option3 +dealer_option4 + dealer_option5 + dealer_option6 + dealer_option7 + dealer_option8 + dealer_option9 + dealer_option10;
		$("#total").val(total.toFixed(2));

		regist_tax = isNaN(parseFloat( $('#regist_tax').val()))?0.00:parseFloat($('#regist_tax').val());
		plante_fee = isNaN(parseFloat( $('#plante_fee').val()))?0.00:parseFloat($('#plante_fee').val());
		vehicle_fee = isNaN(parseFloat( $('#vehicle_fee').val()))?0.00:parseFloat($('#vehicle_fee').val());
		transfer_tax = isNaN(parseFloat( $('#transfer_tax').val()))?0.00:parseFloat($('#transfer_tax').val());
		title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());
		filing_fee = isNaN(parseFloat( $('#filing_fee').val()))?0.00:parseFloat($('#filing_fee').val());

		lien_fee = isNaN(parseFloat( $('#lien_fee').val()))?0.00:parseFloat($('#lien_fee').val());
		wheel_fee = isNaN(parseFloat( $('#wheel_fee').val()))?0.00:parseFloat($('#wheel_fee').val());
		transit_tax = isNaN(parseFloat( $('#transit_tax').val()))?0.00:parseFloat($('#transit_tax').val());
		var total_fee = regist_tax + plante_fee + vehicle_fee + transfer_tax + title_fee + filing_fee + lien_fee + wheel_fee + transit_tax;
		$("#license_fee").val(total_fee.toFixed(2));

		trade_in = isNaN(parseFloat( $('#trade_in').val()))?0.00:parseFloat($('#trade_in').val());
		if (trade_in>0) {
			var trade_diff = total - trade_in;
		}
		$("#trade_diff").val(trade_diff.toFixed(2));

		tax_trade_diff = 0;

		if ($('#trade_diff').closest('tr').find('.cb-tax').is(':checked')) {
			tax_trade_diff = trade_diff * 6.5 / 100;	
		}
		
		service_contract = isNaN(parseFloat( $('#service_contract').val()))?0.00:parseFloat($('#service_contract').val());
		maintain = isNaN(parseFloat( $('#maintain').val()))?0.00:parseFloat($('#maintain').val());
		local_tax = isNaN(parseFloat( $('#local_tax').val()))?0.00:parseFloat($('#local_tax').val());
		document_fee = isNaN(parseFloat( $('#document_fee').val()))?0.00:parseFloat($('#document_fee').val());
		transfer_fee = isNaN(parseFloat( $('#transfer_fee').val()))?0.00:parseFloat($('#transfer_fee').val());
		license_fee = isNaN(parseFloat( $('#license_fee').val()))?0.00:parseFloat($('#license_fee').val());

		sales_tax = tax_cash_price + tax_trade_diff;
		$('#sales_tax').val(sales_tax.toFixed(2));

		var subtotal = total - trade_in + trade_diff + sales_tax + service_contract + maintain + local_tax + transfer_fee + document_fee + license_fee;
		$("#subtotal").val(subtotal.toFixed(2));

		amount = isNaN(parseFloat( $('#amount').val()))?0.00:parseFloat($('#amount').val());
		leinholder = isNaN(parseFloat( $('#leinholder').val()))?0.00:parseFloat($('#leinholder').val());

		var total_balance = subtotal - amount + leinholder;
		$("#total_balance").val(total_balance.toFixed(2));

		}
	
	
     
});

	
	
	
	
	
</script>
</div>
