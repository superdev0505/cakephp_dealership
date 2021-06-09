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
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px; border-top: 1px solid #000;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	.left table input[type="text"]{text-align: center; font-weight: 800; font-style: italic;}
	th, td{text-align: center; padding: 12px;}
	.right table{border: 0px;}
	.right table td{border: 0px; padding: 2px;}
	.right input[type="text"]{border-bottom: 1px solid #000;}	
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 50% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="logo" style="float: left; width: 30%; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/lithia.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 30%;">
				<div class="form-field" style="float: right; margin: 3px 0; width: 100%;">
					<label>Date:</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 69%; float: right; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: right; margin: 3px 0; width: 100%;">
					<label>Salesperson:</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 69%; float: right; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: right; margin: 3px 0; width: 100%;">
					<label>Manager:</label>
					<input type="text" name="manager"  value="<?php echo isset($info['manager'])?$info['manager']:''; ?>" style="width: 69%; float: right; border-bottom: 1px solid #000;">
				</div>
			</div>
		</div>
	
		<p style="float: left; width: 100%; text-align: center; border-bottom: 5px solid black;"><b>FOR INTERNAL USE ONLY</b></p>
		
		<div class="row" style="float: left; width: 100%; margin: 1px 0; border-top: 1px solid #000; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; margin: 3px 0; width: 70%; box-sizing: border-box;">
				<label><b>BUSINESS NAME</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; margin: 3px 0; width:30%;">
				<label><b>Home Phone</b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; margin: 3px 0; width: 100%;">
				<label><b>CONTACT</b></label>
				<input type="text" name="contact" value="<?php echo isset($info['contact']) ? $info['contact'] : ''; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; margin: 3px 0; width: 70%;">
				<label><b>Address</b></label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; margin: 3px 0; width:30%;">
				<label><b>Work Phone</b></label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; margin: 3px 0; width: 70%;">
				<label><b>E-Mail</b></label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; margin: 3px 0; width:30%;">
				<label><b>Cell Phone</b></label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0 3px; border-top: 5px solid #000; border-bottom: 1px solid #000;">
			<h2 style="float: left; width: 100%; margin: 1px 0px; font-size: 16px; padding-top: 3px; border-top: 1px solid black;"><b>VEHICLE</b></h2>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Stock # :</label>
				<input type="text" name="stock_no" value="<?php echo isset($info['stock_no']) ? $info['stock_no'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>New / Used:</label>
				<input type="text" name="condition" value="<?php echo isset($info['condition']) ? $info['condition'] : ''; ?>" style="width: 62%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Mileage:</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Vehicle :</label>
				<input type="text" name="vehicle_info" value="<?php echo isset($info['vehicle_info'])?$info['vehicle_info']:$info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Color :</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Type :</label>
				<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 1px 0 3px; border-top: 5px solid #000; border-bottom: 1px solid #000;">
			<h2 style="float: left; width: 100%; margin: 1px 0px; font-size: 16px; padding: 3px 0 14px;border-top: 1px solid black;"><b>TRADE IN</b></h2>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Payoff:</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>VIN:</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Mileage:</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Vehicle :</label>
				<input type="text" name="vehicle_trade" value="<?php echo isset($info['vehicle_trade'])?$info['vehicle_trade']:$info['year_trade']." ".$info['make_trade']." ".$info['model_trade']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Color :</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 0 0 16px;">
				<label>Type :</label>
				<input type="text" name="type_trade" value="<?php echo isset($info['type_trade']) ? $info['type_trade'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 1px 0 0; box-sizing: border-box; border-top: 3px solid #000; border-bottom: 3px solid #000;">
			<div class="left" style="float: left; width: 60%; border-right: 1px solid #000; box-sizing: border-box; padding: 16px;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td colspan="4" style="text-align: left;"><b>Lithia Protected Payments</b></td>
					</tr>
					<tr>
						<td style="text-align: left; border-right: 0px;"><b><i>CASH DOWN</i></b></td>
						<td style="text-align: right; border-right: 0px;"><b><i>.00</i></b></td>
						<td style="text-align: right; border-right: 0px;"><b><i>2,500.00</i></b></td>
						<td style="text-align: right;"><b><i>3,500.00</i></b></td>
					</tr>
					
					<tr>
						<td style="text-align: right; width: 35%;"><b><i>48 Months / 3.99</i></b></td>
						<td><input type="text" name="48lithia_price1" value="<?php echo isset($info['48lithia_price1']) ? $info['48lithia_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="48lithia_price2" value="<?php echo isset($info['48lithia_price2']) ? $info['48lithia_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="48lithia_price3" value="<?php echo isset($info['48lithia_price3']) ? $info['48lithia_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>60 Months / 3.99</i></b></td>
						<td><input type="text" name="60lithia_price1" value="<?php echo isset($info['60lithia_price1']) ? $info['60lithia_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="60lithia_price2" value="<?php echo isset($info['60lithia_price2']) ? $info['60lithia_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="60lithia_price3" value="<?php echo isset($info['60lithia_price3']) ? $info['60lithia_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>72 Months / 4.99</i></b></td>
						<td><input type="text" name="72lithia_price1" value="<?php echo isset($info['72lithia_price1']) ? $info['72lithia_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="72lithia_price2" value="<?php echo isset($info['72lithia_price2']) ? $info['72lithia_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="72lithia_price3" value="<?php echo isset($info['72lithia_price3']) ? $info['72lithia_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>Amount Financed</i></b></td>
						<td><input type="text" name="lithia_price1" value="<?php echo isset($info['lithia_price1']) ? $info['lithia_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="lithia_price2" value="<?php echo isset($info['lithia_price2']) ? $info['lithia_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="lithia_price3" value="<?php echo isset($info['lithia_price3']) ? $info['lithia_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
				</table>
				
				<table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
					<tr>
						<td colspan="4" style="text-align: left;"><b>Loan Payments</b></td>
					</tr>
					<tr>
						<td style="text-align: left; border-right: 0px;"><b><i>CASH DOWN</i></b></td>
						<td style="text-align: right; border-right: 0px;"><b><i>.00</i></b></td>
						<td style="text-align: right; border-right: 0px;"><b><i>2,500.00</i></b></td>
						<td style="text-align: right;"><b><i>3,500.00</i></b></td>
					</tr>
					
					<tr>
						<td style="text-align: right; width: 35%;"><b><i>48 Months / 3.99</i></b></td>
						<td><input type="text" name="48loan_price1" value="<?php echo isset($info['48loan_price1']) ? $info['48loan_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="48loan_price2" value="<?php echo isset($info['48loan_price2']) ? $info['48loan_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="48loan_price3" value="<?php echo isset($info['48loan_price3']) ? $info['48loan_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>60 Months / 3.99</i></b></td>
						<td><input type="text" name="60loan_price1" value="<?php echo isset($info['60loan_price1']) ? $info['60loan_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="60loan_price2" value="<?php echo isset($info['60loan_price2']) ? $info['60loan_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="60loan_price3" value="<?php echo isset($info['60loan_price3']) ? $info['60loan_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>72 Months / 4.99</i></b></td>
						<td><input type="text" name="72loan_price1" value="<?php echo isset($info['72loan_price1']) ? $info['72loan_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="72loan_price2" value="<?php echo isset($info['72loan_price2']) ? $info['72loan_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="72loan_price3" value="<?php echo isset($info['72loan_price3']) ? $info['72loan_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="text-align: right;"><b><i>Amount Financed</i></b></td>
						<td><input type="text" name="loan_price1" value="<?php echo isset($info['loan_price1']) ? $info['loan_price1'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="loan_price2" value="<?php echo isset($info['loan_price2']) ? $info['loan_price2'] : ''; ?>" style="width: 80%;"></td>
						<td><input type="text" name="loan_price3" value="<?php echo isset($info['loan_price3']) ? $info['loan_price3'] : ''; ?>" style="width: 80%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: left; width: 40%; box-sizing: border-box; padding: 10px;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="width: 50%; text-align: left;"><label>Selling Price</label></td>
						<td style="width: 50%;"><input type="text" name="selling_price" type="text" id="selling_price" class="price" value="<?php echo isset($info['selling_price']) ? $info['selling_price'] : $info['unit_value']; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Discount</label></td>
						<td style="width: 50%;"><input type="text" name="discount" type="text" id="discount" class="price" value="<?php echo isset($info['discount']) ? $info['discount'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Adjusted Price</label></td>
						<td style="width: 50%;"><input type="text" name="adjust_price1" type="text" id="adjust_price1" class="price" value="<?php echo isset($info['adjust_price1']) ? $info['adjust_price1'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><input type="text" name="adjust1" value="<?php echo isset($info['adjust1']) ? $info['adjust1'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 50%;"><input type="text" name="adjust_price2" type="text" id="adjust_price2" class="price" value="<?php echo isset($info['adjust_price2']) ? $info['adjust_price2'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><input type="text" name="adjust2" value="<?php echo isset($info['adjust2']) ? $info['adjust2'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 50%;"><input type="text" name="adjust_price3" type="text" id="adjust_price3" class="price" value="<?php echo isset($info['adjust_price3']) ? $info['adjust_price3'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><input type="text" name="adjust3" value="<?php echo isset($info['adjust3']) ? $info['adjust3'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 50%;"><input type="text" name="adjust_price4" type="text" id="adjust_price4" class="price" value="<?php echo isset($info['adjust_price4']) ? $info['adjust_price4'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><input type="text" name="adjust4" value="<?php echo isset($info['adjust4']) ? $info['adjust4'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 50%;"><input type="text" name="adjust_price5" type="text" id="adjust_price5" class="price" value="<?php echo isset($info['adjust_price5']) ? $info['adjust_price5'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><input type="text" name="adjust5" value="<?php echo isset($info['adjust5']) ? $info['adjust5'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 50%;"><input type="text" name="adjust_price6" type="text" id="adjust_price6" class="price" value="<?php echo isset($info['adjust_price6']) ? $info['adjust_price6'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;">&nbsp;</td>
						<td style="width: 50%;"><input type="text" name="adjust_price7" type="text" id="adjust_price7" class="price" value="<?php echo isset($info['adjust_price7']) ? $info['adjust_price7'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Trade Allowance</label></td>
						<td style="width: 50%;"><input type="text" name="trade_allowance" type="text" id="trade_allowance" class="price" value="<?php echo isset($info['trade_allowance']) ? $info['trade_allowance'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Trade Payoff</label></td>
						<td style="width: 50%;"><input type="text" name="trade_payoff" type="text" id="trade_payoff" class="price" value="<?php echo isset($info['trade_payoff']) ? $info['trade_payoff'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Trade Difference</label></td>
						<td style="width: 50%;"><input type="text" name="trade_diff" type="text" id="trade_diff" class="price" value="<?php echo isset($info['trade_diff']) ? $info['trade_diff'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Doc Fee</label></td>
						<td style="width: 50%;"><input type="text" name="doc_fee" type="text" id="doc_fee" class="price" value="150" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Tax (Estimated)</label></td>
						<td style="width: 50%;"><input type="text" name="tax" type="text" id="tax" class="price" value="<?php echo isset($info['tax']) ? $info['tax'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Reg Fees</label></td>
						<td style="width: 50%;"><input type="text" name="reg_fee" type="text" id="reg_fee" class="price" value="8475" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Gap</label></td>
						<td style="width: 50%;"><input type="text" name="gap" type="text" id="gap" class="price" value="899" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>FESC</label></td>
						<td style="width: 50%;"><input type="text" name="fesc" type="text" id="fesc" class="price" value="2995" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>LOF</label></td>
						<td style="width: 50%;"><input type="text" name="lof" type="text" id="lof" class="price" value="<?php echo isset($info['lof']) ? $info['lof'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: left;"><label>Unpaid Balance</label></td>
						<td style="width: 50%;"><input type="text" name="unpaid" type="text" id="unpaid" class="price" value="<?php echo isset($info['unpaid']) ? $info['unpaid'] : ''; ?>" style="width: 100%; text-align: right;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 0;">
				<label>Customer Approval:</label>
				<input type="text" name="customer_app" value="<?php echo isset($info['customer_app']) ? $info['customer_app'] : ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 0;">
				<label>Management Approval:</label>
				<input type="text" name="management_app" value="<?php echo isset($info['management_app']) ? $info['management_app'] : ''; ?>" style="width: 68%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 12px; margin: 3px 0;">I understand that I may obtain my own financing. I also understand the annual percentage rate may be negotlated with the seller and that the seller may retain a portion of the finance charge or receive other compensation for arranging my financing. Subject to credit approval.</p>
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
		calculate_totalinvoice();
	});

		var selling_price = isNaN(parseFloat( $('#selling_price').val()))?0.00:parseFloat($('#selling_price').val());
		var adjust_price1 = isNaN(parseFloat( $('#adjust_price1').val()))?0.00:parseFloat($('#adjust_price1').val());
		var discount = selling_price-adjust_price1;
		$("#discount").val(discount.toFixed(2));
		
		var adjust_price2 = isNaN(parseFloat( $('#adjust_price2').val()))?0.00:parseFloat($('#adjust_price2').val());
		var adjust_price3 = isNaN(parseFloat( $('#adjust_price3').val()))?0.00:parseFloat($('#adjust_price3').val());
		var adjust_price4 = isNaN(parseFloat( $('#adjust_price4').val()))?0.00:parseFloat($('#adjust_price4').val());
		var adjust_price5 = isNaN(parseFloat( $('#adjust_price5').val()))?0.00:parseFloat($('#adjust_price5').val());
		var adjust_price6 = isNaN(parseFloat( $('#adjust_price6').val()))?0.00:parseFloat($('#adjust_price6').val());
		var adjust_price7 = adjust_price1 + adjust_price2 + adjust_price3 + adjust_price4 + adjust_price5 + adjust_price6;
		$("#adjust_price7").val(adjust_price7.toFixed(2));

		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var trade_diff = adjust_price7 - trade_allowance + trade_payoff;
		$("#trade_diff").val(trade_diff.toFixed(2));
		var tax = (adjust_price7 * 8.1)/100 - trade_allowance;
		$("#tax").val(tax.toFixed(2));

		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		
		var gap = isNaN(parseFloat( $('#gap').val()))?0.00:parseFloat($('#gap').val());
		var fesc = isNaN(parseFloat( $('#fesc').val()))?0.00:parseFloat($('#fesc').val());
		var reg_fee = isNaN(parseFloat( $('#reg_fee').val()))?0.00:parseFloat($('#reg_fee').val());
		var lof = isNaN(parseFloat( $('#lof').val()))?0.00:parseFloat($('#lof').val());
		var unpaid = trade_diff + doc_fee + tax + reg_fee + gap + fesc + lof;
		$("#unpaid").val(unpaid.toFixed(2));

	function calculate_totalinvoice() {
		var selling_price = isNaN(parseFloat( $('#selling_price').val()))?0.00:parseFloat($('#selling_price').val());
		var adjust_price1 = isNaN(parseFloat( $('#adjust_price1').val()))?0.00:parseFloat($('#adjust_price1').val());
		var discount = selling_price-adjust_price1;
		$("#discount").val(discount.toFixed(2));
		
		var adjust_price2 = isNaN(parseFloat( $('#adjust_price2').val()))?0.00:parseFloat($('#adjust_price2').val());
		var adjust_price3 = isNaN(parseFloat( $('#adjust_price3').val()))?0.00:parseFloat($('#adjust_price3').val());
		var adjust_price4 = isNaN(parseFloat( $('#adjust_price4').val()))?0.00:parseFloat($('#adjust_price4').val());
		var adjust_price5 = isNaN(parseFloat( $('#adjust_price5').val()))?0.00:parseFloat($('#adjust_price5').val());
		var adjust_price6 = isNaN(parseFloat( $('#adjust_price6').val()))?0.00:parseFloat($('#adjust_price6').val());
		var adjust_price7 = adjust_price1 + adjust_price2 + adjust_price3 + adjust_price4 + adjust_price5 + adjust_price6;
		$("#adjust_price7").val(adjust_price7.toFixed(2));

		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var trade_diff = adjust_price7 - trade_allowance + trade_payoff;
		$("#trade_diff").val(trade_diff.toFixed(2));
		var tax = (adjust_price7 * 8.1)/100 - trade_allowance;
		$("#tax").val(tax.toFixed(2));

		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		
		var gap = isNaN(parseFloat( $('#gap').val()))?0.00:parseFloat($('#gap').val());
		var fesc = isNaN(parseFloat( $('#fesc').val()))?0.00:parseFloat($('#fesc').val());
		var reg_fee = isNaN(parseFloat( $('#reg_fee').val()))?0.00:parseFloat($('#reg_fee').val());
		var lof = isNaN(parseFloat( $('#lof').val()))?0.00:parseFloat($('#lof').val());
		var unpaid = trade_diff + doc_fee + tax + reg_fee + gap + fesc + lof;
		$("#unpaid").val(unpaid.toFixed(2));
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
