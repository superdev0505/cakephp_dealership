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
	label{font-size: 12px; margin-bottom: 0px;}
	p{font-size: 16px; text-align: center;}
	.col input[type="text"]{border-bottom: 0px;}
	body{font-size: 12px;}
	.wraper.main input {padding: 1px;}
@media print {
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left" style="width: 15%; top: 7px; float: left; margin: 0 auto; position: absolute; left: 0px;">
				<b>MVR-1</b><br>
				(Rev. 01/17)
			</div>
			<h3 style="text-align: center; font-size: 16px; line-height: 18px; margin: 0;">North Carolina Division of Motor Vehicles</h3>
			<h2 style="text-align: center; font-size: 18px; line-height: 18px; margin: 3px 0;"><b>NOTICE AND DISCLOSURES</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 5px 10px 5px 20px; border: 1px solid #000; font-size: 13px;">
			<h2 style="text-align: center; font-size: 16px;"><b>CHECK Appropriate Block/s</b> (Application cannot be processed without certification of services)</h2>
			<div class="left" style="float: left; width: 46%;">
				<span style="display: block;"><input type="checkbox" name="appro_status" value="title" <?php echo ($info['appro_status'] == "title") ? "checked" : ""; ?> style="margin: 0 20px 0 0;"> Title Only - Vehicle Not in Operation</span>
				<span style="display: block;"><input type="checkbox" name="appro_status" value="license" <?php echo ($info['appro_status'] == "license") ? "checked" : ""; ?> style="margin: 8px 20px 0 0;"> Title and License Plate <br> Class of License <input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : "" ?>" style="width: 40%;"></span>
				<span style="display: block;"><input type="checkbox" name="appro_status" value="vehicle" <?php echo ($info['appro_status'] == "vehicle") ? "checked" : ""; ?> style="margin: 10px 20px 0 0;"> Inoperable Vehicle - Vehicle substantially disassembled <br> and unfit or unsafe  to be  operated on the highway</span>
			</div>
			
			<div class="left" style="float: left; width: 34%;">
				<span style="display: block;"><input type="checkbox" name="appro_status" value="truck" <?php echo ($info['appro_status'] == "truck") ? "checked" : ""; ?> style="margin: 0 20px 0 0;"> Truck Weight Desired <input type="text" name="truck" value="<?php echo isset($info['truck']) ? $info['truck'] : "" ?>" style="width: 30%;"> <br> (This includes the truck, trailer and load)</span>
				<span style="display: block;"><input type="checkbox" name="appro_status" value="transferred" <?php echo ($info['appro_status'] == "transferred") ? "checked" : ""; ?> style="margin: 7px 20px 0 0;"> Plate No. Transferred <label><input type="text" name="transferred" value="<?php echo isset($info['transferred']) ? $info['transferred'] : "" ?>" style="width: 40%;"></label> </span>
				<span style="display: block;"><input type="checkbox" name="appro_status" value="registration" <?php echo ($info['appro_status'] == "registration") ? "checked" : ""; ?>  style="margin: 5px 20px 0 0;"> Limited Registration Plate <br> (When property taxes are deferred)</span>
			</div>
			
			<div class="right" style="float: right; width: 20%;">
				<p style="margin: 0; font-size: 13px;">For Hire Vehicle</p>
				<p style="margin: 0; font-size: 13px;"><span><input type="checkbox" name="vehicle_status" value="yes" <?php echo ($info['vehicle_status'] == "yes") ? "checked" : ""; ?> /> Yes </span> or <span> <input type="checkbox" name="vehicle_status" value="no" <?php echo ($info['vehicle_status'] == "no") ? "checked" : ""; ?> /> No</span></p>
			</div>
			
			<h3 style="text-align: center; margin: 5px 0; float: left; width: 100%; font-size: 16px;"><b>I certify that all the above information is correct.</b> <input type="text" name="information" value="<?php echo isset($info['information']) ? $info['information'] : "" ?>" style="width: 16%; padding: 0px;"> <span style="font-weight: normal; font-size: 14px;">(Customer's Initials)</span></h3>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; text-align: center; border: 1px solid #000; border-top: 0px; margin: 0; font-size: 18px;">VEHICLE SECTION</h2>
		
		<div class="row col" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 10%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">YEAR</label>
				<input type="text" name="year" value="<?php echo $info['year']; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 10%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">MAKE</label>
				<input type="text" name="make" value="<?php echo $info['make']; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">BODY STYLE</label>
				<input type="text" name="body_style" value="<?php echo isset($info['body_style']) ? $info['body_style'] : ''; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">SERIES MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">VEHICLE IDENTIFICATION NUMBER</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 10%; border-right: 1px solid #000;">
				<label style="text-align: center; display: block;">FUEL TYPE</label>
				<input type="text" name="fuel_type" value="<?php echo isset($info['fuel_type']) ? $info['fuel_type'] : ''; ?>" style="text-align: center; width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label style="text-align: center; display: block;">ODOMETER READING</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="text-align: center; width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; text-align: center; border: 1px solid #000; border-top: 0px; margin: 0; font-size: 18px;">OWNER SECTION</h2>
		
		<div style="float: left; width: 100%; box-sizing: border-box; border-left: 1px solid #000; border-right: 1px solid #000; padding: 0 10px;">
			<div class="row" style="float: left; box-sizing: border-box; width: 100%; box-sizing: border-box; padding: 1px 10px;">
				<div class="form-field" style="float: left; width: 30%;">
					<label>Owner 1 ID #</label>
					<input type="text" name="owner_id1" value="<?php echo isset($info['owner_id1'])?$info['owner_id1']:''; ?>" style="width: 50%;">
				</div>
				
				<div class="form-field" style="float: left; width: 70%;">
					<input type="text" name="owner_name1" value="<?php echo isset($info['owner_name1'])?$info['owner_name1']:''; ?>" style="width: 100%;">
					<label style="text-align: center;">Full Legal Name of Owner 1 (First, Middle, Last, Suffix) or Company Name</label>
				</div>
			</div>
			
			<div class="row" style="float: left; box-sizing: border-box; width: 100%; box-sizing: border-box; padding: 2px 10px;">
				<div class="form-field" style="float: left; width: 30%;">
					<label>Owner 2 ID #</label>
					<input type="text" name="owner_id2" value="<?php echo isset($info['owner_id2'])?$info['owner_id2']:''; ?>" style="width: 50%;">
				</div>
				
				<div class="form-field" style="float: left; width: 70%;">
					<input type="text" name="owner_name2" value="<?php echo isset($info['owner_name2'])?$info['owner_name2']:''; ?>" style="width: 100%;">
					<label style="text-align: center;">Full Legal Name of Owner 1 (First, Middle, Last, Suffix) or Company Name</label>
				</div>
			</div>
		
		
			<p style="float: left; width: 100%; margin: 0px 0 4px; font-size: 13px;"> Joint applications request this title to be issued with joint Tenants with Rights of Survivorship? Check appropriate block: <span>Yes <input type="checkbox" name="block_status" value="yes" <?php echo ($info['block_status'] == "yes") ? "checked" : ""; ?> style="margin: 0 20px 0 20px;"></span> <span>No <input type="checkbox" name="block_status" value="no" <?php echo ($info['block_status'] == "no") ? "checked" : ""; ?> style="margin: 0 20px 0 20px;"></span></p>
		</div>
		
		<div class="row col" style="border: 1px solid #000;  float: left; box-sizing: border-box; width: 100%; padding: 0px 10px; border-bottom: 0px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 43%;">
				<label>Residence Address(Individual) Business Address (Firm)</label>
				<input type="text" name="risidence_address" value="<?php echo isset($info['risidence_address'])?$info['risidence_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>City and State</label>
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 37%;">
				<label>Zip Code</label>
				<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row col" style="border: 1px solid #000; border-bottom: 0px solid #000; float: left; box-sizing: border-box; width: 100%; box-sizing: border-box; padding: 0px 10px; margin: 0;">
			<div class="form-field" style="float: left; width: 43%;">
				<label>Mail Address (if different from above)</label>
				<input type="text" name="mail_address" value="<?php echo isset($info['mail_address'])?$info['mail_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>City and State</label>
				<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 37%;">
				<label>Zip Code</label>
				<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row col" style="border: 1px solid #000;float: left; box-sizing: border-box; width: 100%; box-sizing: border-box; padding: 0px 10px; margin: 0;">
			<div class="form-field" style="float: left; width: 43%; padding: 2px 0;">
				<label>Vehicle Location Address (if different from residence address above)</label>
				<input type="text" name="vehicle_address" value="<?php echo isset($info['vehicle_address'])?$info['vehicle_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 2px 0;">
				<label>City and State</label>
				<input type="text" name="address3" value="<?php echo isset($info['address3'])?$info['address3']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; padding: 2px 0;">
				<label>Zip Code</label>
				<input type="text" name="zip3" value="<?php echo isset($info['zip3'])?$info['zip3']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; border-left: 1px solid #000; box-sizing: border-box;  padding: 2px 0 2px 10px;">
				<label>Tax County</label>
				<input type="text" name="tax_county" value="<?php echo isset($info['tax_county'])?$info['tax_county']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; text-align: center; border: 1px solid #000; border-top: 0px; margin: 0; font-size: 18px;">LIEN SECTION</h2>
		
		<div class="row" style="border: 1px solid #000; border-top: 0px; float: left; box-sizing: border-box; width: 100%; box-sizing: border-box; margin: 0;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<h3 style="text-decoration: underline; margin: 4px 0; font-size: 15px; text-align: center;"><b>FIRST LIEN</b></h3>
				<div class="row col" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 2px 0;">
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>Date of Lien</label>
						<input type="text" name="date_lien1" value="<?php echo isset($info['date_lien1'])?$info['date_lien1']:''; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>ACCOUNT #</label>
						<input type="text" name="account_number1" value="<?php echo isset($info['account_number1'])?$info['account_number1']:''; ?>" style="width: 40%;">
					</div>
				</div>
				
				<div class="row col" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 0 0 13px;">
						<label>Lienholder ID #</label>
						<input type="text" name="lienholder1" value="<?php echo isset($info['lienholder1'])?$info['lienholder1']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; border-left: 1px solid #000; padding: 1px 0 0 13px;">
						<label>Lienholder name</label>
						<input type="text" name="lien_name1" value="<?php echo isset($info['lien_name1'])?$info['lien_name1']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box; padding: 0 0 4px 13px;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; margin: 0 0 4px 0;">
						<label>Address</label>
						<input type="text" name="lien1_address" value="<?php echo isset($info['lien1_address'])?$info['lien1_address']:''; ?>" style="width: 87%;">
					</div>
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0;">
						<label>City</label>
						<input type="text" name="lien1_city" value="<?php echo isset($info['lien1_city'])?$info['lien1_city']:''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>State</label>
						<input type="text" name="lien1_state" value="<?php echo isset($info['lien1_state'])?$info['lien1_state']:''; ?>" style="width: 66%;">
					</div>
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>Zip Code</label>
						<input type="text" name="lien1_zip" value="<?php echo isset($info['lien1_zip'])?$info['lien1_zip']:''; ?>" style="width: 61%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; box-sizing: border-box;">
				<h3 style="text-decoration: underline; margin: 4px 0; font-size: 15px; text-align: center;"><b>SECOND LIEN</b></h3>
				<div class="row col" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 2px 0;">
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>Date of Lien</label>
						<input type="text" name="date_lien2" value="<?php echo isset($info['date_lien2'])?$info['date_lien2']:''; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>ACCOUNT #</label>
						<input type="text" name="account_number2" value="<?php echo isset($info['account_number2'])?$info['account_number2']:''; ?>" style="width: 40%;">
					</div>
				</div>
				
				<div class="row col" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 1px 0 0 13px;">
						<label>Lienholder ID #</label>
						<input type="text" name="lienholder2" value="<?php echo isset($info['lienholder2'])?$info['lienholder2']:''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; border-left: 1px solid #000; padding: 1px 0 0 13px;">
						<label>Lienholder name</label>
						<input type="text" name="lien_name2" value="<?php echo isset($info['lien_name2'])?$info['lien_name2']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box; padding: 0 0 4px 13px;">
					<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; margin: 0 0 4px 0;">
						<label>Address</label>
						<input type="text" name="lien2_address" value="<?php echo isset($info['lien2_address'])?$info['lien2_address']:''; ?>" style="width: 87%;">
					</div>
					<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0;">
						<label>City</label>
						<input type="text" name="lien2_city" value="<?php echo isset($info['lien2_city'])?$info['lien2_city']:''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>State</label>
						<input type="text" name="lien2_state" value="<?php echo isset($info['lien2_state'])?$info['lien2_state']:''; ?>" style="width: 66%;">
					</div>
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 0 0 13px;">
						<label>Zip Code</label>
						<input type="text" name="lien2_zip" value="<?php echo isset($info['lien2_zip'])?$info['lien2_zip']:''; ?>" style="width: 61%;">
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; padding: 0 0 10px; margin: 0;">
				<h3 style="margin: 7px 0 16px; padding-left: 13px; font-size: 15px;"><b>I certify for the motor vehicle described above that I have financial responsibility as required by law.</b></h3>
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 0 0 13px;">
					<input type="text" name="insurance" value="<?php echo isset($info['insurance'])?$info['insurance']:''; ?>" style="width: 100%;">
					<label style="display: block; text-align: center;">Insurance Company authorized in N.C.</label>
				</div>
				
				<div class="form-field" style="float: left; width: 40%; margin-left: 5%; box-sizing: border-box; padding: 0 0 0 13px;">
					<input type="text" name="policy_num" value="<?php echo isset($info['policy_num'])?$info['policy_num']:''; ?>" style="width: 100%;">
					<label style="display: block; text-align: center;">Policy Number</label>
				</div>
			</div>
		</div>
		
		<div class="row col" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; font-size: 13px;">
			<div class="form-field" style="float: left; height: 60px; width: 13%; border-right: 1px solid #000;">
				<label style="display: block; padding: 4px 0 0 7px; margin: 0 0 12px;">Purchased</label>
				<span style="padding-left: 5%;"><input type="checkbox" name="purchased_status" value="no" <?php echo ($info['purchased_status'] == "no") ? "checked" : ""; ?> /> No</span> 
				<span style="padding-left: 5%;"><input type="checkbox" name="purchased_status" value="yes" <?php echo ($info['purchased_status'] == "yes") ? "checked" : ""; ?> / > Yes</span>
			</div>
			<div class="form-field" style="float: left; width: 13%; height: 60px; border-right: 1px solid #000;">
				<label style="display: block; padding: 4px 0 0 7px;">Purchase Date</label>
				<input type="text" name="purchase_date" value="<?php echo isset($info['purchase_date'])?$info['purchase_date']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; height: 60px; width: 28%; border-right: 1px solid #000;">
				<label style="display: block; padding: 4px 0 0 7px;">From Whom Purchased (Name and Address)</label>
				<input type="text" name="pur_address" value="<?php echo isset($info['pur_address'])?$info['pur_address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; height: 60px; width: 15%; border-right: 1px solid #000;">
				<label style="display: block; padding: 4px 0 0 7px;">N.C. Dealer No.</label>
				<input type="text" name="dealer_no" value="<?php echo isset($info['dealer_no'])?$info['dealer_no']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000;">
				<label style="display: block; padding: 4px 0 0 7px;">Is this vehicle leased?<br> If Yes, Attach From MVR-330M</label>
				<span style="margin: 0 5% 0 0; padding-left: 5%;"><input type="checkbox" name="leased_status" value="yes" <?php echo ($info['leased_status'] == "yes") ? "checked" : ""; ?> /> Yes</span> 
				<span style="padding-left: 5%;"><input type="checkbox" name="leased_status" value="no" <?php echo ($info['leased_status'] == "no") ? "checked" : ""; ?> /> No</span>
			</div>
			<div class="form-field" style="float: left; width: 10%;">
				<label style="display: block; padding: 4px 0 0 7px;">Equipment #</label>
				<input type="text" name="equip_num" value="<?php echo isset($info['equip_num'])?$info['equip_num']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; text-align: center; border: 1px solid #000; border-top: 0px; border-bottom: 0px; margin: 0; font-size: 18px;">DISCLOUSER SECTION</h2>
		
		<div class="row col" style="border: 1px solid #000;  float: left; box-sizing: border-box; width: 100%; padding: 2px 10px; border-bottom: 0px solid #000; margin: 0;">
			<p style="margin: 3px 0; font-size: 13px;">All motor vehicle records maintained by the North Carolina Division of Motor Vehicles will remain closed for marketing and solicitation unless the block below is checked.</p>
			<p style="margin: 3px 0; font-size: 13px;"><input type="checkbox" name="disclose_status" value="personal" <?php echo ($info['disclose_status'] == "personal") ? "checked" : ""; ?> /> I (we) would like the personal information contained in this application  <span>to be available for disclosure.</span></p>
		</div>
		
		<div class="row col" style="border: 1px solid #000;  float: left; box-sizing: border-box; width: 100%; padding: 2px 10px; margin: 0;">
			<b style="font-size: 13px;">APPLICATION MUST BE SIGNED IN INK BY EACH OWNER OR AUTHORIZED REPRESENT ATIVE OF FIRMS OR CORPORATIONS.</b>
			<p style="font-size: 13px; margin: 2px 0; text-align: left;">I (we) am (are) the owner(s) of the vehicle described on this application and request that a North Carolina Certificate of Title be issued. I (we) certify that the information on the application is correct to the best of my (our) knowledge. The vehicle is subject to the liens named and no others. If a registration plate is issued or transferred, I (we) further certify that there has not been a registration plate revocation and that liability insurance is in effect on this vehicle on the date of this application as required by the North Carolina Financial Security Act of 1957.</p>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0 7px 0;">
					<label>OWNER'S SIGNATURE</label>
					<input type="text" name="owner_sign" value="<?php echo isset($info['owner_sign'])?$info['owner_sign']:''; ?>" style="width: 85%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 30%; margin: 0;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo isset($info['date'])?$info['date']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 35%; margin: 0;">
					<label>County</label>
					<input type="text" name="owner_county" value="<?php echo isset($info['owner_county'])?$info['owner_county']:''; ?>" style="width: 83%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="float: left; width: 35%; margin: 0;">
					<label>State</label>
					<input type="text" name="owner_state" value="<?php echo isset($info['owner_state'])?$info['owner_state']:''; ?>" style="width: 87%; border-bottom: 1px solid #000;">
				</div>
				
				<p style="float: left; width: 100%; text-align: left; font-size: 13px;">I certify that the following person(s) personally appered before me this day, each acknowledging to me that he or she voluntaily signed the foregoing document for the purpose stated therein and in the capacity indicated: <input type="text" name="name" style="width: 50%; border-bottom: 1px solid #000;"> (name(s) of principal(s)).</p>
				
				<div class="row" style="width: 100%; float: left; margin: 0 0 4px;">
					<div class="form-field" style="width: 50%; float: left; ">
						<label>Notary <br> Signature</label>
						<input type="text" name="notary_sign" value="<?php echo isset($info['notary_sign'])?$info['notary_sign']:''; ?>" style="width: 83%; border-bottom: 1px solid #000;">
					</div>
					<div class="form-field" style="width: 50%; float: left; ">
						<label>Notary Printed <br> or Typed Name</label>
						<input type="text" name="notary_print" value="<?php echo isset($info['notary_print'])?$info['notary_print']:''; ?>" style="width: 79%; border-bottom: 1px solid #000;">
					</div>
				</div>
				
				<div class="row" style="width: 100%; float: left; margin: 0 0 4px;">
					<div class="form-field" style="width: 50%; float: left; margin: 25px 0 5px; ">
						<label style="display: block; text-align: center;">(SEAL)</label>
					</div>
					<div class="form-field" style="width: 50%; float: left; margin: 25px 0 10px;">
						<label>My Commission Expires</label>
						<input type="text" name="expires" value="<?php echo isset($info['expires'])?$info['expires']:''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
					</div>
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
	
	
     
});

	
	
	
	
	
</script>
</div>
