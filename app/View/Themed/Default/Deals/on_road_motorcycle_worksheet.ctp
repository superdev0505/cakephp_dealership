<?php
//This Custom worksheet Mapped Author: Abha Sood Negi
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
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 960px; margin:0 auto;font-size: 12px;">
	<style>
		.container{width: 960px; margin: 0 auto; font-size: 12px;}
		/*input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}*/
		input[type="text"]{ border: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
		label{font-size: 13px; margin-bottom: 1px;}
		.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
		.top input{border: 0px;}
		th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000;}
		th{text-align: center;}
		table input[type="text"]{border-bottom: 0px;}
		td{padding: 1px 2px; }
		td input[type="text"]{text-align: center;}
		table{border-top: 1px solid #000; border-left: 1px solid #000;}
		.row{box-sizing: border-box;}
		.right input[type="text"]{border: 1px solid #000; border-bottom: 0px; float: right; color: royalblue; text-align: center; width: 48%;}
		.right select {border: 1px solid #000; border-bottom: 0px; float: right; color: royalblue; text-align: center; width: 48%; padding: 0px; height: 20px; border-radius: 0px;}
		.items-table th{ text-align: center; font-size: 13px;}
		.wraper.main input {padding: 0px;}
		.right label{font-weight: normal;}
		@media print { 
			.dontprint{display: none;}
			.blue {color:royalblue !important;}
			.red {color:red !important;}
		}
	</style>

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
		<!-- container start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="left" style="float: left; width: 20%; text-align: center;">
					<p style="font-weight: bold; font-size: 14px; margin: 15px 0 0 0; line-height: 19px;">Office: (479)968-2233 <br> Toll Free: (866) 466-3219 <br> Fax: (479) 968-5577</p>
				</div>
				<div class="center" style="text-align: center; float: left; width: 50%; margin-left: 4%;">
					<h2 style="margin: 3px 0 0; font-weight: bold;">Honda of Russellville</h2>
					<p style="margin: 0; font-size: 15px; margin: 7px 0;">220 Lake Front Drive <sup>*</sup> Russellville, AR 72802</p>
					<p style="margin: 0; font-size: 15px;">Email:<label><?php echo $email; ?></label></p>
				</div>
				<div class="rightside" style="width: 20%; float: right; text-align: center;">
					<h3 class="blue" style="color:royalblue; float: left; margin: 3px 0 5px; width: 100%; font-size: 20px; font-weight: bold;"><?php echo $info['sperson']; ?></h3>
					<table cellpadding="0" cellspacing="0" style="width: 100%;">
						<tr>
							<td style="width: 30%; text-align: center;"><strong>TIME</strong></td>
							<td>
								<input type="text" name="time" value="<?php echo date('h:i:a'); ?>" style="width: 100%;">
							</td>
						</tr>
						<tr>
							<td style="text-align: center;"><strong>Date</strong></td>
							<td><input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 100%;"></td>
						</tr>
					</table>
				</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; padding: 0 10px; box-sizing: border-box;">
				<label>Email</label>
				<input type="text" class="blue" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 90%; color:royalblue;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 37%; border-left: 1px solid #000; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Buyer</label>
				<input type="text" name="buyer_name" value="<?php echo isset($info['buyer_name']) ? $info['buyer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 83%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 31%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Home #</label>
				<input type="text" class="red" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 77%; color:red;">
			</div>
			<div class="form-field" style="float: right; width: 31%; border-right: 1px solid #000;">
				<label style="margin-left: 8px;">Work #</label>
				<input type="text" class="red" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 80%; color:red;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 32%; border-right: 1px solid #000; border-left: 1px solid #000;">
				<label style="margin-left: 10px;">Address</label>
				<input type="text" class="red" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 76%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 21%; border-right: 1px solid #000; position: relative;">
				<label style="margin-left: 10px;">City</label>
				<input type="text" name="city" class="red" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 80%; color:red;">
				<label style="border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; bottom: -28px; left: -1px; padding: 4px 4%; position: absolute; width: 101%;">City limits 
				<input type="text" class="red" name="city_limits" value="<?php echo isset($info['city_limits']) ? $info['city_limits'] : ''; ?>" style="width: 60%; padding: 0;"></label>
			</div>
			<div class="form-field" style="float: left; width: 19%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">State</label>
				<input type="text" name="state" class="red" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 68%; color:red;">
			</div>
			<div class="form-field" style="float: right; width: 27%; border-right: 1px solid #000; position: relative;">
				<label style="margin-left: 10px;">ZIP CODE</label>
				<input type="text" name="zip" class="red" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 69%; color:red;">
				<label style="border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; bottom: -27px; left: -10px; padding: 3px 7%; position: absolute; width: 104.4%;">County 
				<input type="text" name="country" class="red" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 69%; padding: 0; color:red;"></label>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; font-weight: bold; font-size: 17px; margin: 28px 0 0;">MAJOR UNIT</h2>
		<div class="row" style="float: left; width: 100%; margin: 30px 0 0; border-top: 1px solid #000; border-bottom: 2px;">
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000; border-left: 1px solid #000;">
				<label style="margin-left: 10px;">Year</label>
				<input type="text" class="red" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 69%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000; position: relative;">
				<label style="margin-left: 10px;">Make</label>
				<input type="text" class="red" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 64%; color:red;">
				<label style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; top: -24px; left: -1px; padding: 3px 4%; position: absolute; width: 102%;">N/U</label>
				<input type="text" class="red" name="condition" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>" style="width: 75%; color:red; margin-top:-22px; position:absolute; left:33px;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Model</label>
				<input type="text" class="red" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 72%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 18%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Color</label>
				<input type="text" class="red" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : ''; ?>" style="width: 66%; color:red;">
			</div>
			<div class="form-field" style="float: right; width: 25%; border-right: 1px solid #000;">
				<label style="margin-left: 7px;">Unit Price</label>
				<input type="text" name="unit_value" id="unit_value" class="subtotal_cal blue" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 66%; color:royalblue;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px; border-top: 1px solid #000; border-bottom: 1px solid #000; ">
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000; border-left: 1px solid #000;">
				<label style="margin-left: 10px;">Stock</label>
				<input type="text" class="red" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 60%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Key</label>
				<input type="text" class="red" name="key" value="<?php echo isset($info['key']) ? $info['key'] : ''; ?>" style="width: 69%; color:red;">
			</div>
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">Miles</label>
				<input type="text" class="red" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 60%; color:red;">
			</div>
			<div class="form-field" style="float: right; width: 54%; border-right: 1px solid #000;">
				<label style="margin-left: 10px;">VIN</label>
				<input type="text" class="red" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 90%; color:red;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; font-weight: bold; font-size: 17px; margin: 14px 0 3px;  color: #000;">ACCESSORIES</h2>
		<table class="items-table" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th style="width: 10%;">Quantity</th>	
				<th style="width: 7%;">CO / Inst</th>	
				<th style="width: 25%;">Part Number</th>	
				<th style="width: 28%;">Description</th>	
				<th style="width: 10%;">Unit Price</th>	
				<th style="width: 20%;">Total</th>	
			</tr>
			<?php $row_number = (in_array(AuthComponent::user('dealer_id'), $dealer_id_array)) ? 15 : 15; ?>
			<?php for($i=1; $i<= 19; $i++){ ?>
				<tr>
					<td>
						<input type="text" class="quantity_cal" name="quantity<?php echo $i; ?>" value="<?php echo isset($info['quantity'.$i]) ? $info['quantity'.$i] : ''; ?>" data-row-id="<?php echo $i; ?>" style="width: 100%; color:red;">
					</td>
					<td>
						<input type="text" name="co_inst<?php echo $i; ?>" value="<?php echo isset($info['co_inst'.$i]) ? $info['co_inst'.$i] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number<?php echo $i; ?>" value="<?php echo isset($info['part_number'.$i]) ? $info['part_number'.$i] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" class="red" name="description<?php echo $i; ?>" value="<?php echo isset($info['description'.$i]) ? $info['description'.$i] : ''; ?>" style="width: 100%; color:red;">
					</td>
					<td>
						<input type="text" class="unit_price_cal blue" name="unit_price<?php echo $i; ?>" value="<?php echo isset($info['unit_price'.$i]) ? $info['unit_price'.$i] : ''; ?>" data-row-id="<?php echo $i; ?>" style="width: 100%; color:royalblue;">
					</td>
					<td>
						<input type="text" class="total_access_cal blue" name="total<?php echo $i; ?>" value="<?php echo isset($info['total'.$i]) ? $info['total'.$i] : ''; ?>" data-row-id="<?php echo $i; ?>" style="width: 100%; color:royalblue;">
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td colspan="5" style="text-align: right; padding: 0 10px; font-weight: bold;">Total Accessories</td>
				<td>
					<input type="text" id="cal_total_acces" class="subtotal_cal" name="total_acces" value="<?php echo isset($info['total_acces']) ? $info['total_acces'] : ''; ?>" style="width: 100%; color:royalblue;">
				</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h2 style="float: left; width: 100%; font-size: 17px; font-weight: bold; color: #000;">TRADE INFORMATION Do You Have a Title? 
			<input type="text" name="trade_info" value="<?php echo isset($info['trade_info']) ? $info['trade_info'] : ''; ?>" style="border: 1px solid #000; width: 10%; font-weight: normal; padding: 5px 4px;"></h2>
		</div>
		
		<div class="left-right" style="float: left; width: 100% margin: 7px 0;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 50%;">
				<div class="row" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000;">
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Year</label>
						<input type="text" class="red" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 65%; color:red;">
					</div>
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Make</label>
						<input type="text" class="red" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 65%; color:red;">
					</div>
					<div class="form-field" style="width: 33%; float: left;">
						<label style="margin-left: 10px">Model</label>
						<input type="text" class="red" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 65%; color:red;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; border-top: 1px solid #000; margin: 0; border-right: 1px solid #000; border-left: 1px solid #000;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="margin-left: 10px">VIN</label>
						<input type="text" class="red" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 90%; color:red;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; border: 1px solid #000; margin: 0">
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Mileage</label>
						<input type="text" class="red" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 55%; color:red;">
					</div>
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Stock #</label>
						<input type="text" class="red" name="stock_num_trade" value="<?php echo isset($info['stock_num_trade']) ? $info['stock_num_trade'] : ''; ?>" style="width: 55%; color:red;">
					</div>
					<div class="form-field" style="width: 33%; float: left;">
						<label style="margin-left: 10px">Color</label>
						<input type="text" class="red" name="color_trade" value="<?php echo isset($info['color_trade']) ? $info['color_trade'] : ''; ?>" style="width: 68%; color:red;">
					</div>
				</div>
				
				<h3 style="float: left; width: 100%; font-size: 17px; font-weight: bold; margin: 12px 0 3px;">Method of Payment</h3>
				<div class="row" style="float: left; width: 100%; margin: 0">
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Check</label>
						<input type="text" name="payment_check" value="<?php echo isset($info['payment_check']) ? $info['payment_check'] : ''; ?>" style="width: 55%; border: 1px solid #000;">
					</div>
					<div class="form-field" style="width: 32%; float: left;">
						<label style="margin-left: 10px">Cash </label>
						<input type="text" name="payment_cash" value="<?php echo isset($info['payment_cash']) ? $info['payment_cash'] : ''; ?>" style="width: 55%; border: 1px solid #000;">
					</div>
					<div class="form-field" style="width: 33%; float: left;">
						<label style="margin-left: 10px">AHFC</label>
						<input type="text" name="payment_ahfc" value="<?php echo isset($info['payment_ahfc']) ? $info['payment_ahfc'] : ''; ?>" style="width: 60%; border: 1px solid #000; color:red;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 20px 0 100px; color: royalblue;">
					<p class="blue" style="margin: 0;">____Have you been introduced to the service department?</p>
					<p class="blue" style="margin: 0;">____Have you been informed about the HRCA?</p>
					<p class="blue" style="margin: 0;">____Did you know that we are a level 5 Honda Dealer</p>
					<p class="blue" style="margin: 0;">____Were you offered a test ride?</p>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 0 10px;">
					<div class="form-field" style="width: 60%; margin: 0; float: left;">
						<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>Customer Signature</label>
					</div>
					<div class="form-field" style="width: 30%; margin: 0; float: right;">
						<input type="text" name="date_sign" value="<?php echo isset($info['date_sign']) ? $info['date_sign'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>date</label>
					</div>
				</div>
				
			</div>
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 36%;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Freight</label>
						<input type="text" name="freight" id="freight_fee"  class="subtotal_cal blue" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Dealer Serv & Hndlng</label>
						<input type="text" name="hndlng" class="subtotal_cal blue" id="service_fee" value="85.00">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Extended Service Plan</label>
						<input type="text" name="service_plan" class="subtotal_cal blue" value="<?php echo isset($info['service_plan']) ? $info['service_plan'] : ''; ?>">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Subtotal</label>
						<input type="text" id="cal_subtotal" class="total_cal blue" name="subtotal" value="<?php echo isset($info['subtotal']) ? $info['subtotal'] : ''; ?>">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Title Fee</label>
						<input type="text" name="title_fee" class="total_cal blue" id="title_fee" value="<?php echo isset($info['title_fee']) ? $info['title_fee'] : ''; ?>">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Trade Payoff</label>
						<input type="text" name="trade_payoff" class="total_cal blue" value="<?php echo isset($info['trade_payoff']) ? $info['trade_payoff'] : ''; ?>" style="border-bottom: 1px solid #000;">
					</div>
					
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right; font-weight: bold; text-decoration: underline;">Credits</label>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Trade Allowance</label>
						<input type="text" name="trade_value" class="credits_total_cal red" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="color: red;">
					</div>

					

					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Cash Down</label>
						<input type="text" name="cash_down" class="credits_total_cal red" value="<?php echo isset($info['cash_down']) ? $info['cash_down'] : ''; ?>" style="color:red;">
					</div>
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Rebates</label>
						<input type="text" name="rebates" class="credits_total_cal red" value="<?php echo isset($info['rebates']) ? $info['rebates'] : ''; ?>" style="border-bottom: 1px solid #000; color:red;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right;">Total Credits</label>
						<input type="text" class="red" id="cal_total_credits" name="total_credits" value="<?php echo isset($info['total_credits']) ? $info['total_credits'] : ''; ?>" style="border-bottom: 1px solid #000; color:red;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label style="float: left; width: 50%; text-align: right; font-weight: bold;">Total</label>
						<input type="text" class="blue" id="cal_total" name="total_final" value="<?php echo isset($info['total_final']) ? $info['total_final'] : ''; ?>" style="border-bottom: 1px solid #000;">
					</div>
				</div>
			</div>
			<!-- rightside start -->
		</div>
		<!-- container end -->
	</div>
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
			$(".date_input_field").bdatepicker();

			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);
			
			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });

			$('.total_access_cal').each(function(index){
				var $this = this; 
				calculate_row_total($this);
			});

			calculate_totalaccess();
			calculate_subtotal();
			calculate_totalcredits();
			calculate_total();

			function calculate_row_total($this){
				let row_id = $($this).attr('data-row-id');
				let quantity = isNaN(parseFloat($('input[name="quantity' + row_id + '"]').val())) ? 0.00:parseFloat($('input[name="quantity' + row_id + '"]').val()); 
				let unit_price = isNaN(parseFloat($('input[name="unit_price' + row_id + '"]').val())) ? 0.00 : parseFloat($('input[name="unit_price' + row_id + '"]').val());

				$('input[name="total' + row_id + '"]').val((quantity * unit_price).toFixed(2));
				$(".total_access_cal").trigger('change');
			}

			$(".quantity_cal, .unit_price_cal").on('change keyup paste',function(){
				var $this = this; 
				calculate_row_total($this);
			});

			function calculate_totalaccess() {
				var cal_total_acces = 0.00;
				$( ".total_access_cal" ).each(function( index ) {
					cal_total_acces += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
				});
				$("#cal_total_acces").val(cal_total_acces.toFixed(2));
				$(".subtotal_cal").trigger('change');
			}

			$(".total_access_cal").on('change keyup paste',function(){
				calculate_totalaccess();
			});

			function calculate_subtotal() {
				var cal_subtotal = 0.00;
				$( ".subtotal_cal" ).each(function( index ) {
					cal_subtotal += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
				});
				if ($("#cal_total_acces").val() > 0.0 || $("#unit_value").val() > 0.0 ) {
					$("#cal_subtotal").val(cal_subtotal.toFixed(2));
				}
				else {
					$("#cal_subtotal").val('');
				}

				$(".total_cal").trigger('change');
			}

			$(".subtotal_cal").on('change keyup paste',function(){
				calculate_subtotal();
			});

			var cal_total_result = 0;
			function calculate_totalcredits() {
				var cal_total_credits = 0.00;
				$( ".credits_total_cal" ).each(function( index ) {
					cal_total_credits += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
				});
				$("#real_credit").val(cal_total_credits.toFixed(2));
				$("#cal_total_credits").val("("+cal_total_credits.toFixed(2)+")");
				cal_total_result = cal_total_credits;
			}

			$(".credits_total_cal").on('change keyup paste',function(){
				calculate_totalcredits();
				calculate_total();
			});

			function calculate_total() {
				var cal_total = 0.00;
				$( ".total_cal" ).each(function( index ) {
					cal_total += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
				});
				
				var total = cal_total- cal_total_result;
				$("#cal_total").val(total.toFixed(2));
			}

			$(".total_cal").on('change keyup paste',function(){
				calculate_totalcredits();
				calculate_total();
			});

			

		});
	</script>
</div>
