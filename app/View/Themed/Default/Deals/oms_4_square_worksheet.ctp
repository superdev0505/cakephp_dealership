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
    <input type="hidden" id="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" name="vin_trade">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	label{font-size: 15px;}
	table td{padding: 0 3%; margin-bottom: 5px;}
	th{font-size: 15px;}
	td input[type="text"] {margin: 5px 0 6px;}
@media print {
	input[type="text"]{padding: 0px;}
	.sign {margin-top: 10px !important;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 600px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/owen.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%">
				<label>APPLICANT</label>
				<input type="text" name="lead" value="<?php echo isset($info['lead']) ? $info['lead'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 81%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 89%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%">
				<label>CO-APPLICANT</label>
				<input type="text" name="co_applicant" value="<?php echo isset($info['co_applicant']) ? $info['co_applicant'] : ''; ?>" style="width: 75%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%">
				<label>EMAIL</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 83%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 83%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%">
				<label>CELL PHONE</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 78%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%">
				<label>CITY/ST/ZIP</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%">
				<label>WORK PHONE</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 76%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%">
				<label>COUNTRY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 82%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%">
				<label style="margin: 0 4% 0 10%;"><input type="checkbox" value="NEW" <?php echo ($info['condition'] == "NEW") ? "checked" : ""; ?>  name="condition"> NEW</label>
				<label><input type="checkbox" value="USED" <?php echo ($info['condition'] == "USED") ? "checked" : ""; ?>  name="condition"> USED</label>
			</div>
		</div>
		
		
		<div class="cover" style="float: left; width: 100%; margin: 10px 0 0; box-sizing: border-box; border: 1px solid #000; ">
			<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="row" style="float: left; width; 100%; margin: 0; box-sizing: border-box; padding: 10px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>VIN</label>
						<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; height: 40px; border: 1px solid #000;">
						<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px;">
					<div class="form-field" style="float: left; width: 100%; margin-bottom: 5px;">
						<label><b>MSRP</b></label>
						<input type="text" name="msrp_data" value="<?php echo isset($info['msrp_data']) ? $info['msrp_data'] : $info['unit_value']; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="msrp1" value="<?php echo isset($info['msrp1']) ? $info['msrp1'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="msrp2" value="<?php echo isset($info['msrp2']) ? $info['msrp2'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="msrp3" value="<?php echo isset($info['msrp3']) ? $info['msrp3'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin-bottom: 5px;margin-left: 1px;">
						<label><b>DSRP</b></label>
						<input type="text" name="dsrp_data"  value="<?php echo isset($info["dsrp_data"]) ? $info['dsrp_data'] : $info['dsrp_data'];?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp1" value="<?php echo isset($info['dsrp1']) ? $info['dsrp1'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp2" value="<?php echo isset($info['dsrp2']) ? $info['dsrp2'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp3" value="<?php echo isset($info['dsrp3']) ? $info['dsrp3'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-bottom: 5px;margin-right: 5px;">
						<textarea  id="notes" name="notes" placeholder="Notes" style="width: 100%; border: 0px; height: 110px;border: 1px solid #000;"><?php echo isset($info['notes'])?$info['notes']:'' ?></textarea>
					</div>
					<div class="form-field" style="float: left; width: 63%; margin-bottom: 5px;">
						<input type="text" name="dsrp4"  value="<?php echo isset($info["dsrp4"]) ? $info['dsrp4'] : '';?>" style="width: 32%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp5" value="<?php echo isset($info['dsrp5']) ? $info['dsrp5'] : ''; ?>" style="width: 31%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp6" value="<?php echo isset($info['dsrp6']) ? $info['dsrp6'] : ''; ?>" style="width: 32%; border: 1px solid #000; height: 25px;">
					</div>
					<div class="form-field" style="float: left; width: 63%; margin-bottom: 5px;">
						<input type="text" name="dsrp7"  value="<?php echo isset($info["dsrp7"]) ? $info['dsrp7'] : '';?>" style="width: 32%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp8" value="<?php echo isset($info['dsrp8']) ? $info['dsrp8'] : ''; ?>" style="width: 31%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp9" value="<?php echo isset($info['dsrp9']) ? $info['dsrp9'] : ''; ?>" style="width: 32%; border: 1px solid #000; height: 25px;">
					</div>
					<div class="form-field" style="float: left; width: 63%; margin-bottom: 5px;">
						<input type="text" name="dsrp10"  value="<?php echo isset($info["dsrp10"]) ? $info['dsrp10'] : '';?>" style="width: 32%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp11" value="<?php echo isset($info['dsrp11']) ? $info['dsrp11'] : ''; ?>" style="width: 31%; border: 1px solid #000; height: 25px;">
						<input type="text" name="dsrp12" value="<?php echo isset($info['dsrp12']) ? $info['dsrp12'] : ''; ?>" style="width: 32%; border: 1px solid #000; height: 25px;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin-bottom: 5px;">
						<label style="margin-left: 19%;"><b>+ Fee's</b></label>
						<input type="text" name="fee1" value="<?php echo isset($info['fee1']) ? $info['fee1'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="fee2" value="<?php echo isset($info['fee2']) ? $info['fee2'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
						<input type="text" name="fee3" value="<?php echo isset($info['fee3']) ? $info['fee3'] : ''; ?>" style="width: 20%; border: 1px solid #000; height: 25px;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%">
						<label style="margin: 0 0 0 2%"><b>PARTS</b> <input type="checkbox" value="part" <?php echo ($info['dsrp_status'] == "part") ? "checked" : ""; ?>  name="dsrp_status"></label>
						<label style="margin: 0 10%"><b>LABOR</b> <input type="checkbox" value="labor" <?php echo ($info['dsrp_status'] == "labor") ? "checked" : ""; ?>  name="dsrp_status"></label>
						<label><b>FARM</b> <input type="checkbox" value="farm" <?php echo ($info['dsrp_status'] == "farm") ? "checked" : ""; ?>  name="dsrp_status"></label>
						<label style="margin: 0 10%"><b>TAX</b> <input type="checkbox" value="tax" <?php echo ($info['dsrp_status'] == "tax") ? "checked" : ""; ?>  name="dsrp_status"></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%">
						<label><b>CASH INVESTMENT</b></label>
						<textarea name="cash" style="width: 98%; border: 0px; height: 120px;"><?php echo isset($info['cash']) ? $info['cash'] : ''; ?></textarea>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; borer-bottom: 1px solid #000;">
					<h2 style="float: left; width: 100%; margin: 2px 0; font-size: 15px;">UNIT PURCHASING</h2>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%">
							<label><b>STOCK #</b></label>
							<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 25%">
							<label><b>YR</b></label>
							<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 73%;">
						</div>
						<div class="form-field" style="float: left; width: 35%">
							<label><b>MAKE</b></label>
							<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 66%;">
						</div>
						<div class="form-field" style="float: left; width: 40%">
							<label><b>MODEL</b></label>
							<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 62%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 50%">
							<label><b>MILES</b></label>
							<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 74%;">
						</div>
						<div class="form-field" style="float: left; width: 50%">
							<label><b>OPTIONS</b></label>
							<input type="text" name="option" value="<?php echo isset($info['option']) ? $info['option'] : ''; ?>" style="width: 64%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%">
							<label><b>Leinholder</b></label>
							<input type="text" name="leinholder" value="<?php echo isset($info['leinholder']) ? $info['leinholder'] : ''; ?>" style="width: 81%;">
						</div>
					</div>
				</div>
				
				
			</div>
			
			<!-- left-side end -->
			
			<!-- rightside start -->
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box;">
				<div class="row" style="float: left; width; 100%; margin: 0; box-sizing: border-box; padding: 10px;">
					<div class="form-field" style="float: left; width: 100%">
						<label>VIN</label>
						<input type="text" name="vin_trade0" id="vin_trade0" value="<?php echo isset($info['vin_trade0']) ? $info['vin_trade0'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade1" id="vin_trade1" value="<?php echo isset($info['vin_trade1']) ? $info['vin_trade1'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade2" id="vin_trade2" value="<?php echo isset($info['vin_trade2']) ? $info['vin_trade2'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade3" id="vin_trade3" value="<?php echo isset($info['vin_trade3']) ? $info['vin_trade3'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade4" id="vin_trade4" value="<?php echo isset($info['vin_trade4']) ? $info['vin_trade4'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade5" id="vin_trade5" value="<?php echo isset($info['vin_trade5']) ? $info['vin_trade5'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade6" id="vin_trade6" value="<?php echo isset($info['vin_trade6']) ? $info['vin_trade6'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade7" id="vin_trade7" value="<?php echo isset($info['vin_trade7']) ? $info['vin_trade7'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade8" id="vin_trade8" value="<?php echo isset($info['vin_trade8']) ? $info['vin_trade8'] : ''; ?>" style="width: 5%; border: 1px solid #000; height: 30px;">
						<input type="text" name="vin_trade9" id="vin_trade9" value="<?php echo isset($info['vin_trade9']) ? $info['vin_trade9'] : ''; ?>" style="width: 5%; height: 40px; border: 1px solid #000;">
						<input type="text" name="vin_trade10" id="vin_trade10" value="<?php echo isset($info['vin_trade10']) ? $info['vin_trade10'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin_trade11" id="vin_trade11" value="<?php echo isset($info['vin_trade11']) ? $info['vin_trade11'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin_trade12" id="vin_trade12" value="<?php echo isset($info['vin_trade12']) ? $info['vin_trade12'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin_trade13" id="vin_trade13" value="<?php echo isset($info['vin_trade13']) ? $info['vin_trade13'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
						<input type="text" name="vin_trade14" id="vin_trade14" value="<?php echo isset($info['vin_trade14']) ? $info['vin_trade14'] : ''; ?>" style="width: 5%; height: 30px; border: 1px solid #000;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%">
						<label><b>TRADE ALLOWANCE</b></label>
						<textarea name="allowance" style="width: 98%; border: 0px; height: 90px;"><?php echo isset($info['allowance']) ? $info['allowance'] : ''; ?></textarea>
						<label><b>SUBJECT TO INSPECTION</b></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%">
						<label><b>MONTHLY INVESTMENT</b></label>
						<textarea name="investment" style="width: 98%; border: 0px; height: 156px;"><?php echo isset($info['investment']) ? $info['investment'] : ''; ?></textarea>
						<label><b>ESTIMATED WITH APPROBED CREDIT</b></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; borer-bottom: 1px solid #000;">
					<h2 style="float: left; width: 100%; margin: 2px 0; font-size: 15px;">UNIT TRADING</h2>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%">
							<label><b>Leinholder</b></label>
							<input type="text" name="trade_lienholder" value="<?php echo isset($info['trade_lienholder']) ? $info['trade_lienholder'] : ''; ?>" style="width: 81%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 25%">
							<label><b>YR</b></label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 73%;">
						</div>
						<div class="form-field" style="float: left; width: 35%">
							<label><b>MAKE</b></label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 66%;">
						</div>
						<div class="form-field" style="float: left; width: 40%">
							<label><b>MODEL</b></label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 62%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 50%">
							<label><b>MILES</b></label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 74%;">
						</div>
						<div class="form-field" style="float: left; width: 50%">
							<label><b>OPTIONS</b></label>
							<input type="text" name="trade_option" value="<?php echo isset($info['trade_option']) ? $info['trade_option'] : ''; ?>" style="width: 64%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%">
							<label><b>PAYOFF</b></label>
							<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
				</div>
			</div>
			<!-- rightside end -->
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0 10px 10px; border: 1px solid #000; border-top: 0px;">
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">My signature below states that I am 18 years of age or older and authorizes Owen Motor Sports, Inc. in Charleston to drive <br>and appraise my trade-in vehicle and to obtain Credit Informattion as may be necessary to expediate the purchase of a vehicle.</p>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box;">
				<div class="left" style="float: left; width: 46%; border: 1px solid #000;">
					<div class="form-field" style="float: left; width: 64%; border-right: 1px solid #000;">
						<label style="display: block; text-align: center;">SOCIAL SECURITY #</label>
						<input type="text" name="snumber" value="<?php echo isset($info['snumber']) ? $info['snumber'] : ''; ?>" style="width: 100%; border: 0px;">
					</div>
					
					<div class="form-field" style="float: left; width: 35%;">
						<label style="display: block; text-align: center;">DATE OF BIRTH</label>
						<input type="text" name="birth_date" value="<?php echo isset($info['birth_date']) ? $info['birth_date'] : ''; ?>" style="width: 90%; border-bottom: 0px;">
					</div>
				</div>
				
				<div class="right" style="float: right; width: 46%; border: 1px solid #000;">
					<div class="form-field" style="float: left; width: 64%; border-right: 1px solid #000;">
						<label style="display: block; text-align: center;">SOCIAL SECURITY #</label>
						<input type="text" name="co_snumber" value="<?php echo isset($info['co_snumber']) ? $info['co_snumber'] : "" ?>" style="width: 100%; border: 0px;">
					</div>
					
					<div class="form-field" style="float: left; width: 35%;">
						<label style="display: block; text-align: center;">DATE OF BIRTH</label>
						<input type="text" name="co_birth_date" value="<?php echo isset($info['co_birth_date']) ? $info['co_birth_date'] : ''; ?>" style="width: 90%; border-bottom: 0px;">
					</div>
				</div>
				
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="width: 46%; float: left; padding: 0 2%;">	
					X <input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign']) ? $info['buyer_sign'] : ''; ?>" style="width: 94%;">
					<label style="display: block; font-size: 13px"><b>Buyer Signature</b></label>
				</div>
				
				<div class="form-field" style="width: 46%; float: right; padding: 0 2%;">	
					X <input type="text" name="co_buyer_sign" value="<?php echo isset($info['co_buyer_sign']) ? $info['co_buyer_sign'] : ''; ?>" style="width: 94%;">
					<label style="display: block; font-size: 13px"><b>Co-Buyer Signature</b></label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="width: 50%; float: left;">
					<label><b>Buyer Driver's License</b></label>
					<input type="text" name="buyer_license" value="<?php echo isset($info['buyer_license']) ? $info['buyer_license'] : ''; ?>" style="width: 60%;">
				</div>
				
				<div class="form-field" style="width: 50%; float: right;">	
					<label><b>Co-Buyer Driver's License</b></label>
					<input type="text" name="co_buyer_license" value="<?php echo isset($info['co_buyer_license']) ? $info['co_buyer_license'] : ''; ?>" style="width: 59%;">
				</div>
			</div>
			
			<div class="row sign" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="width: 50%; margin: 0 auto;">
					<label><b>Manager Signature</b></label>
					<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign']) ? $info['manager_sign'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
		</div>
		<!-- first page end -->
		
		
		<!-- second page start -->
		<div class="second-page" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left" style="float: left; width: 45%;padding: 10px; box-sizing: border-box; border: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>MSRP</b></label>
					<input type="text" class="amount_field" id="msrp" name="msrp" value="<?php echo isset($info['msrp']) ? $info['msrp'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>FREIGHT</b></label>
					<input type="text" class="amount_field" id="frieght" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>PREP/SET UP</b></label>
					<input type="text" class="amount_field" id="prep" name="prep" value="<?php echo isset($info['prep']) ? $info['prep'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>SUBTOTAL</b></label>
					<input type="text" class="amount_field" id="subtotal1" name="subtotal1" value="<?php echo isset($info['subtotal1']) ? $info['subtotal1'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>DEALER DISCOUNT</b></label>
					<input type="text" class="amount_field" id="dealer_count" name="dealer_count" value="<?php echo isset($info['dealer_count']) ? $info['dealer_count'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>SELLING PRICE</b></label>
					<input type="text" class="amount_field" id="unit_value" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>TRADE (-)</b></label>
					<input type="text" class="amount_field" id="trade_value" name="trade_value" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>DIFFERENCE</b></label>
					<input type="text" class="amount_field" id="difference" name="difference" value="<?php echo isset($info['difference']) ? $info['difference'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>DOC FEE</b></label>
					<input type="text" class="amount_field" id="doc_fee" name="doc_fee" value="<?php echo isset($info['doc_fee']) ? $info['doc_fee'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><sup><b>**</sup> ACCESS. TOATL</b></label>
					<input type="text" class="amount_field" id="access_total" name="access_total" value="<?php echo isset($info['access_total']) ? $info['access_total'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 20px 0 4px;">
					<label style="width: 50%; float: left; text-align: right"><b>TAXABLE TOTAL</b></label>
					<input type="text" class="amount_field" id="taxable_total" name="taxable_total" value="<?php echo isset($info['taxable_total']) ? $info['taxable_total'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>SALES TAX</b></label>
					<input type="text" class="amount_field" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>TITLE & LIC</b></label>
					<input type="text" class="amount_field" id="title_lic" name="title_lic" value="<?php echo isset($info['title_lic']) ? $info['title_lic'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b><sup>*</sup> INSTALL TOTAL</b></label>
					<input type="text" class="amount_field" id="install_total" name="install_total" value="<?php echo isset($info['install_total']) ? $info['install_total'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>PAYOFF</b></label>
					<input type="text" class="amount_field" id="payoff_val" name="payoff_val" value="<?php echo isset($info['payoff_val']) ? $info['payoff_val'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0 20px;">
					<label style="width: 50%; float: left; text-align: right"><b>SUBTOTAL</b></label>
					<input type="text" class="amount_field" id="subtotal2" name="subtotal2" value="<?php echo isset($info['subtotal2']) ? $info['subtotal2'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>SERVICE COUNT.</b></label>
					<input type="text" name="service_count" value="<?php echo isset($info['service_count']) ? $info['service_count'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>TYPES/MONTHS</b></label>
					<input type="text" name="types" value="<?php echo isset($info['types']) ? $info['types'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>GAP/MONTHS</b></label>
					<input type="text" name="gap" value="<?php echo isset($info['gap']) ? $info['gap'] : ''; ?>" style="width: 20%; border-right: 1px solid #000;">
					<input type="text" name="gap_month" value="<?php echo isset($info['gap_month']) ? $info['gap_month'] : ''; ?>" style="width: 20%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>TIRE PROT/MONTHS</b></label>
					<input type="text" name="prot" value="<?php echo isset($info['prot']) ? $info['prot'] : ''; ?>" style="width: 20%; border-right: 1px solid #000;">
					<input type="text" name="prot_month" value="<?php echo isset($info['prot_month']) ? $info['prot_month'] : ''; ?>" style="width: 20%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>THEFT PROT/MTHS</b></label>
					<input type="text" name="theft" value="<?php echo isset($info['theft']) ? $info['theft'] : ''; ?>" style="width: 20%; border-right: 1px solid #000;">
					<input type="text" name="theft_mths" value="<?php echo isset($info['theft_mths']) ? $info['theft_mths'] : ''; ?>" style="width: 20%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 20px 0 4px;">
					<label style="width: 50%; float: left; text-align: right"><b>SUBTOTAL</b></label>
					<input type="text" name="subtotal3" value="<?php echo isset($info['subtotal3']) ? $info['subtotal3'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0 ;">
					<label style="width: 50%; float: left; text-align: right"><b>BONUS BUCKS</b></label>
					<input type="text" name="bucks" value="<?php echo isset($info['bucks']) ? $info['bucks'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 20px 0;">
					<label style="width: 50%; float: left; text-align: right"><b>DOWN PAYMENT</b></label>
					<input type="text" name="down_pay" value="<?php echo isset($info['down_pay']) ? $info['down_pay'] : ''; ?>" style="width: 40%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0 0 4px;">
					<label style="width: 50%; float: left; text-align: right"><b>TOTAL</b></label>
					<input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 40%;">
				</div>
			</div>
			
			<div class="rightside" style="float: right; width: 50%; margin: 0; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="from-field" style="width: 80%; margin: 0 auto 4px;">
						<label><b>FRONT SALESMAN</b></label>
						<input type="text" name="salesman" value="<?php echo isset($info['salesman']) ? $info['salesman'] : ''; ?>" style="width: 60%; float: right;">
					</div>
					
					<div class="from-field" style="width: 80%; margin: 0 auto 4px;">
						<label><b>BACK SALESMAN</b></label>
						<input type="text" name="back_salesman" value="<?php echo isset($info['back_salesman']) ? $info['back_salesman'] : ''; ?>" style="width: 60%; float: right;">
					</div>
					
					<div class="from-field" style="width: 80%; margin: 0 auto 4px;">
						<label><b>PARTS SALESMAN</b></label>
						<input type="text" name="parts_salesman" value="<?php echo isset($info['parts_salesman']) ? $info['parts_salesman'] : ''; ?>" style="width: 60%; float: right;">
					</div>
					
					<div class="from-field" style="width: 80%; margin: 0 auto 4px;">
						<label><b>ADMINISTRATION</b></label>
						<input type="text" name="administrator" value="<?php echo isset($info['administrator']) ? $info['administrator'] : ''; ?>" style="width: 60%; float: right;">
					</div>
				</div>
				
				
				<div class="cover" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 10px;">
					<h2 style="float: left; width: 100%; text-align: center; text-decoration: underline; font-size: 16px; margin: 3px 0 7px;;">ACCESSORIES</h2>
					
					<table cellpadding="0" cellspacing="0" width="100%" style="text-align: center;">
						<tr>
							<th>DESCRIPITION</th>
							<th>PART #</th>
							<th>AMOUNT</th>
						<tr>
						
						<tr>
							<td><input type="text" name="descrip1" value="<?php echo isset($info['descrip1']) ? $info['descrip1'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part1" value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount1" value="<?php echo isset($info['amount1']) ? $info['amount1'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip2" value="<?php echo isset($info['descrip2']) ? $info['descrip2'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount2" value="<?php echo isset($info['amount2']) ? $info['amount2'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip3" value="<?php echo isset($info['descrip3']) ? $info['descrip3'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part3" value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount3" value="<?php echo isset($info['amount3']) ? $info['amount3'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip4" value="<?php echo isset($info['descrip4']) ? $info['descrip4'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part4" value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount4" value="<?php echo isset($info['amount4']) ? $info['amount4'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip5" value="<?php echo isset($info['descrip5']) ? $info['descrip5'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part5" value="<?php echo isset($info['part5']) ? $info['part5'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount5" value="<?php echo isset($info['amount5']) ? $info['amount5'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip6" value="<?php echo isset($info['descrip6']) ? $info['descrip6'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part6" value="<?php echo isset($info['part6']) ? $info['part6'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount6" value="<?php echo isset($info['amount6']) ? $info['amount6'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip7" value="<?php echo isset($info['descrip7']) ? $info['descrip7'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part7" value="<?php echo isset($info['part7']) ? $info['part7'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount7" value="<?php echo isset($info['amount7']) ? $info['amount7'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip8" value="<?php echo isset($info['descrip8']) ? $info['descrip8'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part8" value="<?php echo isset($info['part8']) ? $info['part8'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount8" value="<?php echo isset($info['amount8']) ? $info['amount8'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip9" value="<?php echo isset($info['descrip9']) ? $info['descrip9'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part9" value="<?php echo isset($info['part9']) ? $info['part9'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount9" value="<?php echo isset($info['amount9']) ? $info['amount9'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip10" value="<?php echo isset($info['descrip10']) ? $info['descrip10'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part10" value="<?php echo isset($info['part10']) ? $info['part10'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount10" value="<?php echo isset($info['amount10']) ? $info['amount10'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip11" value="<?php echo isset($info['descrip11']) ? $info['descrip11'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part11" value="<?php echo isset($info['part11']) ? $info['part11'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount11" value="<?php echo isset($info['amount11']) ? $info['amount11'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip12" value="<?php echo isset($info['descrip12']) ? $info['descrip12'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part12" value="<?php echo isset($info['part12']) ? $info['part12'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount12" value="<?php echo isset($info['amount12']) ? $info['amount12'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip13" value="<?php echo isset($info['descrip13']) ? $info['descrip13'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part13" value="<?php echo isset($info['part13']) ? $info['part13'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount13" value="<?php echo isset($info['amount13']) ? $info['amount13'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="descrip14" value="<?php echo isset($info['descrip14']) ? $info['descrip14'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="part14" value="<?php echo isset($info['part14']) ? $info['part14'] : ''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="amount14" value="<?php echo isset($info['amount14']) ? $info['amount14'] : ''; ?>" style="width: 100%;"></td>
						</tr>
						
					</table>
					
					
					<div class="row" style="float: left; width: 100%; margin: 20px 0 15px;">
						<div class="form-field" style="float: right; width: 30%; text-align: center;">
							RO<br>COMPLETION
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
							<label style="width: 42%; text-align: right; display: inline-block; margin-right: 2%;"><sup>**</sup> ACCESS TOTAL</label>
							<input type="text" name="acc_total1" value="<?php echo isset($info['acc_total1']) ? $info['acc_total1'] : ''; ?>" style="width: 25%">
							<input type="text" name="acc_total2" value="<?php echo isset($info['acc_total2']) ? $info['acc_total2'] : ''; ?>" style="width: 25%; float: right;">
						</div>
						
						<div class="form-field" style="float: left; width: 100%; margin: 7px 0 12px;">
							<label style="width: 42%; text-align: right; display: inline-block; margin-right: 2%;"><sup>*</sup> INSTALL TOTAL</label>
							<input type="text" name="install_total1" value="<?php echo isset($info['install_total1']) ? $info['install_total1'] : ''; ?>" style="width: 25%">
							<input type="text" name="install_total2" value="<?php echo isset($info['install_total2']) ? $info['install_total2'] : ''; ?>" style="width: 25%; float: right;">
						</div>
						
						
						<div class="form-field" style="float: left; width: 100%;">
							<label style="width: 42%; text-align: right; display: inline-block; margin-right: 2%;"><sup>RO #</label>
							<input type="text" name="ro_num1" value="<?php echo isset($info['ro_num1']) ? $info['ro_num1'] : ''; ?>" style="width: 25%">
							<input type="text" name="ro_num2" value="<?php echo isset($info['ro_num2']) ? $info['ro_num2'] : ''; ?>" style="width: 25%; float: right;">
						</div>
						
						<div class="form-field" style="float: left; width: 100%;">
							<label style="float: right; width: 25%; display: bloc;">TOTAL</label>
						</div>
						
					</div>
				</div>
			</div>
			
			
			
			<div class="type-of-payment" style="float: left; border: 1px solid #000; width: 100%; margin: 7px 0; box-sizing: border-box; padding: 10px;">
				<div class="left" style="float: left; width: 40%;">
					<h2 style="font-size: 16px; float: left; width: 100%; margin: 10px 0 18px; text-decoration: underline; text-align: center;">TYPE OF PAYMENTS:</h2>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<label>Reserve</label>
							<input type="text" name="reserve" value="<?php echo isset($info['reserve']) ? $info['reserve'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%; margin: 0;">
							<label>FRONT</label>
							<input type="text" name="front" value="<?php echo isset($info['front']) ? $info['front'] : ''; ?>" style="width: 66%;">
						</div>
						<div class="form-field" style="float: left; width: 50%; margin: 0;">
							<label>BACK</label>
							<input type="text" name="back" value="<?php echo isset($info['back']) ? $info['back'] : ''; ?>" style="width: 71%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%; margin: 0;">
							<label>ACV</label>
							<input type="text" name="acv1" value="<?php echo isset($info['acv1']) ? $info['acv1'] : ''; ?>" style="width: 50%;">/
							<input type="text" name="acv2" value="<?php echo isset($info['acv2']) ? $info['acv2'] : ''; ?>" style="width: 20%;">
						</div>
						<div class="form-field" style="float: left; width: 50%; margin: 0;">
							<label>DSRP</label>
							<input type="text" name="dsp1" value="<?php echo isset($info['dsp1']) ? $info['dsp1'] : ''; ?>" style="width: 50%;">/
							<input type="text" name="dsp2" value="<?php echo isset($info['dsp2']) ? $info['dsp2'] : ''; ?>" style="width: 20%;">
						</div>
					</div>
				</div>
				
				<div class="right" style="float: right; width: 55%;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 54%; margin: 0; vertical-align-top;">
							<input type="checkbox" name="check_status" <?php echo ($info['check_status'] == "check") ? "checked" : ""; ?> value="check" style="vertical-align: top;"> <label style="margin-left: 4%; display: inline-block;"><b>CHECK# <input type="text" name="check" value="<?php echo isset($info['check']) ? $info['check'] : ''; ?>" style="width: 20%;"> <br> "BY SIGNING HERE I <br> AGREE THAT THERE IS <br> NO LIEN ON THE UNIT"</b></label>
							
						</div>
						<div class="form-field" style="float: left; width: 46%; margin: 36px 0 0;">
							<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="width: 100%;">
							<label style="display: block; text-align: center;"><b>CUSTOMER SIGNATURE</b></label>
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<input type="checkbox" name="check_status" <?php echo ($info['check_status'] == "cash") ? "checked" : ""; ?> value="cash"> <label style="margin: 0 0 0 4%;"> <b>CASH</b></label> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<input type="checkbox" name="check_status" <?php echo ($info['check_status'] == "card") ? "checked" : ""; ?> value="card"> <label style="margin: 0 0 0 4%;"> <b>CREDIT CARD</b></label> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<input type="checkbox" name="check_status" <?php echo ($info['check_status'] == "financed") ? "checked" : ""; ?> value="financed"> <label style="margin: 0 0 0 4%; width: 90%;"> <b>FINANCED THRU</b> <input type="text" name="financed" value="<?php echo isset($info['financed']) ? $info['financed'] : ''; ?>" style="width: 68%;"> </label> 
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<label style="display: inline-block; width: 40%; text-align: right;"><b>MONTHS</b></label>
							<input type="text" name="months" value="<?php echo isset($info['months']) ? $info['months'] : ''; ?>" style="width: 40%; margin-right: 2%;">
							<label><b>CL/AH</b></label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0;">
							<label style="display: inline-block; width: 40%; text-align: right;"><b>PAYMENT AMT.</b></label>
							<input type="text" name="payment_amt" value="<?php echo isset($info['payment_amt']) ? $info['payment_amt'] : ''; ?>" style="width: 40%;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- second page end -->
		
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
	var vin = $('#vin_trade').val();
	var res = vin.split("");
	for (var i = 0; i <= 15; i++) {
		$("#vin_trade" + i).val(res[i]);
	}

	$(".amount_field").on('change keyup paste',function(){
		calculate_total();
	});

	function calculate_total(){
		var unit_value = isNaN(parseFloat( $("#msrp").val()))?0.00:parseFloat( $("#msrp").val());
		var frieght_fee = isNaN(parseFloat( $("#frieght").val()))?0.00:parseFloat( $("#frieght").val());
		var prep = isNaN(parseFloat( $("#prep").val()))?0.00:parseFloat( $("#prep").val());
		var subtotal1 = unit_value + frieght_fee + prep;
		$("#subtotal1").val(subtotal1.toFixed(2));
		var subtotal1 = isNaN(parseFloat( $("#subtotal1").val()))?0.00:parseFloat( $("#subtotal1").val());
		var dealer_count = isNaN(parseFloat( $("#dealer_count").val()))?0.00:parseFloat( $("#dealer_count").val());
		var unit_value = isNaN(parseFloat( $("#unit_value").val()))?0.00:parseFloat( $("#unit_value").val());
		var trade_value = isNaN(parseFloat( $("#trade_value").val()))?0.00:parseFloat( $("#trade_value").val());
		var difference = unit_value - trade_value;
		$("#difference").val(difference.toFixed(2));
		var difference = isNaN(parseFloat( $("#difference").val()))?0.00:parseFloat( $("#difference").val());
		var doc_fee = isNaN(parseFloat( $("#doc_fee").val()))?0.00:parseFloat( $("#doc_fee").val());
		var access_total = isNaN(parseFloat( $("#access_total").val()))?0.00:parseFloat( $("#access_total").val());
		var taxable_total = subtotal1 + dealer_count + difference + doc_fee + access_total;
		$("#taxable_total").val(taxable_total.toFixed(2));
		var sales_tax = isNaN(parseFloat( $("#sales_tax").val()))?0.00:parseFloat( $("#sales_tax").val());
		var title_lic = isNaN(parseFloat( $("#title_lic").val()))?0.00:parseFloat( $("#title_lic").val());
		var install_total = isNaN(parseFloat( $("#install_total").val()))?0.00:parseFloat( $("#install_total").val());
		var payoff_val = isNaN(parseFloat( $("#payoff_val").val()))?0.00:parseFloat( $("#payoff_val").val());
		var subtotal2 = taxable_total + sales_tax + title_lic + install_total + payoff_val;
		$("#subtotal2").val(subtotal2.toFixed(2));
		
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
