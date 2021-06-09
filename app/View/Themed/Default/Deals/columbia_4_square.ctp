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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 90%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	/*td:first-child, th:first-child{border-left: 1px solid #000;}*/
	td:last-child, th:last-child{border-right: 0px;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	.right table{border: 0px;}
	.right table td{border: 0px; padding: 2px;}
	.right input[type="text"]{border-bottom: 1px solid #000;}
	.vin input  {text-align: center;}
	.no-border input[type="text"]{border: 0px;}	
	.bg{background-color: #000; color: #fff; text-align: left; padding: 12px 16px; font-size: 18px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 7.6% !important;}
	.wraper.main input {padding: 0px !important;}
	.bottom_title {margin-top: -145px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="right" style="float: right; width: 30%">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Date:</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Email:</label>
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : "" ?>" style="width: 80%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>NAME</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>SALESPERSON</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>PHONE</label>
				<input type="text" name="phone" value="<?php $phone = $info['phone']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $cleaned;  ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 3px 0 0; box-sizing: border-box; border-top: 1px solid; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>MILEAGE</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="float: left; width: 100%;">
			</div>
			<div class="form-field vin" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">V.I.N</label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 6%; border-right: 1px solid #000;">
			</div>
		</div>
	
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px; border-top: 1px solid #000;">
				<label>STOCK NO.</label>
				<div class="right" style="float: right; width: 50%;">
					<label style="display: block;"><input type="checkbox" name="new_check" <?php echo ($info['new_check'] == "new") ? "checked" : ""; ?> value="new"/> NEW</label> 
					<label style="display: block;"><input type="checkbox" name="used_check" <?php echo ($info['used_check'] == "used") ? "checked" : ""; ?> value="used"/> USED</label> 
					<label style="display: block;"><input type="checkbox" name="demo_check" <?php echo ($info['demo_check'] == "demo") ? "checked" : ""; ?> value="demo"/> DEMO</label> 
				</div>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 3px; border: 1px solid #000; height: 87px; border-bottom: 0px solid;">
				<label style="display: block; text-align: center;">Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%; border-right: 1px solid #0000; text-align: center;">
			</div>
			<div class="form-field" style="float: left; height: 87px; width: 20%; box-sizing: border-box; padding: 3px; border-top: 1px solid;">
				<label style="display: block; text-align: center;">MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:100%; border-right: 1px solid #0000; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 28%; height: 87px; box-sizing: border-box; padding: 3px; border: 1px solid #000; border-bottom: 0px solid;">
				<label style="display: block; text-align: center;">MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%; border-right: 1px solid #0000; text-align: center;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-top: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000; height: 330px;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td style="height: 53px;">
							<label style="margin-top: 10px;"><b>PRICE</b><label>
							<input type="text" name="price1" value="<?php echo isset($info['price1'])?$info['price1']:''; ?>" style="width: 60%;">
						</td>
						<td><input type="text" name="price2" value="<?php echo isset($info['price2'])?$info['price2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price3" value="<?php echo isset($info['price3'])?$info['price3']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="price4" value="<?php echo isset($info['price4'])?$info['price4']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price5" value="<?php echo isset($info['price5'])?$info['price5']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price6" value="<?php echo isset($info['price6'])?$info['price6']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>
							<label style="margin-bottom: 3px;"><b>ADDITIONAL ACCESSORIES</b><label>
							<input type="text" name="access1" value="<?php echo isset($info['access1'])?$info['access1']:''; ?>" style="width: 100%;">
						</td>
						<td><input type="text" name="access2" value="<?php echo isset($info['access2'])?$info['access2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="access3" value="<?php echo isset($info['access3'])?$info['access3']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="right1" style="float: left; width: 50%; box-sizing: border-box; border: 0px; padding: 0px;">
				<h2 style="float: left; width: 100%; margin: 0; text-align: center; font-size: 18px; border-bottom: 1px solid #000;"><b>TRADE-IN INFORMATION</b></h2>
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td style="text-align: center;"><b>YEAR</b></td>
						<td style="text-align: center;"><b>MAKE</b></td>
						<td style="text-align: center;"><b>CYL</b></td>
						<td style="text-align: center;"><b>BODY STYLE</b></td>
					</tr>
					<tr>
						<td><input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%; text-align: center;"></td>
						<td><input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%; text-align: center;"></td>
						<td><input type="text" name="cyl" value="<?php echo isset($info['cyl'])?$info['cyl']:''; ?>" style="width: 100%; text-align: center;"></td>
						<td><input type="text" name="body_style" value="<?php echo isset($info['body_style'])?$info['body_style']:''; ?>" style="width: 100%; text-align: center;"></td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td>
							<label><b>MILEAGE</b></label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 100%;">
						</td>
						<td>
							<label><b>VIN</b></label>
							<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 100%;">
						</td>
					</tr>
				</table>
				
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
				<h2 style="margin: 0; float: left; width: 100%; font-size: 20px; text-align: center;box-sizing: border-box; margin-top: 100px; border-top: 1px solid #000; padding-top: 10px;">CASH DOWN</h2>
			</div>
				<div class="logo" style="float: left; width: 20%; box-sizing: border-box;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/columbiatnpower.png'); ?>" alt="" style="width: 100%;">
				</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
				<h2 style="float: left; margin: 0; font-size: 20px; width: 100%; text-align: center; box-sizing: border-box; margin-top: 100px; border-top: 1px solid #000; padding-top: 10px;">MONTHLY PAYMENTS</h2>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="form-field" style="width: 100%;">
					<textarea class="cash" name="cash_note" style="width: 94%; border: 0px; height: 295px;"><?php echo isset($info['cash_note'])?$info['cash_note']:'' ?></textarea>
				</div>
			</div>
			<div class="right" style="float: left; width: 50%; box-sizing: border-box;">
				<div class="form-field" style="width: 100%;">
					<textarea class="cash" name="monthly_note" style="width: 94%; border: 0px; height: 295px;"><?php echo isset($info['monthly_note'])?$info['monthly_note']:'' ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="row bottom_title" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000;">
			<div class="left" style="float: left; width: 49.99%; box-sizing: border-box;">
				<div class="form-field" style="width: 100%;">
					<p style="font-size: 15px; margin: 0; padding: 10px;">Salesperson cannot accept this offer or obligate seller in any manner whatsoever. OFFER IS NOT BINDING UNTIL ACCEPTED IN WRITING BY OFFICER OR SALES MANAGER OF SELLER.</p>
				</div>
			</div>
			<div class="right" style="float: left; width: 50%; box-sizing: border-box; border-left: 1px solid #000;">
				<div class="form-field" style="width: 100%;">
					<p style="font-size: 15px; margin: 0; padding: 10px;">Please enter my offer, subject to your acceptance.</p>
					<textarea style="width: 94%; border: 0px; height: 50px; padding: 0 7px;"></textarea>
				</div>
				<div class="from-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 0 10px;">
					<label><b>BUYER'S SIGNATURE</b></label>
					<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="width: 69%;">
				</div>
			</div>
		</div>
		
		<div class="second-page" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 20px; margin: 20px 0 10px 0;">
			<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 24px;"><b>BUYERS GUIDE</b></h2>
			<p style="float: left; width: 100%; margin: 0; border-top: 1px solid #000; padding: 3px;"><b>IMPORTANT:</b> Spoken promises are difficult to enforce. Ask the dealer to put all promises in writing. keep this form.</p>
		
			<div class="row" style="float: left; width: 100%; margin: 0; text-align: center;">
				<div class="form-field" style="float: left; width: 20%; margin: 3px 0;">
					<input type="text" name="vehicle_make" value="<?php echo isset($info['vehicle_make'])?$info['vehicle_make']:''; ?>" style="width: 100%; margin: 2px 0; text-align: center;">
					<label style="font-size: 12px;">VEHICLE MAKE</label>
				</div>
				<div class="form-field" style="float: left; width: 25%; margin: 3px 0;">
					<input type="text" name="vehicle_model" value="<?php echo isset($info['vehicle_model'])?$info['vehicle_model']:''; ?>" style="width: 100%; margin: 2px 0; text-align: center;">
					<label style="font-size: 12px;">MODEL</label>
				</div>
				<div class="form-field" style="float: left; width: 25%; margin: 3px 0;">
					<input type="text" name="vehicle_year" value="<?php echo isset($info['vehicle_year'])?$info['vehicle_year']:''; ?>" style="width: 100%; margin: 2px 0; text-align: center;">
					<label style="font-size: 12px;">YEAR</label>
				</div>
				<div class="form-field" style="float: left; width: 30%; margin: 3px 0;">
					<input type="text" name="vehicle_vin" value="<?php echo isset($info['vehicle_vin'])?$info['vehicle_vin']:''; ?>" style="width: 100%; margin: 2px 0; text-align: center;">
					<label style="font-size: 12px;">VEHICLE IDENTIFICATION NUMBER (VIN)</label>
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; padding: 3px 0; font-size: 20px; border-bottom: 1px solid #000;"><b>WARRANTIES FOR THIS VEHICLE:</b></h2>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>
						<input type="checkbox" name="no_dealer_check" <?php echo ($info['no_dealer_check'] == "no_dealer") ? "checked" : ""; ?> value="no_dealer" style="width: 50px; height: 50px;">
						<div class="right-side" style="width: 92%; float: right; border-bottom: 1px #000 dashed; padding-bottom: 10px;">
							<h2 style="float: left; width: 100%; font-size: 26px; margin: 4px 0;"><b>AS IS - NO DEALER WARRANTY</b></h2>
							<p style="float: left; width: 100%; margin: 4px 0;">THE DEALER DOES NOT PROVIDE A WARRANTY FOR ANY REPAIRS AFTER SALE.</p>
						</div>
					</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%;">
					<label style="width: 100%;">
						<input type="checkbox" name="dealer_check" <?php echo ($info['dealer_check'] == "dealer") ? "checked" : ""; ?> value="dealer"  style="width: 50px; height: 50px;">
						<div class="right-side" style="width: 92%; float: right;">
							<h2 style="float: left; width: 100%; font-size: 26px; margin: 14px 0;"><b>DEALER WARRANTY</b></h2>
						</div>
					</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label style="display: block;">
						<input type="checkbox" name="full_check" <?php echo ($info['full_check'] == "full") ? "checked" : ""; ?> value="full" style="margin-left: 4%;">
						<div class="right-side" style="width: 92%; float: right; padding-bottom: 10px;">
							<p style="float: left; width: 100%; margin: 3px 0; margin: 4px 0;">FULL WARRANTY.</p>
						</div>
					</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label style="display: block;">
						<input type="checkbox" name="limited_check" <?php echo ($info['limited_check'] == "limited") ? "checked" : ""; ?> value="limited" style="margin-left: 4%;">
						<div class="right-side" style="width: 92%; float: right; padding-bottom: 10px;">
							<p style="float: left; width: 100%; margin: 3px 0; margin: 4px 0;">LIMITED WARRANTY. The dealer will pay <input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 10%;">% of the labor and <input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width: 10%;">% of the parts for the covered systems that fail during the warranty period. Ask the dealer for a copy of the warranty, and for any documents that explain warranty coverage, exclusions, and the dealer's repair obligations. <i>Implied warranties under your state's laws may give you additional rights.</i></p>
						</div>
					</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label><b>SYSTEMS COVERED:</b></label>
					<textarea name="system" style="width: 96%; border: 0px; height: 80px;"><?php echo isset($info['system'])?$info['system']:'' ?></textarea>
				</div>
				<div class="form-field" style="float: left; width: 50%;">
					<label><b>DURATION:</b></label>
					<textarea name="duration" style="width: 96%; border: 0px; height: 80px;"><?php echo isset($info['duration'])?$info['duration']:'' ?></textarea>
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 20px; border-bottom: 1px solid #000;"><b>NON-DEALER WARRANTIES FOR THIS VEHICLE:</b></h2>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000; padding-bottom: 10px;">
				<label style="float: left; width: 100%; margin: 4px 0;"><input type="checkbox" name="warranty_check" <?php echo ($info['warranty_check'] == "warranty") ? "checked" : ""; ?> value="warranty" style="margin: 0 10px;"> MANUFACTURER'S WARRANTY STILL APPLIES. The manufacturer's original warranty has not expired on some components of the vehicles.</label>
				<label style="float: left; width: 100%; margin: 4px 0;"><input type="checkbox" name="applies_check" <?php echo ($info['applies_check'] == "applies") ? "checked" : ""; ?> value="applies" style="margin: 0 10px;">MANUFACTURER'S USED VEHICLE WARRANTY APPLIES.</label>
				<label style="float: left; width: 100%; margin: 4px 0;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other" style="margin: 0 10px;">OTHER USED VEHICLE WARRANTY APPLIES.</label>
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Ask the dealer for a copy of the warranty document and an explanation of warranty coverage, exclusions, and repair obligations.</p>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000; padding-bottom: 10px;">
				<label style="float: left; width: 100%; margin: 4px 0;"><input type="checkbox" name="service_check" <?php echo ($info['service_check'] == "service") ? "checked" : ""; ?> value="service" style="margin: 0 10px;"> SERVICE CONTACT. A service contract on this vehicle is available for an extra charge. Ask for details about coverage, deductible, price, and exclusions. If you buy a service contract within 90 days of your purchase of this vehicle, <i>implied warranties</i> under your state's laws may give you additional rights.</label>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<p style="margin: 7px 0; font-size: 14px;"><b>ASK THE DEALER IF YOUR MECHANIC CAN INSPECT THE VEHICLE ON OR OFF THE LOT.</b></p>

			<p style="margin: 7px 0; font-size: 14px;"><b>OBTAIN A VEHICLE HISTORY REPORT AND CHECK FOR OPEN SAFETY RECALLS.</b> For information on how to obtain a vehicle history report, visit ftc.gov/usedcars. To check for open safety recalls, visit safercar.gov. You will need the vehicle identification number (VIN) shown above to make the best use of the resources on these sites.</p>

			<p style="margin: 7px 0; font-size: 14px;"><b>SEE OTHER SIDE for important additional information, including a list of major defects that may occur in used motor vehicles.</b></p>

			<p style="margin: 7px 0; font-size: 14px;"><b>Si el concesionario gestiona la venta en espanol, pidale una copia de la Guia del Comprador en espanol.</b></p>
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
	for (var i = 0; i <= 16; i++) {
		$("#vin" + i).val(res[i]);
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
