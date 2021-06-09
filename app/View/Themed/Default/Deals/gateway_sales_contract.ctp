<?php
//This Custom worksheet Mapped Author: Abha Sood Negi

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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

		.container{width: 960px; margin: 0 auto; font-size: 12px;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 12px; font-weight: normal; margin: 0;}
	textarea{width: 96%; border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 100px;}
	td input[type="text"]{width: 100%; border: 0px; text-align: center;}
	td{text-align: center; border-right: 1px solid #000; border-top: 1px solid #000;}
	.one-half-table input {padding: 6px;}
	.wraper.main input {padding: 1px;}
	@media print { 
	.dontprint{display: none;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container">
			<div class="row"style="float: left; width: 100%; margin: 0px 0;">
				<div class="logo" style="width: 200px; margin: 0 auto;">
					<img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/gatewayrv-dealer-logo.png'); ?>" alt="Gateway RV Dealer">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 30%">
					<h2 style="margin: 0px; font-weight: bold">SALES CONTRACT</h2>
				</div>
				
				<div class="form-field" style="float: left; width: 30%; margin-left: 5%;">
					<div class="upper" style="float: left; width: 100%;">
						<span style="float: left;">2020  Mall Street</span>
						<span style="float: right;">Collinsville,IL 62234</span>
					</div>
					<div class="lower" style="float: left; width: 100%;">
						<span style="float: left;">618.343.3800</span>
						<span style="float: right;">GatewayRvPs.com</span>
					</div>
				</div>
			
				<div class="form-field" style="float: right; width: 30%;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="margin: 0px 0 0; float: left; width: 100%">
				<div class="left" style="float: left; width: 74%; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-bottom: 0px;">
					<div class="form-field" style="float: left; width: 100%; margin: 1px 0;">
						<label>PURCHASER'S NAME</label>
						<input type="text" name="name"  value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 77%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 1px 0;">
						<label>PURCHASER'S ADDRESS</label>
						<input type="text" name="name" name="address"  value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 75%;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 1px 0;">
						<div class="form-field" style="float: left; width: 55%;">
							<label>CITY</label>
							<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: left; width: 22%;">
							<label>STATE</label>
							<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 60%;">
						</div>
						<div class="form-field" style="float: left; width: 23%;">
							<label>ZIP</label>
							<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 74%;">
						</div>
					</div>
				</div>
				
				<div class="right" style="float: right; width: 26%; border: 1px solid #000; border-left: 0px; border-bottom: 0px;">
					<div class="form-field" style="float: left; width: 100%; text-align: center;">
						<label style="display: block; padding-top: 3px;">RESIDENCE PHONE</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width:100%; border: 0px; margin-bottom: 2px; text-align: center; ">
					</div>
					<div class="form-field" style="float: left; width: 100%; text-align: center;">
						<label style="display: block; padding-top: 3px;">EMAIL</label>
						<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%; border: 0px; text-align: center; margin-bottom: 7px;">
					</div>
				</div>
			</div>
			
			
			
			<div class="row" style="float: left; width: 100%; margin: 0px;">
				<table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #000; border-top: 0px; border-right: 0px; border-bottom: 0px;">
					<tr>
						<td>
							<label>YEAR</label>
							<input type="text" name="year1" value="<?php echo (isset($info['year1']) && !empty($info['year1'])) ? $info['year1'] : $info['year']; ?>" >
						</td>
						<td>
							<label>MAKE</label>
							<input type="text" name="make1" value="<?php echo (isset($info['make1'])&& !empty($info['make1'])) ? $info['make1'] : $info['make']; ?>" >
						</td>
						<td>
							<label>MODEL</label>
							<input type="text" name="model1" value="<?php echo (isset($info['model1'])&& !empty($info['model1'])) ? $info['model1'] : $info['model']; ?>" >
						</td>
						<td>
							<label>BODY STYLE</label>
							<input type="text" name="body_style" value="<?php echo isset($info['body_style']) ? $info['body_style'] : ''; ?>" >
						</td>
						<td>
							<label>COLOR</label>
							<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" >
						</td>
						<td>
							<label>ENGINE</label>
							<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" >
						</td>
						<td>
							<label>TRANSMISSION</label>
							<input type="text" name="transmission" value="<?php echo isset($info['transmission']) ? $info['transmission'] : ''; ?>" >
						</td>
						<td>
							<label>DELIVERY DATE</label>
							<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" >
						</td>
					</tr>
				</table>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0;  border-bottom: 1px solid #000;">
				<div class="one-half-table" style="float: left; width: 50%">
					<table cellpadding="0" cellspacing="0" width="100%" style="border-left: 1px solid #000;">
						<tr>
							<td colspan="4">
								<label>SERIAL NUMBER</label>
								<input type="text" name="serial_number" value="<?php echo isset($info['serial_number']) ? $info['serial_number'] : ''; ?>" >
							</td>
							<td colspan="2" style="width: 30%;">
								<label>MILES</label>
								<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" >
							</td>
						</tr>
						<tr>
							<td colspan="6" style="vertical-align: middle; padding: 7px 0;">OPTIONAL EQUIPMENT ACCESSORIES</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse" value="<?php echo isset($info['optional_equ_asse']) ? $info['optional_equ_asse'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse1" value="<?php echo isset($info['optional_equ_asse1']) ? $info['optional_equ_asse1'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse2" value="<?php echo isset($info['optional_equ_asse2']) ? $info['optional_equ_asse2'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse3" value="<?php echo isset($info['optional_equ_asse3']) ? $info['optional_equ_asse3'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse4" value="<?php echo isset($info['optional_equ_asse4']) ? $info['optional_equ_asse4'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse5" value="<?php echo isset($info['optional_equ_asse5']) ? $info['optional_equ_asse5'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse6" value="<?php echo isset($info['optional_equ_asse6']) ? $info['optional_equ_asse6'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse7" value="<?php echo isset($info['optional_equ_asse7']) ? $info['optional_equ_asse7'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse8" value="<?php echo isset($info['optional_equ_asse8']) ? $info['optional_equ_asse8'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse9" value="<?php echo isset($info['optional_equ_asse9']) ? $info['optional_equ_asse9'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse10" value="<?php echo isset($info['optional_equ_asse10']) ? $info['optional_equ_asse10'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse11" value="<?php echo isset($info['optional_equ_asse11']) ? $info['optional_equ_asse11'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse12" value="<?php echo isset($info['optional_equ_asse12']) ? $info['optional_equ_asse12'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse13" value="<?php echo isset($info['optional_equ_asse13']) ? $info['optional_equ_asse13'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse14" value="<?php echo isset($info['optional_equ_asse14']) ? $info['optional_equ_asse14'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse15" value="<?php echo isset($info['optional_equ_asse15']) ? $info['optional_equ_asse15'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse16" value="<?php echo isset($info['optional_equ_asse16']) ? $info['optional_equ_asse16'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse17" value="<?php echo isset($info['optional_equ_asse17']) ? $info['optional_equ_asse17'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse18" value="<?php echo isset($info['optional_equ_asse18']) ? $info['optional_equ_asse18'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse19" value="<?php echo isset($info['optional_equ_asse19']) ? $info['optional_equ_asse19'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse20" value="<?php echo isset($info['optional_equ_asse20']) ? $info['optional_equ_asse20'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse21" value="<?php echo isset($info['optional_equ_asse21']) ? $info['optional_equ_asse21'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse22" value="<?php echo isset($info['optional_equ_asse22']) ? $info['optional_equ_asse22'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse23" value="<?php echo isset($info['optional_equ_asse23']) ? $info['optional_equ_asse23'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse24" value="<?php echo isset($info['optional_equ_asse24']) ? $info['optional_equ_asse24'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse25" value="<?php echo isset($info['optional_equ_asse25']) ? $info['optional_equ_asse25'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse26" value="<?php echo isset($info['optional_equ_asse26']) ? $info['optional_equ_asse26'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="optional_equ_asse27" value="<?php echo isset($info['optional_equ_asse27']) ? $info['optional_equ_asse27'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="optional_equ_asse28" value="<?php echo isset($info['optional_equ_asse28']) ? $info['optional_equ_asse28'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="optional_equ_asse29" value="<?php echo isset($info['optional_equ_asse29']) ? $info['optional_equ_asse29'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><label>CASH DEPOSIT</label></td>
							<td>
								<input type="text" name="cash_deposit" id="cash_deposit" class="cls_total_cash_down_equ" value="<?php echo isset($info['cash_deposit']) ? $info['cash_deposit'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_deposit1" id="cash_deposit1" class="cls_total_cash_down_equ" value="<?php echo isset($info['cash_deposit1']) ? $info['cash_deposit1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><label>CASH ON DELIVERY</label></td>
							<td>
								<input type="text" name="cash_on_delivery" id="cash_on_delivery" class="cls_total_cash_down_equ" value="<?php echo isset($info['cash_on_delivery']) ? $info['cash_on_delivery'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_on_delivery1" id="cash_on_delivery1" class="cls_total_cash_down_equ" value="<?php echo isset($info['cash_on_delivery1']) ? $info['cash_on_delivery1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><label>TOTAL CASH DOWN</label></td>
							<td>
								<input type="text" name="total_cash_down_equ" id="val_total_cash_down_equ" value="<?php echo isset($info['total_cash_down_equ']) ? $info['total_cash_down_equ'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="total_cash_down_equ1" value="<?php echo isset($info['total_cash_down_equ1']) ? $info['total_cash_down_equ1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="6" style="padding: 4px 0 5px;">DESCRIPTION OF TRADED IN</td>
						</tr>
						<tr>
							<td>
								<label>YEAR</label>
								<input type="text" name="year2" value="<?php echo (isset($info['year2']) && !empty($info['year2'])) ? $info['year2'] : $info['year']; ?>" style="width: 100%;">
							</td>
							<td>
								<label>MAKE</label>
								<input type="text" name="make2" value="<?php echo (isset($info['make2']) && !empty($info['make2make2'])) ? $info['make2'] : $info['make']; ?>" style="width: 100%;">
							</td>
							<td>
								<label>MODEL</label>
								<input type="text" name="model2" value="<?php echo (isset($info['model2'])&& !empty($info['model2'])) ? $info['model2'] : $info['model']; ?>" style="width: 100%;">
							</td>
							<td>
								<label>COLOR</label>
								<input type="text" name="color1" value="<?php echo isset($info['color1']) ? $info['color1'] : ''; ?>" style="width: 100%;">
							</td>
							<td colspan="2">
								<label>MILES</label>
								<input type="text" name="miles1" value="<?php echo isset($info['miles1']) ? $info['miles1'] : ''; ?>" style="width: 100%;">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label>TITLE NO.</label>
								<input type="text" name="title_number" value="<?php echo isset($info['title_number']) ? $info['title_number'] : ''; ?>" style="width: 100%;">
							</td>
							<td colspan="4">
								<label>SERIAL NO.</label>
								<input type="text" name="serial_number1" value="<?php echo isset($info['serial_number1']) ? $info['serial_number1'] : ''; ?>" style="width: 100%;">
							</td>
						</tr>
						<tr>
							<td colspan="6">
								<div class="row" style="float: left; width: 100%; text-align: left; margin: 0;">
									<div class="one-half" style="float: left; width: 60%; box-sizing: border-box; padding:  0 10px;">
										<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
											<label>PAY OFF ON USED TO: </label>
											<input type="text" name="pay_off" value="<?php echo isset($info['pay_off']) ? $info['pay_off'] : ''; ?>" style="width: 36%; text-align: left;">
										</div>
										<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
											<label>NAME</label>
											<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>" style="width: 78%; text-align: left;">
										</div>
										<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
											<label>ADDRESS </label>
											<input type="text" name="address_data1" value="<?php echo isset($info['address_data1']) ? $info['address_data1'] : ''; ?>"  style="width: 70%; text-align: left;">
										</div>
									</div>
									<div class="one-half-last" style="float: right; width: 39%; box-sizing: border-box;">
										<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
											<label>ADDRESS </label>
											<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 55%; border-bottom: 1px solid #000;">
										</div>
										<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
											<label>PHONE </label>
											<input type="text" name="pay_phone" value="<?php echo isset($info['pay_phone']) ? $info['pay_phone'] : ''; ?>" style="width: 65%; border-bottom: 1px solid #000;">
										</div>
									</div>
								</div>
							</td>
						</tr>
						
						<tr>
							<td colspan="6"><p style="font-size: 12px; margin: 0; padding: 5px 11px; text-align: justify;">THE INFORMATION YOU SEE ON THE WINDOW FROM (BUYER'S GUIDE) FOR THIS VEHICLE IS PART OF THIS CONTRACT. INFORMATION ON THE WINDOW FROM OVERRIDES ANY CONTRARY PROVISIONS IN THE CONTRACT SALE.</p></td>
						</tr>
						<tr>
							<td colspan="6">
								<h2 style="font-size: 13px;">
								<p style="margin:0;">DEPOSIT IS NOT REFUNDABLE UNLESS</p>
								<p style="margin:0;">OTHERWISE SPECIFIED ON THIS ORDER.</p>
								<p style="margin:0;">NO LOANER CARS - NO TOWING</p></h2>
								
								<div class="form-field">
									<label>PURCHASER</label>
									<input type="text" name="purchaser" value="<?php echo isset($info['purchaser']) ? $info['purchaser'] : ''; ?>" style="width: 76%; border-bottom: 1px solid #000; margin-bottom: 5px;">
								</div>
							</td>
						</tr>
						
						<tr>
							<td colspan="6">
								<h2 style="font-size: 20px; margin: 0; padding: 10px 25px; text-align: justify; line-height: 20px;">SORRY! NO PERSONAL CHECKS. PLEASE HAVE CASHIER CHECK IN THE  AMOUNT OF $
									<input type="text" name="cashier_check_amt" value="<?php echo isset($info['cashier_check_amt']) ? $info['cashier_check_amt'] : ''; ?>" style="width: 60%; border-bottom: 1px solid #000;"> MADE PAYABLE TO GATEWAY RV.
								</h2>
								<div class="form-field">
									<label>Approved </label>
									<input type="text" name="approved" value="<?php echo isset($info['approved']) ? $info['approved'] : ''; ?>" style="width: 79%; border-bottom: 1px solid #000;">
								</div>
								<p style="font-size: 14px; text-align: center; margin: 5px 0 15px;">THIS ORDER NOT VALID UNLESS SIGNED AND <br> ACCEPTED BY AN OFFICER OF THE COMPANY.</p>
							</td>
						</tr>
					</table>
				</div>
				<!-- left table end -->
				
				
				<!-- right table start -->
				<div class="one-half-table" style="float: left; width: 50%">
					<table cellpadding="0" cellspacing="0" width="100%" style="border-left: 1px solid #000; border-left: 0px;">
						<tr>
							<td colspan="4">
								<label>SALESMAN:</label>
								<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 60%; padding: 2.5px 0;">
							</td>
							<td colspan="2" rowspan="2" style="width: 30%;">
								<label>STOCK NO.</label>
								<input type="text" name="stock_no" value="<?php echo isset($info['stock_no']) ? $info['stock_no'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; vertical-align: middle; padding: 1px 0 2px; padding-left: 5%;">
								<span>NEW 
									<input type="checkbox" name="new" value="yes" <?php echo (isset($info['new'])&&$info['new']=='yes')?'checked="checked"':''; ?> />
								</span>
								<span style="margin: 0 10px;">USED 
									<input type="checkbox" name="used" value="yes" <?php echo (isset($info['used'])&&$info['used']=='yes')?'checked="checked"':''; ?> />
								</span>
								<span>DEMO 
									<input type="checkbox" name="demo" value="yes" <?php echo (isset($info['demo'])&&$info['demo']=='yes')?'checked="checked"':''; ?> />
								</span>
							</td>
							
						</tr>
						<tr>
							<td colspan="4">CASH DELIVERED PRICE OF UNIT</td>
							<td>
								<input type="text" name="cash_delivered_price_unit" value="<?php echo isset($info['cash_delivered_price_unit']) ? $info['cash_delivered_price_unit'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit1" value="<?php echo isset($info['cash_delivered_price_unit1']) ? $info['cash_delivered_price_unit1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit2" value="<?php echo isset($info['cash_delivered_price_unit2']) ? $info['cash_delivered_price_unit2'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit3" value="<?php echo isset($info['cash_delivered_price_unit3']) ? $info['cash_delivered_price_unit3'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit4" value="<?php echo isset($info['cash_delivered_price_unit4']) ? $info['cash_delivered_price_unit4'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit5" value="<?php echo isset($info['cash_delivered_price_unit5']) ? $info['cash_delivered_price_unit5'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit6" value="<?php echo isset($info['cash_delivered_price_unit6']) ? $info['cash_delivered_price_unit6'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit7" value="<?php echo isset($info['cash_delivered_price_unit7']) ? $info['cash_delivered_price_unit7'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit8" value="<?php echo isset($info['cash_delivered_price_unit8']) ? $info['cash_delivered_price_unit8'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit9" value="<?php echo isset($info['cash_delivered_price_unit9']) ? $info['cash_delivered_price_unit9'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit10" value="<?php echo isset($info['cash_delivered_price_unit10']) ? $info['cash_delivered_price_unit10'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit11" value="<?php echo isset($info['cash_delivered_price_unit11']) ? $info['cash_delivered_price_unit11'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit12" value="<?php echo isset($info['cash_delivered_price_unit12']) ? $info['cash_delivered_price_unit12'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit13" value="<?php echo isset($info['cash_delivered_price_unit13']) ? $info['cash_delivered_price_unit13'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit14" value="<?php echo isset($info['cash_delivered_price_unit14']) ? $info['cash_delivered_price_unit14'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit15" value="<?php echo isset($info['cash_delivered_price_unit15']) ? $info['cash_delivered_price_unit15'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit16" value="<?php echo isset($info['cash_delivered_price_unit16']) ? $info['cash_delivered_price_unit16'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit17" value="<?php echo isset($info['cash_delivered_price_unit17']) ? $info['cash_delivered_price_unit17'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit18" value="<?php echo isset($info['cash_delivered_price_unit18']) ? $info['cash_delivered_price_unit18'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit19" value="<?php echo isset($info['cash_delivered_price_unit19']) ? $info['cash_delivered_price_unit19'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="cash_delivered_price_unit20" value="<?php echo isset($info['cash_delivered_price_unit20']) ? $info['cash_delivered_price_unit20'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="cash_delivered_price_unit21" value="<?php echo isset($info['cash_delivered_price_unit21']) ? $info['cash_delivered_price_unit21'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="cash_delivered_price_unit22" value="<?php echo isset($info['cash_delivered_price_unit22']) ? $info['cash_delivered_price_unit22'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4"><strong style="text-align: center;">TOTAL CASH PRICE</strong></td>
							<td>
								<input type="text" name="unit_value" id="unit_value" class = "cls_difference_price" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="unit_value1" id="unit_value1" class = "cls_difference_price" value="<?php echo isset($info['unit_value1']) ? $info['unit_value1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><label>TRADE ALLOWANCE</label></td>
							<td>
								<input type="text" name="trade_value" id="trade_value" class = "cls_difference_price" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="trade_value1" id="trade_value1" class = "cls_difference_price" value="<?php echo isset($info['trade_value1']) ? $info['trade_value1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><label>DIFFERENCE PRICE</label></td>
							<td>
								<input type="text" name="difference_price" id="val_difference_price" class="cls_sub_total" value="<?php echo isset($info['difference_price']) ? $info['difference_price'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="difference_price1" value="<?php echo isset($info['difference_price1']) ? $info['difference_price1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="difference_price2" value="<?php echo isset($info['difference_price2']) ? $info['difference_price2'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="difference_price3" value="<?php echo isset($info['difference_price3']) ? $info['difference_price3'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="difference_price4" value="<?php echo isset($info['difference_price4']) ? $info['difference_price4'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input type="text" name="difference_price5" value="<?php echo isset($info['difference_price5']) ? $info['difference_price5'] : ''; ?>">
							</td>
							<td>
								<input type="text" name="difference_price6" value="<?php echo isset($info['difference_price6']) ? $info['difference_price6'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="difference_price7" value="<?php echo isset($info['difference_price7']) ? $info['difference_price7'] : ''; ?>">
							</td>
						</tr>

						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;"><strong>DOCUMENTARY FEE</strong></td>
							<td>
								<input type="text" name="documentary_fee" class="cls_sub_total" id="documentary_fee" value="<?php echo isset($info['documentary_fee']) ? $info['documentary_fee'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="documentary_fee1" class="cls_sub_total" id="documentary_fee1" value="<?php echo isset($info['documentary_fee1']) ? $info['documentary_fee1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">PAYOFF</td>
							<td>
								<input type="text" name="payoff" class="cls_sub_total" id="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="payoff1" class="cls_sub_total" id="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">SUB TOTAL</td>
							<td>
								<input type="text" name="sub_total" class="cls_balance_due_cash_sale" id="val_sub_total" value="<?php echo isset($info['sub_total']) ? $info['sub_total'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="sub_total1" value="<?php echo isset($info['sub_total1']) ? $info['sub_total1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">TOTAL CASH DOWN</td>
							<td>
								<input type="text" name="total_cash_down" class="cls_balance_due_cash_sale" id="val_total_cash_down" value="<?php echo isset($info['total_cash_down']) ? $info['total_cash_down'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="total_cash_down1" value="<?php echo isset($info['total_cash_down1']) ? $info['total_cash_down1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">BAL. TO FIN.</td>
							<td>
								<input type="text" name="bal_to_fin" class="cls_balance_due_cash_sale" id="bal_to_fin" value="<?php echo isset($info['bal_to_fin']) ? $info['bal_to_fin'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="bal_to_fin1" class="cls_balance_due_cash_sale" id="bal_to_fin1" value="<?php echo isset($info['bal_to_fin1']) ? $info['bal_to_fin1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">EXT. WARRANTY</td>
							<td>
								<input type="text" name="ext_warranty" class="cls_balance_due_cash_sale" id="ext_warranty" value="<?php echo isset($info['ext_warranty']) ? $info['ext_warranty'] : ''; ?>">
							</td>
							<td style="width: 10%;">
								<input type="text" name="ext_warranty1" class="cls_balance_due_cash_sale" id="ext_warranty1" value="<?php echo isset($info['ext_warranty1']) ? $info['ext_warranty1'] : ''; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left; padding-left: 3%;">BALANCE DUE ON CASH SALE</td>
							<td>
								<input type="text" name="balance_due_cash_sale" id="balance_due_cash_sale" value="<?php echo isset($info['balance_due_cash_sale']) ? $info['balance_due_cash_sale'] : ''; ?>" >
							</td>
							<td style="width: 10%;">
								<input type="text" name="balance_due_cash_sale1" value="<?php echo isset($info['balance_due_cash_sale1']) ? $info['balance_due_cash_sale1'] : ''; ?>" >
							</td>
						</tr>
						<tr>
							<td colspan="6" style="padding: 4px 4px 5px; text-align: justify;">
								<h5 style="margin: 0; text-align: center; ">DISCLAIMER OF WARRANTIES</h5>
								<p style="margin: 0; font-size: 11px; margin-bottom: 2px;">Any warranties on the products sold hereby are those made by the manufacture. The Seller GATEWAY RV hereby expressly disclaims all warranties, either express or implied including any implied warrenty of merchantability or fitness for a particular purpose, and GATEWAY RV neither assumes nor authorizes any other person to assume for it any liability in connectiion with the sales of said products. THE FRONT AND BACK OF THIS ORDER COMPRISE THE ENTIRE AGREEMENT AFFECTING THIS PURCHASE AND NO OTHER AGREEMENT OR UNDERSTANDING OF ANY NATURE CONCERNING SAME HAS BEEN MADE OR ENTERED INTO, OR WILL BE RECOGNIZED. I HEREBY CERTIFY THAT NO CREDIT HAS BEEN EXTENDED TO ME FORTHE PUECHAGE OF THIS MOTOR VEHICLE EXCEPT AS APPEARS IN WRITING ON THE FACE OF THIS AGREEMENT.</P>
								<P style="margin: 0; font-size: 11px; margin-bottom: 2px;">I CERTIFY THAT 1. I HAVE READ THE MATTER PRINTED ON THE BACK HEREOF AND AGREE TO IT AS PART OF THIS ORDER THE SAME AS IF IT WERE PRINTED ABOVE MY SIGNATURE 2. I AM 18 YEARS OF AGE OR OLDER. 3. I HAVE VOLUNTARILY  ORDERED THE ABOVE DESCRIBED RV. THE OPTIONAL EQUIPMENT AND ACCESSORIES THEREON . THE INSURANCE AS DESCRIBED AND THE FINANCING ARRANGEMENTS. 4.THAT THE RV I AM TRADING IS FREE FROM ALL ENCUMBRANCES WHATSOVER EXCEPT AS NOTED ABOVE AND I HEREBY ACKNOWLEDGE RECCEIPT OF A COPY OF THIS ORDER. </P>
								<P style="margin: 0; font-size: 12px; text-align: left;"><strong>DOCUMENTARY FEE. A DOCUMENTARY IS NOT AN OFFICIAL FEE. A DOCUMENTARY FEE IS NOT REQUIRED BY LAW,BUT MAY BE CHARGED TO BUYERS FOR HANDLING DOCUMENTS AND PERFORMING SERVICES RELATED TO CLOSING OF A SLE . THE BASE DOCUMENTARY FEE BEGININNING JANUARY 1,2008, WAS $150. THE MAXIMUM AMOUNT THAT MAY BE CHARGED A DOCUMENTARY FEE IS THE BASE DOCUMENTARY FEE OF $150 WHICH SHALL BE SUBJECT TO AN ANNUAL RATE ADJUSTMENT EQUAL TO THE PERCENTAGE OF CHANGE IN THE BUREAU OF LABOR STATISTICS CONSUMER PRICE INDEX. THE NOTICE IS REQUIRED BY LAW. </strong></p>
							</td>
						</tr>	
					</table>
				</div>
				
				
				<!-- right table end -->
				
				
				
			</div>
		
			
			
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

			calculate_total_cash_down_equ();
			calculate_difference_price();
			calculate_sub_total();
			calculate_balance_due_cash_sale();

			$(".cls_total_cash_down_equ").on('keyup paste change',function(){
				calculate_total_cash_down_equ();
			});
			

			$(".cls_difference_price").on('keyup paste change',function(){
				calculate_difference_price();
			});

			$(".cls_sub_total").on('keyup paste change',function(){
				calculate_sub_total();
			});

			$(".cls_balance_due_cash_sale").on('keyup paste change',function(){
				calculate_balance_due_cash_sale();
			});

			function calculate_total_cash_down_equ() {
				var cash_deposit = isNaN(parseFloat($("#cash_deposit").val()))?0.00:parseFloat($("#cash_deposit").val());
				var cash_deposit1 = isNaN(parseFloat($("#cash_deposit1").val()))?0.00:parseFloat($("#cash_deposit1").val());
				var cash_on_delivery = isNaN(parseFloat($("#cash_on_delivery").val()))?0.00:parseFloat($("#cash_on_delivery").val());
				var cash_on_delivery1 = isNaN(parseFloat($("#cash_on_delivery1").val()))?0.00:parseFloat($("#cash_on_delivery1").val());

				var val_total_cash_down_equ = cash_deposit+cash_deposit1+cash_on_delivery+cash_on_delivery1;

				$("#val_total_cash_down_equ").val(val_total_cash_down_equ.toFixed(2));
				$("#val_total_cash_down").val(val_total_cash_down_equ.toFixed(2));
			}

			function calculate_difference_price() {
				var unit_value = isNaN(parseFloat($("#unit_value").val()))?0.00:parseFloat($("#unit_value").val());
				var unit_value1 = isNaN(parseFloat($("#unit_value1").val()))?0.00:parseFloat($("#unit_value1").val());
				var trade_value = isNaN(parseFloat($("#trade_value").val()))?0.00:parseFloat($("#trade_value").val());
				var trade_value1 = isNaN(parseFloat($("#trade_value1").val()))?0.00:parseFloat($("#trade_value1").val());

				var val_difference_price = (unit_value+unit_value1)-(trade_value+trade_value1);

				$("#val_difference_price").val(val_difference_price.toFixed(2));
			}

			function calculate_sub_total() {
				var val_difference_price = isNaN(parseFloat($("#val_difference_price").val()))?0.00:parseFloat($("#val_difference_price").val());
				var documentary_fee = isNaN(parseFloat($("#documentary_fee").val()))?0.00:parseFloat($("#documentary_fee").val());
				var documentary_fee1 = isNaN(parseFloat($("#documentary_fee1").val()))?0.00:parseFloat($("#documentary_fee1").val());
				var payoff = isNaN(parseFloat($("#payoff").val()))?0.00:parseFloat($("#payoff").val());
				var payoff1 = isNaN(parseFloat($("#payoff1").val()))?0.00:parseFloat($("#payoff1").val());

				var val_sub_total = val_difference_price+documentary_fee+documentary_fee1+payoff+payoff1;

				$("#val_sub_total").val(val_sub_total.toFixed(2));
			}

			function calculate_balance_due_cash_sale() {
				var val_sub_total = isNaN(parseFloat($("#val_sub_total").val()))?0.00:parseFloat($("#val_sub_total").val());
				var val_total_cash_down = isNaN(parseFloat($("#val_total_cash_down").val()))?0.00:parseFloat($("#val_total_cash_down").val());
				var bal_to_fin = isNaN(parseFloat($("#bal_to_fin").val()))?0.00:parseFloat($("#bal_to_fin").val());
				var bal_to_fin1 = isNaN(parseFloat($("#bal_to_fin1").val()))?0.00:parseFloat($("#bal_to_fin1").val());
				var ext_warranty = isNaN(parseFloat($("#ext_warranty").val()))?0.00:parseFloat($("#ext_warranty").val());
				var ext_warranty1 = isNaN(parseFloat($("#ext_warranty1").val()))?0.00:parseFloat($("#ext_warranty1").val());

				var balance_due_cash_sale = val_sub_total-val_total_cash_down+bal_to_fin+bal_to_fin1+ext_warranty+ext_warranty1;

				$("#balance_due_cash_sale").val(balance_due_cash_sale.toFixed(2));
			}

			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>