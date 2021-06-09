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
	input[type="text"]{height: auto; box-sizing: border-box; border-radius: 2px;}
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	table label{font-size: 12px;}
	table{font-size: 12px;}
	td, th{padding: 1px;}
	
	
	table td input[type="text"]{margin: 0 0 2px;}
	.no-border input[type="text"]{border-bottom: 0px;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page {margin-top: 25px !important;}
.second-page p {font-size: 14px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="center" style="float: left; width: 30%; text-align: center;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/watercraft-sales-logo.png'); ?>" style="width: 100%;">
			</div>

			<div class="logo_title" style="float: right; width: 65%; border-bottom: 2px solid #e32527;">
				<div class="left" style="float: left; width: 45%; text-align: center; margin-top: 12px; margin-right: 90px; font-size: 11px;">
				<p style="font-size: 14px; font-weight: 600;">7453 Highway X Box 880<br>Three Lakes, Wisconsin 54562</p>
				</div>
				
				<div class="right" style="text-align: center; width: 100%; margin-bottom: 3px;font-size: 11px;">
					<p style="font-size: 14px;"><b style="font-size: 19px;">www.watercraftsales.com</b><br>Phone:(715) 546-3351<br>Fax:(715) 546-8101</p>
				</div>
			</div>

			<div class="delivery" style="float: right; width: 65%;">
				<div class="form-field" style="float: left; width: 73%; margin: 10px 0px 2px;">
					<label><b>Date:</b></label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%">
				</div>
				<div class="form-field" style="float: right; width: 24%; margin-top: 6px; text-align: center;">
					<label><b>Invoice:</b></label>
					<input type="text" name="invoice_num" value="<?php echo isset($info['invoice_num']) ? $info['invoice_num'] : ''; ?>" style="width: 71%;text-align: center; color: red;">
				</div>
				<div class="form-field" style="float: left; width: 64%; margin: 0;">
					<label><b>Pickup/Delivery Date:</b></label>
					<input type="text" name="pick_date1" value="<?php echo isset($info['pick_date1']) ? $info['pick_date1'] : ''; ?>" style="width: 68%; margin-bottom: 20px;">
				</div>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0;">
				<label style="float: left; font-size: 20px; margin-right: 9px; color: #e32527"><b>INFO</b></label>
				<div style="width: 94%; float: left; margin-top: 13px; border: 1px solid #e32527;"></div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 54%; margin: 0;">
				<label><b>Sold To:</b></label>
				<input type="text" name="sold" value="<?php echo isset($info['sold']) ? $info['sold'] : ''; ?>" style="width: 88%">
			</div>
			
			<div class="form-field" style="float: left; width: 46%; margin: 0;">
				<label><b>Title:</b></label>
				<input type="text" name="sold1" value="<?php echo isset($info['sold1']) ? $info['sold1'] : ''; ?>" style="width: 92.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 54%; margin: 0;">
				<label><b>Name:</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 90%">
			</div>
			
			<div class="form-field" style="float: left; width: 46%; margin: 0;">
				<label><b>Country of Residence:</b></label>
				<input type="text" name="residence" value="<?php echo isset($info['residence']) ? $info['residence'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label><b>Billing Address:</b></label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 89.8%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 54%; margin: 0;">
				<label><b>County being registered In:</b></label>
				<input type="text" name="register" value="<?php echo isset($info['register']) ? $info['register'] : ''; ?>" style="width: 66.8%;">
			</div>
			
			<div class="form-field" style="float: left; width: 46%; margin: 0;">
				<label><b>Lake:</b></label>
				<input type="text" name="lake" value="<?php echo isset($info['lake']) ? $info['lake'] : ''; ?>" style="width: 91.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label><b>Local Address:</b></label>
				<input type="text" name="local_address" value="<?php echo isset($info['local_address']) ? $info['local_address'] : ''; ?>" style="width: 90.3%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 2px;">
			<div class="form-field" style="float: left; width: 54%; margin: 0;">
				<label><b>Phone:</b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 89%">
			</div>
			
			<div class="form-field" style="float: left; width: 46%; margin: 0;">
				<label><b>Cell:</b></label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 92.8%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0px 15px;">
			<div class="form-field" style="float: left; width: 54%; margin: 0;">
				<label><b>Local Phone:</b></label>
				<input type="text" name="local_phone" value="<?php echo isset($info['local_phone']) ? $info['local_phone'] : ''; ?>" style="width: 82.3%">
			</div>
			
			<div class="form-field" style="float: left; width: 46%; margin: 0;">
				<label><b>Email:</b></label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 90.5%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0;">
				<label style="float: left; font-size: 20px; margin-right: 9px; color: #e32527"><b>BOAT</b></label>
				<div style="width: 93%; float: left; margin-top: 13px; border: 1px solid #e32527;"></div>
			</div>
		</div>

		<div class="row" style="float: right; width: 10.3%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0;">
				<label style="float: left;"><b>Amount</b></label>
			</div>
		</div>
		
		<table class="activity" cellpadding="0" cellspacing="0" width="100%" style="border-bottom: 0px; border-left: 0px; margin-bottom: 12px;">
			<tr>
				<td style="width: 84%;">
					<label><b>Boat:</b></label> 
					<input type="text" name="boat" value="<?php echo isset($info['boat']) ? $info['boat'] : $info['year']." ".$info['make']; ?>"  style="width: 95%">
				</td>
				
				<td style="font-size: 16px;">$<input type="text" name="unit_value" id="amount0" class="total_price" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 94%;"></td>
			</tr>
			
			<tr>
				<td>
					<div class="form-filed" style="float: left; width: 60%;">
						<label><b>Model:</b></label>
						<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>"  style="width: 88%">
					</div>
					<div class="form-filed" style="float: left; width: 40%;">
						<label><b>Color:</b></label>
						<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>"  style="width: 86%">
					</div>
				</td>
				
				<td style="font-size: 16px;">$<input type="text" name="amount1" id="amount1" class="total_price" value="<?php echo isset($info['amount1']) ? $info['amount1'] : ''; ?>" style="width: 94%;"></td>
			</tr>
			
			<tr>
				<td>
					<label><b>Serial Number:</b></label> 
					<input type="text" name="serial_num" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>"  style="width: 88%">
				</td>
				
				<td style="font-size: 16px;">$<input type="text" name="amount2" id="amount2" class="total_price" value="<?php echo isset($info['amount2']) ? $info['amount2'] : ''; ?>" style="width: 94%;"></td>
			</tr>
			
			<tr>
				<td>
					<label><b>Motor:</b></label> 
					<input type="text" name="motor" value="<?php echo isset($info['motor'])?$info['motor']:''; ?>"  style="width: 94%">
				</td>
				
				<td style="font-size: 16px;">$<input type="text" name="amount3" id="amount3" class="total_price" value="<?php echo isset($info['amount3']) ? $info['amount3'] : ''; ?>" style="width: 94%;"></td>
			</tr>

			<tr>
				<td>
					<label><b>Model:</b></label> 
					<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>"  style="width: 93.8%">
				</td>
			</tr>

			<tr>
				<td>
					<label><b>Serial Number:</b></label> 
					<input type="text" name="serial_num1" value="<?php echo isset($info['serial_num1'])?$info['serial_num1']:''; ?>"  style="width: 88%;">
				</td>
			</tr>
			
			<tr>
				<td>
					<label><b>Trailer:</b></label> 
					<input type="text" name="trailer" value="<?php echo isset($info['trailer'])?$info['trailer']:''; ?>"  style="width: 93.7%;">
				</td>

				<td style="font-size: 16px;">$<input type="text" name="amount4" id="amount4" class="total_price" value="<?php echo isset($info['amount4']) ? $info['amount4'] : ''; ?>" style="width: 94%;"></td>
			</tr>

			<tr>
				<td>
					<label><b>Model:</b></label> 
					<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>"  style="width: 93.8%;">
				</td>
			</tr>

			<tr>
				<td>
					<label><b>Serial Number:</b></label> 
					<input type="text" name="serial_num2" value="<?php echo isset($info['serial_num2'])?$info['serial_num2']:''; ?>" style="width: 88%;">
				</td>
			</tr>
		</table>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0;">
				<label style="float: left; font-size: 20px; margin-right: 9px; color: #e32527"><b>OPTIONS</b></label>
				<div style="width: 89.5%; float: left; margin-top: 13px; border: 1px solid #e32527;"></div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 65%; margin: 0;">
				<label style="width: 15%;"><b>Options & Other Equipment:</b></label>
				<textarea name="option1" style="width: 82%; height: 100px; border-radius: 2px;"><?php echo isset($info['option1'])?$info['option1']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: right; width: 16%; margin: 0;">
				$<input type="text" id="equipment" name="equipment" class="total_price" value="<?php echo isset($info['equipment']) ? $info['equipment'] : ''; ?>" style="width: 94%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 5px;">
			<div class="form-field" style="float: left; width: 65%; margin: 0;">
				<label style="width: 10%;"><b>Order Out Options:</b></label>
				<textarea name="option2" style="width: 87%; height: 110px; border-radius: 2px;"><?php echo isset($info['option2'])?$info['option2']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: right; width: 16%; margin-bottom: 20px;">
				$<input type="text" id="order" name="order" class="total_price" value="<?php echo isset($info['order']) ? $info['order'] : ''; ?>" style="width: 94%;">
			</div>

			<div class="form-field" style="float: right; width: 22.9%; margin: 0;">
				<label style="float: left;margin-top: 3px;"><b>Sales Total:</b></label> 
				$<input type="text" name="sales_total" id="sales_total" class="total_price" value="<?php echo isset($info['sales_total'])?$info['sales_total']:''; ?>"  style="width: 65%;">
			</div>

			<div class="form-field" style="float: right; width: 35%; margin: 0;">
				<h2 style="font-family: -webkit-body; width: 100%; margin: 5px 0 0; font-size: 20px; text-align: center;margin-bottom: 5px; color: #ef2121"><i><b>"Trade-in value is subject to Watercraft Service Dept. check over"</b></i></h2>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0;">
				<label style="float: left; font-size: 20px; margin-right: 9px; color: #e32527"><b>TRADE - IN</b></label>
				<div style="width: 87.5%; float: left; margin-top: 13px; border: 1px solid #e32527;"></div>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 3px;">
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Boat:</b></label>
				<input type="text" name="boat_trade" value="<?php echo isset($info['boat_trade']) ? $info['boat_trade'] : $info['year_trade']." ".$info['make_trade']; ?>" style="width: 83%">
			</div>
			
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Model:</b></label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 80%;">
			</div>

			<div class="form-field" style="float: left; width: 28%; margin: 0;">
				<label><b>Serial Number:</b></label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 64%;">
			</div>

			<div class="form-field" style="float: left; width: 20%; margin: 0;">
				<label><b>Value:</b></label>
				$<input type="text" name="trade_value" id="value1" class="total_price" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width: 74%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 3px;">
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Motor:</b></label>
				<input type="text" name="boat1" value="<?php echo isset($info['boat1'])?$info['boat1']:''; ?>" style="width: 80.5%">
			</div>
			
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Model:</b></label>
				<input type="text" name="moel_trade1" value="<?php echo isset($info['moel_trade1'])?$info['moel_trade1']:''; ?>" style="width: 80%;">
			</div>

			<div class="form-field" style="float: left; width: 28%; margin: 0;">
				<label><b>Serial Number:</b></label>
				<input type="text" name="vin_trade1" value="<?php echo isset($info['vin_trade1'])?$info['vin_trade1']:''; ?>" style="width: 64%;">
			</div>

			<div class="form-field" style="float: left; width: 20%; margin: 0;">
				<label><b>Value:</b></label>
				$<input type="text" name="value2" id="value2" class="total_price" value="<?php echo isset($info['value2'])?$info['value2']:''; ?>" style="width: 74%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 3px;">
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Trailer:</b></label>
				<input type="text" name="boat1" value="<?php echo isset($info['boat1'])?$info['boat1']:''; ?>" style="width: 79.5%">
			</div>
			
			<div class="form-field" style="float: left; width: 26%; margin: 0;">
				<label><b>Model:</b></label>
				<input type="text" name="moel_trade1" value="<?php echo isset($info['moel_trade1'])?$info['moel_trade1']:''; ?>" style="width: 80%;">
			</div>

			<div class="form-field" style="float: left; width: 28%; margin: 0;">
				<label><b>Serial Number:</b></label>
				<input type="text" name="vin_trade1" value="<?php echo isset($info['vin_trade1'])?$info['vin_trade1']:''; ?>" style="width: 64%;">
			</div>

			<div class="form-field" style="float: left; width: 20%; margin: 0;">
				<label><b>Value:</b></label>
				$<input type="text" name="value3" id="value3" class="total_price" value="<?php echo isset($info['value3'])?$info['value3']:''; ?>" style="width: 74%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 3px;">
			<div class="form-field" style="float: left; width: 74.8%; margin: 0;">
				<label><b>Options:</b></label>
				<input type="text" name="option" value="<?php echo isset($info['option'])?$info['option']:''; ?>" style="width: 61.1%">
			</div>
			
			<div class="form-field" style="float: left; width: 25.2%; margin: 0;">
				<label><b>Trade in Value:</b></label>
				$<input type="text" name="total_trade_value" id="trade_value" class="total_price" value="<?php echo isset($info['total_trade_value']) ? $info['total_trade_value'] : ''; ?>" style="width: 59%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 54%;">
				<label><b>Special Instructions:</b></label>
			</div>

			<div class="form-field" style="float: left; width: 51.2%; margin-bottom: 5px;">
				<textarea name="bank" style="width: 100%; height: 147px;  border-radius: 2px;"><?php echo isset($info['bank'])?$info['bank']:'';  ?></textarea>
			</div>
			
			<div class="form-field" style="float: right; width: 33.33%; margin: -21px 0px 3px;">
				<label style="width: 51%;text-align: right;"><b>Subtotal:</b></label>
				$<input type="text" name="sub_total" id="sub_total" class="total_price" value="<?php echo isset($info['sub_total']) ? $info['sub_total'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Tax:</b></label>
				%<input type="text" name="tax_pro" id="tax_pro" class="total_price" value="<?php echo isset($info['tax_pro']) ? $info['tax_pro'] : ''; ?>" style="width: 18%;">
				$<input type="text" name="tax" id="tax" class="total_price" value="<?php echo isset($info['tax']) ? $info['tax'] : ''; ?>" style="width: 21%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Rebate:</b></label>
				$<input type="text" name="rebate" id="rebate" class="total_price" value="<?php echo isset($info['rebate']) ? $info['rebate'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 39%; margin: 0 0 2px;">
				<label style="width: 58%;text-align: right;"><b>Administration/title/Registration:</b></label>
				$<input type="text" name="admin" id="admin" class="total_price" value="<?php echo isset($info['admin']) ? $info['admin'] : ''; ?>" style="width: 38%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Gas/Oil:</b></label>
				$<input type="text" name="gas" id="gas" class="total_price" value="<?php echo isset($info['gas']) ? $info['gas'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Total:</b></label>
				$<input type="text" name="total" id="total" class="total_price" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Deposit:</b></label>
				$<input type="text" name="deposit" id="deposit" class="total_price" value="<?php echo isset($info['deposit']) ? $info['deposit'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 33.33%; margin: 0 0 2px;">
				<label style="width: 51%;text-align: right;"><b>Balance Due:</b></label>
				$<input type="text" name="balance" id="balance" class="total_price" value="<?php echo isset($info['balance']) ? $info['balance'] : ''; ?>" style="width: 44%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 60%; margin: 0;">
				<label><b>Customer Signature:</b></label>
				<input type="text" name="custom_sign" value="<?php echo isset($info['custom_sign'])?$info['custom_sign']:''; ?>" style="width: 63%; border: 0px; border-bottom: 1px solid #e2e1e1;">
			</div>
		</div>

		<div class="row second-page" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; text-align: center;     margin: 45px 0 15px; font-size: 18px;"><b>TERMS AND CONDITIONS</b></h2>
			<p style="margin: 0px;">1. <span style="text-decoration: underline;"><b>PURCHASER’S WARRANTY</b></span> Purchaser shall deliver to Seller satisfactory evidence of title to any boat, motor, trailer, PWC, ATV, CYC and/or accessories traded in as part of the consideration for any boat motor, trailer, PWC, ATV, CYC and/or accessories sold to Purchaser hereunder, and risk of loss to any such trade-in shall be borne by Purchaser hereunder, until such evidence of title Is delivered to Seller. Purchaser warrants any such trade in to be free and clear of all encumbrances, security interests and liens (including without limitation liens which may arise under maritime or common law) except as otherwise expressly stated on the front hereof.</p>
			<p style="margin: 0px;">2. <span style="text-decoration: underline;"><b>EXECUTION OF DOCUMENTS</b></span> Any ﬁnancing y a third party arranged by Seller on behalf of Purchaser to finance any part of the adjusted sales price is subject to execution by Purchaser, before delivery to Purchaser of any boat, motor, trailer, PWC, ATV, CYC, and/or accessories sold to Purchase hereunder, of such standard forms of security agreement note and/or other ﬁnancing documents as such third party may require.</p>
			<p style="margin: 0px;">3. <span style="text-decoration: underline;"><b>DELIVERY</b></span> The delivery date speciﬁed on the front thereof is subject to any delays due to causes beyond Seller’s control to the extent provided below; in the event Seller is unable, due to causes beyond Seller’s control, to deliver any boat, motor, trailer, PWC, ATV, CYC and/or accessories sold to PurChaser hereunder on the delivery date at the lace specified on the front hereof. Seller shall be allowed a grace period of an additional 90 days be and the delivery date to tender de We of such boat, motor, trailer, PWC, ATV, CYC and/or accessories to Purchaser at the place speci ied on the front hereof, upon failure 0 which this agreement ma be terminated by either Purchaser or Seller by delivery to the other of written notice of termination with three days after expiration 0 such grace period. In the event of such termination by Purchaser, (a) any deposit paid by Purchaser in advance shall be refunded by Seller to Purchaser reduced by termination charge of 2% of the adjusted sales price shown on the front hereof, and (b) any trade-in previously delivered to Seller by Purchaser hereunder shall be returned to Purchaser unless already sold or under a contract of sale by Seller at the time of such termination, in which Seller shall remit to Purchaser promptly upon receipt the amount of the purchase price received by Seller through the sale of such trade-in, reduced by an amount e ual to 20% of such purchase price as a sales commission to Seller. Upon such refund return and/or remit-tance as described above, Seller 5 all stand release of liability hereunder. In the event Seller fails to tender delivery of such boat, motor, trailer, PWC, ATV, CYC and/or accessories to Purchaser within the grace period described above and this agreement is not terminated as described above, then this agreement shall remain in full force an effect except that Seller shall notify Pur aser when such boat, motor, trailer, PWC, ATV, CYC and/or accessories have been received, and Purchaser shall acce delivery of such boat, motor, trailer, ch ATV, CYC and/or accessories from Seller within ten days of receiving such notiﬁcation from Seller. Subject to the foregoing provisions of this para-aph, Seller shall not be liable for any sums o damages/consequential or otherwise, for failure to deliver or for delay In delivering such boat, motor, trailer, PWC, ATV, CYC and/or accessories.</p>
			<p style="margin: 0px;">4. <span style="text-decoration: underline;"><b>NEW PRODUCT WARRANTY</b></span> The only warranties applicable to any new boat, motor, trailer, PWC, ATV, CYC and/or accessories sold by Seller hereunder are those warranties provided by the manufacturer of sudt boat, motor, trailer, PWC, ATV, CYC and/or accessories. Seller shall furnish Purchaser with any certificate of warranty or other similar document which may be provided by the manufacturer of any boat, motor, trailer, PWC, ATV, CYC and/or accessories sold hereunder, and shall fulﬁll any obligations which it as a dealer may have under a par-ticular manufacturer’s warranty. OthenNise, Seller neither assumes, nor authorizes anyone to assume for It, any liability or obligation relating to possible defects in any boat, motor, trailer, PWC, ATV, CYC and/or accessories sold hereunder and shall not be liable for any damages, con-sequential or otherwise, with respect to the same. Any boat, motor, trailer, PWC, ATV, CYC and/or accessories sold hereunder is sold as is with-out any warranties by Seller, express or implied, including any implied warranty of merchantability or ﬁtness for a particular purpose.</p>
			<p style="margin: 0px;">5. <span style="text-decoration: underline;"><b>SELLER’S REMEDIES</b></span> Without in any way limiting any other remedies to which the Seller may be entitled under the Uni orm Commercial Code, or other aﬁplicable law, in the event that Purchaser fails to pay for or accept delivery of any boat, motor, trailer, PWC, ATV, CYC and/or accessories sold hereunder within the time required by this agreement. Seller shall be entitled to recover as damages (a) the amount of the trade difference price shown on the front hereof plus the amount of any incidental damages plus the amount of any expenses (including reasonable attorneys' fees) incurred by Seller in seeking to enforce this agreement, minus (b) either the amount of any net proceeds received by Seller if Seller is able and elects to resell any of such boat, motor, trailer, PWC, ATV, CYC and/or accessories to a third party, or the amount of an cred-It allowed to seller by the manufacturer of any such boat, motor, trailer, PWC, ATV, CYC and/or accessories in the event Seller is able an elects to retum and/or cancel its order with the manufacturer. Under the foregoing provision, Seller shall be entitled to resell any boat, motor, trailer, PWC, ATV, CYC, and/or accessories to any person for any price at either a pu IIC sale held at Seller's place of business and announced in a news-paper of general circulation in the Seller’s County and State at least ten days in advance thereof, or a private sale of which Seller has given Purchaser at least ten days notice. Any resale by Seller in accordance with the foregoing provision shall be deemed commercially reasonable, but Seller reserves the right to effect such resale in any other manner permitted by the Union's Commercial Code or other applicable law. Seller shall have the option of electing to retain the cash deposit of Purchaser as liquidated damages in lieu of the fore oing reme ies in the event of Purchaser’s default under this agreement; in the event that Seller has accepted Purchasers trade-in at the time o default, Seller is authorized to sell the item(s) so traded in and to reimburse itself out of the proceeds of sale for a selling commission of 20% of the purchase price and all other expenses of sale, including reasonable attorneys’ fees. Purchaser does hereby appoint Seller as attorney-In-fact with full authority to sell, trans-fer and assign all right, title and interest in the item(s) to a subsequent buyer. The closing date as stated on front hereof Is of essence in this agreement and must be honored by Purchaser. If not honored, the Purchaser is deemed to have failed to pay for and failed to accept delivery 0 any boat, motor, trailer, PWC, ATV, CYC, and/or accessories sold hereunder and the Sellers remedies begin immediately.</p>
			<p style="margin: 0px;">6. <span style="text-decoration: underline;"><b>TRADE-IN ALLOWANCE ADJUSTMENT</b></span> AII boats, motors, trailers, PWCs, ATVs, CYCs and/or accessories being traded in b Purchaser are subject to appraisal by Seller before ﬁnal acceptance of such trade-ins, and any trade-In allowance provided for on the front thereof may be adjusted by Seller to take into account any defects, mechanical issues, or other conditions lessening the value of any boats, motors, trailers, PWCs, ATVs, CYCs and/or accessories taken in trade which are discovered In such total appraisal.</p>
			<p style="margin: 0px;">7. <span style="text-decoration: underline;"><b>PRICE ADJUSTMENT FOR COST INCREASES</b></span> The trade difference price shown on the front hereof shall be increased by the amount of, and Purchaser shall reimburse Seller for, any increases In manufacturers or supplies list prices over those in effect on the date thereof for any boat, motor, trailer, PWC, ATV, CYC and/or accessories shown on the front hereof which is purchased by Seller for delivery to Purchaser hereunder.</p>
			<p style="margin: 0px;">8. <span style="text-decoration: underline;"><b>INSURANCE AGREEMENT</b></span> Purchaser agrees to keep the item(s) including the boat, motor, trailer, PWC, ATV, or CYC being purchased hereunder insured against all risks of phys cal loss or damage for its/their tu I insurable value for the benefit of Purchaser, Seller and the manufacturer. Purchaser waives all rights against the Seller and manufacturer for damages to the items being purchased hereunder to the extent covered by Insurance. This paragraph constitutes an agreement by Purchaser to provide Seller and manufacturer with the bene its of insurance.</p>
			<p style="margin: 0px;">9. <span style="text-decoration: underline;"><b>BINDING</b></span> This agreement may not be transferred or assigned by Purchaser without the express, written consent of Seller. This agreement shall be binding upon and inure to the respective heirs, executors and assigns of both parties.</p>
			<p style="margin: 0px;">10. <span style="text-decoration: underline;"><b>ATTORNEYS' FEES</b></span> Purchaser agrees to pay all costs and reasonable attorneys‘ fees incurred by Seller in the enforcement of the terms of this agreement and in connection with any action to which Seller is made a party as a result of this agreement.</p>
			<p style="margin: 0px;">11. <span style="text-decoration: underline;"><b>ADDITIONAL DISCLOSURES</b></span> Law requires brakes on any trailer over 3,000 grosscrounds (including trailer and load); purchaser has been advised as to this requirement and acknowledges that any trailer ordered or sol hereunder must have brakes installed if the weight exceeds that set forth above. Some states may have additional requirements which you as a Purchaser are responsible for. Purchaser has personally ordered the trailer set forth herein with full knowledge of the weight and personally advised Seller as to whether brakes should be installed thereon.</p>
			<p style="margin: 0px;">12. <span style="text-decoration: underline;"><b>ENTIRE AGREEMENT</b></span> This agreement Includes all of the terms and conditions of the sale contemplated by this agreement and is the entire agreement and supersedes any prior oral or written agreement between the parties concerning the subject matter hereof. No other representation or warranties of any type have been made by Seller to Purchaser.</p>
		</div>
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print Worksheet</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>

		<select name="deal_status_id" id="deal_status_id" class="form-control pull-right" style="width: auto; display: inline-block; margin-left:5px;">
			<option value="">* Select Status</option>
			<option value="4">In Process</option>
			<option value="5">Accepted</option>
			<option value="6">Rejected</option>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Save Quote</button>
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

		amount0 = isNaN(parseFloat( $('#amount0').val()))?0.00:parseFloat($('#amount0').val());
		amount1 = isNaN(parseFloat( $('#amount1').val()))?0.00:parseFloat($('#amount1').val());
		amount2 = isNaN(parseFloat( $('#amount2').val()))?0.00:parseFloat($('#amount2').val());
		amount3 = isNaN(parseFloat( $('#amount3').val()))?0.00:parseFloat($('#amount3').val());
		amount4 = isNaN(parseFloat( $('#amount4').val()))?0.00:parseFloat($('#amount4').val());
		amount5 = isNaN(parseFloat( $('#amount5').val()))?0.00:parseFloat($('#amount5').val());
		amount6 = isNaN(parseFloat( $('#amount6').val()))?0.00:parseFloat($('#amount6').val());
		amount7 = isNaN(parseFloat( $('#amount7').val()))?0.00:parseFloat($('#amount7').val());
		amount8 = isNaN(parseFloat( $('#amount8').val()))?0.00:parseFloat($('#amount8').val());
		equipment = isNaN(parseFloat( $('#equipment').val()))?0.00:parseFloat($('#equipment').val());
		order = isNaN(parseFloat( $('#order').val()))?0.00:parseFloat($('#order').val());
		var sales_total = amount0 + amount1 + amount2 + amount3 + amount4 + amount5 + amount6 + amount7 + amount8 + equipment + order;

		$("#sales_total").val(sales_total.toFixed(2));
		value1 = isNaN(parseFloat($('#value1').val()))?0.00:parseFloat($('#value1').val());
		value2 = isNaN(parseFloat($('#value2').val()))?0.00:parseFloat($('#value2').val());
		value3 = isNaN(parseFloat($('#value3').val()))?0.00:parseFloat($('#value3').val());
		trade_value = value1 + value2 + value3;
		$("#trade_value").val(trade_value.toFixed(2));

		var sub_total = sales_total - trade_value;
		$("#sub_total").val(sub_total.toFixed(2));

		tax_pro = isNaN(parseFloat( $('#tax_pro').val()))?0.00:parseFloat($('#tax_pro').val());
		tax = (tax_pro*sub_total)/100;
		$("#tax").val(tax.toFixed(2));
		rebate = isNaN(parseFloat( $('#rebate').val()))?0.00:parseFloat($('#rebate').val());
		admin = isNaN(parseFloat( $('#admin').val()))?0.00:parseFloat($('#admin').val());
		gas = isNaN(parseFloat( $('#gas').val()))?0.00:parseFloat($('#gas').val());
		var total = sub_total + tax - rebate + admin + gas;
		$("#total").val(total.toFixed(2));
		deposit = isNaN(parseFloat( $('#deposit').val()))?0.00:parseFloat($('#deposit').val());
		if (deposit>0) {
			var balance = total - deposit;
			$("#balance").val(balance.toFixed(2));	
		}
		
	function calculate_totalaccess($this) {

		amount0 = isNaN(parseFloat( $('#amount0').val()))?0.00:parseFloat($('#amount0').val());
		amount1 = isNaN(parseFloat( $('#amount1').val()))?0.00:parseFloat($('#amount1').val());
		amount2 = isNaN(parseFloat( $('#amount2').val()))?0.00:parseFloat($('#amount2').val());
		amount3 = isNaN(parseFloat( $('#amount3').val()))?0.00:parseFloat($('#amount3').val());
		amount4 = isNaN(parseFloat( $('#amount4').val()))?0.00:parseFloat($('#amount4').val());
		amount5 = isNaN(parseFloat( $('#amount5').val()))?0.00:parseFloat($('#amount5').val());
		amount6 = isNaN(parseFloat( $('#amount6').val()))?0.00:parseFloat($('#amount6').val());
		amount7 = isNaN(parseFloat( $('#amount7').val()))?0.00:parseFloat($('#amount7').val());
		amount8 = isNaN(parseFloat( $('#amount8').val()))?0.00:parseFloat($('#amount8').val());
		equipment = isNaN(parseFloat( $('#equipment').val()))?0.00:parseFloat($('#equipment').val());
		order = isNaN(parseFloat( $('#order').val()))?0.00:parseFloat($('#order').val());
		var sales_total = amount0 + amount1 + amount2 + amount3 + amount4 + amount5 + amount6 + amount7 + amount8 + equipment + order;

		$("#sales_total").val(sales_total.toFixed(2));
		value1 = isNaN(parseFloat($('#value1').val()))?0.00:parseFloat($('#value1').val());
		value2 = isNaN(parseFloat($('#value2').val()))?0.00:parseFloat($('#value2').val());
		value3 = isNaN(parseFloat($('#value3').val()))?0.00:parseFloat($('#value3').val());
		trade_value = value1 + value2 + value3;
		$("#trade_value").val(trade_value.toFixed(2));

		var sub_total = sales_total - trade_value;
		$("#sub_total").val(sub_total.toFixed(2));

		tax_pro = isNaN(parseFloat( $('#tax_pro').val()))?0.00:parseFloat($('#tax_pro').val());
		tax = (tax_pro*sub_total)/100;
		$("#tax").val(tax.toFixed(2));
		rebate = isNaN(parseFloat( $('#rebate').val()))?0.00:parseFloat($('#rebate').val());
		admin = isNaN(parseFloat( $('#admin').val()))?0.00:parseFloat($('#admin').val());
		gas = isNaN(parseFloat( $('#gas').val()))?0.00:parseFloat($('#gas').val());
		var total = sub_total + tax - rebate + admin + gas;
		$("#total").val(total.toFixed(2));
		deposit = isNaN(parseFloat( $('#deposit').val()))?0.00:parseFloat($('#deposit').val());
		if (deposit>0) {
			var balance = total - deposit;
			$("#balance").val(balance.toFixed(2));	
		}
	}
});
</script>
</div>
