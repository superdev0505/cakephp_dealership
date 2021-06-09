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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px;}
	td, th{padding: 0px; border-bottom: 0px solid #000;}
	td:first-child{border-left: 0px solid #000;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	.cover input[type="text"]{border: 0px;}
	.no-border input[type="text"]{border: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 50% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.cal .form-field {
		padding: 5px !important;
	}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="left" style="float: left; width: 50%; text-align: center;">
				<h1 style="margin: 25px 0 45px; font-family: cursive;font-weight: bold;">SALES ORDER (RECEIPT)</h1>
				<h3 style="font-size: 21px;">YOUNGBLOOD'S CAPETOWN RV INC.</h3>P.O.Box 539 - Airport Rd. & I-55<br>Cape Girardeau, MO 63702<br>Phone (573) 334-7152<br>Fax (573) 334-9059
			</div>
			<div class="right" style="width: 50%; float: left; margin: 0px;">
				<div class="row" style="float: left; width: 100%; margin: 5px 0px;">
					<div class="form-field" style="float: left; width: 100%; text-align: right;">
						<label>DATE</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 25%; border-bottom: 1px solid #000;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; text-align: center;">
						<input type="text" name="purchase" value="<?php echo isset($info['purchase'])?$info['purchase']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>PURCHASERS NAME</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; text-align: center;">
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>STREET ADDRESS</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 30%;">
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>CITY</label>
					</div>

					<div class="form-field" style="float: left; width: 23%;">
						<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>COUNTY</label>
					</div>

					<div class="form-field" style="float: left; width: 23%;">
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>STATE</label>
					</div>

					<div class="form-field" style="float: left; width: 24%;">
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>ZIP</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; text-align: center;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box;">
						<input type="text" name="salesman_sign" value="<?php echo isset($info['salesman_sign'])?$info['salesman_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>RES. PHONE</label>
					</div>

					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box;">
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>BUS. PHONE</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; text-align: center;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box;">
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>EMAIL</label>
					</div>

					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box;">
						<input type="text" name="location" value="<?php echo isset($info['location'])?$info['location']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; text-align: center;">
						<label>UNIT LOCATION: CRV / PRV / YRV</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; box-sizing: border-box; border-top: 3px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 3px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%;">
						<p style="width: 96%; margin: 0; display: inline-block; text-align: center;"><b>DESCRIPTION OF PURCHASE</b></p>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 3px solid #000;">
					<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000; text-align: center;">
						<label><input type="checkbox" name="order_check" value="New" <?php echo ($info['order_check'] == "New") ? "checked" : ""; ?> />New</label><br>
    					<label><input type="checkbox" name="order_check" value="Used" <?php echo ($info['order_check'] == "Used") ? "checked" : ""; ?> />Used</label>
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>YEAR</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 3px;">
						<label style="font-size: 11px;">MAKE</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>BODY TYPE</label>
						<input type="text" name="body" value="<?php echo isset($info['body'])?$info['body']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>MOD. NAME</label>
						<input type="text" name="mod" value="<?php echo isset($info['mod'])?$info['mod']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label style="font-size: 11px;">LENGTH</label>
						<input type="text" name="length" value="<?php echo isset($info['length'])?$info['length']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>SERIAL NO.</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>MFG. MH. S/N</label>
						<input type="text" name="mfg" value="<?php echo isset($info['mfg'])?$info['mfg']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>INTERIOR COLOR</label>
						<input type="text" name="interior" value="<?php echo isset($info['interior'])?$info['interior']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>EXTERIOR COLOR</label>
						<input type="text" name="exterior" value="<?php echo isset($info['exterior'])?$info['exterior']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>STOCK NO.</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>ENGINE</label>
						<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>MILEAGE</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000; border-bottom: 2px solid;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
						<label>APPROX. PICKUP OR DELIVERY DATE</label>
						<input type="text" name="approx" value="<?php echo isset($info['approx'])?$info['approx']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>LIEN HOLDER</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border: 1px solid; border-left: 0px;">
						<input type="text" name="holder1" value="<?php echo isset($info['holder1'])?$info['holder1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="holder2" value="<?php echo isset($info['holder2'])?$info['holder2']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 3px solid #000; border-bottom: 2px solid #000;">
						<p style="width: 96%; margin: 0; display: inline-block; text-align: center;"><b>TOW VEHICLE & HITCH INFO/DELIVERY INSTRUCTIONS</b></p>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px;">
						<label>MODEL:</label>
						<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_addon1']; ?>" style="width: 65%;">
					</div>
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px;">
						<label>MAKE:</label>
						<input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 65%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
						<label>YEAR:</label>
						<input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 65%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="instruction1" value="<?php echo isset($info['instruction1'])?$info['instruction1']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="instruction2" value="<?php echo isset($info['instruction2'])?$info['instruction2']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="instruction3" value="<?php echo isset($info['instruction3'])?$info['instruction3']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 3px solid #000; border-bottom: 2px solid #000;">
						<p style="width: 96%; margin: 0; display: inline-block; text-align: center;"><b>DESCRIPTION OF TRADE-IN</b></p>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>MAKE</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>YEAR</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>BODY TYPE</label>
						<input type="text" name="body_trade" value="<?php echo isset($info['body_trade'])?$info['body_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>MOD. NAME</label>
						<input type="text" name="mod_trade" value="<?php echo isset($info['mod_trade'])?$info['mod_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>LENGTH</label>
						<input type="text" name="length_trade" value="<?php echo isset($info['length_trade'])?$info['length_trade']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>ENGINE</label>
						<input type="text" name="engine_trade" value="<?php echo isset($info['engine_trade'])?$info['engine_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>MILEAGE</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>INTERIOR COLOR</label>
						<input type="text" name="interior_trade" value="<?php echo isset($info['interior_trade'])?$info['interior_trade']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>EXTERIOR COLOR</label>
						<input type="text" name="exterior_trade" value="<?php echo isset($info['exterior_trade'])?$info['exterior_trade']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>S/N</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>EQUIPMENT</label>
						<input type="text" name="equipment_trade" value="<?php echo isset($info['equipment_trade'])?$info['equipment_trade']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="equipment_trade1" value="<?php echo isset($info['equipment_trade1'])?$info['equipment_trade1']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="equipment_trade2" value="<?php echo isset($info['equipment_trade2'])?$info['equipment_trade2']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 2px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>FINANCED WITH</label>
						<input type="text" name="finance" value="<?php echo isset($info['finance'])?$info['finance']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<label>ESTIMATED BALANCE BY CUSTOMER</label>
						<input type="text" name="estimate" value="<?php echo isset($info['estimate'])?$info['estimate']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 3px solid #000; border-bottom: 2px solid #000;">
						<p style="width: 96%; margin: 0; display: inline-block; text-align: center;"><b>*ALL DEALS ARE SUBJECT TO MANAGEMENT APPROVAL</b></p>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>APPROVED BY:</label>
						<input type="text" name="approved" value="<?php echo isset($info['approved'])?$info['approved']:''; ?>" style="width: 60%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 100%; border-bottom: 1px solid;">
						<label>SALESPERSON</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<input type="text" name="purchaser" value="<?php echo isset($info['purchaser'])?$info['purchaser']:''; ?>" style="width: 100%; border-bottom: 1px solid;">
						<label>PURCHASER</label>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 50%; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%;">
						<p style="width: 100%; margin: 0; display: inline-block; text-align: center;"><b>EQUIPMENT AND ACCESSORIES OF PURCHARSE</b></p>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; padding: 4px; box-sizing: border-box; border-top: 3px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>PRE-OWNED AS IS NO WARRANTY CUSTOMER INTIALS:</label>
						<input type="text" name="joint_name" value="<?php echo isset($info['joint_name'])?$info['joint_name']:''; ?>" style="width: 30%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33.33%;">
						<br>
						<label>HITCH WORK:</label>
						<label style="margin: 0 2%;"><input type="radio" name="hitch_check" value="yes" <?php echo (isset($info['hitch_check']) && $info['hitch_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="hitch_check" value="no" <?php echo (isset($info['hitch_check']) && $info['hitch_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>

					<div class="form-field" style="float: left; width: 35%;">
						<br>
						<label>CUSTOMER PAY:</label>
						<label style="margin: 0 2%;"><input type="radio" name="customer_check" value="yes" <?php echo (isset($info['customer_check']) && $info['customer_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="customer_check" value="no" <?php echo (isset($info['customer_check']) && $info['customer_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>

					<div class="form-field" style="float: left; width: 30%;">
						<br>
						<label>TYPE:</label>
						<input type="text" name="hitch_type" value="<?php echo isset($info['hitch_type'])?$info['hitch_type']:''; ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 36%;">
						<br>
						<label>BRAKE CONTROL:</label>
						<label style="margin: 0 2%;"><input type="radio" name="brake_check" value="yes" <?php echo (isset($info['brake_check']) && $info['brake_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="brake_check" value="no" <?php echo (isset($info['brake_check']) && $info['brake_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>

					<div class="form-field" style="float: left; width: 35%;">
						<br>
						<label>CUSTOMER PAY:</label>
						<label style="margin: 0 2%;"><input type="radio" name="customer1_check" value="yes" <?php echo (isset($info['customer1_check']) && $info['customer1_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="customer1_check" value="no" <?php echo (isset($info['customer1_check']) && $info['customer1_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>

					<div class="form-field" style="float: left; width: 25%;">
						<br>
						<label>TYPE:</label>
						<input type="text" name="brake_type" value="<?php echo isset($info['brake_type'])?$info['brake_type']:''; ?>" style="width: 60%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 36%;">
						<br>
						<label>7 WAY PLUG:</label>
						<label style="margin: 0 2%;"><input type="radio" name="plug_check" value="yes" <?php echo (isset($info['plug_check']) && $info['plug_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="plug_check" value="no" <?php echo (isset($info['plug_check']) && $info['plug_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>

					<div class="form-field" style="float: left; width: 35%;">
						<br>
						<label>:</label>
						<label style="margin: 0 2%;"><input type="radio" name="customer2_check" value="yes" <?php echo (isset($info['customer2_check']) && $info['customer2_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="customer2_check" value="no" <?php echo (isset($info['customer2_check']) && $info['customer2_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>FULL CHECK OUT:</label>
						<label style="margin: 0 2%;"><input type="radio" name="full_check" value="yes" <?php echo (isset($info['full_check']) && $info['full_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="full_check" value="no" <?php echo (isset($info['full_check']) && $info['full_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>WASH & DETAIL:</label>
						<label style="margin: 0 2%;"><input type="radio" name="wash_check" value="yes" <?php echo (isset($info['wash_check']) && $info['wash_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="wash_check" value="no" <?php echo (isset($info['wash_check']) && $info['wash_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>BATTERY & BATTERY BOX:</label>
						<label style="margin: 0 2%;"><input type="radio" name="battery_check" value="yes" <?php echo (isset($info['battery_check']) && $info['battery_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="battery_check" value="no" <?php echo (isset($info['battery_check']) && $info['battery_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>FILL LP TANKS:</label>
						<label style="margin: 0 2%;"><input type="radio" name="fill_check" value="yes" <?php echo (isset($info['fill_check']) && $info['fill_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="fill_check" value="no" <?php echo (isset($info['fill_check']) && $info['fill_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%;">
						<br>
						<label>CUSTOMER WALK THROUGH:</label>
						<label style="margin: 0 2%;"><input type="radio" name="walk_check" value="yes" <?php echo (isset($info['walk_check']) && $info['walk_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
   						<label style="margin: 0 2%;"><input type="radio" name="walk_check" value="no" <?php echo (isset($info['walk_check']) && $info['walk_check']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<label>OTHER PARTS, SERVICE OR ACCESSORIES INCLUDED IN DEAL</label>
						<input type="text" name="assess1" value="<?php echo isset($info['assess1'])?$info['assess1']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<input type="text" name="assess2" value="<?php echo isset($info['assess2'])?$info['assess2']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<input type="text" name="assess3" value="<?php echo isset($info['assess3'])?$info['assess3']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<label>CUSTOMER  PAID ADDS</label>
						<input type="text" name="paid1" value="<?php echo isset($info['paid1'])?$info['paid1']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<input type="text" name="paid2" value="<?php echo isset($info['paid2'])?$info['paid2']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 3px solid #000;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; text-align: center;">
						<input type="text" name="paid3" value="<?php echo isset($info['paid3'])?$info['paid3']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label><b>TOTAL</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="total" class="price" id="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label><b>Less Discount or Trade-In</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="discount" class="price" id="discount" value="<?php echo isset($info['discount'])?$info['discount']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>&nbsp;</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>MO. Sales Tax</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="sale_tax" class="price" id="sales_tax" value="<?php echo isset($info['sale_tax'])?$info['sale_tax']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label><b>Administration Fees</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="admin_fee" class="price" id="admin_fee" value="<?php echo isset($info['admin_fee'])?$info['admin_fee']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label><b>Total Delivered Cash Price</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="cash_price" class="price" id="cash_price" value="<?php echo isset($info['cash_price'])?$info['cash_price']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label><b>Less Deposit</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="less" class="price" id="less" value="<?php echo isset($info['less'])?$info['less']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>Service Contract</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="service" class="price" id="service" value="<?php echo isset($info['service'])?$info['service']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
						<label style="float: left;"><b>+ Balance On Trade-In</b></label>
						<input type="text" name="good_thru" value="<?php echo isset($info['good_thru'])?$info['good_thru']:''; ?>" style="width: 20%; float: right;">
						<p style="float: right; font-size: 11px; margin: 3px;">Good Thru</p>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 7px;">
						<input type="text" name="trade_in" class="price" id="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>&nbsp;</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>Balance Due On Delivery</b></label>
						
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="balance" class="price" id="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label><b>Lien Recording Fee</b></label>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="recording_fee" class="price" id="recording_fee" value="<?php echo isset($info['recording_fee'])?$info['recording_fee']:''; ?>" style="width: 100%;">
					</div>
				</div>

				<div class="row cal" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000; border-bottom: 1px solid;">
					<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 8px; border-right: 1px solid #000;">
						<label style="float: left;"><b>Amount Financed</b></label>
						<input type="text" name="term" value="<?php echo isset($info['term'])?$info['term']:''; ?>" style="width: 20%; float: right;">
						<p style="float: right; font-size: 11px; margin: 3px;">Term</p>
						<input type="text" name="rate" value="<?php echo isset($info['rate'])?$info['rate']:''; ?>" style="width: 20%; float: right;">
						<p style="float: right; font-size: 11px; margin: 3px;">Rate</p>
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 8px;">
						<input type="text" name="financed" class="price" id="financed"  value="<?php echo isset($info['financed'])?$info['financed']:''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<!-- right side end -->
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

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});


	function calculate_totalprice() {
		
		var total = isNaN(parseFloat( $('#total').val()))?0.00:parseFloat($('#total').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		var sales_tax = isNaN(parseFloat( $('#sales_tax').val()))?0.00:parseFloat($('#sales_tax').val());
		var admin_fee = isNaN(parseFloat( $('#admin_fee').val()))?0.00:parseFloat($('#admin_fee').val());
		var cash_price = total + discount + sales_tax + admin_fee;
		$("#cash_price").val(cash_price.toFixed(2));
		var less = isNaN(parseFloat( $('#less').val()))?0.00:parseFloat($('#less').val());
		var service = isNaN(parseFloat( $('#service').val()))?0.00:parseFloat($('#service').val());
		var trade_in = isNaN(parseFloat( $('#trade_in').val()))?0.00:parseFloat($('#trade_in').val());
		
		var balance = cash_price - less + service - trade_in;
		$("#balance").val(balance.toFixed(2));
	}
	//calculate();
});
	
</script>
</div>
