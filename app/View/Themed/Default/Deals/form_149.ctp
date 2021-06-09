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

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px; font-size: 14px;}
	label{font-size: 13px; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
@media print {
.left-text{background:#000;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="float: left; width: 14%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/149-form.jpg'); ?>" alt="" style="width: 70%;">
			</div>
			<div class="text" style="float: right; width: 85%">
				<h2 style="font-size: 18px; margin: 0;">Missouri Department of Revenue</h2>
				<strong style="text-decoration: underline; font-size: 18px; display: block;">Sales and Use Tax Exemption Certificate</strong>
				<p>Caution to seller: In order for the certificate to be accepted in good faith by the seller, the seller must exercise care that the property being sold is exempt. When a purchaser is claiming an exemption for purchases of items that qualify for the full manufacturing exemption and other items that only qualify for the partial manufacturing exemption, the seller must make certain the correct amount of tax is charged for each item purchased.</p>
			</div>
		</div>
		
		<!-- Purchaser start -->
		<div class="row" style="float: left; width: 100%; margin: 3px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/purchaser.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000;">
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px;">
						<label>Name</label>
						<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; border-left: 1px solid #000; border-right: 1px solid #000; box-sizing: border-box; padding: 0 3px; ">
						<label style="display: block;">Telephone Number</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="telephone" value="<?php $phone = $info['phone'];
						$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
						$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); 
						echo $this->Dncprocess->show_phone($dnc_manual_uplaod_process,$contact['Contact']['dnc_status'], $cleaned, 	$contact['Contact']['modified'],$contact['Contact']['sales_step']); ?>" style="width: 30%; margin: 0.6% 1% 2px;">
						</div>
					</div>
					
					<div class="form-field" style="float: left; width: 33.7%; box-sizing: border-box; padding: 0 3px;">
						<label style="display: block;">Missouri Tax I.D. Number</label>
						<input type="text" name="tax1" value="<?php echo isset($info['tax1'])?$info['tax1']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax2" value="<?php echo isset($info['tax2'])?$info['tax2']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax3" value="<?php echo isset($info['tax3'])?$info['tax3']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax4" value="<?php echo isset($info['tax4'])?$info['tax4']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax5" value="<?php echo isset($info['tax5'])?$info['tax5']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax6" value="<?php echo isset($info['tax6'])?$info['tax6']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax7" value="<?php echo isset($info['tax7'])?$info['tax7']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
						<input type="text" name="tax8" value="<?php echo isset($info['tax8'])?$info['tax8']:''; ?>" style="width: 11%; border-right: 1px solid #000; height: 24px;">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
						<label>Contact Person</label>
						<input type="text" name="contact_person1" value="<?php echo isset($info['contact_person1']) ? $info['contact_person1'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="box-sizing: border-box; padding: 0 3px; float: left; width: 66%;">
						<label>Doing Business As Name (DBA)</label>
						<input type="text" name="dba1" value="<?php echo isset($info['dba1']) ? $info['dba1'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
						<label>Address</label>
						<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 30%; border-right: 1px solid #000;">
						<label>City</label>
						<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 3px;">
						<label>State</label>
						<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 17%;">
						<label>Zip Code</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 98%; box-sizing: border-box; padding: 0 3px;">
						<label>Describe product or services purchased exempt from tax</label>
						<input type="text" name="describe1" value="<?php echo isset($info['describe1']) ? $info['describe1'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 98%;">
						<label>Type of business</label>
						<input type="text" name="business" value="<?php echo isset($info['business']) ? $info['business'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
			</div>
		</div>
	
		<!-- Purchaser end -->	
			
		<!-- Seller Start -->
			<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/seller.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000;">
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px;">
						<label>Name</label>
						<input type="text" name="name1" value="<?php echo isset($info['name1']) ? $info['name1'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; border-left: 1px solid #000; border-right: 1px solid #000; box-sizing: border-box; padding: 0 3px; ">
						<label style="display: block;">Telephone Number</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="telephone1" value="<?php echo isset($info['telephone1']) ? $info['telephone1'] : ''; ?>" style="width: 30%; margin: 0.6% 1% 2px;">
						</div>
					</div>
					
					<div class="form-field" style="float: left; width: 33.7%; box-sizing: border-box; padding: 0 3px;">
						<label style="display: block;">Contact Person</label>
						<input type="text" name="contact_person2" value="<?php echo isset($info['contact_person2']) ? $info['contact_person2'] : ''; ?>" style="width: 100%; ">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
						<label>Doing Business As Name (DBA)</label>
						<input type="text" name="dba2" value="<?php echo isset($info['dba2']) ? $info['dba2'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="box-sizing: border-box; padding: 0 3px; float: left; width: 50%;">
						<label>Address</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 30%; border-right: 1px solid #000;">
						<label>City</label>
						<input type="text" name="city1" value="<?php echo isset($info['city1']) ? $info['city1'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 3px;">
						<label>State</label>
						<input type="text" name="state1" value="<?php echo isset($info['state1']) ? $info['state1'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 17%;">
						<label>Zip Code</label>
						<input type="text" name="zip1" value="<?php echo isset($info['zip1']) ? $info['zip1'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
			</div>
		</div>
		<!-- Seller End -->
	
	
		<!-- Resale start -->
		<div class="row" style="float: left; width: 100%; margin: 3px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/resales.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 94%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<p style=" margin: 0 0 3px;"><input type="checkbox" name="purchase_status" <?php echo ($info['purchase_status'] == "tax") ? "checked" : ""; ?> value="tax"><span> Purchases of Tangible Personal Property for resale: <i>Retailer's State Tax ID Number</i></span> <input type="text" name="tax_id1" value="<?php echo isset($info['tax_id1']) ? $info['tax_id1'] : ''; ?>" style="width: 15%; border-bottom: 1px solid #000;"> <i>Home State</i> <input type="text" name="home_state1" value="<?php echo isset($info['home_state1']) ? $info['home_state1'] : ''; ?>" style="width: 15%; border-bottom: 1px solid #000;">(Missouri Retailers must<span style="margin-left: 17px;"> have a Missouri Tax I.D. Number)</span></p>
				
				<p style="margin: 0 0 3px;"><input type="checkbox" name="purchase_status" <?php echo ($info['purchase_status'] == "service") ? "checked" : ""; ?> value="service"> Purchases of Taxable Services for resale (see list of  taxable services in instructions) <br> 
				<i style="margin-left: 17px;">Retailer's Missouri Tax I.D. Number</i> <input type="text" name="tax_id2" value="<?php echo isset($info['tax_id2']) ? $info['tax_id2'] : ''; ?>" style="width: 15%; border-bottom: 1px solid #000;"> <br>
				<span style="margin-left: 17px;">(Resale certificate cannot be  taken  by seller in good faith  unless the Purchases is registered in Missouri)</span></p>
				
				<p style=" margin: 0 0 3px;"><input type="checkbox" name="purchase_status" <?php echo ($info['purchase_status'] == "wholesale") ? "checked" : ""; ?> value="wholesale"> Purchases by Manufacturer or Wholesaler for Wholesale: <i>Home State </i> <input type="text" name="home_state2" value="<?php echo isset($info['home_state2']) ? $info['home_state2'] : ''; ?>" style="width: 13%; border-bottom: 1px solid #000;"> (Missouri Tax I.D. Number may not be required)</p>
				
				<p style=" margin: 0 0 3px;"><input type="checkbox" name="purchase_status" <?php echo ($info['purchase_status'] == "license") ? "checked" : ""; ?> value="license"> Purchases by Motor Vehicle Dealer: <i>Missouri Dealer  License Number </i> <input type="text" name="license_num" value="<?php echo isset($info['license_num']) ? $info['license_num'] : ''; ?>" style="width: 15%; border-bottom: 1px solid #000;"><br>
				<span style="margin-left: 17px;">(Only for parts that will be used on vehicles being resold) (An Exemption Certificate for Tire and Lead-Acid Battery Fee (Form 149T) is required for tire and battery fees)</span></p>
			</div>
		</div>
		<!-- resale end-->
	
		<!-- Manufacturing Start -->
			<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/manufac.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 94%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<p style="margin: 3px 0 10px; text-align: center;">These apply to state and local sales and use tax.</p>
				<div class="left-right" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 50%">
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manu_status" <?php echo ($info['manu_status'] == "ingres") ? "checked" : ""; ?> value="ingres"> Ingredient or Component Part</p>
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manu_status" <?php echo ($info['manu_status'] == "machineery") ? "checked" : ""; ?> value="machineery"> Manufacturing Machinery, Equipment, and Parts</p>
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manu_status" <?php echo ($info['manu_status'] == "material") ? "checked" : ""; ?> value="material"> Material Recovery Processing</p>
					</div>
					<div class="left" style="float: left; width: 50%">
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manu_status" <?php echo ($info['manu_status'] == "expans") ? "checked" : ""; ?> value="expans"> Plant Expansion</p>
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manu_status" <?php echo ($info['manu_status'] == "agricul") ? "checked" : ""; ?> value="agricul"> Research and Development of Agricultural Biotechnology Products and Plant Genomics Products and Prescription Pharmaceuticals</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Manufacturer End -->
	
		<!-- Manufacturing Partial Start -->
			<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/partial.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 94%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<p style="margin: 3px 0 10px; text-align: center;">These only apply to state tax (4.225%) and local use tax, but not sales tax. The seller must collect and report local sales taxes imposed by political subdivisions.</p>
				<div class="left-right" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 50%;">
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manufact_check" <?php echo ($info['manufact_check'] == "research") ? "checked" : ""; ?> value="research"> Research and Development</p>
					</div>
					<div class="right" style="float: left; width: 50%">
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manufact_check" <?php echo ($info['manufact_check'] == "chemicals") ? "checked" : ""; ?> value="chemicals"> Manufacturing Chemicals and Materials</p>
					</div>
					<div class="full-width" style="float: left; width: 100%;">
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manufact_check" <?php echo ($info['manufact_check'] == "machinery") ? "checked" : ""; ?> value="machinery"> Machinery and Equipment Used or Consumed in Manufacturing</p>
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manufact_check" <?php echo ($info['manufact_check'] == "material") ? "checked" : ""; ?> value="material"> Materials, Chemicals, Machinery, and Equipment Used or Consumed in Material Recovery Processing Plant</p>
						<p style=" margin: 0 0 3px;"><input type="checkbox" name="manufact_check" <?php echo ($info['manufact_check'] == "energy") ? "checked" : ""; ?> value="energy"> Utilities or Energy and Water Used or Consumed in Manufacturing (Must complete below)</p>
					</div>
					
					<div class="row" style="float: left; width: 96%; margin: 7px 5%;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Purchaser's Manufacturing Percentage</label>
							<input type="text" name="manu_percentage" value="<?php echo isset($info['manu_percentage']) ? $info['manu_percentage'] : ''; ?>" style="width: 40%; border-bottom: 1px solid #000;"> %
						</div>
						
						<div class="form-field" style="width: 50%; float: left;">
							<label>Purchaser's Square Footage</label>
							<input type="text" name="pur_square" value="<?php echo isset($info['pur_square']) ? $info['pur_square'] : ''; ?>" style="width: 50%; border-bottom: 1px solid #000;">
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<!-- Manufacturer Partial End -->
		
		<!-- Other Start -->
			<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text"">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/others.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<div class="left-right" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 48%">
						<p style=" margin: 0 0 10px;">
							<span style="display: inline-block; width: 32%; vertical-align: top;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "agri") ? "checked" : ""; ?> value="agri"> Agricultural</span>
							<span style="display: inline-block; width: 32%; vertical-align: top;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "carrier") ? "checked" : ""; ?> value="carrier"> Common Carrier <br> (Attach <span style="text-decoration: underline;">Form 5095</span>)</span>
							<span style="display: inline-block; width: 32%; vertical-align: top;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "locom") ? "checked" : ""; ?> value="locom"> Locomotive Fuel</span>
						</p>
						
						<p style=" margin: 0 0 10px;"> <input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "motor") ? "checked" : ""; ?> value="motor"> Commercial Motor Vehicles or Trailers Greater than 54,000<br>Pounds (Attach <span style="text-decoration: underline;"> Form 5435)</span></p>
					</div>
					<div class="right" style="float: right; width: 50%">
						<p style=" margin: 0 0 10px;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "chemical") ? "checked" : ""; ?> value="chemical"> Air and Water Pollution Control, Machinery, Equipment, Appliances and Devices</p>
						<span style=" margin: 0 0 10px;"><input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other"> Other <input type="text" name="other1" value="<?php echo isset($info['other1']) ? $info['other1'] : ''; ?>" style="width: 90%; float: right; border-bottom: 1px solid #000;">
						<input type="text" name="other2" value="<?php echo isset($info['other2']) ? $info['other2'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-top: 10px;">
						</span>
					</div>
				</div>
			</div>
		</div>
		<!-- other End -->
		
		<!-- signature start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/signature.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000;">
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<p style="margin: 9px 5px;">Under penalties of perjury, I declare that the  above information and any attached supplement is true, complete, and correct.</p>
				</div>
				<div class="fields-outer" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 40px;">
						<label>Signature (Purchaser or Purchaser's Agent)</label>
						<input type="text" name="sign" value="<?php echo isset($info['sign']) ? $info['sign'] : ''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 0 3px;">
						<label>Title</label>
						<input type="text" name="title" value="<?php echo isset($info['title']) ? $info['title'] : ''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="float: left; width: 26%; border-left: 1px solid #000; box-sizing: border-box; padding: 0 3px; ">
						<label style="display: block;">Date (MM/DD/YYYY)</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 40%; margin: 0.6% 1% 2px;">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- signature end -->
		
		
		<!-- footer content start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="width: 70%; float: left;">
				<p style="margin: 3px 0 7px;">If you have questions, please contact the Department of Revenue at:</p>
				<div class="contact-detail" style="float: left; width: 40%; margin-left: 41%;">
					<p style="margin: 0 0;"><strong>Phone:</strong> (573) 751-2836</p>
					<p style="margin: 0 0;"><strong>TTY:</strong> (800) 735-2966</p>
					<p style="margin: 0 0;"><strong>E-mail:</strong> <a href="#">salestaxexemptions@dor.mo.gov</a></p>
				</div>
				<p style="width: 70%; text-align: center; float: left; width: 100%; margin: 7px 0 0;">Visit <a href="#">http://www.dor.mo.gov/business/sales/sales-use-exemptions.php</a> for additional information.</p>
			</div>
			<div class="right" style="float: right; width: 25%;">
				<p style="margin: 0; font-size: 12px; text-align: right;">Form 149 (Revised 12-2013)</p>
				<div class="qr-code" style="float: right; margin: 9px 0 0; width: 100px;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/qr-code.png'); ?>" alt="" style="width: 65%;float: right;">
				</div>
			</div>
		</div>
		<!-- footer content end -->
		
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
