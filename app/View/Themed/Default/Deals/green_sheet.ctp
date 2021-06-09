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
    <input type="hidden" id="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" name="vin">
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px;}
	td, th{text-align: center; padding: 0px; border-bottom: 1px solid #000;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	tr{height: 30px;}
	table input[type="text"]{border: 0px; text-align: center; font-size: 14px;}
	.cover input[type="text"]{border: 0px;}
	.no-border input[type="text"]{border: 0px;}
	
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 30% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: left; width: 60%;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 85%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Purchaser</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Stock #</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 86%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>D.O.B</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>SS#</label>
				<input type="text" name="ss" value="<?php echo isset($info['ss'])?$info['ss']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Source:</label>
				<label><input type="checkbox" name="source_status" <?php echo ($info['source_status'] == "f") ? "checked" : ""; ?> value="f"/> F</label>
				<label style="margin: 0 5%;"><input type="checkbox" name="source_status" <?php echo ($info['source_status'] == "p") ? "checked" : ""; ?> value="p"/> P</label>
				<label><input type="checkbox" name="source_status" <?php echo ($info['source_status'] == "i") ? "checked" : ""; ?> value="i"/> I</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label>D.L.#</label>
				<input type="text" name="dl" value="<?php echo isset($info['dl'])?$info['dl']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 60%;">
				<label>E-mail</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 91%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Bus. #</label>
				<input type="text" name="bus" value="<?php echo isset($info['bus'])?$info['bus']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Home #</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Cell #</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px;">
				<label><input type="checkbox" name="new_status" <?php echo ($info['new_status'] == "new") ? "checked" : ""; ?> value="new"/> NEW</label>
				<label><input type="checkbox" name="used_status" <?php echo ($info['used_status'] == "used") ? "checked" : ""; ?> value="used"/> USED</label>
				<label><input type="checkbox" name="demo_status" <?php echo ($info['demo_status'] == "demo") ? "checked" : ""; ?> value="demo"/> DEMO</label>
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-left: 1px solid #000; border-right: 1px solid #000;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Color</label>
				<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px;">
				<label>Mileage</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">VIN #</label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
				<label>#CYL</label>
				<input type="text" name="cyl" value="<?php echo isset($info['cyl'])?$info['cyl']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="left" style="width: 33%; float: left; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="width: 70%;">Accessories</td>
						<td>Price</td>
					</tr>
					<tr>
						<td><input type="text" name="access1" value="<?php echo isset($info['access1'])?$info['access1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price1" id="price1" class="price" value="<?php echo isset($info['price1'])?$info['price1']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
					<td><input type="text" name="access2" value="<?php echo isset($info['access2'])?$info['access2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price2" id="price2" class="price" value="<?php echo isset($info['price2'])?$info['price2']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access3" value="<?php echo isset($info['access3'])?$info['access3']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price3" id="price3" class="price" value="<?php echo isset($info['price3'])?$info['price3']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access4" value="<?php echo isset($info['access4'])?$info['access4']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price4" id="price4" class="price" value="<?php echo isset($info['price4'])?$info['price4']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access5" value="<?php echo isset($info['access5'])?$info['access5']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price5" id="price5" class="price" value="<?php echo isset($info['price5'])?$info['price5']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access6" value="<?php echo isset($info['access6'])?$info['access6']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price6" id="price6" class="price" value="<?php echo isset($info['price6'])?$info['price6']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access7" value="<?php echo isset($info['access7'])?$info['access7']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price7" id="price7" class="price" value="<?php echo isset($info['price7'])?$info['price7']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access8" value="<?php echo isset($info['access8'])?$info['access8']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price8" id="price8" class="price" value="<?php echo isset($info['price8'])?$info['price8']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access9" value="<?php echo isset($info['access9'])?$info['access9']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price9" id="price9" class="price" value="<?php echo isset($info['price9'])?$info['price9']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access10" value="<?php echo isset($info['access10'])?$info['access10']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price10" id="price10" class="price" value="<?php echo isset($info['price10'])?$info['price10']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="access11" value="<?php echo isset($info['access11'])?$info['access11']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price11" id="price11" class="price" value="<?php echo isset($info['price11'])?$info['price11']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Total Accessories & Labor</td>
						<td><input type="text" name="total_access" id="total_access" class="price" value="<?php echo isset($info['total_access'])?$info['total_access']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><b>Administrative Fee<sup>*</sup></b></td>
						<td><b>$<input type="text" name="admin_fee" id="admin_fee" class="price" value="<?php echo isset($info['admin_fee'])?$info['admin_fee']:''; ?>" style="width: 70%;"></b></td>
					</tr>
					<tr>
						<td>Total</td>
						<td><input type="text" name="total" id="total" class="price" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			
			<div class="center-section" style="float: left; width: 34%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="upper" style="width: 100%; border-bottom: 1px solid #000; float: left; padding-bottom: 30%;">
					<div class="left" style="width: 50%; float: left; border-right: 1px solid #000; box-sizing: border-box; border-bottom: 1px solid #000; padding-bottom: 30px;">
						<label>Sales Price</label>
						<input type="text" name="sales_price" value="<?php echo isset($info['sales_price'])?$info['sales_price']:''; ?>" style="width: 100%;">
					</div>
					<div class="right" style="width: 48%; float: right; box-sizing: border-box; padding-bottom: 30px;">
						<div class="form-field" style="float: left; width: 100%;">
							<label style="display: block;">Freight</label>
							$ <input type="text" name="freight" value="<?php echo isset($info['freight'])?$info['freight']:''; ?>" style="width: 90%; border-bottom: 1px solid #000;">
						</div>
						<div class="form-field" style="float: left; width: 100%;">
							<label style="display: block;">Assembly/Prep</label>
							$ <input type="text" name="assembly" value="<?php echo isset($info['assembly'])?$info['assembly']:''; ?>" style="width: 90%; border-bottom: 1px solid #000;">
						</div>
					</div>
				</div>
				
				<div class="lower" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Banks like to see 1/3 down $</label>
						<input type="text" name="bank" value="<?php echo isset($info['bank'])?$info['bank']:''; ?>" style="width: 30%; border-bottom: 1px solid #000;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin-top: 55%;">
						<label>Down Payment</label>
						<input type="text" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
						<label>up to</label>
						<input type="text" name="up_to" value="<?php echo isset($info['up_to'])?$info['up_to']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: left; width: 33%; margin: 0; box-sizing: border-box;">
				<div class="upper" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;     margin-bottom: 22.2%;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Trade Yr</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label>Make</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Model</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 84%; border-bottom: 1px solid #000;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Mileage</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 81%; border-bottom: 1px solid #000;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Payoff</label>
							<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade'])?$info['payoff_trade']:''; ?>" style="width: 84%; border-bottom: 1px solid #000;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Lien Holder</label>
							<input type="text" name="lien_trade" value="<?php echo isset($info['lien_trade'])?$info['lien_trade']:''; ?>" style="width: 74.3%; border-bottom: 1px solid #000;">
						</div>
					</div>
				</div>
				
				<div class="down" style="float: left; width: 100%; box-sizing: border-box; border-top: 1px solid #000; padding: 5px;">
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label style="float: left;">Payment Source</label>
							<label style="margin: 0 3%;"><input type="checkbox" name="cs_status" <?php echo ($info['cs_status'] == "cs") ? "checked" : ""; ?> value="cs"/>CS</label>
							<label><input type="checkbox" name="ck_status" <?php echo ($info['ck_status'] == "ck") ? "checked" : ""; ?> value="ck"/>CK</label>
							<label style="margin: 0 3%;"><input type="checkbox" name="cc_status" <?php echo ($info['cc_status'] == "cc") ? "checked" : ""; ?> value="cc"/>CC</label>
							<label><input type="checkbox" name="other_status" <?php echo ($info['other_status'] == "other") ? "checked" : ""; ?> value="other"/>Other</label><br> or <br> <label style="width: 100%;">Monthly Payment</label>
							<input type="text" name="month_up" value="<?php echo isset($info['month_up'])?$info['month_up']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> up to <input type="text" name="month_to" value="<?php echo isset($info['month_to'])?$info['month_to']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<p style="float: left; width: 100%; margin: 4px 0; font-size: 15px;"><b>*An administrative fee is not an official fee and is not required by law but may be charged by a dealer. This administrative fee may result in a profit to dealer. No portion of this administrative fee is for the drafting, preparation, or completion of documents or the
providing of legal advise. This notice is required by law.</b></p>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%">
				<label>Finance with us</label>
				<label><input type="radio" name="finance_status" value="yes" <?php echo (isset($info['finance_status']) && $info['finance_status']=='yes')?'checked="checked"':''; ?> /> Y</label>
				<label><input type="radio" name="finance_status" value="no" <?php echo (isset($info['finance_status']) && $info['finance_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			
			<div class="form-field" style="float: left; width: 75%">
				<label>Loan Source</label>
				<input type="text" name="loan_source" value="<?php echo isset($info['loan_source'])?$info['loan_source']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%">
				&nbsp;
			</div>
			
			<div class="form-field" style="float: left; width: 45%">
				<label>Other payment source</label>
				<input type="text" name="other_pay" value="<?php echo isset($info['other_pay'])?$info['other_pay']:''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 30%">
				<label>Walk Approval</label>
				<input type="text" name="walk_app" value="<?php echo isset($info['walk_app'])?$info['walk_app']:''; ?>" style="width: 69%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>Dealership Approval</label>
				<input type="text" name="dealer_app" value="<?php echo isset($info['dealer_app'])?$info['dealer_app']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%">
				<label>Customer Approval</label>
				<input type="text" name="customer_app" value="<?php echo isset($info['customer_app'])?$info['customer_app']:''; ?>" style="width: 75%;">
			</div>
		</div>
		
		
		
		<div class="row no-border second-page" style="width: 100%; margin: 7px 0; float: left;">
			<div class="logo" style="float: left; width: 25%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/family.png'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Primary use of unit?</p>
					<textarea name="primary_unit" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['primary_unit'])?$info['primary_unit']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">What are you riding now?</p>
					<textarea name="riding" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['riding'])?$info['riding']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">What brand / cycle do you know most about? Like?</p>
					<textarea name="cycle" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['cycle'])?$info['cycle']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Are you considering both <i>New or Used bikes?</i></p>
					<textarea name="bikes" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['bikes'])?$info['bikes']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Have you found something close to what you are looking for?</p>
					<textarea name="looking" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['looking'])?$info['looking']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">How did you decide that is the best for you?</p>
					<textarea name="decide" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['decide'])?$info['decide']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Have you ridden the unit you are considering?</p>
					<textarea name="considering" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['considering'])?$info['considering']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Have you ridden some other brands?</p>
					<textarea name="brands" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['brands'])?$info['brands']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">Have you set an <i>investment amount</i> for your purchase?</p>
					<textarea name="purchase" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['purchase'])?$info['purchase']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;"><i>Why haven’t you bought yet?</i> Is it the bike, the price, the down payment, the payment?</p>
					<textarea name="down_payment" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['down_payment'])?$info['down_payment']:''; ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<p style="font-size: 16px; margin: 0; float: left; width: 100%;">what is the specific reason a decision cannot be reached and what is the next action to help satisfy the customer?</p>
					<textarea name="satisfy" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['satisfy'])?$info['satisfy']:''; ?></textarea>
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


	var vin = $('#vin').val();
	var res = vin.split("");
	for (var i = 0; i <= 15; i++) {
		$("#vin" + i).val(res[i]);
	}


	$(".price").on('change keyup paste', function(){
		calculate_totalinvoice();
	});

	function calculate_totalinvoice() {
		var price1 = isNaN(parseFloat( $('#price1').val()))?0.00:parseFloat($('#price1').val());
		var price2 = isNaN(parseFloat( $('#price2').val()))?0.00:parseFloat($('#price2').val());
		var price3 = isNaN(parseFloat( $('#price3').val()))?0.00:parseFloat($('#price3').val());
		var price4 = isNaN(parseFloat( $('#price4').val()))?0.00:parseFloat($('#price4').val());
		var price5 = isNaN(parseFloat( $('#price5').val()))?0.00:parseFloat($('#price5').val());
		
		var price6 = isNaN(parseFloat( $('#price6').val()))?0.00:parseFloat($('#price6').val());
		var price7 = isNaN(parseFloat( $('#price7').val()))?0.00:parseFloat($('#price7').val());
		var price8 = isNaN(parseFloat( $('#price8').val()))?0.00:parseFloat($('#price8').val());
		var price9 = isNaN(parseFloat( $('#price9').val()))?0.00:parseFloat($('#price9').val());
		var price10 = isNaN(parseFloat( $('#price10').val()))?0.00:parseFloat($('#price10').val());
		var price11 = isNaN(parseFloat( $('#price11').val()))?0.00:parseFloat($('#price11').val());
		var total_access = price1 + price2 + price3 + price4 + price5 + price6 + price7 + price8 + price9 + price10 + price11;
		$("#total_access").val(total_access.toFixed(2));
		var admin_fee = isNaN(parseFloat( $('#admin_fee').val()))?0.00:parseFloat($('#admin_fee').val());
		var total = total_access + admin_fee;
		$("#total").val(total.toFixed(2));
	}

	//calculate();
});
	
</script>
</div>
