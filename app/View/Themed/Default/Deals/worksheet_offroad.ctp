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

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important; overflow: hidden;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 5px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 4px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 4px; border-bottom: 1px solid #000;}
	table{border: 1px solid #000;}
	th{border-right: 1px solid #000; padding: 4px; border-bottom: 1px solid #000;}
	th:last-child, td:last-child{border-right: 0;}
	td{border-right: 1px solid #000;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 5px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0; padding-bottom: 10px; border-bottom: 1px solid #000; ">
			<div class="logo" style="width: 30%; margin: 0 auto; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/cover-sheet-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 65%;">
				<p style="float: left; width: 100%; font-size: 14px; text-align: center; margin: 0 145px;">Sales Consultant: <input type="text" name="consultant" value="<?php echo isset($info['consultant']) ? $info['consultant'] : ''; ?>" style="width: 19%;"></p>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="left" style="float: left; width: 50%;">
						<p style="float: left; width: 100%; text-align: center; font-size: 16px;"><b>Unit Information</b></p>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right;margin-top: 3px;">Stock Number:</span>
							<span style="float: right; width: 50%;"><input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Year:</span>
							<span style="float: right; width: 50%;"><input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Make:</span>
							<span style="float: right; width: 50%;"><input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Model:</span>
							<span style="float: right; width: 50%;"><input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Model Number:</span>
							<span style="float: right; width: 50%;"><input type="text" name="model_num" value="<?php echo isset($info['model_num']) ? $info['model_num'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Color:</span>
							<span style="float: right; width: 50%;"><input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Odometer:</span>
							<span style="float: right; width: 50%;"><input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%;"></span>
						</div>
					</div>
					
					<div class="right" style="float: left; width: 49%;">
						<p style="float: left; width: 100%; text-align: center; font-size: 16px;"><b>Trade Information</b></p>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">VIN:</span>
							<span style="float: right; width: 50%;"><input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Year:</span>
							<span style="float: right; width: 50%;"><input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Make:</span>
							<span style="float: right; width: 50%;"><input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Model:</span>
							<span style="float: right; width: 50%;"><input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Model Number:</span>
							<span style="float: right; width: 50%;"><input type="text" name="model_num_trade" value="<?php echo isset($info['model_num_trade']) ? $info['model_num_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Color:</span>
							<span style="float: right; width: 50%;"><input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Odometer:</span>
							<span style="float: right; width: 50%;"><input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 100%;"></span>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding-bottom: 10px; border-bottom: 1px solid #000;">
			<h2 style="float: left; width: 100%; margin: 0 0 5px; font-size: 16px; text-align: center;"><b>Customer Information</b></h2>
			<div class="row" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 50%;">
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Name:</span>
							<span style="float: right; width: 50%;"><input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Address:</span>
							<span style="float: right; width: 50%;"><input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">City, State, Zip:</span>
							<span style="float: right; width: 50%;"><input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 100%;"></span>
						</div>
					</div>
					
					<div class="right" style="float: left; width: 49%;">
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Email:</span>
							<span style="float: right; width: 50%;"><input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Phone:</span>
							<span style="float: right; width: 50%;"><input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 100%;"></span>
						</div>
						<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
							<span style="float: left; width: 49%; text-align: right; margin-top: 3px;">Phone #2:</span>
							<span style="float: right; width: 50%;"><input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 100%;"></span>
						</div>
					</div>	
				</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; padding-bottom: 10px; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 38%;">
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Price:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="price" name="price" value="<?php echo isset($info['price']) ? $info['price'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Manufacturer Freight:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="freight" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Technician Setup & Prep:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="prep" name="prep" value="<?php echo isset($info['prep']) ? $info['prep'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Accessories:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="access" name="access" value="<?php echo isset($info['access']) ? $info['access'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Accessories Labor:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="access_labor" name="access_labor" value="<?php echo isset($info['access_labor']) ? $info['access_labor'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Labor:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="labor" name="labor" value="<?php echo isset($info['labor']) ? $info['labor'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Miscellaneous Costs:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="miscell" name="miscell" value="<?php echo isset($info['miscell']) ? $info['miscell'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Document Fee:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="document_fee" name="document_fee" value="<?php echo isset($info['document_fee']) ? $info['document_fee'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Trade-In Allowance:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="allowance" name="allowance" value="<?php echo isset($info['allowance']) ? $info['allowance'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Sub-Total:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="subtotal" name="subtotal" value="<?php echo isset($info['subtotal']) ? $info['subtotal'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Payoff on Trade-In:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="payoff" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Trade Equity:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="equity" name="equity" value="<?php echo isset($info['equity']) ? $info['equity'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Vehicle Inventory Tax:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="inventory" name="inventory" value="<?php echo isset($info['inventory']) ? $info['inventory'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Sales Tax:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Title/Trip Fee:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="trip_fee" name="trip_fee" value="<?php echo isset($info['trip_fee']) ? $info['trip_fee'] : ''; ?>" style="width: 90%;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 7px; font-size: 15px;">
					<span style="float: left; width: 65%;">Cash Balance:</span>
					<span style="float: right; width: 33%;">$<input type="text" class="price_value" id="cash_balance" name="cash_balance" value="<?php echo isset($info['cash_balance']) ? $info['cash_balance'] : ''; ?>" style="width: 90%;"></span>
				</div>
			</div>
					
			<div class="right" style="float: left; width: 60%;">
				<h2 style="float: left; width: 100%; font-size: 16px; margin: 10px 0 20px; text-align: center;"><b>Down Payment Options</b></h2>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 16px; font-size: 15px; text-align: center;">
					<span style="float: left; width: 25%;">&nbsp;</span>
					<span style="float: left; width: 25%;">$0</span>
					<span style="float: left; width: 25%;">$500</span>
					<span style="width: 25%;">$1,000</span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 16px; font-size: 15px; text-align: center;">
					<span style="float: left; width: 25%; margin-top: 3px;">36 months</span>
					<span style="float: right; width: 25%;"><input type="text" name="36_month1" value="<?php echo isset($info['36_month1']) ? $info['36_month1'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text" name="36_month2" value="<?php echo isset($info['36_month2']) ? $info['36_month2'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text" name="36_month3" value="<?php echo isset($info['36_month3']) ? $info['36_month3'] : ''; ?>" style="width: 100%; text-align: center;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 16px; font-size: 15px; text-align: center;">
					<span style="float: left; width: 25%; margin-top: 3px;">48 months</span>
					<span style="float: right; width: 25%;"><input type="text"  name="48_month1" value="<?php echo isset($info['48_month1']) ? $info['48_month1'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text"  name="48_month2" value="<?php echo isset($info['48_month2']) ? $info['48_month2'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text"  name="48_month3" value="<?php echo isset($info['48_month3']) ? $info['48_month3'] : ''; ?>" style="width: 100%; text-align: center;"></span>
				</div>
				<div class="cover" style="float: left; width: 100%; margin: 0 0 16px; font-size: 15px; text-align: center;">
					<span style="float: left; width: 25%; margin-top: 3px;">60 months</span>
					<span style="float: right; width: 25%;"><input type="text" name="60_month1" value="<?php echo isset($info['60_month1']) ? $info['60_month1'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text" name="60_month2" value="<?php echo isset($info['60_month2']) ? $info['60_month2'] : ''; ?>" style="width: 100%; text-align: center;"></span>
					<span style="float: right; width: 25%;"><input type="text" name="60_month3" value="<?php echo isset($info['60_month3']) ? $info['60_month3'] : ''; ?>" style="width: 100%; text-align: center;"></span>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
					<p style="float: left; width: 100%; font-size: 14px; margin: 10px 0"> <input type="checkbox" name="cash_check" <?php echo ($info['cash_check'] == "cash") ? "checked" : ""; ?> value="cash" style="margin-right: 5px;"/>I will pay cash. (Obtain Lienholder Information For Title. If any portion of balance is to <span style="margin-left: 18px;">be borrowed, lien must be recorded.)</span></p>
					<p style="float: left; width: 100%; font-size: 14px; margin: 10px 0"> <input type="checkbox" name="credit_check" <?php echo ($info['credit_check'] == "credit") ? "checked" : ""; ?> value="credit"/> I will use a Credit / Debit Card for the down payment or balance and understand that <span style="margin-left: 18px;">there is a 3% convenience fee</span></p>
					<p style="float: left; width: 100%; font-size: 14px; margin: 10px 0"> <input type="checkbox" name="dealership_check" <?php echo ($info['dealership_check'] == "dealership") ? "checked" : ""; ?> value="dealership"/> I have agreed to let the dealership obtain financing for me.</p>
				</div>
				
				
				
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
	
	$(".price_value").on('change keyup paste',function(){
		calculate_tax();
	});
	

	function calculate_tax(){
		var price = isNaN(parseFloat( $('#price').val()))?0.00:parseFloat( $('#price').val());
		var freight = isNaN(parseFloat( $('#freight').val()))?0.00:parseFloat( $('#freight').val());
		var prep = isNaN(parseFloat( $('#prep').val()))?0.00:parseFloat( $('#prep').val());
		var access = isNaN(parseFloat( $('#access').val()))?0.00:parseFloat( $('#access').val());
		var access_labor = isNaN(parseFloat( $('#access_labor').val()))?0.00:parseFloat( $('#access_labor').val());
		var labor = isNaN(parseFloat( $('#labor').val()))?0.00:parseFloat( $('#labor').val());
		var miscell = isNaN(parseFloat( $('#miscell').val()))?0.00:parseFloat( $('#miscell').val());
		var document_fee = isNaN(parseFloat( $('#document_fee').val()))?0.00:parseFloat( $('#document_fee').val());
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat( $('#allowance').val());

		var vehicle_inventory = (price + freight + prep + access)*0.207025/100;
		var subtotal = price + freight + prep + access + access_labor + labor + miscell + document_fee + allowance + vehicle_inventory;
		$('#subtotal').val(subtotal.toFixed(2));
		var sales_tax = (price + freight + prep + access)*8.25/100;
		$('#sales_tax').val(sales_tax.toFixed(2));

		var payoff = isNaN(parseFloat( $('#payoff').val()))?0.00:parseFloat( $('#payoff').val());
 		var equity = isNaN(parseFloat( $('#equity').val()))?0.00:parseFloat( $('#equity').val());
 		var inventory = isNaN(parseFloat( $('#inventory').val()))?0.00:parseFloat( $('#inventory').val());
		var trip_fee = isNaN(parseFloat( $('#trip_fee').val()))?0.00:parseFloat( $('#trip_fee').val());

		var cash_balance = subtotal + payoff + equity + inventory + sales_tax + trip_fee;
		$('#cash_balance').val(cash_balance.toFixed(2));
	}
     
});

	
	
	
	
	
</script>
</div>
