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
	<div id="worksheet_container" style="width: 1030px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	table th, table td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 7px;}
	ul {margin: 0 0 0 26px;}
	li{list-style: square;}
@media print {
	.bg{background: #000000 !important;}
	.left{background: #000 !important;}
	 h2 {margin: 5px 0 !important;}
	.row {margin: 3px 0 !important;}
	.second-page{margin-top: 76% !important; display: block;}
	.line {height: 403px !important;}
	.payoff {margin-top: 15px !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px;">CUSTOMER PREFERENCE</h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: right; width: 40%">
				<label>SALESPERSON</label>
				<input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 72%">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px; background-color: #555; color: #fff; padding: 5px 0;">CUSTOMER PREFERENCE</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%">
				<label>NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 86%">
			</div>
			<div class="form-field" style="float: left; width: 20%">
				<label>H PH</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 76%">
			</div>
			<div class="form-field" style="float: left; width: 20%">
				<label>DAY PH</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 67%">
			</div>
			<div class="form-field" style="float: right; width: 20%">
				<label>CELL</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 77%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 20%">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 77%">
			</div>
			<div class="form-field" style="float: left; width: 20%">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 71%">
			</div>
			<div class="form-field" style="float: left; width: 20%">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 83%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>EMAIL</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 86%">
			</div>
			<div class="form-field" style="float: left; width: 50%">
				<label>DEAL NUMBER</label>
				<input type="text" name="deal_number" value="<?php echo isset($info['deal_number']) ? $info['deal_number'] : ''; ?>" style="width: 76%">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px; background-color: #555; color: #fff; padding: 5px 0;">VEHICLE SELECTED</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 35%">
				<label>NEW / USED YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 60%">
			</div>
			<div class="form-field" style="float: left; width: 32%">
				<label>BRAND</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 76%">
			</div>
			<div class="form-field" style="float: left; width: 33%">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 81%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%">
				<label>COLOR</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 68%">
			</div>
			<div class="form-field" style="float: left; width: 50%">
				<label>STOCK NUMBER</label>
				<input type="text" name="stock_num" value="<?php echo isset($info["stock_num"]) ? $info['stock_num'] : '';?>" style="width: 75%">
			</div>
			<div class="form-field" style="float: left; width: 30%">
				<label>DELIVERY DATE</label>
				<input type="text" name="deli_date" value="<?php echo isset($info['deli_date']) ? $info['deli_date'] : ''; ?>" style="width: 58%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border: 1px solid #000;">
			<div class="one-fourth line" style="float: left; width: 25%; border-right: 1px solid #000;  box-sizing: border-box; height: 390px;">
				<h3 style="background-color: #000; color: #fff; margin: 0; padding: 10px 7px; font-size: 18px; border-bottom: 1px solid #000;">1. Trade-In</h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>YR</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>BRAND/Model</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 51%">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Miles</label>
						<input type="text" name="miles_trade" value="<?php echo isset($info['miles_trade']) ? $info['miles_trade'] : ''; ?>" style="width: 74%">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<label>Color</label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 73%">
				</div>
				
				<h3 style="float: left; width: 18%; margin: 15px 0 2px; font-size: 14px; padding-left: 3px; font-weight: normal">Payoff:</h3>
				<div class="row" style="float: left; width: 65%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field payoff" style="float: left; width: 118%;">
						<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 93%">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Lender</label>
						<input type="text" name="lender" value="<?php echo isset($info['lender']) ? $info['lender'] : ''; ?>" style="width: 77%">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Market Value<sup>*</sup></label>
						<input type="text" name="market" value="<?php echo isset($info['market']) ? $info['market'] : ''; ?>" style="width: 60%">
						<p style="font-size: 14px; margin: 4px 0;"><sup>*</sup>This is the average dollar value of vehicles similar to your make and model.</p>
						<p style="font-size: 14px; margin: 4px 0 66px;"><input type="checkbox" name="tran_check" <?php echo ($info['tran_check'] == "tran_check") ? "checked" : ""; ?> value="tran_check"/> Check for a transferrable extended service contract and/or PM.</p>
					</div>
				</div>
			</div>
			<div class="one-fourth" style="float: left; width: 25%;  box-sizing: border-box;">
				<h3 style="background-color: #000; color: #fff; margin: 0; padding: 10px 7px; font-size: 18px; border-bottom: 1px solid #000;">2. Selling Price</h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Selling Price $</label>
						<input type="text" name="selling_price1" value="<?php echo isset($info['selling_price1']) ? $info['selling_price1'] : ''; ?>" style="width: 60%">
						<input type="text" name="selling_price2" value="<?php echo isset($info['selling_price2']) ? $info['selling_price2'] : ''; ?>" style="width: 60%; margin-left: 93px;border-bottom: 0px;">
						<input type="text" name="selling_price3" value="<?php echo isset($info['selling_price3']) ? $info['selling_price3'] : ''; ?>" style="width: 60%;margin-left: 93px;border-bottom: 0px;">
						<input type="text" name="selling_price4" value="<?php echo isset($info['selling_price4']) ? $info['selling_price4'] : ''; ?>" style="width: 60%;margin-left: 93px;border-bottom: 0px;">
						<input type="text" name="selling_price5" value="<?php echo isset($info['selling_price5']) ? $info['selling_price5'] : ''; ?>" style="width: 60%;margin-left: 93px;border-bottom: 0px;">
					</div>
				</div>
			</div>
			<div class="one-fourth" style="float: left; width: 25%; border-left: 1px solid #000; border-right: 1px solid #000;  box-sizing: border-box;">
				<h3 style="background-color: #000; color: #fff; margin: 0; padding: 10px 7px; font-size: 18px; border-bottom: 1px solid #000;">3. Initial Investment</h3>
				<p style="float: left; width: 100%; font-size: 14px; padding: 3px 6px; box-sizing: border-box; margin: 0; border-bottom: 1px solid #000;">Lenders may requires as much as 30% cash down in addition to the equity in your trade-in. Select your preferred down payment.</p>
				
				<div class="outer" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 10px; border-right: 1px solid #000; height: 281px;">
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini1_check" <?php echo ($info['ini1_check'] == "ini1_check") ? "checked" : ""; ?> value="ini1_check"/> $5,000</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini2_check" <?php echo ($info['ini2_check'] == "ini2_check") ? "checked" : ""; ?> value="ini2_check"/> $4,500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini3_check" <?php echo ($info['ini3_check'] == "ini3_check") ? "checked" : ""; ?> value="ini3_check"/> $4,000</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini4_check" <?php echo ($info['ini4_check'] == "ini4_check") ? "checked" : ""; ?> value="ini4_check"/> $3,500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini5_check" <?php echo ($info['ini5_check'] == "ini5_check") ? "checked" : ""; ?> value="ini5_check"/> $3,000</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini6_check" <?php echo ($info['ini6_check'] == "ini6_check") ? "checked" : ""; ?> value="ini6_check"/> $2,500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini7_check" <?php echo ($info['ini7_check'] == "ini7_check") ? "checked" : ""; ?> value="ini7_check"/> $2,000</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini8_check" <?php echo ($info['ini8_check'] == "ini8_check") ? "checked" : ""; ?> value="ini8_check"/> $1,500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini9_check" <?php echo ($info['ini9_check'] == "ini9_check") ? "checked" : ""; ?> value="ini9_check"/> $1,000</span>
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 10px;">
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini10_check" <?php echo ($info['ini10_check'] == "ini10_check") ? "checked" : ""; ?> value="ini10_check"/> $900</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini11_check" <?php echo ($info['ini11_check'] == "ini11_check") ? "checked" : ""; ?> value="ini11_check"/> $800</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini12_check" <?php echo ($info['ini12_check'] == "ini12_check") ? "checked" : ""; ?> value="ini12_check"/> $700</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini13_check" <?php echo ($info['ini13_check'] == "ini13_check") ? "checked" : ""; ?> value="ini13_check"/> $600</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini14_check" <?php echo ($info['ini14_check'] == "ini14_check") ? "checked" : ""; ?> value="ini14_check"/> $500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini15_check" <?php echo ($info['ini15_check'] == "ini15_check") ? "checked" : ""; ?> value="ini15_check"/> $400</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini16_check" <?php echo ($info['ini16_check'] == "ini16_check") ? "checked" : ""; ?> value="ini16_check"/> $300</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini17_check" <?php echo ($info['ini17_check'] == "ini17_check") ? "checked" : ""; ?> value="ini17_check"/> $200</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $100</span>
					</div>
				</div>
				
				
			</div>
			<div class="one-fourth" style="float: left; width: 25%; box-sizing: border-box;">
				<h3 class="bg" style="background-color: #000; color: #fff; margin: 0; padding: 10px 7px; font-size: 18px; border-bottom: 1px solid #000;">4. Monthly Payment</h3>
				<p style="float: left; width: 100%; font-size: 14px; padding: 11px 6px; box-sizing: border-box; margin: 0; border-bottom: 1px solid #000;">This is NOT a quote. Please select your preferred monthly payment from the selections below.</p>
				
				<div class="outer" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 10px; border-right: 1px solid #000; height: 281px;">
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $550</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $500</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $475</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $450</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $425</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $400</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $375</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $350</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $325</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini18_check" <?php echo ($info['ini18_check'] == "ini18_check") ? "checked" : ""; ?> value="ini18_check"/> $300</span>
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px 10px;">
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini19_check" <?php echo ($info['ini19_check'] == "ini19_check") ? "checked" : ""; ?> value="ini19_check"/> $275</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini20_check" <?php echo ($info['ini20_check'] == "ini20_check") ? "checked" : ""; ?> value="ini20_check"/> $250</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini21_check" <?php echo ($info['ini21_check'] == "ini21_check") ? "checked" : ""; ?> value="ini21_check"/> $225</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini22_check" <?php echo ($info['ini22_check'] == "ini22_check") ? "checked" : ""; ?> value="ini22_check"/> $200</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini23_check" <?php echo ($info['ini23_check'] == "ini23_check") ? "checked" : ""; ?> value="ini23_check"/> $175</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini24_check" <?php echo ($info['ini24_check'] == "ini24_check") ? "checked" : ""; ?> value="ini24_check"/> $150</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini25_check" <?php echo ($info['ini25_check'] == "ini25_check") ? "checked" : ""; ?> value="ini25_check"/> $125</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini26_check" <?php echo ($info['ini26_check'] == "ini26_check") ? "checked" : ""; ?> value="ini26_check"/> $100</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini27_check" <?php echo ($info['ini27_check'] == "ini27_check") ? "checked" : ""; ?> value="ini27_check"/> $75</span>
						<span style="display: block; margin: 0 0 2px;"><input type="checkbox" name="ini28_check" <?php echo ($info['ini28_check'] == "ini28_check") ? "checked" : ""; ?> value="ini28_check"/> $50</span>
					</div>
			</div>
		</div>
	</div>
	<p>I certify that the above information is complete and accurate, and confirms my commitment to purchase this product.</p>
	<div class="row" style="float: left; width: 100%; margin: 20px 0;">
		<div class="form-field" style="float: left; width: 45%; margin: 0;">
			<input type="text" name="custom_app" value="<?php echo isset($info['custom_app']) ? $info['custom_app'] : ''; ?>" style="float: right; width: 60%; margin-bottom: 2px;">
			<label style="margin-left: 65px;">Customer Approval</label>
		</div>
		<div class="form-field" style="float: left; width: 47%; margin: 0; margin-bottom: 2px;">
			<input type="text" name="dealer_app" value="<?php echo isset($info['dealer_app']) ? $info['dealer_app'] : ''; ?>" style="float: right; width: 56%;">
			<label style="margin-left: 85px;">Dealership Approval</label>
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
});
</script>
</div>
