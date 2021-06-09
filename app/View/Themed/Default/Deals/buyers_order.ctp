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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 5px;">
			<div class="left" style="float: left; width: 35%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/harley-combo-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="right" style="float: right; width: 65%; text-align: center;">
				<h2 style="float: left; width: 100%; margin: 3px 0 font-size: 22px;"><b>PERRY HARLEY-DAVIDSON, INC.</b></h2>
				<p style="float: left; width: 100%; margin: 0; font-size: 18px; text-align: center;">5331 S. SPRINKLE ROAD <br> PORTAGE, MI 49002-9753 <br> PH: (269) 329-3450 FAX: (269) 329-3460</p>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="left" style="float: left; width: 65%;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>PURCHASER'S NAME</label>
					<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] :$info['first_name'].' '.$info['last_name']; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>PURCHASER'S ADDRESS</label>
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : "" ?>" style="width: 73%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>CITY, STATE, ZIP</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']." ".$info['county']; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>EMAIL ADDRESS</label>
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : "" ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 30%; margin-top: 30px;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>PHONE</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 3px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>COLOR</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>TYPE</label>
				<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; padding: 3px; box-sizing: border-box;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : "" ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0 0 3px; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; border-right: 1px solid #000; box-sizing: border-box;">
				<label>DELIVERY DATE</label>
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : "" ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; padding: 3px; box-sizing: border-box;">
				<label><input type="radio" name="condition_status" value="new" <?php echo (isset($info['condition_status']) && $info['condition_status']=='new')?'checked="checked"':''; ?> /> NEW</label>
				<label><input type="radio" name="condition_status" value="used" <?php echo (isset($info['condition_status']) && $info['condition_status']=='used')?'checked="checked"':''; ?> /> USED</label>
			</div>
		</div>
		
		<table style="float: left; width: 100%; margin: 0px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 40%;">&nbsp;</td>
				<td style="text-align: right; width: 40%;">MOTORCYCLE PRICE</td>
				<td style="text-align: right; width: 12%;"><input type="text" class="price" id="motor_price" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="mortorcycle" value="<?php echo isset($info['mortorcycle']) ? $info['mortorcycle'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>
					<label>DRIVERS LICENSE#</label>
					<input type="text" name="drivers" value="<?php echo isset($info['drivers']) ? $info['drivers'] : "" ?>" style="width: 50%;">
				</td>
				<td style="text-align: right;">ABS</td>
				<td style="text-align: right;"><input type="text" class="price" id="abs_price" name="abs_price" value="<?php echo isset($info['abs_price']) ? $info['abs_price'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="abs" value="<?php echo isset($info['abs']) ? $info['abs'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>
					<label>DATE OF BIRTH</label>
					<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : "" ?>" style="width: 50%;">
				</td>
				<td style="text-align: right;">SECURITY </td>
				<td style="text-align: right;"><input type="text" class="price" id="security_price" name="security_price" value="<?php echo isset($info['security_price']) ? $info['security_price'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="security" value="<?php echo isset($info['security']) ? $info['security'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>
					<label>CASH <input type="checkbox" name="cash_status" value="cash" <?php echo (isset($info['cash_status']) && $info['cash_status']=='cash')?'checked="checked"':''; ?> /></label>
					<label>FINANCED <input type="checkbox" name="finance_status" value="finance" <?php echo (isset($info['finance_status']) && $info['finance_status']=='finance')?'checked="checked"':''; ?> /></label>
				</td>
				<td style="text-align: right;">ACCESSORIES </td>
				<td style="text-align: right;"><input type="text" class="price" id="access_price" name="access_price" value="<?php echo isset($info['access_price']) ? $info['access_price'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="access" value="<?php echo isset($info['access']) ? $info['access'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>
					<label>FINANCIAL INSTITUTION</label>
					<input type="text" name="financial" value="<?php echo isset($info['financial']) ? $info['financial'] : "" ?>" style="width: 50%;">
				</td>
				<td style="text-align: right;"><input type="text" name="financial1" value="<?php echo isset($info['financial1']) ? $info['financial1'] : "" ?>" style="width: 100%;"></td>
				<td style="text-align: right;"><input type="text" name="financial2" value="<?php echo isset($info['financial2']) ? $info['financial2'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="financial3" value="<?php echo isset($info['financial3']) ? $info['financial3'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td rowspan="12"></td>
				<td style="text-align: right;">DOCUMENTATON FEE</td>
				<td style="text-align: right;"><input type="text" class="price" id="document_price" name="document_price" value="<?php echo isset($info['document_price']) ? $info['document_price'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="document" value="<?php echo isset($info['document']) ? $info['document'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">FRIGHT </td>
				<td style="text-align: right;"><input type="text" class="price" id="fright_value" name="fright_value" value="<?php echo isset($info['fright_value']) ? $info['fright_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="fright" value="<?php echo isset($info['fright']) ? $info['fright'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">PREP</td>
				<td style="text-align: right;"><input type="text" class="price" id="prep_value" name="prep_value" value="<?php echo isset($info['prep_value']) ? $info['prep_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="prep" value="<?php echo isset($info['prep']) ? $info['prep'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">LICENSE/TITLE</td>
				<td style="text-align: right;"><input type="text" class="price" id="license_value" name="license_value" value="<?php echo isset($info['license_value']) ? $info['license_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">&nbsp;</td>
				<td style="text-align: right;"><input type="text" name="value1" value="<?php echo isset($info['value1']) ? $info['value1'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="value1_title" value="<?php echo isset($info['value1_title']) ? $info['value1_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">SUBTOTAL</td>
				<td style="text-align: right;"><input type="text" class="price" id="subtotal_value" name="subtotal_value" value="<?php echo isset($info['subtotal_value']) ? $info['subtotal_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="subtotal" value="<?php echo isset($info['subtotal']) ? $info['subtotal'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">TAX</td>
				<td style="text-align: right;"><input type="text" class="price" id="tax_value" name="tax_value" value="<?php echo isset($info['tax_value']) ? $info['tax_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="tax" value="<?php echo isset($info['tax']) ? $info['tax'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">LABOR</td>
				<td style="text-align: right;"><input type="text" class="price" id="labor_value" name="labor_value" value="<?php echo isset($info['labor_value']) ? $info['labor_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="labor" value="<?php echo isset($info['labor']) ? $info['labor'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">DELIVERY</td>
				<td style="text-align: right;"><input type="text" class="price" id="delivery_value" name="delivery_value" value="<?php echo isset($info['delivery_value']) ? $info['delivery_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="delivery" value="<?php echo isset($info['delivery']) ? $info['delivery'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">STORAGE</td>
				<td style="text-align: right;"><input type="text" class="price" id="storage_value" name="storage_value" value="<?php echo isset($info['storage_value']) ? $info['storage_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="storage" value="<?php echo isset($info['storage']) ? $info['storage'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">&nbsp;</td>
				<td style="text-align: right;"><input type="text" name="value2" value="<?php echo isset($info['value2']) ? $info['value2'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="value2_title" value="<?php echo isset($info['value2_title']) ? $info['value2_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: right;">TOTAL CASH DELIVERED PRICE</td>
				<td style="text-align: right;"><input type="text" class="price" id="total_value" name="total_value" value="<?php echo isset($info['total_value']) ? $info['total_value'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : "" ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<table style="float: left; width: 100%; margin: 0px;" cellpadding="0" cellspacing="0">
			<tr>
				<td rowspan="4" style="width: 7%;"><label style="transform: rotate(-90deg); display: block;">CREDIT</label></td>
				<td style="width: 60%;">
					<label>DEPOSIT</label>
					<input type="text" name="deposit1" value="<?php echo isset($info['deposit1']) ? $info['deposit1'] : "" ?>" style="width: 50%;">
				</td>
				<td style="width: 10%;"><input type="text" class="price" id="deposit2" name="deposit2" value="<?php echo isset($info['deposit2']) ? $info['deposit2'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 7%;"><input type="text" name="deposit3" value="<?php echo isset($info['deposit3']) ? $info['deposit3'] : "" ?>" style="width: 100%;"></td>
				<td rowspan="4" style="width: 16%;"></td>
			</tr>
			<tr>
				<td style="width: 60%;">
					<label>TRADE-IN CREDIT</label>
					<input type="text" name="trade_credit1" value="<?php echo isset($info['trade_credit1']) ? $info['trade_credit1'] : "" ?>" style="width: 50%;">
				</td>
				<td><input type="text" name="trade_credit2" class="price" id="trade_credit2" value="<?php echo isset($info['trade_credit2']) ? $info['trade_credit2'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="trade_credit3" value="<?php echo isset($info['trade_credit3']) ? $info['trade_credit3'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 60%;">
					<label>PAYOFF AMOUNT</label>
					<input type="text" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : "" ?>" style="width: 50%;">
				</td>
				<td><input type="text" name="payoff2" class="price" id="payoff2" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="payoff3" value="<?php echo isset($info['payoff3']) ? $info['payoff3'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="credit1" value="<?php echo isset($info['credit1']) ? $info['credit1'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="credit2" class="price" id="credit2" value="<?php echo isset($info['credit2']) ? $info['credit2'] : "" ?>" style="width: 100%;"></td>
				<td><input type="text" name="credit3" value="<?php echo isset($info['credit3']) ? $info['credit3'] : "" ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<table style="float: left; width: 100%; margin: 0px;" cellpadding="0" cellspacing="0">
			<tr>
				<td rowspan="7" style="width: 60%;"></td>
				<td style="width: 20%;"><b>TOTAL CREDITS</b></td>
				<td style="width: 12%;"><input type="text" class="price" id="total_credit" name="total_credit" value="<?php echo isset($info['total_credit']) ? $info['total_credit'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="credit_title" value="<?php echo isset($info['credit_title']) ? $info['credit_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 20%;">BALANCE DUE</td>
				<td style="width: 12%;"><input type="text" class="price" id="blance" name="blance" value="<?php echo isset($info['blance']) ? $info['blance'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="blance_title" value="<?php echo isset($info['blance_title']) ? $info['blance_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 20%;"><input type="text" name="title3" value="<?php echo isset($info['title3']) ? $info['title3'] : "" ?>" style="float: left; width: 100%;"></td>
				<td style="width: 12%;"><input type="text" name="value3" value="<?php echo isset($info['value3']) ? $info['value3'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="value3_title" value="<?php echo isset($info['value3_title']) ? $info['value3_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 20%;">BAL TO BE FINANCED</td>
				<td style="width: 12%;"><input type="text" class="price" id="bal" name="bal" value="<?php echo isset($info['bal']) ? $info['bal'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="bal_title" value="<?php echo isset($info['bal_title']) ? $info['bal_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 20%;"><input type="text" name="title4" value="<?php echo isset($info['title4']) ? $info['title4'] : "" ?>" style="float: left; width: 100%;"></td>
				<td style="width: 12%;"><input type="text" name="value4" value="<?php echo isset($info['value4']) ? $info['value4'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="value4_title" value="<?php echo isset($info['value4_title']) ? $info['value4_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="width: 20%;"><input type="text" name="title5" value="<?php echo isset($info['title5']) ? $info['title5'] : "" ?>" style="float: left; width: 100%;"></td>
				<td style="width: 12%;"><input type="text" name="value5" value="<?php echo isset($info['value5']) ? $info['value5'] : "" ?>" style="width: 100%;"></td>
				<td style="width: 8%;"><input type="text" name="value5_title" value="<?php echo isset($info['value5_title']) ? $info['value5_title'] : "" ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<h2 style="float: left; padding: 5px 0; width: 100%; text-align: center; font-size: 16px; margin: 0; border: 1px solid #000; border-top: 0px; border-bottom: 0px; box-sizing: border-box;">TRADE-IN INFORMATION</h2>
		
		<table style="float: left; width: 100%; margin: 0 0 5px; margin-top: 0px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 20%;">
					<label>MAKE</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : "" ?>" style="width: 100%;">
				</td>
				<td style="width: 30%;">
					<label>MODEL</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : "" ?>" style="width: 100%;">
				</td>
				<td style="width: 30%;">
					<label>TYPE</label>
					<input type="text" name="type_trade" value="<?php echo isset($info['type_trade']) ? $info['type_trade'] : "" ?>" style="width: 100%;">
				</td>
				<td style="width: 20%;">
					<label>YEAR</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : "" ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td rowspan="2" colspan="2">
					<label>VIN #</label>
					<textarea name="vin_trade" style="width: 100%; height: 80px; border: 0px;"><?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?></textarea>
				</td>
				<td>
					<label>LICENSE#</label>
					<input type="text" name="license_trade" value="<?php echo isset($info['license_trade']) ? $info['license_trade'] : "" ?>" style="width: 100%;">
				</td>
				<td>
					<label>MILEAGE</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : "" ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td>
					<label>COLOR</label>
					<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : "" ?>" style="width: 100%;">
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		
		
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">The front of this Order comprise the entire agreement affecting this purchase and no other agreement or understanding of any nature concerning same has been made or entered into, or entered into, or will be recognized. I hereby certify that no credit has been extended to me for the purchase of this motor vehicle except as appears in writing on the face of this agreement.</p>
		
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">I have read the matter printed on the face hereof and agree to it as a part of this order the same as if it were printed above my signature. I certify that I am 18 years of age, or older, and hereby acknowledge receipt of a copy of this order.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : "" ?>" style="width: 100%; margin-bottom: 3px; text-align: center;">
				<label style="display: block; text-align: center;">SALESMAN</label>
			</div>
			<div class="form-field" style="float: right; width: 64%;">
				<label><b>SIGNED: <span style="font-size: 20px;">X</span></b></label>
				<input type="text" name="purchaser" value="<?php echo isset($info['purchaser']) ? $info['purchaser'] : "" ?>" style="width: 70%;">
				<label>PURCHASER</label>
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

	$(".price").on('change keyup paste',function(){
		calculate_total();
	});

		var motor_price = isNaN(parseFloat( $("#motor_price").val()))?0.00:parseFloat( $("#motor_price").val());
		var abs_price = isNaN(parseFloat( $("#abs_price").val()))?0.00:parseFloat( $("#abs_price").val());
		var security_price = isNaN(parseFloat( $("#security_price").val()))?0.00:parseFloat( $("#security_price").val());
		var access_price = isNaN(parseFloat( $("#access_price").val()))?0.00:parseFloat( $("#access_price").val());
		var document_price = isNaN(parseFloat( $("#document_price").val()))?0.00:parseFloat( $("#document_price").val());
		var fright_value = isNaN(parseFloat( $("#fright_value").val()))?0.00:parseFloat( $("#fright_value").val());
		var prep_value = isNaN(parseFloat( $("#prep_value").val()))?0.00:parseFloat( $("#prep_value").val());
		var license_value = isNaN(parseFloat( $("#license_value").val()))?0.00:parseFloat( $("#license_value").val());

		var subtotal = motor_price + abs_price + security_price + access_price + document_price + fright_value + prep_value + license_value;
		$("#subtotal_value").val(subtotal.toFixed(2));
		var tax_value = isNaN(parseFloat( $("#tax_value").val()))?0.00:parseFloat( $("#tax_value").val());
		var labor_value = isNaN(parseFloat( $("#labor_value").val()))?0.00:parseFloat( $("#labor_value").val());
		var delivery_value = isNaN(parseFloat( $("#delivery_value").val()))?0.00:parseFloat( $("#delivery_value").val());
		var storage_value = isNaN(parseFloat( $("#storage_value").val()))?0.00:parseFloat( $("#storage_value").val());
		var total_value = subtotal + tax_value + labor_value + delivery_value + storage_value;
		$("#total_value").val(total_value.toFixed(2));

		var deposit2 = isNaN(parseFloat( $("#deposit2").val()))?0.00:parseFloat( $("#deposit2").val());
		var credit2 = isNaN(parseFloat( $("#credit2").val()))?0.00:parseFloat( $("#credit2").val());
		var trade_credit2 = isNaN(parseFloat( $("#trade_credit2").val()))?0.00:parseFloat( $("#trade_credit2").val());
		var payoff2 = isNaN(parseFloat( $("#payoff2").val()))?0.00:parseFloat( $("#payoff2").val());
		var total_credit = deposit2 + credit2 + trade_credit2 + payoff2;
		$("#total_credit").val(total_credit.toFixed(2));
		var blance = total_value - total_credit;
		$("#blance").val(blance.toFixed(2));

	function calculate_total(){
		var motor_price = isNaN(parseFloat( $("#motor_price").val()))?0.00:parseFloat( $("#motor_price").val());
		var abs_price = isNaN(parseFloat( $("#abs_price").val()))?0.00:parseFloat( $("#abs_price").val());
		var security_price = isNaN(parseFloat( $("#security_price").val()))?0.00:parseFloat( $("#security_price").val());
		var access_price = isNaN(parseFloat( $("#access_price").val()))?0.00:parseFloat( $("#access_price").val());
		var document_price = isNaN(parseFloat( $("#document_price").val()))?0.00:parseFloat( $("#document_price").val());
		var fright_value = isNaN(parseFloat( $("#fright_value").val()))?0.00:parseFloat( $("#fright_value").val());
		var prep_value = isNaN(parseFloat( $("#prep_value").val()))?0.00:parseFloat( $("#prep_value").val());
		var license_value = isNaN(parseFloat( $("#license_value").val()))?0.00:parseFloat( $("#license_value").val());

		var subtotal = motor_price + abs_price + security_price + access_price + document_price + fright_value + prep_value + license_value;
		$("#subtotal_value").val(subtotal.toFixed(2));
		var tax_value = isNaN(parseFloat( $("#tax_value").val()))?0.00:parseFloat( $("#tax_value").val());
		var labor_value = isNaN(parseFloat( $("#labor_value").val()))?0.00:parseFloat( $("#labor_value").val());
		var delivery_value = isNaN(parseFloat( $("#delivery_value").val()))?0.00:parseFloat( $("#delivery_value").val());
		var storage_value = isNaN(parseFloat( $("#storage_value").val()))?0.00:parseFloat( $("#storage_value").val());
		var total_value = subtotal + tax_value + labor_value + delivery_value + storage_value;
		$("#total_value").val(total_value.toFixed(2));

		var deposit2 = isNaN(parseFloat( $("#deposit2").val()))?0.00:parseFloat( $("#deposit2").val());
		var credit2 = isNaN(parseFloat( $("#credit2").val()))?0.00:parseFloat( $("#credit2").val());
		var trade_credit2 = isNaN(parseFloat( $("#trade_credit2").val()))?0.00:parseFloat( $("#trade_credit2").val());
		var payoff2 = isNaN(parseFloat( $("#payoff2").val()))?0.00:parseFloat( $("#payoff2").val());
		var total_credit = deposit2 + credit2 + trade_credit2 + payoff2;
		$("#total_credit").val(total_credit.toFixed(2));
		var blance = total_value - total_credit;
		$("#blance").val(blance.toFixed(2));
	}
});
</script>
</div>
