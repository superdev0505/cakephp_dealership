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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="logo" style="float: left; width: 15%; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: left; width: 83%">
				<h2 style="text-align: center; margin: 36px 0;"> <b>Opportunity Worksheet</b></h2>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 7px;">
			<div class="form-field" style="float: left; width: 69%;">
				<label><b>Sales Person:</b></label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="float: right; width: 85%;">
			</div>
			<div class="form-field" style="float: right; width: 29%;">
				<label><b>Date:</b></label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="float: right; width: 80%;">
			</div>
		</div>
		
		
		
		<div class="cover" style="float: left; width: 100%; padding: 5px 10px 10px; box-sizing: border-box; border: 1px solid #000;">	
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Last Name:</b></label>
					<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="float: right; width: 83%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Preferred Contact Method:</b></label>
					<span><input type="checkbox" name="contact_status" <?php echo ($info['contact_status'] == "phone") ? "checked" : ""; ?> value="phone" /> <b>Phone</b></span>
					<span style="margin: 0 4%;"><input type="checkbox" name="contact_status" <?php echo ($info['contact_status'] == "email") ? "checked" : ""; ?> value="email" /> <b>email</b></span>
					<span><input type="checkbox" name="contact_status" <?php echo ($info['contact_status'] == "letter") ? "checked" : ""; ?> value="letter" /> <b>letter</b></span>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>First Name:</b></label>
					<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="float: right; width: 83%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Nickname:</b></label>
					<input type="text" name="nickname" value="<?php echo isset($info['nickname'])?$info['nickname']:''; ?>" style="float: right; width: 83%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Address1:</b></label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="float: right; width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Daytime Phone:</b></label>
					<input type="text" name="daytime" value="<?php echo isset($info['daytime'])?$info['daytime']:''; ?>" style="float: right; width: 77%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Address2:</b></label>
					<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="float: right; width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Evening Phone:</b></label>
					<input type="text" name="even_phone" value="<?php echo isset($info['even_phone'])?$info['even_phone']:''; ?>" style="float: right; width: 77%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>City:</b></label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="float: right; width: 91%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Mobile Phone:</b></label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="float: right; width: 78%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>State:</b></label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="float: right; width: 91%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Email Address:</b></label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="float: right; width: 78%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Zip:</b></label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="float: right; width: 93%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Oppt Source:</b></label>
					<input type="text" name="oppt" value="<?php echo isset($info['oppt'])?$info['oppt']:''; ?>" style="float: right; width: 80%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>DL#:</b></label>
					<input type="text" name="dl_num" value="<?php echo isset($info['dl_num'])?$info['dl_num']:''; ?>" style="float: right; width: 91%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; margin-left: 2%;">
					<label><b>Birth date:</b></label>
					<input type="text" name="birth" value="<?php echo isset($info['birth'])?$info['birth']:''; ?>" style="float: right; width: 66%;">
				</div>
				<div class="form-field" style="float: right; width: 23%;">
					<label><b>Gender:</b></label>
					<span style="margin: 0 5%;"><input type="checkbox" name="gender_status" <?php echo ($info['gender_status'] == "male") ? "checked" : ""; ?> value="male" /> <b>male</b></span>
					<span><input type="checkbox" name="gender_status" <?php echo ($info['gender_status'] == "female") ? "checked" : ""; ?> value="female" /> <b>female</b></span>
				</div>
			</div>
			
		</div>

		<div class="cover" style="float: left; width: 100%; padding: 0px 5px 0; box-sizing: border-box; border: 1px solid #000; margin-top: 10px;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 50%; border-right: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<h3 style="float: left; font-size: 15px; margin: 0 0 4px; width: 100%;"><b>Vehicle Purchase:</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Make:</b></label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="float: right; width: 79%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Selling Price:</b></label>
						<input type="text" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="float: right; width: 60%;">
					</div>
				</div>
			
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Model:</b></label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="float: right; width: 78%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>P&A: </b></label>
						<input type="text" name="pa" value="<?php echo isset($info['pa'])?$info['pa']:''; ?>" style="float: right; width: 80%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Year:</b></label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="float: right; width: 81%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Gen. Merch</b></label>
						<input type="text" name="merch" value="<?php echo isset($info['merch'])?$info['merch']:''; ?>" style="float: right; width: 62%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Color:</b></label>
						<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="float: right; width: 77%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Tax, Title & Lic:</b></label>
						<input type="text" name="tax_title" value="<?php echo isset($info['tax_title'])?$info['tax_title']:''; ?>" style="float: right; width: 52%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>VIN:</b></label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="float: right; width: 83%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Doc Fee:</b></label>
						<input type="text" name="doc_fee" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="float: right; width: 74%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Stock #:</b></label>
						<input type="text" name="stock" value="<?php echo isset($info['stock'])?$info['stock']:''; ?>" style="float: right; width: 75%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Freight:</b></label>
						<input type="text" name="freight" value="<?php echo isset($info['freight'])?$info['freight']:''; ?>" style="float: right; width: 76%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Miles:</b></label>
						<input type="text" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" style="float: right; width: 79%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Total:</b></label>
						<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="float: right; width: 80%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<label><b>Options:</b></label>
						<span><input type="checkbox" name="option_status" <?php echo ($info['option_status'] == "abs") ? "checked" : ""; ?> value="abs" /> <b>abs</b></span>
						<span style="margin: 0 3%"><input type="checkbox" name="option_status" <?php echo ($info['option_status'] == "cruise") ? "checked" : ""; ?> value="cruise" /> <b>cruise</b></span>
						<span style="margin-right: 3%;"><input type="checkbox" name="name"> <b>SEC</b></span>
						<span><input type="checkbox" name="option_status" <?php echo ($info['option_status'] == "other") ? "checked" : ""; ?> value="other" /> <b>Other</b> <input type="text" name="name" style="width: 10%;"></span>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<label><b>Condition:</b></label>
						<span><input type="checkbox" name="condition_status" <?php echo ($info['condition_status'] == "new") ? "checked" : ""; ?> value="new" /> <b>new</b></span>
						<span style="margin: 0 3%"><input type="checkbox" name="condition_status" <?php echo ($info['condition_status'] == "used") ? "checked" : ""; ?> value="used" /> <b>used</b></span>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right" style="float: left; width: 50%; padding: 10px; box-sizing: border-box;">
				<h3 style="float: left; font-size: 15px; margin: 0 0 4px; width: 100%;"><b>Trade-in Vehicle:</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Lienholder:</b></label>
						<input type="text" name="lienholder" value="<?php echo isset($info['lienholder'])?$info['lienholder']:''; ?>" style="float: right; width: 65%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Payoff:</b></label>
						<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="float: right; width: 76%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Make:</b></label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="float: right; width: 79%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Mileage: </b></label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="float: right; width: 74%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Model:</b></label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="float: right; width: 78%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>ESP </b></label>
						<span style="margin: 0 4%;"><input type="checkbox" name="esp_status" <?php echo ($info['esp_status'] == "new") ? "checked" : ""; ?> value="new" /> <b>new</b></span>
						<span><input type="checkbox" name="esp_status" <?php echo ($info['esp_status'] == "new") ? "checked" : ""; ?> value="new" /> <b>new</b></span>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Year:</b></label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="float: right; width: 78%;">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Plate #:</b></label>
						<input type="text" name="plate_num" value="<?php echo isset($info['plate_num'])?$info['plate_num']:''; ?>" style="float: right; width: 75%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>Color:</b></label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="float: right; width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>VIN #:</b></label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="float: right; width: 89%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>Trade Allowance:</b></label>
						<input type="text" name="trade_allowance" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" style="float: right; width: 75%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>Condition:</b></label>
						<input type="text" name="condition_trade" value="<?php echo isset($info['condition_trade'])?$info['condition_trade']:''; ?>" style="float: right; width: 84%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>Add'l Equip:</b></label>
						<input type="text" name="equip" value="<?php echo isset($info['equip'])?$info['equip']:''; ?>" style="float: right; width: 81%;">
					</div>
				</div>
			</div>
			<!-- rightside end -->
		</div>
		
		<div class="cover" style="float: left; width: 100%; padding: 0px 5px 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 50%;  padding: 10px; box-sizing: border-box;">
				<h3 style="float: left; font-size: 15px; margin: 0 0 4px; width: 100%;"><b>Method of Payment:</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<span><input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "cash") ? "checked" : ""; ?> value="cash"/> <b>cash</b></span>
						<span style="margin: 0 4%"><input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "check") ? "checked" : ""; ?> value="check"/> <b>check</b></span>
						<span style="margin-right: 4%;"><input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "card") ? "checked" : ""; ?> value="card"/> <b>credit card</b></span>
						<span><input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "finance") ? "checked" : ""; ?> value="finance"/> <b>finance</b> <input name="finance" value="<?php echo isset($info['finance'])?$info['finance']:''; ?>" style="width: 10%;" type="text"></span>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right" style="float: left; width: 50%; padding: 10px; box-sizing: border-box; border-left: 1px solid #000;">
				<h3 style="float: left; font-size: 15px; margin: 0 0 4px; width: 100%;"><b>Down Payment:</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label><b>Amount:</b></label>
						<input name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="float: right; width: 72%;" type="text">
					</div>
					<div class="form-field" style="float: right; width: 49%;">
						<label><b>Percentage:</b></label>
						<input name="percentage" value="<?php echo isset($info['percentage'])?$info['percentage']:''; ?>" style="float: right; width: 65%;" type="text">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<label><b>Monthly Investment:</b></label>
						<span><input type="checkbox" name="month_status" <?php echo ($info['month_status'] == "24") ? "checked" : ""; ?> value="24"/> <b>24</b></span>
						<span style="margin: 0 4%"><input type="checkbox" name="month_status" <?php echo ($info['month_status'] == "36") ? "checked" : ""; ?> value="36"/> <b>36</b></span>
						<span style="margin-right: 4%;"><input type="checkbox" name="month_status" <?php echo ($info['month_status'] == "48") ? "checked" : ""; ?> value="48"/> <b>48</b></span>
						<span><input name="name" type="checkbox"><input name="monthly_invest" value="<?php echo isset($info['monthly_invest'])?$info['monthly_invest']:''; ?>" style="width: 10%;" type="text"></span>
					</div>
				</div>
			</div>
			<!-- rightside end -->
		</div>

		<p style="float: left; width: 100%; margin: 10px 0;">I hearby indicate my intent to purchase a motorcycle. I have available, or can obtain, sufficient funds to complete the transaction. I authorize the dealer
representative to investigate my credit and employment history to evaluate my ability to purchase the above referenced motorcycle.</p>

		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label><b>Customer Authorization:</b></label>
				<input type="text" name="authorize" value="<?php echo isset($info['authorize'])?$info['authorize']:''; ?>" style="width: 65%;">
			</div>
			
			<div class="form-field" style="float: left; width: 23%; margin-left: 2%;">
				<label><b>Date:</b></label>
				<input type="text" name="date1" value="<?php echo isset($info['date1'])?$info['date1']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label><b>Mgr's Initials:</b></label>
				<input type="text" name="initials" value="<?php echo isset($info['initials'])?$info['initials']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label><b>Co-Buyer:</b></label>
				<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer'])?$info['co_buyer']:''; ?>" style="width: 83%;">
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
	
	
     
});

	
	
	
	
	
</script>
</div>
